<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIvfTreatmentView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ivf_treatmentview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_ivf_treatmentview = currentForm = new ew.Form("fview_ivf_treatmentview", "view");
    loadjs.done("fview_ivf_treatmentview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_ivf_treatment) ew.vars.tables.view_ivf_treatment = <?= JsonEncode(GetClientVar("tables", "view_ivf_treatment")) ?>;
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
<form name="fview_ivf_treatmentview" id="fview_ivf_treatmentview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_id"><template id="tpc_view_ivf_treatment_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_id"><span id="el_view_ivf_treatment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_RIDNO"><template id="tpc_view_ivf_treatment_RIDNO"><?= $Page->RIDNO->caption() ?></template></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_RIDNO"><span id="el_view_ivf_treatment_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Name"><template id="tpc_view_ivf_treatment_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Name"><span id="el_view_ivf_treatment_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Age"><template id="tpc_view_ivf_treatment_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Age"><span id="el_view_ivf_treatment_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <tr id="r_treatment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_treatment_status"><template id="tpc_view_ivf_treatment_treatment_status"><?= $Page->treatment_status->caption() ?></template></span></td>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_treatment_status"><span id="el_view_ivf_treatment_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <tr id="r_ARTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ARTCYCLE"><template id="tpc_view_ivf_treatment_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></template></span></td>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_ARTCYCLE"><span id="el_view_ivf_treatment_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <tr id="r_RESULT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_RESULT"><template id="tpc_view_ivf_treatment_RESULT"><?= $Page->RESULT->caption() ?></template></span></td>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_RESULT"><span id="el_view_ivf_treatment_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_status"><template id="tpc_view_ivf_treatment_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_status"><span id="el_view_ivf_treatment_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_createdby"><template id="tpc_view_ivf_treatment_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_createdby"><span id="el_view_ivf_treatment_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_createddatetime"><template id="tpc_view_ivf_treatment_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_createddatetime"><span id="el_view_ivf_treatment_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_modifiedby"><template id="tpc_view_ivf_treatment_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_modifiedby"><span id="el_view_ivf_treatment_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_modifieddatetime"><template id="tpc_view_ivf_treatment_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_modifieddatetime"><span id="el_view_ivf_treatment_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
    <tr id="r_TreatmentStartDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TreatmentStartDate"><template id="tpc_view_ivf_treatment_TreatmentStartDate"><?= $Page->TreatmentStartDate->caption() ?></template></span></td>
        <td data-name="TreatmentStartDate" <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_TreatmentStartDate"><span id="el_view_ivf_treatment_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
    <tr id="r_TreatementStopDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TreatementStopDate"><template id="tpc_view_ivf_treatment_TreatementStopDate"><?= $Page->TreatementStopDate->caption() ?></template></span></td>
        <td data-name="TreatementStopDate" <?= $Page->TreatementStopDate->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_TreatementStopDate"><span id="el_view_ivf_treatment_TreatementStopDate">
<span<?= $Page->TreatementStopDate->viewAttributes() ?>>
<?= $Page->TreatementStopDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
    <tr id="r_TypePatient">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TypePatient"><template id="tpc_view_ivf_treatment_TypePatient"><?= $Page->TypePatient->caption() ?></template></span></td>
        <td data-name="TypePatient" <?= $Page->TypePatient->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_TypePatient"><span id="el_view_ivf_treatment_TypePatient">
<span<?= $Page->TypePatient->viewAttributes() ?>>
<?= $Page->TypePatient->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <tr id="r_Treatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Treatment"><template id="tpc_view_ivf_treatment_Treatment"><?= $Page->Treatment->caption() ?></template></span></td>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Treatment"><span id="el_view_ivf_treatment_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
    <tr id="r_TreatmentTec">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TreatmentTec"><template id="tpc_view_ivf_treatment_TreatmentTec"><?= $Page->TreatmentTec->caption() ?></template></span></td>
        <td data-name="TreatmentTec" <?= $Page->TreatmentTec->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_TreatmentTec"><span id="el_view_ivf_treatment_TreatmentTec">
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
    <tr id="r_TypeOfCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TypeOfCycle"><template id="tpc_view_ivf_treatment_TypeOfCycle"><?= $Page->TypeOfCycle->caption() ?></template></span></td>
        <td data-name="TypeOfCycle" <?= $Page->TypeOfCycle->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_TypeOfCycle"><span id="el_view_ivf_treatment_TypeOfCycle">
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
    <tr id="r_SpermOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_SpermOrgin"><template id="tpc_view_ivf_treatment_SpermOrgin"><?= $Page->SpermOrgin->caption() ?></template></span></td>
        <td data-name="SpermOrgin" <?= $Page->SpermOrgin->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_SpermOrgin"><span id="el_view_ivf_treatment_SpermOrgin">
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_State"><template id="tpc_view_ivf_treatment_State"><?= $Page->State->caption() ?></template></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_State"><span id="el_view_ivf_treatment_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <tr id="r_Origin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Origin"><template id="tpc_view_ivf_treatment_Origin"><?= $Page->Origin->caption() ?></template></span></td>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Origin"><span id="el_view_ivf_treatment_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <tr id="r_MACS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_MACS"><template id="tpc_view_ivf_treatment_MACS"><?= $Page->MACS->caption() ?></template></span></td>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_MACS"><span id="el_view_ivf_treatment_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
    <tr id="r_Technique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Technique"><template id="tpc_view_ivf_treatment_Technique"><?= $Page->Technique->caption() ?></template></span></td>
        <td data-name="Technique" <?= $Page->Technique->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Technique"><span id="el_view_ivf_treatment_Technique">
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
    <tr id="r_PgdPlanning">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_PgdPlanning"><template id="tpc_view_ivf_treatment_PgdPlanning"><?= $Page->PgdPlanning->caption() ?></template></span></td>
        <td data-name="PgdPlanning" <?= $Page->PgdPlanning->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_PgdPlanning"><span id="el_view_ivf_treatment_PgdPlanning">
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
    <tr id="r_IMSI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_IMSI"><template id="tpc_view_ivf_treatment_IMSI"><?= $Page->IMSI->caption() ?></template></span></td>
        <td data-name="IMSI" <?= $Page->IMSI->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_IMSI"><span id="el_view_ivf_treatment_IMSI">
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
    <tr id="r_SequentialCulture">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_SequentialCulture"><template id="tpc_view_ivf_treatment_SequentialCulture"><?= $Page->SequentialCulture->caption() ?></template></span></td>
        <td data-name="SequentialCulture" <?= $Page->SequentialCulture->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_SequentialCulture"><span id="el_view_ivf_treatment_SequentialCulture">
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
    <tr id="r_TimeLapse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_TimeLapse"><template id="tpc_view_ivf_treatment_TimeLapse"><?= $Page->TimeLapse->caption() ?></template></span></td>
        <td data-name="TimeLapse" <?= $Page->TimeLapse->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_TimeLapse"><span id="el_view_ivf_treatment_TimeLapse">
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
    <tr id="r_AH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_AH"><template id="tpc_view_ivf_treatment_AH"><?= $Page->AH->caption() ?></template></span></td>
        <td data-name="AH" <?= $Page->AH->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_AH"><span id="el_view_ivf_treatment_AH">
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <tr id="r_Weight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Weight"><template id="tpc_view_ivf_treatment_Weight"><?= $Page->Weight->caption() ?></template></span></td>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Weight"><span id="el_view_ivf_treatment_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
    <tr id="r_BMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_BMI"><template id="tpc_view_ivf_treatment_BMI"><?= $Page->BMI->caption() ?></template></span></td>
        <td data-name="BMI" <?= $Page->BMI->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_BMI"><span id="el_view_ivf_treatment_BMI">
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status1->Visible) { // status1 ?>
    <tr id="r_status1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_status1"><template id="tpc_view_ivf_treatment_status1"><?= $Page->status1->caption() ?></template></span></td>
        <td data-name="status1" <?= $Page->status1->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_status1"><span id="el_view_ivf_treatment_status1">
<span<?= $Page->status1->viewAttributes() ?>>
<?= $Page->status1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id1->Visible) { // id1 ?>
    <tr id="r_id1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_id1"><template id="tpc_view_ivf_treatment_id1"><?= $Page->id1->caption() ?></template></span></td>
        <td data-name="id1" <?= $Page->id1->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_id1"><span id="el_view_ivf_treatment_id1">
<span<?= $Page->id1->viewAttributes() ?>>
<?= $Page->id1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
    <tr id="r_Male">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Male"><template id="tpc_view_ivf_treatment_Male"><?= $Page->Male->caption() ?></template></span></td>
        <td data-name="Male" <?= $Page->Male->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Male"><span id="el_view_ivf_treatment_Male">
<span<?= $Page->Male->viewAttributes() ?>>
<?= $Page->Male->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
    <tr id="r_Female">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_Female"><template id="tpc_view_ivf_treatment_Female"><?= $Page->Female->caption() ?></template></span></td>
        <td data-name="Female" <?= $Page->Female->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_Female"><span id="el_view_ivf_treatment_Female">
<span<?= $Page->Female->viewAttributes() ?>>
<?= $Page->Female->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
    <tr id="r_malepropic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_malepropic"><template id="tpc_view_ivf_treatment_malepropic"><?= $Page->malepropic->caption() ?></template></span></td>
        <td data-name="malepropic" <?= $Page->malepropic->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_malepropic"><span id="el_view_ivf_treatment_malepropic">
<span>
<?= GetFileViewTag($Page->malepropic, $Page->malepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
    <tr id="r_femalepropic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_femalepropic"><template id="tpc_view_ivf_treatment_femalepropic"><?= $Page->femalepropic->caption() ?></template></span></td>
        <td data-name="femalepropic" <?= $Page->femalepropic->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_femalepropic"><span id="el_view_ivf_treatment_femalepropic">
<span>
<?= GetFileViewTag($Page->femalepropic, $Page->femalepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
    <tr id="r_HusbandEducation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_HusbandEducation"><template id="tpc_view_ivf_treatment_HusbandEducation"><?= $Page->HusbandEducation->caption() ?></template></span></td>
        <td data-name="HusbandEducation" <?= $Page->HusbandEducation->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_HusbandEducation"><span id="el_view_ivf_treatment_HusbandEducation">
<span<?= $Page->HusbandEducation->viewAttributes() ?>>
<?= $Page->HusbandEducation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
    <tr id="r_WifeEducation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_WifeEducation"><template id="tpc_view_ivf_treatment_WifeEducation"><?= $Page->WifeEducation->caption() ?></template></span></td>
        <td data-name="WifeEducation" <?= $Page->WifeEducation->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_WifeEducation"><span id="el_view_ivf_treatment_WifeEducation">
<span<?= $Page->WifeEducation->viewAttributes() ?>>
<?= $Page->WifeEducation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
    <tr id="r_HusbandWorkHours">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_HusbandWorkHours"><template id="tpc_view_ivf_treatment_HusbandWorkHours"><?= $Page->HusbandWorkHours->caption() ?></template></span></td>
        <td data-name="HusbandWorkHours" <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_HusbandWorkHours"><span id="el_view_ivf_treatment_HusbandWorkHours">
<span<?= $Page->HusbandWorkHours->viewAttributes() ?>>
<?= $Page->HusbandWorkHours->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
    <tr id="r_WifeWorkHours">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_WifeWorkHours"><template id="tpc_view_ivf_treatment_WifeWorkHours"><?= $Page->WifeWorkHours->caption() ?></template></span></td>
        <td data-name="WifeWorkHours" <?= $Page->WifeWorkHours->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_WifeWorkHours"><span id="el_view_ivf_treatment_WifeWorkHours">
<span<?= $Page->WifeWorkHours->viewAttributes() ?>>
<?= $Page->WifeWorkHours->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
    <tr id="r_PatientLanguage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_PatientLanguage"><template id="tpc_view_ivf_treatment_PatientLanguage"><?= $Page->PatientLanguage->caption() ?></template></span></td>
        <td data-name="PatientLanguage" <?= $Page->PatientLanguage->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_PatientLanguage"><span id="el_view_ivf_treatment_PatientLanguage">
<span<?= $Page->PatientLanguage->viewAttributes() ?>>
<?= $Page->PatientLanguage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
    <tr id="r_ReferedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ReferedBy"><template id="tpc_view_ivf_treatment_ReferedBy"><?= $Page->ReferedBy->caption() ?></template></span></td>
        <td data-name="ReferedBy" <?= $Page->ReferedBy->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_ReferedBy"><span id="el_view_ivf_treatment_ReferedBy">
<span<?= $Page->ReferedBy->viewAttributes() ?>>
<?= $Page->ReferedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
    <tr id="r_ReferPhNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ReferPhNo"><template id="tpc_view_ivf_treatment_ReferPhNo"><?= $Page->ReferPhNo->caption() ?></template></span></td>
        <td data-name="ReferPhNo" <?= $Page->ReferPhNo->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_ReferPhNo"><span id="el_view_ivf_treatment_ReferPhNo">
<span<?= $Page->ReferPhNo->viewAttributes() ?>>
<?= $Page->ReferPhNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
    <tr id="r_ARTCYCLE1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_ARTCYCLE1"><template id="tpc_view_ivf_treatment_ARTCYCLE1"><?= $Page->ARTCYCLE1->caption() ?></template></span></td>
        <td data-name="ARTCYCLE1" <?= $Page->ARTCYCLE1->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_ARTCYCLE1"><span id="el_view_ivf_treatment_ARTCYCLE1">
<span<?= $Page->ARTCYCLE1->viewAttributes() ?>>
<?= $Page->ARTCYCLE1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RESULT1->Visible) { // RESULT1 ?>
    <tr id="r_RESULT1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_RESULT1"><template id="tpc_view_ivf_treatment_RESULT1"><?= $Page->RESULT1->caption() ?></template></span></td>
        <td data-name="RESULT1" <?= $Page->RESULT1->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_RESULT1"><span id="el_view_ivf_treatment_RESULT1">
<span<?= $Page->RESULT1->viewAttributes() ?>>
<?= $Page->RESULT1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <tr id="r_CoupleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_CoupleID"><template id="tpc_view_ivf_treatment_CoupleID"><?= $Page->CoupleID->caption() ?></template></span></td>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_CoupleID"><span id="el_view_ivf_treatment_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_ivf_treatment_HospID"><template id="tpc_view_ivf_treatment_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_HospID"><span id="el_view_ivf_treatment_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_ivf_treatmentview" class="ew-custom-template"></div>
<template id="tpm_view_ivf_treatmentview">
<div id="ct_ViewIvfTreatmentView"><style>
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
$cid = $_GET["id"] ;
$IVFid = $_GET["id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$IVFid = $results[0]["RIDNO"];
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNO"]."'; ";
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
 $aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
?>	
<div style="width:100%">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		<td style="width:50%;">
			Couple ID : <?php echo $results[0]["CoupleID"]; ?>
			</td>
			<td  style="float:right;">
			<img src='<?php echo $aa; ?>' alt style="border: 0;">
			</td>
		 </tr>		 
	</tbody>
</table>
<div class="row">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		<td style="width:50%;">
<div class="col-md-12">
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
</td>
<td>
<div class="col-md-12">
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
</td>
		 </tr>		 
	</tbody>
</table>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
			<td style="width:50%;">
<?php
$ConsDoctor = $results[0]["Doctor"];
if($ConsDoctor != '')
{
	echo 'Consultant Name : ' . $ConsDoctor .'';
}
?>
</td>
		<td style="width:50%;">
<?php
$Refferrr = $results2[0]["ReferedByDr"];
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr .'';
}
?>
</td>
		 </tr>		 
	</tbody>
</table>
<?php
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$embryosql = "select * FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."';";
$embryoRst = $dbhelper->ExecuteRows($embryosql);
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$oocytesql = "select * FROM ganeshkumar_bjhims.ivf_oocytedenudation where  TidNo ='".$cid."';";
$oocyteRst = $dbhelper->ExecuteRows($oocytesql);
$ETDatesqlICSiIVFDateTime = "select * FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."'  and ICSiIVFDateTime is not null;";
$ETDateRstICSiIVFDateTime = $dbhelper->ExecuteRows($ETDatesqlICSiIVFDateTime);
$ETDateEEICSiIVFDateTime  = $ETDateRstICSiIVFDateTime[0]["ICSiIVFDateTime"];
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">CHARACTERSTICS OF CYCLE</h3>
			</div>
			<div class="card-body">
<div class="row">
<table class="ew-table" style="width:50%;">
	 <tbody>
		<tr>
				<td  style="width:30%">ART Cycle</td>
				<td>:</td>
				<td>{{: ARTCYCLE }}</td>
		 </tr>
		 <tr>
		 		<td>Insemination Technique </td>
				<td>:</td>
				<td>{{: TreatmentTec }}</td>
		 </tr>
		 <tr>
		 	<td>Oocyte Origin</td>
			<td>:</td>
			<td><?php if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor"){ echo 'Donor' ; }else { echo $oocyteRst[0]["OocyteOrgin"];} ?></td>
		</tr>
<?php
if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor" || $oocyteRst[0]["OocyteOrgin"] == "Donor")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$oocyteRst[0]["donor"]."'; ";
$donors2 = $dbhelper->ExecuteRows($sql);
echo '<tr><td>Donor Age </td><td>:</td><td>'.$donors2[0]["Age"].'</td></tr>';
}
?>
	</tbody>
</table>
<table class="ew-table" style="width:50%;">
	 <tbody>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
echo 		'<tr>
				<td  style="width:30%">Sperm Origin </td>
				<td>:</td>
				 <td>'.$Page->SpermOrgin->CurrentValue.'</td>
		 </tr>';
}
?>		 
		 <tr>
		 <?php
if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor" || $oocyteRst[0]["OocyteOrgin"] == "Donor")
{
 echo '<td>Date of Oocyte Pick Up</td>';
}else{
 echo '<td>Date of Insemination</td>';
}
		 ?>
				<td>:</td>
				<td><?php  if($ETDateEEICSiIVFDateTime != null){ echo date("d-m-Y", strtotime($ETDateEEICSiIVFDateTime)); }; ?></td>
		 </tr>
<?php
if($oocyteRst[0]["OocyteOrgin"] == "Self+Donor" || $oocyteRst[0]["OocyteOrgin"] == "Donor")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$oocyteRst[0]["donor"]."'; ";
$donors2 = $dbhelper->ExecuteRows($sql);
echo '<tr><td>Donor Blood Group </td><td>:</td><td>'.$donors2[0]["blood_group"].'</td></tr>';
}
?>
	</tbody>
