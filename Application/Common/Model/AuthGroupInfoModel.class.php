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

class AuthGroupInfoModel extends BaseModel{
    protected $tableName = 'auth_group_info';
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
            if ($key == 'createtime1') {
                $condition .= $and . ' createtime >= ' . strtotime($val);
                continue;
            } elseif ($key == 'createtime2') {
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
    * 查询所有用户组
    * @since: 2015-12-02
    * @author: h.
    * @param: 
    * @return:
    */
    public function getAll(){
        return $this->select();
    }
    /**
    * 查询当前用户组是否拥有某权限
    * @since: 2015-12-4
    * @author: h.
    * @param: $id,$rule
    * @return:
    */
    public function getThisRule($id,$rule){
        if (empty($id) || empty($rule)){
            return false;
        }
        $where = "id = $id AND find_in_set('$rule',rules)";
        $info = $this->where($where)->find();
        return $info;
    }
}

?>