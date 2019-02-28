<?php
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
$objWebInit = new admin();
if(!empty($_SESSION['a_id'])||!empty($_COOKIE['a_id'])){
	header("location:./index.php");
}
if(check::is_post()){
	if(empty($_POST['name'])){
		check::Alert('用户名不能为空');
	}else if(empty($_POST['password'])){
		check::Alert('密码不能为空');
	}else{
		$objWebInit->db_where('a_name',trim($_POST['name']),'=');
		$objWebInit->db_where('a_pwd',jampwd(trim($_POST['password'])),'=','and');
		$arrAInfo = $objWebInit->db_select('acenter');
		if(!empty($arrAInfo)){
			unset($arrAInfo[0]['a_pwd']);
			$_SESSION = $arrAInfo[0];
			if(!empty($_POST['check'])){
				setcookie("a_id",$arrAInfo[0]['a_id'],time()+15*24*3600);
				setcookie("a_name",$arrAInfo[0]['a_name'],time()+15*24*3600);
			}
			header("location:./index.php");
		}else{
			check::Alert('用户名或密码错误','./login.php');
		}
	}
}

$arrOutput['web'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/login.html');