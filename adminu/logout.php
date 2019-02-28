<?php 
require_once('../config/config.inc.php');
require_once('class/adminu.class.php');
check::unAllCookies();
check::unAllsession();
check::Alert('已退出','/adminu');
?>