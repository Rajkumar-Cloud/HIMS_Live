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
$store_purchaseorder_view = new store_purchaseorder_view();

// Run the page
$store_purchaseorder_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_purchaseorder_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_purchaseorder->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_purchaseorderview = currentForm = new ew.Form("fstore_purchaseorderview", "view");

// Form_CustomValidate event
fstore_purchaseorderview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_purchaseorderview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_purchaseorder->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_purchaseorder_view->ExportOptions->render("body") ?>
<?php $store_purchaseorder_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_purchaseorder_view->showPageHeader(); ?>
<?php
$store_purchaseorder_view->showMessage();
?>
<form name="fstore_purchaseorderview" id="fstore_purchaseorderview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_purchaseorder_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_purchaseorder_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_purchaseorder">
<input type="hidden" name="modal" value="<?php echo (int)$store_purchaseorder_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_purchaseorder->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_ORDNO"><?php echo $store_purchaseorder->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO"<?php echo $store_purchaseorder->ORDNO->cellAttributes() ?>>
<span id="el_store_purchaseorder_ORDNO">
<span<?php echo $store_purchaseorder->ORDNO->viewAttributes() ?>>
<?php echo $store_purchaseorder->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PRC"><?php echo $store_purchaseorder->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $store_purchaseorder->PRC->cellAttributes() ?>>
<span id="el_store_purchaseorder_PRC">
<span<?php echo $store_purchaseorder->PRC->viewAttributes() ?>>
<?php echo $store_purchaseorder->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_QTY"><?php echo $store_purchaseorder->QTY->caption() ?></span></td>
		<td data-name="QTY"<?php echo $store_purchaseorder->QTY->cellAttributes() ?>>
<span id="el_store_purchaseorder_QTY">
<span<?php echo $store_purchaseorder->QTY->viewAttributes() ?>>
<?php echo $store_purchaseorder->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_DT"><?php echo $store_purchaseorder->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $store_purchaseorder->DT->cellAttributes() ?>>
<span id="el_store_purchaseorder_DT">
<span<?php echo $store_purchaseorder->DT->viewAttributes() ?>>
<?php echo $store_purchaseorder->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PC"><?php echo $store_purchaseorder->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $store_purchaseorder->PC->cellAttributes() ?>>
<span id="el_store_purchaseorder_PC">
<span<?php echo $store_purchaseorder->PC->viewAttributes() ?>>
<?php echo $store_purchaseorder->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_YM"><?php echo $store_purchaseorder->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $store_purchaseorder->YM->cellAttributes() ?>>
<span id="el_store_purchaseorder_YM">
<span<?php echo $store_purchaseorder->YM->viewAttributes() ?>>
<?php echo $store_purchaseorder->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_MFRCODE"><?php echo $store_purchaseorder->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $store_purchaseorder->MFRCODE->cellAttributes() ?>>
<span id="el_store_purchaseorder_MFRCODE">
<span<?php echo $store_purchaseorder->MFRCODE->viewAttributes() ?>>
<?php echo $store_purchaseorder->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_Stock"><?php echo $store_purchaseorder->Stock->caption() ?></span></td>
		<td data-name="Stock"<?php echo $store_purchaseorder->Stock->cellAttributes() ?>>
<span id="el_store_purchaseorder_Stock">
<span<?php echo $store_purchaseorder->Stock->viewAttributes() ?>>
<?php echo $store_purchaseorder->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_LastMonthSale"><?php echo $store_purchaseorder->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale"<?php echo $store_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span id="el_store_purchaseorder_LastMonthSale">
<span<?php echo $store_purchaseorder->LastMonthSale->viewAttributes() ?>>
<?php echo $store_purchaseorder->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_Printcheck"><?php echo $store_purchaseorder->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck"<?php echo $store_purchaseorder->Printcheck->cellAttributes() ?>>
<span id="el_store_purchaseorder_Printcheck">
<span<?php echo $store_purchaseorder->Printcheck->viewAttributes() ?>>
<?php echo $store_purchaseorder->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_id"><?php echo $store_purchaseorder->id->caption() ?></span></td>
		<td data-name="id"<?php echo $store_purchaseorder->id->cellAttributes() ?>>
