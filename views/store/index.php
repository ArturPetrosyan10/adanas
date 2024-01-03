<?php

use app\models\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StoreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Խանութներ';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div id="map" style=" width: 100%; height: 100%; padding: 0; margin: 0;"></div>-->

<div class="card">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <button class="btn btn-success"
                    id="createStore">Ստեղծել Խանութ
            </button>
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
                <?php if (!empty($dataProvider)) { ?>
                    <?php foreach ($dataProvider as $store) { ?>
                        <tr data-id="<?= $store['id']; ?>" class="">
                            <td scope="col">
                                <span class="move">
                                    <i class="fa fa-arrows-alt"></i>
                                </span>
                                ID <?= $store['id']; ?>
                            </td>
                            <td scope="col"><?= $store['name']; ?></td>
                            <td scope="col"><?= $store['address']; ?></td>
                            <td scope="col"><?= $store['latitude']; ?>,<?= $store['longitude']; ?></td>
                            <td scope="col"><?= $store['number']; ?></td>
                            <td scope="col"><a href="<?= Yii::$app->urlManager->createUrl('store/store') ?>?id=<?= $store['id']; ?>">դիտել</a></td>
                        </tr>
                    <?php }
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=e243c296-f6a7-46b7-950a-bd42eb4b2684" type="text/javascript"></script>-->
<!--<script src="/web/js/new/geolocation.js" ></script>-->

<script>
    var myLatitude = 40.21427467;
    var myLongitude = 44.4896076;
    const x = document.getElementById("#store-location");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert('Geolocation is not supported by this browser.')
            x.innerHTML = "Geolocation is not supported by this browser.";
        }

    }
    function showPosition(position) {
        myLatitude = position.coords.latitude;
        Longitude = position.coords.longitude;
    }
    getLocation()
</script>
