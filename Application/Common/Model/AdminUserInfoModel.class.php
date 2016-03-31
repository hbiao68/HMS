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
// | Data: 2015-11-25
// +----------------------------------------------------------------------
namespace Common\Model;
use Think\Model;
class AdminUserInfoModel extends BaseModel{
    protected $tableName = 'admin_user_info';
    /**
    * 数据查询方法
    * @since: 2015-12-2
    * @author: h.
    * @param: 
    * @return:
    */
    public function search($conditions, $order = 'id asc', $mohu = true){
        $condition = '';
        foreach ($conditions as $key => $val) {
            $and = empty($condition) ? '' : ' and ';
            if ($key == 'createtime_1') {
                $condition .= $and . ' createtime >= ' . strtotime($val);
                continue;
            } elseif ($key == 'createtime_2') {
                $time = strtotime($val)+24*3600;
                $condition .= $and . ' createtime <= ' . $time;
                continue;
            }
            if (is_integer ( $val ) || is_float ( $val )) {
                $condition .= $and . $key . ' = ' . $val;
            } elseif (is_string ( $val )) {
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
    /**
    * 方法用途描述
    * @since: 2015-11-25
    * @author: h.
    * @param: array('id'=>$id,'username'=>$username) $filed
    * @return: array
    */
    public function getOneUser($param,$filed=""){
        if (empty($param) || !is_array($param)){
            return false;
        }else{
            if ($param['id']){
                $where = "id= '{$param['id']}'";
            }elseif ($param['username']){
                $where = "username= '{$param['username']}'";
            }
        }
        if (empty($filed)){
            return $this->where($where)->find();
        }else {
            return $this->where($where)->getField($filed);
        }
    }
}