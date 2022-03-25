<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmContactdetailsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_contactdetailsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fcrm_contactdetailsedit = currentForm = new ew.Form("fcrm_contactdetailsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_contactdetails")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_contactdetails)
        ew.vars.tables.crm_contactdetails = currentTable;
    fcrm_contactdetailsedit.addFields([
        ["contactid", [fields.contactid.visible && fields.contactid.required ? ew.Validators.required(fields.contactid.caption) : null, ew.Validators.integer], fields.contactid.isInvalid],
        ["contact_no", [fields.contact_no.visible && fields.contact_no.required ? ew.Validators.required(fields.contact_no.caption) : null], fields.contact_no.isInvalid],
        ["parentid", [fields.parentid.visible && fields.parentid.required ? ew.Validators.required(fields.parentid.caption) : null, ew.Validators.integer], fields.parentid.isInvalid],
        ["salutation", [fields.salutation.visible && fields.salutation.required ? ew.Validators.required(fields.salutation.caption) : null], fields.salutation.isInvalid],
        ["firstname", [fields.firstname.visible && fields.firstname.required ? ew.Validators.required(fields.firstname.caption) : null], fields.firstname.isInvalid],
        ["lastname", [fields.lastname.visible && fields.lastname.required ? ew.Validators.required(fields.lastname.caption) : null], fields.lastname.isInvalid],
        ["_email", [fields._email.visible && fields._email.required ? ew.Validators.required(fields._email.caption) : null], fields._email.isInvalid],
        ["phone", [fields.phone.visible && fields.phone.required ? ew.Validators.required(fields.phone.caption) : null], fields.phone.isInvalid],
        ["mobile", [fields.mobile.visible && fields.mobile.required ? ew.Validators.required(fields.mobile.caption) : null], fields.mobile.isInvalid],
        ["reportsto", [fields.reportsto.visible && fields.reportsto.required ? ew.Validators.required(fields.reportsto.caption) : null, ew.Validators.integer], fields.reportsto.isInvalid],
        ["training", [fields.training.visible && fields.training.required ? ew.Validators.required(fields.training.caption) : null], fields.training.isInvalid],
        ["usertype", [fields.usertype.visible && fields.usertype.required ? ew.Validators.required(fields.usertype.caption) : null], fields.usertype.isInvalid],
        ["contacttype", [fields.contacttype.visible && fields.contacttype.required ? ew.Validators.required(fields.contacttype.caption) : null], fields.contacttype.isInvalid],
        ["otheremail", [fields.otheremail.visible && fields.otheremail.required ? ew.Validators.required(fields.otheremail.caption) : null], fields.otheremail.isInvalid],
        ["donotcall", [fields.donotcall.visible && fields.donotcall.required ? ew.Validators.required(fields.donotcall.caption) : null, ew.Validators.integer], fields.donotcall.isInvalid],
        ["emailoptout", [fields.emailoptout.visible && fields.emailoptout.required ? ew.Validators.required(fields.emailoptout.caption) : null, ew.Validators.integer], fields.emailoptout.isInvalid],
        ["imagename", [fields.imagename.visible && fields.imagename.required ? ew.Validators.required(fields.imagename.caption) : null], fields.imagename.isInvalid],
        ["isconvertedfromlead", [fields.isconvertedfromlead.visible && fields.isconvertedfromlead.required ? ew.Validators.required(fields.isconvertedfromlead.caption) : null, ew.Validators.integer], fields.isconvertedfromlead.isInvalid],
        ["verification", [fields.verification.visible && fields.verification.required ? ew.Validators.required(fields.verification.caption) : null], fields.verification.isInvalid],
        ["secondary_email", [fields.secondary_email.visible && fields.secondary_email.required ? ew.Validators.required(fields.secondary_email.caption) : null], fields.secondary_email.isInvalid],
        ["notifilanguage", [fields.notifilanguage.visible && fields.notifilanguage.required ? ew.Validators.required(fields.notifilanguage.caption) : null], fields.notifilanguage.isInvalid],
        ["contactstatus", [fields.contactstatus.visible && fields.contactstatus.required ? ew.Validators.required(fields.contactstatus.caption) : null], fields.contactstatus.isInvalid],
        ["dav_status", [fields.dav_status.visible && fields.dav_status.required ? ew.Validators.required(fields.dav_status.caption) : null, ew.Validators.integer], fields.dav_status.isInvalid],
        ["jobtitle", [fields.jobtitle.visible && fields.jobtitle.required ? ew.Validators.required(fields.jobtitle.caption) : null], fields.jobtitle.isInvalid],
        ["decision_maker", [fields.decision_maker.visible && fields.decision_maker.required ? ew.Validators.required(fields.decision_maker.caption) : null, ew.Validators.integer], fields.decision_maker.isInvalid],
        ["sum_time", [fields.sum_time.visible && fields.sum_time.required ? ew.Validators.required(fields.sum_time.caption) : null, ew.Validators.float], fields.sum_time.isInvalid],
        ["phone_extra", [fields.phone_extra.visible && fields.phone_extra.required ? ew.Validators.required(fields.phone_extra.caption) : null], fields.phone_extra.isInvalid],
        ["mobile_extra", [fields.mobile_extra.visible && fields.mobile_extra.required ? ew.Validators.required(fields.mobile_extra.caption) : null], fields.mobile_extra.isInvalid],
        ["approvals", [fields.approvals.visible && fields.approvals.required ? ew.Validators.required(fields.approvals.caption) : null], fields.approvals.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_contactdetailsedit,
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
    fcrm_contactdetailsedit.validate = function () {
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
    fcrm_contactdetailsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_contactdetailsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_contactdetailsedit");
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
<form name="fcrm_contactdetailsedit" id="fcrm_contactdetailsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_contactdetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->contactid->Visible) { // contactid ?>
    <div id="r_contactid" class="form-group row">
        <label id="elh_crm_contactdetails_contactid" for="x_contactid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contactid->caption() ?><?= $Page->contactid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->contactid->cellAttributes() ?>>
<input type="<?= $Page->contactid->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_contactid" name="x_contactid" id="x_contactid" size="30" placeholder="<?= HtmlEncode($Page->contactid->getPlaceHolder()) ?>" value="<?= $Page->contactid->EditValue ?>"<?= $Page->contactid->editAttributes() ?> aria-describedby="x_contactid_help">
<?= $Page->contactid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contactid->getErrorMessage() ?></div>
<input type="hidden" data-table="crm_contactdetails" data-field="x_contactid" data-hidden="1" name="o_contactid" id="o_contactid" value="<?= HtmlEncode($Page->contactid->OldValue ?? $Page->contactid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_no->Visible) { // contact_no ?>
    <div id="r_contact_no" class="form-group row">
        <label id="elh_crm_contactdetails_contact_no" for="x_contact_no" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_no->caption() ?><?= $Page->contact_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->contact_no->cellAttributes() ?>>
<span id="el_crm_contactdetails_contact_no">
<input type="<?= $Page->contact_no->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_contact_no" name="x_contact_no" id="x_contact_no" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contact_no->getPlaceHolder()) ?>" value="<?= $Page->contact_no->EditValue ?>"<?= $Page->contact_no->editAttributes() ?> aria-describedby="x_contact_no_help">
<?= $Page->contact_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_no->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->parentid->Visible) { // parentid ?>
    <div id="r_parentid" class="form-group row">
        <label id="elh_crm_contactdetails_parentid" for="x_parentid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->parentid->caption() ?><?= $Page->parentid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->parentid->cellAttributes() ?>>
<span id="el_crm_contactdetails_parentid">
<input type="<?= $Page->parentid->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_parentid" name="x_parentid" id="x_parentid" size="30" placeholder="<?= HtmlEncode($Page->parentid->getPlaceHolder()) ?>" value="<?= $Page->parentid->EditValue ?>"<?= $Page->parentid->editAttributes() ?> aria-describedby="x_parentid_help">
<?= $Page->parentid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->parentid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->salutation->Visible) { // salutation ?>
    <div id="r_salutation" class="form-group row">
        <label id="elh_crm_contactdetails_salutation" for="x_salutation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->salutation->caption() ?><?= $Page->salutation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->salutation->cellAttributes() ?>>
<span id="el_crm_contactdetails_salutation">
<input type="<?= $Page->salutation->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_salutation" name="x_salutation" id="x_salutation" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->salutation->getPlaceHolder()) ?>" value="<?= $Page->salutation->EditValue ?>"<?= $Page->salutation->editAttributes() ?> aria-describedby="x_salutation_help">
<?= $Page->salutation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->salutation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->firstname->Visible) { // firstname ?>
    <div id="r_firstname" class="form-group row">
        <label id="elh_crm_contactdetails_firstname" for="x_firstname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->firstname->caption() ?><?= $Page->firstname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->firstname->cellAttributes() ?>>
<span id="el_crm_contactdetails_firstname">
<input type="<?= $Page->firstname->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_firstname" name="x_firstname" id="x_firstname" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->firstname->getPlaceHolder()) ?>" value="<?= $Page->firstname->EditValue ?>"<?= $Page->firstname->editAttributes() ?> aria-describedby="x_firstname_help">
<?= $Page->firstname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->firstname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->lastname->Visible) { // lastname ?>
    <div id="r_lastname" class="form-group row">
        <label id="elh_crm_contactdetails_lastname" for="x_lastname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->lastname->caption() ?><?= $Page->lastname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->lastname->cellAttributes() ?>>
<span id="el_crm_contactdetails_lastname">
<input type="<?= $Page->lastname->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_lastname" name="x_lastname" id="x_lastname" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->lastname->getPlaceHolder()) ?>" value="<?= $Page->lastname->EditValue ?>"<?= $Page->lastname->editAttributes() ?> aria-describedby="x_lastname_help">
<?= $Page->lastname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->lastname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_email->Visible) { // email ?>
    <div id="r__email" class="form-group row">
        <label id="elh_crm_contactdetails__email" for="x__email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_email->caption() ?><?= $Page->_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_email->cellAttributes() ?>>
<span id="el_crm_contactdetails__email">
<input type="<?= $Page->_email->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x__email" name="x__email" id="x__email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->_email->getPlaceHolder()) ?>" value="<?= $Page->_email->EditValue ?>"<?= $Page->_email->editAttributes() ?> aria-describedby="x__email_help">
<?= $Page->_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
    <div id="r_phone" class="form-group row">
        <label id="elh_crm_contactdetails_phone" for="x_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone->caption() ?><?= $Page->phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone">
<input type="<?= $Page->phone->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_phone" name="x_phone" id="x_phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->phone->getPlaceHolder()) ?>" value="<?= $Page->phone->EditValue ?>"<?= $Page->phone->editAttributes() ?> aria-describedby="x_phone_help">
<?= $Page->phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
    <div id="r_mobile" class="form-group row">
        <label id="elh_crm_contactdetails_mobile" for="x_mobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile->caption() ?><?= $Page->mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile">
<input type="<?= $Page->mobile->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_mobile" name="x_mobile" id="x_mobile" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->mobile->getPlaceHolder()) ?>" value="<?= $Page->mobile->EditValue ?>"<?= $Page->mobile->editAttributes() ?> aria-describedby="x_mobile_help">
<?= $Page->mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->reportsto->Visible) { // reportsto ?>
    <div id="r_reportsto" class="form-group row">
        <label id="elh_crm_contactdetails_reportsto" for="x_reportsto" class="<?= $Page->LeftColumnClass ?>"><?= $Page->reportsto->caption() ?><?= $Page->reportsto->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reportsto->cellAttributes() ?>>
<span id="el_crm_contactdetails_reportsto">
<input type="<?= $Page->reportsto->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_reportsto" name="x_reportsto" id="x_reportsto" size="30" placeholder="<?= HtmlEncode($Page->reportsto->getPlaceHolder()) ?>" value="<?= $Page->reportsto->EditValue ?>"<?= $Page->reportsto->editAttributes() ?> aria-describedby="x_reportsto_help">
<?= $Page->reportsto->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->reportsto->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->training->Visible) { // training ?>
    <div id="r_training" class="form-group row">
        <label id="elh_crm_contactdetails_training" for="x_training" class="<?= $Page->LeftColumnClass ?>"><?= $Page->training->caption() ?><?= $Page->training->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->training->cellAttributes() ?>>
<span id="el_crm_contactdetails_training">
<input type="<?= $Page->training->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_training" name="x_training" id="x_training" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->training->getPlaceHolder()) ?>" value="<?= $Page->training->EditValue ?>"<?= $Page->training->editAttributes() ?> aria-describedby="x_training_help">
<?= $Page->training->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->training->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->usertype->Visible) { // usertype ?>
    <div id="r_usertype" class="form-group row">
        <label id="elh_crm_contactdetails_usertype" for="x_usertype" class="<?= $Page->LeftColumnClass ?>"><?= $Page->usertype->caption() ?><?= $Page->usertype->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->usertype->cellAttributes() ?>>
<span id="el_crm_contactdetails_usertype">
<input type="<?= $Page->usertype->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_usertype" name="x_usertype" id="x_usertype" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->usertype->getPlaceHolder()) ?>" value="<?= $Page->usertype->EditValue ?>"<?= $Page->usertype->editAttributes() ?> aria-describedby="x_usertype_help">
<?= $Page->usertype->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->usertype->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contacttype->Visible) { // contacttype ?>
    <div id="r_contacttype" class="form-group row">
        <label id="elh_crm_contactdetails_contacttype" for="x_contacttype" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contacttype->caption() ?><?= $Page->contacttype->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->contacttype->cellAttributes() ?>>
<span id="el_crm_contactdetails_contacttype">
<input type="<?= $Page->contacttype->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_contacttype" name="x_contacttype" id="x_contacttype" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->contacttype->getPlaceHolder()) ?>" value="<?= $Page->contacttype->EditValue ?>"<?= $Page->contacttype->editAttributes() ?> aria-describedby="x_contacttype_help">
<?= $Page->contacttype->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contacttype->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->otheremail->Visible) { // otheremail ?>
    <div id="r_otheremail" class="form-group row">
        <label id="elh_crm_contactdetails_otheremail" for="x_otheremail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->otheremail->caption() ?><?= $Page->otheremail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->otheremail->cellAttributes() ?>>
<span id="el_crm_contactdetails_otheremail">
<input type="<?= $Page->otheremail->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_otheremail" name="x_otheremail" id="x_otheremail" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->otheremail->getPlaceHolder()) ?>" value="<?= $Page->otheremail->EditValue ?>"<?= $Page->otheremail->editAttributes() ?> aria-describedby="x_otheremail_help">
<?= $Page->otheremail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->otheremail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->donotcall->Visible) { // donotcall ?>
    <div id="r_donotcall" class="form-group row">
        <label id="elh_crm_contactdetails_donotcall" for="x_donotcall" class="<?= $Page->LeftColumnClass ?>"><?= $Page->donotcall->caption() ?><?= $Page->donotcall->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->donotcall->cellAttributes() ?>>
<span id="el_crm_contactdetails_donotcall">
<input type="<?= $Page->donotcall->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_donotcall" name="x_donotcall" id="x_donotcall" size="30" placeholder="<?= HtmlEncode($Page->donotcall->getPlaceHolder()) ?>" value="<?= $Page->donotcall->EditValue ?>"<?= $Page->donotcall->editAttributes() ?> aria-describedby="x_donotcall_help">
<?= $Page->donotcall->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->donotcall->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->emailoptout->Visible) { // emailoptout ?>
    <div id="r_emailoptout" class="form-group row">
        <label id="elh_crm_contactdetails_emailoptout" for="x_emailoptout" class="<?= $Page->LeftColumnClass ?>"><?= $Page->emailoptout->caption() ?><?= $Page->emailoptout->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->emailoptout->cellAttributes() ?>>
<span id="el_crm_contactdetails_emailoptout">
<input type="<?= $Page->emailoptout->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_emailoptout" name="x_emailoptout" id="x_emailoptout" size="30" placeholder="<?= HtmlEncode($Page->emailoptout->getPlaceHolder()) ?>" value="<?= $Page->emailoptout->EditValue ?>"<?= $Page->emailoptout->editAttributes() ?> aria-describedby="x_emailoptout_help">
<?= $Page->emailoptout->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->emailoptout->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->imagename->Visible) { // imagename ?>
    <div id="r_imagename" class="form-group row">
        <label id="elh_crm_contactdetails_imagename" for="x_imagename" class="<?= $Page->LeftColumnClass ?>"><?= $Page->imagename->caption() ?><?= $Page->imagename->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->imagename->cellAttributes() ?>>
<span id="el_crm_contactdetails_imagename">
<textarea data-table="crm_contactdetails" data-field="x_imagename" name="x_imagename" id="x_imagename" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->imagename->getPlaceHolder()) ?>"<?= $Page->imagename->editAttributes() ?> aria-describedby="x_imagename_help"><?= $Page->imagename->EditValue ?></textarea>
<?= $Page->imagename->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->imagename->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->isconvertedfromlead->Visible) { // isconvertedfromlead ?>
    <div id="r_isconvertedfromlead" class="form-group row">
        <label id="elh_crm_contactdetails_isconvertedfromlead" for="x_isconvertedfromlead" class="<?= $Page->LeftColumnClass ?>"><?= $Page->isconvertedfromlead->caption() ?><?= $Page->isconvertedfromlead->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->isconvertedfromlead->cellAttributes() ?>>
<span id="el_crm_contactdetails_isconvertedfromlead">
<input type="<?= $Page->isconvertedfromlead->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_isconvertedfromlead" name="x_isconvertedfromlead" id="x_isconvertedfromlead" size="30" placeholder="<?= HtmlEncode($Page->isconvertedfromlead->getPlaceHolder()) ?>" value="<?= $Page->isconvertedfromlead->EditValue ?>"<?= $Page->isconvertedfromlead->editAttributes() ?> aria-describedby="x_isconvertedfromlead_help">
<?= $Page->isconvertedfromlead->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->isconvertedfromlead->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->verification->Visible) { // verification ?>
    <div id="r_verification" class="form-group row">
        <label id="elh_crm_contactdetails_verification" for="x_verification" class="<?= $Page->LeftColumnClass ?>"><?= $Page->verification->caption() ?><?= $Page->verification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->verification->cellAttributes() ?>>
<span id="el_crm_contactdetails_verification">
<textarea data-table="crm_contactdetails" data-field="x_verification" name="x_verification" id="x_verification" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->verification->getPlaceHolder()) ?>"<?= $Page->verification->editAttributes() ?> aria-describedby="x_verification_help"><?= $Page->verification->EditValue ?></textarea>
<?= $Page->verification->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->verification->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->secondary_email->Visible) { // secondary_email ?>
    <div id="r_secondary_email" class="form-group row">
        <label id="elh_crm_contactdetails_secondary_email" for="x_secondary_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->secondary_email->caption() ?><?= $Page->secondary_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->secondary_email->cellAttributes() ?>>
<span id="el_crm_contactdetails_secondary_email">
<input type="<?= $Page->secondary_email->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_secondary_email" name="x_secondary_email" id="x_secondary_email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->secondary_email->getPlaceHolder()) ?>" value="<?= $Page->secondary_email->EditValue ?>"<?= $Page->secondary_email->editAttributes() ?> aria-describedby="x_secondary_email_help">
<?= $Page->secondary_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->secondary_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->notifilanguage->Visible) { // notifilanguage ?>
    <div id="r_notifilanguage" class="form-group row">
        <label id="elh_crm_contactdetails_notifilanguage" for="x_notifilanguage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->notifilanguage->caption() ?><?= $Page->notifilanguage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->notifilanguage->cellAttributes() ?>>
<span id="el_crm_contactdetails_notifilanguage">
<input type="<?= $Page->notifilanguage->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_notifilanguage" name="x_notifilanguage" id="x_notifilanguage" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->notifilanguage->getPlaceHolder()) ?>" value="<?= $Page->notifilanguage->EditValue ?>"<?= $Page->notifilanguage->editAttributes() ?> aria-describedby="x_notifilanguage_help">
<?= $Page->notifilanguage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->notifilanguage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contactstatus->Visible) { // contactstatus ?>
    <div id="r_contactstatus" class="form-group row">
        <label id="elh_crm_contactdetails_contactstatus" for="x_contactstatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contactstatus->caption() ?><?= $Page->contactstatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->contactstatus->cellAttributes() ?>>
<span id="el_crm_contactdetails_contactstatus">
<input type="<?= $Page->contactstatus->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_contactstatus" name="x_contactstatus" id="x_contactstatus" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->contactstatus->getPlaceHolder()) ?>" value="<?= $Page->contactstatus->EditValue ?>"<?= $Page->contactstatus->editAttributes() ?> aria-describedby="x_contactstatus_help">
<?= $Page->contactstatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contactstatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dav_status->Visible) { // dav_status ?>
    <div id="r_dav_status" class="form-group row">
        <label id="elh_crm_contactdetails_dav_status" for="x_dav_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dav_status->caption() ?><?= $Page->dav_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dav_status->cellAttributes() ?>>
<span id="el_crm_contactdetails_dav_status">
<input type="<?= $Page->dav_status->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_dav_status" name="x_dav_status" id="x_dav_status" size="30" placeholder="<?= HtmlEncode($Page->dav_status->getPlaceHolder()) ?>" value="<?= $Page->dav_status->EditValue ?>"<?= $Page->dav_status->editAttributes() ?> aria-describedby="x_dav_status_help">
<?= $Page->dav_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dav_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jobtitle->Visible) { // jobtitle ?>
    <div id="r_jobtitle" class="form-group row">
        <label id="elh_crm_contactdetails_jobtitle" for="x_jobtitle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jobtitle->caption() ?><?= $Page->jobtitle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->jobtitle->cellAttributes() ?>>
<span id="el_crm_contactdetails_jobtitle">
<input type="<?= $Page->jobtitle->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_jobtitle" name="x_jobtitle" id="x_jobtitle" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->jobtitle->getPlaceHolder()) ?>" value="<?= $Page->jobtitle->EditValue ?>"<?= $Page->jobtitle->editAttributes() ?> aria-describedby="x_jobtitle_help">
<?= $Page->jobtitle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jobtitle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->decision_maker->Visible) { // decision_maker ?>
    <div id="r_decision_maker" class="form-group row">
        <label id="elh_crm_contactdetails_decision_maker" for="x_decision_maker" class="<?= $Page->LeftColumnClass ?>"><?= $Page->decision_maker->caption() ?><?= $Page->decision_maker->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->decision_maker->cellAttributes() ?>>
<span id="el_crm_contactdetails_decision_maker">
<input type="<?= $Page->decision_maker->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_decision_maker" name="x_decision_maker" id="x_decision_maker" size="30" placeholder="<?= HtmlEncode($Page->decision_maker->getPlaceHolder()) ?>" value="<?= $Page->decision_maker->EditValue ?>"<?= $Page->decision_maker->editAttributes() ?> aria-describedby="x_decision_maker_help">
<?= $Page->decision_maker->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->decision_maker->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sum_time->Visible) { // sum_time ?>
    <div id="r_sum_time" class="form-group row">
        <label id="elh_crm_contactdetails_sum_time" for="x_sum_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sum_time->caption() ?><?= $Page->sum_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sum_time->cellAttributes() ?>>
<span id="el_crm_contactdetails_sum_time">
<input type="<?= $Page->sum_time->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_sum_time" name="x_sum_time" id="x_sum_time" size="30" placeholder="<?= HtmlEncode($Page->sum_time->getPlaceHolder()) ?>" value="<?= $Page->sum_time->EditValue ?>"<?= $Page->sum_time->editAttributes() ?> aria-describedby="x_sum_time_help">
<?= $Page->sum_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sum_time->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
    <div id="r_phone_extra" class="form-group row">
        <label id="elh_crm_contactdetails_phone_extra" for="x_phone_extra" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone_extra->caption() ?><?= $Page->phone_extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_phone_extra">
<input type="<?= $Page->phone_extra->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_phone_extra" name="x_phone_extra" id="x_phone_extra" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->phone_extra->getPlaceHolder()) ?>" value="<?= $Page->phone_extra->EditValue ?>"<?= $Page->phone_extra->editAttributes() ?> aria-describedby="x_phone_extra_help">
<?= $Page->phone_extra->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone_extra->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
    <div id="r_mobile_extra" class="form-group row">
        <label id="elh_crm_contactdetails_mobile_extra" for="x_mobile_extra" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile_extra->caption() ?><?= $Page->mobile_extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el_crm_contactdetails_mobile_extra">
