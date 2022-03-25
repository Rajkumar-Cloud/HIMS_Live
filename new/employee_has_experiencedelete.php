<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<script>
var femployee_has_experiencedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	femployee_has_experiencedelete = currentForm = new ew.Form("femployee_has_experiencedelete", "delete");
	loadjs.done("femployee_has_experiencedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $employee_has_experience_delete->showPageHeader(); ?>
<?php
$employee_has_experience_delete->showMessage();
?>
<form name="femployee_has_experiencedelete" id="femployee_has_experiencedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_has_experience">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_has_experience_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_has_experience_delete->id->Visible) { // id ?>
		<th class="<?php echo $employee_has_experience_delete->id->headerCellClass() ?>"><span id="elh_employee_has_experience_id" class="employee_has_experience_id"><?php echo $employee_has_experience_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee_has_experience_delete->employee_id->headerCellClass() ?>"><span id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><?php echo $employee_has_experience_delete->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->working_at->Visible) { // working_at ?>
		<th class="<?php echo $employee_has_experience_delete->working_at->headerCellClass() ?>"><span id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><?php echo $employee_has_experience_delete->working_at->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->job_description->Visible) { // job description ?>
		<th class="<?php echo $employee_has_experience_delete->job_description->headerCellClass() ?>"><span id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description"><?php echo $employee_has_experience_delete->job_description->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->role->Visible) { // role ?>
		<th class="<?php echo $employee_has_experience_delete->role->headerCellClass() ?>"><span id="elh_employee_has_experience_role" class="employee_has_experience_role"><?php echo $employee_has_experience_delete->role->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->start_date->Visible) { // start_date ?>
		<th class="<?php echo $employee_has_experience_delete->start_date->headerCellClass() ?>"><span id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><?php echo $employee_has_experience_delete->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->end_date->Visible) { // end_date ?>
		<th class="<?php echo $employee_has_experience_delete->end_date->headerCellClass() ?>"><span id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><?php echo $employee_has_experience_delete->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->total_experience->Visible) { // total_experience ?>
		<th class="<?php echo $employee_has_experience_delete->total_experience->headerCellClass() ?>"><span id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><?php echo $employee_has_experience_delete->total_experience->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->certificates->Visible) { // certificates ?>
		<th class="<?php echo $employee_has_experience_delete->certificates->headerCellClass() ?>"><span id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><?php echo $employee_has_experience_delete->certificates->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->others->Visible) { // others ?>
		<th class="<?php echo $employee_has_experience_delete->others->headerCellClass() ?>"><span id="elh_employee_has_experience_others" class="employee_has_experience_others"><?php echo $employee_has_experience_delete->others->caption() ?></span></th>
<?php } ?>
<?php if ($employee_has_experience_delete->status->Visible) { // status ?>
		<th class="<?php echo $employee_has_experience_delete->status->headerCellClass() ?>"><span id="elh_employee_has_experience_status" class="employee_has_experience_status"><?php echo $employee_has_experience_delete->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_has_experience_delete->RecordCount = 0;
$i = 0;
while (!$employee_has_experience_delete->Recordset->EOF) {
	$employee_has_experience_delete->RecordCount++;
	$employee_has_experience_delete->RowCount++;

	// Set row properties
	$employee_has_experience->resetAttributes();
	$employee_has_experience->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_has_experience_delete->loadRowValues($employee_has_experience_delete->Recordset);

	// Render row
	$employee_has_experience_delete->renderRow();
?>
	<tr <?php echo $employee_has_experience->rowAttributes() ?>>
<?php if ($employee_has_experience_delete->id->Visible) { // id ?>
		<td <?php echo $employee_has_experience_delete->id->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_id" class="employee_has_experience_id">
<span<?php echo $employee_has_experience_delete->id->viewAttributes() ?>><?php echo $employee_has_experience_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->employee_id->Visible) { // employee_id ?>
		<td <?php echo $employee_has_experience_delete->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
<span<?php echo $employee_has_experience_delete->employee_id->viewAttributes() ?>><?php echo $employee_has_experience_delete->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->working_at->Visible) { // working_at ?>
		<td <?php echo $employee_has_experience_delete->working_at->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_working_at" class="employee_has_experience_working_at">
<span<?php echo $employee_has_experience_delete->working_at->viewAttributes() ?>><?php echo $employee_has_experience_delete->working_at->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->job_description->Visible) { // job description ?>
		<td <?php echo $employee_has_experience_delete->job_description->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_job_description" class="employee_has_experience_job_description">
<span<?php echo $employee_has_experience_delete->job_description->viewAttributes() ?>><?php echo $employee_has_experience_delete->job_description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->role->Visible) { // role ?>
		<td <?php echo $employee_has_experience_delete->role->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_role" class="employee_has_experience_role">
<span<?php echo $employee_has_experience_delete->role->viewAttributes() ?>><?php echo $employee_has_experience_delete->role->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->start_date->Visible) { // start_date ?>
		<td <?php echo $employee_has_experience_delete->start_date->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_start_date" class="employee_has_experience_start_date">
<span<?php echo $employee_has_experience_delete->start_date->viewAttributes() ?>><?php echo $employee_has_experience_delete->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->end_date->Visible) { // end_date ?>
		<td <?php echo $employee_has_experience_delete->end_date->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_end_date" class="employee_has_experience_end_date">
<span<?php echo $employee_has_experience_delete->end_date->viewAttributes() ?>><?php echo $employee_has_experience_delete->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->total_experience->Visible) { // total_experience ?>
		<td <?php echo $employee_has_experience_delete->total_experience->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
<span<?php echo $employee_has_experience_delete->total_experience->viewAttributes() ?>><?php echo $employee_has_experience_delete->total_experience->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->certificates->Visible) { // certificates ?>
		<td <?php echo $employee_has_experience_delete->certificates->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_certificates" class="employee_has_experience_certificates">
<span><?php echo GetFileViewTag($employee_has_experience_delete->certificates, $employee_has_experience_delete->certificates->getViewValue(), FALSE) ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->others->Visible) { // others ?>
		<td <?php echo $employee_has_experience_delete->others->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_others" class="employee_has_experience_others">
<span<?php echo $employee_has_experience_delete->others->viewAttributes() ?>><?php echo GetFileViewTag($employee_has_experience_delete->others, $employee_has_experience_delete->others->getViewValue(), FALSE) ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_has_experience_delete->status->Visible) { // status ?>
		<td <?php echo $employee_has_experience_delete->status->cellAttributes() ?>>
<span id="el<?php echo $employee_has_experience_delete->RowCount ?>_employee_has_experience_status" class="employee_has_experience_status">
<span<?php echo $employee_has_experience_delete->status->viewAttributes() ?>><?php echo $employee_has_experience_delete->status->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$employee_has_experience_delete->terminate();
?>