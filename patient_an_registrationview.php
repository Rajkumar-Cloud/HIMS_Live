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
$patient_an_registration_view = new patient_an_registration_view();

// Run the page
$patient_an_registration_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_an_registration_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_an_registrationview = currentForm = new ew.Form("fpatient_an_registrationview", "view");

// Form_CustomValidate event
fpatient_an_registrationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_an_registrationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_an_registrationview.lists["x_MenstrualHistory"] = <?php echo $patient_an_registration_view->MenstrualHistory->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_MenstrualHistory"].options = <?php echo JsonEncode($patient_an_registration_view->MenstrualHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofGDM"] = <?php echo $patient_an_registration_view->PreviousHistoryofGDM->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofGDM"].options = <?php echo JsonEncode($patient_an_registration_view->PreviousHistoryofGDM->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_PreviousHistorofPIH"] = <?php echo $patient_an_registration_view->PreviousHistorofPIH->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_PreviousHistorofPIH"].options = <?php echo JsonEncode($patient_an_registration_view->PreviousHistorofPIH->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofIUGR"] = <?php echo $patient_an_registration_view->PreviousHistoryofIUGR->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofIUGR"].options = <?php echo JsonEncode($patient_an_registration_view->PreviousHistoryofIUGR->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofOligohydramnios"] = <?php echo $patient_an_registration_view->PreviousHistoryofOligohydramnios->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofOligohydramnios"].options = <?php echo JsonEncode($patient_an_registration_view->PreviousHistoryofOligohydramnios->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofPreterm"] = <?php echo $patient_an_registration_view->PreviousHistoryofPreterm->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_PreviousHistoryofPreterm"].options = <?php echo JsonEncode($patient_an_registration_view->PreviousHistoryofPreterm->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_PastMedicalHistory[]"] = <?php echo $patient_an_registration_view->PastMedicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_PastMedicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_view->PastMedicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_PastSurgicalHistory[]"] = <?php echo $patient_an_registration_view->PastSurgicalHistory->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_PastSurgicalHistory[]"].options = <?php echo JsonEncode($patient_an_registration_view->PastSurgicalHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_FamilyHistory[]"] = <?php echo $patient_an_registration_view->FamilyHistory->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_FamilyHistory[]"].options = <?php echo JsonEncode($patient_an_registration_view->FamilyHistory->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_Bleeding[]"] = <?php echo $patient_an_registration_view->Bleeding->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_Bleeding[]"].options = <?php echo JsonEncode($patient_an_registration_view->Bleeding->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_Miscarriage"] = <?php echo $patient_an_registration_view->Miscarriage->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_Miscarriage"].options = <?php echo JsonEncode($patient_an_registration_view->Miscarriage->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_ModeOfDelivery"] = <?php echo $patient_an_registration_view->ModeOfDelivery->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_ModeOfDelivery"].options = <?php echo JsonEncode($patient_an_registration_view->ModeOfDelivery->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_NDS"] = <?php echo $patient_an_registration_view->NDS->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_NDS"].options = <?php echo JsonEncode($patient_an_registration_view->NDS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_NDP"] = <?php echo $patient_an_registration_view->NDP->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_NDP"].options = <?php echo JsonEncode($patient_an_registration_view->NDP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_VaccumS"] = <?php echo $patient_an_registration_view->VaccumS->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_VaccumS"].options = <?php echo JsonEncode($patient_an_registration_view->VaccumS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_VaccumP"] = <?php echo $patient_an_registration_view->VaccumP->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_VaccumP"].options = <?php echo JsonEncode($patient_an_registration_view->VaccumP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_ForcepsS"] = <?php echo $patient_an_registration_view->ForcepsS->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_ForcepsS"].options = <?php echo JsonEncode($patient_an_registration_view->ForcepsS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_ForcepsP"] = <?php echo $patient_an_registration_view->ForcepsP->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_ForcepsP"].options = <?php echo JsonEncode($patient_an_registration_view->ForcepsP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_ElectiveS"] = <?php echo $patient_an_registration_view->ElectiveS->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_ElectiveS"].options = <?php echo JsonEncode($patient_an_registration_view->ElectiveS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_ElectiveP"] = <?php echo $patient_an_registration_view->ElectiveP->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_ElectiveP"].options = <?php echo JsonEncode($patient_an_registration_view->ElectiveP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_EmergencyS"] = <?php echo $patient_an_registration_view->EmergencyS->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_EmergencyS"].options = <?php echo JsonEncode($patient_an_registration_view->EmergencyS->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_EmergencyP"] = <?php echo $patient_an_registration_view->EmergencyP->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_EmergencyP"].options = <?php echo JsonEncode($patient_an_registration_view->EmergencyP->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_Maturity"] = <?php echo $patient_an_registration_view->Maturity->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_Maturity"].options = <?php echo JsonEncode($patient_an_registration_view->Maturity->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_SpillOverReasons"] = <?php echo $patient_an_registration_view->SpillOverReasons->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_SpillOverReasons"].options = <?php echo JsonEncode($patient_an_registration_view->SpillOverReasons->options(FALSE, TRUE)) ?>;
fpatient_an_registrationview.lists["x_ANClosed[]"] = <?php echo $patient_an_registration_view->ANClosed->Lookup->toClientList() ?>;
fpatient_an_registrationview.lists["x_ANClosed[]"].options = <?php echo JsonEncode($patient_an_registration_view->ANClosed->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_an_registration->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_an_registration_view->ExportOptions->render("body") ?>
<?php $patient_an_registration_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_an_registration_view->showPageHeader(); ?>
<?php
$patient_an_registration_view->showMessage();
?>
<form name="fpatient_an_registrationview" id="fpatient_an_registrationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_an_registration_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_an_registration_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="modal" value="<?php echo (int)$patient_an_registration_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_an_registration->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_id"><script id="tpc_patient_an_registration_id" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_an_registration->id->cellAttributes() ?>>
<script id="tpx_patient_an_registration_id" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_id">
<span<?php echo $patient_an_registration->id->viewAttributes() ?>>
<?php echo $patient_an_registration->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->pid->Visible) { // pid ?>
	<tr id="r_pid">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_pid"><script id="tpc_patient_an_registration_pid" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->pid->caption() ?></span></script></span></td>
		<td data-name="pid"<?php echo $patient_an_registration->pid->cellAttributes() ?>>
<script id="tpx_patient_an_registration_pid" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_pid">
<span<?php echo $patient_an_registration->pid->viewAttributes() ?>>
<?php echo $patient_an_registration->pid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->fid->Visible) { // fid ?>
	<tr id="r_fid">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_fid"><script id="tpc_patient_an_registration_fid" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->fid->caption() ?></span></script></span></td>
		<td data-name="fid"<?php echo $patient_an_registration->fid->cellAttributes() ?>>
<script id="tpx_patient_an_registration_fid" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_fid">
<span<?php echo $patient_an_registration->fid->viewAttributes() ?>>
<?php echo $patient_an_registration->fid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->G->Visible) { // G ?>
	<tr id="r_G">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G"><script id="tpc_patient_an_registration_G" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->G->caption() ?></span></script></span></td>
		<td data-name="G"<?php echo $patient_an_registration->G->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_G">
<span<?php echo $patient_an_registration->G->viewAttributes() ?>>
<?php echo $patient_an_registration->G->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->P->Visible) { // P ?>
	<tr id="r_P">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_P"><script id="tpc_patient_an_registration_P" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->P->caption() ?></span></script></span></td>
		<td data-name="P"<?php echo $patient_an_registration->P->cellAttributes() ?>>
<script id="tpx_patient_an_registration_P" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_P">
<span<?php echo $patient_an_registration->P->viewAttributes() ?>>
<?php echo $patient_an_registration->P->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->L->Visible) { // L ?>
	<tr id="r_L">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_L"><script id="tpc_patient_an_registration_L" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->L->caption() ?></span></script></span></td>
		<td data-name="L"<?php echo $patient_an_registration->L->cellAttributes() ?>>
<script id="tpx_patient_an_registration_L" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_L">
<span<?php echo $patient_an_registration->L->viewAttributes() ?>>
<?php echo $patient_an_registration->L->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A->Visible) { // A ?>
	<tr id="r_A">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A"><script id="tpc_patient_an_registration_A" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A->caption() ?></span></script></span></td>
		<td data-name="A"<?php echo $patient_an_registration->A->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A">
<span<?php echo $patient_an_registration->A->viewAttributes() ?>>
<?php echo $patient_an_registration->A->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->E->Visible) { // E ?>
	<tr id="r_E">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_E"><script id="tpc_patient_an_registration_E" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->E->caption() ?></span></script></span></td>
		<td data-name="E"<?php echo $patient_an_registration->E->cellAttributes() ?>>
<script id="tpx_patient_an_registration_E" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_E">
<span<?php echo $patient_an_registration->E->viewAttributes() ?>>
<?php echo $patient_an_registration->E->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->M->Visible) { // M ?>
	<tr id="r_M">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_M"><script id="tpc_patient_an_registration_M" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->M->caption() ?></span></script></span></td>
		<td data-name="M"<?php echo $patient_an_registration->M->cellAttributes() ?>>
<script id="tpx_patient_an_registration_M" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_M">
<span<?php echo $patient_an_registration->M->viewAttributes() ?>>
<?php echo $patient_an_registration->M->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_LMP"><script id="tpc_patient_an_registration_LMP" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->LMP->caption() ?></span></script></span></td>
		<td data-name="LMP"<?php echo $patient_an_registration->LMP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_LMP" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_LMP">
<span<?php echo $patient_an_registration->LMP->viewAttributes() ?>>
<?php echo $patient_an_registration->LMP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->EDO->Visible) { // EDO ?>
	<tr id="r_EDO">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EDO"><script id="tpc_patient_an_registration_EDO" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->EDO->caption() ?></span></script></span></td>
		<td data-name="EDO"<?php echo $patient_an_registration->EDO->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EDO" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_EDO">
<span<?php echo $patient_an_registration->EDO->viewAttributes() ?>>
<?php echo $patient_an_registration->EDO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MenstrualHistory"><script id="tpc_patient_an_registration_MenstrualHistory" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->MenstrualHistory->caption() ?></span></script></span></td>
		<td data-name="MenstrualHistory"<?php echo $patient_an_registration->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MenstrualHistory" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_MenstrualHistory">
<span<?php echo $patient_an_registration->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MenstrualHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->MaritalHistory->Visible) { // MaritalHistory ?>
	<tr id="r_MaritalHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MaritalHistory"><script id="tpc_patient_an_registration_MaritalHistory" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->MaritalHistory->caption() ?></span></script></span></td>
		<td data-name="MaritalHistory"<?php echo $patient_an_registration->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_MaritalHistory" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_MaritalHistory">
<span<?php echo $patient_an_registration->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->MaritalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<tr id="r_ObstetricHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ObstetricHistory"><script id="tpc_patient_an_registration_ObstetricHistory" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ObstetricHistory->caption() ?></span></script></span></td>
		<td data-name="ObstetricHistory"<?php echo $patient_an_registration->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ObstetricHistory" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ObstetricHistory">
<span<?php echo $patient_an_registration->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->ObstetricHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
	<tr id="r_PreviousHistoryofGDM">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofGDM"><script id="tpc_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofGDM->caption() ?></span></script></span></td>
		<td data-name="PreviousHistoryofGDM"<?php echo $patient_an_registration->PreviousHistoryofGDM->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofGDM">
<span<?php echo $patient_an_registration->PreviousHistoryofGDM->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
	<tr id="r_PreviousHistorofPIH">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistorofPIH"><script id="tpc_patient_an_registration_PreviousHistorofPIH" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PreviousHistorofPIH->caption() ?></span></script></span></td>
		<td data-name="PreviousHistorofPIH"<?php echo $patient_an_registration->PreviousHistorofPIH->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistorofPIH" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PreviousHistorofPIH">
<span<?php echo $patient_an_registration->PreviousHistorofPIH->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
	<tr id="r_PreviousHistoryofIUGR">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofIUGR"><script id="tpc_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofIUGR->caption() ?></span></script></span></td>
		<td data-name="PreviousHistoryofIUGR"<?php echo $patient_an_registration->PreviousHistoryofIUGR->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofIUGR">
<span<?php echo $patient_an_registration->PreviousHistoryofIUGR->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
	<tr id="r_PreviousHistoryofOligohydramnios">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofOligohydramnios"><script id="tpc_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->caption() ?></span></script></span></td>
		<td data-name="PreviousHistoryofOligohydramnios"<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
	<tr id="r_PreviousHistoryofPreterm">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofPreterm"><script id="tpc_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PreviousHistoryofPreterm->caption() ?></span></script></span></td>
		<td data-name="PreviousHistoryofPreterm"<?php echo $patient_an_registration->PreviousHistoryofPreterm->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PreviousHistoryofPreterm">
<span<?php echo $patient_an_registration->PreviousHistoryofPreterm->viewAttributes() ?>>
<?php echo $patient_an_registration->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->G1->Visible) { // G1 ?>
	<tr id="r_G1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G1"><script id="tpc_patient_an_registration_G1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->G1->caption() ?></span></script></span></td>
		<td data-name="G1"<?php echo $patient_an_registration->G1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_G1">
<span<?php echo $patient_an_registration->G1->viewAttributes() ?>>
<?php echo $patient_an_registration->G1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->G2->Visible) { // G2 ?>
	<tr id="r_G2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G2"><script id="tpc_patient_an_registration_G2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->G2->caption() ?></span></script></span></td>
		<td data-name="G2"<?php echo $patient_an_registration->G2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_G2">
<span<?php echo $patient_an_registration->G2->viewAttributes() ?>>
<?php echo $patient_an_registration->G2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->G3->Visible) { // G3 ?>
	<tr id="r_G3">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G3"><script id="tpc_patient_an_registration_G3" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->G3->caption() ?></span></script></span></td>
		<td data-name="G3"<?php echo $patient_an_registration->G3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_G3" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_G3">
<span<?php echo $patient_an_registration->G3->viewAttributes() ?>>
<?php echo $patient_an_registration->G3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
	<tr id="r_DeliveryNDLSCS1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS1"><script id="tpc_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DeliveryNDLSCS1->caption() ?></span></script></span></td>
		<td data-name="DeliveryNDLSCS1"<?php echo $patient_an_registration->DeliveryNDLSCS1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DeliveryNDLSCS1">
<span<?php echo $patient_an_registration->DeliveryNDLSCS1->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
	<tr id="r_DeliveryNDLSCS2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS2"><script id="tpc_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DeliveryNDLSCS2->caption() ?></span></script></span></td>
		<td data-name="DeliveryNDLSCS2"<?php echo $patient_an_registration->DeliveryNDLSCS2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DeliveryNDLSCS2">
<span<?php echo $patient_an_registration->DeliveryNDLSCS2->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
	<tr id="r_DeliveryNDLSCS3">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS3"><script id="tpc_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DeliveryNDLSCS3->caption() ?></span></script></span></td>
		<td data-name="DeliveryNDLSCS3"<?php echo $patient_an_registration->DeliveryNDLSCS3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DeliveryNDLSCS3">
<span<?php echo $patient_an_registration->DeliveryNDLSCS3->viewAttributes() ?>>
<?php echo $patient_an_registration->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight1->Visible) { // BabySexweight1 ?>
	<tr id="r_BabySexweight1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight1"><script id="tpc_patient_an_registration_BabySexweight1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->BabySexweight1->caption() ?></span></script></span></td>
		<td data-name="BabySexweight1"<?php echo $patient_an_registration->BabySexweight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_BabySexweight1">
<span<?php echo $patient_an_registration->BabySexweight1->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight2->Visible) { // BabySexweight2 ?>
	<tr id="r_BabySexweight2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight2"><script id="tpc_patient_an_registration_BabySexweight2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->BabySexweight2->caption() ?></span></script></span></td>
		<td data-name="BabySexweight2"<?php echo $patient_an_registration->BabySexweight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_BabySexweight2">
<span<?php echo $patient_an_registration->BabySexweight2->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->BabySexweight3->Visible) { // BabySexweight3 ?>
	<tr id="r_BabySexweight3">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight3"><script id="tpc_patient_an_registration_BabySexweight3" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->BabySexweight3->caption() ?></span></script></span></td>
		<td data-name="BabySexweight3"<?php echo $patient_an_registration->BabySexweight3->cellAttributes() ?>>
<script id="tpx_patient_an_registration_BabySexweight3" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_BabySexweight3">
<span<?php echo $patient_an_registration->BabySexweight3->viewAttributes() ?>>
<?php echo $patient_an_registration->BabySexweight3->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
	<tr id="r_PastMedicalHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistory"><script id="tpc_patient_an_registration_PastMedicalHistory" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PastMedicalHistory->caption() ?></span></script></span></td>
		<td data-name="PastMedicalHistory"<?php echo $patient_an_registration->PastMedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistory" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PastMedicalHistory">
<span<?php echo $patient_an_registration->PastMedicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
	<tr id="r_PastSurgicalHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistory"><script id="tpc_patient_an_registration_PastSurgicalHistory" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PastSurgicalHistory->caption() ?></span></script></span></td>
		<td data-name="PastSurgicalHistory"<?php echo $patient_an_registration->PastSurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistory" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PastSurgicalHistory">
<span<?php echo $patient_an_registration->PastSurgicalHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistory"><script id="tpc_patient_an_registration_FamilyHistory" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->FamilyHistory->caption() ?></span></script></span></td>
		<td data-name="FamilyHistory"<?php echo $patient_an_registration->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistory" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_FamilyHistory">
<span<?php echo $patient_an_registration->FamilyHistory->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Viability->Visible) { // Viability ?>
	<tr id="r_Viability">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability"><script id="tpc_patient_an_registration_Viability" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Viability->caption() ?></span></script></span></td>
		<td data-name="Viability"<?php echo $patient_an_registration->Viability->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Viability">
<span<?php echo $patient_an_registration->Viability->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ViabilityDATE->Visible) { // ViabilityDATE ?>
	<tr id="r_ViabilityDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityDATE"><script id="tpc_patient_an_registration_ViabilityDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ViabilityDATE->caption() ?></span></script></span></td>
		<td data-name="ViabilityDATE"<?php echo $patient_an_registration->ViabilityDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ViabilityDATE">
<span<?php echo $patient_an_registration->ViabilityDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
	<tr id="r_ViabilityREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityREPORT"><script id="tpc_patient_an_registration_ViabilityREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ViabilityREPORT->caption() ?></span></script></span></td>
		<td data-name="ViabilityREPORT"<?php echo $patient_an_registration->ViabilityREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ViabilityREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ViabilityREPORT">
<span<?php echo $patient_an_registration->ViabilityREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ViabilityREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Viability2->Visible) { // Viability2 ?>
	<tr id="r_Viability2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2"><script id="tpc_patient_an_registration_Viability2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Viability2->caption() ?></span></script></span></td>
		<td data-name="Viability2"<?php echo $patient_an_registration->Viability2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Viability2">
<span<?php echo $patient_an_registration->Viability2->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Viability2DATE->Visible) { // Viability2DATE ?>
	<tr id="r_Viability2DATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2DATE"><script id="tpc_patient_an_registration_Viability2DATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Viability2DATE->caption() ?></span></script></span></td>
		<td data-name="Viability2DATE"<?php echo $patient_an_registration->Viability2DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2DATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Viability2DATE">
<span<?php echo $patient_an_registration->Viability2DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2DATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Viability2REPORT->Visible) { // Viability2REPORT ?>
	<tr id="r_Viability2REPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2REPORT"><script id="tpc_patient_an_registration_Viability2REPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Viability2REPORT->caption() ?></span></script></span></td>
		<td data-name="Viability2REPORT"<?php echo $patient_an_registration->Viability2REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Viability2REPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Viability2REPORT">
<span<?php echo $patient_an_registration->Viability2REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Viability2REPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->NTscan->Visible) { // NTscan ?>
	<tr id="r_NTscan">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscan"><script id="tpc_patient_an_registration_NTscan" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->NTscan->caption() ?></span></script></span></td>
		<td data-name="NTscan"<?php echo $patient_an_registration->NTscan->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscan" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_NTscan">
<span<?php echo $patient_an_registration->NTscan->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscan->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->NTscanDATE->Visible) { // NTscanDATE ?>
	<tr id="r_NTscanDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanDATE"><script id="tpc_patient_an_registration_NTscanDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->NTscanDATE->caption() ?></span></script></span></td>
		<td data-name="NTscanDATE"<?php echo $patient_an_registration->NTscanDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_NTscanDATE">
<span<?php echo $patient_an_registration->NTscanDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->NTscanREPORT->Visible) { // NTscanREPORT ?>
	<tr id="r_NTscanREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanREPORT"><script id="tpc_patient_an_registration_NTscanREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->NTscanREPORT->caption() ?></span></script></span></td>
		<td data-name="NTscanREPORT"<?php echo $patient_an_registration->NTscanREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NTscanREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_NTscanREPORT">
<span<?php echo $patient_an_registration->NTscanREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->NTscanREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->EarlyTarget->Visible) { // EarlyTarget ?>
	<tr id="r_EarlyTarget">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTarget"><script id="tpc_patient_an_registration_EarlyTarget" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->EarlyTarget->caption() ?></span></script></span></td>
		<td data-name="EarlyTarget"<?php echo $patient_an_registration->EarlyTarget->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTarget" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_EarlyTarget">
<span<?php echo $patient_an_registration->EarlyTarget->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTarget->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
	<tr id="r_EarlyTargetDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetDATE"><script id="tpc_patient_an_registration_EarlyTargetDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->EarlyTargetDATE->caption() ?></span></script></span></td>
		<td data-name="EarlyTargetDATE"<?php echo $patient_an_registration->EarlyTargetDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_EarlyTargetDATE">
<span<?php echo $patient_an_registration->EarlyTargetDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
	<tr id="r_EarlyTargetREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetREPORT"><script id="tpc_patient_an_registration_EarlyTargetREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->EarlyTargetREPORT->caption() ?></span></script></span></td>
		<td data-name="EarlyTargetREPORT"<?php echo $patient_an_registration->EarlyTargetREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EarlyTargetREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_EarlyTargetREPORT">
<span<?php echo $patient_an_registration->EarlyTargetREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->EarlyTargetREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Anomaly->Visible) { // Anomaly ?>
	<tr id="r_Anomaly">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Anomaly"><script id="tpc_patient_an_registration_Anomaly" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Anomaly->caption() ?></span></script></span></td>
		<td data-name="Anomaly"<?php echo $patient_an_registration->Anomaly->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Anomaly" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Anomaly">
<span<?php echo $patient_an_registration->Anomaly->viewAttributes() ?>>
<?php echo $patient_an_registration->Anomaly->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->AnomalyDATE->Visible) { // AnomalyDATE ?>
	<tr id="r_AnomalyDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyDATE"><script id="tpc_patient_an_registration_AnomalyDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->AnomalyDATE->caption() ?></span></script></span></td>
		<td data-name="AnomalyDATE"<?php echo $patient_an_registration->AnomalyDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_AnomalyDATE">
<span<?php echo $patient_an_registration->AnomalyDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
	<tr id="r_AnomalyREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyREPORT"><script id="tpc_patient_an_registration_AnomalyREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->AnomalyREPORT->caption() ?></span></script></span></td>
		<td data-name="AnomalyREPORT"<?php echo $patient_an_registration->AnomalyREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_AnomalyREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_AnomalyREPORT">
<span<?php echo $patient_an_registration->AnomalyREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->AnomalyREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Growth->Visible) { // Growth ?>
	<tr id="r_Growth">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth"><script id="tpc_patient_an_registration_Growth" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Growth->caption() ?></span></script></span></td>
		<td data-name="Growth"<?php echo $patient_an_registration->Growth->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Growth">
<span<?php echo $patient_an_registration->Growth->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->GrowthDATE->Visible) { // GrowthDATE ?>
	<tr id="r_GrowthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthDATE"><script id="tpc_patient_an_registration_GrowthDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->GrowthDATE->caption() ?></span></script></span></td>
		<td data-name="GrowthDATE"<?php echo $patient_an_registration->GrowthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_GrowthDATE">
<span<?php echo $patient_an_registration->GrowthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->GrowthREPORT->Visible) { // GrowthREPORT ?>
	<tr id="r_GrowthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthREPORT"><script id="tpc_patient_an_registration_GrowthREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->GrowthREPORT->caption() ?></span></script></span></td>
		<td data-name="GrowthREPORT"<?php echo $patient_an_registration->GrowthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_GrowthREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_GrowthREPORT">
<span<?php echo $patient_an_registration->GrowthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->GrowthREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Growth1->Visible) { // Growth1 ?>
	<tr id="r_Growth1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1"><script id="tpc_patient_an_registration_Growth1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Growth1->caption() ?></span></script></span></td>
		<td data-name="Growth1"<?php echo $patient_an_registration->Growth1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Growth1">
<span<?php echo $patient_an_registration->Growth1->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Growth1DATE->Visible) { // Growth1DATE ?>
	<tr id="r_Growth1DATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1DATE"><script id="tpc_patient_an_registration_Growth1DATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Growth1DATE->caption() ?></span></script></span></td>
		<td data-name="Growth1DATE"<?php echo $patient_an_registration->Growth1DATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1DATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Growth1DATE">
<span<?php echo $patient_an_registration->Growth1DATE->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1DATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Growth1REPORT->Visible) { // Growth1REPORT ?>
	<tr id="r_Growth1REPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1REPORT"><script id="tpc_patient_an_registration_Growth1REPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Growth1REPORT->caption() ?></span></script></span></td>
		<td data-name="Growth1REPORT"<?php echo $patient_an_registration->Growth1REPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Growth1REPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Growth1REPORT">
<span<?php echo $patient_an_registration->Growth1REPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->Growth1REPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ANProfile->Visible) { // ANProfile ?>
	<tr id="r_ANProfile">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfile"><script id="tpc_patient_an_registration_ANProfile" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ANProfile->caption() ?></span></script></span></td>
		<td data-name="ANProfile"<?php echo $patient_an_registration->ANProfile->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfile" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ANProfile">
<span<?php echo $patient_an_registration->ANProfile->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ANProfileDATE->Visible) { // ANProfileDATE ?>
	<tr id="r_ANProfileDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileDATE"><script id="tpc_patient_an_registration_ANProfileDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ANProfileDATE->caption() ?></span></script></span></td>
		<td data-name="ANProfileDATE"<?php echo $patient_an_registration->ANProfileDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ANProfileDATE">
<span<?php echo $patient_an_registration->ANProfileDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
	<tr id="r_ANProfileINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileINHOUSE"><script id="tpc_patient_an_registration_ANProfileINHOUSE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ANProfileINHOUSE->caption() ?></span></script></span></td>
		<td data-name="ANProfileINHOUSE"<?php echo $patient_an_registration->ANProfileINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileINHOUSE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ANProfileINHOUSE">
<span<?php echo $patient_an_registration->ANProfileINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
	<tr id="r_ANProfileREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileREPORT"><script id="tpc_patient_an_registration_ANProfileREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ANProfileREPORT->caption() ?></span></script></span></td>
		<td data-name="ANProfileREPORT"<?php echo $patient_an_registration->ANProfileREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANProfileREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ANProfileREPORT">
<span<?php echo $patient_an_registration->ANProfileREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->ANProfileREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DualMarker->Visible) { // DualMarker ?>
	<tr id="r_DualMarker">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarker"><script id="tpc_patient_an_registration_DualMarker" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DualMarker->caption() ?></span></script></span></td>
		<td data-name="DualMarker"<?php echo $patient_an_registration->DualMarker->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarker" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DualMarker">
<span<?php echo $patient_an_registration->DualMarker->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarker->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
	<tr id="r_DualMarkerDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerDATE"><script id="tpc_patient_an_registration_DualMarkerDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DualMarkerDATE->caption() ?></span></script></span></td>
		<td data-name="DualMarkerDATE"<?php echo $patient_an_registration->DualMarkerDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DualMarkerDATE">
<span<?php echo $patient_an_registration->DualMarkerDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
	<tr id="r_DualMarkerINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerINHOUSE"><script id="tpc_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DualMarkerINHOUSE->caption() ?></span></script></span></td>
		<td data-name="DualMarkerINHOUSE"<?php echo $patient_an_registration->DualMarkerINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DualMarkerINHOUSE">
<span<?php echo $patient_an_registration->DualMarkerINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
	<tr id="r_DualMarkerREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerREPORT"><script id="tpc_patient_an_registration_DualMarkerREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DualMarkerREPORT->caption() ?></span></script></span></td>
		<td data-name="DualMarkerREPORT"<?php echo $patient_an_registration->DualMarkerREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DualMarkerREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DualMarkerREPORT">
<span<?php echo $patient_an_registration->DualMarkerREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->DualMarkerREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Quadruple->Visible) { // Quadruple ?>
	<tr id="r_Quadruple">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Quadruple"><script id="tpc_patient_an_registration_Quadruple" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Quadruple->caption() ?></span></script></span></td>
		<td data-name="Quadruple"<?php echo $patient_an_registration->Quadruple->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Quadruple" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Quadruple">
<span<?php echo $patient_an_registration->Quadruple->viewAttributes() ?>>
<?php echo $patient_an_registration->Quadruple->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
	<tr id="r_QuadrupleDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleDATE"><script id="tpc_patient_an_registration_QuadrupleDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->QuadrupleDATE->caption() ?></span></script></span></td>
		<td data-name="QuadrupleDATE"<?php echo $patient_an_registration->QuadrupleDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_QuadrupleDATE">
<span<?php echo $patient_an_registration->QuadrupleDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
	<tr id="r_QuadrupleINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleINHOUSE"><script id="tpc_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->QuadrupleINHOUSE->caption() ?></span></script></span></td>
		<td data-name="QuadrupleINHOUSE"<?php echo $patient_an_registration->QuadrupleINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_QuadrupleINHOUSE">
<span<?php echo $patient_an_registration->QuadrupleINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
	<tr id="r_QuadrupleREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleREPORT"><script id="tpc_patient_an_registration_QuadrupleREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->QuadrupleREPORT->caption() ?></span></script></span></td>
		<td data-name="QuadrupleREPORT"<?php echo $patient_an_registration->QuadrupleREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_QuadrupleREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_QuadrupleREPORT">
<span<?php echo $patient_an_registration->QuadrupleREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->QuadrupleREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A5month->Visible) { // A5month ?>
	<tr id="r_A5month">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5month"><script id="tpc_patient_an_registration_A5month" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A5month->caption() ?></span></script></span></td>
		<td data-name="A5month"<?php echo $patient_an_registration->A5month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5month" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A5month">
<span<?php echo $patient_an_registration->A5month->viewAttributes() ?>>
<?php echo $patient_an_registration->A5month->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A5monthDATE->Visible) { // A5monthDATE ?>
	<tr id="r_A5monthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthDATE"><script id="tpc_patient_an_registration_A5monthDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A5monthDATE->caption() ?></span></script></span></td>
		<td data-name="A5monthDATE"<?php echo $patient_an_registration->A5monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A5monthDATE">
<span<?php echo $patient_an_registration->A5monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
	<tr id="r_A5monthINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthINHOUSE"><script id="tpc_patient_an_registration_A5monthINHOUSE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A5monthINHOUSE->caption() ?></span></script></span></td>
		<td data-name="A5monthINHOUSE"<?php echo $patient_an_registration->A5monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthINHOUSE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A5monthINHOUSE">
<span<?php echo $patient_an_registration->A5monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthINHOUSE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A5monthREPORT->Visible) { // A5monthREPORT ?>
	<tr id="r_A5monthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthREPORT"><script id="tpc_patient_an_registration_A5monthREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A5monthREPORT->caption() ?></span></script></span></td>
		<td data-name="A5monthREPORT"<?php echo $patient_an_registration->A5monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A5monthREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A5monthREPORT">
<span<?php echo $patient_an_registration->A5monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A5monthREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A7month->Visible) { // A7month ?>
	<tr id="r_A7month">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7month"><script id="tpc_patient_an_registration_A7month" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A7month->caption() ?></span></script></span></td>
		<td data-name="A7month"<?php echo $patient_an_registration->A7month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7month" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A7month">
<span<?php echo $patient_an_registration->A7month->viewAttributes() ?>>
<?php echo $patient_an_registration->A7month->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A7monthDATE->Visible) { // A7monthDATE ?>
	<tr id="r_A7monthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthDATE"><script id="tpc_patient_an_registration_A7monthDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A7monthDATE->caption() ?></span></script></span></td>
		<td data-name="A7monthDATE"<?php echo $patient_an_registration->A7monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A7monthDATE">
<span<?php echo $patient_an_registration->A7monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
	<tr id="r_A7monthINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthINHOUSE"><script id="tpc_patient_an_registration_A7monthINHOUSE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A7monthINHOUSE->caption() ?></span></script></span></td>
		<td data-name="A7monthINHOUSE"<?php echo $patient_an_registration->A7monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthINHOUSE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A7monthINHOUSE">
<span<?php echo $patient_an_registration->A7monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthINHOUSE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A7monthREPORT->Visible) { // A7monthREPORT ?>
	<tr id="r_A7monthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthREPORT"><script id="tpc_patient_an_registration_A7monthREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A7monthREPORT->caption() ?></span></script></span></td>
		<td data-name="A7monthREPORT"<?php echo $patient_an_registration->A7monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A7monthREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A7monthREPORT">
<span<?php echo $patient_an_registration->A7monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A7monthREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A9month->Visible) { // A9month ?>
	<tr id="r_A9month">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9month"><script id="tpc_patient_an_registration_A9month" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A9month->caption() ?></span></script></span></td>
		<td data-name="A9month"<?php echo $patient_an_registration->A9month->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9month" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A9month">
<span<?php echo $patient_an_registration->A9month->viewAttributes() ?>>
<?php echo $patient_an_registration->A9month->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A9monthDATE->Visible) { // A9monthDATE ?>
	<tr id="r_A9monthDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthDATE"><script id="tpc_patient_an_registration_A9monthDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A9monthDATE->caption() ?></span></script></span></td>
		<td data-name="A9monthDATE"<?php echo $patient_an_registration->A9monthDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A9monthDATE">
<span<?php echo $patient_an_registration->A9monthDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
	<tr id="r_A9monthINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthINHOUSE"><script id="tpc_patient_an_registration_A9monthINHOUSE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A9monthINHOUSE->caption() ?></span></script></span></td>
		<td data-name="A9monthINHOUSE"<?php echo $patient_an_registration->A9monthINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthINHOUSE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A9monthINHOUSE">
<span<?php echo $patient_an_registration->A9monthINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthINHOUSE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->A9monthREPORT->Visible) { // A9monthREPORT ?>
	<tr id="r_A9monthREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthREPORT"><script id="tpc_patient_an_registration_A9monthREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->A9monthREPORT->caption() ?></span></script></span></td>
		<td data-name="A9monthREPORT"<?php echo $patient_an_registration->A9monthREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_A9monthREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_A9monthREPORT">
<span<?php echo $patient_an_registration->A9monthREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->A9monthREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->INJ->Visible) { // INJ ?>
	<tr id="r_INJ">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJ"><script id="tpc_patient_an_registration_INJ" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->INJ->caption() ?></span></script></span></td>
		<td data-name="INJ"<?php echo $patient_an_registration->INJ->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJ" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_INJ">
<span<?php echo $patient_an_registration->INJ->viewAttributes() ?>>
<?php echo $patient_an_registration->INJ->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->INJDATE->Visible) { // INJDATE ?>
	<tr id="r_INJDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJDATE"><script id="tpc_patient_an_registration_INJDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->INJDATE->caption() ?></span></script></span></td>
		<td data-name="INJDATE"<?php echo $patient_an_registration->INJDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_INJDATE">
<span<?php echo $patient_an_registration->INJDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->INJINHOUSE->Visible) { // INJINHOUSE ?>
	<tr id="r_INJINHOUSE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJINHOUSE"><script id="tpc_patient_an_registration_INJINHOUSE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->INJINHOUSE->caption() ?></span></script></span></td>
		<td data-name="INJINHOUSE"<?php echo $patient_an_registration->INJINHOUSE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJINHOUSE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_INJINHOUSE">
<span<?php echo $patient_an_registration->INJINHOUSE->viewAttributes() ?>>
<?php echo $patient_an_registration->INJINHOUSE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->INJREPORT->Visible) { // INJREPORT ?>
	<tr id="r_INJREPORT">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJREPORT"><script id="tpc_patient_an_registration_INJREPORT" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->INJREPORT->caption() ?></span></script></span></td>
		<td data-name="INJREPORT"<?php echo $patient_an_registration->INJREPORT->cellAttributes() ?>>
<script id="tpx_patient_an_registration_INJREPORT" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_INJREPORT">
<span<?php echo $patient_an_registration->INJREPORT->viewAttributes() ?>>
<?php echo $patient_an_registration->INJREPORT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Bleeding->Visible) { // Bleeding ?>
	<tr id="r_Bleeding">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Bleeding"><script id="tpc_patient_an_registration_Bleeding" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Bleeding->caption() ?></span></script></span></td>
		<td data-name="Bleeding"<?php echo $patient_an_registration->Bleeding->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Bleeding" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Bleeding">
<span<?php echo $patient_an_registration->Bleeding->viewAttributes() ?>>
<?php echo $patient_an_registration->Bleeding->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Hypothyroidism->Visible) { // Hypothyroidism ?>
	<tr id="r_Hypothyroidism">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Hypothyroidism"><script id="tpc_patient_an_registration_Hypothyroidism" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Hypothyroidism->caption() ?></span></script></span></td>
		<td data-name="Hypothyroidism"<?php echo $patient_an_registration->Hypothyroidism->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Hypothyroidism" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Hypothyroidism">
<span<?php echo $patient_an_registration->Hypothyroidism->viewAttributes() ?>>
<?php echo $patient_an_registration->Hypothyroidism->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PICMENumber->Visible) { // PICMENumber ?>
	<tr id="r_PICMENumber">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PICMENumber"><script id="tpc_patient_an_registration_PICMENumber" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PICMENumber->caption() ?></span></script></span></td>
		<td data-name="PICMENumber"<?php echo $patient_an_registration->PICMENumber->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PICMENumber" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PICMENumber">
<span<?php echo $patient_an_registration->PICMENumber->viewAttributes() ?>>
<?php echo $patient_an_registration->PICMENumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Outcome->Visible) { // Outcome ?>
	<tr id="r_Outcome">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Outcome"><script id="tpc_patient_an_registration_Outcome" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Outcome->caption() ?></span></script></span></td>
		<td data-name="Outcome"<?php echo $patient_an_registration->Outcome->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Outcome" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Outcome">
<span<?php echo $patient_an_registration->Outcome->viewAttributes() ?>>
<?php echo $patient_an_registration->Outcome->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DateofAdmission->Visible) { // DateofAdmission ?>
	<tr id="r_DateofAdmission">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateofAdmission"><script id="tpc_patient_an_registration_DateofAdmission" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DateofAdmission->caption() ?></span></script></span></td>
		<td data-name="DateofAdmission"<?php echo $patient_an_registration->DateofAdmission->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateofAdmission" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DateofAdmission">
<span<?php echo $patient_an_registration->DateofAdmission->viewAttributes() ?>>
<?php echo $patient_an_registration->DateofAdmission->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->DateodProcedure->Visible) { // DateodProcedure ?>
	<tr id="r_DateodProcedure">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateodProcedure"><script id="tpc_patient_an_registration_DateodProcedure" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->DateodProcedure->caption() ?></span></script></span></td>
		<td data-name="DateodProcedure"<?php echo $patient_an_registration->DateodProcedure->cellAttributes() ?>>
<script id="tpx_patient_an_registration_DateodProcedure" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_DateodProcedure">
<span<?php echo $patient_an_registration->DateodProcedure->viewAttributes() ?>>
<?php echo $patient_an_registration->DateodProcedure->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Miscarriage->Visible) { // Miscarriage ?>
	<tr id="r_Miscarriage">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Miscarriage"><script id="tpc_patient_an_registration_Miscarriage" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Miscarriage->caption() ?></span></script></span></td>
		<td data-name="Miscarriage"<?php echo $patient_an_registration->Miscarriage->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Miscarriage" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Miscarriage">
<span<?php echo $patient_an_registration->Miscarriage->viewAttributes() ?>>
<?php echo $patient_an_registration->Miscarriage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
	<tr id="r_ModeOfDelivery">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ModeOfDelivery"><script id="tpc_patient_an_registration_ModeOfDelivery" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ModeOfDelivery->caption() ?></span></script></span></td>
		<td data-name="ModeOfDelivery"<?php echo $patient_an_registration->ModeOfDelivery->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ModeOfDelivery" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ModeOfDelivery">
<span<?php echo $patient_an_registration->ModeOfDelivery->viewAttributes() ?>>
<?php echo $patient_an_registration->ModeOfDelivery->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ND->Visible) { // ND ?>
	<tr id="r_ND">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ND"><script id="tpc_patient_an_registration_ND" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ND->caption() ?></span></script></span></td>
		<td data-name="ND"<?php echo $patient_an_registration->ND->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ND" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ND">
<span<?php echo $patient_an_registration->ND->viewAttributes() ?>>
<?php echo $patient_an_registration->ND->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->NDS->Visible) { // NDS ?>
	<tr id="r_NDS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDS"><script id="tpc_patient_an_registration_NDS" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->NDS->caption() ?></span></script></span></td>
		<td data-name="NDS"<?php echo $patient_an_registration->NDS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDS" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_NDS">
<span<?php echo $patient_an_registration->NDS->viewAttributes() ?>>
<?php echo $patient_an_registration->NDS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->NDP->Visible) { // NDP ?>
	<tr id="r_NDP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDP"><script id="tpc_patient_an_registration_NDP" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->NDP->caption() ?></span></script></span></td>
		<td data-name="NDP"<?php echo $patient_an_registration->NDP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NDP" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_NDP">
<span<?php echo $patient_an_registration->NDP->viewAttributes() ?>>
<?php echo $patient_an_registration->NDP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Vaccum->Visible) { // Vaccum ?>
	<tr id="r_Vaccum">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Vaccum"><script id="tpc_patient_an_registration_Vaccum" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Vaccum->caption() ?></span></script></span></td>
		<td data-name="Vaccum"<?php echo $patient_an_registration->Vaccum->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Vaccum" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Vaccum">
<span<?php echo $patient_an_registration->Vaccum->viewAttributes() ?>>
<?php echo $patient_an_registration->Vaccum->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->VaccumS->Visible) { // VaccumS ?>
	<tr id="r_VaccumS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumS"><script id="tpc_patient_an_registration_VaccumS" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->VaccumS->caption() ?></span></script></span></td>
		<td data-name="VaccumS"<?php echo $patient_an_registration->VaccumS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumS" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_VaccumS">
<span<?php echo $patient_an_registration->VaccumS->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->VaccumP->Visible) { // VaccumP ?>
	<tr id="r_VaccumP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumP"><script id="tpc_patient_an_registration_VaccumP" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->VaccumP->caption() ?></span></script></span></td>
		<td data-name="VaccumP"<?php echo $patient_an_registration->VaccumP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_VaccumP" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_VaccumP">
<span<?php echo $patient_an_registration->VaccumP->viewAttributes() ?>>
<?php echo $patient_an_registration->VaccumP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Forceps->Visible) { // Forceps ?>
	<tr id="r_Forceps">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Forceps"><script id="tpc_patient_an_registration_Forceps" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Forceps->caption() ?></span></script></span></td>
		<td data-name="Forceps"<?php echo $patient_an_registration->Forceps->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Forceps" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Forceps">
<span<?php echo $patient_an_registration->Forceps->viewAttributes() ?>>
<?php echo $patient_an_registration->Forceps->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ForcepsS->Visible) { // ForcepsS ?>
	<tr id="r_ForcepsS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsS"><script id="tpc_patient_an_registration_ForcepsS" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ForcepsS->caption() ?></span></script></span></td>
		<td data-name="ForcepsS"<?php echo $patient_an_registration->ForcepsS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsS" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ForcepsS">
<span<?php echo $patient_an_registration->ForcepsS->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ForcepsP->Visible) { // ForcepsP ?>
	<tr id="r_ForcepsP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsP"><script id="tpc_patient_an_registration_ForcepsP" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ForcepsP->caption() ?></span></script></span></td>
		<td data-name="ForcepsP"<?php echo $patient_an_registration->ForcepsP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ForcepsP" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ForcepsP">
<span<?php echo $patient_an_registration->ForcepsP->viewAttributes() ?>>
<?php echo $patient_an_registration->ForcepsP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Elective->Visible) { // Elective ?>
	<tr id="r_Elective">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Elective"><script id="tpc_patient_an_registration_Elective" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Elective->caption() ?></span></script></span></td>
		<td data-name="Elective"<?php echo $patient_an_registration->Elective->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Elective" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Elective">
<span<?php echo $patient_an_registration->Elective->viewAttributes() ?>>
<?php echo $patient_an_registration->Elective->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ElectiveS->Visible) { // ElectiveS ?>
	<tr id="r_ElectiveS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveS"><script id="tpc_patient_an_registration_ElectiveS" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ElectiveS->caption() ?></span></script></span></td>
		<td data-name="ElectiveS"<?php echo $patient_an_registration->ElectiveS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveS" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ElectiveS">
<span<?php echo $patient_an_registration->ElectiveS->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ElectiveP->Visible) { // ElectiveP ?>
	<tr id="r_ElectiveP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveP"><script id="tpc_patient_an_registration_ElectiveP" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ElectiveP->caption() ?></span></script></span></td>
		<td data-name="ElectiveP"<?php echo $patient_an_registration->ElectiveP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ElectiveP" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ElectiveP">
<span<?php echo $patient_an_registration->ElectiveP->viewAttributes() ?>>
<?php echo $patient_an_registration->ElectiveP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Emergency->Visible) { // Emergency ?>
	<tr id="r_Emergency">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Emergency"><script id="tpc_patient_an_registration_Emergency" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Emergency->caption() ?></span></script></span></td>
		<td data-name="Emergency"<?php echo $patient_an_registration->Emergency->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Emergency" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Emergency">
<span<?php echo $patient_an_registration->Emergency->viewAttributes() ?>>
<?php echo $patient_an_registration->Emergency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->EmergencyS->Visible) { // EmergencyS ?>
	<tr id="r_EmergencyS">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyS"><script id="tpc_patient_an_registration_EmergencyS" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->EmergencyS->caption() ?></span></script></span></td>
		<td data-name="EmergencyS"<?php echo $patient_an_registration->EmergencyS->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyS" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_EmergencyS">
<span<?php echo $patient_an_registration->EmergencyS->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->EmergencyP->Visible) { // EmergencyP ?>
	<tr id="r_EmergencyP">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyP"><script id="tpc_patient_an_registration_EmergencyP" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->EmergencyP->caption() ?></span></script></span></td>
		<td data-name="EmergencyP"<?php echo $patient_an_registration->EmergencyP->cellAttributes() ?>>
<script id="tpx_patient_an_registration_EmergencyP" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_EmergencyP">
<span<?php echo $patient_an_registration->EmergencyP->viewAttributes() ?>>
<?php echo $patient_an_registration->EmergencyP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Maturity->Visible) { // Maturity ?>
	<tr id="r_Maturity">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Maturity"><script id="tpc_patient_an_registration_Maturity" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Maturity->caption() ?></span></script></span></td>
		<td data-name="Maturity"<?php echo $patient_an_registration->Maturity->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Maturity" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Maturity">
<span<?php echo $patient_an_registration->Maturity->viewAttributes() ?>>
<?php echo $patient_an_registration->Maturity->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Baby1->Visible) { // Baby1 ?>
	<tr id="r_Baby1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby1"><script id="tpc_patient_an_registration_Baby1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Baby1->caption() ?></span></script></span></td>
		<td data-name="Baby1"<?php echo $patient_an_registration->Baby1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Baby1">
<span<?php echo $patient_an_registration->Baby1->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Baby2->Visible) { // Baby2 ?>
	<tr id="r_Baby2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby2"><script id="tpc_patient_an_registration_Baby2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Baby2->caption() ?></span></script></span></td>
		<td data-name="Baby2"<?php echo $patient_an_registration->Baby2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Baby2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Baby2">
<span<?php echo $patient_an_registration->Baby2->viewAttributes() ?>>
<?php echo $patient_an_registration->Baby2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->sex1->Visible) { // sex1 ?>
	<tr id="r_sex1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex1"><script id="tpc_patient_an_registration_sex1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->sex1->caption() ?></span></script></span></td>
		<td data-name="sex1"<?php echo $patient_an_registration->sex1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_sex1">
<span<?php echo $patient_an_registration->sex1->viewAttributes() ?>>
<?php echo $patient_an_registration->sex1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->sex2->Visible) { // sex2 ?>
	<tr id="r_sex2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex2"><script id="tpc_patient_an_registration_sex2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->sex2->caption() ?></span></script></span></td>
		<td data-name="sex2"<?php echo $patient_an_registration->sex2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_sex2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_sex2">
<span<?php echo $patient_an_registration->sex2->viewAttributes() ?>>
<?php echo $patient_an_registration->sex2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->weight1->Visible) { // weight1 ?>
	<tr id="r_weight1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight1"><script id="tpc_patient_an_registration_weight1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->weight1->caption() ?></span></script></span></td>
		<td data-name="weight1"<?php echo $patient_an_registration->weight1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_weight1">
<span<?php echo $patient_an_registration->weight1->viewAttributes() ?>>
<?php echo $patient_an_registration->weight1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->weight2->Visible) { // weight2 ?>
	<tr id="r_weight2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight2"><script id="tpc_patient_an_registration_weight2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->weight2->caption() ?></span></script></span></td>
		<td data-name="weight2"<?php echo $patient_an_registration->weight2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_weight2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_weight2">
<span<?php echo $patient_an_registration->weight2->viewAttributes() ?>>
<?php echo $patient_an_registration->weight2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->NICU1->Visible) { // NICU1 ?>
	<tr id="r_NICU1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU1"><script id="tpc_patient_an_registration_NICU1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->NICU1->caption() ?></span></script></span></td>
		<td data-name="NICU1"<?php echo $patient_an_registration->NICU1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_NICU1">
<span<?php echo $patient_an_registration->NICU1->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->NICU2->Visible) { // NICU2 ?>
	<tr id="r_NICU2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU2"><script id="tpc_patient_an_registration_NICU2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->NICU2->caption() ?></span></script></span></td>
		<td data-name="NICU2"<?php echo $patient_an_registration->NICU2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_NICU2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_NICU2">
<span<?php echo $patient_an_registration->NICU2->viewAttributes() ?>>
<?php echo $patient_an_registration->NICU2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Jaundice1->Visible) { // Jaundice1 ?>
	<tr id="r_Jaundice1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice1"><script id="tpc_patient_an_registration_Jaundice1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Jaundice1->caption() ?></span></script></span></td>
		<td data-name="Jaundice1"<?php echo $patient_an_registration->Jaundice1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Jaundice1">
<span<?php echo $patient_an_registration->Jaundice1->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Jaundice2->Visible) { // Jaundice2 ?>
	<tr id="r_Jaundice2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice2"><script id="tpc_patient_an_registration_Jaundice2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Jaundice2->caption() ?></span></script></span></td>
		<td data-name="Jaundice2"<?php echo $patient_an_registration->Jaundice2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Jaundice2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Jaundice2">
<span<?php echo $patient_an_registration->Jaundice2->viewAttributes() ?>>
<?php echo $patient_an_registration->Jaundice2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Others1->Visible) { // Others1 ?>
	<tr id="r_Others1">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others1"><script id="tpc_patient_an_registration_Others1" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Others1->caption() ?></span></script></span></td>
		<td data-name="Others1"<?php echo $patient_an_registration->Others1->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others1" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Others1">
<span<?php echo $patient_an_registration->Others1->viewAttributes() ?>>
<?php echo $patient_an_registration->Others1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->Others2->Visible) { // Others2 ?>
	<tr id="r_Others2">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others2"><script id="tpc_patient_an_registration_Others2" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->Others2->caption() ?></span></script></span></td>
		<td data-name="Others2"<?php echo $patient_an_registration->Others2->cellAttributes() ?>>
<script id="tpx_patient_an_registration_Others2" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_Others2">
<span<?php echo $patient_an_registration->Others2->viewAttributes() ?>>
<?php echo $patient_an_registration->Others2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->SpillOverReasons->Visible) { // SpillOverReasons ?>
	<tr id="r_SpillOverReasons">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_SpillOverReasons"><script id="tpc_patient_an_registration_SpillOverReasons" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->SpillOverReasons->caption() ?></span></script></span></td>
		<td data-name="SpillOverReasons"<?php echo $patient_an_registration->SpillOverReasons->cellAttributes() ?>>
<script id="tpx_patient_an_registration_SpillOverReasons" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_SpillOverReasons">
<span<?php echo $patient_an_registration->SpillOverReasons->viewAttributes() ?>>
<?php echo $patient_an_registration->SpillOverReasons->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ANClosed->Visible) { // ANClosed ?>
	<tr id="r_ANClosed">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosed"><script id="tpc_patient_an_registration_ANClosed" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ANClosed->caption() ?></span></script></span></td>
		<td data-name="ANClosed"<?php echo $patient_an_registration->ANClosed->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosed" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ANClosed">
<span<?php echo $patient_an_registration->ANClosed->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosed->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ANClosedDATE->Visible) { // ANClosedDATE ?>
	<tr id="r_ANClosedDATE">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosedDATE"><script id="tpc_patient_an_registration_ANClosedDATE" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ANClosedDATE->caption() ?></span></script></span></td>
		<td data-name="ANClosedDATE"<?php echo $patient_an_registration->ANClosedDATE->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ANClosedDATE" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ANClosedDATE">
<span<?php echo $patient_an_registration->ANClosedDATE->viewAttributes() ?>>
<?php echo $patient_an_registration->ANClosedDATE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
	<tr id="r_PastMedicalHistoryOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistoryOthers"><script id="tpc_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PastMedicalHistoryOthers->caption() ?></span></script></span></td>
		<td data-name="PastMedicalHistoryOthers"<?php echo $patient_an_registration->PastMedicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PastMedicalHistoryOthers">
<span<?php echo $patient_an_registration->PastMedicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
	<tr id="r_PastSurgicalHistoryOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistoryOthers"><script id="tpc_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PastSurgicalHistoryOthers->caption() ?></span></script></span></td>
		<td data-name="PastSurgicalHistoryOthers"<?php echo $patient_an_registration->PastSurgicalHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<span<?php echo $patient_an_registration->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
	<tr id="r_FamilyHistoryOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistoryOthers"><script id="tpc_patient_an_registration_FamilyHistoryOthers" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->FamilyHistoryOthers->caption() ?></span></script></span></td>
		<td data-name="FamilyHistoryOthers"<?php echo $patient_an_registration->FamilyHistoryOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_FamilyHistoryOthers" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_FamilyHistoryOthers">
<span<?php echo $patient_an_registration->FamilyHistoryOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
	<tr id="r_PresentPregnancyComplicationsOthers">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PresentPregnancyComplicationsOthers"><script id="tpc_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->caption() ?></span></script></span></td>
		<td data-name="PresentPregnancyComplicationsOthers"<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<script id="tpx_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?php echo $patient_an_registration->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_an_registration->ETdate->Visible) { // ETdate ?>
	<tr id="r_ETdate">
		<td class="<?php echo $patient_an_registration_view->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ETdate"><script id="tpc_patient_an_registration_ETdate" class="patient_an_registrationview" type="text/html"><span><?php echo $patient_an_registration->ETdate->caption() ?></span></script></span></td>
		<td data-name="ETdate"<?php echo $patient_an_registration->ETdate->cellAttributes() ?>>
<script id="tpx_patient_an_registration_ETdate" class="patient_an_registrationview" type="text/html">
<span id="el_patient_an_registration_ETdate">
<span<?php echo $patient_an_registration->ETdate->viewAttributes() ?>>
<?php echo $patient_an_registration->ETdate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_an_registrationview" class="ew-custom-template"></div>
<script id="tpm_patient_an_registrationview" type="text/html">
<div id="ct_patient_an_registration_view"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: inherit;
	align-items: stretch;
	width: 100%;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: red;
}
::-ms-input-placeholder { /* Microsoft Edge */
 color: red;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_id"];//
$showmaster = $_GET["showmaster"] ;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where id='".$Tid."'; ";
$resultsA = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where CoupleID='".$resultsA[0]["PatID"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["Female"] != '')
{
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$resultsA[0]["PatientId"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$results[0]["id"]."'; ";
$resultsVitalHistory = $dbhelper->ExecuteRows($sql);
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
$pageHeader = 'Stimulation Chart For ' . $resultsA[0]["ARTCYCLE"];
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
<?php echo $resultsVitalHistory[count($resultsVitalHistory)-1]["Chiefcomplaints"] ;?>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">AN Registration</h3>
			</div>
			<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_G"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_G"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_P"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_P"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_L"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_L"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_A"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_A"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_E"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_E"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_M"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_M"/}}</span>
				</td>
		 </tr>
	</tbody>
</table>
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_LMP"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_LMP"/}}</span>
				</td>
				<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ETdate"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ETdate"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_EDO"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_EDO"/}}</span>
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_MenstrualHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_MenstrualHistory"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ObstetricHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ObstetricHistory"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofGDM"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofGDM"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistorofPIH"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistorofPIH"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofIUGR"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofIUGR"/}}</span>
				</td>
				<td>
					 <span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofOligohydramnios"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofOligohydramnios"/}}</span>
				</td>
				<td>				
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PreviousHistoryofPreterm"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PreviousHistoryofPreterm"/}}</span>
				</td>
				<td>				
				</td>
				<td>					 
				</td>
		 </tr> 
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">G</span></th>
		  		<th><span class="ew-cell">AN Complication</span></th>
		  		<th><span class="ew-cell">Delivery – ND/ LSCS Place of delivery</span></th>
		  		<th><span class="ew-cell">Baby Sex/ weight/ problems</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_G1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DeliveryNDLSCS1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_BabySexweight1"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_G2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DeliveryNDLSCS2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_BabySexweight2"/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">3</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_G3"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DeliveryNDLSCS3"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_BabySexweight3"/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
