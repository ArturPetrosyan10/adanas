<div class="modal fade add-new" id="editenew" tabindex="-1" role="dialog" aria-labelledby="editenew" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Փոփոխել օգտատեր ( <?php echo $user->username;?> )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $user->id;?>">
                    <input type="hidden" name="<?= $this->renderDynamic('return Yii::$app->request->csrfParam;'); ?>" value="<?= $this->renderDynamic('return Yii::$app->request->csrfToken;'); ?>" />
                    <br>
                    <span>Անուն</span>
                    <input type="text" name="Users[username]" value="<?php echo $user->username;?>" required placeholder="Անուն" class="form-control">
                    <span>Էլ․ փոստ</span>
                    <input type="text" name="Users[email]" value="<?php echo $user->email;?>"  placeholder="Էլ․ փոստ" class="form-control">
                    <span>Պաշտոն</span>
                    <select name="Users[role]" class="form-control">
                        <option value="10" <?php if($user->role == 10){ echo 'selected';}?>>Ադմին</option>
                        <option value="20" <?php if($user->role == 20){ echo 'selected';}?>>Օպերատոր</option>
                        <option value="30" <?php if($user->role == 30){ echo 'selected';}?>>խմբագիր</option>
                    </select>
                    <span>Գաղտնաբառ</span>
                    <input type="password" name="Users[password]"   placeholder="Գաղտնաբառ" class="form-control">
                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                    <button type="submit" class="btn btn-succ" name="edite_sec" value="true">Գրանցել</button>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery('#editenew').modal('show');
</script>