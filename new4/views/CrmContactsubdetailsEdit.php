<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmContactsubdetailsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_contactsubdetailsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fcrm_contactsubdetailsedit = currentForm = new ew.Form("fcrm_contactsubdetailsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_contactsubdetails")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_contactsubdetails)
        ew.vars.tables.crm_contactsubdetails = currentTable;
    fcrm_contactsubdetailsedit.addFields([
        ["contactsubscriptionid", [fields.contactsubscriptionid.visible && fields.contactsubscriptionid.required ? ew.Validators.required(fields.contactsubscriptionid.caption) : null, ew.Validators.integer], fields.contactsubscriptionid.isInvalid],
        ["birthday", [fields.birthday.visible && fields.birthday.required ? ew.Validators.required(fields.birthday.caption) : null, ew.Validators.datetime(0)], fields.birthday.isInvalid],
        ["laststayintouchrequest", [fields.laststayintouchrequest.visible && fields.laststayintouchrequest.required ? ew.Validators.required(fields.laststayintouchrequest.caption) : null, ew.Validators.integer], fields.laststayintouchrequest.isInvalid],
        ["laststayintouchsavedate", [fields.laststayintouchsavedate.visible && fields.laststayintouchsavedate.required ? ew.Validators.required(fields.laststayintouchsavedate.caption) : null, ew.Validators.integer], fields.laststayintouchsavedate.isInvalid],
        ["leadsource", [fields.leadsource.visible && fields.leadsource.required ? ew.Validators.required(fields.leadsource.caption) : null], fields.leadsource.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_contactsubdetailsedit,
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
    fcrm_contactsubdetailsedit.validate = function () {
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
    fcrm_contactsubdetailsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_contactsubdetailsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_contactsubdetailsedit");
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
<form name="fcrm_contactsubdetailsedit" id="fcrm_contactsubdetailsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_contactsubdetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->contactsubscriptionid->Visible) { // contactsubscriptionid ?>
    <div id="r_contactsubscriptionid" class="form-group row">
        <label id="elh_crm_contactsubdetails_contactsubscriptionid" for="x_contactsubscriptionid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contactsubscriptionid->caption() ?><?= $Page->contactsubscriptionid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->contactsubscriptionid->cellAttributes() ?>>
<input type="<?= $Page->contactsubscriptionid->getInputTextType() ?>" data-table="crm_contactsubdetails" data-field="x_contactsubscriptionid" name="x_contactsubscriptionid" id="x_contactsubscriptionid" size="30" placeholder="<?= HtmlEncode($Page->contactsubscriptionid->getPlaceHolder()) ?>" value="<?= $Page->contactsubscriptionid->EditValue ?>"<?= $Page->contactsubscriptionid->editAttributes() ?> aria-describedby="x_contactsubscriptionid_help">
<?= $Page->contactsubscriptionid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contactsubscriptionid->getErrorMessage() ?></div>
<input type="hidden" data-table="crm_contactsubdetails" data-field="x_contactsubscriptionid" data-hidden="1" name="o_contactsubscriptionid" id="o_contactsubscriptionid" value="<?= HtmlEncode($Page->contactsubscriptionid->OldValue ?? $Page->contactsubscriptionid->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->birthday->Visible) { // birthday ?>
    <div id="r_birthday" class="form-group row">
        <label id="elh_crm_contactsubdetails_birthday" for="x_birthday" class="<?= $Page->LeftColumnClass ?>"><?= $Page->birthday->caption() ?><?= $Page->birthday->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->birthday->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_birthday">
<input type="<?= $Page->birthday->getInputTextType() ?>" data-table="crm_contactsubdetails" data-field="x_birthday" name="x_birthday" id="x_birthday" placeholder="<?= HtmlEncode($Page->birthday->getPlaceHolder()) ?>" value="<?= $Page->birthday->EditValue ?>"<?= $Page->birthday->editAttributes() ?> aria-describedby="x_birthday_help">
<?= $Page->birthday->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->birthday->getErrorMessage() ?></div>
<?php if (!$Page->birthday->ReadOnly && !$Page->birthday->Disabled && !isset($Page->birthday->EditAttrs["readonly"]) && !isset($Page->birthday->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fcrm_contactsubdetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fcrm_contactsubdetailsedit", "x_birthday", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->laststayintouchrequest->Visible) { // laststayintouchrequest ?>
    <div id="r_laststayintouchrequest" class="form-group row">
        <label id="elh_crm_contactsubdetails_laststayintouchrequest" for="x_laststayintouchrequest" class="<?= $Page->LeftColumnClass ?>"><?= $Page->laststayintouchrequest->caption() ?><?= $Page->laststayintouchrequest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->laststayintouchrequest->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchrequest">
<input type="<?= $Page->laststayintouchrequest->getInputTextType() ?>" data-table="crm_contactsubdetails" data-field="x_laststayintouchrequest" name="x_laststayintouchrequest" id="x_laststayintouchrequest" size="30" placeholder="<?= HtmlEncode($Page->laststayintouchrequest->getPlaceHolder()) ?>" value="<?= $Page->laststayintouchrequest->EditValue ?>"<?= $Page->laststayintouchrequest->editAttributes() ?> aria-describedby="x_laststayintouchrequest_help">
<?= $Page->laststayintouchrequest->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->laststayintouchrequest->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->laststayintouchsavedate->Visible) { // laststayintouchsavedate ?>
    <div id="r_laststayintouchsavedate" class="form-group row">
        <label id="elh_crm_contactsubdetails_laststayintouchsavedate" for="x_laststayintouchsavedate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->laststayintouchsavedate->caption() ?><?= $Page->laststayintouchsavedate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->laststayintouchsavedate->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_laststayintouchsavedate">
<input type="<?= $Page->laststayintouchsavedate->getInputTextType() ?>" data-table="crm_contactsubdetails" data-field="x_laststayintouchsavedate" name="x_laststayintouchsavedate" id="x_laststayintouchsavedate" size="30" placeholder="<?= HtmlEncode($Page->laststayintouchsavedate->getPlaceHolder()) ?>" value="<?= $Page->laststayintouchsavedate->EditValue ?>"<?= $Page->laststayintouchsavedate->editAttributes() ?> aria-describedby="x_laststayintouchsavedate_help">
<?= $Page->laststayintouchsavedate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->laststayintouchsavedate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
    <div id="r_leadsource" class="form-group row">
        <label id="elh_crm_contactsubdetails_leadsource" for="x_leadsource" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadsource->caption() ?><?= $Page->leadsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadsource->cellAttributes() ?>>
<span id="el_crm_contactsubdetails_leadsource">
<input type="<?= $Page->leadsource->getInputTextType() ?>" data-table="crm_contactsubdetails" data-field="x_leadsource" name="x_leadsource" id="x_leadsource" size="30" maxlength="200" placeholder="<?= HtmlEncode($Page->leadsource->getPlaceHolder()) ?>" value="<?= $Page->leadsource->EditValue ?>"<?= $Page->leadsource->editAttributes() ?> aria-describedby="x_leadsource_help">
<?= $Page->leadsource->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadsource->getErrorMessage() ?></div>
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
    ew.addEventHandlers("crm_contactsubdetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
