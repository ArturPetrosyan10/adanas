<div class="modal fade add-new" id="editenew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Փոփոխել խանութ ( <?php echo $store->name;?> )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $store->id;?>">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <span>Անուն</span>
                    <input type="text" name="FsStores[name]" value="<?php echo $store->name;?>" required placeholder="Անուն" class="form-control">
                    <span>Հվհհ</span>
                    <input type="text" name="FsStores[hvhh]" value="<?php echo $store->hvhh;?>"   placeholder="Հվհհ" class="form-control">
                    <span>Հասցե</span>
                    <input type="text" name="FsStores[address]" value="<?php echo $store->address;?>"   placeholder="Հասցե" class="form-control">
                    <span>Լոգո</span>
                    <?php if(!empty($store->logo)){?>
                        <img src="/<?php echo $store->logo;?>" height="60" alt="">
                    <?php } ?>
                    <input type="file" name="img" >
                    <span>Կարգավիճակ</span>
                    <select name="FsStores[status]" id="" class="form-control">
                        <option value="1"  <?php if(!empty($store->status) == 1){ echo 'selected';}?>>Ակտիվ</option>
                        <option value="0" <?php if(!empty($store->status) == 0){ echo 'selected';}?>>Պասիվ</option>
                    </select>
                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                    <button type="submit" class="btn btn-succ" name="edite" value="true">Գրանցել</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery('#editenew').modal('show');
</script>