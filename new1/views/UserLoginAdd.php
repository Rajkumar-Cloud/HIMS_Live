<?php

namespace PHPMaker2021\project3;

// Page object
$UserLoginAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fuser_loginadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fuser_loginadd = currentForm = new ew.Form("fuser_loginadd", "add");

    // Add fields
    var fields = ew.vars.tables.user_login.fields;
    fuser_loginadd.addFields([
        ["User_Name", [fields.User_Name.required ? ew.Validators.required(fields.User_Name.caption) : null], fields.User_Name.isInvalid],
        ["mail_id", [fields.mail_id.required ? ew.Validators.required(fields.mail_id.caption) : null], fields.mail_id.isInvalid],
        ["mobile_no", [fields.mobile_no.required ? ew.Validators.required(fields.mobile_no.caption) : null], fields.mobile_no.isInvalid],
        ["_password", [fields._password.required ? ew.Validators.required(fields._password.caption) : null], fields._password.isInvalid],
        ["email_verified", [fields.email_verified.required ? ew.Validators.required(fields.email_verified.caption) : null], fields.email_verified.isInvalid],
        ["ReportTo", [fields.ReportTo.required ? ew.Validators.required(fields.ReportTo.caption) : null, ew.Validators.integer], fields.ReportTo.isInvalid],
        ["_UserLevel", [fields._UserLevel.required ? ew.Validators.required(fields._UserLevel.caption) : null, ew.Validators.integer], fields._UserLevel.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null, ew.Validators.datetime(0)], fields.CreatedDateTime.isInvalid],
        ["profilefield", [fields.profilefield.required ? ew.Validators.required(fields.profilefield.caption) : null], fields.profilefield.isInvalid],
        ["_UserID", [fields._UserID.required ? ew.Validators.required(fields._UserID.caption) : null, ew.Validators.integer], fields._UserID.isInvalid],
        ["GroupID", [fields.GroupID.required ? ew.Validators.required(fields.GroupID.caption) : null, ew.Validators.integer], fields.GroupID.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["PharID", [fields.PharID.required ? ew.Validators.required(fields.PharID.caption) : null, ew.Validators.integer], fields.PharID.isInvalid],
        ["StoreID", [fields.StoreID.required ? ew.Validators.required(fields.StoreID.caption) : null, ew.Validators.integer], fields.StoreID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fuser_loginadd,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fuser_loginadd.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fuser_loginadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fuser_loginadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fuser_loginadd");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fuser_loginadd" id="fuser_loginadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->User_Name->Visible) { // User_Name ?>
    <div id="r_User_Name" class="form-group row">
        <label id="elh_user_login_User_Name" for="x_User_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->User_Name->caption() ?><?= $Page->User_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->User_Name->cellAttributes() ?>>
<span id="el_user_login_User_Name">
<input type="<?= $Page->User_Name->getInputTextType() ?>" data-table="user_login" data-field="x_User_Name" name="x_User_Name" id="x_User_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->User_Name->getPlaceHolder()) ?>" value="<?= $Page->User_Name->EditValue ?>"<?= $Page->User_Name->editAttributes() ?> aria-describedby="x_User_Name_help">
<?= $Page->User_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->User_Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mail_id->Visible) { // mail_id ?>
    <div id="r_mail_id" class="form-group row">
        <label id="elh_user_login_mail_id" for="x_mail_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mail_id->caption() ?><?= $Page->mail_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mail_id->cellAttributes() ?>>
<span id="el_user_login_mail_id">
<input type="<?= $Page->mail_id->getInputTextType() ?>" data-table="user_login" data-field="x_mail_id" name="x_mail_id" id="x_mail_id" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mail_id->getPlaceHolder()) ?>" value="<?= $Page->mail_id->EditValue ?>"<?= $Page->mail_id->editAttributes() ?> aria-describedby="x_mail_id_help">
<?= $Page->mail_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mail_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <div id="r_mobile_no" class="form-group row">
        <label id="elh_user_login_mobile_no" for="x_mobile_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile_no->caption() ?><?= $Page->mobile_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el_user_login_mobile_no">
<input type="<?= $Page->mobile_no->getInputTextType() ?>" data-table="user_login" data-field="x_mobile_no" name="x_mobile_no" id="x_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobile_no->getPlaceHolder()) ?>" value="<?= $Page->mobile_no->EditValue ?>"<?= $Page->mobile_no->editAttributes() ?> aria-describedby="x_mobile_no_help">
<?= $Page->mobile_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_password->Visible) { // password ?>
    <div id="r__password" class="form-group row">
        <label id="elh_user_login__password" for="x__password" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_password->caption() ?><?= $Page->_password->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_password->cellAttributes() ?>>
<span id="el_user_login__password">
<input type="<?= $Page->_password->getInputTextType() ?>" data-table="user_login" data-field="x__password" name="x__password" id="x__password" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_password->getPlaceHolder()) ?>" value="<?= $Page->_password->EditValue ?>"<?= $Page->_password->editAttributes() ?> aria-describedby="x__password_help">
<?= $Page->_password->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_password->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->email_verified->Visible) { // email_verified ?>
    <div id="r_email_verified" class="form-group row">
        <label id="elh_user_login_email_verified" for="x_email_verified" class="<?= $Page->LeftColumnClass ?>"><?= $Page->email_verified->caption() ?><?= $Page->email_verified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->email_verified->cellAttributes() ?>>
<span id="el_user_login_email_verified">
<input type="<?= $Page->email_verified->getInputTextType() ?>" data-table="user_login" data-field="x_email_verified" name="x_email_verified" id="x_email_verified" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->email_verified->getPlaceHolder()) ?>" value="<?= $Page->email_verified->EditValue ?>"<?= $Page->email_verified->editAttributes() ?> aria-describedby="x_email_verified_help">
<?= $Page->email_verified->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->email_verified->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportTo->Visible) { // ReportTo ?>
    <div id="r_ReportTo" class="form-group row">
        <label id="elh_user_login_ReportTo" for="x_ReportTo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReportTo->caption() ?><?= $Page->ReportTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportTo->cellAttributes() ?>>
<span id="el_user_login_ReportTo">
<input type="<?= $Page->ReportTo->getInputTextType() ?>" data-table="user_login" data-field="x_ReportTo" name="x_ReportTo" id="x_ReportTo" size="30" placeholder="<?= HtmlEncode($Page->ReportTo->getPlaceHolder()) ?>" value="<?= $Page->ReportTo->EditValue ?>"<?= $Page->ReportTo->editAttributes() ?> aria-describedby="x_ReportTo_help">
<?= $Page->ReportTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportTo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_UserLevel->Visible) { // UserLevel ?>
    <div id="r__UserLevel" class="form-group row">
        <label id="elh_user_login__UserLevel" for="x__UserLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_UserLevel->caption() ?><?= $Page->_UserLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_UserLevel->cellAttributes() ?>>
<span id="el_user_login__UserLevel">
<input type="<?= $Page->_UserLevel->getInputTextType() ?>" data-table="user_login" data-field="x__UserLevel" name="x__UserLevel" id="x__UserLevel" size="30" placeholder="<?= HtmlEncode($Page->_UserLevel->getPlaceHolder()) ?>" value="<?= $Page->_UserLevel->EditValue ?>"<?= $Page->_UserLevel->editAttributes() ?> aria-describedby="x__UserLevel_help">
<?= $Page->_UserLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_UserLevel->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <div id="r_CreatedDateTime" class="form-group row">
        <label id="elh_user_login_CreatedDateTime" for="x_CreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedDateTime->caption() ?><?= $Page->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_user_login_CreatedDateTime">
<input type="<?= $Page->CreatedDateTime->getInputTextType() ?>" data-table="user_login" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?= HtmlEncode($Page->CreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreatedDateTime->EditValue ?>"<?= $Page->CreatedDateTime->editAttributes() ?> aria-describedby="x_CreatedDateTime_help">
<?= $Page->CreatedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CreatedDateTime->ReadOnly && !$Page->CreatedDateTime->Disabled && !isset($Page->CreatedDateTime->EditAttrs["readonly"]) && !isset($Page->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fuser_loginadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fuser_loginadd", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilefield->Visible) { // profilefield ?>
    <div id="r_profilefield" class="form-group row">
        <label id="elh_user_login_profilefield" for="x_profilefield" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilefield->caption() ?><?= $Page->profilefield->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilefield->cellAttributes() ?>>
<span id="el_user_login_profilefield">
<input type="<?= $Page->profilefield->getInputTextType() ?>" data-table="user_login" data-field="x_profilefield" name="x_profilefield" id="x_profilefield" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->profilefield->getPlaceHolder()) ?>" value="<?= $Page->profilefield->EditValue ?>"<?= $Page->profilefield->editAttributes() ?> aria-describedby="x_profilefield_help">
<?= $Page->profilefield->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilefield->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_UserID->Visible) { // UserID ?>
    <div id="r__UserID" class="form-group row">
        <label id="elh_user_login__UserID" for="x__UserID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_UserID->caption() ?><?= $Page->_UserID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_UserID->cellAttributes() ?>>
<span id="el_user_login__UserID">
<input type="<?= $Page->_UserID->getInputTextType() ?>" data-table="user_login" data-field="x__UserID" name="x__UserID" id="x__UserID" size="30" placeholder="<?= HtmlEncode($Page->_UserID->getPlaceHolder()) ?>" value="<?= $Page->_UserID->EditValue ?>"<?= $Page->_UserID->editAttributes() ?> aria-describedby="x__UserID_help">
<?= $Page->_UserID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_UserID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
    <div id="r_GroupID" class="form-group row">
        <label id="elh_user_login_GroupID" for="x_GroupID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GroupID->caption() ?><?= $Page->GroupID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupID->cellAttributes() ?>>
<span id="el_user_login_GroupID">
<input type="<?= $Page->GroupID->getInputTextType() ?>" data-table="user_login" data-field="x_GroupID" name="x_GroupID" id="x_GroupID" size="30" placeholder="<?= HtmlEncode($Page->GroupID->getPlaceHolder()) ?>" value="<?= $Page->GroupID->EditValue ?>"<?= $Page->GroupID->editAttributes() ?> aria-describedby="x_GroupID_help">
<?= $Page->GroupID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GroupID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_user_login_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_user_login_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="user_login" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
    <div id="r_PharID" class="form-group row">
        <label id="elh_user_login_PharID" for="x_PharID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PharID->caption() ?><?= $Page->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PharID->cellAttributes() ?>>
<span id="el_user_login_PharID">
<input type="<?= $Page->PharID->getInputTextType() ?>" data-table="user_login" data-field="x_PharID" name="x_PharID" id="x_PharID" size="30" placeholder="<?= HtmlEncode($Page->PharID->getPlaceHolder()) ?>" value="<?= $Page->PharID->EditValue ?>"<?= $Page->PharID->editAttributes() ?> aria-describedby="x_PharID_help">
<?= $Page->PharID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PharID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <div id="r_StoreID" class="form-group row">
        <label id="elh_user_login_StoreID" for="x_StoreID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StoreID->caption() ?><?= $Page->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StoreID->cellAttributes() ?>>
<span id="el_user_login_StoreID">
<input type="<?= $Page->StoreID->getInputTextType() ?>" data-table="user_login" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?= HtmlEncode($Page->StoreID->getPlaceHolder()) ?>" value="<?= $Page->StoreID->EditValue ?>"<?= $Page->StoreID->editAttributes() ?> aria-describedby="x_StoreID_help">
<?= $Page->StoreID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StoreID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("user_login");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
