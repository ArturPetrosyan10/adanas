<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_discount_partners".
 *
 * @property int $id
 * @property int|null $discount_id
 * @property int|null $partner_id
 */
class FsDiscountPartners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_discount_partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_id', 'partner_id'], 'integer'],
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
            'partner_id' => 'Partner ID',
        ];
    }
}
