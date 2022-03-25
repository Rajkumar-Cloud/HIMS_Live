<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeesPayrollDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployees_payrolldelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployees_payrolldelete = currentForm = new ew.Form("femployees_payrolldelete", "delete");
    loadjs.done("femployees_payrolldelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employees_payroll) ew.vars.tables.employees_payroll = <?= JsonEncode(GetClientVar("tables", "employees_payroll")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployees_payrolldelete" id="femployees_payrolldelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employees_payroll">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employees_payroll_id" class="employees_payroll_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employees_payroll_employee" class="employees_payroll_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pay_frequency->Visible) { // pay_frequency ?>
        <th class="<?= $Page->pay_frequency->headerCellClass() ?>"><span id="elh_employees_payroll_pay_frequency" class="employees_payroll_pay_frequency"><?= $Page->pay_frequency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <th class="<?= $Page->currency->headerCellClass() ?>"><span id="elh_employees_payroll_currency" class="employees_payroll_currency"><?= $Page->currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->deduction_exemptions->Visible) { // deduction_exemptions ?>
        <th class="<?= $Page->deduction_exemptions->headerCellClass() ?>"><span id="elh_employees_payroll_deduction_exemptions" class="employees_payroll_deduction_exemptions"><?= $Page->deduction_exemptions->caption() ?></span></th>
<?php } ?>
<?php if ($Page->deduction_allowed->Visible) { // deduction_allowed ?>
        <th class="<?= $Page->deduction_allowed->headerCellClass() ?>"><span id="elh_employees_payroll_deduction_allowed" class="employees_payroll_deduction_allowed"><?= $Page->deduction_allowed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->deduction_group->Visible) { // deduction_group ?>
        <th class="<?= $Page->deduction_group->headerCellClass() ?>"><span id="elh_employees_payroll_deduction_group" class="employees_payroll_deduction_group"><?= $Page->deduction_group->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_payroll_id" class="employees_payroll_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_payroll_employee" class="employees_payroll_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pay_frequency->Visible) { // pay_frequency ?>
        <td <?= $Page->pay_frequency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_payroll_pay_frequency" class="employees_payroll_pay_frequency">
<span<?= $Page->pay_frequency->viewAttributes() ?>>
<?= $Page->pay_frequency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <td <?= $Page->currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_payroll_currency" class="employees_payroll_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->deduction_exemptions->Visible) { // deduction_exemptions ?>
        <td <?= $Page->deduction_exemptions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_payroll_deduction_exemptions" class="employees_payroll_deduction_exemptions">
<span<?= $Page->deduction_exemptions->viewAttributes() ?>>
<?= $Page->deduction_exemptions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->deduction_allowed->Visible) { // deduction_allowed ?>
        <td <?= $Page->deduction_allowed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_payroll_deduction_allowed" class="employees_payroll_deduction_allowed">
<span<?= $Page->deduction_allowed->viewAttributes() ?>>
<?= $Page->deduction_allowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->deduction_group->Visible) { // deduction_group ?>
        <td <?= $Page->deduction_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_payroll_deduction_group" class="employees_payroll_deduction_group">
<span<?= $Page->deduction_group->viewAttributes() ?>>
<?= $Page->deduction_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
