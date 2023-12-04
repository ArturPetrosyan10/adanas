<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isMobile_()){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?=$GLOBALS['text']['__sales__']?></li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <? include("personal_menu.php"); ?>
            <div class="fs-personal-body">
                <? include('title.php'); ?>
                <!--        <div class="fs-personal-name-row">Օգտահաշիվը դեռ հաստատված չէ - </div>-->
                <div class="fs-personal-title-group">
                    <h2 class="fs-personal-body-title"><?=$GLOBALS['text']['__sales__']?></h2>
                </div>
                <div class="fs-personal-announced-wrapper">
                    <div class="fs-personal-announced-head">
                         <?php if(!isMobile_()){ ?>
                        <div class="fs-personal-announced-tab-head">
                            <a href="/supplier-offers" class="fs-personal-order-tab <?php if(!isset($_GET['state'])){ echo 'active';}?>"><?=$GLOBALS['text']['_all_']?></a>
                            <a href="/supplier-offers?state=0" class="fs-personal-order-tab <?php if(@$_GET['state'] === 0){ echo 'active';}?>"><?= $GLOBALS['text']['__pending__'] ?></a>
                            <a href="/supplier-offers?state=1" class="fs-personal-order-tab <?php if(@$_GET['state'] == 1){ echo 'active';}?>"><?= $GLOBALS['text']['__acting__'] ?></a>
                            <a href="/supplier-offers?state=2" class="fs-personal-order-tab <?php if(@$_GET['state'] == 2){ echo 'active';}?>"><?= $GLOBALS['text']['__completed__'] ?></a>
                        </div>
                        <?php } else { ?>
                             <div class="fs-category-sort-row mobile-only">
                                 <select name="type" id="drop_mobile_offers_sup" class="fs-dropdown">
                                     <option value=""><?=$GLOBALS['text']['_all_']?></option>
                                     <option value="0" <?php if(@$_GET['state'] === 0){ echo 'selected';}?>><?= $GLOBALS['text']['__pending__'] ?></option>
                                     <option value="1" <?php if(@$_GET['state'] == 1){ echo 'selected';}?>><?= $GLOBALS['text']['__acting__'] ?></option>
                                     <option value="2" <?php if(@$_GET['state'] == 2){ echo 'selected';}?>><?= $GLOBALS['text']['__completed__'] ?></option>
                                 </select>
                             </div>
                        <?php } ?>
                        <form id="processing_form" class="fs-personal-order-filter-col">
                            <button type="button" class="fs-datepicker-trigger"><?= ($_GET['fromdate'] || $_GET['todate']) ? ($_GET['fromdate'] . ' - ' . $_GET['todate']) : $GLOBALS['text']['__by_date_']?></button>
                            <div class="fs-double-datepicker-body">
                                <div class="fs-double-datepicker-row">
                                    <div class="fs-double-datepicker-col">
                                        <input type="text" name="fromdate" value="<?php echo $_GET['fromdate'];?>" class="fs-set-date-from"  placeholder="<?= $GLOBALS['text']['__choose__'] ?>" />
                                        <i class="fs-icon-calendar"></i>
                                    </div>
                                    <div class="fs-double-datepicker-col">
                                        <input type="text" name="todate" value="<?php echo $_GET['todate'];?>" class="fs-set-date-to"  placeholder="<?= $GLOBALS['text']['__choose__'] ?>" />
                                        <i class="fs-icon-calendar"></i>
                                    </div>
                                </div>
                                <div class="fs-set-date-block">
                                    <button type="button" data-fform="processing_form" data-action="filter"><?=$GLOBALS['text']['__save__']?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if(!isMobile_()){ ?>
                    <div class="fs-personal-announced-table-wrapper">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td><?=$GLOBALS['text']['__company__']?></td>
                                    <td><?= $GLOBALS['text']['__discount__name__'] ?></td>
                                    <td><?= $GLOBALS['text']['__discount__'] ?></td>
                                    <td><?= $GLOBALS['text']['__beginning__'] ?></td>
                                    <td><?= $GLOBALS['text']['__end__'] ?></td>
                                    <td><?= $GLOBALS['text']['__status__'] ?></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($discounts)){ ?>
                               <?php foreach ($discounts as $discount => $discount_val){ ?>
                                <tr>
                                    <td><?= $user->legal_name;?></td>
                                    <td><?= $discount_val->name;?></td>
                                    <td><?= $discount_val->discount_price;?></td>
                                    <td><time><?= $discount_val->start_date;?></time></td>
                                    <td><time><?= $discount_val->end_date;?></time></td>
                                    <td> <?php switch ($discount_val->discount_status){
                                            case 0:
                                                echo $GLOBALS['text']['__pending__'];
                                                break;
                                            case 1:
                                                echo $GLOBALS['text']['__acting__'];
                                                break;
                                            case 2:
                                                echo $GLOBALS['text']['__completed__'];
                                                break;
                                        } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
<!--                        <div class="fs-contacting-action-row">-->
<!--                            <p class="fs-contacting-page-info">Ցուցադրված է 1 - 36-ը 320-ից</p>-->
<!--                            <div class="fs-personal-page-table-pagination">-->
<!--                                <ul class="fs-personal-page-table-pagination-list">-->
<!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">1</a></li>-->
<!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">2</a></li>-->
<!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">3</a></li>-->
<!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">4</a></li>-->
<!--                                    <li class="fs-personal-page-table-pagination-list-el">...</li>-->
<!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">9</a></li>-->
<!--                                </ul>-->
<!--                                <div class="fs-personal-page-table-pagination-nav">-->
<!--                                    <button type="button" data-role="prev" class="fs-icon-arrow"></button>-->
<!--                                    <button type="button" data-role="next" class="fs-icon-arrow active"></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <?php } else { ?>
                        <div class="fs-personal-announced-table-wrapper">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <td ><?= $GLOBALS['text']['__company__'] ?></td>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if(!empty($discounts)){ ?>
                                    <?php foreach ($discounts as $discount => $discount_val){ ?>
                                        <tr>
                                            <td>
                                                <p style="background:#ececec;padding: 20px;margin: -16px;margin-bottom: 10px;"><?php echo $user->legal_name;?></p>
                                                <p><small><b><?php echo $discount_val->name;?></b></small></p>
                                                <p><?= $GLOBALS['text']['__discount__'] ?> <span style="float:right;"><?php echo $discount_val->discount_price;?></span></p>
                                                <p><?= $GLOBALS['text']['__beginning__'] ?> <?= $GLOBALS['text']['__discount__'] ?><time style="float:right;"><?php echo $discount_val->start_date;?></time>
                                                <p><?= $GLOBALS['text']['__end__'] ?> <time style="float:right;"><?php echo $discount_val->end_date;?></time></p>
                                                <p><?= $GLOBALS['text']['__status__'] ?>
                                                    <span style="float:right;">
                                                        <?php switch ($discount_val->discount_status){
                                                        case 0:
                                                            echo $GLOBALS['text']['__pending__'];
                                                            break;
                                                        case 1:
                                                            echo $GLOBALS['text']['__acting__'];
                                                            break;
                                                        case 2:
                                                            echo $GLOBALS['text']['__completed__'];
                                                            break;
                                                            } ?>
                                                    </span
                                                ></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                            <!--                        <div class="fs-contacting-action-row">-->
                            <!--                            <p class="fs-contacting-page-info">Ցուցադրված է 1 - 36-ը 320-ից</p>-->
                            <!--                            <div class="fs-personal-page-table-pagination">-->
                            <!--                                <ul class="fs-personal-page-table-pagination-list">-->
                            <!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">1</a></li>-->
                            <!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">2</a></li>-->
                            <!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">3</a></li>-->
                            <!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">4</a></li>-->
                            <!--                                    <li class="fs-personal-page-table-pagination-list-el">...</li>-->
                            <!--                                    <li class="fs-personal-page-table-pagination-list-el"><a href="#">9</a></li>-->
                            <!--                                </ul>-->
                            <!--                                <div class="fs-personal-page-table-pagination-nav">-->
                            <!--                                    <button type="button" data-role="prev" class="fs-icon-arrow"></button>-->
                            <!--                                    <button type="button" data-role="next" class="fs-icon-arrow active"></button>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .mobile-only{
        display:none;
    }
    .fs-personal-announced-table-wrapper p{
        margin-bottom:5px;
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
    @media all and (max-width: 768px) {
        .mobile-only {
            margin-bottom:10px;
            display: block
        }
        .table-responsive{
            overflow:hidden;
        }
        .fs-personal-page-td__{
            color:#4A4640;
            padding:10px;
        }
        .fs-personal-announced-table, .fs-personal-page-table{
            min-width:100%;
        }
        .fs-personal-announced-head form{
            margin-top:20px;
            width:100%;
        }
        .fs-personal-announced-head form button{
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
        .fs-personal-sent-tabulation{
            display:none;
        }
    }
</style>
<?php
function isMobile_() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>