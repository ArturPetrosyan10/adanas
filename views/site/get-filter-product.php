
<?php
use app\models\FsParams;
use app\models\FsProductVariations;
?>
<div class="d-flex justify-content-start sizes-buttons" >
<?php
if(!empty($params)){
    foreach ($params as $pr){
//        echo ' <div class="fs-single-prod-data-row">';
        $param = FsParams::find()->where(['id'=>$pr['param_id']])->one();
        $param->name = $_COOKIE['language'] != 'hy' ? ($_COOKIE['language'] === 'en' ? $param->name_en : $param->name_ru ) : $param->name;
        $paramChailds = FsParams::find()->where(['parent_id'=>$param['id']])->asArray()->all();
        /*echo '<pre>';
        var_dump($paramChailds);
        die;*/
        if($param->type_ == 'select'){
            echo '<h4>'.$param->name.'</h4>';
            if(!empty($paramChailds) ) {
                $numItems = count($paramChailds);
                $i = 0;
                foreach ($paramChailds as $paramL => $paramVal) {
                    $ordig_name = $paramVal['name'];
                    $paramVal['name'] = $_COOKIE['language'] != 'hy' ? $paramVal['name_'.$_COOKIE['language']] : $paramVal['name'];
                    if(++$i === $numItems) {
                        echo '<button><a href="?sorting['.$ordig_name.']='.$paramVal['id'].'">'.$paramVal['name']. "</a></button>";
                    } else {
                        echo '<button><a href="?sorting['.$ordig_name.']='.$paramVal['id'].'">'.$paramVal['name'].' </a></button> ';
                    }
                }
            }
        } else {
            if($param->name) {
                echo ' <h4 class="fs-single-prod-data-title">' . $param->name . '</h4>';
                echo '<p class="fs-single-prod-data-text">' . $pr->value . '</p>';
            }
        }
//        echo '</div>';
    }

};
?>
<!--<div class="d-flex justify-content-start sizes-buttons" >
    <button>L</button>
    <button>M</button>
    <button>S</button>
    <button>XL</button>
</div>-->
</div>