</table>
</div>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<?php
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$oocytesql = "select * FROM ganeshkumar_bjhims.ivf_oocytedenudation where  TidNo ='".$cid."';";
$oocyteRst = $dbhelper->ExecuteRows($oocytesql);
$curl = $_GET['curl'];
$ocyteStagesql = "SELECT Day0OocyteStage, count(Day0OocyteStage) as CountMIIStage FROM ganeshkumar_bjhims.ivf_embryology_chart  where TidNo='".$cid."' and DidNO='".$curl."' group by Day0OocyteStage;";
$ocyteStageRst = $dbhelper->ExecuteRows($ocyteStagesql);
$NoOfMI = 0;
$NoOfMII = 0;
$NoOfGV = 0;
$NoOfOthers = 0;
$length = count($ocyteStageRst);
for ($i = 0; $i < $length; $i++) {
  if( $ocyteStageRst[$i]["Day0OocyteStage"] == "MI")
  {
  		$NoOfMI = $ocyteStageRst[$i]["CountMIIStage"];
  }
	if( $ocyteStageRst[$i]["Day0OocyteStage"] == "MII")
  {
  		$NoOfMII = $ocyteStageRst[$i]["CountMIIStage"];
  }
	if( $ocyteStageRst[$i]["Day0OocyteStage"] == "GV")
  {
  		$NoOfGV = $ocyteStageRst[$i]["CountMIIStage"];
  }
	if( $ocyteStageRst[$i]["Day0OocyteStage"] == "Others")
  {
  		$NoOfOthers = $ocyteStageRst[$i]["CountMIIStage"];
  }
}
$ocyteDay1PNsql = "SELECT  count(Day1PN) as Day1PN  FROM ganeshkumar_bjhims.ivf_embryology_chart  where TidNo='".$cid."' and Day1PN = '2' ;";
$ocyteDay1PNt = $dbhelper->ExecuteRows($ocyteDay1PNsql);
$oDay1PNPNt = $ocyteDay1PNt[0]["Day1PN"];
?>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
echo '
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">FOLLICULAR RETRIEVAL</h3>
			</div>
			<div class="card-body">
