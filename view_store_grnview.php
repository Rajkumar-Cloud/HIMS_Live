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
$view_store_grn_view = new view_store_grn_view();

// Run the page
$view_store_grn_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_store_grn_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_store_grn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_store_grnview = currentForm = new ew.Form("fview_store_grnview", "view");

// Form_CustomValidate event
fview_store_grnview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_store_grnview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_store_grnview.lists["x_PrName"] = <?php echo $view_store_grn_view->PrName->Lookup->toClientList() ?>;
fview_store_grnview.lists["x_PrName"].options = <?php echo JsonEncode($view_store_grn_view->PrName->lookupOptions()) ?>;
fview_store_grnview.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_store_grn->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_store_grn_view->ExportOptions->render("body") ?>
<?php $view_store_grn_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_store_grn_view->showPageHeader(); ?>
<?php
$view_store_grn_view->showMessage();
?>
<form name="fview_store_grnview" id="fview_store_grnview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_store_grn_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_store_grn_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_store_grn">
<input type="hidden" name="modal" value="<?php echo (int)$view_store_grn_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_store_grn->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_ORDNO"><?php echo $view_store_grn->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO"<?php echo $view_store_grn->ORDNO->cellAttributes() ?>>
<span id="el_view_store_grn_ORDNO">
<span<?php echo $view_store_grn->ORDNO->viewAttributes() ?>>
<?php echo $view_store_grn->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PRC"><?php echo $view_store_grn->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_store_grn->PRC->cellAttributes() ?>>
<span id="el_view_store_grn_PRC">
<span<?php echo $view_store_grn->PRC->viewAttributes() ?>>
<?php echo $view_store_grn->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PrName"><?php echo $view_store_grn->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $view_store_grn->PrName->cellAttributes() ?>>
<span id="el_view_store_grn_PrName">
<span<?php echo $view_store_grn->PrName->viewAttributes() ?>>
<?php echo $view_store_grn->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_GrnQuantity"><?php echo $view_store_grn->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity"<?php echo $view_store_grn->GrnQuantity->cellAttributes() ?>>
<span id="el_view_store_grn_GrnQuantity">
<span<?php echo $view_store_grn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_store_grn->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_QTY"><?php echo $view_store_grn->QTY->caption() ?></span></td>
		<td data-name="QTY"<?php echo $view_store_grn->QTY->cellAttributes() ?>>
