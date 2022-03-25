<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyStoremastList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_storemastlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_storemastlist = currentForm = new ew.Form("fpharmacy_storemastlist", "list");
    fpharmacy_storemastlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpharmacy_storemastlist");
});
var fpharmacy_storemastlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_storemastlistsrch = currentSearchForm = new ew.Form("fpharmacy_storemastlistsrch");

    // Dynamic selection lists

    // Filters
    fpharmacy_storemastlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_storemastlistsrch");
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
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpharmacy_storemastlistsrch" id="fpharmacy_storemastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpharmacy_storemastlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_storemast">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_storemast">
<form name="fpharmacy_storemastlist" id="fpharmacy_storemastlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<div id="gmp_pharmacy_storemast" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_storemastlist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <th data-name="TYPE" class="<?= $Page->TYPE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE"><?= $Page->renderSort($Page->TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <th data-name="DES" class="<?= $Page->DES->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES"><?= $Page->renderSort($Page->DES) ?></div></th>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <th data-name="UM" class="<?= $Page->UM->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM"><?= $Page->renderSort($Page->UM) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Page->UR->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UR" class="pharmacy_storemast_UR"><?= $Page->renderSort($Page->UR) ?></div></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th data-name="TAXP" class="<?= $Page->TAXP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TAXP" class="pharmacy_storemast_TAXP"><?= $Page->renderSort($Page->TAXP) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th data-name="OQ" class="<?= $Page->OQ->headerCellClass() ?>"><div id="elh_pharmacy_storemast_OQ" class="pharmacy_storemast_OQ"><?= $Page->renderSort($Page->OQ) ?></div></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th data-name="RQ" class="<?= $Page->RQ->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RQ" class="pharmacy_storemast_RQ"><?= $Page->renderSort($Page->RQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Page->MRQ->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MRQ" class="pharmacy_storemast_MRQ"><?= $Page->renderSort($Page->MRQ) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_pharmacy_storemast_IQ" class="pharmacy_storemast_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->SALQTY->Visible) { // SALQTY ?>
        <th data-name="SALQTY" class="<?= $Page->SALQTY->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SALQTY" class="pharmacy_storemast_SALQTY"><?= $Page->renderSort($Page->SALQTY) ?></div></th>
<?php } ?>
<?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
        <th data-name="LASTPURDT" class="<?= $Page->LASTPURDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_LASTPURDT" class="pharmacy_storemast_LASTPURDT"><?= $Page->renderSort($Page->LASTPURDT) ?></div></th>
<?php } ?>
<?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
        <th data-name="LASTSUPP" class="<?= $Page->LASTSUPP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_LASTSUPP" class="pharmacy_storemast_LASTSUPP"><?= $Page->renderSort($Page->LASTSUPP) ?></div></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th data-name="GENNAME" class="<?= $Page->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME"><?= $Page->renderSort($Page->GENNAME) ?></div></th>
<?php } ?>
<?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
        <th data-name="LASTISSDT" class="<?= $Page->LASTISSDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_LASTISSDT" class="pharmacy_storemast_LASTISSDT"><?= $Page->renderSort($Page->LASTISSDT) ?></div></th>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <th data-name="CREATEDDT" class="<?= $Page->CREATEDDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT"><?= $Page->renderSort($Page->CREATEDDT) ?></div></th>
