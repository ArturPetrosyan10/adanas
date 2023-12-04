<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_product_params".
 *
 * @property int $id
 * @property int $product_id
 * @property int $param_id
 * @property string $value
 */
class FsProductParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_product_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'param_id', 'value'], 'required'],
            [['product_id', 'param_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
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
            'value' => 'Value',
        ];
    }

    public function getParam()
    {
        return $this->hasOne(FsParams::class, ['id' => 'param_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(FsProducts::class, ['id' => 'product_id']);
    }
}
