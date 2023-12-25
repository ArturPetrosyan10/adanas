<style>
    .brand-block img{
        width:78%;
        aspect-ratio: 3/2;
        object-fit:contain;
        max-height:100%;
        /*mix-blend-mode:color-burn;*/
    }
     .brand-block {
         background-color: #ffffff;
         transition: 0.3s;
         border-radius: 4px;
         border: 1px solid #e5e8ec;
         padding: 5px;
         cursor: pointer;
         text-align: center;
         width:100%;
     }
     .brands-section {
         margin-bottom: 100px;
         display: grid;
         grid-template-columns: repeat(6, calc( 16.66% - 25px ) );
         grid-gap: 30px;
     }
     h2 a{
         font-size:1.35rem;
         color:black;
     }.img-parent{
        height:80px;
     }
    </style>
<div class="fs-breadcrumbs-wrapper">
    <div class="fs-container">
        <ul class="fs-breadcrumbs-list">
            <li class="fs-breadcrumbs-el"><a href="/"><?=$GLOBALS['text']['__home__page__']?></a></li>
            <li class="fs-breadcrumbs-el"><?=$GLOBALS['text']['__brands__']?></li>
        </ul>
    </div>
</div>
<section>
    <div class="fs-container brands-section">
        <?php foreach ($brands as $index => $brand) { ?>
            <div class="brand-block">
                <a href="brands/<?= $brand->id ?>">
                    <div class="img-parent">
                        <img src='<?= $brand->logo ?>' >
                    </div>
                    <div>
                        <h2><?= $brand->name; ?></h2>
                    </div>
                </a>
            </div>
        <?php }    ?>
        <div>
</section>
