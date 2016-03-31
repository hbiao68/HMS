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
// | Data: 2016年1月15日
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
class IconController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function fontawesome() {
        $this->display();
    }
}