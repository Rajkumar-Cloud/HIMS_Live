<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPharledView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_pharledview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_pharledview = currentForm = new ew.Form("fpharmacy_pharledview", "view");
    loadjs.done("fpharmacy_pharledview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_pharled) ew.vars.tables.pharmacy_pharled = <?= JsonEncode(GetClientVar("tables", "pharmacy_pharled")) ?>;
</script>
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
<form name="fpharmacy_pharledview" id="fpharmacy_pharledview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_pharled">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->SiNo->Visible) { // SiNo ?>
    <tr id="r_SiNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SiNo"><?= $Page->SiNo->caption() ?></span></td>
        <td data-name="SiNo" <?= $Page->SiNo->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
    <tr id="r_SLNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SLNO"><?= $Page->SLNO->caption() ?></span></td>
        <td data-name="SLNO" <?= $Page->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
    <tr id="r_Product">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Product"><?= $Page->Product->caption() ?></span></td>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <tr id="r_RT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RT"><?= $Page->RT->caption() ?></span></td>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <tr id="r_IQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IQ"><?= $Page->IQ->caption() ?></span></td>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
    <tr id="r_DAMT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DAMT"><?= $Page->DAMT->caption() ?></span></td>
        <td data-name="DAMT" <?= $Page->DAMT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
    <tr id="r_Mfg">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Mfg"><?= $Page->Mfg->caption() ?></span></td>
        <td data-name="Mfg" <?= $Page->Mfg->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <tr id="r_EXPDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_EXPDT"><?= $Page->EXPDT->caption() ?></span></td>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <tr id="r_BATCHNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></td>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
    <tr id="r_TYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TYPE"><?= $Page->TYPE->caption() ?></span></td>
        <td data-name="TYPE" <?= $Page->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DN->Visible) { // DN ?>
    <tr id="r_DN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DN"><?= $Page->DN->caption() ?></span></td>
        <td data-name="DN" <?= $Page->DN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DN">
<span<?= $Page->DN->viewAttributes() ?>>
<?= $Page->DN->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RDN->Visible) { // RDN ?>
    <tr id="r_RDN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RDN"><?= $Page->RDN->caption() ?></span></td>
        <td data-name="RDN" <?= $Page->RDN->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RDN">
<span<?= $Page->RDN->viewAttributes() ?>>
<?= $Page->RDN->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <tr id="r_DT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DT"><?= $Page->DT->caption() ?></span></td>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <tr id="r_PRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRC"><?= $Page->PRC->caption() ?></span></td>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <tr id="r_OQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OQ"><?= $Page->OQ->caption() ?></span></td>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <tr id="r_RQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RQ"><?= $Page->RQ->caption() ?></span></td>
        <td data-name="RQ" <?= $Page->RQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <tr id="r_MRQ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MRQ"><?= $Page->MRQ->caption() ?></span></td>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <tr id="r_BILLNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLNO"><?= $Page->BILLNO->caption() ?></span></td>
        <td data-name="BILLNO" <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <tr id="r_BILLDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLDT"><?= $Page->BILLDT->caption() ?></span></td>
        <td data-name="BILLDT" <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VALUE->Visible) { // VALUE ?>
    <tr id="r_VALUE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_VALUE"><?= $Page->VALUE->caption() ?></span></td>
        <td data-name="VALUE" <?= $Page->VALUE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_VALUE">
<span<?= $Page->VALUE->viewAttributes() ?>>
<?= $Page->VALUE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DISC->Visible) { // DISC ?>
    <tr id="r_DISC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DISC"><?= $Page->DISC->caption() ?></span></td>
        <td data-name="DISC" <?= $Page->DISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISC">
<span<?= $Page->DISC->viewAttributes() ?>>
<?= $Page->DISC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <tr id="r_TAXP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAXP"><?= $Page->TAXP->caption() ?></span></td>
        <td data-name="TAXP" <?= $Page->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TAX->Visible) { // TAX ?>
    <tr id="r_TAX">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAX"><?= $Page->TAX->caption() ?></span></td>
        <td data-name="TAX" <?= $Page->TAX->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAX">
<span<?= $Page->TAX->viewAttributes() ?>>
<?= $Page->TAX->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TAXR->Visible) { // TAXR ?>
    <tr id="r_TAXR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TAXR"><?= $Page->TAXR->caption() ?></span></td>
        <td data-name="TAXR" <?= $Page->TAXR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TAXR">
<span<?= $Page->TAXR->viewAttributes() ?>>
<?= $Page->TAXR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EMPNO->Visible) { // EMPNO ?>
    <tr id="r_EMPNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_EMPNO"><?= $Page->EMPNO->caption() ?></span></td>
        <td data-name="EMPNO" <?= $Page->EMPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_EMPNO">
<span<?= $Page->EMPNO->viewAttributes() ?>>
<?= $Page->EMPNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <tr id="r_PC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PC"><?= $Page->PC->caption() ?></span></td>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DRNAME->Visible) { // DRNAME ?>
    <tr id="r_DRNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DRNAME"><?= $Page->DRNAME->caption() ?></span></td>
        <td data-name="DRNAME" <?= $Page->DRNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRNAME">
<span<?= $Page->DRNAME->viewAttributes() ?>>
<?= $Page->DRNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BTIME->Visible) { // BTIME ?>
    <tr id="r_BTIME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BTIME"><?= $Page->BTIME->caption() ?></span></td>
        <td data-name="BTIME" <?= $Page->BTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BTIME">
<span<?= $Page->BTIME->viewAttributes() ?>>
<?= $Page->BTIME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ONO->Visible) { // ONO ?>
    <tr id="r_ONO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_ONO"><?= $Page->ONO->caption() ?></span></td>
        <td data-name="ONO" <?= $Page->ONO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ONO">
<span<?= $Page->ONO->viewAttributes() ?>>
<?= $Page->ONO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ODT->Visible) { // ODT ?>
    <tr id="r_ODT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_ODT"><?= $Page->ODT->caption() ?></span></td>
        <td data-name="ODT" <?= $Page->ODT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_ODT">
<span<?= $Page->ODT->viewAttributes() ?>>
<?= $Page->ODT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PURRT->Visible) { // PURRT ?>
    <tr id="r_PURRT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURRT"><?= $Page->PURRT->caption() ?></span></td>
        <td data-name="PURRT" <?= $Page->PURRT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURRT">
<span<?= $Page->PURRT->viewAttributes() ?>>
<?= $Page->PURRT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GRP->Visible) { // GRP ?>
    <tr id="r_GRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_GRP"><?= $Page->GRP->caption() ?></span></td>
        <td data-name="GRP" <?= $Page->GRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_GRP">
<span<?= $Page->GRP->viewAttributes() ?>>
<?= $Page->GRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IBATCH->Visible) { // IBATCH ?>
    <tr id="r_IBATCH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IBATCH"><?= $Page->IBATCH->caption() ?></span></td>
        <td data-name="IBATCH" <?= $Page->IBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IBATCH">
<span<?= $Page->IBATCH->viewAttributes() ?>>
<?= $Page->IBATCH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
    <tr id="r_IPNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_IPNO"><?= $Page->IPNO->caption() ?></span></td>
        <td data-name="IPNO" <?= $Page->IPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_IPNO">
<span<?= $Page->IPNO->viewAttributes() ?>>
<?= $Page->IPNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
    <tr id="r_OPNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OPNO"><?= $Page->OPNO->caption() ?></span></td>
        <td data-name="OPNO" <?= $Page->OPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OPNO">
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RECID->Visible) { // RECID ?>
    <tr id="r_RECID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RECID"><?= $Page->RECID->caption() ?></span></td>
        <td data-name="RECID" <?= $Page->RECID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RECID">
<span<?= $Page->RECID->viewAttributes() ?>>
<?= $Page->RECID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FQTY->Visible) { // FQTY ?>
    <tr id="r_FQTY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_FQTY"><?= $Page->FQTY->caption() ?></span></td>
        <td data-name="FQTY" <?= $Page->FQTY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FQTY">
<span<?= $Page->FQTY->viewAttributes() ?>>
<?= $Page->FQTY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <tr id="r_UR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_UR"><?= $Page->UR->caption() ?></span></td>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DCID->Visible) { // DCID ?>
    <tr id="r_DCID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DCID"><?= $Page->DCID->caption() ?></span></td>
        <td data-name="DCID" <?= $Page->DCID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DCID">
<span<?= $Page->DCID->viewAttributes() ?>>
<?= $Page->DCID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
    <tr id="r__USERID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled__USERID"><?= $Page->_USERID->caption() ?></span></td>
        <td data-name="_USERID" <?= $Page->_USERID->cellAttributes() ?>>
<span id="el_pharmacy_pharled__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MODDT->Visible) { // MODDT ?>
    <tr id="r_MODDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MODDT"><?= $Page->MODDT->caption() ?></span></td>
        <td data-name="MODDT" <?= $Page->MODDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MODDT">
<span<?= $Page->MODDT->viewAttributes() ?>>
<?= $Page->MODDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FYM->Visible) { // FYM ?>
    <tr id="r_FYM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_FYM"><?= $Page->FYM->caption() ?></span></td>
        <td data-name="FYM" <?= $Page->FYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_FYM">
<span<?= $Page->FYM->viewAttributes() ?>>
<?= $Page->FYM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
    <tr id="r_PRCBATCH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRCBATCH"><?= $Page->PRCBATCH->caption() ?></span></td>
        <td data-name="PRCBATCH" <?= $Page->PRCBATCH->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCBATCH">
<span<?= $Page->PRCBATCH->viewAttributes() ?>>
<?= $Page->PRCBATCH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <tr id="r_MRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MRP"><?= $Page->MRP->caption() ?></span></td>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BILLYM->Visible) { // BILLYM ?>
    <tr id="r_BILLYM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLYM"><?= $Page->BILLYM->caption() ?></span></td>
        <td data-name="BILLYM" <?= $Page->BILLYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLYM">
<span<?= $Page->BILLYM->viewAttributes() ?>>
<?= $Page->BILLYM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
    <tr id="r_BILLGRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BILLGRP"><?= $Page->BILLGRP->caption() ?></span></td>
        <td data-name="BILLGRP" <?= $Page->BILLGRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BILLGRP">
<span<?= $Page->BILLGRP->viewAttributes() ?>>
<?= $Page->BILLGRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->STAFF->Visible) { // STAFF ?>
    <tr id="r_STAFF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_STAFF"><?= $Page->STAFF->caption() ?></span></td>
        <td data-name="STAFF" <?= $Page->STAFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAFF">
<span<?= $Page->STAFF->viewAttributes() ?>>
<?= $Page->STAFF->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
    <tr id="r_TEMPIPNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_TEMPIPNO"><?= $Page->TEMPIPNO->caption() ?></span></td>
        <td data-name="TEMPIPNO" <?= $Page->TEMPIPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_TEMPIPNO">
<span<?= $Page->TEMPIPNO->viewAttributes() ?>>
<?= $Page->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRNTED->Visible) { // PRNTED ?>
    <tr id="r_PRNTED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRNTED"><?= $Page->PRNTED->caption() ?></span></td>
        <td data-name="PRNTED" <?= $Page->PRNTED->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRNTED">
<span<?= $Page->PRNTED->viewAttributes() ?>>
<?= $Page->PRNTED->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PATNAME->Visible) { // PATNAME ?>
    <tr id="r_PATNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PATNAME"><?= $Page->PATNAME->caption() ?></span></td>
        <td data-name="PATNAME" <?= $Page->PATNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PATNAME">
<span<?= $Page->PATNAME->viewAttributes() ?>>
<?= $Page->PATNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PJVNO->Visible) { // PJVNO ?>
    <tr id="r_PJVNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVNO"><?= $Page->PJVNO->caption() ?></span></td>
        <td data-name="PJVNO" <?= $Page->PJVNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVNO">
<span<?= $Page->PJVNO->viewAttributes() ?>>
<?= $Page->PJVNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
    <tr id="r_PJVSLNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVSLNO"><?= $Page->PJVSLNO->caption() ?></span></td>
        <td data-name="PJVSLNO" <?= $Page->PJVSLNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVSLNO">
<span<?= $Page->PJVSLNO->viewAttributes() ?>>
<?= $Page->PJVSLNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
    <tr id="r_OTHDISC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_OTHDISC"><?= $Page->OTHDISC->caption() ?></span></td>
        <td data-name="OTHDISC" <?= $Page->OTHDISC->cellAttributes() ?>>
<span id="el_pharmacy_pharled_OTHDISC">
<span<?= $Page->OTHDISC->viewAttributes() ?>>
<?= $Page->OTHDISC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PJVYM->Visible) { // PJVYM ?>
    <tr id="r_PJVYM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PJVYM"><?= $Page->PJVYM->caption() ?></span></td>
        <td data-name="PJVYM" <?= $Page->PJVYM->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PJVYM">
<span<?= $Page->PJVYM->viewAttributes() ?>>
<?= $Page->PJVYM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
    <tr id="r_PURDISCPER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURDISCPER"><?= $Page->PURDISCPER->caption() ?></span></td>
        <td data-name="PURDISCPER" <?= $Page->PURDISCPER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCPER">
<span<?= $Page->PURDISCPER->viewAttributes() ?>>
<?= $Page->PURDISCPER->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CASHIER->Visible) { // CASHIER ?>
    <tr id="r_CASHIER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHIER"><?= $Page->CASHIER->caption() ?></span></td>
        <td data-name="CASHIER" <?= $Page->CASHIER->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIER">
<span<?= $Page->CASHIER->viewAttributes() ?>>
<?= $Page->CASHIER->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
    <tr id="r_CASHTIME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHTIME"><?= $Page->CASHTIME->caption() ?></span></td>
        <td data-name="CASHTIME" <?= $Page->CASHTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHTIME">
<span<?= $Page->CASHTIME->viewAttributes() ?>>
<?= $Page->CASHTIME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
    <tr id="r_CASHRECD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHRECD"><?= $Page->CASHRECD->caption() ?></span></td>
        <td data-name="CASHRECD" <?= $Page->CASHRECD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHRECD">
<span<?= $Page->CASHRECD->viewAttributes() ?>>
<?= $Page->CASHRECD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
    <tr id="r_CASHREFNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHREFNO"><?= $Page->CASHREFNO->caption() ?></span></td>
        <td data-name="CASHREFNO" <?= $Page->CASHREFNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHREFNO">
<span<?= $Page->CASHREFNO->viewAttributes() ?>>
<?= $Page->CASHREFNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
    <tr id="r_CASHIERSHIFT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CASHIERSHIFT"><?= $Page->CASHIERSHIFT->caption() ?></span></td>
        <td data-name="CASHIERSHIFT" <?= $Page->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CASHIERSHIFT">
<span<?= $Page->CASHIERSHIFT->viewAttributes() ?>>
<?= $Page->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
    <tr id="r_PRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PRCODE"><?= $Page->PRCODE->caption() ?></span></td>
        <td data-name="PRCODE" <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
    <tr id="r_RELEASEBY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RELEASEBY"><?= $Page->RELEASEBY->caption() ?></span></td>
        <td data-name="RELEASEBY" <?= $Page->RELEASEBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RELEASEBY">
<span<?= $Page->RELEASEBY->viewAttributes() ?>>
<?= $Page->RELEASEBY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
    <tr id="r_CRAUTHOR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_CRAUTHOR"><?= $Page->CRAUTHOR->caption() ?></span></td>
        <td data-name="CRAUTHOR" <?= $Page->CRAUTHOR->cellAttributes() ?>>
<span id="el_pharmacy_pharled_CRAUTHOR">
<span<?= $Page->CRAUTHOR->viewAttributes() ?>>
<?= $Page->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
    <tr id="r_PAYMENT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PAYMENT"><?= $Page->PAYMENT->caption() ?></span></td>
        <td data-name="PAYMENT" <?= $Page->PAYMENT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PAYMENT">
<span<?= $Page->PAYMENT->viewAttributes() ?>>
<?= $Page->PAYMENT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
    <tr id="r_DRID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DRID"><?= $Page->DRID->caption() ?></span></td>
        <td data-name="DRID" <?= $Page->DRID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WARD->Visible) { // WARD ?>
    <tr id="r_WARD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_WARD"><?= $Page->WARD->caption() ?></span></td>
        <td data-name="WARD" <?= $Page->WARD->cellAttributes() ?>>
<span id="el_pharmacy_pharled_WARD">
<span<?= $Page->WARD->viewAttributes() ?>>
<?= $Page->WARD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
    <tr id="r_STAXTYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_STAXTYPE"><?= $Page->STAXTYPE->caption() ?></span></td>
        <td data-name="STAXTYPE" <?= $Page->STAXTYPE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_STAXTYPE">
<span<?= $Page->STAXTYPE->viewAttributes() ?>>
<?= $Page->STAXTYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
    <tr id="r_PURDISCVAL">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PURDISCVAL"><?= $Page->PURDISCVAL->caption() ?></span></td>
        <td data-name="PURDISCVAL" <?= $Page->PURDISCVAL->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PURDISCVAL">
<span<?= $Page->PURDISCVAL->viewAttributes() ?>>
<?= $Page->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
    <tr id="r_RNDOFF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_RNDOFF"><?= $Page->RNDOFF->caption() ?></span></td>
        <td data-name="RNDOFF" <?= $Page->RNDOFF->cellAttributes() ?>>
<span id="el_pharmacy_pharled_RNDOFF">
<span<?= $Page->RNDOFF->viewAttributes() ?>>
<?= $Page->RNDOFF->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
    <tr id="r_DISCONMRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DISCONMRP"><?= $Page->DISCONMRP->caption() ?></span></td>
        <td data-name="DISCONMRP" <?= $Page->DISCONMRP->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DISCONMRP">
<span<?= $Page->DISCONMRP->viewAttributes() ?>>
<?= $Page->DISCONMRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DELVDT->Visible) { // DELVDT ?>
    <tr id="r_DELVDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVDT"><?= $Page->DELVDT->caption() ?></span></td>
        <td data-name="DELVDT" <?= $Page->DELVDT->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVDT">
<span<?= $Page->DELVDT->viewAttributes() ?>>
<?= $Page->DELVDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
    <tr id="r_DELVTIME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVTIME"><?= $Page->DELVTIME->caption() ?></span></td>
        <td data-name="DELVTIME" <?= $Page->DELVTIME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVTIME">
<span<?= $Page->DELVTIME->viewAttributes() ?>>
<?= $Page->DELVTIME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DELVBY->Visible) { // DELVBY ?>
    <tr id="r_DELVBY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_DELVBY"><?= $Page->DELVBY->caption() ?></span></td>
        <td data-name="DELVBY" <?= $Page->DELVBY->cellAttributes() ?>>
<span id="el_pharmacy_pharled_DELVBY">
<span<?= $Page->DELVBY->viewAttributes() ?>>
<?= $Page->DELVBY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
    <tr id="r_HOSPNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HOSPNO"><?= $Page->HOSPNO->caption() ?></span></td>
        <td data-name="HOSPNO" <?= $Page->HOSPNO->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HOSPNO">
<span<?= $Page->HOSPNO->viewAttributes() ?>>
<?= $Page->HOSPNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_pharled_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pbv->Visible) { // pbv ?>
    <tr id="r_pbv">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_pbv"><?= $Page->pbv->caption() ?></span></td>
        <td data-name="pbv" <?= $Page->pbv->cellAttributes() ?>>
<span id="el_pharmacy_pharled_pbv">
<span<?= $Page->pbv->viewAttributes() ?>>
<?= $Page->pbv->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pbt->Visible) { // pbt ?>
    <tr id="r_pbt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_pbt"><?= $Page->pbt->caption() ?></span></td>
        <td data-name="pbt" <?= $Page->pbt->cellAttributes() ?>>
<span id="el_pharmacy_pharled_pbt">
<span<?= $Page->pbt->viewAttributes() ?>>
<?= $Page->pbt->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
    <tr id="r_HosoID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HosoID"><?= $Page->HosoID->caption() ?></span></td>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_pharmacy_pharled_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_pharled_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_pharled_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_pharled_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <tr id="r_MFRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></td>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_pharmacy_pharled_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_pharled_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
    <tr id="r_BRNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_BRNAME"><?= $Page->BRNAME->caption() ?></span></td>
        <td data-name="BRNAME" <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el_pharmacy_pharled_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sretid->Visible) { // sretid ?>
    <tr id="r_sretid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_sretid"><?= $Page->sretid->caption() ?></span></td>
        <td data-name="sretid" <?= $Page->sretid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_sretid">
<span<?= $Page->sretid->viewAttributes() ?>>
<?= $Page->sretid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sprid->Visible) { // sprid ?>
    <tr id="r_sprid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_sprid"><?= $Page->sprid->caption() ?></span></td>
        <td data-name="sprid" <?= $Page->sprid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_sprid">
<span<?= $Page->sprid->viewAttributes() ?>>
<?= $Page->sprid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->baid->Visible) { // baid ?>
    <tr id="r_baid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_baid"><?= $Page->baid->caption() ?></span></td>
        <td data-name="baid" <?= $Page->baid->cellAttributes() ?>>
<span id="el_pharmacy_pharled_baid">
<span<?= $Page->baid->viewAttributes() ?>>
<?= $Page->baid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->isdate->Visible) { // isdate ?>
    <tr id="r_isdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_isdate"><?= $Page->isdate->caption() ?></span></td>
        <td data-name="isdate" <?= $Page->isdate->cellAttributes() ?>>
<span id="el_pharmacy_pharled_isdate">
<span<?= $Page->isdate->viewAttributes() ?>>
<?= $Page->isdate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <tr id="r_PSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PSGST"><?= $Page->PSGST->caption() ?></span></td>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <tr id="r_PCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PCGST"><?= $Page->PCGST->caption() ?></span></td>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <tr id="r_SSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SSGST"><?= $Page->SSGST->caption() ?></span></td>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <tr id="r_SCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SCGST"><?= $Page->SCGST->caption() ?></span></td>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <tr id="r_PurValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PurValue"><?= $Page->PurValue->caption() ?></span></td>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <tr id="r_PurRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PurRate"><?= $Page->PurRate->caption() ?></span></td>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <tr id="r_PUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_PUnit"><?= $Page->PUnit->caption() ?></span></td>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_pharled_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <tr id="r_SUnit">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_SUnit"><?= $Page->SUnit->caption() ?></span></td>
        <td data-name="SUnit" <?= $Page->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_pharled_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
    <tr id="r_HSNCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_pharled_HSNCODE"><?= $Page->HSNCODE->caption() ?></span></td>
        <td data-name="HSNCODE" <?= $Page->HSNCODE->cellAttributes() ?>>
<span id="el_pharmacy_pharled_HSNCODE">
<span<?= $Page->HSNCODE->viewAttributes() ?>>
<?= $Page->HSNCODE->getViewValue() ?></span>
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
