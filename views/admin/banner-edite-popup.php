<div class="modal fade add-new" id="edite-banner" tabindex="-1" role="dialog" aria-labelledby="edite-banner" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Խմբագրել պաստառ (<?php echo $banner->title_am;?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $banner->id;?>">
                        <img src="/<?php echo $banner->image;?>" alt="" height="55">
                        <span>նկար (1920X550)</span>
                        <input type="file" name="img" >
                        <br>
                        <br>
                        <img src="/<?php echo $banner->image_mobile;?>" alt="" height="55">
                        <span>նկար մոբայլ տարբերակի (414X540)</span>
                        <input type="file" name="img_small">
                        <br> <br>
                        <span>Հղում (link)</span>
                        <input type="text" name="FsBanners[url]" value="<?php echo $banner->url;?>" placeholder="Հղում" class="form-control">
                        <br>
                        <select name="FsBanners[type_]" id="" class="form-control">
                            <option value="0" <?php if($banner->type_ == 0){ echo 'selected';}?>>Վերևի սլայդեր</option>
                            <option value="1" <?php if($banner->type_ == 1){ echo 'selected';}?>>Թեժ առաջարկներ</option>
                        </select>
                    </div>
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
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
                                    <input type="text" value="<?php echo $banner->title_am;?>" name="FsBanners[title_am]" required placeholder="Անուն" class="form-control">
                                    <span>Վերնագիր</span>
                                    <input type="text" value="<?php echo $banner->small_description_am;?>" name="FsBanners[small_description_am]"   placeholder="Վերնագիր" class="form-control">
                                    <span>Նկարագիր</span>
                                    <textarea name="FsBanners[description_am]" class="form-control" placeholder="Նկարագիր" rows="3"><?php echo $banner->description_am;?></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-banner-ru" role="tabpanel" aria-labelledby="custom-nav-banner-ru-tab">
                                <div class="form-group">
                                    <span>Անուն</span>
                                    <input type="text" value="<?php echo $banner->title_ru;?>" name="FsBanners[title_ru]"   placeholder="Անուն" class="form-control">
                                    <span>Վերնագիր</span>
                                    <input type="text" value="<?php echo $banner->small_description_ru;?>" name="FsBanners[small_description_ru]"   placeholder="Վերնագիր" class="form-control">
                                    <span>Նկարագիր</span>
                                    <textarea name="FsBanners[description_ru]" class="form-control" placeholder="Նկարագիր" rows="3"><?php echo $banner->description_ru;?></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-banner-en" role="tabpanel" aria-labelledby="custom-nav-banner-en-tab">
                                <div class="form-group">
                                    <span>Անուն</span>
                                    <input type="text" value="<?php echo $banner->title_en;?>" name="FsBanners[title_en]"   placeholder="Անուն" class="form-control">
                                    <span>Վերնագիր</span>
                                    <input type="text" value="<?php echo $banner->small_description_en;?>" name="FsBanners[small_description_en]"   placeholder="Վերնագիր" class="form-control">
                                    <span>Նկարագիր</span>
                                    <textarea name="FsBanners[description_en]" class="form-control" placeholder="Նկարագիր" rows="3"><?php echo $banner->description_en;?></textarea>
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