<input type="<?= $Page->mobile_extra->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_mobile_extra" name="x_mobile_extra" id="x_mobile_extra" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->mobile_extra->getPlaceHolder()) ?>" value="<?= $Page->mobile_extra->EditValue ?>"<?= $Page->mobile_extra->editAttributes() ?> aria-describedby="x_mobile_extra_help">
<?= $Page->mobile_extra->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile_extra->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->approvals->Visible) { // approvals ?>
    <div id="r_approvals" class="form-group row">
        <label id="elh_crm_contactdetails_approvals" for="x_approvals" class="<?= $Page->LeftColumnClass ?>"><?= $Page->approvals->caption() ?><?= $Page->approvals->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->approvals->cellAttributes() ?>>
<span id="el_crm_contactdetails_approvals">
<textarea data-table="crm_contactdetails" data-field="x_approvals" name="x_approvals" id="x_approvals" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->approvals->getPlaceHolder()) ?>"<?= $Page->approvals->editAttributes() ?> aria-describedby="x_approvals_help"><?= $Page->approvals->EditValue ?></textarea>
<?= $Page->approvals->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->approvals->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_crm_contactdetails_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<span id="el_crm_contactdetails_gender">
<input type="<?= $Page->gender->getInputTextType() ?>" data-table="crm_contactdetails" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" value="<?= $Page->gender->EditValue ?>"<?= $Page->gender->editAttributes() ?> aria-describedby="x_gender_help">
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("crm_contactdetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
