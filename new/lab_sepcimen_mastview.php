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
$lab_sepcimen_mast_view = new lab_sepcimen_mast_view();

// Run the page
$lab_sepcimen_mast_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sepcimen_mast_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_sepcimen_mast_view->isExport()) { ?>
<script>
var flab_sepcimen_mastview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flab_sepcimen_mastview = currentForm = new ew.Form("flab_sepcimen_mastview", "view");
	loadjs.done("flab_sepcimen_mastview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_sepcimen_mast_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_sepcimen_mast_view->ExportOptions->render("body") ?>
<?php $lab_sepcimen_mast_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_sepcimen_mast_view->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_view->showMessage();
?>
<form name="flab_sepcimen_mastview" id="flab_sepcimen_mastview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="modal" value="<?php echo (int)$lab_sepcimen_mast_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_sepcimen_mast_view->SpecimenCD->Visible) { // SpecimenCD ?>
	<tr id="r_SpecimenCD">
		<td class="<?php echo $lab_sepcimen_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_SpecimenCD"><?php echo $lab_sepcimen_mast_view->SpecimenCD->caption() ?></span></td>
		<td data-name="SpecimenCD" <?php echo $lab_sepcimen_mast_view->SpecimenCD->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenCD">
<span<?php echo $lab_sepcimen_mast_view->SpecimenCD->viewAttributes() ?>><?php echo $lab_sepcimen_mast_view->SpecimenCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sepcimen_mast_view->SpecimenDesc->Visible) { // SpecimenDesc ?>
	<tr id="r_SpecimenDesc">
		<td class="<?php echo $lab_sepcimen_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_SpecimenDesc"><?php echo $lab_sepcimen_mast_view->SpecimenDesc->caption() ?></span></td>
		<td data-name="SpecimenDesc" <?php echo $lab_sepcimen_mast_view->SpecimenDesc->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_SpecimenDesc">
<span<?php echo $lab_sepcimen_mast_view->SpecimenDesc->viewAttributes() ?>><?php echo $lab_sepcimen_mast_view->SpecimenDesc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_sepcimen_mast_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_sepcimen_mast_view->TableLeftColumnClass ?>"><span id="elh_lab_sepcimen_mast_id"><?php echo $lab_sepcimen_mast_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $lab_sepcimen_mast_view->id->cellAttributes() ?>>
<span id="el_lab_sepcimen_mast_id">
<span<?php echo $lab_sepcimen_mast_view->id->viewAttributes() ?>><?php echo $lab_sepcimen_mast_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_sepcimen_mast_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_sepcimen_mast_view->isExport()) { ?>
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
$lab_sepcimen_mast_view->terminate();
?>