<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpAdmissionBillSummaryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ip_admission_bill_summaryview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_ip_admission_bill_summaryview = currentForm = new ew.Form("fview_ip_admission_bill_summaryview", "view");
    loadjs.done("fview_ip_admission_bill_summaryview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_ip_admission_bill_summary) ew.vars.tables.view_ip_admission_bill_summary = <?= JsonEncode(GetClientVar("tables", "view_ip_admission_bill_summary")) ?>;
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
<form name="fview_ip_admission_bill_summaryview" id="fview_ip_admission_bill_summaryview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_id"><template id="tpc_view_ip_admission_bill_summary_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_id"><span id="el_view_ip_admission_bill_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <tr id="r_mrnNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_mrnNo"><template id="tpc_view_ip_admission_bill_summary_mrnNo"><?= $Page->mrnNo->caption() ?></template></span></td>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_mrnNo"><span id="el_view_ip_admission_bill_summary_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PatientID"><template id="tpc_view_ip_admission_bill_summary_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PatientID"><span id="el_view_ip_admission_bill_summary_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <tr id="r_patient_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_patient_name"><template id="tpc_view_ip_admission_bill_summary_patient_name"><?= $Page->patient_name->caption() ?></template></span></td>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_patient_name"><span id="el_view_ip_admission_bill_summary_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <tr id="r_mobileno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_mobileno"><template id="tpc_view_ip_admission_bill_summary_mobileno"><?= $Page->mobileno->caption() ?></template></span></td>
        <td data-name="mobileno" <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_mobileno"><span id="el_view_ip_admission_bill_summary_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_profilePic"><template id="tpc_view_ip_admission_bill_summary_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_profilePic"><span id="el_view_ip_admission_bill_summary_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_gender"><template id="tpc_view_ip_admission_bill_summary_gender"><?= $Page->gender->caption() ?></template></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_gender"><span id="el_view_ip_admission_bill_summary_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <tr id="r_age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_age"><template id="tpc_view_ip_admission_bill_summary_age"><?= $Page->age->caption() ?></template></span></td>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_age"><span id="el_view_ip_admission_bill_summary_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <tr id="r_physician_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_physician_id"><template id="tpc_view_ip_admission_bill_summary_physician_id"><?= $Page->physician_id->caption() ?></template></span></td>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_physician_id"><span id="el_view_ip_admission_bill_summary_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <tr id="r_typeRegsisteration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_typeRegsisteration"><template id="tpc_view_ip_admission_bill_summary_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?></template></span></td>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_typeRegsisteration"><span id="el_view_ip_admission_bill_summary_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <tr id="r_PaymentCategory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PaymentCategory"><template id="tpc_view_ip_admission_bill_summary_PaymentCategory"><?= $Page->PaymentCategory->caption() ?></template></span></td>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PaymentCategory"><span id="el_view_ip_admission_bill_summary_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <tr id="r_admission_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_admission_consultant_id"><template id="tpc_view_ip_admission_bill_summary_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?></template></span></td>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_admission_consultant_id"><span id="el_view_ip_admission_bill_summary_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <tr id="r_leading_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_leading_consultant_id"><template id="tpc_view_ip_admission_bill_summary_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?></template></span></td>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_leading_consultant_id"><span id="el_view_ip_admission_bill_summary_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <tr id="r_cause">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_cause"><template id="tpc_view_ip_admission_bill_summary_cause"><?= $Page->cause->caption() ?></template></span></td>
        <td data-name="cause" <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_cause"><span id="el_view_ip_admission_bill_summary_cause">
<span<?= $Page->cause->viewAttributes() ?>>
<?= $Page->cause->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <tr id="r_admission_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_admission_date"><template id="tpc_view_ip_admission_bill_summary_admission_date"><?= $Page->admission_date->caption() ?></template></span></td>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_admission_date"><span id="el_view_ip_admission_bill_summary_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <tr id="r_release_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_release_date"><template id="tpc_view_ip_admission_bill_summary_release_date"><?= $Page->release_date->caption() ?></template></span></td>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_release_date"><span id="el_view_ip_admission_bill_summary_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <tr id="r_PaymentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PaymentStatus"><template id="tpc_view_ip_admission_bill_summary_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></template></span></td>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PaymentStatus"><span id="el_view_ip_admission_bill_summary_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_status"><template id="tpc_view_ip_admission_bill_summary_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_status"><span id="el_view_ip_admission_bill_summary_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_createdby"><template id="tpc_view_ip_admission_bill_summary_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_createdby"><span id="el_view_ip_admission_bill_summary_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_createddatetime"><template id="tpc_view_ip_admission_bill_summary_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_createddatetime"><span id="el_view_ip_admission_bill_summary_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_modifiedby"><template id="tpc_view_ip_admission_bill_summary_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_modifiedby"><span id="el_view_ip_admission_bill_summary_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_modifieddatetime"><template id="tpc_view_ip_admission_bill_summary_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_modifieddatetime"><span id="el_view_ip_admission_bill_summary_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_HospID"><template id="tpc_view_ip_admission_bill_summary_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_HospID"><span id="el_view_ip_admission_bill_summary_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <tr id="r_ReferedByDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferedByDr"><template id="tpc_view_ip_admission_bill_summary_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></template></span></td>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferedByDr"><span id="el_view_ip_admission_bill_summary_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <tr id="r_ReferClinicname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferClinicname"><template id="tpc_view_ip_admission_bill_summary_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></template></span></td>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferClinicname"><span id="el_view_ip_admission_bill_summary_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <tr id="r_ReferCity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferCity"><template id="tpc_view_ip_admission_bill_summary_ReferCity"><?= $Page->ReferCity->caption() ?></template></span></td>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferCity"><span id="el_view_ip_admission_bill_summary_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <tr id="r_ReferMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferMobileNo"><template id="tpc_view_ip_admission_bill_summary_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></template></span></td>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferMobileNo"><span id="el_view_ip_admission_bill_summary_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <tr id="r_ReferA4TreatingConsultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant"><template id="tpc_view_ip_admission_bill_summary_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></template></span></td>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReferA4TreatingConsultant"><span id="el_view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <tr id="r_PurposreReferredfor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PurposreReferredfor"><template id="tpc_view_ip_admission_bill_summary_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></template></span></td>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_PurposreReferredfor"><span id="el_view_ip_admission_bill_summary_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <tr id="r_BillClosing">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillClosing"><template id="tpc_view_ip_admission_bill_summary_BillClosing"><?= $Page->BillClosing->caption() ?></template></span></td>
        <td data-name="BillClosing" <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillClosing"><span id="el_view_ip_admission_bill_summary_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <tr id="r_BillClosingDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillClosingDate"><template id="tpc_view_ip_admission_bill_summary_BillClosingDate"><?= $Page->BillClosingDate->caption() ?></template></span></td>
        <td data-name="BillClosingDate" <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillClosingDate"><span id="el_view_ip_admission_bill_summary_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <tr id="r_BillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillNumber"><template id="tpc_view_ip_admission_bill_summary_BillNumber"><?= $Page->BillNumber->caption() ?></template></span></td>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillNumber"><span id="el_view_ip_admission_bill_summary_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <tr id="r_ClosingAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ClosingAmount"><template id="tpc_view_ip_admission_bill_summary_ClosingAmount"><?= $Page->ClosingAmount->caption() ?></template></span></td>
        <td data-name="ClosingAmount" <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ClosingAmount"><span id="el_view_ip_admission_bill_summary_ClosingAmount">
<span<?= $Page->ClosingAmount->viewAttributes() ?>>
<?= $Page->ClosingAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <tr id="r_ClosingType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ClosingType"><template id="tpc_view_ip_admission_bill_summary_ClosingType"><?= $Page->ClosingType->caption() ?></template></span></td>
        <td data-name="ClosingType" <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ClosingType"><span id="el_view_ip_admission_bill_summary_ClosingType">
<span<?= $Page->ClosingType->viewAttributes() ?>>
<?= $Page->ClosingType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <tr id="r_BillAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillAmount"><template id="tpc_view_ip_admission_bill_summary_BillAmount"><?= $Page->BillAmount->caption() ?></template></span></td>
        <td data-name="BillAmount" <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_BillAmount"><span id="el_view_ip_admission_bill_summary_BillAmount">
<span<?= $Page->BillAmount->viewAttributes() ?>>
<?= $Page->BillAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <tr id="r_billclosedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_billclosedBy"><template id="tpc_view_ip_admission_bill_summary_billclosedBy"><?= $Page->billclosedBy->caption() ?></template></span></td>
        <td data-name="billclosedBy" <?= $Page->billclosedBy->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_billclosedBy"><span id="el_view_ip_admission_bill_summary_billclosedBy">
<span<?= $Page->billclosedBy->viewAttributes() ?>>
<?= $Page->billclosedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <tr id="r_bllcloseByDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_bllcloseByDate"><template id="tpc_view_ip_admission_bill_summary_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?></template></span></td>
        <td data-name="bllcloseByDate" <?= $Page->bllcloseByDate->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_bllcloseByDate"><span id="el_view_ip_admission_bill_summary_bllcloseByDate">
<span<?= $Page->bllcloseByDate->viewAttributes() ?>>
<?= $Page->bllcloseByDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <tr id="r_ReportHeader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReportHeader"><template id="tpc_view_ip_admission_bill_summary_ReportHeader"><?= $Page->ReportHeader->caption() ?></template></span></td>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_ReportHeader"><span id="el_view_ip_admission_bill_summary_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <tr id="r_Procedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Procedure"><template id="tpc_view_ip_admission_bill_summary_Procedure"><?= $Page->Procedure->caption() ?></template></span></td>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Procedure"><span id="el_view_ip_admission_bill_summary_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Consultant"><template id="tpc_view_ip_admission_bill_summary_Consultant"><?= $Page->Consultant->caption() ?></template></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Consultant"><span id="el_view_ip_admission_bill_summary_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <tr id="r_Anesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Anesthetist"><template id="tpc_view_ip_admission_bill_summary_Anesthetist"><?= $Page->Anesthetist->caption() ?></template></span></td>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Anesthetist"><span id="el_view_ip_admission_bill_summary_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <tr id="r_Amound">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Amound"><template id="tpc_view_ip_admission_bill_summary_Amound"><?= $Page->Amound->caption() ?></template></span></td>
        <td data-name="Amound" <?= $Page->Amound->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Amound"><span id="el_view_ip_admission_bill_summary_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_patient_id"><template id="tpc_view_ip_admission_bill_summary_patient_id"><?= $Page->patient_id->caption() ?></template></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_patient_id"><span id="el_view_ip_admission_bill_summary_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <tr id="r_Package">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Package"><template id="tpc_view_ip_admission_bill_summary_Package"><?= $Page->Package->caption() ?></template></span></td>
        <td data-name="Package" <?= $Page->Package->cellAttributes() ?>>
<template id="tpx_view_ip_admission_bill_summary_Package"><span id="el_view_ip_admission_bill_summary_Package">
<span<?= $Page->Package->viewAttributes() ?>>
<?= $Page->Package->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_ip_admission_bill_summaryview" class="ew-custom-template"></div>
<template id="tpm_view_ip_admission_bill_summaryview">
<div id="ct_ViewIpAdmissionBillSummaryView"><style>
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
			<font size="4" >
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td width="60%"><b>Description</b></td>
<td width="20%"><b><?php  echo "                 ";  ?></b></td>
<td><b align="right">Amount</b></td>
</tr>
							 <?php
	$hhh .= '<tr><td>'.$Page->Procedure->CurrentValue.'</td><td></td><td align="right">'.$Page->BillAmount->CurrentValue.'</td></tr>  ';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Vid='".$invoiceId."'  and TestType != 'ProfileSubTest';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td align="right">Total</td><td align="right">'.$Page->BillAmount->CurrentValue.'</td></tr>  ';
echo $hhh;
$tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
$GRTotal = $Page->BillAmount->CurrentValue;
?>		
</table> 
<?php
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. $GRTotal.' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency(str_replace(",","",$GRTotal)).' </b></br>';
?>
<br><br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right"><?php echo $Page->billclosedBy->CurrentValue; ?><p>
	  </font>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_ip_admission_bill_summaryview", "tpm_view_ip_admission_bill_summaryview", "view_ip_admission_bill_summaryview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
