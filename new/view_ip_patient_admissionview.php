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
$view_ip_patient_admission_view = new view_ip_patient_admission_view();

// Run the page
$view_ip_patient_admission_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_patient_admission_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ip_patient_admission_view->isExport()) { ?>
<script>
var fview_ip_patient_admissionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_ip_patient_admissionview = currentForm = new ew.Form("fview_ip_patient_admissionview", "view");
	loadjs.done("fview_ip_patient_admissionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_ip_patient_admission_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ip_patient_admission_view->ExportOptions->render("body") ?>
<?php $view_ip_patient_admission_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ip_patient_admission_view->showPageHeader(); ?>
<?php
$view_ip_patient_admission_view->showMessage();
?>
<form name="fview_ip_patient_admissionview" id="fview_ip_patient_admissionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_patient_admission_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_patient_admission_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_id"><script id="tpc_view_ip_patient_admission_id" type="text/html"><?php echo $view_ip_patient_admission_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_ip_patient_admission_view->id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_id" type="text/html"><span id="el_view_ip_patient_admission_id">
<span<?php echo $view_ip_patient_admission_view->id->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mrnNo"><script id="tpc_view_ip_patient_admission_mrnNo" type="text/html"><?php echo $view_ip_patient_admission_view->mrnNo->caption() ?></script></span></td>
		<td data-name="mrnNo" <?php echo $view_ip_patient_admission_view->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mrnNo" type="text/html"><span id="el_view_ip_patient_admission_mrnNo">
<span<?php echo $view_ip_patient_admission_view->mrnNo->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->mrnNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PatientID"><script id="tpc_view_ip_patient_admission_PatientID" type="text/html"><?php echo $view_ip_patient_admission_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $view_ip_patient_admission_view->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PatientID" type="text/html"><span id="el_view_ip_patient_admission_PatientID">
<span<?php echo $view_ip_patient_admission_view->PatientID->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_name"><script id="tpc_view_ip_patient_admission_patient_name" type="text/html"><?php echo $view_ip_patient_admission_view->patient_name->caption() ?></script></span></td>
		<td data-name="patient_name" <?php echo $view_ip_patient_admission_view->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_name" type="text/html"><span id="el_view_ip_patient_admission_patient_name">
<span<?php echo $view_ip_patient_admission_view->patient_name->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->patient_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->mobileno->Visible) { // mobileno ?>
	<tr id="r_mobileno">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mobileno"><script id="tpc_view_ip_patient_admission_mobileno" type="text/html"><?php echo $view_ip_patient_admission_view->mobileno->caption() ?></script></span></td>
		<td data-name="mobileno" <?php echo $view_ip_patient_admission_view->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mobileno" type="text/html"><span id="el_view_ip_patient_admission_mobileno">
<span<?php echo $view_ip_patient_admission_view->mobileno->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->mobileno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_profilePic"><script id="tpc_view_ip_patient_admission_profilePic" type="text/html"><?php echo $view_ip_patient_admission_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $view_ip_patient_admission_view->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_profilePic" type="text/html"><span id="el_view_ip_patient_admission_profilePic">
<span<?php echo $view_ip_patient_admission_view->profilePic->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_gender"><script id="tpc_view_ip_patient_admission_gender" type="text/html"><?php echo $view_ip_patient_admission_view->gender->caption() ?></script></span></td>
		<td data-name="gender" <?php echo $view_ip_patient_admission_view->gender->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_gender" type="text/html"><span id="el_view_ip_patient_admission_gender">
<span<?php echo $view_ip_patient_admission_view->gender->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_age"><script id="tpc_view_ip_patient_admission_age" type="text/html"><?php echo $view_ip_patient_admission_view->age->caption() ?></script></span></td>
		<td data-name="age" <?php echo $view_ip_patient_admission_view->age->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_age" type="text/html"><span id="el_view_ip_patient_admission_age">
<span<?php echo $view_ip_patient_admission_view->age->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->Package->Visible) { // Package ?>
	<tr id="r_Package">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Package"><script id="tpc_view_ip_patient_admission_Package" type="text/html"><?php echo $view_ip_patient_admission_view->Package->caption() ?></script></span></td>
		<td data-name="Package" <?php echo $view_ip_patient_admission_view->Package->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Package" type="text/html"><span id="el_view_ip_patient_admission_Package">
<span<?php echo $view_ip_patient_admission_view->Package->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->Package->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_typeRegsisteration"><script id="tpc_view_ip_patient_admission_typeRegsisteration" type="text/html"><?php echo $view_ip_patient_admission_view->typeRegsisteration->caption() ?></script></span></td>
		<td data-name="typeRegsisteration" <?php echo $view_ip_patient_admission_view->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_typeRegsisteration" type="text/html"><span id="el_view_ip_patient_admission_typeRegsisteration">
<span<?php echo $view_ip_patient_admission_view->typeRegsisteration->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->typeRegsisteration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentCategory"><script id="tpc_view_ip_patient_admission_PaymentCategory" type="text/html"><?php echo $view_ip_patient_admission_view->PaymentCategory->caption() ?></script></span></td>
		<td data-name="PaymentCategory" <?php echo $view_ip_patient_admission_view->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentCategory" type="text/html"><span id="el_view_ip_patient_admission_PaymentCategory">
<span<?php echo $view_ip_patient_admission_view->PaymentCategory->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PaymentCategory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_consultant_id"><script id="tpc_view_ip_patient_admission_admission_consultant_id" type="text/html"><?php echo $view_ip_patient_admission_view->admission_consultant_id->caption() ?></script></span></td>
		<td data-name="admission_consultant_id" <?php echo $view_ip_patient_admission_view->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_consultant_id" type="text/html"><span id="el_view_ip_patient_admission_admission_consultant_id">
<span<?php echo $view_ip_patient_admission_view->admission_consultant_id->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->admission_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_leading_consultant_id"><script id="tpc_view_ip_patient_admission_leading_consultant_id" type="text/html"><?php echo $view_ip_patient_admission_view->leading_consultant_id->caption() ?></script></span></td>
		<td data-name="leading_consultant_id" <?php echo $view_ip_patient_admission_view->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_leading_consultant_id" type="text/html"><span id="el_view_ip_patient_admission_leading_consultant_id">
<span<?php echo $view_ip_patient_admission_view->leading_consultant_id->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->leading_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_cause"><script id="tpc_view_ip_patient_admission_cause" type="text/html"><?php echo $view_ip_patient_admission_view->cause->caption() ?></script></span></td>
		<td data-name="cause" <?php echo $view_ip_patient_admission_view->cause->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_cause" type="text/html"><span id="el_view_ip_patient_admission_cause">
<span<?php echo $view_ip_patient_admission_view->cause->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->cause->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_date"><script id="tpc_view_ip_patient_admission_admission_date" type="text/html"><?php echo $view_ip_patient_admission_view->admission_date->caption() ?></script></span></td>
		<td data-name="admission_date" <?php echo $view_ip_patient_admission_view->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_date" type="text/html"><span id="el_view_ip_patient_admission_admission_date">
<span<?php echo $view_ip_patient_admission_view->admission_date->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->admission_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_release_date"><script id="tpc_view_ip_patient_admission_release_date" type="text/html"><?php echo $view_ip_patient_admission_view->release_date->caption() ?></script></span></td>
		<td data-name="release_date" <?php echo $view_ip_patient_admission_view->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_release_date" type="text/html"><span id="el_view_ip_patient_admission_release_date">
<span<?php echo $view_ip_patient_admission_view->release_date->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->release_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentStatus"><script id="tpc_view_ip_patient_admission_PaymentStatus" type="text/html"><?php echo $view_ip_patient_admission_view->PaymentStatus->caption() ?></script></span></td>
		<td data-name="PaymentStatus" <?php echo $view_ip_patient_admission_view->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentStatus" type="text/html"><span id="el_view_ip_patient_admission_PaymentStatus">
<span<?php echo $view_ip_patient_admission_view->PaymentStatus->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PaymentStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_status"><script id="tpc_view_ip_patient_admission_status" type="text/html"><?php echo $view_ip_patient_admission_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $view_ip_patient_admission_view->status->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_status" type="text/html"><span id="el_view_ip_patient_admission_status">
<span<?php echo $view_ip_patient_admission_view->status->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createdby"><script id="tpc_view_ip_patient_admission_createdby" type="text/html"><?php echo $view_ip_patient_admission_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_ip_patient_admission_view->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_createdby" type="text/html"><span id="el_view_ip_patient_admission_createdby">
<span<?php echo $view_ip_patient_admission_view->createdby->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createddatetime"><script id="tpc_view_ip_patient_admission_createddatetime" type="text/html"><?php echo $view_ip_patient_admission_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_ip_patient_admission_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_createddatetime" type="text/html"><span id="el_view_ip_patient_admission_createddatetime">
<span<?php echo $view_ip_patient_admission_view->createddatetime->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifiedby"><script id="tpc_view_ip_patient_admission_modifiedby" type="text/html"><?php echo $view_ip_patient_admission_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_ip_patient_admission_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_modifiedby" type="text/html"><span id="el_view_ip_patient_admission_modifiedby">
<span<?php echo $view_ip_patient_admission_view->modifiedby->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifieddatetime"><script id="tpc_view_ip_patient_admission_modifieddatetime" type="text/html"><?php echo $view_ip_patient_admission_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_ip_patient_admission_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_modifieddatetime" type="text/html"><span id="el_view_ip_patient_admission_modifieddatetime">
<span<?php echo $view_ip_patient_admission_view->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_HospID"><script id="tpc_view_ip_patient_admission_HospID" type="text/html"><?php echo $view_ip_patient_admission_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_ip_patient_admission_view->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_HospID" type="text/html"><span id="el_view_ip_patient_admission_HospID">
<span<?php echo $view_ip_patient_admission_view->HospID->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferedByDr"><script id="tpc_view_ip_patient_admission_ReferedByDr" type="text/html"><?php echo $view_ip_patient_admission_view->ReferedByDr->caption() ?></script></span></td>
		<td data-name="ReferedByDr" <?php echo $view_ip_patient_admission_view->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferedByDr" type="text/html"><span id="el_view_ip_patient_admission_ReferedByDr">
<span<?php echo $view_ip_patient_admission_view->ReferedByDr->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ReferedByDr->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferClinicname"><script id="tpc_view_ip_patient_admission_ReferClinicname" type="text/html"><?php echo $view_ip_patient_admission_view->ReferClinicname->caption() ?></script></span></td>
		<td data-name="ReferClinicname" <?php echo $view_ip_patient_admission_view->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferClinicname" type="text/html"><span id="el_view_ip_patient_admission_ReferClinicname">
<span<?php echo $view_ip_patient_admission_view->ReferClinicname->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ReferClinicname->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferCity"><script id="tpc_view_ip_patient_admission_ReferCity" type="text/html"><?php echo $view_ip_patient_admission_view->ReferCity->caption() ?></script></span></td>
		<td data-name="ReferCity" <?php echo $view_ip_patient_admission_view->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferCity" type="text/html"><span id="el_view_ip_patient_admission_ReferCity">
<span<?php echo $view_ip_patient_admission_view->ReferCity->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ReferCity->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferMobileNo"><script id="tpc_view_ip_patient_admission_ReferMobileNo" type="text/html"><?php echo $view_ip_patient_admission_view->ReferMobileNo->caption() ?></script></span></td>
		<td data-name="ReferMobileNo" <?php echo $view_ip_patient_admission_view->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferMobileNo" type="text/html"><span id="el_view_ip_patient_admission_ReferMobileNo">
<span<?php echo $view_ip_patient_admission_view->ReferMobileNo->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ReferMobileNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferA4TreatingConsultant"><script id="tpc_view_ip_patient_admission_ReferA4TreatingConsultant" type="text/html"><?php echo $view_ip_patient_admission_view->ReferA4TreatingConsultant->caption() ?></script></span></td>
		<td data-name="ReferA4TreatingConsultant" <?php echo $view_ip_patient_admission_view->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferA4TreatingConsultant" type="text/html"><span id="el_view_ip_patient_admission_ReferA4TreatingConsultant">
<span<?php echo $view_ip_patient_admission_view->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PurposreReferredfor"><script id="tpc_view_ip_patient_admission_PurposreReferredfor" type="text/html"><?php echo $view_ip_patient_admission_view->PurposreReferredfor->caption() ?></script></span></td>
		<td data-name="PurposreReferredfor" <?php echo $view_ip_patient_admission_view->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PurposreReferredfor" type="text/html"><span id="el_view_ip_patient_admission_PurposreReferredfor">
<span<?php echo $view_ip_patient_admission_view->PurposreReferredfor->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PurposreReferredfor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->BillClosing->Visible) { // BillClosing ?>
	<tr id="r_BillClosing">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosing"><script id="tpc_view_ip_patient_admission_BillClosing" type="text/html"><?php echo $view_ip_patient_admission_view->BillClosing->caption() ?></script></span></td>
		<td data-name="BillClosing" <?php echo $view_ip_patient_admission_view->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosing" type="text/html"><span id="el_view_ip_patient_admission_BillClosing">
<span<?php echo $view_ip_patient_admission_view->BillClosing->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->BillClosing->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->BillClosingDate->Visible) { // BillClosingDate ?>
	<tr id="r_BillClosingDate">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosingDate"><script id="tpc_view_ip_patient_admission_BillClosingDate" type="text/html"><?php echo $view_ip_patient_admission_view->BillClosingDate->caption() ?></script></span></td>
		<td data-name="BillClosingDate" <?php echo $view_ip_patient_admission_view->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosingDate" type="text/html"><span id="el_view_ip_patient_admission_BillClosingDate">
<span<?php echo $view_ip_patient_admission_view->BillClosingDate->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->BillClosingDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillNumber"><script id="tpc_view_ip_patient_admission_BillNumber" type="text/html"><?php echo $view_ip_patient_admission_view->BillNumber->caption() ?></script></span></td>
		<td data-name="BillNumber" <?php echo $view_ip_patient_admission_view->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillNumber" type="text/html"><span id="el_view_ip_patient_admission_BillNumber">
<span<?php echo $view_ip_patient_admission_view->BillNumber->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->BillNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ClosingAmount->Visible) { // ClosingAmount ?>
	<tr id="r_ClosingAmount">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingAmount"><script id="tpc_view_ip_patient_admission_ClosingAmount" type="text/html"><?php echo $view_ip_patient_admission_view->ClosingAmount->caption() ?></script></span></td>
		<td data-name="ClosingAmount" <?php echo $view_ip_patient_admission_view->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingAmount" type="text/html"><span id="el_view_ip_patient_admission_ClosingAmount">
<span<?php echo $view_ip_patient_admission_view->ClosingAmount->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ClosingAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ClosingType->Visible) { // ClosingType ?>
	<tr id="r_ClosingType">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingType"><script id="tpc_view_ip_patient_admission_ClosingType" type="text/html"><?php echo $view_ip_patient_admission_view->ClosingType->caption() ?></script></span></td>
		<td data-name="ClosingType" <?php echo $view_ip_patient_admission_view->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingType" type="text/html"><span id="el_view_ip_patient_admission_ClosingType">
<span<?php echo $view_ip_patient_admission_view->ClosingType->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ClosingType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->BillAmount->Visible) { // BillAmount ?>
	<tr id="r_BillAmount">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillAmount"><script id="tpc_view_ip_patient_admission_BillAmount" type="text/html"><?php echo $view_ip_patient_admission_view->BillAmount->caption() ?></script></span></td>
		<td data-name="BillAmount" <?php echo $view_ip_patient_admission_view->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillAmount" type="text/html"><span id="el_view_ip_patient_admission_BillAmount">
<span<?php echo $view_ip_patient_admission_view->BillAmount->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->BillAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->billclosedBy->Visible) { // billclosedBy ?>
	<tr id="r_billclosedBy">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_billclosedBy"><script id="tpc_view_ip_patient_admission_billclosedBy" type="text/html"><?php echo $view_ip_patient_admission_view->billclosedBy->caption() ?></script></span></td>
		<td data-name="billclosedBy" <?php echo $view_ip_patient_admission_view->billclosedBy->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_billclosedBy" type="text/html"><span id="el_view_ip_patient_admission_billclosedBy">
<span<?php echo $view_ip_patient_admission_view->billclosedBy->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->billclosedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<tr id="r_bllcloseByDate">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_bllcloseByDate"><script id="tpc_view_ip_patient_admission_bllcloseByDate" type="text/html"><?php echo $view_ip_patient_admission_view->bllcloseByDate->caption() ?></script></span></td>
		<td data-name="bllcloseByDate" <?php echo $view_ip_patient_admission_view->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_bllcloseByDate" type="text/html"><span id="el_view_ip_patient_admission_bllcloseByDate">
<span<?php echo $view_ip_patient_admission_view->bllcloseByDate->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->bllcloseByDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReportHeader"><script id="tpc_view_ip_patient_admission_ReportHeader" type="text/html"><?php echo $view_ip_patient_admission_view->ReportHeader->caption() ?></script></span></td>
		<td data-name="ReportHeader" <?php echo $view_ip_patient_admission_view->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReportHeader" type="text/html"><span id="el_view_ip_patient_admission_ReportHeader">
<span<?php echo $view_ip_patient_admission_view->ReportHeader->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->ReportHeader->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Procedure"><script id="tpc_view_ip_patient_admission_Procedure" type="text/html"><?php echo $view_ip_patient_admission_view->Procedure->caption() ?></script></span></td>
		<td data-name="Procedure" <?php echo $view_ip_patient_admission_view->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Procedure" type="text/html"><span id="el_view_ip_patient_admission_Procedure">
<span<?php echo $view_ip_patient_admission_view->Procedure->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->Procedure->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Consultant"><script id="tpc_view_ip_patient_admission_Consultant" type="text/html"><?php echo $view_ip_patient_admission_view->Consultant->caption() ?></script></span></td>
		<td data-name="Consultant" <?php echo $view_ip_patient_admission_view->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Consultant" type="text/html"><span id="el_view_ip_patient_admission_Consultant">
<span<?php echo $view_ip_patient_admission_view->Consultant->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->Consultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->Anesthetist->Visible) { // Anesthetist ?>
	<tr id="r_Anesthetist">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Anesthetist"><script id="tpc_view_ip_patient_admission_Anesthetist" type="text/html"><?php echo $view_ip_patient_admission_view->Anesthetist->caption() ?></script></span></td>
		<td data-name="Anesthetist" <?php echo $view_ip_patient_admission_view->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Anesthetist" type="text/html"><span id="el_view_ip_patient_admission_Anesthetist">
<span<?php echo $view_ip_patient_admission_view->Anesthetist->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->Anesthetist->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->Amound->Visible) { // Amound ?>
	<tr id="r_Amound">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Amound"><script id="tpc_view_ip_patient_admission_Amound" type="text/html"><?php echo $view_ip_patient_admission_view->Amound->caption() ?></script></span></td>
		<td data-name="Amound" <?php echo $view_ip_patient_admission_view->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Amound" type="text/html"><span id="el_view_ip_patient_admission_Amound">
<span<?php echo $view_ip_patient_admission_view->Amound->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->Amound->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_physician_id"><script id="tpc_view_ip_patient_admission_physician_id" type="text/html"><?php echo $view_ip_patient_admission_view->physician_id->caption() ?></script></span></td>
		<td data-name="physician_id" <?php echo $view_ip_patient_admission_view->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_physician_id" type="text/html"><span id="el_view_ip_patient_admission_physician_id">
<span<?php echo $view_ip_patient_admission_view->physician_id->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->physician_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerID"><script id="tpc_view_ip_patient_admission_PartnerID" type="text/html"><?php echo $view_ip_patient_admission_view->PartnerID->caption() ?></script></span></td>
		<td data-name="PartnerID" <?php echo $view_ip_patient_admission_view->PartnerID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerID" type="text/html"><span id="el_view_ip_patient_admission_PartnerID">
<span<?php echo $view_ip_patient_admission_view->PartnerID->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PartnerID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerName"><script id="tpc_view_ip_patient_admission_PartnerName" type="text/html"><?php echo $view_ip_patient_admission_view->PartnerName->caption() ?></script></span></td>
		<td data-name="PartnerName" <?php echo $view_ip_patient_admission_view->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerName" type="text/html"><span id="el_view_ip_patient_admission_PartnerName">
<span<?php echo $view_ip_patient_admission_view->PartnerName->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PartnerName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PartnerMobile->Visible) { // PartnerMobile ?>
	<tr id="r_PartnerMobile">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerMobile"><script id="tpc_view_ip_patient_admission_PartnerMobile" type="text/html"><?php echo $view_ip_patient_admission_view->PartnerMobile->caption() ?></script></span></td>
		<td data-name="PartnerMobile" <?php echo $view_ip_patient_admission_view->PartnerMobile->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerMobile" type="text/html"><span id="el_view_ip_patient_admission_PartnerMobile">
<span<?php echo $view_ip_patient_admission_view->PartnerMobile->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PartnerMobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_id"><script id="tpc_view_ip_patient_admission_patient_id" type="text/html"><?php echo $view_ip_patient_admission_view->patient_id->caption() ?></script></span></td>
		<td data-name="patient_id" <?php echo $view_ip_patient_admission_view->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_id" type="text/html"><span id="el_view_ip_patient_admission_patient_id">
<span<?php echo $view_ip_patient_admission_view->patient_id->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->patient_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->Cid->Visible) { // Cid ?>
	<tr id="r_Cid">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Cid"><script id="tpc_view_ip_patient_admission_Cid" type="text/html"><?php echo $view_ip_patient_admission_view->Cid->caption() ?></script></span></td>
		<td data-name="Cid" <?php echo $view_ip_patient_admission_view->Cid->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Cid" type="text/html"><span id="el_view_ip_patient_admission_Cid">
<span<?php echo $view_ip_patient_admission_view->Cid->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->Cid->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->PartId->Visible) { // PartId ?>
	<tr id="r_PartId">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartId"><script id="tpc_view_ip_patient_admission_PartId" type="text/html"><?php echo $view_ip_patient_admission_view->PartId->caption() ?></script></span></td>
		<td data-name="PartId" <?php echo $view_ip_patient_admission_view->PartId->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartId" type="text/html"><span id="el_view_ip_patient_admission_PartId">
<span<?php echo $view_ip_patient_admission_view->PartId->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->PartId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->IDProof->Visible) { // IDProof ?>
	<tr id="r_IDProof">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_IDProof"><script id="tpc_view_ip_patient_admission_IDProof" type="text/html"><?php echo $view_ip_patient_admission_view->IDProof->caption() ?></script></span></td>
		<td data-name="IDProof" <?php echo $view_ip_patient_admission_view->IDProof->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_IDProof" type="text/html"><span id="el_view_ip_patient_admission_IDProof">
<span<?php echo $view_ip_patient_admission_view->IDProof->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->IDProof->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->DOB->Visible) { // DOB ?>
	<tr id="r_DOB">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_DOB"><script id="tpc_view_ip_patient_admission_DOB" type="text/html"><?php echo $view_ip_patient_admission_view->DOB->caption() ?></script></span></td>
		<td data-name="DOB" <?php echo $view_ip_patient_admission_view->DOB->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_DOB" type="text/html"><span id="el_view_ip_patient_admission_DOB">
<span<?php echo $view_ip_patient_admission_view->DOB->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->DOB->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<tr id="r_AdviceToOtherHospital">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_AdviceToOtherHospital"><script id="tpc_view_ip_patient_admission_AdviceToOtherHospital" type="text/html"><?php echo $view_ip_patient_admission_view->AdviceToOtherHospital->caption() ?></script></span></td>
		<td data-name="AdviceToOtherHospital" <?php echo $view_ip_patient_admission_view->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_AdviceToOtherHospital" type="text/html"><span id="el_view_ip_patient_admission_AdviceToOtherHospital">
<span<?php echo $view_ip_patient_admission_view->AdviceToOtherHospital->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->AdviceToOtherHospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission_view->Reason->Visible) { // Reason ?>
	<tr id="r_Reason">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Reason"><script id="tpc_view_ip_patient_admission_Reason" type="text/html"><?php echo $view_ip_patient_admission_view->Reason->caption() ?></script></span></td>
		<td data-name="Reason" <?php echo $view_ip_patient_admission_view->Reason->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Reason" type="text/html"><span id="el_view_ip_patient_admission_Reason">
<span<?php echo $view_ip_patient_admission_view->Reason->viewAttributes() ?>><?php echo $view_ip_patient_admission_view->Reason->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_ip_patient_admissionview" class="ew-custom-template"></div>
<script id="tpm_view_ip_patient_admissionview" type="text/html">
<div id="ct_view_ip_patient_admission_view"><style>
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
table {
	border-collapse: separate;
	border-spacing: 2px;
	-webkit-border-horizontal-spacing: 2px;
	-webkit-border-vertical-spacing: 20px;
}
user agent stylesheet
table {
	border-collapse: separate;
	border-spacing: 2px;
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
	  $profilePic =  $row["profilePic"];
if($profilePic != '')
{
$profilePic = "uploads/" . $profilePic;
}else
{
$profilePic  = "uploads/hims\\profile-picture.png";
}
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
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
 	if($Page->admission_date->CurrentValue != '')
				{
					$originalDate = $Page->admission_date->CurrentValue;
					$newDate = date("d/m/Y", strtotime($originalDate));
					$newTime = date("H:i:s", strtotime($originalDate));
				}
 ?>	
<h2 style="text-align:center">Admission Form</h2>
<br>
<table style="width:100%" class="ew-table">
	 <tbody>
		<tr><td>
		<table style="width:100%" class="ew-table">
		<tbody>
		    <tr><td style="width:200px">Patient Name  </td><td>:</td><td>{{:patient_name}}</td><td></td></tr>
			<tr><td>Age </td><td>:</td><td>{{:age}}</td><td></td></tr>
			<tr><td>Gender </td><td>:</td><td>{{:gender}}</td><td></td></tr>
			<tr><td>Partner Name </td><td>:</td><td>{{:PartnerName}}</td><td></td></tr>
		</tbody>
		</table>
		<td style="float:right">
				 <div class="ew-row">
					<img id="patientPropic" src="<?php echo $profilePic; ?>"  height="200" width="200">
				  </div>
		</td></tr>
	</tbody>
</table>
<table style="width:100%" class="ew-table">
	 <tbody>
		<tr><td style="width:200px">Address</td><td>:</td><td><?php echo $address; ?></td><td></td></tr>
		<tr><td>Date of Admission</td><td>:</td><td><?php echo $newDate; ?></td><td></td></tr>
		<tr><td>Time of Admission</td><td>:</td><td><?php echo $newTime; ?></td><td></td></tr>
		<tr><td>Procedure</td><td>:</td><td>{{:Procedure}}</td><td></td></tr>
		<tr><td>Consultant</td><td>:</td><td><?php echo $DrName; ?></td><td></td></tr>
		<tr><td>Anesthetist</td><td>:</td><td>{{:Anesthetist}}</td><td></td></tr>
		<tr><td>Referral Doctor</td><td>:</td><td>{{:ReferedByDr}}</td><td></td></tr>
		<tr><td>ID Proof</td><td>:</td><td>{{:IDProof}}</td><td></td></tr>
	</tbody>
</table>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_patient_admission->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_patient_admissionview", "tpm_view_ip_patient_admissionview", "view_ip_patient_admissionview", "<?php echo $view_ip_patient_admission->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ip_patient_admissionview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_patient_admission_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_patient_admission_view->isExport()) { ?>
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
$view_ip_patient_admission_view->terminate();
?>