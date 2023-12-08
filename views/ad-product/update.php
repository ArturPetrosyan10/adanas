<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AdProduct $model */

$this->title = 'Թարմացնել : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ad Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ad-product-update">
    <div class="card">
        <div class="card-body">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
