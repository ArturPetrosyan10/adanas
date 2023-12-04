<style>
	.fs-personal-aside{
		margin-right: 0px;
		width: 100%;
	}
</style>
<div class="fs-personal-aside" style="display:block;">
	    <?php $action = Yii::$app->controller->action->id; ?>
    <?php 
       $now = new DateTime($user['active_date']);
                $duration = (new DateTime(date('Y-m-d H:i:s')))->diff($now);
                $dur = $duration->format('%r%a');
                if($dur<0){
                    $dur = 0;
                }
                ?>
  
    <div class="fs-personal-tabulation" >
        <div class="fs-personal-tab-head">
            <a href="/site/mobile-personal" <?php if(str_contains($action, 'mobile-personal')){ ?>class="active"<? } ?>><?= $GLOBALS['text']["__buyer__"] ?></a>
            <a href="/site/mobile-supplier" <?php if(str_contains($action, 'mobile-supplier')){ ?>class="active"<? } ?>><?= $GLOBALS['text']["__seller__"] ?></a>
        </div>
        <div class="fs-personal-tab-body">
            <div class="fs-personal-tab-el" data-target="1">
                <? if($user['is_buyer'] == 1 && !str_contains($action, 'mobile-supplier')) { ?>
                    <ul class="fs-personal-link-group">
                        <li style="display: none;" class="fs-personal-link-el <?if($action == 'reportlist'){echo 'active';}?>"><a href="/personal-reportlist">Իմ ցանկը</a><span>+10</span></li>
                        <li class="fs-personal-link-el <?if($action == 'personal-history'){echo 'active';}?>"><a href="/personal-history?mobile"><?= $GLOBALS['text']["__orders__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'personal-partners'){echo 'active';}?>"><a href="/personal-partners?mobile"><?= $GLOBALS['text']["__partners__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'personal-contacting'){echo 'active';}?>"><a href="/personal-contacting?mobile"><?= $GLOBALS['text']["__contact_persons__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'personal-sales'){echo 'active';}?>"><a href="/personal-sales?mobile"><?= $GLOBALS['text']["__sales__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'personal-requests'){echo 'active';}?>"><a href="/personal-requests?mobile"><?= $GLOBALS['text']["__sended_requests__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'personal-templates'){echo 'active';}?>"><a href="/personal-templates?mobile"><?= $GLOBALS['text']["__templates__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'personal-wishlist'){echo 'active';}?>"><a href="/personal-wishlist?mobile"><?= $GLOBALS['text']["__preferred_products_services__"] ?></a> <?if(count($allWishListProds) > 0){ ?><span>+<?=count($allWishListProds);?></span><? } ?></li>
                        <li class="fs-personal-link-el <?if($action == 'personal'){echo 'active';}?>"><a href="/personal"><?= $GLOBALS['text']["__company_info__"] ?></a></li>
                      
                        <li class="fs-personal-link-el"><a href="/site/logout/"><?= $GLOBALS['text']["__exit_system__"] ?></a></li>
                    </ul>
                <? } else if (str_contains($action, 'personal')) { ?>
                    <div class="fs-personal-tab-take-role">
                        <p><?= $GLOBALS['text']["__please__contact__us__text1__"] ?>:</p>
                        <a href="/contacts"><?= $GLOBALS['text']["__contact_us__"] ?></a>
                    </div>
                <? }  if($user['is_seller'] == 1 && !str_contains($action, 'personal')) { ?>
                    <ul class="fs-personal-link-group">
                         <? if (isset($user_sub_data) === false && $dur && $user['is_seller'] == 1 && $user['verified'] > 0 || $_GET['roll'] == 'supplier') { ?>
                        <div class="fs-go-to-admin-panel" style="justify-content: flex-start;margin-bottom:10px;padding-left: 15px;font-size: 15px;"><a target="" href="/manager/index"><b><?= $GLOBALS['text']["__control__panel__"] ?></b></a></div>
                    <? } ?>
                        <li style="display: none;" class="fs-personal-link-el <?if($action == 'reportlist'){echo 'active';}?>"><a href="/personal/reportlist?mobile"><?= $GLOBALS['text']["__my__list__"] ?></a><span>+10</span></li>
                        <li class="fs-personal-link-el <?if($action == 'supplier-processing'){echo 'active';}?>"><a href="/supplier-processing?mobile"><?= $GLOBALS['text']["__received__orders__"] ?>
                            </a>
                        </li>
                        <li class="fs-personal-link-el <?if($action == 'supplier-dealers'){echo 'active';}?>"><a href="/supplier-dealers?mobile"><?= $GLOBALS['text']["__partners__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'supplier-workbook'){echo 'active';}?>"><a href="/supplier-workbook?mobile"><?= $GLOBALS['text']["__contact_persons__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'supplier-offers'){echo 'active';}?>"><a href="/supplier-offers?mobile"><?= $GLOBALS['text']["__sales__"] ?></a></li>
                        <li class="fs-personal-link-el <?if($action == 'supplier-requests'){echo 'active';}?>"><a href="/supplier-requests?mobile">Ստացված հայտեր</a></li>
                        <li class="fs-personal-link-el <?if($action == 'supplier-wishlist'){echo 'active';}?>"><a href="/supplier-wishlist?mobile"><?= $GLOBALS['text']["__preferred_products_services__"] ?></a> <?if(count($allWishListProds) > 0){ ?><span>+<?=count($allWishListProds);?></span><? } ?></li>
                        <li class="fs-personal-link-el <?if($action == 'supplier'){echo 'active';}?>"><a href="/supplier?mobile"><?= $GLOBALS['text']["__company_info__"] ?></a></li>

                        <li class="fs-personal-link-el"><a href="/site/logout/"><?= $GLOBALS['text']["__exit_system__"] ?></a></li>
                    </ul>
                <? } else if(str_contains($action, 'supplier')) { ?>
                    <div class="fs-personal-tab-take-role">
                        <p><?= $GLOBALS['text']["__register__as__supplier__"] ?>.</p>
                        <a href="/contacts"><?= $GLOBALS['text']["__contact_us__"] ?></a>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
</div> 