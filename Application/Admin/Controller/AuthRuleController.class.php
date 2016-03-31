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
// | Data: 2015-12-03
// +----------------------------------------------------------------------
namespace Admin\Controller;

use Think\Controller;

class AuthRuleController extends BaseController{
    private $navPath;
    private $obj;
    private $parent_mark;
    public function __construct(){
        parent::__construct();
        $this->parent_mark = "system";
        $this->obj = new \Common\Model\AuthRuleModel();
        $this->navPath = array(array('url' => U('AuthRule/index'), 'desc' => '系统功能管理'));
        $this->assign('parent_mark',$this->parent_mark);
    }
    /**
    * 系统功能列表
    * @since: 2015-12-03
    * @author: h.
    * @param: 
    * @return:
    */
    public function index(){
        $conditions = array();
    	$param = array(
    			'pid' => array('name' => 'pid', 'type' => 'int'),
    			'title'=>'title',
    			'url'=>'url',
    			'createtime1'=>'createtime1',
    			'createtime2'=>'createtime2',
    	);
    	$this->paramValue($conditions, $param, 'GET');
        $results = $this->obj->search($conditions);
        foreach ($results['list'] as $k=>$v){
            $results['list'][$k]['parent'] = $this->obj->get(array('id'=>$v['pid']),1,"title");
            if ($v['status'] == 1){
                $results['list'][$k]['status'] = '开放';
            }elseif ($v['status'] == 2){
                $results['list'][$k]['status'] = '关闭';
            }
            if ($v['is_menu'] == 1){
                $results['list'][$k]['is_menu'] = '是';
            }elseif ($v['is_menu'] == 2){
                $results['list'][$k]['is_menu'] = '否';
            }
        }
        $this->assign('list', $results['list']); // 赋值数据集
    	$this->assign('page', $results['pageShow']); // 赋值分页输出
    	//获取上级菜单
    	$top = $this->obj->get(array('pid'=>0));
    	$this->assign('top',$top);
        //头部路径
        $this->assign('mark','system');
        $navPath = array_merge($this->navPath, array(array('url' => U('AuthRule/index'), 'desc' => '系统功能列表','status' => 1)));
        $this->assign('navPath', $navPath);
        $this->display();
    }
    /**
    * 添加系统功能
    * @since: 2015-12-03
    * @author: h.
    * @param: 
    * @return:
    */
    public function add(){
        if (\Common\Common\submitcheck('submit')){
            $post = I('post.');
            if (empty($post['title'])){
                $this->error('功能名称不能为空',U('AuthRule/add'));
            }else{
                $info = $this->obj->checkParam("title",$post['title']);
                if ($info){
                    $this->error("该名称已存在",U('AuthRule/add'));
                }
            }
            $post['create_time'] = time();
            $result = $this->obj->add($post);
            if ($result) {
                $this->success("添加成功", U('AuthRule/index'));
            } else {
                $this->error("添加失败", U('AuthRule/index'));
            }
        }else{
            $top = $this->obj->get(array('pid'=>0));
            //获取默认顶级菜单的排序
            $sort = $this->obj->get(array('pid'=>0),1,"sort","sort desc");
            $sort++;
            //头部路径
            $this->assign('mark','system');
            $navPath = array_merge($this->navPath, array(array('url' => U('AuthRule/add'), 'desc' => '添加系统功能','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->assign('top',$top);
            $this->assign('sort',$sort);
            $this->display();
        }
    }
    /**
    * 修改后台功能
    * @since: 2015-12-3
    * @author: h.
    * @param: variable
    * @return:
    */
    public function edit(){
        if (\Common\Common\submitcheck('submit')){
            $post = I('post.');
            $id = $post['id'];
            if (empty($id)){
                $this->error("参数错误",U('AuthRule/edit'));
            }
            unset($post['id']);
            $save = $this->obj->where("id = $id")->save($post);
            if ($save  !==false){
                $this->success('修改成功',U('AuthRule/edit',array('id'=>$id)));
            }else {
                $this->error('修改失败',U('AuthRule/edit',array('id'=>$id)));
            }
            
        }else{
            $id = I('get.id');
            $top = $this->obj->get(array('pid'=>0));
            $info = $this->obj->get(array('id'=>$id),1);
            //头部路径
            $this->assign('mark','system');
            $navPath = array_merge($this->navPath, array(array('url' => U('AuthRule/add'), 'desc' => '添加系统功能','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->assign('info',$info);
            $this->assign('top',$top);
            $this->display();
        }
    }
    /**
    * ajax获取排序
    * @since: 2016年2月23日
    * @author: h.
    * @param: int $id
    * @return: json
    */
    public function ajaxSelectSort() {
        $id = I('post.id');
        if (!isset($id)){
            echo json_encode(array('status'=>1,'sort'=>1,'msg'=>'参数错误！'));exit;
        }
        $sort = $this->obj->get(array('pid'=>$id),1,"sort","sort desc");
        if (empty($sort)){
            $sort = 1;
        }
        $sort++;
        echo json_encode(array('status'=>1,'sort'=>$sort,'msg'=>'获取成功'));exit;
    }
}

?>