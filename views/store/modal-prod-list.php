<button class="btn btn-success ProdListPopup" data-toggle="modal" data-target="#ProdListPopup">Open Popup</button>

<div class="modal fade" id="ProdListPopup" role="dialog" aria-labelledby="addnew" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Նոր տվյալներ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= Yii::$app->urlManager->createUrl('store/products-store') ?>" method="post" enctype="multipart/form-data"
                    class="d-flex flex-column gap-3"
                >
                    <div class="col-sm-12">
                        <label for="">ընտրել ապրանքը</label>
                        <div class="d-flex inputGroup">
                            <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                            <input type="hidden" name="store" value="<?= $store_id ?>">
                            <select class="form-control multiple-select-field" multiple name="product[]">
                                <?php foreach ($products as $index => $product) { ?>
                                    <option value="<?= $product['id'] ?>" <?= in_array($product['id'],$my_products) ? 'selected' : ''  ?> ><?= $product['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success col-sm-12">Պահպանել</button>
                </form>
            </div>
        </div>
    </div>
</div>
