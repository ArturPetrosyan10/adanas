<input type="hidden" data-page='Measurement' id="page">
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
                                        <h4 class="box-title">Չափման միավորներ  
                                         <span class="buttons">
                                        
                                          <button class="btn btn-sm btn-default" id="copyMeasurement" ><i class="fa fa-copy"></i></button>
                                          <button class="btn btn-sm btn-default" id="editeMeasurement"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disableMeasurement"><i class="fa fa-trash"></i></button>
                                        </span>
                                       <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել</a>
                                       <a href="#" data-toggle="modal" data-target="#search" class="btn btn-succ fl"><i class="fa fa-search"></i></a>
                                       <?php if(isset($_GET['search'])){ ?>
                                         <a href="/admin/measurement" class="btn btn-succ fl" style="padding:5px;"><img src="/web/images/searchclose.png" alt="" width="25"></a>
                                       <?php } ?>
      
                                    </h4>
                                </div>
                                <div class="card-body--">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="">
                                                    <ul id="sortable" class="sortable list-unstyled ui-sortable show" style="">
                                                        <?php if(!empty($measurement)){ ?>
                                                            <?php foreach($measurement as $me => $meval){ ?>
                                                                <li data-id="<?php echo $meval->id;?>">
                                                                    <div class="block block-title">
                                                                      <span class="move ui-sortable-handle key<?php echo $meval->id;?>">
                                                                          <i class="fa fa-arrows-alt"></i>
                                                                      </span>
                                                                      <?php if($meval->status == 0){ ?>
                                                                         <i class="fa fa-close" style="color:red;"></i>
                                                                     <?php } ?>
                                                                    <b><?php echo $meval->name;?> (<?php echo $meval->code_;?>)</b>
                                                                    </div>
                                                                </li>
                                                           <?php } ?>
                                                       <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  

      

<!-- Modal -->
<div class="modal fade add-new" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addnew">Ավելացնել Չափման միավոր</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data"  id="Measurments_">
         <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
        
          <br><br>
           <div class="form-group">
              <input type="text" name="code_" placeholder="Կոդ" class="form-control">
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                        <div class="form-group">
                           <input type="text" name="name_ru" placeholder="Անուն" class="form-control">     
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                        <div class="form-group">

                            <input type="text" name="name_en" placeholder="Անուն" class="form-control">
                        </div>
                    </div>
                </div>

            </div>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
           
              <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել և փակել</button>
              <button type="button" class="btn btn-succ sendFormMs" id="save" value="true">Գրանցել</button>
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



   


