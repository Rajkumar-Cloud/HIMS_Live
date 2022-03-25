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
$employee_overtime_view = new employee_overtime_view();

// Run the page
$employee_overtime_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_overtime_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_overtime->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_overtimeview = currentForm = new ew.Form("femployee_overtimeview", "view");

// Form_CustomValidate event
femployee_overtimeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_overtimeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_overtimeview.lists["x_status"] = <?php echo $employee_overtime_view->status->Lookup->toClientList() ?>;
femployee_overtimeview.lists["x_status"].options = <?php echo JsonEncode($employee_overtime_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_overtime->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_overtime_view->ExportOptions->render("body") ?>
<?php $employee_overtime_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_overtime_view->showPageHeader(); ?>
<?php
$employee_overtime_view->showMessage();
?>
<form name="femployee_overtimeview" id="femployee_overtimeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_overtime_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_overtime_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_overtime">
<input type="hidden" name="modal" value="<?php echo (int)$employee_overtime_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_overtime->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_id"><?php echo $employee_overtime->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_overtime->id->cellAttributes() ?>>
<span id="el_employee_overtime_id">
<span<?php echo $employee_overtime->id->viewAttributes() ?>>
<?php echo $employee_overtime->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_employee"><?php echo $employee_overtime->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_overtime->employee->cellAttributes() ?>>
<span id="el_employee_overtime_employee">
<span<?php echo $employee_overtime->employee->viewAttributes() ?>>
<?php echo $employee_overtime->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->start_time->Visible) { // start_time ?>
	<tr id="r_start_time">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_start_time"><?php echo $employee_overtime->start_time->caption() ?></span></td>
		<td data-name="start_time"<?php echo $employee_overtime->start_time->cellAttributes() ?>>
<span id="el_employee_overtime_start_time">
<span<?php echo $employee_overtime->start_time->viewAttributes() ?>>
<?php echo $employee_overtime->start_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->end_time->Visible) { // end_time ?>
	<tr id="r_end_time">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_end_time"><?php echo $employee_overtime->end_time->caption() ?></span></td>
		<td data-name="end_time"<?php echo $employee_overtime->end_time->cellAttributes() ?>>
<span id="el_employee_overtime_end_time">
<span<?php echo $employee_overtime->end_time->viewAttributes() ?>>
<?php echo $employee_overtime->end_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->category->Visible) { // category ?>
	<tr id="r_category">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_category"><?php echo $employee_overtime->category->caption() ?></span></td>
		<td data-name="category"<?php echo $employee_overtime->category->cellAttributes() ?>>
<span id="el_employee_overtime_category">
<span<?php echo $employee_overtime->category->viewAttributes() ?>>
<?php echo $employee_overtime->category->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->project->Visible) { // project ?>
	<tr id="r_project">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_project"><?php echo $employee_overtime->project->caption() ?></span></td>
		<td data-name="project"<?php echo $employee_overtime->project->cellAttributes() ?>>
<span id="el_employee_overtime_project">
<span<?php echo $employee_overtime->project->viewAttributes() ?>>
<?php echo $employee_overtime->project->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->notes->Visible) { // notes ?>
	<tr id="r_notes">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_notes"><?php echo $employee_overtime->notes->caption() ?></span></td>
		<td data-name="notes"<?php echo $employee_overtime->notes->cellAttributes() ?>>
<span id="el_employee_overtime_notes">
<span<?php echo $employee_overtime->notes->viewAttributes() ?>>
<?php echo $employee_overtime->notes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->created->Visible) { // created ?>
	<tr id="r_created">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_created"><?php echo $employee_overtime->created->caption() ?></span></td>
		<td data-name="created"<?php echo $employee_overtime->created->cellAttributes() ?>>
<span id="el_employee_overtime_created">
<span<?php echo $employee_overtime->created->viewAttributes() ?>>
<?php echo $employee_overtime->created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->updated->Visible) { // updated ?>
	<tr id="r_updated">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_updated"><?php echo $employee_overtime->updated->caption() ?></span></td>
		<td data-name="updated"<?php echo $employee_overtime->updated->cellAttributes() ?>>
<span id="el_employee_overtime_updated">
<span<?php echo $employee_overtime->updated->viewAttributes() ?>>
<?php echo $employee_overtime->updated->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_overtime->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_overtime_view->TableLeftColumnClass ?>"><span id="elh_employee_overtime_status"><?php echo $employee_overtime->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_overtime->status->cellAttributes() ?>>
<span id="el_employee_overtime_status">
<span<?php echo $employee_overtime->status->viewAttributes() ?>>
<?php echo $employee_overtime->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_overtime_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_overtime->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_overtime_view->terminate();
?>