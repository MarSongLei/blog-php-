<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate{
//    受保护的属性--验证规则
    protected  $rule=[
        'username'=>'require|max:25|unique:tp_admin',
        'password'=>'require'
    ];
//    提示文字
    protected $message=[
        'username.require'=>'用户名必须填写',
        'username.max'=>'用户名最多不能超过25个字符',
        'username.unique'=>'用户名必须唯一',
        'password.require'=>'密码必须填写'
    ];
//    验证场景
   protected $scene=[
       'add'=>['username','password'],
       'edit'=>['username']
   ];
}