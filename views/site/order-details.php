<?php
use app\models\FsCart;
use app\models\FsParams;
use app\models\FsProductVariations;

$status = [
    1 => [
        'icon' => 'fs-icon-ordered',
        'text' => $GLOBALS['text']['__ordered__']
    ],
    2 => [
        'icon' => 'fs-icon-approved-with-change',
        'text' => $GLOBALS['text']['__sent_for_confirmation__']
    ],
    3 => [
        'icon' => 'fs-icon-approved',
        'text' => $GLOBALS['text']['__acepted__']
    ],
    4 => [
        'icon' => 'fs-icon-ordered',
        'text' => $GLOBALS['text']['__closed__']
    ],
    5 => [
        'icon' => 'fs-icon-rejected',
        'text' => $GLOBALS['text']['__rejected__']
    ],
];
?>

<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isset($_GET['mobile'])){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?=$GLOBALS['text']['__order__details__']?></li>
            </ul>
        </div>
    </div>

    <div class="per-order-detail-wrapper">
        <div class="fs-container">
            <h2 class="per-order-page-title"><?= $status[$order->status]['text'] ?></h2>
            <div class="fs-single-order-page-data">
                <div class="fs-single-order-page-col">
                    <div class="fs-single-order-page-row">
                        <h4 class="fs-single-order-page-inline-title"><?=$GLOBALS['text']['__order__']?></h4>
                        <p class="fs-single-order-page-inline-data">N<?= str_pad($order->id, 9, "0", STR_PAD_LEFT) ?></p>
                    </div>
                    <div class="fs-single-order-page-row">
                        <h4 class="fs-single-order-page-inline-title"><?=$GLOBALS['text']['__date__']?></h4>
                        <time class="fs-single-order-page-inline-data"><?= date('d.m.Y', strtotime($order->created_at)) ?></time>
                    </div>
                    <div class="fs-single-order-page-row">
                        <h4 class="fs-single-order-page-inline-title"><?=$GLOBALS['text']['__delivery__date__']?></h4>
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
                        <h4 class="fs-single-order-col-title"><?= $order->seller->legal_name ?></h4>
                        <p class="fs-single-order-col-data"><?= $order->seller->name ?></p>
                    </div>
                </div>
            </div>
            <div class="fs-single-order-table-wrapper draggable-table-wrapper">
                <div class="fs-single-order-table draggable-table">
                    <div class="fs-single-order-thead">
                        <div class="fs-single-order-tr">
                            <div class="fs-single-order-th"><?=$GLOBALS['text']['__name__']?></div>
                            <div class="fs-single-order-th"><?=$GLOBALS['text']['__pice__']?></div>
                            <div style="display:none;" class="fs-single-order-th"><?=$GLOBALS['text']['__LENGTH__']?></div>
                            <div style="display:none;" class="fs-single-order-th"><?=$GLOBALS['text']['__WIDTH__']?></div>
                            <div class="fs-single-order-th"><?=$GLOBALS['text']['__COUNT__']?> / <?=$GLOBALS['text']['__PIECE__']?> (<?=$GLOBALS['text']['__buyer__']?>)</div>
                            <div style="display:none;" class="fs-single-order-th"><?=$GLOBALS['text']['__COUNT__']?> / <?=$GLOBALS['text']['__UNIT__OF__MEASUREMENT__']?> (<?=$GLOBALS['text']['__buyer__']?>)</div>
                            <div class="fs-single-order-th"><?=$GLOBALS['text']['__COUNT__']?> / <?=$GLOBALS['text']['__PIECE__']?> (<?=$GLOBALS['text']['__provider__']?>)</div>
                            <div style="display:none;" class="fs-single-order-th"><?=$GLOBALS['text']['__COUNT__']?> / <?=$GLOBALS['text']['__UNIT__OF__MEASUREMENT__']?> (<?=$GLOBALS['text']['__provider__']?>)</div>
                            <div class="fs-single-order-th"><?=$GLOBALS['text']['__discount__']?></div>
                            <div class="fs-single-order-th"><?=$GLOBALS['text']['__AMOUNT__DISCOUNTED__']?></div>
                            <div style="display:none;" class="fs-single-order-th"><?=$GLOBALS['text']['__AAH__']?></div>
                            <div style="display:none;" class="fs-single-order-th"><?=$GLOBALS['text']['__EXCISE__']?></div>
                            <div style="display:none;" class="fs-single-order-th"><?=$GLOBALS['text']['__ENVIRONMENTAL__PROTECTION__']?></div>
                            <div class="fs-single-order-th"><?=$GLOBALS['text']['__total__']?><span><?=$GLOBALS['text']['__with_taxs__']?></span></div>
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
//                                $productParams = $product->getProductParams()->with('param')->all();
                                $price =  $cart->quantity * $product->price;
                                $aah = $product->is_aah ? ($product->price * 20 / 100)*$cart->quantity : 0;
                                $tax = $product->is_tax ? ($product->price * $product->tax_procent / 100)*$cart->quantity : 0;
                                $env = $product->is_env ? ($product->price * $product->env_procent / 100)*$cart->quantity : 0;

                                $productTotal = $price + $aah + $tax + $env;
                        ?>
                            <div class="fs-single-order-tr">
                            <div class="fs-single-order-td">
                                <input type="hidden" value="<?= $cart->product_id ?>" name="prodlist[]" form="copyform">
                                <input type="hidden" value="<?= $cart->quantity ?>" name="prodcount[<?= $cart->product_id ?>]" form="copyform">
                                <? $photo = explode(',',$product->image)[0]; if(strlen($photo) > 0) { ?>
                                    <img src="/<?= $photo ?>" class="fs-single-order-thumbnail" alt="">
                                <? } else { ?>
                                    <img src="http://<?=$_SERVER['SERVER_NAME'];?>/img/noimg.png" class="fs-single-order-thumbnail" alt="">
                                <? } ?>
                                <h5 class="fs-single-order-title">
                                    <a target="_blank" href="/product/<?= $product->url ?>"><?= $product->name ?></a>
                                </h5>
                                <div class="fs-single-order-article">
                                    <h6><?=$GLOBALS['text']['__product__code__']?></h6>
                                    <p><?= $product->code_ ?></p>
                                </div>
                                <ul class="fs-single-order-data-list">
                                    <?php foreach ($productParams as $pp): ?>
                                        <li class="fs-single-order-data-li">
                                            <h6><?= $_COOKIE['language'] == 'hy' ? $pp->param->name : $pp->param['name_' . $_COOKIE['language']] ?></h6>
                                            <p><?= FsParams::findOne($pp->value)[$_COOKIE['language'] == 'hy' ? 'name' : 'name' . $_COOKIE['language']] ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                                <div class="fs-single-order-td"><?= number_format($product->price, 0, ' ', ' ');?> <?=$GLOBALS['text']['__dr__']?>/<?php echo  strtoupper($product->qty->name);?></div>
                            <div class="fs-single-order-td"><?= $cart->quantity ?> <?php echo  strtoupper($product->qty->name);?></div>
                            <div class="fs-single-order-td"><?= $cart->quantity ?> <?php echo  strtoupper($product->qty->name);?></div>
                            <div class="fs-single-order-td">0 <?=$GLOBALS['text']['__dr__']?></div>

                            <div class="fs-single-order-td"><?=number_format($product->price * ($cart->quantity), 0, '', ' ');?> <?=$GLOBALS['text']['__dr__']?></div>
                            <div class="fs-single-order-td"><?=number_format($productTotal, 0, '', ' ');?> <?=$GLOBALS['text']['__dr__']?></div>
                        </div>
                            <?php @$productTotalAll += $productTotal;?>
                        <?php endforeach; ?>
					</div>
                </div>
            </div>
        </div>
    </div>
    <div class="fs-cart-aside-block">
        <div class="fs-container">
            <div class="fs-cart-aside-total-col">
                <p class="fs-cart-aside-total-price removable-dynamic-data" data-label="<?= $GLOBALS['text']['__sum__'] ?>"><?=number_format($productTotalAll, 0, '', ' ');?><?=$GLOBALS['text']['__dr__']?></p>
            </div>

            <div class="fs-cart-aside-grand-total-col">
                <div class="fs-cart-aside-grand-total-price-col">
                    <p class="fs-cart-aside-grand-total-price removable-dynamic-data" data-label="<?= $GLOBALS['text']['__total__'] ?>"><?=number_format($productTotalAll, 0, '', ' ');?> <?=$GLOBALS['text']['__dr__']?></p>
                    <p class="fs-cart-aside-grand-total-info">(<?=$GLOBALS['text']['__with_taxs__']?>)</p>
                </div>

                <?php if($order->status == 3) { ?>
                    <button type="button" class="fs-cart-aside-grand-total-submit-btn" data-order="<?= $order->id ?>"><?=$GLOBALS['text']['__order__again__']?></button>
                <?php } ?>
                <form id="copyform" action="/site/copy-order" method="post">
                    <input type="hidden" name="copy_order" value="<?= $cart->id ?>">
                </form>
            </div>
        </div>
    </div>
</main>
<?  if($order->status != 2) { ?>
        <div class="answer_to_order_block">
            <div class="fs-container">
                <div class="fs-order-comment" data-error-message="Field need to be filled">
                    <textarea disabled class="order_comment" placeholder="Նշում պատվերի վերաբերյալ"><?= $order->comment ?? $GLOBALS['text']['__no__comment__available__'] ?></textarea>
                </div>
            </div>
        </div>
<? } ?>

		<?  if($order->status == 2) { ?>

				<div class="answer_to_order_block">
					<div class="fs-container">
						<textarea class="order_comment" disabled placeholder="Նշում պատվերի վերաբերյալ"><?= $order->comment ?? $GLOBALS['text']['__no__comment__available__'] ?></textarea>
						<div class="answer_button_group">
							<button type="submit" form="state_change_deny" class="deni buyerChangeOrder" data-status="4" data-order="<?= $order->id ?>" data-price="<?= $productTotal ?>"><?= $GLOBALS['text']['__close__the__order'] ?> </button>
							<button type="submit" form="state_change_accept" class="allow buyerChangeOrder" data-status="3" data-order="<?= $order->id ?>" data-price="<?= $productTotal ?>"><?= $GLOBALS['text']['__confirm__change__'] ?></button>
						</div>
					</div>
				</div>
		<? } ?>

<style>
    @media all and (max-width: 768px) {
        .fs-single-order-page-data{
            flex-direction: column;
        }
    }
</style>