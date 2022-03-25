<?php

namespace PHPMaker2021\project3;

// Page object
$ViewPharmacyPharledReturnList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_pharled_returnlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_pharled_returnlist = currentForm = new ew.Form("fview_pharmacy_pharled_returnlist", "list");
    fview_pharmacy_pharled_returnlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_pharled_returnlist");
});
var fview_pharmacy_pharled_returnlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_pharled_returnlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_pharled_returnlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_pharled_returnlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_pharled_returnlistsrch");
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
<form name="fview_pharmacy_pharled_returnlistsrch" id="fview_pharmacy_pharled_returnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_pharmacy_pharled_returnlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_pharled_return">
<form name="fview_pharmacy_pharled_returnlist" id="fview_pharmacy_pharled_returnlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_pharled_return">
<div id="gmp_view_pharmacy_pharled_return" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_pharled_returnlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRCODE" class="view_pharmacy_pharled_return_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <th data-name="TYPE" class="<?= $Page->TYPE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_TYPE" class="view_pharmacy_pharled_return_TYPE"><?= $Page->renderSort($Page->TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->DN->Visible) { // DN ?>
        <th data-name="DN" class="<?= $Page->DN->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DN" class="view_pharmacy_pharled_return_DN"><?= $Page->renderSort($Page->DN) ?></div></th>
<?php } ?>
<?php if ($Page->RDN->Visible) { // RDN ?>
        <th data-name="RDN" class="<?= $Page->RDN->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RDN" class="view_pharmacy_pharled_return_RDN"><?= $Page->renderSort($Page->RDN) ?></div></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Page->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DT" class="view_pharmacy_pharled_return_DT"><?= $Page->renderSort($Page->DT) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRC" class="view_pharmacy_pharled_return_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th data-name="OQ" class="<?= $Page->OQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_OQ" class="view_pharmacy_pharled_return_OQ"><?= $Page->renderSort($Page->OQ) ?></div></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th data-name="RQ" class="<?= $Page->RQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RQ" class="view_pharmacy_pharled_return_RQ"><?= $Page->renderSort($Page->RQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Page->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRQ" class="view_pharmacy_pharled_return_MRQ"><?= $Page->renderSort($Page->MRQ) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IQ" class="view_pharmacy_pharled_return_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BATCHNO" class="view_pharmacy_pharled_return_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EXPDT" class="view_pharmacy_pharled_return_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th data-name="BILLNO" class="<?= $Page->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BILLNO" class="view_pharmacy_pharled_return_BILLNO"><?= $Page->renderSort($Page->BILLNO) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th data-name="BILLDT" class="<?= $Page->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BILLDT" class="view_pharmacy_pharled_return_BILLDT"><?= $Page->renderSort($Page->BILLDT) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RT" class="view_pharmacy_pharled_return_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->VALUE->Visible) { // VALUE ?>
        <th data-name="VALUE" class="<?= $Page->VALUE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_VALUE" class="view_pharmacy_pharled_return_VALUE"><?= $Page->renderSort($Page->VALUE) ?></div></th>
<?php } ?>
<?php if ($Page->DISC->Visible) { // DISC ?>
        <th data-name="DISC" class="<?= $Page->DISC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DISC" class="view_pharmacy_pharled_return_DISC"><?= $Page->renderSort($Page->DISC) ?></div></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th data-name="TAXP" class="<?= $Page->TAXP->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_TAXP" class="view_pharmacy_pharled_return_TAXP"><?= $Page->renderSort($Page->TAXP) ?></div></th>
<?php } ?>
<?php if ($Page->TAX->Visible) { // TAX ?>
        <th data-name="TAX" class="<?= $Page->TAX->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_TAX" class="view_pharmacy_pharled_return_TAX"><?= $Page->renderSort($Page->TAX) ?></div></th>
<?php } ?>
<?php if ($Page->TAXR->Visible) { // TAXR ?>
        <th data-name="TAXR" class="<?= $Page->TAXR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_TAXR" class="view_pharmacy_pharled_return_TAXR"><?= $Page->renderSort($Page->TAXR) ?></div></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th data-name="DAMT" class="<?= $Page->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DAMT" class="view_pharmacy_pharled_return_DAMT"><?= $Page->renderSort($Page->DAMT) ?></div></th>
<?php } ?>
<?php if ($Page->EMPNO->Visible) { // EMPNO ?>
        <th data-name="EMPNO" class="<?= $Page->EMPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_EMPNO" class="view_pharmacy_pharled_return_EMPNO"><?= $Page->renderSort($Page->EMPNO) ?></div></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th data-name="PC" class="<?= $Page->PC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PC" class="view_pharmacy_pharled_return_PC"><?= $Page->renderSort($Page->PC) ?></div></th>
<?php } ?>
<?php if ($Page->DRNAME->Visible) { // DRNAME ?>
        <th data-name="DRNAME" class="<?= $Page->DRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DRNAME" class="view_pharmacy_pharled_return_DRNAME"><?= $Page->renderSort($Page->DRNAME) ?></div></th>
<?php } ?>
<?php if ($Page->BTIME->Visible) { // BTIME ?>
        <th data-name="BTIME" class="<?= $Page->BTIME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BTIME" class="view_pharmacy_pharled_return_BTIME"><?= $Page->renderSort($Page->BTIME) ?></div></th>
<?php } ?>
<?php if ($Page->ONO->Visible) { // ONO ?>
        <th data-name="ONO" class="<?= $Page->ONO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_ONO" class="view_pharmacy_pharled_return_ONO"><?= $Page->renderSort($Page->ONO) ?></div></th>
<?php } ?>
<?php if ($Page->ODT->Visible) { // ODT ?>
        <th data-name="ODT" class="<?= $Page->ODT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_ODT" class="view_pharmacy_pharled_return_ODT"><?= $Page->renderSort($Page->ODT) ?></div></th>
<?php } ?>
<?php if ($Page->PURRT->Visible) { // PURRT ?>
        <th data-name="PURRT" class="<?= $Page->PURRT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PURRT" class="view_pharmacy_pharled_return_PURRT"><?= $Page->renderSort($Page->PURRT) ?></div></th>
<?php } ?>
<?php if ($Page->GRP->Visible) { // GRP ?>
        <th data-name="GRP" class="<?= $Page->GRP->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_GRP" class="view_pharmacy_pharled_return_GRP"><?= $Page->renderSort($Page->GRP) ?></div></th>
<?php } ?>
<?php if ($Page->IBATCH->Visible) { // IBATCH ?>
        <th data-name="IBATCH" class="<?= $Page->IBATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IBATCH" class="view_pharmacy_pharled_return_IBATCH"><?= $Page->renderSort($Page->IBATCH) ?></div></th>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <th data-name="IPNO" class="<?= $Page->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_IPNO" class="view_pharmacy_pharled_return_IPNO"><?= $Page->renderSort($Page->IPNO) ?></div></th>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <th data-name="OPNO" class="<?= $Page->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_OPNO" class="view_pharmacy_pharled_return_OPNO"><?= $Page->renderSort($Page->OPNO) ?></div></th>
<?php } ?>
<?php if ($Page->RECID->Visible) { // RECID ?>
        <th data-name="RECID" class="<?= $Page->RECID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RECID" class="view_pharmacy_pharled_return_RECID"><?= $Page->renderSort($Page->RECID) ?></div></th>
<?php } ?>
<?php if ($Page->FQTY->Visible) { // FQTY ?>
        <th data-name="FQTY" class="<?= $Page->FQTY->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_FQTY" class="view_pharmacy_pharled_return_FQTY"><?= $Page->renderSort($Page->FQTY) ?></div></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Page->UR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_UR" class="view_pharmacy_pharled_return_UR"><?= $Page->renderSort($Page->UR) ?></div></th>
<?php } ?>
<?php if ($Page->DCID->Visible) { // DCID ?>
        <th data-name="DCID" class="<?= $Page->DCID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DCID" class="view_pharmacy_pharled_return_DCID"><?= $Page->renderSort($Page->DCID) ?></div></th>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <th data-name="_USERID" class="<?= $Page->_USERID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return__USERID" class="view_pharmacy_pharled_return__USERID"><?= $Page->renderSort($Page->_USERID) ?></div></th>
<?php } ?>
<?php if ($Page->MODDT->Visible) { // MODDT ?>
        <th data-name="MODDT" class="<?= $Page->MODDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MODDT" class="view_pharmacy_pharled_return_MODDT"><?= $Page->renderSort($Page->MODDT) ?></div></th>
<?php } ?>
<?php if ($Page->FYM->Visible) { // FYM ?>
        <th data-name="FYM" class="<?= $Page->FYM->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_FYM" class="view_pharmacy_pharled_return_FYM"><?= $Page->renderSort($Page->FYM) ?></div></th>
<?php } ?>
<?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
        <th data-name="PRCBATCH" class="<?= $Page->PRCBATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRCBATCH" class="view_pharmacy_pharled_return_PRCBATCH"><?= $Page->renderSort($Page->PRCBATCH) ?></div></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th data-name="SLNO" class="<?= $Page->SLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SLNO" class="view_pharmacy_pharled_return_SLNO"><?= $Page->renderSort($Page->SLNO) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MRP" class="view_pharmacy_pharled_return_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->BILLYM->Visible) { // BILLYM ?>
        <th data-name="BILLYM" class="<?= $Page->BILLYM->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BILLYM" class="view_pharmacy_pharled_return_BILLYM"><?= $Page->renderSort($Page->BILLYM) ?></div></th>
<?php } ?>
<?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
        <th data-name="BILLGRP" class="<?= $Page->BILLGRP->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BILLGRP" class="view_pharmacy_pharled_return_BILLGRP"><?= $Page->renderSort($Page->BILLGRP) ?></div></th>
