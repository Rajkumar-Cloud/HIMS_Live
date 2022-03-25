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
$employee_has_experience_delete = new employee_has_experience_delete();

// Run the page
$employee_has_experience_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_has_experiencedelete = currentForm = new ew.Form("femployee_has_experiencedelete", "delete");

// Form_CustomValidate event
femployee_has_experiencedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_experiencedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_experiencedelete.lists["x_status"] = <?php echo $employee_has_experience_delete->status->Lookup->toClientList() ?>;
femployee_has_experiencedelete.lists["x_status"].options = <?php echo JsonEncode($employee_has_experience_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_has_experience_delete->showPageHeader(); ?>
<?php
$employee_has_experience_delete->showMessage();
?>
<form name="femployee_has_experiencedelete" id="femployee_has_experiencedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_has_experience_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_has_experience_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_has_experience_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_has_experience->id->Visible) { // id ?>
		<th class="<?php echo $employee_has_experience->id->headerCellClass() ?>"><span id="elh_employee_has_experience_id" class="employee_has_experience_id"><?php echo $employee_has_experience->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee_has_experience->employee_id->headerCellClass() ?>"><span id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><?php echo $employee_has_experience->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
		<th class="<?php echo $employee_has_experience->working_at->headerCellClass() ?>"><span id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><?php echo $employee_has_experience->working_at->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
		<th class="<?php echo $employee_has_experience->job_description->headerCellClass() ?>"><span id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description"><?php echo $employee_has_experience->job_description->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
		<th class="<?php echo $employee_has_experience->role->headerCellClass() ?>"><span id="elh_employee_has_experience_role" class="employee_has_experience_role"><?php echo $employee_has_experience->role->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
		<th class="<?php echo $employee_has_experience->start_date->headerCellClass() ?>"><span id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><?php echo $employee_has_experience->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
		<th class="<?php echo $employee_has_experience->end_date->headerCellClass() ?>"><span id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><?php echo $employee_has_experience->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
		<th class="<?php echo $employee_has_experience->total_experience->headerCellClass() ?>"><span id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><?php echo $employee_has_experience->total_experience->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
		<th class="<?php echo $employee_has_experience->certificates->headerCellClass() ?>"><span id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><?php echo $employee_has_experience->certificates->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
		<th class="<?php echo $employee_has_experience->others->headerCellClass() ?>"><span id="elh_employee_has_experience_others" class="employee_has_experience_others"><?php echo $employee_has_experience->others->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
		<th class="<?php echo $employee_has_experience->status->headerCellClass() ?>"><span id="elh_employee_has_experience_status" class="employee_has_experience_status"><?php echo $employee_has_experience->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
		<th class="<?php echo $employee_has_experience->HospID->headerCellClass() ?>"><span id="elh_employee_has_experience_HospID" class="employee_has_experience_HospID"><?php echo $employee_has_experience->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_has_experience_delete->RecCnt = 0;
$i = 0;
while (!$employee_has_experience_delete->Recordset->EOF) {
	$employee_has_experience_delete->RecCnt++;
	$employee_has_experience_delete->RowCnt++;

	// Set row properties
	$employee_has_experience->resetAttributes();
	$employee_has_experience->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_has_experience_delete->loadRowValues($employee_has_experience_delete->Recordset);

	// Render row
	$employee_has_experience_delete->renderRow();
?>
	<tr<?php echo $employee_has_experience->rowAttributes() ?>>
<?php if ($employee_has_experience->id->Visible) { // id ?>
		<td<?php echo $employee_has_experience->id->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_id" class="employee_has_experience_id">
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<?php echo $employee_has_experience->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
		<td<?php echo $employee_has_experience->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<?php echo $employee_has_experience->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
		<td<?php echo $employee_has_experience->working_at->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_working_at" class="employee_has_experience_working_at">
<span<?php echo $employee_has_experience->working_at->viewAttributes() ?>>
<?php echo $employee_has_experience->working_at->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
		<td<?php echo $employee_has_experience->job_description->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_job_description" class="employee_has_experience_job_description">
<span<?php echo $employee_has_experience->job_description->viewAttributes() ?>>
<?php echo $employee_has_experience->job_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
		<td<?php echo $employee_has_experience->role->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_role" class="employee_has_experience_role">
<span<?php echo $employee_has_experience->role->viewAttributes() ?>>
<?php echo $employee_has_experience->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
		<td<?php echo $employee_has_experience->start_date->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_start_date" class="employee_has_experience_start_date">
<span<?php echo $employee_has_experience->start_date->viewAttributes() ?>>
<?php echo $employee_has_experience->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
		<td<?php echo $employee_has_experience->end_date->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_end_date" class="employee_has_experience_end_date">
<span<?php echo $employee_has_experience->end_date->viewAttributes() ?>>
<?php echo $employee_has_experience->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
		<td<?php echo $employee_has_experience->total_experience->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
<span<?php echo $employee_has_experience->total_experience->viewAttributes() ?>>
<?php echo $employee_has_experience->total_experience->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
		<td<?php echo $employee_has_experience->certificates->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_certificates" class="employee_has_experience_certificates">
<span>
<?php echo GetFileViewTag($employee_has_experience->certificates, $employee_has_experience->certificates->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
		<td<?php echo $employee_has_experience->others->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_others" class="employee_has_experience_others">
<span<?php echo $employee_has_experience->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_experience->others, $employee_has_experience->others->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
		<td<?php echo $employee_has_experience->status->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_status" class="employee_has_experience_status">
<span<?php echo $employee_has_experience->status->viewAttributes() ?>>
<?php echo $employee_has_experience->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
		<td<?php echo $employee_has_experience->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCnt ?>_employee_has_experience_HospID" class="employee_has_experience_HospID">
<span<?php echo $employee_has_experience->HospID->viewAttributes() ?>>
<?php echo $employee_has_experience->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_has_experience_delete->Recordset->moveNext();
}
$employee_has_experience_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_has_experience_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_has_experience_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_has_experience_delete->terminate();
?>