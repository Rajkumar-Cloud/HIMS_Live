<?php

namespace PHPMaker2021\HIMS;

// Page object
$ResetPassword = &$Page;
?>
<script>
loadjs.ready("head", function () {
    // Write your client script here, no need to add script tags.
});
</script>
<script>
var freset_password;
loadjs.ready("head", function() {
    freset_password = new ew.Form("freset_password");

    // Add field
    freset_password.addFields([
        ["email", [ew.Validators.required(ew.language.phrase("Email")), ew.Validators.email]]
    ]);

    // Captcha
    <?= Captcha()->getScript("freset_password") ?>

    // Set invalid fields
    $(function() {
        freset_password.setInvalid();
    });

    // Validate
    freset_password.validate = function() {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm();

        // Validate fields
        if (!this.validateFields())
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    freset_password.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation
    freset_password.validateRequired = <?= JsonEncode(Config("CLIENT_VALIDATE")) ?>;
    loadjs.done("freset_password");
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="freset_password" id="freset_password" class="ew-form ew-forgot-pwd-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-forgot-pwd-box">
<div class="card">
<div class="card-body">
<p class="login-box-msg"><?= $Language->phrase("ResetPwdMsg") ?></p>
    <div class="form-group row">
        <input type="text" name="<?= $Page->Email->FieldVar ?>" id="<?= $Page->Email->FieldVar ?>" value="<?= HtmlEncode($Page->Email->CurrentValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Language->phrase("UserEmail")) ?>"<?= $Page->Email->editAttributes() ?>>
        <div class="invalid-feedback"><?= $Language->phrase("IncorrectEmail") ?></div>
    </div>
<!-- captcha html (begin) -->
<?= Captcha()->getHtml(); ?>
<!-- captcha html (end) -->
<?php if (!$Page->IsModal) { ?>
    <button class="btn btn-primary ew-btn" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SendPwd") ?></button>
<?php } ?>
</div>
</div>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your startup script here, no need to add script tags.
});
</script>
