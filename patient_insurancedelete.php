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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_insurancedelete = currentForm = new ew.Form("fpatient_insurancedelete", "delete");

// Form_CustomValidate event
fpatient_insurancedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_insurancedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_insurance_delete->showPageHeader(); ?>
<?php
$patient_insurance_delete->showMessage();
?>
<form name="fpatient_insurancedelete" id="fpatient_insurancedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_insurance_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_insurance_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_insurance_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_insurance->id->Visible) { // id ?>
		<th class="<?php echo $patient_insurance->id->headerCellClass() ?>"><span id="elh_patient_insurance_id" class="patient_insurance_id"><?php echo $patient_insurance->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_insurance->Reception->headerCellClass() ?>"><span id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><?php echo $patient_insurance->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_insurance->PatientId->headerCellClass() ?>"><span id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><?php echo $patient_insurance->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_insurance->PatientName->headerCellClass() ?>"><span id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><?php echo $patient_insurance->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->Company->Visible) { // Company ?>
		<th class="<?php echo $patient_insurance->Company->headerCellClass() ?>"><span id="elh_patient_insurance_Company" class="patient_insurance_Company"><?php echo $patient_insurance->Company->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<th class="<?php echo $patient_insurance->AddressInsuranceCarierName->headerCellClass() ?>"><span id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><?php echo $patient_insurance->AddressInsuranceCarierName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
		<th class="<?php echo $patient_insurance->ContactName->headerCellClass() ?>"><span id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><?php echo $patient_insurance->ContactName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
		<th class="<?php echo $patient_insurance->ContactMobile->headerCellClass() ?>"><span id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><?php echo $patient_insurance->ContactMobile->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
		<th class="<?php echo $patient_insurance->PolicyType->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><?php echo $patient_insurance->PolicyType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
		<th class="<?php echo $patient_insurance->PolicyName->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><?php echo $patient_insurance->PolicyName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
		<th class="<?php echo $patient_insurance->PolicyNo->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><?php echo $patient_insurance->PolicyNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
		<th class="<?php echo $patient_insurance->PolicyAmount->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><?php echo $patient_insurance->PolicyAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
		<th class="<?php echo $patient_insurance->RefLetterNo->headerCellClass() ?>"><span id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><?php echo $patient_insurance->RefLetterNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
		<th class="<?php echo $patient_insurance->ReferenceBy->headerCellClass() ?>"><span id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><?php echo $patient_insurance->ReferenceBy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
		<th class="<?php echo $patient_insurance->ReferenceDate->headerCellClass() ?>"><span id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><?php echo $patient_insurance->ReferenceDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_insurance->createdby->headerCellClass() ?>"><span id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><?php echo $patient_insurance->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_insurance->createddatetime->headerCellClass() ?>"><span id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><?php echo $patient_insurance->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_insurance->modifiedby->headerCellClass() ?>"><span id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><?php echo $patient_insurance->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_insurance->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><?php echo $patient_insurance->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_insurance->mrnno->headerCellClass() ?>"><span id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><?php echo $patient_insurance->mrnno->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_insurance_delete->RecCnt = 0;
