<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_coin_log".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $order_id
 * @property integer $order_type
 * @property integer $nums
 * @property integer $type
 * @property string $remark
 * @property string $detail
 * @property integer $status
 * @property string $createtime
 */
class CoinLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_coin_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_type', 'nums', 'type', 'status'], 'integer'],
            [['detail'], 'string'],
            [['createtime'], 'safe'],
            [['user_id'], 'string', 'max' => 18],
            [['order_id'], 'string', 'max' => 64],
            [['remark'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'order_type' => 'Order Type',
            'nums' => '哇哇豆',
            'type' => 'Type',
            'remark' => 'Remark',
            'detail' => 'Detail',
            'status' => 'Status',
            'createtime' => 'Createtime',
        ];
    }
}
