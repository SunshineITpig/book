<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>我的</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="/book/Public/Develop/CSS/login.css" media="screen" />
        <link rel="stylesheet" href="/book/Public/Develop/CSS/public.css" />
        <script type="text/javascript" src="/book/Public/Develop/JS/jquery-3.2.1.min.js"></script>
        <style type="text/css">h2{height:40px; font-size: 14px;}</style>
    </head>

    <body>
        <div class="container">
            <div class="clear"></div>
            <div class="box div">
                <div class="clear" style="height: 20px;"></div>
                <h2>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;信任值:<span style="padding-left: 30px;
                    color: red;"><?php echo ($trust); ?></span> 
                    <div>
                        <a href="<?php echo U('main',array('fid'=>1));?>">
                            <img src="/book/Public/Develop/Imgs/cross.png" alt="返回" style="float:right;
                            width: 20px; height: 20px; margin-top: -20px;" />
                        </a>
                    </div>
                </h2>

                <table class="table">
                    <tr>
                        <span class="little">预定记录</span>
                    </tr>
                    <tr>
                        <td class="tdLittle2">楼层</td>
                        <td class="tdLittle2">座位</td>
                        <td class="tdLtitle4">预订时间</td>
                        <td class="tdLtitle4">签离时间</td>
                    </tr>
                    <?php if(is_array($record)): foreach($record as $key=>$n): ?><tr>
                            <td ><?php echo ($n["fid"]); ?></td>
                            <td><?php echo ($n["sid"]); ?></td>
                            <td><?php echo (date('Y-m-d  H:i:s',$n["booktime"])); ?></td>
                            <td><?php echo (date('Y-m-d  H:i:s',$n["lefttime"])); ?></td>
                        </tr><?php endforeach; endif; ?>
                </table>
                <div class="page">
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </body>

</html>