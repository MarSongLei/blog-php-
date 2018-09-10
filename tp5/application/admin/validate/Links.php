<?php
namespace app\admin\validate;
use think\Validate;
class Links extends Validate
{
//    验证规则
    protected $rule = [
        'linkname' => 'require|max:30|unique:tp_links',
        'url' => 'require|max:25|unique:tp_links'
    ];
//提示文字
    protected $message = [
        'linkname.require'=>'链接必须填写',
        'linkname.max'=>'链接最多不能超过25个字符',
        'linkname.unique'=>'链接必须唯一',
        'url.require'=>'链接地址必须填写',
        'url.max'=>'链接地址最多不能超过25个字符',
        'url.unique'=>'链接地址必须唯一',

    ];
    //验证场景
    protected $scene = [
        'add' => ['linkname', 'url'],
        'edit' => ['linkname', 'url']
    ];
}
