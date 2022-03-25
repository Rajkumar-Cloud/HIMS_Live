<?php

namespace PHPMaker2021\project3;

// Page object
$ViewLabResultreleasedList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_lab_resultreleasedlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_lab_resultreleasedlist = currentForm = new ew.Form("fview_lab_resultreleasedlist", "list");
    fview_lab_resultreleasedlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_lab_resultreleasedlist");
});
var fview_lab_resultreleasedlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_lab_resultreleasedlistsrch = currentSearchForm = new ew.Form("fview_lab_resultreleasedlistsrch");

    // Dynamic selection lists

    // Filters
    fview_lab_resultreleasedlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_lab_resultreleasedlistsrch");
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
<form name="fview_lab_resultreleasedlistsrch" id="fview_lab_resultreleasedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_lab_resultreleasedlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_lab_resultreleased">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleased">
<form name="fview_lab_resultreleasedlist" id="fview_lab_resultreleasedlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_resultreleased">
<div id="gmp_view_lab_resultreleased" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_lab_resultreleasedlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_id" class="view_lab_resultreleased_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_PatID" class="view_lab_resultreleased_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_PatientName" class="view_lab_resultreleased_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Age" class="view_lab_resultreleased_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Gender" class="view_lab_resultreleased_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_sid" class="view_lab_resultreleased_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Page->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ItemCode" class="view_lab_resultreleased_ItemCode"><?= $Page->renderSort($Page->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Page->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DEptCd" class="view_lab_resultreleased_DEptCd"><?= $Page->renderSort($Page->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <th data-name="Resulted" class="<?= $Page->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Resulted" class="view_lab_resultreleased_Resulted"><?= $Page->renderSort($Page->Resulted) ?></div></th>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Page->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Services" class="view_lab_resultreleased_Services"><?= $Page->renderSort($Page->Services) ?></div></th>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Page->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Pic1" class="view_lab_resultreleased_Pic1"><?= $Page->renderSort($Page->Pic1) ?></div></th>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Page->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Pic2" class="view_lab_resultreleased_Pic2"><?= $Page->renderSort($Page->Pic2) ?></div></th>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <th data-name="TestUnit" class="<?= $Page->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_TestUnit" class="view_lab_resultreleased_TestUnit"><?= $Page->renderSort($Page->TestUnit) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Order" class="view_lab_resultreleased_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <th data-name="Repeated" class="<?= $Page->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Repeated" class="view_lab_resultreleased_Repeated"><?= $Page->renderSort($Page->Repeated) ?></div></th>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <th data-name="Vid" class="<?= $Page->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Vid" class="view_lab_resultreleased_Vid"><?= $Page->renderSort($Page->Vid) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <th data-name="invoiceId" class="<?= $Page->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_invoiceId" class="view_lab_resultreleased_invoiceId"><?= $Page->renderSort($Page->invoiceId) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrID" class="view_lab_resultreleased_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <th data-name="DrCODE" class="<?= $Page->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrCODE" class="view_lab_resultreleased_DrCODE"><?= $Page->renderSort($Page->DrCODE) ?></div></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Page->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrName" class="view_lab_resultreleased_DrName"><?= $Page->renderSort($Page->DrName) ?></div></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Page->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Department" class="view_lab_resultreleased_Department"><?= $Page->renderSort($Page->Department) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_createddatetime" class="view_lab_resultreleased_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_status" class="view_lab_resultreleased_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Page->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_TestType" class="view_lab_resultreleased_TestType"><?= $Page->renderSort($Page->TestType) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ResultDate" class="view_lab_resultreleased_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Page->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ResultedBy" class="view_lab_resultreleased_ResultedBy"><?= $Page->renderSort($Page->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_HospID" class="view_lab_resultreleased_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_lab_resultreleased", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Page->ItemCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_ItemCode">
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" <?= $Page->Resulted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Resulted">
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Page->Services->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Services">
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Page->Pic1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Page->Pic2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" <?= $Page->TestUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_TestUnit">
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" <?= $Page->Repeated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Repeated">
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Vid->Visible) { // Vid ?>
        <td data-name="Vid" <?= $Page->Vid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" <?= $Page->DrCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_DrCODE">
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleased_HospID">
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
    ew.addEventHandlers("view_lab_resultreleased");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
