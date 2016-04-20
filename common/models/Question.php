<?php
/** 
 * Created by Aptana studio. 
 * User: Kevin Henry Gates III at Hihooray,Inc 
 * Date: 2015/10/28  
 * Time: 05:37 PM 
 */
namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_ask_question".
 *
 * @property integer $question_id
 * @property string $question_title
 * @property string $question_detail
 * @property integer $reward
 * @property string $add_time
 * @property string $expired_time
 * @property string $update_time
 * @property string $published_uid
 * @property string $published_nickname
 * @property string $published_username
 * @property integer $has_attach
 * @property integer $status
 * @property integer $grade_id
 * @property integer $subject_id
 * @property string $grade_name
 * @property string $subject_name
 * @property integer $anonymous
 * @property integer $view_count
 * @property integer $is_recommend
 * @property string $attach_info
 * @property integer $expired_id
 * @property integer $question_type_id
 * @property string $question_type_name
 * @property integer $fav_count
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_ask_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_detail', 'attach_info'], 'string'],
            [['reward', 'has_attach', 'status', 'grade_id', 'subject_id', 'anonymous', 'view_count', 'is_recommend', 'expired_id', 'question_type_id', 'fav_count'], 'integer'],
            [['add_time', 'expired_time', 'update_time'], 'safe'],
            [['question_title'], 'string', 'max' => 255],
            [['published_uid'], 'string', 'max' => 18],
            [['published_nickname', 'published_username', 'question_type_name'], 'string', 'max' => 50],
            [['grade_name', 'subject_name'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'ID',
            'question_title' => '问题标题',
            'question_detail' => '问题说明',
            'reward' => '悬赏分',
            'add_time' => '添加时间',
            'expired_time' => '过期时间',
            'update_time' => '更新时间',
            'published_uid' => '发布用户UID',
            'published_nickname' => '发布者昵称',
            'published_username' => '发布者姓名',
            'has_attach' => '是否存在附件',
            'status' => '状态',
            'grade_id' => '年级',
            'subject_id' => '科目',
            'grade_name' => '年级名',
            'subject_name' => '科目名',
            'anonymous' => '是否匿名',
            'view_count' => '浏览次数',
            'is_recommend' => '是否推荐',
            'attach_info' => '附件信息',
            'expired_id' => '过期类型',
            'question_type_id' => '题行ID',
            'question_type_name' => '题行类型',
            'fav_count' => '收藏次数',
        ];
    }
}
