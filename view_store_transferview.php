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
$view_store_transfer_view = new view_store_transfer_view();

// Run the page
$view_store_transfer_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_transfer_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_store_transfer->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_store_transferview = currentForm = new ew.Form("fview_store_transferview", "view");

// Form_CustomValidate event
fview_store_transferview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_transferview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_transferview.lists["x_ORDNO"] = <?php echo $view_store_transfer_view->ORDNO->Lookup->toClientList() ?>;
fview_store_transferview.lists["x_ORDNO"].options = <?php echo JsonEncode($view_store_transfer_view->ORDNO->lookupOptions()) ?>;
fview_store_transferview.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transferview.lists["x_LastMonthSale"] = <?php echo $view_store_transfer_view->LastMonthSale->Lookup->toClientList() ?>;
fview_store_transferview.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_store_transfer_view->LastMonthSale->lookupOptions()) ?>;
fview_store_transferview.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_store_transferview.lists["x_BRCODE"] = <?php echo $view_store_transfer_view->BRCODE->Lookup->toClientList() ?>;
fview_store_transferview.lists["x_BRCODE"].options = <?php echo JsonEncode($view_store_transfer_view->BRCODE->lookupOptions()) ?>;
fview_store_transferview.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_store_transfer->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_store_transfer_view->ExportOptions->render("body") ?>
<?php $view_store_transfer_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_store_transfer_view->showPageHeader(); ?>
<?php
$view_store_transfer_view->showMessage();
?>
<form name="fview_store_transferview" id="fview_store_transferview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_store_transfer_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_store_transfer_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_store_transfer">
<input type="hidden" name="modal" value="<?php echo (int)$view_store_transfer_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_store_transfer->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_ORDNO"><?php echo $view_store_transfer->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO"<?php echo $view_store_transfer->ORDNO->cellAttributes() ?>>
<span id="el_view_store_transfer_ORDNO">
<span<?php echo $view_store_transfer->ORDNO->viewAttributes() ?>>
<?php echo $view_store_transfer->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PRC"><?php echo $view_store_transfer->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_store_transfer->PRC->cellAttributes() ?>>
<span id="el_view_store_transfer_PRC">
<span<?php echo $view_store_transfer->PRC->viewAttributes() ?>>
<?php echo $view_store_transfer->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_QTY"><?php echo $view_store_transfer->QTY->caption() ?></span></td>
		<td data-name="QTY"<?php echo $view_store_transfer->QTY->cellAttributes() ?>>
<span id="el_view_store_transfer_QTY">
<span<?php echo $view_store_transfer->QTY->viewAttributes() ?>>
<?php echo $view_store_transfer->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_DT"><?php echo $view_store_transfer->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $view_store_transfer->DT->cellAttributes() ?>>
<span id="el_view_store_transfer_DT">
<span<?php echo $view_store_transfer->DT->viewAttributes() ?>>
<?php echo $view_store_transfer->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PC"><?php echo $view_store_transfer->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $view_store_transfer->PC->cellAttributes() ?>>
<span id="el_view_store_transfer_PC">
<span<?php echo $view_store_transfer->PC->viewAttributes() ?>>
<?php echo $view_store_transfer->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_YM"><?php echo $view_store_transfer->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $view_store_transfer->YM->cellAttributes() ?>>
<span id="el_view_store_transfer_YM">
<span<?php echo $view_store_transfer->YM->viewAttributes() ?>>
<?php echo $view_store_transfer->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_MFRCODE"><?php echo $view_store_transfer->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $view_store_transfer->MFRCODE->cellAttributes() ?>>
<span id="el_view_store_transfer_MFRCODE">
<span<?php echo $view_store_transfer->MFRCODE->viewAttributes() ?>>
<?php echo $view_store_transfer->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_Stock"><?php echo $view_store_transfer->Stock->caption() ?></span></td>
		<td data-name="Stock"<?php echo $view_store_transfer->Stock->cellAttributes() ?>>
<span id="el_view_store_transfer_Stock">
<span<?php echo $view_store_transfer->Stock->viewAttributes() ?>>
<?php echo $view_store_transfer->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_LastMonthSale"><?php echo $view_store_transfer->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale"<?php echo $view_store_transfer->LastMonthSale->cellAttributes() ?>>
<span id="el_view_store_transfer_LastMonthSale">
<span<?php echo $view_store_transfer->LastMonthSale->viewAttributes() ?>>
<?php echo $view_store_transfer->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_Printcheck"><?php echo $view_store_transfer->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck"<?php echo $view_store_transfer->Printcheck->cellAttributes() ?>>
<span id="el_view_store_transfer_Printcheck">
<span<?php echo $view_store_transfer->Printcheck->viewAttributes() ?>>
<?php echo $view_store_transfer->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_id"><?php echo $view_store_transfer->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_store_transfer->id->cellAttributes() ?>>
<span id="el_view_store_transfer_id">
<span<?php echo $view_store_transfer->id->viewAttributes() ?>>
<?php echo $view_store_transfer->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_poid"><?php echo $view_store_transfer->poid->caption() ?></span></td>
		<td data-name="poid"<?php echo $view_store_transfer->poid->cellAttributes() ?>>
