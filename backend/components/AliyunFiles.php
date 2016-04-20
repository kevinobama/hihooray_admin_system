<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
use Aliyun\OSS\OSSClient;
use Aliyun\OSS\Exceptions\OSSException;
use Aliyun\Common\Exceptions\ClientException;
/**
 *
 * 类的说明
 *
 * @see AliyunFiles
 * @version 1.0.0 (2014-2-26)
 * @author sun
 */
class AliyunFiles{
    protected $allowExt = 'mp4,flv,jpg,apk,png,ppt,doc,docx,zip,rar,txt,xls,wps';
    public $client;
    protected $maxSize = 204800; // 文件大小 200M
    protected $errno = 0; // 错误编号
    protected $error = array (
        0 => '无错',
        1 => '上传文件超出系统限制',
        2 => '请上传合法文件'
    );
    
    function __construct(){
        Yii::import("common.lib.aliyun.*");
        require_once('aliyun.php');
        $this->client = OSSClient::factory(
	        array(
	            'AccessKeyId' => Yii::app()->params['aliyun']['OSSClient']['AccessKeyId'],
	            'AccessKeySecret' => Yii::app()->params['aliyun']['OSSClient']['AccessKeySecret'],
	        )
        );
    }

    /**
     *
     * 请填写方法说明
     *
     * @access public
     * @param 文件域 $file_field
     * @param 存储路径 $folder
     * @param 自定义文件名 $custom_name
     * @return string
     * @version 1.0.0 (2014-2-26)
     * @author sun
     */
	public function FilesUpload($file_field,$folder,$custom_name,$ext=null)
	{
	    // 获得文件
	    $file = $_FILES [$file_field];

	    // 检验上传是否成功
	    if ($file ['error']) {
	        $this->errno = $file ['error'];
	        return false;
	    }

	    if(!isset($ext)){//判断时候设置指定的文件后缀
	       $ext = $this->getExt ($file['name']);
	    }
	    // 检查后缀
	    if (! $this->isAllowExt ( $ext )) {
	        $this->errno = 8;
	        return false;
	    }
	    // 检查大小
	    if (! $this->isAllowSize ( $file ['size'] )) {
	        $this->errno = 9;
	        return false;
	    }

	    try {
	        // 随机生成文件名
	        $randName = $this->randName () . '.' . $ext;
	        $file_name = empty($custom_name)?$randName:$custom_name . '.' . $ext;

	        $object = $folder.$file_name;
	        $content = '';
	        $length = 0;
	        $fp = fopen($_FILES[$file_field]["tmp_name"],'r');

	        if($fp)
	        {
	            $f = fstat($fp);
	            $length = $f['size'];
	            while(!feof($fp))
	            {
	                $content .= fgets($fp);
	            }
	        }

	        $this->client->putObject(array(
	            'Bucket' => 'linwo',
	            'Key' => $object,
	            'Content' => $content,
	            'ContentLength' => $length,
	        ));
	        $ret['objectkey'] = $object;
	        $ret['errno'] = 0;
	    } catch (OSSException $ex) {
	        $ret['errno'] =  $ex->getErrorCode();
	        $ret['Message'] = $ex->getMessage();
// 	        echo "OSSException: " . $ex->getErrorCode() . " Message: " . $ex->getMessage();
	    } catch (ClientException $ex) {
	        $ret['errno'] = $ex->getMessage();
	        $ret['Message'] = $ex->getMessage();
// 	        echo "ClientExcetpion, Message: " . $ex->getMessage();
	    }
	    return $ret;
	}
	
