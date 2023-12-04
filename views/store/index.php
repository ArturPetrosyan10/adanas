<?php

use app\models\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StoreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Խանուտներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <button class="btn btn-success"
                    id="createStore">Ստեղծել Խանութ</button>
<!--            --><?php //= Html::a('Ստեղծել Խանութ', ['create'], ['class' => 'btn btn-success',
//                'id' => 'createStore']) ?>
            <span class="buttons">
                                          <span class="overlay show_" style="width:99px;"></span>
                                          <button class="btn btn-sm btn-default" style="margin-left:30px;"
                                                  id="copyStore"><i class="fa fa-copy"></i></button>
                                          <button class="btn btn-sm btn-default" id="editeStore"><i
                                                      class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disableStore"><i
                                                      class="fa fa-trash"></i></button>
                                        </span>
        </p>

        <!--        --><?php //// echo $this->render('_search', ['model' => $searchModel]); ?>
        <!---->
        <!--        --><?php //= GridView::widget([
        //            'dataProvider' => $dataProvider,
        //            'filterModel' => $searchModel,
        //            'columns' => [
        //                ['class' => 'yii\grid\SerialColumn'],
        //
        //                'id',
        //                'name',
        //                'address',
        //                'location',
        //                'number',
        ////                [
        ////                    'class' => ActionColumn::className(),
        ////                    'urlCreator' => function ($action, Store $model) {
        ////                        return Url::toRoute([$action, 'id' => $model->id]);
        ////                    }
        ////                ],
        //            ],
        //        ]); ?>

        <div class="tbl">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Անուն</th>
                    <th scope="col">Հասցե</th>
                    <th scope="col">Գտնվելու վայրը</th>
                    <th scope="col">Համար</th>
                </tr>
                </thead>
                <tbody class="sortableTable" id="sortable">
                <!---->
                <!--                <tbody class="sortableTable" id="sortable">-->
                <!--                --><?php //if (!empty($stores)) { ?>
                <!--                    --><?php //foreach ($stores as $store) { ?>
                <!--                        <tr data-id="--><?php //echo $store->id; ?><!--">-->
                <!--                            <td scope="col"><span class="move"><i-->
                <!--                                            class="fa fa-arrows-alt"></i></span>-->
                <!--                                --><?php //if ($store->status == 0) {
                //                                    echo '<i class="fa fa-close" style="color:red;"></i>';
                //                                } ?>
                <!--                                ID --><?php //echo $store->id; ?><!--</td>-->
                <!--                            <td scope="col">-->
                <!--                                --><?php //if (!empty($store->logo)) { ?>
                <!--                                    <img src="/--><?php //echo $store->logo; ?><!--" height="60"-->
                <!--                                         alt="">-->
                <!--                                --><?php //} ?><!--</td>-->
                <!--                            <td scope="col"> --><?php //echo $store->name; ?><!--</td>-->
                <!--                            --><?php //if (!isset($_GET['parent_id'])) { ?>
                <!--                                <td scope="col"><a-->
                <!--                                            href="/admin/stores?parent_id=-->
                <?php //echo $store->id; ?><!--">Մասնաճյուղեր-->
                <!--                                        (--><?php //echo FsStores::find()->where(['parent_id' => $store->id])->count(); ?>
                <!--                                        )</a></td>-->
                <!--                            --><?php //} ?>
                <!--                            <td scope="col"> --><?php //echo $store->hvhh; ?><!--</td>-->
                <!--                            <td scope="col">-->
                <!--                                --><?php //if ($store->status == 1) {
                //                                    echo 'Ակտիվ';
                //                                } else {
                //                                    echo 'Պասիվ';
                //                                }; ?><!--</td>-->
                <!--                        </tr>-->
                <!--                    --><?php //}
                //                } ?>
                <!--                </tbody>-->

                <tr data-id="1" class="active">
                    <td scope="col"><span class="move"><i
                                    class="fa fa-arrows-alt"></i></span>
                        ID 1
                    </td>

                    <td scope="col"> սաս</td>
                    <td scope="col">Հասցե</td>
                    <td scope="col">լօց</td>
                    <td scope="col">1</td>

                </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
