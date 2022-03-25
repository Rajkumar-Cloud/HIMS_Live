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
$employees_payroll_delete = new employees_payroll_delete();

// Run the page
$employees_payroll_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_payroll_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployees_payrolldelete = currentForm = new ew.Form("femployees_payrolldelete", "delete");

// Form_CustomValidate event
femployees_payrolldelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_payrolldelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employees_payroll_delete->showPageHeader(); ?>
<?php
$employees_payroll_delete->showMessage();
?>
<form name="femployees_payrolldelete" id="femployees_payrolldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_payroll_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_payroll_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_payroll">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employees_payroll_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employees_payroll->id->Visible) { // id ?>
		<th class="<?php echo $employees_payroll->id->headerCellClass() ?>"><span id="elh_employees_payroll_id" class="employees_payroll_id"><?php echo $employees_payroll->id->caption() ?></span></th>
<?php } ?>
<?php if ($employees_payroll->employee->Visible) { // employee ?>
		<th class="<?php echo $employees_payroll->employee->headerCellClass() ?>"><span id="elh_employees_payroll_employee" class="employees_payroll_employee"><?php echo $employees_payroll->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employees_payroll->pay_frequency->Visible) { // pay_frequency ?>
		<th class="<?php echo $employees_payroll->pay_frequency->headerCellClass() ?>"><span id="elh_employees_payroll_pay_frequency" class="employees_payroll_pay_frequency"><?php echo $employees_payroll->pay_frequency->caption() ?></span></th>
<?php } ?>
<?php if ($employees_payroll->currency->Visible) { // currency ?>
		<th class="<?php echo $employees_payroll->currency->headerCellClass() ?>"><span id="elh_employees_payroll_currency" class="employees_payroll_currency"><?php echo $employees_payroll->currency->caption() ?></span></th>
<?php } ?>
<?php if ($employees_payroll->deduction_exemptions->Visible) { // deduction_exemptions ?>
		<th class="<?php echo $employees_payroll->deduction_exemptions->headerCellClass() ?>"><span id="elh_employees_payroll_deduction_exemptions" class="employees_payroll_deduction_exemptions"><?php echo $employees_payroll->deduction_exemptions->caption() ?></span></th>
<?php } ?>
<?php if ($employees_payroll->deduction_allowed->Visible) { // deduction_allowed ?>
		<th class="<?php echo $employees_payroll->deduction_allowed->headerCellClass() ?>"><span id="elh_employees_payroll_deduction_allowed" class="employees_payroll_deduction_allowed"><?php echo $employees_payroll->deduction_allowed->caption() ?></span></th>
<?php } ?>
<?php if ($employees_payroll->deduction_group->Visible) { // deduction_group ?>
		<th class="<?php echo $employees_payroll->deduction_group->headerCellClass() ?>"><span id="elh_employees_payroll_deduction_group" class="employees_payroll_deduction_group"><?php echo $employees_payroll->deduction_group->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employees_payroll_delete->RecCnt = 0;
$i = 0;
while (!$employees_payroll_delete->Recordset->EOF) {
	$employees_payroll_delete->RecCnt++;
	$employees_payroll_delete->RowCnt++;

	// Set row properties
	$employees_payroll->resetAttributes();
	$employees_payroll->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employees_payroll_delete->loadRowValues($employees_payroll_delete->Recordset);

	// Render row
	$employees_payroll_delete->renderRow();
?>
	<tr<?php echo $employees_payroll->rowAttributes() ?>>
<?php if ($employees_payroll->id->Visible) { // id ?>
		<td<?php echo $employees_payroll->id->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_delete->RowCnt ?>_employees_payroll_id" class="employees_payroll_id">
<span<?php echo $employees_payroll->id->viewAttributes() ?>>
<?php echo $employees_payroll->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_payroll->employee->Visible) { // employee ?>
		<td<?php echo $employees_payroll->employee->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_delete->RowCnt ?>_employees_payroll_employee" class="employees_payroll_employee">
<span<?php echo $employees_payroll->employee->viewAttributes() ?>>
<?php echo $employees_payroll->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_payroll->pay_frequency->Visible) { // pay_frequency ?>
		<td<?php echo $employees_payroll->pay_frequency->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_delete->RowCnt ?>_employees_payroll_pay_frequency" class="employees_payroll_pay_frequency">
<span<?php echo $employees_payroll->pay_frequency->viewAttributes() ?>>
<?php echo $employees_payroll->pay_frequency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_payroll->currency->Visible) { // currency ?>
		<td<?php echo $employees_payroll->currency->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_delete->RowCnt ?>_employees_payroll_currency" class="employees_payroll_currency">
<span<?php echo $employees_payroll->currency->viewAttributes() ?>>
<?php echo $employees_payroll->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_payroll->deduction_exemptions->Visible) { // deduction_exemptions ?>
		<td<?php echo $employees_payroll->deduction_exemptions->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_delete->RowCnt ?>_employees_payroll_deduction_exemptions" class="employees_payroll_deduction_exemptions">
<span<?php echo $employees_payroll->deduction_exemptions->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_exemptions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_payroll->deduction_allowed->Visible) { // deduction_allowed ?>
		<td<?php echo $employees_payroll->deduction_allowed->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_delete->RowCnt ?>_employees_payroll_deduction_allowed" class="employees_payroll_deduction_allowed">
<span<?php echo $employees_payroll->deduction_allowed->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_allowed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employees_payroll->deduction_group->Visible) { // deduction_group ?>
		<td<?php echo $employees_payroll->deduction_group->cellAttributes() ?>>
<span id="el<?php echo $employees_payroll_delete->RowCnt ?>_employees_payroll_deduction_group" class="employees_payroll_deduction_group">
<span<?php echo $employees_payroll->deduction_group->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employees_payroll_delete->Recordset->moveNext();
}
$employees_payroll_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employees_payroll_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employees_payroll_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employees_payroll_delete->terminate();
?>