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
$employee_attendance_view = new employee_attendance_view();

// Run the page
$employee_attendance_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_attendance_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_attendance->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_attendanceview = currentForm = new ew.Form("femployee_attendanceview", "view");

// Form_CustomValidate event
femployee_attendanceview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendanceview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_attendance->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_attendance_view->ExportOptions->render("body") ?>
<?php $employee_attendance_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_attendance_view->showPageHeader(); ?>
<?php
$employee_attendance_view->showMessage();
?>
<form name="femployee_attendanceview" id="femployee_attendanceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_attendance_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_attendance_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_attendance">
<input type="hidden" name="modal" value="<?php echo (int)$employee_attendance_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_attendance->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_attendance_view->TableLeftColumnClass ?>"><span id="elh_employee_attendance_id"><?php echo $employee_attendance->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_attendance->id->cellAttributes() ?>>
<span id="el_employee_attendance_id">
<span<?php echo $employee_attendance->id->viewAttributes() ?>>
<?php echo $employee_attendance->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendance->employee->Visible) { // employee ?>
	<tr id="r_employee">
		<td class="<?php echo $employee_attendance_view->TableLeftColumnClass ?>"><span id="elh_employee_attendance_employee"><?php echo $employee_attendance->employee->caption() ?></span></td>
		<td data-name="employee"<?php echo $employee_attendance->employee->cellAttributes() ?>>
<span id="el_employee_attendance_employee">
<span<?php echo $employee_attendance->employee->viewAttributes() ?>>
<?php echo $employee_attendance->employee->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendance->in_time->Visible) { // in_time ?>
	<tr id="r_in_time">
		<td class="<?php echo $employee_attendance_view->TableLeftColumnClass ?>"><span id="elh_employee_attendance_in_time"><?php echo $employee_attendance->in_time->caption() ?></span></td>
		<td data-name="in_time"<?php echo $employee_attendance->in_time->cellAttributes() ?>>
<span id="el_employee_attendance_in_time">
<span<?php echo $employee_attendance->in_time->viewAttributes() ?>>
<?php echo $employee_attendance->in_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendance->out_time->Visible) { // out_time ?>
	<tr id="r_out_time">
		<td class="<?php echo $employee_attendance_view->TableLeftColumnClass ?>"><span id="elh_employee_attendance_out_time"><?php echo $employee_attendance->out_time->caption() ?></span></td>
		<td data-name="out_time"<?php echo $employee_attendance->out_time->cellAttributes() ?>>
<span id="el_employee_attendance_out_time">
<span<?php echo $employee_attendance->out_time->viewAttributes() ?>>
<?php echo $employee_attendance->out_time->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_attendance->note->Visible) { // note ?>
	<tr id="r_note">
		<td class="<?php echo $employee_attendance_view->TableLeftColumnClass ?>"><span id="elh_employee_attendance_note"><?php echo $employee_attendance->note->caption() ?></span></td>
		<td data-name="note"<?php echo $employee_attendance->note->cellAttributes() ?>>
<span id="el_employee_attendance_note">
<span<?php echo $employee_attendance->note->viewAttributes() ?>>
<?php echo $employee_attendance->note->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_attendance_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_attendance->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_attendance_view->terminate();
?>