<?php } ?>
<?php if ($Page->STAFF->Visible) { // STAFF ?>
        <th data-name="STAFF" class="<?= $Page->STAFF->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_STAFF" class="view_pharmacy_pharled_return_STAFF"><?= $Page->renderSort($Page->STAFF) ?></div></th>
<?php } ?>
<?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
        <th data-name="TEMPIPNO" class="<?= $Page->TEMPIPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_TEMPIPNO" class="view_pharmacy_pharled_return_TEMPIPNO"><?= $Page->renderSort($Page->TEMPIPNO) ?></div></th>
<?php } ?>
<?php if ($Page->PRNTED->Visible) { // PRNTED ?>
        <th data-name="PRNTED" class="<?= $Page->PRNTED->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRNTED" class="view_pharmacy_pharled_return_PRNTED"><?= $Page->renderSort($Page->PRNTED) ?></div></th>
<?php } ?>
<?php if ($Page->PATNAME->Visible) { // PATNAME ?>
        <th data-name="PATNAME" class="<?= $Page->PATNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PATNAME" class="view_pharmacy_pharled_return_PATNAME"><?= $Page->renderSort($Page->PATNAME) ?></div></th>
<?php } ?>
<?php if ($Page->PJVNO->Visible) { // PJVNO ?>
        <th data-name="PJVNO" class="<?= $Page->PJVNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PJVNO" class="view_pharmacy_pharled_return_PJVNO"><?= $Page->renderSort($Page->PJVNO) ?></div></th>
<?php } ?>
<?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
        <th data-name="PJVSLNO" class="<?= $Page->PJVSLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PJVSLNO" class="view_pharmacy_pharled_return_PJVSLNO"><?= $Page->renderSort($Page->PJVSLNO) ?></div></th>
