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
                <h2 style="height: 70px;">
                    天津财经大学图书馆座位预定后台管理系统
                </h2>
                <div class="form">
                    <div class="login" style="margin-right: 300px;margin-top: 50px">
                        <form action="<?php echo U('login');?>" method='post' name='login' class="block">
                                <p>
                                    <label for="account">账号：</label>
                                    <input type="text" name='account' class='input' placeholder="请输入账号..."/>
                                </p>
                                <p>
                                    <label for="pwd">密码：</label>
                                    <input type="password" name='pwd' class='input' placeholder="请输入密码..."/>
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