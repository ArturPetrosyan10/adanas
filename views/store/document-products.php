<?php

use app\models\AdConcCompanies;
use app\models\AdProduct;
use app\models\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StoreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $manager->username.' - ի '.$store->address.' Այց N '.$id;
$this->params['breadcrumbs'][] = $this->title;

$data = $products['adProductConcs'];
$conc_prods = [];
foreach ($data as $item) {
    $concurentId = $item['concurent_id'];
    $productId = $item['product_id'];
    $count = $item['count'];
    if (!array_key_exists($concurentId, $conc_prods)) {
        $conc_prods[$concurentId] = [];
    }
    if (!array_key_exists($productId, $conc_prods[$concurentId])) {
        $conc_prods[$concurentId][$productId] = $count;
    }
}
?>

<section class="card">
    <div class="card-body">
<!--        <h1>--><?php //= Html::encode($this->title) ?><!--,--><?php //= $store->address ?><!--</h1>-->
        <h1><?=  $manager->username.' - ի '.$store->address.' Այց N '.$id; ?></h1>
        <div class="tbl">
            <table class="table table-bordered ">
                <thead>
                    <tr>
<!--                        <td>pr id</td>-->
                        <td>Անուն</td>
                        <td>Քանակ (Մեր)</td>
                        <?php foreach ($conc_prods as $index => $item) { ?>
                            <td>Քանակ (<?= AdConcCompanies::findOne($index)->name ?>)</td>
                        <?php }?>
<!--                        <td>Ստեղծ</td>-->
                    </tr>
                </thead>
                <tbody class="sortableTable ui-sortable" id="sortable">
                    <?php foreach ($products['adProductsStore'] as $index => $product) { ?>
                        <tr>
<!--                            <td>--><?php //= $product['product_id'];  ?><!--</td>-->
                            <td><?= AdProduct::findOne($product['product_id'])->name;  ?></td>
                            <td><?= $product['count'] ?></td>
                            <?php foreach ($conc_prods as $key => $item) { ?>
                                <td><?= $item[$product['product_id']]; ?></td>
                            <?php } ?>
<!--                            <td>--><?php //= $product['created_at'] ?><!--</td>-->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