<?php } ?>
<?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
        <th data-name="OTHDISC" class="<?= $Page->OTHDISC->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_OTHDISC" class="view_pharmacy_pharled_return_OTHDISC"><?= $Page->renderSort($Page->OTHDISC) ?></div></th>
<?php } ?>
<?php if ($Page->PJVYM->Visible) { // PJVYM ?>
        <th data-name="PJVYM" class="<?= $Page->PJVYM->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PJVYM" class="view_pharmacy_pharled_return_PJVYM"><?= $Page->renderSort($Page->PJVYM) ?></div></th>
<?php } ?>
<?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
        <th data-name="PURDISCPER" class="<?= $Page->PURDISCPER->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PURDISCPER" class="view_pharmacy_pharled_return_PURDISCPER"><?= $Page->renderSort($Page->PURDISCPER) ?></div></th>
<?php } ?>
<?php if ($Page->CASHIER->Visible) { // CASHIER ?>
        <th data-name="CASHIER" class="<?= $Page->CASHIER->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_CASHIER" class="view_pharmacy_pharled_return_CASHIER"><?= $Page->renderSort($Page->CASHIER) ?></div></th>
<?php } ?>
<?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
        <th data-name="CASHTIME" class="<?= $Page->CASHTIME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_CASHTIME" class="view_pharmacy_pharled_return_CASHTIME"><?= $Page->renderSort($Page->CASHTIME) ?></div></th>
