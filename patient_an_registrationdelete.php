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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_an_registrationdelete = currentForm = new ew.Form("fpatient_an_registrationdelete", "delete");

// Form_CustomValidate event
fpatient_an_registrationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_an_registrationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_an_registrationdelete.lists["x_MenstrualHistory"] = <?php echo $patient_an_registration_delete->MenstrualHistory->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_MenstrualHistory"].options = <?php echo JsonEncode($patient_an_registration_delete->MenstrualHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofGDM"] = <?php echo $patient_an_registration_delete->PreviousHistoryofGDM->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofGDM"].options = <?php echo JsonEncode($patient_an_registration_delete->PreviousHistoryofGDM->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistorofPIH"] = <?php echo $patient_an_registration_delete->PreviousHistorofPIH->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistorofPIH"].options = <?php echo JsonEncode($patient_an_registration_delete->PreviousHistorofPIH->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofIUGR"] = <?php echo $patient_an_registration_delete->PreviousHistoryofIUGR->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofIUGR"].options = <?php echo JsonEncode($patient_an_registration_delete->PreviousHistoryofIUGR->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofOligohydramnios"] = <?php echo $patient_an_registration_delete->PreviousHistoryofOligohydramnios->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofOligohydramnios"].options = <?php echo JsonEncode($patient_an_registration_delete->PreviousHistoryofOligohydramnios->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofPreterm"] = <?php echo $patient_an_registration_delete->PreviousHistoryofPreterm->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_PreviousHistoryofPreterm"].options = <?php echo JsonEncode($patient_an_registration_delete->PreviousHistoryofPreterm->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_PastMedicalHistory[]"] = <?php echo $patient_an_registration_delete->PastMedicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_PastMedicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_delete->PastMedicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_PastSurgicalHistory[]"] = <?php echo $patient_an_registration_delete->PastSurgicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_PastSurgicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_delete->PastSurgicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_FamilyHistory[]"] = <?php echo $patient_an_registration_delete->FamilyHistory->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_FamilyHistory[]"].options = <?php echo JsonEncode($patient_an_registration_delete->FamilyHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_Bleeding[]"] = <?php echo $patient_an_registration_delete->Bleeding->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_Bleeding[]"].options = <?php echo JsonEncode($patient_an_registration_delete->Bleeding->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_Miscarriage"] = <?php echo $patient_an_registration_delete->Miscarriage->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_Miscarriage"].options = <?php echo JsonEncode($patient_an_registration_delete->Miscarriage->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_ModeOfDelivery"] = <?php echo $patient_an_registration_delete->ModeOfDelivery->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_ModeOfDelivery"].options = <?php echo JsonEncode($patient_an_registration_delete->ModeOfDelivery->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_NDS"] = <?php echo $patient_an_registration_delete->NDS->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_NDS"].options = <?php echo JsonEncode($patient_an_registration_delete->NDS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_NDP"] = <?php echo $patient_an_registration_delete->NDP->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_NDP"].options = <?php echo JsonEncode($patient_an_registration_delete->NDP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_VaccumS"] = <?php echo $patient_an_registration_delete->VaccumS->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_VaccumS"].options = <?php echo JsonEncode($patient_an_registration_delete->VaccumS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_VaccumP"] = <?php echo $patient_an_registration_delete->VaccumP->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_VaccumP"].options = <?php echo JsonEncode($patient_an_registration_delete->VaccumP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_ForcepsS"] = <?php echo $patient_an_registration_delete->ForcepsS->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_ForcepsS"].options = <?php echo JsonEncode($patient_an_registration_delete->ForcepsS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_ForcepsP"] = <?php echo $patient_an_registration_delete->ForcepsP->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_ForcepsP"].options = <?php echo JsonEncode($patient_an_registration_delete->ForcepsP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_ElectiveS"] = <?php echo $patient_an_registration_delete->ElectiveS->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_ElectiveS"].options = <?php echo JsonEncode($patient_an_registration_delete->ElectiveS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_ElectiveP"] = <?php echo $patient_an_registration_delete->ElectiveP->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_ElectiveP"].options = <?php echo JsonEncode($patient_an_registration_delete->ElectiveP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_EmergencyS"] = <?php echo $patient_an_registration_delete->EmergencyS->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_EmergencyS"].options = <?php echo JsonEncode($patient_an_registration_delete->EmergencyS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_EmergencyP"] = <?php echo $patient_an_registration_delete->EmergencyP->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_EmergencyP"].options = <?php echo JsonEncode($patient_an_registration_delete->EmergencyP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_Maturity"] = <?php echo $patient_an_registration_delete->Maturity->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_Maturity"].options = <?php echo JsonEncode($patient_an_registration_delete->Maturity->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_SpillOverReasons"] = <?php echo $patient_an_registration_delete->SpillOverReasons->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_SpillOverReasons"].options = <?php echo JsonEncode($patient_an_registration_delete->SpillOverReasons->options(FALSE, TRUE)) ?>;
fpatient_an_registrationdelete.lists["x_ANClosed[]"] = <?php echo $patient_an_registration_delete->ANClosed->Lookup->toClientList() ?>;
fpatient_an_registrationdelete.lists["x_ANClosed[]"].options = <?php echo JsonEncode($patient_an_registration_delete->ANClosed->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_an_registration_delete->showPageHeader(); ?>
<?php
$patient_an_registration_delete->showMessage();
?>
<form name="fpatient_an_registrationdelete" id="fpatient_an_registrationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_an_registration_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_an_registration_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_an_registration_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_an_registration->id->Visible) { // id ?>
		<th class="<?php echo $patient_an_registration->id->headerCellClass() ?>"><span id="elh_patient_an_registration_id" class="patient_an_registration_id"><?php echo $patient_an_registration->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
		<th class="<?php echo $patient_an_registration->pid->headerCellClass() ?>"><span id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><?php echo $patient_an_registration->pid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
		<th class="<?php echo $patient_an_registration->fid->headerCellClass() ?>"><span id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><?php echo $patient_an_registration->fid->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
		<th class="<?php echo $patient_an_registration->G->headerCellClass() ?>"><span id="elh_patient_an_registration_G" class="patient_an_registration_G"><?php echo $patient_an_registration->G->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
		<th class="<?php echo $patient_an_registration->P->headerCellClass() ?>"><span id="elh_patient_an_registration_P" class="patient_an_registration_P"><?php echo $patient_an_registration->P->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
		<th class="<?php echo $patient_an_registration->L->headerCellClass() ?>"><span id="elh_patient_an_registration_L" class="patient_an_registration_L"><?php echo $patient_an_registration->L->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
		<th class="<?php echo $patient_an_registration->A->headerCellClass() ?>"><span id="elh_patient_an_registration_A" class="patient_an_registration_A"><?php echo $patient_an_registration->A->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
		<th class="<?php echo $patient_an_registration->E->headerCellClass() ?>"><span id="elh_patient_an_registration_E" class="patient_an_registration_E"><?php echo $patient_an_registration->E->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
		<th class="<?php echo $patient_an_registration->M->headerCellClass() ?>"><span id="elh_patient_an_registration_M" class="patient_an_registration_M"><?php echo $patient_an_registration->M->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
		<th class="<?php echo $patient_an_registration->LMP->headerCellClass() ?>"><span id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><?php echo $patient_an_registration->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
		<th class="<?php echo $patient_an_registration->EDO->headerCellClass() ?>"><span id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><?php echo $patient_an_registration->EDO->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $patient_an_registration->MenstrualHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><?php echo $patient_an_registration->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
		<th class="<?php echo $patient_an_registration->MaritalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><?php echo $patient_an_registration->MaritalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<th class="<?php echo $patient_an_registration->ObstetricHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><?php echo $patient_an_registration->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofGDM->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<th class="<?php echo $patient_an_registration->PreviousHistorofPIH->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofIUGR->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<th class="<?php echo $patient_an_registration->PreviousHistoryofPreterm->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
		<th class="<?php echo $patient_an_registration->G1->headerCellClass() ?>"><span id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><?php echo $patient_an_registration->G1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
		<th class="<?php echo $patient_an_registration->G2->headerCellClass() ?>"><span id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><?php echo $patient_an_registration->G2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
		<th class="<?php echo $patient_an_registration->G3->headerCellClass() ?>"><span id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><?php echo $patient_an_registration->G3->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS1->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS2->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<th class="<?php echo $patient_an_registration->DeliveryNDLSCS3->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
		<th class="<?php echo $patient_an_registration->BabySexweight1->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><?php echo $patient_an_registration->BabySexweight1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
		<th class="<?php echo $patient_an_registration->BabySexweight2->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><?php echo $patient_an_registration->BabySexweight2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
		<th class="<?php echo $patient_an_registration->BabySexweight3->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><?php echo $patient_an_registration->BabySexweight3->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<th class="<?php echo $patient_an_registration->PastMedicalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<th class="<?php echo $patient_an_registration->PastSurgicalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
		<th class="<?php echo $patient_an_registration->FamilyHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><?php echo $patient_an_registration->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
		<th class="<?php echo $patient_an_registration->Viability->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><?php echo $patient_an_registration->Viability->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<th class="<?php echo $patient_an_registration->ViabilityDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><?php echo $patient_an_registration->ViabilityDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<th class="<?php echo $patient_an_registration->ViabilityREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT"><?php echo $patient_an_registration->ViabilityREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
		<th class="<?php echo $patient_an_registration->Viability2->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><?php echo $patient_an_registration->Viability2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
		<th class="<?php echo $patient_an_registration->Viability2DATE->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><?php echo $patient_an_registration->Viability2DATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<th class="<?php echo $patient_an_registration->Viability2REPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT"><?php echo $patient_an_registration->Viability2REPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
		<th class="<?php echo $patient_an_registration->NTscan->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><?php echo $patient_an_registration->NTscan->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
		<th class="<?php echo $patient_an_registration->NTscanDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><?php echo $patient_an_registration->NTscanDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<th class="<?php echo $patient_an_registration->NTscanREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT"><?php echo $patient_an_registration->NTscanREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
		<th class="<?php echo $patient_an_registration->EarlyTarget->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><?php echo $patient_an_registration->EarlyTarget->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<th class="<?php echo $patient_an_registration->EarlyTargetDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<th class="<?php echo $patient_an_registration->EarlyTargetREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT"><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
		<th class="<?php echo $patient_an_registration->Anomaly->headerCellClass() ?>"><span id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><?php echo $patient_an_registration->Anomaly->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<th class="<?php echo $patient_an_registration->AnomalyDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><?php echo $patient_an_registration->AnomalyDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<th class="<?php echo $patient_an_registration->AnomalyREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT"><?php echo $patient_an_registration->AnomalyREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
		<th class="<?php echo $patient_an_registration->Growth->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><?php echo $patient_an_registration->Growth->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
		<th class="<?php echo $patient_an_registration->GrowthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><?php echo $patient_an_registration->GrowthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<th class="<?php echo $patient_an_registration->GrowthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT"><?php echo $patient_an_registration->GrowthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
		<th class="<?php echo $patient_an_registration->Growth1->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><?php echo $patient_an_registration->Growth1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
		<th class="<?php echo $patient_an_registration->Growth1DATE->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><?php echo $patient_an_registration->Growth1DATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<th class="<?php echo $patient_an_registration->Growth1REPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT"><?php echo $patient_an_registration->Growth1REPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
		<th class="<?php echo $patient_an_registration->ANProfile->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><?php echo $patient_an_registration->ANProfile->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<th class="<?php echo $patient_an_registration->ANProfileDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><?php echo $patient_an_registration->ANProfileDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<th class="<?php echo $patient_an_registration->ANProfileINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<th class="<?php echo $patient_an_registration->ANProfileREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT"><?php echo $patient_an_registration->ANProfileREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
		<th class="<?php echo $patient_an_registration->DualMarker->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><?php echo $patient_an_registration->DualMarker->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<th class="<?php echo $patient_an_registration->DualMarkerDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><?php echo $patient_an_registration->DualMarkerDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<th class="<?php echo $patient_an_registration->DualMarkerINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<th class="<?php echo $patient_an_registration->DualMarkerREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT"><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
		<th class="<?php echo $patient_an_registration->Quadruple->headerCellClass() ?>"><span id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><?php echo $patient_an_registration->Quadruple->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<th class="<?php echo $patient_an_registration->QuadrupleDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><?php echo $patient_an_registration->QuadrupleDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<th class="<?php echo $patient_an_registration->QuadrupleINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<th class="<?php echo $patient_an_registration->QuadrupleREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT"><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
		<th class="<?php echo $patient_an_registration->A5month->headerCellClass() ?>"><span id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><?php echo $patient_an_registration->A5month->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
		<th class="<?php echo $patient_an_registration->A5monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><?php echo $patient_an_registration->A5monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<th class="<?php echo $patient_an_registration->A5monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<th class="<?php echo $patient_an_registration->A5monthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT"><?php echo $patient_an_registration->A5monthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
		<th class="<?php echo $patient_an_registration->A7month->headerCellClass() ?>"><span id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><?php echo $patient_an_registration->A7month->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
		<th class="<?php echo $patient_an_registration->A7monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><?php echo $patient_an_registration->A7monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<th class="<?php echo $patient_an_registration->A7monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<th class="<?php echo $patient_an_registration->A7monthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT"><?php echo $patient_an_registration->A7monthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
		<th class="<?php echo $patient_an_registration->A9month->headerCellClass() ?>"><span id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><?php echo $patient_an_registration->A9month->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
		<th class="<?php echo $patient_an_registration->A9monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><?php echo $patient_an_registration->A9monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<th class="<?php echo $patient_an_registration->A9monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<th class="<?php echo $patient_an_registration->A9monthREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT"><?php echo $patient_an_registration->A9monthREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
		<th class="<?php echo $patient_an_registration->INJ->headerCellClass() ?>"><span id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><?php echo $patient_an_registration->INJ->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
		<th class="<?php echo $patient_an_registration->INJDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><?php echo $patient_an_registration->INJDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<th class="<?php echo $patient_an_registration->INJINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><?php echo $patient_an_registration->INJINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
		<th class="<?php echo $patient_an_registration->INJREPORT->headerCellClass() ?>"><span id="elh_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT"><?php echo $patient_an_registration->INJREPORT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
		<th class="<?php echo $patient_an_registration->Bleeding->headerCellClass() ?>"><span id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><?php echo $patient_an_registration->Bleeding->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<th class="<?php echo $patient_an_registration->Hypothyroidism->headerCellClass() ?>"><span id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><?php echo $patient_an_registration->Hypothyroidism->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
		<th class="<?php echo $patient_an_registration->PICMENumber->headerCellClass() ?>"><span id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><?php echo $patient_an_registration->PICMENumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
		<th class="<?php echo $patient_an_registration->Outcome->headerCellClass() ?>"><span id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><?php echo $patient_an_registration->Outcome->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
		<th class="<?php echo $patient_an_registration->DateofAdmission->headerCellClass() ?>"><span id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><?php echo $patient_an_registration->DateofAdmission->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
		<th class="<?php echo $patient_an_registration->DateodProcedure->headerCellClass() ?>"><span id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><?php echo $patient_an_registration->DateodProcedure->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
		<th class="<?php echo $patient_an_registration->Miscarriage->headerCellClass() ?>"><span id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><?php echo $patient_an_registration->Miscarriage->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<th class="<?php echo $patient_an_registration->ModeOfDelivery->headerCellClass() ?>"><span id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
		<th class="<?php echo $patient_an_registration->ND->headerCellClass() ?>"><span id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><?php echo $patient_an_registration->ND->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
		<th class="<?php echo $patient_an_registration->NDS->headerCellClass() ?>"><span id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><?php echo $patient_an_registration->NDS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
		<th class="<?php echo $patient_an_registration->NDP->headerCellClass() ?>"><span id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><?php echo $patient_an_registration->NDP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
		<th class="<?php echo $patient_an_registration->Vaccum->headerCellClass() ?>"><span id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><?php echo $patient_an_registration->Vaccum->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
		<th class="<?php echo $patient_an_registration->VaccumS->headerCellClass() ?>"><span id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><?php echo $patient_an_registration->VaccumS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
		<th class="<?php echo $patient_an_registration->VaccumP->headerCellClass() ?>"><span id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><?php echo $patient_an_registration->VaccumP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
		<th class="<?php echo $patient_an_registration->Forceps->headerCellClass() ?>"><span id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><?php echo $patient_an_registration->Forceps->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
		<th class="<?php echo $patient_an_registration->ForcepsS->headerCellClass() ?>"><span id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><?php echo $patient_an_registration->ForcepsS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
		<th class="<?php echo $patient_an_registration->ForcepsP->headerCellClass() ?>"><span id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><?php echo $patient_an_registration->ForcepsP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
		<th class="<?php echo $patient_an_registration->Elective->headerCellClass() ?>"><span id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><?php echo $patient_an_registration->Elective->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
		<th class="<?php echo $patient_an_registration->ElectiveS->headerCellClass() ?>"><span id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><?php echo $patient_an_registration->ElectiveS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
		<th class="<?php echo $patient_an_registration->ElectiveP->headerCellClass() ?>"><span id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><?php echo $patient_an_registration->ElectiveP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
		<th class="<?php echo $patient_an_registration->Emergency->headerCellClass() ?>"><span id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><?php echo $patient_an_registration->Emergency->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
		<th class="<?php echo $patient_an_registration->EmergencyS->headerCellClass() ?>"><span id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><?php echo $patient_an_registration->EmergencyS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
		<th class="<?php echo $patient_an_registration->EmergencyP->headerCellClass() ?>"><span id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><?php echo $patient_an_registration->EmergencyP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
		<th class="<?php echo $patient_an_registration->Maturity->headerCellClass() ?>"><span id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><?php echo $patient_an_registration->Maturity->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
		<th class="<?php echo $patient_an_registration->Baby1->headerCellClass() ?>"><span id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><?php echo $patient_an_registration->Baby1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
		<th class="<?php echo $patient_an_registration->Baby2->headerCellClass() ?>"><span id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><?php echo $patient_an_registration->Baby2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
		<th class="<?php echo $patient_an_registration->sex1->headerCellClass() ?>"><span id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><?php echo $patient_an_registration->sex1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
		<th class="<?php echo $patient_an_registration->sex2->headerCellClass() ?>"><span id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><?php echo $patient_an_registration->sex2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
		<th class="<?php echo $patient_an_registration->weight1->headerCellClass() ?>"><span id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><?php echo $patient_an_registration->weight1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
		<th class="<?php echo $patient_an_registration->weight2->headerCellClass() ?>"><span id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><?php echo $patient_an_registration->weight2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
		<th class="<?php echo $patient_an_registration->NICU1->headerCellClass() ?>"><span id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><?php echo $patient_an_registration->NICU1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
		<th class="<?php echo $patient_an_registration->NICU2->headerCellClass() ?>"><span id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><?php echo $patient_an_registration->NICU2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
		<th class="<?php echo $patient_an_registration->Jaundice1->headerCellClass() ?>"><span id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><?php echo $patient_an_registration->Jaundice1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
		<th class="<?php echo $patient_an_registration->Jaundice2->headerCellClass() ?>"><span id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><?php echo $patient_an_registration->Jaundice2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
		<th class="<?php echo $patient_an_registration->Others1->headerCellClass() ?>"><span id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><?php echo $patient_an_registration->Others1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
		<th class="<?php echo $patient_an_registration->Others2->headerCellClass() ?>"><span id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><?php echo $patient_an_registration->Others2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<th class="<?php echo $patient_an_registration->SpillOverReasons->headerCellClass() ?>"><span id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><?php echo $patient_an_registration->SpillOverReasons->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
		<th class="<?php echo $patient_an_registration->ANClosed->headerCellClass() ?>"><span id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><?php echo $patient_an_registration->ANClosed->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<th class="<?php echo $patient_an_registration->ANClosedDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><?php echo $patient_an_registration->ANClosedDATE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<th class="<?php echo $patient_an_registration->PastMedicalHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<th class="<?php echo $patient_an_registration->PastSurgicalHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<th class="<?php echo $patient_an_registration->FamilyHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<th class="<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?></span></th>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
		<th class="<?php echo $patient_an_registration->ETdate->headerCellClass() ?>"><span id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><?php echo $patient_an_registration->ETdate->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_an_registration_delete->RecCnt = 0;
$i = 0;
while (!$patient_an_registration_delete->Recordset->EOF) {
	$patient_an_registration_delete->RecCnt++;
	$patient_an_registration_delete->RowCnt++;

	// Set row properties
	$patient_an_registration->resetAttributes();
	$patient_an_registration->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_an_registration_delete->loadRowValues($patient_an_registration_delete->Recordset);

	// Render row
	$patient_an_registration_delete->renderRow();
?>
	<tr<?php echo $patient_an_registration->rowAttributes() ?>>
<?php if ($patient_an_registration->id->Visible) { // id ?>
		<td<?php echo $patient_an_registration->id->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_id" class="patient_an_registration_id">
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<?php echo $patient_an_registration->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
		<td<?php echo $patient_an_registration->pid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_pid" class="patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<?php echo $patient_an_registration->pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
		<td<?php echo $patient_an_registration->fid->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_fid" class="patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<?php echo $patient_an_registration->fid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
		<td<?php echo $patient_an_registration->G->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_G" class="patient_an_registration_G">
<span<?php echo $patient_an_registration->G->viewAttributes() ?>>
<?php echo $patient_an_registration->G->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
		<td<?php echo $patient_an_registration->P->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_P" class="patient_an_registration_P">
<span<?php echo $patient_an_registration->P->viewAttributes() ?>>
<?php echo $patient_an_registration->P->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
		<td<?php echo $patient_an_registration->L->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_L" class="patient_an_registration_L">
<span<?php echo $patient_an_registration->L->viewAttributes() ?>>
<?php echo $patient_an_registration->L->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
		<td<?php echo $patient_an_registration->A->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A" class="patient_an_registration_A">
<span<?php echo $patient_an_registration->A->viewAttributes() ?>>
<?php echo $patient_an_registration->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
		<td<?php echo $patient_an_registration->E->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_E" class="patient_an_registration_E">
<span<?php echo $patient_an_registration->E->viewAttributes() ?>>
<?php echo $patient_an_registration->E->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
		<td<?php echo $patient_an_registration->M->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_M" class="patient_an_registration_M">
<span<?php echo $patient_an_registration->M->viewAttributes() ?>>
<?php echo $patient_an_registration->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
		<td<?php echo $patient_an_registration->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_LMP" class="patient_an_registration_LMP">
<span<?php echo $patient_an_registration->LMP->viewAttributes() ?>>
<?php echo $patient_an_registration->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
		<td<?php echo $patient_an_registration->EDO->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_EDO" class="patient_an_registration_EDO">
<span<?php echo $patient_an_registration->EDO->viewAttributes() ?>>
<?php echo $patient_an_registration->EDO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td<?php echo $patient_an_registration->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
		<td<?php echo $patient_an_registration->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MaritalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td<?php echo $patient_an_registration->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
		<td<?php echo $patient_an_registration->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration->PreviousHistoryofGDM->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
		<td<?php echo $patient_an_registration->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration->PreviousHistorofPIH->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
		<td<?php echo $patient_an_registration->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration->PreviousHistoryofIUGR->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
		<td<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
		<td<?php echo $patient_an_registration->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration->PreviousHistoryofPreterm->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
		<td<?php echo $patient_an_registration->G1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_G1" class="patient_an_registration_G1">
<span<?php echo $patient_an_registration->G1->viewAttributes() ?>>
<?php echo $patient_an_registration->G1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
		<td<?php echo $patient_an_registration->G2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_G2" class="patient_an_registration_G2">
<span<?php echo $patient_an_registration->G2->viewAttributes() ?>>
<?php echo $patient_an_registration->G2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
		<td<?php echo $patient_an_registration->G3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_G3" class="patient_an_registration_G3">
<span<?php echo $patient_an_registration->G3->viewAttributes() ?>>
<?php echo $patient_an_registration->G3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
		<td<?php echo $patient_an_registration->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration->DeliveryNDLSCS1->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
		<td<?php echo $patient_an_registration->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration->DeliveryNDLSCS2->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
		<td<?php echo $patient_an_registration->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration->DeliveryNDLSCS3->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
		<td<?php echo $patient_an_registration->BabySexweight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration->BabySexweight1->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
		<td<?php echo $patient_an_registration->BabySexweight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration->BabySexweight2->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
		<td<?php echo $patient_an_registration->BabySexweight3->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration->BabySexweight3->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
		<td<?php echo $patient_an_registration->PastMedicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration->PastMedicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
		<td<?php echo $patient_an_registration->PastSurgicalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration->PastSurgicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
		<td<?php echo $patient_an_registration->FamilyHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration->FamilyHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
		<td<?php echo $patient_an_registration->Viability->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Viability" class="patient_an_registration_Viability">
<span<?php echo $patient_an_registration->Viability->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
		<td<?php echo $patient_an_registration->ViabilityDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration->ViabilityDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
		<td<?php echo $patient_an_registration->ViabilityREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ViabilityREPORT" class="patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration->ViabilityREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
		<td<?php echo $patient_an_registration->Viability2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
<span<?php echo $patient_an_registration->Viability2->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
		<td<?php echo $patient_an_registration->Viability2DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration->Viability2DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
		<td<?php echo $patient_an_registration->Viability2REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Viability2REPORT" class="patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration->Viability2REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2REPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
		<td<?php echo $patient_an_registration->NTscan->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
<span<?php echo $patient_an_registration->NTscan->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
		<td<?php echo $patient_an_registration->NTscanDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration->NTscanDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
		<td<?php echo $patient_an_registration->NTscanREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_NTscanREPORT" class="patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration->NTscanREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
		<td<?php echo $patient_an_registration->EarlyTarget->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration->EarlyTarget->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTarget->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
		<td<?php echo $patient_an_registration->EarlyTargetDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration->EarlyTargetDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
		<td<?php echo $patient_an_registration->EarlyTargetREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_EarlyTargetREPORT" class="patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration->EarlyTargetREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
		<td<?php echo $patient_an_registration->Anomaly->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration->Anomaly->viewAttributes() ?>>
<?php echo $patient_an_registration->Anomaly->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
		<td<?php echo $patient_an_registration->AnomalyDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration->AnomalyDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
		<td<?php echo $patient_an_registration->AnomalyREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_AnomalyREPORT" class="patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration->AnomalyREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
		<td<?php echo $patient_an_registration->Growth->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Growth" class="patient_an_registration_Growth">
<span<?php echo $patient_an_registration->Growth->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
		<td<?php echo $patient_an_registration->GrowthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration->GrowthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
		<td<?php echo $patient_an_registration->GrowthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_GrowthREPORT" class="patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration->GrowthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
		<td<?php echo $patient_an_registration->Growth1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
<span<?php echo $patient_an_registration->Growth1->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
		<td<?php echo $patient_an_registration->Growth1DATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration->Growth1DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
		<td<?php echo $patient_an_registration->Growth1REPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Growth1REPORT" class="patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration->Growth1REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1REPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
		<td<?php echo $patient_an_registration->ANProfile->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration->ANProfile->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
		<td<?php echo $patient_an_registration->ANProfileDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration->ANProfileDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
		<td<?php echo $patient_an_registration->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration->ANProfileINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
		<td<?php echo $patient_an_registration->ANProfileREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ANProfileREPORT" class="patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration->ANProfileREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
		<td<?php echo $patient_an_registration->DualMarker->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration->DualMarker->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarker->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
		<td<?php echo $patient_an_registration->DualMarkerDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration->DualMarkerDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
		<td<?php echo $patient_an_registration->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration->DualMarkerINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
		<td<?php echo $patient_an_registration->DualMarkerREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DualMarkerREPORT" class="patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration->DualMarkerREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
		<td<?php echo $patient_an_registration->Quadruple->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration->Quadruple->viewAttributes() ?>>
<?php echo $patient_an_registration->Quadruple->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
		<td<?php echo $patient_an_registration->QuadrupleDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration->QuadrupleDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
		<td<?php echo $patient_an_registration->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration->QuadrupleINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
		<td<?php echo $patient_an_registration->QuadrupleREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_QuadrupleREPORT" class="patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration->QuadrupleREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
		<td<?php echo $patient_an_registration->A5month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A5month" class="patient_an_registration_A5month">
<span<?php echo $patient_an_registration->A5month->viewAttributes() ?>>
<?php echo $patient_an_registration->A5month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
		<td<?php echo $patient_an_registration->A5monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration->A5monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
		<td<?php echo $patient_an_registration->A5monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration->A5monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
		<td<?php echo $patient_an_registration->A5monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A5monthREPORT" class="patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration->A5monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
		<td<?php echo $patient_an_registration->A7month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A7month" class="patient_an_registration_A7month">
<span<?php echo $patient_an_registration->A7month->viewAttributes() ?>>
<?php echo $patient_an_registration->A7month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
		<td<?php echo $patient_an_registration->A7monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration->A7monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
		<td<?php echo $patient_an_registration->A7monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration->A7monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
		<td<?php echo $patient_an_registration->A7monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A7monthREPORT" class="patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration->A7monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
		<td<?php echo $patient_an_registration->A9month->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A9month" class="patient_an_registration_A9month">
<span<?php echo $patient_an_registration->A9month->viewAttributes() ?>>
<?php echo $patient_an_registration->A9month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
		<td<?php echo $patient_an_registration->A9monthDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration->A9monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
		<td<?php echo $patient_an_registration->A9monthINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration->A9monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
		<td<?php echo $patient_an_registration->A9monthREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_A9monthREPORT" class="patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration->A9monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
		<td<?php echo $patient_an_registration->INJ->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_INJ" class="patient_an_registration_INJ">
<span<?php echo $patient_an_registration->INJ->viewAttributes() ?>>
<?php echo $patient_an_registration->INJ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
		<td<?php echo $patient_an_registration->INJDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration->INJDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
		<td<?php echo $patient_an_registration->INJINHOUSE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration->INJINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
		<td<?php echo $patient_an_registration->INJREPORT->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_INJREPORT" class="patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration->INJREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->INJREPORT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
		<td<?php echo $patient_an_registration->Bleeding->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration->Bleeding->viewAttributes() ?>>
<?php echo $patient_an_registration->Bleeding->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
		<td<?php echo $patient_an_registration->Hypothyroidism->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration->Hypothyroidism->viewAttributes() ?>>
<?php echo $patient_an_registration->Hypothyroidism->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
		<td<?php echo $patient_an_registration->PICMENumber->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration->PICMENumber->viewAttributes() ?>>
<?php echo $patient_an_registration->PICMENumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
		<td<?php echo $patient_an_registration->Outcome->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
<span<?php echo $patient_an_registration->Outcome->viewAttributes() ?>>
<?php echo $patient_an_registration->Outcome->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
		<td<?php echo $patient_an_registration->DateofAdmission->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration->DateofAdmission->viewAttributes() ?>>
<?php echo $patient_an_registration->DateofAdmission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
		<td<?php echo $patient_an_registration->DateodProcedure->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration->DateodProcedure->viewAttributes() ?>>
<?php echo $patient_an_registration->DateodProcedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
		<td<?php echo $patient_an_registration->Miscarriage->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration->Miscarriage->viewAttributes() ?>>
<?php echo $patient_an_registration->Miscarriage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
		<td<?php echo $patient_an_registration->ModeOfDelivery->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration->ModeOfDelivery->viewAttributes() ?>>
<?php echo $patient_an_registration->ModeOfDelivery->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
		<td<?php echo $patient_an_registration->ND->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ND" class="patient_an_registration_ND">
<span<?php echo $patient_an_registration->ND->viewAttributes() ?>>
<?php echo $patient_an_registration->ND->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
		<td<?php echo $patient_an_registration->NDS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_NDS" class="patient_an_registration_NDS">
<span<?php echo $patient_an_registration->NDS->viewAttributes() ?>>
<?php echo $patient_an_registration->NDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
		<td<?php echo $patient_an_registration->NDP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_NDP" class="patient_an_registration_NDP">
<span<?php echo $patient_an_registration->NDP->viewAttributes() ?>>
<?php echo $patient_an_registration->NDP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
		<td<?php echo $patient_an_registration->Vaccum->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration->Vaccum->viewAttributes() ?>>
<?php echo $patient_an_registration->Vaccum->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
		<td<?php echo $patient_an_registration->VaccumS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration->VaccumS->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
		<td<?php echo $patient_an_registration->VaccumP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration->VaccumP->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
		<td<?php echo $patient_an_registration->Forceps->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
<span<?php echo $patient_an_registration->Forceps->viewAttributes() ?>>
<?php echo $patient_an_registration->Forceps->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
		<td<?php echo $patient_an_registration->ForcepsS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration->ForcepsS->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
		<td<?php echo $patient_an_registration->ForcepsP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration->ForcepsP->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
		<td<?php echo $patient_an_registration->Elective->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Elective" class="patient_an_registration_Elective">
<span<?php echo $patient_an_registration->Elective->viewAttributes() ?>>
<?php echo $patient_an_registration->Elective->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
		<td<?php echo $patient_an_registration->ElectiveS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration->ElectiveS->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
		<td<?php echo $patient_an_registration->ElectiveP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration->ElectiveP->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
		<td<?php echo $patient_an_registration->Emergency->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
<span<?php echo $patient_an_registration->Emergency->viewAttributes() ?>>
<?php echo $patient_an_registration->Emergency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
		<td<?php echo $patient_an_registration->EmergencyS->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration->EmergencyS->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
		<td<?php echo $patient_an_registration->EmergencyP->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration->EmergencyP->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
		<td<?php echo $patient_an_registration->Maturity->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
<span<?php echo $patient_an_registration->Maturity->viewAttributes() ?>>
<?php echo $patient_an_registration->Maturity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
		<td<?php echo $patient_an_registration->Baby1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
<span<?php echo $patient_an_registration->Baby1->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
		<td<?php echo $patient_an_registration->Baby2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
<span<?php echo $patient_an_registration->Baby2->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
		<td<?php echo $patient_an_registration->sex1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_sex1" class="patient_an_registration_sex1">
<span<?php echo $patient_an_registration->sex1->viewAttributes() ?>>
<?php echo $patient_an_registration->sex1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
		<td<?php echo $patient_an_registration->sex2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_sex2" class="patient_an_registration_sex2">
<span<?php echo $patient_an_registration->sex2->viewAttributes() ?>>
<?php echo $patient_an_registration->sex2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
		<td<?php echo $patient_an_registration->weight1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_weight1" class="patient_an_registration_weight1">
<span<?php echo $patient_an_registration->weight1->viewAttributes() ?>>
<?php echo $patient_an_registration->weight1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
		<td<?php echo $patient_an_registration->weight2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_weight2" class="patient_an_registration_weight2">
<span<?php echo $patient_an_registration->weight2->viewAttributes() ?>>
<?php echo $patient_an_registration->weight2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
		<td<?php echo $patient_an_registration->NICU1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
<span<?php echo $patient_an_registration->NICU1->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
		<td<?php echo $patient_an_registration->NICU2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
<span<?php echo $patient_an_registration->NICU2->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
		<td<?php echo $patient_an_registration->Jaundice1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration->Jaundice1->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
		<td<?php echo $patient_an_registration->Jaundice2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration->Jaundice2->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
		<td<?php echo $patient_an_registration->Others1->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Others1" class="patient_an_registration_Others1">
<span<?php echo $patient_an_registration->Others1->viewAttributes() ?>>
<?php echo $patient_an_registration->Others1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
		<td<?php echo $patient_an_registration->Others2->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_Others2" class="patient_an_registration_Others2">
<span<?php echo $patient_an_registration->Others2->viewAttributes() ?>>
<?php echo $patient_an_registration->Others2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
		<td<?php echo $patient_an_registration->SpillOverReasons->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration->SpillOverReasons->viewAttributes() ?>>
<?php echo $patient_an_registration->SpillOverReasons->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
		<td<?php echo $patient_an_registration->ANClosed->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration->ANClosed->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
		<td<?php echo $patient_an_registration->ANClosedDATE->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration->ANClosedDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosedDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
		<td<?php echo $patient_an_registration->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration->PastMedicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
		<td<?php echo $patient_an_registration->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
		<td<?php echo $patient_an_registration->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration->FamilyHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
		<td<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
		<td<?php echo $patient_an_registration->ETdate->cellAttributes() ?>>
<span id="el<?php echo $patient_an_registration_delete->RowCnt ?>_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
<span<?php echo $patient_an_registration->ETdate->viewAttributes() ?>>
<?php echo $patient_an_registration->ETdate->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_an_registration_delete->terminate();
?>