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
$store_purchaseorder_delete = new store_purchaseorder_delete();

// Run the page
$store_purchaseorder_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_purchaseorder_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_purchaseorderdelete = currentForm = new ew.Form("fstore_purchaseorderdelete", "delete");

// Form_CustomValidate event
fstore_purchaseorderdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_purchaseorderdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_purchaseorder_delete->showPageHeader(); ?>
<?php
$store_purchaseorder_delete->showMessage();
?>
<form name="fstore_purchaseorderdelete" id="fstore_purchaseorderdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_purchaseorder_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_purchaseorder_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_purchaseorder">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_purchaseorder_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_purchaseorder->ORDNO->Visible) { // ORDNO ?>
		<th class="<?php echo $store_purchaseorder->ORDNO->headerCellClass() ?>"><span id="elh_store_purchaseorder_ORDNO" class="store_purchaseorder_ORDNO"><?php echo $store_purchaseorder->ORDNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PRC->Visible) { // PRC ?>
		<th class="<?php echo $store_purchaseorder->PRC->headerCellClass() ?>"><span id="elh_store_purchaseorder_PRC" class="store_purchaseorder_PRC"><?php echo $store_purchaseorder->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->QTY->Visible) { // QTY ?>
		<th class="<?php echo $store_purchaseorder->QTY->headerCellClass() ?>"><span id="elh_store_purchaseorder_QTY" class="store_purchaseorder_QTY"><?php echo $store_purchaseorder->QTY->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->DT->Visible) { // DT ?>
		<th class="<?php echo $store_purchaseorder->DT->headerCellClass() ?>"><span id="elh_store_purchaseorder_DT" class="store_purchaseorder_DT"><?php echo $store_purchaseorder->DT->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PC->Visible) { // PC ?>
		<th class="<?php echo $store_purchaseorder->PC->headerCellClass() ?>"><span id="elh_store_purchaseorder_PC" class="store_purchaseorder_PC"><?php echo $store_purchaseorder->PC->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->YM->Visible) { // YM ?>
		<th class="<?php echo $store_purchaseorder->YM->headerCellClass() ?>"><span id="elh_store_purchaseorder_YM" class="store_purchaseorder_YM"><?php echo $store_purchaseorder->YM->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
		<th class="<?php echo $store_purchaseorder->MFRCODE->headerCellClass() ?>"><span id="elh_store_purchaseorder_MFRCODE" class="store_purchaseorder_MFRCODE"><?php echo $store_purchaseorder->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->Stock->Visible) { // Stock ?>
		<th class="<?php echo $store_purchaseorder->Stock->headerCellClass() ?>"><span id="elh_store_purchaseorder_Stock" class="store_purchaseorder_Stock"><?php echo $store_purchaseorder->Stock->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<th class="<?php echo $store_purchaseorder->LastMonthSale->headerCellClass() ?>"><span id="elh_store_purchaseorder_LastMonthSale" class="store_purchaseorder_LastMonthSale"><?php echo $store_purchaseorder->LastMonthSale->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->Printcheck->Visible) { // Printcheck ?>
		<th class="<?php echo $store_purchaseorder->Printcheck->headerCellClass() ?>"><span id="elh_store_purchaseorder_Printcheck" class="store_purchaseorder_Printcheck"><?php echo $store_purchaseorder->Printcheck->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->id->Visible) { // id ?>
		<th class="<?php echo $store_purchaseorder->id->headerCellClass() ?>"><span id="elh_store_purchaseorder_id" class="store_purchaseorder_id"><?php echo $store_purchaseorder->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->poid->Visible) { // poid ?>
		<th class="<?php echo $store_purchaseorder->poid->headerCellClass() ?>"><span id="elh_store_purchaseorder_poid" class="store_purchaseorder_poid"><?php echo $store_purchaseorder->poid->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->grnid->Visible) { // grnid ?>
		<th class="<?php echo $store_purchaseorder->grnid->headerCellClass() ?>"><span id="elh_store_purchaseorder_grnid" class="store_purchaseorder_grnid"><?php echo $store_purchaseorder->grnid->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->BatchNo->Visible) { // BatchNo ?>
		<th class="<?php echo $store_purchaseorder->BatchNo->headerCellClass() ?>"><span id="elh_store_purchaseorder_BatchNo" class="store_purchaseorder_BatchNo"><?php echo $store_purchaseorder->BatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->ExpDate->Visible) { // ExpDate ?>
		<th class="<?php echo $store_purchaseorder->ExpDate->headerCellClass() ?>"><span id="elh_store_purchaseorder_ExpDate" class="store_purchaseorder_ExpDate"><?php echo $store_purchaseorder->ExpDate->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PrName->Visible) { // PrName ?>
		<th class="<?php echo $store_purchaseorder->PrName->headerCellClass() ?>"><span id="elh_store_purchaseorder_PrName" class="store_purchaseorder_PrName"><?php echo $store_purchaseorder->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $store_purchaseorder->Quantity->headerCellClass() ?>"><span id="elh_store_purchaseorder_Quantity" class="store_purchaseorder_Quantity"><?php echo $store_purchaseorder->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->FreeQty->Visible) { // FreeQty ?>
		<th class="<?php echo $store_purchaseorder->FreeQty->headerCellClass() ?>"><span id="elh_store_purchaseorder_FreeQty" class="store_purchaseorder_FreeQty"><?php echo $store_purchaseorder->FreeQty->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->ItemValue->Visible) { // ItemValue ?>
		<th class="<?php echo $store_purchaseorder->ItemValue->headerCellClass() ?>"><span id="elh_store_purchaseorder_ItemValue" class="store_purchaseorder_ItemValue"><?php echo $store_purchaseorder->ItemValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->Disc->Visible) { // Disc ?>
		<th class="<?php echo $store_purchaseorder->Disc->headerCellClass() ?>"><span id="elh_store_purchaseorder_Disc" class="store_purchaseorder_Disc"><?php echo $store_purchaseorder->Disc->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PTax->Visible) { // PTax ?>
		<th class="<?php echo $store_purchaseorder->PTax->headerCellClass() ?>"><span id="elh_store_purchaseorder_PTax" class="store_purchaseorder_PTax"><?php echo $store_purchaseorder->PTax->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->MRP->Visible) { // MRP ?>
		<th class="<?php echo $store_purchaseorder->MRP->headerCellClass() ?>"><span id="elh_store_purchaseorder_MRP" class="store_purchaseorder_MRP"><?php echo $store_purchaseorder->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->SalTax->Visible) { // SalTax ?>
		<th class="<?php echo $store_purchaseorder->SalTax->headerCellClass() ?>"><span id="elh_store_purchaseorder_SalTax" class="store_purchaseorder_SalTax"><?php echo $store_purchaseorder->SalTax->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PurValue->Visible) { // PurValue ?>
		<th class="<?php echo $store_purchaseorder->PurValue->headerCellClass() ?>"><span id="elh_store_purchaseorder_PurValue" class="store_purchaseorder_PurValue"><?php echo $store_purchaseorder->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PurRate->Visible) { // PurRate ?>
		<th class="<?php echo $store_purchaseorder->PurRate->headerCellClass() ?>"><span id="elh_store_purchaseorder_PurRate" class="store_purchaseorder_PurRate"><?php echo $store_purchaseorder->PurRate->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->SalRate->Visible) { // SalRate ?>
		<th class="<?php echo $store_purchaseorder->SalRate->headerCellClass() ?>"><span id="elh_store_purchaseorder_SalRate" class="store_purchaseorder_SalRate"><?php echo $store_purchaseorder->SalRate->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->Discount->Visible) { // Discount ?>
		<th class="<?php echo $store_purchaseorder->Discount->headerCellClass() ?>"><span id="elh_store_purchaseorder_Discount" class="store_purchaseorder_Discount"><?php echo $store_purchaseorder->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PSGST->Visible) { // PSGST ?>
		<th class="<?php echo $store_purchaseorder->PSGST->headerCellClass() ?>"><span id="elh_store_purchaseorder_PSGST" class="store_purchaseorder_PSGST"><?php echo $store_purchaseorder->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PCGST->Visible) { // PCGST ?>
		<th class="<?php echo $store_purchaseorder->PCGST->headerCellClass() ?>"><span id="elh_store_purchaseorder_PCGST" class="store_purchaseorder_PCGST"><?php echo $store_purchaseorder->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->SSGST->Visible) { // SSGST ?>
		<th class="<?php echo $store_purchaseorder->SSGST->headerCellClass() ?>"><span id="elh_store_purchaseorder_SSGST" class="store_purchaseorder_SSGST"><?php echo $store_purchaseorder->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->SCGST->Visible) { // SCGST ?>
		<th class="<?php echo $store_purchaseorder->SCGST->headerCellClass() ?>"><span id="elh_store_purchaseorder_SCGST" class="store_purchaseorder_SCGST"><?php echo $store_purchaseorder->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $store_purchaseorder->BRCODE->headerCellClass() ?>"><span id="elh_store_purchaseorder_BRCODE" class="store_purchaseorder_BRCODE"><?php echo $store_purchaseorder->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->HSN->Visible) { // HSN ?>
		<th class="<?php echo $store_purchaseorder->HSN->headerCellClass() ?>"><span id="elh_store_purchaseorder_HSN" class="store_purchaseorder_HSN"><?php echo $store_purchaseorder->HSN->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->Pack->Visible) { // Pack ?>
		<th class="<?php echo $store_purchaseorder->Pack->headerCellClass() ?>"><span id="elh_store_purchaseorder_Pack" class="store_purchaseorder_Pack"><?php echo $store_purchaseorder->Pack->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->PUnit->Visible) { // PUnit ?>
		<th class="<?php echo $store_purchaseorder->PUnit->headerCellClass() ?>"><span id="elh_store_purchaseorder_PUnit" class="store_purchaseorder_PUnit"><?php echo $store_purchaseorder->PUnit->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->SUnit->Visible) { // SUnit ?>
		<th class="<?php echo $store_purchaseorder->SUnit->headerCellClass() ?>"><span id="elh_store_purchaseorder_SUnit" class="store_purchaseorder_SUnit"><?php echo $store_purchaseorder->SUnit->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
		<th class="<?php echo $store_purchaseorder->GrnQuantity->headerCellClass() ?>"><span id="elh_store_purchaseorder_GrnQuantity" class="store_purchaseorder_GrnQuantity"><?php echo $store_purchaseorder->GrnQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
		<th class="<?php echo $store_purchaseorder->GrnMRP->headerCellClass() ?>"><span id="elh_store_purchaseorder_GrnMRP" class="store_purchaseorder_GrnMRP"><?php echo $store_purchaseorder->GrnMRP->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->trid->Visible) { // trid ?>
		<th class="<?php echo $store_purchaseorder->trid->headerCellClass() ?>"><span id="elh_store_purchaseorder_trid" class="store_purchaseorder_trid"><?php echo $store_purchaseorder->trid->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_purchaseorder->HospID->headerCellClass() ?>"><span id="elh_store_purchaseorder_HospID" class="store_purchaseorder_HospID"><?php echo $store_purchaseorder->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $store_purchaseorder->CreatedBy->headerCellClass() ?>"><span id="elh_store_purchaseorder_CreatedBy" class="store_purchaseorder_CreatedBy"><?php echo $store_purchaseorder->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $store_purchaseorder->CreatedDateTime->headerCellClass() ?>"><span id="elh_store_purchaseorder_CreatedDateTime" class="store_purchaseorder_CreatedDateTime"><?php echo $store_purchaseorder->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $store_purchaseorder->ModifiedBy->headerCellClass() ?>"><span id="elh_store_purchaseorder_ModifiedBy" class="store_purchaseorder_ModifiedBy"><?php echo $store_purchaseorder->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $store_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><span id="elh_store_purchaseorder_ModifiedDateTime" class="store_purchaseorder_ModifiedDateTime"><?php echo $store_purchaseorder->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
		<th class="<?php echo $store_purchaseorder->grncreatedby->headerCellClass() ?>"><span id="elh_store_purchaseorder_grncreatedby" class="store_purchaseorder_grncreatedby"><?php echo $store_purchaseorder->grncreatedby->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<th class="<?php echo $store_purchaseorder->grncreatedDateTime->headerCellClass() ?>"><span id="elh_store_purchaseorder_grncreatedDateTime" class="store_purchaseorder_grncreatedDateTime"><?php echo $store_purchaseorder->grncreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
		<th class="<?php echo $store_purchaseorder->grnModifiedby->headerCellClass() ?>"><span id="elh_store_purchaseorder_grnModifiedby" class="store_purchaseorder_grnModifiedby"><?php echo $store_purchaseorder->grnModifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<th class="<?php echo $store_purchaseorder->grnModifiedDateTime->headerCellClass() ?>"><span id="elh_store_purchaseorder_grnModifiedDateTime" class="store_purchaseorder_grnModifiedDateTime"><?php echo $store_purchaseorder->grnModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->Received->Visible) { // Received ?>
		<th class="<?php echo $store_purchaseorder->Received->headerCellClass() ?>"><span id="elh_store_purchaseorder_Received" class="store_purchaseorder_Received"><?php echo $store_purchaseorder->Received->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->BillDate->Visible) { // BillDate ?>
		<th class="<?php echo $store_purchaseorder->BillDate->headerCellClass() ?>"><span id="elh_store_purchaseorder_BillDate" class="store_purchaseorder_BillDate"><?php echo $store_purchaseorder->BillDate->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->CurStock->Visible) { // CurStock ?>
		<th class="<?php echo $store_purchaseorder->CurStock->headerCellClass() ?>"><span id="elh_store_purchaseorder_CurStock" class="store_purchaseorder_CurStock"><?php echo $store_purchaseorder->CurStock->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<th class="<?php echo $store_purchaseorder->FreeQtyyy->headerCellClass() ?>"><span id="elh_store_purchaseorder_FreeQtyyy" class="store_purchaseorder_FreeQtyyy"><?php echo $store_purchaseorder->FreeQtyyy->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->grndate->Visible) { // grndate ?>
		<th class="<?php echo $store_purchaseorder->grndate->headerCellClass() ?>"><span id="elh_store_purchaseorder_grndate" class="store_purchaseorder_grndate"><?php echo $store_purchaseorder->grndate->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<th class="<?php echo $store_purchaseorder->grndatetime->headerCellClass() ?>"><span id="elh_store_purchaseorder_grndatetime" class="store_purchaseorder_grndatetime"><?php echo $store_purchaseorder->grndatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->strid->Visible) { // strid ?>
		<th class="<?php echo $store_purchaseorder->strid->headerCellClass() ?>"><span id="elh_store_purchaseorder_strid" class="store_purchaseorder_strid"><?php echo $store_purchaseorder->strid->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<th class="<?php echo $store_purchaseorder->GRNPer->headerCellClass() ?>"><span id="elh_store_purchaseorder_GRNPer" class="store_purchaseorder_GRNPer"><?php echo $store_purchaseorder->GRNPer->caption() ?></span></th>
<?php } ?>
<?php if ($store_purchaseorder->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_purchaseorder->StoreID->headerCellClass() ?>"><span id="elh_store_purchaseorder_StoreID" class="store_purchaseorder_StoreID"><?php echo $store_purchaseorder->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_purchaseorder_delete->RecCnt = 0;
$i = 0;
while (!$store_purchaseorder_delete->Recordset->EOF) {
	$store_purchaseorder_delete->RecCnt++;
	$store_purchaseorder_delete->RowCnt++;

	// Set row properties
	$store_purchaseorder->resetAttributes();
	$store_purchaseorder->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_purchaseorder_delete->loadRowValues($store_purchaseorder_delete->Recordset);

	// Render row
	$store_purchaseorder_delete->renderRow();
?>
	<tr<?php echo $store_purchaseorder->rowAttributes() ?>>
<?php if ($store_purchaseorder->ORDNO->Visible) { // ORDNO ?>
		<td<?php echo $store_purchaseorder->ORDNO->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_ORDNO" class="store_purchaseorder_ORDNO">
<span<?php echo $store_purchaseorder->ORDNO->viewAttributes() ?>>
<?php echo $store_purchaseorder->ORDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PRC->Visible) { // PRC ?>
		<td<?php echo $store_purchaseorder->PRC->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PRC" class="store_purchaseorder_PRC">
<span<?php echo $store_purchaseorder->PRC->viewAttributes() ?>>
<?php echo $store_purchaseorder->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->QTY->Visible) { // QTY ?>
		<td<?php echo $store_purchaseorder->QTY->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_QTY" class="store_purchaseorder_QTY">
<span<?php echo $store_purchaseorder->QTY->viewAttributes() ?>>
<?php echo $store_purchaseorder->QTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->DT->Visible) { // DT ?>
		<td<?php echo $store_purchaseorder->DT->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_DT" class="store_purchaseorder_DT">
<span<?php echo $store_purchaseorder->DT->viewAttributes() ?>>
<?php echo $store_purchaseorder->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PC->Visible) { // PC ?>
		<td<?php echo $store_purchaseorder->PC->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PC" class="store_purchaseorder_PC">
<span<?php echo $store_purchaseorder->PC->viewAttributes() ?>>
<?php echo $store_purchaseorder->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->YM->Visible) { // YM ?>
		<td<?php echo $store_purchaseorder->YM->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_YM" class="store_purchaseorder_YM">
<span<?php echo $store_purchaseorder->YM->viewAttributes() ?>>
<?php echo $store_purchaseorder->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->MFRCODE->Visible) { // MFRCODE ?>
		<td<?php echo $store_purchaseorder->MFRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_MFRCODE" class="store_purchaseorder_MFRCODE">
<span<?php echo $store_purchaseorder->MFRCODE->viewAttributes() ?>>
<?php echo $store_purchaseorder->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->Stock->Visible) { // Stock ?>
		<td<?php echo $store_purchaseorder->Stock->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_Stock" class="store_purchaseorder_Stock">
<span<?php echo $store_purchaseorder->Stock->viewAttributes() ?>>
<?php echo $store_purchaseorder->Stock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<td<?php echo $store_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_LastMonthSale" class="store_purchaseorder_LastMonthSale">
<span<?php echo $store_purchaseorder->LastMonthSale->viewAttributes() ?>>
<?php echo $store_purchaseorder->LastMonthSale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->Printcheck->Visible) { // Printcheck ?>
		<td<?php echo $store_purchaseorder->Printcheck->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_Printcheck" class="store_purchaseorder_Printcheck">
<span<?php echo $store_purchaseorder->Printcheck->viewAttributes() ?>>
<?php echo $store_purchaseorder->Printcheck->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->id->Visible) { // id ?>
		<td<?php echo $store_purchaseorder->id->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_id" class="store_purchaseorder_id">
<span<?php echo $store_purchaseorder->id->viewAttributes() ?>>
<?php echo $store_purchaseorder->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->poid->Visible) { // poid ?>
		<td<?php echo $store_purchaseorder->poid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_poid" class="store_purchaseorder_poid">
<span<?php echo $store_purchaseorder->poid->viewAttributes() ?>>
<?php echo $store_purchaseorder->poid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->grnid->Visible) { // grnid ?>
		<td<?php echo $store_purchaseorder->grnid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_grnid" class="store_purchaseorder_grnid">
<span<?php echo $store_purchaseorder->grnid->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->BatchNo->Visible) { // BatchNo ?>
		<td<?php echo $store_purchaseorder->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_BatchNo" class="store_purchaseorder_BatchNo">
<span<?php echo $store_purchaseorder->BatchNo->viewAttributes() ?>>
<?php echo $store_purchaseorder->BatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->ExpDate->Visible) { // ExpDate ?>
		<td<?php echo $store_purchaseorder->ExpDate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_ExpDate" class="store_purchaseorder_ExpDate">
<span<?php echo $store_purchaseorder->ExpDate->viewAttributes() ?>>
<?php echo $store_purchaseorder->ExpDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PrName->Visible) { // PrName ?>
		<td<?php echo $store_purchaseorder->PrName->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PrName" class="store_purchaseorder_PrName">
<span<?php echo $store_purchaseorder->PrName->viewAttributes() ?>>
<?php echo $store_purchaseorder->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->Quantity->Visible) { // Quantity ?>
		<td<?php echo $store_purchaseorder->Quantity->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_Quantity" class="store_purchaseorder_Quantity">
<span<?php echo $store_purchaseorder->Quantity->viewAttributes() ?>>
<?php echo $store_purchaseorder->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->FreeQty->Visible) { // FreeQty ?>
		<td<?php echo $store_purchaseorder->FreeQty->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_FreeQty" class="store_purchaseorder_FreeQty">
<span<?php echo $store_purchaseorder->FreeQty->viewAttributes() ?>>
<?php echo $store_purchaseorder->FreeQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->ItemValue->Visible) { // ItemValue ?>
		<td<?php echo $store_purchaseorder->ItemValue->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_ItemValue" class="store_purchaseorder_ItemValue">
<span<?php echo $store_purchaseorder->ItemValue->viewAttributes() ?>>
<?php echo $store_purchaseorder->ItemValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->Disc->Visible) { // Disc ?>
		<td<?php echo $store_purchaseorder->Disc->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_Disc" class="store_purchaseorder_Disc">
<span<?php echo $store_purchaseorder->Disc->viewAttributes() ?>>
<?php echo $store_purchaseorder->Disc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PTax->Visible) { // PTax ?>
		<td<?php echo $store_purchaseorder->PTax->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PTax" class="store_purchaseorder_PTax">
<span<?php echo $store_purchaseorder->PTax->viewAttributes() ?>>
<?php echo $store_purchaseorder->PTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->MRP->Visible) { // MRP ?>
		<td<?php echo $store_purchaseorder->MRP->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_MRP" class="store_purchaseorder_MRP">
<span<?php echo $store_purchaseorder->MRP->viewAttributes() ?>>
<?php echo $store_purchaseorder->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->SalTax->Visible) { // SalTax ?>
		<td<?php echo $store_purchaseorder->SalTax->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_SalTax" class="store_purchaseorder_SalTax">
<span<?php echo $store_purchaseorder->SalTax->viewAttributes() ?>>
<?php echo $store_purchaseorder->SalTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PurValue->Visible) { // PurValue ?>
		<td<?php echo $store_purchaseorder->PurValue->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PurValue" class="store_purchaseorder_PurValue">
<span<?php echo $store_purchaseorder->PurValue->viewAttributes() ?>>
<?php echo $store_purchaseorder->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PurRate->Visible) { // PurRate ?>
		<td<?php echo $store_purchaseorder->PurRate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PurRate" class="store_purchaseorder_PurRate">
<span<?php echo $store_purchaseorder->PurRate->viewAttributes() ?>>
<?php echo $store_purchaseorder->PurRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->SalRate->Visible) { // SalRate ?>
		<td<?php echo $store_purchaseorder->SalRate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_SalRate" class="store_purchaseorder_SalRate">
<span<?php echo $store_purchaseorder->SalRate->viewAttributes() ?>>
<?php echo $store_purchaseorder->SalRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->Discount->Visible) { // Discount ?>
		<td<?php echo $store_purchaseorder->Discount->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_Discount" class="store_purchaseorder_Discount">
<span<?php echo $store_purchaseorder->Discount->viewAttributes() ?>>
<?php echo $store_purchaseorder->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PSGST->Visible) { // PSGST ?>
		<td<?php echo $store_purchaseorder->PSGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PSGST" class="store_purchaseorder_PSGST">
<span<?php echo $store_purchaseorder->PSGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PCGST->Visible) { // PCGST ?>
		<td<?php echo $store_purchaseorder->PCGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PCGST" class="store_purchaseorder_PCGST">
<span<?php echo $store_purchaseorder->PCGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->SSGST->Visible) { // SSGST ?>
		<td<?php echo $store_purchaseorder->SSGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_SSGST" class="store_purchaseorder_SSGST">
<span<?php echo $store_purchaseorder->SSGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->SCGST->Visible) { // SCGST ?>
		<td<?php echo $store_purchaseorder->SCGST->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_SCGST" class="store_purchaseorder_SCGST">
<span<?php echo $store_purchaseorder->SCGST->viewAttributes() ?>>
<?php echo $store_purchaseorder->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $store_purchaseorder->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_BRCODE" class="store_purchaseorder_BRCODE">
<span<?php echo $store_purchaseorder->BRCODE->viewAttributes() ?>>
<?php echo $store_purchaseorder->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->HSN->Visible) { // HSN ?>
		<td<?php echo $store_purchaseorder->HSN->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_HSN" class="store_purchaseorder_HSN">
<span<?php echo $store_purchaseorder->HSN->viewAttributes() ?>>
<?php echo $store_purchaseorder->HSN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->Pack->Visible) { // Pack ?>
		<td<?php echo $store_purchaseorder->Pack->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_Pack" class="store_purchaseorder_Pack">
<span<?php echo $store_purchaseorder->Pack->viewAttributes() ?>>
<?php echo $store_purchaseorder->Pack->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->PUnit->Visible) { // PUnit ?>
		<td<?php echo $store_purchaseorder->PUnit->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_PUnit" class="store_purchaseorder_PUnit">
<span<?php echo $store_purchaseorder->PUnit->viewAttributes() ?>>
<?php echo $store_purchaseorder->PUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->SUnit->Visible) { // SUnit ?>
		<td<?php echo $store_purchaseorder->SUnit->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_SUnit" class="store_purchaseorder_SUnit">
<span<?php echo $store_purchaseorder->SUnit->viewAttributes() ?>>
<?php echo $store_purchaseorder->SUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->GrnQuantity->Visible) { // GrnQuantity ?>
		<td<?php echo $store_purchaseorder->GrnQuantity->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_GrnQuantity" class="store_purchaseorder_GrnQuantity">
<span<?php echo $store_purchaseorder->GrnQuantity->viewAttributes() ?>>
<?php echo $store_purchaseorder->GrnQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->GrnMRP->Visible) { // GrnMRP ?>
		<td<?php echo $store_purchaseorder->GrnMRP->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_GrnMRP" class="store_purchaseorder_GrnMRP">
<span<?php echo $store_purchaseorder->GrnMRP->viewAttributes() ?>>
<?php echo $store_purchaseorder->GrnMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->trid->Visible) { // trid ?>
		<td<?php echo $store_purchaseorder->trid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_trid" class="store_purchaseorder_trid">
<span<?php echo $store_purchaseorder->trid->viewAttributes() ?>>
<?php echo $store_purchaseorder->trid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->HospID->Visible) { // HospID ?>
		<td<?php echo $store_purchaseorder->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_HospID" class="store_purchaseorder_HospID">
<span<?php echo $store_purchaseorder->HospID->viewAttributes() ?>>
<?php echo $store_purchaseorder->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $store_purchaseorder->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_CreatedBy" class="store_purchaseorder_CreatedBy">
<span<?php echo $store_purchaseorder->CreatedBy->viewAttributes() ?>>
<?php echo $store_purchaseorder->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td<?php echo $store_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_CreatedDateTime" class="store_purchaseorder_CreatedDateTime">
<span<?php echo $store_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $store_purchaseorder->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_ModifiedBy" class="store_purchaseorder_ModifiedBy">
<span<?php echo $store_purchaseorder->ModifiedBy->viewAttributes() ?>>
<?php echo $store_purchaseorder->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td<?php echo $store_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_ModifiedDateTime" class="store_purchaseorder_ModifiedDateTime">
<span<?php echo $store_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedby->Visible) { // grncreatedby ?>
		<td<?php echo $store_purchaseorder->grncreatedby->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_grncreatedby" class="store_purchaseorder_grncreatedby">
<span<?php echo $store_purchaseorder->grncreatedby->viewAttributes() ?>>
<?php echo $store_purchaseorder->grncreatedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
		<td<?php echo $store_purchaseorder->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_grncreatedDateTime" class="store_purchaseorder_grncreatedDateTime">
<span<?php echo $store_purchaseorder->grncreatedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedby->Visible) { // grnModifiedby ?>
		<td<?php echo $store_purchaseorder->grnModifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_grnModifiedby" class="store_purchaseorder_grnModifiedby">
<span<?php echo $store_purchaseorder->grnModifiedby->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnModifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
		<td<?php echo $store_purchaseorder->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_grnModifiedDateTime" class="store_purchaseorder_grnModifiedDateTime">
<span<?php echo $store_purchaseorder->grnModifiedDateTime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->Received->Visible) { // Received ?>
		<td<?php echo $store_purchaseorder->Received->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_Received" class="store_purchaseorder_Received">
<span<?php echo $store_purchaseorder->Received->viewAttributes() ?>>
<?php echo $store_purchaseorder->Received->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->BillDate->Visible) { // BillDate ?>
		<td<?php echo $store_purchaseorder->BillDate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_BillDate" class="store_purchaseorder_BillDate">
<span<?php echo $store_purchaseorder->BillDate->viewAttributes() ?>>
<?php echo $store_purchaseorder->BillDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->CurStock->Visible) { // CurStock ?>
		<td<?php echo $store_purchaseorder->CurStock->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_CurStock" class="store_purchaseorder_CurStock">
<span<?php echo $store_purchaseorder->CurStock->viewAttributes() ?>>
<?php echo $store_purchaseorder->CurStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td<?php echo $store_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_FreeQtyyy" class="store_purchaseorder_FreeQtyyy">
<span<?php echo $store_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<?php echo $store_purchaseorder->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->grndate->Visible) { // grndate ?>
		<td<?php echo $store_purchaseorder->grndate->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_grndate" class="store_purchaseorder_grndate">
<span<?php echo $store_purchaseorder->grndate->viewAttributes() ?>>
<?php echo $store_purchaseorder->grndate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<td<?php echo $store_purchaseorder->grndatetime->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_grndatetime" class="store_purchaseorder_grndatetime">
<span<?php echo $store_purchaseorder->grndatetime->viewAttributes() ?>>
<?php echo $store_purchaseorder->grndatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->strid->Visible) { // strid ?>
		<td<?php echo $store_purchaseorder->strid->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_strid" class="store_purchaseorder_strid">
<span<?php echo $store_purchaseorder->strid->viewAttributes() ?>>
<?php echo $store_purchaseorder->strid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<td<?php echo $store_purchaseorder->GRNPer->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_GRNPer" class="store_purchaseorder_GRNPer">
<span<?php echo $store_purchaseorder->GRNPer->viewAttributes() ?>>
<?php echo $store_purchaseorder->GRNPer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_purchaseorder->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_purchaseorder->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_purchaseorder_delete->RowCnt ?>_store_purchaseorder_StoreID" class="store_purchaseorder_StoreID">
<span<?php echo $store_purchaseorder->StoreID->viewAttributes() ?>>
<?php echo $store_purchaseorder->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_purchaseorder_delete->Recordset->moveNext();
}
$store_purchaseorder_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_purchaseorder_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_purchaseorder_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_purchaseorder_delete->terminate();
?>