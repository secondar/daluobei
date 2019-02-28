<?php
require_once('../config/config.inc.php');
require_once('class/adminu.class.php');
$objWebInit = new adminu();
if(empty($_SESSION['u_id'])&&empty($_COOKIE['u_id'])){
	header("location:./login.php");
}
$arrOutput['web'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/index.html');