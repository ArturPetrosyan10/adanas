<?php

use app\models\FsProductVariations;
use app\models\FsDiscounts;
use app\models\FsWishlist;
$photos = explode(',', $product->image);
$discount = FsDiscounts::find()->where(['user_id'=>$product->user_id,'applies_full_range'=>1,'applies_full_partners'=>'1','discount_type'=>1])->one();
?>
<?php if($product->send_notice == 1 && strtotime(date('Y-m-d'))<strtotime( date("Y-m-d", strtotime("+10 days", strtotime($product->create_date))))){ ?>

<article class="fs-product-card fs-new-product"  data-new="Նոր">
    <?php }
    else { ?>
        <?php if($discount->discount_procent){ ?>
           <article class="fs-product-card fs-new-product"  data-new="<?php echo $discount->discount_procent; ?>%">
        <?php } else { ?>
            <article class="fs-product-card">
        <?php } ?>
    <?php } ?>
    <div class="fs-product-thumbnail-wrapper">
        <a href="/product/<?= $product->url ?>">
            <?php if(strlen($photos[0]) > 0) { ?>
                <img src="/<?= $photos[0] ?>" class="fs-product-thumbnail" alt="" />
            <?php } else { ?>
                <img src="http://<?=$_SERVER['HTTP_HOST'];?>/img/noimg.png" class="fs-product-thumbnail" alt="" />
            <?php } ?>
        </a>
        <button type="button" data-prodid="<?= $product['id'] ?>" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></button>
    </div>
        <?php
        $variation = FsProductVariations::find()->where(['product_id'=>$product->id])->all();
        if(!empty($variation)){ ?>
            <select class="filter-select-prod" data-variation="default">
                <option value="default" data-price="<?php echo $product->price;?>"><?= $GLOBALS['text']["__select_color__"] ?></option>
                <?php foreach ($variation as $variation => $var_val){  ?>
                    <?php $param = \app\models\FsParams::findOne(['id'=>$var_val->param_id]);?>
                    <option value="<?php echo $var_val->id; ?>" data-price="<?php echo $var_val->price;?>"><?php echo $param->name; ?></option>
                <?php } ?>
            </select>
        <?php } ?>
    <?php if(!Yii::$app->fsUser->isGuest) { ?>
        <button type="button" class="fs-product-add-to-fav fs-icon-heart <?php if(FsWishlist::find()->where(['user_id' => Yii::$app->fsUser->identity->id])->andWhere(['product_id' => $product->id])->one()){ ?>active<?php } ?>"></button>
    <?php } ?>
    <h3 class="fs-product-name">
        <a href="/product/<?= $product->url ?>">
            <?= ($_COOKIE['language'] == 'hy') ? $product->name : ($_COOKIE['language'] == 'ru' ? $product->name_ru : $product->name_en) ?>
        </a>
    </h3>
    <?php if(!$discount->discount_procent){ ?>
        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']['__dr__'] ?>">
            <?= number_format($product->price, 0);?>
        </span>
    <?php } else { ?>
        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']['__dr__'] ?>">
            <span style=" text-decoration: line-through;color:#9B958C;"><?=number_format($product->price,0)?> <?= $GLOBALS['text']['__dr__'] ?> </span>
            <?= number_format($product->price - ($product->price*$discount->discount_procent/100), 0);?></span>
    <?php } ?>
    <?php
        if(Yii::$app->fsUser->identity->verified > 0) { ?>
            <div class="fs-product-action-block">
                <div class="fs-product-count-calc">
                    <button type="button" class="fs-product-count-btn fs-icon-minus" data-action="minus"></button>
                    <input type="text" id="prod_cc_<?= $product['id'] ?>" class="fs-product-count" value="1">
                    <button type="button" class="fs-product-count-btn fs-icon-plus" data-action="plus"></button>
                </div>
                <button type="button" class="fs-product-add-to-cart fs-icon-basket" data-label="<?= $GLOBALS['text']['__basket__'] ?>" data-price="<?= $product->price ?>" data-product="<?= $product->id ?>"></button>
            </div>
  <?php } ?>
