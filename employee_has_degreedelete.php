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
$employee_has_degree_delete = new employee_has_degree_delete();

// Run the page
$employee_has_degree_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_degree_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_has_degreedelete = currentForm = new ew.Form("femployee_has_degreedelete", "delete");

// Form_CustomValidate event
femployee_has_degreedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_degreedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_degreedelete.lists["x_degree_id"] = <?php echo $employee_has_degree_delete->degree_id->Lookup->toClientList() ?>;
femployee_has_degreedelete.lists["x_degree_id"].options = <?php echo JsonEncode($employee_has_degree_delete->degree_id->lookupOptions()) ?>;
femployee_has_degreedelete.lists["x_status"] = <?php echo $employee_has_degree_delete->status->Lookup->toClientList() ?>;
femployee_has_degreedelete.lists["x_status"].options = <?php echo JsonEncode($employee_has_degree_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_has_degree_delete->showPageHeader(); ?>
<?php
$employee_has_degree_delete->showMessage();
?>
<form name="femployee_has_degreedelete" id="femployee_has_degreedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_degree_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_degree_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_has_degree_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_has_degree->id->Visible) { // id ?>
		<th class="<?php echo $employee_has_degree->id->headerCellClass() ?>"><span id="elh_employee_has_degree_id" class="employee_has_degree_id"><?php echo $employee_has_degree->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee_has_degree->employee_id->headerCellClass() ?>"><span id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><?php echo $employee_has_degree->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
		<th class="<?php echo $employee_has_degree->degree_id->headerCellClass() ?>"><span id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><?php echo $employee_has_degree->degree_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
		<th class="<?php echo $employee_has_degree->college_or_school->headerCellClass() ?>"><span id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><?php echo $employee_has_degree->college_or_school->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
		<th class="<?php echo $employee_has_degree->university_or_board->headerCellClass() ?>"><span id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><?php echo $employee_has_degree->university_or_board->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
		<th class="<?php echo $employee_has_degree->year_of_passing->headerCellClass() ?>"><span id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><?php echo $employee_has_degree->year_of_passing->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
		<th class="<?php echo $employee_has_degree->scoring_marks->headerCellClass() ?>"><span id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><?php echo $employee_has_degree->scoring_marks->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
		<th class="<?php echo $employee_has_degree->certificates->headerCellClass() ?>"><span id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><?php echo $employee_has_degree->certificates->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->others->Visible) { // others ?>
		<th class="<?php echo $employee_has_degree->others->headerCellClass() ?>"><span id="elh_employee_has_degree_others" class="employee_has_degree_others"><?php echo $employee_has_degree->others->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->status->Visible) { // status ?>
		<th class="<?php echo $employee_has_degree->status->headerCellClass() ?>"><span id="elh_employee_has_degree_status" class="employee_has_degree_status"><?php echo $employee_has_degree->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
		<th class="<?php echo $employee_has_degree->HospID->headerCellClass() ?>"><span id="elh_employee_has_degree_HospID" class="employee_has_degree_HospID"><?php echo $employee_has_degree->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_has_degree_delete->RecCnt = 0;
$i = 0;
while (!$employee_has_degree_delete->Recordset->EOF) {
	$employee_has_degree_delete->RecCnt++;
	$employee_has_degree_delete->RowCnt++;

	// Set row properties
	$employee_has_degree->resetAttributes();
	$employee_has_degree->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_has_degree_delete->loadRowValues($employee_has_degree_delete->Recordset);

	// Render row
	$employee_has_degree_delete->renderRow();
?>
	<tr<?php echo $employee_has_degree->rowAttributes() ?>>
<?php if ($employee_has_degree->id->Visible) { // id ?>
		<td<?php echo $employee_has_degree->id->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_id" class="employee_has_degree_id">
<span<?php echo $employee_has_degree->id->viewAttributes() ?>>
<?php echo $employee_has_degree->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->employee_id->Visible) { // employee_id ?>
		<td<?php echo $employee_has_degree->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_employee_id" class="employee_has_degree_employee_id">
<span<?php echo $employee_has_degree->employee_id->viewAttributes() ?>>
<?php echo $employee_has_degree->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->degree_id->Visible) { // degree_id ?>
		<td<?php echo $employee_has_degree->degree_id->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_degree_id" class="employee_has_degree_degree_id">
<span<?php echo $employee_has_degree->degree_id->viewAttributes() ?>>
<?php echo $employee_has_degree->degree_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->college_or_school->Visible) { // college_or_school ?>
		<td<?php echo $employee_has_degree->college_or_school->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school">
<span<?php echo $employee_has_degree->college_or_school->viewAttributes() ?>>
<?php echo $employee_has_degree->college_or_school->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->university_or_board->Visible) { // university_or_board ?>
		<td<?php echo $employee_has_degree->university_or_board->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board">
<span<?php echo $employee_has_degree->university_or_board->viewAttributes() ?>>
<?php echo $employee_has_degree->university_or_board->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->year_of_passing->Visible) { // year_of_passing ?>
		<td<?php echo $employee_has_degree->year_of_passing->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing">
<span<?php echo $employee_has_degree->year_of_passing->viewAttributes() ?>>
<?php echo $employee_has_degree->year_of_passing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->scoring_marks->Visible) { // scoring_marks ?>
		<td<?php echo $employee_has_degree->scoring_marks->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks">
<span<?php echo $employee_has_degree->scoring_marks->viewAttributes() ?>>
<?php echo $employee_has_degree->scoring_marks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->certificates->Visible) { // certificates ?>
		<td<?php echo $employee_has_degree->certificates->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_certificates" class="employee_has_degree_certificates">
<span>
<?php echo GetFileViewTag($employee_has_degree->certificates, $employee_has_degree->certificates->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->others->Visible) { // others ?>
		<td<?php echo $employee_has_degree->others->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_others" class="employee_has_degree_others">
<span<?php echo $employee_has_degree->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_degree->others, $employee_has_degree->others->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->status->Visible) { // status ?>
		<td<?php echo $employee_has_degree->status->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_status" class="employee_has_degree_status">
<span<?php echo $employee_has_degree->status->viewAttributes() ?>>
<?php echo $employee_has_degree->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_degree->HospID->Visible) { // HospID ?>
		<td<?php echo $employee_has_degree->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_has_degree_delete->RowCnt ?>_employee_has_degree_HospID" class="employee_has_degree_HospID">
<span<?php echo $employee_has_degree->HospID->viewAttributes() ?>>
<?php echo $employee_has_degree->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_has_degree_delete->Recordset->moveNext();
}
$employee_has_degree_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_has_degree_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_has_degree_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_has_degree_delete->terminate();
?>