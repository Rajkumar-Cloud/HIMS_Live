<?php

namespace PHPMaker2021\project3;

// Page object
$PatientList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatientlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatientlist = currentForm = new ew.Form("fpatientlist", "list");
    fpatientlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpatientlist");
});
var fpatientlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatientlistsrch = currentSearchForm = new ew.Form("fpatientlistsrch");

    // Dynamic selection lists

    // Filters
    fpatientlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatientlistsrch");
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
<form name="fpatientlistsrch" id="fpatientlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fpatientlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient">
<form name="fpatientlist" id="fpatientlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient">
<div id="gmp_patient" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_patientlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_id" class="patient_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_patient_PatientID" class="patient_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <th data-name="title" class="<?= $Page->title->headerCellClass() ?>"><div id="elh_patient_title" class="patient_title"><?= $Page->renderSort($Page->title) ?></div></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_patient_first_name" class="patient_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <th data-name="middle_name" class="<?= $Page->middle_name->headerCellClass() ?>"><div id="elh_patient_middle_name" class="patient_middle_name"><?= $Page->renderSort($Page->middle_name) ?></div></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th data-name="last_name" class="<?= $Page->last_name->headerCellClass() ?>"><div id="elh_patient_last_name" class="patient_last_name"><?= $Page->renderSort($Page->last_name) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_patient_gender" class="patient_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <th data-name="dob" class="<?= $Page->dob->headerCellClass() ?>"><div id="elh_patient_dob" class="patient_dob"><?= $Page->renderSort($Page->dob) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_patient_Age" class="patient_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
        <th data-name="blood_group" class="<?= $Page->blood_group->headerCellClass() ?>"><div id="elh_patient_blood_group" class="patient_blood_group"><?= $Page->renderSort($Page->blood_group) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th data-name="mobile_no" class="<?= $Page->mobile_no->headerCellClass() ?>"><div id="elh_patient_mobile_no" class="patient_mobile_no"><?= $Page->renderSort($Page->mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th data-name="IdentificationMark" class="<?= $Page->IdentificationMark->headerCellClass() ?>"><div id="elh_patient_IdentificationMark" class="patient_IdentificationMark"><?= $Page->renderSort($Page->IdentificationMark) ?></div></th>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <th data-name="Religion" class="<?= $Page->Religion->headerCellClass() ?>"><div id="elh_patient_Religion" class="patient_Religion"><?= $Page->renderSort($Page->Religion) ?></div></th>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
        <th data-name="Nationality" class="<?= $Page->Nationality->headerCellClass() ?>"><div id="elh_patient_Nationality" class="patient_Nationality"><?= $Page->renderSort($Page->Nationality) ?></div></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th data-name="profilePic" class="<?= $Page->profilePic->headerCellClass() ?>"><div id="elh_patient_profilePic" class="patient_profilePic"><?= $Page->renderSort($Page->profilePic) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_patient_status" class="patient_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_patient_createdby" class="patient_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_patient_createddatetime" class="patient_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_patient_modifiedby" class="patient_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_modifieddatetime" class="patient_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th data-name="ReferedByDr" class="<?= $Page->ReferedByDr->headerCellClass() ?>"><div id="elh_patient_ReferedByDr" class="patient_ReferedByDr"><?= $Page->renderSort($Page->ReferedByDr) ?></div></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th data-name="ReferClinicname" class="<?= $Page->ReferClinicname->headerCellClass() ?>"><div id="elh_patient_ReferClinicname" class="patient_ReferClinicname"><?= $Page->renderSort($Page->ReferClinicname) ?></div></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th data-name="ReferCity" class="<?= $Page->ReferCity->headerCellClass() ?>"><div id="elh_patient_ReferCity" class="patient_ReferCity"><?= $Page->renderSort($Page->ReferCity) ?></div></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th data-name="ReferMobileNo" class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><div id="elh_patient_ReferMobileNo" class="patient_ReferMobileNo"><?= $Page->renderSort($Page->ReferMobileNo) ?></div></th>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th data-name="ReferA4TreatingConsultant" class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant"><?= $Page->renderSort($Page->ReferA4TreatingConsultant) ?></div></th>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <th data-name="PurposreReferredfor" class="<?= $Page->PurposreReferredfor->headerCellClass() ?>"><div id="elh_patient_PurposreReferredfor" class="patient_PurposreReferredfor"><?= $Page->renderSort($Page->PurposreReferredfor) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <th data-name="spouse_title" class="<?= $Page->spouse_title->headerCellClass() ?>"><div id="elh_patient_spouse_title" class="patient_spouse_title"><?= $Page->renderSort($Page->spouse_title) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <th data-name="spouse_first_name" class="<?= $Page->spouse_first_name->headerCellClass() ?>"><div id="elh_patient_spouse_first_name" class="patient_spouse_first_name"><?= $Page->renderSort($Page->spouse_first_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <th data-name="spouse_middle_name" class="<?= $Page->spouse_middle_name->headerCellClass() ?>"><div id="elh_patient_spouse_middle_name" class="patient_spouse_middle_name"><?= $Page->renderSort($Page->spouse_middle_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <th data-name="spouse_last_name" class="<?= $Page->spouse_last_name->headerCellClass() ?>"><div id="elh_patient_spouse_last_name" class="patient_spouse_last_name"><?= $Page->renderSort($Page->spouse_last_name) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <th data-name="spouse_gender" class="<?= $Page->spouse_gender->headerCellClass() ?>"><div id="elh_patient_spouse_gender" class="patient_spouse_gender"><?= $Page->renderSort($Page->spouse_gender) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <th data-name="spouse_dob" class="<?= $Page->spouse_dob->headerCellClass() ?>"><div id="elh_patient_spouse_dob" class="patient_spouse_dob"><?= $Page->renderSort($Page->spouse_dob) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <th data-name="spouse_Age" class="<?= $Page->spouse_Age->headerCellClass() ?>"><div id="elh_patient_spouse_Age" class="patient_spouse_Age"><?= $Page->renderSort($Page->spouse_Age) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <th data-name="spouse_blood_group" class="<?= $Page->spouse_blood_group->headerCellClass() ?>"><div id="elh_patient_spouse_blood_group" class="patient_spouse_blood_group"><?= $Page->renderSort($Page->spouse_blood_group) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <th data-name="spouse_mobile_no" class="<?= $Page->spouse_mobile_no->headerCellClass() ?>"><div id="elh_patient_spouse_mobile_no" class="patient_spouse_mobile_no"><?= $Page->renderSort($Page->spouse_mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <th data-name="Maritalstatus" class="<?= $Page->Maritalstatus->headerCellClass() ?>"><div id="elh_patient_Maritalstatus" class="patient_Maritalstatus"><?= $Page->renderSort($Page->Maritalstatus) ?></div></th>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
        <th data-name="Business" class="<?= $Page->Business->headerCellClass() ?>"><div id="elh_patient_Business" class="patient_Business"><?= $Page->renderSort($Page->Business) ?></div></th>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <th data-name="Patient_Language" class="<?= $Page->Patient_Language->headerCellClass() ?>"><div id="elh_patient_Patient_Language" class="patient_Patient_Language"><?= $Page->renderSort($Page->Patient_Language) ?></div></th>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
        <th data-name="Passport" class="<?= $Page->Passport->headerCellClass() ?>"><div id="elh_patient_Passport" class="patient_Passport"><?= $Page->renderSort($Page->Passport) ?></div></th>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <th data-name="VisaNo" class="<?= $Page->VisaNo->headerCellClass() ?>"><div id="elh_patient_VisaNo" class="patient_VisaNo"><?= $Page->renderSort($Page->VisaNo) ?></div></th>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <th data-name="ValidityOfVisa" class="<?= $Page->ValidityOfVisa->headerCellClass() ?>"><div id="elh_patient_ValidityOfVisa" class="patient_ValidityOfVisa"><?= $Page->renderSort($Page->ValidityOfVisa) ?></div></th>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th data-name="WhereDidYouHear" class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><div id="elh_patient_WhereDidYouHear" class="patient_WhereDidYouHear"><?= $Page->renderSort($Page->WhereDidYouHear) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_patient_HospID" class="patient_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Page->street->headerCellClass() ?>"><div id="elh_patient_street" class="patient_street"><?= $Page->renderSort($Page->street) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_patient_town" class="patient_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Page->province->headerCellClass() ?>"><div id="elh_patient_province" class="patient_province"><?= $Page->renderSort($Page->province) ?></div></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th data-name="country" class="<?= $Page->country->headerCellClass() ?>"><div id="elh_patient_country" class="patient_country"><?= $Page->renderSort($Page->country) ?></div></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Page->postal_code->headerCellClass() ?>"><div id="elh_patient_postal_code" class="patient_postal_code"><?= $Page->renderSort($Page->postal_code) ?></div></th>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
        <th data-name="PEmail" class="<?= $Page->PEmail->headerCellClass() ?>"><div id="elh_patient_PEmail" class="patient_PEmail"><?= $Page->renderSort($Page->PEmail) ?></div></th>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <th data-name="PEmergencyContact" class="<?= $Page->PEmergencyContact->headerCellClass() ?>"><div id="elh_patient_PEmergencyContact" class="patient_PEmergencyContact"><?= $Page->renderSort($Page->PEmergencyContact) ?></div></th>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
        <th data-name="occupation" class="<?= $Page->occupation->headerCellClass() ?>"><div id="elh_patient_occupation" class="patient_occupation"><?= $Page->renderSort($Page->occupation) ?></div></th>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <th data-name="spouse_occupation" class="<?= $Page->spouse_occupation->headerCellClass() ?>"><div id="elh_patient_spouse_occupation" class="patient_spouse_occupation"><?= $Page->renderSort($Page->spouse_occupation) ?></div></th>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <th data-name="WhatsApp" class="<?= $Page->WhatsApp->headerCellClass() ?>"><div id="elh_patient_WhatsApp" class="patient_WhatsApp"><?= $Page->renderSort($Page->WhatsApp) ?></div></th>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <th data-name="CouppleID" class="<?= $Page->CouppleID->headerCellClass() ?>"><div id="elh_patient_CouppleID" class="patient_CouppleID"><?= $Page->renderSort($Page->CouppleID) ?></div></th>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
        <th data-name="MaleID" class="<?= $Page->MaleID->headerCellClass() ?>"><div id="elh_patient_MaleID" class="patient_MaleID"><?= $Page->renderSort($Page->MaleID) ?></div></th>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <th data-name="FemaleID" class="<?= $Page->FemaleID->headerCellClass() ?>"><div id="elh_patient_FemaleID" class="patient_FemaleID"><?= $Page->renderSort($Page->FemaleID) ?></div></th>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <th data-name="GroupID" class="<?= $Page->GroupID->headerCellClass() ?>"><div id="elh_patient_GroupID" class="patient_GroupID"><?= $Page->renderSort($Page->GroupID) ?></div></th>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
        <th data-name="Relationship" class="<?= $Page->Relationship->headerCellClass() ?>"><div id="elh_patient_Relationship" class="patient_Relationship"><?= $Page->renderSort($Page->Relationship) ?></div></th>
<?php } ?>
<?php if ($Page->FacebookID->Visible) { // FacebookID ?>
        <th data-name="FacebookID" class="<?= $Page->FacebookID->headerCellClass() ?>"><div id="elh_patient_FacebookID" class="patient_FacebookID"><?= $Page->renderSort($Page->FacebookID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_patient_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->title->Visible) { // title ?>
        <td data-name="title" <?= $Page->title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->middle_name->Visible) { // middle_name ?>
        <td data-name="middle_name" <?= $Page->middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->last_name->Visible) { // last_name ?>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->dob->Visible) { // dob ?>
        <td data-name="dob" <?= $Page->dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->blood_group->Visible) { // blood_group ?>
        <td data-name="blood_group" <?= $Page->blood_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_blood_group">
<span<?= $Page->blood_group->viewAttributes() ?>>
<?= $Page->blood_group->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Religion->Visible) { // Religion ?>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Nationality->Visible) { // Nationality ?>
        <td data-name="Nationality" <?= $Page->Nationality->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Nationality">
<span<?= $Page->Nationality->viewAttributes() ?>>
<?= $Page->Nationality->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <td data-name="spouse_title" <?= $Page->spouse_title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_title">
<span<?= $Page->spouse_title->viewAttributes() ?>>
<?= $Page->spouse_title->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <td data-name="spouse_first_name" <?= $Page->spouse_first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_first_name">
<span<?= $Page->spouse_first_name->viewAttributes() ?>>
<?= $Page->spouse_first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <td data-name="spouse_middle_name" <?= $Page->spouse_middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_middle_name">
<span<?= $Page->spouse_middle_name->viewAttributes() ?>>
<?= $Page->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <td data-name="spouse_last_name" <?= $Page->spouse_last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_last_name">
<span<?= $Page->spouse_last_name->viewAttributes() ?>>
<?= $Page->spouse_last_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <td data-name="spouse_gender" <?= $Page->spouse_gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_gender">
<span<?= $Page->spouse_gender->viewAttributes() ?>>
<?= $Page->spouse_gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <td data-name="spouse_dob" <?= $Page->spouse_dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_dob">
<span<?= $Page->spouse_dob->viewAttributes() ?>>
<?= $Page->spouse_dob->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <td data-name="spouse_Age" <?= $Page->spouse_Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_Age">
<span<?= $Page->spouse_Age->viewAttributes() ?>>
<?= $Page->spouse_Age->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <td data-name="spouse_blood_group" <?= $Page->spouse_blood_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_blood_group">
<span<?= $Page->spouse_blood_group->viewAttributes() ?>>
<?= $Page->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <td data-name="spouse_mobile_no" <?= $Page->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_mobile_no">
<span<?= $Page->spouse_mobile_no->viewAttributes() ?>>
<?= $Page->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <td data-name="Maritalstatus" <?= $Page->Maritalstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Maritalstatus">
<span<?= $Page->Maritalstatus->viewAttributes() ?>>
<?= $Page->Maritalstatus->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Business->Visible) { // Business ?>
        <td data-name="Business" <?= $Page->Business->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Business">
<span<?= $Page->Business->viewAttributes() ?>>
<?= $Page->Business->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <td data-name="Patient_Language" <?= $Page->Patient_Language->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Patient_Language">
<span<?= $Page->Patient_Language->viewAttributes() ?>>
<?= $Page->Patient_Language->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Passport->Visible) { // Passport ?>
        <td data-name="Passport" <?= $Page->Passport->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Passport">
<span<?= $Page->Passport->viewAttributes() ?>>
<?= $Page->Passport->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <td data-name="VisaNo" <?= $Page->VisaNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_VisaNo">
<span<?= $Page->VisaNo->viewAttributes() ?>>
<?= $Page->VisaNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <td data-name="ValidityOfVisa" <?= $Page->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ValidityOfVisa">
<span<?= $Page->ValidityOfVisa->viewAttributes() ?>>
<?= $Page->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->province->Visible) { // province ?>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->country->Visible) { // country ?>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PEmail->Visible) { // PEmail ?>
        <td data-name="PEmail" <?= $Page->PEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_PEmail">
<span<?= $Page->PEmail->viewAttributes() ?>>
<?= $Page->PEmail->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <td data-name="PEmergencyContact" <?= $Page->PEmergencyContact->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_PEmergencyContact">
<span<?= $Page->PEmergencyContact->viewAttributes() ?>>
<?= $Page->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->occupation->Visible) { // occupation ?>
        <td data-name="occupation" <?= $Page->occupation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_occupation">
<span<?= $Page->occupation->viewAttributes() ?>>
<?= $Page->occupation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <td data-name="spouse_occupation" <?= $Page->spouse_occupation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_spouse_occupation">
<span<?= $Page->spouse_occupation->viewAttributes() ?>>
<?= $Page->spouse_occupation->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <td data-name="WhatsApp" <?= $Page->WhatsApp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_WhatsApp">
<span<?= $Page->WhatsApp->viewAttributes() ?>>
<?= $Page->WhatsApp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <td data-name="CouppleID" <?= $Page->CouppleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_CouppleID">
<span<?= $Page->CouppleID->viewAttributes() ?>>
<?= $Page->CouppleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MaleID->Visible) { // MaleID ?>
        <td data-name="MaleID" <?= $Page->MaleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_MaleID">
<span<?= $Page->MaleID->viewAttributes() ?>>
<?= $Page->MaleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <td data-name="FemaleID" <?= $Page->FemaleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_FemaleID">
<span<?= $Page->FemaleID->viewAttributes() ?>>
<?= $Page->FemaleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GroupID->Visible) { // GroupID ?>
        <td data-name="GroupID" <?= $Page->GroupID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Relationship->Visible) { // Relationship ?>
        <td data-name="Relationship" <?= $Page->Relationship->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_Relationship">
<span<?= $Page->Relationship->viewAttributes() ?>>
<?= $Page->Relationship->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FacebookID->Visible) { // FacebookID ?>
        <td data-name="FacebookID" <?= $Page->FacebookID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_FacebookID">
<span<?= $Page->FacebookID->viewAttributes() ?>>
<?= $Page->FacebookID->getViewValue() ?></span>
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
    ew.addEventHandlers("patient");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
