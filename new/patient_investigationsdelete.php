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
<?php include_once "header.php"; ?>
<script>
var fpatient_investigationsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_investigationsdelete = currentForm = new ew.Form("fpatient_investigationsdelete", "delete");
	loadjs.done("fpatient_investigationsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_investigations_delete->showPageHeader(); ?>
<?php
$patient_investigations_delete->showMessage();
?>
<form name="fpatient_investigationsdelete" id="fpatient_investigationsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_investigations_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_investigations_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_investigations_delete->id->headerCellClass() ?>"><span id="elh_patient_investigations_id" class="patient_investigations_id"><?php echo $patient_investigations_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->Investigation->Visible) { // Investigation ?>
		<th class="<?php echo $patient_investigations_delete->Investigation->headerCellClass() ?>"><span id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><?php echo $patient_investigations_delete->Investigation->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->Value->Visible) { // Value ?>
		<th class="<?php echo $patient_investigations_delete->Value->headerCellClass() ?>"><span id="elh_patient_investigations_Value" class="patient_investigations_Value"><?php echo $patient_investigations_delete->Value->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->NormalRange->Visible) { // NormalRange ?>
		<th class="<?php echo $patient_investigations_delete->NormalRange->headerCellClass() ?>"><span id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><?php echo $patient_investigations_delete->NormalRange->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_investigations_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><?php echo $patient_investigations_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $patient_investigations_delete->Age->headerCellClass() ?>"><span id="elh_patient_investigations_Age" class="patient_investigations_Age"><?php echo $patient_investigations_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_investigations_delete->Gender->headerCellClass() ?>"><span id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><?php echo $patient_investigations_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->SampleCollected->Visible) { // SampleCollected ?>
		<th class="<?php echo $patient_investigations_delete->SampleCollected->headerCellClass() ?>"><span id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><?php echo $patient_investigations_delete->SampleCollected->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<th class="<?php echo $patient_investigations_delete->SampleCollectedBy->headerCellClass() ?>"><span id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><?php echo $patient_investigations_delete->SampleCollectedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->ResultedDate->Visible) { // ResultedDate ?>
		<th class="<?php echo $patient_investigations_delete->ResultedDate->headerCellClass() ?>"><span id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><?php echo $patient_investigations_delete->ResultedDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->ResultedBy->Visible) { // ResultedBy ?>
		<th class="<?php echo $patient_investigations_delete->ResultedBy->headerCellClass() ?>"><span id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><?php echo $patient_investigations_delete->ResultedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->Modified->Visible) { // Modified ?>
		<th class="<?php echo $patient_investigations_delete->Modified->headerCellClass() ?>"><span id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><?php echo $patient_investigations_delete->Modified->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $patient_investigations_delete->ModifiedBy->headerCellClass() ?>"><span id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><?php echo $patient_investigations_delete->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->Created->Visible) { // Created ?>
		<th class="<?php echo $patient_investigations_delete->Created->headerCellClass() ?>"><span id="elh_patient_investigations_Created" class="patient_investigations_Created"><?php echo $patient_investigations_delete->Created->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $patient_investigations_delete->CreatedBy->headerCellClass() ?>"><span id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><?php echo $patient_investigations_delete->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->GroupHead->Visible) { // GroupHead ?>
		<th class="<?php echo $patient_investigations_delete->GroupHead->headerCellClass() ?>"><span id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><?php echo $patient_investigations_delete->GroupHead->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->Cost->Visible) { // Cost ?>
		<th class="<?php echo $patient_investigations_delete->Cost->headerCellClass() ?>"><span id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><?php echo $patient_investigations_delete->Cost->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $patient_investigations_delete->PaymentStatus->headerCellClass() ?>"><span id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><?php echo $patient_investigations_delete->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->PayMode->Visible) { // PayMode ?>
		<th class="<?php echo $patient_investigations_delete->PayMode->headerCellClass() ?>"><span id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><?php echo $patient_investigations_delete->PayMode->caption() ?></span></th>
<?php } ?>
<?php if ($patient_investigations_delete->VoucherNo->Visible) { // VoucherNo ?>
		<th class="<?php echo $patient_investigations_delete->VoucherNo->headerCellClass() ?>"><span id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><?php echo $patient_investigations_delete->VoucherNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_investigations_delete->RecordCount = 0;
$i = 0;
while (!$patient_investigations_delete->Recordset->EOF) {
	$patient_investigations_delete->RecordCount++;
	$patient_investigations_delete->RowCount++;

	// Set row properties
	$patient_investigations->resetAttributes();
	$patient_investigations->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_investigations_delete->loadRowValues($patient_investigations_delete->Recordset);

	// Render row
	$patient_investigations_delete->renderRow();
?>
	<tr <?php echo $patient_investigations->rowAttributes() ?>>
<?php if ($patient_investigations_delete->id->Visible) { // id ?>
		<td <?php echo $patient_investigations_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_id" class="patient_investigations_id">
<span<?php echo $patient_investigations_delete->id->viewAttributes() ?>><?php echo $patient_investigations_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->Investigation->Visible) { // Investigation ?>
		<td <?php echo $patient_investigations_delete->Investigation->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_Investigation" class="patient_investigations_Investigation">
<span<?php echo $patient_investigations_delete->Investigation->viewAttributes() ?>><?php echo $patient_investigations_delete->Investigation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->Value->Visible) { // Value ?>
		<td <?php echo $patient_investigations_delete->Value->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_Value" class="patient_investigations_Value">
<span<?php echo $patient_investigations_delete->Value->viewAttributes() ?>><?php echo $patient_investigations_delete->Value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->NormalRange->Visible) { // NormalRange ?>
		<td <?php echo $patient_investigations_delete->NormalRange->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
<span<?php echo $patient_investigations_delete->NormalRange->viewAttributes() ?>><?php echo $patient_investigations_delete->NormalRange->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_investigations_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_mrnno" class="patient_investigations_mrnno">
<span<?php echo $patient_investigations_delete->mrnno->viewAttributes() ?>><?php echo $patient_investigations_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->Age->Visible) { // Age ?>
		<td <?php echo $patient_investigations_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_Age" class="patient_investigations_Age">
<span<?php echo $patient_investigations_delete->Age->viewAttributes() ?>><?php echo $patient_investigations_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_investigations_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_Gender" class="patient_investigations_Gender">
<span<?php echo $patient_investigations_delete->Gender->viewAttributes() ?>><?php echo $patient_investigations_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->SampleCollected->Visible) { // SampleCollected ?>
		<td <?php echo $patient_investigations_delete->SampleCollected->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
<span<?php echo $patient_investigations_delete->SampleCollected->viewAttributes() ?>><?php echo $patient_investigations_delete->SampleCollected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
		<td <?php echo $patient_investigations_delete->SampleCollectedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations_delete->SampleCollectedBy->viewAttributes() ?>><?php echo $patient_investigations_delete->SampleCollectedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->ResultedDate->Visible) { // ResultedDate ?>
		<td <?php echo $patient_investigations_delete->ResultedDate->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
<span<?php echo $patient_investigations_delete->ResultedDate->viewAttributes() ?>><?php echo $patient_investigations_delete->ResultedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->ResultedBy->Visible) { // ResultedBy ?>
		<td <?php echo $patient_investigations_delete->ResultedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
<span<?php echo $patient_investigations_delete->ResultedBy->viewAttributes() ?>><?php echo $patient_investigations_delete->ResultedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->Modified->Visible) { // Modified ?>
		<td <?php echo $patient_investigations_delete->Modified->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_Modified" class="patient_investigations_Modified">
<span<?php echo $patient_investigations_delete->Modified->viewAttributes() ?>><?php echo $patient_investigations_delete->Modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<td <?php echo $patient_investigations_delete->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations_delete->ModifiedBy->viewAttributes() ?>><?php echo $patient_investigations_delete->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->Created->Visible) { // Created ?>
		<td <?php echo $patient_investigations_delete->Created->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_Created" class="patient_investigations_Created">
<span<?php echo $patient_investigations_delete->Created->viewAttributes() ?>><?php echo $patient_investigations_delete->Created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->CreatedBy->Visible) { // CreatedBy ?>
		<td <?php echo $patient_investigations_delete->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
<span<?php echo $patient_investigations_delete->CreatedBy->viewAttributes() ?>><?php echo $patient_investigations_delete->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->GroupHead->Visible) { // GroupHead ?>
		<td <?php echo $patient_investigations_delete->GroupHead->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
<span<?php echo $patient_investigations_delete->GroupHead->viewAttributes() ?>><?php echo $patient_investigations_delete->GroupHead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->Cost->Visible) { // Cost ?>
		<td <?php echo $patient_investigations_delete->Cost->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_Cost" class="patient_investigations_Cost">
<span<?php echo $patient_investigations_delete->Cost->viewAttributes() ?>><?php echo $patient_investigations_delete->Cost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<td <?php echo $patient_investigations_delete->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations_delete->PaymentStatus->viewAttributes() ?>><?php echo $patient_investigations_delete->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->PayMode->Visible) { // PayMode ?>
		<td <?php echo $patient_investigations_delete->PayMode->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_PayMode" class="patient_investigations_PayMode">
<span<?php echo $patient_investigations_delete->PayMode->viewAttributes() ?>><?php echo $patient_investigations_delete->PayMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_investigations_delete->VoucherNo->Visible) { // VoucherNo ?>
		<td <?php echo $patient_investigations_delete->VoucherNo->cellAttributes() ?>>
<span id="el<?php echo $patient_investigations_delete->RowCount ?>_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
<span<?php echo $patient_investigations_delete->VoucherNo->viewAttributes() ?>><?php echo $patient_investigations_delete->VoucherNo->getViewValue() ?></span>
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
$patient_investigations_delete->terminate();
?>