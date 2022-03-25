<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeCompanyLoansEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_company_loansedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployee_company_loansedit = currentForm = new ew.Form("femployee_company_loansedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_company_loans")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_company_loans)
        ew.vars.tables.employee_company_loans = currentTable;
    femployee_company_loansedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["loan", [fields.loan.visible && fields.loan.required ? ew.Validators.required(fields.loan.caption) : null, ew.Validators.integer], fields.loan.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(0)], fields.start_date.isInvalid],
        ["last_installment_date", [fields.last_installment_date.visible && fields.last_installment_date.required ? ew.Validators.required(fields.last_installment_date.caption) : null, ew.Validators.datetime(0)], fields.last_installment_date.isInvalid],
        ["period_months", [fields.period_months.visible && fields.period_months.required ? ew.Validators.required(fields.period_months.caption) : null, ew.Validators.integer], fields.period_months.isInvalid],
        ["currency", [fields.currency.visible && fields.currency.required ? ew.Validators.required(fields.currency.caption) : null, ew.Validators.integer], fields.currency.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["monthly_installment", [fields.monthly_installment.visible && fields.monthly_installment.required ? ew.Validators.required(fields.monthly_installment.caption) : null, ew.Validators.float], fields.monthly_installment.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["details", [fields.details.visible && fields.details.required ? ew.Validators.required(fields.details.caption) : null], fields.details.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_company_loansedit,
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
    femployee_company_loansedit.validate = function () {
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
    femployee_company_loansedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_company_loansedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_company_loansedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    loadjs.done("femployee_company_loansedit");
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
<form name="femployee_company_loansedit" id="femployee_company_loansedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employee_company_loans_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_company_loans_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_company_loans" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employee_company_loans_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_company_loans_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->loan->Visible) { // loan ?>
    <div id="r_loan" class="form-group row">
        <label id="elh_employee_company_loans_loan" for="x_loan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->loan->caption() ?><?= $Page->loan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->loan->cellAttributes() ?>>
<span id="el_employee_company_loans_loan">
<input type="<?= $Page->loan->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_loan" name="x_loan" id="x_loan" size="30" placeholder="<?= HtmlEncode($Page->loan->getPlaceHolder()) ?>" value="<?= $Page->loan->EditValue ?>"<?= $Page->loan->editAttributes() ?> aria-describedby="x_loan_help">
<?= $Page->loan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->loan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <div id="r_start_date" class="form-group row">
        <label id="elh_employee_company_loans_start_date" for="x_start_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->start_date->caption() ?><?= $Page->start_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->start_date->cellAttributes() ?>>
<span id="el_employee_company_loans_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_start_date" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?> aria-describedby="x_start_date_help">
<?= $Page->start_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_company_loansedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_company_loansedit", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->last_installment_date->Visible) { // last_installment_date ?>
    <div id="r_last_installment_date" class="form-group row">
        <label id="elh_employee_company_loans_last_installment_date" for="x_last_installment_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->last_installment_date->caption() ?><?= $Page->last_installment_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->last_installment_date->cellAttributes() ?>>
<span id="el_employee_company_loans_last_installment_date">
<input type="<?= $Page->last_installment_date->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_last_installment_date" name="x_last_installment_date" id="x_last_installment_date" placeholder="<?= HtmlEncode($Page->last_installment_date->getPlaceHolder()) ?>" value="<?= $Page->last_installment_date->EditValue ?>"<?= $Page->last_installment_date->editAttributes() ?> aria-describedby="x_last_installment_date_help">
<?= $Page->last_installment_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->last_installment_date->getErrorMessage() ?></div>
<?php if (!$Page->last_installment_date->ReadOnly && !$Page->last_installment_date->Disabled && !isset($Page->last_installment_date->EditAttrs["readonly"]) && !isset($Page->last_installment_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_company_loansedit", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_company_loansedit", "x_last_installment_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->period_months->Visible) { // period_months ?>
    <div id="r_period_months" class="form-group row">
        <label id="elh_employee_company_loans_period_months" for="x_period_months" class="<?= $Page->LeftColumnClass ?>"><?= $Page->period_months->caption() ?><?= $Page->period_months->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->period_months->cellAttributes() ?>>
<span id="el_employee_company_loans_period_months">
<input type="<?= $Page->period_months->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_period_months" name="x_period_months" id="x_period_months" size="30" placeholder="<?= HtmlEncode($Page->period_months->getPlaceHolder()) ?>" value="<?= $Page->period_months->EditValue ?>"<?= $Page->period_months->editAttributes() ?> aria-describedby="x_period_months_help">
<?= $Page->period_months->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->period_months->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <div id="r_currency" class="form-group row">
        <label id="elh_employee_company_loans_currency" for="x_currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->currency->caption() ?><?= $Page->currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->currency->cellAttributes() ?>>
<span id="el_employee_company_loans_currency">
<input type="<?= $Page->currency->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?= HtmlEncode($Page->currency->getPlaceHolder()) ?>" value="<?= $Page->currency->EditValue ?>"<?= $Page->currency->editAttributes() ?> aria-describedby="x_currency_help">
<?= $Page->currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label id="elh_employee_company_loans_amount" for="x_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->amount->caption() ?><?= $Page->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
<span id="el_employee_company_loans_amount">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?> aria-describedby="x_amount_help">
<?= $Page->amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->monthly_installment->Visible) { // monthly_installment ?>
    <div id="r_monthly_installment" class="form-group row">
        <label id="elh_employee_company_loans_monthly_installment" for="x_monthly_installment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->monthly_installment->caption() ?><?= $Page->monthly_installment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->monthly_installment->cellAttributes() ?>>
<span id="el_employee_company_loans_monthly_installment">
<input type="<?= $Page->monthly_installment->getInputTextType() ?>" data-table="employee_company_loans" data-field="x_monthly_installment" name="x_monthly_installment" id="x_monthly_installment" size="30" placeholder="<?= HtmlEncode($Page->monthly_installment->getPlaceHolder()) ?>" value="<?= $Page->monthly_installment->EditValue ?>"<?= $Page->monthly_installment->editAttributes() ?> aria-describedby="x_monthly_installment_help">
<?= $Page->monthly_installment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->monthly_installment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_employee_company_loans_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_company_loans_status">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_company_loans" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="employee_company_loans"
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
        <label id="elh_employee_company_loans_details" for="x_details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->details->caption() ?><?= $Page->details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_company_loans_details">
<textarea data-table="employee_company_loans" data-field="x_details" name="x_details" id="x_details" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->details->getPlaceHolder()) ?>"<?= $Page->details->editAttributes() ?> aria-describedby="x_details_help"><?= $Page->details->EditValue ?></textarea>
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
    ew.addEventHandlers("employee_company_loans");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
