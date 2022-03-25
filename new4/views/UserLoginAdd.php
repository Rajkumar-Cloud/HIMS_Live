<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "user_login")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.user_login)
        ew.vars.tables.user_login = currentTable;
    fuser_loginadd.addFields([
        ["User_Name", [fields.User_Name.visible && fields.User_Name.required ? ew.Validators.required(fields.User_Name.caption) : null], fields.User_Name.isInvalid],
        ["mail_id", [fields.mail_id.visible && fields.mail_id.required ? ew.Validators.required(fields.mail_id.caption) : null], fields.mail_id.isInvalid],
        ["mobile_no", [fields.mobile_no.visible && fields.mobile_no.required ? ew.Validators.required(fields.mobile_no.caption) : null], fields.mobile_no.isInvalid],
        ["_password", [fields._password.visible && fields._password.required ? ew.Validators.required(fields._password.caption) : null], fields._password.isInvalid],
        ["email_verified", [fields.email_verified.visible && fields.email_verified.required ? ew.Validators.required(fields.email_verified.caption) : null], fields.email_verified.isInvalid],
        ["ReportTo", [fields.ReportTo.visible && fields.ReportTo.required ? ew.Validators.required(fields.ReportTo.caption) : null], fields.ReportTo.isInvalid],
        ["_UserLevel", [fields._UserLevel.visible && fields._UserLevel.required ? ew.Validators.required(fields._UserLevel.caption) : null], fields._UserLevel.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.visible && fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null], fields.CreatedDateTime.isInvalid],
        ["profilefield", [fields.profilefield.visible && fields.profilefield.required ? ew.Validators.required(fields.profilefield.caption) : null], fields.profilefield.isInvalid],
        ["_UserID", [fields._UserID.visible && fields._UserID.required ? ew.Validators.required(fields._UserID.caption) : null, ew.Validators.integer], fields._UserID.isInvalid],
        ["GroupID", [fields.GroupID.visible && fields.GroupID.required ? ew.Validators.required(fields.GroupID.caption) : null], fields.GroupID.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["PharID", [fields.PharID.visible && fields.PharID.required ? ew.Validators.required(fields.PharID.caption) : null], fields.PharID.isInvalid],
        ["StoreID", [fields.StoreID.visible && fields.StoreID.required ? ew.Validators.required(fields.StoreID.caption) : null], fields.StoreID.isInvalid],
        ["OTP", [fields.OTP.visible && fields.OTP.required ? ew.Validators.required(fields.OTP.caption) : null], fields.OTP.isInvalid],
        ["_LoginType", [fields._LoginType.visible && fields._LoginType.required ? ew.Validators.required(fields._LoginType.caption) : null, ew.Validators.integer], fields._LoginType.isInvalid],
        ["BranchId", [fields.BranchId.visible && fields.BranchId.required ? ew.Validators.required(fields.BranchId.caption) : null, ew.Validators.integer], fields.BranchId.isInvalid]
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
    fuser_loginadd.lists.User_Name = <?= $Page->User_Name->toClientList($Page) ?>;
    fuser_loginadd.lists.email_verified = <?= $Page->email_verified->toClientList($Page) ?>;
    fuser_loginadd.lists._UserLevel = <?= $Page->_UserLevel->toClientList($Page) ?>;
    fuser_loginadd.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    fuser_loginadd.lists.PharID = <?= $Page->PharID->toClientList($Page) ?>;
    fuser_loginadd.lists.StoreID = <?= $Page->StoreID->toClientList($Page) ?>;
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
<form name="fuser_loginadd" id="fuser_loginadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="user_login">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->User_Name->Visible) { // User_Name ?>
    <div id="r_User_Name" class="form-group row">
        <label id="elh_user_login_User_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->User_Name->caption() ?><?= $Page->User_Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->User_Name->cellAttributes() ?>>
<span id="el_user_login_User_Name">
<?php
$onchange = $Page->User_Name->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->User_Name->EditAttrs["onchange"] = "";
?>
<span id="as_x_User_Name" class="ew-auto-suggest">
    <input type="<?= $Page->User_Name->getInputTextType() ?>" class="form-control" name="sv_x_User_Name" id="sv_x_User_Name" value="<?= RemoveHtml($Page->User_Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->User_Name->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->User_Name->getPlaceHolder()) ?>"<?= $Page->User_Name->editAttributes() ?> aria-describedby="x_User_Name_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="user_login" data-field="x_User_Name" data-input="sv_x_User_Name" data-value-separator="<?= $Page->User_Name->displayValueSeparatorAttribute() ?>" name="x_User_Name" id="x_User_Name" value="<?= HtmlEncode($Page->User_Name->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->User_Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->User_Name->getErrorMessage() ?></div>
<script>
loadjs.ready(["fuser_loginadd"], function() {
    fuser_loginadd.createAutoSuggest(Object.assign({"id":"x_User_Name","forceSelect":false}, ew.vars.tables.user_login.fields.User_Name.autoSuggestOptions));
});
</script>
<?= $Page->User_Name->Lookup->getParamTag($Page, "p_x_User_Name") ?>
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
<div class="input-group">
    <input type="password" name="x__password" id="x__password" autocomplete="new-password" data-field="x__password" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_password->getPlaceHolder()) ?>"<?= $Page->_password->editAttributes() ?> aria-describedby="x__password_help">
    <div class="input-group-append"><button type="button" class="btn btn-default ew-toggle-password rounded-right" onclick="ew.togglePassword(event);"><i class="fas fa-eye"></i></button></div>
</div>
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
    <select
        id="x_email_verified"
        name="x_email_verified"
        class="form-control ew-select<?= $Page->email_verified->isInvalidClass() ?>"
        data-select2-id="user_login_x_email_verified"
        data-table="user_login"
        data-field="x_email_verified"
        data-value-separator="<?= $Page->email_verified->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->email_verified->getPlaceHolder()) ?>"
        <?= $Page->email_verified->editAttributes() ?>>
        <?= $Page->email_verified->selectOptionListHtml("x_email_verified") ?>
    </select>
    <?= $Page->email_verified->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->email_verified->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='user_login_x_email_verified']"),
        options = { name: "x_email_verified", selectId: "user_login_x_email_verified", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.user_login.fields.email_verified.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.user_login.fields.email_verified.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_UserLevel->Visible) { // UserLevel ?>
    <div id="r__UserLevel" class="form-group row">
        <label id="elh_user_login__UserLevel" for="x__UserLevel" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_UserLevel->caption() ?><?= $Page->_UserLevel->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_UserLevel->cellAttributes() ?>>
<?php if (!$Security->isAdmin() && $Security->isLoggedIn()) { // Non system admin ?>
<span id="el_user_login__UserLevel">
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->_UserLevel->getDisplayValue($Page->_UserLevel->EditValue))) ?>">
</span>
<?php } else { ?>
<span id="el_user_login__UserLevel">
<div class="input-group flex-nowrap">
    <select
        id="x__UserLevel"
        name="x__UserLevel"
        class="form-control ew-select<?= $Page->_UserLevel->isInvalidClass() ?>"
        data-select2-id="user_login_x__UserLevel"
        data-table="user_login"
        data-field="x__UserLevel"
        data-value-separator="<?= $Page->_UserLevel->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->_UserLevel->getPlaceHolder()) ?>"
        <?= $Page->_UserLevel->editAttributes() ?>>
        <?= $Page->_UserLevel->selectOptionListHtml("x__UserLevel") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "userlevels") && !$Page->_UserLevel->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x__UserLevel" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->_UserLevel->caption() ?>" data-title="<?= $Page->_UserLevel->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x__UserLevel',url:'<?= GetUrl("UserlevelsAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->_UserLevel->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_UserLevel->getErrorMessage() ?></div>
