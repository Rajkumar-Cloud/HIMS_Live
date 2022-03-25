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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_historydelete = currentForm = new ew.Form("fpatient_historydelete", "delete");

// Form_CustomValidate event
fpatient_historydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_historydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_history_delete->showPageHeader(); ?>
<?php
$patient_history_delete->showMessage();
?>
<form name="fpatient_historydelete" id="fpatient_historydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_history_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_history_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_history_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_history->id->Visible) { // id ?>
		<th class="<?php echo $patient_history->id->headerCellClass() ?>"><span id="elh_patient_history_id" class="patient_history_id"><?php echo $patient_history->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_history->mrnno->headerCellClass() ?>"><span id="elh_patient_history_mrnno" class="patient_history_mrnno"><?php echo $patient_history->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_history->PatientName->headerCellClass() ?>"><span id="elh_patient_history_PatientName" class="patient_history_PatientName"><?php echo $patient_history->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_history->PatientId->headerCellClass() ?>"><span id="elh_patient_history_PatientId" class="patient_history_PatientId"><?php echo $patient_history->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_history->MobileNumber->headerCellClass() ?>"><span id="elh_patient_history_MobileNumber" class="patient_history_MobileNumber"><?php echo $patient_history->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
		<th class="<?php echo $patient_history->MaritalHistory->headerCellClass() ?>"><span id="elh_patient_history_MaritalHistory" class="patient_history_MaritalHistory"><?php echo $patient_history->MaritalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<th class="<?php echo $patient_history->MenstrualHistory->headerCellClass() ?>"><span id="elh_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory"><?php echo $patient_history->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<th class="<?php echo $patient_history->ObstetricHistory->headerCellClass() ?>"><span id="elh_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory"><?php echo $patient_history->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_history->Age->headerCellClass() ?>"><span id="elh_patient_history_Age" class="patient_history_Age"><?php echo $patient_history->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_history->Gender->headerCellClass() ?>"><span id="elh_patient_history_Gender" class="patient_history_Gender"><?php echo $patient_history->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_history->PatID->headerCellClass() ?>"><span id="elh_patient_history_PatID" class="patient_history_PatID"><?php echo $patient_history->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_history->Reception->headerCellClass() ?>"><span id="elh_patient_history_Reception" class="patient_history_Reception"><?php echo $patient_history->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_history->HospID->headerCellClass() ?>"><span id="elh_patient_history_HospID" class="patient_history_HospID"><?php echo $patient_history->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_history_delete->RecCnt = 0;
$i = 0;
while (!$patient_history_delete->Recordset->EOF) {
	$patient_history_delete->RecCnt++;
	$patient_history_delete->RowCnt++;

	// Set row properties
	$patient_history->resetAttributes();
	$patient_history->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_history_delete->loadRowValues($patient_history_delete->Recordset);

	// Render row
	$patient_history_delete->renderRow();
?>
	<tr<?php echo $patient_history->rowAttributes() ?>>
<?php if ($patient_history->id->Visible) { // id ?>
		<td<?php echo $patient_history->id->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_id" class="patient_history_id">
<span<?php echo $patient_history->id->viewAttributes() ?>>
<?php echo $patient_history->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_history->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_mrnno" class="patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<?php echo $patient_history->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_history->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_PatientName" class="patient_history_PatientName">
<span<?php echo $patient_history->PatientName->viewAttributes() ?>>
<?php echo $patient_history->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_history->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_PatientId" class="patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<?php echo $patient_history->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_history->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_MobileNumber" class="patient_history_MobileNumber">
<span<?php echo $patient_history->MobileNumber->viewAttributes() ?>>
<?php echo $patient_history->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
		<td<?php echo $patient_history->MaritalHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_MaritalHistory" class="patient_history_MaritalHistory">
<span<?php echo $patient_history->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_history->MaritalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td<?php echo $patient_history->MenstrualHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_MenstrualHistory" class="patient_history_MenstrualHistory">
<span<?php echo $patient_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_history->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<td<?php echo $patient_history->ObstetricHistory->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_ObstetricHistory" class="patient_history_ObstetricHistory">
<span<?php echo $patient_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_history->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
		<td<?php echo $patient_history->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_Age" class="patient_history_Age">
<span<?php echo $patient_history->Age->viewAttributes() ?>>
<?php echo $patient_history->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_history->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_Gender" class="patient_history_Gender">
<span<?php echo $patient_history->Gender->viewAttributes() ?>>
<?php echo $patient_history->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_history->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_PatID" class="patient_history_PatID">
<span<?php echo $patient_history->PatID->viewAttributes() ?>>
<?php echo $patient_history->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_history->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_Reception" class="patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<?php echo $patient_history->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_history->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_history_delete->RowCnt ?>_patient_history_HospID" class="patient_history_HospID">
<span<?php echo $patient_history->HospID->viewAttributes() ?>>
<?php echo $patient_history->HospID->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_history_delete->terminate();
?>