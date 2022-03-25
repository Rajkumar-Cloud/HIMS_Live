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
<?php include_once "header.php"; ?>
<?php if (!$appointment_block_slot_view->isExport()) { ?>
<script>
var fappointment_block_slotview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fappointment_block_slotview = currentForm = new ew.Form("fappointment_block_slotview", "view");
	loadjs.done("fappointment_block_slotview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$appointment_block_slot_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="modal" value="<?php echo (int)$appointment_block_slot_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($appointment_block_slot_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_id"><?php echo $appointment_block_slot_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $appointment_block_slot_view->id->cellAttributes() ?>>
<span id="el_appointment_block_slot_id">
<span<?php echo $appointment_block_slot_view->id->viewAttributes() ?>><?php echo $appointment_block_slot_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->Drid->Visible) { // Drid ?>
	<tr id="r_Drid">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_Drid"><?php echo $appointment_block_slot_view->Drid->caption() ?></span></td>
		<td data-name="Drid" <?php echo $appointment_block_slot_view->Drid->cellAttributes() ?>>
<span id="el_appointment_block_slot_Drid">
<span<?php echo $appointment_block_slot_view->Drid->viewAttributes() ?>><?php echo $appointment_block_slot_view->Drid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_DrName"><?php echo $appointment_block_slot_view->DrName->caption() ?></span></td>
		<td data-name="DrName" <?php echo $appointment_block_slot_view->DrName->cellAttributes() ?>>
<span id="el_appointment_block_slot_DrName">
<span<?php echo $appointment_block_slot_view->DrName->viewAttributes() ?>><?php echo $appointment_block_slot_view->DrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_Details"><?php echo $appointment_block_slot_view->Details->caption() ?></span></td>
		<td data-name="Details" <?php echo $appointment_block_slot_view->Details->cellAttributes() ?>>
<span id="el_appointment_block_slot_Details">
<span<?php echo $appointment_block_slot_view->Details->viewAttributes() ?>><?php echo $appointment_block_slot_view->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->BlockType->Visible) { // BlockType ?>
	<tr id="r_BlockType">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_BlockType"><?php echo $appointment_block_slot_view->BlockType->caption() ?></span></td>
		<td data-name="BlockType" <?php echo $appointment_block_slot_view->BlockType->cellAttributes() ?>>
<span id="el_appointment_block_slot_BlockType">
<span<?php echo $appointment_block_slot_view->BlockType->viewAttributes() ?>><?php echo $appointment_block_slot_view->BlockType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->FromDate->Visible) { // FromDate ?>
	<tr id="r_FromDate">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_FromDate"><?php echo $appointment_block_slot_view->FromDate->caption() ?></span></td>
		<td data-name="FromDate" <?php echo $appointment_block_slot_view->FromDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromDate">
<span<?php echo $appointment_block_slot_view->FromDate->viewAttributes() ?>><?php echo $appointment_block_slot_view->FromDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->ToDate->Visible) { // ToDate ?>
	<tr id="r_ToDate">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_ToDate"><?php echo $appointment_block_slot_view->ToDate->caption() ?></span></td>
		<td data-name="ToDate" <?php echo $appointment_block_slot_view->ToDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToDate">
<span<?php echo $appointment_block_slot_view->ToDate->viewAttributes() ?>><?php echo $appointment_block_slot_view->ToDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->FromTime->Visible) { // FromTime ?>
	<tr id="r_FromTime">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_FromTime"><?php echo $appointment_block_slot_view->FromTime->caption() ?></span></td>
		<td data-name="FromTime" <?php echo $appointment_block_slot_view->FromTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromTime">
<span<?php echo $appointment_block_slot_view->FromTime->viewAttributes() ?>><?php echo $appointment_block_slot_view->FromTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($appointment_block_slot_view->ToTime->Visible) { // ToTime ?>
	<tr id="r_ToTime">
		<td class="<?php echo $appointment_block_slot_view->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_ToTime"><?php echo $appointment_block_slot_view->ToTime->caption() ?></span></td>
		<td data-name="ToTime" <?php echo $appointment_block_slot_view->ToTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToTime">
<span<?php echo $appointment_block_slot_view->ToTime->viewAttributes() ?>><?php echo $appointment_block_slot_view->ToTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$appointment_block_slot_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$appointment_block_slot_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$appointment_block_slot_view->terminate();
?>