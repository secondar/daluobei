<?php
require_once('../config/config.inc.php');
require_once('class/admin.class.php');
$objWebInit = new admin();
Jurisdiction();
$user = $objWebInit->db_select('mcenter','count(u_id) as user');
$arrOutput['info']['user'] = $user[0]['user'];
if(empty($arrOutput['info']['user'])){
	$arrOutput['info']['user']=0;
}
$arrOutput['web'] = $Config['uploaded'];
$arrOutput['config'] = $Config['web'];
$objWebInit->output($arrOutput,'./templates/iframe_index.html');