<?= $Page->_UserLevel->Lookup->getParamTag($Page, "p_x__UserLevel") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='user_login_x__UserLevel']"),
        options = { name: "x__UserLevel", selectId: "user_login_x__UserLevel", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.user_login.fields._UserLevel.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
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
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_user_login_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_user_login_HospID">
    <select
        id="x_HospID"
        name="x_HospID"
        class="form-control ew-select<?= $Page->HospID->isInvalidClass() ?>"
        data-select2-id="user_login_x_HospID"
        data-table="user_login"
        data-field="x_HospID"
        data-value-separator="<?= $Page->HospID->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>"
        <?= $Page->HospID->editAttributes() ?>>
        <?= $Page->HospID->selectOptionListHtml("x_HospID") ?>
    </select>
    <?= $Page->HospID->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
<?= $Page->HospID->Lookup->getParamTag($Page, "p_x_HospID") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='user_login_x_HospID']"),
        options = { name: "x_HospID", selectId: "user_login_x_HospID", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.user_login.fields.HospID.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
    <div id="r_PharID" class="form-group row">
        <label id="elh_user_login_PharID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PharID->caption() ?><?= $Page->PharID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PharID->cellAttributes() ?>>
<span id="el_user_login_PharID">
<template id="tp_x_PharID">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="user_login" data-field="x_PharID" name="x_PharID" id="x_PharID"<?= $Page->PharID->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PharID" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_PharID[]"
    name="x_PharID[]"
    value="<?= HtmlEncode($Page->PharID->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_PharID"
    data-target="dsl_x_PharID"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PharID->isInvalidClass() ?>"
    data-table="user_login"
    data-field="x_PharID"
    data-value-separator="<?= $Page->PharID->displayValueSeparatorAttribute() ?>"
    <?= $Page->PharID->editAttributes() ?>>
<?= $Page->PharID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PharID->getErrorMessage() ?></div>
<?= $Page->PharID->Lookup->getParamTag($Page, "p_x_PharID") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <div id="r_StoreID" class="form-group row">
        <label id="elh_user_login_StoreID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StoreID->caption() ?><?= $Page->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StoreID->cellAttributes() ?>>
<span id="el_user_login_StoreID">
<template id="tp_x_StoreID">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="user_login" data-field="x_StoreID" name="x_StoreID" id="x_StoreID"<?= $Page->StoreID->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_StoreID" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_StoreID[]"
    name="x_StoreID[]"
    value="<?= HtmlEncode($Page->StoreID->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_StoreID"
    data-target="dsl_x_StoreID"
    data-repeatcolumn="5"
    class="form-control<?= $Page->StoreID->isInvalidClass() ?>"
    data-table="user_login"
    data-field="x_StoreID"
    data-value-separator="<?= $Page->StoreID->displayValueSeparatorAttribute() ?>"
    <?= $Page->StoreID->editAttributes() ?>>
<?= $Page->StoreID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StoreID->getErrorMessage() ?></div>
<?= $Page->StoreID->Lookup->getParamTag($Page, "p_x_StoreID") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OTP->Visible) { // OTP ?>
    <div id="r_OTP" class="form-group row">
        <label id="elh_user_login_OTP" for="x_OTP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OTP->caption() ?><?= $Page->OTP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OTP->cellAttributes() ?>>
<span id="el_user_login_OTP">
<input type="<?= $Page->OTP->getInputTextType() ?>" data-table="user_login" data-field="x_OTP" name="x_OTP" id="x_OTP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OTP->getPlaceHolder()) ?>" value="<?= $Page->OTP->EditValue ?>"<?= $Page->OTP->editAttributes() ?> aria-describedby="x_OTP_help">
<?= $Page->OTP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OTP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_LoginType->Visible) { // LoginType ?>
    <div id="r__LoginType" class="form-group row">
        <label id="elh_user_login__LoginType" for="x__LoginType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_LoginType->caption() ?><?= $Page->_LoginType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_LoginType->cellAttributes() ?>>
<span id="el_user_login__LoginType">
<input type="<?= $Page->_LoginType->getInputTextType() ?>" data-table="user_login" data-field="x__LoginType" name="x__LoginType" id="x__LoginType" size="30" placeholder="<?= HtmlEncode($Page->_LoginType->getPlaceHolder()) ?>" value="<?= $Page->_LoginType->EditValue ?>"<?= $Page->_LoginType->editAttributes() ?> aria-describedby="x__LoginType_help">
<?= $Page->_LoginType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_LoginType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BranchId->Visible) { // BranchId ?>
    <div id="r_BranchId" class="form-group row">
        <label id="elh_user_login_BranchId" for="x_BranchId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BranchId->caption() ?><?= $Page->BranchId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BranchId->cellAttributes() ?>>
<span id="el_user_login_BranchId">
<input type="<?= $Page->BranchId->getInputTextType() ?>" data-table="user_login" data-field="x_BranchId" name="x_BranchId" id="x_BranchId" size="30" placeholder="<?= HtmlEncode($Page->BranchId->getPlaceHolder()) ?>" value="<?= $Page->BranchId->EditValue ?>"<?= $Page->BranchId->editAttributes() ?> aria-describedby="x_BranchId_help">
<?= $Page->BranchId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BranchId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
