<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Store $model */

$this->title = 'Ստեղծել Խանութ';
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
