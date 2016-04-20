<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use FFMpeg\Coordinate\TimeCode;

class FfmpegTool {
	
	public $ffmpeg;
	public $video;
	
	function __construct($file){
		$loader = require COMMON_PATH.'lib/FFMpeg/vendor/autoload.php';		
		$this->ffmpeg = FFMpeg::create(
			array(
			    'ffmpeg.binaries'  => Yii::app()->params['ffmpeg']['ffmpeg_path'],
			    'ffprobe.binaries' => Yii::app()->params['ffmpeg']['ffprobe'],
			    'timeout'          => 3600, // The timeout for the underlying process
			    'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
			)
		);
		$this->video = $this->ffmpeg->open($file);
	}
	
	/**
	 * 
	 * 视频截图
	 *
	 * @access public
	 * @return return_type
	 * @version 1.0.0 (2014-5-15)
	 * @author zhuyongchao
	 */
	function saveFrame($destFile, $frame=10){
		$this->video->frame(TimeCode::fromSeconds($frame))->save($destFile);
	}
}
