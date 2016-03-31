<?php
// +----------------------------------------------------------------------
// | HMS [ Based Thinkphp Development ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.yohez.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: h. <huang305167951@sina.com>
// +----------------------------------------------------------------------
// | Data: 2015-11-26
// +----------------------------------------------------------------------
namespace Admin\Controller;

use Think\Controller;

class AdminUserController extends BaseController{
    private $navPath;
    private $obj;
    private $parent_mark;
    public function __construct(){
        parent::__construct();
        $this->parent_mark = "adminUser";
        $this->obj = new \Common\Model\AdminUserInfoModel();
        $this->navPath = array(array('url' => U('AdminUser/index'), 'desc' => '用户管理'));
        $this->assign('parent_mark',$this->parent_mark);
    }
    /**
    * 后台用户列表
    * @since: 2015-12-2
    * @author: h.
    * @param: 
    * @return:
    */
    public function index(){
        $conditions = array();
        $param = array(
            'jtype' => array('name' => 'jtype', 'type' => 'int'),
            'name'=>'name',
            'num_1'=>'num_1',
            'num_2'=>'num_2',
            'jvalue_1'=>'jvalue_1',
            'jvalue_2'=>'jvalue_2',
        );
        $this->paramValue($conditions, $param, 'GET');
        $results = $this->obj->search($conditions);
        foreach ($results['list'] as $k=>$v){
            if ($v['status'] == 1){
                $results['list'][$k]['status'] = '可用';
            }elseif ($v['status'] == 2){
                $results['list'][$k]['status'] = '关闭';
            }
        }
        $this->assign('list', $results['list']); // 赋值数据集
        $this->assign('page', $results['pageShow']); // 赋值分页输出
        //头部路径
        $navPath = array_merge($this->navPath, array(array('url' => U('AdminUser/index'), 'desc' => '后台用户列表','status' => 1)));
        $this->assign('navPath', $navPath);
        $this->display();
    }
    /**
    * 修改用户信息
    * @since: 2015-12-2
    * @author: h.
    * @param: 
    * @return:
    */
    public function edit(){
        $time = time();
        $authGroupAccess = new \Common\Model\AuthGroupAccessModel();
        if (\Common\Common\submitcheck('submit')){
            $id = I('post.id');
            if (empty($id)){
                $this->error('参数错误',U('AuthGroup/index'));
            }
            $data = array(
                'nickname' => I('post.nickname'),
                'email' => I('post.email'),
                'remark' => I('post.remark'),
                'id' => $id,
                'update_time' => $time,
            );
            $status = I('post.status');
            if ($status){
                $data['status'] = $status;
            }
            $username = I('post.username');
            if ($username){
                $data['username'] = $username;
                if (empty($data['username'])){
                    $this->error('用户名不能为空',U('AdminUser/edit',array('id'=>$id)));
                }else{
                    $str = "id <> $id";
                    $info = $this->obj->checkParam("username",$data['username'],$str);
                    if ($info){
                        $this->error("该用户已存在",U('AdminUser/edit',array('id'=>$id)));
                    }
                }
            }
            $password = I('post.password');
            $confirm_password = I('post.confirm_password');
            if (!empty($password)){
                if ($password != $confirm_password){
                    $this->error("密码和确认密码不一致",U('AdminUser/edit',array('id'=>$id)));
                }else{
                    $data['password'] = $password;
                }
            }
            $this->obj->startTrans();
            $save = $this->doSettings($data);
            if ($save){
                $group_id = I('post.group_id');
                if (!empty($group_id)){
                    $access['group_id'] = $group_id;
                    $access_id = $authGroupAccess->where("uid = $id")->save($access);
                    if ($access_id  !==false){
                        $this->success("修改成功",U('AdminUser/edit',array('id'=>$id)));
                    }else {
                        $this->obj->rollback();
                        $this->error("修改失败1",U('AdminUser/edit',array('id'=>$id)));
                    }
                }else {
                    $this->success("修改成功",U('AdminUser/edit',array('id'=>$id)));
                }
            }else{
                $this->obj->rollback();
                $this->error("修改失败2",U('AdminUser/edit',array('id'=>$id)));
            }
            $this->obj->commit();
        }else{
            $id = I('get.id');
            if (empty($id)){
                $this->error("参数错误",U('AdminUser/index'));
            }
            $userInfo = $this->obj->getOneUser(array('id'=>$id));
            if (!$userInfo){
                $this->error("参数错误",U('AdminUser/index'));
            }
            //获取所有用户组
            $authGroupInfo = new \Common\Model\AuthGroupInfoModel();
            $userInfo['group'] = $authGroupInfo->getAll();
            //当前用户所属用户组
            $this_group = $authGroupAccess->getAccessUid($id);
            $userInfo['this_group'] = $this_group['group_id'];
            $this->assign('userInfo',$userInfo);
            //头部路径
            $navPath = array_merge($this->navPath, array(array('url' => U('AdminUser/edit'), 'desc' => '修改后台用户','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->display();
        }
    }
    /**
    * 添加用户
    * @since: 2015-12-03
    * @author: h.
    * @param: 
    * @return:
    */
    public function add(){
        $time = time();
        if (\Common\Common\submitcheck("submit")){
            $data = array(
                'username' => I('post.username'),
                'nickname' => I('post.nickname'),
                'password' => I('post.password'),
                'email' => I('post.email'),
                'remark' => I('post.remark'),
                'status' => I('post.status'),
                'create_time' => $time,
            );
            if ($data['username']){
                if (empty($data['username'])){
                    $this->error('用户名不能为空',U('AdminUser/add'));
                }else{
                    $info = $this->obj->checkParam("username",$data['username']);
                    if ($info){
                        $this->error("该用户已存在",U('AdminUser/add'));
                    }
                }
            }
            $password = $data['password'];
            $confirm_password = I('post.confirm_password');
            if (!empty($password)){
                if ($password != $confirm_password){
                    $this->error("密码和确认密码不一致",U('AdminUser/add'));
                }
            }else {
                $this->error("密码不能为空",U('AdminUser/add'));
            }
            if (empty($data['email'])){
                $this->error("邮箱不能为空",U('AdminUser/add'));
            }
            $this->obj->startTrans();
            $save = $this->obj->add($data);
            if ($save){
                $group_id = I('post.group_id');
                if (!empty($group_id)){
                    $authGroupAccess = new \Common\Model\AuthGroupAccessModel();
                    $access['uid'] = $save;
                    $access['group_id'] = $group_id;
                    $access_id = $authGroupAccess->add($access);
                    if ($access_id){
                        $this->success("添加用户成功",U('AdminUser/index'));
                    }else {
                        $this->obj->rollback();
                        $this->error("添加用户失败",U('AdminUser/add'));
                    }
                }else {
                    $this->obj->rollback();
                    $this->error("添加失败，所属用户组添加失败",U('AdminUser/add'));
                }
            }else{
                $this->obj->rollback();
                $this->error("添加用户失败",U('AdminUser/add'));
            }
            $this->obj->commit();
        }else {
            //获取所有用户组
            $authGroupInfo = new \Common\Model\AuthGroupInfoModel();
            $userInfo['group'] = $authGroupInfo->getAll();
            //头部路径
            $navPath = array_merge($this->navPath, array(array('url' => U('AdminUser/add'), 'desc' => '添加后台用户','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->assign("userInfo",$userInfo);
            $this->display();
        }
    }
    /**
    * 当前用户设置
    * @since: 2015-11-26
    * @author: h.
    * @param: variable
    * @return:
    */
    Public function mySettings(){
        $userInfo = $this->obj->getOneUser(array('id'=>$this->ADMINID));
        //头部路径
        $navPath = array_merge($this->navPath, array(array('url' => U('AdminUser/mySettings'), 'desc' => '用户设置','status' => 1)));
        $this->assign('navPath', $navPath);
        $this->assign('userInfo',$userInfo);
        $this->display();
    }
    /**
    * 修改我的信息
    * @since: 2015-11-28
    * @author: h.
    * @param: array
    * @return:
    */
    public function doMySettings(){
        $post = I('post.');
        $result = $this->doSettings($post);
        if ($result){
            $this->success("修改成功",U('AdminUser/mySettings'));
        }else{
            $this->error("修改失败",U('AdminUser/mySettings'));
        }
    }
    /**
    * 修改后台用户信息
    * @since: 2015-11-28
    * @author: h.
    * @param: array
    * @return:
    */
    private function doSettings($post){
        if (!is_array($post)){
            return false;
        }
        $id = $post['id'];
        if (empty($id)){
            return false;
        }else{
            unset($post['id']);
        }
        if (empty($post['password'])){
            unset($post['password']);
        }else {
            $post['password'] = md5($post['password']);
        }
        return $this->obj->where("id = $id")->save($post);
    }
}

?>