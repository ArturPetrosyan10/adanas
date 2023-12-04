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
    echo '<div class="filter-block">';

    foreach ($paramsToCategory as $pr){

        $param = FsParams::find()->where(['id'=>$pr['param_id']])->one();
        $paramChailds = FsParams::find()->where(['parent_id'=>$param['id']])->asArray()->all();

        echo '<div>';
        echo '<b style="margin-bottom:10px;">'.$param->name.'</b>';
        $info = '';
        if($param->type_ == 'select'){
            if(!empty($paramChailds) ) {
                $sl = '';
                if( @$param['id'] == 33){
                    $sl = 'colors';
                }
                echo '<select class="form-control standardSelect__ '. $sl.'" multiple name="property[' . $param['id'] . '][]"><option value=""></option>';
                foreach ($paramChailds as $paramL => $paramVal) {
                    $class= '';
                    if(isset($params)){

                        foreach ($paramsOrigin as $key => $value) {

                            if($paramVal["id"] == $value['value']){
                                $class='selected="selected"';
                                $variation = FsProductVariations::findOne(['param_id'=>$paramVal["id"] ,'product_id'=>$product->id]);
                                if( $param['id'] == 33){
                                    $info .='<div class="row" data-tp="' . $paramVal["name"] . '" style="border:1px solid lightgray;margin:10px;">
                                            <div class="col-sm-12" >' . $paramVal["name"] . '</div>
                                            <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="code__[]" value="'.$variation->code.'" placeholder="Կոդ">
                                                    <input type="hidden" name="vid_[]" value="'.$paramVal["id"].'">
                                            </div>
                                            <div class="col-sm-6">
                                               <input type="number" class="form-control"  value="'.$variation->price.'"  name="price_[]" step="0.1" placeholder="Արժեք">
                                             </div>
                                         </div>';
                                }
                            }
                        }
                    }
                    echo '<option '.$class.' value="' . $paramVal["id"] . '">' . $paramVal["name"] . '</option>';
                }
                echo '</select>';
            }
            echo '<div class="info-block">'.$info.'</div></div>';
        } else if($param->type_ == 'text'){
            $val= '';
            if(isset($params) && $params[$param['id']]){
                $val=$params[$param['id']];
            }
            echo '<div>
                      <input type="text" value="'.$val.'" class="form-control" id="prop_' . $param['id'] . '"  name="property[' .$param['id'] . ']">
                   </div>';
            echo '</div>';
        } else if($param->type_ == 'number'){
            $val= '';
            if(isset($params) && $params[$param['id']]){
                $val=$params[$param['id']];
            }
            echo '<div>
                      <input value="'.$val.'" class="form-control" id="prop_' .$param['id']. '"  type="number" name="property[' . $param['id']. ']" >
                   </div>';
            echo '</div>';
        }
    }
    echo '</div>';
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
        jQuery('.colors').on('change',function(){
            var txt = '';
            if(jQuery(this).val()){
                var ls = jQuery(this).val();
                for (let i = 0; i < ls.length; i++) {
                    var tct = jQuery(this).find('option[value="'+ls[i]+'"]').text();
                    if(jQuery('[data-tp='+jQuery(this).find('option[value="'+ls[i]+'"]').text()+']').length == 1){

                        txt += `<div class="row" style="border:1px solid lightgray;margin:10px;"  data-tp="`+tct+`">`;
                        txt += jQuery('[data-tp='+tct+']').html();
                        txt += `</div>`;
                        continue;
                    }
                    txt +=`<div class="row" style="border:1px solid lightgray;margin:10px;"  data-tp="`+tct+`">
                                   <div class="col-sm-12">`+tct+`</div>
                                   <div class="col-sm-6">
                                           <input type="text" class="form-control" name="code__[]" placeholder="Կոդ">
                                           <input type="hidden" name="vid_[]" value="`+ls[i]+`">
                                   </div>
                                   <div class="col-sm-6">
                                      <input type="number" class="form-control"  name="price_[]" step="0.1" placeholder="Արժեք">
                                    </div>
                                </div>`;
                }

                jQuery(this).closest('div').find('.info-block').html(txt);
            }
            // console.log(jQuery(this).val());
            // console.log(jQuery(this).find('option:selected').text());
        });
    },500);

</script>
