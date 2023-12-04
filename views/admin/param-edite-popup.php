<div class="modal fade add-new" id="copy-param" tabindex="-1" role="dialog" aria-labelledby="copy-param" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Փոփոխել պարամետր ( <?php echo $param->name;?> )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <br>
                    <p>Տեսակը</p>
                    <input type="hidden" name="id" value="<?php echo $param->id;?>">
                    <select name="type_" id="type" class="form-control">
                        <option value="select">Տեսակ</option>
                        <option value="select" <?php if($param->type_ == 'select'){ echo 'selected';};?>>Կատալոգ</option>
                        <option value="text" <?php if($param->type_ == 'text'){ echo 'selected';};?>>Տեքստ</option>
                        <option value="number" <?php if($param->type_ == 'number'){ echo 'selected';};?>>թիվ</option>
                    </select>
                    <p>Կատեգորիաններ</p>
                    <select class="multySelect" data-placeholder="Ընտրել" name="category_id[]" multiple >
                        <option value=""></option>
                        <?php echo display_list($categories,0,$paramsToCategory);?>
                    </select>
                    <div class="custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active show" id="custom-nav-am-tab" data-toggle="tab" href="#custom-nav-am" role="tab" aria-controls="custom-nav-am" aria-selected="true">Հայ</a>
                                <a class="nav-item nav-link" id="custom-nav-ru-tab" data-toggle="tab" href="#custom-nav-ru" role="tab" aria-controls="custom-nav-ru" aria-selected="false">Ռուս</a>
                                <a class="nav-item nav-link " id="custom-en-contact-tab" data-toggle="tab" href="#custom-nav-en" role="tab" aria-controls="custom-nav-en" aria-selected="false">Անգլ</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="max-height: 400px;overflow: auto;">
                            <br>
                            <div class="tab-pane fade active show" id="custom-nav-am" role="tabpanel" aria-labelledby="custom-nav-am-tab">
                                <div class="form-group ">
                                    <input type="text" name="name" value="<?php echo $param->name;?>" required placeholder="Անուն" class="form-control">
                                </div>

                                <div class="form-group clone" style="padding-left:20px;display: none;position: relative;">
                                    <button class="btn btn-sm addParam" style="position: absolute;top:3px;left: -9px;background: none;" type="button"><i class="fa fa-plus" ></i></button>
                                    <input type="text" name="property_am[]"  placeholder="Պարամետր" class="form-control">
                                </div>
                                <?php if(!empty($paramChailds)){
                                    foreach ($paramChailds as $pr){
                                        echo '<div class="form-group" style="padding-left: 20px; display: block; position: relative;">
                                                        <button class="btn btn-sm addParam" style="position: absolute;top:3px;left: -9px;background: none;" type="button"><i class="fa fa-plus"></i></button>
                                                        <input type="text" name="property_am[]" value="'.$pr["name"].'" placeholder="Պարամետր" class="form-control">
                                                    </div>';
                                    }
                                };?>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-ru" role="tabpanel" aria-labelledby="custom-nav-ru-tab">
                                <div class="form-group">
                                    <input type="text" name="name_ru" value="<?php echo $param->name_ru;?>" placeholder="Անուն" class="form-control">
                                </div>
                                <div class="form-group clone_ru" style="padding-left:20px;display: none;">
                                    <input type="text" name="property_ru[]"  placeholder="Պարամետր" class="form-control">
                                </div>
                                <?php if(!empty($paramChailds)){
                                    foreach ($paramChailds as $pr){
                                        echo '<div class="form-group" style="padding-left: 20px; display: block; position: relative;">
                                                        <button class="btn btn-sm addParam" style="position: absolute;top:3px;left: -9px;background: none;" type="button"><i class="fa fa-plus"></i></button>
                                                        <input type="text" name="property_ru[]" value="'.$pr["name_ru"].'" placeholder="Պարամետր" class="form-control">
                                                    </div>';
                                    }
                                };?>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-en" role="tabpanel" aria-labelledby="custom-nav-en-tab">
                                <div class="form-group">
                                    <input type="text" name="name_en" value="<?php echo $param->name_en;?>" placeholder="Անուն" class="form-control">
                                </div>
                                <div class="form-group clone_en" style="padding-left:20px;display: none;">
                                    <input type="text" name="property_en[]"  placeholder="Պարամետր" class="form-control">
                                </div>
                                <?php if(!empty($paramChailds)){
                                    foreach ($paramChailds as $pr){
                                        echo '<div class="form-group" style="padding-left: 20px; display: block; position: relative;">
                                                        <button class="btn btn-sm addParam" style="position: absolute;top:3px;left: -9px;background: none;" type="button"><i class="fa fa-plus"></i></button>
                                                        <input type="text" name="property_en[]" value="'.$pr["name_en"].'" placeholder="Պարամետր" class="form-control">
                                                    </div>';
                                    }
                                };?>
                            </div>
                        </div>


                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                    <button type="submit" class="btn btn-succ" name="edite" value="true">Գրանցել և փակել</button>
                    <button type="button" class="btn btn-succ" id="save" value="true">Գրանցել</button>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery('#copy-param').modal('show');
    jQuery(".multySelect").chosen({
        disable_search_threshold: 10,
        placeholder_text_single: "Ընտրել",
        no_results_text: "Ոչինչ չի գտնվել",
        width: "100%"
    });
</script>
<?php

function display_list($nested_categories, $level = 0, $paramsToCategory = [])
{
    foreach ($nested_categories as $nested) {
        $c = '';
        for ($i = 0; $i < $level; $i++) {
            $c = $c . '-';
        }
        $stat = '';

        if(isset($paramsToCategory[$nested['id']])){
            $stat = 'selected';
        }
        $list .= '<option '.$stat.' value="' . $nested['id'] . '">' . $c . $nested['name'] . ' (' . $nested['atg'] . ')</option>';
        if (!empty($nested['child'])) {
            $list .= display_list($nested['child'], $level + 1,$paramsToCategory);
        }
    }
    return $list;
}
?>
