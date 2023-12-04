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
            
            </h4>
             <div class="buttons-group">
                 <select name="type" class="btn btn-succ" style="color:#9B958C;border:1px solid #D7D4D1;border-radius:5px;margin-left:10px;">
                     <option>Փոխել կարգավիճակը</option>
                     <option value="2">Գործող</option>
                     <option value="3">Սպասվող</option>
                     <option value="4">Ավարտված</option>
                 </select>
                 <span class="btn btn-succ fl" style="background:none;color:black;position:relative;margin-top: -5px;float:right;">
               Գործող   <input type="checkbox" id="switch" /><label for="switch" class="swtch">Գործող</label>
               <span class="hide dt-block dt-block-cg">
               <input type="text" id="date_pk" placeholder="Ընտրել ամսաթիվ" class="datepicker">
               <img  src="/web/images/calendar.png" alt="" class="cal-img">
               </span>
               </span>
             </div>
         </div>
         <div class="card-body mh-80">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="">
                        <table class="table" id="discountTable__">
                           <thead >
                              <tr>
                                 <th style="background:#008A4E !important;color:white !important;" scope="col">Անվանում</th>
                                 <th style="background:#008A4E !important;color:white !important;" scope="col">Կարգավիճակ</th>
                                 <th style="background:#008A4E !important;color:white !important;" scope="col">Սկիզբ</th>
                                 <th style="background:#008A4E !important;color:white !important;" scope="col">Ավարտ</th>
                                 <th style="background:#008A4E !important;color:white !important;" scope="col">Տիպ</th>
                                 <th style="background:#008A4E !important;color:white !important;" scope="col">Պայման</th>
                                 <th style="background:#008A4E !important;color:white !important;" scope="col">Գործընկերներ</th>
                              </tr>
                           </thead>
                           <tbody class="sortableTable" id="sortable">
                           
                            <?php if( !empty($discounts)){ ?>
                                <?php foreach ($discounts as $disc => $disc_val){ ?>
                          
                              <tr data-id="<?php echo $disc_val->id;?>">
                                 <td>
                                     <img src="/web/images/circle.png" alt="" class="mr-2">
                                    <?php echo $disc_val['name'];?>
                                 </td>
                                 <td scope="col">
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
                                     <?php echo $disc_val->user->name;?>
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

<div class="modals">
</div>


<script defer src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script defer src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script defer src="/web/js/discount.js"></script>
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
<script>
    setTimeout(function(){
            jQuery('#discountTable__').DataTable( {
                "language": {
                    "lengthMenu": "Ցուցադրված է _MENU_",
                    "zeroRecords": "ապրանքներ չկան",
                    "info": "Ընդանուր _TOTAL_ ",
                    "infoEmpty": "ապրանքներ չկան",
                    "infoFiltered": "(ֆիլտրվել է  _MAX_ ընդանուր ապրանքներից)",
                    "paginate": {
                        'previous': '‹',
                        'next':     '›'
                    }
                },
                "oLanguage": {
                    "sSearch": "Որոնում:"
                }
            });
    },500);

</script>
