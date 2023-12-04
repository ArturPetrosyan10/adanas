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
                <div class="card-body">
                    <h4 class="box-title">Կարգավորումներ
                    </h4>
                </div>
                <div class="card-body--">
                    <div class="container-fluid">

                        <form action="" method="post" enctype="multipart/form-data" style="padding:15px;width:100% !important;" class="row">

                            <fieldset class="scheduler-border" style="min-width:100%;">
                                <legend class="scheduler-border">Առաքման կարգավորումներ</legend>
                                <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />

                                <div class="row">
                                    <div class="col-sm-4">
                                        <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Առաքման գինը Երևանում</span>
                                        <input type="text" name="FsSettings[delivery_price_yerevan]" value="<?php echo $settings->delivery_price_yerevan;?>" placeholder="Առաքման գինը Երևանում" class="form-control">
                                        <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Արագ առաքման գինը Երևանում</span>
                                        <input type="text" name="FsSettings[delivery_fast_price_yerevan]" value="<?php echo $settings->delivery_fast_price_yerevan;?>" placeholder="Արագ առաքման գինը Երևանում" class="form-control">
                                        <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Անվճար առաքման սկզբնական գինը Երևանում</span>
                                        <input type="text" name="FsSettings[delivery_free_start_price_yerevan]" value="<?php echo $settings->delivery_free_start_price_yerevan;?>" placeholder="Անվճար առաքման սկզբնական գինը Երևանում" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="margin-bottom: 4px;color: #878787;">Առաքման գինը Մարզերում</span>
                                        <input type="text" name="FsSettings[delivery_price_regions]" placeholder="Առաքման գինը Մարզերում" value="<?php echo $settings->delivery_price_regions;?>" class="form-control">
                                        <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Արագ առաքման գինը Մարզերում</span>
                                        <input type="text" name="FsSettings[delivery_fast_price_regions]" value="<?php echo $settings->delivery_fast_price_regions;?>" placeholder="Արագ առաքման գինը Մարզերում" class="form-control">
                                        <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Անվճար առաքման սկզբնական գինը Մարզերում</span>
                                        <input type="text" name="FsSettings[delivery_free_start_price_regions]" value="<?php echo $settings->delivery_free_start_price_regions;?>" placeholder="Անվճար առաքման սկզբնական գինը Մարզերում" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <span style="margin-bottom: 4px;color: #878787;">Ադմինիստրատորի էլ․ փոստ</span>
                                        <input type="text" name="FsSettings[admin_email]" placeholder="Ադմինիստրատորի էլ․ փոստ" value="<?php echo $settings->admin_email;?>" class="form-control">
                                        <div>
                                           <input id="prop_new" <?php if($settings->is_free_delivery){ echo 'checked';}?>  type="checkbox" name="FsSettings[is_free_delivery]" value="1">
                                           <label for="prop_new"  style="color: #878787;padding-left:0px;">Անվճար առաքում</label>
                                       </div>
                                        <div>
                                           <input id="prop_new__" <?php if($settings->is_brand){ echo 'checked';}?>  type="checkbox" name="FsSettings[is_brand]" value="1">
                                           <label for="prop_new__"  style="color: #878787;padding-left:0px;">Աշխատողներին բաժանել ըստ ապրանքանիշի</label>
                                       </div>
                                    </div>
                                    <br>
                                <button type="submit" class="btn btn-succ" name="edite" value="true" style="margin-left:20px;margin-top:20px;">Գրանցել</button>
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
            background-color: #DAA520;
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




