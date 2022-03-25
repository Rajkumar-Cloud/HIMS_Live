<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeCompanyLoansView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_company_loansview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_company_loansview = currentForm = new ew.Form("femployee_company_loansview", "view");
    loadjs.done("femployee_company_loansview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_company_loans) ew.vars.tables.employee_company_loans = <?= JsonEncode(GetClientVar("tables", "employee_company_loans")) ?>;
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
<form name="femployee_company_loansview" id="femployee_company_loansview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_company_loans_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_company_loans_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->loan->Visible) { // loan ?>
    <tr id="r_loan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_loan"><?= $Page->loan->caption() ?></span></td>
        <td data-name="loan" <?= $Page->loan->cellAttributes() ?>>
<span id="el_employee_company_loans_loan">
<span<?= $Page->loan->viewAttributes() ?>>
<?= $Page->loan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <tr id="r_start_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_start_date"><?= $Page->start_date->caption() ?></span></td>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el_employee_company_loans_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->last_installment_date->Visible) { // last_installment_date ?>
    <tr id="r_last_installment_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_last_installment_date"><?= $Page->last_installment_date->caption() ?></span></td>
        <td data-name="last_installment_date" <?= $Page->last_installment_date->cellAttributes() ?>>
<span id="el_employee_company_loans_last_installment_date">
<span<?= $Page->last_installment_date->viewAttributes() ?>>
<?= $Page->last_installment_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->period_months->Visible) { // period_months ?>
    <tr id="r_period_months">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_period_months"><?= $Page->period_months->caption() ?></span></td>
        <td data-name="period_months" <?= $Page->period_months->cellAttributes() ?>>
<span id="el_employee_company_loans_period_months">
<span<?= $Page->period_months->viewAttributes() ?>>
<?= $Page->period_months->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
    <tr id="r_currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_currency"><?= $Page->currency->caption() ?></span></td>
        <td data-name="currency" <?= $Page->currency->cellAttributes() ?>>
<span id="el_employee_company_loans_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <tr id="r_amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_amount"><?= $Page->amount->caption() ?></span></td>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el_employee_company_loans_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->monthly_installment->Visible) { // monthly_installment ?>
    <tr id="r_monthly_installment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_monthly_installment"><?= $Page->monthly_installment->caption() ?></span></td>
        <td data-name="monthly_installment" <?= $Page->monthly_installment->cellAttributes() ?>>
<span id="el_employee_company_loans_monthly_installment">
<span<?= $Page->monthly_installment->viewAttributes() ?>>
<?= $Page->monthly_installment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_company_loans_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_company_loans_details">
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
