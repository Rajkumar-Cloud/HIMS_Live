<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOvumPickUpChartView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_ovum_pick_up_chartview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_ovum_pick_up_chartview = currentForm = new ew.Form("fivf_ovum_pick_up_chartview", "view");
    loadjs.done("fivf_ovum_pick_up_chartview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_ovum_pick_up_chart) ew.vars.tables.ivf_ovum_pick_up_chart = <?= JsonEncode(GetClientVar("tables", "ivf_ovum_pick_up_chart")) ?>;
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
<form name="fivf_ovum_pick_up_chartview" id="fivf_ovum_pick_up_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_id"><template id="tpc_ivf_ovum_pick_up_chart_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_id"><span id="el_ivf_ovum_pick_up_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_RIDNo"><template id="tpc_ivf_ovum_pick_up_chart_RIDNo"><?= $Page->RIDNo->caption() ?></template></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_RIDNo"><span id="el_ivf_ovum_pick_up_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Name"><template id="tpc_ivf_ovum_pick_up_chart_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Name"><span id="el_ivf_ovum_pick_up_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ARTCycle"><template id="tpc_ivf_ovum_pick_up_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></template></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ARTCycle"><span id="el_ivf_ovum_pick_up_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Consultant"><template id="tpc_ivf_ovum_pick_up_chart_Consultant"><?= $Page->Consultant->caption() ?></template></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Consultant"><span id="el_ivf_ovum_pick_up_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
    <tr id="r_TotalDoseOfStimulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><template id="tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><?= $Page->TotalDoseOfStimulation->caption() ?></template></span></td>
        <td data-name="TotalDoseOfStimulation" <?= $Page->TotalDoseOfStimulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><span id="el_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?= $Page->TotalDoseOfStimulation->viewAttributes() ?>>
<?= $Page->TotalDoseOfStimulation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <tr id="r_Protocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Protocol"><template id="tpc_ivf_ovum_pick_up_chart_Protocol"><?= $Page->Protocol->caption() ?></template></span></td>
        <td data-name="Protocol" <?= $Page->Protocol->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Protocol"><span id="el_ivf_ovum_pick_up_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
    <tr id="r_NumberOfDaysOfStimulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><template id="tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><?= $Page->NumberOfDaysOfStimulation->caption() ?></template></span></td>
        <td data-name="NumberOfDaysOfStimulation" <?= $Page->NumberOfDaysOfStimulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><span id="el_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?= $Page->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?= $Page->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
    <tr id="r_TriggerDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TriggerDateTime"><template id="tpc_ivf_ovum_pick_up_chart_TriggerDateTime"><?= $Page->TriggerDateTime->caption() ?></template></span></td>
        <td data-name="TriggerDateTime" <?= $Page->TriggerDateTime->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TriggerDateTime"><span id="el_ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?= $Page->TriggerDateTime->viewAttributes() ?>>
<?= $Page->TriggerDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
    <tr id="r_OPUDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_OPUDateTime"><template id="tpc_ivf_ovum_pick_up_chart_OPUDateTime"><?= $Page->OPUDateTime->caption() ?></template></span></td>
        <td data-name="OPUDateTime" <?= $Page->OPUDateTime->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_OPUDateTime"><span id="el_ivf_ovum_pick_up_chart_OPUDateTime">
<span<?= $Page->OPUDateTime->viewAttributes() ?>>
<?= $Page->OPUDateTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
    <tr id="r_HoursAfterTrigger">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger"><template id="tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger"><?= $Page->HoursAfterTrigger->caption() ?></template></span></td>
        <td data-name="HoursAfterTrigger" <?= $Page->HoursAfterTrigger->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger"><span id="el_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?= $Page->HoursAfterTrigger->viewAttributes() ?>>
<?= $Page->HoursAfterTrigger->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
    <tr id="r_SerumE2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumE2"><template id="tpc_ivf_ovum_pick_up_chart_SerumE2"><?= $Page->SerumE2->caption() ?></template></span></td>
        <td data-name="SerumE2" <?= $Page->SerumE2->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_SerumE2"><span id="el_ivf_ovum_pick_up_chart_SerumE2">
<span<?= $Page->SerumE2->viewAttributes() ?>>
<?= $Page->SerumE2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <tr id="r_SerumP4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumP4"><template id="tpc_ivf_ovum_pick_up_chart_SerumP4"><?= $Page->SerumP4->caption() ?></template></span></td>
        <td data-name="SerumP4" <?= $Page->SerumP4->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_SerumP4"><span id="el_ivf_ovum_pick_up_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <tr id="r_FORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_FORT"><template id="tpc_ivf_ovum_pick_up_chart_FORT"><?= $Page->FORT->caption() ?></template></span></td>
        <td data-name="FORT" <?= $Page->FORT->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_FORT"><span id="el_ivf_ovum_pick_up_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
    <tr id="r_ExperctedOocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes"><template id="tpc_ivf_ovum_pick_up_chart_ExperctedOocytes"><?= $Page->ExperctedOocytes->caption() ?></template></span></td>
        <td data-name="ExperctedOocytes" <?= $Page->ExperctedOocytes->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ExperctedOocytes"><span id="el_ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?= $Page->ExperctedOocytes->viewAttributes() ?>>
<?= $Page->ExperctedOocytes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
    <tr id="r_NoOfOocytesRetrieved">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><template id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><?= $Page->NoOfOocytesRetrieved->caption() ?></template></span></td>
        <td data-name="NoOfOocytesRetrieved" <?= $Page->NoOfOocytesRetrieved->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?= $Page->NoOfOocytesRetrieved->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrieved->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
    <tr id="r_OocytesRetreivalRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate"><template id="tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate"><?= $Page->OocytesRetreivalRate->caption() ?></template></span></td>
        <td data-name="OocytesRetreivalRate" <?= $Page->OocytesRetreivalRate->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate"><span id="el_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?= $Page->OocytesRetreivalRate->viewAttributes() ?>>
<?= $Page->OocytesRetreivalRate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
    <tr id="r_Anesthesia">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Anesthesia"><template id="tpc_ivf_ovum_pick_up_chart_Anesthesia"><?= $Page->Anesthesia->caption() ?></template></span></td>
        <td data-name="Anesthesia" <?= $Page->Anesthesia->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Anesthesia"><span id="el_ivf_ovum_pick_up_chart_Anesthesia">
<span<?= $Page->Anesthesia->viewAttributes() ?>>
<?= $Page->Anesthesia->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <tr id="r_TrialCannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TrialCannulation"><template id="tpc_ivf_ovum_pick_up_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></template></span></td>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TrialCannulation"><span id="el_ivf_ovum_pick_up_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UCL->Visible) { // UCL ?>
    <tr id="r_UCL">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_UCL"><template id="tpc_ivf_ovum_pick_up_chart_UCL"><?= $Page->UCL->caption() ?></template></span></td>
        <td data-name="UCL" <?= $Page->UCL->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_UCL"><span id="el_ivf_ovum_pick_up_chart_UCL">
<span<?= $Page->UCL->viewAttributes() ?>>
<?= $Page->UCL->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Angle->Visible) { // Angle ?>
    <tr id="r_Angle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Angle"><template id="tpc_ivf_ovum_pick_up_chart_Angle"><?= $Page->Angle->caption() ?></template></span></td>
        <td data-name="Angle" <?= $Page->Angle->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Angle"><span id="el_ivf_ovum_pick_up_chart_Angle">
<span<?= $Page->Angle->viewAttributes() ?>>
<?= $Page->Angle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EMS->Visible) { // EMS ?>
    <tr id="r_EMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_EMS"><template id="tpc_ivf_ovum_pick_up_chart_EMS"><?= $Page->EMS->caption() ?></template></span></td>
        <td data-name="EMS" <?= $Page->EMS->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_EMS"><span id="el_ivf_ovum_pick_up_chart_EMS">
<span<?= $Page->EMS->viewAttributes() ?>>
<?= $Page->EMS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cannulation->Visible) { // Cannulation ?>
    <tr id="r_Cannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Cannulation"><template id="tpc_ivf_ovum_pick_up_chart_Cannulation"><?= $Page->Cannulation->caption() ?></template></span></td>
        <td data-name="Cannulation" <?= $Page->Cannulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Cannulation"><span id="el_ivf_ovum_pick_up_chart_Cannulation">
<span<?= $Page->Cannulation->viewAttributes() ?>>
<?= $Page->Cannulation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureT->Visible) { // ProcedureT ?>
    <tr id="r_ProcedureT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ProcedureT"><template id="tpc_ivf_ovum_pick_up_chart_ProcedureT"><?= $Page->ProcedureT->caption() ?></template></span></td>
        <td data-name="ProcedureT" <?= $Page->ProcedureT->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ProcedureT"><span id="el_ivf_ovum_pick_up_chart_ProcedureT">
<span<?= $Page->ProcedureT->viewAttributes() ?>>
<?= $Page->ProcedureT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
    <tr id="r_NoOfOocytesRetrievedd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><template id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><?= $Page->NoOfOocytesRetrievedd->caption() ?></template></span></td>
        <td data-name="NoOfOocytesRetrievedd" <?= $Page->NoOfOocytesRetrievedd->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?= $Page->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CourseInHospital->Visible) { // CourseInHospital ?>
    <tr id="r_CourseInHospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_CourseInHospital"><template id="tpc_ivf_ovum_pick_up_chart_CourseInHospital"><?= $Page->CourseInHospital->caption() ?></template></span></td>
        <td data-name="CourseInHospital" <?= $Page->CourseInHospital->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_CourseInHospital"><span id="el_ivf_ovum_pick_up_chart_CourseInHospital">
<span<?= $Page->CourseInHospital->viewAttributes() ?>>
<?= $Page->CourseInHospital->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DischargeAdvise->Visible) { // DischargeAdvise ?>
    <tr id="r_DischargeAdvise">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_DischargeAdvise"><template id="tpc_ivf_ovum_pick_up_chart_DischargeAdvise"><?= $Page->DischargeAdvise->caption() ?></template></span></td>
        <td data-name="DischargeAdvise" <?= $Page->DischargeAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_DischargeAdvise"><span id="el_ivf_ovum_pick_up_chart_DischargeAdvise">
<span<?= $Page->DischargeAdvise->viewAttributes() ?>>
<?= $Page->DischargeAdvise->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowUpAdvise->Visible) { // FollowUpAdvise ?>
    <tr id="r_FollowUpAdvise">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_FollowUpAdvise"><template id="tpc_ivf_ovum_pick_up_chart_FollowUpAdvise"><?= $Page->FollowUpAdvise->caption() ?></template></span></td>
        <td data-name="FollowUpAdvise" <?= $Page->FollowUpAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_FollowUpAdvise"><span id="el_ivf_ovum_pick_up_chart_FollowUpAdvise">
<span<?= $Page->FollowUpAdvise->viewAttributes() ?>>
<?= $Page->FollowUpAdvise->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PlanT->Visible) { // PlanT ?>
    <tr id="r_PlanT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_PlanT"><template id="tpc_ivf_ovum_pick_up_chart_PlanT"><?= $Page->PlanT->caption() ?></template></span></td>
        <td data-name="PlanT" <?= $Page->PlanT->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_PlanT"><span id="el_ivf_ovum_pick_up_chart_PlanT">
<span<?= $Page->PlanT->viewAttributes() ?>>
<?= $Page->PlanT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <tr id="r_ReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDate"><template id="tpc_ivf_ovum_pick_up_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?></template></span></td>
        <td data-name="ReviewDate" <?= $Page->ReviewDate->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ReviewDate"><span id="el_ivf_ovum_pick_up_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <tr id="r_ReviewDoctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDoctor"><template id="tpc_ivf_ovum_pick_up_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?></template></span></td>
        <td data-name="ReviewDoctor" <?= $Page->ReviewDoctor->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ReviewDoctor"><span id="el_ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateProcedure->Visible) { // TemplateProcedure ?>
    <tr id="r_TemplateProcedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateProcedure"><template id="tpc_ivf_ovum_pick_up_chart_TemplateProcedure"><?= $Page->TemplateProcedure->caption() ?></template></span></td>
        <td data-name="TemplateProcedure" <?= $Page->TemplateProcedure->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateProcedure"><span id="el_ivf_ovum_pick_up_chart_TemplateProcedure">
<span<?= $Page->TemplateProcedure->viewAttributes() ?>>
<?= $Page->TemplateProcedure->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateCourseInHospital->Visible) { // TemplateCourseInHospital ?>
    <tr id="r_TemplateCourseInHospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateCourseInHospital"><template id="tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital"><?= $Page->TemplateCourseInHospital->caption() ?></template></span></td>
        <td data-name="TemplateCourseInHospital" <?= $Page->TemplateCourseInHospital->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital"><span id="el_ivf_ovum_pick_up_chart_TemplateCourseInHospital">
<span<?= $Page->TemplateCourseInHospital->viewAttributes() ?>>
<?= $Page->TemplateCourseInHospital->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateDischargeAdvise->Visible) { // TemplateDischargeAdvise ?>
    <tr id="r_TemplateDischargeAdvise">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"><template id="tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"><?= $Page->TemplateDischargeAdvise->caption() ?></template></span></td>
        <td data-name="TemplateDischargeAdvise" <?= $Page->TemplateDischargeAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"><span id="el_ivf_ovum_pick_up_chart_TemplateDischargeAdvise">
<span<?= $Page->TemplateDischargeAdvise->viewAttributes() ?>>
<?= $Page->TemplateDischargeAdvise->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateFollowUpAdvise->Visible) { // TemplateFollowUpAdvise ?>
    <tr id="r_TemplateFollowUpAdvise">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"><template id="tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"><?= $Page->TemplateFollowUpAdvise->caption() ?></template></span></td>
        <td data-name="TemplateFollowUpAdvise" <?= $Page->TemplateFollowUpAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"><span id="el_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise">
<span<?= $Page->TemplateFollowUpAdvise->viewAttributes() ?>>
<?= $Page->TemplateFollowUpAdvise->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TidNo"><template id="tpc_ivf_ovum_pick_up_chart_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TidNo"><span id="el_ivf_ovum_pick_up_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_ovum_pick_up_chartview" class="ew-custom-template"></div>
<template id="tpm_ivf_ovum_pick_up_chartview">
<div id="ct_IvfOvumPickUpChartView"><style>
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
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
?>	
<slot class="ew-slot" name="tpx_RIDNO"></slot>
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
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
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up Chart</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ARTCycle"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Consultant"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Protocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Protocol"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"></slot></span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TriggerDateTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TriggerDateTime"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_OPUDateTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_OPUDateTime"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_SerumE2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_SerumE2"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_FORT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_FORT"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_SerumP4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_SerumP4"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ExperctedOocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ExperctedOocytes"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Anesthesia"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Anesthesia"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TrialCannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TrialCannulation"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_UCL"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_UCL"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Angle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Angle"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_EMS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_EMS"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Cannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Cannulation"></slot></span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Procedure</h3>
			</div>
			<div class="card-body">			
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateProcedure"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ProcedureT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ProcedureT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_CourseInHospital"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_CourseInHospital"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_DischargeAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_DischargeAdvise"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_FollowUpAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_FollowUpAdvise"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_PlanT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_PlanT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ReviewDate"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ReviewDoctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ReviewDoctor"></slot></span>
				  </div>
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
    ew.applyTemplate("tpd_ivf_ovum_pick_up_chartview", "tpm_ivf_ovum_pick_up_chartview", "ivf_ovum_pick_up_chartview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
