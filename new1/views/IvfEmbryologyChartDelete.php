<?php

namespace PHPMaker2021\project3;

// Page object
$IvfEmbryologyChartDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_embryology_chartdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_embryology_chartdelete = currentForm = new ew.Form("fivf_embryology_chartdelete", "delete");
    loadjs.done("fivf_embryology_chartdelete");
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
<form name="fivf_embryology_chartdelete" id="fivf_embryology_chartdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_id" class="ivf_embryology_chart_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th class="<?= $Page->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <th class="<?= $Page->SpermOrigin->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin"><?= $Page->SpermOrigin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <th class="<?= $Page->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <th class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage"><?= $Page->Day0OocyteStage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <th class="<?= $Page->Day0PolarBodyPosition->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition"><?= $Page->Day0PolarBodyPosition->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <th class="<?= $Page->Day0Breakage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage"><?= $Page->Day0Breakage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <th class="<?= $Page->Day1PN->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN"><?= $Page->Day1PN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <th class="<?= $Page->Day1PB->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB"><?= $Page->Day1PB->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <th class="<?= $Page->Day1Pronucleus->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus"><?= $Page->Day1Pronucleus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <th class="<?= $Page->Day1Nucleolus->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus"><?= $Page->Day1Nucleolus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <th class="<?= $Page->Day1Halo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo"><?= $Page->Day1Halo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <th class="<?= $Page->Day1Sperm->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm"><?= $Page->Day1Sperm->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <th class="<?= $Page->Day2CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo"><?= $Page->Day2CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <th class="<?= $Page->Day2Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag"><?= $Page->Day2Frag->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <th class="<?= $Page->Day2Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry"><?= $Page->Day2Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <th class="<?= $Page->Day2Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop"><?= $Page->Day2Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <th class="<?= $Page->Day3CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo"><?= $Page->Day3CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <th class="<?= $Page->Day3Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag"><?= $Page->Day3Frag->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <th class="<?= $Page->Day3Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry"><?= $Page->Day3Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <th class="<?= $Page->Day3Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade"><?= $Page->Day3Grade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <th class="<?= $Page->Day3Vacoules->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules"><?= $Page->Day3Vacoules->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <th class="<?= $Page->Day3ZP->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP"><?= $Page->Day3ZP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <th class="<?= $Page->Day3Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop"><?= $Page->Day3Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <th class="<?= $Page->Day4CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo"><?= $Page->Day4CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <th class="<?= $Page->Day4Frag->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag"><?= $Page->Day4Frag->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <th class="<?= $Page->Day4Symmetry->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry"><?= $Page->Day4Symmetry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <th class="<?= $Page->Day4Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade"><?= $Page->Day4Grade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <th class="<?= $Page->Day4Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop"><?= $Page->Day4Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <th class="<?= $Page->Day5CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo"><?= $Page->Day5CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <th class="<?= $Page->Day5ICM->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM"><?= $Page->Day5ICM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <th class="<?= $Page->Day5TE->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE"><?= $Page->Day5TE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <th class="<?= $Page->Day5Observation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation"><?= $Page->Day5Observation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <th class="<?= $Page->Day5Collapsed->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed"><?= $Page->Day5Collapsed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <th class="<?= $Page->Day5Vacoulles->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles"><?= $Page->Day5Vacoulles->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <th class="<?= $Page->Day5Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade"><?= $Page->Day5Grade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <th class="<?= $Page->Day5Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop"><?= $Page->Day5Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <th class="<?= $Page->Day6CellNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo"><?= $Page->Day6CellNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <th class="<?= $Page->Day6ICM->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM"><?= $Page->Day6ICM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <th class="<?= $Page->Day6TE->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE"><?= $Page->Day6TE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <th class="<?= $Page->Day6Observation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation"><?= $Page->Day6Observation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <th class="<?= $Page->Day6Collapsed->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed"><?= $Page->Day6Collapsed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <th class="<?= $Page->Day6Vacoulles->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles"><?= $Page->Day6Vacoulles->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <th class="<?= $Page->Day6Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade"><?= $Page->Day6Grade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <th class="<?= $Page->Day6Cryoptop->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop"><?= $Page->Day6Cryoptop->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <th class="<?= $Page->EndingDay->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay"><?= $Page->EndingDay->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <th class="<?= $Page->EndingCellStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage"><?= $Page->EndingCellStage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <th class="<?= $Page->EndingGrade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade"><?= $Page->EndingGrade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
        <th class="<?= $Page->EndingState->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState"><?= $Page->EndingState->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <th class="<?= $Page->Day0sino->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino"><?= $Page->Day0sino->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <th class="<?= $Page->Day0Attempts->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts"><?= $Page->Day0Attempts->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <th class="<?= $Page->Day0SPZMorpho->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho"><?= $Page->Day0SPZMorpho->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <th class="<?= $Page->Day0SPZLocation->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation"><?= $Page->Day0SPZLocation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <th class="<?= $Page->Day2Grade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade"><?= $Page->Day2Grade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <th class="<?= $Page->Day3Sino->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino"><?= $Page->Day3Sino->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
        <th class="<?= $Page->Day3End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End"><?= $Page->Day3End->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <th class="<?= $Page->Day4SiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo"><?= $Page->Day4SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <th class="<?= $Page->Day0SpOrgin->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin"><?= $Page->Day0SpOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <th class="<?= $Page->DidNO->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO"><?= $Page->DidNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <th class="<?= $Page->ICSiIVFDateTime->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime"><?= $Page->ICSiIVFDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <th class="<?= $Page->PrimaryEmbrologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist"><?= $Page->PrimaryEmbrologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <th class="<?= $Page->SecondaryEmbrologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist"><?= $Page->SecondaryEmbrologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <th class="<?= $Page->Incubator->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator"><?= $Page->Incubator->caption() ?></span></th>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
        <th class="<?= $Page->location->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_location" class="ivf_embryology_chart_location"><?= $Page->location->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th class="<?= $Page->OocyteNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo"><?= $Page->OocyteNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th class="<?= $Page->Stage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage"><?= $Page->Stage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <th class="<?= $Page->vitrificationDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate"><?= $Page->vitrificationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <th class="<?= $Page->vitriPrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist"><?= $Page->vitriPrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <th class="<?= $Page->vitriSecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist"><?= $Page->vitriSecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <th class="<?= $Page->vitriEmbryoNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo"><?= $Page->vitriEmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <th class="<?= $Page->vitriFertilisationDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate"><?= $Page->vitriFertilisationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <th class="<?= $Page->vitriDay->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay"><?= $Page->vitriDay->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <th class="<?= $Page->vitriGrade->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade"><?= $Page->vitriGrade->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <th class="<?= $Page->vitriIncubator->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator"><?= $Page->vitriIncubator->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <th class="<?= $Page->vitriTank->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank"><?= $Page->vitriTank->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <th class="<?= $Page->vitriCanister->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister"><?= $Page->vitriCanister->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <th class="<?= $Page->vitriGobiet->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet"><?= $Page->vitriGobiet->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <th class="<?= $Page->vitriViscotube->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube"><?= $Page->vitriViscotube->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <th class="<?= $Page->vitriCryolockNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo"><?= $Page->vitriCryolockNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <th class="<?= $Page->vitriCryolockColour->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour"><?= $Page->vitriCryolockColour->caption() ?></span></th>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <th class="<?= $Page->vitriStage->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage"><?= $Page->vitriStage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <th class="<?= $Page->thawDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate"><?= $Page->thawDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <th class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist"><?= $Page->thawPrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <th class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist"><?= $Page->thawSecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <th class="<?= $Page->thawET->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET"><?= $Page->thawET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <th class="<?= $Page->thawReFrozen->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen"><?= $Page->thawReFrozen->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <th class="<?= $Page->thawAbserve->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve"><?= $Page->thawAbserve->caption() ?></span></th>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <th class="<?= $Page->thawDiscard->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard"><?= $Page->thawDiscard->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <th class="<?= $Page->ETCatheter->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter"><?= $Page->ETCatheter->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <th class="<?= $Page->ETDifficulty->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty"><?= $Page->ETDifficulty->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <th class="<?= $Page->ETEasy->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy"><?= $Page->ETEasy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
        <th class="<?= $Page->ETComments->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments"><?= $Page->ETComments->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <th class="<?= $Page->ETDoctor->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor"><?= $Page->ETDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <th class="<?= $Page->ETEmbryologist->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist"><?= $Page->ETEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
        <th class="<?= $Page->Day2End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End"><?= $Page->Day2End->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <th class="<?= $Page->Day2SiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo"><?= $Page->Day2SiNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <th class="<?= $Page->EndSiNo->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo"><?= $Page->EndSiNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
        <th class="<?= $Page->Day4End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End"><?= $Page->Day4End->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <th class="<?= $Page->ETDate->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate"><?= $Page->ETDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
        <th class="<?= $Page->Day1End->headerCellClass() ?>"><span id="elh_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End"><?= $Page->Day1End->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_id" class="ivf_embryology_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_RIDNo" class="ivf_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Name" class="ivf_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ARTCycle" class="ivf_embryology_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <td <?= $Page->SpermOrigin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SpermOrigin" class="ivf_embryology_chart_SpermOrigin">
