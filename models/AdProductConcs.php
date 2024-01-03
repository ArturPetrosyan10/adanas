<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_product_concs".
 *
 * @property int $id
 * @property int|null $document_id
 * @property int|null $store_id
 * @property int|null $product_id
 * @property int|null $count
 * @property int|null $price
 * @property int|null $concurent_id
 */
class AdProductConcs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_product_concs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_id', 'store_id', 'product_id', 'count', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_id' => 'Document ID',
            'store_id' => 'Store ID',
            'product_id' => 'Product ID',
            'count' => 'Count',
            'price' => 'Price',
        ];
    }
}
