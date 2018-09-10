<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"G:\blog\tp5\public/../application/index\view\error\error.html";i:1505872761;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>页面错误</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background: url("__STATIC__/index/images/errorBg.jpg") no-repeat;
            background-size: 1356px 768px;
            height: 768px;
            overflow: hidden;
        }
        .center{
            text-align: center;
        }
        .center p{
            font-size: 50px;
            font-weight: bold;
            color: white;
            margin-top: 200px;
        }
        .center a{
            font-size: 40px;
            color: #2c56b1;
        }
    </style>
</head>
<body >
<div class="center">
     <p >网页找不到了，呜呜呜 <br>

     .......</p>
    <a href="<?php echo url('Index/index'); ?>">返回首页试试</a>
</div>
    
</div>
</body>
</html>