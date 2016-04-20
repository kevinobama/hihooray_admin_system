<?php
/** 
 * Created by Aptana studio. 
 * User: Kevin Henry Gates III at Hihooray,Inc 
 * Date: 2015/11/06  
 * Time: 07:04 PM 
 */
namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_common_stages".
 *
 * @property string $id
 * @property integer $fid
 * @property string $stages_name
 * @property integer $xtype
 */
class CommonStages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_common_stages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'xtype'], 'required'],
            [['fid', 'xtype'], 'integer'],
            [['stages_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '阶段ID自增',
            'fid' => '父ID',
            'stages_name' => '阶段名称',
            'xtype' => '0:删除，1：使用',
        ];
    }
}
