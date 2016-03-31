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

class BaseController extends Controller{
    private $ADMINID;
    private $GROUPID;
    private $THISURL;
    public function __construct() {
        parent::__construct();
        $this->ADMINID = session("ADMINID");
        $this->GROUPID = session("GROUPID");
        if (empty($this->ADMINID)){
            redirect(U('Login/index'));
        }
        $this->THISURL = CONTROLLER_NAME.'/'.ACTION_NAME;
        $this->checkRule();
        $this_menu = $this->getMenu();
        if ($this_menu){
            $this->assign('this_menu',$this_menu);
        }
        $this->assign('this_url',$this->THISURL);
    }
    /**
    * 判断用户权限
    * @since: 2016年1月15日
    * @author: h.
    * @param: 
    * @return: bool
    */
    private function checkRule(){
        //超级管理员跳过所有权限限制
        if ($this->GROUPID > 1){
            $url = $this->THISURL;
            $AuthRuleModel = new \Common\Model\AuthRuleModel();
            $func_id = $AuthRuleModel->get(array('url'=>$url),1,"id");
            $AuthGroupInfo = new \Common\Model\AuthGroupInfoModel();
            $thisRule = $AuthGroupInfo->getThisRule($this->GROUPID,$func_id);
            if (empty($thisRule)){
                $this->error("您没有权限访问该功能 ！");
            }
        }
    }
    /**
    * 获取导航
    * @since: 2016年1月15日
    * @author: h.
    * @param: 
    * @return:
    */
    private function getMenu(){
        $AuthRuleModel = new \Common\Model\AuthRuleModel();
        $this_menu = $AuthRuleModel->get(array('pid'=>0,'is_menu'=>1,'status'=>1),'','','sort ASC');
        foreach ($this_menu as $k=>$v){
            $this_menu[$k]['child'] = $AuthRuleModel->get(array('pid'=>$v['id'],'is_menu'=>1,'status'=>1),'','','sort ASC');
            foreach ($this_menu[$k]['child'] as $key=>$value){
                $this_menu[$k]['child'][$key]['url'] = U($value['url']);
                $this_menu[$k]['child'][$key]['this_url'] = $value['url'];
            }
        }
        return $this_menu;
    }
    
    /**
     * 处理其他参数（获得内容，赋值到模板，整理条件数组）
     * @param array $conditions 查询条件数组，将被分解为查询条件
     * @param array $param array('title' => array('name' => 'title', 'type' => 'string'), 'display' => array('name' => 'display', 'type' => 'int'), 'category_p' => array('name' => 'category_p', 'type' => 'int'), 'category' => array('name' => 'category', 'type' => 'int'));
     * @param string $method  */
    protected function paramValue(&$conditions, $param = array(), $method = 'GET') {
        if (!empty($param)) {
            foreach ($param as $key => $p) {
                if (is_array($p)) {
                    $temp = ($method == 'GET') ? I('get.' . $p['name']) : I('post.' . $p['name']);
                    $this->assign($p['name'], $temp);
                    if (!empty($temp)) {
                        switch ($p['type']) {
                            case 'string':
                                $conditions[$key] = $temp;
                                break;
                            case 'int':
                                $conditions[$key] = (int) $temp;
                                break;
                            case 'float':
                                $conditions[$key] = (float) $temp;
                                break;
                            default :
                                $conditions[$key] = $temp;
                                break;
                        }
                    }
                    if($temp=='0'){
                        if($p['type']=="string"){
                            $conditions[$key]='0';
                        }
                        if($p['type']=="int"){
                            $conditions[$key]=0;
                        }
                    }
                } else {
                    $temp = ($method == 'GET') ? I('get.' . $p) : I('post.' . $p);
                    $this->assign($p, $temp);
                    if (!empty($temp)) {
                        $conditions[$key] = $temp;
                    }
                    if($temp=='0'){
                        $conditions[$key]='0';
                    }
                }
            }
        }
    }
    /**
     * 图片上传
     * @since: 2015-12-10
     * @author: h.
     * @param: variable
     * @return:
     */
    protected function fileUplpad($savePath = ""){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     $savePath; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            // 上传成功
            foreach ($info as $k=>$v){
                $path = $upload->rootPath.$v['savepath'].$v['savename'];
                $info[$k]['path'] = substr($path,1);
            }
            return $info;
        }
    }
    
}

?>