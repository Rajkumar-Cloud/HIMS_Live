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
$employee_leaves_delete = new employee_leaves_delete();

// Run the page
$employee_leaves_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leaves_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_leavesdelete = currentForm = new ew.Form("femployee_leavesdelete", "delete");

// Form_CustomValidate event
femployee_leavesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavesdelete.lists["x_status"] = <?php echo $employee_leaves_delete->status->Lookup->toClientList() ?>;
femployee_leavesdelete.lists["x_status"].options = <?php echo JsonEncode($employee_leaves_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_leaves_delete->showPageHeader(); ?>
<?php
$employee_leaves_delete->showMessage();
?>
<form name="femployee_leavesdelete" id="femployee_leavesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leaves_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leaves_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leaves">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_leaves_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_leaves->id->Visible) { // id ?>
		<th class="<?php echo $employee_leaves->id->headerCellClass() ?>"><span id="elh_employee_leaves_id" class="employee_leaves_id"><?php echo $employee_leaves->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leaves->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_leaves->employee->headerCellClass() ?>"><span id="elh_employee_leaves_employee" class="employee_leaves_employee"><?php echo $employee_leaves->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leaves->leave_type->Visible) { // leave_type ?>
		<th class="<?php echo $employee_leaves->leave_type->headerCellClass() ?>"><span id="elh_employee_leaves_leave_type" class="employee_leaves_leave_type"><?php echo $employee_leaves->leave_type->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leaves->leave_period->Visible) { // leave_period ?>
		<th class="<?php echo $employee_leaves->leave_period->headerCellClass() ?>"><span id="elh_employee_leaves_leave_period" class="employee_leaves_leave_period"><?php echo $employee_leaves->leave_period->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leaves->date_start->Visible) { // date_start ?>
		<th class="<?php echo $employee_leaves->date_start->headerCellClass() ?>"><span id="elh_employee_leaves_date_start" class="employee_leaves_date_start"><?php echo $employee_leaves->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leaves->date_end->Visible) { // date_end ?>
		<th class="<?php echo $employee_leaves->date_end->headerCellClass() ?>"><span id="elh_employee_leaves_date_end" class="employee_leaves_date_end"><?php echo $employee_leaves->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leaves->status->Visible) { // status ?>
		<th class="<?php echo $employee_leaves->status->headerCellClass() ?>"><span id="elh_employee_leaves_status" class="employee_leaves_status"><?php echo $employee_leaves->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leaves->attachment->Visible) { // attachment ?>
		<th class="<?php echo $employee_leaves->attachment->headerCellClass() ?>"><span id="elh_employee_leaves_attachment" class="employee_leaves_attachment"><?php echo $employee_leaves->attachment->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_leaves_delete->RecCnt = 0;
$i = 0;
while (!$employee_leaves_delete->Recordset->EOF) {
	$employee_leaves_delete->RecCnt++;
	$employee_leaves_delete->RowCnt++;

	// Set row properties
	$employee_leaves->resetAttributes();
	$employee_leaves->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_leaves_delete->loadRowValues($employee_leaves_delete->Recordset);

	// Render row
	$employee_leaves_delete->renderRow();
?>
	<tr<?php echo $employee_leaves->rowAttributes() ?>>
<?php if ($employee_leaves->id->Visible) { // id ?>
		<td<?php echo $employee_leaves->id->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_id" class="employee_leaves_id">
<span<?php echo $employee_leaves->id->viewAttributes() ?>>
<?php echo $employee_leaves->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leaves->employee->Visible) { // employee ?>
		<td<?php echo $employee_leaves->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_employee" class="employee_leaves_employee">
<span<?php echo $employee_leaves->employee->viewAttributes() ?>>
<?php echo $employee_leaves->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leaves->leave_type->Visible) { // leave_type ?>
		<td<?php echo $employee_leaves->leave_type->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_leave_type" class="employee_leaves_leave_type">
<span<?php echo $employee_leaves->leave_type->viewAttributes() ?>>
<?php echo $employee_leaves->leave_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leaves->leave_period->Visible) { // leave_period ?>
		<td<?php echo $employee_leaves->leave_period->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_leave_period" class="employee_leaves_leave_period">
<span<?php echo $employee_leaves->leave_period->viewAttributes() ?>>
<?php echo $employee_leaves->leave_period->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leaves->date_start->Visible) { // date_start ?>
		<td<?php echo $employee_leaves->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_date_start" class="employee_leaves_date_start">
<span<?php echo $employee_leaves->date_start->viewAttributes() ?>>
<?php echo $employee_leaves->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leaves->date_end->Visible) { // date_end ?>
		<td<?php echo $employee_leaves->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_date_end" class="employee_leaves_date_end">
<span<?php echo $employee_leaves->date_end->viewAttributes() ?>>
<?php echo $employee_leaves->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leaves->status->Visible) { // status ?>
		<td<?php echo $employee_leaves->status->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_status" class="employee_leaves_status">
<span<?php echo $employee_leaves->status->viewAttributes() ?>>
<?php echo $employee_leaves->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leaves->attachment->Visible) { // attachment ?>
		<td<?php echo $employee_leaves->attachment->cellAttributes() ?>>
<span id="el<?php echo $employee_leaves_delete->RowCnt ?>_employee_leaves_attachment" class="employee_leaves_attachment">
<span<?php echo $employee_leaves->attachment->viewAttributes() ?>>
<?php echo $employee_leaves->attachment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_leaves_delete->Recordset->moveNext();
}
$employee_leaves_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_leaves_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_leaves_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_leaves_delete->terminate();
?>