	public function VideoUpload($model, $file_field, $folder){
		$file = $_FILES[$model];
		if ($file['error'][$file_field]) {
			$this->errno = $file['error'][$file_field];
			return false;
		}
		if(!isset($ext)){
			$ext = $this->getExt($file['name'][$file_field]);
		}
		if (!$this->isAllowExt($ext)) {
			$this->errno = 8;
			return false;
		}
		if (!$this->isAllowSize($file['size'][$file_field])){
			$this->errno = 9;
			return false;
		}
		
		$array = array();
		$videoName = $this->randName();
		
		$videoFileName = empty($custom_name) ? $videoName : $custom_name;
		$imageFilename = empty($custom_name) ? $videoName : $custom_name;

		$videoFileName = $videoFileName . "." . $ext;
		$imageFilename_60 = $imageFilename . "_60.jpg";
		$imageFilename_256 = $imageFilename . "_256.jpg";
		$imageFilename_320 = $imageFilename . "_320.jpg";
		$imageFilename = $imageFilename . ".jpg";
		
		$destDir = ROOT . $folder;
		if(!is_dir($destDir)){
			mkdir($dir, 777, true);
		}
		$videoUrl = $folder.$videoFileName;
		//copy video file
		if(!move_uploaded_file($file["tmp_name"][$file_field], $destDir.$videoFileName)){
			return false;
		}
		$array['video_size'] = $this->bytesToSize1024($file['size'][$file_field]);
		$array['dir'] = ROOT;
		$array['video_url'] = $videoUrl;
		$array['video_name'] = $videoFileName;
		
		//get 图片
		$ffmpeg = new FfmpegTool($destDir.$videoFileName);
		$ffmpeg->saveFrame($destDir.$imageFilename, 10);

		Yii::import("comext.phpThumb.PhpThumbFactory");
		$thumb = PhpThumbFactory::create($destDir . $imageFilename);
		$thumb->adaptiveResize(60, 60);
		$thumb->save($destDir.$imageFilename_60, 'jpg');

		$thumb = PhpThumbFactory::create($destDir . $imageFilename);
		$thumb->adaptiveResize(256, 256);
		$thumb->save($destDir.$imageFilename_256, 'jpg');
		
		$thumb = PhpThumbFactory::create($destDir . $imageFilename);
		$thumb->adaptiveResize(320, 320);
		$thumb->save($destDir.$imageFilename_320, 'jpg');
		
		$array['img_url_60'] = $folder . $imageFilename_60;
		$array['img_url_256'] = $folder . $imageFilename_256;
		$array['img_url_320'] = $folder . $imageFilename_320;

		$this->rsyncFile2Aliyun(ROOT, $array['video_url']);
		$this->rsyncFile2Aliyun(ROOT, $array['img_url_60']);
		$this->rsyncFile2Aliyun(ROOT, $array['img_url_256']);
		$this->rsyncFile2Aliyun(ROOT, $array['img_url_320']);

		return $array;
	}

	// 获取文件类型
	protected function getExt($file) {
	    $tmp = explode ( '.', $file );
	    return end ( $tmp );
	}

	// 随机生成文件名
	protected function randName($length = 6) {
	    $str = 'abcdefghijkmnpqrstuvwxyz23456789';
	    return substr ( str_shuffle ( $str ), 0, $length )."_".time();
	}

	// 检测文件类型 且忽略大小写
	protected function isAllowExt($ext) {
	    return in_array ( strtolower ( $ext ), explode ( ',', strtolower ( $this->allowExt ) ) );
	}
	// 检查文件的大小
	protected function isAllowSize($size) {
	    return $size <= $this->maxSize * 1024 * 1024;
	}

	public function isUpFile($model){
	    return empty($_FILES[$model])?false:true;
	}
	
	public function bytesToSize1024($bytes, $precision = 2) {
	    $unit = array('B','KB','MB');
	    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
	}
	
	public function rsyncFile2Aliyun($dir, $url){
		try {
			$content = '';
			$length = 0;
			$fp = fopen($dir.$url,'r');		
			if($fp){
				$f = fstat($fp);
				$length = $f['size'];
				while(!feof($fp))
				{
					$content .= fgets($fp);
				}
			}
		
			$this->client->putObject(array(
					'Bucket' => 'weike',
					'Key' => $url,
					'Content' => $content,
					'ContentLength' => $length,
			));
			return true;
		} catch (OSSException $ex) {
		} catch (ClientException $ex) {
		}
		return false;
	}
}
