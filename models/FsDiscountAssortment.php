<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_discount_assortment".
 *
 * @property int $id
 * @property int|null $discount_id
 * @property int|null $product_id
 * @property int|null $category_id
 */
class FsDiscountAssortment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_discount_assortment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_id', 'product_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discount_id' => 'Discount ID',
            'product_id' => 'Product ID',
            'category_id' => 'Category ID',
        ];
    }
}
