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
$employee_timeentry_delete = new employee_timeentry_delete();

// Run the page
$employee_timeentry_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_timeentry_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_timeentrydelete = currentForm = new ew.Form("femployee_timeentrydelete", "delete");

// Form_CustomValidate event
femployee_timeentrydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_timeentrydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_timeentrydelete.lists["x_status"] = <?php echo $employee_timeentry_delete->status->Lookup->toClientList() ?>;
femployee_timeentrydelete.lists["x_status"].options = <?php echo JsonEncode($employee_timeentry_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_timeentry_delete->showPageHeader(); ?>
<?php
$employee_timeentry_delete->showMessage();
?>
<form name="femployee_timeentrydelete" id="femployee_timeentrydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_timeentry_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_timeentry_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_timeentry">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_timeentry_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_timeentry->id->Visible) { // id ?>
		<th class="<?php echo $employee_timeentry->id->headerCellClass() ?>"><span id="elh_employee_timeentry_id" class="employee_timeentry_id"><?php echo $employee_timeentry->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->project->Visible) { // project ?>
		<th class="<?php echo $employee_timeentry->project->headerCellClass() ?>"><span id="elh_employee_timeentry_project" class="employee_timeentry_project"><?php echo $employee_timeentry->project->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_timeentry->employee->headerCellClass() ?>"><span id="elh_employee_timeentry_employee" class="employee_timeentry_employee"><?php echo $employee_timeentry->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->timesheet->Visible) { // timesheet ?>
		<th class="<?php echo $employee_timeentry->timesheet->headerCellClass() ?>"><span id="elh_employee_timeentry_timesheet" class="employee_timeentry_timesheet"><?php echo $employee_timeentry->timesheet->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->created->Visible) { // created ?>
		<th class="<?php echo $employee_timeentry->created->headerCellClass() ?>"><span id="elh_employee_timeentry_created" class="employee_timeentry_created"><?php echo $employee_timeentry->created->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->date_start->Visible) { // date_start ?>
		<th class="<?php echo $employee_timeentry->date_start->headerCellClass() ?>"><span id="elh_employee_timeentry_date_start" class="employee_timeentry_date_start"><?php echo $employee_timeentry->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->time_start->Visible) { // time_start ?>
		<th class="<?php echo $employee_timeentry->time_start->headerCellClass() ?>"><span id="elh_employee_timeentry_time_start" class="employee_timeentry_time_start"><?php echo $employee_timeentry->time_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->date_end->Visible) { // date_end ?>
		<th class="<?php echo $employee_timeentry->date_end->headerCellClass() ?>"><span id="elh_employee_timeentry_date_end" class="employee_timeentry_date_end"><?php echo $employee_timeentry->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->time_end->Visible) { // time_end ?>
		<th class="<?php echo $employee_timeentry->time_end->headerCellClass() ?>"><span id="elh_employee_timeentry_time_end" class="employee_timeentry_time_end"><?php echo $employee_timeentry->time_end->caption() ?></span></th>
<?php } ?>
<?php if ($employee_timeentry->status->Visible) { // status ?>
		<th class="<?php echo $employee_timeentry->status->headerCellClass() ?>"><span id="elh_employee_timeentry_status" class="employee_timeentry_status"><?php echo $employee_timeentry->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_timeentry_delete->RecCnt = 0;
$i = 0;
while (!$employee_timeentry_delete->Recordset->EOF) {
	$employee_timeentry_delete->RecCnt++;
	$employee_timeentry_delete->RowCnt++;

	// Set row properties
	$employee_timeentry->resetAttributes();
	$employee_timeentry->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_timeentry_delete->loadRowValues($employee_timeentry_delete->Recordset);

	// Render row
	$employee_timeentry_delete->renderRow();
?>
	<tr<?php echo $employee_timeentry->rowAttributes() ?>>
<?php if ($employee_timeentry->id->Visible) { // id ?>
		<td<?php echo $employee_timeentry->id->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_id" class="employee_timeentry_id">
<span<?php echo $employee_timeentry->id->viewAttributes() ?>>
<?php echo $employee_timeentry->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->project->Visible) { // project ?>
		<td<?php echo $employee_timeentry->project->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_project" class="employee_timeentry_project">
<span<?php echo $employee_timeentry->project->viewAttributes() ?>>
<?php echo $employee_timeentry->project->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->employee->Visible) { // employee ?>
		<td<?php echo $employee_timeentry->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_employee" class="employee_timeentry_employee">
<span<?php echo $employee_timeentry->employee->viewAttributes() ?>>
<?php echo $employee_timeentry->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->timesheet->Visible) { // timesheet ?>
		<td<?php echo $employee_timeentry->timesheet->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_timesheet" class="employee_timeentry_timesheet">
<span<?php echo $employee_timeentry->timesheet->viewAttributes() ?>>
<?php echo $employee_timeentry->timesheet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->created->Visible) { // created ?>
		<td<?php echo $employee_timeentry->created->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_created" class="employee_timeentry_created">
<span<?php echo $employee_timeentry->created->viewAttributes() ?>>
<?php echo $employee_timeentry->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->date_start->Visible) { // date_start ?>
		<td<?php echo $employee_timeentry->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_date_start" class="employee_timeentry_date_start">
<span<?php echo $employee_timeentry->date_start->viewAttributes() ?>>
<?php echo $employee_timeentry->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->time_start->Visible) { // time_start ?>
		<td<?php echo $employee_timeentry->time_start->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_time_start" class="employee_timeentry_time_start">
<span<?php echo $employee_timeentry->time_start->viewAttributes() ?>>
<?php echo $employee_timeentry->time_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->date_end->Visible) { // date_end ?>
		<td<?php echo $employee_timeentry->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_date_end" class="employee_timeentry_date_end">
<span<?php echo $employee_timeentry->date_end->viewAttributes() ?>>
<?php echo $employee_timeentry->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->time_end->Visible) { // time_end ?>
		<td<?php echo $employee_timeentry->time_end->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_time_end" class="employee_timeentry_time_end">
<span<?php echo $employee_timeentry->time_end->viewAttributes() ?>>
<?php echo $employee_timeentry->time_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_timeentry->status->Visible) { // status ?>
		<td<?php echo $employee_timeentry->status->cellAttributes() ?>>
<span id="el<?php echo $employee_timeentry_delete->RowCnt ?>_employee_timeentry_status" class="employee_timeentry_status">
<span<?php echo $employee_timeentry->status->viewAttributes() ?>>
<?php echo $employee_timeentry->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_timeentry_delete->Recordset->moveNext();
}
$employee_timeentry_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_timeentry_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_timeentry_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_timeentry_delete->terminate();
?>