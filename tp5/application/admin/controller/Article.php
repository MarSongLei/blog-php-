<?php
namespace  app\admin\controller;
use think\Controller;
use think\Db;
class Article extends  Common {
//    文章首页
    public  function  index(){
        $id=input('id');
        $data['id']=$id;
        $data=db('tp_article')
            ->alias('a')
            ->field('a.id,a.title,a.desc,a.author,a.time,a.pic,a.state,a.click,a.keywords,c.catename')
//            两边的关联条件
            ->join('tp_cate c','a.cateid=c.id')
            ->paginate(2);
//        echo db()->getLastSql();exit;
//        $data = Db::name('tp_article')->select();
//        $data=db('tp_article')->paginate(2);
        $this->assign('data',$data);
//        var_dump($data);exit;
        return $this->fetch('index');
    }
    public  function  add(){
        if(request()->isPost()){
//            接收参数
            $data=[
                'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),
                'keywords'=>input('keywords'),
                'cateid'=>input('cateid'),
                'content'=>input('content')
            ];
//            判断state
            if(input('state')=='on'){
                $data['state']=1;
            }
            else{
                $data['state']=0;
            }
//            验证
            $validate=validate('Article');
            if(!$validate->scene('add')->check($data)){
               return  $this->error($validate->getError());
            }
//            发布时间
            $data['time']=time();
//            图片处理
//            判断有没有图片上传
            if($_FILES['pic']['tmp_name']!=''){
//                上传图片

               $arr= $this->upload('pic');
               if($arr['status']=='success'){
//                   把图片 路径放在要保存的数据里面
                   $data['pic']=$arr['url'];
               }
               else{
                   return $this->error($arr['msg']);
               }
            }
//          添加数据
            $res=db('tp_article')->insert($data);
            if($res){
                return $this->success('添加成功',url('Article/index'));
            }
            else{
                return $this->error('添加失败');
            }
        }
//        查询所有栏目
        $cateData=db('tp_cate')->select();
        $this->assign('cateData',$cateData);
        return  $this->fetch();
    }
    //            处理图片的方法
    private function upload($filename){
        $file = request()->file($filename);
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
//                echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//                拼接图片完整路径
                $url='/uploads/'.$info->getSaveName();
                $url=str_replace('\\','/',$url);
                return [
                    'status'=>'success',
                    'url'=>$url
                ];
                echo $info->getSaveName();
//                把反斜线换成正斜线

//                // 输出 42a79759f284b767dfcb2a0197904287.jpg
//                echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                return [
                    'status'=>'error',
                    'msg'=>getError()
                ];
                echo $file->getError();
            }
        }

    }
    public  function  del(){
        $id=input('id');
//        查出图片路径
        $picData=db('tp_article')->field('pic')->find($id);
        $pic=$picData['pic'];
//        删除文件
        @unlink('.'.$pic);
        $res=db('tp_article')->delete($id);
        if ($res){
            $this->success('删除成功',url('Article/index'));
        }
        else{
            $this->error('删除失败');
        }
    }
//    修改页面
       public  function  edit(){
           $id = input('id');
           $cateData=db('tp_cate')->select();
           $this->assign('cateData',$cateData);
           $data = Db::name('tp_article')->find($id);
           $this->assign('data', $data);
           return  $this->fetch();
       }
//       执行修改
       public  function  upd(){
//           接收参数
           $data=[
               'id'=>input('id'),
               'title'=>input('title'),
               'author'=>input('author'),
               'desc'=>input('desc'),
               'content'=>input('content'),
               'keywords'=>input('keywords'),
               'cateid'=>input('cateid')
           ];
//           判断state
//           验证信息
           if(input('state')=='on'){
               $data['state']=1;
           }
           else{
               $data['state']=0;
           }
//           处理图片  先上传后删除
           if($_FILES['pic']['tmp_name']!=''){
               $arr=$this->upload('pic');
               if ($arr['status']=='success'){
//                   删除原来的路径
                   $picData=db('tp_article')->field('pic')->find($data['id']);
                   @unlink('.'.$picData['pic']);
                   $data['pic']=$arr['url'];
               }
               else{
                   return  $this->error($arr['msg']);
               }

           }
           $validate=validate('Article');
          if (!$validate->scene('edit')->check($data)){
              return $this->error($validate->getError());
          }
          $res=Db::name('tp_article')->update($data);
           if ($res!==false) {
               return $this->success('修改成功',url('Article/index'));
           }
           else{
               return $this->error('修改失败');
           }
       }
}