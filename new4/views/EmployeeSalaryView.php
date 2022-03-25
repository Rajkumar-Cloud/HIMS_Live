<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeSalaryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_salaryview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_salaryview = currentForm = new ew.Form("femployee_salaryview", "view");
    loadjs.done("femployee_salaryview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_salary) ew.vars.tables.employee_salary = <?= JsonEncode(GetClientVar("tables", "employee_salary")) ?>;
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
<form name="femployee_salaryview" id="femployee_salaryview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_salary">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_salary_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_salary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_salary_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_salary_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->component->Visible) { // component ?>
    <tr id="r_component">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_salary_component"><?= $Page->component->caption() ?></span></td>
        <td data-name="component" <?= $Page->component->cellAttributes() ?>>
<span id="el_employee_salary_component">
<span<?= $Page->component->viewAttributes() ?>>
<?= $Page->component->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pay_frequency->Visible) { // pay_frequency ?>
    <tr id="r_pay_frequency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_salary_pay_frequency"><?= $Page->pay_frequency->caption() ?></span></td>
        <td data-name="pay_frequency" <?= $Page->pay_frequency->cellAttributes() ?>>
<span id="el_employee_salary_pay_frequency">
<span<?= $Page->pay_frequency->viewAttributes() ?>>
<?= $Page->pay_frequency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <tr id="r_currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_salary_currency"><?= $Page->currency->caption() ?></span></td>
        <td data-name="currency" <?= $Page->currency->cellAttributes() ?>>
<span id="el_employee_salary_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <tr id="r_amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_salary_amount"><?= $Page->amount->caption() ?></span></td>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el_employee_salary_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_salary_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_salary_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
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
