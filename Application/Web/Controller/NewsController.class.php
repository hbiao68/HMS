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
class NewsController extends BaseController {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        //关于我们轮播函数调用
        $ad=\Common\Common\getAd(3);
        $this->assign('ad',$ad);
        //获取新闻分类
        $newsCatObj = new \Common\Model\NewsCatModel();
        $newObj = new \Common\Model\NewsModel();
        $cat = $newsCatObj->get();
        $conditions['status'] = 1;
        $cid = I('get.cid');
        if (!empty($cid)){
            $conditions['cid'] = $cid;
            //获取分类标题
            $this->newCat = $newsCatObj->get(array('id'=>$cid),1,'name');
        }
        $news = $newObj->search($conditions);
        /* foreach ($news as $k=>$v){
            $news[$k]['content'] = mb_strimwidth(strip_tags($v['content']), 0, 170, '', 'UTF-8');
        } */
        $this->assign('cat',$cat);
        $this->assign('news',$news['list']);
        $this->assign('page',$news['pageShow']);
        $this->display();
    }
}