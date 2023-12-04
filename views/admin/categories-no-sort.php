<input type="hidden" data-page='Categories' id="page">
          <?php if(isset($_GET['success'])){ ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                Հաջողությամբ պահպանվեց
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <script>
                  <?php if(isset($_GET['id'])){ ?>
                 setTimeout(function(){
                     jQuery('.<?php echo $_GET['id'];?>').closest('.block').click();
                 },1000);
                   
               <?php } ?>
        

var url = window.location.href;
    url = url.split('?')[0];
     window.history.replaceState({}, document.title, url);
            </script>
          <?php } ?>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body"> 
                                    <h4 class="box-title">Կատեգորիաներ     
                                       <span class="buttons">
                                          <span class="overlay show_"></span>
                                          <button class="btn btn-sm btn-default" id="add" style="margin-left:30px;"><i class="fa fa-plus"></i></button>
                                          <button class="btn btn-sm btn-default" id="copy" ><i class="fa fa-copy"></i></button>
                                          <button class="btn btn-sm btn-default" id="edite"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disable"><i class="fa fa-trash"></i></button>
                                        </span>
                                     <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել</a>
                                     <a href="#" data-toggle="modal" data-target="#search" class="btn btn-succ fl" style="margin-left:10px;"><i class="fa fa-search"></i></a>
                                     <a href="/admin/categories" class="btn btn-succ fl" style="padding:5px;"><img src="/web/images/searchclose.png" alt="" width="25"></a>
                                    </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="">
                                                        <?php if(!empty($categories)){ ?>
                                                            <?php echo display_list($categories);?>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
    <?php 
    $f = 0;
    function display_list($nested_categories, $type = 'sortable', $level = 0)
{
  if($type == 'sortable'){  
      if($f==0){
        $list = '<ul  class="sortable list-unstyled" >';
      } else {
         $list = '<ul class="sortable list-unstyled" >';
      }
      $f++;
      foreach($nested_categories as $nested){
                 $list .= '<li data-id="'.$nested['id'].'"><div class="block block-title" >';
                 if($nested['status'] == 0){
                    $list .= '<i class="fa fa-close" style="color:red;left:20px;"></i>';
                 }
                 $list .= ' <b>'.$nested['name'].' ('.$nested['atg'].') ';
                    $list .= '</b>';
                   
        $list .=     '
                   </div>';
      }
      $list .= '</ul>';
  } else {
      foreach($nested_categories as $nested){
        $c ='';
        for ($i=0; $i < $level ; $i++) { 
            $c = $c.'-';
        }
        $list .= '<option value="'.$nested['id'].'">'.$c.$nested['name'].' ('.$nested['atg'].')</option>';
        if( ! empty($nested['child'])){
          $list .= display_list($nested['child'],$type,$level+1);
        }
        $f++;
      }
  }
  
  return $list;
}
?>
      

<!-- Modal -->
<div class="modal fade add-new" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addnew">Ավելացնել կատեգորիա</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data" id="Categories_">
         <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
         <span>Ծնող</span>
          <select class="standardSelect" name="parent_id">
            <option value=""></option>
               <?php echo display_list($categories, 'select');?>
          </select>
          <br><br>
           <div class="form-group">
              <input type="text" name="atg" placeholder="ATG" class="form-control">
              <input type="file" name="img" class="form-control">
           </div>
           
          <div class="custom-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Հայ</a>
                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Ռուս</a>
                        <a class="nav-item nav-link " id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Անգլ</a>
                    </div>
                </nav>
                        <div class="tab-content" id="nav-tabContent">
                    <br>
                    <div class="tab-pane fade active show" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                        <div class="form-group ">
                            <input type="text" name="name" required placeholder="Անուն" class="form-control">
                            <textarea name="description" class="form-control" placeholder="Նկարագիր" rows="3"></textarea>                           
                            <input type="text" name="meta_title" placeholder="Մետա վերնագիր" class="form-control">                         
                            <textarea name="meta_description" placeholder="Մետա նկարագիր" class="form-control" rows="3"></textarea>                        
                            <textarea name="meta_keywords" placeholder="Մետա հիմնաբառեր" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                        <div class="form-group">
                           <input type="text" name="name_ru" placeholder="Անուն" class="form-control">                          
                            <textarea name="description_ru" class="form-control" placeholder="Նկարագիր" rows="3"></textarea>
                            <input type="text" name="meta_title_ru" placeholder="Մետա վերնագիր" class="form-control">
                            <textarea name="meta_description_ru" placeholder="Մետա նկարագիր" class="form-control" rows="3"></textarea>
                            <textarea name="meta_keywords_ru" placeholder="Մետա հիմնաբառեր" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                        <div class="form-group">

                            <input type="text" name="name_en" placeholder="Անուն" class="form-control">
                            <textarea name="description_en" placeholder="Նկարագիր" class="form-control" rows="3"></textarea>
                            <input type="text" name="meta_title_en" placeholder="Մետա վերնագիր" class="form-control">
                            <textarea name="meta_description_en" placeholder="Մետա նկարագիր" class="form-control" rows="3"></textarea>
                            <textarea name="meta_keywords_en" placeholder="Մետա հիմնաբառեր" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>

            </div>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
              <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել և փակել</button>
              <button type="button" class="btn btn-succ sendForm" name="add" value="true">Գրանցել</button>
              <br>
              <div class="info-bl"></div>
        </form>
      </div>
    
    </div>
  </div>
</div>
<div class="modal fade search" id="search" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addnew">Որոնում</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="get" enctype="multipart/form-data">
        <div class="row form-group">
               <div class="form-check form-check-inline frmfirst">
                  <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" checked value="1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    Սկզբում
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="2">
                  <label class="form-check-label" for="flexRadioDefault2">
                   Վերջում
                  </label>
                </div>
                  <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="flexRadioDefault3" value="3">
                  <label class="form-check-label" for="flexRadioDefault3">
                   Մեջտեղում
                  </label>
                </div>
                   <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type" id="flexRadioDefault4" value="4">
                  <label class="form-check-label" for="flexRadioDefault4">
                   Պարունակում է
                  </label>
                </div>
                  <br> <br>
                <div class="col col-md-12">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-succ">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <input type="text" id="input1-group2" name="search" placeholder="ԱՆվանում" class="form-control">
                    </div>
                </div>
            </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
<div class="modals">
    
</div>



   


