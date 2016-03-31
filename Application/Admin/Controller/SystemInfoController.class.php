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
// | Data: 2016-3-9
// +----------------------------------------------------------------------
namespace Admin\Controller;

use Think\Controller;

class SystemInfoController extends BaseController{

    private $navPath;
    private $obj;

    private $catobj;

    public function __construct(){
        parent::__construct();
        $this->parent_mark = "system";
        $this->assign('parent_mark',$this->parent_mark);
        $this->obj = new \Common\Model\SystemInfoModel();
        $this->navPath = array(array('url' => U('SystemInfo/index'), 'desc' => '系统设置'));
    }
    public function index(){
        if (\Common\Common\submitcheck("submit")){
            $post = I('post.');
            unset($post['submit']);
            foreach ($post as $k=>$v){
                $key = $this->obj->get(array('systemkey'=>$k),1);
                if (empty($key)){
                    $data['systemkey'] = $k;
                    if ($k == "footer_content"){
                        $data['systemvalue'] = stripslashes(htmlspecialchars_decode($v));
                    }else {
                        $data['systemvalue'] = $v;
                    }
                    $this->obj->add($data);
                }else {
                    if ($k == "footer_content"){
                        $v = stripslashes(htmlspecialchars_decode($v));
                    }
                    $this->obj->where("systemkey = '$k'")->save(array('systemvalue'=>$v));
                }
            }
            redirect(U('SystemInfo/index'));
        }else {
            $info = $this->obj->get();
            foreach ($info as $k=>$v){
                $system[$v['systemkey']] = $v['systemvalue'];
            }
            $this->assign('system',$system);
            //头部路径
            $this->assign('mark','system');
            $navPath = array_merge($this->navPath, array(array('url' => U('System/index'), 'desc' => '系统设置','status' => 1)));
            $this->assign('navPath', $navPath);
            $this->display();
        }
    }
}