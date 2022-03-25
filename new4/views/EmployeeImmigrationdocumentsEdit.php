<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationdocumentsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_immigrationdocumentsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_immigrationdocumentsedit = currentForm = new ew.Form("femployee_immigrationdocumentsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_immigrationdocuments")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_immigrationdocuments)
        ew.vars.tables.employee_immigrationdocuments = currentTable;
    femployee_immigrationdocumentsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid],
        ["required", [fields.required.visible && fields.required.required ? ew.Validators.required(fields.required.caption) : null], fields.required.isInvalid],
        ["alert_on_missing", [fields.alert_on_missing.visible && fields.alert_on_missing.required ? ew.Validators.required(fields.alert_on_missing.caption) : null], fields.alert_on_missing.isInvalid],
        ["alert_before_expiry", [fields.alert_before_expiry.visible && fields.alert_before_expiry.required ? ew.Validators.required(fields.alert_before_expiry.caption) : null], fields.alert_before_expiry.isInvalid],
        ["alert_before_day_number", [fields.alert_before_day_number.visible && fields.alert_before_day_number.required ? ew.Validators.required(fields.alert_before_day_number.caption) : null, ew.Validators.integer], fields.alert_before_day_number.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_immigrationdocumentsedit,
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
    femployee_immigrationdocumentsedit.validate = function () {
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
    femployee_immigrationdocumentsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_immigrationdocumentsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_immigrationdocumentsedit.lists.required = <?= $Page->required->toClientList($Page) ?>;
    femployee_immigrationdocumentsedit.lists.alert_on_missing = <?= $Page->alert_on_missing->toClientList($Page) ?>;
    femployee_immigrationdocumentsedit.lists.alert_before_expiry = <?= $Page->alert_before_expiry->toClientList($Page) ?>;
    loadjs.done("femployee_immigrationdocumentsedit");
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
<form name="femployee_immigrationdocumentsedit" id="femployee_immigrationdocumentsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_immigrationdocuments_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_immigrationdocuments" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_employee_immigrationdocuments_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="employee_immigrationdocuments" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_employee_immigrationdocuments_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_details">
<textarea data-table="employee_immigrationdocuments" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->required->Visible) { // required ?>
    <div id="r_required" class="form-group row">
        <label id="elh_employee_immigrationdocuments_required" class="<?= $Page->LeftColumnClass ?>"><?= $Page->required->caption() ?><?= $Page->required->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->required->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_required">
<template id="tp_x_required">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrationdocuments" data-field="x_required" name="x_required" id="x_required"<?= $Page->required->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_required" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_required"
    name="x_required"
    value="<?= HtmlEncode($Page->required->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_required"
    data-target="dsl_x_required"
    data-repeatcolumn="5"
    class="form-control<?= $Page->required->isInvalidClass() ?>"
    data-table="employee_immigrationdocuments"
    data-field="x_required"
    data-value-separator="<?= $Page->required->displayValueSeparatorAttribute() ?>"
    <?= $Page->required->editAttributes() ?>>
<?= $Page->required->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->required->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alert_on_missing->Visible) { // alert_on_missing ?>
    <div id="r_alert_on_missing" class="form-group row">
        <label id="elh_employee_immigrationdocuments_alert_on_missing" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alert_on_missing->caption() ?><?= $Page->alert_on_missing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->alert_on_missing->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_on_missing">
<template id="tp_x_alert_on_missing">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrationdocuments" data-field="x_alert_on_missing" name="x_alert_on_missing" id="x_alert_on_missing"<?= $Page->alert_on_missing->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_alert_on_missing" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_alert_on_missing"
    name="x_alert_on_missing"
    value="<?= HtmlEncode($Page->alert_on_missing->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_alert_on_missing"
    data-target="dsl_x_alert_on_missing"
    data-repeatcolumn="5"
    class="form-control<?= $Page->alert_on_missing->isInvalidClass() ?>"
    data-table="employee_immigrationdocuments"
    data-field="x_alert_on_missing"
    data-value-separator="<?= $Page->alert_on_missing->displayValueSeparatorAttribute() ?>"
    <?= $Page->alert_on_missing->editAttributes() ?>>
<?= $Page->alert_on_missing->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alert_on_missing->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alert_before_expiry->Visible) { // alert_before_expiry ?>
    <div id="r_alert_before_expiry" class="form-group row">
        <label id="elh_employee_immigrationdocuments_alert_before_expiry" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alert_before_expiry->caption() ?><?= $Page->alert_before_expiry->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->alert_before_expiry->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_expiry">
<template id="tp_x_alert_before_expiry">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrationdocuments" data-field="x_alert_before_expiry" name="x_alert_before_expiry" id="x_alert_before_expiry"<?= $Page->alert_before_expiry->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_alert_before_expiry" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_alert_before_expiry"
    name="x_alert_before_expiry"
    value="<?= HtmlEncode($Page->alert_before_expiry->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_alert_before_expiry"
    data-target="dsl_x_alert_before_expiry"
    data-repeatcolumn="5"
    class="form-control<?= $Page->alert_before_expiry->isInvalidClass() ?>"
    data-table="employee_immigrationdocuments"
    data-field="x_alert_before_expiry"
    data-value-separator="<?= $Page->alert_before_expiry->displayValueSeparatorAttribute() ?>"
    <?= $Page->alert_before_expiry->editAttributes() ?>>
<?= $Page->alert_before_expiry->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alert_before_expiry->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alert_before_day_number->Visible) { // alert_before_day_number ?>
    <div id="r_alert_before_day_number" class="form-group row">
        <label id="elh_employee_immigrationdocuments_alert_before_day_number" for="x_alert_before_day_number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alert_before_day_number->caption() ?><?= $Page->alert_before_day_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->alert_before_day_number->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_alert_before_day_number">
<input type="<?= $Page->alert_before_day_number->getInputTextType() ?>" data-table="employee_immigrationdocuments" data-field="x_alert_before_day_number" name="x_alert_before_day_number" id="x_alert_before_day_number" size="30" placeholder="<?= HtmlEncode($Page->alert_before_day_number->getPlaceHolder()) ?>" value="<?= $Page->alert_before_day_number->EditValue ?>"<?= $Page->alert_before_day_number->editAttributes() ?> aria-describedby="x_alert_before_day_number_help">
<?= $Page->alert_before_day_number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alert_before_day_number->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_employee_immigrationdocuments_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="employee_immigrationdocuments" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_immigrationdocumentsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_immigrationdocumentsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_employee_immigrationdocuments_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_employee_immigrationdocuments_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="employee_immigrationdocuments" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_immigrationdocumentsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_immigrationdocumentsedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
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
    ew.addEventHandlers("employee_immigrationdocuments");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
