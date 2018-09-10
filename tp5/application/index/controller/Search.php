<?php
namespace  app\index\controller;
use think\Controller;
class Search extends  Common {
    public function index(){
//        根据搜索查出数据
        $keywords=input('keywords');
        $map['title']=['like','%'.$keywords.'%'];
        $article=db('tp_article')->field('id,keywords,title,pic,time,desc')->where($map)->paginate(2,false,['query'=>[
            'keywords'=>$keywords
        ]]);
        $this->assign('article',$article);
        return $this->fetch('search/list');
    }
}