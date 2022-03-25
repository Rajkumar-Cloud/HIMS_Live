<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_immigrationsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_immigrationsedit = currentForm = new ew.Form("femployee_immigrationsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_immigrations")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_immigrations)
        ew.vars.tables.employee_immigrations = currentTable;
    femployee_immigrationsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["document", [fields.document.visible && fields.document.required ? ew.Validators.required(fields.document.caption) : null, ew.Validators.integer], fields.document.isInvalid],
        ["documentname", [fields.documentname.visible && fields.documentname.required ? ew.Validators.required(fields.documentname.caption) : null], fields.documentname.isInvalid],
        ["valid_until", [fields.valid_until.visible && fields.valid_until.required ? ew.Validators.required(fields.valid_until.caption) : null, ew.Validators.datetime(0)], fields.valid_until.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid],
        ["attachment1", [fields.attachment1.visible && fields.attachment1.required ? ew.Validators.required(fields.attachment1.caption) : null], fields.attachment1.isInvalid],
        ["attachment2", [fields.attachment2.visible && fields.attachment2.required ? ew.Validators.required(fields.attachment2.caption) : null], fields.attachment2.isInvalid],
        ["attachment3", [fields.attachment3.visible && fields.attachment3.required ? ew.Validators.required(fields.attachment3.caption) : null], fields.attachment3.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["updated", [fields.updated.visible && fields.updated.required ? ew.Validators.required(fields.updated.caption) : null, ew.Validators.datetime(0)], fields.updated.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_immigrationsedit,
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
    femployee_immigrationsedit.validate = function () {
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
    femployee_immigrationsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_immigrationsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_immigrationsedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_immigrationsedit");
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
<form name="femployee_immigrationsedit" id="femployee_immigrationsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_immigrations_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_immigrations_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_immigrations" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_immigrations_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_immigrations_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->document->Visible) { // document ?>
    <div id="r_document" class="form-group row">
        <label id="elh_employee_immigrations_document" for="x_document" class="<?= $Page->LeftColumnClass ?>"><?= $Page->document->caption() ?><?= $Page->document->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->document->cellAttributes() ?>>
<span id="el_employee_immigrations_document">
<input type="<?= $Page->document->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_document" name="x_document" id="x_document" size="30" placeholder="<?= HtmlEncode($Page->document->getPlaceHolder()) ?>" value="<?= $Page->document->EditValue ?>"<?= $Page->document->editAttributes() ?> aria-describedby="x_document_help">
<?= $Page->document->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->document->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->documentname->Visible) { // documentname ?>
    <div id="r_documentname" class="form-group row">
        <label id="elh_employee_immigrations_documentname" for="x_documentname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->documentname->caption() ?><?= $Page->documentname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->documentname->cellAttributes() ?>>
<span id="el_employee_immigrations_documentname">
<input type="<?= $Page->documentname->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_documentname" name="x_documentname" id="x_documentname" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->documentname->getPlaceHolder()) ?>" value="<?= $Page->documentname->EditValue ?>"<?= $Page->documentname->editAttributes() ?> aria-describedby="x_documentname_help">
<?= $Page->documentname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->documentname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->valid_until->Visible) { // valid_until ?>
    <div id="r_valid_until" class="form-group row">
        <label id="elh_employee_immigrations_valid_until" for="x_valid_until" class="<?= $Page->LeftColumnClass ?>"><?= $Page->valid_until->caption() ?><?= $Page->valid_until->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->valid_until->cellAttributes() ?>>
<span id="el_employee_immigrations_valid_until">
<input type="<?= $Page->valid_until->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_valid_until" name="x_valid_until" id="x_valid_until" placeholder="<?= HtmlEncode($Page->valid_until->getPlaceHolder()) ?>" value="<?= $Page->valid_until->EditValue ?>"<?= $Page->valid_until->editAttributes() ?> aria-describedby="x_valid_until_help">
<?= $Page->valid_until->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->valid_until->getErrorMessage() ?></div>
<?php if (!$Page->valid_until->ReadOnly && !$Page->valid_until->Disabled && !isset($Page->valid_until->EditAttrs["readonly"]) && !isset($Page->valid_until->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_immigrationsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_immigrationsedit", "x_valid_until", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_immigrations_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_immigrations_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrations" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="employee_immigrations"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_employee_immigrations_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_immigrations_details">
<textarea data-table="employee_immigrations" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
    <div id="r_attachment1" class="form-group row">
        <label id="elh_employee_immigrations_attachment1" for="x_attachment1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment1->caption() ?><?= $Page->attachment1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment1->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment1">
<input type="<?= $Page->attachment1->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_attachment1" name="x_attachment1" id="x_attachment1" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment1->getPlaceHolder()) ?>" value="<?= $Page->attachment1->EditValue ?>"<?= $Page->attachment1->editAttributes() ?> aria-describedby="x_attachment1_help">
<?= $Page->attachment1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
    <div id="r_attachment2" class="form-group row">
        <label id="elh_employee_immigrations_attachment2" for="x_attachment2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment2->caption() ?><?= $Page->attachment2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment2->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment2">
<input type="<?= $Page->attachment2->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_attachment2" name="x_attachment2" id="x_attachment2" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment2->getPlaceHolder()) ?>" value="<?= $Page->attachment2->EditValue ?>"<?= $Page->attachment2->editAttributes() ?> aria-describedby="x_attachment2_help">
<?= $Page->attachment2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
    <div id="r_attachment3" class="form-group row">
        <label id="elh_employee_immigrations_attachment3" for="x_attachment3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment3->caption() ?><?= $Page->attachment3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment3->cellAttributes() ?>>
<span id="el_employee_immigrations_attachment3">
<input type="<?= $Page->attachment3->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_attachment3" name="x_attachment3" id="x_attachment3" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment3->getPlaceHolder()) ?>" value="<?= $Page->attachment3->EditValue ?>"<?= $Page->attachment3->editAttributes() ?> aria-describedby="x_attachment3_help">
<?= $Page->attachment3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_employee_immigrations_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_immigrations_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_immigrationsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_immigrationsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <div id="r_updated" class="form-group row">
        <label id="elh_employee_immigrations_updated" for="x_updated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->updated->caption() ?><?= $Page->updated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->updated->cellAttributes() ?>>
<span id="el_employee_immigrations_updated">
<input type="<?= $Page->updated->getInputTextType() ?>" data-table="employee_immigrations" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?= HtmlEncode($Page->updated->getPlaceHolder()) ?>" value="<?= $Page->updated->EditValue ?>"<?= $Page->updated->editAttributes() ?> aria-describedby="x_updated_help">
<?= $Page->updated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->updated->getErrorMessage() ?></div>
<?php if (!$Page->updated->ReadOnly && !$Page->updated->Disabled && !isset($Page->updated->EditAttrs["readonly"]) && !isset($Page->updated->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_immigrationsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_immigrationsedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
    ew.addEventHandlers("employee_immigrations");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
