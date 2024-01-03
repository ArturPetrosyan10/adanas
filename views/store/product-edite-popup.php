<?php

use app\models\AdCategories;
use app\models\FsParamToCategory;
   use app\models\FsCategories;
?>
<div class="modal fade add-new" id="edite-product" tabindex="-1" role="dialog" aria-labelledby="edite-product" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Խմբագրել ապրանք (<?php echo $product->name;?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="Product_edite">
                    <input type="hidden" name="id" value="<?php echo $product->id;?>">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <span style="margin-bottom: 4px;color: #878787;">Կատեգորիա</span>
                    <select class="standardSelect" id="category_edite" name="category_id">
                        <option value=""></option>
                        <?php echo display_list($categories, 'select');?>
                    </select>
                    <br><br>
                    <div class="form-group">
                        <button data-toggle="collapse"  data-target="#showProps__" class="btn" type="button"><i class="fa fa-cogs"></i> Պարամետրեր</button>
                        <div class="collapse" id="showProps__">
                            <?php
                            
                               $category = AdCategories::findOne(['id'=>$product->category_id]);
                               if ($category && false){
                                    $ids = $category->getAllParents();
                                    $ids_all = [];
                                    if(!empty($ids)){
                                        foreach($ids as $id_ => $id_val){
                                            $ids_all[] = $id_val->id;
                                        }
                                    }
                                    $ids_all[] = $id;
                                    $paramsToCategory = FsParamToCategory::find()->where(['category_id'=>$ids_all])->asArray()->all();
                                    echo  Yii::$app->view->renderFile('@app/views/admin/get-param.php',['params'=>$params,
                                        'paramsToCategory'=>$paramsToCategory,
                                        'product'=>$product,
                                        'category_id'=>$product->category_id,
                                        'paramsOrigin' => $paramsOrigin]);
                               }
                                       ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <span style="margin-bottom: 4px;color: #878787;">Չափման միավոր</span>
                            <select class="standardSelectM"  name="measuremnet_id">
                                <option value=""></option>
                                <?php foreach ($measurement as $ms => $msVal){ ?>
                                    <option <?php if( $msVal['id'] == $product->qty_type){ echo 'selected';}?> value="<?php echo $msVal['id'];?>"><?php echo $msVal['name'];?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Ապրանքի կոդ</span>
                            <input type="text" name="code_" value="<?php echo $product->code_;?>" placeholder="Ապրանքի կոդ" class="form-control">
                            <br>
                            <span style="margin-bottom: 4px;color: #878787;">Արտիկուլ</span>
                            <input type="text" name="vendor_code" value="<?php echo $product->vendor_code;?>" placeholder="Արտիկուլ" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row" style="margin:10px 0px;">
                            <div class="col-sm-6" style="color: #878787;padding-left:0px;">Նկար  <input type="file" multiple name="img[]">
                                <?php if(!empty($product->image)){?>
                                    <br><br>
                                    <?php $images = $product->images;?>
                                        <?php foreach ($images as $img){ ?>
                                            <span style="position:relative;display:inline-block;width:60px;height:50px;">
                                              <input type="hidden" value="<?php echo $img->id;?>">
                                               <img src="/<?php echo $img->name;?>" height="45" alt="" style="border:1px solid lightgray;margin:5px;">
                                               <div onclick="removeImg(jQuery(this),<?= $img->id ?>)" style="position:absolute;top:-5px;right:-5px;color:red;cursor:pointer;"><i class="fa fa-close"></i></div>
                                            </span>
                                        <?php } ?>
                                <?php } ?>
                            </div>
<!--                            <div class="col-sm-6" style="color: #878787;padding-left:0px;">Վիդեո  <input type="file" name="video">-->
<!--                                --><?php //if(!empty($product->video)){?>
<!--                                    <video width="320" height="240" controls>-->
<!--                                        <source src="/--><?php //echo $product->video;?><!--" type="video/mp4">-->
<!--                                        <source src="/--><?php //echo $product->video;?><!--" type="video/ogg">-->
<!--                                        Your browser does not support the video tag.-->
<!--                                    </video>-->
<!--                                --><?php //} ?>
<!--                            </div>-->
                        </div>
                        <div style="padding:5px;" class="is_types">
                   <span>
<!--                       <input id="prop_new" --><?php //if($product->send_notice){ echo 'checked';}?><!--  type="checkbox" name="is_new" value="1">-->
<!--                       <label for="prop_new"  style="color: #878787;padding-left:0px;">նոր ապրանք</label>-->
                   </span>
                            <span>
<!--                        <input id="prop_aah" type="checkbox" name="is_aah" value="1">-->
<!--                        <label for="prop_aah" --><?php //if($product->is_aah){ echo 'checked';}?><!-- style="color: #878787;padding-left:0px;">ԱԱՀ 20%</label>-->
                   </span>
                            <span>
<!--                        <input id="prop_procent" type="checkbox" --><?php //if($product->is_tax){ echo 'checked';}?><!--  name="is_tax" value="1">-->
<!--                       <label for="prop_procent"  style="color: #878787;padding-left:0px;">Ակցիզի տոկոս</label>-->

                   </span>
                   <span>
<!--                       <input id="prop_anim" type="checkbox" name="is_env" --><?php //if($product->is_env){ echo 'checked';}?><!--  value="1">-->
<!--                       <label for="prop_anim"  style="color: #878787;padding-left:0px;">Բնապահպանական հարկ</label>-->
                   </span>
                        </div>
                        <div class="procs">
<!--                            <div class="tax-block --><?php //if(!$product->is_tax){ echo 'hide';}?><!-- ">-->
<!--                                <label for="prop_tax_proc"  style="color: #878787;padding-left:0px;">Ակցիզի տոկոս</label>-->
<!--                                <input type="number" value="--><?php //echo $product->env_procent;?><!--" id="prop_tax_proc" step="0.01" name="anim_procent" class="anim-proc form-control">-->
<!--                            </div>-->
<!--                            <div class="anim-block --><?php //if(!$product->is_env){ echo 'hide';}?><!--">-->
<!--                                <label for="prop_anim_proc"  style="color: #878787;padding-left:0px;">Բնապահպանական հարկ</label>-->
<!--                                <input type="number" id="prop_anim_proc" value="--><?php //echo $product->tax_procent;?><!--" step="0.01" name="tax_procent" class="tax-proc form-control">-->
<!--                            </div>-->
                        </div>
                        <div class="comment">
                            <label for="com" style="margin-bottom: 4px;color: #878787;">Մեկնաբանություն</label>
                            <textarea id="com" name="comment"  cols="5" rows="2" class="form-control"><?php echo $product->comment;?></textarea>
                        </div>
                    </div>
                    <div class="custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
<!--                                <a class="nav-item nav-link active show" id="custom-nav-product-am-edite-tab" data-toggle="tab" href="#custom-nav-product-am-edite" role="tab" aria-controls="custom-nav-product-am-edite" aria-selected="true">Հայ</a>-->
<!--                                <a class="nav-item nav-link" id="custom-nav-product-ru-edite-tab" data-toggle="tab" href="#custom-nav-product-ru-edite" role="tab" aria-controls="custom-nav-product-ru-edite" aria-selected="false">Ռուս</a>-->
<!--                                <a class="nav-item nav-link " id="custom-nav-product-en-edite-tab" data-toggle="tab" href="#custom-nav-product-en-edite" role="tab" aria-controls="custom-nav-product-en-edite" aria-selected="false">Անգլ</a>-->
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent"><br>
                            <div class="tab-pane fade active show" id="custom-nav-product-am-edite" role="tabpanel" aria-labelledby="custom-nav-product-am-edite-tab">
                                <div class="form-group ">
                                    <input type="text" name="name" value="<?php echo $product->name;?>" required placeholder="Անուն" class="form-control">
                                    <textarea name="description" class="form-control" placeholder="Նկարագիր" rows="3"><?php echo $product->description;?></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                    <button type="button" class="btn btn-succ sendFormProductEdite" name="edite" value="true">Գրանցել</button>
                    <button type="submit" class="btn btn-succ" name="edite" value="true">Գրանցել և փակել</button>
                    <br>
                    <div class="info-bl"></div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery('#edite-product').modal('show');
 
    var id = jQuery('#category_edite').val();        
    var atg__ = '<?php echo $category->atg;?>';
        atg__ = atg__.replaceAll(0,'\\0');
        atg__ = atg__.replaceAll(9,'\\9');
    Inputmask(atg__+'999999999').mask(".atg_");
    jQuery(".standardSelect").chosen({
        disable_search_threshold: 10,
        placeholder_text_single: "Ընտրել",
        no_results_text: "Oops, nothing found!",
        width: "100%"
    }).val(<?php echo $product->category_id;?>).trigger("chosen:updated");

    jQuery('#category_id').change();
    jQuery(".standardSelectM").chosen({
        disable_search_threshold: 10,
        placeholder_text_single: "Ընտրել",
        no_results_text: "Oops, nothing found!",
        width: "100%"
    });
</script>
<?php

function display_list($nested_categories, $type = 'sortable', $level = 0, $ch = true)
{

    foreach($nested_categories as $nested){
        $c ='';
        for ($i=0; $i < $level ; $i++) {
            $c = $c.'-';
        }
        if( ! empty($nested['child']) && $ch){
            $list .= '<option disabled data-atg="'.$nested['atg'].'" value="'.$nested['id'].'">'.$c.$nested['name'].' ('.$nested['atg'].')</option>';
         } else {
             $list .= '<option data-atg="'.$nested['atg'].'" value="'.$nested['id'].'">'.$c.$nested['name'].' ('.$nested['atg'].')</option>';
         }
  
        if( ! empty($nested['child'])){
            $list .= display_list($nested['child'],$type,$level+1);
        }
    }


    return $list;
}
?>
