<?php

namespace PHPMaker2021\project3;

// Page object
$IvfTreatmentPlanView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_treatment_planview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_treatment_planview = currentForm = new ew.Form("fivf_treatment_planview", "view");
    loadjs.done("fivf_treatment_planview");
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
<form name="fivf_treatment_planview" id="fivf_treatment_planview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <tr id="r_treatment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_treatment_status"><?= $Page->treatment_status->caption() ?></span></td>
        <td data-name="treatment_status" <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <tr id="r_ARTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></span></td>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <tr id="r_RESULT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_RESULT"><?= $Page->RESULT->caption() ?></span></td>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
    <tr id="r_TreatmentStartDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TreatmentStartDate"><?= $Page->TreatmentStartDate->caption() ?></span></td>
        <td data-name="TreatmentStartDate" <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
    <tr id="r_TreatementStopDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TreatementStopDate"><?= $Page->TreatementStopDate->caption() ?></span></td>
        <td data-name="TreatementStopDate" <?= $Page->TreatementStopDate->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TreatementStopDate">
<span<?= $Page->TreatementStopDate->viewAttributes() ?>>
<?= $Page->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
    <tr id="r_TypePatient">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TypePatient"><?= $Page->TypePatient->caption() ?></span></td>
        <td data-name="TypePatient" <?= $Page->TypePatient->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TypePatient">
<span<?= $Page->TypePatient->viewAttributes() ?>>
<?= $Page->TypePatient->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <tr id="r_Treatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Treatment"><?= $Page->Treatment->caption() ?></span></td>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
    <tr id="r_TreatmentTec">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TreatmentTec"><?= $Page->TreatmentTec->caption() ?></span></td>
        <td data-name="TreatmentTec" <?= $Page->TreatmentTec->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TreatmentTec">
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
    <tr id="r_TypeOfCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TypeOfCycle"><?= $Page->TypeOfCycle->caption() ?></span></td>
        <td data-name="TypeOfCycle" <?= $Page->TypeOfCycle->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TypeOfCycle">
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
    <tr id="r_SpermOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_SpermOrgin"><?= $Page->SpermOrgin->caption() ?></span></td>
        <td data-name="SpermOrgin" <?= $Page->SpermOrgin->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_SpermOrgin">
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <tr id="r_State">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_State"><?= $Page->State->caption() ?></span></td>
        <td data-name="State" <?= $Page->State->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <tr id="r_Origin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Origin"><?= $Page->Origin->caption() ?></span></td>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <tr id="r_MACS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_MACS"><?= $Page->MACS->caption() ?></span></td>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
    <tr id="r_Technique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Technique"><?= $Page->Technique->caption() ?></span></td>
        <td data-name="Technique" <?= $Page->Technique->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Technique">
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
    <tr id="r_PgdPlanning">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PgdPlanning"><?= $Page->PgdPlanning->caption() ?></span></td>
        <td data-name="PgdPlanning" <?= $Page->PgdPlanning->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PgdPlanning">
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
    <tr id="r_IMSI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_IMSI"><?= $Page->IMSI->caption() ?></span></td>
        <td data-name="IMSI" <?= $Page->IMSI->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_IMSI">
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
    <tr id="r_SequentialCulture">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_SequentialCulture"><?= $Page->SequentialCulture->caption() ?></span></td>
        <td data-name="SequentialCulture" <?= $Page->SequentialCulture->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_SequentialCulture">
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
    <tr id="r_TimeLapse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TimeLapse"><?= $Page->TimeLapse->caption() ?></span></td>
        <td data-name="TimeLapse" <?= $Page->TimeLapse->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TimeLapse">
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
    <tr id="r_AH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_AH"><?= $Page->AH->caption() ?></span></td>
        <td data-name="AH" <?= $Page->AH->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_AH">
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <tr id="r_Weight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Weight"><?= $Page->Weight->caption() ?></span></td>
        <td data-name="Weight" <?= $Page->Weight->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
    <tr id="r_BMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_BMI"><?= $Page->BMI->caption() ?></span></td>
        <td data-name="BMI" <?= $Page->BMI->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_BMI">
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
    <tr id="r_MaleIndications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_MaleIndications"><?= $Page->MaleIndications->caption() ?></span></td>
        <td data-name="MaleIndications" <?= $Page->MaleIndications->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_MaleIndications">
