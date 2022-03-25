<?php

namespace PHPMaker2021\project3;

// Page object
$StoreBatchmasList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fstore_batchmaslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fstore_batchmaslist = currentForm = new ew.Form("fstore_batchmaslist", "list");
    fstore_batchmaslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fstore_batchmaslist");
});
var fstore_batchmaslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fstore_batchmaslistsrch = currentSearchForm = new ew.Form("fstore_batchmaslistsrch");

    // Dynamic selection lists

    // Filters
    fstore_batchmaslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fstore_batchmaslistsrch");
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
<form name="fstore_batchmaslistsrch" id="fstore_batchmaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fstore_batchmaslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="store_batchmas">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> store_batchmas">
<form name="fstore_batchmaslist" id="fstore_batchmaslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<div id="gmp_store_batchmas" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_store_batchmaslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_store_batchmas_PRC" class="store_batchmas_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_store_batchmas_BATCHNO" class="store_batchmas_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th data-name="OQ" class="<?= $Page->OQ->headerCellClass() ?>"><div id="elh_store_batchmas_OQ" class="store_batchmas_OQ"><?= $Page->renderSort($Page->OQ) ?></div></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th data-name="RQ" class="<?= $Page->RQ->headerCellClass() ?>"><div id="elh_store_batchmas_RQ" class="store_batchmas_RQ"><?= $Page->renderSort($Page->RQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Page->MRQ->headerCellClass() ?>"><div id="elh_store_batchmas_MRQ" class="store_batchmas_MRQ"><?= $Page->renderSort($Page->MRQ) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_store_batchmas_IQ" class="store_batchmas_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_store_batchmas_MRP" class="store_batchmas_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_store_batchmas_EXPDT" class="store_batchmas_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Page->UR->headerCellClass() ?>"><div id="elh_store_batchmas_UR" class="store_batchmas_UR"><?= $Page->renderSort($Page->UR) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_store_batchmas_RT" class="store_batchmas_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th data-name="PRCODE" class="<?= $Page->PRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_PRCODE" class="store_batchmas_PRCODE"><?= $Page->renderSort($Page->PRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <th data-name="BATCH" class="<?= $Page->BATCH->headerCellClass() ?>"><div id="elh_store_batchmas_BATCH" class="store_batchmas_BATCH"><?= $Page->renderSort($Page->BATCH) ?></div></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th data-name="PC" class="<?= $Page->PC->headerCellClass() ?>"><div id="elh_store_batchmas_PC" class="store_batchmas_PC"><?= $Page->renderSort($Page->PC) ?></div></th>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <th data-name="OLDRT" class="<?= $Page->OLDRT->headerCellClass() ?>"><div id="elh_store_batchmas_OLDRT" class="store_batchmas_OLDRT"><?= $Page->renderSort($Page->OLDRT) ?></div></th>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <th data-name="TEMPMRQ" class="<?= $Page->TEMPMRQ->headerCellClass() ?>"><div id="elh_store_batchmas_TEMPMRQ" class="store_batchmas_TEMPMRQ"><?= $Page->renderSort($Page->TEMPMRQ) ?></div></th>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
        <th data-name="TAXP" class="<?= $Page->TAXP->headerCellClass() ?>"><div id="elh_store_batchmas_TAXP" class="store_batchmas_TAXP"><?= $Page->renderSort($Page->TAXP) ?></div></th>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <th data-name="OLDRATE" class="<?= $Page->OLDRATE->headerCellClass() ?>"><div id="elh_store_batchmas_OLDRATE" class="store_batchmas_OLDRATE"><?= $Page->renderSort($Page->OLDRATE) ?></div></th>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <th data-name="NEWRATE" class="<?= $Page->NEWRATE->headerCellClass() ?>"><div id="elh_store_batchmas_NEWRATE" class="store_batchmas_NEWRATE"><?= $Page->renderSort($Page->NEWRATE) ?></div></th>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <th data-name="OTEMPMRA" class="<?= $Page->OTEMPMRA->headerCellClass() ?>"><div id="elh_store_batchmas_OTEMPMRA" class="store_batchmas_OTEMPMRA"><?= $Page->renderSort($Page->OTEMPMRA) ?></div></th>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <th data-name="ACTIVESTATUS" class="<?= $Page->ACTIVESTATUS->headerCellClass() ?>"><div id="elh_store_batchmas_ACTIVESTATUS" class="store_batchmas_ACTIVESTATUS"><?= $Page->renderSort($Page->ACTIVESTATUS) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_store_batchmas_id" class="store_batchmas_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_store_batchmas_PrName" class="store_batchmas_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_store_batchmas_PSGST" class="store_batchmas_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_store_batchmas_PCGST" class="store_batchmas_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_store_batchmas_SSGST" class="store_batchmas_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_store_batchmas_SCGST" class="store_batchmas_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_MFRCODE" class="store_batchmas_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_store_batchmas_BRCODE" class="store_batchmas_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_store_batchmas", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RQ->Visible) { // RQ ?>
        <td data-name="RQ" <?= $Page->RQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td data-name="PRCODE" <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td data-name="BATCH" <?= $Page->BATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_BATCH">
<span<?= $Page->BATCH->viewAttributes() ?>>
<?= $Page->BATCH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PC->Visible) { // PC ?>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OLDRT->Visible) { // OLDRT ?>
        <td data-name="OLDRT" <?= $Page->OLDRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OLDRT">
<span<?= $Page->OLDRT->viewAttributes() ?>>
<?= $Page->OLDRT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
        <td data-name="TEMPMRQ" <?= $Page->TEMPMRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_TEMPMRQ">
<span<?= $Page->TEMPMRQ->viewAttributes() ?>>
<?= $Page->TEMPMRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TAXP->Visible) { // TAXP ?>
        <td data-name="TAXP" <?= $Page->TAXP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_TAXP">
<span<?= $Page->TAXP->viewAttributes() ?>>
<?= $Page->TAXP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
        <td data-name="OLDRATE" <?= $Page->OLDRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OLDRATE">
<span<?= $Page->OLDRATE->viewAttributes() ?>>
<?= $Page->OLDRATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
        <td data-name="NEWRATE" <?= $Page->NEWRATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_NEWRATE">
<span<?= $Page->NEWRATE->viewAttributes() ?>>
<?= $Page->NEWRATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
        <td data-name="OTEMPMRA" <?= $Page->OTEMPMRA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_OTEMPMRA">
<span<?= $Page->OTEMPMRA->viewAttributes() ?>>
<?= $Page->OTEMPMRA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
        <td data-name="ACTIVESTATUS" <?= $Page->ACTIVESTATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_ACTIVESTATUS">
<span<?= $Page->ACTIVESTATUS->viewAttributes() ?>>
<?= $Page->ACTIVESTATUS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_batchmas_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
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
    ew.addEventHandlers("store_batchmas");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
