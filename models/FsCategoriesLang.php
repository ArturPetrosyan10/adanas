<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_categories_lang".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_ru
 * @property string $description_en
 * @property string $meta_title_ru
 * @property string $meta_title_en
 * @property string $meta_description_ru
 * @property string $meta_description_en
 * @property string $meta_keywords_ru
 * @property string $meta_keywords_en
 *
 * @property FsCategories $category
 */
class FsCategoriesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_categories_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name_ru', 'name_en', 'description_ru', 'description_en', 'meta_title_ru', 'meta_title_en', 'meta_description_ru', 'meta_description_en', 'meta_keywords_ru', 'meta_keywords_en'], 'required'],
            [['category_id'], 'integer'],
            [['description_ru', 'description_en', 'meta_description_ru', 'meta_description_en', 'meta_keywords_ru', 'meta_keywords_en'], 'string'],
            [['name_ru', 'name_en', 'meta_title_ru', 'meta_title_en'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => FsCategories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'meta_title_ru' => 'Meta Title Ru',
            'meta_title_en' => 'Meta Title En',
            'meta_description_ru' => 'Meta Description Ru',
            'meta_description_en' => 'Meta Description En',
            'meta_keywords_ru' => 'Meta Keywords Ru',
            'meta_keywords_en' => 'Meta Keywords En',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(FsCategories::class, ['id' => 'category_id']);
    }
}
