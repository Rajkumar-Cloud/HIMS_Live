<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.patient) ew.vars.tables.patient = <?= JsonEncode(GetClientVar("tables", "patient")) ?>;
</script>
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
<form name="fpatientview" id="fpatientview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_id"><template id="tpc_patient_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_id"><span id="el_patient_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PatientID"><template id="tpc_patient_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_patient_PatientID"><span id="el_patient_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->title->Visible) { // title ?>
    <tr id="r_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_title"><template id="tpc_patient_title"><?= $Page->title->caption() ?></template></span></td>
        <td data-name="title" <?= $Page->title->cellAttributes() ?>>
<template id="tpx_patient_title"><span id="el_patient_title">
<span<?= $Page->title->viewAttributes() ?>>
<?= $Page->title->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <tr id="r_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_first_name"><template id="tpc_patient_first_name"><?= $Page->first_name->caption() ?></template></span></td>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<template id="tpx_patient_first_name"><span id="el_patient_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->middle_name->Visible) { // middle_name ?>
    <tr id="r_middle_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_middle_name"><template id="tpc_patient_middle_name"><?= $Page->middle_name->caption() ?></template></span></td>
        <td data-name="middle_name" <?= $Page->middle_name->cellAttributes() ?>>
<template id="tpx_patient_middle_name"><span id="el_patient_middle_name">
<span<?= $Page->middle_name->viewAttributes() ?>>
<?= $Page->middle_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
    <tr id="r_last_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_last_name"><template id="tpc_patient_last_name"><?= $Page->last_name->caption() ?></template></span></td>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<template id="tpx_patient_last_name"><span id="el_patient_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_gender"><template id="tpc_patient_gender"><?= $Page->gender->caption() ?></template></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_patient_gender"><span id="el_patient_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
    <tr id="r_dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_dob"><template id="tpc_patient_dob"><?= $Page->dob->caption() ?></template></span></td>
        <td data-name="dob" <?= $Page->dob->cellAttributes() ?>>
<template id="tpx_patient_dob"><span id="el_patient_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Age"><template id="tpc_patient_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_Age"><span id="el_patient_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->blood_group->Visible) { // blood_group ?>
    <tr id="r_blood_group">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_blood_group"><template id="tpc_patient_blood_group"><?= $Page->blood_group->caption() ?></template></span></td>
        <td data-name="blood_group" <?= $Page->blood_group->cellAttributes() ?>>
<template id="tpx_patient_blood_group"><span id="el_patient_blood_group">
<span<?= $Page->blood_group->viewAttributes() ?>>
<?= $Page->blood_group->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <tr id="r_mobile_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_mobile_no"><template id="tpc_patient_mobile_no"><?= $Page->mobile_no->caption() ?></template></span></td>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<template id="tpx_patient_mobile_no"><span id="el_patient_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <tr id="r_description">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_description"><template id="tpc_patient_description"><?= $Page->description->caption() ?></template></span></td>
        <td data-name="description" <?= $Page->description->cellAttributes() ?>>
