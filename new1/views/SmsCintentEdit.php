<?php

namespace PHPMaker2021\project3;

// Page object
$SmsCintentEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fsms_cintentedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fsms_cintentedit = currentForm = new ew.Form("fsms_cintentedit", "edit");

    // Add fields
    var fields = ew.vars.tables.sms_cintent.fields;
    fsms_cintentedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["SMSType", [fields.SMSType.required ? ew.Validators.required(fields.SMSType.caption) : null], fields.SMSType.isInvalid],
        ["_Content", [fields._Content.required ? ew.Validators.required(fields._Content.caption) : null], fields._Content.isInvalid],
        ["Enabled", [fields.Enabled.required ? ew.Validators.required(fields.Enabled.caption) : null], fields.Enabled.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fsms_cintentedit,
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
    fsms_cintentedit.validate = function () {
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
    fsms_cintentedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fsms_cintentedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fsms_cintentedit");
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
<form name="fsms_cintentedit" id="fsms_cintentedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sms_cintent">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_sms_cintent_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_sms_cintent_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="sms_cintent" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SMSType->Visible) { // SMSType ?>
    <div id="r_SMSType" class="form-group row">
        <label id="elh_sms_cintent_SMSType" for="x_SMSType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SMSType->caption() ?><?= $Page->SMSType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SMSType->cellAttributes() ?>>
<span id="el_sms_cintent_SMSType">
<input type="<?= $Page->SMSType->getInputTextType() ?>" data-table="sms_cintent" data-field="x_SMSType" name="x_SMSType" id="x_SMSType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SMSType->getPlaceHolder()) ?>" value="<?= $Page->SMSType->EditValue ?>"<?= $Page->SMSType->editAttributes() ?> aria-describedby="x_SMSType_help">
<?= $Page->SMSType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SMSType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Content->Visible) { // Content ?>
    <div id="r__Content" class="form-group row">
        <label id="elh_sms_cintent__Content" for="x__Content" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Content->caption() ?><?= $Page->_Content->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Content->cellAttributes() ?>>
<span id="el_sms_cintent__Content">
<textarea data-table="sms_cintent" data-field="x__Content" name="x__Content" id="x__Content" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->_Content->getPlaceHolder()) ?>"<?= $Page->_Content->editAttributes() ?> aria-describedby="x__Content_help"><?= $Page->_Content->EditValue ?></textarea>
<?= $Page->_Content->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Content->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Enabled->Visible) { // Enabled ?>
    <div id="r_Enabled" class="form-group row">
        <label id="elh_sms_cintent_Enabled" for="x_Enabled" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Enabled->caption() ?><?= $Page->Enabled->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Enabled->cellAttributes() ?>>
<span id="el_sms_cintent_Enabled">
<input type="<?= $Page->Enabled->getInputTextType() ?>" data-table="sms_cintent" data-field="x_Enabled" name="x_Enabled" id="x_Enabled" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Enabled->getPlaceHolder()) ?>" value="<?= $Page->Enabled->EditValue ?>"<?= $Page->Enabled->editAttributes() ?> aria-describedby="x_Enabled_help">
<?= $Page->Enabled->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Enabled->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_sms_cintent_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_sms_cintent_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="sms_cintent" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("sms_cintent");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
