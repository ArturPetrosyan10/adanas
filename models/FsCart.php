<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_cart".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $quantity
 * @property int $status
 * @property int $variation_id
 * @property float $price
 * @property string $created_at
 */
class FsCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'quantity'], 'required'],
            [['user_id', 'product_id', 'quantity','variation_id', 'status'], 'integer'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
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
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'variation_id' => 'variation_id',
            'status' => 'Status',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(FsProducts::class, ['id' => 'product_id']);
    }
}
