<?php

namespace PHPMaker2021\HIMS;

// Page object
$IpAdmissionView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fip_admissionview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fip_admissionview = currentForm = new ew.Form("fip_admissionview", "view");
    loadjs.done("fip_admissionview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ip_admission) ew.vars.tables.ip_admission = <?= JsonEncode(GetClientVar("tables", "ip_admission")) ?>;
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
<form name="fip_admissionview" id="fip_admissionview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_id"><template id="tpc_ip_admission_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ip_admission_id"><span id="el_ip_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <tr id="r_mrnNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_mrnNo"><template id="tpc_ip_admission_mrnNo"><?= $Page->mrnNo->caption() ?></template></span></td>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_ip_admission_mrnNo"><span id="el_ip_admission_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PatientID"><template id="tpc_ip_admission_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_ip_admission_PatientID"><span id="el_ip_admission_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <tr id="r_patient_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_patient_name"><template id="tpc_ip_admission_patient_name"><?= $Page->patient_name->caption() ?></template></span></td>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_ip_admission_patient_name"><span id="el_ip_admission_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <tr id="r_mobileno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_mobileno"><template id="tpc_ip_admission_mobileno"><?= $Page->mobileno->caption() ?></template></span></td>
        <td data-name="mobileno" <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx_ip_admission_mobileno"><span id="el_ip_admission_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_gender"><template id="tpc_ip_admission_gender"><?= $Page->gender->caption() ?></template></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_ip_admission_gender"><span id="el_ip_admission_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <tr id="r_age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_age"><template id="tpc_ip_admission_age"><?= $Page->age->caption() ?></template></span></td>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<template id="tpx_ip_admission_age"><span id="el_ip_admission_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <tr id="r_typeRegsisteration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_typeRegsisteration"><template id="tpc_ip_admission_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?></template></span></td>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_ip_admission_typeRegsisteration"><span id="el_ip_admission_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <tr id="r_PaymentCategory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PaymentCategory"><template id="tpc_ip_admission_PaymentCategory"><?= $Page->PaymentCategory->caption() ?></template></span></td>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_ip_admission_PaymentCategory"><span id="el_ip_admission_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <tr id="r_physician_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_physician_id"><template id="tpc_ip_admission_physician_id"><?= $Page->physician_id->caption() ?></template></span></td>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_ip_admission_physician_id"><span id="el_ip_admission_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <tr id="r_admission_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_admission_consultant_id"><template id="tpc_ip_admission_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?></template></span></td>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_ip_admission_admission_consultant_id"><span id="el_ip_admission_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <tr id="r_leading_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_leading_consultant_id"><template id="tpc_ip_admission_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?></template></span></td>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_ip_admission_leading_consultant_id"><span id="el_ip_admission_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <tr id="r_cause">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_cause"><template id="tpc_ip_admission_cause"><?= $Page->cause->caption() ?></template></span></td>
        <td data-name="cause" <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_ip_admission_cause"><span id="el_ip_admission_cause">
<span<?= $Page->cause->viewAttributes() ?>>
<?= $Page->cause->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <tr id="r_admission_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_admission_date"><template id="tpc_ip_admission_admission_date"><?= $Page->admission_date->caption() ?></template></span></td>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_ip_admission_admission_date"><span id="el_ip_admission_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <tr id="r_release_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_release_date"><template id="tpc_ip_admission_release_date"><?= $Page->release_date->caption() ?></template></span></td>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_ip_admission_release_date"><span id="el_ip_admission_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <tr id="r_PaymentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PaymentStatus"><template id="tpc_ip_admission_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></template></span></td>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_ip_admission_PaymentStatus"><span id="el_ip_admission_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_status"><template id="tpc_ip_admission_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ip_admission_status"><span id="el_ip_admission_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_createdby"><template id="tpc_ip_admission_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_ip_admission_createdby"><span id="el_ip_admission_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_createddatetime"><template id="tpc_ip_admission_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_ip_admission_createddatetime"><span id="el_ip_admission_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_modifiedby"><template id="tpc_ip_admission_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_ip_admission_modifiedby"><span id="el_ip_admission_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_modifieddatetime"><template id="tpc_ip_admission_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_ip_admission_modifieddatetime"><span id="el_ip_admission_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_profilePic"><template id="tpc_ip_admission_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_ip_admission_profilePic"><span id="el_ip_admission_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_HospID"><template id="tpc_ip_admission_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_ip_admission_HospID"><span id="el_ip_admission_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DOB->Visible) { // DOB ?>
    <tr id="r_DOB">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_DOB"><template id="tpc_ip_admission_DOB"><?= $Page->DOB->caption() ?></template></span></td>
        <td data-name="DOB" <?= $Page->DOB->cellAttributes() ?>>
<template id="tpx_ip_admission_DOB"><span id="el_ip_admission_DOB">
<span<?= $Page->DOB->viewAttributes() ?>>
<?= $Page->DOB->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <tr id="r_ReferedByDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferedByDr"><template id="tpc_ip_admission_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></template></span></td>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferedByDr"><span id="el_ip_admission_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <tr id="r_ReferClinicname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferClinicname"><template id="tpc_ip_admission_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></template></span></td>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferClinicname"><span id="el_ip_admission_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <tr id="r_ReferCity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferCity"><template id="tpc_ip_admission_ReferCity"><?= $Page->ReferCity->caption() ?></template></span></td>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferCity"><span id="el_ip_admission_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <tr id="r_ReferMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferMobileNo"><template id="tpc_ip_admission_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></template></span></td>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferMobileNo"><span id="el_ip_admission_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <tr id="r_ReferA4TreatingConsultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant"><template id="tpc_ip_admission_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></template></span></td>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferA4TreatingConsultant"><span id="el_ip_admission_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <tr id="r_PurposreReferredfor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PurposreReferredfor"><template id="tpc_ip_admission_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></template></span></td>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_ip_admission_PurposreReferredfor"><span id="el_ip_admission_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <tr id="r_BillClosing">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillClosing"><template id="tpc_ip_admission_BillClosing"><?= $Page->BillClosing->caption() ?></template></span></td>
        <td data-name="BillClosing" <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx_ip_admission_BillClosing"><span id="el_ip_admission_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <tr id="r_BillClosingDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillClosingDate"><template id="tpc_ip_admission_BillClosingDate"><?= $Page->BillClosingDate->caption() ?></template></span></td>
        <td data-name="BillClosingDate" <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx_ip_admission_BillClosingDate"><span id="el_ip_admission_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <tr id="r_BillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillNumber"><template id="tpc_ip_admission_BillNumber"><?= $Page->BillNumber->caption() ?></template></span></td>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_ip_admission_BillNumber"><span id="el_ip_admission_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <tr id="r_ClosingAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ClosingAmount"><template id="tpc_ip_admission_ClosingAmount"><?= $Page->ClosingAmount->caption() ?></template></span></td>
        <td data-name="ClosingAmount" <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx_ip_admission_ClosingAmount"><span id="el_ip_admission_ClosingAmount">
<span<?= $Page->ClosingAmount->viewAttributes() ?>>
<?= $Page->ClosingAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <tr id="r_ClosingType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ClosingType"><template id="tpc_ip_admission_ClosingType"><?= $Page->ClosingType->caption() ?></template></span></td>
        <td data-name="ClosingType" <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx_ip_admission_ClosingType"><span id="el_ip_admission_ClosingType">
<span<?= $Page->ClosingType->viewAttributes() ?>>
<?= $Page->ClosingType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <tr id="r_BillAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillAmount"><template id="tpc_ip_admission_BillAmount"><?= $Page->BillAmount->caption() ?></template></span></td>
        <td data-name="BillAmount" <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx_ip_admission_BillAmount"><span id="el_ip_admission_BillAmount">
<span<?= $Page->BillAmount->viewAttributes() ?>>
<?= $Page->BillAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <tr id="r_billclosedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_billclosedBy"><template id="tpc_ip_admission_billclosedBy"><?= $Page->billclosedBy->caption() ?></template></span></td>
        <td data-name="billclosedBy" <?= $Page->billclosedBy->cellAttributes() ?>>
<template id="tpx_ip_admission_billclosedBy"><span id="el_ip_admission_billclosedBy">
<span<?= $Page->billclosedBy->viewAttributes() ?>>
<?= $Page->billclosedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <tr id="r_bllcloseByDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_bllcloseByDate"><template id="tpc_ip_admission_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?></template></span></td>
        <td data-name="bllcloseByDate" <?= $Page->bllcloseByDate->cellAttributes() ?>>
<template id="tpx_ip_admission_bllcloseByDate"><span id="el_ip_admission_bllcloseByDate">
<span<?= $Page->bllcloseByDate->viewAttributes() ?>>
<?= $Page->bllcloseByDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <tr id="r_ReportHeader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReportHeader"><template id="tpc_ip_admission_ReportHeader"><?= $Page->ReportHeader->caption() ?></template></span></td>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_ip_admission_ReportHeader"><span id="el_ip_admission_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <tr id="r_Procedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Procedure"><template id="tpc_ip_admission_Procedure"><?= $Page->Procedure->caption() ?></template></span></td>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_ip_admission_Procedure"><span id="el_ip_admission_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Consultant"><template id="tpc_ip_admission_Consultant"><?= $Page->Consultant->caption() ?></template></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ip_admission_Consultant"><span id="el_ip_admission_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <tr id="r_Anesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Anesthetist"><template id="tpc_ip_admission_Anesthetist"><?= $Page->Anesthetist->caption() ?></template></span></td>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx_ip_admission_Anesthetist"><span id="el_ip_admission_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <tr id="r_Amound">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Amound"><template id="tpc_ip_admission_Amound"><?= $Page->Amound->caption() ?></template></span></td>
        <td data-name="Amound" <?= $Page->Amound->cellAttributes() ?>>
<template id="tpx_ip_admission_Amound"><span id="el_ip_admission_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <tr id="r_Package">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Package"><template id="tpc_ip_admission_Package"><?= $Page->Package->caption() ?></template></span></td>
        <td data-name="Package" <?= $Page->Package->cellAttributes() ?>>
<template id="tpx_ip_admission_Package"><span id="el_ip_admission_Package">
<span<?= $Page->Package->viewAttributes() ?>>
<?= $Page->Package->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_patient_id"><template id="tpc_ip_admission_patient_id"><?= $Page->patient_id->caption() ?></template></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_ip_admission_patient_id"><span id="el_ip_admission_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <tr id="r_PartnerID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerID"><template id="tpc_ip_admission_PartnerID"><?= $Page->PartnerID->caption() ?></template></span></td>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerID"><span id="el_ip_admission_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerName"><template id="tpc_ip_admission_PartnerName"><?= $Page->PartnerName->caption() ?></template></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerName"><span id="el_ip_admission_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <tr id="r_PartnerMobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerMobile"><template id="tpc_ip_admission_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></template></span></td>
        <td data-name="PartnerMobile" <?= $Page->PartnerMobile->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerMobile"><span id="el_ip_admission_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
    <tr id="r_Cid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Cid"><template id="tpc_ip_admission_Cid"><?= $Page->Cid->caption() ?></template></span></td>
        <td data-name="Cid" <?= $Page->Cid->cellAttributes() ?>>
<template id="tpx_ip_admission_Cid"><span id="el_ip_admission_Cid">
<span<?= $Page->Cid->viewAttributes() ?>>
<?= $Page->Cid->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
    <tr id="r_PartId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartId"><template id="tpc_ip_admission_PartId"><?= $Page->PartId->caption() ?></template></span></td>
        <td data-name="PartId" <?= $Page->PartId->cellAttributes() ?>>
<template id="tpx_ip_admission_PartId"><span id="el_ip_admission_PartId">
<span<?= $Page->PartId->viewAttributes() ?>>
<?= $Page->PartId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
    <tr id="r_IDProof">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_IDProof"><template id="tpc_ip_admission_IDProof"><?= $Page->IDProof->caption() ?></template></span></td>
        <td data-name="IDProof" <?= $Page->IDProof->cellAttributes() ?>>
<template id="tpx_ip_admission_IDProof"><span id="el_ip_admission_IDProof">
<span<?= $Page->IDProof->viewAttributes() ?>>
<?= $Page->IDProof->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
    <tr id="r_AdviceToOtherHospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_AdviceToOtherHospital"><template id="tpc_ip_admission_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?></template></span></td>
        <td data-name="AdviceToOtherHospital" <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<template id="tpx_ip_admission_AdviceToOtherHospital"><span id="el_ip_admission_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <tr id="r_Reason">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Reason"><template id="tpc_ip_admission_Reason"><?= $Page->Reason->caption() ?></template></span></td>
        <td data-name="Reason" <?= $Page->Reason->cellAttributes() ?>>
<template id="tpx_ip_admission_Reason"><span id="el_ip_admission_Reason">
<span<?= $Page->Reason->viewAttributes() ?>>
<?= $Page->Reason->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ip_admissionview" class="ew-custom-template"></div>
<template id="tpm_ip_admissionview">
<div id="ct_IpAdmissionView"><style>
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Select Patient </h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_patient_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_patient_id"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_patient_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_patient_name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_mobileno"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_mobileno"></slot></span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PatientID"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_mrnNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_mrnNo"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_gender"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_age"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_age"></slot></span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_DOB"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_DOB"></slot></span>
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
				<h3 class="card-title">Patient Visit Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_physician_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_physician_id"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_typeRegsisteration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_typeRegsisteration"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PaymentCategory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PaymentCategory"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PaymentStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PaymentStatus"></slot></span>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferedByDr"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferedByDr"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferClinicname"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferClinicname"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferCity"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferCity"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferMobileNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferMobileNo"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferA4TreatingConsultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferA4TreatingConsultant"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PurposreReferredfor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PurposreReferredfor"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php
    if (in_array("patient_vitals", explode(",", $Page->getCurrentDetailTable())) && $patient_vitals->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_vitals", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientVitalsGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_history", explode(",", $Page->getCurrentDetailTable())) && $patient_history->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_history", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientHistoryGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_provisional_diagnosis", explode(",", $Page->getCurrentDetailTable())) && $patient_provisional_diagnosis->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_provisional_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientProvisionalDiagnosisGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_prescription", explode(",", $Page->getCurrentDetailTable())) && $patient_prescription->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_prescription", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientPrescriptionGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_final_diagnosis", explode(",", $Page->getCurrentDetailTable())) && $patient_final_diagnosis->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_final_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientFinalDiagnosisGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_follow_up", explode(",", $Page->getCurrentDetailTable())) && $patient_follow_up->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_follow_up", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientFollowUpGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_ot_delivery_register", explode(",", $Page->getCurrentDetailTable())) && $patient_ot_delivery_register->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_ot_delivery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientOtDeliveryRegisterGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_ot_surgery_register", explode(",", $Page->getCurrentDetailTable())) && $patient_ot_surgery_register->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_ot_surgery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientOtSurgeryRegisterGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_services", explode(",", $Page->getCurrentDetailTable())) && $patient_services->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientServicesGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_investigations", explode(",", $Page->getCurrentDetailTable())) && $patient_investigations->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_investigations", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientInvestigationsGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_insurance", explode(",", $Page->getCurrentDetailTable())) && $patient_insurance->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_insurance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientInsuranceGrid.php" ?>
<?php } ?>
<?php
    if (in_array("pharmacy_pharled", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_pharled->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyPharledGrid.php" ?>
<?php } ?>
<?php
    if (in_array("view_ip_advance", explode(",", $Page->getCurrentDetailTable())) && $view_ip_advance->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_ip_advance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewIpAdvanceGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_room", explode(",", $Page->getCurrentDetailTable())) && $patient_room->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_room", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientRoomGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ip_admissionview", "tpm_ip_admissionview", "ip_admissionview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
