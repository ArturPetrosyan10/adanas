<style>
    .about-news{
        overflow:visible !important;
        -webkit-line-clamp: unset ;
        font-size:18px;
    }
     .news-img{
         height: 450px;
         width: 100%;
         background-size: cover!important;
         border-radius: 10px;
         margin: auto;
         max-width: 900px;
    }
    .news-img-parent{
        background:white;
        margin-top:30px;
    }
    h2{
        font-size: 26px;
        margin-bottom: 20px;
        font-family: sans-serif;
    }
    .m-t-15{
        margin-top:15px;
    }
</style>
<div class="fs-breadcrumbs-wrapper">
    <div class="fs-container">
        <ul class="fs-breadcrumbs-list">
            <li class="fs-breadcrumbs-el"><a href="/"><?=$GLOBALS['text']['__home__page__']?></a></li>
            <li class="fs-breadcrumbs-el" >/</li>
            <li class="fs-breadcrumbs-el"><?=$GLOBALS['text']['__news__']?></li>
        </ul>
    </div>
</div>
<div class="fs-container">
    <div class="m-t-15">
        <h2 class="m-0">
            <?= $_COOKIE['language'] === 'hy' ? $item->page_name_am : (($_COOKIE['language'] === 'ru') ? $item->page_title_ru : $item->page_title_en) ?>
        </h2>
    </div>
    <div class="news-img-parent">
        <div class="news-img" style="background:url('../<?= $item->img ?>')"></div>
    </div>
    <div class="about-news m-0">
        <p>
            <?= $_COOKIE['language'] === 'hy' ? $item->page_content_am : (($_COOKIE['language'] === 'ru') ? $item->page_content_ru : $item->page_title_en) ?>
        </p>
    </div>
</div>
