<?php if(!empty($categories)){ ?>
    <ul class="list-group">
    <?php foreach ($categories as $category){ ?>
        <li class="list-group-item" style="border:0px;padding:5px;">
            <label class='checkbox'>
                <input type='checkbox' data-name="<?php echo $category->name;?>" data-id="<?php echo $category->id;?>">
                <span class='indicator'></span>
                <?php echo $category->name;?>
            </label>
        </li>
    <?php }?>
    </ul>
    <br>

<?php } else { ?>
    <br>
    <div class="col-sm-12" style="padding-left:0px;">
        <h4 class="alert alert-warning">Այս հարցումով կատեգորիաներ չկան</h4>
    </div>
<?php } ?>