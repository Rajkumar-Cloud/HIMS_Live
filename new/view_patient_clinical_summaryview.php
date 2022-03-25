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
$view_patient_clinical_summary_view = new view_patient_clinical_summary_view();

// Run the page
$view_patient_clinical_summary_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_clinical_summary_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_patient_clinical_summary_view->isExport()) { ?>
<script>
var fview_patient_clinical_summaryview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_patient_clinical_summaryview = currentForm = new ew.Form("fview_patient_clinical_summaryview", "view");
	loadjs.done("fview_patient_clinical_summaryview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_patient_clinical_summary_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_patient_clinical_summary_view->ExportOptions->render("body") ?>
<?php $view_patient_clinical_summary_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_patient_clinical_summary_view->showPageHeader(); ?>
<?php
$view_patient_clinical_summary_view->showMessage();
?>
<form name="fview_patient_clinical_summaryview" id="fview_patient_clinical_summaryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_clinical_summary">
<input type="hidden" name="modal" value="<?php echo (int)$view_patient_clinical_summary_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_patient_clinical_summary_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_id"><script id="tpc_view_patient_clinical_summary_id" type="text/html"><?php echo $view_patient_clinical_summary_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_patient_clinical_summary_view->id->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_id" type="text/html"><span id="el_view_patient_clinical_summary_id">
<span<?php echo $view_patient_clinical_summary_view->id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_PatientID"><script id="tpc_view_patient_clinical_summary_PatientID" type="text/html"><?php echo $view_patient_clinical_summary_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $view_patient_clinical_summary_view->PatientID->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_PatientID" type="text/html"><span id="el_view_patient_clinical_summary_PatientID">
<span<?php echo $view_patient_clinical_summary_view->PatientID->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_HospID"><script id="tpc_view_patient_clinical_summary_HospID" type="text/html"><?php echo $view_patient_clinical_summary_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_patient_clinical_summary_view->HospID->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_HospID" type="text/html"><span id="el_view_patient_clinical_summary_HospID">
<span<?php echo $view_patient_clinical_summary_view->HospID->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_mrnNo"><script id="tpc_view_patient_clinical_summary_mrnNo" type="text/html"><?php echo $view_patient_clinical_summary_view->mrnNo->caption() ?></script></span></td>
		<td data-name="mrnNo" <?php echo $view_patient_clinical_summary_view->mrnNo->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_mrnNo" type="text/html"><span id="el_view_patient_clinical_summary_mrnNo">
<span<?php echo $view_patient_clinical_summary_view->mrnNo->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->mrnNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_patient_id"><script id="tpc_view_patient_clinical_summary_patient_id" type="text/html"><?php echo $view_patient_clinical_summary_view->patient_id->caption() ?></script></span></td>
		<td data-name="patient_id" <?php echo $view_patient_clinical_summary_view->patient_id->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_patient_id" type="text/html"><span id="el_view_patient_clinical_summary_patient_id">
<span<?php echo $view_patient_clinical_summary_view->patient_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->patient_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_patient_name"><script id="tpc_view_patient_clinical_summary_patient_name" type="text/html"><?php echo $view_patient_clinical_summary_view->patient_name->caption() ?></script></span></td>
		<td data-name="patient_name" <?php echo $view_patient_clinical_summary_view->patient_name->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_patient_name" type="text/html"><span id="el_view_patient_clinical_summary_patient_name">
<span<?php echo $view_patient_clinical_summary_view->patient_name->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->patient_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_profilePic"><script id="tpc_view_patient_clinical_summary_profilePic" type="text/html"><?php echo $view_patient_clinical_summary_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $view_patient_clinical_summary_view->profilePic->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_profilePic" type="text/html"><span id="el_view_patient_clinical_summary_profilePic">
<span<?php echo $view_patient_clinical_summary_view->profilePic->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_gender"><script id="tpc_view_patient_clinical_summary_gender" type="text/html"><?php echo $view_patient_clinical_summary_view->gender->caption() ?></script></span></td>
		<td data-name="gender" <?php echo $view_patient_clinical_summary_view->gender->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_gender" type="text/html"><span id="el_view_patient_clinical_summary_gender">
<span<?php echo $view_patient_clinical_summary_view->gender->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_age"><script id="tpc_view_patient_clinical_summary_age" type="text/html"><?php echo $view_patient_clinical_summary_view->age->caption() ?></script></span></td>
		<td data-name="age" <?php echo $view_patient_clinical_summary_view->age->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_age" type="text/html"><span id="el_view_patient_clinical_summary_age">
<span<?php echo $view_patient_clinical_summary_view->age->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_physician_id"><script id="tpc_view_patient_clinical_summary_physician_id" type="text/html"><?php echo $view_patient_clinical_summary_view->physician_id->caption() ?></script></span></td>
		<td data-name="physician_id" <?php echo $view_patient_clinical_summary_view->physician_id->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_physician_id" type="text/html"><span id="el_view_patient_clinical_summary_physician_id">
<span<?php echo $view_patient_clinical_summary_view->physician_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->physician_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_typeRegsisteration"><script id="tpc_view_patient_clinical_summary_typeRegsisteration" type="text/html"><?php echo $view_patient_clinical_summary_view->typeRegsisteration->caption() ?></script></span></td>
		<td data-name="typeRegsisteration" <?php echo $view_patient_clinical_summary_view->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_typeRegsisteration" type="text/html"><span id="el_view_patient_clinical_summary_typeRegsisteration">
<span<?php echo $view_patient_clinical_summary_view->typeRegsisteration->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->typeRegsisteration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_PaymentCategory"><script id="tpc_view_patient_clinical_summary_PaymentCategory" type="text/html"><?php echo $view_patient_clinical_summary_view->PaymentCategory->caption() ?></script></span></td>
		<td data-name="PaymentCategory" <?php echo $view_patient_clinical_summary_view->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_PaymentCategory" type="text/html"><span id="el_view_patient_clinical_summary_PaymentCategory">
<span<?php echo $view_patient_clinical_summary_view->PaymentCategory->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->PaymentCategory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_admission_consultant_id"><script id="tpc_view_patient_clinical_summary_admission_consultant_id" type="text/html"><?php echo $view_patient_clinical_summary_view->admission_consultant_id->caption() ?></script></span></td>
		<td data-name="admission_consultant_id" <?php echo $view_patient_clinical_summary_view->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_admission_consultant_id" type="text/html"><span id="el_view_patient_clinical_summary_admission_consultant_id">
<span<?php echo $view_patient_clinical_summary_view->admission_consultant_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->admission_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_leading_consultant_id"><script id="tpc_view_patient_clinical_summary_leading_consultant_id" type="text/html"><?php echo $view_patient_clinical_summary_view->leading_consultant_id->caption() ?></script></span></td>
		<td data-name="leading_consultant_id" <?php echo $view_patient_clinical_summary_view->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_leading_consultant_id" type="text/html"><span id="el_view_patient_clinical_summary_leading_consultant_id">
<span<?php echo $view_patient_clinical_summary_view->leading_consultant_id->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->leading_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_cause"><script id="tpc_view_patient_clinical_summary_cause" type="text/html"><?php echo $view_patient_clinical_summary_view->cause->caption() ?></script></span></td>
		<td data-name="cause" <?php echo $view_patient_clinical_summary_view->cause->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_cause" type="text/html"><span id="el_view_patient_clinical_summary_cause">
<span<?php echo $view_patient_clinical_summary_view->cause->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->cause->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_admission_date"><script id="tpc_view_patient_clinical_summary_admission_date" type="text/html"><?php echo $view_patient_clinical_summary_view->admission_date->caption() ?></script></span></td>
		<td data-name="admission_date" <?php echo $view_patient_clinical_summary_view->admission_date->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_admission_date" type="text/html"><span id="el_view_patient_clinical_summary_admission_date">
<span<?php echo $view_patient_clinical_summary_view->admission_date->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->admission_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_release_date"><script id="tpc_view_patient_clinical_summary_release_date" type="text/html"><?php echo $view_patient_clinical_summary_view->release_date->caption() ?></script></span></td>
		<td data-name="release_date" <?php echo $view_patient_clinical_summary_view->release_date->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_release_date" type="text/html"><span id="el_view_patient_clinical_summary_release_date">
<span<?php echo $view_patient_clinical_summary_view->release_date->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->release_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_PaymentStatus"><script id="tpc_view_patient_clinical_summary_PaymentStatus" type="text/html"><?php echo $view_patient_clinical_summary_view->PaymentStatus->caption() ?></script></span></td>
		<td data-name="PaymentStatus" <?php echo $view_patient_clinical_summary_view->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_PaymentStatus" type="text/html"><span id="el_view_patient_clinical_summary_PaymentStatus">
<span<?php echo $view_patient_clinical_summary_view->PaymentStatus->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->PaymentStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_status"><script id="tpc_view_patient_clinical_summary_status" type="text/html"><?php echo $view_patient_clinical_summary_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $view_patient_clinical_summary_view->status->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_status" type="text/html"><span id="el_view_patient_clinical_summary_status">
<span<?php echo $view_patient_clinical_summary_view->status->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_createdby"><script id="tpc_view_patient_clinical_summary_createdby" type="text/html"><?php echo $view_patient_clinical_summary_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_patient_clinical_summary_view->createdby->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_createdby" type="text/html"><span id="el_view_patient_clinical_summary_createdby">
<span<?php echo $view_patient_clinical_summary_view->createdby->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_createddatetime"><script id="tpc_view_patient_clinical_summary_createddatetime" type="text/html"><?php echo $view_patient_clinical_summary_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_patient_clinical_summary_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_createddatetime" type="text/html"><span id="el_view_patient_clinical_summary_createddatetime">
<span<?php echo $view_patient_clinical_summary_view->createddatetime->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_modifiedby"><script id="tpc_view_patient_clinical_summary_modifiedby" type="text/html"><?php echo $view_patient_clinical_summary_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_patient_clinical_summary_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_modifiedby" type="text/html"><span id="el_view_patient_clinical_summary_modifiedby">
<span<?php echo $view_patient_clinical_summary_view->modifiedby->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_modifieddatetime"><script id="tpc_view_patient_clinical_summary_modifieddatetime" type="text/html"><?php echo $view_patient_clinical_summary_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_patient_clinical_summary_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_modifieddatetime" type="text/html"><span id="el_view_patient_clinical_summary_modifieddatetime">
<span<?php echo $view_patient_clinical_summary_view->modifieddatetime->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->provisional_diagnosis->Visible) { // provisional_diagnosis ?>
	<tr id="r_provisional_diagnosis">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_provisional_diagnosis"><script id="tpc_view_patient_clinical_summary_provisional_diagnosis" type="text/html"><?php echo $view_patient_clinical_summary_view->provisional_diagnosis->caption() ?></script></span></td>
		<td data-name="provisional_diagnosis" <?php echo $view_patient_clinical_summary_view->provisional_diagnosis->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_provisional_diagnosis" type="text/html"><span id="el_view_patient_clinical_summary_provisional_diagnosis">
<span<?php echo $view_patient_clinical_summary_view->provisional_diagnosis->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->provisional_diagnosis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->Treatments->Visible) { // Treatments ?>
	<tr id="r_Treatments">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_Treatments"><script id="tpc_view_patient_clinical_summary_Treatments" type="text/html"><?php echo $view_patient_clinical_summary_view->Treatments->caption() ?></script></span></td>
		<td data-name="Treatments" <?php echo $view_patient_clinical_summary_view->Treatments->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_Treatments" type="text/html"><span id="el_view_patient_clinical_summary_Treatments">
<span<?php echo $view_patient_clinical_summary_view->Treatments->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->Treatments->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<tr id="r_FinalDiagnosis">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_FinalDiagnosis"><script id="tpc_view_patient_clinical_summary_FinalDiagnosis" type="text/html"><?php echo $view_patient_clinical_summary_view->FinalDiagnosis->caption() ?></script></span></td>
		<td data-name="FinalDiagnosis" <?php echo $view_patient_clinical_summary_view->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_FinalDiagnosis" type="text/html"><span id="el_view_patient_clinical_summary_FinalDiagnosis">
<span<?php echo $view_patient_clinical_summary_view->FinalDiagnosis->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->FinalDiagnosis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->courseinhospital->Visible) { // courseinhospital ?>
	<tr id="r_courseinhospital">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_courseinhospital"><script id="tpc_view_patient_clinical_summary_courseinhospital" type="text/html"><?php echo $view_patient_clinical_summary_view->courseinhospital->caption() ?></script></span></td>
		<td data-name="courseinhospital" <?php echo $view_patient_clinical_summary_view->courseinhospital->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_courseinhospital" type="text/html"><span id="el_view_patient_clinical_summary_courseinhospital">
<span<?php echo $view_patient_clinical_summary_view->courseinhospital->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->courseinhospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_procedurenotes"><script id="tpc_view_patient_clinical_summary_procedurenotes" type="text/html"><?php echo $view_patient_clinical_summary_view->procedurenotes->caption() ?></script></span></td>
		<td data-name="procedurenotes" <?php echo $view_patient_clinical_summary_view->procedurenotes->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_procedurenotes" type="text/html"><span id="el_view_patient_clinical_summary_procedurenotes">
<span<?php echo $view_patient_clinical_summary_view->procedurenotes->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->procedurenotes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->conditionatdischarge->Visible) { // conditionatdischarge ?>
	<tr id="r_conditionatdischarge">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_conditionatdischarge"><script id="tpc_view_patient_clinical_summary_conditionatdischarge" type="text/html"><?php echo $view_patient_clinical_summary_view->conditionatdischarge->caption() ?></script></span></td>
		<td data-name="conditionatdischarge" <?php echo $view_patient_clinical_summary_view->conditionatdischarge->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_conditionatdischarge" type="text/html"><span id="el_view_patient_clinical_summary_conditionatdischarge">
<span<?php echo $view_patient_clinical_summary_view->conditionatdischarge->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->conditionatdischarge->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_BP"><script id="tpc_view_patient_clinical_summary_BP" type="text/html"><?php echo $view_patient_clinical_summary_view->BP->caption() ?></script></span></td>
		<td data-name="BP" <?php echo $view_patient_clinical_summary_view->BP->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_BP" type="text/html"><span id="el_view_patient_clinical_summary_BP">
<span<?php echo $view_patient_clinical_summary_view->BP->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->BP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_Pulse"><script id="tpc_view_patient_clinical_summary_Pulse" type="text/html"><?php echo $view_patient_clinical_summary_view->Pulse->caption() ?></script></span></td>
		<td data-name="Pulse" <?php echo $view_patient_clinical_summary_view->Pulse->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_Pulse" type="text/html"><span id="el_view_patient_clinical_summary_Pulse">
<span<?php echo $view_patient_clinical_summary_view->Pulse->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->Pulse->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->Resp->Visible) { // Resp ?>
	<tr id="r_Resp">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_Resp"><script id="tpc_view_patient_clinical_summary_Resp" type="text/html"><?php echo $view_patient_clinical_summary_view->Resp->caption() ?></script></span></td>
		<td data-name="Resp" <?php echo $view_patient_clinical_summary_view->Resp->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_Resp" type="text/html"><span id="el_view_patient_clinical_summary_Resp">
<span<?php echo $view_patient_clinical_summary_view->Resp->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->Resp->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->SPO2->Visible) { // SPO2 ?>
	<tr id="r_SPO2">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_SPO2"><script id="tpc_view_patient_clinical_summary_SPO2" type="text/html"><?php echo $view_patient_clinical_summary_view->SPO2->caption() ?></script></span></td>
		<td data-name="SPO2" <?php echo $view_patient_clinical_summary_view->SPO2->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_SPO2" type="text/html"><span id="el_view_patient_clinical_summary_SPO2">
<span<?php echo $view_patient_clinical_summary_view->SPO2->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->SPO2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->FollowupAdvice->Visible) { // FollowupAdvice ?>
	<tr id="r_FollowupAdvice">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_FollowupAdvice"><script id="tpc_view_patient_clinical_summary_FollowupAdvice" type="text/html"><?php echo $view_patient_clinical_summary_view->FollowupAdvice->caption() ?></script></span></td>
		<td data-name="FollowupAdvice" <?php echo $view_patient_clinical_summary_view->FollowupAdvice->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_FollowupAdvice" type="text/html"><span id="el_view_patient_clinical_summary_FollowupAdvice">
<span<?php echo $view_patient_clinical_summary_view->FollowupAdvice->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->FollowupAdvice->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_NextReviewDate"><script id="tpc_view_patient_clinical_summary_NextReviewDate" type="text/html"><?php echo $view_patient_clinical_summary_view->NextReviewDate->caption() ?></script></span></td>
		<td data-name="NextReviewDate" <?php echo $view_patient_clinical_summary_view->NextReviewDate->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_NextReviewDate" type="text/html"><span id="el_view_patient_clinical_summary_NextReviewDate">
<span<?php echo $view_patient_clinical_summary_view->NextReviewDate->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->NextReviewDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->History->Visible) { // History ?>
	<tr id="r_History">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_History"><script id="tpc_view_patient_clinical_summary_History" type="text/html"><?php echo $view_patient_clinical_summary_view->History->caption() ?></script></span></td>
		<td data-name="History" <?php echo $view_patient_clinical_summary_view->History->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_History" type="text/html"><span id="el_view_patient_clinical_summary_History">
<span<?php echo $view_patient_clinical_summary_view->History->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->History->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_clinical_summary_view->vitals->Visible) { // vitals ?>
	<tr id="r_vitals">
		<td class="<?php echo $view_patient_clinical_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_clinical_summary_vitals"><script id="tpc_view_patient_clinical_summary_vitals" type="text/html"><?php echo $view_patient_clinical_summary_view->vitals->caption() ?></script></span></td>
		<td data-name="vitals" <?php echo $view_patient_clinical_summary_view->vitals->cellAttributes() ?>>
<script id="tpx_view_patient_clinical_summary_vitals" type="text/html"><span id="el_view_patient_clinical_summary_vitals">
<span<?php echo $view_patient_clinical_summary_view->vitals->viewAttributes() ?>><?php echo $view_patient_clinical_summary_view->vitals->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_patient_clinical_summaryview" class="ew-custom-template"></div>
<script id="tpm_view_patient_clinical_summaryview" type="text/html">
<div id="ct_view_patient_clinical_summary_view"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php
 $Reception = $Page->id->CurrentValue;
 $patient_id = $Page->patient_id->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patient_id."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	 $bloodgroup =  $row["blood_group"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
  $sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$Page->physician_id->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 	 $rs->MoveNext();
 }
 $aa = "ewbarcode.php?data=".$Page->patient_id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 ?>	
 <div style="width:100%">
<font face = "calibre" >
<h2 align="center">CLINICAL SUMMARY</h2>
<font size="4" style="font-weight: bold;">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>Patient Name: {{:patient_name}}</td>
			<td align="right"><?php $originalDate = $Page->release_date->CurrentValue;  echo   date("F j, Y", strtotime($originalDate)) ;  ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Gender: {{:gender}}</td>
			<td align="right">Consultant: <?php echo $DrName; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Age: {{:age}}</td>
			<td align="right">Patient ID: {{:PatientID}}</td>
		</tr>
		<tr>
			<td style='width:50%;'>Contact No: <?php echo $mobile_no; ?></td>
			<td align="right"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
</font>
<svg height="1" width="100%">
  <line x1="0" y1="0" x2="100%" y2="0" style="stroke:rgb(0,0,0);stroke-width:2" />
</svg>
<font size="4">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:280px;'><font size="4" style="font-weight: bold;">Address</td>
			<td>:</font> <?php echo $address ; ?></td>
		</tr>
		<tr>
			<td><font size="4" style="font-weight: bold;">Date of Admission	</td>
			<td>:</font>  <?php
				if($Page->admission_date->CurrentValue != '')
				{
					$originalDate = $Page->admission_date->CurrentValue;
					$newDate = date("d/m/Y H:i:s", strtotime($originalDate));
					echo  $newDate;
				} ?> 	</td>
		</tr>
		<tr>
			<td><font size="4" style="font-weight: bold;">Date of Discharge</td>
			<td>: </font>  <?php
					if($Page->release_date->CurrentValue != '' )
					{
						$originalDate = $Page->release_date->CurrentValue;
						$newDate = date("d/m/Y H:i:s", strtotime($originalDate));
						echo  $newDate;
					}?> 
			</td>
		</tr>
																																																																																																<?php
if($PEmail != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">E Mail	</td><td> : </font>'. $PEmail .  ' </td></tr>';
}
if($IdentificationMark != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Identification Mark	</td><td> : </font>'. $IdentificationMark .  ' </td></tr>';
}
if($bloodgroup != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Blood Group	</td><td> : </font>'. $bloodgroup .  ' </td></tr>';
}
$Reception = $Page->id->CurrentValue;
$patient_id = $Page->patient_id->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where PId='".$patient_id."' and Reception='".$Reception."'; ";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
	$PatOTid =  $row["id"];
	$diagnosis =  $row["diagnosis"];
	$proposedSurgery =  $row["proposedSurgery"];
	$surgeryProcedure =  $row["surgeryProcedure"];
	$typeOfAnaesthesia =  $row["typeOfAnaesthesia"];
	$surgeryStarted =  $row["surgeryStarted"];
	$Surgeon =  $row["Surgeon"];
	$Anaesthetist =  $row["Anaesthetist"];
	$AsstSurgeon1 =  $row["AsstSurgeon1"];
	$AsstSurgeon2 =  $row["AsstSurgeon2"];
	$paediatric =  $row["paediatric"];
	$rs->MoveNext();
}
if($PatOTid == '')
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where PId='".$patient_id."' and Reception='".$Reception."'; ";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
	$PatOTid =  $row["id"];
	$diagnosis =  $row["diagnosis"];
	$proposedSurgery =  $row["proposedSurgery"];
	$surgeryProcedure =  $row["surgeryProcedure"];
	$typeOfAnaesthesia =  $row["typeOfAnaesthesia"];
	$surgeryStarted =  $row["surgeryStarted"];
	$Surgeon =  $row["Surgeon"];
	$Anaesthetist =  $row["Anaesthetist"];
	$AsstSurgeon1 =  $row["AsstSurgeon1"];
	$AsstSurgeon2 =  $row["AsstSurgeon2"];
	$paediatric =  $row["paediatric"];
	$rs->MoveNext();
}
}
if($surgeryStarted != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Surgery Date	</td><td> : </font>'. $surgeryStarted .  ' </td></tr>';
}
if($Surgeon != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Surgeon	</td><td> : </font>'. $Surgeon .  ' </td></tr>';
}
if($Anaesthetist != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Anaesthetist	</td><td> : </font>'. $Anaesthetist .  '</td></tr>';
}
if($AsstSurgeon1 != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">AsstSurgeon	</td><td> : </font>'. $AsstSurgeon1 .  '</td></tr>';
}
if($AsstSurgeon2 != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">AsstSurgeon	</td><td> : </font>'. $AsstSurgeon2 .  ' </td></tr>';
}
if($paediatric != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Paediatric	</td><td> : </font>'. $paediatric .  ' </td></tr>';
}
if($diagnosis != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Diagnosis	</td><td> : </font>'. $diagnosis .  ' </td></tr>';
}
if($proposedSurgery != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Proposed Surgery	</td><td> : </font>'. $proposedSurgery .  ' </td></tr>';
}
if($surgeryProcedure != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Surgery Procedure	</td><td> : </font>'. $surgeryProcedure .  ' </td></tr>';
}
if($typeOfAnaesthesia != '')
{
	echo '<tr><td><font size="4" style="font-weight: bold;">Type Of Anaesthesia	</td><td> : </font>'. $typeOfAnaesthesia .  ' </td></tr>';
}
																																																												?>  
