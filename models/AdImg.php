<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_img".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $img
 */
class AdImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'img' => 'Img',
        ];
    }
}
