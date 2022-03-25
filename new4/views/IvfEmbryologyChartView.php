<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEmbryologyChartView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_embryology_chartview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_embryology_chartview = currentForm = new ew.Form("fivf_embryology_chartview", "view");
    loadjs.done("fivf_embryology_chartview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_embryology_chart) ew.vars.tables.ivf_embryology_chart = <?= JsonEncode(GetClientVar("tables", "ivf_embryology_chart")) ?>;
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
<form name="fivf_embryology_chartview" id="fivf_embryology_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_embryology_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
    <tr id="r_SpermOrigin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_SpermOrigin"><?= $Page->SpermOrigin->caption() ?></span></td>
        <td data-name="SpermOrigin" <?= $Page->SpermOrigin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SpermOrigin">
<span<?= $Page->SpermOrigin->viewAttributes() ?>>
<?= $Page->SpermOrigin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <tr id="r_InseminatinTechnique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></td>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <tr id="r_IndicationForART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></span></td>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
    <tr id="r_Day0sino">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0sino"><?= $Page->Day0sino->caption() ?></span></td>
        <td data-name="Day0sino" <?= $Page->Day0sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0sino">
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
    <tr id="r_Day0OocyteStage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0OocyteStage"><?= $Page->Day0OocyteStage->caption() ?></span></td>
        <td data-name="Day0OocyteStage" <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
    <tr id="r_Day0PolarBodyPosition">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0PolarBodyPosition"><?= $Page->Day0PolarBodyPosition->caption() ?></span></td>
        <td data-name="Day0PolarBodyPosition" <?= $Page->Day0PolarBodyPosition->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0PolarBodyPosition">
<span<?= $Page->Day0PolarBodyPosition->viewAttributes() ?>>
<?= $Page->Day0PolarBodyPosition->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
    <tr id="r_Day0Breakage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0Breakage"><?= $Page->Day0Breakage->caption() ?></span></td>
        <td data-name="Day0Breakage" <?= $Page->Day0Breakage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Breakage">
<span<?= $Page->Day0Breakage->viewAttributes() ?>>
<?= $Page->Day0Breakage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
    <tr id="r_Day0Attempts">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0Attempts"><?= $Page->Day0Attempts->caption() ?></span></td>
        <td data-name="Day0Attempts" <?= $Page->Day0Attempts->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0Attempts">
<span<?= $Page->Day0Attempts->viewAttributes() ?>>
<?= $Page->Day0Attempts->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
    <tr id="r_Day0SPZMorpho">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SPZMorpho"><?= $Page->Day0SPZMorpho->caption() ?></span></td>
        <td data-name="Day0SPZMorpho" <?= $Page->Day0SPZMorpho->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZMorpho">
<span<?= $Page->Day0SPZMorpho->viewAttributes() ?>>
<?= $Page->Day0SPZMorpho->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
    <tr id="r_Day0SPZLocation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SPZLocation"><?= $Page->Day0SPZLocation->caption() ?></span></td>
        <td data-name="Day0SPZLocation" <?= $Page->Day0SPZLocation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SPZLocation">
<span<?= $Page->Day0SPZLocation->viewAttributes() ?>>
<?= $Page->Day0SPZLocation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
    <tr id="r_Day0SpOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day0SpOrgin"><?= $Page->Day0SpOrgin->caption() ?></span></td>
        <td data-name="Day0SpOrgin" <?= $Page->Day0SpOrgin->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day0SpOrgin">
<span<?= $Page->Day0SpOrgin->viewAttributes() ?>>
<?= $Page->Day0SpOrgin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
    <tr id="r_Day5Cryoptop">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Cryoptop"><?= $Page->Day5Cryoptop->caption() ?></span></td>
        <td data-name="Day5Cryoptop" <?= $Page->Day5Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Cryoptop">
<span<?= $Page->Day5Cryoptop->viewAttributes() ?>>
<?= $Page->Day5Cryoptop->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
    <tr id="r_Day1Sperm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Sperm"><?= $Page->Day1Sperm->caption() ?></span></td>
        <td data-name="Day1Sperm" <?= $Page->Day1Sperm->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Sperm">
<span<?= $Page->Day1Sperm->viewAttributes() ?>>
<?= $Page->Day1Sperm->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
    <tr id="r_Day1PN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1PN"><?= $Page->Day1PN->caption() ?></span></td>
        <td data-name="Day1PN" <?= $Page->Day1PN->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PN">
<span<?= $Page->Day1PN->viewAttributes() ?>>
<?= $Page->Day1PN->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
    <tr id="r_Day1PB">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1PB"><?= $Page->Day1PB->caption() ?></span></td>
        <td data-name="Day1PB" <?= $Page->Day1PB->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1PB">
<span<?= $Page->Day1PB->viewAttributes() ?>>
<?= $Page->Day1PB->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
    <tr id="r_Day1Pronucleus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Pronucleus"><?= $Page->Day1Pronucleus->caption() ?></span></td>
        <td data-name="Day1Pronucleus" <?= $Page->Day1Pronucleus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Pronucleus">
<span<?= $Page->Day1Pronucleus->viewAttributes() ?>>
<?= $Page->Day1Pronucleus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
    <tr id="r_Day1Nucleolus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Nucleolus"><?= $Page->Day1Nucleolus->caption() ?></span></td>
        <td data-name="Day1Nucleolus" <?= $Page->Day1Nucleolus->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Nucleolus">
<span<?= $Page->Day1Nucleolus->viewAttributes() ?>>
<?= $Page->Day1Nucleolus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
    <tr id="r_Day1Halo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1Halo"><?= $Page->Day1Halo->caption() ?></span></td>
        <td data-name="Day1Halo" <?= $Page->Day1Halo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1Halo">
<span<?= $Page->Day1Halo->viewAttributes() ?>>
<?= $Page->Day1Halo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
    <tr id="r_Day2SiNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2SiNo"><?= $Page->Day2SiNo->caption() ?></span></td>
        <td data-name="Day2SiNo" <?= $Page->Day2SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2SiNo">
<span<?= $Page->Day2SiNo->viewAttributes() ?>>
<?= $Page->Day2SiNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
    <tr id="r_Day2CellNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2CellNo"><?= $Page->Day2CellNo->caption() ?></span></td>
        <td data-name="Day2CellNo" <?= $Page->Day2CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2CellNo">
<span<?= $Page->Day2CellNo->viewAttributes() ?>>
<?= $Page->Day2CellNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
    <tr id="r_Day2Frag">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Frag"><?= $Page->Day2Frag->caption() ?></span></td>
        <td data-name="Day2Frag" <?= $Page->Day2Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Frag">
<span<?= $Page->Day2Frag->viewAttributes() ?>>
<?= $Page->Day2Frag->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
    <tr id="r_Day2Symmetry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Symmetry"><?= $Page->Day2Symmetry->caption() ?></span></td>
        <td data-name="Day2Symmetry" <?= $Page->Day2Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Symmetry">
<span<?= $Page->Day2Symmetry->viewAttributes() ?>>
<?= $Page->Day2Symmetry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
    <tr id="r_Day2Cryoptop">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Cryoptop"><?= $Page->Day2Cryoptop->caption() ?></span></td>
        <td data-name="Day2Cryoptop" <?= $Page->Day2Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Cryoptop">
<span<?= $Page->Day2Cryoptop->viewAttributes() ?>>
<?= $Page->Day2Cryoptop->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
    <tr id="r_Day2Grade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2Grade"><?= $Page->Day2Grade->caption() ?></span></td>
        <td data-name="Day2Grade" <?= $Page->Day2Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2Grade">
<span<?= $Page->Day2Grade->viewAttributes() ?>>
<?= $Page->Day2Grade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
    <tr id="r_Day2End">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day2End"><?= $Page->Day2End->caption() ?></span></td>
        <td data-name="Day2End" <?= $Page->Day2End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day2End">
<span<?= $Page->Day2End->viewAttributes() ?>>
<?= $Page->Day2End->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
    <tr id="r_Day3Sino">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Sino"><?= $Page->Day3Sino->caption() ?></span></td>
        <td data-name="Day3Sino" <?= $Page->Day3Sino->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Sino">
<span<?= $Page->Day3Sino->viewAttributes() ?>>
<?= $Page->Day3Sino->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
    <tr id="r_Day3CellNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3CellNo"><?= $Page->Day3CellNo->caption() ?></span></td>
        <td data-name="Day3CellNo" <?= $Page->Day3CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3CellNo">
<span<?= $Page->Day3CellNo->viewAttributes() ?>>
<?= $Page->Day3CellNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
    <tr id="r_Day3Frag">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Frag"><?= $Page->Day3Frag->caption() ?></span></td>
        <td data-name="Day3Frag" <?= $Page->Day3Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Frag">
<span<?= $Page->Day3Frag->viewAttributes() ?>>
<?= $Page->Day3Frag->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
    <tr id="r_Day3Symmetry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Symmetry"><?= $Page->Day3Symmetry->caption() ?></span></td>
        <td data-name="Day3Symmetry" <?= $Page->Day3Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Symmetry">
<span<?= $Page->Day3Symmetry->viewAttributes() ?>>
<?= $Page->Day3Symmetry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
    <tr id="r_Day3ZP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3ZP"><?= $Page->Day3ZP->caption() ?></span></td>
        <td data-name="Day3ZP" <?= $Page->Day3ZP->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3ZP">
<span<?= $Page->Day3ZP->viewAttributes() ?>>
<?= $Page->Day3ZP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
    <tr id="r_Day3Vacoules">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Vacoules"><?= $Page->Day3Vacoules->caption() ?></span></td>
        <td data-name="Day3Vacoules" <?= $Page->Day3Vacoules->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Vacoules">
<span<?= $Page->Day3Vacoules->viewAttributes() ?>>
<?= $Page->Day3Vacoules->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
    <tr id="r_Day3Grade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Grade"><?= $Page->Day3Grade->caption() ?></span></td>
        <td data-name="Day3Grade" <?= $Page->Day3Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Grade">
<span<?= $Page->Day3Grade->viewAttributes() ?>>
<?= $Page->Day3Grade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
    <tr id="r_Day3Cryoptop">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3Cryoptop"><?= $Page->Day3Cryoptop->caption() ?></span></td>
        <td data-name="Day3Cryoptop" <?= $Page->Day3Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3Cryoptop">
<span<?= $Page->Day3Cryoptop->viewAttributes() ?>>
<?= $Page->Day3Cryoptop->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
    <tr id="r_Day3End">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day3End"><?= $Page->Day3End->caption() ?></span></td>
        <td data-name="Day3End" <?= $Page->Day3End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day3End">
<span<?= $Page->Day3End->viewAttributes() ?>>
<?= $Page->Day3End->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
    <tr id="r_Day4SiNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4SiNo"><?= $Page->Day4SiNo->caption() ?></span></td>
        <td data-name="Day4SiNo" <?= $Page->Day4SiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4SiNo">
<span<?= $Page->Day4SiNo->viewAttributes() ?>>
<?= $Page->Day4SiNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
    <tr id="r_Day4CellNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4CellNo"><?= $Page->Day4CellNo->caption() ?></span></td>
        <td data-name="Day4CellNo" <?= $Page->Day4CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4CellNo">
<span<?= $Page->Day4CellNo->viewAttributes() ?>>
<?= $Page->Day4CellNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
    <tr id="r_Day4Frag">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Frag"><?= $Page->Day4Frag->caption() ?></span></td>
        <td data-name="Day4Frag" <?= $Page->Day4Frag->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Frag">
<span<?= $Page->Day4Frag->viewAttributes() ?>>
<?= $Page->Day4Frag->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
    <tr id="r_Day4Symmetry">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Symmetry"><?= $Page->Day4Symmetry->caption() ?></span></td>
        <td data-name="Day4Symmetry" <?= $Page->Day4Symmetry->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Symmetry">
<span<?= $Page->Day4Symmetry->viewAttributes() ?>>
<?= $Page->Day4Symmetry->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
    <tr id="r_Day4Grade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Grade"><?= $Page->Day4Grade->caption() ?></span></td>
        <td data-name="Day4Grade" <?= $Page->Day4Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Grade">
<span<?= $Page->Day4Grade->viewAttributes() ?>>
<?= $Page->Day4Grade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
    <tr id="r_Day4Cryoptop">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4Cryoptop"><?= $Page->Day4Cryoptop->caption() ?></span></td>
        <td data-name="Day4Cryoptop" <?= $Page->Day4Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4Cryoptop">
<span<?= $Page->Day4Cryoptop->viewAttributes() ?>>
<?= $Page->Day4Cryoptop->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
    <tr id="r_Day4End">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day4End"><?= $Page->Day4End->caption() ?></span></td>
        <td data-name="Day4End" <?= $Page->Day4End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day4End">
<span<?= $Page->Day4End->viewAttributes() ?>>
<?= $Page->Day4End->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
    <tr id="r_Day5CellNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5CellNo"><?= $Page->Day5CellNo->caption() ?></span></td>
        <td data-name="Day5CellNo" <?= $Page->Day5CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5CellNo">
<span<?= $Page->Day5CellNo->viewAttributes() ?>>
<?= $Page->Day5CellNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
    <tr id="r_Day5ICM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5ICM"><?= $Page->Day5ICM->caption() ?></span></td>
        <td data-name="Day5ICM" <?= $Page->Day5ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5ICM">
<span<?= $Page->Day5ICM->viewAttributes() ?>>
<?= $Page->Day5ICM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
    <tr id="r_Day5TE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5TE"><?= $Page->Day5TE->caption() ?></span></td>
        <td data-name="Day5TE" <?= $Page->Day5TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5TE">
<span<?= $Page->Day5TE->viewAttributes() ?>>
<?= $Page->Day5TE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
    <tr id="r_Day5Observation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Observation"><?= $Page->Day5Observation->caption() ?></span></td>
        <td data-name="Day5Observation" <?= $Page->Day5Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Observation">
<span<?= $Page->Day5Observation->viewAttributes() ?>>
<?= $Page->Day5Observation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
    <tr id="r_Day5Collapsed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Collapsed"><?= $Page->Day5Collapsed->caption() ?></span></td>
        <td data-name="Day5Collapsed" <?= $Page->Day5Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Collapsed">
<span<?= $Page->Day5Collapsed->viewAttributes() ?>>
<?= $Page->Day5Collapsed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
    <tr id="r_Day5Vacoulles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Vacoulles"><?= $Page->Day5Vacoulles->caption() ?></span></td>
        <td data-name="Day5Vacoulles" <?= $Page->Day5Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Vacoulles">
<span<?= $Page->Day5Vacoulles->viewAttributes() ?>>
<?= $Page->Day5Vacoulles->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
    <tr id="r_Day5Grade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day5Grade"><?= $Page->Day5Grade->caption() ?></span></td>
        <td data-name="Day5Grade" <?= $Page->Day5Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day5Grade">
<span<?= $Page->Day5Grade->viewAttributes() ?>>
<?= $Page->Day5Grade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
    <tr id="r_Day6CellNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6CellNo"><?= $Page->Day6CellNo->caption() ?></span></td>
        <td data-name="Day6CellNo" <?= $Page->Day6CellNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6CellNo">
<span<?= $Page->Day6CellNo->viewAttributes() ?>>
<?= $Page->Day6CellNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
    <tr id="r_Day6ICM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6ICM"><?= $Page->Day6ICM->caption() ?></span></td>
        <td data-name="Day6ICM" <?= $Page->Day6ICM->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6ICM">
<span<?= $Page->Day6ICM->viewAttributes() ?>>
<?= $Page->Day6ICM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
    <tr id="r_Day6TE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6TE"><?= $Page->Day6TE->caption() ?></span></td>
        <td data-name="Day6TE" <?= $Page->Day6TE->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6TE">
<span<?= $Page->Day6TE->viewAttributes() ?>>
<?= $Page->Day6TE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
    <tr id="r_Day6Observation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Observation"><?= $Page->Day6Observation->caption() ?></span></td>
        <td data-name="Day6Observation" <?= $Page->Day6Observation->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Observation">
<span<?= $Page->Day6Observation->viewAttributes() ?>>
<?= $Page->Day6Observation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
    <tr id="r_Day6Collapsed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Collapsed"><?= $Page->Day6Collapsed->caption() ?></span></td>
        <td data-name="Day6Collapsed" <?= $Page->Day6Collapsed->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Collapsed">
<span<?= $Page->Day6Collapsed->viewAttributes() ?>>
<?= $Page->Day6Collapsed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
    <tr id="r_Day6Vacoulles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Vacoulles"><?= $Page->Day6Vacoulles->caption() ?></span></td>
        <td data-name="Day6Vacoulles" <?= $Page->Day6Vacoulles->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Vacoulles">
<span<?= $Page->Day6Vacoulles->viewAttributes() ?>>
<?= $Page->Day6Vacoulles->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
    <tr id="r_Day6Grade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Grade"><?= $Page->Day6Grade->caption() ?></span></td>
        <td data-name="Day6Grade" <?= $Page->Day6Grade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Grade">
<span<?= $Page->Day6Grade->viewAttributes() ?>>
<?= $Page->Day6Grade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
    <tr id="r_Day6Cryoptop">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day6Cryoptop"><?= $Page->Day6Cryoptop->caption() ?></span></td>
        <td data-name="Day6Cryoptop" <?= $Page->Day6Cryoptop->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day6Cryoptop">
<span<?= $Page->Day6Cryoptop->viewAttributes() ?>>
<?= $Page->Day6Cryoptop->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
    <tr id="r_EndSiNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndSiNo"><?= $Page->EndSiNo->caption() ?></span></td>
        <td data-name="EndSiNo" <?= $Page->EndSiNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndSiNo">
<span<?= $Page->EndSiNo->viewAttributes() ?>>
<?= $Page->EndSiNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
    <tr id="r_EndingDay">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingDay"><?= $Page->EndingDay->caption() ?></span></td>
        <td data-name="EndingDay" <?= $Page->EndingDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingDay">
<span<?= $Page->EndingDay->viewAttributes() ?>>
<?= $Page->EndingDay->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
    <tr id="r_EndingCellStage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingCellStage"><?= $Page->EndingCellStage->caption() ?></span></td>
        <td data-name="EndingCellStage" <?= $Page->EndingCellStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingCellStage">
<span<?= $Page->EndingCellStage->viewAttributes() ?>>
<?= $Page->EndingCellStage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
    <tr id="r_EndingGrade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingGrade"><?= $Page->EndingGrade->caption() ?></span></td>
        <td data-name="EndingGrade" <?= $Page->EndingGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingGrade">
<span<?= $Page->EndingGrade->viewAttributes() ?>>
<?= $Page->EndingGrade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
    <tr id="r_EndingState">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_EndingState"><?= $Page->EndingState->caption() ?></span></td>
        <td data-name="EndingState" <?= $Page->EndingState->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_EndingState">
<span<?= $Page->EndingState->viewAttributes() ?>>
<?= $Page->EndingState->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
    <tr id="r_DidNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_DidNO"><?= $Page->DidNO->caption() ?></span></td>
        <td data-name="DidNO" <?= $Page->DidNO->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
    <tr id="r_ICSiIVFDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ICSiIVFDateTime"><?= $Page->ICSiIVFDateTime->caption() ?></span></td>
        <td data-name="ICSiIVFDateTime" <?= $Page->ICSiIVFDateTime->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ICSiIVFDateTime">
<span<?= $Page->ICSiIVFDateTime->viewAttributes() ?>>
<?= $Page->ICSiIVFDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
    <tr id="r_PrimaryEmbrologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_PrimaryEmbrologist"><?= $Page->PrimaryEmbrologist->caption() ?></span></td>
        <td data-name="PrimaryEmbrologist" <?= $Page->PrimaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_PrimaryEmbrologist">
<span<?= $Page->PrimaryEmbrologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbrologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
    <tr id="r_SecondaryEmbrologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_SecondaryEmbrologist"><?= $Page->SecondaryEmbrologist->caption() ?></span></td>
        <td data-name="SecondaryEmbrologist" <?= $Page->SecondaryEmbrologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_SecondaryEmbrologist">
<span<?= $Page->SecondaryEmbrologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbrologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
    <tr id="r_Incubator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Incubator"><?= $Page->Incubator->caption() ?></span></td>
        <td data-name="Incubator" <?= $Page->Incubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Incubator">
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <tr id="r_location">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_location"><?= $Page->location->caption() ?></span></td>
        <td data-name="location" <?= $Page->location->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_location">
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
    <tr id="r_OocyteNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_OocyteNo"><?= $Page->OocyteNo->caption() ?></span></td>
        <td data-name="OocyteNo" <?= $Page->OocyteNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <tr id="r_Stage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Stage"><?= $Page->Stage->caption() ?></span></td>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
    <tr id="r_vitrificationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitrificationDate"><?= $Page->vitrificationDate->caption() ?></span></td>
        <td data-name="vitrificationDate" <?= $Page->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitrificationDate">
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
    <tr id="r_vitriPrimaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriPrimaryEmbryologist"><?= $Page->vitriPrimaryEmbryologist->caption() ?></span></td>
        <td data-name="vitriPrimaryEmbryologist" <?= $Page->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriPrimaryEmbryologist">
<span<?= $Page->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
    <tr id="r_vitriSecondaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriSecondaryEmbryologist"><?= $Page->vitriSecondaryEmbryologist->caption() ?></span></td>
        <td data-name="vitriSecondaryEmbryologist" <?= $Page->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriSecondaryEmbryologist">
<span<?= $Page->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
    <tr id="r_vitriEmbryoNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriEmbryoNo"><?= $Page->vitriEmbryoNo->caption() ?></span></td>
        <td data-name="vitriEmbryoNo" <?= $Page->vitriEmbryoNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriEmbryoNo">
<span<?= $Page->vitriEmbryoNo->viewAttributes() ?>>
<?= $Page->vitriEmbryoNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
    <tr id="r_thawReFrozen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawReFrozen"><?= $Page->thawReFrozen->caption() ?></span></td>
        <td data-name="thawReFrozen" <?= $Page->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawReFrozen">
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
    <tr id="r_vitriFertilisationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriFertilisationDate"><?= $Page->vitriFertilisationDate->caption() ?></span></td>
        <td data-name="vitriFertilisationDate" <?= $Page->vitriFertilisationDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriFertilisationDate">
<span<?= $Page->vitriFertilisationDate->viewAttributes() ?>>
<?= $Page->vitriFertilisationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
    <tr id="r_vitriDay">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriDay"><?= $Page->vitriDay->caption() ?></span></td>
        <td data-name="vitriDay" <?= $Page->vitriDay->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriDay">
<span<?= $Page->vitriDay->viewAttributes() ?>>
<?= $Page->vitriDay->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
    <tr id="r_vitriStage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriStage"><?= $Page->vitriStage->caption() ?></span></td>
        <td data-name="vitriStage" <?= $Page->vitriStage->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriStage">
<span<?= $Page->vitriStage->viewAttributes() ?>>
<?= $Page->vitriStage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
    <tr id="r_vitriGrade">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriGrade"><?= $Page->vitriGrade->caption() ?></span></td>
        <td data-name="vitriGrade" <?= $Page->vitriGrade->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGrade">
<span<?= $Page->vitriGrade->viewAttributes() ?>>
<?= $Page->vitriGrade->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
    <tr id="r_vitriIncubator">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriIncubator"><?= $Page->vitriIncubator->caption() ?></span></td>
        <td data-name="vitriIncubator" <?= $Page->vitriIncubator->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriIncubator">
<span<?= $Page->vitriIncubator->viewAttributes() ?>>
<?= $Page->vitriIncubator->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
    <tr id="r_vitriTank">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriTank"><?= $Page->vitriTank->caption() ?></span></td>
        <td data-name="vitriTank" <?= $Page->vitriTank->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriTank">
<span<?= $Page->vitriTank->viewAttributes() ?>>
<?= $Page->vitriTank->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
    <tr id="r_vitriCanister">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCanister"><?= $Page->vitriCanister->caption() ?></span></td>
        <td data-name="vitriCanister" <?= $Page->vitriCanister->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCanister">
<span<?= $Page->vitriCanister->viewAttributes() ?>>
<?= $Page->vitriCanister->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
    <tr id="r_vitriGobiet">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriGobiet"><?= $Page->vitriGobiet->caption() ?></span></td>
        <td data-name="vitriGobiet" <?= $Page->vitriGobiet->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriGobiet">
<span<?= $Page->vitriGobiet->viewAttributes() ?>>
<?= $Page->vitriGobiet->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
    <tr id="r_vitriViscotube">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriViscotube"><?= $Page->vitriViscotube->caption() ?></span></td>
        <td data-name="vitriViscotube" <?= $Page->vitriViscotube->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriViscotube">
<span<?= $Page->vitriViscotube->viewAttributes() ?>>
<?= $Page->vitriViscotube->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
    <tr id="r_vitriCryolockNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCryolockNo"><?= $Page->vitriCryolockNo->caption() ?></span></td>
        <td data-name="vitriCryolockNo" <?= $Page->vitriCryolockNo->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockNo">
<span<?= $Page->vitriCryolockNo->viewAttributes() ?>>
<?= $Page->vitriCryolockNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
    <tr id="r_vitriCryolockColour">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_vitriCryolockColour"><?= $Page->vitriCryolockColour->caption() ?></span></td>
        <td data-name="vitriCryolockColour" <?= $Page->vitriCryolockColour->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_vitriCryolockColour">
<span<?= $Page->vitriCryolockColour->viewAttributes() ?>>
<?= $Page->vitriCryolockColour->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
    <tr id="r_thawDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawDate"><?= $Page->thawDate->caption() ?></span></td>
        <td data-name="thawDate" <?= $Page->thawDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDate">
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
    <tr id="r_thawPrimaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawPrimaryEmbryologist"><?= $Page->thawPrimaryEmbryologist->caption() ?></span></td>
        <td data-name="thawPrimaryEmbryologist" <?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawPrimaryEmbryologist">
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
    <tr id="r_thawSecondaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawSecondaryEmbryologist"><?= $Page->thawSecondaryEmbryologist->caption() ?></span></td>
        <td data-name="thawSecondaryEmbryologist" <?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawSecondaryEmbryologist">
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
    <tr id="r_thawET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawET"><?= $Page->thawET->caption() ?></span></td>
        <td data-name="thawET" <?= $Page->thawET->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawET">
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
    <tr id="r_thawAbserve">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawAbserve"><?= $Page->thawAbserve->caption() ?></span></td>
        <td data-name="thawAbserve" <?= $Page->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawAbserve">
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
    <tr id="r_thawDiscard">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_thawDiscard"><?= $Page->thawDiscard->caption() ?></span></td>
        <td data-name="thawDiscard" <?= $Page->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_thawDiscard">
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
    <tr id="r_ETCatheter">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETCatheter"><?= $Page->ETCatheter->caption() ?></span></td>
        <td data-name="ETCatheter" <?= $Page->ETCatheter->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETCatheter">
<span<?= $Page->ETCatheter->viewAttributes() ?>>
<?= $Page->ETCatheter->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
    <tr id="r_ETDifficulty">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDifficulty"><?= $Page->ETDifficulty->caption() ?></span></td>
        <td data-name="ETDifficulty" <?= $Page->ETDifficulty->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDifficulty">
<span<?= $Page->ETDifficulty->viewAttributes() ?>>
<?= $Page->ETDifficulty->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
    <tr id="r_ETEasy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETEasy"><?= $Page->ETEasy->caption() ?></span></td>
        <td data-name="ETEasy" <?= $Page->ETEasy->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEasy">
<span<?= $Page->ETEasy->viewAttributes() ?>>
<?= $Page->ETEasy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
    <tr id="r_ETComments">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETComments"><?= $Page->ETComments->caption() ?></span></td>
        <td data-name="ETComments" <?= $Page->ETComments->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETComments">
<span<?= $Page->ETComments->viewAttributes() ?>>
<?= $Page->ETComments->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
    <tr id="r_ETDoctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDoctor"><?= $Page->ETDoctor->caption() ?></span></td>
        <td data-name="ETDoctor" <?= $Page->ETDoctor->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDoctor">
<span<?= $Page->ETDoctor->viewAttributes() ?>>
<?= $Page->ETDoctor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
    <tr id="r_ETEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETEmbryologist"><?= $Page->ETEmbryologist->caption() ?></span></td>
        <td data-name="ETEmbryologist" <?= $Page->ETEmbryologist->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETEmbryologist">
<span<?= $Page->ETEmbryologist->viewAttributes() ?>>
<?= $Page->ETEmbryologist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
    <tr id="r_ETDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_ETDate"><?= $Page->ETDate->caption() ?></span></td>
        <td data-name="ETDate" <?= $Page->ETDate->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
    <tr id="r_Day1End">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_embryology_chart_Day1End"><?= $Page->Day1End->caption() ?></span></td>
        <td data-name="Day1End" <?= $Page->Day1End->cellAttributes() ?>>
<span id="el_ivf_embryology_chart_Day1End">
<span<?= $Page->Day1End->viewAttributes() ?>>
<?= $Page->Day1End->getViewValue() ?></span>
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
