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
$room_master_view = new room_master_view();

// Run the page
$room_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_master_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$room_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var froom_masterview = currentForm = new ew.Form("froom_masterview", "view");

// Form_CustomValidate event
froom_masterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
froom_masterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
froom_masterview.lists["x_RoomType"] = <?php echo $room_master_view->RoomType->Lookup->toClientList() ?>;
froom_masterview.lists["x_RoomType"].options = <?php echo JsonEncode($room_master_view->RoomType->lookupOptions()) ?>;
froom_masterview.lists["x_SharingRoom"] = <?php echo $room_master_view->SharingRoom->Lookup->toClientList() ?>;
froom_masterview.lists["x_SharingRoom"].options = <?php echo JsonEncode($room_master_view->SharingRoom->options(FALSE, TRUE)) ?>;
froom_masterview.lists["x_Status"] = <?php echo $room_master_view->Status->Lookup->toClientList() ?>;
froom_masterview.lists["x_Status"].options = <?php echo JsonEncode($room_master_view->Status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$room_master->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $room_master_view->ExportOptions->render("body") ?>
<?php $room_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $room_master_view->showPageHeader(); ?>
<?php
$room_master_view->showMessage();
?>
<form name="froom_masterview" id="froom_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($room_master_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $room_master_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_master">
<input type="hidden" name="modal" value="<?php echo (int)$room_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($room_master->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_id"><?php echo $room_master->id->caption() ?></span></td>
		<td data-name="id"<?php echo $room_master->id->cellAttributes() ?>>
<span id="el_room_master_id">
<span<?php echo $room_master->id->viewAttributes() ?>>
<?php echo $room_master->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->RoomNo->Visible) { // RoomNo ?>
	<tr id="r_RoomNo">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_RoomNo"><?php echo $room_master->RoomNo->caption() ?></span></td>
		<td data-name="RoomNo"<?php echo $room_master->RoomNo->cellAttributes() ?>>
<span id="el_room_master_RoomNo">
<span<?php echo $room_master->RoomNo->viewAttributes() ?>>
<?php echo $room_master->RoomNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->RoomType->Visible) { // RoomType ?>
	<tr id="r_RoomType">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_RoomType"><?php echo $room_master->RoomType->caption() ?></span></td>
		<td data-name="RoomType"<?php echo $room_master->RoomType->cellAttributes() ?>>
<span id="el_room_master_RoomType">
<span<?php echo $room_master->RoomType->viewAttributes() ?>>
<?php echo $room_master->RoomType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->SharingRoom->Visible) { // SharingRoom ?>
	<tr id="r_SharingRoom">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_SharingRoom"><?php echo $room_master->SharingRoom->caption() ?></span></td>
		<td data-name="SharingRoom"<?php echo $room_master->SharingRoom->cellAttributes() ?>>
<span id="el_room_master_SharingRoom">
<span<?php echo $room_master->SharingRoom->viewAttributes() ?>>
<?php echo $room_master->SharingRoom->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_Amount"><?php echo $room_master->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $room_master->Amount->cellAttributes() ?>>
<span id="el_room_master_Amount">
<span<?php echo $room_master->Amount->viewAttributes() ?>>
<?php echo $room_master->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_Status"><?php echo $room_master->Status->caption() ?></span></td>
		<td data-name="Status"<?php echo $room_master->Status->cellAttributes() ?>>
<span id="el_room_master_Status">
<span<?php echo $room_master->Status->viewAttributes() ?>>
<?php echo $room_master->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_PatientID"><?php echo $room_master->PatientID->caption() ?></span></td>
		<td data-name="PatientID"<?php echo $room_master->PatientID->cellAttributes() ?>>
<span id="el_room_master_PatientID">
<span<?php echo $room_master->PatientID->viewAttributes() ?>>
<?php echo $room_master->PatientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_PatientName"><?php echo $room_master->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $room_master->PatientName->cellAttributes() ?>>
<span id="el_room_master_PatientName">
<span<?php echo $room_master->PatientName->viewAttributes() ?>>
<?php echo $room_master->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->MobileNo->Visible) { // MobileNo ?>
	<tr id="r_MobileNo">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_MobileNo"><?php echo $room_master->MobileNo->caption() ?></span></td>
		<td data-name="MobileNo"<?php echo $room_master->MobileNo->cellAttributes() ?>>
<span id="el_room_master_MobileNo">
<span<?php echo $room_master->MobileNo->viewAttributes() ?>>
<?php echo $room_master->MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_PatID"><?php echo $room_master->PatID->caption() ?></span></td>
		<td data-name="PatID"<?php echo $room_master->PatID->cellAttributes() ?>>
<span id="el_room_master_PatID">
<span<?php echo $room_master->PatID->viewAttributes() ?>>
<?php echo $room_master->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$room_master_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$room_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$room_master_view->terminate();
?>