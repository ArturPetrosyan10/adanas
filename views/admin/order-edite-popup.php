<div class="modal fade add-new" id="editenew" tabindex="-1" role="dialog" aria-labelledby="editenew" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Փոփոխել պատվեր (#<?php echo $order->id;?> )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Վաճառող</th>
                            <td><?php echo $order->seller->name;?></td>
                            <th scope="row">Գնող</th>
                            <td><?php echo $order->buyer->name;?></td>
                        </tr>
                        <tr>
                            <th scope="row">Արժեք</th>
                            <td><?php echo number_format($order->price);?> դր․</td>
                            <th scope="row">Ապրանքների քանակը</th>
                            <td><?php echo number_format($order->seller_quantity);?></td>
                        </tr>
                        <tr>
                            <th scope="row">Ամսաթիվ</th>
                            <td><?php echo date('d F Y, h:i',strtotime($order->created_at));?></td>
                            <th scope="row">Կարգավիճակ</th>
                            <td>
                                <select class="form-control" onclick="changeOrderStat(<?php echo $order->id;?>, this.value)">
                                    <option value="1" <?php if($order->status == 1){ echo 'selected';}?>>Պատվիրված</option>
                                    <option value="2" <?php if($order->status == 2){ echo 'selected';}?>>Ուղարկված հաստատման</option>
                                    <option value="3" <?php if($order->status == 3){ echo 'selected';}?>>Հաստատված</option>
                                    <option value="4" <?php if($order->status == 4){ echo 'selected';}?>>Փակված</option>
                                    <option value="5" <?php if($order->status == 5){ echo 'selected';}?>>Մերժված</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-succ addItem" style="margin-bottom:20px;" data-id="<?php echo $order->id;?>" data-seller="<?php echo $order->seller_id;?>" ><i class="bx bx-plus me-1"></i> Ավելացնել</button>
                <br>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $order->id;?>">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Անվանում</th>
                        <th scope="col">Քանակ</th>
                        <th scope="col">Գին</th>
                        <th scope="col">Ընդ․</th>
                        <th scope="col">ATG</th>
                        <th scope="col">Գործ․</th>
                    </tr>
                    </thead>
                    <tbody class="tbodyUpdate">

                <?php if($order->cart_id){
                    $products = explode(',',$order->cart_id);
                    if(count($products)>0){
                        for ($i = 0; $i < count($products); $i++){
                            $productCart = \app\models\FsCart::findOne(['id'=>$products[$i]]);
                            $product = \app\models\FsProducts::findOne(['id'=>$productCart->product_id]);
                            echo '<tr>
                                        <th scope="col">'.$product->id.'</th>
                                        <th scope="col">'.$product->name.'</th>
                                        <th scope="col">
                                        <input type="hidden" name="pid[]" value="'. $product->id.'">
                                        <input type="hidden" name="price[]" value="'.$productCart->price.'">
                                        <input type="number" name="count[]" data-id="'. $productCart->id.'"  class="form-control changeCount" value="'. $productCart->quantity.'"></th>
                                        <th scope="col">'.number_format($productCart->price).' դր․</th>
                                        <th>'. number_format($productCart->price*$productCart->quantity) .' դր․</th>
                                        <th scope="col">'.$product->atg.'</th>
                                        <th scope="col">
                                          <button class="btn btn-sm btn-danger deletProduct" data-id="'. $productCart->id.'"><i class="fa fa-trash"></i></button>
                                         </th>
                                    </tr>';
                        }
                    }
                } ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                <button class="btn btn-succ addItem" name="edite" value="true" style="margin-bottom:20px;" >Գրանցել</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery('#editenew').modal('show');
    jQuery('.addItem').click(function(){
        let id = jQuery(this).attr('data-id');
        let seller_id = jQuery(this).attr('data-seller');
        if (id) {
            jQuery.ajax({
                url: "/admin/get-items?id=" + id+"&seller_id="+seller_id,
                success: function(result) {
                    jQuery(".items").html(result);
                    jQuery('#addnew').modal('show');
                }
            });
        }
    });
</script>
<style>
    .modal-backdrop {
        visibility: hidden !important;
    }
    .modal.in {
        background-color: rgba(0,0,0,0.5);
    }
</style>
