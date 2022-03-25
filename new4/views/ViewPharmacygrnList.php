<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacygrnList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacygrnlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacygrnlist = currentForm = new ew.Form("fview_pharmacygrnlist", "list");
    fview_pharmacygrnlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacygrnlist");
});
var fview_pharmacygrnlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacygrnlistsrch = currentSearchForm = new ew.Form("fview_pharmacygrnlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacygrnlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacygrnlistsrch");
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
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pharmacy_grn") {
    if ($Page->MasterRecordExists) {
        include_once "views/PharmacyGrnMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_pharmacygrnlistsrch" id="fview_pharmacygrnlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacygrnlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacygrn">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacygrn">
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
<form name="fview_pharmacygrnlist" id="fview_pharmacygrnlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacygrn">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_grn" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_grn">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->grnid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_pharmacygrn" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacygrnlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <th data-name="GrnQuantity" class="<?= $Page->GrnQuantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity"><?= $Page->renderSort($Page->GrnQuantity) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Page->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty"><?= $Page->renderSort($Page->FreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <th data-name="FreeQtyyy" class="<?= $Page->FreeQtyyy->headerCellClass() ?>"><div id="elh_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy"><?= $Page->renderSort($Page->FreeQtyyy) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Page->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate"><?= $Page->renderSort($Page->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <th data-name="HSN" class="<?= $Page->HSN->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN"><?= $Page->renderSort($Page->HSN) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Page->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit"><?= $Page->renderSort($Page->PUnit) ?></div></th>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <th data-name="SUnit" class="<?= $Page->SUnit->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit"><?= $Page->renderSort($Page->SUnit) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
        <th data-name="Disc" class="<?= $Page->Disc->headerCellClass() ?>"><div id="elh_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc"><?= $Page->renderSort($Page->Disc) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
        <th data-name="PTax" class="<?= $Page->PTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax"><?= $Page->renderSort($Page->PTax) ?></div></th>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <th data-name="ItemValue" class="<?= $Page->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue"><?= $Page->renderSort($Page->ItemValue) ?></div></th>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
        <th data-name="SalTax" class="<?= $Page->SalTax->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax"><?= $Page->renderSort($Page->SalTax) ?></div></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th data-name="PurRate" class="<?= $Page->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate"><?= $Page->renderSort($Page->PurRate) ?></div></th>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <th data-name="SalRate" class="<?= $Page->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate"><?= $Page->renderSort($Page->SalRate) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <th data-name="grncreatedby" class="<?= $Page->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby"><?= $Page->renderSort($Page->grncreatedby) ?></div></th>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <th data-name="grncreatedDateTime" class="<?= $Page->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime"><?= $Page->renderSort($Page->grncreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <th data-name="grnModifiedby" class="<?= $Page->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby"><?= $Page->renderSort($Page->grnModifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <th data-name="grnModifiedDateTime" class="<?= $Page->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime"><?= $Page->renderSort($Page->grnModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
        <th data-name="grndate" class="<?= $Page->grndate->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate"><?= $Page->renderSort($Page->grndate) ?></div></th>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <th data-name="grndatetime" class="<?= $Page->grndatetime->headerCellClass() ?>"><div id="elh_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime"><?= $Page->renderSort($Page->grndatetime) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacygrn", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <td data-name="GrnQuantity" <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_GrnQuantity">
<span<?= $Page->GrnQuantity->viewAttributes() ?>>
<?= $Page->GrnQuantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy" <?= $Page->FreeQtyyy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_FreeQtyyy">
<span<?= $Page->FreeQtyyy->viewAttributes() ?>>
<?= $Page->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" <?= $Page->SUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Disc->Visible) { // Disc ?>
        <td data-name="Disc" <?= $Page->Disc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_Disc">
<span<?= $Page->Disc->viewAttributes() ?>>
<?= $Page->Disc->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PTax->Visible) { // PTax ?>
        <td data-name="PTax" <?= $Page->PTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PTax">
<span<?= $Page->PTax->viewAttributes() ?>>
<?= $Page->PTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" <?= $Page->ItemValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_ItemValue">
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalTax->Visible) { // SalTax ?>
        <td data-name="SalTax" <?= $Page->SalTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_SalTax">
<span<?= $Page->SalTax->viewAttributes() ?>>
<?= $Page->SalTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" <?= $Page->SalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_SalRate">
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby" <?= $Page->grncreatedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_grncreatedby">
<span<?= $Page->grncreatedby->viewAttributes() ?>>
<?= $Page->grncreatedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime" <?= $Page->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_grncreatedDateTime">
<span<?= $Page->grncreatedDateTime->viewAttributes() ?>>
<?= $Page->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby" <?= $Page->grnModifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_grnModifiedby">
<span<?= $Page->grnModifiedby->viewAttributes() ?>>
<?= $Page->grnModifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime" <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_grnModifiedDateTime">
<span<?= $Page->grnModifiedDateTime->viewAttributes() ?>>
<?= $Page->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grndate->Visible) { // grndate ?>
        <td data-name="grndate" <?= $Page->grndate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_grndate">
<span<?= $Page->grndate->viewAttributes() ?>>
<?= $Page->grndate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime" <?= $Page->grndatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacygrn_grndatetime">
<span<?= $Page->grndatetime->viewAttributes() ?>>
<?= $Page->grndatetime->getViewValue() ?></span>
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
<?php
// Render aggregate row
$Page->RowType = ROWTYPE_AGGREGATE;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->TotalRecords > 0 && !$Page->isGridAdd() && !$Page->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (footer, left)
$Page->ListOptions->render("footer", "left");
?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" class="<?= $Page->PRC->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PRC" class="view_pharmacygrn_PRC">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" class="<?= $Page->PrName->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PrName" class="view_pharmacygrn_PrName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <td data-name="GrnQuantity" class="<?= $Page->GrnQuantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_GrnQuantity" class="view_pharmacygrn_GrnQuantity">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" class="<?= $Page->Quantity->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Quantity" class="view_pharmacygrn_Quantity">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" class="<?= $Page->FreeQty->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQty" class="view_pharmacygrn_FreeQty">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy" class="<?= $Page->FreeQtyyy->footerCellClass() ?>"><span id="elf_view_pharmacygrn_FreeQtyyy" class="view_pharmacygrn_FreeQtyyy">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" class="<?= $Page->BatchNo->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BatchNo" class="view_pharmacygrn_BatchNo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" class="<?= $Page->ExpDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ExpDate" class="view_pharmacygrn_ExpDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" class="<?= $Page->HSN->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HSN" class="view_pharmacygrn_HSN">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" class="<?= $Page->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MFRCODE" class="view_pharmacygrn_MFRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" class="<?= $Page->PUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PUnit" class="view_pharmacygrn_PUnit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" class="<?= $Page->SUnit->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SUnit" class="view_pharmacygrn_SUnit">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" class="<?= $Page->MRP->footerCellClass() ?>"><span id="elf_view_pharmacygrn_MRP" class="view_pharmacygrn_MRP">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" class="<?= $Page->PurValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurValue" class="view_pharmacygrn_PurValue">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Disc->Visible) { // Disc ?>
        <td data-name="Disc" class="<?= $Page->Disc->footerCellClass() ?>"><span id="elf_view_pharmacygrn_Disc" class="view_pharmacygrn_Disc">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" class="<?= $Page->PSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PSGST" class="view_pharmacygrn_PSGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" class="<?= $Page->PCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PCGST" class="view_pharmacygrn_PCGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PTax->Visible) { // PTax ?>
        <td data-name="PTax" class="<?= $Page->PTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PTax" class="view_pharmacygrn_PTax">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->PTax->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" class="<?= $Page->ItemValue->footerCellClass() ?>"><span id="elf_view_pharmacygrn_ItemValue" class="view_pharmacygrn_ItemValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->ItemValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->SalTax->Visible) { // SalTax ?>
        <td data-name="SalTax" class="<?= $Page->SalTax->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalTax" class="view_pharmacygrn_SalTax">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SalTax->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" class="<?= $Page->PurRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_PurRate" class="view_pharmacygrn_PurRate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" class="<?= $Page->SalRate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SalRate" class="view_pharmacygrn_SalRate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" class="<?= $Page->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SSGST" class="view_pharmacygrn_SSGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" class="<?= $Page->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacygrn_SCGST" class="view_pharmacygrn_SCGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" class="<?= $Page->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BRCODE" class="view_pharmacygrn_BRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Page->HospID->footerCellClass() ?>"><span id="elf_view_pharmacygrn_HospID" class="view_pharmacygrn_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby" class="<?= $Page->grncreatedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedby" class="view_pharmacygrn_grncreatedby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime" class="<?= $Page->grncreatedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grncreatedDateTime" class="view_pharmacygrn_grncreatedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby" class="<?= $Page->grnModifiedby->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedby" class="view_pharmacygrn_grnModifiedby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime" class="<?= $Page->grnModifiedDateTime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grnModifiedDateTime" class="view_pharmacygrn_grnModifiedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" class="<?= $Page->BillDate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_BillDate" class="view_pharmacygrn_BillDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->grndate->Visible) { // grndate ?>
        <td data-name="grndate" class="<?= $Page->grndate->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grndate" class="view_pharmacygrn_grndate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime" class="<?= $Page->grndatetime->footerCellClass() ?>"><span id="elf_view_pharmacygrn_grndatetime" class="view_pharmacygrn_grndatetime">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
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
    ew.addEventHandlers("view_pharmacygrn");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    $("[data-name='Quantity']").hide();
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_pharmacygrn",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
