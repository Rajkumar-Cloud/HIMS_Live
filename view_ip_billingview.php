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
$view_ip_billing_view = new view_ip_billing_view();

// Run the page
$view_ip_billing_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_billing_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_billing->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ip_billingview = currentForm = new ew.Form("fview_ip_billingview", "view");

// Form_CustomValidate event
fview_ip_billingview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_billingview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_billingview.lists["x_BillClosing"] = <?php echo $view_ip_billing_view->BillClosing->Lookup->toClientList() ?>;
fview_ip_billingview.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_billing_view->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_billingview.lists["x_ReportHeader[]"] = <?php echo $view_ip_billing_view->ReportHeader->Lookup->toClientList() ?>;
fview_ip_billingview.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_billing_view->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ip_billing->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ip_billing_view->ExportOptions->render("body") ?>
<?php $view_ip_billing_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ip_billing_view->showPageHeader(); ?>
<?php
$view_ip_billing_view->showMessage();
?>
<form name="fview_ip_billingview" id="fview_ip_billingview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_billing_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_billing_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_billing">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_billing_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_billing->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_id"><script id="tpc_view_ip_billing_id" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_ip_billing->id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_id" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_id">
<span<?php echo $view_ip_billing->id->viewAttributes() ?>>
<?php echo $view_ip_billing->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PatientID"><script id="tpc_view_ip_billing_PatientID" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_ip_billing->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PatientID" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_PatientID">
<span<?php echo $view_ip_billing->PatientID->viewAttributes() ?>>
<?php echo $view_ip_billing->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_patient_name"><script id="tpc_view_ip_billing_patient_name" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->patient_name->caption() ?></span></script></span></td>
		<td data-name="patient_name"<?php echo $view_ip_billing->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_billing_patient_name" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_patient_name">
<span<?php echo $view_ip_billing->patient_name->viewAttributes() ?>>
<?php echo $view_ip_billing->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_mrnNo"><script id="tpc_view_ip_billing_mrnNo" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->mrnNo->caption() ?></span></script></span></td>
		<td data-name="mrnNo"<?php echo $view_ip_billing->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_billing_mrnNo" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_mrnNo">