</article>
    <div class="fs-product-fast-view-modal" id="fs-product-fast-view-modal_<?= $product['id'] ?>">
        <div class="fs-product-fast-view-modal-body">
            <button type="button" class="fs-icon-close fs-product-fast-view-modal-close"></button>
            <div class="fs-product-fast-view-inner">
                <div class="fs-product-fast-view-thumbnail">
                    <div class="fs-product-fast-view-thumbnail-inner fs-new-product" data-new="new">
                        <?php $mainPhoto = $photos[0];?>
                        <div class="fs-product-fast-view-main-image-wrapper">
                            <?php if($mainPhoto) { ?>
                                <img src="/<?= $mainPhoto ?>" alt="">
                            <?php }else { ?>
                                <img src="http://<?=$_SERVER['SERVER_NAME'];?>/img/prodpic/no-image.png" alt="">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="fs-product-fast-view-info">
                    <h3 class="fs-product-fast-view-title"><?= $product->name ?></h3>
                    <div class="fs-product-fast-view-info-rows">
                        <div class="fs-product-fast-view-info-row">
                            <div class="fs-single-prod-data-rows">
                                <div class="fs-single-prod-data-row">
                                    <h4 class="fs-single-prod-data-title"><?= $GLOBALS['text']["__product__code__"] ?></h4>
                                    <p class="fs-single-prod-data-text"><?= $product['code_'] ?></p>
                                </div>
                                <div class="fs-single-prod-data-row">
                                    <h4 class="fs-single-prod-data-title"><?= $GLOBALS['text']["__seller__"] ?></h4>
                                    <a class="fs-single-prod-data-text" href="/site/company-details?id=<?= $product->provider_id ?>"><?= $product->provider->legal_name ?></a>
                                </div>
                                <?php
                                $variation = FsProductVariations::find()->where(['product_id'=>$product->id])->all();
                                if(!empty($variation)){ ?>
                                <div class="fs-single-prod-data-row">
                                    <select class="filter-select-prod-sec" data-variation="default">
                                        <option value="default" data-price="<?php echo $product->price;?>"><?= $GLOBALS['text']["__select_color__"] ?></option>
                                        <?php foreach ($variation as $variation => $var_val){  ?>
                                            <?php $param = \app\models\FsParams::findOne(['id'=>$var_val->param_id]);?>
                                            <option value="<?php echo $var_val->id; ?>" data-price="<?php echo $var_val->price;?>"><?php echo $param->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="fs-single-product-price-block">
                                <?php if($product->is_aah || $product->is_tax || $product->is_env){ ?>
                                      <?php if(!$discount->discount_procent){ ?>
                                     <p class="fs-single-product-current-price" data-message="(<?= $GLOBALS['text']['__not__include__taxes__'] ?>)"><?=number_format($product['price'], 0);?> <?= $GLOBALS['text']['__dr__'] ?>/<?php echo  @strtoupper($product->qty->name);?></p>
                                <?php } else { ?>
                                     <p class="fs-single-product-current-price" data-message="(<?= $GLOBALS['text']['__not__include__taxes__'] ?>)"><span  style=" text-decoration: line-through;color:#9B958C;padding-right:15px;font-size: 2rem;"><?=number_format($product->price,0)?> <?= $GLOBALS['text']['__dr__'] ?> </span> <?=number_format($product->price - ($product->price*$discount->discount_procent/100), 0);?></p>
                                <?php } ?>
                                <?php } else { ?>
                                     <?php if(!$discount->discount_procent){ ?>
                                        <p class="fs-single-product-current-price" ><?=number_format($product['price'], 0);?> <?= $GLOBALS['text']['__dr__'] ?><?php echo  @strtoupper($product->qty->name);?></p>
                                    <?php } else { ?>
                                         <p class="fs-single-product-current-price" ><span  style=" text-decoration: line-through;color:#9B958C;padding-right:15px;font-size: 2rem;"><?=number_format($product->price,0)?> <?= $GLOBALS['text']['__dr__'] ?> </span> <?=number_format($product->price - ($product->price*$discount->discount_procent/100), 0);?> <?= $GLOBALS['text']['__dr__'] ?>>/<?php echo  @strtoupper($product->qty->name);?></p>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="fs-single-product-text-info">
                                <h3 class="fs-single-product-desc-title"><?= $GLOBALS['text']["__description__"] ?></h3>
                                <div class="fs-single-product-desc-content">
                                    <?= $_COOKIE['language'] == 'hy' ? $product->description : $product['description_' . $_COOKIE['language']] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fs-single-fast-view-show-more-wrapper">
                    <a href="/product/<?= $product->url ?>" class="fs-single-fast-view-show-more"><?= $GLOBALS['text']['__view_more__'] ?></a>
                </div>
            </div>
        </div>
    </div>

<script>
    runChart();
</script>