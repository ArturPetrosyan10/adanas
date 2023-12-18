<?php 
use app\models\FsProducts;
?>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="/"><?=$GLOBALS['text']['__home__page__']?></a></li>
                   <?php foreach ($category->allParents as $parent) { ?>
                    <li class="fs-breadcrumbs-el">
                        <a href="/categories/<?= $parent->url ?>"><?= $_COOKIE['language'] == 'hy' ? $parent->name : $parent->translation['name_' . $_COOKIE['language']] ?></a>
                    </li>
                <? } ?>
                <li class="fs-breadcrumbs-el"><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></li>
            </ul>
        </div>
    </div>

    <div class="fs-category-wrapper">
        <div class="fs-container">
            <h1 class="fs-category-title"><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></h1>
            <?php if(isMobile_()){ ?>
                <div class="fs-category-sub-list">
                    <a href="/categories" class="fs-category-sub-title"><?= $GLOBALS['text']['__categories__'] ?></a>

                    <?php
                    foreach ($category->allParents as $parent) { ?>
                        <a href="/categories/<?= $parent->url ?>" class="fs-category-back-link"><i class="fs-icon-chevron"></i> <?= $_COOKIE['language'] == 'hy' ? $parent->name : $parent->translation['name_' . $_COOKIE['language']] ?></a>
                    <?php } ?>
                    <ul class="fs-category-link-list">
                        <li class="fs-category-link-first-level">
                            <a href="/categories/<?= $category->url ?>" class="fs-category-link-first-level-link"><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></a>
                            <? if (count($category->children) > 0) { ?>
                                <ul class="ft-category-link-second-level-list">
                                    <? foreach ($category->children as $child) { ?>
                                        <li class="ft-category-link-second-level-list-el <?= @$_GET['id'] == $child->id ? "active" : '' ?>">
                                            <a href="/categories/<?= $child->url ?>"><?= $_COOKIE['language'] == 'hy' ? $child->name : $child->translation['name_' . $_COOKIE['language']] ?></a>
                                        </li>
                                    <? } ?>
                                </ul>
                            <? } ?>
                        </li>
                    </ul>
                </div>
            <div class="fs-category-head-panel">
                <button type="button" class="head-panel-filter-btn"><i class="fs-icon-filter"></i><?= $GLOBALS['text']['__filter__'] ?></button>
                <div class="fs-mobile-filter-window">
                    <div class="fs-mobile-filter-window-body">
                        <div class="fs-mobile-cat-head">
                            <h4>Ֆիլտրել</h4>
                            <button type="button" class="fs-mobile-filter-window-close"><i class="fs-icon-close"></i>
                            </button>
                        </div>
                        <form class="fs-mobile-filter-body">
                            <div class="fs-category-sort-row" style="display:block;">
                                <div class="fs-dropdown fs-catalogue-sort" style="margin: 0px 1%;width:97%;">
                                    <p class="fs-dropdown-selected-variant" tabindex="0"><?php if(isset($_COOKIE['sort_text'])){ echo $_COOKIE['sort_text'];} else { echo $GLOBALS['text']['__sort_by__']; } ?></p>
                                    <div class="fs-dropdown-select">
                                        <ul class="fs-dropdown-select-options">
                                            <li class="fs-dropdown-select-option <?php if(!isset($_COOKIE['sort']) && $_COOKIE['sort']==0){ echo 'active';}?>" data-type="0"><?= $GLOBALS['text']['__sort_by__'] ?></li>
                                            <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==1){ echo 'active';}?> data-type="1"><?= $GLOBALS['text']['__notif__popup_tab_1__'] ?></li>
                                            <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==2){ echo 'active';}?> data-type="2"><?= $GLOBALS['text']['__required__'] ?></li>
                                            <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==3){ echo 'active';}?> data-type="3"><?= $GLOBALS['text']['__sort_by_price_bottom__'] ?></li>
                                            <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==4){ echo 'active';}?> data-type="4"><?= $GLOBALS['text']['__sort_by_price_top__'] ?></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="fs-mobile-filter-wrapper">
                                <?php if(!empty($paramsToCategory)){ ?>
                                <?php  echo $this->renderFile('@app/views/site/get-param.php', ['paramsToCategory' => $paramsToCategory]);?>
                                <?php } ?>
                                <div class="fs-mobile-filter-section">
                                    <div class="fs-mobile-filter-title-row">
                                        <h3>Գին</h3>
                                    </div>
                                    <div class="fs-mobile-filter-section-body">
                                        <div class="fs-mobile-range-slider">
                                            <div class="fs-filter-range-slider">
                                                <div class="range-slider">
                                                    <input type="text" name="price" class="js-range-slider" value="" />
                                                </div>
                                                <div class="extra-controls">
                                                    <input type="text"  class="js-input-from" value="0" />
                                                    <input type="text" class="js-input-to" value="0" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-mobile-filter-control-panel">
                                    <button type="reset" style="cursor:pointer;" onclick="window.location = window.location.pathname;"><?= $GLOBALS['text']['__clear_filters__'] ?></button>
                                    <button type="submit"><?= $GLOBALS['text']['__apply__'] ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="fs-category-container">
                    <br>
                     <div class="fs-category-prod-list">

                        <?php
                          if(!empty($products)) {
                              foreach ($products as $product) {
                                  echo $this->renderFile('@app/views/site/prod.php', ['product' => $product]);
                              }
                          }
                        ?>
                    </div>
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
            <?php } else { ?>
            <div class="fs-category-container">
                <aside class="fs-category-page-sidebar">
                    <div class="fs-category-sub-list">
                        <a href="/categories" class="fs-category-sub-title"><?= $GLOBALS['text']['__categories__'] ?></a>

                        <?php
                            foreach ($category->allParents as $parent) { ?>
                            <a href="/categories/<?= $parent->url ?>" class="fs-category-back-link"><i class="fs-icon-chevron"></i> <?= $_COOKIE['language'] == 'hy' ? $parent->name : $parent->translation['name_' . $_COOKIE['language']] ?></a>
                        <?php } ?>
                        <ul class="fs-category-link-list">
                            <li class="fs-category-link-first-level">
                                <a href="/categories/<?= $category->url ?>" class="fs-category-link-first-level-link"><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></a>
                                <? if (count($category->children) > 0) { ?>
                                    <ul class="ft-category-link-second-level-list">
                                        <? foreach ($category->children as $child) { ?>
                                            <li class="ft-category-link-second-level-list-el <?= @$_GET['id'] == $child->id ? "active" : '' ?>">
                                                <a href="/categories/<?= $child->url ?>"><?= $_COOKIE['language'] == 'hy' ? $child->name : $child->translation['name_' . $_COOKIE['language']] ?></a>
                                            </li>
                                        <? } ?>
                                    </ul>
                                <? } ?>
                            </li>
                        </ul>
                    </div>
                    <form class="fs-filter" style="" id="filter_block">
                        <h4 class="fs-filter-title">Ֆիլտրել</h4>

                        <?php if(!empty($paramsToCategory)){ ?>
                            <?php  echo $this->renderFile('@app/views/site/get-param.php', ['paramsToCategory' => $paramsToCategory]);?>
                        <?php } ?>

                        <div class="fs-filter-section">
                            <h5 class="fs-filter-section-title active">Արժեք<i class="fs-icon-chevron"></i></h5>
                            <div class="fs-filter-section-body">
                                <div class="fs-filter-range-slider">

                                    <div class="range-slider">
                                        <input type="text" name="price" class="js-range-slider" value="" />
                                    </div>
                                    <div class="extra-controls">
                                        <input type="text"  class="js-input-from" value="0" />
                                        <input type="text" class="js-input-to" value="0" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-filter-reset-btn-wrapper">
                            <button class="fs-filter-reset-btn" type="reset" onclick="window.location = window.location.pathname;"><?= $GLOBALS['text']['__clear_filters__'] ?></button>
                            <button class="fs-filter-reset-btn" type="submit"><?= $GLOBALS['text']['__apply__'] ?></button>
                        </div>
                    </form>
                </aside>

                <div class="fs-category-block">
                    <div class="fs-category-sort-row">
                        <div class="fs-dropdown fs-catalogue-sort">
                            <p class="fs-dropdown-selected-variant" tabindex="0"><?php if(isset($_COOKIE['sort_text'])){ echo $_COOKIE['sort_text'];} else { echo 'Դասակարգել ըստ';} ?></p>
                            <div class="fs-dropdown-select">
                                <ul class="fs-dropdown-select-options">
                                    <li class="fs-dropdown-select-option <?php if(!isset($_COOKIE['sort']) && $_COOKIE['sort']==0){ echo 'active';}?>" data-type="0"><?= $GLOBALS['text']['__sort_by__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==1){ echo 'active';}?> data-type="1"><?= $GLOBALS['text']['__notif__popup_tab_1__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==2){ echo 'active';}?> data-type="2"><?= $GLOBALS['text']['__required__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==3){ echo 'active';}?> data-type="3"><?= $GLOBALS['text']['__sort_by_price_bottom__'] ?></li>
                                    <li class="fs-dropdown-select-option" <?php if(isset($_COOKIE['sort']) && $_COOKIE['sort']==4){ echo 'active';}?> data-type="4"><?= $GLOBALS['text']['__sort_by_price_top__'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fs-category-prod-list">

                        <?php
                          if(!empty($products)) {
                              foreach ($products as $product) {
                                  echo $this->renderFile('@app/views/site/prod.php', ['product' => $product]);
                              }
                          }
                        ?>
                    </div>
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
            <?php } ?>
        </div>
      
          <?php if(!empty($view_history)){;?>
    <section class="fs-last-viewed-section fs-main-section-el" id="last" data-dom-el="section">
            <div class="fs-container">
                <h2 class="fs-section-title"><?= $GLOBALS['text']['_main_page_title_55_']?></h2>
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
</main>
<style>
    .pagination{
        display:flex;
        flex-wrap:wrap;
        list-style:none;
        margin-top:20px;
        padding-left:0px;
    }
    .pagination li{
        border:0.1px solid #B9AF9D;
        margin-left:5px;
        border-radius:5px;
    }
    .pagination a{
        padding:5px 10px;
        display:block;
        width:100%;
        height:100%;
        font-size:18px;
        text-decoration:none;
        color:#8C8370;
    }
    .pagination li.active{
        background:#ffbd27;
    }
    .pagination li.active a{
        color:white;
    }
    .irs-to,.irs-from,.irs-single{
        display:none !important;
    }
    .irs-bar,.irs--round .irs-handle{
        background-color:#ffbd27 !important;
        color:#ffbd27;
        border-color:#ffbd27 !important;
    }
    .extra-controls{
        margin-top:20px;
    }
    .extra-controls input{
        display:inline-block;
        background:#ffbd27;
        color:white;
        width:120px;
        margin-right:10px;
        font-size:20px;
        padding:10px 15px;
        border:0px;
    }
</style>

<?php
function isMobile_() {
return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

$fromPrice =0;
$toPrice =$maxPrice;
if(isset($_GET['price'])){
    $price_range = explode(';',$_GET['price']);
    $fromPrice = $price_range[0];
    $toPrice = $price_range[1];
}
if(!$maxPrice){
    $maxPrice = $toPrice = 0;
}
?>
<script defer src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/js/ion.rangeSlider.min.js"></script>
<script>
        setTimeout(function(){

            var $range_ = $(".js-range-slider"),
                $inputFrom = $(".js-input-from"),
                $inputTo = $(".js-input-to"),
                instance,
                min = 0,
                max = <?php echo $maxPrice; ?>,
                from = <?php echo $fromPrice; ?>,
                to = <?php echo $toPrice; ?>;

            $range_.ionRangeSlider({
                skin: "round",
                type: "double",
                min: min,
                max: max,
                from : <?php echo $fromPrice; ?>,
                to :<?php echo $toPrice; ?>,
                onStart: updateInputs,
                onChange: updateInputs
            });
            instance = $range_.data("ionRangeSlider");

            function updateInputs (data) {
                from = data.from;
                to = data.to;

                $inputFrom.prop("value", from);
                $inputTo.prop("value", to);
            }

            $inputFrom.on("input", function () {
                var val = $(this).prop("value");

                // validate
                if (val < min) {
                    val = min;
                } else if (val > to) {
                    val = to;
                }

                instance.update({
                    from: val
                });
            });

            $inputTo.on("input", function () {
                var val = $(this).prop("value");

                // validate
                if (val < from) {
                    val = from;
                } else if (val > max) {
                    val = max;
                }

                instance.update({
                    to: val
                });
            });
        },2500);
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/css/ion.rangeSlider.min.css">

