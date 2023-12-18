<input type="hidden" data-page='Settings' id="page">
<?php use app\models\FsParams;

if(isset($_GET['success']) &&$_GET['success'] == 'true'){ ?>
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
<?php  } ?>
<!--  /Traffic -->
<div class="clearfix"></div>
<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Կառավարում
                        <span class="buttons">

                                          <button class="btn btn-sm btn-default" id="editeManager"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disableManager"><i class="fa fa-trash"></i></button>
                                        </span>
                        <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i>Փոփոխել աշխատող</a>
                        <a href="#" data-toggle="modal" data-target="#addnewposition" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i>Ավելացնել նոր դիրք</a>
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
                                            <th scope="col">Գնորդ</th>
                                            <th scope="col">Բրենդ</th>
                                            <th scope="col">Աշխատող</th>
                                        </tr>
                                        </thead>
                                        <tbody class="sortableTable" id="sortable">
                                        <?php if(!empty($manag)){ ?>
                                            <?php foreach($manag as $me => $meval){ ?>
                                                <tr data-id="<?php echo $meval->id;?>">
                                                    <td>
                                                        <input type="checkbox" class="customer" value="<?php echo $meval->id;?>">
                                                        <?php echo $meval->id;?>
                                                        <?php if($meval->status == 0){ ?>
                                                            <i class="fa fa-close" style="color:red;"></i>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo  \app\models\FsUsers::findOne(['id'=>$meval['user_id']])->legal_name;?></td>
                                                    <td><?php echo  \app\models\FsBrands::findOne(['id'=>$meval['brand_id']])->name;?></td>
                                                    <td><?php echo  \app\models\Users::findOne(['id'=>$meval['customer_id']])->username;?></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
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


    <style>
        legend {
            background-color: #ffbd27;
            color: white;
            padding: 10px;
            font-size:18px;
        }

        input {
            margin: 0.4rem;
        }
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            padding:10px;
            border-bottom:none;
        }

    </style>
    <!-- Modal -->
    <div class="modal fade add-new" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnew">Ավելացնել օգտատեր</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                        <span>Աշխատող</span>
                        <select name="customer_id" class="form-control">
                            <?php if(!empty($workers)){ ?>
                                <?php foreach ($workers as $worker => $worker_val){ ?>
                                    <option value="<?php echo $worker_val['id'];?>"><?php echo $worker_val['username'];?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="items" id="items" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                        <button type="submit" class="btn btn-succ" name="edite" value="true">Գրանցել</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade add-new" id="addnewposition" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnew">Ավելացնել նոր դիրք</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                        <br>
                        <span>Գնորդ</span>
                        <?php $cat_ = '';?>
                        <select class="form-control" name="FsUserToBrand[user_id]">
                            <?php if(!empty($partners)){ ?>
                                <?php foreach ($partners as $partner => $part_val){ ?>
                                    <?php $cat_ .= $part_val->categories;?>
                                    <option value="<?php echo $part_val->id;?>"><?php echo $part_val->legal_name;?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <?php
                         // BRANDERI LOGIKAN NOR PETQA LINI STEX
//                        $params =FsbR::find()->where(['parent_id'=>38])->asArray()->all();

                        ;?>
                        <span>Բրենդ</span>
                        <select class="form-control" name="FsUserToBrand[brand_id]" id="">
                            <?php if(!empty($brands)){ ?>
                                <?php foreach ($brands as $brand => $brand_val){
                                      $br = \app\models\FsBrands::findOne(['id'=>$brand_val['brand_id']]);
                                    ?>
                                    <option value="<?php echo $br['id'];?>"><?php echo $br['name'];?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <span>Աշխատող</span>
                        <select name="FsUserToBrand[customer_id]" class="form-control">
                            <?php if(!empty($workers)){ ?>
                                <?php foreach ($workers as $worker => $worker_val){ ?>
                                    <option value="<?php echo $worker_val['id'];?>"><?php echo $worker_val['username'];?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>

                        <br><br>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                        <button type="submit" class="btn btn-succ" name="addposition" value="true">Գրանցել</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modals">
    </div>

