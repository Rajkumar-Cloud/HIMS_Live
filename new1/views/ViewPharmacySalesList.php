<?php

namespace PHPMaker2021\project3;

// Page object
$ViewPharmacySalesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_saleslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_saleslist = currentForm = new ew.Form("fview_pharmacy_saleslist", "list");
    fview_pharmacy_saleslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_saleslist");
});
var fview_pharmacy_saleslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_saleslistsrch = currentSearchForm = new ew.Form("fview_pharmacy_saleslistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_saleslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_saleslistsrch");
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
<form name="fview_pharmacy_saleslistsrch" id="fview_pharmacy_saleslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_pharmacy_saleslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_sales">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_sales">
<form name="fview_pharmacy_saleslist" id="fview_pharmacy_saleslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_sales">
<div id="gmp_view_pharmacy_sales" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_saleslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <th data-name="SiNo" class="<?= $Page->SiNo->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SiNo" class="view_pharmacy_sales_SiNo"><?= $Page->renderSort($Page->SiNo) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PRC" class="view_pharmacy_sales_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BATCHNO" class="view_pharmacy_sales_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_EXPDT" class="view_pharmacy_sales_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <th data-name="Mfg" class="<?= $Page->Mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Mfg" class="view_pharmacy_sales_Mfg"><?= $Page->renderSort($Page->Mfg) ?></div></th>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <th data-name="HSN" class="<?= $Page->HSN->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN"><?= $Page->renderSort($Page->HSN) ?></div></th>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <th data-name="IPNO" class="<?= $Page->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_IPNO" class="view_pharmacy_sales_IPNO"><?= $Page->renderSort($Page->IPNO) ?></div></th>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <th data-name="OPNO" class="<?= $Page->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO"><?= $Page->renderSort($Page->OPNO) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_RT" class="view_pharmacy_sales_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th data-name="DAMT" class="<?= $Page->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT"><?= $Page->renderSort($Page->DAMT) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th data-name="BILLDT" class="<?= $Page->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BILLDT" class="view_pharmacy_sales_BILLDT"><?= $Page->renderSort($Page->BILLDT) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BRCODE" class="view_pharmacy_sales_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PSGST" class="view_pharmacy_sales_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PCGST" class="view_pharmacy_sales_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PurValue" class="view_pharmacy_sales_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <th data-name="SalRate" class="<?= $Page->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate"><?= $Page->renderSort($Page->SalRate) ?></div></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th data-name="PurRate" class="<?= $Page->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PurRate" class="view_pharmacy_sales_PurRate"><?= $Page->renderSort($Page->PurRate) ?></div></th>
<?php } ?>
<?php if ($Page->PAMT->Visible) { // PAMT ?>
        <th data-name="PAMT" class="<?= $Page->PAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PAMT" class="view_pharmacy_sales_PAMT"><?= $Page->renderSort($Page->PAMT) ?></div></th>
<?php } ?>
<?php if ($Page->PSGSTAmount->Visible) { // PSGSTAmount ?>
        <th data-name="PSGSTAmount" class="<?= $Page->PSGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PSGSTAmount" class="view_pharmacy_sales_PSGSTAmount"><?= $Page->renderSort($Page->PSGSTAmount) ?></div></th>
<?php } ?>
<?php if ($Page->PCGSTAmount->Visible) { // PCGSTAmount ?>
        <th data-name="PCGSTAmount" class="<?= $Page->PCGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_PCGSTAmount" class="view_pharmacy_sales_PCGSTAmount"><?= $Page->renderSort($Page->PCGSTAmount) ?></div></th>
<?php } ?>
<?php if ($Page->SSGSTAmount->Visible) { // SSGSTAmount ?>
        <th data-name="SSGSTAmount" class="<?= $Page->SSGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount"><?= $Page->renderSort($Page->SSGSTAmount) ?></div></th>
<?php } ?>
<?php if ($Page->SCGSTAmount->Visible) { // SCGSTAmount ?>
        <th data-name="SCGSTAmount" class="<?= $Page->SCGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount"><?= $Page->renderSort($Page->SCGSTAmount) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_sales", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SiNo->Visible) { // SiNo ?>
        <td data-name="SiNo" <?= $Page->SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SiNo">
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mfg->Visible) { // Mfg ?>
        <td data-name="Mfg" <?= $Page->Mfg->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_Mfg">
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IPNO->Visible) { // IPNO ?>
        <td data-name="IPNO" <?= $Page->IPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_IPNO">
<span<?= $Page->IPNO->viewAttributes() ?>>
<?= $Page->IPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPNO->Visible) { // OPNO ?>
        <td data-name="OPNO" <?= $Page->OPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_OPNO">
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" <?= $Page->DAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" <?= $Page->SalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SalRate">
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAMT->Visible) { // PAMT ?>
        <td data-name="PAMT" <?= $Page->PAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PAMT">
<span<?= $Page->PAMT->viewAttributes() ?>>
<?= $Page->PAMT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGSTAmount->Visible) { // PSGSTAmount ?>
        <td data-name="PSGSTAmount" <?= $Page->PSGSTAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PSGSTAmount">
<span<?= $Page->PSGSTAmount->viewAttributes() ?>>
<?= $Page->PSGSTAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGSTAmount->Visible) { // PCGSTAmount ?>
        <td data-name="PCGSTAmount" <?= $Page->PCGSTAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_PCGSTAmount">
<span<?= $Page->PCGSTAmount->viewAttributes() ?>>
<?= $Page->PCGSTAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGSTAmount->Visible) { // SSGSTAmount ?>
        <td data-name="SSGSTAmount" <?= $Page->SSGSTAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SSGSTAmount">
<span<?= $Page->SSGSTAmount->viewAttributes() ?>>
<?= $Page->SSGSTAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGSTAmount->Visible) { // SCGSTAmount ?>
        <td data-name="SCGSTAmount" <?= $Page->SCGSTAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SCGSTAmount">
<span<?= $Page->SCGSTAmount->viewAttributes() ?>>
<?= $Page->SCGSTAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_pharmacy_sales");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
