<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_student_version".
 *
 * @property string $vid
 * @property string $version_name
 * @property integer $version_number
 * @property string $version_url
 * @property string $filemd5
 * @property string $explain
 * @property string $create_time
 * @property string $update_time
 * @property integer $xstatus
 * @property integer $enforce
 */
class StudentVersion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_student_version';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version_number', 'xstatus', 'enforce'], 'integer'],
            [['explain'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['version_name'], 'string', 'max' => 50],
            [['version_url'], 'string', 'max' => 100],
            [['filemd5'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vid' => 'ID',
            'version_name' => '版本名称',
            'version_number' => '版本号',
            'version_url' => '版本URL',
            'filemd5' => '文件MD5值',
            'explain' => '版本说明',
            'create_time' => '提交时间',
            'update_time' => '版本提交时间',
            'xstatus' => '是否发布 0:未发布 1:已发布 2:历史发布',
            'enforce' => '是否强制升级:0:不强制升级,1:强制升级',
        ];
    }
}
