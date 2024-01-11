<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_categories".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $atg
 * @property string|null $photo
 * @property string|null $url
 * @property string $create_at
 * @property string $update_at
 * @property int|null $parent_id
 * @property int|null $order_num
 */
class FsCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'meta_description', 'meta_keywords'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['parent_id', 'order_num'], 'integer'],
            [['name', 'meta_title', 'photo', 'url'], 'string', 'max' => 255],
            [['atg'], 'string', 'max' => 20],
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
            'description' => 'Description',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'atg' => 'Atg',
            'photo' => 'Photo',
            'url' => 'Url',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'parent_id' => 'Parent ID',
            'order_num' => 'Order Num',
        ];
    }

    public function getChildren()
    {
        return $this->hasMany(FsCategories::class, ['parent_id' => 'id']);
    }

    public function getProducts()
    {
        return $this->hasMany(FsProducts::class, ['category_id' => 'id'])->where(['status'=>1])->orderBy('order_num');
    }
    public function getchildrens($src_arr, $parent_id = 0)
    {
        $allchildren = array();
        foreach($src_arr as $idx => $row){
            if($row['parent_id'] == $parent_id){
                $children = static::getchildrens($src_arr, $row['id']);
                if ($children) {
                    $allchildren[] = $row['id'];
                    $allchildren = array_merge($allchildren, $children);
                } else {
                    $allchildren[] = $row['id'];
                }
            }
        }

        return $allchildren;
    }
  
    public function products($id,$page,$get)
    {
        $cond = $cond_second = [];
        if(isset($get['price'])){
            $price_range = explode(';',$get['price']);
            $fromPrice = $price_range[0];
            $toPrice = $price_range[1];
            $cond= ['BETWEEN','price',$fromPrice,$toPrice];
        }
        if(isset($get['param'])){
            $cond_params= $get['param'];
            $products = FsProductParams::find()->select('product_id as id')->where(['value'=>$cond_params])->asArray()->all();
            $new_arr = [];
            if(!empty($products)){
                foreach ($products as $product => $prod_val){
                    $new_arr[] = $prod_val['id'];
                }
            }
            $cond_second= ['id'=>$new_arr];
        }

        $cats = FsCategories::find()->select('id,name,parent_id')->where(['status'=>1])->asArray()->all();
        $chailds = $this->getchildrens($cats,$id);
        $chailds[] = $id;
        $sort = 'order_num';
        $tp = SORT_ASC;
        if(isset($_COOKIE['sort']) && $_COOKIE['sort'] != 0){
            switch (intval($_COOKIE['sort'])){
                case 1:
                    $sort = 'send_notice';
                    $tp = SORT_DESC;
                    break;
                case 2:
                    $sort = 'orders_count';
                    $tp = SORT_DESC;
                    break;
                case 3:
                    $sort = 'price';
                    $tp = SORT_DESC;
                    break;
                case 4:
                    $sort = 'price';
                    $tp = SORT_ASC;
                    break;
            }
        }

        $data['data'] =  FsProducts::find()->where(['category_id' => $chailds])->andWhere($cond)->andWhere($cond_second)->andWhere(['status'=>1])->orderBy([$sort=>$tp])->limit(12)->offset($page*12)->all();
        $data['maxprice'] =  FsProducts::find()->select('MAX(price) as maxprice')->where(['category_id' => $chailds])->andWhere(['status'=>1])->asArray()->one()['maxprice'];
        $data['total'] =  FsProducts::find()->where(['category_id' => $chailds])->andWhere(['status'=>1])->andWhere($cond)->andWhere($cond_second)->orderBy([$sort=>$tp])->count();
        $data['chailds'] = $chailds;
        return $data;
    }
 
    public function productSearch($page,$text, $get)
    {
        $sort = 'order_num';
        $tp = SORT_ASC;
        if(isset($_COOKIE['sort']) && $_COOKIE['sort'] != 0){
            switch (intval($_COOKIE['sort'])){
                case 1:
                    $sort = 'send_notice';
                    $tp = SORT_DESC;
                    break;
                case 2:
                    $sort = 'orders_count';
                    $tp = SORT_DESC;
                    break;
                case 3:
                    $sort = 'price';
                    $tp = SORT_DESC;
                    break;
                case 4:
                    $sort = 'price';
                    $tp = SORT_ASC;
                    break;
            }
        }
        $cond_second =  [];
        if($get['price']){
            $price_range = explode(';',$get['price']);
            $fromPrice = $price_range[0];
            $toPrice = $price_range[1];
            $cond_second= ['BETWEEN','price',$fromPrice,$toPrice];
        }
        $cond = ' name LIKE "%' . $text. '%" OR name_ru  LIKE  "%' .$text . '%" OR name_en LIKE "%' . $text . '%"';
        $data['data'] =  FsProducts::find()->where($cond)->orderBy([$sort=>$tp])->limit(12)->andWhere($cond_second)->andWhere(['status'=>1])->offset($page*12)->all();
        $data['maxprice'] =  FsProducts::find()->select('MAX(price) as maxprice')->where($cond)->andWhere($cond_second)->andWhere(['status'=>1])->asArray()->one()['maxprice'];
        $data['total'] =  FsProducts::find()->where($cond)->andWhere($cond_second)->andWhere(['status'=>1])->count();
        return $data;
    }
    public function getParent()
    {
        return $this->hasOne(FsCategories::class, ['id' => 'parent_id']);
    }

    public function getTranslation()
    {
        return $this->hasOne(FsCategoriesLang::class, ['category_id' => 'id']);
    }

    public function getAllParents()
    {
        $parents = [];
        $category = $this;

        while ($parent = $category->parent) {
            $parents[] = $parent;
            $category = $parent;
        }

        return array_reverse($parents);
    }
    public function getParentFirstLevel()
    {
        $parents = [];
        $category = $this;

        while ($parent = $category->parent) {
           if(IS_NULL($parent['parent_id'])) {
               $parents = $parent;
           }
            $category = $parent;
        }

        return $parents;
    }
    public function getAllChildren($depth = null)
    {
        $children = $this->children;

        if ($depth !== null) {
            $depth--;

            if ($depth < 1) {
                return $children;
            }
        }

        foreach ($children as $child) {
            $children = array_merge($children, $child->getAllChildren($depth));
        }

        return $children;
    }

}
