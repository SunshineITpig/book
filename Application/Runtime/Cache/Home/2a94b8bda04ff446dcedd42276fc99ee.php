<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>选择</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="/book/Public/Develop/CSS/login.css" media="screen" />
        <script type="text/javascript" src="/book/Public/Develop/JS/jquery-3.2.1.min.js"></script>
        <style type="text/css">.block{width:300px;margin-top:23px;}</style>
    </head>

    <body>
        <div class="container">
            <div class="clear">&nbsp;&nbsp;</div>
            <div class="box div">
                <h2>
                    请选择所需预约的区域
                </h2>
                <div class="form">
                    <?php if(!$area): ?>暂没有可预约的区域
                    <?php else: ?>
                    <?php if(is_array($area)): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><form action="<?php echo U('main',array('fid'=>$n['fid']));?>" method='post' class="block" >
                            <p>
                                <input type="hidden" name="fid" value="<?php echo ($n["fid"]); ?>" />
                                <input type="submit" value="<?php echo ($n["fname"]); ?>"  class="botton" style="width: 360px;height: 60px;text-align:center;margin-left: 270px;" />
                            </p>                           
                        </form><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
            </div>
        </div>
    </body>

</html>