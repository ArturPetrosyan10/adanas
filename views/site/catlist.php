<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="/"><?=$GLOBALS['text']['__home__page__']?></a></li>
                <li class="fs-breadcrumbs-el"><?=$GLOBALS['text']['_all_cats_']?></li>
            </ul>
        </div>
    </div>

    <div class="fs-all-categories-wrapper">
        <div class="fs-container">
            <div class="fs-categories-slider owl-carousel owl-theme">
                <div class="item">

                    <div class="fs-categories-col">
                        <?php $i =1; foreach ($categories as $category): ?>
                            <a title="<?= $category->name ?>"
                               href="#" class="fs-category-el" data-url="<?= $category->url ?>">
                                <img src="/<?= $category->photo ?>" alt=""/>
                                <span><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></span>
                            </a>
                        <?php if($i%2==0 ){ ?>
                    </div>
                </div>
                <div class="item">
                    <div class="fs-categories-col">
                        <?php } ?>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="fs-all-categories-list">
                <div class="fs-container">
                    <?php foreach ($categories as $category): ?>
                        <div class="fs-all-categories-block <?= $category->url ?>" >
                            <div class="cat-target" id="main_cat_<?= $category->id ?>"></div>
                            <a href="/categories/<?= $category->url ?>"
                               class="fs-all-categories-first-level" data-count="<?= count($category->children) ?>"><?= $_COOKIE['language'] == 'hy' ? $category->name : $category->translation['name_' . $_COOKIE['language']] ?></a>
                            <div class="fs-all-subcategory-grid">
                                <?php foreach ($category->children as $cat): ?>
                                    <a href="/categories/<?= $cat->url ?>" class="fs-all-subcategory-grid-el"><?= $_COOKIE['language'] == 'hy' ? $cat->name : $cat->translation['name_' . $_COOKIE['language']] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
</main>