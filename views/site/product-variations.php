<?php foreach ($variations as $index => $variation) { ?>
    <div class="border fs-single-min-thumbnail m-0 h-auto mt-3 changeProductVariation"
         data-var_id="<?= $variation->id ?>"
         data-var_price="<?= $variation->price ?>"
    >
        <div class="">
            <img width="100" src="/<?= $variation->img ?>" >
        </div>
        <?php foreach ($variation->variationParams as $index => $variationParam) { ?>
        <span class="d-flex justify-content-between px-2">
            <p><?= $variationParam->paramName->parent->name ?></p>
            <h5> <?= $variationParam->paramName->name ?></h5>
            <br>
        </span>
        <?php } ?>
    </div>
<?php } ?>