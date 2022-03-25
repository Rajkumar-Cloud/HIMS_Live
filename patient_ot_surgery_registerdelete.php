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
$patient_ot_surgery_register_delete = new patient_ot_surgery_register_delete();

// Run the page
$patient_ot_surgery_register_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_ot_surgery_register_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_ot_surgery_registerdelete = currentForm = new ew.Form("fpatient_ot_surgery_registerdelete", "delete");

// Form_CustomValidate event
fpatient_ot_surgery_registerdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_ot_surgery_registerdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_ot_surgery_registerdelete.lists["x_Surgeon"] = <?php echo $patient_ot_surgery_register_delete->Surgeon->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerdelete.lists["x_Surgeon"].options = <?php echo JsonEncode($patient_ot_surgery_register_delete->Surgeon->lookupOptions()) ?>;
fpatient_ot_surgery_registerdelete.lists["x_Anaesthetist"] = <?php echo $patient_ot_surgery_register_delete->Anaesthetist->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerdelete.lists["x_Anaesthetist"].options = <?php echo JsonEncode($patient_ot_surgery_register_delete->Anaesthetist->lookupOptions()) ?>;
fpatient_ot_surgery_registerdelete.lists["x_AsstSurgeon1"] = <?php echo $patient_ot_surgery_register_delete->AsstSurgeon1->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerdelete.lists["x_AsstSurgeon1"].options = <?php echo JsonEncode($patient_ot_surgery_register_delete->AsstSurgeon1->lookupOptions()) ?>;
fpatient_ot_surgery_registerdelete.lists["x_AsstSurgeon2"] = <?php echo $patient_ot_surgery_register_delete->AsstSurgeon2->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerdelete.lists["x_AsstSurgeon2"].options = <?php echo JsonEncode($patient_ot_surgery_register_delete->AsstSurgeon2->lookupOptions()) ?>;
fpatient_ot_surgery_registerdelete.lists["x_paediatric"] = <?php echo $patient_ot_surgery_register_delete->paediatric->Lookup->toClientList() ?>;
fpatient_ot_surgery_registerdelete.lists["x_paediatric"].options = <?php echo JsonEncode($patient_ot_surgery_register_delete->paediatric->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_ot_surgery_register_delete->showPageHeader(); ?>
<?php
$patient_ot_surgery_register_delete->showMessage();
?>
<form name="fpatient_ot_surgery_registerdelete" id="fpatient_ot_surgery_registerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_ot_surgery_register_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_ot_surgery_register_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_ot_surgery_register_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_ot_surgery_register->id->Visible) { // id ?>
		<th class="<?php echo $patient_ot_surgery_register->id->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_id" class="patient_ot_surgery_register_id"><?php echo $patient_ot_surgery_register->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_ot_surgery_register->PatID->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PatID" class="patient_ot_surgery_register_PatID"><?php echo $patient_ot_surgery_register->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_ot_surgery_register->PatientName->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_register_PatientName"><?php echo $patient_ot_surgery_register->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_ot_surgery_register->mrnno->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_register_mrnno"><?php echo $patient_ot_surgery_register->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_ot_surgery_register->MobileNumber->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_register_MobileNumber"><?php echo $patient_ot_surgery_register->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_ot_surgery_register->Age->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Age" class="patient_ot_surgery_register_Age"><?php echo $patient_ot_surgery_register->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_ot_surgery_register->Gender->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Gender" class="patient_ot_surgery_register_Gender"><?php echo $patient_ot_surgery_register->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecievedTime->Visible) { // RecievedTime ?>
		<th class="<?php echo $patient_ot_surgery_register->RecievedTime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_register_RecievedTime"><?php echo $patient_ot_surgery_register->RecievedTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<th class="<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_register_AnaesthesiaStarted"><?php echo $patient_ot_surgery_register->AnaesthesiaStarted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<th class="<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_register_AnaesthesiaEnded"><?php echo $patient_ot_surgery_register->AnaesthesiaEnded->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<th class="<?php echo $patient_ot_surgery_register->surgeryStarted->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_register_surgeryStarted"><?php echo $patient_ot_surgery_register->surgeryStarted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<th class="<?php echo $patient_ot_surgery_register->surgeryEnded->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_register_surgeryEnded"><?php echo $patient_ot_surgery_register->surgeryEnded->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<th class="<?php echo $patient_ot_surgery_register->RecoveryTime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_register_RecoveryTime"><?php echo $patient_ot_surgery_register->RecoveryTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<th class="<?php echo $patient_ot_surgery_register->ShiftedTime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_register_ShiftedTime"><?php echo $patient_ot_surgery_register->ShiftedTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->Duration->Visible) { // Duration ?>
		<th class="<?php echo $patient_ot_surgery_register->Duration->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Duration" class="patient_ot_surgery_register_Duration"><?php echo $patient_ot_surgery_register->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->Surgeon->Visible) { // Surgeon ?>
		<th class="<?php echo $patient_ot_surgery_register->Surgeon->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_register_Surgeon"><?php echo $patient_ot_surgery_register->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<th class="<?php echo $patient_ot_surgery_register->Anaesthetist->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_register_Anaesthetist"><?php echo $patient_ot_surgery_register->Anaesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<th class="<?php echo $patient_ot_surgery_register->AsstSurgeon1->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_register_AsstSurgeon1"><?php echo $patient_ot_surgery_register->AsstSurgeon1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<th class="<?php echo $patient_ot_surgery_register->AsstSurgeon2->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_register_AsstSurgeon2"><?php echo $patient_ot_surgery_register->AsstSurgeon2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->paediatric->Visible) { // paediatric ?>
		<th class="<?php echo $patient_ot_surgery_register->paediatric->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_register_paediatric"><?php echo $patient_ot_surgery_register->paediatric->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<th class="<?php echo $patient_ot_surgery_register->ScrubNurse1->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_register_ScrubNurse1"><?php echo $patient_ot_surgery_register->ScrubNurse1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<th class="<?php echo $patient_ot_surgery_register->ScrubNurse2->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_register_ScrubNurse2"><?php echo $patient_ot_surgery_register->ScrubNurse2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->FloorNurse->Visible) { // FloorNurse ?>
		<th class="<?php echo $patient_ot_surgery_register->FloorNurse->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_register_FloorNurse"><?php echo $patient_ot_surgery_register->FloorNurse->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->Technician->Visible) { // Technician ?>
		<th class="<?php echo $patient_ot_surgery_register->Technician->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Technician" class="patient_ot_surgery_register_Technician"><?php echo $patient_ot_surgery_register->Technician->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<th class="<?php echo $patient_ot_surgery_register->HouseKeeping->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_register_HouseKeeping"><?php echo $patient_ot_surgery_register->HouseKeeping->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<th class="<?php echo $patient_ot_surgery_register->countsCheckedMops->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_register_countsCheckedMops"><?php echo $patient_ot_surgery_register->countsCheckedMops->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->gauze->Visible) { // gauze ?>
		<th class="<?php echo $patient_ot_surgery_register->gauze->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_gauze" class="patient_ot_surgery_register_gauze"><?php echo $patient_ot_surgery_register->gauze->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->needles->Visible) { // needles ?>
		<th class="<?php echo $patient_ot_surgery_register->needles->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_needles" class="patient_ot_surgery_register_needles"><?php echo $patient_ot_surgery_register->needles->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodloss->Visible) { // bloodloss ?>
		<th class="<?php echo $patient_ot_surgery_register->bloodloss->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_register_bloodloss"><?php echo $patient_ot_surgery_register->bloodloss->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<th class="<?php echo $patient_ot_surgery_register->bloodtransfusion->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_register_bloodtransfusion"><?php echo $patient_ot_surgery_register->bloodtransfusion->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->status->Visible) { // status ?>
		<th class="<?php echo $patient_ot_surgery_register->status->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_status" class="patient_ot_surgery_register_status"><?php echo $patient_ot_surgery_register->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_ot_surgery_register->createdby->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_createdby" class="patient_ot_surgery_register_createdby"><?php echo $patient_ot_surgery_register->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_ot_surgery_register->createddatetime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_createddatetime" class="patient_ot_surgery_register_createddatetime"><?php echo $patient_ot_surgery_register->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_ot_surgery_register->modifiedby->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_modifiedby" class="patient_ot_surgery_register_modifiedby"><?php echo $patient_ot_surgery_register->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_ot_surgery_register->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_modifieddatetime" class="patient_ot_surgery_register_modifieddatetime"><?php echo $patient_ot_surgery_register->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_ot_surgery_register->HospID->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_HospID" class="patient_ot_surgery_register_HospID"><?php echo $patient_ot_surgery_register->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_ot_surgery_register->Reception->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Reception" class="patient_ot_surgery_register_Reception"><?php echo $patient_ot_surgery_register->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $patient_ot_surgery_register->PatientID->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_register_PatientID"><?php echo $patient_ot_surgery_register->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register->PId->Visible) { // PId ?>
		<th class="<?php echo $patient_ot_surgery_register->PId->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PId" class="patient_ot_surgery_register_PId"><?php echo $patient_ot_surgery_register->PId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_ot_surgery_register_delete->RecCnt = 0;
$i = 0;
while (!$patient_ot_surgery_register_delete->Recordset->EOF) {
	$patient_ot_surgery_register_delete->RecCnt++;
	$patient_ot_surgery_register_delete->RowCnt++;

	// Set row properties
	$patient_ot_surgery_register->resetAttributes();
	$patient_ot_surgery_register->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_ot_surgery_register_delete->loadRowValues($patient_ot_surgery_register_delete->Recordset);

	// Render row
	$patient_ot_surgery_register_delete->renderRow();
?>
	<tr<?php echo $patient_ot_surgery_register->rowAttributes() ?>>
<?php if ($patient_ot_surgery_register->id->Visible) { // id ?>
		<td<?php echo $patient_ot_surgery_register->id->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_id" class="patient_ot_surgery_register_id">
<span<?php echo $patient_ot_surgery_register->id->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_ot_surgery_register->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_PatID" class="patient_ot_surgery_register_PatID">
<span<?php echo $patient_ot_surgery_register->PatID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_ot_surgery_register->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_register_PatientName">
<span<?php echo $patient_ot_surgery_register->PatientName->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_ot_surgery_register->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_register_mrnno">
<span<?php echo $patient_ot_surgery_register->mrnno->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_ot_surgery_register->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_register_MobileNumber">
<span<?php echo $patient_ot_surgery_register->MobileNumber->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Age->Visible) { // Age ?>
		<td<?php echo $patient_ot_surgery_register->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_Age" class="patient_ot_surgery_register_Age">
<span<?php echo $patient_ot_surgery_register->Age->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_ot_surgery_register->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_Gender" class="patient_ot_surgery_register_Gender">
<span<?php echo $patient_ot_surgery_register->Gender->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecievedTime->Visible) { // RecievedTime ?>
		<td<?php echo $patient_ot_surgery_register->RecievedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_register_RecievedTime">
<span<?php echo $patient_ot_surgery_register->RecievedTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->RecievedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryStarted->Visible) { // surgeryStarted ?>
		<td<?php echo $patient_ot_surgery_register->surgeryStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_register_surgeryStarted">
<span<?php echo $patient_ot_surgery_register->surgeryStarted->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->surgeryStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->surgeryEnded->Visible) { // surgeryEnded ?>
		<td<?php echo $patient_ot_surgery_register->surgeryEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_register_surgeryEnded">
<span<?php echo $patient_ot_surgery_register->surgeryEnded->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->surgeryEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->RecoveryTime->Visible) { // RecoveryTime ?>
		<td<?php echo $patient_ot_surgery_register->RecoveryTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_register_RecoveryTime">
<span<?php echo $patient_ot_surgery_register->RecoveryTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->RecoveryTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->ShiftedTime->Visible) { // ShiftedTime ?>
		<td<?php echo $patient_ot_surgery_register->ShiftedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_register_ShiftedTime">
<span<?php echo $patient_ot_surgery_register->ShiftedTime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ShiftedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Duration->Visible) { // Duration ?>
		<td<?php echo $patient_ot_surgery_register->Duration->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_Duration" class="patient_ot_surgery_register_Duration">
<span<?php echo $patient_ot_surgery_register->Duration->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Surgeon->Visible) { // Surgeon ?>
		<td<?php echo $patient_ot_surgery_register->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_register_Surgeon">
<span<?php echo $patient_ot_surgery_register->Surgeon->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Anaesthetist->Visible) { // Anaesthetist ?>
		<td<?php echo $patient_ot_surgery_register->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_register_Anaesthetist">
<span<?php echo $patient_ot_surgery_register->Anaesthetist->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Anaesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td<?php echo $patient_ot_surgery_register->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_register_AsstSurgeon1">
<span<?php echo $patient_ot_surgery_register->AsstSurgeon1->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td<?php echo $patient_ot_surgery_register->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_register_AsstSurgeon2">
<span<?php echo $patient_ot_surgery_register->AsstSurgeon2->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->paediatric->Visible) { // paediatric ?>
		<td<?php echo $patient_ot_surgery_register->paediatric->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_register_paediatric">
<span<?php echo $patient_ot_surgery_register->paediatric->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->paediatric->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td<?php echo $patient_ot_surgery_register->ScrubNurse1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_register_ScrubNurse1">
<span<?php echo $patient_ot_surgery_register->ScrubNurse1->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td<?php echo $patient_ot_surgery_register->ScrubNurse2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_register_ScrubNurse2">
<span<?php echo $patient_ot_surgery_register->ScrubNurse2->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->FloorNurse->Visible) { // FloorNurse ?>
		<td<?php echo $patient_ot_surgery_register->FloorNurse->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_register_FloorNurse">
<span<?php echo $patient_ot_surgery_register->FloorNurse->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->FloorNurse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Technician->Visible) { // Technician ?>
		<td<?php echo $patient_ot_surgery_register->Technician->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_Technician" class="patient_ot_surgery_register_Technician">
<span<?php echo $patient_ot_surgery_register->Technician->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Technician->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->HouseKeeping->Visible) { // HouseKeeping ?>
		<td<?php echo $patient_ot_surgery_register->HouseKeeping->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_register_HouseKeeping">
<span<?php echo $patient_ot_surgery_register->HouseKeeping->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->HouseKeeping->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td<?php echo $patient_ot_surgery_register->countsCheckedMops->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_register_countsCheckedMops">
<span<?php echo $patient_ot_surgery_register->countsCheckedMops->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->gauze->Visible) { // gauze ?>
		<td<?php echo $patient_ot_surgery_register->gauze->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_gauze" class="patient_ot_surgery_register_gauze">
<span<?php echo $patient_ot_surgery_register->gauze->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->gauze->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->needles->Visible) { // needles ?>
		<td<?php echo $patient_ot_surgery_register->needles->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_needles" class="patient_ot_surgery_register_needles">
<span<?php echo $patient_ot_surgery_register->needles->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->needles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodloss->Visible) { // bloodloss ?>
		<td<?php echo $patient_ot_surgery_register->bloodloss->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_register_bloodloss">
<span<?php echo $patient_ot_surgery_register->bloodloss->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->bloodloss->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td<?php echo $patient_ot_surgery_register->bloodtransfusion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_register_bloodtransfusion">
<span<?php echo $patient_ot_surgery_register->bloodtransfusion->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->status->Visible) { // status ?>
		<td<?php echo $patient_ot_surgery_register->status->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_status" class="patient_ot_surgery_register_status">
<span<?php echo $patient_ot_surgery_register->status->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_ot_surgery_register->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_createdby" class="patient_ot_surgery_register_createdby">
<span<?php echo $patient_ot_surgery_register->createdby->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_ot_surgery_register->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_createddatetime" class="patient_ot_surgery_register_createddatetime">
<span<?php echo $patient_ot_surgery_register->createddatetime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_ot_surgery_register->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_modifiedby" class="patient_ot_surgery_register_modifiedby">
<span<?php echo $patient_ot_surgery_register->modifiedby->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_ot_surgery_register->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_modifieddatetime" class="patient_ot_surgery_register_modifieddatetime">
<span<?php echo $patient_ot_surgery_register->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_ot_surgery_register->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_HospID" class="patient_ot_surgery_register_HospID">
<span<?php echo $patient_ot_surgery_register->HospID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_ot_surgery_register->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_Reception" class="patient_ot_surgery_register_Reception">
<span<?php echo $patient_ot_surgery_register->Reception->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PatientID->Visible) { // PatientID ?>
		<td<?php echo $patient_ot_surgery_register->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_register_PatientID">
<span<?php echo $patient_ot_surgery_register->PatientID->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register->PId->Visible) { // PId ?>
		<td<?php echo $patient_ot_surgery_register->PId->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCnt ?>_patient_ot_surgery_register_PId" class="patient_ot_surgery_register_PId">
<span<?php echo $patient_ot_surgery_register->PId->viewAttributes() ?>>
<?php echo $patient_ot_surgery_register->PId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_ot_surgery_register_delete->Recordset->moveNext();
}
$patient_ot_surgery_register_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_ot_surgery_register_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_ot_surgery_register_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_ot_surgery_register_delete->terminate();
?>