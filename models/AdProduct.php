<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $q_t
 */
class AdProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'q_t'], 'required'],
            [['name', 'description', 'q_t'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Անվանում',
            'description' => 'Նկարագրություն',
            'q_t' => 'Չափային տվյալներ',
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(AdCategories::class, ['id' => 'category_id']);
    }
    public function getImage()
    {
        return $this->hasOne(AdProductImg::class, ['productId' => 'id']);
    }
    public function getImages()
    {
        return $this->hasMany(AdProductImg::class, ['productId' => 'id']);
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
