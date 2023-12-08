<main class="fs-main-content">
    <div class="fs-sign-up-wrapper">
        <div class="fs-sign-up-block">
            <h2 class="fs-sign-in-title"><?= $GLOBALS['text']["__login__system__"] ?></h2>
            <?php if(isset($_GET['wrong_password'])){ ?>
            <div   class="fs-sign-in-error-message" style="display:block;">
                <i class="fs-icon-error"></i>
                <p><?= $GLOBALS['text']["__no__user__found__"] ?></p>
            </div>
                <script>
        var url = window.location.href;
        url = url.split('?')[0];
        window.history.replaceState({}, document.title, url);
    </script>
            <?php } ?>
            <form action="/site/login" id="loginf" method="POST" class="fs-auth-form">
                <input type="hidden" name="authmod" value="local" />
                <input type="hidden" name="regmod" value="login" />

                <label class="fs-auth-input-el">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']["__email__address__user__"] ?></span>
                    <input class="fs-auth-input" autocomplete="new-password" required  name="email" id="heyyoulittlehacker1" type="text" placeholder="<?= $GLOBALS['text']["__email__address__user__"] ?>" />
                </label>
                <label class="fs-auth-input-el">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__password__'] ?></span>
                    <input class="fs-auth-input" autocomplete="new-password"  required name="password" id="heyyoulittlehacker2" type="password" placeholder="<?= $GLOBALS['text']['__password__'] ?>" />
                </label>
                <div class="fs-auth-sign-in-action-row">
                    <label class="fs-auth-remember-me">
                        <input name="remember_me" value="1"  type="checkbox" />
                        <span class="fs-auth-checkbox-imitation"></span>
                        <span class="fs-auth-checkbox-label"><?= $GLOBALS['text']["__remember__me__"] ?></span>
                    </label>
                    <a href="/forgot/" class="fs-auth-forgot-pass"><?= $GLOBALS['text']["__forgot__password__"] ?></a>
                </div>
                <button type="submit" class="fs-authorization-submit"><?= $GLOBALS['text']["__enter__"] ?></button>
            </form>
            <!--<p class="fs-authorized-already">
                <?php /*= $GLOBALS['text']["__not__registered__yet__"] */?>
                <a href="/sign-up/"><?php /*= $GLOBALS['text']["__register__"] */?></a>
            </p>-->
        </div>
    </div>
</main>
