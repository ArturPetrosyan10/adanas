<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_conc_companies".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $img
 */
class AdConcCompanies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_conc_companies';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Անուն',
            'img' => 'Լոգո',
        ];
    }
}
