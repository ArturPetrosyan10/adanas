<?php foreach ($variations as $index => $variation) { ?>
    <div class="border fs-single-min-thumbnail m-0 h-auto mt-3 changeProductVariation"
         data-var_id="<?= $variation->id ?>"
         data-var_price="<?= $variation->price ?>"
    >
        <div class="">
            <img width="100" style="height:100px; object-fit:contain" src="/<?= $variation->img ?>" >
        </div>
        <?php foreach ($variation->variationParams as $index => $variationParam) { ?>
        <span class="d-flex justify-content-between px-2">
            <p><?= $variationParam->paramName->parent->name ?></p>
            <h5 style="width: -webkit-fill-available; text-align: right;"> <?= $variationParam->paramName->name ?></h5>
        </span>
        <?php } ?>
    </div>
<?php } ?>