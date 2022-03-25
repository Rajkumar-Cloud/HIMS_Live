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
$patient_history_delete = new patient_history_delete();

// Run the page
$patient_history_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_historydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_historydelete = currentForm = new ew.Form("fpatient_historydelete", "delete");
	loadjs.done("fpatient_historydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_history_delete->showPageHeader(); ?>
<?php
$patient_history_delete->showMessage();
?>
<form name="fpatient_historydelete" id="fpatient_historydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_history_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_history_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_history_delete->id->headerCellClass() ?>"><span id="elh_patient_history_id" class="patient_history_id"><?php echo $patient_history_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_history_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_history_mrnno" class="patient_history_mrnno"><?php echo $patient_history_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_history_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_history_PatientName" class="patient_history_PatientName"><?php echo $patient_history_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_history_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_history_PatientId" class="patient_history_PatientId"><?php echo $patient_history_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_history_delete->MobileNumber->headerCellClass() ?>"><span id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber"><?php echo $patient_history_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->MaritalHistory->Visible) { // MaritalHistory ?>
		<th class="<?php echo $patient_history_delete->MaritalHistory->headerCellClass() ?>"><span id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory"><?php echo $patient_history_delete->MaritalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $patient_history_delete->MenstrualHistory->headerCellClass() ?>"><span id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory"><?php echo $patient_history_delete->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<th class="<?php echo $patient_history_delete->ObstetricHistory->headerCellClass() ?>"><span id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory"><?php echo $patient_history_delete->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_history_delete->Age->headerCellClass() ?>"><span id="elh_patient_history_Age" class="patient_history_Age"><?php echo $patient_history_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_history_delete->Gender->headerCellClass() ?>"><span id="elh_patient_history_Gender" class="patient_history_Gender"><?php echo $patient_history_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_history_delete->PatID->headerCellClass() ?>"><span id="elh_patient_history_PatID" class="patient_history_PatID"><?php echo $patient_history_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_history_delete->Reception->headerCellClass() ?>"><span id="elh_patient_history_Reception" class="patient_history_Reception"><?php echo $patient_history_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_history_delete->HospID->headerCellClass() ?>"><span id="elh_patient_history_HospID" class="patient_history_HospID"><?php echo $patient_history_delete->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_history_delete->RecordCount = 0;
$i = 0;
while (!$patient_history_delete->Recordset->EOF) {
	$patient_history_delete->RecordCount++;
	$patient_history_delete->RowCount++;

	// Set row properties
	$patient_history->resetAttributes();
	$patient_history->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_history_delete->loadRowValues($patient_history_delete->Recordset);

	// Render row
	$patient_history_delete->renderRow();
?>
	<tr <?php echo $patient_history->rowAttributes() ?>>
<?php if ($patient_history_delete->id->Visible) { // id ?>
		<td <?php echo $patient_history_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_id" class="patient_history_id">
<span<?php echo $patient_history_delete->id->viewAttributes() ?>><?php echo $patient_history_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_history_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_mrnno" class="patient_history_mrnno">
<span<?php echo $patient_history_delete->mrnno->viewAttributes() ?>><?php echo $patient_history_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_history_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_PatientName" class="patient_history_PatientName">
<span<?php echo $patient_history_delete->PatientName->viewAttributes() ?>><?php echo $patient_history_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_history_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_PatientId" class="patient_history_PatientId">
<span<?php echo $patient_history_delete->PatientId->viewAttributes() ?>><?php echo $patient_history_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $patient_history_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_MobileNumber" class="patient_history_MobileNumber">
<span<?php echo $patient_history_delete->MobileNumber->viewAttributes() ?>><?php echo $patient_history_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->MaritalHistory->Visible) { // MaritalHistory ?>
		<td <?php echo $patient_history_delete->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_MaritalHistory" class="patient_history_MaritalHistory">
<span<?php echo $patient_history_delete->MaritalHistory->viewAttributes() ?>><?php echo $patient_history_delete->MaritalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td <?php echo $patient_history_delete->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory">
<span<?php echo $patient_history_delete->MenstrualHistory->viewAttributes() ?>><?php echo $patient_history_delete->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td <?php echo $patient_history_delete->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory">
<span<?php echo $patient_history_delete->ObstetricHistory->viewAttributes() ?>><?php echo $patient_history_delete->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_history_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_Age" class="patient_history_Age">
<span<?php echo $patient_history_delete->Age->viewAttributes() ?>><?php echo $patient_history_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_history_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_Gender" class="patient_history_Gender">
<span<?php echo $patient_history_delete->Gender->viewAttributes() ?>><?php echo $patient_history_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_history_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_PatID" class="patient_history_PatID">
<span<?php echo $patient_history_delete->PatID->viewAttributes() ?>><?php echo $patient_history_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_history_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_Reception" class="patient_history_Reception">
<span<?php echo $patient_history_delete->Reception->viewAttributes() ?>><?php echo $patient_history_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_history_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCount ?>_patient_history_HospID" class="patient_history_HospID">
<span<?php echo $patient_history_delete->HospID->viewAttributes() ?>><?php echo $patient_history_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_history_delete->Recordset->moveNext();
}
$patient_history_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_history_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_history_delete->showPageFooter();
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
$patient_history_delete->terminate();
?>