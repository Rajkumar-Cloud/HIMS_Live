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
$patient_final_diagnosis_delete = new patient_final_diagnosis_delete();

// Run the page
$patient_final_diagnosis_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_final_diagnosis_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_final_diagnosisdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_final_diagnosisdelete = currentForm = new ew.Form("fpatient_final_diagnosisdelete", "delete");
	loadjs.done("fpatient_final_diagnosisdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_final_diagnosis_delete->showPageHeader(); ?>
<?php
$patient_final_diagnosis_delete->showMessage();
?>
<form name="fpatient_final_diagnosisdelete" id="fpatient_final_diagnosisdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_final_diagnosis">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_final_diagnosis_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_final_diagnosis_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_final_diagnosis_delete->id->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_id" class="patient_final_diagnosis_id"><?php echo $patient_final_diagnosis_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_final_diagnosis_delete->PatID->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_PatID" class="patient_final_diagnosis_PatID"><?php echo $patient_final_diagnosis_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_final_diagnosis_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_PatientName" class="patient_final_diagnosis_PatientName"><?php echo $patient_final_diagnosis_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_final_diagnosis_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_mrnno" class="patient_final_diagnosis_mrnno"><?php echo $patient_final_diagnosis_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_final_diagnosis_delete->MobileNumber->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosis_MobileNumber"><?php echo $patient_final_diagnosis_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_final_diagnosis_delete->Age->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_Age" class="patient_final_diagnosis_Age"><?php echo $patient_final_diagnosis_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_final_diagnosis_delete->Gender->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_Gender" class="patient_final_diagnosis_Gender"><?php echo $patient_final_diagnosis_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_final_diagnosis_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_PatientId" class="patient_final_diagnosis_PatientId"><?php echo $patient_final_diagnosis_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_final_diagnosis_delete->Reception->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_Reception" class="patient_final_diagnosis_Reception"><?php echo $patient_final_diagnosis_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_final_diagnosis_delete->HospID->headerCellClass() ?>"><span id="elh_patient_final_diagnosis_HospID" class="patient_final_diagnosis_HospID"><?php echo $patient_final_diagnosis_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_final_diagnosis_delete->RecordCount = 0;
$i = 0;
while (!$patient_final_diagnosis_delete->Recordset->EOF) {
	$patient_final_diagnosis_delete->RecordCount++;
	$patient_final_diagnosis_delete->RowCount++;

	// Set row properties
	$patient_final_diagnosis->resetAttributes();
	$patient_final_diagnosis->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_final_diagnosis_delete->loadRowValues($patient_final_diagnosis_delete->Recordset);

	// Render row
	$patient_final_diagnosis_delete->renderRow();
?>
	<tr <?php echo $patient_final_diagnosis->rowAttributes() ?>>
<?php if ($patient_final_diagnosis_delete->id->Visible) { // id ?>
		<td <?php echo $patient_final_diagnosis_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_id" class="patient_final_diagnosis_id">
<span<?php echo $patient_final_diagnosis_delete->id->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_final_diagnosis_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_PatID" class="patient_final_diagnosis_PatID">
<span<?php echo $patient_final_diagnosis_delete->PatID->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_final_diagnosis_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_PatientName" class="patient_final_diagnosis_PatientName">
<span<?php echo $patient_final_diagnosis_delete->PatientName->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_final_diagnosis_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_mrnno" class="patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis_delete->mrnno->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $patient_final_diagnosis_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosis_MobileNumber">
<span<?php echo $patient_final_diagnosis_delete->MobileNumber->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_final_diagnosis_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_Age" class="patient_final_diagnosis_Age">
<span<?php echo $patient_final_diagnosis_delete->Age->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_final_diagnosis_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_Gender" class="patient_final_diagnosis_Gender">
<span<?php echo $patient_final_diagnosis_delete->Gender->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_final_diagnosis_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_PatientId" class="patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis_delete->PatientId->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_final_diagnosis_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_Reception" class="patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis_delete->Reception->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_final_diagnosis_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_final_diagnosis_delete->RowCount ?>_patient_final_diagnosis_HospID" class="patient_final_diagnosis_HospID">
<span<?php echo $patient_final_diagnosis_delete->HospID->viewAttributes() ?>><?php echo $patient_final_diagnosis_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_final_diagnosis_delete->Recordset->moveNext();
}
$patient_final_diagnosis_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_final_diagnosis_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_final_diagnosis_delete->showPageFooter();
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
$patient_final_diagnosis_delete->terminate();
?>