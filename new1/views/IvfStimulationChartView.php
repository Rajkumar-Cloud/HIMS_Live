<?php

namespace PHPMaker2021\project3;

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
<form name="fivf_stimulation_chartview" id="fivf_stimulation_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
    <tr id="r_FemaleFactor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FemaleFactor"><?= $Page->FemaleFactor->caption() ?></span></td>
        <td data-name="FemaleFactor" <?= $Page->FemaleFactor->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FemaleFactor">
<span<?= $Page->FemaleFactor->viewAttributes() ?>>
<?= $Page->FemaleFactor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
    <tr id="r_MaleFactor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MaleFactor"><?= $Page->MaleFactor->caption() ?></span></td>
        <td data-name="MaleFactor" <?= $Page->MaleFactor->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_MaleFactor">
<span<?= $Page->MaleFactor->viewAttributes() ?>>
<?= $Page->MaleFactor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <tr id="r_Protocol">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Protocol"><?= $Page->Protocol->caption() ?></span></td>
        <td data-name="Protocol" <?= $Page->Protocol->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
    <tr id="r_SemenFrozen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SemenFrozen"><?= $Page->SemenFrozen->caption() ?></span></td>
        <td data-name="SemenFrozen" <?= $Page->SemenFrozen->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SemenFrozen">
<span<?= $Page->SemenFrozen->viewAttributes() ?>>
<?= $Page->SemenFrozen->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
    <tr id="r_A4ICSICycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_A4ICSICycle"><?= $Page->A4ICSICycle->caption() ?></span></td>
        <td data-name="A4ICSICycle" <?= $Page->A4ICSICycle->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_A4ICSICycle">
<span<?= $Page->A4ICSICycle->viewAttributes() ?>>
<?= $Page->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
    <tr id="r_TotalICSICycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TotalICSICycle"><?= $Page->TotalICSICycle->caption() ?></span></td>
        <td data-name="TotalICSICycle" <?= $Page->TotalICSICycle->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TotalICSICycle">
<span<?= $Page->TotalICSICycle->viewAttributes() ?>>
<?= $Page->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
    <tr id="r_TypeOfInfertility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TypeOfInfertility"><?= $Page->TypeOfInfertility->caption() ?></span></td>
        <td data-name="TypeOfInfertility" <?= $Page->TypeOfInfertility->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TypeOfInfertility">
<span<?= $Page->TypeOfInfertility->viewAttributes() ?>>
<?= $Page->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <tr id="r_Duration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Duration"><?= $Page->Duration->caption() ?></span></td>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <tr id="r_LMP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LMP"><?= $Page->LMP->caption() ?></span></td>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
    <tr id="r_RelevantHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RelevantHistory"><?= $Page->RelevantHistory->caption() ?></span></td>
        <td data-name="RelevantHistory" <?= $Page->RelevantHistory->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RelevantHistory">
<span<?= $Page->RelevantHistory->viewAttributes() ?>>
<?= $Page->RelevantHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
    <tr id="r_IUICycles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IUICycles"><?= $Page->IUICycles->caption() ?></span></td>
        <td data-name="IUICycles" <?= $Page->IUICycles->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_IUICycles">
<span<?= $Page->IUICycles->viewAttributes() ?>>
<?= $Page->IUICycles->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
    <tr id="r_AFC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AFC"><?= $Page->AFC->caption() ?></span></td>
        <td data-name="AFC" <?= $Page->AFC->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_AFC">
<span<?= $Page->AFC->viewAttributes() ?>>
<?= $Page->AFC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
    <tr id="r_AMH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AMH"><?= $Page->AMH->caption() ?></span></td>
        <td data-name="AMH" <?= $Page->AMH->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_AMH">
<span<?= $Page->AMH->viewAttributes() ?>>
<?= $Page->AMH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <tr id="r_FBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FBMI"><?= $Page->FBMI->caption() ?></span></td>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <tr id="r_MBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MBMI"><?= $Page->MBMI->caption() ?></span></td>
        <td data-name="MBMI" <?= $Page->MBMI->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
    <tr id="r_OvarianVolumeRT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeRT"><?= $Page->OvarianVolumeRT->caption() ?></span></td>
        <td data-name="OvarianVolumeRT" <?= $Page->OvarianVolumeRT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OvarianVolumeRT">
<span<?= $Page->OvarianVolumeRT->viewAttributes() ?>>
<?= $Page->OvarianVolumeRT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
    <tr id="r_OvarianVolumeLT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeLT"><?= $Page->OvarianVolumeLT->caption() ?></span></td>
        <td data-name="OvarianVolumeLT" <?= $Page->OvarianVolumeLT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OvarianVolumeLT">
<span<?= $Page->OvarianVolumeLT->viewAttributes() ?>>
<?= $Page->OvarianVolumeLT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
    <tr id="r_DAYSOFSTIMULATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION"><?= $Page->DAYSOFSTIMULATION->caption() ?></span></td>
        <td data-name="DAYSOFSTIMULATION" <?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?= $Page->DAYSOFSTIMULATION->viewAttributes() ?>>
<?= $Page->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
    <tr id="r_DOSEOFGONADOTROPINS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS"><?= $Page->DOSEOFGONADOTROPINS->caption() ?></span></td>
        <td data-name="DOSEOFGONADOTROPINS" <?= $Page->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?= $Page->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?= $Page->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
    <tr id="r_INJTYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_INJTYPE"><?= $Page->INJTYPE->caption() ?></span></td>
        <td data-name="INJTYPE" <?= $Page->INJTYPE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_INJTYPE">
<span<?= $Page->INJTYPE->viewAttributes() ?>>
<?= $Page->INJTYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
    <tr id="r_ANTAGONISTDAYS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTDAYS"><?= $Page->ANTAGONISTDAYS->caption() ?></span></td>
        <td data-name="ANTAGONISTDAYS" <?= $Page->ANTAGONISTDAYS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?= $Page->ANTAGONISTDAYS->viewAttributes() ?>>
<?= $Page->ANTAGONISTDAYS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
    <tr id="r_ANTAGONISTSTARTDAY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY"><?= $Page->ANTAGONISTSTARTDAY->caption() ?></span></td>
        <td data-name="ANTAGONISTSTARTDAY" <?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?= $Page->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?= $Page->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
    <tr id="r_GROWTHHORMONE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GROWTHHORMONE"><?= $Page->GROWTHHORMONE->caption() ?></span></td>
        <td data-name="GROWTHHORMONE" <?= $Page->GROWTHHORMONE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GROWTHHORMONE">
<span<?= $Page->GROWTHHORMONE->viewAttributes() ?>>
<?= $Page->GROWTHHORMONE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
    <tr id="r_PRETREATMENT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PRETREATMENT"><?= $Page->PRETREATMENT->caption() ?></span></td>
        <td data-name="PRETREATMENT" <?= $Page->PRETREATMENT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PRETREATMENT">
<span<?= $Page->PRETREATMENT->viewAttributes() ?>>
<?= $Page->PRETREATMENT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <tr id="r_SerumP4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SerumP4"><?= $Page->SerumP4->caption() ?></span></td>
        <td data-name="SerumP4" <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <tr id="r_FORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FORT"><?= $Page->FORT->caption() ?></span></td>
        <td data-name="FORT" <?= $Page->FORT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
    <tr id="r_MedicalFactors">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_MedicalFactors"><?= $Page->MedicalFactors->caption() ?></span></td>
        <td data-name="MedicalFactors" <?= $Page->MedicalFactors->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_MedicalFactors">
<span<?= $Page->MedicalFactors->viewAttributes() ?>>
<?= $Page->MedicalFactors->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
    <tr id="r_SCDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SCDate"><?= $Page->SCDate->caption() ?></span></td>
        <td data-name="SCDate" <?= $Page->SCDate->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SCDate">
<span<?= $Page->SCDate->viewAttributes() ?>>
<?= $Page->SCDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
    <tr id="r_OvarianSurgery">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OvarianSurgery"><?= $Page->OvarianSurgery->caption() ?></span></td>
        <td data-name="OvarianSurgery" <?= $Page->OvarianSurgery->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OvarianSurgery">
<span<?= $Page->OvarianSurgery->viewAttributes() ?>>
<?= $Page->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
    <tr id="r_PreProcedureOrder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PreProcedureOrder"><?= $Page->PreProcedureOrder->caption() ?></span></td>
        <td data-name="PreProcedureOrder" <?= $Page->PreProcedureOrder->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PreProcedureOrder">
<span<?= $Page->PreProcedureOrder->viewAttributes() ?>>
<?= $Page->PreProcedureOrder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
    <tr id="r_TRIGGERR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERR"><?= $Page->TRIGGERR->caption() ?></span></td>
        <td data-name="TRIGGERR" <?= $Page->TRIGGERR->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TRIGGERR">
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
    <tr id="r_TRIGGERDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TRIGGERDATE"><?= $Page->TRIGGERDATE->caption() ?></span></td>
        <td data-name="TRIGGERDATE" <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TRIGGERDATE">
<span<?= $Page->TRIGGERDATE->viewAttributes() ?>>
<?= $Page->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
    <tr id="r_ATHOMEorCLINIC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ATHOMEorCLINIC"><?= $Page->ATHOMEorCLINIC->caption() ?></span></td>
        <td data-name="ATHOMEorCLINIC" <?= $Page->ATHOMEorCLINIC->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?= $Page->ATHOMEorCLINIC->viewAttributes() ?>>
<?= $Page->ATHOMEorCLINIC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
    <tr id="r_OPUDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OPUDATE"><?= $Page->OPUDATE->caption() ?></span></td>
        <td data-name="OPUDATE" <?= $Page->OPUDATE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OPUDATE">
<span<?= $Page->OPUDATE->viewAttributes() ?>>
<?= $Page->OPUDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
    <tr id="r_ALLFREEZEINDICATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION"><?= $Page->ALLFREEZEINDICATION->caption() ?></span></td>
        <td data-name="ALLFREEZEINDICATION" <?= $Page->ALLFREEZEINDICATION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?= $Page->ALLFREEZEINDICATION->viewAttributes() ?>>
<?= $Page->ALLFREEZEINDICATION->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <tr id="r_ERA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ERA"><?= $Page->ERA->caption() ?></span></td>
        <td data-name="ERA" <?= $Page->ERA->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
    <tr id="r_PGTA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGTA"><?= $Page->PGTA->caption() ?></span></td>
        <td data-name="PGTA" <?= $Page->PGTA->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PGTA">
<span<?= $Page->PGTA->viewAttributes() ?>>
<?= $Page->PGTA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
    <tr id="r_PGD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PGD"><?= $Page->PGD->caption() ?></span></td>
        <td data-name="PGD" <?= $Page->PGD->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PGD">
<span<?= $Page->PGD->viewAttributes() ?>>
<?= $Page->PGD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
    <tr id="r_DATEOFET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATEOFET"><?= $Page->DATEOFET->caption() ?></span></td>
        <td data-name="DATEOFET" <?= $Page->DATEOFET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DATEOFET">
<span<?= $Page->DATEOFET->viewAttributes() ?>>
<?= $Page->DATEOFET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
    <tr id="r_ET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ET"><?= $Page->ET->caption() ?></span></td>
        <td data-name="ET" <?= $Page->ET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ET">
<span<?= $Page->ET->viewAttributes() ?>>
<?= $Page->ET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
    <tr id="r_ESET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ESET"><?= $Page->ESET->caption() ?></span></td>
        <td data-name="ESET" <?= $Page->ESET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ESET">
<span<?= $Page->ESET->viewAttributes() ?>>
<?= $Page->ESET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
    <tr id="r_DOET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOET"><?= $Page->DOET->caption() ?></span></td>
        <td data-name="DOET" <?= $Page->DOET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DOET">
<span<?= $Page->DOET->viewAttributes() ?>>
<?= $Page->DOET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
    <tr id="r_SEMENPREPARATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEMENPREPARATION"><?= $Page->SEMENPREPARATION->caption() ?></span></td>
        <td data-name="SEMENPREPARATION" <?= $Page->SEMENPREPARATION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SEMENPREPARATION">
<span<?= $Page->SEMENPREPARATION->viewAttributes() ?>>
<?= $Page->SEMENPREPARATION->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
    <tr id="r_REASONFORESET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_REASONFORESET"><?= $Page->REASONFORESET->caption() ?></span></td>
        <td data-name="REASONFORESET" <?= $Page->REASONFORESET->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_REASONFORESET">
<span<?= $Page->REASONFORESET->viewAttributes() ?>>
<?= $Page->REASONFORESET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
    <tr id="r_Expectedoocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Expectedoocytes"><?= $Page->Expectedoocytes->caption() ?></span></td>
        <td data-name="Expectedoocytes" <?= $Page->Expectedoocytes->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Expectedoocytes">
<span<?= $Page->Expectedoocytes->viewAttributes() ?>>
<?= $Page->Expectedoocytes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
    <tr id="r_StChDate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate1"><?= $Page->StChDate1->caption() ?></span></td>
        <td data-name="StChDate1" <?= $Page->StChDate1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate1">
<span<?= $Page->StChDate1->viewAttributes() ?>>
<?= $Page->StChDate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
    <tr id="r_StChDate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate2"><?= $Page->StChDate2->caption() ?></span></td>
        <td data-name="StChDate2" <?= $Page->StChDate2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate2">
<span<?= $Page->StChDate2->viewAttributes() ?>>
<?= $Page->StChDate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
    <tr id="r_StChDate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate3"><?= $Page->StChDate3->caption() ?></span></td>
        <td data-name="StChDate3" <?= $Page->StChDate3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate3">
<span<?= $Page->StChDate3->viewAttributes() ?>>
<?= $Page->StChDate3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
    <tr id="r_StChDate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate4"><?= $Page->StChDate4->caption() ?></span></td>
        <td data-name="StChDate4" <?= $Page->StChDate4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate4">
<span<?= $Page->StChDate4->viewAttributes() ?>>
<?= $Page->StChDate4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
    <tr id="r_StChDate5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate5"><?= $Page->StChDate5->caption() ?></span></td>
        <td data-name="StChDate5" <?= $Page->StChDate5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate5">
<span<?= $Page->StChDate5->viewAttributes() ?>>
<?= $Page->StChDate5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
    <tr id="r_StChDate6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate6"><?= $Page->StChDate6->caption() ?></span></td>
        <td data-name="StChDate6" <?= $Page->StChDate6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate6">
<span<?= $Page->StChDate6->viewAttributes() ?>>
<?= $Page->StChDate6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
    <tr id="r_StChDate7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate7"><?= $Page->StChDate7->caption() ?></span></td>
        <td data-name="StChDate7" <?= $Page->StChDate7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate7">
