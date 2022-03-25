<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfTreatmentPlanView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_treatment_planview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_treatment_planview = currentForm = new ew.Form("fivf_treatment_planview", "view");
    loadjs.done("fivf_treatment_planview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_treatment_plan) ew.vars.tables.ivf_treatment_plan = <?= JsonEncode(GetClientVar("tables", "ivf_treatment_plan")) ?>;
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
<form name="fivf_treatment_planview" id="fivf_treatment_planview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_id"><template id="tpc_ivf_treatment_plan_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_id"><span id="el_ivf_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_RIDNO"><template id="tpc_ivf_treatment_plan_RIDNO"><?= $Page->RIDNO->caption() ?></template></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_RIDNO"><span id="el_ivf_treatment_plan_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Name"><template id="tpc_ivf_treatment_plan_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Name"><span id="el_ivf_treatment_plan_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
    <tr id="r_TreatmentStartDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TreatmentStartDate"><template id="tpc_ivf_treatment_plan_TreatmentStartDate"><?= $Page->TreatmentStartDate->caption() ?></template></span></td>
        <td data-name="TreatmentStartDate" <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TreatmentStartDate"><span id="el_ivf_treatment_plan_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Age"><template id="tpc_ivf_treatment_plan_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Age"><span id="el_ivf_treatment_plan_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <tr id="r_treatment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_treatment_status"><template id="tpc_ivf_treatment_plan_treatment_status"><?= $Page->treatment_status->caption() ?></template></span></td>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_treatment_status"><span id="el_ivf_treatment_plan_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <tr id="r_ARTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_ARTCYCLE"><template id="tpc_ivf_treatment_plan_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></template></span></td>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_ARTCYCLE"><span id="el_ivf_treatment_plan_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
    <tr id="r_IVFCycleNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_IVFCycleNO"><template id="tpc_ivf_treatment_plan_IVFCycleNO"><?= $Page->IVFCycleNO->caption() ?></template></span></td>
        <td data-name="IVFCycleNO" <?= $Page->IVFCycleNO->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_IVFCycleNO"><span id="el_ivf_treatment_plan_IVFCycleNO">
<span<?= $Page->IVFCycleNO->viewAttributes() ?>>
<?= $Page->IVFCycleNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <tr id="r_RESULT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_RESULT"><template id="tpc_ivf_treatment_plan_RESULT"><?= $Page->RESULT->caption() ?></template></span></td>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_RESULT"><span id="el_ivf_treatment_plan_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_status"><template id="tpc_ivf_treatment_plan_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_status"><span id="el_ivf_treatment_plan_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_createdby"><template id="tpc_ivf_treatment_plan_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_createdby"><span id="el_ivf_treatment_plan_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_createddatetime"><template id="tpc_ivf_treatment_plan_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_createddatetime"><span id="el_ivf_treatment_plan_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_modifiedby"><template id="tpc_ivf_treatment_plan_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_modifiedby"><span id="el_ivf_treatment_plan_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_modifieddatetime"><template id="tpc_ivf_treatment_plan_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_modifieddatetime"><span id="el_ivf_treatment_plan_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
    <tr id="r_TreatementStopDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TreatementStopDate"><template id="tpc_ivf_treatment_plan_TreatementStopDate"><?= $Page->TreatementStopDate->caption() ?></template></span></td>
        <td data-name="TreatementStopDate" <?= $Page->TreatementStopDate->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TreatementStopDate"><span id="el_ivf_treatment_plan_TreatementStopDate">
<span<?= $Page->TreatementStopDate->viewAttributes() ?>>
<?= $Page->TreatementStopDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
    <tr id="r_TypePatient">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TypePatient"><template id="tpc_ivf_treatment_plan_TypePatient"><?= $Page->TypePatient->caption() ?></template></span></td>
        <td data-name="TypePatient" <?= $Page->TypePatient->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TypePatient"><span id="el_ivf_treatment_plan_TypePatient">
<span<?= $Page->TypePatient->viewAttributes() ?>>
<?= $Page->TypePatient->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <tr id="r_Treatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Treatment"><template id="tpc_ivf_treatment_plan_Treatment"><?= $Page->Treatment->caption() ?></template></span></td>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Treatment"><span id="el_ivf_treatment_plan_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
    <tr id="r_TreatmentTec">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TreatmentTec"><template id="tpc_ivf_treatment_plan_TreatmentTec"><?= $Page->TreatmentTec->caption() ?></template></span></td>
        <td data-name="TreatmentTec" <?= $Page->TreatmentTec->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TreatmentTec"><span id="el_ivf_treatment_plan_TreatmentTec">
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
    <tr id="r_TypeOfCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TypeOfCycle"><template id="tpc_ivf_treatment_plan_TypeOfCycle"><?= $Page->TypeOfCycle->caption() ?></template></span></td>
        <td data-name="TypeOfCycle" <?= $Page->TypeOfCycle->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TypeOfCycle"><span id="el_ivf_treatment_plan_TypeOfCycle">
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
    <tr id="r_SpermOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_SpermOrgin"><template id="tpc_ivf_treatment_plan_SpermOrgin"><?= $Page->SpermOrgin->caption() ?></template></span></td>
        <td data-name="SpermOrgin" <?= $Page->SpermOrgin->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_SpermOrgin"><span id="el_ivf_treatment_plan_SpermOrgin">
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_State"><template id="tpc_ivf_treatment_plan_State"><?= $Page->State->caption() ?></template></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_State"><span id="el_ivf_treatment_plan_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <tr id="r_Origin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Origin"><template id="tpc_ivf_treatment_plan_Origin"><?= $Page->Origin->caption() ?></template></span></td>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Origin"><span id="el_ivf_treatment_plan_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <tr id="r_MACS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_MACS"><template id="tpc_ivf_treatment_plan_MACS"><?= $Page->MACS->caption() ?></template></span></td>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_MACS"><span id="el_ivf_treatment_plan_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
    <tr id="r_Technique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Technique"><template id="tpc_ivf_treatment_plan_Technique"><?= $Page->Technique->caption() ?></template></span></td>
        <td data-name="Technique" <?= $Page->Technique->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Technique"><span id="el_ivf_treatment_plan_Technique">
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
    <tr id="r_PgdPlanning">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PgdPlanning"><template id="tpc_ivf_treatment_plan_PgdPlanning"><?= $Page->PgdPlanning->caption() ?></template></span></td>
        <td data-name="PgdPlanning" <?= $Page->PgdPlanning->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_PgdPlanning"><span id="el_ivf_treatment_plan_PgdPlanning">
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
    <tr id="r_IMSI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_IMSI"><template id="tpc_ivf_treatment_plan_IMSI"><?= $Page->IMSI->caption() ?></template></span></td>
        <td data-name="IMSI" <?= $Page->IMSI->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_IMSI"><span id="el_ivf_treatment_plan_IMSI">
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
    <tr id="r_SequentialCulture">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_SequentialCulture"><template id="tpc_ivf_treatment_plan_SequentialCulture"><?= $Page->SequentialCulture->caption() ?></template></span></td>
        <td data-name="SequentialCulture" <?= $Page->SequentialCulture->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_SequentialCulture"><span id="el_ivf_treatment_plan_SequentialCulture">
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
    <tr id="r_TimeLapse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TimeLapse"><template id="tpc_ivf_treatment_plan_TimeLapse"><?= $Page->TimeLapse->caption() ?></template></span></td>
        <td data-name="TimeLapse" <?= $Page->TimeLapse->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TimeLapse"><span id="el_ivf_treatment_plan_TimeLapse">
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
    <tr id="r_AH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_AH"><template id="tpc_ivf_treatment_plan_AH"><?= $Page->AH->caption() ?></template></span></td>
        <td data-name="AH" <?= $Page->AH->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_AH"><span id="el_ivf_treatment_plan_AH">
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <tr id="r_Weight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Weight"><template id="tpc_ivf_treatment_plan_Weight"><?= $Page->Weight->caption() ?></template></span></td>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Weight"><span id="el_ivf_treatment_plan_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
    <tr id="r_BMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_BMI"><template id="tpc_ivf_treatment_plan_BMI"><?= $Page->BMI->caption() ?></template></span></td>
        <td data-name="BMI" <?= $Page->BMI->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_BMI"><span id="el_ivf_treatment_plan_BMI">
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
    <tr id="r_MaleIndications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_MaleIndications"><template id="tpc_ivf_treatment_plan_MaleIndications"><?= $Page->MaleIndications->caption() ?></template></span></td>
        <td data-name="MaleIndications" <?= $Page->MaleIndications->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_MaleIndications"><span id="el_ivf_treatment_plan_MaleIndications">
<span<?= $Page->MaleIndications->viewAttributes() ?>>
<?= $Page->MaleIndications->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
    <tr id="r_FemaleIndications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_FemaleIndications"><template id="tpc_ivf_treatment_plan_FemaleIndications"><?= $Page->FemaleIndications->caption() ?></template></span></td>
        <td data-name="FemaleIndications" <?= $Page->FemaleIndications->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_FemaleIndications"><span id="el_ivf_treatment_plan_FemaleIndications">
<span<?= $Page->FemaleIndications->viewAttributes() ?>>
<?= $Page->FemaleIndications->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
    <tr id="r_UseOfThe">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_UseOfThe"><template id="tpc_ivf_treatment_plan_UseOfThe"><?= $Page->UseOfThe->caption() ?></template></span></td>
        <td data-name="UseOfThe" <?= $Page->UseOfThe->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_UseOfThe"><span id="el_ivf_treatment_plan_UseOfThe">
<span<?= $Page->UseOfThe->viewAttributes() ?>>
<?= $Page->UseOfThe->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <tr id="r_Ectopic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Ectopic"><template id="tpc_ivf_treatment_plan_Ectopic"><?= $Page->Ectopic->caption() ?></template></span></td>
        <td data-name="Ectopic" <?= $Page->Ectopic->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Ectopic"><span id="el_ivf_treatment_plan_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
    <tr id="r_Heterotopic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Heterotopic"><template id="tpc_ivf_treatment_plan_Heterotopic"><?= $Page->Heterotopic->caption() ?></template></span></td>
        <td data-name="Heterotopic" <?= $Page->Heterotopic->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Heterotopic"><span id="el_ivf_treatment_plan_Heterotopic">
<span<?= $Page->Heterotopic->viewAttributes() ?>>
<?= $Page->Heterotopic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
    <tr id="r_TransferDFE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TransferDFE"><template id="tpc_ivf_treatment_plan_TransferDFE"><?= $Page->TransferDFE->caption() ?></template></span></td>
        <td data-name="TransferDFE" <?= $Page->TransferDFE->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TransferDFE"><span id="el_ivf_treatment_plan_TransferDFE">
<span<?= $Page->TransferDFE->viewAttributes() ?>>
<?= $Page->TransferDFE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
    <tr id="r_Evolutive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Evolutive"><template id="tpc_ivf_treatment_plan_Evolutive"><?= $Page->Evolutive->caption() ?></template></span></td>
        <td data-name="Evolutive" <?= $Page->Evolutive->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Evolutive"><span id="el_ivf_treatment_plan_Evolutive">
<span<?= $Page->Evolutive->viewAttributes() ?>>
<?= $Page->Evolutive->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
    <tr id="r_Number">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Number"><template id="tpc_ivf_treatment_plan_Number"><?= $Page->Number->caption() ?></template></span></td>
        <td data-name="Number" <?= $Page->Number->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_Number"><span id="el_ivf_treatment_plan_Number">
<span<?= $Page->Number->viewAttributes() ?>>
<?= $Page->Number->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
    <tr id="r_SequentialCult">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_SequentialCult"><template id="tpc_ivf_treatment_plan_SequentialCult"><?= $Page->SequentialCult->caption() ?></template></span></td>
        <td data-name="SequentialCult" <?= $Page->SequentialCult->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_SequentialCult"><span id="el_ivf_treatment_plan_SequentialCult">
<span<?= $Page->SequentialCult->viewAttributes() ?>>
<?= $Page->SequentialCult->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
    <tr id="r_TineLapse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TineLapse"><template id="tpc_ivf_treatment_plan_TineLapse"><?= $Page->TineLapse->caption() ?></template></span></td>
        <td data-name="TineLapse" <?= $Page->TineLapse->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_TineLapse"><span id="el_ivf_treatment_plan_TineLapse">
<span<?= $Page->TineLapse->viewAttributes() ?>>
<?= $Page->TineLapse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PatientName"><template id="tpc_ivf_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_PatientName"><span id="el_ivf_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PatientID"><template id="tpc_ivf_treatment_plan_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_PatientID"><span id="el_ivf_treatment_plan_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PartnerName"><template id="tpc_ivf_treatment_plan_PartnerName"><?= $Page->PartnerName->caption() ?></template></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_PartnerName"><span id="el_ivf_treatment_plan_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <tr id="r_PartnerID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PartnerID"><template id="tpc_ivf_treatment_plan_PartnerID"><?= $Page->PartnerID->caption() ?></template></span></td>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_PartnerID"><span id="el_ivf_treatment_plan_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <tr id="r_WifeCell">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_WifeCell"><template id="tpc_ivf_treatment_plan_WifeCell"><?= $Page->WifeCell->caption() ?></template></span></td>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_WifeCell"><span id="el_ivf_treatment_plan_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <tr id="r_HusbandCell">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_HusbandCell"><template id="tpc_ivf_treatment_plan_HusbandCell"><?= $Page->HusbandCell->caption() ?></template></span></td>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_HusbandCell"><span id="el_ivf_treatment_plan_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <tr id="r_CoupleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_CoupleID"><template id="tpc_ivf_treatment_plan_CoupleID"><?= $Page->CoupleID->caption() ?></template></span></td>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<template id="tpx_ivf_treatment_plan_CoupleID"><span id="el_ivf_treatment_plan_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_treatment_planview" class="ew-custom-template"></div>
<template id="tpm_ivf_treatment_planview">
<div id="ct_IvfTreatmentPlanView"><style>
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
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["id"] ;
$IVFid = $_GET["fk_id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
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
<?php
$Refferrr = getSRefer($results2[0]["id"]);
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr .'<br>';
}
?>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistory == false)
	{
		$$VitalsHistorywarn = "";
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$$VitalsHistorywarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
			{
				$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
					if($cid == $VitalsHistory[$x]["TidNo"])
					{
						$kk = 1;
						$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
				}
			}
		}else{
			$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//$ivfTreatmentwarnUrl = "treatment.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$ivfTreatmentwarnUrl ="ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";
	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' and TidNo='".$Page->id->CurrentValue."';";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
		if($ivfstimulationchart == false )
		{
		$ivfstimulationchartUrl =  "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid."&fk_Name=". $results[0]["Female"]."&fk_id=". $Page->id->CurrentValue."";
		}else{
			$ivfstimulationchartUrl =    "ivf_stimulation_chartview.php?showdetail=&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."&showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid."&fk_Name=". $results[0]["Female"]."&fk_id=". $Page->id->CurrentValue."";
		}
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_outcome where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' and TidNo='".$Page->id->CurrentValue."' ;";
	$ivfoutcome = $dbhelper->ExecuteRows($sql);
	$ivoutcomeRowCount = count($ivfoutcome);
	if($ivfoutcome == false){
		$ivfoutcomeurl =    "ivf_outcomeadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid. "&fk_Name=". $results[0]["Female"]. "&fk_id=". $Page->id->CurrentValue."";
		}else{
			$ivfoutcomeurl =    "ivf_outcomeview.php?showdetail=&id=".$ivfoutcome[$ivoutcomeRowCount-1]["id"]."&showmaster=ivf_treatment_plan&fk_RIDNO=". $IVFid. "&fk_Name=". $results[0]["Female"]. "&fk_id=". $Page->id->CurrentValue."";
	}
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfstimulationchartUrl; ?>">
				  <i class="fas fa-futbol-o"></i> Stimulation
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfoutcomeurl; ?>">
				  <i class="fas fa-cubes"></i> Out Come
				</a>
<?php
$IVFid = $_GET["id"] ;
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$results[0]["RIDNO"]."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	$cid = $IVFid;
	$IVFid = $results[0]["RIDNO"];
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
if($results[0]["ARTCYCLE"] == "IVF" || $results[0]["ARTCYCLE"] == "Intrauterine insemination(IUI)")
{
 echo '<a class="btn btn-app"  href="' .$ivfsemenanalysisreportUrl. '"><i class="fas fa-bullseye"></i> Sperm </a>' ;
}
$IVFid = $_GET["id"] ;
$summeryURL = "view_ivf_treatmentview.php?showdetail=&id=".$IVFid."&id1=".$IVFid."";
?>
				<a class="btn btn-app"  href="<?php echo $summeryURL; ?>">
				  <i class="fas fa-medkit"></i> Summary
				</a>
			  </div>
			  <!-- /.card-body -->
		</div>
</br>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Plan</h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td    style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_FemaleIndications"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_FemaleIndications"></slot></span>
						</td>
						<td   style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_MaleIndications"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_MaleIndications"></slot></span>
						</td>
					</tr>
	</tbody>
			</table>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_ARTCYCLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_ARTCYCLE"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Treatment</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td  id="Treatment"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Treatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Treatment"></slot></span>
						</td>
						<td  id="TreatmentTec" style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_TreatmentTec"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_TreatmentTec"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_TypeOfCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_TypeOfCycle"></slot></span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_SpermOrgin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_SpermOrgin"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_State"></slot></span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Origin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Origin"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_MACS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_MACS"></slot></span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Technique"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Technique"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_PgdPlanning"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_PgdPlanning"></slot></span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_IMSI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_IMSI"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_SequentialCulture"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_SequentialCulture"></slot></span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_TimeLapse"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_TimeLapse"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_AH"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_AH"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Weight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Weight"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="BMI"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_BMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_BMI"></slot></span>
						</td>
						<td id="aaa"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="Ectopic"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Ectopic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Ectopic"></slot></span>
						</td>
						<td id="use"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_UseOfThe"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_UseOfThe"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			<table class="ew-table" style="width:100%;">
					<tbody>
			  		<tr id="TreatmentTreatment">
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_TransferDFE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_TransferDFE"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Evolutive"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Evolutive"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Number"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Number"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_SequentialCult"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_SequentialCult"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_TineLapse"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_TineLapse"></slot></span>
						</td>
												<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_treatment_plan_Heterotopic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_treatment_plan_Heterotopic"></slot></span>
						</td>
					</tr>				
					</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php
    if (in_array("ivf_outcome", explode(",", $Page->getCurrentDetailTable())) && $ivf_outcome->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_outcome", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfOutcomeGrid.php" ?>
<?php } ?>
<?php
    if (in_array("ivf_stimulation_chart", explode(",", $Page->getCurrentDetailTable())) && $ivf_stimulation_chart->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_stimulation_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfStimulationChartGrid.php" ?>
<?php } ?>
<?php
    if (in_array("ivf_semenanalysisreport", explode(",", $Page->getCurrentDetailTable())) && $ivf_semenanalysisreport->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_semenanalysisreport", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfSemenanalysisreportGrid.php" ?>
<?php } ?>
<?php
    if (in_array("ivf_embryology_chart", explode(",", $Page->getCurrentDetailTable())) && $ivf_embryology_chart->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_embryology_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfEmbryologyChartGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_treatment_planview", "tpm_ivf_treatment_planview", "ivf_treatment_planview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    function callstumilation(){var e='ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=<?php  echo $IVFid; ?>&fk_Name=<?php echo $results[0]["Female"]; ?>&fk_id=<?php echo $Page->id->CurrentValue; ?>';location.href=e}function callsOutcome(){var e='ivf_outcomeadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=<?php  echo $IVFid; ?>&fk_Name=<?php echo $results[0]["Female"]; ?>&fk_id=<?php echo $Page->id->CurrentValue; ?>';location.href=e}
});
</script>
<?php } ?>
