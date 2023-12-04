<main class="fs-main-content">
    <div class="fs-sign-up-wrapper">
        <div class="fs-sign-up-block">
            <h2 class="fs-sign-up-title"><?= $GLOBALS['text']["__register__organization__"] ?></h2>
            <p class="fs-sign-up-paragraph"><?= $GLOBALS['text']["__commerce__platform__is__text__"] ?> <a href="http://infoexpert.am/"><?= $GLOBALS['text']["__infoexpert__"] ?></a> <?= $GLOBALS['text']["__commerce__platform__is__text2__"] ?>։</p>
            <div class="fs-sign-in-error-message">
                <i class="fs-icon-error"></i>
                <p><?= $GLOBALS['text']["__two__must__be__selected__"] ?></p>
            </div>
            <form action="/site/register" id="regf" method="POST" class="fs-auth-form">
                <input type="hidden" name="authmod" value="local" />
                <input type="hidden" name="regmod" value="reg" />
                <input type="hidden" id="buyer" name="is_buyer" value="1" />
<!--                <div class="fs-auth-role">-->
<!--                    <label class="fs-auth-role-el">-->
<!--                        <input type="checkbox" id="buyer" name="is_buyer" value="1" />-->
<!--                        <span class="fs-auth-checkbox-imitation"></span>-->
<!--                        <span class="fs-auth-checkbox-label">--><?php //= $GLOBALS['text']['__buyer__'] ?><!--</span>-->
<!--                    </label>-->
<!--                    <label class="fs-auth-role-el">-->
<!--                        <input type="checkbox" id="seller" name="is_seller" value="1" />-->
<!--                        <span class="fs-auth-checkbox-imitation"></span>-->
<!--                        <span class="fs-auth-checkbox-label">--><?php //= $GLOBALS['text']["__salesman__"] ?><!--</span>-->
<!--                    </label>-->
<!--                </div>-->
                <label class="fs-auth-input-el  required checking-input" data-type="inn" data-error="<?= $GLOBALS['text']["__must__contain__characters__8__"] ?>" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__hvhh__'] ?> *</span>
                    <input class="fs-auth-input inn-input" autocomplete="new-password" id="TAX" name="company_hvhh" type="text" minlength="8" placeholder="<?= $GLOBALS['text']['__hvhh__'] ?>" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" maxlength="8" min="0" max="99999999" />
                </label>
                <label class="fs-auth-input-el  required checking-input" data-type="regular_name" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__legal_name__'] ?> *</span>
                    <input class="fs-auth-input" autocomplete="new-password" name="legal_name" id="NAME" type="text" placeholder="<?= $GLOBALS['text']['__legal_name__'] ?>" />
                </label>
                <label class="fs-auth-input-el  checking-input done" data-type="holding_inn" data-error="<?= $GLOBALS['text']["__must__contain__characters__8__"] ?>">
                    <span class="fs-auth-input-label max-len-check"><?= $GLOBALS['text']['__holding_hvhh__'] ?></span>
                    <input class="fs-auth-input inn-input" type="text" id="PARENT_TAX" name="holding_hvhh" minlength="8" placeholder="<?= $GLOBALS['text']['__holding_hvhh__'] ?>" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" maxlength="8" min="0" max="99999999" />
                </label>
                <label class="fs-auth-input-el  checking-input done" data-type="holding_regular_name">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__holding_legal_name__'] ?></span>
                    <input class="fs-auth-input" type="text" id="PARENT_NAME" name="holding_legal_name" placeholder="<?= $GLOBALS['text']['__holding_legal_name__'] ?>" />
                </label>
                <label class="fs-auth-input-el  required checking-input" data-type="regular_name" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__contact_person_aah__'] ?> *</span>
                    <input class="fs-auth-input" type="text" id="CONTACT_NAME" name="name" placeholder="<?= $GLOBALS['text']['__contact_person_aah__'] ?>" />
                </label>
                <label class="fs-auth-input-el  required checking-input" data-type="regular_name" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__legal_address__'] ?> *</span>
                    <input class="fs-auth-input" autocomplete="new-password" id="ADDRTEXT" name="legal_address" type="text" placeholder="<?= $GLOBALS['text']['__legal_address__'] ?>" />
                </label>
                <label class="fs-auth-same-block ">
                    <input type="checkbox" id="ISWORKSAME" name="ISWORKSAME" value="1">
                    <span class="fs-auth-same-block-input-imitation"></span>
                    <span class="fs-auth-same-block-input-label"><?= $GLOBALS['text']["__legal__address__matches__text1__"] ?></span>
                </label>
                <label class="fs-auth-input-el  required checking-input" data-type="regular_name" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__action_address__'] ?> *</span>
                    <input class="fs-auth-input" type="text" id="WORKADDRTEXT" name="address" placeholder="<?= $GLOBALS['text']['__action_address__'] ?>" />
                </label>
                <label class="fs-auth-input-el  required checking-input" data-type="email" data-error="<?= $GLOBALS['text']['__email__address__incorrect__'] ?>" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__email__'] ?>  *</span>
                    <input class="fs-auth-input mail-input" autocomplete="new-password" name="email" type="email" placeholder="<?= $GLOBALS['text']['__email__'] ?>" />
                </label>
                <div class="fs-auth-tel fs-auth-input-el  required checking-input" data-type="tel" data-error="<?= $GLOBALS['text']['__phone__incorrect__'] ?>" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__phone__'] ?> *</span>
                    <div class="fs-tel-code">
                        <p class="fs-tel-country"><img src="/web/site/assets/media/images/flags/arm.png" alt=""></p>
                        <ul class="fs-tel-code-list">
                            <li class="fs-tel-code-li" data-lang="arm"><img src="/web/site/assets/media/images/flags/arm.png" alt=""></li>
                            <li class="fs-tel-code-li" data-lang="rus"><img src="/web/site/assets/media/images/flags/rus.png" alt=""></li>
                        </ul>
                    </div>
                    <input type="text" placeholder="+374xxxxxxxx" autocomplete="new-password" name="phone" class="fs-auth-input masked-tel" />
                </div>
                <label class="fs-auth-input-el  pass required checking-input" data-type="pass" data-error="<?= $GLOBALS['text']['__password__incorrect__1__'] ?>" data-empty="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__password__'] ?> *</span>
                    <input class="fs-auth-input fs-checkable-input" autocomplete="new-password" name="password" type="password" value="Artu1234!@" placeholder="<?= $GLOBALS['text']['__password__'] ?>" />
                </label>
                <label class="fs-auth-input-el  required checking-input" data-type="verify_pass" data-error="<?= $GLOBALS['text']['__password__vary__'] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__repeat__password__'] ?> *</span>
                    <input class="fs-auth-input fs-checkable-input" type="password" value="Artu1234!@" placeholder="<?= $GLOBALS['text']['__repeat__password__'] ?>" />
                </label>
                <div class="fs-auto-select-wrapper " data-error="<?= $GLOBALS['text']["__field__must__not__empty__"] ?>">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']["__choose__categories__"] ?> *</span>
                    <div class="fs-multi-dropdown">
                        <input type="hidden" name="categories" value="">
                        <div class="fs-multi-dropdown-selected-variants empty" data-empty-message="<?= $GLOBALS['text']["__choose__categories__"] ?>">
                            <button type="button" class="fs-multi-dropdown-add-button fs-icon-close"></button>
                        </div>
                        <div class="fs-multi-dropdown-list">
                            <ul class="fs-multi-dropdown-list-wrapper">
                                <?php if(!empty($categories)){ ?>
                                <?php foreach ($categories as $category) { ?>
                                        <li class="fs-multi-dropdown-list-el" data-value="<?php echo $category->id;?>">
                                            <?php if($_COOKIE['language'] != 'hy' ){
                                                $category->name =  $category->translation['name_' . $_COOKIE['language']];
                                            }
                                            echo $category->name;?></li>
                               <?php } }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <label class="fs-authorization-policy-row  required" data-error="<?= $GLOBALS['text']["__you__must__accept__text1__"] ?>">
                    <input type="checkbox" />
                    <span class="fs-authorization-checkbox-imit"></span>
                    <span class="fs-authorization-text"><?= $GLOBALS['text']["__i__accept__"] ?> <a href="/page/police" target="_blank"><?= $GLOBALS['text']["__privacy__policy__"] ?></a> և <a href="/pages/terms/3/" target="_blank"><?= $GLOBALS['text']["__terms__of__service__"] ?></a></span>
                </label>
                <button type="submit" class="fs-authorization-submit disabled"><?= $GLOBALS['text']["__register__"] ?></button>
            </form>
            <p class="fs-authorized-already">
                <?= $GLOBALS['text']['__already__registered__'] ?>
                <a href="/site/sign-in"><?= $GLOBALS['text']['__login__'] ?></a>
            </p>
        </div>
    </div>
</main>
<?php if($_GET['model'] == 'buyer'){ ?>
<script>
   setTimeout(function (){
       jQuery('#buyer').click();
   },1200)
</script>
<?php } else if($_GET['model'] == 'seller') { ?>
    <script>
        setTimeout(function (){
            jQuery('#seller').click();
        },1200);
    </script>
<?php } ?>