<span<?= $Page->StChDate7->viewAttributes() ?>>
<?= $Page->StChDate7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
    <tr id="r_StChDate8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate8"><?= $Page->StChDate8->caption() ?></span></td>
        <td data-name="StChDate8" <?= $Page->StChDate8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate8">
<span<?= $Page->StChDate8->viewAttributes() ?>>
<?= $Page->StChDate8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
    <tr id="r_StChDate9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate9"><?= $Page->StChDate9->caption() ?></span></td>
        <td data-name="StChDate9" <?= $Page->StChDate9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate9">
<span<?= $Page->StChDate9->viewAttributes() ?>>
<?= $Page->StChDate9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
    <tr id="r_StChDate10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate10"><?= $Page->StChDate10->caption() ?></span></td>
        <td data-name="StChDate10" <?= $Page->StChDate10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate10">
<span<?= $Page->StChDate10->viewAttributes() ?>>
<?= $Page->StChDate10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
    <tr id="r_StChDate11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate11"><?= $Page->StChDate11->caption() ?></span></td>
        <td data-name="StChDate11" <?= $Page->StChDate11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate11">
<span<?= $Page->StChDate11->viewAttributes() ?>>
<?= $Page->StChDate11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
    <tr id="r_StChDate12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate12"><?= $Page->StChDate12->caption() ?></span></td>
        <td data-name="StChDate12" <?= $Page->StChDate12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate12">
<span<?= $Page->StChDate12->viewAttributes() ?>>
<?= $Page->StChDate12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
    <tr id="r_StChDate13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate13"><?= $Page->StChDate13->caption() ?></span></td>
        <td data-name="StChDate13" <?= $Page->StChDate13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate13">
<span<?= $Page->StChDate13->viewAttributes() ?>>
<?= $Page->StChDate13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
    <tr id="r_CycleDay1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay1"><?= $Page->CycleDay1->caption() ?></span></td>
        <td data-name="CycleDay1" <?= $Page->CycleDay1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay1">
<span<?= $Page->CycleDay1->viewAttributes() ?>>
<?= $Page->CycleDay1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
    <tr id="r_CycleDay2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay2"><?= $Page->CycleDay2->caption() ?></span></td>
        <td data-name="CycleDay2" <?= $Page->CycleDay2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay2">
<span<?= $Page->CycleDay2->viewAttributes() ?>>
<?= $Page->CycleDay2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
    <tr id="r_CycleDay3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay3"><?= $Page->CycleDay3->caption() ?></span></td>
        <td data-name="CycleDay3" <?= $Page->CycleDay3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay3">
<span<?= $Page->CycleDay3->viewAttributes() ?>>
<?= $Page->CycleDay3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
    <tr id="r_CycleDay4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay4"><?= $Page->CycleDay4->caption() ?></span></td>
        <td data-name="CycleDay4" <?= $Page->CycleDay4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay4">
<span<?= $Page->CycleDay4->viewAttributes() ?>>
<?= $Page->CycleDay4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
    <tr id="r_CycleDay5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay5"><?= $Page->CycleDay5->caption() ?></span></td>
        <td data-name="CycleDay5" <?= $Page->CycleDay5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay5">
<span<?= $Page->CycleDay5->viewAttributes() ?>>
<?= $Page->CycleDay5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
    <tr id="r_CycleDay6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay6"><?= $Page->CycleDay6->caption() ?></span></td>
        <td data-name="CycleDay6" <?= $Page->CycleDay6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay6">
<span<?= $Page->CycleDay6->viewAttributes() ?>>
<?= $Page->CycleDay6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
    <tr id="r_CycleDay7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay7"><?= $Page->CycleDay7->caption() ?></span></td>
        <td data-name="CycleDay7" <?= $Page->CycleDay7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay7">
<span<?= $Page->CycleDay7->viewAttributes() ?>>
<?= $Page->CycleDay7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
    <tr id="r_CycleDay8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay8"><?= $Page->CycleDay8->caption() ?></span></td>
        <td data-name="CycleDay8" <?= $Page->CycleDay8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay8">
<span<?= $Page->CycleDay8->viewAttributes() ?>>
<?= $Page->CycleDay8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
    <tr id="r_CycleDay9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay9"><?= $Page->CycleDay9->caption() ?></span></td>
        <td data-name="CycleDay9" <?= $Page->CycleDay9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay9">
<span<?= $Page->CycleDay9->viewAttributes() ?>>
<?= $Page->CycleDay9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
    <tr id="r_CycleDay10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay10"><?= $Page->CycleDay10->caption() ?></span></td>
        <td data-name="CycleDay10" <?= $Page->CycleDay10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay10">
<span<?= $Page->CycleDay10->viewAttributes() ?>>
<?= $Page->CycleDay10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
    <tr id="r_CycleDay11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay11"><?= $Page->CycleDay11->caption() ?></span></td>
        <td data-name="CycleDay11" <?= $Page->CycleDay11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay11">
<span<?= $Page->CycleDay11->viewAttributes() ?>>
<?= $Page->CycleDay11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
    <tr id="r_CycleDay12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay12"><?= $Page->CycleDay12->caption() ?></span></td>
        <td data-name="CycleDay12" <?= $Page->CycleDay12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay12">
<span<?= $Page->CycleDay12->viewAttributes() ?>>
<?= $Page->CycleDay12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
    <tr id="r_CycleDay13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay13"><?= $Page->CycleDay13->caption() ?></span></td>
        <td data-name="CycleDay13" <?= $Page->CycleDay13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay13">
<span<?= $Page->CycleDay13->viewAttributes() ?>>
<?= $Page->CycleDay13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
    <tr id="r_StimulationDay1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay1"><?= $Page->StimulationDay1->caption() ?></span></td>
        <td data-name="StimulationDay1" <?= $Page->StimulationDay1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay1">
<span<?= $Page->StimulationDay1->viewAttributes() ?>>
<?= $Page->StimulationDay1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
    <tr id="r_StimulationDay2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay2"><?= $Page->StimulationDay2->caption() ?></span></td>
        <td data-name="StimulationDay2" <?= $Page->StimulationDay2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay2">
<span<?= $Page->StimulationDay2->viewAttributes() ?>>
<?= $Page->StimulationDay2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
    <tr id="r_StimulationDay3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay3"><?= $Page->StimulationDay3->caption() ?></span></td>
        <td data-name="StimulationDay3" <?= $Page->StimulationDay3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay3">
<span<?= $Page->StimulationDay3->viewAttributes() ?>>
<?= $Page->StimulationDay3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
    <tr id="r_StimulationDay4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay4"><?= $Page->StimulationDay4->caption() ?></span></td>
        <td data-name="StimulationDay4" <?= $Page->StimulationDay4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay4">
<span<?= $Page->StimulationDay4->viewAttributes() ?>>
<?= $Page->StimulationDay4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
    <tr id="r_StimulationDay5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay5"><?= $Page->StimulationDay5->caption() ?></span></td>
        <td data-name="StimulationDay5" <?= $Page->StimulationDay5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay5">
<span<?= $Page->StimulationDay5->viewAttributes() ?>>
<?= $Page->StimulationDay5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
    <tr id="r_StimulationDay6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay6"><?= $Page->StimulationDay6->caption() ?></span></td>
        <td data-name="StimulationDay6" <?= $Page->StimulationDay6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay6">
<span<?= $Page->StimulationDay6->viewAttributes() ?>>
<?= $Page->StimulationDay6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
    <tr id="r_StimulationDay7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay7"><?= $Page->StimulationDay7->caption() ?></span></td>
        <td data-name="StimulationDay7" <?= $Page->StimulationDay7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay7">
<span<?= $Page->StimulationDay7->viewAttributes() ?>>
<?= $Page->StimulationDay7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
    <tr id="r_StimulationDay8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay8"><?= $Page->StimulationDay8->caption() ?></span></td>
        <td data-name="StimulationDay8" <?= $Page->StimulationDay8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay8">
<span<?= $Page->StimulationDay8->viewAttributes() ?>>
<?= $Page->StimulationDay8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
    <tr id="r_StimulationDay9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay9"><?= $Page->StimulationDay9->caption() ?></span></td>
        <td data-name="StimulationDay9" <?= $Page->StimulationDay9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay9">
<span<?= $Page->StimulationDay9->viewAttributes() ?>>
<?= $Page->StimulationDay9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
    <tr id="r_StimulationDay10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay10"><?= $Page->StimulationDay10->caption() ?></span></td>
        <td data-name="StimulationDay10" <?= $Page->StimulationDay10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay10">
<span<?= $Page->StimulationDay10->viewAttributes() ?>>
<?= $Page->StimulationDay10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
    <tr id="r_StimulationDay11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay11"><?= $Page->StimulationDay11->caption() ?></span></td>
        <td data-name="StimulationDay11" <?= $Page->StimulationDay11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay11">
<span<?= $Page->StimulationDay11->viewAttributes() ?>>
<?= $Page->StimulationDay11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
    <tr id="r_StimulationDay12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay12"><?= $Page->StimulationDay12->caption() ?></span></td>
        <td data-name="StimulationDay12" <?= $Page->StimulationDay12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay12">
<span<?= $Page->StimulationDay12->viewAttributes() ?>>
<?= $Page->StimulationDay12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
    <tr id="r_StimulationDay13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay13"><?= $Page->StimulationDay13->caption() ?></span></td>
        <td data-name="StimulationDay13" <?= $Page->StimulationDay13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay13">
<span<?= $Page->StimulationDay13->viewAttributes() ?>>
<?= $Page->StimulationDay13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
    <tr id="r_Tablet1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet1"><?= $Page->Tablet1->caption() ?></span></td>
        <td data-name="Tablet1" <?= $Page->Tablet1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet1">
<span<?= $Page->Tablet1->viewAttributes() ?>>
<?= $Page->Tablet1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
    <tr id="r_Tablet2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet2"><?= $Page->Tablet2->caption() ?></span></td>
        <td data-name="Tablet2" <?= $Page->Tablet2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet2">
<span<?= $Page->Tablet2->viewAttributes() ?>>
<?= $Page->Tablet2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
    <tr id="r_Tablet3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet3"><?= $Page->Tablet3->caption() ?></span></td>
        <td data-name="Tablet3" <?= $Page->Tablet3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet3">
<span<?= $Page->Tablet3->viewAttributes() ?>>
<?= $Page->Tablet3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
    <tr id="r_Tablet4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet4"><?= $Page->Tablet4->caption() ?></span></td>
        <td data-name="Tablet4" <?= $Page->Tablet4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet4">
<span<?= $Page->Tablet4->viewAttributes() ?>>
<?= $Page->Tablet4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
    <tr id="r_Tablet5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet5"><?= $Page->Tablet5->caption() ?></span></td>
        <td data-name="Tablet5" <?= $Page->Tablet5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet5">
<span<?= $Page->Tablet5->viewAttributes() ?>>
<?= $Page->Tablet5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
    <tr id="r_Tablet6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet6"><?= $Page->Tablet6->caption() ?></span></td>
        <td data-name="Tablet6" <?= $Page->Tablet6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet6">
<span<?= $Page->Tablet6->viewAttributes() ?>>
<?= $Page->Tablet6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
    <tr id="r_Tablet7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet7"><?= $Page->Tablet7->caption() ?></span></td>
        <td data-name="Tablet7" <?= $Page->Tablet7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet7">
<span<?= $Page->Tablet7->viewAttributes() ?>>
<?= $Page->Tablet7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
    <tr id="r_Tablet8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet8"><?= $Page->Tablet8->caption() ?></span></td>
        <td data-name="Tablet8" <?= $Page->Tablet8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet8">
<span<?= $Page->Tablet8->viewAttributes() ?>>
<?= $Page->Tablet8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
    <tr id="r_Tablet9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet9"><?= $Page->Tablet9->caption() ?></span></td>
        <td data-name="Tablet9" <?= $Page->Tablet9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet9">
<span<?= $Page->Tablet9->viewAttributes() ?>>
<?= $Page->Tablet9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
    <tr id="r_Tablet10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet10"><?= $Page->Tablet10->caption() ?></span></td>
        <td data-name="Tablet10" <?= $Page->Tablet10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet10">
<span<?= $Page->Tablet10->viewAttributes() ?>>
<?= $Page->Tablet10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
    <tr id="r_Tablet11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet11"><?= $Page->Tablet11->caption() ?></span></td>
        <td data-name="Tablet11" <?= $Page->Tablet11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet11">
<span<?= $Page->Tablet11->viewAttributes() ?>>
<?= $Page->Tablet11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
    <tr id="r_Tablet12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet12"><?= $Page->Tablet12->caption() ?></span></td>
        <td data-name="Tablet12" <?= $Page->Tablet12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet12">
<span<?= $Page->Tablet12->viewAttributes() ?>>
<?= $Page->Tablet12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
    <tr id="r_Tablet13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet13"><?= $Page->Tablet13->caption() ?></span></td>
        <td data-name="Tablet13" <?= $Page->Tablet13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet13">
<span<?= $Page->Tablet13->viewAttributes() ?>>
<?= $Page->Tablet13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
    <tr id="r_RFSH1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH1"><?= $Page->RFSH1->caption() ?></span></td>
        <td data-name="RFSH1" <?= $Page->RFSH1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH1">
<span<?= $Page->RFSH1->viewAttributes() ?>>
<?= $Page->RFSH1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
    <tr id="r_RFSH2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH2"><?= $Page->RFSH2->caption() ?></span></td>
        <td data-name="RFSH2" <?= $Page->RFSH2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH2">
<span<?= $Page->RFSH2->viewAttributes() ?>>
<?= $Page->RFSH2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
    <tr id="r_RFSH3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH3"><?= $Page->RFSH3->caption() ?></span></td>
        <td data-name="RFSH3" <?= $Page->RFSH3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH3">
<span<?= $Page->RFSH3->viewAttributes() ?>>
<?= $Page->RFSH3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
    <tr id="r_RFSH4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH4"><?= $Page->RFSH4->caption() ?></span></td>
        <td data-name="RFSH4" <?= $Page->RFSH4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH4">
<span<?= $Page->RFSH4->viewAttributes() ?>>
<?= $Page->RFSH4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
    <tr id="r_RFSH5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH5"><?= $Page->RFSH5->caption() ?></span></td>
        <td data-name="RFSH5" <?= $Page->RFSH5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH5">
