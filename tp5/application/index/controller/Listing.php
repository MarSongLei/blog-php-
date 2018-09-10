<?php
namespace app\index\controller;
use think\Controller;
class Listing extends  Common {
    public  function  listing(){
//        根据id查取这个项目下的所有项目
        $id=input('id');
//        查出栏目名称
         $cate=db('tp_cate')->find();
         $this->assign('cate',$cate);
        $article=db('tp_article')->field('id,desc,time,pic,keywords,title')->where(['cateid'=>$id  ])->paginate(2);
       $this->assign('article',$article);
        return $this->fetch('listing/list');
    }
}