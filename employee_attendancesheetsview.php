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
$employee_attendancesheets_view = new employee_attendancesheets_view();

// Run the page
$employee_attendancesheets_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_attendancesheets_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_attendancesheets->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_attendancesheetsview = currentForm = new ew.Form("femployee_attendancesheetsview", "view");

// Form_CustomValidate event
femployee_attendancesheetsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendancesheetsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_attendancesheetsview.lists["x_status"] = <?php echo $employee_attendancesheets_view->status->Lookup->toClientList() ?>;
femployee_attendancesheetsview.lists["x_status"].options = <?php echo JsonEncode($employee_attendancesheets_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_attendancesheets->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_attendancesheets_view->ExportOptions->render("body") ?>
<?php $employee_attendancesheets_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_attendancesheets_view->showPageHeader(); ?>
<?php
$employee_attendancesheets_view->showMessage();
?>
<form name="femployee_attendancesheetsview" id="femployee_attendancesheetsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_attendancesheets_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_attendancesheets_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_attendancesheets">
<input type="hidden" name="modal" value="<?php echo (int)$employee_attendancesheets_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_attendancesheets->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_attendancesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_attendancesheets_id"><?php echo $employee_attendancesheets->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_attendancesheets->id->cellAttributes() ?>>
<span id="el_employee_attendancesheets_id">
<span<?php echo $employee_attendancesheets->id->viewAttributes() ?>>
<?php echo $employee_attendancesheets->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendancesheets->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_attendancesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_attendancesheets_employee"><?php echo $employee_attendancesheets->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_attendancesheets->employee->cellAttributes() ?>>
<span id="el_employee_attendancesheets_employee">
<span<?php echo $employee_attendancesheets->employee->viewAttributes() ?>>
<?php echo $employee_attendancesheets->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendancesheets->date_start->Visible) { // date_start ?>
	<tr id="r_date_start">
		<td class="<?php echo $employee_attendancesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_attendancesheets_date_start"><?php echo $employee_attendancesheets->date_start->caption() ?></span></td>
		<td data-name="date_start"<?php echo $employee_attendancesheets->date_start->cellAttributes() ?>>
<span id="el_employee_attendancesheets_date_start">
<span<?php echo $employee_attendancesheets->date_start->viewAttributes() ?>>
<?php echo $employee_attendancesheets->date_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendancesheets->date_end->Visible) { // date_end ?>
	<tr id="r_date_end">
		<td class="<?php echo $employee_attendancesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_attendancesheets_date_end"><?php echo $employee_attendancesheets->date_end->caption() ?></span></td>
		<td data-name="date_end"<?php echo $employee_attendancesheets->date_end->cellAttributes() ?>>
<span id="el_employee_attendancesheets_date_end">
<span<?php echo $employee_attendancesheets->date_end->viewAttributes() ?>>
<?php echo $employee_attendancesheets->date_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendancesheets->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_attendancesheets_view->TableLeftColumnClass ?>"><span id="elh_employee_attendancesheets_status"><?php echo $employee_attendancesheets->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_attendancesheets->status->cellAttributes() ?>>
<span id="el_employee_attendancesheets_status">
<span<?php echo $employee_attendancesheets->status->viewAttributes() ?>>
<?php echo $employee_attendancesheets->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_attendancesheets_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_attendancesheets->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_attendancesheets_view->terminate();
?>