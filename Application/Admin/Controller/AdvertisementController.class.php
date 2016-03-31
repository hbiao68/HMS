<?php
namespace Admin\Controller;
use Think\Controller;
class AdvertisementController extends BaseController{
	
	private $navPath;
    private $parent_mark;
    private $obj;
	
	function __construct(){
		parent::__construct();
		$this->obj = new \Common\Model\AdvertisementModel();
        $this->parent_mark = "advertisement";
        $this->assign('parent_mark',$this->parent_mark);
		$this->nav = 'ad_location';
		$this->navPath = array(array('url' => U('Advertisement/ad_location'), 'desc' => '广告管理'));
	}
	
	public function index(){
		$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/ad_location'), 'desc' => '广告列表')));
		$this->assign('navPath', $navPath);
		//页面显示
		$this->display();
	}
	
	//广告位显示
	public function ad_location(){	
		//按条件搜索
		$conditions = array();
		$param = array(
				'dateline_1' => 'dateline_1',
				'dateline_2' => 'dateline_2',
				'name' => array('name' => 'name', 'type' => 'string'),
		);
		$this->paramValue($conditions, $param, 'GET');		
		//获取数据
		$orderObj = new \Common\Model\AdvertisementInfoModel();		
 		$results = $orderObj->search($conditions, 'id desc', true);				
		foreach ($results['list'] as $k=>$v)
		{
			$results['list'][$k]['total'] = $v['parvalue'] * $v['number'];//修改数据
		}
		$this->assign('list', $results['list']); // 赋值数据集
		$this->assign('page', $results['pageShow']); // 赋值分页输出
		$this->assign('pageTitle', '广告位显列表-管理后台');
		//头部路径
		$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/ad_location'), 'desc' => '广告位列表')));
		$this->assign('navPath', $navPath);	
		//SEO设置
		$this->assign('pageTitle', '广告位列表-管理后台');
		$this->display();
	}
	//广告位编辑
	public function ad_locationEdit(){
		$ad_location_info = D("ad_location_info");//实例化ad_location_info对象			
		if (\Common\Common\submitcheck('submit')) {//判断是否是submit操作	
		    $id = I('post.id');
			$data['name'] = I('post.name');
			$data['height'] = I('post.height');
			$data['width'] = I('post.width');
			$data['flag'] = I('post.flag');
			$b=$ad_location_info->where("id=$id")->save($data);			
			if($b){
				$this->error("修改成功",U('Advertisement/ad_location'));
			}else{
				$this->error("修改失败",U('Advertisement/ad_locationEdit'));
			}
		}else{
		    $id=I('get.id');  //获取当前修改信息ID号
			$list =$ad_location_info->where("id = '$id' ")->find();
			$this->assign('list',$list);//将查询数据分配显示
			$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/ad_location'), 'desc' => '广告位修改')));
			$this->assign('navPath', $navPath);
			//SEO设置
			$this->assign('pageTitle', '广告位编辑-管理后台');
			$this->display();
		}				
	}
	
	//增加广告位
	public function ad_locationAdd(){
		if (\Common\Common\submitcheck('submit')) {
			$ad_location_info = D("ad_location_info"); // 实例化ad_location_info对象
			if($ad_location_info->create()){
				$name=trim(I("post.name"));//移除字符串两边的空白字符
				$find_name=$ad_location_info->where("name = '$name' ")->find();
				if($find_name){
					$this->error("广告位存在,请再次填写",U('Advertisement/ad_locationAdd'));
				}
			}
			$data['name'] = I('post.name');
			/* $data['height'] = I('post.height');
			$data['width'] = I('post.width'); */
			$data['flag'] = I('post.flag');
			$data['createtime'] = time();
	 		$b=$ad_location_info->add($data);
	 	    if($b){
	 			    $this->success("添加广告位成功",U('Advertisement/ad_location'))	;
	 		      }
		     }else{
					$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/ad_locationAdd'), 'desc' => '新增广告位')));
					$this->assign('navPath', $navPath);
					//SEO设置
					$this->assign('pageTitle', '增加广告位-管理后台');
					$this->display();
				  }
		 }
	
	/**
	 * 广告位详情
	 */
	public function ad_locationDetail(){
		$id=I($list.id);
		$ad_location_info = D("ad_location_info");//实例化ad_location_info对象
		$list=$ad_location_info->where("id=$id")->select();		
		$this->assign('list', $list);
		$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/ad_locationDetail'), 'desc' => '广告位详情')));
		$this->assign('navPath', $navPath);
		//SEO设置
		$this->assign('pageTitle', '广告位详情-管理后台');
		$this->display();
	}
	
