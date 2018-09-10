<?php
namespace app\admin\controller;
use think\captcha\Captcha;
use think\Controller;
class  Code extends  Controller{
//    生成验证码
public  function  makeCode(){
    $captcha=new Captcha();
     return $captcha->entry();
}
}