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
$patient_app_view = new patient_app_view();

// Run the page
$patient_app_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_app_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_app->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_appview = currentForm = new ew.Form("fpatient_appview", "view");

// Form_CustomValidate event
fpatient_appview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_appview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_app->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_app_view->ExportOptions->render("body") ?>
<?php $patient_app_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_app_view->showPageHeader(); ?>
<?php
$patient_app_view->showMessage();
?>
<form name="fpatient_appview" id="fpatient_appview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_app_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_app_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="modal" value="<?php echo (int)$patient_app_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_app->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_id"><?php echo $patient_app->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_app->id->cellAttributes() ?>>
<span id="el_patient_app_id">
<span<?php echo $patient_app->id->viewAttributes() ?>>
<?php echo $patient_app->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PatientID"><?php echo $patient_app->PatientID->caption() ?></span></td>
		<td data-name="PatientID"<?php echo $patient_app->PatientID->cellAttributes() ?>>
<span id="el_patient_app_PatientID">
<span<?php echo $patient_app->PatientID->viewAttributes() ?>>
<?php echo $patient_app->PatientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->title->Visible) { // title ?>
	<tr id="r_title">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_title"><?php echo $patient_app->title->caption() ?></span></td>
		<td data-name="title"<?php echo $patient_app->title->cellAttributes() ?>>
<span id="el_patient_app_title">
<span<?php echo $patient_app->title->viewAttributes() ?>>
<?php echo $patient_app->title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_first_name"><?php echo $patient_app->first_name->caption() ?></span></td>
		<td data-name="first_name"<?php echo $patient_app->first_name->cellAttributes() ?>>
<span id="el_patient_app_first_name">
<span<?php echo $patient_app->first_name->viewAttributes() ?>>
<?php echo $patient_app->first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->middle_name->Visible) { // middle_name ?>
	<tr id="r_middle_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_middle_name"><?php echo $patient_app->middle_name->caption() ?></span></td>
		<td data-name="middle_name"<?php echo $patient_app->middle_name->cellAttributes() ?>>
<span id="el_patient_app_middle_name">
<span<?php echo $patient_app->middle_name->viewAttributes() ?>>
<?php echo $patient_app->middle_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_last_name"><?php echo $patient_app->last_name->caption() ?></span></td>
		<td data-name="last_name"<?php echo $patient_app->last_name->cellAttributes() ?>>
<span id="el_patient_app_last_name">
<span<?php echo $patient_app->last_name->viewAttributes() ?>>
<?php echo $patient_app->last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_gender"><?php echo $patient_app->gender->caption() ?></span></td>
		<td data-name="gender"<?php echo $patient_app->gender->cellAttributes() ?>>
<span id="el_patient_app_gender">
<span<?php echo $patient_app->gender->viewAttributes() ?>>
<?php echo $patient_app->gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->dob->Visible) { // dob ?>
	<tr id="r_dob">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_dob"><?php echo $patient_app->dob->caption() ?></span></td>
		<td data-name="dob"<?php echo $patient_app->dob->cellAttributes() ?>>
<span id="el_patient_app_dob">
<span<?php echo $patient_app->dob->viewAttributes() ?>>
<?php echo $patient_app->dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Age"><?php echo $patient_app->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $patient_app->Age->cellAttributes() ?>>
<span id="el_patient_app_Age">
<span<?php echo $patient_app->Age->viewAttributes() ?>>
<?php echo $patient_app->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->blood_group->Visible) { // blood_group ?>
	<tr id="r_blood_group">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_blood_group"><?php echo $patient_app->blood_group->caption() ?></span></td>
		<td data-name="blood_group"<?php echo $patient_app->blood_group->cellAttributes() ?>>
<span id="el_patient_app_blood_group">
<span<?php echo $patient_app->blood_group->viewAttributes() ?>>
<?php echo $patient_app->blood_group->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->mobile_no->Visible) { // mobile_no ?>
	<tr id="r_mobile_no">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_mobile_no"><?php echo $patient_app->mobile_no->caption() ?></span></td>
		<td data-name="mobile_no"<?php echo $patient_app->mobile_no->cellAttributes() ?>>
<span id="el_patient_app_mobile_no">
<span<?php echo $patient_app->mobile_no->viewAttributes() ?>>
<?php echo $patient_app->mobile_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_description"><?php echo $patient_app->description->caption() ?></span></td>
		<td data-name="description"<?php echo $patient_app->description->cellAttributes() ?>>
<span id="el_patient_app_description">
<span<?php echo $patient_app->description->viewAttributes() ?>>
<?php echo $patient_app->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_IdentificationMark"><?php echo $patient_app->IdentificationMark->caption() ?></span></td>
		<td data-name="IdentificationMark"<?php echo $patient_app->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_app_IdentificationMark">
<span<?php echo $patient_app->IdentificationMark->viewAttributes() ?>>
<?php echo $patient_app->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Religion->Visible) { // Religion ?>
	<tr id="r_Religion">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Religion"><?php echo $patient_app->Religion->caption() ?></span></td>
		<td data-name="Religion"<?php echo $patient_app->Religion->cellAttributes() ?>>
<span id="el_patient_app_Religion">
<span<?php echo $patient_app->Religion->viewAttributes() ?>>
<?php echo $patient_app->Religion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Nationality->Visible) { // Nationality ?>
	<tr id="r_Nationality">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Nationality"><?php echo $patient_app->Nationality->caption() ?></span></td>
		<td data-name="Nationality"<?php echo $patient_app->Nationality->cellAttributes() ?>>
<span id="el_patient_app_Nationality">
<span<?php echo $patient_app->Nationality->viewAttributes() ?>>
<?php echo $patient_app->Nationality->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_profilePic"><?php echo $patient_app->profilePic->caption() ?></span></td>
		<td data-name="profilePic"<?php echo $patient_app->profilePic->cellAttributes() ?>>
<span id="el_patient_app_profilePic">
<span<?php echo $patient_app->profilePic->viewAttributes() ?>>
<?php echo $patient_app->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_status"><?php echo $patient_app->status->caption() ?></span></td>
		<td data-name="status"<?php echo $patient_app->status->cellAttributes() ?>>
<span id="el_patient_app_status">
<span<?php echo $patient_app->status->viewAttributes() ?>>
<?php echo $patient_app->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_createdby"><?php echo $patient_app->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $patient_app->createdby->cellAttributes() ?>>
<span id="el_patient_app_createdby">
<span<?php echo $patient_app->createdby->viewAttributes() ?>>
<?php echo $patient_app->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_createddatetime"><?php echo $patient_app->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $patient_app->createddatetime->cellAttributes() ?>>
<span id="el_patient_app_createddatetime">
<span<?php echo $patient_app->createddatetime->viewAttributes() ?>>
<?php echo $patient_app->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_modifiedby"><?php echo $patient_app->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $patient_app->modifiedby->cellAttributes() ?>>
<span id="el_patient_app_modifiedby">
<span<?php echo $patient_app->modifiedby->viewAttributes() ?>>
<?php echo $patient_app->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_modifieddatetime"><?php echo $patient_app->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_app->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_app_modifieddatetime">
<span<?php echo $patient_app->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_app->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferedByDr"><?php echo $patient_app->ReferedByDr->caption() ?></span></td>
		<td data-name="ReferedByDr"<?php echo $patient_app->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_app_ReferedByDr">
<span<?php echo $patient_app->ReferedByDr->viewAttributes() ?>>
<?php echo $patient_app->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferClinicname"><?php echo $patient_app->ReferClinicname->caption() ?></span></td>
		<td data-name="ReferClinicname"<?php echo $patient_app->ReferClinicname->cellAttributes() ?>>
<span id="el_patient_app_ReferClinicname">
<span<?php echo $patient_app->ReferClinicname->viewAttributes() ?>>
<?php echo $patient_app->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferCity"><?php echo $patient_app->ReferCity->caption() ?></span></td>
		<td data-name="ReferCity"<?php echo $patient_app->ReferCity->cellAttributes() ?>>
<span id="el_patient_app_ReferCity">
<span<?php echo $patient_app->ReferCity->viewAttributes() ?>>
<?php echo $patient_app->ReferCity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferMobileNo"><?php echo $patient_app->ReferMobileNo->caption() ?></span></td>
		<td data-name="ReferMobileNo"<?php echo $patient_app->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_app_ReferMobileNo">
<span<?php echo $patient_app->ReferMobileNo->viewAttributes() ?>>
<?php echo $patient_app->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferA4TreatingConsultant"><?php echo $patient_app->ReferA4TreatingConsultant->caption() ?></span></td>
		<td data-name="ReferA4TreatingConsultant"<?php echo $patient_app->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_app_ReferA4TreatingConsultant">
<span<?php echo $patient_app->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $patient_app->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PurposreReferredfor"><?php echo $patient_app->PurposreReferredfor->caption() ?></span></td>
		<td data-name="PurposreReferredfor"<?php echo $patient_app->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_app_PurposreReferredfor">
<span<?php echo $patient_app->PurposreReferredfor->viewAttributes() ?>>
<?php echo $patient_app->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_title->Visible) { // spouse_title ?>
	<tr id="r_spouse_title">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_title"><?php echo $patient_app->spouse_title->caption() ?></span></td>
		<td data-name="spouse_title"<?php echo $patient_app->spouse_title->cellAttributes() ?>>
<span id="el_patient_app_spouse_title">
<span<?php echo $patient_app->spouse_title->viewAttributes() ?>>
<?php echo $patient_app->spouse_title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_first_name->Visible) { // spouse_first_name ?>
	<tr id="r_spouse_first_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_first_name"><?php echo $patient_app->spouse_first_name->caption() ?></span></td>
		<td data-name="spouse_first_name"<?php echo $patient_app->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_first_name">
<span<?php echo $patient_app->spouse_first_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<tr id="r_spouse_middle_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_middle_name"><?php echo $patient_app->spouse_middle_name->caption() ?></span></td>
		<td data-name="spouse_middle_name"<?php echo $patient_app->spouse_middle_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_middle_name">
<span<?php echo $patient_app->spouse_middle_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_last_name->Visible) { // spouse_last_name ?>
	<tr id="r_spouse_last_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_last_name"><?php echo $patient_app->spouse_last_name->caption() ?></span></td>
		<td data-name="spouse_last_name"<?php echo $patient_app->spouse_last_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_last_name">
<span<?php echo $patient_app->spouse_last_name->viewAttributes() ?>>
<?php echo $patient_app->spouse_last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_gender->Visible) { // spouse_gender ?>
	<tr id="r_spouse_gender">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_gender"><?php echo $patient_app->spouse_gender->caption() ?></span></td>
		<td data-name="spouse_gender"<?php echo $patient_app->spouse_gender->cellAttributes() ?>>
<span id="el_patient_app_spouse_gender">
<span<?php echo $patient_app->spouse_gender->viewAttributes() ?>>
<?php echo $patient_app->spouse_gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_dob->Visible) { // spouse_dob ?>
	<tr id="r_spouse_dob">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_dob"><?php echo $patient_app->spouse_dob->caption() ?></span></td>
		<td data-name="spouse_dob"<?php echo $patient_app->spouse_dob->cellAttributes() ?>>
<span id="el_patient_app_spouse_dob">
<span<?php echo $patient_app->spouse_dob->viewAttributes() ?>>
<?php echo $patient_app->spouse_dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_Age->Visible) { // spouse_Age ?>
	<tr id="r_spouse_Age">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_Age"><?php echo $patient_app->spouse_Age->caption() ?></span></td>
		<td data-name="spouse_Age"<?php echo $patient_app->spouse_Age->cellAttributes() ?>>
<span id="el_patient_app_spouse_Age">
<span<?php echo $patient_app->spouse_Age->viewAttributes() ?>>
<?php echo $patient_app->spouse_Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<tr id="r_spouse_blood_group">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_blood_group"><?php echo $patient_app->spouse_blood_group->caption() ?></span></td>
		<td data-name="spouse_blood_group"<?php echo $patient_app->spouse_blood_group->cellAttributes() ?>>
<span id="el_patient_app_spouse_blood_group">
<span<?php echo $patient_app->spouse_blood_group->viewAttributes() ?>>
<?php echo $patient_app->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<tr id="r_spouse_mobile_no">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_mobile_no"><?php echo $patient_app->spouse_mobile_no->caption() ?></span></td>
		<td data-name="spouse_mobile_no"<?php echo $patient_app->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_app_spouse_mobile_no">
<span<?php echo $patient_app->spouse_mobile_no->viewAttributes() ?>>
<?php echo $patient_app->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Maritalstatus->Visible) { // Maritalstatus ?>
	<tr id="r_Maritalstatus">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Maritalstatus"><?php echo $patient_app->Maritalstatus->caption() ?></span></td>
		<td data-name="Maritalstatus"<?php echo $patient_app->Maritalstatus->cellAttributes() ?>>
<span id="el_patient_app_Maritalstatus">
<span<?php echo $patient_app->Maritalstatus->viewAttributes() ?>>
<?php echo $patient_app->Maritalstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Business->Visible) { // Business ?>
	<tr id="r_Business">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Business"><?php echo $patient_app->Business->caption() ?></span></td>
		<td data-name="Business"<?php echo $patient_app->Business->cellAttributes() ?>>
<span id="el_patient_app_Business">
<span<?php echo $patient_app->Business->viewAttributes() ?>>
<?php echo $patient_app->Business->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Patient_Language->Visible) { // Patient_Language ?>
	<tr id="r_Patient_Language">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Patient_Language"><?php echo $patient_app->Patient_Language->caption() ?></span></td>
		<td data-name="Patient_Language"<?php echo $patient_app->Patient_Language->cellAttributes() ?>>
<span id="el_patient_app_Patient_Language">
<span<?php echo $patient_app->Patient_Language->viewAttributes() ?>>
<?php echo $patient_app->Patient_Language->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Passport->Visible) { // Passport ?>
	<tr id="r_Passport">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Passport"><?php echo $patient_app->Passport->caption() ?></span></td>
		<td data-name="Passport"<?php echo $patient_app->Passport->cellAttributes() ?>>
<span id="el_patient_app_Passport">
<span<?php echo $patient_app->Passport->viewAttributes() ?>>
<?php echo $patient_app->Passport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->VisaNo->Visible) { // VisaNo ?>
	<tr id="r_VisaNo">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_VisaNo"><?php echo $patient_app->VisaNo->caption() ?></span></td>
		<td data-name="VisaNo"<?php echo $patient_app->VisaNo->cellAttributes() ?>>
<span id="el_patient_app_VisaNo">
<span<?php echo $patient_app->VisaNo->viewAttributes() ?>>
<?php echo $patient_app->VisaNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<tr id="r_ValidityOfVisa">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ValidityOfVisa"><?php echo $patient_app->ValidityOfVisa->caption() ?></span></td>
		<td data-name="ValidityOfVisa"<?php echo $patient_app->ValidityOfVisa->cellAttributes() ?>>
<span id="el_patient_app_ValidityOfVisa">
<span<?php echo $patient_app->ValidityOfVisa->viewAttributes() ?>>
<?php echo $patient_app->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<tr id="r_WhereDidYouHear">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_WhereDidYouHear"><?php echo $patient_app->WhereDidYouHear->caption() ?></span></td>
		<td data-name="WhereDidYouHear"<?php echo $patient_app->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_app_WhereDidYouHear">
<span<?php echo $patient_app->WhereDidYouHear->viewAttributes() ?>>
<?php echo $patient_app->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_HospID"><?php echo $patient_app->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $patient_app->HospID->cellAttributes() ?>>
<span id="el_patient_app_HospID">
<span<?php echo $patient_app->HospID->viewAttributes() ?>>
<?php echo $patient_app->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_street"><?php echo $patient_app->street->caption() ?></span></td>
		<td data-name="street"<?php echo $patient_app->street->cellAttributes() ?>>
<span id="el_patient_app_street">
<span<?php echo $patient_app->street->viewAttributes() ?>>
<?php echo $patient_app->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_town"><?php echo $patient_app->town->caption() ?></span></td>
		<td data-name="town"<?php echo $patient_app->town->cellAttributes() ?>>
<span id="el_patient_app_town">
<span<?php echo $patient_app->town->viewAttributes() ?>>
<?php echo $patient_app->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_province"><?php echo $patient_app->province->caption() ?></span></td>
		<td data-name="province"<?php echo $patient_app->province->cellAttributes() ?>>
<span id="el_patient_app_province">
<span<?php echo $patient_app->province->viewAttributes() ?>>
<?php echo $patient_app->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_country"><?php echo $patient_app->country->caption() ?></span></td>
		<td data-name="country"<?php echo $patient_app->country->cellAttributes() ?>>
<span id="el_patient_app_country">
<span<?php echo $patient_app->country->viewAttributes() ?>>
<?php echo $patient_app->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_postal_code"><?php echo $patient_app->postal_code->caption() ?></span></td>
		<td data-name="postal_code"<?php echo $patient_app->postal_code->cellAttributes() ?>>
<span id="el_patient_app_postal_code">
<span<?php echo $patient_app->postal_code->viewAttributes() ?>>
<?php echo $patient_app->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->PEmail->Visible) { // PEmail ?>
	<tr id="r_PEmail">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PEmail"><?php echo $patient_app->PEmail->caption() ?></span></td>
		<td data-name="PEmail"<?php echo $patient_app->PEmail->cellAttributes() ?>>
<span id="el_patient_app_PEmail">
<span<?php echo $patient_app->PEmail->viewAttributes() ?>>
<?php echo $patient_app->PEmail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<tr id="r_PEmergencyContact">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PEmergencyContact"><?php echo $patient_app->PEmergencyContact->caption() ?></span></td>
		<td data-name="PEmergencyContact"<?php echo $patient_app->PEmergencyContact->cellAttributes() ?>>
<span id="el_patient_app_PEmergencyContact">
<span<?php echo $patient_app->PEmergencyContact->viewAttributes() ?>>
<?php echo $patient_app->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->occupation->Visible) { // occupation ?>
	<tr id="r_occupation">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_occupation"><?php echo $patient_app->occupation->caption() ?></span></td>
		<td data-name="occupation"<?php echo $patient_app->occupation->cellAttributes() ?>>
<span id="el_patient_app_occupation">
<span<?php echo $patient_app->occupation->viewAttributes() ?>>
<?php echo $patient_app->occupation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->spouse_occupation->Visible) { // spouse_occupation ?>
	<tr id="r_spouse_occupation">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_occupation"><?php echo $patient_app->spouse_occupation->caption() ?></span></td>
		<td data-name="spouse_occupation"<?php echo $patient_app->spouse_occupation->cellAttributes() ?>>
<span id="el_patient_app_spouse_occupation">
<span<?php echo $patient_app->spouse_occupation->viewAttributes() ?>>
<?php echo $patient_app->spouse_occupation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->WhatsApp->Visible) { // WhatsApp ?>
	<tr id="r_WhatsApp">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_WhatsApp"><?php echo $patient_app->WhatsApp->caption() ?></span></td>
		<td data-name="WhatsApp"<?php echo $patient_app->WhatsApp->cellAttributes() ?>>
<span id="el_patient_app_WhatsApp">
<span<?php echo $patient_app->WhatsApp->viewAttributes() ?>>
<?php echo $patient_app->WhatsApp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->CouppleID->Visible) { // CouppleID ?>
	<tr id="r_CouppleID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_CouppleID"><?php echo $patient_app->CouppleID->caption() ?></span></td>
		<td data-name="CouppleID"<?php echo $patient_app->CouppleID->cellAttributes() ?>>
<span id="el_patient_app_CouppleID">
<span<?php echo $patient_app->CouppleID->viewAttributes() ?>>
<?php echo $patient_app->CouppleID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->MaleID->Visible) { // MaleID ?>
	<tr id="r_MaleID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_MaleID"><?php echo $patient_app->MaleID->caption() ?></span></td>
		<td data-name="MaleID"<?php echo $patient_app->MaleID->cellAttributes() ?>>
<span id="el_patient_app_MaleID">
<span<?php echo $patient_app->MaleID->viewAttributes() ?>>
<?php echo $patient_app->MaleID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->FemaleID->Visible) { // FemaleID ?>
	<tr id="r_FemaleID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_FemaleID"><?php echo $patient_app->FemaleID->caption() ?></span></td>
		<td data-name="FemaleID"<?php echo $patient_app->FemaleID->cellAttributes() ?>>
<span id="el_patient_app_FemaleID">
<span<?php echo $patient_app->FemaleID->viewAttributes() ?>>
<?php echo $patient_app->FemaleID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->GroupID->Visible) { // GroupID ?>
	<tr id="r_GroupID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_GroupID"><?php echo $patient_app->GroupID->caption() ?></span></td>
		<td data-name="GroupID"<?php echo $patient_app->GroupID->cellAttributes() ?>>
<span id="el_patient_app_GroupID">
<span<?php echo $patient_app->GroupID->viewAttributes() ?>>
<?php echo $patient_app->GroupID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app->Relationship->Visible) { // Relationship ?>
	<tr id="r_Relationship">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Relationship"><?php echo $patient_app->Relationship->caption() ?></span></td>
		<td data-name="Relationship"<?php echo $patient_app->Relationship->cellAttributes() ?>>
<span id="el_patient_app_Relationship">
<span<?php echo $patient_app->Relationship->viewAttributes() ?>>
<?php echo $patient_app->Relationship->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_app_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_app->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_app_view->terminate();
?>