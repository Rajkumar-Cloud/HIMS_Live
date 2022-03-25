<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<script>
var fpatient_appdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_appdelete = currentForm = new ew.Form("fpatient_appdelete", "delete");
	loadjs.done("fpatient_appdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_app_delete->showPageHeader(); ?>
<?php
$patient_app_delete->showMessage();
?>
<form name="fpatient_appdelete" id="fpatient_appdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_app_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_app_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_app_delete->id->headerCellClass() ?>"><span id="elh_patient_app_id" class="patient_app_id"><?php echo $patient_app_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $patient_app_delete->PatientID->headerCellClass() ?>"><span id="elh_patient_app_PatientID" class="patient_app_PatientID"><?php echo $patient_app_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->title->Visible) { // title ?>
		<th class="<?php echo $patient_app_delete->title->headerCellClass() ?>"><span id="elh_patient_app_title" class="patient_app_title"><?php echo $patient_app_delete->title->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->first_name->Visible) { // first_name ?>
		<th class="<?php echo $patient_app_delete->first_name->headerCellClass() ?>"><span id="elh_patient_app_first_name" class="patient_app_first_name"><?php echo $patient_app_delete->first_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->middle_name->Visible) { // middle_name ?>
		<th class="<?php echo $patient_app_delete->middle_name->headerCellClass() ?>"><span id="elh_patient_app_middle_name" class="patient_app_middle_name"><?php echo $patient_app_delete->middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->last_name->Visible) { // last_name ?>
		<th class="<?php echo $patient_app_delete->last_name->headerCellClass() ?>"><span id="elh_patient_app_last_name" class="patient_app_last_name"><?php echo $patient_app_delete->last_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->gender->Visible) { // gender ?>
		<th class="<?php echo $patient_app_delete->gender->headerCellClass() ?>"><span id="elh_patient_app_gender" class="patient_app_gender"><?php echo $patient_app_delete->gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->dob->Visible) { // dob ?>
		<th class="<?php echo $patient_app_delete->dob->headerCellClass() ?>"><span id="elh_patient_app_dob" class="patient_app_dob"><?php echo $patient_app_delete->dob->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_app_delete->Age->headerCellClass() ?>"><span id="elh_patient_app_Age" class="patient_app_Age"><?php echo $patient_app_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->blood_group->Visible) { // blood_group ?>
		<th class="<?php echo $patient_app_delete->blood_group->headerCellClass() ?>"><span id="elh_patient_app_blood_group" class="patient_app_blood_group"><?php echo $patient_app_delete->blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->mobile_no->Visible) { // mobile_no ?>
		<th class="<?php echo $patient_app_delete->mobile_no->headerCellClass() ?>"><span id="elh_patient_app_mobile_no" class="patient_app_mobile_no"><?php echo $patient_app_delete->mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->IdentificationMark->Visible) { // IdentificationMark ?>
		<th class="<?php echo $patient_app_delete->IdentificationMark->headerCellClass() ?>"><span id="elh_patient_app_IdentificationMark" class="patient_app_IdentificationMark"><?php echo $patient_app_delete->IdentificationMark->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Religion->Visible) { // Religion ?>
		<th class="<?php echo $patient_app_delete->Religion->headerCellClass() ?>"><span id="elh_patient_app_Religion" class="patient_app_Religion"><?php echo $patient_app_delete->Religion->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Nationality->Visible) { // Nationality ?>
		<th class="<?php echo $patient_app_delete->Nationality->headerCellClass() ?>"><span id="elh_patient_app_Nationality" class="patient_app_Nationality"><?php echo $patient_app_delete->Nationality->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $patient_app_delete->profilePic->headerCellClass() ?>"><span id="elh_patient_app_profilePic" class="patient_app_profilePic"><?php echo $patient_app_delete->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_app_delete->status->headerCellClass() ?>"><span id="elh_patient_app_status" class="patient_app_status"><?php echo $patient_app_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_app_delete->createdby->headerCellClass() ?>"><span id="elh_patient_app_createdby" class="patient_app_createdby"><?php echo $patient_app_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_app_delete->createddatetime->headerCellClass() ?>"><span id="elh_patient_app_createddatetime" class="patient_app_createddatetime"><?php echo $patient_app_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_app_delete->modifiedby->headerCellClass() ?>"><span id="elh_patient_app_modifiedby" class="patient_app_modifiedby"><?php echo $patient_app_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_app_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_app_modifieddatetime" class="patient_app_modifieddatetime"><?php echo $patient_app_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->ReferedByDr->Visible) { // ReferedByDr ?>
		<th class="<?php echo $patient_app_delete->ReferedByDr->headerCellClass() ?>"><span id="elh_patient_app_ReferedByDr" class="patient_app_ReferedByDr"><?php echo $patient_app_delete->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->ReferClinicname->Visible) { // ReferClinicname ?>
		<th class="<?php echo $patient_app_delete->ReferClinicname->headerCellClass() ?>"><span id="elh_patient_app_ReferClinicname" class="patient_app_ReferClinicname"><?php echo $patient_app_delete->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->ReferCity->Visible) { // ReferCity ?>
		<th class="<?php echo $patient_app_delete->ReferCity->headerCellClass() ?>"><span id="elh_patient_app_ReferCity" class="patient_app_ReferCity"><?php echo $patient_app_delete->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<th class="<?php echo $patient_app_delete->ReferMobileNo->headerCellClass() ?>"><span id="elh_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo"><?php echo $patient_app_delete->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<th class="<?php echo $patient_app_delete->ReferA4TreatingConsultant->headerCellClass() ?>"><span id="elh_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant"><?php echo $patient_app_delete->ReferA4TreatingConsultant->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<th class="<?php echo $patient_app_delete->PurposreReferredfor->headerCellClass() ?>"><span id="elh_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor"><?php echo $patient_app_delete->PurposreReferredfor->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_title->Visible) { // spouse_title ?>
		<th class="<?php echo $patient_app_delete->spouse_title->headerCellClass() ?>"><span id="elh_patient_app_spouse_title" class="patient_app_spouse_title"><?php echo $patient_app_delete->spouse_title->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_first_name->Visible) { // spouse_first_name ?>
		<th class="<?php echo $patient_app_delete->spouse_first_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_first_name" class="patient_app_spouse_first_name"><?php echo $patient_app_delete->spouse_first_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<th class="<?php echo $patient_app_delete->spouse_middle_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name"><?php echo $patient_app_delete->spouse_middle_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_last_name->Visible) { // spouse_last_name ?>
		<th class="<?php echo $patient_app_delete->spouse_last_name->headerCellClass() ?>"><span id="elh_patient_app_spouse_last_name" class="patient_app_spouse_last_name"><?php echo $patient_app_delete->spouse_last_name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_gender->Visible) { // spouse_gender ?>
		<th class="<?php echo $patient_app_delete->spouse_gender->headerCellClass() ?>"><span id="elh_patient_app_spouse_gender" class="patient_app_spouse_gender"><?php echo $patient_app_delete->spouse_gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_dob->Visible) { // spouse_dob ?>
		<th class="<?php echo $patient_app_delete->spouse_dob->headerCellClass() ?>"><span id="elh_patient_app_spouse_dob" class="patient_app_spouse_dob"><?php echo $patient_app_delete->spouse_dob->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_Age->Visible) { // spouse_Age ?>
		<th class="<?php echo $patient_app_delete->spouse_Age->headerCellClass() ?>"><span id="elh_patient_app_spouse_Age" class="patient_app_spouse_Age"><?php echo $patient_app_delete->spouse_Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<th class="<?php echo $patient_app_delete->spouse_blood_group->headerCellClass() ?>"><span id="elh_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group"><?php echo $patient_app_delete->spouse_blood_group->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<th class="<?php echo $patient_app_delete->spouse_mobile_no->headerCellClass() ?>"><span id="elh_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no"><?php echo $patient_app_delete->spouse_mobile_no->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Maritalstatus->Visible) { // Maritalstatus ?>
		<th class="<?php echo $patient_app_delete->Maritalstatus->headerCellClass() ?>"><span id="elh_patient_app_Maritalstatus" class="patient_app_Maritalstatus"><?php echo $patient_app_delete->Maritalstatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Business->Visible) { // Business ?>
		<th class="<?php echo $patient_app_delete->Business->headerCellClass() ?>"><span id="elh_patient_app_Business" class="patient_app_Business"><?php echo $patient_app_delete->Business->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Patient_Language->Visible) { // Patient_Language ?>
		<th class="<?php echo $patient_app_delete->Patient_Language->headerCellClass() ?>"><span id="elh_patient_app_Patient_Language" class="patient_app_Patient_Language"><?php echo $patient_app_delete->Patient_Language->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Passport->Visible) { // Passport ?>
		<th class="<?php echo $patient_app_delete->Passport->headerCellClass() ?>"><span id="elh_patient_app_Passport" class="patient_app_Passport"><?php echo $patient_app_delete->Passport->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->VisaNo->Visible) { // VisaNo ?>
		<th class="<?php echo $patient_app_delete->VisaNo->headerCellClass() ?>"><span id="elh_patient_app_VisaNo" class="patient_app_VisaNo"><?php echo $patient_app_delete->VisaNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<th class="<?php echo $patient_app_delete->ValidityOfVisa->headerCellClass() ?>"><span id="elh_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa"><?php echo $patient_app_delete->ValidityOfVisa->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<th class="<?php echo $patient_app_delete->WhereDidYouHear->headerCellClass() ?>"><span id="elh_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear"><?php echo $patient_app_delete->WhereDidYouHear->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_app_delete->HospID->headerCellClass() ?>"><span id="elh_patient_app_HospID" class="patient_app_HospID"><?php echo $patient_app_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->street->Visible) { // street ?>
		<th class="<?php echo $patient_app_delete->street->headerCellClass() ?>"><span id="elh_patient_app_street" class="patient_app_street"><?php echo $patient_app_delete->street->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->town->Visible) { // town ?>
		<th class="<?php echo $patient_app_delete->town->headerCellClass() ?>"><span id="elh_patient_app_town" class="patient_app_town"><?php echo $patient_app_delete->town->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->province->Visible) { // province ?>
		<th class="<?php echo $patient_app_delete->province->headerCellClass() ?>"><span id="elh_patient_app_province" class="patient_app_province"><?php echo $patient_app_delete->province->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->country->Visible) { // country ?>
		<th class="<?php echo $patient_app_delete->country->headerCellClass() ?>"><span id="elh_patient_app_country" class="patient_app_country"><?php echo $patient_app_delete->country->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $patient_app_delete->postal_code->headerCellClass() ?>"><span id="elh_patient_app_postal_code" class="patient_app_postal_code"><?php echo $patient_app_delete->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->PEmail->Visible) { // PEmail ?>
		<th class="<?php echo $patient_app_delete->PEmail->headerCellClass() ?>"><span id="elh_patient_app_PEmail" class="patient_app_PEmail"><?php echo $patient_app_delete->PEmail->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<th class="<?php echo $patient_app_delete->PEmergencyContact->headerCellClass() ?>"><span id="elh_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact"><?php echo $patient_app_delete->PEmergencyContact->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->occupation->Visible) { // occupation ?>
		<th class="<?php echo $patient_app_delete->occupation->headerCellClass() ?>"><span id="elh_patient_app_occupation" class="patient_app_occupation"><?php echo $patient_app_delete->occupation->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->spouse_occupation->Visible) { // spouse_occupation ?>
		<th class="<?php echo $patient_app_delete->spouse_occupation->headerCellClass() ?>"><span id="elh_patient_app_spouse_occupation" class="patient_app_spouse_occupation"><?php echo $patient_app_delete->spouse_occupation->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->WhatsApp->Visible) { // WhatsApp ?>
		<th class="<?php echo $patient_app_delete->WhatsApp->headerCellClass() ?>"><span id="elh_patient_app_WhatsApp" class="patient_app_WhatsApp"><?php echo $patient_app_delete->WhatsApp->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->CouppleID->Visible) { // CouppleID ?>
		<th class="<?php echo $patient_app_delete->CouppleID->headerCellClass() ?>"><span id="elh_patient_app_CouppleID" class="patient_app_CouppleID"><?php echo $patient_app_delete->CouppleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->MaleID->Visible) { // MaleID ?>
		<th class="<?php echo $patient_app_delete->MaleID->headerCellClass() ?>"><span id="elh_patient_app_MaleID" class="patient_app_MaleID"><?php echo $patient_app_delete->MaleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->FemaleID->Visible) { // FemaleID ?>
		<th class="<?php echo $patient_app_delete->FemaleID->headerCellClass() ?>"><span id="elh_patient_app_FemaleID" class="patient_app_FemaleID"><?php echo $patient_app_delete->FemaleID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->GroupID->Visible) { // GroupID ?>
		<th class="<?php echo $patient_app_delete->GroupID->headerCellClass() ?>"><span id="elh_patient_app_GroupID" class="patient_app_GroupID"><?php echo $patient_app_delete->GroupID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_app_delete->Relationship->Visible) { // Relationship ?>
		<th class="<?php echo $patient_app_delete->Relationship->headerCellClass() ?>"><span id="elh_patient_app_Relationship" class="patient_app_Relationship"><?php echo $patient_app_delete->Relationship->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_app_delete->RecordCount = 0;
$i = 0;
while (!$patient_app_delete->Recordset->EOF) {
	$patient_app_delete->RecordCount++;
	$patient_app_delete->RowCount++;

	// Set row properties
	$patient_app->resetAttributes();
	$patient_app->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_app_delete->loadRowValues($patient_app_delete->Recordset);

	// Render row
	$patient_app_delete->renderRow();
?>
	<tr <?php echo $patient_app->rowAttributes() ?>>
<?php if ($patient_app_delete->id->Visible) { // id ?>
		<td <?php echo $patient_app_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_id" class="patient_app_id">
<span<?php echo $patient_app_delete->id->viewAttributes() ?>><?php echo $patient_app_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $patient_app_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_PatientID" class="patient_app_PatientID">
<span<?php echo $patient_app_delete->PatientID->viewAttributes() ?>><?php echo $patient_app_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->title->Visible) { // title ?>
		<td <?php echo $patient_app_delete->title->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_title" class="patient_app_title">
<span<?php echo $patient_app_delete->title->viewAttributes() ?>><?php echo $patient_app_delete->title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->first_name->Visible) { // first_name ?>
		<td <?php echo $patient_app_delete->first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_first_name" class="patient_app_first_name">
<span<?php echo $patient_app_delete->first_name->viewAttributes() ?>><?php echo $patient_app_delete->first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->middle_name->Visible) { // middle_name ?>
		<td <?php echo $patient_app_delete->middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_middle_name" class="patient_app_middle_name">
<span<?php echo $patient_app_delete->middle_name->viewAttributes() ?>><?php echo $patient_app_delete->middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->last_name->Visible) { // last_name ?>
		<td <?php echo $patient_app_delete->last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_last_name" class="patient_app_last_name">
<span<?php echo $patient_app_delete->last_name->viewAttributes() ?>><?php echo $patient_app_delete->last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->gender->Visible) { // gender ?>
		<td <?php echo $patient_app_delete->gender->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_gender" class="patient_app_gender">
<span<?php echo $patient_app_delete->gender->viewAttributes() ?>><?php echo $patient_app_delete->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->dob->Visible) { // dob ?>
		<td <?php echo $patient_app_delete->dob->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_dob" class="patient_app_dob">
<span<?php echo $patient_app_delete->dob->viewAttributes() ?>><?php echo $patient_app_delete->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_app_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Age" class="patient_app_Age">
<span<?php echo $patient_app_delete->Age->viewAttributes() ?>><?php echo $patient_app_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->blood_group->Visible) { // blood_group ?>
		<td <?php echo $patient_app_delete->blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_blood_group" class="patient_app_blood_group">
<span<?php echo $patient_app_delete->blood_group->viewAttributes() ?>><?php echo $patient_app_delete->blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->mobile_no->Visible) { // mobile_no ?>
		<td <?php echo $patient_app_delete->mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_mobile_no" class="patient_app_mobile_no">
<span<?php echo $patient_app_delete->mobile_no->viewAttributes() ?>><?php echo $patient_app_delete->mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->IdentificationMark->Visible) { // IdentificationMark ?>
		<td <?php echo $patient_app_delete->IdentificationMark->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_IdentificationMark" class="patient_app_IdentificationMark">
<span<?php echo $patient_app_delete->IdentificationMark->viewAttributes() ?>><?php echo $patient_app_delete->IdentificationMark->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Religion->Visible) { // Religion ?>
		<td <?php echo $patient_app_delete->Religion->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Religion" class="patient_app_Religion">
<span<?php echo $patient_app_delete->Religion->viewAttributes() ?>><?php echo $patient_app_delete->Religion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Nationality->Visible) { // Nationality ?>
		<td <?php echo $patient_app_delete->Nationality->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Nationality" class="patient_app_Nationality">
<span<?php echo $patient_app_delete->Nationality->viewAttributes() ?>><?php echo $patient_app_delete->Nationality->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->profilePic->Visible) { // profilePic ?>
		<td <?php echo $patient_app_delete->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_profilePic" class="patient_app_profilePic">
<span<?php echo $patient_app_delete->profilePic->viewAttributes() ?>><?php echo $patient_app_delete->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->status->Visible) { // status ?>
		<td <?php echo $patient_app_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_status" class="patient_app_status">
<span<?php echo $patient_app_delete->status->viewAttributes() ?>><?php echo $patient_app_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $patient_app_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_createdby" class="patient_app_createdby">
<span<?php echo $patient_app_delete->createdby->viewAttributes() ?>><?php echo $patient_app_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $patient_app_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_createddatetime" class="patient_app_createddatetime">
<span<?php echo $patient_app_delete->createddatetime->viewAttributes() ?>><?php echo $patient_app_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $patient_app_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_modifiedby" class="patient_app_modifiedby">
<span<?php echo $patient_app_delete->modifiedby->viewAttributes() ?>><?php echo $patient_app_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $patient_app_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_modifieddatetime" class="patient_app_modifieddatetime">
<span<?php echo $patient_app_delete->modifieddatetime->viewAttributes() ?>><?php echo $patient_app_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->ReferedByDr->Visible) { // ReferedByDr ?>
		<td <?php echo $patient_app_delete->ReferedByDr->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_ReferedByDr" class="patient_app_ReferedByDr">
<span<?php echo $patient_app_delete->ReferedByDr->viewAttributes() ?>><?php echo $patient_app_delete->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->ReferClinicname->Visible) { // ReferClinicname ?>
		<td <?php echo $patient_app_delete->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_ReferClinicname" class="patient_app_ReferClinicname">
<span<?php echo $patient_app_delete->ReferClinicname->viewAttributes() ?>><?php echo $patient_app_delete->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->ReferCity->Visible) { // ReferCity ?>
		<td <?php echo $patient_app_delete->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_ReferCity" class="patient_app_ReferCity">
<span<?php echo $patient_app_delete->ReferCity->viewAttributes() ?>><?php echo $patient_app_delete->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td <?php echo $patient_app_delete->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_ReferMobileNo" class="patient_app_ReferMobileNo">
<span<?php echo $patient_app_delete->ReferMobileNo->viewAttributes() ?>><?php echo $patient_app_delete->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<td <?php echo $patient_app_delete->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_ReferA4TreatingConsultant" class="patient_app_ReferA4TreatingConsultant">
<span<?php echo $patient_app_delete->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $patient_app_delete->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
		<td <?php echo $patient_app_delete->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_PurposreReferredfor" class="patient_app_PurposreReferredfor">
<span<?php echo $patient_app_delete->PurposreReferredfor->viewAttributes() ?>><?php echo $patient_app_delete->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_title->Visible) { // spouse_title ?>
		<td <?php echo $patient_app_delete->spouse_title->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_title" class="patient_app_spouse_title">
<span<?php echo $patient_app_delete->spouse_title->viewAttributes() ?>><?php echo $patient_app_delete->spouse_title->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_first_name->Visible) { // spouse_first_name ?>
		<td <?php echo $patient_app_delete->spouse_first_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_first_name" class="patient_app_spouse_first_name">
<span<?php echo $patient_app_delete->spouse_first_name->viewAttributes() ?>><?php echo $patient_app_delete->spouse_first_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_middle_name->Visible) { // spouse_middle_name ?>
		<td <?php echo $patient_app_delete->spouse_middle_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_middle_name" class="patient_app_spouse_middle_name">
<span<?php echo $patient_app_delete->spouse_middle_name->viewAttributes() ?>><?php echo $patient_app_delete->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_last_name->Visible) { // spouse_last_name ?>
		<td <?php echo $patient_app_delete->spouse_last_name->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_last_name" class="patient_app_spouse_last_name">
<span<?php echo $patient_app_delete->spouse_last_name->viewAttributes() ?>><?php echo $patient_app_delete->spouse_last_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_gender->Visible) { // spouse_gender ?>
		<td <?php echo $patient_app_delete->spouse_gender->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_gender" class="patient_app_spouse_gender">
<span<?php echo $patient_app_delete->spouse_gender->viewAttributes() ?>><?php echo $patient_app_delete->spouse_gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_dob->Visible) { // spouse_dob ?>
		<td <?php echo $patient_app_delete->spouse_dob->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_dob" class="patient_app_spouse_dob">
<span<?php echo $patient_app_delete->spouse_dob->viewAttributes() ?>><?php echo $patient_app_delete->spouse_dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_Age->Visible) { // spouse_Age ?>
		<td <?php echo $patient_app_delete->spouse_Age->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_Age" class="patient_app_spouse_Age">
<span<?php echo $patient_app_delete->spouse_Age->viewAttributes() ?>><?php echo $patient_app_delete->spouse_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_blood_group->Visible) { // spouse_blood_group ?>
		<td <?php echo $patient_app_delete->spouse_blood_group->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_blood_group" class="patient_app_spouse_blood_group">
<span<?php echo $patient_app_delete->spouse_blood_group->viewAttributes() ?>><?php echo $patient_app_delete->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
		<td <?php echo $patient_app_delete->spouse_mobile_no->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_mobile_no" class="patient_app_spouse_mobile_no">
<span<?php echo $patient_app_delete->spouse_mobile_no->viewAttributes() ?>><?php echo $patient_app_delete->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Maritalstatus->Visible) { // Maritalstatus ?>
		<td <?php echo $patient_app_delete->Maritalstatus->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Maritalstatus" class="patient_app_Maritalstatus">
<span<?php echo $patient_app_delete->Maritalstatus->viewAttributes() ?>><?php echo $patient_app_delete->Maritalstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Business->Visible) { // Business ?>
		<td <?php echo $patient_app_delete->Business->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Business" class="patient_app_Business">
<span<?php echo $patient_app_delete->Business->viewAttributes() ?>><?php echo $patient_app_delete->Business->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Patient_Language->Visible) { // Patient_Language ?>
		<td <?php echo $patient_app_delete->Patient_Language->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Patient_Language" class="patient_app_Patient_Language">
<span<?php echo $patient_app_delete->Patient_Language->viewAttributes() ?>><?php echo $patient_app_delete->Patient_Language->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Passport->Visible) { // Passport ?>
		<td <?php echo $patient_app_delete->Passport->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Passport" class="patient_app_Passport">
<span<?php echo $patient_app_delete->Passport->viewAttributes() ?>><?php echo $patient_app_delete->Passport->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->VisaNo->Visible) { // VisaNo ?>
		<td <?php echo $patient_app_delete->VisaNo->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_VisaNo" class="patient_app_VisaNo">
<span<?php echo $patient_app_delete->VisaNo->viewAttributes() ?>><?php echo $patient_app_delete->VisaNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
		<td <?php echo $patient_app_delete->ValidityOfVisa->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_ValidityOfVisa" class="patient_app_ValidityOfVisa">
<span<?php echo $patient_app_delete->ValidityOfVisa->viewAttributes() ?>><?php echo $patient_app_delete->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td <?php echo $patient_app_delete->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_WhereDidYouHear" class="patient_app_WhereDidYouHear">
<span<?php echo $patient_app_delete->WhereDidYouHear->viewAttributes() ?>><?php echo $patient_app_delete->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_app_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_HospID" class="patient_app_HospID">
<span<?php echo $patient_app_delete->HospID->viewAttributes() ?>><?php echo $patient_app_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->street->Visible) { // street ?>
		<td <?php echo $patient_app_delete->street->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_street" class="patient_app_street">
<span<?php echo $patient_app_delete->street->viewAttributes() ?>><?php echo $patient_app_delete->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->town->Visible) { // town ?>
		<td <?php echo $patient_app_delete->town->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_town" class="patient_app_town">
<span<?php echo $patient_app_delete->town->viewAttributes() ?>><?php echo $patient_app_delete->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->province->Visible) { // province ?>
		<td <?php echo $patient_app_delete->province->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_province" class="patient_app_province">
<span<?php echo $patient_app_delete->province->viewAttributes() ?>><?php echo $patient_app_delete->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->country->Visible) { // country ?>
		<td <?php echo $patient_app_delete->country->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_country" class="patient_app_country">
<span<?php echo $patient_app_delete->country->viewAttributes() ?>><?php echo $patient_app_delete->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->postal_code->Visible) { // postal_code ?>
		<td <?php echo $patient_app_delete->postal_code->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_postal_code" class="patient_app_postal_code">
<span<?php echo $patient_app_delete->postal_code->viewAttributes() ?>><?php echo $patient_app_delete->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->PEmail->Visible) { // PEmail ?>
		<td <?php echo $patient_app_delete->PEmail->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_PEmail" class="patient_app_PEmail">
<span<?php echo $patient_app_delete->PEmail->viewAttributes() ?>><?php echo $patient_app_delete->PEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->PEmergencyContact->Visible) { // PEmergencyContact ?>
		<td <?php echo $patient_app_delete->PEmergencyContact->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_PEmergencyContact" class="patient_app_PEmergencyContact">
<span<?php echo $patient_app_delete->PEmergencyContact->viewAttributes() ?>><?php echo $patient_app_delete->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->occupation->Visible) { // occupation ?>
		<td <?php echo $patient_app_delete->occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_occupation" class="patient_app_occupation">
<span<?php echo $patient_app_delete->occupation->viewAttributes() ?>><?php echo $patient_app_delete->occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->spouse_occupation->Visible) { // spouse_occupation ?>
		<td <?php echo $patient_app_delete->spouse_occupation->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_spouse_occupation" class="patient_app_spouse_occupation">
<span<?php echo $patient_app_delete->spouse_occupation->viewAttributes() ?>><?php echo $patient_app_delete->spouse_occupation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->WhatsApp->Visible) { // WhatsApp ?>
		<td <?php echo $patient_app_delete->WhatsApp->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_WhatsApp" class="patient_app_WhatsApp">
<span<?php echo $patient_app_delete->WhatsApp->viewAttributes() ?>><?php echo $patient_app_delete->WhatsApp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->CouppleID->Visible) { // CouppleID ?>
		<td <?php echo $patient_app_delete->CouppleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_CouppleID" class="patient_app_CouppleID">
<span<?php echo $patient_app_delete->CouppleID->viewAttributes() ?>><?php echo $patient_app_delete->CouppleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->MaleID->Visible) { // MaleID ?>
		<td <?php echo $patient_app_delete->MaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_MaleID" class="patient_app_MaleID">
<span<?php echo $patient_app_delete->MaleID->viewAttributes() ?>><?php echo $patient_app_delete->MaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->FemaleID->Visible) { // FemaleID ?>
		<td <?php echo $patient_app_delete->FemaleID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_FemaleID" class="patient_app_FemaleID">
<span<?php echo $patient_app_delete->FemaleID->viewAttributes() ?>><?php echo $patient_app_delete->FemaleID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->GroupID->Visible) { // GroupID ?>
		<td <?php echo $patient_app_delete->GroupID->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_GroupID" class="patient_app_GroupID">
<span<?php echo $patient_app_delete->GroupID->viewAttributes() ?>><?php echo $patient_app_delete->GroupID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_app_delete->Relationship->Visible) { // Relationship ?>
		<td <?php echo $patient_app_delete->Relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_app_delete->RowCount ?>_patient_app_Relationship" class="patient_app_Relationship">
<span<?php echo $patient_app_delete->Relationship->viewAttributes() ?>><?php echo $patient_app_delete->Relationship->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_app_delete->terminate();
?>