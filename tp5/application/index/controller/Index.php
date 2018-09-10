<?php
namespace app\index\controller;


use think\Controller;

class Index extends Common
{
    public function index()
    {
//        查出所有文章列表
        $articleData=db('tp_article')->order('time desc')->field('id,title,desc,keywords,author,time,pic')->paginate(4);
        $this->assign('articleData',$articleData);
      return $this->fetch();
    }

}

