<?php
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
$objWebInit = new admin();
if(empty($_SESSION['a_id'])&&empty($_COOKIE['a_id'])){
	header("location:./login.php");
}else{
	Jurisdiction();
}
$arrOutput['web'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/index.html');