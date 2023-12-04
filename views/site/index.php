<?php use \app\models\FsProducts;
?>
<main class="fs-main-content">
    <div class="d-none fs-hero-slider-wrapper">
        <div class="fs-hero-slider owl-carousel owl-theme">
            <?php foreach ($banners as $banner){ ?>
                <?php if('.mp4' === substr($banner->image, -4)){ ?>
                    <video width="100%" height="450" autoplay loop  controls >
                        <source src="<?= $banner->image ?>" type="video/mp4">
<!--                        <source src="--><?php //= $banner->image ?><!--" type="video/ogg">-->
                    </video>
                <?php }else{ ?>
                    <div class="item ">
                        <img src="/<?= $banner->image ?>" alt="" <?php if($banner->id == 13 && false){ ?> style="width: 700px;height: 450px;left: calc(50% - 350px);" <?php } ?> >
                        <div class="fs-container">
                            <h3 class="fs-hero-slider-title"> <?= $banner['title_' . ($_COOKIE['language'] ? ($_COOKIE['language'] == 'hy' ? 'am' : $_COOKIE['language']) : 'am')] ?> </h3>
                            <p class="fs-hero-slider-paragraph"> <?= $banner['description_' . ($_COOKIE['language'] ? ($_COOKIE['language'] == 'hy' ? 'am' : $_COOKIE['language']) : 'am')] ?> </p>
                            <?php if($banner->url){   ?>
                                <a href="<?= $banner->url ?>" class="fs-hero-link fs-ghost-btn"><?=$GLOBALS['text']['__more__']?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
<!--    test-->
    <div class="fs-container d-flex justify-content-between new-slider-parent" >
        <div class="new-slider-first-half" style="background: url('/web/images/pexels-miguel-a-padrinan.webp');" ></div>
        <?php $i = true;
            $html = '';
        ?>
        <?php foreach ($banners as $banner){ ?>
            <?php if($i){
                $i = false; ?>
                <div class="big-slider">
                    <?php if('.mp4' === substr($banner->image, -4)){ ?>
                        <video width="100%" height="450" autoplay loop  controls >
                            <source src="<?= $banner->image ?>" type="video/mp4">
                        </video>
                    <?php }else{ ?>
                        <div class="small-video"  style="background: url('/<?= $banner->image ?>')">
                        </div>
                    <?php } ?>
                </div>
            <?php }else{
                    $html .= '<div class="small-sliders">';
                        if('.mp4' === substr($banner->image, -4)){
                            $html .= '<video width="100%" height="450" autoplay loop  controls >
                                        <source src="<?= $banner->image ?>" type="video/mp4">
                                    </video>';
                         }else{
                            $html .= '<div class="small-video"  style="background: url(/'.$banner->image.');"></div>';
                         }
                    $html .= '</div>';
                 }
            } ?>
        <div class="d-flex flex-column right-parent" >
            <?= $html; ?>
        </div>
    </div>
<!--test-->
    <section class="fs-hot-offer-section fs-main-section-el" id="hot" data-dom-el="section">
        <div class="fs-container">
            <h2 class="fs-section-title"><?=$GLOBALS['text']['_main_page_title_2_']?></h2>
            <div class="fs-home-page-banner-list">
                <?php foreach ($offers as $offer){ ?>
                   <?php if($offer->url){ $tag = 'a'; } else { $tag = 'span';} ?>
                    <<?=$tag;?> href="<?= $offer->url ?>" class="fs-home-page-banner macro-banner position-relative">
                        <img src="/<?= $offer->image ?>" alt="" />
                        <span class="position-absolute title"><?= $offer->title_am ?><?= ($_COOKIE['language'] ? ($_COOKIE['language'] == 'ru' ? $offer->title_ru : $offer->title_en) : $offer->title_am) ?></span>
                    </<?=$tag;?>>
                <?php }; ?>
            </div>
        </div>
    </section>
    <section class="suggestions-section" >
        <div class="container-fluid" >
            <div class="main-suggestions" style="margin-top:120px">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-about-parent"><i class="fa fa-shipping-fast"></i></div>
                    <div class="adv-title">Անվճար առաքում</div>
                    <div class="adv-content">Անվճար առաքում Երևանում</div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-about-parent"><i class="fa fa-headset"></i></div>
                    <div class="adv-title">Աջակցություն 24/7</div>
                    <div class="adv-content">Մենք աջակցում ենք օրը 24 ժամ</div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-about-parent"><i class="fa fa-exchange-alt"></i></div>
                    <div class="adv-title">100% գումարի վերադարձ</div>
                    <div class="adv-content">Դուք ունեք 30 օր վերադարցնելու համար</div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-about-parent"><i class="fa fa-gift"></i></div>
                    <div class="adv-title">Ապահով վճարում</div>
                    <div class="adv-content">Մենք ապահովում ենք անվտանգ վճարում</div>
                </div>
            </div>
        </div>
    </section>
    <section class="fs- last-viewed-section fs-main-section-el" id="last" data-dom-el="section" >
        <div class="fs-container">
            <h2 class="fs-section-title"><?=$GLOBALS['text']['_main_page_title_3_']?></h2>
            <div class="fs-product-slider owl-carousel owl-theme" style="margin-bottom:0">
                <?php if(!empty($view_history)){;?>
                    <?php foreach ($view_history as $vp => $vp_val){ ?>
                        <?php $product = FsProducts::findOne($vp_val->id);?>
                        <div class="item">
                            <?php  echo $this->renderFile('@app/views/site/prod.php',['product'=>$product]); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="fs-weekly-supplier fs-main-section-el" id="weekly" data-dom-el="section" style="margin-bottom: 14.6rem">
        <div class="fs-container">
            <h2 class="fs-section-title"><?=$GLOBALS['text']['_main_page_title_1_']?></h2>
            <div class="fs-weekly-supplier-slider owl-carousel owl-theme">
                <?php if(!empty($partners)){ $l = 0;?>

                    <?php foreach ($partners as $partner => $partner_val){ $l++;?>
                        <div style="overflow:hidden;">
                            <a href="/company-details/<?= $partner_val->id ?>">
                                <img style="max-height:100%;max-width:100%;" src="<?php echo $partner_val->image;?>" alt="" />
                            </a>
                        </div>

                    <?php } ?>

                <?php } ?>

            </div>
        </div>
    </section>
</main>
<script>
    // $( ".order_comment" ).change(function() {
    //
    //
    //
    //     $(".order_comment_vals").val($(this).val());
    //
    //
    //
    // });
</script>