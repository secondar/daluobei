<?php
require_once('../config/config.inc.php');
require_once('class/adminu.class.php');
$objWebInit = new adminu();
if(!empty($_SESSION['u_id'])||!empty($_COOKIE['u_id'])){
	header("location:./index.php");
}
if(check::is_post()){
	if(empty($_POST['name'])){
		check::Alert('用户名不能为空');
	}else if(empty($_POST['password'])){
		check::Alert('密码不能为空');
	}else{
		$objWebInit->db_where('u_name',trim($_POST['name']),'=');
		$objWebInit->db_where('u_pwd',jampwd(trim($_POST['password'])),'=','and');
		$arrAInfo = $objWebInit->db_select('mcenter');
		if(!empty($arrAInfo)){
			$arrData['u_logtime'] = date("Y-m-d H:i:s");
			$arrData['u_ip'] = $objWebInit->getIp();
			$arrData['u_logaes'] = $objWebInit->curl_https('https://ip.ttt.sh/api.php?ip='.$arrData['u_ip'].'&type=json');
			$arrData['u_logaes'] = json_decode($arrData['u_logaes'],true);
			$arrData['u_logaes'] = $arrData['u_logaes']['addr'];
			$objWebInit->db_where('u_id',$arrAInfo[0]['u_id'],'=');
			$objWebInit->db_update('mcenter',$arrData);
			unset($arrAInfo[0]['u_pwd']);
			$_SESSION = $arrAInfo[0];
			if(!empty($_POST['check'])){
				setcookie("u_id",$arrAInfo[0]['u_id'],time()+15*24*3600);
				setcookie("u_name",$arrAInfo[0]['u_name'],time()+15*24*3600);
			}
			header("location:./index.php");
		}else{
			check::Alert('用户名或密码错误','./login.php');
		}
	}
}

$arrOutput['web'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/login.html');