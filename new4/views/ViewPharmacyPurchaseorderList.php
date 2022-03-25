<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseorderList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchaseorderlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_purchaseorderlist = currentForm = new ew.Form("fview_pharmacy_purchaseorderlist", "list");
    fview_pharmacy_purchaseorderlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_purchaseorderlist");
});
var fview_pharmacy_purchaseorderlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_purchaseorderlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_purchaseorderlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_purchaseorderlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_purchaseorderlistsrch");
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
<form name="fview_pharmacy_purchaseorderlistsrch" id="fview_pharmacy_purchaseorderlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_purchaseorderlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_purchaseorder">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchaseorder">
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
<form name="fview_pharmacy_purchaseorderlist" id="fview_pharmacy_purchaseorderlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchaseorder">
<div id="gmp_view_pharmacy_purchaseorder" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_purchaseorderlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_HospID" class="view_pharmacy_purchaseorder_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_PRC" class="view_pharmacy_purchaseorder_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_BRCODE" class="view_pharmacy_purchaseorder_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_PSGST" class="view_pharmacy_purchaseorder_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_PCGST" class="view_pharmacy_purchaseorder_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_SSGST" class="view_pharmacy_purchaseorder_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_SCGST" class="view_pharmacy_purchaseorder_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <th data-name="HSN" class="<?= $Page->HSN->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_HSN" class="view_pharmacy_purchaseorder_HSN"><?= $Page->renderSort($Page->HSN) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_BatchNo" class="view_pharmacy_purchaseorder_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <th data-name="SalRate" class="<?= $Page->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_SalRate" class="view_pharmacy_purchaseorder_SalRate"><?= $Page->renderSort($Page->SalRate) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_PurValue" class="view_pharmacy_purchaseorder_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Page->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacy_purchaseorder_PUnit" class="view_pharmacy_purchaseorder_PUnit"><?= $Page->renderSort($Page->PUnit) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_purchaseorder", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" <?= $Page->SalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_SalRate">
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchaseorder_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
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
    ew.addEventHandlers("view_pharmacy_purchaseorder");
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
        container: "gmp_view_pharmacy_purchaseorder",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
