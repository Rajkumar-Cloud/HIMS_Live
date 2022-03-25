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
$patient_ot_surgery_register_view = new patient_ot_surgery_register_view();

// Run the page
$patient_ot_surgery_register_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_surgery_register_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_ot_surgery_register->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_ot_surgery_registerview = currentForm = new ew.Form("fpatient_ot_surgery_registerview", "view");

// Form_CustomValidate event
fpatient_ot_surgery_registerview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_surgery_registerview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_ot_surgery_registerview.lists["x_Surgeon"] = <?php echo $patient_ot_surgery_register_view->Surgeon->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerview.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_surgery_register_view->Surgeon->lookupOptions()) ?>;
fpatient_ot_surgery_registerview.lists["x_Anaesthetist"] = <?php echo $patient_ot_surgery_register_view->Anaesthetist->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerview.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_surgery_register_view->Anaesthetist->lookupOptions()) ?>;
fpatient_ot_surgery_registerview.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_surgery_register_view->AsstSurgeon1->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerview.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_surgery_register_view->AsstSurgeon1->lookupOptions()) ?>;
fpatient_ot_surgery_registerview.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_surgery_register_view->AsstSurgeon2->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerview.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_surgery_register_view->AsstSurgeon2->lookupOptions()) ?>;
fpatient_ot_surgery_registerview.lists["x_paediatric"] = <?php echo $patient_ot_surgery_register_view->paediatric->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerview.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_surgery_register_view->paediatric->lookupOptions()) ?>;
fpatient_ot_surgery_registerview.lists["x_PatientSearch"] = <?php echo $patient_ot_surgery_register_view->PatientSearch->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerview.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_ot_surgery_register_view->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_ot_surgery_register->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_ot_surgery_register_view->ExportOptions->render("body") ?>
<?php $patient_ot_surgery_register_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_ot_surgery_register_view->showPageHeader(); ?>
<?php
$patient_ot_surgery_register_view->showMessage();
?>
<form name="fpatient_ot_surgery_registerview" id="fpatient_ot_surgery_registerview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_ot_surgery_register_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_ot_surgery_register_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<input type="hidden" name="modal" value="<?php echo (int)$patient_ot_surgery_register_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_ot_surgery_register->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_id"><script id="tpc_patient_ot_surgery_register_id" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_ot_surgery_register->id->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_id" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_id">
<span<?php echo $patient_ot_surgery_register->id->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PatID"><script id="tpc_patient_ot_surgery_register_PatID" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $patient_ot_surgery_register->PatID->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatID" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_PatID">
<span<?php echo $patient_ot_surgery_register->PatID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PatientName"><script id="tpc_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $patient_ot_surgery_register->PatientName->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_PatientName">
<span<?php echo $patient_ot_surgery_register->PatientName->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_mrnno"><script id="tpc_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $patient_ot_surgery_register->mrnno->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_mrnno">
<span<?php echo $patient_ot_surgery_register->mrnno->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_MobileNumber"><script id="tpc_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $patient_ot_surgery_register->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_MobileNumber">
<span<?php echo $patient_ot_surgery_register->MobileNumber->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Age"><script id="tpc_patient_ot_surgery_register_Age" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $patient_ot_surgery_register->Age->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Age" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_Age">
<span<?php echo $patient_ot_surgery_register->Age->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Gender"><script id="tpc_patient_ot_surgery_register_Gender" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $patient_ot_surgery_register->Gender->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Gender" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_Gender">
<span<?php echo $patient_ot_surgery_register->Gender->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_profilePic"><script id="tpc_patient_ot_surgery_register_profilePic" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $patient_ot_surgery_register->profilePic->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_profilePic" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_profilePic">
<span<?php echo $patient_ot_surgery_register->profilePic->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->diagnosis->Visible) { // diagnosis ?>
	<tr id="r_diagnosis">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_diagnosis"><script id="tpc_patient_ot_surgery_register_diagnosis" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->diagnosis->caption() ?></span></script></span></td>
		<td data-name="diagnosis"<?php echo $patient_ot_surgery_register->diagnosis->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_diagnosis" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_diagnosis">
<span<?php echo $patient_ot_surgery_register->diagnosis->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->diagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->proposedSurgery->Visible) { // proposedSurgery ?>
	<tr id="r_proposedSurgery">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_proposedSurgery"><script id="tpc_patient_ot_surgery_register_proposedSurgery" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->proposedSurgery->caption() ?></span></script></span></td>
		<td data-name="proposedSurgery"<?php echo $patient_ot_surgery_register->proposedSurgery->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_proposedSurgery" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_proposedSurgery">
<span<?php echo $patient_ot_surgery_register->proposedSurgery->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->proposedSurgery->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryProcedure->Visible) { // surgeryProcedure ?>
	<tr id="r_surgeryProcedure">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_surgeryProcedure"><script id="tpc_patient_ot_surgery_register_surgeryProcedure" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->surgeryProcedure->caption() ?></span></script></span></td>
		<td data-name="surgeryProcedure"<?php echo $patient_ot_surgery_register->surgeryProcedure->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryProcedure" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_surgeryProcedure">
<span<?php echo $patient_ot_surgery_register->surgeryProcedure->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->surgeryProcedure->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
	<tr id="r_typeOfAnaesthesia">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_typeOfAnaesthesia"><script id="tpc_patient_ot_surgery_register_typeOfAnaesthesia" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->typeOfAnaesthesia->caption() ?></span></script></span></td>
		<td data-name="typeOfAnaesthesia"<?php echo $patient_ot_surgery_register->typeOfAnaesthesia->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_typeOfAnaesthesia" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_typeOfAnaesthesia">
<span<?php echo $patient_ot_surgery_register->typeOfAnaesthesia->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->typeOfAnaesthesia->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecievedTime->Visible) { // RecievedTime ?>
	<tr id="r_RecievedTime">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_RecievedTime"><script id="tpc_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->RecievedTime->caption() ?></span></script></span></td>
		<td data-name="RecievedTime"<?php echo $patient_ot_surgery_register->RecievedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_RecievedTime">
<span<?php echo $patient_ot_surgery_register->RecievedTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->RecievedTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
	<tr id="r_AnaesthesiaStarted">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaStarted"><script id="tpc_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->AnaesthesiaStarted->caption() ?></span></script></span></td>
		<td data-name="AnaesthesiaStarted"<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
	<tr id="r_AnaesthesiaEnded">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaEnded"><script id="tpc_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->AnaesthesiaEnded->caption() ?></span></script></span></td>
		<td data-name="AnaesthesiaEnded"<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryStarted->Visible) { // surgeryStarted ?>
	<tr id="r_surgeryStarted">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_surgeryStarted"><script id="tpc_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->surgeryStarted->caption() ?></span></script></span></td>
		<td data-name="surgeryStarted"<?php echo $patient_ot_surgery_register->surgeryStarted->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_surgeryStarted">
<span<?php echo $patient_ot_surgery_register->surgeryStarted->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->surgeryStarted->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryEnded->Visible) { // surgeryEnded ?>
	<tr id="r_surgeryEnded">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_surgeryEnded"><script id="tpc_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->surgeryEnded->caption() ?></span></script></span></td>
		<td data-name="surgeryEnded"<?php echo $patient_ot_surgery_register->surgeryEnded->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_surgeryEnded">
<span<?php echo $patient_ot_surgery_register->surgeryEnded->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->surgeryEnded->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecoveryTime->Visible) { // RecoveryTime ?>
	<tr id="r_RecoveryTime">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_RecoveryTime"><script id="tpc_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->RecoveryTime->caption() ?></span></script></span></td>
		<td data-name="RecoveryTime"<?php echo $patient_ot_surgery_register->RecoveryTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_RecoveryTime">
<span<?php echo $patient_ot_surgery_register->RecoveryTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->RecoveryTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->ShiftedTime->Visible) { // ShiftedTime ?>
	<tr id="r_ShiftedTime">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_ShiftedTime"><script id="tpc_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->ShiftedTime->caption() ?></span></script></span></td>
		<td data-name="ShiftedTime"<?php echo $patient_ot_surgery_register->ShiftedTime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_ShiftedTime">
<span<?php echo $patient_ot_surgery_register->ShiftedTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ShiftedTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Duration"><script id="tpc_patient_ot_surgery_register_Duration" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->Duration->caption() ?></span></script></span></td>
		<td data-name="Duration"<?php echo $patient_ot_surgery_register->Duration->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Duration" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_Duration">
<span<?php echo $patient_ot_surgery_register->Duration->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Duration->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->Surgeon->Visible) { // Surgeon ?>
	<tr id="r_Surgeon">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Surgeon"><script id="tpc_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->Surgeon->caption() ?></span></script></span></td>
		<td data-name="Surgeon"<?php echo $patient_ot_surgery_register->Surgeon->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_Surgeon">
<span<?php echo $patient_ot_surgery_register->Surgeon->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Surgeon->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->Anaesthetist->Visible) { // Anaesthetist ?>
	<tr id="r_Anaesthetist">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Anaesthetist"><script id="tpc_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->Anaesthetist->caption() ?></span></script></span></td>
		<td data-name="Anaesthetist"<?php echo $patient_ot_surgery_register->Anaesthetist->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_Anaesthetist">
<span<?php echo $patient_ot_surgery_register->Anaesthetist->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Anaesthetist->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
	<tr id="r_AsstSurgeon1">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon1"><script id="tpc_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->AsstSurgeon1->caption() ?></span></script></span></td>
		<td data-name="AsstSurgeon1"<?php echo $patient_ot_surgery_register->AsstSurgeon1->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_AsstSurgeon1">
<span<?php echo $patient_ot_surgery_register->AsstSurgeon1->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AsstSurgeon1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
	<tr id="r_AsstSurgeon2">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon2"><script id="tpc_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->AsstSurgeon2->caption() ?></span></script></span></td>
		<td data-name="AsstSurgeon2"<?php echo $patient_ot_surgery_register->AsstSurgeon2->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_AsstSurgeon2">
<span<?php echo $patient_ot_surgery_register->AsstSurgeon2->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AsstSurgeon2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->paediatric->Visible) { // paediatric ?>
	<tr id="r_paediatric">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_paediatric"><script id="tpc_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->paediatric->caption() ?></span></script></span></td>
		<td data-name="paediatric"<?php echo $patient_ot_surgery_register->paediatric->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_paediatric">
<span<?php echo $patient_ot_surgery_register->paediatric->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->paediatric->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
	<tr id="r_ScrubNurse1">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse1"><script id="tpc_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->ScrubNurse1->caption() ?></span></script></span></td>
		<td data-name="ScrubNurse1"<?php echo $patient_ot_surgery_register->ScrubNurse1->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_ScrubNurse1">
<span<?php echo $patient_ot_surgery_register->ScrubNurse1->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ScrubNurse1->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
	<tr id="r_ScrubNurse2">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse2"><script id="tpc_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->ScrubNurse2->caption() ?></span></script></span></td>
		<td data-name="ScrubNurse2"<?php echo $patient_ot_surgery_register->ScrubNurse2->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_ScrubNurse2">
<span<?php echo $patient_ot_surgery_register->ScrubNurse2->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ScrubNurse2->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->FloorNurse->Visible) { // FloorNurse ?>
	<tr id="r_FloorNurse">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_FloorNurse"><script id="tpc_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->FloorNurse->caption() ?></span></script></span></td>
		<td data-name="FloorNurse"<?php echo $patient_ot_surgery_register->FloorNurse->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_FloorNurse">
<span<?php echo $patient_ot_surgery_register->FloorNurse->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->FloorNurse->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->Technician->Visible) { // Technician ?>
	<tr id="r_Technician">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Technician"><script id="tpc_patient_ot_surgery_register_Technician" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->Technician->caption() ?></span></script></span></td>
		<td data-name="Technician"<?php echo $patient_ot_surgery_register->Technician->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Technician" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_Technician">
<span<?php echo $patient_ot_surgery_register->Technician->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Technician->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->HouseKeeping->Visible) { // HouseKeeping ?>
	<tr id="r_HouseKeeping">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_HouseKeeping"><script id="tpc_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->HouseKeeping->caption() ?></span></script></span></td>
		<td data-name="HouseKeeping"<?php echo $patient_ot_surgery_register->HouseKeeping->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_HouseKeeping">
<span<?php echo $patient_ot_surgery_register->HouseKeeping->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->HouseKeeping->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
	<tr id="r_countsCheckedMops">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_countsCheckedMops"><script id="tpc_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->countsCheckedMops->caption() ?></span></script></span></td>
		<td data-name="countsCheckedMops"<?php echo $patient_ot_surgery_register->countsCheckedMops->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_countsCheckedMops">
<span<?php echo $patient_ot_surgery_register->countsCheckedMops->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->countsCheckedMops->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->gauze->Visible) { // gauze ?>
	<tr id="r_gauze">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_gauze"><script id="tpc_patient_ot_surgery_register_gauze" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->gauze->caption() ?></span></script></span></td>
		<td data-name="gauze"<?php echo $patient_ot_surgery_register->gauze->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_gauze" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_gauze">
<span<?php echo $patient_ot_surgery_register->gauze->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->gauze->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->needles->Visible) { // needles ?>
	<tr id="r_needles">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_needles"><script id="tpc_patient_ot_surgery_register_needles" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->needles->caption() ?></span></script></span></td>
		<td data-name="needles"<?php echo $patient_ot_surgery_register->needles->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_needles" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_needles">
<span<?php echo $patient_ot_surgery_register->needles->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->needles->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodloss->Visible) { // bloodloss ?>
	<tr id="r_bloodloss">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_bloodloss"><script id="tpc_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->bloodloss->caption() ?></span></script></span></td>
		<td data-name="bloodloss"<?php echo $patient_ot_surgery_register->bloodloss->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_bloodloss">
<span<?php echo $patient_ot_surgery_register->bloodloss->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->bloodloss->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
	<tr id="r_bloodtransfusion">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_bloodtransfusion"><script id="tpc_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->bloodtransfusion->caption() ?></span></script></span></td>
		<td data-name="bloodtransfusion"<?php echo $patient_ot_surgery_register->bloodtransfusion->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_bloodtransfusion">
<span<?php echo $patient_ot_surgery_register->bloodtransfusion->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->bloodtransfusion->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->implantsUsed->Visible) { // implantsUsed ?>
	<tr id="r_implantsUsed">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_implantsUsed"><script id="tpc_patient_ot_surgery_register_implantsUsed" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->implantsUsed->caption() ?></span></script></span></td>
		<td data-name="implantsUsed"<?php echo $patient_ot_surgery_register->implantsUsed->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_implantsUsed" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_implantsUsed">
<span<?php echo $patient_ot_surgery_register->implantsUsed->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->implantsUsed->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
	<tr id="r_MaterialsForHPE">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_MaterialsForHPE"><script id="tpc_patient_ot_surgery_register_MaterialsForHPE" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->MaterialsForHPE->caption() ?></span></script></span></td>
		<td data-name="MaterialsForHPE"<?php echo $patient_ot_surgery_register->MaterialsForHPE->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_MaterialsForHPE" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_MaterialsForHPE">
<span<?php echo $patient_ot_surgery_register->MaterialsForHPE->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->MaterialsForHPE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_status"><script id="tpc_patient_ot_surgery_register_status" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $patient_ot_surgery_register->status->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_status" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_status">
<span<?php echo $patient_ot_surgery_register->status->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_createdby"><script id="tpc_patient_ot_surgery_register_createdby" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $patient_ot_surgery_register->createdby->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_createdby" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_createdby">
<span<?php echo $patient_ot_surgery_register->createdby->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_createddatetime"><script id="tpc_patient_ot_surgery_register_createddatetime" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $patient_ot_surgery_register->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_createddatetime" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_createddatetime">
<span<?php echo $patient_ot_surgery_register->createddatetime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_modifiedby"><script id="tpc_patient_ot_surgery_register_modifiedby" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $patient_ot_surgery_register->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_modifiedby" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_modifiedby">
<span<?php echo $patient_ot_surgery_register->modifiedby->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_modifieddatetime"><script id="tpc_patient_ot_surgery_register_modifieddatetime" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_ot_surgery_register->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_modifieddatetime" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_modifieddatetime">
<span<?php echo $patient_ot_surgery_register->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_HospID"><script id="tpc_patient_ot_surgery_register_HospID" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient_ot_surgery_register->HospID->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_HospID" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_HospID">
<span<?php echo $patient_ot_surgery_register->HospID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PatientSearch"><script id="tpc_patient_ot_surgery_register_PatientSearch" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->PatientSearch->caption() ?></span></script></span></td>
		<td data-name="PatientSearch"<?php echo $patient_ot_surgery_register->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientSearch" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_PatientSearch">
<span<?php echo $patient_ot_surgery_register->PatientSearch->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatientSearch->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Reception"><script id="tpc_patient_ot_surgery_register_Reception" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $patient_ot_surgery_register->Reception->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_Reception" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_Reception">
<span<?php echo $patient_ot_surgery_register->Reception->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PatientID"><script id="tpc_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $patient_ot_surgery_register->PatientID->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_PatientID">
<span<?php echo $patient_ot_surgery_register->PatientID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_ot_surgery_register->PId->Visible) { // PId ?>
	<tr id="r_PId">
		<td class="<?php echo $patient_ot_surgery_register_view->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PId"><script id="tpc_patient_ot_surgery_register_PId" class="patient_ot_surgery_registerview" type="text/html"><span><?php echo $patient_ot_surgery_register->PId->caption() ?></span></script></span></td>
		<td data-name="PId"<?php echo $patient_ot_surgery_register->PId->cellAttributes() ?>>
<script id="tpx_patient_ot_surgery_register_PId" class="patient_ot_surgery_registerview" type="text/html">
<span id="el_patient_ot_surgery_register_PId">
<span<?php echo $patient_ot_surgery_register->PId->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_ot_surgery_registerview" class="ew-custom-template"></div>
<script id="tpm_patient_ot_surgery_registerview" type="text/html">
<div id="ct_patient_ot_surgery_register_view"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientID"];
		if($Tid == null)
		{
$Tid = $resuVi[0]["PId"];
		}
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_ot_surgery_register_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatientID"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatientID"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Age"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_ot_surgery_register_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_MobileNumber"/}}</p> 
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
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_diagnosis"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_diagnosis"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_proposedSurgery"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_proposedSurgery"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryProcedure"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_surgeryProcedure"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_typeOfAnaesthesia"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_typeOfAnaesthesia"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_RecievedTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_RecievedTime"/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AnaesthesiaStarted"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AnaesthesiaStarted"/}}</td></tr>
							<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AnaesthesiaEnded"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AnaesthesiaEnded"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryStarted"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_surgeryStarted"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_surgeryEnded"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_surgeryEnded"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_RecoveryTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_RecoveryTime"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ShiftedTime"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_ShiftedTime"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Duration"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Duration"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Surgeon"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Surgeon"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Anaesthetist"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Anaesthetist"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AsstSurgeon1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AsstSurgeon1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_AsstSurgeon2"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_AsstSurgeon2"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_paediatric"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_paediatric"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ScrubNurse1"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_ScrubNurse1"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_ScrubNurse2"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_ScrubNurse2"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_FloorNurse"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_FloorNurse"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_Technician"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_Technician"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_HouseKeeping"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_HouseKeeping"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_countsCheckedMops"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_countsCheckedMops"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_gauze"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_gauze"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_needles"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_needles"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_bloodloss"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_bloodloss"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_bloodtransfusion"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_bloodtransfusion"/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_implantsUsed"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_implantsUsed"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_ot_surgery_register_MaterialsForHPE"/}}&nbsp;{{include tmpl="#tpx_patient_ot_surgery_register_MaterialsForHPE"/}}</td></tr>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_ot_surgery_register->Rows) ?> };
ew.applyTemplate("tpd_patient_ot_surgery_registerview", "tpm_patient_ot_surgery_registerview", "patient_ot_surgery_registerview", "<?php echo $patient_ot_surgery_register->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_ot_surgery_registerview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_ot_surgery_register_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_ot_surgery_register->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_ot_surgery_register_view->terminate();
?>