<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewTemplateCoupleVitalsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_template_couple_vitalslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_template_couple_vitalslist = currentForm = new ew.Form("fview_template_couple_vitalslist", "list");
    fview_template_couple_vitalslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_template_couple_vitalslist");
});
var fview_template_couple_vitalslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_template_couple_vitalslistsrch = currentSearchForm = new ew.Form("fview_template_couple_vitalslistsrch");

    // Dynamic selection lists

    // Filters
    fview_template_couple_vitalslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_template_couple_vitalslistsrch");
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
<form name="fview_template_couple_vitalslistsrch" id="fview_template_couple_vitalslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_template_couple_vitalslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_template_couple_vitals">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_template_couple_vitals">
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
<form name="fview_template_couple_vitalslist" id="fview_template_couple_vitalslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_template_couple_vitals">
<div id="gmp_view_template_couple_vitals" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_template_couple_vitalslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_id" class="view_template_couple_vitals_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
        <th data-name="Male" class="<?= $Page->Male->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Male" class="view_template_couple_vitals_Male"><?= $Page->renderSort($Page->Male) ?></div></th>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
        <th data-name="Female" class="<?= $Page->Female->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Female" class="view_template_couple_vitals_Female"><?= $Page->renderSort($Page->Female) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_status" class="view_template_couple_vitals_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_createdby" class="view_template_couple_vitals_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_createddatetime" class="view_template_couple_vitals_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_modifiedby" class="view_template_couple_vitals_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_modifieddatetime" class="view_template_couple_vitals_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <th data-name="HusbandEducation" class="<?= $Page->HusbandEducation->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandEducation" class="view_template_couple_vitals_HusbandEducation"><?= $Page->renderSort($Page->HusbandEducation) ?></div></th>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <th data-name="WifeEducation" class="<?= $Page->WifeEducation->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeEducation" class="view_template_couple_vitals_WifeEducation"><?= $Page->renderSort($Page->WifeEducation) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <th data-name="HusbandWorkHours" class="<?= $Page->HusbandWorkHours->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandWorkHours" class="view_template_couple_vitals_HusbandWorkHours"><?= $Page->renderSort($Page->HusbandWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <th data-name="WifeWorkHours" class="<?= $Page->WifeWorkHours->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeWorkHours" class="view_template_couple_vitals_WifeWorkHours"><?= $Page->renderSort($Page->WifeWorkHours) ?></div></th>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <th data-name="PatientLanguage" class="<?= $Page->PatientLanguage->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PatientLanguage" class="view_template_couple_vitals_PatientLanguage"><?= $Page->renderSort($Page->PatientLanguage) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <th data-name="ReferedBy" class="<?= $Page->ReferedBy->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_ReferedBy" class="view_template_couple_vitals_ReferedBy"><?= $Page->renderSort($Page->ReferedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <th data-name="ReferPhNo" class="<?= $Page->ReferPhNo->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_ReferPhNo" class="view_template_couple_vitals_ReferPhNo"><?= $Page->renderSort($Page->ReferPhNo) ?></div></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th data-name="WifeCell" class="<?= $Page->WifeCell->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeCell" class="view_template_couple_vitals_WifeCell"><?= $Page->renderSort($Page->WifeCell) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th data-name="HusbandCell" class="<?= $Page->HusbandCell->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandCell" class="view_template_couple_vitals_HusbandCell"><?= $Page->renderSort($Page->HusbandCell) ?></div></th>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <th data-name="WifeEmail" class="<?= $Page->WifeEmail->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_WifeEmail" class="view_template_couple_vitals_WifeEmail"><?= $Page->renderSort($Page->WifeEmail) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <th data-name="HusbandEmail" class="<?= $Page->HusbandEmail->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HusbandEmail" class="view_template_couple_vitals_HusbandEmail"><?= $Page->renderSort($Page->HusbandEmail) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_ARTCYCLE" class="view_template_couple_vitals_ARTCYCLE"><?= $Page->renderSort($Page->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Page->RESULT->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_RESULT" class="view_template_couple_vitals_RESULT"><?= $Page->renderSort($Page->RESULT) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CoupleID" class="view_template_couple_vitals_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_HospID" class="view_template_couple_vitals_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PatientName" class="view_template_couple_vitals_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PatientID" class="view_template_couple_vitals_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PartnerName" class="view_template_couple_vitals_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PartnerID" class="view_template_couple_vitals_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_DrID" class="view_template_couple_vitals_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th data-name="DrDepartment" class="<?= $Page->DrDepartment->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_DrDepartment" class="view_template_couple_vitals_DrDepartment"><?= $Page->renderSort($Page->DrDepartment) ?></div></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th data-name="Doctor" class="<?= $Page->Doctor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Doctor" class="view_template_couple_vitals_Doctor"><?= $Page->renderSort($Page->Doctor) ?></div></th>
<?php } ?>
<?php if ($Page->hid->Visible) { // hid ?>
        <th data-name="hid" class="<?= $Page->hid->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_hid" class="view_template_couple_vitals_hid"><?= $Page->renderSort($Page->hid) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_RIDNO" class="view_template_couple_vitals_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Name" class="view_template_couple_vitals_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Age" class="view_template_couple_vitals_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
        <th data-name="SEX" class="<?= $Page->SEX->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_SEX" class="view_template_couple_vitals_SEX"><?= $Page->renderSort($Page->SEX) ?></div></th>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <th data-name="Religion" class="<?= $Page->Religion->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Religion" class="view_template_couple_vitals_Religion"><?= $Page->renderSort($Page->Religion) ?></div></th>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
        <th data-name="Address" class="<?= $Page->Address->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Address" class="view_template_couple_vitals_Address"><?= $Page->renderSort($Page->Address) ?></div></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th data-name="IdentificationMark" class="<?= $Page->IdentificationMark->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_IdentificationMark" class="view_template_couple_vitals_IdentificationMark"><?= $Page->renderSort($Page->IdentificationMark) ?></div></th>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
        <th data-name="MedicalHistory" class="<?= $Page->MedicalHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MedicalHistory" class="view_template_couple_vitals_MedicalHistory"><?= $Page->renderSort($Page->MedicalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <th data-name="SurgicalHistory" class="<?= $Page->SurgicalHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_SurgicalHistory" class="view_template_couple_vitals_SurgicalHistory"><?= $Page->renderSort($Page->SurgicalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
        <th data-name="Generalexaminationpallor" class="<?= $Page->Generalexaminationpallor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Generalexaminationpallor" class="view_template_couple_vitals_Generalexaminationpallor"><?= $Page->renderSort($Page->Generalexaminationpallor) ?></div></th>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <th data-name="PR" class="<?= $Page->PR->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PR" class="view_template_couple_vitals_PR"><?= $Page->renderSort($Page->PR) ?></div></th>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <th data-name="CVS" class="<?= $Page->CVS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CVS" class="view_template_couple_vitals_CVS"><?= $Page->renderSort($Page->CVS) ?></div></th>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <th data-name="PA" class="<?= $Page->PA->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PA" class="view_template_couple_vitals_PA"><?= $Page->renderSort($Page->PA) ?></div></th>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <th data-name="PROVISIONALDIAGNOSIS" class="<?= $Page->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PROVISIONALDIAGNOSIS" class="view_template_couple_vitals_PROVISIONALDIAGNOSIS"><?= $Page->renderSort($Page->PROVISIONALDIAGNOSIS) ?></div></th>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
        <th data-name="Investigations" class="<?= $Page->Investigations->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Investigations" class="view_template_couple_vitals_Investigations"><?= $Page->renderSort($Page->Investigations) ?></div></th>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
        <th data-name="Fheight" class="<?= $Page->Fheight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Fheight" class="view_template_couple_vitals_Fheight"><?= $Page->renderSort($Page->Fheight) ?></div></th>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
        <th data-name="Fweight" class="<?= $Page->Fweight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Fweight" class="view_template_couple_vitals_Fweight"><?= $Page->renderSort($Page->Fweight) ?></div></th>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <th data-name="FBMI" class="<?= $Page->FBMI->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FBMI" class="view_template_couple_vitals_FBMI"><?= $Page->renderSort($Page->FBMI) ?></div></th>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
        <th data-name="FBloodgroup" class="<?= $Page->FBloodgroup->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FBloodgroup" class="view_template_couple_vitals_FBloodgroup"><?= $Page->renderSort($Page->FBloodgroup) ?></div></th>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
        <th data-name="Mheight" class="<?= $Page->Mheight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Mheight" class="view_template_couple_vitals_Mheight"><?= $Page->renderSort($Page->Mheight) ?></div></th>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
        <th data-name="Mweight" class="<?= $Page->Mweight->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Mweight" class="view_template_couple_vitals_Mweight"><?= $Page->renderSort($Page->Mweight) ?></div></th>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <th data-name="MBMI" class="<?= $Page->MBMI->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MBMI" class="view_template_couple_vitals_MBMI"><?= $Page->renderSort($Page->MBMI) ?></div></th>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
        <th data-name="MBloodgroup" class="<?= $Page->MBloodgroup->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MBloodgroup" class="view_template_couple_vitals_MBloodgroup"><?= $Page->renderSort($Page->MBloodgroup) ?></div></th>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
        <th data-name="FBuild" class="<?= $Page->FBuild->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FBuild" class="view_template_couple_vitals_FBuild"><?= $Page->renderSort($Page->FBuild) ?></div></th>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
        <th data-name="MBuild" class="<?= $Page->MBuild->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MBuild" class="view_template_couple_vitals_MBuild"><?= $Page->renderSort($Page->MBuild) ?></div></th>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
        <th data-name="FSkinColor" class="<?= $Page->FSkinColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FSkinColor" class="view_template_couple_vitals_FSkinColor"><?= $Page->renderSort($Page->FSkinColor) ?></div></th>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
        <th data-name="MSkinColor" class="<?= $Page->MSkinColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MSkinColor" class="view_template_couple_vitals_MSkinColor"><?= $Page->renderSort($Page->MSkinColor) ?></div></th>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
        <th data-name="FEyesColor" class="<?= $Page->FEyesColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FEyesColor" class="view_template_couple_vitals_FEyesColor"><?= $Page->renderSort($Page->FEyesColor) ?></div></th>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
        <th data-name="MEyesColor" class="<?= $Page->MEyesColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MEyesColor" class="view_template_couple_vitals_MEyesColor"><?= $Page->renderSort($Page->MEyesColor) ?></div></th>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
        <th data-name="FHairColor" class="<?= $Page->FHairColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FHairColor" class="view_template_couple_vitals_FHairColor"><?= $Page->renderSort($Page->FHairColor) ?></div></th>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
        <th data-name="MhairColor" class="<?= $Page->MhairColor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MhairColor" class="view_template_couple_vitals_MhairColor"><?= $Page->renderSort($Page->MhairColor) ?></div></th>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
        <th data-name="FhairTexture" class="<?= $Page->FhairTexture->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FhairTexture" class="view_template_couple_vitals_FhairTexture"><?= $Page->renderSort($Page->FhairTexture) ?></div></th>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
        <th data-name="MHairTexture" class="<?= $Page->MHairTexture->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MHairTexture" class="view_template_couple_vitals_MHairTexture"><?= $Page->renderSort($Page->MHairTexture) ?></div></th>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
        <th data-name="Fothers" class="<?= $Page->Fothers->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Fothers" class="view_template_couple_vitals_Fothers"><?= $Page->renderSort($Page->Fothers) ?></div></th>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
        <th data-name="Mothers" class="<?= $Page->Mothers->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Mothers" class="view_template_couple_vitals_Mothers"><?= $Page->renderSort($Page->Mothers) ?></div></th>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
        <th data-name="PGE" class="<?= $Page->PGE->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PGE" class="view_template_couple_vitals_PGE"><?= $Page->renderSort($Page->PGE) ?></div></th>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
        <th data-name="PPR" class="<?= $Page->PPR->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPR" class="view_template_couple_vitals_PPR"><?= $Page->renderSort($Page->PPR) ?></div></th>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
        <th data-name="PBP" class="<?= $Page->PBP->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PBP" class="view_template_couple_vitals_PBP"><?= $Page->renderSort($Page->PBP) ?></div></th>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
        <th data-name="Breast" class="<?= $Page->Breast->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Breast" class="view_template_couple_vitals_Breast"><?= $Page->renderSort($Page->Breast) ?></div></th>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
        <th data-name="PPA" class="<?= $Page->PPA->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPA" class="view_template_couple_vitals_PPA"><?= $Page->renderSort($Page->PPA) ?></div></th>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
        <th data-name="PPSV" class="<?= $Page->PPSV->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPSV" class="view_template_couple_vitals_PPSV"><?= $Page->renderSort($Page->PPSV) ?></div></th>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
        <th data-name="PPAPSMEAR" class="<?= $Page->PPAPSMEAR->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PPAPSMEAR" class="view_template_couple_vitals_PPAPSMEAR"><?= $Page->renderSort($Page->PPAPSMEAR) ?></div></th>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
        <th data-name="PTHYROID" class="<?= $Page->PTHYROID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PTHYROID" class="view_template_couple_vitals_PTHYROID"><?= $Page->renderSort($Page->PTHYROID) ?></div></th>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
        <th data-name="MTHYROID" class="<?= $Page->MTHYROID->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MTHYROID" class="view_template_couple_vitals_MTHYROID"><?= $Page->renderSort($Page->MTHYROID) ?></div></th>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
        <th data-name="SecSexCharacters" class="<?= $Page->SecSexCharacters->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_SecSexCharacters" class="view_template_couple_vitals_SecSexCharacters"><?= $Page->renderSort($Page->SecSexCharacters) ?></div></th>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
        <th data-name="PenisUM" class="<?= $Page->PenisUM->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_PenisUM" class="view_template_couple_vitals_PenisUM"><?= $Page->renderSort($Page->PenisUM) ?></div></th>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
        <th data-name="VAS" class="<?= $Page->VAS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_VAS" class="view_template_couple_vitals_VAS"><?= $Page->renderSort($Page->VAS) ?></div></th>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
        <th data-name="EPIDIDYMIS" class="<?= $Page->EPIDIDYMIS->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_EPIDIDYMIS" class="view_template_couple_vitals_EPIDIDYMIS"><?= $Page->renderSort($Page->EPIDIDYMIS) ?></div></th>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
        <th data-name="Varicocele" class="<?= $Page->Varicocele->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Varicocele" class="view_template_couple_vitals_Varicocele"><?= $Page->renderSort($Page->Varicocele) ?></div></th>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <th data-name="FamilyHistory" class="<?= $Page->FamilyHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_FamilyHistory" class="view_template_couple_vitals_FamilyHistory"><?= $Page->renderSort($Page->FamilyHistory) ?></div></th>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
        <th data-name="Addictions" class="<?= $Page->Addictions->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Addictions" class="view_template_couple_vitals_Addictions"><?= $Page->renderSort($Page->Addictions) ?></div></th>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
        <th data-name="Medical" class="<?= $Page->Medical->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Medical" class="view_template_couple_vitals_Medical"><?= $Page->renderSort($Page->Medical) ?></div></th>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
        <th data-name="Surgical" class="<?= $Page->Surgical->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_Surgical" class="view_template_couple_vitals_Surgical"><?= $Page->renderSort($Page->Surgical) ?></div></th>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
        <th data-name="CoitalHistory" class="<?= $Page->CoitalHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CoitalHistory" class="view_template_couple_vitals_CoitalHistory"><?= $Page->renderSort($Page->CoitalHistory) ?></div></th>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
        <th data-name="MariedFor" class="<?= $Page->MariedFor->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_MariedFor" class="view_template_couple_vitals_MariedFor"><?= $Page->renderSort($Page->MariedFor) ?></div></th>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
        <th data-name="CMNCM" class="<?= $Page->CMNCM->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_CMNCM" class="view_template_couple_vitals_CMNCM"><?= $Page->renderSort($Page->CMNCM) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_TidNo" class="view_template_couple_vitals_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
        <th data-name="pFamilyHistory" class="<?= $Page->pFamilyHistory->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_pFamilyHistory" class="view_template_couple_vitals_pFamilyHistory"><?= $Page->renderSort($Page->pFamilyHistory) ?></div></th>
<?php } ?>
<?php if ($Page->AntiTPO->Visible) { // AntiTPO ?>
        <th data-name="AntiTPO" class="<?= $Page->AntiTPO->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_AntiTPO" class="view_template_couple_vitals_AntiTPO"><?= $Page->renderSort($Page->AntiTPO) ?></div></th>
<?php } ?>
<?php if ($Page->AntiTG->Visible) { // AntiTG ?>
        <th data-name="AntiTG" class="<?= $Page->AntiTG->headerCellClass() ?>"><div id="elh_view_template_couple_vitals_AntiTG" class="view_template_couple_vitals_AntiTG"><?= $Page->renderSort($Page->AntiTG) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_template_couple_vitals", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Male->Visible) { // Male ?>
        <td data-name="Male" <?= $Page->Male->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Male">
<span<?= $Page->Male->viewAttributes() ?>>
<?= $Page->Male->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Female->Visible) { // Female ?>
        <td data-name="Female" <?= $Page->Female->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Female">
<span<?= $Page->Female->viewAttributes() ?>>
<?= $Page->Female->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
        <td data-name="HusbandEducation" <?= $Page->HusbandEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_HusbandEducation">
<span<?= $Page->HusbandEducation->viewAttributes() ?>>
<?= $Page->HusbandEducation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
        <td data-name="WifeEducation" <?= $Page->WifeEducation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_WifeEducation">
<span<?= $Page->WifeEducation->viewAttributes() ?>>
<?= $Page->WifeEducation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <td data-name="HusbandWorkHours" <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_HusbandWorkHours">
<span<?= $Page->HusbandWorkHours->viewAttributes() ?>>
<?= $Page->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <td data-name="WifeWorkHours" <?= $Page->WifeWorkHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_WifeWorkHours">
<span<?= $Page->WifeWorkHours->viewAttributes() ?>>
<?= $Page->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
        <td data-name="PatientLanguage" <?= $Page->PatientLanguage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PatientLanguage">
<span<?= $Page->PatientLanguage->viewAttributes() ?>>
<?= $Page->PatientLanguage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
        <td data-name="ReferedBy" <?= $Page->ReferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_ReferedBy">
<span<?= $Page->ReferedBy->viewAttributes() ?>>
<?= $Page->ReferedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
        <td data-name="ReferPhNo" <?= $Page->ReferPhNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_ReferPhNo">
<span<?= $Page->ReferPhNo->viewAttributes() ?>>
<?= $Page->ReferPhNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
        <td data-name="WifeEmail" <?= $Page->WifeEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_WifeEmail">
<span<?= $Page->WifeEmail->viewAttributes() ?>>
<?= $Page->WifeEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
        <td data-name="HusbandEmail" <?= $Page->HusbandEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_HusbandEmail">
<span<?= $Page->HusbandEmail->viewAttributes() ?>>
<?= $Page->HusbandEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hid->Visible) { // hid ?>
        <td data-name="hid" <?= $Page->hid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_hid">
<span<?= $Page->hid->viewAttributes() ?>>
<?= $Page->hid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SEX->Visible) { // SEX ?>
        <td data-name="SEX" <?= $Page->SEX->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Religion->Visible) { // Religion ?>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Address->Visible) { // Address ?>
        <td data-name="Address" <?= $Page->Address->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
        <td data-name="MedicalHistory" <?= $Page->MedicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MedicalHistory">
<span<?= $Page->MedicalHistory->viewAttributes() ?>>
<?= $Page->MedicalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
        <td data-name="Generalexaminationpallor" <?= $Page->Generalexaminationpallor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Generalexaminationpallor">
<span<?= $Page->Generalexaminationpallor->viewAttributes() ?>>
<?= $Page->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PR->Visible) { // PR ?>
        <td data-name="PR" <?= $Page->PR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CVS->Visible) { // CVS ?>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PA->Visible) { // PA ?>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
        <td data-name="PROVISIONALDIAGNOSIS" <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Investigations->Visible) { // Investigations ?>
        <td data-name="Investigations" <?= $Page->Investigations->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Investigations">
<span<?= $Page->Investigations->viewAttributes() ?>>
<?= $Page->Investigations->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fheight->Visible) { // Fheight ?>
        <td data-name="Fheight" <?= $Page->Fheight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Fheight">
<span<?= $Page->Fheight->viewAttributes() ?>>
<?= $Page->Fheight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fweight->Visible) { // Fweight ?>
        <td data-name="Fweight" <?= $Page->Fweight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Fweight">
<span<?= $Page->Fweight->viewAttributes() ?>>
<?= $Page->Fweight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBMI->Visible) { // FBMI ?>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
        <td data-name="FBloodgroup" <?= $Page->FBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FBloodgroup">
<span<?= $Page->FBloodgroup->viewAttributes() ?>>
<?= $Page->FBloodgroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mheight->Visible) { // Mheight ?>
        <td data-name="Mheight" <?= $Page->Mheight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Mheight">
<span<?= $Page->Mheight->viewAttributes() ?>>
<?= $Page->Mheight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mweight->Visible) { // Mweight ?>
        <td data-name="Mweight" <?= $Page->Mweight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Mweight">
<span<?= $Page->Mweight->viewAttributes() ?>>
<?= $Page->Mweight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MBMI->Visible) { // MBMI ?>
        <td data-name="MBMI" <?= $Page->MBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
        <td data-name="MBloodgroup" <?= $Page->MBloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MBloodgroup">
<span<?= $Page->MBloodgroup->viewAttributes() ?>>
<?= $Page->MBloodgroup->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FBuild->Visible) { // FBuild ?>
        <td data-name="FBuild" <?= $Page->FBuild->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FBuild">
<span<?= $Page->FBuild->viewAttributes() ?>>
<?= $Page->FBuild->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MBuild->Visible) { // MBuild ?>
        <td data-name="MBuild" <?= $Page->MBuild->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MBuild">
<span<?= $Page->MBuild->viewAttributes() ?>>
<?= $Page->MBuild->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
        <td data-name="FSkinColor" <?= $Page->FSkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FSkinColor">
<span<?= $Page->FSkinColor->viewAttributes() ?>>
<?= $Page->FSkinColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
        <td data-name="MSkinColor" <?= $Page->MSkinColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MSkinColor">
<span<?= $Page->MSkinColor->viewAttributes() ?>>
<?= $Page->MSkinColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
        <td data-name="FEyesColor" <?= $Page->FEyesColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FEyesColor">
<span<?= $Page->FEyesColor->viewAttributes() ?>>
<?= $Page->FEyesColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
        <td data-name="MEyesColor" <?= $Page->MEyesColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MEyesColor">
<span<?= $Page->MEyesColor->viewAttributes() ?>>
<?= $Page->MEyesColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FHairColor->Visible) { // FHairColor ?>
        <td data-name="FHairColor" <?= $Page->FHairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FHairColor">
<span<?= $Page->FHairColor->viewAttributes() ?>>
<?= $Page->FHairColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MhairColor->Visible) { // MhairColor ?>
        <td data-name="MhairColor" <?= $Page->MhairColor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MhairColor">
<span<?= $Page->MhairColor->viewAttributes() ?>>
<?= $Page->MhairColor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
        <td data-name="FhairTexture" <?= $Page->FhairTexture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FhairTexture">
<span<?= $Page->FhairTexture->viewAttributes() ?>>
<?= $Page->FhairTexture->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
        <td data-name="MHairTexture" <?= $Page->MHairTexture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MHairTexture">
<span<?= $Page->MHairTexture->viewAttributes() ?>>
<?= $Page->MHairTexture->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fothers->Visible) { // Fothers ?>
        <td data-name="Fothers" <?= $Page->Fothers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Fothers">
<span<?= $Page->Fothers->viewAttributes() ?>>
<?= $Page->Fothers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mothers->Visible) { // Mothers ?>
        <td data-name="Mothers" <?= $Page->Mothers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Mothers">
<span<?= $Page->Mothers->viewAttributes() ?>>
<?= $Page->Mothers->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PGE->Visible) { // PGE ?>
        <td data-name="PGE" <?= $Page->PGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PGE">
<span<?= $Page->PGE->viewAttributes() ?>>
<?= $Page->PGE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPR->Visible) { // PPR ?>
        <td data-name="PPR" <?= $Page->PPR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PPR">
<span<?= $Page->PPR->viewAttributes() ?>>
<?= $Page->PPR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PBP->Visible) { // PBP ?>
        <td data-name="PBP" <?= $Page->PBP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PBP">
<span<?= $Page->PBP->viewAttributes() ?>>
<?= $Page->PBP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Breast->Visible) { // Breast ?>
        <td data-name="Breast" <?= $Page->Breast->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Breast">
<span<?= $Page->Breast->viewAttributes() ?>>
<?= $Page->Breast->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPA->Visible) { // PPA ?>
        <td data-name="PPA" <?= $Page->PPA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PPA">
<span<?= $Page->PPA->viewAttributes() ?>>
<?= $Page->PPA->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPSV->Visible) { // PPSV ?>
        <td data-name="PPSV" <?= $Page->PPSV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PPSV">
<span<?= $Page->PPSV->viewAttributes() ?>>
<?= $Page->PPSV->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
        <td data-name="PPAPSMEAR" <?= $Page->PPAPSMEAR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PPAPSMEAR">
<span<?= $Page->PPAPSMEAR->viewAttributes() ?>>
<?= $Page->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
        <td data-name="PTHYROID" <?= $Page->PTHYROID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PTHYROID">
<span<?= $Page->PTHYROID->viewAttributes() ?>>
<?= $Page->PTHYROID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
        <td data-name="MTHYROID" <?= $Page->MTHYROID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MTHYROID">
<span<?= $Page->MTHYROID->viewAttributes() ?>>
<?= $Page->MTHYROID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
        <td data-name="SecSexCharacters" <?= $Page->SecSexCharacters->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_SecSexCharacters">
<span<?= $Page->SecSexCharacters->viewAttributes() ?>>
<?= $Page->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PenisUM->Visible) { // PenisUM ?>
        <td data-name="PenisUM" <?= $Page->PenisUM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_PenisUM">
<span<?= $Page->PenisUM->viewAttributes() ?>>
<?= $Page->PenisUM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VAS->Visible) { // VAS ?>
        <td data-name="VAS" <?= $Page->VAS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_VAS">
<span<?= $Page->VAS->viewAttributes() ?>>
<?= $Page->VAS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
        <td data-name="EPIDIDYMIS" <?= $Page->EPIDIDYMIS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_EPIDIDYMIS">
<span<?= $Page->EPIDIDYMIS->viewAttributes() ?>>
<?= $Page->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Varicocele->Visible) { // Varicocele ?>
        <td data-name="Varicocele" <?= $Page->Varicocele->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Varicocele">
<span<?= $Page->Varicocele->viewAttributes() ?>>
<?= $Page->Varicocele->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Addictions->Visible) { // Addictions ?>
        <td data-name="Addictions" <?= $Page->Addictions->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Addictions">
<span<?= $Page->Addictions->viewAttributes() ?>>
<?= $Page->Addictions->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Medical->Visible) { // Medical ?>
        <td data-name="Medical" <?= $Page->Medical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Medical">
<span<?= $Page->Medical->viewAttributes() ?>>
<?= $Page->Medical->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Surgical->Visible) { // Surgical ?>
        <td data-name="Surgical" <?= $Page->Surgical->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_Surgical">
<span<?= $Page->Surgical->viewAttributes() ?>>
<?= $Page->Surgical->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
        <td data-name="CoitalHistory" <?= $Page->CoitalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_CoitalHistory">
<span<?= $Page->CoitalHistory->viewAttributes() ?>>
<?= $Page->CoitalHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MariedFor->Visible) { // MariedFor ?>
        <td data-name="MariedFor" <?= $Page->MariedFor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_MariedFor">
<span<?= $Page->MariedFor->viewAttributes() ?>>
<?= $Page->MariedFor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CMNCM->Visible) { // CMNCM ?>
        <td data-name="CMNCM" <?= $Page->CMNCM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_CMNCM">
<span<?= $Page->CMNCM->viewAttributes() ?>>
<?= $Page->CMNCM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
        <td data-name="pFamilyHistory" <?= $Page->pFamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_pFamilyHistory">
<span<?= $Page->pFamilyHistory->viewAttributes() ?>>
<?= $Page->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AntiTPO->Visible) { // AntiTPO ?>
        <td data-name="AntiTPO" <?= $Page->AntiTPO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_AntiTPO">
<span<?= $Page->AntiTPO->viewAttributes() ?>>
<?= $Page->AntiTPO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AntiTG->Visible) { // AntiTG ?>
        <td data-name="AntiTG" <?= $Page->AntiTG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_template_couple_vitals_AntiTG">
<span<?= $Page->AntiTG->viewAttributes() ?>>
<?= $Page->AntiTG->getViewValue() ?></span>
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
    ew.addEventHandlers("view_template_couple_vitals");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
