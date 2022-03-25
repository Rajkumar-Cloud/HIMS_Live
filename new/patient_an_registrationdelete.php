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
$patient_an_registration_delete = new patient_an_registration_delete();

// Run the page
$patient_an_registration_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_an_registrationdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_an_registrationdelete = currentForm = new ew.Form("fpatient_an_registrationdelete", "delete");
	loadjs.done("fpatient_an_registrationdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_an_registration_delete->showPageHeader(); ?>
<?php
$patient_an_registration_delete->showMessage();
?>
<form name="fpatient_an_registrationdelete" id="fpatient_an_registrationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_an_registration_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_an_registration_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_an_registration_delete->id->headerCellClass() ?>"><span id="elh_patient_an_registration_id" class="patient_an_registration_id"><?php echo $patient_an_registration_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->pid->Visible) { // pid ?>
		<th class="<?php echo $patient_an_registration_delete->pid->headerCellClass() ?>"><span id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><?php echo $patient_an_registration_delete->pid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->fid->Visible) { // fid ?>
		<th class="<?php echo $patient_an_registration_delete->fid->headerCellClass() ?>"><span id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><?php echo $patient_an_registration_delete->fid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->G->Visible) { // G ?>
		<th class="<?php echo $patient_an_registration_delete->G->headerCellClass() ?>"><span id="elh_patient_an_registration_G" class="patient_an_registration_G"><?php echo $patient_an_registration_delete->G->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->P->Visible) { // P ?>
		<th class="<?php echo $patient_an_registration_delete->P->headerCellClass() ?>"><span id="elh_patient_an_registration_P" class="patient_an_registration_P"><?php echo $patient_an_registration_delete->P->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->L->Visible) { // L ?>
		<th class="<?php echo $patient_an_registration_delete->L->headerCellClass() ?>"><span id="elh_patient_an_registration_L" class="patient_an_registration_L"><?php echo $patient_an_registration_delete->L->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A->Visible) { // A ?>
		<th class="<?php echo $patient_an_registration_delete->A->headerCellClass() ?>"><span id="elh_patient_an_registration_A" class="patient_an_registration_A"><?php echo $patient_an_registration_delete->A->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->E->Visible) { // E ?>
		<th class="<?php echo $patient_an_registration_delete->E->headerCellClass() ?>"><span id="elh_patient_an_registration_E" class="patient_an_registration_E"><?php echo $patient_an_registration_delete->E->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->M->Visible) { // M ?>
		<th class="<?php echo $patient_an_registration_delete->M->headerCellClass() ?>"><span id="elh_patient_an_registration_M" class="patient_an_registration_M"><?php echo $patient_an_registration_delete->M->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->LMP->Visible) { // LMP ?>
		<th class="<?php echo $patient_an_registration_delete->LMP->headerCellClass() ?>"><span id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><?php echo $patient_an_registration_delete->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->EDO->Visible) { // EDO ?>
		<th class="<?php echo $patient_an_registration_delete->EDO->headerCellClass() ?>"><span id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><?php echo $patient_an_registration_delete->EDO->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $patient_an_registration_delete->MenstrualHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><?php echo $patient_an_registration_delete->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->MaritalHistory->Visible) { // MaritalHistory ?>
		<th class="<?php echo $patient_an_registration_delete->MaritalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><?php echo $patient_an_registration_delete->MaritalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<th class="<?php echo $patient_an_registration_delete->ObstetricHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><?php echo $patient_an_registration_delete->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<th class="<?php echo $patient_an_registration_delete->PreviousHistoryofGDM->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><?php echo $patient_an_registration_delete->PreviousHistoryofGDM->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<th class="<?php echo $patient_an_registration_delete->PreviousHistorofPIH->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><?php echo $patient_an_registration_delete->PreviousHistorofPIH->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<th class="<?php echo $patient_an_registration_delete->PreviousHistoryofIUGR->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><?php echo $patient_an_registration_delete->PreviousHistoryofIUGR->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<th class="<?php echo $patient_an_registration_delete->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><?php echo $patient_an_registration_delete->PreviousHistoryofOligohydramnios->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<th class="<?php echo $patient_an_registration_delete->PreviousHistoryofPreterm->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><?php echo $patient_an_registration_delete->PreviousHistoryofPreterm->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->G1->Visible) { // G1 ?>
		<th class="<?php echo $patient_an_registration_delete->G1->headerCellClass() ?>"><span id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><?php echo $patient_an_registration_delete->G1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->G2->Visible) { // G2 ?>
		<th class="<?php echo $patient_an_registration_delete->G2->headerCellClass() ?>"><span id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><?php echo $patient_an_registration_delete->G2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->G3->Visible) { // G3 ?>
		<th class="<?php echo $patient_an_registration_delete->G3->headerCellClass() ?>"><span id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><?php echo $patient_an_registration_delete->G3->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<th class="<?php echo $patient_an_registration_delete->DeliveryNDLSCS1->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><?php echo $patient_an_registration_delete->DeliveryNDLSCS1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<th class="<?php echo $patient_an_registration_delete->DeliveryNDLSCS2->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><?php echo $patient_an_registration_delete->DeliveryNDLSCS2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<th class="<?php echo $patient_an_registration_delete->DeliveryNDLSCS3->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><?php echo $patient_an_registration_delete->DeliveryNDLSCS3->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->BabySexweight1->Visible) { // BabySexweight1 ?>
		<th class="<?php echo $patient_an_registration_delete->BabySexweight1->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><?php echo $patient_an_registration_delete->BabySexweight1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->BabySexweight2->Visible) { // BabySexweight2 ?>
		<th class="<?php echo $patient_an_registration_delete->BabySexweight2->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><?php echo $patient_an_registration_delete->BabySexweight2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->BabySexweight3->Visible) { // BabySexweight3 ?>
		<th class="<?php echo $patient_an_registration_delete->BabySexweight3->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><?php echo $patient_an_registration_delete->BabySexweight3->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<th class="<?php echo $patient_an_registration_delete->PastMedicalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><?php echo $patient_an_registration_delete->PastMedicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<th class="<?php echo $patient_an_registration_delete->PastSurgicalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><?php echo $patient_an_registration_delete->PastSurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->FamilyHistory->Visible) { // FamilyHistory ?>
		<th class="<?php echo $patient_an_registration_delete->FamilyHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><?php echo $patient_an_registration_delete->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability->Visible) { // Viability ?>
		<th class="<?php echo $patient_an_registration_delete->Viability->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><?php echo $patient_an_registration_delete->Viability->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<th class="<?php echo $patient_an_registration_delete->ViabilityDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><?php echo $patient_an_registration_delete->ViabilityDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->ViabilityREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT"><?php echo $patient_an_registration_delete->ViabilityREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability2->Visible) { // Viability2 ?>
		<th class="<?php echo $patient_an_registration_delete->Viability2->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><?php echo $patient_an_registration_delete->Viability2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability2DATE->Visible) { // Viability2DATE ?>
		<th class="<?php echo $patient_an_registration_delete->Viability2DATE->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><?php echo $patient_an_registration_delete->Viability2DATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<th class="<?php echo $patient_an_registration_delete->Viability2REPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT"><?php echo $patient_an_registration_delete->Viability2REPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->NTscan->Visible) { // NTscan ?>
		<th class="<?php echo $patient_an_registration_delete->NTscan->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><?php echo $patient_an_registration_delete->NTscan->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->NTscanDATE->Visible) { // NTscanDATE ?>
		<th class="<?php echo $patient_an_registration_delete->NTscanDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><?php echo $patient_an_registration_delete->NTscanDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->NTscanREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT"><?php echo $patient_an_registration_delete->NTscanREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->EarlyTarget->Visible) { // EarlyTarget ?>
		<th class="<?php echo $patient_an_registration_delete->EarlyTarget->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><?php echo $patient_an_registration_delete->EarlyTarget->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<th class="<?php echo $patient_an_registration_delete->EarlyTargetDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><?php echo $patient_an_registration_delete->EarlyTargetDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->EarlyTargetREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT"><?php echo $patient_an_registration_delete->EarlyTargetREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Anomaly->Visible) { // Anomaly ?>
		<th class="<?php echo $patient_an_registration_delete->Anomaly->headerCellClass() ?>"><span id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><?php echo $patient_an_registration_delete->Anomaly->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<th class="<?php echo $patient_an_registration_delete->AnomalyDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><?php echo $patient_an_registration_delete->AnomalyDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->AnomalyREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT"><?php echo $patient_an_registration_delete->AnomalyREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth->Visible) { // Growth ?>
		<th class="<?php echo $patient_an_registration_delete->Growth->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><?php echo $patient_an_registration_delete->Growth->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->GrowthDATE->Visible) { // GrowthDATE ?>
		<th class="<?php echo $patient_an_registration_delete->GrowthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><?php echo $patient_an_registration_delete->GrowthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->GrowthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT"><?php echo $patient_an_registration_delete->GrowthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth1->Visible) { // Growth1 ?>
		<th class="<?php echo $patient_an_registration_delete->Growth1->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><?php echo $patient_an_registration_delete->Growth1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth1DATE->Visible) { // Growth1DATE ?>
		<th class="<?php echo $patient_an_registration_delete->Growth1DATE->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><?php echo $patient_an_registration_delete->Growth1DATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<th class="<?php echo $patient_an_registration_delete->Growth1REPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT"><?php echo $patient_an_registration_delete->Growth1REPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfile->Visible) { // ANProfile ?>
		<th class="<?php echo $patient_an_registration_delete->ANProfile->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><?php echo $patient_an_registration_delete->ANProfile->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<th class="<?php echo $patient_an_registration_delete->ANProfileDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><?php echo $patient_an_registration_delete->ANProfileDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<th class="<?php echo $patient_an_registration_delete->ANProfileINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><?php echo $patient_an_registration_delete->ANProfileINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->ANProfileREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT"><?php echo $patient_an_registration_delete->ANProfileREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarker->Visible) { // DualMarker ?>
		<th class="<?php echo $patient_an_registration_delete->DualMarker->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><?php echo $patient_an_registration_delete->DualMarker->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<th class="<?php echo $patient_an_registration_delete->DualMarkerDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><?php echo $patient_an_registration_delete->DualMarkerDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<th class="<?php echo $patient_an_registration_delete->DualMarkerINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><?php echo $patient_an_registration_delete->DualMarkerINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->DualMarkerREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT"><?php echo $patient_an_registration_delete->DualMarkerREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Quadruple->Visible) { // Quadruple ?>
		<th class="<?php echo $patient_an_registration_delete->Quadruple->headerCellClass() ?>"><span id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><?php echo $patient_an_registration_delete->Quadruple->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<th class="<?php echo $patient_an_registration_delete->QuadrupleDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><?php echo $patient_an_registration_delete->QuadrupleDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<th class="<?php echo $patient_an_registration_delete->QuadrupleINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><?php echo $patient_an_registration_delete->QuadrupleINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->QuadrupleREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT"><?php echo $patient_an_registration_delete->QuadrupleREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A5month->Visible) { // A5month ?>
		<th class="<?php echo $patient_an_registration_delete->A5month->headerCellClass() ?>"><span id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><?php echo $patient_an_registration_delete->A5month->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A5monthDATE->Visible) { // A5monthDATE ?>
		<th class="<?php echo $patient_an_registration_delete->A5monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><?php echo $patient_an_registration_delete->A5monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<th class="<?php echo $patient_an_registration_delete->A5monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><?php echo $patient_an_registration_delete->A5monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->A5monthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT"><?php echo $patient_an_registration_delete->A5monthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A7month->Visible) { // A7month ?>
		<th class="<?php echo $patient_an_registration_delete->A7month->headerCellClass() ?>"><span id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><?php echo $patient_an_registration_delete->A7month->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A7monthDATE->Visible) { // A7monthDATE ?>
		<th class="<?php echo $patient_an_registration_delete->A7monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><?php echo $patient_an_registration_delete->A7monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<th class="<?php echo $patient_an_registration_delete->A7monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><?php echo $patient_an_registration_delete->A7monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->A7monthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT"><?php echo $patient_an_registration_delete->A7monthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A9month->Visible) { // A9month ?>
		<th class="<?php echo $patient_an_registration_delete->A9month->headerCellClass() ?>"><span id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><?php echo $patient_an_registration_delete->A9month->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A9monthDATE->Visible) { // A9monthDATE ?>
		<th class="<?php echo $patient_an_registration_delete->A9monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><?php echo $patient_an_registration_delete->A9monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<th class="<?php echo $patient_an_registration_delete->A9monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><?php echo $patient_an_registration_delete->A9monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->A9monthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT"><?php echo $patient_an_registration_delete->A9monthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->INJ->Visible) { // INJ ?>
		<th class="<?php echo $patient_an_registration_delete->INJ->headerCellClass() ?>"><span id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><?php echo $patient_an_registration_delete->INJ->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->INJDATE->Visible) { // INJDATE ?>
		<th class="<?php echo $patient_an_registration_delete->INJDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><?php echo $patient_an_registration_delete->INJDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<th class="<?php echo $patient_an_registration_delete->INJINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><?php echo $patient_an_registration_delete->INJINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->INJREPORT->Visible) { // INJREPORT ?>
		<th class="<?php echo $patient_an_registration_delete->INJREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT"><?php echo $patient_an_registration_delete->INJREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Bleeding->Visible) { // Bleeding ?>
		<th class="<?php echo $patient_an_registration_delete->Bleeding->headerCellClass() ?>"><span id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><?php echo $patient_an_registration_delete->Bleeding->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<th class="<?php echo $patient_an_registration_delete->Hypothyroidism->headerCellClass() ?>"><span id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><?php echo $patient_an_registration_delete->Hypothyroidism->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PICMENumber->Visible) { // PICMENumber ?>
		<th class="<?php echo $patient_an_registration_delete->PICMENumber->headerCellClass() ?>"><span id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><?php echo $patient_an_registration_delete->PICMENumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Outcome->Visible) { // Outcome ?>
		<th class="<?php echo $patient_an_registration_delete->Outcome->headerCellClass() ?>"><span id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><?php echo $patient_an_registration_delete->Outcome->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DateofAdmission->Visible) { // DateofAdmission ?>
		<th class="<?php echo $patient_an_registration_delete->DateofAdmission->headerCellClass() ?>"><span id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><?php echo $patient_an_registration_delete->DateofAdmission->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->DateodProcedure->Visible) { // DateodProcedure ?>
		<th class="<?php echo $patient_an_registration_delete->DateodProcedure->headerCellClass() ?>"><span id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><?php echo $patient_an_registration_delete->DateodProcedure->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Miscarriage->Visible) { // Miscarriage ?>
		<th class="<?php echo $patient_an_registration_delete->Miscarriage->headerCellClass() ?>"><span id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><?php echo $patient_an_registration_delete->Miscarriage->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<th class="<?php echo $patient_an_registration_delete->ModeOfDelivery->headerCellClass() ?>"><span id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><?php echo $patient_an_registration_delete->ModeOfDelivery->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ND->Visible) { // ND ?>
		<th class="<?php echo $patient_an_registration_delete->ND->headerCellClass() ?>"><span id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><?php echo $patient_an_registration_delete->ND->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->NDS->Visible) { // NDS ?>
		<th class="<?php echo $patient_an_registration_delete->NDS->headerCellClass() ?>"><span id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><?php echo $patient_an_registration_delete->NDS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->NDP->Visible) { // NDP ?>
		<th class="<?php echo $patient_an_registration_delete->NDP->headerCellClass() ?>"><span id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><?php echo $patient_an_registration_delete->NDP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Vaccum->Visible) { // Vaccum ?>
		<th class="<?php echo $patient_an_registration_delete->Vaccum->headerCellClass() ?>"><span id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><?php echo $patient_an_registration_delete->Vaccum->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->VaccumS->Visible) { // VaccumS ?>
		<th class="<?php echo $patient_an_registration_delete->VaccumS->headerCellClass() ?>"><span id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><?php echo $patient_an_registration_delete->VaccumS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->VaccumP->Visible) { // VaccumP ?>
		<th class="<?php echo $patient_an_registration_delete->VaccumP->headerCellClass() ?>"><span id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><?php echo $patient_an_registration_delete->VaccumP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Forceps->Visible) { // Forceps ?>
		<th class="<?php echo $patient_an_registration_delete->Forceps->headerCellClass() ?>"><span id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><?php echo $patient_an_registration_delete->Forceps->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ForcepsS->Visible) { // ForcepsS ?>
		<th class="<?php echo $patient_an_registration_delete->ForcepsS->headerCellClass() ?>"><span id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><?php echo $patient_an_registration_delete->ForcepsS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ForcepsP->Visible) { // ForcepsP ?>
		<th class="<?php echo $patient_an_registration_delete->ForcepsP->headerCellClass() ?>"><span id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><?php echo $patient_an_registration_delete->ForcepsP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Elective->Visible) { // Elective ?>
		<th class="<?php echo $patient_an_registration_delete->Elective->headerCellClass() ?>"><span id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><?php echo $patient_an_registration_delete->Elective->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ElectiveS->Visible) { // ElectiveS ?>
		<th class="<?php echo $patient_an_registration_delete->ElectiveS->headerCellClass() ?>"><span id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><?php echo $patient_an_registration_delete->ElectiveS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ElectiveP->Visible) { // ElectiveP ?>
		<th class="<?php echo $patient_an_registration_delete->ElectiveP->headerCellClass() ?>"><span id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><?php echo $patient_an_registration_delete->ElectiveP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Emergency->Visible) { // Emergency ?>
		<th class="<?php echo $patient_an_registration_delete->Emergency->headerCellClass() ?>"><span id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><?php echo $patient_an_registration_delete->Emergency->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->EmergencyS->Visible) { // EmergencyS ?>
		<th class="<?php echo $patient_an_registration_delete->EmergencyS->headerCellClass() ?>"><span id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><?php echo $patient_an_registration_delete->EmergencyS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->EmergencyP->Visible) { // EmergencyP ?>
		<th class="<?php echo $patient_an_registration_delete->EmergencyP->headerCellClass() ?>"><span id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><?php echo $patient_an_registration_delete->EmergencyP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Maturity->Visible) { // Maturity ?>
		<th class="<?php echo $patient_an_registration_delete->Maturity->headerCellClass() ?>"><span id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><?php echo $patient_an_registration_delete->Maturity->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Baby1->Visible) { // Baby1 ?>
		<th class="<?php echo $patient_an_registration_delete->Baby1->headerCellClass() ?>"><span id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><?php echo $patient_an_registration_delete->Baby1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Baby2->Visible) { // Baby2 ?>
		<th class="<?php echo $patient_an_registration_delete->Baby2->headerCellClass() ?>"><span id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><?php echo $patient_an_registration_delete->Baby2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->sex1->Visible) { // sex1 ?>
		<th class="<?php echo $patient_an_registration_delete->sex1->headerCellClass() ?>"><span id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><?php echo $patient_an_registration_delete->sex1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->sex2->Visible) { // sex2 ?>
		<th class="<?php echo $patient_an_registration_delete->sex2->headerCellClass() ?>"><span id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><?php echo $patient_an_registration_delete->sex2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->weight1->Visible) { // weight1 ?>
		<th class="<?php echo $patient_an_registration_delete->weight1->headerCellClass() ?>"><span id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><?php echo $patient_an_registration_delete->weight1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->weight2->Visible) { // weight2 ?>
		<th class="<?php echo $patient_an_registration_delete->weight2->headerCellClass() ?>"><span id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><?php echo $patient_an_registration_delete->weight2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->NICU1->Visible) { // NICU1 ?>
		<th class="<?php echo $patient_an_registration_delete->NICU1->headerCellClass() ?>"><span id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><?php echo $patient_an_registration_delete->NICU1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->NICU2->Visible) { // NICU2 ?>
		<th class="<?php echo $patient_an_registration_delete->NICU2->headerCellClass() ?>"><span id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><?php echo $patient_an_registration_delete->NICU2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Jaundice1->Visible) { // Jaundice1 ?>
		<th class="<?php echo $patient_an_registration_delete->Jaundice1->headerCellClass() ?>"><span id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><?php echo $patient_an_registration_delete->Jaundice1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Jaundice2->Visible) { // Jaundice2 ?>
		<th class="<?php echo $patient_an_registration_delete->Jaundice2->headerCellClass() ?>"><span id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><?php echo $patient_an_registration_delete->Jaundice2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Others1->Visible) { // Others1 ?>
		<th class="<?php echo $patient_an_registration_delete->Others1->headerCellClass() ?>"><span id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><?php echo $patient_an_registration_delete->Others1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->Others2->Visible) { // Others2 ?>
		<th class="<?php echo $patient_an_registration_delete->Others2->headerCellClass() ?>"><span id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><?php echo $patient_an_registration_delete->Others2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<th class="<?php echo $patient_an_registration_delete->SpillOverReasons->headerCellClass() ?>"><span id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><?php echo $patient_an_registration_delete->SpillOverReasons->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ANClosed->Visible) { // ANClosed ?>
		<th class="<?php echo $patient_an_registration_delete->ANClosed->headerCellClass() ?>"><span id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><?php echo $patient_an_registration_delete->ANClosed->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<th class="<?php echo $patient_an_registration_delete->ANClosedDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><?php echo $patient_an_registration_delete->ANClosedDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<th class="<?php echo $patient_an_registration_delete->PastMedicalHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><?php echo $patient_an_registration_delete->PastMedicalHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<th class="<?php echo $patient_an_registration_delete->PastSurgicalHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><?php echo $patient_an_registration_delete->PastSurgicalHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<th class="<?php echo $patient_an_registration_delete->FamilyHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><?php echo $patient_an_registration_delete->FamilyHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<th class="<?php echo $patient_an_registration_delete->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><?php echo $patient_an_registration_delete->PresentPregnancyComplicationsOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration_delete->ETdate->Visible) { // ETdate ?>
		<th class="<?php echo $patient_an_registration_delete->ETdate->headerCellClass() ?>"><span id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><?php echo $patient_an_registration_delete->ETdate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_an_registration_delete->RecordCount = 0;
$i = 0;
while (!$patient_an_registration_delete->Recordset->EOF) {
	$patient_an_registration_delete->RecordCount++;
	$patient_an_registration_delete->RowCount++;

	// Set row properties
	$patient_an_registration->resetAttributes();
	$patient_an_registration->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_an_registration_delete->loadRowValues($patient_an_registration_delete->Recordset);

	// Render row
	$patient_an_registration_delete->renderRow();
?>
	<tr <?php echo $patient_an_registration->rowAttributes() ?>>
<?php if ($patient_an_registration_delete->id->Visible) { // id ?>
		<td <?php echo $patient_an_registration_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_id" class="patient_an_registration_id">
<span<?php echo $patient_an_registration_delete->id->viewAttributes() ?>><?php echo $patient_an_registration_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->pid->Visible) { // pid ?>
		<td <?php echo $patient_an_registration_delete->pid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_pid" class="patient_an_registration_pid">
<span<?php echo $patient_an_registration_delete->pid->viewAttributes() ?>><?php echo $patient_an_registration_delete->pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->fid->Visible) { // fid ?>
		<td <?php echo $patient_an_registration_delete->fid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_fid" class="patient_an_registration_fid">
<span<?php echo $patient_an_registration_delete->fid->viewAttributes() ?>><?php echo $patient_an_registration_delete->fid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->G->Visible) { // G ?>
		<td <?php echo $patient_an_registration_delete->G->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_G" class="patient_an_registration_G">
<span<?php echo $patient_an_registration_delete->G->viewAttributes() ?>><?php echo $patient_an_registration_delete->G->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->P->Visible) { // P ?>
		<td <?php echo $patient_an_registration_delete->P->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_P" class="patient_an_registration_P">
<span<?php echo $patient_an_registration_delete->P->viewAttributes() ?>><?php echo $patient_an_registration_delete->P->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->L->Visible) { // L ?>
		<td <?php echo $patient_an_registration_delete->L->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_L" class="patient_an_registration_L">
<span<?php echo $patient_an_registration_delete->L->viewAttributes() ?>><?php echo $patient_an_registration_delete->L->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A->Visible) { // A ?>
		<td <?php echo $patient_an_registration_delete->A->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A" class="patient_an_registration_A">
<span<?php echo $patient_an_registration_delete->A->viewAttributes() ?>><?php echo $patient_an_registration_delete->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->E->Visible) { // E ?>
		<td <?php echo $patient_an_registration_delete->E->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_E" class="patient_an_registration_E">
<span<?php echo $patient_an_registration_delete->E->viewAttributes() ?>><?php echo $patient_an_registration_delete->E->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->M->Visible) { // M ?>
		<td <?php echo $patient_an_registration_delete->M->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_M" class="patient_an_registration_M">
<span<?php echo $patient_an_registration_delete->M->viewAttributes() ?>><?php echo $patient_an_registration_delete->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->LMP->Visible) { // LMP ?>
		<td <?php echo $patient_an_registration_delete->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_LMP" class="patient_an_registration_LMP">
<span<?php echo $patient_an_registration_delete->LMP->viewAttributes() ?>><?php echo $patient_an_registration_delete->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->EDO->Visible) { // EDO ?>
		<td <?php echo $patient_an_registration_delete->EDO->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_EDO" class="patient_an_registration_EDO">
<span<?php echo $patient_an_registration_delete->EDO->viewAttributes() ?>><?php echo $patient_an_registration_delete->EDO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td <?php echo $patient_an_registration_delete->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration_delete->MenstrualHistory->viewAttributes() ?>><?php echo $patient_an_registration_delete->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->MaritalHistory->Visible) { // MaritalHistory ?>
		<td <?php echo $patient_an_registration_delete->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration_delete->MaritalHistory->viewAttributes() ?>><?php echo $patient_an_registration_delete->MaritalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td <?php echo $patient_an_registration_delete->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration_delete->ObstetricHistory->viewAttributes() ?>><?php echo $patient_an_registration_delete->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td <?php echo $patient_an_registration_delete->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration_delete->PreviousHistoryofGDM->viewAttributes() ?>><?php echo $patient_an_registration_delete->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td <?php echo $patient_an_registration_delete->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration_delete->PreviousHistorofPIH->viewAttributes() ?>><?php echo $patient_an_registration_delete->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td <?php echo $patient_an_registration_delete->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration_delete->PreviousHistoryofIUGR->viewAttributes() ?>><?php echo $patient_an_registration_delete->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td <?php echo $patient_an_registration_delete->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration_delete->PreviousHistoryofOligohydramnios->viewAttributes() ?>><?php echo $patient_an_registration_delete->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td <?php echo $patient_an_registration_delete->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration_delete->PreviousHistoryofPreterm->viewAttributes() ?>><?php echo $patient_an_registration_delete->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->G1->Visible) { // G1 ?>
		<td <?php echo $patient_an_registration_delete->G1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_G1" class="patient_an_registration_G1">
<span<?php echo $patient_an_registration_delete->G1->viewAttributes() ?>><?php echo $patient_an_registration_delete->G1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->G2->Visible) { // G2 ?>
		<td <?php echo $patient_an_registration_delete->G2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_G2" class="patient_an_registration_G2">
<span<?php echo $patient_an_registration_delete->G2->viewAttributes() ?>><?php echo $patient_an_registration_delete->G2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->G3->Visible) { // G3 ?>
		<td <?php echo $patient_an_registration_delete->G3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_G3" class="patient_an_registration_G3">
<span<?php echo $patient_an_registration_delete->G3->viewAttributes() ?>><?php echo $patient_an_registration_delete->G3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td <?php echo $patient_an_registration_delete->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration_delete->DeliveryNDLSCS1->viewAttributes() ?>><?php echo $patient_an_registration_delete->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td <?php echo $patient_an_registration_delete->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration_delete->DeliveryNDLSCS2->viewAttributes() ?>><?php echo $patient_an_registration_delete->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td <?php echo $patient_an_registration_delete->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration_delete->DeliveryNDLSCS3->viewAttributes() ?>><?php echo $patient_an_registration_delete->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td <?php echo $patient_an_registration_delete->BabySexweight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration_delete->BabySexweight1->viewAttributes() ?>><?php echo $patient_an_registration_delete->BabySexweight1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td <?php echo $patient_an_registration_delete->BabySexweight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration_delete->BabySexweight2->viewAttributes() ?>><?php echo $patient_an_registration_delete->BabySexweight2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td <?php echo $patient_an_registration_delete->BabySexweight3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration_delete->BabySexweight3->viewAttributes() ?>><?php echo $patient_an_registration_delete->BabySexweight3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td <?php echo $patient_an_registration_delete->PastMedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration_delete->PastMedicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_delete->PastMedicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td <?php echo $patient_an_registration_delete->PastSurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration_delete->PastSurgicalHistory->viewAttributes() ?>><?php echo $patient_an_registration_delete->PastSurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->FamilyHistory->Visible) { // FamilyHistory ?>
		<td <?php echo $patient_an_registration_delete->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration_delete->FamilyHistory->viewAttributes() ?>><?php echo $patient_an_registration_delete->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability->Visible) { // Viability ?>
		<td <?php echo $patient_an_registration_delete->Viability->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Viability" class="patient_an_registration_Viability">
<span<?php echo $patient_an_registration_delete->Viability->viewAttributes() ?>><?php echo $patient_an_registration_delete->Viability->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td <?php echo $patient_an_registration_delete->ViabilityDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration_delete->ViabilityDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->ViabilityDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td <?php echo $patient_an_registration_delete->ViabilityREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration_delete->ViabilityREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->ViabilityREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability2->Visible) { // Viability2 ?>
		<td <?php echo $patient_an_registration_delete->Viability2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
<span<?php echo $patient_an_registration_delete->Viability2->viewAttributes() ?>><?php echo $patient_an_registration_delete->Viability2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability2DATE->Visible) { // Viability2DATE ?>
		<td <?php echo $patient_an_registration_delete->Viability2DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration_delete->Viability2DATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->Viability2DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td <?php echo $patient_an_registration_delete->Viability2REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration_delete->Viability2REPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->Viability2REPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->NTscan->Visible) { // NTscan ?>
		<td <?php echo $patient_an_registration_delete->NTscan->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
<span<?php echo $patient_an_registration_delete->NTscan->viewAttributes() ?>><?php echo $patient_an_registration_delete->NTscan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->NTscanDATE->Visible) { // NTscanDATE ?>
		<td <?php echo $patient_an_registration_delete->NTscanDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration_delete->NTscanDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->NTscanDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td <?php echo $patient_an_registration_delete->NTscanREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration_delete->NTscanREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->NTscanREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->EarlyTarget->Visible) { // EarlyTarget ?>
		<td <?php echo $patient_an_registration_delete->EarlyTarget->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration_delete->EarlyTarget->viewAttributes() ?>><?php echo $patient_an_registration_delete->EarlyTarget->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td <?php echo $patient_an_registration_delete->EarlyTargetDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration_delete->EarlyTargetDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->EarlyTargetDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td <?php echo $patient_an_registration_delete->EarlyTargetREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration_delete->EarlyTargetREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->EarlyTargetREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Anomaly->Visible) { // Anomaly ?>
		<td <?php echo $patient_an_registration_delete->Anomaly->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration_delete->Anomaly->viewAttributes() ?>><?php echo $patient_an_registration_delete->Anomaly->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td <?php echo $patient_an_registration_delete->AnomalyDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration_delete->AnomalyDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->AnomalyDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td <?php echo $patient_an_registration_delete->AnomalyREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration_delete->AnomalyREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->AnomalyREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth->Visible) { // Growth ?>
		<td <?php echo $patient_an_registration_delete->Growth->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Growth" class="patient_an_registration_Growth">
<span<?php echo $patient_an_registration_delete->Growth->viewAttributes() ?>><?php echo $patient_an_registration_delete->Growth->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->GrowthDATE->Visible) { // GrowthDATE ?>
		<td <?php echo $patient_an_registration_delete->GrowthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration_delete->GrowthDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->GrowthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td <?php echo $patient_an_registration_delete->GrowthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration_delete->GrowthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->GrowthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth1->Visible) { // Growth1 ?>
		<td <?php echo $patient_an_registration_delete->Growth1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
<span<?php echo $patient_an_registration_delete->Growth1->viewAttributes() ?>><?php echo $patient_an_registration_delete->Growth1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth1DATE->Visible) { // Growth1DATE ?>
		<td <?php echo $patient_an_registration_delete->Growth1DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration_delete->Growth1DATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->Growth1DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td <?php echo $patient_an_registration_delete->Growth1REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration_delete->Growth1REPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->Growth1REPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfile->Visible) { // ANProfile ?>
		<td <?php echo $patient_an_registration_delete->ANProfile->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration_delete->ANProfile->viewAttributes() ?>><?php echo $patient_an_registration_delete->ANProfile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td <?php echo $patient_an_registration_delete->ANProfileDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration_delete->ANProfileDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->ANProfileDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td <?php echo $patient_an_registration_delete->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration_delete->ANProfileINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_delete->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td <?php echo $patient_an_registration_delete->ANProfileREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration_delete->ANProfileREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->ANProfileREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarker->Visible) { // DualMarker ?>
		<td <?php echo $patient_an_registration_delete->DualMarker->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration_delete->DualMarker->viewAttributes() ?>><?php echo $patient_an_registration_delete->DualMarker->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td <?php echo $patient_an_registration_delete->DualMarkerDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration_delete->DualMarkerDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->DualMarkerDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td <?php echo $patient_an_registration_delete->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration_delete->DualMarkerINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_delete->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td <?php echo $patient_an_registration_delete->DualMarkerREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration_delete->DualMarkerREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->DualMarkerREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Quadruple->Visible) { // Quadruple ?>
		<td <?php echo $patient_an_registration_delete->Quadruple->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration_delete->Quadruple->viewAttributes() ?>><?php echo $patient_an_registration_delete->Quadruple->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td <?php echo $patient_an_registration_delete->QuadrupleDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration_delete->QuadrupleDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->QuadrupleDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td <?php echo $patient_an_registration_delete->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration_delete->QuadrupleINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_delete->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td <?php echo $patient_an_registration_delete->QuadrupleREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration_delete->QuadrupleREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->QuadrupleREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A5month->Visible) { // A5month ?>
		<td <?php echo $patient_an_registration_delete->A5month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A5month" class="patient_an_registration_A5month">
<span<?php echo $patient_an_registration_delete->A5month->viewAttributes() ?>><?php echo $patient_an_registration_delete->A5month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A5monthDATE->Visible) { // A5monthDATE ?>
		<td <?php echo $patient_an_registration_delete->A5monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration_delete->A5monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->A5monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td <?php echo $patient_an_registration_delete->A5monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration_delete->A5monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_delete->A5monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td <?php echo $patient_an_registration_delete->A5monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration_delete->A5monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->A5monthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A7month->Visible) { // A7month ?>
		<td <?php echo $patient_an_registration_delete->A7month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A7month" class="patient_an_registration_A7month">
<span<?php echo $patient_an_registration_delete->A7month->viewAttributes() ?>><?php echo $patient_an_registration_delete->A7month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A7monthDATE->Visible) { // A7monthDATE ?>
		<td <?php echo $patient_an_registration_delete->A7monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration_delete->A7monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->A7monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td <?php echo $patient_an_registration_delete->A7monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration_delete->A7monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_delete->A7monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td <?php echo $patient_an_registration_delete->A7monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration_delete->A7monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->A7monthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A9month->Visible) { // A9month ?>
		<td <?php echo $patient_an_registration_delete->A9month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A9month" class="patient_an_registration_A9month">
<span<?php echo $patient_an_registration_delete->A9month->viewAttributes() ?>><?php echo $patient_an_registration_delete->A9month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A9monthDATE->Visible) { // A9monthDATE ?>
		<td <?php echo $patient_an_registration_delete->A9monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration_delete->A9monthDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->A9monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td <?php echo $patient_an_registration_delete->A9monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration_delete->A9monthINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_delete->A9monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td <?php echo $patient_an_registration_delete->A9monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration_delete->A9monthREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->A9monthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->INJ->Visible) { // INJ ?>
		<td <?php echo $patient_an_registration_delete->INJ->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_INJ" class="patient_an_registration_INJ">
<span<?php echo $patient_an_registration_delete->INJ->viewAttributes() ?>><?php echo $patient_an_registration_delete->INJ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->INJDATE->Visible) { // INJDATE ?>
		<td <?php echo $patient_an_registration_delete->INJDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration_delete->INJDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->INJDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td <?php echo $patient_an_registration_delete->INJINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration_delete->INJINHOUSE->viewAttributes() ?>><?php echo $patient_an_registration_delete->INJINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->INJREPORT->Visible) { // INJREPORT ?>
		<td <?php echo $patient_an_registration_delete->INJREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration_delete->INJREPORT->viewAttributes() ?>><?php echo $patient_an_registration_delete->INJREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Bleeding->Visible) { // Bleeding ?>
		<td <?php echo $patient_an_registration_delete->Bleeding->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration_delete->Bleeding->viewAttributes() ?>><?php echo $patient_an_registration_delete->Bleeding->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td <?php echo $patient_an_registration_delete->Hypothyroidism->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration_delete->Hypothyroidism->viewAttributes() ?>><?php echo $patient_an_registration_delete->Hypothyroidism->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PICMENumber->Visible) { // PICMENumber ?>
		<td <?php echo $patient_an_registration_delete->PICMENumber->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration_delete->PICMENumber->viewAttributes() ?>><?php echo $patient_an_registration_delete->PICMENumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Outcome->Visible) { // Outcome ?>
		<td <?php echo $patient_an_registration_delete->Outcome->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
<span<?php echo $patient_an_registration_delete->Outcome->viewAttributes() ?>><?php echo $patient_an_registration_delete->Outcome->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DateofAdmission->Visible) { // DateofAdmission ?>
		<td <?php echo $patient_an_registration_delete->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration_delete->DateofAdmission->viewAttributes() ?>><?php echo $patient_an_registration_delete->DateofAdmission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->DateodProcedure->Visible) { // DateodProcedure ?>
		<td <?php echo $patient_an_registration_delete->DateodProcedure->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration_delete->DateodProcedure->viewAttributes() ?>><?php echo $patient_an_registration_delete->DateodProcedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Miscarriage->Visible) { // Miscarriage ?>
		<td <?php echo $patient_an_registration_delete->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration_delete->Miscarriage->viewAttributes() ?>><?php echo $patient_an_registration_delete->Miscarriage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td <?php echo $patient_an_registration_delete->ModeOfDelivery->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration_delete->ModeOfDelivery->viewAttributes() ?>><?php echo $patient_an_registration_delete->ModeOfDelivery->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ND->Visible) { // ND ?>
		<td <?php echo $patient_an_registration_delete->ND->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ND" class="patient_an_registration_ND">
<span<?php echo $patient_an_registration_delete->ND->viewAttributes() ?>><?php echo $patient_an_registration_delete->ND->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->NDS->Visible) { // NDS ?>
		<td <?php echo $patient_an_registration_delete->NDS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_NDS" class="patient_an_registration_NDS">
<span<?php echo $patient_an_registration_delete->NDS->viewAttributes() ?>><?php echo $patient_an_registration_delete->NDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->NDP->Visible) { // NDP ?>
		<td <?php echo $patient_an_registration_delete->NDP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_NDP" class="patient_an_registration_NDP">
<span<?php echo $patient_an_registration_delete->NDP->viewAttributes() ?>><?php echo $patient_an_registration_delete->NDP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Vaccum->Visible) { // Vaccum ?>
		<td <?php echo $patient_an_registration_delete->Vaccum->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration_delete->Vaccum->viewAttributes() ?>><?php echo $patient_an_registration_delete->Vaccum->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->VaccumS->Visible) { // VaccumS ?>
		<td <?php echo $patient_an_registration_delete->VaccumS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration_delete->VaccumS->viewAttributes() ?>><?php echo $patient_an_registration_delete->VaccumS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->VaccumP->Visible) { // VaccumP ?>
		<td <?php echo $patient_an_registration_delete->VaccumP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration_delete->VaccumP->viewAttributes() ?>><?php echo $patient_an_registration_delete->VaccumP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Forceps->Visible) { // Forceps ?>
		<td <?php echo $patient_an_registration_delete->Forceps->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
<span<?php echo $patient_an_registration_delete->Forceps->viewAttributes() ?>><?php echo $patient_an_registration_delete->Forceps->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ForcepsS->Visible) { // ForcepsS ?>
		<td <?php echo $patient_an_registration_delete->ForcepsS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration_delete->ForcepsS->viewAttributes() ?>><?php echo $patient_an_registration_delete->ForcepsS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ForcepsP->Visible) { // ForcepsP ?>
		<td <?php echo $patient_an_registration_delete->ForcepsP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration_delete->ForcepsP->viewAttributes() ?>><?php echo $patient_an_registration_delete->ForcepsP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Elective->Visible) { // Elective ?>
		<td <?php echo $patient_an_registration_delete->Elective->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Elective" class="patient_an_registration_Elective">
<span<?php echo $patient_an_registration_delete->Elective->viewAttributes() ?>><?php echo $patient_an_registration_delete->Elective->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ElectiveS->Visible) { // ElectiveS ?>
		<td <?php echo $patient_an_registration_delete->ElectiveS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration_delete->ElectiveS->viewAttributes() ?>><?php echo $patient_an_registration_delete->ElectiveS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ElectiveP->Visible) { // ElectiveP ?>
		<td <?php echo $patient_an_registration_delete->ElectiveP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration_delete->ElectiveP->viewAttributes() ?>><?php echo $patient_an_registration_delete->ElectiveP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Emergency->Visible) { // Emergency ?>
		<td <?php echo $patient_an_registration_delete->Emergency->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
<span<?php echo $patient_an_registration_delete->Emergency->viewAttributes() ?>><?php echo $patient_an_registration_delete->Emergency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->EmergencyS->Visible) { // EmergencyS ?>
		<td <?php echo $patient_an_registration_delete->EmergencyS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration_delete->EmergencyS->viewAttributes() ?>><?php echo $patient_an_registration_delete->EmergencyS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->EmergencyP->Visible) { // EmergencyP ?>
		<td <?php echo $patient_an_registration_delete->EmergencyP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration_delete->EmergencyP->viewAttributes() ?>><?php echo $patient_an_registration_delete->EmergencyP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Maturity->Visible) { // Maturity ?>
		<td <?php echo $patient_an_registration_delete->Maturity->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
<span<?php echo $patient_an_registration_delete->Maturity->viewAttributes() ?>><?php echo $patient_an_registration_delete->Maturity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Baby1->Visible) { // Baby1 ?>
		<td <?php echo $patient_an_registration_delete->Baby1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
<span<?php echo $patient_an_registration_delete->Baby1->viewAttributes() ?>><?php echo $patient_an_registration_delete->Baby1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Baby2->Visible) { // Baby2 ?>
		<td <?php echo $patient_an_registration_delete->Baby2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
<span<?php echo $patient_an_registration_delete->Baby2->viewAttributes() ?>><?php echo $patient_an_registration_delete->Baby2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->sex1->Visible) { // sex1 ?>
		<td <?php echo $patient_an_registration_delete->sex1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_sex1" class="patient_an_registration_sex1">
<span<?php echo $patient_an_registration_delete->sex1->viewAttributes() ?>><?php echo $patient_an_registration_delete->sex1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->sex2->Visible) { // sex2 ?>
		<td <?php echo $patient_an_registration_delete->sex2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_sex2" class="patient_an_registration_sex2">
<span<?php echo $patient_an_registration_delete->sex2->viewAttributes() ?>><?php echo $patient_an_registration_delete->sex2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->weight1->Visible) { // weight1 ?>
		<td <?php echo $patient_an_registration_delete->weight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_weight1" class="patient_an_registration_weight1">
<span<?php echo $patient_an_registration_delete->weight1->viewAttributes() ?>><?php echo $patient_an_registration_delete->weight1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->weight2->Visible) { // weight2 ?>
		<td <?php echo $patient_an_registration_delete->weight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_weight2" class="patient_an_registration_weight2">
<span<?php echo $patient_an_registration_delete->weight2->viewAttributes() ?>><?php echo $patient_an_registration_delete->weight2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->NICU1->Visible) { // NICU1 ?>
		<td <?php echo $patient_an_registration_delete->NICU1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
<span<?php echo $patient_an_registration_delete->NICU1->viewAttributes() ?>><?php echo $patient_an_registration_delete->NICU1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->NICU2->Visible) { // NICU2 ?>
		<td <?php echo $patient_an_registration_delete->NICU2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
<span<?php echo $patient_an_registration_delete->NICU2->viewAttributes() ?>><?php echo $patient_an_registration_delete->NICU2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Jaundice1->Visible) { // Jaundice1 ?>
		<td <?php echo $patient_an_registration_delete->Jaundice1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration_delete->Jaundice1->viewAttributes() ?>><?php echo $patient_an_registration_delete->Jaundice1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Jaundice2->Visible) { // Jaundice2 ?>
		<td <?php echo $patient_an_registration_delete->Jaundice2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration_delete->Jaundice2->viewAttributes() ?>><?php echo $patient_an_registration_delete->Jaundice2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Others1->Visible) { // Others1 ?>
		<td <?php echo $patient_an_registration_delete->Others1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Others1" class="patient_an_registration_Others1">
<span<?php echo $patient_an_registration_delete->Others1->viewAttributes() ?>><?php echo $patient_an_registration_delete->Others1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->Others2->Visible) { // Others2 ?>
		<td <?php echo $patient_an_registration_delete->Others2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_Others2" class="patient_an_registration_Others2">
<span<?php echo $patient_an_registration_delete->Others2->viewAttributes() ?>><?php echo $patient_an_registration_delete->Others2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td <?php echo $patient_an_registration_delete->SpillOverReasons->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration_delete->SpillOverReasons->viewAttributes() ?>><?php echo $patient_an_registration_delete->SpillOverReasons->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ANClosed->Visible) { // ANClosed ?>
		<td <?php echo $patient_an_registration_delete->ANClosed->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration_delete->ANClosed->viewAttributes() ?>><?php echo $patient_an_registration_delete->ANClosed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td <?php echo $patient_an_registration_delete->ANClosedDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration_delete->ANClosedDATE->viewAttributes() ?>><?php echo $patient_an_registration_delete->ANClosedDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td <?php echo $patient_an_registration_delete->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration_delete->PastMedicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_delete->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td <?php echo $patient_an_registration_delete->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration_delete->PastSurgicalHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_delete->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td <?php echo $patient_an_registration_delete->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration_delete->FamilyHistoryOthers->viewAttributes() ?>><?php echo $patient_an_registration_delete->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td <?php echo $patient_an_registration_delete->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration_delete->PresentPregnancyComplicationsOthers->viewAttributes() ?>><?php echo $patient_an_registration_delete->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration_delete->ETdate->Visible) { // ETdate ?>
		<td <?php echo $patient_an_registration_delete->ETdate->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCount ?>_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
<span<?php echo $patient_an_registration_delete->ETdate->viewAttributes() ?>><?php echo $patient_an_registration_delete->ETdate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_an_registration_delete->Recordset->moveNext();
}
$patient_an_registration_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_an_registration_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_an_registration_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$patient_an_registration_delete->terminate();
?>