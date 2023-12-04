<?php
use app\models\FsParams;
use app\models\FsProductVariations;

if(!empty($paramsToCategory)){
    echo '<div class="fs-filter-section">';
    foreach ($paramsToCategory as $pr){
        $param = FsParams::find()->where(['id'=>$pr['param_id']])->asArray()->one();
        $paramChailds = FsParams::find()->where(['parent_id'=>$param['id']])->asArray()->all();
        if($param['type_'] == 'select'){
            $param['name'] = $param['name_'.$_COOKIE['language']] ?? $param['name'];
            echo ' <h5 class="fs-filter-section-title">'.$param['name'].'<i class="fs-icon-chevron"></i></h5> <div class="fs-filter-section-body" >';
            if(!empty($paramChailds) ) {
                echo '<div class="fs-filter-section-body" > <div class="fs-companies-filter-checkbox-list">';
                foreach ($paramChailds as $paramL => $paramVal) {
                    $paramVal['name'] = $paramVal['name_'.$_COOKIE['language']] ?? $paramVal['name'];
                    $checked = '';
                    if(isset($_GET['param']) && in_array($paramVal['id'],@$_GET['param'])){
                        $checked = 'checked';
                    }
                    echo ' <label class="fs-checkbox-element">
                                <input type="checkbox" '.$checked.' name="param[]" value="'.$paramVal['id'].'"/>
                                <span class="fs-checkbox-imitation"></span>
                                <span class="fs-checkbox-label">'
                                    .$paramVal['name'].
                                '</span>
                            </label>';
                }
                echo '</div></div>';
            }
           echo '</div>';
        }
    }
    echo '</div>';
};?>

<style>
    .pagination{
        display:flex;
        flex-wrap:wrap;
        list-style:none;
        margin-top:20px;
        padding-left:0px;
    }
    .pagination li{
        border:0.1px solid #B9AF9D;
        margin-left:5px;
        border-radius:5px;
    }
    .pagination a{
        padding:5px 10px;
        display:block;
        width:100%;
        height:100%;
        font-size:18px;
        text-decoration:none;
        color:#8C8370;
    }
    .pagination li.active{
        background:#DAA520;
    }
    .pagination li.active a{
        color:white;
    }
</style>
