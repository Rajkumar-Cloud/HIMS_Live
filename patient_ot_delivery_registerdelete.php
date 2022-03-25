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
$patient_ot_delivery_register_delete = new patient_ot_delivery_register_delete();

// Run the page
$patient_ot_delivery_register_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_delivery_register_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_ot_delivery_registerdelete = currentForm = new ew.Form("fpatient_ot_delivery_registerdelete", "delete");

// Form_CustomValidate event
fpatient_ot_delivery_registerdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_delivery_registerdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_ot_delivery_registerdelete.lists["x_Surgeon"] = <?php echo $patient_ot_delivery_register_delete->Surgeon->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerdelete.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_delivery_register_delete->Surgeon->lookupOptions()) ?>;
fpatient_ot_delivery_registerdelete.autoSuggests["x_Surgeon"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerdelete.lists["x_Anaesthetist"] = <?php echo $patient_ot_delivery_register_delete->Anaesthetist->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerdelete.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_delivery_register_delete->Anaesthetist->lookupOptions()) ?>;
fpatient_ot_delivery_registerdelete.autoSuggests["x_Anaesthetist"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerdelete.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_delivery_register_delete->AsstSurgeon1->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerdelete.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_delivery_register_delete->AsstSurgeon1->lookupOptions()) ?>;
fpatient_ot_delivery_registerdelete.autoSuggests["x_AsstSurgeon1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerdelete.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_delivery_register_delete->AsstSurgeon2->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerdelete.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_delivery_register_delete->AsstSurgeon2->lookupOptions()) ?>;
fpatient_ot_delivery_registerdelete.autoSuggests["x_AsstSurgeon2"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_ot_delivery_registerdelete.lists["x_paediatric"] = <?php echo $patient_ot_delivery_register_delete->paediatric->Lookup->toClientList() ?>;
fpatient_ot_delivery_registerdelete.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_delivery_register_delete->paediatric->lookupOptions()) ?>;
fpatient_ot_delivery_registerdelete.autoSuggests["x_paediatric"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_ot_delivery_register_delete->showPageHeader(); ?>
<?php
$patient_ot_delivery_register_delete->showMessage();
?>
<form name="fpatient_ot_delivery_registerdelete" id="fpatient_ot_delivery_registerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_ot_delivery_register_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_ot_delivery_register_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_ot_delivery_register_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
		<th class="<?php echo $patient_ot_delivery_register->id->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><?php echo $patient_ot_delivery_register->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_ot_delivery_register->PatID->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><?php echo $patient_ot_delivery_register->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_ot_delivery_register->PatientName->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><?php echo $patient_ot_delivery_register->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_ot_delivery_register->mrnno->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><?php echo $patient_ot_delivery_register->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_ot_delivery_register->MobileNumber->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><?php echo $patient_ot_delivery_register->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_ot_delivery_register->Age->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><?php echo $patient_ot_delivery_register->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_ot_delivery_register->Gender->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><?php echo $patient_ot_delivery_register->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<th class="<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
		<th class="<?php echo $patient_ot_delivery_register->Abortion->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><?php echo $patient_ot_delivery_register->Abortion->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthDate->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><?php echo $patient_ot_delivery_register->ChildBirthDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><?php echo $patient_ot_delivery_register->ChildBirthTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildSex->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><?php echo $patient_ot_delivery_register->ChildSex->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildWt->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><?php echo $patient_ot_delivery_register->ChildWt->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildDay->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><?php echo $patient_ot_delivery_register->ChildDay->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildOE->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><?php echo $patient_ot_delivery_register->ChildOE->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBlGrp->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><?php echo $patient_ot_delivery_register->ChildBlGrp->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
		<th class="<?php echo $patient_ot_delivery_register->ApgarScore->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><?php echo $patient_ot_delivery_register->ApgarScore->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
		<th class="<?php echo $patient_ot_delivery_register->birthnotification->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><?php echo $patient_ot_delivery_register->birthnotification->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
		<th class="<?php echo $patient_ot_delivery_register->formno->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><?php echo $patient_ot_delivery_register->formno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
		<th class="<?php echo $patient_ot_delivery_register->dte->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><?php echo $patient_ot_delivery_register->dte->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
		<th class="<?php echo $patient_ot_delivery_register->motherReligion->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><?php echo $patient_ot_delivery_register->motherReligion->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodgroup->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><?php echo $patient_ot_delivery_register->bloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
		<th class="<?php echo $patient_ot_delivery_register->status->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><?php echo $patient_ot_delivery_register->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_ot_delivery_register->createdby->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><?php echo $patient_ot_delivery_register->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_ot_delivery_register->createddatetime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><?php echo $patient_ot_delivery_register->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_ot_delivery_register->modifiedby->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><?php echo $patient_ot_delivery_register->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_ot_delivery_register->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><?php echo $patient_ot_delivery_register->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $patient_ot_delivery_register->PatientID->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><?php echo $patient_ot_delivery_register->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_ot_delivery_register->HospID->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><?php echo $patient_ot_delivery_register->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthDate1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><?php echo $patient_ot_delivery_register->ChildBirthDate1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBirthTime1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><?php echo $patient_ot_delivery_register->ChildBirthTime1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildSex1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><?php echo $patient_ot_delivery_register->ChildSex1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildWt1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><?php echo $patient_ot_delivery_register->ChildWt1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildDay1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><?php echo $patient_ot_delivery_register->ChildDay1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildOE1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><?php echo $patient_ot_delivery_register->ChildOE1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ChildBlGrp1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><?php echo $patient_ot_delivery_register->ChildBlGrp1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ApgarScore1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><?php echo $patient_ot_delivery_register->ApgarScore1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
		<th class="<?php echo $patient_ot_delivery_register->birthnotification1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><?php echo $patient_ot_delivery_register->birthnotification1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
		<th class="<?php echo $patient_ot_delivery_register->formno1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><?php echo $patient_ot_delivery_register->formno1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
		<th class="<?php echo $patient_ot_delivery_register->RecievedTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><?php echo $patient_ot_delivery_register->RecievedTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<th class="<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><?php echo $patient_ot_delivery_register->AnaesthesiaStarted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<th class="<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><?php echo $patient_ot_delivery_register->AnaesthesiaEnded->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<th class="<?php echo $patient_ot_delivery_register->surgeryStarted->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><?php echo $patient_ot_delivery_register->surgeryStarted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<th class="<?php echo $patient_ot_delivery_register->surgeryEnded->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><?php echo $patient_ot_delivery_register->surgeryEnded->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<th class="<?php echo $patient_ot_delivery_register->RecoveryTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><?php echo $patient_ot_delivery_register->RecoveryTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<th class="<?php echo $patient_ot_delivery_register->ShiftedTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><?php echo $patient_ot_delivery_register->ShiftedTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
		<th class="<?php echo $patient_ot_delivery_register->Duration->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><?php echo $patient_ot_delivery_register->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
		<th class="<?php echo $patient_ot_delivery_register->Surgeon->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><?php echo $patient_ot_delivery_register->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<th class="<?php echo $patient_ot_delivery_register->Anaesthetist->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><?php echo $patient_ot_delivery_register->Anaesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<th class="<?php echo $patient_ot_delivery_register->AsstSurgeon1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><?php echo $patient_ot_delivery_register->AsstSurgeon1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<th class="<?php echo $patient_ot_delivery_register->AsstSurgeon2->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><?php echo $patient_ot_delivery_register->AsstSurgeon2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
		<th class="<?php echo $patient_ot_delivery_register->paediatric->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><?php echo $patient_ot_delivery_register->paediatric->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<th class="<?php echo $patient_ot_delivery_register->ScrubNurse1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><?php echo $patient_ot_delivery_register->ScrubNurse1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<th class="<?php echo $patient_ot_delivery_register->ScrubNurse2->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><?php echo $patient_ot_delivery_register->ScrubNurse2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
		<th class="<?php echo $patient_ot_delivery_register->FloorNurse->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><?php echo $patient_ot_delivery_register->FloorNurse->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
		<th class="<?php echo $patient_ot_delivery_register->Technician->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><?php echo $patient_ot_delivery_register->Technician->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<th class="<?php echo $patient_ot_delivery_register->HouseKeeping->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><?php echo $patient_ot_delivery_register->HouseKeeping->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<th class="<?php echo $patient_ot_delivery_register->countsCheckedMops->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><?php echo $patient_ot_delivery_register->countsCheckedMops->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
		<th class="<?php echo $patient_ot_delivery_register->gauze->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><?php echo $patient_ot_delivery_register->gauze->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
		<th class="<?php echo $patient_ot_delivery_register->needles->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><?php echo $patient_ot_delivery_register->needles->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodloss->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><?php echo $patient_ot_delivery_register->bloodloss->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<th class="<?php echo $patient_ot_delivery_register->bloodtransfusion->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><?php echo $patient_ot_delivery_register->bloodtransfusion->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_ot_delivery_register->Reception->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><?php echo $patient_ot_delivery_register->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
		<th class="<?php echo $patient_ot_delivery_register->PId->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><?php echo $patient_ot_delivery_register->PId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_ot_delivery_register_delete->RecCnt = 0;
$i = 0;
while (!$patient_ot_delivery_register_delete->Recordset->EOF) {
	$patient_ot_delivery_register_delete->RecCnt++;
	$patient_ot_delivery_register_delete->RowCnt++;

	// Set row properties
	$patient_ot_delivery_register->resetAttributes();
	$patient_ot_delivery_register->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_ot_delivery_register_delete->loadRowValues($patient_ot_delivery_register_delete->Recordset);

	// Render row
	$patient_ot_delivery_register_delete->renderRow();
?>
	<tr<?php echo $patient_ot_delivery_register->rowAttributes() ?>>
<?php if ($patient_ot_delivery_register->id->Visible) { // id ?>
		<td<?php echo $patient_ot_delivery_register->id->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
<span<?php echo $patient_ot_delivery_register->id->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_ot_delivery_register->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
<span<?php echo $patient_ot_delivery_register->PatID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_ot_delivery_register->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
<span<?php echo $patient_ot_delivery_register->PatientName->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_ot_delivery_register->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
<span<?php echo $patient_ot_delivery_register->mrnno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_ot_delivery_register->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
<span<?php echo $patient_ot_delivery_register->MobileNumber->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Age->Visible) { // Age ?>
		<td<?php echo $patient_ot_delivery_register->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
<span<?php echo $patient_ot_delivery_register->Age->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_ot_delivery_register->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
<span<?php echo $patient_ot_delivery_register->Gender->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
		<td<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Abortion->Visible) { // Abortion ?>
		<td<?php echo $patient_ot_delivery_register->Abortion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
<span<?php echo $patient_ot_delivery_register->Abortion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Abortion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate->Visible) { // ChildBirthDate ?>
		<td<?php echo $patient_ot_delivery_register->ChildBirthDate->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime->Visible) { // ChildBirthTime ?>
		<td<?php echo $patient_ot_delivery_register->ChildBirthTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex->Visible) { // ChildSex ?>
		<td<?php echo $patient_ot_delivery_register->ChildSex->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
<span<?php echo $patient_ot_delivery_register->ChildSex->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt->Visible) { // ChildWt ?>
		<td<?php echo $patient_ot_delivery_register->ChildWt->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
<span<?php echo $patient_ot_delivery_register->ChildWt->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay->Visible) { // ChildDay ?>
		<td<?php echo $patient_ot_delivery_register->ChildDay->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
<span<?php echo $patient_ot_delivery_register->ChildDay->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE->Visible) { // ChildOE ?>
		<td<?php echo $patient_ot_delivery_register->ChildOE->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
<span<?php echo $patient_ot_delivery_register->ChildOE->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp->Visible) { // ChildBlGrp ?>
		<td<?php echo $patient_ot_delivery_register->ChildBlGrp->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore->Visible) { // ApgarScore ?>
		<td<?php echo $patient_ot_delivery_register->ApgarScore->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
<span<?php echo $patient_ot_delivery_register->ApgarScore->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification->Visible) { // birthnotification ?>
		<td<?php echo $patient_ot_delivery_register->birthnotification->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
<span<?php echo $patient_ot_delivery_register->birthnotification->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno->Visible) { // formno ?>
		<td<?php echo $patient_ot_delivery_register->formno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
<span<?php echo $patient_ot_delivery_register->formno->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->dte->Visible) { // dte ?>
		<td<?php echo $patient_ot_delivery_register->dte->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
<span<?php echo $patient_ot_delivery_register->dte->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->dte->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->motherReligion->Visible) { // motherReligion ?>
		<td<?php echo $patient_ot_delivery_register->motherReligion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
<span<?php echo $patient_ot_delivery_register->motherReligion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->motherReligion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodgroup->Visible) { // bloodgroup ?>
		<td<?php echo $patient_ot_delivery_register->bloodgroup->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
<span<?php echo $patient_ot_delivery_register->bloodgroup->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->status->Visible) { // status ?>
		<td<?php echo $patient_ot_delivery_register->status->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
<span<?php echo $patient_ot_delivery_register->status->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_ot_delivery_register->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
<span<?php echo $patient_ot_delivery_register->createdby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_ot_delivery_register->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
<span<?php echo $patient_ot_delivery_register->createddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_ot_delivery_register->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
<span<?php echo $patient_ot_delivery_register->modifiedby->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_ot_delivery_register->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
<span<?php echo $patient_ot_delivery_register->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PatientID->Visible) { // PatientID ?>
		<td<?php echo $patient_ot_delivery_register->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
<span<?php echo $patient_ot_delivery_register->PatientID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_ot_delivery_register->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
<span<?php echo $patient_ot_delivery_register->HospID->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
		<td<?php echo $patient_ot_delivery_register->ChildBirthDate1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
<span<?php echo $patient_ot_delivery_register->ChildBirthDate1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
		<td<?php echo $patient_ot_delivery_register->ChildBirthTime1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
<span<?php echo $patient_ot_delivery_register->ChildBirthTime1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBirthTime1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildSex1->Visible) { // ChildSex1 ?>
		<td<?php echo $patient_ot_delivery_register->ChildSex1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
<span<?php echo $patient_ot_delivery_register->ChildSex1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildSex1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildWt1->Visible) { // ChildWt1 ?>
		<td<?php echo $patient_ot_delivery_register->ChildWt1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
<span<?php echo $patient_ot_delivery_register->ChildWt1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildWt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildDay1->Visible) { // ChildDay1 ?>
		<td<?php echo $patient_ot_delivery_register->ChildDay1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
<span<?php echo $patient_ot_delivery_register->ChildDay1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildOE1->Visible) { // ChildOE1 ?>
		<td<?php echo $patient_ot_delivery_register->ChildOE1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
<span<?php echo $patient_ot_delivery_register->ChildOE1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildOE1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
		<td<?php echo $patient_ot_delivery_register->ChildBlGrp1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
<span<?php echo $patient_ot_delivery_register->ChildBlGrp1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ChildBlGrp1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ApgarScore1->Visible) { // ApgarScore1 ?>
		<td<?php echo $patient_ot_delivery_register->ApgarScore1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
<span<?php echo $patient_ot_delivery_register->ApgarScore1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ApgarScore1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->birthnotification1->Visible) { // birthnotification1 ?>
		<td<?php echo $patient_ot_delivery_register->birthnotification1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
<span<?php echo $patient_ot_delivery_register->birthnotification1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->birthnotification1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->formno1->Visible) { // formno1 ?>
		<td<?php echo $patient_ot_delivery_register->formno1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
<span<?php echo $patient_ot_delivery_register->formno1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->formno1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecievedTime->Visible) { // RecievedTime ?>
		<td<?php echo $patient_ot_delivery_register->RecievedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
<span<?php echo $patient_ot_delivery_register->RecievedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecievedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<td<?php echo $patient_ot_delivery_register->surgeryStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
<span<?php echo $patient_ot_delivery_register->surgeryStarted->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<td<?php echo $patient_ot_delivery_register->surgeryEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
<span<?php echo $patient_ot_delivery_register->surgeryEnded->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->surgeryEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<td<?php echo $patient_ot_delivery_register->RecoveryTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
<span<?php echo $patient_ot_delivery_register->RecoveryTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->RecoveryTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<td<?php echo $patient_ot_delivery_register->ShiftedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
<span<?php echo $patient_ot_delivery_register->ShiftedTime->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ShiftedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Duration->Visible) { // Duration ?>
		<td<?php echo $patient_ot_delivery_register->Duration->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
<span<?php echo $patient_ot_delivery_register->Duration->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Surgeon->Visible) { // Surgeon ?>
		<td<?php echo $patient_ot_delivery_register->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
<span<?php echo $patient_ot_delivery_register->Surgeon->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<td<?php echo $patient_ot_delivery_register->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
<span<?php echo $patient_ot_delivery_register->Anaesthetist->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Anaesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td<?php echo $patient_ot_delivery_register->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td<?php echo $patient_ot_delivery_register->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
<span<?php echo $patient_ot_delivery_register->AsstSurgeon2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->paediatric->Visible) { // paediatric ?>
		<td<?php echo $patient_ot_delivery_register->paediatric->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
<span<?php echo $patient_ot_delivery_register->paediatric->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->paediatric->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td<?php echo $patient_ot_delivery_register->ScrubNurse1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
<span<?php echo $patient_ot_delivery_register->ScrubNurse1->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td<?php echo $patient_ot_delivery_register->ScrubNurse2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
<span<?php echo $patient_ot_delivery_register->ScrubNurse2->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->FloorNurse->Visible) { // FloorNurse ?>
		<td<?php echo $patient_ot_delivery_register->FloorNurse->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
<span<?php echo $patient_ot_delivery_register->FloorNurse->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->FloorNurse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Technician->Visible) { // Technician ?>
		<td<?php echo $patient_ot_delivery_register->Technician->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
<span<?php echo $patient_ot_delivery_register->Technician->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Technician->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<td<?php echo $patient_ot_delivery_register->HouseKeeping->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
<span<?php echo $patient_ot_delivery_register->HouseKeeping->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->HouseKeeping->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td<?php echo $patient_ot_delivery_register->countsCheckedMops->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
<span<?php echo $patient_ot_delivery_register->countsCheckedMops->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->gauze->Visible) { // gauze ?>
		<td<?php echo $patient_ot_delivery_register->gauze->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
<span<?php echo $patient_ot_delivery_register->gauze->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->gauze->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->needles->Visible) { // needles ?>
		<td<?php echo $patient_ot_delivery_register->needles->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
<span<?php echo $patient_ot_delivery_register->needles->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->needles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodloss->Visible) { // bloodloss ?>
		<td<?php echo $patient_ot_delivery_register->bloodloss->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
<span<?php echo $patient_ot_delivery_register->bloodloss->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodloss->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td<?php echo $patient_ot_delivery_register->bloodtransfusion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
<span<?php echo $patient_ot_delivery_register->bloodtransfusion->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_ot_delivery_register->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
<span<?php echo $patient_ot_delivery_register->Reception->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_delivery_register->PId->Visible) { // PId ?>
		<td<?php echo $patient_ot_delivery_register->PId->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_delivery_register_delete->RowCnt ?>_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
<span<?php echo $patient_ot_delivery_register->PId->viewAttributes() ?>>
<?php echo $patient_ot_delivery_register->PId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_ot_delivery_register_delete->Recordset->moveNext();
}
$patient_ot_delivery_register_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_ot_delivery_register_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_ot_delivery_register_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_ot_delivery_register_delete->terminate();
?>