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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_vitalsdelete = currentForm = new ew.Form("fpatient_vitalsdelete", "delete");

// Form_CustomValidate event
fpatient_vitalsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_vitalsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_vitalsdelete.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_delete->AnticoagulantifAny->Lookup->toClientList() ?>;
fpatient_vitalsdelete.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_delete->AnticoagulantifAny->lookupOptions()) ?>;
fpatient_vitalsdelete.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_vitalsdelete.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_delete->GenericAllergies->Lookup->toClientList() ?>;
fpatient_vitalsdelete.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_delete->GenericAllergies->lookupOptions()) ?>;
fpatient_vitalsdelete.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_delete->GroupAllergies->Lookup->toClientList() ?>;
fpatient_vitalsdelete.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_delete->GroupAllergies->lookupOptions()) ?>;
fpatient_vitalsdelete.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_delete->clinicaldetails->Lookup->toClientList() ?>;
fpatient_vitalsdelete.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_delete->clinicaldetails->lookupOptions()) ?>;
fpatient_vitalsdelete.lists["x_status"] = <?php echo $patient_vitals_delete->status->Lookup->toClientList() ?>;
fpatient_vitalsdelete.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_vitals_delete->showPageHeader(); ?>
<?php
$patient_vitals_delete->showMessage();
?>
<form name="fpatient_vitalsdelete" id="fpatient_vitalsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_vitals_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_vitals_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_vitals_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_vitals->id->Visible) { // id ?>
		<th class="<?php echo $patient_vitals->id->headerCellClass() ?>"><span id="elh_patient_vitals_id" class="patient_vitals_id"><?php echo $patient_vitals->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_vitals->mrnno->headerCellClass() ?>"><span id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><?php echo $patient_vitals->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_vitals->PatientName->headerCellClass() ?>"><span id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><?php echo $patient_vitals->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_vitals->PatID->headerCellClass() ?>"><span id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><?php echo $patient_vitals->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_vitals->MobileNumber->headerCellClass() ?>"><span id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><?php echo $patient_vitals->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
		<th class="<?php echo $patient_vitals->HT->headerCellClass() ?>"><span id="elh_patient_vitals_HT" class="patient_vitals_HT"><?php echo $patient_vitals->HT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
		<th class="<?php echo $patient_vitals->WT->headerCellClass() ?>"><span id="elh_patient_vitals_WT" class="patient_vitals_WT"><?php echo $patient_vitals->WT->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
		<th class="<?php echo $patient_vitals->SurfaceArea->headerCellClass() ?>"><span id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><?php echo $patient_vitals->SurfaceArea->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<th class="<?php echo $patient_vitals->BodyMassIndex->headerCellClass() ?>"><span id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><?php echo $patient_vitals->BodyMassIndex->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<th class="<?php echo $patient_vitals->AnticoagulantifAny->headerCellClass() ?>"><span id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><?php echo $patient_vitals->AnticoagulantifAny->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
		<th class="<?php echo $patient_vitals->FoodAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><?php echo $patient_vitals->FoodAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
		<th class="<?php echo $patient_vitals->GenericAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><?php echo $patient_vitals->GenericAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
		<th class="<?php echo $patient_vitals->GroupAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><?php echo $patient_vitals->GroupAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
		<th class="<?php echo $patient_vitals->Temp->headerCellClass() ?>"><span id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><?php echo $patient_vitals->Temp->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
		<th class="<?php echo $patient_vitals->Pulse->headerCellClass() ?>"><span id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><?php echo $patient_vitals->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
		<th class="<?php echo $patient_vitals->BP->headerCellClass() ?>"><span id="elh_patient_vitals_BP" class="patient_vitals_BP"><?php echo $patient_vitals->BP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
		<th class="<?php echo $patient_vitals->PR->headerCellClass() ?>"><span id="elh_patient_vitals_PR" class="patient_vitals_PR"><?php echo $patient_vitals->PR->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
		<th class="<?php echo $patient_vitals->CNS->headerCellClass() ?>"><span id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><?php echo $patient_vitals->CNS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
		<th class="<?php echo $patient_vitals->RSA->headerCellClass() ?>"><span id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><?php echo $patient_vitals->RSA->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
		<th class="<?php echo $patient_vitals->CVS->headerCellClass() ?>"><span id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><?php echo $patient_vitals->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
		<th class="<?php echo $patient_vitals->PA->headerCellClass() ?>"><span id="elh_patient_vitals_PA" class="patient_vitals_PA"><?php echo $patient_vitals->PA->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
		<th class="<?php echo $patient_vitals->PS->headerCellClass() ?>"><span id="elh_patient_vitals_PS" class="patient_vitals_PS"><?php echo $patient_vitals->PS->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
		<th class="<?php echo $patient_vitals->PV->headerCellClass() ?>"><span id="elh_patient_vitals_PV" class="patient_vitals_PV"><?php echo $patient_vitals->PV->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
		<th class="<?php echo $patient_vitals->clinicaldetails->headerCellClass() ?>"><span id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><?php echo $patient_vitals->clinicaldetails->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
		<th class="<?php echo $patient_vitals->status->headerCellClass() ?>"><span id="elh_patient_vitals_status" class="patient_vitals_status"><?php echo $patient_vitals->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_vitals->createdby->headerCellClass() ?>"><span id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><?php echo $patient_vitals->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_vitals->createddatetime->headerCellClass() ?>"><span id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><?php echo $patient_vitals->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_vitals->modifiedby->headerCellClass() ?>"><span id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><?php echo $patient_vitals->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_vitals->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><?php echo $patient_vitals->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_vitals->Age->headerCellClass() ?>"><span id="elh_patient_vitals_Age" class="patient_vitals_Age"><?php echo $patient_vitals->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_vitals->Gender->headerCellClass() ?>"><span id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><?php echo $patient_vitals->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_vitals->PatientId->headerCellClass() ?>"><span id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><?php echo $patient_vitals->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_vitals->Reception->headerCellClass() ?>"><span id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><?php echo $patient_vitals->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_vitals->HospID->headerCellClass() ?>"><span id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><?php echo $patient_vitals->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_vitals_delete->RecCnt = 0;
