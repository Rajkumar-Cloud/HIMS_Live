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
$employee_attendance_delete = new employee_attendance_delete();

// Run the page
$employee_attendance_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_attendance_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_attendancedelete = currentForm = new ew.Form("femployee_attendancedelete", "delete");

// Form_CustomValidate event
femployee_attendancedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendancedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_attendance_delete->showPageHeader(); ?>
<?php
$employee_attendance_delete->showMessage();
?>
<form name="femployee_attendancedelete" id="femployee_attendancedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_attendance_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_attendance_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_attendance">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_attendance_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_attendance->id->Visible) { // id ?>
		<th class="<?php echo $employee_attendance->id->headerCellClass() ?>"><span id="elh_employee_attendance_id" class="employee_attendance_id"><?php echo $employee_attendance->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_attendance->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_attendance->employee->headerCellClass() ?>"><span id="elh_employee_attendance_employee" class="employee_attendance_employee"><?php echo $employee_attendance->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_attendance->in_time->Visible) { // in_time ?>
		<th class="<?php echo $employee_attendance->in_time->headerCellClass() ?>"><span id="elh_employee_attendance_in_time" class="employee_attendance_in_time"><?php echo $employee_attendance->in_time->caption() ?></span></th>
<?php } ?>
<?php if ($employee_attendance->out_time->Visible) { // out_time ?>
		<th class="<?php echo $employee_attendance->out_time->headerCellClass() ?>"><span id="elh_employee_attendance_out_time" class="employee_attendance_out_time"><?php echo $employee_attendance->out_time->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_attendance_delete->RecCnt = 0;
$i = 0;
while (!$employee_attendance_delete->Recordset->EOF) {
	$employee_attendance_delete->RecCnt++;
	$employee_attendance_delete->RowCnt++;

	// Set row properties
	$employee_attendance->resetAttributes();
	$employee_attendance->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_attendance_delete->loadRowValues($employee_attendance_delete->Recordset);

	// Render row
	$employee_attendance_delete->renderRow();
?>
	<tr<?php echo $employee_attendance->rowAttributes() ?>>
<?php if ($employee_attendance->id->Visible) { // id ?>
		<td<?php echo $employee_attendance->id->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_delete->RowCnt ?>_employee_attendance_id" class="employee_attendance_id">
<span<?php echo $employee_attendance->id->viewAttributes() ?>>
<?php echo $employee_attendance->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_attendance->employee->Visible) { // employee ?>
		<td<?php echo $employee_attendance->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_delete->RowCnt ?>_employee_attendance_employee" class="employee_attendance_employee">
<span<?php echo $employee_attendance->employee->viewAttributes() ?>>
<?php echo $employee_attendance->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_attendance->in_time->Visible) { // in_time ?>
		<td<?php echo $employee_attendance->in_time->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_delete->RowCnt ?>_employee_attendance_in_time" class="employee_attendance_in_time">
<span<?php echo $employee_attendance->in_time->viewAttributes() ?>>
<?php echo $employee_attendance->in_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_attendance->out_time->Visible) { // out_time ?>
		<td<?php echo $employee_attendance->out_time->cellAttributes() ?>>
<span id="el<?php echo $employee_attendance_delete->RowCnt ?>_employee_attendance_out_time" class="employee_attendance_out_time">
<span<?php echo $employee_attendance->out_time->viewAttributes() ?>>
<?php echo $employee_attendance->out_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_attendance_delete->Recordset->moveNext();
}
$employee_attendance_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_attendance_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_attendance_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_attendance_delete->terminate();
?>