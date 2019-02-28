<?php
require_once('../config/config.inc.php');
require_once('class/adminu.class.php');
$objWebInit = new adminu();
if(check::is_post()){
	if(empty($_POST['pwd'])){
		check::Alert('请输入原密码');
	}else if(empty($_POST['new_pwd'])){
		check::Alert('请输入新密码');
	}else if(empty($_POST['new_pwd1'])){
		check::Alert('请再次输入新密码');
	}else if($_POST['new_pwd1']!=$_POST['new_pwd']){
		check::Alert('两次密码不一致');
	}else{
		$objWebInit->db_where('u_id',$_SESSION['u_id'],'=');
		$objWebInit->db_where('u_pwd',jampwd(trim($_POST['pwd'])),'=');
		$arrInfoList = $objWebInit->db_select('mcenter');
		if(empty($arrInfoList)){
			check::Alert('原密码不正确');
		}else{
			$objWebInit->db_where('u_id',$_SESSION['u_id'],'=');
			$arrInfoList = $objWebInit->db_update('mcenter',array('u_pwd',jampwd(trim($_POST['new_pwd']))));
			session_unset();
			session_destroy();
			check::Alert('修改成功','/adminu');
		}
	}
}

$arrOutput['web'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/manage_passwoed.html');