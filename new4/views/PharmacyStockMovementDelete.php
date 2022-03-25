<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStockMovementDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_stock_movementdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_stock_movementdelete = currentForm = new ew.Form("fpharmacy_stock_movementdelete", "delete");
    loadjs.done("fpharmacy_stock_movementdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_stock_movement) ew.vars.tables.pharmacy_stock_movement = <?= JsonEncode(GetClientVar("tables", "pharmacy_stock_movement")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_stock_movementdelete" id="fpharmacy_stock_movementdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_stock_movement">
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
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName"><?= $Page->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <th class="<?= $Page->OpeningStk->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk"><?= $Page->OpeningStk->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <th class="<?= $Page->PurchaseQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty"><?= $Page->PurchaseQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <th class="<?= $Page->SalesQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty"><?= $Page->SalesQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <th class="<?= $Page->ClosingStk->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk"><?= $Page->ClosingStk->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <th class="<?= $Page->PurchasefreeQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty"><?= $Page->PurchasefreeQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <th class="<?= $Page->TransferingQty->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty"><?= $Page->TransferingQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <th class="<?= $Page->UnitPurchaseRate->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate"><?= $Page->UnitPurchaseRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <th class="<?= $Page->UnitSaleRate->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate"><?= $Page->UnitSaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <th class="<?= $Page->CreatedDate->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate"><?= $Page->CreatedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th class="<?= $Page->OQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ"><?= $Page->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th class="<?= $Page->RQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ"><?= $Page->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ"><?= $Page->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ"><?= $Page->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR"><?= $Page->UR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th class="<?= $Page->PRCODE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE"><?= $Page->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <th class="<?= $Page->BATCH->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH"><?= $Page->BATCH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <th class="<?= $Page->OLDRT->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT"><?= $Page->OLDRT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <th class="<?= $Page->TEMPMRQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ"><?= $Page->TEMPMRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th class="<?= $Page->TAXP->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP"><?= $Page->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <th class="<?= $Page->OLDRATE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE"><?= $Page->OLDRATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <th class="<?= $Page->NEWRATE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE"><?= $Page->NEWRATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <th class="<?= $Page->OTEMPMRA->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA"><?= $Page->OTEMPMRA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <th class="<?= $Page->ACTIVESTATUS->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS"><?= $Page->ACTIVESTATUS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST"><?= $Page->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST"><?= $Page->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST"><?= $Page->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST"><?= $Page->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FRQ->Visible) { // FRQ ?>
        <th class="<?= $Page->FRQ->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ"><?= $Page->FRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <th class="<?= $Page->UM->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM"><?= $Page->UM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th class="<?= $Page->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME"><?= $Page->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <th class="<?= $Page->BILLDATE->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE"><?= $Page->BILLDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->baid->Visible) { // baid ?>
        <th class="<?= $Page->baid->headerCellClass() ?>"><span id="elh_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid"><?= $Page->baid->caption() ?></span></th>
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
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_id" class="pharmacy_stock_movement_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PRC" class="pharmacy_stock_movement_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <td <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PrName" class="pharmacy_stock_movement_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BATCHNO" class="pharmacy_stock_movement_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <td <?= $Page->OpeningStk->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OpeningStk" class="pharmacy_stock_movement_OpeningStk">
<span<?= $Page->OpeningStk->viewAttributes() ?>>
<?= $Page->OpeningStk->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <td <?= $Page->PurchaseQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PurchaseQty" class="pharmacy_stock_movement_PurchaseQty">
<span<?= $Page->PurchaseQty->viewAttributes() ?>>
<?= $Page->PurchaseQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <td <?= $Page->SalesQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_SalesQty" class="pharmacy_stock_movement_SalesQty">
<span<?= $Page->SalesQty->viewAttributes() ?>>
<?= $Page->SalesQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <td <?= $Page->ClosingStk->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_ClosingStk" class="pharmacy_stock_movement_ClosingStk">
<span<?= $Page->ClosingStk->viewAttributes() ?>>
<?= $Page->ClosingStk->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <td <?= $Page->PurchasefreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PurchasefreeQty" class="pharmacy_stock_movement_PurchasefreeQty">
<span<?= $Page->PurchasefreeQty->viewAttributes() ?>>
<?= $Page->PurchasefreeQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <td <?= $Page->TransferingQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_TransferingQty" class="pharmacy_stock_movement_TransferingQty">
<span<?= $Page->TransferingQty->viewAttributes() ?>>
<?= $Page->TransferingQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <td <?= $Page->UnitPurchaseRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UnitPurchaseRate" class="pharmacy_stock_movement_UnitPurchaseRate">
<span<?= $Page->UnitPurchaseRate->viewAttributes() ?>>
<?= $Page->UnitPurchaseRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <td <?= $Page->UnitSaleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UnitSaleRate" class="pharmacy_stock_movement_UnitSaleRate">
<span<?= $Page->UnitSaleRate->viewAttributes() ?>>
<?= $Page->UnitSaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td <?= $Page->CreatedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_CreatedDate" class="pharmacy_stock_movement_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <td <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OQ" class="pharmacy_stock_movement_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <td <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_RQ" class="pharmacy_stock_movement_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_MRQ" class="pharmacy_stock_movement_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <td <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_IQ" class="pharmacy_stock_movement_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_MRP" class="pharmacy_stock_movement_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_EXPDT" class="pharmacy_stock_movement_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <td <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UR" class="pharmacy_stock_movement_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_RT" class="pharmacy_stock_movement_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PRCODE" class="pharmacy_stock_movement_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td <?= $Page->BATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BATCH" class="pharmacy_stock_movement_BATCH">
<span<?= $Page->BATCH->viewAttributes() ?>>
<?= $Page->BATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PC" class="pharmacy_stock_movement_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <td <?= $Page->OLDRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OLDRT" class="pharmacy_stock_movement_OLDRT">
<span<?= $Page->OLDRT->viewAttributes() ?>>
<?= $Page->OLDRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <td <?= $Page->TEMPMRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_TEMPMRQ" class="pharmacy_stock_movement_TEMPMRQ">
<span<?= $Page->TEMPMRQ->viewAttributes() ?>>
<?= $Page->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_TAXP" class="pharmacy_stock_movement_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <td <?= $Page->OLDRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OLDRATE" class="pharmacy_stock_movement_OLDRATE">
<span<?= $Page->OLDRATE->viewAttributes() ?>>
<?= $Page->OLDRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <td <?= $Page->NEWRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_NEWRATE" class="pharmacy_stock_movement_NEWRATE">
<span<?= $Page->NEWRATE->viewAttributes() ?>>
<?= $Page->NEWRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <td <?= $Page->OTEMPMRA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_OTEMPMRA" class="pharmacy_stock_movement_OTEMPMRA">
<span<?= $Page->OTEMPMRA->viewAttributes() ?>>
<?= $Page->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <td <?= $Page->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_ACTIVESTATUS" class="pharmacy_stock_movement_ACTIVESTATUS">
<span<?= $Page->ACTIVESTATUS->viewAttributes() ?>>
<?= $Page->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PSGST" class="pharmacy_stock_movement_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_PCGST" class="pharmacy_stock_movement_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_SSGST" class="pharmacy_stock_movement_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_SCGST" class="pharmacy_stock_movement_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_MFRCODE" class="pharmacy_stock_movement_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BRCODE" class="pharmacy_stock_movement_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FRQ->Visible) { // FRQ ?>
        <td <?= $Page->FRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_FRQ" class="pharmacy_stock_movement_FRQ">
<span<?= $Page->FRQ->viewAttributes() ?>>
<?= $Page->FRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_HospID" class="pharmacy_stock_movement_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <td <?= $Page->UM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_UM" class="pharmacy_stock_movement_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_GENNAME" class="pharmacy_stock_movement_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td <?= $Page->BILLDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_BILLDATE" class="pharmacy_stock_movement_BILLDATE">
<span<?= $Page->BILLDATE->viewAttributes() ?>>
<?= $Page->BILLDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_CreatedDateTime" class="pharmacy_stock_movement_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->baid->Visible) { // baid ?>
        <td <?= $Page->baid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_stock_movement_baid" class="pharmacy_stock_movement_baid">
<span<?= $Page->baid->viewAttributes() ?>>
<?= $Page->baid->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
