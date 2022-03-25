<?php

namespace PHPMaker2021\project3;

// Page object
$PatientView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatientview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatientview = currentForm = new ew.Form("fpatientview", "view");
    loadjs.done("fpatientview");
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
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatientview" id="fpatientview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_patient_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <tr id="r_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_title"><?= $Page->title->caption() ?></span></td>
        <td data-name="title" <?= $Page->title->cellAttributes() ?>>
<span id="el_patient_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <tr id="r_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_first_name"><?= $Page->first_name->caption() ?></span></td>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el_patient_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
    <tr id="r_middle_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_middle_name"><?= $Page->middle_name->caption() ?></span></td>
        <td data-name="middle_name" <?= $Page->middle_name->cellAttributes() ?>>
<span id="el_patient_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <tr id="r_last_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_last_name"><?= $Page->last_name->caption() ?></span></td>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el_patient_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_gender"><?= $Page->gender->caption() ?></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el_patient_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <tr id="r_dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_dob"><?= $Page->dob->caption() ?></span></td>
        <td data-name="dob" <?= $Page->dob->cellAttributes() ?>>
<span id="el_patient_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
    <tr id="r_blood_group">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_blood_group"><?= $Page->blood_group->caption() ?></span></td>
        <td data-name="blood_group" <?= $Page->blood_group->cellAttributes() ?>>
<span id="el_patient_blood_group">
<span<?= $Page->blood_group->viewAttributes() ?>>
<?= $Page->blood_group->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <tr id="r_mobile_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_mobile_no"><?= $Page->mobile_no->caption() ?></span></td>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el_patient_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_description"><?= $Page->description->caption() ?></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<span id="el_patient_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <tr id="r_IdentificationMark">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></span></td>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <tr id="r_Religion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Religion"><?= $Page->Religion->caption() ?></span></td>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<span id="el_patient_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
    <tr id="r_Nationality">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Nationality"><?= $Page->Nationality->caption() ?></span></td>
        <td data-name="Nationality" <?= $Page->Nationality->cellAttributes() ?>>
<span id="el_patient_Nationality">
<span<?= $Page->Nationality->viewAttributes() ?>>
<?= $Page->Nationality->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <tr id="r_ReferedByDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></span></td>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <tr id="r_ReferClinicname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span></td>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el_patient_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <tr id="r_ReferCity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferCity"><?= $Page->ReferCity->caption() ?></span></td>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el_patient_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <tr id="r_ReferMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span></td>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <tr id="r_ReferA4TreatingConsultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></span></td>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <tr id="r_PurposreReferredfor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></span></td>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
    <tr id="r_spouse_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_title"><?= $Page->spouse_title->caption() ?></span></td>
        <td data-name="spouse_title" <?= $Page->spouse_title->cellAttributes() ?>>
<span id="el_patient_spouse_title">
<span<?= $Page->spouse_title->viewAttributes() ?>>
<?= $Page->spouse_title->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
    <tr id="r_spouse_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_first_name"><?= $Page->spouse_first_name->caption() ?></span></td>
        <td data-name="spouse_first_name" <?= $Page->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_spouse_first_name">
<span<?= $Page->spouse_first_name->viewAttributes() ?>>
<?= $Page->spouse_first_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
    <tr id="r_spouse_middle_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_middle_name"><?= $Page->spouse_middle_name->caption() ?></span></td>
        <td data-name="spouse_middle_name" <?= $Page->spouse_middle_name->cellAttributes() ?>>
<span id="el_patient_spouse_middle_name">
<span<?= $Page->spouse_middle_name->viewAttributes() ?>>
<?= $Page->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
    <tr id="r_spouse_last_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_last_name"><?= $Page->spouse_last_name->caption() ?></span></td>
        <td data-name="spouse_last_name" <?= $Page->spouse_last_name->cellAttributes() ?>>
<span id="el_patient_spouse_last_name">
<span<?= $Page->spouse_last_name->viewAttributes() ?>>
<?= $Page->spouse_last_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
    <tr id="r_spouse_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_gender"><?= $Page->spouse_gender->caption() ?></span></td>
        <td data-name="spouse_gender" <?= $Page->spouse_gender->cellAttributes() ?>>
