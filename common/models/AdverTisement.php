<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_common_subject".
 *
 * @property integer $id
 * @property integer $org_id
 * @property integer $style
 * @property integer $sort
 * @property integer $xstatus
 * @property string $title
 * @property string $url
 * @property string $target
 */         
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_advertisement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['xstatus'], 'integer','max'=>1],
            [['style'], 'integer','max'=>4],
            [['sort'], 'integer','max'=>6],
            [['id', 'org_id'], 'integer','max'=>11],
            [['target'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_id' => 'Org_id',
            'xstatus'=>'Status',
            'sort'=>'Sort',
            'style' => 'Style',
            'target' => 'Target',
            'title' => 'Title',
            'url' => 'Url',
        ];
    }
}
