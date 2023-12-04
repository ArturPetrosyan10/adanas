<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isset($_GET['mobile'])){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['__basket__'] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-cart-empty-block">
        <div class="fs-container">
            <h4 class="fs-cart-empty-title"><?= $GLOBALS['text']['__empty__basket__'] ?></h4>
            <p class="fs-cart-empty-description">Lոռեմ իպսում դոլոռ սիթ ամեթ լաբոռե լաթինե քուո եի թե լաթինե քուո եի</p>
            <a class="fs-cart-empty-return" href="/site/"><?= $GLOBALS['text']['__go__back__'] ?></a>
        </div>
    </div>
</main>
<div class="fs-dialog" id="basket-remove-dialog">
    <div class="fs-dialog-body">
        <p><?= $GLOBALS['text']['__want__to__delete__product__'] ?>:</p>
        <div class="fs-dialog-btn-wrapper">
            <button type="button" data-answere="yes"><?= $GLOBALS['text']['__yes__'] ?></button>
            <button type="button" data-answere="no"><?= $GLOBALS['text']['__no__'] ?></button>
        </div>
    </div>
</div>
<div class="fs-modal" id="basket-remove-el-dialog">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text"><?= $GLOBALS['text']['__delete__the__template__'] ?></p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost" data-action="yes" type="button"><?= $GLOBALS['text']['__yes__'] ?></button>
            <button class="fs-modal-btn filled" data-action="no" type="button"><?= $GLOBALS['text']['__no__'] ?></button>
        </div>
    </div>
</div>
<div class="fs-modal" id="basket-submit-modal">
    <div class="fs-modal-body">
        <!--        ToDo: Thom, place here order count-->
        <p class="fs-modal-body-text"><?= $GLOBALS['text']['__text__for__approval__'] ?> 0 <?= $GLOBALS['text']['__orders__'] ?>։</p>
        <div class="fs-modal-body-btn-group">
            <button class="fs-modal-btn ghost" data-action="yes" type="button"><?= $GLOBALS['text']['__yes__'] ?></button>
            <button class="fs-modal-btn filled" data-action="no" type="button"><?= $GLOBALS['text']['__no__'] ?></button>
        </div>
    </div>
</div>