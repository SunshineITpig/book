<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	    <title>后台</title>
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/reset.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/text.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/grid.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/layout.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/nav.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/jquery-ui.css" media="screen" />
	    <script src="/book/Public/Base/JS/jquery-3.2.1.min.js" type="text/javascript"></script>
	    <script src="/book/Public/Base/JS/jquery-ui.min.js" type="text/javascript" ></script>
	    <script src="/book/Public/Base/JS/setup.js" type="text/javascript"></script>
	    <!-- 默认打开目标 -->
		<base target="iframe"/>
	</head>
	<body>
	    <div class="container_12">
	        <div class="grid_12 header-repeat">
	            <div id="branding">
	                <div class="floatleft">
	                    <img src="/book/Public/Base/Imgs/logo.png" alt="Logo" style="height:35px; width: 50px; margin-left: 20px;" />
	                </div>
	                <div style="color:white;text-align: center;vertical-align:middle;height:40px;line-height:40px;font-size:16px;margin:0 0 0 0;padding: 0 0 0 0;display:inline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天津财经大学图书馆座位预定后台管理系统</div>
	                <div class="floatright"> 
	                    <div class="floatleft">
	                        <img src="/book/Public/Base/Imgs/img-profile.jpg" alt="Profile Pic" /></div>
	                    <div class="floatleft marginleft10">
	                        <span id="loginout" class="small grey">
	                        	<!-- <a href="#"> -->
	                        	hello admin
	                        	<!-- </a> -->
	                        </span>
	                    </div>
	                </div>
	                <div class="clear">
	                </div>
	            </div>
	        </div>
	        <div class="clear">
	        </div>
	       
	        <div class="grid_2">
	            <div class="box sidemenu">
	                <div class="block" id="section-menu">
	                    <ul class="section menu">
	                        <li><a class="menuitem">座位管理</a> 
	                            <ul class="submenu">
	                                <li><a href="<?php echo U('Floor/add');?>">添加楼层</a> </li>
	                                <li><a href="<?php echo U('Floor/index');?>">查看楼层</a> </li>
	                            </ul>
	                        </li>
	                        <li><a class="menuitem">规则管理</a>
	                            <ul class="submenu">
	                                <li><a>可签离时间</a> </li>	                                
	                                <li><a>诚信值设置</a> </li>
	                                <li><a>提前预定时间</a> </li>
	                            </ul>
	                        </li>
	                        <li><a class="menuitem">账号管理</a>
	                            <ul class="submenu">
	                                <li><a href="<?php echo U('Account/add');?>">添加学生账号</a> </li>
	                                <li><a href="<?php echo U('Account/del');?>">删除学生账号</a> </li>
	                                <li><a href="<?php echo U('Account/index');?>">查看学生账号</a> </li>
	                            </ul>
	                        </li>
	                        <li><a class="menuitem">管理员</a>
	                            <ul class="submenu">
	                                <li><a href="<?php echo U('passwd');?>">修改密码</a> </li>
	                                <li><a href="<?php echo U('report');?>">举报列表</a> </li>
	                            </ul>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	        <div class="grid_10">
	        	<div id="right">
					<iframe  frameboder="0" border="0" 	scrolling="yes" 
					style="width: 100%;height: 600px;"  name="iframe" src="<?php echo U('Floor/index');?>">
					</iframe>
				</div>
	        </div>
	        <div class="clear">
	        </div>
	    </div>
	    <div class="clear">
	    </div>
	    <div id="site_info">
	        <p style="text-align: center;">
	            欢迎使用图书馆座位预定后台管理系统
	        </p>
	    </div>

	</body>
</html>