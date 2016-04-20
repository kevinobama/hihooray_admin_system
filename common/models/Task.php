<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_task".
 *
 * @property integer $id
 * @property string $user_id
 * @property integer $total_scores
 * @property integer $today_scores
 * @property integer $once_register
 * @property integer $once_complete
 * @property integer $everyday_checkin
 * @property string $lastdate_checkin
 * @property integer $everyday_weike
 * @property string $lastdate_weike
 * @property integer $everyday_share
 * @property string $lastdate_share
 * @property integer $serial_checkin
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_scores', 'today_scores', 'once_register', 'once_complete', 'everyday_checkin', 'everyday_weike', 'everyday_share', 'serial_checkin'], 'integer'],
            [['lastdate_checkin', 'lastdate_weike', 'lastdate_share'], 'safe'],
            [['user_id'], 'string', 'max' => 18]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'total_scores' => '总数',
            'today_scores' => '今日总数',
            'once_register' => '注册得分',
            'once_complete' => '完善资料得分',
            'everyday_checkin' => '每日签到得分',
            'lastdate_checkin' => '最后签到时间',
            'everyday_weike' => '每日点击微课得分',
            'lastdate_weike' => '最后点击微课时间',
            'everyday_share' => '每日分享得分',
            'lastdate_share' => '最后分享时间',
            'serial_checkin' => '连续签到得分',
        ];
    }
}
