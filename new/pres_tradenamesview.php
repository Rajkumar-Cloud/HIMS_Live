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
$pres_tradenames_view = new pres_tradenames_view();

// Run the page
$pres_tradenames_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_tradenames_view->isExport()) { ?>
<script>
var fpres_tradenamesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_tradenamesview = currentForm = new ew.Form("fpres_tradenamesview", "view");
	loadjs.done("fpres_tradenamesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_tradenames_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_tradenames_view->ExportOptions->render("body") ?>
<?php $pres_tradenames_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_tradenames_view->showPageHeader(); ?>
<?php
$pres_tradenames_view->showMessage();
?>
<form name="fpres_tradenamesview" id="fpres_tradenamesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames">
<input type="hidden" name="modal" value="<?php echo (int)$pres_tradenames_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_tradenames_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_id"><?php echo $pres_tradenames_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_tradenames_view->id->cellAttributes() ?>>
<span id="el_pres_tradenames_id">
<span<?php echo $pres_tradenames_view->id->viewAttributes() ?>><?php echo $pres_tradenames_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_view->GENERIC_NAMES->Visible) { // GENERIC_NAMES ?>
	<tr id="r_GENERIC_NAMES">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_GENERIC_NAMES"><?php echo $pres_tradenames_view->GENERIC_NAMES->caption() ?></span></td>
		<td data-name="GENERIC_NAMES" <?php echo $pres_tradenames_view->GENERIC_NAMES->cellAttributes() ?>>
<span id="el_pres_tradenames_GENERIC_NAMES">
<span<?php echo $pres_tradenames_view->GENERIC_NAMES->viewAttributes() ?>><?php echo $pres_tradenames_view->GENERIC_NAMES->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_view->TRADE_NAME->Visible) { // TRADE_NAME ?>
	<tr id="r_TRADE_NAME">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_TRADE_NAME"><?php echo $pres_tradenames_view->TRADE_NAME->caption() ?></span></td>
		<td data-name="TRADE_NAME" <?php echo $pres_tradenames_view->TRADE_NAME->cellAttributes() ?>>
<span id="el_pres_tradenames_TRADE_NAME">
<span<?php echo $pres_tradenames_view->TRADE_NAME->viewAttributes() ?>><?php echo $pres_tradenames_view->TRADE_NAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_view->Drug_Name->Visible) { // Drug_Name ?>
	<tr id="r_Drug_Name">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_Drug_Name"><?php echo $pres_tradenames_view->Drug_Name->caption() ?></span></td>
		<td data-name="Drug_Name" <?php echo $pres_tradenames_view->Drug_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_Drug_Name">
<span<?php echo $pres_tradenames_view->Drug_Name->viewAttributes() ?>><?php echo $pres_tradenames_view->Drug_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_view->PR_CODE->Visible) { // PR_CODE ?>
	<tr id="r_PR_CODE">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_PR_CODE"><?php echo $pres_tradenames_view->PR_CODE->caption() ?></span></td>
		<td data-name="PR_CODE" <?php echo $pres_tradenames_view->PR_CODE->cellAttributes() ?>>
<span id="el_pres_tradenames_PR_CODE">
<span<?php echo $pres_tradenames_view->PR_CODE->viewAttributes() ?>><?php echo $pres_tradenames_view->PR_CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_view->GenericNames_symbols->Visible) { // GenericNames_symbols ?>
	<tr id="r_GenericNames_symbols">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_GenericNames_symbols"><?php echo $pres_tradenames_view->GenericNames_symbols->caption() ?></span></td>
		<td data-name="GenericNames_symbols" <?php echo $pres_tradenames_view->GenericNames_symbols->cellAttributes() ?>>
<span id="el_pres_tradenames_GenericNames_symbols">
<span<?php echo $pres_tradenames_view->GenericNames_symbols->viewAttributes() ?>><?php echo $pres_tradenames_view->GenericNames_symbols->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_view->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<tr id="r_CONTAINER_TYPE">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_CONTAINER_TYPE"><?php echo $pres_tradenames_view->CONTAINER_TYPE->caption() ?></span></td>
		<td data-name="CONTAINER_TYPE" <?php echo $pres_tradenames_view->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_tradenames_CONTAINER_TYPE">
<span<?php echo $pres_tradenames_view->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_tradenames_view->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_view->STRENGTH->Visible) { // STRENGTH ?>
	<tr id="r_STRENGTH">
		<td class="<?php echo $pres_tradenames_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_STRENGTH"><?php echo $pres_tradenames_view->STRENGTH->caption() ?></span></td>
		<td data-name="STRENGTH" <?php echo $pres_tradenames_view->STRENGTH->cellAttributes() ?>>
<span id="el_pres_tradenames_STRENGTH">
<span<?php echo $pres_tradenames_view->STRENGTH->viewAttributes() ?>><?php echo $pres_tradenames_view->STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_tradenames_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_tradenames_view->isExport()) { ?>
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
$pres_tradenames_view->terminate();
?>