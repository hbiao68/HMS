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
class CaseController extends BaseController {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        //关于我们轮播函数调用
        $ad=\Common\Common\getAd(4);
        $this->assign('ad',$ad);
        //获取新闻分类
        $caseCatObj = new \Common\Model\CaseCatModel();
        $caseObj = new \Common\Model\CaseModel();
        $cat = $caseCatObj->get();
        $cid = I('get.cid');
        if (!empty($cid)){
            $conditions['cid'] = $cid;
            //获取分类标题
            $this->caseCat = $caseCatObj->get(array('id'=>$cid),1,'name');
        }
        $case = $caseObj->search($conditions);
        /* foreach ($news as $k=>$v){
            $news[$k]['content'] = mb_strimwidth(strip_tags($v['content']), 0, 170, '', 'UTF-8');
        } */
        $this->assign('cat',$cat);
        $this->assign('case',$case['list']);
        $this->assign('page',$case['pageShow']);
        $this->display();
    }
    public function detail(){
        //关于我们轮播函数调用
        $ad=\Common\Common\getAd(4);
        $this->assign('ad',$ad);
        //获取新闻分类
        $caseCatObj = new \Common\Model\CaseCatModel();
        $caseObj = new \Common\Model\CaseModel();
        $cat = $caseCatObj->get();
        $cid = I('get.cid');
        if (!empty($cid)){
            $conditions['cid'] = $cid;
            //获取分类标题
            $this->caseCat = $caseCatObj->get(array('id'=>$cid),1,'name');
        }
        $id = I('get.id');
        $info = $caseObj->get(array('id'=>$id),1);
        /* foreach ($news as $k=>$v){
            $news[$k]['content'] = mb_strimwidth(strip_tags($v['content']), 0, 170, '', 'UTF-8');
        } */
        $this->assign('cat',$cat);
        $this->assign('info',$info);
        
        $this->display();
    }
}