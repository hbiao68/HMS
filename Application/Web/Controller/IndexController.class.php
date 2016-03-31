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
class IndexController extends BaseController {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        //首页轮播函数调用
        $ad=\Common\Common\getAd(1);
        //首页获取案例
        $caseObj = new \Common\Model\CaseModel();
        $caseCatObj = new \Common\Model\CaseCatModel();
        $caseList = $caseObj->get('','','','id desc',10);   
        foreach ($caseList as $k=>$v){
            $caseList[$k]['cat'] = $caseCatObj->get(array('id'=>$v['cid']),1,'name');
            $caseList[$k]['content'] = mb_strimwidth(strip_tags($v['content']), 0, 170, '', 'UTF-8');
        }     
        $this->caseList = $caseList;
        //首页获取公司简介
        $pageObj = new \Common\Model\PageModel();
        $this->com_int = $pageObj->get(array('id'=>1),1);
        $this->assign('ad',$ad);
        $this->display();
    }
}