<?php } ?>
<?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
        <th data-name="CASHRECD" class="<?= $Page->CASHRECD->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_CASHRECD" class="view_pharmacy_pharled_return_CASHRECD"><?= $Page->renderSort($Page->CASHRECD) ?></div></th>
<?php } ?>
<?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
        <th data-name="CASHREFNO" class="<?= $Page->CASHREFNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_CASHREFNO" class="view_pharmacy_pharled_return_CASHREFNO"><?= $Page->renderSort($Page->CASHREFNO) ?></div></th>
<?php } ?>
<?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
        <th data-name="CASHIERSHIFT" class="<?= $Page->CASHIERSHIFT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_CASHIERSHIFT" class="view_pharmacy_pharled_return_CASHIERSHIFT"><?= $Page->renderSort($Page->CASHIERSHIFT) ?></div></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th data-name="PRCODE" class="<?= $Page->PRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PRCODE" class="view_pharmacy_pharled_return_PRCODE"><?= $Page->renderSort($Page->PRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
        <th data-name="RELEASEBY" class="<?= $Page->RELEASEBY->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RELEASEBY" class="view_pharmacy_pharled_return_RELEASEBY"><?= $Page->renderSort($Page->RELEASEBY) ?></div></th>
<?php } ?>
<?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
        <th data-name="CRAUTHOR" class="<?= $Page->CRAUTHOR->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_CRAUTHOR" class="view_pharmacy_pharled_return_CRAUTHOR"><?= $Page->renderSort($Page->CRAUTHOR) ?></div></th>
<?php } ?>
<?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
        <th data-name="PAYMENT" class="<?= $Page->PAYMENT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PAYMENT" class="view_pharmacy_pharled_return_PAYMENT"><?= $Page->renderSort($Page->PAYMENT) ?></div></th>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <th data-name="DRID" class="<?= $Page->DRID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DRID" class="view_pharmacy_pharled_return_DRID"><?= $Page->renderSort($Page->DRID) ?></div></th>
<?php } ?>
<?php if ($Page->WARD->Visible) { // WARD ?>
        <th data-name="WARD" class="<?= $Page->WARD->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_WARD" class="view_pharmacy_pharled_return_WARD"><?= $Page->renderSort($Page->WARD) ?></div></th>
<?php } ?>
<?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
        <th data-name="STAXTYPE" class="<?= $Page->STAXTYPE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_STAXTYPE" class="view_pharmacy_pharled_return_STAXTYPE"><?= $Page->renderSort($Page->STAXTYPE) ?></div></th>
