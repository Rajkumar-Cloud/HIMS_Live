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
$view_pharmacygrn_view = new view_pharmacygrn_view();

// Run the page
$view_pharmacygrn_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacygrn_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacygrn_view->isExport()) { ?>
<script>
var fview_pharmacygrnview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_pharmacygrnview = currentForm = new ew.Form("fview_pharmacygrnview", "view");
	loadjs.done("fview_pharmacygrnview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_pharmacygrn_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_pharmacygrn_view->ExportOptions->render("body") ?>
<?php $view_pharmacygrn_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_pharmacygrn_view->showPageHeader(); ?>
<?php
$view_pharmacygrn_view->showMessage();
?>
<form name="fview_pharmacygrnview" id="fview_pharmacygrnview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacygrn_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacygrn_view->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ORDNO"><?php echo $view_pharmacygrn_view->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO" <?php echo $view_pharmacygrn_view->ORDNO->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ORDNO">
<span<?php echo $view_pharmacygrn_view->ORDNO->viewAttributes() ?>><?php echo $view_pharmacygrn_view->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PRC"><?php echo $view_pharmacygrn_view->PRC->caption() ?></span></td>
		<td data-name="PRC" <?php echo $view_pharmacygrn_view->PRC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn_view->PRC->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_QTY"><?php echo $view_pharmacygrn_view->QTY->caption() ?></span></td>
		<td data-name="QTY" <?php echo $view_pharmacygrn_view->QTY->cellAttributes() ?>>
<span id="el_view_pharmacygrn_QTY">
<span<?php echo $view_pharmacygrn_view->QTY->viewAttributes() ?>><?php echo $view_pharmacygrn_view->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_DT"><?php echo $view_pharmacygrn_view->DT->caption() ?></span></td>
		<td data-name="DT" <?php echo $view_pharmacygrn_view->DT->cellAttributes() ?>>
<span id="el_view_pharmacygrn_DT">
<span<?php echo $view_pharmacygrn_view->DT->viewAttributes() ?>><?php echo $view_pharmacygrn_view->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PC"><?php echo $view_pharmacygrn_view->PC->caption() ?></span></td>
		<td data-name="PC" <?php echo $view_pharmacygrn_view->PC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PC">
<span<?php echo $view_pharmacygrn_view->PC->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_YM"><?php echo $view_pharmacygrn_view->YM->caption() ?></span></td>
		<td data-name="YM" <?php echo $view_pharmacygrn_view->YM->cellAttributes() ?>>
<span id="el_view_pharmacygrn_YM">
<span<?php echo $view_pharmacygrn_view->YM->viewAttributes() ?>><?php echo $view_pharmacygrn_view->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Stock"><?php echo $view_pharmacygrn_view->Stock->caption() ?></span></td>
		<td data-name="Stock" <?php echo $view_pharmacygrn_view->Stock->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Stock">
<span<?php echo $view_pharmacygrn_view->Stock->viewAttributes() ?>><?php echo $view_pharmacygrn_view->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_LastMonthSale"><?php echo $view_pharmacygrn_view->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale" <?php echo $view_pharmacygrn_view->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacygrn_LastMonthSale">
<span<?php echo $view_pharmacygrn_view->LastMonthSale->viewAttributes() ?>><?php echo $view_pharmacygrn_view->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Printcheck"><?php echo $view_pharmacygrn_view->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck" <?php echo $view_pharmacygrn_view->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Printcheck">
<span<?php echo $view_pharmacygrn_view->Printcheck->viewAttributes() ?>><?php echo $view_pharmacygrn_view->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_id"><?php echo $view_pharmacygrn_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $view_pharmacygrn_view->id->cellAttributes() ?>>
<span id="el_view_pharmacygrn_id">
<span<?php echo $view_pharmacygrn_view->id->viewAttributes() ?>><?php echo $view_pharmacygrn_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_poid"><?php echo $view_pharmacygrn_view->poid->caption() ?></span></td>
		<td data-name="poid" <?php echo $view_pharmacygrn_view->poid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_poid">
<span<?php echo $view_pharmacygrn_view->poid->viewAttributes() ?>><?php echo $view_pharmacygrn_view->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PrName"><?php echo $view_pharmacygrn_view->PrName->caption() ?></span></td>
		<td data-name="PrName" <?php echo $view_pharmacygrn_view->PrName->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn_view->PrName->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->grnid->Visible) { // grnid ?>
	<tr id="r_grnid">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grnid"><?php echo $view_pharmacygrn_view->grnid->caption() ?></span></td>
		<td data-name="grnid" <?php echo $view_pharmacygrn_view->grnid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grnid">
<span<?php echo $view_pharmacygrn_view->grnid->viewAttributes() ?>><?php echo $view_pharmacygrn_view->grnid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_GrnQuantity"><?php echo $view_pharmacygrn_view->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity" <?php echo $view_pharmacygrn_view->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn_view->GrnQuantity->viewAttributes() ?>><?php echo $view_pharmacygrn_view->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Quantity"><?php echo $view_pharmacygrn_view->Quantity->caption() ?></span></td>
		<td data-name="Quantity" <?php echo $view_pharmacygrn_view->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn_view->Quantity->viewAttributes() ?>><?php echo $view_pharmacygrn_view->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->FreeQty->Visible) { // FreeQty ?>
	<tr id="r_FreeQty">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_FreeQty"><?php echo $view_pharmacygrn_view->FreeQty->caption() ?></span></td>
		<td data-name="FreeQty" <?php echo $view_pharmacygrn_view->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn_view->FreeQty->viewAttributes() ?>><?php echo $view_pharmacygrn_view->FreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_BatchNo"><?php echo $view_pharmacygrn_view->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo" <?php echo $view_pharmacygrn_view->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn_view->BatchNo->viewAttributes() ?>><?php echo $view_pharmacygrn_view->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->ExpDate->Visible) { // ExpDate ?>
	<tr id="r_ExpDate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ExpDate"><?php echo $view_pharmacygrn_view->ExpDate->caption() ?></span></td>
		<td data-name="ExpDate" <?php echo $view_pharmacygrn_view->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn_view->ExpDate->viewAttributes() ?>><?php echo $view_pharmacygrn_view->ExpDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_HSN"><?php echo $view_pharmacygrn_view->HSN->caption() ?></span></td>
		<td data-name="HSN" <?php echo $view_pharmacygrn_view->HSN->cellAttributes() ?>>
<span id="el_view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn_view->HSN->viewAttributes() ?>><?php echo $view_pharmacygrn_view->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_MFRCODE"><?php echo $view_pharmacygrn_view->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE" <?php echo $view_pharmacygrn_view->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn_view->MFRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_view->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PUnit"><?php echo $view_pharmacygrn_view->PUnit->caption() ?></span></td>
		<td data-name="PUnit" <?php echo $view_pharmacygrn_view->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn_view->PUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SUnit"><?php echo $view_pharmacygrn_view->SUnit->caption() ?></span></td>
		<td data-name="SUnit" <?php echo $view_pharmacygrn_view->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn_view->SUnit->viewAttributes() ?>><?php echo $view_pharmacygrn_view->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Pack"><?php echo $view_pharmacygrn_view->Pack->caption() ?></span></td>
		<td data-name="Pack" <?php echo $view_pharmacygrn_view->Pack->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Pack">
<span<?php echo $view_pharmacygrn_view->Pack->viewAttributes() ?>><?php echo $view_pharmacygrn_view->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_GrnMRP"><?php echo $view_pharmacygrn_view->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP" <?php echo $view_pharmacygrn_view->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnMRP">
<span<?php echo $view_pharmacygrn_view->GrnMRP->viewAttributes() ?>><?php echo $view_pharmacygrn_view->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_MRP"><?php echo $view_pharmacygrn_view->MRP->caption() ?></span></td>
		<td data-name="MRP" <?php echo $view_pharmacygrn_view->MRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn_view->MRP->viewAttributes() ?>><?php echo $view_pharmacygrn_view->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PurValue"><?php echo $view_pharmacygrn_view->PurValue->caption() ?></span></td>
		<td data-name="PurValue" <?php echo $view_pharmacygrn_view->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn_view->PurValue->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->Disc->Visible) { // Disc ?>
	<tr id="r_Disc">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Disc"><?php echo $view_pharmacygrn_view->Disc->caption() ?></span></td>
		<td data-name="Disc" <?php echo $view_pharmacygrn_view->Disc->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn_view->Disc->viewAttributes() ?>><?php echo $view_pharmacygrn_view->Disc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PSGST"><?php echo $view_pharmacygrn_view->PSGST->caption() ?></span></td>
		<td data-name="PSGST" <?php echo $view_pharmacygrn_view->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn_view->PSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PCGST"><?php echo $view_pharmacygrn_view->PCGST->caption() ?></span></td>
		<td data-name="PCGST" <?php echo $view_pharmacygrn_view->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn_view->PCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PTax->Visible) { // PTax ?>
	<tr id="r_PTax">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PTax"><?php echo $view_pharmacygrn_view->PTax->caption() ?></span></td>
		<td data-name="PTax" <?php echo $view_pharmacygrn_view->PTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn_view->PTax->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->ItemValue->Visible) { // ItemValue ?>
	<tr id="r_ItemValue">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ItemValue"><?php echo $view_pharmacygrn_view->ItemValue->caption() ?></span></td>
		<td data-name="ItemValue" <?php echo $view_pharmacygrn_view->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn_view->ItemValue->viewAttributes() ?>><?php echo $view_pharmacygrn_view->ItemValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->SalTax->Visible) { // SalTax ?>
	<tr id="r_SalTax">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SalTax"><?php echo $view_pharmacygrn_view->SalTax->caption() ?></span></td>
		<td data-name="SalTax" <?php echo $view_pharmacygrn_view->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn_view->SalTax->viewAttributes() ?>><?php echo $view_pharmacygrn_view->SalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PurRate"><?php echo $view_pharmacygrn_view->PurRate->caption() ?></span></td>
		<td data-name="PurRate" <?php echo $view_pharmacygrn_view->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurRate">
<span<?php echo $view_pharmacygrn_view->PurRate->viewAttributes() ?>><?php echo $view_pharmacygrn_view->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->SalRate->Visible) { // SalRate ?>
	<tr id="r_SalRate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SalRate"><?php echo $view_pharmacygrn_view->SalRate->caption() ?></span></td>
		<td data-name="SalRate" <?php echo $view_pharmacygrn_view->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn_view->SalRate->viewAttributes() ?>><?php echo $view_pharmacygrn_view->SalRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Discount"><?php echo $view_pharmacygrn_view->Discount->caption() ?></span></td>
		<td data-name="Discount" <?php echo $view_pharmacygrn_view->Discount->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Discount">
<span<?php echo $view_pharmacygrn_view->Discount->viewAttributes() ?>><?php echo $view_pharmacygrn_view->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SSGST"><?php echo $view_pharmacygrn_view->SSGST->caption() ?></span></td>
		<td data-name="SSGST" <?php echo $view_pharmacygrn_view->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn_view->SSGST->viewAttributes() ?>><?php echo $view_pharmacygrn_view->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SCGST"><?php echo $view_pharmacygrn_view->SCGST->caption() ?></span></td>
		<td data-name="SCGST" <?php echo $view_pharmacygrn_view->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn_view->SCGST->viewAttributes() ?>><?php echo $view_pharmacygrn_view->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_BRCODE"><?php echo $view_pharmacygrn_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $view_pharmacygrn_view->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn_view->BRCODE->viewAttributes() ?>><?php echo $view_pharmacygrn_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_trid"><?php echo $view_pharmacygrn_view->trid->caption() ?></span></td>
		<td data-name="trid" <?php echo $view_pharmacygrn_view->trid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_trid">
<span<?php echo $view_pharmacygrn_view->trid->viewAttributes() ?>><?php echo $view_pharmacygrn_view->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_HospID"><?php echo $view_pharmacygrn_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $view_pharmacygrn_view->HospID->cellAttributes() ?>>
<span id="el_view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn_view->HospID->viewAttributes() ?>><?php echo $view_pharmacygrn_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_CreatedBy"><?php echo $view_pharmacygrn_view->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy" <?php echo $view_pharmacygrn_view->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedBy">
<span<?php echo $view_pharmacygrn_view->CreatedBy->viewAttributes() ?>><?php echo $view_pharmacygrn_view->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_CreatedDateTime"><?php echo $view_pharmacygrn_view->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime" <?php echo $view_pharmacygrn_view->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedDateTime">
<span<?php echo $view_pharmacygrn_view->CreatedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_view->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ModifiedBy"><?php echo $view_pharmacygrn_view->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy" <?php echo $view_pharmacygrn_view->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedBy">
<span<?php echo $view_pharmacygrn_view->ModifiedBy->viewAttributes() ?>><?php echo $view_pharmacygrn_view->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ModifiedDateTime"><?php echo $view_pharmacygrn_view->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime" <?php echo $view_pharmacygrn_view->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedDateTime">
<span<?php echo $view_pharmacygrn_view->ModifiedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_view->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grncreatedby"><?php echo $view_pharmacygrn_view->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby" <?php echo $view_pharmacygrn_view->grncreatedby->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn_view->grncreatedby->viewAttributes() ?>><?php echo $view_pharmacygrn_view->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grncreatedDateTime"><?php echo $view_pharmacygrn_view->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime" <?php echo $view_pharmacygrn_view->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn_view->grncreatedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_view->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grnModifiedby"><?php echo $view_pharmacygrn_view->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby" <?php echo $view_pharmacygrn_view->grnModifiedby->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn_view->grnModifiedby->viewAttributes() ?>><?php echo $view_pharmacygrn_view->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grnModifiedDateTime"><?php echo $view_pharmacygrn_view->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime" <?php echo $view_pharmacygrn_view->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn_view->grnModifiedDateTime->viewAttributes() ?>><?php echo $view_pharmacygrn_view->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Received"><?php echo $view_pharmacygrn_view->Received->caption() ?></span></td>
		<td data-name="Received" <?php echo $view_pharmacygrn_view->Received->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Received">
<span<?php echo $view_pharmacygrn_view->Received->viewAttributes() ?>><?php echo $view_pharmacygrn_view->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn_view->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_BillDate"><?php echo $view_pharmacygrn_view->BillDate->caption() ?></span></td>
		<td data-name="BillDate" <?php echo $view_pharmacygrn_view->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn_view->BillDate->viewAttributes() ?>><?php echo $view_pharmacygrn_view->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacygrn_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacygrn_view->isExport()) { ?>
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
$view_pharmacygrn_view->terminate();
?>