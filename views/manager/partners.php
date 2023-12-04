<?php use app\models\FsCategories;
use app\models\FsProducts;?>
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
                        <h4 class="box-title">Գործընկերներ

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
                                                <th scope="col">Կարգավիճակ</th>
                                                <th scope="col">Նկար</th>
                                                <th scope="col">Իրավաբանական անվանում</th>
                                                <th scope="col">Հաստատված</th>
                                                <th scope="col">Կազմակերպության ՀՎՀՀ</th>
                                                <th scope="col">Հոլդինգի ՀՎՀՀ</th>
                                                <th scope="col">Հոլդինգի իրավաբանական անվանումը</th>
                                                <th scope="col">Կոնտակտային անձի ԱԱՀ </th>
                                                <th scope="col">Իրավաբանական հասցե </th>
                                                <th scope="col">Գործունեության հասցե </th>
                                                <th scope="col">Էլեկտրոնային հասցե </th>
                                                <th scope="col">Հեռախոս</th>
                                                <th scope="col">Հղում</th>
                                                <th scope="col">Նկարագիր</th>
                                                <th scope="col">Կատեգորիաներ</th>
                                            </tr>
                                            </thead>
                                            <tbody class="sortableTable" id="sortable">
                                            <?php if(!empty($partners)){ ?>
                                                <?php foreach ($partners as $partner){ ?>
                                                    <?php $disabled = \app\models\FsRequests::find()->where(['buyer_id'=>@Yii::$app->fsUser->identity->id,'seller_id'=>$partner->id])->andWhere(['status'=>4])->one();?>
                                                    <tr data-id="<?php echo $partner->id;?>">
                                                        <td scope="col">
                                                            <?php  if($partner->status == 0){
                                                                echo '<i class="fa fa-close" style="color:red;"></i>';
                                                            } ?>
                                                            ID <?php echo $partner->id;?><br>
                                                            <div class="row">
                                                                <div class="col-sm-3"> <input id="el_<?php echo $partner->id;?>" onchange="changePartner(jQuery(this))" class="disable_partner" <?php if($disabled){ echo 'checked';}?> value="<?php echo $partner->id;?>" type="checkbox">
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <?php if(!$disabled){ ?>
                                                                        <label class="fs-auth-checkbox-label" for="el_<?php echo $partner->id;?>"><small>Կասեցնել</small></label>
                                                                    <?php } else { ?>
                                                                        <label class="fs-auth-checkbox-label" for="el_<?php echo $partner->id;?>"><small>Ակտիվացնել</small></label>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>


                                                        </td>
                                                        <td scope="col">
                                                            <?php if(!$disabled){ ?>
                                                                <div class="fs-registered-message">
                                                                    <i class="fs-icon-check"></i>
                                                                    <span>Գործընկեր</span>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="fs-registered-message">
                                                                    <i class="fs-icon-check"></i>
                                                                    <span>Կասեցված է</span>
                                                                </div>
                                                            <?php } ?>
                                                        </td>
                                                        <td scope="col">
                                                            <?php if(!empty($partner->image)){?>
                                                                <img src="/<?php echo $partner->image;?>" height="60" alt="">
                                                            <?php } ?>
                                                        </td>
                                                        <td scope="col"> <?php echo $partner->legal_name;?></td>
                                                        <td scope="col"> <?php if( $partner->verified){ echo 'Այո';} else { echo 'Ոչ';}?></td>
                                                        <td scope="col"> <?php echo $partner->company_hvhh;?></td>
                                                        <td scope="col"><?php echo $partner->holding_hvhh;?></td>
                                                        <td scope="col"><?php echo $partner->holding_legal_name;?></td>
                                                        <td scope="col"><?php echo $partner->name;?></td>
                                                        <td scope="col"> <?php echo $partner->legal_address;?></td>
                                                        <td scope="col"> <?php echo $partner->address;?></td>
                                                        <td scope="col"><?php echo $partner->email;?></td>
                                                        <td scope="col"><?php echo $partner->phone;?></td>
                                                        <td scope="col"><?php echo $partner->link;?></td>
                                                        <td scope="col" ><p  style="max-height:50px;overflow:scroll;"><?php echo strip_tags($partner->company_description);?></p></td>
                                                        <td scope="col">
                                                            <?php $cats =  explode(';',$partner->categories); ?>
                                                            <?php if($cats){
                                                                for($i=0; $i<count($cats);$i++){
                                                                    $cat = FsCategories::findOne($cats[$i]);
                                                                    if($cat->name){
                                                                        echo $cat->name.'<hr style="margin:2px;">';
                                                                    }
                                                                }
                                                            };?>
                                                        </td>
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

    <script>
       function changePartner(el_){

                var pid = el_.val();
                if (el_.is(':checked')) {
                    var type = 'disabled';
                } else {
                    var type = 'activate';
                }
           jQuery.post("/site/disable-partner", {
                    partner_id: pid,
                    type: type,
                }).done(function (data) {
                    window.location.href = window.location.href + '?update=success';
                });

        }
    </script>
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


    <!-- Modal -->
    <div class="modal fade add-new" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnew">Ավելացնել հաճախորդ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="FsUsers[is_seller]" value="1">
                        <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                        <div class="row">
                            <div class="col-sm-4">

                                <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Կազմակերպության ՀՎՀՀ</span>
                                <input type="text" name="FsUsers[company_hvhh]" placeholder="Կազմակերպության ՀՎՀՀ" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Իրավաբանական անվանումը </span>
                                <input type="text" name="FsUsers[legal_name]" placeholder="Իրավաբանական անվանումը" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Հոլդինգի ՀՎՀՀ</span>
                                <input type="text" name="FsUsers[holding_hvhh]" placeholder="Հոլդինգի ՀՎՀՀ" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Հոլդինգի իրավաբանական անվանումը</span>
                                <input type="text" name="FsUsers[holding_legal_name]" placeholder="Հոլդինգի իրավաբանական անվանումը" class="form-control">

                            </div>
                            <div class="col-sm-4">
                                <span style="margin-bottom: 4px;color: #878787;">Կոնտակտային անձի ԱԱՀ *</span>
                                <input type="text" name="FsUsers[name]" placeholder="Կոնտակտային անձի ԱԱՀ *" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Իրավաբանական հասցե *</span>
                                <input type="text" name="FsUsers[legal_address]" placeholder="Իրավաբանական հասցե *" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Գործունեության հասցե *</span>
                                <input type="text" name="FsUsers[address]" placeholder="Գործունեության հասցե *" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Էլեկտրոնային հասցե *</span>
                                <input type="text" name="FsUsers[email]" placeholder="Էլեկտրոնային հասցե *" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <span style="margin-bottom: 4px;color: #878787;">Լոգո</span>
                                <input type="file" name="logo">
                                <span style="margin-bottom: 4px;color: #878787;">Հեռախոսահամար *</span>
                                <input type="text" name="FsUsers[phone]" placeholder="Հեռախոսահամար *" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Հղում</span>
                                <input type="text" name="FsUsers[link]" placeholder="Հղում" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Գաղտնաբառ *</span>
                                <input type="text" name="FsUsers[password]" placeholder="Գաղտնաբառ *" class="form-control">
                            </div>

                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                        <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել և փակել</button>
                        <button type="button" class="btn btn-succ sendFormPartner" name="add" value="true">Գրանցել</button>
                    </form>
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
    .fs-auth-checkbox-label{
        cursor:pointer;
    }
</style>