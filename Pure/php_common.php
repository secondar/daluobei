<?php
/**
 * [Purea 底层]
 * @author		一只大萝北(mail@imoecg.com)
 * @copyright	(c) 2019 by www.imoecg.com
 * @package		一只大萝北       
 */
class Secondar{
	public $objSmarty = null;
	function __construct(){
		Global $Config;
		$this->arrMysql = $Config['mysql'];
		$this->strWhere = null;
		$this->arrWhere = array();
	}
	/**
	 * [output description]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
	 * @param  [array]  $arrMOutput [信息数组]
	 * @param  [string] $strViews   [模板路径]
	 * @return [void]             
	 */
	public function output($arrMOutput = array(),$strViews){
		$objSmarty = new Smarty;
		echo "<!--大萝北直链网盘 版权所有 © www.imoecg.com-->\n<!--去除版权信息请联系一颗大萝北 mial@imoecg.com-->\n<!--代码如诗如痴如醉-->\n";
		$objSmarty->template_dir=__WEB_ROOT."/templates";  //指定模版存放目录
	    $objSmarty->compile_dir=__WEB_ROOT."/cache";  //指定编译文件存放目录
	    // $objSmarty->config_dir="config";  //指定配置文件存放目录
	    $objSmarty->cache_dir=__WEB_ROOT."/cache";  //指定缓存存放目录
	    $objSmarty->caching=false;  //关闭缓存（设置为true表示启用缓存）
	    $objSmarty->left_delimiter="{";  //指定左标签
	    $objSmarty->right_delimiter="}";  //指定右标签
	    if(is_array($arrMOutput)){
	    	foreach($arrMOutput as $key => $value){
				$objSmarty->assign($key,$value);
			}
	    }
		$objSmarty->display($strViews); 
		echo "<!--大萝北直链网盘 版权所有 © www.imoecg.com-->\n<!--去除版权信息请联系一颗大萝北 mial@imoecg.com-->\n<!--代码如诗如痴如醉-->"; 
	}
	/**
	 * [db 连接数据库]
	 * @return [viod] [数据库句柄]
	 */
	public function db(){
		try{
			if(empty($this->arrMysql)){
				echo "<script>alert('数据库配置读取错误,请查看dada/config.php，或重新安装程序');</script>";
				exit();
			}
			$dsn="mysql:host=".$this->arrMysql['host'].";port=".$this->arrMysql['port'].";dbname=".$this->arrMysql['db'];
			$db = new PDO($dsn, $this->arrMysql['name'], $this->arrMysql['pwd']); //初始化一个PDO对象  
			return $db;
		}catch(PDOException $e){
			die("数据库连接失败".$e->getMessage());
		}
	}
	/**
	 * [db_execute 执行sql]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
	 * @param  [string]  $strSQL  [sql语句]
	 * @param  [array]   $arrData [sql语句对应条件数组]
	 * @param  [boolean] $select  [是否查询语句]
	 * @return [void]             [返回查询结果]
	 */
	public function db_execute($strSQL,$arrData=array(),$select=true){
		if(empty($strSQL)){
			echo "<script>alert('错误，db_execute函数参数缺失！');</script>";
			exit();
		}
		$this->strWhere = null;
		$this->arrWhere=array();
		try {
			$db = $this->db();
			$rs = $db->prepare($strSQL);
			if(!empty($arrData)){
				$rs->execute($arrData);
			}else{
				$rs->execute();
			}
			if($select){
				$arrData = $rs->fetchall(PDO::FETCH_ASSOC);
				// if(count($arrData)==1){
				// 	$arrData = $arrData[0];
				// }
				return $arrData;
			}else{
				return $rs->rowCount();
			}
		}catch (PDOException $e) {
			echo 'SQL: ' . $strSQL.'<br><br>';
			die('Failed: ' . nl2br($e).'<br><br>');
		}
	}
	/**
	 * [db_selest 查询数据库]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
	 * @param  [string] $table    [数据库表名]
	 * @param  [array]  $data     [查找条件]
	 * @param  [string] $field    [查找字段]
	 * @param  [string] $minLimit [初始行数]
	 * @param  [string] $maxLimit [最大行数]
	 * @param  [string] $order    [排序条件]
	 * @return [array]            [查询结果]
	 */
	public function db_select($table,$field='*',$minLimit='',$maxLimit='',$order=''){
		if(empty($table)){
			echo "<script>alert('错误，数据库表名为空！');</script>";
			exit();
		}
		$table = $this->arrMysql['prefix'].$table;
		$strSQL = "SELECT $field from $table ";
		$strSQL .=$this->strWhere;
		$data = $this->arrWhere;
		$arrData = array();
		if(!empty($order)){
			$strSQL .=$order;
		}
		if(!empty($minLimit)&&!empty($maxLimit)){
			$strSQL .=' LIMIT '.$minLimit.','.$maxLimit.' ';
		}else if(!empty($maxLimit)){
			$strSQL .=' LIMIT '.$maxLimit.' ';
		}
		return $this->db_execute($strSQL,$data);
	}
	/**
	 * [db_insert 插入数据库]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
	 * @param  [string] $table [表名]
	 * @param  [array]  $data  [需要插入数据]
	 * @return [int]        [受影响行数]
	 */
	public function db_insert($table,$data=array()){
		if(empty($table)){
			echo "<script>alert('错误，数据库表名为空！');</script>";
			exit();
		}
		$table = $this->arrMysql['prefix'].$table;
		$strSQL = "insert into ".$table." (";// (id,app_id,ext_key)value(?,?,?)";
		$arrData = array();
		$str =  "value (";
		foreach ($data as $k => $v) {
			$strSQL .= $k.',';
			$str .=  '?,';
			$arrData[] = $v;
		}
		$strSQL = substr($strSQL,0,(strlen($strSQL)-1));
		$str = substr($str,0,(strlen($str)-1));
		$str .=')';
		$strSQL .=') '.$str;
		return $this->db_execute($strSQL,$arrData,false);
	}

