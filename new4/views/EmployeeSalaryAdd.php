<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeSalaryAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_salaryadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    femployee_salaryadd = currentForm = new ew.Form("femployee_salaryadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_salary")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_salary)
        ew.vars.tables.employee_salary = currentTable;
    femployee_salaryadd.addFields([
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["component", [fields.component.visible && fields.component.required ? ew.Validators.required(fields.component.caption) : null, ew.Validators.integer], fields.component.isInvalid],
        ["pay_frequency", [fields.pay_frequency.visible && fields.pay_frequency.required ? ew.Validators.required(fields.pay_frequency.caption) : null], fields.pay_frequency.isInvalid],
        ["currency", [fields.currency.visible && fields.currency.required ? ew.Validators.required(fields.currency.caption) : null, ew.Validators.integer], fields.currency.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_salaryadd,
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
    femployee_salaryadd.validate = function () {
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
    femployee_salaryadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_salaryadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_salaryadd.lists.pay_frequency = <?= $Page->pay_frequency->toClientList($Page) ?>;
    loadjs.done("femployee_salaryadd");
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
<form name="femployee_salaryadd" id="femployee_salaryadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_salary">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_salary_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_salary_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_salary" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->component->Visible) { // component ?>
    <div id="r_component" class="form-group row">
        <label id="elh_employee_salary_component" for="x_component" class="<?= $Page->LeftColumnClass ?>"><?= $Page->component->caption() ?><?= $Page->component->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->component->cellAttributes() ?>>
<span id="el_employee_salary_component">
<input type="<?= $Page->component->getInputTextType() ?>" data-table="employee_salary" data-field="x_component" name="x_component" id="x_component" size="30" placeholder="<?= HtmlEncode($Page->component->getPlaceHolder()) ?>" value="<?= $Page->component->EditValue ?>"<?= $Page->component->editAttributes() ?> aria-describedby="x_component_help">
<?= $Page->component->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->component->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pay_frequency->Visible) { // pay_frequency ?>
    <div id="r_pay_frequency" class="form-group row">
        <label id="elh_employee_salary_pay_frequency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pay_frequency->caption() ?><?= $Page->pay_frequency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pay_frequency->cellAttributes() ?>>
<span id="el_employee_salary_pay_frequency">
<template id="tp_x_pay_frequency">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_salary" data-field="x_pay_frequency" name="x_pay_frequency" id="x_pay_frequency"<?= $Page->pay_frequency->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_pay_frequency" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_pay_frequency"
    name="x_pay_frequency"
    value="<?= HtmlEncode($Page->pay_frequency->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_pay_frequency"
    data-target="dsl_x_pay_frequency"
    data-repeatcolumn="5"
    class="form-control<?= $Page->pay_frequency->isInvalidClass() ?>"
    data-table="employee_salary"
    data-field="x_pay_frequency"
    data-value-separator="<?= $Page->pay_frequency->displayValueSeparatorAttribute() ?>"
    <?= $Page->pay_frequency->editAttributes() ?>>
<?= $Page->pay_frequency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pay_frequency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <div id="r_currency" class="form-group row">
        <label id="elh_employee_salary_currency" for="x_currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->currency->caption() ?><?= $Page->currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->currency->cellAttributes() ?>>
<span id="el_employee_salary_currency">
<input type="<?= $Page->currency->getInputTextType() ?>" data-table="employee_salary" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?= HtmlEncode($Page->currency->getPlaceHolder()) ?>" value="<?= $Page->currency->EditValue ?>"<?= $Page->currency->editAttributes() ?> aria-describedby="x_currency_help">
<?= $Page->currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label id="elh_employee_salary_amount" for="x_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->amount->caption() ?><?= $Page->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
<span id="el_employee_salary_amount">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="employee_salary" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?> aria-describedby="x_amount_help">
<?= $Page->amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <div id="r_details" class="form-group row">
        <label id="elh_employee_salary_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_salary_details">
<textarea data-table="employee_salary" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
<?= $Page->details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->details->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employee_salary");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
