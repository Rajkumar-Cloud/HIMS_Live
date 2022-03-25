<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientAnRegistrationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_an_registrationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_an_registrationview = currentForm = new ew.Form("fpatient_an_registrationview", "view");
    loadjs.done("fpatient_an_registrationview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.patient_an_registration) ew.vars.tables.patient_an_registration = <?= JsonEncode(GetClientVar("tables", "patient_an_registration")) ?>;
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
<form name="fpatient_an_registrationview" id="fpatient_an_registrationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_id"><template id="tpc_patient_an_registration_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_an_registration_id"><span id="el_patient_an_registration_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pid->Visible) { // pid ?>
    <tr id="r_pid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_pid"><template id="tpc_patient_an_registration_pid"><?= $Page->pid->caption() ?></template></span></td>
        <td data-name="pid" <?= $Page->pid->cellAttributes() ?>>
<template id="tpx_patient_an_registration_pid"><span id="el_patient_an_registration_pid">
<span<?= $Page->pid->viewAttributes() ?>>
<?= $Page->pid->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
    <tr id="r_fid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_fid"><template id="tpc_patient_an_registration_fid"><?= $Page->fid->caption() ?></template></span></td>
        <td data-name="fid" <?= $Page->fid->cellAttributes() ?>>
<template id="tpx_patient_an_registration_fid"><span id="el_patient_an_registration_fid">
<span<?= $Page->fid->viewAttributes() ?>>
<?= $Page->fid->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
    <tr id="r_G">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G"><template id="tpc_patient_an_registration_G"><?= $Page->G->caption() ?></template></span></td>
        <td data-name="G" <?= $Page->G->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G"><span id="el_patient_an_registration_G">
<span<?= $Page->G->viewAttributes() ?>>
<?= $Page->G->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
    <tr id="r_P">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_P"><template id="tpc_patient_an_registration_P"><?= $Page->P->caption() ?></template></span></td>
        <td data-name="P" <?= $Page->P->cellAttributes() ?>>
<template id="tpx_patient_an_registration_P"><span id="el_patient_an_registration_P">
<span<?= $Page->P->viewAttributes() ?>>
<?= $Page->P->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
    <tr id="r_L">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_L"><template id="tpc_patient_an_registration_L"><?= $Page->L->caption() ?></template></span></td>
        <td data-name="L" <?= $Page->L->cellAttributes() ?>>
<template id="tpx_patient_an_registration_L"><span id="el_patient_an_registration_L">
<span<?= $Page->L->viewAttributes() ?>>
<?= $Page->L->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <tr id="r_A">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A"><template id="tpc_patient_an_registration_A"><?= $Page->A->caption() ?></template></span></td>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A"><span id="el_patient_an_registration_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
    <tr id="r_E">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_E"><template id="tpc_patient_an_registration_E"><?= $Page->E->caption() ?></template></span></td>
        <td data-name="E" <?= $Page->E->cellAttributes() ?>>
<template id="tpx_patient_an_registration_E"><span id="el_patient_an_registration_E">
<span<?= $Page->E->viewAttributes() ?>>
<?= $Page->E->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <tr id="r_M">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_M"><template id="tpc_patient_an_registration_M"><?= $Page->M->caption() ?></template></span></td>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<template id="tpx_patient_an_registration_M"><span id="el_patient_an_registration_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <tr id="r_LMP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_LMP"><template id="tpc_patient_an_registration_LMP"><?= $Page->LMP->caption() ?></template></span></td>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_LMP"><span id="el_patient_an_registration_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
    <tr id="r_EDO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EDO"><template id="tpc_patient_an_registration_EDO"><?= $Page->EDO->caption() ?></template></span></td>
        <td data-name="EDO" <?= $Page->EDO->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EDO"><span id="el_patient_an_registration_EDO">
<span<?= $Page->EDO->viewAttributes() ?>>
<?= $Page->EDO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <tr id="r_MenstrualHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MenstrualHistory"><template id="tpc_patient_an_registration_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></template></span></td>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_MenstrualHistory"><span id="el_patient_an_registration_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <tr id="r_MaritalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MaritalHistory"><template id="tpc_patient_an_registration_MaritalHistory"><?= $Page->MaritalHistory->caption() ?></template></span></td>
        <td data-name="MaritalHistory" <?= $Page->MaritalHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_MaritalHistory"><span id="el_patient_an_registration_MaritalHistory">
<span<?= $Page->MaritalHistory->viewAttributes() ?>>
<?= $Page->MaritalHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <tr id="r_ObstetricHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ObstetricHistory"><template id="tpc_patient_an_registration_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?></template></span></td>
        <td data-name="ObstetricHistory" <?= $Page->ObstetricHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ObstetricHistory"><span id="el_patient_an_registration_ObstetricHistory">
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
    <tr id="r_PreviousHistoryofGDM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofGDM"><template id="tpc_patient_an_registration_PreviousHistoryofGDM"><?= $Page->PreviousHistoryofGDM->caption() ?></template></span></td>
        <td data-name="PreviousHistoryofGDM" <?= $Page->PreviousHistoryofGDM->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofGDM"><span id="el_patient_an_registration_PreviousHistoryofGDM">
<span<?= $Page->PreviousHistoryofGDM->viewAttributes() ?>>
<?= $Page->PreviousHistoryofGDM->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
    <tr id="r_PreviousHistorofPIH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistorofPIH"><template id="tpc_patient_an_registration_PreviousHistorofPIH"><?= $Page->PreviousHistorofPIH->caption() ?></template></span></td>
        <td data-name="PreviousHistorofPIH" <?= $Page->PreviousHistorofPIH->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistorofPIH"><span id="el_patient_an_registration_PreviousHistorofPIH">
<span<?= $Page->PreviousHistorofPIH->viewAttributes() ?>>
<?= $Page->PreviousHistorofPIH->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
    <tr id="r_PreviousHistoryofIUGR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofIUGR"><template id="tpc_patient_an_registration_PreviousHistoryofIUGR"><?= $Page->PreviousHistoryofIUGR->caption() ?></template></span></td>
        <td data-name="PreviousHistoryofIUGR" <?= $Page->PreviousHistoryofIUGR->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofIUGR"><span id="el_patient_an_registration_PreviousHistoryofIUGR">
<span<?= $Page->PreviousHistoryofIUGR->viewAttributes() ?>>
<?= $Page->PreviousHistoryofIUGR->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
    <tr id="r_PreviousHistoryofOligohydramnios">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofOligohydramnios"><template id="tpc_patient_an_registration_PreviousHistoryofOligohydramnios"><?= $Page->PreviousHistoryofOligohydramnios->caption() ?></template></span></td>
        <td data-name="PreviousHistoryofOligohydramnios" <?= $Page->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofOligohydramnios"><span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?= $Page->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?= $Page->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
    <tr id="r_PreviousHistoryofPreterm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofPreterm"><template id="tpc_patient_an_registration_PreviousHistoryofPreterm"><?= $Page->PreviousHistoryofPreterm->caption() ?></template></span></td>
        <td data-name="PreviousHistoryofPreterm" <?= $Page->PreviousHistoryofPreterm->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PreviousHistoryofPreterm"><span id="el_patient_an_registration_PreviousHistoryofPreterm">
<span<?= $Page->PreviousHistoryofPreterm->viewAttributes() ?>>
<?= $Page->PreviousHistoryofPreterm->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
    <tr id="r_G1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G1"><template id="tpc_patient_an_registration_G1"><?= $Page->G1->caption() ?></template></span></td>
        <td data-name="G1" <?= $Page->G1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G1"><span id="el_patient_an_registration_G1">
<span<?= $Page->G1->viewAttributes() ?>>
<?= $Page->G1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
    <tr id="r_G2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G2"><template id="tpc_patient_an_registration_G2"><?= $Page->G2->caption() ?></template></span></td>
        <td data-name="G2" <?= $Page->G2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G2"><span id="el_patient_an_registration_G2">
<span<?= $Page->G2->viewAttributes() ?>>
<?= $Page->G2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
    <tr id="r_G3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G3"><template id="tpc_patient_an_registration_G3"><?= $Page->G3->caption() ?></template></span></td>
        <td data-name="G3" <?= $Page->G3->cellAttributes() ?>>
<template id="tpx_patient_an_registration_G3"><span id="el_patient_an_registration_G3">
<span<?= $Page->G3->viewAttributes() ?>>
<?= $Page->G3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
    <tr id="r_DeliveryNDLSCS1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS1"><template id="tpc_patient_an_registration_DeliveryNDLSCS1"><?= $Page->DeliveryNDLSCS1->caption() ?></template></span></td>
        <td data-name="DeliveryNDLSCS1" <?= $Page->DeliveryNDLSCS1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DeliveryNDLSCS1"><span id="el_patient_an_registration_DeliveryNDLSCS1">
<span<?= $Page->DeliveryNDLSCS1->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
    <tr id="r_DeliveryNDLSCS2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS2"><template id="tpc_patient_an_registration_DeliveryNDLSCS2"><?= $Page->DeliveryNDLSCS2->caption() ?></template></span></td>
        <td data-name="DeliveryNDLSCS2" <?= $Page->DeliveryNDLSCS2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DeliveryNDLSCS2"><span id="el_patient_an_registration_DeliveryNDLSCS2">
<span<?= $Page->DeliveryNDLSCS2->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
    <tr id="r_DeliveryNDLSCS3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS3"><template id="tpc_patient_an_registration_DeliveryNDLSCS3"><?= $Page->DeliveryNDLSCS3->caption() ?></template></span></td>
        <td data-name="DeliveryNDLSCS3" <?= $Page->DeliveryNDLSCS3->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DeliveryNDLSCS3"><span id="el_patient_an_registration_DeliveryNDLSCS3">
<span<?= $Page->DeliveryNDLSCS3->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
    <tr id="r_BabySexweight1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight1"><template id="tpc_patient_an_registration_BabySexweight1"><?= $Page->BabySexweight1->caption() ?></template></span></td>
        <td data-name="BabySexweight1" <?= $Page->BabySexweight1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_BabySexweight1"><span id="el_patient_an_registration_BabySexweight1">
<span<?= $Page->BabySexweight1->viewAttributes() ?>>
<?= $Page->BabySexweight1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
    <tr id="r_BabySexweight2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight2"><template id="tpc_patient_an_registration_BabySexweight2"><?= $Page->BabySexweight2->caption() ?></template></span></td>
        <td data-name="BabySexweight2" <?= $Page->BabySexweight2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_BabySexweight2"><span id="el_patient_an_registration_BabySexweight2">
<span<?= $Page->BabySexweight2->viewAttributes() ?>>
<?= $Page->BabySexweight2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
    <tr id="r_BabySexweight3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight3"><template id="tpc_patient_an_registration_BabySexweight3"><?= $Page->BabySexweight3->caption() ?></template></span></td>
        <td data-name="BabySexweight3" <?= $Page->BabySexweight3->cellAttributes() ?>>
<template id="tpx_patient_an_registration_BabySexweight3"><span id="el_patient_an_registration_BabySexweight3">
<span<?= $Page->BabySexweight3->viewAttributes() ?>>
<?= $Page->BabySexweight3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
    <tr id="r_PastMedicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistory"><template id="tpc_patient_an_registration_PastMedicalHistory"><?= $Page->PastMedicalHistory->caption() ?></template></span></td>
        <td data-name="PastMedicalHistory" <?= $Page->PastMedicalHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastMedicalHistory"><span id="el_patient_an_registration_PastMedicalHistory">
<span<?= $Page->PastMedicalHistory->viewAttributes() ?>>
<?= $Page->PastMedicalHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
    <tr id="r_PastSurgicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistory"><template id="tpc_patient_an_registration_PastSurgicalHistory"><?= $Page->PastSurgicalHistory->caption() ?></template></span></td>
        <td data-name="PastSurgicalHistory" <?= $Page->PastSurgicalHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastSurgicalHistory"><span id="el_patient_an_registration_PastSurgicalHistory">
<span<?= $Page->PastSurgicalHistory->viewAttributes() ?>>
<?= $Page->PastSurgicalHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <tr id="r_FamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistory"><template id="tpc_patient_an_registration_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></template></span></td>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<template id="tpx_patient_an_registration_FamilyHistory"><span id="el_patient_an_registration_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
    <tr id="r_Viability">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability"><template id="tpc_patient_an_registration_Viability"><?= $Page->Viability->caption() ?></template></span></td>
        <td data-name="Viability" <?= $Page->Viability->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability"><span id="el_patient_an_registration_Viability">
<span<?= $Page->Viability->viewAttributes() ?>>
<?= $Page->Viability->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
    <tr id="r_ViabilityDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityDATE"><template id="tpc_patient_an_registration_ViabilityDATE"><?= $Page->ViabilityDATE->caption() ?></template></span></td>
        <td data-name="ViabilityDATE" <?= $Page->ViabilityDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ViabilityDATE"><span id="el_patient_an_registration_ViabilityDATE">
<span<?= $Page->ViabilityDATE->viewAttributes() ?>>
<?= $Page->ViabilityDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
    <tr id="r_ViabilityREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityREPORT"><template id="tpc_patient_an_registration_ViabilityREPORT"><?= $Page->ViabilityREPORT->caption() ?></template></span></td>
        <td data-name="ViabilityREPORT" <?= $Page->ViabilityREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ViabilityREPORT"><span id="el_patient_an_registration_ViabilityREPORT">
<span<?= $Page->ViabilityREPORT->viewAttributes() ?>>
<?= $Page->ViabilityREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
    <tr id="r_Viability2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2"><template id="tpc_patient_an_registration_Viability2"><?= $Page->Viability2->caption() ?></template></span></td>
        <td data-name="Viability2" <?= $Page->Viability2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability2"><span id="el_patient_an_registration_Viability2">
<span<?= $Page->Viability2->viewAttributes() ?>>
<?= $Page->Viability2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
    <tr id="r_Viability2DATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2DATE"><template id="tpc_patient_an_registration_Viability2DATE"><?= $Page->Viability2DATE->caption() ?></template></span></td>
        <td data-name="Viability2DATE" <?= $Page->Viability2DATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability2DATE"><span id="el_patient_an_registration_Viability2DATE">
<span<?= $Page->Viability2DATE->viewAttributes() ?>>
<?= $Page->Viability2DATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability2REPORT->Visible) { // Viability2REPORT ?>
    <tr id="r_Viability2REPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2REPORT"><template id="tpc_patient_an_registration_Viability2REPORT"><?= $Page->Viability2REPORT->caption() ?></template></span></td>
        <td data-name="Viability2REPORT" <?= $Page->Viability2REPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Viability2REPORT"><span id="el_patient_an_registration_Viability2REPORT">
<span<?= $Page->Viability2REPORT->viewAttributes() ?>>
<?= $Page->Viability2REPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
    <tr id="r_NTscan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscan"><template id="tpc_patient_an_registration_NTscan"><?= $Page->NTscan->caption() ?></template></span></td>
        <td data-name="NTscan" <?= $Page->NTscan->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NTscan"><span id="el_patient_an_registration_NTscan">
<span<?= $Page->NTscan->viewAttributes() ?>>
<?= $Page->NTscan->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
    <tr id="r_NTscanDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanDATE"><template id="tpc_patient_an_registration_NTscanDATE"><?= $Page->NTscanDATE->caption() ?></template></span></td>
        <td data-name="NTscanDATE" <?= $Page->NTscanDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NTscanDATE"><span id="el_patient_an_registration_NTscanDATE">
<span<?= $Page->NTscanDATE->viewAttributes() ?>>
<?= $Page->NTscanDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NTscanREPORT->Visible) { // NTscanREPORT ?>
    <tr id="r_NTscanREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanREPORT"><template id="tpc_patient_an_registration_NTscanREPORT"><?= $Page->NTscanREPORT->caption() ?></template></span></td>
        <td data-name="NTscanREPORT" <?= $Page->NTscanREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NTscanREPORT"><span id="el_patient_an_registration_NTscanREPORT">
<span<?= $Page->NTscanREPORT->viewAttributes() ?>>
<?= $Page->NTscanREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
    <tr id="r_EarlyTarget">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTarget"><template id="tpc_patient_an_registration_EarlyTarget"><?= $Page->EarlyTarget->caption() ?></template></span></td>
        <td data-name="EarlyTarget" <?= $Page->EarlyTarget->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EarlyTarget"><span id="el_patient_an_registration_EarlyTarget">
<span<?= $Page->EarlyTarget->viewAttributes() ?>>
<?= $Page->EarlyTarget->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
    <tr id="r_EarlyTargetDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetDATE"><template id="tpc_patient_an_registration_EarlyTargetDATE"><?= $Page->EarlyTargetDATE->caption() ?></template></span></td>
        <td data-name="EarlyTargetDATE" <?= $Page->EarlyTargetDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EarlyTargetDATE"><span id="el_patient_an_registration_EarlyTargetDATE">
<span<?= $Page->EarlyTargetDATE->viewAttributes() ?>>
<?= $Page->EarlyTargetDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
    <tr id="r_EarlyTargetREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetREPORT"><template id="tpc_patient_an_registration_EarlyTargetREPORT"><?= $Page->EarlyTargetREPORT->caption() ?></template></span></td>
        <td data-name="EarlyTargetREPORT" <?= $Page->EarlyTargetREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EarlyTargetREPORT"><span id="el_patient_an_registration_EarlyTargetREPORT">
<span<?= $Page->EarlyTargetREPORT->viewAttributes() ?>>
<?= $Page->EarlyTargetREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
    <tr id="r_Anomaly">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Anomaly"><template id="tpc_patient_an_registration_Anomaly"><?= $Page->Anomaly->caption() ?></template></span></td>
        <td data-name="Anomaly" <?= $Page->Anomaly->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Anomaly"><span id="el_patient_an_registration_Anomaly">
<span<?= $Page->Anomaly->viewAttributes() ?>>
<?= $Page->Anomaly->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
    <tr id="r_AnomalyDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyDATE"><template id="tpc_patient_an_registration_AnomalyDATE"><?= $Page->AnomalyDATE->caption() ?></template></span></td>
        <td data-name="AnomalyDATE" <?= $Page->AnomalyDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_AnomalyDATE"><span id="el_patient_an_registration_AnomalyDATE">
<span<?= $Page->AnomalyDATE->viewAttributes() ?>>
<?= $Page->AnomalyDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
    <tr id="r_AnomalyREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyREPORT"><template id="tpc_patient_an_registration_AnomalyREPORT"><?= $Page->AnomalyREPORT->caption() ?></template></span></td>
        <td data-name="AnomalyREPORT" <?= $Page->AnomalyREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_AnomalyREPORT"><span id="el_patient_an_registration_AnomalyREPORT">
<span<?= $Page->AnomalyREPORT->viewAttributes() ?>>
<?= $Page->AnomalyREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
    <tr id="r_Growth">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth"><template id="tpc_patient_an_registration_Growth"><?= $Page->Growth->caption() ?></template></span></td>
        <td data-name="Growth" <?= $Page->Growth->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth"><span id="el_patient_an_registration_Growth">
<span<?= $Page->Growth->viewAttributes() ?>>
<?= $Page->Growth->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
    <tr id="r_GrowthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthDATE"><template id="tpc_patient_an_registration_GrowthDATE"><?= $Page->GrowthDATE->caption() ?></template></span></td>
        <td data-name="GrowthDATE" <?= $Page->GrowthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_GrowthDATE"><span id="el_patient_an_registration_GrowthDATE">
<span<?= $Page->GrowthDATE->viewAttributes() ?>>
<?= $Page->GrowthDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrowthREPORT->Visible) { // GrowthREPORT ?>
    <tr id="r_GrowthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthREPORT"><template id="tpc_patient_an_registration_GrowthREPORT"><?= $Page->GrowthREPORT->caption() ?></template></span></td>
        <td data-name="GrowthREPORT" <?= $Page->GrowthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_GrowthREPORT"><span id="el_patient_an_registration_GrowthREPORT">
<span<?= $Page->GrowthREPORT->viewAttributes() ?>>
<?= $Page->GrowthREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
    <tr id="r_Growth1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1"><template id="tpc_patient_an_registration_Growth1"><?= $Page->Growth1->caption() ?></template></span></td>
        <td data-name="Growth1" <?= $Page->Growth1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth1"><span id="el_patient_an_registration_Growth1">
<span<?= $Page->Growth1->viewAttributes() ?>>
<?= $Page->Growth1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
    <tr id="r_Growth1DATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1DATE"><template id="tpc_patient_an_registration_Growth1DATE"><?= $Page->Growth1DATE->caption() ?></template></span></td>
        <td data-name="Growth1DATE" <?= $Page->Growth1DATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth1DATE"><span id="el_patient_an_registration_Growth1DATE">
<span<?= $Page->Growth1DATE->viewAttributes() ?>>
<?= $Page->Growth1DATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth1REPORT->Visible) { // Growth1REPORT ?>
    <tr id="r_Growth1REPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1REPORT"><template id="tpc_patient_an_registration_Growth1REPORT"><?= $Page->Growth1REPORT->caption() ?></template></span></td>
        <td data-name="Growth1REPORT" <?= $Page->Growth1REPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Growth1REPORT"><span id="el_patient_an_registration_Growth1REPORT">
<span<?= $Page->Growth1REPORT->viewAttributes() ?>>
<?= $Page->Growth1REPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
    <tr id="r_ANProfile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfile"><template id="tpc_patient_an_registration_ANProfile"><?= $Page->ANProfile->caption() ?></template></span></td>
        <td data-name="ANProfile" <?= $Page->ANProfile->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfile"><span id="el_patient_an_registration_ANProfile">
<span<?= $Page->ANProfile->viewAttributes() ?>>
<?= $Page->ANProfile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
    <tr id="r_ANProfileDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileDATE"><template id="tpc_patient_an_registration_ANProfileDATE"><?= $Page->ANProfileDATE->caption() ?></template></span></td>
        <td data-name="ANProfileDATE" <?= $Page->ANProfileDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfileDATE"><span id="el_patient_an_registration_ANProfileDATE">
<span<?= $Page->ANProfileDATE->viewAttributes() ?>>
<?= $Page->ANProfileDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
    <tr id="r_ANProfileINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileINHOUSE"><template id="tpc_patient_an_registration_ANProfileINHOUSE"><?= $Page->ANProfileINHOUSE->caption() ?></template></span></td>
        <td data-name="ANProfileINHOUSE" <?= $Page->ANProfileINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfileINHOUSE"><span id="el_patient_an_registration_ANProfileINHOUSE">
<span<?= $Page->ANProfileINHOUSE->viewAttributes() ?>>
<?= $Page->ANProfileINHOUSE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
    <tr id="r_ANProfileREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileREPORT"><template id="tpc_patient_an_registration_ANProfileREPORT"><?= $Page->ANProfileREPORT->caption() ?></template></span></td>
        <td data-name="ANProfileREPORT" <?= $Page->ANProfileREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANProfileREPORT"><span id="el_patient_an_registration_ANProfileREPORT">
<span<?= $Page->ANProfileREPORT->viewAttributes() ?>>
<?= $Page->ANProfileREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
    <tr id="r_DualMarker">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarker"><template id="tpc_patient_an_registration_DualMarker"><?= $Page->DualMarker->caption() ?></template></span></td>
        <td data-name="DualMarker" <?= $Page->DualMarker->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarker"><span id="el_patient_an_registration_DualMarker">
<span<?= $Page->DualMarker->viewAttributes() ?>>
<?= $Page->DualMarker->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
    <tr id="r_DualMarkerDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerDATE"><template id="tpc_patient_an_registration_DualMarkerDATE"><?= $Page->DualMarkerDATE->caption() ?></template></span></td>
        <td data-name="DualMarkerDATE" <?= $Page->DualMarkerDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarkerDATE"><span id="el_patient_an_registration_DualMarkerDATE">
<span<?= $Page->DualMarkerDATE->viewAttributes() ?>>
<?= $Page->DualMarkerDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
    <tr id="r_DualMarkerINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerINHOUSE"><template id="tpc_patient_an_registration_DualMarkerINHOUSE"><?= $Page->DualMarkerINHOUSE->caption() ?></template></span></td>
        <td data-name="DualMarkerINHOUSE" <?= $Page->DualMarkerINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarkerINHOUSE"><span id="el_patient_an_registration_DualMarkerINHOUSE">
<span<?= $Page->DualMarkerINHOUSE->viewAttributes() ?>>
<?= $Page->DualMarkerINHOUSE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
    <tr id="r_DualMarkerREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerREPORT"><template id="tpc_patient_an_registration_DualMarkerREPORT"><?= $Page->DualMarkerREPORT->caption() ?></template></span></td>
        <td data-name="DualMarkerREPORT" <?= $Page->DualMarkerREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DualMarkerREPORT"><span id="el_patient_an_registration_DualMarkerREPORT">
<span<?= $Page->DualMarkerREPORT->viewAttributes() ?>>
<?= $Page->DualMarkerREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
    <tr id="r_Quadruple">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Quadruple"><template id="tpc_patient_an_registration_Quadruple"><?= $Page->Quadruple->caption() ?></template></span></td>
        <td data-name="Quadruple" <?= $Page->Quadruple->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Quadruple"><span id="el_patient_an_registration_Quadruple">
<span<?= $Page->Quadruple->viewAttributes() ?>>
<?= $Page->Quadruple->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
    <tr id="r_QuadrupleDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleDATE"><template id="tpc_patient_an_registration_QuadrupleDATE"><?= $Page->QuadrupleDATE->caption() ?></template></span></td>
        <td data-name="QuadrupleDATE" <?= $Page->QuadrupleDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_QuadrupleDATE"><span id="el_patient_an_registration_QuadrupleDATE">
<span<?= $Page->QuadrupleDATE->viewAttributes() ?>>
<?= $Page->QuadrupleDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
    <tr id="r_QuadrupleINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleINHOUSE"><template id="tpc_patient_an_registration_QuadrupleINHOUSE"><?= $Page->QuadrupleINHOUSE->caption() ?></template></span></td>
        <td data-name="QuadrupleINHOUSE" <?= $Page->QuadrupleINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_QuadrupleINHOUSE"><span id="el_patient_an_registration_QuadrupleINHOUSE">
<span<?= $Page->QuadrupleINHOUSE->viewAttributes() ?>>
<?= $Page->QuadrupleINHOUSE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
    <tr id="r_QuadrupleREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleREPORT"><template id="tpc_patient_an_registration_QuadrupleREPORT"><?= $Page->QuadrupleREPORT->caption() ?></template></span></td>
        <td data-name="QuadrupleREPORT" <?= $Page->QuadrupleREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_QuadrupleREPORT"><span id="el_patient_an_registration_QuadrupleREPORT">
<span<?= $Page->QuadrupleREPORT->viewAttributes() ?>>
<?= $Page->QuadrupleREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
    <tr id="r_A5month">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5month"><template id="tpc_patient_an_registration_A5month"><?= $Page->A5month->caption() ?></template></span></td>
        <td data-name="A5month" <?= $Page->A5month->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5month"><span id="el_patient_an_registration_A5month">
<span<?= $Page->A5month->viewAttributes() ?>>
<?= $Page->A5month->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
    <tr id="r_A5monthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthDATE"><template id="tpc_patient_an_registration_A5monthDATE"><?= $Page->A5monthDATE->caption() ?></template></span></td>
        <td data-name="A5monthDATE" <?= $Page->A5monthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5monthDATE"><span id="el_patient_an_registration_A5monthDATE">
<span<?= $Page->A5monthDATE->viewAttributes() ?>>
<?= $Page->A5monthDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
    <tr id="r_A5monthINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthINHOUSE"><template id="tpc_patient_an_registration_A5monthINHOUSE"><?= $Page->A5monthINHOUSE->caption() ?></template></span></td>
        <td data-name="A5monthINHOUSE" <?= $Page->A5monthINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5monthINHOUSE"><span id="el_patient_an_registration_A5monthINHOUSE">
<span<?= $Page->A5monthINHOUSE->viewAttributes() ?>>
<?= $Page->A5monthINHOUSE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5monthREPORT->Visible) { // A5monthREPORT ?>
    <tr id="r_A5monthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthREPORT"><template id="tpc_patient_an_registration_A5monthREPORT"><?= $Page->A5monthREPORT->caption() ?></template></span></td>
        <td data-name="A5monthREPORT" <?= $Page->A5monthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A5monthREPORT"><span id="el_patient_an_registration_A5monthREPORT">
<span<?= $Page->A5monthREPORT->viewAttributes() ?>>
<?= $Page->A5monthREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
    <tr id="r_A7month">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7month"><template id="tpc_patient_an_registration_A7month"><?= $Page->A7month->caption() ?></template></span></td>
        <td data-name="A7month" <?= $Page->A7month->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7month"><span id="el_patient_an_registration_A7month">
<span<?= $Page->A7month->viewAttributes() ?>>
<?= $Page->A7month->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
    <tr id="r_A7monthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthDATE"><template id="tpc_patient_an_registration_A7monthDATE"><?= $Page->A7monthDATE->caption() ?></template></span></td>
        <td data-name="A7monthDATE" <?= $Page->A7monthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7monthDATE"><span id="el_patient_an_registration_A7monthDATE">
<span<?= $Page->A7monthDATE->viewAttributes() ?>>
<?= $Page->A7monthDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
    <tr id="r_A7monthINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthINHOUSE"><template id="tpc_patient_an_registration_A7monthINHOUSE"><?= $Page->A7monthINHOUSE->caption() ?></template></span></td>
        <td data-name="A7monthINHOUSE" <?= $Page->A7monthINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7monthINHOUSE"><span id="el_patient_an_registration_A7monthINHOUSE">
<span<?= $Page->A7monthINHOUSE->viewAttributes() ?>>
<?= $Page->A7monthINHOUSE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7monthREPORT->Visible) { // A7monthREPORT ?>
    <tr id="r_A7monthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthREPORT"><template id="tpc_patient_an_registration_A7monthREPORT"><?= $Page->A7monthREPORT->caption() ?></template></span></td>
        <td data-name="A7monthREPORT" <?= $Page->A7monthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A7monthREPORT"><span id="el_patient_an_registration_A7monthREPORT">
<span<?= $Page->A7monthREPORT->viewAttributes() ?>>
<?= $Page->A7monthREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
    <tr id="r_A9month">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9month"><template id="tpc_patient_an_registration_A9month"><?= $Page->A9month->caption() ?></template></span></td>
        <td data-name="A9month" <?= $Page->A9month->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9month"><span id="el_patient_an_registration_A9month">
<span<?= $Page->A9month->viewAttributes() ?>>
<?= $Page->A9month->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
    <tr id="r_A9monthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthDATE"><template id="tpc_patient_an_registration_A9monthDATE"><?= $Page->A9monthDATE->caption() ?></template></span></td>
        <td data-name="A9monthDATE" <?= $Page->A9monthDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9monthDATE"><span id="el_patient_an_registration_A9monthDATE">
<span<?= $Page->A9monthDATE->viewAttributes() ?>>
<?= $Page->A9monthDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
    <tr id="r_A9monthINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthINHOUSE"><template id="tpc_patient_an_registration_A9monthINHOUSE"><?= $Page->A9monthINHOUSE->caption() ?></template></span></td>
        <td data-name="A9monthINHOUSE" <?= $Page->A9monthINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9monthINHOUSE"><span id="el_patient_an_registration_A9monthINHOUSE">
<span<?= $Page->A9monthINHOUSE->viewAttributes() ?>>
<?= $Page->A9monthINHOUSE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9monthREPORT->Visible) { // A9monthREPORT ?>
    <tr id="r_A9monthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthREPORT"><template id="tpc_patient_an_registration_A9monthREPORT"><?= $Page->A9monthREPORT->caption() ?></template></span></td>
        <td data-name="A9monthREPORT" <?= $Page->A9monthREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_A9monthREPORT"><span id="el_patient_an_registration_A9monthREPORT">
<span<?= $Page->A9monthREPORT->viewAttributes() ?>>
<?= $Page->A9monthREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
    <tr id="r_INJ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJ"><template id="tpc_patient_an_registration_INJ"><?= $Page->INJ->caption() ?></template></span></td>
        <td data-name="INJ" <?= $Page->INJ->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJ"><span id="el_patient_an_registration_INJ">
<span<?= $Page->INJ->viewAttributes() ?>>
<?= $Page->INJ->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
    <tr id="r_INJDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJDATE"><template id="tpc_patient_an_registration_INJDATE"><?= $Page->INJDATE->caption() ?></template></span></td>
        <td data-name="INJDATE" <?= $Page->INJDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJDATE"><span id="el_patient_an_registration_INJDATE">
<span<?= $Page->INJDATE->viewAttributes() ?>>
<?= $Page->INJDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
    <tr id="r_INJINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJINHOUSE"><template id="tpc_patient_an_registration_INJINHOUSE"><?= $Page->INJINHOUSE->caption() ?></template></span></td>
        <td data-name="INJINHOUSE" <?= $Page->INJINHOUSE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJINHOUSE"><span id="el_patient_an_registration_INJINHOUSE">
<span<?= $Page->INJINHOUSE->viewAttributes() ?>>
<?= $Page->INJINHOUSE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJREPORT->Visible) { // INJREPORT ?>
    <tr id="r_INJREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJREPORT"><template id="tpc_patient_an_registration_INJREPORT"><?= $Page->INJREPORT->caption() ?></template></span></td>
        <td data-name="INJREPORT" <?= $Page->INJREPORT->cellAttributes() ?>>
<template id="tpx_patient_an_registration_INJREPORT"><span id="el_patient_an_registration_INJREPORT">
<span<?= $Page->INJREPORT->viewAttributes() ?>>
<?= $Page->INJREPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
    <tr id="r_Bleeding">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Bleeding"><template id="tpc_patient_an_registration_Bleeding"><?= $Page->Bleeding->caption() ?></template></span></td>
        <td data-name="Bleeding" <?= $Page->Bleeding->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Bleeding"><span id="el_patient_an_registration_Bleeding">
<span<?= $Page->Bleeding->viewAttributes() ?>>
<?= $Page->Bleeding->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
    <tr id="r_Hypothyroidism">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Hypothyroidism"><template id="tpc_patient_an_registration_Hypothyroidism"><?= $Page->Hypothyroidism->caption() ?></template></span></td>
        <td data-name="Hypothyroidism" <?= $Page->Hypothyroidism->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Hypothyroidism"><span id="el_patient_an_registration_Hypothyroidism">
<span<?= $Page->Hypothyroidism->viewAttributes() ?>>
<?= $Page->Hypothyroidism->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
    <tr id="r_PICMENumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PICMENumber"><template id="tpc_patient_an_registration_PICMENumber"><?= $Page->PICMENumber->caption() ?></template></span></td>
        <td data-name="PICMENumber" <?= $Page->PICMENumber->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PICMENumber"><span id="el_patient_an_registration_PICMENumber">
<span<?= $Page->PICMENumber->viewAttributes() ?>>
<?= $Page->PICMENumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
    <tr id="r_Outcome">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Outcome"><template id="tpc_patient_an_registration_Outcome"><?= $Page->Outcome->caption() ?></template></span></td>
        <td data-name="Outcome" <?= $Page->Outcome->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Outcome"><span id="el_patient_an_registration_Outcome">
<span<?= $Page->Outcome->viewAttributes() ?>>
<?= $Page->Outcome->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <tr id="r_DateofAdmission">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateofAdmission"><template id="tpc_patient_an_registration_DateofAdmission"><?= $Page->DateofAdmission->caption() ?></template></span></td>
        <td data-name="DateofAdmission" <?= $Page->DateofAdmission->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DateofAdmission"><span id="el_patient_an_registration_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
    <tr id="r_DateodProcedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateodProcedure"><template id="tpc_patient_an_registration_DateodProcedure"><?= $Page->DateodProcedure->caption() ?></template></span></td>
        <td data-name="DateodProcedure" <?= $Page->DateodProcedure->cellAttributes() ?>>
<template id="tpx_patient_an_registration_DateodProcedure"><span id="el_patient_an_registration_DateodProcedure">
<span<?= $Page->DateodProcedure->viewAttributes() ?>>
<?= $Page->DateodProcedure->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <tr id="r_Miscarriage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Miscarriage"><template id="tpc_patient_an_registration_Miscarriage"><?= $Page->Miscarriage->caption() ?></template></span></td>
        <td data-name="Miscarriage" <?= $Page->Miscarriage->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Miscarriage"><span id="el_patient_an_registration_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
    <tr id="r_ModeOfDelivery">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ModeOfDelivery"><template id="tpc_patient_an_registration_ModeOfDelivery"><?= $Page->ModeOfDelivery->caption() ?></template></span></td>
        <td data-name="ModeOfDelivery" <?= $Page->ModeOfDelivery->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ModeOfDelivery"><span id="el_patient_an_registration_ModeOfDelivery">
<span<?= $Page->ModeOfDelivery->viewAttributes() ?>>
<?= $Page->ModeOfDelivery->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
    <tr id="r_ND">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ND"><template id="tpc_patient_an_registration_ND"><?= $Page->ND->caption() ?></template></span></td>
        <td data-name="ND" <?= $Page->ND->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ND"><span id="el_patient_an_registration_ND">
<span<?= $Page->ND->viewAttributes() ?>>
<?= $Page->ND->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
    <tr id="r_NDS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDS"><template id="tpc_patient_an_registration_NDS"><?= $Page->NDS->caption() ?></template></span></td>
        <td data-name="NDS" <?= $Page->NDS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NDS"><span id="el_patient_an_registration_NDS">
<span<?= $Page->NDS->viewAttributes() ?>>
<?= $Page->NDS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
    <tr id="r_NDP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDP"><template id="tpc_patient_an_registration_NDP"><?= $Page->NDP->caption() ?></template></span></td>
        <td data-name="NDP" <?= $Page->NDP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NDP"><span id="el_patient_an_registration_NDP">
<span<?= $Page->NDP->viewAttributes() ?>>
<?= $Page->NDP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
    <tr id="r_Vaccum">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Vaccum"><template id="tpc_patient_an_registration_Vaccum"><?= $Page->Vaccum->caption() ?></template></span></td>
        <td data-name="Vaccum" <?= $Page->Vaccum->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Vaccum"><span id="el_patient_an_registration_Vaccum">
<span<?= $Page->Vaccum->viewAttributes() ?>>
<?= $Page->Vaccum->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
    <tr id="r_VaccumS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumS"><template id="tpc_patient_an_registration_VaccumS"><?= $Page->VaccumS->caption() ?></template></span></td>
        <td data-name="VaccumS" <?= $Page->VaccumS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_VaccumS"><span id="el_patient_an_registration_VaccumS">
<span<?= $Page->VaccumS->viewAttributes() ?>>
<?= $Page->VaccumS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
    <tr id="r_VaccumP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumP"><template id="tpc_patient_an_registration_VaccumP"><?= $Page->VaccumP->caption() ?></template></span></td>
        <td data-name="VaccumP" <?= $Page->VaccumP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_VaccumP"><span id="el_patient_an_registration_VaccumP">
<span<?= $Page->VaccumP->viewAttributes() ?>>
<?= $Page->VaccumP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
    <tr id="r_Forceps">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Forceps"><template id="tpc_patient_an_registration_Forceps"><?= $Page->Forceps->caption() ?></template></span></td>
        <td data-name="Forceps" <?= $Page->Forceps->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Forceps"><span id="el_patient_an_registration_Forceps">
<span<?= $Page->Forceps->viewAttributes() ?>>
<?= $Page->Forceps->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
    <tr id="r_ForcepsS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsS"><template id="tpc_patient_an_registration_ForcepsS"><?= $Page->ForcepsS->caption() ?></template></span></td>
        <td data-name="ForcepsS" <?= $Page->ForcepsS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ForcepsS"><span id="el_patient_an_registration_ForcepsS">
<span<?= $Page->ForcepsS->viewAttributes() ?>>
<?= $Page->ForcepsS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
    <tr id="r_ForcepsP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsP"><template id="tpc_patient_an_registration_ForcepsP"><?= $Page->ForcepsP->caption() ?></template></span></td>
        <td data-name="ForcepsP" <?= $Page->ForcepsP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ForcepsP"><span id="el_patient_an_registration_ForcepsP">
<span<?= $Page->ForcepsP->viewAttributes() ?>>
<?= $Page->ForcepsP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
    <tr id="r_Elective">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Elective"><template id="tpc_patient_an_registration_Elective"><?= $Page->Elective->caption() ?></template></span></td>
        <td data-name="Elective" <?= $Page->Elective->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Elective"><span id="el_patient_an_registration_Elective">
<span<?= $Page->Elective->viewAttributes() ?>>
<?= $Page->Elective->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
    <tr id="r_ElectiveS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveS"><template id="tpc_patient_an_registration_ElectiveS"><?= $Page->ElectiveS->caption() ?></template></span></td>
        <td data-name="ElectiveS" <?= $Page->ElectiveS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ElectiveS"><span id="el_patient_an_registration_ElectiveS">
<span<?= $Page->ElectiveS->viewAttributes() ?>>
<?= $Page->ElectiveS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
    <tr id="r_ElectiveP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveP"><template id="tpc_patient_an_registration_ElectiveP"><?= $Page->ElectiveP->caption() ?></template></span></td>
        <td data-name="ElectiveP" <?= $Page->ElectiveP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ElectiveP"><span id="el_patient_an_registration_ElectiveP">
<span<?= $Page->ElectiveP->viewAttributes() ?>>
<?= $Page->ElectiveP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
    <tr id="r_Emergency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Emergency"><template id="tpc_patient_an_registration_Emergency"><?= $Page->Emergency->caption() ?></template></span></td>
        <td data-name="Emergency" <?= $Page->Emergency->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Emergency"><span id="el_patient_an_registration_Emergency">
<span<?= $Page->Emergency->viewAttributes() ?>>
<?= $Page->Emergency->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
    <tr id="r_EmergencyS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyS"><template id="tpc_patient_an_registration_EmergencyS"><?= $Page->EmergencyS->caption() ?></template></span></td>
        <td data-name="EmergencyS" <?= $Page->EmergencyS->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EmergencyS"><span id="el_patient_an_registration_EmergencyS">
<span<?= $Page->EmergencyS->viewAttributes() ?>>
<?= $Page->EmergencyS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
    <tr id="r_EmergencyP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyP"><template id="tpc_patient_an_registration_EmergencyP"><?= $Page->EmergencyP->caption() ?></template></span></td>
        <td data-name="EmergencyP" <?= $Page->EmergencyP->cellAttributes() ?>>
<template id="tpx_patient_an_registration_EmergencyP"><span id="el_patient_an_registration_EmergencyP">
<span<?= $Page->EmergencyP->viewAttributes() ?>>
<?= $Page->EmergencyP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
    <tr id="r_Maturity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Maturity"><template id="tpc_patient_an_registration_Maturity"><?= $Page->Maturity->caption() ?></template></span></td>
        <td data-name="Maturity" <?= $Page->Maturity->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Maturity"><span id="el_patient_an_registration_Maturity">
<span<?= $Page->Maturity->viewAttributes() ?>>
<?= $Page->Maturity->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
    <tr id="r_Baby1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby1"><template id="tpc_patient_an_registration_Baby1"><?= $Page->Baby1->caption() ?></template></span></td>
        <td data-name="Baby1" <?= $Page->Baby1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Baby1"><span id="el_patient_an_registration_Baby1">
<span<?= $Page->Baby1->viewAttributes() ?>>
<?= $Page->Baby1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
    <tr id="r_Baby2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby2"><template id="tpc_patient_an_registration_Baby2"><?= $Page->Baby2->caption() ?></template></span></td>
        <td data-name="Baby2" <?= $Page->Baby2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Baby2"><span id="el_patient_an_registration_Baby2">
<span<?= $Page->Baby2->viewAttributes() ?>>
<?= $Page->Baby2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
    <tr id="r_sex1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex1"><template id="tpc_patient_an_registration_sex1"><?= $Page->sex1->caption() ?></template></span></td>
        <td data-name="sex1" <?= $Page->sex1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_sex1"><span id="el_patient_an_registration_sex1">
<span<?= $Page->sex1->viewAttributes() ?>>
<?= $Page->sex1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
    <tr id="r_sex2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex2"><template id="tpc_patient_an_registration_sex2"><?= $Page->sex2->caption() ?></template></span></td>
        <td data-name="sex2" <?= $Page->sex2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_sex2"><span id="el_patient_an_registration_sex2">
<span<?= $Page->sex2->viewAttributes() ?>>
<?= $Page->sex2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
    <tr id="r_weight1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight1"><template id="tpc_patient_an_registration_weight1"><?= $Page->weight1->caption() ?></template></span></td>
        <td data-name="weight1" <?= $Page->weight1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_weight1"><span id="el_patient_an_registration_weight1">
<span<?= $Page->weight1->viewAttributes() ?>>
<?= $Page->weight1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
    <tr id="r_weight2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight2"><template id="tpc_patient_an_registration_weight2"><?= $Page->weight2->caption() ?></template></span></td>
        <td data-name="weight2" <?= $Page->weight2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_weight2"><span id="el_patient_an_registration_weight2">
<span<?= $Page->weight2->viewAttributes() ?>>
<?= $Page->weight2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
    <tr id="r_NICU1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU1"><template id="tpc_patient_an_registration_NICU1"><?= $Page->NICU1->caption() ?></template></span></td>
        <td data-name="NICU1" <?= $Page->NICU1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NICU1"><span id="el_patient_an_registration_NICU1">
<span<?= $Page->NICU1->viewAttributes() ?>>
<?= $Page->NICU1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
    <tr id="r_NICU2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU2"><template id="tpc_patient_an_registration_NICU2"><?= $Page->NICU2->caption() ?></template></span></td>
        <td data-name="NICU2" <?= $Page->NICU2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_NICU2"><span id="el_patient_an_registration_NICU2">
<span<?= $Page->NICU2->viewAttributes() ?>>
<?= $Page->NICU2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
    <tr id="r_Jaundice1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice1"><template id="tpc_patient_an_registration_Jaundice1"><?= $Page->Jaundice1->caption() ?></template></span></td>
        <td data-name="Jaundice1" <?= $Page->Jaundice1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Jaundice1"><span id="el_patient_an_registration_Jaundice1">
<span<?= $Page->Jaundice1->viewAttributes() ?>>
<?= $Page->Jaundice1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
    <tr id="r_Jaundice2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice2"><template id="tpc_patient_an_registration_Jaundice2"><?= $Page->Jaundice2->caption() ?></template></span></td>
        <td data-name="Jaundice2" <?= $Page->Jaundice2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Jaundice2"><span id="el_patient_an_registration_Jaundice2">
<span<?= $Page->Jaundice2->viewAttributes() ?>>
<?= $Page->Jaundice2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <tr id="r_Others1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others1"><template id="tpc_patient_an_registration_Others1"><?= $Page->Others1->caption() ?></template></span></td>
        <td data-name="Others1" <?= $Page->Others1->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Others1"><span id="el_patient_an_registration_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <tr id="r_Others2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others2"><template id="tpc_patient_an_registration_Others2"><?= $Page->Others2->caption() ?></template></span></td>
        <td data-name="Others2" <?= $Page->Others2->cellAttributes() ?>>
<template id="tpx_patient_an_registration_Others2"><span id="el_patient_an_registration_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
    <tr id="r_SpillOverReasons">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_SpillOverReasons"><template id="tpc_patient_an_registration_SpillOverReasons"><?= $Page->SpillOverReasons->caption() ?></template></span></td>
        <td data-name="SpillOverReasons" <?= $Page->SpillOverReasons->cellAttributes() ?>>
<template id="tpx_patient_an_registration_SpillOverReasons"><span id="el_patient_an_registration_SpillOverReasons">
<span<?= $Page->SpillOverReasons->viewAttributes() ?>>
<?= $Page->SpillOverReasons->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
    <tr id="r_ANClosed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosed"><template id="tpc_patient_an_registration_ANClosed"><?= $Page->ANClosed->caption() ?></template></span></td>
        <td data-name="ANClosed" <?= $Page->ANClosed->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANClosed"><span id="el_patient_an_registration_ANClosed">
<span<?= $Page->ANClosed->viewAttributes() ?>>
<?= $Page->ANClosed->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
    <tr id="r_ANClosedDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosedDATE"><template id="tpc_patient_an_registration_ANClosedDATE"><?= $Page->ANClosedDATE->caption() ?></template></span></td>
        <td data-name="ANClosedDATE" <?= $Page->ANClosedDATE->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ANClosedDATE"><span id="el_patient_an_registration_ANClosedDATE">
<span<?= $Page->ANClosedDATE->viewAttributes() ?>>
<?= $Page->ANClosedDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
    <tr id="r_PastMedicalHistoryOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistoryOthers"><template id="tpc_patient_an_registration_PastMedicalHistoryOthers"><?= $Page->PastMedicalHistoryOthers->caption() ?></template></span></td>
        <td data-name="PastMedicalHistoryOthers" <?= $Page->PastMedicalHistoryOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastMedicalHistoryOthers"><span id="el_patient_an_registration_PastMedicalHistoryOthers">
<span<?= $Page->PastMedicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastMedicalHistoryOthers->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
    <tr id="r_PastSurgicalHistoryOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistoryOthers"><template id="tpc_patient_an_registration_PastSurgicalHistoryOthers"><?= $Page->PastSurgicalHistoryOthers->caption() ?></template></span></td>
        <td data-name="PastSurgicalHistoryOthers" <?= $Page->PastSurgicalHistoryOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PastSurgicalHistoryOthers"><span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<span<?= $Page->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
    <tr id="r_FamilyHistoryOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistoryOthers"><template id="tpc_patient_an_registration_FamilyHistoryOthers"><?= $Page->FamilyHistoryOthers->caption() ?></template></span></td>
        <td data-name="FamilyHistoryOthers" <?= $Page->FamilyHistoryOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_FamilyHistoryOthers"><span id="el_patient_an_registration_FamilyHistoryOthers">
<span<?= $Page->FamilyHistoryOthers->viewAttributes() ?>>
<?= $Page->FamilyHistoryOthers->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
    <tr id="r_PresentPregnancyComplicationsOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PresentPregnancyComplicationsOthers"><template id="tpc_patient_an_registration_PresentPregnancyComplicationsOthers"><?= $Page->PresentPregnancyComplicationsOthers->caption() ?></template></span></td>
        <td data-name="PresentPregnancyComplicationsOthers" <?= $Page->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<template id="tpx_patient_an_registration_PresentPregnancyComplicationsOthers"><span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?= $Page->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?= $Page->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
    <tr id="r_ETdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ETdate"><template id="tpc_patient_an_registration_ETdate"><?= $Page->ETdate->caption() ?></template></span></td>
        <td data-name="ETdate" <?= $Page->ETdate->cellAttributes() ?>>
<template id="tpx_patient_an_registration_ETdate"><span id="el_patient_an_registration_ETdate">
<span<?= $Page->ETdate->viewAttributes() ?>>
<?= $Page->ETdate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_patient_an_registrationview" class="ew-custom-template"></div>
<template id="tpm_patient_an_registrationview">
<div id="ct_PatientAnRegistrationView"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: inherit;
	align-items: stretch;
	width: 100%;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}
