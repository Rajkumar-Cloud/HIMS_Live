<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($patient->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_patientmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($patient->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->id->caption() ?></td>
			<td <?php echo $patient->id->cellAttributes() ?>>
<span id="el_patient_id">
<span<?php echo $patient->id->viewAttributes() ?>><?php echo $patient->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->PatientID->Visible) { // PatientID ?>
		<tr id="r_PatientID">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->PatientID->caption() ?></td>
			<td <?php echo $patient->PatientID->cellAttributes() ?>>
<span id="el_patient_PatientID">
<span<?php echo $patient->PatientID->viewAttributes() ?>><?php echo $patient->PatientID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
		<tr id="r_title">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->title->caption() ?></td>
			<td <?php echo $patient->title->cellAttributes() ?>>
<span id="el_patient_title">
<span<?php echo $patient->title->viewAttributes() ?>><?php echo $patient->title->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
		<tr id="r_first_name">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->first_name->caption() ?></td>
			<td <?php echo $patient->first_name->cellAttributes() ?>>
<span id="el_patient_first_name">
<span<?php echo $patient->first_name->viewAttributes() ?>><?php echo $patient->first_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
		<tr id="r_gender">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->gender->caption() ?></td>
			<td <?php echo $patient->gender->cellAttributes() ?>>
<span id="el_patient_gender">
<span<?php echo $patient->gender->viewAttributes() ?>><?php echo $patient->gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->dob->Visible) { // dob ?>
		<tr id="r_dob">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->dob->caption() ?></td>
			<td <?php echo $patient->dob->cellAttributes() ?>>
<span id="el_patient_dob">
<span<?php echo $patient->dob->viewAttributes() ?>><?php echo $patient->dob->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
		<tr id="r_Age">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Age->caption() ?></td>
			<td <?php echo $patient->Age->cellAttributes() ?>>
<span id="el_patient_Age">
<span<?php echo $patient->Age->viewAttributes() ?>><?php echo $patient->Age->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
		<tr id="r_blood_group">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->blood_group->caption() ?></td>
			<td <?php echo $patient->blood_group->cellAttributes() ?>>
<span id="el_patient_blood_group">
<span<?php echo $patient->blood_group->viewAttributes() ?>><?php echo $patient->blood_group->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
		<tr id="r_mobile_no">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->mobile_no->caption() ?></td>
			<td <?php echo $patient->mobile_no->cellAttributes() ?>>
<span id="el_patient_mobile_no">
<span<?php echo $patient->mobile_no->viewAttributes() ?>><?php echo $patient->mobile_no->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->status->caption() ?></td>
			<td <?php echo $patient->status->cellAttributes() ?>>
<span id="el_patient_status">
<span<?php echo $patient->status->viewAttributes() ?>><?php echo $patient->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->createddatetime->caption() ?></td>
			<td <?php echo $patient->createddatetime->cellAttributes() ?>>
<span id="el_patient_createddatetime">
<span<?php echo $patient->createddatetime->viewAttributes() ?>><?php echo $patient->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
		<tr id="r_profilePic">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->profilePic->caption() ?></td>
			<td <?php echo $patient->profilePic->cellAttributes() ?>>
<span id="el_patient_profilePic">
<span><?php echo GetFileViewTag($patient->profilePic, $patient->profilePic->getViewValue(), FALSE) ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
		<tr id="r_IdentificationMark">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->IdentificationMark->caption() ?></td>
			<td <?php echo $patient->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_IdentificationMark">
<span<?php echo $patient->IdentificationMark->viewAttributes() ?>><?php echo $patient->IdentificationMark->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
		<tr id="r_Religion">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Religion->caption() ?></td>
			<td <?php echo $patient->Religion->cellAttributes() ?>>
<span id="el_patient_Religion">
<span<?php echo $patient->Religion->viewAttributes() ?>><?php echo $patient->Religion->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
		<tr id="r_Nationality">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Nationality->caption() ?></td>
			<td <?php echo $patient->Nationality->cellAttributes() ?>>
<span id="el_patient_Nationality">
<span<?php echo $patient->Nationality->viewAttributes() ?>><?php echo $patient->Nationality->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
		<tr id="r_ReferedByDr">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->ReferedByDr->caption() ?></td>
			<td <?php echo $patient->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_ReferedByDr">
<span<?php echo $patient->ReferedByDr->viewAttributes() ?>><?php echo $patient->ReferedByDr->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->ReferClinicname->Visible) { // ReferClinicname ?>
		<tr id="r_ReferClinicname">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->ReferClinicname->caption() ?></td>
			<td <?php echo $patient->ReferClinicname->cellAttributes() ?>>
<span id="el_patient_ReferClinicname">
<span<?php echo $patient->ReferClinicname->viewAttributes() ?>><?php echo $patient->ReferClinicname->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->ReferCity->Visible) { // ReferCity ?>
		<tr id="r_ReferCity">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->ReferCity->caption() ?></td>
			<td <?php echo $patient->ReferCity->cellAttributes() ?>>
<span id="el_patient_ReferCity">
<span<?php echo $patient->ReferCity->viewAttributes() ?>><?php echo $patient->ReferCity->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<tr id="r_ReferMobileNo">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->ReferMobileNo->caption() ?></td>
			<td <?php echo $patient->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_ReferMobileNo">
<span<?php echo $patient->ReferMobileNo->viewAttributes() ?>><?php echo $patient->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<tr id="r_ReferA4TreatingConsultant">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->ReferA4TreatingConsultant->caption() ?></td>
			<td <?php echo $patient->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_ReferA4TreatingConsultant">
<span<?php echo $patient->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $patient->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<tr id="r_PurposreReferredfor">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->PurposreReferredfor->caption() ?></td>
			<td <?php echo $patient->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_PurposreReferredfor">
<span<?php echo $patient->PurposreReferredfor->viewAttributes() ?>><?php echo $patient->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
		<tr id="r_spouse_title">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_title->caption() ?></td>
			<td <?php echo $patient->spouse_title->cellAttributes() ?>>
<span id="el_patient_spouse_title">
<span<?php echo $patient->spouse_title->viewAttributes() ?>><?php echo $patient->spouse_title->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
		<tr id="r_spouse_first_name">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_first_name->caption() ?></td>
			<td <?php echo $patient->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_spouse_first_name">
<span<?php echo $patient->spouse_first_name->viewAttributes() ?>><?php echo $patient->spouse_first_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<tr id="r_spouse_middle_name">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_middle_name->caption() ?></td>
			<td <?php echo $patient->spouse_middle_name->cellAttributes() ?>>
<span id="el_patient_spouse_middle_name">
<span<?php echo $patient->spouse_middle_name->viewAttributes() ?>><?php echo $patient->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_last_name->Visible) { // spouse_last_name ?>
		<tr id="r_spouse_last_name">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_last_name->caption() ?></td>
			<td <?php echo $patient->spouse_last_name->cellAttributes() ?>>
<span id="el_patient_spouse_last_name">
<span<?php echo $patient->spouse_last_name->viewAttributes() ?>><?php echo $patient->spouse_last_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
		<tr id="r_spouse_gender">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_gender->caption() ?></td>
			<td <?php echo $patient->spouse_gender->cellAttributes() ?>>
<span id="el_patient_spouse_gender">
<span<?php echo $patient->spouse_gender->viewAttributes() ?>><?php echo $patient->spouse_gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_dob->Visible) { // spouse_dob ?>
		<tr id="r_spouse_dob">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_dob->caption() ?></td>
			<td <?php echo $patient->spouse_dob->cellAttributes() ?>>
<span id="el_patient_spouse_dob">
<span<?php echo $patient->spouse_dob->viewAttributes() ?>><?php echo $patient->spouse_dob->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_Age->Visible) { // spouse_Age ?>
		<tr id="r_spouse_Age">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_Age->caption() ?></td>
			<td <?php echo $patient->spouse_Age->cellAttributes() ?>>
<span id="el_patient_spouse_Age">
<span<?php echo $patient->spouse_Age->viewAttributes() ?>><?php echo $patient->spouse_Age->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<tr id="r_spouse_blood_group">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_blood_group->caption() ?></td>
			<td <?php echo $patient->spouse_blood_group->cellAttributes() ?>>
<span id="el_patient_spouse_blood_group">
<span<?php echo $patient->spouse_blood_group->viewAttributes() ?>><?php echo $patient->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<tr id="r_spouse_mobile_no">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_mobile_no->caption() ?></td>
			<td <?php echo $patient->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_spouse_mobile_no">
<span<?php echo $patient->spouse_mobile_no->viewAttributes() ?>><?php echo $patient->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Maritalstatus->Visible) { // Maritalstatus ?>
		<tr id="r_Maritalstatus">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Maritalstatus->caption() ?></td>
			<td <?php echo $patient->Maritalstatus->cellAttributes() ?>>
<span id="el_patient_Maritalstatus">
<span<?php echo $patient->Maritalstatus->viewAttributes() ?>><?php echo $patient->Maritalstatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Business->Visible) { // Business ?>
		<tr id="r_Business">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Business->caption() ?></td>
			<td <?php echo $patient->Business->cellAttributes() ?>>
<span id="el_patient_Business">
<span<?php echo $patient->Business->viewAttributes() ?>><?php echo $patient->Business->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Patient_Language->Visible) { // Patient_Language ?>
		<tr id="r_Patient_Language">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Patient_Language->caption() ?></td>
			<td <?php echo $patient->Patient_Language->cellAttributes() ?>>
<span id="el_patient_Patient_Language">
<span<?php echo $patient->Patient_Language->viewAttributes() ?>><?php echo $patient->Patient_Language->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
		<tr id="r_Passport">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Passport->caption() ?></td>
			<td <?php echo $patient->Passport->cellAttributes() ?>>
<span id="el_patient_Passport">
<span<?php echo $patient->Passport->viewAttributes() ?>><?php echo $patient->Passport->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
		<tr id="r_VisaNo">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->VisaNo->caption() ?></td>
			<td <?php echo $patient->VisaNo->cellAttributes() ?>>
<span id="el_patient_VisaNo">
<span<?php echo $patient->VisaNo->viewAttributes() ?>><?php echo $patient->VisaNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<tr id="r_ValidityOfVisa">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->ValidityOfVisa->caption() ?></td>
			<td <?php echo $patient->ValidityOfVisa->cellAttributes() ?>>
<span id="el_patient_ValidityOfVisa">
<span<?php echo $patient->ValidityOfVisa->viewAttributes() ?>><?php echo $patient->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<tr id="r_WhereDidYouHear">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->WhereDidYouHear->caption() ?></td>
			<td <?php echo $patient->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_WhereDidYouHear">
<span<?php echo $patient->WhereDidYouHear->viewAttributes() ?>><?php echo $patient->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->HospID->caption() ?></td>
			<td <?php echo $patient->HospID->cellAttributes() ?>>
<span id="el_patient_HospID">
<span<?php echo $patient->HospID->viewAttributes() ?>><?php echo $patient->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
		<tr id="r_street">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->street->caption() ?></td>
			<td <?php echo $patient->street->cellAttributes() ?>>
<span id="el_patient_street">
<span<?php echo $patient->street->viewAttributes() ?>><?php echo $patient->street->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
		<tr id="r_town">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->town->caption() ?></td>
			<td <?php echo $patient->town->cellAttributes() ?>>
<span id="el_patient_town">
<span<?php echo $patient->town->viewAttributes() ?>><?php echo $patient->town->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
		<tr id="r_province">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->province->caption() ?></td>
			<td <?php echo $patient->province->cellAttributes() ?>>
<span id="el_patient_province">
<span<?php echo $patient->province->viewAttributes() ?>><?php echo $patient->province->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
		<tr id="r_country">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->country->caption() ?></td>
			<td <?php echo $patient->country->cellAttributes() ?>>
<span id="el_patient_country">
<span<?php echo $patient->country->viewAttributes() ?>><?php echo $patient->country->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
		<tr id="r_postal_code">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->postal_code->caption() ?></td>
			<td <?php echo $patient->postal_code->cellAttributes() ?>>
<span id="el_patient_postal_code">
<span<?php echo $patient->postal_code->viewAttributes() ?>><?php echo $patient->postal_code->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
		<tr id="r_PEmail">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->PEmail->caption() ?></td>
			<td <?php echo $patient->PEmail->cellAttributes() ?>>
<span id="el_patient_PEmail">
<span<?php echo $patient->PEmail->viewAttributes() ?>><?php echo $patient->PEmail->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<tr id="r_PEmergencyContact">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->PEmergencyContact->caption() ?></td>
			<td <?php echo $patient->PEmergencyContact->cellAttributes() ?>>
<span id="el_patient_PEmergencyContact">
<span<?php echo $patient->PEmergencyContact->viewAttributes() ?>><?php echo $patient->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->occupation->Visible) { // occupation ?>
		<tr id="r_occupation">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->occupation->caption() ?></td>
			<td <?php echo $patient->occupation->cellAttributes() ?>>
<span id="el_patient_occupation">
<span<?php echo $patient->occupation->viewAttributes() ?>><?php echo $patient->occupation->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->spouse_occupation->Visible) { // spouse_occupation ?>
		<tr id="r_spouse_occupation">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->spouse_occupation->caption() ?></td>
			<td <?php echo $patient->spouse_occupation->cellAttributes() ?>>
<span id="el_patient_spouse_occupation">
<span<?php echo $patient->spouse_occupation->viewAttributes() ?>><?php echo $patient->spouse_occupation->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->WhatsApp->Visible) { // WhatsApp ?>
		<tr id="r_WhatsApp">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->WhatsApp->caption() ?></td>
			<td <?php echo $patient->WhatsApp->cellAttributes() ?>>
<span id="el_patient_WhatsApp">
<span<?php echo $patient->WhatsApp->viewAttributes() ?>><?php echo $patient->WhatsApp->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->CouppleID->Visible) { // CouppleID ?>
		<tr id="r_CouppleID">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->CouppleID->caption() ?></td>
			<td <?php echo $patient->CouppleID->cellAttributes() ?>>
<span id="el_patient_CouppleID">
<span<?php echo $patient->CouppleID->viewAttributes() ?>><?php echo $patient->CouppleID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->MaleID->Visible) { // MaleID ?>
		<tr id="r_MaleID">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->MaleID->caption() ?></td>
			<td <?php echo $patient->MaleID->cellAttributes() ?>>
<span id="el_patient_MaleID">
<span<?php echo $patient->MaleID->viewAttributes() ?>><?php echo $patient->MaleID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->FemaleID->Visible) { // FemaleID ?>
		<tr id="r_FemaleID">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->FemaleID->caption() ?></td>
			<td <?php echo $patient->FemaleID->cellAttributes() ?>>
<span id="el_patient_FemaleID">
<span<?php echo $patient->FemaleID->viewAttributes() ?>><?php echo $patient->FemaleID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->GroupID->Visible) { // GroupID ?>
		<tr id="r_GroupID">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->GroupID->caption() ?></td>
			<td <?php echo $patient->GroupID->cellAttributes() ?>>
<span id="el_patient_GroupID">
<span<?php echo $patient->GroupID->viewAttributes() ?>><?php echo $patient->GroupID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->Relationship->Visible) { // Relationship ?>
		<tr id="r_Relationship">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->Relationship->caption() ?></td>
			<td <?php echo $patient->Relationship->cellAttributes() ?>>
<span id="el_patient_Relationship">
<span<?php echo $patient->Relationship->viewAttributes() ?>><?php echo $patient->Relationship->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($patient->FacebookID->Visible) { // FacebookID ?>
		<tr id="r_FacebookID">
			<td class="<?php echo $patient->TableLeftColumnClass ?>"><?php echo $patient->FacebookID->caption() ?></td>
			<td <?php echo $patient->FacebookID->cellAttributes() ?>>
<span id="el_patient_FacebookID">
<span<?php echo $patient->FacebookID->viewAttributes() ?>><?php echo $patient->FacebookID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>