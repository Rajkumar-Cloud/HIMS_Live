<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyPurchaseorderDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchaseorderdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_purchaseorderdelete = currentForm = new ew.Form("fpharmacy_purchaseorderdelete", "delete");
    loadjs.done("fpharmacy_purchaseorderdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_purchaseorderdelete" id="fpharmacy_purchaseorderdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <th class="<?= $Page->ORDNO->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ORDNO" class="pharmacy_purchaseorder_ORDNO"><?= $Page->ORDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <th class="<?= $Page->QTY->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><?= $Page->QTY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_DT" class="pharmacy_purchaseorder_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PC" class="pharmacy_purchaseorder_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th class="<?= $Page->YM->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_YM" class="pharmacy_purchaseorder_YM"><?= $Page->YM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_MFRCODE" class="pharmacy_purchaseorder_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <th class="<?= $Page->Stock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><?= $Page->Stock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <th class="<?= $Page->LastMonthSale->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><?= $Page->LastMonthSale->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
        <th class="<?= $Page->Printcheck->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Printcheck" class="pharmacy_purchaseorder_Printcheck"><?= $Page->Printcheck->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_id" class="pharmacy_purchaseorder_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
        <th class="<?= $Page->poid->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_poid" class="pharmacy_purchaseorder_poid"><?= $Page->poid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->grnid->Visible) { // grnid ?>
        <th class="<?= $Page->grnid->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grnid" class="pharmacy_purchaseorder_grnid"><?= $Page->grnid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th class="<?= $Page->BatchNo->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_BatchNo" class="pharmacy_purchaseorder_BatchNo"><?= $Page->BatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <th class="<?= $Page->ExpDate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ExpDate" class="pharmacy_purchaseorder_ExpDate"><?= $Page->ExpDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PrName" class="pharmacy_purchaseorder_PrName"><?= $Page->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th class="<?= $Page->Quantity->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Quantity" class="pharmacy_purchaseorder_Quantity"><?= $Page->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <th class="<?= $Page->FreeQty->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_FreeQty" class="pharmacy_purchaseorder_FreeQty"><?= $Page->FreeQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <th class="<?= $Page->ItemValue->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ItemValue" class="pharmacy_purchaseorder_ItemValue"><?= $Page->ItemValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
        <th class="<?= $Page->Disc->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Disc" class="pharmacy_purchaseorder_Disc"><?= $Page->Disc->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
        <th class="<?= $Page->PTax->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PTax" class="pharmacy_purchaseorder_PTax"><?= $Page->PTax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_MRP" class="pharmacy_purchaseorder_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
        <th class="<?= $Page->SalTax->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_SalTax" class="pharmacy_purchaseorder_SalTax"><?= $Page->SalTax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th class="<?= $Page->PurValue->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PurValue" class="pharmacy_purchaseorder_PurValue"><?= $Page->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th class="<?= $Page->PurRate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PurRate" class="pharmacy_purchaseorder_PurRate"><?= $Page->PurRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <th class="<?= $Page->SalRate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_SalRate" class="pharmacy_purchaseorder_SalRate"><?= $Page->SalRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th class="<?= $Page->Discount->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Discount" class="pharmacy_purchaseorder_Discount"><?= $Page->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PSGST" class="pharmacy_purchaseorder_PSGST"><?= $Page->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PCGST" class="pharmacy_purchaseorder_PCGST"><?= $Page->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_SSGST" class="pharmacy_purchaseorder_SSGST"><?= $Page->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_SCGST" class="pharmacy_purchaseorder_SCGST"><?= $Page->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_BRCODE" class="pharmacy_purchaseorder_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <th class="<?= $Page->HSN->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_HSN" class="pharmacy_purchaseorder_HSN"><?= $Page->HSN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
        <th class="<?= $Page->Pack->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Pack" class="pharmacy_purchaseorder_Pack"><?= $Page->Pack->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th class="<?= $Page->PUnit->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PUnit" class="pharmacy_purchaseorder_PUnit"><?= $Page->PUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <th class="<?= $Page->SUnit->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_SUnit" class="pharmacy_purchaseorder_SUnit"><?= $Page->SUnit->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <th class="<?= $Page->GrnQuantity->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_GrnQuantity" class="pharmacy_purchaseorder_GrnQuantity"><?= $Page->GrnQuantity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
        <th class="<?= $Page->GrnMRP->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_GrnMRP" class="pharmacy_purchaseorder_GrnMRP"><?= $Page->GrnMRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
        <th class="<?= $Page->trid->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_trid" class="pharmacy_purchaseorder_trid"><?= $Page->trid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <th class="<?= $Page->grncreatedby->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grncreatedby" class="pharmacy_purchaseorder_grncreatedby"><?= $Page->grncreatedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <th class="<?= $Page->grncreatedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grncreatedDateTime" class="pharmacy_purchaseorder_grncreatedDateTime"><?= $Page->grncreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <th class="<?= $Page->grnModifiedby->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedby" class="pharmacy_purchaseorder_grnModifiedby"><?= $Page->grnModifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <th class="<?= $Page->grnModifiedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grnModifiedDateTime" class="pharmacy_purchaseorder_grnModifiedDateTime"><?= $Page->grnModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
        <th class="<?= $Page->Received->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Received" class="pharmacy_purchaseorder_Received"><?= $Page->Received->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th class="<?= $Page->BillDate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><?= $Page->BillDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <th class="<?= $Page->CurStock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><?= $Page->CurStock->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <td <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ORDNO" class="pharmacy_purchaseorder_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <td <?= $Page->QTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_DT" class="pharmacy_purchaseorder_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PC" class="pharmacy_purchaseorder_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <td <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_YM" class="pharmacy_purchaseorder_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_MFRCODE" class="pharmacy_purchaseorder_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <td <?= $Page->Stock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <td <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
        <td <?= $Page->Printcheck->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Printcheck" class="pharmacy_purchaseorder_Printcheck">
<span<?= $Page->Printcheck->viewAttributes() ?>>
<?= $Page->Printcheck->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_id" class="pharmacy_purchaseorder_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
        <td <?= $Page->poid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_poid" class="pharmacy_purchaseorder_poid">
<span<?= $Page->poid->viewAttributes() ?>>
<?= $Page->poid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->grnid->Visible) { // grnid ?>
        <td <?= $Page->grnid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grnid" class="pharmacy_purchaseorder_grnid">
<span<?= $Page->grnid->viewAttributes() ?>>
<?= $Page->grnid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_BatchNo" class="pharmacy_purchaseorder_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ExpDate" class="pharmacy_purchaseorder_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <td <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PrName" class="pharmacy_purchaseorder_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Quantity" class="pharmacy_purchaseorder_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_FreeQty" class="pharmacy_purchaseorder_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td <?= $Page->ItemValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ItemValue" class="pharmacy_purchaseorder_ItemValue">
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
        <td <?= $Page->Disc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Disc" class="pharmacy_purchaseorder_Disc">
<span<?= $Page->Disc->viewAttributes() ?>>
<?= $Page->Disc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
        <td <?= $Page->PTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PTax" class="pharmacy_purchaseorder_PTax">
<span<?= $Page->PTax->viewAttributes() ?>>
<?= $Page->PTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_MRP" class="pharmacy_purchaseorder_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
        <td <?= $Page->SalTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_SalTax" class="pharmacy_purchaseorder_SalTax">
<span<?= $Page->SalTax->viewAttributes() ?>>
<?= $Page->SalTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PurValue" class="pharmacy_purchaseorder_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td <?= $Page->PurRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PurRate" class="pharmacy_purchaseorder_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td <?= $Page->SalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_SalRate" class="pharmacy_purchaseorder_SalRate">
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <td <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Discount" class="pharmacy_purchaseorder_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PSGST" class="pharmacy_purchaseorder_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PCGST" class="pharmacy_purchaseorder_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_SSGST" class="pharmacy_purchaseorder_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_SCGST" class="pharmacy_purchaseorder_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_BRCODE" class="pharmacy_purchaseorder_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <td <?= $Page->HSN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_HSN" class="pharmacy_purchaseorder_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
        <td <?= $Page->Pack->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Pack" class="pharmacy_purchaseorder_Pack">
<span<?= $Page->Pack->viewAttributes() ?>>
<?= $Page->Pack->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td <?= $Page->PUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PUnit" class="pharmacy_purchaseorder_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td <?= $Page->SUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_SUnit" class="pharmacy_purchaseorder_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <td <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_GrnQuantity" class="pharmacy_purchaseorder_GrnQuantity">
<span<?= $Page->GrnQuantity->viewAttributes() ?>>
<?= $Page->GrnQuantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
        <td <?= $Page->GrnMRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_GrnMRP" class="pharmacy_purchaseorder_GrnMRP">
<span<?= $Page->GrnMRP->viewAttributes() ?>>
<?= $Page->GrnMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
        <td <?= $Page->trid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_trid" class="pharmacy_purchaseorder_trid">
<span<?= $Page->trid->viewAttributes() ?>>
<?= $Page->trid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <td <?= $Page->grncreatedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grncreatedby" class="pharmacy_purchaseorder_grncreatedby">
<span<?= $Page->grncreatedby->viewAttributes() ?>>
<?= $Page->grncreatedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td <?= $Page->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grncreatedDateTime" class="pharmacy_purchaseorder_grncreatedDateTime">
<span<?= $Page->grncreatedDateTime->viewAttributes() ?>>
<?= $Page->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <td <?= $Page->grnModifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grnModifiedby" class="pharmacy_purchaseorder_grnModifiedby">
<span<?= $Page->grnModifiedby->viewAttributes() ?>>
<?= $Page->grnModifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grnModifiedDateTime" class="pharmacy_purchaseorder_grnModifiedDateTime">
<span<?= $Page->grnModifiedDateTime->viewAttributes() ?>>
<?= $Page->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
        <td <?= $Page->Received->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Received" class="pharmacy_purchaseorder_Received">
<span<?= $Page->Received->viewAttributes() ?>>
<?= $Page->Received->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <td <?= $Page->CurStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
