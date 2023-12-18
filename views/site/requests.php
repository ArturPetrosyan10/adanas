<?php
use app\models\FsUsers;
use app\models\FsRequests;
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
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']["__sended_requests__"] ?></li>
            </ul>
        </div<?= $GLOBALS['text']["__rejected__"] ?>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <? include("personal_menu.php"); ?>
            <div class="fs-personal-body">
                <? include('title.php'); ?>
                <div class="fs-personal-title-group">
                    <h2 class="fs-personal-body-title"><?= $GLOBALS['text']["__sended_requests__"] ?></h2>
                </div>
                <div class="fs-personal-sent-action-row">
                    <div class="fs-personal-sent-tabulation">
                        <a class="fs-personal-sent-tab-el <?= !$_GET['state'] ? 'active' : ''?>" href="/site/personal-requests/" data-index="1"><?= $GLOBALS['text']["_all_"] ?></a>
                        <a class="fs-personal-sent-tab-el <?= ($_GET['state'] && $_GET['state'] == 'null') ? 'active' : ''?>" href="/site/personal-requests?state=null" data-index="-1"><?= $GLOBALS['text']["__sended__"] ?></a>
                        <a class="fs-personal-sent-tab-el <?= ($_GET['state'] && $_GET['state'] == 1) ? 'active' : ''?>" href="/site/personal-requests?state=1" data-index="2"><?= $GLOBALS['text']["__accepted__"]?></a>
                        <a class="fs-personal-sent-tab-el <?= ($_GET['state'] && $_GET['state'] == 2) ? 'active' : ''?>" href="/site/personal-requests?state=2" data-index="6"><?= $GLOBALS['text']["__rejected__"] ?></a>
                    </div>
                    <div class="fs-category-sort-row mobile-only">
                        <select name="type" id="drop_mobile_reqs" class="fs-dropdown">
                            <option value=""><?= $GLOBALS['text']["_all_"] ?></option>
                            <option value="null" <?php if(@$_GET['state'] == 'null'){ echo 'selected';}?>><?= $GLOBALS['text']["__sended__"] ?></option>
                            <option value="1" <?php if(@$_GET['state'] == 1){ echo 'selected';}?>><?= $GLOBALS['text']["__accepted__"]?></option>
                            <option value="2" <?php if(@$_GET['state'] == 2){ echo 'selected';}?>><?= $GLOBALS['text']["__rejected__"] ?></option>
                        </select>
                    </div>
                    <form id="processing_form" class="fs-personal-order-filter-col">
                        <button type="button" class="fs-datepicker-trigger"><?= ($_GET['fromdate'] || $_GET['todate']) ? ($_GET['fromdate'] . ' - ' . $_GET['todate']) : $GLOBALS['text']["__by_date_"] ?></button>
                        <div class="fs-double-datepicker-body">
                            <div class="fs-double-datepicker-row">
                                <div class="fs-double-datepicker-col">
                                    <input type="text" name="fromdate" value="" class="fs-set-date-from" readonly placeholder="<?= $GLOBALS['text']["__choose__"]?>" />
                                    <i class="fs-icon-calendar"></i>
                                </div>
                                <div class="fs-double-datepicker-col">
                                    <input type="text" name="todate" value="" class="fs-set-date-to" readonly placeholder="<?= $GLOBALS['text']["__choose__"]?>" />
                                    <i class="fs-icon-calendar"></i>
                                </div>
                            </div>
                            <ul class="date__">
                                <li><span onclick="setDay()"><?= $GLOBALS['text']["__current__day__"]?></span></li>
                                <li><span onclick="setMount()"><?= $GLOBALS['text']["__current__month__"]?></span></li>
                            </ul>
                            <div class="fs-set-date-block">
                                <button type="button" data-fform="processing_form" data-action="filter"><?= $GLOBALS['text']["__save__"] ?></button>
                            </div>
                        </div>
                    </form>
                    <form style="display: none" id="processing_reset">
                    </form>
                </div>
                <div class="fs-contacting-wrapper">
                    <?php if(!isMobile_()){ ?>
                       <div class="fs-personal-page-table">
                        <div class="fs-personal-page-thead">
                            <div class="fs-personal-page-tr">
                                <div class="fs-personal-page-th"><?= $GLOBALS['text']["__sender__"] ?></div>
                                <div class="fs-personal-page-th"><?= $GLOBALS['text']["__receiver__"] ?></div>
                                <div class="fs-personal-page-th"><?= $GLOBALS['text']["__date__"] ?></div>
                                <div class="fs-personal-page-th"><?= $GLOBALS['text']["__status__"] ?></div>
                            </div>
                        </div>
                        <div class="fs-personal-page-tbody">
                            <?php foreach ($requests as $request): ?>
                                <div class="fs-personal-page-tr">
                                    <a href="/site/personal-requests?view=<?= $request->seller_id ?>" class="fs-personal-page-td"><?= $user->legal_name ?> <span class="fs-personal-page-sub-row"><?= $user->name ?></span></a>
                                    <a href="/site/personal-requests?view=<?= $request->seller_id ?>" class="fs-personal-page-td"><?= FsUsers::findOne($request->seller_id)->legal_name ?></a>
                                    <a href="/site/personal-requests?view=<?= $request->seller_id ?>" class="fs-personal-page-td"><?= date('d.m.Y', strtotime($request->created_at)) ?></a>
                                    <a href="/site/personal-requests?view=<?= $request->seller_id ?>" class="fs-personal-page-td"><?= $request->status === 1 ?  $GLOBALS['text']["__accepted__"] : ($request->status === 2 ? $GLOBALS['text']["__rejected__"]  : $GLOBALS['text']["__sended__"] ) ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="fs-personal-page-table">
                            <div class="fs-personal-page-thead">
                                <div class="fs-personal-page-tr">
                                    <div class="fs-personal-page-th"><?= $GLOBALS['text']["__sender__"] ?></div>
                                </div>
                            </div>
                            <div class="fs-personal-page-tbody">
                                <?php foreach ($requests as $request): ?>
                                <div class="fs-personal-page-tr">
                                    <div class="fs-personal-page-td">
                                        <a href="/site/personal-requests?view=<?= $request->seller_id ?>" class="fs-personal-page-td__"><?= FsUsers::findOne($request->seller_id)->legal_name ?>(<span><?= FsUsers::findOne($request->seller_id)->name ?></span>)</a><br>
                                        <a href="/site/personal-requests?view=<?= $request->seller_id ?>" class="fs-personal-page-td__"><b><?= $GLOBALS['text']["__date__"]?> </b><span style="float:right;"><?= date('d.m.Y', strtotime($request->created_at)) ?></span></a><br>
                                        <a href="/site/personal-requests?view=<?= $request->seller_id ?>" class="fs-personal-page-td__"><b><?= $GLOBALS['text']["__status__"] ?> </b><span style="float:right;"> <?= $request->status === 1 ?  $GLOBALS['text']["__accepted__"] : ($request->status === 2 ? $GLOBALS['text']["__rejected__"]  : $GLOBALS['text']["__sended__"] ) ?></span></a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="fs-personal-page-table-foot" data-action="/site/personal-requests">
                        <span class="fs-personal-page-table-count"></span>
                        <div class="fs-personal-page-table-pagination">
                            <ul class="fs-personal-page-table-pagination-list">
                                <li class="fs-personal-page-table-pagination-list-el active"><a href="#"><?= $_GET['page'] ?? 1 ?></a></li>
                            </ul>
                            <div class="fs-personal-page-table-pagination-nav">
                                <button type="button" data-role="prev" class="pagination-arrow fs-icon-arrow <? if($_GET['page'] && $_GET['page'] != 1) { ?>active<? } ?>"  data-page="<?= $_GET['page'] ? $_GET['page']-1 : 1 ?>"></button>
                                <button type="button" data-role="next" class="pagination-arrow fs-icon-arrow <?= count($requests) > 0 ? 'active' : '' ?>" data-page="<?= $_GET['page'] ? $_GET['page']+1 : 2 ?>"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<? if(isset($_GET['become-partners'])) { ?>
    <div class="fs-personal-page-request-popup<? if (isset($_GET['become-partners'])) { ?> active<? } ?>">
        <div class="fs-personal-page-request-popup-body">
            <button data-back-link="http://<?=$_SERVER['HTTP_HOST'];?>/?yredirect=true" type="button"
                    class="fs-personal-page-request-popup-close"><i class="fs-icon-close"></i></button>
            <h3 class="fs-personal-page-request-popup-title"><?= $GLOBALS['text']["__become__partner__"] ?></h3>
            <?php
            //check if buyer is a partner of supplier
            if (!FsRequests::find()->where(['buyer_id' => Yii::$app->fsUser->identity->id])->andWhere(['!=','status',2])->andWhere(['seller_id' => $_GET['become-partners']])->one()) {
                $company = FsUsers::findOne($_GET['become-partners']);
                ?>
                <div class="fs-personal-page-request-popup-head">
                    <div class="fs-personal-page-request-popup-col">
                        <h5><?= $user['legal_name']; ?></h5>
                        <p><?= $user['name']; ?></p>
                    </div>
                    <div class="fs-personal-page-request-popup-col">
                        <h5><?= $company->legal_name; ?></h5>
                        <p><?= $company->name; ?></p>
                    </div>
                </div>
                <div class="fs-personal-page-request-popup-form">
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__hvhh__"] ?></span>
                            <input disabled type="text" value="<?= $user['company_hvhh']; ?>"
                                   placeholder="<?= $GLOBALS['text']["__hvhh__"] ?>" onkeypress="return isNumeric(event)"
                                   oninput="maxLengthCheck(this)" maxlength="8" min="0" max="99999999"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__legal_name__"] ?></span>
                            <input disabled value="<?= $user['legal_name']; ?>" type="text"
                                   placeholder="<?= $GLOBALS['text']["__legal_name__"] ?>"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__holding_hvhh__"] ?></span>
                            <input disabled value="<?= $user['holding_hvhh']; ?>" type="text"
                                   placeholder="<?= $GLOBALS['text']["__holding_hvhh__"] ?>" onkeypress="return isNumeric(event)"
                                   oninput="maxLengthCheck(this)" maxlength="8" min="0" max="99999999"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__holding_legal_name__"] ?></span>
                            <input disabled type="text" value="<?= $user['holding_legal_name']; ?>"
                                   placeholder="<?= $GLOBALS['text']["__holding_legal_name__"] ?>"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__contact_person_aah__"] ?></span>
                            <input disabled value="<?= $user['name']; ?>" type="text"
                                   placeholder="<?= $GLOBALS['text']["__contact_person_aah__"] ?>"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__legal_address__"] ?></span>
                            <input disabled value="<?= $user['legal_address']; ?>" type="text"
                                   placeholder="<?= $GLOBALS['text']["__legal_address__"] ?>"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__action_address__"] ?></span>
                            <input disabled value="<?= $user['address']; ?>" type="text"
                                   placeholder="<?= $GLOBALS['text']["__action_address__"] ?>"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__email__"] ?></span>
                            <input disabled value="<?= $user['email']; ?>" type="email"
                                   placeholder="<?= $GLOBALS['text']["__email__"] ?>"/>
                        </label>
                    </div>
                    <div class="fs-personal-page-request-popup-field">
                        <label class="fs-personal-page-req-field-label">
                            <span><?= $GLOBALS['text']["__phone__"] ?></span>
                            <input disabled value="<?= $user['phone']; ?>" type="text"
                                   placeholder="+374xxxxxxxx" autocomplete="new-password" name="PHONE"
                                   class="fs-auth-input masked-tel"/>
                        </label>
                    </div>
                    <form action="/site/personal-send-request" id="send_form" method="POST">
                        <input type="hidden" value="1" name="sendRequestData"/>
                        <input type="hidden" value="<?= $_GET['become-partners']; ?>" name="partnerID"/>
                        <input type="hidden" value="-1" name="state"/>
                    </form>
                    <div class="fs-personal-page-request-popup-buttons">
                        <button type="submit" form="send_form"><?= $GLOBALS['text']["__send__"] ?></button>
                    </div>
                </div>
                <?
            }

            else{

                ?>
                <div class="fs-container">
                    <h4 class="fs-cart-empty-title"><?= $GLOBALS['text']["__unable__continue__"] ?></h4>
                    <a class="fs-cart-empty-return" href="/site/corporate"><?= $GLOBALS['text']["__go__back__"] ?></a>
                </div>
                <?
            }

            ?>
        </div>
    </div>
    <?
}

?>
<? if(isset($_GET['view'])){?>
    <div class="fs-personal-page-request-popup <? if(isset($_GET['view'])){?> active<?} ?>">
        <?php $company = FsUsers::findOne($_GET['view']); ?>
        <div class="fs-personal-page-request-popup-body">
            <button type="button" class="fs-personal-page-request-popup-close"><i class="fs-icon-close"></i></button>
            <h3 class="fs-personal-page-request-popup-title"><?= $GLOBALS['text']["__become__partner__"] ?></h3>
            <div class="fs-personal-page-request-popup-head">
                <div class="fs-personal-page-request-popup-col">
                    <h5><?= $user['legal_name']; ?></h5>
                    <p><?= $user['name']; ?></p>
                </div>
                <div class="fs-personal-page-request-popup-col">
                    <h5><?= $company->legal_name; ?></h5>
                    <p><?= $company->name; ?></p>
                </div>
            </div>
            <div class="fs-personal-page-request-popup-form">
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__hvhh__"] ?></span>
                        <input disabled type="text" value="<?= $user['company_hvhh']; ?>"
                               placeholder="<?= $GLOBALS['text']["__hvhh__"] ?>" onkeypress="return isNumeric(event)"
                               oninput="maxLengthCheck(this)" maxlength="8" min="0" max="99999999"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__legal_name__"] ?></span>
                        <input disabled value="<?= $user['legal_name']; ?>" type="text"
                               placeholder="<?= $GLOBALS['text']["__legal_name__"] ?>"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__holding_hvhh__"] ?></span>
                        <input disabled value="<?= $user['holding_hvhh']; ?>" type="text"
                               placeholder="<?= $GLOBALS['text']["__holding_hvhh__"] ?>" onkeypress="return isNumeric(event)"
                               oninput="maxLengthCheck(this)" maxlength="8" min="0" max="99999999"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__holding_legal_name__"] ?></span>
                        <input disabled type="text" value="<?= $user['holding_legal_name']; ?>"
                               placeholder="<?= $GLOBALS['text']["__holding_legal_name__"] ?>"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__contact_person_aah__"] ?></span>
                        <input disabled value="<?= $user['name']; ?>" type="text"
                               placeholder="<?= $GLOBALS['text']["__contact_person_aah__"] ?>"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__legal_address__"] ?></span>
                        <input disabled value="<?= $user['legal_address']; ?>" type="text"
                               placeholder="<?= $GLOBALS['text']["__legal_address__"] ?>"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__action_address__"] ?></span>
                        <input disabled value="<?= $user['address']; ?>" type="text"
                               placeholder="<?= $GLOBALS['text']["__action_address__"] ?>"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__email__"] ?></span>
                        <input disabled value="<?= $user['email']; ?>" type="email"
                               placeholder="<?= $GLOBALS['text']["__email__"] ?>"/>
                    </label>
                </div>
                <div class="fs-personal-page-request-popup-field">
                    <label class="fs-personal-page-req-field-label">
                        <span><?= $GLOBALS['text']["__phone__"] ?></span>
                        <input disabled value="<?= $user['phone']; ?>" type="text"
                               placeholder="+374xxxxxxxx" autocomplete="new-password" name="PHONE"
                               class="fs-auth-input masked-tel"/>
                    </label>
                </div>
            </div>
        </div>
    </div>
<?} ?>
<script>
    function setDay(){
        const date = new Date();
        let currentDay= String(date.getDate()).padStart(2, '0');
        let currentMonth = String(date.getMonth()+1).padStart(2,"0");
        let currentYear = date.getFullYear();
        $('.fs-set-date-from,.fs-set-date-to').val(`${currentDay}.${currentMonth}.${currentYear}`);
    };
    function setMount(){
        const date = new Date();
        let currentDay= String(date.getDate()).padStart(2, '0');
        let currentMonth = String(date.getMonth()+1).padStart(2,"0");
        let currentYear = date.getFullYear();
        $('.fs-set-date-to').val(`${currentDay}.${currentMonth}.${currentYear}`);
        $('.fs-set-date-from').val(`01.${currentMonth}.${currentYear}`);
    };
</script>
<style>
    .date__{
        list-style:none;
    }
    .date__ span{
        color:#ffbd27;
        padding:5px;
        font-size:15px;
        cursor:pointer;
    }
    .fs-personal-page-td__{
        color:#4A4640;
        padding:10px;
        text-decoration:none;
    }
     .mobile-only{
         display:none;
     }
    .fs-personal-announced-table, .fs-personal-page-table{
        min-width:100%;
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
    @media all and (max-width: 768px) {
        .mobile-only {
            display: block
        }
        .fs-personal-sent-tabulation{
            display:none;
        }
        .fs-personal-sent-action-row form{
            margin-top:20px;
            width:100%;
        }
        .fs-personal-sent-action-row form button{
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