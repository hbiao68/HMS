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
namespace Web\Controller;
use Think\Controller;
class AboutController extends BaseController {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        //关于我们轮播函数调用
        $ad=\Common\Common\getAd(2);
        $this->assign('ad',$ad);
        //获取关于我们
        $aboutObj = new \Common\Model\PageModel();
        $this->about = $aboutObj->get(array('id'=>2),1);
        $this->display();
    }
}