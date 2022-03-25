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
$view_pharmacytransfer_view = new view_pharmacytransfer_view();

// Run the page
$view_pharmacytransfer_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacytransfer_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacytransfer->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_pharmacytransferview = currentForm = new ew.Form("fview_pharmacytransferview", "view");

// Form_CustomValidate event
fview_pharmacytransferview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacytransferview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacytransferview.lists["x_ORDNO"] = <?php echo $view_pharmacytransfer_view->ORDNO->Lookup->toClientList() ?>;
fview_pharmacytransferview.lists["x_ORDNO"].options = <?php echo JsonEncode($view_pharmacytransfer_view->ORDNO->lookupOptions()) ?>;
fview_pharmacytransferview.autoSuggests["x_ORDNO"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransferview.lists["x_BRCODE"] = <?php echo $view_pharmacytransfer_view->BRCODE->Lookup->toClientList() ?>;
fview_pharmacytransferview.lists["x_BRCODE"].options = <?php echo JsonEncode($view_pharmacytransfer_view->BRCODE->lookupOptions()) ?>;
fview_pharmacytransferview.autoSuggests["x_BRCODE"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fview_pharmacytransferview.lists["x_LastMonthSale"] = <?php echo $view_pharmacytransfer_view->LastMonthSale->Lookup->toClientList() ?>;
fview_pharmacytransferview.lists["x_LastMonthSale"].options = <?php echo JsonEncode($view_pharmacytransfer_view->LastMonthSale->lookupOptions()) ?>;
fview_pharmacytransferview.autoSuggests["x_LastMonthSale"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_pharmacytransfer->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_pharmacytransfer_view->ExportOptions->render("body") ?>
<?php $view_pharmacytransfer_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_pharmacytransfer_view->showPageHeader(); ?>
<?php
$view_pharmacytransfer_view->showMessage();
?>
<form name="fview_pharmacytransferview" id="fview_pharmacytransferview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacytransfer_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacytransfer_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacytransfer_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_pharmacytransfer->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ORDNO"><?php echo $view_pharmacytransfer->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO"<?php echo $view_pharmacytransfer->ORDNO->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ORDNO">
<span<?php echo $view_pharmacytransfer->ORDNO->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BRCODE"><?php echo $view_pharmacytransfer->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_pharmacytransfer->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BRCODE">
<span<?php echo $view_pharmacytransfer->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PRC"><?php echo $view_pharmacytransfer->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_pharmacytransfer->PRC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PRC">
<span<?php echo $view_pharmacytransfer->PRC->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_QTY"><?php echo $view_pharmacytransfer->QTY->caption() ?></span></td>
		<td data-name="QTY"<?php echo $view_pharmacytransfer->QTY->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_QTY">
<span<?php echo $view_pharmacytransfer->QTY->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_DT"><?php echo $view_pharmacytransfer->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $view_pharmacytransfer->DT->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_DT">
<span<?php echo $view_pharmacytransfer->DT->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PC"><?php echo $view_pharmacytransfer->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $view_pharmacytransfer->PC->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PC">
<span<?php echo $view_pharmacytransfer->PC->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_YM"><?php echo $view_pharmacytransfer->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $view_pharmacytransfer->YM->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_YM">
<span<?php echo $view_pharmacytransfer->YM->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Stock"><?php echo $view_pharmacytransfer->Stock->caption() ?></span></td>
		<td data-name="Stock"<?php echo $view_pharmacytransfer->Stock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Stock">
<span<?php echo $view_pharmacytransfer->Stock->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Printcheck"><?php echo $view_pharmacytransfer->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck"<?php echo $view_pharmacytransfer->Printcheck->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Printcheck">
<span<?php echo $view_pharmacytransfer->Printcheck->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_id"><?php echo $view_pharmacytransfer->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_pharmacytransfer->id->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_id">
<span<?php echo $view_pharmacytransfer->id->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->grnid->Visible) { // grnid ?>
	<tr id="r_grnid">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnid"><?php echo $view_pharmacytransfer->grnid->caption() ?></span></td>
		<td data-name="grnid"<?php echo $view_pharmacytransfer->grnid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnid">
<span<?php echo $view_pharmacytransfer->grnid->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grnid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_poid"><?php echo $view_pharmacytransfer->poid->caption() ?></span></td>
		<td data-name="poid"<?php echo $view_pharmacytransfer->poid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_poid">
<span<?php echo $view_pharmacytransfer->poid->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_LastMonthSale"><?php echo $view_pharmacytransfer->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale"<?php echo $view_pharmacytransfer->LastMonthSale->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_LastMonthSale">
<span<?php echo $view_pharmacytransfer->LastMonthSale->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PrName"><?php echo $view_pharmacytransfer->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $view_pharmacytransfer->PrName->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PrName">
<span<?php echo $view_pharmacytransfer->PrName->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnQuantity"><?php echo $view_pharmacytransfer->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity"<?php echo $view_pharmacytransfer->GrnQuantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnQuantity">
<span<?php echo $view_pharmacytransfer->GrnQuantity->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Quantity"><?php echo $view_pharmacytransfer->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $view_pharmacytransfer->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Quantity">
<span<?php echo $view_pharmacytransfer->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->FreeQty->Visible) { // FreeQty ?>
	<tr id="r_FreeQty">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_FreeQty"><?php echo $view_pharmacytransfer->FreeQty->caption() ?></span></td>
		<td data-name="FreeQty"<?php echo $view_pharmacytransfer->FreeQty->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_FreeQty">
<span<?php echo $view_pharmacytransfer->FreeQty->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->FreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BatchNo"><?php echo $view_pharmacytransfer->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo"<?php echo $view_pharmacytransfer->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BatchNo">
<span<?php echo $view_pharmacytransfer->BatchNo->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->ExpDate->Visible) { // ExpDate ?>
	<tr id="r_ExpDate">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ExpDate"><?php echo $view_pharmacytransfer->ExpDate->caption() ?></span></td>
		<td data-name="ExpDate"<?php echo $view_pharmacytransfer->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ExpDate">
<span<?php echo $view_pharmacytransfer->ExpDate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ExpDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HSN"><?php echo $view_pharmacytransfer->HSN->caption() ?></span></td>
		<td data-name="HSN"<?php echo $view_pharmacytransfer->HSN->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_HSN">
<span<?php echo $view_pharmacytransfer->HSN->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MFRCODE"><?php echo $view_pharmacytransfer->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $view_pharmacytransfer->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MFRCODE">
<span<?php echo $view_pharmacytransfer->MFRCODE->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PUnit"><?php echo $view_pharmacytransfer->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $view_pharmacytransfer->PUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PUnit">
<span<?php echo $view_pharmacytransfer->PUnit->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SUnit"><?php echo $view_pharmacytransfer->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $view_pharmacytransfer->SUnit->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SUnit">
<span<?php echo $view_pharmacytransfer->SUnit->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MRP"><?php echo $view_pharmacytransfer->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $view_pharmacytransfer->MRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_MRP">
<span<?php echo $view_pharmacytransfer->MRP->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurValue"><?php echo $view_pharmacytransfer->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $view_pharmacytransfer->PurValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurValue">
<span<?php echo $view_pharmacytransfer->PurValue->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->Disc->Visible) { // Disc ?>
	<tr id="r_Disc">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Disc"><?php echo $view_pharmacytransfer->Disc->caption() ?></span></td>
		<td data-name="Disc"<?php echo $view_pharmacytransfer->Disc->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Disc">
<span<?php echo $view_pharmacytransfer->Disc->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Disc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PSGST"><?php echo $view_pharmacytransfer->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $view_pharmacytransfer->PSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PSGST">
<span<?php echo $view_pharmacytransfer->PSGST->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PCGST"><?php echo $view_pharmacytransfer->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $view_pharmacytransfer->PCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PCGST">
<span<?php echo $view_pharmacytransfer->PCGST->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PTax->Visible) { // PTax ?>
	<tr id="r_PTax">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PTax"><?php echo $view_pharmacytransfer->PTax->caption() ?></span></td>
		<td data-name="PTax"<?php echo $view_pharmacytransfer->PTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PTax">
<span<?php echo $view_pharmacytransfer->PTax->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->ItemValue->Visible) { // ItemValue ?>
	<tr id="r_ItemValue">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ItemValue"><?php echo $view_pharmacytransfer->ItemValue->caption() ?></span></td>
		<td data-name="ItemValue"<?php echo $view_pharmacytransfer->ItemValue->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ItemValue">
<span<?php echo $view_pharmacytransfer->ItemValue->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ItemValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->SalTax->Visible) { // SalTax ?>
	<tr id="r_SalTax">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalTax"><?php echo $view_pharmacytransfer->SalTax->caption() ?></span></td>
		<td data-name="SalTax"<?php echo $view_pharmacytransfer->SalTax->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalTax">
<span<?php echo $view_pharmacytransfer->SalTax->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->SalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurRate"><?php echo $view_pharmacytransfer->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $view_pharmacytransfer->PurRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_PurRate">
<span<?php echo $view_pharmacytransfer->PurRate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->SalRate->Visible) { // SalRate ?>
	<tr id="r_SalRate">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalRate"><?php echo $view_pharmacytransfer->SalRate->caption() ?></span></td>
		<td data-name="SalRate"<?php echo $view_pharmacytransfer->SalRate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SalRate">
<span<?php echo $view_pharmacytransfer->SalRate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->SalRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Discount"><?php echo $view_pharmacytransfer->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $view_pharmacytransfer->Discount->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Discount">
<span<?php echo $view_pharmacytransfer->Discount->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SSGST"><?php echo $view_pharmacytransfer->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $view_pharmacytransfer->SSGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SSGST">
<span<?php echo $view_pharmacytransfer->SSGST->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SCGST"><?php echo $view_pharmacytransfer->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $view_pharmacytransfer->SCGST->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_SCGST">
<span<?php echo $view_pharmacytransfer->SCGST->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Pack"><?php echo $view_pharmacytransfer->Pack->caption() ?></span></td>
		<td data-name="Pack"<?php echo $view_pharmacytransfer->Pack->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Pack">
<span<?php echo $view_pharmacytransfer->Pack->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnMRP"><?php echo $view_pharmacytransfer->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP"<?php echo $view_pharmacytransfer->GrnMRP->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_GrnMRP">
<span<?php echo $view_pharmacytransfer->GrnMRP->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_trid"><?php echo $view_pharmacytransfer->trid->caption() ?></span></td>
		<td data-name="trid"<?php echo $view_pharmacytransfer->trid->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_trid">
<span<?php echo $view_pharmacytransfer->trid->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HospID"><?php echo $view_pharmacytransfer->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_pharmacytransfer->HospID->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_HospID">
<span<?php echo $view_pharmacytransfer->HospID->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedBy"><?php echo $view_pharmacytransfer->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $view_pharmacytransfer->CreatedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedBy">
<span<?php echo $view_pharmacytransfer->CreatedBy->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedDateTime"><?php echo $view_pharmacytransfer->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_pharmacytransfer->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CreatedDateTime">
<span<?php echo $view_pharmacytransfer->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedBy"><?php echo $view_pharmacytransfer->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $view_pharmacytransfer->ModifiedBy->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedBy">
<span<?php echo $view_pharmacytransfer->ModifiedBy->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedDateTime"><?php echo $view_pharmacytransfer->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_pharmacytransfer->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_ModifiedDateTime">
<span<?php echo $view_pharmacytransfer->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedby"><?php echo $view_pharmacytransfer->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby"<?php echo $view_pharmacytransfer->grncreatedby->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grncreatedby">
<span<?php echo $view_pharmacytransfer->grncreatedby->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedDateTime"><?php echo $view_pharmacytransfer->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime"<?php echo $view_pharmacytransfer->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grncreatedDateTime">
<span<?php echo $view_pharmacytransfer->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedby"><?php echo $view_pharmacytransfer->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby"<?php echo $view_pharmacytransfer->grnModifiedby->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnModifiedby">
<span<?php echo $view_pharmacytransfer->grnModifiedby->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedDateTime"><?php echo $view_pharmacytransfer->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime"<?php echo $view_pharmacytransfer->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_grnModifiedDateTime">
<span<?php echo $view_pharmacytransfer->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Received"><?php echo $view_pharmacytransfer->Received->caption() ?></span></td>
		<td data-name="Received"<?php echo $view_pharmacytransfer->Received->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_Received">
<span<?php echo $view_pharmacytransfer->Received->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->BillDate->Visible) { // BillDate ?>
	<tr id="r_BillDate">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BillDate"><?php echo $view_pharmacytransfer->BillDate->caption() ?></span></td>
		<td data-name="BillDate"<?php echo $view_pharmacytransfer->BillDate->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_BillDate">
<span<?php echo $view_pharmacytransfer->BillDate->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->BillDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacytransfer->CurStock->Visible) { // CurStock ?>
	<tr id="r_CurStock">
		<td class="<?php echo $view_pharmacytransfer_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CurStock"><?php echo $view_pharmacytransfer->CurStock->caption() ?></span></td>
		<td data-name="CurStock"<?php echo $view_pharmacytransfer->CurStock->cellAttributes() ?>>
<span id="el_view_pharmacytransfer_CurStock">
<span<?php echo $view_pharmacytransfer->CurStock->viewAttributes() ?>>
<?php echo $view_pharmacytransfer->CurStock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_pharmacytransfer_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacytransfer->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacytransfer_view->terminate();
?>