<span<?= $Page->RFSH5->viewAttributes() ?>>
<?= $Page->RFSH5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
    <tr id="r_RFSH6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH6"><?= $Page->RFSH6->caption() ?></span></td>
        <td data-name="RFSH6" <?= $Page->RFSH6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH6">
<span<?= $Page->RFSH6->viewAttributes() ?>>
<?= $Page->RFSH6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
    <tr id="r_RFSH7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH7"><?= $Page->RFSH7->caption() ?></span></td>
        <td data-name="RFSH7" <?= $Page->RFSH7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH7">
<span<?= $Page->RFSH7->viewAttributes() ?>>
<?= $Page->RFSH7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
    <tr id="r_RFSH8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH8"><?= $Page->RFSH8->caption() ?></span></td>
        <td data-name="RFSH8" <?= $Page->RFSH8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH8">
<span<?= $Page->RFSH8->viewAttributes() ?>>
<?= $Page->RFSH8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
    <tr id="r_RFSH9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH9"><?= $Page->RFSH9->caption() ?></span></td>
        <td data-name="RFSH9" <?= $Page->RFSH9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH9">
<span<?= $Page->RFSH9->viewAttributes() ?>>
<?= $Page->RFSH9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
    <tr id="r_RFSH10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH10"><?= $Page->RFSH10->caption() ?></span></td>
        <td data-name="RFSH10" <?= $Page->RFSH10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH10">
<span<?= $Page->RFSH10->viewAttributes() ?>>
<?= $Page->RFSH10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
    <tr id="r_RFSH11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH11"><?= $Page->RFSH11->caption() ?></span></td>
        <td data-name="RFSH11" <?= $Page->RFSH11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH11">
<span<?= $Page->RFSH11->viewAttributes() ?>>
<?= $Page->RFSH11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
    <tr id="r_RFSH12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH12"><?= $Page->RFSH12->caption() ?></span></td>
        <td data-name="RFSH12" <?= $Page->RFSH12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH12">
<span<?= $Page->RFSH12->viewAttributes() ?>>
<?= $Page->RFSH12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
    <tr id="r_RFSH13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH13"><?= $Page->RFSH13->caption() ?></span></td>
        <td data-name="RFSH13" <?= $Page->RFSH13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH13">
<span<?= $Page->RFSH13->viewAttributes() ?>>
<?= $Page->RFSH13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
    <tr id="r_HMG1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG1"><?= $Page->HMG1->caption() ?></span></td>
        <td data-name="HMG1" <?= $Page->HMG1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG1">
<span<?= $Page->HMG1->viewAttributes() ?>>
<?= $Page->HMG1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
    <tr id="r_HMG2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG2"><?= $Page->HMG2->caption() ?></span></td>
        <td data-name="HMG2" <?= $Page->HMG2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG2">
<span<?= $Page->HMG2->viewAttributes() ?>>
<?= $Page->HMG2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
    <tr id="r_HMG3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG3"><?= $Page->HMG3->caption() ?></span></td>
        <td data-name="HMG3" <?= $Page->HMG3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG3">
<span<?= $Page->HMG3->viewAttributes() ?>>
<?= $Page->HMG3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
    <tr id="r_HMG4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG4"><?= $Page->HMG4->caption() ?></span></td>
        <td data-name="HMG4" <?= $Page->HMG4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG4">
<span<?= $Page->HMG4->viewAttributes() ?>>
<?= $Page->HMG4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
    <tr id="r_HMG5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG5"><?= $Page->HMG5->caption() ?></span></td>
        <td data-name="HMG5" <?= $Page->HMG5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG5">
<span<?= $Page->HMG5->viewAttributes() ?>>
<?= $Page->HMG5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
    <tr id="r_HMG6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG6"><?= $Page->HMG6->caption() ?></span></td>
        <td data-name="HMG6" <?= $Page->HMG6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG6">
<span<?= $Page->HMG6->viewAttributes() ?>>
<?= $Page->HMG6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
    <tr id="r_HMG7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG7"><?= $Page->HMG7->caption() ?></span></td>
        <td data-name="HMG7" <?= $Page->HMG7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG7">
<span<?= $Page->HMG7->viewAttributes() ?>>
<?= $Page->HMG7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
    <tr id="r_HMG8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG8"><?= $Page->HMG8->caption() ?></span></td>
        <td data-name="HMG8" <?= $Page->HMG8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG8">
<span<?= $Page->HMG8->viewAttributes() ?>>
<?= $Page->HMG8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
    <tr id="r_HMG9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG9"><?= $Page->HMG9->caption() ?></span></td>
        <td data-name="HMG9" <?= $Page->HMG9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG9">
<span<?= $Page->HMG9->viewAttributes() ?>>
<?= $Page->HMG9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
    <tr id="r_HMG10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG10"><?= $Page->HMG10->caption() ?></span></td>
        <td data-name="HMG10" <?= $Page->HMG10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG10">
<span<?= $Page->HMG10->viewAttributes() ?>>
<?= $Page->HMG10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
    <tr id="r_HMG11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG11"><?= $Page->HMG11->caption() ?></span></td>
        <td data-name="HMG11" <?= $Page->HMG11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG11">
<span<?= $Page->HMG11->viewAttributes() ?>>
<?= $Page->HMG11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
    <tr id="r_HMG12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG12"><?= $Page->HMG12->caption() ?></span></td>
        <td data-name="HMG12" <?= $Page->HMG12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG12">
<span<?= $Page->HMG12->viewAttributes() ?>>
<?= $Page->HMG12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
    <tr id="r_HMG13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG13"><?= $Page->HMG13->caption() ?></span></td>
        <td data-name="HMG13" <?= $Page->HMG13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG13">
<span<?= $Page->HMG13->viewAttributes() ?>>
<?= $Page->HMG13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
    <tr id="r_GnRH1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH1"><?= $Page->GnRH1->caption() ?></span></td>
        <td data-name="GnRH1" <?= $Page->GnRH1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH1">
<span<?= $Page->GnRH1->viewAttributes() ?>>
<?= $Page->GnRH1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
    <tr id="r_GnRH2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH2"><?= $Page->GnRH2->caption() ?></span></td>
        <td data-name="GnRH2" <?= $Page->GnRH2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH2">
<span<?= $Page->GnRH2->viewAttributes() ?>>
<?= $Page->GnRH2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
    <tr id="r_GnRH3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH3"><?= $Page->GnRH3->caption() ?></span></td>
        <td data-name="GnRH3" <?= $Page->GnRH3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH3">
<span<?= $Page->GnRH3->viewAttributes() ?>>
<?= $Page->GnRH3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
    <tr id="r_GnRH4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH4"><?= $Page->GnRH4->caption() ?></span></td>
        <td data-name="GnRH4" <?= $Page->GnRH4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH4">
<span<?= $Page->GnRH4->viewAttributes() ?>>
<?= $Page->GnRH4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
    <tr id="r_GnRH5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH5"><?= $Page->GnRH5->caption() ?></span></td>
        <td data-name="GnRH5" <?= $Page->GnRH5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH5">
<span<?= $Page->GnRH5->viewAttributes() ?>>
<?= $Page->GnRH5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
    <tr id="r_GnRH6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH6"><?= $Page->GnRH6->caption() ?></span></td>
        <td data-name="GnRH6" <?= $Page->GnRH6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH6">
<span<?= $Page->GnRH6->viewAttributes() ?>>
<?= $Page->GnRH6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
    <tr id="r_GnRH7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH7"><?= $Page->GnRH7->caption() ?></span></td>
        <td data-name="GnRH7" <?= $Page->GnRH7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH7">
<span<?= $Page->GnRH7->viewAttributes() ?>>
<?= $Page->GnRH7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
    <tr id="r_GnRH8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH8"><?= $Page->GnRH8->caption() ?></span></td>
        <td data-name="GnRH8" <?= $Page->GnRH8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH8">
<span<?= $Page->GnRH8->viewAttributes() ?>>
<?= $Page->GnRH8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
    <tr id="r_GnRH9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH9"><?= $Page->GnRH9->caption() ?></span></td>
        <td data-name="GnRH9" <?= $Page->GnRH9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH9">
<span<?= $Page->GnRH9->viewAttributes() ?>>
<?= $Page->GnRH9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
    <tr id="r_GnRH10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH10"><?= $Page->GnRH10->caption() ?></span></td>
        <td data-name="GnRH10" <?= $Page->GnRH10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH10">
<span<?= $Page->GnRH10->viewAttributes() ?>>
<?= $Page->GnRH10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
    <tr id="r_GnRH11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH11"><?= $Page->GnRH11->caption() ?></span></td>
        <td data-name="GnRH11" <?= $Page->GnRH11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH11">
<span<?= $Page->GnRH11->viewAttributes() ?>>
<?= $Page->GnRH11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
    <tr id="r_GnRH12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH12"><?= $Page->GnRH12->caption() ?></span></td>
        <td data-name="GnRH12" <?= $Page->GnRH12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH12">
<span<?= $Page->GnRH12->viewAttributes() ?>>
<?= $Page->GnRH12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
    <tr id="r_GnRH13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH13"><?= $Page->GnRH13->caption() ?></span></td>
        <td data-name="GnRH13" <?= $Page->GnRH13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH13">
<span<?= $Page->GnRH13->viewAttributes() ?>>
<?= $Page->GnRH13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
    <tr id="r_E21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E21"><?= $Page->E21->caption() ?></span></td>
        <td data-name="E21" <?= $Page->E21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E21">
<span<?= $Page->E21->viewAttributes() ?>>
<?= $Page->E21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
    <tr id="r_E22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E22"><?= $Page->E22->caption() ?></span></td>
        <td data-name="E22" <?= $Page->E22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E22">
<span<?= $Page->E22->viewAttributes() ?>>
<?= $Page->E22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
    <tr id="r_E23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E23"><?= $Page->E23->caption() ?></span></td>
        <td data-name="E23" <?= $Page->E23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E23">
<span<?= $Page->E23->viewAttributes() ?>>
<?= $Page->E23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
    <tr id="r_E24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E24"><?= $Page->E24->caption() ?></span></td>
        <td data-name="E24" <?= $Page->E24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E24">
<span<?= $Page->E24->viewAttributes() ?>>
<?= $Page->E24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
    <tr id="r_E25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E25"><?= $Page->E25->caption() ?></span></td>
        <td data-name="E25" <?= $Page->E25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E25">
<span<?= $Page->E25->viewAttributes() ?>>
<?= $Page->E25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
    <tr id="r_E26">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E26"><?= $Page->E26->caption() ?></span></td>
        <td data-name="E26" <?= $Page->E26->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E26">
<span<?= $Page->E26->viewAttributes() ?>>
<?= $Page->E26->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
    <tr id="r_E27">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E27"><?= $Page->E27->caption() ?></span></td>
        <td data-name="E27" <?= $Page->E27->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E27">
<span<?= $Page->E27->viewAttributes() ?>>
<?= $Page->E27->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
    <tr id="r_E28">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E28"><?= $Page->E28->caption() ?></span></td>
        <td data-name="E28" <?= $Page->E28->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E28">
<span<?= $Page->E28->viewAttributes() ?>>
<?= $Page->E28->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
    <tr id="r_E29">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E29"><?= $Page->E29->caption() ?></span></td>
        <td data-name="E29" <?= $Page->E29->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E29">
<span<?= $Page->E29->viewAttributes() ?>>
<?= $Page->E29->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
    <tr id="r_E210">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E210"><?= $Page->E210->caption() ?></span></td>
        <td data-name="E210" <?= $Page->E210->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E210">
<span<?= $Page->E210->viewAttributes() ?>>
<?= $Page->E210->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
    <tr id="r_E211">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E211"><?= $Page->E211->caption() ?></span></td>
        <td data-name="E211" <?= $Page->E211->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E211">
<span<?= $Page->E211->viewAttributes() ?>>
<?= $Page->E211->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
    <tr id="r_E212">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E212"><?= $Page->E212->caption() ?></span></td>
        <td data-name="E212" <?= $Page->E212->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E212">
<span<?= $Page->E212->viewAttributes() ?>>
<?= $Page->E212->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
    <tr id="r_E213">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E213"><?= $Page->E213->caption() ?></span></td>
        <td data-name="E213" <?= $Page->E213->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E213">
<span<?= $Page->E213->viewAttributes() ?>>
<?= $Page->E213->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
    <tr id="r_P41">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P41"><?= $Page->P41->caption() ?></span></td>
        <td data-name="P41" <?= $Page->P41->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P41">
<span<?= $Page->P41->viewAttributes() ?>>
<?= $Page->P41->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
    <tr id="r_P42">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P42"><?= $Page->P42->caption() ?></span></td>
        <td data-name="P42" <?= $Page->P42->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P42">
<span<?= $Page->P42->viewAttributes() ?>>
<?= $Page->P42->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
    <tr id="r_P43">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P43"><?= $Page->P43->caption() ?></span></td>
        <td data-name="P43" <?= $Page->P43->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P43">
<span<?= $Page->P43->viewAttributes() ?>>
<?= $Page->P43->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
    <tr id="r_P44">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P44"><?= $Page->P44->caption() ?></span></td>
        <td data-name="P44" <?= $Page->P44->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P44">
<span<?= $Page->P44->viewAttributes() ?>>
<?= $Page->P44->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
    <tr id="r_P45">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P45"><?= $Page->P45->caption() ?></span></td>
        <td data-name="P45" <?= $Page->P45->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P45">
<span<?= $Page->P45->viewAttributes() ?>>
<?= $Page->P45->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
    <tr id="r_P46">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P46"><?= $Page->P46->caption() ?></span></td>
        <td data-name="P46" <?= $Page->P46->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P46">
<span<?= $Page->P46->viewAttributes() ?>>
<?= $Page->P46->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
    <tr id="r_P47">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P47"><?= $Page->P47->caption() ?></span></td>
        <td data-name="P47" <?= $Page->P47->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P47">
<span<?= $Page->P47->viewAttributes() ?>>
<?= $Page->P47->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
    <tr id="r_P48">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P48"><?= $Page->P48->caption() ?></span></td>
        <td data-name="P48" <?= $Page->P48->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P48">
<span<?= $Page->P48->viewAttributes() ?>>
<?= $Page->P48->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
    <tr id="r_P49">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P49"><?= $Page->P49->caption() ?></span></td>
        <td data-name="P49" <?= $Page->P49->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P49">
<span<?= $Page->P49->viewAttributes() ?>>
<?= $Page->P49->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
    <tr id="r_P410">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P410"><?= $Page->P410->caption() ?></span></td>
        <td data-name="P410" <?= $Page->P410->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P410">