<span id="el_patient_spouse_gender">
<span<?= $Page->spouse_gender->viewAttributes() ?>>
<?= $Page->spouse_gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
    <tr id="r_spouse_dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_dob"><?= $Page->spouse_dob->caption() ?></span></td>
        <td data-name="spouse_dob" <?= $Page->spouse_dob->cellAttributes() ?>>
<span id="el_patient_spouse_dob">
<span<?= $Page->spouse_dob->viewAttributes() ?>>
<?= $Page->spouse_dob->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
    <tr id="r_spouse_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_Age"><?= $Page->spouse_Age->caption() ?></span></td>
        <td data-name="spouse_Age" <?= $Page->spouse_Age->cellAttributes() ?>>
<span id="el_patient_spouse_Age">
<span<?= $Page->spouse_Age->viewAttributes() ?>>
<?= $Page->spouse_Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
    <tr id="r_spouse_blood_group">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_blood_group"><?= $Page->spouse_blood_group->caption() ?></span></td>
        <td data-name="spouse_blood_group" <?= $Page->spouse_blood_group->cellAttributes() ?>>
<span id="el_patient_spouse_blood_group">
<span<?= $Page->spouse_blood_group->viewAttributes() ?>>
<?= $Page->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
    <tr id="r_spouse_mobile_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_mobile_no"><?= $Page->spouse_mobile_no->caption() ?></span></td>
        <td data-name="spouse_mobile_no" <?= $Page->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_spouse_mobile_no">
<span<?= $Page->spouse_mobile_no->viewAttributes() ?>>
<?= $Page->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
    <tr id="r_Maritalstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Maritalstatus"><?= $Page->Maritalstatus->caption() ?></span></td>
        <td data-name="Maritalstatus" <?= $Page->Maritalstatus->cellAttributes() ?>>
<span id="el_patient_Maritalstatus">
<span<?= $Page->Maritalstatus->viewAttributes() ?>>
<?= $Page->Maritalstatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
    <tr id="r_Business">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Business"><?= $Page->Business->caption() ?></span></td>
        <td data-name="Business" <?= $Page->Business->cellAttributes() ?>>
<span id="el_patient_Business">
<span<?= $Page->Business->viewAttributes() ?>>
<?= $Page->Business->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
    <tr id="r_Patient_Language">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Patient_Language"><?= $Page->Patient_Language->caption() ?></span></td>
        <td data-name="Patient_Language" <?= $Page->Patient_Language->cellAttributes() ?>>
<span id="el_patient_Patient_Language">
<span<?= $Page->Patient_Language->viewAttributes() ?>>
<?= $Page->Patient_Language->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
    <tr id="r_Passport">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Passport"><?= $Page->Passport->caption() ?></span></td>
        <td data-name="Passport" <?= $Page->Passport->cellAttributes() ?>>
<span id="el_patient_Passport">
<span<?= $Page->Passport->viewAttributes() ?>>
<?= $Page->Passport->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
    <tr id="r_VisaNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_VisaNo"><?= $Page->VisaNo->caption() ?></span></td>
        <td data-name="VisaNo" <?= $Page->VisaNo->cellAttributes() ?>>
<span id="el_patient_VisaNo">
<span<?= $Page->VisaNo->viewAttributes() ?>>
<?= $Page->VisaNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
    <tr id="r_ValidityOfVisa">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ValidityOfVisa"><?= $Page->ValidityOfVisa->caption() ?></span></td>
        <td data-name="ValidityOfVisa" <?= $Page->ValidityOfVisa->cellAttributes() ?>>
