<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_notifications".
 *
 * @property int $id
 * @property string|null $message
 * @property string|null $message_en
 * @property string|null $message_ru
 * @property int $sender_id
 * @property int $recipient_id
 * @property int|null $type
 * @property int $status
 * @property string $created_at
 */
class FsNotifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sender_id', 'recipient_id'], 'required'],
            [['sender_id', 'recipient_id', 'type', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['message', 'message_en', 'message_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'message_en' => 'Message En',
            'message_ru' => 'Message Ru',
            'sender_id' => 'Sender ID',
            'recipient_id' => 'Recipient ID',
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
