<?php

namespace PHPMaker2021\HIMS;

// Table
$view_ivf_treatment = Container("view_ivf_treatment");
?>
<?php if ($view_ivf_treatment->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_ivf_treatmentmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_ivf_treatment->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->id->caption() ?></td>
            <td <?= $view_ivf_treatment->id->cellAttributes() ?>>
<span id="el_view_ivf_treatment_id">
<span<?= $view_ivf_treatment->id->viewAttributes() ?>>
<?= $view_ivf_treatment->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->RIDNO->Visible) { // RIDNO ?>
        <tr id="r_RIDNO">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->RIDNO->caption() ?></td>
            <td <?= $view_ivf_treatment->RIDNO->cellAttributes() ?>>
<span id="el_view_ivf_treatment_RIDNO">
<span<?= $view_ivf_treatment->RIDNO->viewAttributes() ?>>
<?= $view_ivf_treatment->RIDNO->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Name->Visible) { // Name ?>
        <tr id="r_Name">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Name->caption() ?></td>
            <td <?= $view_ivf_treatment->Name->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Name">
<span<?= $view_ivf_treatment->Name->viewAttributes() ?>>
<?= $view_ivf_treatment->Name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Age->Visible) { // Age ?>
        <tr id="r_Age">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Age->caption() ?></td>
            <td <?= $view_ivf_treatment->Age->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Age">
<span<?= $view_ivf_treatment->Age->viewAttributes() ?>>
<?= $view_ivf_treatment->Age->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->treatment_status->Visible) { // treatment_status ?>
        <tr id="r_treatment_status">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->treatment_status->caption() ?></td>
            <td <?= $view_ivf_treatment->treatment_status->cellAttributes() ?>>
<span id="el_view_ivf_treatment_treatment_status">
<span<?= $view_ivf_treatment->treatment_status->viewAttributes() ?>>
<?= $view_ivf_treatment->treatment_status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <tr id="r_ARTCYCLE">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->ARTCYCLE->caption() ?></td>
            <td <?= $view_ivf_treatment->ARTCYCLE->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ARTCYCLE">
<span<?= $view_ivf_treatment->ARTCYCLE->viewAttributes() ?>>
<?= $view_ivf_treatment->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT->Visible) { // RESULT ?>
        <tr id="r_RESULT">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->RESULT->caption() ?></td>
            <td <?= $view_ivf_treatment->RESULT->cellAttributes() ?>>
<span id="el_view_ivf_treatment_RESULT">
<span<?= $view_ivf_treatment->RESULT->viewAttributes() ?>>
<?= $view_ivf_treatment->RESULT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->status->caption() ?></td>
            <td <?= $view_ivf_treatment->status->cellAttributes() ?>>
<span id="el_view_ivf_treatment_status">
<span<?= $view_ivf_treatment->status->viewAttributes() ?>>
<?= $view_ivf_treatment->status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->createdby->caption() ?></td>
            <td <?= $view_ivf_treatment->createdby->cellAttributes() ?>>
<span id="el_view_ivf_treatment_createdby">
<span<?= $view_ivf_treatment->createdby->viewAttributes() ?>>
<?= $view_ivf_treatment->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->createddatetime->caption() ?></td>
            <td <?= $view_ivf_treatment->createddatetime->cellAttributes() ?>>
<span id="el_view_ivf_treatment_createddatetime">
<span<?= $view_ivf_treatment->createddatetime->viewAttributes() ?>>
<?= $view_ivf_treatment->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->modifiedby->caption() ?></td>
            <td <?= $view_ivf_treatment->modifiedby->cellAttributes() ?>>
<span id="el_view_ivf_treatment_modifiedby">
<span<?= $view_ivf_treatment->modifiedby->viewAttributes() ?>>
<?= $view_ivf_treatment->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->modifieddatetime->caption() ?></td>
            <td <?= $view_ivf_treatment->modifieddatetime->cellAttributes() ?>>
<span id="el_view_ivf_treatment_modifieddatetime">
<span<?= $view_ivf_treatment->modifieddatetime->viewAttributes() ?>>
<?= $view_ivf_treatment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <tr id="r_TreatmentStartDate">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->TreatmentStartDate->caption() ?></td>
            <td <?= $view_ivf_treatment->TreatmentStartDate->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TreatmentStartDate">
<span<?= $view_ivf_treatment->TreatmentStartDate->viewAttributes() ?>>
<?= $view_ivf_treatment->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatementStopDate->Visible) { // TreatementStopDate ?>
        <tr id="r_TreatementStopDate">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->TreatementStopDate->caption() ?></td>
            <td <?= $view_ivf_treatment->TreatementStopDate->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TreatementStopDate">
<span<?= $view_ivf_treatment->TreatementStopDate->viewAttributes() ?>>
<?= $view_ivf_treatment->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->TypePatient->Visible) { // TypePatient ?>
        <tr id="r_TypePatient">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->TypePatient->caption() ?></td>
            <td <?= $view_ivf_treatment->TypePatient->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TypePatient">
<span<?= $view_ivf_treatment->TypePatient->viewAttributes() ?>>
<?= $view_ivf_treatment->TypePatient->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Treatment->Visible) { // Treatment ?>
        <tr id="r_Treatment">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Treatment->caption() ?></td>
            <td <?= $view_ivf_treatment->Treatment->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Treatment">
<span<?= $view_ivf_treatment->Treatment->viewAttributes() ?>>
<?= $view_ivf_treatment->Treatment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentTec->Visible) { // TreatmentTec ?>
        <tr id="r_TreatmentTec">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->TreatmentTec->caption() ?></td>
            <td <?= $view_ivf_treatment->TreatmentTec->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TreatmentTec">
<span<?= $view_ivf_treatment->TreatmentTec->viewAttributes() ?>>
<?= $view_ivf_treatment->TreatmentTec->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <tr id="r_TypeOfCycle">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->TypeOfCycle->caption() ?></td>
            <td <?= $view_ivf_treatment->TypeOfCycle->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TypeOfCycle">
<span<?= $view_ivf_treatment->TypeOfCycle->viewAttributes() ?>>
<?= $view_ivf_treatment->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->SpermOrgin->Visible) { // SpermOrgin ?>
        <tr id="r_SpermOrgin">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->SpermOrgin->caption() ?></td>
            <td <?= $view_ivf_treatment->SpermOrgin->cellAttributes() ?>>
<span id="el_view_ivf_treatment_SpermOrgin">
<span<?= $view_ivf_treatment->SpermOrgin->viewAttributes() ?>>
<?= $view_ivf_treatment->SpermOrgin->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->State->Visible) { // State ?>
        <tr id="r_State">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->State->caption() ?></td>
            <td <?= $view_ivf_treatment->State->cellAttributes() ?>>
<span id="el_view_ivf_treatment_State">
<span<?= $view_ivf_treatment->State->viewAttributes() ?>>
<?= $view_ivf_treatment->State->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Origin->Visible) { // Origin ?>
        <tr id="r_Origin">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Origin->caption() ?></td>
            <td <?= $view_ivf_treatment->Origin->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Origin">
<span<?= $view_ivf_treatment->Origin->viewAttributes() ?>>
<?= $view_ivf_treatment->Origin->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->MACS->Visible) { // MACS ?>
        <tr id="r_MACS">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->MACS->caption() ?></td>
            <td <?= $view_ivf_treatment->MACS->cellAttributes() ?>>
<span id="el_view_ivf_treatment_MACS">
<span<?= $view_ivf_treatment->MACS->viewAttributes() ?>>
<?= $view_ivf_treatment->MACS->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Technique->Visible) { // Technique ?>
        <tr id="r_Technique">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Technique->caption() ?></td>
            <td <?= $view_ivf_treatment->Technique->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Technique">
<span<?= $view_ivf_treatment->Technique->viewAttributes() ?>>
<?= $view_ivf_treatment->Technique->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->PgdPlanning->Visible) { // PgdPlanning ?>
        <tr id="r_PgdPlanning">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->PgdPlanning->caption() ?></td>
            <td <?= $view_ivf_treatment->PgdPlanning->cellAttributes() ?>>
<span id="el_view_ivf_treatment_PgdPlanning">
<span<?= $view_ivf_treatment->PgdPlanning->viewAttributes() ?>>
<?= $view_ivf_treatment->PgdPlanning->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->IMSI->Visible) { // IMSI ?>
        <tr id="r_IMSI">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->IMSI->caption() ?></td>
            <td <?= $view_ivf_treatment->IMSI->cellAttributes() ?>>
<span id="el_view_ivf_treatment_IMSI">
<span<?= $view_ivf_treatment->IMSI->viewAttributes() ?>>
<?= $view_ivf_treatment->IMSI->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->SequentialCulture->Visible) { // SequentialCulture ?>
        <tr id="r_SequentialCulture">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->SequentialCulture->caption() ?></td>
            <td <?= $view_ivf_treatment->SequentialCulture->cellAttributes() ?>>
<span id="el_view_ivf_treatment_SequentialCulture">
<span<?= $view_ivf_treatment->SequentialCulture->viewAttributes() ?>>
<?= $view_ivf_treatment->SequentialCulture->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->TimeLapse->Visible) { // TimeLapse ?>
        <tr id="r_TimeLapse">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->TimeLapse->caption() ?></td>
            <td <?= $view_ivf_treatment->TimeLapse->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TimeLapse">
<span<?= $view_ivf_treatment->TimeLapse->viewAttributes() ?>>
<?= $view_ivf_treatment->TimeLapse->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->AH->Visible) { // AH ?>
        <tr id="r_AH">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->AH->caption() ?></td>
            <td <?= $view_ivf_treatment->AH->cellAttributes() ?>>
<span id="el_view_ivf_treatment_AH">
<span<?= $view_ivf_treatment->AH->viewAttributes() ?>>
<?= $view_ivf_treatment->AH->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Weight->Visible) { // Weight ?>
        <tr id="r_Weight">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Weight->caption() ?></td>
            <td <?= $view_ivf_treatment->Weight->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Weight">
<span<?= $view_ivf_treatment->Weight->viewAttributes() ?>>
<?= $view_ivf_treatment->Weight->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->BMI->Visible) { // BMI ?>
        <tr id="r_BMI">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->BMI->caption() ?></td>
            <td <?= $view_ivf_treatment->BMI->cellAttributes() ?>>
<span id="el_view_ivf_treatment_BMI">
<span<?= $view_ivf_treatment->BMI->viewAttributes() ?>>
<?= $view_ivf_treatment->BMI->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Male->Visible) { // Male ?>
        <tr id="r_Male">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Male->caption() ?></td>
            <td <?= $view_ivf_treatment->Male->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Male">
<span<?= $view_ivf_treatment->Male->viewAttributes() ?>>
<?= $view_ivf_treatment->Male->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->Female->Visible) { // Female ?>
        <tr id="r_Female">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->Female->caption() ?></td>
            <td <?= $view_ivf_treatment->Female->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Female">
<span<?= $view_ivf_treatment->Female->viewAttributes() ?>>
<?= $view_ivf_treatment->Female->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->malepropic->Visible) { // malepropic ?>
        <tr id="r_malepropic">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->malepropic->caption() ?></td>
            <td <?= $view_ivf_treatment->malepropic->cellAttributes() ?>>
<span id="el_view_ivf_treatment_malepropic">
<span>
<?= GetFileViewTag($view_ivf_treatment->malepropic, $view_ivf_treatment->malepropic->getViewValue(), false) ?>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->femalepropic->Visible) { // femalepropic ?>
        <tr id="r_femalepropic">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->femalepropic->caption() ?></td>
            <td <?= $view_ivf_treatment->femalepropic->cellAttributes() ?>>
<span id="el_view_ivf_treatment_femalepropic">
<span>
<?= GetFileViewTag($view_ivf_treatment->femalepropic, $view_ivf_treatment->femalepropic->getViewValue(), false) ?>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandEducation->Visible) { // HusbandEducation ?>
        <tr id="r_HusbandEducation">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->HusbandEducation->caption() ?></td>
            <td <?= $view_ivf_treatment->HusbandEducation->cellAttributes() ?>>
<span id="el_view_ivf_treatment_HusbandEducation">
<span<?= $view_ivf_treatment->HusbandEducation->viewAttributes() ?>>
<?= $view_ivf_treatment->HusbandEducation->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->WifeEducation->Visible) { // WifeEducation ?>
        <tr id="r_WifeEducation">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->WifeEducation->caption() ?></td>
            <td <?= $view_ivf_treatment->WifeEducation->cellAttributes() ?>>
<span id="el_view_ivf_treatment_WifeEducation">
<span<?= $view_ivf_treatment->WifeEducation->viewAttributes() ?>>
<?= $view_ivf_treatment->WifeEducation->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <tr id="r_HusbandWorkHours">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->HusbandWorkHours->caption() ?></td>
            <td <?= $view_ivf_treatment->HusbandWorkHours->cellAttributes() ?>>
<span id="el_view_ivf_treatment_HusbandWorkHours">
<span<?= $view_ivf_treatment->HusbandWorkHours->viewAttributes() ?>>
<?= $view_ivf_treatment->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <tr id="r_WifeWorkHours">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->WifeWorkHours->caption() ?></td>
            <td <?= $view_ivf_treatment->WifeWorkHours->cellAttributes() ?>>
<span id="el_view_ivf_treatment_WifeWorkHours">
<span<?= $view_ivf_treatment->WifeWorkHours->viewAttributes() ?>>
<?= $view_ivf_treatment->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->PatientLanguage->Visible) { // PatientLanguage ?>
        <tr id="r_PatientLanguage">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->PatientLanguage->caption() ?></td>
            <td <?= $view_ivf_treatment->PatientLanguage->cellAttributes() ?>>
<span id="el_view_ivf_treatment_PatientLanguage">
<span<?= $view_ivf_treatment->PatientLanguage->viewAttributes() ?>>
<?= $view_ivf_treatment->PatientLanguage->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->ReferedBy->Visible) { // ReferedBy ?>
        <tr id="r_ReferedBy">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->ReferedBy->caption() ?></td>
            <td <?= $view_ivf_treatment->ReferedBy->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ReferedBy">
<span<?= $view_ivf_treatment->ReferedBy->viewAttributes() ?>>
<?= $view_ivf_treatment->ReferedBy->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->ReferPhNo->Visible) { // ReferPhNo ?>
        <tr id="r_ReferPhNo">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->ReferPhNo->caption() ?></td>
            <td <?= $view_ivf_treatment->ReferPhNo->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ReferPhNo">
<span<?= $view_ivf_treatment->ReferPhNo->viewAttributes() ?>>
<?= $view_ivf_treatment->ReferPhNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
        <tr id="r_ARTCYCLE1">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->ARTCYCLE1->caption() ?></td>
            <td <?= $view_ivf_treatment->ARTCYCLE1->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ARTCYCLE1">
<span<?= $view_ivf_treatment->ARTCYCLE1->viewAttributes() ?>>
<?= $view_ivf_treatment->ARTCYCLE1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT1->Visible) { // RESULT1 ?>
        <tr id="r_RESULT1">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->RESULT1->caption() ?></td>
            <td <?= $view_ivf_treatment->RESULT1->cellAttributes() ?>>
<span id="el_view_ivf_treatment_RESULT1">
<span<?= $view_ivf_treatment->RESULT1->viewAttributes() ?>>
<?= $view_ivf_treatment->RESULT1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->CoupleID->Visible) { // CoupleID ?>
        <tr id="r_CoupleID">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->CoupleID->caption() ?></td>
            <td <?= $view_ivf_treatment->CoupleID->cellAttributes() ?>>
<span id="el_view_ivf_treatment_CoupleID">
<span<?= $view_ivf_treatment->CoupleID->viewAttributes() ?>>
<?= $view_ivf_treatment->CoupleID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_ivf_treatment->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_ivf_treatment->TableLeftColumnClass ?>"><?= $view_ivf_treatment->HospID->caption() ?></td>
            <td <?= $view_ivf_treatment->HospID->cellAttributes() ?>>
<span id="el_view_ivf_treatment_HospID">
<span<?= $view_ivf_treatment->HospID->viewAttributes() ?>>
<?= $view_ivf_treatment->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
