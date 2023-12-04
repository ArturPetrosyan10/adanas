<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="/"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['__all_companies__'] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-all-companies-title-wrapper">
        <div class="fs-container">
            <h1 class="fs-all-companies-title" data-count="<?= count($companies) ?>"><?= $GLOBALS['text']['__all_companies__'] ?></h1>
        </div>
    </div>
    <div class="fs-all-companies-wrapper">
        <div class="fs-container">
            <button type="button" class="fs-filter-mobile-button">
                <i class="fs-icon-filter"></i>
                <span>Ֆիլտրել</span>
            </button>
            <div class="fs-all-companies-filter-block">
                <div class="fs-companies-filter-wrapper">
                    <div class="fs-companies-filter-header">
                        <h4 class="fs-companies-filter-header-title">Ֆիլտր</h4>
                        <button type="button" class="fs-icon-close"></button>
                    </div>
                    <div class="fs-companies-filter-body">
                        <div class="fs-companies-filter-element">
                            <h3><?= $GLOBALS['text']['__categories__'] ?></h3>
                            <div class="fs-companies-filter-checkbox-list">
                                <?php foreach ($categories as $category): ?>
                                    <label class="fs-checkbox-element">
                                        <input name="categories[]" <?php if(in_array($category->id,@$_GET['category_id'])){ echo 'checked'; } ?> type="checkbox" class="corporateCat" value="<?= $category->id ?>"/>
                                        <span class="fs-checkbox-imitation"></span>
                                        <span class="fs-checkbox-label"><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></span>
                                    </label>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <div class="fs-companies-filter-element">
                            <h3><?= $GLOBALS['text']['__company_type__'] ?></h3>
                            <div class="fs-companies-filter-checkbox-list">
                                <label class="fs-checkbox-element">
                                    <input id="company-list-filter-buy-chk" class="filter_company" checked type="checkbox" value="company-list-filter-buy" />
                                    <span class="fs-checkbox-imitation"></span>
                                    <span class="fs-checkbox-label"><?= $GLOBALS['text']['__buyer__'] ?></span>
                                </label>
                                <label class="fs-checkbox-element">
                                    <input id="company-list-filter-sel-chk" class="filter_company" checked type="checkbox" value="company-list-filter-sel" />
                                    <span class="fs-checkbox-imitation"></span>
                                    <span class="fs-checkbox-label"><?= $GLOBALS['text']['__provider__'] ?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fs-companies-filter-action-wrapper">
                    <button onClick="window.location.href = '/site/corporate/';" type="button"><?= $GLOBALS['text']['__clear_filters__'] ?></button>
                    <button onClick="hideM()" type="button"><?= $GLOBALS['text']['__apply__'] ?></button>
                </div>
            </div>
            <div class="fs-all-companies-col">
                <div class="fs-all-companies-grid">
                    <?php foreach ($companies as $company): ?>
                        <div data-category="<?= $company->categories ?>" class="fs-all-companies-grid-el company-list-filter-<?= $company->is_seller == 1 ? 'sel' : 'buy' ?>" >
                            <a href="/company-details/<?= $company->id ?>">
                                <img src="<?= isset($company->image) ? '/' . $company->image : '/web/site/img/noimg.png' ?>" alt="" />
                            </a>
                            <div class="fs-all-company-info">
                                <h3><?= $company['legal_name'] ?></h3>
                                <?php
                                $is = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$company->id])->andWhere(['status'=>[1,null]])->one();
                                $disabled = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$company->id])->andWhere(['status'=>4])->one();
                                $is_3_declines = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$company->id])->andWhere(['status'=>2])->count();
                                if(!$disabled){
                                ?>
                                <?php if($company->is_seller == 1 && Yii::$app->fsUser->identity->is_buyer == 1 && $is_3_declines<3 && !$is && Yii::$app->fsUser->identity->status == 1 && Yii::$app->fsUser->identity->verified == 1) { ?>
                                    <a href="/personal-requests?become-partners=<?= $company->id ?>" class="fs-registration-call-to-action"><?= $GLOBALS['text']['__become_a_partner'] ?></a>
                                <?php } ?>
                                <?php } else { ?>
                                    <a href="#" class="fs-registration-call-to-action"><?= $GLOBALS['text']['__suspended__'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function hideM(){
        $('.fs-main-content').removeClass('no-limit');
        $('.fs-all-companies-filter-block').removeClass('active');
    }
</script>