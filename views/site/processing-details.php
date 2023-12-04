<?php
use app\models\FsCart;
use app\models\FsParams;
use app\models\FsProductVariations;

$status = [
    1 => [
        'icon' => 'fs-icon-ordered',
        'text' => $GLOBALS['text']["__ordered__"]
    ],
    2 => [
        'icon' => 'fs-icon-approved-with-change',
        'text' => $GLOBALS['text']["__sent_for_confirmation__"]
    ],
    3 => [
        'icon' => 'fs-icon-approved',
        'text' => $GLOBALS['text']["__acepted__"]
    ],
    4 => [
        'icon' => 'fs-icon-ordered',
        'text' => $GLOBALS['text']["__closed__"]
    ],
    5 => [
        'icon' => 'fs-icon-rejected',
        'text' => $GLOBALS['text']["__rejected__"]
    ],
];
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
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']["__order__details__"] ?></li>
            </ul>
        </div>
    </div>
    <form id="state_change_accept" action="/site/accept-order?id=<?= $order->id ?>" method="post" class="per-order-detail-wrapper">
<!--        <input type="hidden" class="order_comment_vals" value="">-->

<!--        <input type="hidden" value="1" name="order_state_change">-->

        <input type="hidden" value="3" name="state">

        <input type="hidden" value="<?= $order->id ?>" name="order_id">



        <div class="fs-container">

            <h2 class="per-order-page-title"><?= $status[$order->status]['text'] ?></h2>

            <div class="fs-single-order-page-data">

                <div class="fs-single-order-page-col">

                    <div class="fs-single-order-page-row">

                        <h4 class="fs-single-order-page-inline-title"><?= $GLOBALS['text']["__order__"] ?></h4>

                        <p class="fs-single-order-page-inline-data">N<?= str_pad($order->id, 9, "0", STR_PAD_LEFT) ?></p>

                    </div>

                    <div class="fs-single-order-page-row">

                        <h4 class="fs-single-order-page-inline-title"><?= $GLOBALS['text']["__date__"] ?></h4>

                        <time class="fs-single-order-page-inline-data"><?= date('d.m.Y', strtotime($order->created_at)) ?></time>

                    </div>

                    <div class="fs-single-order-page-row">

                        <h4 class="fs-single-order-page-inline-title"><?= $GLOBALS['text']["__delivery__date__"] ?></h4>

                        <time class="fs-single-order-page-inline-data"><?= date('d.m.Y', strtotime($order->shipping_date)) ?></time>

                    </div>

                </div>

                <div class="fs-single-order-page-col">

                    <div class="fs-single-order-col-inner">

                        <h4 class="fs-single-order-col-title"><?= $user->legal_name ?></h4>

                        <p class="fs-single-order-col-data"><?= $user->name ?></p>

                    </div>

                </div>

                <div class="fs-single-order-page-col">

                    <div class="fs-single-order-col-inner">
                        <h2  class="fs-single-order-col-title"><?= $GLOBALS['text']["__buyer__"] ?></h2>
                      <?php if(!$order->is_store){ ?>
                        <h4 class="fs-single-order-col-title"><?= $order->buyer->legal_name ?></h4>
                      <?php } ?>
                        <p class="fs-single-order-col-data"><?= $order->buyer->name ?></p>
                    </div>
                </div>
            </div>

            <div class="fs-single-order-table-wrapper draggable-table-wrapper">

                <div class="fs-single-order-table draggable-table">

                    <div class="fs-single-order-thead">

                        <div class="fs-single-order-tr">

                            <div class="fs-single-order-th"><?= $GLOBALS['text']["__name__"] ?></div>

                            <div class="fs-single-order-th"><?= $GLOBALS['text']["__pice__"] ?></div>

<!--                            <div style="display:none;" class="fs-single-order-th">ԵՐԿԱՐՈՒԹՅՈՒՆ</div>-->

<!--                            <div style="display:none;" class="fs-single-order-th">ԼԱՅՆՈՒԹՅՈՒՆ</div>-->

                            <div class="fs-single-order-th"><?= $GLOBALS['text']["__COUNT__"] ?> / <?= $GLOBALS['text']["ՀԱՏ"] ?> (<?= $GLOBALS['text']["__buyer__"] ?>)</div>

<!--                            <div style="display:none;" class="fs-single-order-th"><?= ''//$GLOBALS['text']["__COUNT__"] ?> / ԸՍՏ ՉԱՓՄԱՆ ՄԻԱՎՈՐԻ (ԳՆՈՐԴ)</div>-->

                            <div class="fs-single-order-th"><?= $GLOBALS['text']["__COUNT__"] ?> / <?= $GLOBALS['text']["ՀԱՏ"] ?> (<?= $GLOBALS['text']["__seller__"] ?>)</div>

