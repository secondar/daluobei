<?php
/**
 * 全局配置文件
 */
@session_start();
define('__WEB_ROOT', dirname(__FILE__)."/..");
@include_once(__WEB_ROOT .'/data/config.php');
include_once(__WEB_ROOT.'/Pure/php_common.php');
include_once(__WEB_ROOT.'/config/Plugin.inc.php');
include_once(__WEB_ROOT.'/config/common.fun.php');
header('Content-Type: text/html; charset=UTF-8');