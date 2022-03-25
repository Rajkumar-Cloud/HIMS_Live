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
$patient_prescription_delete = new patient_prescription_delete();

// Run the page
$patient_prescription_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_prescriptiondelete = currentForm = new ew.Form("fpatient_prescriptiondelete", "delete");

// Form_CustomValidate event
fpatient_prescriptiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_prescriptiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_prescriptiondelete.lists["x_Medicine"] = <?php echo $patient_prescription_delete->Medicine->Lookup->toClientList() ?>;
fpatient_prescriptiondelete.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_delete->Medicine->lookupOptions()) ?>;
fpatient_prescriptiondelete.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptiondelete.lists["x_PreRoute"] = <?php echo $patient_prescription_delete->PreRoute->Lookup->toClientList() ?>;
fpatient_prescriptiondelete.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_delete->PreRoute->lookupOptions()) ?>;
fpatient_prescriptiondelete.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptiondelete.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_delete->TimeOfTaking->Lookup->toClientList() ?>;
fpatient_prescriptiondelete.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_delete->TimeOfTaking->lookupOptions()) ?>;
fpatient_prescriptiondelete.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptiondelete.lists["x_Type"] = <?php echo $patient_prescription_delete->Type->Lookup->toClientList() ?>;
fpatient_prescriptiondelete.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_delete->Type->options(FALSE, TRUE)) ?>;
fpatient_prescriptiondelete.lists["x_Status"] = <?php echo $patient_prescription_delete->Status->Lookup->toClientList() ?>;
fpatient_prescriptiondelete.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_delete->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_prescription_delete->showPageHeader(); ?>
<?php
$patient_prescription_delete->showMessage();
?>
<form name="fpatient_prescriptiondelete" id="fpatient_prescriptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_prescription_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_prescription_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_prescription_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_prescription->id->Visible) { // id ?>
		<th class="<?php echo $patient_prescription->id->headerCellClass() ?>"><span id="elh_patient_prescription_id" class="patient_prescription_id"><?php echo $patient_prescription->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_prescription->Reception->headerCellClass() ?>"><span id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><?php echo $patient_prescription->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_prescription->PatientId->headerCellClass() ?>"><span id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><?php echo $patient_prescription->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_prescription->PatientName->headerCellClass() ?>"><span id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><?php echo $patient_prescription->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
		<th class="<?php echo $patient_prescription->Medicine->headerCellClass() ?>"><span id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><?php echo $patient_prescription->Medicine->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
		<th class="<?php echo $patient_prescription->M->headerCellClass() ?>"><span id="elh_patient_prescription_M" class="patient_prescription_M"><?php echo $patient_prescription->M->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
		<th class="<?php echo $patient_prescription->A->headerCellClass() ?>"><span id="elh_patient_prescription_A" class="patient_prescription_A"><?php echo $patient_prescription->A->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
		<th class="<?php echo $patient_prescription->N->headerCellClass() ?>"><span id="elh_patient_prescription_N" class="patient_prescription_N"><?php echo $patient_prescription->N->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<th class="<?php echo $patient_prescription->NoOfDays->headerCellClass() ?>"><span id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><?php echo $patient_prescription->NoOfDays->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
		<th class="<?php echo $patient_prescription->PreRoute->headerCellClass() ?>"><span id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><?php echo $patient_prescription->PreRoute->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<th class="<?php echo $patient_prescription->TimeOfTaking->headerCellClass() ?>"><span id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><?php echo $patient_prescription->TimeOfTaking->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
		<th class="<?php echo $patient_prescription->Type->headerCellClass() ?>"><span id="elh_patient_prescription_Type" class="patient_prescription_Type"><?php echo $patient_prescription->Type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_prescription->mrnno->headerCellClass() ?>"><span id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><?php echo $patient_prescription->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_prescription->Age->headerCellClass() ?>"><span id="elh_patient_prescription_Age" class="patient_prescription_Age"><?php echo $patient_prescription->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_prescription->Gender->headerCellClass() ?>"><span id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><?php echo $patient_prescription->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $patient_prescription->profilePic->headerCellClass() ?>"><span id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><?php echo $patient_prescription->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
		<th class="<?php echo $patient_prescription->Status->headerCellClass() ?>"><span id="elh_patient_prescription_Status" class="patient_prescription_Status"><?php echo $patient_prescription->Status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $patient_prescription->CreatedBy->headerCellClass() ?>"><span id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><?php echo $patient_prescription->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<th class="<?php echo $patient_prescription->CreateDateTime->headerCellClass() ?>"><span id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><?php echo $patient_prescription->CreateDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $patient_prescription->ModifiedBy->headerCellClass() ?>"><span id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><?php echo $patient_prescription->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $patient_prescription->ModifiedDateTime->headerCellClass() ?>"><span id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><?php echo $patient_prescription->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_prescription_delete->RecCnt = 0;