<!--                            <div style="display:none;" class="fs-single-order-th"><?= ''// $GLOBALS['text']["__COUNT__"] ?> / ԸՍՏ ՉԱՓՄԱՆ ՄԻԱՎՈՐԻ (ՄԱՏԱԿԱՐԱՐ)</div>-->

<!--                            <div class="fs-single-order-th">ԶԵՂՉ</div>-->
<!---->
<!--                            <div class="fs-single-order-th">ԳՈՒՄԱՐԸ ԶԵՂՉՈՎ</div>-->

<!--                            <div style="display:none;" class="fs-single-order-th">ԱԱՀ</div>-->

<!--                            <div style="display:none;" class="fs-single-order-th">ԱԿՑԻԶ</div>-->

<!--                            <div style="display:none;" class="fs-single-order-th">ԲՆԱՊԱՀՊ. ՎՃԱՐ</div>-->

                            <div class="fs-single-order-th"><?= $GLOBALS['text']["__total__"] ?> <span>(<?= $GLOBALS['text']["__with_taxs__"] ?>)</span></div>

                        </div>

                    </div>

                    <div class="fs-single-order-tbody">

                        <?php
                            $list = explode(',', $order->cart_id);
                            foreach ($list as $id):
                            $cart = FsCart::findOne($id);

                            $product = $cart->product;
                                if($cart->variation_id){
                                    $variation = FsProductVariations::find()->where(['id'=>$cart->variation_id])->one();
                                    $param = FsParams::find()->where(['id'=>$variation->param_id])->one();
                                    $product->price = $variation->price;
                                    $product->code_ = $variation->code;
                                    $product->name = $product->name.'<br>('.$param->name.')';
                                }
                            $productParams = $product->getProductParams()->with('param')->all();
                            $price =  $cart->quantity* $product->price;

                            $aah = $product->is_aah ? ($product->price * 20 / 100)*$cart->quantity : 0;
                            $tax = $product->is_tax ? ($product->price * $product->tax_procent / 100)*$cart->quantity : 0;
                            $env = $product->is_env ? ($product->price * $product->env_procent / 100)*$cart->quantity : 0;
                            $productTotal = $price + $aah + $tax + $env;

                        ?>
                            <div class="fs-single-order-tr">
                                <div class="fs-single-order-td">
                                    <? if(strlen($product->image) > 0){ ?>
                                        <img src="/<?= $product->image ?>" class="fs-single-order-thumbnail" alt="">
                                    <? } else { ?>
                                        <img src="http://<?=$_SERVER['SERVER_NAME'];?>/img/noimg.png" class="fs-single-order-thumbnail" alt="">
                                    <? } ?>
                                    <h5 class="fs-single-order-title">
                                        <a target="_blank" href="/product/<?= $product->url ?>"><?= $_COOKIE['language'] == 'hy' ? $product->name : $product['name_' . $_COOKIE['language']] ?></a>
                                    </h5>
                                    <div class="fs-single-order-article">
                                        <h6>Ապրանքի կոդ</h6>
                                        <p><?= $product->code_ ?></p>
                                    </div>
                                    <ul class="fs-single-order-data-list">

                                        <?php foreach ($productParams as $pp): ?>
                                        <?php if($pp->param->id != 33){ ?>
                                            <li class="fs-single-order-data-li">
                                                <h6><?= $_COOKIE['language'] == 'hy' ? $pp->param->name : $pp->param['name_' . $_COOKIE['language']] ?></h6>
                                                <p><?= FsParams::findOne($pp->value)[$_COOKIE['language'] == 'hy' ? 'name' : 'name_' . $_COOKIE['language']] ?></p>
                                            </li>
                                        <?php } ?>
                                        <?php endforeach; ?>

                                    </ul>

                                </div>
                                <div class="fs-single-order-td prc" data-price="<?php echo $product->price;?>"><?= number_format($product->price, 0, ' ', ' ');?> դր/հատ</div>
                                <div class="fs-single-order-td"><?= $cart->quantity ?> հատ</div>
                                <input type="hidden" name="old_count[<?= $cart->id ?>]" value="<?= $cart->quantity ?>"/>

                                <? if($order->status == 1) { ?>
                                    <div class="fs-single-order-td ">
                                        <div class="fs-count-calc-block">
                                            <button type="button" onclick="Calc_()" class="fs-icon-minus"></button>
                                            <input type="number" onchange="Calc_()"  name="count[<?= $cart->id ?>]"
                                                   class="fs-count-calc-num"
                                                   value="<?=$cart->quantity ?>"/>
                                            <button type="button" onclick="Calc_()" class="fs-icon-plus"></button>
                                        </div>
                                    </div>
                                    <? } else{ ?>
                                    <div class="fs-single-order-td"><?= $cart->quantity ?> <?= $GLOBALS['text']["__PIECE__"] ?></div>
                                    <? }?>
