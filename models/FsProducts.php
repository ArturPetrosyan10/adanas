<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_products".
 *
 * @property int $id
 * @property string $name
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $atg
 * @property string|null $vendor_code
 * @property string|null $code_
 * @property string|null $comment
 * @property int|null $category_id
 * @property int|null $qty_type
 * @property string|null $video
 * @property string|null $description
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property int|null $send_notice
 * @property int|null $provider_id
 * @property int|null $user_id
 * @property int|null $is_aah
 * @property int|null $is_tax
 * @property float|null $tax_procent
 * @property int|null $is_env
 * @property float|null $env_procent
 * @property int $status
 * @property string $create_date
 * @property int $order_num
 * @property int $price
 * @property int $old_price
 */
class FsProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['comment', 'description', 'description_ru', 'description_en'], 'string'],
            [['category_id', 'qty_type', 'send_notice', 'provider_id', 'user_id', 'is_aah', 'is_tax', 'is_env', 'status', 'order_num', 'price', 'old_price'], 'integer'],
            [['tax_procent', 'env_procent'], 'number'],
            [['create_date'], 'safe'],
            [['name', 'name_ru', 'name_en', 'video'], 'string', 'max' => 255],
            [['atg'], 'string', 'max' => 20],
            [['vendor_code', 'code_'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'atg' => 'Atg',
            'vendor_code' => 'Vendor Code',
            'code_' => 'Code',
            'comment' => 'Comment',
            'category_id' => 'Category ID',
            'qty_type' => 'Qty Type',
            'video' => 'Video',
            'description' => 'Description',
            'description_ru' => 'Description Ru',
            'description_en' => 'Description En',
            'send_notice' => 'Send Notice',
            'provider_id' => 'Provider ID',
            'user_id' => 'User ID',
            'is_aah' => 'Is Aah',
            'is_tax' => 'Is Tax',
            'tax_procent' => 'Tax Procent',
            'is_env' => 'Is Env',
            'env_procent' => 'Env Procent',
            'status' => 'Status',
            'create_date' => 'Create Date',
            'order_num' => 'Order Num',
            'price' => 'Price',
            'old_price' => 'Old Price',
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(FsCategories::class, ['id' => 'category_id']);
    }
    public function getQty()
    {
        return $this->hasOne(FsMeasurements::class, ['id' => 'qty_type']);
    }
    public function getProvider()
    {
        return $this->hasOne(FsUsers::class, ['id' => 'provider_id']);
    }

    public function getProductParams()
    {
        return $this->hasMany(FsProductParams::class, ['product_id' => 'id']);
    }
    
    public function getCondition($data){
        $data_ = [];
        if($data['input_type'] == 1){
            switch (intval($data['type'])) {
                case 2:
                    $data_['cond'] = ' name LIKE "%' . $data['search'] . '" OR name_ru LIKE  "%' . $data['search'] . '" OR name_en LIKE "%' . $data['search'] . '"';
                    break;
                case 1:
                    $data_['cond'] = ' name LIKE "' . $data['search'] . '%" OR name_ru LIKE  "' . $data['search'] . '%" OR name_en LIKE "' . $data['search'] . '%"';
                    break;
                case 3:
                    $data_['cond'] = ' name LIKE "%' . $data['search'] . '%" AND name NOT LIKE  "%' . $data['search'] . '" AND name NOT LIKE "' . $data['search'] . '%"';
                    break;
                default:
                    $data_['cond'] = ' name LIKE "%' . $data['search'] . '%" OR name_ru LIKE  "%' . $data['search'] . '%" OR name_en LIKE "%' . $data['search'] . '%"';
                    break;
            }
        } else if($data['input_type'] == 2){
            switch (intval($data['type'])) {
                case 2:
                    $data_['cond'] = ' atg LIKE "%' . $data['search'] . '"';
                    break;
                case 1:
                    $data_['cond'] = ' atg LIKE "' . $data['search'] . '%"';
                    break;
                case 3:
                    $data_['cond'] = ' atg LIKE "%' . $data['search'] . '%"';
                    break;
                default:
                    $data_['cond'] = ' atg LIKE "%' . $data['search'] . '%"';
                    break;
            }
        } else if($data['input_type'] == 3){
            switch (intval($data['type'])) {
                case 2:
                    $data_['cond'] = ' vendor_code LIKE "%' . $data['search'] . '"';
                    break;
                case 1:
                    $data_['cond'] = ' vendor_code LIKE "' . $data['search'] . '%"';
                    break;
                case 3:
                    $data_['cond'] = ' vendor_code LIKE "%' . $data['search'] . '%"';
                    break;
                default:
                    $data_['cond'] = ' vendor_code LIKE "%' . $data['search'] . '%"';
                    break;
            }
        } else {
            switch (intval($data['type'])) {
                case 2:
                    $data_['cond'] = ' code_ LIKE "%' . $data['search'] . '"';
                    break;
                case 1:
                    $data_['cond'] = ' code_ LIKE "' . $data['search'] . '%"';
                    break;
                case 3:
                    $data_['cond'] = ' code_ LIKE "%' . $data['search'] . '%"';
                    break;
                default:
                    $data_['cond'] = ' code_ LIKE "%' . $data['search'] . '%"';
                    break;
            }
        }

        return  $data_;
    }
}
