<?php

use app\models\FsProductVariations;
use app\models\FsUsers;
use app\models\FsStores;
use app\models\FsParams;
?>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isset($_GET['mobile'])){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['__basket__'] ?></li>
            </ul>
        </div>
    </div>

    <?php if(count($products) == 0) { ?>
    <div class="fs-cart-empty-block">
        <div class="fs-container">
            <h4 class="fs-cart-empty-title"><?= $GLOBALS['text']['__empty__basket__'] ?></h4>
            <p class="fs-cart-empty-desc"><?= $GLOBALS['text']['__no__products__services__'] ?></p>
            <a class="fs-cart-empty-return" href="/categories"><?= $GLOBALS['text']['__view__range__'] ?></a>
        </div>
    </div>
    <?php } else { $all_total = 0; ?>
    <div class="fs-page-title">
        <div class="fs-container">
            <h1><?= $GLOBALS['text']['__basket__'] ?> (<?= count($products) ?>)</h1>
        </div>
    </div>

    <div class="fs-cart-wrapper">
        <div class="fs-container">
            <div class="fs-cart-action-row">
                <label class="fs-cart-mark-all">
                    <input type="checkbox">
                    <span class="fs-cart-mark-imitation"></span>
                    <span class="fs-cart-mark-label"><?= $GLOBALS['text']['__mark_all__'] ?></span>
                   
                </label>
                <button type="button" class="fs-cart-empty-button">
                    <i class="fs-icon-remove"></i>
                    <?= $GLOBALS['text']['__delete__'] ?>
                </button>
            </div>
            <?php if(Yii::$app->fsUser->identity->is_seller){
                $stores = FsStores::find()->where(['status'=>1,'user_id'=>Yii::$app->fsUser->identity->id])->all();
            ?>
                     <div class="store_block">
                        <span>Գնորդ</span>
                        <select  id="store" class="form-control">
                            <?php if(!empty($stores)){ ?>
                                <?php foreach($stores as $store => $store_simple){ ?>
                                    <?php if($store_simple->parent_id){ ?>
                                    <option value="<?php echo $store_simple->id;?>"> -- <?php echo $store_simple->name;?></option>
                                <?php } else { ?>
                                      <option  value="<?php echo $store_simple->id;?>"><?php echo $store_simple->name;?></option>
                                <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <?php } ?>
            <div class="fs-cart-table-title-row">
                <div class="fs-cart-table-title-col" data-col-name="name"><?= $GLOBALS['text']['__name__'] ?></div>
                <div class="fs-cart-table-title-col" data-col-name="price">գին / քանակ</div>
                <div class="fs-cart-table-title-col" data-col-name="auto-sale">ավտոմատ զեղչ</div>
                <div class="fs-cart-table-title-col" data-col-name="custom-sale">ձեռքով զեղչ</div>
                <div class="fs-cart-table-title-col" data-col-name="result-price">գումարը</div>
                <div class="fs-cart-table-title-col" data-col-name="tax" style="display:none;">աահ</div>
                <div class="fs-cart-table-title-col" data-col-name="tax" style="display:none;">ակցիզ</div>
                <div class="fs-cart-table-title-col" data-col-name="tax" style="display:none;">բնապահպ. վճար</div>
                <div class="fs-cart-table-title-col" data-col-name="result"><?= $GLOBALS['text']['__total__'] ?><span>(<?= $GLOBALS['text']['__with_taxs__'] ?>)</span></div>
            </div>

            <div class="fs-cart-supplier-block-wrapper">
                <?php foreach ($suppliers as $supplier) {  $total = []; ?>
                    <div class="fs-cart-supplier-block" data-supplier="<?= $supplier ?>">
                    <div class="fs-cart-supplier-header">
                        <label class="fs-cart-supplier-select-block">
                            <input type="checkbox">
                            <span class="fs-cart-supplier-checkbox"></span>
                            <span class="fs-cart-supplier-label"><?= FsUsers::findOne($supplier)->legal_name ?></span>
                        </label>
                        <button type="button" id="refill_order" class="fs-cart-supplier-submit-button">Վերահաշվարկել գումարը</button>
                    </div>
                    <div class="fs-cart-supplier-rows">
                        <?php foreach ($products as $pr) {
                            $product = $pr->product;
                            if($pr->variation_id){
                                $variation = FsProductVariations::find()->where(['id'=>$pr->variation_id])->one();
                                $param = FsParams::find()->where(['id'=>$variation->param_id])->one();
                                $product->price = $variation->price;
                                $product->code_ = $variation->code;
                                $product->name = $product->name.'<br>('.$param->name.')';
                            }
                            if($product->provider_id != $supplier){
                                continue;
                            }
                            $productParams = $product->getProductParams()->with('param')->all();
                        ?>
                            <div class="fs-cart-supplier-row fs-single-order-tr__" data-id="<?= $product->id ?>">
                            <div class="fs-cart-supplier-row-inner">
                                <label class="fs-cart-supplier-row-select-block">
                                    <input type="checkbox">
                                    <span class="fs-cart-supplier-row-checkbox" data-id="<?= $pr->id ?>"></span>
                                </label>
                                <div class="fs-cart-product-info-col">
                                    <img src="/<?= explode(',', $product->image)[0] ?>" class="fs-cart-product-min-thumbnail" alt="" />
                                    <h3 class="fs-cart-product-name"><a href="/product/<?= $product->url ?>"><?= $_COOKIE['language'] == 'hy' ? $product->name : $product['name_' . $_COOKIE['language']] ?></a></h3>
                                    <div class="fs-cart-product-code-wrapper">
                                        <h5 class="fs-cart-product-code-label">Ապրանքի կոդ</h5>
                                        <p class="fs-cart-product-code-number"><?= $product->code_ ?></p>
                                    </div>
                                    <button type="button" class="fs-cart-product-info-toggle-btn fs-icon-chevron"></button>
                                    <div class="fs-cart-product-info-block">
                                        <?php foreach ($productParams as $pp): ?>
                                             <?php if($pp->param->id != 33){ ?>
                                            <div class="fs-cart-product-info-row">
                                            <h6 class="fs-cart-product-info-title"><?= $_COOKIE['language'] == 'hy' ? $pp->param->name : $pp->param['name_' . $_COOKIE['language']] ?></h6>
                                            <p class="fs-cart-product-info-paragraph"><?= FsParams::findOne($pp->value)[$_COOKIE['language'] == 'hy' ? 'name' : 'name_' . $_COOKIE['language']] ?></p>
                                        </div>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="fs-cart-product-count-col">
                                    <div class="fs-single-order-td " style="padding-left:0px;">
                                        <p class="price prc fs-cart-product-automatic-sale-price" data-price="<?php echo $product->price;?>"><?= number_format($product->price, '0', ' ', ' ') ?> դր</p>
                                        <div class="fs-count-calc-block">
                                            <button type="button" onclick="Calc__()" class="fs-icon-minus"></button>
                                            <input type="number" onchange="Calc__()"  name="count[<?= $pr->id ?>]"
                                                   class="fs-count-calc-num"
                                                   value="<?=$pr->quantity ?>"/>
                                            <button type="button" onclick="Calc__()" class="fs-icon-plus"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-cart-product-automatic-sale">
<!--                                    <p class="fs-cart-product-automatic-sale-price">1 000 000 դր</p>-->
<!---->
<!--                                    <p class="fs-cart-product-automatic-sale-size">-10 %</p>-->

                                </div>

                                <div class="fs-cart-product-custom-sale">

<!--                                    <p class="fs-cart-product-custom-sale-price">3 000 000 դր</p>-->
<!---->
<!--                                    <p class="fs-cart-product-custom-sale-size">-30 %</p>-->

                                </div>

                                <?php
                                    $price = $pr->quantity * $product->price;
                                    $aah = $product->is_aah ? ($product->price * 20 / 100)*$pr->quantity : 0;
                                    $tax = $product->is_tax ? ($product->price * $product->tax_procent / 100)*$pr->quantity : 0;
                                    $env = $product->is_env ? ($product->price * $product->env_procent / 100)*$pr->quantity : 0;
                                    $productTotal = $price + $aah + $tax + $env;
                                    $total[] = $productTotal;
                                ?>
                                <div class="fs-cart-product-price-after-sale  ">
                                    <p class="fs-cart-product-price-after-sale-price"><?= number_format($price, '0', ' ', ' ') ?> դր</p>
                                </div>
                                <div class="fs-cart-product-tax-col" style="display:none;">
                                    <p class="fs-cart-product-tax-price"><?= number_format($aah, '0', ' ', ' ')?> դր</p>
                                </div>
                                <div class="fs-cart-product-tax-col" style="display:none;">
                                    <p class="fs-cart-product-tax-price"><?= number_format($tax, '0', ' ', ' ') ?> դր</p>
                                </div>

                                <div class="fs-cart-product-tax-col" style="display:none;">
                                    <p class="fs-cart-product-tax-price"><?= number_format($env, '0', ' ', ' ') ?> դր</p>
                                </div>
                                <div class="fs-cart-product-total-col">
                                    <p class="fs-cart-product-total-price"><?= number_format($productTotal, '0', ' ', ' ') ?> դր</p>
                                </div>
                                <button type="button" class="fs-cart-product-remove fs-icon-close" data-id="<?= $pr->id ?>"></button>

                            </div>
                            <div class="fs-cart-product-stock-block">
<!--                                <p>Գնիր 3 հատ ստացիր լրացուցիչ 30% զեղչ</p>-->
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                        <?php $all_total +=intval(array_sum($total)); ?>
                        <div class="tot" style="display:flex;">
                            <div class="fs-cart-supplier-stock-price-col" style="padding:10px 20px;margin-top:-15px;">
                                <p class="fs-cart-product-name">Նախընտրելի  առաքման ամսաթիվ</p>
                                <input type="date" class="fs-cart-product-counter-block delivery_date" style="font-size:18px;padding:0px 10px;" min="<?php echo  date("Y-m-d",strtotime('+1 day'));?>" value="<?php echo  date("Y-m-d",strtotime('+1 day'));?>">
                            </div>
                            <a class="fs-cart-aside-grand-total-submit-btn" style="width:270px;margin:0px auto;" href="/company-details/<?= FsUsers::findOne($supplier)->id ?>">Ավելացնել պատվերին</a>
                            <div class="fs-cart-supplier-stock-price-col tot">
                                <p class="fs-cart-supplier-stock-total-price" data-label="Ընդամենը"><?= number_format(intval(array_sum($total)), '0', ' ', ' ') ?> <?= $GLOBALS['text']['__dr__'] ?></p>
                            </div>
                        </div>
                    </div>


                </div>
                <?php } ?>
            <div class="fs-container">
                <div class="fs-cart-supplier-save-template-block">
                    <div class="fs-cart-supplier-save-template-block-inner">
                        <div class="fs-cart-supplier-save-template-top-row">
                            <label class="fs-cart-supplier-template-checkbox-wrapper">
                                <input type="checkbox" />
                                <span class="fs-cart-supplier-template-checkbox"></span>
                                <span class="fs-cart-supplier-template-label">Պահպանել որպես Ձևանմուշ</span>
                            </label>
                            <input type="text" class="fs-cart-supplier-template-name" placeholder="Ձևանմուշի անվանում" />
                        </div>
                        <div class="fs-cart-supplier-save-template-bottom-row"><button type="button" class="saveTemplate" data-seller="<?= FsUsers::findOne($supplier)->id ?>"><?= $GLOBALS['text']['__save__'] ?></button></div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="fs-cart-aside-block">

            <div class="fs-container">
                <div class="fs-cart-aside-total-col">
<!--                    <p class="fs-cart-aside-total-price" data-label="Գումարը">13 513 200 դր</p>-->
<!--                    <p class="fs-cart-aside-total-stock" data-label="Զեղչ">4 000 500 դր</p>-->
                </div>
                <div class="fs-cart-aside-grand-total-col">
                    <div class="fs-cart-aside-grand-total-price-col">
                        <p class="fs-cart-aside-grand-total-price" data-label="Ընդամենը"><span class="fs-cart-aside-grand-total-price-span"><?php echo floatval($all_total);?></span> <?= $GLOBALS['text']['__dr__'] ?></p>
                        <p class="fs-cart-aside-grand-total-info">(<?= $GLOBALS['text']['__with_taxs__'] ?>)</p>
                    </div>
                    <button class="fs-cart-aside-grand-total-submit-btn-1">Հաստատել պատվերը</button>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</main>

<div class="fs-modal" id="basket-submit-modal">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text">Ձևավորել և մատակարարներին հաստատման ուղարկել պատվերները։</p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost sendOrderRequestNoRe" type="button">Այո</button>
            <button class="fs-modal-btn filled" data-action="no" type="button">Ոչ</button>
        </div>
    </div>
</div>
<div class="fs-modal" id="basket-res-modal">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text">Պատվերները ձևավորելիս կատարվելու է <br> գումարի վերահաշվարկ</p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost sendOrderRequestRe" type="button">Այո</button>
            <button class="fs-modal-btn filled sendOrderRequestNoRe" data-action="no" type="button">Ոչ</button>
        </div>
    </div>
</div>
<div class="fs-modal" id="fs-cart-product-remove">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text">Ցանկանում եք ջնջել նշված ապրանքը՞</p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost removeItem" type="button">Այո</button>
            <button class="fs-modal-btn filled" data-action="no" type="button">Ոչ</button>
        </div>
    </div>
</div>
<div class="fs-modal" id="basket-remove-dialog">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text">Ցանկանում եք ջնջել նշված ապրանքները՞</p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost removeItems" type="button">Այո</button>
            <button class="fs-modal-btn filled" data-action="no" type="button">Ոչ</button>
        </div>
    </div>
</div>

<?php if(isset($_GET['save'])){ ?>
<div class="fs-modal" id="remove_template_modal" style="display:block;">
    <div class="fs-modal-body" style="margin-top:20vh;position:relative;">
        <button class="fs-modal-btn filled" data-action="no" style="position:absolute;right:0px;top:10px;" type="button" onclick="$(this).closest('.fs-modal').remove()">X</button>
        <p class="fs-modal-body-text">ձևանմուշը հաջողությամբ պահպանված է</p>
            
    </div>
</div>
<script>
        var url = window.location.href;
        url = url.split('?')[0];
        window.history.replaceState({}, document.title, url);
    </script>
<?php } ?>
<?php if(isset($_GET['update'])){ ?>
    <div class="fs-modal" id="remove_template_modal" style="display:block;">
        <div class="fs-modal-body" style="margin-top:20vh;position:relative;">
            <button class="fs-modal-btn filled" data-action="no" style="position:absolute;right:0px;top:10px;" type="button" onclick="$(this).closest('.fs-modal').remove()">X</button>
            <p class="fs-modal-body-text">Զամբյուղը հաջողությամբ վերահաշվարկված է</p>

        </div>
    </div>
    <script>
        var url = window.location.href;
        url = url.split('?')[0];
        window.history.replaceState({}, document.title, url);
    </script>
<?php } ?>
<script>
    function Calc__(){
        var tot = 0
        setTimeout(function (){
            $('.fs-cart-supplier-block').each(function(){
                var tot_s = 0;
                 $(this).find('.fs-single-order-tr__').each(function(){
                     var ct = $(this).find('.fs-count-calc-num').val();
                     var pr = $(this).find('.prc').attr('data-price');
                     $(this).find('.fs-cart-product-price-after-sale-price,.fs-cart-product-total-price').html((ct*pr)+" դր");

                     if(ct && pr) {
                         tot_s+=parseInt(ct) * parseInt(pr);
                         if($(this).find('.fs-cart-supplier-row-select-block input').prop('checked') === true){
                             tot += parseInt(ct) * parseInt(pr);
                         }
                     }
                 });
                $(this).find('.fs-cart-supplier-stock-total-price').html(tot_s +" դր");
            });

            $('.fs-cart-aside-grand-total-price').html(tot +" դր");
        },200);
       $('.fs-cart-aside-grand-total-submit-btn-1').addClass('fs-cart-aside-grand-total-submit-btn-2').removeClass('.fs-cart-aside-grand-total-submit-btn-1').click(function(){
           $('#basket-res-modal').addClass('active');
       });
    }

</script>

<style>
    .store_block{
        display: flex;
        flex-wrap: wrap;
        margin-bottom:10px;
    }
    .store_block span{
        font-size: 20px;
        padding: 5px;
    }
    .store_block select{
        padding: 5px;
        border:1px solid lightgray;
    }
</style>