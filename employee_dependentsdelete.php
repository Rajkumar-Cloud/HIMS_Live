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
$employee_dependents_delete = new employee_dependents_delete();

// Run the page
$employee_dependents_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_dependents_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_dependentsdelete = currentForm = new ew.Form("femployee_dependentsdelete", "delete");

// Form_CustomValidate event
femployee_dependentsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_dependentsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_dependentsdelete.lists["x_relationship"] = <?php echo $employee_dependents_delete->relationship->Lookup->toClientList() ?>;
femployee_dependentsdelete.lists["x_relationship"].options = <?php echo JsonEncode($employee_dependents_delete->relationship->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_dependents_delete->showPageHeader(); ?>
<?php
$employee_dependents_delete->showMessage();
?>
<form name="femployee_dependentsdelete" id="femployee_dependentsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_dependents_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_dependents_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_dependents">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_dependents_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_dependents->id->Visible) { // id ?>
		<th class="<?php echo $employee_dependents->id->headerCellClass() ?>"><span id="elh_employee_dependents_id" class="employee_dependents_id"><?php echo $employee_dependents->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_dependents->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_dependents->employee->headerCellClass() ?>"><span id="elh_employee_dependents_employee" class="employee_dependents_employee"><?php echo $employee_dependents->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_dependents->name->Visible) { // name ?>
		<th class="<?php echo $employee_dependents->name->headerCellClass() ?>"><span id="elh_employee_dependents_name" class="employee_dependents_name"><?php echo $employee_dependents->name->caption() ?></span></th>
<?php } ?>
<?php if ($employee_dependents->relationship->Visible) { // relationship ?>
		<th class="<?php echo $employee_dependents->relationship->headerCellClass() ?>"><span id="elh_employee_dependents_relationship" class="employee_dependents_relationship"><?php echo $employee_dependents->relationship->caption() ?></span></th>
<?php } ?>
<?php if ($employee_dependents->dob->Visible) { // dob ?>
		<th class="<?php echo $employee_dependents->dob->headerCellClass() ?>"><span id="elh_employee_dependents_dob" class="employee_dependents_dob"><?php echo $employee_dependents->dob->caption() ?></span></th>
<?php } ?>
<?php if ($employee_dependents->id_number->Visible) { // id_number ?>
		<th class="<?php echo $employee_dependents->id_number->headerCellClass() ?>"><span id="elh_employee_dependents_id_number" class="employee_dependents_id_number"><?php echo $employee_dependents->id_number->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_dependents_delete->RecCnt = 0;
$i = 0;
while (!$employee_dependents_delete->Recordset->EOF) {
	$employee_dependents_delete->RecCnt++;
	$employee_dependents_delete->RowCnt++;

	// Set row properties
	$employee_dependents->resetAttributes();
	$employee_dependents->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_dependents_delete->loadRowValues($employee_dependents_delete->Recordset);

	// Render row
	$employee_dependents_delete->renderRow();
?>
	<tr<?php echo $employee_dependents->rowAttributes() ?>>
<?php if ($employee_dependents->id->Visible) { // id ?>
		<td<?php echo $employee_dependents->id->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_delete->RowCnt ?>_employee_dependents_id" class="employee_dependents_id">
<span<?php echo $employee_dependents->id->viewAttributes() ?>>
<?php echo $employee_dependents->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_dependents->employee->Visible) { // employee ?>
		<td<?php echo $employee_dependents->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_delete->RowCnt ?>_employee_dependents_employee" class="employee_dependents_employee">
<span<?php echo $employee_dependents->employee->viewAttributes() ?>>
<?php echo $employee_dependents->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_dependents->name->Visible) { // name ?>
		<td<?php echo $employee_dependents->name->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_delete->RowCnt ?>_employee_dependents_name" class="employee_dependents_name">
<span<?php echo $employee_dependents->name->viewAttributes() ?>>
<?php echo $employee_dependents->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_dependents->relationship->Visible) { // relationship ?>
		<td<?php echo $employee_dependents->relationship->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_delete->RowCnt ?>_employee_dependents_relationship" class="employee_dependents_relationship">
<span<?php echo $employee_dependents->relationship->viewAttributes() ?>>
<?php echo $employee_dependents->relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_dependents->dob->Visible) { // dob ?>
		<td<?php echo $employee_dependents->dob->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_delete->RowCnt ?>_employee_dependents_dob" class="employee_dependents_dob">
<span<?php echo $employee_dependents->dob->viewAttributes() ?>>
<?php echo $employee_dependents->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_dependents->id_number->Visible) { // id_number ?>
		<td<?php echo $employee_dependents->id_number->cellAttributes() ?>>
<span id="el<?php echo $employee_dependents_delete->RowCnt ?>_employee_dependents_id_number" class="employee_dependents_id_number">
<span<?php echo $employee_dependents->id_number->viewAttributes() ?>>
<?php echo $employee_dependents->id_number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_dependents_delete->Recordset->moveNext();
}
$employee_dependents_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_dependents_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_dependents_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_dependents_delete->terminate();
?>