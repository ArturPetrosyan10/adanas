<div class="modal fade add-new" id="editenewposition" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Խմբագրել դիրք (<?php echo $manager->id;?>)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <br>
                    <input type="hidden" name="id" value="<?php echo $manager->id;?>">
                    <span>Գնորդ</span>
                    <?php $cat_ = '';?>
                    <select class="form-control" name="FsUserToBrand[user_id]">
                        <?php if(!empty($partners)){ ?>
                            <?php foreach ($partners as $partner => $part_val){ ?>
                                <?php $cat_ .= $part_val->categories;?>
                                <?php if($manager->user_id != $part_val->id){ ?>
                                <option value="<?php echo $part_val->id;?>"><?php echo $part_val->legal_name;?></option>
                                    <?php } else { ?>
                                    <option selected value="<?php echo $part_val->id;?>"><?php echo $part_val->legal_name;?></option>
                                    <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <?php
                    // BRANDERI LOGIKAN NOR PETQA LINI STEX
                    //                        $params =FsbR::find()->where(['parent_id'=>38])->asArray()->all();

                    ;?>
                    <span>Բրենդ</span>
                    <select class="form-control" name="FsUserToBrand[brand_id]" id="">
                        <?php if(!empty($brands)){ ?>
                            <?php foreach ($brands as $brand => $brand_val){
                                $br = \app\models\FsBrands::findOne(['id'=>$brand_val['brand_id']]);
                                ?>
                                <?php if($manager->brand_id != $brand_val['brand_id']){ ?>
                                    <option value="<?php echo $br['id'];?>"><?php echo $br['name'];?></option>
                                <?php } else { ?>
                                    <option selected value="<?php echo $br['id'];?>"><?php echo $br['name'];?></option>
                                <?php } ?>

                            <?php } ?>
                        <?php } ?>
                    </select>
                    <span>Աշխատող</span>
                    <select name="FsUserToBrand[customer_id]" class="form-control">
                        <?php if(!empty($workers)){ ?>
                            <?php foreach ($workers as $worker => $worker_val){ ?>

                                <?php if($manager->customer_id != $worker_val['id']){ ?>
                                    <option value="<?php echo $worker_val['id'];?>"><?php echo $worker_val['username'];?></option>
                                <?php } else { ?>
                                    <option selected value="<?php echo $worker_val['id'];?>"><?php echo $worker_val['username'];?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>

                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                    <button type="submit" class="btn btn-succ" name="editeposition" value="true">Գրանցել</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery('#editenewposition').modal('show');
</script>