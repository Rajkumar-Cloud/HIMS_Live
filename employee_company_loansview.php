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
$employee_company_loans_view = new employee_company_loans_view();

// Run the page
$employee_company_loans_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_company_loans_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_company_loans->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_company_loansview = currentForm = new ew.Form("femployee_company_loansview", "view");

// Form_CustomValidate event
femployee_company_loansview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_company_loansview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_company_loansview.lists["x_status"] = <?php echo $employee_company_loans_view->status->Lookup->toClientList() ?>;
femployee_company_loansview.lists["x_status"].options = <?php echo JsonEncode($employee_company_loans_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_company_loans->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_company_loans_view->ExportOptions->render("body") ?>
<?php $employee_company_loans_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_company_loans_view->showPageHeader(); ?>
<?php
$employee_company_loans_view->showMessage();
?>
<form name="femployee_company_loansview" id="femployee_company_loansview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_company_loans_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_company_loans_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_company_loans">
<input type="hidden" name="modal" value="<?php echo (int)$employee_company_loans_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_company_loans->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_id"><?php echo $employee_company_loans->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_company_loans->id->cellAttributes() ?>>
<span id="el_employee_company_loans_id">
<span<?php echo $employee_company_loans->id->viewAttributes() ?>>
<?php echo $employee_company_loans->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_employee"><?php echo $employee_company_loans->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_company_loans->employee->cellAttributes() ?>>
<span id="el_employee_company_loans_employee">
<span<?php echo $employee_company_loans->employee->viewAttributes() ?>>
<?php echo $employee_company_loans->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->loan->Visible) { // loan ?>
	<tr id="r_loan">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_loan"><?php echo $employee_company_loans->loan->caption() ?></span></td>
		<td data-name="loan"<?php echo $employee_company_loans->loan->cellAttributes() ?>>
<span id="el_employee_company_loans_loan">
<span<?php echo $employee_company_loans->loan->viewAttributes() ?>>
<?php echo $employee_company_loans->loan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->start_date->Visible) { // start_date ?>
	<tr id="r_start_date">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_start_date"><?php echo $employee_company_loans->start_date->caption() ?></span></td>
		<td data-name="start_date"<?php echo $employee_company_loans->start_date->cellAttributes() ?>>
<span id="el_employee_company_loans_start_date">
<span<?php echo $employee_company_loans->start_date->viewAttributes() ?>>
<?php echo $employee_company_loans->start_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->last_installment_date->Visible) { // last_installment_date ?>
	<tr id="r_last_installment_date">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_last_installment_date"><?php echo $employee_company_loans->last_installment_date->caption() ?></span></td>
		<td data-name="last_installment_date"<?php echo $employee_company_loans->last_installment_date->cellAttributes() ?>>
<span id="el_employee_company_loans_last_installment_date">
<span<?php echo $employee_company_loans->last_installment_date->viewAttributes() ?>>
<?php echo $employee_company_loans->last_installment_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->period_months->Visible) { // period_months ?>
	<tr id="r_period_months">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_period_months"><?php echo $employee_company_loans->period_months->caption() ?></span></td>
		<td data-name="period_months"<?php echo $employee_company_loans->period_months->cellAttributes() ?>>
<span id="el_employee_company_loans_period_months">
<span<?php echo $employee_company_loans->period_months->viewAttributes() ?>>
<?php echo $employee_company_loans->period_months->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->currency->Visible) { // currency ?>
	<tr id="r_currency">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_currency"><?php echo $employee_company_loans->currency->caption() ?></span></td>
		<td data-name="currency"<?php echo $employee_company_loans->currency->cellAttributes() ?>>
<span id="el_employee_company_loans_currency">
<span<?php echo $employee_company_loans->currency->viewAttributes() ?>>
<?php echo $employee_company_loans->currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_amount"><?php echo $employee_company_loans->amount->caption() ?></span></td>
		<td data-name="amount"<?php echo $employee_company_loans->amount->cellAttributes() ?>>
<span id="el_employee_company_loans_amount">
<span<?php echo $employee_company_loans->amount->viewAttributes() ?>>
<?php echo $employee_company_loans->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->monthly_installment->Visible) { // monthly_installment ?>
	<tr id="r_monthly_installment">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_monthly_installment"><?php echo $employee_company_loans->monthly_installment->caption() ?></span></td>
		<td data-name="monthly_installment"<?php echo $employee_company_loans->monthly_installment->cellAttributes() ?>>
<span id="el_employee_company_loans_monthly_installment">
<span<?php echo $employee_company_loans->monthly_installment->viewAttributes() ?>>
<?php echo $employee_company_loans->monthly_installment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_status"><?php echo $employee_company_loans->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_company_loans->status->cellAttributes() ?>>
<span id="el_employee_company_loans_status">
<span<?php echo $employee_company_loans->status->viewAttributes() ?>>
<?php echo $employee_company_loans->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_company_loans->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_company_loans_view->TableLeftColumnClass ?>"><span id="elh_employee_company_loans_details"><?php echo $employee_company_loans->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_company_loans->details->cellAttributes() ?>>
<span id="el_employee_company_loans_details">
<span<?php echo $employee_company_loans->details->viewAttributes() ?>>
<?php echo $employee_company_loans->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_company_loans_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_company_loans->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_company_loans_view->terminate();
?>