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
$employee_salary_view = new employee_salary_view();

// Run the page
$employee_salary_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_salary_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_salary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_salaryview = currentForm = new ew.Form("femployee_salaryview", "view");

// Form_CustomValidate event
femployee_salaryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_salaryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_salaryview.lists["x_pay_frequency"] = <?php echo $employee_salary_view->pay_frequency->Lookup->toClientList() ?>;
femployee_salaryview.lists["x_pay_frequency"].options = <?php echo JsonEncode($employee_salary_view->pay_frequency->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_salary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_salary_view->ExportOptions->render("body") ?>
<?php $employee_salary_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_salary_view->showPageHeader(); ?>
<?php
$employee_salary_view->showMessage();
?>
<form name="femployee_salaryview" id="femployee_salaryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_salary_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_salary_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_salary">
<input type="hidden" name="modal" value="<?php echo (int)$employee_salary_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_salary->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_salary_view->TableLeftColumnClass ?>"><span id="elh_employee_salary_id"><?php echo $employee_salary->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_salary->id->cellAttributes() ?>>
<span id="el_employee_salary_id">
<span<?php echo $employee_salary->id->viewAttributes() ?>>
<?php echo $employee_salary->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_salary->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_salary_view->TableLeftColumnClass ?>"><span id="elh_employee_salary_employee"><?php echo $employee_salary->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_salary->employee->cellAttributes() ?>>
<span id="el_employee_salary_employee">
<span<?php echo $employee_salary->employee->viewAttributes() ?>>
<?php echo $employee_salary->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_salary->component->Visible) { // component ?>
	<tr id="r_component">
		<td class="<?php echo $employee_salary_view->TableLeftColumnClass ?>"><span id="elh_employee_salary_component"><?php echo $employee_salary->component->caption() ?></span></td>
		<td data-name="component"<?php echo $employee_salary->component->cellAttributes() ?>>
<span id="el_employee_salary_component">
<span<?php echo $employee_salary->component->viewAttributes() ?>>
<?php echo $employee_salary->component->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_salary->pay_frequency->Visible) { // pay_frequency ?>
	<tr id="r_pay_frequency">
		<td class="<?php echo $employee_salary_view->TableLeftColumnClass ?>"><span id="elh_employee_salary_pay_frequency"><?php echo $employee_salary->pay_frequency->caption() ?></span></td>
		<td data-name="pay_frequency"<?php echo $employee_salary->pay_frequency->cellAttributes() ?>>
<span id="el_employee_salary_pay_frequency">
<span<?php echo $employee_salary->pay_frequency->viewAttributes() ?>>
<?php echo $employee_salary->pay_frequency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_salary->currency->Visible) { // currency ?>
	<tr id="r_currency">
		<td class="<?php echo $employee_salary_view->TableLeftColumnClass ?>"><span id="elh_employee_salary_currency"><?php echo $employee_salary->currency->caption() ?></span></td>
		<td data-name="currency"<?php echo $employee_salary->currency->cellAttributes() ?>>
<span id="el_employee_salary_currency">
<span<?php echo $employee_salary->currency->viewAttributes() ?>>
<?php echo $employee_salary->currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_salary->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $employee_salary_view->TableLeftColumnClass ?>"><span id="elh_employee_salary_amount"><?php echo $employee_salary->amount->caption() ?></span></td>
		<td data-name="amount"<?php echo $employee_salary->amount->cellAttributes() ?>>
<span id="el_employee_salary_amount">
<span<?php echo $employee_salary->amount->viewAttributes() ?>>
<?php echo $employee_salary->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_salary->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_salary_view->TableLeftColumnClass ?>"><span id="elh_employee_salary_details"><?php echo $employee_salary->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_salary->details->cellAttributes() ?>>
<span id="el_employee_salary_details">
<span<?php echo $employee_salary->details->viewAttributes() ?>>
<?php echo $employee_salary->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_salary_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_salary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_salary_view->terminate();
?>