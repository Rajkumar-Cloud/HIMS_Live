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
$patient_opd_follow_up_view = new patient_opd_follow_up_view();

// Run the page
$patient_opd_follow_up_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_opd_follow_upview = currentForm = new ew.Form("fpatient_opd_follow_upview", "view");

// Form_CustomValidate event
fpatient_opd_follow_upview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_upview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_opd_follow_upview.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_view->ICSIAdvised->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_view->ICSIAdvised->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upview.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_view->DeliveryRegistered->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_view->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upview.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_view->SerologyPositive->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_view->SerologyPositive->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upview.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_view->Allergy->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_view->Allergy->lookupOptions()) ?>;
fpatient_opd_follow_upview.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_opd_follow_upview.lists["x_status"] = <?php echo $patient_opd_follow_up_view->status->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_view->status->lookupOptions()) ?>;
fpatient_opd_follow_upview.lists["x_PatientSearch"] = <?php echo $patient_opd_follow_up_view->PatientSearch->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_opd_follow_up_view->PatientSearch->lookupOptions()) ?>;
fpatient_opd_follow_upview.lists["x_TemplateDrNotes"] = <?php echo $patient_opd_follow_up_view->TemplateDrNotes->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_TemplateDrNotes"].options = <?php echo JsonEncode($patient_opd_follow_up_view->TemplateDrNotes->lookupOptions()) ?>;
fpatient_opd_follow_upview.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_view->reportheader->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_view->reportheader->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_upview.lists["x_DrName"] = <?php echo $patient_opd_follow_up_view->DrName->Lookup->toClientList() ?>;
fpatient_opd_follow_upview.lists["x_DrName"].options = <?php echo JsonEncode($patient_opd_follow_up_view->DrName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_opd_follow_up_view->ExportOptions->render("body") ?>
<?php $patient_opd_follow_up_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_opd_follow_up_view->showPageHeader(); ?>
<?php
$patient_opd_follow_up_view->showMessage();
?>
<form name="fpatient_opd_follow_upview" id="fpatient_opd_follow_upview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_opd_follow_up_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_opd_follow_up_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="modal" value="<?php echo (int)$patient_opd_follow_up_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_id"><script id="tpc_patient_opd_follow_up_id" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_opd_follow_up->id->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_id" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up->id->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Reception"><script id="tpc_patient_opd_follow_up_Reception" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $patient_opd_follow_up->Reception->cellAttributes() ?>>
<script id="orig_patient_opd_follow_up_Reception" class="patient_opd_follow_upview" type="text/html">
<?php echo $patient_opd_follow_up->Reception->getViewValue() ?>
</script><script id="tpx_patient_opd_follow_up_Reception" class="patient_opd_follow_upview" type="text/html">
<?php echo Barcode()->show($patient_opd_follow_up->Reception->CurrentValue, 'QRCODE', 80) ?>
</script>
<script id="tpx_patient_opd_follow_up_Reception" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_Reception">
<span<?php echo $patient_opd_follow_up->Reception->viewAttributes() ?>>{{include tmpl="#tpx_patient_opd_follow_up_Reception"/}}</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatID"><script id="tpc_patient_opd_follow_up_PatID" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $patient_opd_follow_up->PatID->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatID" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_PatID">
<span<?php echo $patient_opd_follow_up->PatID->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientId"><script id="tpc_patient_opd_follow_up_PatientId" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $patient_opd_follow_up->PatientId->cellAttributes() ?>>
<script id="orig_patient_opd_follow_up_PatientId" class="patient_opd_follow_upview" type="text/html">
<?php echo $patient_opd_follow_up->PatientId->getViewValue() ?>
</script><script id="tpx_patient_opd_follow_up_PatientId" class="patient_opd_follow_upview" type="text/html">
<?php echo Barcode()->show($patient_opd_follow_up->PatientId->CurrentValue, 'CODE128', 40) ?>
</script>
<script id="tpx_patient_opd_follow_up_PatientId" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_PatientId">
<span<?php echo $patient_opd_follow_up->PatientId->viewAttributes() ?>>{{include tmpl="#tpx_patient_opd_follow_up_PatientId"/}}</span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientName"><script id="tpc_patient_opd_follow_up_PatientName" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $patient_opd_follow_up->PatientName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientName" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_MobileNumber"><script id="tpc_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $patient_opd_follow_up->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_MobileNumber">
<span<?php echo $patient_opd_follow_up->MobileNumber->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<tr id="r_Telephone">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Telephone"><script id="tpc_patient_opd_follow_up_Telephone" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->Telephone->caption() ?></span></script></span></td>
		<td data-name="Telephone"<?php echo $patient_opd_follow_up->Telephone->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Telephone" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_Telephone">
<span<?php echo $patient_opd_follow_up->Telephone->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Telephone->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_mrnno"><script id="tpc_patient_opd_follow_up_mrnno" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $patient_opd_follow_up->mrnno->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_mrnno" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_mrnno">
<span<?php echo $patient_opd_follow_up->mrnno->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Age"><script id="tpc_patient_opd_follow_up_Age" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $patient_opd_follow_up->Age->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Age" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_Age">
<span<?php echo $patient_opd_follow_up->Age->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Gender"><script id="tpc_patient_opd_follow_up_Gender" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $patient_opd_follow_up->Gender->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Gender" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_profilePic"><script id="tpc_patient_opd_follow_up_profilePic" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $patient_opd_follow_up->profilePic->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_profilePic" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_profilePic">
<span<?php echo $patient_opd_follow_up->profilePic->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_procedurenotes"><script id="tpc_patient_opd_follow_up_procedurenotes" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->procedurenotes->caption() ?></span></script></span></td>
		<td data-name="procedurenotes"<?php echo $patient_opd_follow_up->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_procedurenotes" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_procedurenotes">
<span<?php echo $patient_opd_follow_up->procedurenotes->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->procedurenotes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_NextReviewDate"><script id="tpc_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?></span></script></span></td>
		<td data-name="NextReviewDate"<?php echo $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<tr id="r_ICSIAdvised">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised"><script id="tpc_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?></span></script></span></td>
		<td data-name="ICSIAdvised"<?php echo $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<tr id="r_DeliveryRegistered">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered"><script id="tpc_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?></span></script></span></td>
		<td data-name="DeliveryRegistered"<?php echo $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
	<tr id="r_EDD">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_EDD"><script id="tpc_patient_opd_follow_up_EDD" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->EDD->caption() ?></span></script></span></td>
		<td data-name="EDD"<?php echo $patient_opd_follow_up->EDD->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_EDD" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->EDD->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<tr id="r_SerologyPositive">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_SerologyPositive"><script id="tpc_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?></span></script></span></td>
		<td data-name="SerologyPositive"<?php echo $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<tr id="r_Allergy">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Allergy"><script id="tpc_patient_opd_follow_up_Allergy" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->Allergy->caption() ?></span></script></span></td>
		<td data-name="Allergy"<?php echo $patient_opd_follow_up->Allergy->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Allergy" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_status"><script id="tpc_patient_opd_follow_up_status" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $patient_opd_follow_up->status->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_status" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up->status->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdby"><script id="tpc_patient_opd_follow_up_createdby" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $patient_opd_follow_up->createdby->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_createdby" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createddatetime"><script id="tpc_patient_opd_follow_up_createddatetime" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $patient_opd_follow_up->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_createddatetime" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifiedby"><script id="tpc_patient_opd_follow_up_modifiedby" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $patient_opd_follow_up->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_modifiedby" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifieddatetime"><script id="tpc_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_LMP"><script id="tpc_patient_opd_follow_up_LMP" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->LMP->caption() ?></span></script></span></td>
		<td data-name="LMP"<?php echo $patient_opd_follow_up->LMP->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_LMP" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->LMP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Procedure"><script id="tpc_patient_opd_follow_up_Procedure" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->Procedure->caption() ?></span></script></span></td>
		<td data-name="Procedure"<?php echo $patient_opd_follow_up->Procedure->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Procedure" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_Procedure">
<span<?php echo $patient_opd_follow_up->Procedure->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Procedure->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<tr id="r_ProcedureDateTime">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime"><script id="tpc_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?></span></script></span></td>
		<td data-name="ProcedureDateTime"<?php echo $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<tr id="r_ICSIDate">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIDate"><script id="tpc_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->ICSIDate->caption() ?></span></script></span></td>
		<td data-name="ICSIDate"<?php echo $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientSearch"><script id="tpc_patient_opd_follow_up_PatientSearch" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->PatientSearch->caption() ?></span></script></span></td>
		<td data-name="PatientSearch"<?php echo $patient_opd_follow_up->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientSearch" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_PatientSearch">
<span<?php echo $patient_opd_follow_up->PatientSearch->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatientSearch->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_HospID"><script id="tpc_patient_opd_follow_up_HospID" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient_opd_follow_up->HospID->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_HospID" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_HospID">
<span<?php echo $patient_opd_follow_up->HospID->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
	<tr id="r_createdUserName">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdUserName"><script id="tpc_patient_opd_follow_up_createdUserName" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->createdUserName->caption() ?></span></script></span></td>
		<td data-name="createdUserName"<?php echo $patient_opd_follow_up->createdUserName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_createdUserName" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_createdUserName">
<span<?php echo $patient_opd_follow_up->createdUserName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createdUserName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
	<tr id="r_TemplateDrNotes">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_TemplateDrNotes"><script id="tpc_patient_opd_follow_up_TemplateDrNotes" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->TemplateDrNotes->caption() ?></span></script></span></td>
		<td data-name="TemplateDrNotes"<?php echo $patient_opd_follow_up->TemplateDrNotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_TemplateDrNotes" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_TemplateDrNotes">
<span<?php echo $patient_opd_follow_up->TemplateDrNotes->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->TemplateDrNotes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
	<tr id="r_reportheader">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_reportheader"><script id="tpc_patient_opd_follow_up_reportheader" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->reportheader->caption() ?></span></script></span></td>
		<td data-name="reportheader"<?php echo $patient_opd_follow_up->reportheader->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_reportheader" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_reportheader">
<span<?php echo $patient_opd_follow_up->reportheader->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->reportheader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Purpose->Visible) { // Purpose ?>
	<tr id="r_Purpose">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Purpose"><script id="tpc_patient_opd_follow_up_Purpose" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->Purpose->caption() ?></span></script></span></td>
		<td data-name="Purpose"<?php echo $patient_opd_follow_up->Purpose->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Purpose" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_Purpose">
<span<?php echo $patient_opd_follow_up->Purpose->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Purpose->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
	<tr id="r_DrName">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DrName"><script id="tpc_patient_opd_follow_up_DrName" class="patient_opd_follow_upview" type="text/html"><span><?php echo $patient_opd_follow_up->DrName->caption() ?></span></script></span></td>
		<td data-name="DrName"<?php echo $patient_opd_follow_up->DrName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DrName" class="patient_opd_follow_upview" type="text/html">
<span id="el_patient_opd_follow_up_DrName">
<span<?php echo $patient_opd_follow_up->DrName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->DrName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_opd_follow_upview" class="ew-custom-template"></div>
<script id="tpm_patient_opd_follow_upview" type="text/html">
<div id="ct_patient_opd_follow_up_view"><style>
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
 $patient_id = $Page->PatientId->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patient_id."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $PatientID =  $row["PatientID"];
	 $title =  $row["title"];
	 $first_name =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 $blood_group =  $row["blood_group"];
	 $mobile_no =  $row["mobile_no"];
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
 $sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$Page->Reception->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrNameid =  $row["physician_id"];
	 $rs->MoveNext();
 }
 $sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$DrNameid."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 	 $rs->MoveNext();
 }
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$Page->HospID->CurrentValue."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 $DrNameid =  $row["id"];
	 $DrNamelogo =  $row["logo"];
	 $DrNamehospital =  $row["hospital"];
	 $DrNamestreet =  $row["street"];
	 $DrNamearea =  $row["area"];
	 $DrNametown =  $row["town"];
	 $DrNameprovince =  $row["province"];
	 $DrNamepostal_code =  $row["postal_code"];
	 $DrNamephone_no =  $row["phone_no"];
	 $DrNamePreFixCode =  $row["PreFixCode"];
	 $DrNamestatus =  $row["status"];
	 $DrNamecreatedby =  $row["createdby"];
	 $DrNamecreateddatetime =  $row["createddatetime"];
	 $DrNamemodifiedby =  $row["modifiedby"];
	 $DrNamemodifieddatetime =  $row["modifieddatetime"];
	 $DrNameBillingGST =  $row["BillingGST"];
	 $DrNamepharmacyGST =  $row["pharmacyGST"];
	 	 $rs->MoveNext();
 }
  $sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Page->Reception->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Complaints =  $row["Complaints"];
	 $rs->MoveNext();
 }
 $aa = "ewbarcode.php?data=".$Page->PatID->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 ?>
