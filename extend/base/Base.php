<?php
namespace base;

use \app\data\model\UserModel;

class Base
{
    // 配置参数
    private $sign_key = 'x$sfxF%Qu4';
    public $res = ["code" => "-1", "msg" => "", "info" => [], "list" => []];

    /**
     * 构造函数
     * @param array $res
     */
    public function __construct($res = array())
    {
        if ($res && count($res) > 0) {
            foreach ($res as $key => $val) {
                $this->res[$key] = $val;
            }
        }
        if(!self::checkToken()){
            //die(json_encode($this->res));
        }
    }
    
    /**
     * 错误返回
     * @param array $res
     */
    public function erres($msg){
        $this->res['code'] = -1;
        $this->res['msg'] = $msg;
        return $this->res;
    }
    /**
     * 成功返回
     * @param array $res
     */
    public function sucres($info = array(), $list = array()){
        $this->res['code'] = 1;
        $this->res['msg'] = 'success';
        $this->res['info'] = $info;
        $this->res['list'] = $list;
        return $this->res;
    }

    /**
     * 验证签名
     * @return bool
     */
    public function checkToken(){
        //验证签名
        $sign_str = '';
        $token_ori = input('token','');
        if(empty($token_ori)){
            $this->res['code'] = -1;
            $this->res['msg'] = 'Token签名串不能为空';
            return false;
        }
        $params = input();
        $pathinfo = '/'.request()->pathinfo();
        if(!empty($params)){
            ksort($params);
            foreach($params as $k=>$v){
                if($k == 'token' || $k == $pathinfo){
                    continue;
                }
                $sign_str .= $k."=".$v."&";
            }
            if(!empty($sign_str)){
                $sign_str = substr($sign_str,0,-1);
            }
        }
        
        $token = strtoupper(md5($sign_str.$this->sign_key));
        if(strtoupper($token_ori) != $token){
            $this->res['code'] = -1;
            $this->res['msg'] = 'Token签名错误';
            return false;
        }
        return true;
    }

    /**
     * 通过ck获取登录用户信息
     * @param $ck
     * @return array
     */
    public function getUserInfoByCk($ck){
        $UserModel = new UserModel();
        $UserModel->extendExpireTime($ck);
        $userinfo = $UserModel->getLoginUserInfo($ck);
        if(empty($userinfo)){
            return array();
        }
        $userid = $userinfo['uid'];
        return array(
            'uid' => $userid,
        );
    }
    /**
     * 验证登录态
     * @param $ck
     * @return array
     */
    public function checkLogin($uid = '', $ck = ''){
        if(!$uid) $uid = input('uid');
        if(!$ck) $ck = input('ck');
        if(true){
            return true;
        }else{
            return false;
        }
    }
}

?>