<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isset($_GET['mobile'])){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el">Lոռեմ իպսում դոլոռ</li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <div class="fs-personal-aside">
                <div class="fs-personal-tabulation">
                    <div class="fs-personal-tab-head">
                        <a href="/site/personal/" ><?= $GLOBALS['text']["__buyer__"] ?></a>
                        <a href="/site/supplier/" ><?= $GLOBALS['text']["__seller__"] ?></a>
                    </div>
                    <div class="fs-personal-tab-body">
                        <div class="fs-personal-tab-el" data-target="1">
                            <ul class="fs-personal-link-group">
                                <li style="display: none;" class="fs-personal-link-el active"><a href="/site/personal/reportlist/"><?= $GLOBALS['text']["__my__list__"] ?></a><span>+10</span></li>
                                <li class="fs-personal-link-el "><a href="/site/supplier/processing/"><?= $GLOBALS['text']["__received__orders__"] ?>
                                    </a>
                                </li>
                                <li class="fs-personal-link-el "><a href="/site/supplier/dealers/"><?= $GLOBALS['text']["__partners__"] ?></a></li>
                                <li class="fs-personal-link-el "><a href="/site/supplier/workbook/"><?= $GLOBALS['text']["__contact_persons__"] ?></a></li>
                                <li class="fs-personal-link-el "><a href="/site/supplier/offers/"><?= $GLOBALS['text']["__sales__"] ?></a></li>
                                <li class="fs-personal-link-el "><a href="/site/supplier/requests/">Ստացված հայտեր</a></li>
                                <li class="fs-personal-link-el "><a href="/site/supplier/wishlist/"><?= $GLOBALS['text']["__preferred_products_services__"] ?></a> </li>
                                <li class="fs-personal-link-el "><a href="/site/supplier/"><?= $GLOBALS['text']["__company_info__"] ?></a></li>
                                <li class="fs-personal-link-el"><a href="/site/logout/"><?= $GLOBALS['text']["__exit_system__"] ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fs-personal-body">
                <div class="fs-personal-name-row" data-license="Լիցենզիայի ավարտ 0 օր">Դավիթ Ավետիսյան</div>
                <div class="fs-personal-list-wrapper">
                    <h1 class="fs-personal-list-title"><?= $GLOBALS['text']["__favorite__list__products__"]?></h1>
                    <p class="fs-personal-list-select-category"><?= $GLOBALS['text']["__favorites_text__"] ?> </p>
                    <div class="fs-personal-list-tab-head">
                        <button data-index="1" type="button" class="fs-personal-tab-button active"><?= $GLOBALS['text']["__prods__services__"] ?></button>
                        <button data-index="2" type="button" class="fs-personal-tab-button"><?= $GLOBALS['text']["__comps__"] ?></button>
                    </div>
                    <div class="fs-personal-select-category">
                        <div class="fs-personal-select-row">
                            <div class="fs-multi-dropdown">
                                <input type="hidden" value="">
                                <div class="fs-multi-dropdown-selected-variants empty"
                                     data-empty-message="<?= $GLOBALS['text']["__choose__categories__"]?>">
                                    <button type="button" class="fs-multi-dropdown-add-button fs-icon-close"></button>
                                </div>
                                <div class="fs-multi-dropdown-list">
                                    <ul class="fs-multi-dropdown-list-wrapper">
                                        <li class="fs-multi-dropdown-list-el" data-value="01"><?= $GLOBALS['text']["__food__"]?></li>
                                        <li class="fs-multi-dropdown-list-el" data-value="02"><?= $GLOBALS['text']["__household__appliances__"]?></li>
                                        <li class="fs-multi-dropdown-list-el" data-value="03"><?= $GLOBALS['text']["__electrical__engineering__"]?></li>
                                        <li class="fs-multi-dropdown-list-el" data-value="04"><?= $GLOBALS['text']["__food__"]?>2</li>
                                        <li class="fs-multi-dropdown-list-el" data-value="05"><?= $GLOBALS['text']["__household__appliances__"]?>2</li>
                                        <li class="fs-multi-dropdown-list-el" data-value="06"><?= $GLOBALS['text']["__electrical__engineering__"]?>2</li>
                                        <li class="fs-multi-dropdown-list-el" data-value="07"><?= $GLOBALS['text']["__food__"]?>3</li>
                                        <li class="fs-multi-dropdown-list-el" data-value="08"><?= $GLOBALS['text']["__household__appliances__"]?>3</li>
                                        <li class="fs-multi-dropdown-list-el" data-value="09"><?= $GLOBALS['text']["__electrical__engineering__"]?>3</li>
                                    </ul>
                                </div>
                            </div>
                            <button type="button" id="filter"><?= $GLOBALS['text']["__filter__"] ?></button>
                        </div>
                    </div>
                    <div class="fs-personal-page-tab-result active" data-index="1">
                        <div class="fs-personal-list-category-row">
                            <h3 class="fs-personal-list-category-title"><?= $GLOBALS['text']["__food__"]?></h3>
                            <div class="fs-min-product-slider-wrapper">
                                <div class="fs-min-product-slider">
                                    <div class="fs-product-card fs-new-product" data-sale="-90%" data-new="Նոր">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?> լոռեմ իպսում լոռեմ իպսում լոռեմ
                                            իպսում
                                        </h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-prod-page-read-more-btn">
                                    <button type="button">Տեսնել ավելին<i class="fs-icon-chevron"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="fs-personal-list-category-row">
                            <h3 class="fs-personal-list-category-title">Կատեգորիա 2</h3>
                            <div class="fs-min-product-slider-wrapper">
                                <div class="fs-min-product-slider">
                                    <div class="fs-product-card fs-new-product" data-sale="-90%" data-new="Նոր">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?> լոռեմ իպսում լոռեմ իպսում լոռեմ
                                            իպսում
                                        </h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                    <div class="fs-product-card">
                                        <div class="fs-product-thumbnail-wrapper">
                                            <img src="/web/site/assets/media/images/product-example.jpg"
                                                 class="fs-product-thumbnail" alt=""/>
                                            <a href="#" class="fs-open-prod-window"><?= $GLOBALS['text']["__view__"] ?></a>
                                        </div>
                                        <button type="button" class="fs-product-add-to-fav fs-icon-heart"></button>
                                        <h3 class="fs-product-name"><?= $GLOBALS['text']["__product__Name__"]?></h3>
                                        <a class="fs-product-category" href="#"><?= $GLOBALS['text']["__organization__Name__"]?> անվանում
                                            անվանում</a>
                                        <span class="fs-product-current-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>/<?= $GLOBALS['text']["__PIECE__"]?>">800 000</span>
                                        <span class="fs-product-old-price" data-price-cur="<?= $GLOBALS['text']["__dr__"]?>">8 000 000</span>
                                        <div class="fs-product-action-block">
                                            <div class="fs-product-count-calc">
                                                <button type="button" class="fs-product-count-btn fs-icon-minus"
                                                        data-action="minus"></button>
                                                <input type="text" readonly class="fs-product-count" value="1"/>
                                                <button type="button" class="fs-product-count-btn fs-icon-plus"
                                                        data-action="plus"></button>
                                            </div>
                                            <button type="button" class="fs-product-add-to-cart fs-icon-basket"
                                                    data-label="<?= $GLOBALS['text']["__basket__"]?>"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fs-personal-page-tab-result" data-index="2">
                        <div class="fs-personal-list-category-row">
                            <h3 class="fs-personal-list-category-title"><?= $GLOBALS['text']["__food__"]?></h3>
                            <div class="fs-min-category-slider-wrapper">
                                <div class="fs-min-category-slider">
                                    <div class="fs-all-companies-grid-el">
                                        <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                        <div class="fs-all-company-info">
                                            <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                            <div class="fs-registered-message">
                                                <i class="fs-icon-check"></i>
                                                <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-all-companies-grid-el">
                                        <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                        <div class="fs-all-company-info">
                                            <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                            <div class="fs-registered-message">
                                                <i class="fs-icon-check"></i>
                                                <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-all-companies-grid-el">
                                        <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                        <div class="fs-all-company-info">
                                            <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                            <div class="fs-registered-message">
                                                <i class="fs-icon-check"></i>
                                                <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-all-companies-grid-el">
                                        <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                        <div class="fs-all-company-info">
                                            <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                            <div class="fs-registered-message">
                                                <i class="fs-icon-check"></i>
                                                <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-all-companies-grid-el">
                                        <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                        <div class="fs-all-company-info">
                                            <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                            <div class="fs-registered-message">
                                                <i class="fs-icon-check"></i>
                                                <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-all-companies-grid-el">
                                        <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                        <div class="fs-all-company-info">
                                            <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                            <div class="fs-registered-message">
                                                <i class="fs-icon-check"></i>
                                                <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-all-companies-grid-el">
                                        <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                        <div class="fs-all-company-info">
                                            <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                            <div class="fs-registered-message">
                                                <i class="fs-icon-check"></i>
                                                <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-personal-list-category-row">
                            <h3 class="fs-personal-list-category-title">Կատեգորիա 2</h3>
                            <div class="fs-min-category-slider-wrapper">
                                <div class="fs-min-category-slider owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="fs-all-companies-grid-el">
                                            <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                            <div class="fs-all-company-info">
                                                <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="fs-all-companies-grid-el">
                                            <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                            <div class="fs-all-company-info">
                                                <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="fs-all-companies-grid-el">
                                            <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                            <div class="fs-all-company-info">
                                                <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="fs-all-companies-grid-el">
                                            <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                            <div class="fs-all-company-info">
                                                <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="fs-all-companies-grid-el">
                                            <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                            <div class="fs-all-company-info">
                                                <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="fs-all-companies-grid-el">
                                            <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                            <div class="fs-all-company-info">
                                                <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="fs-all-companies-grid-el">
                                            <img src=".//web/site/assets/media/images/providers/provider1.jpg" alt="">
                                            <div class="fs-all-company-info">
                                                <h3>Lոռեմ իպսում դոլոռ սիթ</h3>
                                                <div class="fs-registered-message">
                                                    <i class="fs-icon-check"></i>
                                                    <span><?= $GLOBALS['text']["__partner__"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>