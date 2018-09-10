<?php
namespace  app\index\widget;
//公共部分提取
use think\Controller;

class  Common extends Controller {
//    导入模板
    public function  header(){
//        查询所用栏目
        $cateData=db('tp_cate')->select();
//        查询所有标签
        $tagData=db('tp_tages')->select();
        $this->assign([
            'cateData'=>$cateData,
            'tagData'=>$tagData
        ]);
        return  $this->fetch("common/header");
    }
    public  function  footer(){
        return $this->fetch("common/footer");

    }
    public  function  right(){
//        热门点击数据
        $hotData=db('tp_article')->order('click desc,time desc')->limit(4)->select();
        $this->assign('$hotData',$hotData);
//        推荐阅读
        $readData=db('tp_article')->where(array('state'=>1))->limit(4)->select();
        $this->assign('readData',$readData);
        return $this->fetch('common/right');
    }
}