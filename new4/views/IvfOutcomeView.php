<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOutcomeView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_outcomeview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_outcomeview = currentForm = new ew.Form("fivf_outcomeview", "view");
    loadjs.done("fivf_outcomeview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_outcome) ew.vars.tables.ivf_outcome = <?= JsonEncode(GetClientVar("tables", "ivf_outcome")) ?>;
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
<form name="fivf_outcomeview" id="fivf_outcomeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_id"><template id="tpc_ivf_outcome_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_outcome_id"><span id="el_ivf_outcome_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RIDNO"><template id="tpc_ivf_outcome_RIDNO"><?= $Page->RIDNO->caption() ?></template></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_ivf_outcome_RIDNO"><span id="el_ivf_outcome_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Name"><template id="tpc_ivf_outcome_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Name"><span id="el_ivf_outcome_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Age"><template id="tpc_ivf_outcome_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Age"><span id="el_ivf_outcome_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <tr id="r_treatment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_treatment_status"><template id="tpc_ivf_outcome_treatment_status"><?= $Page->treatment_status->caption() ?></template></span></td>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<template id="tpx_ivf_outcome_treatment_status"><span id="el_ivf_outcome_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <tr id="r_ARTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ARTCYCLE"><template id="tpc_ivf_outcome_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></template></span></td>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_outcome_ARTCYCLE"><span id="el_ivf_outcome_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <tr id="r_RESULT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_RESULT"><template id="tpc_ivf_outcome_RESULT"><?= $Page->RESULT->caption() ?></template></span></td>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx_ivf_outcome_RESULT"><span id="el_ivf_outcome_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_status"><template id="tpc_ivf_outcome_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ivf_outcome_status"><span id="el_ivf_outcome_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createdby"><template id="tpc_ivf_outcome_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_ivf_outcome_createdby"><span id="el_ivf_outcome_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_createddatetime"><template id="tpc_ivf_outcome_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_ivf_outcome_createddatetime"><span id="el_ivf_outcome_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifiedby"><template id="tpc_ivf_outcome_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_ivf_outcome_modifiedby"><span id="el_ivf_outcome_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_modifieddatetime"><template id="tpc_ivf_outcome_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_ivf_outcome_modifieddatetime"><span id="el_ivf_outcome_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
    <tr id="r_outcomeDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDate"><template id="tpc_ivf_outcome_outcomeDate"><?= $Page->outcomeDate->caption() ?></template></span></td>
        <td data-name="outcomeDate" <?= $Page->outcomeDate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_outcomeDate"><span id="el_ivf_outcome_outcomeDate">
<span<?= $Page->outcomeDate->viewAttributes() ?>>
<?= $Page->outcomeDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
    <tr id="r_outcomeDay">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_outcomeDay"><template id="tpc_ivf_outcome_outcomeDay"><?= $Page->outcomeDay->caption() ?></template></span></td>
        <td data-name="outcomeDay" <?= $Page->outcomeDay->cellAttributes() ?>>
<template id="tpx_ivf_outcome_outcomeDay"><span id="el_ivf_outcome_outcomeDay">
<span<?= $Page->outcomeDay->viewAttributes() ?>>
<?= $Page->outcomeDay->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
    <tr id="r_OPResult">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_OPResult"><template id="tpc_ivf_outcome_OPResult"><?= $Page->OPResult->caption() ?></template></span></td>
        <td data-name="OPResult" <?= $Page->OPResult->cellAttributes() ?>>
<template id="tpx_ivf_outcome_OPResult"><span id="el_ivf_outcome_OPResult">
<span<?= $Page->OPResult->viewAttributes() ?>>
<?= $Page->OPResult->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
    <tr id="r_Gestation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Gestation"><template id="tpc_ivf_outcome_Gestation"><?= $Page->Gestation->caption() ?></template></span></td>
        <td data-name="Gestation" <?= $Page->Gestation->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Gestation"><span id="el_ivf_outcome_Gestation">
<span<?= $Page->Gestation->viewAttributes() ?>>
<?= $Page->Gestation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
    <tr id="r_TransferdEmbryos">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TransferdEmbryos"><template id="tpc_ivf_outcome_TransferdEmbryos"><?= $Page->TransferdEmbryos->caption() ?></template></span></td>
        <td data-name="TransferdEmbryos" <?= $Page->TransferdEmbryos->cellAttributes() ?>>
<template id="tpx_ivf_outcome_TransferdEmbryos"><span id="el_ivf_outcome_TransferdEmbryos">
<span<?= $Page->TransferdEmbryos->viewAttributes() ?>>
<?= $Page->TransferdEmbryos->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
    <tr id="r_InitalOfSacs">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_InitalOfSacs"><template id="tpc_ivf_outcome_InitalOfSacs"><?= $Page->InitalOfSacs->caption() ?></template></span></td>
        <td data-name="InitalOfSacs" <?= $Page->InitalOfSacs->cellAttributes() ?>>
<template id="tpx_ivf_outcome_InitalOfSacs"><span id="el_ivf_outcome_InitalOfSacs">
<span<?= $Page->InitalOfSacs->viewAttributes() ?>>
<?= $Page->InitalOfSacs->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
    <tr id="r_ImplimentationRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ImplimentationRate"><template id="tpc_ivf_outcome_ImplimentationRate"><?= $Page->ImplimentationRate->caption() ?></template></span></td>
        <td data-name="ImplimentationRate" <?= $Page->ImplimentationRate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_ImplimentationRate"><span id="el_ivf_outcome_ImplimentationRate">
<span<?= $Page->ImplimentationRate->viewAttributes() ?>>
<?= $Page->ImplimentationRate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <tr id="r_EmbryoNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_EmbryoNo"><template id="tpc_ivf_outcome_EmbryoNo"><?= $Page->EmbryoNo->caption() ?></template></span></td>
        <td data-name="EmbryoNo" <?= $Page->EmbryoNo->cellAttributes() ?>>
<template id="tpx_ivf_outcome_EmbryoNo"><span id="el_ivf_outcome_EmbryoNo">
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
    <tr id="r_ExtrauterineSac">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_ExtrauterineSac"><template id="tpc_ivf_outcome_ExtrauterineSac"><?= $Page->ExtrauterineSac->caption() ?></template></span></td>
        <td data-name="ExtrauterineSac" <?= $Page->ExtrauterineSac->cellAttributes() ?>>
<template id="tpx_ivf_outcome_ExtrauterineSac"><span id="el_ivf_outcome_ExtrauterineSac">
<span<?= $Page->ExtrauterineSac->viewAttributes() ?>>
<?= $Page->ExtrauterineSac->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
    <tr id="r_PregnancyMonozygotic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PregnancyMonozygotic"><template id="tpc_ivf_outcome_PregnancyMonozygotic"><?= $Page->PregnancyMonozygotic->caption() ?></template></span></td>
        <td data-name="PregnancyMonozygotic" <?= $Page->PregnancyMonozygotic->cellAttributes() ?>>
<template id="tpx_ivf_outcome_PregnancyMonozygotic"><span id="el_ivf_outcome_PregnancyMonozygotic">
<span<?= $Page->PregnancyMonozygotic->viewAttributes() ?>>
<?= $Page->PregnancyMonozygotic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
    <tr id="r_TypeGestation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TypeGestation"><template id="tpc_ivf_outcome_TypeGestation"><?= $Page->TypeGestation->caption() ?></template></span></td>
        <td data-name="TypeGestation" <?= $Page->TypeGestation->cellAttributes() ?>>
<template id="tpx_ivf_outcome_TypeGestation"><span id="el_ivf_outcome_TypeGestation">
<span<?= $Page->TypeGestation->viewAttributes() ?>>
<?= $Page->TypeGestation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
    <tr id="r_Urine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Urine"><template id="tpc_ivf_outcome_Urine"><?= $Page->Urine->caption() ?></template></span></td>
        <td data-name="Urine" <?= $Page->Urine->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Urine"><span id="el_ivf_outcome_Urine">
<span<?= $Page->Urine->viewAttributes() ?>>
<?= $Page->Urine->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
    <tr id="r_PTdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_PTdate"><template id="tpc_ivf_outcome_PTdate"><?= $Page->PTdate->caption() ?></template></span></td>
        <td data-name="PTdate" <?= $Page->PTdate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_PTdate"><span id="el_ivf_outcome_PTdate">
<span<?= $Page->PTdate->viewAttributes() ?>>
<?= $Page->PTdate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
    <tr id="r_Reduced">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Reduced"><template id="tpc_ivf_outcome_Reduced"><?= $Page->Reduced->caption() ?></template></span></td>
        <td data-name="Reduced" <?= $Page->Reduced->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Reduced"><span id="el_ivf_outcome_Reduced">
<span<?= $Page->Reduced->viewAttributes() ?>>
<?= $Page->Reduced->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
    <tr id="r_INduced">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INduced"><template id="tpc_ivf_outcome_INduced"><?= $Page->INduced->caption() ?></template></span></td>
        <td data-name="INduced" <?= $Page->INduced->cellAttributes() ?>>
<template id="tpx_ivf_outcome_INduced"><span id="el_ivf_outcome_INduced">
<span<?= $Page->INduced->viewAttributes() ?>>
<?= $Page->INduced->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
    <tr id="r_INducedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_INducedDate"><template id="tpc_ivf_outcome_INducedDate"><?= $Page->INducedDate->caption() ?></template></span></td>
        <td data-name="INducedDate" <?= $Page->INducedDate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_INducedDate"><span id="el_ivf_outcome_INducedDate">
<span<?= $Page->INducedDate->viewAttributes() ?>>
<?= $Page->INducedDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <tr id="r_Miscarriage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Miscarriage"><template id="tpc_ivf_outcome_Miscarriage"><?= $Page->Miscarriage->caption() ?></template></span></td>
        <td data-name="Miscarriage" <?= $Page->Miscarriage->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Miscarriage"><span id="el_ivf_outcome_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
    <tr id="r_Induced1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Induced1"><template id="tpc_ivf_outcome_Induced1"><?= $Page->Induced1->caption() ?></template></span></td>
        <td data-name="Induced1" <?= $Page->Induced1->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Induced1"><span id="el_ivf_outcome_Induced1">
<span<?= $Page->Induced1->viewAttributes() ?>>
<?= $Page->Induced1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <tr id="r_Type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Type"><template id="tpc_ivf_outcome_Type"><?= $Page->Type->caption() ?></template></span></td>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Type"><span id="el_ivf_outcome_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
    <tr id="r_IfClinical">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_IfClinical"><template id="tpc_ivf_outcome_IfClinical"><?= $Page->IfClinical->caption() ?></template></span></td>
        <td data-name="IfClinical" <?= $Page->IfClinical->cellAttributes() ?>>
<template id="tpx_ivf_outcome_IfClinical"><span id="el_ivf_outcome_IfClinical">
<span<?= $Page->IfClinical->viewAttributes() ?>>
<?= $Page->IfClinical->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
    <tr id="r_GADate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GADate"><template id="tpc_ivf_outcome_GADate"><?= $Page->GADate->caption() ?></template></span></td>
        <td data-name="GADate" <?= $Page->GADate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_GADate"><span id="el_ivf_outcome_GADate">
<span<?= $Page->GADate->viewAttributes() ?>>
<?= $Page->GADate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
    <tr id="r_GA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_GA"><template id="tpc_ivf_outcome_GA"><?= $Page->GA->caption() ?></template></span></td>
        <td data-name="GA" <?= $Page->GA->cellAttributes() ?>>
<template id="tpx_ivf_outcome_GA"><span id="el_ivf_outcome_GA">
<span<?= $Page->GA->viewAttributes() ?>>
<?= $Page->GA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
    <tr id="r_FoetalDeath">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FoetalDeath"><template id="tpc_ivf_outcome_FoetalDeath"><?= $Page->FoetalDeath->caption() ?></template></span></td>
        <td data-name="FoetalDeath" <?= $Page->FoetalDeath->cellAttributes() ?>>
<template id="tpx_ivf_outcome_FoetalDeath"><span id="el_ivf_outcome_FoetalDeath">
<span<?= $Page->FoetalDeath->viewAttributes() ?>>
<?= $Page->FoetalDeath->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
    <tr id="r_FerinatalDeath">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_FerinatalDeath"><template id="tpc_ivf_outcome_FerinatalDeath"><?= $Page->FerinatalDeath->caption() ?></template></span></td>
        <td data-name="FerinatalDeath" <?= $Page->FerinatalDeath->cellAttributes() ?>>
<template id="tpx_ivf_outcome_FerinatalDeath"><span id="el_ivf_outcome_FerinatalDeath">
<span<?= $Page->FerinatalDeath->viewAttributes() ?>>
<?= $Page->FerinatalDeath->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_TidNo"><template id="tpc_ivf_outcome_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_outcome_TidNo"><span id="el_ivf_outcome_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <tr id="r_Ectopic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Ectopic"><template id="tpc_ivf_outcome_Ectopic"><?= $Page->Ectopic->caption() ?></template></span></td>
        <td data-name="Ectopic" <?= $Page->Ectopic->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Ectopic"><span id="el_ivf_outcome_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
    <tr id="r_Extra">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Extra"><template id="tpc_ivf_outcome_Extra"><?= $Page->Extra->caption() ?></template></span></td>
        <td data-name="Extra" <?= $Page->Extra->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Extra"><span id="el_ivf_outcome_Extra">
<span<?= $Page->Extra->viewAttributes() ?>>
<?= $Page->Extra->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Implantation->Visible) { // Implantation ?>
    <tr id="r_Implantation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Implantation"><template id="tpc_ivf_outcome_Implantation"><?= $Page->Implantation->caption() ?></template></span></td>
        <td data-name="Implantation" <?= $Page->Implantation->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Implantation"><span id="el_ivf_outcome_Implantation">
<span<?= $Page->Implantation->viewAttributes() ?>>
<?= $Page->Implantation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryDate->Visible) { // DeliveryDate ?>
    <tr id="r_DeliveryDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_DeliveryDate"><template id="tpc_ivf_outcome_DeliveryDate"><?= $Page->DeliveryDate->caption() ?></template></span></td>
        <td data-name="DeliveryDate" <?= $Page->DeliveryDate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_DeliveryDate"><span id="el_ivf_outcome_DeliveryDate">
<span<?= $Page->DeliveryDate->viewAttributes() ?>>
<?= $Page->DeliveryDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BabyDetails->Visible) { // BabyDetails ?>
    <tr id="r_BabyDetails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_BabyDetails"><template id="tpc_ivf_outcome_BabyDetails"><?= $Page->BabyDetails->caption() ?></template></span></td>
        <td data-name="BabyDetails" <?= $Page->BabyDetails->cellAttributes() ?>>
<template id="tpx_ivf_outcome_BabyDetails"><span id="el_ivf_outcome_BabyDetails">
<span<?= $Page->BabyDetails->viewAttributes() ?>>
<?= $Page->BabyDetails->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LSCSNormal->Visible) { // LSCSNormal ?>
    <tr id="r_LSCSNormal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_LSCSNormal"><template id="tpc_ivf_outcome_LSCSNormal"><?= $Page->LSCSNormal->caption() ?></template></span></td>
        <td data-name="LSCSNormal" <?= $Page->LSCSNormal->cellAttributes() ?>>
<template id="tpx_ivf_outcome_LSCSNormal"><span id="el_ivf_outcome_LSCSNormal">
<span<?= $Page->LSCSNormal->viewAttributes() ?>>
<?= $Page->LSCSNormal->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <tr id="r_Notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_outcome_Notes"><template id="tpc_ivf_outcome_Notes"><?= $Page->Notes->caption() ?></template></span></td>
        <td data-name="Notes" <?= $Page->Notes->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Notes"><span id="el_ivf_outcome_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_outcomeview" class="ew-custom-template"></div>
<template id="tpm_ivf_outcomeview">
<div id="ct_IvfOutcomeView"><style>
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
$Tid = $_GET["fk_RIDNO"];//
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$Tid."'; ";
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
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
</br>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Out Come</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_outcomeDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_outcomeDate"></slot></span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_outcomeDay"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_outcomeDay"></slot></span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_OPResult"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_OPResult"></slot></span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Gestation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Gestation"></slot></span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Ectopic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Ectopic"></slot></span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Extra"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Extra"></slot></span>
						</td>
					</tr>
										<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_InitalOfSacs"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_InitalOfSacs"></slot></span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_ImplimentationRate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_ImplimentationRate"></slot></span>
						</td>
					</tr>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Miscarriage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Miscarriage"></slot></span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Induced1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Induced1"></slot></span>
						</td>
					</tr>
 					<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Type"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Type"></slot></span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_GADate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_GADate"></slot></span>
						</td>
					</tr>
															<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_GA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_GA"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Urine"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Urine"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_PTdate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_PTdate"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_outcomeview", "tpm_ivf_outcomeview", "ivf_outcomeview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