<span<?= $Page->P410->viewAttributes() ?>>
<?= $Page->P410->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
    <tr id="r_P411">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P411"><?= $Page->P411->caption() ?></span></td>
        <td data-name="P411" <?= $Page->P411->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P411">
<span<?= $Page->P411->viewAttributes() ?>>
<?= $Page->P411->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
    <tr id="r_P412">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P412"><?= $Page->P412->caption() ?></span></td>
        <td data-name="P412" <?= $Page->P412->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P412">
<span<?= $Page->P412->viewAttributes() ?>>
<?= $Page->P412->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
    <tr id="r_P413">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P413"><?= $Page->P413->caption() ?></span></td>
        <td data-name="P413" <?= $Page->P413->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P413">
<span<?= $Page->P413->viewAttributes() ?>>
<?= $Page->P413->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
    <tr id="r_USGRt1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt1"><?= $Page->USGRt1->caption() ?></span></td>
        <td data-name="USGRt1" <?= $Page->USGRt1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt1">
<span<?= $Page->USGRt1->viewAttributes() ?>>
<?= $Page->USGRt1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
    <tr id="r_USGRt2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt2"><?= $Page->USGRt2->caption() ?></span></td>
        <td data-name="USGRt2" <?= $Page->USGRt2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt2">
<span<?= $Page->USGRt2->viewAttributes() ?>>
<?= $Page->USGRt2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
    <tr id="r_USGRt3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt3"><?= $Page->USGRt3->caption() ?></span></td>
        <td data-name="USGRt3" <?= $Page->USGRt3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt3">
<span<?= $Page->USGRt3->viewAttributes() ?>>
<?= $Page->USGRt3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
    <tr id="r_USGRt4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt4"><?= $Page->USGRt4->caption() ?></span></td>
        <td data-name="USGRt4" <?= $Page->USGRt4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt4">
<span<?= $Page->USGRt4->viewAttributes() ?>>
<?= $Page->USGRt4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
    <tr id="r_USGRt5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt5"><?= $Page->USGRt5->caption() ?></span></td>
        <td data-name="USGRt5" <?= $Page->USGRt5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt5">
<span<?= $Page->USGRt5->viewAttributes() ?>>
<?= $Page->USGRt5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
    <tr id="r_USGRt6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt6"><?= $Page->USGRt6->caption() ?></span></td>
        <td data-name="USGRt6" <?= $Page->USGRt6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt6">
<span<?= $Page->USGRt6->viewAttributes() ?>>
<?= $Page->USGRt6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
    <tr id="r_USGRt7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt7"><?= $Page->USGRt7->caption() ?></span></td>
        <td data-name="USGRt7" <?= $Page->USGRt7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt7">
<span<?= $Page->USGRt7->viewAttributes() ?>>
<?= $Page->USGRt7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
    <tr id="r_USGRt8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt8"><?= $Page->USGRt8->caption() ?></span></td>
        <td data-name="USGRt8" <?= $Page->USGRt8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt8">
<span<?= $Page->USGRt8->viewAttributes() ?>>
<?= $Page->USGRt8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
    <tr id="r_USGRt9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt9"><?= $Page->USGRt9->caption() ?></span></td>
        <td data-name="USGRt9" <?= $Page->USGRt9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt9">
<span<?= $Page->USGRt9->viewAttributes() ?>>
<?= $Page->USGRt9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
    <tr id="r_USGRt10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt10"><?= $Page->USGRt10->caption() ?></span></td>
        <td data-name="USGRt10" <?= $Page->USGRt10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt10">
<span<?= $Page->USGRt10->viewAttributes() ?>>
<?= $Page->USGRt10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
    <tr id="r_USGRt11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt11"><?= $Page->USGRt11->caption() ?></span></td>
        <td data-name="USGRt11" <?= $Page->USGRt11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt11">
<span<?= $Page->USGRt11->viewAttributes() ?>>
<?= $Page->USGRt11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
    <tr id="r_USGRt12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt12"><?= $Page->USGRt12->caption() ?></span></td>
        <td data-name="USGRt12" <?= $Page->USGRt12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt12">
<span<?= $Page->USGRt12->viewAttributes() ?>>
<?= $Page->USGRt12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
    <tr id="r_USGRt13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt13"><?= $Page->USGRt13->caption() ?></span></td>
        <td data-name="USGRt13" <?= $Page->USGRt13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt13">
<span<?= $Page->USGRt13->viewAttributes() ?>>
<?= $Page->USGRt13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
    <tr id="r_USGLt1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt1"><?= $Page->USGLt1->caption() ?></span></td>
        <td data-name="USGLt1" <?= $Page->USGLt1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt1">
<span<?= $Page->USGLt1->viewAttributes() ?>>
<?= $Page->USGLt1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
    <tr id="r_USGLt2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt2"><?= $Page->USGLt2->caption() ?></span></td>
        <td data-name="USGLt2" <?= $Page->USGLt2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt2">
<span<?= $Page->USGLt2->viewAttributes() ?>>
<?= $Page->USGLt2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
    <tr id="r_USGLt3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt3"><?= $Page->USGLt3->caption() ?></span></td>
        <td data-name="USGLt3" <?= $Page->USGLt3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt3">
<span<?= $Page->USGLt3->viewAttributes() ?>>
<?= $Page->USGLt3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
    <tr id="r_USGLt4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt4"><?= $Page->USGLt4->caption() ?></span></td>
        <td data-name="USGLt4" <?= $Page->USGLt4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt4">
<span<?= $Page->USGLt4->viewAttributes() ?>>
<?= $Page->USGLt4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
    <tr id="r_USGLt5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt5"><?= $Page->USGLt5->caption() ?></span></td>
        <td data-name="USGLt5" <?= $Page->USGLt5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt5">
<span<?= $Page->USGLt5->viewAttributes() ?>>
<?= $Page->USGLt5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
    <tr id="r_USGLt6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt6"><?= $Page->USGLt6->caption() ?></span></td>
        <td data-name="USGLt6" <?= $Page->USGLt6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt6">
<span<?= $Page->USGLt6->viewAttributes() ?>>
<?= $Page->USGLt6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
    <tr id="r_USGLt7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt7"><?= $Page->USGLt7->caption() ?></span></td>
        <td data-name="USGLt7" <?= $Page->USGLt7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt7">
<span<?= $Page->USGLt7->viewAttributes() ?>>
<?= $Page->USGLt7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
    <tr id="r_USGLt8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt8"><?= $Page->USGLt8->caption() ?></span></td>
        <td data-name="USGLt8" <?= $Page->USGLt8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt8">
<span<?= $Page->USGLt8->viewAttributes() ?>>
<?= $Page->USGLt8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
    <tr id="r_USGLt9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt9"><?= $Page->USGLt9->caption() ?></span></td>
        <td data-name="USGLt9" <?= $Page->USGLt9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt9">
<span<?= $Page->USGLt9->viewAttributes() ?>>
<?= $Page->USGLt9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
    <tr id="r_USGLt10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt10"><?= $Page->USGLt10->caption() ?></span></td>
        <td data-name="USGLt10" <?= $Page->USGLt10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt10">
<span<?= $Page->USGLt10->viewAttributes() ?>>
<?= $Page->USGLt10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
    <tr id="r_USGLt11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt11"><?= $Page->USGLt11->caption() ?></span></td>
        <td data-name="USGLt11" <?= $Page->USGLt11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt11">
<span<?= $Page->USGLt11->viewAttributes() ?>>
<?= $Page->USGLt11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
    <tr id="r_USGLt12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt12"><?= $Page->USGLt12->caption() ?></span></td>
        <td data-name="USGLt12" <?= $Page->USGLt12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt12">
<span<?= $Page->USGLt12->viewAttributes() ?>>
<?= $Page->USGLt12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
    <tr id="r_USGLt13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt13"><?= $Page->USGLt13->caption() ?></span></td>
        <td data-name="USGLt13" <?= $Page->USGLt13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt13">
<span<?= $Page->USGLt13->viewAttributes() ?>>
<?= $Page->USGLt13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
    <tr id="r_EM1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM1"><?= $Page->EM1->caption() ?></span></td>
        <td data-name="EM1" <?= $Page->EM1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM1">
<span<?= $Page->EM1->viewAttributes() ?>>
<?= $Page->EM1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
    <tr id="r_EM2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM2"><?= $Page->EM2->caption() ?></span></td>
        <td data-name="EM2" <?= $Page->EM2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM2">
<span<?= $Page->EM2->viewAttributes() ?>>
<?= $Page->EM2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
    <tr id="r_EM3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM3"><?= $Page->EM3->caption() ?></span></td>
        <td data-name="EM3" <?= $Page->EM3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM3">
<span<?= $Page->EM3->viewAttributes() ?>>
<?= $Page->EM3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
    <tr id="r_EM4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM4"><?= $Page->EM4->caption() ?></span></td>
        <td data-name="EM4" <?= $Page->EM4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM4">
<span<?= $Page->EM4->viewAttributes() ?>>
<?= $Page->EM4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
    <tr id="r_EM5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM5"><?= $Page->EM5->caption() ?></span></td>
        <td data-name="EM5" <?= $Page->EM5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM5">
<span<?= $Page->EM5->viewAttributes() ?>>
<?= $Page->EM5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
    <tr id="r_EM6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM6"><?= $Page->EM6->caption() ?></span></td>
        <td data-name="EM6" <?= $Page->EM6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM6">
<span<?= $Page->EM6->viewAttributes() ?>>
<?= $Page->EM6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
    <tr id="r_EM7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM7"><?= $Page->EM7->caption() ?></span></td>
        <td data-name="EM7" <?= $Page->EM7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM7">
<span<?= $Page->EM7->viewAttributes() ?>>
<?= $Page->EM7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
    <tr id="r_EM8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM8"><?= $Page->EM8->caption() ?></span></td>
        <td data-name="EM8" <?= $Page->EM8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM8">
<span<?= $Page->EM8->viewAttributes() ?>>
<?= $Page->EM8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
    <tr id="r_EM9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM9"><?= $Page->EM9->caption() ?></span></td>
        <td data-name="EM9" <?= $Page->EM9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM9">
<span<?= $Page->EM9->viewAttributes() ?>>
<?= $Page->EM9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
    <tr id="r_EM10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM10"><?= $Page->EM10->caption() ?></span></td>
        <td data-name="EM10" <?= $Page->EM10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM10">
<span<?= $Page->EM10->viewAttributes() ?>>
<?= $Page->EM10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
    <tr id="r_EM11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM11"><?= $Page->EM11->caption() ?></span></td>
        <td data-name="EM11" <?= $Page->EM11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM11">
<span<?= $Page->EM11->viewAttributes() ?>>
<?= $Page->EM11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
    <tr id="r_EM12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM12"><?= $Page->EM12->caption() ?></span></td>
        <td data-name="EM12" <?= $Page->EM12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM12">
<span<?= $Page->EM12->viewAttributes() ?>>
<?= $Page->EM12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
    <tr id="r_EM13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM13"><?= $Page->EM13->caption() ?></span></td>
        <td data-name="EM13" <?= $Page->EM13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM13">
<span<?= $Page->EM13->viewAttributes() ?>>
<?= $Page->EM13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <tr id="r_Others1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others1"><?= $Page->Others1->caption() ?></span></td>
        <td data-name="Others1" <?= $Page->Others1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <tr id="r_Others2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others2"><?= $Page->Others2->caption() ?></span></td>
        <td data-name="Others2" <?= $Page->Others2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
    <tr id="r_Others3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others3"><?= $Page->Others3->caption() ?></span></td>
        <td data-name="Others3" <?= $Page->Others3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others3">
<span<?= $Page->Others3->viewAttributes() ?>>
<?= $Page->Others3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
    <tr id="r_Others4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others4"><?= $Page->Others4->caption() ?></span></td>
        <td data-name="Others4" <?= $Page->Others4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others4">
<span<?= $Page->Others4->viewAttributes() ?>>
<?= $Page->Others4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
    <tr id="r_Others5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others5"><?= $Page->Others5->caption() ?></span></td>
        <td data-name="Others5" <?= $Page->Others5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others5">
<span<?= $Page->Others5->viewAttributes() ?>>
<?= $Page->Others5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
    <tr id="r_Others6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others6"><?= $Page->Others6->caption() ?></span></td>
        <td data-name="Others6" <?= $Page->Others6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others6">
<span<?= $Page->Others6->viewAttributes() ?>>
<?= $Page->Others6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
    <tr id="r_Others7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others7"><?= $Page->Others7->caption() ?></span></td>
        <td data-name="Others7" <?= $Page->Others7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others7">
<span<?= $Page->Others7->viewAttributes() ?>>
<?= $Page->Others7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
    <tr id="r_Others8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others8"><?= $Page->Others8->caption() ?></span></td>
        <td data-name="Others8" <?= $Page->Others8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others8">
<span<?= $Page->Others8->viewAttributes() ?>>
<?= $Page->Others8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
    <tr id="r_Others9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others9"><?= $Page->Others9->caption() ?></span></td>
        <td data-name="Others9" <?= $Page->Others9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others9">
<span<?= $Page->Others9->viewAttributes() ?>>
<?= $Page->Others9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
    <tr id="r_Others10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others10"><?= $Page->Others10->caption() ?></span></td>
        <td data-name="Others10" <?= $Page->Others10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others10">
<span<?= $Page->Others10->viewAttributes() ?>>
<?= $Page->Others10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
    <tr id="r_Others11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others11"><?= $Page->Others11->caption() ?></span></td>
        <td data-name="Others11" <?= $Page->Others11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others11">
<span<?= $Page->Others11->viewAttributes() ?>>
<?= $Page->Others11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
    <tr id="r_Others12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others12"><?= $Page->Others12->caption() ?></span></td>
        <td data-name="Others12" <?= $Page->Others12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others12">
<span<?= $Page->Others12->viewAttributes() ?>>
<?= $Page->Others12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
    <tr id="r_Others13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others13"><?= $Page->Others13->caption() ?></span></td>
        <td data-name="Others13" <?= $Page->Others13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others13">
<span<?= $Page->Others13->viewAttributes() ?>>
<?= $Page->Others13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
    <tr id="r_DR1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR1"><?= $Page->DR1->caption() ?></span></td>
        <td data-name="DR1" <?= $Page->DR1->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR1">
<span<?= $Page->DR1->viewAttributes() ?>>
<?= $Page->DR1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
    <tr id="r_DR2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR2"><?= $Page->DR2->caption() ?></span></td>
        <td data-name="DR2" <?= $Page->DR2->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR2">
<span<?= $Page->DR2->viewAttributes() ?>>
<?= $Page->DR2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
    <tr id="r_DR3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR3"><?= $Page->DR3->caption() ?></span></td>
        <td data-name="DR3" <?= $Page->DR3->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR3">
