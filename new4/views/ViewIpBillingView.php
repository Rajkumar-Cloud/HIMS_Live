<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpBillingView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ip_billingview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_ip_billingview = currentForm = new ew.Form("fview_ip_billingview", "view");
    loadjs.done("fview_ip_billingview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_ip_billing) ew.vars.tables.view_ip_billing = <?= JsonEncode(GetClientVar("tables", "view_ip_billing")) ?>;
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
<form name="fview_ip_billingview" id="fview_ip_billingview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_billing">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_id"><template id="tpc_view_ip_billing_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_id"><span id="el_view_ip_billing_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PatientID"><template id="tpc_view_ip_billing_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PatientID"><span id="el_view_ip_billing_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <tr id="r_patient_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_patient_name"><template id="tpc_view_ip_billing_patient_name"><?= $Page->patient_name->caption() ?></template></span></td>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_view_ip_billing_patient_name"><span id="el_view_ip_billing_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <tr id="r_mrnNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_mrnNo"><template id="tpc_view_ip_billing_mrnNo"><?= $Page->mrnNo->caption() ?></template></span></td>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_view_ip_billing_mrnNo"><span id="el_view_ip_billing_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <tr id="r_mobileno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_mobileno"><template id="tpc_view_ip_billing_mobileno"><?= $Page->mobileno->caption() ?></template></span></td>
        <td data-name="mobileno" <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx_view_ip_billing_mobileno"><span id="el_view_ip_billing_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_profilePic"><template id="tpc_view_ip_billing_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_ip_billing_profilePic"><span id="el_view_ip_billing_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_gender"><template id="tpc_view_ip_billing_gender"><?= $Page->gender->caption() ?></template></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_view_ip_billing_gender"><span id="el_view_ip_billing_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <tr id="r_age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_age"><template id="tpc_view_ip_billing_age"><?= $Page->age->caption() ?></template></span></td>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<template id="tpx_view_ip_billing_age"><span id="el_view_ip_billing_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <tr id="r_physician_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_physician_id"><template id="tpc_view_ip_billing_physician_id"><?= $Page->physician_id->caption() ?></template></span></td>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_physician_id"><span id="el_view_ip_billing_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <tr id="r_typeRegsisteration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_typeRegsisteration"><template id="tpc_view_ip_billing_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?></template></span></td>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_view_ip_billing_typeRegsisteration"><span id="el_view_ip_billing_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <tr id="r_PaymentCategory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PaymentCategory"><template id="tpc_view_ip_billing_PaymentCategory"><?= $Page->PaymentCategory->caption() ?></template></span></td>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PaymentCategory"><span id="el_view_ip_billing_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <tr id="r_admission_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_admission_consultant_id"><template id="tpc_view_ip_billing_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?></template></span></td>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_admission_consultant_id"><span id="el_view_ip_billing_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <tr id="r_leading_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_leading_consultant_id"><template id="tpc_view_ip_billing_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?></template></span></td>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_leading_consultant_id"><span id="el_view_ip_billing_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <tr id="r_cause">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_cause"><template id="tpc_view_ip_billing_cause"><?= $Page->cause->caption() ?></template></span></td>
        <td data-name="cause" <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_view_ip_billing_cause"><span id="el_view_ip_billing_cause">
<span<?= $Page->cause->viewAttributes() ?>>
<?= $Page->cause->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <tr id="r_admission_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_admission_date"><template id="tpc_view_ip_billing_admission_date"><?= $Page->admission_date->caption() ?></template></span></td>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_view_ip_billing_admission_date"><span id="el_view_ip_billing_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <tr id="r_release_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_release_date"><template id="tpc_view_ip_billing_release_date"><?= $Page->release_date->caption() ?></template></span></td>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_view_ip_billing_release_date"><span id="el_view_ip_billing_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <tr id="r_PaymentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PaymentStatus"><template id="tpc_view_ip_billing_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></template></span></td>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PaymentStatus"><span id="el_view_ip_billing_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_status"><template id="tpc_view_ip_billing_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_ip_billing_status"><span id="el_view_ip_billing_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_createdby"><template id="tpc_view_ip_billing_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_ip_billing_createdby"><span id="el_view_ip_billing_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_createddatetime"><template id="tpc_view_ip_billing_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_billing_createddatetime"><span id="el_view_ip_billing_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_modifiedby"><template id="tpc_view_ip_billing_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_ip_billing_modifiedby"><span id="el_view_ip_billing_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_modifieddatetime"><template id="tpc_view_ip_billing_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_billing_modifieddatetime"><span id="el_view_ip_billing_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_HospID"><template id="tpc_view_ip_billing_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_ip_billing_HospID"><span id="el_view_ip_billing_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <tr id="r_ReferedByDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferedByDr"><template id="tpc_view_ip_billing_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></template></span></td>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferedByDr"><span id="el_view_ip_billing_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <tr id="r_ReferClinicname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferClinicname"><template id="tpc_view_ip_billing_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></template></span></td>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferClinicname"><span id="el_view_ip_billing_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <tr id="r_ReferCity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferCity"><template id="tpc_view_ip_billing_ReferCity"><?= $Page->ReferCity->caption() ?></template></span></td>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferCity"><span id="el_view_ip_billing_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <tr id="r_ReferMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferMobileNo"><template id="tpc_view_ip_billing_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></template></span></td>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferMobileNo"><span id="el_view_ip_billing_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <tr id="r_ReferA4TreatingConsultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferA4TreatingConsultant"><template id="tpc_view_ip_billing_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></template></span></td>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferA4TreatingConsultant"><span id="el_view_ip_billing_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <tr id="r_PurposreReferredfor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PurposreReferredfor"><template id="tpc_view_ip_billing_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></template></span></td>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PurposreReferredfor"><span id="el_view_ip_billing_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_patient_id"><template id="tpc_view_ip_billing_patient_id"><?= $Page->patient_id->caption() ?></template></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_patient_id"><span id="el_view_ip_billing_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <tr id="r_BillClosing">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillClosing"><template id="tpc_view_ip_billing_BillClosing"><?= $Page->BillClosing->caption() ?></template></span></td>
        <td data-name="BillClosing" <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillClosing"><span id="el_view_ip_billing_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <tr id="r_BillClosingDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillClosingDate"><template id="tpc_view_ip_billing_BillClosingDate"><?= $Page->BillClosingDate->caption() ?></template></span></td>
        <td data-name="BillClosingDate" <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillClosingDate"><span id="el_view_ip_billing_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <tr id="r_BillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillNumber"><template id="tpc_view_ip_billing_BillNumber"><?= $Page->BillNumber->caption() ?></template></span></td>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillNumber"><span id="el_view_ip_billing_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <tr id="r_ClosingAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ClosingAmount"><template id="tpc_view_ip_billing_ClosingAmount"><?= $Page->ClosingAmount->caption() ?></template></span></td>
        <td data-name="ClosingAmount" <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ClosingAmount"><span id="el_view_ip_billing_ClosingAmount">
<span<?= $Page->ClosingAmount->viewAttributes() ?>>
<?= $Page->ClosingAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <tr id="r_ClosingType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ClosingType"><template id="tpc_view_ip_billing_ClosingType"><?= $Page->ClosingType->caption() ?></template></span></td>
        <td data-name="ClosingType" <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ClosingType"><span id="el_view_ip_billing_ClosingType">
<span<?= $Page->ClosingType->viewAttributes() ?>>
<?= $Page->ClosingType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <tr id="r_BillAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillAmount"><template id="tpc_view_ip_billing_BillAmount"><?= $Page->BillAmount->caption() ?></template></span></td>
        <td data-name="BillAmount" <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillAmount"><span id="el_view_ip_billing_BillAmount">
<span<?= $Page->BillAmount->viewAttributes() ?>>
<?= $Page->BillAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <tr id="r_billclosedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_billclosedBy"><template id="tpc_view_ip_billing_billclosedBy"><?= $Page->billclosedBy->caption() ?></template></span></td>
        <td data-name="billclosedBy" <?= $Page->billclosedBy->cellAttributes() ?>>
<template id="tpx_view_ip_billing_billclosedBy"><span id="el_view_ip_billing_billclosedBy">
<span<?= $Page->billclosedBy->viewAttributes() ?>>
<?= $Page->billclosedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <tr id="r_bllcloseByDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_bllcloseByDate"><template id="tpc_view_ip_billing_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?></template></span></td>
        <td data-name="bllcloseByDate" <?= $Page->bllcloseByDate->cellAttributes() ?>>
<template id="tpx_view_ip_billing_bllcloseByDate"><span id="el_view_ip_billing_bllcloseByDate">
<span<?= $Page->bllcloseByDate->viewAttributes() ?>>
<?= $Page->bllcloseByDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <tr id="r_ReportHeader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReportHeader"><template id="tpc_view_ip_billing_ReportHeader"><?= $Page->ReportHeader->caption() ?></template></span></td>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReportHeader"><span id="el_view_ip_billing_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_ip_billingview" class="ew-custom-template"></div>
<template id="tpm_view_ip_billingview">
<div id="ct_ViewIpBillingView"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
	$invoiceId = $Page->id->CurrentValue;
	$dbhelper = &DbHelper();
	$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$invoiceId."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$physician_id = $results1[0]["physician_id"];
$BillNumber =  $results1[0]["BillNumber"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$physician_id."'; ";
	$results1A = $dbhelper->ExecuteRows($sql);
	$Doctor = $results1A[0]["NAME"];
	$patient_id = $results1[0]["PatientID"];
	$PatId = $results1[0]["patient_id"];
	$HospID = $results1[0]["HospID"];
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $PatientName =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT IP BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT IP BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: <?php echo $BillNumber; ?></td></tr>
		<tr><td  style="float:left;">Patient Name: <?php echo $PatientName; ?></td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: <?php echo $Doctor; ?></td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
<?php
$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT Service_Department FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' group by Service_Department;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["Service_Department"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' and  Service_Department='".$rowA["Service_Department"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = $row["Quantity"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}

//==============================

//$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT BRCODE,BRNAME FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' group by BRCODE,BRNAME;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["BRNAME"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Mfg</b></td>
<td align="center"><b>Exp</b></td>
<td align="center"><b>Batch</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' and  BRCODE='".$rowA["BRCODE"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Product"];
				$ItemCode =  $row["PRC"];
				$Mfg =  $row["Mfg"];
				//$EXPDT =  $row["EXPDT"];
				$EXPDT =  date("d-m-Y", strtotime($row["EXPDT"]));
				$BATCHNO =  $row["BATCHNO"];
				$Qty = number_format($row["IQ"]);
				$Rate =  $row["RT"];
				$SubTotal =  $row["DAMT"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$hhh .= '<tr><td>'.$Services.'</td><td>'.$Mfg.'</td><td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}
 $hhh = '<font size="4" > <b>Advance</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Advance No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SASTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  $row["Amount"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.number_format($row["Amount"],2).'</td></tr>  ';
$SASTotal = $SASTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SASTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
 $hhh = '<font size="4" > <b>Refund</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Refund No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						    $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SrSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_refund_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  number_format($row["Amount"],2);

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SrSTotal = $SrSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SrSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
if($SrSTotal != '')
{
	  echo $hhh;
}
 $hhh = '<font size="4" > 
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="left" style="width:50%"><b>Total Bill Amount</b></td>
<td align="right"><b align="right">'.number_format($GRTotal,2).'</b></td>
</tr>';
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Advance Amount</b></td>
<td align="right"><b align="right">'.number_format($SASTotal,2).'</b></td>
</tr>';
if($SSTotal != '')
{
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Refund Amount</b></td>
<td align="right"><b align="right">'.number_format($SrSTotal,2).'</b></td>
</tr>';
	   $BALTotal = ($GRTotal - $SASTotal)+$SrSTotal;
	$hhh .= '<tr><td align="left">(Total Bill Amount - Total Advance Amount) + Total Refund Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}else
{
 $BALTotal = $GRTotal - $SASTotal;
$hhh .= '<tr><td align="left">Total Bill Amount - Total Advance Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}
$hhh .= '</table> </font><br>';
 echo $hhh;
 if($BALTotal > 100)
 {
 	echo '</br><b>Balance amount to be paid : '.$BALTotal.' <b></br>';
 }
 if($BALTotal < 0)
 {
 	echo '</br><b>Balance amount to be Refund : '.$BALTotal.' <b></br>';
 }
 if($BALTotal >= 0 && $BALTotal <= 100)
 {
	 echo '</br><b>Bill Tallied <b> </br>';
 }
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. number_format($GRTotal,2).' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency($GRTotal).' </b></br>';
?>
<br><br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_ip_billingview", "tpm_view_ip_billingview", "view_ip_billingview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
