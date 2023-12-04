<div class="modal fade add-new" id="edite-banner" tabindex="-1" role="dialog" aria-labelledby="edite-banner" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Խմբագրել տեքստ (<?php echo $text->text_am;?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <input type="hidden" name="id" value="<?php echo $text->id;?>">
                    <div class="custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active show" id="custom-nav-banner-am-tab" data-toggle="tab" href="#custom-nav-banner-am" role="tab" aria-controls="custom-nav-banner-am" aria-selected="true">Հայ</a>
                                <a class="nav-item nav-link" id="custom-nav-banner-ru-tab" data-toggle="tab" href="#custom-nav-banner-ru" role="tab" aria-controls="custom-nav-banner-ru" aria-selected="false">Ռուս</a>
                                <a class="nav-item nav-link " id="custom-nav-banner-en-tab" data-toggle="tab" href="#custom-nav-banner-en" role="tab" aria-controls="custom-nav-banner-en" aria-selected="false">Անգլ</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent"><br>
                            <div class="tab-pane fade active show" id="custom-nav-banner-am" role="tabpanel" aria-labelledby="custom-nav-banner-am-tab">
                                <div class="form-group ">
                                    <span>Անուն</span>
                                    <input type="text" value="<?php echo $text->text_am;?>" name="FsTexts[text_am]" required placeholder="Անուն" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-banner-ru" role="tabpanel" aria-labelledby="custom-nav-banner-ru-tab">
                                <div class="form-group">
                                    <span>Անուն</span>
                                    <input type="text" value="<?php echo $text->text_ru;?>" name="FsTexts[text_ru]"   placeholder="Անուն" class="form-control">
                                  </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-banner-en" role="tabpanel" aria-labelledby="custom-nav-banner-en-tab">
                                <div class="form-group">
                                    <span>Անուն</span>
                                    <input type="text" value="<?php echo $text->text_en;?>" name="FsTexts[text_en]"   placeholder="Անուն" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                    <button type="submit" class="btn btn-succ" name="edite" value="true">Գրանցել</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery('#edite-banner').modal('show');

</script>
