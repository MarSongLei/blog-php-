<?php
namespace  app\index\controller;
use think\Controller;
class Error extends Controller{
    public function _empty(){
        return $this->fetch('error/error');
    }
}