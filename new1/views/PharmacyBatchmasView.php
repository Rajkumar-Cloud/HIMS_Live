<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyBatchmasView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_batchmasview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_batchmasview = currentForm = new ew.Form("fpharmacy_batchmasview", "view");
    loadjs.done("fpharmacy_batchmasview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_batchmasview" id="fpharmacy_batchmasview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->PRC->Visible) { // PRC ?>
    <tr id="r_PRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRC"><?= $Page->PRC->caption() ?></span></td>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <tr id="r_BATCHNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></td>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <tr id="r_OQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OQ"><?= $Page->OQ->caption() ?></span></td>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <tr id="r_RQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RQ"><?= $Page->RQ->caption() ?></span></td>
        <td data-name="RQ" <?= $Page->RQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <tr id="r_MRQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRQ"><?= $Page->MRQ->caption() ?></span></td>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <tr id="r_IQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_IQ"><?= $Page->IQ->caption() ?></span></td>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <tr id="r_MRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRP"><?= $Page->MRP->caption() ?></span></td>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <tr id="r_EXPDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_EXPDT"><?= $Page->EXPDT->caption() ?></span></td>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <tr id="r_UR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UR"><?= $Page->UR->caption() ?></span></td>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <tr id="r_RT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RT"><?= $Page->RT->caption() ?></span></td>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
    <tr id="r_PRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRCODE"><?= $Page->PRCODE->caption() ?></span></td>
        <td data-name="PRCODE" <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
    <tr id="r_BATCH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCH"><?= $Page->BATCH->caption() ?></span></td>
        <td data-name="BATCH" <?= $Page->BATCH->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BATCH">
<span<?= $Page->BATCH->viewAttributes() ?>>
<?= $Page->BATCH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PC"><?= $Page->PC->caption() ?></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
    <tr id="r_OLDRT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRT"><?= $Page->OLDRT->caption() ?></span></td>
        <td data-name="OLDRT" <?= $Page->OLDRT->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRT">
<span<?= $Page->OLDRT->viewAttributes() ?>>
<?= $Page->OLDRT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
    <tr id="r_TEMPMRQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TEMPMRQ"><?= $Page->TEMPMRQ->caption() ?></span></td>
        <td data-name="TEMPMRQ" <?= $Page->TEMPMRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TEMPMRQ">
<span<?= $Page->TEMPMRQ->viewAttributes() ?>>
<?= $Page->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <tr id="r_TAXP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TAXP"><?= $Page->TAXP->caption() ?></span></td>
        <td data-name="TAXP" <?= $Page->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
    <tr id="r_OLDRATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRATE"><?= $Page->OLDRATE->caption() ?></span></td>
        <td data-name="OLDRATE" <?= $Page->OLDRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OLDRATE">
<span<?= $Page->OLDRATE->viewAttributes() ?>>
<?= $Page->OLDRATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
    <tr id="r_NEWRATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_NEWRATE"><?= $Page->NEWRATE->caption() ?></span></td>
        <td data-name="NEWRATE" <?= $Page->NEWRATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_NEWRATE">
<span<?= $Page->NEWRATE->viewAttributes() ?>>
<?= $Page->NEWRATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
    <tr id="r_OTEMPMRA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OTEMPMRA"><?= $Page->OTEMPMRA->caption() ?></span></td>
        <td data-name="OTEMPMRA" <?= $Page->OTEMPMRA->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_OTEMPMRA">
<span<?= $Page->OTEMPMRA->viewAttributes() ?>>
<?= $Page->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
    <tr id="r_ACTIVESTATUS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_ACTIVESTATUS"><?= $Page->ACTIVESTATUS->caption() ?></span></td>
        <td data-name="ACTIVESTATUS" <?= $Page->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_ACTIVESTATUS">
<span<?= $Page->ACTIVESTATUS->viewAttributes() ?>>
<?= $Page->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <tr id="r_PrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PrName"><?= $Page->PrName->caption() ?></span></td>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <tr id="r_PSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PSGST"><?= $Page->PSGST->caption() ?></span></td>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <tr id="r_PCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PCGST"><?= $Page->PCGST->caption() ?></span></td>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <tr id="r_SSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SSGST"><?= $Page->SSGST->caption() ?></span></td>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <tr id="r_SCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SCGST"><?= $Page->SCGST->caption() ?></span></td>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <tr id="r_MFRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></td>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FRQ->Visible) { // FRQ ?>
    <tr id="r_FRQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_FRQ"><?= $Page->FRQ->caption() ?></span></td>
        <td data-name="FRQ" <?= $Page->FRQ->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_FRQ">
<span<?= $Page->FRQ->viewAttributes() ?>>
<?= $Page->FRQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
    <tr id="r_UM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UM"><?= $Page->UM->caption() ?></span></td>
        <td data-name="UM" <?= $Page->UM->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <tr id="r_GENNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_GENNAME"><?= $Page->GENNAME->caption() ?></span></td>
        <td data-name="GENNAME" <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
    <tr id="r_BILLDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BILLDATE"><?= $Page->BILLDATE->caption() ?></span></td>
        <td data-name="BILLDATE" <?= $Page->BILLDATE->cellAttributes() ?>>
<span id="el_pharmacy_batchmas_BILLDATE">
<span<?= $Page->BILLDATE->viewAttributes() ?>>
<?= $Page->BILLDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
