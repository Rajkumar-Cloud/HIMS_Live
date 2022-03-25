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
$appointment_block_slot_view = new appointment_block_slot_view();

// Run the page
$appointment_block_slot_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_block_slot_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$appointment_block_slot->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fappointment_block_slotview = currentForm = new ew.Form("fappointment_block_slotview", "view");

// Form_CustomValidate event
fappointment_block_slotview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_block_slotview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$appointment_block_slot->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $appointment_block_slot_view->ExportOptions->render("body") ?>
<?php $appointment_block_slot_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $appointment_block_slot_view->showPageHeader(); ?>
<?php
$appointment_block_slot_view->showMessage();
?>
<form name="fappointment_block_slotview" id="fappointment_block_slotview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_block_slot_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_block_slot_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_block_slot_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($appointment_block_slot->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_id"><?php echo $appointment_block_slot->id->caption() ?></span></td>
		<td data-name="id"<?php echo $appointment_block_slot->id->cellAttributes() ?>>
<span id="el_appointment_block_slot_id">
<span<?php echo $appointment_block_slot->id->viewAttributes() ?>>
<?php echo $appointment_block_slot->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->Drid->Visible) { // Drid ?>
	<tr id="r_Drid">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_Drid"><?php echo $appointment_block_slot->Drid->caption() ?></span></td>
		<td data-name="Drid"<?php echo $appointment_block_slot->Drid->cellAttributes() ?>>
<span id="el_appointment_block_slot_Drid">
<span<?php echo $appointment_block_slot->Drid->viewAttributes() ?>>
<?php echo $appointment_block_slot->Drid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_DrName"><?php echo $appointment_block_slot->DrName->caption() ?></span></td>
		<td data-name="DrName"<?php echo $appointment_block_slot->DrName->cellAttributes() ?>>
<span id="el_appointment_block_slot_DrName">
<span<?php echo $appointment_block_slot->DrName->viewAttributes() ?>>
<?php echo $appointment_block_slot->DrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_Details"><?php echo $appointment_block_slot->Details->caption() ?></span></td>
		<td data-name="Details"<?php echo $appointment_block_slot->Details->cellAttributes() ?>>
<span id="el_appointment_block_slot_Details">
<span<?php echo $appointment_block_slot->Details->viewAttributes() ?>>
<?php echo $appointment_block_slot->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->BlockType->Visible) { // BlockType ?>
	<tr id="r_BlockType">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_BlockType"><?php echo $appointment_block_slot->BlockType->caption() ?></span></td>
		<td data-name="BlockType"<?php echo $appointment_block_slot->BlockType->cellAttributes() ?>>
<span id="el_appointment_block_slot_BlockType">
<span<?php echo $appointment_block_slot->BlockType->viewAttributes() ?>>
<?php echo $appointment_block_slot->BlockType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->FromDate->Visible) { // FromDate ?>
	<tr id="r_FromDate">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_FromDate"><?php echo $appointment_block_slot->FromDate->caption() ?></span></td>
		<td data-name="FromDate"<?php echo $appointment_block_slot->FromDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromDate">
<span<?php echo $appointment_block_slot->FromDate->viewAttributes() ?>>
<?php echo $appointment_block_slot->FromDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->ToDate->Visible) { // ToDate ?>
	<tr id="r_ToDate">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_ToDate"><?php echo $appointment_block_slot->ToDate->caption() ?></span></td>
		<td data-name="ToDate"<?php echo $appointment_block_slot->ToDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToDate">
<span<?php echo $appointment_block_slot->ToDate->viewAttributes() ?>>
<?php echo $appointment_block_slot->ToDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->FromTime->Visible) { // FromTime ?>
	<tr id="r_FromTime">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_FromTime"><?php echo $appointment_block_slot->FromTime->caption() ?></span></td>
		<td data-name="FromTime"<?php echo $appointment_block_slot->FromTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromTime">
<span<?php echo $appointment_block_slot->FromTime->viewAttributes() ?>>
<?php echo $appointment_block_slot->FromTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot->ToTime->Visible) { // ToTime ?>
	<tr id="r_ToTime">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_ToTime"><?php echo $appointment_block_slot->ToTime->caption() ?></span></td>
		<td data-name="ToTime"<?php echo $appointment_block_slot->ToTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToTime">
<span<?php echo $appointment_block_slot->ToTime->viewAttributes() ?>>
<?php echo $appointment_block_slot->ToTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$appointment_block_slot_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$appointment_block_slot->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$appointment_block_slot_view->terminate();
?>