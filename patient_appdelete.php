<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$patient_app_delete = new patient_app_delete();

// Run the page
$patient_app_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_app_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_appdelete = currentForm = new ew.Form("fpatient_appdelete", "delete");

// Form_CustomValidate event
fpatient_appdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_appdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_app_delete->showPageHeader(); ?>
<?php
$patient_app_delete->showMessage();
?>
<form name="fpatient_appdelete" id="fpatient_appdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_app_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_app_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_app_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_app->id->Visible) { // id ?>
		<th class="<?php echo $patient_app->id->headerCellClass() ?>"><span id="elh_patient_app_id" class="patient_app_id"><?php echo $patient_app->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $patient_app->PatientID->headerCellClass() ?>"><span id="elh_patient_app_PatientID" class="patient_app_PatientID"><?php echo $patient_app->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->title->Visible) { // title ?>
		<th class="<?php echo $patient_app->title->headerCellClass() ?>"><span id="elh_patient_app_title" class="patient_app_title"><?php echo $patient_app->title->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->first_name->Visible) { // first_name ?>
		<th class="<?php echo $patient_app->first_name->headerCellClass() ?>"><span id="elh_patient_app_first_name" class="patient_app_first_name"><?php echo $patient_app->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->middle_name->Visible) { // middle_name ?>
		<th class="<?php echo $patient_app->middle_name->headerCellClass() ?>"><span id="elh_patient_app_middle_name" class="patient_app_middle_name"><?php echo $patient_app->middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->last_name->Visible) { // last_name ?>
		<th class="<?php echo $patient_app->last_name->headerCellClass() ?>"><span id="elh_patient_app_last_name" class="patient_app_last_name"><?php echo $patient_app->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->gender->Visible) { // gender ?>
		<th class="<?php echo $patient_app->gender->headerCellClass() ?>"><span id="elh_patient_app_gender" class="patient_app_gender"><?php echo $patient_app->gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->dob->Visible) { // dob ?>
		<th class="<?php echo $patient_app->dob->headerCellClass() ?>"><span id="elh_patient_app_dob" class="patient_app_dob"><?php echo $patient_app->dob->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_app->Age->headerCellClass() ?>"><span id="elh_patient_app_Age" class="patient_app_Age"><?php echo $patient_app->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->blood_group->Visible) { // blood_group ?>
		<th class="<?php echo $patient_app->blood_group->headerCellClass() ?>"><span id="elh_patient_app_blood_group" class="patient_app_blood_group"><?php echo $patient_app->blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->mobile_no->Visible) { // mobile_no ?>
		<th class="<?php echo $patient_app->mobile_no->headerCellClass() ?>"><span id="elh_patient_app_mobile_no" class="patient_app_mobile_no"><?php echo $patient_app->mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $patient_app->IdentificationMark->headerCellClass() ?>"><span id="elh_patient_app_IdentificationMark" class="patient_app_IdentificationMark"><?php echo $patient_app->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Religion->Visible) { // Religion ?>
		<th class="<?php echo $patient_app->Religion->headerCellClass() ?>"><span id="elh_patient_app_Religion" class="patient_app_Religion"><?php echo $patient_app->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Nationality->Visible) { // Nationality ?>
		<th class="<?php echo $patient_app->Nationality->headerCellClass() ?>"><span id="elh_patient_app_Nationality" class="patient_app_Nationality"><?php echo $patient_app->Nationality->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $patient_app->profilePic->headerCellClass() ?>"><span id="elh_patient_app_profilePic" class="patient_app_profilePic"><?php echo $patient_app->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->status->Visible) { // status ?>
		<th class="<?php echo $patient_app->status->headerCellClass() ?>"><span id="elh_patient_app_status" class="patient_app_status"><?php echo $patient_app->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_app->createdby->headerCellClass() ?>"><span id="elh_patient_app_createdby" class="patient_app_createdby"><?php echo $patient_app->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_app->createddatetime->headerCellClass() ?>"><span id="elh_patient_app_createddatetime" class="patient_app_createddatetime"><?php echo $patient_app->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_app->modifiedby->headerCellClass() ?>"><span id="elh_patient_app_modifiedby" class="patient_app_modifiedby"><?php echo $patient_app->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_app->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_app_modifieddatetime" class="patient_app_modifieddatetime"><?php echo $patient_app->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->ReferedByDr->Visible) { // ReferedByDr ?>
		<th class="<?php echo $patient_app->ReferedByDr->headerCellClass() ?>"><span id="elh_patient_app_ReferedByDr" class="patient_app_ReferedByDr"><?php echo $patient_app->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->ReferClinicname->Visible) { // ReferClinicname ?>
		<th class="<?php echo $patient_app->ReferClinicname->headerCellClass() ?>"><span id="elh_patient_app_ReferClinicname" class="patient_app_ReferClinicname"><?php echo $patient_app->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->ReferCity->Visible) { // ReferCity ?>
		<th class="<?php echo $patient_app->ReferCity->headerCellClass() ?>"><span id="elh_patient_app_ReferCity" class="patient_app_ReferCity"><?php echo $patient_app->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<th class="<?php echo $patient_app->ReferMobileNo->headerCellClass() ?>"><span id="elh_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo"><?php echo $patient_app->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<th class="<?php echo $patient_app->ReferA4TreatingConsultant->headerCellClass() ?>"><span id="elh_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant"><?php echo $patient_app->ReferA4TreatingConsultant->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<th class="<?php echo $patient_app->PurposreReferredfor->headerCellClass() ?>"><span id="elh_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor"><?php echo $patient_app->PurposreReferredfor->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_title->Visible) { // spouse_title ?>
		<th class="<?php echo $patient_app->spouse_title->headerCellClass() ?>"><span id="elh_patient_app_spouse_title" class="patient_app_spouse_title"><?php echo $patient_app->spouse_title->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_first_name->Visible) { // spouse_first_name ?>
		<th class="<?php echo $patient_app->spouse_first_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_first_name" class="patient_app_spouse_first_name"><?php echo $patient_app->spouse_first_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<th class="<?php echo $patient_app->spouse_middle_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name"><?php echo $patient_app->spouse_middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_last_name->Visible) { // spouse_last_name ?>
		<th class="<?php echo $patient_app->spouse_last_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_last_name" class="patient_app_spouse_last_name"><?php echo $patient_app->spouse_last_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_gender->Visible) { // spouse_gender ?>
		<th class="<?php echo $patient_app->spouse_gender->headerCellClass() ?>"><span id="elh_patient_app_spouse_gender" class="patient_app_spouse_gender"><?php echo $patient_app->spouse_gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_dob->Visible) { // spouse_dob ?>
		<th class="<?php echo $patient_app->spouse_dob->headerCellClass() ?>"><span id="elh_patient_app_spouse_dob" class="patient_app_spouse_dob"><?php echo $patient_app->spouse_dob->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_Age->Visible) { // spouse_Age ?>
		<th class="<?php echo $patient_app->spouse_Age->headerCellClass() ?>"><span id="elh_patient_app_spouse_Age" class="patient_app_spouse_Age"><?php echo $patient_app->spouse_Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<th class="<?php echo $patient_app->spouse_blood_group->headerCellClass() ?>"><span id="elh_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group"><?php echo $patient_app->spouse_blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<th class="<?php echo $patient_app->spouse_mobile_no->headerCellClass() ?>"><span id="elh_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no"><?php echo $patient_app->spouse_mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Maritalstatus->Visible) { // Maritalstatus ?>
		<th class="<?php echo $patient_app->Maritalstatus->headerCellClass() ?>"><span id="elh_patient_app_Maritalstatus" class="patient_app_Maritalstatus"><?php echo $patient_app->Maritalstatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Business->Visible) { // Business ?>
		<th class="<?php echo $patient_app->Business->headerCellClass() ?>"><span id="elh_patient_app_Business" class="patient_app_Business"><?php echo $patient_app->Business->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Patient_Language->Visible) { // Patient_Language ?>
		<th class="<?php echo $patient_app->Patient_Language->headerCellClass() ?>"><span id="elh_patient_app_Patient_Language" class="patient_app_Patient_Language"><?php echo $patient_app->Patient_Language->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Passport->Visible) { // Passport ?>
		<th class="<?php echo $patient_app->Passport->headerCellClass() ?>"><span id="elh_patient_app_Passport" class="patient_app_Passport"><?php echo $patient_app->Passport->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->VisaNo->Visible) { // VisaNo ?>
		<th class="<?php echo $patient_app->VisaNo->headerCellClass() ?>"><span id="elh_patient_app_VisaNo" class="patient_app_VisaNo"><?php echo $patient_app->VisaNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<th class="<?php echo $patient_app->ValidityOfVisa->headerCellClass() ?>"><span id="elh_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa"><?php echo $patient_app->ValidityOfVisa->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<th class="<?php echo $patient_app->WhereDidYouHear->headerCellClass() ?>"><span id="elh_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear"><?php echo $patient_app->WhereDidYouHear->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_app->HospID->headerCellClass() ?>"><span id="elh_patient_app_HospID" class="patient_app_HospID"><?php echo $patient_app->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->street->Visible) { // street ?>
		<th class="<?php echo $patient_app->street->headerCellClass() ?>"><span id="elh_patient_app_street" class="patient_app_street"><?php echo $patient_app->street->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->town->Visible) { // town ?>
		<th class="<?php echo $patient_app->town->headerCellClass() ?>"><span id="elh_patient_app_town" class="patient_app_town"><?php echo $patient_app->town->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->province->Visible) { // province ?>
		<th class="<?php echo $patient_app->province->headerCellClass() ?>"><span id="elh_patient_app_province" class="patient_app_province"><?php echo $patient_app->province->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->country->Visible) { // country ?>
		<th class="<?php echo $patient_app->country->headerCellClass() ?>"><span id="elh_patient_app_country" class="patient_app_country"><?php echo $patient_app->country->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $patient_app->postal_code->headerCellClass() ?>"><span id="elh_patient_app_postal_code" class="patient_app_postal_code"><?php echo $patient_app->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->PEmail->Visible) { // PEmail ?>
		<th class="<?php echo $patient_app->PEmail->headerCellClass() ?>"><span id="elh_patient_app_PEmail" class="patient_app_PEmail"><?php echo $patient_app->PEmail->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<th class="<?php echo $patient_app->PEmergencyContact->headerCellClass() ?>"><span id="elh_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact"><?php echo $patient_app->PEmergencyContact->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->occupation->Visible) { // occupation ?>
		<th class="<?php echo $patient_app->occupation->headerCellClass() ?>"><span id="elh_patient_app_occupation" class="patient_app_occupation"><?php echo $patient_app->occupation->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->spouse_occupation->Visible) { // spouse_occupation ?>
		<th class="<?php echo $patient_app->spouse_occupation->headerCellClass() ?>"><span id="elh_patient_app_spouse_occupation" class="patient_app_spouse_occupation"><?php echo $patient_app->spouse_occupation->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->WhatsApp->Visible) { // WhatsApp ?>
		<th class="<?php echo $patient_app->WhatsApp->headerCellClass() ?>"><span id="elh_patient_app_WhatsApp" class="patient_app_WhatsApp"><?php echo $patient_app->WhatsApp->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->CouppleID->Visible) { // CouppleID ?>
		<th class="<?php echo $patient_app->CouppleID->headerCellClass() ?>"><span id="elh_patient_app_CouppleID" class="patient_app_CouppleID"><?php echo $patient_app->CouppleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->MaleID->Visible) { // MaleID ?>
		<th class="<?php echo $patient_app->MaleID->headerCellClass() ?>"><span id="elh_patient_app_MaleID" class="patient_app_MaleID"><?php echo $patient_app->MaleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->FemaleID->Visible) { // FemaleID ?>
		<th class="<?php echo $patient_app->FemaleID->headerCellClass() ?>"><span id="elh_patient_app_FemaleID" class="patient_app_FemaleID"><?php echo $patient_app->FemaleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->GroupID->Visible) { // GroupID ?>
		<th class="<?php echo $patient_app->GroupID->headerCellClass() ?>"><span id="elh_patient_app_GroupID" class="patient_app_GroupID"><?php echo $patient_app->GroupID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app->Relationship->Visible) { // Relationship ?>
		<th class="<?php echo $patient_app->Relationship->headerCellClass() ?>"><span id="elh_patient_app_Relationship" class="patient_app_Relationship"><?php echo $patient_app->Relationship->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_app_delete->RecCnt = 0;
$i = 0;
while (!$patient_app_delete->Recordset->EOF) {
	$patient_app_delete->RecCnt++;
	$patient_app_delete->RowCnt++;

	// Set row properties
	$patient_app->resetAttributes();
	$patient_app->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_app_delete->loadRowValues($patient_app_delete->Recordset);

	// Render row
	$patient_app_delete->renderRow();
?>
	<tr<?php echo $patient_app->rowAttributes() ?>>
<?php if ($patient_app->id->Visible) { // id ?>
		<td<?php echo $patient_app->id->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_id" class="patient_app_id">
<span<?php echo $patient_app->id->viewAttributes() ?>>
<?php echo $patient_app->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->PatientID->Visible) { // PatientID ?>
		<td<?php echo $patient_app->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_PatientID" class="patient_app_PatientID">
<span<?php echo $patient_app->PatientID->viewAttributes() ?>>
<?php echo $patient_app->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->title->Visible) { // title ?>
		<td<?php echo $patient_app->title->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_title" class="patient_app_title">
<span<?php echo $patient_app->title->viewAttributes() ?>>
<?php echo $patient_app->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->first_name->Visible) { // first_name ?>
		<td<?php echo $patient_app->first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_first_name" class="patient_app_first_name">
<span<?php echo $patient_app->first_name->viewAttributes() ?>>
<?php echo $patient_app->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->middle_name->Visible) { // middle_name ?>
		<td<?php echo $patient_app->middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_middle_name" class="patient_app_middle_name">
<span<?php echo $patient_app->middle_name->viewAttributes() ?>>
<?php echo $patient_app->middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->last_name->Visible) { // last_name ?>
		<td<?php echo $patient_app->last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_last_name" class="patient_app_last_name">
<span<?php echo $patient_app->last_name->viewAttributes() ?>>
<?php echo $patient_app->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->gender->Visible) { // gender ?>
		<td<?php echo $patient_app->gender->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_gender" class="patient_app_gender">
<span<?php echo $patient_app->gender->viewAttributes() ?>>
<?php echo $patient_app->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->dob->Visible) { // dob ?>
		<td<?php echo $patient_app->dob->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_dob" class="patient_app_dob">
<span<?php echo $patient_app->dob->viewAttributes() ?>>
<?php echo $patient_app->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Age->Visible) { // Age ?>
		<td<?php echo $patient_app->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Age" class="patient_app_Age">
<span<?php echo $patient_app->Age->viewAttributes() ?>>
<?php echo $patient_app->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->blood_group->Visible) { // blood_group ?>
		<td<?php echo $patient_app->blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_blood_group" class="patient_app_blood_group">
<span<?php echo $patient_app->blood_group->viewAttributes() ?>>
<?php echo $patient_app->blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->mobile_no->Visible) { // mobile_no ?>
		<td<?php echo $patient_app->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_mobile_no" class="patient_app_mobile_no">
<span<?php echo $patient_app->mobile_no->viewAttributes() ?>>
<?php echo $patient_app->mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->IdentificationMark->Visible) { // IdentificationMark ?>
		<td<?php echo $patient_app->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_IdentificationMark" class="patient_app_IdentificationMark">
<span<?php echo $patient_app->IdentificationMark->viewAttributes() ?>>
<?php echo $patient_app->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Religion->Visible) { // Religion ?>
		<td<?php echo $patient_app->Religion->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Religion" class="patient_app_Religion">
<span<?php echo $patient_app->Religion->viewAttributes() ?>>
<?php echo $patient_app->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Nationality->Visible) { // Nationality ?>
		<td<?php echo $patient_app->Nationality->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Nationality" class="patient_app_Nationality">
<span<?php echo $patient_app->Nationality->viewAttributes() ?>>
<?php echo $patient_app->Nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->profilePic->Visible) { // profilePic ?>
		<td<?php echo $patient_app->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_profilePic" class="patient_app_profilePic">
<span<?php echo $patient_app->profilePic->viewAttributes() ?>>
<?php echo $patient_app->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->status->Visible) { // status ?>
		<td<?php echo $patient_app->status->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_status" class="patient_app_status">
<span<?php echo $patient_app->status->viewAttributes() ?>>
<?php echo $patient_app->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_app->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_createdby" class="patient_app_createdby">
<span<?php echo $patient_app->createdby->viewAttributes() ?>>
<?php echo $patient_app->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_app->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_createddatetime" class="patient_app_createddatetime">
<span<?php echo $patient_app->createddatetime->viewAttributes() ?>>
<?php echo $patient_app->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_app->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_modifiedby" class="patient_app_modifiedby">
<span<?php echo $patient_app->modifiedby->viewAttributes() ?>>
<?php echo $patient_app->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_app->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_modifieddatetime" class="patient_app_modifieddatetime">
<span<?php echo $patient_app->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_app->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->ReferedByDr->Visible) { // ReferedByDr ?>
		<td<?php echo $patient_app->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_ReferedByDr" class="patient_app_ReferedByDr">
<span<?php echo $patient_app->ReferedByDr->viewAttributes() ?>>
<?php echo $patient_app->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->ReferClinicname->Visible) { // ReferClinicname ?>
		<td<?php echo $patient_app->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_ReferClinicname" class="patient_app_ReferClinicname">
<span<?php echo $patient_app->ReferClinicname->viewAttributes() ?>>
<?php echo $patient_app->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->ReferCity->Visible) { // ReferCity ?>
		<td<?php echo $patient_app->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_ReferCity" class="patient_app_ReferCity">
<span<?php echo $patient_app->ReferCity->viewAttributes() ?>>
<?php echo $patient_app->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td<?php echo $patient_app->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo">
<span<?php echo $patient_app->ReferMobileNo->viewAttributes() ?>>
<?php echo $patient_app->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td<?php echo $patient_app->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant">
<span<?php echo $patient_app->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $patient_app->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td<?php echo $patient_app->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor">
<span<?php echo $patient_app->PurposreReferredfor->viewAttributes() ?>>
<?php echo $patient_app->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_title->Visible) { // spouse_title ?>
		<td<?php echo $patient_app->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_title" class="patient_app_spouse_title">
<span<?php echo $patient_app->spouse_title->viewAttributes() ?>>
<?php echo $patient_app->spouse_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_first_name->Visible) { // spouse_first_name ?>
		<td<?php echo $patient_app->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_first_name" class="patient_app_spouse_first_name">
<span<?php echo $patient_app->spouse_first_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td<?php echo $patient_app->spouse_middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name">
<span<?php echo $patient_app->spouse_middle_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_last_name->Visible) { // spouse_last_name ?>
		<td<?php echo $patient_app->spouse_last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_last_name" class="patient_app_spouse_last_name">
<span<?php echo $patient_app->spouse_last_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_gender->Visible) { // spouse_gender ?>
		<td<?php echo $patient_app->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_gender" class="patient_app_spouse_gender">
<span<?php echo $patient_app->spouse_gender->viewAttributes() ?>>
<?php echo $patient_app->spouse_gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_dob->Visible) { // spouse_dob ?>
		<td<?php echo $patient_app->spouse_dob->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_dob" class="patient_app_spouse_dob">
<span<?php echo $patient_app->spouse_dob->viewAttributes() ?>>
<?php echo $patient_app->spouse_dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_Age->Visible) { // spouse_Age ?>
		<td<?php echo $patient_app->spouse_Age->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_Age" class="patient_app_spouse_Age">
<span<?php echo $patient_app->spouse_Age->viewAttributes() ?>>
<?php echo $patient_app->spouse_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td<?php echo $patient_app->spouse_blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group">
<span<?php echo $patient_app->spouse_blood_group->viewAttributes() ?>>
<?php echo $patient_app->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td<?php echo $patient_app->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no">
<span<?php echo $patient_app->spouse_mobile_no->viewAttributes() ?>>
<?php echo $patient_app->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Maritalstatus->Visible) { // Maritalstatus ?>
		<td<?php echo $patient_app->Maritalstatus->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Maritalstatus" class="patient_app_Maritalstatus">
<span<?php echo $patient_app->Maritalstatus->viewAttributes() ?>>
<?php echo $patient_app->Maritalstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Business->Visible) { // Business ?>
		<td<?php echo $patient_app->Business->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Business" class="patient_app_Business">
<span<?php echo $patient_app->Business->viewAttributes() ?>>
<?php echo $patient_app->Business->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Patient_Language->Visible) { // Patient_Language ?>
		<td<?php echo $patient_app->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Patient_Language" class="patient_app_Patient_Language">
<span<?php echo $patient_app->Patient_Language->viewAttributes() ?>>
<?php echo $patient_app->Patient_Language->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Passport->Visible) { // Passport ?>
		<td<?php echo $patient_app->Passport->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Passport" class="patient_app_Passport">
<span<?php echo $patient_app->Passport->viewAttributes() ?>>
<?php echo $patient_app->Passport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->VisaNo->Visible) { // VisaNo ?>
		<td<?php echo $patient_app->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_VisaNo" class="patient_app_VisaNo">
<span<?php echo $patient_app->VisaNo->viewAttributes() ?>>
<?php echo $patient_app->VisaNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td<?php echo $patient_app->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa">
<span<?php echo $patient_app->ValidityOfVisa->viewAttributes() ?>>
<?php echo $patient_app->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td<?php echo $patient_app->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear">
<span<?php echo $patient_app->WhereDidYouHear->viewAttributes() ?>>
<?php echo $patient_app->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_app->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_HospID" class="patient_app_HospID">
<span<?php echo $patient_app->HospID->viewAttributes() ?>>
<?php echo $patient_app->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->street->Visible) { // street ?>
		<td<?php echo $patient_app->street->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_street" class="patient_app_street">
<span<?php echo $patient_app->street->viewAttributes() ?>>
<?php echo $patient_app->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->town->Visible) { // town ?>
		<td<?php echo $patient_app->town->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_town" class="patient_app_town">
<span<?php echo $patient_app->town->viewAttributes() ?>>
<?php echo $patient_app->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->province->Visible) { // province ?>
		<td<?php echo $patient_app->province->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_province" class="patient_app_province">
<span<?php echo $patient_app->province->viewAttributes() ?>>
<?php echo $patient_app->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->country->Visible) { // country ?>
		<td<?php echo $patient_app->country->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_country" class="patient_app_country">
<span<?php echo $patient_app->country->viewAttributes() ?>>
<?php echo $patient_app->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->postal_code->Visible) { // postal_code ?>
		<td<?php echo $patient_app->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_postal_code" class="patient_app_postal_code">
<span<?php echo $patient_app->postal_code->viewAttributes() ?>>
<?php echo $patient_app->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->PEmail->Visible) { // PEmail ?>
		<td<?php echo $patient_app->PEmail->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_PEmail" class="patient_app_PEmail">
<span<?php echo $patient_app->PEmail->viewAttributes() ?>>
<?php echo $patient_app->PEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td<?php echo $patient_app->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact">
<span<?php echo $patient_app->PEmergencyContact->viewAttributes() ?>>
<?php echo $patient_app->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->occupation->Visible) { // occupation ?>
		<td<?php echo $patient_app->occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_occupation" class="patient_app_occupation">
<span<?php echo $patient_app->occupation->viewAttributes() ?>>
<?php echo $patient_app->occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->spouse_occupation->Visible) { // spouse_occupation ?>
		<td<?php echo $patient_app->spouse_occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_spouse_occupation" class="patient_app_spouse_occupation">
<span<?php echo $patient_app->spouse_occupation->viewAttributes() ?>>
<?php echo $patient_app->spouse_occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->WhatsApp->Visible) { // WhatsApp ?>
		<td<?php echo $patient_app->WhatsApp->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_WhatsApp" class="patient_app_WhatsApp">
<span<?php echo $patient_app->WhatsApp->viewAttributes() ?>>
<?php echo $patient_app->WhatsApp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->CouppleID->Visible) { // CouppleID ?>
		<td<?php echo $patient_app->CouppleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_CouppleID" class="patient_app_CouppleID">
<span<?php echo $patient_app->CouppleID->viewAttributes() ?>>
<?php echo $patient_app->CouppleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->MaleID->Visible) { // MaleID ?>
		<td<?php echo $patient_app->MaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_MaleID" class="patient_app_MaleID">
<span<?php echo $patient_app->MaleID->viewAttributes() ?>>
<?php echo $patient_app->MaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->FemaleID->Visible) { // FemaleID ?>
		<td<?php echo $patient_app->FemaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_FemaleID" class="patient_app_FemaleID">
<span<?php echo $patient_app->FemaleID->viewAttributes() ?>>
<?php echo $patient_app->FemaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->GroupID->Visible) { // GroupID ?>
		<td<?php echo $patient_app->GroupID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_GroupID" class="patient_app_GroupID">
<span<?php echo $patient_app->GroupID->viewAttributes() ?>>
<?php echo $patient_app->GroupID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app->Relationship->Visible) { // Relationship ?>
		<td<?php echo $patient_app->Relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCnt ?>_patient_app_Relationship" class="patient_app_Relationship">
<span<?php echo $patient_app->Relationship->viewAttributes() ?>>
<?php echo $patient_app->Relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_app_delete->Recordset->moveNext();
}
$patient_app_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_app_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_app_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_app_delete->terminate();
?>