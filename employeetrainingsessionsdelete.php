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
$employeetrainingsessions_delete = new employeetrainingsessions_delete();

// Run the page
$employeetrainingsessions_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employeetrainingsessions_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployeetrainingsessionsdelete = currentForm = new ew.Form("femployeetrainingsessionsdelete", "delete");

// Form_CustomValidate event
femployeetrainingsessionsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployeetrainingsessionsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployeetrainingsessionsdelete.lists["x_status"] = <?php echo $employeetrainingsessions_delete->status->Lookup->toClientList() ?>;
femployeetrainingsessionsdelete.lists["x_status"].options = <?php echo JsonEncode($employeetrainingsessions_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employeetrainingsessions_delete->showPageHeader(); ?>
<?php
$employeetrainingsessions_delete->showMessage();
?>
<form name="femployeetrainingsessionsdelete" id="femployeetrainingsessionsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employeetrainingsessions_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employeetrainingsessions_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employeetrainingsessions">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employeetrainingsessions_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employeetrainingsessions->id->Visible) { // id ?>
		<th class="<?php echo $employeetrainingsessions->id->headerCellClass() ?>"><span id="elh_employeetrainingsessions_id" class="employeetrainingsessions_id"><?php echo $employeetrainingsessions->id->caption() ?></span></th>
<?php } ?>
<?php if ($employeetrainingsessions->employee->Visible) { // employee ?>
		<th class="<?php echo $employeetrainingsessions->employee->headerCellClass() ?>"><span id="elh_employeetrainingsessions_employee" class="employeetrainingsessions_employee"><?php echo $employeetrainingsessions->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employeetrainingsessions->trainingSession->Visible) { // trainingSession ?>
		<th class="<?php echo $employeetrainingsessions->trainingSession->headerCellClass() ?>"><span id="elh_employeetrainingsessions_trainingSession" class="employeetrainingsessions_trainingSession"><?php echo $employeetrainingsessions->trainingSession->caption() ?></span></th>
<?php } ?>
<?php if ($employeetrainingsessions->status->Visible) { // status ?>
		<th class="<?php echo $employeetrainingsessions->status->headerCellClass() ?>"><span id="elh_employeetrainingsessions_status" class="employeetrainingsessions_status"><?php echo $employeetrainingsessions->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employeetrainingsessions_delete->RecCnt = 0;
$i = 0;
while (!$employeetrainingsessions_delete->Recordset->EOF) {
	$employeetrainingsessions_delete->RecCnt++;
	$employeetrainingsessions_delete->RowCnt++;

	// Set row properties
	$employeetrainingsessions->resetAttributes();
	$employeetrainingsessions->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employeetrainingsessions_delete->loadRowValues($employeetrainingsessions_delete->Recordset);

	// Render row
	$employeetrainingsessions_delete->renderRow();
?>
	<tr<?php echo $employeetrainingsessions->rowAttributes() ?>>
<?php if ($employeetrainingsessions->id->Visible) { // id ?>
		<td<?php echo $employeetrainingsessions->id->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_delete->RowCnt ?>_employeetrainingsessions_id" class="employeetrainingsessions_id">
<span<?php echo $employeetrainingsessions->id->viewAttributes() ?>>
<?php echo $employeetrainingsessions->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employeetrainingsessions->employee->Visible) { // employee ?>
		<td<?php echo $employeetrainingsessions->employee->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_delete->RowCnt ?>_employeetrainingsessions_employee" class="employeetrainingsessions_employee">
<span<?php echo $employeetrainingsessions->employee->viewAttributes() ?>>
<?php echo $employeetrainingsessions->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employeetrainingsessions->trainingSession->Visible) { // trainingSession ?>
		<td<?php echo $employeetrainingsessions->trainingSession->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_delete->RowCnt ?>_employeetrainingsessions_trainingSession" class="employeetrainingsessions_trainingSession">
<span<?php echo $employeetrainingsessions->trainingSession->viewAttributes() ?>>
<?php echo $employeetrainingsessions->trainingSession->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employeetrainingsessions->status->Visible) { // status ?>
		<td<?php echo $employeetrainingsessions->status->cellAttributes() ?>>
<span id="el<?php echo $employeetrainingsessions_delete->RowCnt ?>_employeetrainingsessions_status" class="employeetrainingsessions_status">
<span<?php echo $employeetrainingsessions->status->viewAttributes() ?>>
<?php echo $employeetrainingsessions->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employeetrainingsessions_delete->Recordset->moveNext();
}
$employeetrainingsessions_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employeetrainingsessions_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employeetrainingsessions_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employeetrainingsessions_delete->terminate();
?>