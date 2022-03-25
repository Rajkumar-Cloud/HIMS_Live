<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeesPayrollEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployees_payrolledit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    femployees_payrolledit = currentForm = new ew.Form("femployees_payrolledit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employees_payroll")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employees_payroll)
        ew.vars.tables.employees_payroll = currentTable;
    femployees_payrolledit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee", [fields.employee.visible && fields.employee.required ? ew.Validators.required(fields.employee.caption) : null, ew.Validators.integer], fields.employee.isInvalid],
        ["pay_frequency", [fields.pay_frequency.visible && fields.pay_frequency.required ? ew.Validators.required(fields.pay_frequency.caption) : null, ew.Validators.integer], fields.pay_frequency.isInvalid],
        ["currency", [fields.currency.visible && fields.currency.required ? ew.Validators.required(fields.currency.caption) : null, ew.Validators.integer], fields.currency.isInvalid],
        ["deduction_exemptions", [fields.deduction_exemptions.visible && fields.deduction_exemptions.required ? ew.Validators.required(fields.deduction_exemptions.caption) : null], fields.deduction_exemptions.isInvalid],
        ["deduction_allowed", [fields.deduction_allowed.visible && fields.deduction_allowed.required ? ew.Validators.required(fields.deduction_allowed.caption) : null], fields.deduction_allowed.isInvalid],
        ["deduction_group", [fields.deduction_group.visible && fields.deduction_group.required ? ew.Validators.required(fields.deduction_group.caption) : null, ew.Validators.integer], fields.deduction_group.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployees_payrolledit,
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
    femployees_payrolledit.validate = function () {
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
    femployees_payrolledit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployees_payrolledit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("femployees_payrolledit");
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
<form name="femployees_payrolledit" id="femployees_payrolledit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employees_payroll">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_employees_payroll_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_employees_payroll_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employees_payroll" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <div id="r_employee" class="form-group row">
        <label id="elh_employees_payroll_employee" for="x_employee" class="<?= $Page->LeftColumnClass ?>"><?= $Page->employee->caption() ?><?= $Page->employee->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->employee->cellAttributes() ?>>
<span id="el_employees_payroll_employee">
<input type="<?= $Page->employee->getInputTextType() ?>" data-table="employees_payroll" data-field="x_employee" name="x_employee" id="x_employee" size="30" placeholder="<?= HtmlEncode($Page->employee->getPlaceHolder()) ?>" value="<?= $Page->employee->EditValue ?>"<?= $Page->employee->editAttributes() ?> aria-describedby="x_employee_help">
<?= $Page->employee->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->employee->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pay_frequency->Visible) { // pay_frequency ?>
    <div id="r_pay_frequency" class="form-group row">
        <label id="elh_employees_payroll_pay_frequency" for="x_pay_frequency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pay_frequency->caption() ?><?= $Page->pay_frequency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pay_frequency->cellAttributes() ?>>
<span id="el_employees_payroll_pay_frequency">
<input type="<?= $Page->pay_frequency->getInputTextType() ?>" data-table="employees_payroll" data-field="x_pay_frequency" name="x_pay_frequency" id="x_pay_frequency" size="30" placeholder="<?= HtmlEncode($Page->pay_frequency->getPlaceHolder()) ?>" value="<?= $Page->pay_frequency->EditValue ?>"<?= $Page->pay_frequency->editAttributes() ?> aria-describedby="x_pay_frequency_help">
<?= $Page->pay_frequency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pay_frequency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <div id="r_currency" class="form-group row">
        <label id="elh_employees_payroll_currency" for="x_currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->currency->caption() ?><?= $Page->currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->currency->cellAttributes() ?>>
<span id="el_employees_payroll_currency">
<input type="<?= $Page->currency->getInputTextType() ?>" data-table="employees_payroll" data-field="x_currency" name="x_currency" id="x_currency" size="30" placeholder="<?= HtmlEncode($Page->currency->getPlaceHolder()) ?>" value="<?= $Page->currency->EditValue ?>"<?= $Page->currency->editAttributes() ?> aria-describedby="x_currency_help">
<?= $Page->currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->deduction_exemptions->Visible) { // deduction_exemptions ?>
    <div id="r_deduction_exemptions" class="form-group row">
        <label id="elh_employees_payroll_deduction_exemptions" for="x_deduction_exemptions" class="<?= $Page->LeftColumnClass ?>"><?= $Page->deduction_exemptions->caption() ?><?= $Page->deduction_exemptions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->deduction_exemptions->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_exemptions">
<input type="<?= $Page->deduction_exemptions->getInputTextType() ?>" data-table="employees_payroll" data-field="x_deduction_exemptions" name="x_deduction_exemptions" id="x_deduction_exemptions" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->deduction_exemptions->getPlaceHolder()) ?>" value="<?= $Page->deduction_exemptions->EditValue ?>"<?= $Page->deduction_exemptions->editAttributes() ?> aria-describedby="x_deduction_exemptions_help">
<?= $Page->deduction_exemptions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->deduction_exemptions->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->deduction_allowed->Visible) { // deduction_allowed ?>
    <div id="r_deduction_allowed" class="form-group row">
        <label id="elh_employees_payroll_deduction_allowed" for="x_deduction_allowed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->deduction_allowed->caption() ?><?= $Page->deduction_allowed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->deduction_allowed->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_allowed">
<input type="<?= $Page->deduction_allowed->getInputTextType() ?>" data-table="employees_payroll" data-field="x_deduction_allowed" name="x_deduction_allowed" id="x_deduction_allowed" size="30" maxlength="250" placeholder="<?= HtmlEncode($Page->deduction_allowed->getPlaceHolder()) ?>" value="<?= $Page->deduction_allowed->EditValue ?>"<?= $Page->deduction_allowed->editAttributes() ?> aria-describedby="x_deduction_allowed_help">
<?= $Page->deduction_allowed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->deduction_allowed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->deduction_group->Visible) { // deduction_group ?>
    <div id="r_deduction_group" class="form-group row">
        <label id="elh_employees_payroll_deduction_group" for="x_deduction_group" class="<?= $Page->LeftColumnClass ?>"><?= $Page->deduction_group->caption() ?><?= $Page->deduction_group->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->deduction_group->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_group">
<input type="<?= $Page->deduction_group->getInputTextType() ?>" data-table="employees_payroll" data-field="x_deduction_group" name="x_deduction_group" id="x_deduction_group" size="30" placeholder="<?= HtmlEncode($Page->deduction_group->getPlaceHolder()) ?>" value="<?= $Page->deduction_group->EditValue ?>"<?= $Page->deduction_group->editAttributes() ?> aria-describedby="x_deduction_group_help">
<?= $Page->deduction_group->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->deduction_group->getErrorMessage() ?></div>
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
    ew.addEventHandlers("employees_payroll");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