<span<?= $Page->DR3->viewAttributes() ?>>
<?= $Page->DR3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
    <tr id="r_DR4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR4"><?= $Page->DR4->caption() ?></span></td>
        <td data-name="DR4" <?= $Page->DR4->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR4">
<span<?= $Page->DR4->viewAttributes() ?>>
<?= $Page->DR4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
    <tr id="r_DR5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR5"><?= $Page->DR5->caption() ?></span></td>
        <td data-name="DR5" <?= $Page->DR5->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR5">
<span<?= $Page->DR5->viewAttributes() ?>>
<?= $Page->DR5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
    <tr id="r_DR6">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR6"><?= $Page->DR6->caption() ?></span></td>
        <td data-name="DR6" <?= $Page->DR6->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR6">
<span<?= $Page->DR6->viewAttributes() ?>>
<?= $Page->DR6->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
    <tr id="r_DR7">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR7"><?= $Page->DR7->caption() ?></span></td>
        <td data-name="DR7" <?= $Page->DR7->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR7">
<span<?= $Page->DR7->viewAttributes() ?>>
<?= $Page->DR7->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
    <tr id="r_DR8">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR8"><?= $Page->DR8->caption() ?></span></td>
        <td data-name="DR8" <?= $Page->DR8->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR8">
<span<?= $Page->DR8->viewAttributes() ?>>
<?= $Page->DR8->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
    <tr id="r_DR9">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR9"><?= $Page->DR9->caption() ?></span></td>
        <td data-name="DR9" <?= $Page->DR9->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR9">
<span<?= $Page->DR9->viewAttributes() ?>>
<?= $Page->DR9->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
    <tr id="r_DR10">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR10"><?= $Page->DR10->caption() ?></span></td>
        <td data-name="DR10" <?= $Page->DR10->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR10">
<span<?= $Page->DR10->viewAttributes() ?>>
<?= $Page->DR10->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
    <tr id="r_DR11">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR11"><?= $Page->DR11->caption() ?></span></td>
        <td data-name="DR11" <?= $Page->DR11->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR11">
<span<?= $Page->DR11->viewAttributes() ?>>
<?= $Page->DR11->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
    <tr id="r_DR12">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR12"><?= $Page->DR12->caption() ?></span></td>
        <td data-name="DR12" <?= $Page->DR12->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR12">
<span<?= $Page->DR12->viewAttributes() ?>>
<?= $Page->DR12->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
    <tr id="r_DR13">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR13"><?= $Page->DR13->caption() ?></span></td>
        <td data-name="DR13" <?= $Page->DR13->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR13">
