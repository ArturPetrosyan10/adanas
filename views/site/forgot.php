<main class="fs-main-content">
    <div class="fs-sign-up-wrapper">
        <div class="fs-sign-up-block">
            <h2 class="fs-sign-in-title"><?= $GLOBALS['text']['__password__recovery__'] ?></h2>
            <p class="fs-sign-up-paragraph"><?= $GLOBALS['text']['__forgot__send__text__'] ?>։</p>
            <div   class="fs-sign-in-error-message">
                <i class="fs-icon-error"></i>
                <p><?= $GLOBALS['text']['__check__your__email__'] ?></p>
            </div>
            <div   class="fs-sign-in-error-message">
                <i class="fs-icon-error"></i>
                <p><?= $GLOBALS['text']['__no__user__found__'] ?>։</p>
            </div>
            <form action="/site/forgot/" id="loginf" method="POST" class="fs-auth-form">
                <input type="hidden" name="authmod" value="local">
                <input type="hidden" name="regmod" value="forget">
                <label class="fs-auth-input-el">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__hvhh__'] ?></span>
                    <input class="fs-auth-input" required="" type="text" name="TAX" placeholder="<?= $GLOBALS['text']['__hvhh__'] ?>">
                </label>
                <label class="fs-auth-input-el">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__email__'] ?></span>
                    <input class="fs-auth-input" autocomplete="new-password" required="" name="MAIL" id="MAIL" type="text" placeholder="<?= $GLOBALS['text']['__email__'] ?>">
                </label>
                <label class="fs-auth-input-el">
                    <span class="fs-auth-input-label"><?= $GLOBALS['text']['__username__surname__'] ?></span>
                    <input class="fs-auth-input" autocomplete="new-password" required="" name="heyyoulittlehacker2" id="heyyoulittlehacker2" type="text" placeholder="<?= $GLOBALS['text']['__username__surname__'] ?>">
                </label>
                <button type="submit" class="fs-authorization-submit"><?= $GLOBALS['text']['__send__'] ?></button>
                <div class="fs-auth-sign-in-action-row">
                    <a href="/site/sign-in" class="fs-auth-return-pass"><?= $GLOBALS['text']['__return__login__page__'] ?></a>
                </div>
            </form>
        </div>
    </div>
</main>