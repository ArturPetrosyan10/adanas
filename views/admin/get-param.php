<?php
use app\models\FsBrandToCategory;
use app\models\FsParams;
use app\models\FsProductVariations;
if($category_id){
    $category = \app\models\FsCategories::findOne($category_id);
    $category = $category->getParentFirstLevel();

    $brands = FsBrandToCategory::find()->where(['category_id'=>$category->id])->orderBy(['id' => SORT_DESC])->groupBy('brand_id')->all();

    ?>
    <span>Ապրանքանիշ</span>
    <select class="form-control" name="brand_id">
        <?php if(!empty($brands)){ ?>
            <?php foreach ($brands as $brand => $brand_val){
                $br = \app\models\FsBrands::findOne(['id'=>$brand_val['brand_id']]);
                $sl = '';
                if(isset($product) && $product->brand_id == $br['id']){
                    $sl = 'selected';
                }
                ?>
                <option <?php echo $sl;?> value="<?php echo $br['id'];?>"><?php echo $br['name'];?></option>
            <?php } ?>
        <?php } ?>
    </select>
<?php }
if(!empty($paramsToCategory)){
    $product_variation_params = $product_variation_params ?? ['0' => '0'];
    $counter = 0;
    foreach ($product_variation_params as $index => $variation_param ) {
//        echo '<pre>';
//        var_dump($variation_param);
//        echo '</pre>';
        $img_div = '<div class="col-sm-3" style="color: #878787;padding-left:0px;"> Նկար  <input type="file" name="img_variation[' . $counter . '][]" ></div>';
        if(isset($variation_param['img'])){
            $img_div .= '<span style="position:relative;display:inline-block;width:60px;height:50px; margin-top:auto;"> 
                            <input type="hidden" name="old_var_img['.$counter.']" value="'.$variation_param['img'].'">
                            <img src="/'. $variation_param['img'] .'" alt="'. $variation_param['img'] .'"  height="45" alt="" style="border:1px solid lightgray;margin:5px;">
                            <div onclick="jQuery(this).closest(`span`).remove()" style="position:absolute;top:-5px;right:-5px;color:red;cursor:pointer;"><i class="fa fa-close"></i></div>
                         </span>';
        }
        echo '<div class="filter-block position-relative" data-row="' . $counter . '">';
        foreach ($paramsToCategory as $pr) {
            $param = FsParams::find()->where(['id' => $pr['param_id']])->one();
            $paramChailds = FsParams::find()->where(['parent_id' => $param['id']])->asArray()->all();
            echo '<div>';
            echo '<b style="margin-bottom:10px;">' . $param->name . '</b>';
            $info = '';
            if ($param->type_ == 'select') {
                if (!empty($paramChailds)) {
                    $var_params = array_column($variation_param['variationParams'],'param_id');
                    echo '<select  class="form-control standardSelect__ "   name="property[' . $counter . '][' . $param['id'] . '][]" data-id="' . $param['id'] . '" >
                            <option value=""></option>';
                    foreach ($paramChailds as $paramL => $paramVal) {
                        if (isset($params)) {
                            $class =  in_array($paramVal["id"],$var_params) ? 'selected' : 'asfd' ;
                            echo '<option ' . $class . ' value="' . $paramVal["id"] . '">' . $paramVal["name"] . '</option>';
                        }
                    }
                    echo '</select>';
                }
                echo '<div class="info-block">' . $info . '</div></div>';
            } else if ($param->type_ == 'text') {
                $val = '';
                if (isset($params) && $params[$param['id']]) {
                    $val = $params[$param['id']];
                }
                echo '<div>
                      <input type="text" value="' . $val . '" class="form-control" id="prop_' . $param['id'] . '"   name="property[' . $counter . '][' . $param['id'] . ']">
                   </div>';
                echo '</div>';
            } else if ($param->type_ == 'number') {
                $val = '';
                if (isset($params) && $params[$param['id']]) {
                    $val = $params[$param['id']];
                }
                echo '<div>
                      <input value="' . $val . '" class="form-control" id="prop_' . $param['id'] . '"  type="number"  name="property[' . $counter . '][' . $param['id'] . ']" >
                   </div>';
                echo '</div>';
            }

        }
        $addict_div = '<div style="position:relative"> ';
        $addict_div .= '<b style="margin-bottom:10px;">Գին</b>' . '<input type="number" class="form-control" name="variations__price__[' . $counter . ']" value="'. $variation_param['price'] .'" >';
        $addict_div .= '</div>';
        echo $addict_div;
        echo $img_div;
        echo '<button class="btn btn-sm addParamVariation" style="position: absolute; right: 3.2rem;background: none;top: 1.6rem;" type="button"><i class="fa fa-plus"></i></button>';
        echo '<button class="btn btn-sm minuseParamVariation" style="position: absolute; right: 1rem;background: none;top: 1.6rem;" type="button"><i class="fa fa-minus"></i></button>';
        echo '</div>';
        $counter++;

    }
};?>
<style>
    .filter-block{
        margin-top:10px;
        border:1px solid lightgrey;
        display:flex;
        flex-wrap:wrap;
    }
    .filter-block>div{
        margin:5px;
        padding-right:10px;
    }
    label{
        cursor:pointer;
    }
</style>
<script>
    setTimeout(function(){
        jQuery(".filter-block .standardSelect__").chosen({
            disable_search_threshold: 10,
            placeholder_text_single: "Ընտրել",
            placeholder_text_multiple: "Ընտրել",
            width: "100%"
        }).trigger('chosen:updated');
    },500);
    jQuery('body').on('click','.minuseParamVariation',function(){
        delete_row(jQuery(this));
    });
    jQuery('body').on('click','.addParamVariation',function(){
        copy_row(jQuery(this));
    });

    function copy_row(el) {
        let originalSelect = el.closest('.filter-block').find(".standardSelect__").chosen('destroy');
        let elCopy = el.closest('.filter-block').clone();
        let row_id = jQuery('body').find('.filter-block').last().data('row');

        el.closest('.collapse').append(elCopy);

        changeAttr('.filter-block','data-row',row_id+1)
        jQuery('body').find('.filter-block').last().find('input , select').each(function () {
            let name = jQuery(this).attr('name');
            let new_name = change_names(name , row_id+1);
            jQuery(this).attr('name',new_name);
        });

        jQuery(".filter-block .standardSelect__").chosen({
            disable_search_threshold: 10,
            placeholder_text_single: "Ընտրել",
            placeholder_text_multiple: "Ընտրել",
            width: "100%"
        }).trigger('chosen:updated');
    }
    function changeAttr(classname,attr,value){
        let elems = document.querySelectorAll(classname);
        let latest_block = elems[elems.length - 1];
        latest_block.setAttribute(attr, value);
    }
    function change_names(str,value){
        let updatedStr = str.replace(/\[\d+\]/, '[' + value + ']');
        return updatedStr;
    }
    function delete_row(el){
        el.closest('.filter-block').remove();
    }
</script>
