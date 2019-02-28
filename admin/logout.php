<?php 
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
check::unAllCookies();
check::unAllsession();
check::Alert('已退出','/admin');
?>