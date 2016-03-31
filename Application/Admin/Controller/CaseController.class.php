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
// | Data: 2016年2月23日
// +----------------------------------------------------------------------
namespace Admin\Controller;

use Think\Controller;

class CaseController extends BaseController{

    private $navPath;
    private $obj;
    
    private $catobj;
    
    public function __construct(){
        parent::__construct();
        $this->parent_mark = "case";
        $this->assign('parent_mark',$this->parent_mark);
        $this->obj = new \Common\Model\CaseModel();
        $this->catobj = new \Common\Model\CaseCatModel();
        $this->navPath = array(array('url' => U('Case/index'), 'desc' => '案例管理'));
    }
    
    /**
    * 案例列表
    * @since: 2016年2月23日
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
            $results['list'][$k]['catname'] = $this->catobj->get(array('id'=>$v['cid']),1,'name');
        }
        $this->assign('list', $results['list']); // 赋值数据集
    	$this->assign('page', $results['pageShow']); // 赋值分页输出
        //头部路径
        $navPath = array_merge($this->navPath, array(array('url' => U('Case/index'), 'desc' => '案例列表','status' => 1)));
        $this->assign('navPath', $navPath);
        $this->display();
    }
    /**
    * 添加案例
    * @since: 2016年2月23日
    * @author: h.
    * @param: 
    * @return:
    */
    public function add(){
        if (\Common\Common\submitcheck('submit')){
            $post = I('post.');
            if (empty($post['name'])){
                $this->error('功能名称不能为空',U('Case/catAdd'));
            }else{
                $info = $this->obj->checkParam("name",$post['name']);
                if ($info){
                    $this->error("该名称已存在",U('Case/add'));
                }
            }
            $post_file = $_FILES;
            if (!empty($post_file['img']['name'])){
                $file = parent::fileUplpad();
                if (!empty($file['img']['path'])){
                    $post['img'] = $file['img']['path'];
                }
            }
            $post['content'] = stripslashes(htmlspecialchars_decode($post['content']));
            $post['createtime'] = time();
            $result = $this->obj->add($post);
            if ($result) {
                $this->success("添加成功", U('Case/index'));
            } else {
                $this->error("添加失败", U('Case/index'));
            }
        }else {
            $cat = $this->catobj->get(array('pid'=>0));
            foreach ($cat as $k=>$v){
                $cat[$k]['child'] = $this->catobj->get(array('pid'=>$v['id']));
            }
            $navPath = array_merge($this->navPath, array(array('url' => U('Case/add'), 'desc' => '添加案例','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->assign('cat',$cat);
            $this->display();
        }
    }
    /**
    * 修改案例
    * @since: 2016年2月23日
    * @author: h.
    * @param: 
    * @return:
    */
    public function edit(){
        if (\Common\Common\submitcheck('submit')){
            $data = array(
                'name' => I('post.name'),
                'cid' => I('post.cid'),
                'author' => I('post.author'),
            );
            $id = I('post.id');
            if (empty($id)){
                $this->error('参数错误 ~');
            }
            if (empty($data['name'])){
                $this->error('名称不能为空',U('Case/catEdit',array('id'=>$id)));
            }else{
                $str = "id <> $id";
                $info = $this->obj->checkParam("name",$data['name'],$str);
                if ($info){
                    $this->error("该名称已存在",U('Case/edit',array('id'=>$id)));
                }else {
                    $post_file = $_FILES;
                    if (!empty($post_file['img']['name'])){
                        $file = parent::fileUplpad();
                        if (!empty($file['img']['path'])){
                            $data['img'] = $file['img']['path'];
                        }
                    }
                    $data['content'] = stripslashes(htmlspecialchars_decode(I('post.content')));
                    $result = $this->obj->where("id = $id")->save($data);
                    if ($result !== false){
                        $this->success("修改成功",U('Case/index'));
                    }else{
                        $this->error("修改失败",U('Case/index'));
                    }
                }
            }
        }else {
            $id = I('get.id');
            if (empty($id)){
                $this->error('参数错误 ~');
            }
            $info = $this->obj->get(array('id'=>$id),1);
            $cat = $this->catobj->get(array('pid'=>0));
            foreach ($cat as $k=>$v){
                $cat[$k]['child'] = $this->catobj->get(array('pid'=>$v['id']));
            }
            $navPath = array_merge($this->navPath, array(array('url' => U('Case/edit'), 'desc' => '修改案例','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->assign('info',$info);
            $this->assign('cat',$cat);
            $this->display();
        }
    }
    /**
    * 修改状态
    * @since: 2016年2月24日
    * @author: h.
    * @param: 
    * @return:
    */
    public function editStatus(){
        $get = I('get.');
        if (empty($get['id']) || empty($get['status'])){
            $this->error('参数错误 ~');
        }
        $data['status'] = $get['status'];
        $res = $this->obj->where("id = ".$get['id'])->save($data);
        if ($res !== false){
            $this->success('成功~');
        }else{
            $this->error('失败~');
        }
    }
    
    /**
    * 案例分类
    * @since: 2016年2月23日
    * @author: h.
    * @param: 
    * @return:
    */
    public function catList(){
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
        $results = $this->catobj->search($conditions);
        foreach ($results['list'] as $k=>$v){
            if ($v['pid'] == 0){
                $results['list'][$k]['parent_name'] = "顶级分类";
            }else {
                $results['list'][$k]['parent_name'] = $this->catobj->get(array('id'=>$v['pid']),1,'name');
            }
        }
        $this->assign('list', $results['list']); // 赋值数据集
    	$this->assign('page', $results['pageShow']); // 赋值分页输出
        //头部路径
        $navPath = array_merge($this->navPath, array(array('url' => U('Case/catList'), 'desc' => '案例分类列表','status' => 1)));
        $this->assign('navPath', $navPath);
        $this->display();
    }
    /**
    * 添加案例分类
    * @since: 2016年2月23日
    * @author: h.
    * @param: 
    * @return:
    */
    public function catAdd() {
        if (\Common\Common\submitcheck('submit')){
            $post = I('post.');
            if (empty($post['name'])){
                $this->error('功能名称不能为空',U('Case/catAdd'));
            }else{
                $info = $this->catobj->checkParam("name",$post['name']);
                if ($info){
                    $this->error("该名称已存在",U('Case/catAdd'));
                }
            }
            $result = $this->catobj->add($post);
            if ($result) {
                $this->success("添加成功", U('Case/catList'));
            } else {
                $this->error("添加失败", U('Case/catList'));
            }
        }else {
            $info = $this->catobj->get(array('pid'=>0));
            $navPath = array_merge($this->navPath, array(array('url' => U('Case/catAdd'), 'desc' => '添加案例分类','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->assign('top',$info);
            $this->display();
        }
    }
    /**
    * 修改案例分类
    * @since: 2016年2月23日
    * @author: h.
    * @param: 
    * @return:
    */
    public function catEdit() {
    if (\Common\Common\submitcheck('submit')){
           $data = array(
               'name' => I('post.name'),
               'pid' => I('post.pid'),
           );
           $id = I('post.id');
           if (empty($id)){
               $this->error('参数错误',U('Case/catList'));
           }
           if (empty($data['name'])){
               $this->error('分类名称不能为空',U('Case/catEdit',array('id'=>$id)));
           }else{
               $str = "id <> $id";
               $info = $this->catobj->checkParam("name",$data['name'],$str);
               if ($info){
                   $this->error("该名称已存在",U('Case/catEdit',array('id'=>$id)));
               }else {
                   $result = $this->catobj->where("id = $id")->save($data);
                   if ($result !== false){
                       $this->success("修改成功",U('Case/catList'));
                   }else{
                       $this->error("修改失败",U('Case/catList'));
                   }
               }
           }
        }else{
            $id = I('get.id');
            if (empty($id)){
                $this->error("参数错误",U('Case/catList'));
            }
            $top = $this->catobj->get(array('pid'=>0));
            $info = $this->catobj->where("id = $id")->find();
            $this->assign("info",$info);
            $this->assign("top",$top);
            //头部路径
            $this->assign('mark','adminUser');
            $navPath = array_merge($this->navPath, array(array('url' => U('Case/catedit'), 'desc' => '修改案例分类','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->display();
        }
    }
    /**
    * 编辑器上传图片
    * @since: 2016年2月23日
    * @author: h.
    * @param: 
    * @return:
    */
    public function ckeditorUplod() {
        $callback = $_GET['CKEditorFuncNum'];
        $post_file = $_FILES;
        if (! empty($post_file['upload']['name'])) {
            $file = parent::fileUplpad();
            if (! empty($file['upload']['path'])) {
                //ckeditor的回调方法
                echo "<script type=\"text/javascript\">";
                echo "window.parent.CKEDITOR.tools.callFunction(" . $callback . ",'".$file['upload']['path']."','')";
                echo "</script>";
            }
        }
    }
}