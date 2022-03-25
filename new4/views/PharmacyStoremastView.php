<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStoremastView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_storemastview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_storemastview = currentForm = new ew.Form("fpharmacy_storemastview", "view");
    loadjs.done("fpharmacy_storemastview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_storemast) ew.vars.tables.pharmacy_storemast = <?= JsonEncode(GetClientVar("tables", "pharmacy_storemast")) ?>;
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
<form name="fpharmacy_storemastview" id="fpharmacy_storemastview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <tr id="r_PRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PRC"><?= $Page->PRC->caption() ?></span></td>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
    <tr id="r_TYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_TYPE"><?= $Page->TYPE->caption() ?></span></td>
        <td data-name="TYPE" <?= $Page->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
    <tr id="r_DES">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_DES"><?= $Page->DES->caption() ?></span></td>
        <td data-name="DES" <?= $Page->DES->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
    <tr id="r_UM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_UM"><?= $Page->UM->caption() ?></span></td>
        <td data-name="UM" <?= $Page->UM->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <tr id="r_RT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_RT"><?= $Page->RT->caption() ?></span></td>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <tr id="r_BATCHNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BATCHNO"><?= $Page->BATCHNO->caption() ?></span></td>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <tr id="r_MRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRP"><?= $Page->MRP->caption() ?></span></td>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <tr id="r_EXPDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_EXPDT"><?= $Page->EXPDT->caption() ?></span></td>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
    <tr id="r_LASTPURDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTPURDT"><?= $Page->LASTPURDT->caption() ?></span></td>
        <td data-name="LASTPURDT" <?= $Page->LASTPURDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTPURDT">
<span<?= $Page->LASTPURDT->viewAttributes() ?>>
<?= $Page->LASTPURDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
    <tr id="r_LASTSUPP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTSUPP"><?= $Page->LASTSUPP->caption() ?></span></td>
        <td data-name="LASTSUPP" <?= $Page->LASTSUPP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTSUPP">
<span<?= $Page->LASTSUPP->viewAttributes() ?>>
<?= $Page->LASTSUPP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <tr id="r_GENNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENNAME"><?= $Page->GENNAME->caption() ?></span></td>
        <td data-name="GENNAME" <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
    <tr id="r_LASTISSDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTISSDT"><?= $Page->LASTISSDT->caption() ?></span></td>
        <td data-name="LASTISSDT" <?= $Page->LASTISSDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTISSDT">
<span<?= $Page->LASTISSDT->viewAttributes() ?>>
<?= $Page->LASTISSDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
    <tr id="r_CREATEDDT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_CREATEDDT"><?= $Page->CREATEDDT->caption() ?></span></td>
        <td data-name="CREATEDDT" <?= $Page->CREATEDDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_CREATEDDT">
<span<?= $Page->CREATEDDT->viewAttributes() ?>>
<?= $Page->CREATEDDT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
    <tr id="r_DRID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_DRID"><?= $Page->DRID->caption() ?></span></td>
        <td data-name="DRID" <?= $Page->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <tr id="r_MFRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MFRCODE"><?= $Page->MFRCODE->caption() ?></span></td>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
    <tr id="r_COMBCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBCODE"><?= $Page->COMBCODE->caption() ?></span></td>
        <td data-name="COMBCODE" <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<span<?= $Page->COMBCODE->viewAttributes() ?>>
<?= $Page->COMBCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
    <tr id="r_GENCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENCODE"><?= $Page->GENCODE->caption() ?></span></td>
        <td data-name="GENCODE" <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<span<?= $Page->GENCODE->viewAttributes() ?>>
<?= $Page->GENCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <tr id="r_STRENGTH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_STRENGTH"><?= $Page->STRENGTH->caption() ?></span></td>
        <td data-name="STRENGTH" <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
    <tr id="r_UNIT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_UNIT"><?= $Page->UNIT->caption() ?></span></td>
        <td data-name="UNIT" <?= $Page->UNIT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UNIT">
<span<?= $Page->UNIT->viewAttributes() ?>>
<?= $Page->UNIT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
    <tr id="r_FORMULARY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_FORMULARY"><?= $Page->FORMULARY->caption() ?></span></td>
        <td data-name="FORMULARY" <?= $Page->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
<span<?= $Page->FORMULARY->viewAttributes() ?>>
<?= $Page->FORMULARY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RACKNO->Visible) { // RACKNO ?>
    <tr id="r_RACKNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_RACKNO"><?= $Page->RACKNO->caption() ?></span></td>
        <td data-name="RACKNO" <?= $Page->RACKNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RACKNO">
<span<?= $Page->RACKNO->viewAttributes() ?>>
<?= $Page->RACKNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
    <tr id="r_SUPPNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SUPPNAME"><?= $Page->SUPPNAME->caption() ?></span></td>
        <td data-name="SUPPNAME" <?= $Page->SUPPNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SUPPNAME">
<span<?= $Page->SUPPNAME->viewAttributes() ?>>
<?= $Page->SUPPNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
    <tr id="r_COMBNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBNAME"><?= $Page->COMBNAME->caption() ?></span></td>
        <td data-name="COMBNAME" <?= $Page->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<span<?= $Page->COMBNAME->viewAttributes() ?>>
<?= $Page->COMBNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
    <tr id="r_GENERICNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENERICNAME"><?= $Page->GENERICNAME->caption() ?></span></td>
        <td data-name="GENERICNAME" <?= $Page->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<span<?= $Page->GENERICNAME->viewAttributes() ?>>
<?= $Page->GENERICNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
    <tr id="r_REMARK">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_REMARK"><?= $Page->REMARK->caption() ?></span></td>
        <td data-name="REMARK" <?= $Page->REMARK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_REMARK">
<span<?= $Page->REMARK->viewAttributes() ?>>
<?= $Page->REMARK->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
    <tr id="r_TEMP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_TEMP"><?= $Page->TEMP->caption() ?></span></td>
        <td data-name="TEMP" <?= $Page->TEMP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TEMP">
<span<?= $Page->TEMP->viewAttributes() ?>>
<?= $Page->TEMP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_storemast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <tr id="r_PurValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PurValue"><?= $Page->PurValue->caption() ?></span></td>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <tr id="r_PSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PSGST"><?= $Page->PSGST->caption() ?></span></td>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <tr id="r_PCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_PCGST"><?= $Page->PCGST->caption() ?></span></td>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
    <tr id="r_SaleValue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleValue"><?= $Page->SaleValue->caption() ?></span></td>
        <td data-name="SaleValue" <?= $Page->SaleValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleValue">
<span<?= $Page->SaleValue->viewAttributes() ?>>
<?= $Page->SaleValue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <tr id="r_SSGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SSGST"><?= $Page->SSGST->caption() ?></span></td>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <tr id="r_SCGST">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SCGST"><?= $Page->SCGST->caption() ?></span></td>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
    <tr id="r_SaleRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleRate"><?= $Page->SaleRate->caption() ?></span></td>
        <td data-name="SaleRate" <?= $Page->SaleRate->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleRate">
<span<?= $Page->SaleRate->viewAttributes() ?>>
<?= $Page->SaleRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
    <tr id="r_BRNAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRNAME"><?= $Page->BRNAME->caption() ?></span></td>
        <td data-name="BRNAME" <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OV->Visible) { // OV ?>
    <tr id="r_OV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_OV"><?= $Page->OV->caption() ?></span></td>
        <td data-name="OV" <?= $Page->OV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OV">
<span<?= $Page->OV->viewAttributes() ?>>
<?= $Page->OV->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LATESTOV->Visible) { // LATESTOV ?>
    <tr id="r_LATESTOV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_LATESTOV"><?= $Page->LATESTOV->caption() ?></span></td>
        <td data-name="LATESTOV" <?= $Page->LATESTOV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LATESTOV">
<span<?= $Page->LATESTOV->viewAttributes() ?>>
<?= $Page->LATESTOV->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ITEMTYPE->Visible) { // ITEMTYPE ?>
    <tr id="r_ITEMTYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_ITEMTYPE"><?= $Page->ITEMTYPE->caption() ?></span></td>
        <td data-name="ITEMTYPE" <?= $Page->ITEMTYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ITEMTYPE">
<span<?= $Page->ITEMTYPE->viewAttributes() ?>>
<?= $Page->ITEMTYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ROWID->Visible) { // ROWID ?>
    <tr id="r_ROWID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_ROWID"><?= $Page->ROWID->caption() ?></span></td>
        <td data-name="ROWID" <?= $Page->ROWID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ROWID">
<span<?= $Page->ROWID->viewAttributes() ?>>
<?= $Page->ROWID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MOVED->Visible) { // MOVED ?>
    <tr id="r_MOVED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_MOVED"><?= $Page->MOVED->caption() ?></span></td>
        <td data-name="MOVED" <?= $Page->MOVED->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MOVED">
<span<?= $Page->MOVED->viewAttributes() ?>>
<?= $Page->MOVED->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NEWTAX->Visible) { // NEWTAX ?>
    <tr id="r_NEWTAX">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWTAX"><?= $Page->NEWTAX->caption() ?></span></td>
        <td data-name="NEWTAX" <?= $Page->NEWTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_NEWTAX">
<span<?= $Page->NEWTAX->viewAttributes() ?>>
<?= $Page->NEWTAX->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
    <tr id="r_HSNCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_HSNCODE"><?= $Page->HSNCODE->caption() ?></span></td>
        <td data-name="HSNCODE" <?= $Page->HSNCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HSNCODE">
<span<?= $Page->HSNCODE->viewAttributes() ?>>
<?= $Page->HSNCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OLDTAX->Visible) { // OLDTAX ?>
    <tr id="r_OLDTAX">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDTAX"><?= $Page->OLDTAX->caption() ?></span></td>
        <td data-name="OLDTAX" <?= $Page->OLDTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OLDTAX">
<span<?= $Page->OLDTAX->viewAttributes() ?>>
<?= $Page->OLDTAX->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Scheduling->Visible) { // Scheduling ?>
    <tr id="r_Scheduling">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_Scheduling"><?= $Page->Scheduling->caption() ?></span></td>
        <td data-name="Scheduling" <?= $Page->Scheduling->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Scheduling">
<span<?= $Page->Scheduling->viewAttributes() ?>>
<?= $Page->Scheduling->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
    <tr id="r_Schedulingh1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_storemast_Schedulingh1"><?= $Page->Schedulingh1->caption() ?></span></td>
        <td data-name="Schedulingh1" <?= $Page->Schedulingh1->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Schedulingh1">
<span<?= $Page->Schedulingh1->viewAttributes() ?>>
<?= $Page->Schedulingh1->getViewValue() ?></span>
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