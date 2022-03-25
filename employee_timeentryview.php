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
$employee_timeentry_view = new employee_timeentry_view();

// Run the page
$employee_timeentry_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timeentry_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_timeentry->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_timeentryview = currentForm = new ew.Form("femployee_timeentryview", "view");

// Form_CustomValidate event
femployee_timeentryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timeentryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timeentryview.lists["x_status"] = <?php echo $employee_timeentry_view->status->Lookup->toClientList() ?>;
femployee_timeentryview.lists["x_status"].options = <?php echo JsonEncode($employee_timeentry_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_timeentry->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_timeentry_view->ExportOptions->render("body") ?>
<?php $employee_timeentry_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_timeentry_view->showPageHeader(); ?>
<?php
$employee_timeentry_view->showMessage();
?>
<form name="femployee_timeentryview" id="femployee_timeentryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timeentry_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timeentry_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timeentry">
<input type="hidden" name="modal" value="<?php echo (int)$employee_timeentry_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_timeentry->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_id"><?php echo $employee_timeentry->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_timeentry->id->cellAttributes() ?>>
<span id="el_employee_timeentry_id">
<span<?php echo $employee_timeentry->id->viewAttributes() ?>>
<?php echo $employee_timeentry->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->project->Visible) { // project ?>
	<tr id="r_project">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_project"><?php echo $employee_timeentry->project->caption() ?></span></td>
		<td data-name="project"<?php echo $employee_timeentry->project->cellAttributes() ?>>
<span id="el_employee_timeentry_project">
<span<?php echo $employee_timeentry->project->viewAttributes() ?>>
<?php echo $employee_timeentry->project->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_employee"><?php echo $employee_timeentry->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_timeentry->employee->cellAttributes() ?>>
<span id="el_employee_timeentry_employee">
<span<?php echo $employee_timeentry->employee->viewAttributes() ?>>
<?php echo $employee_timeentry->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->timesheet->Visible) { // timesheet ?>
	<tr id="r_timesheet">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_timesheet"><?php echo $employee_timeentry->timesheet->caption() ?></span></td>
		<td data-name="timesheet"<?php echo $employee_timeentry->timesheet->cellAttributes() ?>>
<span id="el_employee_timeentry_timesheet">
<span<?php echo $employee_timeentry->timesheet->viewAttributes() ?>>
<?php echo $employee_timeentry->timesheet->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_details"><?php echo $employee_timeentry->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_timeentry->details->cellAttributes() ?>>
<span id="el_employee_timeentry_details">
<span<?php echo $employee_timeentry->details->viewAttributes() ?>>
<?php echo $employee_timeentry->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_created"><?php echo $employee_timeentry->created->caption() ?></span></td>
		<td data-name="created"<?php echo $employee_timeentry->created->cellAttributes() ?>>
<span id="el_employee_timeentry_created">
<span<?php echo $employee_timeentry->created->viewAttributes() ?>>
<?php echo $employee_timeentry->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->date_start->Visible) { // date_start ?>
	<tr id="r_date_start">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_date_start"><?php echo $employee_timeentry->date_start->caption() ?></span></td>
		<td data-name="date_start"<?php echo $employee_timeentry->date_start->cellAttributes() ?>>
<span id="el_employee_timeentry_date_start">
<span<?php echo $employee_timeentry->date_start->viewAttributes() ?>>
<?php echo $employee_timeentry->date_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->time_start->Visible) { // time_start ?>
	<tr id="r_time_start">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_time_start"><?php echo $employee_timeentry->time_start->caption() ?></span></td>
		<td data-name="time_start"<?php echo $employee_timeentry->time_start->cellAttributes() ?>>
<span id="el_employee_timeentry_time_start">
<span<?php echo $employee_timeentry->time_start->viewAttributes() ?>>
<?php echo $employee_timeentry->time_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->date_end->Visible) { // date_end ?>
	<tr id="r_date_end">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_date_end"><?php echo $employee_timeentry->date_end->caption() ?></span></td>
		<td data-name="date_end"<?php echo $employee_timeentry->date_end->cellAttributes() ?>>
<span id="el_employee_timeentry_date_end">
<span<?php echo $employee_timeentry->date_end->viewAttributes() ?>>
<?php echo $employee_timeentry->date_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->time_end->Visible) { // time_end ?>
	<tr id="r_time_end">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_time_end"><?php echo $employee_timeentry->time_end->caption() ?></span></td>
		<td data-name="time_end"<?php echo $employee_timeentry->time_end->cellAttributes() ?>>
<span id="el_employee_timeentry_time_end">
<span<?php echo $employee_timeentry->time_end->viewAttributes() ?>>
<?php echo $employee_timeentry->time_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_timeentry->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_timeentry_view->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_status"><?php echo $employee_timeentry->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_timeentry->status->cellAttributes() ?>>
<span id="el_employee_timeentry_status">
<span<?php echo $employee_timeentry->status->viewAttributes() ?>>
<?php echo $employee_timeentry->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_timeentry_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_timeentry->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_timeentry_view->terminate();
?>