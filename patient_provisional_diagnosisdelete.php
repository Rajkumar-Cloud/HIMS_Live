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
$patient_provisional_diagnosis_delete = new patient_provisional_diagnosis_delete();

// Run the page
$patient_provisional_diagnosis_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_provisional_diagnosis_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_provisional_diagnosisdelete = currentForm = new ew.Form("fpatient_provisional_diagnosisdelete", "delete");

// Form_CustomValidate event
fpatient_provisional_diagnosisdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_provisional_diagnosisdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_provisional_diagnosis_delete->showPageHeader(); ?>
<?php
$patient_provisional_diagnosis_delete->showMessage();
?>
<form name="fpatient_provisional_diagnosisdelete" id="fpatient_provisional_diagnosisdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_provisional_diagnosis_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_provisional_diagnosis_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_provisional_diagnosis">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_provisional_diagnosis_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_provisional_diagnosis->id->Visible) { // id ?>
		<th class="<?php echo $patient_provisional_diagnosis->id->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_id" class="patient_provisional_diagnosis_id"><?php echo $patient_provisional_diagnosis->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_provisional_diagnosis->mrnno->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_mrnno" class="patient_provisional_diagnosis_mrnno"><?php echo $patient_provisional_diagnosis->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatientName->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_PatientName" class="patient_provisional_diagnosis_PatientName"><?php echo $patient_provisional_diagnosis->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatID->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_PatID" class="patient_provisional_diagnosis_PatID"><?php echo $patient_provisional_diagnosis->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_provisional_diagnosis->MobileNumber->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_MobileNumber" class="patient_provisional_diagnosis_MobileNumber"><?php echo $patient_provisional_diagnosis->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_provisional_diagnosis->Reception->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_Reception" class="patient_provisional_diagnosis_Reception"><?php echo $patient_provisional_diagnosis->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_provisional_diagnosis->PatientId->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_PatientId" class="patient_provisional_diagnosis_PatientId"><?php echo $patient_provisional_diagnosis->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_provisional_diagnosis->Age->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_Age" class="patient_provisional_diagnosis_Age"><?php echo $patient_provisional_diagnosis->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_provisional_diagnosis->Gender->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_Gender" class="patient_provisional_diagnosis_Gender"><?php echo $patient_provisional_diagnosis->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_provisional_diagnosis->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_provisional_diagnosis->HospID->headerCellClass() ?>"><span id="elh_patient_provisional_diagnosis_HospID" class="patient_provisional_diagnosis_HospID"><?php echo $patient_provisional_diagnosis->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_provisional_diagnosis_delete->RecCnt = 0;
$i = 0;
while (!$patient_provisional_diagnosis_delete->Recordset->EOF) {
	$patient_provisional_diagnosis_delete->RecCnt++;
	$patient_provisional_diagnosis_delete->RowCnt++;

	// Set row properties
	$patient_provisional_diagnosis->resetAttributes();
	$patient_provisional_diagnosis->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_provisional_diagnosis_delete->loadRowValues($patient_provisional_diagnosis_delete->Recordset);

	// Render row
	$patient_provisional_diagnosis_delete->renderRow();
?>
	<tr<?php echo $patient_provisional_diagnosis->rowAttributes() ?>>
<?php if ($patient_provisional_diagnosis->id->Visible) { // id ?>
		<td<?php echo $patient_provisional_diagnosis->id->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_id" class="patient_provisional_diagnosis_id">
<span<?php echo $patient_provisional_diagnosis->id->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_provisional_diagnosis->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_mrnno" class="patient_provisional_diagnosis_mrnno">
<span<?php echo $patient_provisional_diagnosis->mrnno->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_provisional_diagnosis->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_PatientName" class="patient_provisional_diagnosis_PatientName">
<span<?php echo $patient_provisional_diagnosis->PatientName->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_provisional_diagnosis->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_PatID" class="patient_provisional_diagnosis_PatID">
<span<?php echo $patient_provisional_diagnosis->PatID->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_provisional_diagnosis->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_MobileNumber" class="patient_provisional_diagnosis_MobileNumber">
<span<?php echo $patient_provisional_diagnosis->MobileNumber->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_provisional_diagnosis->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_Reception" class="patient_provisional_diagnosis_Reception">
<span<?php echo $patient_provisional_diagnosis->Reception->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_provisional_diagnosis->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_PatientId" class="patient_provisional_diagnosis_PatientId">
<span<?php echo $patient_provisional_diagnosis->PatientId->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Age->Visible) { // Age ?>
		<td<?php echo $patient_provisional_diagnosis->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_Age" class="patient_provisional_diagnosis_Age">
<span<?php echo $patient_provisional_diagnosis->Age->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_provisional_diagnosis->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_Gender" class="patient_provisional_diagnosis_Gender">
<span<?php echo $patient_provisional_diagnosis->Gender->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_provisional_diagnosis->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_provisional_diagnosis->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_provisional_diagnosis_delete->RowCnt ?>_patient_provisional_diagnosis_HospID" class="patient_provisional_diagnosis_HospID">
<span<?php echo $patient_provisional_diagnosis->HospID->viewAttributes() ?>>
<?php echo $patient_provisional_diagnosis->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_provisional_diagnosis_delete->Recordset->moveNext();
}
$patient_provisional_diagnosis_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_provisional_diagnosis_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_provisional_diagnosis_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_provisional_diagnosis_delete->terminate();
?>