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
<?php include_once "header.php"; ?>
<script>
var fpatient_ot_surgery_registerdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_ot_surgery_registerdelete = currentForm = new ew.Form("fpatient_ot_surgery_registerdelete", "delete");
	loadjs.done("fpatient_ot_surgery_registerdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_ot_surgery_register_delete->showPageHeader(); ?>
<?php
$patient_ot_surgery_register_delete->showMessage();
?>
<form name="fpatient_ot_surgery_registerdelete" id="fpatient_ot_surgery_registerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_ot_surgery_register_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_ot_surgery_register_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->id->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_id" class="patient_ot_surgery_register_id"><?php echo $patient_ot_surgery_register_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->PatID->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PatID" class="patient_ot_surgery_register_PatID"><?php echo $patient_ot_surgery_register_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_register_PatientName"><?php echo $patient_ot_surgery_register_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_register_mrnno"><?php echo $patient_ot_surgery_register_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->MobileNumber->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_register_MobileNumber"><?php echo $patient_ot_surgery_register_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->Age->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Age" class="patient_ot_surgery_register_Age"><?php echo $patient_ot_surgery_register_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->Gender->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Gender" class="patient_ot_surgery_register_Gender"><?php echo $patient_ot_surgery_register_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->RecievedTime->Visible) { // RecievedTime ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->RecievedTime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_register_RecievedTime"><?php echo $patient_ot_surgery_register_delete->RecievedTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->AnaesthesiaStarted->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_register_AnaesthesiaStarted"><?php echo $patient_ot_surgery_register_delete->AnaesthesiaStarted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->AnaesthesiaEnded->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_register_AnaesthesiaEnded"><?php echo $patient_ot_surgery_register_delete->AnaesthesiaEnded->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->surgeryStarted->Visible) { // surgeryStarted ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->surgeryStarted->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_register_surgeryStarted"><?php echo $patient_ot_surgery_register_delete->surgeryStarted->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->surgeryEnded->Visible) { // surgeryEnded ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->surgeryEnded->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_register_surgeryEnded"><?php echo $patient_ot_surgery_register_delete->surgeryEnded->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->RecoveryTime->Visible) { // RecoveryTime ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->RecoveryTime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_register_RecoveryTime"><?php echo $patient_ot_surgery_register_delete->RecoveryTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->ShiftedTime->Visible) { // ShiftedTime ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->ShiftedTime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_register_ShiftedTime"><?php echo $patient_ot_surgery_register_delete->ShiftedTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Duration->Visible) { // Duration ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->Duration->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Duration" class="patient_ot_surgery_register_Duration"><?php echo $patient_ot_surgery_register_delete->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Surgeon->Visible) { // Surgeon ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->Surgeon->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_register_Surgeon"><?php echo $patient_ot_surgery_register_delete->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Anaesthetist->Visible) { // Anaesthetist ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->Anaesthetist->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_register_Anaesthetist"><?php echo $patient_ot_surgery_register_delete->Anaesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->AsstSurgeon1->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_register_AsstSurgeon1"><?php echo $patient_ot_surgery_register_delete->AsstSurgeon1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->AsstSurgeon2->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_register_AsstSurgeon2"><?php echo $patient_ot_surgery_register_delete->AsstSurgeon2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->paediatric->Visible) { // paediatric ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->paediatric->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_register_paediatric"><?php echo $patient_ot_surgery_register_delete->paediatric->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->ScrubNurse1->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_register_ScrubNurse1"><?php echo $patient_ot_surgery_register_delete->ScrubNurse1->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->ScrubNurse2->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_register_ScrubNurse2"><?php echo $patient_ot_surgery_register_delete->ScrubNurse2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->FloorNurse->Visible) { // FloorNurse ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->FloorNurse->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_register_FloorNurse"><?php echo $patient_ot_surgery_register_delete->FloorNurse->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Technician->Visible) { // Technician ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->Technician->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Technician" class="patient_ot_surgery_register_Technician"><?php echo $patient_ot_surgery_register_delete->Technician->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->HouseKeeping->Visible) { // HouseKeeping ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->HouseKeeping->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_register_HouseKeeping"><?php echo $patient_ot_surgery_register_delete->HouseKeeping->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->countsCheckedMops->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_register_countsCheckedMops"><?php echo $patient_ot_surgery_register_delete->countsCheckedMops->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->gauze->Visible) { // gauze ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->gauze->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_gauze" class="patient_ot_surgery_register_gauze"><?php echo $patient_ot_surgery_register_delete->gauze->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->needles->Visible) { // needles ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->needles->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_needles" class="patient_ot_surgery_register_needles"><?php echo $patient_ot_surgery_register_delete->needles->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->bloodloss->Visible) { // bloodloss ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->bloodloss->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_register_bloodloss"><?php echo $patient_ot_surgery_register_delete->bloodloss->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->bloodtransfusion->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_register_bloodtransfusion"><?php echo $patient_ot_surgery_register_delete->bloodtransfusion->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->status->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_status" class="patient_ot_surgery_register_status"><?php echo $patient_ot_surgery_register_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->createdby->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_createdby" class="patient_ot_surgery_register_createdby"><?php echo $patient_ot_surgery_register_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->createddatetime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_createddatetime" class="patient_ot_surgery_register_createddatetime"><?php echo $patient_ot_surgery_register_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->modifiedby->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_modifiedby" class="patient_ot_surgery_register_modifiedby"><?php echo $patient_ot_surgery_register_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_modifieddatetime" class="patient_ot_surgery_register_modifieddatetime"><?php echo $patient_ot_surgery_register_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->HospID->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_HospID" class="patient_ot_surgery_register_HospID"><?php echo $patient_ot_surgery_register_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->Reception->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_Reception" class="patient_ot_surgery_register_Reception"><?php echo $patient_ot_surgery_register_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->PatientID->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_register_PatientID"><?php echo $patient_ot_surgery_register_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PId->Visible) { // PId ?>
		<th class="<?php echo $patient_ot_surgery_register_delete->PId->headerCellClass() ?>"><span id="elh_patient_ot_surgery_register_PId" class="patient_ot_surgery_register_PId"><?php echo $patient_ot_surgery_register_delete->PId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_ot_surgery_register_delete->RecordCount = 0;
$i = 0;
while (!$patient_ot_surgery_register_delete->Recordset->EOF) {
	$patient_ot_surgery_register_delete->RecordCount++;
	$patient_ot_surgery_register_delete->RowCount++;

	// Set row properties
	$patient_ot_surgery_register->resetAttributes();
	$patient_ot_surgery_register->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_ot_surgery_register_delete->loadRowValues($patient_ot_surgery_register_delete->Recordset);

	// Render row
	$patient_ot_surgery_register_delete->renderRow();
?>
	<tr <?php echo $patient_ot_surgery_register->rowAttributes() ?>>
<?php if ($patient_ot_surgery_register_delete->id->Visible) { // id ?>
		<td <?php echo $patient_ot_surgery_register_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_id" class="patient_ot_surgery_register_id">
<span<?php echo $patient_ot_surgery_register_delete->id->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_ot_surgery_register_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_PatID" class="patient_ot_surgery_register_PatID">
<span<?php echo $patient_ot_surgery_register_delete->PatID->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_ot_surgery_register_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_PatientName" class="patient_ot_surgery_register_PatientName">
<span<?php echo $patient_ot_surgery_register_delete->PatientName->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_ot_surgery_register_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_mrnno" class="patient_ot_surgery_register_mrnno">
<span<?php echo $patient_ot_surgery_register_delete->mrnno->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $patient_ot_surgery_register_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_MobileNumber" class="patient_ot_surgery_register_MobileNumber">
<span<?php echo $patient_ot_surgery_register_delete->MobileNumber->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_ot_surgery_register_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_Age" class="patient_ot_surgery_register_Age">
<span<?php echo $patient_ot_surgery_register_delete->Age->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_ot_surgery_register_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_Gender" class="patient_ot_surgery_register_Gender">
<span<?php echo $patient_ot_surgery_register_delete->Gender->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->RecievedTime->Visible) { // RecievedTime ?>
		<td <?php echo $patient_ot_surgery_register_delete->RecievedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_RecievedTime" class="patient_ot_surgery_register_RecievedTime">
<span<?php echo $patient_ot_surgery_register_delete->RecievedTime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->RecievedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
		<td <?php echo $patient_ot_surgery_register_delete->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_AnaesthesiaStarted" class="patient_ot_surgery_register_AnaesthesiaStarted">
<span<?php echo $patient_ot_surgery_register_delete->AnaesthesiaStarted->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
		<td <?php echo $patient_ot_surgery_register_delete->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_AnaesthesiaEnded" class="patient_ot_surgery_register_AnaesthesiaEnded">
<span<?php echo $patient_ot_surgery_register_delete->AnaesthesiaEnded->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->surgeryStarted->Visible) { // surgeryStarted ?>
		<td <?php echo $patient_ot_surgery_register_delete->surgeryStarted->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_surgeryStarted" class="patient_ot_surgery_register_surgeryStarted">
<span<?php echo $patient_ot_surgery_register_delete->surgeryStarted->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->surgeryStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->surgeryEnded->Visible) { // surgeryEnded ?>
		<td <?php echo $patient_ot_surgery_register_delete->surgeryEnded->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_surgeryEnded" class="patient_ot_surgery_register_surgeryEnded">
<span<?php echo $patient_ot_surgery_register_delete->surgeryEnded->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->surgeryEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->RecoveryTime->Visible) { // RecoveryTime ?>
		<td <?php echo $patient_ot_surgery_register_delete->RecoveryTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_RecoveryTime" class="patient_ot_surgery_register_RecoveryTime">
<span<?php echo $patient_ot_surgery_register_delete->RecoveryTime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->RecoveryTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->ShiftedTime->Visible) { // ShiftedTime ?>
		<td <?php echo $patient_ot_surgery_register_delete->ShiftedTime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_ShiftedTime" class="patient_ot_surgery_register_ShiftedTime">
<span<?php echo $patient_ot_surgery_register_delete->ShiftedTime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->ShiftedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Duration->Visible) { // Duration ?>
		<td <?php echo $patient_ot_surgery_register_delete->Duration->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_Duration" class="patient_ot_surgery_register_Duration">
<span<?php echo $patient_ot_surgery_register_delete->Duration->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Surgeon->Visible) { // Surgeon ?>
		<td <?php echo $patient_ot_surgery_register_delete->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_Surgeon" class="patient_ot_surgery_register_Surgeon">
<span<?php echo $patient_ot_surgery_register_delete->Surgeon->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Anaesthetist->Visible) { // Anaesthetist ?>
		<td <?php echo $patient_ot_surgery_register_delete->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_Anaesthetist" class="patient_ot_surgery_register_Anaesthetist">
<span<?php echo $patient_ot_surgery_register_delete->Anaesthetist->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->Anaesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
		<td <?php echo $patient_ot_surgery_register_delete->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_AsstSurgeon1" class="patient_ot_surgery_register_AsstSurgeon1">
<span<?php echo $patient_ot_surgery_register_delete->AsstSurgeon1->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
		<td <?php echo $patient_ot_surgery_register_delete->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_AsstSurgeon2" class="patient_ot_surgery_register_AsstSurgeon2">
<span<?php echo $patient_ot_surgery_register_delete->AsstSurgeon2->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->paediatric->Visible) { // paediatric ?>
		<td <?php echo $patient_ot_surgery_register_delete->paediatric->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_paediatric" class="patient_ot_surgery_register_paediatric">
<span<?php echo $patient_ot_surgery_register_delete->paediatric->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->paediatric->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->ScrubNurse1->Visible) { // ScrubNurse1 ?>
		<td <?php echo $patient_ot_surgery_register_delete->ScrubNurse1->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_ScrubNurse1" class="patient_ot_surgery_register_ScrubNurse1">
<span<?php echo $patient_ot_surgery_register_delete->ScrubNurse1->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->ScrubNurse2->Visible) { // ScrubNurse2 ?>
		<td <?php echo $patient_ot_surgery_register_delete->ScrubNurse2->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_ScrubNurse2" class="patient_ot_surgery_register_ScrubNurse2">
<span<?php echo $patient_ot_surgery_register_delete->ScrubNurse2->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->FloorNurse->Visible) { // FloorNurse ?>
		<td <?php echo $patient_ot_surgery_register_delete->FloorNurse->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_FloorNurse" class="patient_ot_surgery_register_FloorNurse">
<span<?php echo $patient_ot_surgery_register_delete->FloorNurse->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->FloorNurse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Technician->Visible) { // Technician ?>
		<td <?php echo $patient_ot_surgery_register_delete->Technician->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_Technician" class="patient_ot_surgery_register_Technician">
<span<?php echo $patient_ot_surgery_register_delete->Technician->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->Technician->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->HouseKeeping->Visible) { // HouseKeeping ?>
		<td <?php echo $patient_ot_surgery_register_delete->HouseKeeping->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_HouseKeeping" class="patient_ot_surgery_register_HouseKeeping">
<span<?php echo $patient_ot_surgery_register_delete->HouseKeeping->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->HouseKeeping->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->countsCheckedMops->Visible) { // countsCheckedMops ?>
		<td <?php echo $patient_ot_surgery_register_delete->countsCheckedMops->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_countsCheckedMops" class="patient_ot_surgery_register_countsCheckedMops">
<span<?php echo $patient_ot_surgery_register_delete->countsCheckedMops->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->gauze->Visible) { // gauze ?>
		<td <?php echo $patient_ot_surgery_register_delete->gauze->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_gauze" class="patient_ot_surgery_register_gauze">
<span<?php echo $patient_ot_surgery_register_delete->gauze->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->gauze->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->needles->Visible) { // needles ?>
		<td <?php echo $patient_ot_surgery_register_delete->needles->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_needles" class="patient_ot_surgery_register_needles">
<span<?php echo $patient_ot_surgery_register_delete->needles->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->needles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->bloodloss->Visible) { // bloodloss ?>
		<td <?php echo $patient_ot_surgery_register_delete->bloodloss->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_bloodloss" class="patient_ot_surgery_register_bloodloss">
<span<?php echo $patient_ot_surgery_register_delete->bloodloss->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->bloodloss->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->bloodtransfusion->Visible) { // bloodtransfusion ?>
		<td <?php echo $patient_ot_surgery_register_delete->bloodtransfusion->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_bloodtransfusion" class="patient_ot_surgery_register_bloodtransfusion">
<span<?php echo $patient_ot_surgery_register_delete->bloodtransfusion->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->status->Visible) { // status ?>
		<td <?php echo $patient_ot_surgery_register_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_status" class="patient_ot_surgery_register_status">
<span<?php echo $patient_ot_surgery_register_delete->status->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $patient_ot_surgery_register_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_createdby" class="patient_ot_surgery_register_createdby">
<span<?php echo $patient_ot_surgery_register_delete->createdby->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $patient_ot_surgery_register_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_createddatetime" class="patient_ot_surgery_register_createddatetime">
<span<?php echo $patient_ot_surgery_register_delete->createddatetime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $patient_ot_surgery_register_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_modifiedby" class="patient_ot_surgery_register_modifiedby">
<span<?php echo $patient_ot_surgery_register_delete->modifiedby->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $patient_ot_surgery_register_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_modifieddatetime" class="patient_ot_surgery_register_modifieddatetime">
<span<?php echo $patient_ot_surgery_register_delete->modifieddatetime->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_ot_surgery_register_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_HospID" class="patient_ot_surgery_register_HospID">
<span<?php echo $patient_ot_surgery_register_delete->HospID->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_ot_surgery_register_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_Reception" class="patient_ot_surgery_register_Reception">
<span<?php echo $patient_ot_surgery_register_delete->Reception->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $patient_ot_surgery_register_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_PatientID" class="patient_ot_surgery_register_PatientID">
<span<?php echo $patient_ot_surgery_register_delete->PatientID->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_ot_surgery_register_delete->PId->Visible) { // PId ?>
		<td <?php echo $patient_ot_surgery_register_delete->PId->cellAttributes() ?>>
<span id="el<?php echo $patient_ot_surgery_register_delete->RowCount ?>_patient_ot_surgery_register_PId" class="patient_ot_surgery_register_PId">
<span<?php echo $patient_ot_surgery_register_delete->PId->viewAttributes() ?>><?php echo $patient_ot_surgery_register_delete->PId->getViewValue() ?></span>
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
$patient_ot_surgery_register_delete->terminate();
?>