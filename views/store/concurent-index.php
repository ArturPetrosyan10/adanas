<?php

use app\models\AdConcCompanies;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AdConcCompaniesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Կոնկուրենտներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-conc-companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Ավելացնել նոր Կոնկուրենտ +', ['store/create-concurent'], ['class' => 'btn btn-success' ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => function ($model) {
                    if(@$model->img){
                        return Html::img('/'.$model->img, ['alt' => 'Image', 'style' => 'width:100px']);
                    }
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    if ($action === 'update') {
                        return Url::toRoute(['#', 'id' => $model->id]);
                    }
                    if ($action === 'delete') {
                        return Url::toRoute(['#', 'id' => $model->id]);
                    }
                    if ($action === 'view') {
                        return '';
                    }
                },
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return '';
                    },
                    'view' => function ($url, $model, $key) {
                        return '';
                    },
                    'delete' => function ($url, $model, $key) {
                        return '<a class="cursor-pointer" href="'.Yii::$app->urlManager->createUrl(['store/delete-concurent']).'?id='.$model->id.'" style="cursor:pointer">
                                    <i class="fa fa-trash" style="color:red" aria-hidden="true"></i>
                                </a>';
                    },
                ],
            ],
        ],
    ]); ?>


</div>
