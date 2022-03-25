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
$employee_languages_delete = new employee_languages_delete();

// Run the page
$employee_languages_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_languages_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_languagesdelete = currentForm = new ew.Form("femployee_languagesdelete", "delete");

// Form_CustomValidate event
femployee_languagesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_languagesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_languagesdelete.lists["x_reading"] = <?php echo $employee_languages_delete->reading->Lookup->toClientList() ?>;
femployee_languagesdelete.lists["x_reading"].options = <?php echo JsonEncode($employee_languages_delete->reading->options(FALSE, TRUE)) ?>;
femployee_languagesdelete.lists["x_speaking"] = <?php echo $employee_languages_delete->speaking->Lookup->toClientList() ?>;
femployee_languagesdelete.lists["x_speaking"].options = <?php echo JsonEncode($employee_languages_delete->speaking->options(FALSE, TRUE)) ?>;
femployee_languagesdelete.lists["x_writing"] = <?php echo $employee_languages_delete->writing->Lookup->toClientList() ?>;
femployee_languagesdelete.lists["x_writing"].options = <?php echo JsonEncode($employee_languages_delete->writing->options(FALSE, TRUE)) ?>;
femployee_languagesdelete.lists["x_understanding"] = <?php echo $employee_languages_delete->understanding->Lookup->toClientList() ?>;
femployee_languagesdelete.lists["x_understanding"].options = <?php echo JsonEncode($employee_languages_delete->understanding->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_languages_delete->showPageHeader(); ?>
<?php
$employee_languages_delete->showMessage();
?>
<form name="femployee_languagesdelete" id="femployee_languagesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_languages_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_languages_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_languages_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_languages->id->Visible) { // id ?>
		<th class="<?php echo $employee_languages->id->headerCellClass() ?>"><span id="elh_employee_languages_id" class="employee_languages_id"><?php echo $employee_languages->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_languages->language_id->Visible) { // language_id ?>
		<th class="<?php echo $employee_languages->language_id->headerCellClass() ?>"><span id="elh_employee_languages_language_id" class="employee_languages_language_id"><?php echo $employee_languages->language_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_languages->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_languages->employee->headerCellClass() ?>"><span id="elh_employee_languages_employee" class="employee_languages_employee"><?php echo $employee_languages->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_languages->reading->Visible) { // reading ?>
		<th class="<?php echo $employee_languages->reading->headerCellClass() ?>"><span id="elh_employee_languages_reading" class="employee_languages_reading"><?php echo $employee_languages->reading->caption() ?></span></th>
<?php } ?>
<?php if ($employee_languages->speaking->Visible) { // speaking ?>
		<th class="<?php echo $employee_languages->speaking->headerCellClass() ?>"><span id="elh_employee_languages_speaking" class="employee_languages_speaking"><?php echo $employee_languages->speaking->caption() ?></span></th>
<?php } ?>
<?php if ($employee_languages->writing->Visible) { // writing ?>
		<th class="<?php echo $employee_languages->writing->headerCellClass() ?>"><span id="elh_employee_languages_writing" class="employee_languages_writing"><?php echo $employee_languages->writing->caption() ?></span></th>
<?php } ?>
<?php if ($employee_languages->understanding->Visible) { // understanding ?>
		<th class="<?php echo $employee_languages->understanding->headerCellClass() ?>"><span id="elh_employee_languages_understanding" class="employee_languages_understanding"><?php echo $employee_languages->understanding->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_languages_delete->RecCnt = 0;
$i = 0;
while (!$employee_languages_delete->Recordset->EOF) {
	$employee_languages_delete->RecCnt++;
	$employee_languages_delete->RowCnt++;

	// Set row properties
	$employee_languages->resetAttributes();
	$employee_languages->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_languages_delete->loadRowValues($employee_languages_delete->Recordset);

	// Render row
	$employee_languages_delete->renderRow();
?>
	<tr<?php echo $employee_languages->rowAttributes() ?>>
<?php if ($employee_languages->id->Visible) { // id ?>
		<td<?php echo $employee_languages->id->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_delete->RowCnt ?>_employee_languages_id" class="employee_languages_id">
<span<?php echo $employee_languages->id->viewAttributes() ?>>
<?php echo $employee_languages->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_languages->language_id->Visible) { // language_id ?>
		<td<?php echo $employee_languages->language_id->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_delete->RowCnt ?>_employee_languages_language_id" class="employee_languages_language_id">
<span<?php echo $employee_languages->language_id->viewAttributes() ?>>
<?php echo $employee_languages->language_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_languages->employee->Visible) { // employee ?>
		<td<?php echo $employee_languages->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_delete->RowCnt ?>_employee_languages_employee" class="employee_languages_employee">
<span<?php echo $employee_languages->employee->viewAttributes() ?>>
<?php echo $employee_languages->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_languages->reading->Visible) { // reading ?>
		<td<?php echo $employee_languages->reading->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_delete->RowCnt ?>_employee_languages_reading" class="employee_languages_reading">
<span<?php echo $employee_languages->reading->viewAttributes() ?>>
<?php echo $employee_languages->reading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_languages->speaking->Visible) { // speaking ?>
		<td<?php echo $employee_languages->speaking->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_delete->RowCnt ?>_employee_languages_speaking" class="employee_languages_speaking">
<span<?php echo $employee_languages->speaking->viewAttributes() ?>>
<?php echo $employee_languages->speaking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_languages->writing->Visible) { // writing ?>
		<td<?php echo $employee_languages->writing->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_delete->RowCnt ?>_employee_languages_writing" class="employee_languages_writing">
<span<?php echo $employee_languages->writing->viewAttributes() ?>>
<?php echo $employee_languages->writing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_languages->understanding->Visible) { // understanding ?>
		<td<?php echo $employee_languages->understanding->cellAttributes() ?>>
<span id="el<?php echo $employee_languages_delete->RowCnt ?>_employee_languages_understanding" class="employee_languages_understanding">
<span<?php echo $employee_languages->understanding->viewAttributes() ?>>
<?php echo $employee_languages->understanding->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_languages_delete->Recordset->moveNext();
}
$employee_languages_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_languages_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_languages_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_languages_delete->terminate();
?>