<?php
require_once('../config/config.inc.php');
require_once('class/adminu.class.php');
$objWebInit = new adminu();
if(!empty($_SESSION["u_id"])){
	$intId = $_SESSION["u_id"];
}else if(!empty($_COOKIE["u_id"])){
	$intId = $_COOKIE["u_id"];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($Config['config']['tourist'] && empty($intId)){
		if($Config['qiniu']['active']){
			if (!in_array($_FILES['file']['type'],$Config['config']['up_type'])){
				$arrRes = 'error : 文件类型不符合要求 code : 108';
				check::json_exit($arrRes);
			}
			$objQiniu = new qiniu_upload();
			$arrUploaded=$objQiniu ->qiniu_upload($_FILES['file']);
			if($arrUploaded['state']){
				$arrUploaded['name'] = $_FILES['file']["name"];
				$arrUploaded['url'] = $arrUploaded['msg']['key'];
				$arrUploaded['type'] = $arrUploaded['msg']['type'];
				$arrUploaded['size'] = $arrUploaded['msg']['size'];
				$arrUploaded['mark'] = 2;
			}else{
				print_r($arrUploaded);exit();
			}
		}else{
			$arrUploaded = $objWebInit->uploaded_file($_FILES['file'],$Config['config']['up_type'],__WEB_ROOT.'/uploaded/','',1024000000);
			$arrUploaded['mark'] = 1;
		}
		if($arrUploaded['state']){
			$arrRes['name'] = $arrUploaded['name'];
			if($Config['qiniu']['active']){
				$arrRes['url'] = $Config['qiniu']['url'].'/'.$arrUploaded['url'];
			}else{
				$arrRes['url'] = $Config['web']['url'].'/uploaded/'.$arrUploaded['url'];
			}
			$addr = $objWebInit->curl_https('https://ip.ttt.sh/api.php?ip='.$objWebInit->getIp().'&type=json');
			$addr = json_decode($addr,true);
			$addr = $addr['addr'];
			$arrInfo = array(
				'name'=>$arrUploaded['name'],
				'url'=>$arrUploaded['url'],
				'type'=>$arrUploaded['type'],
				'size'=>$arrUploaded['size'],
				'id_type'=>'1',
				'up_time'=>date("Y-m-d H:i:s"),
				'up_ip'=>$objWebInit->getIp(),
				'ip_logaes' => $addr,
				'mark'=>$arrUploaded['mark']
			);
			$objWebInit->db_insert('infolist',$arrInfo);
			if(empty($Config['uploaded']['statistics'])){
				$Config['uploaded']['statistics'] = 1;
			}else{
				$Config['uploaded']['statistics'] += 1;
			}
			if(empty($Config['uploaded'][$arrUploaded['type']])){
				$Config['uploaded'][$arrUploaded['type']] = 1;
			}else{
				$Config['uploaded'][$arrUploaded['type']] += 1;
			}
			if(empty($Config['uploaded']['tourist'])){
				$Config['uploaded']['tourist'] = 1;
			}else{
				$Config['uploaded']['tourist'] += 1;
			}
			$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
			$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
		}else{
			$arrRes = 'error : '.$arrUploaded['msg'].' code : '.$arrUploaded['code'];
		}
		check::json_exit($arrRes);
	}else{
		if(!empty($intId)){
			$objWebInit->db_where('u_id',$intId,'=');
			$arrUserinfo = $objWebInit->db_select('mcenter');
			if(empty($arrUserinfo)){
				check::json_exit('登录信息已过期,请重新登录！');
			}
			if($Config['qiniu']['active']){
				if (!in_array($_FILES['file']['type'],$Config['config']['up_type'])){
					$arrRes = 'error : 文件类型不符合要求 code : 108';
					check::json_exit($arrRes);
				}
				$objQiniu = new qiniu_upload();
				$arrUploaded=$objQiniu ->qiniu_upload($_FILES['file']);
				if($arrUploaded['state']){
					$arrUploaded['name'] = $_FILES['file']["name"];
					$arrUploaded['url'] = $arrUploaded['msg']['key'];
					$arrUploaded['type'] = $arrUploaded['msg']['type'];
					$arrUploaded['size'] = $arrUploaded['msg']['size'];
					$arrUploaded['mark'] = 2;
				}else{
					print_r($arrUploaded);exit();
				}
			}else{
				$arrUploaded = $objWebInit->uploaded_file($_FILES['file'],$Config['config']['up_type'],__WEB_ROOT.'/uploaded/','',1024000000);
				$arrUploaded['mark'] = 1;
			}
			if($arrUploaded['state']){
				if($Config['qiniu']['active']){
					$arrRes['url'] = $Config['qiniu']['url'].'/'.$arrUploaded['url'];
				}else{
					$arrRes['url'] = $Config['web']['url'].'/uploaded/'.$arrUploaded['url'];
				}
				$addr = $objWebInit->curl_https('https://ip.ttt.sh/api.php?ip='.$objWebInit->getIp().'&type=json');
				$addr = json_decode($addr,true);
				$addr = $addr['addr'];
				$arrInfo = array(
					'name'=>$arrUploaded['name'],
					'url'=>$arrUploaded['url'],
					'type'=>$arrUploaded['type'],
					'size'=>$arrUploaded['size'],
					'u_id'=>$arrUserinfo[0]['u_id'],
					'id_type'=>'2',
					'up_time'=>date("Y-m-d H:i:s"),
					'up_ip'=>$objWebInit->getIp(),
					'ip_logaes' => $addr,
					'mark'=>$arrUploaded['mark']
				);
				$objWebInit->db_insert('infolist',$arrInfo);
				if(empty($arrUserinfo[0]['u_number'])){
					$intU_number = 1;
				}else{
					$intU_number = $arrUserinfo[0]['u_number']+1;
				}
				$objWebInit->db_where('u_id',$arrUserinfo[0]['u_id'],'=');
				$objWebInit->db_update('mcenter',array('u_number'=>$intU_number));

				if(empty($Config['uploaded']['statistics'])){
					$Config['uploaded']['statistics'] = 1;
				}else{
					$Config['uploaded']['statistics'] += 1;
				}
				if(empty($Config['uploaded'][$arrUploaded['type']])){
					$Config['uploaded'][$arrUploaded['type']] = 1;
				}else{
					$Config['uploaded'][$arrUploaded['type']] += 1;
				}
				if(empty($Config['uploaded']['member'])){
					$Config['uploaded']['member'] = 1;
				}else{
					$Config['uploaded']['member'] += 1;
				}
				$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
				$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
			}else{
				$arrRes = 'error : '.$arrUploaded['msg'].' code : '.$arrUploaded['code'];
			}
			check::json_exit($arrRes);
		}else{
			check::json_exit('未开启游客上传功能');
		}
	}
}else{
	check::json_exit('error Use post to access!');
}

