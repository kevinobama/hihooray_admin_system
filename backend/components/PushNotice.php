 <?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;

 class PushNotice  {

 	public $redisList;

 	/**
 	 *
 	 * get packet Id
 	 *
 	 * @access public
 	 * @param number $prefix
 	 * @return number
 	 * @version 1.0.0 (2014-4-11)
 	 * @author zhuyongchao
 	 */
 	public static function getId($prefix) {
 		$counter = new ARedisCounter($prefix);
 		if(!empty($counter)){
 			$counter->increment(1);
 			return $counter->getValue();
 		}else{
 			$this->lastid++;
 			return $this->lastid;
 		}
 	}

 	/**
 	 *
 	 * Msg Add Push Queue
 	 *
 	 * @access private
 	 * @param string $msg
 	 * @return return_type
 	 * @version 1.0.0 (2014-4-11)
 	 * @author zhuyongchao
 	 */
 	private function addQueue($msg){
 		$queueName = Yii::app()->params['QueuePushNotification'];
 		if(empty($queueName)) $queueName = "QueuePushNotification";
 		$this->redisList = new ARedisList($queueName);
 		$this->redisList->push($msg);
 	}

 	/**
 	 *
 	 * push Notification to MessageQueue
 	 *
 	 * @access private
 	 * @param string $type (1000:系统消息,2000:课程, 3000：问答, 4000:充值)
 	 * @param array $userArray <b>接收用户名 数组.例:(array("张三","lisi","wuyulan"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	private function pushNotification($type, $userArray, $dataArray){
 		$dataArray['type'] = $type;
 		$serverName = Yii::app()->xmpp->server;
 		$callbackUrl = Yii::app()->params['pushNoticeCallbackUrl'];

 		$packetId = "pjk-no-".PushNotice::getId("pjk-no");

 		$msg = "<message id='".$packetId."' to='i.linwotech.com' type='headline'>
				<addresses xmlns='http://jabber.org/protocol/address'>";
 		foreach ($userArray as $_user){
 			$msg .= "<address type='bcc' jid='".$_user."@".$serverName."'/>";
 		}
 		$msg .= "</addresses>
				<pushmessage xmlns='http://linwotech.com/pushmessage'>";
 		foreach($dataArray as $key => $_data){
 			$msg .= "<$key>$_data</$key>";
 		}
 		$msg .= "<host>".$callbackUrl."</host>
				</pushmessage>
				</message>";

 		$this->addQueue($msg);
 	}


 	/**
 	 *
 	 * system message add Push Queue
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户名 数组.例:(array("张三","lisi","wuyulan"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushSystemNotice($userArray, $dataArray){
 		$this->pushNotification("1000", $userArray, $dataArray);
 	}

 	/**
 	 *
 	 * Course add Push Queue
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户名 数组.例:(array("张三","lisi","wuyulan"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014-4-13)
 	 * @author zhuyongchao
 	 */
 	public function pushCourseNotice($userArray, $dataArray){
 		$this->pushNotification("2000", $userArray, $dataArray);
 	}

 	/**
 	 *
 	 * QA add Push Queue
 	 *
 	 * @access public
 	 * @param array $userArray <b>接收用户名 数组.例:(array("张三","lisi","wuyulan"))</b>
 	 * @param array $dataArray <b>消息内容数组(一维,可包含多个字段的内容).例: array("title" => "这是推送消息标题", "content" => "这是推送消息内容", "time" => "这是推送消息时间")</b>
 	 * @return void
 	 * @version 1.0.0 (2014-4-11)
 	 * @author zhuyongchao
 	 */
 	public function pushQuestionNotice($userArray, $dataArray){
 		$this->pushNotification("3000", $userArray, $dataArray);
 	}
 }
 ?>