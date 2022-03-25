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
$doctors_delete = new doctors_delete();

// Run the page
$doctors_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$doctors_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdoctorsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fdoctorsdelete = currentForm = new ew.Form("fdoctorsdelete", "delete");
	loadjs.done("fdoctorsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $doctors_delete->showPageHeader(); ?>
<?php
$doctors_delete->showMessage();
?>
<form name="fdoctorsdelete" id="fdoctorsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($doctors_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($doctors_delete->id->Visible) { // id ?>
		<th class="<?php echo $doctors_delete->id->headerCellClass() ?>"><span id="elh_doctors_id" class="doctors_id"><?php echo $doctors_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->CODE->Visible) { // CODE ?>
		<th class="<?php echo $doctors_delete->CODE->headerCellClass() ?>"><span id="elh_doctors_CODE" class="doctors_CODE"><?php echo $doctors_delete->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->NAME->Visible) { // NAME ?>
		<th class="<?php echo $doctors_delete->NAME->headerCellClass() ?>"><span id="elh_doctors_NAME" class="doctors_NAME"><?php echo $doctors_delete->NAME->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<th class="<?php echo $doctors_delete->DEPARTMENT->headerCellClass() ?>"><span id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT"><?php echo $doctors_delete->DEPARTMENT->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->start_time->Visible) { // start_time ?>
		<th class="<?php echo $doctors_delete->start_time->headerCellClass() ?>"><span id="elh_doctors_start_time" class="doctors_start_time"><?php echo $doctors_delete->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->end_time->Visible) { // end_time ?>
		<th class="<?php echo $doctors_delete->end_time->headerCellClass() ?>"><span id="elh_doctors_end_time" class="doctors_end_time"><?php echo $doctors_delete->end_time->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->start_time1->Visible) { // start_time1 ?>
		<th class="<?php echo $doctors_delete->start_time1->headerCellClass() ?>"><span id="elh_doctors_start_time1" class="doctors_start_time1"><?php echo $doctors_delete->start_time1->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->end_time1->Visible) { // end_time1 ?>
		<th class="<?php echo $doctors_delete->end_time1->headerCellClass() ?>"><span id="elh_doctors_end_time1" class="doctors_end_time1"><?php echo $doctors_delete->end_time1->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->start_time2->Visible) { // start_time2 ?>
		<th class="<?php echo $doctors_delete->start_time2->headerCellClass() ?>"><span id="elh_doctors_start_time2" class="doctors_start_time2"><?php echo $doctors_delete->start_time2->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->end_time2->Visible) { // end_time2 ?>
		<th class="<?php echo $doctors_delete->end_time2->headerCellClass() ?>"><span id="elh_doctors_end_time2" class="doctors_end_time2"><?php echo $doctors_delete->end_time2->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->slot_time->Visible) { // slot_time ?>
		<th class="<?php echo $doctors_delete->slot_time->headerCellClass() ?>"><span id="elh_doctors_slot_time" class="doctors_slot_time"><?php echo $doctors_delete->slot_time->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->Fees->Visible) { // Fees ?>
		<th class="<?php echo $doctors_delete->Fees->headerCellClass() ?>"><span id="elh_doctors_Fees" class="doctors_Fees"><?php echo $doctors_delete->Fees->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->slot_days->Visible) { // slot_days ?>
		<th class="<?php echo $doctors_delete->slot_days->headerCellClass() ?>"><span id="elh_doctors_slot_days" class="doctors_slot_days"><?php echo $doctors_delete->slot_days->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $doctors_delete->Status->headerCellClass() ?>"><span id="elh_doctors_Status" class="doctors_Status"><?php echo $doctors_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->scheduler_id->Visible) { // scheduler_id ?>
		<th class="<?php echo $doctors_delete->scheduler_id->headerCellClass() ?>"><span id="elh_doctors_scheduler_id" class="doctors_scheduler_id"><?php echo $doctors_delete->scheduler_id->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $doctors_delete->HospID->headerCellClass() ?>"><span id="elh_doctors_HospID" class="doctors_HospID"><?php echo $doctors_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($doctors_delete->Designation->Visible) { // Designation ?>
		<th class="<?php echo $doctors_delete->Designation->headerCellClass() ?>"><span id="elh_doctors_Designation" class="doctors_Designation"><?php echo $doctors_delete->Designation->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$doctors_delete->RecordCount = 0;
$i = 0;
while (!$doctors_delete->Recordset->EOF) {
	$doctors_delete->RecordCount++;
	$doctors_delete->RowCount++;

	// Set row properties
	$doctors->resetAttributes();
	$doctors->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$doctors_delete->loadRowValues($doctors_delete->Recordset);

	// Render row
	$doctors_delete->renderRow();
?>
	<tr <?php echo $doctors->rowAttributes() ?>>
<?php if ($doctors_delete->id->Visible) { // id ?>
		<td <?php echo $doctors_delete->id->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_id" class="doctors_id">
<span<?php echo $doctors_delete->id->viewAttributes() ?>><?php echo $doctors_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->CODE->Visible) { // CODE ?>
		<td <?php echo $doctors_delete->CODE->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_CODE" class="doctors_CODE">
<span<?php echo $doctors_delete->CODE->viewAttributes() ?>><?php echo $doctors_delete->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->NAME->Visible) { // NAME ?>
		<td <?php echo $doctors_delete->NAME->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_NAME" class="doctors_NAME">
<span<?php echo $doctors_delete->NAME->viewAttributes() ?>><?php echo $doctors_delete->NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<td <?php echo $doctors_delete->DEPARTMENT->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_DEPARTMENT" class="doctors_DEPARTMENT">
<span<?php echo $doctors_delete->DEPARTMENT->viewAttributes() ?>><?php echo $doctors_delete->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->start_time->Visible) { // start_time ?>
		<td <?php echo $doctors_delete->start_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_start_time" class="doctors_start_time">
<span<?php echo $doctors_delete->start_time->viewAttributes() ?>><?php echo $doctors_delete->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->end_time->Visible) { // end_time ?>
		<td <?php echo $doctors_delete->end_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_end_time" class="doctors_end_time">
<span<?php echo $doctors_delete->end_time->viewAttributes() ?>><?php echo $doctors_delete->end_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->start_time1->Visible) { // start_time1 ?>
		<td <?php echo $doctors_delete->start_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_start_time1" class="doctors_start_time1">
<span<?php echo $doctors_delete->start_time1->viewAttributes() ?>><?php echo $doctors_delete->start_time1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->end_time1->Visible) { // end_time1 ?>
		<td <?php echo $doctors_delete->end_time1->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_end_time1" class="doctors_end_time1">
<span<?php echo $doctors_delete->end_time1->viewAttributes() ?>><?php echo $doctors_delete->end_time1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->start_time2->Visible) { // start_time2 ?>
		<td <?php echo $doctors_delete->start_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_start_time2" class="doctors_start_time2">
<span<?php echo $doctors_delete->start_time2->viewAttributes() ?>><?php echo $doctors_delete->start_time2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->end_time2->Visible) { // end_time2 ?>
		<td <?php echo $doctors_delete->end_time2->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_end_time2" class="doctors_end_time2">
<span<?php echo $doctors_delete->end_time2->viewAttributes() ?>><?php echo $doctors_delete->end_time2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->slot_time->Visible) { // slot_time ?>
		<td <?php echo $doctors_delete->slot_time->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_slot_time" class="doctors_slot_time">
<span<?php echo $doctors_delete->slot_time->viewAttributes() ?>><?php echo $doctors_delete->slot_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->Fees->Visible) { // Fees ?>
		<td <?php echo $doctors_delete->Fees->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_Fees" class="doctors_Fees">
<span<?php echo $doctors_delete->Fees->viewAttributes() ?>><?php echo $doctors_delete->Fees->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->slot_days->Visible) { // slot_days ?>
		<td <?php echo $doctors_delete->slot_days->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_slot_days" class="doctors_slot_days">
<span<?php echo $doctors_delete->slot_days->viewAttributes() ?>><?php echo $doctors_delete->slot_days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->Status->Visible) { // Status ?>
		<td <?php echo $doctors_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_Status" class="doctors_Status">
<span<?php echo $doctors_delete->Status->viewAttributes() ?>><?php echo $doctors_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->scheduler_id->Visible) { // scheduler_id ?>
		<td <?php echo $doctors_delete->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_scheduler_id" class="doctors_scheduler_id">
<span<?php echo $doctors_delete->scheduler_id->viewAttributes() ?>><?php echo $doctors_delete->scheduler_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $doctors_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_HospID" class="doctors_HospID">
<span<?php echo $doctors_delete->HospID->viewAttributes() ?>><?php echo $doctors_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($doctors_delete->Designation->Visible) { // Designation ?>
		<td <?php echo $doctors_delete->Designation->cellAttributes() ?>>
<span id="el<?php echo $doctors_delete->RowCount ?>_doctors_Designation" class="doctors_Designation">
<span<?php echo $doctors_delete->Designation->viewAttributes() ?>><?php echo $doctors_delete->Designation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$doctors_delete->Recordset->moveNext();
}
$doctors_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $doctors_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$doctors_delete->showPageFooter();
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
$doctors_delete->terminate();
?>