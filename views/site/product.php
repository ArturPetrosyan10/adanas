<?php

use app\models\FsCategories;
use app\models\FsParamToCategory;
use app\models\FsDiscounts;
use app\models\FsWishlist;
$photos = explode(',', $product->image);
$show_c = \app\models\FsRequests::find()->where(['buyer_id'=>Yii::$app->fsUser->identity->id,'seller_id'=> $product->provider_id])->one();
$discount = FsDiscounts::find()->where(['user_id'=>$product->user_id,'applies_full_range'=>1,'applies_full_partners'=>'1','discount_type'=>1])->one();
?>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <?php if(!isMobile_){ ?>
            <ul class="fs-breadcrumbs-list">
                 <li class="fs-breadcrumbs-el"><a onclick="history.back()" style="cursor:pointer;"><?= $GLOBALS['text']["__back__"] ?></a></li>
                <?php foreach ($product->category->allParents as $parent) { ?>
                    <li class="fs-breadcrumbs-el">
                        <a href="/categories/<?= $parent->url ?>"><?= $_COOKIE['language'] == 'hy' ? $parent->name : $parent->translation['name_' . $_COOKIE['language']] ?></a>
                    </li>
                <?php } ?>
                <li class="fs-breadcrumbs-el">
                    <a href="/categories/<?= $product->category->url ?>"><?= $_COOKIE['language'] == 'hy' ? $product->category->name : $product->category->translation['name_' . $_COOKIE['language']] ?></a>
                </li>
                <li class="fs-breadcrumbs-el"><?= $_COOKIE['language'] == 'hy' ? $product->name : $product['name_' . $_COOKIE['language']] ?></li>
            </ul>
        <?php } else { ?>
             <ul class="fs-breadcrumbs-list">
                 <li class="fs-breadcrumbs-el"><a onclick="history.back()" style="cursor:pointer;"><?= $GLOBALS['text']["__back__"] ?></a></li>
              
                <li class="fs-breadcrumbs-el"><?= $_COOKIE['language'] == 'hy' ? $product->name : $product['name_' . $_COOKIE['language']] ?></li>
            </ul>
        <?php } ?>
        </div>
    </div>
    <div class="fs-single-page-wrapper">
        <div class="fs-container">
            <div class="fs-single-row">
                <div class="fs-single-info-col">
                    <div class="fs-single-thumbnail-wrapper">
                        <?php
                        $mainPhoto = false;
                        if (count($photos) > 0) {
                            ?>
                            <div class="fs-single-min-thumbnail-list owl-carousel owl-theme">
                                <?php
                                foreach ($photos as $photo) {
                                    if ($mainPhoto == false) {
                                        $mainPhoto = $photo;
                                    }
                                    ?>
                                    <div class="item">
                                        <div class="fs-single-min-thumbnail">
                                            <img class="img-responsive" data-bigone="/<?= $photo ?>"
                                                 src="/<?= $photo ?>"
                                                 alt=""/>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="fs-single-product-main-image">
                            <?php
                            if(strlen($photos[0]) > 0){
                                ?>
                                <img src="/<?= $photos[0] ?>"
                                     alt="">
                                <?php
                            }else{
                                ?>
                                <img class="img-responsive" src="http://<?=$_SERVER['SERVER_NAME'];?>/img/prodpic/no-image.png" alt="">
                                <?
                            }
                            ?>
                        </div>
                    </div>
                    <div class="fs-single-product-text-info">
                        <h3 class="fs-single-product-desc-title"><?= $GLOBALS['text']["__description__"] ?></h3>
                        <div class="fs-single-product-desc-content">
                            <?= $_COOKIE['language'] == 'hy' ? $product->description : $product['description_' . $_COOKIE['language']] ?>
                        </div>
                    </div>
                </div>
                <div class="fs-single-info-col">
                    <h1 class="fs-single-prod-title"><?= $_COOKIE['language'] == 'hy' ? $product->name : $product['name_' . $_COOKIE['language']] ?></h1>
                    <div class="fs-single-prod-data-rows">
                        <div class="fs-single-prod-data-row">
                            <h4 class="fs-single-prod-data-title"><?= $GLOBALS['text']["__product__code__"] ?></h4>
                            <p class="fs-single-prod-data-text"><?= $product['code_'] ?></p>
                        </div>
                        <div class="fs-single-prod-data-row">
                            <h4 class="fs-single-prod-data-title"><?= $GLOBALS['text']["__seller__"] ?></h4>
                            <a href="/site/companies?id=<?= $product->provider_id ?>" class="fs-single-prod-data-text"><?= $product->provider->legal_name ?></a>
                        </div>

                        <?php
                         $params = \app\models\FsProductParams::find()->where(['product_id'=>$product->id])->groupBy('param_id')->all();
                         echo  Yii::$app->view->renderFile('@app/views/site/get-param-product.php',['params'=>$params,'product'=>$product,'category_id'=>$product->category_id]);?>
                    </div>
                    <?php  $aah = $product->is_aah ? $product->price * 20 / 100 : 0;
                    $tax = $product->is_tax ? $product->price * $product->tax_procent / 100 : 0;
                    $env = $product->is_env ? $product->price * $product->env_procent / 100 : 0;
                    $productTotal = $product->price + $aah + $tax + $env; ?>
                    <div class="fs-single-product-price-block">
                         <?php if($product->is_aah || $product->is_tax || $product->is_env){ ?>
                                      <?php if(!$discount->discount_procent){ ?>
                                     <p class="fs-single-product-current-price" data-message="(Գինը չի ներառում հարկերը)"><?=number_format($product['price'], 0);?> դր/<?php echo  @strtoupper($product->qty->name);?></p>
                                <?php } else { ?>
                                     <p class="fs-single-product-current-price" data-message="(Գինը չի ներառում հարկերը)"><span  style=" text-decoration: line-through;color:#9B958C;padding-right:15px;font-size: 2rem;"><?=number_format($product->price,0)?> դր </span> <?=number_format($product->price - ($product->price*$discount->discount_procent/100), 0);?></p>
                                <?php } ?>
                                <?php } else { ?>
                                     <?php if(!$discount->discount_procent){ ?>
                                        <p class="fs-single-product-current-price" ><?=number_format($product['price'], 0);?> դր/<?php echo  @strtoupper($product->qty->name);?></p>
                                    <?php } else { ?>
                                         <p class="fs-single-product-current-price" ><span  style=" text-decoration: line-through;color:#9B958C;padding-right:15px;font-size: 2rem;"><?=number_format($product->price,0)?> դր </span> <?=number_format($product->price - ($product->price*$discount->discount_procent/100), 0);?> դր/<?php echo  @strtoupper($product->qty->name);?></p>
                                    <?php } ?>
                                <?php } ?>
                    </div>

                   <?php if (Yii::$app->fsUser->identity->id != $product->provider_id && $show_c) { ?>

                        <div class="fs-single-prod-dynamic-data">
                            <h5 class="fs-single-prod-dynamic-data-title">Քանակ</h5>
                            <div class="fs-single-prod-action-row">
                                <div class="fs-single-prod-calc-block">
                                    <div class="fs-single-prod-calc-block-inner">
                                        <button type="button" class="fs-icon-minus" data-action="minus"></button>
                                        <input id="prod_cc_<?= $product->id ?>" type="text" class="fs-calc-field fs-product-count" value="1" />
                                        <button type="button" class="fs-icon-plus" data-action="plus"></button>
                                    </div>
                                </div>
                                <p class="fs-single-prod-result"><?= $GLOBALS['text']["__total__"] ?>՝ <span><?= ceil($productTotal) ?></span> <?= $GLOBALS['text']["__dr__"] ?></p>
                            </div>
                        </div>
                        <div class="fs-single-prod-dynamic-footer">
                            <?php if (!Yii::$app->fsUser->isGuest) {
                                if(Yii::$app->fsUser->identity->verified > 0) {?>
                                    <button type="button" class="fs-product-add-to-cart-1 fs-icon-basket" data-price="<?= $product->price ?>" data-product="<?= $product->id ?>" style="width: 4.6rem; height: 4.6rem; border-radius: 50%; background-color: #8C8370; border: none; outline: none; font-size: 1.8rem; color: #fff; cursor: pointer;"></i></button>
                                    <div class="fs-single-product-to-fav-wrapper">
                                        <button type="button" class="fs-single-product-to-fav fs-icon-heart <?= FsWishlist::find()->where(['user_id' => Yii::$app->fsUser->identity->id])->andWhere(['product_id' => $product->id])->one() ? 'active' : '' ?>" data-prodid="<?= $product->id ?>"></button>
                                    </div>
                                <? } } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($product->category->products)){ ?>
        <div class="fs-similar-products-wrapper">
            <div class="fs-container">
                <h2 class="fs-similar-products-title"><?= $GLOBALS['text']["__like__products__"] ?></h2>
                <div class="fs-product-slider owl-carousel owl-theme">
                    <?php
                        $el_id = $product->id;
                        foreach($product->category->products as $product) {
                        if($product->id == $el_id) {
                            continue;
                        }
                        ?>
                        <div class="item"> <? include("prod.php"); ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</main>
<div class="fs-not-registered-prod-modal">
    <div class="fs-not-registered-prod-modal-inner">
        <p>Պատվեր հավաքելու համար անհրաժեշտ է մուտք գործել համակարգ:</p>
        <a href="/site/sign-in"><?= $GLOBALS['text']["__login__"] ?></a>
    </div>
</div>
<?php
function isMobile_() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>