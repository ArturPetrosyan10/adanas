<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php use app\models\FsCategories;

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
            <? include("personal_menu.php"); ?>
            <div class="fs-personal-body">
                <? include('title.php'); ?>
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
                            <?php
                            if(!empty($providers)){
                              foreach ($providers as $provider){
                            ?>
                                  <div class="fs-personal-link-el ">
                                     <a style="font-size:20px;" href="/company-details/<?php echo $provider['provider_id'];?>" ><?php echo \app\models\FsUsers::findOne($provider['provider_id'])->legal_name; ?></a>
                                  </div>
                            <div class="fs-min-product-slider-wrapper">
                                <input type="checkbox" class="show-more-switcher" />
                                <div class="fs-min-product-slider">
                                    <?php foreach ($user->wishlist($provider['provider_id']) as $wishlist) {
                                        $product = \app\models\FsProducts::findOne($wishlist['product_id']);
                                        include("prod.php");
                                    } ?>
                                </div>
                            </div>
                              <?php } } ?>
                        </div>

<!--                    <div class="fs-personal-page-tab-result " data-index="2">-->
<!--                    </div>-->

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