<?php
if($Page->reportheader->CurrentValue == 'Yes')
{
if($Page->HospID->CurrentValue == '1')
{
$HospIDReport = 'phpimages/A4 Hospitals logo Final.png';
}else{
$HospIDReport = 'phpimages/logo.png';
}
$ReptHeader = '<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
				  <address>
					<strong style="color:#33B0FF;font-size:25px;">'.$DrNamehospital.'</strong><br>
					'.$DrNamestreet.', '.$DrNamearea.'<br>
					'.$DrNametown.', '.$DrNameprovince.'.  <br>
						Pincode: '.$DrNamepostal_code.'<br>
					Phone: '.$DrNamephone_no.'<br>
				  </address>
				</div>
				<div class="col-sm-4 invoice-col">
				  <address>
				  </address>
				</div>
				<div class="col-sm-4 invoice-col" align="right">
<img src="'.$HospIDReport.'" alt="" width="380" height="100">
				</div>
</div><hr style="height:2px;border-width:0;color:gray;background-color:#33B0FF">';
echo $ReptHeader;
}
?>
<h2 align="center">OP SUMMARY</h2>
<font size="4" style="font-weight: bold;">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>Patient Name: <?php echo $first_name; ?></td>
			<td align="right"><?php echo date("F j, Y"); ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Gender: <?php echo $gender; ?></td>
			<td align="right">Consultant: <?php echo $Page->createdUserName->CurrentValue; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Age: <?php echo $Age; ?></td>
			<td align="right">Patient ID: <?php echo $PatientID; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Contact No: <?php echo $mobile_no; ?></td>
			<td align="right"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
