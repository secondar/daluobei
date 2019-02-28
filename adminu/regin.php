<?php
require_once('../config/config.inc.php');
require_once('class/adminu.class.php');
$objWebInit = new adminu();
if(check::is_post()){
	if(empty($_POST['name'])){
		check::Alert('请输入用户名','./regin.php');
	}else if(empty($_POST['email'])){
		check::Alert('请输入邮箱','./regin.php');
	}else if(empty($_POST['password'])){
		check::Alert('请输入密码','./regin.php');
	}else if(empty($_POST['password1'])){
		check::Alert('请输入确认密码','./regin.php');
	}else{
		if(trim($_POST['password1'])!==trim($_POST['password'])){
			check::Alert('两次密码不一致','./regin.php');
		}else if($objWebInit->validEmail(trim($_POST['email'])))		{
			$objWebInit->db_where('u_name',trim($_POST['name']),'=');
			$arrInfo = $objWebInit->db_select('mcenter');
			if(!empty($arrInfo)){
				check::Alert('用户名已存在','./regin.php');
			}else{
				$arrData['u_name'] = trim($_POST['name']);
				$arrData['u_pwd'] = jampwd(trim($_POST['password']));
				$arrData['e_mail'] = trim($_POST['email']);
				$arrData['u_regtime'] = date("Y-m-d H:i:s");
				$arrData['u_ip'] = $objWebInit->getIp();
				$arrData['u_logaes'] = '待完成';
				if($objWebInit->db_insert('mcenter',$arrData)){
					check::Alert('注册成功','./login.php');
				}else{
					check::Alert('注册失败','./regin.php');
				}
			}
		}else{
			check::Alert('请输入正确邮箱','./regin.php');
		}
	}
}
$arrOutput['web'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/register.html');