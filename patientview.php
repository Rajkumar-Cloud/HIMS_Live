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
$patient_view = new patient_view();

// Run the page
$patient_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatientview = currentForm = new ew.Form("fpatientview", "view");

// Form_CustomValidate event
fpatientview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatientview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatientview.lists["x_title"] = <?php echo $patient_view->title->Lookup->toClientList() ?>;
fpatientview.lists["x_title"].options = <?php echo JsonEncode($patient_view->title->lookupOptions()) ?>;
fpatientview.lists["x_gender"] = <?php echo $patient_view->gender->Lookup->toClientList() ?>;
fpatientview.lists["x_gender"].options = <?php echo JsonEncode($patient_view->gender->lookupOptions()) ?>;
fpatientview.lists["x_blood_group"] = <?php echo $patient_view->blood_group->Lookup->toClientList() ?>;
fpatientview.lists["x_blood_group"].options = <?php echo JsonEncode($patient_view->blood_group->lookupOptions()) ?>;
fpatientview.lists["x_status"] = <?php echo $patient_view->status->Lookup->toClientList() ?>;
fpatientview.lists["x_status"].options = <?php echo JsonEncode($patient_view->status->lookupOptions()) ?>;
fpatientview.lists["x_ReferedByDr"] = <?php echo $patient_view->ReferedByDr->Lookup->toClientList() ?>;
fpatientview.lists["x_ReferedByDr"].options = <?php echo JsonEncode($patient_view->ReferedByDr->lookupOptions()) ?>;
fpatientview.lists["x_ReferA4TreatingConsultant"] = <?php echo $patient_view->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fpatientview.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($patient_view->ReferA4TreatingConsultant->lookupOptions()) ?>;
fpatientview.lists["x_spouse_title"] = <?php echo $patient_view->spouse_title->Lookup->toClientList() ?>;
fpatientview.lists["x_spouse_title"].options = <?php echo JsonEncode($patient_view->spouse_title->lookupOptions()) ?>;
fpatientview.lists["x_spouse_gender"] = <?php echo $patient_view->spouse_gender->Lookup->toClientList() ?>;
fpatientview.lists["x_spouse_gender"].options = <?php echo JsonEncode($patient_view->spouse_gender->lookupOptions()) ?>;
fpatientview.lists["x_spouse_blood_group"] = <?php echo $patient_view->spouse_blood_group->Lookup->toClientList() ?>;
fpatientview.lists["x_spouse_blood_group"].options = <?php echo JsonEncode($patient_view->spouse_blood_group->lookupOptions()) ?>;
fpatientview.lists["x_Maritalstatus"] = <?php echo $patient_view->Maritalstatus->Lookup->toClientList() ?>;
fpatientview.lists["x_Maritalstatus"].options = <?php echo JsonEncode($patient_view->Maritalstatus->lookupOptions()) ?>;
fpatientview.lists["x_Business"] = <?php echo $patient_view->Business->Lookup->toClientList() ?>;
fpatientview.lists["x_Business"].options = <?php echo JsonEncode($patient_view->Business->lookupOptions()) ?>;
fpatientview.autoSuggests["x_Business"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatientview.lists["x_Patient_Language"] = <?php echo $patient_view->Patient_Language->Lookup->toClientList() ?>;
fpatientview.lists["x_Patient_Language"].options = <?php echo JsonEncode($patient_view->Patient_Language->lookupOptions()) ?>;
fpatientview.lists["x_WhereDidYouHear[]"] = <?php echo $patient_view->WhereDidYouHear->Lookup->toClientList() ?>;
fpatientview.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($patient_view->WhereDidYouHear->lookupOptions()) ?>;
fpatientview.lists["x_HospID"] = <?php echo $patient_view->HospID->Lookup->toClientList() ?>;
fpatientview.lists["x_HospID"].options = <?php echo JsonEncode($patient_view->HospID->lookupOptions()) ?>;
fpatientview.lists["x_AppointmentSearch"] = <?php echo $patient_view->AppointmentSearch->Lookup->toClientList() ?>;
fpatientview.lists["x_AppointmentSearch"].options = <?php echo JsonEncode($patient_view->AppointmentSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_view->ExportOptions->render("body") ?>
<?php $patient_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_view->showPageHeader(); ?>
<?php
$patient_view->showMessage();
?>
<form name="fpatientview" id="fpatientview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="modal" value="<?php echo (int)$patient_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_id"><script id="tpc_patient_id" class="patientview" type="text/html"><span><?php echo $patient->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient->id->cellAttributes() ?>>
<script id="tpx_patient_id" class="patientview" type="text/html">
<span id="el_patient_id">
<span<?php echo $patient->id->viewAttributes() ?>>
<?php echo $patient->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PatientID"><script id="tpc_patient_PatientID" class="patientview" type="text/html"><span><?php echo $patient->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $patient->PatientID->cellAttributes() ?>>
<script id="tpx_patient_PatientID" class="patientview" type="text/html">
<span id="el_patient_PatientID">
<span<?php echo $patient->PatientID->viewAttributes() ?>>
<?php echo $patient->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
	<tr id="r_title">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_title"><script id="tpc_patient_title" class="patientview" type="text/html"><span><?php echo $patient->title->caption() ?></span></script></span></td>
		<td data-name="title"<?php echo $patient->title->cellAttributes() ?>>
<script id="tpx_patient_title" class="patientview" type="text/html">
<span id="el_patient_title">
<span<?php echo $patient->title->viewAttributes() ?>>
<?php echo $patient->title->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_first_name"><script id="tpc_patient_first_name" class="patientview" type="text/html"><span><?php echo $patient->first_name->caption() ?></span></script></span></td>
		<td data-name="first_name"<?php echo $patient->first_name->cellAttributes() ?>>
<script id="tpx_patient_first_name" class="patientview" type="text/html">
<span id="el_patient_first_name">
<span<?php echo $patient->first_name->viewAttributes() ?>>
<?php echo $patient->first_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->middle_name->Visible) { // middle_name ?>
	<tr id="r_middle_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_middle_name"><script id="tpc_patient_middle_name" class="patientview" type="text/html"><span><?php echo $patient->middle_name->caption() ?></span></script></span></td>
		<td data-name="middle_name"<?php echo $patient->middle_name->cellAttributes() ?>>
<script id="tpx_patient_middle_name" class="patientview" type="text/html">
<span id="el_patient_middle_name">
<span<?php echo $patient->middle_name->viewAttributes() ?>>
<?php echo $patient->middle_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_last_name"><script id="tpc_patient_last_name" class="patientview" type="text/html"><span><?php echo $patient->last_name->caption() ?></span></script></span></td>
		<td data-name="last_name"<?php echo $patient->last_name->cellAttributes() ?>>
<script id="tpx_patient_last_name" class="patientview" type="text/html">
<span id="el_patient_last_name">
<span<?php echo $patient->last_name->viewAttributes() ?>>
<?php echo $patient->last_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_gender"><script id="tpc_patient_gender" class="patientview" type="text/html"><span><?php echo $patient->gender->caption() ?></span></script></span></td>
		<td data-name="gender"<?php echo $patient->gender->cellAttributes() ?>>
<script id="tpx_patient_gender" class="patientview" type="text/html">
<span id="el_patient_gender">
<span<?php echo $patient->gender->viewAttributes() ?>>
<?php echo $patient->gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->dob->Visible) { // dob ?>
	<tr id="r_dob">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_dob"><script id="tpc_patient_dob" class="patientview" type="text/html"><span><?php echo $patient->dob->caption() ?></span></script></span></td>
		<td data-name="dob"<?php echo $patient->dob->cellAttributes() ?>>
<script id="tpx_patient_dob" class="patientview" type="text/html">
<span id="el_patient_dob">
<span<?php echo $patient->dob->viewAttributes() ?>>
<?php echo $patient->dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Age"><script id="tpc_patient_Age" class="patientview" type="text/html"><span><?php echo $patient->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $patient->Age->cellAttributes() ?>>
<script id="tpx_patient_Age" class="patientview" type="text/html">
<span id="el_patient_Age">
<span<?php echo $patient->Age->viewAttributes() ?>>
<?php echo $patient->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
	<tr id="r_blood_group">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_blood_group"><script id="tpc_patient_blood_group" class="patientview" type="text/html"><span><?php echo $patient->blood_group->caption() ?></span></script></span></td>
		<td data-name="blood_group"<?php echo $patient->blood_group->cellAttributes() ?>>
<script id="tpx_patient_blood_group" class="patientview" type="text/html">
<span id="el_patient_blood_group">
<span<?php echo $patient->blood_group->viewAttributes() ?>>
<?php echo $patient->blood_group->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
	<tr id="r_mobile_no">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_mobile_no"><script id="tpc_patient_mobile_no" class="patientview" type="text/html"><span><?php echo $patient->mobile_no->caption() ?></span></script></span></td>
		<td data-name="mobile_no"<?php echo $patient->mobile_no->cellAttributes() ?>>
<script id="tpx_patient_mobile_no" class="patientview" type="text/html">
<span id="el_patient_mobile_no">
<span<?php echo $patient->mobile_no->viewAttributes() ?>>
<?php echo $patient->mobile_no->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_description"><script id="tpc_patient_description" class="patientview" type="text/html"><span><?php echo $patient->description->caption() ?></span></script></span></td>
		<td data-name="description"<?php echo $patient->description->cellAttributes() ?>>
<script id="tpx_patient_description" class="patientview" type="text/html">
<span id="el_patient_description">
<span<?php echo $patient->description->viewAttributes() ?>>
<?php echo $patient->description->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_status"><script id="tpc_patient_status" class="patientview" type="text/html"><span><?php echo $patient->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $patient->status->cellAttributes() ?>>
<script id="tpx_patient_status" class="patientview" type="text/html">
<span id="el_patient_status">
<span<?php echo $patient->status->viewAttributes() ?>>
<?php echo $patient->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_createdby"><script id="tpc_patient_createdby" class="patientview" type="text/html"><span><?php echo $patient->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $patient->createdby->cellAttributes() ?>>
<script id="tpx_patient_createdby" class="patientview" type="text/html">
<span id="el_patient_createdby">
<span<?php echo $patient->createdby->viewAttributes() ?>>
<?php echo $patient->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_createddatetime"><script id="tpc_patient_createddatetime" class="patientview" type="text/html"><span><?php echo $patient->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $patient->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_createddatetime" class="patientview" type="text/html">
<span id="el_patient_createddatetime">
<span<?php echo $patient->createddatetime->viewAttributes() ?>>
<?php echo $patient->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_modifiedby"><script id="tpc_patient_modifiedby" class="patientview" type="text/html"><span><?php echo $patient->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $patient->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_modifiedby" class="patientview" type="text/html">
<span id="el_patient_modifiedby">
<span<?php echo $patient->modifiedby->viewAttributes() ?>>
<?php echo $patient->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_modifieddatetime"><script id="tpc_patient_modifieddatetime" class="patientview" type="text/html"><span><?php echo $patient->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $patient->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_modifieddatetime" class="patientview" type="text/html">
<span id="el_patient_modifieddatetime">
<span<?php echo $patient->modifieddatetime->viewAttributes() ?>>
<?php echo $patient->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_profilePic"><script id="tpc_patient_profilePic" class="patientview" type="text/html"><span><?php echo $patient->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $patient->profilePic->cellAttributes() ?>>
<script id="tpx_patient_profilePic" class="patientview" type="text/html">
<span id="el_patient_profilePic">
<span>
<?php echo GetFileViewTag($patient->profilePic, $patient->profilePic->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_IdentificationMark"><script id="tpc_patient_IdentificationMark" class="patientview" type="text/html"><span><?php echo $patient->IdentificationMark->caption() ?></span></script></span></td>
		<td data-name="IdentificationMark"<?php echo $patient->IdentificationMark->cellAttributes() ?>>
<script id="tpx_patient_IdentificationMark" class="patientview" type="text/html">
<span id="el_patient_IdentificationMark">
<span<?php echo $patient->IdentificationMark->viewAttributes() ?>>
<?php echo $patient->IdentificationMark->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
	<tr id="r_Religion">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Religion"><script id="tpc_patient_Religion" class="patientview" type="text/html"><span><?php echo $patient->Religion->caption() ?></span></script></span></td>
		<td data-name="Religion"<?php echo $patient->Religion->cellAttributes() ?>>
<script id="tpx_patient_Religion" class="patientview" type="text/html">
<span id="el_patient_Religion">
<span<?php echo $patient->Religion->viewAttributes() ?>>
<?php echo $patient->Religion->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
	<tr id="r_Nationality">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Nationality"><script id="tpc_patient_Nationality" class="patientview" type="text/html"><span><?php echo $patient->Nationality->caption() ?></span></script></span></td>
		<td data-name="Nationality"<?php echo $patient->Nationality->cellAttributes() ?>>
<script id="tpx_patient_Nationality" class="patientview" type="text/html">
<span id="el_patient_Nationality">
<span<?php echo $patient->Nationality->viewAttributes() ?>>
<?php echo $patient->Nationality->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferedByDr"><script id="tpc_patient_ReferedByDr" class="patientview" type="text/html"><span><?php echo $patient->ReferedByDr->caption() ?></span></script></span></td>
		<td data-name="ReferedByDr"<?php echo $patient->ReferedByDr->cellAttributes() ?>>
<script id="tpx_patient_ReferedByDr" class="patientview" type="text/html">
<span id="el_patient_ReferedByDr">
<span<?php echo $patient->ReferedByDr->viewAttributes() ?>>
<?php echo $patient->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferClinicname"><script id="tpc_patient_ReferClinicname" class="patientview" type="text/html"><span><?php echo $patient->ReferClinicname->caption() ?></span></script></span></td>
		<td data-name="ReferClinicname"<?php echo $patient->ReferClinicname->cellAttributes() ?>>
<script id="tpx_patient_ReferClinicname" class="patientview" type="text/html">
<span id="el_patient_ReferClinicname">
<span<?php echo $patient->ReferClinicname->viewAttributes() ?>>
<?php echo $patient->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferCity"><script id="tpc_patient_ReferCity" class="patientview" type="text/html"><span><?php echo $patient->ReferCity->caption() ?></span></script></span></td>
		<td data-name="ReferCity"<?php echo $patient->ReferCity->cellAttributes() ?>>
<script id="tpx_patient_ReferCity" class="patientview" type="text/html">
<span id="el_patient_ReferCity">
<span<?php echo $patient->ReferCity->viewAttributes() ?>>
<?php echo $patient->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferMobileNo"><script id="tpc_patient_ReferMobileNo" class="patientview" type="text/html"><span><?php echo $patient->ReferMobileNo->caption() ?></span></script></span></td>
		<td data-name="ReferMobileNo"<?php echo $patient->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_patient_ReferMobileNo" class="patientview" type="text/html">
<span id="el_patient_ReferMobileNo">
<span<?php echo $patient->ReferMobileNo->viewAttributes() ?>>
<?php echo $patient->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferA4TreatingConsultant"><script id="tpc_patient_ReferA4TreatingConsultant" class="patientview" type="text/html"><span><?php echo $patient->ReferA4TreatingConsultant->caption() ?></span></script></span></td>
		<td data-name="ReferA4TreatingConsultant"<?php echo $patient->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_patient_ReferA4TreatingConsultant" class="patientview" type="text/html">
<span id="el_patient_ReferA4TreatingConsultant">
<span<?php echo $patient->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $patient->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PurposreReferredfor"><script id="tpc_patient_PurposreReferredfor" class="patientview" type="text/html"><span><?php echo $patient->PurposreReferredfor->caption() ?></span></script></span></td>
		<td data-name="PurposreReferredfor"<?php echo $patient->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_patient_PurposreReferredfor" class="patientview" type="text/html">
<span id="el_patient_PurposreReferredfor">
<span<?php echo $patient->PurposreReferredfor->viewAttributes() ?>>
<?php echo $patient->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
	<tr id="r_spouse_title">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_title"><script id="tpc_patient_spouse_title" class="patientview" type="text/html"><span><?php echo $patient->spouse_title->caption() ?></span></script></span></td>
		<td data-name="spouse_title"<?php echo $patient->spouse_title->cellAttributes() ?>>
<script id="tpx_patient_spouse_title" class="patientview" type="text/html">
<span id="el_patient_spouse_title">
<span<?php echo $patient->spouse_title->viewAttributes() ?>>
<?php echo $patient->spouse_title->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
	<tr id="r_spouse_first_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_first_name"><script id="tpc_patient_spouse_first_name" class="patientview" type="text/html"><span><?php echo $patient->spouse_first_name->caption() ?></span></script></span></td>
		<td data-name="spouse_first_name"<?php echo $patient->spouse_first_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_first_name" class="patientview" type="text/html">
<span id="el_patient_spouse_first_name">
<span<?php echo $patient->spouse_first_name->viewAttributes() ?>>
<?php echo $patient->spouse_first_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<tr id="r_spouse_middle_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_middle_name"><script id="tpc_patient_spouse_middle_name" class="patientview" type="text/html"><span><?php echo $patient->spouse_middle_name->caption() ?></span></script></span></td>
		<td data-name="spouse_middle_name"<?php echo $patient->spouse_middle_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_middle_name" class="patientview" type="text/html">
<span id="el_patient_spouse_middle_name">
<span<?php echo $patient->spouse_middle_name->viewAttributes() ?>>
<?php echo $patient->spouse_middle_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_last_name->Visible) { // spouse_last_name ?>
	<tr id="r_spouse_last_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_last_name"><script id="tpc_patient_spouse_last_name" class="patientview" type="text/html"><span><?php echo $patient->spouse_last_name->caption() ?></span></script></span></td>
		<td data-name="spouse_last_name"<?php echo $patient->spouse_last_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_last_name" class="patientview" type="text/html">
<span id="el_patient_spouse_last_name">
<span<?php echo $patient->spouse_last_name->viewAttributes() ?>>
<?php echo $patient->spouse_last_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
	<tr id="r_spouse_gender">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_gender"><script id="tpc_patient_spouse_gender" class="patientview" type="text/html"><span><?php echo $patient->spouse_gender->caption() ?></span></script></span></td>
		<td data-name="spouse_gender"<?php echo $patient->spouse_gender->cellAttributes() ?>>
<script id="tpx_patient_spouse_gender" class="patientview" type="text/html">
<span id="el_patient_spouse_gender">
<span<?php echo $patient->spouse_gender->viewAttributes() ?>>
<?php echo $patient->spouse_gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_dob->Visible) { // spouse_dob ?>
	<tr id="r_spouse_dob">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_dob"><script id="tpc_patient_spouse_dob" class="patientview" type="text/html"><span><?php echo $patient->spouse_dob->caption() ?></span></script></span></td>
		<td data-name="spouse_dob"<?php echo $patient->spouse_dob->cellAttributes() ?>>
<script id="tpx_patient_spouse_dob" class="patientview" type="text/html">
<span id="el_patient_spouse_dob">
<span<?php echo $patient->spouse_dob->viewAttributes() ?>>
<?php echo $patient->spouse_dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_Age->Visible) { // spouse_Age ?>
	<tr id="r_spouse_Age">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_Age"><script id="tpc_patient_spouse_Age" class="patientview" type="text/html"><span><?php echo $patient->spouse_Age->caption() ?></span></script></span></td>
		<td data-name="spouse_Age"<?php echo $patient->spouse_Age->cellAttributes() ?>>
<script id="tpx_patient_spouse_Age" class="patientview" type="text/html">
<span id="el_patient_spouse_Age">
<span<?php echo $patient->spouse_Age->viewAttributes() ?>>
<?php echo $patient->spouse_Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<tr id="r_spouse_blood_group">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_blood_group"><script id="tpc_patient_spouse_blood_group" class="patientview" type="text/html"><span><?php echo $patient->spouse_blood_group->caption() ?></span></script></span></td>
		<td data-name="spouse_blood_group"<?php echo $patient->spouse_blood_group->cellAttributes() ?>>
<script id="tpx_patient_spouse_blood_group" class="patientview" type="text/html">
<span id="el_patient_spouse_blood_group">
<span<?php echo $patient->spouse_blood_group->viewAttributes() ?>>
<?php echo $patient->spouse_blood_group->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<tr id="r_spouse_mobile_no">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_mobile_no"><script id="tpc_patient_spouse_mobile_no" class="patientview" type="text/html"><span><?php echo $patient->spouse_mobile_no->caption() ?></span></script></span></td>
		<td data-name="spouse_mobile_no"<?php echo $patient->spouse_mobile_no->cellAttributes() ?>>
<script id="tpx_patient_spouse_mobile_no" class="patientview" type="text/html">
<span id="el_patient_spouse_mobile_no">
<span<?php echo $patient->spouse_mobile_no->viewAttributes() ?>>
<?php echo $patient->spouse_mobile_no->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Maritalstatus->Visible) { // Maritalstatus ?>
	<tr id="r_Maritalstatus">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Maritalstatus"><script id="tpc_patient_Maritalstatus" class="patientview" type="text/html"><span><?php echo $patient->Maritalstatus->caption() ?></span></script></span></td>
		<td data-name="Maritalstatus"<?php echo $patient->Maritalstatus->cellAttributes() ?>>
<script id="tpx_patient_Maritalstatus" class="patientview" type="text/html">
<span id="el_patient_Maritalstatus">
<span<?php echo $patient->Maritalstatus->viewAttributes() ?>>
<?php echo $patient->Maritalstatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Business->Visible) { // Business ?>
	<tr id="r_Business">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Business"><script id="tpc_patient_Business" class="patientview" type="text/html"><span><?php echo $patient->Business->caption() ?></span></script></span></td>
		<td data-name="Business"<?php echo $patient->Business->cellAttributes() ?>>
<script id="tpx_patient_Business" class="patientview" type="text/html">
<span id="el_patient_Business">
<span<?php echo $patient->Business->viewAttributes() ?>>
<?php echo $patient->Business->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Patient_Language->Visible) { // Patient_Language ?>
	<tr id="r_Patient_Language">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Patient_Language"><script id="tpc_patient_Patient_Language" class="patientview" type="text/html"><span><?php echo $patient->Patient_Language->caption() ?></span></script></span></td>
		<td data-name="Patient_Language"<?php echo $patient->Patient_Language->cellAttributes() ?>>
<script id="tpx_patient_Patient_Language" class="patientview" type="text/html">
<span id="el_patient_Patient_Language">
<span<?php echo $patient->Patient_Language->viewAttributes() ?>>
<?php echo $patient->Patient_Language->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
	<tr id="r_Passport">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Passport"><script id="tpc_patient_Passport" class="patientview" type="text/html"><span><?php echo $patient->Passport->caption() ?></span></script></span></td>
		<td data-name="Passport"<?php echo $patient->Passport->cellAttributes() ?>>
<script id="tpx_patient_Passport" class="patientview" type="text/html">
<span id="el_patient_Passport">
<span<?php echo $patient->Passport->viewAttributes() ?>>
<?php echo $patient->Passport->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
	<tr id="r_VisaNo">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_VisaNo"><script id="tpc_patient_VisaNo" class="patientview" type="text/html"><span><?php echo $patient->VisaNo->caption() ?></span></script></span></td>
		<td data-name="VisaNo"<?php echo $patient->VisaNo->cellAttributes() ?>>
<script id="tpx_patient_VisaNo" class="patientview" type="text/html">
<span id="el_patient_VisaNo">
<span<?php echo $patient->VisaNo->viewAttributes() ?>>
<?php echo $patient->VisaNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<tr id="r_ValidityOfVisa">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ValidityOfVisa"><script id="tpc_patient_ValidityOfVisa" class="patientview" type="text/html"><span><?php echo $patient->ValidityOfVisa->caption() ?></span></script></span></td>
		<td data-name="ValidityOfVisa"<?php echo $patient->ValidityOfVisa->cellAttributes() ?>>
<script id="tpx_patient_ValidityOfVisa" class="patientview" type="text/html">
<span id="el_patient_ValidityOfVisa">
<span<?php echo $patient->ValidityOfVisa->viewAttributes() ?>>
<?php echo $patient->ValidityOfVisa->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<tr id="r_WhereDidYouHear">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_WhereDidYouHear"><script id="tpc_patient_WhereDidYouHear" class="patientview" type="text/html"><span><?php echo $patient->WhereDidYouHear->caption() ?></span></script></span></td>
		<td data-name="WhereDidYouHear"<?php echo $patient->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_patient_WhereDidYouHear" class="patientview" type="text/html">
<span id="el_patient_WhereDidYouHear">
<span<?php echo $patient->WhereDidYouHear->viewAttributes() ?>>
<?php echo $patient->WhereDidYouHear->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_HospID"><script id="tpc_patient_HospID" class="patientview" type="text/html"><span><?php echo $patient->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient->HospID->cellAttributes() ?>>
<script id="tpx_patient_HospID" class="patientview" type="text/html">
<span id="el_patient_HospID">
<span<?php echo $patient->HospID->viewAttributes() ?>>
<?php echo $patient->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_street"><script id="tpc_patient_street" class="patientview" type="text/html"><span><?php echo $patient->street->caption() ?></span></script></span></td>
		<td data-name="street"<?php echo $patient->street->cellAttributes() ?>>
<script id="tpx_patient_street" class="patientview" type="text/html">
<span id="el_patient_street">
<span<?php echo $patient->street->viewAttributes() ?>>
<?php echo $patient->street->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_town"><script id="tpc_patient_town" class="patientview" type="text/html"><span><?php echo $patient->town->caption() ?></span></script></span></td>
		<td data-name="town"<?php echo $patient->town->cellAttributes() ?>>
<script id="tpx_patient_town" class="patientview" type="text/html">
<span id="el_patient_town">
<span<?php echo $patient->town->viewAttributes() ?>>
<?php echo $patient->town->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_province"><script id="tpc_patient_province" class="patientview" type="text/html"><span><?php echo $patient->province->caption() ?></span></script></span></td>
		<td data-name="province"<?php echo $patient->province->cellAttributes() ?>>
<script id="tpx_patient_province" class="patientview" type="text/html">
<span id="el_patient_province">
<span<?php echo $patient->province->viewAttributes() ?>>
<?php echo $patient->province->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_country"><script id="tpc_patient_country" class="patientview" type="text/html"><span><?php echo $patient->country->caption() ?></span></script></span></td>
		<td data-name="country"<?php echo $patient->country->cellAttributes() ?>>
<script id="tpx_patient_country" class="patientview" type="text/html">
<span id="el_patient_country">
<span<?php echo $patient->country->viewAttributes() ?>>
<?php echo $patient->country->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_postal_code"><script id="tpc_patient_postal_code" class="patientview" type="text/html"><span><?php echo $patient->postal_code->caption() ?></span></script></span></td>
		<td data-name="postal_code"<?php echo $patient->postal_code->cellAttributes() ?>>
<script id="tpx_patient_postal_code" class="patientview" type="text/html">
<span id="el_patient_postal_code">
<span<?php echo $patient->postal_code->viewAttributes() ?>>
<?php echo $patient->postal_code->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
	<tr id="r_PEmail">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PEmail"><script id="tpc_patient_PEmail" class="patientview" type="text/html"><span><?php echo $patient->PEmail->caption() ?></span></script></span></td>
		<td data-name="PEmail"<?php echo $patient->PEmail->cellAttributes() ?>>
<script id="tpx_patient_PEmail" class="patientview" type="text/html">
<span id="el_patient_PEmail">
<span<?php echo $patient->PEmail->viewAttributes() ?>>
<?php echo $patient->PEmail->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<tr id="r_PEmergencyContact">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PEmergencyContact"><script id="tpc_patient_PEmergencyContact" class="patientview" type="text/html"><span><?php echo $patient->PEmergencyContact->caption() ?></span></script></span></td>
		<td data-name="PEmergencyContact"<?php echo $patient->PEmergencyContact->cellAttributes() ?>>
<script id="tpx_patient_PEmergencyContact" class="patientview" type="text/html">
<span id="el_patient_PEmergencyContact">
<span<?php echo $patient->PEmergencyContact->viewAttributes() ?>>
<?php echo $patient->PEmergencyContact->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->occupation->Visible) { // occupation ?>
	<tr id="r_occupation">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_occupation"><script id="tpc_patient_occupation" class="patientview" type="text/html"><span><?php echo $patient->occupation->caption() ?></span></script></span></td>
		<td data-name="occupation"<?php echo $patient->occupation->cellAttributes() ?>>
<script id="tpx_patient_occupation" class="patientview" type="text/html">
<span id="el_patient_occupation">
<span<?php echo $patient->occupation->viewAttributes() ?>>
<?php echo $patient->occupation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->spouse_occupation->Visible) { // spouse_occupation ?>
	<tr id="r_spouse_occupation">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_occupation"><script id="tpc_patient_spouse_occupation" class="patientview" type="text/html"><span><?php echo $patient->spouse_occupation->caption() ?></span></script></span></td>
		<td data-name="spouse_occupation"<?php echo $patient->spouse_occupation->cellAttributes() ?>>
<script id="tpx_patient_spouse_occupation" class="patientview" type="text/html">
<span id="el_patient_spouse_occupation">
<span<?php echo $patient->spouse_occupation->viewAttributes() ?>>
<?php echo $patient->spouse_occupation->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->WhatsApp->Visible) { // WhatsApp ?>
	<tr id="r_WhatsApp">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_WhatsApp"><script id="tpc_patient_WhatsApp" class="patientview" type="text/html"><span><?php echo $patient->WhatsApp->caption() ?></span></script></span></td>
		<td data-name="WhatsApp"<?php echo $patient->WhatsApp->cellAttributes() ?>>
<script id="tpx_patient_WhatsApp" class="patientview" type="text/html">
<span id="el_patient_WhatsApp">
<span<?php echo $patient->WhatsApp->viewAttributes() ?>>
<?php echo $patient->WhatsApp->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->CouppleID->Visible) { // CouppleID ?>
	<tr id="r_CouppleID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_CouppleID"><script id="tpc_patient_CouppleID" class="patientview" type="text/html"><span><?php echo $patient->CouppleID->caption() ?></span></script></span></td>
		<td data-name="CouppleID"<?php echo $patient->CouppleID->cellAttributes() ?>>
<script id="tpx_patient_CouppleID" class="patientview" type="text/html">
<span id="el_patient_CouppleID">
<span<?php echo $patient->CouppleID->viewAttributes() ?>>
<?php echo $patient->CouppleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->MaleID->Visible) { // MaleID ?>
	<tr id="r_MaleID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_MaleID"><script id="tpc_patient_MaleID" class="patientview" type="text/html"><span><?php echo $patient->MaleID->caption() ?></span></script></span></td>
		<td data-name="MaleID"<?php echo $patient->MaleID->cellAttributes() ?>>
<script id="tpx_patient_MaleID" class="patientview" type="text/html">
<span id="el_patient_MaleID">
<span<?php echo $patient->MaleID->viewAttributes() ?>>
<?php echo $patient->MaleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->FemaleID->Visible) { // FemaleID ?>
	<tr id="r_FemaleID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_FemaleID"><script id="tpc_patient_FemaleID" class="patientview" type="text/html"><span><?php echo $patient->FemaleID->caption() ?></span></script></span></td>
		<td data-name="FemaleID"<?php echo $patient->FemaleID->cellAttributes() ?>>
<script id="tpx_patient_FemaleID" class="patientview" type="text/html">
<span id="el_patient_FemaleID">
<span<?php echo $patient->FemaleID->viewAttributes() ?>>
<?php echo $patient->FemaleID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->GroupID->Visible) { // GroupID ?>
	<tr id="r_GroupID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_GroupID"><script id="tpc_patient_GroupID" class="patientview" type="text/html"><span><?php echo $patient->GroupID->caption() ?></span></script></span></td>
		<td data-name="GroupID"<?php echo $patient->GroupID->cellAttributes() ?>>
<script id="tpx_patient_GroupID" class="patientview" type="text/html">
<span id="el_patient_GroupID">
<span<?php echo $patient->GroupID->viewAttributes() ?>>
<?php echo $patient->GroupID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Relationship->Visible) { // Relationship ?>
	<tr id="r_Relationship">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Relationship"><script id="tpc_patient_Relationship" class="patientview" type="text/html"><span><?php echo $patient->Relationship->caption() ?></span></script></span></td>
		<td data-name="Relationship"<?php echo $patient->Relationship->cellAttributes() ?>>
<script id="tpx_patient_Relationship" class="patientview" type="text/html">
<span id="el_patient_Relationship">
<span<?php echo $patient->Relationship->viewAttributes() ?>>
<?php echo $patient->Relationship->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<tr id="r_AppointmentSearch">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_AppointmentSearch"><script id="tpc_patient_AppointmentSearch" class="patientview" type="text/html"><span><?php echo $patient->AppointmentSearch->caption() ?></span></script></span></td>
		<td data-name="AppointmentSearch"<?php echo $patient->AppointmentSearch->cellAttributes() ?>>
<script id="tpx_patient_AppointmentSearch" class="patientview" type="text/html">
<span id="el_patient_AppointmentSearch">
<span<?php echo $patient->AppointmentSearch->viewAttributes() ?>>
<?php echo $patient->AppointmentSearch->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->FacebookID->Visible) { // FacebookID ?>
	<tr id="r_FacebookID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_FacebookID"><script id="tpc_patient_FacebookID" class="patientview" type="text/html"><span><?php echo $patient->FacebookID->caption() ?></span></script></span></td>
		<td data-name="FacebookID"<?php echo $patient->FacebookID->cellAttributes() ?>>
<script id="tpx_patient_FacebookID" class="patientview" type="text/html">
<span id="el_patient_FacebookID">
<span<?php echo $patient->FacebookID->viewAttributes() ?>>
<?php echo $patient->FacebookID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->profilePicImage->Visible) { // profilePicImage ?>
	<tr id="r_profilePicImage">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_profilePicImage"><script id="tpc_patient_profilePicImage" class="patientview" type="text/html"><span><?php echo $patient->profilePicImage->caption() ?></span></script></span></td>
		<td data-name="profilePicImage"<?php echo $patient->profilePicImage->cellAttributes() ?>>
<script id="tpx_patient_profilePicImage" class="patientview" type="text/html">
<span id="el_patient_profilePicImage">
<span<?php echo $patient->profilePicImage->viewAttributes() ?>>
<?php echo GetFileViewTag($patient->profilePicImage, $patient->profilePicImage->getViewValue()) ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient->Clients->Visible) { // Clients ?>
	<tr id="r_Clients">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Clients"><script id="tpc_patient_Clients" class="patientview" type="text/html"><span><?php echo $patient->Clients->caption() ?></span></script></span></td>
		<td data-name="Clients"<?php echo $patient->Clients->cellAttributes() ?>>
<script id="tpx_patient_Clients" class="patientview" type="text/html">
<span id="el_patient_Clients">
<span<?php echo $patient->Clients->viewAttributes() ?>>
<?php echo $patient->Clients->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patientview" class="ew-custom-template"></div>
<script id="tpm_patientview" type="text/html">
<div id="ct_patient_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$pcid = $_GET["id"] ;
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$Iid = $_GET["id"] ;
$dbhelper = &DbHelper();
if($pcid != null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Male='". $pcid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$IVFid = $resultsa[0]["RIDNO"];
	$ccid = $resultsa[0]["Name"];
	$cPatientID = $resultsa[0]["PartnerID"];
}
if($cPatientID == null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where Female='".$pcid."'; ";
	$results1a = $dbhelper->ExecuteRows($sql);
	$IVFida = $resultsa[0]["RIDNO"];
	$ccida = $resultsa[0]["Name"];
	$cPatientID = $resultsa[0]["PatientID"];
}
?>	
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_patient_PatientID"/}}&nbsp;{{include tmpl="#tpx_patient_PatientID"/}}</h3>
	</div>
	<div class="col-4">
	 <?php  if($cPatientID != '')
{ echo "Partner ID : ".$cPatientID; }
  ?>
	</div>
	<div class="col-4">
		<h3 class="card-title">
			{{include tmpl="#tpc_patient_AppointmentSearch"/}}&nbsp;{{include tmpl="#tpx_patient_AppointmentSearch"/}}
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_title"/}}&nbsp;{{include tmpl="#tpx_patient_title"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_first_name"/}}&nbsp;{{include tmpl="#tpx_patient_first_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_middle_name"/}}&nbsp;{{include tmpl="#tpx_patient_middle_name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_last_name"/}}&nbsp;{{include tmpl="#tpx_patient_last_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_gender"/}}&nbsp;{{include tmpl="#tpx_patient_gender"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_dob"/}}&nbsp;{{include tmpl="#tpx_patient_dob"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Age"/}}&nbsp;{{include tmpl="#tpx_patient_Age"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_blood_group"/}}&nbsp;{{include tmpl="#tpx_patient_blood_group"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_mobile_no"/}}&nbsp;{{include tmpl="#tpx_patient_mobile_no"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_occupation"/}}&nbsp;{{include tmpl="#tpx_patient_occupation"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spouse Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_title"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_title"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_first_name"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_first_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_middle_name"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_middle_name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_last_name"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_last_name"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_gender"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_gender"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_dob"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_dob"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_Age"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_Age"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_blood_group"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_blood_group"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_mobile_no"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_mobile_no"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_occupation"/}}&nbsp;{{include tmpl="#tpx_patient_spouse_occupation"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Address</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_street"/}}&nbsp;{{include tmpl="#tpx_patient_street"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_town"/}}&nbsp;{{include tmpl="#tpx_patient_town"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_province"/}}&nbsp;{{include tmpl="#tpx_patient_province"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Passport"/}}&nbsp;{{include tmpl="#tpx_patient_Passport"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_country"/}}&nbsp;{{include tmpl="#tpx_patient_country"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_postal_code"/}}&nbsp;{{include tmpl="#tpx_patient_postal_code"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmail"/}}&nbsp;{{include tmpl="#tpx_patient_PEmail"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_VisaNo"/}}&nbsp;{{include tmpl="#tpx_patient_VisaNo"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#7D3C98">
				<h3 class="card-title">Patient Other Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_IdentificationMark"/}}&nbsp;{{include tmpl="#tpx_patient_IdentificationMark"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Religion"/}}&nbsp;{{include tmpl="#tpx_patient_Religion"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Nationality"/}}&nbsp;{{include tmpl="#tpx_patient_Nationality"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_profilePic"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">
<input hidden type="text" id="screenshotFF" name="screenshotFF" value="">
					</span>
				  </div>
<div id="screenshot" style="text-align:center;">
  <video class="videostream" autoplay></video>
  <img id="screenshot-img"  name="screenshot-img">
<div class="row">  
<p  id="capture-button"  name="capture-button" class="col-4 capture-button btn btn-primary btn-block">Capture video</p>
<p id="screenshot-button"  name="screenshot-button" class="col-4 btn btn-success btn-block"  disabled>Take screenshot</p>
</div>
</div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Maritalstatus"/}}&nbsp;{{include tmpl="#tpx_patient_Maritalstatus"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Business"/}}&nbsp;{{include tmpl="#tpx_patient_Business"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Patient_Language"/}}&nbsp;{{include tmpl="#tpx_patient_Patient_Language"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmergencyContact"/}}&nbsp;{{include tmpl="#tpx_patient_PEmergencyContact"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_description"/}}&nbsp;{{include tmpl="#tpx_patient_description"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_WhatsApp"/}}&nbsp;{{include tmpl="#tpx_patient_WhatsApp"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_FacebookID"/}}&nbsp;{{include tmpl="#tpx_patient_FacebookID"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#1F618D">
				<h3 class="card-title">Refered By.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferedByDr"/}}&nbsp;{{include tmpl="#tpx_patient_ReferedByDr"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferClinicname"/}}&nbsp;{{include tmpl="#tpx_patient_ReferClinicname"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferCity"/}}&nbsp;{{include tmpl="#tpx_patient_ReferCity"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferMobileNo"/}}&nbsp;{{include tmpl="#tpx_patient_ReferMobileNo"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferA4TreatingConsultant"/}}&nbsp;{{include tmpl="#tpx_patient_ReferA4TreatingConsultant"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PurposreReferredfor"/}}&nbsp;{{include tmpl="#tpx_patient_PurposreReferredfor"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Where Did You Hear About This</h3>
			</div>
			<div class="card-body">
			{{include tmpl="#tpc_patient_WhereDidYouHear"/}}&nbsp;{{include tmpl="#tpx_patient_WhereDidYouHear"/}}
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("patient_address", explode(",", $patient->getCurrentDetailTable())) && $patient_address->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_email", explode(",", $patient->getCurrentDetailTable())) && $patient_email->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_telephone", explode(",", $patient->getCurrentDetailTable())) && $patient_telephone->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_emergency_contact", explode(",", $patient->getCurrentDetailTable())) && $patient_emergency_contact->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_emergency_contact", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emergency_contactgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_document", explode(",", $patient->getCurrentDetailTable())) && $patient_document->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_documentgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient->Rows) ?> };
ew.applyTemplate("tpd_patientview", "tpm_patientview", "patientview", "<?php echo $patient->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patientview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_view->terminate();
?>