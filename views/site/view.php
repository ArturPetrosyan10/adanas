<?php

use app\models\FsUsers;
//echo '<pre>';
//var_dump($GLOBALS['text']);
//die;
?>
<div class="fs-help-wrapper">
    <div class="fs-container" style="min-height:70vh;">
        <h1 class="text-center" style="text-align:center;"><?= $page['page_title_' . $GLOBALS['lang_']] ?></h1>
        <p><?= $page['page_content_' . $GLOBALS['lang_']] ?></p>
        <?php if($page['id'] == 7){ ?>
        <?php  $partners = FsUsers::find()->where(['status' => 1])->andWhere(['is_seller'=>1])->orderBy(['order_num' => SORT_ASC])->limit(30)->all();?>
        <div class="fs-provider-block">
            <div class="fs-container">
                <h2 class="fs-provider-block-title"><?= $GLOBALS['text']["__connected__providers__"] ?></h2>
            </div>
            <div class="fs-provider-list owl-carousel owl-theme">
                <?php if(!empty($partners)){
                    foreach ($partners as $partner => $partner_val){ ?>
                      <div class="item">
                            <div class="fs-provider-list-el">
                                <a href="/company-details/<?= $partner_val->id ?>">
                                    <img  src="/<?php echo $partner_val->image;?>" alt="" />
                                </a>
                            </div>
                        </div>
                <?php }} ?>
            </div>
        </div>
        <?php if (!Yii::$app->fsUser->isGuest){ ?>
            <script>
                setTimeout(function (){
                    $('.fs-about-us-link-wrapper').remove();
                },200);
            </script>
        <?php } ?>
        <?php if (!Yii::$app->fsUser->isGuest && !Yii::$app->fsUser->identity->is_seller) { ?>
        <div class="fs-become-provider-wrapper">
            <div class="fs-container">
                <a href="/sign-up?model=seller" class="fs-become-provider"><?= $GLOBALS['text']["__become__supplier__"] ?></a>
            </div>
        </div>
        <?php } ?>
    </div>
        <?php } ?>
</div>


