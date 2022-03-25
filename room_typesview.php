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
$room_types_view = new room_types_view();

// Run the page
$room_types_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$room_types_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$room_types->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var froom_typesview = currentForm = new ew.Form("froom_typesview", "view");

// Form_CustomValidate event
froom_typesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
froom_typesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$room_types->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $room_types_view->ExportOptions->render("body") ?>
<?php $room_types_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $room_types_view->showPageHeader(); ?>
<?php
$room_types_view->showMessage();
?>
<form name="froom_typesview" id="froom_typesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($room_types_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $room_types_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_types">
<input type="hidden" name="modal" value="<?php echo (int)$room_types_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($room_types->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $room_types_view->TableLeftColumnClass ?>"><span id="elh_room_types_Id"><?php echo $room_types->Id->caption() ?></span></td>
		<td data-name="Id"<?php echo $room_types->Id->cellAttributes() ?>>
<span id="el_room_types_Id">
<span<?php echo $room_types->Id->viewAttributes() ?>>
<?php echo $room_types->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_types->Types->Visible) { // Types ?>
	<tr id="r_Types">
		<td class="<?php echo $room_types_view->TableLeftColumnClass ?>"><span id="elh_room_types_Types"><?php echo $room_types->Types->caption() ?></span></td>
		<td data-name="Types"<?php echo $room_types->Types->cellAttributes() ?>>
<span id="el_room_types_Types">
<span<?php echo $room_types->Types->viewAttributes() ?>>
<?php echo $room_types->Types->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$room_types_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$room_types->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$room_types_view->terminate();
?>