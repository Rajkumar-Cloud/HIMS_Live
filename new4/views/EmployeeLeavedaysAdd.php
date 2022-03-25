<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLeavedaysAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_leavedaysadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_leavedaysadd = currentForm = new ew.Form("femployee_leavedaysadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_leavedays")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_leavedays)
        ew.vars.tables.employee_leavedays = currentTable;
    femployee_leavedaysadd.addFields([
        ["employee_leave", [fields.employee_leave.visible && fields.employee_leave.required ? ew.Validators.required(fields.employee_leave.caption) : null, ew.Validators.integer], fields.employee_leave.isInvalid],
        ["leave_date", [fields.leave_date.visible && fields.leave_date.required ? ew.Validators.required(fields.leave_date.caption) : null, ew.Validators.datetime(0)], fields.leave_date.isInvalid],
        ["leave_type", [fields.leave_type.visible && fields.leave_type.required ? ew.Validators.required(fields.leave_type.caption) : null], fields.leave_type.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_leavedaysadd,
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
    femployee_leavedaysadd.validate = function () {
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
    femployee_leavedaysadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_leavedaysadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_leavedaysadd.lists.leave_type = <?= $Page->leave_type->toClientList($Page) ?>;
    loadjs.done("femployee_leavedaysadd");
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
<form name="femployee_leavedaysadd" id="femployee_leavedaysadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_leavedays">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->employee_leave->Visible) { // employee_leave ?>
    <div id="r_employee_leave" class="form-group row">
        <label id="elh_employee_leavedays_employee_leave" for="x_employee_leave" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee_leave->caption() ?><?= $Page->employee_leave->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee_leave->cellAttributes() ?>>
<span id="el_employee_leavedays_employee_leave">
<input type="<?= $Page->employee_leave->getInputTextType() ?>" data-table="employee_leavedays" data-field="x_employee_leave" name="x_employee_leave" id="x_employee_leave" size="30" placeholder="<?= HtmlEncode($Page->employee_leave->getPlaceHolder()) ?>" value="<?= $Page->employee_leave->EditValue ?>"<?= $Page->employee_leave->editAttributes() ?> aria-describedby="x_employee_leave_help">
<?= $Page->employee_leave->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee_leave->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leave_date->Visible) { // leave_date ?>
    <div id="r_leave_date" class="form-group row">
        <label id="elh_employee_leavedays_leave_date" for="x_leave_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leave_date->caption() ?><?= $Page->leave_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leave_date->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_date">
<input type="<?= $Page->leave_date->getInputTextType() ?>" data-table="employee_leavedays" data-field="x_leave_date" name="x_leave_date" id="x_leave_date" placeholder="<?= HtmlEncode($Page->leave_date->getPlaceHolder()) ?>" value="<?= $Page->leave_date->EditValue ?>"<?= $Page->leave_date->editAttributes() ?> aria-describedby="x_leave_date_help">
<?= $Page->leave_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leave_date->getErrorMessage() ?></div>
<?php if (!$Page->leave_date->ReadOnly && !$Page->leave_date->Disabled && !isset($Page->leave_date->EditAttrs["readonly"]) && !isset($Page->leave_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_leavedaysadd", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_leavedaysadd", "x_leave_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
    <div id="r_leave_type" class="form-group row">
        <label id="elh_employee_leavedays_leave_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leave_type->caption() ?><?= $Page->leave_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leave_type->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_type">
<template id="tp_x_leave_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_leavedays" data-field="x_leave_type" name="x_leave_type" id="x_leave_type"<?= $Page->leave_type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_leave_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_leave_type"
    name="x_leave_type"
    value="<?= HtmlEncode($Page->leave_type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_leave_type"
    data-target="dsl_x_leave_type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->leave_type->isInvalidClass() ?>"
    data-table="employee_leavedays"
    data-field="x_leave_type"
    data-value-separator="<?= $Page->leave_type->displayValueSeparatorAttribute() ?>"
    <?= $Page->leave_type->editAttributes() ?>>
<?= $Page->leave_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leave_type->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_leavedays");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
