<?php
require_once __DIR__ . '/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Config;
use Qiniu\Storage\BucketManager;
/**
 * 七牛SDK
 * 需要用到自行添加
 * 文档地址https://developer.qiniu.com/kodo/sdk/1241/php
 */
class qiniu_upload {
    public $access_key;
    public $secret_key;
    public $bucket;
    public function __construct(){
        Global $Config;
        $this->access_key = $Config['qiniu']['access_key'];
        $this->secret_key = $Config['qiniu']['secret_key'];
        $this->bucket = $Config['qiniu']['bucket'];
    }
    /**
     * [qiniu_upload 上传文件到七牛]
     * @param  [array]  $arrFile [文件信息数组]
     * @param  [string]  $strKey [文件名||key]
     * @return [array]           [消息数组]
     */
    public function qiniu_upload($arrFile=array(),$strKey=''){
        $objAuth  = new Auth($this->access_key, $this->secret_key); 
        $str_token = $objAuth->uploadToken($this->bucket);
        if(empty($strKey)){
            $strFile_Name = date("YmdHis").'.'.substr($arrFile["name"],strrpos($arrFile["name"],'.')+1);
        }else{
            $strFile_Name = $strKey.'.'.substr($arrFile["name"],strrpos($arrFile["name"],'.')+1);
        }
        $bucketUploadManager = new UploadManager();
        $strFile_Type  = $arrFile['type'];
        $FileData = $arrFile['tmp_name'];
        $PSize = filesize($FileData);
        $FileData = fread(fopen($FileData, "r"), $PSize);
        list($rest, $err) = $bucketUploadManager->put($str_token, $strFile_Name, $FileData, null, $strFile_Type);
        if ($err) {
            return array('state'=>false,'msg'=>$err);
        } else {
            $rest['type'] = $arrFile['type'];
            $rest['size'] = $arrFile['size'];
            return array('state'=>true,'msg'=>$rest);
        }
    }
    /**
     * [qiniu_delete 删除七牛上的文件]
     * @param  [string] $str_key [需要删除的文件KEY]
     * @return [array]           [消息数组]
     */
    public function qiniu_delete($str_key){
        $config = new Config();
        $objAuth = new Auth($this->access_key, $this->secret_key);
        $bucketManager = new BucketManager($objAuth, $config);
        $err = $bucketManager->delete($this->bucket, $str_key);
        if ($err) {
            return array('state'=>false,'msg'=>$err);
        }else{
            return array('state'=>true);
        }
    }
}
// $upTest = new qiniu_upload();
