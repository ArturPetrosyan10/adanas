<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_requests".
 *
 * @property int $id
 * @property int $buyer_id
 * @property int $seller_id
 * @property int|null $status
 * @property string $created_at
 */
class FsRequests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buyer_id', 'seller_id'], 'required'],
            [['buyer_id', 'seller_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buyer_id' => 'Buyer ID',
            'seller_id' => 'Seller ID',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
