<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_user_to_brand".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $brand_id
 * @property int|null $customer_id
 */
class FsUserToBrand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_user_to_brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'brand_id', 'customer_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'brand_id' => 'Brand ID',
            'customer_id' => 'Customer ID',
        ];
    }
}
