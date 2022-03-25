<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTimeentryAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_timeentryadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_timeentryadd = currentForm = new ew.Form("femployee_timeentryadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_timeentry")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_timeentry)
        ew.vars.tables.employee_timeentry = currentTable;
    femployee_timeentryadd.addFields([
        ["project", [fields.project.visible && fields.project.required ? ew.Validators.required(fields.project.caption) : null, ew.Validators.integer], fields.project.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["timesheet", [fields.timesheet.visible && fields.timesheet.required ? ew.Validators.required(fields.timesheet.caption) : null, ew.Validators.integer], fields.timesheet.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid],
        ["created", [fields.created.visible && fields.created.required ? ew.Validators.required(fields.created.caption) : null, ew.Validators.datetime(0)], fields.created.isInvalid],
        ["date_start", [fields.date_start.visible && fields.date_start.required ? ew.Validators.required(fields.date_start.caption) : null, ew.Validators.datetime(0)], fields.date_start.isInvalid],
        ["time_start", [fields.time_start.visible && fields.time_start.required ? ew.Validators.required(fields.time_start.caption) : null], fields.time_start.isInvalid],
        ["date_end", [fields.date_end.visible && fields.date_end.required ? ew.Validators.required(fields.date_end.caption) : null, ew.Validators.datetime(0)], fields.date_end.isInvalid],
        ["time_end", [fields.time_end.visible && fields.time_end.required ? ew.Validators.required(fields.time_end.caption) : null], fields.time_end.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_timeentryadd,
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
    femployee_timeentryadd.validate = function () {
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
    femployee_timeentryadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_timeentryadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_timeentryadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_timeentryadd");
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
<form name="femployee_timeentryadd" id="femployee_timeentryadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_timeentry">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->project->Visible) { // project ?>
    <div id="r_project" class="form-group row">
        <label id="elh_employee_timeentry_project" for="x_project" class="<?= $Page->LeftColumnClass ?>"><?= $Page->project->caption() ?><?= $Page->project->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->project->cellAttributes() ?>>
<span id="el_employee_timeentry_project">
<input type="<?= $Page->project->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_project" name="x_project" id="x_project" size="30" placeholder="<?= HtmlEncode($Page->project->getPlaceHolder()) ?>" value="<?= $Page->project->EditValue ?>"<?= $Page->project->editAttributes() ?> aria-describedby="x_project_help">
<?= $Page->project->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->project->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_timeentry_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_timeentry_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->timesheet->Visible) { // timesheet ?>
    <div id="r_timesheet" class="form-group row">
        <label id="elh_employee_timeentry_timesheet" for="x_timesheet" class="<?= $Page->LeftColumnClass ?>"><?= $Page->timesheet->caption() ?><?= $Page->timesheet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->timesheet->cellAttributes() ?>>
<span id="el_employee_timeentry_timesheet">
<input type="<?= $Page->timesheet->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_timesheet" name="x_timesheet" id="x_timesheet" size="30" placeholder="<?= HtmlEncode($Page->timesheet->getPlaceHolder()) ?>" value="<?= $Page->timesheet->EditValue ?>"<?= $Page->timesheet->editAttributes() ?> aria-describedby="x_timesheet_help">
<?= $Page->timesheet->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->timesheet->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_employee_timeentry_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_timeentry_details">
<textarea data-table="employee_timeentry" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <div id="r_created" class="form-group row">
        <label id="elh_employee_timeentry_created" for="x_created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->created->caption() ?><?= $Page->created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_timeentry_created">
<input type="<?= $Page->created->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_created" name="x_created" id="x_created" placeholder="<?= HtmlEncode($Page->created->getPlaceHolder()) ?>" value="<?= $Page->created->EditValue ?>"<?= $Page->created->editAttributes() ?> aria-describedby="x_created_help">
<?= $Page->created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->created->getErrorMessage() ?></div>
<?php if (!$Page->created->ReadOnly && !$Page->created->Disabled && !isset($Page->created->EditAttrs["readonly"]) && !isset($Page->created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_timeentryadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_timeentryadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
    <div id="r_date_start" class="form-group row">
        <label id="elh_employee_timeentry_date_start" for="x_date_start" class="<?= $Page->LeftColumnClass ?>"><?= $Page->date_start->caption() ?><?= $Page->date_start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->date_start->cellAttributes() ?>>
<span id="el_employee_timeentry_date_start">
<input type="<?= $Page->date_start->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_date_start" name="x_date_start" id="x_date_start" placeholder="<?= HtmlEncode($Page->date_start->getPlaceHolder()) ?>" value="<?= $Page->date_start->EditValue ?>"<?= $Page->date_start->editAttributes() ?> aria-describedby="x_date_start_help">
<?= $Page->date_start->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->date_start->getErrorMessage() ?></div>
<?php if (!$Page->date_start->ReadOnly && !$Page->date_start->Disabled && !isset($Page->date_start->EditAttrs["readonly"]) && !isset($Page->date_start->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_timeentryadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_timeentryadd", "x_date_start", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->time_start->Visible) { // time_start ?>
    <div id="r_time_start" class="form-group row">
        <label id="elh_employee_timeentry_time_start" for="x_time_start" class="<?= $Page->LeftColumnClass ?>"><?= $Page->time_start->caption() ?><?= $Page->time_start->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->time_start->cellAttributes() ?>>
<span id="el_employee_timeentry_time_start">
<input type="<?= $Page->time_start->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_time_start" name="x_time_start" id="x_time_start" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->time_start->getPlaceHolder()) ?>" value="<?= $Page->time_start->EditValue ?>"<?= $Page->time_start->editAttributes() ?> aria-describedby="x_time_start_help">
<?= $Page->time_start->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->time_start->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
    <div id="r_date_end" class="form-group row">
        <label id="elh_employee_timeentry_date_end" for="x_date_end" class="<?= $Page->LeftColumnClass ?>"><?= $Page->date_end->caption() ?><?= $Page->date_end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->date_end->cellAttributes() ?>>
<span id="el_employee_timeentry_date_end">
<input type="<?= $Page->date_end->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_date_end" name="x_date_end" id="x_date_end" placeholder="<?= HtmlEncode($Page->date_end->getPlaceHolder()) ?>" value="<?= $Page->date_end->EditValue ?>"<?= $Page->date_end->editAttributes() ?> aria-describedby="x_date_end_help">
<?= $Page->date_end->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->date_end->getErrorMessage() ?></div>
<?php if (!$Page->date_end->ReadOnly && !$Page->date_end->Disabled && !isset($Page->date_end->EditAttrs["readonly"]) && !isset($Page->date_end->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_timeentryadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_timeentryadd", "x_date_end", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->time_end->Visible) { // time_end ?>
    <div id="r_time_end" class="form-group row">
        <label id="elh_employee_timeentry_time_end" for="x_time_end" class="<?= $Page->LeftColumnClass ?>"><?= $Page->time_end->caption() ?><?= $Page->time_end->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->time_end->cellAttributes() ?>>
<span id="el_employee_timeentry_time_end">
<input type="<?= $Page->time_end->getInputTextType() ?>" data-table="employee_timeentry" data-field="x_time_end" name="x_time_end" id="x_time_end" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->time_end->getPlaceHolder()) ?>" value="<?= $Page->time_end->EditValue ?>"<?= $Page->time_end->editAttributes() ?> aria-describedby="x_time_end_help">
<?= $Page->time_end->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->time_end->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_timeentry_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_timeentry_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_timeentry" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="employee_timeentry"
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
    ew.addEventHandlers("employee_timeentry");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
