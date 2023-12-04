<?php
use app\models\FsTexts;
use app\models\FsPages;
use app\models\FsParams;
use app\models\FsMeasurements;

/*    echo '<pre>';
//    $model = new FsTexts();
//    $model->slug = '__not__include__taxes__';
//    $model->text_am = 'Գինը չի ներառում հարկերը';
//    $model->text_ru = 'Цена не включает налоги';
//    $model->text_en = 'Price does not include taxes';
//    var_dump($model->save());
//    $change = FsTexts::findOne(['text_am'=>'Սույն էլեկտրոնային առևտրային հարթակը հանդիսանում է']);test
//    $change = FsMeasurements::findOne(1);
    $change = FsParams::findOne(54);
//    $change->name = 'լիտր';
    $change->name_ru = 'Золотой';
    $change->name_en = 'Golden';
//    $change->slug = '__commerce__platform__is__text__';
//    var_dump($change->save());
    var_dump($change);
    var_dump($GLOBALS['text']);
    die;
*/?>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="/"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['_footer_title_1_'] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-about-us-wrapper">
        <div class="fs-container">
            <div class="fs-about-us-content">
                <h1 class="fs-about-us-title"><?= $GLOBALS['text']['__page__who__'] ?></h1>
                <div class="fs-about-us-text">
                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի
                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե. ուսու ֆեուգիաթ դելեծթուս ծոռռումպիթ եթ.
                        իիսքուե վեռիթուս անթիոպամ եսթ նե,
                    </p>
                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի
                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ թոռքուաթոս դուո նե
                    </p>
                    <p>Lոռեմ իպսում դոլոռ սիթ ամեթ, լաբոռե լաթինե քուո եի. թե մեա եվեռթի ոծուռռեռեթ դեֆինիթիոնեմ, վեռի
                        ֆաբուլաս ռաթիոնիբուս աթ մեի. եիռմոդ Ինֆոէքսպերտ։
                    </p>
                </div>
            </div>
            <div class="fs-about-us-video">
                <video
                    id="my-video"
                    class="video-js"
                    controls
                    preload="auto"
                    width="640"
                    height="264"
                    poster="../web/site/assets/media/video/about-us.jpg"
                    data-setup="{}"
                >
                    <source src="../web/site/assets/media/video/about-us.mp4" type="video/mp4"/>
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a
                        web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank"
                        >supports HTML5 video</a
                        >
                    </p>
                </video>
            </div>
        </div>
        <div class="fs-how-it-works">
            <div class="fs-container">
                <h3 class="fs-how-it-works-title"><?= $GLOBALS['text']['__page__how__'] ?></h3>
                <div class="fs-how-it-works-grid">
                    <div class="fs-how-it-works-grid-el">
                        <h4 class="fs-how-it-works-grid-el-title"><?= $GLOBALS['text']['__registration__'] ?></h4>
                        <p class="fs-how-it-works-desc">Գրանցվիր կայքում Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո
                            ինվենիռե
                        </p>
                        <span class="fs-how-it-works-icon">
                  <i class="fs-icon-chevron"></i>
                  <i class="fs-icon-chevron"></i>
                  </span>
                    </div>
                    <div class="fs-how-it-works-grid-el">
                        <h4 class="fs-how-it-works-grid-el-title">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>
                        <p class="fs-how-it-works-desc">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե</p>
                        <span class="fs-how-it-works-icon">
                  <i class="fs-icon-chevron"></i>
                  <i class="fs-icon-chevron"></i>
                  </span>
                    </div>
                    <div class="fs-how-it-works-grid-el">
                        <h4 class="fs-how-it-works-grid-el-title">Lոռեմ իպսում դոլոռ սիթ ամեթ</h4>
                        <p class="fs-how-it-works-desc">Lոռեմ իպսում դոլոռ սիթ ամեթ, դոմինգ գռաեծո ինվենիռե գռաեծո
                            ինվենիռե նիռե
                        </p>
                        <span class="fs-how-it-works-icon">
                  <i class="fs-icon-chevron"></i>
                  <i class="fs-icon-chevron"></i>
                  </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="fs-provider-block">
            <div class="fs-container">
                <h2 class="fs-provider-block-title"><?= $GLOBALS['text']["__connected__providers__"] ?></h2>
            </div>
            <div class="fs-provider-list owl-carousel owl-theme">
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider1.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider2.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider3.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider4.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider5.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider6.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider7.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider8.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider9.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider10.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider11.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider12.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider13.jpg" alt=""/>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-provider-list-el">
                        <img src="../web/site/assets/media/images/providers/provider14.jpg" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>