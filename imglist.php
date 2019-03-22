<?php 
require_once('config/config.inc.php');
$objWebInit = new Secondar();
$intNin = 0;
$intMax = 15;
if(!empty($_GET['pages'])){
	if(intval($_GET['pages'])>=1){
		$intNin = 15*(intval($_GET['pages'])-1);
		$intMax = 15*intval($_GET['pages']);
	}
}
$objWebInit->db_where('type','%image%','like');
$arrInfoList = $objWebInit->db_select('infolist','*',$intNin,$intMax,'ORDER BY id DESC');
$arrOutput['arrInfoList']=$arrInfoList;
$objWebInit->db_where('type','%image%','like');
$arrInfoList = $objWebInit->db_select('infolist','*',0,0,'ORDER BY id DESC');
$Config['web']['page'] = ceil(count($arrInfoList)/15);
$arrOutput['web']=$Config['web'];
$objWebInit->output($arrOutput,'imglist.html');
?>