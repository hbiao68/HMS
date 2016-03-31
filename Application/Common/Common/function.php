<?php
namespace Common\Common;
//判断是否是“提交”操作
function submitcheck($var) {
    if (!empty($_POST[$var]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    } else {
        return FALSE;
    }
}
/**
* 显示验证码
* @since: 2015-11-25
* @author: h.
* @param: $GLOBALS
* @return:
*/
function setVerfy(){
    $Verify = new \Think\Verify();
    $Verify->fontSize = 15;
    $Verify->length   = 4;
    $Verify->imageH = 30;
    $Verify->imageW = 120;
    $Verify->useNoise = false;
    $Verify->useCurve = false;
    $Verify->fontttf = '4.ttf';
    $Verify->entry();
}
/**
 *  加密函数
 * @param type $data 需加密的数据
 * @param type $type 加密场景，1为前台注册用户，2为生成交易密码，3为加密手机号，4为加密身份证号，5为生成后台用户，6为加密后台邮件账号密码，7 Url参数加密传输，8为加密银行卡账户
 * @param type $isDecrypt 是否可解密，true为可解密，false为不可解密
 * @return type
 */
function encrypt($data, $type, $isDecrypt = false) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            $data[$key] = (string) $val;
        }
    } else {
        $data = (string) $data;
    }
    switch ($type) {
        case 1:
            $key = C('SITE_LOGIN_KEY');
            break;
        case 2:
            $key = C('SITE_TRADE_KEY');
            break;
        case 3:
            $key = C('SITE_OTHER_KEY');
            break;
        case 4:
            $key = C('SITE_OTHER_KEY');
            break;
        case 5:
            $key = C('BACK_LOGIN_KEY');
            break;
        case 6:
            $key = C('BACK_OTHER_KEY');
            break;
        case 7:
            $key = C('SITE_OTHER_KEY');
            break;
        case 8:
            $key = C('SITE_OTHER_KEY');
            break;
    }
    if ($isDecrypt) {
        $prep_code = serialize($data);
        $block = mcrypt_get_block_size('des', 'ecb');
        if (($pad = $block - (strlen($prep_code) % $block)) < $block) {
            $prep_code .= str_repeat(chr($pad), $pad);
        }
        $encrypt = mcrypt_encrypt(MCRYPT_DES, $key, $prep_code, MCRYPT_MODE_ECB);
        return base64_encode($encrypt);
    } else {
        $prep_code = serialize($data);
        return sha1(substr(md5($key), 4, 8) . sha1($prep_code . $key));
    }
}

/**
 * 解密函数
 * @param type $data 解密的数据
 * @param type $type 解密场景，3为解密手机号，4为解密身份证号，6为解密后台邮件账号密码，8为解密银行卡
 * @return type
 */
function decrypt($str, $type, $is_old = false) {
    $str = strval($str);
    switch ($type) {
        case 3:
            if ($is_old) {
                $key = 'DSBmwMafu23!4&58G8*2';
            } else {
                $key = C('SITE_OTHER_KEY');
            }
            break;
        case 4:
            if ($is_old) {
                $key = 'DSBmwMafu23!4&58G8*2';
            } else {
                $key = C('SITE_OTHER_KEY');
            }
            break;
        case 6:
            $key = C('BACK_OTHER_KEY');
            break;
        case 7:
            $key = C('SITE_OTHER_KEY');
            break;
        case 8:
            $key = C('SITE_OTHER_KEY');
            break;
    }
    $str = base64_decode($str);
    $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
    $block = mcrypt_get_block_size('des', 'ecb');
    $pad = ord($str[($len = strlen($str)) - 1]);
    if ($pad && $pad < $block && preg_match('/' . chr($pad) . '{' . $pad . '}$/', $str)) {
        $str = substr($str, 0, strlen($str) - $pad);
    }
    return unserialize($str);
}
/**
* 获取广告方法
* @since: 2016-3-8
* @author: h.
* @param: $GLOBALS
* @return:
*/
function getAd($l_id,$type=""){
    $ad_info = new \Common\Model\AdvertisementModel();//实例化$ad_info对象
    $list = $ad_info->getAdForLoction($l_id);
    return $list;
}