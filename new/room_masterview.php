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
<?php include_once "header.php"; ?>
<?php if (!$room_master_view->isExport()) { ?>
<script>
var froom_masterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	froom_masterview = currentForm = new ew.Form("froom_masterview", "view");
	loadjs.done("froom_masterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$room_master_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_master">
<input type="hidden" name="modal" value="<?php echo (int)$room_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($room_master_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_id"><?php echo $room_master_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $room_master_view->id->cellAttributes() ?>>
<span id="el_room_master_id">
<span<?php echo $room_master_view->id->viewAttributes() ?>><?php echo $room_master_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->RoomNo->Visible) { // RoomNo ?>
	<tr id="r_RoomNo">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_RoomNo"><?php echo $room_master_view->RoomNo->caption() ?></span></td>
		<td data-name="RoomNo" <?php echo $room_master_view->RoomNo->cellAttributes() ?>>
<span id="el_room_master_RoomNo">
<span<?php echo $room_master_view->RoomNo->viewAttributes() ?>><?php echo $room_master_view->RoomNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->RoomType->Visible) { // RoomType ?>
	<tr id="r_RoomType">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_RoomType"><?php echo $room_master_view->RoomType->caption() ?></span></td>
		<td data-name="RoomType" <?php echo $room_master_view->RoomType->cellAttributes() ?>>
<span id="el_room_master_RoomType">
<span<?php echo $room_master_view->RoomType->viewAttributes() ?>><?php echo $room_master_view->RoomType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->SharingRoom->Visible) { // SharingRoom ?>
	<tr id="r_SharingRoom">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_SharingRoom"><?php echo $room_master_view->SharingRoom->caption() ?></span></td>
		<td data-name="SharingRoom" <?php echo $room_master_view->SharingRoom->cellAttributes() ?>>
<span id="el_room_master_SharingRoom">
<span<?php echo $room_master_view->SharingRoom->viewAttributes() ?>><?php echo $room_master_view->SharingRoom->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_Amount"><?php echo $room_master_view->Amount->caption() ?></span></td>
		<td data-name="Amount" <?php echo $room_master_view->Amount->cellAttributes() ?>>
<span id="el_room_master_Amount">
<span<?php echo $room_master_view->Amount->viewAttributes() ?>><?php echo $room_master_view->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_Status"><?php echo $room_master_view->Status->caption() ?></span></td>
		<td data-name="Status" <?php echo $room_master_view->Status->cellAttributes() ?>>
<span id="el_room_master_Status">
<span<?php echo $room_master_view->Status->viewAttributes() ?>><?php echo $room_master_view->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_PatientID"><?php echo $room_master_view->PatientID->caption() ?></span></td>
		<td data-name="PatientID" <?php echo $room_master_view->PatientID->cellAttributes() ?>>
<span id="el_room_master_PatientID">
<span<?php echo $room_master_view->PatientID->viewAttributes() ?>><?php echo $room_master_view->PatientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_PatientName"><?php echo $room_master_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $room_master_view->PatientName->cellAttributes() ?>>
<span id="el_room_master_PatientName">
<span<?php echo $room_master_view->PatientName->viewAttributes() ?>><?php echo $room_master_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->MobileNo->Visible) { // MobileNo ?>
	<tr id="r_MobileNo">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_MobileNo"><?php echo $room_master_view->MobileNo->caption() ?></span></td>
		<td data-name="MobileNo" <?php echo $room_master_view->MobileNo->cellAttributes() ?>>
<span id="el_room_master_MobileNo">
<span<?php echo $room_master_view->MobileNo->viewAttributes() ?>><?php echo $room_master_view->MobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_master_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $room_master_view->TableLeftColumnClass ?>"><span id="elh_room_master_PatID"><?php echo $room_master_view->PatID->caption() ?></span></td>
		<td data-name="PatID" <?php echo $room_master_view->PatID->cellAttributes() ?>>
<span id="el_room_master_PatID">
<span<?php echo $room_master_view->PatID->viewAttributes() ?>><?php echo $room_master_view->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$room_master_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$room_master_view->isExport()) { ?>
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
$room_master_view->terminate();
?>