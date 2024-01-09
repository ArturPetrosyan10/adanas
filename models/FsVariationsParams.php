<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_variations_params".
 *
 * @property int $id
 * @property int $variation_id
 * @property int $param_id
 * @property string $value
 */
class FsVariationsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_variations_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['variation_id', 'param_id'], 'required'],
            [['variation_id', 'param_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'variation_id' => 'Variation ID',
            'param_id' => 'Param ID',
        ];
    }
    public function getParamName()
    {
        return $this->hasOne(FsParams::class, ['id' => 'param_id']);
    }
}
