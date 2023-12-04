<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isMobile_()){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?=$GLOBALS['text']['__partners__']?></li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <? include("personal_menu.php"); ?>
            <div class="fs-personal-body">
                <? include('title.php'); ?>
                <div class="fs-personal-title-group">
                    <h2 class="fs-personal-body-title"><?=$GLOBALS['text']['__partners__']?></h2>
                </div>
                <div class="fs-personal-partners-wrapper">
                    <form method="GET" action="/personal-partners" class="fs-personal-partners-search-form">
                        <label class="fs-personal-partners-search-field" id="partner_list_search">
                            <input name="search" type="text" value="<?= $_GET['search'] ?>"/>
                        </label>
                        <button type="submit" class="fs-icon-search fs-personal-partners-search-btn">search</button>
                    </form>
                    <div class="fs-personal-partners-search-res">
                        <div class="fs-personal-partners-search-res-row">
                            <!--                            <h4>ԳՐՔԵՐ, ԼՐԱԳՐԵՐ, ՎԵՐԱՐՏԱԴՐԱՆԿԱՐՆԵՐ ԵՎ ՊՈԼԻԳՐԱՖԻԱԿԱՆ ԱՐՏԱԴՐՈՒԹՅԱՆ ԱՅԼ ԱՊՐԱՆՔՆԵՐ</h4>-->
                            <!--                            <h4>Կատեգորիաների ցանկը չի իդենտիֆիկացվել</h4>-->
                            <?php foreach ($categories as $category => $cat_val){ ?>
                            <?php
                                $partners = $user->getPartnersBayByCat(@$_GET['q'],$cat_val->id)->all();
                            ?>
                            <?php if(empty($partners)){ continue;}?>
                            <div class="fs-personal-link-el" style="padding-left:0px;padding-bottom:20px;">
                                <a style="font-size:20px;padding-left:0px;" href="/categories/<?php echo $cat_val->url;?>" >
                                    <?php
                                    if($_COOKIE['language'] != 'hy' ){
                                        $cat_val->name =  $cat_val->translation['name_' . $_COOKIE['language']];
                                    }
                                    echo $cat_val->name;
                                    ?>
                                </a>
                            </div>
                            <div class="fs-personal-partner-slider" style="max-height:120px;overflow:hidden;">

                                <?php foreach ($partners as $partner){ ?>
                                    <?php if(strpos($partner->categories,$cat_val->id.';') === false){ continue; } ?>
                                    <?php $disabled = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$partner->id])->andWhere(['status'=>4])->one();?>
                                    <div class="fs-all-companies-grid-el">
                                        <label class="fs-auth-remember-me" style="position:absolute;right:5px;top:2px;">
                                            <input class="disable_partner" <?php if($disabled){ echo 'checked';}?> value="<?php echo $partner->id;?>" type="checkbox">
                                            <span class="fs-auth-checkbox-imitation"></span>
                                            <span class="fs-auth-checkbox-label"><?=$GLOBALS['text']['__suspend__']?></span>
                                        </label>
                                        <a href="#"><img src="<?= $partner->image ? '/' . $partner->image : '/web/site/img/noimg.png' ?>" alt=""/></a>
                                        <div class="fs-all-company-info">
                                            <h3><a href="/company-details/<?= $partner->id ?>"><?= $partner->legal_name ?></a></h3>
                                            <?php if(!$disabled){ ?>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?=$GLOBALS['text']['__suspend__']?></span>
                                                </div>
                                            <?php } else { ?>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?=$GLOBALS['text']['__suspended__']?></span>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="fs-list-load-more-less">
                                <button type="button" class="show-more-btn show-more-btn__" onclick="showMore($(this))" data-more="<?=$GLOBALS['text']['__view_more__']?>" data-less="Փակել"><?=$GLOBALS['text']['__view_more__']?><i class="fs-icon-chevron"></i></button>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function showMore(el_) {

        el_.closest('.fs-personal-partners-search-res').find('.fs-personal-partner-slider').toggleClass('less_');
        if(el_.text() == '<?=$GLOBALS['text']['__view_more__']?>'){
            el_.text('Փակել').append('<i class="fs-icon-chevron" style="transform: translateY(-50%) rotateX(180deg);"></i>');
        } else {
            el_.text('<?=$GLOBALS['text']['__view_more__']?>').append('<i class="fs-icon-chevron" ></i>');
        }
    }
</script>
<style>
    .less_{
        max-height:100% !important;
    }
</style>
<?php
function isMobile_() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>