<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_product_img".
 *
 * @property int $id
 * @property int $productId
 * @property string $name
 * @property int|null $active
 */
class AdProductImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_product_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['productId', 'name'], 'required'],
            [['productId', 'active'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productId' => 'Product ID',
            'name' => 'Name',
            'active' => 'Active',
        ];
    }
}
