<?php

define('APP_DEBUG',True);

//默认加载模块
$_GET['m'] = 'Admin';

// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

