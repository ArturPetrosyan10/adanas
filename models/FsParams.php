<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fs_params".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $parent_id
 */
class FsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name', 'name_ru', 'name_en'], 'string', 'max' => 255],
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
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'parent_id' => 'Parent ID',
        ];
    }
    public function getChilds($id){
        $childs = $this::find()->select('name')->where(['parent_id'=>$id])->asArray()->all();
        $res = '';
        if(!empty($childs)){
            $res .= '( ';
            foreach ($childs as $child){
                $res .= $child['name'].', ';
            }
            $res = substr( $res ,0, -2);
            $res .= ' )';
        }
        return $res;
    }

    public function getParent()
    {
        return $this->hasOne(FsParams::class, ['id' => 'parent_id']);
    }

    public function getProductParams()
    {
        return $this->hasMany(FsProductParams::class, ['param_id' => 'id']);
    }
}
