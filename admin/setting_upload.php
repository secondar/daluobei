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
	$Config['config']['up_type'] = $arrType;
	$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
	$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
	check::Alert('保存成功');
}
$strType = '';
foreach ($Config['config']['up_type'] as $v) {
	$strType.=$v.',';
}
$Config['config']['up_type']=$strType;
$arrOutput['uploaded'] = $Config['config'];
$arrOutput['config'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/setting_upload.html');