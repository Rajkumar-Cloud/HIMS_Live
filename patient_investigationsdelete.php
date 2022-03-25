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
$patient_investigations_delete = new patient_investigations_delete();

// Run the page
$patient_investigations_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_investigationsdelete = currentForm = new ew.Form("fpatient_investigationsdelete", "delete");

// Form_CustomValidate event
fpatient_investigationsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_investigationsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_investigations_delete->showPageHeader(); ?>
<?php
$patient_investigations_delete->showMessage();
?>
<form name="fpatient_investigationsdelete" id="fpatient_investigationsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_investigations_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_investigations_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_investigations_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_investigations->id->Visible) { // id ?>
		<th class="<?php echo $patient_investigations->id->headerCellClass() ?>"><span id="elh_patient_investigations_id" class="patient_investigations_id"><?php echo $patient_investigations->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
		<th class="<?php echo $patient_investigations->Investigation->headerCellClass() ?>"><span id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><?php echo $patient_investigations->Investigation->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
		<th class="<?php echo $patient_investigations->Value->headerCellClass() ?>"><span id="elh_patient_investigations_Value" class="patient_investigations_Value"><?php echo $patient_investigations->Value->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
		<th class="<?php echo $patient_investigations->NormalRange->headerCellClass() ?>"><span id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><?php echo $patient_investigations->NormalRange->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_investigations->mrnno->headerCellClass() ?>"><span id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><?php echo $patient_investigations->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_investigations->Age->headerCellClass() ?>"><span id="elh_patient_investigations_Age" class="patient_investigations_Age"><?php echo $patient_investigations->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_investigations->Gender->headerCellClass() ?>"><span id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><?php echo $patient_investigations->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
		<th class="<?php echo $patient_investigations->SampleCollected->headerCellClass() ?>"><span id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><?php echo $patient_investigations->SampleCollected->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<th class="<?php echo $patient_investigations->SampleCollectedBy->headerCellClass() ?>"><span id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><?php echo $patient_investigations->SampleCollectedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
		<th class="<?php echo $patient_investigations->ResultedDate->headerCellClass() ?>"><span id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><?php echo $patient_investigations->ResultedDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
		<th class="<?php echo $patient_investigations->ResultedBy->headerCellClass() ?>"><span id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><?php echo $patient_investigations->ResultedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
		<th class="<?php echo $patient_investigations->Modified->headerCellClass() ?>"><span id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><?php echo $patient_investigations->Modified->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $patient_investigations->ModifiedBy->headerCellClass() ?>"><span id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><?php echo $patient_investigations->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
		<th class="<?php echo $patient_investigations->Created->headerCellClass() ?>"><span id="elh_patient_investigations_Created" class="patient_investigations_Created"><?php echo $patient_investigations->Created->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $patient_investigations->CreatedBy->headerCellClass() ?>"><span id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><?php echo $patient_investigations->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
		<th class="<?php echo $patient_investigations->GroupHead->headerCellClass() ?>"><span id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><?php echo $patient_investigations->GroupHead->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
		<th class="<?php echo $patient_investigations->Cost->headerCellClass() ?>"><span id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><?php echo $patient_investigations->Cost->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $patient_investigations->PaymentStatus->headerCellClass() ?>"><span id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><?php echo $patient_investigations->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
		<th class="<?php echo $patient_investigations->PayMode->headerCellClass() ?>"><span id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><?php echo $patient_investigations->PayMode->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
		<th class="<?php echo $patient_investigations->VoucherNo->headerCellClass() ?>"><span id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><?php echo $patient_investigations->VoucherNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_investigations_delete->RecCnt = 0;
$i = 0;
while (!$patient_investigations_delete->Recordset->EOF) {
	$patient_investigations_delete->RecCnt++;
	$patient_investigations_delete->RowCnt++;

	// Set row properties
	$patient_investigations->resetAttributes();
	$patient_investigations->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_investigations_delete->loadRowValues($patient_investigations_delete->Recordset);

	// Render row
	$patient_investigations_delete->renderRow();
?>
	<tr<?php echo $patient_investigations->rowAttributes() ?>>
<?php if ($patient_investigations->id->Visible) { // id ?>
		<td<?php echo $patient_investigations->id->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_id" class="patient_investigations_id">
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<?php echo $patient_investigations->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
		<td<?php echo $patient_investigations->Investigation->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_Investigation" class="patient_investigations_Investigation">
<span<?php echo $patient_investigations->Investigation->viewAttributes() ?>>
<?php echo $patient_investigations->Investigation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
		<td<?php echo $patient_investigations->Value->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_Value" class="patient_investigations_Value">
<span<?php echo $patient_investigations->Value->viewAttributes() ?>>
<?php echo $patient_investigations->Value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
		<td<?php echo $patient_investigations->NormalRange->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
<span<?php echo $patient_investigations->NormalRange->viewAttributes() ?>>
<?php echo $patient_investigations->NormalRange->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_investigations->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_mrnno" class="patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<?php echo $patient_investigations->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
		<td<?php echo $patient_investigations->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_Age" class="patient_investigations_Age">
<span<?php echo $patient_investigations->Age->viewAttributes() ?>>
<?php echo $patient_investigations->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_investigations->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_Gender" class="patient_investigations_Gender">
<span<?php echo $patient_investigations->Gender->viewAttributes() ?>>
<?php echo $patient_investigations->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
		<td<?php echo $patient_investigations->SampleCollected->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
<span<?php echo $patient_investigations->SampleCollected->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td<?php echo $patient_investigations->SampleCollectedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations->SampleCollectedBy->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollectedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
		<td<?php echo $patient_investigations->ResultedDate->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
<span<?php echo $patient_investigations->ResultedDate->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
		<td<?php echo $patient_investigations->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
<span<?php echo $patient_investigations->ResultedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
		<td<?php echo $patient_investigations->Modified->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_Modified" class="patient_investigations_Modified">
<span<?php echo $patient_investigations->Modified->viewAttributes() ?>>
<?php echo $patient_investigations->Modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $patient_investigations->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
		<td<?php echo $patient_investigations->Created->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_Created" class="patient_investigations_Created">
<span<?php echo $patient_investigations->Created->viewAttributes() ?>>
<?php echo $patient_investigations->Created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $patient_investigations->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
<span<?php echo $patient_investigations->CreatedBy->viewAttributes() ?>>
<?php echo $patient_investigations->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
		<td<?php echo $patient_investigations->GroupHead->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
<span<?php echo $patient_investigations->GroupHead->viewAttributes() ?>>
<?php echo $patient_investigations->GroupHead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
		<td<?php echo $patient_investigations->Cost->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_Cost" class="patient_investigations_Cost">
<span<?php echo $patient_investigations->Cost->viewAttributes() ?>>
<?php echo $patient_investigations->Cost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
		<td<?php echo $patient_investigations->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations->PaymentStatus->viewAttributes() ?>>
<?php echo $patient_investigations->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
		<td<?php echo $patient_investigations->PayMode->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_PayMode" class="patient_investigations_PayMode">
<span<?php echo $patient_investigations->PayMode->viewAttributes() ?>>
<?php echo $patient_investigations->PayMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
		<td<?php echo $patient_investigations->VoucherNo->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCnt ?>_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
<span<?php echo $patient_investigations->VoucherNo->viewAttributes() ?>>
<?php echo $patient_investigations->VoucherNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_investigations_delete->Recordset->moveNext();
}
$patient_investigations_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_investigations_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_investigations_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_investigations_delete->terminate();
?>