<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientDischargeSummaryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_patient_discharge_summaryview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_patient_discharge_summaryview = currentForm = new ew.Form("fview_patient_discharge_summaryview", "view");
    loadjs.done("fview_patient_discharge_summaryview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_patient_discharge_summary) ew.vars.tables.view_patient_discharge_summary = <?= JsonEncode(GetClientVar("tables", "view_patient_discharge_summary")) ?>;
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
<form name="fview_patient_discharge_summaryview" id="fview_patient_discharge_summaryview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_patient_discharge_summary">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_id"><template id="tpc_view_patient_discharge_summary_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_id"><span id="el_view_patient_discharge_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_PatientID"><template id="tpc_view_patient_discharge_summary_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_PatientID"><span id="el_view_patient_discharge_summary_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?php if (!EmptyString($Page->PatientID->getViewValue()) && $Page->PatientID->linkAttributes() != "") { ?>
<a<?= $Page->PatientID->linkAttributes() ?>><?= $Page->PatientID->getViewValue() ?></a>
<?php } else { ?>
<?= $Page->PatientID->getViewValue() ?>
<?php } ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <tr id="r_patient_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_patient_name"><template id="tpc_view_patient_discharge_summary_patient_name"><?= $Page->patient_name->caption() ?></template></span></td>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_patient_name"><span id="el_view_patient_discharge_summary_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_profilePic"><template id="tpc_view_patient_discharge_summary_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_profilePic"><span id="el_view_patient_discharge_summary_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_gender"><template id="tpc_view_patient_discharge_summary_gender"><?= $Page->gender->caption() ?></template></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_gender"><span id="el_view_patient_discharge_summary_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <tr id="r_age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_age"><template id="tpc_view_patient_discharge_summary_age"><?= $Page->age->caption() ?></template></span></td>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_age"><span id="el_view_patient_discharge_summary_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <tr id="r_physician_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_physician_id"><template id="tpc_view_patient_discharge_summary_physician_id"><?= $Page->physician_id->caption() ?></template></span></td>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_physician_id"><span id="el_view_patient_discharge_summary_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <tr id="r_typeRegsisteration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_typeRegsisteration"><template id="tpc_view_patient_discharge_summary_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?></template></span></td>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_typeRegsisteration"><span id="el_view_patient_discharge_summary_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <tr id="r_PaymentCategory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_PaymentCategory"><template id="tpc_view_patient_discharge_summary_PaymentCategory"><?= $Page->PaymentCategory->caption() ?></template></span></td>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_PaymentCategory"><span id="el_view_patient_discharge_summary_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <tr id="r_admission_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_admission_consultant_id"><template id="tpc_view_patient_discharge_summary_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?></template></span></td>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_admission_consultant_id"><span id="el_view_patient_discharge_summary_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <tr id="r_leading_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_leading_consultant_id"><template id="tpc_view_patient_discharge_summary_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?></template></span></td>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_leading_consultant_id"><span id="el_view_patient_discharge_summary_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <tr id="r_cause">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_cause"><template id="tpc_view_patient_discharge_summary_cause"><?= $Page->cause->caption() ?></template></span></td>
        <td data-name="cause" <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_cause"><span id="el_view_patient_discharge_summary_cause">
<span<?= $Page->cause->viewAttributes() ?>>
<?= $Page->cause->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <tr id="r_admission_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_admission_date"><template id="tpc_view_patient_discharge_summary_admission_date"><?= $Page->admission_date->caption() ?></template></span></td>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_admission_date"><span id="el_view_patient_discharge_summary_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <tr id="r_release_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_release_date"><template id="tpc_view_patient_discharge_summary_release_date"><?= $Page->release_date->caption() ?></template></span></td>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_release_date"><span id="el_view_patient_discharge_summary_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <tr id="r_PaymentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_PaymentStatus"><template id="tpc_view_patient_discharge_summary_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></template></span></td>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_PaymentStatus"><span id="el_view_patient_discharge_summary_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_HospID"><template id="tpc_view_patient_discharge_summary_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_HospID"><span id="el_view_patient_discharge_summary_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_status"><template id="tpc_view_patient_discharge_summary_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_status"><span id="el_view_patient_discharge_summary_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <tr id="r_mrnNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_mrnNo"><template id="tpc_view_patient_discharge_summary_mrnNo"><?= $Page->mrnNo->caption() ?></template></span></td>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_mrnNo"><span id="el_view_patient_discharge_summary_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_createdby"><template id="tpc_view_patient_discharge_summary_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_createdby"><span id="el_view_patient_discharge_summary_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_createddatetime"><template id="tpc_view_patient_discharge_summary_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_createddatetime"><span id="el_view_patient_discharge_summary_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_modifiedby"><template id="tpc_view_patient_discharge_summary_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_modifiedby"><span id="el_view_patient_discharge_summary_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_modifieddatetime"><template id="tpc_view_patient_discharge_summary_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_modifieddatetime"><span id="el_view_patient_discharge_summary_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->provisional_diagnosis->Visible) { // provisional_diagnosis ?>
    <tr id="r_provisional_diagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_provisional_diagnosis"><template id="tpc_view_patient_discharge_summary_provisional_diagnosis"><?= $Page->provisional_diagnosis->caption() ?></template></span></td>
        <td data-name="provisional_diagnosis" <?= $Page->provisional_diagnosis->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_provisional_diagnosis"><span id="el_view_patient_discharge_summary_provisional_diagnosis">
<span<?= $Page->provisional_diagnosis->viewAttributes() ?>>
<?= $Page->provisional_diagnosis->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Treatments->Visible) { // Treatments ?>
    <tr id="r_Treatments">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_Treatments"><template id="tpc_view_patient_discharge_summary_Treatments"><?= $Page->Treatments->caption() ?></template></span></td>
        <td data-name="Treatments" <?= $Page->Treatments->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_Treatments"><span id="el_view_patient_discharge_summary_Treatments">
<span<?= $Page->Treatments->viewAttributes() ?>>
<?= $Page->Treatments->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
    <tr id="r_FinalDiagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_FinalDiagnosis"><template id="tpc_view_patient_discharge_summary_FinalDiagnosis"><?= $Page->FinalDiagnosis->caption() ?></template></span></td>
        <td data-name="FinalDiagnosis" <?= $Page->FinalDiagnosis->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_FinalDiagnosis"><span id="el_view_patient_discharge_summary_FinalDiagnosis">
<span<?= $Page->FinalDiagnosis->viewAttributes() ?>>
<?= $Page->FinalDiagnosis->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <tr id="r_BP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_BP"><template id="tpc_view_patient_discharge_summary_BP"><?= $Page->BP->caption() ?></template></span></td>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_BP"><span id="el_view_patient_discharge_summary_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <tr id="r_Pulse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_Pulse"><template id="tpc_view_patient_discharge_summary_Pulse"><?= $Page->Pulse->caption() ?></template></span></td>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_Pulse"><span id="el_view_patient_discharge_summary_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
    <tr id="r_Resp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_Resp"><template id="tpc_view_patient_discharge_summary_Resp"><?= $Page->Resp->caption() ?></template></span></td>
        <td data-name="Resp" <?= $Page->Resp->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_Resp"><span id="el_view_patient_discharge_summary_Resp">
<span<?= $Page->Resp->viewAttributes() ?>>
<?= $Page->Resp->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
    <tr id="r_SPO2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_SPO2"><template id="tpc_view_patient_discharge_summary_SPO2"><?= $Page->SPO2->caption() ?></template></span></td>
        <td data-name="SPO2" <?= $Page->SPO2->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_SPO2"><span id="el_view_patient_discharge_summary_SPO2">
<span<?= $Page->SPO2->viewAttributes() ?>>
<?= $Page->SPO2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { // FollowupAdvice ?>
    <tr id="r_FollowupAdvice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_FollowupAdvice"><template id="tpc_view_patient_discharge_summary_FollowupAdvice"><?= $Page->FollowupAdvice->caption() ?></template></span></td>
        <td data-name="FollowupAdvice" <?= $Page->FollowupAdvice->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_FollowupAdvice"><span id="el_view_patient_discharge_summary_FollowupAdvice">
<span<?= $Page->FollowupAdvice->viewAttributes() ?>>
<?= $Page->FollowupAdvice->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <tr id="r_NextReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_NextReviewDate"><template id="tpc_view_patient_discharge_summary_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></template></span></td>
        <td data-name="NextReviewDate" <?= $Page->NextReviewDate->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_NextReviewDate"><span id="el_view_patient_discharge_summary_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->History->Visible) { // History ?>
    <tr id="r_History">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_History"><template id="tpc_view_patient_discharge_summary_History"><?= $Page->History->caption() ?></template></span></td>
        <td data-name="History" <?= $Page->History->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_History"><span id="el_view_patient_discharge_summary_History">
<span<?= $Page->History->viewAttributes() ?>>
<?= $Page->History->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_patient_id"><template id="tpc_view_patient_discharge_summary_patient_id"><?= $Page->patient_id->caption() ?></template></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_patient_id"><span id="el_view_patient_discharge_summary_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitals->Visible) { // vitals ?>
    <tr id="r_vitals">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_vitals"><template id="tpc_view_patient_discharge_summary_vitals"><?= $Page->vitals->caption() ?></template></span></td>
        <td data-name="vitals" <?= $Page->vitals->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_vitals"><span id="el_view_patient_discharge_summary_vitals">
<span<?= $Page->vitals->viewAttributes() ?>>
<?= $Page->vitals->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->courseinhospital->Visible) { // courseinhospital ?>
    <tr id="r_courseinhospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_courseinhospital"><template id="tpc_view_patient_discharge_summary_courseinhospital"><?= $Page->courseinhospital->caption() ?></template></span></td>
        <td data-name="courseinhospital" <?= $Page->courseinhospital->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_courseinhospital"><span id="el_view_patient_discharge_summary_courseinhospital">
<span<?= $Page->courseinhospital->viewAttributes() ?>>
<?= $Page->courseinhospital->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <tr id="r_procedurenotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_procedurenotes"><template id="tpc_view_patient_discharge_summary_procedurenotes"><?= $Page->procedurenotes->caption() ?></template></span></td>
        <td data-name="procedurenotes" <?= $Page->procedurenotes->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_procedurenotes"><span id="el_view_patient_discharge_summary_procedurenotes">
<span<?= $Page->procedurenotes->viewAttributes() ?>>
<?= $Page->procedurenotes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->conditionatdischarge->Visible) { // conditionatdischarge ?>
    <tr id="r_conditionatdischarge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_conditionatdischarge"><template id="tpc_view_patient_discharge_summary_conditionatdischarge"><?= $Page->conditionatdischarge->caption() ?></template></span></td>
        <td data-name="conditionatdischarge" <?= $Page->conditionatdischarge->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_conditionatdischarge"><span id="el_view_patient_discharge_summary_conditionatdischarge">
<span<?= $Page->conditionatdischarge->viewAttributes() ?>>
<?= $Page->conditionatdischarge->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
    <tr id="r_AdviceToOtherHospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_AdviceToOtherHospital"><template id="tpc_view_patient_discharge_summary_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?></template></span></td>
        <td data-name="AdviceToOtherHospital" <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_AdviceToOtherHospital"><span id="el_view_patient_discharge_summary_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <tr id="r_ReferedByDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_ReferedByDr"><template id="tpc_view_patient_discharge_summary_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></template></span></td>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_ReferedByDr"><span id="el_view_patient_discharge_summary_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DischargeAdviceMedicine->Visible) { // DischargeAdviceMedicine ?>
    <tr id="r_DischargeAdviceMedicine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_DischargeAdviceMedicine"><template id="tpc_view_patient_discharge_summary_DischargeAdviceMedicine"><?= $Page->DischargeAdviceMedicine->caption() ?></template></span></td>
        <td data-name="DischargeAdviceMedicine" <?= $Page->DischargeAdviceMedicine->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_DischargeAdviceMedicine"><span id="el_view_patient_discharge_summary_DischargeAdviceMedicine">
<span<?= $Page->DischargeAdviceMedicine->viewAttributes() ?>>
<?= $Page->DischargeAdviceMedicine->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vid->Visible) { // vid ?>
    <tr id="r_vid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_vid"><template id="tpc_view_patient_discharge_summary_vid"><?= $Page->vid->caption() ?></template></span></td>
        <td data-name="vid" <?= $Page->vid->cellAttributes() ?>>
<template id="tpx_view_patient_discharge_summary_vid"><span id="el_view_patient_discharge_summary_vid">
<span<?= $Page->vid->viewAttributes() ?>>
<?= $Page->vid->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_patient_discharge_summaryview" class="ew-custom-template"></div>
<template id="tpm_view_patient_discharge_summaryview">
<div id="ct_ViewPatientDischargeSummaryView"><style>
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
 $Reception = $Page->id->CurrentValue;
 $patient_id = $Page->patient_id->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patient_id."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	 $bloodgroup =  $row["blood_group"];
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
  $sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$Page->physician_id->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 	 $rs->MoveNext();
 }
 $aa = "ewbarcode.php?data=".$Page->patient_id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 ?>	
 <div style="width:100%">
<font face = "calibre" >
<h2 align="center">DISCHARGE SUMMARY</h2>
<font size="4" style="font-weight: bold;">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>Patient Name: {{: patient_name }}</td>
			<td align="right"><?php $originalDate = $Page->release_date->CurrentValue;  echo   date("F j, Y", strtotime($originalDate)) ;  ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Gender: {{: gender }}</td>
			<td align="right">Consultant: <?php echo $DrName; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Age: {{: age }}</td>
			<td align="right">Patient ID: {{: PatientID }}</td>
		</tr>
		<tr>
			<td style='width:50%;'>Contact No: <?php echo $mobile_no; ?></td>
			<td align="right"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
</font>
<svg height="1" width="100%">
  <line x1="0" y1="0" x2="100%" y2="0" style="stroke:rgb(0,0,0);stroke-width:2" />
</svg>
<font size="4">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:280px;'><font size="4" style="font-weight: bold;">Address</td>
			<td>:</font> <?php echo $address ; ?></td>
		</tr>
 <?php
				if($Page->ReferedByDr->CurrentValue != '')
				{
					$ReferedByDr = $Page->ReferedByDr->CurrentValue;
					echo "<tr><td style='width:280px;'><font size='4' style='font-weight: bold;'>Refered By</td><td>:</font> " . $ReferedByDr . "</td></tr>";
				}
?>
		<tr>
			<td><font size="4" style="font-weight: bold;">Date of Admission	</td>
			<td>:</font>  <?php
				if($Page->admission_date->CurrentValue != '')
				{
					$originalDate = $Page->admission_date->CurrentValue;
					$newDate = date("d/m/Y H:i:s", strtotime($originalDate));
					echo  $newDate;
				} ?> 	</td>
		</tr>
		<tr>
			<td><font size="4" style="font-weight: bold;">Date of Discharge</td>
			<td>: </font>  <?php
					if($Page->release_date->CurrentValue != '' )
					{
						$originalDate = $Page->release_date->CurrentValue;
						$newDate = date("d/m/Y H:i:s", strtotime($originalDate));
						echo  $newDate;
					}?> 
			</td>
		</tr>
																																																																																																<?php
if($PEmail != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">E Mail	</td><td> : </font>'. $PEmail .  ' </td></tr>';
}
if($IdentificationMark != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Identification Mark	</td><td> : </font>'. $IdentificationMark .  ' </td></tr>';
}
if($bloodgroup != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Blood Group	</td><td> : </font>'. $bloodgroup .  ' </td></tr>';
}
$Reception = $Page->id->CurrentValue;
$patient_id = $Page->patient_id->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where PId='".$patient_id."' and Reception='".$Reception."'; ";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
	$PatOTid =  $row["id"];
	$diagnosis =  $row["diagnosis"];
	$proposedSurgery =  $row["proposedSurgery"];
	$surgeryProcedure =  $row["surgeryProcedure"];
	$typeOfAnaesthesia =  $row["typeOfAnaesthesia"];
	$surgeryStarted =  $row["surgeryStarted"];
	$Surgeon =  $row["Surgeon"];
	$Anaesthetist =  $row["Anaesthetist"];
	$AsstSurgeon1 =  $row["AsstSurgeon1"];
	$AsstSurgeon2 =  $row["AsstSurgeon2"];
	$paediatric =  $row["paediatric"];
	$rs->MoveNext();
}
if($PatOTid == '')
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where PId='".$patient_id."' and Reception='".$Reception."'; ";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
	$PatOTid =  $row["id"];
	$diagnosis =  $row["diagnosis"];
	$proposedSurgery =  $row["proposedSurgery"];
	$surgeryProcedure =  $row["surgeryProcedure"];
	$typeOfAnaesthesia =  $row["typeOfAnaesthesia"];
	$surgeryStarted =  $row["surgeryStarted"];
	$Surgeon =  $row["Surgeon"];
	$Anaesthetist =  $row["Anaesthetist"];
	$AsstSurgeon1 =  $row["AsstSurgeon1"];
	$AsstSurgeon2 =  $row["AsstSurgeon2"];
	$paediatric =  $row["paediatric"];
	$rs->MoveNext();
}
}
if($surgeryStarted != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Surgery Date	</td><td> : </font>'. $surgeryStarted .  ' </td></tr>';
}
if($Surgeon != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Surgeon	</td><td> : </font>'. $Surgeon .  ' </td></tr>';
}
if($Anaesthetist != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Anaesthetist	</td><td> : </font>'. $Anaesthetist .  '</td></tr>';
}
if($AsstSurgeon1 != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">AsstSurgeon	</td><td> : </font>'. $AsstSurgeon1 .  '</td></tr>';
}
if($AsstSurgeon2 != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">AsstSurgeon	</td><td> : </font>'. $AsstSurgeon2 .  ' </td></tr>';
}
if($paediatric != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Paediatric	</td><td> : </font>'. $paediatric .  ' </td></tr>';
}
if($diagnosis != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Diagnosis	</td><td> : </font>'. $diagnosis .  ' </td></tr>';
}
if($proposedSurgery != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Proposed Surgery	</td><td> : </font>'. $proposedSurgery .  ' </td></tr>';
}
if($surgeryProcedure != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Surgery Procedure	</td><td> : </font>'. $surgeryProcedure .  ' </td></tr>';
}
if($typeOfAnaesthesia != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Type Of Anaesthesia	</td><td> : </font>'. $typeOfAnaesthesia .  ' </td></tr>';
}
																																																												?>  
