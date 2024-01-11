<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_cart_params".
 *
 * @property int $id
 * @property int|null $cart_id
 * @property int|null $param_id
 * @property string|null $value
 */
class FsCartParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_cart_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cart_id', 'param_id'], 'integer'],
            [['value'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cart_id' => 'Cart ID',
            'param_id' => 'Param ID',
            'value' => 'Value',
        ];
    }

    public function getParam()
    {
        return $this->hasOne(FsParams::class, ['id' => 'param_id']);
    }
}
