<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOvumPickUpChartDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_ovum_pick_up_chartdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_ovum_pick_up_chartdelete = currentForm = new ew.Form("fivf_ovum_pick_up_chartdelete", "delete");
    loadjs.done("fivf_ovum_pick_up_chartdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_ovum_pick_up_chartdelete" id="fivf_ovum_pick_up_chartdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th class="<?= $Page->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant"><?= $Page->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
        <th class="<?= $Page->TotalDoseOfStimulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><?= $Page->TotalDoseOfStimulation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
        <th class="<?= $Page->Protocol->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol"><?= $Page->Protocol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
        <th class="<?= $Page->NumberOfDaysOfStimulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><?= $Page->NumberOfDaysOfStimulation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
        <th class="<?= $Page->TriggerDateTime->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime"><?= $Page->TriggerDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
        <th class="<?= $Page->OPUDateTime->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime"><?= $Page->OPUDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
        <th class="<?= $Page->HoursAfterTrigger->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger"><?= $Page->HoursAfterTrigger->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
        <th class="<?= $Page->SerumE2->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2"><?= $Page->SerumE2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <th class="<?= $Page->SerumP4->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4"><?= $Page->SerumP4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
        <th class="<?= $Page->FORT->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT"><?= $Page->FORT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
        <th class="<?= $Page->ExperctedOocytes->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes"><?= $Page->ExperctedOocytes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
        <th class="<?= $Page->NoOfOocytesRetrieved->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><?= $Page->NoOfOocytesRetrieved->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
        <th class="<?= $Page->OocytesRetreivalRate->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate"><?= $Page->OocytesRetreivalRate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
        <th class="<?= $Page->Anesthesia->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia"><?= $Page->Anesthesia->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <th class="<?= $Page->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UCL->Visible) { // UCL ?>
        <th class="<?= $Page->UCL->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL"><?= $Page->UCL->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Angle->Visible) { // Angle ?>
        <th class="<?= $Page->Angle->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle"><?= $Page->Angle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EMS->Visible) { // EMS ?>
        <th class="<?= $Page->EMS->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS"><?= $Page->EMS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cannulation->Visible) { // Cannulation ?>
        <th class="<?= $Page->Cannulation->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation"><?= $Page->Cannulation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
        <th class="<?= $Page->NoOfOocytesRetrievedd->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><?= $Page->NoOfOocytesRetrievedd->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PlanT->Visible) { // PlanT ?>
        <th class="<?= $Page->PlanT->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT"><?= $Page->PlanT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <th class="<?= $Page->ReviewDate->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <th class="<?= $Page->ReviewDoctor->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
        <td <?= $Page->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?= $Page->TotalDoseOfStimulation->viewAttributes() ?>>
<?= $Page->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
        <td <?= $Page->Protocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
        <td <?= $Page->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?= $Page->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?= $Page->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
        <td <?= $Page->TriggerDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?= $Page->TriggerDateTime->viewAttributes() ?>>
<?= $Page->TriggerDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
        <td <?= $Page->OPUDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
<span<?= $Page->OPUDateTime->viewAttributes() ?>>
<?= $Page->OPUDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
        <td <?= $Page->HoursAfterTrigger->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?= $Page->HoursAfterTrigger->viewAttributes() ?>>
<?= $Page->HoursAfterTrigger->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
        <td <?= $Page->SerumE2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
<span<?= $Page->SerumE2->viewAttributes() ?>>
<?= $Page->SerumE2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <td <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
        <td <?= $Page->FORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
        <td <?= $Page->ExperctedOocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?= $Page->ExperctedOocytes->viewAttributes() ?>>
<?= $Page->ExperctedOocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
        <td <?= $Page->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?= $Page->NoOfOocytesRetrieved->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
        <td <?= $Page->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?= $Page->OocytesRetreivalRate->viewAttributes() ?>>
<?= $Page->OocytesRetreivalRate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
        <td <?= $Page->Anesthesia->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
<span<?= $Page->Anesthesia->viewAttributes() ?>>
<?= $Page->Anesthesia->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <td <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UCL->Visible) { // UCL ?>
        <td <?= $Page->UCL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
<span<?= $Page->UCL->viewAttributes() ?>>
<?= $Page->UCL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Angle->Visible) { // Angle ?>
        <td <?= $Page->Angle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
<span<?= $Page->Angle->viewAttributes() ?>>
<?= $Page->Angle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EMS->Visible) { // EMS ?>
        <td <?= $Page->EMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
<span<?= $Page->EMS->viewAttributes() ?>>
<?= $Page->EMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cannulation->Visible) { // Cannulation ?>
        <td <?= $Page->Cannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
<span<?= $Page->Cannulation->viewAttributes() ?>>
<?= $Page->Cannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
        <td <?= $Page->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?= $Page->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?= $Page->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PlanT->Visible) { // PlanT ?>
        <td <?= $Page->PlanT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
<span<?= $Page->PlanT->viewAttributes() ?>>
<?= $Page->PlanT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <td <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <td <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
