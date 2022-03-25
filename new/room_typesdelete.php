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
$room_types_delete = new room_types_delete();

// Run the page
$room_types_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_types_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var froom_typesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	froom_typesdelete = currentForm = new ew.Form("froom_typesdelete", "delete");
	loadjs.done("froom_typesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $room_types_delete->showPageHeader(); ?>
<?php
$room_types_delete->showMessage();
?>
<form name="froom_typesdelete" id="froom_typesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_types">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($room_types_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($room_types_delete->Id->Visible) { // Id ?>
		<th class="<?php echo $room_types_delete->Id->headerCellClass() ?>"><span id="elh_room_types_Id" class="room_types_Id"><?php echo $room_types_delete->Id->caption() ?></span></th>
<?php } ?>
<?php if ($room_types_delete->Types->Visible) { // Types ?>
		<th class="<?php echo $room_types_delete->Types->headerCellClass() ?>"><span id="elh_room_types_Types" class="room_types_Types"><?php echo $room_types_delete->Types->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$room_types_delete->RecordCount = 0;
$i = 0;
while (!$room_types_delete->Recordset->EOF) {
	$room_types_delete->RecordCount++;
	$room_types_delete->RowCount++;

	// Set row properties
	$room_types->resetAttributes();
	$room_types->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$room_types_delete->loadRowValues($room_types_delete->Recordset);

	// Render row
	$room_types_delete->renderRow();
?>
	<tr <?php echo $room_types->rowAttributes() ?>>
<?php if ($room_types_delete->Id->Visible) { // Id ?>
		<td <?php echo $room_types_delete->Id->cellAttributes() ?>>
<span id="el<?php echo $room_types_delete->RowCount ?>_room_types_Id" class="room_types_Id">
<span<?php echo $room_types_delete->Id->viewAttributes() ?>><?php echo $room_types_delete->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_types_delete->Types->Visible) { // Types ?>
		<td <?php echo $room_types_delete->Types->cellAttributes() ?>>
<span id="el<?php echo $room_types_delete->RowCount ?>_room_types_Types" class="room_types_Types">
<span<?php echo $room_types_delete->Types->viewAttributes() ?>><?php echo $room_types_delete->Types->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$room_types_delete->Recordset->moveNext();
}
$room_types_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $room_types_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$room_types_delete->showPageFooter();
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
$room_types_delete->terminate();
?>