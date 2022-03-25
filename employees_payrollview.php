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
$employees_payroll_view = new employees_payroll_view();

// Run the page
$employees_payroll_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employees_payroll_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employees_payroll->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployees_payrollview = currentForm = new ew.Form("femployees_payrollview", "view");

// Form_CustomValidate event
femployees_payrollview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployees_payrollview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employees_payroll->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employees_payroll_view->ExportOptions->render("body") ?>
<?php $employees_payroll_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employees_payroll_view->showPageHeader(); ?>
<?php
$employees_payroll_view->showMessage();
?>
<form name="femployees_payrollview" id="femployees_payrollview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employees_payroll_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employees_payroll_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employees_payroll">
<input type="hidden" name="modal" value="<?php echo (int)$employees_payroll_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employees_payroll->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employees_payroll_view->TableLeftColumnClass ?>"><span id="elh_employees_payroll_id"><?php echo $employees_payroll->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employees_payroll->id->cellAttributes() ?>>
<span id="el_employees_payroll_id">
<span<?php echo $employees_payroll->id->viewAttributes() ?>>
<?php echo $employees_payroll->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_payroll->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employees_payroll_view->TableLeftColumnClass ?>"><span id="elh_employees_payroll_employee"><?php echo $employees_payroll->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employees_payroll->employee->cellAttributes() ?>>
<span id="el_employees_payroll_employee">
<span<?php echo $employees_payroll->employee->viewAttributes() ?>>
<?php echo $employees_payroll->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_payroll->pay_frequency->Visible) { // pay_frequency ?>
	<tr id="r_pay_frequency">
		<td class="<?php echo $employees_payroll_view->TableLeftColumnClass ?>"><span id="elh_employees_payroll_pay_frequency"><?php echo $employees_payroll->pay_frequency->caption() ?></span></td>
		<td data-name="pay_frequency"<?php echo $employees_payroll->pay_frequency->cellAttributes() ?>>
<span id="el_employees_payroll_pay_frequency">
<span<?php echo $employees_payroll->pay_frequency->viewAttributes() ?>>
<?php echo $employees_payroll->pay_frequency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_payroll->currency->Visible) { // currency ?>
	<tr id="r_currency">
		<td class="<?php echo $employees_payroll_view->TableLeftColumnClass ?>"><span id="elh_employees_payroll_currency"><?php echo $employees_payroll->currency->caption() ?></span></td>
		<td data-name="currency"<?php echo $employees_payroll->currency->cellAttributes() ?>>
<span id="el_employees_payroll_currency">
<span<?php echo $employees_payroll->currency->viewAttributes() ?>>
<?php echo $employees_payroll->currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_payroll->deduction_exemptions->Visible) { // deduction_exemptions ?>
	<tr id="r_deduction_exemptions">
		<td class="<?php echo $employees_payroll_view->TableLeftColumnClass ?>"><span id="elh_employees_payroll_deduction_exemptions"><?php echo $employees_payroll->deduction_exemptions->caption() ?></span></td>
		<td data-name="deduction_exemptions"<?php echo $employees_payroll->deduction_exemptions->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_exemptions">
<span<?php echo $employees_payroll->deduction_exemptions->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_exemptions->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_payroll->deduction_allowed->Visible) { // deduction_allowed ?>
	<tr id="r_deduction_allowed">
		<td class="<?php echo $employees_payroll_view->TableLeftColumnClass ?>"><span id="elh_employees_payroll_deduction_allowed"><?php echo $employees_payroll->deduction_allowed->caption() ?></span></td>
		<td data-name="deduction_allowed"<?php echo $employees_payroll->deduction_allowed->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_allowed">
<span<?php echo $employees_payroll->deduction_allowed->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_allowed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employees_payroll->deduction_group->Visible) { // deduction_group ?>
	<tr id="r_deduction_group">
		<td class="<?php echo $employees_payroll_view->TableLeftColumnClass ?>"><span id="elh_employees_payroll_deduction_group"><?php echo $employees_payroll->deduction_group->caption() ?></span></td>
		<td data-name="deduction_group"<?php echo $employees_payroll->deduction_group->cellAttributes() ?>>
<span id="el_employees_payroll_deduction_group">
<span<?php echo $employees_payroll->deduction_group->viewAttributes() ?>>
<?php echo $employees_payroll->deduction_group->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employees_payroll_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employees_payroll->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employees_payroll_view->terminate();
?>