<?php
namespace app\admin\controller;
use think\Controller;
class  Listing extends Common
{
    public  function  listPage(){
        return $this->fetch();
    }
    public  function  add(){
        return $this->fetch();
    }
    public  function  edit(){
        return $this->fetch();
    }

}