<span id="el_patient_ValidityOfVisa">
<span<?= $Page->ValidityOfVisa->viewAttributes() ?>>
<?= $Page->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <tr id="r_WhereDidYouHear">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></span></td>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <tr id="r_street">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_street"><?= $Page->street->caption() ?></span></td>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el_patient_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <tr id="r_town">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_town"><?= $Page->town->caption() ?></span></td>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el_patient_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_province"><?= $Page->province->caption() ?></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el_patient_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <tr id="r_country">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_country"><?= $Page->country->caption() ?></span></td>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<span id="el_patient_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_postal_code"><?= $Page->postal_code->caption() ?></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_patient_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
    <tr id="r_PEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PEmail"><?= $Page->PEmail->caption() ?></span></td>
        <td data-name="PEmail" <?= $Page->PEmail->cellAttributes() ?>>
<span id="el_patient_PEmail">
<span<?= $Page->PEmail->viewAttributes() ?>>
<?= $Page->PEmail->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
    <tr id="r_PEmergencyContact">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PEmergencyContact"><?= $Page->PEmergencyContact->caption() ?></span></td>
        <td data-name="PEmergencyContact" <?= $Page->PEmergencyContact->cellAttributes() ?>>
<span id="el_patient_PEmergencyContact">
<span<?= $Page->PEmergencyContact->viewAttributes() ?>>
<?= $Page->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
    <tr id="r_occupation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_occupation"><?= $Page->occupation->caption() ?></span></td>
        <td data-name="occupation" <?= $Page->occupation->cellAttributes() ?>>
<span id="el_patient_occupation">
<span<?= $Page->occupation->viewAttributes() ?>>
<?= $Page->occupation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
    <tr id="r_spouse_occupation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_occupation"><?= $Page->spouse_occupation->caption() ?></span></td>
        <td data-name="spouse_occupation" <?= $Page->spouse_occupation->cellAttributes() ?>>
<span id="el_patient_spouse_occupation">
<span<?= $Page->spouse_occupation->viewAttributes() ?>>
<?= $Page->spouse_occupation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
    <tr id="r_WhatsApp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_WhatsApp"><?= $Page->WhatsApp->caption() ?></span></td>
        <td data-name="WhatsApp" <?= $Page->WhatsApp->cellAttributes() ?>>
<span id="el_patient_WhatsApp">
<span<?= $Page->WhatsApp->viewAttributes() ?>>
<?= $Page->WhatsApp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
    <tr id="r_CouppleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_CouppleID"><?= $Page->CouppleID->caption() ?></span></td>
        <td data-name="CouppleID" <?= $Page->CouppleID->cellAttributes() ?>>
<span id="el_patient_CouppleID">
<span<?= $Page->CouppleID->viewAttributes() ?>>
<?= $Page->CouppleID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
    <tr id="r_MaleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_MaleID"><?= $Page->MaleID->caption() ?></span></td>
        <td data-name="MaleID" <?= $Page->MaleID->cellAttributes() ?>>
<span id="el_patient_MaleID">
<span<?= $Page->MaleID->viewAttributes() ?>>
<?= $Page->MaleID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
    <tr id="r_FemaleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_FemaleID"><?= $Page->FemaleID->caption() ?></span></td>
        <td data-name="FemaleID" <?= $Page->FemaleID->cellAttributes() ?>>
<span id="el_patient_FemaleID">
<span<?= $Page->FemaleID->viewAttributes() ?>>
<?= $Page->FemaleID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
    <tr id="r_GroupID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_GroupID"><?= $Page->GroupID->caption() ?></span></td>
        <td data-name="GroupID" <?= $Page->GroupID->cellAttributes() ?>>
<span id="el_patient_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
    <tr id="r_Relationship">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Relationship"><?= $Page->Relationship->caption() ?></span></td>
        <td data-name="Relationship" <?= $Page->Relationship->cellAttributes() ?>>
<span id="el_patient_Relationship">
<span<?= $Page->Relationship->viewAttributes() ?>>
<?= $Page->Relationship->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FacebookID->Visible) { // FacebookID ?>
    <tr id="r_FacebookID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_FacebookID"><?= $Page->FacebookID->caption() ?></span></td>
        <td data-name="FacebookID" <?= $Page->FacebookID->cellAttributes() ?>>
<span id="el_patient_FacebookID">
<span<?= $Page->FacebookID->viewAttributes() ?>>
<?= $Page->FacebookID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