$i = 0;
while (!$patient_insurance_delete->Recordset->EOF) {
	$patient_insurance_delete->RecCnt++;
	$patient_insurance_delete->RowCnt++;

	// Set row properties
	$patient_insurance->resetAttributes();
	$patient_insurance->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_insurance_delete->loadRowValues($patient_insurance_delete->Recordset);

	// Render row
	$patient_insurance_delete->renderRow();
?>
	<tr<?php echo $patient_insurance->rowAttributes() ?>>
<?php if ($patient_insurance->id->Visible) { // id ?>
		<td<?php echo $patient_insurance->id->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_id" class="patient_insurance_id">
<span<?php echo $patient_insurance->id->viewAttributes() ?>>
<?php echo $patient_insurance->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_insurance->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_Reception" class="patient_insurance_Reception">
<span<?php echo $patient_insurance->Reception->viewAttributes() ?>>
<?php echo $patient_insurance->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_insurance->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_PatientId" class="patient_insurance_PatientId">
<span<?php echo $patient_insurance->PatientId->viewAttributes() ?>>
<?php echo $patient_insurance->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_insurance->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_PatientName" class="patient_insurance_PatientName">
<span<?php echo $patient_insurance->PatientName->viewAttributes() ?>>
<?php echo $patient_insurance->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->Company->Visible) { // Company ?>
		<td<?php echo $patient_insurance->Company->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_Company" class="patient_insurance_Company">
<span<?php echo $patient_insurance->Company->viewAttributes() ?>>
<?php echo $patient_insurance->Company->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
		<td<?php echo $patient_insurance->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName">
<span<?php echo $patient_insurance->AddressInsuranceCarierName->viewAttributes() ?>>
<?php echo $patient_insurance->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->ContactName->Visible) { // ContactName ?>
		<td<?php echo $patient_insurance->ContactName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_ContactName" class="patient_insurance_ContactName">
<span<?php echo $patient_insurance->ContactName->viewAttributes() ?>>
<?php echo $patient_insurance->ContactName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->ContactMobile->Visible) { // ContactMobile ?>
		<td<?php echo $patient_insurance->ContactMobile->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile">
<span<?php echo $patient_insurance->ContactMobile->viewAttributes() ?>>
<?php echo $patient_insurance->ContactMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyType->Visible) { // PolicyType ?>
		<td<?php echo $patient_insurance->PolicyType->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_PolicyType" class="patient_insurance_PolicyType">
<span<?php echo $patient_insurance->PolicyType->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyName->Visible) { // PolicyName ?>
		<td<?php echo $patient_insurance->PolicyName->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_PolicyName" class="patient_insurance_PolicyName">
<span<?php echo $patient_insurance->PolicyName->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyNo->Visible) { // PolicyNo ?>
		<td<?php echo $patient_insurance->PolicyNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo">
<span<?php echo $patient_insurance->PolicyNo->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->PolicyAmount->Visible) { // PolicyAmount ?>
		<td<?php echo $patient_insurance->PolicyAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount">
<span<?php echo $patient_insurance->PolicyAmount->viewAttributes() ?>>
<?php echo $patient_insurance->PolicyAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->RefLetterNo->Visible) { // RefLetterNo ?>
		<td<?php echo $patient_insurance->RefLetterNo->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo">
<span<?php echo $patient_insurance->RefLetterNo->viewAttributes() ?>>
<?php echo $patient_insurance->RefLetterNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->ReferenceBy->Visible) { // ReferenceBy ?>
		<td<?php echo $patient_insurance->ReferenceBy->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy">
<span<?php echo $patient_insurance->ReferenceBy->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->ReferenceDate->Visible) { // ReferenceDate ?>
		<td<?php echo $patient_insurance->ReferenceDate->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate">
<span<?php echo $patient_insurance->ReferenceDate->viewAttributes() ?>>
<?php echo $patient_insurance->ReferenceDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_insurance->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_createdby" class="patient_insurance_createdby">
<span<?php echo $patient_insurance->createdby->viewAttributes() ?>>
<?php echo $patient_insurance->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_insurance->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_createddatetime" class="patient_insurance_createddatetime">
<span<?php echo $patient_insurance->createddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_insurance->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_modifiedby" class="patient_insurance_modifiedby">
<span<?php echo $patient_insurance->modifiedby->viewAttributes() ?>>
<?php echo $patient_insurance->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_insurance->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime">
<span<?php echo $patient_insurance->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_insurance->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_insurance->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_insurance->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_insurance_delete->RowCnt ?>_patient_insurance_mrnno" class="patient_insurance_mrnno">
<span<?php echo $patient_insurance->mrnno->viewAttributes() ?>>
<?php echo $patient_insurance->mrnno->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_insurance_delete->terminate();
?>