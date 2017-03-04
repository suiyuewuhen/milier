<?php
//1. 设置浏览器响应
header('Content-type:text/html;charset=utf-8');
//2. 设置应用目录
define('APP_PATH', './application/');
//3. 开启调试模式
define('APP_DEBUG', true);
//4. 引入TP核心文件
include_once 'ThinkPHP/ThinkPHP.php';