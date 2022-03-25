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
$employee_timesheets_delete = new employee_timesheets_delete();

// Run the page
$employee_timesheets_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timesheets_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_timesheetsdelete = currentForm = new ew.Form("femployee_timesheetsdelete", "delete");

// Form_CustomValidate event
femployee_timesheetsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timesheetsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timesheetsdelete.lists["x_status"] = <?php echo $employee_timesheets_delete->status->Lookup->toClientList() ?>;
femployee_timesheetsdelete.lists["x_status"].options = <?php echo JsonEncode($employee_timesheets_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_timesheets_delete->showPageHeader(); ?>
<?php
$employee_timesheets_delete->showMessage();
?>
<form name="femployee_timesheetsdelete" id="femployee_timesheetsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timesheets_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timesheets_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timesheets">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_timesheets_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_timesheets->id->Visible) { // id ?>
		<th class="<?php echo $employee_timesheets->id->headerCellClass() ?>"><span id="elh_employee_timesheets_id" class="employee_timesheets_id"><?php echo $employee_timesheets->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timesheets->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_timesheets->employee->headerCellClass() ?>"><span id="elh_employee_timesheets_employee" class="employee_timesheets_employee"><?php echo $employee_timesheets->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timesheets->date_start->Visible) { // date_start ?>
		<th class="<?php echo $employee_timesheets->date_start->headerCellClass() ?>"><span id="elh_employee_timesheets_date_start" class="employee_timesheets_date_start"><?php echo $employee_timesheets->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timesheets->date_end->Visible) { // date_end ?>
		<th class="<?php echo $employee_timesheets->date_end->headerCellClass() ?>"><span id="elh_employee_timesheets_date_end" class="employee_timesheets_date_end"><?php echo $employee_timesheets->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timesheets->status->Visible) { // status ?>
		<th class="<?php echo $employee_timesheets->status->headerCellClass() ?>"><span id="elh_employee_timesheets_status" class="employee_timesheets_status"><?php echo $employee_timesheets->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_timesheets_delete->RecCnt = 0;
$i = 0;
while (!$employee_timesheets_delete->Recordset->EOF) {
	$employee_timesheets_delete->RecCnt++;
	$employee_timesheets_delete->RowCnt++;

	// Set row properties
	$employee_timesheets->resetAttributes();
	$employee_timesheets->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_timesheets_delete->loadRowValues($employee_timesheets_delete->Recordset);

	// Render row
	$employee_timesheets_delete->renderRow();
?>
	<tr<?php echo $employee_timesheets->rowAttributes() ?>>
<?php if ($employee_timesheets->id->Visible) { // id ?>
		<td<?php echo $employee_timesheets->id->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_delete->RowCnt ?>_employee_timesheets_id" class="employee_timesheets_id">
<span<?php echo $employee_timesheets->id->viewAttributes() ?>>
<?php echo $employee_timesheets->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timesheets->employee->Visible) { // employee ?>
		<td<?php echo $employee_timesheets->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_delete->RowCnt ?>_employee_timesheets_employee" class="employee_timesheets_employee">
<span<?php echo $employee_timesheets->employee->viewAttributes() ?>>
<?php echo $employee_timesheets->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timesheets->date_start->Visible) { // date_start ?>
		<td<?php echo $employee_timesheets->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_delete->RowCnt ?>_employee_timesheets_date_start" class="employee_timesheets_date_start">
<span<?php echo $employee_timesheets->date_start->viewAttributes() ?>>
<?php echo $employee_timesheets->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timesheets->date_end->Visible) { // date_end ?>
		<td<?php echo $employee_timesheets->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_delete->RowCnt ?>_employee_timesheets_date_end" class="employee_timesheets_date_end">
<span<?php echo $employee_timesheets->date_end->viewAttributes() ?>>
<?php echo $employee_timesheets->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timesheets->status->Visible) { // status ?>
		<td<?php echo $employee_timesheets->status->cellAttributes() ?>>
<span id="el<?php echo $employee_timesheets_delete->RowCnt ?>_employee_timesheets_status" class="employee_timesheets_status">
<span<?php echo $employee_timesheets->status->viewAttributes() ?>>
<?php echo $employee_timesheets->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_timesheets_delete->Recordset->moveNext();
}
$employee_timesheets_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_timesheets_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_timesheets_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_timesheets_delete->terminate();
?>