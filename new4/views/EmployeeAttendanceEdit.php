<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeAttendanceEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_attendanceedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_attendanceedit = currentForm = new ew.Form("femployee_attendanceedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_attendance")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_attendance)
        ew.vars.tables.employee_attendance = currentTable;
    femployee_attendanceedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["in_time", [fields.in_time.visible && fields.in_time.required ? ew.Validators.required(fields.in_time.caption) : null, ew.Validators.datetime(0)], fields.in_time.isInvalid],
        ["out_time", [fields.out_time.visible && fields.out_time.required ? ew.Validators.required(fields.out_time.caption) : null, ew.Validators.datetime(0)], fields.out_time.isInvalid],
        ["note", [fields.note.visible && fields.note.required ? ew.Validators.required(fields.note.caption) : null], fields.note.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_attendanceedit,
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
    femployee_attendanceedit.validate = function () {
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
    femployee_attendanceedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_attendanceedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployee_attendanceedit");
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
<form name="femployee_attendanceedit" id="femployee_attendanceedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_attendance">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_attendance_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_attendance_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_attendance" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_attendance_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_attendance_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_attendance" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->in_time->Visible) { // in_time ?>
    <div id="r_in_time" class="form-group row">
        <label id="elh_employee_attendance_in_time" for="x_in_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->in_time->caption() ?><?= $Page->in_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->in_time->cellAttributes() ?>>
<span id="el_employee_attendance_in_time">
<input type="<?= $Page->in_time->getInputTextType() ?>" data-table="employee_attendance" data-field="x_in_time" name="x_in_time" id="x_in_time" placeholder="<?= HtmlEncode($Page->in_time->getPlaceHolder()) ?>" value="<?= $Page->in_time->EditValue ?>"<?= $Page->in_time->editAttributes() ?> aria-describedby="x_in_time_help">
<?= $Page->in_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->in_time->getErrorMessage() ?></div>
<?php if (!$Page->in_time->ReadOnly && !$Page->in_time->Disabled && !isset($Page->in_time->EditAttrs["readonly"]) && !isset($Page->in_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_attendanceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_attendanceedit", "x_in_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->out_time->Visible) { // out_time ?>
    <div id="r_out_time" class="form-group row">
        <label id="elh_employee_attendance_out_time" for="x_out_time" class="<?= $Page->LeftColumnClass ?>"><?= $Page->out_time->caption() ?><?= $Page->out_time->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->out_time->cellAttributes() ?>>
<span id="el_employee_attendance_out_time">
<input type="<?= $Page->out_time->getInputTextType() ?>" data-table="employee_attendance" data-field="x_out_time" name="x_out_time" id="x_out_time" placeholder="<?= HtmlEncode($Page->out_time->getPlaceHolder()) ?>" value="<?= $Page->out_time->EditValue ?>"<?= $Page->out_time->editAttributes() ?> aria-describedby="x_out_time_help">
<?= $Page->out_time->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->out_time->getErrorMessage() ?></div>
<?php if (!$Page->out_time->ReadOnly && !$Page->out_time->Disabled && !isset($Page->out_time->EditAttrs["readonly"]) && !isset($Page->out_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_attendanceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_attendanceedit", "x_out_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->note->Visible) { // note ?>
    <div id="r_note" class="form-group row">
        <label id="elh_employee_attendance_note" for="x_note" class="<?= $Page->LeftColumnClass ?>"><?= $Page->note->caption() ?><?= $Page->note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->note->cellAttributes() ?>>
<span id="el_employee_attendance_note">
<textarea data-table="employee_attendance" data-field="x_note" name="x_note" id="x_note" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->note->getPlaceHolder()) ?>"<?= $Page->note->editAttributes() ?> aria-describedby="x_note_help"><?= $Page->note->EditValue ?></textarea>
<?= $Page->note->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->note->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_attendance");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
