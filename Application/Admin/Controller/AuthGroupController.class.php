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
// | Data: 2015-11-28
// +----------------------------------------------------------------------
namespace Admin\Controller;

use Think\Controller;

class AuthGroupController extends BaseController{
    private $navPath;
    private $obj;
    private $parent_mark;
    public function __construct(){
        parent::__construct();
        $this->parent_mark = "adminUser";
        $this->obj = new \Common\Model\AuthGroupInfoModel();
        $this->navPath = array(array('url' => U('AuthGroup/index'), 'desc' => '用户组管理'));
        $this->assign('parent_mark',$this->parent_mark);
    }
    /**
     * 用户组列表
     * @since: 2015-11-28
     * @author: h.
     * @param: variable
     * @return:
     */
    public function index(){
        $conditions = array();
    	$param = array(
    			'status' => array('name' => 'status', 'type' => 'int'),
    			'title'=>'title',
    			'createtime1'=>'createtime1',
    			'createtime2'=>'createtime2',
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
        $this->assign('mark',1);
        $navPath = array_merge($this->navPath, array(array('url' => U('AuthGroup/index'), 'desc' => '用户组列表','status' => 1)));
        $this->assign('navPath', $navPath);
        $this->display();
    }
    /**
    * 修改用户组
    * @since: 2015-11-28
    * @author: h.
    * @param: 
    * @return:
    */
    public function edit(){
        if (\Common\Common\submitcheck('submit')){
           $data = array(
               'title' => I('post.title'),
               'status' => I('post.status'),
           );
           $id = I('post.id');
           if (empty($id)){
               $this->error('参数错误',U('AuthGroup/index'));
           }
           if (empty($data['title'])){
               $this->error('用户组名称不能为空',U('AuthGroup/edit',array('id'=>$id)));
           }else{
               $str = "id <> $id";
               $info = $this->obj->checkParam("title",$data['title'],$str);
               if ($info  !==false){
                   $this->error("该名称已存在",U('AuthGroup/edit',array('id'=>$id)));
               }else {
                   $result = $this->obj->where("id = $id")->save($data);
                   if ($result){
                       $this->success("修改成功",U('AuthGroup/index'));
                   }else{
                       $this->error("修改失败",U('AuthGroup/index'));
                   }
               }
           }
        }else{
            $id = I('get.id');
            if (empty($id)){
                $this->error("参数错误",U('AuthGroup/index'));
            }
            $info = $this->obj->where("id = $id")->find();
            $this->assign("info",$info);
            //头部路径
            $this->assign('mark','adminUser');
            $navPath = array_merge($this->navPath, array(array('url' => U('AuthGroup/edit'), 'desc' => '修改用户组','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->display();
        }
    }
    /**
    * 方法用途描述
    * @since: 2015-12-2
    * @author: h.
    * @param: 
    * @return:
    */
    public function add(){
        if (\Common\Common\submitcheck('submit')){
            $data = array(
                'title' => I('post.title'),
                'status' => I('post.status'),
                'createtime' => time(),
            );
           if (empty($data['title'])){
               $this->error('用户组名称不能为空',U('AuthGroup/add'));
           }else{
               $info = $this->obj->checkParam("title",$data['title']);
               if ($info){
                   $this->error("该名称已存在",U('AuthGroup/add'));
               }else {
                   $result = $this->obj->add($data);
                   if ($result){
                       $this->success("添加成功",U('AuthGroup/index'));
                   }else{
                       $this->error("添加失败",U('AuthGroup/index'));
                   }
               }
           }
        }else{
            //头部路径
            $this->assign('mark','adminUser');
            $navPath = array_merge($this->navPath, array(array('url' => U('AuthGroup/add'), 'desc' => '添加用户组','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->display();
        }
    }
    /**
    * 设置用户组权限方法
    * @since: 2015-12-3
    * @author: h.
    * @param: variable
    * @return:
    */
    public function setRule(){
        if (\Common\Common\submitcheck("submit")){
            $id = I('post.id');
            if (empty($id)){
                $this->error("参数错误",U('AuthGroup/index'));
            }
            $rules = I('post.rules');
            $data['rules'] = implode(",",$rules);
            $save = $this->obj->where("id = $id")->save($data);
            if ($save){
                $this->success("设置用户组权限成功",U('AuthGroup/setRule',array('id'=>$id)));
            }else {
                $this->error("设置用户组权限失败",U('AuthGroup/setRule',array('id'=>$id)));
            }
        }else {
            $id = I('get.id');
            if (empty($id)){
                $this->error('参数错误',U('AuthGroup/index'));
            }
            $authRule = new \Common\Model\AuthRuleModel();
            $authRuleList = $authRule->getAllStatus();
            $is_rule = "";
            foreach ($authRuleList as $k => $v){
                $is_rule = "";
                foreach ($v['child'] as $key => $value){
                    //$authRuleList[$k]['child'][$key]['is_rule'] = $this->obj->getThisRule($id, $value['id']);
                    $is_rule = $this->obj->getThisRule($id, $value['id']);
                    if ($is_rule){
                        $authRuleList[$k]['child'][$key]['is_rule'] = 1;
                    }else {
                        $authRuleList[$k]['child'][$key]['is_rule'] = 0;
                    }
                }
            }
            //查询当前用户组权限
            $info = $this->obj->where("id = $id")->find();
            $rule = $info['rules'];
            //头部路径
            $this->assign('mark','adminUser');
            $navPath = array_merge($this->navPath, array(array('url' => U('AuthGroup/setRule'), 'desc' => '设置用户组权限','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->assign('authRuleList',$authRuleList);
            $this->assign('info',$info);
            $this->display();
        }
    }
    
}

?>