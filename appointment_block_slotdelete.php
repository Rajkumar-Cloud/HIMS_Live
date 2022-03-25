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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fappointment_block_slotdelete = currentForm = new ew.Form("fappointment_block_slotdelete", "delete");

// Form_CustomValidate event
fappointment_block_slotdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_block_slotdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $appointment_block_slot_delete->showPageHeader(); ?>
<?php
$appointment_block_slot_delete->showMessage();
?>
<form name="fappointment_block_slotdelete" id="fappointment_block_slotdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_block_slot_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_block_slot_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($appointment_block_slot_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($appointment_block_slot->id->Visible) { // id ?>
		<th class="<?php echo $appointment_block_slot->id->headerCellClass() ?>"><span id="elh_appointment_block_slot_id" class="appointment_block_slot_id"><?php echo $appointment_block_slot->id->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->Drid->Visible) { // Drid ?>
		<th class="<?php echo $appointment_block_slot->Drid->headerCellClass() ?>"><span id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid"><?php echo $appointment_block_slot->Drid->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->DrName->Visible) { // DrName ?>
		<th class="<?php echo $appointment_block_slot->DrName->headerCellClass() ?>"><span id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName"><?php echo $appointment_block_slot->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->Details->Visible) { // Details ?>
		<th class="<?php echo $appointment_block_slot->Details->headerCellClass() ?>"><span id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details"><?php echo $appointment_block_slot->Details->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->BlockType->Visible) { // BlockType ?>
		<th class="<?php echo $appointment_block_slot->BlockType->headerCellClass() ?>"><span id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType"><?php echo $appointment_block_slot->BlockType->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->FromDate->Visible) { // FromDate ?>
		<th class="<?php echo $appointment_block_slot->FromDate->headerCellClass() ?>"><span id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate"><?php echo $appointment_block_slot->FromDate->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->ToDate->Visible) { // ToDate ?>
		<th class="<?php echo $appointment_block_slot->ToDate->headerCellClass() ?>"><span id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate"><?php echo $appointment_block_slot->ToDate->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->FromTime->Visible) { // FromTime ?>
		<th class="<?php echo $appointment_block_slot->FromTime->headerCellClass() ?>"><span id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime"><?php echo $appointment_block_slot->FromTime->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_block_slot->ToTime->Visible) { // ToTime ?>
		<th class="<?php echo $appointment_block_slot->ToTime->headerCellClass() ?>"><span id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime"><?php echo $appointment_block_slot->ToTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$appointment_block_slot_delete->RecCnt = 0;
$i = 0;
while (!$appointment_block_slot_delete->Recordset->EOF) {
	$appointment_block_slot_delete->RecCnt++;
	$appointment_block_slot_delete->RowCnt++;

	// Set row properties
	$appointment_block_slot->resetAttributes();
	$appointment_block_slot->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$appointment_block_slot_delete->loadRowValues($appointment_block_slot_delete->Recordset);

	// Render row
	$appointment_block_slot_delete->renderRow();
?>
	<tr<?php echo $appointment_block_slot->rowAttributes() ?>>
<?php if ($appointment_block_slot->id->Visible) { // id ?>
		<td<?php echo $appointment_block_slot->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_id" class="appointment_block_slot_id">
<span<?php echo $appointment_block_slot->id->viewAttributes() ?>>
<?php echo $appointment_block_slot->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->Drid->Visible) { // Drid ?>
		<td<?php echo $appointment_block_slot->Drid->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_Drid" class="appointment_block_slot_Drid">
<span<?php echo $appointment_block_slot->Drid->viewAttributes() ?>>
<?php echo $appointment_block_slot->Drid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->DrName->Visible) { // DrName ?>
		<td<?php echo $appointment_block_slot->DrName->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_DrName" class="appointment_block_slot_DrName">
<span<?php echo $appointment_block_slot->DrName->viewAttributes() ?>>
<?php echo $appointment_block_slot->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->Details->Visible) { // Details ?>
		<td<?php echo $appointment_block_slot->Details->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_Details" class="appointment_block_slot_Details">
<span<?php echo $appointment_block_slot->Details->viewAttributes() ?>>
<?php echo $appointment_block_slot->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->BlockType->Visible) { // BlockType ?>
		<td<?php echo $appointment_block_slot->BlockType->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType">
<span<?php echo $appointment_block_slot->BlockType->viewAttributes() ?>>
<?php echo $appointment_block_slot->BlockType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->FromDate->Visible) { // FromDate ?>
		<td<?php echo $appointment_block_slot->FromDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate">
<span<?php echo $appointment_block_slot->FromDate->viewAttributes() ?>>
<?php echo $appointment_block_slot->FromDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->ToDate->Visible) { // ToDate ?>
		<td<?php echo $appointment_block_slot->ToDate->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate">
<span<?php echo $appointment_block_slot->ToDate->viewAttributes() ?>>
<?php echo $appointment_block_slot->ToDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->FromTime->Visible) { // FromTime ?>
		<td<?php echo $appointment_block_slot->FromTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime">
<span<?php echo $appointment_block_slot->FromTime->viewAttributes() ?>>
<?php echo $appointment_block_slot->FromTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_block_slot->ToTime->Visible) { // ToTime ?>
		<td<?php echo $appointment_block_slot->ToTime->cellAttributes() ?>>
<span id="el<?php echo $appointment_block_slot_delete->RowCnt ?>_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime">
<span<?php echo $appointment_block_slot->ToTime->viewAttributes() ?>>
<?php echo $appointment_block_slot->ToTime->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appointment_block_slot_delete->terminate();
?>