<span<?= $Page->MaleIndications->viewAttributes() ?>>
<?= $Page->MaleIndications->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
    <tr id="r_FemaleIndications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_FemaleIndications"><?= $Page->FemaleIndications->caption() ?></span></td>
        <td data-name="FemaleIndications" <?= $Page->FemaleIndications->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_FemaleIndications">
<span<?= $Page->FemaleIndications->viewAttributes() ?>>
<?= $Page->FemaleIndications->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
    <tr id="r_UseOfThe">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_UseOfThe"><?= $Page->UseOfThe->caption() ?></span></td>
        <td data-name="UseOfThe" <?= $Page->UseOfThe->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_UseOfThe">
<span<?= $Page->UseOfThe->viewAttributes() ?>>
<?= $Page->UseOfThe->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <tr id="r_Ectopic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Ectopic"><?= $Page->Ectopic->caption() ?></span></td>
        <td data-name="Ectopic" <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
    <tr id="r_Heterotopic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Heterotopic"><?= $Page->Heterotopic->caption() ?></span></td>
        <td data-name="Heterotopic" <?= $Page->Heterotopic->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Heterotopic">
<span<?= $Page->Heterotopic->viewAttributes() ?>>
<?= $Page->Heterotopic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
    <tr id="r_TransferDFE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TransferDFE"><?= $Page->TransferDFE->caption() ?></span></td>
        <td data-name="TransferDFE" <?= $Page->TransferDFE->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TransferDFE">
<span<?= $Page->TransferDFE->viewAttributes() ?>>
<?= $Page->TransferDFE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
    <tr id="r_Evolutive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Evolutive"><?= $Page->Evolutive->caption() ?></span></td>
        <td data-name="Evolutive" <?= $Page->Evolutive->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Evolutive">
<span<?= $Page->Evolutive->viewAttributes() ?>>
<?= $Page->Evolutive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
    <tr id="r_Number">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_Number"><?= $Page->Number->caption() ?></span></td>
        <td data-name="Number" <?= $Page->Number->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Number">
<span<?= $Page->Number->viewAttributes() ?>>
<?= $Page->Number->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
    <tr id="r_SequentialCult">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_SequentialCult"><?= $Page->SequentialCult->caption() ?></span></td>
        <td data-name="SequentialCult" <?= $Page->SequentialCult->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_SequentialCult">
<span<?= $Page->SequentialCult->viewAttributes() ?>>
<?= $Page->SequentialCult->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
    <tr id="r_TineLapse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_TineLapse"><?= $Page->TineLapse->caption() ?></span></td>
        <td data-name="TineLapse" <?= $Page->TineLapse->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TineLapse">
<span<?= $Page->TineLapse->viewAttributes() ?>>
<?= $Page->TineLapse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PartnerName"><?= $Page->PartnerName->caption() ?></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <tr id="r_PartnerID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_PartnerID"><?= $Page->PartnerID->caption() ?></span></td>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <tr id="r_WifeCell">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_WifeCell"><?= $Page->WifeCell->caption() ?></span></td>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <tr id="r_HusbandCell">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_HusbandCell"><?= $Page->HusbandCell->caption() ?></span></td>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <tr id="r_CoupleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_CoupleID"><?= $Page->CoupleID->caption() ?></span></td>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
    <tr id="r_IVFCycleNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_treatment_plan_IVFCycleNO"><?= $Page->IVFCycleNO->caption() ?></span></td>
        <td data-name="IVFCycleNO" <?= $Page->IVFCycleNO->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_IVFCycleNO">
<span<?= $Page->IVFCycleNO->viewAttributes() ?>>
<?= $Page->IVFCycleNO->getViewValue() ?></span>
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
