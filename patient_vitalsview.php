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
$patient_vitals_view = new patient_vitals_view();

// Run the page
$patient_vitals_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_vitals->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_vitalsview = currentForm = new ew.Form("fpatient_vitalsview", "view");

// Form_CustomValidate event
fpatient_vitalsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_vitalsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_vitalsview.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_view->AnticoagulantifAny->Lookup->toClientList() ?>;
fpatient_vitalsview.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_view->AnticoagulantifAny->lookupOptions()) ?>;
fpatient_vitalsview.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_vitalsview.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_view->GenericAllergies->Lookup->toClientList() ?>;
fpatient_vitalsview.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_view->GenericAllergies->lookupOptions()) ?>;
fpatient_vitalsview.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_view->GroupAllergies->Lookup->toClientList() ?>;
fpatient_vitalsview.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_view->GroupAllergies->lookupOptions()) ?>;
fpatient_vitalsview.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_view->clinicaldetails->Lookup->toClientList() ?>;
fpatient_vitalsview.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_view->clinicaldetails->lookupOptions()) ?>;
fpatient_vitalsview.lists["x_status"] = <?php echo $patient_vitals_view->status->Lookup->toClientList() ?>;
fpatient_vitalsview.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_view->status->lookupOptions()) ?>;
fpatient_vitalsview.lists["x_PatientSearch"] = <?php echo $patient_vitals_view->PatientSearch->Lookup->toClientList() ?>;
fpatient_vitalsview.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_vitals_view->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_vitals->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_vitals_view->ExportOptions->render("body") ?>
<?php $patient_vitals_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_vitals_view->showPageHeader(); ?>
<?php
$patient_vitals_view->showMessage();
?>
<form name="fpatient_vitalsview" id="fpatient_vitalsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_vitals_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_vitals_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="modal" value="<?php echo (int)$patient_vitals_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_vitals->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_id"><script id="tpc_patient_vitals_id" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_vitals->id->cellAttributes() ?>>
<script id="tpx_patient_vitals_id" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_id">
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<?php echo $patient_vitals->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_mrnno"><script id="tpc_patient_vitals_mrnno" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $patient_vitals->mrnno->cellAttributes() ?>>
<script id="tpx_patient_vitals_mrnno" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<?php echo $patient_vitals->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientName"><script id="tpc_patient_vitals_PatientName" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $patient_vitals->PatientName->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientName" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PatientName">
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<?php echo $patient_vitals->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatID"><script id="tpc_patient_vitals_PatID" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $patient_vitals->PatID->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatID" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PatID">
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<?php echo $patient_vitals->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_MobileNumber"><script id="tpc_patient_vitals_MobileNumber" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $patient_vitals->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_vitals_MobileNumber" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_MobileNumber">
<span<?php echo $patient_vitals->MobileNumber->viewAttributes() ?>>
<?php echo $patient_vitals->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_profilePic"><script id="tpc_patient_vitals_profilePic" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $patient_vitals->profilePic->cellAttributes() ?>>
<script id="tpx_patient_vitals_profilePic" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_profilePic">
<span<?php echo $patient_vitals->profilePic->viewAttributes() ?>>
<?php echo $patient_vitals->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
	<tr id="r_HT">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HT"><script id="tpc_patient_vitals_HT" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->HT->caption() ?></span></script></span></td>
		<td data-name="HT"<?php echo $patient_vitals->HT->cellAttributes() ?>>
<script id="tpx_patient_vitals_HT" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_HT">
<span<?php echo $patient_vitals->HT->viewAttributes() ?>>
<?php echo $patient_vitals->HT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
	<tr id="r_WT">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_WT"><script id="tpc_patient_vitals_WT" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->WT->caption() ?></span></script></span></td>
		<td data-name="WT"<?php echo $patient_vitals->WT->cellAttributes() ?>>
<script id="tpx_patient_vitals_WT" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_WT">
<span<?php echo $patient_vitals->WT->viewAttributes() ?>>
<?php echo $patient_vitals->WT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
	<tr id="r_SurfaceArea">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_SurfaceArea"><script id="tpc_patient_vitals_SurfaceArea" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->SurfaceArea->caption() ?></span></script></span></td>
		<td data-name="SurfaceArea"<?php echo $patient_vitals->SurfaceArea->cellAttributes() ?>>
