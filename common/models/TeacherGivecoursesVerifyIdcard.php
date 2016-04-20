<?php
/** 
 * Created by Aptana studio. 
 * User: Kevin Henry Gates III at Hihooray,Inc 
 * Date: 2015/11/06  
 * Time: 08:11 PM 
 */
namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_teacher_givecourses_verify_idcard".
 *
 * @property string $user_id
 * @property string $realname
 * @property string $id_card
 * @property string $idcard_head
 * @property string $idcard_front
 * @property string $idcard_back
 * @property integer $flag
 * @property string $datetime
 * @property string $verify_time
 */
class TeacherGivecoursesVerifyIdcard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_teacher_givecourses_verify_idcard';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['flag'], 'integer'],
            [['datetime', 'verify_time'], 'safe'],
            [['user_id'], 'string', 'max' => 18],
            [['realname'], 'string', 'max' => 15],
            [['id_card'], 'string', 'max' => 20],
            [['idcard_head', 'idcard_front', 'idcard_back'], 'string', 'max' => 255],
            [['user_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户ID',
            'realname' => '资格认证名称',
            'id_card' => '身份证号码',
            'idcard_head' => '大头照',
            'idcard_front' => '身份证正面',
            'idcard_back' => '身份证反面',
            'flag' => '-1:被拒绝;0:未认证 1:待审核 2:审核通过',
            'datetime' => '提交时间',
            'verify_time' => '审核时间',
        ];
    }
}
