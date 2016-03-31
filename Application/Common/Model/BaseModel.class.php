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
class BaseModel extends Model{
    /**
    * 查询基础方法
    * @since: 2015-11-28
    * @author: h.
    * @param: variable
    * @return:
    */
    protected function searchBase($condition,$order){
        import("ORG.Util.Page"); // 导入分页类
        $count = $this->where($condition)->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, C('PAGE_NUM')); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查诟 注意limit 方法癿参数要使用Page 类的属性
        $list = $this->where($condition)->order($order)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        return array(
            'list' => $list,
            'pageShow' => $show
        );
    }
    /**
     * 验证参数是否重复
     * @since: 2015-11-29
     * @author: h.
     * @param: variable
     * @return:
     */
    public function checkParam($field,$str,$id=""){
        if ($id){
            $where = "$field = '$str' AND $id";
        }else{
            $where = "$field = '$str'";
        }
        $info = $this->where($where)->find();
        return $info;
    }
    /**
     * 查询数据
     * @since: 2015-12-03
     * @author: h.
     * @param: $array
     * @return:
     */
    public function get($param="",$find = "",$filed="",$order="id asc",$limit=""){
        if (!empty($param)){
            if (!is_array($param)){
                return false;
            }
        }
        if ($find == 1){
            if (empty($filed)){
                return $this->where($param)->order($order)->find();
            }else {
                return $this->where($param)->order($order)->getField($filed);
            }
        }else {
            if (empty($order)){
                return $this->where($param)->select();
            }else {
                if (empty($limit)){
                    return $this->where($param)->order($order)->select();
                }else {
                    return $this->where($param)->order($order)->limit($limit)->select();
                }
            }
        }
    }
}