::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where CoupleID='".$resultsA[0]["PatID"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["Female"] != '')
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$resultsA[0]["PatientId"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$results[0]["id"]."'; ";
$resultsVitalHistory = $dbhelper->ExecuteRows($sql);
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
$pageHeader = 'Stimulation Chart For ' . $resultsA[0]["ARTCYCLE"];
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
<?php echo $resultsVitalHistory[count($resultsVitalHistory)-1]["Chiefcomplaints"] ;?>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">AN Registration</h3>
			</div>
			<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_G"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_G"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_P"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_P"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_L"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_L"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_A"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_A"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_E"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_E"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_M"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_M"></slot></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_LMP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_LMP"></slot></span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_ETdate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ETdate"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_EDO"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_EDO"></slot></span>
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_MenstrualHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_MenstrualHistory"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_ObstetricHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ObstetricHistory"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofGDM"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofGDM"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistorofPIH"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistorofPIH"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofIUGR"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofIUGR"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofOligohydramnios"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofOligohydramnios"></slot></span>
				</td>
				<td>				
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PreviousHistoryofPreterm"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PreviousHistoryofPreterm"></slot></span>
				</td>
				<td>				
				</td>
				<td>					 
				</td>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">G</span></th>
		  		<th><span class="ew-cell">AN Complication</span></th>
		  		<th><span class="ew-cell">Delivery – ND/ LSCS Place of delivery</span></th>
		  		<th><span class="ew-cell">Baby Sex/ weight/ problems</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_G1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DeliveryNDLSCS1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_BabySexweight1"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_G2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DeliveryNDLSCS2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_BabySexweight2"></slot></span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">3</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_G3"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DeliveryNDLSCS3"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_BabySexweight3"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastMedicalHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastMedicalHistory"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastMedicalHistoryOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastMedicalHistoryOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastSurgicalHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastSurgicalHistory"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PastSurgicalHistoryOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PastSurgicalHistoryOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_FamilyHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_FamilyHistory"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_FamilyHistoryOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_FamilyHistoryOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
Scan :
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Scan Type</span></th>
		  		<th><span class="ew-cell">Done Date</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ViabilityDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ViabilityREPORT"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability2</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Viability2DATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Viability2REPORT"></slot></span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">NTscan</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NTscanDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NTscanREPORT"></slot></span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">EarlyTarget</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EarlyTargetDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EarlyTargetREPORT"></slot></span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Anomaly</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_AnomalyDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_AnomalyREPORT"></slot></span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Growth</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_GrowthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_GrowthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Growth1</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Growth1DATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_Growth1REPORT"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Investigation:
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Investigation Type</span></th>
		  		<th><span class="ew-cell">Done date</span></th>
		  		<th><span class="ew-cell">Inhouse / Outside Lab</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">AN Profile</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ANProfileDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ANProfileINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ANProfileREPORT"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Dual Marker</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DualMarkerDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DualMarkerINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_DualMarkerREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Quadruple Marker</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_QuadrupleDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_QuadrupleINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_QuadrupleREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">5 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A5monthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A5monthINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A5monthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">7 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A7monthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A7monthINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A7monthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">9 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A9monthDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A9monthINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_A9monthREPORT"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Inj Dexamethasone</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_INJDATE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_INJINHOUSE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_INJREPORT"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Present Pregnancy Complications :
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Bleeding"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Bleeding"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PresentPregnancyComplicationsOthers"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PresentPregnancyComplicationsOthers"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_PICMENumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_PICMENumber"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Outcome"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Outcome"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		 <tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_DateofAdmission"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_DateofAdmission"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_DateodProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_DateodProcedure"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Miscarriage"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Miscarriage"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_ModeOfDelivery"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ModeOfDelivery"></slot></span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">ND</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NDS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_NDP"></slot></span></td>
		</tr> 
		<tr>
				<td><span class="ew-cell">Vaccum D</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_VaccumS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_VaccumP"></slot></span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">Forceps D</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ForcepsS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ForcepsP"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Elective LSCS</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ElectiveS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_ElectiveP"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Emergency LSCS</span></td>		
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EmergencyS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpx_patient_an_registration_EmergencyP"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<slot class="ew-slot" name="tpc_patient_an_registration_Maturity"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Maturity"></slot>
<div class="card-body">
Paediatric : 
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Baby1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Baby1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_sex1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_sex1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_weight1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_weight1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_NICU1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_NICU1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Jaundice1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Jaundice1"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Others1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Others1"></slot></span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Baby2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Baby2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_sex2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_sex2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_weight2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_weight2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_NICU2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_NICU2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Jaundice2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Jaundice2"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_patient_an_registration_Others2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_Others2"></slot></span></td>
		</tr> 
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<slot class="ew-slot" name="tpc_patient_an_registration_SpillOverReasons"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_SpillOverReasons"></slot>
<slot class="ew-slot" name="tpc_patient_an_registration_ANClosed"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ANClosed"></slot>
<slot class="ew-slot" name="tpc_patient_an_registration_ANClosedDATE"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_an_registration_ANClosedDATE"></slot>
		</div>
	</div>
</div>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_an_registrationview", "tpm_patient_an_registrationview", "patient_an_registrationview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
