<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"G:\blog\tp5\public/../application/index\view\article\article.html";i:1507432832;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>博客</title>
    <meta name="keywords" content="童老师ThinkPHP交流群：484519446"/>
    <meta name="description" content="童老师ThinkPHP交流群：484519446"/>
    <meta name="mobile-agent" content="format=html5; url=http://m.zx.wed114.cn/shenghuo/20160920156214.html"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <link href="__STATIC__/index/style/lady.css" type="text/css" rel="stylesheet"/>
    <script type='text/javascript' src='_STATIC__/index/style/ismobile.js'></script>
</head>

<body>
<?php echo widget('Common/header'); ?>
<!--顶部通栏-->
<script src='/jiehun/goto/my-65547.js' language='javascript'></script>

<div class="position"><a href='<?php echo url('Index/index'); ?>'>主页</a> >
    <a href='<?php echo url('listing/listing',['id'=>$article['id']]); ?>'><?php echo $article['catename']; ?></a> >  </div>

<div class="overall">
    <?php echo widget('common/right'); ?>
    <div class="left">
        <div class="scrap">
            <h1><?php echo $article['title']; ?></h1>
            <div class="spread">
                <span class="writor">发布时间<?php echo date( 'Y-m-d,H-i-s',$article['time']); ?></span>
                <span class="writor">编辑：<?php echo $article['author']; ?></span>
                <span class="writor">标签：<a href='/jiehun/z97712.html'><?php echo $article['keywords']; ?></a></span>
                <span class="writor">热度：<script src="/jiehun/plus/count.php?view=yes&aid=156214&mid=55" type='text/javascript' language="javascript"></script> <?php echo $article['click']; ?></span>
            </div>
        </div>

        <!--百度分享-->
        <script src='/jiehun/goto/my-65542.js' language='javascript'></script>

        <div class="takeaway">
            <span class="btn arr-left"></span>
            <p class="jjxq"><?php echo $article['desc']; ?>
            </p>
            <span class="btn arr-right"></span>
        </div>

        <script src='/jiehun/goto/my-65541.js' language='javascript'></script>

        <div class="substance">
            <?php echo $article['content']; ?>
            <div class="biaoqian">

        </div>



        <!--相关阅读 -->
        <div class="xgread">
            <div class="til"><h4>相关阅读</h4></div>
            <div class="lef"><!--相关阅读主题链接--><script src='/jiehun/goto/my-65540.js' language='javascript'></script></div>
            <div class="rig">
                <ul>
                    <?php foreach($articleData as $v): ?>
                    <li><a href='<?php echo url('Article/article',['id'=>$v['id']]); ?>' target="_blank"><?php echo $v['title']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!--频道推荐-->
        <div class="hotsnew">
            <div class="til"><h4>频道推荐</h4></div>
            <ul>
                <?php foreach($articleData as $v): ?>
                <li>
                    <div class="tu">
                        <a href='./images/20160920156214.html' target="_blank">
                            <img src="<?php echo $v['pic']; ?>" alt="<?php echo $v['title']; ?>"/>
                        </a>
                    </div>
                    <p>
                        <a href='<?php echo url('Article/article',['id'=>$v['id']]); ?>'><?php echo $v['title']; ?></a>
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


</div>


<?php echo widget('Common/footer'); ?>
<div style="display:none;">
    <script src='__STATIC__/index/jiehun/goto/my-65537.js' language='javascript'></script>
    <script src="/jiehun/images/js/count_zixun.js" language="JavaScript"></script>
</div>

</body>
</html>