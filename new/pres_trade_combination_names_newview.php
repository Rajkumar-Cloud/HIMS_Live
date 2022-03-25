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
$pres_trade_combination_names_new_view = new pres_trade_combination_names_new_view();

// Run the page
$pres_trade_combination_names_new_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_trade_combination_names_new_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_trade_combination_names_new_view->isExport()) { ?>
<script>
var fpres_trade_combination_names_newview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_trade_combination_names_newview = currentForm = new ew.Form("fpres_trade_combination_names_newview", "view");
	loadjs.done("fpres_trade_combination_names_newview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_trade_combination_names_new_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_trade_combination_names_new_view->ExportOptions->render("body") ?>
<?php $pres_trade_combination_names_new_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_trade_combination_names_new_view->showPageHeader(); ?>
<?php
$pres_trade_combination_names_new_view->showMessage();
?>
<form name="fpres_trade_combination_names_newview" id="fpres_trade_combination_names_newview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<input type="hidden" name="modal" value="<?php echo (int)$pres_trade_combination_names_new_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_trade_combination_names_new_view->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_ID"><?php echo $pres_trade_combination_names_new_view->ID->caption() ?></span></td>
		<td data-name="ID" <?php echo $pres_trade_combination_names_new_view->ID->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_ID">
<span<?php echo $pres_trade_combination_names_new_view->ID->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->tradenames_id->Visible) { // tradenames_id ?>
	<tr id="r_tradenames_id">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_tradenames_id"><?php echo $pres_trade_combination_names_new_view->tradenames_id->caption() ?></span></td>
		<td data-name="tradenames_id" <?php echo $pres_trade_combination_names_new_view->tradenames_id->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_tradenames_id">
<span<?php echo $pres_trade_combination_names_new_view->tradenames_id->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->tradenames_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->Drug_Name->Visible) { // Drug_Name ?>
	<tr id="r_Drug_Name">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Drug_Name"><?php echo $pres_trade_combination_names_new_view->Drug_Name->caption() ?></span></td>
		<td data-name="Drug_Name" <?php echo $pres_trade_combination_names_new_view->Drug_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Drug_Name">
<span<?php echo $pres_trade_combination_names_new_view->Drug_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->Drug_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->Generic_Name->Visible) { // Generic_Name ?>
	<tr id="r_Generic_Name">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Generic_Name"><?php echo $pres_trade_combination_names_new_view->Generic_Name->caption() ?></span></td>
		<td data-name="Generic_Name" <?php echo $pres_trade_combination_names_new_view->Generic_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Generic_Name">
<span<?php echo $pres_trade_combination_names_new_view->Generic_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->Generic_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->Trade_Name->Visible) { // Trade_Name ?>
	<tr id="r_Trade_Name">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Trade_Name"><?php echo $pres_trade_combination_names_new_view->Trade_Name->caption() ?></span></td>
		<td data-name="Trade_Name" <?php echo $pres_trade_combination_names_new_view->Trade_Name->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Trade_Name">
<span<?php echo $pres_trade_combination_names_new_view->Trade_Name->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->Trade_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->PR_CODE->Visible) { // PR_CODE ?>
	<tr id="r_PR_CODE">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_PR_CODE"><?php echo $pres_trade_combination_names_new_view->PR_CODE->caption() ?></span></td>
		<td data-name="PR_CODE" <?php echo $pres_trade_combination_names_new_view->PR_CODE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_PR_CODE">
<span<?php echo $pres_trade_combination_names_new_view->PR_CODE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->PR_CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Form"><?php echo $pres_trade_combination_names_new_view->Form->caption() ?></span></td>
		<td data-name="Form" <?php echo $pres_trade_combination_names_new_view->Form->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Form">
<span<?php echo $pres_trade_combination_names_new_view->Form->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->Strength->Visible) { // Strength ?>
	<tr id="r_Strength">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Strength"><?php echo $pres_trade_combination_names_new_view->Strength->caption() ?></span></td>
		<td data-name="Strength" <?php echo $pres_trade_combination_names_new_view->Strength->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Strength">
<span<?php echo $pres_trade_combination_names_new_view->Strength->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->Strength->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->Unit->Visible) { // Unit ?>
	<tr id="r_Unit">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_Unit"><?php echo $pres_trade_combination_names_new_view->Unit->caption() ?></span></td>
		<td data-name="Unit" <?php echo $pres_trade_combination_names_new_view->Unit->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_Unit">
<span<?php echo $pres_trade_combination_names_new_view->Unit->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<tr id="r_CONTAINER_TYPE">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_TYPE"><?php echo $pres_trade_combination_names_new_view->CONTAINER_TYPE->caption() ?></span></td>
		<td data-name="CONTAINER_TYPE" <?php echo $pres_trade_combination_names_new_view->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?php echo $pres_trade_combination_names_new_view->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<tr id="r_CONTAINER_STRENGTH">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH"><?php echo $pres_trade_combination_names_new_view->CONTAINER_STRENGTH->caption() ?></span></td>
		<td data-name="CONTAINER_STRENGTH" <?php echo $pres_trade_combination_names_new_view->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?php echo $pres_trade_combination_names_new_view->CONTAINER_STRENGTH->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_trade_combination_names_new_view->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<tr id="r_TypeOfDrug">
		<td class="<?php echo $pres_trade_combination_names_new_view->TableLeftColumnClass ?>"><span id="elh_pres_trade_combination_names_new_TypeOfDrug"><?php echo $pres_trade_combination_names_new_view->TypeOfDrug->caption() ?></span></td>
		<td data-name="TypeOfDrug" <?php echo $pres_trade_combination_names_new_view->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_trade_combination_names_new_TypeOfDrug">
<span<?php echo $pres_trade_combination_names_new_view->TypeOfDrug->viewAttributes() ?>><?php echo $pres_trade_combination_names_new_view->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_trade_combination_names_new_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_trade_combination_names_new_view->isExport()) { ?>
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
$pres_trade_combination_names_new_view->terminate();
?>