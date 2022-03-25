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
$employee_overtime_delete = new employee_overtime_delete();

// Run the page
$employee_overtime_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_overtime_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_overtimedelete = currentForm = new ew.Form("femployee_overtimedelete", "delete");

// Form_CustomValidate event
femployee_overtimedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_overtimedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_overtimedelete.lists["x_status"] = <?php echo $employee_overtime_delete->status->Lookup->toClientList() ?>;
femployee_overtimedelete.lists["x_status"].options = <?php echo JsonEncode($employee_overtime_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_overtime_delete->showPageHeader(); ?>
<?php
$employee_overtime_delete->showMessage();
?>
<form name="femployee_overtimedelete" id="femployee_overtimedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_overtime_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_overtime_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_overtime">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_overtime_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_overtime->id->Visible) { // id ?>
		<th class="<?php echo $employee_overtime->id->headerCellClass() ?>"><span id="elh_employee_overtime_id" class="employee_overtime_id"><?php echo $employee_overtime->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_overtime->employee->headerCellClass() ?>"><span id="elh_employee_overtime_employee" class="employee_overtime_employee"><?php echo $employee_overtime->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->start_time->Visible) { // start_time ?>
		<th class="<?php echo $employee_overtime->start_time->headerCellClass() ?>"><span id="elh_employee_overtime_start_time" class="employee_overtime_start_time"><?php echo $employee_overtime->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->end_time->Visible) { // end_time ?>
		<th class="<?php echo $employee_overtime->end_time->headerCellClass() ?>"><span id="elh_employee_overtime_end_time" class="employee_overtime_end_time"><?php echo $employee_overtime->end_time->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->category->Visible) { // category ?>
		<th class="<?php echo $employee_overtime->category->headerCellClass() ?>"><span id="elh_employee_overtime_category" class="employee_overtime_category"><?php echo $employee_overtime->category->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->project->Visible) { // project ?>
		<th class="<?php echo $employee_overtime->project->headerCellClass() ?>"><span id="elh_employee_overtime_project" class="employee_overtime_project"><?php echo $employee_overtime->project->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->created->Visible) { // created ?>
		<th class="<?php echo $employee_overtime->created->headerCellClass() ?>"><span id="elh_employee_overtime_created" class="employee_overtime_created"><?php echo $employee_overtime->created->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->updated->Visible) { // updated ?>
		<th class="<?php echo $employee_overtime->updated->headerCellClass() ?>"><span id="elh_employee_overtime_updated" class="employee_overtime_updated"><?php echo $employee_overtime->updated->caption() ?></span></th>
<?php } ?>
<?php if ($employee_overtime->status->Visible) { // status ?>
		<th class="<?php echo $employee_overtime->status->headerCellClass() ?>"><span id="elh_employee_overtime_status" class="employee_overtime_status"><?php echo $employee_overtime->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_overtime_delete->RecCnt = 0;
$i = 0;
while (!$employee_overtime_delete->Recordset->EOF) {
	$employee_overtime_delete->RecCnt++;
	$employee_overtime_delete->RowCnt++;

	// Set row properties
	$employee_overtime->resetAttributes();
	$employee_overtime->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_overtime_delete->loadRowValues($employee_overtime_delete->Recordset);

	// Render row
	$employee_overtime_delete->renderRow();
?>
	<tr<?php echo $employee_overtime->rowAttributes() ?>>
<?php if ($employee_overtime->id->Visible) { // id ?>
		<td<?php echo $employee_overtime->id->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_id" class="employee_overtime_id">
<span<?php echo $employee_overtime->id->viewAttributes() ?>>
<?php echo $employee_overtime->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->employee->Visible) { // employee ?>
		<td<?php echo $employee_overtime->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_employee" class="employee_overtime_employee">
<span<?php echo $employee_overtime->employee->viewAttributes() ?>>
<?php echo $employee_overtime->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->start_time->Visible) { // start_time ?>
		<td<?php echo $employee_overtime->start_time->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_start_time" class="employee_overtime_start_time">
<span<?php echo $employee_overtime->start_time->viewAttributes() ?>>
<?php echo $employee_overtime->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->end_time->Visible) { // end_time ?>
		<td<?php echo $employee_overtime->end_time->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_end_time" class="employee_overtime_end_time">
<span<?php echo $employee_overtime->end_time->viewAttributes() ?>>
<?php echo $employee_overtime->end_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->category->Visible) { // category ?>
		<td<?php echo $employee_overtime->category->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_category" class="employee_overtime_category">
<span<?php echo $employee_overtime->category->viewAttributes() ?>>
<?php echo $employee_overtime->category->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->project->Visible) { // project ?>
		<td<?php echo $employee_overtime->project->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_project" class="employee_overtime_project">
<span<?php echo $employee_overtime->project->viewAttributes() ?>>
<?php echo $employee_overtime->project->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->created->Visible) { // created ?>
		<td<?php echo $employee_overtime->created->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_created" class="employee_overtime_created">
<span<?php echo $employee_overtime->created->viewAttributes() ?>>
<?php echo $employee_overtime->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->updated->Visible) { // updated ?>
		<td<?php echo $employee_overtime->updated->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_updated" class="employee_overtime_updated">
<span<?php echo $employee_overtime->updated->viewAttributes() ?>>
<?php echo $employee_overtime->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_overtime->status->Visible) { // status ?>
		<td<?php echo $employee_overtime->status->cellAttributes() ?>>
<span id="el<?php echo $employee_overtime_delete->RowCnt ?>_employee_overtime_status" class="employee_overtime_status">
<span<?php echo $employee_overtime->status->viewAttributes() ?>>
<?php echo $employee_overtime->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_overtime_delete->Recordset->moveNext();
}
$employee_overtime_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_overtime_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_overtime_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_overtime_delete->terminate();
?>