<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="#"><?= $GLOBALS['text']["__home__page__"] ?></a></li>
                <li class="fs-breadcrumbs-el">Lոռեմ իպսում դոլոռ </li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <?php include("personal_menu.php"); ?>
            <div class="fs-personal-body">
                <?php include('title.php'); ?>
                <div class="fs-personal-title-group">
                    <h2 class="fs-personal-body-title"><?= $GLOBALS['text']["__templates__"] ?></h2>
                </div>
                <div class="fs-template-list-wrapper">
                    <div class="fs-personal-page-table">
                        <div class="fs-personal-page-thead">
                            <div class="fs-personal-page-tr">
                                <div class="fs-personal-page-th"><?= $GLOBALS['text']["__name__"] ?></div>
                                <div class="fs-personal-page-th no-mobile"><?= $GLOBALS['text']["__seller__"] ?></div>
                                <div class="fs-personal-page-th no-mobile"><?= $GLOBALS['text']["__delete__"] ?></div>
                            </div>
                        </div>
                        <div class="fs-personal-page-tbody">
                            <?php foreach ($templates as $template): ?>
                                <div class="fs-personal-page-tr">
                                    <a href="/site/personal-templates-details?id=<?= $template->id ?>" class="fs-personal-page-td"><?= $template->name ?></a>
                                    <a href="/site/personal-templates-details?id=<?= $template->id ?>" class="fs-personal-page-td"><?= $template->seller->name ?></a>
                                    <a  data-tempalte_id="<?= $template->id ?>" class="fs-remove-template-el fs-personal-page-td"><i data-temprid="<?= $template->id ?>" class="fs-icon-close"></i></a>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if($total > 10){ ?>
                    <div class="fs-personal-page-table-foot" data-action="/site/personal-templates">
                        <span class="fs-personal-page-table-count"></span>
                        <div class="fs-personal-page-table-pagination">
                            <ul class="fs-personal-page-table-pagination-list">
                                <li class="fs-personal-page-table-pagination-list-el active"><a href="#"><?= $_GET['page'] ?? 1 ?></a></li>
                            </ul>
                            <div class="fs-personal-page-table-pagination-nav">
                                <button type="button" data-role="prev" class="pagination-arrow fs-icon-arrow <? if($_GET['page'] && $_GET['page'] != 1) { ?>active<? } ?>"  data-page="<?= $_GET['page'] ? $_GET['page']-1 : 1 ?>"></button>
                                <button type="button" data-role="next" class="pagination-arrow fs-icon-arrow <?= count($templates) > 0 ? 'active' : '' ?>" data-page="<?= $_GET['page'] ? $_GET['page']+1 : 2 ?>"></button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="fs-modal" id="remove_template_modal">
    <div class="fs-modal-body">
        <p class="fs-modal-body-text"><?= $GLOBALS['text']["__delete__the__template__"] ?></p>
        <form id="tempalte_remove_form" method="post" action="/site/personal-delete-template" class="fs-modal-body-btn-group">
            <input type="hidden" value="1" name="deleteTemplateData">
            <input type="hidden" id="tempalte_id" value="0" name="tid">
            <button class="fs-modal-btn ghost" data-action="yes" type="button"><?= $GLOBALS['text']["__yes__"] ?></button>
            <button class="fs-modal-btn filled" data-action="no" type="button"><?= $GLOBALS['text']["__no__"] ?></button>
        </form>
    </div>
</div>
<style>
    @media screen and (max-width: 768px) {
        .fs-personal-page-tr{
            display:grid;
        }
        .fs-personal-announced-table, .fs-personal-page-table{
            min-width:100%;
        }
        .no-mobile{
            display:none;
        }
        .fs-personal-page-tr a:nth-child(odd){
            border-bottom:0px;
            box-shadow:none;
        }

        .fs-remove-template-el{
            position:absolute;
            right:10px;
            top:10px;
        }
    }
</style>