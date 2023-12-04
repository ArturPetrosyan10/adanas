<div class="modal fade add-new" id="edite-brand" tabindex="-1" role="dialog" aria-labelledby="edite-brand" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Խմբագրել ապրանքանիշ (<?php echo $brand->name;?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $brand->id;?>">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <span>Անուն</span>
                    <input type="text" name="FsBrands[name]" value="<?php echo $brand->name;?>" required placeholder="Անուն" class="form-control">
                    <span>Կատեգորիաներ</span>
                    <select class="multySelect" name="category_id[]" multiple>
                        <option value=""></option>
                        <?php if(!empty($categories)){
                            foreach ($categories as $category => $cat_val){?>
                                <?php $s = ''; if( isset($brandCats[$cat_val['id']])){
                                    $s = 'selected';
                                } ?>
                                <option <?php echo $s;?>  value="<?php echo $cat_val['id'];?>"><?php echo $cat_val['name'];?></option>
                        <?php }};?>
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
    jQuery('#edite-brand').modal('show');
    jQuery(".multySelect").chosen({
        disable_search_threshold: 10,
        placeholder_text_single: "Ընտրել",
        no_results_text: "Ոչինչ չի գտնվել",
        width: "100%"
    });
</script>