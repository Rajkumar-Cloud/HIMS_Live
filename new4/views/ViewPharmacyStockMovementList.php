<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyStockMovementList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_stock_movementlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_stock_movementlist = currentForm = new ew.Form("fview_pharmacy_stock_movementlist", "list");
    fview_pharmacy_stock_movementlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_stock_movementlist");
});
var fview_pharmacy_stock_movementlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_stock_movementlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_stock_movementlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_stock_movementlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_stock_movementlistsrch");
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
<form name="fview_pharmacy_stock_movementlistsrch" id="fview_pharmacy_stock_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_stock_movementlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_stock_movement">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_stock_movement">
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
<form name="fview_pharmacy_stock_movementlist" id="fview_pharmacy_stock_movementlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_stock_movement">
<div id="gmp_view_pharmacy_stock_movement" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_stock_movementlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_id" class="view_pharmacy_stock_movement_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PRC" class="view_pharmacy_stock_movement_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PrName" class="view_pharmacy_stock_movement_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <th data-name="OpeningStk" class="<?= $Page->OpeningStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_OpeningStk" class="view_pharmacy_stock_movement_OpeningStk"><?= $Page->renderSort($Page->OpeningStk) ?></div></th>
<?php } ?>
<?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <th data-name="PurchaseQty" class="<?= $Page->PurchaseQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PurchaseQty" class="view_pharmacy_stock_movement_PurchaseQty"><?= $Page->renderSort($Page->PurchaseQty) ?></div></th>
<?php } ?>
<?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <th data-name="SalesQty" class="<?= $Page->SalesQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_SalesQty" class="view_pharmacy_stock_movement_SalesQty"><?= $Page->renderSort($Page->SalesQty) ?></div></th>
<?php } ?>
<?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <th data-name="ClosingStk" class="<?= $Page->ClosingStk->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_ClosingStk" class="view_pharmacy_stock_movement_ClosingStk"><?= $Page->renderSort($Page->ClosingStk) ?></div></th>
<?php } ?>
<?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <th data-name="PurchasefreeQty" class="<?= $Page->PurchasefreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_PurchasefreeQty" class="view_pharmacy_stock_movement_PurchasefreeQty"><?= $Page->renderSort($Page->PurchasefreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <th data-name="TransferingQty" class="<?= $Page->TransferingQty->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_TransferingQty" class="view_pharmacy_stock_movement_TransferingQty"><?= $Page->renderSort($Page->TransferingQty) ?></div></th>
<?php } ?>
<?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <th data-name="UnitPurchaseRate" class="<?= $Page->UnitPurchaseRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_UnitPurchaseRate" class="view_pharmacy_stock_movement_UnitPurchaseRate"><?= $Page->renderSort($Page->UnitPurchaseRate) ?></div></th>
<?php } ?>
<?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <th data-name="UnitSaleRate" class="<?= $Page->UnitSaleRate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_UnitSaleRate" class="view_pharmacy_stock_movement_UnitSaleRate"><?= $Page->renderSort($Page->UnitSaleRate) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <th data-name="CreatedDate" class="<?= $Page->CreatedDate->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_CreatedDate" class="view_pharmacy_stock_movement_CreatedDate"><?= $Page->renderSort($Page->CreatedDate) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_HospID" class="view_pharmacy_stock_movement_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_movement_BRCODE" class="view_pharmacy_stock_movement_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_stock_movement", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OpeningStk->Visible) { // OpeningStk ?>
        <td data-name="OpeningStk" <?= $Page->OpeningStk->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_OpeningStk">
<span<?= $Page->OpeningStk->viewAttributes() ?>>
<?= $Page->OpeningStk->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchaseQty->Visible) { // PurchaseQty ?>
        <td data-name="PurchaseQty" <?= $Page->PurchaseQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_PurchaseQty">
<span<?= $Page->PurchaseQty->viewAttributes() ?>>
<?= $Page->PurchaseQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalesQty->Visible) { // SalesQty ?>
        <td data-name="SalesQty" <?= $Page->SalesQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_SalesQty">
<span<?= $Page->SalesQty->viewAttributes() ?>>
<?= $Page->SalesQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ClosingStk->Visible) { // ClosingStk ?>
        <td data-name="ClosingStk" <?= $Page->ClosingStk->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_ClosingStk">
<span<?= $Page->ClosingStk->viewAttributes() ?>>
<?= $Page->ClosingStk->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchasefreeQty->Visible) { // PurchasefreeQty ?>
        <td data-name="PurchasefreeQty" <?= $Page->PurchasefreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_PurchasefreeQty">
<span<?= $Page->PurchasefreeQty->viewAttributes() ?>>
<?= $Page->PurchasefreeQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferingQty->Visible) { // TransferingQty ?>
        <td data-name="TransferingQty" <?= $Page->TransferingQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_TransferingQty">
<span<?= $Page->TransferingQty->viewAttributes() ?>>
<?= $Page->TransferingQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitPurchaseRate->Visible) { // UnitPurchaseRate ?>
        <td data-name="UnitPurchaseRate" <?= $Page->UnitPurchaseRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_UnitPurchaseRate">
<span<?= $Page->UnitPurchaseRate->viewAttributes() ?>>
<?= $Page->UnitPurchaseRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitSaleRate->Visible) { // UnitSaleRate ?>
        <td data-name="UnitSaleRate" <?= $Page->UnitSaleRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_UnitSaleRate">
<span<?= $Page->UnitSaleRate->viewAttributes() ?>>
<?= $Page->UnitSaleRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td data-name="CreatedDate" <?= $Page->CreatedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_movement_BRCODE">
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
    ew.addEventHandlers("view_pharmacy_stock_movement");
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
        container: "gmp_view_pharmacy_stock_movement",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