</font>
<br><br>
<font size="4">
	<p>
<?php
if($Complaints!= null)
{
	echo 'Chief Complaints : ' . $Complaints;
}
?><br>
{{include tmpl="#tpc_patient_opd_follow_up_procedurenotes"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_procedurenotes"/}}<br>
<?php
$hhh = 'Medicine:
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
	 $Reception = $Page->Reception->CurrentValue;
	 $patient_id = $Page->PatientId->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $hhjjj = 'false';
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$patient_id."' and Type='OP Advice' ;";
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
	 $hhjjj = 'true';
	 $hhh .= '<tr><td>'.$Medicine.'</td><td>'.$M.'</td><td>'.$A.'</td><td>'.$N.'</td><td>'.$NoOfDays.'</td><td>'.$PreRoute.'</td><td>'.$TimeOfTaking.'</td></tr>  ';
	 $rs->MoveNext();
 }
$hhh .= '</table>';
if($hhjjj!= 'false')
{
 echo $hhh;
}
$tt = "ewbarcode.php?data=".$Page->Reception->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
 ?>
	</p>
	</font>
<font size="4" style="font-weight: bold;">
	{{include tmpl="#tpc_patient_opd_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl="#tpx_patient_opd_follow_up_NextReviewDate"/}}
<br>
<p align="right">
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p>
</font>
<br><br>
<div id="textbox">
  <p class="alignleft">Consultant Signature</p>
  <p class="alignright">Signature of the patient&nbsp;&nbsp;&nbsp;&nbsp;</p>
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr>
							<td>
								<a href="<?php echo $vitalsURL; ?>" class="btn btn-sm btn-success float-left">Vitals</a>
							</td>
							<td>
								<a href="<?php echo $historyURL; ?>" class="btn btn-sm btn-warning float-left">History</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $provisionaldiagnosisURL; ?>" class="btn btn-sm btn-danger float-left">Provisional Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $prescriptionURL; ?>" class="btn btn-sm btn-info float-left">Prescription</a>
							</td>
						</tr>						
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
						<tr>
							<td>
								<a href="<?php echo $finaldiagnosisURL; ?>" class="btn btn-sm btn-success float-left">Final Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $followupURL; ?>" class="btn btn-sm btn-warning float-left">Follow Up</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $deliveryregisterURL; ?>" class="btn btn-sm btn-danger float-left">Delivery Register</a>
							</td>
							<td>
								<a href="<?php echo $surgeryregisterURL; ?>" class="btn btn-sm btn-info float-left">Surgery Register</a>
							</td>
						</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</script>
<?php
	if (in_array("patient_an_registration", explode(",", $patient_opd_follow_up->getCurrentDetailTable())) && $patient_an_registration->DetailView) {
?>
<?php if ($patient_opd_follow_up->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("patient_an_registration", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_an_registrationgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_opd_follow_up->Rows) ?> };
ew.applyTemplate("tpd_patient_opd_follow_upview", "tpm_patient_opd_follow_upview", "patient_opd_follow_upview", "<?php echo $patient_opd_follow_up->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_opd_follow_upview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_opd_follow_up_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_opd_follow_up->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_opd_follow_up_view->terminate();
?>