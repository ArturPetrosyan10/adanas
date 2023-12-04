<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_banners".
 *
 * @property int $id
 * @property string $title_am
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $small_description_am
 * @property string|null $small_description_ru
 * @property string|null $small_description_en
 * @property string|null $description_am
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string|null $url
 * @property string|null $image
 * @property string|null $image_mobile
 * @property int|null $status
 * @property int|null $type_
 * @property int|null $order_num
 */
class FsBanners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_am'], 'required'],
            [['status', 'type_', 'order_num'], 'integer'],
            [['title_am', 'title_ru', 'title_en', 'small_description_am', 'small_description_ru', 'small_description_en'], 'string', 'max' => 255],
            [['description_am', 'description_ru', 'description_en'], 'string', 'max' => 500],
            [['url'], 'string', 'max' => 200],
            [['image', 'image_mobile'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_am' => 'Title Am',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'small_description_am' => 'Small Description Am',
            'small_description_ru' => 'Small Description Ru',
            'small_description_en' => 'Small Description En',
            'description_am' => 'Description Am',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'url' => 'Url',
            'image' => 'Image',
            'image_mobile' => 'Image Mobile',
            'status' => 'Status',
            'type_' => 'Type',
            'order_num' => 'Order Num',
        ];
    }
}
