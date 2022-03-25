<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeCompanyLoansDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_company_loansdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_company_loansdelete = currentForm = new ew.Form("femployee_company_loansdelete", "delete");
    loadjs.done("femployee_company_loansdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_company_loans) ew.vars.tables.employee_company_loans = <?= JsonEncode(GetClientVar("tables", "employee_company_loans")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_company_loansdelete" id="femployee_company_loansdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_company_loans_id" class="employee_company_loans_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_company_loans_employee" class="employee_company_loans_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->loan->Visible) { // loan ?>
        <th class="<?= $Page->loan->headerCellClass() ?>"><span id="elh_employee_company_loans_loan" class="employee_company_loans_loan"><?= $Page->loan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><span id="elh_employee_company_loans_start_date" class="employee_company_loans_start_date"><?= $Page->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->last_installment_date->Visible) { // last_installment_date ?>
        <th class="<?= $Page->last_installment_date->headerCellClass() ?>"><span id="elh_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date"><?= $Page->last_installment_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->period_months->Visible) { // period_months ?>
        <th class="<?= $Page->period_months->headerCellClass() ?>"><span id="elh_employee_company_loans_period_months" class="employee_company_loans_period_months"><?= $Page->period_months->caption() ?></span></th>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <th class="<?= $Page->currency->headerCellClass() ?>"><span id="elh_employee_company_loans_currency" class="employee_company_loans_currency"><?= $Page->currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th class="<?= $Page->amount->headerCellClass() ?>"><span id="elh_employee_company_loans_amount" class="employee_company_loans_amount"><?= $Page->amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->monthly_installment->Visible) { // monthly_installment ?>
        <th class="<?= $Page->monthly_installment->headerCellClass() ?>"><span id="elh_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment"><?= $Page->monthly_installment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_company_loans_status" class="employee_company_loans_status"><?= $Page->status->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_company_loans_id" class="employee_company_loans_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_employee" class="employee_company_loans_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->loan->Visible) { // loan ?>
        <td <?= $Page->loan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_loan" class="employee_company_loans_loan">
<span<?= $Page->loan->viewAttributes() ?>>
<?= $Page->loan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <td <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_start_date" class="employee_company_loans_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->last_installment_date->Visible) { // last_installment_date ?>
        <td <?= $Page->last_installment_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date">
<span<?= $Page->last_installment_date->viewAttributes() ?>>
<?= $Page->last_installment_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->period_months->Visible) { // period_months ?>
        <td <?= $Page->period_months->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_period_months" class="employee_company_loans_period_months">
<span<?= $Page->period_months->viewAttributes() ?>>
<?= $Page->period_months->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <td <?= $Page->currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_currency" class="employee_company_loans_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <td <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_amount" class="employee_company_loans_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->monthly_installment->Visible) { // monthly_installment ?>
        <td <?= $Page->monthly_installment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment">
<span<?= $Page->monthly_installment->viewAttributes() ?>>
<?= $Page->monthly_installment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_company_loans_status" class="employee_company_loans_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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
