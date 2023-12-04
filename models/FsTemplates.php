<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_templates".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $seller_id
 * @property string|null $name
 * @property string|null $cart_id
 */
class FsTemplates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'seller_id'], 'integer'],
            [['cart_id'], 'string'],
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
            'user_id' => 'User ID',
            'seller_id' => 'Seller ID',
            'name' => 'Name',
            'cart_id' => 'Cart ID',
        ];
    }

    public function getSeller()
    {
        return $this->hasOne(FsUsers::class, ['id' => 'seller_id']);
    }
}
