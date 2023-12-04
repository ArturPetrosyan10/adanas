<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <?php if(isset($_GET['mobile'])){ ?>
                    <li class="fs-breadcrumbs-el"><a href="/site/mobile-personal"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
                <?php } else { ?>
                    <li class="fs-breadcrumbs-el"><a href="/personal"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
                <?php } ?>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['__contact_persons__'] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-personal-page-wrapper">
        <div class="fs-container">
            <? include("personal_menu.php"); ?>
            <div class="fs-personal-body">
                <? include('title.php'); ?>
                <div class="fs-personal-title-group">
                    <h2 class="fs-personal-body-title"><?= $GLOBALS['text']['__contact_persons__'] ?></h2>
                </div>
                <div class="fs-contacting-wrapper">
                    <table class="fs-contacting-table">
                        <thead>
                        <tr>
                            <th><?= $GLOBALS['text']['__company__'] ?></th>
                            <th><?= $GLOBALS['text']['__workers__'] ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td>
                                    <h4><?= $contact->legal_name ?></h4>
                                </td>
                                <td>
                                    <h4><?= $contact->name ?></h4>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="fs-personal-page-table-foot" data-action="/site/personal-contacting">
                        <span class="fs-personal-page-table-count"></span>
                        <div class="fs-personal-page-table-pagination">
                            <ul class="fs-personal-page-table-pagination-list">
                                <li class="fs-personal-page-table-pagination-list-el active"><a href="#"><?= $_GET['page'] ?? 1 ?></a></li>
                            </ul>
                            <div class="fs-personal-page-table-pagination-nav">
                                <button type="button" data-role="prev" class="pagination-arrow fs-icon-arrow <? if($_GET['page'] && $_GET['page'] != 1) { ?>active<? } ?>"  data-page="<?= $_GET['page'] ? $_GET['page']-1 : 1 ?>"></button>
                                <button type="button" data-role="next" class="pagination-arrow fs-icon-arrow <?= count($contacts) > 0 ? 'active' : '' ?>" data-page="<?= $_GET['page'] ? $_GET['page']+1 : 2 ?>"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>