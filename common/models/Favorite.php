<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_ask_favorite".
 *
 * @property integer $id
 * @property integer $question_id
 * @property string $user_id
 * @property integer $type
 * @property integer $status
 * @property string $createtime
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_ask_favorite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'type', 'status'], 'integer'],
            [['type'], 'required'],
            [['createtime'], 'safe'],
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
            'question_id' => 'Question ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'status' => 'Status',
            'createtime' => 'Createtime',
        ];
    }
}
