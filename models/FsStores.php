<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_stores".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property string|null $hvhh
 * @property int|null $order_num
 * @property string|null $logo
 * @property int|null $status
 */
class FsStores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_stores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_num', 'status','parent_id'], 'integer'],
            [['name', 'hvhh', 'logo'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 400],
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
            'address' => 'Address',
            'hvhh' => 'Hvhh',
            'parent_id'=>'parent_id',
            'order_num' => 'Order Num',
            'logo' => 'Logo',
            'status' => 'Status',
        ];
    }
}
