<?php 
require_once('config/config.inc.php');
$objWebInit = new Secondar();
if(empty($Config)){
	header("location:./install");
}else{
	$arrOutput['web']=$Config['web'];
	$objWebInit->output($arrOutput,'index.html');
}

