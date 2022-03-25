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
<?php include_once "header.php"; ?>
<?php if (!$patient_view->isExport()) { ?>
<script>
var fpatientview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatientview = currentForm = new ew.Form("fpatientview", "view");
	loadjs.done("fpatientview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient">
<input type="hidden" name="modal" value="<?php echo (int)$patient_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_id"><script id="tpc_patient_id" type="text/html"><?php echo $patient_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_view->id->cellAttributes() ?>>
<script id="tpx_patient_id" type="text/html"><span id="el_patient_id">
<span<?php echo $patient_view->id->viewAttributes() ?>><?php echo $patient_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PatientID"><script id="tpc_patient_PatientID" type="text/html"><?php echo $patient_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $patient_view->PatientID->cellAttributes() ?>>
<script id="tpx_patient_PatientID" type="text/html"><span id="el_patient_PatientID">
<span<?php echo $patient_view->PatientID->viewAttributes() ?>><?php echo $patient_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->title->Visible) { // title ?>
	<tr id="r_title">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_title"><script id="tpc_patient_title" type="text/html"><?php echo $patient_view->title->caption() ?></script></span></td>
		<td data-name="title" <?php echo $patient_view->title->cellAttributes() ?>>
<script id="tpx_patient_title" type="text/html"><span id="el_patient_title">
<span<?php echo $patient_view->title->viewAttributes() ?>><?php echo $patient_view->title->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->first_name->Visible) { // first_name ?>
	<tr id="r_first_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_first_name"><script id="tpc_patient_first_name" type="text/html"><?php echo $patient_view->first_name->caption() ?></script></span></td>
		<td data-name="first_name" <?php echo $patient_view->first_name->cellAttributes() ?>>
<script id="tpx_patient_first_name" type="text/html"><span id="el_patient_first_name">
<span<?php echo $patient_view->first_name->viewAttributes() ?>><?php echo $patient_view->first_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->middle_name->Visible) { // middle_name ?>
	<tr id="r_middle_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_middle_name"><script id="tpc_patient_middle_name" type="text/html"><?php echo $patient_view->middle_name->caption() ?></script></span></td>
		<td data-name="middle_name" <?php echo $patient_view->middle_name->cellAttributes() ?>>
<script id="tpx_patient_middle_name" type="text/html"><span id="el_patient_middle_name">
<span<?php echo $patient_view->middle_name->viewAttributes() ?>><?php echo $patient_view->middle_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->last_name->Visible) { // last_name ?>
	<tr id="r_last_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_last_name"><script id="tpc_patient_last_name" type="text/html"><?php echo $patient_view->last_name->caption() ?></script></span></td>
		<td data-name="last_name" <?php echo $patient_view->last_name->cellAttributes() ?>>
<script id="tpx_patient_last_name" type="text/html"><span id="el_patient_last_name">
<span<?php echo $patient_view->last_name->viewAttributes() ?>><?php echo $patient_view->last_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_gender"><script id="tpc_patient_gender" type="text/html"><?php echo $patient_view->gender->caption() ?></script></span></td>
		<td data-name="gender" <?php echo $patient_view->gender->cellAttributes() ?>>
<script id="tpx_patient_gender" type="text/html"><span id="el_patient_gender">
<span<?php echo $patient_view->gender->viewAttributes() ?>><?php echo $patient_view->gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->dob->Visible) { // dob ?>
	<tr id="r_dob">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_dob"><script id="tpc_patient_dob" type="text/html"><?php echo $patient_view->dob->caption() ?></script></span></td>
		<td data-name="dob" <?php echo $patient_view->dob->cellAttributes() ?>>
<script id="tpx_patient_dob" type="text/html"><span id="el_patient_dob">
<span<?php echo $patient_view->dob->viewAttributes() ?>><?php echo $patient_view->dob->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Age"><script id="tpc_patient_Age" type="text/html"><?php echo $patient_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $patient_view->Age->cellAttributes() ?>>
<script id="tpx_patient_Age" type="text/html"><span id="el_patient_Age">
<span<?php echo $patient_view->Age->viewAttributes() ?>><?php echo $patient_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->blood_group->Visible) { // blood_group ?>
	<tr id="r_blood_group">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_blood_group"><script id="tpc_patient_blood_group" type="text/html"><?php echo $patient_view->blood_group->caption() ?></script></span></td>
		<td data-name="blood_group" <?php echo $patient_view->blood_group->cellAttributes() ?>>
<script id="tpx_patient_blood_group" type="text/html"><span id="el_patient_blood_group">
<span<?php echo $patient_view->blood_group->viewAttributes() ?>><?php echo $patient_view->blood_group->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->mobile_no->Visible) { // mobile_no ?>
	<tr id="r_mobile_no">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_mobile_no"><script id="tpc_patient_mobile_no" type="text/html"><?php echo $patient_view->mobile_no->caption() ?></script></span></td>
		<td data-name="mobile_no" <?php echo $patient_view->mobile_no->cellAttributes() ?>>
<script id="tpx_patient_mobile_no" type="text/html"><span id="el_patient_mobile_no">
<span<?php echo $patient_view->mobile_no->viewAttributes() ?>><?php echo $patient_view->mobile_no->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_description"><script id="tpc_patient_description" type="text/html"><?php echo $patient_view->description->caption() ?></script></span></td>
		<td data-name="description" <?php echo $patient_view->description->cellAttributes() ?>>
<script id="tpx_patient_description" type="text/html"><span id="el_patient_description">
<span<?php echo $patient_view->description->viewAttributes() ?>><?php echo $patient_view->description->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_status"><script id="tpc_patient_status" type="text/html"><?php echo $patient_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $patient_view->status->cellAttributes() ?>>
<script id="tpx_patient_status" type="text/html"><span id="el_patient_status">
<span<?php echo $patient_view->status->viewAttributes() ?>><?php echo $patient_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_createdby"><script id="tpc_patient_createdby" type="text/html"><?php echo $patient_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $patient_view->createdby->cellAttributes() ?>>
<script id="tpx_patient_createdby" type="text/html"><span id="el_patient_createdby">
<span<?php echo $patient_view->createdby->viewAttributes() ?>><?php echo $patient_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_createddatetime"><script id="tpc_patient_createddatetime" type="text/html"><?php echo $patient_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $patient_view->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_createddatetime" type="text/html"><span id="el_patient_createddatetime">
<span<?php echo $patient_view->createddatetime->viewAttributes() ?>><?php echo $patient_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_modifiedby"><script id="tpc_patient_modifiedby" type="text/html"><?php echo $patient_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $patient_view->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_modifiedby" type="text/html"><span id="el_patient_modifiedby">
<span<?php echo $patient_view->modifiedby->viewAttributes() ?>><?php echo $patient_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_modifieddatetime"><script id="tpc_patient_modifieddatetime" type="text/html"><?php echo $patient_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_modifieddatetime" type="text/html"><span id="el_patient_modifieddatetime">
<span<?php echo $patient_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_profilePic"><script id="tpc_patient_profilePic" type="text/html"><?php echo $patient_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $patient_view->profilePic->cellAttributes() ?>>
<script id="tpx_patient_profilePic" type="text/html"><span id="el_patient_profilePic">
<span><?php echo GetFileViewTag($patient_view->profilePic, $patient_view->profilePic->getViewValue(), FALSE) ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->IdentificationMark->Visible) { // IdentificationMark ?>
	<tr id="r_IdentificationMark">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_IdentificationMark"><script id="tpc_patient_IdentificationMark" type="text/html"><?php echo $patient_view->IdentificationMark->caption() ?></script></span></td>
		<td data-name="IdentificationMark" <?php echo $patient_view->IdentificationMark->cellAttributes() ?>>
<script id="tpx_patient_IdentificationMark" type="text/html"><span id="el_patient_IdentificationMark">
<span<?php echo $patient_view->IdentificationMark->viewAttributes() ?>><?php echo $patient_view->IdentificationMark->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Religion->Visible) { // Religion ?>
	<tr id="r_Religion">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Religion"><script id="tpc_patient_Religion" type="text/html"><?php echo $patient_view->Religion->caption() ?></script></span></td>
		<td data-name="Religion" <?php echo $patient_view->Religion->cellAttributes() ?>>
<script id="tpx_patient_Religion" type="text/html"><span id="el_patient_Religion">
<span<?php echo $patient_view->Religion->viewAttributes() ?>><?php echo $patient_view->Religion->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Nationality->Visible) { // Nationality ?>
	<tr id="r_Nationality">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Nationality"><script id="tpc_patient_Nationality" type="text/html"><?php echo $patient_view->Nationality->caption() ?></script></span></td>
		<td data-name="Nationality" <?php echo $patient_view->Nationality->cellAttributes() ?>>
<script id="tpx_patient_Nationality" type="text/html"><span id="el_patient_Nationality">
<span<?php echo $patient_view->Nationality->viewAttributes() ?>><?php echo $patient_view->Nationality->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferedByDr"><script id="tpc_patient_ReferedByDr" type="text/html"><?php echo $patient_view->ReferedByDr->caption() ?></script></span></td>
		<td data-name="ReferedByDr" <?php echo $patient_view->ReferedByDr->cellAttributes() ?>>
<script id="tpx_patient_ReferedByDr" type="text/html"><span id="el_patient_ReferedByDr">
<span<?php echo $patient_view->ReferedByDr->viewAttributes() ?>><?php echo $patient_view->ReferedByDr->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferClinicname"><script id="tpc_patient_ReferClinicname" type="text/html"><?php echo $patient_view->ReferClinicname->caption() ?></script></span></td>
		<td data-name="ReferClinicname" <?php echo $patient_view->ReferClinicname->cellAttributes() ?>>
<script id="tpx_patient_ReferClinicname" type="text/html"><span id="el_patient_ReferClinicname">
<span<?php echo $patient_view->ReferClinicname->viewAttributes() ?>><?php echo $patient_view->ReferClinicname->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferCity"><script id="tpc_patient_ReferCity" type="text/html"><?php echo $patient_view->ReferCity->caption() ?></script></span></td>
		<td data-name="ReferCity" <?php echo $patient_view->ReferCity->cellAttributes() ?>>
<script id="tpx_patient_ReferCity" type="text/html"><span id="el_patient_ReferCity">
<span<?php echo $patient_view->ReferCity->viewAttributes() ?>><?php echo $patient_view->ReferCity->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferMobileNo"><script id="tpc_patient_ReferMobileNo" type="text/html"><?php echo $patient_view->ReferMobileNo->caption() ?></script></span></td>
		<td data-name="ReferMobileNo" <?php echo $patient_view->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_patient_ReferMobileNo" type="text/html"><span id="el_patient_ReferMobileNo">
<span<?php echo $patient_view->ReferMobileNo->viewAttributes() ?>><?php echo $patient_view->ReferMobileNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ReferA4TreatingConsultant"><script id="tpc_patient_ReferA4TreatingConsultant" type="text/html"><?php echo $patient_view->ReferA4TreatingConsultant->caption() ?></script></span></td>
		<td data-name="ReferA4TreatingConsultant" <?php echo $patient_view->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_patient_ReferA4TreatingConsultant" type="text/html"><span id="el_patient_ReferA4TreatingConsultant">
<span<?php echo $patient_view->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $patient_view->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PurposreReferredfor"><script id="tpc_patient_PurposreReferredfor" type="text/html"><?php echo $patient_view->PurposreReferredfor->caption() ?></script></span></td>
		<td data-name="PurposreReferredfor" <?php echo $patient_view->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_patient_PurposreReferredfor" type="text/html"><span id="el_patient_PurposreReferredfor">
<span<?php echo $patient_view->PurposreReferredfor->viewAttributes() ?>><?php echo $patient_view->PurposreReferredfor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_title->Visible) { // spouse_title ?>
	<tr id="r_spouse_title">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_title"><script id="tpc_patient_spouse_title" type="text/html"><?php echo $patient_view->spouse_title->caption() ?></script></span></td>
		<td data-name="spouse_title" <?php echo $patient_view->spouse_title->cellAttributes() ?>>
<script id="tpx_patient_spouse_title" type="text/html"><span id="el_patient_spouse_title">
<span<?php echo $patient_view->spouse_title->viewAttributes() ?>><?php echo $patient_view->spouse_title->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_first_name->Visible) { // spouse_first_name ?>
	<tr id="r_spouse_first_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_first_name"><script id="tpc_patient_spouse_first_name" type="text/html"><?php echo $patient_view->spouse_first_name->caption() ?></script></span></td>
		<td data-name="spouse_first_name" <?php echo $patient_view->spouse_first_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_first_name" type="text/html"><span id="el_patient_spouse_first_name">
<span<?php echo $patient_view->spouse_first_name->viewAttributes() ?>><?php echo $patient_view->spouse_first_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_middle_name->Visible) { // spouse_middle_name ?>
	<tr id="r_spouse_middle_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_middle_name"><script id="tpc_patient_spouse_middle_name" type="text/html"><?php echo $patient_view->spouse_middle_name->caption() ?></script></span></td>
		<td data-name="spouse_middle_name" <?php echo $patient_view->spouse_middle_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_middle_name" type="text/html"><span id="el_patient_spouse_middle_name">
<span<?php echo $patient_view->spouse_middle_name->viewAttributes() ?>><?php echo $patient_view->spouse_middle_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_last_name->Visible) { // spouse_last_name ?>
	<tr id="r_spouse_last_name">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_last_name"><script id="tpc_patient_spouse_last_name" type="text/html"><?php echo $patient_view->spouse_last_name->caption() ?></script></span></td>
		<td data-name="spouse_last_name" <?php echo $patient_view->spouse_last_name->cellAttributes() ?>>
<script id="tpx_patient_spouse_last_name" type="text/html"><span id="el_patient_spouse_last_name">
<span<?php echo $patient_view->spouse_last_name->viewAttributes() ?>><?php echo $patient_view->spouse_last_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_gender->Visible) { // spouse_gender ?>
	<tr id="r_spouse_gender">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_gender"><script id="tpc_patient_spouse_gender" type="text/html"><?php echo $patient_view->spouse_gender->caption() ?></script></span></td>
		<td data-name="spouse_gender" <?php echo $patient_view->spouse_gender->cellAttributes() ?>>
<script id="tpx_patient_spouse_gender" type="text/html"><span id="el_patient_spouse_gender">
<span<?php echo $patient_view->spouse_gender->viewAttributes() ?>><?php echo $patient_view->spouse_gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_dob->Visible) { // spouse_dob ?>
	<tr id="r_spouse_dob">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_dob"><script id="tpc_patient_spouse_dob" type="text/html"><?php echo $patient_view->spouse_dob->caption() ?></script></span></td>
		<td data-name="spouse_dob" <?php echo $patient_view->spouse_dob->cellAttributes() ?>>
<script id="tpx_patient_spouse_dob" type="text/html"><span id="el_patient_spouse_dob">
<span<?php echo $patient_view->spouse_dob->viewAttributes() ?>><?php echo $patient_view->spouse_dob->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_Age->Visible) { // spouse_Age ?>
	<tr id="r_spouse_Age">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_Age"><script id="tpc_patient_spouse_Age" type="text/html"><?php echo $patient_view->spouse_Age->caption() ?></script></span></td>
		<td data-name="spouse_Age" <?php echo $patient_view->spouse_Age->cellAttributes() ?>>
<script id="tpx_patient_spouse_Age" type="text/html"><span id="el_patient_spouse_Age">
<span<?php echo $patient_view->spouse_Age->viewAttributes() ?>><?php echo $patient_view->spouse_Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_blood_group->Visible) { // spouse_blood_group ?>
	<tr id="r_spouse_blood_group">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_blood_group"><script id="tpc_patient_spouse_blood_group" type="text/html"><?php echo $patient_view->spouse_blood_group->caption() ?></script></span></td>
		<td data-name="spouse_blood_group" <?php echo $patient_view->spouse_blood_group->cellAttributes() ?>>
<script id="tpx_patient_spouse_blood_group" type="text/html"><span id="el_patient_spouse_blood_group">
<span<?php echo $patient_view->spouse_blood_group->viewAttributes() ?>><?php echo $patient_view->spouse_blood_group->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
	<tr id="r_spouse_mobile_no">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_mobile_no"><script id="tpc_patient_spouse_mobile_no" type="text/html"><?php echo $patient_view->spouse_mobile_no->caption() ?></script></span></td>
		<td data-name="spouse_mobile_no" <?php echo $patient_view->spouse_mobile_no->cellAttributes() ?>>
<script id="tpx_patient_spouse_mobile_no" type="text/html"><span id="el_patient_spouse_mobile_no">
<span<?php echo $patient_view->spouse_mobile_no->viewAttributes() ?>><?php echo $patient_view->spouse_mobile_no->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Maritalstatus->Visible) { // Maritalstatus ?>
	<tr id="r_Maritalstatus">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Maritalstatus"><script id="tpc_patient_Maritalstatus" type="text/html"><?php echo $patient_view->Maritalstatus->caption() ?></script></span></td>
		<td data-name="Maritalstatus" <?php echo $patient_view->Maritalstatus->cellAttributes() ?>>
<script id="tpx_patient_Maritalstatus" type="text/html"><span id="el_patient_Maritalstatus">
<span<?php echo $patient_view->Maritalstatus->viewAttributes() ?>><?php echo $patient_view->Maritalstatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Business->Visible) { // Business ?>
	<tr id="r_Business">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Business"><script id="tpc_patient_Business" type="text/html"><?php echo $patient_view->Business->caption() ?></script></span></td>
		<td data-name="Business" <?php echo $patient_view->Business->cellAttributes() ?>>
<script id="tpx_patient_Business" type="text/html"><span id="el_patient_Business">
<span<?php echo $patient_view->Business->viewAttributes() ?>><?php echo $patient_view->Business->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Patient_Language->Visible) { // Patient_Language ?>
	<tr id="r_Patient_Language">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Patient_Language"><script id="tpc_patient_Patient_Language" type="text/html"><?php echo $patient_view->Patient_Language->caption() ?></script></span></td>
		<td data-name="Patient_Language" <?php echo $patient_view->Patient_Language->cellAttributes() ?>>
<script id="tpx_patient_Patient_Language" type="text/html"><span id="el_patient_Patient_Language">
<span<?php echo $patient_view->Patient_Language->viewAttributes() ?>><?php echo $patient_view->Patient_Language->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Passport->Visible) { // Passport ?>
	<tr id="r_Passport">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Passport"><script id="tpc_patient_Passport" type="text/html"><?php echo $patient_view->Passport->caption() ?></script></span></td>
		<td data-name="Passport" <?php echo $patient_view->Passport->cellAttributes() ?>>
<script id="tpx_patient_Passport" type="text/html"><span id="el_patient_Passport">
<span<?php echo $patient_view->Passport->viewAttributes() ?>><?php echo $patient_view->Passport->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->VisaNo->Visible) { // VisaNo ?>
	<tr id="r_VisaNo">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_VisaNo"><script id="tpc_patient_VisaNo" type="text/html"><?php echo $patient_view->VisaNo->caption() ?></script></span></td>
		<td data-name="VisaNo" <?php echo $patient_view->VisaNo->cellAttributes() ?>>
<script id="tpx_patient_VisaNo" type="text/html"><span id="el_patient_VisaNo">
<span<?php echo $patient_view->VisaNo->viewAttributes() ?>><?php echo $patient_view->VisaNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->ValidityOfVisa->Visible) { // ValidityOfVisa ?>
	<tr id="r_ValidityOfVisa">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_ValidityOfVisa"><script id="tpc_patient_ValidityOfVisa" type="text/html"><?php echo $patient_view->ValidityOfVisa->caption() ?></script></span></td>
		<td data-name="ValidityOfVisa" <?php echo $patient_view->ValidityOfVisa->cellAttributes() ?>>
<script id="tpx_patient_ValidityOfVisa" type="text/html"><span id="el_patient_ValidityOfVisa">
<span<?php echo $patient_view->ValidityOfVisa->viewAttributes() ?>><?php echo $patient_view->ValidityOfVisa->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<tr id="r_WhereDidYouHear">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_WhereDidYouHear"><script id="tpc_patient_WhereDidYouHear" type="text/html"><?php echo $patient_view->WhereDidYouHear->caption() ?></script></span></td>
		<td data-name="WhereDidYouHear" <?php echo $patient_view->WhereDidYouHear->cellAttributes() ?>>
<script id="tpx_patient_WhereDidYouHear" type="text/html"><span id="el_patient_WhereDidYouHear">
<span<?php echo $patient_view->WhereDidYouHear->viewAttributes() ?>><?php echo $patient_view->WhereDidYouHear->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_HospID"><script id="tpc_patient_HospID" type="text/html"><?php echo $patient_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $patient_view->HospID->cellAttributes() ?>>
<script id="tpx_patient_HospID" type="text/html"><span id="el_patient_HospID">
<span<?php echo $patient_view->HospID->viewAttributes() ?>><?php echo $patient_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->street->Visible) { // street ?>
	<tr id="r_street">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_street"><script id="tpc_patient_street" type="text/html"><?php echo $patient_view->street->caption() ?></script></span></td>
		<td data-name="street" <?php echo $patient_view->street->cellAttributes() ?>>
<script id="tpx_patient_street" type="text/html"><span id="el_patient_street">
<span<?php echo $patient_view->street->viewAttributes() ?>><?php echo $patient_view->street->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->town->Visible) { // town ?>
	<tr id="r_town">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_town"><script id="tpc_patient_town" type="text/html"><?php echo $patient_view->town->caption() ?></script></span></td>
		<td data-name="town" <?php echo $patient_view->town->cellAttributes() ?>>
<script id="tpx_patient_town" type="text/html"><span id="el_patient_town">
<span<?php echo $patient_view->town->viewAttributes() ?>><?php echo $patient_view->town->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->province->Visible) { // province ?>
	<tr id="r_province">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_province"><script id="tpc_patient_province" type="text/html"><?php echo $patient_view->province->caption() ?></script></span></td>
		<td data-name="province" <?php echo $patient_view->province->cellAttributes() ?>>
<script id="tpx_patient_province" type="text/html"><span id="el_patient_province">
<span<?php echo $patient_view->province->viewAttributes() ?>><?php echo $patient_view->province->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_country"><script id="tpc_patient_country" type="text/html"><?php echo $patient_view->country->caption() ?></script></span></td>
		<td data-name="country" <?php echo $patient_view->country->cellAttributes() ?>>
<script id="tpx_patient_country" type="text/html"><span id="el_patient_country">
<span<?php echo $patient_view->country->viewAttributes() ?>><?php echo $patient_view->country->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->postal_code->Visible) { // postal_code ?>
	<tr id="r_postal_code">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_postal_code"><script id="tpc_patient_postal_code" type="text/html"><?php echo $patient_view->postal_code->caption() ?></script></span></td>
		<td data-name="postal_code" <?php echo $patient_view->postal_code->cellAttributes() ?>>
<script id="tpx_patient_postal_code" type="text/html"><span id="el_patient_postal_code">
<span<?php echo $patient_view->postal_code->viewAttributes() ?>><?php echo $patient_view->postal_code->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->PEmail->Visible) { // PEmail ?>
	<tr id="r_PEmail">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PEmail"><script id="tpc_patient_PEmail" type="text/html"><?php echo $patient_view->PEmail->caption() ?></script></span></td>
		<td data-name="PEmail" <?php echo $patient_view->PEmail->cellAttributes() ?>>
<script id="tpx_patient_PEmail" type="text/html"><span id="el_patient_PEmail">
<span<?php echo $patient_view->PEmail->viewAttributes() ?>><?php echo $patient_view->PEmail->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->PEmergencyContact->Visible) { // PEmergencyContact ?>
	<tr id="r_PEmergencyContact">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_PEmergencyContact"><script id="tpc_patient_PEmergencyContact" type="text/html"><?php echo $patient_view->PEmergencyContact->caption() ?></script></span></td>
		<td data-name="PEmergencyContact" <?php echo $patient_view->PEmergencyContact->cellAttributes() ?>>
<script id="tpx_patient_PEmergencyContact" type="text/html"><span id="el_patient_PEmergencyContact">
<span<?php echo $patient_view->PEmergencyContact->viewAttributes() ?>><?php echo $patient_view->PEmergencyContact->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->occupation->Visible) { // occupation ?>
	<tr id="r_occupation">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_occupation"><script id="tpc_patient_occupation" type="text/html"><?php echo $patient_view->occupation->caption() ?></script></span></td>
		<td data-name="occupation" <?php echo $patient_view->occupation->cellAttributes() ?>>
<script id="tpx_patient_occupation" type="text/html"><span id="el_patient_occupation">
<span<?php echo $patient_view->occupation->viewAttributes() ?>><?php echo $patient_view->occupation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->spouse_occupation->Visible) { // spouse_occupation ?>
	<tr id="r_spouse_occupation">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_spouse_occupation"><script id="tpc_patient_spouse_occupation" type="text/html"><?php echo $patient_view->spouse_occupation->caption() ?></script></span></td>
		<td data-name="spouse_occupation" <?php echo $patient_view->spouse_occupation->cellAttributes() ?>>
<script id="tpx_patient_spouse_occupation" type="text/html"><span id="el_patient_spouse_occupation">
<span<?php echo $patient_view->spouse_occupation->viewAttributes() ?>><?php echo $patient_view->spouse_occupation->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->WhatsApp->Visible) { // WhatsApp ?>
	<tr id="r_WhatsApp">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_WhatsApp"><script id="tpc_patient_WhatsApp" type="text/html"><?php echo $patient_view->WhatsApp->caption() ?></script></span></td>
		<td data-name="WhatsApp" <?php echo $patient_view->WhatsApp->cellAttributes() ?>>
<script id="tpx_patient_WhatsApp" type="text/html"><span id="el_patient_WhatsApp">
<span<?php echo $patient_view->WhatsApp->viewAttributes() ?>><?php echo $patient_view->WhatsApp->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->CouppleID->Visible) { // CouppleID ?>
	<tr id="r_CouppleID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_CouppleID"><script id="tpc_patient_CouppleID" type="text/html"><?php echo $patient_view->CouppleID->caption() ?></script></span></td>
		<td data-name="CouppleID" <?php echo $patient_view->CouppleID->cellAttributes() ?>>
<script id="tpx_patient_CouppleID" type="text/html"><span id="el_patient_CouppleID">
<span<?php echo $patient_view->CouppleID->viewAttributes() ?>><?php echo $patient_view->CouppleID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->MaleID->Visible) { // MaleID ?>
	<tr id="r_MaleID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_MaleID"><script id="tpc_patient_MaleID" type="text/html"><?php echo $patient_view->MaleID->caption() ?></script></span></td>
		<td data-name="MaleID" <?php echo $patient_view->MaleID->cellAttributes() ?>>
<script id="tpx_patient_MaleID" type="text/html"><span id="el_patient_MaleID">
<span<?php echo $patient_view->MaleID->viewAttributes() ?>><?php echo $patient_view->MaleID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->FemaleID->Visible) { // FemaleID ?>
	<tr id="r_FemaleID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_FemaleID"><script id="tpc_patient_FemaleID" type="text/html"><?php echo $patient_view->FemaleID->caption() ?></script></span></td>
		<td data-name="FemaleID" <?php echo $patient_view->FemaleID->cellAttributes() ?>>
<script id="tpx_patient_FemaleID" type="text/html"><span id="el_patient_FemaleID">
<span<?php echo $patient_view->FemaleID->viewAttributes() ?>><?php echo $patient_view->FemaleID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->GroupID->Visible) { // GroupID ?>
	<tr id="r_GroupID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_GroupID"><script id="tpc_patient_GroupID" type="text/html"><?php echo $patient_view->GroupID->caption() ?></script></span></td>
		<td data-name="GroupID" <?php echo $patient_view->GroupID->cellAttributes() ?>>
<script id="tpx_patient_GroupID" type="text/html"><span id="el_patient_GroupID">
<span<?php echo $patient_view->GroupID->viewAttributes() ?>><?php echo $patient_view->GroupID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->Relationship->Visible) { // Relationship ?>
	<tr id="r_Relationship">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_Relationship"><script id="tpc_patient_Relationship" type="text/html"><?php echo $patient_view->Relationship->caption() ?></script></span></td>
		<td data-name="Relationship" <?php echo $patient_view->Relationship->cellAttributes() ?>>
<script id="tpx_patient_Relationship" type="text/html"><span id="el_patient_Relationship">
<span<?php echo $patient_view->Relationship->viewAttributes() ?>><?php echo $patient_view->Relationship->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->AppointmentSearch->Visible) { // AppointmentSearch ?>
	<tr id="r_AppointmentSearch">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_AppointmentSearch"><script id="tpc_patient_AppointmentSearch" type="text/html"><?php echo $patient_view->AppointmentSearch->caption() ?></script></span></td>
		<td data-name="AppointmentSearch" <?php echo $patient_view->AppointmentSearch->cellAttributes() ?>>
<script id="tpx_patient_AppointmentSearch" type="text/html"><span id="el_patient_AppointmentSearch">
<span<?php echo $patient_view->AppointmentSearch->viewAttributes() ?>><?php echo $patient_view->AppointmentSearch->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_view->FacebookID->Visible) { // FacebookID ?>
	<tr id="r_FacebookID">
		<td class="<?php echo $patient_view->TableLeftColumnClass ?>"><span id="elh_patient_FacebookID"><script id="tpc_patient_FacebookID" type="text/html"><?php echo $patient_view->FacebookID->caption() ?></script></span></td>
		<td data-name="FacebookID" <?php echo $patient_view->FacebookID->cellAttributes() ?>>
<script id="tpx_patient_FacebookID" type="text/html"><span id="el_patient_FacebookID">
<span<?php echo $patient_view->FacebookID->viewAttributes() ?>><?php echo $patient_view->FacebookID->getViewValue() ?></span>
</span></script>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_patient_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PatientID")/}}</h3>
	</div>
	<div class="col-4">
	</div>
	<div class="col-4">
		<h3 class="card-title">
			{{include tmpl="#tpc_patient_AppointmentSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_AppointmentSearch")/}}
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_title"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_title")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_first_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_first_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_middle_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_middle_name")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_last_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_last_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_gender")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_dob")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Age")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_blood_group"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_blood_group")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_mobile_no"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_mobile_no")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_occupation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_occupation")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_title"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_title")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_first_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_first_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_middle_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_middle_name")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_last_name"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_last_name")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_gender")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_dob"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_dob")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_Age")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_blood_group"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_blood_group")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_mobile_no"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_mobile_no")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_spouse_occupation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_spouse_occupation")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_street"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_street")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_town"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_town")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_province"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_province")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_country"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_country")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_postal_code"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_postal_code")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmail"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PEmail")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_IdentificationMark"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_IdentificationMark")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Religion"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Religion")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Nationality"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Nationality")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_profilePic")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_Maritalstatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Maritalstatus")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Business"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Business")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_Patient_Language"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_Patient_Language")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PEmergencyContact"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PEmergencyContact")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_description"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_description")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_WhatsApp"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_WhatsApp")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_FacebookID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_FacebookID")/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferedByDr"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferedByDr")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferClinicname"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferClinicname")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferCity"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferCity")/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferMobileNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferMobileNo")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_ReferA4TreatingConsultant"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_ReferA4TreatingConsultant")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_patient_PurposreReferredfor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_PurposreReferredfor")/}}</span>
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
			{{include tmpl="#tpc_patient_WhereDidYouHear"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_WhereDidYouHear")/}}
			</div>
		</div>
	</div>
</div>
</div>
</script>

<?php
	if (in_array("patient_address", explode(",", $patient->getCurrentDetailTable())) && $patient_address->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_address", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_addressgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_email", explode(",", $patient->getCurrentDetailTable())) && $patient_email->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_email", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emailgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_telephone", explode(",", $patient->getCurrentDetailTable())) && $patient_telephone->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_telephone", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_telephonegrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_emergency_contact", explode(",", $patient->getCurrentDetailTable())) && $patient_emergency_contact->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_emergency_contact", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_emergency_contactgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_document", explode(",", $patient->getCurrentDetailTable())) && $patient_document->DetailView) {
?>
<?php if ($patient->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_document", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_documentgrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient->Rows) ?> };
	ew.applyTemplate("tpd_patientview", "tpm_patientview", "patientview", "<?php echo $patient->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patientview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_view->isExport()) { ?>
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
$patient_view->terminate();
?>