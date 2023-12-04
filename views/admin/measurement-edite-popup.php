<div class="modal fade add-new" id="edite-meas" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addnew">Խմբագրել Չափման միավոր (<?php echo $measurement->name;?>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" id="Measurments_edite">
         <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
        
          <br><br>
           <div class="form-group">
               <input type="hidden" name="id" value="<?php echo $measurement->id;?>">
              <input type="text" name="code_" value="<?php echo $measurement->code_;?>" placeholder="Կոդ" class="form-control">
           </div>
           
          <div class="custom-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active show" id="custom-nav-meas_em-tab" data-toggle="tab" href="#custom-nav-meas_em" role="tab" aria-controls="custom-nav-home" aria-selected="true">Հայ</a>
                        <a class="nav-item nav-link" id="custom-nav-meas_ru-tab" data-toggle="tab" href="#custom-nav-meas_ru" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Ռուս</a>
                        <a class="nav-item nav-link " id="custom-nav-meas_en-tab" data-toggle="tab" href="#custom-nav-meas_en" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Անգլ</a>
                    </div>
                </nav>
               <div class="tab-content" id="nav-tabContent__">
                    <br>
                    <div class="tab-pane fade active show" id="custom-nav-meas_em" role="tabpanel" aria-labelledby="custom-nav-meas_em-tab">
                        <div class="form-group ">
                            <input type="text" name="name" value="<?php echo $measurement->name;?>" required placeholder="Անուն" class="form-control">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-meas_ru" role="tabpanel" aria-labelledby="custom-nav-meas_ru-tab">
                        <div class="form-group">
                           <input type="text" name="name_ru" value="<?php echo $measurement->name_ru;?>" placeholder="Անուն" class="form-control">     
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-meas_en" role="tabpanel" aria-labelledby="custom-nav-meas_en-tab">
                        <div class="form-group">
                            <input type="text" name="name_en" value="<?php echo $measurement->name_en;?>" placeholder="Անուն" class="form-control">
                        </div>
                    </div>
                </div>

            </div>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
              <button type="submit" class="btn btn-succ" name="edite" value="true">Գրանցել և փակել</button>
              <button type="button" class="btn btn-succ sendFormMsEdite" name="edite" value="true">Գրանցել</button>
              <div class="info-bl"></div>
        </form>
      </div>
    
    </div>
  </div>
</div>

<script>
     jQuery('#edite-meas').modal('show');
</script>