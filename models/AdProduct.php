<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $q_t
 */
class AdProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'q_t'], 'required'],
            [['name', 'description', 'q_t'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Անվանում',
            'description' => 'Նկարագրություն',
            'q_t' => 'Չափային տվյալներ',
        ];
    }
}
