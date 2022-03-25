<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientVitalsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_vitalsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_vitalsview = currentForm = new ew.Form("fpatient_vitalsview", "view");
    loadjs.done("fpatient_vitalsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.patient_vitals) ew.vars.tables.patient_vitals = <?= JsonEncode(GetClientVar("tables", "patient_vitals")) ?>;
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
<form name="fpatient_vitalsview" id="fpatient_vitalsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_id"><template id="tpc_patient_vitals_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_vitals_id"><span id="el_patient_vitals_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_mrnno"><template id="tpc_patient_vitals_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_patient_vitals_mrnno"><span id="el_patient_vitals_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientName"><template id="tpc_patient_vitals_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_vitals_PatientName"><span id="el_patient_vitals_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatID"><template id="tpc_patient_vitals_PatID"><?= $Page->PatID->caption() ?></template></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_vitals_PatID"><span id="el_patient_vitals_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_MobileNumber"><template id="tpc_patient_vitals_MobileNumber"><?= $Page->MobileNumber->caption() ?></template></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_vitals_MobileNumber"><span id="el_patient_vitals_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_profilePic"><template id="tpc_patient_vitals_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_vitals_profilePic"><span id="el_patient_vitals_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
    <tr id="r_HT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HT"><template id="tpc_patient_vitals_HT"><?= $Page->HT->caption() ?></template></span></td>
        <td data-name="HT" <?= $Page->HT->cellAttributes() ?>>
<template id="tpx_patient_vitals_HT"><span id="el_patient_vitals_HT">
<span<?= $Page->HT->viewAttributes() ?>>
<?= $Page->HT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
    <tr id="r_WT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_WT"><template id="tpc_patient_vitals_WT"><?= $Page->WT->caption() ?></template></span></td>
        <td data-name="WT" <?= $Page->WT->cellAttributes() ?>>
<template id="tpx_patient_vitals_WT"><span id="el_patient_vitals_WT">
<span<?= $Page->WT->viewAttributes() ?>>
<?= $Page->WT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
    <tr id="r_SurfaceArea">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_SurfaceArea"><template id="tpc_patient_vitals_SurfaceArea"><?= $Page->SurfaceArea->caption() ?></template></span></td>
        <td data-name="SurfaceArea" <?= $Page->SurfaceArea->cellAttributes() ?>>
<template id="tpx_patient_vitals_SurfaceArea"><span id="el_patient_vitals_SurfaceArea">
<span<?= $Page->SurfaceArea->viewAttributes() ?>>
<?= $Page->SurfaceArea->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
    <tr id="r_BodyMassIndex">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BodyMassIndex"><template id="tpc_patient_vitals_BodyMassIndex"><?= $Page->BodyMassIndex->caption() ?></template></span></td>
        <td data-name="BodyMassIndex" <?= $Page->BodyMassIndex->cellAttributes() ?>>
<template id="tpx_patient_vitals_BodyMassIndex"><span id="el_patient_vitals_BodyMassIndex">
<span<?= $Page->BodyMassIndex->viewAttributes() ?>>
<?= $Page->BodyMassIndex->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClinicalFindings->Visible) { // ClinicalFindings ?>
    <tr id="r_ClinicalFindings">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalFindings"><template id="tpc_patient_vitals_ClinicalFindings"><?= $Page->ClinicalFindings->caption() ?></template></span></td>
        <td data-name="ClinicalFindings" <?= $Page->ClinicalFindings->cellAttributes() ?>>
<template id="tpx_patient_vitals_ClinicalFindings"><span id="el_patient_vitals_ClinicalFindings">
<span<?= $Page->ClinicalFindings->viewAttributes() ?>>
<?= $Page->ClinicalFindings->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
    <tr id="r_ClinicalDiagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalDiagnosis"><template id="tpc_patient_vitals_ClinicalDiagnosis"><?= $Page->ClinicalDiagnosis->caption() ?></template></span></td>
        <td data-name="ClinicalDiagnosis" <?= $Page->ClinicalDiagnosis->cellAttributes() ?>>
<template id="tpx_patient_vitals_ClinicalDiagnosis"><span id="el_patient_vitals_ClinicalDiagnosis">
<span<?= $Page->ClinicalDiagnosis->viewAttributes() ?>>
<?= $Page->ClinicalDiagnosis->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
    <tr id="r_AnticoagulantifAny">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_AnticoagulantifAny"><template id="tpc_patient_vitals_AnticoagulantifAny"><?= $Page->AnticoagulantifAny->caption() ?></template></span></td>
        <td data-name="AnticoagulantifAny" <?= $Page->AnticoagulantifAny->cellAttributes() ?>>
<template id="tpx_patient_vitals_AnticoagulantifAny"><span id="el_patient_vitals_AnticoagulantifAny">
<span<?= $Page->AnticoagulantifAny->viewAttributes() ?>>
<?= $Page->AnticoagulantifAny->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
    <tr id="r_FoodAllergies">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_FoodAllergies"><template id="tpc_patient_vitals_FoodAllergies"><?= $Page->FoodAllergies->caption() ?></template></span></td>
        <td data-name="FoodAllergies" <?= $Page->FoodAllergies->cellAttributes() ?>>
<template id="tpx_patient_vitals_FoodAllergies"><span id="el_patient_vitals_FoodAllergies">
<span<?= $Page->FoodAllergies->viewAttributes() ?>>
<?= $Page->FoodAllergies->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
    <tr id="r_GenericAllergies">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GenericAllergies"><template id="tpc_patient_vitals_GenericAllergies"><?= $Page->GenericAllergies->caption() ?></template></span></td>
        <td data-name="GenericAllergies" <?= $Page->GenericAllergies->cellAttributes() ?>>
<template id="tpx_patient_vitals_GenericAllergies"><span id="el_patient_vitals_GenericAllergies">
<span<?= $Page->GenericAllergies->viewAttributes() ?>>
<?= $Page->GenericAllergies->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
    <tr id="r_GroupAllergies">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GroupAllergies"><template id="tpc_patient_vitals_GroupAllergies"><?= $Page->GroupAllergies->caption() ?></template></span></td>
        <td data-name="GroupAllergies" <?= $Page->GroupAllergies->cellAttributes() ?>>
<template id="tpx_patient_vitals_GroupAllergies"><span id="el_patient_vitals_GroupAllergies">
<span<?= $Page->GroupAllergies->viewAttributes() ?>>
<?= $Page->GroupAllergies->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <tr id="r_Temp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Temp"><template id="tpc_patient_vitals_Temp"><?= $Page->Temp->caption() ?></template></span></td>
        <td data-name="Temp" <?= $Page->Temp->cellAttributes() ?>>
<template id="tpx_patient_vitals_Temp"><span id="el_patient_vitals_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <tr id="r_Pulse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Pulse"><template id="tpc_patient_vitals_Pulse"><?= $Page->Pulse->caption() ?></template></span></td>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<template id="tpx_patient_vitals_Pulse"><span id="el_patient_vitals_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <tr id="r_BP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BP"><template id="tpc_patient_vitals_BP"><?= $Page->BP->caption() ?></template></span></td>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<template id="tpx_patient_vitals_BP"><span id="el_patient_vitals_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <tr id="r_PR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PR"><template id="tpc_patient_vitals_PR"><?= $Page->PR->caption() ?></template></span></td>
        <td data-name="PR" <?= $Page->PR->cellAttributes() ?>>
<template id="tpx_patient_vitals_PR"><span id="el_patient_vitals_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <tr id="r_CNS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CNS"><template id="tpc_patient_vitals_CNS"><?= $Page->CNS->caption() ?></template></span></td>
        <td data-name="CNS" <?= $Page->CNS->cellAttributes() ?>>
<template id="tpx_patient_vitals_CNS"><span id="el_patient_vitals_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
    <tr id="r_RSA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_RSA"><template id="tpc_patient_vitals_RSA"><?= $Page->RSA->caption() ?></template></span></td>
        <td data-name="RSA" <?= $Page->RSA->cellAttributes() ?>>
<template id="tpx_patient_vitals_RSA"><span id="el_patient_vitals_RSA">
<span<?= $Page->RSA->viewAttributes() ?>>
<?= $Page->RSA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <tr id="r_CVS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CVS"><template id="tpc_patient_vitals_CVS"><?= $Page->CVS->caption() ?></template></span></td>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<template id="tpx_patient_vitals_CVS"><span id="el_patient_vitals_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <tr id="r_PA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PA"><template id="tpc_patient_vitals_PA"><?= $Page->PA->caption() ?></template></span></td>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<template id="tpx_patient_vitals_PA"><span id="el_patient_vitals_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
    <tr id="r_PS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PS"><template id="tpc_patient_vitals_PS"><?= $Page->PS->caption() ?></template></span></td>
        <td data-name="PS" <?= $Page->PS->cellAttributes() ?>>
<template id="tpx_patient_vitals_PS"><span id="el_patient_vitals_PS">
<span<?= $Page->PS->viewAttributes() ?>>
<?= $Page->PS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
    <tr id="r_PV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PV"><template id="tpc_patient_vitals_PV"><?= $Page->PV->caption() ?></template></span></td>
        <td data-name="PV" <?= $Page->PV->cellAttributes() ?>>
<template id="tpx_patient_vitals_PV"><span id="el_patient_vitals_PV">
<span<?= $Page->PV->viewAttributes() ?>>
<?= $Page->PV->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
    <tr id="r_clinicaldetails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_clinicaldetails"><template id="tpc_patient_vitals_clinicaldetails"><?= $Page->clinicaldetails->caption() ?></template></span></td>
        <td data-name="clinicaldetails" <?= $Page->clinicaldetails->cellAttributes() ?>>
<template id="tpx_patient_vitals_clinicaldetails"><span id="el_patient_vitals_clinicaldetails">
<span<?= $Page->clinicaldetails->viewAttributes() ?>>
<?= $Page->clinicaldetails->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_status"><template id="tpc_patient_vitals_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_vitals_status"><span id="el_patient_vitals_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createdby"><template id="tpc_patient_vitals_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_patient_vitals_createdby"><span id="el_patient_vitals_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createddatetime"><template id="tpc_patient_vitals_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_patient_vitals_createddatetime"><span id="el_patient_vitals_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifiedby"><template id="tpc_patient_vitals_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_patient_vitals_modifiedby"><span id="el_patient_vitals_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifieddatetime"><template id="tpc_patient_vitals_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_patient_vitals_modifieddatetime"><span id="el_patient_vitals_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Age"><template id="tpc_patient_vitals_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_vitals_Age"><span id="el_patient_vitals_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Gender"><template id="tpc_patient_vitals_Gender"><?= $Page->Gender->caption() ?></template></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_vitals_Gender"><span id="el_patient_vitals_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <tr id="r_PatientSearch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientSearch"><template id="tpc_patient_vitals_PatientSearch"><?= $Page->PatientSearch->caption() ?></template></span></td>
        <td data-name="PatientSearch" <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_vitals_PatientSearch"><span id="el_patient_vitals_PatientSearch">
<span<?= $Page->PatientSearch->viewAttributes() ?>>
<?= $Page->PatientSearch->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientId"><template id="tpc_patient_vitals_PatientId"><?= $Page->PatientId->caption() ?></template></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_patient_vitals_PatientId"><span id="el_patient_vitals_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Reception"><template id="tpc_patient_vitals_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_patient_vitals_Reception"><span id="el_patient_vitals_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HospID"><template id="tpc_patient_vitals_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_patient_vitals_HospID"><span id="el_patient_vitals_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_patient_vitalsview" class="ew-custom-template"></div>
<template id="tpm_patient_vitalsview">
<div id="ct_PatientVitalsView"><style>
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
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
	if($results2[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results2[0]["profilePic"];
	}
	if($results1[0]["profilePic"] == "")
	{
		$PartnerProfilePic = "hims\profile-picture.png";
	}else{
		$PartnerProfilePic = $results1[0]["profilePic"];
	}
	?>
<div hidden>
<p id="PPatientSearch" hidden><slot class="ew-slot" name="tpc_patient_vitals_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatientSearch"></slot></p>
</div>
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_vitals_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpc_patient_vitals_SurfaceArea"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpc_patient_vitals_BodyMassIndex"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_vitals_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_vitals_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_vitals_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_vitals_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_vitals_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_MobileNumber"></slot></p> 
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1">H</span>
			  <div class="info-box-content">
				<span class="info-box-text"><slot class="ew-slot" name="tpc_patient_vitals_HT"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_HT"></slot></span>
				<span class="info-box-number">Centimeter - Cm.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-danger elevation-1">W</span>
			  <div class="info-box-content">
				<span class="info-box-text"><slot class="ew-slot" name="tpc_patient_vitals_WT"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_WT"></slot></span>
				<span class="info-box-number">Kilogram - Kg.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <!-- fix for small devices only -->
		  <div class="clearfix hidden-md-up"></div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1">BSA</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Surface Area</span>
				<span id="BodySurfaceAreaValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-warning elevation-1">BMI</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Mass Index</span>
				<span id="BodyMassIndexValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  <slot class="ew-slot" name="tpc_patient_vitals_ClinicalFindings"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_ClinicalFindings"></slot>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  <slot class="ew-slot" name="tpc_patient_vitals_ClinicalDiagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_ClinicalDiagnosis"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_FoodAllergies"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_FoodAllergies"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_AnticoagulantifAny"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_AnticoagulantifAny"></slot></td></tr>						
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_GenericAllergies"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_GenericAllergies"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_GroupAllergies"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_GroupAllergies"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_vitals_clinicaldetails"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_clinicaldetails"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_Temp"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Temp"></slot> F</td><td><slot class="ew-slot" name="tpc_patient_vitals_BP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_BP"></slot> mm of Hg</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_Pulse"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_Pulse"></slot> beats/min</td><td><slot class="ew-slot" name="tpc_patient_vitals_PR"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PR"></slot> breaths/min</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_CNS"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_CNS"></slot></td><td><slot class="ew-slot" name="tpc_patient_vitals_RSA"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_RSA"></slot></td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_CVS"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_CVS"></slot></td><td><slot class="ew-slot" name="tpc_patient_vitals_PA"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PA"></slot></td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_vitals_PS"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PS"></slot></td><td><slot class="ew-slot" name="tpc_patient_vitals_PV"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_vitals_PV"></slot></td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr>
							<td>
								<a href="<?php echo $vitalsURL; ?>" class="btn btn-sm btn-success float-left">Vitals</a>
							</td>
							<td>
								<a href="<?php echo $historyURL; ?>" class="btn btn-sm btn-warning float-left">History</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $provisionaldiagnosisURL; ?>" class="btn btn-sm btn-danger float-left">Provisional Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $prescriptionURL; ?>" class="btn btn-sm btn-info float-left">Prescription</a>
							</td>
						</tr>						
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
						<tr>
							<td>
								<a href="<?php echo $finaldiagnosisURL; ?>" class="btn btn-sm btn-success float-left">Final Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $followupURL; ?>" class="btn btn-sm btn-warning float-left">Follow Up</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $deliveryregisterURL; ?>" class="btn btn-sm btn-danger float-left">Delivery Register</a>
							</td>
							<td>
								<a href="<?php echo $surgeryregisterURL; ?>" class="btn btn-sm btn-info float-left">Surgery Register</a>
							</td>
						</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_vitalsview", "tpm_patient_vitalsview", "patient_vitalsview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    // Startup script
    document.getElementById("x_HT").style.width="80px",document.getElementById("x_WT").style.width="80px",document.getElementById("x_Temp").style.width="80px",document.getElementById("x_Pulse").style.width="80px",document.getElementById("x_BP").style.width="80px",document.getElementById("x_PR").style.width="80px",document.getElementById("x_CNS").style.width="80px",document.getElementById("x_CVS").style.width="80px",document.getElementById("x_PA").style.width="80px",document.getElementById("x_PS").style.width="80px",document.getElementById("x_PV").style.width="80px",document.getElementById("x_RSA").style.width="80px";var c=document.getElementById("el_patient_vitals_profilePic").children,d=c[0].children;function calculateBmi(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var d=e/(t/100*t/100);(d=Math.round(1e3*d)/1e3)<18.5&&(d+=" Too Thin"),d>18.5&&d<25&&(d+=" Healthy"),d>25&&(d+=" Over Weight"),document.getElementById("BodyMassIndexValue").innerText=d,document.getElementById("x_BodyMassIndex").value=d}}function calculateBSA(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var d=0;d=Math.pow(e,.425)*Math.pow(t,.725)*.007184,d=Math.round(1e3*d)/1e3,document.getElementById("BodySurfaceAreaValue").innerText=d,document.getElementById("x_SurfaceArea").value=d}}$("#x_WT").change((function(){calculateBmi(),calculateBSA()})),$("#x_HT").change((function(){calculateBmi(),calculateBSA()}));var evalue=d[0].value;document.getElementById("profilePicturePatient").src="uploads/"+evalue;
});
</script>
<?php } ?>
