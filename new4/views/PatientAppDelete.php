<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientAppDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_appdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_appdelete = currentForm = new ew.Form("fpatient_appdelete", "delete");
    loadjs.done("fpatient_appdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.patient_app) ew.vars.tables.patient_app = <?= JsonEncode(GetClientVar("tables", "patient_app")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_appdelete" id="fpatient_appdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_app_id" class="patient_app_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_patient_app_PatientID" class="patient_app_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <th class="<?= $Page->title->headerCellClass() ?>"><span id="elh_patient_app_title" class="patient_app_title"><?= $Page->title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th class="<?= $Page->first_name->headerCellClass() ?>"><span id="elh_patient_app_first_name" class="patient_app_first_name"><?= $Page->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <th class="<?= $Page->middle_name->headerCellClass() ?>"><span id="elh_patient_app_middle_name" class="patient_app_middle_name"><?= $Page->middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th class="<?= $Page->last_name->headerCellClass() ?>"><span id="elh_patient_app_last_name" class="patient_app_last_name"><?= $Page->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th class="<?= $Page->gender->headerCellClass() ?>"><span id="elh_patient_app_gender" class="patient_app_gender"><?= $Page->gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <th class="<?= $Page->dob->headerCellClass() ?>"><span id="elh_patient_app_dob" class="patient_app_dob"><?= $Page->dob->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_patient_app_Age" class="patient_app_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
        <th class="<?= $Page->blood_group->headerCellClass() ?>"><span id="elh_patient_app_blood_group" class="patient_app_blood_group"><?= $Page->blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th class="<?= $Page->mobile_no->headerCellClass() ?>"><span id="elh_patient_app_mobile_no" class="patient_app_mobile_no"><?= $Page->mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <th class="<?= $Page->IdentificationMark->headerCellClass() ?>"><span id="elh_patient_app_IdentificationMark" class="patient_app_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <th class="<?= $Page->Religion->headerCellClass() ?>"><span id="elh_patient_app_Religion" class="patient_app_Religion"><?= $Page->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
        <th class="<?= $Page->Nationality->headerCellClass() ?>"><span id="elh_patient_app_Nationality" class="patient_app_Nationality"><?= $Page->Nationality->caption() ?></span></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><span id="elh_patient_app_profilePic" class="patient_app_profilePic"><?= $Page->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_patient_app_status" class="patient_app_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_patient_app_createdby" class="patient_app_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_patient_app_createddatetime" class="patient_app_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_patient_app_modifiedby" class="patient_app_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_app_modifieddatetime" class="patient_app_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th class="<?= $Page->ReferedByDr->headerCellClass() ?>"><span id="elh_patient_app_ReferedByDr" class="patient_app_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th class="<?= $Page->ReferClinicname->headerCellClass() ?>"><span id="elh_patient_app_ReferClinicname" class="patient_app_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th class="<?= $Page->ReferCity->headerCellClass() ?>"><span id="elh_patient_app_ReferCity" class="patient_app_ReferCity"><?= $Page->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><span id="elh_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><span id="elh_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <th class="<?= $Page->PurposreReferredfor->headerCellClass() ?>"><span id="elh_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <th class="<?= $Page->spouse_title->headerCellClass() ?>"><span id="elh_patient_app_spouse_title" class="patient_app_spouse_title"><?= $Page->spouse_title->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <th class="<?= $Page->spouse_first_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_first_name" class="patient_app_spouse_first_name"><?= $Page->spouse_first_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <th class="<?= $Page->spouse_middle_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name"><?= $Page->spouse_middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <th class="<?= $Page->spouse_last_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_last_name" class="patient_app_spouse_last_name"><?= $Page->spouse_last_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <th class="<?= $Page->spouse_gender->headerCellClass() ?>"><span id="elh_patient_app_spouse_gender" class="patient_app_spouse_gender"><?= $Page->spouse_gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <th class="<?= $Page->spouse_dob->headerCellClass() ?>"><span id="elh_patient_app_spouse_dob" class="patient_app_spouse_dob"><?= $Page->spouse_dob->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <th class="<?= $Page->spouse_Age->headerCellClass() ?>"><span id="elh_patient_app_spouse_Age" class="patient_app_spouse_Age"><?= $Page->spouse_Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <th class="<?= $Page->spouse_blood_group->headerCellClass() ?>"><span id="elh_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group"><?= $Page->spouse_blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <th class="<?= $Page->spouse_mobile_no->headerCellClass() ?>"><span id="elh_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no"><?= $Page->spouse_mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <th class="<?= $Page->Maritalstatus->headerCellClass() ?>"><span id="elh_patient_app_Maritalstatus" class="patient_app_Maritalstatus"><?= $Page->Maritalstatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
        <th class="<?= $Page->Business->headerCellClass() ?>"><span id="elh_patient_app_Business" class="patient_app_Business"><?= $Page->Business->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <th class="<?= $Page->Patient_Language->headerCellClass() ?>"><span id="elh_patient_app_Patient_Language" class="patient_app_Patient_Language"><?= $Page->Patient_Language->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
        <th class="<?= $Page->Passport->headerCellClass() ?>"><span id="elh_patient_app_Passport" class="patient_app_Passport"><?= $Page->Passport->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <th class="<?= $Page->VisaNo->headerCellClass() ?>"><span id="elh_patient_app_VisaNo" class="patient_app_VisaNo"><?= $Page->VisaNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <th class="<?= $Page->ValidityOfVisa->headerCellClass() ?>"><span id="elh_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa"><?= $Page->ValidityOfVisa->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><span id="elh_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_patient_app_HospID" class="patient_app_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th class="<?= $Page->street->headerCellClass() ?>"><span id="elh_patient_app_street" class="patient_app_street"><?= $Page->street->caption() ?></span></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th class="<?= $Page->town->headerCellClass() ?>"><span id="elh_patient_app_town" class="patient_app_town"><?= $Page->town->caption() ?></span></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><span id="elh_patient_app_province" class="patient_app_province"><?= $Page->province->caption() ?></span></th>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <th class="<?= $Page->country->headerCellClass() ?>"><span id="elh_patient_app_country" class="patient_app_country"><?= $Page->country->caption() ?></span></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><span id="elh_patient_app_postal_code" class="patient_app_postal_code"><?= $Page->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
        <th class="<?= $Page->PEmail->headerCellClass() ?>"><span id="elh_patient_app_PEmail" class="patient_app_PEmail"><?= $Page->PEmail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <th class="<?= $Page->PEmergencyContact->headerCellClass() ?>"><span id="elh_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact"><?= $Page->PEmergencyContact->caption() ?></span></th>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
        <th class="<?= $Page->occupation->headerCellClass() ?>"><span id="elh_patient_app_occupation" class="patient_app_occupation"><?= $Page->occupation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <th class="<?= $Page->spouse_occupation->headerCellClass() ?>"><span id="elh_patient_app_spouse_occupation" class="patient_app_spouse_occupation"><?= $Page->spouse_occupation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <th class="<?= $Page->WhatsApp->headerCellClass() ?>"><span id="elh_patient_app_WhatsApp" class="patient_app_WhatsApp"><?= $Page->WhatsApp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <th class="<?= $Page->CouppleID->headerCellClass() ?>"><span id="elh_patient_app_CouppleID" class="patient_app_CouppleID"><?= $Page->CouppleID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
        <th class="<?= $Page->MaleID->headerCellClass() ?>"><span id="elh_patient_app_MaleID" class="patient_app_MaleID"><?= $Page->MaleID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <th class="<?= $Page->FemaleID->headerCellClass() ?>"><span id="elh_patient_app_FemaleID" class="patient_app_FemaleID"><?= $Page->FemaleID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <th class="<?= $Page->GroupID->headerCellClass() ?>"><span id="elh_patient_app_GroupID" class="patient_app_GroupID"><?= $Page->GroupID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
        <th class="<?= $Page->Relationship->headerCellClass() ?>"><span id="elh_patient_app_Relationship" class="patient_app_Relationship"><?= $Page->Relationship->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_id" class="patient_app_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_PatientID" class="patient_app_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
        <td <?= $Page->title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_title" class="patient_app_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <td <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_first_name" class="patient_app_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
        <td <?= $Page->middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_middle_name" class="patient_app_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <td <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_last_name" class="patient_app_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <td <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_gender" class="patient_app_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <td <?= $Page->dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_dob" class="patient_app_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Age" class="patient_app_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
        <td <?= $Page->blood_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_blood_group" class="patient_app_blood_group">
<span<?= $Page->blood_group->viewAttributes() ?>>
<?= $Page->blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_mobile_no" class="patient_app_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
        <td <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_IdentificationMark" class="patient_app_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
        <td <?= $Page->Religion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Religion" class="patient_app_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
        <td <?= $Page->Nationality->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Nationality" class="patient_app_Nationality">
<span<?= $Page->Nationality->viewAttributes() ?>>
<?= $Page->Nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td <?= $Page->profilePic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_profilePic" class="patient_app_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_status" class="patient_app_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_createdby" class="patient_app_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_createddatetime" class="patient_app_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_modifiedby" class="patient_app_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_modifieddatetime" class="patient_app_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_ReferedByDr" class="patient_app_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_ReferClinicname" class="patient_app_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_ReferCity" class="patient_app_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <td <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
        <td <?= $Page->spouse_title->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_title" class="patient_app_spouse_title">
<span<?= $Page->spouse_title->viewAttributes() ?>>
<?= $Page->spouse_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
        <td <?= $Page->spouse_first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_first_name" class="patient_app_spouse_first_name">
<span<?= $Page->spouse_first_name->viewAttributes() ?>>
<?= $Page->spouse_first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
        <td <?= $Page->spouse_middle_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name">
<span<?= $Page->spouse_middle_name->viewAttributes() ?>>
<?= $Page->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
        <td <?= $Page->spouse_last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_last_name" class="patient_app_spouse_last_name">
<span<?= $Page->spouse_last_name->viewAttributes() ?>>
<?= $Page->spouse_last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
        <td <?= $Page->spouse_gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_gender" class="patient_app_spouse_gender">
<span<?= $Page->spouse_gender->viewAttributes() ?>>
<?= $Page->spouse_gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
        <td <?= $Page->spouse_dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_dob" class="patient_app_spouse_dob">
<span<?= $Page->spouse_dob->viewAttributes() ?>>
<?= $Page->spouse_dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
        <td <?= $Page->spouse_Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_Age" class="patient_app_spouse_Age">
<span<?= $Page->spouse_Age->viewAttributes() ?>>
<?= $Page->spouse_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
        <td <?= $Page->spouse_blood_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group">
<span<?= $Page->spouse_blood_group->viewAttributes() ?>>
<?= $Page->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <td <?= $Page->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no">
<span<?= $Page->spouse_mobile_no->viewAttributes() ?>>
<?= $Page->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
        <td <?= $Page->Maritalstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Maritalstatus" class="patient_app_Maritalstatus">
<span<?= $Page->Maritalstatus->viewAttributes() ?>>
<?= $Page->Maritalstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
        <td <?= $Page->Business->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Business" class="patient_app_Business">
<span<?= $Page->Business->viewAttributes() ?>>
<?= $Page->Business->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <td <?= $Page->Patient_Language->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Patient_Language" class="patient_app_Patient_Language">
<span<?= $Page->Patient_Language->viewAttributes() ?>>
<?= $Page->Patient_Language->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
        <td <?= $Page->Passport->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Passport" class="patient_app_Passport">
<span<?= $Page->Passport->viewAttributes() ?>>
<?= $Page->Passport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
        <td <?= $Page->VisaNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_VisaNo" class="patient_app_VisaNo">
<span<?= $Page->VisaNo->viewAttributes() ?>>
<?= $Page->VisaNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
        <td <?= $Page->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa">
<span<?= $Page->ValidityOfVisa->viewAttributes() ?>>
<?= $Page->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_HospID" class="patient_app_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <td <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_street" class="patient_app_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <td <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_town" class="patient_app_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <td <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_province" class="patient_app_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
        <td <?= $Page->country->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_country" class="patient_app_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_postal_code" class="patient_app_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
        <td <?= $Page->PEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_PEmail" class="patient_app_PEmail">
<span<?= $Page->PEmail->viewAttributes() ?>>
<?= $Page->PEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
        <td <?= $Page->PEmergencyContact->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact">
<span<?= $Page->PEmergencyContact->viewAttributes() ?>>
<?= $Page->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
        <td <?= $Page->occupation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_occupation" class="patient_app_occupation">
<span<?= $Page->occupation->viewAttributes() ?>>
<?= $Page->occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
        <td <?= $Page->spouse_occupation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_spouse_occupation" class="patient_app_spouse_occupation">
<span<?= $Page->spouse_occupation->viewAttributes() ?>>
<?= $Page->spouse_occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
        <td <?= $Page->WhatsApp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_WhatsApp" class="patient_app_WhatsApp">
<span<?= $Page->WhatsApp->viewAttributes() ?>>
<?= $Page->WhatsApp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
        <td <?= $Page->CouppleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_CouppleID" class="patient_app_CouppleID">
<span<?= $Page->CouppleID->viewAttributes() ?>>
<?= $Page->CouppleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
        <td <?= $Page->MaleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_MaleID" class="patient_app_MaleID">
<span<?= $Page->MaleID->viewAttributes() ?>>
<?= $Page->MaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
        <td <?= $Page->FemaleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_FemaleID" class="patient_app_FemaleID">
<span<?= $Page->FemaleID->viewAttributes() ?>>
<?= $Page->FemaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
        <td <?= $Page->GroupID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_GroupID" class="patient_app_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
        <td <?= $Page->Relationship->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_app_Relationship" class="patient_app_Relationship">
<span<?= $Page->Relationship->viewAttributes() ?>>
<?= $Page->Relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
