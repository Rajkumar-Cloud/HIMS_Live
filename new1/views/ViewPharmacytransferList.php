<?php

namespace PHPMaker2021\project3;

// Page object
$ViewPharmacytransferList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacytransferlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacytransferlist = currentForm = new ew.Form("fview_pharmacytransferlist", "list");
    fview_pharmacytransferlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacytransferlist");
});
var fview_pharmacytransferlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacytransferlistsrch = currentSearchForm = new ew.Form("fview_pharmacytransferlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacytransferlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacytransferlistsrch");
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
<form name="fview_pharmacytransferlistsrch" id="fview_pharmacytransferlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_pharmacytransferlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacytransfer">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacytransfer">
<form name="fview_pharmacytransferlist" id="fview_pharmacytransferlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<div id="gmp_view_pharmacytransfer" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacytransferlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <th data-name="ORDNO" class="<?= $Page->ORDNO->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ORDNO" class="view_pharmacytransfer_ORDNO"><?= $Page->renderSort($Page->ORDNO) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PRC" class="view_pharmacytransfer_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <th data-name="QTY" class="<?= $Page->QTY->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_QTY" class="view_pharmacytransfer_QTY"><?= $Page->renderSort($Page->QTY) ?></div></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Page->DT->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_DT" class="view_pharmacytransfer_DT"><?= $Page->renderSort($Page->DT) ?></div></th>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
        <th data-name="PC" class="<?= $Page->PC->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PC" class="view_pharmacytransfer_PC"><?= $Page->renderSort($Page->PC) ?></div></th>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
        <th data-name="YM" class="<?= $Page->YM->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_YM" class="view_pharmacytransfer_YM"><?= $Page->renderSort($Page->YM) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_MFRCODE" class="view_pharmacytransfer_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <th data-name="Stock" class="<?= $Page->Stock->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Stock" class="view_pharmacytransfer_Stock"><?= $Page->renderSort($Page->Stock) ?></div></th>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <th data-name="LastMonthSale" class="<?= $Page->LastMonthSale->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_LastMonthSale" class="view_pharmacytransfer_LastMonthSale"><?= $Page->renderSort($Page->LastMonthSale) ?></div></th>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
        <th data-name="Printcheck" class="<?= $Page->Printcheck->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Printcheck" class="view_pharmacytransfer_Printcheck"><?= $Page->renderSort($Page->Printcheck) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_id" class="view_pharmacytransfer_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
        <th data-name="poid" class="<?= $Page->poid->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_poid" class="view_pharmacytransfer_poid"><?= $Page->renderSort($Page->poid) ?></div></th>
