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
$view_ip_admission_bill_summary_view = new view_ip_admission_bill_summary_view();

// Run the page
$view_ip_admission_bill_summary_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_admission_bill_summary_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_ip_admission_bill_summary_view->isExport()) { ?>
<script>
var fview_ip_admission_bill_summaryview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_ip_admission_bill_summaryview = currentForm = new ew.Form("fview_ip_admission_bill_summaryview", "view");
	loadjs.done("fview_ip_admission_bill_summaryview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_ip_admission_bill_summary_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ip_admission_bill_summary_view->ExportOptions->render("body") ?>
<?php $view_ip_admission_bill_summary_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ip_admission_bill_summary_view->showPageHeader(); ?>
<?php
$view_ip_admission_bill_summary_view->showMessage();
?>
<form name="fview_ip_admission_bill_summaryview" id="fview_ip_admission_bill_summaryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_admission_bill_summary_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_admission_bill_summary_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_id"><script id="tpc_view_ip_admission_bill_summary_id" type="text/html"><?php echo $view_ip_admission_bill_summary_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_ip_admission_bill_summary_view->id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_id" type="text/html"><span id="el_view_ip_admission_bill_summary_id">
<span<?php echo $view_ip_admission_bill_summary_view->id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_mrnNo"><script id="tpc_view_ip_admission_bill_summary_mrnNo" type="text/html"><?php echo $view_ip_admission_bill_summary_view->mrnNo->caption() ?></script></span></td>
		<td data-name="mrnNo" <?php echo $view_ip_admission_bill_summary_view->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mrnNo" type="text/html"><span id="el_view_ip_admission_bill_summary_mrnNo">
<span<?php echo $view_ip_admission_bill_summary_view->mrnNo->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->mrnNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PatientID"><script id="tpc_view_ip_admission_bill_summary_PatientID" type="text/html"><?php echo $view_ip_admission_bill_summary_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $view_ip_admission_bill_summary_view->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PatientID" type="text/html"><span id="el_view_ip_admission_bill_summary_PatientID">
<span<?php echo $view_ip_admission_bill_summary_view->PatientID->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_patient_name"><script id="tpc_view_ip_admission_bill_summary_patient_name" type="text/html"><?php echo $view_ip_admission_bill_summary_view->patient_name->caption() ?></script></span></td>
		<td data-name="patient_name" <?php echo $view_ip_admission_bill_summary_view->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_name" type="text/html"><span id="el_view_ip_admission_bill_summary_patient_name">
<span<?php echo $view_ip_admission_bill_summary_view->patient_name->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->patient_name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->mobileno->Visible) { // mobileno ?>
	<tr id="r_mobileno">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_mobileno"><script id="tpc_view_ip_admission_bill_summary_mobileno" type="text/html"><?php echo $view_ip_admission_bill_summary_view->mobileno->caption() ?></script></span></td>
		<td data-name="mobileno" <?php echo $view_ip_admission_bill_summary_view->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mobileno" type="text/html"><span id="el_view_ip_admission_bill_summary_mobileno">
<span<?php echo $view_ip_admission_bill_summary_view->mobileno->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->mobileno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_profilePic"><script id="tpc_view_ip_admission_bill_summary_profilePic" type="text/html"><?php echo $view_ip_admission_bill_summary_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $view_ip_admission_bill_summary_view->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_profilePic" type="text/html"><span id="el_view_ip_admission_bill_summary_profilePic">
<span<?php echo $view_ip_admission_bill_summary_view->profilePic->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_gender"><script id="tpc_view_ip_admission_bill_summary_gender" type="text/html"><?php echo $view_ip_admission_bill_summary_view->gender->caption() ?></script></span></td>
		<td data-name="gender" <?php echo $view_ip_admission_bill_summary_view->gender->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_gender" type="text/html"><span id="el_view_ip_admission_bill_summary_gender">
<span<?php echo $view_ip_admission_bill_summary_view->gender->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_age"><script id="tpc_view_ip_admission_bill_summary_age" type="text/html"><?php echo $view_ip_admission_bill_summary_view->age->caption() ?></script></span></td>
		<td data-name="age" <?php echo $view_ip_admission_bill_summary_view->age->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_age" type="text/html"><span id="el_view_ip_admission_bill_summary_age">
<span<?php echo $view_ip_admission_bill_summary_view->age->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_physician_id"><script id="tpc_view_ip_admission_bill_summary_physician_id" type="text/html"><?php echo $view_ip_admission_bill_summary_view->physician_id->caption() ?></script></span></td>
		<td data-name="physician_id" <?php echo $view_ip_admission_bill_summary_view->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_physician_id" type="text/html"><span id="el_view_ip_admission_bill_summary_physician_id">
<span<?php echo $view_ip_admission_bill_summary_view->physician_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->physician_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_typeRegsisteration"><script id="tpc_view_ip_admission_bill_summary_typeRegsisteration" type="text/html"><?php echo $view_ip_admission_bill_summary_view->typeRegsisteration->caption() ?></script></span></td>
		<td data-name="typeRegsisteration" <?php echo $view_ip_admission_bill_summary_view->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_typeRegsisteration" type="text/html"><span id="el_view_ip_admission_bill_summary_typeRegsisteration">
<span<?php echo $view_ip_admission_bill_summary_view->typeRegsisteration->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->typeRegsisteration->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PaymentCategory"><script id="tpc_view_ip_admission_bill_summary_PaymentCategory" type="text/html"><?php echo $view_ip_admission_bill_summary_view->PaymentCategory->caption() ?></script></span></td>
		<td data-name="PaymentCategory" <?php echo $view_ip_admission_bill_summary_view->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentCategory" type="text/html"><span id="el_view_ip_admission_bill_summary_PaymentCategory">
<span<?php echo $view_ip_admission_bill_summary_view->PaymentCategory->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->PaymentCategory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_admission_consultant_id"><script id="tpc_view_ip_admission_bill_summary_admission_consultant_id" type="text/html"><?php echo $view_ip_admission_bill_summary_view->admission_consultant_id->caption() ?></script></span></td>
		<td data-name="admission_consultant_id" <?php echo $view_ip_admission_bill_summary_view->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_consultant_id" type="text/html"><span id="el_view_ip_admission_bill_summary_admission_consultant_id">
<span<?php echo $view_ip_admission_bill_summary_view->admission_consultant_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->admission_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_leading_consultant_id"><script id="tpc_view_ip_admission_bill_summary_leading_consultant_id" type="text/html"><?php echo $view_ip_admission_bill_summary_view->leading_consultant_id->caption() ?></script></span></td>
		<td data-name="leading_consultant_id" <?php echo $view_ip_admission_bill_summary_view->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_leading_consultant_id" type="text/html"><span id="el_view_ip_admission_bill_summary_leading_consultant_id">
<span<?php echo $view_ip_admission_bill_summary_view->leading_consultant_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->leading_consultant_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_cause"><script id="tpc_view_ip_admission_bill_summary_cause" type="text/html"><?php echo $view_ip_admission_bill_summary_view->cause->caption() ?></script></span></td>
		<td data-name="cause" <?php echo $view_ip_admission_bill_summary_view->cause->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_cause" type="text/html"><span id="el_view_ip_admission_bill_summary_cause">
<span<?php echo $view_ip_admission_bill_summary_view->cause->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->cause->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_admission_date"><script id="tpc_view_ip_admission_bill_summary_admission_date" type="text/html"><?php echo $view_ip_admission_bill_summary_view->admission_date->caption() ?></script></span></td>
		<td data-name="admission_date" <?php echo $view_ip_admission_bill_summary_view->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_date" type="text/html"><span id="el_view_ip_admission_bill_summary_admission_date">
<span<?php echo $view_ip_admission_bill_summary_view->admission_date->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->admission_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_release_date"><script id="tpc_view_ip_admission_bill_summary_release_date" type="text/html"><?php echo $view_ip_admission_bill_summary_view->release_date->caption() ?></script></span></td>
		<td data-name="release_date" <?php echo $view_ip_admission_bill_summary_view->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_release_date" type="text/html"><span id="el_view_ip_admission_bill_summary_release_date">
<span<?php echo $view_ip_admission_bill_summary_view->release_date->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->release_date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PaymentStatus"><script id="tpc_view_ip_admission_bill_summary_PaymentStatus" type="text/html"><?php echo $view_ip_admission_bill_summary_view->PaymentStatus->caption() ?></script></span></td>
		<td data-name="PaymentStatus" <?php echo $view_ip_admission_bill_summary_view->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentStatus" type="text/html"><span id="el_view_ip_admission_bill_summary_PaymentStatus">
<span<?php echo $view_ip_admission_bill_summary_view->PaymentStatus->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->PaymentStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_status"><script id="tpc_view_ip_admission_bill_summary_status" type="text/html"><?php echo $view_ip_admission_bill_summary_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $view_ip_admission_bill_summary_view->status->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_status" type="text/html"><span id="el_view_ip_admission_bill_summary_status">
<span<?php echo $view_ip_admission_bill_summary_view->status->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_createdby"><script id="tpc_view_ip_admission_bill_summary_createdby" type="text/html"><?php echo $view_ip_admission_bill_summary_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_ip_admission_bill_summary_view->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createdby" type="text/html"><span id="el_view_ip_admission_bill_summary_createdby">
<span<?php echo $view_ip_admission_bill_summary_view->createdby->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_createddatetime"><script id="tpc_view_ip_admission_bill_summary_createddatetime" type="text/html"><?php echo $view_ip_admission_bill_summary_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_ip_admission_bill_summary_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createddatetime" type="text/html"><span id="el_view_ip_admission_bill_summary_createddatetime">
<span<?php echo $view_ip_admission_bill_summary_view->createddatetime->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_modifiedby"><script id="tpc_view_ip_admission_bill_summary_modifiedby" type="text/html"><?php echo $view_ip_admission_bill_summary_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_ip_admission_bill_summary_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifiedby" type="text/html"><span id="el_view_ip_admission_bill_summary_modifiedby">
<span<?php echo $view_ip_admission_bill_summary_view->modifiedby->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_modifieddatetime"><script id="tpc_view_ip_admission_bill_summary_modifieddatetime" type="text/html"><?php echo $view_ip_admission_bill_summary_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_ip_admission_bill_summary_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifieddatetime" type="text/html"><span id="el_view_ip_admission_bill_summary_modifieddatetime">
<span<?php echo $view_ip_admission_bill_summary_view->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_HospID"><script id="tpc_view_ip_admission_bill_summary_HospID" type="text/html"><?php echo $view_ip_admission_bill_summary_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_ip_admission_bill_summary_view->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_HospID" type="text/html"><span id="el_view_ip_admission_bill_summary_HospID">
<span<?php echo $view_ip_admission_bill_summary_view->HospID->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferedByDr"><script id="tpc_view_ip_admission_bill_summary_ReferedByDr" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ReferedByDr->caption() ?></script></span></td>
		<td data-name="ReferedByDr" <?php echo $view_ip_admission_bill_summary_view->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferedByDr" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferedByDr">
<span<?php echo $view_ip_admission_bill_summary_view->ReferedByDr->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ReferedByDr->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferClinicname"><script id="tpc_view_ip_admission_bill_summary_ReferClinicname" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ReferClinicname->caption() ?></script></span></td>
		<td data-name="ReferClinicname" <?php echo $view_ip_admission_bill_summary_view->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferClinicname" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferClinicname">
<span<?php echo $view_ip_admission_bill_summary_view->ReferClinicname->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ReferClinicname->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferCity"><script id="tpc_view_ip_admission_bill_summary_ReferCity" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ReferCity->caption() ?></script></span></td>
		<td data-name="ReferCity" <?php echo $view_ip_admission_bill_summary_view->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferCity" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferCity">
<span<?php echo $view_ip_admission_bill_summary_view->ReferCity->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ReferCity->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferMobileNo"><script id="tpc_view_ip_admission_bill_summary_ReferMobileNo" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ReferMobileNo->caption() ?></script></span></td>
		<td data-name="ReferMobileNo" <?php echo $view_ip_admission_bill_summary_view->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferMobileNo" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferMobileNo">
<span<?php echo $view_ip_admission_bill_summary_view->ReferMobileNo->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ReferMobileNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant"><script id="tpc_view_ip_admission_bill_summary_ReferA4TreatingConsultant" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ReferA4TreatingConsultant->caption() ?></script></span></td>
		<td data-name="ReferA4TreatingConsultant" <?php echo $view_ip_admission_bill_summary_view->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferA4TreatingConsultant" type="text/html"><span id="el_view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_bill_summary_view->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PurposreReferredfor"><script id="tpc_view_ip_admission_bill_summary_PurposreReferredfor" type="text/html"><?php echo $view_ip_admission_bill_summary_view->PurposreReferredfor->caption() ?></script></span></td>
		<td data-name="PurposreReferredfor" <?php echo $view_ip_admission_bill_summary_view->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PurposreReferredfor" type="text/html"><span id="el_view_ip_admission_bill_summary_PurposreReferredfor">
<span<?php echo $view_ip_admission_bill_summary_view->PurposreReferredfor->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->PurposreReferredfor->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->BillClosing->Visible) { // BillClosing ?>
	<tr id="r_BillClosing">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillClosing"><script id="tpc_view_ip_admission_bill_summary_BillClosing" type="text/html"><?php echo $view_ip_admission_bill_summary_view->BillClosing->caption() ?></script></span></td>
		<td data-name="BillClosing" <?php echo $view_ip_admission_bill_summary_view->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosing" type="text/html"><span id="el_view_ip_admission_bill_summary_BillClosing">
<span<?php echo $view_ip_admission_bill_summary_view->BillClosing->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->BillClosing->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->BillClosingDate->Visible) { // BillClosingDate ?>
	<tr id="r_BillClosingDate">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillClosingDate"><script id="tpc_view_ip_admission_bill_summary_BillClosingDate" type="text/html"><?php echo $view_ip_admission_bill_summary_view->BillClosingDate->caption() ?></script></span></td>
		<td data-name="BillClosingDate" <?php echo $view_ip_admission_bill_summary_view->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosingDate" type="text/html"><span id="el_view_ip_admission_bill_summary_BillClosingDate">
<span<?php echo $view_ip_admission_bill_summary_view->BillClosingDate->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->BillClosingDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillNumber"><script id="tpc_view_ip_admission_bill_summary_BillNumber" type="text/html"><?php echo $view_ip_admission_bill_summary_view->BillNumber->caption() ?></script></span></td>
		<td data-name="BillNumber" <?php echo $view_ip_admission_bill_summary_view->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillNumber" type="text/html"><span id="el_view_ip_admission_bill_summary_BillNumber">
<span<?php echo $view_ip_admission_bill_summary_view->BillNumber->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->BillNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ClosingAmount->Visible) { // ClosingAmount ?>
	<tr id="r_ClosingAmount">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ClosingAmount"><script id="tpc_view_ip_admission_bill_summary_ClosingAmount" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ClosingAmount->caption() ?></script></span></td>
		<td data-name="ClosingAmount" <?php echo $view_ip_admission_bill_summary_view->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingAmount" type="text/html"><span id="el_view_ip_admission_bill_summary_ClosingAmount">
<span<?php echo $view_ip_admission_bill_summary_view->ClosingAmount->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ClosingAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ClosingType->Visible) { // ClosingType ?>
	<tr id="r_ClosingType">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ClosingType"><script id="tpc_view_ip_admission_bill_summary_ClosingType" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ClosingType->caption() ?></script></span></td>
		<td data-name="ClosingType" <?php echo $view_ip_admission_bill_summary_view->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingType" type="text/html"><span id="el_view_ip_admission_bill_summary_ClosingType">
<span<?php echo $view_ip_admission_bill_summary_view->ClosingType->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ClosingType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->BillAmount->Visible) { // BillAmount ?>
	<tr id="r_BillAmount">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillAmount"><script id="tpc_view_ip_admission_bill_summary_BillAmount" type="text/html"><?php echo $view_ip_admission_bill_summary_view->BillAmount->caption() ?></script></span></td>
		<td data-name="BillAmount" <?php echo $view_ip_admission_bill_summary_view->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillAmount" type="text/html"><span id="el_view_ip_admission_bill_summary_BillAmount">
<span<?php echo $view_ip_admission_bill_summary_view->BillAmount->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->BillAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->billclosedBy->Visible) { // billclosedBy ?>
	<tr id="r_billclosedBy">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_billclosedBy"><script id="tpc_view_ip_admission_bill_summary_billclosedBy" type="text/html"><?php echo $view_ip_admission_bill_summary_view->billclosedBy->caption() ?></script></span></td>
		<td data-name="billclosedBy" <?php echo $view_ip_admission_bill_summary_view->billclosedBy->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_billclosedBy" type="text/html"><span id="el_view_ip_admission_bill_summary_billclosedBy">
<span<?php echo $view_ip_admission_bill_summary_view->billclosedBy->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->billclosedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<tr id="r_bllcloseByDate">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_bllcloseByDate"><script id="tpc_view_ip_admission_bill_summary_bllcloseByDate" type="text/html"><?php echo $view_ip_admission_bill_summary_view->bllcloseByDate->caption() ?></script></span></td>
		<td data-name="bllcloseByDate" <?php echo $view_ip_admission_bill_summary_view->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_bllcloseByDate" type="text/html"><span id="el_view_ip_admission_bill_summary_bllcloseByDate">
<span<?php echo $view_ip_admission_bill_summary_view->bllcloseByDate->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->bllcloseByDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReportHeader"><script id="tpc_view_ip_admission_bill_summary_ReportHeader" type="text/html"><?php echo $view_ip_admission_bill_summary_view->ReportHeader->caption() ?></script></span></td>
		<td data-name="ReportHeader" <?php echo $view_ip_admission_bill_summary_view->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReportHeader" type="text/html"><span id="el_view_ip_admission_bill_summary_ReportHeader">
<span<?php echo $view_ip_admission_bill_summary_view->ReportHeader->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->ReportHeader->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Procedure"><script id="tpc_view_ip_admission_bill_summary_Procedure" type="text/html"><?php echo $view_ip_admission_bill_summary_view->Procedure->caption() ?></script></span></td>
		<td data-name="Procedure" <?php echo $view_ip_admission_bill_summary_view->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Procedure" type="text/html"><span id="el_view_ip_admission_bill_summary_Procedure">
<span<?php echo $view_ip_admission_bill_summary_view->Procedure->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->Procedure->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Consultant"><script id="tpc_view_ip_admission_bill_summary_Consultant" type="text/html"><?php echo $view_ip_admission_bill_summary_view->Consultant->caption() ?></script></span></td>
		<td data-name="Consultant" <?php echo $view_ip_admission_bill_summary_view->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Consultant" type="text/html"><span id="el_view_ip_admission_bill_summary_Consultant">
<span<?php echo $view_ip_admission_bill_summary_view->Consultant->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->Consultant->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->Anesthetist->Visible) { // Anesthetist ?>
	<tr id="r_Anesthetist">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Anesthetist"><script id="tpc_view_ip_admission_bill_summary_Anesthetist" type="text/html"><?php echo $view_ip_admission_bill_summary_view->Anesthetist->caption() ?></script></span></td>
		<td data-name="Anesthetist" <?php echo $view_ip_admission_bill_summary_view->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Anesthetist" type="text/html"><span id="el_view_ip_admission_bill_summary_Anesthetist">
<span<?php echo $view_ip_admission_bill_summary_view->Anesthetist->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->Anesthetist->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->Amound->Visible) { // Amound ?>
	<tr id="r_Amound">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Amound"><script id="tpc_view_ip_admission_bill_summary_Amound" type="text/html"><?php echo $view_ip_admission_bill_summary_view->Amound->caption() ?></script></span></td>
		<td data-name="Amound" <?php echo $view_ip_admission_bill_summary_view->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Amound" type="text/html"><span id="el_view_ip_admission_bill_summary_Amound">
<span<?php echo $view_ip_admission_bill_summary_view->Amound->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->Amound->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_patient_id"><script id="tpc_view_ip_admission_bill_summary_patient_id" type="text/html"><?php echo $view_ip_admission_bill_summary_view->patient_id->caption() ?></script></span></td>
		<td data-name="patient_id" <?php echo $view_ip_admission_bill_summary_view->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_id" type="text/html"><span id="el_view_ip_admission_bill_summary_patient_id">
<span<?php echo $view_ip_admission_bill_summary_view->patient_id->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->patient_id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary_view->Package->Visible) { // Package ?>
	<tr id="r_Package">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Package"><script id="tpc_view_ip_admission_bill_summary_Package" type="text/html"><?php echo $view_ip_admission_bill_summary_view->Package->caption() ?></script></span></td>
		<td data-name="Package" <?php echo $view_ip_admission_bill_summary_view->Package->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Package" type="text/html"><span id="el_view_ip_admission_bill_summary_Package">
<span<?php echo $view_ip_admission_bill_summary_view->Package->viewAttributes() ?>><?php echo $view_ip_admission_bill_summary_view->Package->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_ip_admission_bill_summaryview" class="ew-custom-template"></div>
<script id="tpm_view_ip_admission_bill_summaryview" type="text/html">
<div id="ct_view_ip_admission_bill_summary_view"><style>
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

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
	$invoiceId = $Page->id->CurrentValue;
	$dbhelper = &DbHelper();
	$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$invoiceId."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$physician_id = $results1[0]["physician_id"];
$BillNumber =  $results1[0]["BillNumber"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$physician_id."'; ";
	$results1A = $dbhelper->ExecuteRows($sql);
	$Doctor = $results1A[0]["NAME"];
	$patient_id = $results1[0]["PatientID"];
	$PatId = $results1[0]["patient_id"];
	$HospID = $results1[0]["HospID"];
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $PatientName =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
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
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT IP BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT IP BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: <?php echo $BillNumber; ?></td></tr>
		<tr><td  style="float:left;">Patient Name: <?php echo $PatientName; ?></td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: <?php echo $Doctor; ?></td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
			<font size="4" >
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td width="60%"><b>Description</b></td>
<td width="20%"><b><?php  echo "                 ";  ?></b></td>
<td><b align="right">Amount</b></td>
</tr>
							 <?php
	$hhh .= '<tr><td>'.$Page->Procedure->CurrentValue.'</td><td></td><td align="right">'.$Page->BillAmount->CurrentValue.'</td></tr>  ';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Vid='".$invoiceId."'  and TestType != 'ProfileSubTest';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td align="right">Total</td><td align="right">'.$Page->BillAmount->CurrentValue.'</td></tr>  ';
echo $hhh;
$tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
$GRTotal = $Page->BillAmount->CurrentValue;
?>		
</table> 
<?php
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. $GRTotal.' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency(str_replace(",","",$GRTotal)).' </b></br>';
?>
<br><br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right"><?php echo $Page->billclosedBy->CurrentValue; ?><p>
	  </font>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_admission_bill_summary->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_admission_bill_summaryview", "tpm_view_ip_admission_bill_summaryview", "view_ip_admission_bill_summaryview", "<?php echo $view_ip_admission_bill_summary->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ip_admission_bill_summaryview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_admission_bill_summary_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_bill_summary_view->isExport()) { ?>
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
$view_ip_admission_bill_summary_view->terminate();
?>