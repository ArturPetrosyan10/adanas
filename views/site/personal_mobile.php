<?php $page = 'personal';?>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <a href="/personal" class="fs-mob-to-back"><span class="fs-icon-chevron"></span><?= $GLOBALS['text']["__profile__popup__"] ?></a>
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="http://<?= $_SERVER['SERVER_NAME']; ?>/"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']["__profile__popup__"] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <? include("personal_menu_showed.php"); ?>
            
        </div>
    </div>
</main>
<?
if ($user['verified'] != 1 && isset($_SESSION['welcome_showed']) === false) {

    $_SESSION['welcome_showed'] = true;

    ?>
    <div class="fs-welcome-popup">
        <div class="fs-welcome-popup-body">
            <button type="button" class="close-welcome-popup fs-icon-close"></button>
            <img src="http://<?= $_SERVER['SERVER_NAME']; ?>/assets/media/images/fos-logo.svg" alt=""/>
            <h3><?= $GLOBALS['text']["__WELCOME1__"] ?></h3>
            <h5><?= $GLOBALS['text']["__dear__"] ?> <?= $user['name']; ?></h5>
            <p><?= $GLOBALS['text']["__can__start__working__text1__"] ?>
            </p>
            <button type="button" class="ok-button">ok</button>
        </div>
    </div>
    <?
}

?> 