	/**
	 * 删除广告位方法
	 */
	public function delAd_location($id){	
		$id = I('get.id');		
		$ad_location_info = D("ad_location_info");//实例化ad_info对象
		$list=$ad_location_info->field(flag)->where("id='$id'")->select();
		if($list[0][flag] == 1){
			$data[flag]=2;
		}
		$b=$ad_location_info->where("id=$id")->save($data);
		if ($b){
			$this->success('删除完成', U('Advertisement/ad_location'));
		}else{
			$this->error('删除失败');
		}
	}	
    //广告显示
	public function ad(){		
		//按条件搜索
		$conditions = array();
		$param = array(
				'dateline_1' => 'dateline_1',
				'dateline_2' => 'dateline_2',
				'name' => array('name' => 'name', 'type' => 'string'),
				'type' => array('name' => 'type', 'type' => 'int'),	
				'flag' => array('name' => 'flag', 'type' => 'int'),		
		);
		$this->paramValue($conditions, $param, 'GET');
		$conditions[flag]=1;
		//获取数据
		$ad_location = new \Common\Model\AdvertisementInfoModel();
		$ad_info = new \Common\Model\AdvertisementModel();
		$results = $ad_info->search($conditions, 'id desc', true);	
		foreach ($results['list'] as $k=>$v)
		{
			$name = $ad_location->getOneForId($v['l_id']);
			$results['list'][$k]['location_name'] = $name['name'];//把$list1中查询的广告位id改成对应所属广告位name(修改数据)
		}		
		$this->assign('list', $results['list']); // 赋值数据集
		$this->assign('page', $results['pageShow']); // 赋值分页输出
		//头部路径
		$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/ad'), 'desc' => '广告列表')));
		$this->assign('navPath', $navPath);	
		//SEO设置
		$this->assign('pageTitle', '广告显示-管理后台');
		$this->display();
	}		

	//增加广告
	public function adAdd(){
		if (\Common\Common\submitcheck('submit')) {
			$ad_info = D("ad_info"); // 实例化ad_info对象
			if($ad_info->create()){
				$name=trim(I("post.name"));		
				$find_name=$ad_info->where("name = '$name' AND flag = 1 ")->find();
				if($find_name){
					$this->error("广告存在,请再次填写");
				}
			}
			$data['name'] = I('post.name');
			$data['l_id'] = I('post.l_id');
			$data['url'] = I('post.url');
			$data['is_show'] = I('post.is_show');
			$data['type'] = I('post.type');
		    $post_file = $_FILES;
            if (!empty($post_file['img']['name'])){
                $file = parent::fileUplpad();
                if (!empty($file['img']['path'])){
                    $data['img'] = $file['img']['path'];
                }
            }
			$data['begin_time'] =strtotime(I('post.begin_time'));
			$a =I('post.end_time');
			if(!empty($a)){
				$data['end_time'] =strtotime(I('post.end_time'));
			}		
// 			$data['flag'] = I('post.flag');		
			$data['sort'] = I('post.sort');
			$data['createtime'] = time();
			if($data['end_time']>$data['begin_time'] || $data['end_time'] == ''){
				$b=$ad_info->add($data);
					
			}else{
				$this->error("结束时间不能小于开始时间");	
			}			
			if($b){
				$this->success("添加广告成功",U('Advertisement/ad'))	;
			}
		}else{
    		$db=D('ad_location_info');
    		$list2=$db->where("flag = 1")->select();
    		$this->assign('list2',$list2);
    		$sort = $this->obj->get('',1,"sort","sort desc");
    		$sort++;
            $this->assign('sort',$sort);
			$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/adAdd'), 'desc' => '新增广告')));
			$this->assign('navPath', $navPath);
			//SEO设置
			$this->assign('pageTitle', '增加广告-管理后台');
			$this->display();
		}
	}

	/**
	* 删除广告方法
	*/
	public function delAd($id){		
		$id = I('get.id');		
		$ad_info = D("ad_info");//实例化ad_info对象
		$list=$ad_info->field(flag)->where("id='$id'")->select();
		if($list[0][flag] == 1){			
			$data[flag]=2;							
		}
		$b=$ad_info->where("id=$id")->save($data);		
	    if ($b){
 			$this->success('删除完成', U('Advertisement/ad'));
 		}else{
			$this->error('删除失败');
 		}
	}

