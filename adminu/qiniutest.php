<?php 
require_once('../config/config.inc.php');
require_once('class/adminu.class.php');
$objWebInit = new qiniu_upload();
$a=$objWebInit ->qiniu_upload($_FILES['file']);
print_r($a);