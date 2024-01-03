<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_products_store".
 *
 * @property int $id
 * @property int $store_id
 * @property int $product_id
 * @property int $document_id documentic ira id, orderic ira id
 * @property int $type 1-document, 2-order
 * @property int $count
 * @property float $price
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class AdProductStore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_products_store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_id', 'product_id', 'document_id', 'count'], 'required'],
            [['store_id', 'product_id', 'document_id', 'type'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'store_id' => 'Store ID',
            'product_id	' => 'product ID',
            'document_id' => 'Document ID',
            'type' => 'Type',
            'count' => 'Count',
            'price' => 'Price',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getAdProductName()
    {
        return $this->hasOne(AdProduct::class, ['product_id' => 'product_id']);
    }}