<span<?php echo $view_ip_billing->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_billing->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->mobileno->Visible) { // mobileno ?>
	<tr id="r_mobileno">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_mobileno"><script id="tpc_view_ip_billing_mobileno" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->mobileno->caption() ?></span></script></span></td>
		<td data-name="mobileno"<?php echo $view_ip_billing->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_billing_mobileno" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_mobileno">
<span<?php echo $view_ip_billing->mobileno->viewAttributes() ?>>
<?php echo $view_ip_billing->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_profilePic"><script id="tpc_view_ip_billing_profilePic" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_ip_billing->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_billing_profilePic" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_profilePic">
<span<?php echo $view_ip_billing->profilePic->viewAttributes() ?>>
<?php echo $view_ip_billing->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_gender"><script id="tpc_view_ip_billing_gender" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->gender->caption() ?></span></script></span></td>
		<td data-name="gender"<?php echo $view_ip_billing->gender->cellAttributes() ?>>
<script id="tpx_view_ip_billing_gender" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_gender">
<span<?php echo $view_ip_billing->gender->viewAttributes() ?>>
<?php echo $view_ip_billing->gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_age"><script id="tpc_view_ip_billing_age" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->age->caption() ?></span></script></span></td>
		<td data-name="age"<?php echo $view_ip_billing->age->cellAttributes() ?>>
<script id="tpx_view_ip_billing_age" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_age">
<span<?php echo $view_ip_billing->age->viewAttributes() ?>>
<?php echo $view_ip_billing->age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_physician_id"><script id="tpc_view_ip_billing_physician_id" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->physician_id->caption() ?></span></script></span></td>
		<td data-name="physician_id"<?php echo $view_ip_billing->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_physician_id" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_physician_id">
<span<?php echo $view_ip_billing->physician_id->viewAttributes() ?>>
<?php echo $view_ip_billing->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_typeRegsisteration"><script id="tpc_view_ip_billing_typeRegsisteration" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->typeRegsisteration->caption() ?></span></script></span></td>
		<td data-name="typeRegsisteration"<?php echo $view_ip_billing->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_billing_typeRegsisteration" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_typeRegsisteration">
<span<?php echo $view_ip_billing->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_billing->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PaymentCategory"><script id="tpc_view_ip_billing_PaymentCategory" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->PaymentCategory->caption() ?></span></script></span></td>
		<td data-name="PaymentCategory"<?php echo $view_ip_billing->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PaymentCategory" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_PaymentCategory">
<span<?php echo $view_ip_billing->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_billing->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_admission_consultant_id"><script id="tpc_view_ip_billing_admission_consultant_id" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->admission_consultant_id->caption() ?></span></script></span></td>
		<td data-name="admission_consultant_id"<?php echo $view_ip_billing->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_admission_consultant_id" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_admission_consultant_id">
<span<?php echo $view_ip_billing->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_billing->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_leading_consultant_id"><script id="tpc_view_ip_billing_leading_consultant_id" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->leading_consultant_id->caption() ?></span></script></span></td>
		<td data-name="leading_consultant_id"<?php echo $view_ip_billing->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_leading_consultant_id" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_leading_consultant_id">
<span<?php echo $view_ip_billing->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_billing->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_cause"><script id="tpc_view_ip_billing_cause" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->cause->caption() ?></span></script></span></td>
		<td data-name="cause"<?php echo $view_ip_billing->cause->cellAttributes() ?>>
<script id="tpx_view_ip_billing_cause" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_cause">
<span<?php echo $view_ip_billing->cause->viewAttributes() ?>>
<?php echo $view_ip_billing->cause->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_admission_date"><script id="tpc_view_ip_billing_admission_date" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->admission_date->caption() ?></span></script></span></td>
		<td data-name="admission_date"<?php echo $view_ip_billing->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_billing_admission_date" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_admission_date">
<span<?php echo $view_ip_billing->admission_date->viewAttributes() ?>>
<?php echo $view_ip_billing->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_release_date"><script id="tpc_view_ip_billing_release_date" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->release_date->caption() ?></span></script></span></td>
		<td data-name="release_date"<?php echo $view_ip_billing->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_billing_release_date" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_release_date">
<span<?php echo $view_ip_billing->release_date->viewAttributes() ?>>
<?php echo $view_ip_billing->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PaymentStatus"><script id="tpc_view_ip_billing_PaymentStatus" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->PaymentStatus->caption() ?></span></script></span></td>
		<td data-name="PaymentStatus"<?php echo $view_ip_billing->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PaymentStatus" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_PaymentStatus">
<span<?php echo $view_ip_billing->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_billing->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_status"><script id="tpc_view_ip_billing_status" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_ip_billing->status->cellAttributes() ?>>
<script id="tpx_view_ip_billing_status" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_status">
<span<?php echo $view_ip_billing->status->viewAttributes() ?>>
<?php echo $view_ip_billing->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_createdby"><script id="tpc_view_ip_billing_createdby" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_ip_billing->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_billing_createdby" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_createdby">
<span<?php echo $view_ip_billing->createdby->viewAttributes() ?>>
<?php echo $view_ip_billing->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_createddatetime"><script id="tpc_view_ip_billing_createddatetime" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_ip_billing->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_billing_createddatetime" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_createddatetime">
<span<?php echo $view_ip_billing->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_billing->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_modifiedby"><script id="tpc_view_ip_billing_modifiedby" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_ip_billing->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_billing_modifiedby" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_modifiedby">
<span<?php echo $view_ip_billing->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_billing->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_modifieddatetime"><script id="tpc_view_ip_billing_modifieddatetime" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_ip_billing->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_billing_modifieddatetime" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_modifieddatetime">
<span<?php echo $view_ip_billing->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_billing->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_HospID"><script id="tpc_view_ip_billing_HospID" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_ip_billing->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_billing_HospID" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_HospID">
<span<?php echo $view_ip_billing->HospID->viewAttributes() ?>>
<?php echo $view_ip_billing->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferedByDr"><script id="tpc_view_ip_billing_ReferedByDr" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ReferedByDr->caption() ?></span></script></span></td>
		<td data-name="ReferedByDr"<?php echo $view_ip_billing->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferedByDr" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ReferedByDr">
<span<?php echo $view_ip_billing->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferClinicname"><script id="tpc_view_ip_billing_ReferClinicname" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ReferClinicname->caption() ?></span></script></span></td>
		<td data-name="ReferClinicname"<?php echo $view_ip_billing->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferClinicname" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ReferClinicname">
<span<?php echo $view_ip_billing->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferCity"><script id="tpc_view_ip_billing_ReferCity" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ReferCity->caption() ?></span></script></span></td>
		<td data-name="ReferCity"<?php echo $view_ip_billing->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferCity" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ReferCity">
<span<?php echo $view_ip_billing->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferMobileNo"><script id="tpc_view_ip_billing_ReferMobileNo" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ReferMobileNo->caption() ?></span></script></span></td>
		<td data-name="ReferMobileNo"<?php echo $view_ip_billing->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferMobileNo" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ReferMobileNo">
<span<?php echo $view_ip_billing->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReferA4TreatingConsultant"><script id="tpc_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ReferA4TreatingConsultant->caption() ?></span></script></span></td>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_billing->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReferA4TreatingConsultant" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ReferA4TreatingConsultant">
<span<?php echo $view_ip_billing->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_billing->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_PurposreReferredfor"><script id="tpc_view_ip_billing_PurposreReferredfor" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->PurposreReferredfor->caption() ?></span></script></span></td>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_billing->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_billing_PurposreReferredfor" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_PurposreReferredfor">
<span<?php echo $view_ip_billing->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_billing->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_patient_id"><script id="tpc_view_ip_billing_patient_id" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->patient_id->caption() ?></span></script></span></td>
		<td data-name="patient_id"<?php echo $view_ip_billing->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_billing_patient_id" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_patient_id">
<span<?php echo $view_ip_billing->patient_id->viewAttributes() ?>>
<?php echo $view_ip_billing->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->BillClosing->Visible) { // BillClosing ?>
	<tr id="r_BillClosing">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillClosing"><script id="tpc_view_ip_billing_BillClosing" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->BillClosing->caption() ?></span></script></span></td>
		<td data-name="BillClosing"<?php echo $view_ip_billing->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillClosing" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_BillClosing">
<span<?php echo $view_ip_billing->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_billing->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->BillClosingDate->Visible) { // BillClosingDate ?>
	<tr id="r_BillClosingDate">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillClosingDate"><script id="tpc_view_ip_billing_BillClosingDate" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->BillClosingDate->caption() ?></span></script></span></td>
		<td data-name="BillClosingDate"<?php echo $view_ip_billing->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillClosingDate" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_BillClosingDate">
<span<?php echo $view_ip_billing->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_billing->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillNumber"><script id="tpc_view_ip_billing_BillNumber" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_ip_billing->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillNumber" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_BillNumber">
<span<?php echo $view_ip_billing->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_billing->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ClosingAmount->Visible) { // ClosingAmount ?>
	<tr id="r_ClosingAmount">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ClosingAmount"><script id="tpc_view_ip_billing_ClosingAmount" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ClosingAmount->caption() ?></span></script></span></td>
		<td data-name="ClosingAmount"<?php echo $view_ip_billing->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ClosingAmount" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ClosingAmount">
<span<?php echo $view_ip_billing->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_billing->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ClosingType->Visible) { // ClosingType ?>
	<tr id="r_ClosingType">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ClosingType"><script id="tpc_view_ip_billing_ClosingType" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ClosingType->caption() ?></span></script></span></td>
		<td data-name="ClosingType"<?php echo $view_ip_billing->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ClosingType" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ClosingType">
<span<?php echo $view_ip_billing->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_billing->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->BillAmount->Visible) { // BillAmount ?>
	<tr id="r_BillAmount">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_BillAmount"><script id="tpc_view_ip_billing_BillAmount" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->BillAmount->caption() ?></span></script></span></td>
		<td data-name="BillAmount"<?php echo $view_ip_billing->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_billing_BillAmount" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_BillAmount">
<span<?php echo $view_ip_billing->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_billing->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->billclosedBy->Visible) { // billclosedBy ?>
	<tr id="r_billclosedBy">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_billclosedBy"><script id="tpc_view_ip_billing_billclosedBy" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->billclosedBy->caption() ?></span></script></span></td>
		<td data-name="billclosedBy"<?php echo $view_ip_billing->billclosedBy->cellAttributes() ?>>
<script id="tpx_view_ip_billing_billclosedBy" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_billclosedBy">
<span<?php echo $view_ip_billing->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_billing->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<tr id="r_bllcloseByDate">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_bllcloseByDate"><script id="tpc_view_ip_billing_bllcloseByDate" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->bllcloseByDate->caption() ?></span></script></span></td>
		<td data-name="bllcloseByDate"<?php echo $view_ip_billing->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_view_ip_billing_bllcloseByDate" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_bllcloseByDate">
<span<?php echo $view_ip_billing->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_billing->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_billing->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_ip_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_billing_ReportHeader"><script id="tpc_view_ip_billing_ReportHeader" class="view_ip_billingview" type="text/html"><span><?php echo $view_ip_billing->ReportHeader->caption() ?></span></script></span></td>
		<td data-name="ReportHeader"<?php echo $view_ip_billing->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_billing_ReportHeader" class="view_ip_billingview" type="text/html">
<span id="el_view_ip_billing_ReportHeader">
<span<?php echo $view_ip_billing->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_billing->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_ip_billingview" class="ew-custom-template"></div>
<script id="tpm_view_ip_billingview" type="text/html">
<div id="ct_view_ip_billing_view"><style>
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
<?php
$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT Service_Department FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' group by Service_Department;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["Service_Department"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' and  Service_Department='".$rowA["Service_Department"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = $row["Quantity"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}

//==============================
//$GRTotal = 0;

$dbhelper = &DbHelper();
$sqlA = "SELECT BRCODE,BRNAME FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' group by BRCODE,BRNAME;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["BRNAME"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Mfg</b></td>
<td align="center"><b>Exp</b></td>
<td align="center"><b>Batch</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' and  BRCODE='".$rowA["BRCODE"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Product"];
				$ItemCode =  $row["PRC"];
				$Mfg =  $row["Mfg"];

				//$EXPDT =  $row["EXPDT"];
				$EXPDT =  date("d-m-Y", strtotime($row["EXPDT"]));
				$BATCHNO =  $row["BATCHNO"];
				$Qty = number_format($row["IQ"]);
				$Rate =  $row["RT"];
				$SubTotal =  $row["DAMT"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td>'.$Mfg.'</td><td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}
 $hhh = '<font size="4" > <b>Advance</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Advance No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SASTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  $row["Amount"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.number_format($row["Amount"],2).'</td></tr>  ';
