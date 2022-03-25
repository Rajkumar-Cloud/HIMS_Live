<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabProfileMasterList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_profile_masterlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    flab_profile_masterlist = currentForm = new ew.Form("flab_profile_masterlist", "list");
    flab_profile_masterlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("flab_profile_masterlist");
});
var flab_profile_masterlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    flab_profile_masterlistsrch = currentSearchForm = new ew.Form("flab_profile_masterlistsrch");

    // Dynamic selection lists

    // Filters
    flab_profile_masterlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("flab_profile_masterlistsrch");
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
<form name="flab_profile_masterlistsrch" id="flab_profile_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="flab_profile_masterlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_profile_master">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_profile_master">
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
<form name="flab_profile_masterlist" id="flab_profile_masterlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<div id="gmp_lab_profile_master" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_lab_profile_masterlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_lab_profile_master_id" class="lab_profile_master_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <th data-name="ProfileCode" class="<?= $Page->ProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileCode" class="lab_profile_master_ProfileCode"><?= $Page->renderSort($Page->ProfileCode) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileName->Visible) { // ProfileName ?>
        <th data-name="ProfileName" class="<?= $Page->ProfileName->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileName" class="lab_profile_master_ProfileName"><?= $Page->renderSort($Page->ProfileName) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileAmount->Visible) { // ProfileAmount ?>
        <th data-name="ProfileAmount" class="<?= $Page->ProfileAmount->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileAmount" class="lab_profile_master_ProfileAmount"><?= $Page->renderSort($Page->ProfileAmount) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
        <th data-name="ProfileSpecialAmount" class="<?= $Page->ProfileSpecialAmount->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileSpecialAmount" class="lab_profile_master_ProfileSpecialAmount"><?= $Page->renderSort($Page->ProfileSpecialAmount) ?></div></th>
<?php } ?>
<?php if ($Page->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
        <th data-name="ProfileMasterInactive" class="<?= $Page->ProfileMasterInactive->headerCellClass() ?>"><div id="elh_lab_profile_master_ProfileMasterInactive" class="lab_profile_master_ProfileMasterInactive"><?= $Page->renderSort($Page->ProfileMasterInactive) ?></div></th>
<?php } ?>
<?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <th data-name="ReagentAmt" class="<?= $Page->ReagentAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_ReagentAmt" class="lab_profile_master_ReagentAmt"><?= $Page->renderSort($Page->ReagentAmt) ?></div></th>
<?php } ?>
<?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <th data-name="LabAmt" class="<?= $Page->LabAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_LabAmt" class="lab_profile_master_LabAmt"><?= $Page->renderSort($Page->LabAmt) ?></div></th>
<?php } ?>
<?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <th data-name="RefAmt" class="<?= $Page->RefAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_RefAmt" class="lab_profile_master_RefAmt"><?= $Page->renderSort($Page->RefAmt) ?></div></th>
<?php } ?>
<?php if ($Page->MainDeptCD->Visible) { // MainDeptCD ?>
        <th data-name="MainDeptCD" class="<?= $Page->MainDeptCD->headerCellClass() ?>"><div id="elh_lab_profile_master_MainDeptCD" class="lab_profile_master_MainDeptCD"><?= $Page->renderSort($Page->MainDeptCD) ?></div></th>
<?php } ?>
<?php if ($Page->Individual->Visible) { // Individual ?>
        <th data-name="Individual" class="<?= $Page->Individual->headerCellClass() ?>"><div id="elh_lab_profile_master_Individual" class="lab_profile_master_Individual"><?= $Page->renderSort($Page->Individual) ?></div></th>
<?php } ?>
<?php if ($Page->ShortName->Visible) { // ShortName ?>
        <th data-name="ShortName" class="<?= $Page->ShortName->headerCellClass() ?>"><div id="elh_lab_profile_master_ShortName" class="lab_profile_master_ShortName"><?= $Page->renderSort($Page->ShortName) ?></div></th>
<?php } ?>
<?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <th data-name="PrevAmt" class="<?= $Page->PrevAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_PrevAmt" class="lab_profile_master_PrevAmt"><?= $Page->renderSort($Page->PrevAmt) ?></div></th>
<?php } ?>
<?php if ($Page->BillName->Visible) { // BillName ?>
        <th data-name="BillName" class="<?= $Page->BillName->headerCellClass() ?>"><div id="elh_lab_profile_master_BillName" class="lab_profile_master_BillName"><?= $Page->renderSort($Page->BillName) ?></div></th>
<?php } ?>
<?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <th data-name="ActualAmt" class="<?= $Page->ActualAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_ActualAmt" class="lab_profile_master_ActualAmt"><?= $Page->renderSort($Page->ActualAmt) ?></div></th>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <th data-name="NoHeading" class="<?= $Page->NoHeading->headerCellClass() ?>"><div id="elh_lab_profile_master_NoHeading" class="lab_profile_master_NoHeading"><?= $Page->renderSort($Page->NoHeading) ?></div></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th data-name="EditDate" class="<?= $Page->EditDate->headerCellClass() ?>"><div id="elh_lab_profile_master_EditDate" class="lab_profile_master_EditDate"><?= $Page->renderSort($Page->EditDate) ?></div></th>
<?php } ?>
<?php if ($Page->EditUser->Visible) { // EditUser ?>
        <th data-name="EditUser" class="<?= $Page->EditUser->headerCellClass() ?>"><div id="elh_lab_profile_master_EditUser" class="lab_profile_master_EditUser"><?= $Page->renderSort($Page->EditUser) ?></div></th>
<?php } ?>
<?php if ($Page->HISCD->Visible) { // HISCD ?>
        <th data-name="HISCD" class="<?= $Page->HISCD->headerCellClass() ?>"><div id="elh_lab_profile_master_HISCD" class="lab_profile_master_HISCD"><?= $Page->renderSort($Page->HISCD) ?></div></th>
<?php } ?>
<?php if ($Page->PriceList->Visible) { // PriceList ?>
        <th data-name="PriceList" class="<?= $Page->PriceList->headerCellClass() ?>"><div id="elh_lab_profile_master_PriceList" class="lab_profile_master_PriceList"><?= $Page->renderSort($Page->PriceList) ?></div></th>
<?php } ?>
<?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <th data-name="IPAmt" class="<?= $Page->IPAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IPAmt" class="lab_profile_master_IPAmt"><?= $Page->renderSort($Page->IPAmt) ?></div></th>
<?php } ?>
<?php if ($Page->IInsAmt->Visible) { // IInsAmt ?>
        <th data-name="IInsAmt" class="<?= $Page->IInsAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IInsAmt" class="lab_profile_master_IInsAmt"><?= $Page->renderSort($Page->IInsAmt) ?></div></th>
<?php } ?>
<?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <th data-name="ManualCD" class="<?= $Page->ManualCD->headerCellClass() ?>"><div id="elh_lab_profile_master_ManualCD" class="lab_profile_master_ManualCD"><?= $Page->renderSort($Page->ManualCD) ?></div></th>
<?php } ?>
<?php if ($Page->Free->Visible) { // Free ?>
        <th data-name="Free" class="<?= $Page->Free->headerCellClass() ?>"><div id="elh_lab_profile_master_Free" class="lab_profile_master_Free"><?= $Page->renderSort($Page->Free) ?></div></th>
<?php } ?>
<?php if ($Page->IIpAmt->Visible) { // IIpAmt ?>
        <th data-name="IIpAmt" class="<?= $Page->IIpAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_IIpAmt" class="lab_profile_master_IIpAmt"><?= $Page->renderSort($Page->IIpAmt) ?></div></th>
<?php } ?>
<?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <th data-name="InsAmt" class="<?= $Page->InsAmt->headerCellClass() ?>"><div id="elh_lab_profile_master_InsAmt" class="lab_profile_master_InsAmt"><?= $Page->renderSort($Page->InsAmt) ?></div></th>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <th data-name="OutSource" class="<?= $Page->OutSource->headerCellClass() ?>"><div id="elh_lab_profile_master_OutSource" class="lab_profile_master_OutSource"><?= $Page->renderSort($Page->OutSource) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_lab_profile_master", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_lab_profile_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <td data-name="ProfileCode" <?= $Page->ProfileCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileCode">
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<?= $Page->ProfileCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProfileName->Visible) { // ProfileName ?>
        <td data-name="ProfileName" <?= $Page->ProfileName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileName">
<span<?= $Page->ProfileName->viewAttributes() ?>>
<?= $Page->ProfileName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProfileAmount->Visible) { // ProfileAmount ?>
        <td data-name="ProfileAmount" <?= $Page->ProfileAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileAmount">
<span<?= $Page->ProfileAmount->viewAttributes() ?>>
<?= $Page->ProfileAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
        <td data-name="ProfileSpecialAmount" <?= $Page->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileSpecialAmount">
<span<?= $Page->ProfileSpecialAmount->viewAttributes() ?>>
<?= $Page->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
        <td data-name="ProfileMasterInactive" <?= $Page->ProfileMasterInactive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ProfileMasterInactive">
<span<?= $Page->ProfileMasterInactive->viewAttributes() ?>>
<?= $Page->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReagentAmt->Visible) { // ReagentAmt ?>
        <td data-name="ReagentAmt" <?= $Page->ReagentAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ReagentAmt">
<span<?= $Page->ReagentAmt->viewAttributes() ?>>
<?= $Page->ReagentAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LabAmt->Visible) { // LabAmt ?>
        <td data-name="LabAmt" <?= $Page->LabAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_LabAmt">
<span<?= $Page->LabAmt->viewAttributes() ?>>
<?= $Page->LabAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefAmt->Visible) { // RefAmt ?>
        <td data-name="RefAmt" <?= $Page->RefAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_RefAmt">
<span<?= $Page->RefAmt->viewAttributes() ?>>
<?= $Page->RefAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MainDeptCD->Visible) { // MainDeptCD ?>
        <td data-name="MainDeptCD" <?= $Page->MainDeptCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_MainDeptCD">
<span<?= $Page->MainDeptCD->viewAttributes() ?>>
<?= $Page->MainDeptCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Individual->Visible) { // Individual ?>
        <td data-name="Individual" <?= $Page->Individual->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_Individual">
<span<?= $Page->Individual->viewAttributes() ?>>
<?= $Page->Individual->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ShortName->Visible) { // ShortName ?>
        <td data-name="ShortName" <?= $Page->ShortName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ShortName">
<span<?= $Page->ShortName->viewAttributes() ?>>
<?= $Page->ShortName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrevAmt->Visible) { // PrevAmt ?>
        <td data-name="PrevAmt" <?= $Page->PrevAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_PrevAmt">
<span<?= $Page->PrevAmt->viewAttributes() ?>>
<?= $Page->PrevAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillName->Visible) { // BillName ?>
        <td data-name="BillName" <?= $Page->BillName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_BillName">
<span<?= $Page->BillName->viewAttributes() ?>>
<?= $Page->BillName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ActualAmt->Visible) { // ActualAmt ?>
        <td data-name="ActualAmt" <?= $Page->ActualAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ActualAmt">
<span<?= $Page->ActualAmt->viewAttributes() ?>>
<?= $Page->ActualAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td data-name="NoHeading" <?= $Page->NoHeading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EditUser->Visible) { // EditUser ?>
        <td data-name="EditUser" <?= $Page->EditUser->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_EditUser">
<span<?= $Page->EditUser->viewAttributes() ?>>
<?= $Page->EditUser->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HISCD->Visible) { // HISCD ?>
        <td data-name="HISCD" <?= $Page->HISCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_HISCD">
<span<?= $Page->HISCD->viewAttributes() ?>>
<?= $Page->HISCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PriceList->Visible) { // PriceList ?>
        <td data-name="PriceList" <?= $Page->PriceList->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_PriceList">
<span<?= $Page->PriceList->viewAttributes() ?>>
<?= $Page->PriceList->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IPAmt->Visible) { // IPAmt ?>
        <td data-name="IPAmt" <?= $Page->IPAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_IPAmt">
<span<?= $Page->IPAmt->viewAttributes() ?>>
<?= $Page->IPAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IInsAmt->Visible) { // IInsAmt ?>
        <td data-name="IInsAmt" <?= $Page->IInsAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_IInsAmt">
<span<?= $Page->IInsAmt->viewAttributes() ?>>
<?= $Page->IInsAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ManualCD->Visible) { // ManualCD ?>
        <td data-name="ManualCD" <?= $Page->ManualCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_ManualCD">
<span<?= $Page->ManualCD->viewAttributes() ?>>
<?= $Page->ManualCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Free->Visible) { // Free ?>
        <td data-name="Free" <?= $Page->Free->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_Free">
<span<?= $Page->Free->viewAttributes() ?>>
<?= $Page->Free->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IIpAmt->Visible) { // IIpAmt ?>
        <td data-name="IIpAmt" <?= $Page->IIpAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_IIpAmt">
<span<?= $Page->IIpAmt->viewAttributes() ?>>
<?= $Page->IIpAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InsAmt->Visible) { // InsAmt ?>
        <td data-name="InsAmt" <?= $Page->InsAmt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_InsAmt">
<span<?= $Page->InsAmt->viewAttributes() ?>>
<?= $Page->InsAmt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OutSource->Visible) { // OutSource ?>
        <td data-name="OutSource" <?= $Page->OutSource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_profile_master_OutSource">
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
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
    ew.addEventHandlers("lab_profile_master");
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
        container: "gmp_lab_profile_master",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