<?php } ?>
<?php if ($Page->OPPRC->Visible) { // OPPRC ?>
        <th data-name="OPPRC" class="<?= $Page->OPPRC->headerCellClass() ?>"><div id="elh_pharmacy_storemast_OPPRC" class="pharmacy_storemast_OPPRC"><?= $Page->renderSort($Page->OPPRC) ?></div></th>
<?php } ?>
<?php if ($Page->RESTRICT->Visible) { // RESTRICT ?>
        <th data-name="RESTRICT" class="<?= $Page->RESTRICT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RESTRICT" class="pharmacy_storemast_RESTRICT"><?= $Page->renderSort($Page->RESTRICT) ?></div></th>
<?php } ?>
<?php if ($Page->BAWAPRC->Visible) { // BAWAPRC ?>
        <th data-name="BAWAPRC" class="<?= $Page->BAWAPRC->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BAWAPRC" class="pharmacy_storemast_BAWAPRC"><?= $Page->renderSort($Page->BAWAPRC) ?></div></th>
<?php } ?>
<?php if ($Page->STAXPER->Visible) { // STAXPER ?>
        <th data-name="STAXPER" class="<?= $Page->STAXPER->headerCellClass() ?>"><div id="elh_pharmacy_storemast_STAXPER" class="pharmacy_storemast_STAXPER"><?= $Page->renderSort($Page->STAXPER) ?></div></th>
<?php } ?>
<?php if ($Page->TAXTYPE->Visible) { // TAXTYPE ?>
        <th data-name="TAXTYPE" class="<?= $Page->TAXTYPE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TAXTYPE" class="pharmacy_storemast_TAXTYPE"><?= $Page->renderSort($Page->TAXTYPE) ?></div></th>
<?php } ?>
<?php if ($Page->OLDTAXP->Visible) { // OLDTAXP ?>
        <th data-name="OLDTAXP" class="<?= $Page->OLDTAXP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_OLDTAXP" class="pharmacy_storemast_OLDTAXP"><?= $Page->renderSort($Page->OLDTAXP) ?></div></th>
<?php } ?>
<?php if ($Page->TAXUPD->Visible) { // TAXUPD ?>
        <th data-name="TAXUPD" class="<?= $Page->TAXUPD->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TAXUPD" class="pharmacy_storemast_TAXUPD"><?= $Page->renderSort($Page->TAXUPD) ?></div></th>
<?php } ?>
<?php if ($Page->PACKAGE->Visible) { // PACKAGE ?>
        <th data-name="PACKAGE" class="<?= $Page->PACKAGE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PACKAGE" class="pharmacy_storemast_PACKAGE"><?= $Page->renderSort($Page->PACKAGE) ?></div></th>
<?php } ?>
<?php if ($Page->NEWRT->Visible) { // NEWRT ?>
        <th data-name="NEWRT" class="<?= $Page->NEWRT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_NEWRT" class="pharmacy_storemast_NEWRT"><?= $Page->renderSort($Page->NEWRT) ?></div></th>
<?php } ?>
<?php if ($Page->NEWMRP->Visible) { // NEWMRP ?>
        <th data-name="NEWMRP" class="<?= $Page->NEWMRP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_NEWMRP" class="pharmacy_storemast_NEWMRP"><?= $Page->renderSort($Page->NEWMRP) ?></div></th>
<?php } ?>
<?php if ($Page->NEWUR->Visible) { // NEWUR ?>
        <th data-name="NEWUR" class="<?= $Page->NEWUR->headerCellClass() ?>"><div id="elh_pharmacy_storemast_NEWUR" class="pharmacy_storemast_NEWUR"><?= $Page->renderSort($Page->NEWUR) ?></div></th>
<?php } ?>
<?php if ($Page->STATUS->Visible) { // STATUS ?>
        <th data-name="STATUS" class="<?= $Page->STATUS->headerCellClass() ?>"><div id="elh_pharmacy_storemast_STATUS" class="pharmacy_storemast_STATUS"><?= $Page->renderSort($Page->STATUS) ?></div></th>
<?php } ?>
<?php if ($Page->RETNQTY->Visible) { // RETNQTY ?>
        <th data-name="RETNQTY" class="<?= $Page->RETNQTY->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RETNQTY" class="pharmacy_storemast_RETNQTY"><?= $Page->renderSort($Page->RETNQTY) ?></div></th>
<?php } ?>
<?php if ($Page->KEMODISC->Visible) { // KEMODISC ?>
        <th data-name="KEMODISC" class="<?= $Page->KEMODISC->headerCellClass() ?>"><div id="elh_pharmacy_storemast_KEMODISC" class="pharmacy_storemast_KEMODISC"><?= $Page->renderSort($Page->KEMODISC) ?></div></th>
<?php } ?>
<?php if ($Page->PATSALE->Visible) { // PATSALE ?>
        <th data-name="PATSALE" class="<?= $Page->PATSALE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PATSALE" class="pharmacy_storemast_PATSALE"><?= $Page->renderSort($Page->PATSALE) ?></div></th>
<?php } ?>
<?php if ($Page->ORGAN->Visible) { // ORGAN ?>
        <th data-name="ORGAN" class="<?= $Page->ORGAN->headerCellClass() ?>"><div id="elh_pharmacy_storemast_ORGAN" class="pharmacy_storemast_ORGAN"><?= $Page->renderSort($Page->ORGAN) ?></div></th>
<?php } ?>
<?php if ($Page->OLDRQ->Visible) { // OLDRQ ?>
        <th data-name="OLDRQ" class="<?= $Page->OLDRQ->headerCellClass() ?>"><div id="elh_pharmacy_storemast_OLDRQ" class="pharmacy_storemast_OLDRQ"><?= $Page->renderSort($Page->OLDRQ) ?></div></th>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <th data-name="DRID" class="<?= $Page->DRID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID"><?= $Page->renderSort($Page->DRID) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <th data-name="COMBCODE" class="<?= $Page->COMBCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE"><?= $Page->renderSort($Page->COMBCODE) ?></div></th>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <th data-name="GENCODE" class="<?= $Page->GENCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE"><?= $Page->renderSort($Page->GENCODE) ?></div></th>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <th data-name="STRENGTH" class="<?= $Page->STRENGTH->headerCellClass() ?>"><div id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH"><?= $Page->renderSort($Page->STRENGTH) ?></div></th>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
        <th data-name="UNIT" class="<?= $Page->UNIT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT"><?= $Page->renderSort($Page->UNIT) ?></div></th>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <th data-name="FORMULARY" class="<?= $Page->FORMULARY->headerCellClass() ?>"><div id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY"><?= $Page->renderSort($Page->FORMULARY) ?></div></th>
<?php } ?>
<?php if ($Page->STOCK->Visible) { // STOCK ?>
        <th data-name="STOCK" class="<?= $Page->STOCK->headerCellClass() ?>"><div id="elh_pharmacy_storemast_STOCK" class="pharmacy_storemast_STOCK"><?= $Page->renderSort($Page->STOCK) ?></div></th>
<?php } ?>
<?php if ($Page->RACKNO->Visible) { // RACKNO ?>
        <th data-name="RACKNO" class="<?= $Page->RACKNO->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RACKNO" class="pharmacy_storemast_RACKNO"><?= $Page->renderSort($Page->RACKNO) ?></div></th>
<?php } ?>
<?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
        <th data-name="SUPPNAME" class="<?= $Page->SUPPNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SUPPNAME" class="pharmacy_storemast_SUPPNAME"><?= $Page->renderSort($Page->SUPPNAME) ?></div></th>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <th data-name="COMBNAME" class="<?= $Page->COMBNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME"><?= $Page->renderSort($Page->COMBNAME) ?></div></th>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <th data-name="GENERICNAME" class="<?= $Page->GENERICNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME"><?= $Page->renderSort($Page->GENERICNAME) ?></div></th>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
        <th data-name="REMARK" class="<?= $Page->REMARK->headerCellClass() ?>"><div id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK"><?= $Page->renderSort($Page->REMARK) ?></div></th>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
        <th data-name="TEMP" class="<?= $Page->TEMP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP"><?= $Page->renderSort($Page->TEMP) ?></div></th>
