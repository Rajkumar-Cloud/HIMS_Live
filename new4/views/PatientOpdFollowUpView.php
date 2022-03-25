<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOpdFollowUpView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_opd_follow_upview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_opd_follow_upview = currentForm = new ew.Form("fpatient_opd_follow_upview", "view");
    loadjs.done("fpatient_opd_follow_upview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.patient_opd_follow_up) ew.vars.tables.patient_opd_follow_up = <?= JsonEncode(GetClientVar("tables", "patient_opd_follow_up")) ?>;
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
<form name="fpatient_opd_follow_upview" id="fpatient_opd_follow_upview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_id"><template id="tpc_patient_opd_follow_up_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_id"><span id="el_patient_opd_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Reception"><template id="tpc_patient_opd_follow_up_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Reception" class="patient_opd_follow_upview">
<?= Barcode()->show($Page->Reception->CurrentValue, 'QRCODE', 80) ?>
</template>
<template id="tpx_patient_opd_follow_up_Reception"><span id="el_patient_opd_follow_up_Reception">
<span<?= $Page->Reception->viewAttributes() ?>><slot name="tpx_patient_opd_follow_up_Reception"></slot></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatID"><template id="tpc_patient_opd_follow_up_PatID"><?= $Page->PatID->caption() ?></template></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatID"><span id="el_patient_opd_follow_up_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientId"><template id="tpc_patient_opd_follow_up_PatientId"><?= $Page->PatientId->caption() ?></template></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatientId" class="patient_opd_follow_upview">
<?= Barcode()->show($Page->PatientId->CurrentValue, 'CODE128', 40) ?>
</template>
<template id="tpx_patient_opd_follow_up_PatientId"><span id="el_patient_opd_follow_up_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>><slot name="tpx_patient_opd_follow_up_PatientId"></slot></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientName"><template id="tpc_patient_opd_follow_up_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatientName"><span id="el_patient_opd_follow_up_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_MobileNumber"><template id="tpc_patient_opd_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?></template></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_MobileNumber"><span id="el_patient_opd_follow_up_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
    <tr id="r_Telephone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Telephone"><template id="tpc_patient_opd_follow_up_Telephone"><?= $Page->Telephone->caption() ?></template></span></td>
        <td data-name="Telephone" <?= $Page->Telephone->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Telephone"><span id="el_patient_opd_follow_up_Telephone">
<span<?= $Page->Telephone->viewAttributes() ?>>
<?= $Page->Telephone->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_mrnno"><template id="tpc_patient_opd_follow_up_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_mrnno"><span id="el_patient_opd_follow_up_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Age"><template id="tpc_patient_opd_follow_up_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Age"><span id="el_patient_opd_follow_up_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Gender"><template id="tpc_patient_opd_follow_up_Gender"><?= $Page->Gender->caption() ?></template></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Gender"><span id="el_patient_opd_follow_up_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_profilePic"><template id="tpc_patient_opd_follow_up_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_profilePic"><span id="el_patient_opd_follow_up_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <tr id="r_procedurenotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_procedurenotes"><template id="tpc_patient_opd_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?></template></span></td>
        <td data-name="procedurenotes" <?= $Page->procedurenotes->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_procedurenotes"><span id="el_patient_opd_follow_up_procedurenotes">
<span<?= $Page->procedurenotes->viewAttributes() ?>>
<?= $Page->procedurenotes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <tr id="r_NextReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_NextReviewDate"><template id="tpc_patient_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></template></span></td>
        <td data-name="NextReviewDate" <?= $Page->NextReviewDate->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_NextReviewDate"><span id="el_patient_opd_follow_up_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <tr id="r_ICSIAdvised">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised"><template id="tpc_patient_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?></template></span></td>
        <td data-name="ICSIAdvised" <?= $Page->ICSIAdvised->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ICSIAdvised"><span id="el_patient_opd_follow_up_ICSIAdvised">
<span<?= $Page->ICSIAdvised->viewAttributes() ?>>
<?= $Page->ICSIAdvised->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <tr id="r_DeliveryRegistered">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered"><template id="tpc_patient_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?></template></span></td>
        <td data-name="DeliveryRegistered" <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_DeliveryRegistered"><span id="el_patient_opd_follow_up_DeliveryRegistered">
<span<?= $Page->DeliveryRegistered->viewAttributes() ?>>
<?= $Page->DeliveryRegistered->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <tr id="r_EDD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_EDD"><template id="tpc_patient_opd_follow_up_EDD"><?= $Page->EDD->caption() ?></template></span></td>
        <td data-name="EDD" <?= $Page->EDD->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_EDD"><span id="el_patient_opd_follow_up_EDD">
<span<?= $Page->EDD->viewAttributes() ?>>
<?= $Page->EDD->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <tr id="r_SerologyPositive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_SerologyPositive"><template id="tpc_patient_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?></template></span></td>
        <td data-name="SerologyPositive" <?= $Page->SerologyPositive->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_SerologyPositive"><span id="el_patient_opd_follow_up_SerologyPositive">
<span<?= $Page->SerologyPositive->viewAttributes() ?>>
<?= $Page->SerologyPositive->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <tr id="r_Allergy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Allergy"><template id="tpc_patient_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?></template></span></td>
        <td data-name="Allergy" <?= $Page->Allergy->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Allergy"><span id="el_patient_opd_follow_up_Allergy">
<span<?= $Page->Allergy->viewAttributes() ?>>
<?= $Page->Allergy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_status"><template id="tpc_patient_opd_follow_up_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_status"><span id="el_patient_opd_follow_up_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdby"><template id="tpc_patient_opd_follow_up_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_createdby"><span id="el_patient_opd_follow_up_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createddatetime"><template id="tpc_patient_opd_follow_up_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_createddatetime"><span id="el_patient_opd_follow_up_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifiedby"><template id="tpc_patient_opd_follow_up_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_modifiedby"><span id="el_patient_opd_follow_up_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifieddatetime"><template id="tpc_patient_opd_follow_up_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_modifieddatetime"><span id="el_patient_opd_follow_up_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <tr id="r_LMP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_LMP"><template id="tpc_patient_opd_follow_up_LMP"><?= $Page->LMP->caption() ?></template></span></td>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_LMP"><span id="el_patient_opd_follow_up_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <tr id="r_Procedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Procedure"><template id="tpc_patient_opd_follow_up_Procedure"><?= $Page->Procedure->caption() ?></template></span></td>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Procedure"><span id="el_patient_opd_follow_up_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <tr id="r_ProcedureDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime"><template id="tpc_patient_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?></template></span></td>
        <td data-name="ProcedureDateTime" <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ProcedureDateTime"><span id="el_patient_opd_follow_up_ProcedureDateTime">
<span<?= $Page->ProcedureDateTime->viewAttributes() ?>>
<?= $Page->ProcedureDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <tr id="r_ICSIDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIDate"><template id="tpc_patient_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?></template></span></td>
        <td data-name="ICSIDate" <?= $Page->ICSIDate->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ICSIDate"><span id="el_patient_opd_follow_up_ICSIDate">
<span<?= $Page->ICSIDate->viewAttributes() ?>>
<?= $Page->ICSIDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <tr id="r_PatientSearch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientSearch"><template id="tpc_patient_opd_follow_up_PatientSearch"><?= $Page->PatientSearch->caption() ?></template></span></td>
        <td data-name="PatientSearch" <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatientSearch"><span id="el_patient_opd_follow_up_PatientSearch">
<span<?= $Page->PatientSearch->viewAttributes() ?>>
<?= $Page->PatientSearch->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_HospID"><template id="tpc_patient_opd_follow_up_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_HospID"><span id="el_patient_opd_follow_up_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
    <tr id="r_createdUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdUserName"><template id="tpc_patient_opd_follow_up_createdUserName"><?= $Page->createdUserName->caption() ?></template></span></td>
        <td data-name="createdUserName" <?= $Page->createdUserName->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_createdUserName"><span id="el_patient_opd_follow_up_createdUserName">
<span<?= $Page->createdUserName->viewAttributes() ?>>
<?= $Page->createdUserName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
    <tr id="r_TemplateDrNotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_TemplateDrNotes"><template id="tpc_patient_opd_follow_up_TemplateDrNotes"><?= $Page->TemplateDrNotes->caption() ?></template></span></td>
        <td data-name="TemplateDrNotes" <?= $Page->TemplateDrNotes->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_TemplateDrNotes"><span id="el_patient_opd_follow_up_TemplateDrNotes">
<span<?= $Page->TemplateDrNotes->viewAttributes() ?>>
<?= $Page->TemplateDrNotes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
    <tr id="r_reportheader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_reportheader"><template id="tpc_patient_opd_follow_up_reportheader"><?= $Page->reportheader->caption() ?></template></span></td>
        <td data-name="reportheader" <?= $Page->reportheader->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_reportheader"><span id="el_patient_opd_follow_up_reportheader">
<span<?= $Page->reportheader->viewAttributes() ?>>
<?= $Page->reportheader->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <tr id="r_Purpose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Purpose"><template id="tpc_patient_opd_follow_up_Purpose"><?= $Page->Purpose->caption() ?></template></span></td>
        <td data-name="Purpose" <?= $Page->Purpose->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Purpose"><span id="el_patient_opd_follow_up_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <tr id="r_DrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DrName"><template id="tpc_patient_opd_follow_up_DrName"><?= $Page->DrName->caption() ?></template></span></td>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_DrName"><span id="el_patient_opd_follow_up_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_patient_opd_follow_upview" class="ew-custom-template"></div>
<template id="tpm_patient_opd_follow_upview">
<div id="ct_PatientOpdFollowUpView"><style>
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
 $patient_id = $Page->PatientId->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patient_id."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $PatientID =  $row["PatientID"];
	 $title =  $row["title"];
	 $first_name =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 $blood_group =  $row["blood_group"];
	 $mobile_no =  $row["mobile_no"];
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
 $sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$Page->Reception->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrNameid =  $row["physician_id"];
	 $rs->MoveNext();
 }
 $sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$DrNameid."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 	 $rs->MoveNext();
 }
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$Page->HospID->CurrentValue."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 $DrNameid =  $row["id"];
	 $DrNamelogo =  $row["logo"];
	 $DrNamehospital =  $row["hospital"];
	 $DrNamestreet =  $row["street"];
	 $DrNamearea =  $row["area"];
	 $DrNametown =  $row["town"];
	 $DrNameprovince =  $row["province"];
	 $DrNamepostal_code =  $row["postal_code"];
	 $DrNamephone_no =  $row["phone_no"];
	 $DrNamePreFixCode =  $row["PreFixCode"];
	 $DrNamestatus =  $row["status"];
	 $DrNamecreatedby =  $row["createdby"];
	 $DrNamecreateddatetime =  $row["createddatetime"];
	 $DrNamemodifiedby =  $row["modifiedby"];
	 $DrNamemodifieddatetime =  $row["modifieddatetime"];
	 $DrNameBillingGST =  $row["BillingGST"];
	 $DrNamepharmacyGST =  $row["pharmacyGST"];
	 	 $rs->MoveNext();
 }
  $sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Page->Reception->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Complaints =  $row["Complaints"];
	 $rs->MoveNext();
 }
 $aa = "ewbarcode.php?data=".$Page->PatID->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 ?>