<span<?= $Page->SpermOrigin->viewAttributes() ?>>
<?= $Page->SpermOrigin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_InseminatinTechnique" class="ivf_embryology_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_IndicationForART" class="ivf_embryology_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0OocyteStage" class="ivf_embryology_chart_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <td <?= $Page->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0PolarBodyPosition" class="ivf_embryology_chart_Day0PolarBodyPosition">
<span<?= $Page->Day0PolarBodyPosition->viewAttributes() ?>>
<?= $Page->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <td <?= $Page->Day0Breakage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Breakage" class="ivf_embryology_chart_Day0Breakage">
<span<?= $Page->Day0Breakage->viewAttributes() ?>>
<?= $Page->Day0Breakage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <td <?= $Page->Day1PN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PN" class="ivf_embryology_chart_Day1PN">
<span<?= $Page->Day1PN->viewAttributes() ?>>
<?= $Page->Day1PN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <td <?= $Page->Day1PB->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1PB" class="ivf_embryology_chart_Day1PB">
<span<?= $Page->Day1PB->viewAttributes() ?>>
<?= $Page->Day1PB->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <td <?= $Page->Day1Pronucleus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Pronucleus" class="ivf_embryology_chart_Day1Pronucleus">
<span<?= $Page->Day1Pronucleus->viewAttributes() ?>>
<?= $Page->Day1Pronucleus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <td <?= $Page->Day1Nucleolus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Nucleolus" class="ivf_embryology_chart_Day1Nucleolus">
<span<?= $Page->Day1Nucleolus->viewAttributes() ?>>
<?= $Page->Day1Nucleolus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <td <?= $Page->Day1Halo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Halo" class="ivf_embryology_chart_Day1Halo">
<span<?= $Page->Day1Halo->viewAttributes() ?>>
<?= $Page->Day1Halo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <td <?= $Page->Day1Sperm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1Sperm" class="ivf_embryology_chart_Day1Sperm">
<span<?= $Page->Day1Sperm->viewAttributes() ?>>
<?= $Page->Day1Sperm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <td <?= $Page->Day2CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2CellNo" class="ivf_embryology_chart_Day2CellNo">
<span<?= $Page->Day2CellNo->viewAttributes() ?>>
<?= $Page->Day2CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <td <?= $Page->Day2Frag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Frag" class="ivf_embryology_chart_Day2Frag">
<span<?= $Page->Day2Frag->viewAttributes() ?>>
<?= $Page->Day2Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <td <?= $Page->Day2Symmetry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Symmetry" class="ivf_embryology_chart_Day2Symmetry">
<span<?= $Page->Day2Symmetry->viewAttributes() ?>>
<?= $Page->Day2Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <td <?= $Page->Day2Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Cryoptop" class="ivf_embryology_chart_Day2Cryoptop">
<span<?= $Page->Day2Cryoptop->viewAttributes() ?>>
<?= $Page->Day2Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <td <?= $Page->Day3CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3CellNo" class="ivf_embryology_chart_Day3CellNo">
<span<?= $Page->Day3CellNo->viewAttributes() ?>>
<?= $Page->Day3CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <td <?= $Page->Day3Frag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Frag" class="ivf_embryology_chart_Day3Frag">
<span<?= $Page->Day3Frag->viewAttributes() ?>>
<?= $Page->Day3Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <td <?= $Page->Day3Symmetry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Symmetry" class="ivf_embryology_chart_Day3Symmetry">
<span<?= $Page->Day3Symmetry->viewAttributes() ?>>
<?= $Page->Day3Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <td <?= $Page->Day3Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Grade" class="ivf_embryology_chart_Day3Grade">
<span<?= $Page->Day3Grade->viewAttributes() ?>>
<?= $Page->Day3Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <td <?= $Page->Day3Vacoules->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Vacoules" class="ivf_embryology_chart_Day3Vacoules">
<span<?= $Page->Day3Vacoules->viewAttributes() ?>>
<?= $Page->Day3Vacoules->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <td <?= $Page->Day3ZP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3ZP" class="ivf_embryology_chart_Day3ZP">
<span<?= $Page->Day3ZP->viewAttributes() ?>>
<?= $Page->Day3ZP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <td <?= $Page->Day3Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Cryoptop" class="ivf_embryology_chart_Day3Cryoptop">
<span<?= $Page->Day3Cryoptop->viewAttributes() ?>>
<?= $Page->Day3Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <td <?= $Page->Day4CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4CellNo" class="ivf_embryology_chart_Day4CellNo">
<span<?= $Page->Day4CellNo->viewAttributes() ?>>
<?= $Page->Day4CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <td <?= $Page->Day4Frag->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Frag" class="ivf_embryology_chart_Day4Frag">
<span<?= $Page->Day4Frag->viewAttributes() ?>>
<?= $Page->Day4Frag->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <td <?= $Page->Day4Symmetry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Symmetry" class="ivf_embryology_chart_Day4Symmetry">
<span<?= $Page->Day4Symmetry->viewAttributes() ?>>
<?= $Page->Day4Symmetry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <td <?= $Page->Day4Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Grade" class="ivf_embryology_chart_Day4Grade">
<span<?= $Page->Day4Grade->viewAttributes() ?>>
<?= $Page->Day4Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <td <?= $Page->Day4Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4Cryoptop" class="ivf_embryology_chart_Day4Cryoptop">
<span<?= $Page->Day4Cryoptop->viewAttributes() ?>>
<?= $Page->Day4Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <td <?= $Page->Day5CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5CellNo" class="ivf_embryology_chart_Day5CellNo">
<span<?= $Page->Day5CellNo->viewAttributes() ?>>
<?= $Page->Day5CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <td <?= $Page->Day5ICM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5ICM" class="ivf_embryology_chart_Day5ICM">
<span<?= $Page->Day5ICM->viewAttributes() ?>>
<?= $Page->Day5ICM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <td <?= $Page->Day5TE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5TE" class="ivf_embryology_chart_Day5TE">
<span<?= $Page->Day5TE->viewAttributes() ?>>
<?= $Page->Day5TE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <td <?= $Page->Day5Observation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Observation" class="ivf_embryology_chart_Day5Observation">
<span<?= $Page->Day5Observation->viewAttributes() ?>>
<?= $Page->Day5Observation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <td <?= $Page->Day5Collapsed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Collapsed" class="ivf_embryology_chart_Day5Collapsed">
<span<?= $Page->Day5Collapsed->viewAttributes() ?>>
<?= $Page->Day5Collapsed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <td <?= $Page->Day5Vacoulles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Vacoulles" class="ivf_embryology_chart_Day5Vacoulles">
<span<?= $Page->Day5Vacoulles->viewAttributes() ?>>
<?= $Page->Day5Vacoulles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <td <?= $Page->Day5Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Grade" class="ivf_embryology_chart_Day5Grade">
<span<?= $Page->Day5Grade->viewAttributes() ?>>
<?= $Page->Day5Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <td <?= $Page->Day5Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day5Cryoptop" class="ivf_embryology_chart_Day5Cryoptop">
<span<?= $Page->Day5Cryoptop->viewAttributes() ?>>
<?= $Page->Day5Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <td <?= $Page->Day6CellNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6CellNo" class="ivf_embryology_chart_Day6CellNo">
<span<?= $Page->Day6CellNo->viewAttributes() ?>>
<?= $Page->Day6CellNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <td <?= $Page->Day6ICM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6ICM" class="ivf_embryology_chart_Day6ICM">
<span<?= $Page->Day6ICM->viewAttributes() ?>>
<?= $Page->Day6ICM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <td <?= $Page->Day6TE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6TE" class="ivf_embryology_chart_Day6TE">
<span<?= $Page->Day6TE->viewAttributes() ?>>
<?= $Page->Day6TE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <td <?= $Page->Day6Observation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Observation" class="ivf_embryology_chart_Day6Observation">
<span<?= $Page->Day6Observation->viewAttributes() ?>>
<?= $Page->Day6Observation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <td <?= $Page->Day6Collapsed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Collapsed" class="ivf_embryology_chart_Day6Collapsed">
<span<?= $Page->Day6Collapsed->viewAttributes() ?>>
<?= $Page->Day6Collapsed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <td <?= $Page->Day6Vacoulles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Vacoulles" class="ivf_embryology_chart_Day6Vacoulles">
<span<?= $Page->Day6Vacoulles->viewAttributes() ?>>
<?= $Page->Day6Vacoulles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <td <?= $Page->Day6Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Grade" class="ivf_embryology_chart_Day6Grade">
<span<?= $Page->Day6Grade->viewAttributes() ?>>
<?= $Page->Day6Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <td <?= $Page->Day6Cryoptop->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day6Cryoptop" class="ivf_embryology_chart_Day6Cryoptop">
<span<?= $Page->Day6Cryoptop->viewAttributes() ?>>
<?= $Page->Day6Cryoptop->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <td <?= $Page->EndingDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingDay" class="ivf_embryology_chart_EndingDay">
<span<?= $Page->EndingDay->viewAttributes() ?>>
<?= $Page->EndingDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <td <?= $Page->EndingCellStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingCellStage" class="ivf_embryology_chart_EndingCellStage">
<span<?= $Page->EndingCellStage->viewAttributes() ?>>
<?= $Page->EndingCellStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <td <?= $Page->EndingGrade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingGrade" class="ivf_embryology_chart_EndingGrade">
<span<?= $Page->EndingGrade->viewAttributes() ?>>
<?= $Page->EndingGrade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
        <td <?= $Page->EndingState->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndingState" class="ivf_embryology_chart_EndingState">
