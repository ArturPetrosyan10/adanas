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
<div class="fs-breadcrumbs-wrapper">
    <div class="fs-container">
        <ul class="fs-breadcrumbs-list">
            <li class="fs-breadcrumbs-el"><a href="/"><?= $GLOBALS['text']['__home__page__'] ?></a></li>
            <li class="fs-breadcrumbs-el"><?= $GLOBALS['text']['__contact_us__'] ?></li>
        </ul>
    </div>
</div>
<div class="fs-container d-flex justify-content-between">
        <form method="POST" id="feedBackForm" name="feedBackForm" action="/site/contacts/" class="fs-contact-us-wrapper">
            <div class="fs-page-title">
                <div class="fs-container">
                    <h1><?= $GLOBALS['text']['__contact_us__'] ?></h1>
                </div>
            </div>
            <div class="fs-contact-us-input-field-col">
                <label class="fs-contact-us-input-field">
                    <input type="text"  name="name" id="NAMEFORM"  placeholder="<?= $GLOBALS['text']['__name__'] ?>" >
                </label>
                <label class="fs-contact-us-input-field">
                    <input type="email"  name="email" id="EMAILFROM"  placeholder="<?= $GLOBALS['text']['__email__'] ?>" >
                </label>
                <label class="fs-contact-us-input-field">
                    <input type="text"  name="topic" id="TOPICFROM"  placeholder="not set 'topic'" >
                </label>
                <label class="fs-contact-us-textarea-field">
                    <span class="fs-contact-us-textarea-wrapper">
                        <textarea name="message" id="TEXTFROM" placeholder="<?= $GLOBALS['text']['__message__'] ?>"></textarea>
                    </span>
                </label>
                <div class="fs-contact-us-submit-btn-wrapper">
                    <button type="submit"><?= $GLOBALS['text']['__send__'] ?></button>
                </div>
            </div>
        </form>
        <div class="contact-info-contacts w-33 d-flex flex-column justify-content-between" style="max-height:395px;">
            <div class="fs-page-title">
                <div class="fs-container">
                    <h1><?= $GLOBALS['text']['__contact_us__'] ?></h1>
                </div>
            </div>
            <div class="contact-infos">
                <div class="d-flex justify-content-between contact-block" >
                    <div class="info-icon">
                        <i class="fa fa-dot-circle"></i>
                    </div>
                    <div class="info-content">
                        <h4 class="info-title"><?= $GLOBALS['text']['__address__'] ?></h4>
                        <address class="info-description"><?= $info['address'] ?></address>
                    </div>
                </div>
                <div class="d-flex justify-content-between contact-block" >
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <h4 class="info-title"><?= $GLOBALS['text']['__phone__'] ?></h4>
                        <phone class="info-description">+374 77 55 66 77</phone>
                    </div>
                </div>
                <div class="d-flex justify-content-between contact-block" >
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h4 class="info-title">Էլ․ փոստ </h4>
                        <p>info@adanas.am</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2563.6315385000553!2d44.44910106542994!3d40.171480575731636!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x850f34d3d67bd63c!2zQWRhbmFzIEFybXNwb25nZSDUsdWk1aHVttWh1b0g1LHWgNW01b3VutW41oLVttWj!5e0!3m2!1sru!2sam!4v1677073523488!5m2!1sru!2sam" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
