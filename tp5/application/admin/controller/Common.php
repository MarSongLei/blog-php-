<?php
namespace  app\admin\controller;
use think\Controller;
use think\Request;

class Common extends  Controller{
    public function __construct(){
        parent::__construct();
        $admin=session('admin');
        if(empty($admin)||!isset($admin)){
            return $this->error('未登录，请先登录。。。',url('Login/login'));
        }
    }
}