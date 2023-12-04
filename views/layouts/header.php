<?php

use app\models\FsCategories;
use app\models\FsUsers;
use app\models\FsNotifications;


function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>
<header class="fs-header tests" id="header">
    <div class="fs-container">
        <div class="fs-brand-panel">
            <!--            //here start -->
            <?php
            if (!isMobile()){
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
                ?>
                <ul class="fs-hidden-menu-list-wrapper-ul d-none"  >
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
                        <li class="fs-hidden-menu-list-wrapper">
                            <a data-level='1'
                               href="/categories/<?= $category->url ?>"><?= $_COOKIE['language'] ? ( $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']]) : $category->name ?>  <? if (count($category->children) > 0) { ?>
                                    <button type="button" class="fs-icon-chevron"></button><?php } ?></a>
                            <?= $categoryMenu ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php }  ?>
            <!--            //here end menu  -->
            <a href="/" class="fs-logo">
                <img src="/web/images/new-big-logo.webp" alt="" />
            </a>
            <?php if(!isMobile()){ ?>
            <button type="button" class="fs-nav-burger"><span></span></button>
            <?php } else { ?>
                <a href="#mmenu" class="fs-nav-burger-new"><span></span></a>
            <?php } ?>
            <div class="fs-search-block">
                <div class="fs-search-result-wrapper">
                    <div class="fs-search-result-block">
                     <div class="fs-search-result-block search-res">
                     </div>
                        <a href="#" id="serch_result_url" class="fs-search-all-results" ><?=$GLOBALS['text']['__show_all__']?></a>
                        <svg viewBox="0 0 100 100" class="fs-search-loader">
                            <defs>
                                <filter id="shadow">
                                    <feDropShadow dx="0" dy="0" stdDeviation="1.5"
                                                  flood-color="#fc6767"/>
                                </filter>
                            </defs>
                            <circle class="fs-loader-spinner" style="filter:url(#shadow);" cx="50" cy="50" r="45"/>
                        </svg>
                    </div>
                    <div class="fs-search-result-overlay"></div>
                </div>
                <input class="fs-search-input" type="text"  placeholder="<?php echo $GLOBALS['text']['__search_text_top_header__']?>" value="<?php echo @$_GET['q'];?>">
                <i class="fs-icon-search"></i>
            </div>
        </div>
        <div class="fs-action-panel" style="gap:1rem;">
            <div class="fs-mobile-search-block">
                <div class="fs-mobile-search-inner active">
                    <div class="fs-mobile-search-field">
                        <i class="fs-icon-search"></i>
                        <input type="text" class="search-m" value="<?php echo @$_GET['q'];?>" placeholder="<?php echo$GLOBALS['text']['__search_text_top_header__']?>">
                        <button class="fs-close-search-panel" type="button"><i class="fs-icon-close"></i></button>
                    </div>
                    <div class="fs-mobile-search-result-block-wrapper">
                        <div class="fs-mobile-search-result-block">

                        </div>
                        <a href="#" id="mobsearch" class="fs-mobile-search-show-more" ><?=$GLOBALS['text']['__show_all__']?></a>
                    </div>
                </div>
            </div>
            <button type="button" class="fs-mobile-search-btn fs-icon-search"></button>
            <ul class="fs-action-buttons">
                <li class="fs-action-button d-flex" data-role="authorization" style="min-width:max-content;gap:1rem">
                <?php   if(Yii::$app->fsUser->isguest) { ?>
                    <button class="fs-icon-user" style="color:black"></button>
                    <div>
                        <a href="/sign-in" class="fs-popover-sign-in"><?=$GLOBALS['text']['__login__']?></a>
                    </div>
                    <div>
                        <a href="">/</a>
                    </div>
                    <div>
                        <a href="/sign-up?model=buyer" class="fs-popover-sign-up"><?=$GLOBALS['text']['__to__register__']?></a>
                    </div>
                <?php } else { ?>
                   <?php $names = explode(' ', Yii::$app->fsUser->identity->name); ?>
                   <span class="fs-top-profile-abbr"><?=mb_strtoupper(mb_substr($names[0], 0, 1));?><?=mb_strtoupper(mb_substr($names[1], 0, 1));?></span>
                <?php } ?>
                        <div class="fs-authorization-popover">
                            <?php
                                if(Yii::$app->fsUser->isguest) {
                            ?>
                                <h4 class="fs-authorisation-popover-title"><?=$GLOBALS['text']['__welcome__']?></h4>
                                <div class="fs-authorisation-popover-buttons">
                                    <a href="/sign-up?model=buyer" class="fs-popover-sign-up"><?=$GLOBALS['text']['__to__register__']?></a>
                                    <a href="/sign-in" class="fs-popover-sign-in"><?=$GLOBALS['text']['__login__']?></a>
                                </div>
                            <?php } else { ?>
                                    <div class="fs-profile-popover-window">
                                        <div class="fs-profile-popover-head">
                                            <?php $names = explode(' ', Yii::$app->fsUser->identity->name); ?>
                                            <span class="fs-profile-abbr"><?=mb_strtoupper(mb_substr($names[0], 0, 1));?><?=mb_strtoupper(mb_substr($names[1], 0, 1));?></span>
                                            <h3 class="fs-popover-name"><?=Yii::$app->fsUser->identity->name;?></h3>
                                            <span class="fs-popover-email"><?=Yii::$app->fsUser->identity->email;?></span>
                                        </div>
                                        <div class="fs-profile-popover-body">
                                            <a href="/<?= Yii::$app->fsUser->identity->is_buyer == 1 ? 'personal' : 'supplier' ?>" class="fs-profile-popover-link showDesctop"><?=$GLOBALS['text']['__profile__popup__']?></a>
                                             <a href="/<?= Yii::$app->fsUser->identity->is_buyer == 1 ? 'site/mobile-personal' : 'site/mobile-supplier' ?>" class="fs-profile-popover-link showMobile"><?=$GLOBALS['text']['__profile__popup__']?></a>
                                            <a href="/site/logout/" class="fs-profile-popover-link"><?=$GLOBALS['text']['__profile__popup__exite_']?></a>
                                        </div>

                                    </div>
                            <?php } ?>
                        </div>
                </li>
                <li class="fs-user-button">
                    <span class="fs-user-label"><?=$GLOBALS['text']['__mypage__']?></span>
                    <div class="fs-personal-popover">
                    </div>
                </li>
                <? if(!Yii::$app->fsUser->isguest) {
                    $notifications = Yii::$app->fsUser->identity->notifications;
                    $notificationsAll = Yii::$app->fsUser->identity->allNotifications;
                    ?>
                    <li class="fs-action-button has-notification" data-fav-count="<?php echo count($notifications);?>"><button type="button" class="fs-icon-bell"></button></li>
                    <li class="fs-action-button header-favorite-button" data-fav-count="<?= count(Yii::$app->fsUser->identity->wishlist) ?>" title="<?= count(Yii::$app->fsUser->identity->wishlist) ?>"><a href="/<?= Yii::$app->fsUser->identity->is_buyer == 1 ? 'personal' : 'supplier' ?>-wishlist" class="fs-icon-heart"></a></li>
                    <li class="fs-action-button" id="orderListCountCont" data-prod-list="" data-prod-count="<?= count(Yii::$app->fsUser->identity->cart) ?>" title="<?= count(Yii::$app->fsUser->identity->cart) ?>"><a href="/cart" id="orderListCountContHREF" class="fs-icon-basket"></a></li>
                <? } ?>

            </ul>

            <?php if (!Yii::$app->fsUser->isGuest) { ?>
                <div class="fs-notification-window">
                    <div class="fs-notification-window-header">
                        <h4 class="fs-notification-window-title"><?=$GLOBALS['text']['__notif__popup_text_']?></h4>
                    </div>
                    <div class="fs-notification-window-body">
                        <div class="fs-notification-window-action-panel">
                            <button type="button" class="fs-show-unread"><span></span><?=$GLOBALS['text']['__notif__popup_first_button__']?></button>
                            <button type="button" class="fs-as-read"><?=$GLOBALS['text']['__notif__popup_second_button__']?></button>
                        </div>
                        <div class="fs-notification-tab-wrapper">
                            <div class="fs-notification-tabs">
                                <button class="fs-notification-tab active" data-index="1"><?=$GLOBALS['text']['__notif__popup_tab_1__']?></button>
                                <button class="fs-notification-tab" data-index="2"><?=$GLOBALS['text']['__notif__popup_tab_2__']?></button>
                            </div>
                            <div class="fs-notification-list-wrapper active" data-index="1">
                                <?
                                if(count($notificationsAll) > 0) { $ct = 0; ?>
                                    <ul class="fs-notification-list" data-back="new">
                                        <? foreach($notificationsAll as $notification) {
                                            if($notification->type == 2){
                                                continue;
                                            }
                                            $ct++;
                                            $sender = FsUsers::findOne($notification->sender_id);
                                            $recipient = FsUsers::findOne($notification->recipient_id);
                                            $class=""; if($notification->status ==0){$class = 'new-notification';} ?>
                                        <li class="fs-notification-list-el <?php echo $class;?>" data-id="<?=$notification->id?>">
                                            <label class="fs-notification-check">
                                                <input type="checkbox"/>
                                                <span class="fs-notification-check-imitation"></span>
                                            </label>
                                        <a href="<?= $notification->url ?>" class="fs-notification-link">
                                            <div class="fs-notification-thumbnail">
                                                <img src="/<?= $recipient->image ?>" alt="" />
                                            </div>
                                            <div class="fs-notification-data">
                                                <h4><strong><?= $sender->legal_name ?></strong> <?= $notification->message ?></h4>
                                                <time class="fs-notification-date"><?= $notification->created_at ?></time>
                                            </div>
                                        </a>
                                        </li>
                                        <? } ?>
                                        <?php if(!$ct){?>
                                            <div class="fs-notification-window-empty">
                                                <i class="fs-icon-bell"></i>
                                                <span><?=$GLOBALS['text']['__no_nots__']?></span>
                                            </div>
                                            <?php } ?>
                                    </ul>
                                    <? } else { ?>
                                    <div class="fs-notification-window-empty">
                                        <i class="fs-icon-bell"></i>
                                        <span><?=$GLOBALS['text']['__no_nots__']?></span>
                                    </div>
                                <? } ?>
                            </div>
                            <div class="fs-notification-list-wrapper" data-index="2">
                                <?
                                if(count($notificationsAll) > 0) {  $ct =0; ?>
                                    <ul class="fs-notification-list" data-back="new">
                                        <? foreach($notificationsAll as $notification) {
                                            if($notification->type ==1){
                                                continue;
                                            }
                                            $ct++;
                                            $sender = FsUsers::findOne($notification->sender_id);
                                            $recipient = FsUsers::findOne($notification->recipient_id);
                                            $class=""; if($notification->status ==0){$class = 'new-notification';} ?>
                                            <li class="fs-notification-list-el <?php echo $class;?>" data-id="<?=$notification->id?>">
                                                <label class="fs-notification-check">
                                                    <input type="checkbox"/>
                                                    <span class="fs-notification-check-imitation"></span>
                                                </label>
                                                <a href="<?= $notification->url ?>" class="fs-notification-link">
                                                    <div class="fs-notification-thumbnail">
                                                        <img src="/<?= $recipient->image ?>" alt="" />
                                                    </div>
                                                    <div class="fs-notification-data">
                                                        <h4><strong><?= $sender->legal_name ?></strong> <?= $notification->message ?></h4>
                                                        <time class="fs-notification-date"><?= $notification->created_at ?></time>
                                                    </div>
                                                </a>
                                            </li>
                                        <? } ?>
                                    </ul>
                                    <?php if(!$ct){?>
                                        <div class="fs-notification-window-empty">
                                            <i class="fs-icon-bell"></i>
                                            <span><?=$GLOBALS['text']['__no_nots__']?></span>
                                        </div>
                                    <?php } ?>
                                <? } else { ?>
                                    <div class="fs-notification-window-empty">
                                        <i class="fs-icon-bell"></i>
                                        <span><?=$GLOBALS['text']['__no_nots__']?></span>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="basket-block d-flex">
                <div>
                    <div class="position-relative">
                        <a><i class="fs-icon-heart"></i></a>
                        <a class="position-absolute wishlist_products_counter" style="">
                            <span>0</span>
                        </a>
                    </div>
                </div>
                <div class="">
                    <div class="d-flex">
                        <div class="position-relative">
                            <i class="fs-icon-basket"></i>
                            <a class="position-absolute wishlist_products_counter" style="">
                                <span>0</span>
                            </a>
                        </div>
                        <span class="price-span">
                            <bdi>0<span class="">֏</span></bdi>
                        </span>
                    </div>
                    <div class="d-none">
                        <div class="">
                            <div class="">
                                <p class="">Զամբյուղում ապրանքներ չկան:</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="fs-lang-selected-block" tabindex="0">
                    <img src="/web/site/assets/media/images/<?= $_COOKIE['language'] ?>.jpg" alt="" />
                </div>
                <div class="fs-lang-list-wrapper">
                    <ul class="fs-lang-list">
                        <?php $langs = ['en', 'hy', 'ru']; foreach ($langs as $lang): if ($lang != $_COOKIE['language']) {?>
                            <li class="fs-lang-list-item">
                                <a href="/site/switch-language?lang=<?= $lang ?>"><img src="/web/site/assets/media/images/<?= $lang ?>.jpg" alt="<?= $lang ?>"></a>
                            </li>
                        <?php } endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .owl-carousel .fs-open-prod-window{
        display:none !Important;
    }
 /*   #mmenu,#mmenu *{
        max-width:325px;
    }
    body {
        background-color: #fff;
        position: relative;
        -webkit-text-size-adjust: none;
    }*/
    .fs-nav-burger-new {
        width: 3.2rem;
        height: 3.2rem;
        position: relative;
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
        margin-right: 2.4rem;
        font-family: "Mardoto",sans-serif;
    }
    .fs-nav-burger-new span {
        display: block;
        width: 2.2rem;
        height: 0.2rem;
        border-radius: 0.3rem;
        background-color: #9B958C;
        -webkit-transition: background-color 240ms;
        transition: background-color 240ms;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .fs-nav-burger-new span:after, .fs-nav-burger-new span:before {
        content: "";
        position: absolute;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 0.3rem;
        background-color: #9B958C;
        -webkit-transition: background-color 240ms;
        transition: background-color 240ms;
    }
    .fs-nav-burger-new span:before {
        bottom: -0.7rem;
    }
    .fs-nav-burger-new span:after {
        top: -0.7rem;
    }
    nav:not(.mm-menu) {
        display: none;
    }
</style>