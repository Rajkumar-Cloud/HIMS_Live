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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var froom_masterdelete = currentForm = new ew.Form("froom_masterdelete", "delete");

// Form_CustomValidate event
froom_masterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
froom_masterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
froom_masterdelete.lists["x_RoomType"] = <?php echo $room_master_delete->RoomType->Lookup->toClientList() ?>;
froom_masterdelete.lists["x_RoomType"].options = <?php echo JsonEncode($room_master_delete->RoomType->lookupOptions()) ?>;
froom_masterdelete.lists["x_SharingRoom"] = <?php echo $room_master_delete->SharingRoom->Lookup->toClientList() ?>;
froom_masterdelete.lists["x_SharingRoom"].options = <?php echo JsonEncode($room_master_delete->SharingRoom->options(FALSE, TRUE)) ?>;
froom_masterdelete.lists["x_Status"] = <?php echo $room_master_delete->Status->Lookup->toClientList() ?>;
froom_masterdelete.lists["x_Status"].options = <?php echo JsonEncode($room_master_delete->Status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $room_master_delete->showPageHeader(); ?>
<?php
$room_master_delete->showMessage();
?>
<form name="froom_masterdelete" id="froom_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($room_master_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $room_master_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($room_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($room_master->id->Visible) { // id ?>
		<th class="<?php echo $room_master->id->headerCellClass() ?>"><span id="elh_room_master_id" class="room_master_id"><?php echo $room_master->id->caption() ?></span></th>
<?php } ?>
<?php if ($room_master->RoomNo->Visible) { // RoomNo ?>
		<th class="<?php echo $room_master->RoomNo->headerCellClass() ?>"><span id="elh_room_master_RoomNo" class="room_master_RoomNo"><?php echo $room_master->RoomNo->caption() ?></span></th>
<?php } ?>
<?php if ($room_master->RoomType->Visible) { // RoomType ?>
		<th class="<?php echo $room_master->RoomType->headerCellClass() ?>"><span id="elh_room_master_RoomType" class="room_master_RoomType"><?php echo $room_master->RoomType->caption() ?></span></th>
<?php } ?>
<?php if ($room_master->SharingRoom->Visible) { // SharingRoom ?>
		<th class="<?php echo $room_master->SharingRoom->headerCellClass() ?>"><span id="elh_room_master_SharingRoom" class="room_master_SharingRoom"><?php echo $room_master->SharingRoom->caption() ?></span></th>
<?php } ?>
<?php if ($room_master->Amount->Visible) { // Amount ?>
		<th class="<?php echo $room_master->Amount->headerCellClass() ?>"><span id="elh_room_master_Amount" class="room_master_Amount"><?php echo $room_master->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($room_master->Status->Visible) { // Status ?>
		<th class="<?php echo $room_master->Status->headerCellClass() ?>"><span id="elh_room_master_Status" class="room_master_Status"><?php echo $room_master->Status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$room_master_delete->RecCnt = 0;
$i = 0;
while (!$room_master_delete->Recordset->EOF) {
	$room_master_delete->RecCnt++;
	$room_master_delete->RowCnt++;

	// Set row properties
	$room_master->resetAttributes();
	$room_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$room_master_delete->loadRowValues($room_master_delete->Recordset);

	// Render row
	$room_master_delete->renderRow();
?>
	<tr<?php echo $room_master->rowAttributes() ?>>
<?php if ($room_master->id->Visible) { // id ?>
		<td<?php echo $room_master->id->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCnt ?>_room_master_id" class="room_master_id">
<span<?php echo $room_master->id->viewAttributes() ?>>
<?php echo $room_master->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master->RoomNo->Visible) { // RoomNo ?>
		<td<?php echo $room_master->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCnt ?>_room_master_RoomNo" class="room_master_RoomNo">
<span<?php echo $room_master->RoomNo->viewAttributes() ?>>
<?php echo $room_master->RoomNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master->RoomType->Visible) { // RoomType ?>
		<td<?php echo $room_master->RoomType->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCnt ?>_room_master_RoomType" class="room_master_RoomType">
<span<?php echo $room_master->RoomType->viewAttributes() ?>>
<?php echo $room_master->RoomType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master->SharingRoom->Visible) { // SharingRoom ?>
		<td<?php echo $room_master->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCnt ?>_room_master_SharingRoom" class="room_master_SharingRoom">
<span<?php echo $room_master->SharingRoom->viewAttributes() ?>>
<?php echo $room_master->SharingRoom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master->Amount->Visible) { // Amount ?>
		<td<?php echo $room_master->Amount->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCnt ?>_room_master_Amount" class="room_master_Amount">
<span<?php echo $room_master->Amount->viewAttributes() ?>>
<?php echo $room_master->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_master->Status->Visible) { // Status ?>
		<td<?php echo $room_master->Status->cellAttributes() ?>>
<span id="el<?php echo $room_master_delete->RowCnt ?>_room_master_Status" class="room_master_Status">
<span<?php echo $room_master->Status->viewAttributes() ?>>
<?php echo $room_master->Status->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$room_master_delete->terminate();
?>