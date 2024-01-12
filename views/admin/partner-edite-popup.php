<?php
$user_group = \app\models\FsUsersGroup::find()->all();
if(isset($partner)){
    $chossen_group_ids = $partner->group_id;
}
?>


<div class="modal fade add-new" id="editenew" tabindex="-1" role="dialog" aria-labelledby="editenew" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Փոփոխել հաճախորդ ( գործընկեր ՝ <?php echo $partner->legal_name;?>) </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="Partners_ed">
                    <input type="hidden" name="id" value="<?php echo $partner->id;?>">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <div class="row">
                        <div class="col-sm-4">

                            <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Կազմակերպության ՀՎՀՀ</span>
                            <input type="text" name="FsUsers[company_hvhh]" onchange="isValidHvhh(jQuery(this))" value="<?php echo $partner->company_hvhh;?>" placeholder="Կազմակերպության ՀՎՀՀ" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;">Իրավաբանական անվանումը </span>
                            <input type="text" name="FsUsers[legal_name]" value="<?php echo $partner->legal_name;?>" placeholder="Իրավաբանական անվանումը" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;">Հոլդինգի ՀՎՀՀ</span>
                            <input type="text" onchange="isValidHvhh(jQuery(this))" name="FsUsers[holding_hvhh]" value="<?php echo $partner->holding_hvhh;?>" placeholder="Հոլդինգի ՀՎՀՀ" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;">Հոլդինգի իրավաբանական անվանումը</span>
                            <input type="text" name="FsUsers[holding_legal_name]" value="<?php echo $partner->holding_legal_name;?>" placeholder="Հոլդինգի իրավաբանական անվանումը" class="form-control">

                            <span style="margin-bottom: 4px;color: #878787;">Հաճախորդի տեսակ</span>
                            <select class="form-control multiple" name="users_group" >
                                <option value=" ">Ընտրել</option>
                                <?php foreach ($user_group as $index => $item) { ?>
                                    <option value="<?= $item->id ?>" <?= $item->id == $chossen_group_ids ? 'selected' : '' ?>><?= $item->name ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-sm-4">
                            <span style="margin-bottom: 4px;color: #878787;">Կոնտակտային անձի ԱԱՀ *</span>
                            <input type="text" name="FsUsers[name]" value="<?php echo $partner->name;?>" placeholder="Կոնտակտային անձի ԱԱՀ *" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;">Իրավաբանական հասցե *</span>
                            <input type="text" name="FsUsers[legal_address]" value="<?php echo $partner->legal_address;?>" placeholder="Իրավաբանական հասցե *" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;margin-top:2px;display:block;">Գործունեության հասցե *</span>
                            <input type="text" name="FsUsers[address]" value="<?php echo $partner->address;?>" placeholder="Գործունեության հասցե *" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;">Էլեկտրոնային հասցե *</span>
                            <input type="email" name="FsUsers[email]" value="<?php echo $partner->email;?>" placeholder="Էլեկտրոնային հասցե *" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;">Լիցենզիայի ժամկետի ավարտ </span>
                            <input type="datetime-local" name="FsUsers[active_date]" value="<?php echo $partner->active_date;?>" placeholder="Լիցենզիայի ժամկետի ավարտ" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <span style="margin-bottom: 4px;color: #878787;">Լոգո</span>
                            <?php if(!empty($partner->image)){?>
                                <br>
                                <img src="/<?php echo $partner->image;?>" height="60" alt="">
                                <br>
                                <input type="hidden" name="old_img" value="<?php echo $partner->image;?>">
                            <?php } ?>

                            <input type="file" name="logo">
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" <?php if($partner->verified){ echo 'checked';}?> name="FsUsers[verified]" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Ակտիվացված
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox" <?php if($partner->is_seller){ echo 'checked';}?> name="FsUsers[is_seller]" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Գործընկեր
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  <?php if($partner->is_buyer){ echo 'checked';}?> name="FsUsers[is_buyer]" value="1" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Հաճախորդ
                                </label>
                            </div>
                            <span style="margin-bottom: 4px;color: #878787;">Հեռախոսահամար *</span>
                            <input type="text" name="FsUsers[phone]" onchange="isValid(jQuery(this).val())" value="<?php echo $partner->phone;?>" placeholder="Հեռախոսահամար *" class="form-control ph">
                            <span style="margin-bottom: 4px;color: #878787;">Հղում</span>
                            <input type="text" name="FsUsers[link]" value="<?php echo $partner->link;?>" placeholder="Հղում" class="form-control">
                            <span style="margin-bottom: 4px;color: #878787;">Գաղտնաբառ *</span>
                            <input type="text" name="FsUsers[password]" value="" placeholder="Գաղտնաբառ *" class="form-control">

                        </div>

                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                    <button type="submit" class="btn btn-succ" name="edite" value="true">Գրանցել և փակել</button>
                    <button type="button" class="btn btn-succ sendFormPartnerEdite" name="edite" value="true">Գրանցել</button>
                    <div class="info-bl-ec"></div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery('#editenew').modal('show');
    function isValid(p) {
        var phoneRe = /^[0-9]\d{2}[2-9]\d{2}\d{3}$/;
        var digits = p.replace(/\D/g, "");
        if(!phoneRe.test(digits)){
            jQuery('.ph').css('border','1px solid red');
            jQuery('#editenew .btn-succ').attr('disabled','disabled');
        } else {
            jQuery('.ph').css('border','1px solid #ced4da');
            jQuery('#editenew .btn-succ').removeAttr('disabled');
        }
    }
    function isValidHvhh(p) {
        var hvhh = /^[0-9]\d{2}[2-9]\d{2}\d{3}$/;
        var digits = p.val().replace(/\D/g, "");
        if(!hvhh.test(digits)){
            p.css('border','1px solid red');
            jQuery('#editenew .btn-succ').attr('disabled','disabled');
        } else {
            p.css('border','1px solid #ced4da');
            jQuery('#editenew .btn-succ').removeAttr('disabled');
        }
    }
</script>