<div class="row">
<table   class="" style="width:50%;">
	<tbody>
		<tr>'; 
	if(($oocyteRst[0]["OocyteOrgin"] == "Self+Donor") || ($oocyteRst[0]["OocyteOrgin"] == "Donor"))
			{
			echo 	'<td style="width:40%">Oocyte Received </td><td>:</td><td>'. $oocyteRst[0]["ExpFollicles"].'</td>';
			} else
			{
 echo 	'<td style="width:40%">Exp Follicles</td><td>:</td><td>'. $oocyteRst[0]["ExpFollicles"].'</td>';
			}
	echo	'</tr>
		<tr>
			<td style="width:40%">No. Of Oocytes Retrived</td>
			<td>:</td>
			<td>'. $oocyteRst[0]["NoOfOocytes"].'</td>
		</tr>
		 <tr>
			<td style="width:40%">No. Of MIIs</td>
			<td>:</td>
			<td>'. $NoOfMII.'</td>
		</tr>
		<tr>
			<td style="width:40%">No. of Fertilized</td>
			<td>:</td>
			<td>'. $oDay1PNPNt.'</td>
		</tr>
	</tbody>
</table>
<table   class="" style="width:50%;">
	<tbody>
		<tr>
			<td style="width:40%">No Of MIs</td>
			<td>:</td>
			<td>'. $NoOfMI.'</td>
		</tr>
		<tr>
			<td style="width:40%">No Of GV</td>
			<td>:</td>
			<td>'. $NoOfGV.'</td>
		</tr>
		 <tr>
			<td style="width:40%">Others</td>
			<td>:</td>
			<td>'. $NoOfOthers.'</td>
		</tr>
	</tbody>
