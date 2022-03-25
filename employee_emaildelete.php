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
$employee_email_delete = new employee_email_delete();

// Run the page
$employee_email_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_email_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_emaildelete = currentForm = new ew.Form("femployee_emaildelete", "delete");

// Form_CustomValidate event
femployee_emaildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_emaildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_emaildelete.lists["x_email_type"] = <?php echo $employee_email_delete->email_type->Lookup->toClientList() ?>;
femployee_emaildelete.lists["x_email_type"].options = <?php echo JsonEncode($employee_email_delete->email_type->lookupOptions()) ?>;
femployee_emaildelete.lists["x_status"] = <?php echo $employee_email_delete->status->Lookup->toClientList() ?>;
femployee_emaildelete.lists["x_status"].options = <?php echo JsonEncode($employee_email_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_email_delete->showPageHeader(); ?>
<?php
$employee_email_delete->showMessage();
?>
<form name="femployee_emaildelete" id="femployee_emaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_email_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_email_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_email">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_email_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_email->id->Visible) { // id ?>
		<th class="<?php echo $employee_email->id->headerCellClass() ?>"><span id="elh_employee_email_id" class="employee_email_id"><?php echo $employee_email->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee_email->employee_id->headerCellClass() ?>"><span id="elh_employee_email_employee_id" class="employee_email_employee_id"><?php echo $employee_email->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_email->_email->Visible) { // email ?>
		<th class="<?php echo $employee_email->_email->headerCellClass() ?>"><span id="elh_employee_email__email" class="employee_email__email"><?php echo $employee_email->_email->caption() ?></span></th>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
		<th class="<?php echo $employee_email->email_type->headerCellClass() ?>"><span id="elh_employee_email_email_type" class="employee_email_email_type"><?php echo $employee_email->email_type->caption() ?></span></th>
<?php } ?>
<?php if ($employee_email->status->Visible) { // status ?>
		<th class="<?php echo $employee_email->status->headerCellClass() ?>"><span id="elh_employee_email_status" class="employee_email_status"><?php echo $employee_email->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
		<th class="<?php echo $employee_email->HospID->headerCellClass() ?>"><span id="elh_employee_email_HospID" class="employee_email_HospID"><?php echo $employee_email->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_email_delete->RecCnt = 0;
$i = 0;
while (!$employee_email_delete->Recordset->EOF) {
	$employee_email_delete->RecCnt++;
	$employee_email_delete->RowCnt++;

	// Set row properties
	$employee_email->resetAttributes();
	$employee_email->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_email_delete->loadRowValues($employee_email_delete->Recordset);

	// Render row
	$employee_email_delete->renderRow();
?>
	<tr<?php echo $employee_email->rowAttributes() ?>>
<?php if ($employee_email->id->Visible) { // id ?>
		<td<?php echo $employee_email->id->cellAttributes() ?>>
<span id="el<?php echo $employee_email_delete->RowCnt ?>_employee_email_id" class="employee_email_id">
<span<?php echo $employee_email->id->viewAttributes() ?>>
<?php echo $employee_email->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_email->employee_id->Visible) { // employee_id ?>
		<td<?php echo $employee_email->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_email_delete->RowCnt ?>_employee_email_employee_id" class="employee_email_employee_id">
<span<?php echo $employee_email->employee_id->viewAttributes() ?>>
<?php echo $employee_email->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_email->_email->Visible) { // email ?>
		<td<?php echo $employee_email->_email->cellAttributes() ?>>
<span id="el<?php echo $employee_email_delete->RowCnt ?>_employee_email__email" class="employee_email__email">
<span<?php echo $employee_email->_email->viewAttributes() ?>>
<?php echo $employee_email->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_email->email_type->Visible) { // email_type ?>
		<td<?php echo $employee_email->email_type->cellAttributes() ?>>
<span id="el<?php echo $employee_email_delete->RowCnt ?>_employee_email_email_type" class="employee_email_email_type">
<span<?php echo $employee_email->email_type->viewAttributes() ?>>
<?php echo $employee_email->email_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_email->status->Visible) { // status ?>
		<td<?php echo $employee_email->status->cellAttributes() ?>>
<span id="el<?php echo $employee_email_delete->RowCnt ?>_employee_email_status" class="employee_email_status">
<span<?php echo $employee_email->status->viewAttributes() ?>>
<?php echo $employee_email->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_email->HospID->Visible) { // HospID ?>
		<td<?php echo $employee_email->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_email_delete->RowCnt ?>_employee_email_HospID" class="employee_email_HospID">
<span<?php echo $employee_email->HospID->viewAttributes() ?>>
<?php echo $employee_email->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_email_delete->Recordset->moveNext();
}
$employee_email_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_email_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_email_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_email_delete->terminate();
?>