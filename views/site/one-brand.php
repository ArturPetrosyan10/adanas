<?php $fromPrice =0;
$toPrice = $maxPrice = 50000;
$fromPrice = 0;
if(isset($_GET['price'])){
    $price_range = explode(';',$_GET['price']);
    $fromPrice = $price_range[0];
    $toPrice = $price_range[1];
}
?>
<style>
    .owl-stage{
        transform: translate3d(0px, 0px, 0px) !important;
        width:100% !important;
    }
    .fs-product-thumbnail{
        padding:1rem;
    }
    .fs-product-add-to-fav{
        left:0px !important;
    }
    .owl-item {
        -webkit-box-shadow: 0px 1px 30px rgb(62 68 90 / 9%);
        padding: 2rem;
        border-radius:8px;
        width:22% !important;
    }
    .owl-carousel .owl-item {
        float: left;
        margin-left: 12px;
        margin-right: 12px !important;
        margin-top: 20px;
    }
    .aside_section{
        gap:100px;
    }

    .mobile-only{
        display:none;
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
        .fs-personal-page-td__{
            color:#4A4640;
            padding:10px;
        }
        .fs-personal-announced-table, .fs-personal-page-table{
            min-width:100%;
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

    .pagination{
        display:flex;
        flex-wrap:wrap;
        list-style:none;
        margin-top:20px;
        padding-left:0px;
    }
    .pagination li{
        border:0.1px solid #B9AF9D;
        margin-left:5px;
        border-radius:5px;
    }
    .pagination a{
        padding:5px 10px;
        display:block;
        width:100%;
        height:100%;
        font-size:18px;
        text-decoration:none;
        color:#8C8370;
    }
    .pagination li.active{
        background:#ffbd27;
    }
    .pagination li.active a{
        color:white;
    }
    .irs-to,.irs-from,.irs-single{
        display:none !important;
    }
    .irs-bar,.irs--round .irs-handle{
        background-color:#ffbd27 !important;
        color:#ffbd27;
        border-color:#ffbd27 !important;
    }
    .extra-controls{
        margin-top:20px;
        display: flex;
        justify-content: space-between;
    }
    .extra-controls input{
        display: inline-block;
        background: #ffbd27;
        color: white;
        width: 120px;
        font-size: 16px;
        padding: 7px 15px;
        border: 0px;
    }
    .brand-block img{
        object-fit: contain;
        max-height: 100%;
    }
    .brand-block {
        background-color: #ffffff;
        transition: 0.3s;
        border-radius: 4px;
        border: 1px solid #e5e8ec;
        padding: 5px;
        text-align: center;
        width:100%;
        display:flex;
        justify-content:flex-start;
        gap:20px;
        -webkit-box-shadow: 0 0.2rem 0.4rem rgba(155,149,140,0.2);
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
    }
    .img-parent{
        height: 140px;
        width: max-content;
    }
    .title-parent{
        width:max-content;
        display:flex;
        align-items:center;
        justify-content:center;
    }
</style>
<div class="fs-breadcrumbs-wrapper">
    <div class="fs-container">
        <ul class="fs-breadcrumbs-list">
            <li class="fs-breadcrumbs-el"><a href="/" style="cursor:pointer;"><?=$GLOBALS['text']['__home__page__']?></a></li>
            <li class="fs-breadcrumbs-el"><?= $brand->name; ?></li>
        </ul>
    </div>
</div>
<div class="brand-block">
    <div class="img-parent">
        <img  src='../<?= $brand->logo ?>'>
    </div>
    <div class="title-parent">
        <h2><?= $brand->name; ?></h2>
    </div>
</div>
<div class="d-flex aside_section" style="margin-top:60px;">
    <aside style="width:20%">
        <form class="fs-filter"  id="filter_block">
            <h4 class="fs-filter-title"><?=$GLOBALS['text']['__filter__']?></h4>
            <div class="fs-filter-section">
                <h5 class="fs-filter-section-title active"><?=$GLOBALS['text']['__price__']?><i class="fs-icon-chevron"></i></h5>
                <div class="fs-filter-section-body">
                    <div class="fs-filter-range-slider">
                        <div class="range-slider">
                            <input type="text" name="price" class="js-range-slider" value="" />
                        </div>
                        <div class="extra-controls">
                            <input type="text"  class="js-input-from" value="0" />
                            <input type="text" class="js-input-to" value="10000" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="fs-filter-reset-btn-wrapper">
                <button class="fs-filter-reset-btn" type="reset" onclick="window.location = window.location.pathname;"><?=$GLOBALS['text']['__clear_filters__']?></button>
                <button class="fs-filter-reset-btn" type="submit"><?=$GLOBALS['text']['__apply__']?></button>
            </div>
        </form>
    </aside>
    <section style="width:80%">
        <div class="fs-product-slider owl-carousel owl-theme" style="margin-bottom:0">
        <?php foreach ($products as $index => $product) { ?>
            <div class="item">
                <?php  echo $this->renderFile('@app/views/site/prod.php',['product'=>$product]); ?>
            </div>
        <?php } ?>
        </div>
    </section>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/css/ion.rangeSlider.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.0/js/ion.rangeSlider.min.js"></script>
<script>
    setTimeout(function(){
        var $range_ = $(".js-range-slider"),
            $inputFrom = $(".js-input-from"),
            $inputTo = $(".js-input-to"),
            instance,
            min = 0,
            max = <?php echo $maxPrice; ?>,
            from = <?php echo $fromPrice; ?>,
            to = <?php echo $toPrice; ?>;

        $range_.ionRangeSlider({
            skin: "round",
            type: "double",
            min: min,
            max: max,
            from : <?php echo $fromPrice; ?>,
            to :<?php echo $toPrice; ?>,
            onStart: updateInputs,
            onChange: updateInputs
        });

        instance = $range_.data("ionRangeSlider");

        function updateInputs (data) {
            from = data.from;
            to = data.to;

            $inputFrom.prop("value", from);
            $inputTo.prop("value", to);
        }

        $inputFrom.on("input", function () {
            var val = $(this).prop("value");

            // validate
            if (val < min) {
                val = min;
            } else if (val > to) {
                val = to;
            }

            instance.update({
                from: val
            });
        });

        $inputTo.on("input", function () {
            var val = $(this).prop("value");

            // validate
            if (val < from) {
                val = from;
            } else if (val > max) {
                val = max;
            }

            instance.update({
                to: val
            });
        });
    },2500);
</script>