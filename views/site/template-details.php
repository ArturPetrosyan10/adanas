<?php
use app\models\FsCart;
use app\models\FsParams;
?>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isset($_GET['mobile'])){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']["__modifying__template__"] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-single-template-page">
        <div class="fs-container">
            <h1 class="fs-single-template-page-title"><?= $template->name ?></h1>
            <div class="fs-single-template-table-head">
                <div class="fs-single-template-table-th"><?= $GLOBALS['text']["__name__"] ?></div>
                <div class="fs-single-template-table-th"><?= $GLOBALS['text']["__COUNT__"] ?></div>
            </div>
            <div class="fs-single-template-table-body">
                <div class="fs-single-template-table-panel">
                    <label class="fs-select-all-by-supplier">
                        <input type="checkbox" />
                        <span class="fs-select-all-by-supplier-imit"></span>
                        <span class="fs-select-all-by-supplier-text"><?= $template->seller->name ?></span>
                    </label>
                    <button type="button" class="fs-template-to-cart" data-template="<?= $template->id ?>"><?= $GLOBALS['text']["__create__basket__"] ?></button>
                </div>
                <div class="fs-single-template-table-tbody">
                    <? foreach ($cart as $cr):
                        $c = FsCart::findOne($cr);
                         $product = $c->product;
                       if($product->getProductParams()){
                        $productParams = @$product->getProductParams()->with('param')->all(); } ?>
                        <div class="fs-single-template-tr">
                            <div class="fs-single-template-td">
                                <label class="fs-single-template-check">
                                    <input type="checkbox"/>
                                    <span class="sf-single-template-check-imit"></span>
                                </label>
                                <div class="fs-single-template-prod-block">
                                    <? $photo = explode(',', $product->image)[0]; if(strlen($photo) > 0) { ?>
                                        <img src="/<?= $photo ?>" class="fs-single-template-prod-image" alt="">
                                    <? } else{ ?>
                                        <img src="http://<?=$_SERVER['SERVER_NAME'];?>/img/noimg.png" class="fs-single-template-prod-image" alt="">
                                    <? } ?>
                                    <h4 class="fs-single-template-prod-name"><a target="_blank" href="/site/products?id=<?= $product->id ?>"><?= $_COOKIE['language'] == 'hy' ? $product->name : $product['name_' . $_COOKIE['language']] ?></a></h4>
                                    <p class="fs-single-template-prod-data"><?= $GLOBALS['text']["__product__code__"] ?> <strong><?= $product->code_ ?></strong></p>
                                    <button type="button"><i class="fs-icon-chevron"></i></button>
                                    <div class="fs-single-template-prod-info">
                                        <?php foreach ($productParams as $pp) { ?>
                                            <p class="fs-single-template-prod-data"><?= $_COOKIE['language'] == 'hy' ? $pp->param->name : $pp->param['name_' . $_COOKIE['language']] ?><strong><?= FsParams::findOne($pp->value)[$_COOKIE['language'] == 'hy' ? 'name' : 'name_' . $_COOKIE['language']] ?></strong></p>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-single-template-td">
                                <input type="hidden" name="product_ids[]" form="change_template" value="<?= $product->id ?>">
                                <div class="fs-single-order-td " style="padding-left:0px;">
                                    <div class="fs-count-calc-block">
                                        <button type="button"  class="fs-icon-minus"></button>
                                        <input type="number"   name="count[<?= $c->id ?>]"
                                               class="fs-count-calc-num"
                                               value="<?=$c->quantity ?>"/>
                                        <button type="button"  class="fs-icon-plus"></button>
                                        <input type="hidden" class="c_id" value="<?= $c->id ?>">
                                    </div>
                                </div>
                                <button type="button" data-cartid="<?= $c->id ?>" data-temprid="<?= $template->id ?>" class="fs-remove-template"><i data-temprid="<?= $product->id ?>" class="fs-icon-close"></i></button>
                                <a class="m-only" href="/product/<?= $product->url ?>"><?= $GLOBALS['text']["__more__details__"] ?></a>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="fs-single-template-action-row">
                <button id="return_to_list" type="button"><?= $GLOBALS['text']["__cancel__"] ?></button>
                <button class="fs-single-template-action-change" type="button"><?= $GLOBALS['text']["__save__changes__"] ?></button>
            </div>
            <script type="text/javascript">
                document.getElementById("return_to_list").onclick = function () {

                    location.href = "/site/personal-templates/";

                };

            </script>
        </div>
    </div>
</main>
<div class="fs-modal" id="edit_template_modal">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text"><?= $GLOBALS['text']["__modify__the__template"] ?></p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost changeTemplate" f data-action="yes" type="submit"><?= $GLOBALS['text']["__yes__"] ?></button>
            <button class="fs-modal-btn filled" data-action="no" type="button"><?= $GLOBALS['text']["__no__"] ?></button>
        </div>
        <!--        <form action="/site/personal/templates/" id="change_template"-->
        <!---->
        <!--              method="POST">-->
        <!---->
        <!--            <input type="hidden" value="1" name="updateTemplateData"/>-->
        <!---->
        <!--            <input type="hidden" value="0" name="TID"/>-->
        <!---->
        <!--        </form>-->
    </div>
</div>
<div class="fs-modal" id="remove_template_prod">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text"><?= $GLOBALS['text']["__deletea__product?__"] ?></p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost remove-template-item" type="button"><?= $GLOBALS['text']["__yes__"] ?></button>
            <input type="hidden" name="" id="removeTemplateID">
            <input type="hidden" name="" id="removeCartID">
            <button class="fs-modal-btn filled" data-action="no" type="button"><?= $GLOBALS['text']["__no__"] ?></button>
        </div>
        <!--        <form action="/site/personal/templates/" id="remove_template_row"-->
        <!---->
        <!--              method="POST">-->
        <!---->
        <!--            <input type="hidden" value="1" name="updateTemplateRowData"/>-->
        <!---->
        <!--            <input type="hidden" id="remove_template_row_id" value="0" name="RID"/>-->
        <!---->
        <!--            <input type="hidden" value="0" name="TID"/>-->
        <!---->
        <!--        </form>-->
    </div>
</div>
<style>
    .m-only{
        display:none;
    }
    @media screen and (max-width: 500px) {
        .fs-single-template-td:nth-child(2) {
            position: absolute;
            bottom: 50px;
            right: 15px;
        }
        .fs-single-template-td .fs-remove-template {
            right: auto;
            left: -5.2rem;
            bottom: -1rem;
            top: auto;
            font-size: 1.3rem;
        }
        .fs-single-template-table-th:nth-child(2), .fs-single-template-td:nth-child(2) {
            width: 19.6rem;
            padding-left:0px;
        }
        .m-only{
            display:inline-block;
            color:#DAA520;
            font-size:14px;
            margin-top:10px;
            float:right;
        }
    }
</style>