<?php } ?>
<?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
        <th data-name="PURDISCVAL" class="<?= $Page->PURDISCVAL->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PURDISCVAL" class="view_pharmacy_pharled_return_PURDISCVAL"><?= $Page->renderSort($Page->PURDISCVAL) ?></div></th>
<?php } ?>
<?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
        <th data-name="RNDOFF" class="<?= $Page->RNDOFF->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_RNDOFF" class="view_pharmacy_pharled_return_RNDOFF"><?= $Page->renderSort($Page->RNDOFF) ?></div></th>
<?php } ?>
<?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
        <th data-name="DISCONMRP" class="<?= $Page->DISCONMRP->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DISCONMRP" class="view_pharmacy_pharled_return_DISCONMRP"><?= $Page->renderSort($Page->DISCONMRP) ?></div></th>
<?php } ?>
<?php if ($Page->DELVDT->Visible) { // DELVDT ?>
        <th data-name="DELVDT" class="<?= $Page->DELVDT->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DELVDT" class="view_pharmacy_pharled_return_DELVDT"><?= $Page->renderSort($Page->DELVDT) ?></div></th>
<?php } ?>
<?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
        <th data-name="DELVTIME" class="<?= $Page->DELVTIME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DELVTIME" class="view_pharmacy_pharled_return_DELVTIME"><?= $Page->renderSort($Page->DELVTIME) ?></div></th>
