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
<?php include_once "header.php" ?>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ip_admission_bill_summaryview = currentForm = new ew.Form("fview_ip_admission_bill_summaryview", "view");

// Form_CustomValidate event
fview_ip_admission_bill_summaryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_admission_bill_summaryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_admission_bill_summaryview.lists["x_PaymentCategory"] = <?php echo $view_ip_admission_bill_summary_view->PaymentCategory->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryview.lists["x_PaymentCategory"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_view->PaymentCategory->lookupOptions()) ?>;
fview_ip_admission_bill_summaryview.lists["x_PaymentStatus"] = <?php echo $view_ip_admission_bill_summary_view->PaymentStatus->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryview.lists["x_PaymentStatus"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_view->PaymentStatus->lookupOptions()) ?>;
fview_ip_admission_bill_summaryview.lists["x_BillClosing"] = <?php echo $view_ip_admission_bill_summary_view->BillClosing->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryview.lists["x_BillClosing"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_view->BillClosing->options(FALSE, TRUE)) ?>;
fview_ip_admission_bill_summaryview.lists["x_ReportHeader[]"] = <?php echo $view_ip_admission_bill_summary_view->ReportHeader->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryview.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_view->ReportHeader->options(FALSE, TRUE)) ?>;
fview_ip_admission_bill_summaryview.lists["x_Procedure"] = <?php echo $view_ip_admission_bill_summary_view->Procedure->Lookup->toClientList() ?>;
fview_ip_admission_bill_summaryview.lists["x_Procedure"].options = <?php echo JsonEncode($view_ip_admission_bill_summary_view->Procedure->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
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
<?php if ($view_ip_admission_bill_summary_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_admission_bill_summary_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_admission_bill_summary">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_admission_bill_summary_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_admission_bill_summary->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_id"><script id="tpc_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_ip_admission_bill_summary->id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_id" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_id">
<span<?php echo $view_ip_admission_bill_summary->id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->mrnNo->Visible) { // mrnNo ?>
	<tr id="r_mrnNo">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_mrnNo"><script id="tpc_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->mrnNo->caption() ?></span></script></span></td>
		<td data-name="mrnNo"<?php echo $view_ip_admission_bill_summary->mrnNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mrnNo" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_mrnNo">
<span<?php echo $view_ip_admission_bill_summary->mrnNo->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->mrnNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PatientID"><script id="tpc_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_ip_admission_bill_summary->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PatientID" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_PatientID">
<span<?php echo $view_ip_admission_bill_summary->PatientID->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->patient_name->Visible) { // patient_name ?>
	<tr id="r_patient_name">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_patient_name"><script id="tpc_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->patient_name->caption() ?></span></script></span></td>
		<td data-name="patient_name"<?php echo $view_ip_admission_bill_summary->patient_name->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_name" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_patient_name">
<span<?php echo $view_ip_admission_bill_summary->patient_name->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->patient_name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->mobileno->Visible) { // mobileno ?>
	<tr id="r_mobileno">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_mobileno"><script id="tpc_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->mobileno->caption() ?></span></script></span></td>
		<td data-name="mobileno"<?php echo $view_ip_admission_bill_summary->mobileno->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_mobileno" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_mobileno">
<span<?php echo $view_ip_admission_bill_summary->mobileno->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->mobileno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_profilePic"><script id="tpc_view_ip_admission_bill_summary_profilePic" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_ip_admission_bill_summary->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_profilePic" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_profilePic">
<span<?php echo $view_ip_admission_bill_summary->profilePic->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->gender->Visible) { // gender ?>
	<tr id="r_gender">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_gender"><script id="tpc_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->gender->caption() ?></span></script></span></td>
		<td data-name="gender"<?php echo $view_ip_admission_bill_summary->gender->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_gender" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_gender">
<span<?php echo $view_ip_admission_bill_summary->gender->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->age->Visible) { // age ?>
	<tr id="r_age">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_age"><script id="tpc_view_ip_admission_bill_summary_age" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->age->caption() ?></span></script></span></td>
		<td data-name="age"<?php echo $view_ip_admission_bill_summary->age->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_age" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_age">
<span<?php echo $view_ip_admission_bill_summary->age->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->physician_id->Visible) { // physician_id ?>
	<tr id="r_physician_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_physician_id"><script id="tpc_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->physician_id->caption() ?></span></script></span></td>
		<td data-name="physician_id"<?php echo $view_ip_admission_bill_summary->physician_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_physician_id" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_physician_id">
<span<?php echo $view_ip_admission_bill_summary->physician_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->physician_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->typeRegsisteration->Visible) { // typeRegsisteration ?>
	<tr id="r_typeRegsisteration">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_typeRegsisteration"><script id="tpc_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->typeRegsisteration->caption() ?></span></script></span></td>
		<td data-name="typeRegsisteration"<?php echo $view_ip_admission_bill_summary->typeRegsisteration->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_typeRegsisteration" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_typeRegsisteration">
<span<?php echo $view_ip_admission_bill_summary->typeRegsisteration->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->typeRegsisteration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PaymentCategory->Visible) { // PaymentCategory ?>
	<tr id="r_PaymentCategory">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PaymentCategory"><script id="tpc_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PaymentCategory->caption() ?></span></script></span></td>
		<td data-name="PaymentCategory"<?php echo $view_ip_admission_bill_summary->PaymentCategory->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentCategory" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_PaymentCategory">
<span<?php echo $view_ip_admission_bill_summary->PaymentCategory->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PaymentCategory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->admission_consultant_id->Visible) { // admission_consultant_id ?>
	<tr id="r_admission_consultant_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_admission_consultant_id"><script id="tpc_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->admission_consultant_id->caption() ?></span></script></span></td>
		<td data-name="admission_consultant_id"<?php echo $view_ip_admission_bill_summary->admission_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_consultant_id" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_admission_consultant_id">
<span<?php echo $view_ip_admission_bill_summary->admission_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->admission_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->leading_consultant_id->Visible) { // leading_consultant_id ?>
	<tr id="r_leading_consultant_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_leading_consultant_id"><script id="tpc_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->leading_consultant_id->caption() ?></span></script></span></td>
		<td data-name="leading_consultant_id"<?php echo $view_ip_admission_bill_summary->leading_consultant_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_leading_consultant_id" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_leading_consultant_id">
<span<?php echo $view_ip_admission_bill_summary->leading_consultant_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->leading_consultant_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->cause->Visible) { // cause ?>
	<tr id="r_cause">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_cause"><script id="tpc_view_ip_admission_bill_summary_cause" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->cause->caption() ?></span></script></span></td>
		<td data-name="cause"<?php echo $view_ip_admission_bill_summary->cause->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_cause" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_cause">
<span<?php echo $view_ip_admission_bill_summary->cause->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->cause->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->admission_date->Visible) { // admission_date ?>
	<tr id="r_admission_date">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_admission_date"><script id="tpc_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->admission_date->caption() ?></span></script></span></td>
		<td data-name="admission_date"<?php echo $view_ip_admission_bill_summary->admission_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_admission_date" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_admission_date">
<span<?php echo $view_ip_admission_bill_summary->admission_date->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->admission_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->release_date->Visible) { // release_date ?>
	<tr id="r_release_date">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_release_date"><script id="tpc_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->release_date->caption() ?></span></script></span></td>
		<td data-name="release_date"<?php echo $view_ip_admission_bill_summary->release_date->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_release_date" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_release_date">
<span<?php echo $view_ip_admission_bill_summary->release_date->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->release_date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PaymentStatus"><script id="tpc_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PaymentStatus->caption() ?></span></script></span></td>
		<td data-name="PaymentStatus"<?php echo $view_ip_admission_bill_summary->PaymentStatus->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PaymentStatus" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_PaymentStatus">
<span<?php echo $view_ip_admission_bill_summary->PaymentStatus->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_status"><script id="tpc_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $view_ip_admission_bill_summary->status->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_status" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_status">
<span<?php echo $view_ip_admission_bill_summary->status->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_createdby"><script id="tpc_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_ip_admission_bill_summary->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createdby" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_createdby">
<span<?php echo $view_ip_admission_bill_summary->createdby->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_createddatetime"><script id="tpc_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_ip_admission_bill_summary->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_createddatetime" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_createddatetime">
<span<?php echo $view_ip_admission_bill_summary->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_modifiedby"><script id="tpc_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_ip_admission_bill_summary->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifiedby" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_modifiedby">
<span<?php echo $view_ip_admission_bill_summary->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_modifieddatetime"><script id="tpc_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_ip_admission_bill_summary->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_modifieddatetime" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_modifieddatetime">
<span<?php echo $view_ip_admission_bill_summary->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_HospID"><script id="tpc_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_ip_admission_bill_summary->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_HospID" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_HospID">
<span<?php echo $view_ip_admission_bill_summary->HospID->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferedByDr->Visible) { // ReferedByDr ?>
	<tr id="r_ReferedByDr">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferedByDr"><script id="tpc_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferedByDr->caption() ?></span></script></span></td>
		<td data-name="ReferedByDr"<?php echo $view_ip_admission_bill_summary->ReferedByDr->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferedByDr" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferedByDr">
<span<?php echo $view_ip_admission_bill_summary->ReferedByDr->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferedByDr->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferClinicname->Visible) { // ReferClinicname ?>
	<tr id="r_ReferClinicname">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferClinicname"><script id="tpc_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferClinicname->caption() ?></span></script></span></td>
		<td data-name="ReferClinicname"<?php echo $view_ip_admission_bill_summary->ReferClinicname->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferClinicname" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferClinicname">
<span<?php echo $view_ip_admission_bill_summary->ReferClinicname->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferClinicname->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferCity->Visible) { // ReferCity ?>
	<tr id="r_ReferCity">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferCity"><script id="tpc_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferCity->caption() ?></span></script></span></td>
		<td data-name="ReferCity"<?php echo $view_ip_admission_bill_summary->ReferCity->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferCity" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferCity">
<span<?php echo $view_ip_admission_bill_summary->ReferCity->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferCity->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferMobileNo->Visible) { // ReferMobileNo ?>
	<tr id="r_ReferMobileNo">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferMobileNo"><script id="tpc_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferMobileNo->caption() ?></span></script></span></td>
		<td data-name="ReferMobileNo"<?php echo $view_ip_admission_bill_summary->ReferMobileNo->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferMobileNo" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferMobileNo">
<span<?php echo $view_ip_admission_bill_summary->ReferMobileNo->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferMobileNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<tr id="r_ReferA4TreatingConsultant">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReferA4TreatingConsultant"><script id="tpc_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->caption() ?></span></script></span></td>
		<td data-name="ReferA4TreatingConsultant"<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReferA4TreatingConsultant" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReferA4TreatingConsultant">
<span<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
	<tr id="r_PurposreReferredfor">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_PurposreReferredfor"><script id="tpc_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->PurposreReferredfor->caption() ?></span></script></span></td>
		<td data-name="PurposreReferredfor"<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_PurposreReferredfor" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_PurposreReferredfor">
<span<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->PurposreReferredfor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillClosing->Visible) { // BillClosing ?>
	<tr id="r_BillClosing">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillClosing"><script id="tpc_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillClosing->caption() ?></span></script></span></td>
		<td data-name="BillClosing"<?php echo $view_ip_admission_bill_summary->BillClosing->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosing" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillClosing">
<span<?php echo $view_ip_admission_bill_summary->BillClosing->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillClosing->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillClosingDate->Visible) { // BillClosingDate ?>
	<tr id="r_BillClosingDate">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillClosingDate"><script id="tpc_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillClosingDate->caption() ?></span></script></span></td>
		<td data-name="BillClosingDate"<?php echo $view_ip_admission_bill_summary->BillClosingDate->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillClosingDate" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillClosingDate">
<span<?php echo $view_ip_admission_bill_summary->BillClosingDate->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillClosingDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillNumber"><script id="tpc_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_ip_admission_bill_summary->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillNumber" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillNumber">
<span<?php echo $view_ip_admission_bill_summary->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ClosingAmount->Visible) { // ClosingAmount ?>
	<tr id="r_ClosingAmount">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ClosingAmount"><script id="tpc_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ClosingAmount->caption() ?></span></script></span></td>
		<td data-name="ClosingAmount"<?php echo $view_ip_admission_bill_summary->ClosingAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingAmount" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ClosingAmount">
<span<?php echo $view_ip_admission_bill_summary->ClosingAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ClosingAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ClosingType->Visible) { // ClosingType ?>
	<tr id="r_ClosingType">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ClosingType"><script id="tpc_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ClosingType->caption() ?></span></script></span></td>
		<td data-name="ClosingType"<?php echo $view_ip_admission_bill_summary->ClosingType->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ClosingType" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ClosingType">
<span<?php echo $view_ip_admission_bill_summary->ClosingType->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ClosingType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->BillAmount->Visible) { // BillAmount ?>
	<tr id="r_BillAmount">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_BillAmount"><script id="tpc_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->BillAmount->caption() ?></span></script></span></td>
		<td data-name="BillAmount"<?php echo $view_ip_admission_bill_summary->BillAmount->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_BillAmount" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_BillAmount">
<span<?php echo $view_ip_admission_bill_summary->BillAmount->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->BillAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->billclosedBy->Visible) { // billclosedBy ?>
	<tr id="r_billclosedBy">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_billclosedBy"><script id="tpc_view_ip_admission_bill_summary_billclosedBy" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->billclosedBy->caption() ?></span></script></span></td>
		<td data-name="billclosedBy"<?php echo $view_ip_admission_bill_summary->billclosedBy->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_billclosedBy" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_billclosedBy">
<span<?php echo $view_ip_admission_bill_summary->billclosedBy->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->billclosedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->bllcloseByDate->Visible) { // bllcloseByDate ?>
	<tr id="r_bllcloseByDate">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_bllcloseByDate"><script id="tpc_view_ip_admission_bill_summary_bllcloseByDate" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->bllcloseByDate->caption() ?></span></script></span></td>
		<td data-name="bllcloseByDate"<?php echo $view_ip_admission_bill_summary->bllcloseByDate->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_bllcloseByDate" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_bllcloseByDate">
<span<?php echo $view_ip_admission_bill_summary->bllcloseByDate->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->bllcloseByDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_ReportHeader"><script id="tpc_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->ReportHeader->caption() ?></span></script></span></td>
		<td data-name="ReportHeader"<?php echo $view_ip_admission_bill_summary->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_ReportHeader" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_ReportHeader">
<span<?php echo $view_ip_admission_bill_summary->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Procedure"><script id="tpc_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Procedure->caption() ?></span></script></span></td>
		<td data-name="Procedure"<?php echo $view_ip_admission_bill_summary->Procedure->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Procedure" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_Procedure">
<span<?php echo $view_ip_admission_bill_summary->Procedure->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Consultant->Visible) { // Consultant ?>
	<tr id="r_Consultant">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Consultant"><script id="tpc_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Consultant->caption() ?></span></script></span></td>
		<td data-name="Consultant"<?php echo $view_ip_admission_bill_summary->Consultant->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Consultant" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_Consultant">
<span<?php echo $view_ip_admission_bill_summary->Consultant->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Consultant->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Anesthetist->Visible) { // Anesthetist ?>
	<tr id="r_Anesthetist">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Anesthetist"><script id="tpc_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Anesthetist->caption() ?></span></script></span></td>
		<td data-name="Anesthetist"<?php echo $view_ip_admission_bill_summary->Anesthetist->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Anesthetist" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_Anesthetist">
<span<?php echo $view_ip_admission_bill_summary->Anesthetist->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Anesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Amound->Visible) { // Amound ?>
	<tr id="r_Amound">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Amound"><script id="tpc_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Amound->caption() ?></span></script></span></td>
		<td data-name="Amound"<?php echo $view_ip_admission_bill_summary->Amound->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Amound" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_Amound">
<span<?php echo $view_ip_admission_bill_summary->Amound->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Amound->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_patient_id"><script id="tpc_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->patient_id->caption() ?></span></script></span></td>
		<td data-name="patient_id"<?php echo $view_ip_admission_bill_summary->patient_id->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_patient_id" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_patient_id">
<span<?php echo $view_ip_admission_bill_summary->patient_id->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->patient_id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_admission_bill_summary->Package->Visible) { // Package ?>
	<tr id="r_Package">
		<td class="<?php echo $view_ip_admission_bill_summary_view->TableLeftColumnClass ?>"><span id="elh_view_ip_admission_bill_summary_Package"><script id="tpc_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summaryview" type="text/html"><span><?php echo $view_ip_admission_bill_summary->Package->caption() ?></span></script></span></td>
		<td data-name="Package"<?php echo $view_ip_admission_bill_summary->Package->cellAttributes() ?>>
<script id="tpx_view_ip_admission_bill_summary_Package" class="view_ip_admission_bill_summaryview" type="text/html">
<span id="el_view_ip_admission_bill_summary_Package">
<span<?php echo $view_ip_admission_bill_summary->Package->viewAttributes() ?>>
<?php echo $view_ip_admission_bill_summary->Package->getViewValue() ?></span>
</span>
</script>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_admission_bill_summary->Rows) ?> };
ew.applyTemplate("tpd_view_ip_admission_bill_summaryview", "tpm_view_ip_admission_bill_summaryview", "view_ip_admission_bill_summaryview", "<?php echo $view_ip_admission_bill_summary->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_admission_bill_summaryview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_admission_bill_summary_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_admission_bill_summary->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_admission_bill_summary_view->terminate();
?>