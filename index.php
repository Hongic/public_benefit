<?php

/*
 * 功能：网站的总入口文件
 */

// 项目名称 
define("APP_NAME", "APP");

// 项目地址
define("APP_PATH", "./APP/");

// 开启调试
define("APP_DEBUG", TRUE);

// 秘钥一
define("TOKIONE", "6.0.2");

// 秘钥二
define("TOKITWO", "2-1-2");

// TP的核心文件
require './ThinkPHP/ThinkPHP.php';
?>
