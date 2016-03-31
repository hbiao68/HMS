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
// | Data: 2015-11-28
// +----------------------------------------------------------------------
namespace Common\Model;
use Think\Model;

class AuthGroupAccessModel extends BaseModel{
    protected $tableName = 'auth_group_access';
    /**
    * 数据查询方法
    * @since: 2015-11-28
    * @author: h.
    * @param: variable
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
    * 查询用户所属用户组
    * @since: 2015-12-02
    * @author: h.
    * @param: $uid
    * @return: int
    */
    public function getAccessUid($uid){
        if (empty($uid)){
            return false;
        }
        $access = $this->where("uid = $uid")->find();
        return $access;
    }
    
}

?>