<?php
   use app\models\FsProductVariations;
?>
<?php if(!empty($products)){ ?>

    <table class="table" id="products_">
    <thead class="thead-dark">
    <tr>
        <th scope="col"></th>
        <th scope="col">#</th>
        <th scope="col">Անվանում</th>
        <th scope="col">Քանակ</th>
        <th scope="col">Գին</th>
        <th scope="col">ATG</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($products as $product){ ?>
        <tr>
            <th><input type="checkbox" id="prod_<?php echo $product->id;?>" data-variation="default" data-atg="<?php echo $product->atg;?>" data-price="<?php echo $product->price;?>" data-name="<?php echo $product->name;?>" class="form-control ck" data-id="<?php echo $product->id;?>" ></th>
            <th scope="col"><?php echo $product->id;?> </th>
            <th scope="col">
                <div class="row">
                    <div class="col-sm-8"><label style="cursor:pointer;" for="prod_<?php echo $product->id;?>"><?php echo $product->name;?></label></div>
                    <div class="col-sm-4">
                        <?php 
                          $variation = FsProductVariations::find()->where(['product_id'=>$product->id])->all();
                          if(!empty($variation)){ ?>
                            <select class="form-control colorSel">
                                <option value="default" data-price="<?php echo $product->price;?>">Ընտրել գույն</option>
                                <?php foreach ($variation as $variation => $var_val){  ;?>
                                    <?php $param = \app\models\FsParams::findOne(['id'=>$var_val->param_id]);?>
                                 <option value="<?php echo $var_val->id; ?>" data-price="<?php echo $var_val->price;?>"><?php echo $param->name; ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                </div>
            </th>
            <th scope="col"><input type="number" class="form-control count_" placeholder="քանակ"></th>
            <th scope="col" class="pr_"><?php echo $product->price;?></th>
            <th scope="col"><?php echo $product->atg;?></th>
        </tr>
    <?php }?>
    </tbody>
    </table>
    <br>
    <button type="button" class="btn btn-succ saveitems" >Գրանցել</button>
<?php } ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    setTimeout(function(){
            jQuery('#products_').DataTable( {
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