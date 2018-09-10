<?php
namespace app\admin\validate;
use think\Validate;
class Article extends Validate
{
//    验证规则
    protected $rule = [
        'title' => 'require|max:30|unique:tp_article',
        'author' => 'require|max:25|unique:tp_article'
    ];
//提示文字
    protected $message = [
        'title.require'=>'标题必须填写',
        'title.max'=>'标题最多不能超过25个字符',
        'title.unique'=>'标题必须唯一',
        'author.require'=>'作者必须填写',
        'author.max'=>'作者最多不能超过25个字符',
        'author.unique'=>'作者必须唯一',

    ];
    //验证场景
    protected $scene = [
        'add' => ['title', 'author'],
        'edit' => ['title', 'author']
    ];
}