<span<?= $Page->EndingState->viewAttributes() ?>>
<?= $Page->EndingState->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td <?= $Page->Day0sino->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0sino" class="ivf_embryology_chart_Day0sino">
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <td <?= $Page->Day0Attempts->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0Attempts" class="ivf_embryology_chart_Day0Attempts">
<span<?= $Page->Day0Attempts->viewAttributes() ?>>
<?= $Page->Day0Attempts->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <td <?= $Page->Day0SPZMorpho->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZMorpho" class="ivf_embryology_chart_Day0SPZMorpho">
<span<?= $Page->Day0SPZMorpho->viewAttributes() ?>>
<?= $Page->Day0SPZMorpho->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <td <?= $Page->Day0SPZLocation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SPZLocation" class="ivf_embryology_chart_Day0SPZLocation">
<span<?= $Page->Day0SPZLocation->viewAttributes() ?>>
<?= $Page->Day0SPZLocation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <td <?= $Page->Day2Grade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2Grade" class="ivf_embryology_chart_Day2Grade">
<span<?= $Page->Day2Grade->viewAttributes() ?>>
<?= $Page->Day2Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <td <?= $Page->Day3Sino->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3Sino" class="ivf_embryology_chart_Day3Sino">
<span<?= $Page->Day3Sino->viewAttributes() ?>>
<?= $Page->Day3Sino->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
        <td <?= $Page->Day3End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day3End" class="ivf_embryology_chart_Day3End">
