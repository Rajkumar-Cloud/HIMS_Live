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
$pres_tradenames_new_view = new pres_tradenames_new_view();

// Run the page
$pres_tradenames_new_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_tradenames_new_view->isExport()) { ?>
<script>
var fpres_tradenames_newview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_tradenames_newview = currentForm = new ew.Form("fpres_tradenames_newview", "view");
	loadjs.done("fpres_tradenames_newview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_tradenames_new_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_tradenames_new_view->ExportOptions->render("body") ?>
<?php $pres_tradenames_new_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_tradenames_new_view->showPageHeader(); ?>
<?php
$pres_tradenames_new_view->showMessage();
?>
<form name="fpres_tradenames_newview" id="fpres_tradenames_newview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="modal" value="<?php echo (int)$pres_tradenames_new_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_tradenames_new_view->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_ID"><?php echo $pres_tradenames_new_view->ID->caption() ?></span></td>
		<td data-name="ID" <?php echo $pres_tradenames_new_view->ID->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ID">
<span<?php echo $pres_tradenames_new_view->ID->viewAttributes() ?>><?php echo $pres_tradenames_new_view->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Drug_Name->Visible) { // Drug_Name ?>
	<tr id="r_Drug_Name">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Drug_Name"><?php echo $pres_tradenames_new_view->Drug_Name->caption() ?></span></td>
		<td data-name="Drug_Name" <?php echo $pres_tradenames_new_view->Drug_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Drug_Name">
<span<?php echo $pres_tradenames_new_view->Drug_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Drug_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Generic_Name->Visible) { // Generic_Name ?>
	<tr id="r_Generic_Name">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name"><?php echo $pres_tradenames_new_view->Generic_Name->caption() ?></span></td>
		<td data-name="Generic_Name" <?php echo $pres_tradenames_new_view->Generic_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name">
<span<?php echo $pres_tradenames_new_view->Generic_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Generic_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Trade_Name->Visible) { // Trade_Name ?>
	<tr id="r_Trade_Name">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Trade_Name"><?php echo $pres_tradenames_new_view->Trade_Name->caption() ?></span></td>
		<td data-name="Trade_Name" <?php echo $pres_tradenames_new_view->Trade_Name->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Trade_Name">
<span<?php echo $pres_tradenames_new_view->Trade_Name->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Trade_Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->PR_CODE->Visible) { // PR_CODE ?>
	<tr id="r_PR_CODE">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_PR_CODE"><?php echo $pres_tradenames_new_view->PR_CODE->caption() ?></span></td>
		<td data-name="PR_CODE" <?php echo $pres_tradenames_new_view->PR_CODE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_PR_CODE">
<span<?php echo $pres_tradenames_new_view->PR_CODE->viewAttributes() ?>><?php echo $pres_tradenames_new_view->PR_CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Form"><?php echo $pres_tradenames_new_view->Form->caption() ?></span></td>
		<td data-name="Form" <?php echo $pres_tradenames_new_view->Form->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Form">
<span<?php echo $pres_tradenames_new_view->Form->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Strength->Visible) { // Strength ?>
	<tr id="r_Strength">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength"><?php echo $pres_tradenames_new_view->Strength->caption() ?></span></td>
		<td data-name="Strength" <?php echo $pres_tradenames_new_view->Strength->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength">
<span<?php echo $pres_tradenames_new_view->Strength->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Strength->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Unit->Visible) { // Unit ?>
	<tr id="r_Unit">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit"><?php echo $pres_tradenames_new_view->Unit->caption() ?></span></td>
		<td data-name="Unit" <?php echo $pres_tradenames_new_view->Unit->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit">
<span<?php echo $pres_tradenames_new_view->Unit->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<tr id="r_CONTAINER_TYPE">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_CONTAINER_TYPE"><?php echo $pres_tradenames_new_view->CONTAINER_TYPE->caption() ?></span></td>
		<td data-name="CONTAINER_TYPE" <?php echo $pres_tradenames_new_view->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_TYPE">
<span<?php echo $pres_tradenames_new_view->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_tradenames_new_view->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<tr id="r_CONTAINER_STRENGTH">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_CONTAINER_STRENGTH"><?php echo $pres_tradenames_new_view->CONTAINER_STRENGTH->caption() ?></span></td>
		<td data-name="CONTAINER_STRENGTH" <?php echo $pres_tradenames_new_view->CONTAINER_STRENGTH->cellAttributes() ?>>
<span id="el_pres_tradenames_new_CONTAINER_STRENGTH">
<span<?php echo $pres_tradenames_new_view->CONTAINER_STRENGTH->viewAttributes() ?>><?php echo $pres_tradenames_new_view->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<tr id="r_TypeOfDrug">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_TypeOfDrug"><?php echo $pres_tradenames_new_view->TypeOfDrug->caption() ?></span></td>
		<td data-name="TypeOfDrug" <?php echo $pres_tradenames_new_view->TypeOfDrug->cellAttributes() ?>>
<span id="el_pres_tradenames_new_TypeOfDrug">
<span<?php echo $pres_tradenames_new_view->TypeOfDrug->viewAttributes() ?>><?php echo $pres_tradenames_new_view->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->ProductType->Visible) { // ProductType ?>
	<tr id="r_ProductType">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_ProductType"><?php echo $pres_tradenames_new_view->ProductType->caption() ?></span></td>
		<td data-name="ProductType" <?php echo $pres_tradenames_new_view->ProductType->cellAttributes() ?>>
<span id="el_pres_tradenames_new_ProductType">
<span<?php echo $pres_tradenames_new_view->ProductType->viewAttributes() ?>><?php echo $pres_tradenames_new_view->ProductType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Generic_Name1->Visible) { // Generic_Name1 ?>
	<tr id="r_Generic_Name1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name1"><?php echo $pres_tradenames_new_view->Generic_Name1->caption() ?></span></td>
		<td data-name="Generic_Name1" <?php echo $pres_tradenames_new_view->Generic_Name1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name1">
<span<?php echo $pres_tradenames_new_view->Generic_Name1->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Generic_Name1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Strength1->Visible) { // Strength1 ?>
	<tr id="r_Strength1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength1"><?php echo $pres_tradenames_new_view->Strength1->caption() ?></span></td>
		<td data-name="Strength1" <?php echo $pres_tradenames_new_view->Strength1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength1">
<span<?php echo $pres_tradenames_new_view->Strength1->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Strength1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Unit1->Visible) { // Unit1 ?>
	<tr id="r_Unit1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit1"><?php echo $pres_tradenames_new_view->Unit1->caption() ?></span></td>
		<td data-name="Unit1" <?php echo $pres_tradenames_new_view->Unit1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit1">
<span<?php echo $pres_tradenames_new_view->Unit1->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Unit1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Generic_Name2->Visible) { // Generic_Name2 ?>
	<tr id="r_Generic_Name2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name2"><?php echo $pres_tradenames_new_view->Generic_Name2->caption() ?></span></td>
		<td data-name="Generic_Name2" <?php echo $pres_tradenames_new_view->Generic_Name2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name2">
<span<?php echo $pres_tradenames_new_view->Generic_Name2->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Generic_Name2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Strength2->Visible) { // Strength2 ?>
	<tr id="r_Strength2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength2"><?php echo $pres_tradenames_new_view->Strength2->caption() ?></span></td>
		<td data-name="Strength2" <?php echo $pres_tradenames_new_view->Strength2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength2">
<span<?php echo $pres_tradenames_new_view->Strength2->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Strength2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Unit2->Visible) { // Unit2 ?>
	<tr id="r_Unit2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit2"><?php echo $pres_tradenames_new_view->Unit2->caption() ?></span></td>
		<td data-name="Unit2" <?php echo $pres_tradenames_new_view->Unit2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit2">
<span<?php echo $pres_tradenames_new_view->Unit2->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Unit2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Generic_Name3->Visible) { // Generic_Name3 ?>
	<tr id="r_Generic_Name3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name3"><?php echo $pres_tradenames_new_view->Generic_Name3->caption() ?></span></td>
		<td data-name="Generic_Name3" <?php echo $pres_tradenames_new_view->Generic_Name3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name3">
<span<?php echo $pres_tradenames_new_view->Generic_Name3->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Generic_Name3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Strength3->Visible) { // Strength3 ?>
	<tr id="r_Strength3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength3"><?php echo $pres_tradenames_new_view->Strength3->caption() ?></span></td>
		<td data-name="Strength3" <?php echo $pres_tradenames_new_view->Strength3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength3">
<span<?php echo $pres_tradenames_new_view->Strength3->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Strength3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Unit3->Visible) { // Unit3 ?>
	<tr id="r_Unit3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit3"><?php echo $pres_tradenames_new_view->Unit3->caption() ?></span></td>
		<td data-name="Unit3" <?php echo $pres_tradenames_new_view->Unit3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit3">
<span<?php echo $pres_tradenames_new_view->Unit3->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Unit3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Generic_Name4->Visible) { // Generic_Name4 ?>
	<tr id="r_Generic_Name4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name4"><?php echo $pres_tradenames_new_view->Generic_Name4->caption() ?></span></td>
		<td data-name="Generic_Name4" <?php echo $pres_tradenames_new_view->Generic_Name4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name4">
<span<?php echo $pres_tradenames_new_view->Generic_Name4->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Generic_Name4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Generic_Name5->Visible) { // Generic_Name5 ?>
	<tr id="r_Generic_Name5">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Generic_Name5"><?php echo $pres_tradenames_new_view->Generic_Name5->caption() ?></span></td>
		<td data-name="Generic_Name5" <?php echo $pres_tradenames_new_view->Generic_Name5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Generic_Name5">
<span<?php echo $pres_tradenames_new_view->Generic_Name5->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Generic_Name5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Strength4->Visible) { // Strength4 ?>
	<tr id="r_Strength4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength4"><?php echo $pres_tradenames_new_view->Strength4->caption() ?></span></td>
		<td data-name="Strength4" <?php echo $pres_tradenames_new_view->Strength4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength4">
<span<?php echo $pres_tradenames_new_view->Strength4->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Strength4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Strength5->Visible) { // Strength5 ?>
	<tr id="r_Strength5">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Strength5"><?php echo $pres_tradenames_new_view->Strength5->caption() ?></span></td>
		<td data-name="Strength5" <?php echo $pres_tradenames_new_view->Strength5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Strength5">
<span<?php echo $pres_tradenames_new_view->Strength5->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Strength5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Unit4->Visible) { // Unit4 ?>
	<tr id="r_Unit4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit4"><?php echo $pres_tradenames_new_view->Unit4->caption() ?></span></td>
		<td data-name="Unit4" <?php echo $pres_tradenames_new_view->Unit4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit4">
<span<?php echo $pres_tradenames_new_view->Unit4->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Unit4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->Unit5->Visible) { // Unit5 ?>
	<tr id="r_Unit5">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_Unit5"><?php echo $pres_tradenames_new_view->Unit5->caption() ?></span></td>
		<td data-name="Unit5" <?php echo $pres_tradenames_new_view->Unit5->cellAttributes() ?>>
<span id="el_pres_tradenames_new_Unit5">
<span<?php echo $pres_tradenames_new_view->Unit5->viewAttributes() ?>><?php echo $pres_tradenames_new_view->Unit5->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->AlterNative1->Visible) { // AlterNative1 ?>
	<tr id="r_AlterNative1">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative1"><?php echo $pres_tradenames_new_view->AlterNative1->caption() ?></span></td>
		<td data-name="AlterNative1" <?php echo $pres_tradenames_new_view->AlterNative1->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative1">
<span<?php echo $pres_tradenames_new_view->AlterNative1->viewAttributes() ?>><?php echo $pres_tradenames_new_view->AlterNative1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->AlterNative2->Visible) { // AlterNative2 ?>
	<tr id="r_AlterNative2">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative2"><?php echo $pres_tradenames_new_view->AlterNative2->caption() ?></span></td>
		<td data-name="AlterNative2" <?php echo $pres_tradenames_new_view->AlterNative2->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative2">
<span<?php echo $pres_tradenames_new_view->AlterNative2->viewAttributes() ?>><?php echo $pres_tradenames_new_view->AlterNative2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->AlterNative3->Visible) { // AlterNative3 ?>
	<tr id="r_AlterNative3">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative3"><?php echo $pres_tradenames_new_view->AlterNative3->caption() ?></span></td>
		<td data-name="AlterNative3" <?php echo $pres_tradenames_new_view->AlterNative3->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative3">
<span<?php echo $pres_tradenames_new_view->AlterNative3->viewAttributes() ?>><?php echo $pres_tradenames_new_view->AlterNative3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_tradenames_new_view->AlterNative4->Visible) { // AlterNative4 ?>
	<tr id="r_AlterNative4">
		<td class="<?php echo $pres_tradenames_new_view->TableLeftColumnClass ?>"><span id="elh_pres_tradenames_new_AlterNative4"><?php echo $pres_tradenames_new_view->AlterNative4->caption() ?></span></td>
		<td data-name="AlterNative4" <?php echo $pres_tradenames_new_view->AlterNative4->cellAttributes() ?>>
<span id="el_pres_tradenames_new_AlterNative4">
<span<?php echo $pres_tradenames_new_view->AlterNative4->viewAttributes() ?>><?php echo $pres_tradenames_new_view->AlterNative4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pres_trade_combination_names_new", explode(",", $pres_tradenames_new->getCurrentDetailTable())) && $pres_trade_combination_names_new->DetailView) {
?>
<?php if ($pres_tradenames_new->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pres_trade_combination_names_new", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pres_trade_combination_names_newgrid.php" ?>
<?php } ?>
</form>
<?php
$pres_tradenames_new_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_tradenames_new_view->isExport()) { ?>
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
$pres_tradenames_new_view->terminate();
?>