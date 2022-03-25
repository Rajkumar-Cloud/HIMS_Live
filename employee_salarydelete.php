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
$employee_salary_delete = new employee_salary_delete();

// Run the page
$employee_salary_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_salary_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_salarydelete = currentForm = new ew.Form("femployee_salarydelete", "delete");

// Form_CustomValidate event
femployee_salarydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_salarydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_salarydelete.lists["x_pay_frequency"] = <?php echo $employee_salary_delete->pay_frequency->Lookup->toClientList() ?>;
femployee_salarydelete.lists["x_pay_frequency"].options = <?php echo JsonEncode($employee_salary_delete->pay_frequency->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_salary_delete->showPageHeader(); ?>
<?php
$employee_salary_delete->showMessage();
?>
<form name="femployee_salarydelete" id="femployee_salarydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_salary_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_salary_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_salary">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_salary_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_salary->id->Visible) { // id ?>
		<th class="<?php echo $employee_salary->id->headerCellClass() ?>"><span id="elh_employee_salary_id" class="employee_salary_id"><?php echo $employee_salary->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_salary->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_salary->employee->headerCellClass() ?>"><span id="elh_employee_salary_employee" class="employee_salary_employee"><?php echo $employee_salary->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_salary->component->Visible) { // component ?>
		<th class="<?php echo $employee_salary->component->headerCellClass() ?>"><span id="elh_employee_salary_component" class="employee_salary_component"><?php echo $employee_salary->component->caption() ?></span></th>
<?php } ?>
<?php if ($employee_salary->pay_frequency->Visible) { // pay_frequency ?>
		<th class="<?php echo $employee_salary->pay_frequency->headerCellClass() ?>"><span id="elh_employee_salary_pay_frequency" class="employee_salary_pay_frequency"><?php echo $employee_salary->pay_frequency->caption() ?></span></th>
<?php } ?>
<?php if ($employee_salary->currency->Visible) { // currency ?>
		<th class="<?php echo $employee_salary->currency->headerCellClass() ?>"><span id="elh_employee_salary_currency" class="employee_salary_currency"><?php echo $employee_salary->currency->caption() ?></span></th>
<?php } ?>
<?php if ($employee_salary->amount->Visible) { // amount ?>
		<th class="<?php echo $employee_salary->amount->headerCellClass() ?>"><span id="elh_employee_salary_amount" class="employee_salary_amount"><?php echo $employee_salary->amount->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_salary_delete->RecCnt = 0;
$i = 0;
while (!$employee_salary_delete->Recordset->EOF) {
	$employee_salary_delete->RecCnt++;
	$employee_salary_delete->RowCnt++;

	// Set row properties
	$employee_salary->resetAttributes();
	$employee_salary->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_salary_delete->loadRowValues($employee_salary_delete->Recordset);

	// Render row
	$employee_salary_delete->renderRow();
?>
	<tr<?php echo $employee_salary->rowAttributes() ?>>
<?php if ($employee_salary->id->Visible) { // id ?>
		<td<?php echo $employee_salary->id->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_delete->RowCnt ?>_employee_salary_id" class="employee_salary_id">
<span<?php echo $employee_salary->id->viewAttributes() ?>>
<?php echo $employee_salary->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_salary->employee->Visible) { // employee ?>
		<td<?php echo $employee_salary->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_delete->RowCnt ?>_employee_salary_employee" class="employee_salary_employee">
<span<?php echo $employee_salary->employee->viewAttributes() ?>>
<?php echo $employee_salary->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_salary->component->Visible) { // component ?>
		<td<?php echo $employee_salary->component->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_delete->RowCnt ?>_employee_salary_component" class="employee_salary_component">
<span<?php echo $employee_salary->component->viewAttributes() ?>>
<?php echo $employee_salary->component->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_salary->pay_frequency->Visible) { // pay_frequency ?>
		<td<?php echo $employee_salary->pay_frequency->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_delete->RowCnt ?>_employee_salary_pay_frequency" class="employee_salary_pay_frequency">
<span<?php echo $employee_salary->pay_frequency->viewAttributes() ?>>
<?php echo $employee_salary->pay_frequency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_salary->currency->Visible) { // currency ?>
		<td<?php echo $employee_salary->currency->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_delete->RowCnt ?>_employee_salary_currency" class="employee_salary_currency">
<span<?php echo $employee_salary->currency->viewAttributes() ?>>
<?php echo $employee_salary->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_salary->amount->Visible) { // amount ?>
		<td<?php echo $employee_salary->amount->cellAttributes() ?>>
<span id="el<?php echo $employee_salary_delete->RowCnt ?>_employee_salary_amount" class="employee_salary_amount">
<span<?php echo $employee_salary->amount->viewAttributes() ?>>
<?php echo $employee_salary->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_salary_delete->Recordset->moveNext();
}
$employee_salary_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_salary_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_salary_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_salary_delete->terminate();
?>