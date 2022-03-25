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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_follow_updelete = currentForm = new ew.Form("fpatient_follow_updelete", "delete");

// Form_CustomValidate event
fpatient_follow_updelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_follow_updelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_follow_up_delete->showPageHeader(); ?>
<?php
$patient_follow_up_delete->showMessage();
?>
<form name="fpatient_follow_updelete" id="fpatient_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_follow_up_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_follow_up_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_follow_up_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_follow_up->id->Visible) { // id ?>
		<th class="<?php echo $patient_follow_up->id->headerCellClass() ?>"><span id="elh_patient_follow_up_id" class="patient_follow_up_id"><?php echo $patient_follow_up->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_follow_up->PatID->headerCellClass() ?>"><span id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID"><?php echo $patient_follow_up->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_follow_up->PatientName->headerCellClass() ?>"><span id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName"><?php echo $patient_follow_up->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_follow_up->MobileNumber->headerCellClass() ?>"><span id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber"><?php echo $patient_follow_up->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_follow_up->mrnno->headerCellClass() ?>"><span id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno"><?php echo $patient_follow_up->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->BP->Visible) { // BP ?>
		<th class="<?php echo $patient_follow_up->BP->headerCellClass() ?>"><span id="elh_patient_follow_up_BP" class="patient_follow_up_BP"><?php echo $patient_follow_up->BP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
		<th class="<?php echo $patient_follow_up->Pulse->headerCellClass() ?>"><span id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse"><?php echo $patient_follow_up->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
		<th class="<?php echo $patient_follow_up->Resp->headerCellClass() ?>"><span id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp"><?php echo $patient_follow_up->Resp->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
		<th class="<?php echo $patient_follow_up->SPO2->headerCellClass() ?>"><span id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2"><?php echo $patient_follow_up->SPO2->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<th class="<?php echo $patient_follow_up->NextReviewDate->headerCellClass() ?>"><span id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate"><?php echo $patient_follow_up->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_follow_up->Age->headerCellClass() ?>"><span id="elh_patient_follow_up_Age" class="patient_follow_up_Age"><?php echo $patient_follow_up->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_follow_up->Gender->headerCellClass() ?>"><span id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender"><?php echo $patient_follow_up->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_follow_up->HospID->headerCellClass() ?>"><span id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID"><?php echo $patient_follow_up->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_follow_up->Reception->headerCellClass() ?>"><span id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception"><?php echo $patient_follow_up->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_follow_up->PatientId->headerCellClass() ?>"><span id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId"><?php echo $patient_follow_up->PatientId->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_follow_up_delete->RecCnt = 0;
$i = 0;
while (!$patient_follow_up_delete->Recordset->EOF) {
	$patient_follow_up_delete->RecCnt++;
	$patient_follow_up_delete->RowCnt++;

	// Set row properties
	$patient_follow_up->resetAttributes();
	$patient_follow_up->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_follow_up_delete->loadRowValues($patient_follow_up_delete->Recordset);

	// Render row
	$patient_follow_up_delete->renderRow();
?>
	<tr<?php echo $patient_follow_up->rowAttributes() ?>>
<?php if ($patient_follow_up->id->Visible) { // id ?>
		<td<?php echo $patient_follow_up->id->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_id" class="patient_follow_up_id">
<span<?php echo $patient_follow_up->id->viewAttributes() ?>>
<?php echo $patient_follow_up->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_follow_up->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_PatID" class="patient_follow_up_PatID">
<span<?php echo $patient_follow_up->PatID->viewAttributes() ?>>
<?php echo $patient_follow_up->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_follow_up->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_PatientName" class="patient_follow_up_PatientName">
<span<?php echo $patient_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_follow_up->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up->MobileNumber->viewAttributes() ?>>
<?php echo $patient_follow_up->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_follow_up->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_mrnno" class="patient_follow_up_mrnno">
<span<?php echo $patient_follow_up->mrnno->viewAttributes() ?>>
<?php echo $patient_follow_up->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->BP->Visible) { // BP ?>
		<td<?php echo $patient_follow_up->BP->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_BP" class="patient_follow_up_BP">
<span<?php echo $patient_follow_up->BP->viewAttributes() ?>>
<?php echo $patient_follow_up->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
		<td<?php echo $patient_follow_up->Pulse->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_Pulse" class="patient_follow_up_Pulse">
<span<?php echo $patient_follow_up->Pulse->viewAttributes() ?>>
<?php echo $patient_follow_up->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
		<td<?php echo $patient_follow_up->Resp->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_Resp" class="patient_follow_up_Resp">
<span<?php echo $patient_follow_up->Resp->viewAttributes() ?>>
<?php echo $patient_follow_up->Resp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
		<td<?php echo $patient_follow_up->SPO2->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_SPO2" class="patient_follow_up_SPO2">
<span<?php echo $patient_follow_up->SPO2->viewAttributes() ?>>
<?php echo $patient_follow_up->SPO2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td<?php echo $patient_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Age->Visible) { // Age ?>
		<td<?php echo $patient_follow_up->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_Age" class="patient_follow_up_Age">
<span<?php echo $patient_follow_up->Age->viewAttributes() ?>>
<?php echo $patient_follow_up->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_follow_up->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_Gender" class="patient_follow_up_Gender">
<span<?php echo $patient_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_follow_up->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_HospID" class="patient_follow_up_HospID">
<span<?php echo $patient_follow_up->HospID->viewAttributes() ?>>
<?php echo $patient_follow_up->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_follow_up->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_Reception" class="patient_follow_up_Reception">
<span<?php echo $patient_follow_up->Reception->viewAttributes() ?>>
<?php echo $patient_follow_up->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_follow_up->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_follow_up_delete->RowCnt ?>_patient_follow_up_PatientId" class="patient_follow_up_PatientId">
<span<?php echo $patient_follow_up->PatientId->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientId->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_follow_up_delete->terminate();
?>