<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeesPayrollView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployees_payrollview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployees_payrollview = currentForm = new ew.Form("femployees_payrollview", "view");
    loadjs.done("femployees_payrollview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employees_payroll) ew.vars.tables.employees_payroll = <?= JsonEncode(GetClientVar("tables", "employees_payroll")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployees_payrollview" id="femployees_payrollview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employees_payroll">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_payroll_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employees_payroll_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_payroll_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employees_payroll_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pay_frequency->Visible) { // pay_frequency ?>
    <tr id="r_pay_frequency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_payroll_pay_frequency"><?= $Page->pay_frequency->caption() ?></span></td>
        <td data-name="pay_frequency" <?= $Page->pay_frequency->cellAttributes() ?>>
<span id="el_employees_payroll_pay_frequency">
<span<?= $Page->pay_frequency->viewAttributes() ?>>
<?= $Page->pay_frequency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <tr id="r_currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_payroll_currency"><?= $Page->currency->caption() ?></span></td>
        <td data-name="currency" <?= $Page->currency->cellAttributes() ?>>
<span id="el_employees_payroll_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->deduction_exemptions->Visible) { // deduction_exemptions ?>
    <tr id="r_deduction_exemptions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_payroll_deduction_exemptions"><?= $Page->deduction_exemptions->caption() ?></span></td>
        <td data-name="deduction_exemptions" <?= $Page->deduction_exemptions->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_exemptions">
<span<?= $Page->deduction_exemptions->viewAttributes() ?>>
<?= $Page->deduction_exemptions->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->deduction_allowed->Visible) { // deduction_allowed ?>
    <tr id="r_deduction_allowed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_payroll_deduction_allowed"><?= $Page->deduction_allowed->caption() ?></span></td>
        <td data-name="deduction_allowed" <?= $Page->deduction_allowed->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_allowed">
<span<?= $Page->deduction_allowed->viewAttributes() ?>>
<?= $Page->deduction_allowed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->deduction_group->Visible) { // deduction_group ?>
    <tr id="r_deduction_group">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employees_payroll_deduction_group"><?= $Page->deduction_group->caption() ?></span></td>
        <td data-name="deduction_group" <?= $Page->deduction_group->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_group">
<span<?= $Page->deduction_group->viewAttributes() ?>>
<?= $Page->deduction_group->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