$i = 0;
while (!$patient_vitals_delete->Recordset->EOF) {
	$patient_vitals_delete->RecCnt++;
	$patient_vitals_delete->RowCnt++;

	// Set row properties
	$patient_vitals->resetAttributes();
	$patient_vitals->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_vitals_delete->loadRowValues($patient_vitals_delete->Recordset);

	// Render row
	$patient_vitals_delete->renderRow();
?>
	<tr<?php echo $patient_vitals->rowAttributes() ?>>
<?php if ($patient_vitals->id->Visible) { // id ?>
		<td<?php echo $patient_vitals->id->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_id" class="patient_vitals_id">
<span<?php echo $patient_vitals->id->viewAttributes() ?>>
<?php echo $patient_vitals->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_vitals->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_mrnno" class="patient_vitals_mrnno">
<span<?php echo $patient_vitals->mrnno->viewAttributes() ?>>
<?php echo $patient_vitals->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_vitals->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_PatientName" class="patient_vitals_PatientName">
<span<?php echo $patient_vitals->PatientName->viewAttributes() ?>>
<?php echo $patient_vitals->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_vitals->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_PatID" class="patient_vitals_PatID">
<span<?php echo $patient_vitals->PatID->viewAttributes() ?>>
<?php echo $patient_vitals->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_vitals->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
<span<?php echo $patient_vitals->MobileNumber->viewAttributes() ?>>
<?php echo $patient_vitals->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->HT->Visible) { // HT ?>
		<td<?php echo $patient_vitals->HT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_HT" class="patient_vitals_HT">
<span<?php echo $patient_vitals->HT->viewAttributes() ?>>
<?php echo $patient_vitals->HT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->WT->Visible) { // WT ?>
		<td<?php echo $patient_vitals->WT->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_WT" class="patient_vitals_WT">
<span<?php echo $patient_vitals->WT->viewAttributes() ?>>
<?php echo $patient_vitals->WT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->SurfaceArea->Visible) { // SurfaceArea ?>
		<td<?php echo $patient_vitals->SurfaceArea->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals->SurfaceArea->viewAttributes() ?>>
<?php echo $patient_vitals->SurfaceArea->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td<?php echo $patient_vitals->BodyMassIndex->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals->BodyMassIndex->viewAttributes() ?>>
<?php echo $patient_vitals->BodyMassIndex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td<?php echo $patient_vitals->AnticoagulantifAny->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals->AnticoagulantifAny->viewAttributes() ?>>
<?php echo $patient_vitals->AnticoagulantifAny->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->FoodAllergies->Visible) { // FoodAllergies ?>
		<td<?php echo $patient_vitals->FoodAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals->FoodAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->FoodAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->GenericAllergies->Visible) { // GenericAllergies ?>
		<td<?php echo $patient_vitals->GenericAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals->GenericAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GenericAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->GroupAllergies->Visible) { // GroupAllergies ?>
		<td<?php echo $patient_vitals->GroupAllergies->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals->GroupAllergies->viewAttributes() ?>>
<?php echo $patient_vitals->GroupAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->Temp->Visible) { // Temp ?>
		<td<?php echo $patient_vitals->Temp->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_Temp" class="patient_vitals_Temp">
<span<?php echo $patient_vitals->Temp->viewAttributes() ?>>
<?php echo $patient_vitals->Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->Pulse->Visible) { // Pulse ?>
		<td<?php echo $patient_vitals->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_Pulse" class="patient_vitals_Pulse">
<span<?php echo $patient_vitals->Pulse->viewAttributes() ?>>
<?php echo $patient_vitals->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->BP->Visible) { // BP ?>
		<td<?php echo $patient_vitals->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_BP" class="patient_vitals_BP">
<span<?php echo $patient_vitals->BP->viewAttributes() ?>>
<?php echo $patient_vitals->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->PR->Visible) { // PR ?>
		<td<?php echo $patient_vitals->PR->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_PR" class="patient_vitals_PR">
<span<?php echo $patient_vitals->PR->viewAttributes() ?>>
<?php echo $patient_vitals->PR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->CNS->Visible) { // CNS ?>
		<td<?php echo $patient_vitals->CNS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_CNS" class="patient_vitals_CNS">
<span<?php echo $patient_vitals->CNS->viewAttributes() ?>>
<?php echo $patient_vitals->CNS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->RSA->Visible) { // RSA ?>
		<td<?php echo $patient_vitals->RSA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_RSA" class="patient_vitals_RSA">
<span<?php echo $patient_vitals->RSA->viewAttributes() ?>>
<?php echo $patient_vitals->RSA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->CVS->Visible) { // CVS ?>
		<td<?php echo $patient_vitals->CVS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_CVS" class="patient_vitals_CVS">
<span<?php echo $patient_vitals->CVS->viewAttributes() ?>>
<?php echo $patient_vitals->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->PA->Visible) { // PA ?>
		<td<?php echo $patient_vitals->PA->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_PA" class="patient_vitals_PA">
<span<?php echo $patient_vitals->PA->viewAttributes() ?>>
<?php echo $patient_vitals->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->PS->Visible) { // PS ?>
		<td<?php echo $patient_vitals->PS->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_PS" class="patient_vitals_PS">
<span<?php echo $patient_vitals->PS->viewAttributes() ?>>
<?php echo $patient_vitals->PS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->PV->Visible) { // PV ?>
		<td<?php echo $patient_vitals->PV->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_PV" class="patient_vitals_PV">
<span<?php echo $patient_vitals->PV->viewAttributes() ?>>
<?php echo $patient_vitals->PV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->clinicaldetails->Visible) { // clinicaldetails ?>
		<td<?php echo $patient_vitals->clinicaldetails->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals->clinicaldetails->viewAttributes() ?>>
<?php echo $patient_vitals->clinicaldetails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->status->Visible) { // status ?>
		<td<?php echo $patient_vitals->status->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_status" class="patient_vitals_status">
<span<?php echo $patient_vitals->status->viewAttributes() ?>>
<?php echo $patient_vitals->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_vitals->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_createdby" class="patient_vitals_createdby">
<span<?php echo $patient_vitals->createdby->viewAttributes() ?>>
<?php echo $patient_vitals->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_vitals->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
<span<?php echo $patient_vitals->createddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_vitals->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
<span<?php echo $patient_vitals->modifiedby->viewAttributes() ?>>
<?php echo $patient_vitals->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_vitals->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_vitals->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->Age->Visible) { // Age ?>
		<td<?php echo $patient_vitals->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_Age" class="patient_vitals_Age">
<span<?php echo $patient_vitals->Age->viewAttributes() ?>>
<?php echo $patient_vitals->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_vitals->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_Gender" class="patient_vitals_Gender">
<span<?php echo $patient_vitals->Gender->viewAttributes() ?>>
<?php echo $patient_vitals->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_vitals->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_PatientId" class="patient_vitals_PatientId">
<span<?php echo $patient_vitals->PatientId->viewAttributes() ?>>
<?php echo $patient_vitals->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_vitals->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_Reception" class="patient_vitals_Reception">
<span<?php echo $patient_vitals->Reception->viewAttributes() ?>>
<?php echo $patient_vitals->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_vitals->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_vitals->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_vitals_delete->RowCnt ?>_patient_vitals_HospID" class="patient_vitals_HospID">
<span<?php echo $patient_vitals->HospID->viewAttributes() ?>>
<?php echo $patient_vitals->HospID->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_vitals_delete->terminate();
?>