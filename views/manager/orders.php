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
                        <h4 class="box-title">Պատվերներ
                            <span class="buttons">
                                  <button class="btn btn-sm btn-default" id="editeOrder"><i class="fa fa-pencil"></i></button>
                            </span>
                            <?php if(!isset($_GET['search'])){ ?>
                                <a href="#" data-toggle="modal" data-target="#search" class="btn btn-succ fl"><i class="fa fa-search"></i></a>
                            <?php } else { ?>
                                <a href="/manager/orders" class="btn btn-succ fl" style="padding:5px;"><img src="/web/images/searchclose.png" alt="" width="25"></a>
                            <?php } ?>
                        </h4>
                    </div>
                    <div class="card-body--">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="">
                                        <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th>Վաճառող</th>
                                                <th>Գնող</th>
                                                <th>Արժեք</th>
                                                <th>Քանակը</th>
                                                <th>Էլ․ հասցե</th>
                                                <th>Հեռ․</th>
                                                <th>Վճարման տեսակը</th>
                                                <th>Ամսաթիվ</th>
                                                <th>Կարգավիճակ</th>
                                            </tr>
                                            </thead>
                                            <tbody class="sortableTable" id="sortable">
                                            <?php if(!empty($orders)){ ?>
                                                <?php foreach ($orders as $order){ ?>
                                                    <?php $bg = ''; switch ($order->status){

                                                        case 3:
                                                            $bg = 'background:lightgreen;';
                                                            break;
                                                        case 5:
                                                            $bg = 'background:LightCoral;';
                                                            break;
                                                    } ?>
                                                    <tr data-id="<?php echo $order->id;?>" style="<?php echo $bg;?>">
                                                        <td scope="col">
                                                            <?php  if($order->status == 0){
                                                                echo '<i class="fa fa-close" style="color:red;"></i>';
                                                            } ?>
                                                            <span style="color:darkblue;cursor:pointer;">ID <?php echo $order->id;?></span></td>
                                                        <td><?php echo $order->seller->name;?></td>
                                                        <td><?php echo $order->buyer->name;?></td>
                                                        <td><?php echo number_format($order->price);?> դր․</td>
                                                        <td><?php echo $order->seller_quantity;?></td>
                                                        <td><?php echo $order->buyer->email;?></td>
                                                        <td><?php echo $order->buyer->phone;?></td>
                                                        <td>Կանխիկ</td>
                                                        <td><?php echo date('d F Y, h:i',strtotime($order->created_at));?></td>
                                                        <td>
                                                            <select class="form-control" onclick="changeOrderStat(<?php echo $order->id;?>, this.value)">
                                                                <option value="1" <?php if($order->status == 1){ echo 'selected';}?>>Պատվիրված</option>
                                                                <option value="2" <?php if($order->status == 2){ echo 'selected';}?>>Ուղարկված հաստատման</option>
                                                                <option value="3" <?php if($order->status == 3){ echo 'selected';}?>>Հաստատված</option>
                                                                <option value="4" <?php if($order->status == 4){ echo 'selected';}?>>Փակված</option>
                                                                <option value="5" <?php if($order->status == 5){ echo 'selected';}?>>Մերժված</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                        <?php if(!isset($_GET['search']) && $_GET['page'] != 'all'){ ?>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <?php $pages = ceil(intval($total)/10); ?>
                                                    <?php if(isset($_GET['page']) && intval($_GET['page'] )>0){ ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="/manager/orders?page=<?php echo intval($_GET['page'])-1;?>" aria-label="Previous">
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
                                                            echo '<li class="page-item '.$class.'"><a class="page-link" href="/manager/orders?page=' . ($i-1).'">' . $i.'</a></li>';
                                                        }
                                                    } ?>
                                                    <?php if(isset($_GET['page']) && (intval($_GET['page'] )+1) < $pages){ ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="/manager/orders?page=<?php echo (intval($_GET['page'] )+1);?>" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <li>
                                                    <li class="page-item"><a class="page-link" href="/manager/orders?page=all">Տեսնել ամբողջը</a></li>
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

    <div class="modal fade add-new" id="addnew" tabindex="100" style="z-index:1060 !important;" role="dialog" aria-labelledby="addnew" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnew">Ավելացնել ապրանք</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body items">

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

                            <br>
                            <div class="col col-md-12">

                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="">Գնորդ</label>
                                        <select style="margin-bottom:10px;" class="multySelect" data-placeholder="Ընտրել օգտատեր" multiple id="category" name="user_id[]">
                                            <?php foreach ($users as $user){ ?>
                                                <option value="<?php echo $user['id'];?>"><?php echo $user['legal_name'];?> (<?php echo $user['email'];?>) </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Կարգավիճակ</label>
                                        <select class="multySelect" multiple name="status[]">
                                            <option value="1">Պատվիրված</option>
                                            <option value="2">Ուղարկված հաստատման</option>
                                            <option value="3" selected="">Հաստատված</option>
                                            <option value="4">Փակված</option>
                                            <option value="5">Մերժված</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">ՍԿիզբ</label>
                                        <input type="date" name="date_start" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">Ավարտ</label>
                                        <input type="date" name="date_end" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="" style="color:white;">․</label>
                                        <div class="input-group">
                                            <div class="input-group-btn">
                                                <button class="btn btn-succ" name="search">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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