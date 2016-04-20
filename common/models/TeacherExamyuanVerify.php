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
 * This is the model class for table "edu_teacher_examyuan_verify".
 *
 * @property string $id
 * @property string $user_id
 * @property string $username
 * @property string $examyuan_name
 * @property string $createtime
 * @property integer $flag
 * @property string $exam_num
 * @property string $hits
 * @property string $examer_num
 * @property string $images
 * @property integer $display
 * @property integer $order
 */
class TeacherExamyuanVerify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_teacher_examyuan_verify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createtime'], 'safe'],
            [['flag', 'exam_num', 'hits', 'examer_num', 'display', 'order'], 'integer'],
            [['user_id'], 'string', 'max' => 18],
            [['username', 'examyuan_name'], 'string', 'max' => 45],
            [['images'], 'string', 'max' => 255],
            [['examyuan_name'], 'unique'],
            [['user_id'], 'unique']
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
            'examyuan_name' => '考试苑名称',
            'createtime' => '创建时间',
            'flag' => '考试苑认证: -1:被拒绝;0:未认证 1:待审核 2:审核通过',
            'exam_num' => '试卷数量',
            'hits' => '点击数量',
            'examer_num' => '参考人数',
            'images' => '考试背景图片',
            'display' => '是否显示',
            'order' => '排序',
        ];
    }
}
