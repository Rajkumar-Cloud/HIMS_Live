<?php

namespace PHPMaker2021\project3;

// Page object
$ViewSemenanalysisList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_semenanalysislist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_semenanalysislist = currentForm = new ew.Form("fview_semenanalysislist", "list");
    fview_semenanalysislist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_semenanalysislist");
});
var fview_semenanalysislistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_semenanalysislistsrch = currentSearchForm = new ew.Form("fview_semenanalysislistsrch");

    // Dynamic selection lists

    // Filters
    fview_semenanalysislistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_semenanalysislistsrch");
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
<form name="fview_semenanalysislistsrch" id="fview_semenanalysislistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_semenanalysislistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_semenanalysis">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_semenanalysis">
<form name="fview_semenanalysislist" id="fview_semenanalysislist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<div id="gmp_view_semenanalysis" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_semenanalysislist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_semenanalysis_id" class="view_semenanalysis_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_view_semenanalysis_RIDNo" class="view_semenanalysis_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_semenanalysis_PatientName" class="view_semenanalysis_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <th data-name="HusbandName" class="<?= $Page->HusbandName->headerCellClass() ?>"><div id="elh_view_semenanalysis_HusbandName" class="view_semenanalysis_HusbandName"><?= $Page->renderSort($Page->HusbandName) ?></div></th>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <th data-name="RequestDr" class="<?= $Page->RequestDr->headerCellClass() ?>"><div id="elh_view_semenanalysis_RequestDr" class="view_semenanalysis_RequestDr"><?= $Page->renderSort($Page->RequestDr) ?></div></th>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <th data-name="CollectionDate" class="<?= $Page->CollectionDate->headerCellClass() ?>"><div id="elh_view_semenanalysis_CollectionDate" class="view_semenanalysis_CollectionDate"><?= $Page->renderSort($Page->CollectionDate) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_view_semenanalysis_ResultDate" class="view_semenanalysis_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <th data-name="RequestSample" class="<?= $Page->RequestSample->headerCellClass() ?>"><div id="elh_view_semenanalysis_RequestSample" class="view_semenanalysis_RequestSample"><?= $Page->renderSort($Page->RequestSample) ?></div></th>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
        <th data-name="CollectionType" class="<?= $Page->CollectionType->headerCellClass() ?>"><div id="elh_view_semenanalysis_CollectionType" class="view_semenanalysis_CollectionType"><?= $Page->renderSort($Page->CollectionType) ?></div></th>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
        <th data-name="CollectionMethod" class="<?= $Page->CollectionMethod->headerCellClass() ?>"><div id="elh_view_semenanalysis_CollectionMethod" class="view_semenanalysis_CollectionMethod"><?= $Page->renderSort($Page->CollectionMethod) ?></div></th>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
        <th data-name="Medicationused" class="<?= $Page->Medicationused->headerCellClass() ?>"><div id="elh_view_semenanalysis_Medicationused" class="view_semenanalysis_Medicationused"><?= $Page->renderSort($Page->Medicationused) ?></div></th>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <th data-name="DifficultiesinCollection" class="<?= $Page->DifficultiesinCollection->headerCellClass() ?>"><div id="elh_view_semenanalysis_DifficultiesinCollection" class="view_semenanalysis_DifficultiesinCollection"><?= $Page->renderSort($Page->DifficultiesinCollection) ?></div></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th data-name="Volume" class="<?= $Page->Volume->headerCellClass() ?>"><div id="elh_view_semenanalysis_Volume" class="view_semenanalysis_Volume"><?= $Page->renderSort($Page->Volume) ?></div></th>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
        <th data-name="pH" class="<?= $Page->pH->headerCellClass() ?>"><div id="elh_view_semenanalysis_pH" class="view_semenanalysis_pH"><?= $Page->renderSort($Page->pH) ?></div></th>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
        <th data-name="Timeofcollection" class="<?= $Page->Timeofcollection->headerCellClass() ?>"><div id="elh_view_semenanalysis_Timeofcollection" class="view_semenanalysis_Timeofcollection"><?= $Page->renderSort($Page->Timeofcollection) ?></div></th>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
        <th data-name="Timeofexamination" class="<?= $Page->Timeofexamination->headerCellClass() ?>"><div id="elh_view_semenanalysis_Timeofexamination" class="view_semenanalysis_Timeofexamination"><?= $Page->renderSort($Page->Timeofexamination) ?></div></th>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
        <th data-name="Concentration" class="<?= $Page->Concentration->headerCellClass() ?>"><div id="elh_view_semenanalysis_Concentration" class="view_semenanalysis_Concentration"><?= $Page->renderSort($Page->Concentration) ?></div></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th data-name="Total" class="<?= $Page->Total->headerCellClass() ?>"><div id="elh_view_semenanalysis_Total" class="view_semenanalysis_Total"><?= $Page->renderSort($Page->Total) ?></div></th>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <th data-name="ProgressiveMotility" class="<?= $Page->ProgressiveMotility->headerCellClass() ?>"><div id="elh_view_semenanalysis_ProgressiveMotility" class="view_semenanalysis_ProgressiveMotility"><?= $Page->renderSort($Page->ProgressiveMotility) ?></div></th>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <th data-name="NonProgrssiveMotile" class="<?= $Page->NonProgrssiveMotile->headerCellClass() ?>"><div id="elh_view_semenanalysis_NonProgrssiveMotile" class="view_semenanalysis_NonProgrssiveMotile"><?= $Page->renderSort($Page->NonProgrssiveMotile) ?></div></th>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
        <th data-name="Immotile" class="<?= $Page->Immotile->headerCellClass() ?>"><div id="elh_view_semenanalysis_Immotile" class="view_semenanalysis_Immotile"><?= $Page->renderSort($Page->Immotile) ?></div></th>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <th data-name="TotalProgrssiveMotile" class="<?= $Page->TotalProgrssiveMotile->headerCellClass() ?>"><div id="elh_view_semenanalysis_TotalProgrssiveMotile" class="view_semenanalysis_TotalProgrssiveMotile"><?= $Page->renderSort($Page->TotalProgrssiveMotile) ?></div></th>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
        <th data-name="Appearance" class="<?= $Page->Appearance->headerCellClass() ?>"><div id="elh_view_semenanalysis_Appearance" class="view_semenanalysis_Appearance"><?= $Page->renderSort($Page->Appearance) ?></div></th>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
        <th data-name="Homogenosity" class="<?= $Page->Homogenosity->headerCellClass() ?>"><div id="elh_view_semenanalysis_Homogenosity" class="view_semenanalysis_Homogenosity"><?= $Page->renderSort($Page->Homogenosity) ?></div></th>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
        <th data-name="CompleteSample" class="<?= $Page->CompleteSample->headerCellClass() ?>"><div id="elh_view_semenanalysis_CompleteSample" class="view_semenanalysis_CompleteSample"><?= $Page->renderSort($Page->CompleteSample) ?></div></th>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <th data-name="Liquefactiontime" class="<?= $Page->Liquefactiontime->headerCellClass() ?>"><div id="elh_view_semenanalysis_Liquefactiontime" class="view_semenanalysis_Liquefactiontime"><?= $Page->renderSort($Page->Liquefactiontime) ?></div></th>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
        <th data-name="Normal" class="<?= $Page->Normal->headerCellClass() ?>"><div id="elh_view_semenanalysis_Normal" class="view_semenanalysis_Normal"><?= $Page->renderSort($Page->Normal) ?></div></th>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <th data-name="Abnormal" class="<?= $Page->Abnormal->headerCellClass() ?>"><div id="elh_view_semenanalysis_Abnormal" class="view_semenanalysis_Abnormal"><?= $Page->renderSort($Page->Abnormal) ?></div></th>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
        <th data-name="Headdefects" class="<?= $Page->Headdefects->headerCellClass() ?>"><div id="elh_view_semenanalysis_Headdefects" class="view_semenanalysis_Headdefects"><?= $Page->renderSort($Page->Headdefects) ?></div></th>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <th data-name="MidpieceDefects" class="<?= $Page->MidpieceDefects->headerCellClass() ?>"><div id="elh_view_semenanalysis_MidpieceDefects" class="view_semenanalysis_MidpieceDefects"><?= $Page->renderSort($Page->MidpieceDefects) ?></div></th>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
        <th data-name="TailDefects" class="<?= $Page->TailDefects->headerCellClass() ?>"><div id="elh_view_semenanalysis_TailDefects" class="view_semenanalysis_TailDefects"><?= $Page->renderSort($Page->TailDefects) ?></div></th>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <th data-name="NormalProgMotile" class="<?= $Page->NormalProgMotile->headerCellClass() ?>"><div id="elh_view_semenanalysis_NormalProgMotile" class="view_semenanalysis_NormalProgMotile"><?= $Page->renderSort($Page->NormalProgMotile) ?></div></th>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
        <th data-name="ImmatureForms" class="<?= $Page->ImmatureForms->headerCellClass() ?>"><div id="elh_view_semenanalysis_ImmatureForms" class="view_semenanalysis_ImmatureForms"><?= $Page->renderSort($Page->ImmatureForms) ?></div></th>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
        <th data-name="Leucocytes" class="<?= $Page->Leucocytes->headerCellClass() ?>"><div id="elh_view_semenanalysis_Leucocytes" class="view_semenanalysis_Leucocytes"><?= $Page->renderSort($Page->Leucocytes) ?></div></th>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
        <th data-name="Agglutination" class="<?= $Page->Agglutination->headerCellClass() ?>"><div id="elh_view_semenanalysis_Agglutination" class="view_semenanalysis_Agglutination"><?= $Page->renderSort($Page->Agglutination) ?></div></th>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
        <th data-name="Debris" class="<?= $Page->Debris->headerCellClass() ?>"><div id="elh_view_semenanalysis_Debris" class="view_semenanalysis_Debris"><?= $Page->renderSort($Page->Debris) ?></div></th>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
        <th data-name="Signature" class="<?= $Page->Signature->headerCellClass() ?>"><div id="elh_view_semenanalysis_Signature" class="view_semenanalysis_Signature"><?= $Page->renderSort($Page->Signature) ?></div></th>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
        <th data-name="SemenOrgin" class="<?= $Page->SemenOrgin->headerCellClass() ?>"><div id="elh_view_semenanalysis_SemenOrgin" class="view_semenanalysis_SemenOrgin"><?= $Page->renderSort($Page->SemenOrgin) ?></div></th>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
        <th data-name="Donor" class="<?= $Page->Donor->headerCellClass() ?>"><div id="elh_view_semenanalysis_Donor" class="view_semenanalysis_Donor"><?= $Page->renderSort($Page->Donor) ?></div></th>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <th data-name="DonorBloodgroup" class="<?= $Page->DonorBloodgroup->headerCellClass() ?>"><div id="elh_view_semenanalysis_DonorBloodgroup" class="view_semenanalysis_DonorBloodgroup"><?= $Page->renderSort($Page->DonorBloodgroup) ?></div></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th data-name="Tank" class="<?= $Page->Tank->headerCellClass() ?>"><div id="elh_view_semenanalysis_Tank" class="view_semenanalysis_Tank"><?= $Page->renderSort($Page->Tank) ?></div></th>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
        <th data-name="Location" class="<?= $Page->Location->headerCellClass() ?>"><div id="elh_view_semenanalysis_Location" class="view_semenanalysis_Location"><?= $Page->renderSort($Page->Location) ?></div></th>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <th data-name="Volume1" class="<?= $Page->Volume1->headerCellClass() ?>"><div id="elh_view_semenanalysis_Volume1" class="view_semenanalysis_Volume1"><?= $Page->renderSort($Page->Volume1) ?></div></th>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
        <th data-name="Concentration1" class="<?= $Page->Concentration1->headerCellClass() ?>"><div id="elh_view_semenanalysis_Concentration1" class="view_semenanalysis_Concentration1"><?= $Page->renderSort($Page->Concentration1) ?></div></th>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
        <th data-name="Total1" class="<?= $Page->Total1->headerCellClass() ?>"><div id="elh_view_semenanalysis_Total1" class="view_semenanalysis_Total1"><?= $Page->renderSort($Page->Total1) ?></div></th>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <th data-name="ProgressiveMotility1" class="<?= $Page->ProgressiveMotility1->headerCellClass() ?>"><div id="elh_view_semenanalysis_ProgressiveMotility1" class="view_semenanalysis_ProgressiveMotility1"><?= $Page->renderSort($Page->ProgressiveMotility1) ?></div></th>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <th data-name="NonProgrssiveMotile1" class="<?= $Page->NonProgrssiveMotile1->headerCellClass() ?>"><div id="elh_view_semenanalysis_NonProgrssiveMotile1" class="view_semenanalysis_NonProgrssiveMotile1"><?= $Page->renderSort($Page->NonProgrssiveMotile1) ?></div></th>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
        <th data-name="Immotile1" class="<?= $Page->Immotile1->headerCellClass() ?>"><div id="elh_view_semenanalysis_Immotile1" class="view_semenanalysis_Immotile1"><?= $Page->renderSort($Page->Immotile1) ?></div></th>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <th data-name="TotalProgrssiveMotile1" class="<?= $Page->TotalProgrssiveMotile1->headerCellClass() ?>"><div id="elh_view_semenanalysis_TotalProgrssiveMotile1" class="view_semenanalysis_TotalProgrssiveMotile1"><?= $Page->renderSort($Page->TotalProgrssiveMotile1) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_view_semenanalysis_TidNo" class="view_semenanalysis_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
        <th data-name="Color" class="<?= $Page->Color->headerCellClass() ?>"><div id="elh_view_semenanalysis_Color" class="view_semenanalysis_Color"><?= $Page->renderSort($Page->Color) ?></div></th>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
        <th data-name="DoneBy" class="<?= $Page->DoneBy->headerCellClass() ?>"><div id="elh_view_semenanalysis_DoneBy" class="view_semenanalysis_DoneBy"><?= $Page->renderSort($Page->DoneBy) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_view_semenanalysis_Method" class="view_semenanalysis_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
        <th data-name="Abstinence" class="<?= $Page->Abstinence->headerCellClass() ?>"><div id="elh_view_semenanalysis_Abstinence" class="view_semenanalysis_Abstinence"><?= $Page->renderSort($Page->Abstinence) ?></div></th>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
        <th data-name="ProcessedBy" class="<?= $Page->ProcessedBy->headerCellClass() ?>"><div id="elh_view_semenanalysis_ProcessedBy" class="view_semenanalysis_ProcessedBy"><?= $Page->renderSort($Page->ProcessedBy) ?></div></th>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
        <th data-name="InseminationTime" class="<?= $Page->InseminationTime->headerCellClass() ?>"><div id="elh_view_semenanalysis_InseminationTime" class="view_semenanalysis_InseminationTime"><?= $Page->renderSort($Page->InseminationTime) ?></div></th>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
        <th data-name="InseminationBy" class="<?= $Page->InseminationBy->headerCellClass() ?>"><div id="elh_view_semenanalysis_InseminationBy" class="view_semenanalysis_InseminationBy"><?= $Page->renderSort($Page->InseminationBy) ?></div></th>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
        <th data-name="Big" class="<?= $Page->Big->headerCellClass() ?>"><div id="elh_view_semenanalysis_Big" class="view_semenanalysis_Big"><?= $Page->renderSort($Page->Big) ?></div></th>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
        <th data-name="Medium" class="<?= $Page->Medium->headerCellClass() ?>"><div id="elh_view_semenanalysis_Medium" class="view_semenanalysis_Medium"><?= $Page->renderSort($Page->Medium) ?></div></th>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
        <th data-name="Small" class="<?= $Page->Small->headerCellClass() ?>"><div id="elh_view_semenanalysis_Small" class="view_semenanalysis_Small"><?= $Page->renderSort($Page->Small) ?></div></th>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
        <th data-name="NoHalo" class="<?= $Page->NoHalo->headerCellClass() ?>"><div id="elh_view_semenanalysis_NoHalo" class="view_semenanalysis_NoHalo"><?= $Page->renderSort($Page->NoHalo) ?></div></th>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
        <th data-name="Fragmented" class="<?= $Page->Fragmented->headerCellClass() ?>"><div id="elh_view_semenanalysis_Fragmented" class="view_semenanalysis_Fragmented"><?= $Page->renderSort($Page->Fragmented) ?></div></th>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
        <th data-name="NonFragmented" class="<?= $Page->NonFragmented->headerCellClass() ?>"><div id="elh_view_semenanalysis_NonFragmented" class="view_semenanalysis_NonFragmented"><?= $Page->renderSort($Page->NonFragmented) ?></div></th>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
        <th data-name="DFI" class="<?= $Page->DFI->headerCellClass() ?>"><div id="elh_view_semenanalysis_DFI" class="view_semenanalysis_DFI"><?= $Page->renderSort($Page->DFI) ?></div></th>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
        <th data-name="IsueBy" class="<?= $Page->IsueBy->headerCellClass() ?>"><div id="elh_view_semenanalysis_IsueBy" class="view_semenanalysis_IsueBy"><?= $Page->renderSort($Page->IsueBy) ?></div></th>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <th data-name="Volume2" class="<?= $Page->Volume2->headerCellClass() ?>"><div id="elh_view_semenanalysis_Volume2" class="view_semenanalysis_Volume2"><?= $Page->renderSort($Page->Volume2) ?></div></th>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <th data-name="Concentration2" class="<?= $Page->Concentration2->headerCellClass() ?>"><div id="elh_view_semenanalysis_Concentration2" class="view_semenanalysis_Concentration2"><?= $Page->renderSort($Page->Concentration2) ?></div></th>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
        <th data-name="Total2" class="<?= $Page->Total2->headerCellClass() ?>"><div id="elh_view_semenanalysis_Total2" class="view_semenanalysis_Total2"><?= $Page->renderSort($Page->Total2) ?></div></th>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <th data-name="ProgressiveMotility2" class="<?= $Page->ProgressiveMotility2->headerCellClass() ?>"><div id="elh_view_semenanalysis_ProgressiveMotility2" class="view_semenanalysis_ProgressiveMotility2"><?= $Page->renderSort($Page->ProgressiveMotility2) ?></div></th>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <th data-name="NonProgrssiveMotile2" class="<?= $Page->NonProgrssiveMotile2->headerCellClass() ?>"><div id="elh_view_semenanalysis_NonProgrssiveMotile2" class="view_semenanalysis_NonProgrssiveMotile2"><?= $Page->renderSort($Page->NonProgrssiveMotile2) ?></div></th>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
        <th data-name="Immotile2" class="<?= $Page->Immotile2->headerCellClass() ?>"><div id="elh_view_semenanalysis_Immotile2" class="view_semenanalysis_Immotile2"><?= $Page->renderSort($Page->Immotile2) ?></div></th>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <th data-name="TotalProgrssiveMotile2" class="<?= $Page->TotalProgrssiveMotile2->headerCellClass() ?>"><div id="elh_view_semenanalysis_TotalProgrssiveMotile2" class="view_semenanalysis_TotalProgrssiveMotile2"><?= $Page->renderSort($Page->TotalProgrssiveMotile2) ?></div></th>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <th data-name="IssuedBy" class="<?= $Page->IssuedBy->headerCellClass() ?>"><div id="elh_view_semenanalysis_IssuedBy" class="view_semenanalysis_IssuedBy"><?= $Page->renderSort($Page->IssuedBy) ?></div></th>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <th data-name="IssuedTo" class="<?= $Page->IssuedTo->headerCellClass() ?>"><div id="elh_view_semenanalysis_IssuedTo" class="view_semenanalysis_IssuedTo"><?= $Page->renderSort($Page->IssuedTo) ?></div></th>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
        <th data-name="PaID" class="<?= $Page->PaID->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaID" class="view_semenanalysis_PaID"><?= $Page->renderSort($Page->PaID) ?></div></th>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
        <th data-name="PaName" class="<?= $Page->PaName->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaName" class="view_semenanalysis_PaName"><?= $Page->renderSort($Page->PaName) ?></div></th>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
        <th data-name="PaMobile" class="<?= $Page->PaMobile->headerCellClass() ?>"><div id="elh_view_semenanalysis_PaMobile" class="view_semenanalysis_PaMobile"><?= $Page->renderSort($Page->PaMobile) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerID" class="view_semenanalysis_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerName" class="view_semenanalysis_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <th data-name="PartnerMobile" class="<?= $Page->PartnerMobile->headerCellClass() ?>"><div id="elh_view_semenanalysis_PartnerMobile" class="view_semenanalysis_PartnerMobile"><?= $Page->renderSort($Page->PartnerMobile) ?></div></th>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
        <th data-name="MACS" class="<?= $Page->MACS->headerCellClass() ?>"><div id="elh_view_semenanalysis_MACS" class="view_semenanalysis_MACS"><?= $Page->renderSort($Page->MACS) ?></div></th>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <th data-name="PREG_TEST_DATE" class="<?= $Page->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_view_semenanalysis_PREG_TEST_DATE" class="view_semenanalysis_PREG_TEST_DATE"><?= $Page->renderSort($Page->PREG_TEST_DATE) ?></div></th>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <th data-name="SPECIFIC_PROBLEMS" class="<?= $Page->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_view_semenanalysis_SPECIFIC_PROBLEMS" class="view_semenanalysis_SPECIFIC_PROBLEMS"><?= $Page->renderSort($Page->SPECIFIC_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <th data-name="IMSC_1" class="<?= $Page->IMSC_1->headerCellClass() ?>"><div id="elh_view_semenanalysis_IMSC_1" class="view_semenanalysis_IMSC_1"><?= $Page->renderSort($Page->IMSC_1) ?></div></th>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <th data-name="IMSC_2" class="<?= $Page->IMSC_2->headerCellClass() ?>"><div id="elh_view_semenanalysis_IMSC_2" class="view_semenanalysis_IMSC_2"><?= $Page->renderSort($Page->IMSC_2) ?></div></th>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <th data-name="LIQUIFACTION_STORAGE" class="<?= $Page->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_view_semenanalysis_LIQUIFACTION_STORAGE" class="view_semenanalysis_LIQUIFACTION_STORAGE"><?= $Page->renderSort($Page->LIQUIFACTION_STORAGE) ?></div></th>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <th data-name="IUI_PREP_METHOD" class="<?= $Page->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_view_semenanalysis_IUI_PREP_METHOD" class="view_semenanalysis_IUI_PREP_METHOD"><?= $Page->renderSort($Page->IUI_PREP_METHOD) ?></div></th>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <th data-name="TIME_FROM_TRIGGER" class="<?= $Page->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_view_semenanalysis_TIME_FROM_TRIGGER" class="view_semenanalysis_TIME_FROM_TRIGGER"><?= $Page->renderSort($Page->TIME_FROM_TRIGGER) ?></div></th>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <th data-name="COLLECTION_TO_PREPARATION" class="<?= $Page->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_view_semenanalysis_COLLECTION_TO_PREPARATION" class="view_semenanalysis_COLLECTION_TO_PREPARATION"><?= $Page->renderSort($Page->COLLECTION_TO_PREPARATION) ?></div></th>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <th data-name="TIME_FROM_PREP_TO_INSEM" class="<?= $Page->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" class="view_semenanalysis_TIME_FROM_PREP_TO_INSEM"><?= $Page->renderSort($Page->TIME_FROM_PREP_TO_INSEM) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_semenanalysis", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <td data-name="HusbandName" <?= $Page->HusbandName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_HusbandName">
<span<?= $Page->HusbandName->viewAttributes() ?>>
<?= $Page->HusbandName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <td data-name="RequestDr" <?= $Page->RequestDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_RequestDr">
<span<?= $Page->RequestDr->viewAttributes() ?>>
<?= $Page->RequestDr->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <td data-name="CollectionDate" <?= $Page->CollectionDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_CollectionDate">
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<?= $Page->CollectionDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <td data-name="RequestSample" <?= $Page->RequestSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_RequestSample">
<span<?= $Page->RequestSample->viewAttributes() ?>>
<?= $Page->RequestSample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CollectionType->Visible) { // CollectionType ?>
        <td data-name="CollectionType" <?= $Page->CollectionType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_CollectionType">
<span<?= $Page->CollectionType->viewAttributes() ?>>
<?= $Page->CollectionType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
        <td data-name="CollectionMethod" <?= $Page->CollectionMethod->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_CollectionMethod">
<span<?= $Page->CollectionMethod->viewAttributes() ?>>
<?= $Page->CollectionMethod->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Medicationused->Visible) { // Medicationused ?>
        <td data-name="Medicationused" <?= $Page->Medicationused->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Medicationused">
<span<?= $Page->Medicationused->viewAttributes() ?>>
<?= $Page->Medicationused->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <td data-name="DifficultiesinCollection" <?= $Page->DifficultiesinCollection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_DifficultiesinCollection">
<span<?= $Page->DifficultiesinCollection->viewAttributes() ?>>
<?= $Page->DifficultiesinCollection->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume->Visible) { // Volume ?>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pH->Visible) { // pH ?>
        <td data-name="pH" <?= $Page->pH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_pH">
<span<?= $Page->pH->viewAttributes() ?>>
<?= $Page->pH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
        <td data-name="Timeofcollection" <?= $Page->Timeofcollection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Timeofcollection">
<span<?= $Page->Timeofcollection->viewAttributes() ?>>
<?= $Page->Timeofcollection->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
        <td data-name="Timeofexamination" <?= $Page->Timeofexamination->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Timeofexamination">
<span<?= $Page->Timeofexamination->viewAttributes() ?>>
<?= $Page->Timeofexamination->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Concentration->Visible) { // Concentration ?>
        <td data-name="Concentration" <?= $Page->Concentration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Concentration">
<span<?= $Page->Concentration->viewAttributes() ?>>
<?= $Page->Concentration->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total->Visible) { // Total ?>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <td data-name="ProgressiveMotility" <?= $Page->ProgressiveMotility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_ProgressiveMotility">
<span<?= $Page->ProgressiveMotility->viewAttributes() ?>>
<?= $Page->ProgressiveMotility->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <td data-name="NonProgrssiveMotile" <?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_NonProgrssiveMotile">
<span<?= $Page->NonProgrssiveMotile->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Immotile->Visible) { // Immotile ?>
        <td data-name="Immotile" <?= $Page->Immotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Immotile">
<span<?= $Page->Immotile->viewAttributes() ?>>
<?= $Page->Immotile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <td data-name="TotalProgrssiveMotile" <?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TotalProgrssiveMotile">
<span<?= $Page->TotalProgrssiveMotile->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Appearance->Visible) { // Appearance ?>
        <td data-name="Appearance" <?= $Page->Appearance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Appearance">
<span<?= $Page->Appearance->viewAttributes() ?>>
<?= $Page->Appearance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
        <td data-name="Homogenosity" <?= $Page->Homogenosity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Homogenosity">
<span<?= $Page->Homogenosity->viewAttributes() ?>>
<?= $Page->Homogenosity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
        <td data-name="CompleteSample" <?= $Page->CompleteSample->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_CompleteSample">
<span<?= $Page->CompleteSample->viewAttributes() ?>>
<?= $Page->CompleteSample->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <td data-name="Liquefactiontime" <?= $Page->Liquefactiontime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Liquefactiontime">
<span<?= $Page->Liquefactiontime->viewAttributes() ?>>
<?= $Page->Liquefactiontime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Normal->Visible) { // Normal ?>
        <td data-name="Normal" <?= $Page->Normal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Normal">
<span<?= $Page->Normal->viewAttributes() ?>>
<?= $Page->Normal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Headdefects->Visible) { // Headdefects ?>
        <td data-name="Headdefects" <?= $Page->Headdefects->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Headdefects">
<span<?= $Page->Headdefects->viewAttributes() ?>>
<?= $Page->Headdefects->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <td data-name="MidpieceDefects" <?= $Page->MidpieceDefects->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_MidpieceDefects">
<span<?= $Page->MidpieceDefects->viewAttributes() ?>>
<?= $Page->MidpieceDefects->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TailDefects->Visible) { // TailDefects ?>
        <td data-name="TailDefects" <?= $Page->TailDefects->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TailDefects">
<span<?= $Page->TailDefects->viewAttributes() ?>>
<?= $Page->TailDefects->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <td data-name="NormalProgMotile" <?= $Page->NormalProgMotile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_NormalProgMotile">
<span<?= $Page->NormalProgMotile->viewAttributes() ?>>
<?= $Page->NormalProgMotile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
        <td data-name="ImmatureForms" <?= $Page->ImmatureForms->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_ImmatureForms">
<span<?= $Page->ImmatureForms->viewAttributes() ?>>
<?= $Page->ImmatureForms->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
        <td data-name="Leucocytes" <?= $Page->Leucocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Leucocytes">
<span<?= $Page->Leucocytes->viewAttributes() ?>>
<?= $Page->Leucocytes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Agglutination->Visible) { // Agglutination ?>
        <td data-name="Agglutination" <?= $Page->Agglutination->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Agglutination">
<span<?= $Page->Agglutination->viewAttributes() ?>>
<?= $Page->Agglutination->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Debris->Visible) { // Debris ?>
        <td data-name="Debris" <?= $Page->Debris->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Debris">
<span<?= $Page->Debris->viewAttributes() ?>>
<?= $Page->Debris->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Signature->Visible) { // Signature ?>
        <td data-name="Signature" <?= $Page->Signature->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Signature">
<span<?= $Page->Signature->viewAttributes() ?>>
<?= $Page->Signature->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
        <td data-name="SemenOrgin" <?= $Page->SemenOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_SemenOrgin">
<span<?= $Page->SemenOrgin->viewAttributes() ?>>
<?= $Page->SemenOrgin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Donor->Visible) { // Donor ?>
        <td data-name="Donor" <?= $Page->Donor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Donor">
<span<?= $Page->Donor->viewAttributes() ?>>
<?= $Page->Donor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <td data-name="DonorBloodgroup" <?= $Page->DonorBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_DonorBloodgroup">
<span<?= $Page->DonorBloodgroup->viewAttributes() ?>>
<?= $Page->DonorBloodgroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Location->Visible) { // Location ?>
        <td data-name="Location" <?= $Page->Location->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Location">
<span<?= $Page->Location->viewAttributes() ?>>
<?= $Page->Location->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <td data-name="Volume1" <?= $Page->Volume1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
        <td data-name="Concentration1" <?= $Page->Concentration1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Concentration1">
<span<?= $Page->Concentration1->viewAttributes() ?>>
<?= $Page->Concentration1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total1->Visible) { // Total1 ?>
        <td data-name="Total1" <?= $Page->Total1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <td data-name="ProgressiveMotility1" <?= $Page->ProgressiveMotility1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_ProgressiveMotility1">
<span<?= $Page->ProgressiveMotility1->viewAttributes() ?>>
<?= $Page->ProgressiveMotility1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <td data-name="NonProgrssiveMotile1" <?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_NonProgrssiveMotile1">
<span<?= $Page->NonProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
        <td data-name="Immotile1" <?= $Page->Immotile1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Immotile1">
<span<?= $Page->Immotile1->viewAttributes() ?>>
<?= $Page->Immotile1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <td data-name="TotalProgrssiveMotile1" <?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TotalProgrssiveMotile1">
<span<?= $Page->TotalProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Color->Visible) { // Color ?>
        <td data-name="Color" <?= $Page->Color->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Color">
<span<?= $Page->Color->viewAttributes() ?>>
<?= $Page->Color->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DoneBy->Visible) { // DoneBy ?>
        <td data-name="DoneBy" <?= $Page->DoneBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_DoneBy">
<span<?= $Page->DoneBy->viewAttributes() ?>>
<?= $Page->DoneBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Abstinence->Visible) { // Abstinence ?>
        <td data-name="Abstinence" <?= $Page->Abstinence->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Abstinence">
<span<?= $Page->Abstinence->viewAttributes() ?>>
<?= $Page->Abstinence->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
        <td data-name="ProcessedBy" <?= $Page->ProcessedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_ProcessedBy">
<span<?= $Page->ProcessedBy->viewAttributes() ?>>
<?= $Page->ProcessedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
        <td data-name="InseminationTime" <?= $Page->InseminationTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_InseminationTime">
<span<?= $Page->InseminationTime->viewAttributes() ?>>
<?= $Page->InseminationTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
        <td data-name="InseminationBy" <?= $Page->InseminationBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_InseminationBy">
<span<?= $Page->InseminationBy->viewAttributes() ?>>
<?= $Page->InseminationBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Big->Visible) { // Big ?>
        <td data-name="Big" <?= $Page->Big->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Big">
<span<?= $Page->Big->viewAttributes() ?>>
<?= $Page->Big->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Medium->Visible) { // Medium ?>
        <td data-name="Medium" <?= $Page->Medium->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Medium">
<span<?= $Page->Medium->viewAttributes() ?>>
<?= $Page->Medium->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Small->Visible) { // Small ?>
        <td data-name="Small" <?= $Page->Small->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Small">
<span<?= $Page->Small->viewAttributes() ?>>
<?= $Page->Small->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoHalo->Visible) { // NoHalo ?>
        <td data-name="NoHalo" <?= $Page->NoHalo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_NoHalo">
<span<?= $Page->NoHalo->viewAttributes() ?>>
<?= $Page->NoHalo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fragmented->Visible) { // Fragmented ?>
        <td data-name="Fragmented" <?= $Page->Fragmented->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Fragmented">
<span<?= $Page->Fragmented->viewAttributes() ?>>
<?= $Page->Fragmented->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
        <td data-name="NonFragmented" <?= $Page->NonFragmented->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_NonFragmented">
<span<?= $Page->NonFragmented->viewAttributes() ?>>
<?= $Page->NonFragmented->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DFI->Visible) { // DFI ?>
        <td data-name="DFI" <?= $Page->DFI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_DFI">
<span<?= $Page->DFI->viewAttributes() ?>>
<?= $Page->DFI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IsueBy->Visible) { // IsueBy ?>
        <td data-name="IsueBy" <?= $Page->IsueBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_IsueBy">
<span<?= $Page->IsueBy->viewAttributes() ?>>
<?= $Page->IsueBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <td data-name="Volume2" <?= $Page->Volume2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <td data-name="Concentration2" <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total2->Visible) { // Total2 ?>
        <td data-name="Total2" <?= $Page->Total2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <td data-name="ProgressiveMotility2" <?= $Page->ProgressiveMotility2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_ProgressiveMotility2">
<span<?= $Page->ProgressiveMotility2->viewAttributes() ?>>
<?= $Page->ProgressiveMotility2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <td data-name="NonProgrssiveMotile2" <?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_NonProgrssiveMotile2">
<span<?= $Page->NonProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
        <td data-name="Immotile2" <?= $Page->Immotile2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_Immotile2">
<span<?= $Page->Immotile2->viewAttributes() ?>>
<?= $Page->Immotile2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <td data-name="TotalProgrssiveMotile2" <?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TotalProgrssiveMotile2">
<span<?= $Page->TotalProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <td data-name="IssuedBy" <?= $Page->IssuedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_IssuedBy">
<span<?= $Page->IssuedBy->viewAttributes() ?>>
<?= $Page->IssuedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <td data-name="IssuedTo" <?= $Page->IssuedTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_IssuedTo">
<span<?= $Page->IssuedTo->viewAttributes() ?>>
<?= $Page->IssuedTo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaID->Visible) { // PaID ?>
        <td data-name="PaID" <?= $Page->PaID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PaID">
<span<?= $Page->PaID->viewAttributes() ?>>
<?= $Page->PaID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaName->Visible) { // PaName ?>
        <td data-name="PaName" <?= $Page->PaName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PaName">
<span<?= $Page->PaName->viewAttributes() ?>>
<?= $Page->PaName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PaMobile->Visible) { // PaMobile ?>
        <td data-name="PaMobile" <?= $Page->PaMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PaMobile">
<span<?= $Page->PaMobile->viewAttributes() ?>>
<?= $Page->PaMobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <td data-name="PartnerMobile" <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MACS->Visible) { // MACS ?>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <td data-name="PREG_TEST_DATE" <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_PREG_TEST_DATE">
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <td data-name="SPECIFIC_PROBLEMS" <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_SPECIFIC_PROBLEMS">
<span<?= $Page->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <td data-name="IMSC_1" <?= $Page->IMSC_1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_IMSC_1">
<span<?= $Page->IMSC_1->viewAttributes() ?>>
<?= $Page->IMSC_1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <td data-name="IMSC_2" <?= $Page->IMSC_2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_IMSC_2">
<span<?= $Page->IMSC_2->viewAttributes() ?>>
<?= $Page->IMSC_2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <td data-name="LIQUIFACTION_STORAGE" <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_LIQUIFACTION_STORAGE">
<span<?= $Page->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Page->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <td data-name="IUI_PREP_METHOD" <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_IUI_PREP_METHOD">
<span<?= $Page->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Page->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <td data-name="TIME_FROM_TRIGGER" <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TIME_FROM_TRIGGER">
<span<?= $Page->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Page->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <td data-name="COLLECTION_TO_PREPARATION" <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_COLLECTION_TO_PREPARATION">
<span<?= $Page->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Page->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <td data-name="TIME_FROM_PREP_TO_INSEM" <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_semenanalysis_TIME_FROM_PREP_TO_INSEM">
<span<?= $Page->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Page->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
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
    ew.addEventHandlers("view_semenanalysis");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
