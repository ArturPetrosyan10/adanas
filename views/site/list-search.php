<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="/"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <li class="fs-breadcrumbs-el" >/</li>
                <li class="fs-breadcrumbs-el">&lt;&lt;<?php use app\models\FsProducts;
                    echo $_GET['q'];?>&gt;&gt; <?= $GLOBALS['text']['__search__results__'] ?></li>
            </ul>
        </div>
    </div>
    <?php if(!empty($products)){ ?>
    <div class="fs-category-wrapper">
        <div class="fs-container">
            <h1 class="fs-category-title"><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></h1>
            <div class="fs-category-head-panel">
                <!--                <button type="button" class="head-panel-category-btn">Կատեգորիաներ</button>-->
                <button type="button" class="head-panel-filter-btn"><i class="fs-icon-filter"></i>Ֆիլտրել</button>


                <div class="fs-mobile-filter-window">
                    <form class="fs-mobile-filter-window-body">
                        <div class="fs-mobile-cat-head">
                            <h4>Ֆիլտրել</h4>
                            <button type="button" class="fs-mobile-filter-window-close"><i class="fs-icon-close"></i>
                            </button>
                        </div>
                        <div class="fs-mobile-filter-body">

                                    <div class="fs-category-sort-row" style="display:block;">
                                        <div class="fs-dropdown fs-catalogue-sort" style="margin: 0px 1%;width:97%;">
                                            <p class="fs-dropdown-selected-variant" tabindex="0"><?php if(isset($_COOKIE['sort_text'])){ echo $_COOKIE['sort_text'];} else { echo 'Դասակարգել ըստ';} ?></p>
                                            <div class="fs-dropdown-select">
                                                <ul class="fs-dropdown-select-options">
                                                    <li class="fs-dropdown-select-option <?php if(!isset($_COOKIE['sort']) || $_COOKIE['sort']==0){ echo 'active';}?>" data-type="0"><?= $GLOBALS['text']['__sort_by__'] ?></li>
                                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==1){ echo 'active';}?> data-type="1"><?= $GLOBALS['text']['__notif__popup_tab_1__'] ?></li>
                                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==2){ echo 'active';}?> data-type="2"><?= $GLOBALS['text']['__required__'] ?></li>
                                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==3){ echo 'active';}?> data-type="3"><?= $GLOBALS['text']['__sort_by_price_bottom__'] ?></li>
                                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==4){ echo 'active';}?> data-type="4"><?= $GLOBALS['text']['__sort_by_price_top__'] ?></li>
                                                </ul>
                                            </div>
                                        </div>

                            </div>
                            <br>
                            <input type="hidden" name="q" value="<?php echo $_GET['q'];?>">
                            <div class="fs-mobile-filter-wrapper">
                                <div class="fs-mobile-filter-section">
                                    <div class="fs-mobile-filter-title-row">
                                        <h3>Գին</h3>
                                    </div>
                                    <div class="fs-mobile-filter-section-body">
                                        <div class="fs-mobile-range-slider">
                                            <div class="fs-filter-range-slider">

                                                <?php
                                                $fromPrice =0;
                                                $toPrice =$maxPrice;
                                                if(isset($_GET['price'])){
                                                    $price_range = explode(';',$_GET['price']);
                                                    $fromPrice = $price_range[0];
                                                    $toPrice = $price_range[1];
                                                }
                                                ?>

                                                <input type="text" name="price"  class="fs-filter-range-slider-input" data-type="double"
                                                       data-min="<?php echo $minPrice;?>" data-max="<?php echo $maxPrice;?>" data-from="<?php echo $fromPrice;?>" data-to="<?php echo $toPrice;?>"
                                                       data-drag-interval="true" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fs-mobile-filter-control-panel">
                                    <button type="reset" style="cursor:pointer;" onclick="window.location = window.location.pathname;">Մաքրել ֆիլտրը</button>
                                    <button type="submit">Կիրառել</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="fs-category-container">
                <aside class="fs-category-page-sidebar">

                    <form class="fs-filter" style="" id="filter_block">
                        <input type="hidden" name="q" value="<?php echo $_GET['q'];?>">
                        <div class="fs-filter-section">
                            <h5 class="fs-filter-section-title active"><?=$GLOBALS['text']['__price__']?><i class="fs-icon-chevron"></i></h5>
                            <div class="fs-filter-section-body">
                                <div class="fs-filter-range-slider">
                                    <?php
                                    $fromPrice =0;
                                    $toPrice =$maxPrice;
                                    if(isset($_GET['price'])){
                                        $price_range = explode(';',$_GET['price']);
                                        $fromPrice = $price_range[0];
                                        $toPrice = $price_range[1];
                                    }
                                    ?>

                                    <input type="text" name="price"  class="fs-filter-range-slider-input" data-type="double"
                                           data-min="<?php echo $minPrice;?>" data-max="<?php echo $maxPrice;?>" data-from="<?php echo $fromPrice;?>" data-to="<?php echo $toPrice;?>"
                                           data-drag-interval="true" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="fs-filter-reset-btn-wrapper">
                            <button class="fs-filter-reset-btn" type="reset" onclick="window.location = window.location.pathname;"><?=$GLOBALS['text']['__clear_filters__']?></button>
                            <button class="fs-filter-reset-btn" type="submit">Կիրառել</button>
                        </div>
                    </form>
                </aside>

                <div class="fs-category-block">
                    <div class="fs-category-sort-row">
                        <div class="fs-dropdown fs-catalogue-sort">
                            <p class="fs-dropdown-selected-variant" tabindex="0"><?php if(isset($_COOKIE['sort_text'])){ echo $_COOKIE['sort_text'];} else { echo 'Դասակարգել ըստ';} ?></p>
                            <div class="fs-dropdown-select">
                                <ul class="fs-dropdown-select-options">
                                    <li class="fs-dropdown-select-option <?php if(!isset($_COOKIE['sort']) || $_COOKIE['sort']==0){ echo 'active';}?>" data-type="0"><?= $GLOBALS['text']['__sort_by__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==1){ echo 'active';}?> data-type="1"><?= $GLOBALS['text']['__notif__popup_tab_1__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==2){ echo 'active';}?> data-type="2"><?= $GLOBALS['text']['__required__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==3){ echo 'active';}?> data-type="3"><?= $GLOBALS['text']['__sort_by_price_bottom__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) || $_COOKIE['sort']==4){ echo 'active';}?> data-type="4"><?= $GLOBALS['text']['__sort_by_price_top__'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fs-category-prod-list">
                        <?php
                        foreach ($products as $product) {
                            echo $this->renderFile('@app/views/site/prod.php',['product'=>$product]);
                        }
                        ?>
                    </div>
                    <?php if(!empty($view_history)){;?>
                        <section class="fs-last-viewed-section fs-main-section-el" id="last" data-dom-el="section">
                            <div class="fs-container">
                                <h2 class="fs-section-title"><?=$GLOBALS['text']['_main_page_title_55_']?></h2>
                                <div class="fs-product-slider owl-carousel owl-theme">

                                    <?php foreach ($view_history as $vp => $vp_val){ ?>
                                        <?php $product = FsProducts::findOne($vp_val->product_id);?>
                                        <div class="item">
                                            <?php  echo $this->renderFile('@app/views/site/prod.php',['product'=>$product]); ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </section>
                    <?php } ?>
                    <nav>
                        <?php $pages = ceil(intval($total)/12); ?>
                        <?php if($pages>1){ ?>
                            <ul class="pagination">

                                <?php if(isset($_GET['page']) && intval($_GET['page'] )>0){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo strtok($_SERVER["REQUEST_URI"],'?');?>?page=<?php echo intval($_GET['page'])-1;?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php
                                if(!isset($_GET['page'])){
                                    $_GET['page'] = 0;
                                }
                                for ($i = 1; $i <= $pages; $i++){
                                    if( $i == (intval($_GET['page'])+2) || $i == (intval($_GET['page'])+3) || $i == (intval($_GET['page'])-1)  ||  $i == (intval($_GET['page'])) ||  $i == intval($_GET['page'])+1) {
                                        $class = '';
                                        if($i == intval($_GET['page'])+1){
                                            $class = 'active';
                                        }
                                        echo '<li class="page-item '.$class.'"><a class="page-link" href="'.strtok($_SERVER["REQUEST_URI"],'?').'?page=' . ($i-1).'">' . $i.'</a></li>';
                                    }
                                } ?>
                                <?php if(isset($_GET['page']) && (intval($_GET['page'] )+1) < $pages){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo strtok($_SERVER["REQUEST_URI"],'?');?>?page=<?php echo (intval($_GET['page'] )+1);?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php  } ?>
                    </nav>
                </div>

            </div>

        </div>

    </div>
    <?php } else { ?>
    <div class="fs-category-wrapper">
        <div class="fs-container">
            <h1 class="fs-category-title">&lt;&lt;<?php echo $_GET['q'];?>&gt;&gt; որոնման համապատասխան տվյալ չի գտնվել</h1>
        </div>
        <?php if(!empty($view_history)){;?>
            <section class="fs-last-viewed-section fs-main-section-el" id="last" data-dom-el="section">
                <div class="fs-container">
                    <h2 class="fs-section-title" style="padding-top:3rem;"><?=$GLOBALS['text']['_main_page_title_55_']?></h2>
                    <div class="fs-product-slider owl-carousel owl-theme">
                        <?php foreach ($view_history as $vp => $vp_val){ ?>
                            <?php $product = FsProducts::findOne($vp_val->product_id);?>
                            <div class="item">
                                <?php  echo $this->renderFile('@app/views/site/prod.php',['product'=>$product]); ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </section>
        <?php } ?>
    </div>
    <?php } ?>
</main>



