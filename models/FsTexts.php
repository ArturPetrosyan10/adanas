<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_texts".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $text_am
 * @property string|null $text_ru
 * @property string|null $text_en
 */
class FsTexts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'text_am', 'text_ru', 'text_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'text_am' => 'Text Am',
            'text_ru' => 'Text Ru',
            'text_en' => 'Text En',
        ];
    }
}
