<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_discount_conditions".
 *
 * @property int $id
 * @property int|null $discount_id
 * @property string|null $condition_name
 * @property int|null $condition_type
 * @property int|null $condition_pr_type
 * @property int|null $condition_type_date
 * @property int|null $condition_type_date_count
 * @property int|null $no_less
 * @property int|null $no_more
 * @property int|null $for_all
 */
class FsDiscountConditions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_discount_conditions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_id', 'condition_type', 'condition_pr_type', 'condition_type_date', 'condition_type_date_count', 'no_less', 'no_more', 'for_all'], 'integer'],
            [['condition_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discount_id' => 'Discount ID',
            'condition_name' => 'Condition Name',
            'condition_type' => 'Condition Type',
            'condition_pr_type' => 'Condition Pr Type',
            'condition_type_date' => 'Condition Type Date',
            'condition_type_date_count' => 'Condition Type Date Count',
            'no_less' => 'No Less',
            'no_more' => 'No More',
            'for_all' => 'For All',
        ];
    }
}