<?php echo $Page->History->CurrentValue; ?>
	</tbody>
</table>
<p><?php echo $Page->vitals->CurrentValue; ?></p>
<p>
<?php if($Page->provisional_diagnosis->CurrentValue != '')
 {
   echo '<font size="4" style="font-weight: bold;">Provisional Diagnosis	: </font>'. $Page->provisional_diagnosis->CurrentValue ;
 }
 ?>
</p>
<p>
<?php
if($Page->Treatments->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Treatments	: </font>'. $Page->Treatments->CurrentValue ;
}
?>
</p>
<p>
<?php
if($Page->FinalDiagnosis->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Final Diagnosis	: </font>'. $Page->FinalDiagnosis->CurrentValue ;
}
?>
</p>
<p>
<?php
if($Page->courseinhospital->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Course In Hospital	: </font>'. $Page->courseinhospital->CurrentValue ;
}
?>
<p>
<?php
if($Page->procedurenotes->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Procedure Notes	: </font>'. $Page->procedurenotes->CurrentValue ;
}
?>
</p>
<p>
<?php
if($Page->conditionatdischarge->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Condition at Discharge	: </font>'. $Page->conditionatdischarge->CurrentValue ;
}
?>
</p>
<p>
<?php
$pageDisVitals = "";
if($Page->BP->CurrentValue != '')
{
$pageDisVitals .= '<td><b>BP : ' . $Page->BP->CurrentValue . ' mm of Hg</b></td>' ;
}
if($Page->Pulse->CurrentValue != '')
{
$pageDisVitals .= '<td><b>Pulse : ' . $Page->Pulse->CurrentValue . ' mints.</b></td>' ;
}
if($Page->Resp->CurrentValue != '')
{
$pageDisVitals .= '<td><b>Resp : ' . $Page->Resp->CurrentValue . '</b></td>' ;
}
if($Page->SPO2->CurrentValue != '')
{
$pageDisVitals .= '<td><b>SPO2 :' . $Page->SPO2->CurrentValue . '</b></td>' ;
}
if($pageDisVitals != '')
{
  echo   '<font size="4" style="font-weight: bold;">Discharge Vitals :</font><table class="table table-striped ew-table ew-export-table" width="100%"><tr>'. $pageDisVitals .'</tr></table> ';
}
?>
</p>
<p>
<?php
if($Page->DischargeAdviceMedicine->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Discharge Advice Medicine	: </font>'. $Page->DischargeAdviceMedicine->CurrentValue ;
}
?>
</p>
</tr>
</table> 
 <?php
 $hhha = '<font size="4" style="font-weight: bold;">Discharge Advice Medicine:</font>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>Medicine</b></td>
