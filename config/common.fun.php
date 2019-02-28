<?php
/**
 * 公用全局函数文件
 */
/**
 * [jampwd 密码处理]
 * @param  [string] $pwd [密码明文字符串]
 * @return [string]      [加密后的密码串]
 */
function jampwd($pwd){
	Global $Config;
	$jam = $Config['web']['jam'];
	$pwd = md5(md5(trim($pwd)).md5($jam));
	return $pwd;
}
function Jurisdiction(){
	if(!empty($_SESSION['a_id'])||!empty($_COOKIE['a_id'])){
		if(empty($_SESSION['a_id'])){
			$intAid = $_COOKIE['a_id'];
		}else{
			$intAid = $_SESSION['a_id'];
		}
		$objWebInit = new Secondar();
		$objWebInit->db_where('a_id',$intAid,'=');
		$arr = $objWebInit->db_select('acenter');
		if(empty($arr)){
			echo "<script>alert('您无访问权限');window.location='/';</script>";
			exit();
		}
	}else{
		echo "<script>alert('您无访问权限');window.location='/';</script>";
		exit();
	}
	
}
function member($value=''){
	if(!empty($_SESSION['u_id'])||!empty($_COOKIE['u_id'])){
		if(empty($_SESSION['u_id'])){
			$intAid = $_COOKIE['u_id'];
		}else{
			$intAid = $_SESSION['u_id'];
		}
		$objWebInit = new Secondar();
		$objWebInit->db_where('u_id',$intAid,'=');
		$arr = $objWebInit->db_select('mcenter');
		if(empty($arr)){
			echo "<script>alert('您无访问权限');window.location='/';</script>";
			exit();
		}else{
			return $intAid;
		}
	}else{
		echo "<script>alert('您无访问权限');window.location='/';</script>";
		exit();
	}
}