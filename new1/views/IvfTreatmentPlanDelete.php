<?php

namespace PHPMaker2021\project3;

// Page object
$IvfTreatmentPlanDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_treatment_plandelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_treatment_plandelete = currentForm = new ew.Form("fivf_treatment_plandelete", "delete");
    loadjs.done("fivf_treatment_plandelete");
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
<form name="fivf_treatment_plandelete" id="fivf_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_id" class="ivf_treatment_plan_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_RIDNO" class="ivf_treatment_plan_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Name" class="ivf_treatment_plan_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Age" class="ivf_treatment_plan_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <th class="<?= $Page->treatment_status->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><?= $Page->treatment_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <th class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <th class="<?= $Page->RESULT->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_RESULT" class="ivf_treatment_plan_RESULT"><?= $Page->RESULT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_status" class="ivf_treatment_plan_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_createdby" class="ivf_treatment_plan_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_createddatetime" class="ivf_treatment_plan_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_modifiedby" class="ivf_treatment_plan_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_modifieddatetime" class="ivf_treatment_plan_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <th class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><?= $Page->TreatmentStartDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <th class="<?= $Page->TreatementStopDate->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TreatementStopDate" class="ivf_treatment_plan_TreatementStopDate"><?= $Page->TreatementStopDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <th class="<?= $Page->TypePatient->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TypePatient" class="ivf_treatment_plan_TypePatient"><?= $Page->TypePatient->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th class="<?= $Page->Treatment->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><?= $Page->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <th class="<?= $Page->TreatmentTec->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><?= $Page->TreatmentTec->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <th class="<?= $Page->TypeOfCycle->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><?= $Page->TypeOfCycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <th class="<?= $Page->SpermOrgin->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><?= $Page->SpermOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><?= $Page->State->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <th class="<?= $Page->Origin->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><?= $Page->Origin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
        <th class="<?= $Page->MACS->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><?= $Page->MACS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
        <th class="<?= $Page->Technique->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><?= $Page->Technique->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <th class="<?= $Page->PgdPlanning->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><?= $Page->PgdPlanning->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
        <th class="<?= $Page->IMSI->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><?= $Page->IMSI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <th class="<?= $Page->SequentialCulture->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><?= $Page->SequentialCulture->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <th class="<?= $Page->TimeLapse->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><?= $Page->TimeLapse->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
        <th class="<?= $Page->AH->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><?= $Page->AH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <th class="<?= $Page->Weight->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><?= $Page->Weight->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
        <th class="<?= $Page->BMI->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><?= $Page->BMI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <th class="<?= $Page->MaleIndications->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><?= $Page->MaleIndications->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <th class="<?= $Page->FemaleIndications->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><?= $Page->FemaleIndications->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
        <th class="<?= $Page->UseOfThe->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_UseOfThe" class="ivf_treatment_plan_UseOfThe"><?= $Page->UseOfThe->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <th class="<?= $Page->Ectopic->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Ectopic" class="ivf_treatment_plan_Ectopic"><?= $Page->Ectopic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
        <th class="<?= $Page->Heterotopic->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Heterotopic" class="ivf_treatment_plan_Heterotopic"><?= $Page->Heterotopic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
        <th class="<?= $Page->TransferDFE->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TransferDFE" class="ivf_treatment_plan_TransferDFE"><?= $Page->TransferDFE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
        <th class="<?= $Page->Evolutive->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Evolutive" class="ivf_treatment_plan_Evolutive"><?= $Page->Evolutive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
        <th class="<?= $Page->Number->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_Number" class="ivf_treatment_plan_Number"><?= $Page->Number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
        <th class="<?= $Page->SequentialCult->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_SequentialCult" class="ivf_treatment_plan_SequentialCult"><?= $Page->SequentialCult->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
        <th class="<?= $Page->TineLapse->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_TineLapse" class="ivf_treatment_plan_TineLapse"><?= $Page->TineLapse->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_PatientName" class="ivf_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_PatientID" class="ivf_treatment_plan_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_PartnerName" class="ivf_treatment_plan_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_PartnerID" class="ivf_treatment_plan_PartnerID"><?= $Page->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <th class="<?= $Page->WifeCell->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_WifeCell" class="ivf_treatment_plan_WifeCell"><?= $Page->WifeCell->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <th class="<?= $Page->HusbandCell->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_HusbandCell" class="ivf_treatment_plan_HusbandCell"><?= $Page->HusbandCell->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th class="<?= $Page->CoupleID->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_CoupleID" class="ivf_treatment_plan_CoupleID"><?= $Page->CoupleID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <th class="<?= $Page->IVFCycleNO->headerCellClass() ?>"><span id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><?= $Page->IVFCycleNO->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_id" class="ivf_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_RIDNO" class="ivf_treatment_plan_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Name" class="ivf_treatment_plan_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Age" class="ivf_treatment_plan_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <td <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <td <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <td <?= $Page->RESULT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_RESULT" class="ivf_treatment_plan_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_status" class="ivf_treatment_plan_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_createdby" class="ivf_treatment_plan_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_createddatetime" class="ivf_treatment_plan_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_modifiedby" class="ivf_treatment_plan_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_modifieddatetime" class="ivf_treatment_plan_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <td <?= $Page->TreatementStopDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TreatementStopDate" class="ivf_treatment_plan_TreatementStopDate">
