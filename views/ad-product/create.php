<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AdProduct $model */
/** @var app\models\AdProductImg $modelImg */

$this->title = 'Ավելացնել';
$this->params['breadcrumbs'][] = ['label' => 'Ad Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-product-create">
    <div class="card">
        <div class="card-body">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
                'modelImg'=>$modelImg

            ]) ?>
        </div>
    </div>
</div>