<?php } ?>
<?php if ($Page->DELVBY->Visible) { // DELVBY ?>
        <th data-name="DELVBY" class="<?= $Page->DELVBY->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_DELVBY" class="view_pharmacy_pharled_return_DELVBY"><?= $Page->renderSort($Page->DELVBY) ?></div></th>
<?php } ?>
<?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
        <th data-name="HOSPNO" class="<?= $Page->HOSPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HOSPNO" class="view_pharmacy_pharled_return_HOSPNO"><?= $Page->renderSort($Page->HOSPNO) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_id" class="view_pharmacy_pharled_return_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->pbv->Visible) { // pbv ?>
        <th data-name="pbv" class="<?= $Page->pbv->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_pbv" class="view_pharmacy_pharled_return_pbv"><?= $Page->renderSort($Page->pbv) ?></div></th>
<?php } ?>
<?php if ($Page->pbt->Visible) { // pbt ?>
        <th data-name="pbt" class="<?= $Page->pbt->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_pbt" class="view_pharmacy_pharled_return_pbt"><?= $Page->renderSort($Page->pbt) ?></div></th>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th data-name="SiNo" class="<?= $Page->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_SiNo" class="view_pharmacy_pharled_return_SiNo"><?= $Page->renderSort($Page->SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Product" class="view_pharmacy_pharled_return_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th data-name="Mfg" class="<?= $Page->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Mfg" class="view_pharmacy_pharled_return_Mfg"><?= $Page->renderSort($Page->Mfg) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_HosoID" class="view_pharmacy_pharled_return_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createdby" class="view_pharmacy_pharled_return_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_createddatetime" class="view_pharmacy_pharled_return_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifiedby" class="view_pharmacy_pharled_return_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_modifieddatetime" class="view_pharmacy_pharled_return_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_MFRCODE" class="view_pharmacy_pharled_return_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_Reception" class="view_pharmacy_pharled_return_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_PatID" class="view_pharmacy_pharled_return_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_mrnno" class="view_pharmacy_pharled_return_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th data-name="BRNAME" class="<?= $Page->BRNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_pharled_return_BRNAME" class="view_pharmacy_pharled_return_BRNAME"><?= $Page->renderSort($Page->BRNAME) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_pharled_return", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td data-name="TYPE" <?= $Page->TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DN->Visible) { // DN ?>
        <td data-name="DN" <?= $Page->DN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DN">
<span<?= $Page->DN->viewAttributes() ?>>
<?= $Page->DN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RDN->Visible) { // RDN ?>
        <td data-name="RDN" <?= $Page->RDN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RDN">
<span<?= $Page->RDN->viewAttributes() ?>>
<?= $Page->RDN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RQ->Visible) { // RQ ?>
        <td data-name="RQ" <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VALUE->Visible) { // VALUE ?>
        <td data-name="VALUE" <?= $Page->VALUE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_VALUE">
<span<?= $Page->VALUE->viewAttributes() ?>>
<?= $Page->VALUE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DISC->Visible) { // DISC ?>
        <td data-name="DISC" <?= $Page->DISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DISC">
<span<?= $Page->DISC->viewAttributes() ?>>
<?= $Page->DISC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td data-name="TAXP" <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAX->Visible) { // TAX ?>
        <td data-name="TAX" <?= $Page->TAX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_TAX">
<span<?= $Page->TAX->viewAttributes() ?>>
<?= $Page->TAX->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXR->Visible) { // TAXR ?>
        <td data-name="TAXR" <?= $Page->TAXR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_TAXR">
<span<?= $Page->TAXR->viewAttributes() ?>>
<?= $Page->TAXR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" <?= $Page->DAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EMPNO->Visible) { // EMPNO ?>
        <td data-name="EMPNO" <?= $Page->EMPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_EMPNO">
<span<?= $Page->EMPNO->viewAttributes() ?>>
<?= $Page->EMPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PC->Visible) { // PC ?>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DRNAME->Visible) { // DRNAME ?>
        <td data-name="DRNAME" <?= $Page->DRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DRNAME">
<span<?= $Page->DRNAME->viewAttributes() ?>>
<?= $Page->DRNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BTIME->Visible) { // BTIME ?>
        <td data-name="BTIME" <?= $Page->BTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BTIME">
<span<?= $Page->BTIME->viewAttributes() ?>>
<?= $Page->BTIME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ONO->Visible) { // ONO ?>
        <td data-name="ONO" <?= $Page->ONO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_ONO">
<span<?= $Page->ONO->viewAttributes() ?>>
<?= $Page->ONO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ODT->Visible) { // ODT ?>
        <td data-name="ODT" <?= $Page->ODT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_ODT">
<span<?= $Page->ODT->viewAttributes() ?>>
<?= $Page->ODT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PURRT->Visible) { // PURRT ?>
        <td data-name="PURRT" <?= $Page->PURRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PURRT">
<span<?= $Page->PURRT->viewAttributes() ?>>
<?= $Page->PURRT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GRP->Visible) { // GRP ?>
        <td data-name="GRP" <?= $Page->GRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_GRP">
<span<?= $Page->GRP->viewAttributes() ?>>
<?= $Page->GRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IBATCH->Visible) { // IBATCH ?>
        <td data-name="IBATCH" <?= $Page->IBATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_IBATCH">
<span<?= $Page->IBATCH->viewAttributes() ?>>
<?= $Page->IBATCH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IPNO->Visible) { // IPNO ?>
        <td data-name="IPNO" <?= $Page->IPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_IPNO">
<span<?= $Page->IPNO->viewAttributes() ?>>
<?= $Page->IPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPNO->Visible) { // OPNO ?>
        <td data-name="OPNO" <?= $Page->OPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_OPNO">
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RECID->Visible) { // RECID ?>
        <td data-name="RECID" <?= $Page->RECID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RECID">
<span<?= $Page->RECID->viewAttributes() ?>>
<?= $Page->RECID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FQTY->Visible) { // FQTY ?>
        <td data-name="FQTY" <?= $Page->FQTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_FQTY">
<span<?= $Page->FQTY->viewAttributes() ?>>
<?= $Page->FQTY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DCID->Visible) { // DCID ?>
        <td data-name="DCID" <?= $Page->DCID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DCID">
<span<?= $Page->DCID->viewAttributes() ?>>
<?= $Page->DCID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_USERID->Visible) { // USERID ?>
        <td data-name="_USERID" <?= $Page->_USERID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return__USERID">
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MODDT->Visible) { // MODDT ?>
        <td data-name="MODDT" <?= $Page->MODDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MODDT">
<span<?= $Page->MODDT->viewAttributes() ?>>
<?= $Page->MODDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FYM->Visible) { // FYM ?>
        <td data-name="FYM" <?= $Page->FYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_FYM">
<span<?= $Page->FYM->viewAttributes() ?>>
<?= $Page->FYM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
        <td data-name="PRCBATCH" <?= $Page->PRCBATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRCBATCH">
<span<?= $Page->PRCBATCH->viewAttributes() ?>>
<?= $Page->PRCBATCH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td data-name="SLNO" <?= $Page->SLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLYM->Visible) { // BILLYM ?>
        <td data-name="BILLYM" <?= $Page->BILLYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BILLYM">
<span<?= $Page->BILLYM->viewAttributes() ?>>
<?= $Page->BILLYM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
        <td data-name="BILLGRP" <?= $Page->BILLGRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BILLGRP">
<span<?= $Page->BILLGRP->viewAttributes() ?>>
<?= $Page->BILLGRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->STAFF->Visible) { // STAFF ?>
        <td data-name="STAFF" <?= $Page->STAFF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_STAFF">
<span<?= $Page->STAFF->viewAttributes() ?>>
<?= $Page->STAFF->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
        <td data-name="TEMPIPNO" <?= $Page->TEMPIPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_TEMPIPNO">
<span<?= $Page->TEMPIPNO->viewAttributes() ?>>
<?= $Page->TEMPIPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRNTED->Visible) { // PRNTED ?>
        <td data-name="PRNTED" <?= $Page->PRNTED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRNTED">
<span<?= $Page->PRNTED->viewAttributes() ?>>
<?= $Page->PRNTED->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PATNAME->Visible) { // PATNAME ?>
        <td data-name="PATNAME" <?= $Page->PATNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PATNAME">
<span<?= $Page->PATNAME->viewAttributes() ?>>
<?= $Page->PATNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PJVNO->Visible) { // PJVNO ?>
        <td data-name="PJVNO" <?= $Page->PJVNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PJVNO">
<span<?= $Page->PJVNO->viewAttributes() ?>>
<?= $Page->PJVNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
        <td data-name="PJVSLNO" <?= $Page->PJVSLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PJVSLNO">
<span<?= $Page->PJVSLNO->viewAttributes() ?>>
<?= $Page->PJVSLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
        <td data-name="OTHDISC" <?= $Page->OTHDISC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_OTHDISC">
<span<?= $Page->OTHDISC->viewAttributes() ?>>
<?= $Page->OTHDISC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PJVYM->Visible) { // PJVYM ?>
        <td data-name="PJVYM" <?= $Page->PJVYM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PJVYM">
<span<?= $Page->PJVYM->viewAttributes() ?>>
<?= $Page->PJVYM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
        <td data-name="PURDISCPER" <?= $Page->PURDISCPER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PURDISCPER">
<span<?= $Page->PURDISCPER->viewAttributes() ?>>
<?= $Page->PURDISCPER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CASHIER->Visible) { // CASHIER ?>
        <td data-name="CASHIER" <?= $Page->CASHIER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_CASHIER">
<span<?= $Page->CASHIER->viewAttributes() ?>>
<?= $Page->CASHIER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
        <td data-name="CASHTIME" <?= $Page->CASHTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_CASHTIME">
<span<?= $Page->CASHTIME->viewAttributes() ?>>
<?= $Page->CASHTIME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
        <td data-name="CASHRECD" <?= $Page->CASHRECD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_CASHRECD">
<span<?= $Page->CASHRECD->viewAttributes() ?>>
<?= $Page->CASHRECD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
        <td data-name="CASHREFNO" <?= $Page->CASHREFNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_CASHREFNO">
<span<?= $Page->CASHREFNO->viewAttributes() ?>>
<?= $Page->CASHREFNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
        <td data-name="CASHIERSHIFT" <?= $Page->CASHIERSHIFT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_CASHIERSHIFT">
<span<?= $Page->CASHIERSHIFT->viewAttributes() ?>>
<?= $Page->CASHIERSHIFT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td data-name="PRCODE" <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
        <td data-name="RELEASEBY" <?= $Page->RELEASEBY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RELEASEBY">
<span<?= $Page->RELEASEBY->viewAttributes() ?>>
<?= $Page->RELEASEBY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
        <td data-name="CRAUTHOR" <?= $Page->CRAUTHOR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_CRAUTHOR">
<span<?= $Page->CRAUTHOR->viewAttributes() ?>>
<?= $Page->CRAUTHOR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
        <td data-name="PAYMENT" <?= $Page->PAYMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PAYMENT">
<span<?= $Page->PAYMENT->viewAttributes() ?>>
<?= $Page->PAYMENT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DRID->Visible) { // DRID ?>
        <td data-name="DRID" <?= $Page->DRID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WARD->Visible) { // WARD ?>
        <td data-name="WARD" <?= $Page->WARD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_WARD">
<span<?= $Page->WARD->viewAttributes() ?>>
<?= $Page->WARD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
        <td data-name="STAXTYPE" <?= $Page->STAXTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_STAXTYPE">
<span<?= $Page->STAXTYPE->viewAttributes() ?>>
<?= $Page->STAXTYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
        <td data-name="PURDISCVAL" <?= $Page->PURDISCVAL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PURDISCVAL">
<span<?= $Page->PURDISCVAL->viewAttributes() ?>>
<?= $Page->PURDISCVAL->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
        <td data-name="RNDOFF" <?= $Page->RNDOFF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_RNDOFF">
<span<?= $Page->RNDOFF->viewAttributes() ?>>
<?= $Page->RNDOFF->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
        <td data-name="DISCONMRP" <?= $Page->DISCONMRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DISCONMRP">
<span<?= $Page->DISCONMRP->viewAttributes() ?>>
<?= $Page->DISCONMRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DELVDT->Visible) { // DELVDT ?>
        <td data-name="DELVDT" <?= $Page->DELVDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DELVDT">
<span<?= $Page->DELVDT->viewAttributes() ?>>
<?= $Page->DELVDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
        <td data-name="DELVTIME" <?= $Page->DELVTIME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DELVTIME">
<span<?= $Page->DELVTIME->viewAttributes() ?>>
<?= $Page->DELVTIME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DELVBY->Visible) { // DELVBY ?>
        <td data-name="DELVBY" <?= $Page->DELVBY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_DELVBY">
<span<?= $Page->DELVBY->viewAttributes() ?>>
<?= $Page->DELVBY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
        <td data-name="HOSPNO" <?= $Page->HOSPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_HOSPNO">
<span<?= $Page->HOSPNO->viewAttributes() ?>>
<?= $Page->HOSPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pbv->Visible) { // pbv ?>
        <td data-name="pbv" <?= $Page->pbv->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_pbv">
<span<?= $Page->pbv->viewAttributes() ?>>
<?= $Page->pbv->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pbt->Visible) { // pbt ?>
        <td data-name="pbt" <?= $Page->pbt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_pbt">
<span<?= $Page->pbt->viewAttributes() ?>>
<?= $Page->pbt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo" <?= $Page->SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg" <?= $Page->Mfg->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME" <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_pharled_return_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
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
    ew.addEventHandlers("view_pharmacy_pharled_return");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
