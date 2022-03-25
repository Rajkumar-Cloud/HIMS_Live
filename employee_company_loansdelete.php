<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$employee_company_loans_delete = new employee_company_loans_delete();

// Run the page
$employee_company_loans_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_company_loans_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_company_loansdelete = currentForm = new ew.Form("femployee_company_loansdelete", "delete");

// Form_CustomValidate event
femployee_company_loansdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_company_loansdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_company_loansdelete.lists["x_status"] = <?php echo $employee_company_loans_delete->status->Lookup->toClientList() ?>;
femployee_company_loansdelete.lists["x_status"].options = <?php echo JsonEncode($employee_company_loans_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_company_loans_delete->showPageHeader(); ?>
<?php
$employee_company_loans_delete->showMessage();
?>
<form name="femployee_company_loansdelete" id="femployee_company_loansdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_company_loans_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_company_loans_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_company_loans_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_company_loans->id->Visible) { // id ?>
		<th class="<?php echo $employee_company_loans->id->headerCellClass() ?>"><span id="elh_employee_company_loans_id" class="employee_company_loans_id"><?php echo $employee_company_loans->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_company_loans->employee->headerCellClass() ?>"><span id="elh_employee_company_loans_employee" class="employee_company_loans_employee"><?php echo $employee_company_loans->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->loan->Visible) { // loan ?>
		<th class="<?php echo $employee_company_loans->loan->headerCellClass() ?>"><span id="elh_employee_company_loans_loan" class="employee_company_loans_loan"><?php echo $employee_company_loans->loan->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->start_date->Visible) { // start_date ?>
		<th class="<?php echo $employee_company_loans->start_date->headerCellClass() ?>"><span id="elh_employee_company_loans_start_date" class="employee_company_loans_start_date"><?php echo $employee_company_loans->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->last_installment_date->Visible) { // last_installment_date ?>
		<th class="<?php echo $employee_company_loans->last_installment_date->headerCellClass() ?>"><span id="elh_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date"><?php echo $employee_company_loans->last_installment_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->period_months->Visible) { // period_months ?>
		<th class="<?php echo $employee_company_loans->period_months->headerCellClass() ?>"><span id="elh_employee_company_loans_period_months" class="employee_company_loans_period_months"><?php echo $employee_company_loans->period_months->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->currency->Visible) { // currency ?>
		<th class="<?php echo $employee_company_loans->currency->headerCellClass() ?>"><span id="elh_employee_company_loans_currency" class="employee_company_loans_currency"><?php echo $employee_company_loans->currency->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->amount->Visible) { // amount ?>
		<th class="<?php echo $employee_company_loans->amount->headerCellClass() ?>"><span id="elh_employee_company_loans_amount" class="employee_company_loans_amount"><?php echo $employee_company_loans->amount->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->monthly_installment->Visible) { // monthly_installment ?>
		<th class="<?php echo $employee_company_loans->monthly_installment->headerCellClass() ?>"><span id="elh_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment"><?php echo $employee_company_loans->monthly_installment->caption() ?></span></th>
<?php } ?>
<?php if ($employee_company_loans->status->Visible) { // status ?>
		<th class="<?php echo $employee_company_loans->status->headerCellClass() ?>"><span id="elh_employee_company_loans_status" class="employee_company_loans_status"><?php echo $employee_company_loans->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_company_loans_delete->RecCnt = 0;
$i = 0;
while (!$employee_company_loans_delete->Recordset->EOF) {
	$employee_company_loans_delete->RecCnt++;
	$employee_company_loans_delete->RowCnt++;

	// Set row properties
	$employee_company_loans->resetAttributes();
	$employee_company_loans->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_company_loans_delete->loadRowValues($employee_company_loans_delete->Recordset);

	// Render row
	$employee_company_loans_delete->renderRow();
?>
	<tr<?php echo $employee_company_loans->rowAttributes() ?>>
<?php if ($employee_company_loans->id->Visible) { // id ?>
		<td<?php echo $employee_company_loans->id->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_id" class="employee_company_loans_id">
<span<?php echo $employee_company_loans->id->viewAttributes() ?>>
<?php echo $employee_company_loans->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->employee->Visible) { // employee ?>
		<td<?php echo $employee_company_loans->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_employee" class="employee_company_loans_employee">
<span<?php echo $employee_company_loans->employee->viewAttributes() ?>>
<?php echo $employee_company_loans->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->loan->Visible) { // loan ?>
		<td<?php echo $employee_company_loans->loan->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_loan" class="employee_company_loans_loan">
<span<?php echo $employee_company_loans->loan->viewAttributes() ?>>
<?php echo $employee_company_loans->loan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->start_date->Visible) { // start_date ?>
		<td<?php echo $employee_company_loans->start_date->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_start_date" class="employee_company_loans_start_date">
<span<?php echo $employee_company_loans->start_date->viewAttributes() ?>>
<?php echo $employee_company_loans->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->last_installment_date->Visible) { // last_installment_date ?>
		<td<?php echo $employee_company_loans->last_installment_date->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_last_installment_date" class="employee_company_loans_last_installment_date">
<span<?php echo $employee_company_loans->last_installment_date->viewAttributes() ?>>
<?php echo $employee_company_loans->last_installment_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->period_months->Visible) { // period_months ?>
		<td<?php echo $employee_company_loans->period_months->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_period_months" class="employee_company_loans_period_months">
<span<?php echo $employee_company_loans->period_months->viewAttributes() ?>>
<?php echo $employee_company_loans->period_months->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->currency->Visible) { // currency ?>
		<td<?php echo $employee_company_loans->currency->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_currency" class="employee_company_loans_currency">
<span<?php echo $employee_company_loans->currency->viewAttributes() ?>>
<?php echo $employee_company_loans->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->amount->Visible) { // amount ?>
		<td<?php echo $employee_company_loans->amount->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_amount" class="employee_company_loans_amount">
<span<?php echo $employee_company_loans->amount->viewAttributes() ?>>
<?php echo $employee_company_loans->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->monthly_installment->Visible) { // monthly_installment ?>
		<td<?php echo $employee_company_loans->monthly_installment->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_monthly_installment" class="employee_company_loans_monthly_installment">
<span<?php echo $employee_company_loans->monthly_installment->viewAttributes() ?>>
<?php echo $employee_company_loans->monthly_installment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_company_loans->status->Visible) { // status ?>
		<td<?php echo $employee_company_loans->status->cellAttributes() ?>>
<span id="el<?php echo $employee_company_loans_delete->RowCnt ?>_employee_company_loans_status" class="employee_company_loans_status">
<span<?php echo $employee_company_loans->status->viewAttributes() ?>>
<?php echo $employee_company_loans->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_company_loans_delete->Recordset->moveNext();
}
$employee_company_loans_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_company_loans_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_company_loans_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_company_loans_delete->terminate();
?>