<span<?= $Page->TreatementStopDate->viewAttributes() ?>>
<?= $Page->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
        <td <?= $Page->TypePatient->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TypePatient" class="ivf_treatment_plan_TypePatient">
<span<?= $Page->TypePatient->viewAttributes() ?>>
<?= $Page->TypePatient->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <td <?= $Page->TreatmentTec->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <td <?= $Page->TypeOfCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <td <?= $Page->SpermOrgin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <td <?= $Page->State->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <td <?= $Page->Origin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
        <td <?= $Page->MACS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
        <td <?= $Page->Technique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <td <?= $Page->PgdPlanning->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
        <td <?= $Page->IMSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <td <?= $Page->SequentialCulture->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <td <?= $Page->TimeLapse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
        <td <?= $Page->AH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <td <?= $Page->Weight->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
        <td <?= $Page->BMI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <td <?= $Page->MaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
<span<?= $Page->MaleIndications->viewAttributes() ?>>
<?= $Page->MaleIndications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <td <?= $Page->FemaleIndications->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
<span<?= $Page->FemaleIndications->viewAttributes() ?>>
<?= $Page->FemaleIndications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
        <td <?= $Page->UseOfThe->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_UseOfThe" class="ivf_treatment_plan_UseOfThe">
<span<?= $Page->UseOfThe->viewAttributes() ?>>
<?= $Page->UseOfThe->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <td <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Ectopic" class="ivf_treatment_plan_Ectopic">
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
        <td <?= $Page->Heterotopic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Heterotopic" class="ivf_treatment_plan_Heterotopic">
<span<?= $Page->Heterotopic->viewAttributes() ?>>
<?= $Page->Heterotopic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
        <td <?= $Page->TransferDFE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TransferDFE" class="ivf_treatment_plan_TransferDFE">
<span<?= $Page->TransferDFE->viewAttributes() ?>>
<?= $Page->TransferDFE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
        <td <?= $Page->Evolutive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Evolutive" class="ivf_treatment_plan_Evolutive">
<span<?= $Page->Evolutive->viewAttributes() ?>>
<?= $Page->Evolutive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
        <td <?= $Page->Number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_Number" class="ivf_treatment_plan_Number">
<span<?= $Page->Number->viewAttributes() ?>>
<?= $Page->Number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
        <td <?= $Page->SequentialCult->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_SequentialCult" class="ivf_treatment_plan_SequentialCult">
<span<?= $Page->SequentialCult->viewAttributes() ?>>
<?= $Page->SequentialCult->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
        <td <?= $Page->TineLapse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_TineLapse" class="ivf_treatment_plan_TineLapse">
<span<?= $Page->TineLapse->viewAttributes() ?>>
<?= $Page->TineLapse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PatientName" class="ivf_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PatientID" class="ivf_treatment_plan_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PartnerName" class="ivf_treatment_plan_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_PartnerID" class="ivf_treatment_plan_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
        <td <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_WifeCell" class="ivf_treatment_plan_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
        <td <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_HusbandCell" class="ivf_treatment_plan_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_CoupleID" class="ivf_treatment_plan_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <td <?= $Page->IVFCycleNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
<span<?= $Page->IVFCycleNO->viewAttributes() ?>>
<?= $Page->IVFCycleNO->getViewValue() ?></span>
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
