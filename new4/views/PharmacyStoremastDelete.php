<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStoremastDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_storemastdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_storemastdelete = currentForm = new ew.Form("fpharmacy_storemastdelete", "delete");
    loadjs.done("fpharmacy_storemastdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_storemast) ew.vars.tables.pharmacy_storemast = <?= JsonEncode(GetClientVar("tables", "pharmacy_storemast")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_storemastdelete" id="fpharmacy_storemastdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
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
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <th class="<?= $Page->TYPE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE"><?= $Page->TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <th class="<?= $Page->DES->headerCellClass() ?>"><span id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES"><?= $Page->DES->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <th class="<?= $Page->UM->headerCellClass() ?>"><span id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM"><?= $Page->UM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th class="<?= $Page->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME"><?= $Page->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <th class="<?= $Page->CREATEDDT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT"><?= $Page->CREATEDDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <th class="<?= $Page->DRID->headerCellClass() ?>"><span id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID"><?= $Page->DRID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <th class="<?= $Page->COMBCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE"><?= $Page->COMBCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <th class="<?= $Page->GENCODE->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE"><?= $Page->GENCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <th class="<?= $Page->STRENGTH->headerCellClass() ?>"><span id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH"><?= $Page->STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
        <th class="<?= $Page->UNIT->headerCellClass() ?>"><span id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT"><?= $Page->UNIT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <th class="<?= $Page->FORMULARY->headerCellClass() ?>"><span id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY"><?= $Page->FORMULARY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <th class="<?= $Page->COMBNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME"><?= $Page->COMBNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <th class="<?= $Page->GENERICNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME"><?= $Page->GENERICNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
        <th class="<?= $Page->REMARK->headerCellClass() ?>"><span id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK"><?= $Page->REMARK->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
        <th class="<?= $Page->TEMP->headerCellClass() ?>"><span id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP"><?= $Page->TEMP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th class="<?= $Page->PurValue->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue"><?= $Page->PurValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST"><?= $Page->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST"><?= $Page->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <th class="<?= $Page->SaleValue->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue"><?= $Page->SaleValue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST"><?= $Page->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST"><?= $Page->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <th class="<?= $Page->SaleRate->headerCellClass() ?>"><span id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate"><?= $Page->SaleRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><span id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME"><?= $Page->BRNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Scheduling->Visible) { // Scheduling ?>
        <th class="<?= $Page->Scheduling->headerCellClass() ?>"><span id="elh_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling"><?= $Page->Scheduling->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
        <th class="<?= $Page->Schedulingh1->headerCellClass() ?>"><span id="elh_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1"><?= $Page->Schedulingh1->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td <?= $Page->TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <td <?= $Page->DES->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DES" class="pharmacy_storemast_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <td <?= $Page->UM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UM" class="pharmacy_storemast_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RT" class="pharmacy_storemast_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <td <?= $Page->CREATEDDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT">
<span<?= $Page->CREATEDDT->viewAttributes() ?>>
<?= $Page->CREATEDDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <td <?= $Page->DRID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <td <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE">
<span<?= $Page->COMBCODE->viewAttributes() ?>>
<?= $Page->COMBCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <td <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE">
<span<?= $Page->GENCODE->viewAttributes() ?>>
<?= $Page->GENCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <td <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
        <td <?= $Page->UNIT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT">
<span<?= $Page->UNIT->viewAttributes() ?>>
<?= $Page->UNIT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <td <?= $Page->FORMULARY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY">
<span<?= $Page->FORMULARY->viewAttributes() ?>>
<?= $Page->FORMULARY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <td <?= $Page->COMBNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME">
<span<?= $Page->COMBNAME->viewAttributes() ?>>
<?= $Page->COMBNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <td <?= $Page->GENERICNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME">
<span<?= $Page->GENERICNAME->viewAttributes() ?>>
<?= $Page->GENERICNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
        <td <?= $Page->REMARK->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK">
<span<?= $Page->REMARK->viewAttributes() ?>>
<?= $Page->REMARK->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
        <td <?= $Page->TEMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP">
<span<?= $Page->TEMP->viewAttributes() ?>>
<?= $Page->TEMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_id" class="pharmacy_storemast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <td <?= $Page->SaleValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue">
<span<?= $Page->SaleValue->viewAttributes() ?>>
<?= $Page->SaleValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <td <?= $Page->SaleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate">
<span<?= $Page->SaleRate->viewAttributes() ?>>
<?= $Page->SaleRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Scheduling->Visible) { // Scheduling ?>
        <td <?= $Page->Scheduling->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling">
<span<?= $Page->Scheduling->viewAttributes() ?>>
<?= $Page->Scheduling->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
        <td <?= $Page->Schedulingh1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1">
<span<?= $Page->Schedulingh1->viewAttributes() ?>>
<?= $Page->Schedulingh1->getViewValue() ?></span>
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