<span id="el_store_purchaseorder_id">
<span<?php echo $store_purchaseorder->id->viewAttributes() ?>>
<?php echo $store_purchaseorder->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_poid"><?php echo $store_purchaseorder->poid->caption() ?></span></td>
		<td data-name="poid"<?php echo $store_purchaseorder->poid->cellAttributes() ?>>
<span id="el_store_purchaseorder_poid">
<span<?php echo $store_purchaseorder->poid->viewAttributes() ?>>
<?php echo $store_purchaseorder->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->grnid->Visible) { // grnid ?>
	<tr id="r_grnid">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_grnid"><?php echo $store_purchaseorder->grnid->caption() ?></span></td>
		<td data-name="grnid"<?php echo $store_purchaseorder->grnid->cellAttributes() ?>>
<span id="el_store_purchaseorder_grnid">
<span<?php echo $store_purchaseorder->grnid->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_BatchNo"><?php echo $store_purchaseorder->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo"<?php echo $store_purchaseorder->BatchNo->cellAttributes() ?>>
<span id="el_store_purchaseorder_BatchNo">
<span<?php echo $store_purchaseorder->BatchNo->viewAttributes() ?>>
<?php echo $store_purchaseorder->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->ExpDate->Visible) { // ExpDate ?>
	<tr id="r_ExpDate">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_ExpDate"><?php echo $store_purchaseorder->ExpDate->caption() ?></span></td>
		<td data-name="ExpDate"<?php echo $store_purchaseorder->ExpDate->cellAttributes() ?>>
<span id="el_store_purchaseorder_ExpDate">
<span<?php echo $store_purchaseorder->ExpDate->viewAttributes() ?>>
<?php echo $store_purchaseorder->ExpDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PrName"><?php echo $store_purchaseorder->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $store_purchaseorder->PrName->cellAttributes() ?>>
<span id="el_store_purchaseorder_PrName">
<span<?php echo $store_purchaseorder->PrName->viewAttributes() ?>>
<?php echo $store_purchaseorder->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_Quantity"><?php echo $store_purchaseorder->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $store_purchaseorder->Quantity->cellAttributes() ?>>
<span id="el_store_purchaseorder_Quantity">
<span<?php echo $store_purchaseorder->Quantity->viewAttributes() ?>>
<?php echo $store_purchaseorder->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->FreeQty->Visible) { // FreeQty ?>
	<tr id="r_FreeQty">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_FreeQty"><?php echo $store_purchaseorder->FreeQty->caption() ?></span></td>
		<td data-name="FreeQty"<?php echo $store_purchaseorder->FreeQty->cellAttributes() ?>>
<span id="el_store_purchaseorder_FreeQty">
<span<?php echo $store_purchaseorder->FreeQty->viewAttributes() ?>>
<?php echo $store_purchaseorder->FreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->ItemValue->Visible) { // ItemValue ?>
	<tr id="r_ItemValue">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_ItemValue"><?php echo $store_purchaseorder->ItemValue->caption() ?></span></td>
		<td data-name="ItemValue"<?php echo $store_purchaseorder->ItemValue->cellAttributes() ?>>
<span id="el_store_purchaseorder_ItemValue">
<span<?php echo $store_purchaseorder->ItemValue->viewAttributes() ?>>
<?php echo $store_purchaseorder->ItemValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->Disc->Visible) { // Disc ?>
	<tr id="r_Disc">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_Disc"><?php echo $store_purchaseorder->Disc->caption() ?></span></td>
		<td data-name="Disc"<?php echo $store_purchaseorder->Disc->cellAttributes() ?>>
<span id="el_store_purchaseorder_Disc">
<span<?php echo $store_purchaseorder->Disc->viewAttributes() ?>>
<?php echo $store_purchaseorder->Disc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PTax->Visible) { // PTax ?>
	<tr id="r_PTax">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PTax"><?php echo $store_purchaseorder->PTax->caption() ?></span></td>
		<td data-name="PTax"<?php echo $store_purchaseorder->PTax->cellAttributes() ?>>
<span id="el_store_purchaseorder_PTax">
<span<?php echo $store_purchaseorder->PTax->viewAttributes() ?>>
<?php echo $store_purchaseorder->PTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_MRP"><?php echo $store_purchaseorder->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $store_purchaseorder->MRP->cellAttributes() ?>>
<span id="el_store_purchaseorder_MRP">
<span<?php echo $store_purchaseorder->MRP->viewAttributes() ?>>
<?php echo $store_purchaseorder->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->SalTax->Visible) { // SalTax ?>
	<tr id="r_SalTax">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_SalTax"><?php echo $store_purchaseorder->SalTax->caption() ?></span></td>
		<td data-name="SalTax"<?php echo $store_purchaseorder->SalTax->cellAttributes() ?>>
<span id="el_store_purchaseorder_SalTax">
<span<?php echo $store_purchaseorder->SalTax->viewAttributes() ?>>
<?php echo $store_purchaseorder->SalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PurValue"><?php echo $store_purchaseorder->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $store_purchaseorder->PurValue->cellAttributes() ?>>
<span id="el_store_purchaseorder_PurValue">
<span<?php echo $store_purchaseorder->PurValue->viewAttributes() ?>>
<?php echo $store_purchaseorder->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PurRate"><?php echo $store_purchaseorder->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $store_purchaseorder->PurRate->cellAttributes() ?>>
<span id="el_store_purchaseorder_PurRate">
<span<?php echo $store_purchaseorder->PurRate->viewAttributes() ?>>
<?php echo $store_purchaseorder->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->SalRate->Visible) { // SalRate ?>
	<tr id="r_SalRate">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_SalRate"><?php echo $store_purchaseorder->SalRate->caption() ?></span></td>
		<td data-name="SalRate"<?php echo $store_purchaseorder->SalRate->cellAttributes() ?>>
<span id="el_store_purchaseorder_SalRate">
<span<?php echo $store_purchaseorder->SalRate->viewAttributes() ?>>
<?php echo $store_purchaseorder->SalRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_Discount"><?php echo $store_purchaseorder->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $store_purchaseorder->Discount->cellAttributes() ?>>
<span id="el_store_purchaseorder_Discount">
<span<?php echo $store_purchaseorder->Discount->viewAttributes() ?>>
<?php echo $store_purchaseorder->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PSGST"><?php echo $store_purchaseorder->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $store_purchaseorder->PSGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_PSGST">
<span<?php echo $store_purchaseorder->PSGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PCGST"><?php echo $store_purchaseorder->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $store_purchaseorder->PCGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_PCGST">
<span<?php echo $store_purchaseorder->PCGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_SSGST"><?php echo $store_purchaseorder->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $store_purchaseorder->SSGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_SSGST">
<span<?php echo $store_purchaseorder->SSGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_SCGST"><?php echo $store_purchaseorder->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $store_purchaseorder->SCGST->cellAttributes() ?>>
<span id="el_store_purchaseorder_SCGST">
<span<?php echo $store_purchaseorder->SCGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_BRCODE"><?php echo $store_purchaseorder->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $store_purchaseorder->BRCODE->cellAttributes() ?>>
<span id="el_store_purchaseorder_BRCODE">
<span<?php echo $store_purchaseorder->BRCODE->viewAttributes() ?>>
<?php echo $store_purchaseorder->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_HSN"><?php echo $store_purchaseorder->HSN->caption() ?></span></td>
		<td data-name="HSN"<?php echo $store_purchaseorder->HSN->cellAttributes() ?>>
<span id="el_store_purchaseorder_HSN">
<span<?php echo $store_purchaseorder->HSN->viewAttributes() ?>>
<?php echo $store_purchaseorder->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_Pack"><?php echo $store_purchaseorder->Pack->caption() ?></span></td>
		<td data-name="Pack"<?php echo $store_purchaseorder->Pack->cellAttributes() ?>>
<span id="el_store_purchaseorder_Pack">
<span<?php echo $store_purchaseorder->Pack->viewAttributes() ?>>
<?php echo $store_purchaseorder->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_PUnit"><?php echo $store_purchaseorder->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $store_purchaseorder->PUnit->cellAttributes() ?>>
<span id="el_store_purchaseorder_PUnit">
<span<?php echo $store_purchaseorder->PUnit->viewAttributes() ?>>
<?php echo $store_purchaseorder->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_SUnit"><?php echo $store_purchaseorder->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $store_purchaseorder->SUnit->cellAttributes() ?>>
<span id="el_store_purchaseorder_SUnit">
<span<?php echo $store_purchaseorder->SUnit->viewAttributes() ?>>
<?php echo $store_purchaseorder->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_GrnQuantity"><?php echo $store_purchaseorder->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity"<?php echo $store_purchaseorder->GrnQuantity->cellAttributes() ?>>
<span id="el_store_purchaseorder_GrnQuantity">
<span<?php echo $store_purchaseorder->GrnQuantity->viewAttributes() ?>>
<?php echo $store_purchaseorder->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_GrnMRP"><?php echo $store_purchaseorder->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP"<?php echo $store_purchaseorder->GrnMRP->cellAttributes() ?>>
<span id="el_store_purchaseorder_GrnMRP">
<span<?php echo $store_purchaseorder->GrnMRP->viewAttributes() ?>>
<?php echo $store_purchaseorder->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_trid"><?php echo $store_purchaseorder->trid->caption() ?></span></td>
		<td data-name="trid"<?php echo $store_purchaseorder->trid->cellAttributes() ?>>
<span id="el_store_purchaseorder_trid">
<span<?php echo $store_purchaseorder->trid->viewAttributes() ?>>
<?php echo $store_purchaseorder->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_HospID"><?php echo $store_purchaseorder->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $store_purchaseorder->HospID->cellAttributes() ?>>
<span id="el_store_purchaseorder_HospID">
<span<?php echo $store_purchaseorder->HospID->viewAttributes() ?>>
<?php echo $store_purchaseorder->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_CreatedBy"><?php echo $store_purchaseorder->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $store_purchaseorder->CreatedBy->cellAttributes() ?>>
<span id="el_store_purchaseorder_CreatedBy">
<span<?php echo $store_purchaseorder->CreatedBy->viewAttributes() ?>>
<?php echo $store_purchaseorder->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_CreatedDateTime"><?php echo $store_purchaseorder->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $store_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_CreatedDateTime">
<span<?php echo $store_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_ModifiedBy"><?php echo $store_purchaseorder->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $store_purchaseorder->ModifiedBy->cellAttributes() ?>>
<span id="el_store_purchaseorder_ModifiedBy">
<span<?php echo $store_purchaseorder->ModifiedBy->viewAttributes() ?>>
<?php echo $store_purchaseorder->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_ModifiedDateTime"><?php echo $store_purchaseorder->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $store_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_ModifiedDateTime">
<span<?php echo $store_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_grncreatedby"><?php echo $store_purchaseorder->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby"<?php echo $store_purchaseorder->grncreatedby->cellAttributes() ?>>
<span id="el_store_purchaseorder_grncreatedby">
<span<?php echo $store_purchaseorder->grncreatedby->viewAttributes() ?>>
<?php echo $store_purchaseorder->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_grncreatedDateTime"><?php echo $store_purchaseorder->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime"<?php echo $store_purchaseorder->grncreatedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_grncreatedDateTime">
<span<?php echo $store_purchaseorder->grncreatedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_grnModifiedby"><?php echo $store_purchaseorder->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby"<?php echo $store_purchaseorder->grnModifiedby->cellAttributes() ?>>
<span id="el_store_purchaseorder_grnModifiedby">
<span<?php echo $store_purchaseorder->grnModifiedby->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_grnModifiedDateTime"><?php echo $store_purchaseorder->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime"<?php echo $store_purchaseorder->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_store_purchaseorder_grnModifiedDateTime">
<span<?php echo $store_purchaseorder->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_Received"><?php echo $store_purchaseorder->Received->caption() ?></span></td>
		<td data-name="Received"<?php echo $store_purchaseorder->Received->cellAttributes() ?>>
<span id="el_store_purchaseorder_Received">
<span<?php echo $store_purchaseorder->Received->viewAttributes() ?>>
<?php echo $store_purchaseorder->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_BillDate"><?php echo $store_purchaseorder->BillDate->caption() ?></span></td>
		<td data-name="BillDate"<?php echo $store_purchaseorder->BillDate->cellAttributes() ?>>
<span id="el_store_purchaseorder_BillDate">
<span<?php echo $store_purchaseorder->BillDate->viewAttributes() ?>>
<?php echo $store_purchaseorder->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->CurStock->Visible) { // CurStock ?>
	<tr id="r_CurStock">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_CurStock"><?php echo $store_purchaseorder->CurStock->caption() ?></span></td>
		<td data-name="CurStock"<?php echo $store_purchaseorder->CurStock->cellAttributes() ?>>
<span id="el_store_purchaseorder_CurStock">
<span<?php echo $store_purchaseorder->CurStock->viewAttributes() ?>>
<?php echo $store_purchaseorder->CurStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<tr id="r_FreeQtyyy">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_FreeQtyyy"><?php echo $store_purchaseorder->FreeQtyyy->caption() ?></span></td>
		<td data-name="FreeQtyyy"<?php echo $store_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span id="el_store_purchaseorder_FreeQtyyy">
<span<?php echo $store_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<?php echo $store_purchaseorder->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->grndate->Visible) { // grndate ?>
	<tr id="r_grndate">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_grndate"><?php echo $store_purchaseorder->grndate->caption() ?></span></td>
		<td data-name="grndate"<?php echo $store_purchaseorder->grndate->cellAttributes() ?>>
<span id="el_store_purchaseorder_grndate">
<span<?php echo $store_purchaseorder->grndate->viewAttributes() ?>>
<?php echo $store_purchaseorder->grndate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->grndatetime->Visible) { // grndatetime ?>
	<tr id="r_grndatetime">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_grndatetime"><?php echo $store_purchaseorder->grndatetime->caption() ?></span></td>
		<td data-name="grndatetime"<?php echo $store_purchaseorder->grndatetime->cellAttributes() ?>>
<span id="el_store_purchaseorder_grndatetime">
<span<?php echo $store_purchaseorder->grndatetime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grndatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->strid->Visible) { // strid ?>
	<tr id="r_strid">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_strid"><?php echo $store_purchaseorder->strid->caption() ?></span></td>
		<td data-name="strid"<?php echo $store_purchaseorder->strid->cellAttributes() ?>>
<span id="el_store_purchaseorder_strid">
<span<?php echo $store_purchaseorder->strid->viewAttributes() ?>>
<?php echo $store_purchaseorder->strid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->GRNPer->Visible) { // GRNPer ?>
	<tr id="r_GRNPer">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_GRNPer"><?php echo $store_purchaseorder->GRNPer->caption() ?></span></td>
		<td data-name="GRNPer"<?php echo $store_purchaseorder->GRNPer->cellAttributes() ?>>
<span id="el_store_purchaseorder_GRNPer">
<span<?php echo $store_purchaseorder->GRNPer->viewAttributes() ?>>
<?php echo $store_purchaseorder->GRNPer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_purchaseorder->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_purchaseorder_view->TableLeftColumnClass ?>"><span id="elh_store_purchaseorder_StoreID"><?php echo $store_purchaseorder->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $store_purchaseorder->StoreID->cellAttributes() ?>>
<span id="el_store_purchaseorder_StoreID">
<span<?php echo $store_purchaseorder->StoreID->viewAttributes() ?>>
<?php echo $store_purchaseorder->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_purchaseorder_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_purchaseorder->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_purchaseorder_view->terminate();
?>