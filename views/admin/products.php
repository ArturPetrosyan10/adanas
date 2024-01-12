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
                                        <h4 class="box-title">Ապրանքներ  
                                         <span class="buttons">
                                          <span class="overlay show_" style="width:99px;"></span>
                                          <button class="btn btn-sm btn-default" style="margin-left:30px;" id="copyProduct" ><i class="fa fa-copy"></i></button>
                                          <button class="btn btn-sm btn-default" id="editeProduct"><i class="fa fa-pencil"></i></button>
                                          <button class="btn btn-sm btn-danger" id="disableProduct"><i class="fa fa-trash"></i></button>
                                        </span>
                                       <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել</a>
                                            <?php if(!isset($_GET['search'])){ ?>
                                                <a href="#" data-toggle="modal" data-target="#search" class="btn btn-succ fl"><i class="fa fa-search"></i></a>
                                            <?php } else { ?>
                                                <a href="/admin/products" class="btn btn-succ fl" style="padding:5px;"><img src="/web/images/searchclose.png" alt="" width="25"></a>
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
                                                            <th scope="col">Նկար</th>
                                                            <th scope="col">Անվանում</th>
                                                            <th scope="col">Ապրանքանիշ</th>
                                                            <th scope="col">Մատակարար</th>
                                                            <th scope="col">Կատեգորիա</th>
                                                            <th scope="col">Ապրանքի կոդ</th>
                                                            <th scope="col">Արտիկուլ</th>
                                                            <th scope="col">ATG</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody class="sortableTable" id="sortable">
                                                        <?php if(!empty($products)){ ?>
                                                           <?php foreach ($products as $product){ ?>
                                                                <tr data-id="<?php echo $product->id;?>">
                                                                    <td scope="col"><span class="move"><i class="fa fa-arrows-alt"></i></span>
                                                                       <?php  if($product->status == 0){
                                                                           echo '<i class="fa fa-close" style="color:red;"></i>';
                                                                       } ?>
                                                                        ID <?php echo $product->id;?></td>
                                                                    <td scope="col">
                                                                        <?php if(!empty($product->image)){?>
                                                                            <img src="/<?php echo explode(',',$product->image)[0];?>" height="40" alt="">
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td scope="col"> <?php echo $product->name;?></td>
                                                                    <td scope="col">
                                                                        <?php
                                                                        $br = \app\models\FsBrands::findOne(['id'=>$product->store_id]);
                                                                        echo $br->name;?></td>
                                                                    <td scope="col"><?php echo $product->provider->name;?></td>
                                                                    <td scope="col"> <?php echo $product->category->name;?></td>
                                                                    <td scope="col"> <?php echo $product->code_;?></td>
                                                                    <td scope="col"><?php echo $product->vendor_code;?></td>
                                                                    <td scope="col"><?php echo $product->atg;?></td>

                                                                </tr>
                                                        <?php }} ?>
                                                        </tbody>
                                                    </table>
                                                                        </div>
                                                    <?php if(!isset($_GET['search'])  && $_GET['page'] != 'all'){ ?>
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination">
                                                            <?php $pages = ceil(intval($total)/10); ?>
                                                            <?php if(isset($_GET['page']) && intval($_GET['page'] )>0){ ?>
                                                            <li class="page-item">
                                                                <a class="page-link" href="/admin/products?page=<?php echo intval($_GET['page'])-1;?>" aria-label="Previous">
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
                                                                    echo '<li class="page-item '.$class.'"><a class="page-link" href="/admin/products?page=' . ($i-1).'">' . $i.'</a></li>';
                                                                }
                                                            } ?>
                                                            <?php if(isset($_GET['page']) && (intval($_GET['page'] )+1) < $pages){ ?>
                                                            <li class="page-item">
                                                                <a class="page-link" href="/admin/products?page=<?php echo (intval($_GET['page'] )+1);?>" aria-label="Next">
                                                                    <span aria-hidden="true">&raquo;</span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </li>
                                                            <?php } ?>
                                                            <li>
                                                               <li class="page-item"><a class="page-link" href="/admin/products?page=all">Տեսնել ամբողջը</a></li>
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
    $l = 'disabled';
    function display_list($nested_categories, $type = 'sortable', $level = 0,$ch = false)
    {
          foreach($nested_categories as $nested){
            $c ='';
            for ($i=0; $i < $level ; $i++) { $c = $c.'-';}
            if( ! empty($nested['child']) && $ch){
               $list .= '<option disabled data-atg="'.$nested['atg'].'" value="'.$nested['id'].'">'.$c.$nested['name'].' ('.$nested['atg'].')</option>';
            } else {
                $list .= '<option data-atg="'.$nested['atg'].'" value="'.$nested['id'].'">'.$c.$nested['name'].' ('.$nested['atg'].')</option>';
            }
            if( ! empty($nested['child'])){
                $list .= display_list($nested['child'],$type,$level+1,$ch);
            }
          }
          return $list;
    }
?>
      

<!-- Modal -->
<div class="modal fade add-new" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addnew">Ավելացնել ապրանք</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data" id="Product_">

         <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
            <div class="row">
                <div class="col-sm-10">
                   <span style="margin-bottom: 4px;color: #878787;">Կատեգորիա</span>
                  <select class="standardSelect" id="category" name="category_id">
                    <option value=""></option>
                       <?php echo display_list($categories, 'select',0,true);?>
                  </select>
                 <br><br>
                </div>
                <div class="col-sm-2">
                    <br>
                    <button data-toggle="collapse"  data-target="#showProps" class="btn" type="button"><i class="fa fa-cogs"></i> Պարամետրեր</button>
                </div>
            </div>
            <div class="form-group">
                <div class="collapse" id="showProps">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <span style="margin-bottom: 4px;color: #878787;">Չափման միավոր</span>
                    <select class="standardSelect"  name="measuremnet_id">
                        <option value=""></option>
                        <?php foreach ($measurement as $ms => $msVal){ ?>
                            <option value="<?php echo $msVal['id'];?>"><?php echo $msVal['name'];?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Ապրանքի կոդ</span>
                    <input type="text" name="code_" placeholder="Ապրանքի կոդ" class="form-control">
                    <span style="margin-bottom: 4px;color: #878787;">ATG</span>
                    <input type="text" name="atg" placeholder="ATG" class="form-control atg_">
                    <span style="margin-bottom: 4px;color: #878787;">Արտիկուլ</span>
                    <input type="text" name="vendor_code" placeholder="Արտիկուլ" class="form-control">
                    <span style="margin-bottom: 4px;color: #878787;">Արժեք</span>
                    <input type="text" name="price"  placeholder="Արժեք" class="form-control">
                </div>
                <div class="col-sm-4">
                    <div class="row" style="margin:10px 0px;">
                        <div class="col-sm-12" style="color: #878787;padding-left:0px;">Նկար  <input type="file" multiple name="img[]" ></div>
                        <div class="col-sm-12" style="color: #878787;padding-left:0px;">Վիդեո  <input type="file" name="video"></div>
                        <div class="col-sm-12" style="color: #878787;padding-left:0px;">
                            <div class="comment ">
                                <label for="com" style="margin-bottom: 4px;color: #878787;">Մեկնաբանություն</label>
                                <textarea id="com" name="comment"  cols="5" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div style="" class="is_types">
                   <div>
                       <input id="prop_new" type="checkbox" name="is_new" value="1">
                       <label for="prop_new"  style="color: #878787;padding-left:0px;">նոր ապրանք</label>
                   </div>
                        <div>
                        <input id="prop_aah" type="checkbox" name="is_aah" value="1">
                        <label for="prop_aah"  style="color: #878787;padding-left:0px;">ԱԱՀ 20%</label>
                   </div>
                        <div>
                        <input id="prop_procent" type="checkbox" name="is_tax" value="1">
                       <label for="prop_procent"  style="color: #878787;padding-left:0px;">Ակցիզի տոկոս</label>
                   </div>
                        <div>
                       <input id="prop_anim" type="checkbox" name="is_env" value="1">
                       <label for="prop_anim"  style="color: #878787;padding-left:0px;">Բնապահպանական հարկ</label>
                   </div>
                    </div>
                    <div class="procs">
                        <div class="tax-block hide">
                            <label for="prop_tax_proc"  style="color: #878787;padding-left:0px;">Ակցիզի տոկոս</label>
                            <input type="number" id="prop_tax_proc" step="0.01" name="anim_procent" class="anim-proc form-control">
                        </div>
                        <div class="anim-block hide">
                            <label for="prop_anim_proc"  style="color: #878787;padding-left:0px;">Բնապահպանական հարկ</label>
                            <input type="number" id="prop_anim_proc" step="0.01" name="tax_procent" class="tax-proc form-control">
                        </div>
                    </div>
                </div>

            </div>

          <div class="custom-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active show" id="custom-nav-product-am-tab" data-toggle="tab" href="#custom-nav-product-am" role="tab" aria-controls="custom-nav-product-am" aria-selected="true">Հայ</a>
                        <a class="nav-item nav-link" id="custom-nav-product-ru-tab" data-toggle="tab" href="#custom-nav-product-ru" role="tab" aria-controls="custom-nav-product-ru" aria-selected="false">Ռուս</a>
                        <a class="nav-item nav-link " id="custom-nav-product-en-tab" data-toggle="tab" href="#custom-nav-product-en" role="tab" aria-controls="custom-nav-product-en" aria-selected="false">Անգլ</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent"><br>
                <div class="tab-pane fade active show" id="custom-nav-product-am" role="tabpanel" aria-labelledby="custom-nav-product-am-tab">
                    <div class="form-group ">
                        <input type="text" name="name" required placeholder="Անուն" class="form-control">
                        <textarea name="description" class="form-control" placeholder="Նկարագիր" rows="3"></textarea>
                    </div>
                </div>
                    <div class="tab-pane fade" id="custom-nav-product-ru" role="tabpanel" aria-labelledby="custom-nav-product-ru-tab">
                        <div class="form-group">
                           <input type="text" name="name_ru" placeholder="Անուն" class="form-control">                          
                            <textarea name="description_ru" class="form-control" placeholder="Նկարագիր" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-nav-product-en" role="tabpanel" aria-labelledby="custom-nav-product-en-tab">
                        <div class="form-group">

                            <input type="text" name="name_en" placeholder="Անուն" class="form-control">
                            <textarea name="description_en" placeholder="Նկարագիր" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>

            </div>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
             <button type="button" class="btn btn-succ sendFormProduct" name="add" value="true">Գրանցել</button>
            <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել և փակել</button>
            <br>
            <div class="info-bl"></div>
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

                    <div class="row">

                        <div class="col-sm-12" >
                            <input type="text" id="input1-group2" name="search" placeholder="Որոնել․․․" class="form-control" style="display:inline-block;width:50%;">
                            <select name="input_type" class="form-control" style="display:inline-block;width:49%;">
                                <option value="1">Ըստ անվանման</option>
                                <option value="2">Ըստ աատգի</option>
                                <option value="3">Ըստ արտիկուլի</option>
                                <option value="4">Ըստ ապրանքի կոդի</option>
                            </select>
                        </div>
                        <br><br>
                        <div class="col-sm-6" style="padding-right:0px;">
                            <select class="standardSelect" data-placeholder="Ընտրել գործընկեր" name="user_id">
                                <option value=""></option>
                                <?php if(!empty($users)){ ?>
                                    <?php foreach($users as $user => $simpleUser){ ?>
                                        <option value="<?php echo $simpleUser->id;?>"><?php echo $simpleUser->name;?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6" style="padding-right:20px;padding-left: 7px;">
                            <select class="multySelect" data-placeholder="Ընտրել ապրանքանիշ" multiple name="brand_id[]">
                                <option value=""></option>
                                <?php if(!empty($brands)){ ?>
                                    <?php foreach($brands as $brand => $simpleBrand){ ?>
                                        <option value="<?php echo $simpleBrand->id;?>"><?php echo $simpleBrand->name;?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <br><br>
                        <div class="col-sm-6" style="padding-right:0px;">
                            <select class="multySelect" data-placeholder="Ընտրել բաժին" multiple id="category" name="category_id[]">
                                <option value=""></option>
                                <?php echo display_list($categories, 'select');?>
                            </select>
                        </div>
                        <br><br>
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                    <button class="btn btn-succ" style="display:block;width:100%;">
                                        <i class="fa fa-search"></i>
                                    </button>
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

<!--<script>-->
<!--    var class_name = 'ttttt';-->
<!--    function callMe(text_,bg, color, class_name){-->
<!---->
<!--        if(class_name == 'body'){-->
<!--            alert('axmax klass dir');-->
<!--        }-->
<!--        jQuery(class_name).html('<h1 style="background:'+bg+';color:'+color+';">'+text_+'</h1>');-->
<!--    }-->
<!--   setTimeout(-->
<!--       function(){3-->
<!--           callMe('test function with text', '#cfcfcf','red','.box-title');-->
<!--       },500-->
<!--   );-->
<!---->
<!---->
<!--</script>-->
