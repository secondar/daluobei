<?php
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
$objWebInit = new admin();
if (check::is_post()) {
	$Config['web']['title'] = trim($_POST['title']);
	$Config['web']['vicetitle'] = trim($_POST['vicetitle']);
	$Config['web']['describe'] = trim($_POST['describe']);
	$Config['web']['url'] = trim($_POST['url']);
	$Config['web']['icp'] = trim($_POST['icp']);
	$Config['web']['cnzz'] = trim($_POST['cnzz']);
	$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
	$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
	check::Alert('保存成功');
}
$arrOutput['config'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/setting_web.html');