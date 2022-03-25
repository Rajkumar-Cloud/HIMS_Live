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
<?php include_once "header.php"; ?>
<?php if (!$room_types_view->isExport()) { ?>
<script>
var froom_typesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	froom_typesview = currentForm = new ew.Form("froom_typesview", "view");
	loadjs.done("froom_typesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$room_types_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="room_types">
<input type="hidden" name="modal" value="<?php echo (int)$room_types_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($room_types_view->Id->Visible) { // Id ?>
	<tr id="r_Id">
		<td class="<?php echo $room_types_view->TableLeftColumnClass ?>"><span id="elh_room_types_Id"><?php echo $room_types_view->Id->caption() ?></span></td>
		<td data-name="Id" <?php echo $room_types_view->Id->cellAttributes() ?>>
<span id="el_room_types_Id">
<span<?php echo $room_types_view->Id->viewAttributes() ?>><?php echo $room_types_view->Id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($room_types_view->Types->Visible) { // Types ?>
	<tr id="r_Types">
		<td class="<?php echo $room_types_view->TableLeftColumnClass ?>"><span id="elh_room_types_Types"><?php echo $room_types_view->Types->caption() ?></span></td>
		<td data-name="Types" <?php echo $room_types_view->Types->cellAttributes() ?>>
<span id="el_room_types_Types">
<span<?php echo $room_types_view->Types->viewAttributes() ?>><?php echo $room_types_view->Types->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$room_types_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$room_types_view->isExport()) { ?>
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
$room_types_view->terminate();
?>