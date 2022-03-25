<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLeavesEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_leavesedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_leavesedit = currentForm = new ew.Form("femployee_leavesedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_leaves")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_leaves)
        ew.vars.tables.employee_leaves = currentTable;
    femployee_leavesedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["leave_type", [fields.leave_type.visible && fields.leave_type.required ? ew.Validators.required(fields.leave_type.caption) : null, ew.Validators.integer], fields.leave_type.isInvalid],
        ["leave_period", [fields.leave_period.visible && fields.leave_period.required ? ew.Validators.required(fields.leave_period.caption) : null, ew.Validators.integer], fields.leave_period.isInvalid],
        ["date_start", [fields.date_start.visible && fields.date_start.required ? ew.Validators.required(fields.date_start.caption) : null, ew.Validators.datetime(0)], fields.date_start.isInvalid],
        ["date_end", [fields.date_end.visible && fields.date_end.required ? ew.Validators.required(fields.date_end.caption) : null, ew.Validators.datetime(0)], fields.date_end.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["attachment", [fields.attachment.visible && fields.attachment.required ? ew.Validators.required(fields.attachment.caption) : null], fields.attachment.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_leavesedit,
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
    femployee_leavesedit.validate = function () {
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
    femployee_leavesedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_leavesedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_leavesedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_leavesedit");
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
<form name="femployee_leavesedit" id="femployee_leavesedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_leaves">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_leaves_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_leaves_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_leaves" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_leaves_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_leaves_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_leaves" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
    <div id="r_leave_type" class="form-group row">
        <label id="elh_employee_leaves_leave_type" for="x_leave_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leave_type->caption() ?><?= $Page->leave_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leave_type->cellAttributes() ?>>
<span id="el_employee_leaves_leave_type">
<input type="<?= $Page->leave_type->getInputTextType() ?>" data-table="employee_leaves" data-field="x_leave_type" name="x_leave_type" id="x_leave_type" size="30" placeholder="<?= HtmlEncode($Page->leave_type->getPlaceHolder()) ?>" value="<?= $Page->leave_type->EditValue ?>"<?= $Page->leave_type->editAttributes() ?> aria-describedby="x_leave_type_help">
<?= $Page->leave_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leave_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leave_period->Visible) { // leave_period ?>
    <div id="r_leave_period" class="form-group row">
        <label id="elh_employee_leaves_leave_period" for="x_leave_period" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leave_period->caption() ?><?= $Page->leave_period->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leave_period->cellAttributes() ?>>
<span id="el_employee_leaves_leave_period">
<input type="<?= $Page->leave_period->getInputTextType() ?>" data-table="employee_leaves" data-field="x_leave_period" name="x_leave_period" id="x_leave_period" size="30" placeholder="<?= HtmlEncode($Page->leave_period->getPlaceHolder()) ?>" value="<?= $Page->leave_period->EditValue ?>"<?= $Page->leave_period->editAttributes() ?> aria-describedby="x_leave_period_help">
<?= $Page->leave_period->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leave_period->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
    <div id="r_date_start" class="form-group row">
        <label id="elh_employee_leaves_date_start" for="x_date_start" class="<?= $Page->LeftColumnClass ?>"><?= $Page->date_start->caption() ?><?= $Page->date_start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->date_start->cellAttributes() ?>>
<span id="el_employee_leaves_date_start">
<input type="<?= $Page->date_start->getInputTextType() ?>" data-table="employee_leaves" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?= HtmlEncode($Page->date_start->getPlaceHolder()) ?>" value="<?= $Page->date_start->EditValue ?>"<?= $Page->date_start->editAttributes() ?> aria-describedby="x_date_start_help">
<?= $Page->date_start->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->date_start->getErrorMessage() ?></div>
<?php if (!$Page->date_start->ReadOnly && !$Page->date_start->Disabled && !isset($Page->date_start->EditAttrs["readonly"]) && !isset($Page->date_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_leavesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_leavesedit", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
    <div id="r_date_end" class="form-group row">
        <label id="elh_employee_leaves_date_end" for="x_date_end" class="<?= $Page->LeftColumnClass ?>"><?= $Page->date_end->caption() ?><?= $Page->date_end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->date_end->cellAttributes() ?>>
<span id="el_employee_leaves_date_end">
<input type="<?= $Page->date_end->getInputTextType() ?>" data-table="employee_leaves" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?= HtmlEncode($Page->date_end->getPlaceHolder()) ?>" value="<?= $Page->date_end->EditValue ?>"<?= $Page->date_end->editAttributes() ?> aria-describedby="x_date_end_help">
<?= $Page->date_end->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->date_end->getErrorMessage() ?></div>
<?php if (!$Page->date_end->ReadOnly && !$Page->date_end->Disabled && !isset($Page->date_end->EditAttrs["readonly"]) && !isset($Page->date_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_leavesedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_leavesedit", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_employee_leaves_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_leaves_details">
<textarea data-table="employee_leaves" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_leaves_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_leaves_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_leaves" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="employee_leaves"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
    <div id="r_attachment" class="form-group row">
        <label id="elh_employee_leaves_attachment" for="x_attachment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->attachment->caption() ?><?= $Page->attachment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->attachment->cellAttributes() ?>>
<span id="el_employee_leaves_attachment">
<input type="<?= $Page->attachment->getInputTextType() ?>" data-table="employee_leaves" data-field="x_attachment" name="x_attachment" id="x_attachment" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->attachment->getPlaceHolder()) ?>" value="<?= $Page->attachment->EditValue ?>"<?= $Page->attachment->editAttributes() ?> aria-describedby="x_attachment_help">
<?= $Page->attachment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->attachment->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_leaves");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
