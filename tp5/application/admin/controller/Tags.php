<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Tags extends Common
{
//    标签管理主页
    public function index()
    {
//        将要添加的数据 筛选出来
        $data = Db::name('tp_tages')->select();
//        内容分页
        $data = Db::name('tp_tages')->paginate(3);
//        将分好的数据分配到模板
        $this->assign('data', $data);
        return $this->fetch();
    }

//    标签管理添加
    public function add()
    {
        if (request()->isPost()) {
            $data = [
                'tagname' => input('tagname')
            ];

            //        验证提交信息
            $validate = validate('Tags');
            if (!$validate->scene('add')->check($data)) {
                return $this->error($validate->getError());
            };
//            将验证成功的数据提交到数据库
            $res=Db::name('tp_tages')->insert($data);

            if ($res) {
                $this->success('添加成功', url('Tags/index'));
            } else {
                $this->error('添加失败');
            }
        }
        return $this->fetch();
    }

//    栏目删除
    public function del()
    {
        $id = input('id');
        $res = Db::name('tp_tages')->delete($id);
        if ($res) {
            return $this->success('删除成功', url('Tags/index'));
        } else {
            return $this->error('删除失败');
        }
    }

//    栏目修改
    public function edit()
    {
        $id = input('id');
        $data = Db::name('tp_tages')->find($id);
        $this->assign('data', $data);
        return $this->fetch();
    }

//    执行修改
    public function upd()
    {
        $data = [
            'tagname' => input('tagname')
        ];
//        验证信息
        $validate = validate('Tags');
//        var_dump($data);exit;
        if (!$validate->scene('edit')->check($data)) {
            return $this->error($validate->getError());
        }
        $data['id']=input('id');
        $res = Db::name('tp_tages')->update($data);
//        echo db()->getLastSql();
//        exit;
        if ($res!==false) {
            return $this->success('修改成功',url('Tags/index'));
        }
        else{
        return $this->error('修改失败');

    }
    }
}