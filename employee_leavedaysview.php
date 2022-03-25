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
$employee_leavedays_view = new employee_leavedays_view();

// Run the page
$employee_leavedays_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leavedays_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_leavedays->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_leavedaysview = currentForm = new ew.Form("femployee_leavedaysview", "view");

// Form_CustomValidate event
femployee_leavedaysview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavedaysview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavedaysview.lists["x_leave_type"] = <?php echo $employee_leavedays_view->leave_type->Lookup->toClientList() ?>;
femployee_leavedaysview.lists["x_leave_type"].options = <?php echo JsonEncode($employee_leavedays_view->leave_type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_leavedays->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_leavedays_view->ExportOptions->render("body") ?>
<?php $employee_leavedays_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_leavedays_view->showPageHeader(); ?>
<?php
$employee_leavedays_view->showMessage();
?>
<form name="femployee_leavedaysview" id="femployee_leavedaysview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leavedays_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leavedays_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leavedays">
<input type="hidden" name="modal" value="<?php echo (int)$employee_leavedays_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_leavedays->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_leavedays_view->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_id"><?php echo $employee_leavedays->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_leavedays->id->cellAttributes() ?>>
<span id="el_employee_leavedays_id">
<span<?php echo $employee_leavedays->id->viewAttributes() ?>>
<?php echo $employee_leavedays->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leavedays->employee_leave->Visible) { // employee_leave ?>
	<tr id="r_employee_leave">
		<td class="<?php echo $employee_leavedays_view->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_employee_leave"><?php echo $employee_leavedays->employee_leave->caption() ?></span></td>
		<td data-name="employee_leave"<?php echo $employee_leavedays->employee_leave->cellAttributes() ?>>
<span id="el_employee_leavedays_employee_leave">
<span<?php echo $employee_leavedays->employee_leave->viewAttributes() ?>>
<?php echo $employee_leavedays->employee_leave->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leavedays->leave_date->Visible) { // leave_date ?>
	<tr id="r_leave_date">
		<td class="<?php echo $employee_leavedays_view->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_leave_date"><?php echo $employee_leavedays->leave_date->caption() ?></span></td>
		<td data-name="leave_date"<?php echo $employee_leavedays->leave_date->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_date">
<span<?php echo $employee_leavedays->leave_date->viewAttributes() ?>>
<?php echo $employee_leavedays->leave_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_leavedays->leave_type->Visible) { // leave_type ?>
	<tr id="r_leave_type">
		<td class="<?php echo $employee_leavedays_view->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_leave_type"><?php echo $employee_leavedays->leave_type->caption() ?></span></td>
		<td data-name="leave_type"<?php echo $employee_leavedays->leave_type->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_type">
<span<?php echo $employee_leavedays->leave_type->viewAttributes() ?>>
<?php echo $employee_leavedays->leave_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_leavedays_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_leavedays->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_leavedays_view->terminate();
?>