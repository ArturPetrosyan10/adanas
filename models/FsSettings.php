<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_settings".
 *
 * @property int $id
 * @property int $delivery_price_yerevan
 * @property int $delivery_price_regions
 * @property int $delivery_fast_price_yerevan
 * @property int $delivery_fast_price_regions
 * @property int $delivery_free_start_price_yerevan
 * @property int $delivery_free_start_price_regions
 * @property int $is_free_delivery
 * @property int $is_brand
 * @property string $admin_email
 * @property string $site_logo
 * @property string $sitemap
 */
class FsSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_price_yerevan', 'delivery_price_regions', 'delivery_fast_price_yerevan', 'delivery_fast_price_regions', 'delivery_free_start_price_yerevan', 'delivery_free_start_price_regions', 'admin_email', 'site_logo', 'sitemap'], 'required'],
            [['delivery_price_yerevan', 'delivery_price_regions', 'delivery_fast_price_yerevan', 'delivery_fast_price_regions', 'delivery_free_start_price_yerevan', 'delivery_free_start_price_regions', 'is_free_delivery','is_brand'], 'integer'],
            [['admin_email', 'site_logo', 'sitemap'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_price_yerevan' => 'Delivery Price Yerevan',
            'delivery_price_regions' => 'Delivery Price Regions',
            'delivery_fast_price_yerevan' => 'Delivery Fast Price Yerevan',
            'delivery_fast_price_regions' => 'Delivery Fast Price Regions',
            'delivery_free_start_price_yerevan' => 'Delivery Free Start Price Yerevan',
            'delivery_free_start_price_regions' => 'Delivery Free Start Price Regions',
            'is_free_delivery' => 'Is Free Delivery',
            'admin_email' => 'Admin Email',
            'site_logo' => 'Site Logo',
            'sitemap' => 'Sitemap',
        ];
    }
}
