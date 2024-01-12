<input type="hidden" data-page='Settings' id="page">
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
                <div class="card-body--">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <table class="table table-bordered ">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Տեսակ</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody class="sortableTable" id="sortable">
                                        <?php if(!empty($groups)){ ?>
                                            <?php foreach($groups as $me => $group){ ?>
                                                <tr data-id="<?php echo $group->id;?>">
                                                    <td><?= $group->id ?></td>
                                                    <td class="group_name"><?= $group->name;?></td>
                                                    <td style="width:150px">
                                                        <button class="btn  btn-default" id="editeCustomerGroup"><i class="fa fa-pencil"></i></button>
                                                        <a href="delete-user-group?id=<?php echo $group->id;?>"><button class="btn  btn-danger" id="deleteCustomerGroup"><i class="fa fa-trash"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <form action=""  method="post" enctype="multipart/form-data" style="padding:15px;width:100% !important;" class="row w-100 creat_from">
                            <fieldset class="scheduler-border w-100">
                                <legend class="scheduler-border">Նոր Տեսակ</legend>
                                <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Տեսակի Անվանում</span>
                                        <input type="text" class="name__" name="group[name]" value="<?php echo $settings->number;?>" placeholder="Անվանում" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-succ" name="add" value="true"  style="margin-left:20px;margin-top:20px;">Գրանցել</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        legend {
            background-color: #008A4E;
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





