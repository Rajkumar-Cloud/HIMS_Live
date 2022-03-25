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
$patient_opd_follow_up_delete = new patient_opd_follow_up_delete();

// Run the page
$patient_opd_follow_up_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_opd_follow_updelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_opd_follow_updelete = currentForm = new ew.Form("fpatient_opd_follow_updelete", "delete");
	loadjs.done("fpatient_opd_follow_updelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_opd_follow_up_delete->showPageHeader(); ?>
<?php
$patient_opd_follow_up_delete->showMessage();
?>
<form name="fpatient_opd_follow_updelete" id="fpatient_opd_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_opd_follow_up_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_opd_follow_up_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_opd_follow_up_delete->id->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id"><?php echo $patient_opd_follow_up_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_opd_follow_up_delete->PatID->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID"><?php echo $patient_opd_follow_up_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_opd_follow_up_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName"><?php echo $patient_opd_follow_up_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_opd_follow_up_delete->MobileNumber->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber"><?php echo $patient_opd_follow_up_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_opd_follow_up_delete->Gender->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender"><?php echo $patient_opd_follow_up_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->NextReviewDate->Visible) { // NextReviewDate ?>
		<th class="<?php echo $patient_opd_follow_up_delete->NextReviewDate->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate"><?php echo $patient_opd_follow_up_delete->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<th class="<?php echo $patient_opd_follow_up_delete->ICSIAdvised->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised"><?php echo $patient_opd_follow_up_delete->ICSIAdvised->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<th class="<?php echo $patient_opd_follow_up_delete->DeliveryRegistered->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered"><?php echo $patient_opd_follow_up_delete->DeliveryRegistered->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->EDD->Visible) { // EDD ?>
		<th class="<?php echo $patient_opd_follow_up_delete->EDD->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD"><?php echo $patient_opd_follow_up_delete->EDD->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->SerologyPositive->Visible) { // SerologyPositive ?>
		<th class="<?php echo $patient_opd_follow_up_delete->SerologyPositive->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive"><?php echo $patient_opd_follow_up_delete->SerologyPositive->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->Allergy->Visible) { // Allergy ?>
		<th class="<?php echo $patient_opd_follow_up_delete->Allergy->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy"><?php echo $patient_opd_follow_up_delete->Allergy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_opd_follow_up_delete->status->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status"><?php echo $patient_opd_follow_up_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_opd_follow_up_delete->createdby->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby"><?php echo $patient_opd_follow_up_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_opd_follow_up_delete->createddatetime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime"><?php echo $patient_opd_follow_up_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_opd_follow_up_delete->modifiedby->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby"><?php echo $patient_opd_follow_up_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_opd_follow_up_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime"><?php echo $patient_opd_follow_up_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->LMP->Visible) { // LMP ?>
		<th class="<?php echo $patient_opd_follow_up_delete->LMP->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP"><?php echo $patient_opd_follow_up_delete->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<th class="<?php echo $patient_opd_follow_up_delete->ProcedureDateTime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime"><?php echo $patient_opd_follow_up_delete->ProcedureDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->ICSIDate->Visible) { // ICSIDate ?>
		<th class="<?php echo $patient_opd_follow_up_delete->ICSIDate->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate"><?php echo $patient_opd_follow_up_delete->ICSIDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_opd_follow_up_delete->HospID->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID"><?php echo $patient_opd_follow_up_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->createdUserName->Visible) { // createdUserName ?>
		<th class="<?php echo $patient_opd_follow_up_delete->createdUserName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName"><?php echo $patient_opd_follow_up_delete->createdUserName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->reportheader->Visible) { // reportheader ?>
		<th class="<?php echo $patient_opd_follow_up_delete->reportheader->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader"><?php echo $patient_opd_follow_up_delete->reportheader->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_opd_follow_up_delete->RecordCount = 0;
$i = 0;
while (!$patient_opd_follow_up_delete->Recordset->EOF) {
	$patient_opd_follow_up_delete->RecordCount++;
	$patient_opd_follow_up_delete->RowCount++;

	// Set row properties
	$patient_opd_follow_up->resetAttributes();
	$patient_opd_follow_up->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_opd_follow_up_delete->loadRowValues($patient_opd_follow_up_delete->Recordset);

	// Render row
	$patient_opd_follow_up_delete->renderRow();
?>
	<tr <?php echo $patient_opd_follow_up->rowAttributes() ?>>
<?php if ($patient_opd_follow_up_delete->id->Visible) { // id ?>
		<td <?php echo $patient_opd_follow_up_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up_delete->id->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_opd_follow_up_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID">
<span<?php echo $patient_opd_follow_up_delete->PatID->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_opd_follow_up_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up_delete->PatientName->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $patient_opd_follow_up_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber">
<span<?php echo $patient_opd_follow_up_delete->MobileNumber->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_opd_follow_up_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up_delete->Gender->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->NextReviewDate->Visible) { // NextReviewDate ?>
		<td <?php echo $patient_opd_follow_up_delete->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up_delete->NextReviewDate->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td <?php echo $patient_opd_follow_up_delete->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up_delete->ICSIAdvised->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td <?php echo $patient_opd_follow_up_delete->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up_delete->DeliveryRegistered->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->EDD->Visible) { // EDD ?>
		<td <?php echo $patient_opd_follow_up_delete->EDD->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up_delete->EDD->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->EDD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->SerologyPositive->Visible) { // SerologyPositive ?>
		<td <?php echo $patient_opd_follow_up_delete->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up_delete->SerologyPositive->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->SerologyPositive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->Allergy->Visible) { // Allergy ?>
		<td <?php echo $patient_opd_follow_up_delete->Allergy->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up_delete->Allergy->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->Allergy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->status->Visible) { // status ?>
		<td <?php echo $patient_opd_follow_up_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up_delete->status->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $patient_opd_follow_up_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up_delete->createdby->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $patient_opd_follow_up_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up_delete->createddatetime->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $patient_opd_follow_up_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up_delete->modifiedby->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $patient_opd_follow_up_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up_delete->modifieddatetime->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->LMP->Visible) { // LMP ?>
		<td <?php echo $patient_opd_follow_up_delete->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up_delete->LMP->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td <?php echo $patient_opd_follow_up_delete->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up_delete->ProcedureDateTime->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->ICSIDate->Visible) { // ICSIDate ?>
		<td <?php echo $patient_opd_follow_up_delete->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up_delete->ICSIDate->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->ICSIDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_opd_follow_up_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID">
<span<?php echo $patient_opd_follow_up_delete->HospID->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->createdUserName->Visible) { // createdUserName ?>
		<td <?php echo $patient_opd_follow_up_delete->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName">
<span<?php echo $patient_opd_follow_up_delete->createdUserName->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->createdUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up_delete->reportheader->Visible) { // reportheader ?>
		<td <?php echo $patient_opd_follow_up_delete->reportheader->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCount ?>_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader">
<span<?php echo $patient_opd_follow_up_delete->reportheader->viewAttributes() ?>><?php echo $patient_opd_follow_up_delete->reportheader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_opd_follow_up_delete->Recordset->moveNext();
}
$patient_opd_follow_up_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_opd_follow_up_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_opd_follow_up_delete->showPageFooter();
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
$patient_opd_follow_up_delete->terminate();
?>