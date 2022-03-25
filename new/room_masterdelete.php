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
$room_master_delete = new room_master_delete();

// Run the page
$room_master_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_master_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var froom_masterdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	froom_masterdelete = currentForm = new ew.Form("froom_masterdelete", "delete");
	loadjs.done("froom_masterdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $room_master_delete->showPageHeader(); ?>
<?php
$room_master_delete->showMessage();
?>
<form name="froom_masterdelete" id="froom_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($room_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($room_master_delete->id->Visible) { // id ?>
		<th class="<?php echo $room_master_delete->id->headerCellClass() ?>"><span id="elh_room_master_id" class="room_master_id"><?php echo $room_master_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($room_master_delete->RoomNo->Visible) { // RoomNo ?>
		<th class="<?php echo $room_master_delete->RoomNo->headerCellClass() ?>"><span id="elh_room_master_RoomNo" class="room_master_RoomNo"><?php echo $room_master_delete->RoomNo->caption() ?></span></th>
<?php } ?>
<?php if ($room_master_delete->RoomType->Visible) { // RoomType ?>
		<th class="<?php echo $room_master_delete->RoomType->headerCellClass() ?>"><span id="elh_room_master_RoomType" class="room_master_RoomType"><?php echo $room_master_delete->RoomType->caption() ?></span></th>
<?php } ?>
<?php if ($room_master_delete->SharingRoom->Visible) { // SharingRoom ?>
		<th class="<?php echo $room_master_delete->SharingRoom->headerCellClass() ?>"><span id="elh_room_master_SharingRoom" class="room_master_SharingRoom"><?php echo $room_master_delete->SharingRoom->caption() ?></span></th>
<?php } ?>
<?php if ($room_master_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $room_master_delete->Amount->headerCellClass() ?>"><span id="elh_room_master_Amount" class="room_master_Amount"><?php echo $room_master_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($room_master_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $room_master_delete->Status->headerCellClass() ?>"><span id="elh_room_master_Status" class="room_master_Status"><?php echo $room_master_delete->Status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$room_master_delete->RecordCount = 0;
$i = 0;
while (!$room_master_delete->Recordset->EOF) {
	$room_master_delete->RecordCount++;
	$room_master_delete->RowCount++;

	// Set row properties
	$room_master->resetAttributes();
	$room_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$room_master_delete->loadRowValues($room_master_delete->Recordset);

	// Render row
	$room_master_delete->renderRow();
?>
	<tr <?php echo $room_master->rowAttributes() ?>>
<?php if ($room_master_delete->id->Visible) { // id ?>
		<td <?php echo $room_master_delete->id->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCount ?>_room_master_id" class="room_master_id">
<span<?php echo $room_master_delete->id->viewAttributes() ?>><?php echo $room_master_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master_delete->RoomNo->Visible) { // RoomNo ?>
		<td <?php echo $room_master_delete->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCount ?>_room_master_RoomNo" class="room_master_RoomNo">
<span<?php echo $room_master_delete->RoomNo->viewAttributes() ?>><?php echo $room_master_delete->RoomNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master_delete->RoomType->Visible) { // RoomType ?>
		<td <?php echo $room_master_delete->RoomType->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCount ?>_room_master_RoomType" class="room_master_RoomType">
<span<?php echo $room_master_delete->RoomType->viewAttributes() ?>><?php echo $room_master_delete->RoomType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master_delete->SharingRoom->Visible) { // SharingRoom ?>
		<td <?php echo $room_master_delete->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCount ?>_room_master_SharingRoom" class="room_master_SharingRoom">
<span<?php echo $room_master_delete->SharingRoom->viewAttributes() ?>><?php echo $room_master_delete->SharingRoom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $room_master_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCount ?>_room_master_Amount" class="room_master_Amount">
<span<?php echo $room_master_delete->Amount->viewAttributes() ?>><?php echo $room_master_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master_delete->Status->Visible) { // Status ?>
		<td <?php echo $room_master_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCount ?>_room_master_Status" class="room_master_Status">
<span<?php echo $room_master_delete->Status->viewAttributes() ?>><?php echo $room_master_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$room_master_delete->Recordset->moveNext();
}
$room_master_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $room_master_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$room_master_delete->showPageFooter();
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
$room_master_delete->terminate();
?>