$i = 0;
while (!$patient_prescription_delete->Recordset->EOF) {
	$patient_prescription_delete->RecCnt++;
	$patient_prescription_delete->RowCnt++;

	// Set row properties
	$patient_prescription->resetAttributes();
	$patient_prescription->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_prescription_delete->loadRowValues($patient_prescription_delete->Recordset);

	// Render row
	$patient_prescription_delete->renderRow();
?>
	<tr<?php echo $patient_prescription->rowAttributes() ?>>
<?php if ($patient_prescription->id->Visible) { // id ?>
		<td<?php echo $patient_prescription->id->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_id" class="patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<?php echo $patient_prescription->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_prescription->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_Reception" class="patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<?php echo $patient_prescription->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_PatientId" class="patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<?php echo $patient_prescription->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_PatientName" class="patient_prescription_PatientName">
<span<?php echo $patient_prescription->PatientName->viewAttributes() ?>>
<?php echo $patient_prescription->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
		<td<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_Medicine" class="patient_prescription_Medicine">
<span<?php echo $patient_prescription->Medicine->viewAttributes() ?>>
<?php echo $patient_prescription->Medicine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
		<td<?php echo $patient_prescription->M->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_M" class="patient_prescription_M">
<span<?php echo $patient_prescription->M->viewAttributes() ?>>
<?php echo $patient_prescription->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
		<td<?php echo $patient_prescription->A->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_A" class="patient_prescription_A">
<span<?php echo $patient_prescription->A->viewAttributes() ?>>
<?php echo $patient_prescription->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
		<td<?php echo $patient_prescription->N->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_N" class="patient_prescription_N">
<span<?php echo $patient_prescription->N->viewAttributes() ?>>
<?php echo $patient_prescription->N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
		<td<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
<span<?php echo $patient_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $patient_prescription->NoOfDays->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
		<td<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
<span<?php echo $patient_prescription->PreRoute->viewAttributes() ?>>
<?php echo $patient_prescription->PreRoute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $patient_prescription->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
		<td<?php echo $patient_prescription->Type->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_Type" class="patient_prescription_Type">
<span<?php echo $patient_prescription->Type->viewAttributes() ?>>
<?php echo $patient_prescription->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_mrnno" class="patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<?php echo $patient_prescription->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
		<td<?php echo $patient_prescription->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_Age" class="patient_prescription_Age">
<span<?php echo $patient_prescription->Age->viewAttributes() ?>>
<?php echo $patient_prescription->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_prescription->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_Gender" class="patient_prescription_Gender">
<span<?php echo $patient_prescription->Gender->viewAttributes() ?>>
<?php echo $patient_prescription->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
		<td<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_profilePic" class="patient_prescription_profilePic">
<span<?php echo $patient_prescription->profilePic->viewAttributes() ?>>
<?php echo $patient_prescription->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
		<td<?php echo $patient_prescription->Status->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_Status" class="patient_prescription_Status">
<span<?php echo $patient_prescription->Status->viewAttributes() ?>>
<?php echo $patient_prescription->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
<span<?php echo $patient_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $patient_prescription->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
		<td<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->CreateDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCnt ?>_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_prescription_delete->Recordset->moveNext();
}
$patient_prescription_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_prescription_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_prescription_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_prescription_delete->terminate();
?>