<?php

use app\models\AdProduct;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AdProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ապրանքներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('+ Ավելացնել', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                [
                    'label' => 'Նկար',
                    'attribute' => 'productId',
                    'format' => 'html',
                    'value' => function ($model) {
                        $img = \app\models\AdProductImg::find()->where(['productId' => $model['id']])->asArray()->one();
                        return "<img src='../$img[nameImg]' alt='$img[nameImg]' style='width: 50px'>";
                        },
                    'contentOptions' => ['class' => 'id-column'],
                ],
                'name',

                'description',
                'q_t',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, AdProduct $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
