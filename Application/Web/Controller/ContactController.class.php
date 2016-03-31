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
class ContactController extends BaseController {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        //联系我们轮播函数调用
        $ad=\Common\Common\getAd(5);
        $this->assign('ad',$ad);
        //获取联系我们
        $PageObj = new \Common\Model\PageModel();
        $this->contact = $PageObj->get(array('id'=>3),1);
        $this->display();
    }
}