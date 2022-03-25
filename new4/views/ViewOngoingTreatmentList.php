<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewOngoingTreatmentList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ongoing_treatmentlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_ongoing_treatmentlist = currentForm = new ew.Form("fview_ongoing_treatmentlist", "list");
    fview_ongoing_treatmentlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_ongoing_treatmentlist");
});
var fview_ongoing_treatmentlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_ongoing_treatmentlistsrch = currentSearchForm = new ew.Form("fview_ongoing_treatmentlistsrch");

    // Dynamic selection lists

    // Filters
    fview_ongoing_treatmentlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_ongoing_treatmentlistsrch");
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
<form name="fview_ongoing_treatmentlistsrch" id="fview_ongoing_treatmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_ongoing_treatmentlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ongoing_treatment">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ongoing_treatment">
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
<form name="fview_ongoing_treatmentlist" id="fview_ongoing_treatmentlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ongoing_treatment">
<div id="gmp_view_ongoing_treatment" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_ongoing_treatmentlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->bid->Visible) { // bid ?>
        <th data-name="bid" class="<?= $Page->bid->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bid" class="view_ongoing_treatment_bid"><?= $Page->renderSort($Page->bid) ?></div></th>
<?php } ?>
<?php if ($Page->bPatientID->Visible) { // bPatientID ?>
        <th data-name="bPatientID" class="<?= $Page->bPatientID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bPatientID" class="view_ongoing_treatment_bPatientID"><?= $Page->renderSort($Page->bPatientID) ?></div></th>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <th data-name="title" class="<?= $Page->title->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_title" class="view_ongoing_treatment_title"><?= $Page->renderSort($Page->title) ?></div></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_first_name" class="view_ongoing_treatment_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <th data-name="middle_name" class="<?= $Page->middle_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_middle_name" class="view_ongoing_treatment_middle_name"><?= $Page->renderSort($Page->middle_name) ?></div></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th data-name="last_name" class="<?= $Page->last_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_last_name" class="view_ongoing_treatment_last_name"><?= $Page->renderSort($Page->last_name) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_gender" class="view_ongoing_treatment_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <th data-name="dob" class="<?= $Page->dob->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_dob" class="view_ongoing_treatment_dob"><?= $Page->renderSort($Page->dob) ?></div></th>
<?php } ?>
<?php if ($Page->bAge->Visible) { // bAge ?>
        <th data-name="bAge" class="<?= $Page->bAge->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_bAge" class="view_ongoing_treatment_bAge"><?= $Page->renderSort($Page->bAge) ?></div></th>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
        <th data-name="blood_group" class="<?= $Page->blood_group->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_blood_group" class="view_ongoing_treatment_blood_group"><?= $Page->renderSort($Page->blood_group) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th data-name="mobile_no" class="<?= $Page->mobile_no->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_mobile_no" class="view_ongoing_treatment_mobile_no"><?= $Page->renderSort($Page->mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th data-name="IdentificationMark" class="<?= $Page->IdentificationMark->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_IdentificationMark" class="view_ongoing_treatment_IdentificationMark"><?= $Page->renderSort($Page->IdentificationMark) ?></div></th>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <th data-name="Religion" class="<?= $Page->Religion->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Religion" class="view_ongoing_treatment_Religion"><?= $Page->renderSort($Page->Religion) ?></div></th>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
        <th data-name="Nationality" class="<?= $Page->Nationality->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Nationality" class="view_ongoing_treatment_Nationality"><?= $Page->renderSort($Page->Nationality) ?></div></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th data-name="profilePic" class="<?= $Page->profilePic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_profilePic" class="view_ongoing_treatment_profilePic"><?= $Page->renderSort($Page->profilePic) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th data-name="ReferedByDr" class="<?= $Page->ReferedByDr->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferedByDr" class="view_ongoing_treatment_ReferedByDr"><?= $Page->renderSort($Page->ReferedByDr) ?></div></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th data-name="ReferClinicname" class="<?= $Page->ReferClinicname->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferClinicname" class="view_ongoing_treatment_ReferClinicname"><?= $Page->renderSort($Page->ReferClinicname) ?></div></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th data-name="ReferCity" class="<?= $Page->ReferCity->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferCity" class="view_ongoing_treatment_ReferCity"><?= $Page->renderSort($Page->ReferCity) ?></div></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th data-name="ReferMobileNo" class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferMobileNo" class="view_ongoing_treatment_ReferMobileNo"><?= $Page->renderSort($Page->ReferMobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th data-name="ReferA4TreatingConsultant" class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ReferA4TreatingConsultant" class="view_ongoing_treatment_ReferA4TreatingConsultant"><?= $Page->renderSort($Page->ReferA4TreatingConsultant) ?></div></th>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <th data-name="PurposreReferredfor" class="<?= $Page->PurposreReferredfor->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PurposreReferredfor" class="view_ongoing_treatment_PurposreReferredfor"><?= $Page->renderSort($Page->PurposreReferredfor) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <th data-name="spouse_title" class="<?= $Page->spouse_title->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_title" class="view_ongoing_treatment_spouse_title"><?= $Page->renderSort($Page->spouse_title) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <th data-name="spouse_first_name" class="<?= $Page->spouse_first_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_first_name" class="view_ongoing_treatment_spouse_first_name"><?= $Page->renderSort($Page->spouse_first_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <th data-name="spouse_middle_name" class="<?= $Page->spouse_middle_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_middle_name" class="view_ongoing_treatment_spouse_middle_name"><?= $Page->renderSort($Page->spouse_middle_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <th data-name="spouse_last_name" class="<?= $Page->spouse_last_name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_last_name" class="view_ongoing_treatment_spouse_last_name"><?= $Page->renderSort($Page->spouse_last_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <th data-name="spouse_gender" class="<?= $Page->spouse_gender->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_gender" class="view_ongoing_treatment_spouse_gender"><?= $Page->renderSort($Page->spouse_gender) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <th data-name="spouse_dob" class="<?= $Page->spouse_dob->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_dob" class="view_ongoing_treatment_spouse_dob"><?= $Page->renderSort($Page->spouse_dob) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <th data-name="spouse_Age" class="<?= $Page->spouse_Age->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_Age" class="view_ongoing_treatment_spouse_Age"><?= $Page->renderSort($Page->spouse_Age) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <th data-name="spouse_blood_group" class="<?= $Page->spouse_blood_group->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_blood_group" class="view_ongoing_treatment_spouse_blood_group"><?= $Page->renderSort($Page->spouse_blood_group) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <th data-name="spouse_mobile_no" class="<?= $Page->spouse_mobile_no->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_mobile_no" class="view_ongoing_treatment_spouse_mobile_no"><?= $Page->renderSort($Page->spouse_mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <th data-name="Maritalstatus" class="<?= $Page->Maritalstatus->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Maritalstatus" class="view_ongoing_treatment_Maritalstatus"><?= $Page->renderSort($Page->Maritalstatus) ?></div></th>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
        <th data-name="Business" class="<?= $Page->Business->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Business" class="view_ongoing_treatment_Business"><?= $Page->renderSort($Page->Business) ?></div></th>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <th data-name="Patient_Language" class="<?= $Page->Patient_Language->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Patient_Language" class="view_ongoing_treatment_Patient_Language"><?= $Page->renderSort($Page->Patient_Language) ?></div></th>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
        <th data-name="Passport" class="<?= $Page->Passport->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Passport" class="view_ongoing_treatment_Passport"><?= $Page->renderSort($Page->Passport) ?></div></th>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <th data-name="VisaNo" class="<?= $Page->VisaNo->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_VisaNo" class="view_ongoing_treatment_VisaNo"><?= $Page->renderSort($Page->VisaNo) ?></div></th>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <th data-name="ValidityOfVisa" class="<?= $Page->ValidityOfVisa->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ValidityOfVisa" class="view_ongoing_treatment_ValidityOfVisa"><?= $Page->renderSort($Page->ValidityOfVisa) ?></div></th>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th data-name="WhereDidYouHear" class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WhereDidYouHear" class="view_ongoing_treatment_WhereDidYouHear"><?= $Page->renderSort($Page->WhereDidYouHear) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_HospID" class="view_ongoing_treatment_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Page->street->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_street" class="view_ongoing_treatment_street"><?= $Page->renderSort($Page->street) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_town" class="view_ongoing_treatment_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_province" class="view_ongoing_treatment_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th data-name="country" class="<?= $Page->country->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_country" class="view_ongoing_treatment_country"><?= $Page->renderSort($Page->country) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_postal_code" class="view_ongoing_treatment_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
        <th data-name="PEmail" class="<?= $Page->PEmail->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PEmail" class="view_ongoing_treatment_PEmail"><?= $Page->renderSort($Page->PEmail) ?></div></th>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <th data-name="PEmergencyContact" class="<?= $Page->PEmergencyContact->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PEmergencyContact" class="view_ongoing_treatment_PEmergencyContact"><?= $Page->renderSort($Page->PEmergencyContact) ?></div></th>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
        <th data-name="occupation" class="<?= $Page->occupation->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_occupation" class="view_ongoing_treatment_occupation"><?= $Page->renderSort($Page->occupation) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <th data-name="spouse_occupation" class="<?= $Page->spouse_occupation->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_spouse_occupation" class="view_ongoing_treatment_spouse_occupation"><?= $Page->renderSort($Page->spouse_occupation) ?></div></th>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <th data-name="WhatsApp" class="<?= $Page->WhatsApp->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WhatsApp" class="view_ongoing_treatment_WhatsApp"><?= $Page->renderSort($Page->WhatsApp) ?></div></th>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <th data-name="CouppleID" class="<?= $Page->CouppleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_CouppleID" class="view_ongoing_treatment_CouppleID"><?= $Page->renderSort($Page->CouppleID) ?></div></th>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
        <th data-name="MaleID" class="<?= $Page->MaleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MaleID" class="view_ongoing_treatment_MaleID"><?= $Page->renderSort($Page->MaleID) ?></div></th>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <th data-name="FemaleID" class="<?= $Page->FemaleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FemaleID" class="view_ongoing_treatment_FemaleID"><?= $Page->renderSort($Page->FemaleID) ?></div></th>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <th data-name="GroupID" class="<?= $Page->GroupID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_GroupID" class="view_ongoing_treatment_GroupID"><?= $Page->renderSort($Page->GroupID) ?></div></th>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
        <th data-name="Relationship" class="<?= $Page->Relationship->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Relationship" class="view_ongoing_treatment_Relationship"><?= $Page->renderSort($Page->Relationship) ?></div></th>
<?php } ?>
<?php if ($Page->FacebookID->Visible) { // FacebookID ?>
        <th data-name="FacebookID" class="<?= $Page->FacebookID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FacebookID" class="view_ongoing_treatment_FacebookID"><?= $Page->renderSort($Page->FacebookID) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_id" class="view_ongoing_treatment_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th data-name="RIDNO" class="<?= $Page->RIDNO->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_RIDNO" class="view_ongoing_treatment_RIDNO"><?= $Page->renderSort($Page->RIDNO) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Name" class="view_ongoing_treatment_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <th data-name="treatment_status" class="<?= $Page->treatment_status->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_treatment_status" class="view_ongoing_treatment_treatment_status"><?= $Page->renderSort($Page->treatment_status) ?></div></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th data-name="ARTCYCLE" class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_ARTCYCLE" class="view_ongoing_treatment_ARTCYCLE"><?= $Page->renderSort($Page->ARTCYCLE) ?></div></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th data-name="RESULT" class="<?= $Page->RESULT->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_RESULT" class="view_ongoing_treatment_RESULT"><?= $Page->renderSort($Page->RESULT) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_status" class="view_ongoing_treatment_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_createdby" class="view_ongoing_treatment_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_createddatetime" class="view_ongoing_treatment_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_modifiedby" class="view_ongoing_treatment_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_modifieddatetime" class="view_ongoing_treatment_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <th data-name="TreatmentStartDate" class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatmentStartDate" class="view_ongoing_treatment_TreatmentStartDate"><?= $Page->renderSort($Page->TreatmentStartDate) ?></div></th>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <th data-name="TreatementStopDate" class="<?= $Page->TreatementStopDate->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatementStopDate" class="view_ongoing_treatment_TreatementStopDate"><?= $Page->renderSort($Page->TreatementStopDate) ?></div></th>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <th data-name="TypePatient" class="<?= $Page->TypePatient->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TypePatient" class="view_ongoing_treatment_TypePatient"><?= $Page->renderSort($Page->TypePatient) ?></div></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th data-name="Treatment" class="<?= $Page->Treatment->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Treatment" class="view_ongoing_treatment_Treatment"><?= $Page->renderSort($Page->Treatment) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <th data-name="TreatmentTec" class="<?= $Page->TreatmentTec->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TreatmentTec" class="view_ongoing_treatment_TreatmentTec"><?= $Page->renderSort($Page->TreatmentTec) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <th data-name="TypeOfCycle" class="<?= $Page->TypeOfCycle->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TypeOfCycle" class="view_ongoing_treatment_TypeOfCycle"><?= $Page->renderSort($Page->TypeOfCycle) ?></div></th>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <th data-name="SpermOrgin" class="<?= $Page->SpermOrgin->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SpermOrgin" class="view_ongoing_treatment_SpermOrgin"><?= $Page->renderSort($Page->SpermOrgin) ?></div></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Page->State->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_State" class="view_ongoing_treatment_State"><?= $Page->renderSort($Page->State) ?></div></th>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <th data-name="Origin" class="<?= $Page->Origin->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Origin" class="view_ongoing_treatment_Origin"><?= $Page->renderSort($Page->Origin) ?></div></th>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
        <th data-name="MACS" class="<?= $Page->MACS->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MACS" class="view_ongoing_treatment_MACS"><?= $Page->renderSort($Page->MACS) ?></div></th>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
        <th data-name="Technique" class="<?= $Page->Technique->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Technique" class="view_ongoing_treatment_Technique"><?= $Page->renderSort($Page->Technique) ?></div></th>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <th data-name="PgdPlanning" class="<?= $Page->PgdPlanning->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PgdPlanning" class="view_ongoing_treatment_PgdPlanning"><?= $Page->renderSort($Page->PgdPlanning) ?></div></th>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
        <th data-name="IMSI" class="<?= $Page->IMSI->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_IMSI" class="view_ongoing_treatment_IMSI"><?= $Page->renderSort($Page->IMSI) ?></div></th>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <th data-name="SequentialCulture" class="<?= $Page->SequentialCulture->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SequentialCulture" class="view_ongoing_treatment_SequentialCulture"><?= $Page->renderSort($Page->SequentialCulture) ?></div></th>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <th data-name="TimeLapse" class="<?= $Page->TimeLapse->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TimeLapse" class="view_ongoing_treatment_TimeLapse"><?= $Page->renderSort($Page->TimeLapse) ?></div></th>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
        <th data-name="AH" class="<?= $Page->AH->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_AH" class="view_ongoing_treatment_AH"><?= $Page->renderSort($Page->AH) ?></div></th>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <th data-name="Weight" class="<?= $Page->Weight->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Weight" class="view_ongoing_treatment_Weight"><?= $Page->renderSort($Page->Weight) ?></div></th>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
        <th data-name="BMI" class="<?= $Page->BMI->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_BMI" class="view_ongoing_treatment_BMI"><?= $Page->renderSort($Page->BMI) ?></div></th>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <th data-name="MaleIndications" class="<?= $Page->MaleIndications->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_MaleIndications" class="view_ongoing_treatment_MaleIndications"><?= $Page->renderSort($Page->MaleIndications) ?></div></th>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <th data-name="FemaleIndications" class="<?= $Page->FemaleIndications->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_FemaleIndications" class="view_ongoing_treatment_FemaleIndications"><?= $Page->renderSort($Page->FemaleIndications) ?></div></th>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
        <th data-name="UseOfThe" class="<?= $Page->UseOfThe->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_UseOfThe" class="view_ongoing_treatment_UseOfThe"><?= $Page->renderSort($Page->UseOfThe) ?></div></th>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <th data-name="Ectopic" class="<?= $Page->Ectopic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Ectopic" class="view_ongoing_treatment_Ectopic"><?= $Page->renderSort($Page->Ectopic) ?></div></th>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
        <th data-name="Heterotopic" class="<?= $Page->Heterotopic->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Heterotopic" class="view_ongoing_treatment_Heterotopic"><?= $Page->renderSort($Page->Heterotopic) ?></div></th>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
        <th data-name="TransferDFE" class="<?= $Page->TransferDFE->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TransferDFE" class="view_ongoing_treatment_TransferDFE"><?= $Page->renderSort($Page->TransferDFE) ?></div></th>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
        <th data-name="Evolutive" class="<?= $Page->Evolutive->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Evolutive" class="view_ongoing_treatment_Evolutive"><?= $Page->renderSort($Page->Evolutive) ?></div></th>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
        <th data-name="Number" class="<?= $Page->Number->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_Number" class="view_ongoing_treatment_Number"><?= $Page->renderSort($Page->Number) ?></div></th>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
        <th data-name="SequentialCult" class="<?= $Page->SequentialCult->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_SequentialCult" class="view_ongoing_treatment_SequentialCult"><?= $Page->renderSort($Page->SequentialCult) ?></div></th>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
        <th data-name="TineLapse" class="<?= $Page->TineLapse->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_TineLapse" class="view_ongoing_treatment_TineLapse"><?= $Page->renderSort($Page->TineLapse) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PatientName" class="view_ongoing_treatment_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PatientID" class="view_ongoing_treatment_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th data-name="PartnerName" class="<?= $Page->PartnerName->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PartnerName" class="view_ongoing_treatment_PartnerName"><?= $Page->renderSort($Page->PartnerName) ?></div></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th data-name="PartnerID" class="<?= $Page->PartnerID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_PartnerID" class="view_ongoing_treatment_PartnerID"><?= $Page->renderSort($Page->PartnerID) ?></div></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th data-name="WifeCell" class="<?= $Page->WifeCell->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_WifeCell" class="view_ongoing_treatment_WifeCell"><?= $Page->renderSort($Page->WifeCell) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th data-name="HusbandCell" class="<?= $Page->HusbandCell->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_HusbandCell" class="view_ongoing_treatment_HusbandCell"><?= $Page->renderSort($Page->HusbandCell) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_view_ongoing_treatment_CoupleID" class="view_ongoing_treatment_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_ongoing_treatment", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->bid->Visible) { // bid ?>
        <td data-name="bid" <?= $Page->bid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_bid">
<span<?= $Page->bid->viewAttributes() ?>>
<?= $Page->bid->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bPatientID->Visible) { // bPatientID ?>
        <td data-name="bPatientID" <?= $Page->bPatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_bPatientID">
<span<?= $Page->bPatientID->viewAttributes() ?>>
<?= $Page->bPatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->title->Visible) { // title ?>
        <td data-name="title" <?= $Page->title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->middle_name->Visible) { // middle_name ?>
        <td data-name="middle_name" <?= $Page->middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->last_name->Visible) { // last_name ?>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->dob->Visible) { // dob ?>
        <td data-name="dob" <?= $Page->dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->bAge->Visible) { // bAge ?>
        <td data-name="bAge" <?= $Page->bAge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_bAge">
<span<?= $Page->bAge->viewAttributes() ?>>
<?= $Page->bAge->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->blood_group->Visible) { // blood_group ?>
        <td data-name="blood_group" <?= $Page->blood_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_blood_group">
<span<?= $Page->blood_group->viewAttributes() ?>>
<?= $Page->blood_group->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Religion->Visible) { // Religion ?>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Nationality->Visible) { // Nationality ?>
        <td data-name="Nationality" <?= $Page->Nationality->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Nationality">
<span<?= $Page->Nationality->viewAttributes() ?>>
<?= $Page->Nationality->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <td data-name="spouse_title" <?= $Page->spouse_title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_title">
<span<?= $Page->spouse_title->viewAttributes() ?>>
<?= $Page->spouse_title->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <td data-name="spouse_first_name" <?= $Page->spouse_first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_first_name">
<span<?= $Page->spouse_first_name->viewAttributes() ?>>
<?= $Page->spouse_first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <td data-name="spouse_middle_name" <?= $Page->spouse_middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_middle_name">
<span<?= $Page->spouse_middle_name->viewAttributes() ?>>
<?= $Page->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <td data-name="spouse_last_name" <?= $Page->spouse_last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_last_name">
<span<?= $Page->spouse_last_name->viewAttributes() ?>>
<?= $Page->spouse_last_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <td data-name="spouse_gender" <?= $Page->spouse_gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_gender">
<span<?= $Page->spouse_gender->viewAttributes() ?>>
<?= $Page->spouse_gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <td data-name="spouse_dob" <?= $Page->spouse_dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_dob">
<span<?= $Page->spouse_dob->viewAttributes() ?>>
<?= $Page->spouse_dob->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <td data-name="spouse_Age" <?= $Page->spouse_Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_Age">
<span<?= $Page->spouse_Age->viewAttributes() ?>>
<?= $Page->spouse_Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <td data-name="spouse_blood_group" <?= $Page->spouse_blood_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_blood_group">
<span<?= $Page->spouse_blood_group->viewAttributes() ?>>
<?= $Page->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <td data-name="spouse_mobile_no" <?= $Page->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_mobile_no">
<span<?= $Page->spouse_mobile_no->viewAttributes() ?>>
<?= $Page->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <td data-name="Maritalstatus" <?= $Page->Maritalstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Maritalstatus">
<span<?= $Page->Maritalstatus->viewAttributes() ?>>
<?= $Page->Maritalstatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Business->Visible) { // Business ?>
        <td data-name="Business" <?= $Page->Business->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Business">
<span<?= $Page->Business->viewAttributes() ?>>
<?= $Page->Business->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <td data-name="Patient_Language" <?= $Page->Patient_Language->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Patient_Language">
<span<?= $Page->Patient_Language->viewAttributes() ?>>
<?= $Page->Patient_Language->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Passport->Visible) { // Passport ?>
        <td data-name="Passport" <?= $Page->Passport->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Passport">
<span<?= $Page->Passport->viewAttributes() ?>>
<?= $Page->Passport->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <td data-name="VisaNo" <?= $Page->VisaNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_VisaNo">
<span<?= $Page->VisaNo->viewAttributes() ?>>
<?= $Page->VisaNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <td data-name="ValidityOfVisa" <?= $Page->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_ValidityOfVisa">
<span<?= $Page->ValidityOfVisa->viewAttributes() ?>>
<?= $Page->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->country->Visible) { // country ?>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PEmail->Visible) { // PEmail ?>
        <td data-name="PEmail" <?= $Page->PEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PEmail">
<span<?= $Page->PEmail->viewAttributes() ?>>
<?= $Page->PEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <td data-name="PEmergencyContact" <?= $Page->PEmergencyContact->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PEmergencyContact">
<span<?= $Page->PEmergencyContact->viewAttributes() ?>>
<?= $Page->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->occupation->Visible) { // occupation ?>
        <td data-name="occupation" <?= $Page->occupation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_occupation">
<span<?= $Page->occupation->viewAttributes() ?>>
<?= $Page->occupation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <td data-name="spouse_occupation" <?= $Page->spouse_occupation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_spouse_occupation">
<span<?= $Page->spouse_occupation->viewAttributes() ?>>
<?= $Page->spouse_occupation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <td data-name="WhatsApp" <?= $Page->WhatsApp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_WhatsApp">
<span<?= $Page->WhatsApp->viewAttributes() ?>>
<?= $Page->WhatsApp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <td data-name="CouppleID" <?= $Page->CouppleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_CouppleID">
<span<?= $Page->CouppleID->viewAttributes() ?>>
<?= $Page->CouppleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaleID->Visible) { // MaleID ?>
        <td data-name="MaleID" <?= $Page->MaleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_MaleID">
<span<?= $Page->MaleID->viewAttributes() ?>>
<?= $Page->MaleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <td data-name="FemaleID" <?= $Page->FemaleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_FemaleID">
<span<?= $Page->FemaleID->viewAttributes() ?>>
<?= $Page->FemaleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GroupID->Visible) { // GroupID ?>
        <td data-name="GroupID" <?= $Page->GroupID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Relationship->Visible) { // Relationship ?>
        <td data-name="Relationship" <?= $Page->Relationship->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Relationship">
<span<?= $Page->Relationship->viewAttributes() ?>>
<?= $Page->Relationship->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FacebookID->Visible) { // FacebookID ?>
        <td data-name="FacebookID" <?= $Page->FacebookID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_FacebookID">
<span<?= $Page->FacebookID->viewAttributes() ?>>
<?= $Page->FacebookID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td data-name="TreatmentStartDate" <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <td data-name="TreatementStopDate" <?= $Page->TreatementStopDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TreatementStopDate">
<span<?= $Page->TreatementStopDate->viewAttributes() ?>>
<?= $Page->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <td data-name="TypePatient" <?= $Page->TypePatient->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TypePatient">
<span<?= $Page->TypePatient->viewAttributes() ?>>
<?= $Page->TypePatient->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <td data-name="TreatmentTec" <?= $Page->TreatmentTec->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TreatmentTec">
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <td data-name="TypeOfCycle" <?= $Page->TypeOfCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TypeOfCycle">
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <td data-name="SpermOrgin" <?= $Page->SpermOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_SpermOrgin">
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->State->Visible) { // State ?>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Origin->Visible) { // Origin ?>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MACS->Visible) { // MACS ?>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Technique->Visible) { // Technique ?>
        <td data-name="Technique" <?= $Page->Technique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Technique">
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <td data-name="PgdPlanning" <?= $Page->PgdPlanning->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PgdPlanning">
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSI->Visible) { // IMSI ?>
        <td data-name="IMSI" <?= $Page->IMSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_IMSI">
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <td data-name="SequentialCulture" <?= $Page->SequentialCulture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_SequentialCulture">
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <td data-name="TimeLapse" <?= $Page->TimeLapse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TimeLapse">
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AH->Visible) { // AH ?>
        <td data-name="AH" <?= $Page->AH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_AH">
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Weight->Visible) { // Weight ?>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BMI->Visible) { // BMI ?>
        <td data-name="BMI" <?= $Page->BMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_BMI">
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <td data-name="MaleIndications" <?= $Page->MaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_MaleIndications">
<span<?= $Page->MaleIndications->viewAttributes() ?>>
<?= $Page->MaleIndications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <td data-name="FemaleIndications" <?= $Page->FemaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_FemaleIndications">
<span<?= $Page->FemaleIndications->viewAttributes() ?>>
<?= $Page->FemaleIndications->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
        <td data-name="UseOfThe" <?= $Page->UseOfThe->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_UseOfThe">
<span<?= $Page->UseOfThe->viewAttributes() ?>>
<?= $Page->UseOfThe->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <td data-name="Ectopic" <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
        <td data-name="Heterotopic" <?= $Page->Heterotopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Heterotopic">
<span<?= $Page->Heterotopic->viewAttributes() ?>>
<?= $Page->Heterotopic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
        <td data-name="TransferDFE" <?= $Page->TransferDFE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TransferDFE">
<span<?= $Page->TransferDFE->viewAttributes() ?>>
<?= $Page->TransferDFE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Evolutive->Visible) { // Evolutive ?>
        <td data-name="Evolutive" <?= $Page->Evolutive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Evolutive">
<span<?= $Page->Evolutive->viewAttributes() ?>>
<?= $Page->Evolutive->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Number->Visible) { // Number ?>
        <td data-name="Number" <?= $Page->Number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_Number">
<span<?= $Page->Number->viewAttributes() ?>>
<?= $Page->Number->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
        <td data-name="SequentialCult" <?= $Page->SequentialCult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_SequentialCult">
<span<?= $Page->SequentialCult->viewAttributes() ?>>
<?= $Page->SequentialCult->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TineLapse->Visible) { // TineLapse ?>
        <td data-name="TineLapse" <?= $Page->TineLapse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_TineLapse">
<span<?= $Page->TineLapse->viewAttributes() ?>>
<?= $Page->TineLapse->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_ongoing_treatment_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_ongoing_treatment");
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
        container: "gmp_view_ongoing_treatment",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>
