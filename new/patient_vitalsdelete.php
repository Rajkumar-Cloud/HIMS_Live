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
$patient_vitals_delete = new patient_vitals_delete();

// Run the page
$patient_vitals_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_vitals_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_vitalsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_vitalsdelete = currentForm = new ew.Form("fpatient_vitalsdelete", "delete");
	loadjs.done("fpatient_vitalsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_vitals_delete->showPageHeader(); ?>
<?php
$patient_vitals_delete->showMessage();
?>
<form name="fpatient_vitalsdelete" id="fpatient_vitalsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_vitals_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_vitals_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_vitals_delete->id->headerCellClass() ?>"><span id="elh_patient_vitals_id" class="patient_vitals_id"><?php echo $patient_vitals_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_vitals_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><?php echo $patient_vitals_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_vitals_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><?php echo $patient_vitals_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_vitals_delete->PatID->headerCellClass() ?>"><span id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><?php echo $patient_vitals_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_vitals_delete->MobileNumber->headerCellClass() ?>"><span id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><?php echo $patient_vitals_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->HT->Visible) { // HT ?>
		<th class="<?php echo $patient_vitals_delete->HT->headerCellClass() ?>"><span id="elh_patient_vitals_HT" class="patient_vitals_HT"><?php echo $patient_vitals_delete->HT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->WT->Visible) { // WT ?>
		<th class="<?php echo $patient_vitals_delete->WT->headerCellClass() ?>"><span id="elh_patient_vitals_WT" class="patient_vitals_WT"><?php echo $patient_vitals_delete->WT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->SurfaceArea->Visible) { // SurfaceArea ?>
		<th class="<?php echo $patient_vitals_delete->SurfaceArea->headerCellClass() ?>"><span id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><?php echo $patient_vitals_delete->SurfaceArea->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<th class="<?php echo $patient_vitals_delete->BodyMassIndex->headerCellClass() ?>"><span id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><?php echo $patient_vitals_delete->BodyMassIndex->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<th class="<?php echo $patient_vitals_delete->AnticoagulantifAny->headerCellClass() ?>"><span id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><?php echo $patient_vitals_delete->AnticoagulantifAny->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->FoodAllergies->Visible) { // FoodAllergies ?>
		<th class="<?php echo $patient_vitals_delete->FoodAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><?php echo $patient_vitals_delete->FoodAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->GenericAllergies->Visible) { // GenericAllergies ?>
		<th class="<?php echo $patient_vitals_delete->GenericAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><?php echo $patient_vitals_delete->GenericAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->GroupAllergies->Visible) { // GroupAllergies ?>
		<th class="<?php echo $patient_vitals_delete->GroupAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><?php echo $patient_vitals_delete->GroupAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->Temp->Visible) { // Temp ?>
		<th class="<?php echo $patient_vitals_delete->Temp->headerCellClass() ?>"><span id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><?php echo $patient_vitals_delete->Temp->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->Pulse->Visible) { // Pulse ?>
		<th class="<?php echo $patient_vitals_delete->Pulse->headerCellClass() ?>"><span id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><?php echo $patient_vitals_delete->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->BP->Visible) { // BP ?>
		<th class="<?php echo $patient_vitals_delete->BP->headerCellClass() ?>"><span id="elh_patient_vitals_BP" class="patient_vitals_BP"><?php echo $patient_vitals_delete->BP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->PR->Visible) { // PR ?>
		<th class="<?php echo $patient_vitals_delete->PR->headerCellClass() ?>"><span id="elh_patient_vitals_PR" class="patient_vitals_PR"><?php echo $patient_vitals_delete->PR->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->CNS->Visible) { // CNS ?>
		<th class="<?php echo $patient_vitals_delete->CNS->headerCellClass() ?>"><span id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><?php echo $patient_vitals_delete->CNS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->RSA->Visible) { // RSA ?>
		<th class="<?php echo $patient_vitals_delete->RSA->headerCellClass() ?>"><span id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><?php echo $patient_vitals_delete->RSA->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->CVS->Visible) { // CVS ?>
		<th class="<?php echo $patient_vitals_delete->CVS->headerCellClass() ?>"><span id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><?php echo $patient_vitals_delete->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->PA->Visible) { // PA ?>
		<th class="<?php echo $patient_vitals_delete->PA->headerCellClass() ?>"><span id="elh_patient_vitals_PA" class="patient_vitals_PA"><?php echo $patient_vitals_delete->PA->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->PS->Visible) { // PS ?>
		<th class="<?php echo $patient_vitals_delete->PS->headerCellClass() ?>"><span id="elh_patient_vitals_PS" class="patient_vitals_PS"><?php echo $patient_vitals_delete->PS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->PV->Visible) { // PV ?>
		<th class="<?php echo $patient_vitals_delete->PV->headerCellClass() ?>"><span id="elh_patient_vitals_PV" class="patient_vitals_PV"><?php echo $patient_vitals_delete->PV->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->clinicaldetails->Visible) { // clinicaldetails ?>
		<th class="<?php echo $patient_vitals_delete->clinicaldetails->headerCellClass() ?>"><span id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><?php echo $patient_vitals_delete->clinicaldetails->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_vitals_delete->status->headerCellClass() ?>"><span id="elh_patient_vitals_status" class="patient_vitals_status"><?php echo $patient_vitals_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_vitals_delete->createdby->headerCellClass() ?>"><span id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><?php echo $patient_vitals_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_vitals_delete->createddatetime->headerCellClass() ?>"><span id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><?php echo $patient_vitals_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_vitals_delete->modifiedby->headerCellClass() ?>"><span id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><?php echo $patient_vitals_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_vitals_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><?php echo $patient_vitals_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_vitals_delete->Age->headerCellClass() ?>"><span id="elh_patient_vitals_Age" class="patient_vitals_Age"><?php echo $patient_vitals_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_vitals_delete->Gender->headerCellClass() ?>"><span id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><?php echo $patient_vitals_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_vitals_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><?php echo $patient_vitals_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_vitals_delete->Reception->headerCellClass() ?>"><span id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><?php echo $patient_vitals_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_vitals_delete->HospID->headerCellClass() ?>"><span id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><?php echo $patient_vitals_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_vitals_delete->RecordCount = 0;
$i = 0;
while (!$patient_vitals_delete->Recordset->EOF) {
	$patient_vitals_delete->RecordCount++;
	$patient_vitals_delete->RowCount++;

	// Set row properties
	$patient_vitals->resetAttributes();
	$patient_vitals->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_vitals_delete->loadRowValues($patient_vitals_delete->Recordset);

	// Render row
	$patient_vitals_delete->renderRow();
?>
	<tr <?php echo $patient_vitals->rowAttributes() ?>>
<?php if ($patient_vitals_delete->id->Visible) { // id ?>
		<td <?php echo $patient_vitals_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_id" class="patient_vitals_id">
<span<?php echo $patient_vitals_delete->id->viewAttributes() ?>><?php echo $patient_vitals_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_vitals_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_mrnno" class="patient_vitals_mrnno">
<span<?php echo $patient_vitals_delete->mrnno->viewAttributes() ?>><?php echo $patient_vitals_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_vitals_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_PatientName" class="patient_vitals_PatientName">
<span<?php echo $patient_vitals_delete->PatientName->viewAttributes() ?>><?php echo $patient_vitals_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_vitals_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_PatID" class="patient_vitals_PatID">
<span<?php echo $patient_vitals_delete->PatID->viewAttributes() ?>><?php echo $patient_vitals_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $patient_vitals_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
<span<?php echo $patient_vitals_delete->MobileNumber->viewAttributes() ?>><?php echo $patient_vitals_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->HT->Visible) { // HT ?>
		<td <?php echo $patient_vitals_delete->HT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_HT" class="patient_vitals_HT">
<span<?php echo $patient_vitals_delete->HT->viewAttributes() ?>><?php echo $patient_vitals_delete->HT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->WT->Visible) { // WT ?>
		<td <?php echo $patient_vitals_delete->WT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_WT" class="patient_vitals_WT">
<span<?php echo $patient_vitals_delete->WT->viewAttributes() ?>><?php echo $patient_vitals_delete->WT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->SurfaceArea->Visible) { // SurfaceArea ?>
		<td <?php echo $patient_vitals_delete->SurfaceArea->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals_delete->SurfaceArea->viewAttributes() ?>><?php echo $patient_vitals_delete->SurfaceArea->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td <?php echo $patient_vitals_delete->BodyMassIndex->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals_delete->BodyMassIndex->viewAttributes() ?>><?php echo $patient_vitals_delete->BodyMassIndex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td <?php echo $patient_vitals_delete->AnticoagulantifAny->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals_delete->AnticoagulantifAny->viewAttributes() ?>><?php echo $patient_vitals_delete->AnticoagulantifAny->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->FoodAllergies->Visible) { // FoodAllergies ?>
		<td <?php echo $patient_vitals_delete->FoodAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals_delete->FoodAllergies->viewAttributes() ?>><?php echo $patient_vitals_delete->FoodAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->GenericAllergies->Visible) { // GenericAllergies ?>
		<td <?php echo $patient_vitals_delete->GenericAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals_delete->GenericAllergies->viewAttributes() ?>><?php echo $patient_vitals_delete->GenericAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->GroupAllergies->Visible) { // GroupAllergies ?>
		<td <?php echo $patient_vitals_delete->GroupAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals_delete->GroupAllergies->viewAttributes() ?>><?php echo $patient_vitals_delete->GroupAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->Temp->Visible) { // Temp ?>
		<td <?php echo $patient_vitals_delete->Temp->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_Temp" class="patient_vitals_Temp">
<span<?php echo $patient_vitals_delete->Temp->viewAttributes() ?>><?php echo $patient_vitals_delete->Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->Pulse->Visible) { // Pulse ?>
		<td <?php echo $patient_vitals_delete->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_Pulse" class="patient_vitals_Pulse">
<span<?php echo $patient_vitals_delete->Pulse->viewAttributes() ?>><?php echo $patient_vitals_delete->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->BP->Visible) { // BP ?>
		<td <?php echo $patient_vitals_delete->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_BP" class="patient_vitals_BP">
<span<?php echo $patient_vitals_delete->BP->viewAttributes() ?>><?php echo $patient_vitals_delete->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->PR->Visible) { // PR ?>
		<td <?php echo $patient_vitals_delete->PR->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_PR" class="patient_vitals_PR">
<span<?php echo $patient_vitals_delete->PR->viewAttributes() ?>><?php echo $patient_vitals_delete->PR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->CNS->Visible) { // CNS ?>
		<td <?php echo $patient_vitals_delete->CNS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_CNS" class="patient_vitals_CNS">
<span<?php echo $patient_vitals_delete->CNS->viewAttributes() ?>><?php echo $patient_vitals_delete->CNS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->RSA->Visible) { // RSA ?>
		<td <?php echo $patient_vitals_delete->RSA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_RSA" class="patient_vitals_RSA">
<span<?php echo $patient_vitals_delete->RSA->viewAttributes() ?>><?php echo $patient_vitals_delete->RSA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->CVS->Visible) { // CVS ?>
		<td <?php echo $patient_vitals_delete->CVS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_CVS" class="patient_vitals_CVS">
<span<?php echo $patient_vitals_delete->CVS->viewAttributes() ?>><?php echo $patient_vitals_delete->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->PA->Visible) { // PA ?>
		<td <?php echo $patient_vitals_delete->PA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_PA" class="patient_vitals_PA">
<span<?php echo $patient_vitals_delete->PA->viewAttributes() ?>><?php echo $patient_vitals_delete->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->PS->Visible) { // PS ?>
		<td <?php echo $patient_vitals_delete->PS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_PS" class="patient_vitals_PS">
<span<?php echo $patient_vitals_delete->PS->viewAttributes() ?>><?php echo $patient_vitals_delete->PS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->PV->Visible) { // PV ?>
		<td <?php echo $patient_vitals_delete->PV->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_PV" class="patient_vitals_PV">
<span<?php echo $patient_vitals_delete->PV->viewAttributes() ?>><?php echo $patient_vitals_delete->PV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->clinicaldetails->Visible) { // clinicaldetails ?>
		<td <?php echo $patient_vitals_delete->clinicaldetails->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals_delete->clinicaldetails->viewAttributes() ?>><?php echo $patient_vitals_delete->clinicaldetails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->status->Visible) { // status ?>
		<td <?php echo $patient_vitals_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_status" class="patient_vitals_status">
<span<?php echo $patient_vitals_delete->status->viewAttributes() ?>><?php echo $patient_vitals_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $patient_vitals_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_createdby" class="patient_vitals_createdby">
<span<?php echo $patient_vitals_delete->createdby->viewAttributes() ?>><?php echo $patient_vitals_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $patient_vitals_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
<span<?php echo $patient_vitals_delete->createddatetime->viewAttributes() ?>><?php echo $patient_vitals_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $patient_vitals_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
<span<?php echo $patient_vitals_delete->modifiedby->viewAttributes() ?>><?php echo $patient_vitals_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $patient_vitals_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals_delete->modifieddatetime->viewAttributes() ?>><?php echo $patient_vitals_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_vitals_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_Age" class="patient_vitals_Age">
<span<?php echo $patient_vitals_delete->Age->viewAttributes() ?>><?php echo $patient_vitals_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_vitals_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_Gender" class="patient_vitals_Gender">
<span<?php echo $patient_vitals_delete->Gender->viewAttributes() ?>><?php echo $patient_vitals_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_vitals_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_PatientId" class="patient_vitals_PatientId">
<span<?php echo $patient_vitals_delete->PatientId->viewAttributes() ?>><?php echo $patient_vitals_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_vitals_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_Reception" class="patient_vitals_Reception">
<span<?php echo $patient_vitals_delete->Reception->viewAttributes() ?>><?php echo $patient_vitals_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_vitals_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCount ?>_patient_vitals_HospID" class="patient_vitals_HospID">
<span<?php echo $patient_vitals_delete->HospID->viewAttributes() ?>><?php echo $patient_vitals_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_vitals_delete->Recordset->moveNext();
}
$patient_vitals_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_vitals_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_vitals_delete->showPageFooter();
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
$patient_vitals_delete->terminate();
?>