<style>
    .owl-stage{
        transform: translate3d(0px, 0px, 0px) !important;
        width:100% !important;
    }
    .fs-product-thumbnail{
        padding:1rem;
    }
    .fs-product-add-to-fav{
        left:0px !important;
    }
    .owl-item {
        -webkit-box-shadow: 0px 1px 30px rgb(62 68 90 / 9%);
        padding: 2rem;
        border-radius:8px;
        width:22% !important;
    }
    .owl-carousel .owl-item {
        float: left;
        margin-left: 12px;
        margin-right: 12px !important;
        margin-top: 20px;
    }
</style>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php
                if(isset($_GET['mobile'])){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']["__preferred_products_services__"] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <?php include("personal_menu.php"); ?>
            <div class="fs-personal-body">
                <?php include('title.php'); ?>
                <div class="fs-personal-title-group">
                    <h2 class="fs-personal-body-title"><?=$GLOBALS['text']['__favorite__list__products__']?></h2>
                </div>
                <?php if(!empty($providers)){ ?>
                <div class="fs-personal-list-wrapper">
                    <p class="fs-personal-list-select-category"><?= $GLOBALS['text']["__favorites_text__"] ?></p>
                    <div class="fs-personal-list-tab-head">
<!--                        <button data-index="1" type="button" class="fs-personal-tab-button active">Ապրանքներ /-->
<!--                            Ծառայություններ-->
<!--                        </button>-->
<!--                        <button data-index="2" type="button" class="fs-personal-tab-button">Կազմակերպություններ</button>-->
                    </div>
                    <div class="fs-personal-select-category">
                        <div class="fs-search-block" style="width:100%;margin:20px 0px;">
                            <input class="fs-search-input" id="search_fav" type="text" placeholder="<?= $GLOBALS['text']["__search_text_top_header__"] ?>" value="">
                            <i class="fs-icon-search"></i>
                        </div>
                    </div>

                    <div class="fs-personal-page-tab-result active" data-index="1">
<!--                                <div class="fs-personal-link-el ">-->
<!--                                    <a style="font-size:20px;" href="/company-details/--><?php //echo $provider['provider_id'];?><!--" >--><?php //echo \app\models\FsUsers::findOne($provider['provider_id'])->legal_name; ?><!--</a>-->
<!--                                </div>-->
                                <section class="w-100">
                                    <div class="fs-product-slider owl-carousel owl-theme" style="margin-bottom:0">
<!--                                        <input type="checkbox" class="show-more-switcher" />-->
                                        <?php
                                        if(!empty($providers)){
                                            foreach ($providers as $provider){
                                                foreach ($user->wishlist($provider['provider_id']) as $wishlist) {
                                                    $product = \app\models\FsProducts::findOne($wishlist['product_id']); ?>
                                                <div class="item">
                                                    <?php  echo $this->renderFile('@app/views/site/prod.php',['product'=>$product]); ?>
                                                </div>
                                        <?php   }
                                            }
                                        } ?>
                                    </div>
                                </section>
                    </div>
                </div>
                <?php } else { ?>
                <div class="fs-personal-list-wrapper">
                    <p class="fs-personal-list-select-category">
                        <?=$GLOBALS['text']['__no__preferred__products__']?>
                    </p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
