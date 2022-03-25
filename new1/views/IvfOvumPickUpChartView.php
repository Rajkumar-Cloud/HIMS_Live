<?php

namespace PHPMaker2021\project3;

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
<form name="fivf_ovum_pick_up_chartview" id="fivf_ovum_pick_up_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Consultant"><?= $Page->Consultant->caption() ?></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
    <tr id="r_TotalDoseOfStimulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><?= $Page->TotalDoseOfStimulation->caption() ?></span></td>
        <td data-name="TotalDoseOfStimulation" <?= $Page->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?= $Page->TotalDoseOfStimulation->viewAttributes() ?>>
<?= $Page->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <tr id="r_Protocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Protocol"><?= $Page->Protocol->caption() ?></span></td>
        <td data-name="Protocol" <?= $Page->Protocol->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
    <tr id="r_NumberOfDaysOfStimulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><?= $Page->NumberOfDaysOfStimulation->caption() ?></span></td>
        <td data-name="NumberOfDaysOfStimulation" <?= $Page->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?= $Page->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?= $Page->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
    <tr id="r_TriggerDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TriggerDateTime"><?= $Page->TriggerDateTime->caption() ?></span></td>
        <td data-name="TriggerDateTime" <?= $Page->TriggerDateTime->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?= $Page->TriggerDateTime->viewAttributes() ?>>
<?= $Page->TriggerDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
    <tr id="r_OPUDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_OPUDateTime"><?= $Page->OPUDateTime->caption() ?></span></td>
        <td data-name="OPUDateTime" <?= $Page->OPUDateTime->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_OPUDateTime">
<span<?= $Page->OPUDateTime->viewAttributes() ?>>
<?= $Page->OPUDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
    <tr id="r_HoursAfterTrigger">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger"><?= $Page->HoursAfterTrigger->caption() ?></span></td>
        <td data-name="HoursAfterTrigger" <?= $Page->HoursAfterTrigger->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?= $Page->HoursAfterTrigger->viewAttributes() ?>>
<?= $Page->HoursAfterTrigger->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
    <tr id="r_SerumE2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumE2"><?= $Page->SerumE2->caption() ?></span></td>
        <td data-name="SerumE2" <?= $Page->SerumE2->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_SerumE2">
<span<?= $Page->SerumE2->viewAttributes() ?>>
<?= $Page->SerumE2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <tr id="r_SerumP4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumP4"><?= $Page->SerumP4->caption() ?></span></td>
        <td data-name="SerumP4" <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <tr id="r_FORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_FORT"><?= $Page->FORT->caption() ?></span></td>
        <td data-name="FORT" <?= $Page->FORT->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
    <tr id="r_ExperctedOocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes"><?= $Page->ExperctedOocytes->caption() ?></span></td>
        <td data-name="ExperctedOocytes" <?= $Page->ExperctedOocytes->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?= $Page->ExperctedOocytes->viewAttributes() ?>>
<?= $Page->ExperctedOocytes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
    <tr id="r_NoOfOocytesRetrieved">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><?= $Page->NoOfOocytesRetrieved->caption() ?></span></td>
        <td data-name="NoOfOocytesRetrieved" <?= $Page->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?= $Page->NoOfOocytesRetrieved->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
    <tr id="r_OocytesRetreivalRate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate"><?= $Page->OocytesRetreivalRate->caption() ?></span></td>
        <td data-name="OocytesRetreivalRate" <?= $Page->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?= $Page->OocytesRetreivalRate->viewAttributes() ?>>
<?= $Page->OocytesRetreivalRate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
    <tr id="r_Anesthesia">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Anesthesia"><?= $Page->Anesthesia->caption() ?></span></td>
        <td data-name="Anesthesia" <?= $Page->Anesthesia->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Anesthesia">
<span<?= $Page->Anesthesia->viewAttributes() ?>>
<?= $Page->Anesthesia->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <tr id="r_TrialCannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></span></td>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UCL->Visible) { // UCL ?>
    <tr id="r_UCL">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_UCL"><?= $Page->UCL->caption() ?></span></td>
        <td data-name="UCL" <?= $Page->UCL->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_UCL">
<span<?= $Page->UCL->viewAttributes() ?>>
<?= $Page->UCL->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Angle->Visible) { // Angle ?>
    <tr id="r_Angle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Angle"><?= $Page->Angle->caption() ?></span></td>
        <td data-name="Angle" <?= $Page->Angle->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Angle">
<span<?= $Page->Angle->viewAttributes() ?>>
<?= $Page->Angle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EMS->Visible) { // EMS ?>
    <tr id="r_EMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_EMS"><?= $Page->EMS->caption() ?></span></td>
        <td data-name="EMS" <?= $Page->EMS->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_EMS">
<span<?= $Page->EMS->viewAttributes() ?>>
<?= $Page->EMS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cannulation->Visible) { // Cannulation ?>
    <tr id="r_Cannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_Cannulation"><?= $Page->Cannulation->caption() ?></span></td>
        <td data-name="Cannulation" <?= $Page->Cannulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Cannulation">
<span<?= $Page->Cannulation->viewAttributes() ?>>
<?= $Page->Cannulation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureT->Visible) { // ProcedureT ?>
    <tr id="r_ProcedureT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ProcedureT"><?= $Page->ProcedureT->caption() ?></span></td>
        <td data-name="ProcedureT" <?= $Page->ProcedureT->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ProcedureT">
<span<?= $Page->ProcedureT->viewAttributes() ?>>
<?= $Page->ProcedureT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
    <tr id="r_NoOfOocytesRetrievedd">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><?= $Page->NoOfOocytesRetrievedd->caption() ?></span></td>
        <td data-name="NoOfOocytesRetrievedd" <?= $Page->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?= $Page->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CourseInHospital->Visible) { // CourseInHospital ?>
    <tr id="r_CourseInHospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_CourseInHospital"><?= $Page->CourseInHospital->caption() ?></span></td>
        <td data-name="CourseInHospital" <?= $Page->CourseInHospital->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_CourseInHospital">
<span<?= $Page->CourseInHospital->viewAttributes() ?>>
<?= $Page->CourseInHospital->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DischargeAdvise->Visible) { // DischargeAdvise ?>
    <tr id="r_DischargeAdvise">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_DischargeAdvise"><?= $Page->DischargeAdvise->caption() ?></span></td>
        <td data-name="DischargeAdvise" <?= $Page->DischargeAdvise->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_DischargeAdvise">
<span<?= $Page->DischargeAdvise->viewAttributes() ?>>
<?= $Page->DischargeAdvise->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowUpAdvise->Visible) { // FollowUpAdvise ?>
    <tr id="r_FollowUpAdvise">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_FollowUpAdvise"><?= $Page->FollowUpAdvise->caption() ?></span></td>
        <td data-name="FollowUpAdvise" <?= $Page->FollowUpAdvise->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_FollowUpAdvise">
<span<?= $Page->FollowUpAdvise->viewAttributes() ?>>
<?= $Page->FollowUpAdvise->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PlanT->Visible) { // PlanT ?>
    <tr id="r_PlanT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_PlanT"><?= $Page->PlanT->caption() ?></span></td>
        <td data-name="PlanT" <?= $Page->PlanT->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_PlanT">
<span<?= $Page->PlanT->viewAttributes() ?>>
<?= $Page->PlanT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <tr id="r_ReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?></span></td>
        <td data-name="ReviewDate" <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <tr id="r_ReviewDoctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?></span></td>
        <td data-name="ReviewDoctor" <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ovum_pick_up_chart_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
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
