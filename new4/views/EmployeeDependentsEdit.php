<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeDependentsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_dependentsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_dependentsedit = currentForm = new ew.Form("femployee_dependentsedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_dependents")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_dependents)
        ew.vars.tables.employee_dependents = currentTable;
    femployee_dependentsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["relationship", [fields.relationship.visible && fields.relationship.required ? ew.Validators.required(fields.relationship.caption) : null], fields.relationship.isInvalid],
        ["dob", [fields.dob.visible && fields.dob.required ? ew.Validators.required(fields.dob.caption) : null, ew.Validators.datetime(0)], fields.dob.isInvalid],
        ["id_number", [fields.id_number.visible && fields.id_number.required ? ew.Validators.required(fields.id_number.caption) : null], fields.id_number.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_dependentsedit,
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
    femployee_dependentsedit.validate = function () {
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
    femployee_dependentsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_dependentsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_dependentsedit.lists.relationship = <?= $Page->relationship->toClientList($Page) ?>;
    loadjs.done("femployee_dependentsedit");
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
<form name="femployee_dependentsedit" id="femployee_dependentsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_dependents">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_dependents_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_dependents_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_dependents" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_dependents_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_dependents_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_dependents" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_employee_dependents_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_employee_dependents_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="employee_dependents" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
    <div id="r_relationship" class="form-group row">
        <label id="elh_employee_dependents_relationship" class="<?= $Page->LeftColumnClass ?>"><?= $Page->relationship->caption() ?><?= $Page->relationship->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->relationship->cellAttributes() ?>>
<span id="el_employee_dependents_relationship">
<template id="tp_x_relationship">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_dependents" data-field="x_relationship" name="x_relationship" id="x_relationship"<?= $Page->relationship->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_relationship" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_relationship"
    name="x_relationship"
    value="<?= HtmlEncode($Page->relationship->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_relationship"
    data-target="dsl_x_relationship"
    data-repeatcolumn="5"
    class="form-control<?= $Page->relationship->isInvalidClass() ?>"
    data-table="employee_dependents"
    data-field="x_relationship"
    data-value-separator="<?= $Page->relationship->displayValueSeparatorAttribute() ?>"
    <?= $Page->relationship->editAttributes() ?>>
<?= $Page->relationship->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->relationship->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <div id="r_dob" class="form-group row">
        <label id="elh_employee_dependents_dob" for="x_dob" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dob->caption() ?><?= $Page->dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dob->cellAttributes() ?>>
<span id="el_employee_dependents_dob">
<input type="<?= $Page->dob->getInputTextType() ?>" data-table="employee_dependents" data-field="x_dob" name="x_dob" id="x_dob" placeholder="<?= HtmlEncode($Page->dob->getPlaceHolder()) ?>" value="<?= $Page->dob->EditValue ?>"<?= $Page->dob->editAttributes() ?> aria-describedby="x_dob_help">
<?= $Page->dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dob->getErrorMessage() ?></div>
<?php if (!$Page->dob->ReadOnly && !$Page->dob->Disabled && !isset($Page->dob->EditAttrs["readonly"]) && !isset($Page->dob->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_dependentsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_dependentsedit", "x_dob", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_number->Visible) { // id_number ?>
    <div id="r_id_number" class="form-group row">
        <label id="elh_employee_dependents_id_number" for="x_id_number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_number->caption() ?><?= $Page->id_number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_number->cellAttributes() ?>>
<span id="el_employee_dependents_id_number">
<input type="<?= $Page->id_number->getInputTextType() ?>" data-table="employee_dependents" data-field="x_id_number" name="x_id_number" id="x_id_number" size="30" maxlength="25" placeholder="<?= HtmlEncode($Page->id_number->getPlaceHolder()) ?>" value="<?= $Page->id_number->EditValue ?>"<?= $Page->id_number->editAttributes() ?> aria-describedby="x_id_number_help">
<?= $Page->id_number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id_number->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_dependents");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