</table>
	</div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>';
}
?>
<?php
 $rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$semenanasql = "select * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where  TidNo ='".$cid."';";
$semRst = $dbhelper->ExecuteRows($semenanasql);
?>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
echo '
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Sperm</h3>
			</div>
	<div class="card-body">
			<table  class="table table-striped ew-table ew-export-table"  align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Origin</td>
			<td>:</td>
			<td>'. $semRst[0]["SemenOrgin"].'</td>
		</tr>
		<tr>
			<td style="width:40%">Status</td>
			<td>:</td>
				<td>'. $semRst[0]["RequestSample"].'</td>
		</tr>
		<tr>
			<td style="width:40%">Sperm Date</td>
			<td>:</td>
				<td>'. date("d-m-Y", strtotime($semRst[0]["CollectionDate"])).'</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>';
}
?>
<?php
if($Page->ARTCYCLE->CurrentValue != "Frozen Embryo Transfer")
{
$Errty = '
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spermiogram</h3>
			</div>
			<div class="card-body">
<table id="capacitationTable"   class="table table-striped ew-table ew-export-table"  align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
<thead id="capacitationTableHead">
		<tr style="background-color:#707B7C;color:white;">
			<td></td>
			<td></td>
			<td id="PreCapacitation">Pre Capacitation</td>';
				if($semRst[0]["Volume1"] != '')
				{
					$Errty .=  '<td id="PostCapacitation">Post Capacitation</td>';
				}
				if($semRst[0]["Volume2"] != '')
				{
					$Errty .=  '<td id="MaxCapacitation">MACS Capacitation</td>';
				}
		$Errty .= 	'<td></td>
		</tr>
</thead>
	<tbody>
		<tr>
			<td>Volume (ml)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["Volume"].'</td>';
				if($semRst[0]["Volume1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Volume1"].'</td>';
				}
				if($semRst[0]["Volume2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Volume2"].'</td>';
				}
		$Errty .= 	'<td>&gt;=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["Concentration"].'</td>';
				if($semRst[0]["Concentration1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Concentration1"].'</td>';
				}
				if($semRst[0]["Concentration2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Concentration2"].'</td>';
				}
		$Errty .= 	'<td>&gt;= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
			<td>:</td>';
				$Errty .=  '<td>'.number_format($semRst[0]["Total"],2).'</td>';
				if($semRst[0]["Total1"] != '')
				{
					$Errty .=  '<td>'. number_format($semRst[0]["Total1"],2).'</td>';
				}
				if($semRst[0]["Total2"] != '')
				{
					$Errty .=  '<td>'.number_format($semRst[0]["Total2"],2).'</td>';
				}
		$Errty .= 	'<td>&gt;=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["ProgressiveMotility"].'</td>';
				if($semRst[0]["ProgressiveMotility1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["ProgressiveMotility1"].'</td>';
				}
				if($semRst[0]["ProgressiveMotility2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["ProgressiveMotility2"].'</td>';
				}
		$Errty .= 	'<td>&gt;=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["NonProgrssiveMotile"].'</td>';
				if($semRst[0]["NonProgrssiveMotile1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["NonProgrssiveMotile1"].'</td>';
				}
				if($semRst[0]["NonProgrssiveMotile2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["NonProgrssiveMotile2"].'</td>';
				}
			$Errty .= '<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["Immotile"].'</td>';
				if($semRst[0]["Immotile1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Immotile1"].'</td>';
				}
				if($semRst[0]["Immotile2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["Immotile2"].'</td>';
				}
		$Errty .= 	'<td></td>
		</tr>
		<tr>
			<td>Total Motility (%)</td>
			<td>:</td>';
				$Errty .=  '<td>'.$semRst[0]["TotalProgrssiveMotile"].'</td>';
				if($semRst[0]["TotalProgrssiveMotile1"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["TotalProgrssiveMotile1"].'</td>';
				}
				if($semRst[0]["TotalProgrssiveMotile2"] != '')
				{
					$Errty .=  '<td>'.$semRst[0]["TotalProgrssiveMotile2"].'</td>';
				}
			$Errty .= '<td>&gt;=40% PR+NP</td>
		</tr>
	</tbody>
</table>
			</div>
		</div>				
	</div>
</div>';
echo $Errty;
}
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
$ETDatesql = "select * FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."'  and ETDate is not null;";
$ETDateRst = $dbhelper->ExecuteRows($ETDatesql);
$ETDateEE  = $ETDateRst[0]["ETDate"];
$TransferredCountsql = "select count(*) as TransferredCount FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."' and EndingState = 'Transferred';";
$TransferredCountRst = $dbhelper->ExecuteRows($TransferredCountsql);
$TransferredCount  = $TransferredCountRst[0]["TransferredCount"];
$FrozenCountsql = "select count(*) as TransferredCount FROM ganeshkumar_bjhims.ivf_embryology_chart where  TidNo ='".$cid."' and EndingState = 'Frozen';";
$FrozenCountRst = $dbhelper->ExecuteRows($FrozenCountsql);
$FrozenCount  = $FrozenCountRst[0]["TransferredCount"];
$ObserveCountsql = "SELECT count(*) as ObserveCount FROM ganeshkumar_bjhims.ivf_embryology_chart where TidNo='".$cid."'  and Day5Grade = 'Observe';";
$ObserveCountRst = $dbhelper->ExecuteRows($ObserveCountsql);
$ObserveCount  = $ObserveCountRst[0]["ObserveCount"];
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Summary of Embryo transfer( ET)</h3>
			</div>
			<div class="card-body">
<div class="row">
<table class="ew-table" style="width:50%;">
	 <tbody>
		<tr>
				<td  style="width:30%">Date of ET</td>
				<td>:</td>
				<td><?php  if($ETDateEE != null){ echo date("d-m-Y", strtotime($ETDateEE));} else {echo 'No Transfer';}; ?></td>
		 </tr>
  		  <tr>
  		  		<td></td>
				<td></td>
				<td></td>
		 </tr>
	</tbody>
</table>
<table class="ew-table" style="width:50%;">
	 <tbody>
		<tr>
				<td  style="width:50%">Number of Embryos Transferred</td>
				<td>:</td>
				 <td><?php echo $TransferredCount; ?></td>
		 </tr>
		 <tr>
				<td>Embryos Remaining</td>
				<td>:</td>
				 <td><?php echo $FrozenCount; ?></td>
		 </tr>
<?php
$curl = $_GET['curl'];
$ocyteStagesql = "SELECT * FROM ganeshkumar_bjhims.ivf_embryology_chart  where TidNo='".$cid."' and DidNO='".$curl."'  and thawET='ET';";
$ocyteStageRst = $dbhelper->ExecuteRows($ocyteStagesql);
$rrOPR = "";
$length = count($ocyteStageRst);
for ($i = 0; $i < $length; $i++) {
	if($rrOPR != "")
	{
	   $rrOPR = $rrOPR . ', ';
	}
	$rrOPR = $rrOPR . $ocyteStageRst[$i]["Day0OocyteStage"];
}
	if($rrOPR != "")
	{
	   echo 	 '<tr><td>Day of Transfer </td><td>:</td><td>'. $rrOPR .'</td></tr>';
	}
?>
	</tbody>
</table>
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
				<h3 class="card-title">Embryo Development Summary</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<tbody>
		<tr>
				<td style="width:16%">
					<span class="ew-cell">Embryo N0</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Day</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Cell Stage</span>
				</td>
				<td style="width:16%">
					<span class="ew-cell">Embryo Origin</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Grade</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">State</span>
				</td>
		 </tr>
<?php
$rowhtml = "";
$dbhelper = &DbHelper();
$cid = $_GET["id"] ;
if($Page->ARTCYCLE->CurrentValue == "Frozen Embryo Transfer")
{
$sql = "select Day0sino,EndingDay,EndingCellStage,Day0SpOrgin,EndingGrade,thawET as EndingState  FROM ganeshkumar_bjhims.ivf_embryology_chart where Day0OocyteStage in ('MII','MI') and EndingState in ('Frozen','Transferred')  and thawET in ('Re Frozen','ET')  and  TidNo ='".$cid."';";
}else{
$sql = "select Day0sino,EndingDay,EndingCellStage,Day0SpOrgin,EndingGrade,EndingState FROM ganeshkumar_bjhims.ivf_embryology_chart where Day0OocyteStage in ('MII','MI') and EndingState in ('Frozen','Transferred') and  TidNo ='".$cid."';";
}
$resultst = $dbhelper->ExecuteRows($sql);
if($resultst != false)
{
	$$resultstRowCount = count($resultst);
			for ($x = 0; $x < $$resultstRowCount; $x++) {
			$rowhtml .=	'<tr><td><span class="ew-cell">'.$resultst[$x]["Day0sino"].'</span></td><td><span class="ew-cell">'.$resultst[$x]["EndingDay"].'</span></td><td><span class="ew-cell">'.$resultst[$x]["EndingCellStage"].'</span></td><td><span class="ew-cell">'.$resultst[$x]["Day0SpOrgin"].'</span></td> <td><span class="ew-cell">'.$resultst[$x]["EndingGrade"].'</span></td> <td><span class="ew-cell">'.$resultst[$x]["EndingState"].'</span></td></tr>';
			}
}
echo $rowhtml;
?>		 
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:33%">
					<span class="ew-cell">Legend Cell Stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell"></span>
				</td>
					<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">cleavage stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Day 3 embryos</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">BL : Blastocyst</span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">CM : Compacting Morula</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">CB : Cavitated Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">XB : Expanded Blastocyst</span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell">iHB : Hatching Blastocyst</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">HB : Hatched Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">EB : Early Blastocyst</span>
				 </td>
		 </tr>
	</tbody>
</table>
<?php
$tt = "ewbarcode.php?data=".$Page->RIDNO->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
<br><br><br><br>
<br><br><br><br>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell">Embryologist Signature</span>
				 </td>
				 <td>
					<span class="ew-cell">Consultants Signature</span>
				</td>
		 </tr>	 
	</tbody>
</table>
</div>
</div>
</template>
<?php
    if (in_array("ivf_semenanalysisreport", explode(",", $Page->getCurrentDetailTable())) && $ivf_semenanalysisreport->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_semenanalysisreport", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfSemenanalysisreportGrid.php" ?>
<?php } ?>
<?php
    if (in_array("ivf_oocytedenudation", explode(",", $Page->getCurrentDetailTable())) && $ivf_oocytedenudation->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_oocytedenudation", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfOocytedenudationGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_ivf_treatmentview", "tpm_view_ivf_treatmentview", "view_ivf_treatmentview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
