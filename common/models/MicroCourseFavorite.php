<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_micro_course_favorite".
 *
 * @property integer $id
 * @property integer $micro_id
 * @property string $user_id
 * @property string $create_time
 */
class MicroCourseFavorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_micro_course_favorite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['micro_id'], 'integer'],
            [['create_time'], 'safe'],
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
            'micro_id' => 'Micro ID',
            'user_id' => 'User ID',
            'create_time' => 'Create Time',
        ];
    }
}