<?php

namespace PHPMaker2021\project3;

// Page object
$StoreStoremastDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_storemastdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fstore_storemastdelete = currentForm = new ew.Form("fstore_storemastdelete", "delete");
    loadjs.done("fstore_storemastdelete");
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
<form name="fstore_storemastdelete" id="fstore_storemastdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_storemast">
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
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_store_storemast_BRCODE" class="store_storemast_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_store_storemast_PRC" class="store_storemast_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <th class="<?= $Page->TYPE->headerCellClass() ?>"><span id="elh_store_storemast_TYPE" class="store_storemast_TYPE"><?= $Page->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <th class="<?= $Page->DES->headerCellClass() ?>"><span id="elh_store_storemast_DES" class="store_storemast_DES"><?= $Page->DES->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <th class="<?= $Page->UM->headerCellClass() ?>"><span id="elh_store_storemast_UM" class="store_storemast_UM"><?= $Page->UM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_store_storemast_RT" class="store_storemast_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><span id="elh_store_storemast_UR" class="store_storemast_UR"><?= $Page->UR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th class="<?= $Page->TAXP->headerCellClass() ?>"><span id="elh_store_storemast_TAXP" class="store_storemast_TAXP"><?= $Page->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_store_storemast_BATCHNO" class="store_storemast_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th class="<?= $Page->OQ->headerCellClass() ?>"><span id="elh_store_storemast_OQ" class="store_storemast_OQ"><?= $Page->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th class="<?= $Page->RQ->headerCellClass() ?>"><span id="elh_store_storemast_RQ" class="store_storemast_RQ"><?= $Page->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><span id="elh_store_storemast_MRQ" class="store_storemast_MRQ"><?= $Page->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><span id="elh_store_storemast_IQ" class="store_storemast_IQ"><?= $Page->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_store_storemast_MRP" class="store_storemast_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_store_storemast_EXPDT" class="store_storemast_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SALQTY->Visible) { // SALQTY ?>
        <th class="<?= $Page->SALQTY->headerCellClass() ?>"><span id="elh_store_storemast_SALQTY" class="store_storemast_SALQTY"><?= $Page->SALQTY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
        <th class="<?= $Page->LASTPURDT->headerCellClass() ?>"><span id="elh_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT"><?= $Page->LASTPURDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
        <th class="<?= $Page->LASTSUPP->headerCellClass() ?>"><span id="elh_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP"><?= $Page->LASTSUPP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th class="<?= $Page->GENNAME->headerCellClass() ?>"><span id="elh_store_storemast_GENNAME" class="store_storemast_GENNAME"><?= $Page->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
        <th class="<?= $Page->LASTISSDT->headerCellClass() ?>"><span id="elh_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT"><?= $Page->LASTISSDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <th class="<?= $Page->CREATEDDT->headerCellClass() ?>"><span id="elh_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT"><?= $Page->CREATEDDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPPRC->Visible) { // OPPRC ?>
        <th class="<?= $Page->OPPRC->headerCellClass() ?>"><span id="elh_store_storemast_OPPRC" class="store_storemast_OPPRC"><?= $Page->OPPRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RESTRICT->Visible) { // RESTRICT ?>
        <th class="<?= $Page->RESTRICT->headerCellClass() ?>"><span id="elh_store_storemast_RESTRICT" class="store_storemast_RESTRICT"><?= $Page->RESTRICT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BAWAPRC->Visible) { // BAWAPRC ?>
        <th class="<?= $Page->BAWAPRC->headerCellClass() ?>"><span id="elh_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC"><?= $Page->BAWAPRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STAXPER->Visible) { // STAXPER ?>
        <th class="<?= $Page->STAXPER->headerCellClass() ?>"><span id="elh_store_storemast_STAXPER" class="store_storemast_STAXPER"><?= $Page->STAXPER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXTYPE->Visible) { // TAXTYPE ?>
        <th class="<?= $Page->TAXTYPE->headerCellClass() ?>"><span id="elh_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE"><?= $Page->TAXTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OLDTAXP->Visible) { // OLDTAXP ?>
        <th class="<?= $Page->OLDTAXP->headerCellClass() ?>"><span id="elh_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP"><?= $Page->OLDTAXP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXUPD->Visible) { // TAXUPD ?>
        <th class="<?= $Page->TAXUPD->headerCellClass() ?>"><span id="elh_store_storemast_TAXUPD" class="store_storemast_TAXUPD"><?= $Page->TAXUPD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PACKAGE->Visible) { // PACKAGE ?>
        <th class="<?= $Page->PACKAGE->headerCellClass() ?>"><span id="elh_store_storemast_PACKAGE" class="store_storemast_PACKAGE"><?= $Page->PACKAGE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NEWRT->Visible) { // NEWRT ?>
        <th class="<?= $Page->NEWRT->headerCellClass() ?>"><span id="elh_store_storemast_NEWRT" class="store_storemast_NEWRT"><?= $Page->NEWRT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NEWMRP->Visible) { // NEWMRP ?>
        <th class="<?= $Page->NEWMRP->headerCellClass() ?>"><span id="elh_store_storemast_NEWMRP" class="store_storemast_NEWMRP"><?= $Page->NEWMRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NEWUR->Visible) { // NEWUR ?>
        <th class="<?= $Page->NEWUR->headerCellClass() ?>"><span id="elh_store_storemast_NEWUR" class="store_storemast_NEWUR"><?= $Page->NEWUR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STATUS->Visible) { // STATUS ?>
        <th class="<?= $Page->STATUS->headerCellClass() ?>"><span id="elh_store_storemast_STATUS" class="store_storemast_STATUS"><?= $Page->STATUS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RETNQTY->Visible) { // RETNQTY ?>
        <th class="<?= $Page->RETNQTY->headerCellClass() ?>"><span id="elh_store_storemast_RETNQTY" class="store_storemast_RETNQTY"><?= $Page->RETNQTY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->KEMODISC->Visible) { // KEMODISC ?>
        <th class="<?= $Page->KEMODISC->headerCellClass() ?>"><span id="elh_store_storemast_KEMODISC" class="store_storemast_KEMODISC"><?= $Page->KEMODISC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PATSALE->Visible) { // PATSALE ?>
        <th class="<?= $Page->PATSALE->headerCellClass() ?>"><span id="elh_store_storemast_PATSALE" class="store_storemast_PATSALE"><?= $Page->PATSALE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ORGAN->Visible) { // ORGAN ?>
        <th class="<?= $Page->ORGAN->headerCellClass() ?>"><span id="elh_store_storemast_ORGAN" class="store_storemast_ORGAN"><?= $Page->ORGAN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OLDRQ->Visible) { // OLDRQ ?>
        <th class="<?= $Page->OLDRQ->headerCellClass() ?>"><span id="elh_store_storemast_OLDRQ" class="store_storemast_OLDRQ"><?= $Page->OLDRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <th class="<?= $Page->DRID->headerCellClass() ?>"><span id="elh_store_storemast_DRID" class="store_storemast_DRID"><?= $Page->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><span id="elh_store_storemast_MFRCODE" class="store_storemast_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <th class="<?= $Page->COMBCODE->headerCellClass() ?>"><span id="elh_store_storemast_COMBCODE" class="store_storemast_COMBCODE"><?= $Page->COMBCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <th class="<?= $Page->GENCODE->headerCellClass() ?>"><span id="elh_store_storemast_GENCODE" class="store_storemast_GENCODE"><?= $Page->GENCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <th class="<?= $Page->STRENGTH->headerCellClass() ?>"><span id="elh_store_storemast_STRENGTH" class="store_storemast_STRENGTH"><?= $Page->STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
        <th class="<?= $Page->UNIT->headerCellClass() ?>"><span id="elh_store_storemast_UNIT" class="store_storemast_UNIT"><?= $Page->UNIT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <th class="<?= $Page->FORMULARY->headerCellClass() ?>"><span id="elh_store_storemast_FORMULARY" class="store_storemast_FORMULARY"><?= $Page->FORMULARY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STOCK->Visible) { // STOCK ?>
        <th class="<?= $Page->STOCK->headerCellClass() ?>"><span id="elh_store_storemast_STOCK" class="store_storemast_STOCK"><?= $Page->STOCK->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RACKNO->Visible) { // RACKNO ?>
        <th class="<?= $Page->RACKNO->headerCellClass() ?>"><span id="elh_store_storemast_RACKNO" class="store_storemast_RACKNO"><?= $Page->RACKNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
        <th class="<?= $Page->SUPPNAME->headerCellClass() ?>"><span id="elh_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME"><?= $Page->SUPPNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <th class="<?= $Page->COMBNAME->headerCellClass() ?>"><span id="elh_store_storemast_COMBNAME" class="store_storemast_COMBNAME"><?= $Page->COMBNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <th class="<?= $Page->GENERICNAME->headerCellClass() ?>"><span id="elh_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME"><?= $Page->GENERICNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
        <th class="<?= $Page->REMARK->headerCellClass() ?>"><span id="elh_store_storemast_REMARK" class="store_storemast_REMARK"><?= $Page->REMARK->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
        <th class="<?= $Page->TEMP->headerCellClass() ?>"><span id="elh_store_storemast_TEMP" class="store_storemast_TEMP"><?= $Page->TEMP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PACKING->Visible) { // PACKING ?>
        <th class="<?= $Page->PACKING->headerCellClass() ?>"><span id="elh_store_storemast_PACKING" class="store_storemast_PACKING"><?= $Page->PACKING->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PhysQty->Visible) { // PhysQty ?>
        <th class="<?= $Page->PhysQty->headerCellClass() ?>"><span id="elh_store_storemast_PhysQty" class="store_storemast_PhysQty"><?= $Page->PhysQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LedQty->Visible) { // LedQty ?>
        <th class="<?= $Page->LedQty->headerCellClass() ?>"><span id="elh_store_storemast_LedQty" class="store_storemast_LedQty"><?= $Page->LedQty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_store_storemast_id" class="store_storemast_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th class="<?= $Page->PurValue->headerCellClass() ?>"><span id="elh_store_storemast_PurValue" class="store_storemast_PurValue"><?= $Page->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><span id="elh_store_storemast_PSGST" class="store_storemast_PSGST"><?= $Page->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><span id="elh_store_storemast_PCGST" class="store_storemast_PCGST"><?= $Page->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <th class="<?= $Page->SaleValue->headerCellClass() ?>"><span id="elh_store_storemast_SaleValue" class="store_storemast_SaleValue"><?= $Page->SaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><span id="elh_store_storemast_SSGST" class="store_storemast_SSGST"><?= $Page->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><span id="elh_store_storemast_SCGST" class="store_storemast_SCGST"><?= $Page->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <th class="<?= $Page->SaleRate->headerCellClass() ?>"><span id="elh_store_storemast_SaleRate" class="store_storemast_SaleRate"><?= $Page->SaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_store_storemast_HospID" class="store_storemast_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><span id="elh_store_storemast_BRNAME" class="store_storemast_BRNAME"><?= $Page->BRNAME->caption() ?></span></th>
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
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_BRCODE" class="store_storemast_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PRC" class="store_storemast_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td <?= $Page->TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_TYPE" class="store_storemast_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <td <?= $Page->DES->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_DES" class="store_storemast_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <td <?= $Page->UM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_UM" class="store_storemast_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_RT" class="store_storemast_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <td <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_UR" class="store_storemast_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_TAXP" class="store_storemast_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_BATCHNO" class="store_storemast_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <td <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_OQ" class="store_storemast_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <td <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_RQ" class="store_storemast_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_MRQ" class="store_storemast_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <td <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_IQ" class="store_storemast_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_MRP" class="store_storemast_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_EXPDT" class="store_storemast_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SALQTY->Visible) { // SALQTY ?>
        <td <?= $Page->SALQTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_SALQTY" class="store_storemast_SALQTY">
<span<?= $Page->SALQTY->viewAttributes() ?>>
<?= $Page->SALQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
        <td <?= $Page->LASTPURDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_LASTPURDT" class="store_storemast_LASTPURDT">
<span<?= $Page->LASTPURDT->viewAttributes() ?>>
<?= $Page->LASTPURDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
        <td <?= $Page->LASTSUPP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_LASTSUPP" class="store_storemast_LASTSUPP">
<span<?= $Page->LASTSUPP->viewAttributes() ?>>
<?= $Page->LASTSUPP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_GENNAME" class="store_storemast_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
        <td <?= $Page->LASTISSDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_LASTISSDT" class="store_storemast_LASTISSDT">
<span<?= $Page->LASTISSDT->viewAttributes() ?>>
<?= $Page->LASTISSDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <td <?= $Page->CREATEDDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_CREATEDDT" class="store_storemast_CREATEDDT">
<span<?= $Page->CREATEDDT->viewAttributes() ?>>
<?= $Page->CREATEDDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPPRC->Visible) { // OPPRC ?>
        <td <?= $Page->OPPRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_OPPRC" class="store_storemast_OPPRC">
<span<?= $Page->OPPRC->viewAttributes() ?>>
<?= $Page->OPPRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RESTRICT->Visible) { // RESTRICT ?>
        <td <?= $Page->RESTRICT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_RESTRICT" class="store_storemast_RESTRICT">
<span<?= $Page->RESTRICT->viewAttributes() ?>>
<?= $Page->RESTRICT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BAWAPRC->Visible) { // BAWAPRC ?>
        <td <?= $Page->BAWAPRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_BAWAPRC" class="store_storemast_BAWAPRC">
<span<?= $Page->BAWAPRC->viewAttributes() ?>>
<?= $Page->BAWAPRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STAXPER->Visible) { // STAXPER ?>
        <td <?= $Page->STAXPER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_STAXPER" class="store_storemast_STAXPER">
<span<?= $Page->STAXPER->viewAttributes() ?>>
<?= $Page->STAXPER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXTYPE->Visible) { // TAXTYPE ?>
        <td <?= $Page->TAXTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_TAXTYPE" class="store_storemast_TAXTYPE">
<span<?= $Page->TAXTYPE->viewAttributes() ?>>
<?= $Page->TAXTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OLDTAXP->Visible) { // OLDTAXP ?>
        <td <?= $Page->OLDTAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_OLDTAXP" class="store_storemast_OLDTAXP">
<span<?= $Page->OLDTAXP->viewAttributes() ?>>
<?= $Page->OLDTAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXUPD->Visible) { // TAXUPD ?>
        <td <?= $Page->TAXUPD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_TAXUPD" class="store_storemast_TAXUPD">
<span<?= $Page->TAXUPD->viewAttributes() ?>>
<?= $Page->TAXUPD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PACKAGE->Visible) { // PACKAGE ?>
        <td <?= $Page->PACKAGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PACKAGE" class="store_storemast_PACKAGE">
<span<?= $Page->PACKAGE->viewAttributes() ?>>
<?= $Page->PACKAGE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NEWRT->Visible) { // NEWRT ?>
        <td <?= $Page->NEWRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_NEWRT" class="store_storemast_NEWRT">
<span<?= $Page->NEWRT->viewAttributes() ?>>
<?= $Page->NEWRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NEWMRP->Visible) { // NEWMRP ?>
        <td <?= $Page->NEWMRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_NEWMRP" class="store_storemast_NEWMRP">
<span<?= $Page->NEWMRP->viewAttributes() ?>>
<?= $Page->NEWMRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NEWUR->Visible) { // NEWUR ?>
        <td <?= $Page->NEWUR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_NEWUR" class="store_storemast_NEWUR">
<span<?= $Page->NEWUR->viewAttributes() ?>>
<?= $Page->NEWUR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STATUS->Visible) { // STATUS ?>
        <td <?= $Page->STATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_STATUS" class="store_storemast_STATUS">
<span<?= $Page->STATUS->viewAttributes() ?>>
<?= $Page->STATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RETNQTY->Visible) { // RETNQTY ?>
        <td <?= $Page->RETNQTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_RETNQTY" class="store_storemast_RETNQTY">
<span<?= $Page->RETNQTY->viewAttributes() ?>>
<?= $Page->RETNQTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->KEMODISC->Visible) { // KEMODISC ?>
        <td <?= $Page->KEMODISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_KEMODISC" class="store_storemast_KEMODISC">
<span<?= $Page->KEMODISC->viewAttributes() ?>>
<?= $Page->KEMODISC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PATSALE->Visible) { // PATSALE ?>
        <td <?= $Page->PATSALE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PATSALE" class="store_storemast_PATSALE">
<span<?= $Page->PATSALE->viewAttributes() ?>>
<?= $Page->PATSALE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ORGAN->Visible) { // ORGAN ?>
        <td <?= $Page->ORGAN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_ORGAN" class="store_storemast_ORGAN">
<span<?= $Page->ORGAN->viewAttributes() ?>>
<?= $Page->ORGAN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OLDRQ->Visible) { // OLDRQ ?>
        <td <?= $Page->OLDRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_OLDRQ" class="store_storemast_OLDRQ">
<span<?= $Page->OLDRQ->viewAttributes() ?>>
<?= $Page->OLDRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <td <?= $Page->DRID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_DRID" class="store_storemast_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_MFRCODE" class="store_storemast_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <td <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_COMBCODE" class="store_storemast_COMBCODE">
<span<?= $Page->COMBCODE->viewAttributes() ?>>
<?= $Page->COMBCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <td <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_GENCODE" class="store_storemast_GENCODE">
<span<?= $Page->GENCODE->viewAttributes() ?>>
<?= $Page->GENCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <td <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_STRENGTH" class="store_storemast_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
        <td <?= $Page->UNIT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_UNIT" class="store_storemast_UNIT">
<span<?= $Page->UNIT->viewAttributes() ?>>
<?= $Page->UNIT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <td <?= $Page->FORMULARY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_FORMULARY" class="store_storemast_FORMULARY">
<span<?= $Page->FORMULARY->viewAttributes() ?>>
<?= $Page->FORMULARY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STOCK->Visible) { // STOCK ?>
        <td <?= $Page->STOCK->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_STOCK" class="store_storemast_STOCK">
<span<?= $Page->STOCK->viewAttributes() ?>>
<?= $Page->STOCK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RACKNO->Visible) { // RACKNO ?>
        <td <?= $Page->RACKNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_RACKNO" class="store_storemast_RACKNO">
<span<?= $Page->RACKNO->viewAttributes() ?>>
<?= $Page->RACKNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
        <td <?= $Page->SUPPNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_SUPPNAME" class="store_storemast_SUPPNAME">
<span<?= $Page->SUPPNAME->viewAttributes() ?>>
<?= $Page->SUPPNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <td <?= $Page->COMBNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_COMBNAME" class="store_storemast_COMBNAME">
<span<?= $Page->COMBNAME->viewAttributes() ?>>
<?= $Page->COMBNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <td <?= $Page->GENERICNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_GENERICNAME" class="store_storemast_GENERICNAME">
<span<?= $Page->GENERICNAME->viewAttributes() ?>>
<?= $Page->GENERICNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
        <td <?= $Page->REMARK->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_REMARK" class="store_storemast_REMARK">
<span<?= $Page->REMARK->viewAttributes() ?>>
<?= $Page->REMARK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
        <td <?= $Page->TEMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_TEMP" class="store_storemast_TEMP">
<span<?= $Page->TEMP->viewAttributes() ?>>
<?= $Page->TEMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PACKING->Visible) { // PACKING ?>
        <td <?= $Page->PACKING->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PACKING" class="store_storemast_PACKING">
<span<?= $Page->PACKING->viewAttributes() ?>>
<?= $Page->PACKING->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PhysQty->Visible) { // PhysQty ?>
        <td <?= $Page->PhysQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PhysQty" class="store_storemast_PhysQty">
<span<?= $Page->PhysQty->viewAttributes() ?>>
<?= $Page->PhysQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LedQty->Visible) { // LedQty ?>
        <td <?= $Page->LedQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_LedQty" class="store_storemast_LedQty">
<span<?= $Page->LedQty->viewAttributes() ?>>
<?= $Page->LedQty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_id" class="store_storemast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PurValue" class="store_storemast_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PSGST" class="store_storemast_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_PCGST" class="store_storemast_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <td <?= $Page->SaleValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_SaleValue" class="store_storemast_SaleValue">
<span<?= $Page->SaleValue->viewAttributes() ?>>
<?= $Page->SaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_SSGST" class="store_storemast_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_SCGST" class="store_storemast_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <td <?= $Page->SaleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_SaleRate" class="store_storemast_SaleRate">
<span<?= $Page->SaleRate->viewAttributes() ?>>
<?= $Page->SaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_HospID" class="store_storemast_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_storemast_BRNAME" class="store_storemast_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
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
