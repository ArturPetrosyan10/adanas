<?php
use app\models\FsParams;
use app\models\FsProductVariations;

if(!empty($params)){

    foreach ($params as $pr){
        echo ' <div class="fs-single-prod-data-row">';
        $param = FsParams::find()->where(['id'=>$pr['param_id']])->one();
        $paramChailds = FsParams::find()->where(['parent_id'=>$param['id']])->asArray()->all();
        if($param->type_ == 'select'){
            echo ' <h4 class="fs-single-prod-data-title">'.$param->name.'</h4>';
            if(!empty($paramChailds) ) {
                $numItems = count($paramChailds);
                $i = 0;
                foreach ($paramChailds as $paramL => $paramVal) {
                    if(++$i === $numItems) {
                        echo '<p class="fs-single-prod-data-text" style="margin-right:5px;">'.$paramVal['name'].' </p> ';
                    } else {
                        echo '<p class="fs-single-prod-data-text" style="margin-right:5px;">'.$paramVal['name'].' ,</p> ';
                    }
                }
            }
        } else {
            if($param->name) {
                echo ' <h4 class="fs-single-prod-data-title">' . $param->name . '</h4>';
                echo '<p class="fs-single-prod-data-text">' . $pr->value . '</p>';
            }
        }
        echo '</div>';
    }

};