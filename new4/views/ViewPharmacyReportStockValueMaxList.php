<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyReportStockValueMaxList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_report_stock_value_maxlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_report_stock_value_maxlist = currentForm = new ew.Form("fview_pharmacy_report_stock_value_maxlist", "list");
    fview_pharmacy_report_stock_value_maxlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_report_stock_value_maxlist");
});
var fview_pharmacy_report_stock_value_maxlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_report_stock_value_maxlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_stock_value_maxlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_report_stock_value_maxlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_report_stock_value_maxlistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
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
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_pharmacy_report_stock_value_maxlistsrch" id="fview_pharmacy_report_stock_value_maxlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_report_stock_value_maxlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value_max">
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
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_stock_value_max">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_pharmacy_report_stock_value_maxlist" id="fview_pharmacy_report_stock_value_maxlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_stock_value_max">
<div id="gmp_view_pharmacy_report_stock_value_max" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_stock_value_maxlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->prc->Visible) { // prc ?>
        <th data-name="prc" class="<?= $Page->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_prc" class="view_pharmacy_report_stock_value_max_prc"><?= $Page->renderSort($Page->prc) ?></div></th>
<?php } ?>
<?php if ($Page->batchno->Visible) { // batchno ?>
        <th data-name="batchno" class="<?= $Page->batchno->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_batchno" class="view_pharmacy_report_stock_value_max_batchno"><?= $Page->renderSort($Page->batchno) ?></div></th>
<?php } ?>
<?php if ($Page->mrp->Visible) { // mrp ?>
        <th data-name="mrp" class="<?= $Page->mrp->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_mrp" class="view_pharmacy_report_stock_value_max_mrp"><?= $Page->renderSort($Page->mrp) ?></div></th>
<?php } ?>
<?php if ($Page->purvalue->Visible) { // purvalue ?>
        <th data-name="purvalue" class="<?= $Page->purvalue->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_purvalue" class="view_pharmacy_report_stock_value_max_purvalue"><?= $Page->renderSort($Page->purvalue) ?></div></th>
<?php } ?>
<?php if ($Page->hospid->Visible) { // hospid ?>
        <th data-name="hospid" class="<?= $Page->hospid->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_hospid" class="view_pharmacy_report_stock_value_max_hospid"><?= $Page->renderSort($Page->hospid) ?></div></th>
<?php } ?>
<?php if ($Page->punit->Visible) { // punit ?>
        <th data-name="punit" class="<?= $Page->punit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_punit" class="view_pharmacy_report_stock_value_max_punit"><?= $Page->renderSort($Page->punit) ?></div></th>
<?php } ?>
<?php if ($Page->brcode->Visible) { // brcode ?>
        <th data-name="brcode" class="<?= $Page->brcode->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_max_brcode" class="view_pharmacy_report_stock_value_max_brcode"><?= $Page->renderSort($Page->brcode) ?></div></th>
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
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_report_stock_value_max", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->prc->Visible) { // prc ?>
        <td data-name="prc" <?= $Page->prc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_max_prc">
<span<?= $Page->prc->viewAttributes() ?>>
<?= $Page->prc->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->batchno->Visible) { // batchno ?>
        <td data-name="batchno" <?= $Page->batchno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_max_batchno">
<span<?= $Page->batchno->viewAttributes() ?>>
<?= $Page->batchno->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mrp->Visible) { // mrp ?>
        <td data-name="mrp" <?= $Page->mrp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_max_mrp">
<span<?= $Page->mrp->viewAttributes() ?>>
<?= $Page->mrp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->purvalue->Visible) { // purvalue ?>
        <td data-name="purvalue" <?= $Page->purvalue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_max_purvalue">
<span<?= $Page->purvalue->viewAttributes() ?>>
<?= $Page->purvalue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hospid->Visible) { // hospid ?>
        <td data-name="hospid" <?= $Page->hospid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_max_hospid">
<span<?= $Page->hospid->viewAttributes() ?>>
<?= $Page->hospid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->punit->Visible) { // punit ?>
        <td data-name="punit" <?= $Page->punit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_max_punit">
<span<?= $Page->punit->viewAttributes() ?>>
<?= $Page->punit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->brcode->Visible) { // brcode ?>
        <td data-name="brcode" <?= $Page->brcode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_max_brcode">
<span<?= $Page->brcode->viewAttributes() ?>>
<?= $Page->brcode->getViewValue() ?></span>
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
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
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
    ew.addEventHandlers("view_pharmacy_report_stock_value_max");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_pharmacy_report_stock_value_max",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