<!--                                <div class="fs-single-order-td">--><?php //=number_format($product->price * ($order->seller_quantity ?? $cart->quantity), 0, '', ' ');?><!-- դր</div>-->
                                <div class="fs-single-order-td tot"><?=number_format($productTotal, 0, '', ' ');?> <?= $GLOBALS['text']["__dr__"] ?></div>
                            </div>
                            <?php @$productTotalAll +=$productTotal;?>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <? if($order->status == 1) { ?>
        <div class="answer_to_order_block">
            <div class="fs-container">
                <div class="fs-order-comment" data-error-message="Field need to be filled">
                    <textarea class="order_comment" placeholder="Նշում պատվերի վերաբերյալ" name="comment"></textarea>
                </div>
                <div class="answer_button_group">
                    <button type="submit" data-role="reject" form="state_change_reject" class="deni"><?= $GLOBALS['text']["__reject__"] ?></button>
                    <button id="accept_button" type="button" form="state_change_accept" class="allow"><?= $GLOBALS['text']["__confirm__"] ?></button>
                </div>
            </div>
        </div>
        <? } ?>

    </form>

    <? if($order->status != 1) { ?>
    <div class="answer_to_order_block">
        <div class="fs-container">
            <div class="fs-order-comment" data-error-message="Field need to be filled">
                <textarea disabled class="order_comment" placeholder="Նշում պատվերի վերաբերյալ"><?= $order->comment ?? $GLOBALS['text']["__no__comment__available__"] ?></textarea>
            </div>
        </div>
    </div>
    <?php } ?>

    <? if($order->status == 1) { ?>

        <? }
    if($ORDER_INFO['STATE'] == 5 or $ORDER_INFO['STATE'] == '0') {
        ?>
        <div class="answer_to_order_block">
            <div class="fs-container">
                <div class="fs-order-comment" data-error-message="Field need to be filled">
                    <textarea disabled class="order_comment" placeholder=<?= $GLOBALS['text']["__note__order__"] ?>><?if(strlen($ORDER_INFO['COMMENT_INTERNAL'])){echo $ORDER_INFO['COMMENT_INTERNAL'];}else{echo $GLOBALS['text']["__no__comment__available__"];}?></textarea>
                </div>
            </div>
        </div>
        <?
    }
    ?>

    <div class="fs-cart-aside-block">
        <div class="fs-container">
            <div class="fs-cart-aside-total-col">
                <p class="fs-cart-aside-total-price removable-dynamic-data" data-label="Գումարը"><?=number_format($productTotalAll, 0, '', ' ');?> դր</p>
                <?  if($fullCountSale > 0) {?>
                    <p class="fs-cart-aside-total-stock removable-dynamic-data"
                       data-label="Զեղչ"><?= number_format($fullCountSale, 0) ?> դր</p>
                <? }  ?>
            </div>
            <div class="fs-cart-aside-grand-total-col">
                <div class="fs-cart-aside-grand-total-price-col">
                    <p class="fs-cart-aside-grand-total-price removable-dynamic-data" data-label="<?= $GLOBALS['text']["__total__"] ?>"><?=number_format($productTotalAll, 0, '', ' ');?> դր</p>
                    <p class="fs-cart-aside-grand-total-info">(<?= $GLOBALS['text']["__with_taxs__"] ?>)</p>
                </div>
                <? if($order->status == 1) { ?>
                    <form id="state_change_reject" action="/site/reject-order" method="post">
                        <input type="hidden" class="order_comment_vals rejectOrderComment" value="" name="comment">
                        <input type="hidden" value="5" name="status">
                        <input type="hidden" value="<?= $order->id ?>" name="order_id">
                    </form>
                <? }  ?>
            </div>
        </div>
    </div>
</main>

<script>
    function Calc_(){
        var tot = 0
        setTimeout(function(){
            $('.fs-single-order-tr').each(function(){
                var ct = $(this).find('.fs-count-calc-num').val();
                var pr = $(this).find('.prc').attr('data-price');
                $(this).find('.tot').html((ct*pr)+" դր");
                if(ct && pr) {
                    tot += parseInt(ct) * parseInt(pr);
                }
            });

            $('.fs-cart-aside-grand-total-price').html(tot +" դր");
        },200);

    }

</script>


<style>
    @media all and (max-width: 768px) {
        .fs-single-order-page-data{
            flex-direction: column;
        }
    }
</style>