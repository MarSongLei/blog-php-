<?php
namespace app\admin\validate;
use  think\Validate;
class Tags extends  Validate{
//    验证规则
protected   $rule=[
   'tagname'=>'require|max:10|unique:tp_tages'
];
//提示文字
protected  $message=[
   'tagname.require'=>'标签必须填写',
    'tagname.max'=>'标签名称长度不能超过10位',
    'tagname.unique'=>'标签名称必须唯一'
];
//验证场景
protected  $scene=[
    'add'=>['tagname']
];
}