<?php } ?>
<?php if ($Page->grnid->Visible) { // grnid ?>
        <th data-name="grnid" class="<?= $Page->grnid->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnid" class="view_pharmacytransfer_grnid"><?= $Page->renderSort($Page->grnid) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BatchNo" class="view_pharmacytransfer_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Page->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ExpDate" class="view_pharmacytransfer_ExpDate"><?= $Page->renderSort($Page->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PrName" class="view_pharmacytransfer_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Quantity" class="view_pharmacytransfer_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Page->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_FreeQty" class="view_pharmacytransfer_FreeQty"><?= $Page->renderSort($Page->FreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <th data-name="ItemValue" class="<?= $Page->ItemValue->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ItemValue" class="view_pharmacytransfer_ItemValue"><?= $Page->renderSort($Page->ItemValue) ?></div></th>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
        <th data-name="Disc" class="<?= $Page->Disc->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Disc" class="view_pharmacytransfer_Disc"><?= $Page->renderSort($Page->Disc) ?></div></th>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
        <th data-name="PTax" class="<?= $Page->PTax->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PTax" class="view_pharmacytransfer_PTax"><?= $Page->renderSort($Page->PTax) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_MRP" class="view_pharmacytransfer_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
        <th data-name="SalTax" class="<?= $Page->SalTax->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_SalTax" class="view_pharmacytransfer_SalTax"><?= $Page->renderSort($Page->SalTax) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PurValue" class="view_pharmacytransfer_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th data-name="PurRate" class="<?= $Page->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PurRate" class="view_pharmacytransfer_PurRate"><?= $Page->renderSort($Page->PurRate) ?></div></th>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <th data-name="SalRate" class="<?= $Page->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_SalRate" class="view_pharmacytransfer_SalRate"><?= $Page->renderSort($Page->SalRate) ?></div></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th data-name="Discount" class="<?= $Page->Discount->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Discount" class="view_pharmacytransfer_Discount"><?= $Page->renderSort($Page->Discount) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PSGST" class="view_pharmacytransfer_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PCGST" class="view_pharmacytransfer_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_SSGST" class="view_pharmacytransfer_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_SCGST" class="view_pharmacytransfer_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BRCODE" class="view_pharmacytransfer_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <th data-name="HSN" class="<?= $Page->HSN->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_HSN" class="view_pharmacytransfer_HSN"><?= $Page->renderSort($Page->HSN) ?></div></th>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
        <th data-name="Pack" class="<?= $Page->Pack->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Pack" class="view_pharmacytransfer_Pack"><?= $Page->renderSort($Page->Pack) ?></div></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Page->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_PUnit" class="view_pharmacytransfer_PUnit"><?= $Page->renderSort($Page->PUnit) ?></div></th>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <th data-name="SUnit" class="<?= $Page->SUnit->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_SUnit" class="view_pharmacytransfer_SUnit"><?= $Page->renderSort($Page->SUnit) ?></div></th>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <th data-name="GrnQuantity" class="<?= $Page->GrnQuantity->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_GrnQuantity" class="view_pharmacytransfer_GrnQuantity"><?= $Page->renderSort($Page->GrnQuantity) ?></div></th>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
        <th data-name="GrnMRP" class="<?= $Page->GrnMRP->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_GrnMRP" class="view_pharmacytransfer_GrnMRP"><?= $Page->renderSort($Page->GrnMRP) ?></div></th>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
        <th data-name="trid" class="<?= $Page->trid->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_trid" class="view_pharmacytransfer_trid"><?= $Page->renderSort($Page->trid) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_HospID" class="view_pharmacytransfer_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_CreatedBy" class="view_pharmacytransfer_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_CreatedDateTime" class="view_pharmacytransfer_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ModifiedBy" class="view_pharmacytransfer_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_ModifiedDateTime" class="view_pharmacytransfer_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <th data-name="grncreatedby" class="<?= $Page->grncreatedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedby" class="view_pharmacytransfer_grncreatedby"><?= $Page->renderSort($Page->grncreatedby) ?></div></th>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <th data-name="grncreatedDateTime" class="<?= $Page->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grncreatedDateTime" class="view_pharmacytransfer_grncreatedDateTime"><?= $Page->renderSort($Page->grncreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <th data-name="grnModifiedby" class="<?= $Page->grnModifiedby->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedby" class="view_pharmacytransfer_grnModifiedby"><?= $Page->renderSort($Page->grnModifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <th data-name="grnModifiedDateTime" class="<?= $Page->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_grnModifiedDateTime" class="view_pharmacytransfer_grnModifiedDateTime"><?= $Page->renderSort($Page->grnModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
        <th data-name="Received" class="<?= $Page->Received->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_Received" class="view_pharmacytransfer_Received"><?= $Page->renderSort($Page->Received) ?></div></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_BillDate" class="view_pharmacytransfer_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <th data-name="CurStock" class="<?= $Page->CurStock->headerCellClass() ?>"><div id="elh_view_pharmacytransfer_CurStock" class="view_pharmacytransfer_CurStock"><?= $Page->renderSort($Page->CurStock) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacytransfer", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <td data-name="ORDNO" <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->QTY->Visible) { // QTY ?>
        <td data-name="QTY" <?= $Page->QTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_QTY">
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PC->Visible) { // PC ?>
        <td data-name="PC" <?= $Page->PC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PC">
<span<?= $Page->PC->viewAttributes() ?>>
<?= $Page->PC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->YM->Visible) { // YM ?>
        <td data-name="YM" <?= $Page->YM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_YM">
<span<?= $Page->YM->viewAttributes() ?>>
<?= $Page->YM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Stock->Visible) { // Stock ?>
        <td data-name="Stock" <?= $Page->Stock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale" <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_LastMonthSale">
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Printcheck->Visible) { // Printcheck ?>
        <td data-name="Printcheck" <?= $Page->Printcheck->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Printcheck">
<span<?= $Page->Printcheck->viewAttributes() ?>>
<?= $Page->Printcheck->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->poid->Visible) { // poid ?>
        <td data-name="poid" <?= $Page->poid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_poid">
<span<?= $Page->poid->viewAttributes() ?>>
<?= $Page->poid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grnid->Visible) { // grnid ?>
        <td data-name="grnid" <?= $Page->grnid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grnid">
<span<?= $Page->grnid->viewAttributes() ?>>
<?= $Page->grnid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" <?= $Page->ItemValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ItemValue">
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Disc->Visible) { // Disc ?>
        <td data-name="Disc" <?= $Page->Disc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Disc">
<span<?= $Page->Disc->viewAttributes() ?>>
<?= $Page->Disc->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PTax->Visible) { // PTax ?>
        <td data-name="PTax" <?= $Page->PTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PTax">
<span<?= $Page->PTax->viewAttributes() ?>>
<?= $Page->PTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalTax->Visible) { // SalTax ?>
        <td data-name="SalTax" <?= $Page->SalTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_SalTax">
<span<?= $Page->SalTax->viewAttributes() ?>>
<?= $Page->SalTax->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" <?= $Page->SalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_SalRate">
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Discount->Visible) { // Discount ?>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pack->Visible) { // Pack ?>
        <td data-name="Pack" <?= $Page->Pack->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Pack">
<span<?= $Page->Pack->viewAttributes() ?>>
<?= $Page->Pack->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" <?= $Page->SUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <td data-name="GrnQuantity" <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_GrnQuantity">
<span<?= $Page->GrnQuantity->viewAttributes() ?>>
<?= $Page->GrnQuantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
        <td data-name="GrnMRP" <?= $Page->GrnMRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_GrnMRP">
<span<?= $Page->GrnMRP->viewAttributes() ?>>
<?= $Page->GrnMRP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->trid->Visible) { // trid ?>
        <td data-name="trid" <?= $Page->trid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_trid">
<span<?= $Page->trid->viewAttributes() ?>>
<?= $Page->trid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby" <?= $Page->grncreatedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grncreatedby">
<span<?= $Page->grncreatedby->viewAttributes() ?>>
<?= $Page->grncreatedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime" <?= $Page->grncreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grncreatedDateTime">
<span<?= $Page->grncreatedDateTime->viewAttributes() ?>>
<?= $Page->grncreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby" <?= $Page->grnModifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grnModifiedby">
<span<?= $Page->grnModifiedby->viewAttributes() ?>>
<?= $Page->grnModifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime" <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_grnModifiedDateTime">
<span<?= $Page->grnModifiedDateTime->viewAttributes() ?>>
<?= $Page->grnModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Received->Visible) { // Received ?>
        <td data-name="Received" <?= $Page->Received->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_Received">
<span<?= $Page->Received->viewAttributes() ?>>
<?= $Page->Received->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock" <?= $Page->CurStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacytransfer_CurStock">
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
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
    ew.addEventHandlers("view_pharmacytransfer");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
