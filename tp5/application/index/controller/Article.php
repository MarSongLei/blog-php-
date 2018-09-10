<?php
namespace app\index\controller;
use think\Controller;
class  Article extends  Common {
    function  article(){
        $id=input('id');
//        点击量加1
//        热度自增
        db('tp_article')->where(['id'=>$id])->setInc('click',1);
//        文章详情页
        $id=input('id');
//        根据id查出文章详情
        $article=db('tp_article')
            ->alias('a')
            ->field('a.*,c.id,c.catename')
            ->join('tp_cate c','a.cateid=c.id','left')//左联
        ->find($id);
//        var_dump($article);exit;
//        echo  db()->getLastSql();exit;
        $this->assign('article',$article);
        $articleData=db("tp_article")->select();
        $this->assign('articleData',$articleData);

        return  $this->fetch('article');
    }
}