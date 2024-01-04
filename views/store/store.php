<?php

use app\models\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StoreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $store->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .gap-3 {
        gap: 1rem!important;
    }
    .select2-container{
        width:100% !important;
    }
    .concProdList{
        overflow-y: hidden;
        overflow-x: scroll;
        max-width: calc(75% - 180px);
        padding-right: 0;
        padding-top: 0;
    }
    .newConcList{
        min-width:180px;
    }
    .chooseConc{
        padding:0 15px;
    }
    .concurentList{
        position:absolute;
        right:1rem;
        width:12%;
        min-width: 180px;
        background: white;
    }
    .removeList{
        position: absolute;
        top: 0px;
        right: 7px;
        cursor:pointer;
    }
    .m-t-30{
        margin-top: 30px;
    }
    .h-75{
        min-height:500px;
    }

    .modal-dialog{
        max-width:80% !important;
    }
    .max-width500{
        max-width:500px;
    }
</style>
<section class="card">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?>,<?= $store->address ?></h1>
        <p>
            <button class="btn btn-success CreateDocument">Թարմացնել տվյալները</button>
            <button class="btn btn-success ProductList" data-id="<?= $_GET['id'] ?>"><?= $store->address ?>-ի Ապրանքի ցանկ</button>
        </p>
        <div class="tbl">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <td>Մենեջեռ</td>
                        <td>Քոմենթ</td>
                        <td>Այցի ժամ</td>
                        <td>Մանրամասն</td>
                    </tr>
                </thead>
                <tbody class="sortableTable ui-sortable" id="sortable">
                    <?php foreach ($documents as $index => $document) { ?>
                        <tr>
                            <td><?= $document['username'];  ?></td> 
                            <td><?= $document['comment'] ?></td>
                            <td><?= $document['created_at'] ?></td>
                            <td><a href="<?= Yii::$app->urlManager->createUrl('store/document') ?>?id=<?= $document['id']; ?>">Դիտել</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade add-new" id="CreateDocument" tabindex="1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Նոր տվյալներ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<!--                concurentnery aji vra lini + amen xanuti apranqneri canky skzbic nytrvi-->
                <form action="<?= Yii::$app->urlManager->createUrl('store/add-document') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="store_id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <div class="w-100 labels">
                    </div>
                    <div class="w-100 d-flex flex-wrap ">
                        <div class="d-flex flex-column border h-75 w-25">
                            <div class="col-sm-12 border d-flex justify-content-center">
                                <label class="" for="">Բոլոր ապրանքանիշները</label>
                            </div>
                            <div class="col-sm-12">
                                <label for="">ընտրել ապրանքը</label>
                                <div class="d-flex inputGroup flex-column">
                                    <?php foreach ($prod_list as $index => $item) { ?>
                                        <input type="hidden" name="product[]" value="<?= $item['id'] ?>">
                                        <input  class="form-control" value="<?= $item['name'] ?>" readonly>
                                    <?php } ?>
<!--                                    <div class="col-sm-2 d-flex align-items-end">-->
<!--                                        <button class="btn btn-sm form-control addProduct" type="button">-->
<!--                                            <i class="fa fa-plus"></i>-->
<!--                                        </button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="concProdList d-flex border h-75">
                            <div class="d-flex flex-column border h-75 newConcList">
                                <div class="col-sm-12 border d-flex justify-content-center">
                                    <label class="" for="">Մերը</label>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Առկա է (Քանակ)</label>
                                    <?php foreach ($prod_list as $index => $item) { ?>
                                        <input type="number" class="form-control" step="any" name="count[our][]">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column border h-75 concurentList">
                            <div class="border d-flex justify-content-center">
                                <label class="" for="">Կոնկուրենտներ</label>
                            </div>
                            <?php foreach ($concurents as $index => $concurent) { ?>
                                <span class="w-100 d-flex border chooseConc" style="cursor:pointer"  data-id="<?= $concurent['id'] ?>">
                                    <?= $concurent['name'] ?>
                                </span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="comment m-t-30">
                        <label for="com" >Մեկնաբանություն</label>
                        <textarea id="com" name="comment"  cols="5" rows="2" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Պահպանել</button>
                </form>
            </div>
        </div>
    </div>
</div>

