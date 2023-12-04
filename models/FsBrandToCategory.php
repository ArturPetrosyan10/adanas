<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_brand_to_category".
 *
 * @property int $id
 * @property int|null $brand_id
 * @property int|null $category_id
 */
class FsBrandToCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_brand_to_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'category_id' => 'Category ID',
        ];
    }
}