<span<?= $Page->Day3End->viewAttributes() ?>>
<?= $Page->Day3End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <td <?= $Page->Day4SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4SiNo" class="ivf_embryology_chart_Day4SiNo">
<span<?= $Page->Day4SiNo->viewAttributes() ?>>
<?= $Page->Day4SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_TidNo" class="ivf_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <td <?= $Page->Day0SpOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day0SpOrgin" class="ivf_embryology_chart_Day0SpOrgin">
<span<?= $Page->Day0SpOrgin->viewAttributes() ?>>
<?= $Page->Day0SpOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td <?= $Page->DidNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_DidNO" class="ivf_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <td <?= $Page->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ICSiIVFDateTime" class="ivf_embryology_chart_ICSiIVFDateTime">
<span<?= $Page->ICSiIVFDateTime->viewAttributes() ?>>
<?= $Page->ICSiIVFDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <td <?= $Page->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_PrimaryEmbrologist" class="ivf_embryology_chart_PrimaryEmbrologist">
<span<?= $Page->PrimaryEmbrologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbrologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <td <?= $Page->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_SecondaryEmbrologist" class="ivf_embryology_chart_SecondaryEmbrologist">
<span<?= $Page->SecondaryEmbrologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbrologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <td <?= $Page->Incubator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Incubator" class="ivf_embryology_chart_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
        <td <?= $Page->location->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_location" class="ivf_embryology_chart_location">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Remarks" class="ivf_embryology_chart_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_OocyteNo" class="ivf_embryology_chart_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <td <?= $Page->Stage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Stage" class="ivf_embryology_chart_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <td <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitrificationDate" class="ivf_embryology_chart_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <td <?= $Page->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriPrimaryEmbryologist" class="ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?= $Page->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <td <?= $Page->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriSecondaryEmbryologist" class="ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?= $Page->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <td <?= $Page->vitriEmbryoNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriEmbryoNo" class="ivf_embryology_chart_vitriEmbryoNo">
