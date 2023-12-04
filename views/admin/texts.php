<?php $users = \app\models\FsUsers::find()->where(['!=','status',0])->asArray()->all(); ?>
<input type="hidden" data-page='Products' id="page">
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
        url = url+ '<?php echo '?page='.$_GET['page'];?>';
        window.history.replaceState({}, document.title, url);
    </script>
<?php } ?>
<div class="products">
    <!--  /Traffic -->
    <div class="clearfix"></div>
    <!-- Orders -->
    <div class="products">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Տեքստեր
                            <span class="buttons">
                                  <button class="btn btn-sm btn-default" id="editeText"><i class="fa fa-pencil"></i></button>
                            </span>
                            <?php if(!isset($_GET['search'])){ ?>
                                <a href="#" data-toggle="modal" data-target="#search" class="btn btn-succ fl"><i class="fa fa-search"></i></a>
                            <?php } else { ?>
                                <a href="/admin/texts" class="btn btn-succ fl" style="padding:5px;"><img src="/web/images/searchclose.png" alt="" width="25"></a>
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
                                                <th>Սլագ</th>
                                                <th>հայերեն</th>
                                                <th>ռուսերեն</th>
                                                <th>անգլերեն</th>
                                            </tr>
                                            </thead>
                                            <tbody class="sortableTable" id="sortable">
                                            <?php if(!empty($texts)){ ?>
                                                <?php foreach ($texts as $text){ ?>
                                                    <tr data-id="<?php echo $text->id;?>" style="<?php echo $bg;?>">
                                                        <td scope="col"><span style="color:darkblue;cursor:pointer;">ID <?php echo $text->id;?></span></td>
                                                        <td><?php echo $text->slug;?></td>
                                                        <td><?php echo $text->text_am;?></td>
                                                        <td><?php echo $text->text_ru;?></td>
                                                        <td><?php echo $text->text_en;?></td>
                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                                </div>
                                        <?php if(!isset($_GET['search']) && $_GET['page'] != 'all'){ ?>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <?php $pages = ceil(intval($total)/10); ?>
                                                    <?php if(isset($_GET['page']) && intval($_GET['page'] )>0){ ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="/admin/texts?page=<?php echo intval($_GET['page'])-1;?>" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <?php
                                                    if(!isset($_GET['page'])){
                                                        $_GET['page'] = 0;
                                                    }
                                                    for ($i = 1; $i <= $pages; $i++){
                                                        if( $i == (intval($_GET['page'])+2) || $i == (intval($_GET['page'])+3) || $i == (intval($_GET['page'])-1)  ||  $i == (intval($_GET['page'])) ||  $i == intval($_GET['page'])+1) {
                                                            $class = '';
                                                            if($i == intval($_GET['page'])+1){
                                                                $class = 'active';
                                                            }
                                                            echo '<li class="page-item '.$class.'"><a class="page-link" href="/admin/texts?page=' . ($i-1).'">' . $i.'</a></li>';
                                                        }
                                                    } ?>
                                                    <?php if(isset($_GET['page']) && (intval($_GET['page'] )+1) < $pages){ ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="/admin/texts?page=<?php echo (intval($_GET['page'] )+1);?>" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <li>
                                                    <li class="page-item"><a class="page-link" href="/admin/texts?page=all">Տեսնել ամբողջը</a></li>
                                                    </li>
                                                </ul>
                                            </nav>
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
</div>

<style>
    .is_types span{
        padding-right:10px;
    }
</style>