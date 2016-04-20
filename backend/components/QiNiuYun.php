<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;

class QiNiuYun extends CComponent{

	public $access_key;
	public $secret_key;
	public $bucket;
	public $host;
	public $duration = "00:00";
	
	function __construct(){
 		Yii::import("application.lib.qiniu.*");
		require_once("http.php");
		require_once("auth_digest.php");
		require_once("utils.php");
 		
 		$this->access_key = Yii::app()->params['qiniu']['access_key'];
 		$this->secret_key = Yii::app()->params['qiniu']['secret_key'];
 		$this->bucket = Yii::app()->params['hooray-weike']['bucket'];
 		$this->host = Yii::app()->params['hooray-weike']['url'];
	}
	
	public function formatDuration($sec){
		$sec = intval($sec);
		if($sec < 3600){
			$duration = date("i:s", $sec);
		}else{
			$duration = date("H:i:s", $sec);
		}
		return $duration;
	}
	
	public function isConvertVideo($video_url){
		$data = file_get_contents($video_url."?avinfo");
		if(!empty($data)){
			$array = json_decode($data, true);//codec_name

            if(!empty($array['format']['duration'])){
                $this->duration = $this->formatDuration($array['format']['duration']);
            }

			if(!empty($array['streams']) && is_array($array['streams'])){				//
				if(!empty($array['streams'][0]['codec_name'])){
					$codec = $array['streams'][0]['codec_name'];
					if($codec == 'h264'){
						return true;
					}
				}
			}
		}
		return false;
	}

	public function doVideoCover($key, $notifyURL, $sec=10){
		$mac = new Qiniu_Mac($this->access_key, $this->secret_key);
		$client = new Qiniu_MacHttpClient($mac);
		$fops = "";
		$keyArray = explode(".", $key);
		$ext = strtolower($keyArray[count($keyArray)-1]);
		//if($ext == 'mp4' && $this->isConvertVideo($this->host . $key)){
        if($this->isConvertVideo($this->host . $key)){
			$fops = "avthumb/mp4/vcodec/libx264;";
		}
	
		//$fops_60 = "vframe/jpg/offset/10/w/60/h/60";
		//$fops_256 = "vframe/jpg/offset/10/w/256/h/256";
		$fops .= "vframe/jpg/offset/".$sec."/w/320/h/320";
		
		//$encodedFops_60 = urlencode($fops_60);
		//$encodedFops_256 = urlencode($fops_256);
		//$fops = $encodedFops_60 .";" . $encodedFops_256 .";" . $encodedFops_320;
		$fops = urlencode($fops);
		//$fops = $encodedFops_320;
	
		$encodedBucket = urlencode($this->bucket);
		$encodedNotifyURL = urlencode($notifyURL);
		$encodedKey = urlencode($key);

        //获取 qiuni queue name
        $queueName = Yii::app()->params['hooray-weike']['pfopQueue'];
        $qName = "";
        if(!empty($queueName)){
            $qName = $queueName[rand(0,3)];
        }
	
		$apiHost = "http://api.qiniu.com";
		$apiPath = "/pfop/";
		$requestBody = "bucket=$encodedBucket&key=$encodedKey&fops=$fops&notifyURL=$encodedNotifyURL";
        if(!empty($qName)){
            $requestBody .= "&pipeline=".$qName;
        }
		list($ret, $err) = Qiniu_Client_CallWithForm($client, $apiHost . $apiPath, $requestBody);
		if ($err !== null) {
			return array("duration" => $this->duration);
		} else {
			return array("duration" => $this->duration, "persistentId" => $ret['persistentId']);
		}
	}

	public function testBase64(){
		$mac = new Qiniu_Mac($this->access_key, $this->secret_key);
		$client = new Qiniu_MacHttpClient($mac);
		Yii::import("application.lib.qiniu.*");
         require_once('rs.php');
         require_once('io.php');
		$accessKey = $this->access_key;
 		$secretKey = $this->secret_key;
 		Qiniu_setKeys($accessKey, $secretKey);
 		$bucket = Yii::app()->params['hooray-weike']['bucket'];
		$putPolicy = new Qiniu_RS_PutPolicy($bucket);
 		$upToken = $putPolicy->Token(null); 	


		$apiHost = "http://api.qiniu.com";
		$apiPath = "/putb64/";
		$requestBody = "data:image/png;base64,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";
/*
		$apiPath  .= count($b64file);

		$files = array(array('file', $b64file));
		$fields = array('token' => $upToken);

		Qiniu_Client_CallWithForm($client, $apiHost . $apiPath, $requestBody);
		var_dump($ret);
		var_dump($err);*/



		Qiniu_setKeys($this->access_key, $this->secret_key);
		$bucket = Yii::app()->params['hooray-weike']['bucket'];
		$putPolicy = new Qiniu_RS_PutPolicy($bucket);
		$upToken = $putPolicy->Token(null);var_dump($upToken);
		$putExtra = new Qiniu_PutExtra();
		$putExtra->MimeType = "image/png";
		$putExtra->Crc32 = 1;
		//$putExtra->Params = array("putb64" => strlen($requestBody));
		list($ret, $err) = Qiniu_Put($upToken, $key, $requestBody, $putExtra);
		var_dump($ret);
		var_dump($err);

	}
}
?>