$SASTotal = $SASTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SASTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
 $hhh = '<font size="4" > <b>Refund</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Refund No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						    $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SrSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_refund_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  number_format($row["Amount"],2);

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SrSTotal = $SrSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SrSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
if($SrSTotal != '')
{
	  echo $hhh;
}
 $hhh = '<font size="4" > 
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="left" style="width:50%"><b>Total Bill Amount</b></td>
<td align="right"><b align="right">'.number_format($GRTotal,2).'</b></td>
</tr>';
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Advance Amount</b></td>
<td align="right"><b align="right">'.number_format($SASTotal,2).'</b></td>
</tr>';
if($SSTotal != '')
{
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Refund Amount</b></td>
<td align="right"><b align="right">'.number_format($SrSTotal,2).'</b></td>
</tr>';
	   $BALTotal = ($GRTotal - $SASTotal)+$SrSTotal;
	$hhh .= '<tr><td align="left">(Total Bill Amount - Total Advance Amount) + Total Refund Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}else
{
 $BALTotal = $GRTotal - $SASTotal;
$hhh .= '<tr><td align="left">Total Bill Amount - Total Advance Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}
$hhh .= '</table> </font><br>';
 echo $hhh;
 if($BALTotal > 100)
 {
 	echo '</br><b>Balance amount to be paid : '.$BALTotal.' <b></br>';
 }
 if($BALTotal < 0)
 {
 	echo '</br><b>Balance amount to be Refund : '.$BALTotal.' <b></br>';
 }
 if($BALTotal >= 0 && $BALTotal <= 100)
 {
	 echo '</br><b>Bill Tallied <b> </br>';
 }
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. number_format($GRTotal,2).' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency($GRTotal).' </b></br>';
?>
<br><br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_billing->Rows) ?> };
ew.applyTemplate("tpd_view_ip_billingview", "tpm_view_ip_billingview", "view_ip_billingview", "<?php echo $view_ip_billing->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_billingview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_billing_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_billing->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_billing_view->terminate();
?>