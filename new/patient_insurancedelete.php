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
$patient_insurance_delete = new patient_insurance_delete();

// Run the page
$patient_insurance_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_insurance_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_insurancedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_insurancedelete = currentForm = new ew.Form("fpatient_insurancedelete", "delete");
	loadjs.done("fpatient_insurancedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_insurance_delete->showPageHeader(); ?>
<?php
$patient_insurance_delete->showMessage();
?>
<form name="fpatient_insurancedelete" id="fpatient_insurancedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_insurance_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_insurance_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_insurance_delete->id->headerCellClass() ?>"><span id="elh_patient_insurance_id" class="patient_insurance_id"><?php echo $patient_insurance_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_insurance_delete->Reception->headerCellClass() ?>"><span id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><?php echo $patient_insurance_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_insurance_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><?php echo $patient_insurance_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_insurance_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><?php echo $patient_insurance_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->Company->Visible) { // Company ?>
		<th class="<?php echo $patient_insurance_delete->Company->headerCellClass() ?>"><span id="elh_patient_insurance_Company" class="patient_insurance_Company"><?php echo $patient_insurance_delete->Company->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<th class="<?php echo $patient_insurance_delete->AddressInsuranceCarierName->headerCellClass() ?>"><span id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><?php echo $patient_insurance_delete->AddressInsuranceCarierName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->ContactName->Visible) { // ContactName ?>
		<th class="<?php echo $patient_insurance_delete->ContactName->headerCellClass() ?>"><span id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><?php echo $patient_insurance_delete->ContactName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->ContactMobile->Visible) { // ContactMobile ?>
		<th class="<?php echo $patient_insurance_delete->ContactMobile->headerCellClass() ?>"><span id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><?php echo $patient_insurance_delete->ContactMobile->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyType->Visible) { // PolicyType ?>
		<th class="<?php echo $patient_insurance_delete->PolicyType->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><?php echo $patient_insurance_delete->PolicyType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyName->Visible) { // PolicyName ?>
		<th class="<?php echo $patient_insurance_delete->PolicyName->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><?php echo $patient_insurance_delete->PolicyName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyNo->Visible) { // PolicyNo ?>
		<th class="<?php echo $patient_insurance_delete->PolicyNo->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><?php echo $patient_insurance_delete->PolicyNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyAmount->Visible) { // PolicyAmount ?>
		<th class="<?php echo $patient_insurance_delete->PolicyAmount->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><?php echo $patient_insurance_delete->PolicyAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->RefLetterNo->Visible) { // RefLetterNo ?>
		<th class="<?php echo $patient_insurance_delete->RefLetterNo->headerCellClass() ?>"><span id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><?php echo $patient_insurance_delete->RefLetterNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->ReferenceBy->Visible) { // ReferenceBy ?>
		<th class="<?php echo $patient_insurance_delete->ReferenceBy->headerCellClass() ?>"><span id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><?php echo $patient_insurance_delete->ReferenceBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->ReferenceDate->Visible) { // ReferenceDate ?>
		<th class="<?php echo $patient_insurance_delete->ReferenceDate->headerCellClass() ?>"><span id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><?php echo $patient_insurance_delete->ReferenceDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_insurance_delete->createdby->headerCellClass() ?>"><span id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><?php echo $patient_insurance_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_insurance_delete->createddatetime->headerCellClass() ?>"><span id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><?php echo $patient_insurance_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_insurance_delete->modifiedby->headerCellClass() ?>"><span id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><?php echo $patient_insurance_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_insurance_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><?php echo $patient_insurance_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_insurance_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><?php echo $patient_insurance_delete->mrnno->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_insurance_delete->RecordCount = 0;
$i = 0;
while (!$patient_insurance_delete->Recordset->EOF) {
	$patient_insurance_delete->RecordCount++;
	$patient_insurance_delete->RowCount++;

	// Set row properties
	$patient_insurance->resetAttributes();
	$patient_insurance->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_insurance_delete->loadRowValues($patient_insurance_delete->Recordset);

	// Render row
	$patient_insurance_delete->renderRow();
?>
	<tr <?php echo $patient_insurance->rowAttributes() ?>>
<?php if ($patient_insurance_delete->id->Visible) { // id ?>
		<td <?php echo $patient_insurance_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_id" class="patient_insurance_id">
<span<?php echo $patient_insurance_delete->id->viewAttributes() ?>><?php echo $patient_insurance_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_insurance_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_Reception" class="patient_insurance_Reception">
<span<?php echo $patient_insurance_delete->Reception->viewAttributes() ?>><?php echo $patient_insurance_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_insurance_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_PatientId" class="patient_insurance_PatientId">
<span<?php echo $patient_insurance_delete->PatientId->viewAttributes() ?>><?php echo $patient_insurance_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_insurance_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_PatientName" class="patient_insurance_PatientName">
<span<?php echo $patient_insurance_delete->PatientName->viewAttributes() ?>><?php echo $patient_insurance_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->Company->Visible) { // Company ?>
		<td <?php echo $patient_insurance_delete->Company->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_Company" class="patient_insurance_Company">
<span<?php echo $patient_insurance_delete->Company->viewAttributes() ?>><?php echo $patient_insurance_delete->Company->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<td <?php echo $patient_insurance_delete->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance_delete->AddressInsuranceCarierName->viewAttributes() ?>><?php echo $patient_insurance_delete->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->ContactName->Visible) { // ContactName ?>
		<td <?php echo $patient_insurance_delete->ContactName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_ContactName" class="patient_insurance_ContactName">
<span<?php echo $patient_insurance_delete->ContactName->viewAttributes() ?>><?php echo $patient_insurance_delete->ContactName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->ContactMobile->Visible) { // ContactMobile ?>
		<td <?php echo $patient_insurance_delete->ContactMobile->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile">
<span<?php echo $patient_insurance_delete->ContactMobile->viewAttributes() ?>><?php echo $patient_insurance_delete->ContactMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyType->Visible) { // PolicyType ?>
		<td <?php echo $patient_insurance_delete->PolicyType->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_PolicyType" class="patient_insurance_PolicyType">
<span<?php echo $patient_insurance_delete->PolicyType->viewAttributes() ?>><?php echo $patient_insurance_delete->PolicyType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyName->Visible) { // PolicyName ?>
		<td <?php echo $patient_insurance_delete->PolicyName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_PolicyName" class="patient_insurance_PolicyName">
<span<?php echo $patient_insurance_delete->PolicyName->viewAttributes() ?>><?php echo $patient_insurance_delete->PolicyName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyNo->Visible) { // PolicyNo ?>
		<td <?php echo $patient_insurance_delete->PolicyNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo">
<span<?php echo $patient_insurance_delete->PolicyNo->viewAttributes() ?>><?php echo $patient_insurance_delete->PolicyNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->PolicyAmount->Visible) { // PolicyAmount ?>
		<td <?php echo $patient_insurance_delete->PolicyAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance_delete->PolicyAmount->viewAttributes() ?>><?php echo $patient_insurance_delete->PolicyAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->RefLetterNo->Visible) { // RefLetterNo ?>
		<td <?php echo $patient_insurance_delete->RefLetterNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance_delete->RefLetterNo->viewAttributes() ?>><?php echo $patient_insurance_delete->RefLetterNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->ReferenceBy->Visible) { // ReferenceBy ?>
		<td <?php echo $patient_insurance_delete->ReferenceBy->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance_delete->ReferenceBy->viewAttributes() ?>><?php echo $patient_insurance_delete->ReferenceBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->ReferenceDate->Visible) { // ReferenceDate ?>
		<td <?php echo $patient_insurance_delete->ReferenceDate->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance_delete->ReferenceDate->viewAttributes() ?>><?php echo $patient_insurance_delete->ReferenceDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $patient_insurance_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_createdby" class="patient_insurance_createdby">
<span<?php echo $patient_insurance_delete->createdby->viewAttributes() ?>><?php echo $patient_insurance_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $patient_insurance_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_createddatetime" class="patient_insurance_createddatetime">
<span<?php echo $patient_insurance_delete->createddatetime->viewAttributes() ?>><?php echo $patient_insurance_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $patient_insurance_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_modifiedby" class="patient_insurance_modifiedby">
<span<?php echo $patient_insurance_delete->modifiedby->viewAttributes() ?>><?php echo $patient_insurance_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $patient_insurance_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance_delete->modifieddatetime->viewAttributes() ?>><?php echo $patient_insurance_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_insurance_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCount ?>_patient_insurance_mrnno" class="patient_insurance_mrnno">
<span<?php echo $patient_insurance_delete->mrnno->viewAttributes() ?>><?php echo $patient_insurance_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_insurance_delete->Recordset->moveNext();
}
$patient_insurance_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_insurance_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_insurance_delete->showPageFooter();
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
$patient_insurance_delete->terminate();
?>