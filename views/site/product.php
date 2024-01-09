<?php

use app\models\FsCategories;
use app\models\FsParamToCategory;
use app\models\FsDiscounts;
use app\models\FsWishlist;
$photos = explode(',', $product->image);
$discount = FsDiscounts::find()->where(['user_id'=>$product->user_id,'applies_full_range'=>1,'applies_full_partners'=>'1','discount_type'=>1])->one();

if (Yii::$app->fsUser->identity->verified > 0) {
    $verified = true;
}else{
    $verified = false;
}
?>
<style>
    .fs-single-min-thumbnail-list .owl-stage{
        width:100% !important;
    }
    .fs-single-thumbnail-wrapper .owl-loaded{
        width:15% !important;
    }
    .fs-single-thumbnail-wrapper .owl-nav{
        display:none !important;
    }
</style>
<script>
    function imageZoom(imgID, resultID) {
        var img, lens, result, cx, cy;
        img = document.getElementById(imgID);
        result = document.getElementById(resultID);
        /*create lens:*/
        lens = document.createElement("DIV");
        lens.setAttribute("class", "img-zoom-lens");
        /*insert lens:*/
        img.parentElement.insertBefore(lens, img);
        /*calculate the ratio between result DIV and lens:*/
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        /*set background properties for the result DIV:*/
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        /*execute a function when someone moves the cursor over the image, or the lens:*/
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        /*and also for touch screens:*/
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);
        function moveLens(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image:*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            /*calculate the position of the lens:*/
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            /*prevent the lens from being positioned outside the image:*/
            if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
            if (x < 0) {x = 0;}
            if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
            if (y < 0) {y = 0;}
            /*set the position of the lens:*/
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            /*display what the lens "sees":*/
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
        }
        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }
