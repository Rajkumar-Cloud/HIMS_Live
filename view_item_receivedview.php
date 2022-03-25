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
$view_item_received_view = new view_item_received_view();

// Run the page
$view_item_received_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_item_received_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_item_received->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_item_receivedview = currentForm = new ew.Form("fview_item_receivedview", "view");

// Form_CustomValidate event
fview_item_receivedview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_item_receivedview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_item_receivedview.lists["x_ORDNO"] = <?php echo $view_item_received_view->ORDNO->Lookup->toClientList() ?>;
fview_item_receivedview.lists["x_ORDNO"].options = <?php echo JsonEncode($view_item_received_view->ORDNO->lookupOptions()) ?>;
fview_item_receivedview.lists["x_Received[]"] = <?php echo $view_item_received_view->Received->Lookup->toClientList() ?>;
fview_item_receivedview.lists["x_Received[]"].options = <?php echo JsonEncode($view_item_received_view->Received->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_item_received->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_item_received_view->ExportOptions->render("body") ?>
<?php $view_item_received_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_item_received_view->showPageHeader(); ?>
<?php
$view_item_received_view->showMessage();
?>
<form name="fview_item_receivedview" id="fview_item_receivedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_item_received_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_item_received_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_item_received">
<input type="hidden" name="modal" value="<?php echo (int)$view_item_received_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_item_received->ORDNO->Visible) { // ORDNO ?>
	<tr id="r_ORDNO">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_ORDNO"><?php echo $view_item_received->ORDNO->caption() ?></span></td>
		<td data-name="ORDNO"<?php echo $view_item_received->ORDNO->cellAttributes() ?>>
<span id="el_view_item_received_ORDNO">
<span<?php echo $view_item_received->ORDNO->viewAttributes() ?>>
<?php echo $view_item_received->ORDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_BRCODE"><?php echo $view_item_received->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $view_item_received->BRCODE->cellAttributes() ?>>
<span id="el_view_item_received_BRCODE">
<span<?php echo $view_item_received->BRCODE->viewAttributes() ?>>
<?php echo $view_item_received->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PRC->Visible) { // PRC ?>
	<tr id="r_PRC">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PRC"><?php echo $view_item_received->PRC->caption() ?></span></td>
		<td data-name="PRC"<?php echo $view_item_received->PRC->cellAttributes() ?>>
<span id="el_view_item_received_PRC">
<span<?php echo $view_item_received->PRC->viewAttributes() ?>>
<?php echo $view_item_received->PRC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PrName->Visible) { // PrName ?>
	<tr id="r_PrName">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PrName"><?php echo $view_item_received->PrName->caption() ?></span></td>
		<td data-name="PrName"<?php echo $view_item_received->PrName->cellAttributes() ?>>
<span id="el_view_item_received_PrName">
<span<?php echo $view_item_received->PrName->viewAttributes() ?>>
<?php echo $view_item_received->PrName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->MFRCODE->Visible) { // MFRCODE ?>
	<tr id="r_MFRCODE">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_MFRCODE"><?php echo $view_item_received->MFRCODE->caption() ?></span></td>
		<td data-name="MFRCODE"<?php echo $view_item_received->MFRCODE->cellAttributes() ?>>
<span id="el_view_item_received_MFRCODE">
<span<?php echo $view_item_received->MFRCODE->viewAttributes() ?>>
<?php echo $view_item_received->MFRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->QTY->Visible) { // QTY ?>
	<tr id="r_QTY">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_QTY"><?php echo $view_item_received->QTY->caption() ?></span></td>
		<td data-name="QTY"<?php echo $view_item_received->QTY->cellAttributes() ?>>
<span id="el_view_item_received_QTY">
<span<?php echo $view_item_received->QTY->viewAttributes() ?>>
<?php echo $view_item_received->QTY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_DT"><?php echo $view_item_received->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $view_item_received->DT->cellAttributes() ?>>
<span id="el_view_item_received_DT">
<span<?php echo $view_item_received->DT->viewAttributes() ?>>
<?php echo $view_item_received->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PC->Visible) { // PC ?>
	<tr id="r_PC">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PC"><?php echo $view_item_received->PC->caption() ?></span></td>
		<td data-name="PC"<?php echo $view_item_received->PC->cellAttributes() ?>>
<span id="el_view_item_received_PC">
<span<?php echo $view_item_received->PC->viewAttributes() ?>>
<?php echo $view_item_received->PC->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->YM->Visible) { // YM ?>
	<tr id="r_YM">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_YM"><?php echo $view_item_received->YM->caption() ?></span></td>
		<td data-name="YM"<?php echo $view_item_received->YM->cellAttributes() ?>>
<span id="el_view_item_received_YM">
<span<?php echo $view_item_received->YM->viewAttributes() ?>>
<?php echo $view_item_received->YM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->Stock->Visible) { // Stock ?>
	<tr id="r_Stock">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_Stock"><?php echo $view_item_received->Stock->caption() ?></span></td>
		<td data-name="Stock"<?php echo $view_item_received->Stock->cellAttributes() ?>>
<span id="el_view_item_received_Stock">
<span<?php echo $view_item_received->Stock->viewAttributes() ?>>
<?php echo $view_item_received->Stock->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->LastMonthSale->Visible) { // LastMonthSale ?>
	<tr id="r_LastMonthSale">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_LastMonthSale"><?php echo $view_item_received->LastMonthSale->caption() ?></span></td>
		<td data-name="LastMonthSale"<?php echo $view_item_received->LastMonthSale->cellAttributes() ?>>
<span id="el_view_item_received_LastMonthSale">
<span<?php echo $view_item_received->LastMonthSale->viewAttributes() ?>>
<?php echo $view_item_received->LastMonthSale->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->Printcheck->Visible) { // Printcheck ?>
	<tr id="r_Printcheck">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_Printcheck"><?php echo $view_item_received->Printcheck->caption() ?></span></td>
		<td data-name="Printcheck"<?php echo $view_item_received->Printcheck->cellAttributes() ?>>
<span id="el_view_item_received_Printcheck">
<span<?php echo $view_item_received->Printcheck->viewAttributes() ?>>
<?php echo $view_item_received->Printcheck->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_id"><?php echo $view_item_received->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_item_received->id->cellAttributes() ?>>
<span id="el_view_item_received_id">
<span<?php echo $view_item_received->id->viewAttributes() ?>>
<?php echo $view_item_received->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->poid->Visible) { // poid ?>
	<tr id="r_poid">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_poid"><?php echo $view_item_received->poid->caption() ?></span></td>
		<td data-name="poid"<?php echo $view_item_received->poid->cellAttributes() ?>>
<span id="el_view_item_received_poid">
<span<?php echo $view_item_received->poid->viewAttributes() ?>>
<?php echo $view_item_received->poid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->grnid->Visible) { // grnid ?>
	<tr id="r_grnid">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_grnid"><?php echo $view_item_received->grnid->caption() ?></span></td>
		<td data-name="grnid"<?php echo $view_item_received->grnid->cellAttributes() ?>>
<span id="el_view_item_received_grnid">
<span<?php echo $view_item_received->grnid->viewAttributes() ?>>
<?php echo $view_item_received->grnid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_BatchNo"><?php echo $view_item_received->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo"<?php echo $view_item_received->BatchNo->cellAttributes() ?>>
<span id="el_view_item_received_BatchNo">
<span<?php echo $view_item_received->BatchNo->viewAttributes() ?>>
<?php echo $view_item_received->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->ExpDate->Visible) { // ExpDate ?>
	<tr id="r_ExpDate">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_ExpDate"><?php echo $view_item_received->ExpDate->caption() ?></span></td>
		<td data-name="ExpDate"<?php echo $view_item_received->ExpDate->cellAttributes() ?>>
<span id="el_view_item_received_ExpDate">
<span<?php echo $view_item_received->ExpDate->viewAttributes() ?>>
<?php echo $view_item_received->ExpDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_Quantity"><?php echo $view_item_received->Quantity->caption() ?></span></td>
		<td data-name="Quantity"<?php echo $view_item_received->Quantity->cellAttributes() ?>>
<span id="el_view_item_received_Quantity">
<span<?php echo $view_item_received->Quantity->viewAttributes() ?>>
<?php echo $view_item_received->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->FreeQty->Visible) { // FreeQty ?>
	<tr id="r_FreeQty">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_FreeQty"><?php echo $view_item_received->FreeQty->caption() ?></span></td>
		<td data-name="FreeQty"<?php echo $view_item_received->FreeQty->cellAttributes() ?>>
<span id="el_view_item_received_FreeQty">
<span<?php echo $view_item_received->FreeQty->viewAttributes() ?>>
<?php echo $view_item_received->FreeQty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->ItemValue->Visible) { // ItemValue ?>
	<tr id="r_ItemValue">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_ItemValue"><?php echo $view_item_received->ItemValue->caption() ?></span></td>
		<td data-name="ItemValue"<?php echo $view_item_received->ItemValue->cellAttributes() ?>>
<span id="el_view_item_received_ItemValue">
<span<?php echo $view_item_received->ItemValue->viewAttributes() ?>>
<?php echo $view_item_received->ItemValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->Disc->Visible) { // Disc ?>
	<tr id="r_Disc">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_Disc"><?php echo $view_item_received->Disc->caption() ?></span></td>
		<td data-name="Disc"<?php echo $view_item_received->Disc->cellAttributes() ?>>
<span id="el_view_item_received_Disc">
<span<?php echo $view_item_received->Disc->viewAttributes() ?>>
<?php echo $view_item_received->Disc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PTax->Visible) { // PTax ?>
	<tr id="r_PTax">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PTax"><?php echo $view_item_received->PTax->caption() ?></span></td>
		<td data-name="PTax"<?php echo $view_item_received->PTax->cellAttributes() ?>>
<span id="el_view_item_received_PTax">
<span<?php echo $view_item_received->PTax->viewAttributes() ?>>
<?php echo $view_item_received->PTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->MRP->Visible) { // MRP ?>
	<tr id="r_MRP">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_MRP"><?php echo $view_item_received->MRP->caption() ?></span></td>
		<td data-name="MRP"<?php echo $view_item_received->MRP->cellAttributes() ?>>
<span id="el_view_item_received_MRP">
<span<?php echo $view_item_received->MRP->viewAttributes() ?>>
<?php echo $view_item_received->MRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->SalTax->Visible) { // SalTax ?>
	<tr id="r_SalTax">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_SalTax"><?php echo $view_item_received->SalTax->caption() ?></span></td>
		<td data-name="SalTax"<?php echo $view_item_received->SalTax->cellAttributes() ?>>
<span id="el_view_item_received_SalTax">
<span<?php echo $view_item_received->SalTax->viewAttributes() ?>>
<?php echo $view_item_received->SalTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PurValue->Visible) { // PurValue ?>
	<tr id="r_PurValue">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PurValue"><?php echo $view_item_received->PurValue->caption() ?></span></td>
		<td data-name="PurValue"<?php echo $view_item_received->PurValue->cellAttributes() ?>>
<span id="el_view_item_received_PurValue">
<span<?php echo $view_item_received->PurValue->viewAttributes() ?>>
<?php echo $view_item_received->PurValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PurRate->Visible) { // PurRate ?>
	<tr id="r_PurRate">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PurRate"><?php echo $view_item_received->PurRate->caption() ?></span></td>
		<td data-name="PurRate"<?php echo $view_item_received->PurRate->cellAttributes() ?>>
<span id="el_view_item_received_PurRate">
<span<?php echo $view_item_received->PurRate->viewAttributes() ?>>
<?php echo $view_item_received->PurRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->SalRate->Visible) { // SalRate ?>
	<tr id="r_SalRate">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_SalRate"><?php echo $view_item_received->SalRate->caption() ?></span></td>
		<td data-name="SalRate"<?php echo $view_item_received->SalRate->cellAttributes() ?>>
<span id="el_view_item_received_SalRate">
<span<?php echo $view_item_received->SalRate->viewAttributes() ?>>
<?php echo $view_item_received->SalRate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_Discount"><?php echo $view_item_received->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $view_item_received->Discount->cellAttributes() ?>>
<span id="el_view_item_received_Discount">
<span<?php echo $view_item_received->Discount->viewAttributes() ?>>
<?php echo $view_item_received->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PSGST->Visible) { // PSGST ?>
	<tr id="r_PSGST">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PSGST"><?php echo $view_item_received->PSGST->caption() ?></span></td>
		<td data-name="PSGST"<?php echo $view_item_received->PSGST->cellAttributes() ?>>
<span id="el_view_item_received_PSGST">
<span<?php echo $view_item_received->PSGST->viewAttributes() ?>>
<?php echo $view_item_received->PSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PCGST->Visible) { // PCGST ?>
	<tr id="r_PCGST">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PCGST"><?php echo $view_item_received->PCGST->caption() ?></span></td>
		<td data-name="PCGST"<?php echo $view_item_received->PCGST->cellAttributes() ?>>
<span id="el_view_item_received_PCGST">
<span<?php echo $view_item_received->PCGST->viewAttributes() ?>>
<?php echo $view_item_received->PCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->SSGST->Visible) { // SSGST ?>
	<tr id="r_SSGST">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_SSGST"><?php echo $view_item_received->SSGST->caption() ?></span></td>
		<td data-name="SSGST"<?php echo $view_item_received->SSGST->cellAttributes() ?>>
<span id="el_view_item_received_SSGST">
<span<?php echo $view_item_received->SSGST->viewAttributes() ?>>
<?php echo $view_item_received->SSGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->SCGST->Visible) { // SCGST ?>
	<tr id="r_SCGST">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_SCGST"><?php echo $view_item_received->SCGST->caption() ?></span></td>
		<td data-name="SCGST"<?php echo $view_item_received->SCGST->cellAttributes() ?>>
<span id="el_view_item_received_SCGST">
<span<?php echo $view_item_received->SCGST->viewAttributes() ?>>
<?php echo $view_item_received->SCGST->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->HSN->Visible) { // HSN ?>
	<tr id="r_HSN">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_HSN"><?php echo $view_item_received->HSN->caption() ?></span></td>
		<td data-name="HSN"<?php echo $view_item_received->HSN->cellAttributes() ?>>
<span id="el_view_item_received_HSN">
<span<?php echo $view_item_received->HSN->viewAttributes() ?>>
<?php echo $view_item_received->HSN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->Pack->Visible) { // Pack ?>
	<tr id="r_Pack">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_Pack"><?php echo $view_item_received->Pack->caption() ?></span></td>
		<td data-name="Pack"<?php echo $view_item_received->Pack->cellAttributes() ?>>
<span id="el_view_item_received_Pack">
<span<?php echo $view_item_received->Pack->viewAttributes() ?>>
<?php echo $view_item_received->Pack->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->PUnit->Visible) { // PUnit ?>
	<tr id="r_PUnit">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_PUnit"><?php echo $view_item_received->PUnit->caption() ?></span></td>
		<td data-name="PUnit"<?php echo $view_item_received->PUnit->cellAttributes() ?>>
<span id="el_view_item_received_PUnit">
<span<?php echo $view_item_received->PUnit->viewAttributes() ?>>
<?php echo $view_item_received->PUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->SUnit->Visible) { // SUnit ?>
	<tr id="r_SUnit">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_SUnit"><?php echo $view_item_received->SUnit->caption() ?></span></td>
		<td data-name="SUnit"<?php echo $view_item_received->SUnit->cellAttributes() ?>>
<span id="el_view_item_received_SUnit">
<span<?php echo $view_item_received->SUnit->viewAttributes() ?>>
<?php echo $view_item_received->SUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->GrnQuantity->Visible) { // GrnQuantity ?>
	<tr id="r_GrnQuantity">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_GrnQuantity"><?php echo $view_item_received->GrnQuantity->caption() ?></span></td>
		<td data-name="GrnQuantity"<?php echo $view_item_received->GrnQuantity->cellAttributes() ?>>
<span id="el_view_item_received_GrnQuantity">
<span<?php echo $view_item_received->GrnQuantity->viewAttributes() ?>>
<?php echo $view_item_received->GrnQuantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->GrnMRP->Visible) { // GrnMRP ?>
	<tr id="r_GrnMRP">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_GrnMRP"><?php echo $view_item_received->GrnMRP->caption() ?></span></td>
		<td data-name="GrnMRP"<?php echo $view_item_received->GrnMRP->cellAttributes() ?>>
<span id="el_view_item_received_GrnMRP">
<span<?php echo $view_item_received->GrnMRP->viewAttributes() ?>>
<?php echo $view_item_received->GrnMRP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->trid->Visible) { // trid ?>
	<tr id="r_trid">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_trid"><?php echo $view_item_received->trid->caption() ?></span></td>
		<td data-name="trid"<?php echo $view_item_received->trid->cellAttributes() ?>>
<span id="el_view_item_received_trid">
<span<?php echo $view_item_received->trid->viewAttributes() ?>>
<?php echo $view_item_received->trid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_HospID"><?php echo $view_item_received->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_item_received->HospID->cellAttributes() ?>>
<span id="el_view_item_received_HospID">
<span<?php echo $view_item_received->HospID->viewAttributes() ?>>
<?php echo $view_item_received->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_CreatedBy"><?php echo $view_item_received->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $view_item_received->CreatedBy->cellAttributes() ?>>
<span id="el_view_item_received_CreatedBy">
<span<?php echo $view_item_received->CreatedBy->viewAttributes() ?>>
<?php echo $view_item_received->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_CreatedDateTime"><?php echo $view_item_received->CreatedDateTime->caption() ?></span></td>
		<td data-name="CreatedDateTime"<?php echo $view_item_received->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_CreatedDateTime">
<span<?php echo $view_item_received->CreatedDateTime->viewAttributes() ?>>
<?php echo $view_item_received->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_ModifiedBy"><?php echo $view_item_received->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $view_item_received->ModifiedBy->cellAttributes() ?>>
<span id="el_view_item_received_ModifiedBy">
<span<?php echo $view_item_received->ModifiedBy->viewAttributes() ?>>
<?php echo $view_item_received->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_ModifiedDateTime"><?php echo $view_item_received->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $view_item_received->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_ModifiedDateTime">
<span<?php echo $view_item_received->ModifiedDateTime->viewAttributes() ?>>
<?php echo $view_item_received->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->grncreatedby->Visible) { // grncreatedby ?>
	<tr id="r_grncreatedby">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_grncreatedby"><?php echo $view_item_received->grncreatedby->caption() ?></span></td>
		<td data-name="grncreatedby"<?php echo $view_item_received->grncreatedby->cellAttributes() ?>>
<span id="el_view_item_received_grncreatedby">
<span<?php echo $view_item_received->grncreatedby->viewAttributes() ?>>
<?php echo $view_item_received->grncreatedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
	<tr id="r_grncreatedDateTime">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_grncreatedDateTime"><?php echo $view_item_received->grncreatedDateTime->caption() ?></span></td>
		<td data-name="grncreatedDateTime"<?php echo $view_item_received->grncreatedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_grncreatedDateTime">
<span<?php echo $view_item_received->grncreatedDateTime->viewAttributes() ?>>
<?php echo $view_item_received->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->grnModifiedby->Visible) { // grnModifiedby ?>
	<tr id="r_grnModifiedby">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_grnModifiedby"><?php echo $view_item_received->grnModifiedby->caption() ?></span></td>
		<td data-name="grnModifiedby"<?php echo $view_item_received->grnModifiedby->cellAttributes() ?>>
<span id="el_view_item_received_grnModifiedby">
<span<?php echo $view_item_received->grnModifiedby->viewAttributes() ?>>
<?php echo $view_item_received->grnModifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
	<tr id="r_grnModifiedDateTime">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_grnModifiedDateTime"><?php echo $view_item_received->grnModifiedDateTime->caption() ?></span></td>
		<td data-name="grnModifiedDateTime"<?php echo $view_item_received->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_view_item_received_grnModifiedDateTime">
<span<?php echo $view_item_received->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $view_item_received->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_item_received->Received->Visible) { // Received ?>
	<tr id="r_Received">
		<td class="<?php echo $view_item_received_view->TableLeftColumnClass ?>"><span id="elh_view_item_received_Received"><?php echo $view_item_received->Received->caption() ?></span></td>
		<td data-name="Received"<?php echo $view_item_received->Received->cellAttributes() ?>>
<span id="el_view_item_received_Received">
<span<?php echo $view_item_received->Received->viewAttributes() ?>>
<?php echo $view_item_received->Received->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_item_received_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_item_received->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_item_received_view->terminate();
?>