<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_orders".
 *
 * @property int $id
 * @property int $buyer_id
 * @property int $seller_id
 * @property int $status
 * @property int|null  $price
 * @property string|null $shipping_date
 * @property string|null $cart_id
 * @property int|null $seller_quantity
 * @property string|null $comment
 * @property string $created_at
 */
class FsOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buyer_id', 'seller_id'], 'required'],
            [['buyer_id', 'seller_id', 'status', 'price', 'seller_quantity'], 'integer'],
            [['shipping_date', 'created_at'], 'safe'],
            [['comment'], 'string'],
            [['cart_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buyer_id' => 'Buyer ID',
            'seller_id' => 'Seller ID',
            'status' => 'Status',
            'price' => 'Price',
            'shipping_date' => 'Shipping Date',
            'cart_id' => 'Cart ID',
            'seller_quantity' => 'Seller Quantity',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }

    public function getSeller()
    {
        return $this->hasOne(FsUsers::class, ['id' => 'seller_id']);
    }

    public function getBuyer()
    {
        if(!$this->is_store){
          return $this->hasOne(FsUsers::class, ['id' => 'buyer_id']);
        } else {
           return $this->hasOne(FsStores::class, ['id' => 'buyer_id']); 
        }
    }
}
