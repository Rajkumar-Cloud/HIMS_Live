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
$ip_admission_view = new ip_admission_view();

// Run the page
$ip_admission_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ip_admission_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ip_admission->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fip_admissionview = currentForm = new ew.Form("fip_admissionview", "view");

// Form_CustomValidate event
fip_admissionview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fip_admissionview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fip_admissionview.lists["x_gender"] = <?php echo $ip_admission_view->gender->Lookup->toClientList() ?>;
fip_admissionview.lists["x_gender"].options = <?php echo JsonEncode($ip_admission_view->gender->lookupOptions()) ?>;
fip_admissionview.autoSuggests["x_gender"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fip_admissionview.lists["x_typeRegsisteration"] = <?php echo $ip_admission_view->typeRegsisteration->Lookup->toClientList() ?>;
fip_admissionview.lists["x_typeRegsisteration"].options = <?php echo JsonEncode($ip_admission_view->typeRegsisteration->lookupOptions()) ?>;
fip_admissionview.lists["x_PaymentCategory"] = <?php echo $ip_admission_view->PaymentCategory->Lookup->toClientList() ?>;
fip_admissionview.lists["x_PaymentCategory"].options = <?php echo JsonEncode($ip_admission_view->PaymentCategory->lookupOptions()) ?>;
fip_admissionview.lists["x_physician_id"] = <?php echo $ip_admission_view->physician_id->Lookup->toClientList() ?>;
fip_admissionview.lists["x_physician_id"].options = <?php echo JsonEncode($ip_admission_view->physician_id->lookupOptions()) ?>;
fip_admissionview.lists["x_admission_consultant_id"] = <?php echo $ip_admission_view->admission_consultant_id->Lookup->toClientList() ?>;
fip_admissionview.lists["x_admission_consultant_id"].options = <?php echo JsonEncode($ip_admission_view->admission_consultant_id->lookupOptions()) ?>;
fip_admissionview.lists["x_leading_consultant_id"] = <?php echo $ip_admission_view->leading_consultant_id->Lookup->toClientList() ?>;
fip_admissionview.lists["x_leading_consultant_id"].options = <?php echo JsonEncode($ip_admission_view->leading_consultant_id->lookupOptions()) ?>;
fip_admissionview.lists["x_PaymentStatus"] = <?php echo $ip_admission_view->PaymentStatus->Lookup->toClientList() ?>;
fip_admissionview.lists["x_PaymentStatus"].options = <?php echo JsonEncode($ip_admission_view->PaymentStatus->lookupOptions()) ?>;
fip_admissionview.lists["x_status"] = <?php echo $ip_admission_view->status->Lookup->toClientList() ?>;
fip_admissionview.lists["x_status"].options = <?php echo JsonEncode($ip_admission_view->status->lookupOptions()) ?>;
fip_admissionview.lists["x_HospID"] = <?php echo $ip_admission_view->HospID->Lookup->toClientList() ?>;
fip_admissionview.lists["x_HospID"].options = <?php echo JsonEncode($ip_admission_view->HospID->lookupOptions()) ?>;
fip_admissionview.lists["x_ReferedByDr"] = <?php echo $ip_admission_view->ReferedByDr->Lookup->toClientList() ?>;
fip_admissionview.lists["x_ReferedByDr"].options = <?php echo JsonEncode($ip_admission_view->ReferedByDr->lookupOptions()) ?>;
fip_admissionview.lists["x_ReferA4TreatingConsultant"] = <?php echo $ip_admission_view->ReferA4TreatingConsultant->Lookup->toClientList() ?>;
fip_admissionview.lists["x_ReferA4TreatingConsultant"].options = <?php echo JsonEncode($ip_admission_view->ReferA4TreatingConsultant->lookupOptions()) ?>;
fip_admissionview.lists["x_patient_id"] = <?php echo $ip_admission_view->patient_id->Lookup->toClientList() ?>;
fip_admissionview.lists["x_patient_id"].options = <?php echo JsonEncode($ip_admission_view->patient_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ip_admission->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ip_admission_view->ExportOptions->render("body") ?>
<?php $ip_admission_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ip_admission_view->showPageHeader(); ?>
<?php
$ip_admission_view->showMessage();
?>
<form name="fip_admissionview" id="fip_admissionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ip_admission_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ip_admission_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="modal" value="<?php echo (int)$ip_admission_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ip_admission->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_id"><script id="tpc_ip_admission_id" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ip_admission->id->cellAttributes() ?>>
<script id="tpx_ip_admission_id" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_id">
<span<?php echo $ip_admission->id->viewAttributes() ?>>
<?php echo $ip_admission->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_mrnNo"><script id="tpc_ip_admission_mrnNo" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->mrnNo->caption() ?></span></script></span></td>
		<td data-name="mrnNo"<?php echo $ip_admission->mrnNo->cellAttributes() ?>>
<script id="tpx_ip_admission_mrnNo" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_mrnNo">
<span<?php echo $ip_admission->mrnNo->viewAttributes() ?>>
<?php echo $ip_admission->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PatientID"><script id="tpc_ip_admission_PatientID" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $ip_admission->PatientID->cellAttributes() ?>>
<script id="tpx_ip_admission_PatientID" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PatientID">
<span<?php echo $ip_admission->PatientID->viewAttributes() ?>>
<?php echo $ip_admission->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_patient_name"><script id="tpc_ip_admission_patient_name" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->patient_name->caption() ?></span></script></span></td>
		<td data-name="patient_name"<?php echo $ip_admission->patient_name->cellAttributes() ?>>
<script id="tpx_ip_admission_patient_name" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_patient_name">
<span<?php echo $ip_admission->patient_name->viewAttributes() ?>>
<?php echo $ip_admission->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
	<tr id="r_mobileno">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_mobileno"><script id="tpc_ip_admission_mobileno" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->mobileno->caption() ?></span></script></span></td>
		<td data-name="mobileno"<?php echo $ip_admission->mobileno->cellAttributes() ?>>
<script id="tpx_ip_admission_mobileno" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_mobileno">
<span<?php echo $ip_admission->mobileno->viewAttributes() ?>>
<?php echo $ip_admission->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_gender"><script id="tpc_ip_admission_gender" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->gender->caption() ?></span></script></span></td>
		<td data-name="gender"<?php echo $ip_admission->gender->cellAttributes() ?>>
<script id="tpx_ip_admission_gender" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_gender">
<span<?php echo $ip_admission->gender->viewAttributes() ?>>
<?php echo $ip_admission->gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_age"><script id="tpc_ip_admission_age" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->age->caption() ?></span></script></span></td>
		<td data-name="age"<?php echo $ip_admission->age->cellAttributes() ?>>
<script id="tpx_ip_admission_age" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_age">
<span<?php echo $ip_admission->age->viewAttributes() ?>>
<?php echo $ip_admission->age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_typeRegsisteration"><script id="tpc_ip_admission_typeRegsisteration" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->typeRegsisteration->caption() ?></span></script></span></td>
		<td data-name="typeRegsisteration"<?php echo $ip_admission->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_ip_admission_typeRegsisteration" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_typeRegsisteration">
<span<?php echo $ip_admission->typeRegsisteration->viewAttributes() ?>>
<?php echo $ip_admission->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PaymentCategory"><script id="tpc_ip_admission_PaymentCategory" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PaymentCategory->caption() ?></span></script></span></td>
		<td data-name="PaymentCategory"<?php echo $ip_admission->PaymentCategory->cellAttributes() ?>>
<script id="tpx_ip_admission_PaymentCategory" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PaymentCategory">
<span<?php echo $ip_admission->PaymentCategory->viewAttributes() ?>>
<?php echo $ip_admission->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_physician_id"><script id="tpc_ip_admission_physician_id" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->physician_id->caption() ?></span></script></span></td>
		<td data-name="physician_id"<?php echo $ip_admission->physician_id->cellAttributes() ?>>
<script id="tpx_ip_admission_physician_id" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_physician_id">
<span<?php echo $ip_admission->physician_id->viewAttributes() ?>>
<?php echo $ip_admission->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_admission_consultant_id"><script id="tpc_ip_admission_admission_consultant_id" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->admission_consultant_id->caption() ?></span></script></span></td>
		<td data-name="admission_consultant_id"<?php echo $ip_admission->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_ip_admission_admission_consultant_id" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_admission_consultant_id">
<span<?php echo $ip_admission->admission_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_leading_consultant_id"><script id="tpc_ip_admission_leading_consultant_id" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->leading_consultant_id->caption() ?></span></script></span></td>
		<td data-name="leading_consultant_id"<?php echo $ip_admission->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_ip_admission_leading_consultant_id" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_leading_consultant_id">
<span<?php echo $ip_admission->leading_consultant_id->viewAttributes() ?>>
<?php echo $ip_admission->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_cause"><script id="tpc_ip_admission_cause" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->cause->caption() ?></span></script></span></td>
		<td data-name="cause"<?php echo $ip_admission->cause->cellAttributes() ?>>
<script id="tpx_ip_admission_cause" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_cause">
<span<?php echo $ip_admission->cause->viewAttributes() ?>>
<?php echo $ip_admission->cause->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_admission_date"><script id="tpc_ip_admission_admission_date" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->admission_date->caption() ?></span></script></span></td>
		<td data-name="admission_date"<?php echo $ip_admission->admission_date->cellAttributes() ?>>
<script id="tpx_ip_admission_admission_date" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_admission_date">
<span<?php echo $ip_admission->admission_date->viewAttributes() ?>>
<?php echo $ip_admission->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_release_date"><script id="tpc_ip_admission_release_date" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->release_date->caption() ?></span></script></span></td>
		<td data-name="release_date"<?php echo $ip_admission->release_date->cellAttributes() ?>>
<script id="tpx_ip_admission_release_date" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_release_date">
<span<?php echo $ip_admission->release_date->viewAttributes() ?>>
<?php echo $ip_admission->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PaymentStatus"><script id="tpc_ip_admission_PaymentStatus" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PaymentStatus->caption() ?></span></script></span></td>
		<td data-name="PaymentStatus"<?php echo $ip_admission->PaymentStatus->cellAttributes() ?>>
<script id="tpx_ip_admission_PaymentStatus" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PaymentStatus">
<span<?php echo $ip_admission->PaymentStatus->viewAttributes() ?>>
<?php echo $ip_admission->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_status"><script id="tpc_ip_admission_status" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $ip_admission->status->cellAttributes() ?>>
<script id="tpx_ip_admission_status" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_status">
<span<?php echo $ip_admission->status->viewAttributes() ?>>
<?php echo $ip_admission->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_createdby"><script id="tpc_ip_admission_createdby" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $ip_admission->createdby->cellAttributes() ?>>
<script id="tpx_ip_admission_createdby" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_createdby">
<span<?php echo $ip_admission->createdby->viewAttributes() ?>>
<?php echo $ip_admission->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_createddatetime"><script id="tpc_ip_admission_createddatetime" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $ip_admission->createddatetime->cellAttributes() ?>>
<script id="tpx_ip_admission_createddatetime" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_createddatetime">
<span<?php echo $ip_admission->createddatetime->viewAttributes() ?>>
<?php echo $ip_admission->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_modifiedby"><script id="tpc_ip_admission_modifiedby" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $ip_admission->modifiedby->cellAttributes() ?>>
<script id="tpx_ip_admission_modifiedby" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_modifiedby">
<span<?php echo $ip_admission->modifiedby->viewAttributes() ?>>
<?php echo $ip_admission->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_modifieddatetime"><script id="tpc_ip_admission_modifieddatetime" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $ip_admission->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ip_admission_modifieddatetime" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_modifieddatetime">
<span<?php echo $ip_admission->modifieddatetime->viewAttributes() ?>>
<?php echo $ip_admission->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_profilePic"><script id="tpc_ip_admission_profilePic" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $ip_admission->profilePic->cellAttributes() ?>>
<script id="tpx_ip_admission_profilePic" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_profilePic">
<span<?php echo $ip_admission->profilePic->viewAttributes() ?>>
<?php echo $ip_admission->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_HospID"><script id="tpc_ip_admission_HospID" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $ip_admission->HospID->cellAttributes() ?>>
<script id="tpx_ip_admission_HospID" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_HospID">
<span<?php echo $ip_admission->HospID->viewAttributes() ?>>
<?php echo $ip_admission->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->DOB->Visible) { // DOB ?>
	<tr id="r_DOB">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_DOB"><script id="tpc_ip_admission_DOB" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->DOB->caption() ?></span></script></span></td>
		<td data-name="DOB"<?php echo $ip_admission->DOB->cellAttributes() ?>>
<script id="tpx_ip_admission_DOB" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_DOB">
<span<?php echo $ip_admission->DOB->viewAttributes() ?>>
<?php echo $ip_admission->DOB->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferedByDr"><script id="tpc_ip_admission_ReferedByDr" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ReferedByDr->caption() ?></span></script></span></td>
		<td data-name="ReferedByDr"<?php echo $ip_admission->ReferedByDr->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferedByDr" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ReferedByDr">
<span<?php echo $ip_admission->ReferedByDr->viewAttributes() ?>>
<?php echo $ip_admission->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferClinicname"><script id="tpc_ip_admission_ReferClinicname" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ReferClinicname->caption() ?></span></script></span></td>
		<td data-name="ReferClinicname"<?php echo $ip_admission->ReferClinicname->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferClinicname" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ReferClinicname">
<span<?php echo $ip_admission->ReferClinicname->viewAttributes() ?>>
<?php echo $ip_admission->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferCity"><script id="tpc_ip_admission_ReferCity" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ReferCity->caption() ?></span></script></span></td>
		<td data-name="ReferCity"<?php echo $ip_admission->ReferCity->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferCity" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ReferCity">
<span<?php echo $ip_admission->ReferCity->viewAttributes() ?>>
<?php echo $ip_admission->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferMobileNo"><script id="tpc_ip_admission_ReferMobileNo" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ReferMobileNo->caption() ?></span></script></span></td>
		<td data-name="ReferMobileNo"<?php echo $ip_admission->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferMobileNo" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ReferMobileNo">
<span<?php echo $ip_admission->ReferMobileNo->viewAttributes() ?>>
<?php echo $ip_admission->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant"><script id="tpc_ip_admission_ReferA4TreatingConsultant" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ReferA4TreatingConsultant->caption() ?></span></script></span></td>
		<td data-name="ReferA4TreatingConsultant"<?php echo $ip_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_ip_admission_ReferA4TreatingConsultant" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ReferA4TreatingConsultant">
<span<?php echo $ip_admission->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $ip_admission->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PurposreReferredfor"><script id="tpc_ip_admission_PurposreReferredfor" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PurposreReferredfor->caption() ?></span></script></span></td>
		<td data-name="PurposreReferredfor"<?php echo $ip_admission->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_ip_admission_PurposreReferredfor" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PurposreReferredfor">
<span<?php echo $ip_admission->PurposreReferredfor->viewAttributes() ?>>
<?php echo $ip_admission->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
	<tr id="r_BillClosing">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillClosing"><script id="tpc_ip_admission_BillClosing" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->BillClosing->caption() ?></span></script></span></td>
		<td data-name="BillClosing"<?php echo $ip_admission->BillClosing->cellAttributes() ?>>
<script id="tpx_ip_admission_BillClosing" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_BillClosing">
<span<?php echo $ip_admission->BillClosing->viewAttributes() ?>>
<?php echo $ip_admission->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
	<tr id="r_BillClosingDate">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillClosingDate"><script id="tpc_ip_admission_BillClosingDate" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->BillClosingDate->caption() ?></span></script></span></td>
		<td data-name="BillClosingDate"<?php echo $ip_admission->BillClosingDate->cellAttributes() ?>>
<script id="tpx_ip_admission_BillClosingDate" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_BillClosingDate">
<span<?php echo $ip_admission->BillClosingDate->viewAttributes() ?>>
<?php echo $ip_admission->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillNumber"><script id="tpc_ip_admission_BillNumber" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $ip_admission->BillNumber->cellAttributes() ?>>
<script id="tpx_ip_admission_BillNumber" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_BillNumber">
<span<?php echo $ip_admission->BillNumber->viewAttributes() ?>>
<?php echo $ip_admission->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
	<tr id="r_ClosingAmount">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ClosingAmount"><script id="tpc_ip_admission_ClosingAmount" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ClosingAmount->caption() ?></span></script></span></td>
		<td data-name="ClosingAmount"<?php echo $ip_admission->ClosingAmount->cellAttributes() ?>>
<script id="tpx_ip_admission_ClosingAmount" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ClosingAmount">
<span<?php echo $ip_admission->ClosingAmount->viewAttributes() ?>>
<?php echo $ip_admission->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
	<tr id="r_ClosingType">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ClosingType"><script id="tpc_ip_admission_ClosingType" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ClosingType->caption() ?></span></script></span></td>
		<td data-name="ClosingType"<?php echo $ip_admission->ClosingType->cellAttributes() ?>>
<script id="tpx_ip_admission_ClosingType" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ClosingType">
<span<?php echo $ip_admission->ClosingType->viewAttributes() ?>>
<?php echo $ip_admission->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
	<tr id="r_BillAmount">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillAmount"><script id="tpc_ip_admission_BillAmount" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->BillAmount->caption() ?></span></script></span></td>
		<td data-name="BillAmount"<?php echo $ip_admission->BillAmount->cellAttributes() ?>>
<script id="tpx_ip_admission_BillAmount" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_BillAmount">
<span<?php echo $ip_admission->BillAmount->viewAttributes() ?>>
<?php echo $ip_admission->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
	<tr id="r_billclosedBy">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_billclosedBy"><script id="tpc_ip_admission_billclosedBy" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->billclosedBy->caption() ?></span></script></span></td>
		<td data-name="billclosedBy"<?php echo $ip_admission->billclosedBy->cellAttributes() ?>>
<script id="tpx_ip_admission_billclosedBy" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_billclosedBy">
<span<?php echo $ip_admission->billclosedBy->viewAttributes() ?>>
<?php echo $ip_admission->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<tr id="r_bllcloseByDate">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_bllcloseByDate"><script id="tpc_ip_admission_bllcloseByDate" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->bllcloseByDate->caption() ?></span></script></span></td>
		<td data-name="bllcloseByDate"<?php echo $ip_admission->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_ip_admission_bllcloseByDate" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_bllcloseByDate">
<span<?php echo $ip_admission->bllcloseByDate->viewAttributes() ?>>
<?php echo $ip_admission->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReportHeader"><script id="tpc_ip_admission_ReportHeader" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->ReportHeader->caption() ?></span></script></span></td>
		<td data-name="ReportHeader"<?php echo $ip_admission->ReportHeader->cellAttributes() ?>>
<script id="tpx_ip_admission_ReportHeader" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_ReportHeader">
<span<?php echo $ip_admission->ReportHeader->viewAttributes() ?>>
<?php echo $ip_admission->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_Procedure"><script id="tpc_ip_admission_Procedure" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->Procedure->caption() ?></span></script></span></td>
		<td data-name="Procedure"<?php echo $ip_admission->Procedure->cellAttributes() ?>>
<script id="tpx_ip_admission_Procedure" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_Procedure">
<span<?php echo $ip_admission->Procedure->viewAttributes() ?>>
<?php echo $ip_admission->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_Consultant"><script id="tpc_ip_admission_Consultant" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->Consultant->caption() ?></span></script></span></td>
		<td data-name="Consultant"<?php echo $ip_admission->Consultant->cellAttributes() ?>>
<script id="tpx_ip_admission_Consultant" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_Consultant">
<span<?php echo $ip_admission->Consultant->viewAttributes() ?>>
<?php echo $ip_admission->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
	<tr id="r_Anesthetist">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_Anesthetist"><script id="tpc_ip_admission_Anesthetist" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->Anesthetist->caption() ?></span></script></span></td>
		<td data-name="Anesthetist"<?php echo $ip_admission->Anesthetist->cellAttributes() ?>>
<script id="tpx_ip_admission_Anesthetist" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_Anesthetist">
<span<?php echo $ip_admission->Anesthetist->viewAttributes() ?>>
<?php echo $ip_admission->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->Amound->Visible) { // Amound ?>
	<tr id="r_Amound">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_Amound"><script id="tpc_ip_admission_Amound" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->Amound->caption() ?></span></script></span></td>
		<td data-name="Amound"<?php echo $ip_admission->Amound->cellAttributes() ?>>
<script id="tpx_ip_admission_Amound" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_Amound">
<span<?php echo $ip_admission->Amound->viewAttributes() ?>>
<?php echo $ip_admission->Amound->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->Package->Visible) { // Package ?>
	<tr id="r_Package">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_Package"><script id="tpc_ip_admission_Package" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->Package->caption() ?></span></script></span></td>
		<td data-name="Package"<?php echo $ip_admission->Package->cellAttributes() ?>>
<script id="tpx_ip_admission_Package" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_Package">
<span<?php echo $ip_admission->Package->viewAttributes() ?>>
<?php echo $ip_admission->Package->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_patient_id"><script id="tpc_ip_admission_patient_id" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->patient_id->caption() ?></span></script></span></td>
		<td data-name="patient_id"<?php echo $ip_admission->patient_id->cellAttributes() ?>>
<script id="tpx_ip_admission_patient_id" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_patient_id">
<span<?php echo $ip_admission->patient_id->viewAttributes() ?>>
<?php echo $ip_admission->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
	<tr id="r_PartnerID">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerID"><script id="tpc_ip_admission_PartnerID" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PartnerID->caption() ?></span></script></span></td>
		<td data-name="PartnerID"<?php echo $ip_admission->PartnerID->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerID" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PartnerID">
<span<?php echo $ip_admission->PartnerID->viewAttributes() ?>>
<?php echo $ip_admission->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerName"><script id="tpc_ip_admission_PartnerName" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $ip_admission->PartnerName->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerName" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PartnerName">
<span<?php echo $ip_admission->PartnerName->viewAttributes() ?>>
<?php echo $ip_admission->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
	<tr id="r_PartnerMobile">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerMobile"><script id="tpc_ip_admission_PartnerMobile" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PartnerMobile->caption() ?></span></script></span></td>
		<td data-name="PartnerMobile"<?php echo $ip_admission->PartnerMobile->cellAttributes() ?>>
<script id="tpx_ip_admission_PartnerMobile" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PartnerMobile">
<span<?php echo $ip_admission->PartnerMobile->viewAttributes() ?>>
<?php echo $ip_admission->PartnerMobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->Cid->Visible) { // Cid ?>
	<tr id="r_Cid">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_Cid"><script id="tpc_ip_admission_Cid" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->Cid->caption() ?></span></script></span></td>
		<td data-name="Cid"<?php echo $ip_admission->Cid->cellAttributes() ?>>
<script id="tpx_ip_admission_Cid" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_Cid">
<span<?php echo $ip_admission->Cid->viewAttributes() ?>>
<?php echo $ip_admission->Cid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->PartId->Visible) { // PartId ?>
	<tr id="r_PartId">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartId"><script id="tpc_ip_admission_PartId" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->PartId->caption() ?></span></script></span></td>
		<td data-name="PartId"<?php echo $ip_admission->PartId->cellAttributes() ?>>
<script id="tpx_ip_admission_PartId" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_PartId">
<span<?php echo $ip_admission->PartId->viewAttributes() ?>>
<?php echo $ip_admission->PartId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
	<tr id="r_IDProof">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_IDProof"><script id="tpc_ip_admission_IDProof" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->IDProof->caption() ?></span></script></span></td>
		<td data-name="IDProof"<?php echo $ip_admission->IDProof->cellAttributes() ?>>
<script id="tpx_ip_admission_IDProof" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_IDProof">
<span<?php echo $ip_admission->IDProof->viewAttributes() ?>>
<?php echo $ip_admission->IDProof->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<tr id="r_AdviceToOtherHospital">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_AdviceToOtherHospital"><script id="tpc_ip_admission_AdviceToOtherHospital" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->AdviceToOtherHospital->caption() ?></span></script></span></td>
		<td data-name="AdviceToOtherHospital"<?php echo $ip_admission->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_ip_admission_AdviceToOtherHospital" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_AdviceToOtherHospital">
<span<?php echo $ip_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $ip_admission->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ip_admission->Reason->Visible) { // Reason ?>
	<tr id="r_Reason">
		<td class="<?php echo $ip_admission_view->TableLeftColumnClass ?>"><span id="elh_ip_admission_Reason"><script id="tpc_ip_admission_Reason" class="ip_admissionview" type="text/html"><span><?php echo $ip_admission->Reason->caption() ?></span></script></span></td>
		<td data-name="Reason"<?php echo $ip_admission->Reason->cellAttributes() ?>>
<script id="tpx_ip_admission_Reason" class="ip_admissionview" type="text/html">
<span id="el_ip_admission_Reason">
<span<?php echo $ip_admission->Reason->viewAttributes() ?>>
<?php echo $ip_admission->Reason->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ip_admissionview" class="ew-custom-template"></div>
<script id="tpm_ip_admissionview" type="text/html">
<div id="ct_ip_admission_view"><style>
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
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Select Patient </h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_patient_id"/}}&nbsp;{{include tmpl="#tpx_ip_admission_patient_id"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_patient_name"/}}&nbsp;{{include tmpl="#tpx_ip_admission_patient_name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_mobileno"/}}&nbsp;{{include tmpl="#tpx_ip_admission_mobileno"/}}</span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PatientID"/}}&nbsp;{{include tmpl="#tpx_ip_admission_PatientID"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_mrnNo"/}}&nbsp;{{include tmpl="#tpx_ip_admission_mrnNo"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_gender"/}}&nbsp;{{include tmpl="#tpx_ip_admission_gender"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_age"/}}&nbsp;{{include tmpl="#tpx_ip_admission_age"/}}</span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_DOB"/}}&nbsp;{{include tmpl="#tpx_ip_admission_DOB"/}}</span>
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
				<h3 class="card-title">Patient Visit Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_physician_id"/}}&nbsp;{{include tmpl="#tpx_ip_admission_physician_id"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_typeRegsisteration"/}}&nbsp;{{include tmpl="#tpx_ip_admission_typeRegsisteration"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PaymentCategory"/}}&nbsp;{{include tmpl="#tpx_ip_admission_PaymentCategory"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PaymentStatus"/}}&nbsp;{{include tmpl="#tpx_ip_admission_PaymentStatus"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferedByDr"/}}&nbsp;{{include tmpl="#tpx_ip_admission_ReferedByDr"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferClinicname"/}}&nbsp;{{include tmpl="#tpx_ip_admission_ReferClinicname"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferCity"/}}&nbsp;{{include tmpl="#tpx_ip_admission_ReferCity"/}}</span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferMobileNo"/}}&nbsp;{{include tmpl="#tpx_ip_admission_ReferMobileNo"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_ReferA4TreatingConsultant"/}}&nbsp;{{include tmpl="#tpx_ip_admission_ReferA4TreatingConsultant"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ip_admission_PurposreReferredfor"/}}&nbsp;{{include tmpl="#tpx_ip_admission_PurposreReferredfor"/}}</span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("patient_vitals", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_vitals->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_vitals", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_vitalsgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_history", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_history->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_history", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_historygrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_provisional_diagnosis", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_provisional_diagnosis->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_provisional_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_provisional_diagnosisgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_prescription", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_prescription->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_prescription", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_prescriptiongrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_final_diagnosis", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_final_diagnosis->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_final_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_final_diagnosisgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_follow_up", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_follow_up->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_follow_up", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_follow_upgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_ot_delivery_register", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_ot_delivery_register->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_ot_delivery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_ot_delivery_registergrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_ot_surgery_register", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_ot_surgery_register->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_ot_surgery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_ot_surgery_registergrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_services", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_services->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_servicesgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_investigations", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_investigations->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_investigations", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_investigationsgrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_insurance", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_insurance->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_insurance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_insurancegrid.php" ?>
<?php } ?>
<?php
	if (in_array("pharmacy_pharled", explode(",", $ip_admission->getCurrentDetailTable())) && $pharmacy_pharled->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_pharledgrid.php" ?>
<?php } ?>
<?php
	if (in_array("view_ip_advance", explode(",", $ip_admission->getCurrentDetailTable())) && $view_ip_advance->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_ip_advance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_ip_advancegrid.php" ?>
<?php } ?>
<?php
	if (in_array("patient_room", explode(",", $ip_admission->getCurrentDetailTable())) && $patient_room->DetailView) {
?>
<?php if ($ip_admission->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_room", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_roomgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ip_admission->Rows) ?> };
ew.applyTemplate("tpd_ip_admissionview", "tpm_ip_admissionview", "ip_admissionview", "<?php echo $ip_admission->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ip_admissionview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ip_admission_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ip_admission->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ip_admission_view->terminate();
?>