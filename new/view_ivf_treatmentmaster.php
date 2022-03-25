<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_ivf_treatment->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_ivf_treatmentmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_ivf_treatment->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->id->caption() ?></td>
			<td <?php echo $view_ivf_treatment->id->cellAttributes() ?>>
<span id="el_view_ivf_treatment_id">
<span<?php echo $view_ivf_treatment->id->viewAttributes() ?>><?php echo $view_ivf_treatment->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->RIDNO->Visible) { // RIDNO ?>
		<tr id="r_RIDNO">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->RIDNO->caption() ?></td>
			<td <?php echo $view_ivf_treatment->RIDNO->cellAttributes() ?>>
<span id="el_view_ivf_treatment_RIDNO">
<span<?php echo $view_ivf_treatment->RIDNO->viewAttributes() ?>><?php echo $view_ivf_treatment->RIDNO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Name->Visible) { // Name ?>
		<tr id="r_Name">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Name->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Name->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Name">
<span<?php echo $view_ivf_treatment->Name->viewAttributes() ?>><?php echo $view_ivf_treatment->Name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Age->Visible) { // Age ?>
		<tr id="r_Age">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Age->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Age->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Age">
<span<?php echo $view_ivf_treatment->Age->viewAttributes() ?>><?php echo $view_ivf_treatment->Age->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->treatment_status->Visible) { // treatment_status ?>
		<tr id="r_treatment_status">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->treatment_status->caption() ?></td>
			<td <?php echo $view_ivf_treatment->treatment_status->cellAttributes() ?>>
<span id="el_view_ivf_treatment_treatment_status">
<span<?php echo $view_ivf_treatment->treatment_status->viewAttributes() ?>><?php echo $view_ivf_treatment->treatment_status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<tr id="r_ARTCYCLE">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->ARTCYCLE->caption() ?></td>
			<td <?php echo $view_ivf_treatment->ARTCYCLE->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ARTCYCLE">
<span<?php echo $view_ivf_treatment->ARTCYCLE->viewAttributes() ?>><?php echo $view_ivf_treatment->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT->Visible) { // RESULT ?>
		<tr id="r_RESULT">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->RESULT->caption() ?></td>
			<td <?php echo $view_ivf_treatment->RESULT->cellAttributes() ?>>
<span id="el_view_ivf_treatment_RESULT">
<span<?php echo $view_ivf_treatment->RESULT->viewAttributes() ?>><?php echo $view_ivf_treatment->RESULT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->status->caption() ?></td>
			<td <?php echo $view_ivf_treatment->status->cellAttributes() ?>>
<span id="el_view_ivf_treatment_status">
<span<?php echo $view_ivf_treatment->status->viewAttributes() ?>><?php echo $view_ivf_treatment->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->createdby->caption() ?></td>
			<td <?php echo $view_ivf_treatment->createdby->cellAttributes() ?>>
<span id="el_view_ivf_treatment_createdby">
<span<?php echo $view_ivf_treatment->createdby->viewAttributes() ?>><?php echo $view_ivf_treatment->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->createddatetime->caption() ?></td>
			<td <?php echo $view_ivf_treatment->createddatetime->cellAttributes() ?>>
<span id="el_view_ivf_treatment_createddatetime">
<span<?php echo $view_ivf_treatment->createddatetime->viewAttributes() ?>><?php echo $view_ivf_treatment->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->modifiedby->caption() ?></td>
			<td <?php echo $view_ivf_treatment->modifiedby->cellAttributes() ?>>
<span id="el_view_ivf_treatment_modifiedby">
<span<?php echo $view_ivf_treatment->modifiedby->viewAttributes() ?>><?php echo $view_ivf_treatment->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->modifieddatetime->caption() ?></td>
			<td <?php echo $view_ivf_treatment->modifieddatetime->cellAttributes() ?>>
<span id="el_view_ivf_treatment_modifieddatetime">
<span<?php echo $view_ivf_treatment->modifieddatetime->viewAttributes() ?>><?php echo $view_ivf_treatment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<tr id="r_TreatmentStartDate">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->TreatmentStartDate->caption() ?></td>
			<td <?php echo $view_ivf_treatment->TreatmentStartDate->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TreatmentStartDate">
<span<?php echo $view_ivf_treatment->TreatmentStartDate->viewAttributes() ?>><?php echo $view_ivf_treatment->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatementStopDate->Visible) { // TreatementStopDate ?>
		<tr id="r_TreatementStopDate">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->TreatementStopDate->caption() ?></td>
			<td <?php echo $view_ivf_treatment->TreatementStopDate->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TreatementStopDate">
<span<?php echo $view_ivf_treatment->TreatementStopDate->viewAttributes() ?>><?php echo $view_ivf_treatment->TreatementStopDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TypePatient->Visible) { // TypePatient ?>
		<tr id="r_TypePatient">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->TypePatient->caption() ?></td>
			<td <?php echo $view_ivf_treatment->TypePatient->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TypePatient">
<span<?php echo $view_ivf_treatment->TypePatient->viewAttributes() ?>><?php echo $view_ivf_treatment->TypePatient->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Treatment->Visible) { // Treatment ?>
		<tr id="r_Treatment">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Treatment->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Treatment->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Treatment">
<span<?php echo $view_ivf_treatment->Treatment->viewAttributes() ?>><?php echo $view_ivf_treatment->Treatment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TreatmentTec->Visible) { // TreatmentTec ?>
		<tr id="r_TreatmentTec">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->TreatmentTec->caption() ?></td>
			<td <?php echo $view_ivf_treatment->TreatmentTec->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TreatmentTec">
<span<?php echo $view_ivf_treatment->TreatmentTec->viewAttributes() ?>><?php echo $view_ivf_treatment->TreatmentTec->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<tr id="r_TypeOfCycle">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->TypeOfCycle->caption() ?></td>
			<td <?php echo $view_ivf_treatment->TypeOfCycle->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TypeOfCycle">
<span<?php echo $view_ivf_treatment->TypeOfCycle->viewAttributes() ?>><?php echo $view_ivf_treatment->TypeOfCycle->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->SpermOrgin->Visible) { // SpermOrgin ?>
		<tr id="r_SpermOrgin">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->SpermOrgin->caption() ?></td>
			<td <?php echo $view_ivf_treatment->SpermOrgin->cellAttributes() ?>>
<span id="el_view_ivf_treatment_SpermOrgin">
<span<?php echo $view_ivf_treatment->SpermOrgin->viewAttributes() ?>><?php echo $view_ivf_treatment->SpermOrgin->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->State->Visible) { // State ?>
		<tr id="r_State">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->State->caption() ?></td>
			<td <?php echo $view_ivf_treatment->State->cellAttributes() ?>>
<span id="el_view_ivf_treatment_State">
<span<?php echo $view_ivf_treatment->State->viewAttributes() ?>><?php echo $view_ivf_treatment->State->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Origin->Visible) { // Origin ?>
		<tr id="r_Origin">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Origin->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Origin->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Origin">
<span<?php echo $view_ivf_treatment->Origin->viewAttributes() ?>><?php echo $view_ivf_treatment->Origin->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->MACS->Visible) { // MACS ?>
		<tr id="r_MACS">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->MACS->caption() ?></td>
			<td <?php echo $view_ivf_treatment->MACS->cellAttributes() ?>>
<span id="el_view_ivf_treatment_MACS">
<span<?php echo $view_ivf_treatment->MACS->viewAttributes() ?>><?php echo $view_ivf_treatment->MACS->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Technique->Visible) { // Technique ?>
		<tr id="r_Technique">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Technique->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Technique->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Technique">
<span<?php echo $view_ivf_treatment->Technique->viewAttributes() ?>><?php echo $view_ivf_treatment->Technique->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->PgdPlanning->Visible) { // PgdPlanning ?>
		<tr id="r_PgdPlanning">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->PgdPlanning->caption() ?></td>
			<td <?php echo $view_ivf_treatment->PgdPlanning->cellAttributes() ?>>
<span id="el_view_ivf_treatment_PgdPlanning">
<span<?php echo $view_ivf_treatment->PgdPlanning->viewAttributes() ?>><?php echo $view_ivf_treatment->PgdPlanning->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->IMSI->Visible) { // IMSI ?>
		<tr id="r_IMSI">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->IMSI->caption() ?></td>
			<td <?php echo $view_ivf_treatment->IMSI->cellAttributes() ?>>
<span id="el_view_ivf_treatment_IMSI">
<span<?php echo $view_ivf_treatment->IMSI->viewAttributes() ?>><?php echo $view_ivf_treatment->IMSI->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->SequentialCulture->Visible) { // SequentialCulture ?>
		<tr id="r_SequentialCulture">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->SequentialCulture->caption() ?></td>
			<td <?php echo $view_ivf_treatment->SequentialCulture->cellAttributes() ?>>
<span id="el_view_ivf_treatment_SequentialCulture">
<span<?php echo $view_ivf_treatment->SequentialCulture->viewAttributes() ?>><?php echo $view_ivf_treatment->SequentialCulture->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->TimeLapse->Visible) { // TimeLapse ?>
		<tr id="r_TimeLapse">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->TimeLapse->caption() ?></td>
			<td <?php echo $view_ivf_treatment->TimeLapse->cellAttributes() ?>>
<span id="el_view_ivf_treatment_TimeLapse">
<span<?php echo $view_ivf_treatment->TimeLapse->viewAttributes() ?>><?php echo $view_ivf_treatment->TimeLapse->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->AH->Visible) { // AH ?>
		<tr id="r_AH">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->AH->caption() ?></td>
			<td <?php echo $view_ivf_treatment->AH->cellAttributes() ?>>
<span id="el_view_ivf_treatment_AH">
<span<?php echo $view_ivf_treatment->AH->viewAttributes() ?>><?php echo $view_ivf_treatment->AH->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Weight->Visible) { // Weight ?>
		<tr id="r_Weight">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Weight->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Weight->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Weight">
<span<?php echo $view_ivf_treatment->Weight->viewAttributes() ?>><?php echo $view_ivf_treatment->Weight->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->BMI->Visible) { // BMI ?>
		<tr id="r_BMI">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->BMI->caption() ?></td>
			<td <?php echo $view_ivf_treatment->BMI->cellAttributes() ?>>
<span id="el_view_ivf_treatment_BMI">
<span<?php echo $view_ivf_treatment->BMI->viewAttributes() ?>><?php echo $view_ivf_treatment->BMI->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Male->Visible) { // Male ?>
		<tr id="r_Male">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Male->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Male->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Male">
<span<?php echo $view_ivf_treatment->Male->viewAttributes() ?>><?php echo $view_ivf_treatment->Male->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->Female->Visible) { // Female ?>
		<tr id="r_Female">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->Female->caption() ?></td>
			<td <?php echo $view_ivf_treatment->Female->cellAttributes() ?>>
<span id="el_view_ivf_treatment_Female">
<span<?php echo $view_ivf_treatment->Female->viewAttributes() ?>><?php echo $view_ivf_treatment->Female->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->malepropic->Visible) { // malepropic ?>
		<tr id="r_malepropic">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->malepropic->caption() ?></td>
			<td <?php echo $view_ivf_treatment->malepropic->cellAttributes() ?>>
<span id="el_view_ivf_treatment_malepropic">
<span><?php echo GetFileViewTag($view_ivf_treatment->malepropic, $view_ivf_treatment->malepropic->getViewValue(), FALSE) ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->femalepropic->Visible) { // femalepropic ?>
		<tr id="r_femalepropic">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->femalepropic->caption() ?></td>
			<td <?php echo $view_ivf_treatment->femalepropic->cellAttributes() ?>>
<span id="el_view_ivf_treatment_femalepropic">
<span><?php echo GetFileViewTag($view_ivf_treatment->femalepropic, $view_ivf_treatment->femalepropic->getViewValue(), FALSE) ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandEducation->Visible) { // HusbandEducation ?>
		<tr id="r_HusbandEducation">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->HusbandEducation->caption() ?></td>
			<td <?php echo $view_ivf_treatment->HusbandEducation->cellAttributes() ?>>
<span id="el_view_ivf_treatment_HusbandEducation">
<span<?php echo $view_ivf_treatment->HusbandEducation->viewAttributes() ?>><?php echo $view_ivf_treatment->HusbandEducation->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->WifeEducation->Visible) { // WifeEducation ?>
		<tr id="r_WifeEducation">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->WifeEducation->caption() ?></td>
			<td <?php echo $view_ivf_treatment->WifeEducation->cellAttributes() ?>>
<span id="el_view_ivf_treatment_WifeEducation">
<span<?php echo $view_ivf_treatment->WifeEducation->viewAttributes() ?>><?php echo $view_ivf_treatment->WifeEducation->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<tr id="r_HusbandWorkHours">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->HusbandWorkHours->caption() ?></td>
			<td <?php echo $view_ivf_treatment->HusbandWorkHours->cellAttributes() ?>>
<span id="el_view_ivf_treatment_HusbandWorkHours">
<span<?php echo $view_ivf_treatment->HusbandWorkHours->viewAttributes() ?>><?php echo $view_ivf_treatment->HusbandWorkHours->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<tr id="r_WifeWorkHours">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->WifeWorkHours->caption() ?></td>
			<td <?php echo $view_ivf_treatment->WifeWorkHours->cellAttributes() ?>>
<span id="el_view_ivf_treatment_WifeWorkHours">
<span<?php echo $view_ivf_treatment->WifeWorkHours->viewAttributes() ?>><?php echo $view_ivf_treatment->WifeWorkHours->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->PatientLanguage->Visible) { // PatientLanguage ?>
		<tr id="r_PatientLanguage">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->PatientLanguage->caption() ?></td>
			<td <?php echo $view_ivf_treatment->PatientLanguage->cellAttributes() ?>>
<span id="el_view_ivf_treatment_PatientLanguage">
<span<?php echo $view_ivf_treatment->PatientLanguage->viewAttributes() ?>><?php echo $view_ivf_treatment->PatientLanguage->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ReferedBy->Visible) { // ReferedBy ?>
		<tr id="r_ReferedBy">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->ReferedBy->caption() ?></td>
			<td <?php echo $view_ivf_treatment->ReferedBy->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ReferedBy">
<span<?php echo $view_ivf_treatment->ReferedBy->viewAttributes() ?>><?php echo $view_ivf_treatment->ReferedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ReferPhNo->Visible) { // ReferPhNo ?>
		<tr id="r_ReferPhNo">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->ReferPhNo->caption() ?></td>
			<td <?php echo $view_ivf_treatment->ReferPhNo->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ReferPhNo">
<span<?php echo $view_ivf_treatment->ReferPhNo->viewAttributes() ?>><?php echo $view_ivf_treatment->ReferPhNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->ARTCYCLE1->Visible) { // ARTCYCLE1 ?>
		<tr id="r_ARTCYCLE1">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->ARTCYCLE1->caption() ?></td>
			<td <?php echo $view_ivf_treatment->ARTCYCLE1->cellAttributes() ?>>
<span id="el_view_ivf_treatment_ARTCYCLE1">
<span<?php echo $view_ivf_treatment->ARTCYCLE1->viewAttributes() ?>><?php echo $view_ivf_treatment->ARTCYCLE1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->RESULT1->Visible) { // RESULT1 ?>
		<tr id="r_RESULT1">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->RESULT1->caption() ?></td>
			<td <?php echo $view_ivf_treatment->RESULT1->cellAttributes() ?>>
<span id="el_view_ivf_treatment_RESULT1">
<span<?php echo $view_ivf_treatment->RESULT1->viewAttributes() ?>><?php echo $view_ivf_treatment->RESULT1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->CoupleID->Visible) { // CoupleID ?>
		<tr id="r_CoupleID">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->CoupleID->caption() ?></td>
			<td <?php echo $view_ivf_treatment->CoupleID->cellAttributes() ?>>
<span id="el_view_ivf_treatment_CoupleID">
<span<?php echo $view_ivf_treatment->CoupleID->viewAttributes() ?>><?php echo $view_ivf_treatment->CoupleID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_ivf_treatment->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_ivf_treatment->TableLeftColumnClass ?>"><?php echo $view_ivf_treatment->HospID->caption() ?></td>
			<td <?php echo $view_ivf_treatment->HospID->cellAttributes() ?>>
<span id="el_view_ivf_treatment_HospID">
<span<?php echo $view_ivf_treatment->HospID->viewAttributes() ?>><?php echo $view_ivf_treatment->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>