<td><b>M</b></td>
<td><b>A</b></td>
<td><b>N</b></td>
<td><b>NoOfDays</b></td>
<td><b>Route</b></td>
<td><b>TimeOfTaking</b></td>
</tr>';
			$Reception = $Page->id->CurrentValue;
			$patient_id = $Page->patient_id->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$patient_id."' and Type='Discharge Advice' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Preid =  $row["id"];
				$Medicine =  $row["Medicine"];
				$M =  $row["M"];
				$A =  $row["A"];
				$N =  $row["N"];
				$NoOfDays =  $row["NoOfDays"];
				$PreRoute =  $row["PreRoute"];
				$TimeOfTaking =  $row["TimeOfTaking"];
				$hhh .= '<tr><td>'.$Medicine.'</td><td>'.$M.'</td><td>'.$A.'</td><td>'.$N.'</td><td>'.$NoOfDays.'</td><td>'.$PreRoute.'</td><td>'.$TimeOfTaking.'</td></tr>  ';
				$jjjj = "QQQ";
	$rs->MoveNext();
}
if($jjjj == "QQQ")
{
	echo $hhha . $hhh . '</table>' ;
}
?>		
<p><?php echo '<font size="4" style="font-weight: bold;">Follow up Advice	: </font>'.$Page->FollowupAdvice->CurrentValue; ?></p>
<font size="4">
<?php
					  $originalDate = $Page->NextReviewDate->CurrentValue;
					  $newDate = date("d/m/Y", strtotime($originalDate));
if($originalDate != '')
{
					  echo '<b>Next Review Date : ' . $newDate;
}
$tt = "ewbarcode.php?data=".$Page->mrnNo->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
					  ?>  </b>
</font>
<p align="right">
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p>
<br><br>
<font size="4" style="font-weight: bold;">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'></td>
			<td align="right"> ( <?php echo $DrName; ?> )</td>
		</tr>
		<tr>
			<td style='width:50%;'>Signature of the patient</td>
			<td align="right">Consultant Signature</td>
		</tr>
	</tbody>
</table>
</font>	
</font>
</font>
</div>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_patient_discharge_summaryview", "tpm_view_patient_discharge_summaryview", "view_patient_discharge_summaryview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
