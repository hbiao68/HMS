<?php
namespace Common\Model;

use Think\Model;

class AdvertisementModel extends BaseModel{
	protected $tableName = 'ad_info';
	
	public function search($conditions, $order = 'id desc', $mohu = true) {
		$condition = '';
		foreach ($conditions as $key => $val) {
			$and = empty($condition) ? '' : ' and ';
			
			if ($key == 'dateline_1') {
				$condition .= $and . ' createtime >= ' . strtotime($val);
				continue;
			} elseif ($key == 'dateline_2') {
				$time = strtotime($val)+24*3600;
				$condition .= $and . ' createtime <= ' . $time;
				continue;
			} 		
			if (is_integer($val) || is_float($val)) {
				$condition .= $and . $key . ' = ' . $val;
			} elseif (is_string($val)) {
				if ($mohu) {
					$condition .= $and . $key . ' like \'%' . $val . '%\'';
				} else {
					$condition .= $and . $key . ' = \'' . $val . '\'';
				}
			}
		}
		$results = parent::searchBase($condition, $order);
        return $results;
	}
	public function getOneForId($id){
		$info = $this->where("id = $id")->find();		
		return $info;
	}
	/**
	 * 查询广告位下可用广告
	 */
	public function getAdForLoction($l_id){
		 $time = time();
		 $info = $this->where("l_id = $l_id AND is_show = 1 AND flag = 1 AND begin_time <= $time ")->order("sort ASC")->select();
		 foreach ($info as $k=>$v){
		 	if (!empty($v['end_time']) && $v['end_time'] <= $time){
		 		continue;
		 	}else{
		 		$info_return[$k] = $info[$k];
		 	}
		 }
		 $info_return = array_values($info_return);
		return $info_return;
	}
}


?>