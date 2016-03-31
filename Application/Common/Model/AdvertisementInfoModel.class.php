<?php
namespace Common\Model;

use Think\Model;

class AdvertisementInfoModel extends BaseModel{
	protected $tableName = 'ad_location_info';
	
	public function search($conditions, $order = 'id desc', $mohu = true) {
		$condition="";
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
}

?>