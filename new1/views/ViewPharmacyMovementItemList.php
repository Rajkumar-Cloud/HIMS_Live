<?php

namespace PHPMaker2021\project3;

// Page object
$ViewPharmacyMovementItemList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_movement_itemlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_movement_itemlist = currentForm = new ew.Form("fview_pharmacy_movement_itemlist", "list");
    fview_pharmacy_movement_itemlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_movement_itemlist");
});
var fview_pharmacy_movement_itemlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_movement_itemlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_movement_itemlistsrch");

    // Dynamic selection lists

    // Filters
    fview_pharmacy_movement_itemlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_movement_itemlistsrch");
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
<form name="fview_pharmacy_movement_itemlistsrch" id="fview_pharmacy_movement_itemlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_pharmacy_movement_itemlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_movement_item">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_movement_item">
<form name="fview_pharmacy_movement_itemlist" id="fview_pharmacy_movement_itemlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_movement_item">
<div id="gmp_view_pharmacy_movement_item" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_movement_itemlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->ProductFrom->Visible) { // ProductFrom ?>
        <th data-name="ProductFrom" class="<?= $Page->ProductFrom->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ProductFrom" class="view_pharmacy_movement_item_ProductFrom"><?= $Page->renderSort($Page->ProductFrom) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Quantity" class="view_pharmacy_movement_item_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Page->FreeQty->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_FreeQty" class="view_pharmacy_movement_item_FreeQty"><?= $Page->renderSort($Page->FreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IQ" class="view_pharmacy_movement_item_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Page->MRQ->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MRQ" class="view_pharmacy_movement_item_MRQ"><?= $Page->renderSort($Page->MRQ) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BRCODE" class="view_pharmacy_movement_item_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <th data-name="OPNO" class="<?= $Page->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_OPNO" class="view_pharmacy_movement_item_OPNO"><?= $Page->renderSort($Page->OPNO) ?></div></th>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <th data-name="IPNO" class="<?= $Page->IPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_IPNO" class="view_pharmacy_movement_item_IPNO"><?= $Page->renderSort($Page->IPNO) ?></div></th>
<?php } ?>
<?php if ($Page->PatientBILLNO->Visible) { // PatientBILLNO ?>
        <th data-name="PatientBILLNO" class="<?= $Page->PatientBILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PatientBILLNO" class="view_pharmacy_movement_item_PatientBILLNO"><?= $Page->renderSort($Page->PatientBILLNO) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <th data-name="BILLDT" class="<?= $Page->BILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLDT" class="view_pharmacy_movement_item_BILLDT"><?= $Page->renderSort($Page->BILLDT) ?></div></th>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <th data-name="GRNNO" class="<?= $Page->GRNNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_GRNNO" class="view_pharmacy_movement_item_GRNNO"><?= $Page->renderSort($Page->GRNNO) ?></div></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Page->DT->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_DT" class="view_pharmacy_movement_item_DT"><?= $Page->renderSort($Page->DT) ?></div></th>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Page->Customername->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_Customername" class="view_pharmacy_movement_item_Customername"><?= $Page->renderSort($Page->Customername) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createdby" class="view_pharmacy_movement_item_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_createddatetime" class="view_pharmacy_movement_item_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifiedby" class="view_pharmacy_movement_item_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_modifieddatetime" class="view_pharmacy_movement_item_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th data-name="BILLNO" class="<?= $Page->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BILLNO" class="view_pharmacy_movement_item_BILLNO"><?= $Page->renderSort($Page->BILLNO) ?></div></th>
<?php } ?>
<?php if ($Page->prc->Visible) { // prc ?>
        <th data-name="prc" class="<?= $Page->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_prc" class="view_pharmacy_movement_item_prc"><?= $Page->renderSort($Page->prc) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_PrName" class="view_pharmacy_movement_item_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_BatchNo" class="view_pharmacy_movement_item_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Page->ExpDate->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_ExpDate" class="view_pharmacy_movement_item_ExpDate"><?= $Page->renderSort($Page->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_MFRCODE" class="view_pharmacy_movement_item_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->hsn->Visible) { // hsn ?>
        <th data-name="hsn" class="<?= $Page->hsn->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_hsn" class="view_pharmacy_movement_item_hsn"><?= $Page->renderSort($Page->hsn) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_movement_item_HospID" class="view_pharmacy_movement_item_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_movement_item", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->ProductFrom->Visible) { // ProductFrom ?>
        <td data-name="ProductFrom" <?= $Page->ProductFrom->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_ProductFrom">
<span<?= $Page->ProductFrom->viewAttributes() ?>>
<?= $Page->ProductFrom->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPNO->Visible) { // OPNO ?>
        <td data-name="OPNO" <?= $Page->OPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_OPNO">
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IPNO->Visible) { // IPNO ?>
        <td data-name="IPNO" <?= $Page->IPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_IPNO">
<span<?= $Page->IPNO->viewAttributes() ?>>
<?= $Page->IPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientBILLNO->Visible) { // PatientBILLNO ?>
        <td data-name="PatientBILLNO" <?= $Page->PatientBILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_PatientBILLNO">
<span<?= $Page->PatientBILLNO->viewAttributes() ?>>
<?= $Page->PatientBILLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_BILLDT">
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO" <?= $Page->GRNNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_GRNNO">
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Page->Customername->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_Customername">
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->prc->Visible) { // prc ?>
        <td data-name="prc" <?= $Page->prc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_prc">
<span<?= $Page->prc->viewAttributes() ?>>
<?= $Page->prc->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hsn->Visible) { // hsn ?>
        <td data-name="hsn" <?= $Page->hsn->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_hsn">
<span<?= $Page->hsn->viewAttributes() ?>>
<?= $Page->hsn->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_movement_item_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_pharmacy_movement_item");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
