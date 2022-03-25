<?php

namespace PHPMaker2021\HIMS;

// Page object
$MonitorTreatmentPlanList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmonitor_treatment_planlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fmonitor_treatment_planlist = currentForm = new ew.Form("fmonitor_treatment_planlist", "list");
    fmonitor_treatment_planlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fmonitor_treatment_planlist");
});
var fmonitor_treatment_planlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fmonitor_treatment_planlistsrch = currentSearchForm = new ew.Form("fmonitor_treatment_planlistsrch");

    // Dynamic selection lists

    // Filters
    fmonitor_treatment_planlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fmonitor_treatment_planlistsrch");
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
<form name="fmonitor_treatment_planlistsrch" id="fmonitor_treatment_planlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fmonitor_treatment_planlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="monitor_treatment_plan">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> monitor_treatment_plan">
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
<form name="fmonitor_treatment_planlist" id="fmonitor_treatment_planlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<div id="gmp_monitor_treatment_plan" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_monitor_treatment_planlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <th data-name="PatId" class="<?= $Page->PatId->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId"><?= $Page->renderSort($Page->PatId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
        <th data-name="MobileNo" class="<?= $Page->MobileNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo"><?= $Page->renderSort($Page->MobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->ConsultantName->Visible) { // ConsultantName ?>
        <th data-name="ConsultantName" class="<?= $Page->ConsultantName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName"><?= $Page->renderSort($Page->ConsultantName) ?></div></th>
<?php } ?>
<?php if ($Page->RefDrName->Visible) { // RefDrName ?>
        <th data-name="RefDrName" class="<?= $Page->RefDrName->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName"><?= $Page->renderSort($Page->RefDrName) ?></div></th>
<?php } ?>
<?php if ($Page->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
        <th data-name="RefDrMobileNo" class="<?= $Page->RefDrMobileNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo"><?= $Page->renderSort($Page->RefDrMobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->NewVisitDate->Visible) { // NewVisitDate ?>
        <th data-name="NewVisitDate" class="<?= $Page->NewVisitDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate"><?= $Page->renderSort($Page->NewVisitDate) ?></div></th>
<?php } ?>
<?php if ($Page->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
        <th data-name="NewVisitYesNo" class="<?= $Page->NewVisitYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo"><?= $Page->renderSort($Page->NewVisitYesNo) ?></div></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th data-name="Treatment" class="<?= $Page->Treatment->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment"><?= $Page->renderSort($Page->Treatment) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
        <th data-name="IUIDoneDate1" class="<?= $Page->IUIDoneDate1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1"><?= $Page->renderSort($Page->IUIDoneDate1) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
        <th data-name="IUIDoneYesNo1" class="<?= $Page->IUIDoneYesNo1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1"><?= $Page->renderSort($Page->IUIDoneYesNo1) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestDate1->Visible) { // UPTTestDate1 ?>
        <th data-name="UPTTestDate1" class="<?= $Page->UPTTestDate1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1"><?= $Page->renderSort($Page->UPTTestDate1) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
        <th data-name="UPTTestYesNo1" class="<?= $Page->UPTTestYesNo1->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1"><?= $Page->renderSort($Page->UPTTestYesNo1) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
        <th data-name="IUIDoneDate2" class="<?= $Page->IUIDoneDate2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2"><?= $Page->renderSort($Page->IUIDoneDate2) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
        <th data-name="IUIDoneYesNo2" class="<?= $Page->IUIDoneYesNo2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2"><?= $Page->renderSort($Page->IUIDoneYesNo2) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestDate2->Visible) { // UPTTestDate2 ?>
        <th data-name="UPTTestDate2" class="<?= $Page->UPTTestDate2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2"><?= $Page->renderSort($Page->UPTTestDate2) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
        <th data-name="UPTTestYesNo2" class="<?= $Page->UPTTestYesNo2->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2"><?= $Page->renderSort($Page->UPTTestYesNo2) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
        <th data-name="IUIDoneDate3" class="<?= $Page->IUIDoneDate3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3"><?= $Page->renderSort($Page->IUIDoneDate3) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
        <th data-name="IUIDoneYesNo3" class="<?= $Page->IUIDoneYesNo3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3"><?= $Page->renderSort($Page->IUIDoneYesNo3) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestDate3->Visible) { // UPTTestDate3 ?>
        <th data-name="UPTTestDate3" class="<?= $Page->UPTTestDate3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3"><?= $Page->renderSort($Page->UPTTestDate3) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
        <th data-name="UPTTestYesNo3" class="<?= $Page->UPTTestYesNo3->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3"><?= $Page->renderSort($Page->UPTTestYesNo3) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
        <th data-name="IUIDoneDate4" class="<?= $Page->IUIDoneDate4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4"><?= $Page->renderSort($Page->IUIDoneDate4) ?></div></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
        <th data-name="IUIDoneYesNo4" class="<?= $Page->IUIDoneYesNo4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4"><?= $Page->renderSort($Page->IUIDoneYesNo4) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestDate4->Visible) { // UPTTestDate4 ?>
        <th data-name="UPTTestDate4" class="<?= $Page->UPTTestDate4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4"><?= $Page->renderSort($Page->UPTTestDate4) ?></div></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
        <th data-name="UPTTestYesNo4" class="<?= $Page->UPTTestYesNo4->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4"><?= $Page->renderSort($Page->UPTTestYesNo4) ?></div></th>
<?php } ?>
<?php if ($Page->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
        <th data-name="IVFStimulationDate" class="<?= $Page->IVFStimulationDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate"><?= $Page->renderSort($Page->IVFStimulationDate) ?></div></th>
<?php } ?>
<?php if ($Page->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
        <th data-name="IVFStimulationYesNo" class="<?= $Page->IVFStimulationYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo"><?= $Page->renderSort($Page->IVFStimulationYesNo) ?></div></th>
<?php } ?>
<?php if ($Page->OPUDate->Visible) { // OPUDate ?>
        <th data-name="OPUDate" class="<?= $Page->OPUDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate"><?= $Page->renderSort($Page->OPUDate) ?></div></th>
<?php } ?>
<?php if ($Page->OPUYesNo->Visible) { // OPUYesNo ?>
        <th data-name="OPUYesNo" class="<?= $Page->OPUYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo"><?= $Page->renderSort($Page->OPUYesNo) ?></div></th>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <th data-name="ETDate" class="<?= $Page->ETDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate"><?= $Page->renderSort($Page->ETDate) ?></div></th>
<?php } ?>
<?php if ($Page->ETYesNo->Visible) { // ETYesNo ?>
        <th data-name="ETYesNo" class="<?= $Page->ETYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo"><?= $Page->renderSort($Page->ETYesNo) ?></div></th>
<?php } ?>
<?php if ($Page->BetaHCGDate->Visible) { // BetaHCGDate ?>
        <th data-name="BetaHCGDate" class="<?= $Page->BetaHCGDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate"><?= $Page->renderSort($Page->BetaHCGDate) ?></div></th>
<?php } ?>
<?php if ($Page->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
        <th data-name="BetaHCGYesNo" class="<?= $Page->BetaHCGYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo"><?= $Page->renderSort($Page->BetaHCGYesNo) ?></div></th>
<?php } ?>
<?php if ($Page->FETDate->Visible) { // FETDate ?>
        <th data-name="FETDate" class="<?= $Page->FETDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate"><?= $Page->renderSort($Page->FETDate) ?></div></th>
<?php } ?>
<?php if ($Page->FETYesNo->Visible) { // FETYesNo ?>
        <th data-name="FETYesNo" class="<?= $Page->FETYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo"><?= $Page->renderSort($Page->FETYesNo) ?></div></th>
<?php } ?>
<?php if ($Page->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
        <th data-name="FBetaHCGDate" class="<?= $Page->FBetaHCGDate->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate"><?= $Page->renderSort($Page->FBetaHCGDate) ?></div></th>
<?php } ?>
<?php if ($Page->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
        <th data-name="FBetaHCGYesNo" class="<?= $Page->FBetaHCGYesNo->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo"><?= $Page->renderSort($Page->FBetaHCGYesNo) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_monitor_treatment_plan", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatId->Visible) { // PatId ?>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MobileNo->Visible) { // MobileNo ?>
        <td data-name="MobileNo" <?= $Page->MobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_MobileNo">
<span<?= $Page->MobileNo->viewAttributes() ?>>
<?= $Page->MobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ConsultantName->Visible) { // ConsultantName ?>
        <td data-name="ConsultantName" <?= $Page->ConsultantName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_ConsultantName">
<span<?= $Page->ConsultantName->viewAttributes() ?>>
<?= $Page->ConsultantName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefDrName->Visible) { // RefDrName ?>
        <td data-name="RefDrName" <?= $Page->RefDrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_RefDrName">
<span<?= $Page->RefDrName->viewAttributes() ?>>
<?= $Page->RefDrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
        <td data-name="RefDrMobileNo" <?= $Page->RefDrMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_RefDrMobileNo">
<span<?= $Page->RefDrMobileNo->viewAttributes() ?>>
<?= $Page->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NewVisitDate->Visible) { // NewVisitDate ?>
        <td data-name="NewVisitDate" <?= $Page->NewVisitDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_NewVisitDate">
<span<?= $Page->NewVisitDate->viewAttributes() ?>>
<?= $Page->NewVisitDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
        <td data-name="NewVisitYesNo" <?= $Page->NewVisitYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_NewVisitYesNo">
<span<?= $Page->NewVisitYesNo->viewAttributes() ?>>
<?= $Page->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
        <td data-name="IUIDoneDate1" <?= $Page->IUIDoneDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate1">
<span<?= $Page->IUIDoneDate1->viewAttributes() ?>>
<?= $Page->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
        <td data-name="IUIDoneYesNo1" <?= $Page->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo1">
<span<?= $Page->IUIDoneYesNo1->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestDate1->Visible) { // UPTTestDate1 ?>
        <td data-name="UPTTestDate1" <?= $Page->UPTTestDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate1">
<span<?= $Page->UPTTestDate1->viewAttributes() ?>>
<?= $Page->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
        <td data-name="UPTTestYesNo1" <?= $Page->UPTTestYesNo1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo1">
<span<?= $Page->UPTTestYesNo1->viewAttributes() ?>>
<?= $Page->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
        <td data-name="IUIDoneDate2" <?= $Page->IUIDoneDate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate2">
<span<?= $Page->IUIDoneDate2->viewAttributes() ?>>
<?= $Page->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
        <td data-name="IUIDoneYesNo2" <?= $Page->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo2">
<span<?= $Page->IUIDoneYesNo2->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestDate2->Visible) { // UPTTestDate2 ?>
        <td data-name="UPTTestDate2" <?= $Page->UPTTestDate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate2">
<span<?= $Page->UPTTestDate2->viewAttributes() ?>>
<?= $Page->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
        <td data-name="UPTTestYesNo2" <?= $Page->UPTTestYesNo2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo2">
<span<?= $Page->UPTTestYesNo2->viewAttributes() ?>>
<?= $Page->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
        <td data-name="IUIDoneDate3" <?= $Page->IUIDoneDate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate3">
<span<?= $Page->IUIDoneDate3->viewAttributes() ?>>
<?= $Page->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
        <td data-name="IUIDoneYesNo3" <?= $Page->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo3">
<span<?= $Page->IUIDoneYesNo3->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestDate3->Visible) { // UPTTestDate3 ?>
        <td data-name="UPTTestDate3" <?= $Page->UPTTestDate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate3">
<span<?= $Page->UPTTestDate3->viewAttributes() ?>>
<?= $Page->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
        <td data-name="UPTTestYesNo3" <?= $Page->UPTTestYesNo3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo3">
<span<?= $Page->UPTTestYesNo3->viewAttributes() ?>>
<?= $Page->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
        <td data-name="IUIDoneDate4" <?= $Page->IUIDoneDate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate4">
<span<?= $Page->IUIDoneDate4->viewAttributes() ?>>
<?= $Page->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
        <td data-name="IUIDoneYesNo4" <?= $Page->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo4">
<span<?= $Page->IUIDoneYesNo4->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestDate4->Visible) { // UPTTestDate4 ?>
        <td data-name="UPTTestDate4" <?= $Page->UPTTestDate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate4">
<span<?= $Page->UPTTestDate4->viewAttributes() ?>>
<?= $Page->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
        <td data-name="UPTTestYesNo4" <?= $Page->UPTTestYesNo4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo4">
<span<?= $Page->UPTTestYesNo4->viewAttributes() ?>>
<?= $Page->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
        <td data-name="IVFStimulationDate" <?= $Page->IVFStimulationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IVFStimulationDate">
<span<?= $Page->IVFStimulationDate->viewAttributes() ?>>
<?= $Page->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
        <td data-name="IVFStimulationYesNo" <?= $Page->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IVFStimulationYesNo">
<span<?= $Page->IVFStimulationYesNo->viewAttributes() ?>>
<?= $Page->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPUDate->Visible) { // OPUDate ?>
        <td data-name="OPUDate" <?= $Page->OPUDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_OPUDate">
<span<?= $Page->OPUDate->viewAttributes() ?>>
<?= $Page->OPUDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPUYesNo->Visible) { // OPUYesNo ?>
        <td data-name="OPUYesNo" <?= $Page->OPUYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_OPUYesNo">
<span<?= $Page->OPUYesNo->viewAttributes() ?>>
<?= $Page->OPUYesNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate" <?= $Page->ETDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETYesNo->Visible) { // ETYesNo ?>
        <td data-name="ETYesNo" <?= $Page->ETYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_ETYesNo">
<span<?= $Page->ETYesNo->viewAttributes() ?>>
<?= $Page->ETYesNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BetaHCGDate->Visible) { // BetaHCGDate ?>
        <td data-name="BetaHCGDate" <?= $Page->BetaHCGDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_BetaHCGDate">
<span<?= $Page->BetaHCGDate->viewAttributes() ?>>
<?= $Page->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
        <td data-name="BetaHCGYesNo" <?= $Page->BetaHCGYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_BetaHCGYesNo">
<span<?= $Page->BetaHCGYesNo->viewAttributes() ?>>
<?= $Page->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FETDate->Visible) { // FETDate ?>
        <td data-name="FETDate" <?= $Page->FETDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FETDate">
<span<?= $Page->FETDate->viewAttributes() ?>>
<?= $Page->FETDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FETYesNo->Visible) { // FETYesNo ?>
        <td data-name="FETYesNo" <?= $Page->FETYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FETYesNo">
<span<?= $Page->FETYesNo->viewAttributes() ?>>
<?= $Page->FETYesNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
        <td data-name="FBetaHCGDate" <?= $Page->FBetaHCGDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FBetaHCGDate">
<span<?= $Page->FBetaHCGDate->viewAttributes() ?>>
<?= $Page->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
        <td data-name="FBetaHCGYesNo" <?= $Page->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FBetaHCGYesNo">
<span<?= $Page->FBetaHCGYesNo->viewAttributes() ?>>
<?= $Page->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_HospID">
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
    ew.addEventHandlers("monitor_treatment_plan");
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
        container: "gmp_monitor_treatment_plan",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
