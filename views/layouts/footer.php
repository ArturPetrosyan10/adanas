<?php

use app\models\FsCategories;
use app\models\FsPages;
?>
 <?php if (isMobile()){ ?>
                    <?php function generateCategoryMenu($parentId = null) {
                        $categories = FsCategories::find()->where(['parent_id' => $parentId])->andWhere(['status' => 1])->all();
                        if (count($categories) == 0) {
                            return '';
                        }
                        $menuHtml = '';
                        $menuHtml .= '<ul>';
                        foreach ($categories as $category) {
                            $menuHtml .= '<li>';
                            $menuHtml .= '<a style="display:inline-block;" href="/categories/';
                            $menuHtml .= $category->url;
                            $menuHtml .= '">';
                            $menuHtml .= $_COOKIE['language'] ? ($_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']]) : $category->name;
                            $menuHtml .= '</a>';

                            $menuHtml .= generateCategoryMenu($category->id); // Recursive call to generate subcategory menu
                            $menuHtml .= '</li>';
                        }
                        $menuHtml .= '</ul>';
                        return $menuHtml;
                    }
                    ?>
                     <link rel="stylesheet" href="/web/css/la.css">
                    <link type="text/css" rel="stylesheet" href="/web/css/mmenu.css?v3" />

                    <nav  id="mmenu">
                        <ul>
                            <li>
                                  <span> <img src="/web/site/assets/media/images/<?= $_COOKIE['language'] ?>.jpg" alt="" /></span>
                                <ul>
                                    <?php $langs = ['en', 'hy', 'ru']; foreach ($langs as $lang): if ($lang != $_COOKIE['language']) {?>
                                        <li class="fs-lang-list-item">
                                            <a href="/site/switch-language?lang=<?= $lang ?>"><img src="/web/site/assets/media/images/<?= $lang ?>.jpg" alt="<?= $lang ?>"></a>
                                        </li>
                                    <?php } endforeach; ?>
                                </ul>
                            </li>


                        <?php
                        if(Yii::$app->fsUser->identity) {
                            $cats = Yii::$app->fsUser->identity->categories;
                            if ($cats) {
                                $cats = explode(';', $cats);
                            }
                            $cats = FsCategories::find()->where(['parent_id' => null])->andWhere(['id'=>$cats])->andWhere(['status' => 1])->all();
                        } else {
                            $cats = FsCategories::find()->where(['parent_id' => null])->andWhere(['status' => 1])->all();
                        }
                        foreach ($cats as $category):  $categoryMenu = generateCategoryMenu($category->id); ?>
                            <li>
                                <a  style="display:inline-block;"
                                   href="/categories/<?= $category->url ?>"><?= $_COOKIE['language'] ? ( $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']]) : $category->name ?>  <? if (count($category->children) > 0) { ?>

                                    <? } ?></a>
                                <?= $categoryMenu ?>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </nav>
                <?php } ?>
<!--for footer test style='background-image:url("/web/images/test-footer.png"); background-repeat:no-repeat; background-size:cover;'rgba(0,0,0,.84);-->
<footer class="fs-footer"  >
    <div class="fs-footer-top-panel">
        <div class="fs-container">
            <div class="fs-footer-col">
                <a href="#" class="fs-footer-logo"><img src="/web/site/assets/media/images/fos-logo.svg" alt=""/></a>
                <p class="fs-copyright">Copyright © 2023 Fos.am</p>
            </div>
            <div class="fs-footer-col">
                <h3 class="fs-footer-col-title"><?=$GLOBALS['text']['_footer_title_1_']?><span></span></h3>
                <ul class="fs-footer-col-list">
                    <?php
                    $pages = FsPages::find()->where(['status'=>1])->all();
                    $url_police = '';
                    foreach ($pages as $page):
                        if($page->id==6){
                            $url_police = $page->url;
                            continue;
                        }
                        ?>
                        <li class="fs-footer-col-list-item">
                            <a href="/page/<?= $page->url ?>">
                                <?= $page['page_name_'.$GLOBALS['lang_']] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="fs-footer-col-list-item"><a href="/contacts"><?=$GLOBALS['text']['__page__contact__']?></a></li>
                </ul>
            </div>
            <div class="fs-footer-col">
                <h3 class="fs-footer-col-title"><?=$GLOBALS['text']['_footer_title_2_']?><span></span></h3>
                <ul class="fs-footer-col-list">
                    <?php if (Yii::$app->fsUser->isguest) { ?>
                        <li class="fs-footer-col-list-item"><a href="/sign-up?model=buyer"><?=$GLOBALS['text']['__like__buyer__']?></a>
                        </li>
                        <li class="fs-footer-col-list-item"><a href="/sign-up?model=seller"><?=$GLOBALS['text']['__like__seller__']?></a></li>
                    <?php } else { ?>
                    <li class="fs-footer-col-list-item"><a href="/corporate"><?=$GLOBALS['text']['__comps__']?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="fs-footer-col">
                <h3 class="fs-footer-col-title"><?=$GLOBALS['text']['__conts__']?><span></span></h3>
                <ul class="fs-footer-col-list">
                    <li class="fs-footer-col-list-item"><a target="_blank" href="https://www.google.com/maps/search/<?=$GLOBALS['text']['__contact_address__']?>/@40.2006445,44.4943933,17z/data=!3m1!4b1?entry=ttu"><?=$GLOBALS['text']['__contact_address__']?></a></li>
                    <li class="fs-footer-col-list-item"><a href="tel:<?=$GLOBALS['text']['__contact__phone__']?>"><?=$GLOBALS['text']['__contact__phone__']?></a></li>
                    <li class="fs-footer-col-list-item"><a href="mailto:<?=$GLOBALS['text']['__contact__email__']?>"><?=$GLOBALS['text']['__contact__email__']?></a></li>
                </ul>
            </div>
            <div class="fs-footer-partner-col">
                <img src="/web/site/assets/media/images/info-expert-logo.svg" alt=""/>
            </div>
        </div>
    </div>
    <div class="fs-footer-bottom-panel">
        <div class="fs-container">
            <ul class="fs-footer-social-links">
                <li class="fs-footer-social-link">
                    <a target="_blank" href="https://www.facebook.com/infoexpert.am"><img
                            src="/web/site/assets/media/images/facebook.png" alt=""></a>
                </li>
                <li class="fs-footer-social-link">
                    <a target="_blank" href="https://www.instagram.com/infoexpert.am"><img
                            src="/web/site/assets/media/images/instagram.png" alt=""></a>
                </li>
                <li class="fs-footer-social-link">
                    <a target="_blank" href="https://www.linkedin.com/infoexpert.am"><img
                            src="/web/site/assets/media/images/linkedin.png" alt=""></a>
                </li>
            </ul>
            <?php if(@$url_police){ ?>
                <a href="/page/<?php echo $url_police;?>" class="policy-link"><?=$GLOBALS['text']['_footer_title_4_']?></a>
            <?php } ?>
        </div>
    </div>
<!--                <?php
/*                if (!isMobile()){
                function generateCategoryMenu($parentId = null) {
                    $categories = FsCategories::find()->where(['parent_id' => $parentId])->andWhere(['status' => 1])->all();
                    if (count($categories) == 0) {
                        return '';
                    }
                      $menuHtml = '';
                    $menuHtml .= '<div class="fs-hidden-menu-sublist-wrapper"><button type="button" class="fs-hidden-menu-sublist-back"><i class="fs-icon-chevron"></i><span>Step Back</span></button><ul class="fs-hidden-menu-sublist">';
                    foreach ($categories as $category) {
                        $menuHtml .= '<li class="fs-hidden-menu-sublist-el">';
                        $menuHtml .= '<a data-level="2" class="fs-hidden-menu-title" href="/categories/';
                        $menuHtml .= $category->url;
                        $menuHtml .= '">';
                        $menuHtml .= $_COOKIE['language'] ? ($_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']]) : $category->name;
                        $menuHtml .= count($category->children) > 0 ? '<button type="button" class="fs-icon-chevron"></button>' : " ";
                        $menuHtml .= '</a>';

                        $menuHtml .= generateCategoryMenu($category->id); // Recursive call to generate subcategory menu
                        $menuHtml .= '</li>';
                    }
                    $menuHtml .= '</ul>';
                    $menuHtml .= '</div>';
                    return $menuHtml;
                }
                */?>
    <div class="fs-hidden-menu">
        <div class="fs-hidden-menu-inner">
            <div class="fs-hidde-menu-container">
                <div class="fs-hidden-menu-top-panel">
                    <div class="fs-hidden-menu-lang-block">
                        <div class="fs-lang-block">
                            <div class="fs-lang-selected-block" tabindex="0">
                                <img src="/web/site/assets/media/images/arm.jpg" alt="Հայ"/>
                            </div>
                            <div class="fs-lang-list-wrapper">
                                <ul class="fs-lang-list">
                                    <li class="fs-lang-list-item">
                                        <a href="/switch.php?lang=eng"><img src="/web/site/assets/media/images/en.jpg"
                                                                            alt="Eng"></a>
                                    </li>
                                    <li class="fs-lang-list-item">
                                        <a href="/switch.php?lang=rus"><img src="/web/site/assets/media/images/rus.jpg"
                                                                            alt="Рус"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    <ul class="fs-hidden-menu-list-wrapper-ul" >
                        <?php
/*                        if(Yii::$app->fsUser->identity) {
                            $cats = Yii::$app->fsUser->identity->categories;
                            if ($cats) {
                                $cats = explode(';', $cats);
                            }
                            $cats = FsCategories::find()->where(['parent_id' => null])->andWhere(['id'=>$cats])->andWhere(['status' => 1])->all();
                         } else {
                            $cats = FsCategories::find()->where(['parent_id' => null])->andWhere(['status' => 1])->all();
                        }
                          foreach ($cats as $category):  $categoryMenu = generateCategoryMenu($category->id); */?>
                            <li class="fs-hidden-menu-list-wrapper">
                                <a data-level='1'
                                   href="/categories/<?php /*= $category->url */?>"><?php /*= $_COOKIE['language'] ? ( $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']]) : $category->name */?>  <?/* if (count($category->children) > 0) { */?>
                                        <button type="button" class="fs-icon-chevron"></button><?/* } */?></a>
                                <?php /*= $categoryMenu */?>
                            </li>
                        <?php /*endforeach; */?>
                    </ul>
            </div>
        </div>
    </div>

                --><?php /*}  */?>


    <div class="fs-authorization-modal">
        <div class="fs-authorization-modal-body">
            <button type="button" class="fs-authorization-modal-close fs-icon-close"></button>
            <img src="/web/site/assets/media/images/fos-logo.svg" alt=""/>
            <h3 class="fs-authorization-modal-label"><?=$GLOBALS['text']['__welcome__']?></h3>
            <h5 class="fs-authorization-user-name">Հարգելի Անուն Ազգանուն</h5>
            <p class="fs-authorization-modal-message">Համակարգի ադմինիստրատորի կողմից տվյալների հաստատումից անմիջապես հետո կարող եք սկսել աշխատել համակարգում</p>
            <a href="#" class="fs-authorization-modal-link">OK</a>
        </div>
    </div>
    <div class="fs-added-product-notification">
        <p><?=$GLOBALS['text']['__add_cart__']?></p>
    </div>

</footer>

  
<script src="/web/site/assets/source/js/libs_n_plugins/jquery/jquery.min.js?v3"></script>
<script src="/web/site/assets/source/js/mmenu.js?v3"></script>

<script>
    $('.fs-hidden-menu-close-btn').click(function () {
        $(this).closest('.fs-hidden-menu-sublist-wrapper').hide();
    });
    <?php if(isMobile()){ ?>
     new Mmenu(document.querySelector("#mmenu"),{
         navbar: {
             title: "Բաժիններ"
         },
         offCanvas: {
            clone: true
        }

     });
    <?php } else { ?>
    // $(document).on('click', 'a[href^="#"]', function(event) {
    //     event.preventDefault();
    //     $('html, body').animate({
    //         scrollTop: $($.attr(this, 'href')).offset().top
    //     }, 500);
    // });
    <?php } ?>
</script>
<style>
    .mm-fixed-bottom {
  -webkit-transition: none 0.0s ease;
  -moz-transition: none 0.0s ease;
  -ms-transition: none 0.0s ease;
  -o-transition: none 0.0s ease;
}
</style>
<script src="/web/site/assets/source/js/libs_n_plugins/owl_carousel/owl.carousel.min.js?v3"></script>
<!--<script src="/web/site/assets/source/js/libs_n_plugins/video/video.min.js?v3"></script>-->
<script
        src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
        integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY="
        crossorigin="anonymous"></script>
<script src="/web/site/assets/source/js/libs_n_plugins/tel/intlTelInput-jquery.min.js?v3"></script>
<script src="/web/site/assets/source/js/libs_n_plugins/tel/intlTelInput.min.js?v3"></script>
<script src="/web/site/assets/source/js/libs_n_plugins/mask/jquery.mask.min.js?v3"></script>
<script src="/web/js/bootstrap-datepicker.min.js"></script>
<script src="/web/js/bootstrap-datepicker.hy.min.js"></script>
<script src="/web/site/assets/source/js/script.js?v=3"></script>
<script src="/web/site/sadmin/libs/ajax_lib.js??v3"></script>
<script src="/web/site/sadmin/js/t_lib.js??v3"></script>


