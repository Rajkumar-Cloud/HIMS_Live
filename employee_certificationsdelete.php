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
$employee_certifications_delete = new employee_certifications_delete();

// Run the page
$employee_certifications_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_certifications_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_certificationsdelete = currentForm = new ew.Form("femployee_certificationsdelete", "delete");

// Form_CustomValidate event
femployee_certificationsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_certificationsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_certifications_delete->showPageHeader(); ?>
<?php
$employee_certifications_delete->showMessage();
?>
<form name="femployee_certificationsdelete" id="femployee_certificationsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_certifications_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_certifications_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_certifications">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_certifications_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_certifications->id->Visible) { // id ?>
		<th class="<?php echo $employee_certifications->id->headerCellClass() ?>"><span id="elh_employee_certifications_id" class="employee_certifications_id"><?php echo $employee_certifications->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_certifications->certification_id->Visible) { // certification_id ?>
		<th class="<?php echo $employee_certifications->certification_id->headerCellClass() ?>"><span id="elh_employee_certifications_certification_id" class="employee_certifications_certification_id"><?php echo $employee_certifications->certification_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_certifications->employee->Visible) { // employee ?>
		<th class="<?php echo $employee_certifications->employee->headerCellClass() ?>"><span id="elh_employee_certifications_employee" class="employee_certifications_employee"><?php echo $employee_certifications->employee->caption() ?></span></th>
<?php } ?>
<?php if ($employee_certifications->date_start->Visible) { // date_start ?>
		<th class="<?php echo $employee_certifications->date_start->headerCellClass() ?>"><span id="elh_employee_certifications_date_start" class="employee_certifications_date_start"><?php echo $employee_certifications->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($employee_certifications->date_end->Visible) { // date_end ?>
		<th class="<?php echo $employee_certifications->date_end->headerCellClass() ?>"><span id="elh_employee_certifications_date_end" class="employee_certifications_date_end"><?php echo $employee_certifications->date_end->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_certifications_delete->RecCnt = 0;
$i = 0;
while (!$employee_certifications_delete->Recordset->EOF) {
	$employee_certifications_delete->RecCnt++;
	$employee_certifications_delete->RowCnt++;

	// Set row properties
	$employee_certifications->resetAttributes();
	$employee_certifications->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_certifications_delete->loadRowValues($employee_certifications_delete->Recordset);

	// Render row
	$employee_certifications_delete->renderRow();
?>
	<tr<?php echo $employee_certifications->rowAttributes() ?>>
<?php if ($employee_certifications->id->Visible) { // id ?>
		<td<?php echo $employee_certifications->id->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_delete->RowCnt ?>_employee_certifications_id" class="employee_certifications_id">
<span<?php echo $employee_certifications->id->viewAttributes() ?>>
<?php echo $employee_certifications->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_certifications->certification_id->Visible) { // certification_id ?>
		<td<?php echo $employee_certifications->certification_id->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_delete->RowCnt ?>_employee_certifications_certification_id" class="employee_certifications_certification_id">
<span<?php echo $employee_certifications->certification_id->viewAttributes() ?>>
<?php echo $employee_certifications->certification_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_certifications->employee->Visible) { // employee ?>
		<td<?php echo $employee_certifications->employee->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_delete->RowCnt ?>_employee_certifications_employee" class="employee_certifications_employee">
<span<?php echo $employee_certifications->employee->viewAttributes() ?>>
<?php echo $employee_certifications->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_certifications->date_start->Visible) { // date_start ?>
		<td<?php echo $employee_certifications->date_start->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_delete->RowCnt ?>_employee_certifications_date_start" class="employee_certifications_date_start">
<span<?php echo $employee_certifications->date_start->viewAttributes() ?>>
<?php echo $employee_certifications->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_certifications->date_end->Visible) { // date_end ?>
		<td<?php echo $employee_certifications->date_end->cellAttributes() ?>>
<span id="el<?php echo $employee_certifications_delete->RowCnt ?>_employee_certifications_date_end" class="employee_certifications_date_end">
<span<?php echo $employee_certifications->date_end->viewAttributes() ?>>
<?php echo $employee_certifications->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_certifications_delete->Recordset->moveNext();
}
$employee_certifications_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_certifications_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_certifications_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_certifications_delete->terminate();
?>