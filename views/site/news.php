<div class="fs-breadcrumbs-wrapper">
    <div class="fs-container">
        <ul class="fs-breadcrumbs-list">
            <li class="fs-breadcrumbs-el"><a href="/"><?=$GLOBALS['text']['__home__page__']?></a></li>
            <li class="fs-breadcrumbs-el"><?=$GLOBALS['text']['__news__']?></li>
        </ul>
    </div>
</div>
<section style="margin:50px 0">
    <div class="fs-container news-menu">
        <ul class="d-flex p-0">
            <li class="navbar url-item"><a href="">Այլ</a></li>
            <li class="navbar url-item"><a href="">Ապրելակերպ</a></li>
            <li class="navbar url-item"><a href="">Ճամփորդություն</a></li>
            <li class="navbar url-item"><a href="">Սպորտ</a></li>
        </ul>
    </div>
    <div class="fs-container all-news">
        <?php
        if(isset($news) && !empty($news)) {
            foreach ($news as $index => $item) { ?>
            <div class="news-block">
                <div class="news-img-parent">
                    <a href="news/<?= $item->url ?>"><div class="news-img" style="background:url(<?= $item->img ?>)"></div></a>
                </div>
                <div>
                    <h4 class="m-0">
                        <?= $_COOKIE['language'] === 'hy' ? $item->page_name_am : (($_COOKIE['language'] === 'ru') ? $item->page_title_ru : $item->page_title_en) ?>
                    </h4>
                </div>
                <div class="about-news m-0">
                    <p>
                        <?= $_COOKIE['language'] === 'hy' ? mb_substr($item->page_content_am, 0, 300) : (($_COOKIE['language'] === 'ru') ? mb_substr($item->page_content_ru, 0, 300) : mb_substr($item->page_title_ru, 0, 300)) ?>
                        <?= (strlen($item->page_content_am) > 300) ? '...' : ''; ?>
                    </p>
                </div>
                <div class="read-more-news m-0">
                    <a href="news/<?= $item->url ?>"><?= $GLOBALS['text']['__read__more__'] ?> <i class="fa fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        <?php
            }
        } ?>
    </div>
</section>
