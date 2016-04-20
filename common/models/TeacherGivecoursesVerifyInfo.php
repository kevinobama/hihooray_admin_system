<?php
/** 
 * Created by Aptana studio. 
 * User: Kevin Henry Gates III at Hihooray,Inc 
 * Date: 2015/11/06  
 * Time: 08:12 PM 
 */
namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_teacher_givecourses_verify_info".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $username
 * @property integer $cat_id
 * @property string $name
 * @property string $number
 * @property string $images
 * @property string $datetime
 * @property integer $flag
 * @property string $verify_time
 * @property integer $statistics_flag
 */
class TeacherGivecoursesVerifyInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_teacher_givecourses_verify_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'flag', 'statistics_flag'], 'integer'],
            [['datetime', 'verify_time'], 'safe'],
            [['user_id'], 'string', 'max' => 18],
            [['username'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 15],
            [['number'], 'string', 'max' => 50],
            [['images'], 'string', 'max' => 255],
            [['user_id', 'cat_id'], 'unique', 'targetAttribute' => ['user_id', 'cat_id'], 'message' => 'The combination of 用户ID and 认证资格id has already been taken.']
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
            'username' => '用户名',
            'cat_id' => '认证资格id',
            'name' => '开课认证名称',
            'number' => '认证号码',
            'images' => '认证图片',
            'datetime' => 'Datetime',
            'flag' => '-1:被拒绝;0:未认证 1:待审核 2:审核通过',
            'verify_time' => '审核时间',
            'statistics_flag' => '1：统计完全 2：统计未完全',
        ];
    }
}
