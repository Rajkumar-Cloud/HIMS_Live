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
<?php include_once "header.php"; ?>
<?php if (!$patient_app_view->isExport()) { ?>
<script>
var fpatient_appview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_appview = currentForm = new ew.Form("fpatient_appview", "view");
	loadjs.done("fpatient_appview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_app_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_app">
<input type="hidden" name="modal" value="<?php echo (int)$patient_app_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_app_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_id"><?php echo $patient_app_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $patient_app_view->id->cellAttributes() ?>>
<span id="el_patient_app_id">
<span<?php echo $patient_app_view->id->viewAttributes() ?>><?php echo $patient_app_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PatientID"><?php echo $patient_app_view->PatientID->caption() ?></span></td>
		<td data-name="PatientID" <?php echo $patient_app_view->PatientID->cellAttributes() ?>>
<span id="el_patient_app_PatientID">
<span<?php echo $patient_app_view->PatientID->viewAttributes() ?>><?php echo $patient_app_view->PatientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->title->Visible) { // title ?>
	<tr id="r_title">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_title"><?php echo $patient_app_view->title->caption() ?></span></td>
		<td data-name="title" <?php echo $patient_app_view->title->cellAttributes() ?>>
<span id="el_patient_app_title">
<span<?php echo $patient_app_view->title->viewAttributes() ?>><?php echo $patient_app_view->title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_first_name"><?php echo $patient_app_view->first_name->caption() ?></span></td>
		<td data-name="first_name" <?php echo $patient_app_view->first_name->cellAttributes() ?>>
<span id="el_patient_app_first_name">
<span<?php echo $patient_app_view->first_name->viewAttributes() ?>><?php echo $patient_app_view->first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->middle_name->Visible) { // middle_name ?>
	<tr id="r_middle_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_middle_name"><?php echo $patient_app_view->middle_name->caption() ?></span></td>
		<td data-name="middle_name" <?php echo $patient_app_view->middle_name->cellAttributes() ?>>
<span id="el_patient_app_middle_name">
<span<?php echo $patient_app_view->middle_name->viewAttributes() ?>><?php echo $patient_app_view->middle_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_last_name"><?php echo $patient_app_view->last_name->caption() ?></span></td>
		<td data-name="last_name" <?php echo $patient_app_view->last_name->cellAttributes() ?>>
<span id="el_patient_app_last_name">
<span<?php echo $patient_app_view->last_name->viewAttributes() ?>><?php echo $patient_app_view->last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_gender"><?php echo $patient_app_view->gender->caption() ?></span></td>
		<td data-name="gender" <?php echo $patient_app_view->gender->cellAttributes() ?>>
<span id="el_patient_app_gender">
<span<?php echo $patient_app_view->gender->viewAttributes() ?>><?php echo $patient_app_view->gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->dob->Visible) { // dob ?>
	<tr id="r_dob">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_dob"><?php echo $patient_app_view->dob->caption() ?></span></td>
		<td data-name="dob" <?php echo $patient_app_view->dob->cellAttributes() ?>>
<span id="el_patient_app_dob">
<span<?php echo $patient_app_view->dob->viewAttributes() ?>><?php echo $patient_app_view->dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Age"><?php echo $patient_app_view->Age->caption() ?></span></td>
		<td data-name="Age" <?php echo $patient_app_view->Age->cellAttributes() ?>>
<span id="el_patient_app_Age">
<span<?php echo $patient_app_view->Age->viewAttributes() ?>><?php echo $patient_app_view->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->blood_group->Visible) { // blood_group ?>
	<tr id="r_blood_group">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_blood_group"><?php echo $patient_app_view->blood_group->caption() ?></span></td>
		<td data-name="blood_group" <?php echo $patient_app_view->blood_group->cellAttributes() ?>>
<span id="el_patient_app_blood_group">
<span<?php echo $patient_app_view->blood_group->viewAttributes() ?>><?php echo $patient_app_view->blood_group->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->mobile_no->Visible) { // mobile_no ?>
	<tr id="r_mobile_no">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_mobile_no"><?php echo $patient_app_view->mobile_no->caption() ?></span></td>
		<td data-name="mobile_no" <?php echo $patient_app_view->mobile_no->cellAttributes() ?>>
<span id="el_patient_app_mobile_no">
<span<?php echo $patient_app_view->mobile_no->viewAttributes() ?>><?php echo $patient_app_view->mobile_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_description"><?php echo $patient_app_view->description->caption() ?></span></td>
		<td data-name="description" <?php echo $patient_app_view->description->cellAttributes() ?>>
<span id="el_patient_app_description">
<span<?php echo $patient_app_view->description->viewAttributes() ?>><?php echo $patient_app_view->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_IdentificationMark"><?php echo $patient_app_view->IdentificationMark->caption() ?></span></td>
		<td data-name="IdentificationMark" <?php echo $patient_app_view->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_app_IdentificationMark">
<span<?php echo $patient_app_view->IdentificationMark->viewAttributes() ?>><?php echo $patient_app_view->IdentificationMark->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Religion->Visible) { // Religion ?>
	<tr id="r_Religion">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Religion"><?php echo $patient_app_view->Religion->caption() ?></span></td>
		<td data-name="Religion" <?php echo $patient_app_view->Religion->cellAttributes() ?>>
<span id="el_patient_app_Religion">
<span<?php echo $patient_app_view->Religion->viewAttributes() ?>><?php echo $patient_app_view->Religion->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Nationality->Visible) { // Nationality ?>
	<tr id="r_Nationality">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Nationality"><?php echo $patient_app_view->Nationality->caption() ?></span></td>
		<td data-name="Nationality" <?php echo $patient_app_view->Nationality->cellAttributes() ?>>
<span id="el_patient_app_Nationality">
<span<?php echo $patient_app_view->Nationality->viewAttributes() ?>><?php echo $patient_app_view->Nationality->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_profilePic"><?php echo $patient_app_view->profilePic->caption() ?></span></td>
		<td data-name="profilePic" <?php echo $patient_app_view->profilePic->cellAttributes() ?>>
<span id="el_patient_app_profilePic">
<span<?php echo $patient_app_view->profilePic->viewAttributes() ?>><?php echo $patient_app_view->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_status"><?php echo $patient_app_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $patient_app_view->status->cellAttributes() ?>>
<span id="el_patient_app_status">
<span<?php echo $patient_app_view->status->viewAttributes() ?>><?php echo $patient_app_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_createdby"><?php echo $patient_app_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $patient_app_view->createdby->cellAttributes() ?>>
<span id="el_patient_app_createdby">
<span<?php echo $patient_app_view->createdby->viewAttributes() ?>><?php echo $patient_app_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_createddatetime"><?php echo $patient_app_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $patient_app_view->createddatetime->cellAttributes() ?>>
<span id="el_patient_app_createddatetime">
<span<?php echo $patient_app_view->createddatetime->viewAttributes() ?>><?php echo $patient_app_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_modifiedby"><?php echo $patient_app_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $patient_app_view->modifiedby->cellAttributes() ?>>
<span id="el_patient_app_modifiedby">
<span<?php echo $patient_app_view->modifiedby->viewAttributes() ?>><?php echo $patient_app_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_modifieddatetime"><?php echo $patient_app_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_app_view->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_app_modifieddatetime">
<span<?php echo $patient_app_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_app_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferedByDr"><?php echo $patient_app_view->ReferedByDr->caption() ?></span></td>
		<td data-name="ReferedByDr" <?php echo $patient_app_view->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_app_ReferedByDr">
<span<?php echo $patient_app_view->ReferedByDr->viewAttributes() ?>><?php echo $patient_app_view->ReferedByDr->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferClinicname"><?php echo $patient_app_view->ReferClinicname->caption() ?></span></td>
		<td data-name="ReferClinicname" <?php echo $patient_app_view->ReferClinicname->cellAttributes() ?>>
<span id="el_patient_app_ReferClinicname">
<span<?php echo $patient_app_view->ReferClinicname->viewAttributes() ?>><?php echo $patient_app_view->ReferClinicname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferCity"><?php echo $patient_app_view->ReferCity->caption() ?></span></td>
		<td data-name="ReferCity" <?php echo $patient_app_view->ReferCity->cellAttributes() ?>>
<span id="el_patient_app_ReferCity">
<span<?php echo $patient_app_view->ReferCity->viewAttributes() ?>><?php echo $patient_app_view->ReferCity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferMobileNo"><?php echo $patient_app_view->ReferMobileNo->caption() ?></span></td>
		<td data-name="ReferMobileNo" <?php echo $patient_app_view->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_app_ReferMobileNo">
<span<?php echo $patient_app_view->ReferMobileNo->viewAttributes() ?>><?php echo $patient_app_view->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ReferA4TreatingConsultant"><?php echo $patient_app_view->ReferA4TreatingConsultant->caption() ?></span></td>
		<td data-name="ReferA4TreatingConsultant" <?php echo $patient_app_view->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_app_ReferA4TreatingConsultant">
<span<?php echo $patient_app_view->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $patient_app_view->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PurposreReferredfor"><?php echo $patient_app_view->PurposreReferredfor->caption() ?></span></td>
		<td data-name="PurposreReferredfor" <?php echo $patient_app_view->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_app_PurposreReferredfor">
<span<?php echo $patient_app_view->PurposreReferredfor->viewAttributes() ?>><?php echo $patient_app_view->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_title->Visible) { // spouse_title ?>
	<tr id="r_spouse_title">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_title"><?php echo $patient_app_view->spouse_title->caption() ?></span></td>
		<td data-name="spouse_title" <?php echo $patient_app_view->spouse_title->cellAttributes() ?>>
<span id="el_patient_app_spouse_title">
<span<?php echo $patient_app_view->spouse_title->viewAttributes() ?>><?php echo $patient_app_view->spouse_title->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_first_name->Visible) { // spouse_first_name ?>
	<tr id="r_spouse_first_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_first_name"><?php echo $patient_app_view->spouse_first_name->caption() ?></span></td>
		<td data-name="spouse_first_name" <?php echo $patient_app_view->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_first_name">
<span<?php echo $patient_app_view->spouse_first_name->viewAttributes() ?>><?php echo $patient_app_view->spouse_first_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<tr id="r_spouse_middle_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_middle_name"><?php echo $patient_app_view->spouse_middle_name->caption() ?></span></td>
		<td data-name="spouse_middle_name" <?php echo $patient_app_view->spouse_middle_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_middle_name">
<span<?php echo $patient_app_view->spouse_middle_name->viewAttributes() ?>><?php echo $patient_app_view->spouse_middle_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_last_name->Visible) { // spouse_last_name ?>
	<tr id="r_spouse_last_name">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_last_name"><?php echo $patient_app_view->spouse_last_name->caption() ?></span></td>
		<td data-name="spouse_last_name" <?php echo $patient_app_view->spouse_last_name->cellAttributes() ?>>
<span id="el_patient_app_spouse_last_name">
<span<?php echo $patient_app_view->spouse_last_name->viewAttributes() ?>><?php echo $patient_app_view->spouse_last_name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_gender->Visible) { // spouse_gender ?>
	<tr id="r_spouse_gender">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_gender"><?php echo $patient_app_view->spouse_gender->caption() ?></span></td>
		<td data-name="spouse_gender" <?php echo $patient_app_view->spouse_gender->cellAttributes() ?>>
<span id="el_patient_app_spouse_gender">
<span<?php echo $patient_app_view->spouse_gender->viewAttributes() ?>><?php echo $patient_app_view->spouse_gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_dob->Visible) { // spouse_dob ?>
	<tr id="r_spouse_dob">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_dob"><?php echo $patient_app_view->spouse_dob->caption() ?></span></td>
		<td data-name="spouse_dob" <?php echo $patient_app_view->spouse_dob->cellAttributes() ?>>
<span id="el_patient_app_spouse_dob">
<span<?php echo $patient_app_view->spouse_dob->viewAttributes() ?>><?php echo $patient_app_view->spouse_dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_Age->Visible) { // spouse_Age ?>
	<tr id="r_spouse_Age">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_Age"><?php echo $patient_app_view->spouse_Age->caption() ?></span></td>
		<td data-name="spouse_Age" <?php echo $patient_app_view->spouse_Age->cellAttributes() ?>>
<span id="el_patient_app_spouse_Age">
<span<?php echo $patient_app_view->spouse_Age->viewAttributes() ?>><?php echo $patient_app_view->spouse_Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<tr id="r_spouse_blood_group">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_blood_group"><?php echo $patient_app_view->spouse_blood_group->caption() ?></span></td>
		<td data-name="spouse_blood_group" <?php echo $patient_app_view->spouse_blood_group->cellAttributes() ?>>
<span id="el_patient_app_spouse_blood_group">
<span<?php echo $patient_app_view->spouse_blood_group->viewAttributes() ?>><?php echo $patient_app_view->spouse_blood_group->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<tr id="r_spouse_mobile_no">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_mobile_no"><?php echo $patient_app_view->spouse_mobile_no->caption() ?></span></td>
		<td data-name="spouse_mobile_no" <?php echo $patient_app_view->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_app_spouse_mobile_no">
<span<?php echo $patient_app_view->spouse_mobile_no->viewAttributes() ?>><?php echo $patient_app_view->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Maritalstatus->Visible) { // Maritalstatus ?>
	<tr id="r_Maritalstatus">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Maritalstatus"><?php echo $patient_app_view->Maritalstatus->caption() ?></span></td>
		<td data-name="Maritalstatus" <?php echo $patient_app_view->Maritalstatus->cellAttributes() ?>>
<span id="el_patient_app_Maritalstatus">
<span<?php echo $patient_app_view->Maritalstatus->viewAttributes() ?>><?php echo $patient_app_view->Maritalstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Business->Visible) { // Business ?>
	<tr id="r_Business">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Business"><?php echo $patient_app_view->Business->caption() ?></span></td>
		<td data-name="Business" <?php echo $patient_app_view->Business->cellAttributes() ?>>
<span id="el_patient_app_Business">
<span<?php echo $patient_app_view->Business->viewAttributes() ?>><?php echo $patient_app_view->Business->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Patient_Language->Visible) { // Patient_Language ?>
	<tr id="r_Patient_Language">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Patient_Language"><?php echo $patient_app_view->Patient_Language->caption() ?></span></td>
		<td data-name="Patient_Language" <?php echo $patient_app_view->Patient_Language->cellAttributes() ?>>
<span id="el_patient_app_Patient_Language">
<span<?php echo $patient_app_view->Patient_Language->viewAttributes() ?>><?php echo $patient_app_view->Patient_Language->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Passport->Visible) { // Passport ?>
	<tr id="r_Passport">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Passport"><?php echo $patient_app_view->Passport->caption() ?></span></td>
		<td data-name="Passport" <?php echo $patient_app_view->Passport->cellAttributes() ?>>
<span id="el_patient_app_Passport">
<span<?php echo $patient_app_view->Passport->viewAttributes() ?>><?php echo $patient_app_view->Passport->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->VisaNo->Visible) { // VisaNo ?>
	<tr id="r_VisaNo">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_VisaNo"><?php echo $patient_app_view->VisaNo->caption() ?></span></td>
		<td data-name="VisaNo" <?php echo $patient_app_view->VisaNo->cellAttributes() ?>>
<span id="el_patient_app_VisaNo">
<span<?php echo $patient_app_view->VisaNo->viewAttributes() ?>><?php echo $patient_app_view->VisaNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<tr id="r_ValidityOfVisa">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_ValidityOfVisa"><?php echo $patient_app_view->ValidityOfVisa->caption() ?></span></td>
		<td data-name="ValidityOfVisa" <?php echo $patient_app_view->ValidityOfVisa->cellAttributes() ?>>
<span id="el_patient_app_ValidityOfVisa">
<span<?php echo $patient_app_view->ValidityOfVisa->viewAttributes() ?>><?php echo $patient_app_view->ValidityOfVisa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<tr id="r_WhereDidYouHear">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_WhereDidYouHear"><?php echo $patient_app_view->WhereDidYouHear->caption() ?></span></td>
		<td data-name="WhereDidYouHear" <?php echo $patient_app_view->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_app_WhereDidYouHear">
<span<?php echo $patient_app_view->WhereDidYouHear->viewAttributes() ?>><?php echo $patient_app_view->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_HospID"><?php echo $patient_app_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $patient_app_view->HospID->cellAttributes() ?>>
<span id="el_patient_app_HospID">
<span<?php echo $patient_app_view->HospID->viewAttributes() ?>><?php echo $patient_app_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_street"><?php echo $patient_app_view->street->caption() ?></span></td>
		<td data-name="street" <?php echo $patient_app_view->street->cellAttributes() ?>>
<span id="el_patient_app_street">
<span<?php echo $patient_app_view->street->viewAttributes() ?>><?php echo $patient_app_view->street->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_town"><?php echo $patient_app_view->town->caption() ?></span></td>
		<td data-name="town" <?php echo $patient_app_view->town->cellAttributes() ?>>
<span id="el_patient_app_town">
<span<?php echo $patient_app_view->town->viewAttributes() ?>><?php echo $patient_app_view->town->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_province"><?php echo $patient_app_view->province->caption() ?></span></td>
		<td data-name="province" <?php echo $patient_app_view->province->cellAttributes() ?>>
<span id="el_patient_app_province">
<span<?php echo $patient_app_view->province->viewAttributes() ?>><?php echo $patient_app_view->province->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_country"><?php echo $patient_app_view->country->caption() ?></span></td>
		<td data-name="country" <?php echo $patient_app_view->country->cellAttributes() ?>>
<span id="el_patient_app_country">
<span<?php echo $patient_app_view->country->viewAttributes() ?>><?php echo $patient_app_view->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_postal_code"><?php echo $patient_app_view->postal_code->caption() ?></span></td>
		<td data-name="postal_code" <?php echo $patient_app_view->postal_code->cellAttributes() ?>>
<span id="el_patient_app_postal_code">
<span<?php echo $patient_app_view->postal_code->viewAttributes() ?>><?php echo $patient_app_view->postal_code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->PEmail->Visible) { // PEmail ?>
	<tr id="r_PEmail">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PEmail"><?php echo $patient_app_view->PEmail->caption() ?></span></td>
		<td data-name="PEmail" <?php echo $patient_app_view->PEmail->cellAttributes() ?>>
<span id="el_patient_app_PEmail">
<span<?php echo $patient_app_view->PEmail->viewAttributes() ?>><?php echo $patient_app_view->PEmail->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<tr id="r_PEmergencyContact">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_PEmergencyContact"><?php echo $patient_app_view->PEmergencyContact->caption() ?></span></td>
		<td data-name="PEmergencyContact" <?php echo $patient_app_view->PEmergencyContact->cellAttributes() ?>>
<span id="el_patient_app_PEmergencyContact">
<span<?php echo $patient_app_view->PEmergencyContact->viewAttributes() ?>><?php echo $patient_app_view->PEmergencyContact->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->occupation->Visible) { // occupation ?>
	<tr id="r_occupation">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_occupation"><?php echo $patient_app_view->occupation->caption() ?></span></td>
		<td data-name="occupation" <?php echo $patient_app_view->occupation->cellAttributes() ?>>
<span id="el_patient_app_occupation">
<span<?php echo $patient_app_view->occupation->viewAttributes() ?>><?php echo $patient_app_view->occupation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->spouse_occupation->Visible) { // spouse_occupation ?>
	<tr id="r_spouse_occupation">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_spouse_occupation"><?php echo $patient_app_view->spouse_occupation->caption() ?></span></td>
		<td data-name="spouse_occupation" <?php echo $patient_app_view->spouse_occupation->cellAttributes() ?>>
<span id="el_patient_app_spouse_occupation">
<span<?php echo $patient_app_view->spouse_occupation->viewAttributes() ?>><?php echo $patient_app_view->spouse_occupation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->WhatsApp->Visible) { // WhatsApp ?>
	<tr id="r_WhatsApp">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_WhatsApp"><?php echo $patient_app_view->WhatsApp->caption() ?></span></td>
		<td data-name="WhatsApp" <?php echo $patient_app_view->WhatsApp->cellAttributes() ?>>
<span id="el_patient_app_WhatsApp">
<span<?php echo $patient_app_view->WhatsApp->viewAttributes() ?>><?php echo $patient_app_view->WhatsApp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->CouppleID->Visible) { // CouppleID ?>
	<tr id="r_CouppleID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_CouppleID"><?php echo $patient_app_view->CouppleID->caption() ?></span></td>
		<td data-name="CouppleID" <?php echo $patient_app_view->CouppleID->cellAttributes() ?>>
<span id="el_patient_app_CouppleID">
<span<?php echo $patient_app_view->CouppleID->viewAttributes() ?>><?php echo $patient_app_view->CouppleID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->MaleID->Visible) { // MaleID ?>
	<tr id="r_MaleID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_MaleID"><?php echo $patient_app_view->MaleID->caption() ?></span></td>
		<td data-name="MaleID" <?php echo $patient_app_view->MaleID->cellAttributes() ?>>
<span id="el_patient_app_MaleID">
<span<?php echo $patient_app_view->MaleID->viewAttributes() ?>><?php echo $patient_app_view->MaleID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->FemaleID->Visible) { // FemaleID ?>
	<tr id="r_FemaleID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_FemaleID"><?php echo $patient_app_view->FemaleID->caption() ?></span></td>
		<td data-name="FemaleID" <?php echo $patient_app_view->FemaleID->cellAttributes() ?>>
<span id="el_patient_app_FemaleID">
<span<?php echo $patient_app_view->FemaleID->viewAttributes() ?>><?php echo $patient_app_view->FemaleID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->GroupID->Visible) { // GroupID ?>
	<tr id="r_GroupID">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_GroupID"><?php echo $patient_app_view->GroupID->caption() ?></span></td>
		<td data-name="GroupID" <?php echo $patient_app_view->GroupID->cellAttributes() ?>>
<span id="el_patient_app_GroupID">
<span<?php echo $patient_app_view->GroupID->viewAttributes() ?>><?php echo $patient_app_view->GroupID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_app_view->Relationship->Visible) { // Relationship ?>
	<tr id="r_Relationship">
		<td class="<?php echo $patient_app_view->TableLeftColumnClass ?>"><span id="elh_patient_app_Relationship"><?php echo $patient_app_view->Relationship->caption() ?></span></td>
		<td data-name="Relationship" <?php echo $patient_app_view->Relationship->cellAttributes() ?>>
<span id="el_patient_app_Relationship">
<span<?php echo $patient_app_view->Relationship->viewAttributes() ?>><?php echo $patient_app_view->Relationship->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_app_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_app_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_app_view->terminate();
?>