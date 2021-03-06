<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
    <head>
        <title>首页</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="/book/Public/Develop/CSS/login.css" media="screen" />
        <script type="text/javascript" src="/book/Public/Develop/JS/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/book/Public/Develop/JS/login.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="clear">&nbsp;&nbsp;</div>
            <div class="box div">
                <h2>
                    欢迎使用图书馆座位预定系统
                </h2>
                <div class="form">
                    <div class="inform">
                        <h3>欢迎使用图书馆空间预约系统</h3>
                        使用说明：<br/>
                        1. 可通过微信、网页等方式预约。<br/>
                        网页预约: 浏览器访问http://seat.lib.whu.edu.cn，使用本人账号登录后即可预约。<br/>
                        2. 使用图书馆账号（一般为学号、人事号）及图书馆密码登录本系统。<br/>
                        3. 开放预约时间：01:00到23:30可预约当日座位，22:15-23:50可预约次日座位。<br/>
                        4. 系统支持快速预约和自选座位两种方式；预约到期保留30分钟，需在规定时间内刷卡入馆签到，在规定时间内未到馆签到，且未取消预约将记违约一次。<br/>
                        5. 读者刷卡出馆后为暂离，超过暂离时间后，系统将自动释放座位，记违约一次；一般暂离时间为30分钟，用餐（中午11点至13点，下午17点至19点）暂离时间为60分钟。<br/>
                        6. 读者离开座位不再使用时，须点击结束使用释放座位，否则视为违约。<br/>
                        7. 请勿使用程序脚本等非正常方式使用本系统。<br/><br/>
                        系统公告:<br/>
                        1. &nbsp;2018年1月12日，以下账号因使用恶意程序，停止预约权限：<br/>201330****048/201730****015/201720****055/201720****079 
                    </div>
                    <div class="login">
                        <form action="<?php echo U('login');?>" method='post' name='login' class="block">
                                <p>
                                    <label for="account">学号：</label>
                                    <input type="text" name='account' class='input' placeholder="请输入学号..."/>
                                </p>
                                <p>
                                    <label for="pwd">密码：</label>
                                    <input type="password" name='pwd' class='input' placeholder="请输入密码..."/>
                                </p>
                                <p>
                                    <label for="verify" style="float:left;margin-left:0px;">验证码：</label>
                                    <input type="text" name='verify' class='input_1' placeholder="验证码"/>
                                    <img src="<?php echo U('verify');?>" alt="验证码" id="verify_img"/>
                                </p>
                                <p style="margin-top: 20px;">
                                    <input type="checkbox" name='auto' checked='1' class='auto' id='auto'/>
                                    <label for="auto">自动登录</label>
                                </p>
                                <p>
                                    <input type="submit" value='登录' id='login' class="botton" />
                                </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>