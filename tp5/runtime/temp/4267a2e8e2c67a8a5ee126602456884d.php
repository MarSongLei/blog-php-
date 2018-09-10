<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"G:\blog\tp5\public/../application/index\view\common\header.html";i:1505786579;}*/ ?>
<div class="ladytop">
    <div class="nav">
        <div class="left"><a href=""><img src="__STATIC__/index/images/hunshang.png" alt="wed114婚尚"></a></div>
        <div class="right">
            <div class="box">
                <a href="<?php echo url('Index/index'); ?>">首页</a>
                <?php foreach($cateData as $v): ?>
                <a href="<?php echo url('Listing/listing',['id'=>$v['id']]); ?>"  rel='dropmenu209'><?php echo $v['catename']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="hotmenu">
    <div class="con">
        热门标签：
        <?php foreach($tagData as $v): ?>
        <a href='qiwenqushi/'><?php echo $v['tagname']; ?></a>
        <?php endforeach; ?>
    </div>
</div>