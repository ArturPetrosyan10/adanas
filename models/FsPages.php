<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_pages".
 *
 * @property int $id
 * @property string|null $page_name_am
 * @property string|null $page_name_ru
 * @property string|null $page_name_en
 * @property string|null $page_title_am
 * @property string|null $page_title_ru
 * @property string|null $page_title_en
 * @property string|null $page_keywords_am
 * @property string|null $page_keywords_ru
 * @property string|null $page_keywords_en
 * @property string|null $page_content_am
 * @property string|null $page_content_ru
 * @property string|null $page_content_en
 * @property int|null $order_num
 * @property string|null $create_date
 * @property int|null $status
 * @property string|null $url
 */
class FsPages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_keywords_am', 'page_keywords_ru', 'page_keywords_en', 'page_content_am', 'page_content_ru', 'page_content_en'], 'string'],
            [['order_num', 'status'], 'integer'],
            [['create_date'], 'safe'],
            [['page_name_am', 'page_name_ru', 'page_name_en', 'page_title_am', 'page_title_ru', 'page_title_en', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_name_am' => 'Page Name Am',
            'page_name_ru' => 'Page Name Ru',
            'page_name_en' => 'Page Name En',
            'page_title_am' => 'Page Title Am',
            'page_title_ru' => 'Page Title Ru',
            'page_title_en' => 'Page Title En',
            'page_keywords_am' => 'Page Keywords Am',
            'page_keywords_ru' => 'Page Keywords Ru',
            'page_keywords_en' => 'Page Keywords En',
            'page_content_am' => 'Page Content Am',
            'page_content_ru' => 'Page Content Ru',
            'page_content_en' => 'Page Content En',
            'order_num' => 'Order Num',
            'create_date' => 'Create Date',
            'status' => 'Status',
            'url' => 'Url',
        ];
    }
}