<div class="card-body">
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastMedicalHistory"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastMedicalHistoryOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastMedicalHistoryOthers"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastSurgicalHistory"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PastSurgicalHistoryOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PastSurgicalHistoryOthers"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistory"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_FamilyHistory"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_FamilyHistoryOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_FamilyHistoryOthers"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
Scan :
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Scan Type</span></th>
		  		<th><span class="ew-cell">Done Date</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ViabilityDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ViabilityREPORT"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Viability2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Viability2DATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Viability2REPORT"/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">NTscan</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NTscanDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NTscanREPORT"/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">EarlyTarget</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EarlyTargetDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EarlyTargetREPORT"/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Anomaly</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_AnomalyDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_AnomalyREPORT"/}}</span></td>
		</tr>
				<tr>
		  		<td><span class="ew-cell">Growth</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_GrowthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_GrowthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Growth1</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Growth1DATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_Growth1REPORT"/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Investigation:
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<th><span class="ew-cell">Investigation Type</span></th>
		  		<th><span class="ew-cell">Done date</span></th>
		  		<th><span class="ew-cell">Inhouse / Outside Lab</span></th>
		  		<th><span class="ew-cell">Report</span></th>
		</tr>
		<tr>
				<td><span class="ew-cell">AN Profile</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ANProfileDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ANProfileINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ANProfileREPORT"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">Dual Marker</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DualMarkerDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DualMarkerINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_DualMarkerREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Quadruple Marker</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_QuadrupleDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_QuadrupleINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_QuadrupleREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">5 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A5monthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A5monthINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A5monthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">7 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A7monthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A7monthINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A7monthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">9 th month Blood & Urine test</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A9monthDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A9monthINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_A9monthREPORT"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Inj Dexamethasone</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_INJDATE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_INJINHOUSE"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_INJREPORT"/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
