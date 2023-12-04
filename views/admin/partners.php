<?php 
use app\models\FsProducts;
use app\models\FsCategories;
?>

<input type="hidden" data-page='Partners' id="page">
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
                            <span class="buttons">
                                          <span class="overlay show_" style="width:99px;"></span>
                                          <button class="btn btn-sm btn-default" style="margin-left:30px;" id="copyPartner" ><i class="fa fa-copy"></i></button>
                                          <button class="btn btn-sm btn-default" id="editePartner"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disablePartner"><i class="fa fa-trash"></i></button>
                                        </span>
                            <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել</a>
                            <?php if(!isset($_GET['search'])){ ?>
                                <a href="#" data-toggle="modal" data-target="#search" class="btn btn-succ fl"><i class="fa fa-search"></i></a>
                            <?php } else { ?>
                                <a href="/admin/partners" class="btn btn-succ fl" style="padding:5px;"><img src="/web/images/searchclose.png" alt="" width="25"></a>
                            <?php } ?>

                        </h4>
                    </div>
                    <div class="card-body--">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="" style="width:100%;overflow:auto;">
                                      <div class="tbl">
                                        <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
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
                                                <th scope="col">Ստեղծման ամսաթիվ</th>
                                                <th scope="col">Լիցենզիայի ժամկետի ավարտ</th>
                                                <th scope="col">Ապրանքներ</th>
                                            </tr>
                                            </thead>
                                            <tbody class="sortableTable" id="sortable">
                                            <?php if(!empty($partners)){ ?>
                                                <?php foreach ($partners as $partner){ ?>
                                                    <tr data-id="<?php echo $partner->id;?>" <?php if($partner->verified==0){ echo 'style="background:orange;"';}?>>
                                                        <td scope="col"><span class="move"><i class="fa fa-arrows-alt"></i></span>
                                                            <?php  if($partner->status == 0){
                                                                echo '<i class="fa fa-close" style="color:red;"></i>';
                                                            } ?>
                                                            ID <?php echo $partner->id;?></td>
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
                                                        <td scope="col"><?php echo $partner->created_at;?></td>
                                                        <td scope="col"><?php echo $partner->active_date;?></td>
                                                        <td scope="col"><a href="/admin/products?user_id=<?php echo $partner->id;?>">ապրանքներ (<?php echo FsProducts::find()->where(['provider_id'=>$partner->id])->count();?>)</a></td>

                                                    </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                        <button class="left">
                                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        </button><button class="right">
                                              <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                          </button>
                                      </div>
                                        <?php if(!isset($_GET['search'])){ ?>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <?php $pages = ceil(intval($total)/20); ?>
                                                    <?php if(isset($_GET['page']) && intval($_GET['page'] )>0){ ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="/admin/partners?page=<?php echo intval($_GET['page'])-1;?>" aria-label="Previous">
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
                                                            echo '<li class="page-item '.$class.'"><a class="page-link" href="/admin/partners?page=' . ($i-1).'">' . $i.'</a></li>';
                                                        }
                                                    } ?>
                                                    <?php if(isset($_GET['page']) && (intval($_GET['page'] )+1) < $pages){ ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="/admin/partners?page=<?php echo (intval($_GET['page'] )+1);?>" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <li>
                                                    <li class="page-item"><a class="page-link" href="/admin/partners?page=all">Տեսնել ամբողջը</a></li>
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

    <style>
        tr th{
            white-space: nowrap; overflow: hidden; text-overflow:ellipsis;
        }
    </style>
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
                                <input type="text" name="FsUsers[company_hvhh]" onchange="isValidHvhh(jQuery(this))" placeholder="Կազմակերպության ՀՎՀՀ" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Իրավաբանական անվանումը </span>
                                <input type="text" name="FsUsers[legal_name]" onchange="isValidHvhh(jQuery(this))" placeholder="Իրավաբանական անվանումը" class="form-control">
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
                                <input type="email" name="FsUsers[email]" placeholder="Էլեկտրոնային հասցե *" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <span style="margin-bottom: 4px;color: #878787;">Լոգո</span>
                                <input type="file" name="logo">
                                <span style="margin-bottom: 4px;color: #878787;">Հեռախոսահամար *</span>
                                <input type="text" onchange="isValid(jQuery(this).val())" name="FsUsers[phone]" placeholder="Հեռախոսահամար *" class="form-control ph">
                                <span style="margin-bottom: 4px;color: #878787;">Հղում</span>
                                <input type="text" name="FsUsers[link]" placeholder="Հղում" class="form-control">
                                <span style="margin-bottom: 4px;color: #878787;">Գաղտնաբառ *</span>
                                <input type="text" name="FsUsers[password]" placeholder="Գաղտնաբառ *" class="form-control">
                            </div>

                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                        <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել և փակել</button>
                        <button type="button" class="btn btn-succ sendFormPartner" name="add" value="true">Գրանցել</button>
                        <div class="info-bl-ec"></div>
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

</style>
<script>

    function isValid(p) {
        var phoneRe = /^[0-9]\d{2}[2-9]\d{2}\d{3}$/;
        var digits = p.replace(/\D/g, "");
        if(!phoneRe.test(digits)){
            jQuery('.ph').css('border','1px solid red');
            jQuery('#addnew .btn-succ').attr('disabled','disabled');
        } else {
            jQuery('.ph').css('border','1px solid #ced4da');
            jQuery('#addnew .btn-succ').removeAttr('disabled');
        }
    }
    function isValidHvhh(p) {
        var hvhh = /^[0-9]\d{2}[2-9]\d{2}\d{3}$/;
        var digits = p.val().replace(/\D/g, "");
        if(!hvhh.test(digits)){
            p.css('border','1px solid red');
            jQuery('#addnew .btn-succ').attr('disabled','disabled');
        } else {
            p.css('border','1px solid #ced4da');
            jQuery('#addnew .btn-succ').removeAttr('disabled');
        }
    }
</script>