<span<?= $Page->vitriEmbryoNo->viewAttributes() ?>>
<?= $Page->vitriEmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <td <?= $Page->vitriFertilisationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriFertilisationDate" class="ivf_embryology_chart_vitriFertilisationDate">
<span<?= $Page->vitriFertilisationDate->viewAttributes() ?>>
<?= $Page->vitriFertilisationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <td <?= $Page->vitriDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriDay" class="ivf_embryology_chart_vitriDay">
<span<?= $Page->vitriDay->viewAttributes() ?>>
<?= $Page->vitriDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <td <?= $Page->vitriGrade->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGrade" class="ivf_embryology_chart_vitriGrade">
<span<?= $Page->vitriGrade->viewAttributes() ?>>
<?= $Page->vitriGrade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <td <?= $Page->vitriIncubator->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriIncubator" class="ivf_embryology_chart_vitriIncubator">
<span<?= $Page->vitriIncubator->viewAttributes() ?>>
<?= $Page->vitriIncubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <td <?= $Page->vitriTank->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriTank" class="ivf_embryology_chart_vitriTank">
<span<?= $Page->vitriTank->viewAttributes() ?>>
<?= $Page->vitriTank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <td <?= $Page->vitriCanister->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCanister" class="ivf_embryology_chart_vitriCanister">
<span<?= $Page->vitriCanister->viewAttributes() ?>>
<?= $Page->vitriCanister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <td <?= $Page->vitriGobiet->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriGobiet" class="ivf_embryology_chart_vitriGobiet">
<span<?= $Page->vitriGobiet->viewAttributes() ?>>
<?= $Page->vitriGobiet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <td <?= $Page->vitriViscotube->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriViscotube" class="ivf_embryology_chart_vitriViscotube">
<span<?= $Page->vitriViscotube->viewAttributes() ?>>
<?= $Page->vitriViscotube->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <td <?= $Page->vitriCryolockNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockNo" class="ivf_embryology_chart_vitriCryolockNo">
<span<?= $Page->vitriCryolockNo->viewAttributes() ?>>
<?= $Page->vitriCryolockNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <td <?= $Page->vitriCryolockColour->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriCryolockColour" class="ivf_embryology_chart_vitriCryolockColour">
<span<?= $Page->vitriCryolockColour->viewAttributes() ?>>
<?= $Page->vitriCryolockColour->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <td <?= $Page->vitriStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_vitriStage" class="ivf_embryology_chart_vitriStage">
<span<?= $Page->vitriStage->viewAttributes() ?>>
<?= $Page->vitriStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <td <?= $Page->thawDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDate" class="ivf_embryology_chart_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <td <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawPrimaryEmbryologist" class="ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <td <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawSecondaryEmbryologist" class="ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <td <?= $Page->thawET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawET" class="ivf_embryology_chart_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <td <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawReFrozen" class="ivf_embryology_chart_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <td <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawAbserve" class="ivf_embryology_chart_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <td <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_thawDiscard" class="ivf_embryology_chart_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <td <?= $Page->ETCatheter->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETCatheter" class="ivf_embryology_chart_ETCatheter">
<span<?= $Page->ETCatheter->viewAttributes() ?>>
<?= $Page->ETCatheter->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <td <?= $Page->ETDifficulty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDifficulty" class="ivf_embryology_chart_ETDifficulty">
<span<?= $Page->ETDifficulty->viewAttributes() ?>>
<?= $Page->ETDifficulty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <td <?= $Page->ETEasy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEasy" class="ivf_embryology_chart_ETEasy">
<span<?= $Page->ETEasy->viewAttributes() ?>>
<?= $Page->ETEasy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
        <td <?= $Page->ETComments->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETComments" class="ivf_embryology_chart_ETComments">
