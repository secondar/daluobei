<?php
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
$objWebInit = new admin();
Jurisdiction();
if(check::is_post()){
	if(!empty($_POST['search'])||!empty($_POST['type'])){
		$objWebInit->db_where('id',$_POST['search'],'=');
		if($_POST['type']!='0'){
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('name','%'.$_POST['search'].'%','like','or');
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('type','%'.$_POST['type'].'%','like','and');
			$objWebInit->db_where('up_ip','%'.$_POST['search'].'%','like','or');
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('type','%'.$_POST['type'].'%','like','and');
			$objWebInit->db_where('ip_logaes','%'.$_POST['search'].'%','like','or');
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('type','%'.$_POST['type'].'%','like','and');
		}else{
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('name','%'.$_POST['search'].'%','like','or');
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('type','%'.$_POST['search'].'%','like','or');
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('up_ip','%'.$_POST['search'].'%','like','or');
			$objWebInit->db_where('id_type',2,'=','and');
			$objWebInit->db_where('ip_logaes','%'.$_POST['search'].'%','like','or');
			$objWebInit->db_where('id_type',2,'=','and');
		}
	}else{
		$objWebInit->db_where('id_type',2,'=');
	}
}else if(!empty($_GET['Del'])){
	if ($_GET['Del'] = 'Choice') {
		$_GET['id'] = substr($_GET['id'],0,strlen($_GET['id'])-1);
		$arrId = explode(':',$_GET['id']);
		for ($i=0; $i < count($arrId); $i++) { 
			if($i==0){
				$objWebInit->db_where('id',$arrId[$i],'=');
			}else{
				$objWebInit->db_where('id',$arrId[$i],'=','or');
			}
		}
		$arrInfo = $objWebInit->db_select('infolist');
		foreach ($arrInfo as $k => $v) {
			$Config['uploaded'][$v['type']] = $Config['uploaded']['type']-1;
			if($v['id_type']==2){
				$Config['uploaded']['member'] = $Config['uploaded']['member']-1;
			}else{
				$Config['uploaded']['tourist'] = $Config['uploaded']['tourist']-1;
			}
			$Config['uploaded']['statistics'] = $Config['uploaded']['statistics']-1;
			$Paht = __WEB_ROOT.'/uploaded/'.$v['url'];
			@unlink($Paht);
		}
		for ($i=0; $i < count($arrId); $i++) { 
			if($i==0){
				$objWebInit->db_where('id',$arrId[$i],'=');
			}else{
				$objWebInit->db_where('id',$arrId[$i],'=','or');
			}
		}
		$content = '<?php' . "\n" .'$Config = '. var_export( $Config, true ) . ';' . "\n" . '?>';
		$objWebInit->write_file(dirname(__FILE__)."/..".'/data/config.php',$content);
		$objWebInit->db_delete('infolist');
	}
	$objWebInit->db_where('id_type',2,'=');
}else{
	$objWebInit->db_where('id_type',2,'=');
}
if(empty($_GET['pages'])|| intval($_GET['pages'])==1){
	$intMinLimit=0;
}else{
	$intMinLimit= intval($_GET['pages'])*20;
}
foreach ($Config['config']['up_type'] as $k => $v) {
	$arrTmp = explode('/', $v);
	$arrType[] = $arrTmp[1];
}
$arrInfoList = $objWebInit->db_select('infolist','*',$intMinLimit,20,'ORDER BY id DESC');
$arrOutput['InfoList'] = $arrInfoList;
$arrOutput['web'] = $Config['web'];
$arrOutput['type'] = $arrType;
$objWebInit->output($arrOutput,'./templates/file_list_member.html');