</script>
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
        <?php }
            else { ?>
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
                    <div class="fs-single-thumbnail-wrapper d-flex flex-wrap">
                        <?php
                        $mainPhoto = false;
                        if (count($photos) > 0) {
                            ?>
                            <div class="fs-single-min-thumbnail-list d-flex">
                            <?php foreach ($photos as $photo) {
                                    if ($mainPhoto == false) {
                                        $mainPhoto = $photo;
                                    } ?>
                                    <div class="item">
                                        <div class="fs-single-min-thumbnail">
                                            <img class="img-responsive" data-bigone="/<?= $photo ?>"
                                                 src="/<?= $photo ?>"
                                                 alt="">
                                        </div>
                                    </div>
                            <?php } ?>
                            </div>
                        <?php
                        } ?>
                        <div class="fs-single-product-main-image">
                            <?php if(strlen($photos[0]) > 0){ ?>
                                <div class="img-zoom-container">
                                    <img id="myimage" src=" /<?= $photos[0] ?>" alt="Girl">
                                    <div id="myresult" class="img-zoom-result"></div>
                                </div>
                            <?php }else{ ?>
                                <img class="img-responsive" src="http://<?=$_SERVER['SERVER_NAME'];?>/img/prodpic/no-image.png" alt="">
                            <?php } ?>
                        </div>
                        <div class="w-100 d-flex " style="gap:1rem">
                            <?php echo  Yii::$app->view->renderFile('@app/views/site/product-variations.php',['variations' => $variations]); ?>
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
                         <?php
                         if($product->is_aah || $product->is_tax || $product->is_env){
                             if(!$discount->discount_procent){ ?>
                                <p class="fs-single-product-current-price" data-price="<?= $product['price'] ?>" data-message="(<?= $GLOBALS['text']['__not__include__taxes__'] ?>)"><?=number_format($product['price'], 0);?> <?= $GLOBALS['text']['__dr__']?>/<?php echo  @strtoupper($product->qty->name);?></p>
                       <?php } else { ?>
                                <p class="fs-single-product-current-price" data-price="<?= $product->price - ($product->price*$discount->discount_procent/100) ?>" data-message="(<?= $GLOBALS['text']['__not__include__taxes__'] ?>)"><span  style=" text-decoration: line-through;color:#9B958C;padding-right:15px;font-size: 2rem;"><?=number_format($product->price,0)?> դր </span> <?=number_format($product->price - ($product->price*$discount->discount_procent/100), 0);?></p>
                       <?php }
                         } else {
                            if(!$discount->discount_procent){ ?>
                                <p class="fs-single-product-current-price" data-price="<?= $product['price'] ?>" ><?=number_format($product['price'], 0);?> <?= $GLOBALS['text']['__dr__']?>/<?php echo  @strtoupper($product->qty->name);?></p>
                            <?php } else { ?>
                                 <p class="fs-single-product-current-price" data-price="<?= $product->price ?>" ><span  style=" text-decoration: line-through;color:#9B958C;padding-right:15px;font-size: 2rem;"><?=number_format($product->price,0)?> դր </span> <?=number_format($product->price - ($product->price*$discount->discount_procent/100), 0);?> դր/<?php echo  @strtoupper($product->qty->name);?></p>
                            <?php }
                         } ?>
                    </div>
                    <div class="add-product-order">

<!--                        --><?php //echo Yii::$app->view->renderFile('@app/views/site/get-filter-product.php',[
//                                    'params'=>$params,
//                                    'product'=>$product,
//                                    'category_id'=>$product->category_id ,
//                                    'variations' => $variations,
//                                ]) ?>
                        <div class="w-100 border-1 order-block">
                            <form action="" class="d-flex justify-content-start">
                                <div class="d-flex counts-block fs-single-prod-calc-block-inner fs-single-order-td">
                                    <button type="button" class="fs-icon-minus" data-action="minus"></button>
                                    <input type="number" class="fs-calc-field fs-product-count" value="1" min="1">
                                    <button type="button" class="fs-icon-plus" data-action="plus"></button>
                                </div>
                                <div class="d-flex adding-block">
                                    <button type="button" <?= $verified ? '' : 'disabled' ?> class="fs-product-add-to-cart-1 fs-icon-basket" disabled data-variation="" data-price="<?= $product->price ?>" data-product="<?= $product->id ?>">Ավելացնել</button>
                                    <button type="button" <?= $verified ? '' : 'disabled' ?> class="">Գնել հիմա</button>
                                </div>
                                <div class="d-flex choosen-block">
                                    <button type="button" class="fs-single-product-to-fav fs-icon-heart <?= FsWishlist::find()->where(['user_id' => Yii::$app->fsUser->identity->id])->andWhere(['product_id' => $product->id])->one() ? 'active' : '' ?>" data-prodid="<?= $product->id ?>"></button>
                                    <a class="" href="">
                                        Նախընտրած
                                    </a>
                                </div>
                            </form>
                            <div class="w-100 d-flex align-items-end" >
                                <p class="fs-single-prod-result" style="text-align:right"><?= $GLOBALS['text']["__total__"] ?>
                                    ՝ <span><?= ceil($productTotal) ?></span>
                                    <?= $GLOBALS['text']["__dr__"] ?>
                                </p>
                            </div>
                        </div>

                        <div class="main-suggestions" style="grid-template-columns: repeat(3, 1fr);">
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-product-parent"><i class="fa fa-shipping-fast"></i></div>
                                <div class="adv-title"><?= $GLOBALS['text']["__free__shipping__"] ?></div>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-product-parent"><i class="fa fa-headset"></i></div>
                                <div class="adv-title"><?= $GLOBALS['text']["__assistance__"] ?> 24/7</div>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-product-parent"><i class="fa fa-exchange-alt"></i></div>
                                <div class="adv-title"><?= $GLOBALS['text']["__refund__"] ?>100% </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="fs-single-product-text-info" style="margin-top:200px;">
                <h3 class="fs-single-product-desc-title"><?= $GLOBALS['text']["__description__"] ?></h3>
                <div class="fs-single-product-desc-content">
                    <?= $_COOKIE['language'] == 'hy' ? $product->description : $product['description_' . $_COOKIE['language']] ?>
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
                        <div class="item"> <?php include("prod.php"); ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
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

<style>
    .img-zoom-container {
        position: relative;
        width: 100%;
        height: 100%;
    }
    #myimage{
        position:absolute;
        opacity:1;
        z-index:3;
    }

    .img-zoom-lens {
        position: absolute;
        width: 200px;
        height: 200px;
        /*border: 1px solid black;*/
        /*border-radius:50%;*/
    }

    .img-zoom-result {
        width: 100%;
        height: 100%;
        /* object-fit: contain; */
        border: 1px solid #e5e8ec;
        position: absolute;
        top: 0;
        z-index: 2;
        zoom: 1;
        opacity: 0;
        background-repeat: no-repeat;
    }

</style>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    imageZoom("myimage", "myresult");
    $('body').on('mouseleave',"#myimage",function () {
        $('#myimage').css('opacity','1');
        $('.img-zoom-result').css('opacity','0');

    })
    $('body').on('mouseenter',"#myimage",function () {
        $('#myimage').css('opacity','0');
        $('.img-zoom-result').css('opacity','1');
    })
</script>