<span id="el_view_store_grn_QTY">
<span<?php echo $view_store_grn->QTY->viewAttributes() ?>>
<?php echo $view_store_grn->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->FreeQty->Visible) { // FreeQty ?>
	<tr id="r_FreeQty">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_FreeQty"><?php echo $view_store_grn->FreeQty->caption() ?></span></td>
		<td data-name="FreeQty"<?php echo $view_store_grn->FreeQty->cellAttributes() ?>>
<span id="el_view_store_grn_FreeQty">
<span<?php echo $view_store_grn->FreeQty->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_DT"><?php echo $view_store_grn->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $view_store_grn->DT->cellAttributes() ?>>
<span id="el_view_store_grn_DT">
<span<?php echo $view_store_grn->DT->viewAttributes() ?>>
<?php echo $view_store_grn->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PC"><?php echo $view_store_grn->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $view_store_grn->PC->cellAttributes() ?>>
<span id="el_view_store_grn_PC">
<span<?php echo $view_store_grn->PC->viewAttributes() ?>>
<?php echo $view_store_grn->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_YM"><?php echo $view_store_grn->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $view_store_grn->YM->cellAttributes() ?>>
<span id="el_view_store_grn_YM">
<span<?php echo $view_store_grn->YM->viewAttributes() ?>>
<?php echo $view_store_grn->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_MFRCODE"><?php echo $view_store_grn->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $view_store_grn->MFRCODE->cellAttributes() ?>>
<span id="el_view_store_grn_MFRCODE">
<span<?php echo $view_store_grn->MFRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PUnit"><?php echo $view_store_grn->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $view_store_grn->PUnit->cellAttributes() ?>>
<span id="el_view_store_grn_PUnit">
<span<?php echo $view_store_grn->PUnit->viewAttributes() ?>>
<?php echo $view_store_grn->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_SUnit"><?php echo $view_store_grn->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $view_store_grn->SUnit->cellAttributes() ?>>
<span id="el_view_store_grn_SUnit">
<span<?php echo $view_store_grn->SUnit->viewAttributes() ?>>
<?php echo $view_store_grn->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_Stock"><?php echo $view_store_grn->Stock->caption() ?></span></td>
		<td data-name="Stock"<?php echo $view_store_grn->Stock->cellAttributes() ?>>
<span id="el_view_store_grn_Stock">
<span<?php echo $view_store_grn->Stock->viewAttributes() ?>>
<?php echo $view_store_grn->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_MRP"><?php echo $view_store_grn->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $view_store_grn->MRP->cellAttributes() ?>>
<span id="el_view_store_grn_MRP">
<span<?php echo $view_store_grn->MRP->viewAttributes() ?>>
<?php echo $view_store_grn->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PurRate"><?php echo $view_store_grn->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $view_store_grn->PurRate->cellAttributes() ?>>
<span id="el_view_store_grn_PurRate">
<span<?php echo $view_store_grn->PurRate->viewAttributes() ?>>
<?php echo $view_store_grn->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PurValue"><?php echo $view_store_grn->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $view_store_grn->PurValue->cellAttributes() ?>>
<span id="el_view_store_grn_PurValue">
<span<?php echo $view_store_grn->PurValue->viewAttributes() ?>>
<?php echo $view_store_grn->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->Disc->Visible) { // Disc ?>
	<tr id="r_Disc">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_Disc"><?php echo $view_store_grn->Disc->caption() ?></span></td>
		<td data-name="Disc"<?php echo $view_store_grn->Disc->cellAttributes() ?>>
<span id="el_view_store_grn_Disc">
<span<?php echo $view_store_grn->Disc->viewAttributes() ?>>
<?php echo $view_store_grn->Disc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PSGST"><?php echo $view_store_grn->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $view_store_grn->PSGST->cellAttributes() ?>>
<span id="el_view_store_grn_PSGST">
<span<?php echo $view_store_grn->PSGST->viewAttributes() ?>>
<?php echo $view_store_grn->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PCGST"><?php echo $view_store_grn->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $view_store_grn->PCGST->cellAttributes() ?>>
<span id="el_view_store_grn_PCGST">
<span<?php echo $view_store_grn->PCGST->viewAttributes() ?>>
<?php echo $view_store_grn->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->PTax->Visible) { // PTax ?>
	<tr id="r_PTax">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_PTax"><?php echo $view_store_grn->PTax->caption() ?></span></td>
		<td data-name="PTax"<?php echo $view_store_grn->PTax->cellAttributes() ?>>
<span id="el_view_store_grn_PTax">
<span<?php echo $view_store_grn->PTax->viewAttributes() ?>>
<?php echo $view_store_grn->PTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->ItemValue->Visible) { // ItemValue ?>
	<tr id="r_ItemValue">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_ItemValue"><?php echo $view_store_grn->ItemValue->caption() ?></span></td>
		<td data-name="ItemValue"<?php echo $view_store_grn->ItemValue->cellAttributes() ?>>
<span id="el_view_store_grn_ItemValue">
<span<?php echo $view_store_grn->ItemValue->viewAttributes() ?>>
<?php echo $view_store_grn->ItemValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->SalTax->Visible) { // SalTax ?>
	<tr id="r_SalTax">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_SalTax"><?php echo $view_store_grn->SalTax->caption() ?></span></td>
		<td data-name="SalTax"<?php echo $view_store_grn->SalTax->cellAttributes() ?>>
<span id="el_view_store_grn_SalTax">
<span<?php echo $view_store_grn->SalTax->viewAttributes() ?>>
<?php echo $view_store_grn->SalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_LastMonthSale"><?php echo $view_store_grn->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale"<?php echo $view_store_grn->LastMonthSale->cellAttributes() ?>>
<span id="el_view_store_grn_LastMonthSale">
<span<?php echo $view_store_grn->LastMonthSale->viewAttributes() ?>>
<?php echo $view_store_grn->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_Printcheck"><?php echo $view_store_grn->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck"<?php echo $view_store_grn->Printcheck->cellAttributes() ?>>
<span id="el_view_store_grn_Printcheck">
<span<?php echo $view_store_grn->Printcheck->viewAttributes() ?>>
<?php echo $view_store_grn->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_id"><?php echo $view_store_grn->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_store_grn->id->cellAttributes() ?>>
<span id="el_view_store_grn_id">
<span<?php echo $view_store_grn->id->viewAttributes() ?>>
<?php echo $view_store_grn->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_poid"><?php echo $view_store_grn->poid->caption() ?></span></td>
		<td data-name="poid"<?php echo $view_store_grn->poid->cellAttributes() ?>>
<span id="el_view_store_grn_poid">
<span<?php echo $view_store_grn->poid->viewAttributes() ?>>
<?php echo $view_store_grn->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->grnid->Visible) { // grnid ?>
	<tr id="r_grnid">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_grnid"><?php echo $view_store_grn->grnid->caption() ?></span></td>
		<td data-name="grnid"<?php echo $view_store_grn->grnid->cellAttributes() ?>>
<span id="el_view_store_grn_grnid">
<span<?php echo $view_store_grn->grnid->viewAttributes() ?>>
<?php echo $view_store_grn->grnid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_BatchNo"><?php echo $view_store_grn->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo"<?php echo $view_store_grn->BatchNo->cellAttributes() ?>>
<span id="el_view_store_grn_BatchNo">
<span<?php echo $view_store_grn->BatchNo->viewAttributes() ?>>
<?php echo $view_store_grn->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->ExpDate->Visible) { // ExpDate ?>
	<tr id="r_ExpDate">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_ExpDate"><?php echo $view_store_grn->ExpDate->caption() ?></span></td>
		<td data-name="ExpDate"<?php echo $view_store_grn->ExpDate->cellAttributes() ?>>
<span id="el_view_store_grn_ExpDate">
<span<?php echo $view_store_grn->ExpDate->viewAttributes() ?>>
<?php echo $view_store_grn->ExpDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_Quantity"><?php echo $view_store_grn->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $view_store_grn->Quantity->cellAttributes() ?>>
<span id="el_view_store_grn_Quantity">
<span<?php echo $view_store_grn->Quantity->viewAttributes() ?>>
<?php echo $view_store_grn->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->SalRate->Visible) { // SalRate ?>
	<tr id="r_SalRate">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_SalRate"><?php echo $view_store_grn->SalRate->caption() ?></span></td>
		<td data-name="SalRate"<?php echo $view_store_grn->SalRate->cellAttributes() ?>>
<span id="el_view_store_grn_SalRate">
<span<?php echo $view_store_grn->SalRate->viewAttributes() ?>>
<?php echo $view_store_grn->SalRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_Discount"><?php echo $view_store_grn->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $view_store_grn->Discount->cellAttributes() ?>>
<span id="el_view_store_grn_Discount">
<span<?php echo $view_store_grn->Discount->viewAttributes() ?>>
<?php echo $view_store_grn->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_SSGST"><?php echo $view_store_grn->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $view_store_grn->SSGST->cellAttributes() ?>>
<span id="el_view_store_grn_SSGST">
<span<?php echo $view_store_grn->SSGST->viewAttributes() ?>>
<?php echo $view_store_grn->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_SCGST"><?php echo $view_store_grn->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $view_store_grn->SCGST->cellAttributes() ?>>
<span id="el_view_store_grn_SCGST">
<span<?php echo $view_store_grn->SCGST->viewAttributes() ?>>
<?php echo $view_store_grn->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_BRCODE"><?php echo $view_store_grn->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_store_grn->BRCODE->cellAttributes() ?>>
<span id="el_view_store_grn_BRCODE">
<span<?php echo $view_store_grn->BRCODE->viewAttributes() ?>>
<?php echo $view_store_grn->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_HSN"><?php echo $view_store_grn->HSN->caption() ?></span></td>
		<td data-name="HSN"<?php echo $view_store_grn->HSN->cellAttributes() ?>>
<span id="el_view_store_grn_HSN">
<span<?php echo $view_store_grn->HSN->viewAttributes() ?>>
<?php echo $view_store_grn->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_Pack"><?php echo $view_store_grn->Pack->caption() ?></span></td>
		<td data-name="Pack"<?php echo $view_store_grn->Pack->cellAttributes() ?>>
<span id="el_view_store_grn_Pack">
<span<?php echo $view_store_grn->Pack->viewAttributes() ?>>
<?php echo $view_store_grn->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_GrnMRP"><?php echo $view_store_grn->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP"<?php echo $view_store_grn->GrnMRP->cellAttributes() ?>>
<span id="el_view_store_grn_GrnMRP">
<span<?php echo $view_store_grn->GrnMRP->viewAttributes() ?>>
<?php echo $view_store_grn->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_trid"><?php echo $view_store_grn->trid->caption() ?></span></td>
		<td data-name="trid"<?php echo $view_store_grn->trid->cellAttributes() ?>>
<span id="el_view_store_grn_trid">
<span<?php echo $view_store_grn->trid->viewAttributes() ?>>
<?php echo $view_store_grn->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_HospID"><?php echo $view_store_grn->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_store_grn->HospID->cellAttributes() ?>>
<span id="el_view_store_grn_HospID">
<span<?php echo $view_store_grn->HospID->viewAttributes() ?>>
<?php echo $view_store_grn->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_CreatedBy"><?php echo $view_store_grn->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $view_store_grn->CreatedBy->cellAttributes() ?>>
<span id="el_view_store_grn_CreatedBy">
<span<?php echo $view_store_grn->CreatedBy->viewAttributes() ?>>
<?php echo $view_store_grn->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_CreatedDateTime"><?php echo $view_store_grn->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_store_grn->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_CreatedDateTime">
<span<?php echo $view_store_grn->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_ModifiedBy"><?php echo $view_store_grn->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $view_store_grn->ModifiedBy->cellAttributes() ?>>
<span id="el_view_store_grn_ModifiedBy">
<span<?php echo $view_store_grn->ModifiedBy->viewAttributes() ?>>
<?php echo $view_store_grn->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_ModifiedDateTime"><?php echo $view_store_grn->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_store_grn->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_ModifiedDateTime">
<span<?php echo $view_store_grn->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_grncreatedby"><?php echo $view_store_grn->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby"<?php echo $view_store_grn->grncreatedby->cellAttributes() ?>>
<span id="el_view_store_grn_grncreatedby">
<span<?php echo $view_store_grn->grncreatedby->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_grncreatedDateTime"><?php echo $view_store_grn->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime"<?php echo $view_store_grn->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_grncreatedDateTime">
<span<?php echo $view_store_grn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_grnModifiedby"><?php echo $view_store_grn->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby"<?php echo $view_store_grn->grnModifiedby->cellAttributes() ?>>
<span id="el_view_store_grn_grnModifiedby">
<span<?php echo $view_store_grn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_grnModifiedDateTime"><?php echo $view_store_grn->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime"<?php echo $view_store_grn->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_grnModifiedDateTime">
<span<?php echo $view_store_grn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_store_grn->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_Received"><?php echo $view_store_grn->Received->caption() ?></span></td>
		<td data-name="Received"<?php echo $view_store_grn->Received->cellAttributes() ?>>
<span id="el_view_store_grn_Received">
<span<?php echo $view_store_grn->Received->viewAttributes() ?>>
<?php echo $view_store_grn->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_BillDate"><?php echo $view_store_grn->BillDate->caption() ?></span></td>
		<td data-name="BillDate"<?php echo $view_store_grn->BillDate->cellAttributes() ?>>
<span id="el_view_store_grn_BillDate">
<span<?php echo $view_store_grn->BillDate->viewAttributes() ?>>
<?php echo $view_store_grn->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->CurStock->Visible) { // CurStock ?>
	<tr id="r_CurStock">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_CurStock"><?php echo $view_store_grn->CurStock->caption() ?></span></td>
		<td data-name="CurStock"<?php echo $view_store_grn->CurStock->cellAttributes() ?>>
<span id="el_view_store_grn_CurStock">
<span<?php echo $view_store_grn->CurStock->viewAttributes() ?>>
<?php echo $view_store_grn->CurStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<tr id="r_FreeQtyyy">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_FreeQtyyy"><?php echo $view_store_grn->FreeQtyyy->caption() ?></span></td>
		<td data-name="FreeQtyyy"<?php echo $view_store_grn->FreeQtyyy->cellAttributes() ?>>
<span id="el_view_store_grn_FreeQtyyy">
<span<?php echo $view_store_grn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_store_grn->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->grndate->Visible) { // grndate ?>
	<tr id="r_grndate">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_grndate"><?php echo $view_store_grn->grndate->caption() ?></span></td>
		<td data-name="grndate"<?php echo $view_store_grn->grndate->cellAttributes() ?>>
<span id="el_view_store_grn_grndate">
<span<?php echo $view_store_grn->grndate->viewAttributes() ?>>
<?php echo $view_store_grn->grndate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->grndatetime->Visible) { // grndatetime ?>
	<tr id="r_grndatetime">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_grndatetime"><?php echo $view_store_grn->grndatetime->caption() ?></span></td>
		<td data-name="grndatetime"<?php echo $view_store_grn->grndatetime->cellAttributes() ?>>
<span id="el_view_store_grn_grndatetime">
<span<?php echo $view_store_grn->grndatetime->viewAttributes() ?>>
<?php echo $view_store_grn->grndatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->strid->Visible) { // strid ?>
	<tr id="r_strid">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_strid"><?php echo $view_store_grn->strid->caption() ?></span></td>
		<td data-name="strid"<?php echo $view_store_grn->strid->cellAttributes() ?>>
<span id="el_view_store_grn_strid">
<span<?php echo $view_store_grn->strid->viewAttributes() ?>>
<?php echo $view_store_grn->strid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_store_grn->GRNPer->Visible) { // GRNPer ?>
	<tr id="r_GRNPer">
		<td class="<?php echo $view_store_grn_view->TableLeftColumnClass ?>"><span id="elh_view_store_grn_GRNPer"><?php echo $view_store_grn->GRNPer->caption() ?></span></td>
		<td data-name="GRNPer"<?php echo $view_store_grn->GRNPer->cellAttributes() ?>>
<span id="el_view_store_grn_GRNPer">
<span<?php echo $view_store_grn->GRNPer->viewAttributes() ?>>
<?php echo $view_store_grn->GRNPer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_store_grn_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_store_grn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_store_grn_view->terminate();
?>