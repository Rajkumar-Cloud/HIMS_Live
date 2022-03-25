<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOtDeliveryRegisterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_ot_delivery_registerview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_ot_delivery_registerview = currentForm = new ew.Form("fpatient_ot_delivery_registerview", "view");
    loadjs.done("fpatient_ot_delivery_registerview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.patient_ot_delivery_register) ew.vars.tables.patient_ot_delivery_register = <?= JsonEncode(GetClientVar("tables", "patient_ot_delivery_register")) ?>;
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
<form name="fpatient_ot_delivery_registerview" id="fpatient_ot_delivery_registerview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_id"><template id="tpc_patient_ot_delivery_register_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_id"><span id="el_patient_ot_delivery_register_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatID"><template id="tpc_patient_ot_delivery_register_PatID"><?= $Page->PatID->caption() ?></template></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatID"><span id="el_patient_ot_delivery_register_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatientName"><template id="tpc_patient_ot_delivery_register_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatientName"><span id="el_patient_ot_delivery_register_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_mrnno"><template id="tpc_patient_ot_delivery_register_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_mrnno"><span id="el_patient_ot_delivery_register_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_MobileNumber"><template id="tpc_patient_ot_delivery_register_MobileNumber"><?= $Page->MobileNumber->caption() ?></template></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_MobileNumber"><span id="el_patient_ot_delivery_register_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Age"><template id="tpc_patient_ot_delivery_register_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Age"><span id="el_patient_ot_delivery_register_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Gender"><template id="tpc_patient_ot_delivery_register_Gender"><?= $Page->Gender->caption() ?></template></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Gender"><span id="el_patient_ot_delivery_register_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_profilePic"><template id="tpc_patient_ot_delivery_register_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_profilePic"><span id="el_patient_ot_delivery_register_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
    <tr id="r_ObstetricsHistryFeMale">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale"><template id="tpc_patient_ot_delivery_register_ObstetricsHistryFeMale"><?= $Page->ObstetricsHistryFeMale->caption() ?></template></span></td>
        <td data-name="ObstetricsHistryFeMale" <?= $Page->ObstetricsHistryFeMale->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ObstetricsHistryFeMale"><span id="el_patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?= $Page->ObstetricsHistryFeMale->viewAttributes() ?>>
<?= $Page->ObstetricsHistryFeMale->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
    <tr id="r_Abortion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Abortion"><template id="tpc_patient_ot_delivery_register_Abortion"><?= $Page->Abortion->caption() ?></template></span></td>
        <td data-name="Abortion" <?= $Page->Abortion->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Abortion"><span id="el_patient_ot_delivery_register_Abortion">
<span<?= $Page->Abortion->viewAttributes() ?>>
<?= $Page->Abortion->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
    <tr id="r_ChildBirthDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate"><template id="tpc_patient_ot_delivery_register_ChildBirthDate"><?= $Page->ChildBirthDate->caption() ?></template></span></td>
        <td data-name="ChildBirthDate" <?= $Page->ChildBirthDate->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthDate"><span id="el_patient_ot_delivery_register_ChildBirthDate">
<span<?= $Page->ChildBirthDate->viewAttributes() ?>>
<?= $Page->ChildBirthDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
    <tr id="r_ChildBirthTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime"><template id="tpc_patient_ot_delivery_register_ChildBirthTime"><?= $Page->ChildBirthTime->caption() ?></template></span></td>
        <td data-name="ChildBirthTime" <?= $Page->ChildBirthTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthTime"><span id="el_patient_ot_delivery_register_ChildBirthTime">
<span<?= $Page->ChildBirthTime->viewAttributes() ?>>
<?= $Page->ChildBirthTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
    <tr id="r_ChildSex">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildSex"><template id="tpc_patient_ot_delivery_register_ChildSex"><?= $Page->ChildSex->caption() ?></template></span></td>
        <td data-name="ChildSex" <?= $Page->ChildSex->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildSex"><span id="el_patient_ot_delivery_register_ChildSex">
<span<?= $Page->ChildSex->viewAttributes() ?>>
<?= $Page->ChildSex->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
    <tr id="r_ChildWt">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildWt"><template id="tpc_patient_ot_delivery_register_ChildWt"><?= $Page->ChildWt->caption() ?></template></span></td>
        <td data-name="ChildWt" <?= $Page->ChildWt->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildWt"><span id="el_patient_ot_delivery_register_ChildWt">
<span<?= $Page->ChildWt->viewAttributes() ?>>
<?= $Page->ChildWt->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
    <tr id="r_ChildDay">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildDay"><template id="tpc_patient_ot_delivery_register_ChildDay"><?= $Page->ChildDay->caption() ?></template></span></td>
        <td data-name="ChildDay" <?= $Page->ChildDay->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildDay"><span id="el_patient_ot_delivery_register_ChildDay">
<span<?= $Page->ChildDay->viewAttributes() ?>>
<?= $Page->ChildDay->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
    <tr id="r_ChildOE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildOE"><template id="tpc_patient_ot_delivery_register_ChildOE"><?= $Page->ChildOE->caption() ?></template></span></td>
        <td data-name="ChildOE" <?= $Page->ChildOE->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildOE"><span id="el_patient_ot_delivery_register_ChildOE">
<span<?= $Page->ChildOE->viewAttributes() ?>>
<?= $Page->ChildOE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeofDelivery->Visible) { // TypeofDelivery ?>
    <tr id="r_TypeofDelivery">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_TypeofDelivery"><template id="tpc_patient_ot_delivery_register_TypeofDelivery"><?= $Page->TypeofDelivery->caption() ?></template></span></td>
        <td data-name="TypeofDelivery" <?= $Page->TypeofDelivery->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_TypeofDelivery"><span id="el_patient_ot_delivery_register_TypeofDelivery">
<span<?= $Page->TypeofDelivery->viewAttributes() ?>>
<?= $Page->TypeofDelivery->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
    <tr id="r_ChildBlGrp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp"><template id="tpc_patient_ot_delivery_register_ChildBlGrp"><?= $Page->ChildBlGrp->caption() ?></template></span></td>
        <td data-name="ChildBlGrp" <?= $Page->ChildBlGrp->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBlGrp"><span id="el_patient_ot_delivery_register_ChildBlGrp">
<span<?= $Page->ChildBlGrp->viewAttributes() ?>>
<?= $Page->ChildBlGrp->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
    <tr id="r_ApgarScore">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ApgarScore"><template id="tpc_patient_ot_delivery_register_ApgarScore"><?= $Page->ApgarScore->caption() ?></template></span></td>
        <td data-name="ApgarScore" <?= $Page->ApgarScore->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ApgarScore"><span id="el_patient_ot_delivery_register_ApgarScore">
<span<?= $Page->ApgarScore->viewAttributes() ?>>
<?= $Page->ApgarScore->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
    <tr id="r_birthnotification">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_birthnotification"><template id="tpc_patient_ot_delivery_register_birthnotification"><?= $Page->birthnotification->caption() ?></template></span></td>
        <td data-name="birthnotification" <?= $Page->birthnotification->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_birthnotification"><span id="el_patient_ot_delivery_register_birthnotification">
<span<?= $Page->birthnotification->viewAttributes() ?>>
<?= $Page->birthnotification->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
    <tr id="r_formno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_formno"><template id="tpc_patient_ot_delivery_register_formno"><?= $Page->formno->caption() ?></template></span></td>
        <td data-name="formno" <?= $Page->formno->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_formno"><span id="el_patient_ot_delivery_register_formno">
<span<?= $Page->formno->viewAttributes() ?>>
<?= $Page->formno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
    <tr id="r_dte">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_dte"><template id="tpc_patient_ot_delivery_register_dte"><?= $Page->dte->caption() ?></template></span></td>
        <td data-name="dte" <?= $Page->dte->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_dte"><span id="el_patient_ot_delivery_register_dte">
<span<?= $Page->dte->viewAttributes() ?>>
<?= $Page->dte->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
    <tr id="r_motherReligion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_motherReligion"><template id="tpc_patient_ot_delivery_register_motherReligion"><?= $Page->motherReligion->caption() ?></template></span></td>
        <td data-name="motherReligion" <?= $Page->motherReligion->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_motherReligion"><span id="el_patient_ot_delivery_register_motherReligion">
<span<?= $Page->motherReligion->viewAttributes() ?>>
<?= $Page->motherReligion->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
    <tr id="r_bloodgroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_bloodgroup"><template id="tpc_patient_ot_delivery_register_bloodgroup"><?= $Page->bloodgroup->caption() ?></template></span></td>
        <td data-name="bloodgroup" <?= $Page->bloodgroup->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_bloodgroup"><span id="el_patient_ot_delivery_register_bloodgroup">
<span<?= $Page->bloodgroup->viewAttributes() ?>>
<?= $Page->bloodgroup->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_status"><template id="tpc_patient_ot_delivery_register_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_status"><span id="el_patient_ot_delivery_register_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_createdby"><template id="tpc_patient_ot_delivery_register_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_createdby"><span id="el_patient_ot_delivery_register_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_createddatetime"><template id="tpc_patient_ot_delivery_register_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_createddatetime"><span id="el_patient_ot_delivery_register_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_modifiedby"><template id="tpc_patient_ot_delivery_register_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_modifiedby"><span id="el_patient_ot_delivery_register_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_modifieddatetime"><template id="tpc_patient_ot_delivery_register_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_modifieddatetime"><span id="el_patient_ot_delivery_register_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatientID"><template id="tpc_patient_ot_delivery_register_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatientID"><span id="el_patient_ot_delivery_register_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_HospID"><template id="tpc_patient_ot_delivery_register_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_HospID"><span id="el_patient_ot_delivery_register_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
    <tr id="r_ChildBirthDate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate1"><template id="tpc_patient_ot_delivery_register_ChildBirthDate1"><?= $Page->ChildBirthDate1->caption() ?></template></span></td>
        <td data-name="ChildBirthDate1" <?= $Page->ChildBirthDate1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthDate1"><span id="el_patient_ot_delivery_register_ChildBirthDate1">
<span<?= $Page->ChildBirthDate1->viewAttributes() ?>>
<?= $Page->ChildBirthDate1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
    <tr id="r_ChildBirthTime1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime1"><template id="tpc_patient_ot_delivery_register_ChildBirthTime1"><?= $Page->ChildBirthTime1->caption() ?></template></span></td>
        <td data-name="ChildBirthTime1" <?= $Page->ChildBirthTime1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthTime1"><span id="el_patient_ot_delivery_register_ChildBirthTime1">
<span<?= $Page->ChildBirthTime1->viewAttributes() ?>>
<?= $Page->ChildBirthTime1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
    <tr id="r_ChildSex1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildSex1"><template id="tpc_patient_ot_delivery_register_ChildSex1"><?= $Page->ChildSex1->caption() ?></template></span></td>
        <td data-name="ChildSex1" <?= $Page->ChildSex1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildSex1"><span id="el_patient_ot_delivery_register_ChildSex1">
<span<?= $Page->ChildSex1->viewAttributes() ?>>
<?= $Page->ChildSex1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
    <tr id="r_ChildWt1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildWt1"><template id="tpc_patient_ot_delivery_register_ChildWt1"><?= $Page->ChildWt1->caption() ?></template></span></td>
        <td data-name="ChildWt1" <?= $Page->ChildWt1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildWt1"><span id="el_patient_ot_delivery_register_ChildWt1">
<span<?= $Page->ChildWt1->viewAttributes() ?>>
<?= $Page->ChildWt1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
    <tr id="r_ChildDay1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildDay1"><template id="tpc_patient_ot_delivery_register_ChildDay1"><?= $Page->ChildDay1->caption() ?></template></span></td>
        <td data-name="ChildDay1" <?= $Page->ChildDay1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildDay1"><span id="el_patient_ot_delivery_register_ChildDay1">
<span<?= $Page->ChildDay1->viewAttributes() ?>>
<?= $Page->ChildDay1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
    <tr id="r_ChildOE1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildOE1"><template id="tpc_patient_ot_delivery_register_ChildOE1"><?= $Page->ChildOE1->caption() ?></template></span></td>
        <td data-name="ChildOE1" <?= $Page->ChildOE1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildOE1"><span id="el_patient_ot_delivery_register_ChildOE1">
<span<?= $Page->ChildOE1->viewAttributes() ?>>
<?= $Page->ChildOE1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeofDelivery1->Visible) { // TypeofDelivery1 ?>
    <tr id="r_TypeofDelivery1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_TypeofDelivery1"><template id="tpc_patient_ot_delivery_register_TypeofDelivery1"><?= $Page->TypeofDelivery1->caption() ?></template></span></td>
        <td data-name="TypeofDelivery1" <?= $Page->TypeofDelivery1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_TypeofDelivery1"><span id="el_patient_ot_delivery_register_TypeofDelivery1">
<span<?= $Page->TypeofDelivery1->viewAttributes() ?>>
<?= $Page->TypeofDelivery1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
    <tr id="r_ChildBlGrp1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp1"><template id="tpc_patient_ot_delivery_register_ChildBlGrp1"><?= $Page->ChildBlGrp1->caption() ?></template></span></td>
        <td data-name="ChildBlGrp1" <?= $Page->ChildBlGrp1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBlGrp1"><span id="el_patient_ot_delivery_register_ChildBlGrp1">
<span<?= $Page->ChildBlGrp1->viewAttributes() ?>>
<?= $Page->ChildBlGrp1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
    <tr id="r_ApgarScore1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ApgarScore1"><template id="tpc_patient_ot_delivery_register_ApgarScore1"><?= $Page->ApgarScore1->caption() ?></template></span></td>
        <td data-name="ApgarScore1" <?= $Page->ApgarScore1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ApgarScore1"><span id="el_patient_ot_delivery_register_ApgarScore1">
<span<?= $Page->ApgarScore1->viewAttributes() ?>>
<?= $Page->ApgarScore1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
    <tr id="r_birthnotification1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_birthnotification1"><template id="tpc_patient_ot_delivery_register_birthnotification1"><?= $Page->birthnotification1->caption() ?></template></span></td>
        <td data-name="birthnotification1" <?= $Page->birthnotification1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_birthnotification1"><span id="el_patient_ot_delivery_register_birthnotification1">
<span<?= $Page->birthnotification1->viewAttributes() ?>>
<?= $Page->birthnotification1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
    <tr id="r_formno1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_formno1"><template id="tpc_patient_ot_delivery_register_formno1"><?= $Page->formno1->caption() ?></template></span></td>
        <td data-name="formno1" <?= $Page->formno1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_formno1"><span id="el_patient_ot_delivery_register_formno1">
<span<?= $Page->formno1->viewAttributes() ?>>
<?= $Page->formno1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->proposedSurgery->Visible) { // proposedSurgery ?>
    <tr id="r_proposedSurgery">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_proposedSurgery"><template id="tpc_patient_ot_delivery_register_proposedSurgery"><?= $Page->proposedSurgery->caption() ?></template></span></td>
        <td data-name="proposedSurgery" <?= $Page->proposedSurgery->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_proposedSurgery"><span id="el_patient_ot_delivery_register_proposedSurgery">
<span<?= $Page->proposedSurgery->viewAttributes() ?>>
<?= $Page->proposedSurgery->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->surgeryProcedure->Visible) { // surgeryProcedure ?>
    <tr id="r_surgeryProcedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_surgeryProcedure"><template id="tpc_patient_ot_delivery_register_surgeryProcedure"><?= $Page->surgeryProcedure->caption() ?></template></span></td>
        <td data-name="surgeryProcedure" <?= $Page->surgeryProcedure->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_surgeryProcedure"><span id="el_patient_ot_delivery_register_surgeryProcedure">
<span<?= $Page->surgeryProcedure->viewAttributes() ?>>
<?= $Page->surgeryProcedure->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
    <tr id="r_typeOfAnaesthesia">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_typeOfAnaesthesia"><template id="tpc_patient_ot_delivery_register_typeOfAnaesthesia"><?= $Page->typeOfAnaesthesia->caption() ?></template></span></td>
        <td data-name="typeOfAnaesthesia" <?= $Page->typeOfAnaesthesia->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_typeOfAnaesthesia"><span id="el_patient_ot_delivery_register_typeOfAnaesthesia">
<span<?= $Page->typeOfAnaesthesia->viewAttributes() ?>>
<?= $Page->typeOfAnaesthesia->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
    <tr id="r_RecievedTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_RecievedTime"><template id="tpc_patient_ot_delivery_register_RecievedTime"><?= $Page->RecievedTime->caption() ?></template></span></td>
        <td data-name="RecievedTime" <?= $Page->RecievedTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_RecievedTime"><span id="el_patient_ot_delivery_register_RecievedTime">
<span<?= $Page->RecievedTime->viewAttributes() ?>>
<?= $Page->RecievedTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
    <tr id="r_AnaesthesiaStarted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaStarted"><template id="tpc_patient_ot_delivery_register_AnaesthesiaStarted"><?= $Page->AnaesthesiaStarted->caption() ?></template></span></td>
        <td data-name="AnaesthesiaStarted" <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AnaesthesiaStarted"><span id="el_patient_ot_delivery_register_AnaesthesiaStarted">
<span<?= $Page->AnaesthesiaStarted->viewAttributes() ?>>
<?= $Page->AnaesthesiaStarted->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
    <tr id="r_AnaesthesiaEnded">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaEnded"><template id="tpc_patient_ot_delivery_register_AnaesthesiaEnded"><?= $Page->AnaesthesiaEnded->caption() ?></template></span></td>
        <td data-name="AnaesthesiaEnded" <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AnaesthesiaEnded"><span id="el_patient_ot_delivery_register_AnaesthesiaEnded">
<span<?= $Page->AnaesthesiaEnded->viewAttributes() ?>>
<?= $Page->AnaesthesiaEnded->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
    <tr id="r_surgeryStarted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_surgeryStarted"><template id="tpc_patient_ot_delivery_register_surgeryStarted"><?= $Page->surgeryStarted->caption() ?></template></span></td>
        <td data-name="surgeryStarted" <?= $Page->surgeryStarted->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_surgeryStarted"><span id="el_patient_ot_delivery_register_surgeryStarted">
<span<?= $Page->surgeryStarted->viewAttributes() ?>>
<?= $Page->surgeryStarted->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
    <tr id="r_surgeryEnded">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_surgeryEnded"><template id="tpc_patient_ot_delivery_register_surgeryEnded"><?= $Page->surgeryEnded->caption() ?></template></span></td>
        <td data-name="surgeryEnded" <?= $Page->surgeryEnded->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_surgeryEnded"><span id="el_patient_ot_delivery_register_surgeryEnded">
<span<?= $Page->surgeryEnded->viewAttributes() ?>>
<?= $Page->surgeryEnded->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
    <tr id="r_RecoveryTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_RecoveryTime"><template id="tpc_patient_ot_delivery_register_RecoveryTime"><?= $Page->RecoveryTime->caption() ?></template></span></td>
        <td data-name="RecoveryTime" <?= $Page->RecoveryTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_RecoveryTime"><span id="el_patient_ot_delivery_register_RecoveryTime">
<span<?= $Page->RecoveryTime->viewAttributes() ?>>
<?= $Page->RecoveryTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
    <tr id="r_ShiftedTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ShiftedTime"><template id="tpc_patient_ot_delivery_register_ShiftedTime"><?= $Page->ShiftedTime->caption() ?></template></span></td>
        <td data-name="ShiftedTime" <?= $Page->ShiftedTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ShiftedTime"><span id="el_patient_ot_delivery_register_ShiftedTime">
<span<?= $Page->ShiftedTime->viewAttributes() ?>>
<?= $Page->ShiftedTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <tr id="r_Duration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Duration"><template id="tpc_patient_ot_delivery_register_Duration"><?= $Page->Duration->caption() ?></template></span></td>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Duration"><span id="el_patient_ot_delivery_register_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrVisit1->Visible) { // DrVisit1 ?>
    <tr id="r_DrVisit1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit1"><template id="tpc_patient_ot_delivery_register_DrVisit1"><?= $Page->DrVisit1->caption() ?></template></span></td>
        <td data-name="DrVisit1" <?= $Page->DrVisit1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit1"><span id="el_patient_ot_delivery_register_DrVisit1">
<span<?= $Page->DrVisit1->viewAttributes() ?>>
<?= $Page->DrVisit1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrVisit2->Visible) { // DrVisit2 ?>
    <tr id="r_DrVisit2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit2"><template id="tpc_patient_ot_delivery_register_DrVisit2"><?= $Page->DrVisit2->caption() ?></template></span></td>
        <td data-name="DrVisit2" <?= $Page->DrVisit2->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit2"><span id="el_patient_ot_delivery_register_DrVisit2">
<span<?= $Page->DrVisit2->viewAttributes() ?>>
<?= $Page->DrVisit2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrVisit3->Visible) { // DrVisit3 ?>
    <tr id="r_DrVisit3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit3"><template id="tpc_patient_ot_delivery_register_DrVisit3"><?= $Page->DrVisit3->caption() ?></template></span></td>
        <td data-name="DrVisit3" <?= $Page->DrVisit3->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit3"><span id="el_patient_ot_delivery_register_DrVisit3">
<span<?= $Page->DrVisit3->viewAttributes() ?>>
<?= $Page->DrVisit3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrVisit4->Visible) { // DrVisit4 ?>
    <tr id="r_DrVisit4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_DrVisit4"><template id="tpc_patient_ot_delivery_register_DrVisit4"><?= $Page->DrVisit4->caption() ?></template></span></td>
        <td data-name="DrVisit4" <?= $Page->DrVisit4->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit4"><span id="el_patient_ot_delivery_register_DrVisit4">
<span<?= $Page->DrVisit4->viewAttributes() ?>>
<?= $Page->DrVisit4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <tr id="r_Surgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Surgeon"><template id="tpc_patient_ot_delivery_register_Surgeon"><?= $Page->Surgeon->caption() ?></template></span></td>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Surgeon"><span id="el_patient_ot_delivery_register_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <tr id="r_Anaesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Anaesthetist"><template id="tpc_patient_ot_delivery_register_Anaesthetist"><?= $Page->Anaesthetist->caption() ?></template></span></td>
        <td data-name="Anaesthetist" <?= $Page->Anaesthetist->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Anaesthetist"><span id="el_patient_ot_delivery_register_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
    <tr id="r_AsstSurgeon1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon1"><template id="tpc_patient_ot_delivery_register_AsstSurgeon1"><?= $Page->AsstSurgeon1->caption() ?></template></span></td>
        <td data-name="AsstSurgeon1" <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AsstSurgeon1"><span id="el_patient_ot_delivery_register_AsstSurgeon1">
<span<?= $Page->AsstSurgeon1->viewAttributes() ?>>
<?= $Page->AsstSurgeon1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
    <tr id="r_AsstSurgeon2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon2"><template id="tpc_patient_ot_delivery_register_AsstSurgeon2"><?= $Page->AsstSurgeon2->caption() ?></template></span></td>
        <td data-name="AsstSurgeon2" <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AsstSurgeon2"><span id="el_patient_ot_delivery_register_AsstSurgeon2">
<span<?= $Page->AsstSurgeon2->viewAttributes() ?>>
<?= $Page->AsstSurgeon2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
    <tr id="r_paediatric">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_paediatric"><template id="tpc_patient_ot_delivery_register_paediatric"><?= $Page->paediatric->caption() ?></template></span></td>
        <td data-name="paediatric" <?= $Page->paediatric->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_paediatric"><span id="el_patient_ot_delivery_register_paediatric">
<span<?= $Page->paediatric->viewAttributes() ?>>
<?= $Page->paediatric->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
    <tr id="r_ScrubNurse1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse1"><template id="tpc_patient_ot_delivery_register_ScrubNurse1"><?= $Page->ScrubNurse1->caption() ?></template></span></td>
        <td data-name="ScrubNurse1" <?= $Page->ScrubNurse1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ScrubNurse1"><span id="el_patient_ot_delivery_register_ScrubNurse1">
<span<?= $Page->ScrubNurse1->viewAttributes() ?>>
<?= $Page->ScrubNurse1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
    <tr id="r_ScrubNurse2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse2"><template id="tpc_patient_ot_delivery_register_ScrubNurse2"><?= $Page->ScrubNurse2->caption() ?></template></span></td>
        <td data-name="ScrubNurse2" <?= $Page->ScrubNurse2->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ScrubNurse2"><span id="el_patient_ot_delivery_register_ScrubNurse2">
<span<?= $Page->ScrubNurse2->viewAttributes() ?>>
<?= $Page->ScrubNurse2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
    <tr id="r_FloorNurse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_FloorNurse"><template id="tpc_patient_ot_delivery_register_FloorNurse"><?= $Page->FloorNurse->caption() ?></template></span></td>
        <td data-name="FloorNurse" <?= $Page->FloorNurse->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_FloorNurse"><span id="el_patient_ot_delivery_register_FloorNurse">
<span<?= $Page->FloorNurse->viewAttributes() ?>>
<?= $Page->FloorNurse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
    <tr id="r_Technician">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Technician"><template id="tpc_patient_ot_delivery_register_Technician"><?= $Page->Technician->caption() ?></template></span></td>
        <td data-name="Technician" <?= $Page->Technician->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Technician"><span id="el_patient_ot_delivery_register_Technician">
<span<?= $Page->Technician->viewAttributes() ?>>
<?= $Page->Technician->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
    <tr id="r_HouseKeeping">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_HouseKeeping"><template id="tpc_patient_ot_delivery_register_HouseKeeping"><?= $Page->HouseKeeping->caption() ?></template></span></td>
        <td data-name="HouseKeeping" <?= $Page->HouseKeeping->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_HouseKeeping"><span id="el_patient_ot_delivery_register_HouseKeeping">
<span<?= $Page->HouseKeeping->viewAttributes() ?>>
<?= $Page->HouseKeeping->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
    <tr id="r_countsCheckedMops">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_countsCheckedMops"><template id="tpc_patient_ot_delivery_register_countsCheckedMops"><?= $Page->countsCheckedMops->caption() ?></template></span></td>
        <td data-name="countsCheckedMops" <?= $Page->countsCheckedMops->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_countsCheckedMops"><span id="el_patient_ot_delivery_register_countsCheckedMops">
<span<?= $Page->countsCheckedMops->viewAttributes() ?>>
<?= $Page->countsCheckedMops->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
    <tr id="r_gauze">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_gauze"><template id="tpc_patient_ot_delivery_register_gauze"><?= $Page->gauze->caption() ?></template></span></td>
        <td data-name="gauze" <?= $Page->gauze->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_gauze"><span id="el_patient_ot_delivery_register_gauze">
<span<?= $Page->gauze->viewAttributes() ?>>
<?= $Page->gauze->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
    <tr id="r_needles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_needles"><template id="tpc_patient_ot_delivery_register_needles"><?= $Page->needles->caption() ?></template></span></td>
        <td data-name="needles" <?= $Page->needles->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_needles"><span id="el_patient_ot_delivery_register_needles">
<span<?= $Page->needles->viewAttributes() ?>>
<?= $Page->needles->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
    <tr id="r_bloodloss">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_bloodloss"><template id="tpc_patient_ot_delivery_register_bloodloss"><?= $Page->bloodloss->caption() ?></template></span></td>
        <td data-name="bloodloss" <?= $Page->bloodloss->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_bloodloss"><span id="el_patient_ot_delivery_register_bloodloss">
<span<?= $Page->bloodloss->viewAttributes() ?>>
<?= $Page->bloodloss->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
    <tr id="r_bloodtransfusion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_bloodtransfusion"><template id="tpc_patient_ot_delivery_register_bloodtransfusion"><?= $Page->bloodtransfusion->caption() ?></template></span></td>
        <td data-name="bloodtransfusion" <?= $Page->bloodtransfusion->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_bloodtransfusion"><span id="el_patient_ot_delivery_register_bloodtransfusion">
<span<?= $Page->bloodtransfusion->viewAttributes() ?>>
<?= $Page->bloodtransfusion->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->implantsUsed->Visible) { // implantsUsed ?>
    <tr id="r_implantsUsed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_implantsUsed"><template id="tpc_patient_ot_delivery_register_implantsUsed"><?= $Page->implantsUsed->caption() ?></template></span></td>
        <td data-name="implantsUsed" <?= $Page->implantsUsed->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_implantsUsed"><span id="el_patient_ot_delivery_register_implantsUsed">
<span<?= $Page->implantsUsed->viewAttributes() ?>>
<?= $Page->implantsUsed->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
    <tr id="r_MaterialsForHPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_MaterialsForHPE"><template id="tpc_patient_ot_delivery_register_MaterialsForHPE"><?= $Page->MaterialsForHPE->caption() ?></template></span></td>
        <td data-name="MaterialsForHPE" <?= $Page->MaterialsForHPE->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_MaterialsForHPE"><span id="el_patient_ot_delivery_register_MaterialsForHPE">
<span<?= $Page->MaterialsForHPE->viewAttributes() ?>>
<?= $Page->MaterialsForHPE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_Reception"><template id="tpc_patient_ot_delivery_register_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Reception"><span id="el_patient_ot_delivery_register_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <tr id="r_PId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PId"><template id="tpc_patient_ot_delivery_register_PId"><?= $Page->PId->caption() ?></template></span></td>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PId"><span id="el_patient_ot_delivery_register_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <tr id="r_PatientSearch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_delivery_register_PatientSearch"><template id="tpc_patient_ot_delivery_register_PatientSearch"><?= $Page->PatientSearch->caption() ?></template></span></td>
        <td data-name="PatientSearch" <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatientSearch"><span id="el_patient_ot_delivery_register_PatientSearch">
<span<?= $Page->PatientSearch->viewAttributes() ?>>
<?= $Page->PatientSearch->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_patient_ot_delivery_registerview" class="ew-custom-template"></div>
<template id="tpm_patient_ot_delivery_registerview">
<div id="ct_PatientOtDeliveryRegisterView"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
				if($Tid == null)
		{
$Tid = $resuVi[0]["PId"];
		}
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
<slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatientSearch"></slot>	
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_ot_delivery_register_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_ot_delivery_register_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatientID"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_MobileNumber"></slot></p> 
   <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PId"></slot></p>
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
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ObstetricsHistryFeMale"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ObstetricsHistryFeMale"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Abortion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Abortion"></slot></td></tr>					
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_dte"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_dte"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_motherReligion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_motherReligion"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
  <div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthDate"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildSex"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildSex"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildWt"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildWt"></slot></td></tr>
											<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildDay"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildDay"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildOE"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildOE"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_TypeofDelivery"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_TypeofDelivery"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBlGrp"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBlGrp"></slot></td></tr>
												<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ApgarScore"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ApgarScore"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_birthnotification"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_birthnotification"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_formno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_formno"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthDate1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthDate1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthTime1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthTime1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildSex1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildSex1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildWt1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildWt1"></slot></td></tr>
											<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildDay1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildDay1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildOE1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildOE1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_TypeofDelivery1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_TypeofDelivery1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBlGrp1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBlGrp1"></slot></td></tr>
												<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ApgarScore1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ApgarScore1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_birthnotification1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_birthnotification1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_formno1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_formno1"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_bloodgroup"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_bloodgroup"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_proposedSurgery"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_proposedSurgery"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_surgeryProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_surgeryProcedure"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_typeOfAnaesthesia"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_typeOfAnaesthesia"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_RecievedTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_RecievedTime"></slot></td></tr>
							<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AnaesthesiaStarted"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AnaesthesiaStarted"></slot></td></tr>
							<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AnaesthesiaEnded"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AnaesthesiaEnded"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_surgeryStarted"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_surgeryStarted"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_surgeryEnded"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_surgeryEnded"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_RecoveryTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_RecoveryTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ShiftedTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ShiftedTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Duration"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Duration"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit2"></slot></td></tr>					
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit3"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit3"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit4"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit4"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Surgeon"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Anaesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Anaesthetist"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AsstSurgeon1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AsstSurgeon1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AsstSurgeon2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AsstSurgeon2"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_paediatric"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_paediatric"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ScrubNurse1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ScrubNurse1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ScrubNurse2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ScrubNurse2"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_FloorNurse"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_FloorNurse"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Technician"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Technician"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_HouseKeeping"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_HouseKeeping"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_countsCheckedMops"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_countsCheckedMops"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_gauze"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_gauze"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_needles"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_needles"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_bloodloss"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_bloodloss"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_bloodtransfusion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_bloodtransfusion"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_implantsUsed"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_implantsUsed"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_MaterialsForHPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_MaterialsForHPE"></slot></td></tr>
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
    ew.applyTemplate("tpd_patient_ot_delivery_registerview", "tpm_patient_ot_delivery_registerview", "patient_ot_delivery_registerview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
