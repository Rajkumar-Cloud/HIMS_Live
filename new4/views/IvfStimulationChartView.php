<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfStimulationChartView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_stimulation_chartview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_stimulation_chartview = currentForm = new ew.Form("fivf_stimulation_chartview", "view");
    loadjs.done("fivf_stimulation_chartview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_stimulation_chart) ew.vars.tables.ivf_stimulation_chart = <?= JsonEncode(GetClientVar("tables", "ivf_stimulation_chart")) ?>;
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
<form name="fivf_stimulation_chartview" id="fivf_stimulation_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_id"><template id="tpc_ivf_stimulation_chart_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_id"><span id="el_ivf_stimulation_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RIDNo"><template id="tpc_ivf_stimulation_chart_RIDNo"><?= $Page->RIDNo->caption() ?></template></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RIDNo"><span id="el_ivf_stimulation_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Name"><template id="tpc_ivf_stimulation_chart_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Name"><span id="el_ivf_stimulation_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ARTCycle"><template id="tpc_ivf_stimulation_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></template></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ARTCycle"><span id="el_ivf_stimulation_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
    <tr id="r_FemaleFactor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FemaleFactor"><template id="tpc_ivf_stimulation_chart_FemaleFactor"><?= $Page->FemaleFactor->caption() ?></template></span></td>
        <td data-name="FemaleFactor" <?= $Page->FemaleFactor->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FemaleFactor"><span id="el_ivf_stimulation_chart_FemaleFactor">
<span<?= $Page->FemaleFactor->viewAttributes() ?>>
<?= $Page->FemaleFactor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
    <tr id="r_MaleFactor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MaleFactor"><template id="tpc_ivf_stimulation_chart_MaleFactor"><?= $Page->MaleFactor->caption() ?></template></span></td>
        <td data-name="MaleFactor" <?= $Page->MaleFactor->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_MaleFactor"><span id="el_ivf_stimulation_chart_MaleFactor">
<span<?= $Page->MaleFactor->viewAttributes() ?>>
<?= $Page->MaleFactor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <tr id="r_Protocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Protocol"><template id="tpc_ivf_stimulation_chart_Protocol"><?= $Page->Protocol->caption() ?></template></span></td>
        <td data-name="Protocol" <?= $Page->Protocol->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Protocol"><span id="el_ivf_stimulation_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
    <tr id="r_SemenFrozen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SemenFrozen"><template id="tpc_ivf_stimulation_chart_SemenFrozen"><?= $Page->SemenFrozen->caption() ?></template></span></td>
        <td data-name="SemenFrozen" <?= $Page->SemenFrozen->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SemenFrozen"><span id="el_ivf_stimulation_chart_SemenFrozen">
<span<?= $Page->SemenFrozen->viewAttributes() ?>>
<?= $Page->SemenFrozen->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
    <tr id="r_A4ICSICycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_A4ICSICycle"><template id="tpc_ivf_stimulation_chart_A4ICSICycle"><?= $Page->A4ICSICycle->caption() ?></template></span></td>
        <td data-name="A4ICSICycle" <?= $Page->A4ICSICycle->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_A4ICSICycle"><span id="el_ivf_stimulation_chart_A4ICSICycle">
<span<?= $Page->A4ICSICycle->viewAttributes() ?>>
<?= $Page->A4ICSICycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
    <tr id="r_TotalICSICycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TotalICSICycle"><template id="tpc_ivf_stimulation_chart_TotalICSICycle"><?= $Page->TotalICSICycle->caption() ?></template></span></td>
        <td data-name="TotalICSICycle" <?= $Page->TotalICSICycle->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TotalICSICycle"><span id="el_ivf_stimulation_chart_TotalICSICycle">
<span<?= $Page->TotalICSICycle->viewAttributes() ?>>
<?= $Page->TotalICSICycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
    <tr id="r_TypeOfInfertility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TypeOfInfertility"><template id="tpc_ivf_stimulation_chart_TypeOfInfertility"><?= $Page->TypeOfInfertility->caption() ?></template></span></td>
        <td data-name="TypeOfInfertility" <?= $Page->TypeOfInfertility->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TypeOfInfertility"><span id="el_ivf_stimulation_chart_TypeOfInfertility">
<span<?= $Page->TypeOfInfertility->viewAttributes() ?>>
<?= $Page->TypeOfInfertility->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <tr id="r_Duration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Duration"><template id="tpc_ivf_stimulation_chart_Duration"><?= $Page->Duration->caption() ?></template></span></td>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Duration"><span id="el_ivf_stimulation_chart_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <tr id="r_LMP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LMP"><template id="tpc_ivf_stimulation_chart_LMP"><?= $Page->LMP->caption() ?></template></span></td>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_LMP"><span id="el_ivf_stimulation_chart_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
    <tr id="r_RelevantHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RelevantHistory"><template id="tpc_ivf_stimulation_chart_RelevantHistory"><?= $Page->RelevantHistory->caption() ?></template></span></td>
        <td data-name="RelevantHistory" <?= $Page->RelevantHistory->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RelevantHistory"><span id="el_ivf_stimulation_chart_RelevantHistory">
<span<?= $Page->RelevantHistory->viewAttributes() ?>>
<?= $Page->RelevantHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
    <tr id="r_IUICycles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IUICycles"><template id="tpc_ivf_stimulation_chart_IUICycles"><?= $Page->IUICycles->caption() ?></template></span></td>
        <td data-name="IUICycles" <?= $Page->IUICycles->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_IUICycles"><span id="el_ivf_stimulation_chart_IUICycles">
<span<?= $Page->IUICycles->viewAttributes() ?>>
<?= $Page->IUICycles->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
    <tr id="r_AFC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AFC"><template id="tpc_ivf_stimulation_chart_AFC"><?= $Page->AFC->caption() ?></template></span></td>
        <td data-name="AFC" <?= $Page->AFC->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_AFC"><span id="el_ivf_stimulation_chart_AFC">
<span<?= $Page->AFC->viewAttributes() ?>>
<?= $Page->AFC->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
    <tr id="r_AMH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AMH"><template id="tpc_ivf_stimulation_chart_AMH"><?= $Page->AMH->caption() ?></template></span></td>
        <td data-name="AMH" <?= $Page->AMH->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_AMH"><span id="el_ivf_stimulation_chart_AMH">
<span<?= $Page->AMH->viewAttributes() ?>>
<?= $Page->AMH->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <tr id="r_FBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FBMI"><template id="tpc_ivf_stimulation_chart_FBMI"><?= $Page->FBMI->caption() ?></template></span></td>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FBMI"><span id="el_ivf_stimulation_chart_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <tr id="r_MBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MBMI"><template id="tpc_ivf_stimulation_chart_MBMI"><?= $Page->MBMI->caption() ?></template></span></td>
        <td data-name="MBMI" <?= $Page->MBMI->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_MBMI"><span id="el_ivf_stimulation_chart_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
    <tr id="r_OvarianVolumeRT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeRT"><template id="tpc_ivf_stimulation_chart_OvarianVolumeRT"><?= $Page->OvarianVolumeRT->caption() ?></template></span></td>
        <td data-name="OvarianVolumeRT" <?= $Page->OvarianVolumeRT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OvarianVolumeRT"><span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<span<?= $Page->OvarianVolumeRT->viewAttributes() ?>>
<?= $Page->OvarianVolumeRT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
    <tr id="r_OvarianVolumeLT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeLT"><template id="tpc_ivf_stimulation_chart_OvarianVolumeLT"><?= $Page->OvarianVolumeLT->caption() ?></template></span></td>
        <td data-name="OvarianVolumeLT" <?= $Page->OvarianVolumeLT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OvarianVolumeLT"><span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<span<?= $Page->OvarianVolumeLT->viewAttributes() ?>>
<?= $Page->OvarianVolumeLT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
    <tr id="r_DAYSOFSTIMULATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION"><template id="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION"><?= $Page->DAYSOFSTIMULATION->caption() ?></template></span></td>
        <td data-name="DAYSOFSTIMULATION" <?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION"><span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?= $Page->DAYSOFSTIMULATION->viewAttributes() ?>>
<?= $Page->DAYSOFSTIMULATION->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
    <tr id="r_DOSEOFGONADOTROPINS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><template id="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><?= $Page->DOSEOFGONADOTROPINS->caption() ?></template></span></td>
        <td data-name="DOSEOFGONADOTROPINS" <?= $Page->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?= $Page->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?= $Page->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
    <tr id="r_INJTYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_INJTYPE"><template id="tpc_ivf_stimulation_chart_INJTYPE"><?= $Page->INJTYPE->caption() ?></template></span></td>
        <td data-name="INJTYPE" <?= $Page->INJTYPE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_INJTYPE"><span id="el_ivf_stimulation_chart_INJTYPE">
<span<?= $Page->INJTYPE->viewAttributes() ?>>
<?= $Page->INJTYPE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
    <tr id="r_ANTAGONISTDAYS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTDAYS"><template id="tpc_ivf_stimulation_chart_ANTAGONISTDAYS"><?= $Page->ANTAGONISTDAYS->caption() ?></template></span></td>
        <td data-name="ANTAGONISTDAYS" <?= $Page->ANTAGONISTDAYS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ANTAGONISTDAYS"><span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?= $Page->ANTAGONISTDAYS->viewAttributes() ?>>
<?= $Page->ANTAGONISTDAYS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
    <tr id="r_ANTAGONISTSTARTDAY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><template id="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><?= $Page->ANTAGONISTSTARTDAY->caption() ?></template></span></td>
        <td data-name="ANTAGONISTSTARTDAY" <?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?= $Page->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?= $Page->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
    <tr id="r_GROWTHHORMONE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GROWTHHORMONE"><template id="tpc_ivf_stimulation_chart_GROWTHHORMONE"><?= $Page->GROWTHHORMONE->caption() ?></template></span></td>
        <td data-name="GROWTHHORMONE" <?= $Page->GROWTHHORMONE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GROWTHHORMONE"><span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<span<?= $Page->GROWTHHORMONE->viewAttributes() ?>>
<?= $Page->GROWTHHORMONE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
    <tr id="r_PRETREATMENT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PRETREATMENT"><template id="tpc_ivf_stimulation_chart_PRETREATMENT"><?= $Page->PRETREATMENT->caption() ?></template></span></td>
        <td data-name="PRETREATMENT" <?= $Page->PRETREATMENT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PRETREATMENT"><span id="el_ivf_stimulation_chart_PRETREATMENT">
<span<?= $Page->PRETREATMENT->viewAttributes() ?>>
<?= $Page->PRETREATMENT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <tr id="r_SerumP4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SerumP4"><template id="tpc_ivf_stimulation_chart_SerumP4"><?= $Page->SerumP4->caption() ?></template></span></td>
        <td data-name="SerumP4" <?= $Page->SerumP4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SerumP4"><span id="el_ivf_stimulation_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <tr id="r_FORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FORT"><template id="tpc_ivf_stimulation_chart_FORT"><?= $Page->FORT->caption() ?></template></span></td>
        <td data-name="FORT" <?= $Page->FORT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FORT"><span id="el_ivf_stimulation_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
    <tr id="r_MedicalFactors">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MedicalFactors"><template id="tpc_ivf_stimulation_chart_MedicalFactors"><?= $Page->MedicalFactors->caption() ?></template></span></td>
        <td data-name="MedicalFactors" <?= $Page->MedicalFactors->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_MedicalFactors"><span id="el_ivf_stimulation_chart_MedicalFactors">
<span<?= $Page->MedicalFactors->viewAttributes() ?>>
<?= $Page->MedicalFactors->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
    <tr id="r_SCDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SCDate"><template id="tpc_ivf_stimulation_chart_SCDate"><?= $Page->SCDate->caption() ?></template></span></td>
        <td data-name="SCDate" <?= $Page->SCDate->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SCDate"><span id="el_ivf_stimulation_chart_SCDate">
<span<?= $Page->SCDate->viewAttributes() ?>>
<?= $Page->SCDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
    <tr id="r_OvarianSurgery">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianSurgery"><template id="tpc_ivf_stimulation_chart_OvarianSurgery"><?= $Page->OvarianSurgery->caption() ?></template></span></td>
        <td data-name="OvarianSurgery" <?= $Page->OvarianSurgery->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OvarianSurgery"><span id="el_ivf_stimulation_chart_OvarianSurgery">
<span<?= $Page->OvarianSurgery->viewAttributes() ?>>
<?= $Page->OvarianSurgery->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
    <tr id="r_PreProcedureOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PreProcedureOrder"><template id="tpc_ivf_stimulation_chart_PreProcedureOrder"><?= $Page->PreProcedureOrder->caption() ?></template></span></td>
        <td data-name="PreProcedureOrder" <?= $Page->PreProcedureOrder->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PreProcedureOrder"><span id="el_ivf_stimulation_chart_PreProcedureOrder">
<span<?= $Page->PreProcedureOrder->viewAttributes() ?>>
<?= $Page->PreProcedureOrder->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
    <tr id="r_TRIGGERR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERR"><template id="tpc_ivf_stimulation_chart_TRIGGERR"><?= $Page->TRIGGERR->caption() ?></template></span></td>
        <td data-name="TRIGGERR" <?= $Page->TRIGGERR->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TRIGGERR"><span id="el_ivf_stimulation_chart_TRIGGERR">
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
    <tr id="r_TRIGGERDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERDATE"><template id="tpc_ivf_stimulation_chart_TRIGGERDATE"><?= $Page->TRIGGERDATE->caption() ?></template></span></td>
        <td data-name="TRIGGERDATE" <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TRIGGERDATE"><span id="el_ivf_stimulation_chart_TRIGGERDATE">
<span<?= $Page->TRIGGERDATE->viewAttributes() ?>>
<?= $Page->TRIGGERDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
    <tr id="r_ATHOMEorCLINIC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ATHOMEorCLINIC"><template id="tpc_ivf_stimulation_chart_ATHOMEorCLINIC"><?= $Page->ATHOMEorCLINIC->caption() ?></template></span></td>
        <td data-name="ATHOMEorCLINIC" <?= $Page->ATHOMEorCLINIC->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ATHOMEorCLINIC"><span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?= $Page->ATHOMEorCLINIC->viewAttributes() ?>>
<?= $Page->ATHOMEorCLINIC->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
    <tr id="r_OPUDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OPUDATE"><template id="tpc_ivf_stimulation_chart_OPUDATE"><?= $Page->OPUDATE->caption() ?></template></span></td>
        <td data-name="OPUDATE" <?= $Page->OPUDATE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OPUDATE"><span id="el_ivf_stimulation_chart_OPUDATE">
<span<?= $Page->OPUDATE->viewAttributes() ?>>
<?= $Page->OPUDATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
    <tr id="r_ALLFREEZEINDICATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION"><template id="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION"><?= $Page->ALLFREEZEINDICATION->caption() ?></template></span></td>
        <td data-name="ALLFREEZEINDICATION" <?= $Page->ALLFREEZEINDICATION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION"><span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?= $Page->ALLFREEZEINDICATION->viewAttributes() ?>>
<?= $Page->ALLFREEZEINDICATION->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <tr id="r_ERA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ERA"><template id="tpc_ivf_stimulation_chart_ERA"><?= $Page->ERA->caption() ?></template></span></td>
        <td data-name="ERA" <?= $Page->ERA->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ERA"><span id="el_ivf_stimulation_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
    <tr id="r_PGTA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGTA"><template id="tpc_ivf_stimulation_chart_PGTA"><?= $Page->PGTA->caption() ?></template></span></td>
        <td data-name="PGTA" <?= $Page->PGTA->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PGTA"><span id="el_ivf_stimulation_chart_PGTA">
<span<?= $Page->PGTA->viewAttributes() ?>>
<?= $Page->PGTA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
    <tr id="r_PGD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGD"><template id="tpc_ivf_stimulation_chart_PGD"><?= $Page->PGD->caption() ?></template></span></td>
        <td data-name="PGD" <?= $Page->PGD->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PGD"><span id="el_ivf_stimulation_chart_PGD">
<span<?= $Page->PGD->viewAttributes() ?>>
<?= $Page->PGD->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
    <tr id="r_DATEOFET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATEOFET"><template id="tpc_ivf_stimulation_chart_DATEOFET"><?= $Page->DATEOFET->caption() ?></template></span></td>
        <td data-name="DATEOFET" <?= $Page->DATEOFET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DATEOFET"><span id="el_ivf_stimulation_chart_DATEOFET">
<span<?= $Page->DATEOFET->viewAttributes() ?>>
<?= $Page->DATEOFET->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
    <tr id="r_ET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ET"><template id="tpc_ivf_stimulation_chart_ET"><?= $Page->ET->caption() ?></template></span></td>
        <td data-name="ET" <?= $Page->ET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ET"><span id="el_ivf_stimulation_chart_ET">
<span<?= $Page->ET->viewAttributes() ?>>
<?= $Page->ET->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
    <tr id="r_ESET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ESET"><template id="tpc_ivf_stimulation_chart_ESET"><?= $Page->ESET->caption() ?></template></span></td>
        <td data-name="ESET" <?= $Page->ESET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ESET"><span id="el_ivf_stimulation_chart_ESET">
<span<?= $Page->ESET->viewAttributes() ?>>
<?= $Page->ESET->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
    <tr id="r_DOET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOET"><template id="tpc_ivf_stimulation_chart_DOET"><?= $Page->DOET->caption() ?></template></span></td>
        <td data-name="DOET" <?= $Page->DOET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DOET"><span id="el_ivf_stimulation_chart_DOET">
<span<?= $Page->DOET->viewAttributes() ?>>
<?= $Page->DOET->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
    <tr id="r_SEMENPREPARATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEMENPREPARATION"><template id="tpc_ivf_stimulation_chart_SEMENPREPARATION"><?= $Page->SEMENPREPARATION->caption() ?></template></span></td>
        <td data-name="SEMENPREPARATION" <?= $Page->SEMENPREPARATION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SEMENPREPARATION"><span id="el_ivf_stimulation_chart_SEMENPREPARATION">
<span<?= $Page->SEMENPREPARATION->viewAttributes() ?>>
<?= $Page->SEMENPREPARATION->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
    <tr id="r_REASONFORESET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_REASONFORESET"><template id="tpc_ivf_stimulation_chart_REASONFORESET"><?= $Page->REASONFORESET->caption() ?></template></span></td>
        <td data-name="REASONFORESET" <?= $Page->REASONFORESET->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_REASONFORESET"><span id="el_ivf_stimulation_chart_REASONFORESET">
<span<?= $Page->REASONFORESET->viewAttributes() ?>>
<?= $Page->REASONFORESET->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
    <tr id="r_Expectedoocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Expectedoocytes"><template id="tpc_ivf_stimulation_chart_Expectedoocytes"><?= $Page->Expectedoocytes->caption() ?></template></span></td>
        <td data-name="Expectedoocytes" <?= $Page->Expectedoocytes->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Expectedoocytes"><span id="el_ivf_stimulation_chart_Expectedoocytes">
<span<?= $Page->Expectedoocytes->viewAttributes() ?>>
<?= $Page->Expectedoocytes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
    <tr id="r_StChDate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate1"><template id="tpc_ivf_stimulation_chart_StChDate1"><?= $Page->StChDate1->caption() ?></template></span></td>
        <td data-name="StChDate1" <?= $Page->StChDate1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate1"><span id="el_ivf_stimulation_chart_StChDate1">
<span<?= $Page->StChDate1->viewAttributes() ?>>
<?= $Page->StChDate1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
    <tr id="r_StChDate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate2"><template id="tpc_ivf_stimulation_chart_StChDate2"><?= $Page->StChDate2->caption() ?></template></span></td>
        <td data-name="StChDate2" <?= $Page->StChDate2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate2"><span id="el_ivf_stimulation_chart_StChDate2">
<span<?= $Page->StChDate2->viewAttributes() ?>>
<?= $Page->StChDate2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
    <tr id="r_StChDate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate3"><template id="tpc_ivf_stimulation_chart_StChDate3"><?= $Page->StChDate3->caption() ?></template></span></td>
        <td data-name="StChDate3" <?= $Page->StChDate3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate3"><span id="el_ivf_stimulation_chart_StChDate3">
<span<?= $Page->StChDate3->viewAttributes() ?>>
<?= $Page->StChDate3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
    <tr id="r_StChDate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate4"><template id="tpc_ivf_stimulation_chart_StChDate4"><?= $Page->StChDate4->caption() ?></template></span></td>
        <td data-name="StChDate4" <?= $Page->StChDate4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate4"><span id="el_ivf_stimulation_chart_StChDate4">
<span<?= $Page->StChDate4->viewAttributes() ?>>
<?= $Page->StChDate4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
    <tr id="r_StChDate5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate5"><template id="tpc_ivf_stimulation_chart_StChDate5"><?= $Page->StChDate5->caption() ?></template></span></td>
        <td data-name="StChDate5" <?= $Page->StChDate5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate5"><span id="el_ivf_stimulation_chart_StChDate5">
<span<?= $Page->StChDate5->viewAttributes() ?>>
<?= $Page->StChDate5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
    <tr id="r_StChDate6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate6"><template id="tpc_ivf_stimulation_chart_StChDate6"><?= $Page->StChDate6->caption() ?></template></span></td>
        <td data-name="StChDate6" <?= $Page->StChDate6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate6"><span id="el_ivf_stimulation_chart_StChDate6">
<span<?= $Page->StChDate6->viewAttributes() ?>>
<?= $Page->StChDate6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
    <tr id="r_StChDate7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate7"><template id="tpc_ivf_stimulation_chart_StChDate7"><?= $Page->StChDate7->caption() ?></template></span></td>
        <td data-name="StChDate7" <?= $Page->StChDate7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate7"><span id="el_ivf_stimulation_chart_StChDate7">
<span<?= $Page->StChDate7->viewAttributes() ?>>
<?= $Page->StChDate7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
    <tr id="r_StChDate8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate8"><template id="tpc_ivf_stimulation_chart_StChDate8"><?= $Page->StChDate8->caption() ?></template></span></td>
        <td data-name="StChDate8" <?= $Page->StChDate8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate8"><span id="el_ivf_stimulation_chart_StChDate8">
<span<?= $Page->StChDate8->viewAttributes() ?>>
<?= $Page->StChDate8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
    <tr id="r_StChDate9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate9"><template id="tpc_ivf_stimulation_chart_StChDate9"><?= $Page->StChDate9->caption() ?></template></span></td>
        <td data-name="StChDate9" <?= $Page->StChDate9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate9"><span id="el_ivf_stimulation_chart_StChDate9">
<span<?= $Page->StChDate9->viewAttributes() ?>>
<?= $Page->StChDate9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
    <tr id="r_StChDate10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate10"><template id="tpc_ivf_stimulation_chart_StChDate10"><?= $Page->StChDate10->caption() ?></template></span></td>
        <td data-name="StChDate10" <?= $Page->StChDate10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate10"><span id="el_ivf_stimulation_chart_StChDate10">
<span<?= $Page->StChDate10->viewAttributes() ?>>
<?= $Page->StChDate10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
    <tr id="r_StChDate11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate11"><template id="tpc_ivf_stimulation_chart_StChDate11"><?= $Page->StChDate11->caption() ?></template></span></td>
        <td data-name="StChDate11" <?= $Page->StChDate11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate11"><span id="el_ivf_stimulation_chart_StChDate11">
<span<?= $Page->StChDate11->viewAttributes() ?>>
<?= $Page->StChDate11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
    <tr id="r_StChDate12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate12"><template id="tpc_ivf_stimulation_chart_StChDate12"><?= $Page->StChDate12->caption() ?></template></span></td>
        <td data-name="StChDate12" <?= $Page->StChDate12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate12"><span id="el_ivf_stimulation_chart_StChDate12">
<span<?= $Page->StChDate12->viewAttributes() ?>>
<?= $Page->StChDate12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
    <tr id="r_StChDate13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate13"><template id="tpc_ivf_stimulation_chart_StChDate13"><?= $Page->StChDate13->caption() ?></template></span></td>
        <td data-name="StChDate13" <?= $Page->StChDate13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate13"><span id="el_ivf_stimulation_chart_StChDate13">
<span<?= $Page->StChDate13->viewAttributes() ?>>
<?= $Page->StChDate13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
    <tr id="r_CycleDay1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay1"><template id="tpc_ivf_stimulation_chart_CycleDay1"><?= $Page->CycleDay1->caption() ?></template></span></td>
        <td data-name="CycleDay1" <?= $Page->CycleDay1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay1"><span id="el_ivf_stimulation_chart_CycleDay1">
<span<?= $Page->CycleDay1->viewAttributes() ?>>
<?= $Page->CycleDay1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
    <tr id="r_CycleDay2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay2"><template id="tpc_ivf_stimulation_chart_CycleDay2"><?= $Page->CycleDay2->caption() ?></template></span></td>
        <td data-name="CycleDay2" <?= $Page->CycleDay2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay2"><span id="el_ivf_stimulation_chart_CycleDay2">
<span<?= $Page->CycleDay2->viewAttributes() ?>>
<?= $Page->CycleDay2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
    <tr id="r_CycleDay3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay3"><template id="tpc_ivf_stimulation_chart_CycleDay3"><?= $Page->CycleDay3->caption() ?></template></span></td>
        <td data-name="CycleDay3" <?= $Page->CycleDay3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay3"><span id="el_ivf_stimulation_chart_CycleDay3">
<span<?= $Page->CycleDay3->viewAttributes() ?>>
<?= $Page->CycleDay3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
    <tr id="r_CycleDay4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay4"><template id="tpc_ivf_stimulation_chart_CycleDay4"><?= $Page->CycleDay4->caption() ?></template></span></td>
        <td data-name="CycleDay4" <?= $Page->CycleDay4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay4"><span id="el_ivf_stimulation_chart_CycleDay4">
<span<?= $Page->CycleDay4->viewAttributes() ?>>
<?= $Page->CycleDay4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
    <tr id="r_CycleDay5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay5"><template id="tpc_ivf_stimulation_chart_CycleDay5"><?= $Page->CycleDay5->caption() ?></template></span></td>
        <td data-name="CycleDay5" <?= $Page->CycleDay5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay5"><span id="el_ivf_stimulation_chart_CycleDay5">
<span<?= $Page->CycleDay5->viewAttributes() ?>>
<?= $Page->CycleDay5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
    <tr id="r_CycleDay6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay6"><template id="tpc_ivf_stimulation_chart_CycleDay6"><?= $Page->CycleDay6->caption() ?></template></span></td>
        <td data-name="CycleDay6" <?= $Page->CycleDay6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay6"><span id="el_ivf_stimulation_chart_CycleDay6">
<span<?= $Page->CycleDay6->viewAttributes() ?>>
<?= $Page->CycleDay6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
    <tr id="r_CycleDay7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay7"><template id="tpc_ivf_stimulation_chart_CycleDay7"><?= $Page->CycleDay7->caption() ?></template></span></td>
        <td data-name="CycleDay7" <?= $Page->CycleDay7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay7"><span id="el_ivf_stimulation_chart_CycleDay7">
<span<?= $Page->CycleDay7->viewAttributes() ?>>
<?= $Page->CycleDay7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
    <tr id="r_CycleDay8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay8"><template id="tpc_ivf_stimulation_chart_CycleDay8"><?= $Page->CycleDay8->caption() ?></template></span></td>
        <td data-name="CycleDay8" <?= $Page->CycleDay8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay8"><span id="el_ivf_stimulation_chart_CycleDay8">
<span<?= $Page->CycleDay8->viewAttributes() ?>>
<?= $Page->CycleDay8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
    <tr id="r_CycleDay9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay9"><template id="tpc_ivf_stimulation_chart_CycleDay9"><?= $Page->CycleDay9->caption() ?></template></span></td>
        <td data-name="CycleDay9" <?= $Page->CycleDay9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay9"><span id="el_ivf_stimulation_chart_CycleDay9">
<span<?= $Page->CycleDay9->viewAttributes() ?>>
<?= $Page->CycleDay9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
    <tr id="r_CycleDay10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay10"><template id="tpc_ivf_stimulation_chart_CycleDay10"><?= $Page->CycleDay10->caption() ?></template></span></td>
        <td data-name="CycleDay10" <?= $Page->CycleDay10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay10"><span id="el_ivf_stimulation_chart_CycleDay10">
<span<?= $Page->CycleDay10->viewAttributes() ?>>
<?= $Page->CycleDay10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
    <tr id="r_CycleDay11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay11"><template id="tpc_ivf_stimulation_chart_CycleDay11"><?= $Page->CycleDay11->caption() ?></template></span></td>
        <td data-name="CycleDay11" <?= $Page->CycleDay11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay11"><span id="el_ivf_stimulation_chart_CycleDay11">
<span<?= $Page->CycleDay11->viewAttributes() ?>>
<?= $Page->CycleDay11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
    <tr id="r_CycleDay12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay12"><template id="tpc_ivf_stimulation_chart_CycleDay12"><?= $Page->CycleDay12->caption() ?></template></span></td>
        <td data-name="CycleDay12" <?= $Page->CycleDay12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay12"><span id="el_ivf_stimulation_chart_CycleDay12">
<span<?= $Page->CycleDay12->viewAttributes() ?>>
<?= $Page->CycleDay12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
    <tr id="r_CycleDay13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay13"><template id="tpc_ivf_stimulation_chart_CycleDay13"><?= $Page->CycleDay13->caption() ?></template></span></td>
        <td data-name="CycleDay13" <?= $Page->CycleDay13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay13"><span id="el_ivf_stimulation_chart_CycleDay13">
<span<?= $Page->CycleDay13->viewAttributes() ?>>
<?= $Page->CycleDay13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
    <tr id="r_StimulationDay1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay1"><template id="tpc_ivf_stimulation_chart_StimulationDay1"><?= $Page->StimulationDay1->caption() ?></template></span></td>
        <td data-name="StimulationDay1" <?= $Page->StimulationDay1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay1"><span id="el_ivf_stimulation_chart_StimulationDay1">
<span<?= $Page->StimulationDay1->viewAttributes() ?>>
<?= $Page->StimulationDay1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
    <tr id="r_StimulationDay2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay2"><template id="tpc_ivf_stimulation_chart_StimulationDay2"><?= $Page->StimulationDay2->caption() ?></template></span></td>
        <td data-name="StimulationDay2" <?= $Page->StimulationDay2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay2"><span id="el_ivf_stimulation_chart_StimulationDay2">
<span<?= $Page->StimulationDay2->viewAttributes() ?>>
<?= $Page->StimulationDay2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
    <tr id="r_StimulationDay3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay3"><template id="tpc_ivf_stimulation_chart_StimulationDay3"><?= $Page->StimulationDay3->caption() ?></template></span></td>
        <td data-name="StimulationDay3" <?= $Page->StimulationDay3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay3"><span id="el_ivf_stimulation_chart_StimulationDay3">
<span<?= $Page->StimulationDay3->viewAttributes() ?>>
<?= $Page->StimulationDay3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
    <tr id="r_StimulationDay4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay4"><template id="tpc_ivf_stimulation_chart_StimulationDay4"><?= $Page->StimulationDay4->caption() ?></template></span></td>
        <td data-name="StimulationDay4" <?= $Page->StimulationDay4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay4"><span id="el_ivf_stimulation_chart_StimulationDay4">
<span<?= $Page->StimulationDay4->viewAttributes() ?>>
<?= $Page->StimulationDay4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
    <tr id="r_StimulationDay5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay5"><template id="tpc_ivf_stimulation_chart_StimulationDay5"><?= $Page->StimulationDay5->caption() ?></template></span></td>
        <td data-name="StimulationDay5" <?= $Page->StimulationDay5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay5"><span id="el_ivf_stimulation_chart_StimulationDay5">
<span<?= $Page->StimulationDay5->viewAttributes() ?>>
<?= $Page->StimulationDay5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
    <tr id="r_StimulationDay6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay6"><template id="tpc_ivf_stimulation_chart_StimulationDay6"><?= $Page->StimulationDay6->caption() ?></template></span></td>
        <td data-name="StimulationDay6" <?= $Page->StimulationDay6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay6"><span id="el_ivf_stimulation_chart_StimulationDay6">
<span<?= $Page->StimulationDay6->viewAttributes() ?>>
<?= $Page->StimulationDay6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
    <tr id="r_StimulationDay7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay7"><template id="tpc_ivf_stimulation_chart_StimulationDay7"><?= $Page->StimulationDay7->caption() ?></template></span></td>
        <td data-name="StimulationDay7" <?= $Page->StimulationDay7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay7"><span id="el_ivf_stimulation_chart_StimulationDay7">
<span<?= $Page->StimulationDay7->viewAttributes() ?>>
<?= $Page->StimulationDay7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
    <tr id="r_StimulationDay8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay8"><template id="tpc_ivf_stimulation_chart_StimulationDay8"><?= $Page->StimulationDay8->caption() ?></template></span></td>
        <td data-name="StimulationDay8" <?= $Page->StimulationDay8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay8"><span id="el_ivf_stimulation_chart_StimulationDay8">
<span<?= $Page->StimulationDay8->viewAttributes() ?>>
<?= $Page->StimulationDay8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
    <tr id="r_StimulationDay9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay9"><template id="tpc_ivf_stimulation_chart_StimulationDay9"><?= $Page->StimulationDay9->caption() ?></template></span></td>
        <td data-name="StimulationDay9" <?= $Page->StimulationDay9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay9"><span id="el_ivf_stimulation_chart_StimulationDay9">
<span<?= $Page->StimulationDay9->viewAttributes() ?>>
<?= $Page->StimulationDay9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
    <tr id="r_StimulationDay10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay10"><template id="tpc_ivf_stimulation_chart_StimulationDay10"><?= $Page->StimulationDay10->caption() ?></template></span></td>
        <td data-name="StimulationDay10" <?= $Page->StimulationDay10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay10"><span id="el_ivf_stimulation_chart_StimulationDay10">
<span<?= $Page->StimulationDay10->viewAttributes() ?>>
<?= $Page->StimulationDay10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
    <tr id="r_StimulationDay11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay11"><template id="tpc_ivf_stimulation_chart_StimulationDay11"><?= $Page->StimulationDay11->caption() ?></template></span></td>
        <td data-name="StimulationDay11" <?= $Page->StimulationDay11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay11"><span id="el_ivf_stimulation_chart_StimulationDay11">
<span<?= $Page->StimulationDay11->viewAttributes() ?>>
<?= $Page->StimulationDay11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
    <tr id="r_StimulationDay12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay12"><template id="tpc_ivf_stimulation_chart_StimulationDay12"><?= $Page->StimulationDay12->caption() ?></template></span></td>
        <td data-name="StimulationDay12" <?= $Page->StimulationDay12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay12"><span id="el_ivf_stimulation_chart_StimulationDay12">
<span<?= $Page->StimulationDay12->viewAttributes() ?>>
<?= $Page->StimulationDay12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
    <tr id="r_StimulationDay13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay13"><template id="tpc_ivf_stimulation_chart_StimulationDay13"><?= $Page->StimulationDay13->caption() ?></template></span></td>
        <td data-name="StimulationDay13" <?= $Page->StimulationDay13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay13"><span id="el_ivf_stimulation_chart_StimulationDay13">
<span<?= $Page->StimulationDay13->viewAttributes() ?>>
<?= $Page->StimulationDay13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
    <tr id="r_Tablet1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet1"><template id="tpc_ivf_stimulation_chart_Tablet1"><?= $Page->Tablet1->caption() ?></template></span></td>
        <td data-name="Tablet1" <?= $Page->Tablet1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet1"><span id="el_ivf_stimulation_chart_Tablet1">
<span<?= $Page->Tablet1->viewAttributes() ?>>
<?= $Page->Tablet1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
    <tr id="r_Tablet2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet2"><template id="tpc_ivf_stimulation_chart_Tablet2"><?= $Page->Tablet2->caption() ?></template></span></td>
        <td data-name="Tablet2" <?= $Page->Tablet2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet2"><span id="el_ivf_stimulation_chart_Tablet2">
<span<?= $Page->Tablet2->viewAttributes() ?>>
<?= $Page->Tablet2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
    <tr id="r_Tablet3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet3"><template id="tpc_ivf_stimulation_chart_Tablet3"><?= $Page->Tablet3->caption() ?></template></span></td>
        <td data-name="Tablet3" <?= $Page->Tablet3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet3"><span id="el_ivf_stimulation_chart_Tablet3">
<span<?= $Page->Tablet3->viewAttributes() ?>>
<?= $Page->Tablet3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
    <tr id="r_Tablet4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet4"><template id="tpc_ivf_stimulation_chart_Tablet4"><?= $Page->Tablet4->caption() ?></template></span></td>
        <td data-name="Tablet4" <?= $Page->Tablet4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet4"><span id="el_ivf_stimulation_chart_Tablet4">
<span<?= $Page->Tablet4->viewAttributes() ?>>
<?= $Page->Tablet4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
    <tr id="r_Tablet5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet5"><template id="tpc_ivf_stimulation_chart_Tablet5"><?= $Page->Tablet5->caption() ?></template></span></td>
        <td data-name="Tablet5" <?= $Page->Tablet5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet5"><span id="el_ivf_stimulation_chart_Tablet5">
<span<?= $Page->Tablet5->viewAttributes() ?>>
<?= $Page->Tablet5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
    <tr id="r_Tablet6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet6"><template id="tpc_ivf_stimulation_chart_Tablet6"><?= $Page->Tablet6->caption() ?></template></span></td>
        <td data-name="Tablet6" <?= $Page->Tablet6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet6"><span id="el_ivf_stimulation_chart_Tablet6">
<span<?= $Page->Tablet6->viewAttributes() ?>>
<?= $Page->Tablet6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
    <tr id="r_Tablet7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet7"><template id="tpc_ivf_stimulation_chart_Tablet7"><?= $Page->Tablet7->caption() ?></template></span></td>
        <td data-name="Tablet7" <?= $Page->Tablet7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet7"><span id="el_ivf_stimulation_chart_Tablet7">
<span<?= $Page->Tablet7->viewAttributes() ?>>
<?= $Page->Tablet7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
    <tr id="r_Tablet8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet8"><template id="tpc_ivf_stimulation_chart_Tablet8"><?= $Page->Tablet8->caption() ?></template></span></td>
        <td data-name="Tablet8" <?= $Page->Tablet8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet8"><span id="el_ivf_stimulation_chart_Tablet8">
<span<?= $Page->Tablet8->viewAttributes() ?>>
<?= $Page->Tablet8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
    <tr id="r_Tablet9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet9"><template id="tpc_ivf_stimulation_chart_Tablet9"><?= $Page->Tablet9->caption() ?></template></span></td>
        <td data-name="Tablet9" <?= $Page->Tablet9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet9"><span id="el_ivf_stimulation_chart_Tablet9">
<span<?= $Page->Tablet9->viewAttributes() ?>>
<?= $Page->Tablet9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
    <tr id="r_Tablet10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet10"><template id="tpc_ivf_stimulation_chart_Tablet10"><?= $Page->Tablet10->caption() ?></template></span></td>
        <td data-name="Tablet10" <?= $Page->Tablet10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet10"><span id="el_ivf_stimulation_chart_Tablet10">
<span<?= $Page->Tablet10->viewAttributes() ?>>
<?= $Page->Tablet10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
    <tr id="r_Tablet11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet11"><template id="tpc_ivf_stimulation_chart_Tablet11"><?= $Page->Tablet11->caption() ?></template></span></td>
        <td data-name="Tablet11" <?= $Page->Tablet11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet11"><span id="el_ivf_stimulation_chart_Tablet11">
<span<?= $Page->Tablet11->viewAttributes() ?>>
<?= $Page->Tablet11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
    <tr id="r_Tablet12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet12"><template id="tpc_ivf_stimulation_chart_Tablet12"><?= $Page->Tablet12->caption() ?></template></span></td>
        <td data-name="Tablet12" <?= $Page->Tablet12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet12"><span id="el_ivf_stimulation_chart_Tablet12">
<span<?= $Page->Tablet12->viewAttributes() ?>>
<?= $Page->Tablet12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
    <tr id="r_Tablet13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet13"><template id="tpc_ivf_stimulation_chart_Tablet13"><?= $Page->Tablet13->caption() ?></template></span></td>
        <td data-name="Tablet13" <?= $Page->Tablet13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet13"><span id="el_ivf_stimulation_chart_Tablet13">
<span<?= $Page->Tablet13->viewAttributes() ?>>
<?= $Page->Tablet13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
    <tr id="r_RFSH1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH1"><template id="tpc_ivf_stimulation_chart_RFSH1"><?= $Page->RFSH1->caption() ?></template></span></td>
        <td data-name="RFSH1" <?= $Page->RFSH1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH1"><span id="el_ivf_stimulation_chart_RFSH1">
<span<?= $Page->RFSH1->viewAttributes() ?>>
<?= $Page->RFSH1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
    <tr id="r_RFSH2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH2"><template id="tpc_ivf_stimulation_chart_RFSH2"><?= $Page->RFSH2->caption() ?></template></span></td>
        <td data-name="RFSH2" <?= $Page->RFSH2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH2"><span id="el_ivf_stimulation_chart_RFSH2">
<span<?= $Page->RFSH2->viewAttributes() ?>>
<?= $Page->RFSH2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
    <tr id="r_RFSH3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH3"><template id="tpc_ivf_stimulation_chart_RFSH3"><?= $Page->RFSH3->caption() ?></template></span></td>
        <td data-name="RFSH3" <?= $Page->RFSH3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH3"><span id="el_ivf_stimulation_chart_RFSH3">
<span<?= $Page->RFSH3->viewAttributes() ?>>
<?= $Page->RFSH3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
    <tr id="r_RFSH4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH4"><template id="tpc_ivf_stimulation_chart_RFSH4"><?= $Page->RFSH4->caption() ?></template></span></td>
        <td data-name="RFSH4" <?= $Page->RFSH4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH4"><span id="el_ivf_stimulation_chart_RFSH4">
<span<?= $Page->RFSH4->viewAttributes() ?>>
<?= $Page->RFSH4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
    <tr id="r_RFSH5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH5"><template id="tpc_ivf_stimulation_chart_RFSH5"><?= $Page->RFSH5->caption() ?></template></span></td>
        <td data-name="RFSH5" <?= $Page->RFSH5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH5"><span id="el_ivf_stimulation_chart_RFSH5">
<span<?= $Page->RFSH5->viewAttributes() ?>>
<?= $Page->RFSH5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
    <tr id="r_RFSH6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH6"><template id="tpc_ivf_stimulation_chart_RFSH6"><?= $Page->RFSH6->caption() ?></template></span></td>
        <td data-name="RFSH6" <?= $Page->RFSH6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH6"><span id="el_ivf_stimulation_chart_RFSH6">
<span<?= $Page->RFSH6->viewAttributes() ?>>
<?= $Page->RFSH6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
    <tr id="r_RFSH7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH7"><template id="tpc_ivf_stimulation_chart_RFSH7"><?= $Page->RFSH7->caption() ?></template></span></td>
        <td data-name="RFSH7" <?= $Page->RFSH7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH7"><span id="el_ivf_stimulation_chart_RFSH7">
<span<?= $Page->RFSH7->viewAttributes() ?>>
<?= $Page->RFSH7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
    <tr id="r_RFSH8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH8"><template id="tpc_ivf_stimulation_chart_RFSH8"><?= $Page->RFSH8->caption() ?></template></span></td>
        <td data-name="RFSH8" <?= $Page->RFSH8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH8"><span id="el_ivf_stimulation_chart_RFSH8">
<span<?= $Page->RFSH8->viewAttributes() ?>>
<?= $Page->RFSH8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
    <tr id="r_RFSH9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH9"><template id="tpc_ivf_stimulation_chart_RFSH9"><?= $Page->RFSH9->caption() ?></template></span></td>
        <td data-name="RFSH9" <?= $Page->RFSH9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH9"><span id="el_ivf_stimulation_chart_RFSH9">
<span<?= $Page->RFSH9->viewAttributes() ?>>
<?= $Page->RFSH9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
    <tr id="r_RFSH10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH10"><template id="tpc_ivf_stimulation_chart_RFSH10"><?= $Page->RFSH10->caption() ?></template></span></td>
        <td data-name="RFSH10" <?= $Page->RFSH10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH10"><span id="el_ivf_stimulation_chart_RFSH10">
<span<?= $Page->RFSH10->viewAttributes() ?>>
<?= $Page->RFSH10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
    <tr id="r_RFSH11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH11"><template id="tpc_ivf_stimulation_chart_RFSH11"><?= $Page->RFSH11->caption() ?></template></span></td>
        <td data-name="RFSH11" <?= $Page->RFSH11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH11"><span id="el_ivf_stimulation_chart_RFSH11">
<span<?= $Page->RFSH11->viewAttributes() ?>>
<?= $Page->RFSH11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
    <tr id="r_RFSH12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH12"><template id="tpc_ivf_stimulation_chart_RFSH12"><?= $Page->RFSH12->caption() ?></template></span></td>
        <td data-name="RFSH12" <?= $Page->RFSH12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH12"><span id="el_ivf_stimulation_chart_RFSH12">
<span<?= $Page->RFSH12->viewAttributes() ?>>
<?= $Page->RFSH12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
    <tr id="r_RFSH13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH13"><template id="tpc_ivf_stimulation_chart_RFSH13"><?= $Page->RFSH13->caption() ?></template></span></td>
        <td data-name="RFSH13" <?= $Page->RFSH13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH13"><span id="el_ivf_stimulation_chart_RFSH13">
<span<?= $Page->RFSH13->viewAttributes() ?>>
<?= $Page->RFSH13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
    <tr id="r_HMG1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG1"><template id="tpc_ivf_stimulation_chart_HMG1"><?= $Page->HMG1->caption() ?></template></span></td>
        <td data-name="HMG1" <?= $Page->HMG1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG1"><span id="el_ivf_stimulation_chart_HMG1">
<span<?= $Page->HMG1->viewAttributes() ?>>
<?= $Page->HMG1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
    <tr id="r_HMG2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG2"><template id="tpc_ivf_stimulation_chart_HMG2"><?= $Page->HMG2->caption() ?></template></span></td>
        <td data-name="HMG2" <?= $Page->HMG2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG2"><span id="el_ivf_stimulation_chart_HMG2">
<span<?= $Page->HMG2->viewAttributes() ?>>
<?= $Page->HMG2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
    <tr id="r_HMG3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG3"><template id="tpc_ivf_stimulation_chart_HMG3"><?= $Page->HMG3->caption() ?></template></span></td>
        <td data-name="HMG3" <?= $Page->HMG3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG3"><span id="el_ivf_stimulation_chart_HMG3">
<span<?= $Page->HMG3->viewAttributes() ?>>
<?= $Page->HMG3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
    <tr id="r_HMG4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG4"><template id="tpc_ivf_stimulation_chart_HMG4"><?= $Page->HMG4->caption() ?></template></span></td>
        <td data-name="HMG4" <?= $Page->HMG4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG4"><span id="el_ivf_stimulation_chart_HMG4">
<span<?= $Page->HMG4->viewAttributes() ?>>
<?= $Page->HMG4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
    <tr id="r_HMG5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG5"><template id="tpc_ivf_stimulation_chart_HMG5"><?= $Page->HMG5->caption() ?></template></span></td>
        <td data-name="HMG5" <?= $Page->HMG5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG5"><span id="el_ivf_stimulation_chart_HMG5">
<span<?= $Page->HMG5->viewAttributes() ?>>
<?= $Page->HMG5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
    <tr id="r_HMG6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG6"><template id="tpc_ivf_stimulation_chart_HMG6"><?= $Page->HMG6->caption() ?></template></span></td>
        <td data-name="HMG6" <?= $Page->HMG6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG6"><span id="el_ivf_stimulation_chart_HMG6">
<span<?= $Page->HMG6->viewAttributes() ?>>
<?= $Page->HMG6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
    <tr id="r_HMG7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG7"><template id="tpc_ivf_stimulation_chart_HMG7"><?= $Page->HMG7->caption() ?></template></span></td>
        <td data-name="HMG7" <?= $Page->HMG7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG7"><span id="el_ivf_stimulation_chart_HMG7">
<span<?= $Page->HMG7->viewAttributes() ?>>
<?= $Page->HMG7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
    <tr id="r_HMG8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG8"><template id="tpc_ivf_stimulation_chart_HMG8"><?= $Page->HMG8->caption() ?></template></span></td>
        <td data-name="HMG8" <?= $Page->HMG8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG8"><span id="el_ivf_stimulation_chart_HMG8">
<span<?= $Page->HMG8->viewAttributes() ?>>
<?= $Page->HMG8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
    <tr id="r_HMG9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG9"><template id="tpc_ivf_stimulation_chart_HMG9"><?= $Page->HMG9->caption() ?></template></span></td>
        <td data-name="HMG9" <?= $Page->HMG9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG9"><span id="el_ivf_stimulation_chart_HMG9">
<span<?= $Page->HMG9->viewAttributes() ?>>
<?= $Page->HMG9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
    <tr id="r_HMG10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG10"><template id="tpc_ivf_stimulation_chart_HMG10"><?= $Page->HMG10->caption() ?></template></span></td>
        <td data-name="HMG10" <?= $Page->HMG10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG10"><span id="el_ivf_stimulation_chart_HMG10">
<span<?= $Page->HMG10->viewAttributes() ?>>
<?= $Page->HMG10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
    <tr id="r_HMG11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG11"><template id="tpc_ivf_stimulation_chart_HMG11"><?= $Page->HMG11->caption() ?></template></span></td>
        <td data-name="HMG11" <?= $Page->HMG11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG11"><span id="el_ivf_stimulation_chart_HMG11">
<span<?= $Page->HMG11->viewAttributes() ?>>
<?= $Page->HMG11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
    <tr id="r_HMG12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG12"><template id="tpc_ivf_stimulation_chart_HMG12"><?= $Page->HMG12->caption() ?></template></span></td>
        <td data-name="HMG12" <?= $Page->HMG12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG12"><span id="el_ivf_stimulation_chart_HMG12">
<span<?= $Page->HMG12->viewAttributes() ?>>
<?= $Page->HMG12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
    <tr id="r_HMG13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG13"><template id="tpc_ivf_stimulation_chart_HMG13"><?= $Page->HMG13->caption() ?></template></span></td>
        <td data-name="HMG13" <?= $Page->HMG13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG13"><span id="el_ivf_stimulation_chart_HMG13">
<span<?= $Page->HMG13->viewAttributes() ?>>
<?= $Page->HMG13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
    <tr id="r_GnRH1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH1"><template id="tpc_ivf_stimulation_chart_GnRH1"><?= $Page->GnRH1->caption() ?></template></span></td>
        <td data-name="GnRH1" <?= $Page->GnRH1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH1"><span id="el_ivf_stimulation_chart_GnRH1">
<span<?= $Page->GnRH1->viewAttributes() ?>>
<?= $Page->GnRH1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
    <tr id="r_GnRH2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH2"><template id="tpc_ivf_stimulation_chart_GnRH2"><?= $Page->GnRH2->caption() ?></template></span></td>
        <td data-name="GnRH2" <?= $Page->GnRH2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH2"><span id="el_ivf_stimulation_chart_GnRH2">
<span<?= $Page->GnRH2->viewAttributes() ?>>
<?= $Page->GnRH2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
    <tr id="r_GnRH3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH3"><template id="tpc_ivf_stimulation_chart_GnRH3"><?= $Page->GnRH3->caption() ?></template></span></td>
        <td data-name="GnRH3" <?= $Page->GnRH3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH3"><span id="el_ivf_stimulation_chart_GnRH3">
<span<?= $Page->GnRH3->viewAttributes() ?>>
<?= $Page->GnRH3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
    <tr id="r_GnRH4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH4"><template id="tpc_ivf_stimulation_chart_GnRH4"><?= $Page->GnRH4->caption() ?></template></span></td>
        <td data-name="GnRH4" <?= $Page->GnRH4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH4"><span id="el_ivf_stimulation_chart_GnRH4">
<span<?= $Page->GnRH4->viewAttributes() ?>>
<?= $Page->GnRH4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
    <tr id="r_GnRH5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH5"><template id="tpc_ivf_stimulation_chart_GnRH5"><?= $Page->GnRH5->caption() ?></template></span></td>
        <td data-name="GnRH5" <?= $Page->GnRH5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH5"><span id="el_ivf_stimulation_chart_GnRH5">
<span<?= $Page->GnRH5->viewAttributes() ?>>
<?= $Page->GnRH5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
    <tr id="r_GnRH6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH6"><template id="tpc_ivf_stimulation_chart_GnRH6"><?= $Page->GnRH6->caption() ?></template></span></td>
        <td data-name="GnRH6" <?= $Page->GnRH6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH6"><span id="el_ivf_stimulation_chart_GnRH6">
<span<?= $Page->GnRH6->viewAttributes() ?>>
<?= $Page->GnRH6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
    <tr id="r_GnRH7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH7"><template id="tpc_ivf_stimulation_chart_GnRH7"><?= $Page->GnRH7->caption() ?></template></span></td>
        <td data-name="GnRH7" <?= $Page->GnRH7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH7"><span id="el_ivf_stimulation_chart_GnRH7">
<span<?= $Page->GnRH7->viewAttributes() ?>>
<?= $Page->GnRH7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
    <tr id="r_GnRH8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH8"><template id="tpc_ivf_stimulation_chart_GnRH8"><?= $Page->GnRH8->caption() ?></template></span></td>
        <td data-name="GnRH8" <?= $Page->GnRH8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH8"><span id="el_ivf_stimulation_chart_GnRH8">
<span<?= $Page->GnRH8->viewAttributes() ?>>
<?= $Page->GnRH8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
    <tr id="r_GnRH9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH9"><template id="tpc_ivf_stimulation_chart_GnRH9"><?= $Page->GnRH9->caption() ?></template></span></td>
        <td data-name="GnRH9" <?= $Page->GnRH9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH9"><span id="el_ivf_stimulation_chart_GnRH9">
<span<?= $Page->GnRH9->viewAttributes() ?>>
<?= $Page->GnRH9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
    <tr id="r_GnRH10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH10"><template id="tpc_ivf_stimulation_chart_GnRH10"><?= $Page->GnRH10->caption() ?></template></span></td>
        <td data-name="GnRH10" <?= $Page->GnRH10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH10"><span id="el_ivf_stimulation_chart_GnRH10">
<span<?= $Page->GnRH10->viewAttributes() ?>>
<?= $Page->GnRH10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
    <tr id="r_GnRH11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH11"><template id="tpc_ivf_stimulation_chart_GnRH11"><?= $Page->GnRH11->caption() ?></template></span></td>
        <td data-name="GnRH11" <?= $Page->GnRH11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH11"><span id="el_ivf_stimulation_chart_GnRH11">
<span<?= $Page->GnRH11->viewAttributes() ?>>
<?= $Page->GnRH11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
    <tr id="r_GnRH12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH12"><template id="tpc_ivf_stimulation_chart_GnRH12"><?= $Page->GnRH12->caption() ?></template></span></td>
        <td data-name="GnRH12" <?= $Page->GnRH12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH12"><span id="el_ivf_stimulation_chart_GnRH12">
<span<?= $Page->GnRH12->viewAttributes() ?>>
<?= $Page->GnRH12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
    <tr id="r_GnRH13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH13"><template id="tpc_ivf_stimulation_chart_GnRH13"><?= $Page->GnRH13->caption() ?></template></span></td>
        <td data-name="GnRH13" <?= $Page->GnRH13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH13"><span id="el_ivf_stimulation_chart_GnRH13">
<span<?= $Page->GnRH13->viewAttributes() ?>>
<?= $Page->GnRH13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
    <tr id="r_E21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E21"><template id="tpc_ivf_stimulation_chart_E21"><?= $Page->E21->caption() ?></template></span></td>
        <td data-name="E21" <?= $Page->E21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E21"><span id="el_ivf_stimulation_chart_E21">
<span<?= $Page->E21->viewAttributes() ?>>
<?= $Page->E21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
    <tr id="r_E22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E22"><template id="tpc_ivf_stimulation_chart_E22"><?= $Page->E22->caption() ?></template></span></td>
        <td data-name="E22" <?= $Page->E22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E22"><span id="el_ivf_stimulation_chart_E22">
<span<?= $Page->E22->viewAttributes() ?>>
<?= $Page->E22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
    <tr id="r_E23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E23"><template id="tpc_ivf_stimulation_chart_E23"><?= $Page->E23->caption() ?></template></span></td>
        <td data-name="E23" <?= $Page->E23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E23"><span id="el_ivf_stimulation_chart_E23">
<span<?= $Page->E23->viewAttributes() ?>>
<?= $Page->E23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
    <tr id="r_E24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E24"><template id="tpc_ivf_stimulation_chart_E24"><?= $Page->E24->caption() ?></template></span></td>
        <td data-name="E24" <?= $Page->E24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E24"><span id="el_ivf_stimulation_chart_E24">
<span<?= $Page->E24->viewAttributes() ?>>
<?= $Page->E24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
    <tr id="r_E25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E25"><template id="tpc_ivf_stimulation_chart_E25"><?= $Page->E25->caption() ?></template></span></td>
        <td data-name="E25" <?= $Page->E25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E25"><span id="el_ivf_stimulation_chart_E25">
<span<?= $Page->E25->viewAttributes() ?>>
<?= $Page->E25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
    <tr id="r_E26">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E26"><template id="tpc_ivf_stimulation_chart_E26"><?= $Page->E26->caption() ?></template></span></td>
        <td data-name="E26" <?= $Page->E26->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E26"><span id="el_ivf_stimulation_chart_E26">
<span<?= $Page->E26->viewAttributes() ?>>
<?= $Page->E26->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
    <tr id="r_E27">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E27"><template id="tpc_ivf_stimulation_chart_E27"><?= $Page->E27->caption() ?></template></span></td>
        <td data-name="E27" <?= $Page->E27->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E27"><span id="el_ivf_stimulation_chart_E27">
<span<?= $Page->E27->viewAttributes() ?>>
<?= $Page->E27->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
    <tr id="r_E28">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E28"><template id="tpc_ivf_stimulation_chart_E28"><?= $Page->E28->caption() ?></template></span></td>
        <td data-name="E28" <?= $Page->E28->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E28"><span id="el_ivf_stimulation_chart_E28">
<span<?= $Page->E28->viewAttributes() ?>>
<?= $Page->E28->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
    <tr id="r_E29">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E29"><template id="tpc_ivf_stimulation_chart_E29"><?= $Page->E29->caption() ?></template></span></td>
        <td data-name="E29" <?= $Page->E29->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E29"><span id="el_ivf_stimulation_chart_E29">
<span<?= $Page->E29->viewAttributes() ?>>
<?= $Page->E29->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
    <tr id="r_E210">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E210"><template id="tpc_ivf_stimulation_chart_E210"><?= $Page->E210->caption() ?></template></span></td>
        <td data-name="E210" <?= $Page->E210->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E210"><span id="el_ivf_stimulation_chart_E210">
<span<?= $Page->E210->viewAttributes() ?>>
<?= $Page->E210->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
    <tr id="r_E211">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E211"><template id="tpc_ivf_stimulation_chart_E211"><?= $Page->E211->caption() ?></template></span></td>
        <td data-name="E211" <?= $Page->E211->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E211"><span id="el_ivf_stimulation_chart_E211">
<span<?= $Page->E211->viewAttributes() ?>>
<?= $Page->E211->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
    <tr id="r_E212">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E212"><template id="tpc_ivf_stimulation_chart_E212"><?= $Page->E212->caption() ?></template></span></td>
        <td data-name="E212" <?= $Page->E212->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E212"><span id="el_ivf_stimulation_chart_E212">
<span<?= $Page->E212->viewAttributes() ?>>
<?= $Page->E212->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
    <tr id="r_E213">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E213"><template id="tpc_ivf_stimulation_chart_E213"><?= $Page->E213->caption() ?></template></span></td>
        <td data-name="E213" <?= $Page->E213->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E213"><span id="el_ivf_stimulation_chart_E213">
<span<?= $Page->E213->viewAttributes() ?>>
<?= $Page->E213->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
    <tr id="r_P41">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P41"><template id="tpc_ivf_stimulation_chart_P41"><?= $Page->P41->caption() ?></template></span></td>
        <td data-name="P41" <?= $Page->P41->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P41"><span id="el_ivf_stimulation_chart_P41">
<span<?= $Page->P41->viewAttributes() ?>>
<?= $Page->P41->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
    <tr id="r_P42">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P42"><template id="tpc_ivf_stimulation_chart_P42"><?= $Page->P42->caption() ?></template></span></td>
        <td data-name="P42" <?= $Page->P42->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P42"><span id="el_ivf_stimulation_chart_P42">
<span<?= $Page->P42->viewAttributes() ?>>
<?= $Page->P42->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
    <tr id="r_P43">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P43"><template id="tpc_ivf_stimulation_chart_P43"><?= $Page->P43->caption() ?></template></span></td>
        <td data-name="P43" <?= $Page->P43->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P43"><span id="el_ivf_stimulation_chart_P43">
<span<?= $Page->P43->viewAttributes() ?>>
<?= $Page->P43->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
    <tr id="r_P44">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P44"><template id="tpc_ivf_stimulation_chart_P44"><?= $Page->P44->caption() ?></template></span></td>
        <td data-name="P44" <?= $Page->P44->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P44"><span id="el_ivf_stimulation_chart_P44">
<span<?= $Page->P44->viewAttributes() ?>>
<?= $Page->P44->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
    <tr id="r_P45">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P45"><template id="tpc_ivf_stimulation_chart_P45"><?= $Page->P45->caption() ?></template></span></td>
        <td data-name="P45" <?= $Page->P45->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P45"><span id="el_ivf_stimulation_chart_P45">
<span<?= $Page->P45->viewAttributes() ?>>
<?= $Page->P45->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
    <tr id="r_P46">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P46"><template id="tpc_ivf_stimulation_chart_P46"><?= $Page->P46->caption() ?></template></span></td>
        <td data-name="P46" <?= $Page->P46->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P46"><span id="el_ivf_stimulation_chart_P46">
<span<?= $Page->P46->viewAttributes() ?>>
<?= $Page->P46->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
    <tr id="r_P47">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P47"><template id="tpc_ivf_stimulation_chart_P47"><?= $Page->P47->caption() ?></template></span></td>
        <td data-name="P47" <?= $Page->P47->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P47"><span id="el_ivf_stimulation_chart_P47">
<span<?= $Page->P47->viewAttributes() ?>>
<?= $Page->P47->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
    <tr id="r_P48">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P48"><template id="tpc_ivf_stimulation_chart_P48"><?= $Page->P48->caption() ?></template></span></td>
        <td data-name="P48" <?= $Page->P48->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P48"><span id="el_ivf_stimulation_chart_P48">
<span<?= $Page->P48->viewAttributes() ?>>
<?= $Page->P48->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
    <tr id="r_P49">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P49"><template id="tpc_ivf_stimulation_chart_P49"><?= $Page->P49->caption() ?></template></span></td>
        <td data-name="P49" <?= $Page->P49->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P49"><span id="el_ivf_stimulation_chart_P49">
<span<?= $Page->P49->viewAttributes() ?>>
<?= $Page->P49->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
    <tr id="r_P410">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P410"><template id="tpc_ivf_stimulation_chart_P410"><?= $Page->P410->caption() ?></template></span></td>
        <td data-name="P410" <?= $Page->P410->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P410"><span id="el_ivf_stimulation_chart_P410">
<span<?= $Page->P410->viewAttributes() ?>>
<?= $Page->P410->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
    <tr id="r_P411">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P411"><template id="tpc_ivf_stimulation_chart_P411"><?= $Page->P411->caption() ?></template></span></td>
        <td data-name="P411" <?= $Page->P411->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P411"><span id="el_ivf_stimulation_chart_P411">
<span<?= $Page->P411->viewAttributes() ?>>
<?= $Page->P411->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
    <tr id="r_P412">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P412"><template id="tpc_ivf_stimulation_chart_P412"><?= $Page->P412->caption() ?></template></span></td>
        <td data-name="P412" <?= $Page->P412->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P412"><span id="el_ivf_stimulation_chart_P412">
<span<?= $Page->P412->viewAttributes() ?>>
<?= $Page->P412->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
    <tr id="r_P413">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P413"><template id="tpc_ivf_stimulation_chart_P413"><?= $Page->P413->caption() ?></template></span></td>
        <td data-name="P413" <?= $Page->P413->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P413"><span id="el_ivf_stimulation_chart_P413">
<span<?= $Page->P413->viewAttributes() ?>>
<?= $Page->P413->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
    <tr id="r_USGRt1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt1"><template id="tpc_ivf_stimulation_chart_USGRt1"><?= $Page->USGRt1->caption() ?></template></span></td>
        <td data-name="USGRt1" <?= $Page->USGRt1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt1"><span id="el_ivf_stimulation_chart_USGRt1">
<span<?= $Page->USGRt1->viewAttributes() ?>>
<?= $Page->USGRt1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
    <tr id="r_USGRt2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt2"><template id="tpc_ivf_stimulation_chart_USGRt2"><?= $Page->USGRt2->caption() ?></template></span></td>
        <td data-name="USGRt2" <?= $Page->USGRt2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt2"><span id="el_ivf_stimulation_chart_USGRt2">
<span<?= $Page->USGRt2->viewAttributes() ?>>
<?= $Page->USGRt2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
    <tr id="r_USGRt3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt3"><template id="tpc_ivf_stimulation_chart_USGRt3"><?= $Page->USGRt3->caption() ?></template></span></td>
        <td data-name="USGRt3" <?= $Page->USGRt3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt3"><span id="el_ivf_stimulation_chart_USGRt3">
<span<?= $Page->USGRt3->viewAttributes() ?>>
<?= $Page->USGRt3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
    <tr id="r_USGRt4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt4"><template id="tpc_ivf_stimulation_chart_USGRt4"><?= $Page->USGRt4->caption() ?></template></span></td>
        <td data-name="USGRt4" <?= $Page->USGRt4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt4"><span id="el_ivf_stimulation_chart_USGRt4">
<span<?= $Page->USGRt4->viewAttributes() ?>>
<?= $Page->USGRt4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
    <tr id="r_USGRt5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt5"><template id="tpc_ivf_stimulation_chart_USGRt5"><?= $Page->USGRt5->caption() ?></template></span></td>
        <td data-name="USGRt5" <?= $Page->USGRt5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt5"><span id="el_ivf_stimulation_chart_USGRt5">
<span<?= $Page->USGRt5->viewAttributes() ?>>
<?= $Page->USGRt5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
    <tr id="r_USGRt6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt6"><template id="tpc_ivf_stimulation_chart_USGRt6"><?= $Page->USGRt6->caption() ?></template></span></td>
        <td data-name="USGRt6" <?= $Page->USGRt6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt6"><span id="el_ivf_stimulation_chart_USGRt6">
<span<?= $Page->USGRt6->viewAttributes() ?>>
<?= $Page->USGRt6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
    <tr id="r_USGRt7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt7"><template id="tpc_ivf_stimulation_chart_USGRt7"><?= $Page->USGRt7->caption() ?></template></span></td>
        <td data-name="USGRt7" <?= $Page->USGRt7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt7"><span id="el_ivf_stimulation_chart_USGRt7">
<span<?= $Page->USGRt7->viewAttributes() ?>>
<?= $Page->USGRt7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
    <tr id="r_USGRt8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt8"><template id="tpc_ivf_stimulation_chart_USGRt8"><?= $Page->USGRt8->caption() ?></template></span></td>
        <td data-name="USGRt8" <?= $Page->USGRt8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt8"><span id="el_ivf_stimulation_chart_USGRt8">
<span<?= $Page->USGRt8->viewAttributes() ?>>
<?= $Page->USGRt8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
    <tr id="r_USGRt9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt9"><template id="tpc_ivf_stimulation_chart_USGRt9"><?= $Page->USGRt9->caption() ?></template></span></td>
        <td data-name="USGRt9" <?= $Page->USGRt9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt9"><span id="el_ivf_stimulation_chart_USGRt9">
<span<?= $Page->USGRt9->viewAttributes() ?>>
<?= $Page->USGRt9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
    <tr id="r_USGRt10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt10"><template id="tpc_ivf_stimulation_chart_USGRt10"><?= $Page->USGRt10->caption() ?></template></span></td>
        <td data-name="USGRt10" <?= $Page->USGRt10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt10"><span id="el_ivf_stimulation_chart_USGRt10">
<span<?= $Page->USGRt10->viewAttributes() ?>>
<?= $Page->USGRt10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
    <tr id="r_USGRt11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt11"><template id="tpc_ivf_stimulation_chart_USGRt11"><?= $Page->USGRt11->caption() ?></template></span></td>
        <td data-name="USGRt11" <?= $Page->USGRt11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt11"><span id="el_ivf_stimulation_chart_USGRt11">
<span<?= $Page->USGRt11->viewAttributes() ?>>
<?= $Page->USGRt11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
    <tr id="r_USGRt12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt12"><template id="tpc_ivf_stimulation_chart_USGRt12"><?= $Page->USGRt12->caption() ?></template></span></td>
        <td data-name="USGRt12" <?= $Page->USGRt12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt12"><span id="el_ivf_stimulation_chart_USGRt12">
<span<?= $Page->USGRt12->viewAttributes() ?>>
<?= $Page->USGRt12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
    <tr id="r_USGRt13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt13"><template id="tpc_ivf_stimulation_chart_USGRt13"><?= $Page->USGRt13->caption() ?></template></span></td>
        <td data-name="USGRt13" <?= $Page->USGRt13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt13"><span id="el_ivf_stimulation_chart_USGRt13">
<span<?= $Page->USGRt13->viewAttributes() ?>>
<?= $Page->USGRt13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
    <tr id="r_USGLt1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt1"><template id="tpc_ivf_stimulation_chart_USGLt1"><?= $Page->USGLt1->caption() ?></template></span></td>
        <td data-name="USGLt1" <?= $Page->USGLt1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt1"><span id="el_ivf_stimulation_chart_USGLt1">
<span<?= $Page->USGLt1->viewAttributes() ?>>
<?= $Page->USGLt1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
    <tr id="r_USGLt2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt2"><template id="tpc_ivf_stimulation_chart_USGLt2"><?= $Page->USGLt2->caption() ?></template></span></td>
        <td data-name="USGLt2" <?= $Page->USGLt2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt2"><span id="el_ivf_stimulation_chart_USGLt2">
<span<?= $Page->USGLt2->viewAttributes() ?>>
<?= $Page->USGLt2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
    <tr id="r_USGLt3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt3"><template id="tpc_ivf_stimulation_chart_USGLt3"><?= $Page->USGLt3->caption() ?></template></span></td>
        <td data-name="USGLt3" <?= $Page->USGLt3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt3"><span id="el_ivf_stimulation_chart_USGLt3">
<span<?= $Page->USGLt3->viewAttributes() ?>>
<?= $Page->USGLt3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
    <tr id="r_USGLt4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt4"><template id="tpc_ivf_stimulation_chart_USGLt4"><?= $Page->USGLt4->caption() ?></template></span></td>
        <td data-name="USGLt4" <?= $Page->USGLt4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt4"><span id="el_ivf_stimulation_chart_USGLt4">
<span<?= $Page->USGLt4->viewAttributes() ?>>
<?= $Page->USGLt4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
    <tr id="r_USGLt5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt5"><template id="tpc_ivf_stimulation_chart_USGLt5"><?= $Page->USGLt5->caption() ?></template></span></td>
        <td data-name="USGLt5" <?= $Page->USGLt5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt5"><span id="el_ivf_stimulation_chart_USGLt5">
<span<?= $Page->USGLt5->viewAttributes() ?>>
<?= $Page->USGLt5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
    <tr id="r_USGLt6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt6"><template id="tpc_ivf_stimulation_chart_USGLt6"><?= $Page->USGLt6->caption() ?></template></span></td>
        <td data-name="USGLt6" <?= $Page->USGLt6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt6"><span id="el_ivf_stimulation_chart_USGLt6">
<span<?= $Page->USGLt6->viewAttributes() ?>>
<?= $Page->USGLt6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
    <tr id="r_USGLt7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt7"><template id="tpc_ivf_stimulation_chart_USGLt7"><?= $Page->USGLt7->caption() ?></template></span></td>
        <td data-name="USGLt7" <?= $Page->USGLt7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt7"><span id="el_ivf_stimulation_chart_USGLt7">
<span<?= $Page->USGLt7->viewAttributes() ?>>
<?= $Page->USGLt7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
    <tr id="r_USGLt8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt8"><template id="tpc_ivf_stimulation_chart_USGLt8"><?= $Page->USGLt8->caption() ?></template></span></td>
        <td data-name="USGLt8" <?= $Page->USGLt8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt8"><span id="el_ivf_stimulation_chart_USGLt8">
<span<?= $Page->USGLt8->viewAttributes() ?>>
<?= $Page->USGLt8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
    <tr id="r_USGLt9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt9"><template id="tpc_ivf_stimulation_chart_USGLt9"><?= $Page->USGLt9->caption() ?></template></span></td>
        <td data-name="USGLt9" <?= $Page->USGLt9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt9"><span id="el_ivf_stimulation_chart_USGLt9">
<span<?= $Page->USGLt9->viewAttributes() ?>>
<?= $Page->USGLt9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
    <tr id="r_USGLt10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt10"><template id="tpc_ivf_stimulation_chart_USGLt10"><?= $Page->USGLt10->caption() ?></template></span></td>
        <td data-name="USGLt10" <?= $Page->USGLt10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt10"><span id="el_ivf_stimulation_chart_USGLt10">
<span<?= $Page->USGLt10->viewAttributes() ?>>
<?= $Page->USGLt10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
    <tr id="r_USGLt11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt11"><template id="tpc_ivf_stimulation_chart_USGLt11"><?= $Page->USGLt11->caption() ?></template></span></td>
        <td data-name="USGLt11" <?= $Page->USGLt11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt11"><span id="el_ivf_stimulation_chart_USGLt11">
<span<?= $Page->USGLt11->viewAttributes() ?>>
<?= $Page->USGLt11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
    <tr id="r_USGLt12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt12"><template id="tpc_ivf_stimulation_chart_USGLt12"><?= $Page->USGLt12->caption() ?></template></span></td>
        <td data-name="USGLt12" <?= $Page->USGLt12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt12"><span id="el_ivf_stimulation_chart_USGLt12">
<span<?= $Page->USGLt12->viewAttributes() ?>>
<?= $Page->USGLt12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
    <tr id="r_USGLt13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt13"><template id="tpc_ivf_stimulation_chart_USGLt13"><?= $Page->USGLt13->caption() ?></template></span></td>
        <td data-name="USGLt13" <?= $Page->USGLt13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt13"><span id="el_ivf_stimulation_chart_USGLt13">
<span<?= $Page->USGLt13->viewAttributes() ?>>
<?= $Page->USGLt13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
    <tr id="r_EM1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM1"><template id="tpc_ivf_stimulation_chart_EM1"><?= $Page->EM1->caption() ?></template></span></td>
        <td data-name="EM1" <?= $Page->EM1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM1"><span id="el_ivf_stimulation_chart_EM1">
<span<?= $Page->EM1->viewAttributes() ?>>
<?= $Page->EM1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
    <tr id="r_EM2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM2"><template id="tpc_ivf_stimulation_chart_EM2"><?= $Page->EM2->caption() ?></template></span></td>
        <td data-name="EM2" <?= $Page->EM2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM2"><span id="el_ivf_stimulation_chart_EM2">
<span<?= $Page->EM2->viewAttributes() ?>>
<?= $Page->EM2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
    <tr id="r_EM3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM3"><template id="tpc_ivf_stimulation_chart_EM3"><?= $Page->EM3->caption() ?></template></span></td>
        <td data-name="EM3" <?= $Page->EM3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM3"><span id="el_ivf_stimulation_chart_EM3">
<span<?= $Page->EM3->viewAttributes() ?>>
<?= $Page->EM3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
    <tr id="r_EM4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM4"><template id="tpc_ivf_stimulation_chart_EM4"><?= $Page->EM4->caption() ?></template></span></td>
        <td data-name="EM4" <?= $Page->EM4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM4"><span id="el_ivf_stimulation_chart_EM4">
<span<?= $Page->EM4->viewAttributes() ?>>
<?= $Page->EM4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
    <tr id="r_EM5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM5"><template id="tpc_ivf_stimulation_chart_EM5"><?= $Page->EM5->caption() ?></template></span></td>
        <td data-name="EM5" <?= $Page->EM5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM5"><span id="el_ivf_stimulation_chart_EM5">
<span<?= $Page->EM5->viewAttributes() ?>>
<?= $Page->EM5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
    <tr id="r_EM6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM6"><template id="tpc_ivf_stimulation_chart_EM6"><?= $Page->EM6->caption() ?></template></span></td>
        <td data-name="EM6" <?= $Page->EM6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM6"><span id="el_ivf_stimulation_chart_EM6">
<span<?= $Page->EM6->viewAttributes() ?>>
<?= $Page->EM6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
    <tr id="r_EM7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM7"><template id="tpc_ivf_stimulation_chart_EM7"><?= $Page->EM7->caption() ?></template></span></td>
        <td data-name="EM7" <?= $Page->EM7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM7"><span id="el_ivf_stimulation_chart_EM7">
<span<?= $Page->EM7->viewAttributes() ?>>
<?= $Page->EM7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
    <tr id="r_EM8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM8"><template id="tpc_ivf_stimulation_chart_EM8"><?= $Page->EM8->caption() ?></template></span></td>
        <td data-name="EM8" <?= $Page->EM8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM8"><span id="el_ivf_stimulation_chart_EM8">
<span<?= $Page->EM8->viewAttributes() ?>>
<?= $Page->EM8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
    <tr id="r_EM9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM9"><template id="tpc_ivf_stimulation_chart_EM9"><?= $Page->EM9->caption() ?></template></span></td>
        <td data-name="EM9" <?= $Page->EM9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM9"><span id="el_ivf_stimulation_chart_EM9">
<span<?= $Page->EM9->viewAttributes() ?>>
<?= $Page->EM9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
    <tr id="r_EM10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM10"><template id="tpc_ivf_stimulation_chart_EM10"><?= $Page->EM10->caption() ?></template></span></td>
        <td data-name="EM10" <?= $Page->EM10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM10"><span id="el_ivf_stimulation_chart_EM10">
<span<?= $Page->EM10->viewAttributes() ?>>
<?= $Page->EM10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
    <tr id="r_EM11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM11"><template id="tpc_ivf_stimulation_chart_EM11"><?= $Page->EM11->caption() ?></template></span></td>
        <td data-name="EM11" <?= $Page->EM11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM11"><span id="el_ivf_stimulation_chart_EM11">
<span<?= $Page->EM11->viewAttributes() ?>>
<?= $Page->EM11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
    <tr id="r_EM12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM12"><template id="tpc_ivf_stimulation_chart_EM12"><?= $Page->EM12->caption() ?></template></span></td>
        <td data-name="EM12" <?= $Page->EM12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM12"><span id="el_ivf_stimulation_chart_EM12">
<span<?= $Page->EM12->viewAttributes() ?>>
<?= $Page->EM12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
    <tr id="r_EM13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM13"><template id="tpc_ivf_stimulation_chart_EM13"><?= $Page->EM13->caption() ?></template></span></td>
        <td data-name="EM13" <?= $Page->EM13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM13"><span id="el_ivf_stimulation_chart_EM13">
<span<?= $Page->EM13->viewAttributes() ?>>
<?= $Page->EM13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <tr id="r_Others1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others1"><template id="tpc_ivf_stimulation_chart_Others1"><?= $Page->Others1->caption() ?></template></span></td>
        <td data-name="Others1" <?= $Page->Others1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others1"><span id="el_ivf_stimulation_chart_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <tr id="r_Others2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others2"><template id="tpc_ivf_stimulation_chart_Others2"><?= $Page->Others2->caption() ?></template></span></td>
        <td data-name="Others2" <?= $Page->Others2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others2"><span id="el_ivf_stimulation_chart_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
    <tr id="r_Others3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others3"><template id="tpc_ivf_stimulation_chart_Others3"><?= $Page->Others3->caption() ?></template></span></td>
        <td data-name="Others3" <?= $Page->Others3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others3"><span id="el_ivf_stimulation_chart_Others3">
<span<?= $Page->Others3->viewAttributes() ?>>
<?= $Page->Others3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
    <tr id="r_Others4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others4"><template id="tpc_ivf_stimulation_chart_Others4"><?= $Page->Others4->caption() ?></template></span></td>
        <td data-name="Others4" <?= $Page->Others4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others4"><span id="el_ivf_stimulation_chart_Others4">
<span<?= $Page->Others4->viewAttributes() ?>>
<?= $Page->Others4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
    <tr id="r_Others5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others5"><template id="tpc_ivf_stimulation_chart_Others5"><?= $Page->Others5->caption() ?></template></span></td>
        <td data-name="Others5" <?= $Page->Others5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others5"><span id="el_ivf_stimulation_chart_Others5">
<span<?= $Page->Others5->viewAttributes() ?>>
<?= $Page->Others5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
    <tr id="r_Others6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others6"><template id="tpc_ivf_stimulation_chart_Others6"><?= $Page->Others6->caption() ?></template></span></td>
        <td data-name="Others6" <?= $Page->Others6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others6"><span id="el_ivf_stimulation_chart_Others6">
<span<?= $Page->Others6->viewAttributes() ?>>
<?= $Page->Others6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
    <tr id="r_Others7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others7"><template id="tpc_ivf_stimulation_chart_Others7"><?= $Page->Others7->caption() ?></template></span></td>
        <td data-name="Others7" <?= $Page->Others7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others7"><span id="el_ivf_stimulation_chart_Others7">
<span<?= $Page->Others7->viewAttributes() ?>>
<?= $Page->Others7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
    <tr id="r_Others8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others8"><template id="tpc_ivf_stimulation_chart_Others8"><?= $Page->Others8->caption() ?></template></span></td>
        <td data-name="Others8" <?= $Page->Others8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others8"><span id="el_ivf_stimulation_chart_Others8">
<span<?= $Page->Others8->viewAttributes() ?>>
<?= $Page->Others8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
    <tr id="r_Others9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others9"><template id="tpc_ivf_stimulation_chart_Others9"><?= $Page->Others9->caption() ?></template></span></td>
        <td data-name="Others9" <?= $Page->Others9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others9"><span id="el_ivf_stimulation_chart_Others9">
<span<?= $Page->Others9->viewAttributes() ?>>
<?= $Page->Others9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
    <tr id="r_Others10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others10"><template id="tpc_ivf_stimulation_chart_Others10"><?= $Page->Others10->caption() ?></template></span></td>
        <td data-name="Others10" <?= $Page->Others10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others10"><span id="el_ivf_stimulation_chart_Others10">
<span<?= $Page->Others10->viewAttributes() ?>>
<?= $Page->Others10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
    <tr id="r_Others11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others11"><template id="tpc_ivf_stimulation_chart_Others11"><?= $Page->Others11->caption() ?></template></span></td>
        <td data-name="Others11" <?= $Page->Others11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others11"><span id="el_ivf_stimulation_chart_Others11">
<span<?= $Page->Others11->viewAttributes() ?>>
<?= $Page->Others11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
    <tr id="r_Others12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others12"><template id="tpc_ivf_stimulation_chart_Others12"><?= $Page->Others12->caption() ?></template></span></td>
        <td data-name="Others12" <?= $Page->Others12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others12"><span id="el_ivf_stimulation_chart_Others12">
<span<?= $Page->Others12->viewAttributes() ?>>
<?= $Page->Others12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
    <tr id="r_Others13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others13"><template id="tpc_ivf_stimulation_chart_Others13"><?= $Page->Others13->caption() ?></template></span></td>
        <td data-name="Others13" <?= $Page->Others13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others13"><span id="el_ivf_stimulation_chart_Others13">
<span<?= $Page->Others13->viewAttributes() ?>>
<?= $Page->Others13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
    <tr id="r_DR1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR1"><template id="tpc_ivf_stimulation_chart_DR1"><?= $Page->DR1->caption() ?></template></span></td>
        <td data-name="DR1" <?= $Page->DR1->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR1"><span id="el_ivf_stimulation_chart_DR1">
<span<?= $Page->DR1->viewAttributes() ?>>
<?= $Page->DR1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
    <tr id="r_DR2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR2"><template id="tpc_ivf_stimulation_chart_DR2"><?= $Page->DR2->caption() ?></template></span></td>
        <td data-name="DR2" <?= $Page->DR2->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR2"><span id="el_ivf_stimulation_chart_DR2">
<span<?= $Page->DR2->viewAttributes() ?>>
<?= $Page->DR2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
    <tr id="r_DR3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR3"><template id="tpc_ivf_stimulation_chart_DR3"><?= $Page->DR3->caption() ?></template></span></td>
        <td data-name="DR3" <?= $Page->DR3->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR3"><span id="el_ivf_stimulation_chart_DR3">
<span<?= $Page->DR3->viewAttributes() ?>>
<?= $Page->DR3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
    <tr id="r_DR4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR4"><template id="tpc_ivf_stimulation_chart_DR4"><?= $Page->DR4->caption() ?></template></span></td>
        <td data-name="DR4" <?= $Page->DR4->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR4"><span id="el_ivf_stimulation_chart_DR4">
<span<?= $Page->DR4->viewAttributes() ?>>
<?= $Page->DR4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
    <tr id="r_DR5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR5"><template id="tpc_ivf_stimulation_chart_DR5"><?= $Page->DR5->caption() ?></template></span></td>
        <td data-name="DR5" <?= $Page->DR5->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR5"><span id="el_ivf_stimulation_chart_DR5">
<span<?= $Page->DR5->viewAttributes() ?>>
<?= $Page->DR5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
    <tr id="r_DR6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR6"><template id="tpc_ivf_stimulation_chart_DR6"><?= $Page->DR6->caption() ?></template></span></td>
        <td data-name="DR6" <?= $Page->DR6->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR6"><span id="el_ivf_stimulation_chart_DR6">
<span<?= $Page->DR6->viewAttributes() ?>>
<?= $Page->DR6->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
    <tr id="r_DR7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR7"><template id="tpc_ivf_stimulation_chart_DR7"><?= $Page->DR7->caption() ?></template></span></td>
        <td data-name="DR7" <?= $Page->DR7->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR7"><span id="el_ivf_stimulation_chart_DR7">
<span<?= $Page->DR7->viewAttributes() ?>>
<?= $Page->DR7->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
    <tr id="r_DR8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR8"><template id="tpc_ivf_stimulation_chart_DR8"><?= $Page->DR8->caption() ?></template></span></td>
        <td data-name="DR8" <?= $Page->DR8->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR8"><span id="el_ivf_stimulation_chart_DR8">
<span<?= $Page->DR8->viewAttributes() ?>>
<?= $Page->DR8->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
    <tr id="r_DR9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR9"><template id="tpc_ivf_stimulation_chart_DR9"><?= $Page->DR9->caption() ?></template></span></td>
        <td data-name="DR9" <?= $Page->DR9->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR9"><span id="el_ivf_stimulation_chart_DR9">
<span<?= $Page->DR9->viewAttributes() ?>>
<?= $Page->DR9->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
    <tr id="r_DR10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR10"><template id="tpc_ivf_stimulation_chart_DR10"><?= $Page->DR10->caption() ?></template></span></td>
        <td data-name="DR10" <?= $Page->DR10->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR10"><span id="el_ivf_stimulation_chart_DR10">
<span<?= $Page->DR10->viewAttributes() ?>>
<?= $Page->DR10->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
    <tr id="r_DR11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR11"><template id="tpc_ivf_stimulation_chart_DR11"><?= $Page->DR11->caption() ?></template></span></td>
        <td data-name="DR11" <?= $Page->DR11->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR11"><span id="el_ivf_stimulation_chart_DR11">
<span<?= $Page->DR11->viewAttributes() ?>>
<?= $Page->DR11->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
    <tr id="r_DR12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR12"><template id="tpc_ivf_stimulation_chart_DR12"><?= $Page->DR12->caption() ?></template></span></td>
        <td data-name="DR12" <?= $Page->DR12->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR12"><span id="el_ivf_stimulation_chart_DR12">
<span<?= $Page->DR12->viewAttributes() ?>>
<?= $Page->DR12->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
    <tr id="r_DR13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR13"><template id="tpc_ivf_stimulation_chart_DR13"><?= $Page->DR13->caption() ?></template></span></td>
        <td data-name="DR13" <?= $Page->DR13->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR13"><span id="el_ivf_stimulation_chart_DR13">
<span<?= $Page->DR13->viewAttributes() ?>>
<?= $Page->DR13->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
    <tr id="r_DOCTORRESPONSIBLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE"><template id="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE"><?= $Page->DOCTORRESPONSIBLE->caption() ?></template></span></td>
        <td data-name="DOCTORRESPONSIBLE" <?= $Page->DOCTORRESPONSIBLE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE"><span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<span<?= $Page->DOCTORRESPONSIBLE->viewAttributes() ?>>
<?= $Page->DOCTORRESPONSIBLE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TidNo"><template id="tpc_ivf_stimulation_chart_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TidNo"><span id="el_ivf_stimulation_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
    <tr id="r_Convert">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Convert"><template id="tpc_ivf_stimulation_chart_Convert"><?= $Page->Convert->caption() ?></template></span></td>
        <td data-name="Convert" <?= $Page->Convert->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Convert"><span id="el_ivf_stimulation_chart_Convert">
<span<?= $Page->Convert->viewAttributes() ?>>
<?= $Page->Convert->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Consultant"><template id="tpc_ivf_stimulation_chart_Consultant"><?= $Page->Consultant->caption() ?></template></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Consultant"><span id="el_ivf_stimulation_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <tr id="r_InseminatinTechnique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_InseminatinTechnique"><template id="tpc_ivf_stimulation_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></template></span></td>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_InseminatinTechnique"><span id="el_ivf_stimulation_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <tr id="r_IndicationForART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IndicationForART"><template id="tpc_ivf_stimulation_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></template></span></td>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_IndicationForART"><span id="el_ivf_stimulation_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <tr id="r_Hysteroscopy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Hysteroscopy"><template id="tpc_ivf_stimulation_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?></template></span></td>
        <td data-name="Hysteroscopy" <?= $Page->Hysteroscopy->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Hysteroscopy"><span id="el_ivf_stimulation_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <tr id="r_EndometrialScratching">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EndometrialScratching"><template id="tpc_ivf_stimulation_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?></template></span></td>
        <td data-name="EndometrialScratching" <?= $Page->EndometrialScratching->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EndometrialScratching"><span id="el_ivf_stimulation_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <tr id="r_TrialCannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TrialCannulation"><template id="tpc_ivf_stimulation_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></template></span></td>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TrialCannulation"><span id="el_ivf_stimulation_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <tr id="r_CYCLETYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CYCLETYPE"><template id="tpc_ivf_stimulation_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?></template></span></td>
        <td data-name="CYCLETYPE" <?= $Page->CYCLETYPE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CYCLETYPE"><span id="el_ivf_stimulation_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <tr id="r_HRTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HRTCYCLE"><template id="tpc_ivf_stimulation_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?></template></span></td>
        <td data-name="HRTCYCLE" <?= $Page->HRTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HRTCYCLE"><span id="el_ivf_stimulation_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <tr id="r_OralEstrogenDosage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OralEstrogenDosage"><template id="tpc_ivf_stimulation_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?></template></span></td>
        <td data-name="OralEstrogenDosage" <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_OralEstrogenDosage"><span id="el_ivf_stimulation_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <tr id="r_VaginalEstrogen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_VaginalEstrogen"><template id="tpc_ivf_stimulation_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?></template></span></td>
        <td data-name="VaginalEstrogen" <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_VaginalEstrogen"><span id="el_ivf_stimulation_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <tr id="r_GCSF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GCSF"><template id="tpc_ivf_stimulation_chart_GCSF"><?= $Page->GCSF->caption() ?></template></span></td>
        <td data-name="GCSF" <?= $Page->GCSF->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GCSF"><span id="el_ivf_stimulation_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <tr id="r_ActivatedPRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ActivatedPRP"><template id="tpc_ivf_stimulation_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?></template></span></td>
        <td data-name="ActivatedPRP" <?= $Page->ActivatedPRP->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ActivatedPRP"><span id="el_ivf_stimulation_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <tr id="r_UCLcm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UCLcm"><template id="tpc_ivf_stimulation_chart_UCLcm"><?= $Page->UCLcm->caption() ?></template></span></td>
        <td data-name="UCLcm" <?= $Page->UCLcm->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_UCLcm"><span id="el_ivf_stimulation_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
    <tr id="r_DATOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><template id="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><?= $Page->DATOFEMBRYOTRANSFER->caption() ?></template></span></td>
        <td data-name="DATOFEMBRYOTRANSFER" <?= $Page->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?= $Page->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <tr id="r_DAYOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><template id="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></template></span></td>
        <td data-name="DAYOFEMBRYOTRANSFER" <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <tr id="r_NOOFEMBRYOSTHAWED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><template id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></template></span></td>
        <td data-name="NOOFEMBRYOSTHAWED" <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <tr id="r_NOOFEMBRYOSTRANSFERRED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><template id="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></template></span></td>
        <td data-name="NOOFEMBRYOSTRANSFERRED" <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <tr id="r_DAYOFEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOS"><template id="tpc_ivf_stimulation_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?></template></span></td>
        <td data-name="DAYOFEMBRYOS" <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DAYOFEMBRYOS"><span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <tr id="r_CRYOPRESERVEDEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><template id="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></template></span></td>
        <td data-name="CRYOPRESERVEDEMBRYOS" <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
    <tr id="r_ViaAdmin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaAdmin"><template id="tpc_ivf_stimulation_chart_ViaAdmin"><?= $Page->ViaAdmin->caption() ?></template></span></td>
        <td data-name="ViaAdmin" <?= $Page->ViaAdmin->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ViaAdmin"><span id="el_ivf_stimulation_chart_ViaAdmin">
<span<?= $Page->ViaAdmin->viewAttributes() ?>>
<?= $Page->ViaAdmin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
    <tr id="r_ViaStartDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaStartDateTime"><template id="tpc_ivf_stimulation_chart_ViaStartDateTime"><?= $Page->ViaStartDateTime->caption() ?></template></span></td>
        <td data-name="ViaStartDateTime" <?= $Page->ViaStartDateTime->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ViaStartDateTime"><span id="el_ivf_stimulation_chart_ViaStartDateTime">
<span<?= $Page->ViaStartDateTime->viewAttributes() ?>>
<?= $Page->ViaStartDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
    <tr id="r_ViaDose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaDose"><template id="tpc_ivf_stimulation_chart_ViaDose"><?= $Page->ViaDose->caption() ?></template></span></td>
        <td data-name="ViaDose" <?= $Page->ViaDose->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ViaDose"><span id="el_ivf_stimulation_chart_ViaDose">
<span<?= $Page->ViaDose->viewAttributes() ?>>
<?= $Page->ViaDose->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
    <tr id="r_AllFreeze">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AllFreeze"><template id="tpc_ivf_stimulation_chart_AllFreeze"><?= $Page->AllFreeze->caption() ?></template></span></td>
        <td data-name="AllFreeze" <?= $Page->AllFreeze->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_AllFreeze"><span id="el_ivf_stimulation_chart_AllFreeze">
<span<?= $Page->AllFreeze->viewAttributes() ?>>
<?= $Page->AllFreeze->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
    <tr id="r_TreatmentCancel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TreatmentCancel"><template id="tpc_ivf_stimulation_chart_TreatmentCancel"><?= $Page->TreatmentCancel->caption() ?></template></span></td>
        <td data-name="TreatmentCancel" <?= $Page->TreatmentCancel->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TreatmentCancel"><span id="el_ivf_stimulation_chart_TreatmentCancel">
<span<?= $Page->TreatmentCancel->viewAttributes() ?>>
<?= $Page->TreatmentCancel->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <tr id="r_Reason">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Reason"><template id="tpc_ivf_stimulation_chart_Reason"><?= $Page->Reason->caption() ?></template></span></td>
        <td data-name="Reason" <?= $Page->Reason->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Reason"><span id="el_ivf_stimulation_chart_Reason">
<span<?= $Page->Reason->viewAttributes() ?>>
<?= $Page->Reason->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
    <tr id="r_ProgesteroneAdmin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneAdmin"><template id="tpc_ivf_stimulation_chart_ProgesteroneAdmin"><?= $Page->ProgesteroneAdmin->caption() ?></template></span></td>
        <td data-name="ProgesteroneAdmin" <?= $Page->ProgesteroneAdmin->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ProgesteroneAdmin"><span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<span<?= $Page->ProgesteroneAdmin->viewAttributes() ?>>
<?= $Page->ProgesteroneAdmin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
    <tr id="r_ProgesteroneStart">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneStart"><template id="tpc_ivf_stimulation_chart_ProgesteroneStart"><?= $Page->ProgesteroneStart->caption() ?></template></span></td>
        <td data-name="ProgesteroneStart" <?= $Page->ProgesteroneStart->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ProgesteroneStart"><span id="el_ivf_stimulation_chart_ProgesteroneStart">
<span<?= $Page->ProgesteroneStart->viewAttributes() ?>>
<?= $Page->ProgesteroneStart->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
    <tr id="r_ProgesteroneDose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneDose"><template id="tpc_ivf_stimulation_chart_ProgesteroneDose"><?= $Page->ProgesteroneDose->caption() ?></template></span></td>
        <td data-name="ProgesteroneDose" <?= $Page->ProgesteroneDose->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ProgesteroneDose"><span id="el_ivf_stimulation_chart_ProgesteroneDose">
<span<?= $Page->ProgesteroneDose->viewAttributes() ?>>
<?= $Page->ProgesteroneDose->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Projectron->Visible) { // Projectron ?>
    <tr id="r_Projectron">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Projectron"><template id="tpc_ivf_stimulation_chart_Projectron"><?= $Page->Projectron->caption() ?></template></span></td>
        <td data-name="Projectron" <?= $Page->Projectron->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Projectron"><span id="el_ivf_stimulation_chart_Projectron">
<span<?= $Page->Projectron->viewAttributes() ?>>
<?= $Page->Projectron->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
    <tr id="r_StChDate14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate14"><template id="tpc_ivf_stimulation_chart_StChDate14"><?= $Page->StChDate14->caption() ?></template></span></td>
        <td data-name="StChDate14" <?= $Page->StChDate14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate14"><span id="el_ivf_stimulation_chart_StChDate14">
<span<?= $Page->StChDate14->viewAttributes() ?>>
<?= $Page->StChDate14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
    <tr id="r_StChDate15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate15"><template id="tpc_ivf_stimulation_chart_StChDate15"><?= $Page->StChDate15->caption() ?></template></span></td>
        <td data-name="StChDate15" <?= $Page->StChDate15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate15"><span id="el_ivf_stimulation_chart_StChDate15">
<span<?= $Page->StChDate15->viewAttributes() ?>>
<?= $Page->StChDate15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
    <tr id="r_StChDate16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate16"><template id="tpc_ivf_stimulation_chart_StChDate16"><?= $Page->StChDate16->caption() ?></template></span></td>
        <td data-name="StChDate16" <?= $Page->StChDate16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate16"><span id="el_ivf_stimulation_chart_StChDate16">
<span<?= $Page->StChDate16->viewAttributes() ?>>
<?= $Page->StChDate16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
    <tr id="r_StChDate17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate17"><template id="tpc_ivf_stimulation_chart_StChDate17"><?= $Page->StChDate17->caption() ?></template></span></td>
        <td data-name="StChDate17" <?= $Page->StChDate17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate17"><span id="el_ivf_stimulation_chart_StChDate17">
<span<?= $Page->StChDate17->viewAttributes() ?>>
<?= $Page->StChDate17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
    <tr id="r_StChDate18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate18"><template id="tpc_ivf_stimulation_chart_StChDate18"><?= $Page->StChDate18->caption() ?></template></span></td>
        <td data-name="StChDate18" <?= $Page->StChDate18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate18"><span id="el_ivf_stimulation_chart_StChDate18">
<span<?= $Page->StChDate18->viewAttributes() ?>>
<?= $Page->StChDate18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
    <tr id="r_StChDate19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate19"><template id="tpc_ivf_stimulation_chart_StChDate19"><?= $Page->StChDate19->caption() ?></template></span></td>
        <td data-name="StChDate19" <?= $Page->StChDate19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate19"><span id="el_ivf_stimulation_chart_StChDate19">
<span<?= $Page->StChDate19->viewAttributes() ?>>
<?= $Page->StChDate19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
    <tr id="r_StChDate20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate20"><template id="tpc_ivf_stimulation_chart_StChDate20"><?= $Page->StChDate20->caption() ?></template></span></td>
        <td data-name="StChDate20" <?= $Page->StChDate20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate20"><span id="el_ivf_stimulation_chart_StChDate20">
<span<?= $Page->StChDate20->viewAttributes() ?>>
<?= $Page->StChDate20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
    <tr id="r_StChDate21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate21"><template id="tpc_ivf_stimulation_chart_StChDate21"><?= $Page->StChDate21->caption() ?></template></span></td>
        <td data-name="StChDate21" <?= $Page->StChDate21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate21"><span id="el_ivf_stimulation_chart_StChDate21">
<span<?= $Page->StChDate21->viewAttributes() ?>>
<?= $Page->StChDate21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
    <tr id="r_StChDate22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate22"><template id="tpc_ivf_stimulation_chart_StChDate22"><?= $Page->StChDate22->caption() ?></template></span></td>
        <td data-name="StChDate22" <?= $Page->StChDate22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate22"><span id="el_ivf_stimulation_chart_StChDate22">
<span<?= $Page->StChDate22->viewAttributes() ?>>
<?= $Page->StChDate22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
    <tr id="r_StChDate23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate23"><template id="tpc_ivf_stimulation_chart_StChDate23"><?= $Page->StChDate23->caption() ?></template></span></td>
        <td data-name="StChDate23" <?= $Page->StChDate23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate23"><span id="el_ivf_stimulation_chart_StChDate23">
<span<?= $Page->StChDate23->viewAttributes() ?>>
<?= $Page->StChDate23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
    <tr id="r_StChDate24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate24"><template id="tpc_ivf_stimulation_chart_StChDate24"><?= $Page->StChDate24->caption() ?></template></span></td>
        <td data-name="StChDate24" <?= $Page->StChDate24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate24"><span id="el_ivf_stimulation_chart_StChDate24">
<span<?= $Page->StChDate24->viewAttributes() ?>>
<?= $Page->StChDate24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
    <tr id="r_StChDate25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate25"><template id="tpc_ivf_stimulation_chart_StChDate25"><?= $Page->StChDate25->caption() ?></template></span></td>
        <td data-name="StChDate25" <?= $Page->StChDate25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StChDate25"><span id="el_ivf_stimulation_chart_StChDate25">
<span<?= $Page->StChDate25->viewAttributes() ?>>
<?= $Page->StChDate25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
    <tr id="r_CycleDay14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay14"><template id="tpc_ivf_stimulation_chart_CycleDay14"><?= $Page->CycleDay14->caption() ?></template></span></td>
        <td data-name="CycleDay14" <?= $Page->CycleDay14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay14"><span id="el_ivf_stimulation_chart_CycleDay14">
<span<?= $Page->CycleDay14->viewAttributes() ?>>
<?= $Page->CycleDay14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
    <tr id="r_CycleDay15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay15"><template id="tpc_ivf_stimulation_chart_CycleDay15"><?= $Page->CycleDay15->caption() ?></template></span></td>
        <td data-name="CycleDay15" <?= $Page->CycleDay15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay15"><span id="el_ivf_stimulation_chart_CycleDay15">
<span<?= $Page->CycleDay15->viewAttributes() ?>>
<?= $Page->CycleDay15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
    <tr id="r_CycleDay16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay16"><template id="tpc_ivf_stimulation_chart_CycleDay16"><?= $Page->CycleDay16->caption() ?></template></span></td>
        <td data-name="CycleDay16" <?= $Page->CycleDay16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay16"><span id="el_ivf_stimulation_chart_CycleDay16">
<span<?= $Page->CycleDay16->viewAttributes() ?>>
<?= $Page->CycleDay16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
    <tr id="r_CycleDay17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay17"><template id="tpc_ivf_stimulation_chart_CycleDay17"><?= $Page->CycleDay17->caption() ?></template></span></td>
        <td data-name="CycleDay17" <?= $Page->CycleDay17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay17"><span id="el_ivf_stimulation_chart_CycleDay17">
<span<?= $Page->CycleDay17->viewAttributes() ?>>
<?= $Page->CycleDay17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
    <tr id="r_CycleDay18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay18"><template id="tpc_ivf_stimulation_chart_CycleDay18"><?= $Page->CycleDay18->caption() ?></template></span></td>
        <td data-name="CycleDay18" <?= $Page->CycleDay18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay18"><span id="el_ivf_stimulation_chart_CycleDay18">
<span<?= $Page->CycleDay18->viewAttributes() ?>>
<?= $Page->CycleDay18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
    <tr id="r_CycleDay19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay19"><template id="tpc_ivf_stimulation_chart_CycleDay19"><?= $Page->CycleDay19->caption() ?></template></span></td>
        <td data-name="CycleDay19" <?= $Page->CycleDay19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay19"><span id="el_ivf_stimulation_chart_CycleDay19">
<span<?= $Page->CycleDay19->viewAttributes() ?>>
<?= $Page->CycleDay19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
    <tr id="r_CycleDay20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay20"><template id="tpc_ivf_stimulation_chart_CycleDay20"><?= $Page->CycleDay20->caption() ?></template></span></td>
        <td data-name="CycleDay20" <?= $Page->CycleDay20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay20"><span id="el_ivf_stimulation_chart_CycleDay20">
<span<?= $Page->CycleDay20->viewAttributes() ?>>
<?= $Page->CycleDay20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
    <tr id="r_CycleDay21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay21"><template id="tpc_ivf_stimulation_chart_CycleDay21"><?= $Page->CycleDay21->caption() ?></template></span></td>
        <td data-name="CycleDay21" <?= $Page->CycleDay21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay21"><span id="el_ivf_stimulation_chart_CycleDay21">
<span<?= $Page->CycleDay21->viewAttributes() ?>>
<?= $Page->CycleDay21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
    <tr id="r_CycleDay22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay22"><template id="tpc_ivf_stimulation_chart_CycleDay22"><?= $Page->CycleDay22->caption() ?></template></span></td>
        <td data-name="CycleDay22" <?= $Page->CycleDay22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay22"><span id="el_ivf_stimulation_chart_CycleDay22">
<span<?= $Page->CycleDay22->viewAttributes() ?>>
<?= $Page->CycleDay22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
    <tr id="r_CycleDay23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay23"><template id="tpc_ivf_stimulation_chart_CycleDay23"><?= $Page->CycleDay23->caption() ?></template></span></td>
        <td data-name="CycleDay23" <?= $Page->CycleDay23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay23"><span id="el_ivf_stimulation_chart_CycleDay23">
<span<?= $Page->CycleDay23->viewAttributes() ?>>
<?= $Page->CycleDay23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
    <tr id="r_CycleDay24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay24"><template id="tpc_ivf_stimulation_chart_CycleDay24"><?= $Page->CycleDay24->caption() ?></template></span></td>
        <td data-name="CycleDay24" <?= $Page->CycleDay24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay24"><span id="el_ivf_stimulation_chart_CycleDay24">
<span<?= $Page->CycleDay24->viewAttributes() ?>>
<?= $Page->CycleDay24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
    <tr id="r_CycleDay25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay25"><template id="tpc_ivf_stimulation_chart_CycleDay25"><?= $Page->CycleDay25->caption() ?></template></span></td>
        <td data-name="CycleDay25" <?= $Page->CycleDay25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_CycleDay25"><span id="el_ivf_stimulation_chart_CycleDay25">
<span<?= $Page->CycleDay25->viewAttributes() ?>>
<?= $Page->CycleDay25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
    <tr id="r_StimulationDay14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay14"><template id="tpc_ivf_stimulation_chart_StimulationDay14"><?= $Page->StimulationDay14->caption() ?></template></span></td>
        <td data-name="StimulationDay14" <?= $Page->StimulationDay14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay14"><span id="el_ivf_stimulation_chart_StimulationDay14">
<span<?= $Page->StimulationDay14->viewAttributes() ?>>
<?= $Page->StimulationDay14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
    <tr id="r_StimulationDay15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay15"><template id="tpc_ivf_stimulation_chart_StimulationDay15"><?= $Page->StimulationDay15->caption() ?></template></span></td>
        <td data-name="StimulationDay15" <?= $Page->StimulationDay15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay15"><span id="el_ivf_stimulation_chart_StimulationDay15">
<span<?= $Page->StimulationDay15->viewAttributes() ?>>
<?= $Page->StimulationDay15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
    <tr id="r_StimulationDay16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay16"><template id="tpc_ivf_stimulation_chart_StimulationDay16"><?= $Page->StimulationDay16->caption() ?></template></span></td>
        <td data-name="StimulationDay16" <?= $Page->StimulationDay16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay16"><span id="el_ivf_stimulation_chart_StimulationDay16">
<span<?= $Page->StimulationDay16->viewAttributes() ?>>
<?= $Page->StimulationDay16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
    <tr id="r_StimulationDay17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay17"><template id="tpc_ivf_stimulation_chart_StimulationDay17"><?= $Page->StimulationDay17->caption() ?></template></span></td>
        <td data-name="StimulationDay17" <?= $Page->StimulationDay17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay17"><span id="el_ivf_stimulation_chart_StimulationDay17">
<span<?= $Page->StimulationDay17->viewAttributes() ?>>
<?= $Page->StimulationDay17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
    <tr id="r_StimulationDay18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay18"><template id="tpc_ivf_stimulation_chart_StimulationDay18"><?= $Page->StimulationDay18->caption() ?></template></span></td>
        <td data-name="StimulationDay18" <?= $Page->StimulationDay18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay18"><span id="el_ivf_stimulation_chart_StimulationDay18">
<span<?= $Page->StimulationDay18->viewAttributes() ?>>
<?= $Page->StimulationDay18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
    <tr id="r_StimulationDay19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay19"><template id="tpc_ivf_stimulation_chart_StimulationDay19"><?= $Page->StimulationDay19->caption() ?></template></span></td>
        <td data-name="StimulationDay19" <?= $Page->StimulationDay19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay19"><span id="el_ivf_stimulation_chart_StimulationDay19">
<span<?= $Page->StimulationDay19->viewAttributes() ?>>
<?= $Page->StimulationDay19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
    <tr id="r_StimulationDay20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay20"><template id="tpc_ivf_stimulation_chart_StimulationDay20"><?= $Page->StimulationDay20->caption() ?></template></span></td>
        <td data-name="StimulationDay20" <?= $Page->StimulationDay20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay20"><span id="el_ivf_stimulation_chart_StimulationDay20">
<span<?= $Page->StimulationDay20->viewAttributes() ?>>
<?= $Page->StimulationDay20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
    <tr id="r_StimulationDay21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay21"><template id="tpc_ivf_stimulation_chart_StimulationDay21"><?= $Page->StimulationDay21->caption() ?></template></span></td>
        <td data-name="StimulationDay21" <?= $Page->StimulationDay21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay21"><span id="el_ivf_stimulation_chart_StimulationDay21">
<span<?= $Page->StimulationDay21->viewAttributes() ?>>
<?= $Page->StimulationDay21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
    <tr id="r_StimulationDay22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay22"><template id="tpc_ivf_stimulation_chart_StimulationDay22"><?= $Page->StimulationDay22->caption() ?></template></span></td>
        <td data-name="StimulationDay22" <?= $Page->StimulationDay22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay22"><span id="el_ivf_stimulation_chart_StimulationDay22">
<span<?= $Page->StimulationDay22->viewAttributes() ?>>
<?= $Page->StimulationDay22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
    <tr id="r_StimulationDay23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay23"><template id="tpc_ivf_stimulation_chart_StimulationDay23"><?= $Page->StimulationDay23->caption() ?></template></span></td>
        <td data-name="StimulationDay23" <?= $Page->StimulationDay23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay23"><span id="el_ivf_stimulation_chart_StimulationDay23">
<span<?= $Page->StimulationDay23->viewAttributes() ?>>
<?= $Page->StimulationDay23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
    <tr id="r_StimulationDay24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay24"><template id="tpc_ivf_stimulation_chart_StimulationDay24"><?= $Page->StimulationDay24->caption() ?></template></span></td>
        <td data-name="StimulationDay24" <?= $Page->StimulationDay24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay24"><span id="el_ivf_stimulation_chart_StimulationDay24">
<span<?= $Page->StimulationDay24->viewAttributes() ?>>
<?= $Page->StimulationDay24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
    <tr id="r_StimulationDay25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay25"><template id="tpc_ivf_stimulation_chart_StimulationDay25"><?= $Page->StimulationDay25->caption() ?></template></span></td>
        <td data-name="StimulationDay25" <?= $Page->StimulationDay25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_StimulationDay25"><span id="el_ivf_stimulation_chart_StimulationDay25">
<span<?= $Page->StimulationDay25->viewAttributes() ?>>
<?= $Page->StimulationDay25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
    <tr id="r_Tablet14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet14"><template id="tpc_ivf_stimulation_chart_Tablet14"><?= $Page->Tablet14->caption() ?></template></span></td>
        <td data-name="Tablet14" <?= $Page->Tablet14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet14"><span id="el_ivf_stimulation_chart_Tablet14">
<span<?= $Page->Tablet14->viewAttributes() ?>>
<?= $Page->Tablet14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
    <tr id="r_Tablet15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet15"><template id="tpc_ivf_stimulation_chart_Tablet15"><?= $Page->Tablet15->caption() ?></template></span></td>
        <td data-name="Tablet15" <?= $Page->Tablet15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet15"><span id="el_ivf_stimulation_chart_Tablet15">
<span<?= $Page->Tablet15->viewAttributes() ?>>
<?= $Page->Tablet15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
    <tr id="r_Tablet16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet16"><template id="tpc_ivf_stimulation_chart_Tablet16"><?= $Page->Tablet16->caption() ?></template></span></td>
        <td data-name="Tablet16" <?= $Page->Tablet16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet16"><span id="el_ivf_stimulation_chart_Tablet16">
<span<?= $Page->Tablet16->viewAttributes() ?>>
<?= $Page->Tablet16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
    <tr id="r_Tablet17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet17"><template id="tpc_ivf_stimulation_chart_Tablet17"><?= $Page->Tablet17->caption() ?></template></span></td>
        <td data-name="Tablet17" <?= $Page->Tablet17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet17"><span id="el_ivf_stimulation_chart_Tablet17">
<span<?= $Page->Tablet17->viewAttributes() ?>>
<?= $Page->Tablet17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
    <tr id="r_Tablet18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet18"><template id="tpc_ivf_stimulation_chart_Tablet18"><?= $Page->Tablet18->caption() ?></template></span></td>
        <td data-name="Tablet18" <?= $Page->Tablet18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet18"><span id="el_ivf_stimulation_chart_Tablet18">
<span<?= $Page->Tablet18->viewAttributes() ?>>
<?= $Page->Tablet18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
    <tr id="r_Tablet19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet19"><template id="tpc_ivf_stimulation_chart_Tablet19"><?= $Page->Tablet19->caption() ?></template></span></td>
        <td data-name="Tablet19" <?= $Page->Tablet19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet19"><span id="el_ivf_stimulation_chart_Tablet19">
<span<?= $Page->Tablet19->viewAttributes() ?>>
<?= $Page->Tablet19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
    <tr id="r_Tablet20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet20"><template id="tpc_ivf_stimulation_chart_Tablet20"><?= $Page->Tablet20->caption() ?></template></span></td>
        <td data-name="Tablet20" <?= $Page->Tablet20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet20"><span id="el_ivf_stimulation_chart_Tablet20">
<span<?= $Page->Tablet20->viewAttributes() ?>>
<?= $Page->Tablet20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
    <tr id="r_Tablet21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet21"><template id="tpc_ivf_stimulation_chart_Tablet21"><?= $Page->Tablet21->caption() ?></template></span></td>
        <td data-name="Tablet21" <?= $Page->Tablet21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet21"><span id="el_ivf_stimulation_chart_Tablet21">
<span<?= $Page->Tablet21->viewAttributes() ?>>
<?= $Page->Tablet21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
    <tr id="r_Tablet22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet22"><template id="tpc_ivf_stimulation_chart_Tablet22"><?= $Page->Tablet22->caption() ?></template></span></td>
        <td data-name="Tablet22" <?= $Page->Tablet22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet22"><span id="el_ivf_stimulation_chart_Tablet22">
<span<?= $Page->Tablet22->viewAttributes() ?>>
<?= $Page->Tablet22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
    <tr id="r_Tablet23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet23"><template id="tpc_ivf_stimulation_chart_Tablet23"><?= $Page->Tablet23->caption() ?></template></span></td>
        <td data-name="Tablet23" <?= $Page->Tablet23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet23"><span id="el_ivf_stimulation_chart_Tablet23">
<span<?= $Page->Tablet23->viewAttributes() ?>>
<?= $Page->Tablet23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
    <tr id="r_Tablet24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet24"><template id="tpc_ivf_stimulation_chart_Tablet24"><?= $Page->Tablet24->caption() ?></template></span></td>
        <td data-name="Tablet24" <?= $Page->Tablet24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet24"><span id="el_ivf_stimulation_chart_Tablet24">
<span<?= $Page->Tablet24->viewAttributes() ?>>
<?= $Page->Tablet24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
    <tr id="r_Tablet25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet25"><template id="tpc_ivf_stimulation_chart_Tablet25"><?= $Page->Tablet25->caption() ?></template></span></td>
        <td data-name="Tablet25" <?= $Page->Tablet25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Tablet25"><span id="el_ivf_stimulation_chart_Tablet25">
<span<?= $Page->Tablet25->viewAttributes() ?>>
<?= $Page->Tablet25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
    <tr id="r_RFSH14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH14"><template id="tpc_ivf_stimulation_chart_RFSH14"><?= $Page->RFSH14->caption() ?></template></span></td>
        <td data-name="RFSH14" <?= $Page->RFSH14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH14"><span id="el_ivf_stimulation_chart_RFSH14">
<span<?= $Page->RFSH14->viewAttributes() ?>>
<?= $Page->RFSH14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
    <tr id="r_RFSH15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH15"><template id="tpc_ivf_stimulation_chart_RFSH15"><?= $Page->RFSH15->caption() ?></template></span></td>
        <td data-name="RFSH15" <?= $Page->RFSH15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH15"><span id="el_ivf_stimulation_chart_RFSH15">
<span<?= $Page->RFSH15->viewAttributes() ?>>
<?= $Page->RFSH15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
    <tr id="r_RFSH16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH16"><template id="tpc_ivf_stimulation_chart_RFSH16"><?= $Page->RFSH16->caption() ?></template></span></td>
        <td data-name="RFSH16" <?= $Page->RFSH16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH16"><span id="el_ivf_stimulation_chart_RFSH16">
<span<?= $Page->RFSH16->viewAttributes() ?>>
<?= $Page->RFSH16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
    <tr id="r_RFSH17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH17"><template id="tpc_ivf_stimulation_chart_RFSH17"><?= $Page->RFSH17->caption() ?></template></span></td>
        <td data-name="RFSH17" <?= $Page->RFSH17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH17"><span id="el_ivf_stimulation_chart_RFSH17">
<span<?= $Page->RFSH17->viewAttributes() ?>>
<?= $Page->RFSH17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
    <tr id="r_RFSH18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH18"><template id="tpc_ivf_stimulation_chart_RFSH18"><?= $Page->RFSH18->caption() ?></template></span></td>
        <td data-name="RFSH18" <?= $Page->RFSH18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH18"><span id="el_ivf_stimulation_chart_RFSH18">
<span<?= $Page->RFSH18->viewAttributes() ?>>
<?= $Page->RFSH18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
    <tr id="r_RFSH19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH19"><template id="tpc_ivf_stimulation_chart_RFSH19"><?= $Page->RFSH19->caption() ?></template></span></td>
        <td data-name="RFSH19" <?= $Page->RFSH19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH19"><span id="el_ivf_stimulation_chart_RFSH19">
<span<?= $Page->RFSH19->viewAttributes() ?>>
<?= $Page->RFSH19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
    <tr id="r_RFSH20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH20"><template id="tpc_ivf_stimulation_chart_RFSH20"><?= $Page->RFSH20->caption() ?></template></span></td>
        <td data-name="RFSH20" <?= $Page->RFSH20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH20"><span id="el_ivf_stimulation_chart_RFSH20">
<span<?= $Page->RFSH20->viewAttributes() ?>>
<?= $Page->RFSH20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
    <tr id="r_RFSH21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH21"><template id="tpc_ivf_stimulation_chart_RFSH21"><?= $Page->RFSH21->caption() ?></template></span></td>
        <td data-name="RFSH21" <?= $Page->RFSH21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH21"><span id="el_ivf_stimulation_chart_RFSH21">
<span<?= $Page->RFSH21->viewAttributes() ?>>
<?= $Page->RFSH21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
    <tr id="r_RFSH22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH22"><template id="tpc_ivf_stimulation_chart_RFSH22"><?= $Page->RFSH22->caption() ?></template></span></td>
        <td data-name="RFSH22" <?= $Page->RFSH22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH22"><span id="el_ivf_stimulation_chart_RFSH22">
<span<?= $Page->RFSH22->viewAttributes() ?>>
<?= $Page->RFSH22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
    <tr id="r_RFSH23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH23"><template id="tpc_ivf_stimulation_chart_RFSH23"><?= $Page->RFSH23->caption() ?></template></span></td>
        <td data-name="RFSH23" <?= $Page->RFSH23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH23"><span id="el_ivf_stimulation_chart_RFSH23">
<span<?= $Page->RFSH23->viewAttributes() ?>>
<?= $Page->RFSH23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
    <tr id="r_RFSH24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH24"><template id="tpc_ivf_stimulation_chart_RFSH24"><?= $Page->RFSH24->caption() ?></template></span></td>
        <td data-name="RFSH24" <?= $Page->RFSH24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH24"><span id="el_ivf_stimulation_chart_RFSH24">
<span<?= $Page->RFSH24->viewAttributes() ?>>
<?= $Page->RFSH24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
    <tr id="r_RFSH25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH25"><template id="tpc_ivf_stimulation_chart_RFSH25"><?= $Page->RFSH25->caption() ?></template></span></td>
        <td data-name="RFSH25" <?= $Page->RFSH25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_RFSH25"><span id="el_ivf_stimulation_chart_RFSH25">
<span<?= $Page->RFSH25->viewAttributes() ?>>
<?= $Page->RFSH25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
    <tr id="r_HMG14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG14"><template id="tpc_ivf_stimulation_chart_HMG14"><?= $Page->HMG14->caption() ?></template></span></td>
        <td data-name="HMG14" <?= $Page->HMG14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG14"><span id="el_ivf_stimulation_chart_HMG14">
<span<?= $Page->HMG14->viewAttributes() ?>>
<?= $Page->HMG14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
    <tr id="r_HMG15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG15"><template id="tpc_ivf_stimulation_chart_HMG15"><?= $Page->HMG15->caption() ?></template></span></td>
        <td data-name="HMG15" <?= $Page->HMG15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG15"><span id="el_ivf_stimulation_chart_HMG15">
<span<?= $Page->HMG15->viewAttributes() ?>>
<?= $Page->HMG15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
    <tr id="r_HMG16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG16"><template id="tpc_ivf_stimulation_chart_HMG16"><?= $Page->HMG16->caption() ?></template></span></td>
        <td data-name="HMG16" <?= $Page->HMG16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG16"><span id="el_ivf_stimulation_chart_HMG16">
<span<?= $Page->HMG16->viewAttributes() ?>>
<?= $Page->HMG16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
    <tr id="r_HMG17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG17"><template id="tpc_ivf_stimulation_chart_HMG17"><?= $Page->HMG17->caption() ?></template></span></td>
        <td data-name="HMG17" <?= $Page->HMG17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG17"><span id="el_ivf_stimulation_chart_HMG17">
<span<?= $Page->HMG17->viewAttributes() ?>>
<?= $Page->HMG17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
    <tr id="r_HMG18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG18"><template id="tpc_ivf_stimulation_chart_HMG18"><?= $Page->HMG18->caption() ?></template></span></td>
        <td data-name="HMG18" <?= $Page->HMG18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG18"><span id="el_ivf_stimulation_chart_HMG18">
<span<?= $Page->HMG18->viewAttributes() ?>>
<?= $Page->HMG18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
    <tr id="r_HMG19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG19"><template id="tpc_ivf_stimulation_chart_HMG19"><?= $Page->HMG19->caption() ?></template></span></td>
        <td data-name="HMG19" <?= $Page->HMG19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG19"><span id="el_ivf_stimulation_chart_HMG19">
<span<?= $Page->HMG19->viewAttributes() ?>>
<?= $Page->HMG19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
    <tr id="r_HMG20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG20"><template id="tpc_ivf_stimulation_chart_HMG20"><?= $Page->HMG20->caption() ?></template></span></td>
        <td data-name="HMG20" <?= $Page->HMG20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG20"><span id="el_ivf_stimulation_chart_HMG20">
<span<?= $Page->HMG20->viewAttributes() ?>>
<?= $Page->HMG20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
    <tr id="r_HMG21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG21"><template id="tpc_ivf_stimulation_chart_HMG21"><?= $Page->HMG21->caption() ?></template></span></td>
        <td data-name="HMG21" <?= $Page->HMG21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG21"><span id="el_ivf_stimulation_chart_HMG21">
<span<?= $Page->HMG21->viewAttributes() ?>>
<?= $Page->HMG21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
    <tr id="r_HMG22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG22"><template id="tpc_ivf_stimulation_chart_HMG22"><?= $Page->HMG22->caption() ?></template></span></td>
        <td data-name="HMG22" <?= $Page->HMG22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG22"><span id="el_ivf_stimulation_chart_HMG22">
<span<?= $Page->HMG22->viewAttributes() ?>>
<?= $Page->HMG22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
    <tr id="r_HMG23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG23"><template id="tpc_ivf_stimulation_chart_HMG23"><?= $Page->HMG23->caption() ?></template></span></td>
        <td data-name="HMG23" <?= $Page->HMG23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG23"><span id="el_ivf_stimulation_chart_HMG23">
<span<?= $Page->HMG23->viewAttributes() ?>>
<?= $Page->HMG23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
    <tr id="r_HMG24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG24"><template id="tpc_ivf_stimulation_chart_HMG24"><?= $Page->HMG24->caption() ?></template></span></td>
        <td data-name="HMG24" <?= $Page->HMG24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG24"><span id="el_ivf_stimulation_chart_HMG24">
<span<?= $Page->HMG24->viewAttributes() ?>>
<?= $Page->HMG24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
    <tr id="r_HMG25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG25"><template id="tpc_ivf_stimulation_chart_HMG25"><?= $Page->HMG25->caption() ?></template></span></td>
        <td data-name="HMG25" <?= $Page->HMG25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HMG25"><span id="el_ivf_stimulation_chart_HMG25">
<span<?= $Page->HMG25->viewAttributes() ?>>
<?= $Page->HMG25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
    <tr id="r_GnRH14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH14"><template id="tpc_ivf_stimulation_chart_GnRH14"><?= $Page->GnRH14->caption() ?></template></span></td>
        <td data-name="GnRH14" <?= $Page->GnRH14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH14"><span id="el_ivf_stimulation_chart_GnRH14">
<span<?= $Page->GnRH14->viewAttributes() ?>>
<?= $Page->GnRH14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
    <tr id="r_GnRH15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH15"><template id="tpc_ivf_stimulation_chart_GnRH15"><?= $Page->GnRH15->caption() ?></template></span></td>
        <td data-name="GnRH15" <?= $Page->GnRH15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH15"><span id="el_ivf_stimulation_chart_GnRH15">
<span<?= $Page->GnRH15->viewAttributes() ?>>
<?= $Page->GnRH15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
    <tr id="r_GnRH16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH16"><template id="tpc_ivf_stimulation_chart_GnRH16"><?= $Page->GnRH16->caption() ?></template></span></td>
        <td data-name="GnRH16" <?= $Page->GnRH16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH16"><span id="el_ivf_stimulation_chart_GnRH16">
<span<?= $Page->GnRH16->viewAttributes() ?>>
<?= $Page->GnRH16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
    <tr id="r_GnRH17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH17"><template id="tpc_ivf_stimulation_chart_GnRH17"><?= $Page->GnRH17->caption() ?></template></span></td>
        <td data-name="GnRH17" <?= $Page->GnRH17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH17"><span id="el_ivf_stimulation_chart_GnRH17">
<span<?= $Page->GnRH17->viewAttributes() ?>>
<?= $Page->GnRH17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
    <tr id="r_GnRH18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH18"><template id="tpc_ivf_stimulation_chart_GnRH18"><?= $Page->GnRH18->caption() ?></template></span></td>
        <td data-name="GnRH18" <?= $Page->GnRH18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH18"><span id="el_ivf_stimulation_chart_GnRH18">
<span<?= $Page->GnRH18->viewAttributes() ?>>
<?= $Page->GnRH18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
    <tr id="r_GnRH19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH19"><template id="tpc_ivf_stimulation_chart_GnRH19"><?= $Page->GnRH19->caption() ?></template></span></td>
        <td data-name="GnRH19" <?= $Page->GnRH19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH19"><span id="el_ivf_stimulation_chart_GnRH19">
<span<?= $Page->GnRH19->viewAttributes() ?>>
<?= $Page->GnRH19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
    <tr id="r_GnRH20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH20"><template id="tpc_ivf_stimulation_chart_GnRH20"><?= $Page->GnRH20->caption() ?></template></span></td>
        <td data-name="GnRH20" <?= $Page->GnRH20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH20"><span id="el_ivf_stimulation_chart_GnRH20">
<span<?= $Page->GnRH20->viewAttributes() ?>>
<?= $Page->GnRH20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
    <tr id="r_GnRH21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH21"><template id="tpc_ivf_stimulation_chart_GnRH21"><?= $Page->GnRH21->caption() ?></template></span></td>
        <td data-name="GnRH21" <?= $Page->GnRH21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH21"><span id="el_ivf_stimulation_chart_GnRH21">
<span<?= $Page->GnRH21->viewAttributes() ?>>
<?= $Page->GnRH21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
    <tr id="r_GnRH22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH22"><template id="tpc_ivf_stimulation_chart_GnRH22"><?= $Page->GnRH22->caption() ?></template></span></td>
        <td data-name="GnRH22" <?= $Page->GnRH22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH22"><span id="el_ivf_stimulation_chart_GnRH22">
<span<?= $Page->GnRH22->viewAttributes() ?>>
<?= $Page->GnRH22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
    <tr id="r_GnRH23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH23"><template id="tpc_ivf_stimulation_chart_GnRH23"><?= $Page->GnRH23->caption() ?></template></span></td>
        <td data-name="GnRH23" <?= $Page->GnRH23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH23"><span id="el_ivf_stimulation_chart_GnRH23">
<span<?= $Page->GnRH23->viewAttributes() ?>>
<?= $Page->GnRH23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
    <tr id="r_GnRH24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH24"><template id="tpc_ivf_stimulation_chart_GnRH24"><?= $Page->GnRH24->caption() ?></template></span></td>
        <td data-name="GnRH24" <?= $Page->GnRH24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH24"><span id="el_ivf_stimulation_chart_GnRH24">
<span<?= $Page->GnRH24->viewAttributes() ?>>
<?= $Page->GnRH24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
    <tr id="r_GnRH25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH25"><template id="tpc_ivf_stimulation_chart_GnRH25"><?= $Page->GnRH25->caption() ?></template></span></td>
        <td data-name="GnRH25" <?= $Page->GnRH25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_GnRH25"><span id="el_ivf_stimulation_chart_GnRH25">
<span<?= $Page->GnRH25->viewAttributes() ?>>
<?= $Page->GnRH25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
    <tr id="r_P414">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P414"><template id="tpc_ivf_stimulation_chart_P414"><?= $Page->P414->caption() ?></template></span></td>
        <td data-name="P414" <?= $Page->P414->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P414"><span id="el_ivf_stimulation_chart_P414">
<span<?= $Page->P414->viewAttributes() ?>>
<?= $Page->P414->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
    <tr id="r_P415">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P415"><template id="tpc_ivf_stimulation_chart_P415"><?= $Page->P415->caption() ?></template></span></td>
        <td data-name="P415" <?= $Page->P415->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P415"><span id="el_ivf_stimulation_chart_P415">
<span<?= $Page->P415->viewAttributes() ?>>
<?= $Page->P415->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
    <tr id="r_P416">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P416"><template id="tpc_ivf_stimulation_chart_P416"><?= $Page->P416->caption() ?></template></span></td>
        <td data-name="P416" <?= $Page->P416->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P416"><span id="el_ivf_stimulation_chart_P416">
<span<?= $Page->P416->viewAttributes() ?>>
<?= $Page->P416->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
    <tr id="r_P417">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P417"><template id="tpc_ivf_stimulation_chart_P417"><?= $Page->P417->caption() ?></template></span></td>
        <td data-name="P417" <?= $Page->P417->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P417"><span id="el_ivf_stimulation_chart_P417">
<span<?= $Page->P417->viewAttributes() ?>>
<?= $Page->P417->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
    <tr id="r_P418">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P418"><template id="tpc_ivf_stimulation_chart_P418"><?= $Page->P418->caption() ?></template></span></td>
        <td data-name="P418" <?= $Page->P418->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P418"><span id="el_ivf_stimulation_chart_P418">
<span<?= $Page->P418->viewAttributes() ?>>
<?= $Page->P418->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
    <tr id="r_P419">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P419"><template id="tpc_ivf_stimulation_chart_P419"><?= $Page->P419->caption() ?></template></span></td>
        <td data-name="P419" <?= $Page->P419->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P419"><span id="el_ivf_stimulation_chart_P419">
<span<?= $Page->P419->viewAttributes() ?>>
<?= $Page->P419->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
    <tr id="r_P420">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P420"><template id="tpc_ivf_stimulation_chart_P420"><?= $Page->P420->caption() ?></template></span></td>
        <td data-name="P420" <?= $Page->P420->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P420"><span id="el_ivf_stimulation_chart_P420">
<span<?= $Page->P420->viewAttributes() ?>>
<?= $Page->P420->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
    <tr id="r_P421">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P421"><template id="tpc_ivf_stimulation_chart_P421"><?= $Page->P421->caption() ?></template></span></td>
        <td data-name="P421" <?= $Page->P421->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P421"><span id="el_ivf_stimulation_chart_P421">
<span<?= $Page->P421->viewAttributes() ?>>
<?= $Page->P421->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
    <tr id="r_P422">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P422"><template id="tpc_ivf_stimulation_chart_P422"><?= $Page->P422->caption() ?></template></span></td>
        <td data-name="P422" <?= $Page->P422->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P422"><span id="el_ivf_stimulation_chart_P422">
<span<?= $Page->P422->viewAttributes() ?>>
<?= $Page->P422->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
    <tr id="r_P423">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P423"><template id="tpc_ivf_stimulation_chart_P423"><?= $Page->P423->caption() ?></template></span></td>
        <td data-name="P423" <?= $Page->P423->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P423"><span id="el_ivf_stimulation_chart_P423">
<span<?= $Page->P423->viewAttributes() ?>>
<?= $Page->P423->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
    <tr id="r_P424">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P424"><template id="tpc_ivf_stimulation_chart_P424"><?= $Page->P424->caption() ?></template></span></td>
        <td data-name="P424" <?= $Page->P424->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P424"><span id="el_ivf_stimulation_chart_P424">
<span<?= $Page->P424->viewAttributes() ?>>
<?= $Page->P424->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
    <tr id="r_P425">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P425"><template id="tpc_ivf_stimulation_chart_P425"><?= $Page->P425->caption() ?></template></span></td>
        <td data-name="P425" <?= $Page->P425->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_P425"><span id="el_ivf_stimulation_chart_P425">
<span<?= $Page->P425->viewAttributes() ?>>
<?= $Page->P425->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
    <tr id="r_USGRt14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt14"><template id="tpc_ivf_stimulation_chart_USGRt14"><?= $Page->USGRt14->caption() ?></template></span></td>
        <td data-name="USGRt14" <?= $Page->USGRt14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt14"><span id="el_ivf_stimulation_chart_USGRt14">
<span<?= $Page->USGRt14->viewAttributes() ?>>
<?= $Page->USGRt14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
    <tr id="r_USGRt15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt15"><template id="tpc_ivf_stimulation_chart_USGRt15"><?= $Page->USGRt15->caption() ?></template></span></td>
        <td data-name="USGRt15" <?= $Page->USGRt15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt15"><span id="el_ivf_stimulation_chart_USGRt15">
<span<?= $Page->USGRt15->viewAttributes() ?>>
<?= $Page->USGRt15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
    <tr id="r_USGRt16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt16"><template id="tpc_ivf_stimulation_chart_USGRt16"><?= $Page->USGRt16->caption() ?></template></span></td>
        <td data-name="USGRt16" <?= $Page->USGRt16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt16"><span id="el_ivf_stimulation_chart_USGRt16">
<span<?= $Page->USGRt16->viewAttributes() ?>>
<?= $Page->USGRt16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
    <tr id="r_USGRt17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt17"><template id="tpc_ivf_stimulation_chart_USGRt17"><?= $Page->USGRt17->caption() ?></template></span></td>
        <td data-name="USGRt17" <?= $Page->USGRt17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt17"><span id="el_ivf_stimulation_chart_USGRt17">
<span<?= $Page->USGRt17->viewAttributes() ?>>
<?= $Page->USGRt17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
    <tr id="r_USGRt18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt18"><template id="tpc_ivf_stimulation_chart_USGRt18"><?= $Page->USGRt18->caption() ?></template></span></td>
        <td data-name="USGRt18" <?= $Page->USGRt18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt18"><span id="el_ivf_stimulation_chart_USGRt18">
<span<?= $Page->USGRt18->viewAttributes() ?>>
<?= $Page->USGRt18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
    <tr id="r_USGRt19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt19"><template id="tpc_ivf_stimulation_chart_USGRt19"><?= $Page->USGRt19->caption() ?></template></span></td>
        <td data-name="USGRt19" <?= $Page->USGRt19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt19"><span id="el_ivf_stimulation_chart_USGRt19">
<span<?= $Page->USGRt19->viewAttributes() ?>>
<?= $Page->USGRt19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
    <tr id="r_USGRt20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt20"><template id="tpc_ivf_stimulation_chart_USGRt20"><?= $Page->USGRt20->caption() ?></template></span></td>
        <td data-name="USGRt20" <?= $Page->USGRt20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt20"><span id="el_ivf_stimulation_chart_USGRt20">
<span<?= $Page->USGRt20->viewAttributes() ?>>
<?= $Page->USGRt20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
    <tr id="r_USGRt21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt21"><template id="tpc_ivf_stimulation_chart_USGRt21"><?= $Page->USGRt21->caption() ?></template></span></td>
        <td data-name="USGRt21" <?= $Page->USGRt21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt21"><span id="el_ivf_stimulation_chart_USGRt21">
<span<?= $Page->USGRt21->viewAttributes() ?>>
<?= $Page->USGRt21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
    <tr id="r_USGRt22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt22"><template id="tpc_ivf_stimulation_chart_USGRt22"><?= $Page->USGRt22->caption() ?></template></span></td>
        <td data-name="USGRt22" <?= $Page->USGRt22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt22"><span id="el_ivf_stimulation_chart_USGRt22">
<span<?= $Page->USGRt22->viewAttributes() ?>>
<?= $Page->USGRt22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
    <tr id="r_USGRt23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt23"><template id="tpc_ivf_stimulation_chart_USGRt23"><?= $Page->USGRt23->caption() ?></template></span></td>
        <td data-name="USGRt23" <?= $Page->USGRt23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt23"><span id="el_ivf_stimulation_chart_USGRt23">
<span<?= $Page->USGRt23->viewAttributes() ?>>
<?= $Page->USGRt23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
    <tr id="r_USGRt24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt24"><template id="tpc_ivf_stimulation_chart_USGRt24"><?= $Page->USGRt24->caption() ?></template></span></td>
        <td data-name="USGRt24" <?= $Page->USGRt24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt24"><span id="el_ivf_stimulation_chart_USGRt24">
<span<?= $Page->USGRt24->viewAttributes() ?>>
<?= $Page->USGRt24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
    <tr id="r_USGRt25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt25"><template id="tpc_ivf_stimulation_chart_USGRt25"><?= $Page->USGRt25->caption() ?></template></span></td>
        <td data-name="USGRt25" <?= $Page->USGRt25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGRt25"><span id="el_ivf_stimulation_chart_USGRt25">
<span<?= $Page->USGRt25->viewAttributes() ?>>
<?= $Page->USGRt25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
    <tr id="r_USGLt14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt14"><template id="tpc_ivf_stimulation_chart_USGLt14"><?= $Page->USGLt14->caption() ?></template></span></td>
        <td data-name="USGLt14" <?= $Page->USGLt14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt14"><span id="el_ivf_stimulation_chart_USGLt14">
<span<?= $Page->USGLt14->viewAttributes() ?>>
<?= $Page->USGLt14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
    <tr id="r_USGLt15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt15"><template id="tpc_ivf_stimulation_chart_USGLt15"><?= $Page->USGLt15->caption() ?></template></span></td>
        <td data-name="USGLt15" <?= $Page->USGLt15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt15"><span id="el_ivf_stimulation_chart_USGLt15">
<span<?= $Page->USGLt15->viewAttributes() ?>>
<?= $Page->USGLt15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
    <tr id="r_USGLt16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt16"><template id="tpc_ivf_stimulation_chart_USGLt16"><?= $Page->USGLt16->caption() ?></template></span></td>
        <td data-name="USGLt16" <?= $Page->USGLt16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt16"><span id="el_ivf_stimulation_chart_USGLt16">
<span<?= $Page->USGLt16->viewAttributes() ?>>
<?= $Page->USGLt16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
    <tr id="r_USGLt17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt17"><template id="tpc_ivf_stimulation_chart_USGLt17"><?= $Page->USGLt17->caption() ?></template></span></td>
        <td data-name="USGLt17" <?= $Page->USGLt17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt17"><span id="el_ivf_stimulation_chart_USGLt17">
<span<?= $Page->USGLt17->viewAttributes() ?>>
<?= $Page->USGLt17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
    <tr id="r_USGLt18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt18"><template id="tpc_ivf_stimulation_chart_USGLt18"><?= $Page->USGLt18->caption() ?></template></span></td>
        <td data-name="USGLt18" <?= $Page->USGLt18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt18"><span id="el_ivf_stimulation_chart_USGLt18">
<span<?= $Page->USGLt18->viewAttributes() ?>>
<?= $Page->USGLt18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
    <tr id="r_USGLt19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt19"><template id="tpc_ivf_stimulation_chart_USGLt19"><?= $Page->USGLt19->caption() ?></template></span></td>
        <td data-name="USGLt19" <?= $Page->USGLt19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt19"><span id="el_ivf_stimulation_chart_USGLt19">
<span<?= $Page->USGLt19->viewAttributes() ?>>
<?= $Page->USGLt19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
    <tr id="r_USGLt20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt20"><template id="tpc_ivf_stimulation_chart_USGLt20"><?= $Page->USGLt20->caption() ?></template></span></td>
        <td data-name="USGLt20" <?= $Page->USGLt20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt20"><span id="el_ivf_stimulation_chart_USGLt20">
<span<?= $Page->USGLt20->viewAttributes() ?>>
<?= $Page->USGLt20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
    <tr id="r_USGLt21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt21"><template id="tpc_ivf_stimulation_chart_USGLt21"><?= $Page->USGLt21->caption() ?></template></span></td>
        <td data-name="USGLt21" <?= $Page->USGLt21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt21"><span id="el_ivf_stimulation_chart_USGLt21">
<span<?= $Page->USGLt21->viewAttributes() ?>>
<?= $Page->USGLt21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
    <tr id="r_USGLt22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt22"><template id="tpc_ivf_stimulation_chart_USGLt22"><?= $Page->USGLt22->caption() ?></template></span></td>
        <td data-name="USGLt22" <?= $Page->USGLt22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt22"><span id="el_ivf_stimulation_chart_USGLt22">
<span<?= $Page->USGLt22->viewAttributes() ?>>
<?= $Page->USGLt22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
    <tr id="r_USGLt23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt23"><template id="tpc_ivf_stimulation_chart_USGLt23"><?= $Page->USGLt23->caption() ?></template></span></td>
        <td data-name="USGLt23" <?= $Page->USGLt23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt23"><span id="el_ivf_stimulation_chart_USGLt23">
<span<?= $Page->USGLt23->viewAttributes() ?>>
<?= $Page->USGLt23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
    <tr id="r_USGLt24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt24"><template id="tpc_ivf_stimulation_chart_USGLt24"><?= $Page->USGLt24->caption() ?></template></span></td>
        <td data-name="USGLt24" <?= $Page->USGLt24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt24"><span id="el_ivf_stimulation_chart_USGLt24">
<span<?= $Page->USGLt24->viewAttributes() ?>>
<?= $Page->USGLt24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
    <tr id="r_USGLt25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt25"><template id="tpc_ivf_stimulation_chart_USGLt25"><?= $Page->USGLt25->caption() ?></template></span></td>
        <td data-name="USGLt25" <?= $Page->USGLt25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_USGLt25"><span id="el_ivf_stimulation_chart_USGLt25">
<span<?= $Page->USGLt25->viewAttributes() ?>>
<?= $Page->USGLt25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
    <tr id="r_EM14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM14"><template id="tpc_ivf_stimulation_chart_EM14"><?= $Page->EM14->caption() ?></template></span></td>
        <td data-name="EM14" <?= $Page->EM14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM14"><span id="el_ivf_stimulation_chart_EM14">
<span<?= $Page->EM14->viewAttributes() ?>>
<?= $Page->EM14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
    <tr id="r_EM15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM15"><template id="tpc_ivf_stimulation_chart_EM15"><?= $Page->EM15->caption() ?></template></span></td>
        <td data-name="EM15" <?= $Page->EM15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM15"><span id="el_ivf_stimulation_chart_EM15">
<span<?= $Page->EM15->viewAttributes() ?>>
<?= $Page->EM15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
    <tr id="r_EM16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM16"><template id="tpc_ivf_stimulation_chart_EM16"><?= $Page->EM16->caption() ?></template></span></td>
        <td data-name="EM16" <?= $Page->EM16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM16"><span id="el_ivf_stimulation_chart_EM16">
<span<?= $Page->EM16->viewAttributes() ?>>
<?= $Page->EM16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
    <tr id="r_EM17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM17"><template id="tpc_ivf_stimulation_chart_EM17"><?= $Page->EM17->caption() ?></template></span></td>
        <td data-name="EM17" <?= $Page->EM17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM17"><span id="el_ivf_stimulation_chart_EM17">
<span<?= $Page->EM17->viewAttributes() ?>>
<?= $Page->EM17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
    <tr id="r_EM18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM18"><template id="tpc_ivf_stimulation_chart_EM18"><?= $Page->EM18->caption() ?></template></span></td>
        <td data-name="EM18" <?= $Page->EM18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM18"><span id="el_ivf_stimulation_chart_EM18">
<span<?= $Page->EM18->viewAttributes() ?>>
<?= $Page->EM18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
    <tr id="r_EM19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM19"><template id="tpc_ivf_stimulation_chart_EM19"><?= $Page->EM19->caption() ?></template></span></td>
        <td data-name="EM19" <?= $Page->EM19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM19"><span id="el_ivf_stimulation_chart_EM19">
<span<?= $Page->EM19->viewAttributes() ?>>
<?= $Page->EM19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
    <tr id="r_EM20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM20"><template id="tpc_ivf_stimulation_chart_EM20"><?= $Page->EM20->caption() ?></template></span></td>
        <td data-name="EM20" <?= $Page->EM20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM20"><span id="el_ivf_stimulation_chart_EM20">
<span<?= $Page->EM20->viewAttributes() ?>>
<?= $Page->EM20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
    <tr id="r_EM21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM21"><template id="tpc_ivf_stimulation_chart_EM21"><?= $Page->EM21->caption() ?></template></span></td>
        <td data-name="EM21" <?= $Page->EM21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM21"><span id="el_ivf_stimulation_chart_EM21">
<span<?= $Page->EM21->viewAttributes() ?>>
<?= $Page->EM21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
    <tr id="r_EM22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM22"><template id="tpc_ivf_stimulation_chart_EM22"><?= $Page->EM22->caption() ?></template></span></td>
        <td data-name="EM22" <?= $Page->EM22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM22"><span id="el_ivf_stimulation_chart_EM22">
<span<?= $Page->EM22->viewAttributes() ?>>
<?= $Page->EM22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
    <tr id="r_EM23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM23"><template id="tpc_ivf_stimulation_chart_EM23"><?= $Page->EM23->caption() ?></template></span></td>
        <td data-name="EM23" <?= $Page->EM23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM23"><span id="el_ivf_stimulation_chart_EM23">
<span<?= $Page->EM23->viewAttributes() ?>>
<?= $Page->EM23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
    <tr id="r_EM24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM24"><template id="tpc_ivf_stimulation_chart_EM24"><?= $Page->EM24->caption() ?></template></span></td>
        <td data-name="EM24" <?= $Page->EM24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM24"><span id="el_ivf_stimulation_chart_EM24">
<span<?= $Page->EM24->viewAttributes() ?>>
<?= $Page->EM24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
    <tr id="r_EM25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM25"><template id="tpc_ivf_stimulation_chart_EM25"><?= $Page->EM25->caption() ?></template></span></td>
        <td data-name="EM25" <?= $Page->EM25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EM25"><span id="el_ivf_stimulation_chart_EM25">
<span<?= $Page->EM25->viewAttributes() ?>>
<?= $Page->EM25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
    <tr id="r_Others14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others14"><template id="tpc_ivf_stimulation_chart_Others14"><?= $Page->Others14->caption() ?></template></span></td>
        <td data-name="Others14" <?= $Page->Others14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others14"><span id="el_ivf_stimulation_chart_Others14">
<span<?= $Page->Others14->viewAttributes() ?>>
<?= $Page->Others14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
    <tr id="r_Others15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others15"><template id="tpc_ivf_stimulation_chart_Others15"><?= $Page->Others15->caption() ?></template></span></td>
        <td data-name="Others15" <?= $Page->Others15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others15"><span id="el_ivf_stimulation_chart_Others15">
<span<?= $Page->Others15->viewAttributes() ?>>
<?= $Page->Others15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
    <tr id="r_Others16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others16"><template id="tpc_ivf_stimulation_chart_Others16"><?= $Page->Others16->caption() ?></template></span></td>
        <td data-name="Others16" <?= $Page->Others16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others16"><span id="el_ivf_stimulation_chart_Others16">
<span<?= $Page->Others16->viewAttributes() ?>>
<?= $Page->Others16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
    <tr id="r_Others17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others17"><template id="tpc_ivf_stimulation_chart_Others17"><?= $Page->Others17->caption() ?></template></span></td>
        <td data-name="Others17" <?= $Page->Others17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others17"><span id="el_ivf_stimulation_chart_Others17">
<span<?= $Page->Others17->viewAttributes() ?>>
<?= $Page->Others17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
    <tr id="r_Others18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others18"><template id="tpc_ivf_stimulation_chart_Others18"><?= $Page->Others18->caption() ?></template></span></td>
        <td data-name="Others18" <?= $Page->Others18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others18"><span id="el_ivf_stimulation_chart_Others18">
<span<?= $Page->Others18->viewAttributes() ?>>
<?= $Page->Others18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
    <tr id="r_Others19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others19"><template id="tpc_ivf_stimulation_chart_Others19"><?= $Page->Others19->caption() ?></template></span></td>
        <td data-name="Others19" <?= $Page->Others19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others19"><span id="el_ivf_stimulation_chart_Others19">
<span<?= $Page->Others19->viewAttributes() ?>>
<?= $Page->Others19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
    <tr id="r_Others20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others20"><template id="tpc_ivf_stimulation_chart_Others20"><?= $Page->Others20->caption() ?></template></span></td>
        <td data-name="Others20" <?= $Page->Others20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others20"><span id="el_ivf_stimulation_chart_Others20">
<span<?= $Page->Others20->viewAttributes() ?>>
<?= $Page->Others20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
    <tr id="r_Others21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others21"><template id="tpc_ivf_stimulation_chart_Others21"><?= $Page->Others21->caption() ?></template></span></td>
        <td data-name="Others21" <?= $Page->Others21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others21"><span id="el_ivf_stimulation_chart_Others21">
<span<?= $Page->Others21->viewAttributes() ?>>
<?= $Page->Others21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
    <tr id="r_Others22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others22"><template id="tpc_ivf_stimulation_chart_Others22"><?= $Page->Others22->caption() ?></template></span></td>
        <td data-name="Others22" <?= $Page->Others22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others22"><span id="el_ivf_stimulation_chart_Others22">
<span<?= $Page->Others22->viewAttributes() ?>>
<?= $Page->Others22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
    <tr id="r_Others23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others23"><template id="tpc_ivf_stimulation_chart_Others23"><?= $Page->Others23->caption() ?></template></span></td>
        <td data-name="Others23" <?= $Page->Others23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others23"><span id="el_ivf_stimulation_chart_Others23">
<span<?= $Page->Others23->viewAttributes() ?>>
<?= $Page->Others23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
    <tr id="r_Others24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others24"><template id="tpc_ivf_stimulation_chart_Others24"><?= $Page->Others24->caption() ?></template></span></td>
        <td data-name="Others24" <?= $Page->Others24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others24"><span id="el_ivf_stimulation_chart_Others24">
<span<?= $Page->Others24->viewAttributes() ?>>
<?= $Page->Others24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
    <tr id="r_Others25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others25"><template id="tpc_ivf_stimulation_chart_Others25"><?= $Page->Others25->caption() ?></template></span></td>
        <td data-name="Others25" <?= $Page->Others25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_Others25"><span id="el_ivf_stimulation_chart_Others25">
<span<?= $Page->Others25->viewAttributes() ?>>
<?= $Page->Others25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
    <tr id="r_DR14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR14"><template id="tpc_ivf_stimulation_chart_DR14"><?= $Page->DR14->caption() ?></template></span></td>
        <td data-name="DR14" <?= $Page->DR14->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR14"><span id="el_ivf_stimulation_chart_DR14">
<span<?= $Page->DR14->viewAttributes() ?>>
<?= $Page->DR14->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
    <tr id="r_DR15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR15"><template id="tpc_ivf_stimulation_chart_DR15"><?= $Page->DR15->caption() ?></template></span></td>
        <td data-name="DR15" <?= $Page->DR15->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR15"><span id="el_ivf_stimulation_chart_DR15">
<span<?= $Page->DR15->viewAttributes() ?>>
<?= $Page->DR15->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
    <tr id="r_DR16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR16"><template id="tpc_ivf_stimulation_chart_DR16"><?= $Page->DR16->caption() ?></template></span></td>
        <td data-name="DR16" <?= $Page->DR16->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR16"><span id="el_ivf_stimulation_chart_DR16">
<span<?= $Page->DR16->viewAttributes() ?>>
<?= $Page->DR16->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
    <tr id="r_DR17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR17"><template id="tpc_ivf_stimulation_chart_DR17"><?= $Page->DR17->caption() ?></template></span></td>
        <td data-name="DR17" <?= $Page->DR17->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR17"><span id="el_ivf_stimulation_chart_DR17">
<span<?= $Page->DR17->viewAttributes() ?>>
<?= $Page->DR17->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
    <tr id="r_DR18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR18"><template id="tpc_ivf_stimulation_chart_DR18"><?= $Page->DR18->caption() ?></template></span></td>
        <td data-name="DR18" <?= $Page->DR18->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR18"><span id="el_ivf_stimulation_chart_DR18">
<span<?= $Page->DR18->viewAttributes() ?>>
<?= $Page->DR18->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
    <tr id="r_DR19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR19"><template id="tpc_ivf_stimulation_chart_DR19"><?= $Page->DR19->caption() ?></template></span></td>
        <td data-name="DR19" <?= $Page->DR19->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR19"><span id="el_ivf_stimulation_chart_DR19">
<span<?= $Page->DR19->viewAttributes() ?>>
<?= $Page->DR19->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
    <tr id="r_DR20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR20"><template id="tpc_ivf_stimulation_chart_DR20"><?= $Page->DR20->caption() ?></template></span></td>
        <td data-name="DR20" <?= $Page->DR20->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR20"><span id="el_ivf_stimulation_chart_DR20">
<span<?= $Page->DR20->viewAttributes() ?>>
<?= $Page->DR20->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
    <tr id="r_DR21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR21"><template id="tpc_ivf_stimulation_chart_DR21"><?= $Page->DR21->caption() ?></template></span></td>
        <td data-name="DR21" <?= $Page->DR21->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR21"><span id="el_ivf_stimulation_chart_DR21">
<span<?= $Page->DR21->viewAttributes() ?>>
<?= $Page->DR21->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
    <tr id="r_DR22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR22"><template id="tpc_ivf_stimulation_chart_DR22"><?= $Page->DR22->caption() ?></template></span></td>
        <td data-name="DR22" <?= $Page->DR22->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR22"><span id="el_ivf_stimulation_chart_DR22">
<span<?= $Page->DR22->viewAttributes() ?>>
<?= $Page->DR22->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
    <tr id="r_DR23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR23"><template id="tpc_ivf_stimulation_chart_DR23"><?= $Page->DR23->caption() ?></template></span></td>
        <td data-name="DR23" <?= $Page->DR23->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR23"><span id="el_ivf_stimulation_chart_DR23">
<span<?= $Page->DR23->viewAttributes() ?>>
<?= $Page->DR23->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
    <tr id="r_DR24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR24"><template id="tpc_ivf_stimulation_chart_DR24"><?= $Page->DR24->caption() ?></template></span></td>
        <td data-name="DR24" <?= $Page->DR24->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR24"><span id="el_ivf_stimulation_chart_DR24">
<span<?= $Page->DR24->viewAttributes() ?>>
<?= $Page->DR24->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
    <tr id="r_DR25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR25"><template id="tpc_ivf_stimulation_chart_DR25"><?= $Page->DR25->caption() ?></template></span></td>
        <td data-name="DR25" <?= $Page->DR25->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DR25"><span id="el_ivf_stimulation_chart_DR25">
<span<?= $Page->DR25->viewAttributes() ?>>
<?= $Page->DR25->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
    <tr id="r_E214">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E214"><template id="tpc_ivf_stimulation_chart_E214"><?= $Page->E214->caption() ?></template></span></td>
        <td data-name="E214" <?= $Page->E214->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E214"><span id="el_ivf_stimulation_chart_E214">
<span<?= $Page->E214->viewAttributes() ?>>
<?= $Page->E214->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
    <tr id="r_E215">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E215"><template id="tpc_ivf_stimulation_chart_E215"><?= $Page->E215->caption() ?></template></span></td>
        <td data-name="E215" <?= $Page->E215->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E215"><span id="el_ivf_stimulation_chart_E215">
<span<?= $Page->E215->viewAttributes() ?>>
<?= $Page->E215->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
    <tr id="r_E216">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E216"><template id="tpc_ivf_stimulation_chart_E216"><?= $Page->E216->caption() ?></template></span></td>
        <td data-name="E216" <?= $Page->E216->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E216"><span id="el_ivf_stimulation_chart_E216">
<span<?= $Page->E216->viewAttributes() ?>>
<?= $Page->E216->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
    <tr id="r_E217">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E217"><template id="tpc_ivf_stimulation_chart_E217"><?= $Page->E217->caption() ?></template></span></td>
        <td data-name="E217" <?= $Page->E217->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E217"><span id="el_ivf_stimulation_chart_E217">
<span<?= $Page->E217->viewAttributes() ?>>
<?= $Page->E217->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
    <tr id="r_E218">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E218"><template id="tpc_ivf_stimulation_chart_E218"><?= $Page->E218->caption() ?></template></span></td>
        <td data-name="E218" <?= $Page->E218->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E218"><span id="el_ivf_stimulation_chart_E218">
<span<?= $Page->E218->viewAttributes() ?>>
<?= $Page->E218->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
    <tr id="r_E219">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E219"><template id="tpc_ivf_stimulation_chart_E219"><?= $Page->E219->caption() ?></template></span></td>
        <td data-name="E219" <?= $Page->E219->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E219"><span id="el_ivf_stimulation_chart_E219">
<span<?= $Page->E219->viewAttributes() ?>>
<?= $Page->E219->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
    <tr id="r_E220">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E220"><template id="tpc_ivf_stimulation_chart_E220"><?= $Page->E220->caption() ?></template></span></td>
        <td data-name="E220" <?= $Page->E220->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E220"><span id="el_ivf_stimulation_chart_E220">
<span<?= $Page->E220->viewAttributes() ?>>
<?= $Page->E220->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
    <tr id="r_E221">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E221"><template id="tpc_ivf_stimulation_chart_E221"><?= $Page->E221->caption() ?></template></span></td>
        <td data-name="E221" <?= $Page->E221->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E221"><span id="el_ivf_stimulation_chart_E221">
<span<?= $Page->E221->viewAttributes() ?>>
<?= $Page->E221->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
    <tr id="r_E222">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E222"><template id="tpc_ivf_stimulation_chart_E222"><?= $Page->E222->caption() ?></template></span></td>
        <td data-name="E222" <?= $Page->E222->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E222"><span id="el_ivf_stimulation_chart_E222">
<span<?= $Page->E222->viewAttributes() ?>>
<?= $Page->E222->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
    <tr id="r_E223">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E223"><template id="tpc_ivf_stimulation_chart_E223"><?= $Page->E223->caption() ?></template></span></td>
        <td data-name="E223" <?= $Page->E223->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E223"><span id="el_ivf_stimulation_chart_E223">
<span<?= $Page->E223->viewAttributes() ?>>
<?= $Page->E223->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
    <tr id="r_E224">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E224"><template id="tpc_ivf_stimulation_chart_E224"><?= $Page->E224->caption() ?></template></span></td>
        <td data-name="E224" <?= $Page->E224->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E224"><span id="el_ivf_stimulation_chart_E224">
<span<?= $Page->E224->viewAttributes() ?>>
<?= $Page->E224->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
    <tr id="r_E225">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E225"><template id="tpc_ivf_stimulation_chart_E225"><?= $Page->E225->caption() ?></template></span></td>
        <td data-name="E225" <?= $Page->E225->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_E225"><span id="el_ivf_stimulation_chart_E225">
<span<?= $Page->E225->viewAttributes() ?>>
<?= $Page->E225->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
    <tr id="r_EEETTTDTE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EEETTTDTE"><template id="tpc_ivf_stimulation_chart_EEETTTDTE"><?= $Page->EEETTTDTE->caption() ?></template></span></td>
        <td data-name="EEETTTDTE" <?= $Page->EEETTTDTE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EEETTTDTE"><span id="el_ivf_stimulation_chart_EEETTTDTE">
<span<?= $Page->EEETTTDTE->viewAttributes() ?>>
<?= $Page->EEETTTDTE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
    <tr id="r_bhcgdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_bhcgdate"><template id="tpc_ivf_stimulation_chart_bhcgdate"><?= $Page->bhcgdate->caption() ?></template></span></td>
        <td data-name="bhcgdate" <?= $Page->bhcgdate->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_bhcgdate"><span id="el_ivf_stimulation_chart_bhcgdate">
<span<?= $Page->bhcgdate->viewAttributes() ?>>
<?= $Page->bhcgdate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
    <tr id="r_TUBAL_PATENCY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TUBAL_PATENCY"><template id="tpc_ivf_stimulation_chart_TUBAL_PATENCY"><?= $Page->TUBAL_PATENCY->caption() ?></template></span></td>
        <td data-name="TUBAL_PATENCY" <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TUBAL_PATENCY"><span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
<span<?= $Page->TUBAL_PATENCY->viewAttributes() ?>>
<?= $Page->TUBAL_PATENCY->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
    <tr id="r_HSG">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HSG"><template id="tpc_ivf_stimulation_chart_HSG"><?= $Page->HSG->caption() ?></template></span></td>
        <td data-name="HSG" <?= $Page->HSG->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_HSG"><span id="el_ivf_stimulation_chart_HSG">
<span<?= $Page->HSG->viewAttributes() ?>>
<?= $Page->HSG->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
    <tr id="r_DHL">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DHL"><template id="tpc_ivf_stimulation_chart_DHL"><?= $Page->DHL->caption() ?></template></span></td>
        <td data-name="DHL" <?= $Page->DHL->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_DHL"><span id="el_ivf_stimulation_chart_DHL">
<span<?= $Page->DHL->viewAttributes() ?>>
<?= $Page->DHL->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
    <tr id="r_UTERINE_PROBLEMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS"><template id="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS"><?= $Page->UTERINE_PROBLEMS->caption() ?></template></span></td>
        <td data-name="UTERINE_PROBLEMS" <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS"><span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?= $Page->UTERINE_PROBLEMS->viewAttributes() ?>>
<?= $Page->UTERINE_PROBLEMS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
    <tr id="r_W_COMORBIDS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_W_COMORBIDS"><template id="tpc_ivf_stimulation_chart_W_COMORBIDS"><?= $Page->W_COMORBIDS->caption() ?></template></span></td>
        <td data-name="W_COMORBIDS" <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_W_COMORBIDS"><span id="el_ivf_stimulation_chart_W_COMORBIDS">
<span<?= $Page->W_COMORBIDS->viewAttributes() ?>>
<?= $Page->W_COMORBIDS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
    <tr id="r_H_COMORBIDS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_H_COMORBIDS"><template id="tpc_ivf_stimulation_chart_H_COMORBIDS"><?= $Page->H_COMORBIDS->caption() ?></template></span></td>
        <td data-name="H_COMORBIDS" <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_H_COMORBIDS"><span id="el_ivf_stimulation_chart_H_COMORBIDS">
<span<?= $Page->H_COMORBIDS->viewAttributes() ?>>
<?= $Page->H_COMORBIDS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
    <tr id="r_SEXUAL_DYSFUNCTION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><template id="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?></template></span></td>
        <td data-name="SEXUAL_DYSFUNCTION" <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?= $Page->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?= $Page->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
    <tr id="r_TABLETS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TABLETS"><template id="tpc_ivf_stimulation_chart_TABLETS"><?= $Page->TABLETS->caption() ?></template></span></td>
        <td data-name="TABLETS" <?= $Page->TABLETS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_TABLETS"><span id="el_ivf_stimulation_chart_TABLETS">
<span<?= $Page->TABLETS->viewAttributes() ?>>
<?= $Page->TABLETS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
    <tr id="r_FOLLICLE_STATUS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FOLLICLE_STATUS"><template id="tpc_ivf_stimulation_chart_FOLLICLE_STATUS"><?= $Page->FOLLICLE_STATUS->caption() ?></template></span></td>
        <td data-name="FOLLICLE_STATUS" <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_FOLLICLE_STATUS"><span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?= $Page->FOLLICLE_STATUS->viewAttributes() ?>>
<?= $Page->FOLLICLE_STATUS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
    <tr id="r_NUMBER_OF_IUI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NUMBER_OF_IUI"><template id="tpc_ivf_stimulation_chart_NUMBER_OF_IUI"><?= $Page->NUMBER_OF_IUI->caption() ?></template></span></td>
        <td data-name="NUMBER_OF_IUI" <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_NUMBER_OF_IUI"><span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?= $Page->NUMBER_OF_IUI->viewAttributes() ?>>
<?= $Page->NUMBER_OF_IUI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <tr id="r_PROCEDURE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PROCEDURE"><template id="tpc_ivf_stimulation_chart_PROCEDURE"><?= $Page->PROCEDURE->caption() ?></template></span></td>
        <td data-name="PROCEDURE" <?= $Page->PROCEDURE->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_PROCEDURE"><span id="el_ivf_stimulation_chart_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
    <tr id="r_LUTEAL_SUPPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT"><template id="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT"><?= $Page->LUTEAL_SUPPORT->caption() ?></template></span></td>
        <td data-name="LUTEAL_SUPPORT" <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT"><span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?= $Page->LUTEAL_SUPPORT->viewAttributes() ?>>
<?= $Page->LUTEAL_SUPPORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
    <tr id="r_SPECIFIC_MATERNAL_PROBLEMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><template id="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></template></span></td>
        <td data-name="SPECIFIC_MATERNAL_PROBLEMS" <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
    <tr id="r_ONGOING_PREG">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ONGOING_PREG"><template id="tpc_ivf_stimulation_chart_ONGOING_PREG"><?= $Page->ONGOING_PREG->caption() ?></template></span></td>
        <td data-name="ONGOING_PREG" <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_ONGOING_PREG"><span id="el_ivf_stimulation_chart_ONGOING_PREG">
<span<?= $Page->ONGOING_PREG->viewAttributes() ?>>
<?= $Page->ONGOING_PREG->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
    <tr id="r_EDD_Date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EDD_Date"><template id="tpc_ivf_stimulation_chart_EDD_Date"><?= $Page->EDD_Date->caption() ?></template></span></td>
        <td data-name="EDD_Date" <?= $Page->EDD_Date->cellAttributes() ?>>
<template id="tpx_ivf_stimulation_chart_EDD_Date"><span id="el_ivf_stimulation_chart_EDD_Date">
<span<?= $Page->EDD_Date->viewAttributes() ?>>
<?= $Page->EDD_Date->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_stimulation_chartview" class="ew-custom-template"></div>
<template id="tpm_ivf_stimulation_chartview">
<div id="ct_IvfStimulationChartView"><style>
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
.ew-export-table td {
	padding: .0rem;
	border-bottom: 1px solid;
	border-top: 1px solid;
	border-left: 1px solid;
	border-right: 1px solid;
	border-color: #cfcfcf;
}
.card-bodyya {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.card-bodyyaa {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.table {
	width: auto;
	margin-bottom: 1rem;
	background-color: transparent;
}
.content-header {
	padding: 0px .0rem;
}
.container-fluid {
	width: 100%;
	padding-right: 0px;
	padding-left: 0px;
	margin-right: auto;
	margin-left: auto;
}
.mb-2, .progress-group, .my-2 {
	margin-bottom: .0rem !important;
}
.content-header h1 {
	font-size: 1.2rem;
	margin: 0;
}
.mb-3, .small-box, .card, .info-box, .callout, .my-3 {
	margin-bottom: 0.1rem !important;
}
.widget-user .widget-user-header {
	padding: 0.4rem;
	height: 70px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 14px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgb(0 0 0 / 20%);
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
	margin-bottom: .05rem;
	font-family: inherit;
	font-weight: 500;
	line-height: 1.2;
	color: inherit;
}
.widget-user .widget-user-image {
	position: absolute;
	top: 1px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-image>img {
	width: 60px;
	height: auto;
	border: 3px solid #fff;
}
.description-block {
	display: block;
	margin: 0px 0;
	text-align: center;
}
.description-block>.description-header {
	margin: 0;
	padding: 0;
	font-weight: 400;
	font-size: 12px;
}
.card-header {
	position: relative;
	background-color: transparent;
	border-bottom: 1px solid #f4f4f4;
	border-top-left-radius: .025rem;
	border-top-right-radius: .025rem;
}
.card-body {
	flex: 1 1 auto;
	padding: 0.025rem;
}
.btn-app {
	border-radius: 3px;
	position: relative;
	padding: 0px 20px;
	margin: 0 0 0px 0px;
	min-width: 40px;
	height: 20px;
	text-align: center;
	color: #f1ecec;
	border: 1px solid #ddd;
	background-color: #28a745;
	font-size: 12px;
}
.card-header {
	padding: .075rem 0.025rem;
	margin-bottom: 0;
	background-color: rgba(17,17,17,0.03);
	border-bottom: 0 solid #f4f4f4;
}
.form-control {
	display: block;
	width: 100%;
	height: calc(1.7625rem + 2px);
	padding: .0375rem .075rem;
	font-size: .675rem;
	line-height: 1.5;
	color: #495057;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #ced4da;
	border-radius: .25rem;
	box-shadow: inset 0 0 0 rgb(17 17 17 / 0%);
	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.table {
	width: auto;
	margin-bottom: 0.1rem;
	background-color: transparent;
}
a:not([href]):not([tabindex]) {
	color: aliceblue;
	text-decoration: none;
}
.input-group>.form-control, .input-group>.custom-select, .input-group>.custom-file {
	position: relative;
	flex: inherit;
	width: 1%;
	margin-bottom: 0;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultsA[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
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
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
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
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"><?php echo $pageHeader; ?></h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ARTCycle"></slot></span>
				 </td>
				<td id="fieldProtocol">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Protocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Protocol"></slot></span>
				</td>
				<td id="fieldGROWTHHORMONE">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_GROWTHHORMONE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_GROWTHHORMONE"></slot></span>
				</td>
					<td id="fieldSemenFrozen">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SemenFrozen"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SemenFrozen"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TypeOfInfertility"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TypeOfInfertility"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Duration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Duration"></slot></span>
				</td>
		 </tr>
		  <tr id="rowTypeOfInfertility">
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TotalICSICycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TotalICSICycle"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_A4ICSICycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_A4ICSICycle"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_IUICycles"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_IUICycles"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OvarianVolumeRT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OvarianVolumeRT"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_RelevantHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_RelevantHistory"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_AFC"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_AFC"></slot></span>
				</td>
		 </tr>
		   <tr id="rowIUICycles">
		 </tr>
		  <tr id="rowMedicalFactors">
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_MedicalFactors"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_MedicalFactors"></slot></span>
				</td>
					<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OvarianSurgery"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OvarianSurgery"></slot></span>
				</td>
					<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PRETREATMENT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PRETREATMENT"></slot></span>
				</td>	
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_AMH"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_AMH"></slot></span>
				</td>
				<td id="fieldINJTYPE">
					<span  class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_INJTYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_INJTYPE"></slot></span>
				</td>
				<td id="fieldLMP">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_LMP"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_LMP"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SCDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SCDate"></slot></span>
				</td>
	<td id="fieldANTAGONISTSTARTDAY">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ANTAGONISTSTARTDAY"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ANTAGONISTSTARTDAY"></slot></span>
				</td>
		 </tr>
		  <tr>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Consultant"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_InseminatinTechnique"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_InseminatinTechnique"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_IndicationForART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_IndicationForART"></slot></span>
				</td>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Hysteroscopy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Hysteroscopy"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_EndometrialScratching"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_EndometrialScratching"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TrialCannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TrialCannulation"></slot></span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_CYCLETYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_CYCLETYPE"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_HRTCYCLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_HRTCYCLE"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OralEstrogenDosage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OralEstrogenDosage"></slot></span>
				</td>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_VaginalEstrogen"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_VaginalEstrogen"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_GCSF"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_GCSF"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ActivatedPRP"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ActivatedPRP"></slot></span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_UCLcm"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_UCLcm"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"></slot></span>
				</td>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DAYOFEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DAYOFEMBRYOS"></slot></span>
				</td>
		 </tr>
  		<tr>
		  		<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"></slot></span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
				<td>
					 <span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableStIIUUII" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TUBAL_PATENCY"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TUBAL_PATENCY"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_HSG"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_HSG"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DHL"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DHL"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_UTERINE_PROBLEMS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_UTERINE_PROBLEMS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_W_COMORBIDS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_W_COMORBIDS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_H_COMORBIDS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_H_COMORBIDS"></slot></span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TABLETS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TABLETS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_FOLLICLE_STATUS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_FOLLICLE_STATUS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PROCEDURE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PROCEDURE"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_LUTEAL_SUPPORT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_LUTEAL_SUPPORT"></slot></span></td>
		  		<td></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ONGOING_PREG"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ONGOING_PREG"></slot></span></td>
		  		<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_EDD_Date"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_EDD_Date"></slot></span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table   class="table table-striped ew-table ew-export-table" >
	<tbody>
		<tr>
		<td>
<div id="IUIivfcONVERTTER" class="row">
<slot class="ew-slot" name="tpc_ivf_stimulation_chart_Convert"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Convert"></slot>
</div>
</td>
<td>
<div id="AllFreezeVisible" class="row">
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_AllFreeze"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_AllFreeze"></slot>
</div>
</td>
<td>
<div id="AllFreezeCancelReason" class="row">
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_TreatmentCancel"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TreatmentCancel"></slot>
</td>
<td>
	<div id='CancelReason' style="visibility: hidden" >
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_Reason"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Reason"></slot>
	</div>
</td>
<td>
<div id="ProjectronVisible" class="row">
	<slot class="ew-slot" name="tpc_ivf_stimulation_chart_Projectron"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Projectron"></slot>
</div>
</td>
<td>
<div id="ProgesteroneAdminTable"  class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Clinical Management</h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
<table   class="table table-striped ew-table ew-export-table" style="width:40%;">
	<tbody>
		<tr><td>Detail Progesterone</td></tr>
		<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ProgesteroneAdmin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ProgesteroneAdmin"></slot></span></td></tr>
	<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ProgesteroneStart"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ProgesteroneStart"></slot></span></td></tr>
		<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ProgesteroneDose"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ProgesteroneDose"></slot></span></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
		<tr><td><button type="button" onclick="ProgesteroneAccept()" class="btn btn-success">Accept</button>
<button type="button" onclick="ProgesteroneCancel()" class="btn btn-info">Cancel</button></td></tr>	
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-bodyya"  style="overflow-x:auto;">
<table id="tablechartadd"  class="table table-striped ew-table ew-export-table" >
	<thead>
		<tr>
				<td ><span class="ew-cell">Date</span></td>
				 <td ><span class="ew-cell">Cycle day</span></td>
				 <td id="tableStimulationday"><span class="ew-cell">Stimu day</span></td>
				<td id="tableTablet" ><span class="ew-cell">A/CC</span></td>
				 <td id="tableRFSH"><span class="ew-cell">R FSH</span></td>
				 <td id="tableHMG"><span class="ew-cell">HMG</span></td>
				<td><span class="ew-cell">GnRH</span></td>
				 <td id="tableE2"><span id="colE2" class="ew-cell">E2</span></td>
				 <td><span id="colP4" class="ew-cell">P4</span></td>
				<td><span id="colUSGRt" class="ew-cell">USG Rt</span></td>
				 <td ><span id="colUSGLt" class="ew-cell">USG Lt</span></td>
				 <td><span id="colET" class="ew-cell">ET</span></td>
				<td><span id="colOthers" class="ew-cell">Others</span></td>
				<td><span id="colDr" class="ew-cell">Dr</span></td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate1"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay1"></slot></td>
				 <td id="tableStimulationday1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay1"></slot></td>
				<td id="tableTablet1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet1"></slot></td>
				<td  id="tableRFSH1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH1"></slot></td>				 
				<td id="tableHMG1"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH1"></slot></td>
				<td id="tableE21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P41"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM1"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others1"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR1"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate2"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay2"></slot></td>
				 <td id="tableStimulationday2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay2"></slot></td>
				<td id="tableTablet2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet2"></slot></td>
				<td id="tableRFSH2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH2"></slot></td>				 
				<td id="tableHMG2"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH2"></slot></td>
				<td id="tableE22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P42"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM2"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others2"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR2"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate3"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay3"></slot></td>
				 <td id="tableStimulationday3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay3"></slot></td>
				<td id="tableTablet3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet3"></slot></td>
				<td id="tableRFSH3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH3"></slot></td>				 
				<td id="tableHMG3"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH3"></slot></td>
				<td id="tableE23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P43"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM3"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others3"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR3"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate4"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay4"></slot></td>
				 <td id="tableStimulationday4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay4"></slot></td>
				<td id="tableTablet4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet4"></slot></td>
				<td id="tableRFSH4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH4"></slot></td>				 
				<td id="tableHMG4"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH4"></slot></td>
				<td id="tableE24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P44"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM4"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others4"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR4"></slot></td>
		 </tr>
	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate5"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay5"></slot></td>
				 <td id="tableStimulationday5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay5"></slot></td>
				<td id="tableTablet5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet5"></slot></td>
				<td id="tableRFSH5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH5"></slot></td>				 
				<td id="tableHMG5"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH5"></slot></td>
				<td id="tableE25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P45"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM5"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others5"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR5"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate6"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay6"></slot></td>
				 <td id="tableStimulationday6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay6"></slot></td>
				<td id="tableTablet6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet6"></slot></td>
				<td id="tableRFSH6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH6"></slot></td>				 
				<td id="tableHMG6"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH6"></slot></td>
				<td id="tableE26"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E26"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P46"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM6"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others6"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR6"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate7"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay7"></slot></td>
				 <td id="tableStimulationday7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay7"></slot></td>
				<td id="tableTablet7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet7"></slot></td>
				<td id="tableRFSH7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH7"></slot></td>				 
				<td id="tableHMG7"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH7"></slot></td>
				<td id="tableE27"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E27"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P47"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM7"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others7"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR7"></slot></td>
		 </tr>
	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate8"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay8"></slot></td>
				 <td id="tableStimulationday8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay8"></slot></td>
				<td id="tableTablet8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet8"></slot></td>
				<td id="tableRFSH8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH8"></slot></td>				 
				<td id="tableHMG8"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH8"></slot></td>
				<td id="tableE28"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E28"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P48"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM8"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others8"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR8"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate9"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay9"></slot></td>
				 <td id="tableStimulationday9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay9"></slot></td>
				<td id="tableTablet9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet9"></slot></td>
				<td id="tableRFSH9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH9"></slot></td>				 
				<td id="tableHMG9"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH9"></slot></td>
				<td id="tableE29"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E29"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P49"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM9"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others9"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR9"></slot></td>
		 </tr>
	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate10"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay10"></slot></td>
				 <td id="tableStimulationday10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay10"></slot></td>
				<td id="tableTablet10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet10"></slot></td>
				<td id="tableRFSH10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH10"></slot></td>				 
				<td id="tableHMG10"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH10"></slot></td>
				<td id="tableE210"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E210"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P410"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM10"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others10"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR10"></slot></td>
		 </tr>	
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate11"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay11"></slot></td>
				 <td id="tableStimulationday11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay11"></slot></td>
				<td id="tableTablet11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet11"></slot></td>
				<td id="tableRFSH11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH11"></slot></td>				 
				<td id="tableHMG11"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH11"></slot></td>
				<td id="tableE211"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E211"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P411"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM11"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others11"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR11"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate12"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay12"></slot></td>
				 <td id="tableStimulationday12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay12"></slot></td>
				<td id="tableTablet12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet12"></slot></td>
				<td id="tableRFSH12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH12"></slot></td>				 
				<td id="tableHMG12"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH12"></slot></td>
				<td id="tableE212"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E212"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P412"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM12"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others12"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR12"></slot></td>
		 </tr>
		 	 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate13"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay13"></slot></td>
				 <td id="tableStimulationday13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay13"></slot></td>
				<td id="tableTablet13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet13"></slot></td>
				<td id="tableRFSH13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH13"></slot></td>				 
				<td id="tableHMG13"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH13"></slot></td>
				<td id="tableE213"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E213"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P413"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM13"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others13"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR13"></slot></td>
		 </tr>
		 <tr>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate14"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay14"></slot></td>
				 <td id="tableStimulationday14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay14"></slot></td>
				<td id="tableTablet14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet14"></slot></td>
				<td  id="tableRFSH14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH14"></slot></td>				 
				<td id="tableHMG14"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH14"></slot></td>
				<td id="tableE214"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E214"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P414"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM14"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others14"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR14"></slot></td>
		 </tr>
		 <tr  id="trrow15" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate15"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay15"></slot></td>
				 <td id="tableStimulationday15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay15"></slot></td>
				<td id="tableTablet15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet15"></slot></td>
				<td  id="tableRFSH15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH15"></slot></td>				 
				<td id="tableHMG15"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH15"></slot></td>
				<td id="tableE215"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E215"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P415"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM15"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others15"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR15"></slot></td>
		 </tr>
		 <tr id="trrow16" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate16"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay16"></slot></td>
				 <td id="tableStimulationday16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay16"></slot></td>
				<td id="tableTablet16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet16"></slot></td>
				<td  id="tableRFSH16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH16"></slot></td>				 
				<td id="tableHMG16"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH16"></slot></td>
				<td id="tableE216"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E216"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P416"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM16"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others16"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR16"></slot></td>
		 </tr>
		 <tr id="trrow17" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate17"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay17"></slot></td>
				 <td id="tableStimulationday17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay17"></slot></td>
				<td id="tableTablet17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet17"></slot></td>
				<td  id="tableRFSH17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH17"></slot></td>				 
				<td id="tableHMG17"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH17"></slot></td>
				<td id="tableE217"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E217"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P417"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM17"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others17"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR17"></slot></td>
		 </tr>
		 <tr id="trrow18" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate18"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay18"></slot></td>
				 <td id="tableStimulationday18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay18"></slot></td>
				<td id="tableTablet18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet18"></slot></td>
				<td  id="tableRFSH18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH18"></slot></td>				 
				<td id="tableHMG18"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH18"></slot></td>
				<td id="tableE218"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E218"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P418"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM18"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others18"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR18"></slot></td>
		 </tr>
		 <tr id="trrow19" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate19"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay19"></slot></td>
				 <td id="tableStimulationday19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay19"></slot></td>
				<td id="tableTablet19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet19"></slot></td>
				<td  id="tableRFSH19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH19"></slot></td>				 
				<td id="tableHMG19"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH19"></slot></td>
				<td id="tableE219"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E219"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P419"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM19"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others19"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR19"></slot></td>
		 </tr>
		 <tr id="trrow20" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate20"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay20"></slot></td>
				 <td id="tableStimulationday20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay20"></slot></td>
				<td id="tableTablet20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet20"></slot></td>
				<td  id="tableRFSH20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH20"></slot></td>				 
				<td id="tableHMG20"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH20"></slot></td>
				<td id="tableE220"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E220"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P420"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM20"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others20"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR20"></slot></td>
		 </tr>
		 <tr id="trrow21" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate21"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay21"></slot></td>
				 <td id="tableStimulationday21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay21"></slot></td>
				<td id="tableTablet21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet21"></slot></td>
				<td  id="tableRFSH21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH21"></slot></td>				 
				<td id="tableHMG21"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH21"></slot></td>
				<td id="tableE221"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E221"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P421"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM21"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others21"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR21"></slot></td>
		 </tr>
		 <tr id="trrow22" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate22"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay22"></slot></td>
				 <td id="tableStimulationday22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay22"></slot></td>
				<td id="tableTablet22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet22"></slot></td>
				<td  id="tableRFSH22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH22"></slot></td>				 
				<td id="tableHMG22"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH22"></slot></td>
				<td id="tableE222"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E222"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P422"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM22"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others22"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR22"></slot></td>
		 </tr>
		 <tr id="trrow23" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate23"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay23"></slot></td>
				 <td id="tableStimulationday23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay23"></slot></td>
				<td id="tableTablet23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet23"></slot></td>
				<td  id="tableRFSH23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH23"></slot></td>				 
				<td id="tableHMG23"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH23"></slot></td>
				<td id="tableE223"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E223"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P423"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM23"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others23"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR23"></slot></td>
		 </tr>
		 <tr id="trrow24" style="display: none;">
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate24"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay24"></slot></td>
				 <td id="tableStimulationday24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay24"></slot></td>
				<td id="tableTablet24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet24"></slot></td>
				<td  id="tableRFSH24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH24"></slot></td>				 
				<td id="tableHMG24"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH24"></slot></td>
				<td id="tableE224"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E224"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P424"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM24"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others24"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR24"></slot></td>
		 </tr>
		 <tr  id="trrow25" style="display: none;" >
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StChDate25"></slot></td>
				 <td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_CycleDay25"></slot></td>
				 <td id="tableStimulationday25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_StimulationDay25"></slot></td>
				<td id="tableTablet25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Tablet25"></slot></td>
				<td  id="tableRFSH25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_RFSH25"></slot></td>				 
				<td id="tableHMG25"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_HMG25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_GnRH25"></slot></td>
				<td id="tableE225"><slot class="ew-slot" name="tpx_ivf_stimulation_chart_E225"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_P425"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGRt25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_USGLt25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_EM25"></slot></td>	
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_Others25"></slot></td>
				<td><slot class="ew-slot" name="tpx_ivf_stimulation_chart_DR25"></slot></td>
		 </tr>
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
				<td><a class="btn btn-app" onclick="addrowsintable()"><i class="fas fa-plus"></i> Add</a></td>
				<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DAYSOFSTIMULATION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DAYSOFSTIMULATION"></slot></span></td>	
				<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DOSEOFGONADOTROPINS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DOSEOFGONADOTROPINS"></slot></span></td>
				<td><span  id="ANTAGONISTDAYSstum"  class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ANTAGONISTDAYS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ANTAGONISTDAYS"></slot></span></td>
	   </tr>	
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Pre Procedure Order</h3>
			</div>
			<div class="card-body">
<table id="PreProcedureEEETTTDTE" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_EEETTTDTE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_EEETTTDTE"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_bhcgdate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_bhcgdate"></slot></span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="PreProcedureOrderPPOOUU" class="ew-table" style="width:100%;">
	 <tbody>
		<tr id="RowPreProcedureOrder">
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PreProcedureOrder"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PreProcedureOrder"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_Expectedoocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_Expectedoocytes"></slot></span>
				</td>
				<td>
					<span class="ew-cell"></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				</td>
		 </tr>
		 <tr>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TRIGGERR"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TRIGGERR"></slot></span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_TRIGGERDATE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_TRIGGERDATE"></slot></span>
				 </td>
				 <td id="colATHOMEorCLINIC">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ATHOMEorCLINIC"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ATHOMEorCLINIC"></slot></span>
				 </td>
		 		 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_SEMENPREPARATION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_SEMENPREPARATION"></slot></span>
				 </td>
				 <td>
					<span id="fieldOPUDATE" class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_OPUDATE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_OPUDATE"></slot></span>
				 </td>
		 		 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DOCTORRESPONSIBLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DOCTORRESPONSIBLE"></slot></span>
				 </td>
		 </tr>
		 <tr id="RowALLFREEZEINDICATION"> 
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ALLFREEZEINDICATION"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ALLFREEZEINDICATION"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ERA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ERA"></slot></span>
				 </td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_REASONFORESET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_REASONFORESET"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"></span>
				 </td>
		 </tr>
  		  <tr id="RowDATEOFET">
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DATEOFET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DATEOFET"></slot></span>
				</td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ET"></slot></span>
				 </td>
				  <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_ESET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_ESET"></slot></span>
				 </td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_DOET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_DOET"></slot></span>
				 </td>
				 <td id="colPGTA">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PGTA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PGTA"></slot></span>
				 </td>
				 <td id="colPGD">
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_stimulation_chart_PGD"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_stimulation_chart_PGD"></slot></span>
				 </td>
		 </tr>
		 <tr>
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
    ew.applyTemplate("tpd_ivf_stimulation_chartview", "tpm_ivf_stimulation_chartview", "ivf_stimulation_chartview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    var mousedown,mouseup,keydownval,sorceEL,sourceROW,mouseUPEL,mouseUPROW;document.addEventListener("keydown",(function(e){keydownval=e.which,console.log(e)})),$(".text-muted").after('&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-app"  href="javascript:history.back()"><i class="fas fa-undo"></i> Back</a>'),$("#x_E21").mouseup((function(){mouseUPEL="x_E21",mouseUPROW=1;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E22").mouseup((function(){mouseUPEL="x_E22",mouseUPROW=2;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E23").mouseup((function(){mouseUPEL="x_E23",mouseUPROW=3;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E24").mouseup((function(){mouseUPEL="x_E24",mouseUPROW=4;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E25").mouseup((function(){mouseUPEL="x_E25",mouseUPROW=5;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E26").mouseup((function(){mouseUPEL="x_E26",mouseUPROW=6;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E27").mouseup((function(){mouseUPEL="x_E27",mouseUPROW=7;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E28").mouseup((function(){mouseUPEL="x_E28",mouseUPROW=8;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E29").mouseup((function(){mouseUPEL="x_E29",mouseUPROW=9;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E210").mouseup((function(){mouseUPEL="x_E210",mouseUPROW=10;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E211").mouseup((function(){mouseUPEL="x_E211",mouseUPROW=11;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E212").mouseup((function(){mouseUPEL="x_E212",mouseUPROW=12;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E213").mouseup((function(){mouseUPEL="x_E213",mouseUPROW=13;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E214").mouseup((function(){mouseUPEL="x_E214",mouseUPROW=14;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E215").mouseup((function(){mouseUPEL="x_E215",mouseUPROW=15;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E216").mouseup((function(){mouseUPEL="x_E216",mouseUPROW=16;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E217").mouseup((function(){mouseUPEL="x_E217",mouseUPROW=17;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E218").mouseup((function(){mouseUPEL="x_E218",mouseUPROW=18;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E219").mouseup((function(){mouseUPEL="x_E219",mouseUPROW=19;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E220").mouseup((function(){mouseUPEL="x_E220",mouseUPROW=20;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E221").mouseup((function(){mouseUPEL="x_E221",mouseUPROW=21;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E222").mouseup((function(){mouseUPEL="x_E222",mouseUPROW=22;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E223").mouseup((function(){mouseUPEL="x_E223",mouseUPROW=23;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E224").mouseup((function(){mouseUPEL="x_E224",mouseUPROW=24;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E225").mouseup((function(){mouseUPEL="x_E225",mouseUPROW=25;var e=document.getElementById("x_E2"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_E2"+i).value=e})),$("#x_E21").click((function(){sorceEL="x_E21",sourceROW=1})),$("#x_E22").click((function(){sorceEL="x_E22",sourceROW=2})),$("#x_E23").click((function(){sorceEL="x_E23",sourceROW=3})),$("#x_E24").click((function(){sorceEL="x_E24",sourceROW=4})),$("#x_E25").click((function(){sorceEL="x_E25",sourceROW=5})),$("#x_E26").click((function(){sorceEL="x_E26",sourceROW=6})),$("#x_E27").click((function(){sorceEL="x_E27",sourceROW=7})),$("#x_E28").click((function(){sorceEL="x_E28",sourceROW=8})),$("#x_E29").click((function(){sorceEL="x_E29",sourceROW=9})),$("#x_E210").click((function(){sorceEL="x_E210",sourceROW=10})),$("#x_E211").click((function(){sorceEL="x_E211",sourceROW=11})),$("#x_E212").click((function(){sorceEL="x_E212",sourceROW=12})),$("#x_E213").click((function(){sorceEL="x_E213",sourceROW=13})),$("#x_E214").click((function(){sorceEL="x_E214",sourceROW=14})),$("#x_E215").click((function(){sorceEL="x_E215",sourceROW=15})),$("#x_E216").click((function(){sorceEL="x_E216",sourceROW=16})),$("#x_E217").click((function(){sorceEL="x_E217",sourceROW=17})),$("#x_E218").click((function(){sorceEL="x_E218",sourceROW=18})),$("#x_E219").click((function(){sorceEL="x_E219",sourceROW=19})),$("#x_E220").click((function(){sorceEL="x_E220",sourceROW=20})),$("#x_E221").click((function(){sorceEL="x_E221",sourceROW=21})),$("#x_E222").click((function(){sorceEL="x_E222",sourceROW=22})),$("#x_E223").click((function(){sorceEL="x_E223",sourceROW=23})),$("#x_E224").click((function(){sorceEL="x_E224",sourceROW=24})),$("#x_E225").click((function(){sorceEL="x_E225",sourceROW=25})),$("#x_E21").mousedown((function(){sorceEL="x_E21",sourceROW=1})),$("#x_E22").mousedown((function(){sorceEL="x_E22",sourceROW=2})),$("#x_E23").mousedown((function(){sorceEL="x_E23",sourceROW=3})),$("#x_E24").mousedown((function(){sorceEL="x_E24",sourceROW=4})),$("#x_E25").mousedown((function(){sorceEL="x_E25",sourceROW=5})),$("#x_E26").mousedown((function(){sorceEL="x_E26",sourceROW=6})),$("#x_E27").mousedown((function(){sorceEL="x_E27",sourceROW=7})),$("#x_E28").mousedown((function(){sorceEL="x_E28",sourceROW=8})),$("#x_E29").mousedown((function(){sorceEL="x_E29",sourceROW=9})),$("#x_E210").mousedown((function(){sorceEL="x_E210",sourceROW=10})),$("#x_E211").mousedown((function(){sorceEL="x_E211",sourceROW=11})),$("#x_E212").mousedown((function(){sorceEL="x_E212",sourceROW=12})),$("#x_E213").mousedown((function(){sorceEL="x_E213",sourceROW=13})),$("#x_E214").mousedown((function(){sorceEL="x_E214",sourceROW=14})),$("#x_E215").mousedown((function(){sorceEL="x_E215",sourceROW=15})),$("#x_E216").mousedown((function(){sorceEL="x_E216",sourceROW=16})),$("#x_E217").mousedown((function(){sorceEL="x_E217",sourceROW=17})),$("#x_E218").mousedown((function(){sorceEL="x_E218",sourceROW=18})),$("#x_E219").mousedown((function(){sorceEL="x_E219",sourceROW=19})),$("#x_E220").mousedown((function(){sorceEL="x_E220",sourceROW=20})),$("#x_E221").mousedown((function(){sorceEL="x_E221",sourceROW=21})),$("#x_E222").mousedown((function(){sorceEL="x_E222",sourceROW=22})),$("#x_E223").mousedown((function(){sorceEL="x_E223",sourceROW=23})),$("#x_E224").mousedown((function(){sorceEL="x_E224",sourceROW=24})),$("#x_E225").mousedown((function(){sorceEL="x_E225",sourceROW=25})),$("#x_P41").mouseup((function(){mouseUPEL="x_P41",mouseUPROW=1;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P42").mouseup((function(){mouseUPEL="x_P42",mouseUPROW=2;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P43").mouseup((function(){mouseUPEL="x_P43",mouseUPROW=3;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P44").mouseup((function(){mouseUPEL="x_P44",mouseUPROW=4;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P45").mouseup((function(){mouseUPEL="x_P45",mouseUPROW=5;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P46").mouseup((function(){mouseUPEL="x_P46",mouseUPROW=6;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P47").mouseup((function(){mouseUPEL="x_P47",mouseUPROW=7;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P48").mouseup((function(){mouseUPEL="x_P48",mouseUPROW=8;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P49").mouseup((function(){mouseUPEL="x_P49",mouseUPROW=9;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P410").mouseup((function(){mouseUPEL="x_P410",mouseUPROW=10;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P411").mouseup((function(){mouseUPEL="x_P411",mouseUPROW=11;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P412").mouseup((function(){mouseUPEL="x_P412",mouseUPROW=12;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P413").mouseup((function(){mouseUPEL="x_P413",mouseUPROW=13;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P414").mouseup((function(){mouseUPEL="x_P414",mouseUPROW=14;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P415").mouseup((function(){mouseUPEL="x_P415",mouseUPROW=15;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P416").mouseup((function(){mouseUPEL="x_P416",mouseUPROW=16;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P417").mouseup((function(){mouseUPEL="x_P417",mouseUPROW=17;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P418").mouseup((function(){mouseUPEL="x_P418",mouseUPROW=18;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P419").mouseup((function(){mouseUPEL="x_P419",mouseUPROW=19;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P420").mouseup((function(){mouseUPEL="x_P420",mouseUPROW=20;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P421").mouseup((function(){mouseUPEL="x_P421",mouseUPROW=21;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P422").mouseup((function(){mouseUPEL="x_P422",mouseUPROW=22;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P423").mouseup((function(){mouseUPEL="x_P423",mouseUPROW=23;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P424").mouseup((function(){mouseUPEL="x_P424",mouseUPROW=24;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P425").mouseup((function(){mouseUPEL="x_P425",mouseUPROW=25;var e=document.getElementById("x_P4"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_P4"+i).value=e})),$("#x_P41").click((function(){sorceEL="x_P41",sourceROW=1})),$("#x_P42").click((function(){sorceEL="x_P42",sourceROW=2})),$("#x_P43").click((function(){sorceEL="x_P43",sourceROW=3})),$("#x_P44").click((function(){sorceEL="x_P44",sourceROW=4})),$("#x_P45").click((function(){sorceEL="x_P45",sourceROW=5})),$("#x_P46").click((function(){sorceEL="x_P46",sourceROW=6})),$("#x_P47").click((function(){sorceEL="x_P47",sourceROW=7})),$("#x_P48").click((function(){sorceEL="x_P48",sourceROW=8})),$("#x_P49").click((function(){sorceEL="x_P49",sourceROW=9})),$("#x_P410").click((function(){sorceEL="x_P410",sourceROW=10})),$("#x_P411").click((function(){sorceEL="x_P411",sourceROW=11})),$("#x_P412").click((function(){sorceEL="x_P412",sourceROW=12})),$("#x_P413").click((function(){sorceEL="x_P413",sourceROW=13})),$("#x_P414").click((function(){sorceEL="x_P414",sourceROW=14})),$("#x_P415").click((function(){sorceEL="x_P415",sourceROW=15})),$("#x_P416").click((function(){sorceEL="x_P416",sourceROW=16})),$("#x_P417").click((function(){sorceEL="x_P417",sourceROW=17})),$("#x_P418").click((function(){sorceEL="x_P418",sourceROW=18})),$("#x_P419").click((function(){sorceEL="x_P419",sourceROW=19})),$("#x_P420").click((function(){sorceEL="x_P420",sourceROW=20})),$("#x_P421").click((function(){sorceEL="x_P421",sourceROW=21})),$("#x_P422").click((function(){sorceEL="x_P422",sourceROW=22})),$("#x_P423").click((function(){sorceEL="x_P423",sourceROW=23})),$("#x_P424").click((function(){sorceEL="x_P424",sourceROW=24})),$("#x_P425").click((function(){sorceEL="x_P425",sourceROW=25})),$("#x_P41").mousedown((function(){sorceEL="x_P41",sourceROW=1})),$("#x_P42").mousedown((function(){sorceEL="x_P42",sourceROW=2})),$("#x_P43").mousedown((function(){sorceEL="x_P43",sourceROW=3})),$("#x_P44").mousedown((function(){sorceEL="x_P44",sourceROW=4})),$("#x_P45").mousedown((function(){sorceEL="x_P45",sourceROW=5})),$("#x_P46").mousedown((function(){sorceEL="x_P46",sourceROW=6})),$("#x_P47").mousedown((function(){sorceEL="x_P47",sourceROW=7})),$("#x_P48").mousedown((function(){sorceEL="x_P48",sourceROW=8})),$("#x_P49").mousedown((function(){sorceEL="x_P49",sourceROW=9})),$("#x_P410").mousedown((function(){sorceEL="x_P410",sourceROW=10})),$("#x_P411").mousedown((function(){sorceEL="x_P411",sourceROW=11})),$("#x_P412").mousedown((function(){sorceEL="x_P412",sourceROW=12})),$("#x_P413").mousedown((function(){sorceEL="x_P413",sourceROW=13})),$("#x_P414").mousedown((function(){sorceEL="x_P414",sourceROW=14})),$("#x_P415").mousedown((function(){sorceEL="x_P415",sourceROW=15})),$("#x_P416").mousedown((function(){sorceEL="x_P416",sourceROW=16})),$("#x_P417").mousedown((function(){sorceEL="x_P417",sourceROW=17})),$("#x_P418").mousedown((function(){sorceEL="x_P418",sourceROW=18})),$("#x_P419").mousedown((function(){sorceEL="x_P419",sourceROW=19})),$("#x_P420").mousedown((function(){sorceEL="x_P420",sourceROW=20})),$("#x_P421").mousedown((function(){sorceEL="x_P421",sourceROW=21})),$("#x_P422").mousedown((function(){sorceEL="x_P422",sourceROW=22})),$("#x_P423").mousedown((function(){sorceEL="x_P423",sourceROW=23})),$("#x_P424").mousedown((function(){sorceEL="x_P424",sourceROW=24})),$("#x_P425").mousedown((function(){sorceEL="x_P425",sourceROW=25})),$("#x_USGRt1").mouseup((function(){mouseUPEL="x_USGRt1",mouseUPROW=1;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt2").mouseup((function(){mouseUPEL="x_USGRt2",mouseUPROW=2;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt3").mouseup((function(){mouseUPEL="x_USGRt3",mouseUPROW=3;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt4").mouseup((function(){mouseUPEL="x_USGRt4",mouseUPROW=4;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt5").mouseup((function(){mouseUPEL="x_USGRt5",mouseUPROW=5;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt6").mouseup((function(){mouseUPEL="x_USGRt6",mouseUPROW=6;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt7").mouseup((function(){mouseUPEL="x_USGRt7",mouseUPROW=7;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt8").mouseup((function(){mouseUPEL="x_USGRt8",mouseUPROW=8;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt9").mouseup((function(){mouseUPEL="x_USGRt9",mouseUPROW=9;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt10").mouseup((function(){mouseUPEL="x_USGRt10",mouseUPROW=10;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt11").mouseup((function(){mouseUPEL="x_USGRt11",mouseUPROW=11;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt12").mouseup((function(){mouseUPEL="x_USGRt12",mouseUPROW=12;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt13").mouseup((function(){mouseUPEL="x_USGRt13",mouseUPROW=13;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt14").mouseup((function(){mouseUPEL="x_USGRt14",mouseUPROW=14;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt15").mouseup((function(){mouseUPEL="x_USGRt15",mouseUPROW=15;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt16").mouseup((function(){mouseUPEL="x_USGRt16",mouseUPROW=16;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt17").mouseup((function(){mouseUPEL="x_USGRt17",mouseUPROW=17;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt18").mouseup((function(){mouseUPEL="x_USGRt18",mouseUPROW=18;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt19").mouseup((function(){mouseUPEL="x_USGRt19",mouseUPROW=19;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt20").mouseup((function(){mouseUPEL="x_USGRt20",mouseUPROW=20;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt21").mouseup((function(){mouseUPEL="x_USGRt21",mouseUPROW=21;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt22").mouseup((function(){mouseUPEL="x_USGRt22",mouseUPROW=22;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt23").mouseup((function(){mouseUPEL="x_USGRt23",mouseUPROW=23;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt24").mouseup((function(){mouseUPEL="x_USGRt24",mouseUPROW=24;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt25").mouseup((function(){mouseUPEL="x_USGRt25",mouseUPROW=25;var e=document.getElementById("x_USGRt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGRt"+i).value=e})),$("#x_USGRt1").click((function(){sorceEL="x_USGRt1",sourceROW=1})),$("#x_USGRt2").click((function(){sorceEL="x_USGRt2",sourceROW=2})),$("#x_USGRt3").click((function(){sorceEL="x_USGRt3",sourceROW=3})),$("#x_USGRt4").click((function(){sorceEL="x_USGRt4",sourceROW=4})),$("#x_USGRt5").click((function(){sorceEL="x_USGRt5",sourceROW=5})),$("#x_USGRt6").click((function(){sorceEL="x_USGRt6",sourceROW=6})),$("#x_USGRt7").click((function(){sorceEL="x_USGRt7",sourceROW=7})),$("#x_USGRt8").click((function(){sorceEL="x_USGRt8",sourceROW=8})),$("#x_USGRt9").click((function(){sorceEL="x_USGRt9",sourceROW=9})),$("#x_USGRt10").click((function(){sorceEL="x_USGRt10",sourceROW=10})),$("#x_USGRt11").click((function(){sorceEL="x_USGRt11",sourceROW=11})),$("#x_USGRt12").click((function(){sorceEL="x_USGRt12",sourceROW=12})),$("#x_USGRt13").click((function(){sorceEL="x_USGRt13",sourceROW=13})),$("#x_USGRt14").click((function(){sorceEL="x_USGRt14",sourceROW=14})),$("#x_USGRt15").click((function(){sorceEL="x_USGRt15",sourceROW=15})),$("#x_USGRt16").click((function(){sorceEL="x_USGRt16",sourceROW=16})),$("#x_USGRt17").click((function(){sorceEL="x_USGRt17",sourceROW=17})),$("#x_USGRt18").click((function(){sorceEL="x_USGRt18",sourceROW=18})),$("#x_USGRt19").click((function(){sorceEL="x_USGRt19",sourceROW=19})),$("#x_USGRt20").click((function(){sorceEL="x_USGRt20",sourceROW=20})),$("#x_USGRt21").click((function(){sorceEL="x_USGRt21",sourceROW=21})),$("#x_USGRt22").click((function(){sorceEL="x_USGRt22",sourceROW=22})),$("#x_USGRt23").click((function(){sorceEL="x_USGRt23",sourceROW=23})),$("#x_USGRt24").click((function(){sorceEL="x_USGRt24",sourceROW=24})),$("#x_USGRt25").click((function(){sorceEL="x_USGRt25",sourceROW=25})),$("#x_USGRt1").mousedown((function(){sorceEL="x_USGRt1",sourceROW=1})),$("#x_USGRt2").mousedown((function(){sorceEL="x_USGRt2",sourceROW=2})),$("#x_USGRt3").mousedown((function(){sorceEL="x_USGRt3",sourceROW=3})),$("#x_USGRt4").mousedown((function(){sorceEL="x_USGRt4",sourceROW=4})),$("#x_USGRt5").mousedown((function(){sorceEL="x_USGRt5",sourceROW=5})),$("#x_USGRt6").mousedown((function(){sorceEL="x_USGRt6",sourceROW=6})),$("#x_USGRt7").mousedown((function(){sorceEL="x_USGRt7",sourceROW=7})),$("#x_USGRt8").mousedown((function(){sorceEL="x_USGRt8",sourceROW=8})),$("#x_USGRt9").mousedown((function(){sorceEL="x_USGRt9",sourceROW=9})),$("#x_USGRt10").mousedown((function(){sorceEL="x_USGRt10",sourceROW=10})),$("#x_USGRt11").mousedown((function(){sorceEL="x_USGRt11",sourceROW=11})),$("#x_USGRt12").mousedown((function(){sorceEL="x_USGRt12",sourceROW=12})),$("#x_USGRt13").mousedown((function(){sorceEL="x_USGRt13",sourceROW=13})),$("#x_USGRt14").mousedown((function(){sorceEL="x_USGRt14",sourceROW=14})),$("#x_USGRt15").mousedown((function(){sorceEL="x_USGRt15",sourceROW=15})),$("#x_USGRt16").mousedown((function(){sorceEL="x_USGRt16",sourceROW=16})),$("#x_USGRt17").mousedown((function(){sorceEL="x_USGRt17",sourceROW=17})),$("#x_USGRt18").mousedown((function(){sorceEL="x_USGRt18",sourceROW=18})),$("#x_USGRt19").mousedown((function(){sorceEL="x_USGRt19",sourceROW=19})),$("#x_USGRt20").mousedown((function(){sorceEL="x_USGRt20",sourceROW=20})),$("#x_USGRt21").mousedown((function(){sorceEL="x_USGRt21",sourceROW=21})),$("#x_USGRt22").mousedown((function(){sorceEL="x_USGRt22",sourceROW=22})),$("#x_USGRt23").mousedown((function(){sorceEL="x_USGRt23",sourceROW=23})),$("#x_USGRt24").mousedown((function(){sorceEL="x_USGRt24",sourceROW=24})),$("#x_USGRt25").mousedown((function(){sorceEL="x_USGRt25",sourceROW=25})),$("#x_Tablet1").mouseup((function(){mouseUPEL="x_Tablet1",mouseUPROW=1;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet2").mouseup((function(){mouseUPEL="x_Tablet2",mouseUPROW=2;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet3").mouseup((function(){mouseUPEL="x_Tablet3",mouseUPROW=3;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet4").mouseup((function(){mouseUPEL="x_Tablet4",mouseUPROW=4;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet5").mouseup((function(){mouseUPEL="x_Tablet5",mouseUPROW=5;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet6").mouseup((function(){mouseUPEL="x_Tablet6",mouseUPROW=6;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet7").mouseup((function(){mouseUPEL="x_Tablet7",mouseUPROW=7;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet8").mouseup((function(){mouseUPEL="x_Tablet8",mouseUPROW=8;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet9").mouseup((function(){mouseUPEL="x_Tablet9",mouseUPROW=9;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet10").mouseup((function(){mouseUPEL="x_Tablet10",mouseUPROW=10;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet11").mouseup((function(){mouseUPEL="x_Tablet11",mouseUPROW=11;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet12").mouseup((function(){mouseUPEL="x_Tablet12",mouseUPROW=12;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet13").mouseup((function(){mouseUPEL="x_Tablet13",mouseUPROW=13;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet14").mouseup((function(){mouseUPEL="x_Tablet14",mouseUPROW=14;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet15").mouseup((function(){mouseUPEL="x_Tablet15",mouseUPROW=15;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet16").mouseup((function(){mouseUPEL="x_Tablet16",mouseUPROW=16;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet17").mouseup((function(){mouseUPEL="x_Tablet17",mouseUPROW=17;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet18").mouseup((function(){mouseUPEL="x_Tablet18",mouseUPROW=18;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet19").mouseup((function(){mouseUPEL="x_Tablet19",mouseUPROW=19;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet20").mouseup((function(){mouseUPEL="x_Tablet20",mouseUPROW=20;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet21").mouseup((function(){mouseUPEL="x_Tablet21",mouseUPROW=21;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet22").mouseup((function(){mouseUPEL="x_Tablet22",mouseUPROW=22;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet23").mouseup((function(){mouseUPEL="x_Tablet23",mouseUPROW=23;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet24").mouseup((function(){mouseUPEL="x_Tablet24",mouseUPROW=24;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet25").mouseup((function(){mouseUPEL="x_Tablet25",mouseUPROW=25;var e=document.getElementById("x_Tablet"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Tablet"+i).value=e})),$("#x_Tablet1").click((function(){sorceEL="x_Tablet1",sourceROW=1})),$("#x_Tablet2").click((function(){sorceEL="x_Tablet2",sourceROW=2})),$("#x_Tablet3").click((function(){sorceEL="x_Tablet3",sourceROW=3})),$("#x_Tablet4").click((function(){sorceEL="x_Tablet4",sourceROW=4})),$("#x_Tablet5").click((function(){sorceEL="x_Tablet5",sourceROW=5})),$("#x_Tablet6").click((function(){sorceEL="x_Tablet6",sourceROW=6})),$("#x_Tablet7").click((function(){sorceEL="x_Tablet7",sourceROW=7})),$("#x_Tablet8").click((function(){sorceEL="x_Tablet8",sourceROW=8})),$("#x_Tablet9").click((function(){sorceEL="x_Tablet9",sourceROW=9})),$("#x_Tablet10").click((function(){sorceEL="x_Tablet10",sourceROW=10})),$("#x_Tablet11").click((function(){sorceEL="x_Tablet11",sourceROW=11})),$("#x_Tablet12").click((function(){sorceEL="x_Tablet12",sourceROW=12})),$("#x_Tablet13").click((function(){sorceEL="x_Tablet13",sourceROW=13})),$("#x_Tablet14").click((function(){sorceEL="x_Tablet14",sourceROW=14})),$("#x_Tablet15").click((function(){sorceEL="x_Tablet15",sourceROW=15})),$("#x_Tablet16").click((function(){sorceEL="x_Tablet16",sourceROW=16})),$("#x_Tablet17").click((function(){sorceEL="x_Tablet17",sourceROW=17})),$("#x_Tablet18").click((function(){sorceEL="x_Tablet18",sourceROW=18})),$("#x_Tablet19").click((function(){sorceEL="x_Tablet19",sourceROW=19})),$("#x_Tablet20").click((function(){sorceEL="x_Tablet20",sourceROW=20})),$("#x_Tablet21").click((function(){sorceEL="x_Tablet21",sourceROW=21})),$("#x_Tablet22").click((function(){sorceEL="x_Tablet22",sourceROW=22})),$("#x_Tablet23").click((function(){sorceEL="x_Tablet23",sourceROW=23})),$("#x_Tablet24").click((function(){sorceEL="x_Tablet24",sourceROW=24})),$("#x_Tablet25").click((function(){sorceEL="x_Tablet25",sourceROW=25})),$("#x_Tablet1").mousedown((function(){sorceEL="x_Tablet1",sourceROW=1})),$("#x_Tablet2").mousedown((function(){sorceEL="x_Tablet2",sourceROW=2})),$("#x_Tablet3").mousedown((function(){sorceEL="x_Tablet3",sourceROW=3})),$("#x_Tablet4").mousedown((function(){sorceEL="x_Tablet4",sourceROW=4})),$("#x_Tablet5").mousedown((function(){sorceEL="x_Tablet5",sourceROW=5})),$("#x_Tablet6").mousedown((function(){sorceEL="x_Tablet6",sourceROW=6})),$("#x_Tablet7").mousedown((function(){sorceEL="x_Tablet7",sourceROW=7})),$("#x_Tablet8").mousedown((function(){sorceEL="x_Tablet8",sourceROW=8})),$("#x_Tablet9").mousedown((function(){sorceEL="x_Tablet9",sourceROW=9})),$("#x_Tablet10").mousedown((function(){sorceEL="x_Tablet10",sourceROW=10})),$("#x_Tablet11").mousedown((function(){sorceEL="x_Tablet11",sourceROW=11})),$("#x_Tablet12").mousedown((function(){sorceEL="x_Tablet12",sourceROW=12})),$("#x_Tablet13").mousedown((function(){sorceEL="x_Tablet13",sourceROW=13})),$("#x_Tablet14").mousedown((function(){sorceEL="x_Tablet14",sourceROW=14})),$("#x_Tablet15").mousedown((function(){sorceEL="x_Tablet15",sourceROW=15})),$("#x_Tablet16").mousedown((function(){sorceEL="x_Tablet16",sourceROW=16})),$("#x_Tablet17").mousedown((function(){sorceEL="x_Tablet17",sourceROW=17})),$("#x_Tablet18").mousedown((function(){sorceEL="x_Tablet18",sourceROW=18})),$("#x_Tablet19").mousedown((function(){sorceEL="x_Tablet19",sourceROW=19})),$("#x_Tablet20").mousedown((function(){sorceEL="x_Tablet20",sourceROW=20})),$("#x_Tablet21").mousedown((function(){sorceEL="x_Tablet21",sourceROW=21})),$("#x_Tablet22").mousedown((function(){sorceEL="x_Tablet22",sourceROW=22})),$("#x_Tablet23").mousedown((function(){sorceEL="x_Tablet23",sourceROW=23})),$("#x_Tablet24").mousedown((function(){sorceEL="x_Tablet24",sourceROW=24})),$("#x_Tablet25").mousedown((function(){sorceEL="x_Tablet25",sourceROW=25})),$("#x_USGLt1").mouseup((function(){mouseUPEL="x_USGLt1",mouseUPROW=1;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt2").mouseup((function(){mouseUPEL="x_USGLt2",mouseUPROW=2;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt3").mouseup((function(){mouseUPEL="x_USGLt3",mouseUPROW=3;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt4").mouseup((function(){mouseUPEL="x_USGLt4",mouseUPROW=4;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt5").mouseup((function(){mouseUPEL="x_USGLt5",mouseUPROW=5;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt6").mouseup((function(){mouseUPEL="x_USGLt6",mouseUPROW=6;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt7").mouseup((function(){mouseUPEL="x_USGLt7",mouseUPROW=7;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt8").mouseup((function(){mouseUPEL="x_USGLt8",mouseUPROW=8;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt9").mouseup((function(){mouseUPEL="x_USGLt9",mouseUPROW=9;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt10").mouseup((function(){mouseUPEL="x_USGLt10",mouseUPROW=10;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt11").mouseup((function(){mouseUPEL="x_USGLt11",mouseUPROW=11;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt12").mouseup((function(){mouseUPEL="x_USGLt12",mouseUPROW=12;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt13").mouseup((function(){mouseUPEL="x_USGLt13",mouseUPROW=13;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt14").mouseup((function(){mouseUPEL="x_USGLt14",mouseUPROW=14;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt15").mouseup((function(){mouseUPEL="x_USGLt15",mouseUPROW=15;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt16").mouseup((function(){mouseUPEL="x_USGLt16",mouseUPROW=16;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt17").mouseup((function(){mouseUPEL="x_USGLt17",mouseUPROW=17;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt18").mouseup((function(){mouseUPEL="x_USGLt18",mouseUPROW=18;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt19").mouseup((function(){mouseUPEL="x_USGLt19",mouseUPROW=19;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt20").mouseup((function(){mouseUPEL="x_USGLt20",mouseUPROW=20;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt21").mouseup((function(){mouseUPEL="x_USGLt21",mouseUPROW=21;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt22").mouseup((function(){mouseUPEL="x_USGLt22",mouseUPROW=22;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt23").mouseup((function(){mouseUPEL="x_USGLt23",mouseUPROW=23;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt24").mouseup((function(){mouseUPEL="x_USGLt24",mouseUPROW=24;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt25").mouseup((function(){mouseUPEL="x_USGLt25",mouseUPROW=25;var e=document.getElementById("x_USGLt"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_USGLt"+i).value=e})),$("#x_USGLt1").click((function(){sorceEL="x_USGLt1",sourceROW=1})),$("#x_USGLt2").click((function(){sorceEL="x_USGLt2",sourceROW=2})),$("#x_USGLt3").click((function(){sorceEL="x_USGLt3",sourceROW=3})),$("#x_USGLt4").click((function(){sorceEL="x_USGLt4",sourceROW=4})),$("#x_USGLt5").click((function(){sorceEL="x_USGLt5",sourceROW=5})),$("#x_USGLt6").click((function(){sorceEL="x_USGLt6",sourceROW=6})),$("#x_USGLt7").click((function(){sorceEL="x_USGLt7",sourceROW=7})),$("#x_USGLt8").click((function(){sorceEL="x_USGLt8",sourceROW=8})),$("#x_USGLt9").click((function(){sorceEL="x_USGLt9",sourceROW=9})),$("#x_USGLt10").click((function(){sorceEL="x_USGLt10",sourceROW=10})),$("#x_USGLt11").click((function(){sorceEL="x_USGLt11",sourceROW=11})),$("#x_USGLt12").click((function(){sorceEL="x_USGLt12",sourceROW=12})),$("#x_USGLt13").click((function(){sorceEL="x_USGLt13",sourceROW=13})),$("#x_USGLt14").click((function(){sorceEL="x_USGLt14",sourceROW=14})),$("#x_USGLt15").click((function(){sorceEL="x_USGLt15",sourceROW=15})),$("#x_USGLt16").click((function(){sorceEL="x_USGLt16",sourceROW=16})),$("#x_USGLt17").click((function(){sorceEL="x_USGLt17",sourceROW=17})),$("#x_USGLt18").click((function(){sorceEL="x_USGLt18",sourceROW=18})),$("#x_USGLt19").click((function(){sorceEL="x_USGLt19",sourceROW=19})),$("#x_USGLt20").click((function(){sorceEL="x_USGLt20",sourceROW=20})),$("#x_USGLt21").click((function(){sorceEL="x_USGLt21",sourceROW=21})),$("#x_USGLt22").click((function(){sorceEL="x_USGLt22",sourceROW=22})),$("#x_USGLt23").click((function(){sorceEL="x_USGLt23",sourceROW=23})),$("#x_USGLt24").click((function(){sorceEL="x_USGLt24",sourceROW=24})),$("#x_USGLt25").click((function(){sorceEL="x_USGLt25",sourceROW=25})),$("#x_USGLt1").mousedown((function(){sorceEL="x_USGLt1",sourceROW=1})),$("#x_USGLt2").mousedown((function(){sorceEL="x_USGLt2",sourceROW=2})),$("#x_USGLt3").mousedown((function(){sorceEL="x_USGLt3",sourceROW=3})),$("#x_USGLt4").mousedown((function(){sorceEL="x_USGLt4",sourceROW=4})),$("#x_USGLt5").mousedown((function(){sorceEL="x_USGLt5",sourceROW=5})),$("#x_USGLt6").mousedown((function(){sorceEL="x_USGLt6",sourceROW=6})),$("#x_USGLt7").mousedown((function(){sorceEL="x_USGLt7",sourceROW=7})),$("#x_USGLt8").mousedown((function(){sorceEL="x_USGLt8",sourceROW=8})),$("#x_USGLt9").mousedown((function(){sorceEL="x_USGLt9",sourceROW=9})),$("#x_USGLt10").mousedown((function(){sorceEL="x_USGLt10",sourceROW=10})),$("#x_USGLt11").mousedown((function(){sorceEL="x_USGLt11",sourceROW=11})),$("#x_USGLt12").mousedown((function(){sorceEL="x_USGLt12",sourceROW=12})),$("#x_USGLt13").mousedown((function(){sorceEL="x_USGLt13",sourceROW=13})),$("#x_USGLt14").mousedown((function(){sorceEL="x_USGLt14",sourceROW=14})),$("#x_USGLt15").mousedown((function(){sorceEL="x_USGLt15",sourceROW=15})),$("#x_USGLt16").mousedown((function(){sorceEL="x_USGLt16",sourceROW=16})),$("#x_USGLt17").mousedown((function(){sorceEL="x_USGLt17",sourceROW=17})),$("#x_USGLt18").mousedown((function(){sorceEL="x_USGLt18",sourceROW=18})),$("#x_USGLt19").mousedown((function(){sorceEL="x_USGLt19",sourceROW=19})),$("#x_USGLt20").mousedown((function(){sorceEL="x_USGLt20",sourceROW=20})),$("#x_USGLt21").mousedown((function(){sorceEL="x_USGLt21",sourceROW=21})),$("#x_USGLt22").mousedown((function(){sorceEL="x_USGLt22",sourceROW=22})),$("#x_USGLt23").mousedown((function(){sorceEL="x_USGLt23",sourceROW=23})),$("#x_USGLt24").mousedown((function(){sorceEL="x_USGLt24",sourceROW=24})),$("#x_USGLt25").mousedown((function(){sorceEL="x_USGLt25",sourceROW=25})),$("#x_EM1").mouseup((function(){mouseUPEL="x_EM1",mouseUPROW=1;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM2").mouseup((function(){mouseUPEL="x_EM2",mouseUPROW=2;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM3").mouseup((function(){mouseUPEL="x_EM3",mouseUPROW=3;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM4").mouseup((function(){mouseUPEL="x_EM4",mouseUPROW=4;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM5").mouseup((function(){mouseUPEL="x_EM5",mouseUPROW=5;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM6").mouseup((function(){mouseUPEL="x_EM6",mouseUPROW=6;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM7").mouseup((function(){mouseUPEL="x_EM7",mouseUPROW=7;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM8").mouseup((function(){mouseUPEL="x_EM8",mouseUPROW=8;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM9").mouseup((function(){mouseUPEL="x_EM9",mouseUPROW=9;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM10").mouseup((function(){mouseUPEL="x_EM10",mouseUPROW=10;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM11").mouseup((function(){mouseUPEL="x_EM11",mouseUPROW=11;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM12").mouseup((function(){mouseUPEL="x_EM12",mouseUPROW=12;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM13").mouseup((function(){mouseUPEL="x_EM13",mouseUPROW=13;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM14").mouseup((function(){mouseUPEL="x_EM14",mouseUPROW=14;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM15").mouseup((function(){mouseUPEL="x_EM15",mouseUPROW=15;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM16").mouseup((function(){mouseUPEL="x_EM16",mouseUPROW=16;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM17").mouseup((function(){mouseUPEL="x_EM17",mouseUPROW=17;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM18").mouseup((function(){mouseUPEL="x_EM18",mouseUPROW=18;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM19").mouseup((function(){mouseUPEL="x_EM19",mouseUPROW=19;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM20").mouseup((function(){mouseUPEL="x_EM20",mouseUPROW=20;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM21").mouseup((function(){mouseUPEL="x_EM21",mouseUPROW=21;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM22").mouseup((function(){mouseUPEL="x_EM22",mouseUPROW=22;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM23").mouseup((function(){mouseUPEL="x_EM23",mouseUPROW=23;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM24").mouseup((function(){mouseUPEL="x_EM24",mouseUPROW=24;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM25").mouseup((function(){mouseUPEL="x_EM25",mouseUPROW=25;var e=document.getElementById("x_EM"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_EM"+i).value=e})),$("#x_EM1").click((function(){sorceEL="x_EM1",sourceROW=1})),$("#x_EM2").click((function(){sorceEL="x_EM2",sourceROW=2})),$("#x_EM3").click((function(){sorceEL="x_EM3",sourceROW=3})),$("#x_EM4").click((function(){sorceEL="x_EM4",sourceROW=4})),$("#x_EM5").click((function(){sorceEL="x_EM5",sourceROW=5})),$("#x_EM6").click((function(){sorceEL="x_EM6",sourceROW=6})),$("#x_EM7").click((function(){sorceEL="x_EM7",sourceROW=7})),$("#x_EM8").click((function(){sorceEL="x_EM8",sourceROW=8})),$("#x_EM9").click((function(){sorceEL="x_EM9",sourceROW=9})),$("#x_EM10").click((function(){sorceEL="x_EM10",sourceROW=10})),$("#x_EM11").click((function(){sorceEL="x_EM11",sourceROW=11})),$("#x_EM12").click((function(){sorceEL="x_EM12",sourceROW=12})),$("#x_EM13").click((function(){sorceEL="x_EM13",sourceROW=13})),$("#x_EM14").click((function(){sorceEL="x_EM14",sourceROW=14})),$("#x_EM15").click((function(){sorceEL="x_EM15",sourceROW=15})),$("#x_EM16").click((function(){sorceEL="x_EM16",sourceROW=16})),$("#x_EM17").click((function(){sorceEL="x_EM17",sourceROW=17})),$("#x_EM18").click((function(){sorceEL="x_EM18",sourceROW=18})),$("#x_EM19").click((function(){sorceEL="x_EM19",sourceROW=19})),$("#x_EM20").click((function(){sorceEL="x_EM20",sourceROW=20})),$("#x_EM21").click((function(){sorceEL="x_EM21",sourceROW=21})),$("#x_EM22").click((function(){sorceEL="x_EM22",sourceROW=22})),$("#x_EM23").click((function(){sorceEL="x_EM23",sourceROW=23})),$("#x_EM24").click((function(){sorceEL="x_EM24",sourceROW=24})),$("#x_EM25").click((function(){sorceEL="x_EM25",sourceROW=25})),$("#x_EM1").mousedown((function(){sorceEL="x_EM1",sourceROW=1})),$("#x_EM2").mousedown((function(){sorceEL="x_EM2",sourceROW=2})),$("#x_EM3").mousedown((function(){sorceEL="x_EM3",sourceROW=3})),$("#x_EM4").mousedown((function(){sorceEL="x_EM4",sourceROW=4})),$("#x_EM5").mousedown((function(){sorceEL="x_EM5",sourceROW=5})),$("#x_EM6").mousedown((function(){sorceEL="x_EM6",sourceROW=6})),$("#x_EM7").mousedown((function(){sorceEL="x_EM7",sourceROW=7})),$("#x_EM8").mousedown((function(){sorceEL="x_EM8",sourceROW=8})),$("#x_EM9").mousedown((function(){sorceEL="x_EM9",sourceROW=9})),$("#x_EM10").mousedown((function(){sorceEL="x_EM10",sourceROW=10})),$("#x_EM11").mousedown((function(){sorceEL="x_EM11",sourceROW=11})),$("#x_EM12").mousedown((function(){sorceEL="x_EM12",sourceROW=12})),$("#x_EM13").mousedown((function(){sorceEL="x_EM13",sourceROW=13})),$("#x_EM14").mousedown((function(){sorceEL="x_EM14",sourceROW=14})),$("#x_EM15").mousedown((function(){sorceEL="x_EM15",sourceROW=15})),$("#x_EM16").mousedown((function(){sorceEL="x_EM16",sourceROW=16})),$("#x_EM17").mousedown((function(){sorceEL="x_EM17",sourceROW=17})),$("#x_EM18").mousedown((function(){sorceEL="x_EM18",sourceROW=18})),$("#x_EM19").mousedown((function(){sorceEL="x_EM19",sourceROW=19})),$("#x_EM20").mousedown((function(){sorceEL="x_EM20",sourceROW=20})),$("#x_EM21").mousedown((function(){sorceEL="x_EM21",sourceROW=21})),$("#x_EM22").mousedown((function(){sorceEL="x_EM22",sourceROW=22})),$("#x_EM23").mousedown((function(){sorceEL="x_EM23",sourceROW=23})),$("#x_EM24").mousedown((function(){sorceEL="x_EM24",sourceROW=24})),$("#x_EM25").mousedown((function(){sorceEL="x_EM25",sourceROW=25})),$("#x_Others1").mouseup((function(){mouseUPEL="x_Others1",mouseUPROW=1;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others2").mouseup((function(){mouseUPEL="x_Others2",mouseUPROW=2;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others3").mouseup((function(){mouseUPEL="x_Others3",mouseUPROW=3;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others4").mouseup((function(){mouseUPEL="x_Others4",mouseUPROW=4;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others5").mouseup((function(){mouseUPEL="x_Others5",mouseUPROW=5;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others6").mouseup((function(){mouseUPEL="x_Others6",mouseUPROW=6;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others7").mouseup((function(){mouseUPEL="x_Others7",mouseUPROW=7;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others8").mouseup((function(){mouseUPEL="x_Others8",mouseUPROW=8;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others9").mouseup((function(){mouseUPEL="x_Others9",mouseUPROW=9;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others10").mouseup((function(){mouseUPEL="x_Others10",mouseUPROW=10;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others11").mouseup((function(){mouseUPEL="x_Others11",mouseUPROW=11;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others12").mouseup((function(){mouseUPEL="x_Others12",mouseUPROW=12;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others13").mouseup((function(){mouseUPEL="x_Others13",mouseUPROW=13;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others14").mouseup((function(){mouseUPEL="x_Others14",mouseUPROW=14;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others15").mouseup((function(){mouseUPEL="x_Others15",mouseUPROW=15;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others16").mouseup((function(){mouseUPEL="x_Others16",mouseUPROW=16;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others17").mouseup((function(){mouseUPEL="x_Others17",mouseUPROW=17;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others18").mouseup((function(){mouseUPEL="x_Others18",mouseUPROW=18;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others19").mouseup((function(){mouseUPEL="x_Others19",mouseUPROW=19;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others20").mouseup((function(){mouseUPEL="x_Others20",mouseUPROW=20;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others21").mouseup((function(){mouseUPEL="x_Others21",mouseUPROW=21;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others22").mouseup((function(){mouseUPEL="x_Others22",mouseUPROW=22;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others23").mouseup((function(){mouseUPEL="x_Others23",mouseUPROW=23;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others24").mouseup((function(){mouseUPEL="x_Others24",mouseUPROW=24;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others25").mouseup((function(){mouseUPEL="x_Others25",mouseUPROW=25;var e=document.getElementById("x_Others"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_Others"+i).value=e})),$("#x_Others1").click((function(){sorceEL="x_Others1",sourceROW=1})),$("#x_Others2").click((function(){sorceEL="x_Others2",sourceROW=2})),$("#x_Others3").click((function(){sorceEL="x_Others3",sourceROW=3})),$("#x_Others4").click((function(){sorceEL="x_Others4",sourceROW=4})),$("#x_Others5").click((function(){sorceEL="x_Others5",sourceROW=5})),$("#x_Others6").click((function(){sorceEL="x_Others6",sourceROW=6})),$("#x_Others7").click((function(){sorceEL="x_Others7",sourceROW=7})),$("#x_Others8").click((function(){sorceEL="x_Others8",sourceROW=8})),$("#x_Others9").click((function(){sorceEL="x_Others9",sourceROW=9})),$("#x_Others10").click((function(){sorceEL="x_Others10",sourceROW=10})),$("#x_Others11").click((function(){sorceEL="x_Others11",sourceROW=11})),$("#x_Others12").click((function(){sorceEL="x_Others12",sourceROW=12})),$("#x_Others13").click((function(){sorceEL="x_Others13",sourceROW=13})),$("#x_Others14").click((function(){sorceEL="x_Others14",sourceROW=14})),$("#x_Others15").click((function(){sorceEL="x_Others15",sourceROW=15})),$("#x_Others16").click((function(){sorceEL="x_Others16",sourceROW=16})),$("#x_Others17").click((function(){sorceEL="x_Others17",sourceROW=17})),$("#x_Others18").click((function(){sorceEL="x_Others18",sourceROW=18})),$("#x_Others19").click((function(){sorceEL="x_Others19",sourceROW=19})),$("#x_Others20").click((function(){sorceEL="x_Others20",sourceROW=20})),$("#x_Others21").click((function(){sorceEL="x_Others21",sourceROW=21})),$("#x_Others22").click((function(){sorceEL="x_Others22",sourceROW=22})),$("#x_Others23").click((function(){sorceEL="x_Others23",sourceROW=23})),$("#x_Others24").click((function(){sorceEL="x_Others24",sourceROW=24})),$("#x_Others25").click((function(){sorceEL="x_Others25",sourceROW=25})),$("#x_Others1").mousedown((function(){sorceEL="x_Others1",sourceROW=1})),$("#x_Others2").mousedown((function(){sorceEL="x_Others2",sourceROW=2})),$("#x_Others3").mousedown((function(){sorceEL="x_Others3",sourceROW=3})),$("#x_Others4").mousedown((function(){sorceEL="x_Others4",sourceROW=4})),$("#x_Others5").mousedown((function(){sorceEL="x_Others5",sourceROW=5})),$("#x_Others6").mousedown((function(){sorceEL="x_Others6",sourceROW=6})),$("#x_Others7").mousedown((function(){sorceEL="x_Others7",sourceROW=7})),$("#x_Others8").mousedown((function(){sorceEL="x_Others8",sourceROW=8})),$("#x_Others9").mousedown((function(){sorceEL="x_Others9",sourceROW=9})),$("#x_Others10").mousedown((function(){sorceEL="x_Others10",sourceROW=10})),$("#x_Others11").mousedown((function(){sorceEL="x_Others11",sourceROW=11})),$("#x_Others12").mousedown((function(){sorceEL="x_Others12",sourceROW=12})),$("#x_Others13").mousedown((function(){sorceEL="x_Others13",sourceROW=13})),$("#x_Others14").mousedown((function(){sorceEL="x_Others14",sourceROW=14})),$("#x_Others15").mousedown((function(){sorceEL="x_Others15",sourceROW=15})),$("#x_Others16").mousedown((function(){sorceEL="x_Others16",sourceROW=16})),$("#x_Others17").mousedown((function(){sorceEL="x_Others17",sourceROW=17})),$("#x_Others18").mousedown((function(){sorceEL="x_Others18",sourceROW=18})),$("#x_Others19").mousedown((function(){sorceEL="x_Others19",sourceROW=19})),$("#x_Others20").mousedown((function(){sorceEL="x_Others20",sourceROW=20})),$("#x_Others21").mousedown((function(){sorceEL="x_Others21",sourceROW=21})),$("#x_Others22").mousedown((function(){sorceEL="x_Others22",sourceROW=22})),$("#x_Others23").mousedown((function(){sorceEL="x_Others23",sourceROW=23})),$("#x_Others24").mousedown((function(){sorceEL="x_Others24",sourceROW=24})),$("#x_Others25").mousedown((function(){sorceEL="x_Others25",sourceROW=25})),$("#x_DR1").mouseup((function(){mouseUPEL="x_DR1",mouseUPROW=1;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR2").mouseup((function(){mouseUPEL="x_DR2",mouseUPROW=2;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR3").mouseup((function(){mouseUPEL="x_DR3",mouseUPROW=3;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR4").mouseup((function(){mouseUPEL="x_DR4",mouseUPROW=4;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR5").mouseup((function(){mouseUPEL="x_DR5",mouseUPROW=5;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR6").mouseup((function(){mouseUPEL="x_DR6",mouseUPROW=6;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR7").mouseup((function(){mouseUPEL="x_DR7",mouseUPROW=7;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR8").mouseup((function(){mouseUPEL="x_DR8",mouseUPROW=8;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR9").mouseup((function(){mouseUPEL="x_DR9",mouseUPROW=9;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR10").mouseup((function(){mouseUPEL="x_DR10",mouseUPROW=10;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR11").mouseup((function(){mouseUPEL="x_DR11",mouseUPROW=11;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR12").mouseup((function(){mouseUPEL="x_DR12",mouseUPROW=12;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR13").mouseup((function(){mouseUPEL="x_DR13",mouseUPROW=13;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR14").mouseup((function(){mouseUPEL="x_DR14",mouseUPROW=14;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR15").mouseup((function(){mouseUPEL="x_DR15",mouseUPROW=15;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR16").mouseup((function(){mouseUPEL="x_DR16",mouseUPROW=16;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR17").mouseup((function(){mouseUPEL="x_DR17",mouseUPROW=17;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR18").mouseup((function(){mouseUPEL="x_DR18",mouseUPROW=18;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR19").mouseup((function(){mouseUPEL="x_DR19",mouseUPROW=19;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR20").mouseup((function(){mouseUPEL="x_DR20",mouseUPROW=20;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR21").mouseup((function(){mouseUPEL="x_DR21",mouseUPROW=21;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR22").mouseup((function(){mouseUPEL="x_DR22",mouseUPROW=22;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR23").mouseup((function(){mouseUPEL="x_DR23",mouseUPROW=23;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR24").mouseup((function(){mouseUPEL="x_DR24",mouseUPROW=24;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR25").mouseup((function(){mouseUPEL="x_DR25",mouseUPROW=25;var e=document.getElementById("x_DR"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_DR"+i).value=e})),$("#x_DR1").click((function(){sorceEL="x_DR1",sourceROW=1})),$("#x_DR2").click((function(){sorceEL="x_DR2",sourceROW=2})),$("#x_DR3").click((function(){sorceEL="x_DR3",sourceROW=3})),$("#x_DR4").click((function(){sorceEL="x_DR4",sourceROW=4})),$("#x_DR5").click((function(){sorceEL="x_DR5",sourceROW=5})),$("#x_DR6").click((function(){sorceEL="x_DR6",sourceROW=6})),$("#x_DR7").click((function(){sorceEL="x_DR7",sourceROW=7})),$("#x_DR8").click((function(){sorceEL="x_DR8",sourceROW=8})),$("#x_DR9").click((function(){sorceEL="x_DR9",sourceROW=9})),$("#x_DR10").click((function(){sorceEL="x_DR10",sourceROW=10})),$("#x_DR11").click((function(){sorceEL="x_DR11",sourceROW=11})),$("#x_DR12").click((function(){sorceEL="x_DR12",sourceROW=12})),$("#x_DR13").click((function(){sorceEL="x_DR13",sourceROW=13})),$("#x_DR14").click((function(){sorceEL="x_DR14",sourceROW=14})),$("#x_DR15").click((function(){sorceEL="x_DR15",sourceROW=15})),$("#x_DR16").click((function(){sorceEL="x_DR16",sourceROW=16})),$("#x_DR17").click((function(){sorceEL="x_DR17",sourceROW=17})),$("#x_DR18").click((function(){sorceEL="x_DR18",sourceROW=18})),$("#x_DR19").click((function(){sorceEL="x_DR19",sourceROW=19})),$("#x_DR20").click((function(){sorceEL="x_DR20",sourceROW=20})),$("#x_DR21").click((function(){sorceEL="x_DR21",sourceROW=21})),$("#x_DR22").click((function(){sorceEL="x_DR22",sourceROW=22})),$("#x_DR23").click((function(){sorceEL="x_DR23",sourceROW=23})),$("#x_DR24").click((function(){sorceEL="x_DR24",sourceROW=24})),$("#x_DR25").click((function(){sorceEL="x_DR25",sourceROW=25})),$("#x_DR1").mousedown((function(){sorceEL="x_DR1",sourceROW=1})),$("#x_DR2").mousedown((function(){sorceEL="x_DR2",sourceROW=2})),$("#x_DR3").mousedown((function(){sorceEL="x_DR3",sourceROW=3})),$("#x_DR4").mousedown((function(){sorceEL="x_DR4",sourceROW=4})),$("#x_DR5").mousedown((function(){sorceEL="x_DR5",sourceROW=5})),$("#x_DR6").mousedown((function(){sorceEL="x_DR6",sourceROW=6})),$("#x_DR7").mousedown((function(){sorceEL="x_DR7",sourceROW=7})),$("#x_DR8").mousedown((function(){sorceEL="x_DR8",sourceROW=8})),$("#x_DR9").mousedown((function(){sorceEL="x_DR9",sourceROW=9})),$("#x_DR10").mousedown((function(){sorceEL="x_DR10",sourceROW=10})),$("#x_DR11").mousedown((function(){sorceEL="x_DR11",sourceROW=11})),$("#x_DR12").mousedown((function(){sorceEL="x_DR12",sourceROW=12})),$("#x_DR13").mousedown((function(){sorceEL="x_DR13",sourceROW=13})),$("#x_DR14").mousedown((function(){sorceEL="x_DR14",sourceROW=14})),$("#x_DR15").mousedown((function(){sorceEL="x_DR15",sourceROW=15})),$("#x_DR16").mousedown((function(){sorceEL="x_DR16",sourceROW=16})),$("#x_DR17").mousedown((function(){sorceEL="x_DR17",sourceROW=17})),$("#x_DR18").mousedown((function(){sorceEL="x_DR18",sourceROW=18})),$("#x_DR19").mousedown((function(){sorceEL="x_DR19",sourceROW=19})),$("#x_DR20").mousedown((function(){sorceEL="x_DR20",sourceROW=20})),$("#x_DR21").mousedown((function(){sorceEL="x_DR21",sourceROW=21})),$("#x_DR22").mousedown((function(){sorceEL="x_DR22",sourceROW=22})),$("#x_DR23").mousedown((function(){sorceEL="x_DR23",sourceROW=23})),$("#x_DR24").mousedown((function(){sorceEL="x_DR24",sourceROW=24})),$("#x_DR25").mousedown((function(){sorceEL="x_DR25",sourceROW=25})),$("#x_RFSH1").mouseup((function(){mouseUPEL="x_RFSH1",mouseUPROW=1;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH2").mouseup((function(){mouseUPEL="x_RFSH2",mouseUPROW=2;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH3").mouseup((function(){mouseUPEL="x_RFSH3",mouseUPROW=3;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH4").mouseup((function(){mouseUPEL="x_RFSH4",mouseUPROW=4;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH5").mouseup((function(){mouseUPEL="x_RFSH5",mouseUPROW=5;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH6").mouseup((function(){mouseUPEL="x_RFSH6",mouseUPROW=6;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH7").mouseup((function(){mouseUPEL="x_RFSH7",mouseUPROW=7;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH8").mouseup((function(){mouseUPEL="x_RFSH8",mouseUPROW=8;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH9").mouseup((function(){mouseUPEL="x_RFSH9",mouseUPROW=9;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH10").mouseup((function(){mouseUPEL="x_RFSH10",mouseUPROW=10;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH11").mouseup((function(){mouseUPEL="x_RFSH11",mouseUPROW=11;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH12").mouseup((function(){mouseUPEL="x_RFSH12",mouseUPROW=12;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH13").mouseup((function(){mouseUPEL="x_RFSH13",mouseUPROW=13;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH14").mouseup((function(){mouseUPEL="x_RFSH14",mouseUPROW=14;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH15").mouseup((function(){mouseUPEL="x_RFSH15",mouseUPROW=15;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH16").mouseup((function(){mouseUPEL="x_RFSH16",mouseUPROW=16;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH17").mouseup((function(){mouseUPEL="x_RFSH17",mouseUPROW=17;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH18").mouseup((function(){mouseUPEL="x_RFSH18",mouseUPROW=18;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH19").mouseup((function(){mouseUPEL="x_RFSH19",mouseUPROW=19;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH20").mouseup((function(){mouseUPEL="x_RFSH20",mouseUPROW=20;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH21").mouseup((function(){mouseUPEL="x_RFSH21",mouseUPROW=21;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH22").mouseup((function(){mouseUPEL="x_RFSH22",mouseUPROW=22;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH23").mouseup((function(){mouseUPEL="x_RFSH23",mouseUPROW=23;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH24").mouseup((function(){mouseUPEL="x_RFSH24",mouseUPROW=24;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH25").mouseup((function(){mouseUPEL="x_RFSH25",mouseUPROW=25;var e=document.getElementById("x_RFSH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_RFSH"+i).value=e})),$("#x_RFSH1").click((function(){sorceEL="x_RFSH1",sourceROW=1})),$("#x_RFSH2").click((function(){sorceEL="x_RFSH2",sourceROW=2})),$("#x_RFSH3").click((function(){sorceEL="x_RFSH3",sourceROW=3})),$("#x_RFSH4").click((function(){sorceEL="x_RFSH4",sourceROW=4})),$("#x_RFSH5").click((function(){sorceEL="x_RFSH5",sourceROW=5})),$("#x_RFSH6").click((function(){sorceEL="x_RFSH6",sourceROW=6})),$("#x_RFSH7").click((function(){sorceEL="x_RFSH7",sourceROW=7})),$("#x_RFSH8").click((function(){sorceEL="x_RFSH8",sourceROW=8})),$("#x_RFSH9").click((function(){sorceEL="x_RFSH9",sourceROW=9})),$("#x_RFSH10").click((function(){sorceEL="x_RFSH10",sourceROW=10})),$("#x_RFSH11").click((function(){sorceEL="x_RFSH11",sourceROW=11})),$("#x_RFSH12").click((function(){sorceEL="x_RFSH12",sourceROW=12})),$("#x_RFSH13").click((function(){sorceEL="x_RFSH13",sourceROW=13})),$("#x_RFSH14").click((function(){sorceEL="x_RFSH14",sourceROW=14})),$("#x_RFSH15").click((function(){sorceEL="x_RFSH15",sourceROW=15})),$("#x_RFSH16").click((function(){sorceEL="x_RFSH16",sourceROW=16})),$("#x_RFSH17").click((function(){sorceEL="x_RFSH17",sourceROW=17})),$("#x_RFSH18").click((function(){sorceEL="x_RFSH18",sourceROW=18})),$("#x_RFSH19").click((function(){sorceEL="x_RFSH19",sourceROW=19})),$("#x_RFSH20").click((function(){sorceEL="x_RFSH20",sourceROW=20})),$("#x_RFSH21").click((function(){sorceEL="x_RFSH21",sourceROW=21})),$("#x_RFSH22").click((function(){sorceEL="x_RFSH22",sourceROW=22})),$("#x_RFSH23").click((function(){sorceEL="x_RFSH23",sourceROW=23})),$("#x_RFSH24").click((function(){sorceEL="x_RFSH24",sourceROW=24})),$("#x_RFSH25").click((function(){sorceEL="x_RFSH25",sourceROW=25})),$("#x_RFSH1").mousedown((function(){sorceEL="x_RFSH1",sourceROW=1})),$("#x_RFSH2").mousedown((function(){sorceEL="x_RFSH2",sourceROW=2})),$("#x_RFSH3").mousedown((function(){sorceEL="x_RFSH3",sourceROW=3})),$("#x_RFSH4").mousedown((function(){sorceEL="x_RFSH4",sourceROW=4})),$("#x_RFSH5").mousedown((function(){sorceEL="x_RFSH5",sourceROW=5})),$("#x_RFSH6").mousedown((function(){sorceEL="x_RFSH6",sourceROW=6})),$("#x_RFSH7").mousedown((function(){sorceEL="x_RFSH7",sourceROW=7})),$("#x_RFSH8").mousedown((function(){sorceEL="x_RFSH8",sourceROW=8})),$("#x_RFSH9").mousedown((function(){sorceEL="x_RFSH9",sourceROW=9})),$("#x_RFSH10").mousedown((function(){sorceEL="x_RFSH10",sourceROW=10})),$("#x_RFSH11").mousedown((function(){sorceEL="x_RFSH11",sourceROW=11})),$("#x_RFSH12").mousedown((function(){sorceEL="x_RFSH12",sourceROW=12})),$("#x_RFSH13").mousedown((function(){sorceEL="x_RFSH13",sourceROW=13})),$("#x_RFSH14").mousedown((function(){sorceEL="x_RFSH14",sourceROW=14})),$("#x_RFSH15").mousedown((function(){sorceEL="x_RFSH15",sourceROW=15})),$("#x_RFSH16").mousedown((function(){sorceEL="x_RFSH16",sourceROW=16})),$("#x_RFSH17").mousedown((function(){sorceEL="x_RFSH17",sourceROW=17})),$("#x_RFSH18").mousedown((function(){sorceEL="x_RFSH18",sourceROW=18})),$("#x_RFSH19").mousedown((function(){sorceEL="x_RFSH19",sourceROW=19})),$("#x_RFSH20").mousedown((function(){sorceEL="x_RFSH20",sourceROW=20})),$("#x_RFSH21").mousedown((function(){sorceEL="x_RFSH21",sourceROW=21})),$("#x_RFSH22").mousedown((function(){sorceEL="x_RFSH22",sourceROW=22})),$("#x_RFSH23").mousedown((function(){sorceEL="x_RFSH23",sourceROW=23})),$("#x_RFSH24").mousedown((function(){sorceEL="x_RFSH24",sourceROW=24})),$("#x_RFSH25").mousedown((function(){sorceEL="x_RFSH25",sourceROW=25})),$("#x_HMG1").mouseup((function(){mouseUPEL="x_HMG1",mouseUPROW=1;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG2").mouseup((function(){mouseUPEL="x_HMG2",mouseUPROW=2;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG3").mouseup((function(){mouseUPEL="x_HMG3",mouseUPROW=3;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG4").mouseup((function(){mouseUPEL="x_HMG4",mouseUPROW=4;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG5").mouseup((function(){mouseUPEL="x_HMG5",mouseUPROW=5;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG6").mouseup((function(){mouseUPEL="x_HMG6",mouseUPROW=6;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG7").mouseup((function(){mouseUPEL="x_HMG7",mouseUPROW=7;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG8").mouseup((function(){mouseUPEL="x_HMG8",mouseUPROW=8;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG9").mouseup((function(){mouseUPEL="x_HMG9",mouseUPROW=9;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG10").mouseup((function(){mouseUPEL="x_HMG10",mouseUPROW=10;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG11").mouseup((function(){mouseUPEL="x_HMG11",mouseUPROW=11;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG12").mouseup((function(){mouseUPEL="x_HMG12",mouseUPROW=12;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG13").mouseup((function(){mouseUPEL="x_HMG13",mouseUPROW=13;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG14").mouseup((function(){mouseUPEL="x_HMG14",mouseUPROW=14;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG15").mouseup((function(){mouseUPEL="x_HMG15",mouseUPROW=15;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG16").mouseup((function(){mouseUPEL="x_HMG16",mouseUPROW=16;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG17").mouseup((function(){mouseUPEL="x_HMG17",mouseUPROW=17;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG18").mouseup((function(){mouseUPEL="x_HMG18",mouseUPROW=18;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG19").mouseup((function(){mouseUPEL="x_HMG19",mouseUPROW=19;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG20").mouseup((function(){mouseUPEL="x_HMG20",mouseUPROW=20;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG21").mouseup((function(){mouseUPEL="x_HMG21",mouseUPROW=21;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG22").mouseup((function(){mouseUPEL="x_HMG22",mouseUPROW=22;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG23").mouseup((function(){mouseUPEL="x_HMG23",mouseUPROW=23;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG24").mouseup((function(){mouseUPEL="x_HMG24",mouseUPROW=24;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG25").mouseup((function(){mouseUPEL="x_HMG25",mouseUPROW=25;var e=document.getElementById("x_HMG"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_HMG"+i).value=e})),$("#x_HMG1").click((function(){sorceEL="x_HMG1",sourceROW=1})),$("#x_HMG2").click((function(){sorceEL="x_HMG2",sourceROW=2})),$("#x_HMG3").click((function(){sorceEL="x_HMG3",sourceROW=3})),$("#x_HMG4").click((function(){sorceEL="x_HMG4",sourceROW=4})),$("#x_HMG5").click((function(){sorceEL="x_HMG5",sourceROW=5})),$("#x_HMG6").click((function(){sorceEL="x_HMG6",sourceROW=6})),$("#x_HMG7").click((function(){sorceEL="x_HMG7",sourceROW=7})),$("#x_HMG8").click((function(){sorceEL="x_HMG8",sourceROW=8})),$("#x_HMG9").click((function(){sorceEL="x_HMG9",sourceROW=9})),$("#x_HMG10").click((function(){sorceEL="x_HMG10",sourceROW=10})),$("#x_HMG11").click((function(){sorceEL="x_HMG11",sourceROW=11})),$("#x_HMG12").click((function(){sorceEL="x_HMG12",sourceROW=12})),$("#x_HMG13").click((function(){sorceEL="x_HMG13",sourceROW=13})),$("#x_HMG14").click((function(){sorceEL="x_HMG14",sourceROW=14})),$("#x_HMG15").click((function(){sorceEL="x_HMG15",sourceROW=15})),$("#x_HMG16").click((function(){sorceEL="x_HMG16",sourceROW=16})),$("#x_HMG17").click((function(){sorceEL="x_HMG17",sourceROW=17})),$("#x_HMG18").click((function(){sorceEL="x_HMG18",sourceROW=18})),$("#x_HMG19").click((function(){sorceEL="x_HMG19",sourceROW=19})),$("#x_HMG20").click((function(){sorceEL="x_HMG20",sourceROW=20})),$("#x_HMG21").click((function(){sorceEL="x_HMG21",sourceROW=21})),$("#x_HMG22").click((function(){sorceEL="x_HMG22",sourceROW=22})),$("#x_HMG23").click((function(){sorceEL="x_HMG23",sourceROW=23})),$("#x_HMG24").click((function(){sorceEL="x_HMG24",sourceROW=24})),$("#x_HMG25").click((function(){sorceEL="x_HMG25",sourceROW=25})),$("#x_HMG1").mousedown((function(){sorceEL="x_HMG1",sourceROW=1})),$("#x_HMG2").mousedown((function(){sorceEL="x_HMG2",sourceROW=2})),$("#x_HMG3").mousedown((function(){sorceEL="x_HMG3",sourceROW=3})),$("#x_HMG4").mousedown((function(){sorceEL="x_HMG4",sourceROW=4})),$("#x_HMG5").mousedown((function(){sorceEL="x_HMG5",sourceROW=5})),$("#x_HMG6").mousedown((function(){sorceEL="x_HMG6",sourceROW=6})),$("#x_HMG7").mousedown((function(){sorceEL="x_HMG7",sourceROW=7})),$("#x_HMG8").mousedown((function(){sorceEL="x_HMG8",sourceROW=8})),$("#x_HMG9").mousedown((function(){sorceEL="x_HMG9",sourceROW=9})),$("#x_HMG10").mousedown((function(){sorceEL="x_HMG10",sourceROW=10})),$("#x_HMG11").mousedown((function(){sorceEL="x_HMG11",sourceROW=11})),$("#x_HMG12").mousedown((function(){sorceEL="x_HMG12",sourceROW=12})),$("#x_HMG13").mousedown((function(){sorceEL="x_HMG13",sourceROW=13})),$("#x_HMG14").mousedown((function(){sorceEL="x_HMG14",sourceROW=14})),$("#x_HMG15").mousedown((function(){sorceEL="x_HMG15",sourceROW=15})),$("#x_HMG16").mousedown((function(){sorceEL="x_HMG16",sourceROW=16})),$("#x_HMG17").mousedown((function(){sorceEL="x_HMG17",sourceROW=17})),$("#x_HMG18").mousedown((function(){sorceEL="x_HMG18",sourceROW=18})),$("#x_HMG19").mousedown((function(){sorceEL="x_HMG19",sourceROW=19})),$("#x_HMG20").mousedown((function(){sorceEL="x_HMG20",sourceROW=20})),$("#x_HMG21").mousedown((function(){sorceEL="x_HMG21",sourceROW=21})),$("#x_HMG22").mousedown((function(){sorceEL="x_HMG22",sourceROW=22})),$("#x_HMG23").mousedown((function(){sorceEL="x_HMG23",sourceROW=23})),$("#x_HMG24").mousedown((function(){sorceEL="x_HMG24",sourceROW=24})),$("#x_HMG25").mousedown((function(){sorceEL="x_HMG25",sourceROW=25})),$("#x_GnRH1").mouseup((function(){mouseUPEL="x_GnRH1",mouseUPROW=1;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH2").mouseup((function(){mouseUPEL="x_GnRH2",mouseUPROW=2;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH3").mouseup((function(){mouseUPEL="x_GnRH3",mouseUPROW=3;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH4").mouseup((function(){mouseUPEL="x_GnRH4",mouseUPROW=4;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH5").mouseup((function(){mouseUPEL="x_GnRH5",mouseUPROW=5;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH6").mouseup((function(){mouseUPEL="x_GnRH6",mouseUPROW=6;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH7").mouseup((function(){mouseUPEL="x_GnRH7",mouseUPROW=7;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH8").mouseup((function(){mouseUPEL="x_GnRH8",mouseUPROW=8;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH9").mouseup((function(){mouseUPEL="x_GnRH9",mouseUPROW=9;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH10").mouseup((function(){mouseUPEL="x_GnRH10",mouseUPROW=10;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH11").mouseup((function(){mouseUPEL="x_GnRH11",mouseUPROW=11;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH12").mouseup((function(){mouseUPEL="x_GnRH12",mouseUPROW=12;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH13").mouseup((function(){mouseUPEL="x_GnRH13",mouseUPROW=13;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH14").mouseup((function(){mouseUPEL="x_GnRH14",mouseUPROW=14;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH15").mouseup((function(){mouseUPEL="x_GnRH15",mouseUPROW=15;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH16").mouseup((function(){mouseUPEL="x_GnRH16",mouseUPROW=16;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH17").mouseup((function(){mouseUPEL="x_GnRH17",mouseUPROW=17;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH18").mouseup((function(){mouseUPEL="x_GnRH18",mouseUPROW=18;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH19").mouseup((function(){mouseUPEL="x_GnRH19",mouseUPROW=19;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH20").mouseup((function(){mouseUPEL="x_GnRH20",mouseUPROW=20;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH21").mouseup((function(){mouseUPEL="x_GnRH21",mouseUPROW=21;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH22").mouseup((function(){mouseUPEL="x_GnRH22",mouseUPROW=22;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH23").mouseup((function(){mouseUPEL="x_GnRH23",mouseUPROW=23;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH24").mouseup((function(){mouseUPEL="x_GnRH24",mouseUPROW=24;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH25").mouseup((function(){mouseUPEL="x_GnRH25",mouseUPROW=25;var e=document.getElementById("x_GnRH"+sourceROW).value;if(17==keydownval)for(i=sourceROW;i<=mouseUPROW;i++)document.getElementById("x_GnRH"+i).value=e})),$("#x_GnRH1").click((function(){sorceEL="x_GnRH1",sourceROW=1})),$("#x_GnRH2").click((function(){sorceEL="x_GnRH2",sourceROW=2})),$("#x_GnRH3").click((function(){sorceEL="x_GnRH3",sourceROW=3})),$("#x_GnRH4").click((function(){sorceEL="x_GnRH4",sourceROW=4})),$("#x_GnRH5").click((function(){sorceEL="x_GnRH5",sourceROW=5})),$("#x_GnRH6").click((function(){sorceEL="x_GnRH6",sourceROW=6})),$("#x_GnRH7").click((function(){sorceEL="x_GnRH7",sourceROW=7})),$("#x_GnRH8").click((function(){sorceEL="x_GnRH8",sourceROW=8})),$("#x_GnRH9").click((function(){sorceEL="x_GnRH9",sourceROW=9})),$("#x_GnRH10").click((function(){sorceEL="x_GnRH10",sourceROW=10})),$("#x_GnRH11").click((function(){sorceEL="x_GnRH11",sourceROW=11})),$("#x_GnRH12").click((function(){sorceEL="x_GnRH12",sourceROW=12})),$("#x_GnRH13").click((function(){sorceEL="x_GnRH13",sourceROW=13})),$("#x_GnRH14").click((function(){sorceEL="x_GnRH14",sourceROW=14})),$("#x_GnRH15").click((function(){sorceEL="x_GnRH15",sourceROW=15})),$("#x_GnRH16").click((function(){sorceEL="x_GnRH16",sourceROW=16})),$("#x_GnRH17").click((function(){sorceEL="x_GnRH17",sourceROW=17})),$("#x_GnRH18").click((function(){sorceEL="x_GnRH18",sourceROW=18})),$("#x_GnRH19").click((function(){sorceEL="x_GnRH19",sourceROW=19})),$("#x_GnRH20").click((function(){sorceEL="x_GnRH20",sourceROW=20})),$("#x_GnRH21").click((function(){sorceEL="x_GnRH21",sourceROW=21})),$("#x_GnRH22").click((function(){sorceEL="x_GnRH22",sourceROW=22})),$("#x_GnRH23").click((function(){sorceEL="x_GnRH23",sourceROW=23}));$("#x_GnRH24").click((function(){sorceEL="x_GnRH24",sourceROW=24})),$("#x_GnRH25").click((function(){sorceEL="x_GnRH25",sourceROW=25})),$("#x_GnRH1").mousedown((function(){sorceEL="x_GnRH1",sourceROW=1})),$("#x_GnRH2").mousedown((function(){sorceEL="x_GnRH2",sourceROW=2})),$("#x_GnRH3").mousedown((function(){sorceEL="x_GnRH3",sourceROW=3})),$("#x_GnRH4").mousedown((function(){sorceEL="x_GnRH4",sourceROW=4})),$("#x_GnRH5").mousedown((function(){sorceEL="x_GnRH5",sourceROW=5})),$("#x_GnRH6").mousedown((function(){sorceEL="x_GnRH6",sourceROW=6})),$("#x_GnRH7").mousedown((function(){sorceEL="x_GnRH7",sourceROW=7})),$("#x_GnRH8").mousedown((function(){sorceEL="x_GnRH8",sourceROW=8})),$("#x_GnRH9").mousedown((function(){sorceEL="x_GnRH9",sourceROW=9})),$("#x_GnRH10").mousedown((function(){sorceEL="x_GnRH10",sourceROW=10})),$("#x_GnRH11").mousedown((function(){sorceEL="x_GnRH11",sourceROW=11})),$("#x_GnRH12").mousedown((function(){sorceEL="x_GnRH12",sourceROW=12})),$("#x_GnRH13").mousedown((function(){sorceEL="x_GnRH13",sourceROW=13})),$("#x_GnRH14").mousedown((function(){sorceEL="x_GnRH14",sourceROW=14})),$("#x_GnRH15").mousedown((function(){sorceEL="x_GnRH15",sourceROW=15})),$("#x_GnRH16").mousedown((function(){sorceEL="x_GnRH16",sourceROW=16})),$("#x_GnRH17").mousedown((function(){sorceEL="x_GnRH17",sourceROW=17})),$("#x_GnRH18").mousedown((function(){sorceEL="x_GnRH18",sourceROW=18})),$("#x_GnRH19").mousedown((function(){sorceEL="x_GnRH19",sourceROW=19})),$("#x_GnRH20").mousedown((function(){sorceEL="x_GnRH20",sourceROW=20})),$("#x_GnRH21").mousedown((function(){sorceEL="x_GnRH21",sourceROW=21})),$("#x_GnRH22").mousedown((function(){sorceEL="x_GnRH22",sourceROW=22})),$("#x_GnRH23").mousedown((function(){sorceEL="x_GnRH23",sourceROW=23})),$("#x_GnRH24").mousedown((function(){sorceEL="x_GnRH24",sourceROW=24})),$("#x_GnRH25").mousedown((function(){sorceEL="x_GnRH25",sourceROW=25})),document.getElementById("x_ARTCycle").style.width="150px",document.getElementById("x_Protocol").style.width="140px",document.getElementById("x_GROWTHHORMONE").style.width="100px",document.getElementById("x_SemenFrozen").style.width="100px",document.getElementById("x_TypeOfInfertility").style.width="100px",document.getElementById("x_Duration").style.width="100px",document.getElementById("x_TotalICSICycle").style.width="100px",document.getElementById("x_A4ICSICycle").style.width="100px",document.getElementById("x_IUICycles").style.width="100px",document.getElementById("x_OvarianVolumeRT").style.width="100px",document.getElementById("x_RelevantHistory").style.width="100px",document.getElementById("x_AFC").style.width="100px",document.getElementById("x_MedicalFactors").style.width="100px",document.getElementById("x_OvarianSurgery").style.width="100px",document.getElementById("x_PRETREATMENT").style.width="150px",document.getElementById("x_AMH").style.width="100px",document.getElementById("x_INJTYPE").style.width="100px",document.getElementById("x_LMP").style.width="100px",document.getElementById("x_SCDate").style.width="100px",document.getElementById("x_ANTAGONISTSTARTDAY").style.width="100px",document.getElementById("x_Consultant").style.width="100px",document.getElementById("x_InseminatinTechnique").style.width="100px",document.getElementById("x_IndicationForART").style.width="100px",document.getElementById("x_Hysteroscopy").style.width="100px",document.getElementById("x_EndometrialScratching").style.width="100px",document.getElementById("x_TrialCannulation").style.width="100px",document.getElementById("x_CYCLETYPE").style.width="100px",document.getElementById("x_HRTCYCLE").style.width="100px",document.getElementById("x_OralEstrogenDosage").style.width="100px",document.getElementById("x_VaginalEstrogen").style.width="100px",document.getElementById("x_GCSF").style.width="100px",document.getElementById("x_ActivatedPRP").style.width="100px",document.getElementById("x_UCLcm").style.width="100px",document.getElementById("x_DATOFEMBRYOTRANSFER").style.width="100px",document.getElementById("x_DAYOFEMBRYOTRANSFER").style.width="100px",document.getElementById("x_NOOFEMBRYOSTHAWED").style.width="100px",document.getElementById("x_NOOFEMBRYOSTRANSFERRED").style.width="100px",document.getElementById("x_DAYOFEMBRYOS").style.width="100px",document.getElementById("x_CRYOPRESERVEDEMBRYOS").style.width="100px",document.getElementById("x_TUBAL_PATENCY").style.width="100px",document.getElementById("x_HSG").style.width="100px",document.getElementById("x_DHL").style.width="100px",document.getElementById("x_UTERINE_PROBLEMS").style.width="100px",document.getElementById("x_W_COMORBIDS").style.width="100px",document.getElementById("x_H_COMORBIDS").style.width="100px",document.getElementById("x_SEXUAL_DYSFUNCTION").style.width="100px",document.getElementById("x_TABLETS").style.width="100px",document.getElementById("x_FOLLICLE_STATUS").style.width="100px",document.getElementById("x_PROCEDURE").style.width="100px",document.getElementById("x_LUTEAL_SUPPORT").style.width="100px",document.getElementById("x_SPECIFIC_MATERNAL_PROBLEMS").style.width="100px",document.getElementById("x_ONGOING_PREG").style.width="100px",document.getElementById("x_EDD_Date").style.width="100px",document.getElementById("x_TRIGGERR").style.width="100px",document.getElementById("x_TRIGGERDATE").style.width="100px",document.getElementById("x_SEMENPREPARATION").style.width="100px",document.getElementById("x_OPUDATE").style.width="100px",document.getElementById("x_DAYSOFSTIMULATION").style.width="100px",document.getElementById("x_DOSEOFGONADOTROPINS").style.width="100px",document.getElementById("x_ProgesteroneStart").style.width="100px",document.getElementById("x_ANTAGONISTDAYS").style.width="100px",document.getElementById("x_PreProcedureOrder").style.width="100px",document.getElementById("x_Expectedoocytes").style.width="100px",document.getElementById("x_DOCTORRESPONSIBLE").style.width="100px",document.getElementById("x_ALLFREEZEINDICATION").style.width="100px",document.getElementById("x_ERA").style.width="100px",document.getElementById("x_REASONFORESET").style.width="100px",document.getElementById("x_DATEOFET").style.width="100px",document.getElementById("x_ET").style.width="100px",document.getElementById("x_ESET").style.width="100px",document.getElementById("x_DOET").style.width="100px",document.getElementById("x_PGTA").style.width="100px",document.getElementById("x_PGD").style.width="100px",document.getElementById("x_StChDate1").style.width="100px",document.getElementById("x_StChDate2").style.width="100px",document.getElementById("x_StChDate3").style.width="100px",document.getElementById("x_StChDate4").style.width="100px",document.getElementById("x_StChDate5").style.width="100px",document.getElementById("x_StChDate6").style.width="100px",document.getElementById("x_StChDate7").style.width="100px",document.getElementById("x_StChDate8").style.width="100px",document.getElementById("x_StChDate9").style.width="100px",document.getElementById("x_StChDate10").style.width="100px",document.getElementById("x_StChDate11").style.width="100px",document.getElementById("x_StChDate12").style.width="100px",document.getElementById("x_StChDate13").style.width="100px",document.getElementById("x_StChDate14").style.width="100px",document.getElementById("x_StChDate15").style.width="100px",document.getElementById("x_StChDate16").style.width="100px",document.getElementById("x_StChDate17").style.width="100px",document.getElementById("x_StChDate18").style.width="100px",document.getElementById("x_StChDate19").style.width="100px",document.getElementById("x_StChDate20").style.width="100px",document.getElementById("x_StChDate21").style.width="100px",document.getElementById("x_StChDate22").style.width="100px",document.getElementById("x_StChDate23").style.width="100px",document.getElementById("x_StChDate24").style.width="100px",document.getElementById("x_StChDate25").style.width="100px",document.getElementById("x_CycleDay1").style.width="60px",document.getElementById("x_CycleDay2").style.width="60px",document.getElementById("x_CycleDay3").style.width="60px",document.getElementById("x_CycleDay4").style.width="60px",document.getElementById("x_CycleDay5").style.width="60px",document.getElementById("x_CycleDay6").style.width="60px",document.getElementById("x_CycleDay7").style.width="60px",document.getElementById("x_CycleDay8").style.width="60px",document.getElementById("x_CycleDay9").style.width="60px",document.getElementById("x_CycleDay10").style.width="60px",document.getElementById("x_CycleDay11").style.width="60px",document.getElementById("x_CycleDay12").style.width="60px",document.getElementById("x_CycleDay13").style.width="60px",document.getElementById("x_CycleDay14").style.width="60px",document.getElementById("x_CycleDay15").style.width="60px",document.getElementById("x_CycleDay16").style.width="60px",document.getElementById("x_CycleDay17").style.width="60px",document.getElementById("x_CycleDay18").style.width="60px",document.getElementById("x_CycleDay19").style.width="60px",document.getElementById("x_CycleDay20").style.width="60px",document.getElementById("x_CycleDay21").style.width="60px",document.getElementById("x_CycleDay22").style.width="60px",document.getElementById("x_CycleDay23").style.width="60px",document.getElementById("x_CycleDay24").style.width="60px",document.getElementById("x_CycleDay25").style.width="60px",document.getElementById("x_StimulationDay1").style.width="60px",document.getElementById("x_StimulationDay2").style.width="60px",document.getElementById("x_StimulationDay3").style.width="60px",document.getElementById("x_StimulationDay4").style.width="60px",document.getElementById("x_StimulationDay5").style.width="60px",document.getElementById("x_StimulationDay6").style.width="60px",document.getElementById("x_StimulationDay7").style.width="60px",document.getElementById("x_StimulationDay8").style.width="60px",document.getElementById("x_StimulationDay9").style.width="60px",document.getElementById("x_StimulationDay10").style.width="60px",document.getElementById("x_StimulationDay11").style.width="60px",document.getElementById("x_StimulationDay12").style.width="60px",document.getElementById("x_StimulationDay13").style.width="60px",document.getElementById("x_StimulationDay14").style.width="60px",document.getElementById("x_StimulationDay15").style.width="60px",document.getElementById("x_StimulationDay16").style.width="60px",document.getElementById("x_StimulationDay17").style.width="60px",document.getElementById("x_StimulationDay18").style.width="60px",document.getElementById("x_StimulationDay19").style.width="60px",document.getElementById("x_StimulationDay20").style.width="60px",document.getElementById("x_StimulationDay21").style.width="60px",document.getElementById("x_StimulationDay22").style.width="60px",document.getElementById("x_StimulationDay23").style.width="60px",document.getElementById("x_StimulationDay24").style.width="60px",document.getElementById("x_StimulationDay25").style.width="60px",document.getElementById("x_E21").style.width="60px",document.getElementById("x_E22").style.width="60px",document.getElementById("x_E23").style.width="60px",document.getElementById("x_E24").style.width="60px",document.getElementById("x_E25").style.width="60px",document.getElementById("x_E26").style.width="60px",document.getElementById("x_E27").style.width="60px",document.getElementById("x_E28").style.width="60px",document.getElementById("x_E29").style.width="60px",document.getElementById("x_E210").style.width="60px",document.getElementById("x_E211").style.width="60px",document.getElementById("x_E212").style.width="60px",document.getElementById("x_E213").style.width="60px",document.getElementById("x_E214").style.width="60px",document.getElementById("x_E215").style.width="60px",document.getElementById("x_E216").style.width="60px",document.getElementById("x_E217").style.width="60px",document.getElementById("x_E218").style.width="60px",document.getElementById("x_E219").style.width="60px",document.getElementById("x_E220").style.width="60px",document.getElementById("x_E221").style.width="60px",document.getElementById("x_E222").style.width="60px",document.getElementById("x_E223").style.width="60px",document.getElementById("x_E224").style.width="60px",document.getElementById("x_E225").style.width="60px",document.getElementById("x_P41").style.width="60px",document.getElementById("x_P42").style.width="60px",document.getElementById("x_P43").style.width="60px",document.getElementById("x_P44").style.width="60px",document.getElementById("x_P45").style.width="60px",document.getElementById("x_P46").style.width="60px",document.getElementById("x_P47").style.width="60px",document.getElementById("x_P48").style.width="60px",document.getElementById("x_P49").style.width="60px",document.getElementById("x_P410").style.width="60px",document.getElementById("x_P411").style.width="60px",document.getElementById("x_P412").style.width="60px",document.getElementById("x_P413").style.width="60px",document.getElementById("x_P414").style.width="60px",document.getElementById("x_P415").style.width="60px",document.getElementById("x_P416").style.width="60px",document.getElementById("x_P417").style.width="60px",document.getElementById("x_P418").style.width="60px",document.getElementById("x_P419").style.width="60px",document.getElementById("x_P420").style.width="60px",document.getElementById("x_P421").style.width="60px",document.getElementById("x_P422").style.width="60px",document.getElementById("x_P423").style.width="60px",document.getElementById("x_P424").style.width="60px",document.getElementById("x_P425").style.width="60px",document.getElementById("x_USGRt1").style.width="60px",document.getElementById("x_USGRt2").style.width="60px",document.getElementById("x_USGRt3").style.width="60px",document.getElementById("x_USGRt4").style.width="60px",document.getElementById("x_USGRt5").style.width="60px",document.getElementById("x_USGRt6").style.width="60px",document.getElementById("x_USGRt7").style.width="60px",document.getElementById("x_USGRt8").style.width="60px",document.getElementById("x_USGRt9").style.width="60px",document.getElementById("x_USGRt10").style.width="60px",document.getElementById("x_USGRt11").style.width="60px",document.getElementById("x_USGRt12").style.width="60px",document.getElementById("x_USGRt13").style.width="60px",document.getElementById("x_USGRt14").style.width="60px",document.getElementById("x_USGRt15").style.width="60px",document.getElementById("x_USGRt16").style.width="60px",document.getElementById("x_USGRt17").style.width="60px",document.getElementById("x_USGRt18").style.width="60px",document.getElementById("x_USGRt19").style.width="60px",document.getElementById("x_USGRt20").style.width="60px",document.getElementById("x_USGRt21").style.width="60px",document.getElementById("x_USGRt22").style.width="60px",document.getElementById("x_USGRt23").style.width="60px",document.getElementById("x_USGRt24").style.width="60px",document.getElementById("x_USGRt25").style.width="60px",document.getElementById("x_USGLt1").style.width="60px",document.getElementById("x_USGLt2").style.width="60px",document.getElementById("x_USGLt3").style.width="60px",document.getElementById("x_USGLt4").style.width="60px",document.getElementById("x_USGLt5").style.width="60px",document.getElementById("x_USGLt6").style.width="60px",document.getElementById("x_USGLt7").style.width="60px",document.getElementById("x_USGLt8").style.width="60px",document.getElementById("x_USGLt9").style.width="60px",document.getElementById("x_USGLt10").style.width="60px",document.getElementById("x_USGLt11").style.width="60px",document.getElementById("x_USGLt12").style.width="60px",document.getElementById("x_USGLt13").style.width="60px",document.getElementById("x_USGLt14").style.width="60px",document.getElementById("x_USGLt15").style.width="60px",document.getElementById("x_USGLt16").style.width="60px",document.getElementById("x_USGLt17").style.width="60px",document.getElementById("x_USGLt18").style.width="60px",document.getElementById("x_USGLt19").style.width="60px",document.getElementById("x_USGLt20").style.width="60px",document.getElementById("x_USGLt21").style.width="60px",document.getElementById("x_USGLt22").style.width="60px",document.getElementById("x_USGLt23").style.width="60px",document.getElementById("x_USGLt24").style.width="60px",document.getElementById("x_USGLt25").style.width="60px",document.getElementById("x_EM1").style.width="60px",document.getElementById("x_EM2").style.width="60px",document.getElementById("x_EM3").style.width="60px",document.getElementById("x_EM4").style.width="60px",document.getElementById("x_EM5").style.width="60px",document.getElementById("x_EM6").style.width="60px",document.getElementById("x_EM7").style.width="60px",document.getElementById("x_EM8").style.width="60px",document.getElementById("x_EM9").style.width="60px",document.getElementById("x_EM10").style.width="60px",document.getElementById("x_EM11").style.width="60px",document.getElementById("x_EM12").style.width="60px",document.getElementById("x_EM13").style.width="60px",document.getElementById("x_EM14").style.width="60px",document.getElementById("x_EM15").style.width="60px",document.getElementById("x_EM16").style.width="60px",document.getElementById("x_EM17").style.width="60px",document.getElementById("x_EM18").style.width="60px",document.getElementById("x_EM19").style.width="60px",document.getElementById("x_EM20").style.width="60px",document.getElementById("x_EM21").style.width="60px",document.getElementById("x_EM22").style.width="60px",document.getElementById("x_EM23").style.width="60px",document.getElementById("x_EM24").style.width="60px",document.getElementById("x_EM25").style.width="60px",document.getElementById("x_Others1").style.width="60px",document.getElementById("x_Others2").style.width="60px",document.getElementById("x_Others3").style.width="60px",document.getElementById("x_Others4").style.width="60px",document.getElementById("x_Others5").style.width="60px",document.getElementById("x_Others6").style.width="60px",document.getElementById("x_Others7").style.width="60px",document.getElementById("x_Others8").style.width="60px",document.getElementById("x_Others9").style.width="60px",document.getElementById("x_Others10").style.width="60px",document.getElementById("x_Others11").style.width="60px",document.getElementById("x_Others12").style.width="60px",document.getElementById("x_Others13").style.width="60px",document.getElementById("x_Others14").style.width="60px",document.getElementById("x_Others15").style.width="60px",document.getElementById("x_Others16").style.width="60px",document.getElementById("x_Others17").style.width="60px",document.getElementById("x_Others18").style.width="60px",document.getElementById("x_Others19").style.width="60px",document.getElementById("x_Others20").style.width="60px",document.getElementById("x_Others21").style.width="60px",document.getElementById("x_Others22").style.width="60px",document.getElementById("x_Others23").style.width="60px",document.getElementById("x_Others24").style.width="60px",document.getElementById("x_Others25").style.width="60px",document.getElementById("x_DR1").style.width="60px",document.getElementById("x_DR2").style.width="60px",document.getElementById("x_DR3").style.width="60px",document.getElementById("x_DR4").style.width="60px",document.getElementById("x_DR5").style.width="60px",document.getElementById("x_DR6").style.width="60px",document.getElementById("x_DR7").style.width="60px",document.getElementById("x_DR8").style.width="60px",document.getElementById("x_DR9").style.width="60px",document.getElementById("x_DR10").style.width="60px",document.getElementById("x_DR11").style.width="60px",document.getElementById("x_DR12").style.width="60px",document.getElementById("x_DR13").style.width="60px",document.getElementById("x_DR14").style.width="60px",document.getElementById("x_DR15").style.width="60px",document.getElementById("x_DR16").style.width="60px",document.getElementById("x_DR17").style.width="60px",document.getElementById("x_DR18").style.width="60px",document.getElementById("x_DR19").style.width="60px",document.getElementById("x_DR20").style.width="60px",document.getElementById("x_DR21").style.width="60px",document.getElementById("x_DR22").style.width="60px",document.getElementById("x_DR23").style.width="60px",document.getElementById("x_DR24").style.width="60px",document.getElementById("x_DR25").style.width="60px",document.getElementById("x_Tablet1").style.width="120px",document.getElementById("x_Tablet2").style.width="156px",document.getElementById("x_Tablet3").style.width="156px",document.getElementById("x_Tablet4").style.width="156px",document.getElementById("x_Tablet5").style.width="156px",document.getElementById("x_Tablet6").style.width="156px",document.getElementById("x_Tablet7").style.width="156px",document.getElementById("x_Tablet8").style.width="156px",document.getElementById("x_Tablet9").style.width="156px",document.getElementById("x_Tablet10").style.width="156px",document.getElementById("x_Tablet11").style.width="156px",document.getElementById("x_Tablet12").style.width="156px",document.getElementById("x_Tablet13").style.width="156px",document.getElementById("x_Tablet14").style.width="156px",document.getElementById("x_Tablet15").style.width="156px",document.getElementById("x_Tablet16").style.width="156px",document.getElementById("x_Tablet17").style.width="156px",document.getElementById("x_Tablet18").style.width="156px",document.getElementById("x_Tablet19").style.width="156px",document.getElementById("x_Tablet20").style.width="156px",document.getElementById("x_Tablet21").style.width="156px",document.getElementById("x_Tablet22").style.width="156px",document.getElementById("x_Tablet23").style.width="156px",document.getElementById("x_Tablet24").style.width="156px",document.getElementById("x_Tablet25").style.width="156px",document.getElementById("x_RFSH1").style.width="120px",document.getElementById("x_RFSH2").style.width="156px",document.getElementById("x_RFSH3").style.width="156px",document.getElementById("x_RFSH4").style.width="156px",document.getElementById("x_RFSH5").style.width="156px",document.getElementById("x_RFSH6").style.width="156px",document.getElementById("x_RFSH7").style.width="156px",document.getElementById("x_RFSH8").style.width="156px",document.getElementById("x_RFSH9").style.width="156px",document.getElementById("x_RFSH10").style.width="156px",document.getElementById("x_RFSH11").style.width="156px",document.getElementById("x_RFSH12").style.width="156px",document.getElementById("x_RFSH13").style.width="156px",document.getElementById("x_RFSH14").style.width="156px",document.getElementById("x_RFSH15").style.width="156px",document.getElementById("x_RFSH16").style.width="156px",document.getElementById("x_RFSH17").style.width="156px",document.getElementById("x_RFSH18").style.width="156px",document.getElementById("x_RFSH19").style.width="156px",document.getElementById("x_RFSH20").style.width="156px",document.getElementById("x_RFSH21").style.width="156px",document.getElementById("x_RFSH22").style.width="156px",document.getElementById("x_RFSH23").style.width="156px",document.getElementById("x_RFSH24").style.width="156px",document.getElementById("x_RFSH25").style.width="156px",document.getElementById("x_HMG1").style.width="120px",document.getElementById("x_HMG2").style.width="156px",document.getElementById("x_HMG3").style.width="156px",document.getElementById("x_HMG4").style.width="156px",document.getElementById("x_HMG5").style.width="156px",document.getElementById("x_HMG6").style.width="156px",document.getElementById("x_HMG7").style.width="156px",document.getElementById("x_HMG8").style.width="156px",document.getElementById("x_HMG9").style.width="156px",document.getElementById("x_HMG10").style.width="156px",document.getElementById("x_HMG11").style.width="156px",document.getElementById("x_HMG12").style.width="156px",document.getElementById("x_HMG13").style.width="156px",document.getElementById("x_HMG14").style.width="156px",document.getElementById("x_HMG15").style.width="156px",document.getElementById("x_HMG16").style.width="156px",document.getElementById("x_HMG17").style.width="156px",document.getElementById("x_HMG18").style.width="156px",document.getElementById("x_HMG19").style.width="156px",document.getElementById("x_HMG20").style.width="156px",document.getElementById("x_HMG21").style.width="156px",document.getElementById("x_HMG22").style.width="156px",document.getElementById("x_HMG23").style.width="156px",document.getElementById("x_HMG24").style.width="156px",document.getElementById("x_HMG25").style.width="156px",document.getElementById("x_GnRH1").style.width="110px",document.getElementById("x_GnRH2").style.width="146px",document.getElementById("x_GnRH3").style.width="146px",document.getElementById("x_GnRH4").style.width="146px",document.getElementById("x_GnRH5").style.width="146px",document.getElementById("x_GnRH6").style.width="146px",document.getElementById("x_GnRH7").style.width="146px",document.getElementById("x_GnRH8").style.width="146px",document.getElementById("x_GnRH9").style.width="146px",document.getElementById("x_GnRH10").style.width="146px",document.getElementById("x_GnRH11").style.width="146px",document.getElementById("x_GnRH12").style.width="146px",document.getElementById("x_GnRH13").style.width="146px",document.getElementById("x_GnRH14").style.width="146px",document.getElementById("x_GnRH15").style.width="146px",document.getElementById("x_GnRH16").style.width="146px",document.getElementById("x_GnRH17").style.width="146px",document.getElementById("x_GnRH18").style.width="146px",document.getElementById("x_GnRH19").style.width="146px",document.getElementById("x_GnRH20").style.width="146px",document.getElementById("x_GnRH21").style.width="146px",document.getElementById("x_GnRH22").style.width="146px",document.getElementById("x_GnRH23").style.width="146px",document.getElementById("x_GnRH24").style.width="146px",document.getElementById("x_GnRH25").style.width="146px";var tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="none",artcycle=(tableE2=document.getElementById("ETTableStIIUUII").style.display="none",tableE2=document.getElementById("IUIivfcONVERTTER").style.display="none",'<?php echo $resultsA[0]["ARTCYCLE"]; ?>'),Treatment='<?php echo $resultsA[0]["Treatment"]; ?>';if("Intrauterine insemination(IUI)"==artcycle){tableE2=document.getElementById("tableE2").style.display="none",tableE2=document.getElementById("tableE21").style.display="none",tableE2=document.getElementById("tableE22").style.display="none",tableE2=document.getElementById("tableE23").style.display="none",tableE2=document.getElementById("tableE24").style.display="none",tableE2=document.getElementById("tableE25").style.display="none",tableE2=document.getElementById("tableE26").style.display="none",tableE2=document.getElementById("tableE27").style.display="none",tableE2=document.getElementById("tableE28").style.display="none",tableE2=document.getElementById("tableE29").style.display="none",tableE2=document.getElementById("tableE210").style.display="none",tableE2=document.getElementById("tableE211").style.display="none",tableE2=document.getElementById("tableE212").style.display="none",tableE2=document.getElementById("tableE213").style.display="none",tableE2=document.getElementById("tableE214").style.display="none",tableE2=document.getElementById("tableE215").style.display="none",tableE2=document.getElementById("tableE216").style.display="none",tableE2=document.getElementById("tableE217").style.display="none",tableE2=document.getElementById("tableE218").style.display="none",tableE2=document.getElementById("tableE219").style.display="none",tableE2=document.getElementById("tableE220").style.display="none",tableE2=document.getElementById("tableE221").style.display="none",tableE2=document.getElementById("tableE222").style.display="none",tableE2=document.getElementById("tableE223").style.display="none",tableE2=document.getElementById("tableE224").style.display="none",tableE2=document.getElementById("tableE225").style.display="none";var RowPreProcedureOrder=document.getElementById("RowPreProcedureOrder").style.display="none",RowALLFREEZEINDICATION=document.getElementById("RowALLFREEZEINDICATION").style.display="none",RowDATEOFET=document.getElementById("RowDATEOFET").style.display="none",colPGTA=document.getElementById("colPGTA").style.display="none",colPGD=document.getElementById("colPGD").style.display="none",fieldOPUDATE=document.getElementById("fieldOPUDATE");fieldOPUDATE.firstElementChild.innerText="IUI Date";var x_OPUDATE=document.getElementById("x_OPUDATE");x_OPUDATE.placeholder="IUI Date";var ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ANTAGONISTDAYSstum=document.getElementById("ANTAGONISTDAYSstum").style.display="none";tableE2=document.getElementById("ETTableStIIUUII").style.display="block",tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block"}if("Frozen Embryo Transfer"===artcycle||"Evaluation cycle"===artcycle){var colE2=document.getElementById("colE2").innerHTML="VE",colP4=document.getElementById("colP4").innerHTML="Patches",colUSGRt=document.getElementById("colUSGRt").innerHTML="Progesterone",colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableTablet=(tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",document.getElementById("tableTablet").style.display="none"),tableRFSH=(tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",document.getElementById("tableRFSH").style.display="none"),tableHMG=(tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",document.getElementById("tableHMG").style.display="none"),rowTypeOfInfertility=(tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",document.getElementById("rowTypeOfInfertility").style.display="none"),rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProgesteroneAdminTable=(ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",document.getElementById("ProgesteroneAdminTable").style.display="none");ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",fieldSemenFrozen=document.getElementById("RowPreProcedureOrder").style.display="none",fieldSemenFrozen=document.getElementById("RowALLFREEZEINDICATION").style.display="none",fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block"}else{ETTableSt=document.getElementById("ETTableSt").style.display="none";if("Intrauterine insemination(IUI)"!=artcycle)AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="block";ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none"}if("Fresh ET"==Treatment||"Frozen ET"==Treatment||"OD Fresh ET"==Treatment||"OD Frozen ET"==Treatment||"OD ICSI"==Treatment)colE2=document.getElementById("colE2").innerHTML="VE",colP4=document.getElementById("colP4").innerHTML="Patches",colUSGRt=document.getElementById("colUSGRt").innerHTML="Progesterone",colUSGLt=document.getElementById("colUSGLt").innerHTML="Ult",colET=document.getElementById("colET").innerHTML="ET",colOthers=document.getElementById("colOthers").innerHTML="Pattern",colDr=document.getElementById("colDr").innerHTML="Observation",tableStimulationday=document.getElementById("tableStimulationday").style.display="none",tableStimulationday=document.getElementById("tableStimulationday1").style.display="none",tableStimulationday=document.getElementById("tableStimulationday2").style.display="none",tableStimulationday=document.getElementById("tableStimulationday3").style.display="none",tableStimulationday=document.getElementById("tableStimulationday4").style.display="none",tableStimulationday=document.getElementById("tableStimulationday5").style.display="none",tableStimulationday=document.getElementById("tableStimulationday6").style.display="none",tableStimulationday=document.getElementById("tableStimulationday7").style.display="none",tableStimulationday=document.getElementById("tableStimulationday8").style.display="none",tableStimulationday=document.getElementById("tableStimulationday9").style.display="none",tableStimulationday=document.getElementById("tableStimulationday10").style.display="none",tableStimulationday=document.getElementById("tableStimulationday11").style.display="none",tableStimulationday=document.getElementById("tableStimulationday12").style.display="none",tableStimulationday=document.getElementById("tableStimulationday13").style.display="none",tableStimulationday=document.getElementById("tableStimulationday14").style.display="none",tableStimulationday=document.getElementById("tableStimulationday15").style.display="none",tableStimulationday=document.getElementById("tableStimulationday16").style.display="none",tableStimulationday=document.getElementById("tableStimulationday17").style.display="none",tableStimulationday=document.getElementById("tableStimulationday18").style.display="none",tableStimulationday=document.getElementById("tableStimulationday19").style.display="none",tableStimulationday=document.getElementById("tableStimulationday20").style.display="none",tableStimulationday=document.getElementById("tableStimulationday21").style.display="none",tableStimulationday=document.getElementById("tableStimulationday22").style.display="none",tableStimulationday=document.getElementById("tableStimulationday23").style.display="none",tableStimulationday=document.getElementById("tableStimulationday24").style.display="none",tableStimulationday=document.getElementById("tableStimulationday25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableTablet=document.getElementById("tableTablet14").style.display="none",tableTablet=document.getElementById("tableTablet15").style.display="none",tableTablet=document.getElementById("tableTablet16").style.display="none",tableTablet=document.getElementById("tableTablet17").style.display="none",tableTablet=document.getElementById("tableTablet18").style.display="none",tableTablet=document.getElementById("tableTablet19").style.display="none",tableTablet=document.getElementById("tableTablet20").style.display="none",tableTablet=document.getElementById("tableTablet21").style.display="none",tableTablet=document.getElementById("tableTablet22").style.display="none",tableTablet=document.getElementById("tableTablet23").style.display="none",tableTablet=document.getElementById("tableTablet24").style.display="none",tableTablet=document.getElementById("tableTablet25").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableRFSH=document.getElementById("tableRFSH14").style.display="none",tableRFSH=document.getElementById("tableRFSH15").style.display="none",tableRFSH=document.getElementById("tableRFSH16").style.display="none",tableRFSH=document.getElementById("tableRFSH17").style.display="none",tableRFSH=document.getElementById("tableRFSH18").style.display="none",tableRFSH=document.getElementById("tableRFSH19").style.display="none",tableRFSH=document.getElementById("tableRFSH20").style.display="none",tableRFSH=document.getElementById("tableRFSH21").style.display="none",tableRFSH=document.getElementById("tableRFSH22").style.display="none",tableRFSH=document.getElementById("tableRFSH23").style.display="none",tableRFSH=document.getElementById("tableRFSH24").style.display="none",tableRFSH=document.getElementById("tableRFSH25").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",tableHMG=document.getElementById("tableHMG14").style.display="none",tableHMG=document.getElementById("tableHMG15").style.display="none",tableHMG=document.getElementById("tableHMG16").style.display="none",tableHMG=document.getElementById("tableHMG17").style.display="none",tableHMG=document.getElementById("tableHMG18").style.display="none",tableHMG=document.getElementById("tableHMG19").style.display="none",tableHMG=document.getElementById("tableHMG20").style.display="none",tableHMG=document.getElementById("tableHMG21").style.display="none",tableHMG=document.getElementById("tableHMG22").style.display="none",tableHMG=document.getElementById("tableHMG23").style.display="none",tableHMG=document.getElementById("tableHMG24").style.display="none",tableHMG=document.getElementById("tableHMG25").style.display="none",tableTablet=document.getElementById("tableTablet").style.display="none",tableTablet=document.getElementById("tableTablet1").style.display="none",tableTablet=document.getElementById("tableTablet2").style.display="none",tableTablet=document.getElementById("tableTablet3").style.display="none",tableTablet=document.getElementById("tableTablet4").style.display="none",tableTablet=document.getElementById("tableTablet5").style.display="none",tableTablet=document.getElementById("tableTablet6").style.display="none",tableTablet=document.getElementById("tableTablet7").style.display="none",tableTablet=document.getElementById("tableTablet8").style.display="none",tableTablet=document.getElementById("tableTablet9").style.display="none",tableTablet=document.getElementById("tableTablet10").style.display="none",tableTablet=document.getElementById("tableTablet11").style.display="none",tableTablet=document.getElementById("tableTablet12").style.display="none",tableTablet=document.getElementById("tableTablet13").style.display="none",tableRFSH=document.getElementById("tableRFSH").style.display="none",tableRFSH=document.getElementById("tableRFSH1").style.display="none",tableRFSH=document.getElementById("tableRFSH2").style.display="none",tableRFSH=document.getElementById("tableRFSH3").style.display="none",tableRFSH=document.getElementById("tableRFSH4").style.display="none",tableRFSH=document.getElementById("tableRFSH5").style.display="none",tableRFSH=document.getElementById("tableRFSH6").style.display="none",tableRFSH=document.getElementById("tableRFSH7").style.display="none",tableRFSH=document.getElementById("tableRFSH8").style.display="none",tableRFSH=document.getElementById("tableRFSH9").style.display="none",tableRFSH=document.getElementById("tableRFSH10").style.display="none",tableRFSH=document.getElementById("tableRFSH11").style.display="none",tableRFSH=document.getElementById("tableRFSH12").style.display="none",tableRFSH=document.getElementById("tableRFSH13").style.display="none",tableHMG=document.getElementById("tableHMG").style.display="none",tableHMG=document.getElementById("tableHMG1").style.display="none",tableHMG=document.getElementById("tableHMG2").style.display="none",tableHMG=document.getElementById("tableHMG3").style.display="none",tableHMG=document.getElementById("tableHMG4").style.display="none",tableHMG=document.getElementById("tableHMG5").style.display="none",tableHMG=document.getElementById("tableHMG6").style.display="none",tableHMG=document.getElementById("tableHMG7").style.display="none",tableHMG=document.getElementById("tableHMG8").style.display="none",tableHMG=document.getElementById("tableHMG9").style.display="none",tableHMG=document.getElementById("tableHMG10").style.display="none",tableHMG=document.getElementById("tableHMG11").style.display="none",tableHMG=document.getElementById("tableHMG12").style.display="none",tableHMG=document.getElementById("tableHMG13").style.display="none",rowTypeOfInfertility=document.getElementById("rowTypeOfInfertility").style.display="none",rowIUICycles=document.getElementById("rowIUICycles").style.display="none",rowMedicalFactors=document.getElementById("rowMedicalFactors").style.display="none",fieldINJTYPE=document.getElementById("fieldINJTYPE").style.display="none",fieldLMP=document.getElementById("fieldLMP").style.display="none",fieldANTAGONISTSTARTDAY=document.getElementById("fieldANTAGONISTSTARTDAY").style.display="none",fieldProtocol=document.getElementById("fieldProtocol").style.display="none",fieldGROWTHHORMONE=document.getElementById("fieldGROWTHHORMONE").style.display="none",fieldSemenFrozen=document.getElementById("fieldSemenFrozen").style.display="none",ETTableSt=document.getElementById("ETTableSt").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="block",AllFreezeVisible=document.getElementById("AllFreezeVisible").style.display="none",ProgesteroneAdminTable=document.getElementById("ProgesteroneAdminTable").style.display="none";if("ICSI H"==Treatment)tableE2=document.getElementById("IUIivfcONVERTTER").style.display="block",ProjectronVisible=document.getElementById("ProjectronVisible").style.display="none";if("OD ICSI"==Treatment)fieldSemenFrozen=document.getElementById("PreProcedureOrderPPOOUU").style.display="none",tableE2=document.getElementById("PreProcedureEEETTTDTE").style.display="block";function ProgesteroneAccept(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function ProgesteroneCancel(){document.getElementById("ProgesteroneAdminTable").style.display="none"}function addDays(e,t){const o=new Date(Number(e));return o.setDate(e.getDate()+t),o}function calculateDoseofGonadotropins(){}function calculateDoseofRFSHHMG(){for(var e=0,t=0,o=1;o<24;o++){var n="x_RFSH"+o;(u=document.getElementById(n).value.split(" ")).length>1&&(e=parseInt(e)+1,t="Follisurge"==u[0]?parseInt(t)+parseInt(u[1]):parseInt(t)+parseInt(u[2]));var u;n="x_HMG"+o;(u=document.getElementById(n).value.split(" ")).length>1&&(t="HUMOG"==u[0]?parseInt(t)+parseInt(u[1]):parseInt(t)+parseInt(u[2]))}document.getElementById("x_DAYSOFSTIMULATION").value=e,document.getElementById("x_DOSEOFGONADOTROPINS").value=t}function calculateDaysofGnRH(){for(var e=0,t=1;t<24;t++){var o="x_GnRH"+t;document.getElementById(o).value.split(" ").length>1&&(e=parseInt(e)+1)}document.getElementById("x_ANTAGONISTDAYS").value=e}function addrowsintable(){$("#tablechartadd tbody").find("tr:hidden:first").show()}
});
</script>
<?php } ?>
