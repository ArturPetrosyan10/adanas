<?php if(!empty($products)){ ?>
    <ul class="list-group">
    <?php foreach ($products as $product){ ?>
        <li class="list-group-item" style="border:0px;padding:5px;">
            <label class='checkbox'>
                <input type='checkbox' data-name="<?php echo $product->name;?>" data-id="<?php echo $product->id;?>">
                <span class='indicator'></span>
                <?php echo $product->name;?>
            </label>
        </li>
    <?php }?>
    </ul>
    <br>

<?php } else { ?>
    <br>
    <div class="col-sm-12" style="padding-left:0px;">

        <h4 class="alert alert-warning">Այս հարցումով ապրանքներ չկան</h4>
    </div>
<?php } ?>