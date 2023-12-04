<?php
$status = [
    1 => [
        'icon' => 'fs-icon-ordered',
        'text' => $GLOBALS['text']["__ordered__"]
    ],
    2 => [
        'icon' => 'fs-icon-approved-with-change',
        'text' => $GLOBALS['text']["__sent_for_confirmation__"]
    ],
    3 => [
        'icon' => 'fs-icon-approved',
        'text' => $GLOBALS['text']["__acepted__"]
    ],
    4 => [
        'icon' => 'fs-icon-ordered',
        'text' => $GLOBALS['text']["__closed__"]
    ],
    5 => [
        'icon' => 'fs-icon-rejected',
        'text' => $GLOBALS['text']["__rejected__"]
    ],
];

?>
    <main class="fs-main-content">
        <div class="fs-breadcrumbs-wrapper">
            <div class="fs-container">
                <ul class="fs-breadcrumbs-list">
                    <?php if(isMobile_()){ ?>
                        <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                    <?php } else { ?>
                        <li class="fs-breadcrumbs-el"><a href="/personal"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                    <?php } ?>
                    <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']["__received__orders__"] ?></li>
                </ul>
            </div>
        </div>
        <div class="fs-personal-page-wrapper">
            <div class="fs-container">
                <? include("personal_menu.php"); ?>
                <div class="fs-personal-body">
                    <? include('title.php'); ?>
                    <div class="fs-personal-title-group">
                        <h2 class="fs-personal-body-title"><?= $GLOBALS['text']["__orders__"] ?></h2>
                    </div>
                    <div class="fs-personal-orders-wrapper">
                        <div class="fs-personal-order-tabs">
                            <a href="/supplier-processing" class="fs-personal-order-tab <?= !$_GET['state'] ? 'active' : ''?>"><?= $GLOBALS['text']["_all_"] ?></a>
                            <a href="/supplier-processing?state=1" class="fs-personal-order-tab <?= ($_GET['state'] && $_GET['state'] == 1) ? 'active' : ''?>"><i class="fs-icon-ordered"></i><?= $GLOBALS['text']["__ordered__"] ?></a>
                            <a href="/supplier-processing?state=2" class="fs-personal-order-tab <?= ($_GET['state'] && $_GET['state'] == 2) ? 'active' : ''?>"><i class="fs-icon-approved-with-change"></i><?= $GLOBALS['text']["__sent_for_confirmation__"] ?></a>
                            <a href="/supplier-processing?state=3" class="fs-personal-order-tab <?= ($_GET['state'] && $_GET['state'] == 3) ? 'active' : ''?>"><i class="fs-icon-approved"></i><?= $GLOBALS['text']["__acepted__"] ?></a>
                            <a href="/supplier-processing?state=4" class="fs-personal-order-tab <?= ($_GET['state'] && $_GET['state'] == 4) ? 'active' : ''?>"><i class="fs-icon-ordered"></i><?= $GLOBALS['text']["__closed__"] ?></a>
                            <a href="/supplier-processing?state=5" class="fs-personal-order-tab <?= ($_GET['state'] && $_GET['state'] == 5) ? 'active' : ''?>"><i class="fs-icon-rejected"></i><?= $GLOBALS['text']["__rejected__"] ?></a>
                        </div>
                        <div class="fs-category-sort-row mobile-only">
                            <select name="type" id="drop_mobile_s" class="fs-dropdown">
                                <option value=""><?= $GLOBALS['text']["_all_"] ?></option>
                                <option value="1" <?php if(@$_GET['state'] == 1){ echo 'selected';}?>><?= $GLOBALS['text']["__ordered__"] ?></option>
                                <option value="2" <?php if(@$_GET['state'] == 2){ echo 'selected';}?>><?= $GLOBALS['text']["__sent_for_confirmation__"] ?></option>
                                <option value="3" <?php if(@$_GET['state'] == 3){ echo 'selected';}?>><?= $GLOBALS['text']["__acepted__"] ?></option>
                                <option value="4" <?php if(@$_GET['state'] == 4){ echo 'selected';}?>><?= $GLOBALS['text']["__closed__"] ?></option>
                                <option value="5" <?php if(@$_GET['state'] == 5){ echo 'selected';}?>><?= $GLOBALS['text']["__rejected__"] ?></option>
                            </select>

                        </div>
                        <div class="fs-personal-order-action-row">
                            <div class="fs-personal-order-download-col">
                                <h4 class="fs-personal-order-download-label"><?= $GLOBALS['text']["__export__"] ?></h4>
                                <a href="#" class="fs-personal-order-download-btn" data-file-type="xls" download><img src="/web/site/assets/media/images/xls.png" alt="" /></a>
                                <a href="#" class="fs-personal-order-download-btn" data-file-type="xml" download><img src="/web/site/assets/media/images/xml.png" alt="" /></a>
                                <a href="#" class="fs-personal-order-download-btn" data-file-type="pdf" download><img src="/web/site/assets/media/images/pdf.png" alt="" /></a>
                            </div>
                            <form id="processing_form" class="fs-personal-order-filter-col">
                                <button type="button" class="fs-datepicker-trigger"><?= ($_GET['fromdate'] || $_GET['todate']) ? ($_GET['fromdate'] . ' - ' . $_GET['todate']) : $GLOBALS['text']["__by_date_"] ?></button>
                                <div class="fs-double-datepicker-body">
                                    <div class="fs-double-datepicker-row">
                                        <div class="fs-double-datepicker-col">
                                            <input type="text" name="fromdate" value="" class="fs-set-date-from"  placeholder="<?= $GLOBALS['text']["__choose__"] ?>" >
                                            <i class="fs-icon-calendar"></i>
                                        </div>
                                        <div class="fs-double-datepicker-col">
                                            <input type="text" name="todate" value="" class="fs-set-date-to"  placeholder="<?= $GLOBALS['text']["__choose__"] ?>" >
                                            <i class="fs-icon-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="fs-set-date-block">
                                        <button type="button" data-fform="processing_form" data-action="filter"><?= $GLOBALS['text']["__save__"] ?></button>
                                    </div>
                                </div>
                            </form>
                            <form style="display: none" id="processing_reset">
                            </form>
                        </div>
                        <div class="fs-personal-order-table-wrapper">
                            <?php if(!isMobile_()){ ?>
                                <div class="fs-personal-order-table">
                                    <div class="fs-personal-order-table-head-row">
                                        <div class="fs-personal-order-table-col check">
                                            <label class="fs-personal-order-table-row-check">
                                                <input type="checkbox">
                                                <span class="fs-personal-order-table-row-check-imitation"></span>
                                            </label>
                                        </div>
                                        <div class="fs-personal-order-table-col order">N</div>
                                        <div class="fs-personal-order-table-col date no-mobile"><?= $GLOBALS['text']["__date__"] ?></div>
                                        <div class="fs-personal-order-table-col supplier"><?= $GLOBALS['text']["__buyer__"] ?></div>
                                        <div class="fs-personal-order-table-col price"><?= $GLOBALS['text']["__status__"] ?></div>
                                        <div class="fs-personal-order-table-col sale"><?= $GLOBALS['text']["__total__"] ?><span>(<?= $GLOBALS['text']["__with_taxs__"] ?>)</span></div>
                                    </div>
                                    <?php foreach ($orders as $order): ?>
                                        <div class="fs-personal-order-table-body-row">
                                            <div class="fs-personal-order-table-col check">
                                                <label class="fs-personal-order-table-row-check">
                                                    <input type="checkbox">
                                                    <span class="fs-personal-order-table-row-check-imitation"></span>
                                                </label>
                                            </div>
                                            <div class="fs-personal-order-table-col order">
                                                <a href="/site/supplier-processing-details?id=<?= $order->id ?>" class="fs-personal-order-table-order-label">N<?= str_pad($order->id, 9, "0", STR_PAD_LEFT) ?></a>
                                            </div>
                                            <div class="fs-personal-order-table-col date"><a href="/site/supplier-processing-details?id=<?= $order->id ?>" class="fs-personal-order-table-order-label"><time><?= date('d.m.Y', strtotime($order->created_at)) ?></time></a></div>
                                            <div class="fs-personal-order-table-col supplier">
                                                <a href="/site/supplier-processing-details?id=<?= $order->id ?>" class="fs-personal-order-table-order-label">
                                                    <h5 class="fs-personal-order-supplier-name" style="text-align: center;"><?= $order->buyer->name ?> </h5>
                                                </a>
                                            </div>
                                            <div class="fs-personal-order-table-col status"><a href="/site/supplier-processing-details?id=<?= $order->id ?>" class="fs-personal-order-table-order-label"><i class="<?= $status[$order->status]['icon'] ?>" <?php if($status[$order->status]['icon'] == "fs-icon-approved-with-change"){ echo 'style="color: #297551;"';}?>></i><?= $status[$order->status]['text'] ?></a></div>
                                            <div class="fs-personal-order-table-col result"><a href="/site/supplier-processing-details?id=<?= $order->id ?>" class="fs-personal-order-table-order-label"><?= number_format($order->price, '0', ' ', ',') ?> <?= $GLOBALS['text']["__dr__"] ?></a></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php } else { ?>
                                <div class="fs-personal-order-table">
                                    <div class="fs-personal-order-table-head-row">
                                        <div class="fs-personal-order-table-col check">
                                            <label class="fs-personal-order-table-row-check">
                                                <input type="checkbox">
                                                <span class="fs-personal-order-table-row-check-imitation"></span>
                                            </label>
                                        </div>
                                        <div class="fs-personal-order-table-col order"><?= $GLOBALS['text']["__orders__"] ?></div>
                                    </div>
                                    <?php foreach ($orders as $order): ?>
                                        <div class="fs-personal-order-table-body-row " >
                                            <div class="fs-personal-order-table-col check">
                                                <label class="fs-personal-order-table-row-check">
                                                    <input type="checkbox">
                                                    <span class="fs-personal-order-table-row-check-imitation"></span>
                                                </label>
                                            </div>
                                            <div class="fs-personal-order-table-col order ">
                                                <a href="/site/supplier-processing-details?id=<?= $order->id ?>" class="fs-personal-order-table-order-label">N<?= str_pad($order->id, 9, "0", STR_PAD_LEFT) ?> <time style="float:right;"><?= date('d.m.Y', strtotime($order->created_at)) ?></time></a>
                                                <br>
                                                <div><?= $order->buyer->legal_name ?></div>
                                                <a href="/site/supplier-processing-details?id=<?= $order->id ?>" style="justify-content: left;padding:5px 0px;" class="fs-personal-order-table-order-label fs-personal-order-tab"><i style="margin-right:10px;" class="<?= $status[$order->status]['icon'] ?>" <?php if($status[$order->status]['icon'] == "fs-icon-approved-with-change"){ echo 'style="color: #297551;"';}?>></i><?= $status[$order->status]['text'] ?></a>

                                                <div class="result"><a href="/site/supplier-processing-details?id=<?= $order->id ?>" class="fs-personal-order-table-order-label"><?= $GLOBALS['text']["__total__"] ?>՝ <b style="float:right;"><?= number_format($order->price, '0', ' ', ',') ?> <?= $GLOBALS['text']["__dr__"] ?> </b></a></div>
                                                <span class="fs-personal-order-result-info">(<?= $GLOBALS['text']["__with_taxs__"] ?>)</span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="fs-personal-order-result">
                            <div class="fs-personal-order-result-row">
                                <div class="fs-container">
                                    <div class="fs-personal-order-result-inner">
                                        <h5 class="fs-personal-order-result-label"><?= $GLOBALS['text']["__total__"] ?></h5>
                                        <var>42,000 <?= $GLOBALS['text']["__dr__"] ?></var>
                                    </div>
                                    <span class="fs-personal-order-result-info">(<?= $GLOBALS['text']["__with_taxs__"] ?>)</span>
                                </div>
                            </div>
                        </div>
                        <div class="fs-personal-page-table-foot" data-action="/personal-history">
                            <span class="fs-personal-page-table-count"></span>
                            <div class="fs-personal-page-table-pagination">
                                <ul class="fs-personal-page-table-pagination-list">
                                    <li class="fs-personal-page-table-pagination-list-el active"><a href="#"><?= $_GET['page'] ?? 1 ?></a></li>
                                </ul>
                                <div class="fs-personal-page-table-pagination-nav">
                                    <button type="button" data-role="prev" class="pagination-arrow fs-icon-arrow <? if($_GET['page'] && $_GET['page'] != 1) { ?>active<? } ?>"  data-page="<?= $_GET['page'] ? $_GET['page']-1 : 1 ?>"></button>
                                    <button type="button" data-role="next" class="pagination-arrow fs-icon-arrow <?= count($orders) > 0 ? 'active' : '' ?>" data-page="<?= $_GET['page'] ? $_GET['page']+1 : 2 ?>"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        .mobile-only{
            display:none;
        }
        .fs-personal-order-tab:after{
            background:none;
        }

        .fs-dropdown{
            width:100%;
            font-size:18px;
            margin-top: 20px;
            padding:5px 10px;
            height: auto;
            position: relative;
            border-radius: 0.4rem;
            color:#D7D4D1;
            border: 0.1rem solid #D7D4D1;
        }
        @media all and (max-width: 768px){
            .mobile-only{
                display:block
            }
            .result{
                font-size:18px !important;
            }
            .fs-personal-order-table-head-row, .fs-personal-order-table-body-row{
                border-bottom:1px solid #D7D4D1;
                display:inherit !important;
                -webkit-box-shadow: 0px 8px 6px 0px rgba(215, 212, 209, 0.2);
                -moz-box-shadow: 0px 8px 6px 0px rgba(215, 212, 209, 0.2);
                box-shadow: 0px 8px 6px 0px rgba(215, 212, 209, 0.2);
            }
            .fs-personal-order-table-body-row *{
                font-size:80%;
            }
            .fs-personal-order-tabs{
                display:none;
            }
            .fs-personal-order-action-row {
                width: 100%;
                height: 4.6rem;
                margin-bottom: 3.2rem;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -webkit-box-align: stretch;
                -ms-flex-align: stretch;
                align-items: baseline;
                display: flex;
                flex-direction: column-reverse;
            }
            .fs-category-sort-row{
                margin-bottom:65px;
            }
            .fs-personal-order-action-row form{
                margin-top:20px;
                width:100%;
            }
            .fs-personal-order-action-row form button{
                padding:5px 10px;
                height: auto;
                position: relative;
                border-radius: 0.4rem;
                color:#D7D4D1;
                font-size:18px;
                border: 0.1rem solid #D7D4D1;
                margin-bottom:20px;
                width:100%;
            }
            .fs-double-datepicker-body{
                width:100%;
                padding:10px 0px;
            }
        }
    </style>

<?php
function isMobile_() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>