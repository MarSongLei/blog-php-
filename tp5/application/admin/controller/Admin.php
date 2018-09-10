<?php
namespace app\admin\controller;
use  think\Controller;
use think\Db;
use think\Loader;
use think\Validate;
class Admin extends Common
{
//    管理人列表
    public function index()
    {

//        查询数据将添加的数据导入
        $data = Db::name('tp_admin')->select();//二维数组
        //        加载数据分页
        $data = Db::name('tp_admin')->paginate(3);
//        var_dump($data);exit;
//        把数据变量分配到模板
//        assign  参数1表示模板里面的名称  $data数据库数据
        //也是继承Controller
        $this->assign('data', $data);
        //返回结果是对象也叫结果集
        return $this->fetch("listing/listpage");
    }
//    管理人添加
    public function add()
    {
//       判断提交方式是get还是 POST
        if (request()->isPost()) {
//            var_dump($_POST);exit;
//            接收提交的参数用数组接收
//            普通的参数
//            $data=[
//                'username'=>$_POST['username'],
//                'password'=>$_POST['password']
//            ];
////            dump只适用于框架里面
//            var_dump($data);exit;
            $data = [
                'username' => input('username'),
                'password' => input('password')
            ];
//           dump($data);exit;
//            完全限定名称
//            独立验证
//            $validate=new \think\Validate([
//                'username'=>'require|max:25|min:6',
//                'password'=>'require|max:6'
//            ]);
//                     if(!validate->check($data)){
//                return $this->error($validate->getError());
//            }
            $validate=validate('Admin');
         if(!$validate->scene('add')->check($data)){
             return $this->error($validate->getError());
         }
//            密码加密
            $data['password'] = md5($data['password']);
//            保存数据
            //insert 成功返回条数   失败返回false
            $res = Db::name('tp_admin')->insert($data);
            if ($res) {
                return $this->success('添加成功', url('Admin/index'));
            } else {
                return $this->error('添加失败');
            }
        }
        return $this->fetch("listing/add");
    }

//    管理员修改
    public function edit()
    {
        $id = input('id');
//        返回结果是一个一维数组
        $data = Db::name('tp_admin')->find($id);
//        $data=Db::name('tp_admin')->where(array('id'=>$id))->find();
////        打印sql语句 就近原则
//        echo db()->getLastSql();exit;
        $this->assign('data', $data);

        return $this->fetch('listing/edit');
    }

//    管理员删除
    public function del()
    {
//        将id参数通过get方式传过来
        $id = input('id');
        if ($id == 1) {
            return $this->error('超级管理员不能被删除');
        }
//        删除 通过ID删除 默认删除一条
        $res = Db::name('tp_admin')->delete($id);
        if ($res) {
            return $this->success('删除成功', url('Admin/index'));
        } else {
            return $this->error('删除失败');
        }
    }
//管理员修改保存,执行修改
    public function  upd(){
        $data=[
            'id'=>input('id'),
            'username'=>input('username'),
        ];
        $password=input('password');
        $validate=validate('Admin');
//        var_dump($data);exit;
        if(!$validate->scene('edit')->check($data)){
            return $this->error($validate->getError());
        }
//        判断密码是否修改
        if($password!=''){
            //修改密码,将密码拼进数组
            $arr['password']=md5($password);
        }
        //修改数据--必须加where 条件,如果参数有主键，默认有WHERE
        $res=Db::name('tp_admin')->where(['id'=>$data['id']])->update($data);
//        echo db()->getLastSql();exit;
//        修改update  方法  修改成功返回受影响行数，失败返回false,不修改返回0
        if($res !==false){
//            修改成功
            return $this->success('修改成功',url('index'));
        }
        else{
            return $this->error('修改失败');
        }
    }
    //    退出登录
    public  function  logout(){
//        清除session
        session('admin',null);
        $this->success('退出成功',url('Login/login'));

    }
}