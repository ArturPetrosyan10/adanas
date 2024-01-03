<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="/"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <li class="fs-breadcrumbs-el" >/</li>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['__search__results__'] ?> </li>
            </ul>
        </div>
    </div>
    <div class="fs-category-wrapper">
        <div class="fs-container">
            <h1 class="fs-category-title"><?= $GLOBALS['text']['__search__results__'] ?> </h1>
            <div class="fs-category-container">
                <aside class="fs-category-page-sidebar">
                    <form class="fs-filter">
                        <h4 class="fs-filter-title"><?=$GLOBALS['text']['__filter__']?></h4>
                        <div class="fs-filter-section">
                            <h5 class="fs-filter-section-title"><?=$GLOBALS['text']['__color__']?><i class="fs-icon-chevron"></i></h5>
                            <div class="fs-filter-section-body" style="display: none">
                                <div class="fs-companies-filter-checkbox-list">
                                    <label class="fs-checkbox-element">
                                        <input type="checkbox" `>
                                        <span class="fs-checkbox-imitation"></span>
                                        <span class="fs-checkbox-label"><?= $GLOBALS['text']['__food__'] ?> (10)</span>
                                    </label>
                                    <label class="fs-checkbox-element">
                                        <input type="checkbox" >
                                        <span class="fs-checkbox-imitation"></span>
                                        <span class="fs-checkbox-label"><?= $GLOBALS['text']['__household__appliances__'] ?> (20)</span>
                                    </label>
                                    <label class="fs-checkbox-element">
                                        <input type="checkbox" >
                                        <span class="fs-checkbox-imitation"></span>
                                        <span class="fs-checkbox-label"><?= $GLOBALS['text']['__economical__products__'] ?> (5)</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="fs-filter-section">
                            <h5 class="fs-filter-section-title active"><?=$GLOBALS['text']['__color__']?><i class="fs-icon-chevron"></i></h5>
                            <div class="fs-filter-section-body">
                                <div class="fs-filter-range-slider">
                                    <input type="text" class="fs-filter-range-slider-input" data-type="double"
                                           data-min="0" data-max="1000000" data-from="10000" data-to="500000"
                                           data-drag-interval="true" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="fs-filter-reset-btn-wrapper">
                            <button class="fs-filter-reset-btn" type="reset"><?= $GLOBALS['text']['__clear_filters__'] ?></button>
                        </div>
                    </form>
                </aside>
                <div class="fs-category-block">
                    <div class="fs-category-sort-row">
                        <div class="fs-dropdown fs-catalogue-sort">
                            <p class="fs-dropdown-selected-variant" tabindex="0"><?= $GLOBALS['text']['__new__'] ?></p>
                            <div class="fs-dropdown-select">
                                <ul class="fs-dropdown-select-options">
                                    <li class="fs-dropdown-select-option active"><?= $GLOBALS['text']['__new__'] ?></li>
                                    <li class="fs-dropdown-select-option"><?=$GLOBALS['text']['__required__']?></li>
                                    <li class="fs-dropdown-select-option"><?=$GLOBALS['text']['__sort_by_price_bottom__']?></li>
                                    <li class="fs-dropdown-select-option"><?=$GLOBALS['text']['__sort_by_price_top__']?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fs-category-prod-list">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>