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
$pharmacy_master_product_similar_view = new pharmacy_master_product_similar_view();

// Run the page
$pharmacy_master_product_similar_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_product_similar_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_master_product_similar_view->isExport()) { ?>
<script>
var fpharmacy_master_product_similarview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_master_product_similarview = currentForm = new ew.Form("fpharmacy_master_product_similarview", "view");
	loadjs.done("fpharmacy_master_product_similarview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_master_product_similar_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_master_product_similar_view->ExportOptions->render("body") ?>
<?php $pharmacy_master_product_similar_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_master_product_similar_view->showPageHeader(); ?>
<?php
$pharmacy_master_product_similar_view->showMessage();
?>
<form name="fpharmacy_master_product_similarview" id="fpharmacy_master_product_similarview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_product_similar_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_master_product_similar_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_PRC"><?php echo $pharmacy_master_product_similar_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $pharmacy_master_product_similar_view->PRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRC">
<span<?php echo $pharmacy_master_product_similar_view->PRC->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_product_similar_view->MAINPRC->Visible) { // MAINPRC ?>
	<tr id="r_MAINPRC">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_MAINPRC"><?php echo $pharmacy_master_product_similar_view->MAINPRC->caption() ?></span></td>
		<td data-name="MAINPRC" <?php echo $pharmacy_master_product_similar_view->MAINPRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_MAINPRC">
<span<?php echo $pharmacy_master_product_similar_view->MAINPRC->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_view->MAINPRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_product_similar_view->PRTYPE->Visible) { // PRTYPE ?>
	<tr id="r_PRTYPE">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_PRTYPE"><?php echo $pharmacy_master_product_similar_view->PRTYPE->caption() ?></span></td>
		<td data-name="PRTYPE" <?php echo $pharmacy_master_product_similar_view->PRTYPE->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRTYPE">
<span<?php echo $pharmacy_master_product_similar_view->PRTYPE->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_view->PRTYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_product_similar_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_master_product_similar_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_id"><?php echo $pharmacy_master_product_similar_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_master_product_similar_view->id->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_id">
<span<?php echo $pharmacy_master_product_similar_view->id->viewAttributes() ?>><?php echo $pharmacy_master_product_similar_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_master_product_similar_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_product_similar_view->isExport()) { ?>
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
$pharmacy_master_product_similar_view->terminate();
?>