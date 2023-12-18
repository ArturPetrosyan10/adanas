<input type="hidden" data-page='Settings' id="page">
<?php if(isset($_GET['success']) &&$_GET['success'] == 'true'){ ?>
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
<?php } else if(isset($_GET['error'])){ ?>
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        Այս տվյալներով օգտատեր առկա է համակարգում
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
                <div class="card-body">
                    <h4 class="box-title">Աշխատակիցներ
                        <span class="buttons">
                          <button class="btn btn-sm btn-default" id="copyUser" ><i class="fa fa-copy"></i></button>
                          <button class="btn btn-sm btn-default" id="editeUser"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-sm btn-danger" id="disableUser"><i class="fa fa-trash"></i></button>
                        </span>
                        <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել</a>
                    </h4>
                </div>
                <div class="card-body--">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <span>Հղում օգտատերերի կառավարման վահանակի</span>
                                    <?php
                                    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                                    $domainName = $_SERVER['HTTP_HOST'].'/';
                                    echo '<code>'.$protocol.$domainName.'admin/login</code>';
                                    ?>
                                    <br>
                                    <table class="table table-bordered ">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Օգտատեր</th>
                                            <th scope="col">Էլ․ փոստ</th>
                                            <th scope="col">Պաշտոն</th>
                                        </tr>
                                        </thead>
                                        <tbody class="sortableTable" id="sortable">
                                        <?php if(!empty($users)){ ?>
                                            <?php foreach($users as $me => $meval){ ?>
                                                <tr data-id="<?php echo $meval->id;?>">
                                                    <td>
                                                        <?php echo $meval->id;?>
                                                        <?php if($meval->status == 0){ ?>
                                                            <i class="fa fa-close" style="color:red;"></i>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $meval->username;?></td>
                                                    <td><?php echo $meval->email;?></td>
                                                    <td><?php switch($meval->role){ case 10: echo 'Ադմին';  break;case 20: echo 'Օպերատոր';  break;case 30: echo 'Խմբագիր';  break;   };?></td>
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
                        <br>
                        <span>Անուն</span>
                        <input type="text" name="Users[username]" required placeholder="Անուն" class="form-control">
                        <span>Էլ․ փոստ</span>
                        <input type="text" name="Users[email]"  placeholder="Էլ․ փոստ" class="form-control">
                        <span>Պաշտոն</span>
                        <select name="Users[role]" class="form-control">
                            <option value="20">Օպերատոր</option>
                        </select>
                        <span>Գաղտնաբառ</span>
                        <input type="password" name="Users[password]"  placeholder="Գաղտնաբառ" class="form-control">
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




