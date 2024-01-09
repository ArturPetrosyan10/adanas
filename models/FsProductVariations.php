<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_product_variations".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $param_id
 * @property string|null $code
 * @property string|null $img
 * @property float|null $price
 */
class FsProductVariations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_product_variations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['price'], 'number'],
            [['code'], 'string', 'max' => 255],
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
            'param_id' => 'Param ID',
            'code' => 'Code',
            'price' => 'Price',
        ];
    }
    public function getVariationParams()
    {
        return $this->hasMany(FsVariationsParams::class, ['variation_id' => 'id']);
    }
}
