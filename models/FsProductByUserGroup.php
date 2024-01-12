<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_product_by_user_group".
 *
 * @property int $id
 * @property int $product_id
 * @property int $group_id
 */
class FsProductByUserGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_product_by_user_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'group_id'], 'required'],
            [['product_id', 'group_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'group_id' => 'Group ID',
        ];
    }
}
