<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;

class Coin
{
	/**
	 * 
	 * 返还娃娃豆给学生
	 *
	 * @access public
	 * @param unknown $array
	 * @return boolean
	 * @return boolean
	 * @version 1.0.0 (2014-8-19)
	 * @author weili
	 */
	public static function sconfirmQa($array) {
		$db = Yii::app ()->db;
		$nowtime=date('Y-m-d H:i:s');
		$sqlArray = array ();
		$sqlArray [] = "insert into edu_coin_log (user_id, order_id, order_type, nums, type, remark) values('$array[published_uid]', '$array[order_sn]', '0', $array[reward], 1, '$array[remark]')";
		$sqlArray [] = "update edu_passport_student_count set coin = coin + $array[reward], lock_coin = lock_coin - $array[reward] where user_id = '$array[published_uid]' and lock_coin >= $array[reward]";
		$sqlArray [] = "update edu_ask_dissent set refund_status = '1' where order_id = '$array[order_id]'";
		$sqlArray [] = "update edu_ask_order set order_status = '3',refund_status = '1',sh_id='3',solve_id='$array[solve_id]',confrim='2' where order_id = '$array[order_id]'";
		$sqlArray [] = "insert into edu_ask_command_log (order_sn,question_id,remark,reward,time) VALUES('$array[order_sn]','$array[question_id]','$array[remark]','$array[reward]','$nowtime')";
		
		$trans = $db->beginTransaction ();
		try {
			foreach ( $sqlArray as $sql ) {
				$flg = $db->createCommand ( $sql )->execute ();
			}
			$trans->commit ();
		} catch ( Exception $e ) {
			$trans->rollBack ();
			return false;
		}
		return true;
	}
	
	/**
	 *
	 * 返还娃娃豆给老师
	 *
	 * @access public
	 * @param unknown $array
	 * @return boolean
	 * @return boolean
	 * @version 1.0.0 (2014-8-19)
	 * @author weili
	 */
	public static function tconfirmQa($array) {
		$nowtime=date('Y-m-d H:i:s');
		$db = Yii::app ()->db;
		$sqlArray[] = "insert into edu_coin_log (user_id, order_id, order_type, nums, type, remark) values('$array[t_user_id]', '$array[order_id]', '0', '$array[nums]', '1', '$array[remark]')";
		$sqlArray[] = "update edu_passport_teacher_count set coin = coin + $array[nums] where user_id = '$array[t_user_id]'";
		$sqlArray[] = "update edu_passport_student_count set lock_coin = lock_coin - $array[nums] where lock_coin >= $array[nums] and user_id = '$array[user_id]'";
		$sqlArray[] = "update edu_ask_order set order_status = '3',sh_id='3',refund_status='2',solve_id='$array[solve_id]',confrim='2' where order_id = '$array[order_id]'";
		$sqlArray[] = "insert into edu_ask_command_log (order_sn,question_id,remark,reward,time) VALUES('$array[order_sn]','$array[question_id]','$array[remark]','$array[nums]','$nowtime')";
		$trans = $db->beginTransaction();
		try {
			foreach ($sqlArray as $sql){
				$flg = $db->createCommand($sql)->execute();
			}
			$trans->commit();
		} catch (Exception $e) {
			$trans->rollBack();
			return false;
		}
		return true;
		
	}
	
}