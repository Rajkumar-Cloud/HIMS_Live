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
<?php include_once "header.php"; ?>
<script>
var fpatient_prescriptiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_prescriptiondelete = currentForm = new ew.Form("fpatient_prescriptiondelete", "delete");
	loadjs.done("fpatient_prescriptiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_prescription_delete->showPageHeader(); ?>
<?php
$patient_prescription_delete->showMessage();
?>
<form name="fpatient_prescriptiondelete" id="fpatient_prescriptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_prescription_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_prescription_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_prescription_delete->id->headerCellClass() ?>"><span id="elh_patient_prescription_id" class="patient_prescription_id"><?php echo $patient_prescription_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_prescription_delete->Reception->headerCellClass() ?>"><span id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><?php echo $patient_prescription_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_prescription_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><?php echo $patient_prescription_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_prescription_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><?php echo $patient_prescription_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->Medicine->Visible) { // Medicine ?>
		<th class="<?php echo $patient_prescription_delete->Medicine->headerCellClass() ?>"><span id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><?php echo $patient_prescription_delete->Medicine->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->M->Visible) { // M ?>
		<th class="<?php echo $patient_prescription_delete->M->headerCellClass() ?>"><span id="elh_patient_prescription_M" class="patient_prescription_M"><?php echo $patient_prescription_delete->M->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->A->Visible) { // A ?>
		<th class="<?php echo $patient_prescription_delete->A->headerCellClass() ?>"><span id="elh_patient_prescription_A" class="patient_prescription_A"><?php echo $patient_prescription_delete->A->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->N->Visible) { // N ?>
		<th class="<?php echo $patient_prescription_delete->N->headerCellClass() ?>"><span id="elh_patient_prescription_N" class="patient_prescription_N"><?php echo $patient_prescription_delete->N->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->NoOfDays->Visible) { // NoOfDays ?>
		<th class="<?php echo $patient_prescription_delete->NoOfDays->headerCellClass() ?>"><span id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><?php echo $patient_prescription_delete->NoOfDays->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->PreRoute->Visible) { // PreRoute ?>
		<th class="<?php echo $patient_prescription_delete->PreRoute->headerCellClass() ?>"><span id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><?php echo $patient_prescription_delete->PreRoute->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<th class="<?php echo $patient_prescription_delete->TimeOfTaking->headerCellClass() ?>"><span id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><?php echo $patient_prescription_delete->TimeOfTaking->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->Type->Visible) { // Type ?>
		<th class="<?php echo $patient_prescription_delete->Type->headerCellClass() ?>"><span id="elh_patient_prescription_Type" class="patient_prescription_Type"><?php echo $patient_prescription_delete->Type->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_prescription_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><?php echo $patient_prescription_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_prescription_delete->Age->headerCellClass() ?>"><span id="elh_patient_prescription_Age" class="patient_prescription_Age"><?php echo $patient_prescription_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_prescription_delete->Gender->headerCellClass() ?>"><span id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><?php echo $patient_prescription_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->profilePic->Visible) { // profilePic ?>
		<th class="<?php echo $patient_prescription_delete->profilePic->headerCellClass() ?>"><span id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><?php echo $patient_prescription_delete->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $patient_prescription_delete->Status->headerCellClass() ?>"><span id="elh_patient_prescription_Status" class="patient_prescription_Status"><?php echo $patient_prescription_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $patient_prescription_delete->CreatedBy->headerCellClass() ?>"><span id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><?php echo $patient_prescription_delete->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->CreateDateTime->Visible) { // CreateDateTime ?>
		<th class="<?php echo $patient_prescription_delete->CreateDateTime->headerCellClass() ?>"><span id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><?php echo $patient_prescription_delete->CreateDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $patient_prescription_delete->ModifiedBy->headerCellClass() ?>"><span id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><?php echo $patient_prescription_delete->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_prescription_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $patient_prescription_delete->ModifiedDateTime->headerCellClass() ?>"><span id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><?php echo $patient_prescription_delete->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_prescription_delete->RecordCount = 0;
$i = 0;
while (!$patient_prescription_delete->Recordset->EOF) {
	$patient_prescription_delete->RecordCount++;
	$patient_prescription_delete->RowCount++;

	// Set row properties
	$patient_prescription->resetAttributes();
	$patient_prescription->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_prescription_delete->loadRowValues($patient_prescription_delete->Recordset);

	// Render row
	$patient_prescription_delete->renderRow();
?>
	<tr <?php echo $patient_prescription->rowAttributes() ?>>
<?php if ($patient_prescription_delete->id->Visible) { // id ?>
		<td <?php echo $patient_prescription_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_id" class="patient_prescription_id">
<span<?php echo $patient_prescription_delete->id->viewAttributes() ?>><?php echo $patient_prescription_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_prescription_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_Reception" class="patient_prescription_Reception">
<span<?php echo $patient_prescription_delete->Reception->viewAttributes() ?>><?php echo $patient_prescription_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_prescription_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_PatientId" class="patient_prescription_PatientId">
<span<?php echo $patient_prescription_delete->PatientId->viewAttributes() ?>><?php echo $patient_prescription_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_prescription_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_PatientName" class="patient_prescription_PatientName">
<span<?php echo $patient_prescription_delete->PatientName->viewAttributes() ?>><?php echo $patient_prescription_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->Medicine->Visible) { // Medicine ?>
		<td <?php echo $patient_prescription_delete->Medicine->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_Medicine" class="patient_prescription_Medicine">
<span<?php echo $patient_prescription_delete->Medicine->viewAttributes() ?>><?php echo $patient_prescription_delete->Medicine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->M->Visible) { // M ?>
		<td <?php echo $patient_prescription_delete->M->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_M" class="patient_prescription_M">
<span<?php echo $patient_prescription_delete->M->viewAttributes() ?>><?php echo $patient_prescription_delete->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->A->Visible) { // A ?>
		<td <?php echo $patient_prescription_delete->A->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_A" class="patient_prescription_A">
<span<?php echo $patient_prescription_delete->A->viewAttributes() ?>><?php echo $patient_prescription_delete->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->N->Visible) { // N ?>
		<td <?php echo $patient_prescription_delete->N->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_N" class="patient_prescription_N">
<span<?php echo $patient_prescription_delete->N->viewAttributes() ?>><?php echo $patient_prescription_delete->N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->NoOfDays->Visible) { // NoOfDays ?>
		<td <?php echo $patient_prescription_delete->NoOfDays->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
<span<?php echo $patient_prescription_delete->NoOfDays->viewAttributes() ?>><?php echo $patient_prescription_delete->NoOfDays->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->PreRoute->Visible) { // PreRoute ?>
		<td <?php echo $patient_prescription_delete->PreRoute->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
<span<?php echo $patient_prescription_delete->PreRoute->viewAttributes() ?>><?php echo $patient_prescription_delete->PreRoute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td <?php echo $patient_prescription_delete->TimeOfTaking->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription_delete->TimeOfTaking->viewAttributes() ?>><?php echo $patient_prescription_delete->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->Type->Visible) { // Type ?>
		<td <?php echo $patient_prescription_delete->Type->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_Type" class="patient_prescription_Type">
<span<?php echo $patient_prescription_delete->Type->viewAttributes() ?>><?php echo $patient_prescription_delete->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_prescription_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_mrnno" class="patient_prescription_mrnno">
<span<?php echo $patient_prescription_delete->mrnno->viewAttributes() ?>><?php echo $patient_prescription_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_prescription_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_Age" class="patient_prescription_Age">
<span<?php echo $patient_prescription_delete->Age->viewAttributes() ?>><?php echo $patient_prescription_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_prescription_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_Gender" class="patient_prescription_Gender">
<span<?php echo $patient_prescription_delete->Gender->viewAttributes() ?>><?php echo $patient_prescription_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->profilePic->Visible) { // profilePic ?>
		<td <?php echo $patient_prescription_delete->profilePic->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_profilePic" class="patient_prescription_profilePic">
<span<?php echo $patient_prescription_delete->profilePic->viewAttributes() ?>><?php echo $patient_prescription_delete->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->Status->Visible) { // Status ?>
		<td <?php echo $patient_prescription_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_Status" class="patient_prescription_Status">
<span<?php echo $patient_prescription_delete->Status->viewAttributes() ?>><?php echo $patient_prescription_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->CreatedBy->Visible) { // CreatedBy ?>
		<td <?php echo $patient_prescription_delete->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
<span<?php echo $patient_prescription_delete->CreatedBy->viewAttributes() ?>><?php echo $patient_prescription_delete->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->CreateDateTime->Visible) { // CreateDateTime ?>
		<td <?php echo $patient_prescription_delete->CreateDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription_delete->CreateDateTime->viewAttributes() ?>><?php echo $patient_prescription_delete->CreateDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<td <?php echo $patient_prescription_delete->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription_delete->ModifiedBy->viewAttributes() ?>><?php echo $patient_prescription_delete->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_prescription_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td <?php echo $patient_prescription_delete->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_prescription_delete->RowCount ?>_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription_delete->ModifiedDateTime->viewAttributes() ?>><?php echo $patient_prescription_delete->ModifiedDateTime->getViewValue() ?></span>
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
$patient_prescription_delete->terminate();
?>