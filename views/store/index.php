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
                    id="createStore">Ստեղծել Խանութ
            </button>
<!--            <span class="buttons">-->
            <!--                <span class="overlay show_" style="width:99px;"></span>-->
            <!--                <button class="btn btn-sm btn-default" style="margin-left:30px;"-->
            <!--                        id="copyStore"><i class="fa fa-copy"></i></button>-->
            <!--                <button class="btn btn-sm btn-default" id="editeStore"><i-->
            <!--                            class="fa fa-pencil"></i></button>-->
            <!--                <button class="btn btn-sm btn-danger" id="disableStore"><i-->
            <!--                            class="fa fa-trash"></i></button>-->
            <!--            </span>-->
        </p>

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

                <?php if (!empty($dataProvider)) { ?>
                <?php foreach ($dataProvider as $store) { ?>
                        <tr data-id="<?php echo $store['id']; ?>" class="">
                            <td scope="col"><span class="move"><i
                                            class="fa fa-arrows-alt"></i></span>
                                ID <?php echo $store['id']; ?>
                            </td>

                            <td scope="col"><?php echo $store['name'];?></td>
                            <td scope="col"><?php echo $store['address']; ?></td>
                            <td scope="col"><?php echo $store['location'];?></td>
                            <td scope="col"><?php echo $store['number'];?></td>

                        </tr>
                <?php } } ?>


                <div id="map" style="
                        background-color:darkgreen ;
                        width: 70%; height: 200px; padding: 0; margin: 0;"></div>

                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=e243c296-f6a7-46b7-950a-bd42eb4b2684" type="text/javascript"></script>
<script src="../../web/js/new/geolocation.js" type="text/javascript"></script>
