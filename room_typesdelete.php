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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var froom_typesdelete = currentForm = new ew.Form("froom_typesdelete", "delete");

// Form_CustomValidate event
froom_typesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
froom_typesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $room_types_delete->showPageHeader(); ?>
<?php
$room_types_delete->showMessage();
?>
<form name="froom_typesdelete" id="froom_typesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($room_types_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $room_types_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_types">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($room_types_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($room_types->Id->Visible) { // Id ?>
		<th class="<?php echo $room_types->Id->headerCellClass() ?>"><span id="elh_room_types_Id" class="room_types_Id"><?php echo $room_types->Id->caption() ?></span></th>
<?php } ?>
<?php if ($room_types->Types->Visible) { // Types ?>
		<th class="<?php echo $room_types->Types->headerCellClass() ?>"><span id="elh_room_types_Types" class="room_types_Types"><?php echo $room_types->Types->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$room_types_delete->RecCnt = 0;
$i = 0;
while (!$room_types_delete->Recordset->EOF) {
	$room_types_delete->RecCnt++;
	$room_types_delete->RowCnt++;

	// Set row properties
	$room_types->resetAttributes();
	$room_types->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$room_types_delete->loadRowValues($room_types_delete->Recordset);

	// Render row
	$room_types_delete->renderRow();
?>
	<tr<?php echo $room_types->rowAttributes() ?>>
<?php if ($room_types->Id->Visible) { // Id ?>
		<td<?php echo $room_types->Id->cellAttributes() ?>>
<span id="el<?php echo $room_types_delete->RowCnt ?>_room_types_Id" class="room_types_Id">
<span<?php echo $room_types->Id->viewAttributes() ?>>
<?php echo $room_types->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($room_types->Types->Visible) { // Types ?>
		<td<?php echo $room_types->Types->cellAttributes() ?>>
<span id="el<?php echo $room_types_delete->RowCnt ?>_room_types_Types" class="room_types_Types">
<span<?php echo $room_types->Types->viewAttributes() ?>>
<?php echo $room_types->Types->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$room_types_delete->terminate();
?>