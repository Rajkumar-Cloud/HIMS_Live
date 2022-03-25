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
$employee_leaves_view = new employee_leaves_view();

// Run the page
$employee_leaves_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leaves_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_leaves->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_leavesview = currentForm = new ew.Form("femployee_leavesview", "view");

// Form_CustomValidate event
femployee_leavesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavesview.lists["x_status"] = <?php echo $employee_leaves_view->status->Lookup->toClientList() ?>;
femployee_leavesview.lists["x_status"].options = <?php echo JsonEncode($employee_leaves_view->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_leaves->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_leaves_view->ExportOptions->render("body") ?>
<?php $employee_leaves_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_leaves_view->showPageHeader(); ?>
<?php
$employee_leaves_view->showMessage();
?>
<form name="femployee_leavesview" id="femployee_leavesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leaves_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leaves_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leaves">
<input type="hidden" name="modal" value="<?php echo (int)$employee_leaves_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_leaves->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_id"><?php echo $employee_leaves->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_leaves->id->cellAttributes() ?>>
<span id="el_employee_leaves_id">
<span<?php echo $employee_leaves->id->viewAttributes() ?>>
<?php echo $employee_leaves->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_employee"><?php echo $employee_leaves->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_leaves->employee->cellAttributes() ?>>
<span id="el_employee_leaves_employee">
<span<?php echo $employee_leaves->employee->viewAttributes() ?>>
<?php echo $employee_leaves->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->leave_type->Visible) { // leave_type ?>
	<tr id="r_leave_type">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_leave_type"><?php echo $employee_leaves->leave_type->caption() ?></span></td>
		<td data-name="leave_type"<?php echo $employee_leaves->leave_type->cellAttributes() ?>>
<span id="el_employee_leaves_leave_type">
<span<?php echo $employee_leaves->leave_type->viewAttributes() ?>>
<?php echo $employee_leaves->leave_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->leave_period->Visible) { // leave_period ?>
	<tr id="r_leave_period">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_leave_period"><?php echo $employee_leaves->leave_period->caption() ?></span></td>
		<td data-name="leave_period"<?php echo $employee_leaves->leave_period->cellAttributes() ?>>
<span id="el_employee_leaves_leave_period">
<span<?php echo $employee_leaves->leave_period->viewAttributes() ?>>
<?php echo $employee_leaves->leave_period->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->date_start->Visible) { // date_start ?>
	<tr id="r_date_start">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_date_start"><?php echo $employee_leaves->date_start->caption() ?></span></td>
		<td data-name="date_start"<?php echo $employee_leaves->date_start->cellAttributes() ?>>
<span id="el_employee_leaves_date_start">
<span<?php echo $employee_leaves->date_start->viewAttributes() ?>>
<?php echo $employee_leaves->date_start->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->date_end->Visible) { // date_end ?>
	<tr id="r_date_end">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_date_end"><?php echo $employee_leaves->date_end->caption() ?></span></td>
		<td data-name="date_end"<?php echo $employee_leaves->date_end->cellAttributes() ?>>
<span id="el_employee_leaves_date_end">
<span<?php echo $employee_leaves->date_end->viewAttributes() ?>>
<?php echo $employee_leaves->date_end->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->details->Visible) { // details ?>
	<tr id="r_details">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_details"><?php echo $employee_leaves->details->caption() ?></span></td>
		<td data-name="details"<?php echo $employee_leaves->details->cellAttributes() ?>>
<span id="el_employee_leaves_details">
<span<?php echo $employee_leaves->details->viewAttributes() ?>>
<?php echo $employee_leaves->details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_status"><?php echo $employee_leaves->status->caption() ?></span></td>
		<td data-name="status"<?php echo $employee_leaves->status->cellAttributes() ?>>
<span id="el_employee_leaves_status">
<span<?php echo $employee_leaves->status->viewAttributes() ?>>
<?php echo $employee_leaves->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leaves->attachment->Visible) { // attachment ?>
	<tr id="r_attachment">
		<td class="<?php echo $employee_leaves_view->TableLeftColumnClass ?>"><span id="elh_employee_leaves_attachment"><?php echo $employee_leaves->attachment->caption() ?></span></td>
		<td data-name="attachment"<?php echo $employee_leaves->attachment->cellAttributes() ?>>
<span id="el_employee_leaves_attachment">
<span<?php echo $employee_leaves->attachment->viewAttributes() ?>>
<?php echo $employee_leaves->attachment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_leaves_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_leaves->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_leaves_view->terminate();
?>