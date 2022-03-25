<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfStimulationChartDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_stimulation_chartdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_stimulation_chartdelete = currentForm = new ew.Form("fivf_stimulation_chartdelete", "delete");
    loadjs.done("fivf_stimulation_chartdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.ivf_stimulation_chart) ew.vars.tables.ivf_stimulation_chart = <?= JsonEncode(GetClientVar("tables", "ivf_stimulation_chart")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_stimulation_chartdelete" id="fivf_stimulation_chartdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_chart">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th class="<?= $Page->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
        <th class="<?= $Page->FemaleFactor->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor"><?= $Page->FemaleFactor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
        <th class="<?= $Page->MaleFactor->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor"><?= $Page->MaleFactor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
        <th class="<?= $Page->Protocol->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol"><?= $Page->Protocol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
        <th class="<?= $Page->SemenFrozen->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen"><?= $Page->SemenFrozen->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
        <th class="<?= $Page->A4ICSICycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle"><?= $Page->A4ICSICycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
        <th class="<?= $Page->TotalICSICycle->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle"><?= $Page->TotalICSICycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
        <th class="<?= $Page->TypeOfInfertility->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility"><?= $Page->TypeOfInfertility->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th class="<?= $Page->Duration->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration"><?= $Page->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th class="<?= $Page->LMP->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP"><?= $Page->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
        <th class="<?= $Page->RelevantHistory->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory"><?= $Page->RelevantHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
        <th class="<?= $Page->IUICycles->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles"><?= $Page->IUICycles->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
        <th class="<?= $Page->AFC->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC"><?= $Page->AFC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
        <th class="<?= $Page->AMH->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH"><?= $Page->AMH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <th class="<?= $Page->FBMI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI"><?= $Page->FBMI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <th class="<?= $Page->MBMI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI"><?= $Page->MBMI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
        <th class="<?= $Page->OvarianVolumeRT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT"><?= $Page->OvarianVolumeRT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
        <th class="<?= $Page->OvarianVolumeLT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT"><?= $Page->OvarianVolumeLT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
        <th class="<?= $Page->DAYSOFSTIMULATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION"><?= $Page->DAYSOFSTIMULATION->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
        <th class="<?= $Page->DOSEOFGONADOTROPINS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS"><?= $Page->DOSEOFGONADOTROPINS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <th class="<?= $Page->INJTYPE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE"><?= $Page->INJTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
        <th class="<?= $Page->ANTAGONISTDAYS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS"><?= $Page->ANTAGONISTDAYS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
        <th class="<?= $Page->ANTAGONISTSTARTDAY->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY"><?= $Page->ANTAGONISTSTARTDAY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
        <th class="<?= $Page->GROWTHHORMONE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE"><?= $Page->GROWTHHORMONE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
        <th class="<?= $Page->PRETREATMENT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT"><?= $Page->PRETREATMENT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <th class="<?= $Page->SerumP4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4"><?= $Page->SerumP4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
        <th class="<?= $Page->FORT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT"><?= $Page->FORT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
        <th class="<?= $Page->MedicalFactors->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors"><?= $Page->MedicalFactors->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
        <th class="<?= $Page->SCDate->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate"><?= $Page->SCDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
        <th class="<?= $Page->OvarianSurgery->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery"><?= $Page->OvarianSurgery->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
        <th class="<?= $Page->PreProcedureOrder->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder"><?= $Page->PreProcedureOrder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <th class="<?= $Page->TRIGGERR->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR"><?= $Page->TRIGGERR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <th class="<?= $Page->TRIGGERDATE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE"><?= $Page->TRIGGERDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
        <th class="<?= $Page->ATHOMEorCLINIC->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC"><?= $Page->ATHOMEorCLINIC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <th class="<?= $Page->OPUDATE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE"><?= $Page->OPUDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
        <th class="<?= $Page->ALLFREEZEINDICATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION"><?= $Page->ALLFREEZEINDICATION->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
        <th class="<?= $Page->ERA->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA"><?= $Page->ERA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
        <th class="<?= $Page->PGTA->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA"><?= $Page->PGTA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
        <th class="<?= $Page->PGD->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD"><?= $Page->PGD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
        <th class="<?= $Page->DATEOFET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET"><?= $Page->DATEOFET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
        <th class="<?= $Page->ET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET"><?= $Page->ET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
        <th class="<?= $Page->ESET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET"><?= $Page->ESET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
        <th class="<?= $Page->DOET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET"><?= $Page->DOET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
        <th class="<?= $Page->SEMENPREPARATION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION"><?= $Page->SEMENPREPARATION->caption() ?></span></th>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
        <th class="<?= $Page->REASONFORESET->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET"><?= $Page->REASONFORESET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
        <th class="<?= $Page->Expectedoocytes->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes"><?= $Page->Expectedoocytes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
        <th class="<?= $Page->StChDate1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1"><?= $Page->StChDate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
        <th class="<?= $Page->StChDate2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2"><?= $Page->StChDate2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
        <th class="<?= $Page->StChDate3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3"><?= $Page->StChDate3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
        <th class="<?= $Page->StChDate4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4"><?= $Page->StChDate4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
        <th class="<?= $Page->StChDate5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5"><?= $Page->StChDate5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
        <th class="<?= $Page->StChDate6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6"><?= $Page->StChDate6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
        <th class="<?= $Page->StChDate7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7"><?= $Page->StChDate7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
        <th class="<?= $Page->StChDate8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8"><?= $Page->StChDate8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
        <th class="<?= $Page->StChDate9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9"><?= $Page->StChDate9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
        <th class="<?= $Page->StChDate10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10"><?= $Page->StChDate10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
        <th class="<?= $Page->StChDate11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11"><?= $Page->StChDate11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
        <th class="<?= $Page->StChDate12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12"><?= $Page->StChDate12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
        <th class="<?= $Page->StChDate13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13"><?= $Page->StChDate13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
        <th class="<?= $Page->CycleDay1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1"><?= $Page->CycleDay1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
        <th class="<?= $Page->CycleDay2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2"><?= $Page->CycleDay2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
        <th class="<?= $Page->CycleDay3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3"><?= $Page->CycleDay3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
        <th class="<?= $Page->CycleDay4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4"><?= $Page->CycleDay4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
        <th class="<?= $Page->CycleDay5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5"><?= $Page->CycleDay5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
        <th class="<?= $Page->CycleDay6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6"><?= $Page->CycleDay6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
        <th class="<?= $Page->CycleDay7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7"><?= $Page->CycleDay7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
        <th class="<?= $Page->CycleDay8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8"><?= $Page->CycleDay8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
        <th class="<?= $Page->CycleDay9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9"><?= $Page->CycleDay9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
        <th class="<?= $Page->CycleDay10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10"><?= $Page->CycleDay10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
        <th class="<?= $Page->CycleDay11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11"><?= $Page->CycleDay11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
        <th class="<?= $Page->CycleDay12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12"><?= $Page->CycleDay12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
        <th class="<?= $Page->CycleDay13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13"><?= $Page->CycleDay13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
        <th class="<?= $Page->StimulationDay1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1"><?= $Page->StimulationDay1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
        <th class="<?= $Page->StimulationDay2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2"><?= $Page->StimulationDay2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
        <th class="<?= $Page->StimulationDay3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3"><?= $Page->StimulationDay3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
        <th class="<?= $Page->StimulationDay4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4"><?= $Page->StimulationDay4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
        <th class="<?= $Page->StimulationDay5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5"><?= $Page->StimulationDay5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
        <th class="<?= $Page->StimulationDay6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6"><?= $Page->StimulationDay6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
        <th class="<?= $Page->StimulationDay7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7"><?= $Page->StimulationDay7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
        <th class="<?= $Page->StimulationDay8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8"><?= $Page->StimulationDay8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
        <th class="<?= $Page->StimulationDay9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9"><?= $Page->StimulationDay9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
        <th class="<?= $Page->StimulationDay10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10"><?= $Page->StimulationDay10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
        <th class="<?= $Page->StimulationDay11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11"><?= $Page->StimulationDay11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
        <th class="<?= $Page->StimulationDay12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12"><?= $Page->StimulationDay12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
        <th class="<?= $Page->StimulationDay13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13"><?= $Page->StimulationDay13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
        <th class="<?= $Page->Tablet1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1"><?= $Page->Tablet1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
        <th class="<?= $Page->Tablet2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2"><?= $Page->Tablet2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
        <th class="<?= $Page->Tablet3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3"><?= $Page->Tablet3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
        <th class="<?= $Page->Tablet4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4"><?= $Page->Tablet4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
        <th class="<?= $Page->Tablet5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5"><?= $Page->Tablet5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
        <th class="<?= $Page->Tablet6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6"><?= $Page->Tablet6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
        <th class="<?= $Page->Tablet7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7"><?= $Page->Tablet7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
        <th class="<?= $Page->Tablet8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8"><?= $Page->Tablet8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
        <th class="<?= $Page->Tablet9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9"><?= $Page->Tablet9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
        <th class="<?= $Page->Tablet10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10"><?= $Page->Tablet10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
        <th class="<?= $Page->Tablet11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11"><?= $Page->Tablet11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
        <th class="<?= $Page->Tablet12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12"><?= $Page->Tablet12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
        <th class="<?= $Page->Tablet13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13"><?= $Page->Tablet13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
        <th class="<?= $Page->RFSH1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1"><?= $Page->RFSH1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
        <th class="<?= $Page->RFSH2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2"><?= $Page->RFSH2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
        <th class="<?= $Page->RFSH3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3"><?= $Page->RFSH3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
        <th class="<?= $Page->RFSH4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4"><?= $Page->RFSH4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
        <th class="<?= $Page->RFSH5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5"><?= $Page->RFSH5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
        <th class="<?= $Page->RFSH6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6"><?= $Page->RFSH6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
        <th class="<?= $Page->RFSH7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7"><?= $Page->RFSH7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
        <th class="<?= $Page->RFSH8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8"><?= $Page->RFSH8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
        <th class="<?= $Page->RFSH9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9"><?= $Page->RFSH9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
        <th class="<?= $Page->RFSH10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10"><?= $Page->RFSH10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
        <th class="<?= $Page->RFSH11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11"><?= $Page->RFSH11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
        <th class="<?= $Page->RFSH12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12"><?= $Page->RFSH12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
        <th class="<?= $Page->RFSH13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13"><?= $Page->RFSH13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
        <th class="<?= $Page->HMG1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1"><?= $Page->HMG1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
        <th class="<?= $Page->HMG2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2"><?= $Page->HMG2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
        <th class="<?= $Page->HMG3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3"><?= $Page->HMG3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
        <th class="<?= $Page->HMG4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4"><?= $Page->HMG4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
        <th class="<?= $Page->HMG5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5"><?= $Page->HMG5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
        <th class="<?= $Page->HMG6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6"><?= $Page->HMG6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
        <th class="<?= $Page->HMG7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7"><?= $Page->HMG7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
        <th class="<?= $Page->HMG8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8"><?= $Page->HMG8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
        <th class="<?= $Page->HMG9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9"><?= $Page->HMG9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
        <th class="<?= $Page->HMG10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10"><?= $Page->HMG10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
        <th class="<?= $Page->HMG11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11"><?= $Page->HMG11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
        <th class="<?= $Page->HMG12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12"><?= $Page->HMG12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
        <th class="<?= $Page->HMG13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13"><?= $Page->HMG13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
        <th class="<?= $Page->GnRH1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1"><?= $Page->GnRH1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
        <th class="<?= $Page->GnRH2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2"><?= $Page->GnRH2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
        <th class="<?= $Page->GnRH3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3"><?= $Page->GnRH3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
        <th class="<?= $Page->GnRH4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4"><?= $Page->GnRH4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
        <th class="<?= $Page->GnRH5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5"><?= $Page->GnRH5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
        <th class="<?= $Page->GnRH6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6"><?= $Page->GnRH6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
        <th class="<?= $Page->GnRH7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7"><?= $Page->GnRH7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
        <th class="<?= $Page->GnRH8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8"><?= $Page->GnRH8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
        <th class="<?= $Page->GnRH9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9"><?= $Page->GnRH9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
        <th class="<?= $Page->GnRH10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10"><?= $Page->GnRH10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
        <th class="<?= $Page->GnRH11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11"><?= $Page->GnRH11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
        <th class="<?= $Page->GnRH12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12"><?= $Page->GnRH12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
        <th class="<?= $Page->GnRH13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13"><?= $Page->GnRH13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
        <th class="<?= $Page->E21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21"><?= $Page->E21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
        <th class="<?= $Page->E22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22"><?= $Page->E22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
        <th class="<?= $Page->E23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23"><?= $Page->E23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
        <th class="<?= $Page->E24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24"><?= $Page->E24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
        <th class="<?= $Page->E25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25"><?= $Page->E25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
        <th class="<?= $Page->E26->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26"><?= $Page->E26->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
        <th class="<?= $Page->E27->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27"><?= $Page->E27->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
        <th class="<?= $Page->E28->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28"><?= $Page->E28->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
        <th class="<?= $Page->E29->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29"><?= $Page->E29->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
        <th class="<?= $Page->E210->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210"><?= $Page->E210->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
        <th class="<?= $Page->E211->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211"><?= $Page->E211->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
        <th class="<?= $Page->E212->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212"><?= $Page->E212->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
        <th class="<?= $Page->E213->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213"><?= $Page->E213->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
        <th class="<?= $Page->P41->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41"><?= $Page->P41->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
        <th class="<?= $Page->P42->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42"><?= $Page->P42->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
        <th class="<?= $Page->P43->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43"><?= $Page->P43->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
        <th class="<?= $Page->P44->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44"><?= $Page->P44->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
        <th class="<?= $Page->P45->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45"><?= $Page->P45->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
        <th class="<?= $Page->P46->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46"><?= $Page->P46->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
        <th class="<?= $Page->P47->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47"><?= $Page->P47->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
        <th class="<?= $Page->P48->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48"><?= $Page->P48->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
        <th class="<?= $Page->P49->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49"><?= $Page->P49->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
        <th class="<?= $Page->P410->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410"><?= $Page->P410->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
        <th class="<?= $Page->P411->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411"><?= $Page->P411->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
        <th class="<?= $Page->P412->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412"><?= $Page->P412->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
        <th class="<?= $Page->P413->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413"><?= $Page->P413->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
        <th class="<?= $Page->USGRt1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1"><?= $Page->USGRt1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
        <th class="<?= $Page->USGRt2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2"><?= $Page->USGRt2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
        <th class="<?= $Page->USGRt3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3"><?= $Page->USGRt3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
        <th class="<?= $Page->USGRt4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4"><?= $Page->USGRt4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
        <th class="<?= $Page->USGRt5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5"><?= $Page->USGRt5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
        <th class="<?= $Page->USGRt6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6"><?= $Page->USGRt6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
        <th class="<?= $Page->USGRt7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7"><?= $Page->USGRt7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
        <th class="<?= $Page->USGRt8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8"><?= $Page->USGRt8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
        <th class="<?= $Page->USGRt9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9"><?= $Page->USGRt9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
        <th class="<?= $Page->USGRt10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10"><?= $Page->USGRt10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
        <th class="<?= $Page->USGRt11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11"><?= $Page->USGRt11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
        <th class="<?= $Page->USGRt12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12"><?= $Page->USGRt12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
        <th class="<?= $Page->USGRt13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13"><?= $Page->USGRt13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
        <th class="<?= $Page->USGLt1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1"><?= $Page->USGLt1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
        <th class="<?= $Page->USGLt2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2"><?= $Page->USGLt2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
        <th class="<?= $Page->USGLt3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3"><?= $Page->USGLt3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
        <th class="<?= $Page->USGLt4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4"><?= $Page->USGLt4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
        <th class="<?= $Page->USGLt5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5"><?= $Page->USGLt5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
        <th class="<?= $Page->USGLt6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6"><?= $Page->USGLt6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
        <th class="<?= $Page->USGLt7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7"><?= $Page->USGLt7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
        <th class="<?= $Page->USGLt8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8"><?= $Page->USGLt8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
        <th class="<?= $Page->USGLt9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9"><?= $Page->USGLt9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
        <th class="<?= $Page->USGLt10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10"><?= $Page->USGLt10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
        <th class="<?= $Page->USGLt11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11"><?= $Page->USGLt11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
        <th class="<?= $Page->USGLt12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12"><?= $Page->USGLt12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
        <th class="<?= $Page->USGLt13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13"><?= $Page->USGLt13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
        <th class="<?= $Page->EM1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1"><?= $Page->EM1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
        <th class="<?= $Page->EM2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2"><?= $Page->EM2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
        <th class="<?= $Page->EM3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3"><?= $Page->EM3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
        <th class="<?= $Page->EM4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4"><?= $Page->EM4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
        <th class="<?= $Page->EM5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5"><?= $Page->EM5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
        <th class="<?= $Page->EM6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6"><?= $Page->EM6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
        <th class="<?= $Page->EM7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7"><?= $Page->EM7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
        <th class="<?= $Page->EM8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8"><?= $Page->EM8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
        <th class="<?= $Page->EM9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9"><?= $Page->EM9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
        <th class="<?= $Page->EM10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10"><?= $Page->EM10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
        <th class="<?= $Page->EM11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11"><?= $Page->EM11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
        <th class="<?= $Page->EM12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12"><?= $Page->EM12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
        <th class="<?= $Page->EM13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13"><?= $Page->EM13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
        <th class="<?= $Page->Others1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1"><?= $Page->Others1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
        <th class="<?= $Page->Others2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2"><?= $Page->Others2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
        <th class="<?= $Page->Others3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3"><?= $Page->Others3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
        <th class="<?= $Page->Others4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4"><?= $Page->Others4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
        <th class="<?= $Page->Others5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5"><?= $Page->Others5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
        <th class="<?= $Page->Others6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6"><?= $Page->Others6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
        <th class="<?= $Page->Others7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7"><?= $Page->Others7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
        <th class="<?= $Page->Others8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8"><?= $Page->Others8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
        <th class="<?= $Page->Others9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9"><?= $Page->Others9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
        <th class="<?= $Page->Others10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10"><?= $Page->Others10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
        <th class="<?= $Page->Others11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11"><?= $Page->Others11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
        <th class="<?= $Page->Others12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12"><?= $Page->Others12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
        <th class="<?= $Page->Others13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13"><?= $Page->Others13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
        <th class="<?= $Page->DR1->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1"><?= $Page->DR1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
        <th class="<?= $Page->DR2->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2"><?= $Page->DR2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
        <th class="<?= $Page->DR3->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3"><?= $Page->DR3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
        <th class="<?= $Page->DR4->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4"><?= $Page->DR4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
        <th class="<?= $Page->DR5->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5"><?= $Page->DR5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
        <th class="<?= $Page->DR6->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6"><?= $Page->DR6->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
        <th class="<?= $Page->DR7->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7"><?= $Page->DR7->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
        <th class="<?= $Page->DR8->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8"><?= $Page->DR8->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
        <th class="<?= $Page->DR9->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9"><?= $Page->DR9->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
        <th class="<?= $Page->DR10->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10"><?= $Page->DR10->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
        <th class="<?= $Page->DR11->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11"><?= $Page->DR11->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
        <th class="<?= $Page->DR12->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12"><?= $Page->DR12->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
        <th class="<?= $Page->DR13->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13"><?= $Page->DR13->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
        <th class="<?= $Page->Convert->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert"><?= $Page->Convert->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant"><?= $Page->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <th class="<?= $Page->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <th class="<?= $Page->Hysteroscopy->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <th class="<?= $Page->EndometrialScratching->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <th class="<?= $Page->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <th class="<?= $Page->CYCLETYPE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <th class="<?= $Page->HRTCYCLE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <th class="<?= $Page->OralEstrogenDosage->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <th class="<?= $Page->VaginalEstrogen->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
        <th class="<?= $Page->GCSF->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF"><?= $Page->GCSF->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <th class="<?= $Page->ActivatedPRP->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <th class="<?= $Page->UCLcm->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm"><?= $Page->UCLcm->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
        <th class="<?= $Page->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER"><?= $Page->DATOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <th class="<?= $Page->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <th class="<?= $Page->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <th class="<?= $Page->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <th class="<?= $Page->DAYOFEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <th class="<?= $Page->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
        <th class="<?= $Page->ViaAdmin->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin"><?= $Page->ViaAdmin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
        <th class="<?= $Page->ViaStartDateTime->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime"><?= $Page->ViaStartDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
        <th class="<?= $Page->ViaDose->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose"><?= $Page->ViaDose->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
        <th class="<?= $Page->AllFreeze->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze"><?= $Page->AllFreeze->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
        <th class="<?= $Page->TreatmentCancel->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel"><?= $Page->TreatmentCancel->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
        <th class="<?= $Page->ProgesteroneAdmin->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin"><?= $Page->ProgesteroneAdmin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
        <th class="<?= $Page->ProgesteroneStart->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart"><?= $Page->ProgesteroneStart->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
        <th class="<?= $Page->ProgesteroneDose->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose"><?= $Page->ProgesteroneDose->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
        <th class="<?= $Page->StChDate14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14"><?= $Page->StChDate14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
        <th class="<?= $Page->StChDate15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15"><?= $Page->StChDate15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
        <th class="<?= $Page->StChDate16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16"><?= $Page->StChDate16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
        <th class="<?= $Page->StChDate17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17"><?= $Page->StChDate17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
        <th class="<?= $Page->StChDate18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18"><?= $Page->StChDate18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
        <th class="<?= $Page->StChDate19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19"><?= $Page->StChDate19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
        <th class="<?= $Page->StChDate20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20"><?= $Page->StChDate20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
        <th class="<?= $Page->StChDate21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21"><?= $Page->StChDate21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
        <th class="<?= $Page->StChDate22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22"><?= $Page->StChDate22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
        <th class="<?= $Page->StChDate23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23"><?= $Page->StChDate23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
        <th class="<?= $Page->StChDate24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24"><?= $Page->StChDate24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
        <th class="<?= $Page->StChDate25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25"><?= $Page->StChDate25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
        <th class="<?= $Page->CycleDay14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14"><?= $Page->CycleDay14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
        <th class="<?= $Page->CycleDay15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15"><?= $Page->CycleDay15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
        <th class="<?= $Page->CycleDay16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16"><?= $Page->CycleDay16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
        <th class="<?= $Page->CycleDay17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17"><?= $Page->CycleDay17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
        <th class="<?= $Page->CycleDay18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18"><?= $Page->CycleDay18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
        <th class="<?= $Page->CycleDay19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19"><?= $Page->CycleDay19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
        <th class="<?= $Page->CycleDay20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20"><?= $Page->CycleDay20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
        <th class="<?= $Page->CycleDay21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21"><?= $Page->CycleDay21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
        <th class="<?= $Page->CycleDay22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22"><?= $Page->CycleDay22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
        <th class="<?= $Page->CycleDay23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23"><?= $Page->CycleDay23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
        <th class="<?= $Page->CycleDay24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24"><?= $Page->CycleDay24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
        <th class="<?= $Page->CycleDay25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25"><?= $Page->CycleDay25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
        <th class="<?= $Page->StimulationDay14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14"><?= $Page->StimulationDay14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
        <th class="<?= $Page->StimulationDay15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15"><?= $Page->StimulationDay15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
        <th class="<?= $Page->StimulationDay16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16"><?= $Page->StimulationDay16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
        <th class="<?= $Page->StimulationDay17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17"><?= $Page->StimulationDay17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
        <th class="<?= $Page->StimulationDay18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18"><?= $Page->StimulationDay18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
        <th class="<?= $Page->StimulationDay19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19"><?= $Page->StimulationDay19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
        <th class="<?= $Page->StimulationDay20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20"><?= $Page->StimulationDay20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
        <th class="<?= $Page->StimulationDay21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21"><?= $Page->StimulationDay21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
        <th class="<?= $Page->StimulationDay22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22"><?= $Page->StimulationDay22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
        <th class="<?= $Page->StimulationDay23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23"><?= $Page->StimulationDay23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
        <th class="<?= $Page->StimulationDay24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24"><?= $Page->StimulationDay24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
        <th class="<?= $Page->StimulationDay25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25"><?= $Page->StimulationDay25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
        <th class="<?= $Page->Tablet14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14"><?= $Page->Tablet14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
        <th class="<?= $Page->Tablet15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15"><?= $Page->Tablet15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
        <th class="<?= $Page->Tablet16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16"><?= $Page->Tablet16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
        <th class="<?= $Page->Tablet17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17"><?= $Page->Tablet17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
        <th class="<?= $Page->Tablet18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18"><?= $Page->Tablet18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
        <th class="<?= $Page->Tablet19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19"><?= $Page->Tablet19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
        <th class="<?= $Page->Tablet20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20"><?= $Page->Tablet20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
        <th class="<?= $Page->Tablet21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21"><?= $Page->Tablet21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
        <th class="<?= $Page->Tablet22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22"><?= $Page->Tablet22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
        <th class="<?= $Page->Tablet23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23"><?= $Page->Tablet23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
        <th class="<?= $Page->Tablet24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24"><?= $Page->Tablet24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
        <th class="<?= $Page->Tablet25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25"><?= $Page->Tablet25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
        <th class="<?= $Page->RFSH14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14"><?= $Page->RFSH14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
        <th class="<?= $Page->RFSH15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15"><?= $Page->RFSH15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
        <th class="<?= $Page->RFSH16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16"><?= $Page->RFSH16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
        <th class="<?= $Page->RFSH17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17"><?= $Page->RFSH17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
        <th class="<?= $Page->RFSH18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18"><?= $Page->RFSH18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
        <th class="<?= $Page->RFSH19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19"><?= $Page->RFSH19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
        <th class="<?= $Page->RFSH20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20"><?= $Page->RFSH20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
        <th class="<?= $Page->RFSH21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21"><?= $Page->RFSH21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
        <th class="<?= $Page->RFSH22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22"><?= $Page->RFSH22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
        <th class="<?= $Page->RFSH23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23"><?= $Page->RFSH23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
        <th class="<?= $Page->RFSH24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24"><?= $Page->RFSH24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
        <th class="<?= $Page->RFSH25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25"><?= $Page->RFSH25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
        <th class="<?= $Page->HMG14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14"><?= $Page->HMG14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
        <th class="<?= $Page->HMG15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15"><?= $Page->HMG15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
        <th class="<?= $Page->HMG16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16"><?= $Page->HMG16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
        <th class="<?= $Page->HMG17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17"><?= $Page->HMG17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
        <th class="<?= $Page->HMG18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18"><?= $Page->HMG18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
        <th class="<?= $Page->HMG19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19"><?= $Page->HMG19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
        <th class="<?= $Page->HMG20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20"><?= $Page->HMG20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
        <th class="<?= $Page->HMG21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21"><?= $Page->HMG21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
        <th class="<?= $Page->HMG22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22"><?= $Page->HMG22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
        <th class="<?= $Page->HMG23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23"><?= $Page->HMG23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
        <th class="<?= $Page->HMG24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24"><?= $Page->HMG24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
        <th class="<?= $Page->HMG25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25"><?= $Page->HMG25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
        <th class="<?= $Page->GnRH14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14"><?= $Page->GnRH14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
        <th class="<?= $Page->GnRH15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15"><?= $Page->GnRH15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
        <th class="<?= $Page->GnRH16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16"><?= $Page->GnRH16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
        <th class="<?= $Page->GnRH17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17"><?= $Page->GnRH17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
        <th class="<?= $Page->GnRH18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18"><?= $Page->GnRH18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
        <th class="<?= $Page->GnRH19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19"><?= $Page->GnRH19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
        <th class="<?= $Page->GnRH20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20"><?= $Page->GnRH20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
        <th class="<?= $Page->GnRH21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21"><?= $Page->GnRH21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
        <th class="<?= $Page->GnRH22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22"><?= $Page->GnRH22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
        <th class="<?= $Page->GnRH23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23"><?= $Page->GnRH23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
        <th class="<?= $Page->GnRH24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24"><?= $Page->GnRH24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
        <th class="<?= $Page->GnRH25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25"><?= $Page->GnRH25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
        <th class="<?= $Page->P414->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414"><?= $Page->P414->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
        <th class="<?= $Page->P415->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415"><?= $Page->P415->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
        <th class="<?= $Page->P416->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416"><?= $Page->P416->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
        <th class="<?= $Page->P417->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417"><?= $Page->P417->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
        <th class="<?= $Page->P418->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418"><?= $Page->P418->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
        <th class="<?= $Page->P419->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419"><?= $Page->P419->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
        <th class="<?= $Page->P420->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420"><?= $Page->P420->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
        <th class="<?= $Page->P421->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421"><?= $Page->P421->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
        <th class="<?= $Page->P422->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422"><?= $Page->P422->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
        <th class="<?= $Page->P423->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423"><?= $Page->P423->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
        <th class="<?= $Page->P424->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424"><?= $Page->P424->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
        <th class="<?= $Page->P425->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425"><?= $Page->P425->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
        <th class="<?= $Page->USGRt14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14"><?= $Page->USGRt14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
        <th class="<?= $Page->USGRt15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15"><?= $Page->USGRt15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
        <th class="<?= $Page->USGRt16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16"><?= $Page->USGRt16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
        <th class="<?= $Page->USGRt17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17"><?= $Page->USGRt17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
        <th class="<?= $Page->USGRt18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18"><?= $Page->USGRt18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
        <th class="<?= $Page->USGRt19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19"><?= $Page->USGRt19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
        <th class="<?= $Page->USGRt20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20"><?= $Page->USGRt20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
        <th class="<?= $Page->USGRt21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21"><?= $Page->USGRt21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
        <th class="<?= $Page->USGRt22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22"><?= $Page->USGRt22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
        <th class="<?= $Page->USGRt23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23"><?= $Page->USGRt23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
        <th class="<?= $Page->USGRt24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24"><?= $Page->USGRt24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
        <th class="<?= $Page->USGRt25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25"><?= $Page->USGRt25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
        <th class="<?= $Page->USGLt14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14"><?= $Page->USGLt14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
        <th class="<?= $Page->USGLt15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15"><?= $Page->USGLt15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
        <th class="<?= $Page->USGLt16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16"><?= $Page->USGLt16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
        <th class="<?= $Page->USGLt17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17"><?= $Page->USGLt17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
        <th class="<?= $Page->USGLt18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18"><?= $Page->USGLt18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
        <th class="<?= $Page->USGLt19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19"><?= $Page->USGLt19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
        <th class="<?= $Page->USGLt20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20"><?= $Page->USGLt20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
        <th class="<?= $Page->USGLt21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21"><?= $Page->USGLt21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
        <th class="<?= $Page->USGLt22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22"><?= $Page->USGLt22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
        <th class="<?= $Page->USGLt23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23"><?= $Page->USGLt23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
        <th class="<?= $Page->USGLt24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24"><?= $Page->USGLt24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
        <th class="<?= $Page->USGLt25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25"><?= $Page->USGLt25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
        <th class="<?= $Page->EM14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14"><?= $Page->EM14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
        <th class="<?= $Page->EM15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15"><?= $Page->EM15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
        <th class="<?= $Page->EM16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16"><?= $Page->EM16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
        <th class="<?= $Page->EM17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17"><?= $Page->EM17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
        <th class="<?= $Page->EM18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18"><?= $Page->EM18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
        <th class="<?= $Page->EM19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19"><?= $Page->EM19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
        <th class="<?= $Page->EM20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20"><?= $Page->EM20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
        <th class="<?= $Page->EM21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21"><?= $Page->EM21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
        <th class="<?= $Page->EM22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22"><?= $Page->EM22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
        <th class="<?= $Page->EM23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23"><?= $Page->EM23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
        <th class="<?= $Page->EM24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24"><?= $Page->EM24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
        <th class="<?= $Page->EM25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25"><?= $Page->EM25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
        <th class="<?= $Page->Others14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14"><?= $Page->Others14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
        <th class="<?= $Page->Others15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15"><?= $Page->Others15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
        <th class="<?= $Page->Others16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16"><?= $Page->Others16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
        <th class="<?= $Page->Others17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17"><?= $Page->Others17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
        <th class="<?= $Page->Others18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18"><?= $Page->Others18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
        <th class="<?= $Page->Others19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19"><?= $Page->Others19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
        <th class="<?= $Page->Others20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20"><?= $Page->Others20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
        <th class="<?= $Page->Others21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21"><?= $Page->Others21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
        <th class="<?= $Page->Others22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22"><?= $Page->Others22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
        <th class="<?= $Page->Others23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23"><?= $Page->Others23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
        <th class="<?= $Page->Others24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24"><?= $Page->Others24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
        <th class="<?= $Page->Others25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25"><?= $Page->Others25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
        <th class="<?= $Page->DR14->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14"><?= $Page->DR14->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
        <th class="<?= $Page->DR15->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15"><?= $Page->DR15->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
        <th class="<?= $Page->DR16->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16"><?= $Page->DR16->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
        <th class="<?= $Page->DR17->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17"><?= $Page->DR17->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
        <th class="<?= $Page->DR18->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18"><?= $Page->DR18->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
        <th class="<?= $Page->DR19->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19"><?= $Page->DR19->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
        <th class="<?= $Page->DR20->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20"><?= $Page->DR20->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
        <th class="<?= $Page->DR21->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21"><?= $Page->DR21->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
        <th class="<?= $Page->DR22->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22"><?= $Page->DR22->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
        <th class="<?= $Page->DR23->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23"><?= $Page->DR23->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
        <th class="<?= $Page->DR24->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24"><?= $Page->DR24->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
        <th class="<?= $Page->DR25->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25"><?= $Page->DR25->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
        <th class="<?= $Page->E214->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214"><?= $Page->E214->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
        <th class="<?= $Page->E215->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215"><?= $Page->E215->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
        <th class="<?= $Page->E216->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216"><?= $Page->E216->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
        <th class="<?= $Page->E217->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217"><?= $Page->E217->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
        <th class="<?= $Page->E218->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218"><?= $Page->E218->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
        <th class="<?= $Page->E219->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219"><?= $Page->E219->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
        <th class="<?= $Page->E220->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220"><?= $Page->E220->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
        <th class="<?= $Page->E221->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221"><?= $Page->E221->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
        <th class="<?= $Page->E222->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222"><?= $Page->E222->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
        <th class="<?= $Page->E223->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223"><?= $Page->E223->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
        <th class="<?= $Page->E224->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224"><?= $Page->E224->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
        <th class="<?= $Page->E225->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225"><?= $Page->E225->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
        <th class="<?= $Page->EEETTTDTE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE"><?= $Page->EEETTTDTE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
        <th class="<?= $Page->bhcgdate->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate"><?= $Page->bhcgdate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <th class="<?= $Page->TUBAL_PATENCY->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY"><?= $Page->TUBAL_PATENCY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
        <th class="<?= $Page->HSG->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG"><?= $Page->HSG->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
        <th class="<?= $Page->DHL->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL"><?= $Page->DHL->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <th class="<?= $Page->UTERINE_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS"><?= $Page->UTERINE_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <th class="<?= $Page->W_COMORBIDS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS"><?= $Page->W_COMORBIDS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <th class="<?= $Page->H_COMORBIDS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS"><?= $Page->H_COMORBIDS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <th class="<?= $Page->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <th class="<?= $Page->TABLETS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS"><?= $Page->TABLETS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <th class="<?= $Page->FOLLICLE_STATUS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS"><?= $Page->FOLLICLE_STATUS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <th class="<?= $Page->NUMBER_OF_IUI->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI"><?= $Page->NUMBER_OF_IUI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <th class="<?= $Page->PROCEDURE->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE"><?= $Page->PROCEDURE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <th class="<?= $Page->LUTEAL_SUPPORT->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT"><?= $Page->LUTEAL_SUPPORT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <th class="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <th class="<?= $Page->ONGOING_PREG->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG"><?= $Page->ONGOING_PREG->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <th class="<?= $Page->EDD_Date->headerCellClass() ?>"><span id="elh_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date"><?= $Page->EDD_Date->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_id" class="ivf_stimulation_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RIDNo" class="ivf_stimulation_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Name" class="ivf_stimulation_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ARTCycle" class="ivf_stimulation_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
        <td <?= $Page->FemaleFactor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FemaleFactor" class="ivf_stimulation_chart_FemaleFactor">
<span<?= $Page->FemaleFactor->viewAttributes() ?>>
<?= $Page->FemaleFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
        <td <?= $Page->MaleFactor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_MaleFactor" class="ivf_stimulation_chart_MaleFactor">
<span<?= $Page->MaleFactor->viewAttributes() ?>>
<?= $Page->MaleFactor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
        <td <?= $Page->Protocol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Protocol" class="ivf_stimulation_chart_Protocol">
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
        <td <?= $Page->SemenFrozen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SemenFrozen" class="ivf_stimulation_chart_SemenFrozen">
<span<?= $Page->SemenFrozen->viewAttributes() ?>>
<?= $Page->SemenFrozen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
        <td <?= $Page->A4ICSICycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_A4ICSICycle" class="ivf_stimulation_chart_A4ICSICycle">
<span<?= $Page->A4ICSICycle->viewAttributes() ?>>
<?= $Page->A4ICSICycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
        <td <?= $Page->TotalICSICycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TotalICSICycle" class="ivf_stimulation_chart_TotalICSICycle">
<span<?= $Page->TotalICSICycle->viewAttributes() ?>>
<?= $Page->TotalICSICycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
        <td <?= $Page->TypeOfInfertility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TypeOfInfertility" class="ivf_stimulation_chart_TypeOfInfertility">
<span<?= $Page->TypeOfInfertility->viewAttributes() ?>>
<?= $Page->TypeOfInfertility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <td <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Duration" class="ivf_stimulation_chart_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <td <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_LMP" class="ivf_stimulation_chart_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
        <td <?= $Page->RelevantHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RelevantHistory" class="ivf_stimulation_chart_RelevantHistory">
<span<?= $Page->RelevantHistory->viewAttributes() ?>>
<?= $Page->RelevantHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
        <td <?= $Page->IUICycles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_IUICycles" class="ivf_stimulation_chart_IUICycles">
<span<?= $Page->IUICycles->viewAttributes() ?>>
<?= $Page->IUICycles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
        <td <?= $Page->AFC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_AFC" class="ivf_stimulation_chart_AFC">
<span<?= $Page->AFC->viewAttributes() ?>>
<?= $Page->AFC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
        <td <?= $Page->AMH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_AMH" class="ivf_stimulation_chart_AMH">
<span<?= $Page->AMH->viewAttributes() ?>>
<?= $Page->AMH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <td <?= $Page->FBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FBMI" class="ivf_stimulation_chart_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <td <?= $Page->MBMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_MBMI" class="ivf_stimulation_chart_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
        <td <?= $Page->OvarianVolumeRT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OvarianVolumeRT" class="ivf_stimulation_chart_OvarianVolumeRT">
<span<?= $Page->OvarianVolumeRT->viewAttributes() ?>>
<?= $Page->OvarianVolumeRT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
        <td <?= $Page->OvarianVolumeLT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OvarianVolumeLT" class="ivf_stimulation_chart_OvarianVolumeLT">
<span<?= $Page->OvarianVolumeLT->viewAttributes() ?>>
<?= $Page->OvarianVolumeLT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
        <td <?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DAYSOFSTIMULATION" class="ivf_stimulation_chart_DAYSOFSTIMULATION">
<span<?= $Page->DAYSOFSTIMULATION->viewAttributes() ?>>
<?= $Page->DAYSOFSTIMULATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
        <td <?= $Page->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DOSEOFGONADOTROPINS" class="ivf_stimulation_chart_DOSEOFGONADOTROPINS">
<span<?= $Page->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?= $Page->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <td <?= $Page->INJTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_INJTYPE" class="ivf_stimulation_chart_INJTYPE">
<span<?= $Page->INJTYPE->viewAttributes() ?>>
<?= $Page->INJTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
        <td <?= $Page->ANTAGONISTDAYS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ANTAGONISTDAYS" class="ivf_stimulation_chart_ANTAGONISTDAYS">
<span<?= $Page->ANTAGONISTDAYS->viewAttributes() ?>>
<?= $Page->ANTAGONISTDAYS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
        <td <?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ANTAGONISTSTARTDAY" class="ivf_stimulation_chart_ANTAGONISTSTARTDAY">
<span<?= $Page->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?= $Page->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
        <td <?= $Page->GROWTHHORMONE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GROWTHHORMONE" class="ivf_stimulation_chart_GROWTHHORMONE">
<span<?= $Page->GROWTHHORMONE->viewAttributes() ?>>
<?= $Page->GROWTHHORMONE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
        <td <?= $Page->PRETREATMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PRETREATMENT" class="ivf_stimulation_chart_PRETREATMENT">
<span<?= $Page->PRETREATMENT->viewAttributes() ?>>
<?= $Page->PRETREATMENT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <td <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SerumP4" class="ivf_stimulation_chart_SerumP4">
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
        <td <?= $Page->FORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FORT" class="ivf_stimulation_chart_FORT">
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
        <td <?= $Page->MedicalFactors->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_MedicalFactors" class="ivf_stimulation_chart_MedicalFactors">
<span<?= $Page->MedicalFactors->viewAttributes() ?>>
<?= $Page->MedicalFactors->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
        <td <?= $Page->SCDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SCDate" class="ivf_stimulation_chart_SCDate">
<span<?= $Page->SCDate->viewAttributes() ?>>
<?= $Page->SCDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
        <td <?= $Page->OvarianSurgery->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OvarianSurgery" class="ivf_stimulation_chart_OvarianSurgery">
<span<?= $Page->OvarianSurgery->viewAttributes() ?>>
<?= $Page->OvarianSurgery->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
        <td <?= $Page->PreProcedureOrder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PreProcedureOrder" class="ivf_stimulation_chart_PreProcedureOrder">
<span<?= $Page->PreProcedureOrder->viewAttributes() ?>>
<?= $Page->PreProcedureOrder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <td <?= $Page->TRIGGERR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TRIGGERR" class="ivf_stimulation_chart_TRIGGERR">
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <td <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TRIGGERDATE" class="ivf_stimulation_chart_TRIGGERDATE">
<span<?= $Page->TRIGGERDATE->viewAttributes() ?>>
<?= $Page->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
        <td <?= $Page->ATHOMEorCLINIC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ATHOMEorCLINIC" class="ivf_stimulation_chart_ATHOMEorCLINIC">
<span<?= $Page->ATHOMEorCLINIC->viewAttributes() ?>>
<?= $Page->ATHOMEorCLINIC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <td <?= $Page->OPUDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OPUDATE" class="ivf_stimulation_chart_OPUDATE">
<span<?= $Page->OPUDATE->viewAttributes() ?>>
<?= $Page->OPUDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
        <td <?= $Page->ALLFREEZEINDICATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ALLFREEZEINDICATION" class="ivf_stimulation_chart_ALLFREEZEINDICATION">
<span<?= $Page->ALLFREEZEINDICATION->viewAttributes() ?>>
<?= $Page->ALLFREEZEINDICATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
        <td <?= $Page->ERA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ERA" class="ivf_stimulation_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
        <td <?= $Page->PGTA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PGTA" class="ivf_stimulation_chart_PGTA">
<span<?= $Page->PGTA->viewAttributes() ?>>
<?= $Page->PGTA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
        <td <?= $Page->PGD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PGD" class="ivf_stimulation_chart_PGD">
<span<?= $Page->PGD->viewAttributes() ?>>
<?= $Page->PGD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
        <td <?= $Page->DATEOFET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DATEOFET" class="ivf_stimulation_chart_DATEOFET">
<span<?= $Page->DATEOFET->viewAttributes() ?>>
<?= $Page->DATEOFET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
        <td <?= $Page->ET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ET" class="ivf_stimulation_chart_ET">
<span<?= $Page->ET->viewAttributes() ?>>
<?= $Page->ET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
        <td <?= $Page->ESET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ESET" class="ivf_stimulation_chart_ESET">
<span<?= $Page->ESET->viewAttributes() ?>>
<?= $Page->ESET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
        <td <?= $Page->DOET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DOET" class="ivf_stimulation_chart_DOET">
<span<?= $Page->DOET->viewAttributes() ?>>
<?= $Page->DOET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
        <td <?= $Page->SEMENPREPARATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SEMENPREPARATION" class="ivf_stimulation_chart_SEMENPREPARATION">
<span<?= $Page->SEMENPREPARATION->viewAttributes() ?>>
<?= $Page->SEMENPREPARATION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
        <td <?= $Page->REASONFORESET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_REASONFORESET" class="ivf_stimulation_chart_REASONFORESET">
<span<?= $Page->REASONFORESET->viewAttributes() ?>>
<?= $Page->REASONFORESET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
        <td <?= $Page->Expectedoocytes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Expectedoocytes" class="ivf_stimulation_chart_Expectedoocytes">
<span<?= $Page->Expectedoocytes->viewAttributes() ?>>
<?= $Page->Expectedoocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
        <td <?= $Page->StChDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate1" class="ivf_stimulation_chart_StChDate1">
<span<?= $Page->StChDate1->viewAttributes() ?>>
<?= $Page->StChDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
        <td <?= $Page->StChDate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate2" class="ivf_stimulation_chart_StChDate2">
<span<?= $Page->StChDate2->viewAttributes() ?>>
<?= $Page->StChDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
        <td <?= $Page->StChDate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate3" class="ivf_stimulation_chart_StChDate3">
<span<?= $Page->StChDate3->viewAttributes() ?>>
<?= $Page->StChDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
        <td <?= $Page->StChDate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate4" class="ivf_stimulation_chart_StChDate4">
<span<?= $Page->StChDate4->viewAttributes() ?>>
<?= $Page->StChDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
        <td <?= $Page->StChDate5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate5" class="ivf_stimulation_chart_StChDate5">
<span<?= $Page->StChDate5->viewAttributes() ?>>
<?= $Page->StChDate5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
        <td <?= $Page->StChDate6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate6" class="ivf_stimulation_chart_StChDate6">
<span<?= $Page->StChDate6->viewAttributes() ?>>
<?= $Page->StChDate6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
        <td <?= $Page->StChDate7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate7" class="ivf_stimulation_chart_StChDate7">
<span<?= $Page->StChDate7->viewAttributes() ?>>
<?= $Page->StChDate7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
        <td <?= $Page->StChDate8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate8" class="ivf_stimulation_chart_StChDate8">
<span<?= $Page->StChDate8->viewAttributes() ?>>
<?= $Page->StChDate8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
        <td <?= $Page->StChDate9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate9" class="ivf_stimulation_chart_StChDate9">
<span<?= $Page->StChDate9->viewAttributes() ?>>
<?= $Page->StChDate9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
        <td <?= $Page->StChDate10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate10" class="ivf_stimulation_chart_StChDate10">
<span<?= $Page->StChDate10->viewAttributes() ?>>
<?= $Page->StChDate10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
        <td <?= $Page->StChDate11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate11" class="ivf_stimulation_chart_StChDate11">
<span<?= $Page->StChDate11->viewAttributes() ?>>
<?= $Page->StChDate11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
        <td <?= $Page->StChDate12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate12" class="ivf_stimulation_chart_StChDate12">
<span<?= $Page->StChDate12->viewAttributes() ?>>
<?= $Page->StChDate12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
        <td <?= $Page->StChDate13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate13" class="ivf_stimulation_chart_StChDate13">
<span<?= $Page->StChDate13->viewAttributes() ?>>
<?= $Page->StChDate13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
        <td <?= $Page->CycleDay1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay1" class="ivf_stimulation_chart_CycleDay1">
<span<?= $Page->CycleDay1->viewAttributes() ?>>
<?= $Page->CycleDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
        <td <?= $Page->CycleDay2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay2" class="ivf_stimulation_chart_CycleDay2">
<span<?= $Page->CycleDay2->viewAttributes() ?>>
<?= $Page->CycleDay2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
        <td <?= $Page->CycleDay3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay3" class="ivf_stimulation_chart_CycleDay3">
<span<?= $Page->CycleDay3->viewAttributes() ?>>
<?= $Page->CycleDay3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
        <td <?= $Page->CycleDay4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay4" class="ivf_stimulation_chart_CycleDay4">
<span<?= $Page->CycleDay4->viewAttributes() ?>>
<?= $Page->CycleDay4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
        <td <?= $Page->CycleDay5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay5" class="ivf_stimulation_chart_CycleDay5">
<span<?= $Page->CycleDay5->viewAttributes() ?>>
<?= $Page->CycleDay5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
        <td <?= $Page->CycleDay6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay6" class="ivf_stimulation_chart_CycleDay6">
<span<?= $Page->CycleDay6->viewAttributes() ?>>
<?= $Page->CycleDay6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
        <td <?= $Page->CycleDay7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay7" class="ivf_stimulation_chart_CycleDay7">
<span<?= $Page->CycleDay7->viewAttributes() ?>>
<?= $Page->CycleDay7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
        <td <?= $Page->CycleDay8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay8" class="ivf_stimulation_chart_CycleDay8">
<span<?= $Page->CycleDay8->viewAttributes() ?>>
<?= $Page->CycleDay8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
        <td <?= $Page->CycleDay9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay9" class="ivf_stimulation_chart_CycleDay9">
<span<?= $Page->CycleDay9->viewAttributes() ?>>
<?= $Page->CycleDay9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
        <td <?= $Page->CycleDay10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay10" class="ivf_stimulation_chart_CycleDay10">
<span<?= $Page->CycleDay10->viewAttributes() ?>>
<?= $Page->CycleDay10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
        <td <?= $Page->CycleDay11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay11" class="ivf_stimulation_chart_CycleDay11">
<span<?= $Page->CycleDay11->viewAttributes() ?>>
<?= $Page->CycleDay11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
        <td <?= $Page->CycleDay12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay12" class="ivf_stimulation_chart_CycleDay12">
<span<?= $Page->CycleDay12->viewAttributes() ?>>
<?= $Page->CycleDay12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
        <td <?= $Page->CycleDay13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay13" class="ivf_stimulation_chart_CycleDay13">
<span<?= $Page->CycleDay13->viewAttributes() ?>>
<?= $Page->CycleDay13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
        <td <?= $Page->StimulationDay1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay1" class="ivf_stimulation_chart_StimulationDay1">
<span<?= $Page->StimulationDay1->viewAttributes() ?>>
<?= $Page->StimulationDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
        <td <?= $Page->StimulationDay2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay2" class="ivf_stimulation_chart_StimulationDay2">
<span<?= $Page->StimulationDay2->viewAttributes() ?>>
<?= $Page->StimulationDay2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
        <td <?= $Page->StimulationDay3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay3" class="ivf_stimulation_chart_StimulationDay3">
<span<?= $Page->StimulationDay3->viewAttributes() ?>>
<?= $Page->StimulationDay3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
        <td <?= $Page->StimulationDay4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay4" class="ivf_stimulation_chart_StimulationDay4">
<span<?= $Page->StimulationDay4->viewAttributes() ?>>
<?= $Page->StimulationDay4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
        <td <?= $Page->StimulationDay5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay5" class="ivf_stimulation_chart_StimulationDay5">
<span<?= $Page->StimulationDay5->viewAttributes() ?>>
<?= $Page->StimulationDay5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
        <td <?= $Page->StimulationDay6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay6" class="ivf_stimulation_chart_StimulationDay6">
<span<?= $Page->StimulationDay6->viewAttributes() ?>>
<?= $Page->StimulationDay6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
        <td <?= $Page->StimulationDay7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay7" class="ivf_stimulation_chart_StimulationDay7">
<span<?= $Page->StimulationDay7->viewAttributes() ?>>
<?= $Page->StimulationDay7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
        <td <?= $Page->StimulationDay8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay8" class="ivf_stimulation_chart_StimulationDay8">
<span<?= $Page->StimulationDay8->viewAttributes() ?>>
<?= $Page->StimulationDay8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
        <td <?= $Page->StimulationDay9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay9" class="ivf_stimulation_chart_StimulationDay9">
<span<?= $Page->StimulationDay9->viewAttributes() ?>>
<?= $Page->StimulationDay9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
        <td <?= $Page->StimulationDay10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay10" class="ivf_stimulation_chart_StimulationDay10">
<span<?= $Page->StimulationDay10->viewAttributes() ?>>
<?= $Page->StimulationDay10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
        <td <?= $Page->StimulationDay11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay11" class="ivf_stimulation_chart_StimulationDay11">
<span<?= $Page->StimulationDay11->viewAttributes() ?>>
<?= $Page->StimulationDay11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
        <td <?= $Page->StimulationDay12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay12" class="ivf_stimulation_chart_StimulationDay12">
<span<?= $Page->StimulationDay12->viewAttributes() ?>>
<?= $Page->StimulationDay12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
        <td <?= $Page->StimulationDay13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay13" class="ivf_stimulation_chart_StimulationDay13">
<span<?= $Page->StimulationDay13->viewAttributes() ?>>
<?= $Page->StimulationDay13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
        <td <?= $Page->Tablet1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet1" class="ivf_stimulation_chart_Tablet1">
<span<?= $Page->Tablet1->viewAttributes() ?>>
<?= $Page->Tablet1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
        <td <?= $Page->Tablet2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet2" class="ivf_stimulation_chart_Tablet2">
<span<?= $Page->Tablet2->viewAttributes() ?>>
<?= $Page->Tablet2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
        <td <?= $Page->Tablet3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet3" class="ivf_stimulation_chart_Tablet3">
<span<?= $Page->Tablet3->viewAttributes() ?>>
<?= $Page->Tablet3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
        <td <?= $Page->Tablet4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet4" class="ivf_stimulation_chart_Tablet4">
<span<?= $Page->Tablet4->viewAttributes() ?>>
<?= $Page->Tablet4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
        <td <?= $Page->Tablet5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet5" class="ivf_stimulation_chart_Tablet5">
<span<?= $Page->Tablet5->viewAttributes() ?>>
<?= $Page->Tablet5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
        <td <?= $Page->Tablet6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet6" class="ivf_stimulation_chart_Tablet6">
<span<?= $Page->Tablet6->viewAttributes() ?>>
<?= $Page->Tablet6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
        <td <?= $Page->Tablet7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet7" class="ivf_stimulation_chart_Tablet7">
<span<?= $Page->Tablet7->viewAttributes() ?>>
<?= $Page->Tablet7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
        <td <?= $Page->Tablet8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet8" class="ivf_stimulation_chart_Tablet8">
<span<?= $Page->Tablet8->viewAttributes() ?>>
<?= $Page->Tablet8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
        <td <?= $Page->Tablet9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet9" class="ivf_stimulation_chart_Tablet9">
<span<?= $Page->Tablet9->viewAttributes() ?>>
<?= $Page->Tablet9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
        <td <?= $Page->Tablet10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet10" class="ivf_stimulation_chart_Tablet10">
<span<?= $Page->Tablet10->viewAttributes() ?>>
<?= $Page->Tablet10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
        <td <?= $Page->Tablet11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet11" class="ivf_stimulation_chart_Tablet11">
<span<?= $Page->Tablet11->viewAttributes() ?>>
<?= $Page->Tablet11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
        <td <?= $Page->Tablet12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet12" class="ivf_stimulation_chart_Tablet12">
<span<?= $Page->Tablet12->viewAttributes() ?>>
<?= $Page->Tablet12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
        <td <?= $Page->Tablet13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet13" class="ivf_stimulation_chart_Tablet13">
<span<?= $Page->Tablet13->viewAttributes() ?>>
<?= $Page->Tablet13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
        <td <?= $Page->RFSH1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH1" class="ivf_stimulation_chart_RFSH1">
<span<?= $Page->RFSH1->viewAttributes() ?>>
<?= $Page->RFSH1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
        <td <?= $Page->RFSH2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH2" class="ivf_stimulation_chart_RFSH2">
<span<?= $Page->RFSH2->viewAttributes() ?>>
<?= $Page->RFSH2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
        <td <?= $Page->RFSH3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH3" class="ivf_stimulation_chart_RFSH3">
<span<?= $Page->RFSH3->viewAttributes() ?>>
<?= $Page->RFSH3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
        <td <?= $Page->RFSH4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH4" class="ivf_stimulation_chart_RFSH4">
<span<?= $Page->RFSH4->viewAttributes() ?>>
<?= $Page->RFSH4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
        <td <?= $Page->RFSH5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH5" class="ivf_stimulation_chart_RFSH5">
<span<?= $Page->RFSH5->viewAttributes() ?>>
<?= $Page->RFSH5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
        <td <?= $Page->RFSH6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH6" class="ivf_stimulation_chart_RFSH6">
<span<?= $Page->RFSH6->viewAttributes() ?>>
<?= $Page->RFSH6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
        <td <?= $Page->RFSH7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH7" class="ivf_stimulation_chart_RFSH7">
<span<?= $Page->RFSH7->viewAttributes() ?>>
<?= $Page->RFSH7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
        <td <?= $Page->RFSH8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH8" class="ivf_stimulation_chart_RFSH8">
<span<?= $Page->RFSH8->viewAttributes() ?>>
<?= $Page->RFSH8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
        <td <?= $Page->RFSH9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH9" class="ivf_stimulation_chart_RFSH9">
<span<?= $Page->RFSH9->viewAttributes() ?>>
<?= $Page->RFSH9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
        <td <?= $Page->RFSH10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH10" class="ivf_stimulation_chart_RFSH10">
<span<?= $Page->RFSH10->viewAttributes() ?>>
<?= $Page->RFSH10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
        <td <?= $Page->RFSH11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH11" class="ivf_stimulation_chart_RFSH11">
<span<?= $Page->RFSH11->viewAttributes() ?>>
<?= $Page->RFSH11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
        <td <?= $Page->RFSH12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH12" class="ivf_stimulation_chart_RFSH12">
<span<?= $Page->RFSH12->viewAttributes() ?>>
<?= $Page->RFSH12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
        <td <?= $Page->RFSH13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH13" class="ivf_stimulation_chart_RFSH13">
<span<?= $Page->RFSH13->viewAttributes() ?>>
<?= $Page->RFSH13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
        <td <?= $Page->HMG1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG1" class="ivf_stimulation_chart_HMG1">
<span<?= $Page->HMG1->viewAttributes() ?>>
<?= $Page->HMG1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
        <td <?= $Page->HMG2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG2" class="ivf_stimulation_chart_HMG2">
<span<?= $Page->HMG2->viewAttributes() ?>>
<?= $Page->HMG2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
        <td <?= $Page->HMG3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG3" class="ivf_stimulation_chart_HMG3">
<span<?= $Page->HMG3->viewAttributes() ?>>
<?= $Page->HMG3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
        <td <?= $Page->HMG4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG4" class="ivf_stimulation_chart_HMG4">
<span<?= $Page->HMG4->viewAttributes() ?>>
<?= $Page->HMG4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
        <td <?= $Page->HMG5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG5" class="ivf_stimulation_chart_HMG5">
<span<?= $Page->HMG5->viewAttributes() ?>>
<?= $Page->HMG5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
        <td <?= $Page->HMG6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG6" class="ivf_stimulation_chart_HMG6">
<span<?= $Page->HMG6->viewAttributes() ?>>
<?= $Page->HMG6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
        <td <?= $Page->HMG7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG7" class="ivf_stimulation_chart_HMG7">
<span<?= $Page->HMG7->viewAttributes() ?>>
<?= $Page->HMG7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
        <td <?= $Page->HMG8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG8" class="ivf_stimulation_chart_HMG8">
<span<?= $Page->HMG8->viewAttributes() ?>>
<?= $Page->HMG8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
        <td <?= $Page->HMG9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG9" class="ivf_stimulation_chart_HMG9">
<span<?= $Page->HMG9->viewAttributes() ?>>
<?= $Page->HMG9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
        <td <?= $Page->HMG10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG10" class="ivf_stimulation_chart_HMG10">
<span<?= $Page->HMG10->viewAttributes() ?>>
<?= $Page->HMG10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
        <td <?= $Page->HMG11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG11" class="ivf_stimulation_chart_HMG11">
<span<?= $Page->HMG11->viewAttributes() ?>>
<?= $Page->HMG11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
        <td <?= $Page->HMG12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG12" class="ivf_stimulation_chart_HMG12">
<span<?= $Page->HMG12->viewAttributes() ?>>
<?= $Page->HMG12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
        <td <?= $Page->HMG13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG13" class="ivf_stimulation_chart_HMG13">
<span<?= $Page->HMG13->viewAttributes() ?>>
<?= $Page->HMG13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
        <td <?= $Page->GnRH1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH1" class="ivf_stimulation_chart_GnRH1">
<span<?= $Page->GnRH1->viewAttributes() ?>>
<?= $Page->GnRH1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
        <td <?= $Page->GnRH2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH2" class="ivf_stimulation_chart_GnRH2">
<span<?= $Page->GnRH2->viewAttributes() ?>>
<?= $Page->GnRH2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
        <td <?= $Page->GnRH3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH3" class="ivf_stimulation_chart_GnRH3">
<span<?= $Page->GnRH3->viewAttributes() ?>>
<?= $Page->GnRH3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
        <td <?= $Page->GnRH4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH4" class="ivf_stimulation_chart_GnRH4">
<span<?= $Page->GnRH4->viewAttributes() ?>>
<?= $Page->GnRH4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
        <td <?= $Page->GnRH5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH5" class="ivf_stimulation_chart_GnRH5">
<span<?= $Page->GnRH5->viewAttributes() ?>>
<?= $Page->GnRH5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
        <td <?= $Page->GnRH6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH6" class="ivf_stimulation_chart_GnRH6">
<span<?= $Page->GnRH6->viewAttributes() ?>>
<?= $Page->GnRH6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
        <td <?= $Page->GnRH7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH7" class="ivf_stimulation_chart_GnRH7">
<span<?= $Page->GnRH7->viewAttributes() ?>>
<?= $Page->GnRH7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
        <td <?= $Page->GnRH8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH8" class="ivf_stimulation_chart_GnRH8">
<span<?= $Page->GnRH8->viewAttributes() ?>>
<?= $Page->GnRH8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
        <td <?= $Page->GnRH9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH9" class="ivf_stimulation_chart_GnRH9">
<span<?= $Page->GnRH9->viewAttributes() ?>>
<?= $Page->GnRH9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
        <td <?= $Page->GnRH10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH10" class="ivf_stimulation_chart_GnRH10">
<span<?= $Page->GnRH10->viewAttributes() ?>>
<?= $Page->GnRH10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
        <td <?= $Page->GnRH11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH11" class="ivf_stimulation_chart_GnRH11">
<span<?= $Page->GnRH11->viewAttributes() ?>>
<?= $Page->GnRH11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
        <td <?= $Page->GnRH12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH12" class="ivf_stimulation_chart_GnRH12">
<span<?= $Page->GnRH12->viewAttributes() ?>>
<?= $Page->GnRH12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
        <td <?= $Page->GnRH13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH13" class="ivf_stimulation_chart_GnRH13">
<span<?= $Page->GnRH13->viewAttributes() ?>>
<?= $Page->GnRH13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
        <td <?= $Page->E21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E21" class="ivf_stimulation_chart_E21">
<span<?= $Page->E21->viewAttributes() ?>>
<?= $Page->E21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
        <td <?= $Page->E22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E22" class="ivf_stimulation_chart_E22">
<span<?= $Page->E22->viewAttributes() ?>>
<?= $Page->E22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
        <td <?= $Page->E23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E23" class="ivf_stimulation_chart_E23">
<span<?= $Page->E23->viewAttributes() ?>>
<?= $Page->E23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
        <td <?= $Page->E24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E24" class="ivf_stimulation_chart_E24">
<span<?= $Page->E24->viewAttributes() ?>>
<?= $Page->E24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
        <td <?= $Page->E25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E25" class="ivf_stimulation_chart_E25">
<span<?= $Page->E25->viewAttributes() ?>>
<?= $Page->E25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
        <td <?= $Page->E26->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E26" class="ivf_stimulation_chart_E26">
<span<?= $Page->E26->viewAttributes() ?>>
<?= $Page->E26->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
        <td <?= $Page->E27->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E27" class="ivf_stimulation_chart_E27">
<span<?= $Page->E27->viewAttributes() ?>>
<?= $Page->E27->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
        <td <?= $Page->E28->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E28" class="ivf_stimulation_chart_E28">
<span<?= $Page->E28->viewAttributes() ?>>
<?= $Page->E28->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
        <td <?= $Page->E29->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E29" class="ivf_stimulation_chart_E29">
<span<?= $Page->E29->viewAttributes() ?>>
<?= $Page->E29->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
        <td <?= $Page->E210->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E210" class="ivf_stimulation_chart_E210">
<span<?= $Page->E210->viewAttributes() ?>>
<?= $Page->E210->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
        <td <?= $Page->E211->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E211" class="ivf_stimulation_chart_E211">
<span<?= $Page->E211->viewAttributes() ?>>
<?= $Page->E211->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
        <td <?= $Page->E212->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E212" class="ivf_stimulation_chart_E212">
<span<?= $Page->E212->viewAttributes() ?>>
<?= $Page->E212->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
        <td <?= $Page->E213->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E213" class="ivf_stimulation_chart_E213">
<span<?= $Page->E213->viewAttributes() ?>>
<?= $Page->E213->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
        <td <?= $Page->P41->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P41" class="ivf_stimulation_chart_P41">
<span<?= $Page->P41->viewAttributes() ?>>
<?= $Page->P41->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
        <td <?= $Page->P42->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P42" class="ivf_stimulation_chart_P42">
<span<?= $Page->P42->viewAttributes() ?>>
<?= $Page->P42->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
        <td <?= $Page->P43->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P43" class="ivf_stimulation_chart_P43">
<span<?= $Page->P43->viewAttributes() ?>>
<?= $Page->P43->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
        <td <?= $Page->P44->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P44" class="ivf_stimulation_chart_P44">
<span<?= $Page->P44->viewAttributes() ?>>
<?= $Page->P44->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
        <td <?= $Page->P45->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P45" class="ivf_stimulation_chart_P45">
<span<?= $Page->P45->viewAttributes() ?>>
<?= $Page->P45->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
        <td <?= $Page->P46->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P46" class="ivf_stimulation_chart_P46">
<span<?= $Page->P46->viewAttributes() ?>>
<?= $Page->P46->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
        <td <?= $Page->P47->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P47" class="ivf_stimulation_chart_P47">
<span<?= $Page->P47->viewAttributes() ?>>
<?= $Page->P47->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
        <td <?= $Page->P48->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P48" class="ivf_stimulation_chart_P48">
<span<?= $Page->P48->viewAttributes() ?>>
<?= $Page->P48->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
        <td <?= $Page->P49->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P49" class="ivf_stimulation_chart_P49">
<span<?= $Page->P49->viewAttributes() ?>>
<?= $Page->P49->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
        <td <?= $Page->P410->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P410" class="ivf_stimulation_chart_P410">
<span<?= $Page->P410->viewAttributes() ?>>
<?= $Page->P410->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
        <td <?= $Page->P411->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P411" class="ivf_stimulation_chart_P411">
<span<?= $Page->P411->viewAttributes() ?>>
<?= $Page->P411->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
        <td <?= $Page->P412->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P412" class="ivf_stimulation_chart_P412">
<span<?= $Page->P412->viewAttributes() ?>>
<?= $Page->P412->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
        <td <?= $Page->P413->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P413" class="ivf_stimulation_chart_P413">
<span<?= $Page->P413->viewAttributes() ?>>
<?= $Page->P413->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
        <td <?= $Page->USGRt1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt1" class="ivf_stimulation_chart_USGRt1">
<span<?= $Page->USGRt1->viewAttributes() ?>>
<?= $Page->USGRt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
        <td <?= $Page->USGRt2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt2" class="ivf_stimulation_chart_USGRt2">
<span<?= $Page->USGRt2->viewAttributes() ?>>
<?= $Page->USGRt2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
        <td <?= $Page->USGRt3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt3" class="ivf_stimulation_chart_USGRt3">
<span<?= $Page->USGRt3->viewAttributes() ?>>
<?= $Page->USGRt3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
        <td <?= $Page->USGRt4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt4" class="ivf_stimulation_chart_USGRt4">
<span<?= $Page->USGRt4->viewAttributes() ?>>
<?= $Page->USGRt4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
        <td <?= $Page->USGRt5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt5" class="ivf_stimulation_chart_USGRt5">
<span<?= $Page->USGRt5->viewAttributes() ?>>
<?= $Page->USGRt5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
        <td <?= $Page->USGRt6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt6" class="ivf_stimulation_chart_USGRt6">
<span<?= $Page->USGRt6->viewAttributes() ?>>
<?= $Page->USGRt6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
        <td <?= $Page->USGRt7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt7" class="ivf_stimulation_chart_USGRt7">
<span<?= $Page->USGRt7->viewAttributes() ?>>
<?= $Page->USGRt7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
        <td <?= $Page->USGRt8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt8" class="ivf_stimulation_chart_USGRt8">
<span<?= $Page->USGRt8->viewAttributes() ?>>
<?= $Page->USGRt8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
        <td <?= $Page->USGRt9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt9" class="ivf_stimulation_chart_USGRt9">
<span<?= $Page->USGRt9->viewAttributes() ?>>
<?= $Page->USGRt9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
        <td <?= $Page->USGRt10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt10" class="ivf_stimulation_chart_USGRt10">
<span<?= $Page->USGRt10->viewAttributes() ?>>
<?= $Page->USGRt10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
        <td <?= $Page->USGRt11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt11" class="ivf_stimulation_chart_USGRt11">
<span<?= $Page->USGRt11->viewAttributes() ?>>
<?= $Page->USGRt11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
        <td <?= $Page->USGRt12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt12" class="ivf_stimulation_chart_USGRt12">
<span<?= $Page->USGRt12->viewAttributes() ?>>
<?= $Page->USGRt12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
        <td <?= $Page->USGRt13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt13" class="ivf_stimulation_chart_USGRt13">
<span<?= $Page->USGRt13->viewAttributes() ?>>
<?= $Page->USGRt13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
        <td <?= $Page->USGLt1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt1" class="ivf_stimulation_chart_USGLt1">
<span<?= $Page->USGLt1->viewAttributes() ?>>
<?= $Page->USGLt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
        <td <?= $Page->USGLt2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt2" class="ivf_stimulation_chart_USGLt2">
<span<?= $Page->USGLt2->viewAttributes() ?>>
<?= $Page->USGLt2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
        <td <?= $Page->USGLt3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt3" class="ivf_stimulation_chart_USGLt3">
<span<?= $Page->USGLt3->viewAttributes() ?>>
<?= $Page->USGLt3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
        <td <?= $Page->USGLt4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt4" class="ivf_stimulation_chart_USGLt4">
<span<?= $Page->USGLt4->viewAttributes() ?>>
<?= $Page->USGLt4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
        <td <?= $Page->USGLt5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt5" class="ivf_stimulation_chart_USGLt5">
<span<?= $Page->USGLt5->viewAttributes() ?>>
<?= $Page->USGLt5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
        <td <?= $Page->USGLt6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt6" class="ivf_stimulation_chart_USGLt6">
<span<?= $Page->USGLt6->viewAttributes() ?>>
<?= $Page->USGLt6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
        <td <?= $Page->USGLt7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt7" class="ivf_stimulation_chart_USGLt7">
<span<?= $Page->USGLt7->viewAttributes() ?>>
<?= $Page->USGLt7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
        <td <?= $Page->USGLt8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt8" class="ivf_stimulation_chart_USGLt8">
<span<?= $Page->USGLt8->viewAttributes() ?>>
<?= $Page->USGLt8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
        <td <?= $Page->USGLt9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt9" class="ivf_stimulation_chart_USGLt9">
<span<?= $Page->USGLt9->viewAttributes() ?>>
<?= $Page->USGLt9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
        <td <?= $Page->USGLt10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt10" class="ivf_stimulation_chart_USGLt10">
<span<?= $Page->USGLt10->viewAttributes() ?>>
<?= $Page->USGLt10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
        <td <?= $Page->USGLt11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt11" class="ivf_stimulation_chart_USGLt11">
<span<?= $Page->USGLt11->viewAttributes() ?>>
<?= $Page->USGLt11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
        <td <?= $Page->USGLt12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt12" class="ivf_stimulation_chart_USGLt12">
<span<?= $Page->USGLt12->viewAttributes() ?>>
<?= $Page->USGLt12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
        <td <?= $Page->USGLt13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt13" class="ivf_stimulation_chart_USGLt13">
<span<?= $Page->USGLt13->viewAttributes() ?>>
<?= $Page->USGLt13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
        <td <?= $Page->EM1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM1" class="ivf_stimulation_chart_EM1">
<span<?= $Page->EM1->viewAttributes() ?>>
<?= $Page->EM1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
        <td <?= $Page->EM2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM2" class="ivf_stimulation_chart_EM2">
<span<?= $Page->EM2->viewAttributes() ?>>
<?= $Page->EM2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
        <td <?= $Page->EM3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM3" class="ivf_stimulation_chart_EM3">
<span<?= $Page->EM3->viewAttributes() ?>>
<?= $Page->EM3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
        <td <?= $Page->EM4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM4" class="ivf_stimulation_chart_EM4">
<span<?= $Page->EM4->viewAttributes() ?>>
<?= $Page->EM4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
        <td <?= $Page->EM5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM5" class="ivf_stimulation_chart_EM5">
<span<?= $Page->EM5->viewAttributes() ?>>
<?= $Page->EM5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
        <td <?= $Page->EM6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM6" class="ivf_stimulation_chart_EM6">
<span<?= $Page->EM6->viewAttributes() ?>>
<?= $Page->EM6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
        <td <?= $Page->EM7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM7" class="ivf_stimulation_chart_EM7">
<span<?= $Page->EM7->viewAttributes() ?>>
<?= $Page->EM7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
        <td <?= $Page->EM8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM8" class="ivf_stimulation_chart_EM8">
<span<?= $Page->EM8->viewAttributes() ?>>
<?= $Page->EM8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
        <td <?= $Page->EM9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM9" class="ivf_stimulation_chart_EM9">
<span<?= $Page->EM9->viewAttributes() ?>>
<?= $Page->EM9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
        <td <?= $Page->EM10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM10" class="ivf_stimulation_chart_EM10">
<span<?= $Page->EM10->viewAttributes() ?>>
<?= $Page->EM10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
        <td <?= $Page->EM11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM11" class="ivf_stimulation_chart_EM11">
<span<?= $Page->EM11->viewAttributes() ?>>
<?= $Page->EM11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
        <td <?= $Page->EM12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM12" class="ivf_stimulation_chart_EM12">
<span<?= $Page->EM12->viewAttributes() ?>>
<?= $Page->EM12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
        <td <?= $Page->EM13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM13" class="ivf_stimulation_chart_EM13">
<span<?= $Page->EM13->viewAttributes() ?>>
<?= $Page->EM13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
        <td <?= $Page->Others1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others1" class="ivf_stimulation_chart_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
        <td <?= $Page->Others2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others2" class="ivf_stimulation_chart_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
        <td <?= $Page->Others3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others3" class="ivf_stimulation_chart_Others3">
<span<?= $Page->Others3->viewAttributes() ?>>
<?= $Page->Others3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
        <td <?= $Page->Others4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others4" class="ivf_stimulation_chart_Others4">
<span<?= $Page->Others4->viewAttributes() ?>>
<?= $Page->Others4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
        <td <?= $Page->Others5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others5" class="ivf_stimulation_chart_Others5">
<span<?= $Page->Others5->viewAttributes() ?>>
<?= $Page->Others5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
        <td <?= $Page->Others6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others6" class="ivf_stimulation_chart_Others6">
<span<?= $Page->Others6->viewAttributes() ?>>
<?= $Page->Others6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
        <td <?= $Page->Others7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others7" class="ivf_stimulation_chart_Others7">
<span<?= $Page->Others7->viewAttributes() ?>>
<?= $Page->Others7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
        <td <?= $Page->Others8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others8" class="ivf_stimulation_chart_Others8">
<span<?= $Page->Others8->viewAttributes() ?>>
<?= $Page->Others8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
        <td <?= $Page->Others9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others9" class="ivf_stimulation_chart_Others9">
<span<?= $Page->Others9->viewAttributes() ?>>
<?= $Page->Others9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
        <td <?= $Page->Others10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others10" class="ivf_stimulation_chart_Others10">
<span<?= $Page->Others10->viewAttributes() ?>>
<?= $Page->Others10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
        <td <?= $Page->Others11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others11" class="ivf_stimulation_chart_Others11">
<span<?= $Page->Others11->viewAttributes() ?>>
<?= $Page->Others11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
        <td <?= $Page->Others12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others12" class="ivf_stimulation_chart_Others12">
<span<?= $Page->Others12->viewAttributes() ?>>
<?= $Page->Others12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
        <td <?= $Page->Others13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others13" class="ivf_stimulation_chart_Others13">
<span<?= $Page->Others13->viewAttributes() ?>>
<?= $Page->Others13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
        <td <?= $Page->DR1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR1" class="ivf_stimulation_chart_DR1">
<span<?= $Page->DR1->viewAttributes() ?>>
<?= $Page->DR1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
        <td <?= $Page->DR2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR2" class="ivf_stimulation_chart_DR2">
<span<?= $Page->DR2->viewAttributes() ?>>
<?= $Page->DR2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
        <td <?= $Page->DR3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR3" class="ivf_stimulation_chart_DR3">
<span<?= $Page->DR3->viewAttributes() ?>>
<?= $Page->DR3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
        <td <?= $Page->DR4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR4" class="ivf_stimulation_chart_DR4">
<span<?= $Page->DR4->viewAttributes() ?>>
<?= $Page->DR4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
        <td <?= $Page->DR5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR5" class="ivf_stimulation_chart_DR5">
<span<?= $Page->DR5->viewAttributes() ?>>
<?= $Page->DR5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
        <td <?= $Page->DR6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR6" class="ivf_stimulation_chart_DR6">
<span<?= $Page->DR6->viewAttributes() ?>>
<?= $Page->DR6->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
        <td <?= $Page->DR7->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR7" class="ivf_stimulation_chart_DR7">
<span<?= $Page->DR7->viewAttributes() ?>>
<?= $Page->DR7->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
        <td <?= $Page->DR8->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR8" class="ivf_stimulation_chart_DR8">
<span<?= $Page->DR8->viewAttributes() ?>>
<?= $Page->DR8->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
        <td <?= $Page->DR9->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR9" class="ivf_stimulation_chart_DR9">
<span<?= $Page->DR9->viewAttributes() ?>>
<?= $Page->DR9->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
        <td <?= $Page->DR10->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR10" class="ivf_stimulation_chart_DR10">
<span<?= $Page->DR10->viewAttributes() ?>>
<?= $Page->DR10->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
        <td <?= $Page->DR11->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR11" class="ivf_stimulation_chart_DR11">
<span<?= $Page->DR11->viewAttributes() ?>>
<?= $Page->DR11->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
        <td <?= $Page->DR12->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR12" class="ivf_stimulation_chart_DR12">
<span<?= $Page->DR12->viewAttributes() ?>>
<?= $Page->DR12->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
        <td <?= $Page->DR13->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR13" class="ivf_stimulation_chart_DR13">
<span<?= $Page->DR13->viewAttributes() ?>>
<?= $Page->DR13->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TidNo" class="ivf_stimulation_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
        <td <?= $Page->Convert->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Convert" class="ivf_stimulation_chart_Convert">
<span<?= $Page->Convert->viewAttributes() ?>>
<?= $Page->Convert->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Consultant" class="ivf_stimulation_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_InseminatinTechnique" class="ivf_stimulation_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_IndicationForART" class="ivf_stimulation_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <td <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Hysteroscopy" class="ivf_stimulation_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <td <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EndometrialScratching" class="ivf_stimulation_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <td <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TrialCannulation" class="ivf_stimulation_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <td <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CYCLETYPE" class="ivf_stimulation_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <td <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HRTCYCLE" class="ivf_stimulation_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <td <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_OralEstrogenDosage" class="ivf_stimulation_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <td <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_VaginalEstrogen" class="ivf_stimulation_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
        <td <?= $Page->GCSF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GCSF" class="ivf_stimulation_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <td <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ActivatedPRP" class="ivf_stimulation_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <td <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_UCLcm" class="ivf_stimulation_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
        <td <?= $Page->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DATOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DATOFEMBRYOTRANSFER">
<span<?= $Page->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <td <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DAYOFEMBRYOTRANSFER" class="ivf_stimulation_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <td <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_NOOFEMBRYOSTHAWED" class="ivf_stimulation_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <td <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_stimulation_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <td <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DAYOFEMBRYOS" class="ivf_stimulation_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <td <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS" class="ivf_stimulation_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
        <td <?= $Page->ViaAdmin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ViaAdmin" class="ivf_stimulation_chart_ViaAdmin">
<span<?= $Page->ViaAdmin->viewAttributes() ?>>
<?= $Page->ViaAdmin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
        <td <?= $Page->ViaStartDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ViaStartDateTime" class="ivf_stimulation_chart_ViaStartDateTime">
<span<?= $Page->ViaStartDateTime->viewAttributes() ?>>
<?= $Page->ViaStartDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
        <td <?= $Page->ViaDose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ViaDose" class="ivf_stimulation_chart_ViaDose">
<span<?= $Page->ViaDose->viewAttributes() ?>>
<?= $Page->ViaDose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
        <td <?= $Page->AllFreeze->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_AllFreeze" class="ivf_stimulation_chart_AllFreeze">
<span<?= $Page->AllFreeze->viewAttributes() ?>>
<?= $Page->AllFreeze->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
        <td <?= $Page->TreatmentCancel->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TreatmentCancel" class="ivf_stimulation_chart_TreatmentCancel">
<span<?= $Page->TreatmentCancel->viewAttributes() ?>>
<?= $Page->TreatmentCancel->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
        <td <?= $Page->ProgesteroneAdmin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ProgesteroneAdmin" class="ivf_stimulation_chart_ProgesteroneAdmin">
<span<?= $Page->ProgesteroneAdmin->viewAttributes() ?>>
<?= $Page->ProgesteroneAdmin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
        <td <?= $Page->ProgesteroneStart->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ProgesteroneStart" class="ivf_stimulation_chart_ProgesteroneStart">
<span<?= $Page->ProgesteroneStart->viewAttributes() ?>>
<?= $Page->ProgesteroneStart->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
        <td <?= $Page->ProgesteroneDose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ProgesteroneDose" class="ivf_stimulation_chart_ProgesteroneDose">
<span<?= $Page->ProgesteroneDose->viewAttributes() ?>>
<?= $Page->ProgesteroneDose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
        <td <?= $Page->StChDate14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate14" class="ivf_stimulation_chart_StChDate14">
<span<?= $Page->StChDate14->viewAttributes() ?>>
<?= $Page->StChDate14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
        <td <?= $Page->StChDate15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate15" class="ivf_stimulation_chart_StChDate15">
<span<?= $Page->StChDate15->viewAttributes() ?>>
<?= $Page->StChDate15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
        <td <?= $Page->StChDate16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate16" class="ivf_stimulation_chart_StChDate16">
<span<?= $Page->StChDate16->viewAttributes() ?>>
<?= $Page->StChDate16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
        <td <?= $Page->StChDate17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate17" class="ivf_stimulation_chart_StChDate17">
<span<?= $Page->StChDate17->viewAttributes() ?>>
<?= $Page->StChDate17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
        <td <?= $Page->StChDate18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate18" class="ivf_stimulation_chart_StChDate18">
<span<?= $Page->StChDate18->viewAttributes() ?>>
<?= $Page->StChDate18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
        <td <?= $Page->StChDate19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate19" class="ivf_stimulation_chart_StChDate19">
<span<?= $Page->StChDate19->viewAttributes() ?>>
<?= $Page->StChDate19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
        <td <?= $Page->StChDate20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate20" class="ivf_stimulation_chart_StChDate20">
<span<?= $Page->StChDate20->viewAttributes() ?>>
<?= $Page->StChDate20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
        <td <?= $Page->StChDate21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate21" class="ivf_stimulation_chart_StChDate21">
<span<?= $Page->StChDate21->viewAttributes() ?>>
<?= $Page->StChDate21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
        <td <?= $Page->StChDate22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate22" class="ivf_stimulation_chart_StChDate22">
<span<?= $Page->StChDate22->viewAttributes() ?>>
<?= $Page->StChDate22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
        <td <?= $Page->StChDate23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate23" class="ivf_stimulation_chart_StChDate23">
<span<?= $Page->StChDate23->viewAttributes() ?>>
<?= $Page->StChDate23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
        <td <?= $Page->StChDate24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate24" class="ivf_stimulation_chart_StChDate24">
<span<?= $Page->StChDate24->viewAttributes() ?>>
<?= $Page->StChDate24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
        <td <?= $Page->StChDate25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StChDate25" class="ivf_stimulation_chart_StChDate25">
<span<?= $Page->StChDate25->viewAttributes() ?>>
<?= $Page->StChDate25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
        <td <?= $Page->CycleDay14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay14" class="ivf_stimulation_chart_CycleDay14">
<span<?= $Page->CycleDay14->viewAttributes() ?>>
<?= $Page->CycleDay14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
        <td <?= $Page->CycleDay15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay15" class="ivf_stimulation_chart_CycleDay15">
<span<?= $Page->CycleDay15->viewAttributes() ?>>
<?= $Page->CycleDay15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
        <td <?= $Page->CycleDay16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay16" class="ivf_stimulation_chart_CycleDay16">
<span<?= $Page->CycleDay16->viewAttributes() ?>>
<?= $Page->CycleDay16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
        <td <?= $Page->CycleDay17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay17" class="ivf_stimulation_chart_CycleDay17">
<span<?= $Page->CycleDay17->viewAttributes() ?>>
<?= $Page->CycleDay17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
        <td <?= $Page->CycleDay18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay18" class="ivf_stimulation_chart_CycleDay18">
<span<?= $Page->CycleDay18->viewAttributes() ?>>
<?= $Page->CycleDay18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
        <td <?= $Page->CycleDay19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay19" class="ivf_stimulation_chart_CycleDay19">
<span<?= $Page->CycleDay19->viewAttributes() ?>>
<?= $Page->CycleDay19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
        <td <?= $Page->CycleDay20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay20" class="ivf_stimulation_chart_CycleDay20">
<span<?= $Page->CycleDay20->viewAttributes() ?>>
<?= $Page->CycleDay20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
        <td <?= $Page->CycleDay21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay21" class="ivf_stimulation_chart_CycleDay21">
<span<?= $Page->CycleDay21->viewAttributes() ?>>
<?= $Page->CycleDay21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
        <td <?= $Page->CycleDay22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay22" class="ivf_stimulation_chart_CycleDay22">
<span<?= $Page->CycleDay22->viewAttributes() ?>>
<?= $Page->CycleDay22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
        <td <?= $Page->CycleDay23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay23" class="ivf_stimulation_chart_CycleDay23">
<span<?= $Page->CycleDay23->viewAttributes() ?>>
<?= $Page->CycleDay23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
        <td <?= $Page->CycleDay24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay24" class="ivf_stimulation_chart_CycleDay24">
<span<?= $Page->CycleDay24->viewAttributes() ?>>
<?= $Page->CycleDay24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
        <td <?= $Page->CycleDay25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_CycleDay25" class="ivf_stimulation_chart_CycleDay25">
<span<?= $Page->CycleDay25->viewAttributes() ?>>
<?= $Page->CycleDay25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
        <td <?= $Page->StimulationDay14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay14" class="ivf_stimulation_chart_StimulationDay14">
<span<?= $Page->StimulationDay14->viewAttributes() ?>>
<?= $Page->StimulationDay14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
        <td <?= $Page->StimulationDay15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay15" class="ivf_stimulation_chart_StimulationDay15">
<span<?= $Page->StimulationDay15->viewAttributes() ?>>
<?= $Page->StimulationDay15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
        <td <?= $Page->StimulationDay16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay16" class="ivf_stimulation_chart_StimulationDay16">
<span<?= $Page->StimulationDay16->viewAttributes() ?>>
<?= $Page->StimulationDay16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
        <td <?= $Page->StimulationDay17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay17" class="ivf_stimulation_chart_StimulationDay17">
<span<?= $Page->StimulationDay17->viewAttributes() ?>>
<?= $Page->StimulationDay17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
        <td <?= $Page->StimulationDay18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay18" class="ivf_stimulation_chart_StimulationDay18">
<span<?= $Page->StimulationDay18->viewAttributes() ?>>
<?= $Page->StimulationDay18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
        <td <?= $Page->StimulationDay19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay19" class="ivf_stimulation_chart_StimulationDay19">
<span<?= $Page->StimulationDay19->viewAttributes() ?>>
<?= $Page->StimulationDay19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
        <td <?= $Page->StimulationDay20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay20" class="ivf_stimulation_chart_StimulationDay20">
<span<?= $Page->StimulationDay20->viewAttributes() ?>>
<?= $Page->StimulationDay20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
        <td <?= $Page->StimulationDay21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay21" class="ivf_stimulation_chart_StimulationDay21">
<span<?= $Page->StimulationDay21->viewAttributes() ?>>
<?= $Page->StimulationDay21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
        <td <?= $Page->StimulationDay22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay22" class="ivf_stimulation_chart_StimulationDay22">
<span<?= $Page->StimulationDay22->viewAttributes() ?>>
<?= $Page->StimulationDay22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
        <td <?= $Page->StimulationDay23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay23" class="ivf_stimulation_chart_StimulationDay23">
<span<?= $Page->StimulationDay23->viewAttributes() ?>>
<?= $Page->StimulationDay23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
        <td <?= $Page->StimulationDay24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay24" class="ivf_stimulation_chart_StimulationDay24">
<span<?= $Page->StimulationDay24->viewAttributes() ?>>
<?= $Page->StimulationDay24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
        <td <?= $Page->StimulationDay25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_StimulationDay25" class="ivf_stimulation_chart_StimulationDay25">
<span<?= $Page->StimulationDay25->viewAttributes() ?>>
<?= $Page->StimulationDay25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
        <td <?= $Page->Tablet14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet14" class="ivf_stimulation_chart_Tablet14">
<span<?= $Page->Tablet14->viewAttributes() ?>>
<?= $Page->Tablet14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
        <td <?= $Page->Tablet15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet15" class="ivf_stimulation_chart_Tablet15">
<span<?= $Page->Tablet15->viewAttributes() ?>>
<?= $Page->Tablet15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
        <td <?= $Page->Tablet16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet16" class="ivf_stimulation_chart_Tablet16">
<span<?= $Page->Tablet16->viewAttributes() ?>>
<?= $Page->Tablet16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
        <td <?= $Page->Tablet17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet17" class="ivf_stimulation_chart_Tablet17">
<span<?= $Page->Tablet17->viewAttributes() ?>>
<?= $Page->Tablet17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
        <td <?= $Page->Tablet18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet18" class="ivf_stimulation_chart_Tablet18">
<span<?= $Page->Tablet18->viewAttributes() ?>>
<?= $Page->Tablet18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
        <td <?= $Page->Tablet19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet19" class="ivf_stimulation_chart_Tablet19">
<span<?= $Page->Tablet19->viewAttributes() ?>>
<?= $Page->Tablet19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
        <td <?= $Page->Tablet20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet20" class="ivf_stimulation_chart_Tablet20">
<span<?= $Page->Tablet20->viewAttributes() ?>>
<?= $Page->Tablet20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
        <td <?= $Page->Tablet21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet21" class="ivf_stimulation_chart_Tablet21">
<span<?= $Page->Tablet21->viewAttributes() ?>>
<?= $Page->Tablet21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
        <td <?= $Page->Tablet22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet22" class="ivf_stimulation_chart_Tablet22">
<span<?= $Page->Tablet22->viewAttributes() ?>>
<?= $Page->Tablet22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
        <td <?= $Page->Tablet23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet23" class="ivf_stimulation_chart_Tablet23">
<span<?= $Page->Tablet23->viewAttributes() ?>>
<?= $Page->Tablet23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
        <td <?= $Page->Tablet24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet24" class="ivf_stimulation_chart_Tablet24">
<span<?= $Page->Tablet24->viewAttributes() ?>>
<?= $Page->Tablet24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
        <td <?= $Page->Tablet25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Tablet25" class="ivf_stimulation_chart_Tablet25">
<span<?= $Page->Tablet25->viewAttributes() ?>>
<?= $Page->Tablet25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
        <td <?= $Page->RFSH14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH14" class="ivf_stimulation_chart_RFSH14">
<span<?= $Page->RFSH14->viewAttributes() ?>>
<?= $Page->RFSH14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
        <td <?= $Page->RFSH15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH15" class="ivf_stimulation_chart_RFSH15">
<span<?= $Page->RFSH15->viewAttributes() ?>>
<?= $Page->RFSH15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
        <td <?= $Page->RFSH16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH16" class="ivf_stimulation_chart_RFSH16">
<span<?= $Page->RFSH16->viewAttributes() ?>>
<?= $Page->RFSH16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
        <td <?= $Page->RFSH17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH17" class="ivf_stimulation_chart_RFSH17">
<span<?= $Page->RFSH17->viewAttributes() ?>>
<?= $Page->RFSH17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
        <td <?= $Page->RFSH18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH18" class="ivf_stimulation_chart_RFSH18">
<span<?= $Page->RFSH18->viewAttributes() ?>>
<?= $Page->RFSH18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
        <td <?= $Page->RFSH19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH19" class="ivf_stimulation_chart_RFSH19">
<span<?= $Page->RFSH19->viewAttributes() ?>>
<?= $Page->RFSH19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
        <td <?= $Page->RFSH20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH20" class="ivf_stimulation_chart_RFSH20">
<span<?= $Page->RFSH20->viewAttributes() ?>>
<?= $Page->RFSH20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
        <td <?= $Page->RFSH21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH21" class="ivf_stimulation_chart_RFSH21">
<span<?= $Page->RFSH21->viewAttributes() ?>>
<?= $Page->RFSH21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
        <td <?= $Page->RFSH22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH22" class="ivf_stimulation_chart_RFSH22">
<span<?= $Page->RFSH22->viewAttributes() ?>>
<?= $Page->RFSH22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
        <td <?= $Page->RFSH23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH23" class="ivf_stimulation_chart_RFSH23">
<span<?= $Page->RFSH23->viewAttributes() ?>>
<?= $Page->RFSH23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
        <td <?= $Page->RFSH24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH24" class="ivf_stimulation_chart_RFSH24">
<span<?= $Page->RFSH24->viewAttributes() ?>>
<?= $Page->RFSH24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
        <td <?= $Page->RFSH25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_RFSH25" class="ivf_stimulation_chart_RFSH25">
<span<?= $Page->RFSH25->viewAttributes() ?>>
<?= $Page->RFSH25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
        <td <?= $Page->HMG14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG14" class="ivf_stimulation_chart_HMG14">
<span<?= $Page->HMG14->viewAttributes() ?>>
<?= $Page->HMG14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
        <td <?= $Page->HMG15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG15" class="ivf_stimulation_chart_HMG15">
<span<?= $Page->HMG15->viewAttributes() ?>>
<?= $Page->HMG15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
        <td <?= $Page->HMG16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG16" class="ivf_stimulation_chart_HMG16">
<span<?= $Page->HMG16->viewAttributes() ?>>
<?= $Page->HMG16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
        <td <?= $Page->HMG17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG17" class="ivf_stimulation_chart_HMG17">
<span<?= $Page->HMG17->viewAttributes() ?>>
<?= $Page->HMG17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
        <td <?= $Page->HMG18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG18" class="ivf_stimulation_chart_HMG18">
<span<?= $Page->HMG18->viewAttributes() ?>>
<?= $Page->HMG18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
        <td <?= $Page->HMG19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG19" class="ivf_stimulation_chart_HMG19">
<span<?= $Page->HMG19->viewAttributes() ?>>
<?= $Page->HMG19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
        <td <?= $Page->HMG20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG20" class="ivf_stimulation_chart_HMG20">
<span<?= $Page->HMG20->viewAttributes() ?>>
<?= $Page->HMG20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
        <td <?= $Page->HMG21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG21" class="ivf_stimulation_chart_HMG21">
<span<?= $Page->HMG21->viewAttributes() ?>>
<?= $Page->HMG21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
        <td <?= $Page->HMG22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG22" class="ivf_stimulation_chart_HMG22">
<span<?= $Page->HMG22->viewAttributes() ?>>
<?= $Page->HMG22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
        <td <?= $Page->HMG23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG23" class="ivf_stimulation_chart_HMG23">
<span<?= $Page->HMG23->viewAttributes() ?>>
<?= $Page->HMG23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
        <td <?= $Page->HMG24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG24" class="ivf_stimulation_chart_HMG24">
<span<?= $Page->HMG24->viewAttributes() ?>>
<?= $Page->HMG24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
        <td <?= $Page->HMG25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HMG25" class="ivf_stimulation_chart_HMG25">
<span<?= $Page->HMG25->viewAttributes() ?>>
<?= $Page->HMG25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
        <td <?= $Page->GnRH14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH14" class="ivf_stimulation_chart_GnRH14">
<span<?= $Page->GnRH14->viewAttributes() ?>>
<?= $Page->GnRH14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
        <td <?= $Page->GnRH15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH15" class="ivf_stimulation_chart_GnRH15">
<span<?= $Page->GnRH15->viewAttributes() ?>>
<?= $Page->GnRH15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
        <td <?= $Page->GnRH16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH16" class="ivf_stimulation_chart_GnRH16">
<span<?= $Page->GnRH16->viewAttributes() ?>>
<?= $Page->GnRH16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
        <td <?= $Page->GnRH17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH17" class="ivf_stimulation_chart_GnRH17">
<span<?= $Page->GnRH17->viewAttributes() ?>>
<?= $Page->GnRH17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
        <td <?= $Page->GnRH18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH18" class="ivf_stimulation_chart_GnRH18">
<span<?= $Page->GnRH18->viewAttributes() ?>>
<?= $Page->GnRH18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
        <td <?= $Page->GnRH19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH19" class="ivf_stimulation_chart_GnRH19">
<span<?= $Page->GnRH19->viewAttributes() ?>>
<?= $Page->GnRH19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
        <td <?= $Page->GnRH20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH20" class="ivf_stimulation_chart_GnRH20">
<span<?= $Page->GnRH20->viewAttributes() ?>>
<?= $Page->GnRH20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
        <td <?= $Page->GnRH21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH21" class="ivf_stimulation_chart_GnRH21">
<span<?= $Page->GnRH21->viewAttributes() ?>>
<?= $Page->GnRH21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
        <td <?= $Page->GnRH22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH22" class="ivf_stimulation_chart_GnRH22">
<span<?= $Page->GnRH22->viewAttributes() ?>>
<?= $Page->GnRH22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
        <td <?= $Page->GnRH23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH23" class="ivf_stimulation_chart_GnRH23">
<span<?= $Page->GnRH23->viewAttributes() ?>>
<?= $Page->GnRH23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
        <td <?= $Page->GnRH24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH24" class="ivf_stimulation_chart_GnRH24">
<span<?= $Page->GnRH24->viewAttributes() ?>>
<?= $Page->GnRH24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
        <td <?= $Page->GnRH25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_GnRH25" class="ivf_stimulation_chart_GnRH25">
<span<?= $Page->GnRH25->viewAttributes() ?>>
<?= $Page->GnRH25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
        <td <?= $Page->P414->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P414" class="ivf_stimulation_chart_P414">
<span<?= $Page->P414->viewAttributes() ?>>
<?= $Page->P414->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
        <td <?= $Page->P415->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P415" class="ivf_stimulation_chart_P415">
<span<?= $Page->P415->viewAttributes() ?>>
<?= $Page->P415->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
        <td <?= $Page->P416->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P416" class="ivf_stimulation_chart_P416">
<span<?= $Page->P416->viewAttributes() ?>>
<?= $Page->P416->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
        <td <?= $Page->P417->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P417" class="ivf_stimulation_chart_P417">
<span<?= $Page->P417->viewAttributes() ?>>
<?= $Page->P417->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
        <td <?= $Page->P418->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P418" class="ivf_stimulation_chart_P418">
<span<?= $Page->P418->viewAttributes() ?>>
<?= $Page->P418->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
        <td <?= $Page->P419->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P419" class="ivf_stimulation_chart_P419">
<span<?= $Page->P419->viewAttributes() ?>>
<?= $Page->P419->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
        <td <?= $Page->P420->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P420" class="ivf_stimulation_chart_P420">
<span<?= $Page->P420->viewAttributes() ?>>
<?= $Page->P420->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
        <td <?= $Page->P421->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P421" class="ivf_stimulation_chart_P421">
<span<?= $Page->P421->viewAttributes() ?>>
<?= $Page->P421->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
        <td <?= $Page->P422->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P422" class="ivf_stimulation_chart_P422">
<span<?= $Page->P422->viewAttributes() ?>>
<?= $Page->P422->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
        <td <?= $Page->P423->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P423" class="ivf_stimulation_chart_P423">
<span<?= $Page->P423->viewAttributes() ?>>
<?= $Page->P423->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
        <td <?= $Page->P424->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P424" class="ivf_stimulation_chart_P424">
<span<?= $Page->P424->viewAttributes() ?>>
<?= $Page->P424->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
        <td <?= $Page->P425->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_P425" class="ivf_stimulation_chart_P425">
<span<?= $Page->P425->viewAttributes() ?>>
<?= $Page->P425->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
        <td <?= $Page->USGRt14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt14" class="ivf_stimulation_chart_USGRt14">
<span<?= $Page->USGRt14->viewAttributes() ?>>
<?= $Page->USGRt14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
        <td <?= $Page->USGRt15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt15" class="ivf_stimulation_chart_USGRt15">
<span<?= $Page->USGRt15->viewAttributes() ?>>
<?= $Page->USGRt15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
        <td <?= $Page->USGRt16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt16" class="ivf_stimulation_chart_USGRt16">
<span<?= $Page->USGRt16->viewAttributes() ?>>
<?= $Page->USGRt16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
        <td <?= $Page->USGRt17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt17" class="ivf_stimulation_chart_USGRt17">
<span<?= $Page->USGRt17->viewAttributes() ?>>
<?= $Page->USGRt17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
        <td <?= $Page->USGRt18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt18" class="ivf_stimulation_chart_USGRt18">
<span<?= $Page->USGRt18->viewAttributes() ?>>
<?= $Page->USGRt18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
        <td <?= $Page->USGRt19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt19" class="ivf_stimulation_chart_USGRt19">
<span<?= $Page->USGRt19->viewAttributes() ?>>
<?= $Page->USGRt19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
        <td <?= $Page->USGRt20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt20" class="ivf_stimulation_chart_USGRt20">
<span<?= $Page->USGRt20->viewAttributes() ?>>
<?= $Page->USGRt20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
        <td <?= $Page->USGRt21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt21" class="ivf_stimulation_chart_USGRt21">
<span<?= $Page->USGRt21->viewAttributes() ?>>
<?= $Page->USGRt21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
        <td <?= $Page->USGRt22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt22" class="ivf_stimulation_chart_USGRt22">
<span<?= $Page->USGRt22->viewAttributes() ?>>
<?= $Page->USGRt22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
        <td <?= $Page->USGRt23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt23" class="ivf_stimulation_chart_USGRt23">
<span<?= $Page->USGRt23->viewAttributes() ?>>
<?= $Page->USGRt23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
        <td <?= $Page->USGRt24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt24" class="ivf_stimulation_chart_USGRt24">
<span<?= $Page->USGRt24->viewAttributes() ?>>
<?= $Page->USGRt24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
        <td <?= $Page->USGRt25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGRt25" class="ivf_stimulation_chart_USGRt25">
<span<?= $Page->USGRt25->viewAttributes() ?>>
<?= $Page->USGRt25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
        <td <?= $Page->USGLt14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt14" class="ivf_stimulation_chart_USGLt14">
<span<?= $Page->USGLt14->viewAttributes() ?>>
<?= $Page->USGLt14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
        <td <?= $Page->USGLt15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt15" class="ivf_stimulation_chart_USGLt15">
<span<?= $Page->USGLt15->viewAttributes() ?>>
<?= $Page->USGLt15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
        <td <?= $Page->USGLt16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt16" class="ivf_stimulation_chart_USGLt16">
<span<?= $Page->USGLt16->viewAttributes() ?>>
<?= $Page->USGLt16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
        <td <?= $Page->USGLt17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt17" class="ivf_stimulation_chart_USGLt17">
<span<?= $Page->USGLt17->viewAttributes() ?>>
<?= $Page->USGLt17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
        <td <?= $Page->USGLt18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt18" class="ivf_stimulation_chart_USGLt18">
<span<?= $Page->USGLt18->viewAttributes() ?>>
<?= $Page->USGLt18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
        <td <?= $Page->USGLt19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt19" class="ivf_stimulation_chart_USGLt19">
<span<?= $Page->USGLt19->viewAttributes() ?>>
<?= $Page->USGLt19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
        <td <?= $Page->USGLt20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt20" class="ivf_stimulation_chart_USGLt20">
<span<?= $Page->USGLt20->viewAttributes() ?>>
<?= $Page->USGLt20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
        <td <?= $Page->USGLt21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt21" class="ivf_stimulation_chart_USGLt21">
<span<?= $Page->USGLt21->viewAttributes() ?>>
<?= $Page->USGLt21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
        <td <?= $Page->USGLt22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt22" class="ivf_stimulation_chart_USGLt22">
<span<?= $Page->USGLt22->viewAttributes() ?>>
<?= $Page->USGLt22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
        <td <?= $Page->USGLt23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt23" class="ivf_stimulation_chart_USGLt23">
<span<?= $Page->USGLt23->viewAttributes() ?>>
<?= $Page->USGLt23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
        <td <?= $Page->USGLt24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt24" class="ivf_stimulation_chart_USGLt24">
<span<?= $Page->USGLt24->viewAttributes() ?>>
<?= $Page->USGLt24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
        <td <?= $Page->USGLt25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_USGLt25" class="ivf_stimulation_chart_USGLt25">
<span<?= $Page->USGLt25->viewAttributes() ?>>
<?= $Page->USGLt25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
        <td <?= $Page->EM14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM14" class="ivf_stimulation_chart_EM14">
<span<?= $Page->EM14->viewAttributes() ?>>
<?= $Page->EM14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
        <td <?= $Page->EM15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM15" class="ivf_stimulation_chart_EM15">
<span<?= $Page->EM15->viewAttributes() ?>>
<?= $Page->EM15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
        <td <?= $Page->EM16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM16" class="ivf_stimulation_chart_EM16">
<span<?= $Page->EM16->viewAttributes() ?>>
<?= $Page->EM16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
        <td <?= $Page->EM17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM17" class="ivf_stimulation_chart_EM17">
<span<?= $Page->EM17->viewAttributes() ?>>
<?= $Page->EM17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
        <td <?= $Page->EM18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM18" class="ivf_stimulation_chart_EM18">
<span<?= $Page->EM18->viewAttributes() ?>>
<?= $Page->EM18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
        <td <?= $Page->EM19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM19" class="ivf_stimulation_chart_EM19">
<span<?= $Page->EM19->viewAttributes() ?>>
<?= $Page->EM19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
        <td <?= $Page->EM20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM20" class="ivf_stimulation_chart_EM20">
<span<?= $Page->EM20->viewAttributes() ?>>
<?= $Page->EM20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
        <td <?= $Page->EM21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM21" class="ivf_stimulation_chart_EM21">
<span<?= $Page->EM21->viewAttributes() ?>>
<?= $Page->EM21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
        <td <?= $Page->EM22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM22" class="ivf_stimulation_chart_EM22">
<span<?= $Page->EM22->viewAttributes() ?>>
<?= $Page->EM22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
        <td <?= $Page->EM23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM23" class="ivf_stimulation_chart_EM23">
<span<?= $Page->EM23->viewAttributes() ?>>
<?= $Page->EM23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
        <td <?= $Page->EM24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM24" class="ivf_stimulation_chart_EM24">
<span<?= $Page->EM24->viewAttributes() ?>>
<?= $Page->EM24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
        <td <?= $Page->EM25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EM25" class="ivf_stimulation_chart_EM25">
<span<?= $Page->EM25->viewAttributes() ?>>
<?= $Page->EM25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
        <td <?= $Page->Others14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others14" class="ivf_stimulation_chart_Others14">
<span<?= $Page->Others14->viewAttributes() ?>>
<?= $Page->Others14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
        <td <?= $Page->Others15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others15" class="ivf_stimulation_chart_Others15">
<span<?= $Page->Others15->viewAttributes() ?>>
<?= $Page->Others15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
        <td <?= $Page->Others16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others16" class="ivf_stimulation_chart_Others16">
<span<?= $Page->Others16->viewAttributes() ?>>
<?= $Page->Others16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
        <td <?= $Page->Others17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others17" class="ivf_stimulation_chart_Others17">
<span<?= $Page->Others17->viewAttributes() ?>>
<?= $Page->Others17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
        <td <?= $Page->Others18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others18" class="ivf_stimulation_chart_Others18">
<span<?= $Page->Others18->viewAttributes() ?>>
<?= $Page->Others18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
        <td <?= $Page->Others19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others19" class="ivf_stimulation_chart_Others19">
<span<?= $Page->Others19->viewAttributes() ?>>
<?= $Page->Others19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
        <td <?= $Page->Others20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others20" class="ivf_stimulation_chart_Others20">
<span<?= $Page->Others20->viewAttributes() ?>>
<?= $Page->Others20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
        <td <?= $Page->Others21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others21" class="ivf_stimulation_chart_Others21">
<span<?= $Page->Others21->viewAttributes() ?>>
<?= $Page->Others21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
        <td <?= $Page->Others22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others22" class="ivf_stimulation_chart_Others22">
<span<?= $Page->Others22->viewAttributes() ?>>
<?= $Page->Others22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
        <td <?= $Page->Others23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others23" class="ivf_stimulation_chart_Others23">
<span<?= $Page->Others23->viewAttributes() ?>>
<?= $Page->Others23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
        <td <?= $Page->Others24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others24" class="ivf_stimulation_chart_Others24">
<span<?= $Page->Others24->viewAttributes() ?>>
<?= $Page->Others24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
        <td <?= $Page->Others25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_Others25" class="ivf_stimulation_chart_Others25">
<span<?= $Page->Others25->viewAttributes() ?>>
<?= $Page->Others25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
        <td <?= $Page->DR14->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR14" class="ivf_stimulation_chart_DR14">
<span<?= $Page->DR14->viewAttributes() ?>>
<?= $Page->DR14->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
        <td <?= $Page->DR15->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR15" class="ivf_stimulation_chart_DR15">
<span<?= $Page->DR15->viewAttributes() ?>>
<?= $Page->DR15->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
        <td <?= $Page->DR16->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR16" class="ivf_stimulation_chart_DR16">
<span<?= $Page->DR16->viewAttributes() ?>>
<?= $Page->DR16->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
        <td <?= $Page->DR17->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR17" class="ivf_stimulation_chart_DR17">
<span<?= $Page->DR17->viewAttributes() ?>>
<?= $Page->DR17->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
        <td <?= $Page->DR18->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR18" class="ivf_stimulation_chart_DR18">
<span<?= $Page->DR18->viewAttributes() ?>>
<?= $Page->DR18->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
        <td <?= $Page->DR19->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR19" class="ivf_stimulation_chart_DR19">
<span<?= $Page->DR19->viewAttributes() ?>>
<?= $Page->DR19->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
        <td <?= $Page->DR20->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR20" class="ivf_stimulation_chart_DR20">
<span<?= $Page->DR20->viewAttributes() ?>>
<?= $Page->DR20->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
        <td <?= $Page->DR21->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR21" class="ivf_stimulation_chart_DR21">
<span<?= $Page->DR21->viewAttributes() ?>>
<?= $Page->DR21->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
        <td <?= $Page->DR22->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR22" class="ivf_stimulation_chart_DR22">
<span<?= $Page->DR22->viewAttributes() ?>>
<?= $Page->DR22->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
        <td <?= $Page->DR23->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR23" class="ivf_stimulation_chart_DR23">
<span<?= $Page->DR23->viewAttributes() ?>>
<?= $Page->DR23->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
        <td <?= $Page->DR24->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR24" class="ivf_stimulation_chart_DR24">
<span<?= $Page->DR24->viewAttributes() ?>>
<?= $Page->DR24->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
        <td <?= $Page->DR25->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DR25" class="ivf_stimulation_chart_DR25">
<span<?= $Page->DR25->viewAttributes() ?>>
<?= $Page->DR25->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
        <td <?= $Page->E214->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E214" class="ivf_stimulation_chart_E214">
<span<?= $Page->E214->viewAttributes() ?>>
<?= $Page->E214->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
        <td <?= $Page->E215->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E215" class="ivf_stimulation_chart_E215">
<span<?= $Page->E215->viewAttributes() ?>>
<?= $Page->E215->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
        <td <?= $Page->E216->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E216" class="ivf_stimulation_chart_E216">
<span<?= $Page->E216->viewAttributes() ?>>
<?= $Page->E216->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
        <td <?= $Page->E217->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E217" class="ivf_stimulation_chart_E217">
<span<?= $Page->E217->viewAttributes() ?>>
<?= $Page->E217->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
        <td <?= $Page->E218->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E218" class="ivf_stimulation_chart_E218">
<span<?= $Page->E218->viewAttributes() ?>>
<?= $Page->E218->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
        <td <?= $Page->E219->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E219" class="ivf_stimulation_chart_E219">
<span<?= $Page->E219->viewAttributes() ?>>
<?= $Page->E219->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
        <td <?= $Page->E220->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E220" class="ivf_stimulation_chart_E220">
<span<?= $Page->E220->viewAttributes() ?>>
<?= $Page->E220->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
        <td <?= $Page->E221->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E221" class="ivf_stimulation_chart_E221">
<span<?= $Page->E221->viewAttributes() ?>>
<?= $Page->E221->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
        <td <?= $Page->E222->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E222" class="ivf_stimulation_chart_E222">
<span<?= $Page->E222->viewAttributes() ?>>
<?= $Page->E222->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
        <td <?= $Page->E223->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E223" class="ivf_stimulation_chart_E223">
<span<?= $Page->E223->viewAttributes() ?>>
<?= $Page->E223->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
        <td <?= $Page->E224->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E224" class="ivf_stimulation_chart_E224">
<span<?= $Page->E224->viewAttributes() ?>>
<?= $Page->E224->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
        <td <?= $Page->E225->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_E225" class="ivf_stimulation_chart_E225">
<span<?= $Page->E225->viewAttributes() ?>>
<?= $Page->E225->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
        <td <?= $Page->EEETTTDTE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EEETTTDTE" class="ivf_stimulation_chart_EEETTTDTE">
<span<?= $Page->EEETTTDTE->viewAttributes() ?>>
<?= $Page->EEETTTDTE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
        <td <?= $Page->bhcgdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_bhcgdate" class="ivf_stimulation_chart_bhcgdate">
<span<?= $Page->bhcgdate->viewAttributes() ?>>
<?= $Page->bhcgdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <td <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TUBAL_PATENCY" class="ivf_stimulation_chart_TUBAL_PATENCY">
<span<?= $Page->TUBAL_PATENCY->viewAttributes() ?>>
<?= $Page->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
        <td <?= $Page->HSG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_HSG" class="ivf_stimulation_chart_HSG">
<span<?= $Page->HSG->viewAttributes() ?>>
<?= $Page->HSG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
        <td <?= $Page->DHL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_DHL" class="ivf_stimulation_chart_DHL">
<span<?= $Page->DHL->viewAttributes() ?>>
<?= $Page->DHL->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <td <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_UTERINE_PROBLEMS" class="ivf_stimulation_chart_UTERINE_PROBLEMS">
<span<?= $Page->UTERINE_PROBLEMS->viewAttributes() ?>>
<?= $Page->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <td <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_W_COMORBIDS" class="ivf_stimulation_chart_W_COMORBIDS">
<span<?= $Page->W_COMORBIDS->viewAttributes() ?>>
<?= $Page->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <td <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_H_COMORBIDS" class="ivf_stimulation_chart_H_COMORBIDS">
<span<?= $Page->H_COMORBIDS->viewAttributes() ?>>
<?= $Page->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <td <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SEXUAL_DYSFUNCTION" class="ivf_stimulation_chart_SEXUAL_DYSFUNCTION">
<span<?= $Page->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?= $Page->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <td <?= $Page->TABLETS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_TABLETS" class="ivf_stimulation_chart_TABLETS">
<span<?= $Page->TABLETS->viewAttributes() ?>>
<?= $Page->TABLETS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <td <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_FOLLICLE_STATUS" class="ivf_stimulation_chart_FOLLICLE_STATUS">
<span<?= $Page->FOLLICLE_STATUS->viewAttributes() ?>>
<?= $Page->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <td <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_NUMBER_OF_IUI" class="ivf_stimulation_chart_NUMBER_OF_IUI">
<span<?= $Page->NUMBER_OF_IUI->viewAttributes() ?>>
<?= $Page->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <td <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_PROCEDURE" class="ivf_stimulation_chart_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <td <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_LUTEAL_SUPPORT" class="ivf_stimulation_chart_LUTEAL_SUPPORT">
<span<?= $Page->LUTEAL_SUPPORT->viewAttributes() ?>>
<?= $Page->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <td <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS" class="ivf_stimulation_chart_SPECIFIC_MATERNAL_PROBLEMS">
<span<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <td <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_ONGOING_PREG" class="ivf_stimulation_chart_ONGOING_PREG">
<span<?= $Page->ONGOING_PREG->viewAttributes() ?>>
<?= $Page->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <td <?= $Page->EDD_Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_stimulation_chart_EDD_Date" class="ivf_stimulation_chart_EDD_Date">
<span<?= $Page->EDD_Date->viewAttributes() ?>>
<?= $Page->EDD_Date->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
