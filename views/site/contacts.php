<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
</style>
<main class="fs-main-content">
    <div class="fs-breadcrumbs-wrapper">
        <div class="fs-container">
            <ul class="fs-breadcrumbs-list">
                <li class="fs-breadcrumbs-el"><a href="/"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
                <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['__contact_persons__'] ?></li>
            </ul>
        </div>
    </div>
    <div class="fs-page-title">
        <div class="fs-container">
            <h1><?= $GLOBALS['text']['__contact_persons__'] ?></h1>
        </div>
    </div>
    <form method="POST" id="feedBackForm" name="feedBackForm" action="/site/contacts/" class="fs-contact-us-wrapper">
        <div class="fs-container">
            <div class="fs-contact-us-input-field-col">
                <label class="fs-contact-us-input-field">
                    <span class="fs-contact-us-field-label"><?= $GLOBALS['text']['__hvhh__'] ?></span>
                    <input type="text" readonly name="company_hvhh" value="<?= $user['company_hvhh'] ?>" id="TAXFROM" placeholder="<?= $GLOBALS['text']['__hvhh__'] ?>" />
                </label>
                <label class="fs-contact-us-input-field">
                    <span class="fs-contact-us-field-label"><?= $GLOBALS['text']['__legal_name__'] ?></span>
                    <input type="text" readonly name="legal_name" value="<?= $user['legal_name'] ?>" id="LEGALNAMEFROM" placeholder="<?= $GLOBALS['text']['__legal_name__'] ?>" />
                </label>
                <label class="fs-contact-us-input-field">
                    <span class="fs-contact-us-field-label"><?= $GLOBALS['text']['__contact_person_aah__'] ?></span>
                    <input type="text" readonly name="name" id="NAMEFROM" value="<?= $user['name'] ?>"  placeholder="Անուն Ազգանուն Հայրանուն" />
                </label>
                <label class="fs-contact-us-input-field">
                    <span class="fs-contact-us-field-label"><?= $GLOBALS['text']['__email__'] ?></span>
                    <input type="email" readonly name="email" id="EMAILFROM" value="<?= $user['email'] ?>"  placeholder="<?= $GLOBALS['text']['__email__'] ?>" />
                </label>
                <label class="fs-contact-us-input-field">
                    <span class="fs-contact-us-field-label"><?= $GLOBALS['text']['__phone__'] ?></span>
                    <input type="tel" readonly name="phone" id="PHONEFROM" value="<?= $user['phone'] ?>"  placeholder="" class="fs-tel-international" />
                </label>
            </div>
            <div class="fs-contact-us-input-field-col">
                <label class="fs-contact-us-textarea-field">
                    <span class="fs-contact-us-field-label"><?= $GLOBALS['text']['__message__'] ?></span>
                    <span class="fs-contact-us-textarea-wrapper">
            <textarea name="message" id="TEXTFROM" placeholder="<?= $GLOBALS['text']['__message__'] ?>"></textarea>
            <button type="button"><span></span></button>
            </span>
                </label>
                <div class="fs-contact-us-submit-btn-wrapper">
                    <button type="submit"><?= $GLOBALS['text']['__send__'] ?></button>
                </div>
            </div>
        </div>
    </form>
</main>