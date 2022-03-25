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
$lab_mas_sampletype_view = new lab_mas_sampletype_view();

// Run the page
$lab_mas_sampletype_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_sampletype_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_mas_sampletype_view->isExport()) { ?>
<script>
var flab_mas_sampletypeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flab_mas_sampletypeview = currentForm = new ew.Form("flab_mas_sampletypeview", "view");
	loadjs.done("flab_mas_sampletypeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_mas_sampletype_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_mas_sampletype_view->ExportOptions->render("body") ?>
<?php $lab_mas_sampletype_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_mas_sampletype_view->showPageHeader(); ?>
<?php
$lab_mas_sampletype_view->showMessage();
?>
<form name="flab_mas_sampletypeview" id="flab_mas_sampletypeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_sampletype">
<input type="hidden" name="modal" value="<?php echo (int)$lab_mas_sampletype_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_mas_sampletype_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_mas_sampletype_view->TableLeftColumnClass ?>"><span id="elh_lab_mas_sampletype_id"><?php echo $lab_mas_sampletype_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $lab_mas_sampletype_view->id->cellAttributes() ?>>
<span id="el_lab_mas_sampletype_id">
<span<?php echo $lab_mas_sampletype_view->id->viewAttributes() ?>><?php echo $lab_mas_sampletype_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_mas_sampletype_view->CATEGORY->Visible) { // CATEGORY ?>
	<tr id="r_CATEGORY">
		<td class="<?php echo $lab_mas_sampletype_view->TableLeftColumnClass ?>"><span id="elh_lab_mas_sampletype_CATEGORY"><?php echo $lab_mas_sampletype_view->CATEGORY->caption() ?></span></td>
		<td data-name="CATEGORY" <?php echo $lab_mas_sampletype_view->CATEGORY->cellAttributes() ?>>
<span id="el_lab_mas_sampletype_CATEGORY">
<span<?php echo $lab_mas_sampletype_view->CATEGORY->viewAttributes() ?>><?php echo $lab_mas_sampletype_view->CATEGORY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_mas_sampletype_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_mas_sampletype_view->isExport()) { ?>
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
$lab_mas_sampletype_view->terminate();
?>