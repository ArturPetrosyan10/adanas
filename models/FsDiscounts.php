<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_discounts".
 *
 * @property int $id
 * @property int|null $discount_type
 * @property int|null $discount_status
 * @property string|null $name
 * @property int|null $group_type
 * @property int|null $discount_procent
 * @property int|null $discount_price
 * @property int|null $discount_count
 * @property int|null $discount_count_why
 * @property int|null $discount_multyple_conditions
 * @property int|null $consider_applied_discounts
 * @property int|null $applies_full_range
 * @property int|null $applies_full_partners
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $user_id
 * @property int|null $order_num
 */
class FsDiscounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_discounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_type', 'discount_status', 'group_type', 'discount_procent', 'discount_price', 'discount_count', 'discount_count_why', 'discount_multyple_conditions', 'consider_applied_discounts', 'applies_full_range', 'applies_full_partners', 'user_id', 'order_num'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discount_type' => 'Discount Type',
            'discount_status' => 'Discount Status',
            'name' => 'Name',
            'group_type' => 'Group Type',
            'discount_procent' => 'Discount Procent',
            'discount_price' => 'Discount Price',
            'discount_count' => 'Discount Count',
            'discount_count_why' => 'Discount Count Why',
            'discount_multyple_conditions' => 'Discount Multyple Conditions',
            'consider_applied_discounts' => 'Consider Applied Discounts',
            'applies_full_range' => 'Applies Full Range',
            'applies_full_partners' => 'Applies Full Partners',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'user_id' => 'User ID',
            'order_num' => 'Order Num',
        ];
    }
    public function getUser()
{
    return $this->hasOne(FsUsers::class, ['id' => 'user_id']);
}
}