<?php
if($Page->reportheader->CurrentValue == 'Yes')
{
if($Page->HospID->CurrentValue == '1')
{
$HospIDReport = 'phpimages/A4 Hospitals logo Final.png';
}else{
$HospIDReport = 'phpimages/logo.png';
}
$ReptHeader = '<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
				  <address>
					<strong style="color:#33B0FF;font-size:25px;">'.$DrNamehospital.'</strong><br>
					'.$DrNamestreet.', '.$DrNamearea.'<br>
					'.$DrNametown.', '.$DrNameprovince.'.  <br>
						Pincode: '.$DrNamepostal_code.'<br>
					Phone: '.$DrNamephone_no.'<br>
				  </address>
				</div>
				<div class="col-sm-4 invoice-col">
				  <address>
				  </address>
				</div>
				<div class="col-sm-4 invoice-col" align="right">
<img src="'.$HospIDReport.'" alt="" width="380" height="100">
				</div>
</div><hr style="height:2px;border-width:0;color:gray;background-color:#33B0FF">';
echo $ReptHeader;
}
?>
<h2 align="center">OP SUMMARY</h2>
<font size="4" style="font-weight: bold;">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>Patient Name: <?php echo $first_name; ?></td>
			<td align="right"><?php echo date("F j, Y"); ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Gender: <?php echo $gender; ?></td>
			<td align="right">Consultant: <?php echo $Page->createdUserName->CurrentValue; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Age: <?php echo $Age; ?></td>
			<td align="right">Patient ID: <?php echo $PatientID; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Contact No: <?php echo $mobile_no; ?></td>
			<td align="right"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
