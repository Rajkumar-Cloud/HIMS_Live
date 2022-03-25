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
<?php include_once "header.php"; ?>
<?php if (!$patient_vitals_view->isExport()) { ?>
<script>
var fpatient_vitalsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_vitalsview = currentForm = new ew.Form("fpatient_vitalsview", "view");
	loadjs.done("fpatient_vitalsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_vitals_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="modal" value="<?php echo (int)$patient_vitals_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_vitals_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_id"><script id="tpc_patient_vitals_id" type="text/html"><?php echo $patient_vitals_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_vitals_view->id->cellAttributes() ?>>
<script id="tpx_patient_vitals_id" type="text/html"><span id="el_patient_vitals_id">
<span<?php echo $patient_vitals_view->id->viewAttributes() ?>><?php echo $patient_vitals_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_mrnno"><script id="tpc_patient_vitals_mrnno" type="text/html"><?php echo $patient_vitals_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $patient_vitals_view->mrnno->cellAttributes() ?>>
<script id="tpx_patient_vitals_mrnno" type="text/html"><span id="el_patient_vitals_mrnno">
<span<?php echo $patient_vitals_view->mrnno->viewAttributes() ?>><?php echo $patient_vitals_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientName"><script id="tpc_patient_vitals_PatientName" type="text/html"><?php echo $patient_vitals_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $patient_vitals_view->PatientName->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientName" type="text/html"><span id="el_patient_vitals_PatientName">
<span<?php echo $patient_vitals_view->PatientName->viewAttributes() ?>><?php echo $patient_vitals_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatID"><script id="tpc_patient_vitals_PatID" type="text/html"><?php echo $patient_vitals_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $patient_vitals_view->PatID->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatID" type="text/html"><span id="el_patient_vitals_PatID">
<span<?php echo $patient_vitals_view->PatID->viewAttributes() ?>><?php echo $patient_vitals_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_MobileNumber"><script id="tpc_patient_vitals_MobileNumber" type="text/html"><?php echo $patient_vitals_view->MobileNumber->caption() ?></script></span></td>
		<td data-name="MobileNumber" <?php echo $patient_vitals_view->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_vitals_MobileNumber" type="text/html"><span id="el_patient_vitals_MobileNumber">
<span<?php echo $patient_vitals_view->MobileNumber->viewAttributes() ?>><?php echo $patient_vitals_view->MobileNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_profilePic"><script id="tpc_patient_vitals_profilePic" type="text/html"><?php echo $patient_vitals_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $patient_vitals_view->profilePic->cellAttributes() ?>>
<script id="tpx_patient_vitals_profilePic" type="text/html"><span id="el_patient_vitals_profilePic">
<span<?php echo $patient_vitals_view->profilePic->viewAttributes() ?>><?php echo $patient_vitals_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->HT->Visible) { // HT ?>
	<tr id="r_HT">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HT"><script id="tpc_patient_vitals_HT" type="text/html"><?php echo $patient_vitals_view->HT->caption() ?></script></span></td>
		<td data-name="HT" <?php echo $patient_vitals_view->HT->cellAttributes() ?>>
<script id="tpx_patient_vitals_HT" type="text/html"><span id="el_patient_vitals_HT">
<span<?php echo $patient_vitals_view->HT->viewAttributes() ?>><?php echo $patient_vitals_view->HT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->WT->Visible) { // WT ?>
	<tr id="r_WT">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_WT"><script id="tpc_patient_vitals_WT" type="text/html"><?php echo $patient_vitals_view->WT->caption() ?></script></span></td>
		<td data-name="WT" <?php echo $patient_vitals_view->WT->cellAttributes() ?>>
<script id="tpx_patient_vitals_WT" type="text/html"><span id="el_patient_vitals_WT">
<span<?php echo $patient_vitals_view->WT->viewAttributes() ?>><?php echo $patient_vitals_view->WT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->SurfaceArea->Visible) { // SurfaceArea ?>
	<tr id="r_SurfaceArea">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_SurfaceArea"><script id="tpc_patient_vitals_SurfaceArea" type="text/html"><?php echo $patient_vitals_view->SurfaceArea->caption() ?></script></span></td>
		<td data-name="SurfaceArea" <?php echo $patient_vitals_view->SurfaceArea->cellAttributes() ?>>
<script id="tpx_patient_vitals_SurfaceArea" type="text/html"><span id="el_patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals_view->SurfaceArea->viewAttributes() ?>><?php echo $patient_vitals_view->SurfaceArea->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<tr id="r_BodyMassIndex">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BodyMassIndex"><script id="tpc_patient_vitals_BodyMassIndex" type="text/html"><?php echo $patient_vitals_view->BodyMassIndex->caption() ?></script></span></td>
		<td data-name="BodyMassIndex" <?php echo $patient_vitals_view->BodyMassIndex->cellAttributes() ?>>
<script id="tpx_patient_vitals_BodyMassIndex" type="text/html"><span id="el_patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals_view->BodyMassIndex->viewAttributes() ?>><?php echo $patient_vitals_view->BodyMassIndex->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->ClinicalFindings->Visible) { // ClinicalFindings ?>
	<tr id="r_ClinicalFindings">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalFindings"><script id="tpc_patient_vitals_ClinicalFindings" type="text/html"><?php echo $patient_vitals_view->ClinicalFindings->caption() ?></script></span></td>
		<td data-name="ClinicalFindings" <?php echo $patient_vitals_view->ClinicalFindings->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalFindings" type="text/html"><span id="el_patient_vitals_ClinicalFindings">
<span<?php echo $patient_vitals_view->ClinicalFindings->viewAttributes() ?>><?php echo $patient_vitals_view->ClinicalFindings->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
	<tr id="r_ClinicalDiagnosis">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalDiagnosis"><script id="tpc_patient_vitals_ClinicalDiagnosis" type="text/html"><?php echo $patient_vitals_view->ClinicalDiagnosis->caption() ?></script></span></td>
		<td data-name="ClinicalDiagnosis" <?php echo $patient_vitals_view->ClinicalDiagnosis->cellAttributes() ?>>
<script id="tpx_patient_vitals_ClinicalDiagnosis" type="text/html"><span id="el_patient_vitals_ClinicalDiagnosis">
<span<?php echo $patient_vitals_view->ClinicalDiagnosis->viewAttributes() ?>><?php echo $patient_vitals_view->ClinicalDiagnosis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<tr id="r_AnticoagulantifAny">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_AnticoagulantifAny"><script id="tpc_patient_vitals_AnticoagulantifAny" type="text/html"><?php echo $patient_vitals_view->AnticoagulantifAny->caption() ?></script></span></td>
		<td data-name="AnticoagulantifAny" <?php echo $patient_vitals_view->AnticoagulantifAny->cellAttributes() ?>>
<script id="tpx_patient_vitals_AnticoagulantifAny" type="text/html"><span id="el_patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals_view->AnticoagulantifAny->viewAttributes() ?>><?php echo $patient_vitals_view->AnticoagulantifAny->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->FoodAllergies->Visible) { // FoodAllergies ?>
	<tr id="r_FoodAllergies">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_FoodAllergies"><script id="tpc_patient_vitals_FoodAllergies" type="text/html"><?php echo $patient_vitals_view->FoodAllergies->caption() ?></script></span></td>
		<td data-name="FoodAllergies" <?php echo $patient_vitals_view->FoodAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_FoodAllergies" type="text/html"><span id="el_patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals_view->FoodAllergies->viewAttributes() ?>><?php echo $patient_vitals_view->FoodAllergies->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->GenericAllergies->Visible) { // GenericAllergies ?>
	<tr id="r_GenericAllergies">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GenericAllergies"><script id="tpc_patient_vitals_GenericAllergies" type="text/html"><?php echo $patient_vitals_view->GenericAllergies->caption() ?></script></span></td>
		<td data-name="GenericAllergies" <?php echo $patient_vitals_view->GenericAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GenericAllergies" type="text/html"><span id="el_patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals_view->GenericAllergies->viewAttributes() ?>><?php echo $patient_vitals_view->GenericAllergies->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->GroupAllergies->Visible) { // GroupAllergies ?>
	<tr id="r_GroupAllergies">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GroupAllergies"><script id="tpc_patient_vitals_GroupAllergies" type="text/html"><?php echo $patient_vitals_view->GroupAllergies->caption() ?></script></span></td>
		<td data-name="GroupAllergies" <?php echo $patient_vitals_view->GroupAllergies->cellAttributes() ?>>
<script id="tpx_patient_vitals_GroupAllergies" type="text/html"><span id="el_patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals_view->GroupAllergies->viewAttributes() ?>><?php echo $patient_vitals_view->GroupAllergies->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->Temp->Visible) { // Temp ?>
	<tr id="r_Temp">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Temp"><script id="tpc_patient_vitals_Temp" type="text/html"><?php echo $patient_vitals_view->Temp->caption() ?></script></span></td>
		<td data-name="Temp" <?php echo $patient_vitals_view->Temp->cellAttributes() ?>>
<script id="tpx_patient_vitals_Temp" type="text/html"><span id="el_patient_vitals_Temp">
<span<?php echo $patient_vitals_view->Temp->viewAttributes() ?>><?php echo $patient_vitals_view->Temp->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Pulse"><script id="tpc_patient_vitals_Pulse" type="text/html"><?php echo $patient_vitals_view->Pulse->caption() ?></script></span></td>
		<td data-name="Pulse" <?php echo $patient_vitals_view->Pulse->cellAttributes() ?>>
<script id="tpx_patient_vitals_Pulse" type="text/html"><span id="el_patient_vitals_Pulse">
<span<?php echo $patient_vitals_view->Pulse->viewAttributes() ?>><?php echo $patient_vitals_view->Pulse->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BP"><script id="tpc_patient_vitals_BP" type="text/html"><?php echo $patient_vitals_view->BP->caption() ?></script></span></td>
		<td data-name="BP" <?php echo $patient_vitals_view->BP->cellAttributes() ?>>
<script id="tpx_patient_vitals_BP" type="text/html"><span id="el_patient_vitals_BP">
<span<?php echo $patient_vitals_view->BP->viewAttributes() ?>><?php echo $patient_vitals_view->BP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PR->Visible) { // PR ?>
	<tr id="r_PR">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PR"><script id="tpc_patient_vitals_PR" type="text/html"><?php echo $patient_vitals_view->PR->caption() ?></script></span></td>
		<td data-name="PR" <?php echo $patient_vitals_view->PR->cellAttributes() ?>>
<script id="tpx_patient_vitals_PR" type="text/html"><span id="el_patient_vitals_PR">
<span<?php echo $patient_vitals_view->PR->viewAttributes() ?>><?php echo $patient_vitals_view->PR->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->CNS->Visible) { // CNS ?>
	<tr id="r_CNS">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CNS"><script id="tpc_patient_vitals_CNS" type="text/html"><?php echo $patient_vitals_view->CNS->caption() ?></script></span></td>
		<td data-name="CNS" <?php echo $patient_vitals_view->CNS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CNS" type="text/html"><span id="el_patient_vitals_CNS">
<span<?php echo $patient_vitals_view->CNS->viewAttributes() ?>><?php echo $patient_vitals_view->CNS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->RSA->Visible) { // RSA ?>
	<tr id="r_RSA">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_RSA"><script id="tpc_patient_vitals_RSA" type="text/html"><?php echo $patient_vitals_view->RSA->caption() ?></script></span></td>
		<td data-name="RSA" <?php echo $patient_vitals_view->RSA->cellAttributes() ?>>
<script id="tpx_patient_vitals_RSA" type="text/html"><span id="el_patient_vitals_RSA">
<span<?php echo $patient_vitals_view->RSA->viewAttributes() ?>><?php echo $patient_vitals_view->RSA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->CVS->Visible) { // CVS ?>
	<tr id="r_CVS">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CVS"><script id="tpc_patient_vitals_CVS" type="text/html"><?php echo $patient_vitals_view->CVS->caption() ?></script></span></td>
		<td data-name="CVS" <?php echo $patient_vitals_view->CVS->cellAttributes() ?>>
<script id="tpx_patient_vitals_CVS" type="text/html"><span id="el_patient_vitals_CVS">
<span<?php echo $patient_vitals_view->CVS->viewAttributes() ?>><?php echo $patient_vitals_view->CVS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PA->Visible) { // PA ?>
	<tr id="r_PA">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PA"><script id="tpc_patient_vitals_PA" type="text/html"><?php echo $patient_vitals_view->PA->caption() ?></script></span></td>
		<td data-name="PA" <?php echo $patient_vitals_view->PA->cellAttributes() ?>>
<script id="tpx_patient_vitals_PA" type="text/html"><span id="el_patient_vitals_PA">
<span<?php echo $patient_vitals_view->PA->viewAttributes() ?>><?php echo $patient_vitals_view->PA->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PS->Visible) { // PS ?>
	<tr id="r_PS">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PS"><script id="tpc_patient_vitals_PS" type="text/html"><?php echo $patient_vitals_view->PS->caption() ?></script></span></td>
		<td data-name="PS" <?php echo $patient_vitals_view->PS->cellAttributes() ?>>
<script id="tpx_patient_vitals_PS" type="text/html"><span id="el_patient_vitals_PS">
<span<?php echo $patient_vitals_view->PS->viewAttributes() ?>><?php echo $patient_vitals_view->PS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PV->Visible) { // PV ?>
	<tr id="r_PV">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PV"><script id="tpc_patient_vitals_PV" type="text/html"><?php echo $patient_vitals_view->PV->caption() ?></script></span></td>
		<td data-name="PV" <?php echo $patient_vitals_view->PV->cellAttributes() ?>>
<script id="tpx_patient_vitals_PV" type="text/html"><span id="el_patient_vitals_PV">
<span<?php echo $patient_vitals_view->PV->viewAttributes() ?>><?php echo $patient_vitals_view->PV->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->clinicaldetails->Visible) { // clinicaldetails ?>
	<tr id="r_clinicaldetails">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_clinicaldetails"><script id="tpc_patient_vitals_clinicaldetails" type="text/html"><?php echo $patient_vitals_view->clinicaldetails->caption() ?></script></span></td>
		<td data-name="clinicaldetails" <?php echo $patient_vitals_view->clinicaldetails->cellAttributes() ?>>
<script id="tpx_patient_vitals_clinicaldetails" type="text/html"><span id="el_patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals_view->clinicaldetails->viewAttributes() ?>><?php echo $patient_vitals_view->clinicaldetails->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_status"><script id="tpc_patient_vitals_status" type="text/html"><?php echo $patient_vitals_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $patient_vitals_view->status->cellAttributes() ?>>
<script id="tpx_patient_vitals_status" type="text/html"><span id="el_patient_vitals_status">
<span<?php echo $patient_vitals_view->status->viewAttributes() ?>><?php echo $patient_vitals_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createdby"><script id="tpc_patient_vitals_createdby" type="text/html"><?php echo $patient_vitals_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $patient_vitals_view->createdby->cellAttributes() ?>>
<script id="tpx_patient_vitals_createdby" type="text/html"><span id="el_patient_vitals_createdby">
<span<?php echo $patient_vitals_view->createdby->viewAttributes() ?>><?php echo $patient_vitals_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createddatetime"><script id="tpc_patient_vitals_createddatetime" type="text/html"><?php echo $patient_vitals_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $patient_vitals_view->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_vitals_createddatetime" type="text/html"><span id="el_patient_vitals_createddatetime">
<span<?php echo $patient_vitals_view->createddatetime->viewAttributes() ?>><?php echo $patient_vitals_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifiedby"><script id="tpc_patient_vitals_modifiedby" type="text/html"><?php echo $patient_vitals_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $patient_vitals_view->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_vitals_modifiedby" type="text/html"><span id="el_patient_vitals_modifiedby">
<span<?php echo $patient_vitals_view->modifiedby->viewAttributes() ?>><?php echo $patient_vitals_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifieddatetime"><script id="tpc_patient_vitals_modifieddatetime" type="text/html"><?php echo $patient_vitals_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_vitals_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_vitals_modifieddatetime" type="text/html"><span id="el_patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_vitals_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Age"><script id="tpc_patient_vitals_Age" type="text/html"><?php echo $patient_vitals_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $patient_vitals_view->Age->cellAttributes() ?>>
<script id="tpx_patient_vitals_Age" type="text/html"><span id="el_patient_vitals_Age">
<span<?php echo $patient_vitals_view->Age->viewAttributes() ?>><?php echo $patient_vitals_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Gender"><script id="tpc_patient_vitals_Gender" type="text/html"><?php echo $patient_vitals_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $patient_vitals_view->Gender->cellAttributes() ?>>
<script id="tpx_patient_vitals_Gender" type="text/html"><span id="el_patient_vitals_Gender">
<span<?php echo $patient_vitals_view->Gender->viewAttributes() ?>><?php echo $patient_vitals_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientSearch"><script id="tpc_patient_vitals_PatientSearch" type="text/html"><?php echo $patient_vitals_view->PatientSearch->caption() ?></script></span></td>
		<td data-name="PatientSearch" <?php echo $patient_vitals_view->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientSearch" type="text/html"><span id="el_patient_vitals_PatientSearch">
<span<?php echo $patient_vitals_view->PatientSearch->viewAttributes() ?>><?php echo $patient_vitals_view->PatientSearch->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientId"><script id="tpc_patient_vitals_PatientId" type="text/html"><?php echo $patient_vitals_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $patient_vitals_view->PatientId->cellAttributes() ?>>
<script id="tpx_patient_vitals_PatientId" type="text/html"><span id="el_patient_vitals_PatientId">
<span<?php echo $patient_vitals_view->PatientId->viewAttributes() ?>><?php echo $patient_vitals_view->PatientId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Reception"><script id="tpc_patient_vitals_Reception" type="text/html"><?php echo $patient_vitals_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $patient_vitals_view->Reception->cellAttributes() ?>>
<script id="tpx_patient_vitals_Reception" type="text/html"><span id="el_patient_vitals_Reception">
<span<?php echo $patient_vitals_view->Reception->viewAttributes() ?>><?php echo $patient_vitals_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_vitals_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_vitals_view->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HospID"><script id="tpc_patient_vitals_HospID" type="text/html"><?php echo $patient_vitals_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $patient_vitals_view->HospID->cellAttributes() ?>>
<script id="tpx_patient_vitals_HospID" type="text/html"><span id="el_patient_vitals_HospID">
<span<?php echo $patient_vitals_view->HospID->viewAttributes() ?>><?php echo $patient_vitals_view->HospID->getViewValue() ?></span>
</span></script>
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_vitals_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatientSearch")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_vitals_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpc_patient_vitals_SurfaceArea"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpc_patient_vitals_BodyMassIndex"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_vitals_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_vitals_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_vitals_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_vitals_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_MobileNumber")/}}</p> 
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
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_HT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_HT")/}}</span>
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
				<span class="info-box-text">{{include tmpl="#tpc_patient_vitals_WT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_WT")/}}</span>
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
			  {{include tmpl="#tpc_patient_vitals_ClinicalFindings"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_ClinicalFindings")/}}
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_vitals_ClinicalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_ClinicalDiagnosis")/}}
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
						<tr><td>{{include tmpl="#tpc_patient_vitals_FoodAllergies"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_FoodAllergies")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_AnticoagulantifAny"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_AnticoagulantifAny")/}}</td></tr>						
						<tr><td>{{include tmpl="#tpc_patient_vitals_GenericAllergies"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_GenericAllergies")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_GroupAllergies"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_GroupAllergies")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_vitals_clinicaldetails"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_clinicaldetails")/}}</td></tr>
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
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Temp"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Temp")/}} F</td><td>{{include tmpl="#tpc_patient_vitals_BP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_BP")/}} mm of Hg</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_Pulse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_Pulse")/}} beats/min</td><td>{{include tmpl="#tpc_patient_vitals_PR"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PR")/}} breaths/min</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CNS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_CNS")/}}</td><td>{{include tmpl="#tpc_patient_vitals_RSA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_RSA")/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_CVS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_CVS")/}}</td><td>{{include tmpl="#tpc_patient_vitals_PA"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PA")/}}</td></tr>
			  				<tr><td>&nbsp; </td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_vitals_PS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PS")/}}</td><td>{{include tmpl="#tpc_patient_vitals_PV"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_vitals_PV")/}}</td></tr>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_vitals->Rows) ?> };
	ew.applyTemplate("tpd_patient_vitalsview", "tpm_patient_vitalsview", "patient_vitalsview", "<?php echo $patient_vitals->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_vitalsview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_vitals_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_vitals_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("x_HT").style.width="80px",document.getElementById("x_WT").style.width="80px",document.getElementById("x_Temp").style.width="80px",document.getElementById("x_Pulse").style.width="80px",document.getElementById("x_BP").style.width="80px",document.getElementById("x_PR").style.width="80px",document.getElementById("x_CNS").style.width="80px",document.getElementById("x_CVS").style.width="80px",document.getElementById("x_PA").style.width="80px",document.getElementById("x_PS").style.width="80px",document.getElementById("x_PV").style.width="80px",document.getElementById("x_RSA").style.width="80px";var c=document.getElementById("el_patient_vitals_profilePic").children,d=c[0].children;function calculateBmi(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var d=e/(t/100*t/100);(d=Math.round(1e3*d)/1e3)<18.5&&(d+=" Too Thin"),d>18.5&&d<25&&(d+=" Healthy"),d>25&&(d+=" Over Weight"),document.getElementById("BodyMassIndexValue").innerText=d,document.getElementById("x_BodyMassIndex").value=d}}function calculateBSA(){var e=document.getElementById("x_WT").value,t=document.getElementById("x_HT").value;if(e>0&&t>0){var d=0;d=Math.pow(e,.425)*Math.pow(t,.725)*.007184,d=Math.round(1e3*d)/1e3,document.getElementById("BodySurfaceAreaValue").innerText=d,document.getElementById("x_SurfaceArea").value=d}}$("#x_WT").change(function(){calculateBmi(),calculateBSA()}),$("#x_HT").change(function(){calculateBmi(),calculateBSA()});var evalue=d[0].value;document.getElementById("profilePicturePatient").src="uploads/"+evalue;
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_vitals_view->terminate();
?>