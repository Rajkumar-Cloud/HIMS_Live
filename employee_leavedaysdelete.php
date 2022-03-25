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
$employee_leavedays_delete = new employee_leavedays_delete();

// Run the page
$employee_leavedays_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_leavedays_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_leavedaysdelete = currentForm = new ew.Form("femployee_leavedaysdelete", "delete");

// Form_CustomValidate event
femployee_leavedaysdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_leavedaysdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_leavedaysdelete.lists["x_leave_type"] = <?php echo $employee_leavedays_delete->leave_type->Lookup->toClientList() ?>;
femployee_leavedaysdelete.lists["x_leave_type"].options = <?php echo JsonEncode($employee_leavedays_delete->leave_type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_leavedays_delete->showPageHeader(); ?>
<?php
$employee_leavedays_delete->showMessage();
?>
<form name="femployee_leavedaysdelete" id="femployee_leavedaysdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_leavedays_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_leavedays_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_leavedays">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_leavedays_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_leavedays->id->Visible) { // id ?>
		<th class="<?php echo $employee_leavedays->id->headerCellClass() ?>"><span id="elh_employee_leavedays_id" class="employee_leavedays_id"><?php echo $employee_leavedays->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leavedays->employee_leave->Visible) { // employee_leave ?>
		<th class="<?php echo $employee_leavedays->employee_leave->headerCellClass() ?>"><span id="elh_employee_leavedays_employee_leave" class="employee_leavedays_employee_leave"><?php echo $employee_leavedays->employee_leave->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leavedays->leave_date->Visible) { // leave_date ?>
		<th class="<?php echo $employee_leavedays->leave_date->headerCellClass() ?>"><span id="elh_employee_leavedays_leave_date" class="employee_leavedays_leave_date"><?php echo $employee_leavedays->leave_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_leavedays->leave_type->Visible) { // leave_type ?>
		<th class="<?php echo $employee_leavedays->leave_type->headerCellClass() ?>"><span id="elh_employee_leavedays_leave_type" class="employee_leavedays_leave_type"><?php echo $employee_leavedays->leave_type->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_leavedays_delete->RecCnt = 0;
$i = 0;
while (!$employee_leavedays_delete->Recordset->EOF) {
	$employee_leavedays_delete->RecCnt++;
	$employee_leavedays_delete->RowCnt++;

	// Set row properties
	$employee_leavedays->resetAttributes();
	$employee_leavedays->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_leavedays_delete->loadRowValues($employee_leavedays_delete->Recordset);

	// Render row
	$employee_leavedays_delete->renderRow();
?>
	<tr<?php echo $employee_leavedays->rowAttributes() ?>>
<?php if ($employee_leavedays->id->Visible) { // id ?>
		<td<?php echo $employee_leavedays->id->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_delete->RowCnt ?>_employee_leavedays_id" class="employee_leavedays_id">
<span<?php echo $employee_leavedays->id->viewAttributes() ?>>
<?php echo $employee_leavedays->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leavedays->employee_leave->Visible) { // employee_leave ?>
		<td<?php echo $employee_leavedays->employee_leave->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_delete->RowCnt ?>_employee_leavedays_employee_leave" class="employee_leavedays_employee_leave">
<span<?php echo $employee_leavedays->employee_leave->viewAttributes() ?>>
<?php echo $employee_leavedays->employee_leave->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leavedays->leave_date->Visible) { // leave_date ?>
		<td<?php echo $employee_leavedays->leave_date->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_delete->RowCnt ?>_employee_leavedays_leave_date" class="employee_leavedays_leave_date">
<span<?php echo $employee_leavedays->leave_date->viewAttributes() ?>>
<?php echo $employee_leavedays->leave_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_leavedays->leave_type->Visible) { // leave_type ?>
		<td<?php echo $employee_leavedays->leave_type->cellAttributes() ?>>
<span id="el<?php echo $employee_leavedays_delete->RowCnt ?>_employee_leavedays_leave_type" class="employee_leavedays_leave_type">
<span<?php echo $employee_leavedays->leave_type->viewAttributes() ?>>
<?php echo $employee_leavedays->leave_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_leavedays_delete->Recordset->moveNext();
}
$employee_leavedays_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_leavedays_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_leavedays_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_leavedays_delete->terminate();
?>