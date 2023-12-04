<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_brands".
 *
 * @property int $id
 * @property string|null $name
 */
class FsBrands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'name' => 'Name',
        ];
    }
    public function getCats($brand_id)
    {
        $cats = FsBrandToCategory::find()->where(['brand_id'=>$brand_id])->asArray()->all();
        $cats__ = '';
        if(!empty($cats)){
            foreach ($cats as $cat => $cat_val){
                $category = FsCategories::findOne($cat_val['category_id']);
                $cats__ .= $category->name.',';
            }
        }
        $cats__ = substr($cats__, 0,-1);
        return $cats__;
    }
}
