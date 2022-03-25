<?php

namespace PHPMaker2021\project3;

// Page object
$ViewLabServiceList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_lab_servicelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_lab_servicelist = currentForm = new ew.Form("fview_lab_servicelist", "list");
    fview_lab_servicelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_lab_servicelist");
});
var fview_lab_servicelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_lab_servicelistsrch = currentSearchForm = new ew.Form("fview_lab_servicelistsrch");

    // Dynamic selection lists

    // Filters
    fview_lab_servicelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_lab_servicelistsrch");
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
<form name="fview_lab_servicelistsrch" id="fview_lab_servicelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_lab_servicelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_service">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_service">
<form name="fview_lab_servicelist" id="fview_lab_servicelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_service">
<div id="gmp_view_lab_service" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_lab_servicelist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Id->Visible) { // Id ?>
        <th data-name="Id" class="<?= $Page->Id->headerCellClass() ?>"><div id="elh_view_lab_service_Id" class="view_lab_service_Id"><?= $Page->renderSort($Page->Id) ?></div></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th data-name="CODE" class="<?= $Page->CODE->headerCellClass() ?>"><div id="elh_view_lab_service_CODE" class="view_lab_service_CODE"><?= $Page->renderSort($Page->CODE) ?></div></th>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <th data-name="SERVICE" class="<?= $Page->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_service_SERVICE" class="view_lab_service_SERVICE"><?= $Page->renderSort($Page->SERVICE) ?></div></th>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <th data-name="UNITS" class="<?= $Page->UNITS->headerCellClass() ?>"><div id="elh_view_lab_service_UNITS" class="view_lab_service_UNITS"><?= $Page->renderSort($Page->UNITS) ?></div></th>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <th data-name="AMOUNT" class="<?= $Page->AMOUNT->headerCellClass() ?>"><div id="elh_view_lab_service_AMOUNT" class="view_lab_service_AMOUNT"><?= $Page->renderSort($Page->AMOUNT) ?></div></th>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <th data-name="SERVICE_TYPE" class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_lab_service_SERVICE_TYPE" class="view_lab_service_SERVICE_TYPE"><?= $Page->renderSort($Page->SERVICE_TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th data-name="DEPARTMENT" class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_lab_service_DEPARTMENT" class="view_lab_service_DEPARTMENT"><?= $Page->renderSort($Page->DEPARTMENT) ?></div></th>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <th data-name="Created" class="<?= $Page->Created->headerCellClass() ?>"><div id="elh_view_lab_service_Created" class="view_lab_service_Created"><?= $Page->renderSort($Page->Created) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_lab_service_CreatedDateTime" class="view_lab_service_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
        <th data-name="Modified" class="<?= $Page->Modified->headerCellClass() ?>"><div id="elh_view_lab_service_Modified" class="view_lab_service_Modified"><?= $Page->renderSort($Page->Modified) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_view_lab_service_ModifiedDateTime" class="view_lab_service_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <th data-name="mas_services_billingcol" class="<?= $Page->mas_services_billingcol->headerCellClass() ?>"><div id="elh_view_lab_service_mas_services_billingcol" class="view_lab_service_mas_services_billingcol"><?= $Page->renderSort($Page->mas_services_billingcol) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <th data-name="DrShareAmount" class="<?= $Page->DrShareAmount->headerCellClass() ?>"><div id="elh_view_lab_service_DrShareAmount" class="view_lab_service_DrShareAmount"><?= $Page->renderSort($Page->DrShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <th data-name="HospShareAmount" class="<?= $Page->HospShareAmount->headerCellClass() ?>"><div id="elh_view_lab_service_HospShareAmount" class="view_lab_service_HospShareAmount"><?= $Page->renderSort($Page->HospShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <th data-name="DrSharePer" class="<?= $Page->DrSharePer->headerCellClass() ?>"><div id="elh_view_lab_service_DrSharePer" class="view_lab_service_DrSharePer"><?= $Page->renderSort($Page->DrSharePer) ?></div></th>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <th data-name="HospSharePer" class="<?= $Page->HospSharePer->headerCellClass() ?>"><div id="elh_view_lab_service_HospSharePer" class="view_lab_service_HospSharePer"><?= $Page->renderSort($Page->HospSharePer) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_lab_service_HospID" class="view_lab_service_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Page->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_service_TestSubCd" class="view_lab_service_TestSubCd"><?= $Page->renderSort($Page->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_view_lab_service_Method" class="view_lab_service_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_view_lab_service_Order" class="view_lab_service_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th data-name="ResType" class="<?= $Page->ResType->headerCellClass() ?>"><div id="elh_view_lab_service_ResType" class="view_lab_service_ResType"><?= $Page->renderSort($Page->ResType) ?></div></th>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <th data-name="UnitCD" class="<?= $Page->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_service_UnitCD" class="view_lab_service_UnitCD"><?= $Page->renderSort($Page->UnitCD) ?></div></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th data-name="Sample" class="<?= $Page->Sample->headerCellClass() ?>"><div id="elh_view_lab_service_Sample" class="view_lab_service_Sample"><?= $Page->renderSort($Page->Sample) ?></div></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th data-name="NoD" class="<?= $Page->NoD->headerCellClass() ?>"><div id="elh_view_lab_service_NoD" class="view_lab_service_NoD"><?= $Page->renderSort($Page->NoD) ?></div></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th data-name="BillOrder" class="<?= $Page->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_service_BillOrder" class="view_lab_service_BillOrder"><?= $Page->renderSort($Page->BillOrder) ?></div></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th data-name="Inactive" class="<?= $Page->Inactive->headerCellClass() ?>"><div id="elh_view_lab_service_Inactive" class="view_lab_service_Inactive"><?= $Page->renderSort($Page->Inactive) ?></div></th>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <th data-name="Outsource" class="<?= $Page->Outsource->headerCellClass() ?>"><div id="elh_view_lab_service_Outsource" class="view_lab_service_Outsource"><?= $Page->renderSort($Page->Outsource) ?></div></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th data-name="CollSample" class="<?= $Page->CollSample->headerCellClass() ?>"><div id="elh_view_lab_service_CollSample" class="view_lab_service_CollSample"><?= $Page->renderSort($Page->CollSample) ?></div></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Page->TestType->headerCellClass() ?>"><div id="elh_view_lab_service_TestType" class="view_lab_service_TestType"><?= $Page->renderSort($Page->TestType) ?></div></th>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <th data-name="NoHeading" class="<?= $Page->NoHeading->headerCellClass() ?>"><div id="elh_view_lab_service_NoHeading" class="view_lab_service_NoHeading"><?= $Page->renderSort($Page->NoHeading) ?></div></th>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <th data-name="ChemicalCode" class="<?= $Page->ChemicalCode->headerCellClass() ?>"><div id="elh_view_lab_service_ChemicalCode" class="view_lab_service_ChemicalCode"><?= $Page->renderSort($Page->ChemicalCode) ?></div></th>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <th data-name="ChemicalName" class="<?= $Page->ChemicalName->headerCellClass() ?>"><div id="elh_view_lab_service_ChemicalName" class="view_lab_service_ChemicalName"><?= $Page->renderSort($Page->ChemicalName) ?></div></th>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <th data-name="Utilaization" class="<?= $Page->Utilaization->headerCellClass() ?>"><div id="elh_view_lab_service_Utilaization" class="view_lab_service_Utilaization"><?= $Page->renderSort($Page->Utilaization) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_lab_service", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Id->Visible) { // Id ?>
        <td data-name="Id" <?= $Page->Id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CODE->Visible) { // CODE ?>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE" <?= $Page->SERVICE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UNITS->Visible) { // UNITS ?>
        <td data-name="UNITS" <?= $Page->UNITS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_UNITS">
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <td data-name="AMOUNT" <?= $Page->AMOUNT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_AMOUNT">
<span<?= $Page->AMOUNT->viewAttributes() ?>>
<?= $Page->AMOUNT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_SERVICE_TYPE">
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Created->Visible) { // Created ?>
        <td data-name="Created" <?= $Page->Created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Modified->Visible) { // Modified ?>
        <td data-name="Modified" <?= $Page->Modified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Modified">
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <td data-name="mas_services_billingcol" <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_mas_services_billingcol">
<span<?= $Page->mas_services_billingcol->viewAttributes() ?>>
<?= $Page->mas_services_billingcol->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount" <?= $Page->DrShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount" <?= $Page->HospShareAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <td data-name="DrSharePer" <?= $Page->DrSharePer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_DrSharePer">
<span<?= $Page->DrSharePer->viewAttributes() ?>>
<?= $Page->DrSharePer->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <td data-name="HospSharePer" <?= $Page->HospSharePer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_HospSharePer">
<span<?= $Page->HospSharePer->viewAttributes() ?>>
<?= $Page->HospSharePer->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td data-name="UnitCD" <?= $Page->UnitCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td data-name="Outsource" <?= $Page->Outsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td data-name="NoHeading" <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <td data-name="ChemicalCode" <?= $Page->ChemicalCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_ChemicalCode">
<span<?= $Page->ChemicalCode->viewAttributes() ?>>
<?= $Page->ChemicalCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <td data-name="ChemicalName" <?= $Page->ChemicalName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_ChemicalName">
<span<?= $Page->ChemicalName->viewAttributes() ?>>
<?= $Page->ChemicalName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <td data-name="Utilaization" <?= $Page->Utilaization->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_service_Utilaization">
<span<?= $Page->Utilaization->viewAttributes() ?>>
<?= $Page->Utilaization->getViewValue() ?></span>
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
    ew.addEventHandlers("view_lab_service");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
