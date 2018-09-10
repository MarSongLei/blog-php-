<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Links extends Common
{
//    友情链接页面
    public function index()
    {
//        将要添加到主页的数据筛选出出来
        $data = Db::name('tp_links')->select();
//        将添加主页内容分页
        $data = Db::name('tp_links')->paginate(3);
//        将筛选出的数据分配到模板
        $this->assign('data', $data);
        return $this->fetch();
    }

//    友情链接添加
    public function add()
    {
//        判断提交方式
        if (request()->isPost()) {
//            接收提交的数据
            $data = [
                'linkname' => input('linkname'),
                'url' => input('url'),
                'desc' => input('desc')
            ];
//            验证提交的信息
            $validate = validate('Links');
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
            }
//            新增信息添加到数据库
            $res = Db::name('tp_links')->insert($data);
            if ($res) {
                return $this->success('链接添加成功', url('Links/index'));
            } else {
                return $this->error('添加失败');
            }
        }
        return $this->fetch();
    }

//    链接删除
    public function del()
    {
//        通过id获取要删除的条号
        $id = input('id');
//        要删除的数据
        $res = Db::name('tp_links')->delete($id);
        if ($res) {
            return $this->success('删除成功', url('Links/index'));
        } else {
            return $this->error('删除失败');
        }
    }
//    修改页面
    public function edit(){
//        找到要修改的内容
        $id = input('id');
        $data=Db::name('tp_links')->find($id);
//        var_dump($data);exit;
        $this->assign('data',$data);
        return $this->fetch();
    }
//    执行修改
    public  function  upd(){
        $data = [
            'linkname' => input('linkname'),
            'url' => input('url'),
            'desc' => input('desc')
        ];
//            验证提交的信息
        $validate = validate('Links');
        if (!$validate->scene('edit')->check($data)) {
            $this->error($validate->getError());
        }
        $data['id']=input('id');
//            新增信息添加到数据库
        $res = Db::name('tp_links')->update($data);
        if ($res!== false) {
            return $this->success('链接修改成功', url('Links/index'));
        } else {
            return $this->error('修改失败');
        }

    }
}