<?php

namespace PHPMaker2021\project3;

// Page object
$IvfEtChartView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_et_chartview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_et_chartview = currentForm = new ew.Form("fivf_et_chartview", "view");
    loadjs.done("fivf_et_chartview");
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
<form name="fivf_et_chartview" id="fivf_et_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_et_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_et_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_et_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_et_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Consultant"><?= $Page->Consultant->caption() ?></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_et_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <tr id="r_InseminatinTechnique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></td>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_et_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <tr id="r_IndicationForART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></span></td>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_et_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
    <tr id="r_PreTreatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PreTreatment"><?= $Page->PreTreatment->caption() ?></span></td>
        <td data-name="PreTreatment" <?= $Page->PreTreatment->cellAttributes() ?>>
<span id="el_ivf_et_chart_PreTreatment">
<span<?= $Page->PreTreatment->viewAttributes() ?>>
<?= $Page->PreTreatment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <tr id="r_Hysteroscopy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?></span></td>
        <td data-name="Hysteroscopy" <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el_ivf_et_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <tr id="r_EndometrialScratching">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?></span></td>
        <td data-name="EndometrialScratching" <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el_ivf_et_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <tr id="r_TrialCannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></span></td>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el_ivf_et_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <tr id="r_CYCLETYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?></span></td>
        <td data-name="CYCLETYPE" <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el_ivf_et_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <tr id="r_HRTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?></span></td>
        <td data-name="HRTCYCLE" <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el_ivf_et_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <tr id="r_OralEstrogenDosage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?></span></td>
        <td data-name="OralEstrogenDosage" <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el_ivf_et_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <tr id="r_VaginalEstrogen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?></span></td>
        <td data-name="VaginalEstrogen" <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el_ivf_et_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <tr id="r_GCSF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_GCSF"><?= $Page->GCSF->caption() ?></span></td>
        <td data-name="GCSF" <?= $Page->GCSF->cellAttributes() ?>>
<span id="el_ivf_et_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <tr id="r_ActivatedPRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?></span></td>
        <td data-name="ActivatedPRP" <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el_ivf_et_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <tr id="r_ERA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ERA"><?= $Page->ERA->caption() ?></span></td>
        <td data-name="ERA" <?= $Page->ERA->cellAttributes() ?>>
<span id="el_ivf_et_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <tr id="r_UCLcm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_UCLcm"><?= $Page->UCLcm->caption() ?></span></td>
        <td data-name="UCLcm" <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el_ivf_et_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
    <tr id="r_DATEOFSTART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFSTART"><?= $Page->DATEOFSTART->caption() ?></span></td>
        <td data-name="DATEOFSTART" <?= $Page->DATEOFSTART->cellAttributes() ?>>
<span id="el_ivf_et_chart_DATEOFSTART">
<span<?= $Page->DATEOFSTART->viewAttributes() ?>>
<?= $Page->DATEOFSTART->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
    <tr id="r_DATEOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER"><?= $Page->DATEOFEMBRYOTRANSFER->caption() ?></span></td>
        <td data-name="DATEOFEMBRYOTRANSFER" <?= $Page->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?= $Page->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <tr id="r_DAYOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></span></td>
        <td data-name="DAYOFEMBRYOTRANSFER" <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <tr id="r_NOOFEMBRYOSTHAWED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></span></td>
        <td data-name="NOOFEMBRYOSTHAWED" <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <tr id="r_NOOFEMBRYOSTRANSFERRED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></span></td>
        <td data-name="NOOFEMBRYOSTRANSFERRED" <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <tr id="r_DAYOFEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?></span></td>
        <td data-name="DAYOFEMBRYOS" <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_et_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <tr id="r_CRYOPRESERVEDEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></span></td>
        <td data-name="CRYOPRESERVEDEMBRYOS" <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <tr id="r_Code1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code1"><?= $Page->Code1->caption() ?></span></td>
        <td data-name="Code1" <?= $Page->Code1->cellAttributes() ?>>
<span id="el_ivf_et_chart_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <tr id="r_Code2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code2"><?= $Page->Code2->caption() ?></span></td>
        <td data-name="Code2" <?= $Page->Code2->cellAttributes() ?>>
<span id="el_ivf_et_chart_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <tr id="r_CellStage1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage1"><?= $Page->CellStage1->caption() ?></span></td>
        <td data-name="CellStage1" <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el_ivf_et_chart_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <tr id="r_CellStage2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage2"><?= $Page->CellStage2->caption() ?></span></td>
        <td data-name="CellStage2" <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el_ivf_et_chart_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <tr id="r_Grade1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade1"><?= $Page->Grade1->caption() ?></span></td>
        <td data-name="Grade1" <?= $Page->Grade1->cellAttributes() ?>>
<span id="el_ivf_et_chart_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <tr id="r_Grade2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade2"><?= $Page->Grade2->caption() ?></span></td>
        <td data-name="Grade2" <?= $Page->Grade2->cellAttributes() ?>>
<span id="el_ivf_et_chart_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureRecord->Visible) { // ProcedureRecord ?>
    <tr id="r_ProcedureRecord">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ProcedureRecord"><?= $Page->ProcedureRecord->caption() ?></span></td>
        <td data-name="ProcedureRecord" <?= $Page->ProcedureRecord->cellAttributes() ?>>
<span id="el_ivf_et_chart_ProcedureRecord">
<span<?= $Page->ProcedureRecord->viewAttributes() ?>>
<?= $Page->ProcedureRecord->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medicationsadvised->Visible) { // Medicationsadvised ?>
    <tr id="r_Medicationsadvised">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Medicationsadvised"><?= $Page->Medicationsadvised->caption() ?></span></td>
        <td data-name="Medicationsadvised" <?= $Page->Medicationsadvised->cellAttributes() ?>>
<span id="el_ivf_et_chart_Medicationsadvised">
<span<?= $Page->Medicationsadvised->viewAttributes() ?>>
<?= $Page->Medicationsadvised->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
    <tr id="r_PostProcedureInstructions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PostProcedureInstructions"><?= $Page->PostProcedureInstructions->caption() ?></span></td>
        <td data-name="PostProcedureInstructions" <?= $Page->PostProcedureInstructions->cellAttributes() ?>>
<span id="el_ivf_et_chart_PostProcedureInstructions">
<span<?= $Page->PostProcedureInstructions->viewAttributes() ?>>
<?= $Page->PostProcedureInstructions->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
    <tr id="r_PregnancyTestingWithSerumBetaHcG">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><?= $Page->PregnancyTestingWithSerumBetaHcG->caption() ?></span></td>
        <td data-name="PregnancyTestingWithSerumBetaHcG" <?= $Page->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?= $Page->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?= $Page->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <tr id="r_ReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?></span></td>
        <td data-name="ReviewDate" <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el_ivf_et_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <tr id="r_ReviewDoctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?></span></td>
        <td data-name="ReviewDoctor" <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el_ivf_et_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_et_chart_TidNo">
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
