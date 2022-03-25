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
$patient_follow_up_delete = new patient_follow_up_delete();

// Run the page
$patient_follow_up_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_follow_up_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_follow_updelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_follow_updelete = currentForm = new ew.Form("fpatient_follow_updelete", "delete");
	loadjs.done("fpatient_follow_updelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_follow_up_delete->showPageHeader(); ?>
<?php
$patient_follow_up_delete->showMessage();
?>
<form name="fpatient_follow_updelete" id="fpatient_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_follow_up_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_follow_up_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_follow_up_delete->id->headerCellClass() ?>"><span id="elh_patient_follow_up_id" class="patient_follow_up_id"><?php echo $patient_follow_up_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_follow_up_delete->PatID->headerCellClass() ?>"><span id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID"><?php echo $patient_follow_up_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_follow_up_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName"><?php echo $patient_follow_up_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_follow_up_delete->MobileNumber->headerCellClass() ?>"><span id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber"><?php echo $patient_follow_up_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_follow_up_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno"><?php echo $patient_follow_up_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->BP->Visible) { // BP ?>
		<th class="<?php echo $patient_follow_up_delete->BP->headerCellClass() ?>"><span id="elh_patient_follow_up_BP" class="patient_follow_up_BP"><?php echo $patient_follow_up_delete->BP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->Pulse->Visible) { // Pulse ?>
		<th class="<?php echo $patient_follow_up_delete->Pulse->headerCellClass() ?>"><span id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse"><?php echo $patient_follow_up_delete->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->Resp->Visible) { // Resp ?>
		<th class="<?php echo $patient_follow_up_delete->Resp->headerCellClass() ?>"><span id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp"><?php echo $patient_follow_up_delete->Resp->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->SPO2->Visible) { // SPO2 ?>
		<th class="<?php echo $patient_follow_up_delete->SPO2->headerCellClass() ?>"><span id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2"><?php echo $patient_follow_up_delete->SPO2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->NextReviewDate->Visible) { // NextReviewDate ?>
		<th class="<?php echo $patient_follow_up_delete->NextReviewDate->headerCellClass() ?>"><span id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate"><?php echo $patient_follow_up_delete->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_follow_up_delete->Age->headerCellClass() ?>"><span id="elh_patient_follow_up_Age" class="patient_follow_up_Age"><?php echo $patient_follow_up_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_follow_up_delete->Gender->headerCellClass() ?>"><span id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender"><?php echo $patient_follow_up_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_follow_up_delete->HospID->headerCellClass() ?>"><span id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID"><?php echo $patient_follow_up_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_follow_up_delete->Reception->headerCellClass() ?>"><span id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception"><?php echo $patient_follow_up_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_follow_up_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId"><?php echo $patient_follow_up_delete->PatientId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_follow_up_delete->RecordCount = 0;
$i = 0;
while (!$patient_follow_up_delete->Recordset->EOF) {
	$patient_follow_up_delete->RecordCount++;
	$patient_follow_up_delete->RowCount++;

	// Set row properties
	$patient_follow_up->resetAttributes();
	$patient_follow_up->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_follow_up_delete->loadRowValues($patient_follow_up_delete->Recordset);

	// Render row
	$patient_follow_up_delete->renderRow();
?>
	<tr <?php echo $patient_follow_up->rowAttributes() ?>>
<?php if ($patient_follow_up_delete->id->Visible) { // id ?>
		<td <?php echo $patient_follow_up_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_id" class="patient_follow_up_id">
<span<?php echo $patient_follow_up_delete->id->viewAttributes() ?>><?php echo $patient_follow_up_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_follow_up_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_PatID" class="patient_follow_up_PatID">
<span<?php echo $patient_follow_up_delete->PatID->viewAttributes() ?>><?php echo $patient_follow_up_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_follow_up_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_PatientName" class="patient_follow_up_PatientName">
<span<?php echo $patient_follow_up_delete->PatientName->viewAttributes() ?>><?php echo $patient_follow_up_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $patient_follow_up_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up_delete->MobileNumber->viewAttributes() ?>><?php echo $patient_follow_up_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_follow_up_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_mrnno" class="patient_follow_up_mrnno">
<span<?php echo $patient_follow_up_delete->mrnno->viewAttributes() ?>><?php echo $patient_follow_up_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->BP->Visible) { // BP ?>
		<td <?php echo $patient_follow_up_delete->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_BP" class="patient_follow_up_BP">
<span<?php echo $patient_follow_up_delete->BP->viewAttributes() ?>><?php echo $patient_follow_up_delete->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->Pulse->Visible) { // Pulse ?>
		<td <?php echo $patient_follow_up_delete->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_Pulse" class="patient_follow_up_Pulse">
<span<?php echo $patient_follow_up_delete->Pulse->viewAttributes() ?>><?php echo $patient_follow_up_delete->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->Resp->Visible) { // Resp ?>
		<td <?php echo $patient_follow_up_delete->Resp->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_Resp" class="patient_follow_up_Resp">
<span<?php echo $patient_follow_up_delete->Resp->viewAttributes() ?>><?php echo $patient_follow_up_delete->Resp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->SPO2->Visible) { // SPO2 ?>
		<td <?php echo $patient_follow_up_delete->SPO2->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_SPO2" class="patient_follow_up_SPO2">
<span<?php echo $patient_follow_up_delete->SPO2->viewAttributes() ?>><?php echo $patient_follow_up_delete->SPO2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->NextReviewDate->Visible) { // NextReviewDate ?>
		<td <?php echo $patient_follow_up_delete->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up_delete->NextReviewDate->viewAttributes() ?>><?php echo $patient_follow_up_delete->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_follow_up_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_Age" class="patient_follow_up_Age">
<span<?php echo $patient_follow_up_delete->Age->viewAttributes() ?>><?php echo $patient_follow_up_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_follow_up_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_Gender" class="patient_follow_up_Gender">
<span<?php echo $patient_follow_up_delete->Gender->viewAttributes() ?>><?php echo $patient_follow_up_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_follow_up_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_HospID" class="patient_follow_up_HospID">
<span<?php echo $patient_follow_up_delete->HospID->viewAttributes() ?>><?php echo $patient_follow_up_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_follow_up_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_Reception" class="patient_follow_up_Reception">
<span<?php echo $patient_follow_up_delete->Reception->viewAttributes() ?>><?php echo $patient_follow_up_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_follow_up_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCount ?>_patient_follow_up_PatientId" class="patient_follow_up_PatientId">
<span<?php echo $patient_follow_up_delete->PatientId->viewAttributes() ?>><?php echo $patient_follow_up_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_follow_up_delete->Recordset->moveNext();
}
$patient_follow_up_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_follow_up_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_follow_up_delete->showPageFooter();
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
$patient_follow_up_delete->terminate();
?>