	public function db_where($strName,$strValue,$strOp,$strJoin=''){
		if(empty($this->strWhere)||$this->strWhere==null){
			if(!empty($strJoin)){
				echo "首次使用第四参数必须留空";
				exit;
			}
			$this->strWhere=' where '.$strName.' '.$strOp.' ? ';
			$this->arrWhere[]=$strValue;
		}else{
			$this->strWhere.=' '.$strJoin.' '.$strName.' '.$strOp.' ? ';
			$this->arrWhere[]=$strValue;
		}
	}
	/**
	 * [db_update 修改数据库记录值]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
	 * @param  [string] $table [表名]
	 * @param  [array]  $data  [需要修改的数组]
	 * @return [int]        [受影响行数]
	 */
	public function db_update($table,$data=array()){
		if(empty($table)||empty($data)){
			echo "<script>alert('错误，数据库表名与需要修改的值不能为空！');</script>";
			exit();
		}
		$table = $this->arrMysql['prefix'].$table;
		$strSQL = "update ".$table." SET ";
		$arrData = array();
		foreach ($data as $k => $v) {
			$strSQL .= $k.'=? , ';
			$arrData[] = $v;
		}
		$strSQL = substr($strSQL,0,(strlen($strSQL)-2));
		foreach ($this->arrWhere as $v) {
			$arrData[] = $v;
		}
		$strSQL .= $this->strWhere;
		return $this->db_execute($strSQL,$arrData,false);
	}
	/**
	 * [db_delete 删除数据库记录值]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
	 * @param  [type] $table [表名]
	 * @param  [array]  $where [条件]
	 * @return [int]        [受影响行数]
	 */
	public function db_delete($table){
		if(empty($table)){
			echo "<script>alert('错误，数据库表名为空！');</script>";
			exit();
		}
		$table = $this->arrMysql['prefix'].$table;
		$strSQL = "delete from ".$table;
		$arrData = array();
		$strSQL .=$this->strWhere;
		$arrData = $this->arrWhere;
		return $this->db_execute($strSQL,$arrData,false);
	}
	/**
	 * [getIP 获取真实IP]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @return  [string]   [ip地址]
     */
    public function getIP() {
        $ip = '';
		if (!empty($_SERVER["HTTP_CLIENT_IP"])) $ip = $_SERVER["HTTP_CLIENT_IP"];
		else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		else if(!empty($_SERVER["REMOTE_ADDR"])) $ip =$_SERVER["REMOTE_ADDR"];
		else $ip = "Unknow";
        return $ip;
    }
	/**
	 * [write_file 带路径建立文件]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @param	[string]		$strFile		[带路径的文件字符串(带文件名)]
     * @param	[string]		$content		[写入文件的内容]
     * @param	[string]		$mode			[打开文件的模式]
     * @return  [string]
     */
    public function write_file($strFile,$content,$mode='w') {
        $dir    = @explode("/", $strFile);
        $num    = @count($dir)-1;
        $tmp = '';
        for($i=0; $i<$num; $i++) {
            $tmp    .= $dir[$i];
            if(!@file_exists($tmp)) {
                @mkdir($tmp);
                @chmod($tmp, 0777);
            }
            $tmp    .= '/';
        }
        if (!$fp = @fopen($strFile,$mode)) {
            return false;
        }else {
			@fwrite($fp,$content);
            @fclose($fp);
            return true;
        }
    }
    /**
     * [make_dir 根据路径生成目录]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @param	[string]		$strFile		[路径字符串]
     * @param	[string]		$mode			[路径权限]
     * @return  [string]
     */
    public function make_dir($strFile,$mode='0777') {
		if($strFile[strlen($strFile)-1] != '/') $strFile .= '/';
        $dir    = @explode("/", $strFile);
        $num    = @count($dir)-1;
        $tmp = '';
        for($i=0; $i<$num; $i++) {
            $tmp    .= $dir[$i];
            if(!@is_dir($tmp)) {
                @mkdir($tmp);
                @chmod($tmp, 0777);
            }
            $tmp    .= '/';
        }
        return true;
    }
    /**
     * [mdate 时间格式化]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @param	[string]		$sourcedate		[原始时间戳或者时间字符串]
     * @param	[string]		$dateformat		[时间格式字符串]
     * @param	[string]		$timestamp		[当前时间戳或者指定的时间戳]
     * @param	[int]			$format			[是否转换]
     * @return  [string]
     */
    public function mdate($sourcedate,$dateformat='Y-m-d H:i:s', $timestamp='', $format=1) {
		if(empty($sourcedate)||$sourcedate=='0000-00-00'||$sourcedate=='0000-00-00 00:00:00') return $sourcedate; 
        if(is_numeric($sourcedate)) $sourcstamp = $sourcedate;
        else $sourcstamp = strtotime($sourcedate);
        if( empty( $dateformat ) ) $dateformat='Y-m-d H:i:s';
        $sourcedate = date($dateformat,$sourcstamp);
        $sourcedateD = date('H:i',$sourcstamp);

        if(empty($timestamp)) {
            $timestamp = time();
        }else if(!is_numeric($timestamp)) $timestamp = strtotime($timestamp);
        $result = '';
        if($format) {
            $time = $timestamp - $sourcstamp;
            if ($time > 0 && $time < 60 ) {
                $result = $time.'秒以前';
            } elseif ($time >= 60 && $time < 3600) {
                $result = intval($time/60).'分钟以前';
            }elseif((date("Y-m-d", $timestamp)==date("Y-m-d", $sourcstamp))) {
                $result = 	'今天'.$sourcedateD;
            }elseif((date("Y-m-d", $timestamp-24*3600)==date("Y-m-d", $sourcstamp))) {
                $result = 	'昨天'.$sourcedateD;
            }elseif($time >= 24*3600) {
                $date = floor($time/(24*3600));
                if($date > 30) $result = 	$sourcedate;
                else $result = $date.'天以前';
            }else {
                $result = $sourcedate;
            }
        } else {
            $result = $sourcedate;
        }
        return $result;
    }
    /**
     * [BrowserVer 返回浏览器类型和版本]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @return  [array]		[信息数组]
     */
    public function BrowserVer() {
        $browsers=array(
                ".*opera[ /]([0-9.]{1,10})" => "opera",
                ".compatible; MSIE[ /]([0-9.]{1,10}).*" => "ie",
                ".*Firefox/([0-9.+]{1,10})" => "firefox",
                ".Version/([0-9.+]{1,10})" => "Safari",
                ".Chrome/([0-9.+]{1,10})" => "Chrome",
        );
        if(empty($_SERVER["HTTP_USER_AGENT"])) return '';
        $browser_info = array();
        foreach($browsers as $match=>$browser_name) {
            if(preg_match('#'.$match.'#i',$_SERVER["HTTP_USER_AGENT"],$match)) {
                $browser_info[] =  $browser_name;
                $browser_info[] =  $match[1];
                $browser_info[] =  $browser_name.'.'.$match[1];
            }
        }
        return $browser_info;
    }
    /**
     * [BrowserVer 验证邮箱是否真实有效]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @param	[string]	$email		[邮箱]
     * @return	[bool]
     */
	public function validEmail($email) {
		$isValid = true;
		$atIndex = strrpos ( $email, "@" );
		if (is_bool ( $atIndex ) && ! $atIndex) {
			$isValid = false;
		} else {
			$domain = substr ( $email, $atIndex + 1 );
			$local = substr ( $email, 0, $atIndex );
			$localLen = strlen ( $local );
			$domainLen = strlen ( $domain );
			if ($localLen < 1 || $localLen > 64) {
				$isValid = false;
			} else if ($domainLen < 1 || $domainLen > 255) {
				$isValid = false;
			} else if ($local [0] == '.' || $local [$localLen - 1] == '.') {
				$isValid = false;
			} else if (preg_match ( '/\\.\\./', $local )) {
				$isValid = false;
			} else if (! preg_match ( '/^[A-Za-z0-9\\-\\.]+$/', $domain )) {
				$isValid = false;
			} else if (preg_match ( '/\\.\\./', $domain )) {
				$isValid = false;
			} else if (! preg_match ( '/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace ( "\\\\", "", $local ) )) {
				if (! preg_match ( '/^"(\\\\"|[^"])+"$/', str_replace ( "\\\\", "", $local ) )) {
					$isValid = false;
				}
			}
			if ($isValid && ! (checkdnsrr ( $domain, "MX" ) || checkdnsrr ( $domain, "A" ))) {
			$isValid = false;
			}
		}
		return $isValid;
	}
    /**
     * [gaussian_blur 图片高斯模糊（适用于png/jpg/gif格式）]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @param  [string]  $srcImg        [原图片]
     * @param  [string]  $strSavepath   [保存路径]
     * @param  [int]   $intBlurFactor 	[模糊程度]
     * @return [string]					[图片路径]
     * 基于Martijn Frazer代码的扩充
     */
    public function gaussian_blur($srcImg,$strSavepath,$intBlurFactor=3){
        $imageInfo = getimagesize($srcImg);
        $imageInfo["name"] = basename($srcImg);
        $imageInfo["width"] = $imageInfo[0];
        $imageInfo["height"]= $imageInfo[1];
        $imageInfo["type"] = $imageInfo[2];
        $gdImageResource = null;
        switch ($imageInfo['type']) {
			case 1: $gdImageResource = imagecreatefromgif($srcImg); break;
			case 2: $gdImageResource = imagecreatefromjpeg($srcImg); break;
			case 3: $gdImageResource = imagecreatefrompng($srcImg); break;
        }
        $intBlurFactor = round($intBlurFactor);
        $smallestWidth = ceil($imageInfo["width"] * pow(0.5, $intBlurFactor));
        $smallestHeight = ceil($imageInfo["height"] * pow(0.5, $intBlurFactor));
        $prevImage = $gdImageResource;
        $prevWidth = $imageInfo["width"];
        $prevHeight = $imageInfo["height"];
        for($i = 0; $i < $intBlurFactor; $i += 1){    
            $nextWidth = $smallestWidth * pow(2, $i);
            $nextHeight = $smallestHeight * pow(2, $i);
            $nextImage = imagecreatetruecolor($nextWidth, $nextHeight);
            imagecopyresized($nextImage, $prevImage, 0, 0, 0, 0, $nextWidth, $nextHeight, $prevWidth, $prevHeight);
            imagefilter($nextImage, IMG_FILTER_GAUSSIAN_BLUR);
            $prevImage = $nextImage;
            $prevWidth = $nextWidth;
            $prevHeight = $nextHeight;
        }
        imagecopyresized($gdImageResource, $nextImage, 0, 0, 0, 0, $imageInfo["width"], $imageInfo["height"], $nextWidth, $nextHeight);
        imagefilter($gdImageResource, IMG_FILTER_GAUSSIAN_BLUR);
        imagedestroy($prevImage);
        $srcImgObj=$gdImageResource;
        $strSavefile = $strSavepath .'/'. $imageInfo["name"];

        imagejpeg($srcImgObj, $strSavefile,90);
		imagedestroy($srcImgObj);
        return $strSavefile;
    }
    /**
	 * [isIdCard 身份证合法验证]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
     * @return  [bool]
     */
    public function isIdCard( $id ){ 
		$id = strtoupper($id); 
		$regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/"; 
		$arr_split = array(); 
		if(!preg_match($regx, $id)){ 
			return FALSE; 
		} 
		if(15==strlen($id)){ //检查15位  
			$regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/"; 
			@preg_match($regx, $id, $arr_split); 
			//检查生日日期是否正确 
			$dtm_birth = "19".$arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4]; 
			if(!strtotime($dtm_birth)){ 
				return FALSE; 
			} else { 
				return TRUE; 
			} 
		}else{      //检查18位 
			$regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/"; 
			@preg_match($regx, $id, $arr_split); 
			$dtm_birth = $arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4]; 
			if(!strtotime($dtm_birth)){ //检查生日日期是否正确 
				return FALSE; 
			}else{ 
				//检验18位身份证的校验码是否正确。 
				//校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。 
				$arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); 
				$arr_ch = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'); 
				$sign = 0; 
				for ( $i = 0; $i < 17; $i++ ){ 
					$b = (int) $id{$i}; 
					$w = $arr_int[$i]; 
					$sign += $b * $w; 
				} 
				$n = $sign % 11; 
				$val_num = $arr_ch[$n]; 
				if ($val_num != substr($id,17, 1)){ 
					return FALSE; 
				}else{ 
					return TRUE; 
				} 
			} 
		}
	}
	/**
	 * [getFile 下载远程文件]
	 * @author		一只大萝北(mail@imoecg.com)
     * @copyright	(c) 2019 by www.imoecg.com
	 * @param  [string]  $url      [远程路径]
	 * @param  [string]  $save_dir [保存路径]
	 * @param  [string]  $arrFilename [保存文件名称]
	 * @param  [int] 	 $type     [下载方式,默认curl]
	 * @return [array]             [文件信息]
	 */
	public function getFile($url, $save_dir = '', $arrFilename = '', $type = 0) {  
	    if (trim($url) == '') {  
	        return false;  
	    }  
	    if (trim($save_dir) == '') {  
	        $save_dir = './';  
	    }  
	    if (0 !== strrpos($save_dir, '/')) {  
	        $save_dir.= '/';  
	    }  
	    //创建保存目录  
	    if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true)) {  
	        return false;  
	    }  
	    //获取远程文件所采用的方法  
	    if ($type) {  
	        $ch = curl_init();  
	        $timeout = 5;  
	        curl_setopt($ch, CURLOPT_URL, $url);  
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
	        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
	        $content = curl_exec($ch);  
	        curl_close($ch);  
	    } else {  
	        ob_start();  
	        readfile($url);  
	        $content = ob_get_contents();  
	        ob_end_clean();  
	    }  
	    $size = strlen($content);  
	    //文件大小  
	    $fp2 = @fopen($save_dir . $filename, 'a');  
	    fwrite($fp2, $content);  
	    fclose($fp2);  
	    unset($content, $url);  
	    return array(  
	        'file_name' => $filename,  
	        'save_path' => $save_dir . $filename,  
	        'file_size' => $size  
	    );  
	}
	/**
	 * [uploaded_file 上传文件]
	 * @param  [array]  $arrFile     [文件信息数组$_FILES]
	 * @param  [array]  $arrType     [允许的文件类型]
	 * @param  [string] $strFile     [保存文件路径]
	 * @param  [string] $strFileName [保存的文件名称]
	 * @param  [int]    $intSize     [限制文件大小单位/b]
	 * @return [array]               [数组信息]
	 */
	public function uploaded_file($arrFile=array(),$arrType=array(),$strFile='',$strFileName='',$intSize=0){
		if(!empty($arrFile)){
			if($arrFile["error"]){
				switch($arrFile['error']){
					case 1:
						$strError = '文件超过了 php.ini 中 upload_max_filesize 选项限制的值'.ini_get("upload_max_filesize");
						$intCode = 101;
					break;
					case 2:
						$strError = '文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值';
						$intCode = 102;
					break;
					case 3:
						$strError = '文件只有部分被上传';
						$intCode = 103;
					break;
					case 4:
						$strError = '没有文件被上传';
						$intCode = 104;
					break;
					case 6:
						$strError = '找不到临时文件夹';
						$intCode = 106;
					break;
					case 7:
						$strError = '文件写入失败';
						$intCode = 107;
					break;
				}
			}else{
				if (!in_array($arrFile["type"],$arrType)){
					$strError = '文件类型不符合要求';
					$intCode = 108;
				}else if($intSize>0){
					if($arrFile['size']>$intSize){
						$strError = '文件大小大于限制大小！';
						$intCode = 109;
					}else{
						if(empty($strFileName)){
							$strFileName = date("YmdHis").'.'.substr($arrFile["name"],strrpos($arrFile["name"],'.')+1);
						}
						$strFile = $strFile.$strFileName;
						move_uploaded_file($arrFile["tmp_name"],$strFile);
						return array('state'=>true,'path'=>$strFile,'url'=>$strFileName,'type'=>$arrFile["type"],'name'=>$arrFile["name"],'size'=>$arrFile["size"]);
					}
				}else{
					if(empty($strFileName)){
						$strFileName = date("YmdHis").'.'.substr($arrFile["name"],strrpos($arrFile["name"],'.')+1);
					}
					$strFile = $strFile.$strFileName;
					move_uploaded_file($arrFile["tmp_name"],$strFile);
					return array('state'=>true,'path'=>$strFile,'url'=>$strFileName,'type'=>$arrFile["type"],'name'=>$arrFile["name"],'size'=>$arrFile["size"]);
				}
			}
		}else{
			$strError = '文件信息为空！';
		}
		return array('state'=>false,'msg'=>$strError,'code'=>$intCode);
	}
	/**
	 * [del_dir 删除文件夹及文件下的目录与文件]
	 * @param  [string] $dir [需要删除的文件目录]
	 * @return [void]      
	 */
	public function del_dir($dir) {
	  $iter = new RecursiveDirectoryIterator($dir);
	  foreach (new RecursiveIteratorIterator($iter, RecursiveIteratorIterator::CHILD_FIRST) as $f) {
	    if ($f->isDir()) {
	      @rmdir($f->getPathname());
	    } else {
	      @unlink($f->getPathname());
	    }
	  }
	  @rmdir($dir);
	}
	/** [curl_https 获取 https 请求]
	* @param [String] [$url ]       [请求的url]
	* @param [Array]  [$data]       [要发送的数据]
	* @param [Array]  [$header]     [请求时发送的header]
	* @param [int]    [$timeout]    [超时时间，默认30s]
	* @param [bool]   [$debug ]     [是否打印错误信息，默认false]
	*/
	public function curl_https($url, $data=array(), $header=array(), $timeout=30, $debug=false){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $response = curl_exec($ch);
    if($error=curl_error($ch)){
        die($error);
    }
     // 打印错误信息
     if($debug){
       echo '=====info====='."\r\n";
       print_r( curl_getinfo($ch) );
       echo '=====error====='."\r\n";
       print_r( curl_error($ch) );
       echo '=====$response====='."\r\n";
       print_r( $response );
    }
    curl_close($ch);
    return $response;
	}
}