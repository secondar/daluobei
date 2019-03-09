<?php
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
$objWebInit = new admin();
if (check::is_post()) {
	if(trim($_POST['tourist'])=='yes'){
		$Config['config']['tourist'] = true;
	}else{
		$Config['config']['tourist'] = flase;
	}
	$Config['config']['size'] = intval($_POST['size']);
	$arrType = explode(',', trim($_POST['type']));
	foreach ($arrType as $k => $v) {
		if(empty($v)){
			unset($arrType['$k']);
		}
	}
	$strMsg = '保存成功';
	if(intval($_POST['mode'])==1){
		$Config['config']['mode'] = 1;
		$Config['qiniu']['active'] = false;
	}else if(intval($_POST['mode'])==2){
		if(!empty($_POST['access_key'])){
			if(!empty($_POST['secret_key'])){
				if(!empty($_POST['bucket'])){
					if(!empty($_POST['bucket'])){
						$Config['config']['mode'] = 2;
						$Config['qiniu']['access_key'] = $_POST['access_key'];
						$Config['qiniu']['secret_key'] = $_POST['secret_key'];
						$Config['qiniu']['bucket'] = $_POST['bucket'];
						$Config['qiniu']['active'] = true;
						$Config['qiniu']['url'] = $_POST['url'];
					}else{
						$strMsg = '七牛Url不能为空';
					}	
				}else{
					$strMsg = '七牛bucket不能为空';
				}
			}else{
				$strMsg = '七牛secret_key不能为空';
			}
		}else{
			$strMsg = '七牛access_key不能为空';
		}
	}
	if($_POST['sexy_on']==1){
		if(!empty($_POST['sexy_key'])){
			if($_POST['sexy_sexy']==1){
				$Config['config']['sexy'] = true;
			}
			$Config['config']['sexy_on'] = true;
			$Config['config']['sexyKey'] = trim($_POST['sexy_key']);
		}else{
			$strMsg = '鉴黄key不能为空';
		}
	}else{
		$Config['config']['sexy_on'] = false;
	}
	$Config['config']['up_type'] = $arrType;
	$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
	$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
	check::Alert($strMsg);
}
$strType = '';
foreach ($Config['config']['up_type'] as $v) {
	$strType.=$v.',';
}
$Config['config']['up_type']=$strType;
$arrOutput['uploaded'] = $Config['config'];
if(!empty($Config['qiniu'])){
	$arrOutput['uploaded'] = $arrOutput['uploaded'] + $Config['qiniu'];
}
$arrOutput['config'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/setting_upload.html');