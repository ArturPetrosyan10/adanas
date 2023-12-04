 <input type="hidden" data-page='Discount' id="page">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/web/css/discount.css">
<?php if(isset($_GET['success']) &&$_GET['success'] == 'true'){ ?>
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show malert">
    <img src="/web/images/check.png" alt="">
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
            <h4 class="box-title">Զեղչեր
               <span class="buttons">
<!--               <button class="btn btn-sm btn-default" id="copyUser" ><i class="fa fa-copy"></i></button>-->
               <button class="btn btn-sm btn-default" id="editeDiscount"><i class="fa fa-pencil"></i></button>
               <button class="btn btn-sm btn-danger" id="disableDiscount"><i class="fa fa-trash"></i></button>
               </span>
            </h4>
             <div class="buttons-group">
                 <a href="#" data-toggle="modal" data-target="#addnew" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել զեղչ</a>
                 <a href="#" data-toggle="modal" data-target="#addnewgroup" class="btn btn-succ fl" style="margin-left:10px;"><i class="bx bx-plus me-1"></i> Ավելացնել Խումբ</a>
                 <select name="type" class="btn btn-succ" style="color:#9B958C;border:1px solid #D7D4D1;border-radius:5px;margin-left:10px;">
                     <option>Փոխել կարգավիճակը</option>
                     <option value="1">Գործող</option>
                     <option value="0">Սպասվող</option>
                     <option value="2">Ավարտված</option>
                 </select>
                 <?php if(!isset($_GET['date'])){ ?>
                 <span class="btn btn-succ fl" style="background:none;color:black;position:relative;margin-top: -5px;float:right;">
                       Գործող   <input type="checkbox" id="switch" /><label for="switch" class="swtch">Գործող</label>
                       <span class="hide dt-block dt-block-cg">
                           <input type="text" id="date_pk" placeholder="Ընտրել ամսաթիվ" class="datepicker">
                          <img  src="/web/images/calendar.png" alt="" class="cal-img">
                       </span>
               </span>
                 <?php } else { ?>
                     <span class="btn btn-succ fl" style="background:none;color:black;position:relative;margin-top: -5px;float:right;">
                       Գործող   <input type="checkbox" checked id="switch" /><label for="switch" class="swtch">Գործող</label>
                       <span class="dt-block dt-block-cg">
                           <input type="text" id="date_pk" value="<?php echo $_GET['date'];?>" placeholder="Ընտրել ամսաթիվ" class="datepicker">
                          <img  src="/web/images/calendar.png" alt="" class="cal-img">
                       </span>
               </span>
                 <?php } ?>
             </div>
         </div>
         <div class="card-body mh-80">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="">
                        <table class="table" id="discountTable">
                           <thead style="background:#DAA520;color:white !important;">
                              <tr>
                                 <th scope="col" style="background:#DAA520 !important;color:white !important;">Անվանում</th>
                                 <th scope="col" style="background:#DAA520 !important;color:white !important;">Կարգավիճակ</th>
                                 <th scope="col" style="background:#DAA520 !important;color:white !important;">Սկիզբ</th>
                                 <th scope="col" style="background:#DAA520 !important;color:white !important;">Ավարտ</th>
                                 <th scope="col" style="background:#DAA520 !important;color:white !important;">Տիպ</th>
                                 <th scope="col" style="background:#DAA520 !important;color:white !important;">Պայման</th>
                                 <th scope="col" style="background:#DAA520 !important;color:white !important;">Խմբի տեսակ</th>
                              </tr>
                           </thead>
                           <tbody class="sortableTable" id="sortable">
                           <?php if(!empty($saleGroups)){ ?>
                              <?php foreach($saleGroups as $me => $meval){ ?>
                              <tr data-id="<?php echo $meval->id;?>" class="parent__">
                                 <td>
                                     <span class="plus">
                                        <img src="/web/images/plus.png" alt="" class="plus-img">
                                     </span>
                                     <span class="minus hide">
                                        <img src="/web/images/minus.png" alt="" class="plus-img">
                                     </span>
                                    <?php echo $meval->name;?>
                                    <?php if($meval->status == 0){ ?>
                                    <i class="fa fa-close" style="color:red;"></i>
                                    <?php } ?>
                                 </td>
                                 <td scope="col"></td>
                                 <td scope="col"></td>
                                 <td scope="col"></td>
                                 <td scope="col"></td>
                                 <td scope="col"></td>
                                 <td scope="col">
                                     <?php
                                     switch ($meval->type_) {
                                         case 1:
                                             echo 'Գումարում';
                                             break;
                                         case 4:
                                             echo 'Հանում';
                                             break;
                                         case 2:
                                             echo 'Մաքսիմում';
                                             break;
                                         case 5:
                                             echo 'Մինիմում';
                                             break;
                                         case 3:
                                             echo 'Բազմապատկում';
                                             break;
                                     };?>
                                 </td>
                              </tr>
                                   <?php
                                       if (!isset($_GET['date'])) {
                                           $discounts = \app\models\FsDiscounts::find()->where(['group_type' => $meval->id])->asArray()->all();
                                       } else {
                                           $discounts = \app\models\FsDiscounts::find()->where(['group_type' => $meval->id])->andWhere((['<','start_date',$_GET['date'] ]))->andWhere((['>','end_date',$_GET['date'] ]))->asArray()->all();
                                       }
                                      ?>

                                       <?php if( !empty($discounts)){ ?>
                                          <?php foreach ($discounts as $disc => $disc_val){ ?>
                              <tr data-id="<?php echo $disc_val['id'];?>" class="chaild__<?php echo $meval->id;?> chaild___ chaild__">
                                 <td>
                                     <img src="/web/images/circle.png" alt="" class="mr-2">
                                    <?php echo $disc_val['name'];?>
                                 </td>
                                 <td scope="col" class="statuse">
                                     <?php switch ($disc_val['discount_status']){
                                         case 0:
                                             echo 'Սպասվող';
                                             break;
                                             case 1:
                                             echo 'Գործող';
                                             break;
                                             case 2:
                                             echo 'Ավարտված';
                                             break;
                                     } ?></td>
                                 <td scope="col"><?php echo $disc_val['start_date'];?></td>
                                 <td scope="col"><?php echo $disc_val['end_date'];?></td>
                                 <td scope="col"><?php switch ($disc_val['discount_type']){
                                         case 1:
                                             echo 'Տոկոսային';
                                             break;
                                         case 2:
                                             echo 'Գումարային զեղչ պատվերի համար';
                                             break;
                                         case 3:
                                             echo 'Գումարային զեղչ պատվերում առկա տողի վրա';
                                             break;
                                         case 4:
                                             echo 'Քանակային զեղչ նույն ապրանքի համար';
                                             break;
                                         case 5:
                                             echo 'Նվեր ապրանքի ծառայության տեսքով';
                                             break;
                                     } ?></td>
                                 <td scope="col">Միանվագ վաճառքի համար</td>
                                 <td scope="col">
                                     <?php  switch ($disc_val->group_type) {
                                         case 1:
                                             echo 'Գումարում';
                                             break;
                                         case 4:
                                             echo 'Հանում';
                                             break;
                                         case 2:
                                             echo 'Մաքսիմում';
                                             break;
                                         case 5:
                                             echo 'Մինիմում';
                                             break;
                                         case 3:
                                             echo 'Բազմապատկում';
                                             break;
                                    };?>
                                 </td>
                              </tr><? } } ?>
                              <?php } ?>
                            <?php } ?>
                           <?php
                           if (!isset($_GET['date'])) {
                               $discounts = \app\models\FsDiscounts::find()->where(['group_type' => null])->asArray()->all();
                           } else {
                               $discounts = \app\models\FsDiscounts::find()->where(['group_type' => null])->andWhere((['<','start_date',$_GET['date'] ]))->andWhere((['>','end_date',$_GET['date'] ]))->asArray()->all();
                           }
                           ?>

                           <?php if( !empty($discounts)){ ?>
                               <?php foreach ($discounts as $disc => $disc_val){ ?>
                               <tr data-id="<?php echo $disc_val['id'];?>" class="parent__">
                                   <td>
                                       <img src="/web/images/circle.png" alt="" class="mr-2">
                                       <?php echo $disc_val['name'];?>
                                   </td>
                                   <td scope="col" class="statuse">
                                       <?php switch ($disc_val['discount_status']){
                                           case 0:
                                               echo 'Սպասվող';
                                               break;
                                           case 1:
                                               echo 'Գործող';
                                               break;
                                           case 2:
                                               echo 'Ավարտված';
                                               break;
                                       } ?></td>
                                   <td scope="col"><?php echo $disc_val['start_date'];?></td>
                                   <td scope="col"><?php echo $disc_val['end_date'];?></td>
                                   <td scope="col"><?php switch ($disc_val['discount_type']){
                                           case 1:
                                               echo 'Տոկոսային';
                                               break;
                                           case 2:
                                               echo 'Գումարային զեղչ պատվերի համար';
                                               break;
                                           case 3:
                                               echo 'Գումարային զեղչ պատվերում առկա տողի վրա';
                                               break;
                                           case 4:
                                               echo 'Քանակային զեղչ նույն ապրանքի համար';
                                               break;
                                           case 5:
                                               echo 'Նվեր ապրանքի ծառայության տեսքով';
                                               break;
                                       } ?></td>
                                   <td scope="col">Միանվագ վաճառքի համար</td>
                                   <td scope="col">
                                       <?php  switch ($disc_val->group_type) {
                                           case 1:
                                               echo 'Գումարում';
                                               break;
                                           case 4:
                                               echo 'Հանում';
                                               break;
                                           case 2:
                                               echo 'Մաքսիմում';
                                               break;
                                           case 5:
                                               echo 'Մինիմում';
                                               break;
                                           case 3:
                                               echo 'Բազմապատկում';
                                               break;
                                       };?>
                                   </td>
                                   </tr><? } } ?>
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
<!-- Modal -->
<div class="modal fade add-new" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="addnew"><b>Ավելացնել զեղչ</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
               <form action="" id="discount_form" method="post" enctype="multipart/form-data" autocomplete="off">
               <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
               <br>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Հիմնական</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="conditions-tab" data-toggle="tab" href="#conditions" role="tab" aria-controls="conditions" aria-selected="false">Զեղչի պայմաններ</a>
                  </li>
                  <li class="nav-item  assortment">
                    <a class="nav-link" id="assortment-tab" data-toggle="tab" href="#assortment" role="tab" aria-controls="assortment" aria-selected="false">Տեսականի</a>
                  </li>
                   <li class="nav-item  partners">
                    <a class="nav-link" id="partners-tab" data-toggle="tab" href="#partners" role="tab" aria-controls="partners" aria-selected="false">Գործընկերներ</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                       <span class="dt-block">
                           <p class="label">սկիզբ</p>
                           <input type="text" name="FsDiscounts[start_date]" id="date_pk_start" placeholder="Ընտրել ամսաթիվ" class="datepicker_start">
                           <img  src="/web/images/calendar.png" alt="" class="cal-img">
                       </span>
                       <span class="dt-block">
                           <p class="label">Ավարտ</p>
                           <input type="text" name="FsDiscounts[end_date]" id="date_pk_end" placeholder="Ընտրել ամսաթիվ" class="datepicker_end">
                           <img  src="/web/images/calendar.png" alt="" class="cal-img">
                       </span>
                      <br><br>
                       <div class="form-group row">
                            <span  class="col-sm-4 col-form-label">Զեղչի տիպ</span>
                            <div class="col-sm-8">
                              <select name="FsDiscounts[discount_type]" id="discount_type" class="form-control">
                                  <option value="1">Տոկոսային</option>
                                  <option value="2">Գումարային զեղչ պատվերի համար</option>
                                  <option value="3">Գումարային զեղչ պատվերում առկա տողի վրա</option>
                                  <option value="4">Քանակային զեղչ նույն ապրանքի համար</option>
                                  <option value="5">Նվեր ապրանքի ծառայության տեսքով</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span  class="col-sm-4 col-form-label">Կարգավիճակ</span>
                            <div class="col-sm-8">
                              <select name="FsDiscounts[discount_status]" id="" class="form-control">
                                  <option value="0">Սպասվող</option>
                                  <option value="1">Գործող</option>
                                  <option value="2">Ավարտված</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span  class="col-sm-4 col-form-label">Անվանում</span>
                            <div class="col-sm-8">
                              <input type="text" name="FsDiscounts[name]" class="form-control" placeholder="Մուտքագրել անվանում">
                            </div>
                        </div>
                           <div class="form-group row">
                            <span  class="col-sm-4 col-form-label">Զեղչի խմբավորման տեսակ</span>
                            <div class="col-sm-8">
                              <select name="FsDiscounts[group_type]" id="" class="form-control">
                                  <option value="">Առանց Խմբի</option>
                                  <?php if(!empty($saleGroups)){ ?>
                                  <?php foreach($saleGroups as $me => $meval){ ?>
                                          <option value="<?php echo $meval->id;?>"><?php echo $meval->name;?></option>
                                  <?php }  } ?>
                               </select>
                              <span style="background:none;color:black;position:relative;margin-top: 5px;">
                                <input type="checkbox" name="FsDiscounts[consider_applied_discounts]" value="1" id="switch-2" /><label for="switch-2" class="swtch"></label>
                              Հաշվի առնել կիրառված զեղչերը 
                            </div>
                        </div>
                        <div class="form-group row sale-procent">
                            <span  class="col-sm-4 col-form-label">Տոկոսի չափ</span>
                            <div class="col-sm-8">
                              <input type="text" name="FsDiscounts[discount_procent]" class="form-control" placeholder="Մուտքագրել տոկոսի չափը">
                            </div>
                        </div>
                      <!-- ////////////////////////////////// -->
                       <div class="form-group row sale-price hide">
                            <span  class="col-sm-4 col-form-label">Գումար</span>
                            <div class="col-sm-8">
                              <input type="text" name="FsDiscounts[discount_price]" class="form-control" placeholder="Մուտքագրել գումարը">
                                <input type="checkbox" name="FsDiscounts[discount_multyple_conditions]" value="1" id="switch-6" /><label for="switch-6" class="swtch"></label>
                                Պայմանների բազմապատիկ կատարում
                            </div>
                        </div>
                      <!-- ////////////////////////////////// -->
                      <div class="form-group row sale-count hide">
                          <span  class="col-sm-4 col-form-label">Անվճար քանակ</span>
                          <div class="col-sm-8">
                              <input type="text" name="FsDiscounts[discount_count]" class="form-control" placeholder="Մուտքագրել քանակը">
                          </div>
                      </div>
                      <div class="form-group row sale-count-why hide">
                          <span  class="col-sm-4 col-form-label">Քանի հատի դեպքում</span>
                          <div class="col-sm-8">
                              <input type="text" name="FsDiscounts[discount_count_why]" class="form-control" placeholder="Մուտքագրել քանակը">
                          </div>
                      </div>
                      <!-- ///////////////////////////////////-->
                        <div class="checkbox-block">
                             <span style="background:none;color:black;position:relative;margin-top: 5px;">
                                <input type="checkbox" name="FsDiscounts[applies_full_range]" value="1" id="switch-3" /><label for="switch-3" class="swtch"></label>
                              Կիրառվում է ամբողջ տեսականու վրա   
                              <br>
                               <span style="background:none;color:black;position:relative;margin-top: 5px;">
                                <input type="checkbox" name="FsDiscounts[applies_full_partners]" id="switch-4" value="1" /><label for="switch-4" class="swtch"></label>
                              Վերաբերում է բոլոր գործընկերներին
                        </div>
                      </div>
                      <div class="tab-pane fade" id="conditions" role="tabpanel" aria-labelledby="conditions-tab">
                        <button class="btn-add btn-add-type" type="button">+ Ավելացնել</button>
                        <br>
                        <table class="table" style="border:1px solid lightgray;margin-left: -10px;">
                            <thead style="background: #DAA520;color: white !important;border-radius: 10px 5px 0px 0px;">
                                <tr>
                                    <td>N</td>
                                    <td>ԶԵՂՉԻ ՊԱՅՄԱՆ</td>
                                    <td>ԳՈՐԾՈՂՈՒԹՅՈՒՆ</td>
                                </tr>
                            </thead>
                            <tbody class="conditions_page">
                                <tr>
                                    <td colspan="3" class="text-center first">Զեղչի պայման նշված չէ</td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="assortment" role="tabpanel" aria-labelledby="assortment-tab">
                           <button class="btn-add btn-add-cond" type="button">+ Ավելացնել</button>
                          <span class="inb">
                              <div class="dropdown">
                                  <button class="btn-add dropdown-toggle" type="button" id="dropdownMenuButtonփ" data-toggle="dropdown">+ Խմբավորել</button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonփ">
                                       <a class="dropdown-item" onclick="addAnd(jQuery(this))">Խումբ <<և>></a>
                                      <a class="dropdown-item" onclick="addOr(jQuery(this))">Խումբ <<կամ>></a>
                                  </div>
                              </div>
                          </span>
                        <br>
                        <table class="table" style="border:1px solid lightgray;margin-left: -10px;">
                            <thead style="background: #DAA520;color: white !important;border-radius: 10px 5px 0px 0px;">
                                <tr>
                                    <td>Տեսականի</td>
                                    <td>Համեմատության տեսակ</td>
                                    <td>Արժեք</td>
                                </tr>
                            </thead>
                            <tbody class="cond">
                            </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="partners" role="tabpanel" aria-labelledby="partners-tab">
                           <button class="btn-add btn-add-partner" type="button">+ Ավելացնել</button>
                           <br>
                            <table class="table" style="border:1px solid lightgray;margin-left: -10px;">
                                <thead style="background: #DAA520;color: white !important;border-radius: 10px 5px 0px 0px;">
                                    <tr>
                                        <td>Գործընկեր</td>
                                        <td>Համեմատության տեսակ</td>
                                        <td>Արժեք</td>
                                    </tr>
                                </thead>
                                <tbody class="cond-partners">
                                        <tr>
                                            <td colspan="3" class="text-center">Գործընկեր նշված չէ</td>
                                        </tr>
                                </tbody>
                            </table>
                      </div>
                </div>
               <br><br>
               <button type="submit" class="btn btn-succ" id="add-discount" name="add-discount" value="true">Ավելացնել</button>
                <div class="other_forms"></div>
               </form>
               <div class="addItem hide">
                <span class="return" style="color:#9B958C;cursor:pointer;"><img src="/web/images/back.png" style="position:relative;top:-1px;left:-3px;" alt="">Վերադարձ</span>
                <br><br>
                <h3>Ապրանքներ/ծառայություններ</h3>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                       <select name="category" id="" class="form-control category">
                          <option value="">Ընտրել կատեգորիա</option>
                           <?php echo display_list($categories, 'select');?>
                       </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control search-cat" placeholder="Որոնել">
                    </div>
                    <div class="col-sm-1">
                        <button class="search-item" type="button">
                           <img src="/web/images/button.png"  alt="">
                        </button>
                    </div>
                    <div class="col-sm-12 checked_items_block"></div>
                    <div class="col-sm-12">
                        <li class="list-group-item" style="border:0px;padding:5px;">
                            <label class="checkbox">
                                <input type="checkbox" data-id="70" class="check_all">
                                <span class="indicator"></span>
                                Ընտրել բոլորը  </label>
                        </li>
                    </div>
                    <div class="col-sm-12 items_block"></div>
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-succ addproducts" >Պահպանել և փակել</button>
                    </div>
                </div>
            </div>
               <div class="addItemSecond hide" >
                <span class="return_second" style="color:#9B958C;cursor:pointer;"><img src="/web/images/back.png" style="position:relative;top:-1px;left:-3px;" alt="">Վերադարձ</span>
                <br><br>
                <h3>Ապրանքներ/ծառայություններ</h3>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <select name="category" id="" class="form-control category">
                          <option value="">Ընտրել կատեգորիա</option>
                           <?php echo display_list($categories, 'select');?>
                       </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control search-cat" placeholder="Որոնել">
                    </div>
                    <div class="col-sm-1">
                        <button class="search-item">
                            <img src="/web/images/button.png" alt="">
                        </button>
                    </div>
                    <div class="col-sm-12 checked_items_block"></div>
                    <div class="col-sm-12">
                        <li class="list-group-item" style="border:0px;padding:5px;">
                            <label class="checkbox">
                                <input type="checkbox" data-id="70" class="check_all">
                                <span class="indicator"></span>
                                Ընտրել բոլորը  </label>
                        </li>
                    </div>
                    <div class="col-sm-12 items_block"></div>
                    <div class="col-sm-12 text-right">
                        <button type="button" class="btn btn-succ addproductssecond" >Պահպանել և փակել</button>
                    </div>
                </div>
            </div>
               <div class="addType hide">
                 <span class="return_t" style="color:#9B958C;cursor:pointer;"><img src="/web/images/back.png" style="position:relative;top:-1px;left:-3px;" alt="">Վերադարձ զեղչի պայմանների ցանկին</span>
                 <br><br>
                 <h3>Զեղչի պայման</h3>
                 <br>
                     <ul class="nav nav-tabs"  role="tablist">
                         <li class="nav-item">
                             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-tb" role="tab" aria-controls="home" aria-selected="true">Հիմնական</a>
                         </li>
                         <li class="nav-item  assortment_sec">
                             <a class="nav-link" id="assortment-tab" data-toggle="tab" href="#assortment-tb" role="tab" aria-controls="assortment" aria-selected="false">Տեսականի</a>
                         </li>
                     </ul>
                     <div class="tab-content">
                         <div class="tab-pane fade show active" id="home-tb" role="tabpanel" aria-labelledby="home-tab">
                             <div class="panel">
                                 <h4>Միանվագ վաճառքի համար</h4>
                                 <div class="form-group row">
                                     <span  class="col-sm-4 col-form-label">Անվանում</span>
                                     <div class="col-sm-8">
                                         <input type="text" name="FsDiscountConditions[condition_name]" class="form-control condition_name"  placeholder="Մուտքագրել անվանում">
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <span  class="col-sm-4 col-form-label">Զեղչի պայման</span>
                                     <div class="col-sm-8">
                                         <select name="FsDiscountConditions[condition_type]" id="" class="form-control condition_type">
                                             <option value="0">Միանվագ վաճառքի համար</option>
                                             <option value="1">Վաճառքի ծավալի համար</option>
                                         </select>
                                     </div>
                                 </div>
                                 <br>
                                 <div class="form-group row interval hide">
                                     <span  class="col-sm-4 col-form-label ">Ժամանակահատված</span>
                                     <div class="col-sm-4">
                                         <select  name="FsDiscountConditions[condition_type_date]" class="form-control" id="">
                                             <option value="1">Օր</option>
                                             <option value="2">Շաբաթ</option>
                                             <option value="3">Ամիս</option>
                                             <option value="4">Տարի</option>
                                         </select>
                                     </div>
                                     <div class="col-sm-4">
                                         <input type="number" name="FsDiscountConditions[condition_type_date_count]" class="form-control no_more"  placeholder="Քանակ">
                                     </div>
                                 </div>
                                 <select name="FsDiscountConditions[condition_pr_type]" id="" class="form-control">
                                     <option value="0">Գումար</option>
                                     <option value="1">Քանակ</option>
                                     <option value="2">Միևնույն ապրանքի քանակ
                                     <option value="3">Իրարից տարբեր ապրանքի քանակ</option>
                                 </select>
                                 <br>
                                 <div class="form-group row">
                                     <span  class="col-sm-2 col-form-label text-right">Ոչ պակաս</span>
                                     <div class="col-sm-4">
                                         <input type="number" name="FsDiscountConditions[no_less]" class="form-control no_less"  placeholder="Գումար">
                                     </div>
                                     <span  class="col-sm-2 col-form-label text-right">Ոչ ավել</span>
                                     <div class="col-sm-4">
                                         <input type="number" name="FsDiscountConditions[no_more]" class="form-control no_more"  placeholder="Գումար">
                                     </div>
                                 </div>
                                 <br>
                                 <div class="checkbox-block">
                                     <span style="background:none;color:black;position:relative;margin-top: 10px;">
                                      <input type="checkbox" name="FsDiscountConditions[for_all]" value="1" id="switch-5" /><label for="switch-5" class="swtch"></label>
                                      Կիրառվում է ամբողջ տեսականու վրա
                                  </div>
                                 <br>
                                 <button type="button" class="btn btn-succ add-discount-condition" value="true">Ավելացնել</button>
                             </div>
                         </div>
                         <div class="tab-pane fade" id="assortment-tb" role="tabpanel" aria-labelledby="assortment-tab">
                             <button class="btn-add btn-add-cond-second" type="button">+ Ավելացնել</button>
                             <br>
                             <table class="table" style="border:1px solid lightgray;margin-left: -10px;">
                                 <thead style="background: #DAA520;color: white !important;border-radius: 10px 5px 0px 0px;">
                                 <tr>
                                     <td>Տեսականի</td>
                                     <td>Համեմատության տեսակ</td>
                                     <td>Արժեք</td>
                                 </tr>
                                 </thead>
                                 <tbody class="cond-second">
                                 </tbody>
                             </table>
                         </div>
                     </div>
                   <br><br>
             </div>
               <div class="editeType hide">
               </div>
               <div id="confirm" class="hide">
                   <p class="text-center">Ցանկանու՞մ եք ջնջել ստեղծված պայմանը:</p><br>
               </div>
               <div class="addPartners hide" >
                 <span class="return_partner" style="color:#9B958C;cursor:pointer;"><img src="/web/images/back.png" style="position:relative;top:-1px;left:-3px;" alt="">Վերադարձ</span>
                 <br><br>
                 <h3>Գործընկերներ</h3>
                 <br>
                 <div class="row">
                     <div class="col-sm-11">
                         <input type="text" class="form-control search-partner" placeholder="Որոնել">
                     </div>
                     <div class="col-sm-1">
                         <button class="search-item-partner">
                             <img src="/web/images/button.png" alt="">
                         </button>
                     </div>
                     <div class="col-sm-12 checked_partners_block"></div>
                     <div class="col-sm-12">
                         <li class="list-group-item" style="border:0px;padding:5px;">
                             <label class="checkbox">
                                 <input type="checkbox" class="check_all">
                                 <span class="indicator"></span>
                                 Ընտրել բոլորը  </label>
                         </li>
                     </div>
                     <div class="col-sm-12 items_block__ss">
                         <?php 

                             $user = Yii::$app->fsUser->identity;
                             $partners = @$user->getBuyerPartners(null)->all();
                             ?>
                         <?php if(!empty($partners)){ ?>
                             <ul class="list-group">
                                 <?php foreach ($partners as $partner){ ?>
                                     <li class="list-group-item" style="border:0px;padding:5px;">
                                         <label class='checkbox'>
                                             <input type='checkbox' data-name="<?php echo $partner->legal_name;?>" data-id="<?php echo $partner->id;?>">
                                             <span class='indicator'></span>
                                             <?php echo $partner->legal_name;?>
                                         </label>
                                     </li>
                                 <?php }?>
                             </ul>
                             <br>
                         <?php } else { ?>
                             <br>
                             <div class="col-sm-12" style="padding-left:0px;">
                                 <h4 class="alert alert-warning">Գործընկերներ չկան</h4>
                             </div>
                         <?php } ?>
                     </div>
                     <div class="col-sm-12 text-right">
                         <button type="button" class="btn btn-succ addpartners" >Պահպանել և փակել</button>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade add-new-group" id="addnewgroup" tabindex="-1" role="dialog" aria-labelledby="addnewgroup" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="addnew"><b>Խմբի ստեղծում</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="" method="post">
               <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
               <br>
               <div class="form-group row">
                    <span class="col-sm-4 col-form-label">Անվանում</span>
                    <div class="col-sm-8">
                        <input type="text" name="FsDiscountGroups[name]"  class="form-control" placeholder="">
                    </div>
                </div>
                 <div class="form-group row">
                    <span class="col-sm-4 col-form-label">Խմբավորման տեսակ</span>
                    <div class="col-sm-8">
                       <div class="row">
                           <div class="col-sm-6">
                               <div class="m-5_">
                                  <input type="radio" name="FsDiscountGroups[type_]"  id="radio1" value="1"><label for="radio1" class="col-sm-4 col-form-label radio">Գումարում</label>
                              </div>
                               <div class="m-5_">
                                <input type="radio" name="FsDiscountGroups[type_]" id="radio2" value="2"><label for="radio2" class="col-sm-4 col-form-label radio">Մաքսիմում</label>
                               </div>
                                <div class="m-5_">
                                 <input type="radio" name="FsDiscountGroups[type_]" id="radio3" value="3"><label for="radio3" class="col-sm-4 col-form-label radio">Բազմապատկում</label>
                               </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="m-5_">
                               <input type="radio" name="FsDiscountGroups[type_]" id="radio4" value="4"><label for="radio4" class="col-sm-4 col-form-label radio">Հանում</label>
                               </div>
                               <div class="m-5_">
                               <input type="radio" name="FsDiscountGroups[type_]" id="radio5" value="5"><label for="radio5" class="col-sm-4 col-form-label radio">Մինիմում</label>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
               <br><br>
               <button type="submit" class="btn btn-succ" name="add" value="true">Գրանցել</button>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modals">
</div>


<script defer src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script defer src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script defer src="/web/js/discount.js"></script>
    <script >
        setTimeout(function(){
            jQuery('#date_pk').on('change', function () {
                window.location.href = '/manager/discounts?date=' + jQuery(this).val();
            })
        },500);

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

