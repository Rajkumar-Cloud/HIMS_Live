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
$employee_attendancesheets_delete = new employee_attendancesheets_delete();

// Run the page
$employee_attendancesheets_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_attendancesheets_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_attendancesheetsdelete = currentForm = new ew.Form("femployee_attendancesheetsdelete", "delete");

// Form_CustomValidate event
femployee_attendancesheetsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_attendancesheetsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_attendancesheetsdelete.lists["x_status"] = <?php echo $employee_attendancesheets_delete->status->Lookup->toClientList() ?>;
femployee_attendancesheetsdelete.lists["x_status"].options = <?php echo JsonEncode($employee_attendancesheets_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_attendancesheets_delete->showPageHeader(); ?>
<?php
$employee_attendancesheets_delete->showMessage();
?>
<form name="femployee_attendancesheetsdelete" id="femployee_attendancesheetsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_attendancesheets_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_attendancesheets_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_attendancesheets">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_attendancesheets_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_attendancesheets->id->Visible) { // id ?>
		<th class="<?php echo $employee_attendancesheets->id->headerCellClass() ?>"><span id="elh_employee_attendancesheets_id" class="employee_attendancesheets_id"><?php echo $employee_attendancesheets->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_attendancesheets->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_attendancesheets->employee->headerCellClass() ?>"><span id="elh_employee_attendancesheets_employee" class="employee_attendancesheets_employee"><?php echo $employee_attendancesheets->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_attendancesheets->date_start->Visible) { // date_start ?>
		<th class="<?php echo $employee_attendancesheets->date_start->headerCellClass() ?>"><span id="elh_employee_attendancesheets_date_start" class="employee_attendancesheets_date_start"><?php echo $employee_attendancesheets->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_attendancesheets->date_end->Visible) { // date_end ?>
		<th class="<?php echo $employee_attendancesheets->date_end->headerCellClass() ?>"><span id="elh_employee_attendancesheets_date_end" class="employee_attendancesheets_date_end"><?php echo $employee_attendancesheets->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($employee_attendancesheets->status->Visible) { // status ?>
		<th class="<?php echo $employee_attendancesheets->status->headerCellClass() ?>"><span id="elh_employee_attendancesheets_status" class="employee_attendancesheets_status"><?php echo $employee_attendancesheets->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_attendancesheets_delete->RecCnt = 0;
$i = 0;
while (!$employee_attendancesheets_delete->Recordset->EOF) {
	$employee_attendancesheets_delete->RecCnt++;
	$employee_attendancesheets_delete->RowCnt++;

	// Set row properties
	$employee_attendancesheets->resetAttributes();
	$employee_attendancesheets->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_attendancesheets_delete->loadRowValues($employee_attendancesheets_delete->Recordset);

	// Render row
	$employee_attendancesheets_delete->renderRow();
?>
	<tr<?php echo $employee_attendancesheets->rowAttributes() ?>>
<?php if ($employee_attendancesheets->id->Visible) { // id ?>
		<td<?php echo $employee_attendancesheets->id->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_delete->RowCnt ?>_employee_attendancesheets_id" class="employee_attendancesheets_id">
<span<?php echo $employee_attendancesheets->id->viewAttributes() ?>>
<?php echo $employee_attendancesheets->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_attendancesheets->employee->Visible) { // employee ?>
		<td<?php echo $employee_attendancesheets->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_delete->RowCnt ?>_employee_attendancesheets_employee" class="employee_attendancesheets_employee">
<span<?php echo $employee_attendancesheets->employee->viewAttributes() ?>>
<?php echo $employee_attendancesheets->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_attendancesheets->date_start->Visible) { // date_start ?>
		<td<?php echo $employee_attendancesheets->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_delete->RowCnt ?>_employee_attendancesheets_date_start" class="employee_attendancesheets_date_start">
<span<?php echo $employee_attendancesheets->date_start->viewAttributes() ?>>
<?php echo $employee_attendancesheets->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_attendancesheets->date_end->Visible) { // date_end ?>
		<td<?php echo $employee_attendancesheets->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_delete->RowCnt ?>_employee_attendancesheets_date_end" class="employee_attendancesheets_date_end">
<span<?php echo $employee_attendancesheets->date_end->viewAttributes() ?>>
<?php echo $employee_attendancesheets->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_attendancesheets->status->Visible) { // status ?>
		<td<?php echo $employee_attendancesheets->status->cellAttributes() ?>>
<span id="el<?php echo $employee_attendancesheets_delete->RowCnt ?>_employee_attendancesheets_status" class="employee_attendancesheets_status">
<span<?php echo $employee_attendancesheets->status->viewAttributes() ?>>
<?php echo $employee_attendancesheets->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_attendancesheets_delete->Recordset->moveNext();
}
$employee_attendancesheets_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_attendancesheets_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_attendancesheets_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_attendancesheets_delete->terminate();
?>