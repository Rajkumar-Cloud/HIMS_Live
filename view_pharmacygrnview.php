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
<?php include_once "header.php" ?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_pharmacygrnview = currentForm = new ew.Form("fview_pharmacygrnview", "view");

// Form_CustomValidate event
fview_pharmacygrnview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacygrnview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacygrnview.lists["x_PrName"] = <?php echo $view_pharmacygrn_view->PrName->Lookup->toClientList() ?>;
fview_pharmacygrnview.lists["x_PrName"].options = <?php echo JsonEncode($view_pharmacygrn_view->PrName->lookupOptions()) ?>;
fview_pharmacygrnview.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
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
<?php if ($view_pharmacygrn_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacygrn_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacygrn_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacygrn->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ORDNO"><?php echo $view_pharmacygrn->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO"<?php echo $view_pharmacygrn->ORDNO->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ORDNO">
<span<?php echo $view_pharmacygrn->ORDNO->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PRC"><?php echo $view_pharmacygrn->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_pharmacygrn->PRC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PRC">
<span<?php echo $view_pharmacygrn->PRC->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_QTY"><?php echo $view_pharmacygrn->QTY->caption() ?></span></td>
		<td data-name="QTY"<?php echo $view_pharmacygrn->QTY->cellAttributes() ?>>
<span id="el_view_pharmacygrn_QTY">
<span<?php echo $view_pharmacygrn->QTY->viewAttributes() ?>>
<?php echo $view_pharmacygrn->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_DT"><?php echo $view_pharmacygrn->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $view_pharmacygrn->DT->cellAttributes() ?>>
<span id="el_view_pharmacygrn_DT">
<span<?php echo $view_pharmacygrn->DT->viewAttributes() ?>>
<?php echo $view_pharmacygrn->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PC"><?php echo $view_pharmacygrn->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $view_pharmacygrn->PC->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PC">
<span<?php echo $view_pharmacygrn->PC->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_YM"><?php echo $view_pharmacygrn->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $view_pharmacygrn->YM->cellAttributes() ?>>
<span id="el_view_pharmacygrn_YM">
<span<?php echo $view_pharmacygrn->YM->viewAttributes() ?>>
<?php echo $view_pharmacygrn->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Stock"><?php echo $view_pharmacygrn->Stock->caption() ?></span></td>
		<td data-name="Stock"<?php echo $view_pharmacygrn->Stock->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Stock">
<span<?php echo $view_pharmacygrn->Stock->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_LastMonthSale"><?php echo $view_pharmacygrn->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale"<?php echo $view_pharmacygrn->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacygrn_LastMonthSale">
<span<?php echo $view_pharmacygrn->LastMonthSale->viewAttributes() ?>>
<?php echo $view_pharmacygrn->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Printcheck"><?php echo $view_pharmacygrn->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck"<?php echo $view_pharmacygrn->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Printcheck">
<span<?php echo $view_pharmacygrn->Printcheck->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_id"><?php echo $view_pharmacygrn->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_pharmacygrn->id->cellAttributes() ?>>
<span id="el_view_pharmacygrn_id">
<span<?php echo $view_pharmacygrn->id->viewAttributes() ?>>
<?php echo $view_pharmacygrn->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_poid"><?php echo $view_pharmacygrn->poid->caption() ?></span></td>
		<td data-name="poid"<?php echo $view_pharmacygrn->poid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_poid">
<span<?php echo $view_pharmacygrn->poid->viewAttributes() ?>>
<?php echo $view_pharmacygrn->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PrName"><?php echo $view_pharmacygrn->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $view_pharmacygrn->PrName->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PrName">
<span<?php echo $view_pharmacygrn->PrName->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->grnid->Visible) { // grnid ?>
	<tr id="r_grnid">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grnid"><?php echo $view_pharmacygrn->grnid->caption() ?></span></td>
		<td data-name="grnid"<?php echo $view_pharmacygrn->grnid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grnid">
<span<?php echo $view_pharmacygrn->grnid->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_GrnQuantity"><?php echo $view_pharmacygrn->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity"<?php echo $view_pharmacygrn->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnQuantity">
<span<?php echo $view_pharmacygrn->GrnQuantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Quantity"><?php echo $view_pharmacygrn->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $view_pharmacygrn->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Quantity">
<span<?php echo $view_pharmacygrn->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQty->Visible) { // FreeQty ?>
	<tr id="r_FreeQty">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_FreeQty"><?php echo $view_pharmacygrn->FreeQty->caption() ?></span></td>
		<td data-name="FreeQty"<?php echo $view_pharmacygrn->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacygrn_FreeQty">
<span<?php echo $view_pharmacygrn->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->FreeQtyyy->Visible) { // FreeQtyyy ?>
	<tr id="r_FreeQtyyy">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_FreeQtyyy"><?php echo $view_pharmacygrn->FreeQtyyy->caption() ?></span></td>
		<td data-name="FreeQtyyy"<?php echo $view_pharmacygrn->FreeQtyyy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_FreeQtyyy">
<span<?php echo $view_pharmacygrn->FreeQtyyy->viewAttributes() ?>>
<?php echo $view_pharmacygrn->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_BatchNo"><?php echo $view_pharmacygrn->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo"<?php echo $view_pharmacygrn->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BatchNo">
<span<?php echo $view_pharmacygrn->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->ExpDate->Visible) { // ExpDate ?>
	<tr id="r_ExpDate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ExpDate"><?php echo $view_pharmacygrn->ExpDate->caption() ?></span></td>
		<td data-name="ExpDate"<?php echo $view_pharmacygrn->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ExpDate">
<span<?php echo $view_pharmacygrn->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ExpDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_HSN"><?php echo $view_pharmacygrn->HSN->caption() ?></span></td>
		<td data-name="HSN"<?php echo $view_pharmacygrn->HSN->cellAttributes() ?>>
<span id="el_view_pharmacygrn_HSN">
<span<?php echo $view_pharmacygrn->HSN->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_MFRCODE"><?php echo $view_pharmacygrn->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $view_pharmacygrn->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MFRCODE">
<span<?php echo $view_pharmacygrn->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PUnit"><?php echo $view_pharmacygrn->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $view_pharmacygrn->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PUnit">
<span<?php echo $view_pharmacygrn->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SUnit"><?php echo $view_pharmacygrn->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $view_pharmacygrn->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SUnit">
<span<?php echo $view_pharmacygrn->SUnit->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Pack"><?php echo $view_pharmacygrn->Pack->caption() ?></span></td>
		<td data-name="Pack"<?php echo $view_pharmacygrn->Pack->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Pack">
<span<?php echo $view_pharmacygrn->Pack->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_GrnMRP"><?php echo $view_pharmacygrn->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP"<?php echo $view_pharmacygrn->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GrnMRP">
<span<?php echo $view_pharmacygrn->GrnMRP->viewAttributes() ?>>
<?php echo $view_pharmacygrn->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_MRP"><?php echo $view_pharmacygrn->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $view_pharmacygrn->MRP->cellAttributes() ?>>
<span id="el_view_pharmacygrn_MRP">
<span<?php echo $view_pharmacygrn->MRP->viewAttributes() ?>>
<?php echo $view_pharmacygrn->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PurValue"><?php echo $view_pharmacygrn->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $view_pharmacygrn->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurValue">
<span<?php echo $view_pharmacygrn->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->GRNPer->Visible) { // GRNPer ?>
	<tr id="r_GRNPer">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_GRNPer"><?php echo $view_pharmacygrn->GRNPer->caption() ?></span></td>
		<td data-name="GRNPer"<?php echo $view_pharmacygrn->GRNPer->cellAttributes() ?>>
<span id="el_view_pharmacygrn_GRNPer">
<span<?php echo $view_pharmacygrn->GRNPer->viewAttributes() ?>>
<?php echo $view_pharmacygrn->GRNPer->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->Disc->Visible) { // Disc ?>
	<tr id="r_Disc">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Disc"><?php echo $view_pharmacygrn->Disc->caption() ?></span></td>
		<td data-name="Disc"<?php echo $view_pharmacygrn->Disc->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Disc">
<span<?php echo $view_pharmacygrn->Disc->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Disc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PSGST"><?php echo $view_pharmacygrn->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $view_pharmacygrn->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PSGST">
<span<?php echo $view_pharmacygrn->PSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PCGST"><?php echo $view_pharmacygrn->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $view_pharmacygrn->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PCGST">
<span<?php echo $view_pharmacygrn->PCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PTax->Visible) { // PTax ?>
	<tr id="r_PTax">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PTax"><?php echo $view_pharmacygrn->PTax->caption() ?></span></td>
		<td data-name="PTax"<?php echo $view_pharmacygrn->PTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PTax">
<span<?php echo $view_pharmacygrn->PTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->ItemValue->Visible) { // ItemValue ?>
	<tr id="r_ItemValue">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ItemValue"><?php echo $view_pharmacygrn->ItemValue->caption() ?></span></td>
		<td data-name="ItemValue"<?php echo $view_pharmacygrn->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ItemValue">
<span<?php echo $view_pharmacygrn->ItemValue->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ItemValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->SalTax->Visible) { // SalTax ?>
	<tr id="r_SalTax">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SalTax"><?php echo $view_pharmacygrn->SalTax->caption() ?></span></td>
		<td data-name="SalTax"<?php echo $view_pharmacygrn->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalTax">
<span<?php echo $view_pharmacygrn->SalTax->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_PurRate"><?php echo $view_pharmacygrn->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $view_pharmacygrn->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_PurRate">
<span<?php echo $view_pharmacygrn->PurRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->SalRate->Visible) { // SalRate ?>
	<tr id="r_SalRate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SalRate"><?php echo $view_pharmacygrn->SalRate->caption() ?></span></td>
		<td data-name="SalRate"<?php echo $view_pharmacygrn->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SalRate">
<span<?php echo $view_pharmacygrn->SalRate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SalRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Discount"><?php echo $view_pharmacygrn->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $view_pharmacygrn->Discount->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Discount">
<span<?php echo $view_pharmacygrn->Discount->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SSGST"><?php echo $view_pharmacygrn->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $view_pharmacygrn->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SSGST">
<span<?php echo $view_pharmacygrn->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_SCGST"><?php echo $view_pharmacygrn->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $view_pharmacygrn->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacygrn_SCGST">
<span<?php echo $view_pharmacygrn->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacygrn->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_BRCODE"><?php echo $view_pharmacygrn->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_pharmacygrn->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BRCODE">
<span<?php echo $view_pharmacygrn->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_trid"><?php echo $view_pharmacygrn->trid->caption() ?></span></td>
		<td data-name="trid"<?php echo $view_pharmacygrn->trid->cellAttributes() ?>>
<span id="el_view_pharmacygrn_trid">
<span<?php echo $view_pharmacygrn->trid->viewAttributes() ?>>
<?php echo $view_pharmacygrn->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_HospID"><?php echo $view_pharmacygrn->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_pharmacygrn->HospID->cellAttributes() ?>>
<span id="el_view_pharmacygrn_HospID">
<span<?php echo $view_pharmacygrn->HospID->viewAttributes() ?>>
<?php echo $view_pharmacygrn->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_CreatedBy"><?php echo $view_pharmacygrn->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $view_pharmacygrn->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedBy">
<span<?php echo $view_pharmacygrn->CreatedBy->viewAttributes() ?>>
<?php echo $view_pharmacygrn->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_CreatedDateTime"><?php echo $view_pharmacygrn->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_pharmacygrn->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_CreatedDateTime">
<span<?php echo $view_pharmacygrn->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ModifiedBy"><?php echo $view_pharmacygrn->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $view_pharmacygrn->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedBy">
<span<?php echo $view_pharmacygrn->ModifiedBy->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_ModifiedDateTime"><?php echo $view_pharmacygrn->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_pharmacygrn->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_ModifiedDateTime">
<span<?php echo $view_pharmacygrn->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grncreatedby"><?php echo $view_pharmacygrn->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby"<?php echo $view_pharmacygrn->grncreatedby->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grncreatedby">
<span<?php echo $view_pharmacygrn->grncreatedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grncreatedDateTime"><?php echo $view_pharmacygrn->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime"<?php echo $view_pharmacygrn->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grncreatedDateTime">
<span<?php echo $view_pharmacygrn->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grnModifiedby"><?php echo $view_pharmacygrn->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby"<?php echo $view_pharmacygrn->grnModifiedby->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grnModifiedby">
<span<?php echo $view_pharmacygrn->grnModifiedby->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grnModifiedDateTime"><?php echo $view_pharmacygrn->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime"<?php echo $view_pharmacygrn->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grnModifiedDateTime">
<span<?php echo $view_pharmacygrn->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_Received"><?php echo $view_pharmacygrn->Received->caption() ?></span></td>
		<td data-name="Received"<?php echo $view_pharmacygrn->Received->cellAttributes() ?>>
<span id="el_view_pharmacygrn_Received">
<span<?php echo $view_pharmacygrn->Received->viewAttributes() ?>>
<?php echo $view_pharmacygrn->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_BillDate"><?php echo $view_pharmacygrn->BillDate->caption() ?></span></td>
		<td data-name="BillDate"<?php echo $view_pharmacygrn->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_BillDate">
<span<?php echo $view_pharmacygrn->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->grndate->Visible) { // grndate ?>
	<tr id="r_grndate">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grndate"><?php echo $view_pharmacygrn->grndate->caption() ?></span></td>
		<td data-name="grndate"<?php echo $view_pharmacygrn->grndate->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grndate">
<span<?php echo $view_pharmacygrn->grndate->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacygrn->grndatetime->Visible) { // grndatetime ?>
	<tr id="r_grndatetime">
		<td class="<?php echo $view_pharmacygrn_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacygrn_grndatetime"><?php echo $view_pharmacygrn->grndatetime->caption() ?></span></td>
		<td data-name="grndatetime"<?php echo $view_pharmacygrn->grndatetime->cellAttributes() ?>>
<span id="el_view_pharmacygrn_grndatetime">
<span<?php echo $view_pharmacygrn->grndatetime->viewAttributes() ?>>
<?php echo $view_pharmacygrn->grndatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacygrn_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacygrn->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacygrn_view->terminate();
?>