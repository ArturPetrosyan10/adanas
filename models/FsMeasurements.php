<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_measurements".
 *
 * @property int $id
 * @property string $code_
 * @property string $name
 * @property string $name_ru
 * @property string $name_en
 * @property int $status
 */
class FsMeasurements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_measurements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'code_', 'name', 'name_ru', 'name_en'], 'required'],
            [['id', 'status'], 'integer'],
            [['code_'], 'string', 'max' => 200],
            [['name', 'name_ru', 'name_en'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_' => 'Code',
            'name' => 'Name',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'status' => 'Status',
        ];
    }
}
