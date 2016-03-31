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
// | Data: 2015-12-03
// +----------------------------------------------------------------------
namespace Common\Model;
use Think\Model;

class AuthRuleModel extends BaseModel{
    protected $tableName = 'auth_rule';
    /**
    * 数据查询方法
    * @since: 2015-11-28
    * @author: h.
    * @param: variable
    * @return:
    */
    public function search($conditions, $order = 'id desc', $mohu = true){
        $condition = '';
        foreach ($conditions as $key => $val) {
            $and = empty($condition) ? '' : ' and ';
            if ($key == 'createtime1') {
                $condition .= $and . ' create_time >= ' . strtotime($val);
                continue;
            } elseif ($key == 'createtime2') {
                $time = strtotime($val)+24*3600;
                $condition .= $and . ' create_time <= ' . $time;
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
   * 查询后台功能
   * @since: 2015-12-3
   * @author: h.
   * @param: variable
   * @return:
   */
   public function getAllStatus(){
       $func = $this->where("pid = 0")->select();
       if ($func){
           foreach ($func as $k=>$v){
               $func[$k]['child'] = $this->where("pid = {$v['id']}")->select();
           }
           return $func;
       }else {
           return false;
       }
   }
    
}

?>