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
<?php include_once "header.php" ?>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ip_patient_admissionview = currentForm = new ew.Form("fview_ip_patient_admissionview", "view");

// Form_CustomValidate event
fview_ip_patient_admissionview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_patient_admissionview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_patient_admissionview.lists["x_typeRegsisteration"] = <?php echo $view_ip_patient_admission_view->typeRegsisteration->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($view_ip_patient_admission_view->typeRegsisteration->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_PaymentCategory"] = <?php echo $view_ip_patient_admission_view->PaymentCategory->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_patient_admission_view->PaymentCategory->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_PaymentStatus"] = <?php echo $view_ip_patient_admission_view->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_patient_admission_view->PaymentStatus->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_HospID"] = <?php echo $view_ip_patient_admission_view->HospID->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_HospID"].options = <?php echo JsonEncode($view_ip_patient_admission_view->HospID->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_ReferedByDr"] = <?php echo $view_ip_patient_admission_view->ReferedByDr->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_ReferedByDr"].options = <?php echo JsonEncode($view_ip_patient_admission_view->ReferedByDr->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_BillClosing[]"] = <?php echo $view_ip_patient_admission_view->BillClosing->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_BillClosing[]"].options = <?php echo JsonEncode($view_ip_patient_admission_view->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissionview.lists["x_ReportHeader[]"] = <?php echo $view_ip_patient_admission_view->ReportHeader->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_patient_admission_view->ReportHeader->options(FALSE, TRUE)) ?>;
fview_ip_patient_admissionview.lists["x_Procedure"] = <?php echo $view_ip_patient_admission_view->Procedure->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_patient_admission_view->Procedure->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_Consultant"] = <?php echo $view_ip_patient_admission_view->Consultant->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_Consultant"].options = <?php echo JsonEncode($view_ip_patient_admission_view->Consultant->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_Anesthetist"] = <?php echo $view_ip_patient_admission_view->Anesthetist->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_Anesthetist"].options = <?php echo JsonEncode($view_ip_patient_admission_view->Anesthetist->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_physician_id"] = <?php echo $view_ip_patient_admission_view->physician_id->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_physician_id"].options = <?php echo JsonEncode($view_ip_patient_admission_view->physician_id->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_patient_id"] = <?php echo $view_ip_patient_admission_view->patient_id->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_patient_id"].options = <?php echo JsonEncode($view_ip_patient_admission_view->patient_id->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_Cid"] = <?php echo $view_ip_patient_admission_view->Cid->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_Cid"].options = <?php echo JsonEncode($view_ip_patient_admission_view->Cid->lookupOptions()) ?>;
fview_ip_patient_admissionview.lists["x_AdviceToOtherHospital[]"] = <?php echo $view_ip_patient_admission_view->AdviceToOtherHospital->Lookup->toClientList() ?>;
fview_ip_patient_admissionview.lists["x_AdviceToOtherHospital[]"].options = <?php echo JsonEncode($view_ip_patient_admission_view->AdviceToOtherHospital->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
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
<?php if ($view_ip_patient_admission_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_patient_admission_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_patient_admission_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_patient_admission->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_id"><script id="tpc_view_ip_patient_admission_id" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_ip_patient_admission->id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_id" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_id">
<span<?php echo $view_ip_patient_admission->id->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mrnNo"><script id="tpc_view_ip_patient_admission_mrnNo" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->mrnNo->caption() ?></span></script></span></td>
		<td data-name="mrnNo"<?php echo $view_ip_patient_admission->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mrnNo" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_mrnNo">
<span<?php echo $view_ip_patient_admission->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PatientID"><script id="tpc_view_ip_patient_admission_PatientID" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_ip_patient_admission->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PatientID" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PatientID">
<span<?php echo $view_ip_patient_admission->PatientID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_name"><script id="tpc_view_ip_patient_admission_patient_name" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->patient_name->caption() ?></span></script></span></td>
		<td data-name="patient_name"<?php echo $view_ip_patient_admission->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_name" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_patient_name">
<span<?php echo $view_ip_patient_admission->patient_name->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->mobileno->Visible) { // mobileno ?>
	<tr id="r_mobileno">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_mobileno"><script id="tpc_view_ip_patient_admission_mobileno" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->mobileno->caption() ?></span></script></span></td>
		<td data-name="mobileno"<?php echo $view_ip_patient_admission->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_mobileno" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_mobileno">
<span<?php echo $view_ip_patient_admission->mobileno->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_profilePic"><script id="tpc_view_ip_patient_admission_profilePic" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_ip_patient_admission->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_profilePic" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_profilePic">
<span<?php echo $view_ip_patient_admission->profilePic->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_gender"><script id="tpc_view_ip_patient_admission_gender" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->gender->caption() ?></span></script></span></td>
		<td data-name="gender"<?php echo $view_ip_patient_admission->gender->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_gender" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_gender">
<span<?php echo $view_ip_patient_admission->gender->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_age"><script id="tpc_view_ip_patient_admission_age" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->age->caption() ?></span></script></span></td>
		<td data-name="age"<?php echo $view_ip_patient_admission->age->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_age" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_age">
<span<?php echo $view_ip_patient_admission->age->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->Package->Visible) { // Package ?>
	<tr id="r_Package">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Package"><script id="tpc_view_ip_patient_admission_Package" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->Package->caption() ?></span></script></span></td>
		<td data-name="Package"<?php echo $view_ip_patient_admission->Package->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Package" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_Package">
<span<?php echo $view_ip_patient_admission->Package->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Package->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_typeRegsisteration"><script id="tpc_view_ip_patient_admission_typeRegsisteration" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->typeRegsisteration->caption() ?></span></script></span></td>
		<td data-name="typeRegsisteration"<?php echo $view_ip_patient_admission->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_typeRegsisteration" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_typeRegsisteration">
<span<?php echo $view_ip_patient_admission->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentCategory"><script id="tpc_view_ip_patient_admission_PaymentCategory" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PaymentCategory->caption() ?></span></script></span></td>
		<td data-name="PaymentCategory"<?php echo $view_ip_patient_admission->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentCategory" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PaymentCategory">
<span<?php echo $view_ip_patient_admission->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_consultant_id"><script id="tpc_view_ip_patient_admission_admission_consultant_id" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->admission_consultant_id->caption() ?></span></script></span></td>
		<td data-name="admission_consultant_id"<?php echo $view_ip_patient_admission->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_consultant_id" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_admission_consultant_id">
<span<?php echo $view_ip_patient_admission->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_leading_consultant_id"><script id="tpc_view_ip_patient_admission_leading_consultant_id" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->leading_consultant_id->caption() ?></span></script></span></td>
		<td data-name="leading_consultant_id"<?php echo $view_ip_patient_admission->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_leading_consultant_id" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_leading_consultant_id">
<span<?php echo $view_ip_patient_admission->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_cause"><script id="tpc_view_ip_patient_admission_cause" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->cause->caption() ?></span></script></span></td>
		<td data-name="cause"<?php echo $view_ip_patient_admission->cause->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_cause" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_cause">
<span<?php echo $view_ip_patient_admission->cause->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->cause->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_admission_date"><script id="tpc_view_ip_patient_admission_admission_date" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->admission_date->caption() ?></span></script></span></td>
		<td data-name="admission_date"<?php echo $view_ip_patient_admission->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_admission_date" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_admission_date">
<span<?php echo $view_ip_patient_admission->admission_date->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_release_date"><script id="tpc_view_ip_patient_admission_release_date" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->release_date->caption() ?></span></script></span></td>
		<td data-name="release_date"<?php echo $view_ip_patient_admission->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_release_date" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_release_date">
<span<?php echo $view_ip_patient_admission->release_date->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PaymentStatus"><script id="tpc_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PaymentStatus->caption() ?></span></script></span></td>
		<td data-name="PaymentStatus"<?php echo $view_ip_patient_admission->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PaymentStatus" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PaymentStatus">
<span<?php echo $view_ip_patient_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_status"><script id="tpc_view_ip_patient_admission_status" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_ip_patient_admission->status->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_status" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_status">
<span<?php echo $view_ip_patient_admission->status->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createdby"><script id="tpc_view_ip_patient_admission_createdby" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_ip_patient_admission->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_createdby" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_createdby">
<span<?php echo $view_ip_patient_admission->createdby->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_createddatetime"><script id="tpc_view_ip_patient_admission_createddatetime" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_ip_patient_admission->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_createddatetime" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_createddatetime">
<span<?php echo $view_ip_patient_admission->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifiedby"><script id="tpc_view_ip_patient_admission_modifiedby" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_ip_patient_admission->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_modifiedby" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_modifiedby">
<span<?php echo $view_ip_patient_admission->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_modifieddatetime"><script id="tpc_view_ip_patient_admission_modifieddatetime" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_ip_patient_admission->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_modifieddatetime" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_modifieddatetime">
<span<?php echo $view_ip_patient_admission->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_HospID"><script id="tpc_view_ip_patient_admission_HospID" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_ip_patient_admission->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_HospID" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_HospID">
<span<?php echo $view_ip_patient_admission->HospID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferedByDr"><script id="tpc_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ReferedByDr->caption() ?></span></script></span></td>
		<td data-name="ReferedByDr"<?php echo $view_ip_patient_admission->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferedByDr" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ReferedByDr">
<span<?php echo $view_ip_patient_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferClinicname"><script id="tpc_view_ip_patient_admission_ReferClinicname" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ReferClinicname->caption() ?></span></script></span></td>
		<td data-name="ReferClinicname"<?php echo $view_ip_patient_admission->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferClinicname" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ReferClinicname">
<span<?php echo $view_ip_patient_admission->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferCity"><script id="tpc_view_ip_patient_admission_ReferCity" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ReferCity->caption() ?></span></script></span></td>
		<td data-name="ReferCity"<?php echo $view_ip_patient_admission->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferCity" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ReferCity">
<span<?php echo $view_ip_patient_admission->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferMobileNo"><script id="tpc_view_ip_patient_admission_ReferMobileNo" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ReferMobileNo->caption() ?></span></script></span></td>
		<td data-name="ReferMobileNo"<?php echo $view_ip_patient_admission->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferMobileNo" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ReferMobileNo">
<span<?php echo $view_ip_patient_admission->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReferA4TreatingConsultant"><script id="tpc_view_ip_patient_admission_ReferA4TreatingConsultant" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->caption() ?></span></script></span></td>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReferA4TreatingConsultant" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ReferA4TreatingConsultant">
<span<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PurposreReferredfor"><script id="tpc_view_ip_patient_admission_PurposreReferredfor" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PurposreReferredfor->caption() ?></span></script></span></td>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_patient_admission->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PurposreReferredfor" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PurposreReferredfor">
<span<?php echo $view_ip_patient_admission->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosing->Visible) { // BillClosing ?>
	<tr id="r_BillClosing">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosing"><script id="tpc_view_ip_patient_admission_BillClosing" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->BillClosing->caption() ?></span></script></span></td>
		<td data-name="BillClosing"<?php echo $view_ip_patient_admission->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosing" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_BillClosing">
<span<?php echo $view_ip_patient_admission->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<tr id="r_BillClosingDate">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillClosingDate"><script id="tpc_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->BillClosingDate->caption() ?></span></script></span></td>
		<td data-name="BillClosingDate"<?php echo $view_ip_patient_admission->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillClosingDate" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_BillClosingDate">
<span<?php echo $view_ip_patient_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillNumber"><script id="tpc_view_ip_patient_admission_BillNumber" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_ip_patient_admission->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillNumber" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_BillNumber">
<span<?php echo $view_ip_patient_admission->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ClosingAmount->Visible) { // ClosingAmount ?>
	<tr id="r_ClosingAmount">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingAmount"><script id="tpc_view_ip_patient_admission_ClosingAmount" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ClosingAmount->caption() ?></span></script></span></td>
		<td data-name="ClosingAmount"<?php echo $view_ip_patient_admission->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingAmount" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ClosingAmount">
<span<?php echo $view_ip_patient_admission->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ClosingType->Visible) { // ClosingType ?>
	<tr id="r_ClosingType">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ClosingType"><script id="tpc_view_ip_patient_admission_ClosingType" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ClosingType->caption() ?></span></script></span></td>
		<td data-name="ClosingType"<?php echo $view_ip_patient_admission->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ClosingType" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ClosingType">
<span<?php echo $view_ip_patient_admission->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->BillAmount->Visible) { // BillAmount ?>
	<tr id="r_BillAmount">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_BillAmount"><script id="tpc_view_ip_patient_admission_BillAmount" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->BillAmount->caption() ?></span></script></span></td>
		<td data-name="BillAmount"<?php echo $view_ip_patient_admission->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_BillAmount" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_BillAmount">
<span<?php echo $view_ip_patient_admission->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->billclosedBy->Visible) { // billclosedBy ?>
	<tr id="r_billclosedBy">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_billclosedBy"><script id="tpc_view_ip_patient_admission_billclosedBy" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->billclosedBy->caption() ?></span></script></span></td>
		<td data-name="billclosedBy"<?php echo $view_ip_patient_admission->billclosedBy->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_billclosedBy" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_billclosedBy">
<span<?php echo $view_ip_patient_admission->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<tr id="r_bllcloseByDate">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_bllcloseByDate"><script id="tpc_view_ip_patient_admission_bllcloseByDate" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->bllcloseByDate->caption() ?></span></script></span></td>
		<td data-name="bllcloseByDate"<?php echo $view_ip_patient_admission->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_bllcloseByDate" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_bllcloseByDate">
<span<?php echo $view_ip_patient_admission->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_ReportHeader"><script id="tpc_view_ip_patient_admission_ReportHeader" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->ReportHeader->caption() ?></span></script></span></td>
		<td data-name="ReportHeader"<?php echo $view_ip_patient_admission->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_ReportHeader" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_ReportHeader">
<span<?php echo $view_ip_patient_admission->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Procedure"><script id="tpc_view_ip_patient_admission_Procedure" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->Procedure->caption() ?></span></script></span></td>
		<td data-name="Procedure"<?php echo $view_ip_patient_admission->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Procedure" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_Procedure">
<span<?php echo $view_ip_patient_admission->Procedure->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Consultant"><script id="tpc_view_ip_patient_admission_Consultant" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->Consultant->caption() ?></span></script></span></td>
		<td data-name="Consultant"<?php echo $view_ip_patient_admission->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Consultant" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_Consultant">
<span<?php echo $view_ip_patient_admission->Consultant->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->Anesthetist->Visible) { // Anesthetist ?>
	<tr id="r_Anesthetist">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Anesthetist"><script id="tpc_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->Anesthetist->caption() ?></span></script></span></td>
		<td data-name="Anesthetist"<?php echo $view_ip_patient_admission->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Anesthetist" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_Anesthetist">
<span<?php echo $view_ip_patient_admission->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->Amound->Visible) { // Amound ?>
	<tr id="r_Amound">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Amound"><script id="tpc_view_ip_patient_admission_Amound" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->Amound->caption() ?></span></script></span></td>
		<td data-name="Amound"<?php echo $view_ip_patient_admission->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Amound" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_Amound">
<span<?php echo $view_ip_patient_admission->Amound->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Amound->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_physician_id"><script id="tpc_view_ip_patient_admission_physician_id" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->physician_id->caption() ?></span></script></span></td>
		<td data-name="physician_id"<?php echo $view_ip_patient_admission->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_physician_id" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_physician_id">
<span<?php echo $view_ip_patient_admission->physician_id->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerID"><script id="tpc_view_ip_patient_admission_PartnerID" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PartnerID->caption() ?></span></script></span></td>
		<td data-name="PartnerID"<?php echo $view_ip_patient_admission->PartnerID->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerID" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PartnerID">
<span<?php echo $view_ip_patient_admission->PartnerID->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerName"><script id="tpc_view_ip_patient_admission_PartnerName" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_ip_patient_admission->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerName" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PartnerName">
<span<?php echo $view_ip_patient_admission->PartnerName->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<tr id="r_PartnerMobile">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartnerMobile"><script id="tpc_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PartnerMobile->caption() ?></span></script></span></td>
		<td data-name="PartnerMobile"<?php echo $view_ip_patient_admission->PartnerMobile->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartnerMobile" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PartnerMobile">
<span<?php echo $view_ip_patient_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartnerMobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_patient_id"><script id="tpc_view_ip_patient_admission_patient_id" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->patient_id->caption() ?></span></script></span></td>
		<td data-name="patient_id"<?php echo $view_ip_patient_admission->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_patient_id" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_patient_id">
<span<?php echo $view_ip_patient_admission->patient_id->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->Cid->Visible) { // Cid ?>
	<tr id="r_Cid">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Cid"><script id="tpc_view_ip_patient_admission_Cid" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->Cid->caption() ?></span></script></span></td>
		<td data-name="Cid"<?php echo $view_ip_patient_admission->Cid->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Cid" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_Cid">
<span<?php echo $view_ip_patient_admission->Cid->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Cid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->PartId->Visible) { // PartId ?>
	<tr id="r_PartId">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_PartId"><script id="tpc_view_ip_patient_admission_PartId" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->PartId->caption() ?></span></script></span></td>
		<td data-name="PartId"<?php echo $view_ip_patient_admission->PartId->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_PartId" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_PartId">
<span<?php echo $view_ip_patient_admission->PartId->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->PartId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->IDProof->Visible) { // IDProof ?>
	<tr id="r_IDProof">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_IDProof"><script id="tpc_view_ip_patient_admission_IDProof" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->IDProof->caption() ?></span></script></span></td>
		<td data-name="IDProof"<?php echo $view_ip_patient_admission->IDProof->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_IDProof" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_IDProof">
<span<?php echo $view_ip_patient_admission->IDProof->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->IDProof->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->DOB->Visible) { // DOB ?>
	<tr id="r_DOB">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_DOB"><script id="tpc_view_ip_patient_admission_DOB" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->DOB->caption() ?></span></script></span></td>
		<td data-name="DOB"<?php echo $view_ip_patient_admission->DOB->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_DOB" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_DOB">
<span<?php echo $view_ip_patient_admission->DOB->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->DOB->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<tr id="r_AdviceToOtherHospital">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_AdviceToOtherHospital"><script id="tpc_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->AdviceToOtherHospital->caption() ?></span></script></span></td>
		<td data-name="AdviceToOtherHospital"<?php echo $view_ip_patient_admission->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_AdviceToOtherHospital" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_AdviceToOtherHospital">
<span<?php echo $view_ip_patient_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_patient_admission->Reason->Visible) { // Reason ?>
	<tr id="r_Reason">
		<td class="<?php echo $view_ip_patient_admission_view->TableLeftColumnClass ?>"><span id="elh_view_ip_patient_admission_Reason"><script id="tpc_view_ip_patient_admission_Reason" class="view_ip_patient_admissionview" type="text/html"><span><?php echo $view_ip_patient_admission->Reason->caption() ?></span></script></span></td>
		<td data-name="Reason"<?php echo $view_ip_patient_admission->Reason->cellAttributes() ?>>
<script id="tpx_view_ip_patient_admission_Reason" class="view_ip_patient_admissionview" type="text/html">
<span id="el_view_ip_patient_admission_Reason">
<span<?php echo $view_ip_patient_admission->Reason->viewAttributes() ?>>
<?php echo $view_ip_patient_admission->Reason->getViewValue() ?></span>
</span>
</script>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_patient_admission->Rows) ?> };
ew.applyTemplate("tpd_view_ip_patient_admissionview", "tpm_view_ip_patient_admissionview", "view_ip_patient_admissionview", "<?php echo $view_ip_patient_admission->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_patient_admissionview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_patient_admission_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_patient_admission->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_patient_admission_view->terminate();
?>