<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="http:/web/site/"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <li class="fs-breadcrumbs-el">Lոռեմ իպսում դոլոռ </li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <div class="fs-personal-aside">
                <div class="fs-personal-tabulation">
                    <div class="fs-personal-tab-head">
                        <a href="http:/web/site/personal/" ><?=$GLOBALS['text']['__buyer__']?></a>
                        <a href="http:/web/site/supplier/" ><?=$GLOBALS['text']['__seller__']?></a>
                    </div>
                    <div class="fs-personal-tab-body">
                        <div class="fs-personal-tab-el" data-target="1">
                            <ul class="fs-personal-link-group">
                                <li style="display: none;" class="fs-personal-link-el "><a href="http:/web/site/personal/reportlist/"><?= $GLOBALS['text']['__my__list__'] ?></a><span>+10</span></li>
                                <li class="fs-personal-link-el "><a href="http:/web/site/supplier/processing/"><?= $GLOBALS['text']['__received__orders__'] ?>
                                    </a>
                                </li>
                                <li class="fs-personal-link-el "><a href="http:/web/site/supplier/dealers/"><?=$GLOBALS['text']['__partners__']?></a></li>
                                <li class="fs-personal-link-el "><a href="http:/web/site/supplier/workbook/"><?=$GLOBALS['text']['__contact_persons__']?></a></li>
                                <li class="fs-personal-link-el "><a href="http:/web/site/supplier/offers/"><?=$GLOBALS['text']['__sales__']?></a></li>
                                <li class="fs-personal-link-el "><a href="http:/web/site/supplier/requests/"><?= $GLOBALS['text']['__received__applications__'] ?></a></li>
                                <li class="fs-personal-link-el "><a href="http:/web/site/supplier/wishlist/"><?= $GLOBALS['text']['__preferred_products_services__'] ?></a> </li>
                                <li class="fs-personal-link-el "><a href="http:/web/site/supplier/"><?=$GLOBALS['text']['__company_info__']?></a></li>
                                <li class="fs-personal-link-el"><a href="http:/web/site/logout/"><?=$GLOBALS['text']['__exit_system__']?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fs-personal-body">
                <div class="fs-personal-name-row" data-license="Լիցենզիայի ավարտ 0 օր">Դավիթ Ավետիսյան</div>
                <div class="fs-personal-title-group">
                    <h2 class="fs-personal-body-title"><?=$GLOBALS['text']['__orders__']?></h2>
                </div>
                <div class="fs-personal-orders-wrapper">
                    <div class="fs-personal-order-tabs">
                        <button type="button" class="fs-personal-order-tab active"><?=$GLOBALS['text']['_all_']?></button>
                        <button type="button" class="fs-personal-order-tab"><i class="fs-icon-ordered"></i><?=$GLOBALS['text']['__ordered__']?></button>
                        <button type="button" class="fs-personal-order-tab"><i class="fs-icon-approved"></i><?=$GLOBALS['text']['__acepted__']?></button>
                        <button type="button" class="fs-personal-order-tab"><i class="fs-icon-approved-with-change"></i><?=$GLOBALS['text']['__acepted__']?> (<?=$GLOBALS['text']['__with__changes__']?>)</button>
                        <button type="button" class="fs-personal-order-tab"><i class="fs-icon-rejected"></i><?=$GLOBALS['text']['__rejected__']?></button>
                    </div>
                    <div class="fs-personal-order-action-row">
                        <div class="fs-personal-order-download-col">
                            <h4 class="fs-personal-order-download-label"><?=$GLOBALS['text']['__export__']?></h4>
                            <a href="#" class="fs-personal-order-download-btn" data-file-type="xls" download><img src="/web/site/assets/media/images/xls.png" alt="" /></a>
                            <a href="#" class="fs-personal-order-download-btn" data-file-type="xml" download><img src="/web/site/assets/media/images/xml.png" alt="" /></a>
                            <a href="#" class="fs-personal-order-download-btn" data-file-type="pdf" download><img src="/web/site/assets/media/images/pdf.png" alt="" /></a>
                        </div>
                        <div class="fs-personal-order-filter-col"></div>
                    </div>
                    <div class="fs-personal-order-table-wrapper">
                        <div class="fs-personal-order-table">
                            <div class="fs-personal-order-table-head-row">
                                <div class="fs-personal-order-table-col check">
                                    <label class="fs-personal-order-table-row-check">
                                        <input type="checkbox">
                                        <span class="fs-personal-order-table-row-check-imitation"></span>
                                    </label>
                                </div>
                                <div class="fs-personal-order-table-col order">N</div>
                                <div class="fs-personal-order-table-col date"><?=$GLOBALS['text']['__date__']?></div>
                                <div class="fs-personal-order-table-col supplier"><?=$GLOBALS['text']['__provider__']?></div>
                                <div class="fs-personal-order-table-col price"></div>
                                <div class="fs-personal-order-table-col sale"><?=$GLOBALS['text']['__total__']?><span>(<?=$GLOBALS['text']['__with_taxs__']?>)</span></div>
                            </div>
                            <div class="fs-personal-order-table-body-row">
                                <div class="fs-personal-order-table-col check">
                                    <label class="fs-personal-order-table-row-check">
                                        <input type="checkbox">
                                        <span class="fs-personal-order-table-row-check-imitation"></span>
                                    </label>
                                </div>
                                <div class="fs-personal-order-table-col order">
                                    <a href="#" class="fs-personal-order-table-order-label">N04444444444444</a>
                                </div>
                                <div class="fs-personal-order-table-col date"><time>15.10.2021</time></div>
                                <div class="fs-personal-order-table-col supplier">
                                    <h5 class="fs-personal-order-supplier-name">Մատակարարի անվանում լորեմ իպսում դոլար սիթ լորեմ իպսում դոլար սիթ</h5>
                                </div>
                                <div class="fs-personal-order-table-col status"><i class="fs-icon-ordered"></i><?=$GLOBALS['text']['__ordered__']?></div>
                                <div class="fs-personal-order-table-col result">1 000 000 <?=$GLOBALS['text']['__dr__']?></div>
                            </div>
                            <div class="fs-personal-order-table-body-row">
                                <div class="fs-personal-order-table-col check">
                                    <label class="fs-personal-order-table-row-check">
                                        <input type="checkbox">
                                        <span class="fs-personal-order-table-row-check-imitation"></span>
                                    </label>
                                </div>
                                <div class="fs-personal-order-table-col order">
                                    <a href="#" class="fs-personal-order-table-order-label">N03333333333333</a>
                                </div>
                                <div class="fs-personal-order-table-col date"><time>15.10.2021</time></div>
                                <div class="fs-personal-order-table-col supplier">
                                    <h5 class="fs-personal-order-supplier-name"><?=$GLOBALS['text']['__provider__name__']?></h5>
                                </div>
                                <div class="fs-personal-order-table-col status"><i class="fs-icon-approved"></i><?=$GLOBALS['text']['__acepted__']?></div>
                                <div class="fs-personal-order-table-col result">100 000 <?=$GLOBALS['text']['__dr__']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="fs-personal-order-result">
                        <div class="fs-personal-order-result-row">
                            <div class="fs-container">
                                <div class="fs-personal-order-result-inner">
                                    <h5 class="fs-personal-order-result-label"><?=$GLOBALS['text']['__total__']?></h5>
                                    <var>35 200 <?=$GLOBALS['text']['__dr__']?></var>
                                </div>
                                <span class="fs-personal-order-result-info">(<?=$GLOBALS['text']['__with_taxs__']?>)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>