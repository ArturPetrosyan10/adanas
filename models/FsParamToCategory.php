<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_param_to_category".
 *
 * @property int $id
 * @property int $param_id
 * @property int $category_id
 */
class FsParamToCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_param_to_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['param_id', 'category_id'], 'required'],
            [['param_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'param_id' => 'Param ID',
            'category_id' => 'Category ID',
        ];
    }
}
