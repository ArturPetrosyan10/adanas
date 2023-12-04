<?php if(!empty($partners)){ ?>
    <ul class="list-group">
        <?php foreach ($partners as $partner){ ?>
            <li class="list-group-item" style="border:0px;padding:5px;">
                <label class='checkbox'>
                    <input type='checkbox' data-name="<?php echo $partner->legal_name;?>" data-id="<?php echo $partner->id;?>">
                    <span class='indicator'></span>
                    <?php echo $partner->legal_name;?>
                </label>
            </li>
        <?php }?>
    </ul>
    <br>

<?php } else { ?>
    <br>
    <div class="col-sm-12" style="padding-left:0px;">
        <h4 class="alert alert-warning">Գործընկերներ չկան</h4>
    </div>
<?php } ?>