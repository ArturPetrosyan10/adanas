<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_store_characters".
 *
 * @property int $id
 * @property int|null $store_id
 * @property int|null $product_id
 */
class AdStoreCharacter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_store_characters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_id', 'product_id'], 'integer'],
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
            'product_id' => 'Product ID',
        ];
    }
}