<?php echo $Page->History->CurrentValue; ?>
	</tbody>
</table>
<p><?php echo $Page->vitals->CurrentValue; ?></p>
<p>
<?php if($Page->provisional_diagnosis->CurrentValue != '')
 {
   echo '<font size="4" style="font-weight: bold;">Provisional Diagnosis	: </font>'. $Page->provisional_diagnosis->CurrentValue ;
 }
 ?>
</p>
<p>
<?php
if($Page->Treatments->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Treatments	: </font>'. $Page->Treatments->CurrentValue ;
}
?>
</p>
<p>
<?php
if($Page->FinalDiagnosis->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Final Diagnosis	: </font>'. $Page->FinalDiagnosis->CurrentValue ;
}
?>
</p>
<p>
<?php
if($Page->procedurenotes->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Procedure Notes	: </font>'. $Page->procedurenotes->CurrentValue ;
}
?>
</p>
<p>
<?php
if($Page->courseinhospital->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Course In Hospital	: </font>'. $Page->courseinhospital->CurrentValue ;
}
?>
</p>
<p>
<?php
if($Page->conditionatdischarge->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Condition at Discharge	: </font>'. $Page->conditionatdischarge->CurrentValue ;
}
?>
</p>
<p>
<?php
$pageDisVitals = "";
if($Page->BP->CurrentValue != '')
{
$pageDisVitals .= '<td><b>BP : ' . $Page->BP->CurrentValue . ' mm of Hg</b></td>' ;
}
if($Page->Pulse->CurrentValue != '')
{
$pageDisVitals .= '<td><b>Pulse : ' . $Page->Pulse->CurrentValue . ' mints.</b></td>' ;
}
if($Page->Resp->CurrentValue != '')
{
$pageDisVitals .= '<td><b>Resp : ' . $Page->Resp->CurrentValue . '</b></td>' ;
}
if($Page->SPO2->CurrentValue != '')
{
$pageDisVitals .= '<td><b>SPO2 :' . $Page->SPO2->CurrentValue . '</b></td>' ;
}
if($pageDisVitals != '')
{
  echo   '<font size="4" style="font-weight: bold;">Discharge Vitals :</font><table class="table table-striped ew-table ew-export-table" width="100%"><tr>'. $pageDisVitals .'</tr></table> ';
}
?>
</p>
</tr>
</table> 
<font size="4">
<b><?php
					  $originalDate = $Page->NextReviewDate->CurrentValue;
					  $newDate = date("d/m/Y", strtotime($originalDate));

					//  echo  $newDate;
$tt = "ewbarcode.php?data=".$Page->mrnNo->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
					  ?>  </b>
</font>
<p align="right">
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p>
<br><br>
<font size="4" style="font-weight: bold;">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'></td>
			<td align="right"> ( <?php echo $DrName; ?> )</td>
		</tr>
		<tr>
			<td style='width:50%;'>Signature of the patient</td>
			<td align="right">Consultant Signature</td>
		</tr>
	</tbody>
</table>
</font>	
</font>
</font>
</div>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_patient_clinical_summary->Rows) ?> };
	ew.applyTemplate("tpd_view_patient_clinical_summaryview", "tpm_view_patient_clinical_summaryview", "view_patient_clinical_summaryview", "<?php echo $view_patient_clinical_summary->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_patient_clinical_summaryview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_patient_clinical_summary_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_patient_clinical_summary_view->isExport()) { ?>
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
$view_patient_clinical_summary_view->terminate();
?>