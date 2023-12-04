<?php use app\models\FsStores;?>
<input type="hidden" data-page='Stores' id="page">
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
<div class="products">
    <!--  /Traffic -->
    <div class="clearfix"></div>
    <!-- Orders -->
    <div class="pages">
      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">
                             <?php if(isset($_GET['parent_id'])){ ?>
                                <a href="/admin/stores">Հետ</a> Մասնաճյուղեր
                                <?php } else { ?> Խանութներ
                            <?php } ?>
                            <span class="buttons">
                                          <span class="overlay show_" style="width:99px;"></span>
                                          <button class="btn btn-sm btn-default" style="margin-left:30px;" id="copyStore" ><i class="fa fa-copy"></i></button>
                                          <button class="btn btn-sm btn-default" id="editeStore"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disableStore"><i class="fa fa-trash"></i></button>
                                        </span>
                           <?php if(!isset($_GET['parent_id'])){ ?>
                            <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել</a>
                           <?php } ?>
                        </h4>
                    </div>
                    <div class="card-body--">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                      <div class="tbl">
                                        <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Լոգո</th>
                                                <th scope="col">Խանութի անվանում</th>
                                                <?php if(!isset($_GET['parent_id'])){ ?>
                                                <th scope="col">Մասնաճյուղեր</th>
                                                <?php } ?>
                                                <th scope="col">Հվհհ</th>
                                                <th scope="col">Կարգավիճակ</th>
                                            </tr>
                                            </thead>
                                            <tbody class="sortableTable" id="sortable">
                                            <?php if(!empty($stores)){ ?>
                                                <?php foreach ($stores as $store){ ?>
                                                    <tr data-id="<?php echo $store->id;?>">
                                                        <td scope="col"><span class="move"><i class="fa fa-arrows-alt"></i></span>
                                                            <?php  if($store->status == 0){
                                                                echo '<i class="fa fa-close" style="color:red;"></i>';
                                                            } ?>
                                                            ID <?php echo $store->id;?></td>
                                                        <td scope="col">
                                                            <?php if(!empty($store->logo)){?>
                                                                <img src="/<?php echo $store->logo;?>" height="60" alt="">
                                                            <?php } ?></td>
                                                        <td scope="col"> <?php echo $store->name;?></td>
                                                         <?php if(!isset($_GET['parent_id'])){ ?>
                                                        <td scope="col"> <a href="/admin/stores?parent_id=<?php echo $store->id;?>">Մասնաճյուղեր (<?php echo FsStores::find()->where(['parent_id'=>$store->id])->count();?>)</a></td>
                                                        <?php } ?>
                                                        <td scope="col"> <?php echo $store->hvhh;?></td>
                                                        <td scope="col">
                                                            <?php if($store->status == 1){
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
    </div>

    <!-- Modal -->
    <div class="modal fade add-new" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnew">Ավելացնել Էջ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                         <span>ՀԻմնական Խանութ</span>
                         <select  name="FsStores[parent_id]" class="form-control">
                             <option value="">ՀԻմնական Խանութ</option>
                             <?php foreach($stores as $store => $st_val){ ?>
                                <option value="<?php echo $st_val->id;?>"><?php echo $st_val->name;?></option>
                             <?php } ?>
                         </select>
                        <span>Անուն</span>
                        <input type="text" name="FsStores[name]" required placeholder="Անուն" class="form-control">
                        <span>Հվհհ</span>
                        <input type="text" name="FsStores[hvhh]"   placeholder="Հվհհ" class="form-control">
                        <span>Հասցե</span>
                        <input type="text" name="FsStores[address]"   placeholder="Հասցե" class="form-control">
                        <span>Լոգո</span>
                        <input type="file" name="img" >
                        <span>Կարգավիճակ</span>
                        <select name="FsStores[status]" id="" class="form-control">
                            <option value="1">Ակտիվ</option>
                            <option value="0">Պասիվ</option>
                        </select>
                        <br><br>
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