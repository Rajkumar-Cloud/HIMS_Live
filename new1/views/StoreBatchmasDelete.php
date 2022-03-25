<?php

namespace PHPMaker2021\project3;

// Page object
$StoreBatchmasDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_batchmasdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fstore_batchmasdelete = currentForm = new ew.Form("fstore_batchmasdelete", "delete");
    loadjs.done("fstore_batchmasdelete");
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
<form name="fstore_batchmasdelete" id="fstore_batchmasdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_store_batchmas_PRC" class="store_batchmas_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><span id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th class="<?= $Page->OQ->headerCellClass() ?>"><span id="elh_store_batchmas_OQ" class="store_batchmas_OQ"><?= $Page->OQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th class="<?= $Page->RQ->headerCellClass() ?>"><span id="elh_store_batchmas_RQ" class="store_batchmas_RQ"><?= $Page->RQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><span id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ"><?= $Page->MRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><span id="elh_store_batchmas_IQ" class="store_batchmas_IQ"><?= $Page->IQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><span id="elh_store_batchmas_MRP" class="store_batchmas_MRP"><?= $Page->MRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><span id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT"><?= $Page->EXPDT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><span id="elh_store_batchmas_UR" class="store_batchmas_UR"><?= $Page->UR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><span id="elh_store_batchmas_RT" class="store_batchmas_RT"><?= $Page->RT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th class="<?= $Page->PRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE"><?= $Page->PRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <th class="<?= $Page->BATCH->headerCellClass() ?>"><span id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH"><?= $Page->BATCH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th class="<?= $Page->PC->headerCellClass() ?>"><span id="elh_store_batchmas_PC" class="store_batchmas_PC"><?= $Page->PC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <th class="<?= $Page->OLDRT->headerCellClass() ?>"><span id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT"><?= $Page->OLDRT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <th class="<?= $Page->TEMPMRQ->headerCellClass() ?>"><span id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ"><?= $Page->TEMPMRQ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th class="<?= $Page->TAXP->headerCellClass() ?>"><span id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP"><?= $Page->TAXP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <th class="<?= $Page->OLDRATE->headerCellClass() ?>"><span id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE"><?= $Page->OLDRATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <th class="<?= $Page->NEWRATE->headerCellClass() ?>"><span id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE"><?= $Page->NEWRATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <th class="<?= $Page->OTEMPMRA->headerCellClass() ?>"><span id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA"><?= $Page->OTEMPMRA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <th class="<?= $Page->ACTIVESTATUS->headerCellClass() ?>"><span id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS"><?= $Page->ACTIVESTATUS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_store_batchmas_id" class="store_batchmas_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><span id="elh_store_batchmas_PrName" class="store_batchmas_PrName"><?= $Page->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><span id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST"><?= $Page->PSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><span id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST"><?= $Page->PCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><span id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST"><?= $Page->SSGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><span id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST"><?= $Page->SCGST->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PRC" class="store_batchmas_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <td <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OQ" class="store_batchmas_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <td <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_RQ" class="store_batchmas_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_MRQ" class="store_batchmas_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <td <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_IQ" class="store_batchmas_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <td <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_MRP" class="store_batchmas_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_EXPDT" class="store_batchmas_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <td <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_UR" class="store_batchmas_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <td <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_RT" class="store_batchmas_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PRCODE" class="store_batchmas_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td <?= $Page->BATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_BATCH" class="store_batchmas_BATCH">
<span<?= $Page->BATCH->viewAttributes() ?>>
<?= $Page->BATCH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <td <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PC" class="store_batchmas_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <td <?= $Page->OLDRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OLDRT" class="store_batchmas_OLDRT">
<span<?= $Page->OLDRT->viewAttributes() ?>>
<?= $Page->OLDRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <td <?= $Page->TEMPMRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ">
<span<?= $Page->TEMPMRQ->viewAttributes() ?>>
<?= $Page->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_TAXP" class="store_batchmas_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <td <?= $Page->OLDRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE">
<span<?= $Page->OLDRATE->viewAttributes() ?>>
<?= $Page->OLDRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <td <?= $Page->NEWRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE">
<span<?= $Page->NEWRATE->viewAttributes() ?>>
<?= $Page->NEWRATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <td <?= $Page->OTEMPMRA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA">
<span<?= $Page->OTEMPMRA->viewAttributes() ?>>
<?= $Page->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <td <?= $Page->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS">
<span<?= $Page->ACTIVESTATUS->viewAttributes() ?>>
<?= $Page->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_id" class="store_batchmas_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <td <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PrName" class="store_batchmas_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PSGST" class="store_batchmas_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PCGST" class="store_batchmas_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_SSGST" class="store_batchmas_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_SCGST" class="store_batchmas_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_BRCODE" class="store_batchmas_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
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
