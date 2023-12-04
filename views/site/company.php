<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a onclick="history.back()" style="cursor:pointer;"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <li class="fs-breadcrumbs-el"><?= $company->legal_name ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-category-wrapper">
        <div class="fs-container">
            <div class="fs-companies-supplier-block">
                <div class="fs-companies-supplier-top">
                    <input type="hidden" id="comp_id" value="<?= $company->id ?>">
                    <img src="<?= isset($company->image) ? '/' . $company->image : '/web/site/img/noimg.png' ?>"
                         alt=""/>
                    <h3 class="fs-companies-supplier-title"><?= $company->legal_name ?></h3>
                    <address class="fs-companies-supplier-address"><?= $company->legal_address ?></address>
                    <a style="color:#4A4640;" href="tel:<?= $company->phone ?>"><?=$GLOBALS['text']['__phone__']?> <?= $company->phone ?></a>
                    <a style="color:#4A4640;" href="mailto:<?= $company->email ?>"><?= $company->email ?></a>
                    <?php
                    $is = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$company->id])->andWhere(['status'=>[1,null]])->one();
                    $disabled = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$company->id])->andWhere(['status'=>4])->one();
                    $is_3_declines = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$company->id])->andWhere(['status'=>2])->count();
                    if(!$disabled){
                        ?>
                        <?php if($company->is_seller == 1 && Yii::$app->fsUser->identity->is_buyer == 1 && $is_3_declines<3 && !$is && Yii::$app->fsUser->identity->status == 1 && Yii::$app->fsUser->identity->verified == 1) { ?>
                            <a href="/personal-requests?become-partners=<?= $company->id ?>" class="fs-registration-call-to-action"><?=$GLOBALS['text']['__become_a_partner']?></a>
                        <?php } ?>
                    <?php } else { ?>
                        <a href="#" style="color:#8C8370 !important;" class="fs-registration-call-to-action"><?= $GLOBALS['text']['__suspended__'] ?></a>
                    <?php } ?>
                </div>
                <? if($company->company_description){ ?>
                    <div class="fs-companies-supplier-bottom">
                        <p><?= $company->company_description ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="fs-category-container" style="margin-top:20px;">
                <aside class="fs-category-page-sidebar">
                    <div class="fs-category-sub-list">
                        <?php if(!isMobile_()){ ?>
                        <h5 class="fs-category-sub-title"><?=$GLOBALS['text']['__categories__']?></h5>
                        <ul class="fs-category-link-list">
                            <a href="/company-details/<?php echo $company->id;?>" class="fs-category-back-link"><?= $GLOBALS['text']['_all_'] ?></a>
                            <?php  $userCat = explode(';', substr($company['categories'], 0, -1));
                            foreach ($userCat as $category) { ?>
                                <?php $category_ = \app\models\FsCategories::findOne(['id'=>$category]);?>
                                    <a href="/company-details/<?php echo $company->id;?>?category=<?php  echo $category_->id;?>" class="fs-category-back-link">
<!--                                        --><?php // echo $category_->name;?>
                                        <?= $_COOKIE['language'] == 'hy' ? $category_->name : $category_->translation['name_' . $_COOKIE['language']] ?>
                                    </a>
                            <?php } ?>
                        </ul>
                          <form class="fs-filter" style="" id="filter_block">
                            <h4 class="fs-filter-title"><?=$GLOBALS['text']['__filter__']?></h4>

                            <?php if(!empty($paramsToCategory)){ ?>
                                <?php  echo $this->renderFile('@app/views/site/get-param.php', ['paramsToCategory' => $paramsToCategory]);?>
                            <?php } ?>

                            <div class="fs-filter-section">
                                <h5 class="fs-filter-section-title active"><?=$GLOBALS['text']['__price__']?><i class="fs-icon-chevron"></i></h5>
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
                                <button class="fs-filter-reset-btn" type="reset" onclick="window.location = window.location.pathname;"><?=$GLOBALS['text']['__clear_filters__']?></button>
                                <button class="fs-filter-reset-btn" type="submit"><?=$GLOBALS['text']['__apply__']?></button>
                            </div>
                        </form>
                            <?php } else { ?>
                                
                                <div class="fs-category-sort-row mobile-only">
                                        <select name="type" id="drop_mobile_company_sup" class="fs-dropdown">
                                            <option value="">Բոլորը</option>
                                            <?  $userCat = explode(';', substr($company['categories'], 0, -1));?>
                                           <?php  

                                              if(!empty($userCat)){
                                              foreach ($userCat as $category) { ?>
                                                  <?php $category_ = \app\models\FsCategories::findOne(['id'=>$category]);?>
                                                <option value="<?php  echo $category_->id;?>"><?php  echo $category_->name;?></option>
                                            <? }} ?>
                                        </select>
                                </div>
                               <div class="fs-category-head-panel">
                            <button type="button" class="head-panel-filter-btn"><i class="fs-icon-filter"></i><?=$GLOBALS['text']['__filter__']?></button>
                            <div class="fs-mobile-filter-window">
                                <div class="fs-mobile-filter-window-body">
                                    <div class="fs-mobile-cat-head">
                                        <h4>Ֆիլտրել</h4>
                                        <button type="button" class="fs-mobile-filter-window-close"><i class="fs-icon-close"></i>
                                        </button>
                                    </div>
                                    <form class="fs-mobile-filter-body">
                                      
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
                                                <button type="reset" style="cursor:pointer;" onclick="window.location = window.location.pathname;"><?=$GLOBALS['text']['__clear_filters__']?></button>
                                                <button type="submit"><?=$GLOBALS['text']['__apply__']?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
            </div>
                            <?php } ?>
                    </div>
                </aside>
                <div class="fs-category-block">
                    <div class="fs-category-prod-list">
                        <?php
                        if(!empty($products)) {
                            foreach ($products as $product) {
                                echo $this->renderFile('@app/views/site/prod.php', ['product' => $product]);
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .mobile-only{
        display:none;
    }

    .fs-dropdown{
        width:100%;
        font-size:18px;
        margin-top: 20px;
        padding:5px 10px;
        height: auto;
        position: relative;
        border-radius: 0.4rem;
        color:#D7D4D1;
        border: 0.1rem solid #D7D4D1;
    }
    @media all and (max-width: 768px) {
        .mobile-only {
            display: block
        }
        .fs-personal-page-td__{
            color:#4A4640;
            padding:10px;
        }
        .fs-personal-announced-table, .fs-personal-page-table{
            min-width:100%;
        }
        .fs-personal-sent-action-row form{
            margin-top:20px;
            width:100%;
        }
        .fs-personal-sent-action-row form button{
            padding:5px 10px;
            height: auto;
            position: relative;
            border-radius: 0.4rem;
            color:#D7D4D1;
            font-size:18px;
            border: 0.1rem solid #D7D4D1;
            margin-bottom:20px;
            width:100%;
        }
        .fs-double-datepicker-body{
            width:100%;
            padding:10px 0px;
        }
        .fs-personal-sent-tabulation{
            display:none;
        }
    }

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
        background:#DAA520;
    }
    .pagination li.active a{
        color:white;
    }
    .irs-to,.irs-from,.irs-single{
        display:none !important;
    }
    .irs-bar,.irs--round .irs-handle{
        background-color:#DAA520 !important;
        color:#DAA520;
        border-color:#DAA520 !important;
    }
    .extra-controls{
        margin-top:20px;
    }
    .extra-controls input{
        display:inline-block;
        background:#DAA520;
        color:white;
        width:120px;
        margin-right:10px;
        font-size:20px;
        padding:10px 15px;
        border:0px;
    }
</style>
<script defer src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/js/ion.rangeSlider.min.js"></script>
<?php $fromPrice =0;
$toPrice =$maxPrice = 500000;
$fromPrice = 0;
if(isset($_GET['price'])){
    $price_range = explode(';',$_GET['price']);
    $fromPrice = $price_range[0];
    $toPrice = $price_range[1];
}

?>
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
<?php
function isMobile_() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>