<?php } ?>
<?php if ($Page->PACKING->Visible) { // PACKING ?>
        <th data-name="PACKING" class="<?= $Page->PACKING->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PACKING" class="pharmacy_storemast_PACKING"><?= $Page->renderSort($Page->PACKING) ?></div></th>
<?php } ?>
<?php if ($Page->PhysQty->Visible) { // PhysQty ?>
        <th data-name="PhysQty" class="<?= $Page->PhysQty->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PhysQty" class="pharmacy_storemast_PhysQty"><?= $Page->renderSort($Page->PhysQty) ?></div></th>
<?php } ?>
<?php if ($Page->LedQty->Visible) { // LedQty ?>
        <th data-name="LedQty" class="<?= $Page->LedQty->headerCellClass() ?>"><div id="elh_pharmacy_storemast_LedQty" class="pharmacy_storemast_LedQty"><?= $Page->renderSort($Page->LedQty) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <th data-name="SaleValue" class="<?= $Page->SaleValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue"><?= $Page->renderSort($Page->SaleValue) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <th data-name="SaleRate" class="<?= $Page->SaleRate->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate"><?= $Page->renderSort($Page->SaleRate) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th data-name="BRNAME" class="<?= $Page->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME"><?= $Page->renderSort($Page->BRNAME) ?></div></th>
<?php } ?>
<?php if ($Page->OV->Visible) { // OV ?>
        <th data-name="OV" class="<?= $Page->OV->headerCellClass() ?>"><div id="elh_pharmacy_storemast_OV" class="pharmacy_storemast_OV"><?= $Page->renderSort($Page->OV) ?></div></th>
<?php } ?>
<?php if ($Page->LATESTOV->Visible) { // LATESTOV ?>
        <th data-name="LATESTOV" class="<?= $Page->LATESTOV->headerCellClass() ?>"><div id="elh_pharmacy_storemast_LATESTOV" class="pharmacy_storemast_LATESTOV"><?= $Page->renderSort($Page->LATESTOV) ?></div></th>
<?php } ?>
<?php if ($Page->ITEMTYPE->Visible) { // ITEMTYPE ?>
        <th data-name="ITEMTYPE" class="<?= $Page->ITEMTYPE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_ITEMTYPE" class="pharmacy_storemast_ITEMTYPE"><?= $Page->renderSort($Page->ITEMTYPE) ?></div></th>
<?php } ?>
<?php if ($Page->ROWID->Visible) { // ROWID ?>
        <th data-name="ROWID" class="<?= $Page->ROWID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_ROWID" class="pharmacy_storemast_ROWID"><?= $Page->renderSort($Page->ROWID) ?></div></th>
<?php } ?>
<?php if ($Page->MOVED->Visible) { // MOVED ?>
        <th data-name="MOVED" class="<?= $Page->MOVED->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MOVED" class="pharmacy_storemast_MOVED"><?= $Page->renderSort($Page->MOVED) ?></div></th>
<?php } ?>
<?php if ($Page->NEWTAX->Visible) { // NEWTAX ?>
        <th data-name="NEWTAX" class="<?= $Page->NEWTAX->headerCellClass() ?>"><div id="elh_pharmacy_storemast_NEWTAX" class="pharmacy_storemast_NEWTAX"><?= $Page->renderSort($Page->NEWTAX) ?></div></th>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
        <th data-name="HSNCODE" class="<?= $Page->HSNCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_HSNCODE" class="pharmacy_storemast_HSNCODE"><?= $Page->renderSort($Page->HSNCODE) ?></div></th>
<?php } ?>
<?php if ($Page->OLDTAX->Visible) { // OLDTAX ?>
        <th data-name="OLDTAX" class="<?= $Page->OLDTAX->headerCellClass() ?>"><div id="elh_pharmacy_storemast_OLDTAX" class="pharmacy_storemast_OLDTAX"><?= $Page->renderSort($Page->OLDTAX) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_storemast", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td data-name="TYPE" <?= $Page->TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES" <?= $Page->DES->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UM->Visible) { // UM ?>
        <td data-name="UM" <?= $Page->UM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td data-name="TAXP" <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RQ->Visible) { // RQ ?>
        <td data-name="RQ" <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SALQTY->Visible) { // SALQTY ?>
        <td data-name="SALQTY" <?= $Page->SALQTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SALQTY">
<span<?= $Page->SALQTY->viewAttributes() ?>>
<?= $Page->SALQTY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
        <td data-name="LASTPURDT" <?= $Page->LASTPURDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_LASTPURDT">
<span<?= $Page->LASTPURDT->viewAttributes() ?>>
<?= $Page->LASTPURDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
        <td data-name="LASTSUPP" <?= $Page->LASTSUPP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_LASTSUPP">
<span<?= $Page->LASTSUPP->viewAttributes() ?>>
<?= $Page->LASTSUPP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME" <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
        <td data-name="LASTISSDT" <?= $Page->LASTISSDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_LASTISSDT">
<span<?= $Page->LASTISSDT->viewAttributes() ?>>
<?= $Page->LASTISSDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <td data-name="CREATEDDT" <?= $Page->CREATEDDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_CREATEDDT">
<span<?= $Page->CREATEDDT->viewAttributes() ?>>
<?= $Page->CREATEDDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPPRC->Visible) { // OPPRC ?>
        <td data-name="OPPRC" <?= $Page->OPPRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_OPPRC">
<span<?= $Page->OPPRC->viewAttributes() ?>>
<?= $Page->OPPRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESTRICT->Visible) { // RESTRICT ?>
        <td data-name="RESTRICT" <?= $Page->RESTRICT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RESTRICT">
<span<?= $Page->RESTRICT->viewAttributes() ?>>
<?= $Page->RESTRICT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BAWAPRC->Visible) { // BAWAPRC ?>
        <td data-name="BAWAPRC" <?= $Page->BAWAPRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BAWAPRC">
<span<?= $Page->BAWAPRC->viewAttributes() ?>>
<?= $Page->BAWAPRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->STAXPER->Visible) { // STAXPER ?>
        <td data-name="STAXPER" <?= $Page->STAXPER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STAXPER">
<span<?= $Page->STAXPER->viewAttributes() ?>>
<?= $Page->STAXPER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXTYPE->Visible) { // TAXTYPE ?>
        <td data-name="TAXTYPE" <?= $Page->TAXTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TAXTYPE">
<span<?= $Page->TAXTYPE->viewAttributes() ?>>
<?= $Page->TAXTYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OLDTAXP->Visible) { // OLDTAXP ?>
        <td data-name="OLDTAXP" <?= $Page->OLDTAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_OLDTAXP">
<span<?= $Page->OLDTAXP->viewAttributes() ?>>
<?= $Page->OLDTAXP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXUPD->Visible) { // TAXUPD ?>
        <td data-name="TAXUPD" <?= $Page->TAXUPD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TAXUPD">
<span<?= $Page->TAXUPD->viewAttributes() ?>>
<?= $Page->TAXUPD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PACKAGE->Visible) { // PACKAGE ?>
        <td data-name="PACKAGE" <?= $Page->PACKAGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PACKAGE">
<span<?= $Page->PACKAGE->viewAttributes() ?>>
<?= $Page->PACKAGE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEWRT->Visible) { // NEWRT ?>
        <td data-name="NEWRT" <?= $Page->NEWRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_NEWRT">
<span<?= $Page->NEWRT->viewAttributes() ?>>
<?= $Page->NEWRT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEWMRP->Visible) { // NEWMRP ?>
        <td data-name="NEWMRP" <?= $Page->NEWMRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_NEWMRP">
<span<?= $Page->NEWMRP->viewAttributes() ?>>
<?= $Page->NEWMRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEWUR->Visible) { // NEWUR ?>
        <td data-name="NEWUR" <?= $Page->NEWUR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_NEWUR">
<span<?= $Page->NEWUR->viewAttributes() ?>>
<?= $Page->NEWUR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->STATUS->Visible) { // STATUS ?>
        <td data-name="STATUS" <?= $Page->STATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STATUS">
<span<?= $Page->STATUS->viewAttributes() ?>>
<?= $Page->STATUS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RETNQTY->Visible) { // RETNQTY ?>
        <td data-name="RETNQTY" <?= $Page->RETNQTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RETNQTY">
<span<?= $Page->RETNQTY->viewAttributes() ?>>
<?= $Page->RETNQTY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->KEMODISC->Visible) { // KEMODISC ?>
        <td data-name="KEMODISC" <?= $Page->KEMODISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_KEMODISC">
<span<?= $Page->KEMODISC->viewAttributes() ?>>
<?= $Page->KEMODISC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PATSALE->Visible) { // PATSALE ?>
        <td data-name="PATSALE" <?= $Page->PATSALE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PATSALE">
<span<?= $Page->PATSALE->viewAttributes() ?>>
<?= $Page->PATSALE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ORGAN->Visible) { // ORGAN ?>
        <td data-name="ORGAN" <?= $Page->ORGAN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_ORGAN">
<span<?= $Page->ORGAN->viewAttributes() ?>>
<?= $Page->ORGAN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OLDRQ->Visible) { // OLDRQ ?>
        <td data-name="OLDRQ" <?= $Page->OLDRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_OLDRQ">
<span<?= $Page->OLDRQ->viewAttributes() ?>>
<?= $Page->OLDRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DRID->Visible) { // DRID ?>
        <td data-name="DRID" <?= $Page->DRID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <td data-name="COMBCODE" <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBCODE">
<span<?= $Page->COMBCODE->viewAttributes() ?>>
<?= $Page->COMBCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <td data-name="GENCODE" <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENCODE">
<span<?= $Page->GENCODE->viewAttributes() ?>>
<?= $Page->GENCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <td data-name="STRENGTH" <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UNIT->Visible) { // UNIT ?>
        <td data-name="UNIT" <?= $Page->UNIT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UNIT">
<span<?= $Page->UNIT->viewAttributes() ?>>
<?= $Page->UNIT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <td data-name="FORMULARY" <?= $Page->FORMULARY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_FORMULARY">
<span<?= $Page->FORMULARY->viewAttributes() ?>>
<?= $Page->FORMULARY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->STOCK->Visible) { // STOCK ?>
        <td data-name="STOCK" <?= $Page->STOCK->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STOCK">
<span<?= $Page->STOCK->viewAttributes() ?>>
<?= $Page->STOCK->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RACKNO->Visible) { // RACKNO ?>
        <td data-name="RACKNO" <?= $Page->RACKNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RACKNO">
<span<?= $Page->RACKNO->viewAttributes() ?>>
<?= $Page->RACKNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
        <td data-name="SUPPNAME" <?= $Page->SUPPNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SUPPNAME">
<span<?= $Page->SUPPNAME->viewAttributes() ?>>
<?= $Page->SUPPNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <td data-name="COMBNAME" <?= $Page->COMBNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBNAME">
<span<?= $Page->COMBNAME->viewAttributes() ?>>
<?= $Page->COMBNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <td data-name="GENERICNAME" <?= $Page->GENERICNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENERICNAME">
<span<?= $Page->GENERICNAME->viewAttributes() ?>>
<?= $Page->GENERICNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->REMARK->Visible) { // REMARK ?>
        <td data-name="REMARK" <?= $Page->REMARK->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_REMARK">
<span<?= $Page->REMARK->viewAttributes() ?>>
<?= $Page->REMARK->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TEMP->Visible) { // TEMP ?>
        <td data-name="TEMP" <?= $Page->TEMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TEMP">
<span<?= $Page->TEMP->viewAttributes() ?>>
<?= $Page->TEMP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PACKING->Visible) { // PACKING ?>
        <td data-name="PACKING" <?= $Page->PACKING->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PACKING">
<span<?= $Page->PACKING->viewAttributes() ?>>
<?= $Page->PACKING->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PhysQty->Visible) { // PhysQty ?>
        <td data-name="PhysQty" <?= $Page->PhysQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PhysQty">
<span<?= $Page->PhysQty->viewAttributes() ?>>
<?= $Page->PhysQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LedQty->Visible) { // LedQty ?>
        <td data-name="LedQty" <?= $Page->LedQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_LedQty">
<span<?= $Page->LedQty->viewAttributes() ?>>
<?= $Page->LedQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <td data-name="SaleValue" <?= $Page->SaleValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleValue">
<span<?= $Page->SaleValue->viewAttributes() ?>>
<?= $Page->SaleValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <td data-name="SaleRate" <?= $Page->SaleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleRate">
<span<?= $Page->SaleRate->viewAttributes() ?>>
<?= $Page->SaleRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME" <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OV->Visible) { // OV ?>
        <td data-name="OV" <?= $Page->OV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_OV">
<span<?= $Page->OV->viewAttributes() ?>>
<?= $Page->OV->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LATESTOV->Visible) { // LATESTOV ?>
        <td data-name="LATESTOV" <?= $Page->LATESTOV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_LATESTOV">
<span<?= $Page->LATESTOV->viewAttributes() ?>>
<?= $Page->LATESTOV->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ITEMTYPE->Visible) { // ITEMTYPE ?>
        <td data-name="ITEMTYPE" <?= $Page->ITEMTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_ITEMTYPE">
<span<?= $Page->ITEMTYPE->viewAttributes() ?>>
<?= $Page->ITEMTYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ROWID->Visible) { // ROWID ?>
        <td data-name="ROWID" <?= $Page->ROWID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_ROWID">
<span<?= $Page->ROWID->viewAttributes() ?>>
<?= $Page->ROWID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MOVED->Visible) { // MOVED ?>
        <td data-name="MOVED" <?= $Page->MOVED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MOVED">
<span<?= $Page->MOVED->viewAttributes() ?>>
<?= $Page->MOVED->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEWTAX->Visible) { // NEWTAX ?>
        <td data-name="NEWTAX" <?= $Page->NEWTAX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_NEWTAX">
<span<?= $Page->NEWTAX->viewAttributes() ?>>
<?= $Page->NEWTAX->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
        <td data-name="HSNCODE" <?= $Page->HSNCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_HSNCODE">
<span<?= $Page->HSNCODE->viewAttributes() ?>>
<?= $Page->HSNCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OLDTAX->Visible) { // OLDTAX ?>
        <td data-name="OLDTAX" <?= $Page->OLDTAX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_OLDTAX">
<span<?= $Page->OLDTAX->viewAttributes() ?>>
<?= $Page->OLDTAX->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl() ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("pharmacy_storemast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
