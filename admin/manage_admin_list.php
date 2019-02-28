<?php
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
$objWebInit = new admin();
// Jurisdiction();
/*
if(!empty($_GET['Del'])){
	if ($_GET['Del'] == 'Choice') {
		//删除所有文件及删除会员
		$intUid=intval($_GET['id']);
		if(!empty($intUid)){
			$objWebInit->db_where('u_id',$intUid,'=');
			$arrInfo = $objWebInit->db_select('infolist');
			$intSum = 0;
			foreach ($arrInfo as $k => $v) {
				$Paht = __WEB_ROOT.'/uploaded/'.$v['url'];
				@unlink($Paht);
				$intSum +=1;
			}
			$Config['uploaded']['tourist'] = $Config['uploaded']['tourist']-$intSum;
			$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
			$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
			$objWebInit->db_where('u_id',$intUid,'=');
			$objWebInit->db_delete('infolist');
			$objWebInit->db_where('u_id',$intUid,'=');
			$objWebInit->db_delete('admin');
		}
	}else if ($_GET['Del'] == 'file') {
		//删除会员上传的所有文件
		$intUid=intval($_GET['id']);
		if(!empty($intUid)){
			$objWebInit->db_where('u_id',$intUid,'=');
			$arrInfo = $objWebInit->db_select('infolist');
			$intSum = 0;
			foreach ($arrInfo as $k => $v) {
				$Paht = __WEB_ROOT.'/uploaded/'.$v['url'];
				@unlink($Paht);
				$intSum +=1;
			}
			$Config['uploaded']['tourist'] = $Config['uploaded']['tourist']-$intSum;
			$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
			$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
			$objWebInit->db_where('u_id',$intUid,'=');
			$objWebInit->db_delete('infolist');
		}
	}
}
*/
if(empty($_GET['pages'])|| intval($_GET['pages'])==1){
	$intMinLimit=0;
}else{
	$intMinLimit= intval($_GET['pages'])*20;
}
$arrInfoList = $objWebInit->db_select('acenter','*',$intMinLimit,20,'ORDER BY a_id DESC');
$arrOutput['InfoList'] = $arrInfoList;
$arrOutput['web'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/manage_admin_list.html');