	//广告编辑
	public function adEdit(){		
		$ad_info = D("ad_info");//实例化ad_info对象
		if (\Common\Common\submitcheck('submit')) {//判断是否是submit操作
		    $id = I('post.id');
			$data['name'] = I('post.name');
			$data['l_id'] = I('post.l_id');
			$data['url'] = I('post.url');
			$data['is_show'] = I('post.is_show');
			$data['type'] = I('post.type');
		    $post_file = $_FILES;
            if (!empty($post_file['img']['name'])){
                $file = parent::fileUplpad();
                if (!empty($file['img']['path'])){
                    $data['img'] = $file['img']['path'];
                }
            }
			$data['begin_time'] =strtotime(I('post.begin_time'));
			$c = I('post.end_time');
		    if(!empty($c)){
				$data['end_time'] =strtotime(I('post.end_time'));
			}
			
			$data['sort'] = I('post.sort');
			$data['createtime'] = time();
			
			if($data['end_time']>$data['begin_time'] || $data['end_time'] == ''){
				$b=$ad_info->where("id=$id")->save($data);
					
			}else{
				$this->error("结束时间不能小于开始时间");
			}	
							
			if($b){
				$this->error("修改成功",U('Advertisement/ad'));
			}else{
				$this->error("修改失败",U('Advertisement/ad'));
			}
		}
		else{
		    $ad_location_info = D("ad_location_info");//实例化ad_location_info对象
		    $id=I('get.id');  //获取当前修改信息ID号
			$list2=$ad_location_info->select();//查询广告位所有信息
			$this->assign('list2',$list2);//将查询数据分配显示
			$list =$ad_info->where("id = '$id' ")->find();//获取当前需要修改的信息
			$list['begin_time']=date("Y-m-d", $list['begin_time']) ; //将拿到的时间戳格式化
			if(!empty($list['end_time'])){
				$list['end_time']=date("Y-m-d", $list['end_time']);			
			}
			//$list['end_time']=date("Y-m-d", $list['end_time']) ;
			$l_id=$list['l_id'];
			$this->assign('$list',$list);
			$list3=$ad_location_info->where("id=$l_id")->field('name')->select();//获取当前id所对应广告位的一条信息
			$this->assign('list3',$list3);//将查询数据分配显示		
			$this->assign('list',$list);//将查询数据分配显示
			$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/ad'), 'desc' => '广告修改')));
			$this->assign('navPath', $navPath);
			//SEO设置
			$this->assign('pageTitle', '广告编辑-管理后台');
			$this->display();
		}
	}	
	
	//广告详情
	public function adDetail(){	
		$ad_info = D("ad_info");//实例化ad_info对象
		$ad_location_info = D("ad_location_info");//实例化ad_location_info对象	
		$id=I($list.id);  //获取当前修改信息ID号	
		$list2=$ad_location_info->select();//查询广告位所有信息
		$this->assign('list2',$list2);//将查询数据分配显示
		$list =$ad_info->where("id = '$id' ")->find();//获取当前信息
		$list['begin_time']=date("Y-m-d", $list['begin_time']) ; //将拿到的时间戳格式化
		if(!empty($list['end_time'])){
			$list['end_time']=date("Y-m-d", $list['end_time']) ;
		}		
		$l_id=$list['l_id'];
		$this->assign('$list',$list);
		$list3=$ad_location_info->where("id=$l_id")->field('name')->select();//获取当前id所对应广告位的一条信息
		$this->assign('list3',$list3);//将查询数据分配显示	
		$this->assign('list',$list);//将查询数据分配显示
		$navPath = array_merge($this->navPath, array(array('url' => U('Advertisement/adDetail'), 'desc' => '广告详情')));
		$this->assign('navPath', $navPath);
		//SEO设置
		$this->assign('pageTitle', '广告详情-管理后台');
		$this->display();
		}
	/**
	 *  图片上传
	 */
	public function uploadImg(){
		$upload = new \Think\Upload(); // 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads';
		$savepath='/Advertisement/';				
		/* if (!file_exists($savepath)){
		 mkdir($savepath);
		} */
		$upload->savePath =  $savepath;// 设置附件上传目录
		if(!$info = $upload->upload())
		{// 上传错误提示错误信息		
		    echo $upload->getError();
		    exit();	
		}
		else
		{			
			$img_path = './Uploads'.$info['file']['savepath'].$info['file']['savename'];	
			$str='./Uploads'.$info['file']['savepath'].$info['file']['savename'];//上传路径
		}			
		print_r(str_replace("./", "/", $str));
	}	
}


