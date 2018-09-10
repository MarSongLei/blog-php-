<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
    public  function  login(){
        return $this->fetch();
    }
    public function  doLogin(){
//        加载登录页面
        $data=[
            'username'=>input('username'),
            'password'=>input('password'),
            'code'=>input('code')
        ];
//        验证
        if(!$data['username']){
            return $this->error('用户名不能为空');
        }
        if(!$data['password']){
            return $this->error('密码不能为空');
        }
        if(!$data['code']){
            return $this->error('验证码不能为空');
        }
//        判断验证码是否正确
        if(!captcha_check($data['code'])){
            return $this->error('验证码错误',url('Login/login'));
        }
//        判断用户是否存在
        $info=db('tp_admin')->where(array('username'=>$data['username']))->find();
        if(!isset($info)||empty($info)){
            return $this->error('用户名或密码错误');
        }
//        注意密码加密
        if ($info['password']!=md5($data['password'])){
            return $this->error('密码错误');
        }
//        登录成功后跳转
//        用户信息存入session
        session('admin',$info);//第一个参数是自定义，第二个是调取的信息
        return $this->success('登录成功，正在跳转',url('Index/index'));
    }
}


