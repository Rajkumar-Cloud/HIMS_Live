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
$patient_follow_up_view = new patient_follow_up_view();

// Run the page
$patient_follow_up_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_follow_up_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_follow_up->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_follow_upview = currentForm = new ew.Form("fpatient_follow_upview", "view");

// Form_CustomValidate event
fpatient_follow_upview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_follow_upview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_follow_upview.lists["x_Template"] = <?php echo $patient_follow_up_view->Template->Lookup->toClientList() ?>;
fpatient_follow_upview.lists["x_Template"].options = <?php echo JsonEncode($patient_follow_up_view->Template->lookupOptions()) ?>;
fpatient_follow_upview.lists["x_Template1"] = <?php echo $patient_follow_up_view->Template1->Lookup->toClientList() ?>;
fpatient_follow_upview.lists["x_Template1"].options = <?php echo JsonEncode($patient_follow_up_view->Template1->lookupOptions()) ?>;
fpatient_follow_upview.lists["x_Template2"] = <?php echo $patient_follow_up_view->Template2->Lookup->toClientList() ?>;
fpatient_follow_upview.lists["x_Template2"].options = <?php echo JsonEncode($patient_follow_up_view->Template2->lookupOptions()) ?>;
fpatient_follow_upview.lists["x_Template3"] = <?php echo $patient_follow_up_view->Template3->Lookup->toClientList() ?>;
fpatient_follow_upview.lists["x_Template3"].options = <?php echo JsonEncode($patient_follow_up_view->Template3->lookupOptions()) ?>;
fpatient_follow_upview.lists["x_PatientSearch"] = <?php echo $patient_follow_up_view->PatientSearch->Lookup->toClientList() ?>;
fpatient_follow_upview.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_follow_up_view->PatientSearch->lookupOptions()) ?>;
fpatient_follow_upview.lists["x_DischargeAdviceMedicineTemplate"] = <?php echo $patient_follow_up_view->DischargeAdviceMedicineTemplate->Lookup->toClientList() ?>;
fpatient_follow_upview.lists["x_DischargeAdviceMedicineTemplate"].options = <?php echo JsonEncode($patient_follow_up_view->DischargeAdviceMedicineTemplate->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_follow_up->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_follow_up_view->ExportOptions->render("body") ?>
<?php $patient_follow_up_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_follow_up_view->showPageHeader(); ?>
<?php
$patient_follow_up_view->showMessage();
?>
<form name="fpatient_follow_upview" id="fpatient_follow_upview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_follow_up_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_follow_up_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="modal" value="<?php echo (int)$patient_follow_up_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_follow_up->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_id"><script id="tpc_patient_follow_up_id" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_follow_up->id->cellAttributes() ?>>
<script id="tpx_patient_follow_up_id" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_id">
<span<?php echo $patient_follow_up->id->viewAttributes() ?>>
<?php echo $patient_follow_up->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatID"><script id="tpc_patient_follow_up_PatID" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $patient_follow_up->PatID->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatID" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_PatID">
<span<?php echo $patient_follow_up->PatID->viewAttributes() ?>>
<?php echo $patient_follow_up->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientName"><script id="tpc_patient_follow_up_PatientName" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $patient_follow_up->PatientName->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientName" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_PatientName">
<span<?php echo $patient_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_MobileNumber"><script id="tpc_patient_follow_up_MobileNumber" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $patient_follow_up->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_follow_up_MobileNumber" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up->MobileNumber->viewAttributes() ?>>
<?php echo $patient_follow_up->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_mrnno"><script id="tpc_patient_follow_up_mrnno" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $patient_follow_up->mrnno->cellAttributes() ?>>
<script id="tpx_patient_follow_up_mrnno" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_mrnno">
<span<?php echo $patient_follow_up->mrnno->viewAttributes() ?>>
<?php echo $patient_follow_up->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_BP"><script id="tpc_patient_follow_up_BP" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->BP->caption() ?></span></script></span></td>
		<td data-name="BP"<?php echo $patient_follow_up->BP->cellAttributes() ?>>
<script id="tpx_patient_follow_up_BP" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_BP">
<span<?php echo $patient_follow_up->BP->viewAttributes() ?>>
<?php echo $patient_follow_up->BP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Pulse"><script id="tpc_patient_follow_up_Pulse" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Pulse->caption() ?></span></script></span></td>
		<td data-name="Pulse"<?php echo $patient_follow_up->Pulse->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Pulse" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Pulse">
<span<?php echo $patient_follow_up->Pulse->viewAttributes() ?>>
<?php echo $patient_follow_up->Pulse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
	<tr id="r_Resp">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Resp"><script id="tpc_patient_follow_up_Resp" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Resp->caption() ?></span></script></span></td>
		<td data-name="Resp"<?php echo $patient_follow_up->Resp->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Resp" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Resp">
<span<?php echo $patient_follow_up->Resp->viewAttributes() ?>>
<?php echo $patient_follow_up->Resp->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
	<tr id="r_SPO2">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_SPO2"><script id="tpc_patient_follow_up_SPO2" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->SPO2->caption() ?></span></script></span></td>
		<td data-name="SPO2"<?php echo $patient_follow_up->SPO2->cellAttributes() ?>>
<script id="tpx_patient_follow_up_SPO2" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_SPO2">
<span<?php echo $patient_follow_up->SPO2->viewAttributes() ?>>
<?php echo $patient_follow_up->SPO2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->FollowupAdvice->Visible) { // FollowupAdvice ?>
	<tr id="r_FollowupAdvice">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_FollowupAdvice"><script id="tpc_patient_follow_up_FollowupAdvice" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->FollowupAdvice->caption() ?></span></script></span></td>
		<td data-name="FollowupAdvice"<?php echo $patient_follow_up->FollowupAdvice->cellAttributes() ?>>
<script id="tpx_patient_follow_up_FollowupAdvice" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_FollowupAdvice">
<span<?php echo $patient_follow_up->FollowupAdvice->viewAttributes() ?>>
<?php echo $patient_follow_up->FollowupAdvice->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_NextReviewDate"><script id="tpc_patient_follow_up_NextReviewDate" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->NextReviewDate->caption() ?></span></script></span></td>
		<td data-name="NextReviewDate"<?php echo $patient_follow_up->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_follow_up_NextReviewDate" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Age"><script id="tpc_patient_follow_up_Age" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $patient_follow_up->Age->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Age" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Age">
<span<?php echo $patient_follow_up->Age->viewAttributes() ?>>
<?php echo $patient_follow_up->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Gender"><script id="tpc_patient_follow_up_Gender" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $patient_follow_up->Gender->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Gender" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Gender">
<span<?php echo $patient_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_follow_up->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_profilePic"><script id="tpc_patient_follow_up_profilePic" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $patient_follow_up->profilePic->cellAttributes() ?>>
<script id="tpx_patient_follow_up_profilePic" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_profilePic">
<span<?php echo $patient_follow_up->profilePic->viewAttributes() ?>>
<?php echo $patient_follow_up->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Template->Visible) { // Template ?>
	<tr id="r_Template">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template"><script id="tpc_patient_follow_up_Template" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Template->caption() ?></span></script></span></td>
		<td data-name="Template"<?php echo $patient_follow_up->Template->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Template">
<span<?php echo $patient_follow_up->Template->viewAttributes() ?>>
<?php echo $patient_follow_up->Template->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->courseinhospital->Visible) { // courseinhospital ?>
	<tr id="r_courseinhospital">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_courseinhospital"><script id="tpc_patient_follow_up_courseinhospital" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->courseinhospital->caption() ?></span></script></span></td>
		<td data-name="courseinhospital"<?php echo $patient_follow_up->courseinhospital->cellAttributes() ?>>
<script id="tpx_patient_follow_up_courseinhospital" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_courseinhospital">
<span<?php echo $patient_follow_up->courseinhospital->viewAttributes() ?>>
<?php echo $patient_follow_up->courseinhospital->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_procedurenotes"><script id="tpc_patient_follow_up_procedurenotes" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->procedurenotes->caption() ?></span></script></span></td>
		<td data-name="procedurenotes"<?php echo $patient_follow_up->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_follow_up_procedurenotes" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_procedurenotes">
<span<?php echo $patient_follow_up->procedurenotes->viewAttributes() ?>>
<?php echo $patient_follow_up->procedurenotes->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->conditionatdischarge->Visible) { // conditionatdischarge ?>
	<tr id="r_conditionatdischarge">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_conditionatdischarge"><script id="tpc_patient_follow_up_conditionatdischarge" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->conditionatdischarge->caption() ?></span></script></span></td>
		<td data-name="conditionatdischarge"<?php echo $patient_follow_up->conditionatdischarge->cellAttributes() ?>>
<script id="tpx_patient_follow_up_conditionatdischarge" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_conditionatdischarge">
<span<?php echo $patient_follow_up->conditionatdischarge->viewAttributes() ?>>
<?php echo $patient_follow_up->conditionatdischarge->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Template1->Visible) { // Template1 ?>
	<tr id="r_Template1">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template1"><script id="tpc_patient_follow_up_Template1" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Template1->caption() ?></span></script></span></td>
		<td data-name="Template1"<?php echo $patient_follow_up->Template1->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template1" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Template1">
<span<?php echo $patient_follow_up->Template1->viewAttributes() ?>>
<?php echo $patient_follow_up->Template1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Template2->Visible) { // Template2 ?>
	<tr id="r_Template2">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template2"><script id="tpc_patient_follow_up_Template2" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Template2->caption() ?></span></script></span></td>
		<td data-name="Template2"<?php echo $patient_follow_up->Template2->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template2" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Template2">
<span<?php echo $patient_follow_up->Template2->viewAttributes() ?>>
<?php echo $patient_follow_up->Template2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Template3->Visible) { // Template3 ?>
	<tr id="r_Template3">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template3"><script id="tpc_patient_follow_up_Template3" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Template3->caption() ?></span></script></span></td>
		<td data-name="Template3"<?php echo $patient_follow_up->Template3->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template3" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Template3">
<span<?php echo $patient_follow_up->Template3->viewAttributes() ?>>
<?php echo $patient_follow_up->Template3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_HospID"><script id="tpc_patient_follow_up_HospID" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient_follow_up->HospID->cellAttributes() ?>>
<script id="tpx_patient_follow_up_HospID" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_HospID">
<span<?php echo $patient_follow_up->HospID->viewAttributes() ?>>
<?php echo $patient_follow_up->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Reception"><script id="tpc_patient_follow_up_Reception" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $patient_follow_up->Reception->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Reception" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_Reception">
<span<?php echo $patient_follow_up->Reception->viewAttributes() ?>>
<?php echo $patient_follow_up->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientId"><script id="tpc_patient_follow_up_PatientId" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $patient_follow_up->PatientId->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientId" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_PatientId">
<span<?php echo $patient_follow_up->PatientId->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientSearch"><script id="tpc_patient_follow_up_PatientSearch" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->PatientSearch->caption() ?></span></script></span></td>
		<td data-name="PatientSearch"<?php echo $patient_follow_up->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientSearch" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_PatientSearch">
<span<?php echo $patient_follow_up->PatientSearch->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientSearch->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->DischargeAdviceMedicine->Visible) { // DischargeAdviceMedicine ?>
	<tr id="r_DischargeAdviceMedicine">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_DischargeAdviceMedicine"><script id="tpc_patient_follow_up_DischargeAdviceMedicine" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->DischargeAdviceMedicine->caption() ?></span></script></span></td>
		<td data-name="DischargeAdviceMedicine"<?php echo $patient_follow_up->DischargeAdviceMedicine->cellAttributes() ?>>
<script id="tpx_patient_follow_up_DischargeAdviceMedicine" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_DischargeAdviceMedicine">
<span<?php echo $patient_follow_up->DischargeAdviceMedicine->viewAttributes() ?>>
<?php echo $patient_follow_up->DischargeAdviceMedicine->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up->DischargeAdviceMedicineTemplate->Visible) { // DischargeAdviceMedicineTemplate ?>
	<tr id="r_DischargeAdviceMedicineTemplate">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_DischargeAdviceMedicineTemplate"><script id="tpc_patient_follow_up_DischargeAdviceMedicineTemplate" class="patient_follow_upview" type="text/html"><span><?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->caption() ?></span></script></span></td>
		<td data-name="DischargeAdviceMedicineTemplate"<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->cellAttributes() ?>>
<script id="tpx_patient_follow_up_DischargeAdviceMedicineTemplate" class="patient_follow_upview" type="text/html">
<span id="el_patient_follow_up_DischargeAdviceMedicineTemplate">
<span<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->viewAttributes() ?>>
<?php echo $patient_follow_up->DischargeAdviceMedicineTemplate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_follow_upview" class="ew-custom-template"></div>
<script id="tpm_patient_follow_upview" type="text/html">
<div id="ct_patient_follow_up_view"><style>
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
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
	if($results2[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results2[0]["profilePic"];
	}
	if($results1[0]["profilePic"] == "")
	{
		$PartnerProfilePic = "hims\profile-picture.png";
	}else{
		$PartnerProfilePic = $results1[0]["profilePic"];
	}
	?>
<div hidden>
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_follow_up_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_follow_up_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_follow_up_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_follow_up_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_Age"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_follow_up_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_follow_up_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_MobileNumber"/}}</p> 
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_courseinhospital"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_courseinhospital"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_procedurenotes"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_procedurenotes"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_conditionatdischarge"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_conditionatdischarge"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_follow_up_BP"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_BP"/}}  mm of Hg </td></tr>
						<tr><td>{{include tmpl="#tpc_patient_follow_up_Pulse"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Pulse"/}}  mints</td></tr>						
						<tr><td>{{include tmpl="#tpc_patient_follow_up_Resp"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Resp"/}}</td></tr>
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
			  				<tr><td>{{include tmpl="#tpc_patient_follow_up_SPO2"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_SPO2"/}} F</td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_NextReviewDate"/}} </td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_DischargeAdviceMedicineTemplate"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_DischargeAdviceMedicineTemplate"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_DischargeAdviceMedicine"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_DischargeAdviceMedicine"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_Template"/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_FollowupAdvice"/}}&nbsp;{{include tmpl="#tpx_patient_follow_up_FollowupAdvice"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
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
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_follow_up->Rows) ?> };
ew.applyTemplate("tpd_patient_follow_upview", "tpm_patient_follow_upview", "patient_follow_upview", "<?php echo $patient_follow_up->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_follow_upview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_follow_up_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_follow_up->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_follow_up_view->terminate();
?>