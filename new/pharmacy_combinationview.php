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
$pharmacy_combination_view = new pharmacy_combination_view();

// Run the page
$pharmacy_combination_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_combination_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_combination_view->isExport()) { ?>
<script>
var fpharmacy_combinationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_combinationview = currentForm = new ew.Form("fpharmacy_combinationview", "view");
	loadjs.done("fpharmacy_combinationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_combination_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_combination_view->ExportOptions->render("body") ?>
<?php $pharmacy_combination_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_combination_view->showPageHeader(); ?>
<?php
$pharmacy_combination_view->showMessage();
?>
<form name="fpharmacy_combinationview" id="fpharmacy_combinationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_combination_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_combination_view->GENCODE->Visible) { // GENCODE ?>
	<tr id="r_GENCODE">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_GENCODE"><?php echo $pharmacy_combination_view->GENCODE->caption() ?></span></td>
		<td data-name="GENCODE" <?php echo $pharmacy_combination_view->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_GENCODE">
<span<?php echo $pharmacy_combination_view->GENCODE->viewAttributes() ?>><?php echo $pharmacy_combination_view->GENCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination_view->COMBCODE->Visible) { // COMBCODE ?>
	<tr id="r_COMBCODE">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_COMBCODE"><?php echo $pharmacy_combination_view->COMBCODE->caption() ?></span></td>
		<td data-name="COMBCODE" <?php echo $pharmacy_combination_view->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_COMBCODE">
<span<?php echo $pharmacy_combination_view->COMBCODE->viewAttributes() ?>><?php echo $pharmacy_combination_view->COMBCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination_view->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_STRENGTH"><?php echo $pharmacy_combination_view->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH" <?php echo $pharmacy_combination_view->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_combination_STRENGTH">
<span<?php echo $pharmacy_combination_view->STRENGTH->viewAttributes() ?>><?php echo $pharmacy_combination_view->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination_view->SLNO->Visible) { // SLNO ?>
	<tr id="r_SLNO">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_SLNO"><?php echo $pharmacy_combination_view->SLNO->caption() ?></span></td>
		<td data-name="SLNO" <?php echo $pharmacy_combination_view->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_combination_SLNO">
<span<?php echo $pharmacy_combination_view->SLNO->viewAttributes() ?>><?php echo $pharmacy_combination_view->SLNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_combination_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_combination_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_id"><?php echo $pharmacy_combination_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_combination_view->id->cellAttributes() ?>>
<span id="el_pharmacy_combination_id">
<span<?php echo $pharmacy_combination_view->id->viewAttributes() ?>><?php echo $pharmacy_combination_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_combination_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_combination_view->isExport()) { ?>
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
$pharmacy_combination_view->terminate();
?>