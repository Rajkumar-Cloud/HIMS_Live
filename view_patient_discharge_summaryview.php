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
$view_patient_discharge_summary_view = new view_patient_discharge_summary_view();

// Run the page
$view_patient_discharge_summary_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_patient_discharge_summary_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_patient_discharge_summaryview = currentForm = new ew.Form("fview_patient_discharge_summaryview", "view");

// Form_CustomValidate event
fview_patient_discharge_summaryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_patient_discharge_summaryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_patient_discharge_summaryview.lists["x_physician_id"] = <?php echo $view_patient_discharge_summary_view->physician_id->Lookup->toClientList() ?>;
fview_patient_discharge_summaryview.lists["x_physician_id"].options = <?php echo JsonEncode($view_patient_discharge_summary_view->physician_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_patient_discharge_summary_view->ExportOptions->render("body") ?>
<?php $view_patient_discharge_summary_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_patient_discharge_summary_view->showPageHeader(); ?>
<?php
$view_patient_discharge_summary_view->showMessage();
?>
<form name="fview_patient_discharge_summaryview" id="fview_patient_discharge_summaryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_patient_discharge_summary_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_patient_discharge_summary_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_patient_discharge_summary">
<input type="hidden" name="modal" value="<?php echo (int)$view_patient_discharge_summary_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_patient_discharge_summary->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_id"><script id="tpc_view_patient_discharge_summary_id" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_patient_discharge_summary->id->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_id" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_id">
<span<?php echo $view_patient_discharge_summary->id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_PatientID"><script id="tpc_view_patient_discharge_summary_PatientID" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_patient_discharge_summary->PatientID->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_PatientID" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_PatientID">
<span<?php echo $view_patient_discharge_summary->PatientID->viewAttributes() ?>>
<?php if ((!EmptyString($view_patient_discharge_summary->PatientID->getViewValue())) && $view_patient_discharge_summary->PatientID->linkAttributes() <> "") { ?>
<a<?php echo $view_patient_discharge_summary->PatientID->linkAttributes() ?>><?php echo $view_patient_discharge_summary->PatientID->getViewValue() ?></a>
<?php } else { ?>
<?php echo $view_patient_discharge_summary->PatientID->getViewValue() ?>
<?php } ?>
</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_patient_name"><script id="tpc_view_patient_discharge_summary_patient_name" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->patient_name->caption() ?></span></script></span></td>
		<td data-name="patient_name"<?php echo $view_patient_discharge_summary->patient_name->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_patient_name" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_patient_name">
<span<?php echo $view_patient_discharge_summary->patient_name->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_profilePic"><script id="tpc_view_patient_discharge_summary_profilePic" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_patient_discharge_summary->profilePic->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_profilePic" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_profilePic">
<span<?php echo $view_patient_discharge_summary->profilePic->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_gender"><script id="tpc_view_patient_discharge_summary_gender" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->gender->caption() ?></span></script></span></td>
		<td data-name="gender"<?php echo $view_patient_discharge_summary->gender->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_gender" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_gender">
<span<?php echo $view_patient_discharge_summary->gender->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_age"><script id="tpc_view_patient_discharge_summary_age" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->age->caption() ?></span></script></span></td>
		<td data-name="age"<?php echo $view_patient_discharge_summary->age->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_age" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_age">
<span<?php echo $view_patient_discharge_summary->age->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_physician_id"><script id="tpc_view_patient_discharge_summary_physician_id" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->physician_id->caption() ?></span></script></span></td>
		<td data-name="physician_id"<?php echo $view_patient_discharge_summary->physician_id->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_physician_id" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_physician_id">
<span<?php echo $view_patient_discharge_summary->physician_id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_typeRegsisteration"><script id="tpc_view_patient_discharge_summary_typeRegsisteration" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->typeRegsisteration->caption() ?></span></script></span></td>
		<td data-name="typeRegsisteration"<?php echo $view_patient_discharge_summary->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_typeRegsisteration" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_typeRegsisteration">
<span<?php echo $view_patient_discharge_summary->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_PaymentCategory"><script id="tpc_view_patient_discharge_summary_PaymentCategory" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->PaymentCategory->caption() ?></span></script></span></td>
		<td data-name="PaymentCategory"<?php echo $view_patient_discharge_summary->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_PaymentCategory" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_PaymentCategory">
<span<?php echo $view_patient_discharge_summary->PaymentCategory->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_admission_consultant_id"><script id="tpc_view_patient_discharge_summary_admission_consultant_id" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->admission_consultant_id->caption() ?></span></script></span></td>
		<td data-name="admission_consultant_id"<?php echo $view_patient_discharge_summary->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_admission_consultant_id" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_admission_consultant_id">
<span<?php echo $view_patient_discharge_summary->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_leading_consultant_id"><script id="tpc_view_patient_discharge_summary_leading_consultant_id" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->leading_consultant_id->caption() ?></span></script></span></td>
		<td data-name="leading_consultant_id"<?php echo $view_patient_discharge_summary->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_leading_consultant_id" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_leading_consultant_id">
<span<?php echo $view_patient_discharge_summary->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_cause"><script id="tpc_view_patient_discharge_summary_cause" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->cause->caption() ?></span></script></span></td>
		<td data-name="cause"<?php echo $view_patient_discharge_summary->cause->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_cause" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_cause">
<span<?php echo $view_patient_discharge_summary->cause->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->cause->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_admission_date"><script id="tpc_view_patient_discharge_summary_admission_date" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->admission_date->caption() ?></span></script></span></td>
		<td data-name="admission_date"<?php echo $view_patient_discharge_summary->admission_date->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_admission_date" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_admission_date">
<span<?php echo $view_patient_discharge_summary->admission_date->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_release_date"><script id="tpc_view_patient_discharge_summary_release_date" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->release_date->caption() ?></span></script></span></td>
		<td data-name="release_date"<?php echo $view_patient_discharge_summary->release_date->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_release_date" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_release_date">
<span<?php echo $view_patient_discharge_summary->release_date->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_PaymentStatus"><script id="tpc_view_patient_discharge_summary_PaymentStatus" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->PaymentStatus->caption() ?></span></script></span></td>
		<td data-name="PaymentStatus"<?php echo $view_patient_discharge_summary->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_PaymentStatus" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_PaymentStatus">
<span<?php echo $view_patient_discharge_summary->PaymentStatus->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_HospID"><script id="tpc_view_patient_discharge_summary_HospID" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_patient_discharge_summary->HospID->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_HospID" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_HospID">
<span<?php echo $view_patient_discharge_summary->HospID->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_status"><script id="tpc_view_patient_discharge_summary_status" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_patient_discharge_summary->status->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_status" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_status">
<span<?php echo $view_patient_discharge_summary->status->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_mrnNo"><script id="tpc_view_patient_discharge_summary_mrnNo" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->mrnNo->caption() ?></span></script></span></td>
		<td data-name="mrnNo"<?php echo $view_patient_discharge_summary->mrnNo->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_mrnNo" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_mrnNo">
<span<?php echo $view_patient_discharge_summary->mrnNo->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_createdby"><script id="tpc_view_patient_discharge_summary_createdby" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_patient_discharge_summary->createdby->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_createdby" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_createdby">
<span<?php echo $view_patient_discharge_summary->createdby->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_createddatetime"><script id="tpc_view_patient_discharge_summary_createddatetime" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_patient_discharge_summary->createddatetime->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_createddatetime" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_createddatetime">
<span<?php echo $view_patient_discharge_summary->createddatetime->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_modifiedby"><script id="tpc_view_patient_discharge_summary_modifiedby" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_patient_discharge_summary->modifiedby->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_modifiedby" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_modifiedby">
<span<?php echo $view_patient_discharge_summary->modifiedby->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_modifieddatetime"><script id="tpc_view_patient_discharge_summary_modifieddatetime" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_patient_discharge_summary->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_modifieddatetime" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_modifieddatetime">
<span<?php echo $view_patient_discharge_summary->modifieddatetime->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->provisional_diagnosis->Visible) { // provisional_diagnosis ?>
	<tr id="r_provisional_diagnosis">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_provisional_diagnosis"><script id="tpc_view_patient_discharge_summary_provisional_diagnosis" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->provisional_diagnosis->caption() ?></span></script></span></td>
		<td data-name="provisional_diagnosis"<?php echo $view_patient_discharge_summary->provisional_diagnosis->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_provisional_diagnosis" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_provisional_diagnosis">
<span<?php echo $view_patient_discharge_summary->provisional_diagnosis->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->provisional_diagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->Treatments->Visible) { // Treatments ?>
	<tr id="r_Treatments">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_Treatments"><script id="tpc_view_patient_discharge_summary_Treatments" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->Treatments->caption() ?></span></script></span></td>
		<td data-name="Treatments"<?php echo $view_patient_discharge_summary->Treatments->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_Treatments" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_Treatments">
<span<?php echo $view_patient_discharge_summary->Treatments->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->Treatments->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<tr id="r_FinalDiagnosis">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_FinalDiagnosis"><script id="tpc_view_patient_discharge_summary_FinalDiagnosis" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->FinalDiagnosis->caption() ?></span></script></span></td>
		<td data-name="FinalDiagnosis"<?php echo $view_patient_discharge_summary->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_FinalDiagnosis" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_FinalDiagnosis">
<span<?php echo $view_patient_discharge_summary->FinalDiagnosis->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->FinalDiagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_BP"><script id="tpc_view_patient_discharge_summary_BP" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->BP->caption() ?></span></script></span></td>
		<td data-name="BP"<?php echo $view_patient_discharge_summary->BP->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_BP" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_BP">
<span<?php echo $view_patient_discharge_summary->BP->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->BP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_Pulse"><script id="tpc_view_patient_discharge_summary_Pulse" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->Pulse->caption() ?></span></script></span></td>
		<td data-name="Pulse"<?php echo $view_patient_discharge_summary->Pulse->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_Pulse" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_Pulse">
<span<?php echo $view_patient_discharge_summary->Pulse->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->Pulse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->Resp->Visible) { // Resp ?>
	<tr id="r_Resp">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_Resp"><script id="tpc_view_patient_discharge_summary_Resp" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->Resp->caption() ?></span></script></span></td>
		<td data-name="Resp"<?php echo $view_patient_discharge_summary->Resp->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_Resp" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_Resp">
<span<?php echo $view_patient_discharge_summary->Resp->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->Resp->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->SPO2->Visible) { // SPO2 ?>
	<tr id="r_SPO2">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_SPO2"><script id="tpc_view_patient_discharge_summary_SPO2" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->SPO2->caption() ?></span></script></span></td>
		<td data-name="SPO2"<?php echo $view_patient_discharge_summary->SPO2->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_SPO2" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_SPO2">
<span<?php echo $view_patient_discharge_summary->SPO2->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->SPO2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->FollowupAdvice->Visible) { // FollowupAdvice ?>
	<tr id="r_FollowupAdvice">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_FollowupAdvice"><script id="tpc_view_patient_discharge_summary_FollowupAdvice" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->FollowupAdvice->caption() ?></span></script></span></td>
		<td data-name="FollowupAdvice"<?php echo $view_patient_discharge_summary->FollowupAdvice->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_FollowupAdvice" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_FollowupAdvice">
<span<?php echo $view_patient_discharge_summary->FollowupAdvice->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->FollowupAdvice->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_NextReviewDate"><script id="tpc_view_patient_discharge_summary_NextReviewDate" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->NextReviewDate->caption() ?></span></script></span></td>
		<td data-name="NextReviewDate"<?php echo $view_patient_discharge_summary->NextReviewDate->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_NextReviewDate" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_NextReviewDate">
<span<?php echo $view_patient_discharge_summary->NextReviewDate->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->NextReviewDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->History->Visible) { // History ?>
	<tr id="r_History">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_History"><script id="tpc_view_patient_discharge_summary_History" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->History->caption() ?></span></script></span></td>
		<td data-name="History"<?php echo $view_patient_discharge_summary->History->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_History" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_History">
<span<?php echo $view_patient_discharge_summary->History->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->History->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_patient_id"><script id="tpc_view_patient_discharge_summary_patient_id" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->patient_id->caption() ?></span></script></span></td>
		<td data-name="patient_id"<?php echo $view_patient_discharge_summary->patient_id->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_patient_id" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_patient_id">
<span<?php echo $view_patient_discharge_summary->patient_id->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->vitals->Visible) { // vitals ?>
	<tr id="r_vitals">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_vitals"><script id="tpc_view_patient_discharge_summary_vitals" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->vitals->caption() ?></span></script></span></td>
		<td data-name="vitals"<?php echo $view_patient_discharge_summary->vitals->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_vitals" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_vitals">
<span<?php echo $view_patient_discharge_summary->vitals->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->vitals->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->courseinhospital->Visible) { // courseinhospital ?>
	<tr id="r_courseinhospital">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_courseinhospital"><script id="tpc_view_patient_discharge_summary_courseinhospital" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->courseinhospital->caption() ?></span></script></span></td>
		<td data-name="courseinhospital"<?php echo $view_patient_discharge_summary->courseinhospital->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_courseinhospital" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_courseinhospital">
<span<?php echo $view_patient_discharge_summary->courseinhospital->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->courseinhospital->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_procedurenotes"><script id="tpc_view_patient_discharge_summary_procedurenotes" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->procedurenotes->caption() ?></span></script></span></td>
		<td data-name="procedurenotes"<?php echo $view_patient_discharge_summary->procedurenotes->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_procedurenotes" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_procedurenotes">
<span<?php echo $view_patient_discharge_summary->procedurenotes->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->procedurenotes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->conditionatdischarge->Visible) { // conditionatdischarge ?>
	<tr id="r_conditionatdischarge">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_conditionatdischarge"><script id="tpc_view_patient_discharge_summary_conditionatdischarge" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->conditionatdischarge->caption() ?></span></script></span></td>
		<td data-name="conditionatdischarge"<?php echo $view_patient_discharge_summary->conditionatdischarge->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_conditionatdischarge" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_conditionatdischarge">
<span<?php echo $view_patient_discharge_summary->conditionatdischarge->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->conditionatdischarge->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
	<tr id="r_AdviceToOtherHospital">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_AdviceToOtherHospital"><script id="tpc_view_patient_discharge_summary_AdviceToOtherHospital" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->AdviceToOtherHospital->caption() ?></span></script></span></td>
		<td data-name="AdviceToOtherHospital"<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_AdviceToOtherHospital" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_AdviceToOtherHospital">
<span<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_ReferedByDr"><script id="tpc_view_patient_discharge_summary_ReferedByDr" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->ReferedByDr->caption() ?></span></script></span></td>
		<td data-name="ReferedByDr"<?php echo $view_patient_discharge_summary->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_ReferedByDr" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_ReferedByDr">
<span<?php echo $view_patient_discharge_summary->ReferedByDr->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->DischargeAdviceMedicine->Visible) { // DischargeAdviceMedicine ?>
	<tr id="r_DischargeAdviceMedicine">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_DischargeAdviceMedicine"><script id="tpc_view_patient_discharge_summary_DischargeAdviceMedicine" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->DischargeAdviceMedicine->caption() ?></span></script></span></td>
		<td data-name="DischargeAdviceMedicine"<?php echo $view_patient_discharge_summary->DischargeAdviceMedicine->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_DischargeAdviceMedicine" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_DischargeAdviceMedicine">
<span<?php echo $view_patient_discharge_summary->DischargeAdviceMedicine->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->DischargeAdviceMedicine->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_patient_discharge_summary->vid->Visible) { // vid ?>
	<tr id="r_vid">
		<td class="<?php echo $view_patient_discharge_summary_view->TableLeftColumnClass ?>"><span id="elh_view_patient_discharge_summary_vid"><script id="tpc_view_patient_discharge_summary_vid" class="view_patient_discharge_summaryview" type="text/html"><span><?php echo $view_patient_discharge_summary->vid->caption() ?></span></script></span></td>
		<td data-name="vid"<?php echo $view_patient_discharge_summary->vid->cellAttributes() ?>>
<script id="tpx_view_patient_discharge_summary_vid" class="view_patient_discharge_summaryview" type="text/html">
<span id="el_view_patient_discharge_summary_vid">
<span<?php echo $view_patient_discharge_summary->vid->viewAttributes() ?>>
<?php echo $view_patient_discharge_summary->vid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_patient_discharge_summaryview" class="ew-custom-template"></div>
<script id="tpm_view_patient_discharge_summaryview" type="text/html">
<div id="ct_view_patient_discharge_summary_view"><style>
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
<h2 align="center">DISCHARGE SUMMARY</h2>
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
 <?php
				if($Page->ReferedByDr->CurrentValue != '')
				{
					$ReferedByDr = $Page->ReferedByDr->CurrentValue;
					echo "<tr><td style='width:280px;'><font size='4' style='font-weight: bold;'>Refered By</td><td>:</font> " . $ReferedByDr . "</td></tr>";
				}
?>
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
if($Page->courseinhospital->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Course In Hospital	: </font>'. $Page->courseinhospital->CurrentValue ;
}
?>
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
<p>
<?php
if($Page->DischargeAdviceMedicine->CurrentValue != '')
{
	echo '<font size="4" style="font-weight: bold;">Discharge Advice Medicine	: </font>'. $Page->DischargeAdviceMedicine->CurrentValue ;
}
?>
</p>
</tr>
</table> 
 <?php
 $hhha = '<font size="4" style="font-weight: bold;">Discharge Advice Medicine:</font>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>Medicine</b></td>
<td><b>M</b></td>
<td><b>A</b></td>
<td><b>N</b></td>
<td><b>NoOfDays</b></td>
<td><b>Route</b></td>
<td><b>TimeOfTaking</b></td>
</tr>';
			$Reception = $Page->id->CurrentValue;
			$patient_id = $Page->patient_id->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$patient_id."' and Type='Discharge Advice' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Preid =  $row["id"];
				$Medicine =  $row["Medicine"];
				$M =  $row["M"];
				$A =  $row["A"];
				$N =  $row["N"];
				$NoOfDays =  $row["NoOfDays"];
				$PreRoute =  $row["PreRoute"];
				$TimeOfTaking =  $row["TimeOfTaking"];
				$hhh .= '<tr><td>'.$Medicine.'</td><td>'.$M.'</td><td>'.$A.'</td><td>'.$N.'</td><td>'.$NoOfDays.'</td><td>'.$PreRoute.'</td><td>'.$TimeOfTaking.'</td></tr>  ';
				$jjjj = "QQQ";
	$rs->MoveNext();
}
if($jjjj == "QQQ")
{
	echo $hhha . $hhh . '</table>' ;
}
?>		
<p><?php echo '<font size="4" style="font-weight: bold;">Follow up Advice	: </font>'.$Page->FollowupAdvice->CurrentValue; ?></p>
<font size="4">
<?php
					  $originalDate = $Page->NextReviewDate->CurrentValue;
					  $newDate = date("d/m/Y", strtotime($originalDate));
if($originalDate != '')
{
					  echo '<b>Next Review Date : ' . $newDate;
}
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
ew.vars.templateData = { rows: <?php echo JsonEncode($view_patient_discharge_summary->Rows) ?> };
ew.applyTemplate("tpd_view_patient_discharge_summaryview", "tpm_view_patient_discharge_summaryview", "view_patient_discharge_summaryview", "<?php echo $view_patient_discharge_summary->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_patient_discharge_summaryview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_patient_discharge_summary_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_patient_discharge_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_patient_discharge_summary_view->terminate();
?>