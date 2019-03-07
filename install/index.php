<?php 
include_once('../config/config.inc.php');
$objWebInit = new Secondar();
$end = false;
$arrOutput = array();
if(empty($_GET['page']) || intval($_GET['page']) ==1){
	$strViews = '../install/templates/index.html';
}else if(intval($_GET['page'])==2){
	$strViews = '../install/templates/deploy.html';
}else if(intval($_GET['page'])==3){
	if(!empty($_POST['host'])){
		if(!empty($_POST['port'])){
			if(!empty($_POST['db'])){
				if(!empty($_POST['name'])){
					error_reporting(0);//设置错误级别0
					@$db = new mysqli($_POST['host'],$_POST['name'],$_POST['pwd'],$_POST['db'],$_POST['port']);
					if (mysqli_connect_errno()){
						$strViews = '../install/templates/deploy.html';
						echo "<script>alert('无法连接数据库，错误信息：".mysqli_connect_error()."请检查数据库信息是否正确');</script>";
					}else{
						mysqli_query($db,"SET NAMES utf8");
						$arrSql= array();
						$strPrefix = 'lb_';
						if(!empty($_POST['prefix'])){
							$strPrefix = $_POST['prefix'];
						}
						$arrSql['mcenter']="CREATE TABLE IF NOT EXISTS `".$strPrefix."mcenter` (
						  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
						  `u_name` varchar(10)  NOT NULL COMMENT '用户名',
						  `u_pwd` char(32)  NOT NULL COMMENT '用户密码',
						  `u_number` int(10)  DEFAULT NULL COMMENT '用户文件数量',
						  `e_mail` varchar(50)  NOT NULL COMMENT '用户邮箱',
						  `u_regtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '用户注册时间',
						  `u_logtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '用户最后登录时间',
						  `u_ip` char(23)  DEFAULT NULL COMMENT '用户最后登录ip',
						  `u_logaes` varchar(50)  DEFAULT NULL COMMENT '用户最后登录地址',
						  PRIMARY KEY (`u_id`),
						  KEY `u_name` (`u_name`),
						  KEY `u_pwd` (`u_pwd`),
						  KEY `u_number` (`u_number`)
						) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户中心表' ;";
						$arrSql['acenter']="CREATE TABLE IF NOT EXISTS `".$strPrefix."acenter` (
						  `a_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
						  `a_name` varchar(10)  NOT NULL COMMENT '用户名',
						  `a_pwd` char(32)  NOT NULL COMMENT '用户密码',
						  `a_number` int(10)  DEFAULT NULL COMMENT '用户文件数量',
						  `e_mail` varchar(50)  NOT NULL COMMENT '用户邮箱',
						  `a_regtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '用户注册时间',
						  `a_logtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '用户最后登录时间',
						  `a_ip` char(23)  DEFAULT NULL COMMENT '用户最后登录ip',
						  `a_logaes` varchar(50)  DEFAULT NULL COMMENT '用户最后登录地址',
						  PRIMARY KEY (`a_id`),
						  KEY `a_name` (`a_name`),
						  KEY `a_pwd` (`a_pwd`),
						  KEY `a_number` (`a_number`)
						) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='管理中心表' ;";
						$arrSql['infolist']="CREATE TABLE IF NOT EXISTS `".$strPrefix."infolist` (
						  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件id',
						  `name` text  NOT NULL COMMENT '文件名',
						  `url` varchar(255)  NOT NULL COMMENT '文件路径',
						  `type` varchar(255)  DEFAULT NULL COMMENT '文件类型',
						  `size` varchar(255)  NOT NULL COMMENT '文件大小',
						  `u_id` varchar(50)  NOT NULL DEFAULT 0  COMMENT '用户ID',
						  `id_type` varchar(50)  NOT NULL DEFAULT 1 COMMENT '用户类型,1=游客,2=会员',
						  `mark` char(1) NOT NULL DEFAULT 1 COMMENT '储存位置,1=本地,2=七牛云',
						  `up_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'  COMMENT '上传时间',
						  `up_ip` char(23)  DEFAULT NULL COMMENT '上传IP',
						  `ip_logaes` varchar(50)  DEFAULT NULL COMMENT 'IP所在地址',
						  PRIMARY KEY (`id`),
						  KEY `u_id` (`u_id`),
						  KEY `id_type` (`id_type`)
						) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='文件列表' ;";
					}
					foreach ($arrSql as $k => $v) {
						if(!mysqli_query($db,$v)){
							echo "<script>alert('无法创建数据表，错误信息:".mysqli_errno($db)."请检查数据库信息是否正确');</script>";
							$strViews = '../install/templates/deploy.html';
							$objWebInit->output($arrOutput,$strViews);
							exit();
						 }
					}
					@mkdir(dirname(__FILE__)."/..".'/uploaded');
                	@chmod(dirname(__FILE__)."/..".'/uploaded', 0777);
					$Config['mysql']['host']=$_POST['host'];
					$Config['mysql']['name']=$_POST['name'];
					$Config['mysql']['port']=$_POST['port'];
					$Config['mysql']['pwd']=$_POST['pwd'];
					$Config['mysql']['db']=$_POST['db'];
					$Config['mysql']['prefix']=$_POST['prefix'];
					$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
					$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
					$arrOutput['servername'] = $_SERVER['SERVER_NAME'];
					$strViews = '../install/templates/info.html';
				}else{
					echo "<script>alert('请填写数据库用户名');</script>";
					$strViews = '../install/templates/deploy.html';
				}
			}else{
				echo "<script>alert('请填写数据库名');</script>";
				$strViews = '../install/templates/deploy.html';
			}
		}else{
			echo "<script>alert('请填写数据库端口');</script>";
			$strViews = '../install/templates/deploy.html';
		}
	}else{
		echo "<script>alert('请填写数据库地址');</script>";
		$strViews = '../install/templates/deploy.html';
	}
}else if(intval($_GET['page'])==4){
	$Config['web']['title']=$_POST['title'];
	$Config['web']['vicetitle']=$_POST['vicetitle'];
	$Config['web']['url']=$_POST['url'];
	$Config['web']['describe']=$_POST['describe'];
	$Config['web']['jam']=$_POST['jam'];
	$Config['config'] = array (
		'mode'=>1,
	    'tourist' => true,
	    'size'=>10000000,
	    'up_type' => 
	    array (
	      0 => 'image/jpg',
	      1 => 'image/jpeg',
	      2 => 'image/gif',
	      3 => 'image/png',
	      4 => 'application/zip',
	      5 => 'application/x-rar-compressed',
	      6 => 'audio/mp3',
	      7 => 'audio/mpeg',
	      8 => 'video/mp4',
	      9 => 'video/avi',
	      10 => 'text/plain',
	    ),
	  );
	$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
	$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
	$pwd = md5(md5(trim($_POST['apwd'])).md5(trim($_POST['jam'])));
	$arr = array(
		'a_name'=>trim($_POST['aname']),
		'a_pwd'=>$pwd,
		'e_mail'=>trim($_POST['email']),
		'a_regtime'=>date("Y-m-d H:i:s")
	);
	$objWebInit->db_insert('acenter',$arr);
	$arr = array(
		'u_name'=>trim($_POST['aname']),
		'u_pwd'=>$pwd,
		'e_mail'=>trim($_POST['email']),
		'u_regtime'=>date("Y-m-d H:i:s")
	);
	$objWebInit->db_insert('mcenter',$arr);
	$strViews = '../install/templates/end.html';
	$end = true;
}
$objWebInit->output($arrOutput,$strViews);
if($end){
	$objWebInit->del_dir(dirname(__FILE__));
}
?>