<template id="tpx_patient_description"><span id="el_patient_description">
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_status"><template id="tpc_patient_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_status"><span id="el_patient_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_createdby"><template id="tpc_patient_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_patient_createdby"><span id="el_patient_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_createddatetime"><template id="tpc_patient_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_patient_createddatetime"><span id="el_patient_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_modifiedby"><template id="tpc_patient_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_patient_modifiedby"><span id="el_patient_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_modifieddatetime"><template id="tpc_patient_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_patient_modifieddatetime"><span id="el_patient_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_profilePic"><template id="tpc_patient_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_profilePic"><span id="el_patient_profilePic">
<span>
<?= GetFileViewTag($Page->profilePic, $Page->profilePic->getViewValue(), false) ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <tr id="r_IdentificationMark">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_IdentificationMark"><template id="tpc_patient_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></template></span></td>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<template id="tpx_patient_IdentificationMark"><span id="el_patient_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <tr id="r_Religion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Religion"><template id="tpc_patient_Religion"><?= $Page->Religion->caption() ?></template></span></td>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<template id="tpx_patient_Religion"><span id="el_patient_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Nationality->Visible) { // Nationality ?>
    <tr id="r_Nationality">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Nationality"><template id="tpc_patient_Nationality"><?= $Page->Nationality->caption() ?></template></span></td>
        <td data-name="Nationality" <?= $Page->Nationality->cellAttributes() ?>>
<template id="tpx_patient_Nationality"><span id="el_patient_Nationality">
<span<?= $Page->Nationality->viewAttributes() ?>>
<?= $Page->Nationality->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <tr id="r_ReferedByDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferedByDr"><template id="tpc_patient_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></template></span></td>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_patient_ReferedByDr"><span id="el_patient_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <tr id="r_ReferClinicname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferClinicname"><template id="tpc_patient_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></template></span></td>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_patient_ReferClinicname"><span id="el_patient_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <tr id="r_ReferCity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferCity"><template id="tpc_patient_ReferCity"><?= $Page->ReferCity->caption() ?></template></span></td>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_patient_ReferCity"><span id="el_patient_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <tr id="r_ReferMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferMobileNo"><template id="tpc_patient_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></template></span></td>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_patient_ReferMobileNo"><span id="el_patient_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <tr id="r_ReferA4TreatingConsultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ReferA4TreatingConsultant"><template id="tpc_patient_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></template></span></td>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_patient_ReferA4TreatingConsultant"><span id="el_patient_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <tr id="r_PurposreReferredfor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PurposreReferredfor"><template id="tpc_patient_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></template></span></td>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_patient_PurposreReferredfor"><span id="el_patient_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_title->Visible) { // spouse_title ?>
    <tr id="r_spouse_title">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_title"><template id="tpc_patient_spouse_title"><?= $Page->spouse_title->caption() ?></template></span></td>
        <td data-name="spouse_title" <?= $Page->spouse_title->cellAttributes() ?>>
<template id="tpx_patient_spouse_title"><span id="el_patient_spouse_title">
<span<?= $Page->spouse_title->viewAttributes() ?>>
<?= $Page->spouse_title->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_first_name->Visible) { // spouse_first_name ?>
    <tr id="r_spouse_first_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_first_name"><template id="tpc_patient_spouse_first_name"><?= $Page->spouse_first_name->caption() ?></template></span></td>
        <td data-name="spouse_first_name" <?= $Page->spouse_first_name->cellAttributes() ?>>
<template id="tpx_patient_spouse_first_name"><span id="el_patient_spouse_first_name">
<span<?= $Page->spouse_first_name->viewAttributes() ?>>
<?= $Page->spouse_first_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_middle_name->Visible) { // spouse_middle_name ?>
    <tr id="r_spouse_middle_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_middle_name"><template id="tpc_patient_spouse_middle_name"><?= $Page->spouse_middle_name->caption() ?></template></span></td>
        <td data-name="spouse_middle_name" <?= $Page->spouse_middle_name->cellAttributes() ?>>
<template id="tpx_patient_spouse_middle_name"><span id="el_patient_spouse_middle_name">
<span<?= $Page->spouse_middle_name->viewAttributes() ?>>
<?= $Page->spouse_middle_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_last_name->Visible) { // spouse_last_name ?>
    <tr id="r_spouse_last_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_last_name"><template id="tpc_patient_spouse_last_name"><?= $Page->spouse_last_name->caption() ?></template></span></td>
        <td data-name="spouse_last_name" <?= $Page->spouse_last_name->cellAttributes() ?>>
<template id="tpx_patient_spouse_last_name"><span id="el_patient_spouse_last_name">
<span<?= $Page->spouse_last_name->viewAttributes() ?>>
<?= $Page->spouse_last_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_gender->Visible) { // spouse_gender ?>
    <tr id="r_spouse_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_gender"><template id="tpc_patient_spouse_gender"><?= $Page->spouse_gender->caption() ?></template></span></td>
        <td data-name="spouse_gender" <?= $Page->spouse_gender->cellAttributes() ?>>
<template id="tpx_patient_spouse_gender"><span id="el_patient_spouse_gender">
<span<?= $Page->spouse_gender->viewAttributes() ?>>
<?= $Page->spouse_gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_dob->Visible) { // spouse_dob ?>
    <tr id="r_spouse_dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_dob"><template id="tpc_patient_spouse_dob"><?= $Page->spouse_dob->caption() ?></template></span></td>
        <td data-name="spouse_dob" <?= $Page->spouse_dob->cellAttributes() ?>>
<template id="tpx_patient_spouse_dob"><span id="el_patient_spouse_dob">
<span<?= $Page->spouse_dob->viewAttributes() ?>>
<?= $Page->spouse_dob->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_Age->Visible) { // spouse_Age ?>
    <tr id="r_spouse_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_Age"><template id="tpc_patient_spouse_Age"><?= $Page->spouse_Age->caption() ?></template></span></td>
        <td data-name="spouse_Age" <?= $Page->spouse_Age->cellAttributes() ?>>
<template id="tpx_patient_spouse_Age"><span id="el_patient_spouse_Age">
<span<?= $Page->spouse_Age->viewAttributes() ?>>
<?= $Page->spouse_Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_blood_group->Visible) { // spouse_blood_group ?>
    <tr id="r_spouse_blood_group">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_blood_group"><template id="tpc_patient_spouse_blood_group"><?= $Page->spouse_blood_group->caption() ?></template></span></td>
        <td data-name="spouse_blood_group" <?= $Page->spouse_blood_group->cellAttributes() ?>>
<template id="tpx_patient_spouse_blood_group"><span id="el_patient_spouse_blood_group">
<span<?= $Page->spouse_blood_group->viewAttributes() ?>>
<?= $Page->spouse_blood_group->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
    <tr id="r_spouse_mobile_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_mobile_no"><template id="tpc_patient_spouse_mobile_no"><?= $Page->spouse_mobile_no->caption() ?></template></span></td>
        <td data-name="spouse_mobile_no" <?= $Page->spouse_mobile_no->cellAttributes() ?>>
<template id="tpx_patient_spouse_mobile_no"><span id="el_patient_spouse_mobile_no">
<span<?= $Page->spouse_mobile_no->viewAttributes() ?>>
<?= $Page->spouse_mobile_no->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Maritalstatus->Visible) { // Maritalstatus ?>
    <tr id="r_Maritalstatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Maritalstatus"><template id="tpc_patient_Maritalstatus"><?= $Page->Maritalstatus->caption() ?></template></span></td>
        <td data-name="Maritalstatus" <?= $Page->Maritalstatus->cellAttributes() ?>>
<template id="tpx_patient_Maritalstatus"><span id="el_patient_Maritalstatus">
<span<?= $Page->Maritalstatus->viewAttributes() ?>>
<?= $Page->Maritalstatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Business->Visible) { // Business ?>
    <tr id="r_Business">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Business"><template id="tpc_patient_Business"><?= $Page->Business->caption() ?></template></span></td>
        <td data-name="Business" <?= $Page->Business->cellAttributes() ?>>
<template id="tpx_patient_Business"><span id="el_patient_Business">
<span<?= $Page->Business->viewAttributes() ?>>
<?= $Page->Business->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
    <tr id="r_Patient_Language">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Patient_Language"><template id="tpc_patient_Patient_Language"><?= $Page->Patient_Language->caption() ?></template></span></td>
        <td data-name="Patient_Language" <?= $Page->Patient_Language->cellAttributes() ?>>
<template id="tpx_patient_Patient_Language"><span id="el_patient_Patient_Language">
<span<?= $Page->Patient_Language->viewAttributes() ?>>
<?= $Page->Patient_Language->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Passport->Visible) { // Passport ?>
    <tr id="r_Passport">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Passport"><template id="tpc_patient_Passport"><?= $Page->Passport->caption() ?></template></span></td>
        <td data-name="Passport" <?= $Page->Passport->cellAttributes() ?>>
<template id="tpx_patient_Passport"><span id="el_patient_Passport">
<span<?= $Page->Passport->viewAttributes() ?>>
<?= $Page->Passport->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VisaNo->Visible) { // VisaNo ?>
    <tr id="r_VisaNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_VisaNo"><template id="tpc_patient_VisaNo"><?= $Page->VisaNo->caption() ?></template></span></td>
        <td data-name="VisaNo" <?= $Page->VisaNo->cellAttributes() ?>>
<template id="tpx_patient_VisaNo"><span id="el_patient_VisaNo">
<span<?= $Page->VisaNo->viewAttributes() ?>>
<?= $Page->VisaNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
    <tr id="r_ValidityOfVisa">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ValidityOfVisa"><template id="tpc_patient_ValidityOfVisa"><?= $Page->ValidityOfVisa->caption() ?></template></span></td>
        <td data-name="ValidityOfVisa" <?= $Page->ValidityOfVisa->cellAttributes() ?>>
<template id="tpx_patient_ValidityOfVisa"><span id="el_patient_ValidityOfVisa">
<span<?= $Page->ValidityOfVisa->viewAttributes() ?>>
<?= $Page->ValidityOfVisa->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <tr id="r_WhereDidYouHear">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_WhereDidYouHear"><template id="tpc_patient_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></template></span></td>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<template id="tpx_patient_WhereDidYouHear"><span id="el_patient_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_HospID"><template id="tpc_patient_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_patient_HospID"><span id="el_patient_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <tr id="r_street">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_street"><template id="tpc_patient_street"><?= $Page->street->caption() ?></template></span></td>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<template id="tpx_patient_street"><span id="el_patient_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <tr id="r_town">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_town"><template id="tpc_patient_town"><?= $Page->town->caption() ?></template></span></td>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<template id="tpx_patient_town"><span id="el_patient_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_province"><template id="tpc_patient_province"><?= $Page->province->caption() ?></template></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<template id="tpx_patient_province"><span id="el_patient_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->country->Visible) { // country ?>
    <tr id="r_country">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_country"><template id="tpc_patient_country"><?= $Page->country->caption() ?></template></span></td>
        <td data-name="country" <?= $Page->country->cellAttributes() ?>>
<template id="tpx_patient_country"><span id="el_patient_country">
<span<?= $Page->country->viewAttributes() ?>>
<?= $Page->country->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_postal_code"><template id="tpc_patient_postal_code"><?= $Page->postal_code->caption() ?></template></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<template id="tpx_patient_postal_code"><span id="el_patient_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PEmail->Visible) { // PEmail ?>
    <tr id="r_PEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PEmail"><template id="tpc_patient_PEmail"><?= $Page->PEmail->caption() ?></template></span></td>
        <td data-name="PEmail" <?= $Page->PEmail->cellAttributes() ?>>
<template id="tpx_patient_PEmail"><span id="el_patient_PEmail">
<span<?= $Page->PEmail->viewAttributes() ?>>
<?= $Page->PEmail->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PEmergencyContact->Visible) { // PEmergencyContact ?>
    <tr id="r_PEmergencyContact">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_PEmergencyContact"><template id="tpc_patient_PEmergencyContact"><?= $Page->PEmergencyContact->caption() ?></template></span></td>
        <td data-name="PEmergencyContact" <?= $Page->PEmergencyContact->cellAttributes() ?>>
<template id="tpx_patient_PEmergencyContact"><span id="el_patient_PEmergencyContact">
<span<?= $Page->PEmergencyContact->viewAttributes() ?>>
<?= $Page->PEmergencyContact->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->occupation->Visible) { // occupation ?>
    <tr id="r_occupation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_occupation"><template id="tpc_patient_occupation"><?= $Page->occupation->caption() ?></template></span></td>
        <td data-name="occupation" <?= $Page->occupation->cellAttributes() ?>>
<template id="tpx_patient_occupation"><span id="el_patient_occupation">
<span<?= $Page->occupation->viewAttributes() ?>>
<?= $Page->occupation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->spouse_occupation->Visible) { // spouse_occupation ?>
    <tr id="r_spouse_occupation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_spouse_occupation"><template id="tpc_patient_spouse_occupation"><?= $Page->spouse_occupation->caption() ?></template></span></td>
        <td data-name="spouse_occupation" <?= $Page->spouse_occupation->cellAttributes() ?>>
<template id="tpx_patient_spouse_occupation"><span id="el_patient_spouse_occupation">
<span<?= $Page->spouse_occupation->viewAttributes() ?>>
<?= $Page->spouse_occupation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WhatsApp->Visible) { // WhatsApp ?>
    <tr id="r_WhatsApp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_WhatsApp"><template id="tpc_patient_WhatsApp"><?= $Page->WhatsApp->caption() ?></template></span></td>
        <td data-name="WhatsApp" <?= $Page->WhatsApp->cellAttributes() ?>>
<template id="tpx_patient_WhatsApp"><span id="el_patient_WhatsApp">
<span<?= $Page->WhatsApp->viewAttributes() ?>>
<?= $Page->WhatsApp->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CouppleID->Visible) { // CouppleID ?>
    <tr id="r_CouppleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_CouppleID"><template id="tpc_patient_CouppleID"><?= $Page->CouppleID->caption() ?></template></span></td>
        <td data-name="CouppleID" <?= $Page->CouppleID->cellAttributes() ?>>
<template id="tpx_patient_CouppleID"><span id="el_patient_CouppleID">
<span<?= $Page->CouppleID->viewAttributes() ?>>
<?= $Page->CouppleID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaleID->Visible) { // MaleID ?>
    <tr id="r_MaleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_MaleID"><template id="tpc_patient_MaleID"><?= $Page->MaleID->caption() ?></template></span></td>
        <td data-name="MaleID" <?= $Page->MaleID->cellAttributes() ?>>
<template id="tpx_patient_MaleID"><span id="el_patient_MaleID">
<span<?= $Page->MaleID->viewAttributes() ?>>
<?= $Page->MaleID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FemaleID->Visible) { // FemaleID ?>
    <tr id="r_FemaleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_FemaleID"><template id="tpc_patient_FemaleID"><?= $Page->FemaleID->caption() ?></template></span></td>
        <td data-name="FemaleID" <?= $Page->FemaleID->cellAttributes() ?>>
<template id="tpx_patient_FemaleID"><span id="el_patient_FemaleID">
<span<?= $Page->FemaleID->viewAttributes() ?>>
<?= $Page->FemaleID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GroupID->Visible) { // GroupID ?>
    <tr id="r_GroupID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_GroupID"><template id="tpc_patient_GroupID"><?= $Page->GroupID->caption() ?></template></span></td>
        <td data-name="GroupID" <?= $Page->GroupID->cellAttributes() ?>>
<template id="tpx_patient_GroupID"><span id="el_patient_GroupID">
<span<?= $Page->GroupID->viewAttributes() ?>>
<?= $Page->GroupID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Relationship->Visible) { // Relationship ?>
    <tr id="r_Relationship">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Relationship"><template id="tpc_patient_Relationship"><?= $Page->Relationship->caption() ?></template></span></td>
        <td data-name="Relationship" <?= $Page->Relationship->cellAttributes() ?>>
<template id="tpx_patient_Relationship"><span id="el_patient_Relationship">
<span<?= $Page->Relationship->viewAttributes() ?>>
<?= $Page->Relationship->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AppointmentSearch->Visible) { // AppointmentSearch ?>
    <tr id="r_AppointmentSearch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_AppointmentSearch"><template id="tpc_patient_AppointmentSearch"><?= $Page->AppointmentSearch->caption() ?></template></span></td>
        <td data-name="AppointmentSearch" <?= $Page->AppointmentSearch->cellAttributes() ?>>
<template id="tpx_patient_AppointmentSearch"><span id="el_patient_AppointmentSearch">
<span<?= $Page->AppointmentSearch->viewAttributes() ?>>
<?= $Page->AppointmentSearch->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FacebookID->Visible) { // FacebookID ?>
    <tr id="r_FacebookID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_FacebookID"><template id="tpc_patient_FacebookID"><?= $Page->FacebookID->caption() ?></template></span></td>
        <td data-name="FacebookID" <?= $Page->FacebookID->cellAttributes() ?>>
<template id="tpx_patient_FacebookID"><span id="el_patient_FacebookID">
<span<?= $Page->FacebookID->viewAttributes() ?>>
<?= $Page->FacebookID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePicImage->Visible) { // profilePicImage ?>
    <tr id="r_profilePicImage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_profilePicImage"><template id="tpc_patient_profilePicImage"><?= $Page->profilePicImage->caption() ?></template></span></td>
        <td data-name="profilePicImage" <?= $Page->profilePicImage->cellAttributes() ?>>
<template id="tpx_patient_profilePicImage"><span id="el_patient_profilePicImage">
<span<?= $Page->profilePicImage->viewAttributes() ?>>
<?= GetFileViewTag($Page->profilePicImage, $Page->profilePicImage->getViewValue(), false) ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Clients->Visible) { // Clients ?>
    <tr id="r_Clients">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_Clients"><template id="tpc_patient_Clients"><?= $Page->Clients->caption() ?></template></span></td>
        <td data-name="Clients" <?= $Page->Clients->cellAttributes() ?>>
<template id="tpx_patient_Clients"><span id="el_patient_Clients">
<span<?= $Page->Clients->viewAttributes() ?>>
<?= $Page->Clients->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_patientview" class="ew-custom-template"></div>
<template id="tpm_patientview">
<div id="ct_PatientView"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$pcid = $_GET["id"] ;
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$Iid = $_GET["id"] ;
$dbhelper = &DbHelper();
if($pcid != null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Male='". $pcid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$IVFid = $resultsa[0]["RIDNO"];
	$ccid = $resultsa[0]["Name"];
	$cPatientID = $resultsa[0]["PartnerID"];
}
if($cPatientID == null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Female='".$pcid."'; ";
	$results1a = $dbhelper->ExecuteRows($sql);
	$IVFida = $resultsa[0]["RIDNO"];
	$ccida = $resultsa[0]["Name"];
	$cPatientID = $resultsa[0]["PatientID"];
}
?>	
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_patient_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_PatientID"></slot></h3>
	</div>
	<div class="col-4">
	 <?php  if($cPatientID != '')
{ echo "Partner ID : ".$cPatientID; }
  ?>
	</div>
	<div class="col-4">
		<h3 class="card-title">
			<slot class="ew-slot" name="tpc_patient_AppointmentSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_AppointmentSearch"></slot>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_title"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_title"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_first_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_first_name"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_middle_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_middle_name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_last_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_last_name"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_gender"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_dob"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_dob"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_Age"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_blood_group"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_blood_group"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_mobile_no"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_mobile_no"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_occupation"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_occupation"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spouse Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_title"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_title"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_first_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_first_name"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_middle_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_middle_name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_last_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_last_name"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_gender"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_dob"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_dob"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_Age"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_blood_group"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_blood_group"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_mobile_no"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_mobile_no"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_spouse_occupation"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_spouse_occupation"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Address</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_street"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_street"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_town"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_town"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_province"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_province"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_Passport"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_Passport"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_country"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_country"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_postal_code"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_postal_code"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_PEmail"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_PEmail"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_VisaNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_VisaNo"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#7D3C98">
				<h3 class="card-title">Patient Other Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_IdentificationMark"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_IdentificationMark"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_Religion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_Religion"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_Nationality"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_Nationality"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_profilePic"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">
<input hidden type="text" id="screenshotFF" name="screenshotFF" value="">
					</span>
				  </div>
<div id="screenshot" style="text-align:center;">
  <video class="videostream" autoplay></video>
  <img id="screenshot-img"  name="screenshot-img">
<div class="row">  
<p  id="capture-button"  name="capture-button" class="col-4 capture-button btn btn-primary btn-block">Capture video</p>
<p id="screenshot-button"  name="screenshot-button" class="col-4 btn btn-success btn-block"  disabled>Take screenshot</p>
</div>
</div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_Maritalstatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_Maritalstatus"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_Business"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_Business"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_Patient_Language"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_Patient_Language"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_PEmergencyContact"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_PEmergencyContact"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_description"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_description"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_WhatsApp"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_WhatsApp"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_FacebookID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_FacebookID"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#1F618D">
				<h3 class="card-title">Refered By.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_ReferedByDr"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ReferedByDr"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_ReferClinicname"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ReferClinicname"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_ReferCity"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ReferCity"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_ReferMobileNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ReferMobileNo"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_ReferA4TreatingConsultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ReferA4TreatingConsultant"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_PurposreReferredfor"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_PurposreReferredfor"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Where Did You Hear About This</h3>
			</div>
			<div class="card-body">
			<slot class="ew-slot" name="tpc_patient_WhereDidYouHear"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_WhereDidYouHear"></slot>
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php
    if (in_array("patient_address", explode(",", $Page->getCurrentDetailTable())) && $patient_address->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientAddressGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_email", explode(",", $Page->getCurrentDetailTable())) && $patient_email->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientEmailGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_telephone", explode(",", $Page->getCurrentDetailTable())) && $patient_telephone->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientTelephoneGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_emergency_contact", explode(",", $Page->getCurrentDetailTable())) && $patient_emergency_contact->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_emergency_contact", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientEmergencyContactGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_document", explode(",", $Page->getCurrentDetailTable())) && $patient_document->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientDocumentGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patientview", "tpm_patientview", "patientview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
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
