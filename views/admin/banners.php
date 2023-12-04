<input type="hidden" data-page='Banners' id="page">
<?php if(isset($_GET['success'])){ ?>
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        Հաջողությամբ պահպանվեց
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <script>
        var url = window.location.href;
        url = url.split('?')[0];
        window.history.replaceState({}, document.title, url);
    </script>
<?php } ?>
<div class="banners">
    <!--  /Traffic -->
    <div class="clearfix"></div>
    <!-- Orders -->
    <div class="pages">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Պաստառներ
                            <span class="buttons">
                                          <span class="overlay show_" style="width:99px;"></span>
                                          <button class="btn btn-sm btn-default" style="margin-left:30px;" id="copyBanner" ><i class="fa fa-copy"></i></button>
                                          <button class="btn btn-sm btn-default" id="editeBanner"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disableBanner"><i class="fa fa-trash"></i></button>
                                        </span>
                            <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել</a>
                        </h4>
                    </div>
                    <div class="card-body--">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tbl">
                                        <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Նկար</th>
                                                <th scope="col">Անվանում</th>
                                                <th scope="col">Տիպ</th>
                                                <th scope="col">Կարգավիճակ</th>
                                            </tr>
                                            </thead>
                                            <tbody class="sortableTable" id="sortable">
                                            <?php if(!empty($banners)){ ?>
                                                <?php foreach ($banners as $banner){ ?>
                                                    <tr data-id="<?php echo $banner->id;?>">
                                                        <td scope="col"><span class="move"><i class="fa fa-arrows-alt"></i></span>
                                                            <?php  if($banner->status == 0){
                                                                echo '<i class="fa fa-close" style="color:red;"></i>';
                                                            } ?>
                                                            ID <?php echo $banner->id;?></td>
                                                        <td scope="col">
                                                            <?php if(!empty($banner->image)){?>
                                                                <img src="/<?php echo $banner->image;?>" height="40" alt="">
                                                            <?php } ?>
                                                        </td>
                                                        <td scope="col"> <?php echo $banner->title_am;?></td>
                                                        <td scope="col"> <?php if($banner->type_ == 1){ echo 'Թեժ առաջարկներ';} else { echo 'Վերևի սլայդեր';};?></td>
                                                        <td scope="col">
                                                            <?php if($banner->status == 1){
                                                                echo 'Ակտիվ';
                                                            } else {
                                                                echo 'Պասիվ';
                                                            };?></td>

                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
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
                    <h5 class="modal-title" id="addnew">Ավելացնել պաստառ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <span>նկար (1920X550)</span>
                            <input type="file" name="img" >
                            <br>
                            <br>
                            <span>նկար մոբայլ տարբերակի (414X540)</span>
                            <input type="file" name="img_small">
                            <br> <br>
                            <span>Հղում (link)</span>
                            <input type="text" name="FsBanners[url]"  placeholder="Հղում" class="form-control">
                            <br>
                            <select name="FsBanners[type_]" id="" class="form-control">
                                <option value="0">Վերևի սլայդեր</option>
                                <option value="1">Թեժ առաջարկներ</option>
                            </select>
                        </div>
                        <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                        <div class="custom-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active show" id="custom-nav-product-am-tab" data-toggle="tab" href="#custom-nav-product-am" role="tab" aria-controls="custom-nav-product-am" aria-selected="true">Հայ</a>
                                    <a class="nav-item nav-link" id="custom-nav-product-ru-tab" data-toggle="tab" href="#custom-nav-product-ru" role="tab" aria-controls="custom-nav-product-ru" aria-selected="false">Ռուս</a>
                                    <a class="nav-item nav-link " id="custom-nav-product-en-tab" data-toggle="tab" href="#custom-nav-product-en" role="tab" aria-controls="custom-nav-product-en" aria-selected="false">Անգլ</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent"><br>
                                <div class="tab-pane fade active show" id="custom-nav-product-am" role="tabpanel" aria-labelledby="custom-nav-product-am-tab">
                                    <div class="form-group ">
                                        <span>Անուն</span>
                                        <input type="text" name="FsBanners[title_am]" required placeholder="Անուն" class="form-control">
                                        <span>Վերնագիր</span>
                                        <input type="text" name="FsBanners[small_description_am]"   placeholder="Վերնագիր" class="form-control">
                                        <span>Նկարագիր</span>
                                        <textarea name="FsBanners[description_am]" class="form-control" placeholder="Նկարագիր" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-nav-product-ru" role="tabpanel" aria-labelledby="custom-nav-product-ru-tab">
                                    <div class="form-group">
                                        <span>Անուն</span>
                                        <input type="text" name="FsBanners[title_ru]"   placeholder="Անուն" class="form-control">
                                        <span>Վերնագիր</span>
                                        <input type="text" name="FsBanners[small_description_ru]"   placeholder="Վերնագիր" class="form-control">
                                        <span>Նկարագիր</span>
                                        <textarea name="FsBanners[description_ru]" class="form-control" placeholder="Նկարագիր" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-nav-product-en" role="tabpanel" aria-labelledby="custom-nav-product-en-tab">
                                    <div class="form-group">
                                        <span>Անուն</span>
                                        <input type="text" name="FsBanners[title_en]"   placeholder="Անուն" class="form-control">
                                        <span>Վերնագիր</span>
                                        <input type="text" name="FsBanners[small_description_en]"   placeholder="Վերնագիր" class="form-control">
                                        <span>Նկարագիր</span>
                                        <textarea name="FsBanners[description_en]" class="form-control" placeholder="Նկարագիր" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                        <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modals">

    </div>
</div>

<style>
    .is_types span{
        padding-right:10px;
    }
</style>