<span<?= $Page->ETComments->viewAttributes() ?>>
<?= $Page->ETComments->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <td <?= $Page->ETDoctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDoctor" class="ivf_embryology_chart_ETDoctor">
<span<?= $Page->ETDoctor->viewAttributes() ?>>
<?= $Page->ETDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <td <?= $Page->ETEmbryologist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETEmbryologist" class="ivf_embryology_chart_ETEmbryologist">
<span<?= $Page->ETEmbryologist->viewAttributes() ?>>
<?= $Page->ETEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
        <td <?= $Page->Day2End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2End" class="ivf_embryology_chart_Day2End">
<span<?= $Page->Day2End->viewAttributes() ?>>
<?= $Page->Day2End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <td <?= $Page->Day2SiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day2SiNo" class="ivf_embryology_chart_Day2SiNo">
<span<?= $Page->Day2SiNo->viewAttributes() ?>>
<?= $Page->Day2SiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <td <?= $Page->EndSiNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_EndSiNo" class="ivf_embryology_chart_EndSiNo">
<span<?= $Page->EndSiNo->viewAttributes() ?>>
<?= $Page->EndSiNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
        <td <?= $Page->Day4End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day4End" class="ivf_embryology_chart_Day4End">
<span<?= $Page->Day4End->viewAttributes() ?>>
<?= $Page->Day4End->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td <?= $Page->ETDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_ETDate" class="ivf_embryology_chart_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
        <td <?= $Page->Day1End->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_embryology_chart_Day1End" class="ivf_embryology_chart_Day1End">
<span<?= $Page->Day1End->viewAttributes() ?>>
<?= $Page->Day1End->getViewValue() ?></span>
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
