<?php use \app\models\FsProducts;
?>
    <section class="fs-container d-flex justify-content-between new-slider-parent" >
        <div class="new-slider-first-half" style="background: url('/web/images/pexels-miguel-a-padrinan.webp');" ></div>
        <?php $i = true;
            $html = '';
        ?>
        <?php foreach ($banners as $banner){ ?>
                <div class="big-slider <?= !$i ? 'd-none' : '' ?> slidern_<?= $banner->id ?>">
                        <?php if('.mp4' === substr($banner->image, -4)){ ?>
                            <video width="100%" height="490" autoplay loop  controls >
                                <source src="<?= $banner->image ?>" type="video/mp4">
                            </video>
                        <?php } ?>
                    <?php  $i = false ?>
                </div>
            <?php
                $html .= '<div class="small-sliders" data-id="'.$banner->id.'"> ';
                if ('.mp4' === substr($banner->image, -4)) {
                    $html .= '<video width="100%" height="150" loop  >
                                <source src="'.$banner->image.'" type="video/mp4">
                                </video>';
                }else {
                    $html .= '<div class="small-video"  style="background: url(/' . $banner->image . ');"></div>';
                }
                $html .= '</div>';
             } ?>
        <div class="d-flex flex-column right-parent" >
            <?= $html; ?>
        </div>
    </section>
<!--test-->
    <section class="fs-hot-offer-section fs-main-section-el" id="hot" data-dom-el="section">
        <div class="fs-container">
            <div class="d-flex justify-content-between">
                <h2 class="fs-section-title"><?=$GLOBALS['text']['_main_page_title_2_']?></h2>
                <a href="#" class="fs-section-title" style="border:none; font-size: 14px;">
                     <?= $GLOBALS['text']['__view__all__'] ?>
                    <i class="fa fa-long-arrow-alt-right"></i>
                </a>
            </div>
            <div class="fs-home-page-banner-list">
            <?php foreach ($categories as $category){ ?>
                   <?php if($category->url){ $tag = 'a'; }
                   else { $tag = 'span';} ?>
                    <<?=$tag;?> href="/categories/<?= $category->url ?>" class="fs-home-page-banner macro-banner position-relative">
                        <img src="/<?= $category->photo ?>" alt="" />
                        <span class="position-absolute title">
                            <?= $category->name ?>
                        </span>
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
            <div class="d-flex justify-content-between">
                <h2 class="fs-section-title">
                    <?=$GLOBALS['text']['_main_page_title_3_']?>
                </h2>
                <a href="#" class="fs-section-title" style="border:none; font-size: 14px;">
                    <?= $GLOBALS['text']['__view__all__'] ?>
                    <i class="fa fa-long-arrow-alt-right"></i>
                </a>
            </div>
            <div class="fs-product-slider owl-carousel owl-theme" style="margin-bottom:0">
                <?php if(!empty($view_history)){;?>
                    <?php foreach ($view_history as $vp => $vp_val){ ?>
                        <?php $product = FsProducts::findOne($vp_val->id);?>
                        <div class="item">
                            <?php  echo $this->renderFile('@app/views/site/new-prod.php',['product'=>$product]); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <section style="margin-top:20px;">
        <img src="/web/images/home-page1.webp" alt="" style="width:100%;">
    </section>
    <section class="fs-weekly-supplier fs-main-section-el" id="weekly" data-dom-el="section">
        <div class="fs-container">
            <div class="d-flex justify-content-between">
                <h2 class="fs-section-title"><?=$GLOBALS['text']['_main_page_title_1_']?></h2>
                <a href="/brands" class="fs-section-title" style="border:none; font-size: 14px;">
                    <?= $GLOBALS['text']['__view__all__'] ?>
                    <i class="fa fa-long-arrow-alt-right"></i>
                </a>
            </div>
            <div class="fs-weekly-supplier-slider owl-carousel owl-theme">
                <?php if(!empty($partners)){ $l = 0;?>
                    <?php foreach ($partners as $partner => $partner_val){ $l++;?>
                        <div class="brand-block">
                            <a href="brands/<?= $partner_val->id ?>">
                                <div class="img-parent">
                                    <img src='<?= $partner_val->logo ?>'>
                                </div>
                                <div>
                                    <h2><?= $partner_val->name; ?></h2>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </section>

<style>
    .brand-block img{
        width:78%;
        aspect-ratio: 3/2;
        object-fit:contain;
        max-height:100%;
        /*mix-blend-mode:color-burn;*/
    }
    .brand-block {
        background-color: #ffffff;
        transition: 0.3s;
        border-radius: 4px;
        border: 1px solid #e5e8ec;
        padding: 5px;
        cursor: pointer;
        text-align: center;
        width:100%;
    }
    .brands-section {
        margin-bottom: 100px;
        display: grid;
        grid-template-columns: repeat(6, calc( 16.66% - 25px ) );
        grid-gap: 30px;
    }
    .brand-block a h2{
        font-size:13px ;
        color:black ;
    }.img-parent{
         height:80px;
    }
    .fs-product-slider .item{
        box-shadow: 0px 1px 30px rgb(62 68 90 / 9%);
        padding:1rem;
    }
</style>