<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
class SystemEduCoin extends CComponent {

    /**
     * @param arrray() coin 总哇哇豆，user_id扣哪个用户的, order_type 扣豆类型, remark 说明
     * @return integer $fee 返回需要扣除的佣金
     */
    public static function doSystemEduCoin($array){
        $systemEduCoinRateArray = Yii::app()->params['systemEduCoinRate'];
        if(empty($systemEduCoinRateArray)){
            $systemEduCoinRateArray =  array( //系统按 老师等级 对应的提成比例 抽取佣金
                0 => 0.5,
                1 => 0.5,
                2 => 0.45,
                3 => 0.4,
                4 => 0.35,
                5 => 0.3,
                6 => 0.25,
                7 => 0.2,
                8 => 0.15,
                9 => 0.1,
                10 => 0.05
            );
        }

        if(empty($array['user_id'])){
            return 0;
        }

        $teacher = TeacherCount::model()->redisUserInfoCount($array['user_id']);
        if (!empty($teacher) && ($tdata = json_decode($teacher, true) !== false)) {
            $rateing =empty($tdata['rating']) ? 0 : $tdata['rating']; //星级
            //根据星级 得出提成比例
            $rate = $systemEduCoinRateArray[$rateing];
        }else{
            return 0;
        }

        if(empty($array['coin']) || $array['coin'] < 2){
            return 0;
        }
        $coin = $array['coin'];
        $fee = ceil($coin * $rate);//佣金

        //增加系统用户哇哇豆

        //检测系统用户是否存在
        $sys_user_id = Yii::app()->params['systemUserId'];
        $sysUser = StudentCount::model()->find("user_id=:user_id", array(":user_id" => $sys_user_id));

        $db = Yii::app()->db;
        if(empty($sysUser)){
            $sysUser = new StudentCount();
            $sysUser->user_id = $sys_user_id;
            $sysUser->coin = $fee;
            $sysUser->save();
        }else{
            $sql = "update edu_passport_student_count set coin = coin + $fee where user_id = '$sys_user_id'";
            $db->createCommand($sql)->execute();
        }

        //扣老师豆豆 提成平台
        $sql = "update edu_passport_teacher_count set coin = coin - $fee where user_id = '$array[user_id]'";
        $db->createCommand($sql)->execute();

        //
        $sql = "insert into edu_coin_log (user_id, order_id, order_type, nums, type, remark, detail) values('$array[user_id]', '$array[order_id]', '$array[order_type]', $fee, 0, '$array[remark](系统分成)', '')";
        $db->createCommand($sql)->execute();

        //保存日志
        $log = new SystemEducoinLog();
        $log->user_id = $array['user_id']; //老师
        $log->order_id = $array['order_id']; //订单号
        $log->order_type = $array['order_type']; //类型
        $log->nums = $fee; //佣金
        $log->remark = $array['remark']; //简介
        $log->createtime = StringUtil::getCurrentTime(); //时间
        $flg = $log->save();

        if($flg){
            return $fee;
        }else{
            return 0;
        }
    }
}