</font>
<br><br>
<font size="4">
	<p>
<?php
if($Complaints!= null)
{
	echo 'Chief Complaints : ' . $Complaints;
}
?><br>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_procedurenotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_procedurenotes"></slot><br>
<?php
$hhh = 'Medicine:
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
	 $Reception = $Page->Reception->CurrentValue;
	 $patient_id = $Page->PatientId->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $hhjjj = 'false';
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$patient_id."' and Type='OP Advice' ;";
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
	 $hhjjj = 'true';
	 $hhh .= '<tr><td>'.$Medicine.'</td><td>'.$M.'</td><td>'.$A.'</td><td>'.$N.'</td><td>'.$NoOfDays.'</td><td>'.$PreRoute.'</td><td>'.$TimeOfTaking.'</td></tr>  ';
	 $rs->MoveNext();
 }
$hhh .= '</table>';
if($hhjjj!= 'false')
{
 echo $hhh;
}
$tt = "ewbarcode.php?data=".$Page->Reception->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
 ?>
	</p>
	</font>
<font size="4" style="font-weight: bold;">
	<slot class="ew-slot" name="tpc_patient_opd_follow_up_NextReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_NextReviewDate"></slot>
<br>
<p align="right">
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p>
</font>
<br><br>
<div id="textbox">
  <p class="alignleft">Consultant Signature</p>
  <p class="alignright">Signature of the patient&nbsp;&nbsp;&nbsp;&nbsp;</p>
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
<?php
    if (in_array("patient_an_registration", explode(",", $Page->getCurrentDetailTable())) && $patient_an_registration->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_an_registration", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientAnRegistrationGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_opd_follow_upview", "tpm_patient_opd_follow_upview", "patient_opd_follow_upview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
