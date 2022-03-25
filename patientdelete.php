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
$patient_delete = new patient_delete();

// Run the page
$patient_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatientdelete = currentForm = new ew.Form("fpatientdelete", "delete");

// Form_CustomValidate event
fpatientdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatientdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatientdelete.lists["x_title"] = <?php echo $patient_delete->title->Lookup->toClientList() ?>;
fpatientdelete.lists["x_title"].options = <?php echo JsonEncode($patient_delete->title->lookupOptions()) ?>;
fpatientdelete.lists["x_gender"] = <?php echo $patient_delete->gender->Lookup->toClientList() ?>;
fpatientdelete.lists["x_gender"].options = <?php echo JsonEncode($patient_delete->gender->lookupOptions()) ?>;
fpatientdelete.lists["x_blood_group"] = <?php echo $patient_delete->blood_group->Lookup->toClientList() ?>;
fpatientdelete.lists["x_blood_group"].options = <?php echo JsonEncode($patient_delete->blood_group->lookupOptions()) ?>;
fpatientdelete.lists["x_status"] = <?php echo $patient_delete->status->Lookup->toClientList() ?>;
fpatientdelete.lists["x_status"].options = <?php echo JsonEncode($patient_delete->status->lookupOptions()) ?>;
fpatientdelete.lists["x_ReferedByDr"] = <?php echo $patient_delete->ReferedByDr->Lookup->toClientList() ?>;
fpatientdelete.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_delete->ReferedByDr->lookupOptions()) ?>;
fpatientdelete.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_delete->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fpatientdelete.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_delete->ReferA4TreatingConsultant->lookupOptions()) ?>;
fpatientdelete.lists["x_spouse_title"] = <?php echo $patient_delete->spouse_title->Lookup->toClientList() ?>;
fpatientdelete.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_delete->spouse_title->lookupOptions()) ?>;
fpatientdelete.lists["x_spouse_gender"] = <?php echo $patient_delete->spouse_gender->Lookup->toClientList() ?>;
fpatientdelete.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_delete->spouse_gender->lookupOptions()) ?>;
fpatientdelete.lists["x_spouse_blood_group"] = <?php echo $patient_delete->spouse_blood_group->Lookup->toClientList() ?>;
fpatientdelete.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_delete->spouse_blood_group->lookupOptions()) ?>;
fpatientdelete.lists["x_Maritalstatus"] = <?php echo $patient_delete->Maritalstatus->Lookup->toClientList() ?>;
fpatientdelete.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_delete->Maritalstatus->lookupOptions()) ?>;
fpatientdelete.lists["x_Business"] = <?php echo $patient_delete->Business->Lookup->toClientList() ?>;
fpatientdelete.lists["x_Business"].options = <?php echo JsonEncode($patient_delete->Business->lookupOptions()) ?>;
fpatientdelete.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatientdelete.lists["x_Patient_Language"] = <?php echo $patient_delete->Patient_Language->Lookup->toClientList() ?>;
fpatientdelete.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_delete->Patient_Language->lookupOptions()) ?>;
fpatientdelete.lists["x_WhereDidYouHear[]"] = <?php echo $patient_delete->WhereDidYouHear->Lookup->toClientList() ?>;
fpatientdelete.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_delete->WhereDidYouHear->lookupOptions()) ?>;
fpatientdelete.lists["x_HospID"] = <?php echo $patient_delete->HospID->Lookup->toClientList() ?>;
fpatientdelete.lists["x_HospID"].options = <?php echo JsonEncode($patient_delete->HospID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_delete->showPageHeader(); ?>
<?php
$patient_delete->showMessage();
?>
<form name="fpatientdelete" id="fpatientdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient->id->Visible) { // id ?>
		<th class="<?php echo $patient->id->headerCellClass() ?>"><span id="elh_patient_id" class="patient_id"><?php echo $patient->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $patient->PatientID->headerCellClass() ?>"><span id="elh_patient_PatientID" class="patient_PatientID"><?php echo $patient->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
		<th class="<?php echo $patient->title->headerCellClass() ?>"><span id="elh_patient_title" class="patient_title"><?php echo $patient->title->caption() ?></span></th>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
		<th class="<?php echo $patient->first_name->headerCellClass() ?>"><span id="elh_patient_first_name" class="patient_first_name"><?php echo $patient->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
		<th class="<?php echo $patient->gender->headerCellClass() ?>"><span id="elh_patient_gender" class="patient_gender"><?php echo $patient->gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient->dob->Visible) { // dob ?>
		<th class="<?php echo $patient->dob->headerCellClass() ?>"><span id="elh_patient_dob" class="patient_dob"><?php echo $patient->dob->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
		<th class="<?php echo $patient->Age->headerCellClass() ?>"><span id="elh_patient_Age" class="patient_Age"><?php echo $patient->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
		<th class="<?php echo $patient->blood_group->headerCellClass() ?>"><span id="elh_patient_blood_group" class="patient_blood_group"><?php echo $patient->blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
		<th class="<?php echo $patient->mobile_no->headerCellClass() ?>"><span id="elh_patient_mobile_no" class="patient_mobile_no"><?php echo $patient->mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($patient->status->Visible) { // status ?>
		<th class="<?php echo $patient->status->headerCellClass() ?>"><span id="elh_patient_status" class="patient_status"><?php echo $patient->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient->createddatetime->headerCellClass() ?>"><span id="elh_patient_createddatetime" class="patient_createddatetime"><?php echo $patient->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $patient->profilePic->headerCellClass() ?>"><span id="elh_patient_profilePic" class="patient_profilePic"><?php echo $patient->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $patient->IdentificationMark->headerCellClass() ?>"><span id="elh_patient_IdentificationMark" class="patient_IdentificationMark"><?php echo $patient->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
		<th class="<?php echo $patient->Religion->headerCellClass() ?>"><span id="elh_patient_Religion" class="patient_Religion"><?php echo $patient->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
		<th class="<?php echo $patient->Nationality->headerCellClass() ?>"><span id="elh_patient_Nationality" class="patient_Nationality"><?php echo $patient->Nationality->caption() ?></span></th>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
		<th class="<?php echo $patient->ReferedByDr->headerCellClass() ?>"><span id="elh_patient_ReferedByDr" class="patient_ReferedByDr"><?php echo $patient->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($patient->ReferClinicname->Visible) { // ReferClinicname ?>
		<th class="<?php echo $patient->ReferClinicname->headerCellClass() ?>"><span id="elh_patient_ReferClinicname" class="patient_ReferClinicname"><?php echo $patient->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($patient->ReferCity->Visible) { // ReferCity ?>
		<th class="<?php echo $patient->ReferCity->headerCellClass() ?>"><span id="elh_patient_ReferCity" class="patient_ReferCity"><?php echo $patient->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<th class="<?php echo $patient->ReferMobileNo->headerCellClass() ?>"><span id="elh_patient_ReferMobileNo" class="patient_ReferMobileNo"><?php echo $patient->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<th class="<?php echo $patient->ReferA4TreatingConsultant->headerCellClass() ?>"><span id="elh_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant"><?php echo $patient->ReferA4TreatingConsultant->caption() ?></span></th>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<th class="<?php echo $patient->PurposreReferredfor->headerCellClass() ?>"><span id="elh_patient_PurposreReferredfor" class="patient_PurposreReferredfor"><?php echo $patient->PurposreReferredfor->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
		<th class="<?php echo $patient->spouse_title->headerCellClass() ?>"><span id="elh_patient_spouse_title" class="patient_spouse_title"><?php echo $patient->spouse_title->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
		<th class="<?php echo $patient->spouse_first_name->headerCellClass() ?>"><span id="elh_patient_spouse_first_name" class="patient_spouse_first_name"><?php echo $patient->spouse_first_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<th class="<?php echo $patient->spouse_middle_name->headerCellClass() ?>"><span id="elh_patient_spouse_middle_name" class="patient_spouse_middle_name"><?php echo $patient->spouse_middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_last_name->Visible) { // spouse_last_name ?>
		<th class="<?php echo $patient->spouse_last_name->headerCellClass() ?>"><span id="elh_patient_spouse_last_name" class="patient_spouse_last_name"><?php echo $patient->spouse_last_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
		<th class="<?php echo $patient->spouse_gender->headerCellClass() ?>"><span id="elh_patient_spouse_gender" class="patient_spouse_gender"><?php echo $patient->spouse_gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_dob->Visible) { // spouse_dob ?>
		<th class="<?php echo $patient->spouse_dob->headerCellClass() ?>"><span id="elh_patient_spouse_dob" class="patient_spouse_dob"><?php echo $patient->spouse_dob->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_Age->Visible) { // spouse_Age ?>
		<th class="<?php echo $patient->spouse_Age->headerCellClass() ?>"><span id="elh_patient_spouse_Age" class="patient_spouse_Age"><?php echo $patient->spouse_Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<th class="<?php echo $patient->spouse_blood_group->headerCellClass() ?>"><span id="elh_patient_spouse_blood_group" class="patient_spouse_blood_group"><?php echo $patient->spouse_blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<th class="<?php echo $patient->spouse_mobile_no->headerCellClass() ?>"><span id="elh_patient_spouse_mobile_no" class="patient_spouse_mobile_no"><?php echo $patient->spouse_mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Maritalstatus->Visible) { // Maritalstatus ?>
		<th class="<?php echo $patient->Maritalstatus->headerCellClass() ?>"><span id="elh_patient_Maritalstatus" class="patient_Maritalstatus"><?php echo $patient->Maritalstatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Business->Visible) { // Business ?>
		<th class="<?php echo $patient->Business->headerCellClass() ?>"><span id="elh_patient_Business" class="patient_Business"><?php echo $patient->Business->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Patient_Language->Visible) { // Patient_Language ?>
		<th class="<?php echo $patient->Patient_Language->headerCellClass() ?>"><span id="elh_patient_Patient_Language" class="patient_Patient_Language"><?php echo $patient->Patient_Language->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
		<th class="<?php echo $patient->Passport->headerCellClass() ?>"><span id="elh_patient_Passport" class="patient_Passport"><?php echo $patient->Passport->caption() ?></span></th>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
		<th class="<?php echo $patient->VisaNo->headerCellClass() ?>"><span id="elh_patient_VisaNo" class="patient_VisaNo"><?php echo $patient->VisaNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<th class="<?php echo $patient->ValidityOfVisa->headerCellClass() ?>"><span id="elh_patient_ValidityOfVisa" class="patient_ValidityOfVisa"><?php echo $patient->ValidityOfVisa->caption() ?></span></th>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<th class="<?php echo $patient->WhereDidYouHear->headerCellClass() ?>"><span id="elh_patient_WhereDidYouHear" class="patient_WhereDidYouHear"><?php echo $patient->WhereDidYouHear->caption() ?></span></th>
<?php } ?>
<?php if ($patient->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient->HospID->headerCellClass() ?>"><span id="elh_patient_HospID" class="patient_HospID"><?php echo $patient->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
		<th class="<?php echo $patient->street->headerCellClass() ?>"><span id="elh_patient_street" class="patient_street"><?php echo $patient->street->caption() ?></span></th>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
		<th class="<?php echo $patient->town->headerCellClass() ?>"><span id="elh_patient_town" class="patient_town"><?php echo $patient->town->caption() ?></span></th>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
		<th class="<?php echo $patient->province->headerCellClass() ?>"><span id="elh_patient_province" class="patient_province"><?php echo $patient->province->caption() ?></span></th>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
		<th class="<?php echo $patient->country->headerCellClass() ?>"><span id="elh_patient_country" class="patient_country"><?php echo $patient->country->caption() ?></span></th>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $patient->postal_code->headerCellClass() ?>"><span id="elh_patient_postal_code" class="patient_postal_code"><?php echo $patient->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
		<th class="<?php echo $patient->PEmail->headerCellClass() ?>"><span id="elh_patient_PEmail" class="patient_PEmail"><?php echo $patient->PEmail->caption() ?></span></th>
<?php } ?>
<?php if ($patient->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<th class="<?php echo $patient->PEmergencyContact->headerCellClass() ?>"><span id="elh_patient_PEmergencyContact" class="patient_PEmergencyContact"><?php echo $patient->PEmergencyContact->caption() ?></span></th>
<?php } ?>
<?php if ($patient->occupation->Visible) { // occupation ?>
		<th class="<?php echo $patient->occupation->headerCellClass() ?>"><span id="elh_patient_occupation" class="patient_occupation"><?php echo $patient->occupation->caption() ?></span></th>
<?php } ?>
<?php if ($patient->spouse_occupation->Visible) { // spouse_occupation ?>
		<th class="<?php echo $patient->spouse_occupation->headerCellClass() ?>"><span id="elh_patient_spouse_occupation" class="patient_spouse_occupation"><?php echo $patient->spouse_occupation->caption() ?></span></th>
<?php } ?>
<?php if ($patient->WhatsApp->Visible) { // WhatsApp ?>
		<th class="<?php echo $patient->WhatsApp->headerCellClass() ?>"><span id="elh_patient_WhatsApp" class="patient_WhatsApp"><?php echo $patient->WhatsApp->caption() ?></span></th>
<?php } ?>
<?php if ($patient->CouppleID->Visible) { // CouppleID ?>
		<th class="<?php echo $patient->CouppleID->headerCellClass() ?>"><span id="elh_patient_CouppleID" class="patient_CouppleID"><?php echo $patient->CouppleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient->MaleID->Visible) { // MaleID ?>
		<th class="<?php echo $patient->MaleID->headerCellClass() ?>"><span id="elh_patient_MaleID" class="patient_MaleID"><?php echo $patient->MaleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient->FemaleID->Visible) { // FemaleID ?>
		<th class="<?php echo $patient->FemaleID->headerCellClass() ?>"><span id="elh_patient_FemaleID" class="patient_FemaleID"><?php echo $patient->FemaleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient->GroupID->Visible) { // GroupID ?>
		<th class="<?php echo $patient->GroupID->headerCellClass() ?>"><span id="elh_patient_GroupID" class="patient_GroupID"><?php echo $patient->GroupID->caption() ?></span></th>
<?php } ?>
<?php if ($patient->Relationship->Visible) { // Relationship ?>
		<th class="<?php echo $patient->Relationship->headerCellClass() ?>"><span id="elh_patient_Relationship" class="patient_Relationship"><?php echo $patient->Relationship->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_delete->RecCnt = 0;
$i = 0;
while (!$patient_delete->Recordset->EOF) {
	$patient_delete->RecCnt++;
	$patient_delete->RowCnt++;

	// Set row properties
	$patient->resetAttributes();
	$patient->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_delete->loadRowValues($patient_delete->Recordset);

	// Render row
	$patient_delete->renderRow();
?>
	<tr<?php echo $patient->rowAttributes() ?>>
<?php if ($patient->id->Visible) { // id ?>
		<td<?php echo $patient->id->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_id" class="patient_id">
<span<?php echo $patient->id->viewAttributes() ?>>
<?php echo $patient->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->PatientID->Visible) { // PatientID ?>
		<td<?php echo $patient->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_PatientID" class="patient_PatientID">
<span<?php echo $patient->PatientID->viewAttributes() ?>>
<?php echo $patient->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
		<td<?php echo $patient->title->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_title" class="patient_title">
<span<?php echo $patient->title->viewAttributes() ?>>
<?php echo $patient->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
		<td<?php echo $patient->first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_first_name" class="patient_first_name">
<span<?php echo $patient->first_name->viewAttributes() ?>>
<?php echo $patient->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
		<td<?php echo $patient->gender->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_gender" class="patient_gender">
<span<?php echo $patient->gender->viewAttributes() ?>>
<?php echo $patient->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->dob->Visible) { // dob ?>
		<td<?php echo $patient->dob->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_dob" class="patient_dob">
<span<?php echo $patient->dob->viewAttributes() ?>>
<?php echo $patient->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
		<td<?php echo $patient->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Age" class="patient_Age">
<span<?php echo $patient->Age->viewAttributes() ?>>
<?php echo $patient->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
		<td<?php echo $patient->blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_blood_group" class="patient_blood_group">
<span<?php echo $patient->blood_group->viewAttributes() ?>>
<?php echo $patient->blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
		<td<?php echo $patient->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_mobile_no" class="patient_mobile_no">
<span<?php echo $patient->mobile_no->viewAttributes() ?>>
<?php echo $patient->mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->status->Visible) { // status ?>
		<td<?php echo $patient->status->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_status" class="patient_status">
<span<?php echo $patient->status->viewAttributes() ?>>
<?php echo $patient->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_createddatetime" class="patient_createddatetime">
<span<?php echo $patient->createddatetime->viewAttributes() ?>>
<?php echo $patient->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
		<td<?php echo $patient->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_profilePic" class="patient_profilePic">
<span>
<?php echo GetFileViewTag($patient->profilePic, $patient->profilePic->getViewValue()) ?>
</span>
</span>
</td>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
		<td<?php echo $patient->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_IdentificationMark" class="patient_IdentificationMark">
<span<?php echo $patient->IdentificationMark->viewAttributes() ?>>
<?php echo $patient->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
		<td<?php echo $patient->Religion->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Religion" class="patient_Religion">
<span<?php echo $patient->Religion->viewAttributes() ?>>
<?php echo $patient->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
		<td<?php echo $patient->Nationality->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Nationality" class="patient_Nationality">
<span<?php echo $patient->Nationality->viewAttributes() ?>>
<?php echo $patient->Nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
		<td<?php echo $patient->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_ReferedByDr" class="patient_ReferedByDr">
<span<?php echo $patient->ReferedByDr->viewAttributes() ?>>
<?php echo $patient->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->ReferClinicname->Visible) { // ReferClinicname ?>
		<td<?php echo $patient->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_ReferClinicname" class="patient_ReferClinicname">
<span<?php echo $patient->ReferClinicname->viewAttributes() ?>>
<?php echo $patient->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->ReferCity->Visible) { // ReferCity ?>
		<td<?php echo $patient->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_ReferCity" class="patient_ReferCity">
<span<?php echo $patient->ReferCity->viewAttributes() ?>>
<?php echo $patient->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td<?php echo $patient->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_ReferMobileNo" class="patient_ReferMobileNo">
<span<?php echo $patient->ReferMobileNo->viewAttributes() ?>>
<?php echo $patient->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td<?php echo $patient->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_ReferA4TreatingConsultant" class="patient_ReferA4TreatingConsultant">
<span<?php echo $patient->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $patient->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td<?php echo $patient->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_PurposreReferredfor" class="patient_PurposreReferredfor">
<span<?php echo $patient->PurposreReferredfor->viewAttributes() ?>>
<?php echo $patient->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
		<td<?php echo $patient->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_title" class="patient_spouse_title">
<span<?php echo $patient->spouse_title->viewAttributes() ?>>
<?php echo $patient->spouse_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
		<td<?php echo $patient->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_first_name" class="patient_spouse_first_name">
<span<?php echo $patient->spouse_first_name->viewAttributes() ?>>
<?php echo $patient->spouse_first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td<?php echo $patient->spouse_middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_middle_name" class="patient_spouse_middle_name">
<span<?php echo $patient->spouse_middle_name->viewAttributes() ?>>
<?php echo $patient->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_last_name->Visible) { // spouse_last_name ?>
		<td<?php echo $patient->spouse_last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_last_name" class="patient_spouse_last_name">
<span<?php echo $patient->spouse_last_name->viewAttributes() ?>>
<?php echo $patient->spouse_last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
		<td<?php echo $patient->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_gender" class="patient_spouse_gender">
<span<?php echo $patient->spouse_gender->viewAttributes() ?>>
<?php echo $patient->spouse_gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_dob->Visible) { // spouse_dob ?>
		<td<?php echo $patient->spouse_dob->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_dob" class="patient_spouse_dob">
<span<?php echo $patient->spouse_dob->viewAttributes() ?>>
<?php echo $patient->spouse_dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_Age->Visible) { // spouse_Age ?>
		<td<?php echo $patient->spouse_Age->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_Age" class="patient_spouse_Age">
<span<?php echo $patient->spouse_Age->viewAttributes() ?>>
<?php echo $patient->spouse_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td<?php echo $patient->spouse_blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_blood_group" class="patient_spouse_blood_group">
<span<?php echo $patient->spouse_blood_group->viewAttributes() ?>>
<?php echo $patient->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td<?php echo $patient->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_mobile_no" class="patient_spouse_mobile_no">
<span<?php echo $patient->spouse_mobile_no->viewAttributes() ?>>
<?php echo $patient->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Maritalstatus->Visible) { // Maritalstatus ?>
		<td<?php echo $patient->Maritalstatus->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Maritalstatus" class="patient_Maritalstatus">
<span<?php echo $patient->Maritalstatus->viewAttributes() ?>>
<?php echo $patient->Maritalstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Business->Visible) { // Business ?>
		<td<?php echo $patient->Business->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Business" class="patient_Business">
<span<?php echo $patient->Business->viewAttributes() ?>>
<?php echo $patient->Business->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Patient_Language->Visible) { // Patient_Language ?>
		<td<?php echo $patient->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Patient_Language" class="patient_Patient_Language">
<span<?php echo $patient->Patient_Language->viewAttributes() ?>>
<?php echo $patient->Patient_Language->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
		<td<?php echo $patient->Passport->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Passport" class="patient_Passport">
<span<?php echo $patient->Passport->viewAttributes() ?>>
<?php echo $patient->Passport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
		<td<?php echo $patient->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_VisaNo" class="patient_VisaNo">
<span<?php echo $patient->VisaNo->viewAttributes() ?>>
<?php echo $patient->VisaNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td<?php echo $patient->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_ValidityOfVisa" class="patient_ValidityOfVisa">
<span<?php echo $patient->ValidityOfVisa->viewAttributes() ?>>
<?php echo $patient->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td<?php echo $patient->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_WhereDidYouHear" class="patient_WhereDidYouHear">
<span<?php echo $patient->WhereDidYouHear->viewAttributes() ?>>
<?php echo $patient->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->HospID->Visible) { // HospID ?>
		<td<?php echo $patient->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_HospID" class="patient_HospID">
<span<?php echo $patient->HospID->viewAttributes() ?>>
<?php echo $patient->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
		<td<?php echo $patient->street->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_street" class="patient_street">
<span<?php echo $patient->street->viewAttributes() ?>>
<?php echo $patient->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
		<td<?php echo $patient->town->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_town" class="patient_town">
<span<?php echo $patient->town->viewAttributes() ?>>
<?php echo $patient->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
		<td<?php echo $patient->province->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_province" class="patient_province">
<span<?php echo $patient->province->viewAttributes() ?>>
<?php echo $patient->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
		<td<?php echo $patient->country->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_country" class="patient_country">
<span<?php echo $patient->country->viewAttributes() ?>>
<?php echo $patient->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
		<td<?php echo $patient->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_postal_code" class="patient_postal_code">
<span<?php echo $patient->postal_code->viewAttributes() ?>>
<?php echo $patient->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
		<td<?php echo $patient->PEmail->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_PEmail" class="patient_PEmail">
<span<?php echo $patient->PEmail->viewAttributes() ?>>
<?php echo $patient->PEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td<?php echo $patient->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_PEmergencyContact" class="patient_PEmergencyContact">
<span<?php echo $patient->PEmergencyContact->viewAttributes() ?>>
<?php echo $patient->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->occupation->Visible) { // occupation ?>
		<td<?php echo $patient->occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_occupation" class="patient_occupation">
<span<?php echo $patient->occupation->viewAttributes() ?>>
<?php echo $patient->occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->spouse_occupation->Visible) { // spouse_occupation ?>
		<td<?php echo $patient->spouse_occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_spouse_occupation" class="patient_spouse_occupation">
<span<?php echo $patient->spouse_occupation->viewAttributes() ?>>
<?php echo $patient->spouse_occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->WhatsApp->Visible) { // WhatsApp ?>
		<td<?php echo $patient->WhatsApp->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_WhatsApp" class="patient_WhatsApp">
<span<?php echo $patient->WhatsApp->viewAttributes() ?>>
<?php echo $patient->WhatsApp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->CouppleID->Visible) { // CouppleID ?>
		<td<?php echo $patient->CouppleID->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_CouppleID" class="patient_CouppleID">
<span<?php echo $patient->CouppleID->viewAttributes() ?>>
<?php echo $patient->CouppleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->MaleID->Visible) { // MaleID ?>
		<td<?php echo $patient->MaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_MaleID" class="patient_MaleID">
<span<?php echo $patient->MaleID->viewAttributes() ?>>
<?php echo $patient->MaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->FemaleID->Visible) { // FemaleID ?>
		<td<?php echo $patient->FemaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_FemaleID" class="patient_FemaleID">
<span<?php echo $patient->FemaleID->viewAttributes() ?>>
<?php echo $patient->FemaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->GroupID->Visible) { // GroupID ?>
		<td<?php echo $patient->GroupID->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_GroupID" class="patient_GroupID">
<span<?php echo $patient->GroupID->viewAttributes() ?>>
<?php echo $patient->GroupID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient->Relationship->Visible) { // Relationship ?>
		<td<?php echo $patient->Relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_delete->RowCnt ?>_patient_Relationship" class="patient_Relationship">
<span<?php echo $patient->Relationship->viewAttributes() ?>>
<?php echo $patient->Relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_delete->Recordset->moveNext();
}
$patient_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_delete->terminate();
?>