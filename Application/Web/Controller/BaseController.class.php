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
// | Data: 2016-3-8
// +----------------------------------------------------------------------
namespace Web\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function __construct(){
        parent::__construct();
        $this->menu = $this->getMenu();
        $this->getMenuFooter = $this->getMenuFooter();
        $this->contact = $this->getContact();
        $this->caseCat = $this->getCaseCat();
        $this->introduction = $this->getIntroduction();
        $this->domain = $this->getSystem('domain');
        $this->phone = $this->getSystem('phone');
        $qq = $this->getSystem('qq');
        $qq_arr = explode(',', $qq);
        $this->qq = $qq_arr;
        $this->footer_content = $this->getSystem('footer_content');
        
    }
    /**
    * 获取导航条
    * @since: 2016-3-8
    * @author: h.
    * @param: variable
    * @return:
    */
    private function getMenu(){
        $menuObj = new \Common\Model\MenuWebModel();
        $menu = $menuObj->get(array('status'=>1,'tid'=>1),'','','sort asc,createtime desc');
        return $menu;
    }
    private function getMenuFooter(){
        $menuObj = new \Common\Model\MenuWebModel();
        $menu = $menuObj->get(array('status'=>1,'tid'=>2),'','','sort asc,createtime desc');
        return $menu;
    }
    private function getContact(){
        $PageObj = new \Common\Model\PageModel();
        $contact = $PageObj->get(array('id'=>3),1);
        return $contact;
    }
    private function getCaseCat(){
        $caseCatObj = new \Common\Model\CaseCatModel();
        $cat = $caseCatObj->get();
        return $cat;
    }
    private function getIntroduction(){
        $aboutObj = new \Common\Model\PageModel();
        $introduction = $aboutObj->get(array('id'=>2),1);
        return $introduction;
    }
    
    private function getSystem($systemkey){
        $obj = new \Common\Model\SystemInfoModel();
        $system = $obj->get(array('systemkey'=>$systemkey),1,'systemvalue');
        return $system;
    }
}
