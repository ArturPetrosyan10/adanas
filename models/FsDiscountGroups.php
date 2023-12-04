<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_discount_groups".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $type_
 * @property int|null $user_id
 * @property int|null $order_num
 * @property int|null $status
 */
class FsDiscountGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_discount_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_', 'user_id', 'order_num', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type_' => 'Type',
            'user_id' => 'User ID',
            'order_num' => 'Order Num',
            'status' => 'Status',
        ];
    }
}