<span id="el_view_store_transfer_poid">
<span<?php echo $view_store_transfer->poid->viewAttributes() ?>>
<?php echo $view_store_transfer->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->grnid->Visible) { // grnid ?>
	<tr id="r_grnid">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_grnid"><?php echo $view_store_transfer->grnid->caption() ?></span></td>
		<td data-name="grnid"<?php echo $view_store_transfer->grnid->cellAttributes() ?>>
<span id="el_view_store_transfer_grnid">
<span<?php echo $view_store_transfer->grnid->viewAttributes() ?>>
<?php echo $view_store_transfer->grnid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_BatchNo"><?php echo $view_store_transfer->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo"<?php echo $view_store_transfer->BatchNo->cellAttributes() ?>>
<span id="el_view_store_transfer_BatchNo">
<span<?php echo $view_store_transfer->BatchNo->viewAttributes() ?>>
<?php echo $view_store_transfer->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->ExpDate->Visible) { // ExpDate ?>
	<tr id="r_ExpDate">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_ExpDate"><?php echo $view_store_transfer->ExpDate->caption() ?></span></td>
		<td data-name="ExpDate"<?php echo $view_store_transfer->ExpDate->cellAttributes() ?>>
<span id="el_view_store_transfer_ExpDate">
<span<?php echo $view_store_transfer->ExpDate->viewAttributes() ?>>
<?php echo $view_store_transfer->ExpDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PrName"><?php echo $view_store_transfer->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $view_store_transfer->PrName->cellAttributes() ?>>
<span id="el_view_store_transfer_PrName">
<span<?php echo $view_store_transfer->PrName->viewAttributes() ?>>
<?php echo $view_store_transfer->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_Quantity"><?php echo $view_store_transfer->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $view_store_transfer->Quantity->cellAttributes() ?>>
<span id="el_view_store_transfer_Quantity">
<span<?php echo $view_store_transfer->Quantity->viewAttributes() ?>>
<?php echo $view_store_transfer->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->FreeQty->Visible) { // FreeQty ?>
	<tr id="r_FreeQty">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_FreeQty"><?php echo $view_store_transfer->FreeQty->caption() ?></span></td>
		<td data-name="FreeQty"<?php echo $view_store_transfer->FreeQty->cellAttributes() ?>>
<span id="el_view_store_transfer_FreeQty">
<span<?php echo $view_store_transfer->FreeQty->viewAttributes() ?>>
<?php echo $view_store_transfer->FreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->ItemValue->Visible) { // ItemValue ?>
	<tr id="r_ItemValue">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_ItemValue"><?php echo $view_store_transfer->ItemValue->caption() ?></span></td>
		<td data-name="ItemValue"<?php echo $view_store_transfer->ItemValue->cellAttributes() ?>>
<span id="el_view_store_transfer_ItemValue">
<span<?php echo $view_store_transfer->ItemValue->viewAttributes() ?>>
<?php echo $view_store_transfer->ItemValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->Disc->Visible) { // Disc ?>
	<tr id="r_Disc">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_Disc"><?php echo $view_store_transfer->Disc->caption() ?></span></td>
		<td data-name="Disc"<?php echo $view_store_transfer->Disc->cellAttributes() ?>>
<span id="el_view_store_transfer_Disc">
<span<?php echo $view_store_transfer->Disc->viewAttributes() ?>>
<?php echo $view_store_transfer->Disc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PTax->Visible) { // PTax ?>
	<tr id="r_PTax">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PTax"><?php echo $view_store_transfer->PTax->caption() ?></span></td>
		<td data-name="PTax"<?php echo $view_store_transfer->PTax->cellAttributes() ?>>
<span id="el_view_store_transfer_PTax">
<span<?php echo $view_store_transfer->PTax->viewAttributes() ?>>
<?php echo $view_store_transfer->PTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_MRP"><?php echo $view_store_transfer->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $view_store_transfer->MRP->cellAttributes() ?>>
<span id="el_view_store_transfer_MRP">
<span<?php echo $view_store_transfer->MRP->viewAttributes() ?>>
<?php echo $view_store_transfer->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->SalTax->Visible) { // SalTax ?>
	<tr id="r_SalTax">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_SalTax"><?php echo $view_store_transfer->SalTax->caption() ?></span></td>
		<td data-name="SalTax"<?php echo $view_store_transfer->SalTax->cellAttributes() ?>>
<span id="el_view_store_transfer_SalTax">
<span<?php echo $view_store_transfer->SalTax->viewAttributes() ?>>
<?php echo $view_store_transfer->SalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PurValue"><?php echo $view_store_transfer->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $view_store_transfer->PurValue->cellAttributes() ?>>
<span id="el_view_store_transfer_PurValue">
<span<?php echo $view_store_transfer->PurValue->viewAttributes() ?>>
<?php echo $view_store_transfer->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PurRate"><?php echo $view_store_transfer->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $view_store_transfer->PurRate->cellAttributes() ?>>
<span id="el_view_store_transfer_PurRate">
<span<?php echo $view_store_transfer->PurRate->viewAttributes() ?>>
<?php echo $view_store_transfer->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->SalRate->Visible) { // SalRate ?>
	<tr id="r_SalRate">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_SalRate"><?php echo $view_store_transfer->SalRate->caption() ?></span></td>
		<td data-name="SalRate"<?php echo $view_store_transfer->SalRate->cellAttributes() ?>>
<span id="el_view_store_transfer_SalRate">
<span<?php echo $view_store_transfer->SalRate->viewAttributes() ?>>
<?php echo $view_store_transfer->SalRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_Discount"><?php echo $view_store_transfer->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $view_store_transfer->Discount->cellAttributes() ?>>
<span id="el_view_store_transfer_Discount">
<span<?php echo $view_store_transfer->Discount->viewAttributes() ?>>
<?php echo $view_store_transfer->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PSGST"><?php echo $view_store_transfer->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $view_store_transfer->PSGST->cellAttributes() ?>>
<span id="el_view_store_transfer_PSGST">
<span<?php echo $view_store_transfer->PSGST->viewAttributes() ?>>
<?php echo $view_store_transfer->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PCGST"><?php echo $view_store_transfer->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $view_store_transfer->PCGST->cellAttributes() ?>>
<span id="el_view_store_transfer_PCGST">
<span<?php echo $view_store_transfer->PCGST->viewAttributes() ?>>
<?php echo $view_store_transfer->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_SSGST"><?php echo $view_store_transfer->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $view_store_transfer->SSGST->cellAttributes() ?>>
<span id="el_view_store_transfer_SSGST">
<span<?php echo $view_store_transfer->SSGST->viewAttributes() ?>>
<?php echo $view_store_transfer->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_SCGST"><?php echo $view_store_transfer->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $view_store_transfer->SCGST->cellAttributes() ?>>
<span id="el_view_store_transfer_SCGST">
<span<?php echo $view_store_transfer->SCGST->viewAttributes() ?>>
<?php echo $view_store_transfer->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_BRCODE"><?php echo $view_store_transfer->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_store_transfer->BRCODE->cellAttributes() ?>>
<span id="el_view_store_transfer_BRCODE">
<span<?php echo $view_store_transfer->BRCODE->viewAttributes() ?>>
<?php echo $view_store_transfer->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_HSN"><?php echo $view_store_transfer->HSN->caption() ?></span></td>
		<td data-name="HSN"<?php echo $view_store_transfer->HSN->cellAttributes() ?>>
<span id="el_view_store_transfer_HSN">
<span<?php echo $view_store_transfer->HSN->viewAttributes() ?>>
<?php echo $view_store_transfer->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_Pack"><?php echo $view_store_transfer->Pack->caption() ?></span></td>
		<td data-name="Pack"<?php echo $view_store_transfer->Pack->cellAttributes() ?>>
<span id="el_view_store_transfer_Pack">
<span<?php echo $view_store_transfer->Pack->viewAttributes() ?>>
<?php echo $view_store_transfer->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_PUnit"><?php echo $view_store_transfer->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $view_store_transfer->PUnit->cellAttributes() ?>>
<span id="el_view_store_transfer_PUnit">
<span<?php echo $view_store_transfer->PUnit->viewAttributes() ?>>
<?php echo $view_store_transfer->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_SUnit"><?php echo $view_store_transfer->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $view_store_transfer->SUnit->cellAttributes() ?>>
<span id="el_view_store_transfer_SUnit">
<span<?php echo $view_store_transfer->SUnit->viewAttributes() ?>>
<?php echo $view_store_transfer->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_GrnQuantity"><?php echo $view_store_transfer->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity"<?php echo $view_store_transfer->GrnQuantity->cellAttributes() ?>>
<span id="el_view_store_transfer_GrnQuantity">
<span<?php echo $view_store_transfer->GrnQuantity->viewAttributes() ?>>
<?php echo $view_store_transfer->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_GrnMRP"><?php echo $view_store_transfer->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP"<?php echo $view_store_transfer->GrnMRP->cellAttributes() ?>>
<span id="el_view_store_transfer_GrnMRP">
<span<?php echo $view_store_transfer->GrnMRP->viewAttributes() ?>>
<?php echo $view_store_transfer->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->strid->Visible) { // strid ?>
	<tr id="r_strid">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_strid"><?php echo $view_store_transfer->strid->caption() ?></span></td>
		<td data-name="strid"<?php echo $view_store_transfer->strid->cellAttributes() ?>>
<span id="el_view_store_transfer_strid">
<span<?php echo $view_store_transfer->strid->viewAttributes() ?>>
<?php echo $view_store_transfer->strid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_HospID"><?php echo $view_store_transfer->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_store_transfer->HospID->cellAttributes() ?>>
<span id="el_view_store_transfer_HospID">
<span<?php echo $view_store_transfer->HospID->viewAttributes() ?>>
<?php echo $view_store_transfer->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_CreatedBy"><?php echo $view_store_transfer->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $view_store_transfer->CreatedBy->cellAttributes() ?>>
<span id="el_view_store_transfer_CreatedBy">
<span<?php echo $view_store_transfer->CreatedBy->viewAttributes() ?>>
<?php echo $view_store_transfer->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_CreatedDateTime"><?php echo $view_store_transfer->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_store_transfer->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_CreatedDateTime">
<span<?php echo $view_store_transfer->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_ModifiedBy"><?php echo $view_store_transfer->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $view_store_transfer->ModifiedBy->cellAttributes() ?>>
<span id="el_view_store_transfer_ModifiedBy">
<span<?php echo $view_store_transfer->ModifiedBy->viewAttributes() ?>>
<?php echo $view_store_transfer->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_ModifiedDateTime"><?php echo $view_store_transfer->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_store_transfer->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_ModifiedDateTime">
<span<?php echo $view_store_transfer->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_grncreatedby"><?php echo $view_store_transfer->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby"<?php echo $view_store_transfer->grncreatedby->cellAttributes() ?>>
<span id="el_view_store_transfer_grncreatedby">
<span<?php echo $view_store_transfer->grncreatedby->viewAttributes() ?>>
<?php echo $view_store_transfer->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_grncreatedDateTime"><?php echo $view_store_transfer->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime"<?php echo $view_store_transfer->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_grncreatedDateTime">
<span<?php echo $view_store_transfer->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_grnModifiedby"><?php echo $view_store_transfer->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby"<?php echo $view_store_transfer->grnModifiedby->cellAttributes() ?>>
<span id="el_view_store_transfer_grnModifiedby">
<span<?php echo $view_store_transfer->grnModifiedby->viewAttributes() ?>>
<?php echo $view_store_transfer->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_grnModifiedDateTime"><?php echo $view_store_transfer->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime"<?php echo $view_store_transfer->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_grnModifiedDateTime">
<span<?php echo $view_store_transfer->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_transfer->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_Received"><?php echo $view_store_transfer->Received->caption() ?></span></td>
		<td data-name="Received"<?php echo $view_store_transfer->Received->cellAttributes() ?>>
<span id="el_view_store_transfer_Received">
<span<?php echo $view_store_transfer->Received->viewAttributes() ?>>
<?php echo $view_store_transfer->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_BillDate"><?php echo $view_store_transfer->BillDate->caption() ?></span></td>
		<td data-name="BillDate"<?php echo $view_store_transfer->BillDate->cellAttributes() ?>>
<span id="el_view_store_transfer_BillDate">
<span<?php echo $view_store_transfer->BillDate->viewAttributes() ?>>
<?php echo $view_store_transfer->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_transfer->CurStock->Visible) { // CurStock ?>
	<tr id="r_CurStock">
		<td class="<?php echo $view_store_transfer_view->TableLeftColumnClass ?>"><span id="elh_view_store_transfer_CurStock"><?php echo $view_store_transfer->CurStock->caption() ?></span></td>
		<td data-name="CurStock"<?php echo $view_store_transfer->CurStock->cellAttributes() ?>>
<span id="el_view_store_transfer_CurStock">
<span<?php echo $view_store_transfer->CurStock->viewAttributes() ?>>
<?php echo $view_store_transfer->CurStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_store_transfer_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_store_transfer->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_store_transfer_view->terminate();
?>