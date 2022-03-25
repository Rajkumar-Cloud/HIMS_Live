<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrClientsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_clientsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fhr_clientsadd = currentForm = new ew.Form("fhr_clientsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_clients")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.hr_clients)
        ew.vars.tables.hr_clients = currentTable;
    fhr_clientsadd.addFields([
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid],
        ["first_contact_date", [fields.first_contact_date.visible && fields.first_contact_date.required ? ew.Validators.required(fields.first_contact_date.caption) : null, ew.Validators.datetime(0)], fields.first_contact_date.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["address", [fields.address.visible && fields.address.required ? ew.Validators.required(fields.address.caption) : null], fields.address.isInvalid],
        ["contact_number", [fields.contact_number.visible && fields.contact_number.required ? ew.Validators.required(fields.contact_number.caption) : null], fields.contact_number.isInvalid],
        ["contact_email", [fields.contact_email.visible && fields.contact_email.required ? ew.Validators.required(fields.contact_email.caption) : null], fields.contact_email.isInvalid],
        ["company_url", [fields.company_url.visible && fields.company_url.required ? ew.Validators.required(fields.company_url.caption) : null], fields.company_url.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fhr_clientsadd,
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
    fhr_clientsadd.validate = function () {
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
    fhr_clientsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_clientsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_clientsadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("fhr_clientsadd");
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
<form name="fhr_clientsadd" id="fhr_clientsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_clients">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_hr_clients_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_clients_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="hr_clients" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_hr_clients_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_hr_clients_details">
<textarea data-table="hr_clients" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->first_contact_date->Visible) { // first_contact_date ?>
    <div id="r_first_contact_date" class="form-group row">
        <label id="elh_hr_clients_first_contact_date" for="x_first_contact_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->first_contact_date->caption() ?><?= $Page->first_contact_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->first_contact_date->cellAttributes() ?>>
<span id="el_hr_clients_first_contact_date">
<input type="<?= $Page->first_contact_date->getInputTextType() ?>" data-table="hr_clients" data-field="x_first_contact_date" name="x_first_contact_date" id="x_first_contact_date" placeholder="<?= HtmlEncode($Page->first_contact_date->getPlaceHolder()) ?>" value="<?= $Page->first_contact_date->EditValue ?>"<?= $Page->first_contact_date->editAttributes() ?> aria-describedby="x_first_contact_date_help">
<?= $Page->first_contact_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->first_contact_date->getErrorMessage() ?></div>
<?php if (!$Page->first_contact_date->ReadOnly && !$Page->first_contact_date->Disabled && !isset($Page->first_contact_date->EditAttrs["readonly"]) && !isset($Page->first_contact_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_clientsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_clientsadd", "x_first_contact_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_hr_clients_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_hr_clients_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="hr_clients" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fhr_clientsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fhr_clientsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->address->Visible) { // address ?>
    <div id="r_address" class="form-group row">
        <label id="elh_hr_clients_address" for="x_address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->address->caption() ?><?= $Page->address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->address->cellAttributes() ?>>
<span id="el_hr_clients_address">
<textarea data-table="hr_clients" data-field="x_address" name="x_address" id="x_address" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->address->getPlaceHolder()) ?>"<?= $Page->address->editAttributes() ?> aria-describedby="x_address_help"><?= $Page->address->EditValue ?></textarea>
<?= $Page->address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_number->Visible) { // contact_number ?>
    <div id="r_contact_number" class="form-group row">
        <label id="elh_hr_clients_contact_number" for="x_contact_number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_number->caption() ?><?= $Page->contact_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->contact_number->cellAttributes() ?>>
<span id="el_hr_clients_contact_number">
<input type="<?= $Page->contact_number->getInputTextType() ?>" data-table="hr_clients" data-field="x_contact_number" name="x_contact_number" id="x_contact_number" size="30" maxlength="25" placeholder="<?= HtmlEncode($Page->contact_number->getPlaceHolder()) ?>" value="<?= $Page->contact_number->EditValue ?>"<?= $Page->contact_number->editAttributes() ?> aria-describedby="x_contact_number_help">
<?= $Page->contact_number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_number->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->contact_email->Visible) { // contact_email ?>
    <div id="r_contact_email" class="form-group row">
        <label id="elh_hr_clients_contact_email" for="x_contact_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->contact_email->caption() ?><?= $Page->contact_email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->contact_email->cellAttributes() ?>>
<span id="el_hr_clients_contact_email">
<input type="<?= $Page->contact_email->getInputTextType() ?>" data-table="hr_clients" data-field="x_contact_email" name="x_contact_email" id="x_contact_email" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->contact_email->getPlaceHolder()) ?>" value="<?= $Page->contact_email->EditValue ?>"<?= $Page->contact_email->editAttributes() ?> aria-describedby="x_contact_email_help">
<?= $Page->contact_email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->contact_email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->company_url->Visible) { // company_url ?>
    <div id="r_company_url" class="form-group row">
        <label id="elh_hr_clients_company_url" for="x_company_url" class="<?= $Page->LeftColumnClass ?>"><?= $Page->company_url->caption() ?><?= $Page->company_url->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->company_url->cellAttributes() ?>>
<span id="el_hr_clients_company_url">
<textarea data-table="hr_clients" data-field="x_company_url" name="x_company_url" id="x_company_url" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->company_url->getPlaceHolder()) ?>"<?= $Page->company_url->editAttributes() ?> aria-describedby="x_company_url_help"><?= $Page->company_url->EditValue ?></textarea>
<?= $Page->company_url->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->company_url->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_hr_clients_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_hr_clients_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_clients" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="hr_clients"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
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
    ew.addEventHandlers("hr_clients");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
