<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"G:\blog\tp5\public/../application/index\view\listing\list.html";i:1507432832;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>博客</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
    <link href="__STATIC__/index/style/lady.css" type="text/css" rel="stylesheet"/>
    <script type='text/javascript' src='__STATIC__/index/images/js/ismobile.js'></script>
</head>

<body>

<?php echo widget('Common/header'); ?>

<!--顶部通栏-->


<div class="position"><a href='<?php echo url('Index/index'); ?>'>主页</a> > <a href=''><?php echo $cate['catename']; ?></a> ></div>

<div class="overall">
    <?php echo widget('Common/right'); ?>
    <div class="left">
        <?php foreach($article as $v): ?>
        <div class="xnews2">
            <div class="pic"><a target="_blank" href="<?php echo url('Article/article',['id'=>$v['id']]); ?>"><img
                    src="<?php echo $v['pic']; ?>" alt="<?php echo $v['title']; ?>"/></a></div>
            <div class="dec">
                <h3><a target="_blank" href="<?php echo url('Article/article',['id'=>$v['id']]); ?>"><?php echo $v['title']; ?></a></h3>
                <div class="time"><?php echo date("Y-m-d H:i:s",$v['time']); ?></div>
                <p><?php echo $v['desc']; ?> </p>
                <div class="time"><a href='z97712.html'><?php echo $v['keywords']; ?></a></div>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="pages">
            <div class="plist">
                <?php echo $article->render(); ?>
            </div>
        </div>
    </div>



</div>
<?php echo widget('Common/footer'); ?>

<div style="display:none;">
    <script src='__STATIC__/index/goto/my-65537.js' language='javascript'></script>
    <script src="images/js/count_zixun.js" language="JavaScript"></script>
</div>

</body>