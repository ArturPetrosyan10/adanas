<div class="modal fade add-new" id="edite-category" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addnew">Խմբագրել կատեգորիան (<?php echo $category->name;?>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/category-update" method="post" enctype="multipart/form-data" id="Categories_ec">
         <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
         <span>Ծնող</span>
          <select class="standardSelect" name="parent_id">
            <option value=""></option>
               <?php echo display_list($categories, 'select');?>
          </select>
          <br><br>
           <div class="form-group">
              <?php if($type != 'copy'){ ?>
                  <input type="hidden" name="id" value="<?php echo $category->id;?>">
              <?php } ?>
              <input type="text" name="atg" value="<?php echo $category->atg;?>" placeholder="ATG" class="form-control">
              <?php if($category->photo){ ?>
              <img src="/<?php echo $category->photo;?>" alt="" width="100" style="margin-bottom: 10px;">
              <?php } ?>
              <br>
              <input type="file" name="img" class="form-control">
           </div>
           
          <div class="custom-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-copy-am" role="tab" aria-controls="custom-nav-am" aria-selected="true">Հայ</a>
                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-copy-ru" role="tab" aria-controls="custom-nav-ru" aria-selected="false">Ռուս</a>
                        <a class="nav-item nav-link " id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-copy-en" role="tab" aria-controls="custom-nav-en" aria-selected="false">Անգլ</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent_edite">
                    <br>
                    <div class="tab-pane fade active show" id="custom-nav-copy-am" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                        <div class="form-group ">
                            <input type="text" value="<?php echo $category->name;?>" name="name" required placeholder="Անուն" class="form-control">
                            <textarea name="description"  class="form-control" placeholder="Նկարագիր" rows="3"><?php echo $category->description;?></textarea>                           
                            <input type="text" name="meta_title" placeholder="Մետա վերնագիր" value="<?php echo $category->meta_title;?>" class="form-control">                         
                            <textarea name="meta_description" placeholder="Մետա նկարագիր" class="form-control" rows="3"><?php echo $category->meta_description;?></textarea>                        
                            <textarea name="meta_keywords" placeholder="Մետա հիմնաբառեր" class="form-control" rows="3"><?php echo $category->meta_keywords;?></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-copy-ru" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                        <div class="form-group">
                           <input type="text" value="<?php echo $categoryLangs->name_ru;?>" name="name_ru" placeholder="Անուն" class="form-control">                          
                            <textarea name="description_ru" class="form-control" placeholder="Նկարագիր" rows="3"><?php echo $categoryLangs->description_ru;?></textarea>
                            <input type="text" name="meta_title_ru" value="<?php echo $categoryLangs->meta_title_ru;?>" placeholder="Մետա վերնագիր" class="form-control">
                            <textarea name="meta_description_ru" placeholder="Մետա նկարագիր" class="form-control" rows="3"><?php echo $categoryLangs->meta_description_ru;?></textarea>
                            <textarea name="meta_keywords_ru" placeholder="Մետա հիմնաբառեր" class="form-control" rows="3"><?php echo $categoryLangs->meta_keywords_ru;?></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-copy-en" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                        <div class="form-group">
                            <input type="text" name="name_en" value="<?php echo $categoryLangs->name_en;?>" placeholder="Անուն" class="form-control">
                            <textarea name="description_en" placeholder="Նկարագիր" class="form-control" rows="3"><?php echo $categoryLangs->description_en;?></textarea>
                            <input type="text" name="meta_title_en" placeholder="Մետա վերնագիր" class="form-control" value="<?php echo $categoryLangs->meta_title_en;?>">
                            <textarea name="meta_description_en" placeholder="Մետա նկարագիր" class="form-control" rows="3"><?php echo $categoryLangs->meta_description_en;?></textarea>
                            <textarea name="meta_keywords_en" placeholder="Մետա հիմնաբառեր" class="form-control" rows="3"><?php echo $categoryLangs->meta_keywords_en;?></textarea>
                        </div>
                    </div>
                </div>

            </div>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
              <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել և փակել</button>
              <button type="button" class="btn btn-succ sendFormCopyEdite" name="add" value="true">Գրանցել</button>
        <br>
              <div class="info-bl-ec"></div>
        </form>
      </div>
    
    </div>
  </div>
</div>
<script>
     jQuery('#edite-category').modal('show');
    
     jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            placeholder_text_single: "Ընտրել",
            no_results_text: "Oops, nothing found!",
             width: "100%"
        }).val(<?php echo $category->parent_id;?>).trigger("chosen:updated");
</script>
<?php  

function display_list($nested_categories, $type = 'sortable', $level = 0)
{
  
      foreach($nested_categories as $nested){
        $c ='';
        for ($i=0; $i < $level ; $i++) { 
            $c = $c.'-';
        }
        $list .= '<option value="'.$nested['id'].'">'.$c.$nested['name'].'</option>';
        if( ! empty($nested['child'])){
          $list .= display_list($nested['child'],$type,$level+1);
        }
        $f++;
      }
  
  
  return $list;
}
?>
