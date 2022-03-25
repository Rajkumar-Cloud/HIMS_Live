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
$appointment_block_slot_delete = new appointment_block_slot_delete();

// Run the page
$appointment_block_slot_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_block_slot_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fappointment_block_slotdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fappointment_block_slotdelete = currentForm = new ew.Form("fappointment_block_slotdelete", "delete");
	loadjs.done("fappointment_block_slotdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $appointment_block_slot_delete->showPageHeader(); ?>
<?php
$appointment_block_slot_delete->showMessage();
?>
<form name="fappointment_block_slotdelete" id="fappointment_block_slotdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($appointment_block_slot_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($appointment_block_slot_delete->id->Visible) { // id ?>
		<th class="<?php echo $appointment_block_slot_delete->id->headerCellClass() ?>"><span id="elh_appointment_block_slot_id" class="appointment_block_slot_id"><?php echo $appointment_block_slot_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->Drid->Visible) { // Drid ?>
		<th class="<?php echo $appointment_block_slot_delete->Drid->headerCellClass() ?>"><span id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid"><?php echo $appointment_block_slot_delete->Drid->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->DrName->Visible) { // DrName ?>
		<th class="<?php echo $appointment_block_slot_delete->DrName->headerCellClass() ?>"><span id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName"><?php echo $appointment_block_slot_delete->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->Details->Visible) { // Details ?>
		<th class="<?php echo $appointment_block_slot_delete->Details->headerCellClass() ?>"><span id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details"><?php echo $appointment_block_slot_delete->Details->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->BlockType->Visible) { // BlockType ?>
		<th class="<?php echo $appointment_block_slot_delete->BlockType->headerCellClass() ?>"><span id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType"><?php echo $appointment_block_slot_delete->BlockType->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->FromDate->Visible) { // FromDate ?>
		<th class="<?php echo $appointment_block_slot_delete->FromDate->headerCellClass() ?>"><span id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate"><?php echo $appointment_block_slot_delete->FromDate->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->ToDate->Visible) { // ToDate ?>
		<th class="<?php echo $appointment_block_slot_delete->ToDate->headerCellClass() ?>"><span id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate"><?php echo $appointment_block_slot_delete->ToDate->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->FromTime->Visible) { // FromTime ?>
		<th class="<?php echo $appointment_block_slot_delete->FromTime->headerCellClass() ?>"><span id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime"><?php echo $appointment_block_slot_delete->FromTime->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot_delete->ToTime->Visible) { // ToTime ?>
		<th class="<?php echo $appointment_block_slot_delete->ToTime->headerCellClass() ?>"><span id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime"><?php echo $appointment_block_slot_delete->ToTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$appointment_block_slot_delete->RecordCount = 0;
$i = 0;
while (!$appointment_block_slot_delete->Recordset->EOF) {
	$appointment_block_slot_delete->RecordCount++;
	$appointment_block_slot_delete->RowCount++;

	// Set row properties
	$appointment_block_slot->resetAttributes();
	$appointment_block_slot->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$appointment_block_slot_delete->loadRowValues($appointment_block_slot_delete->Recordset);

	// Render row
	$appointment_block_slot_delete->renderRow();
?>
	<tr <?php echo $appointment_block_slot->rowAttributes() ?>>
<?php if ($appointment_block_slot_delete->id->Visible) { // id ?>
		<td <?php echo $appointment_block_slot_delete->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_id" class="appointment_block_slot_id">
<span<?php echo $appointment_block_slot_delete->id->viewAttributes() ?>><?php echo $appointment_block_slot_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->Drid->Visible) { // Drid ?>
		<td <?php echo $appointment_block_slot_delete->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_Drid" class="appointment_block_slot_Drid">
<span<?php echo $appointment_block_slot_delete->Drid->viewAttributes() ?>><?php echo $appointment_block_slot_delete->Drid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->DrName->Visible) { // DrName ?>
		<td <?php echo $appointment_block_slot_delete->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_DrName" class="appointment_block_slot_DrName">
<span<?php echo $appointment_block_slot_delete->DrName->viewAttributes() ?>><?php echo $appointment_block_slot_delete->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->Details->Visible) { // Details ?>
		<td <?php echo $appointment_block_slot_delete->Details->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_Details" class="appointment_block_slot_Details">
<span<?php echo $appointment_block_slot_delete->Details->viewAttributes() ?>><?php echo $appointment_block_slot_delete->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->BlockType->Visible) { // BlockType ?>
		<td <?php echo $appointment_block_slot_delete->BlockType->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType">
<span<?php echo $appointment_block_slot_delete->BlockType->viewAttributes() ?>><?php echo $appointment_block_slot_delete->BlockType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->FromDate->Visible) { // FromDate ?>
		<td <?php echo $appointment_block_slot_delete->FromDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate">
<span<?php echo $appointment_block_slot_delete->FromDate->viewAttributes() ?>><?php echo $appointment_block_slot_delete->FromDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->ToDate->Visible) { // ToDate ?>
		<td <?php echo $appointment_block_slot_delete->ToDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate">
<span<?php echo $appointment_block_slot_delete->ToDate->viewAttributes() ?>><?php echo $appointment_block_slot_delete->ToDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->FromTime->Visible) { // FromTime ?>
		<td <?php echo $appointment_block_slot_delete->FromTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime">
<span<?php echo $appointment_block_slot_delete->FromTime->viewAttributes() ?>><?php echo $appointment_block_slot_delete->FromTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot_delete->ToTime->Visible) { // ToTime ?>
		<td <?php echo $appointment_block_slot_delete->ToTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCount ?>_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime">
<span<?php echo $appointment_block_slot_delete->ToTime->viewAttributes() ?>><?php echo $appointment_block_slot_delete->ToTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$appointment_block_slot_delete->Recordset->moveNext();
}
$appointment_block_slot_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_block_slot_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$appointment_block_slot_delete->showPageFooter();
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
$appointment_block_slot_delete->terminate();
?>