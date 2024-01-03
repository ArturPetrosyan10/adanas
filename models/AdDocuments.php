<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ad_documents".
 *
 * @property int $id
 * @property int $user_id
 * @property int $store_id
 * @property string $document_type
 * @property string $comment
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class AdDocuments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'store_id'], 'integer'],
            [['comment'], 'string', 'max' => 255],
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
            'store_id' => 'Store ID',
            'document_type' => 'Document Type',
            'comment' => 'Comment',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function addManagerDocument($document,$post,$files){
        foreach ($post['product'] as $index => $item) {
            $store_product = new AdProductStore();
            $store_product->document_id = $document->id;
            $store_product->store_id = $document->store_id;
            $store_product->product_id = $item;
            $store_product->count = $post['count']['our'][$index];
            $store_product->save();
            foreach ($post['count']['concurent'] as $key => $value) {
                $conc_id = $key;
                $conc_product = new AdProductConcs();
                $conc_product->document_id = $document->id;
                $conc_product->store_id = $document->store_id;
                $conc_product->product_id = $item;
                $conc_product->concurent_id = $key;
                $conc_product->count = $value[$index];
                $conc_product->save();
            }
            
            /*if (!empty($files['img']) && $files["img"]["name"][0]) {
                for ($i = 0;$i < count($files['img']['name']);$i++) {
                    $tmp_name = $files["img"]["tmp_name"][$i];
                    $name = time() . basename($files["img"]["name"][$i]);
                    move_uploaded_file($tmp_name, "web/uploads/$name");
                    $img = "web/uploads/$name";
                    $pr_new_img = new AdImg();
                    $pr_new_img->user_id = Yii::$app->user->identity->id;
                    $pr_new_img->products_store_id = $store_product->id;
                    $pr_new_img->img = $img;
                    $pr_new_img->save(false);
                }
            }*/
        }
    }
    public function getAdProductsStore()
    {
        return $this->hasMany(AdProductStore::class, ['document_id' => 'id']);
    }
    public function getAdProductConcs()
    {
        return $this->hasMany(AdProductConcs::class, ['document_id' => 'id']);
    }

}
