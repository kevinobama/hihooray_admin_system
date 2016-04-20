<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
 class JPushNotice {
 	
 	public static $jpush;
 	public static $appkey, $masterkey;
 	
 	public static function getJpush(){
 		if(empty(self::$jpush)){
 			self::$appkey = Yii::app()->params['jpush']['appkey'];
 			self::$masterkey = Yii::app()->params['jpush']['masterkey']; 			
 			self::$jpush = new JPushClient(self::$appkey, self::$masterkey);
 		}
 		return self::$jpush;
 	}
 	
 	public function pushMsg($data){
 		$msg = $data['data'];
 		$alias = $data['alias']; 		
 		
 		set_time_limit(0);
 		//include_once 'JPushClient.php';
	    include_once 'model/Audience.php';
	    include_once 'model/Message.php';
	    include_once 'model/notification/Notification.php';
	    include_once 'model/notification/IOSNotification.php';
	    include_once 'model/notification/AndroidNotification.php';
	    include_once 'model/notification/WinphoneNotification.php';
	    include_once 'model/Options.php';
	    include_once 'model/Platform.php';
	    include_once 'model/PushPayload.php';

	    $payload = new PushPayload();
	    
	    
	    //设置接收用户
 		$audience = new Audience();
 		if(!empty($alias)){
 			$audience->alias = implode(",", $alias);
 			$payload->audience = $audience;
 		}

 		//通知栏设置
 		$android = new AndroidNotification(); 		
 		if(empty($msg['alert'])){
 			$msg['alert'] = $msg['title'];
 		}

 		$android->title = $msg['alert'];//通知栏第一行文字
 		$android->alert = $msg['alert'];//通知栏第二行文字
 		$android->builder_id = 2;
 		
 		//附加数据
 		//$ext
 		$extArray = array();
 		if(!empty($msg)){
 			foreach ($msg as $_key => $_msg){
 				if($_key == 'alert' || $_key == 'title') continue;
 				$extArray[$_key] = $_msg;
 			}
 		}
 		if(!empty($extArray)) $android->extras = $extArray;
		
 		//通知
 		$notification = new Notification();
 		$notification->alert = $msg['title'];
 		$notification->android = $android;
 		if(!empty($extArray)) $notification->extras = $extArray;
	    $payload->notification = $notification;
 		

 		//消息
//  		$message = new Message();
//  		$message->msg_content = $msg['title'];
//  		$message->title = $msg['title'];
//  		$message->content_type = $msg['title'];
//  		if(!empty($extArray)) $message->extras = $extArray;	
// 	    $payload->message = $message;	
	
	    $flg = self::getJpush()->sendPush($payload);

 	}
 	
 	/**
 	 *
 	 * push Notification to jpush server
 	 *
 	 * @access private
 	 * @param string $type (1000:系统消息,2000:课程, 3000：问答, 4000:充值)
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @param int $issave 是否保存数据库(0不保存，1保存) default 保存
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushNotification($type, $userArray, $dataArray, $issave=0){
 		if(empty($dataArray['type'])) $dataArray['type'] = $type;
// 		$msg['alias'] = $userArray;
// 		$msg['data'] = $dataArray;
 		if($issave == 1) $this->saveNotification($dataArray['type'], $userArray, $dataArray);
        return $this->pushScheduleNotice($type, $userArray, $dataArray, time());
// 		$this->pushMsg($msg);
 	}
 	/**
 	 * 
 	 * 保存消息到db
 	 *
 	 * @access public
 	 * @param string $type (1000:系统消息,2000:课程, 3000：问答, 4000:充值)
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014年7月29日)
 	 * @author zhuyongchao
 	 */
 	private function saveNotification($type, $userArray, $dataArray){
 		if(empty($type) || empty($userArray) || empty($dataArray)) return ;
  		//$userid = $_SESSION['user_id'];
  		//if(empty($userid)) return;
  		
 		$time = StringUtil::getCurrentTime();
 		foreach ($userArray as $uid){
 			$message = new PassportMessages();
 			$message->sender = 0;
 			$message->user_id = $uid;
 			$message->type = $type;
 			$message->cat_id = 0;
 			$message->message = $dataArray['title'];
 			$message->reg_date = $time;
 			$message->upd_date = $time;
 			$message->save();
 		}
 	}


 	/**
 	 *
 	 * system message(push Notification to jpush server)
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushSystemNotice($userArray, $dataArray, $issave=0){
 		$this->pushNotification("1000", $userArray, $dataArray, $issave);
 	}

 	/**
 	 *
 	 * Course (push Notification to jpush server)
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushCourseNotice($userArray, $dataArray, $issave=0){
 		$this->pushNotification("2000", $userArray, $dataArray, $issave);
 	}

 	/**
 	 *
 	 * QA (push Notification to jpush server)
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014-4-11)
 	 * @author zhuyongchao
 	 */
 	public function pushQuestionNotice($userArray, $dataArray, $issave=0){
 		$this->pushNotification("3000", $userArray, $dataArray, $issave);
 	}


     /**
      * 将已购买的课程放入 准备生成 定时推送的 队列
      * @param $array
      */
     public function addIncompletePushQueue($orderId){
         $hash = new ARedisHash("push.IncompleteQueueHash");
         $hash->add($orderId, $orderId);
     }
 	
 	/**
 	 * 定时消息发送
 	 * 请填写方法说明
 	 *
 	 * @access private
 	 * @param string $type (1000:系统消息,2000:课程, 3000：问答, 4000:充值)
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @param int $time 时间戳
 	 * @return void
 	 * @version 1.0.0 (2014年7月24日)
 	 * @author zhuyongchao
 	 */ 	
 	private function pushScheduleNotice($type, $userArray, $dataArray, $time){
        if(empty($dataArray['type'])) $dataArray['type'] = $type;
        $set = new ARedisSortedSet("push.ScheduleQueue");
        $hash = new ARedisHash("push.ScheduleHash");

        try{
            $scheduleId = $time . StringUtil::getMicroTime();
            $set->add($scheduleId, $time);

            $data = json_encode(array('userArray' => $userArray, 'dataArray' => $dataArray));
            $hash->add($scheduleId, $data);
        }catch (Exception $e){
            return 0;
        }
        return $scheduleId;
 	}
 	
 	/**
 	 *
 	 * system message add Push Schedule Queue
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @param int $time 时间戳
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushSystemScheduleNotice($userArray, $dataArray, $time){
 		return $this->pushScheduleNotice("1000", $userArray, $dataArray, $time);
 	}


 	/**
 	 *
 	 * Course message add Push Schedule Queue
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @param int $time 时间戳
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushCourseScheduleNotice($userArray, $dataArray, $time){
        return $this->pushScheduleNotice("2000", $userArray, $dataArray, $time);
 	}
 	
 	/**
 	 *
 	 * QA message add Push Schedule Queue
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户ID 数组.例:(array("478794343558152192","478794343558152192"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @param int $time 时间戳
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushQuestionScheduleNotice($userArray, $dataArray, $time){
        return $this->pushScheduleNotice("3000", $userArray, $dataArray, $time);
 	}
 	
 }
 ?>