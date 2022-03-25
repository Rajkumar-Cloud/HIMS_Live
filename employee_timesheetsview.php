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
$employee_timesheets_view = new employee_timesheets_view();

// Run the page
$employee_timesheets_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timesheets_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_timesheets->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_timesheetsview = currentForm = new ew.Form("femployee_timesheetsview", "view");

// Form_CustomValidate event
femployee_timesheetsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timesheetsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timesheetsview.lists["x_status"] = <?php echo $employee_timesheets_view->status->Lookup->toClientList() ?>;
femployee_timesheetsview.lists["x_status"].options = <?php echo JsonEncode($employee_timesheets_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_timesheets->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_timesheets_view->ExportOptions->render("body") ?>
<?php $employee_timesheets_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_timesheets_view->showPageHeader(); ?>
<?php
$employee_timesheets_view->showMessage();
?>
<form name="femployee_timesheetsview" id="femployee_timesheetsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timesheets_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timesheets_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timesheets">
<input type="hidden" name="modal" value="<?php echo (int)$employee_timesheets_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_timesheets->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_timesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_timesheets_id"><?php echo $employee_timesheets->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_timesheets->id->cellAttributes() ?>>
<span id="el_employee_timesheets_id">
<span<?php echo $employee_timesheets->id->viewAttributes() ?>>
<?php echo $employee_timesheets->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timesheets->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_timesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_timesheets_employee"><?php echo $employee_timesheets->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_timesheets->employee->cellAttributes() ?>>
<span id="el_employee_timesheets_employee">
<span<?php echo $employee_timesheets->employee->viewAttributes() ?>>
<?php echo $employee_timesheets->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timesheets->date_start->Visible) { // date_start ?>
	<tr id="r_date_start">
		<td class="<?php echo $employee_timesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_timesheets_date_start"><?php echo $employee_timesheets->date_start->caption() ?></span></td>
		<td data-name="date_start"<?php echo $employee_timesheets->date_start->cellAttributes() ?>>
<span id="el_employee_timesheets_date_start">
<span<?php echo $employee_timesheets->date_start->viewAttributes() ?>>
<?php echo $employee_timesheets->date_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timesheets->date_end->Visible) { // date_end ?>
	<tr id="r_date_end">
		<td class="<?php echo $employee_timesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_timesheets_date_end"><?php echo $employee_timesheets->date_end->caption() ?></span></td>
		<td data-name="date_end"<?php echo $employee_timesheets->date_end->cellAttributes() ?>>
<span id="el_employee_timesheets_date_end">
<span<?php echo $employee_timesheets->date_end->viewAttributes() ?>>
<?php echo $employee_timesheets->date_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timesheets->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_timesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_timesheets_status"><?php echo $employee_timesheets->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_timesheets->status->cellAttributes() ?>>
<span id="el_employee_timesheets_status">
<span<?php echo $employee_timesheets->status->viewAttributes() ?>>
<?php echo $employee_timesheets->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_timesheets_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_timesheets->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_timesheets_view->terminate();
?>