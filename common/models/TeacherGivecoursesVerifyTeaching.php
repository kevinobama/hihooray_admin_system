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
 * This is the model class for table "edu_teacher_givecourses_verify_teaching".
 *
 * @property string $user_id
 * @property integer $stages_id
 * @property string $stages_name
 * @property integer $subjects_id
 * @property string $subjects_name
 * @property string $createtime
 * @property integer $is_recommend
 * @property string $user_name
 * @property integer $flag
 * @property string $verify_time
 * @property integer $rathing
 * @property integer $is_rathing
 */
class TeacherGivecoursesVerifyTeaching extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_teacher_givecourses_verify_teaching';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['stages_id', 'subjects_id', 'is_recommend', 'flag', 'rathing', 'is_rathing'], 'integer'],
            [['createtime', 'verify_time'], 'safe'],
            [['user_id'], 'string', 'max' => 18],
            [['stages_name', 'subjects_name'], 'string', 'max' => 45],
            [['user_name'], 'string', 'max' => 50],
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
            'stages_id' => '教学阶段ID',
            'stages_name' => '教学阶段名称',
            'subjects_id' => '课程id',
            'subjects_name' => '课程名称',
            'createtime' => '创建时间',
            'is_recommend' => '0:未推荐 1：推荐',
            'user_name' => '老师名称',
            'flag' => '-1:被拒绝;0:未认证 1:待审核 2:审核通过',
            'verify_time' => '审核时间',
            'rathing' => '审核的星级',
            'is_rathing' => '0:得过星级 1：没有得到过',
        ];
    }
}