<div class="card-body">
Present Pregnancy Complications :
<table id="ETTableSt" class="ew-table" style="width:100%;">	
	<tbody>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Bleeding"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Bleeding"/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PresentPregnancyComplicationsOthers"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PresentPregnancyComplicationsOthers"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_PICMENumber"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_PICMENumber"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>		 
  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Outcome"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Outcome"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		 <tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateofAdmission"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_DateofAdmission"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_DateodProcedure"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_DateodProcedure"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Miscarriage"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Miscarriage"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
		  		<tr>
		  		<td>
					<span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_ModeOfDelivery"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ModeOfDelivery"/}}</span>
				</td>
				<td>					 
				</td>
		</tr>
	</tbody>
</table>
</div>
<div class="card-body">
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">ND</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NDS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_NDP"/}}</span></td>
		</tr> 
		<tr>
				<td><span class="ew-cell">Vaccum D</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_VaccumS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_VaccumP"/}}</span></td>
		</tr> 
		<tr>
		  		<td><span class="ew-cell">Forceps D</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ForcepsS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ForcepsP"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Elective LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ElectiveS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_ElectiveP"/}}</span></td>
		</tr>
		<tr>
		  		<td><span class="ew-cell">Emergency LSCS</span></td>		
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EmergencyS"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpx_patient_an_registration_EmergencyP"/}}</span></td>
		</tr>
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_Maturity"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Maturity"/}}
<div class="card-body">
Paediatric : 
<table id="customers" class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td><span class="ew-cell">1</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Baby1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_sex1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_weight1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_NICU1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Jaundice1"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others1"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Others1"/}}</span></td>
		</tr>
		<tr>
				<td><span class="ew-cell">2</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Baby2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Baby2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_sex2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_sex2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_weight2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_weight2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_NICU2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_NICU2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Jaundice2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Jaundice2"/}}</span></td>
		  		<td><span class="ew-cell">{{include tmpl="#tpc_patient_an_registration_Others2"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_Others2"/}}</span></td>
		</tr> 
	</tbody>
</table>
 <!-- /.card-body -->
</div>
{{include tmpl="#tpc_patient_an_registration_SpillOverReasons"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_SpillOverReasons"/}}
{{include tmpl="#tpc_patient_an_registration_ANClosed"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ANClosed"/}}
{{include tmpl="#tpc_patient_an_registration_ANClosedDATE"/}}&nbsp;{{include tmpl="#tpx_patient_an_registration_ANClosedDATE"/}}
		</div>
	</div>
</div>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_an_registration->Rows) ?> };
ew.applyTemplate("tpd_patient_an_registrationview", "tpm_patient_an_registrationview", "patient_an_registrationview", "<?php echo $patient_an_registration->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_an_registrationview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_an_registration_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_an_registration->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_an_registration_view->terminate();
?>