<?php 
class check {
    /**
     * [Alert 弹出消息框]
     * @param [type]  $C_alert  [提示信息]
     * @param integer $C_goback [返回到那一页]
     */
    static function Alert($C_alert,$C_goback=0) {
        if(is_numeric($C_goback)) {
            if($C_goback<>0) {
                if($C_alert == '') {
                    echo "<script>history.go($C_goback);</script>";
                }else echo "<script>alert('$C_alert');history.go($C_goback);</script>";
            }else {
                echo "<script>alert('$C_alert');</script>";
            }
        }else {
            if($C_goback<>'') {
                if($C_alert == '') {
                    echo "<script>window.location='$C_goback';</script>";
                }else echo "<script>alert('$C_alert');window.location='$C_goback';</script>";
            }else {
                echo "<script>alert('$C_alert');</script>";
            }
        }
    }
	/**
	 * [json_exit 输出json并退出]
	 * @param  [string|array] $data [要输出的内容]
	 * @return [string]       [输出json数据]
	 */
	static function json_exit($data){
		if(is_string($data)){
            $output = array('status' => 'err', 'msg' => $data,'duration'=>4000);
        }else{
            $output = array('status' => 'ok', 'data' => $data);
        }
        header('Content-type: application/json');
        exit(json_encode($output));
	}
	/**
	 * [xmlToArray 将xml转换为数组]
	 * @param [string] $xml  [xml文件或字符串]
	 * @return [array]
	 */
	static function xmlToArray($xml){
		if (file_exists($xml)) {
			libxml_disable_entity_loader(false);
			$xml_string = simplexml_load_file($xml,'SimpleXMLElement', LIBXML_NOCDATA);
		}else{
			libxml_disable_entity_loader(true);
			$xml_string = simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
		}
		$result = json_decode(json_encode($xml_string),true);
		return $result;
	}
	/**
	 * [arrayToXml 数组转XML]
	 * @param  [array] $arr  [数组]
	 * @param  [object] $dom   [Document对象，默认null即可]
	 * @param  [object] $node  [节点对象，默认null即可]
	 * @param  [string] $root  [根节点名称]
	 * @param  [string] $cdata [是否加入CDATA标签，默认为false]
	 * @return [xml]
	 */
	static function arrayToXml($arr,$dom=null,$node=null,$root='xml',$cdata=false){
		if (!$dom){
			$dom = new DOMDocument('1.0','utf-8');
		}
		if(!$node){
			$node = $dom->createElement($root);
			$dom->appendChild($node);
		}
		foreach ($arr as $key=>$value){
			$child_node = $dom->createElement(is_string($key) ? $key : 'node');
			$node->appendChild($child_node);
			if (!is_array($value)){
				if (!$cdata) {
					$data = $dom->createTextNode($value);
				}else{
					$data = $dom->createCDATASection($value);
				}
				$child_node->appendChild($data);
			}else {
				arrayToXml($value,$dom,$child_node,$root,$cdata);
			}
		}
		return $dom->saveXML();
	}
	/**
	 * [is_post 判断是否为POST访问]
	 * @return boolean [true||false]
	 */
	static function is_post(){
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * [unAllCookies 清除所有Cookies]
	 * @return [type] [description]
	 */
	static function unAllCookies(){
	    foreach ($_COOKIE as $key => $value) {
	        setcookie($key, null);
	    }
	}
	/**
	 * [unAllsession 清除所有session]
	 * @return [type] [description]
	 */
	static function unAllsession(){
	    session_unset();
		session_destroy();
	}
	/**
	 * [is_sexy 图片鉴黄]
	 * @param  [string]  $strUrl [图片URL]
	 * @return [array]         [返回结果||其中code为bool为true时无错误,adopt为bool为true时为正常图片]
	 */
	static function is_sexy($strUrl){
		$obj = new Secondar();
		Global $Config;
		$strKey = $Config['config']['sexyKey'];
		$res = $obj->curl_http('https://www.moderatecontent.com/api/v2?key='.$strKey.'&url='.$strUrl);
		$res = json_decode($res,true);
		if($res['error_code']==0){
			if ($res['rating_index']==3) {
				$res['code'] = true;
				$res['adopt'] = false;
			}else{
				$res['code'] = true;
				$res['adopt'] = true;
			}
		}else{
			$res['code'] = false;
		}
		return $res;
	}
}  