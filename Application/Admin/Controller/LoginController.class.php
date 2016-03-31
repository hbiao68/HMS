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
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller{
    
    private $obj;
    private $ADMINID;
    
    public function __construct(){
        parent::__construct();
        $this->obj = new \Common\Model\AdminUserInfoModel();
    }
    
    public function index(){
        $this->ADMINID = session("ADMINID");
        if (!empty($this->ADMINID)){
            redirect(U('Index/index'));
        }
        $this->display();
    }
    /**
    * 后台用户登录方法
    * @since: 2015-11-25
    * @author: h. <huang305167951@sina.com>
    * @return: bool
    */
    public function login(){
        if (\Common\Common\submitcheck('submit')) {
            $username = trim(I('post.username'));
            $password = trim(I('post.password'));
            $verifycode = trim(I('post.verifycode'));
            if (empty($verifycode)){
                $this->error('验证码不能为空',U('Login/index'));
            }
            $verify = new \Think\Verify();
            if ($verify->check($verifycode) === false){
                $this->error('验证码错误',U('Login/index'));
            }
            $userinfo = $this->adminUserLoginCheck($username, $password);
            
            $result = $userinfo['lstatus'];
            switch ($result) {
                case '0':
                    $this->error('用户名不存在，请重新输入。',U('Login/index'));
                break;
                case '1':
                    $this->error('您输入的密码不正确，请重新输入。',U('Login/index'));
                break;
                case '2':
                    $resultArray = array(
                        'status' => 1,
                        'msg' => session('USERNAME') . '，欢迎回来',
                        'url' => U('Index/index')
                    );
                    $this->success(session('USERNAME') . '，欢迎回来', U('SystemInfo/index'));
                break;
                case '8':
                    $this->error('用户不可用',U('Login/index'));
                break;
                default:
                    $this->error('用户名和密码都不能为空，请重新输入。',U('Login/index'));
                break;
            }
        
        }else {
            $this->error('参数错误',U('Login/index'));
        }
    }
    /**
    * 生成验证码方法
    * @since: 2015-11-25
    * @author: h.
    */
    public function verify() {
        \Common\Common\setVerfy();
    }
    /**
    * 后台用户检测
    * @since: 2015-11-25
    * @author: h.
    * @param: $username $password
    * @return:
    */
    private function adminUserLoginCheck($username,$password){
        $resultarr = array();
        $time = time();
        $username = strtolower($username); //用户名全部小写
        if (empty($username) or empty($password)) {
            $resultarr = array('lstatus' => 3); //用户名或密码为空
        }else{
            $userinfo = $this->obj->getOneUser(array('username'=>$username));
            if ($userinfo){
                if ($userinfo['status'] != 1){
                    $resultarr = array('lstatus' => 8);
                }else {
                    if (md5($password) != $userinfo['password']) {
                        $resultarr = array('lstatus' => 1, 'username' => $username);
                    } else {
                        $resultarr = array('lstatus' => 2); //成功标记
                        //更新数据记录,更新登录时间与地点与登录次数
                        $newData = array(
                            'last_login_time' => $time,
                            'last_login_ip' => get_client_ip(),
                        );
                        $this->obj->where("id = {$userinfo['id']}")->save($newData);
                        $authGroupAccessModel = new \Common\Model\AuthGroupAccessModel();
                        $access = $authGroupAccessModel->getAccessUid($userinfo['id']);
                        //记录会话变量
                        session('ADMINID', $userinfo['id']);
                        session('USERNAME', $userinfo['username']);
                        session('GROUPID',$access['group_id']);
                        //session('SYSROLE', $results['role']);
                    }
                }
            }else {
                $resultarr = array('lstatus' => 0);
            }
        }
        return $resultarr;
    }
    /**
    * 后台用户退出
    * @since: 2015-11-26日
    * @author: h.
    * @return: bool
    */
    public function loginOut(){
        session_unset(); //清空会话变量
        redirect(U('Login/index'));
    }
    
}


?>