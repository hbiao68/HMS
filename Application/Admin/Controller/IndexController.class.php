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
class IndexController extends BaseController {
    public function index(){

        print_r(session('USERNAME'));
        $this->display();
        
    }
}