<span<?= $Page->DR13->viewAttributes() ?>>
<?= $Page->DR13->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DOCTORRESPONSIBLE->Visible) { // DOCTORRESPONSIBLE ?>
    <tr id="r_DOCTORRESPONSIBLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DOCTORRESPONSIBLE"><?= $Page->DOCTORRESPONSIBLE->caption() ?></span></td>
        <td data-name="DOCTORRESPONSIBLE" <?= $Page->DOCTORRESPONSIBLE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DOCTORRESPONSIBLE">
<span<?= $Page->DOCTORRESPONSIBLE->viewAttributes() ?>>
<?= $Page->DOCTORRESPONSIBLE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
    <tr id="r_Convert">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Convert"><?= $Page->Convert->caption() ?></span></td>
        <td data-name="Convert" <?= $Page->Convert->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Convert">
<span<?= $Page->Convert->viewAttributes() ?>>
<?= $Page->Convert->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Consultant"><?= $Page->Consultant->caption() ?></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <tr id="r_InseminatinTechnique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></td>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <tr id="r_IndicationForART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></span></td>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <tr id="r_Hysteroscopy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?></span></td>
        <td data-name="Hysteroscopy" <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <tr id="r_EndometrialScratching">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?></span></td>
        <td data-name="EndometrialScratching" <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <tr id="r_TrialCannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></span></td>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <tr id="r_CYCLETYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?></span></td>
        <td data-name="CYCLETYPE" <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <tr id="r_HRTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?></span></td>
        <td data-name="HRTCYCLE" <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <tr id="r_OralEstrogenDosage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?></span></td>
        <td data-name="OralEstrogenDosage" <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <tr id="r_VaginalEstrogen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?></span></td>
        <td data-name="VaginalEstrogen" <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <tr id="r_GCSF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GCSF"><?= $Page->GCSF->caption() ?></span></td>
        <td data-name="GCSF" <?= $Page->GCSF->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <tr id="r_ActivatedPRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?></span></td>
        <td data-name="ActivatedPRP" <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <tr id="r_UCLcm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UCLcm"><?= $Page->UCLcm->caption() ?></span></td>
        <td data-name="UCLcm" <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
    <tr id="r_DATOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><?= $Page->DATOFEMBRYOTRANSFER->caption() ?></span></td>
        <td data-name="DATOFEMBRYOTRANSFER" <?= $Page->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?= $Page->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <tr id="r_DAYOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></span></td>
        <td data-name="DAYOFEMBRYOTRANSFER" <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <tr id="r_NOOFEMBRYOSTHAWED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></span></td>
        <td data-name="NOOFEMBRYOSTHAWED" <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <tr id="r_NOOFEMBRYOSTRANSFERRED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></span></td>
        <td data-name="NOOFEMBRYOSTRANSFERRED" <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <tr id="r_DAYOFEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?></span></td>
        <td data-name="DAYOFEMBRYOS" <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <tr id="r_CRYOPRESERVEDEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></span></td>
        <td data-name="CRYOPRESERVEDEMBRYOS" <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
    <tr id="r_ViaAdmin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaAdmin"><?= $Page->ViaAdmin->caption() ?></span></td>
        <td data-name="ViaAdmin" <?= $Page->ViaAdmin->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ViaAdmin">
<span<?= $Page->ViaAdmin->viewAttributes() ?>>
<?= $Page->ViaAdmin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
    <tr id="r_ViaStartDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaStartDateTime"><?= $Page->ViaStartDateTime->caption() ?></span></td>
        <td data-name="ViaStartDateTime" <?= $Page->ViaStartDateTime->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ViaStartDateTime">
<span<?= $Page->ViaStartDateTime->viewAttributes() ?>>
<?= $Page->ViaStartDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
    <tr id="r_ViaDose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ViaDose"><?= $Page->ViaDose->caption() ?></span></td>
        <td data-name="ViaDose" <?= $Page->ViaDose->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ViaDose">
<span<?= $Page->ViaDose->viewAttributes() ?>>
<?= $Page->ViaDose->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
    <tr id="r_AllFreeze">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_AllFreeze"><?= $Page->AllFreeze->caption() ?></span></td>
        <td data-name="AllFreeze" <?= $Page->AllFreeze->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_AllFreeze">
<span<?= $Page->AllFreeze->viewAttributes() ?>>
<?= $Page->AllFreeze->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
    <tr id="r_TreatmentCancel">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TreatmentCancel"><?= $Page->TreatmentCancel->caption() ?></span></td>
        <td data-name="TreatmentCancel" <?= $Page->TreatmentCancel->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TreatmentCancel">
<span<?= $Page->TreatmentCancel->viewAttributes() ?>>
<?= $Page->TreatmentCancel->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <tr id="r_Reason">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Reason"><?= $Page->Reason->caption() ?></span></td>
        <td data-name="Reason" <?= $Page->Reason->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Reason">
<span<?= $Page->Reason->viewAttributes() ?>>
<?= $Page->Reason->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
    <tr id="r_ProgesteroneAdmin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneAdmin"><?= $Page->ProgesteroneAdmin->caption() ?></span></td>
        <td data-name="ProgesteroneAdmin" <?= $Page->ProgesteroneAdmin->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ProgesteroneAdmin">
<span<?= $Page->ProgesteroneAdmin->viewAttributes() ?>>
<?= $Page->ProgesteroneAdmin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
    <tr id="r_ProgesteroneStart">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneStart"><?= $Page->ProgesteroneStart->caption() ?></span></td>
        <td data-name="ProgesteroneStart" <?= $Page->ProgesteroneStart->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ProgesteroneStart">
<span<?= $Page->ProgesteroneStart->viewAttributes() ?>>
<?= $Page->ProgesteroneStart->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
    <tr id="r_ProgesteroneDose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneDose"><?= $Page->ProgesteroneDose->caption() ?></span></td>
        <td data-name="ProgesteroneDose" <?= $Page->ProgesteroneDose->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ProgesteroneDose">
<span<?= $Page->ProgesteroneDose->viewAttributes() ?>>
<?= $Page->ProgesteroneDose->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
    <tr id="r_StChDate14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate14"><?= $Page->StChDate14->caption() ?></span></td>
        <td data-name="StChDate14" <?= $Page->StChDate14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate14">
<span<?= $Page->StChDate14->viewAttributes() ?>>
<?= $Page->StChDate14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
    <tr id="r_StChDate15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate15"><?= $Page->StChDate15->caption() ?></span></td>
        <td data-name="StChDate15" <?= $Page->StChDate15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate15">
<span<?= $Page->StChDate15->viewAttributes() ?>>
<?= $Page->StChDate15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
    <tr id="r_StChDate16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate16"><?= $Page->StChDate16->caption() ?></span></td>
        <td data-name="StChDate16" <?= $Page->StChDate16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate16">
<span<?= $Page->StChDate16->viewAttributes() ?>>
<?= $Page->StChDate16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
    <tr id="r_StChDate17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate17"><?= $Page->StChDate17->caption() ?></span></td>
        <td data-name="StChDate17" <?= $Page->StChDate17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate17">
<span<?= $Page->StChDate17->viewAttributes() ?>>
<?= $Page->StChDate17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
    <tr id="r_StChDate18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate18"><?= $Page->StChDate18->caption() ?></span></td>
        <td data-name="StChDate18" <?= $Page->StChDate18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate18">
<span<?= $Page->StChDate18->viewAttributes() ?>>
<?= $Page->StChDate18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
    <tr id="r_StChDate19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate19"><?= $Page->StChDate19->caption() ?></span></td>
        <td data-name="StChDate19" <?= $Page->StChDate19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate19">
<span<?= $Page->StChDate19->viewAttributes() ?>>
<?= $Page->StChDate19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
    <tr id="r_StChDate20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate20"><?= $Page->StChDate20->caption() ?></span></td>
        <td data-name="StChDate20" <?= $Page->StChDate20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate20">
<span<?= $Page->StChDate20->viewAttributes() ?>>
<?= $Page->StChDate20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
    <tr id="r_StChDate21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate21"><?= $Page->StChDate21->caption() ?></span></td>
        <td data-name="StChDate21" <?= $Page->StChDate21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate21">
<span<?= $Page->StChDate21->viewAttributes() ?>>
<?= $Page->StChDate21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
    <tr id="r_StChDate22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate22"><?= $Page->StChDate22->caption() ?></span></td>
        <td data-name="StChDate22" <?= $Page->StChDate22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate22">
<span<?= $Page->StChDate22->viewAttributes() ?>>
<?= $Page->StChDate22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
    <tr id="r_StChDate23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate23"><?= $Page->StChDate23->caption() ?></span></td>
        <td data-name="StChDate23" <?= $Page->StChDate23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate23">
<span<?= $Page->StChDate23->viewAttributes() ?>>
<?= $Page->StChDate23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
    <tr id="r_StChDate24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate24"><?= $Page->StChDate24->caption() ?></span></td>
        <td data-name="StChDate24" <?= $Page->StChDate24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate24">
<span<?= $Page->StChDate24->viewAttributes() ?>>
<?= $Page->StChDate24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
    <tr id="r_StChDate25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StChDate25"><?= $Page->StChDate25->caption() ?></span></td>
        <td data-name="StChDate25" <?= $Page->StChDate25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StChDate25">
<span<?= $Page->StChDate25->viewAttributes() ?>>
<?= $Page->StChDate25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
    <tr id="r_CycleDay14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay14"><?= $Page->CycleDay14->caption() ?></span></td>
        <td data-name="CycleDay14" <?= $Page->CycleDay14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay14">
<span<?= $Page->CycleDay14->viewAttributes() ?>>
<?= $Page->CycleDay14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
    <tr id="r_CycleDay15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay15"><?= $Page->CycleDay15->caption() ?></span></td>
        <td data-name="CycleDay15" <?= $Page->CycleDay15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay15">
<span<?= $Page->CycleDay15->viewAttributes() ?>>
<?= $Page->CycleDay15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
    <tr id="r_CycleDay16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay16"><?= $Page->CycleDay16->caption() ?></span></td>
        <td data-name="CycleDay16" <?= $Page->CycleDay16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay16">
<span<?= $Page->CycleDay16->viewAttributes() ?>>
<?= $Page->CycleDay16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
    <tr id="r_CycleDay17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay17"><?= $Page->CycleDay17->caption() ?></span></td>
        <td data-name="CycleDay17" <?= $Page->CycleDay17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay17">
<span<?= $Page->CycleDay17->viewAttributes() ?>>
<?= $Page->CycleDay17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
    <tr id="r_CycleDay18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay18"><?= $Page->CycleDay18->caption() ?></span></td>
        <td data-name="CycleDay18" <?= $Page->CycleDay18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay18">
<span<?= $Page->CycleDay18->viewAttributes() ?>>
<?= $Page->CycleDay18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
    <tr id="r_CycleDay19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay19"><?= $Page->CycleDay19->caption() ?></span></td>
        <td data-name="CycleDay19" <?= $Page->CycleDay19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay19">
<span<?= $Page->CycleDay19->viewAttributes() ?>>
<?= $Page->CycleDay19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
    <tr id="r_CycleDay20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay20"><?= $Page->CycleDay20->caption() ?></span></td>
        <td data-name="CycleDay20" <?= $Page->CycleDay20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay20">
<span<?= $Page->CycleDay20->viewAttributes() ?>>
<?= $Page->CycleDay20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
    <tr id="r_CycleDay21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay21"><?= $Page->CycleDay21->caption() ?></span></td>
        <td data-name="CycleDay21" <?= $Page->CycleDay21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay21">
<span<?= $Page->CycleDay21->viewAttributes() ?>>
<?= $Page->CycleDay21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
    <tr id="r_CycleDay22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay22"><?= $Page->CycleDay22->caption() ?></span></td>
        <td data-name="CycleDay22" <?= $Page->CycleDay22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay22">
<span<?= $Page->CycleDay22->viewAttributes() ?>>
<?= $Page->CycleDay22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
    <tr id="r_CycleDay23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay23"><?= $Page->CycleDay23->caption() ?></span></td>
        <td data-name="CycleDay23" <?= $Page->CycleDay23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay23">
<span<?= $Page->CycleDay23->viewAttributes() ?>>
<?= $Page->CycleDay23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
    <tr id="r_CycleDay24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay24"><?= $Page->CycleDay24->caption() ?></span></td>
        <td data-name="CycleDay24" <?= $Page->CycleDay24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay24">
<span<?= $Page->CycleDay24->viewAttributes() ?>>
<?= $Page->CycleDay24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
    <tr id="r_CycleDay25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_CycleDay25"><?= $Page->CycleDay25->caption() ?></span></td>
        <td data-name="CycleDay25" <?= $Page->CycleDay25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_CycleDay25">
<span<?= $Page->CycleDay25->viewAttributes() ?>>
<?= $Page->CycleDay25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
    <tr id="r_StimulationDay14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay14"><?= $Page->StimulationDay14->caption() ?></span></td>
        <td data-name="StimulationDay14" <?= $Page->StimulationDay14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay14">
<span<?= $Page->StimulationDay14->viewAttributes() ?>>
<?= $Page->StimulationDay14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
    <tr id="r_StimulationDay15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay15"><?= $Page->StimulationDay15->caption() ?></span></td>
        <td data-name="StimulationDay15" <?= $Page->StimulationDay15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay15">
<span<?= $Page->StimulationDay15->viewAttributes() ?>>
<?= $Page->StimulationDay15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
    <tr id="r_StimulationDay16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay16"><?= $Page->StimulationDay16->caption() ?></span></td>
        <td data-name="StimulationDay16" <?= $Page->StimulationDay16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay16">
<span<?= $Page->StimulationDay16->viewAttributes() ?>>
<?= $Page->StimulationDay16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
    <tr id="r_StimulationDay17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay17"><?= $Page->StimulationDay17->caption() ?></span></td>
        <td data-name="StimulationDay17" <?= $Page->StimulationDay17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay17">
<span<?= $Page->StimulationDay17->viewAttributes() ?>>
<?= $Page->StimulationDay17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
    <tr id="r_StimulationDay18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay18"><?= $Page->StimulationDay18->caption() ?></span></td>
        <td data-name="StimulationDay18" <?= $Page->StimulationDay18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay18">
<span<?= $Page->StimulationDay18->viewAttributes() ?>>
<?= $Page->StimulationDay18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
    <tr id="r_StimulationDay19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay19"><?= $Page->StimulationDay19->caption() ?></span></td>
        <td data-name="StimulationDay19" <?= $Page->StimulationDay19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay19">
<span<?= $Page->StimulationDay19->viewAttributes() ?>>
<?= $Page->StimulationDay19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
    <tr id="r_StimulationDay20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay20"><?= $Page->StimulationDay20->caption() ?></span></td>
        <td data-name="StimulationDay20" <?= $Page->StimulationDay20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay20">
<span<?= $Page->StimulationDay20->viewAttributes() ?>>
<?= $Page->StimulationDay20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
    <tr id="r_StimulationDay21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay21"><?= $Page->StimulationDay21->caption() ?></span></td>
        <td data-name="StimulationDay21" <?= $Page->StimulationDay21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay21">
<span<?= $Page->StimulationDay21->viewAttributes() ?>>
<?= $Page->StimulationDay21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
    <tr id="r_StimulationDay22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay22"><?= $Page->StimulationDay22->caption() ?></span></td>
        <td data-name="StimulationDay22" <?= $Page->StimulationDay22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay22">
<span<?= $Page->StimulationDay22->viewAttributes() ?>>
<?= $Page->StimulationDay22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
    <tr id="r_StimulationDay23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay23"><?= $Page->StimulationDay23->caption() ?></span></td>
        <td data-name="StimulationDay23" <?= $Page->StimulationDay23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay23">
<span<?= $Page->StimulationDay23->viewAttributes() ?>>
<?= $Page->StimulationDay23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
    <tr id="r_StimulationDay24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay24"><?= $Page->StimulationDay24->caption() ?></span></td>
        <td data-name="StimulationDay24" <?= $Page->StimulationDay24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay24">
<span<?= $Page->StimulationDay24->viewAttributes() ?>>
<?= $Page->StimulationDay24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
    <tr id="r_StimulationDay25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_StimulationDay25"><?= $Page->StimulationDay25->caption() ?></span></td>
        <td data-name="StimulationDay25" <?= $Page->StimulationDay25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_StimulationDay25">
<span<?= $Page->StimulationDay25->viewAttributes() ?>>
<?= $Page->StimulationDay25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
    <tr id="r_Tablet14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet14"><?= $Page->Tablet14->caption() ?></span></td>
        <td data-name="Tablet14" <?= $Page->Tablet14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet14">
<span<?= $Page->Tablet14->viewAttributes() ?>>
<?= $Page->Tablet14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
    <tr id="r_Tablet15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet15"><?= $Page->Tablet15->caption() ?></span></td>
        <td data-name="Tablet15" <?= $Page->Tablet15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet15">
<span<?= $Page->Tablet15->viewAttributes() ?>>
<?= $Page->Tablet15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
    <tr id="r_Tablet16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet16"><?= $Page->Tablet16->caption() ?></span></td>
        <td data-name="Tablet16" <?= $Page->Tablet16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet16">
<span<?= $Page->Tablet16->viewAttributes() ?>>
<?= $Page->Tablet16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
    <tr id="r_Tablet17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet17"><?= $Page->Tablet17->caption() ?></span></td>
        <td data-name="Tablet17" <?= $Page->Tablet17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet17">
<span<?= $Page->Tablet17->viewAttributes() ?>>
<?= $Page->Tablet17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
    <tr id="r_Tablet18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet18"><?= $Page->Tablet18->caption() ?></span></td>
        <td data-name="Tablet18" <?= $Page->Tablet18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet18">
<span<?= $Page->Tablet18->viewAttributes() ?>>
<?= $Page->Tablet18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
    <tr id="r_Tablet19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet19"><?= $Page->Tablet19->caption() ?></span></td>
        <td data-name="Tablet19" <?= $Page->Tablet19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet19">
<span<?= $Page->Tablet19->viewAttributes() ?>>
<?= $Page->Tablet19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
    <tr id="r_Tablet20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet20"><?= $Page->Tablet20->caption() ?></span></td>
        <td data-name="Tablet20" <?= $Page->Tablet20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet20">
<span<?= $Page->Tablet20->viewAttributes() ?>>
<?= $Page->Tablet20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
    <tr id="r_Tablet21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet21"><?= $Page->Tablet21->caption() ?></span></td>
        <td data-name="Tablet21" <?= $Page->Tablet21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet21">
<span<?= $Page->Tablet21->viewAttributes() ?>>
<?= $Page->Tablet21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
    <tr id="r_Tablet22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet22"><?= $Page->Tablet22->caption() ?></span></td>
        <td data-name="Tablet22" <?= $Page->Tablet22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet22">
<span<?= $Page->Tablet22->viewAttributes() ?>>
<?= $Page->Tablet22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
    <tr id="r_Tablet23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet23"><?= $Page->Tablet23->caption() ?></span></td>
        <td data-name="Tablet23" <?= $Page->Tablet23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet23">
<span<?= $Page->Tablet23->viewAttributes() ?>>
<?= $Page->Tablet23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
    <tr id="r_Tablet24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet24"><?= $Page->Tablet24->caption() ?></span></td>
        <td data-name="Tablet24" <?= $Page->Tablet24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet24">
<span<?= $Page->Tablet24->viewAttributes() ?>>
<?= $Page->Tablet24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
    <tr id="r_Tablet25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Tablet25"><?= $Page->Tablet25->caption() ?></span></td>
        <td data-name="Tablet25" <?= $Page->Tablet25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Tablet25">
<span<?= $Page->Tablet25->viewAttributes() ?>>
<?= $Page->Tablet25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
    <tr id="r_RFSH14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH14"><?= $Page->RFSH14->caption() ?></span></td>
        <td data-name="RFSH14" <?= $Page->RFSH14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH14">
<span<?= $Page->RFSH14->viewAttributes() ?>>
<?= $Page->RFSH14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
    <tr id="r_RFSH15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH15"><?= $Page->RFSH15->caption() ?></span></td>
        <td data-name="RFSH15" <?= $Page->RFSH15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH15">
<span<?= $Page->RFSH15->viewAttributes() ?>>
<?= $Page->RFSH15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
    <tr id="r_RFSH16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH16"><?= $Page->RFSH16->caption() ?></span></td>
        <td data-name="RFSH16" <?= $Page->RFSH16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH16">
<span<?= $Page->RFSH16->viewAttributes() ?>>
<?= $Page->RFSH16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
    <tr id="r_RFSH17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH17"><?= $Page->RFSH17->caption() ?></span></td>
        <td data-name="RFSH17" <?= $Page->RFSH17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH17">
<span<?= $Page->RFSH17->viewAttributes() ?>>
<?= $Page->RFSH17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
    <tr id="r_RFSH18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH18"><?= $Page->RFSH18->caption() ?></span></td>
        <td data-name="RFSH18" <?= $Page->RFSH18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH18">
<span<?= $Page->RFSH18->viewAttributes() ?>>
<?= $Page->RFSH18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
    <tr id="r_RFSH19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH19"><?= $Page->RFSH19->caption() ?></span></td>
        <td data-name="RFSH19" <?= $Page->RFSH19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH19">
<span<?= $Page->RFSH19->viewAttributes() ?>>
<?= $Page->RFSH19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
    <tr id="r_RFSH20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH20"><?= $Page->RFSH20->caption() ?></span></td>
        <td data-name="RFSH20" <?= $Page->RFSH20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH20">
<span<?= $Page->RFSH20->viewAttributes() ?>>
<?= $Page->RFSH20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
    <tr id="r_RFSH21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH21"><?= $Page->RFSH21->caption() ?></span></td>
        <td data-name="RFSH21" <?= $Page->RFSH21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH21">
<span<?= $Page->RFSH21->viewAttributes() ?>>
<?= $Page->RFSH21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
    <tr id="r_RFSH22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH22"><?= $Page->RFSH22->caption() ?></span></td>
        <td data-name="RFSH22" <?= $Page->RFSH22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH22">
<span<?= $Page->RFSH22->viewAttributes() ?>>
<?= $Page->RFSH22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
    <tr id="r_RFSH23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH23"><?= $Page->RFSH23->caption() ?></span></td>
        <td data-name="RFSH23" <?= $Page->RFSH23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH23">
<span<?= $Page->RFSH23->viewAttributes() ?>>
<?= $Page->RFSH23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
    <tr id="r_RFSH24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH24"><?= $Page->RFSH24->caption() ?></span></td>
        <td data-name="RFSH24" <?= $Page->RFSH24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH24">
<span<?= $Page->RFSH24->viewAttributes() ?>>
<?= $Page->RFSH24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
    <tr id="r_RFSH25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_RFSH25"><?= $Page->RFSH25->caption() ?></span></td>
        <td data-name="RFSH25" <?= $Page->RFSH25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_RFSH25">
<span<?= $Page->RFSH25->viewAttributes() ?>>
<?= $Page->RFSH25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
    <tr id="r_HMG14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG14"><?= $Page->HMG14->caption() ?></span></td>
        <td data-name="HMG14" <?= $Page->HMG14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG14">
<span<?= $Page->HMG14->viewAttributes() ?>>
<?= $Page->HMG14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
    <tr id="r_HMG15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG15"><?= $Page->HMG15->caption() ?></span></td>
        <td data-name="HMG15" <?= $Page->HMG15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG15">
<span<?= $Page->HMG15->viewAttributes() ?>>
<?= $Page->HMG15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
    <tr id="r_HMG16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG16"><?= $Page->HMG16->caption() ?></span></td>
        <td data-name="HMG16" <?= $Page->HMG16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG16">
<span<?= $Page->HMG16->viewAttributes() ?>>
<?= $Page->HMG16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
    <tr id="r_HMG17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG17"><?= $Page->HMG17->caption() ?></span></td>
        <td data-name="HMG17" <?= $Page->HMG17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG17">
<span<?= $Page->HMG17->viewAttributes() ?>>
<?= $Page->HMG17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
    <tr id="r_HMG18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG18"><?= $Page->HMG18->caption() ?></span></td>
        <td data-name="HMG18" <?= $Page->HMG18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG18">
<span<?= $Page->HMG18->viewAttributes() ?>>
<?= $Page->HMG18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
    <tr id="r_HMG19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG19"><?= $Page->HMG19->caption() ?></span></td>
        <td data-name="HMG19" <?= $Page->HMG19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG19">
<span<?= $Page->HMG19->viewAttributes() ?>>
<?= $Page->HMG19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
    <tr id="r_HMG20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG20"><?= $Page->HMG20->caption() ?></span></td>
        <td data-name="HMG20" <?= $Page->HMG20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG20">
<span<?= $Page->HMG20->viewAttributes() ?>>
<?= $Page->HMG20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
    <tr id="r_HMG21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG21"><?= $Page->HMG21->caption() ?></span></td>
        <td data-name="HMG21" <?= $Page->HMG21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG21">
<span<?= $Page->HMG21->viewAttributes() ?>>
<?= $Page->HMG21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
    <tr id="r_HMG22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG22"><?= $Page->HMG22->caption() ?></span></td>
        <td data-name="HMG22" <?= $Page->HMG22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG22">
<span<?= $Page->HMG22->viewAttributes() ?>>
<?= $Page->HMG22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
    <tr id="r_HMG23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG23"><?= $Page->HMG23->caption() ?></span></td>
        <td data-name="HMG23" <?= $Page->HMG23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG23">
<span<?= $Page->HMG23->viewAttributes() ?>>
<?= $Page->HMG23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
    <tr id="r_HMG24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG24"><?= $Page->HMG24->caption() ?></span></td>
        <td data-name="HMG24" <?= $Page->HMG24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG24">
<span<?= $Page->HMG24->viewAttributes() ?>>
<?= $Page->HMG24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
    <tr id="r_HMG25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HMG25"><?= $Page->HMG25->caption() ?></span></td>
        <td data-name="HMG25" <?= $Page->HMG25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HMG25">
<span<?= $Page->HMG25->viewAttributes() ?>>
<?= $Page->HMG25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
    <tr id="r_GnRH14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH14"><?= $Page->GnRH14->caption() ?></span></td>
        <td data-name="GnRH14" <?= $Page->GnRH14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH14">
<span<?= $Page->GnRH14->viewAttributes() ?>>
<?= $Page->GnRH14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
    <tr id="r_GnRH15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH15"><?= $Page->GnRH15->caption() ?></span></td>
        <td data-name="GnRH15" <?= $Page->GnRH15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH15">
<span<?= $Page->GnRH15->viewAttributes() ?>>
<?= $Page->GnRH15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
    <tr id="r_GnRH16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH16"><?= $Page->GnRH16->caption() ?></span></td>
        <td data-name="GnRH16" <?= $Page->GnRH16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH16">
<span<?= $Page->GnRH16->viewAttributes() ?>>
<?= $Page->GnRH16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
    <tr id="r_GnRH17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH17"><?= $Page->GnRH17->caption() ?></span></td>
        <td data-name="GnRH17" <?= $Page->GnRH17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH17">
<span<?= $Page->GnRH17->viewAttributes() ?>>
<?= $Page->GnRH17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
    <tr id="r_GnRH18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH18"><?= $Page->GnRH18->caption() ?></span></td>
        <td data-name="GnRH18" <?= $Page->GnRH18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH18">
<span<?= $Page->GnRH18->viewAttributes() ?>>
<?= $Page->GnRH18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
    <tr id="r_GnRH19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH19"><?= $Page->GnRH19->caption() ?></span></td>
        <td data-name="GnRH19" <?= $Page->GnRH19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH19">
<span<?= $Page->GnRH19->viewAttributes() ?>>
<?= $Page->GnRH19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
    <tr id="r_GnRH20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH20"><?= $Page->GnRH20->caption() ?></span></td>
        <td data-name="GnRH20" <?= $Page->GnRH20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH20">
<span<?= $Page->GnRH20->viewAttributes() ?>>
<?= $Page->GnRH20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
    <tr id="r_GnRH21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH21"><?= $Page->GnRH21->caption() ?></span></td>
        <td data-name="GnRH21" <?= $Page->GnRH21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH21">
<span<?= $Page->GnRH21->viewAttributes() ?>>
<?= $Page->GnRH21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
    <tr id="r_GnRH22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH22"><?= $Page->GnRH22->caption() ?></span></td>
        <td data-name="GnRH22" <?= $Page->GnRH22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH22">
<span<?= $Page->GnRH22->viewAttributes() ?>>
<?= $Page->GnRH22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
    <tr id="r_GnRH23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH23"><?= $Page->GnRH23->caption() ?></span></td>
        <td data-name="GnRH23" <?= $Page->GnRH23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH23">
<span<?= $Page->GnRH23->viewAttributes() ?>>
<?= $Page->GnRH23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
    <tr id="r_GnRH24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH24"><?= $Page->GnRH24->caption() ?></span></td>
        <td data-name="GnRH24" <?= $Page->GnRH24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH24">
<span<?= $Page->GnRH24->viewAttributes() ?>>
<?= $Page->GnRH24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
    <tr id="r_GnRH25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_GnRH25"><?= $Page->GnRH25->caption() ?></span></td>
        <td data-name="GnRH25" <?= $Page->GnRH25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_GnRH25">
<span<?= $Page->GnRH25->viewAttributes() ?>>
<?= $Page->GnRH25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
    <tr id="r_P414">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P414"><?= $Page->P414->caption() ?></span></td>
        <td data-name="P414" <?= $Page->P414->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P414">
<span<?= $Page->P414->viewAttributes() ?>>
<?= $Page->P414->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
    <tr id="r_P415">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P415"><?= $Page->P415->caption() ?></span></td>
        <td data-name="P415" <?= $Page->P415->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P415">
<span<?= $Page->P415->viewAttributes() ?>>
<?= $Page->P415->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
    <tr id="r_P416">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P416"><?= $Page->P416->caption() ?></span></td>
        <td data-name="P416" <?= $Page->P416->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P416">
<span<?= $Page->P416->viewAttributes() ?>>
<?= $Page->P416->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
    <tr id="r_P417">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P417"><?= $Page->P417->caption() ?></span></td>
        <td data-name="P417" <?= $Page->P417->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P417">
<span<?= $Page->P417->viewAttributes() ?>>
<?= $Page->P417->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
    <tr id="r_P418">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P418"><?= $Page->P418->caption() ?></span></td>
        <td data-name="P418" <?= $Page->P418->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P418">
<span<?= $Page->P418->viewAttributes() ?>>
<?= $Page->P418->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
    <tr id="r_P419">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P419"><?= $Page->P419->caption() ?></span></td>
        <td data-name="P419" <?= $Page->P419->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P419">
<span<?= $Page->P419->viewAttributes() ?>>
<?= $Page->P419->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
    <tr id="r_P420">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P420"><?= $Page->P420->caption() ?></span></td>
        <td data-name="P420" <?= $Page->P420->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P420">
<span<?= $Page->P420->viewAttributes() ?>>
<?= $Page->P420->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
    <tr id="r_P421">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P421"><?= $Page->P421->caption() ?></span></td>
        <td data-name="P421" <?= $Page->P421->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P421">
<span<?= $Page->P421->viewAttributes() ?>>
<?= $Page->P421->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
    <tr id="r_P422">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P422"><?= $Page->P422->caption() ?></span></td>
        <td data-name="P422" <?= $Page->P422->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P422">
<span<?= $Page->P422->viewAttributes() ?>>
<?= $Page->P422->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
    <tr id="r_P423">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P423"><?= $Page->P423->caption() ?></span></td>
        <td data-name="P423" <?= $Page->P423->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P423">
<span<?= $Page->P423->viewAttributes() ?>>
<?= $Page->P423->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
    <tr id="r_P424">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P424"><?= $Page->P424->caption() ?></span></td>
        <td data-name="P424" <?= $Page->P424->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P424">
<span<?= $Page->P424->viewAttributes() ?>>
<?= $Page->P424->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
    <tr id="r_P425">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_P425"><?= $Page->P425->caption() ?></span></td>
        <td data-name="P425" <?= $Page->P425->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_P425">
<span<?= $Page->P425->viewAttributes() ?>>
<?= $Page->P425->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
    <tr id="r_USGRt14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt14"><?= $Page->USGRt14->caption() ?></span></td>
        <td data-name="USGRt14" <?= $Page->USGRt14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt14">
<span<?= $Page->USGRt14->viewAttributes() ?>>
<?= $Page->USGRt14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
    <tr id="r_USGRt15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt15"><?= $Page->USGRt15->caption() ?></span></td>
        <td data-name="USGRt15" <?= $Page->USGRt15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt15">
<span<?= $Page->USGRt15->viewAttributes() ?>>
<?= $Page->USGRt15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
    <tr id="r_USGRt16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt16"><?= $Page->USGRt16->caption() ?></span></td>
        <td data-name="USGRt16" <?= $Page->USGRt16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt16">
<span<?= $Page->USGRt16->viewAttributes() ?>>
<?= $Page->USGRt16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
    <tr id="r_USGRt17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt17"><?= $Page->USGRt17->caption() ?></span></td>
        <td data-name="USGRt17" <?= $Page->USGRt17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt17">
<span<?= $Page->USGRt17->viewAttributes() ?>>
<?= $Page->USGRt17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
    <tr id="r_USGRt18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt18"><?= $Page->USGRt18->caption() ?></span></td>
        <td data-name="USGRt18" <?= $Page->USGRt18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt18">
<span<?= $Page->USGRt18->viewAttributes() ?>>
<?= $Page->USGRt18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
    <tr id="r_USGRt19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt19"><?= $Page->USGRt19->caption() ?></span></td>
        <td data-name="USGRt19" <?= $Page->USGRt19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt19">
<span<?= $Page->USGRt19->viewAttributes() ?>>
<?= $Page->USGRt19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
    <tr id="r_USGRt20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt20"><?= $Page->USGRt20->caption() ?></span></td>
        <td data-name="USGRt20" <?= $Page->USGRt20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt20">
<span<?= $Page->USGRt20->viewAttributes() ?>>
<?= $Page->USGRt20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
    <tr id="r_USGRt21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt21"><?= $Page->USGRt21->caption() ?></span></td>
        <td data-name="USGRt21" <?= $Page->USGRt21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt21">
<span<?= $Page->USGRt21->viewAttributes() ?>>
<?= $Page->USGRt21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
    <tr id="r_USGRt22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt22"><?= $Page->USGRt22->caption() ?></span></td>
        <td data-name="USGRt22" <?= $Page->USGRt22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt22">
<span<?= $Page->USGRt22->viewAttributes() ?>>
<?= $Page->USGRt22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
    <tr id="r_USGRt23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt23"><?= $Page->USGRt23->caption() ?></span></td>
        <td data-name="USGRt23" <?= $Page->USGRt23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt23">
<span<?= $Page->USGRt23->viewAttributes() ?>>
<?= $Page->USGRt23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
    <tr id="r_USGRt24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt24"><?= $Page->USGRt24->caption() ?></span></td>
        <td data-name="USGRt24" <?= $Page->USGRt24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt24">
<span<?= $Page->USGRt24->viewAttributes() ?>>
<?= $Page->USGRt24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
    <tr id="r_USGRt25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGRt25"><?= $Page->USGRt25->caption() ?></span></td>
        <td data-name="USGRt25" <?= $Page->USGRt25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGRt25">
<span<?= $Page->USGRt25->viewAttributes() ?>>
<?= $Page->USGRt25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
    <tr id="r_USGLt14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt14"><?= $Page->USGLt14->caption() ?></span></td>
        <td data-name="USGLt14" <?= $Page->USGLt14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt14">
<span<?= $Page->USGLt14->viewAttributes() ?>>
<?= $Page->USGLt14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
    <tr id="r_USGLt15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt15"><?= $Page->USGLt15->caption() ?></span></td>
        <td data-name="USGLt15" <?= $Page->USGLt15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt15">
<span<?= $Page->USGLt15->viewAttributes() ?>>
<?= $Page->USGLt15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
    <tr id="r_USGLt16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt16"><?= $Page->USGLt16->caption() ?></span></td>
        <td data-name="USGLt16" <?= $Page->USGLt16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt16">
<span<?= $Page->USGLt16->viewAttributes() ?>>
<?= $Page->USGLt16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
    <tr id="r_USGLt17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt17"><?= $Page->USGLt17->caption() ?></span></td>
        <td data-name="USGLt17" <?= $Page->USGLt17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt17">
<span<?= $Page->USGLt17->viewAttributes() ?>>
<?= $Page->USGLt17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
    <tr id="r_USGLt18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt18"><?= $Page->USGLt18->caption() ?></span></td>
        <td data-name="USGLt18" <?= $Page->USGLt18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt18">
<span<?= $Page->USGLt18->viewAttributes() ?>>
<?= $Page->USGLt18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
    <tr id="r_USGLt19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt19"><?= $Page->USGLt19->caption() ?></span></td>
        <td data-name="USGLt19" <?= $Page->USGLt19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt19">
<span<?= $Page->USGLt19->viewAttributes() ?>>
<?= $Page->USGLt19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
    <tr id="r_USGLt20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt20"><?= $Page->USGLt20->caption() ?></span></td>
        <td data-name="USGLt20" <?= $Page->USGLt20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt20">
<span<?= $Page->USGLt20->viewAttributes() ?>>
<?= $Page->USGLt20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
    <tr id="r_USGLt21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt21"><?= $Page->USGLt21->caption() ?></span></td>
        <td data-name="USGLt21" <?= $Page->USGLt21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt21">
<span<?= $Page->USGLt21->viewAttributes() ?>>
<?= $Page->USGLt21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
    <tr id="r_USGLt22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt22"><?= $Page->USGLt22->caption() ?></span></td>
        <td data-name="USGLt22" <?= $Page->USGLt22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt22">
<span<?= $Page->USGLt22->viewAttributes() ?>>
<?= $Page->USGLt22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
    <tr id="r_USGLt23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt23"><?= $Page->USGLt23->caption() ?></span></td>
        <td data-name="USGLt23" <?= $Page->USGLt23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt23">
<span<?= $Page->USGLt23->viewAttributes() ?>>
<?= $Page->USGLt23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
    <tr id="r_USGLt24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt24"><?= $Page->USGLt24->caption() ?></span></td>
        <td data-name="USGLt24" <?= $Page->USGLt24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt24">
<span<?= $Page->USGLt24->viewAttributes() ?>>
<?= $Page->USGLt24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
    <tr id="r_USGLt25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_USGLt25"><?= $Page->USGLt25->caption() ?></span></td>
        <td data-name="USGLt25" <?= $Page->USGLt25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_USGLt25">
<span<?= $Page->USGLt25->viewAttributes() ?>>
<?= $Page->USGLt25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
    <tr id="r_EM14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM14"><?= $Page->EM14->caption() ?></span></td>
        <td data-name="EM14" <?= $Page->EM14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM14">
<span<?= $Page->EM14->viewAttributes() ?>>
<?= $Page->EM14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
    <tr id="r_EM15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM15"><?= $Page->EM15->caption() ?></span></td>
        <td data-name="EM15" <?= $Page->EM15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM15">
<span<?= $Page->EM15->viewAttributes() ?>>
<?= $Page->EM15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
    <tr id="r_EM16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM16"><?= $Page->EM16->caption() ?></span></td>
        <td data-name="EM16" <?= $Page->EM16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM16">
<span<?= $Page->EM16->viewAttributes() ?>>
<?= $Page->EM16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
    <tr id="r_EM17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM17"><?= $Page->EM17->caption() ?></span></td>
        <td data-name="EM17" <?= $Page->EM17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM17">
<span<?= $Page->EM17->viewAttributes() ?>>
<?= $Page->EM17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
    <tr id="r_EM18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM18"><?= $Page->EM18->caption() ?></span></td>
        <td data-name="EM18" <?= $Page->EM18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM18">
<span<?= $Page->EM18->viewAttributes() ?>>
<?= $Page->EM18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
    <tr id="r_EM19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM19"><?= $Page->EM19->caption() ?></span></td>
        <td data-name="EM19" <?= $Page->EM19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM19">
<span<?= $Page->EM19->viewAttributes() ?>>
<?= $Page->EM19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
    <tr id="r_EM20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM20"><?= $Page->EM20->caption() ?></span></td>
        <td data-name="EM20" <?= $Page->EM20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM20">
<span<?= $Page->EM20->viewAttributes() ?>>
<?= $Page->EM20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
    <tr id="r_EM21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM21"><?= $Page->EM21->caption() ?></span></td>
        <td data-name="EM21" <?= $Page->EM21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM21">
<span<?= $Page->EM21->viewAttributes() ?>>
<?= $Page->EM21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
    <tr id="r_EM22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM22"><?= $Page->EM22->caption() ?></span></td>
        <td data-name="EM22" <?= $Page->EM22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM22">
<span<?= $Page->EM22->viewAttributes() ?>>
<?= $Page->EM22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
    <tr id="r_EM23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM23"><?= $Page->EM23->caption() ?></span></td>
        <td data-name="EM23" <?= $Page->EM23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM23">
<span<?= $Page->EM23->viewAttributes() ?>>
<?= $Page->EM23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
    <tr id="r_EM24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM24"><?= $Page->EM24->caption() ?></span></td>
        <td data-name="EM24" <?= $Page->EM24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM24">
<span<?= $Page->EM24->viewAttributes() ?>>
<?= $Page->EM24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
    <tr id="r_EM25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EM25"><?= $Page->EM25->caption() ?></span></td>
        <td data-name="EM25" <?= $Page->EM25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EM25">
<span<?= $Page->EM25->viewAttributes() ?>>
<?= $Page->EM25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
    <tr id="r_Others14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others14"><?= $Page->Others14->caption() ?></span></td>
        <td data-name="Others14" <?= $Page->Others14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others14">
<span<?= $Page->Others14->viewAttributes() ?>>
<?= $Page->Others14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
    <tr id="r_Others15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others15"><?= $Page->Others15->caption() ?></span></td>
        <td data-name="Others15" <?= $Page->Others15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others15">
<span<?= $Page->Others15->viewAttributes() ?>>
<?= $Page->Others15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
    <tr id="r_Others16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others16"><?= $Page->Others16->caption() ?></span></td>
        <td data-name="Others16" <?= $Page->Others16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others16">
<span<?= $Page->Others16->viewAttributes() ?>>
<?= $Page->Others16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
    <tr id="r_Others17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others17"><?= $Page->Others17->caption() ?></span></td>
        <td data-name="Others17" <?= $Page->Others17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others17">
<span<?= $Page->Others17->viewAttributes() ?>>
<?= $Page->Others17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
    <tr id="r_Others18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others18"><?= $Page->Others18->caption() ?></span></td>
        <td data-name="Others18" <?= $Page->Others18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others18">
<span<?= $Page->Others18->viewAttributes() ?>>
<?= $Page->Others18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
    <tr id="r_Others19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others19"><?= $Page->Others19->caption() ?></span></td>
        <td data-name="Others19" <?= $Page->Others19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others19">
<span<?= $Page->Others19->viewAttributes() ?>>
<?= $Page->Others19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
    <tr id="r_Others20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others20"><?= $Page->Others20->caption() ?></span></td>
        <td data-name="Others20" <?= $Page->Others20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others20">
<span<?= $Page->Others20->viewAttributes() ?>>
<?= $Page->Others20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
    <tr id="r_Others21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others21"><?= $Page->Others21->caption() ?></span></td>
        <td data-name="Others21" <?= $Page->Others21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others21">
<span<?= $Page->Others21->viewAttributes() ?>>
<?= $Page->Others21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
    <tr id="r_Others22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others22"><?= $Page->Others22->caption() ?></span></td>
        <td data-name="Others22" <?= $Page->Others22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others22">
<span<?= $Page->Others22->viewAttributes() ?>>
<?= $Page->Others22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
    <tr id="r_Others23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others23"><?= $Page->Others23->caption() ?></span></td>
        <td data-name="Others23" <?= $Page->Others23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others23">
<span<?= $Page->Others23->viewAttributes() ?>>
<?= $Page->Others23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
    <tr id="r_Others24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others24"><?= $Page->Others24->caption() ?></span></td>
        <td data-name="Others24" <?= $Page->Others24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others24">
<span<?= $Page->Others24->viewAttributes() ?>>
<?= $Page->Others24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
    <tr id="r_Others25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_Others25"><?= $Page->Others25->caption() ?></span></td>
        <td data-name="Others25" <?= $Page->Others25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_Others25">
<span<?= $Page->Others25->viewAttributes() ?>>
<?= $Page->Others25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
    <tr id="r_DR14">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR14"><?= $Page->DR14->caption() ?></span></td>
        <td data-name="DR14" <?= $Page->DR14->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR14">
<span<?= $Page->DR14->viewAttributes() ?>>
<?= $Page->DR14->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
    <tr id="r_DR15">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR15"><?= $Page->DR15->caption() ?></span></td>
        <td data-name="DR15" <?= $Page->DR15->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR15">
<span<?= $Page->DR15->viewAttributes() ?>>
<?= $Page->DR15->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
    <tr id="r_DR16">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR16"><?= $Page->DR16->caption() ?></span></td>
        <td data-name="DR16" <?= $Page->DR16->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR16">
<span<?= $Page->DR16->viewAttributes() ?>>
<?= $Page->DR16->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
    <tr id="r_DR17">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR17"><?= $Page->DR17->caption() ?></span></td>
        <td data-name="DR17" <?= $Page->DR17->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR17">
<span<?= $Page->DR17->viewAttributes() ?>>
<?= $Page->DR17->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
    <tr id="r_DR18">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR18"><?= $Page->DR18->caption() ?></span></td>
        <td data-name="DR18" <?= $Page->DR18->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR18">
<span<?= $Page->DR18->viewAttributes() ?>>
<?= $Page->DR18->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
    <tr id="r_DR19">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR19"><?= $Page->DR19->caption() ?></span></td>
        <td data-name="DR19" <?= $Page->DR19->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR19">
<span<?= $Page->DR19->viewAttributes() ?>>
<?= $Page->DR19->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
    <tr id="r_DR20">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR20"><?= $Page->DR20->caption() ?></span></td>
        <td data-name="DR20" <?= $Page->DR20->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR20">
<span<?= $Page->DR20->viewAttributes() ?>>
<?= $Page->DR20->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
    <tr id="r_DR21">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR21"><?= $Page->DR21->caption() ?></span></td>
        <td data-name="DR21" <?= $Page->DR21->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR21">
<span<?= $Page->DR21->viewAttributes() ?>>
<?= $Page->DR21->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
    <tr id="r_DR22">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR22"><?= $Page->DR22->caption() ?></span></td>
        <td data-name="DR22" <?= $Page->DR22->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR22">
<span<?= $Page->DR22->viewAttributes() ?>>
<?= $Page->DR22->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
    <tr id="r_DR23">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR23"><?= $Page->DR23->caption() ?></span></td>
        <td data-name="DR23" <?= $Page->DR23->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR23">
<span<?= $Page->DR23->viewAttributes() ?>>
<?= $Page->DR23->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
    <tr id="r_DR24">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR24"><?= $Page->DR24->caption() ?></span></td>
        <td data-name="DR24" <?= $Page->DR24->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR24">
<span<?= $Page->DR24->viewAttributes() ?>>
<?= $Page->DR24->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
    <tr id="r_DR25">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DR25"><?= $Page->DR25->caption() ?></span></td>
        <td data-name="DR25" <?= $Page->DR25->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DR25">
<span<?= $Page->DR25->viewAttributes() ?>>
<?= $Page->DR25->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
    <tr id="r_E214">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E214"><?= $Page->E214->caption() ?></span></td>
        <td data-name="E214" <?= $Page->E214->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E214">
<span<?= $Page->E214->viewAttributes() ?>>
<?= $Page->E214->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
    <tr id="r_E215">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E215"><?= $Page->E215->caption() ?></span></td>
        <td data-name="E215" <?= $Page->E215->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E215">
<span<?= $Page->E215->viewAttributes() ?>>
<?= $Page->E215->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
    <tr id="r_E216">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E216"><?= $Page->E216->caption() ?></span></td>
        <td data-name="E216" <?= $Page->E216->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E216">
<span<?= $Page->E216->viewAttributes() ?>>
<?= $Page->E216->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
    <tr id="r_E217">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E217"><?= $Page->E217->caption() ?></span></td>
        <td data-name="E217" <?= $Page->E217->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E217">
<span<?= $Page->E217->viewAttributes() ?>>
<?= $Page->E217->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
    <tr id="r_E218">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E218"><?= $Page->E218->caption() ?></span></td>
        <td data-name="E218" <?= $Page->E218->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E218">
<span<?= $Page->E218->viewAttributes() ?>>
<?= $Page->E218->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
    <tr id="r_E219">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E219"><?= $Page->E219->caption() ?></span></td>
        <td data-name="E219" <?= $Page->E219->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E219">
<span<?= $Page->E219->viewAttributes() ?>>
<?= $Page->E219->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
    <tr id="r_E220">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E220"><?= $Page->E220->caption() ?></span></td>
        <td data-name="E220" <?= $Page->E220->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E220">
<span<?= $Page->E220->viewAttributes() ?>>
<?= $Page->E220->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
    <tr id="r_E221">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E221"><?= $Page->E221->caption() ?></span></td>
        <td data-name="E221" <?= $Page->E221->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E221">
<span<?= $Page->E221->viewAttributes() ?>>
<?= $Page->E221->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
    <tr id="r_E222">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E222"><?= $Page->E222->caption() ?></span></td>
        <td data-name="E222" <?= $Page->E222->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E222">
<span<?= $Page->E222->viewAttributes() ?>>
<?= $Page->E222->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
    <tr id="r_E223">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E223"><?= $Page->E223->caption() ?></span></td>
        <td data-name="E223" <?= $Page->E223->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E223">
<span<?= $Page->E223->viewAttributes() ?>>
<?= $Page->E223->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
    <tr id="r_E224">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E224"><?= $Page->E224->caption() ?></span></td>
        <td data-name="E224" <?= $Page->E224->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E224">
<span<?= $Page->E224->viewAttributes() ?>>
<?= $Page->E224->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
    <tr id="r_E225">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_E225"><?= $Page->E225->caption() ?></span></td>
        <td data-name="E225" <?= $Page->E225->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_E225">
<span<?= $Page->E225->viewAttributes() ?>>
<?= $Page->E225->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
    <tr id="r_EEETTTDTE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EEETTTDTE"><?= $Page->EEETTTDTE->caption() ?></span></td>
        <td data-name="EEETTTDTE" <?= $Page->EEETTTDTE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EEETTTDTE">
<span<?= $Page->EEETTTDTE->viewAttributes() ?>>
<?= $Page->EEETTTDTE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
    <tr id="r_bhcgdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_bhcgdate"><?= $Page->bhcgdate->caption() ?></span></td>
        <td data-name="bhcgdate" <?= $Page->bhcgdate->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_bhcgdate">
<span<?= $Page->bhcgdate->viewAttributes() ?>>
<?= $Page->bhcgdate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
    <tr id="r_TUBAL_PATENCY">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TUBAL_PATENCY"><?= $Page->TUBAL_PATENCY->caption() ?></span></td>
        <td data-name="TUBAL_PATENCY" <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TUBAL_PATENCY">
<span<?= $Page->TUBAL_PATENCY->viewAttributes() ?>>
<?= $Page->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
    <tr id="r_HSG">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_HSG"><?= $Page->HSG->caption() ?></span></td>
        <td data-name="HSG" <?= $Page->HSG->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_HSG">
<span<?= $Page->HSG->viewAttributes() ?>>
<?= $Page->HSG->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
    <tr id="r_DHL">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_DHL"><?= $Page->DHL->caption() ?></span></td>
        <td data-name="DHL" <?= $Page->DHL->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_DHL">
<span<?= $Page->DHL->viewAttributes() ?>>
<?= $Page->DHL->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
    <tr id="r_UTERINE_PROBLEMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS"><?= $Page->UTERINE_PROBLEMS->caption() ?></span></td>
        <td data-name="UTERINE_PROBLEMS" <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?= $Page->UTERINE_PROBLEMS->viewAttributes() ?>>
<?= $Page->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
    <tr id="r_W_COMORBIDS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_W_COMORBIDS"><?= $Page->W_COMORBIDS->caption() ?></span></td>
        <td data-name="W_COMORBIDS" <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_W_COMORBIDS">
<span<?= $Page->W_COMORBIDS->viewAttributes() ?>>
<?= $Page->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
    <tr id="r_H_COMORBIDS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_H_COMORBIDS"><?= $Page->H_COMORBIDS->caption() ?></span></td>
        <td data-name="H_COMORBIDS" <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_H_COMORBIDS">
<span<?= $Page->H_COMORBIDS->viewAttributes() ?>>
<?= $Page->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
    <tr id="r_SEXUAL_DYSFUNCTION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?></span></td>
        <td data-name="SEXUAL_DYSFUNCTION" <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?= $Page->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?= $Page->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
    <tr id="r_TABLETS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_TABLETS"><?= $Page->TABLETS->caption() ?></span></td>
        <td data-name="TABLETS" <?= $Page->TABLETS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_TABLETS">
<span<?= $Page->TABLETS->viewAttributes() ?>>
<?= $Page->TABLETS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
    <tr id="r_FOLLICLE_STATUS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_FOLLICLE_STATUS"><?= $Page->FOLLICLE_STATUS->caption() ?></span></td>
        <td data-name="FOLLICLE_STATUS" <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?= $Page->FOLLICLE_STATUS->viewAttributes() ?>>
<?= $Page->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
    <tr id="r_NUMBER_OF_IUI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_NUMBER_OF_IUI"><?= $Page->NUMBER_OF_IUI->caption() ?></span></td>
        <td data-name="NUMBER_OF_IUI" <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?= $Page->NUMBER_OF_IUI->viewAttributes() ?>>
<?= $Page->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <tr id="r_PROCEDURE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_PROCEDURE"><?= $Page->PROCEDURE->caption() ?></span></td>
        <td data-name="PROCEDURE" <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
    <tr id="r_LUTEAL_SUPPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT"><?= $Page->LUTEAL_SUPPORT->caption() ?></span></td>
        <td data-name="LUTEAL_SUPPORT" <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?= $Page->LUTEAL_SUPPORT->viewAttributes() ?>>
<?= $Page->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
    <tr id="r_SPECIFIC_MATERNAL_PROBLEMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span></td>
        <td data-name="SPECIFIC_MATERNAL_PROBLEMS" <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
    <tr id="r_ONGOING_PREG">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_ONGOING_PREG"><?= $Page->ONGOING_PREG->caption() ?></span></td>
        <td data-name="ONGOING_PREG" <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_ONGOING_PREG">
<span<?= $Page->ONGOING_PREG->viewAttributes() ?>>
<?= $Page->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
    <tr id="r_EDD_Date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_chart_EDD_Date"><?= $Page->EDD_Date->caption() ?></span></td>
        <td data-name="EDD_Date" <?= $Page->EDD_Date->cellAttributes() ?>>
<span id="el_ivf_stimulation_chart_EDD_Date">
<span<?= $Page->EDD_Date->viewAttributes() ?>>
<?= $Page->EDD_Date->getViewValue() ?></span>
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
