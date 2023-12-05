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
    <div class="fs-container d-flex justify-content-between">
        <ul>
            <li><h4><?= $GLOBALS['text']['__contact_us__'] ?></h4></li>
            <li>
                <a href="#">
                    <span>
                        <i class="fa fa-phone"></i>
                        <span> +374 77 55 66 77 </span>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span>
                        <i class="fa fa-phone"></i>
                        <span>info@adanas.am</span>
                    </span>
                </a>
            </li>
            <li>
                <span>Իսակովի 48/2</span>
            </li>
        </ul>
        <ul>
            <li><span><?= $GLOBALS['text']['_footer_title_1_'] ?></span></li>
        </ul>
        <ul>
            <li><span><?= $GLOBALS['text']['__my__account__'] ?></span></li>
        </ul>
        <ul>
            <li>
                <span><i class="fa fa-instagram"></i></span>
            </li>
            <li><span><i class="fa fa-facebook"></i></span></li>
        </ul>
    </div>
    <div class="fs-container d-flex justify-content-between" style="margin-top:50px;">
        <div>
            <p><img class="alignnone wp-image-828 size-full" src="https://adanas.am/wp-content/uploads/2023/08/Adanas-logo-140x32-1.png" alt="" width="140" height="32"></p>
        </div>
        <div>
            <p>Copyright © 2023 Adanas | All Rights Reserved | Website by&nbsp;<a href="https://dimark.am/">Dimark</a></p>
        </div>
        <div >
            <p><img  src="https://adanas.am/wp-content/uploads/2023/02/payment.png" alt="" width="179" height="32"></p>
        </div>
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