<script id="tpx_patient_vitals_SurfaceArea" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals->SurfaceArea->viewAttributes() ?>>
<?php echo $patient_vitals->SurfaceArea->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<tr id="r_BodyMassIndex">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BodyMassIndex"><script id="tpc_patient_vitals_BodyMassIndex" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->BodyMassIndex->caption() ?></span></script></span></td>
		<td data-name="BodyMassIndex"<?php echo $patient_vitals->BodyMassIndex->cellAttributes() ?>>
<script id="tpx_patient_vitals_BodyMassIndex" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals->BodyMassIndex->viewAttributes() ?>>
<?php echo $patient_vitals->BodyMassIndex->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->ClinicalFindings->Visible) { // ClinicalFindings ?>
	<tr id="r_ClinicalFindings">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalFindings"><script id="tpc_patient_vitals_ClinicalFindings" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->ClinicalFindings->caption() ?></span></script></span></td>
		<td data-name="ClinicalFindings"<?php echo $patient_vitals->ClinicalFindings->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalFindings" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_ClinicalFindings">
<span<?php echo $patient_vitals->ClinicalFindings->viewAttributes() ?>>
<?php echo $patient_vitals->ClinicalFindings->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
	<tr id="r_ClinicalDiagnosis">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalDiagnosis"><script id="tpc_patient_vitals_ClinicalDiagnosis" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->ClinicalDiagnosis->caption() ?></span></script></span></td>
		<td data-name="ClinicalDiagnosis"<?php echo $patient_vitals->ClinicalDiagnosis->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalDiagnosis" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_ClinicalDiagnosis">
<span<?php echo $patient_vitals->ClinicalDiagnosis->viewAttributes() ?>>
<?php echo $patient_vitals->ClinicalDiagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<tr id="r_AnticoagulantifAny">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_AnticoagulantifAny"><script id="tpc_patient_vitals_AnticoagulantifAny" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->AnticoagulantifAny->caption() ?></span></script></span></td>
		<td data-name="AnticoagulantifAny"<?php echo $patient_vitals->AnticoagulantifAny->cellAttributes() ?>>
<script id="tpx_patient_vitals_AnticoagulantifAny" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals->AnticoagulantifAny->viewAttributes() ?>>
<?php echo $patient_vitals->AnticoagulantifAny->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
	<tr id="r_FoodAllergies">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_FoodAllergies"><script id="tpc_patient_vitals_FoodAllergies" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->FoodAllergies->caption() ?></span></script></span></td>
		<td data-name="FoodAllergies"<?php echo $patient_vitals->FoodAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_FoodAllergies" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals->FoodAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->FoodAllergies->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
	<tr id="r_GenericAllergies">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GenericAllergies"><script id="tpc_patient_vitals_GenericAllergies" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->GenericAllergies->caption() ?></span></script></span></td>
		<td data-name="GenericAllergies"<?php echo $patient_vitals->GenericAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GenericAllergies" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals->GenericAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GenericAllergies->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
	<tr id="r_GroupAllergies">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GroupAllergies"><script id="tpc_patient_vitals_GroupAllergies" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->GroupAllergies->caption() ?></span></script></span></td>
		<td data-name="GroupAllergies"<?php echo $patient_vitals->GroupAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GroupAllergies" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals->GroupAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GroupAllergies->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
	<tr id="r_Temp">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Temp"><script id="tpc_patient_vitals_Temp" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->Temp->caption() ?></span></script></span></td>
		<td data-name="Temp"<?php echo $patient_vitals->Temp->cellAttributes() ?>>
<script id="tpx_patient_vitals_Temp" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_Temp">
<span<?php echo $patient_vitals->Temp->viewAttributes() ?>>
<?php echo $patient_vitals->Temp->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Pulse"><script id="tpc_patient_vitals_Pulse" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->Pulse->caption() ?></span></script></span></td>
		<td data-name="Pulse"<?php echo $patient_vitals->Pulse->cellAttributes() ?>>
<script id="tpx_patient_vitals_Pulse" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_Pulse">
<span<?php echo $patient_vitals->Pulse->viewAttributes() ?>>
<?php echo $patient_vitals->Pulse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BP"><script id="tpc_patient_vitals_BP" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->BP->caption() ?></span></script></span></td>
		<td data-name="BP"<?php echo $patient_vitals->BP->cellAttributes() ?>>
<script id="tpx_patient_vitals_BP" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_BP">
<span<?php echo $patient_vitals->BP->viewAttributes() ?>>
<?php echo $patient_vitals->BP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
	<tr id="r_PR">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PR"><script id="tpc_patient_vitals_PR" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PR->caption() ?></span></script></span></td>
		<td data-name="PR"<?php echo $patient_vitals->PR->cellAttributes() ?>>
<script id="tpx_patient_vitals_PR" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PR">
<span<?php echo $patient_vitals->PR->viewAttributes() ?>>
<?php echo $patient_vitals->PR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
	<tr id="r_CNS">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CNS"><script id="tpc_patient_vitals_CNS" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->CNS->caption() ?></span></script></span></td>
		<td data-name="CNS"<?php echo $patient_vitals->CNS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CNS" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_CNS">
<span<?php echo $patient_vitals->CNS->viewAttributes() ?>>
<?php echo $patient_vitals->CNS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
	<tr id="r_RSA">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_RSA"><script id="tpc_patient_vitals_RSA" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->RSA->caption() ?></span></script></span></td>
		<td data-name="RSA"<?php echo $patient_vitals->RSA->cellAttributes() ?>>
<script id="tpx_patient_vitals_RSA" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_RSA">
<span<?php echo $patient_vitals->RSA->viewAttributes() ?>>
<?php echo $patient_vitals->RSA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
	<tr id="r_CVS">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CVS"><script id="tpc_patient_vitals_CVS" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->CVS->caption() ?></span></script></span></td>
		<td data-name="CVS"<?php echo $patient_vitals->CVS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CVS" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_CVS">
<span<?php echo $patient_vitals->CVS->viewAttributes() ?>>
<?php echo $patient_vitals->CVS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
	<tr id="r_PA">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PA"><script id="tpc_patient_vitals_PA" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PA->caption() ?></span></script></span></td>
		<td data-name="PA"<?php echo $patient_vitals->PA->cellAttributes() ?>>
<script id="tpx_patient_vitals_PA" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PA">
<span<?php echo $patient_vitals->PA->viewAttributes() ?>>
<?php echo $patient_vitals->PA->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
	<tr id="r_PS">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PS"><script id="tpc_patient_vitals_PS" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PS->caption() ?></span></script></span></td>
		<td data-name="PS"<?php echo $patient_vitals->PS->cellAttributes() ?>>
<script id="tpx_patient_vitals_PS" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PS">
<span<?php echo $patient_vitals->PS->viewAttributes() ?>>
<?php echo $patient_vitals->PS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
	<tr id="r_PV">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PV"><script id="tpc_patient_vitals_PV" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PV->caption() ?></span></script></span></td>
		<td data-name="PV"<?php echo $patient_vitals->PV->cellAttributes() ?>>
<script id="tpx_patient_vitals_PV" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PV">
<span<?php echo $patient_vitals->PV->viewAttributes() ?>>
<?php echo $patient_vitals->PV->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
	<tr id="r_clinicaldetails">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_clinicaldetails"><script id="tpc_patient_vitals_clinicaldetails" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->clinicaldetails->caption() ?></span></script></span></td>
		<td data-name="clinicaldetails"<?php echo $patient_vitals->clinicaldetails->cellAttributes() ?>>
<script id="tpx_patient_vitals_clinicaldetails" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals->clinicaldetails->viewAttributes() ?>>
<?php echo $patient_vitals->clinicaldetails->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_status"><script id="tpc_patient_vitals_status" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $patient_vitals->status->cellAttributes() ?>>
<script id="tpx_patient_vitals_status" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_status">
<span<?php echo $patient_vitals->status->viewAttributes() ?>>
<?php echo $patient_vitals->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createdby"><script id="tpc_patient_vitals_createdby" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $patient_vitals->createdby->cellAttributes() ?>>
<script id="tpx_patient_vitals_createdby" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_createdby">
<span<?php echo $patient_vitals->createdby->viewAttributes() ?>>
<?php echo $patient_vitals->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createddatetime"><script id="tpc_patient_vitals_createddatetime" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $patient_vitals->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_vitals_createddatetime" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_createddatetime">
<span<?php echo $patient_vitals->createddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifiedby"><script id="tpc_patient_vitals_modifiedby" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $patient_vitals->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_vitals_modifiedby" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_modifiedby">
<span<?php echo $patient_vitals->modifiedby->viewAttributes() ?>>
<?php echo $patient_vitals->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifieddatetime"><script id="tpc_patient_vitals_modifieddatetime" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_vitals->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_vitals_modifieddatetime" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Age"><script id="tpc_patient_vitals_Age" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $patient_vitals->Age->cellAttributes() ?>>
<script id="tpx_patient_vitals_Age" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_Age">
<span<?php echo $patient_vitals->Age->viewAttributes() ?>>
<?php echo $patient_vitals->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Gender"><script id="tpc_patient_vitals_Gender" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $patient_vitals->Gender->cellAttributes() ?>>
<script id="tpx_patient_vitals_Gender" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_Gender">
<span<?php echo $patient_vitals->Gender->viewAttributes() ?>>
<?php echo $patient_vitals->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientSearch"><script id="tpc_patient_vitals_PatientSearch" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PatientSearch->caption() ?></span></script></span></td>
		<td data-name="PatientSearch"<?php echo $patient_vitals->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientSearch" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PatientSearch">
<span<?php echo $patient_vitals->PatientSearch->viewAttributes() ?>>
<?php echo $patient_vitals->PatientSearch->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientId"><script id="tpc_patient_vitals_PatientId" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $patient_vitals->PatientId->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientId" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<?php echo $patient_vitals->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Reception"><script id="tpc_patient_vitals_Reception" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $patient_vitals->Reception->cellAttributes() ?>>
<script id="tpx_patient_vitals_Reception" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<?php echo $patient_vitals->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HospID"><script id="tpc_patient_vitals_HospID" class="patient_vitalsview" type="text/html"><span><?php echo $patient_vitals->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient_vitals->HospID->cellAttributes() ?>>
<script id="tpx_patient_vitals_HospID" class="patient_vitalsview" type="text/html">
<span id="el_patient_vitals_HospID">
<span<?php echo $patient_vitals->HospID->viewAttributes() ?>>
<?php echo $patient_vitals->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_vitalsview" class="ew-custom-template"></div>
<script id="tpm_patient_vitalsview" type="text/html">
<div id="ct_patient_vitals_view"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where id='".$vviid."'; ";
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_vitals_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_vitals_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpc_patient_vitals_SurfaceArea"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpc_patient_vitals_BodyMassIndex"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_vitals_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_vitals_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Age"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_MobileNumber"/}}</p> 
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
<div class="row">
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1">H</span>
			  <div class="info-box-content">
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_HT"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_HT"/}}</span>
				<span class="info-box-number">Centimeter - Cm.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-danger elevation-1">W</span>
			  <div class="info-box-content">
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_WT"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_WT"/}}</span>
				<span class="info-box-number">Kilogram - Kg.</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <!-- fix for small devices only -->
		  <div class="clearfix hidden-md-up"></div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1">BSA</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Surface Area</span>
				<span id="BodySurfaceAreaValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-warning elevation-1">BMI</span>
			  <div class="info-box-content">
				<span class="info-box-text">Body Mass Index</span>
				<span id="BodyMassIndexValue" class="info-box-number">0</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_vitals_ClinicalFindings"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_ClinicalFindings"/}}
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_vitals_ClinicalDiagnosis"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_ClinicalDiagnosis"/}}
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
						<tr><td>{{include tmpl="#tpc_patient_vitals_FoodAllergies"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_FoodAllergies"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_AnticoagulantifAny"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_AnticoagulantifAny"/}}</td></tr>						
						<tr><td>{{include tmpl="#tpc_patient_vitals_GenericAllergies"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_GenericAllergies"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_GroupAllergies"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_GroupAllergies"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_clinicaldetails"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_clinicaldetails"/}}</td></tr>
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
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Temp"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Temp"/}} F</td><td>{{include tmpl="#tpc_patient_vitals_BP"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_BP"/}} mm of Hg</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Pulse"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_Pulse"/}} beats/min</td><td>{{include tmpl="#tpc_patient_vitals_PR"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PR"/}} breaths/min</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CNS"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_CNS"/}}</td><td>{{include tmpl="#tpc_patient_vitals_RSA"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_RSA"/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CVS"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_CVS"/}}</td><td>{{include tmpl="#tpc_patient_vitals_PA"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PA"/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_PS"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PS"/}}</td><td>{{include tmpl="#tpc_patient_vitals_PV"/}}&nbsp;{{include tmpl="#tpx_patient_vitals_PV"/}}</td></tr>
			  			</tbody>
			  		</table>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_vitals->Rows) ?> };
ew.applyTemplate("tpd_patient_vitalsview", "tpm_patient_vitalsview", "patient_vitalsview", "<?php echo $patient_vitals->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_vitalsview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_vitals_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_vitals->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

 document.getElementById("x_HT").style.width = "80px";
 document.getElementById("x_WT").style.width = "80px";
 document.getElementById("x_Temp").style.width = "80px";
 document.getElementById("x_Pulse").style.width = "80px";
 document.getElementById("x_BP").style.width = "80px";
 document.getElementById("x_PR").style.width = "80px";
 document.getElementById("x_CNS").style.width = "80px";
 document.getElementById("x_CVS").style.width = "80px";
 document.getElementById("x_PA").style.width = "80px";
 document.getElementById("x_PS").style.width = "80px";
 document.getElementById("x_PV").style.width = "80px";
 document.getElementById("x_RSA").style.width = "80px";
 var c = document.getElementById("el_patient_vitals_profilePic").children;
 var d = c[0].children;
   $("#x_WT").change(function(){
		calculateBmi();
		calculateBSA();
	});
	$("#x_HT").change(function(){
		calculateBmi();
		calculateBSA();
	});

	function calculateBmi() {
		var weight = document.getElementById("x_WT").value
		var height = document.getElementById("x_HT").value
		if(weight > 0 && height > 0){	
			var finalBmi = weight / (height / 100 * height / 100)            
			finalBmi = Math.round(finalBmi * 1000) / 1000;
			if(finalBmi < 18.5){
				finalBmi = finalBmi + " Too Thin";

			   // document.bmiForm.meaning.value = "That you are too thin."
			}
			if(finalBmi > 18.5 && finalBmi < 25){

			   // document.bmiForm.meaning.value = "That you are healthy."
			   finalBmi = finalBmi + " Healthy";
			}
			if(finalBmi > 25){

			   // document.bmiForm.meaning.value = "That you have overweight."
			   finalBmi = finalBmi + " Over Weight";
			}
			document.getElementById("BodyMassIndexValue").innerText = finalBmi;
			document.getElementById("x_BodyMassIndex").value = finalBmi;
		}
		else{

			//alert("Please Fill in everything correctly")
		}
	}

	function calculateBSA(){
		var weight = document.getElementById("x_WT").value
		var height = document.getElementById("x_HT").value
		if(weight > 0 && height > 0){	
			var bsa = 0;
			bsa = Math.pow(weight,0.425) * Math.pow(height,0.725) * 0.007184;
			bsa = Math.round(bsa * 1000) / 1000;
			document.getElementById("BodySurfaceAreaValue").innerText = bsa;
			document.getElementById("x_SurfaceArea").value = bsa;
		}
		else{

		   // alert("Please Fill in everything correctly")
		}
	}
	 var evalue = d[0].value;
 document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_vitals_view->terminate();
?>