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
                        <h4 class="box-title">Ապրանքանիշներ
                            <span class="buttons">

                                          <button class="btn btn-sm btn-default" id="editeBrand"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disableBrand"><i class="fa fa-trash"></i></button>
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
                                                <th scope="col">Ապրանքանիշի անվանում</th>
                                                <th scope="col">Կատեգորիաներ</th>
                                                <th scope="col">Կարգավիճակ</th>
                                            </tr>
                                            </thead>
                                            <tbody class="sortableTable" id="sortable">
                                            <?php if(!empty($brands)){ ?>
                                                <?php foreach ($brands as $brand){ ?>
                                                    <tr data-id="<?php echo $brand->id;?>">
                                                        <td scope="col"><span class="move"><i class="fa fa-arrows-alt"></i></span>
                                                            <?php  if($brand->status == 0){
                                                                echo '<i class="fa fa-close" style="color:red;"></i>';
                                                            } ?>
                                                            ID <?php echo $brand->id;?></td>
                                                        <td scope="col"> <?php echo $brand->name;?></td>
                                                        <td scope="col"> <?php echo $brand->getCats($brand->id);?></td>
                                                        <td scope="col">
                                                            <?php if($brand->status == 1){
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
                    <h5 class="modal-title" id="addnew">Ավելացնել Էջ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                        <span>Անուն</span>
                        <input type="text" name="FsBrands[name]" required placeholder="Անուն" class="form-control">
                        <span>Կատեգորիաներ</span>
                        <select class="multySelect" name="category_id[]" multiple>
                            <option value=""></option>
                            <?php echo display_list($categories, 'select');?>
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
<?php
$f = 0;
function display_list($nested_categories, $type = 'sortable', $level = 0)
{
    foreach($nested_categories as $nested){
        $c ='';
        for ($i=0; $i < $level ; $i++) { $c = $c.'-';}
        $list .= '<option value="'.$nested['id'].'">'.$c.$nested['name'].' ('.$nested['atg'].')</option>';
        if( ! empty($nested['child'])){$list .= display_list($nested['child'],$type,$level+1);}
    }
    return $list;
}
?>