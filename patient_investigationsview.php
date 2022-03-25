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
$patient_investigations_view = new patient_investigations_view();

// Run the page
$patient_investigations_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_investigations_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_investigations->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_investigationsview = currentForm = new ew.Form("fpatient_investigationsview", "view");

// Form_CustomValidate event
fpatient_investigationsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_investigationsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_investigations->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_investigations_view->ExportOptions->render("body") ?>
<?php $patient_investigations_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_investigations_view->showPageHeader(); ?>
<?php
$patient_investigations_view->showMessage();
?>
<form name="fpatient_investigationsview" id="fpatient_investigationsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_investigations_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_investigations_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="modal" value="<?php echo (int)$patient_investigations_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_investigations->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_id"><?php echo $patient_investigations->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_investigations->id->cellAttributes() ?>>
<span id="el_patient_investigations_id">
<span<?php echo $patient_investigations->id->viewAttributes() ?>>
<?php echo $patient_investigations->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Reception"><?php echo $patient_investigations->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $patient_investigations->Reception->cellAttributes() ?>>
<span id="el_patient_investigations_Reception">
<span<?php echo $patient_investigations->Reception->viewAttributes() ?>>
<?php echo $patient_investigations->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PatientId"><?php echo $patient_investigations->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $patient_investigations->PatientId->cellAttributes() ?>>
<span id="el_patient_investigations_PatientId">
<span<?php echo $patient_investigations->PatientId->viewAttributes() ?>>
<?php echo $patient_investigations->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PatientName"><?php echo $patient_investigations->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $patient_investigations->PatientName->cellAttributes() ?>>
<span id="el_patient_investigations_PatientName">
<span<?php echo $patient_investigations->PatientName->viewAttributes() ?>>
<?php echo $patient_investigations->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Investigation->Visible) { // Investigation ?>
	<tr id="r_Investigation">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Investigation"><?php echo $patient_investigations->Investigation->caption() ?></span></td>
		<td data-name="Investigation"<?php echo $patient_investigations->Investigation->cellAttributes() ?>>
<span id="el_patient_investigations_Investigation">
<span<?php echo $patient_investigations->Investigation->viewAttributes() ?>>
<?php echo $patient_investigations->Investigation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Value->Visible) { // Value ?>
	<tr id="r_Value">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Value"><?php echo $patient_investigations->Value->caption() ?></span></td>
		<td data-name="Value"<?php echo $patient_investigations->Value->cellAttributes() ?>>
<span id="el_patient_investigations_Value">
<span<?php echo $patient_investigations->Value->viewAttributes() ?>>
<?php echo $patient_investigations->Value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->NormalRange->Visible) { // NormalRange ?>
	<tr id="r_NormalRange">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_NormalRange"><?php echo $patient_investigations->NormalRange->caption() ?></span></td>
		<td data-name="NormalRange"<?php echo $patient_investigations->NormalRange->cellAttributes() ?>>
<span id="el_patient_investigations_NormalRange">
<span<?php echo $patient_investigations->NormalRange->viewAttributes() ?>>
<?php echo $patient_investigations->NormalRange->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_mrnno"><?php echo $patient_investigations->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $patient_investigations->mrnno->cellAttributes() ?>>
<span id="el_patient_investigations_mrnno">
<span<?php echo $patient_investigations->mrnno->viewAttributes() ?>>
<?php echo $patient_investigations->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Age"><?php echo $patient_investigations->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $patient_investigations->Age->cellAttributes() ?>>
<span id="el_patient_investigations_Age">
<span<?php echo $patient_investigations->Age->viewAttributes() ?>>
<?php echo $patient_investigations->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Gender"><?php echo $patient_investigations->Gender->caption() ?></span></td>
		<td data-name="Gender"<?php echo $patient_investigations->Gender->cellAttributes() ?>>
<span id="el_patient_investigations_Gender">
<span<?php echo $patient_investigations->Gender->viewAttributes() ?>>
<?php echo $patient_investigations->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_profilePic"><?php echo $patient_investigations->profilePic->caption() ?></span></td>
		<td data-name="profilePic"<?php echo $patient_investigations->profilePic->cellAttributes() ?>>
<span id="el_patient_investigations_profilePic">
<span<?php echo $patient_investigations->profilePic->viewAttributes() ?>>
<?php echo $patient_investigations->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->SampleCollected->Visible) { // SampleCollected ?>
	<tr id="r_SampleCollected">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_SampleCollected"><?php echo $patient_investigations->SampleCollected->caption() ?></span></td>
		<td data-name="SampleCollected"<?php echo $patient_investigations->SampleCollected->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollected">
<span<?php echo $patient_investigations->SampleCollected->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollected->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<tr id="r_SampleCollectedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_SampleCollectedBy"><?php echo $patient_investigations->SampleCollectedBy->caption() ?></span></td>
		<td data-name="SampleCollectedBy"<?php echo $patient_investigations->SampleCollectedBy->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations->SampleCollectedBy->viewAttributes() ?>>
<?php echo $patient_investigations->SampleCollectedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->ResultedDate->Visible) { // ResultedDate ?>
	<tr id="r_ResultedDate">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ResultedDate"><?php echo $patient_investigations->ResultedDate->caption() ?></span></td>
		<td data-name="ResultedDate"<?php echo $patient_investigations->ResultedDate->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedDate">
<span<?php echo $patient_investigations->ResultedDate->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->ResultedBy->Visible) { // ResultedBy ?>
	<tr id="r_ResultedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ResultedBy"><?php echo $patient_investigations->ResultedBy->caption() ?></span></td>
		<td data-name="ResultedBy"<?php echo $patient_investigations->ResultedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedBy">
<span<?php echo $patient_investigations->ResultedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ResultedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Modified"><?php echo $patient_investigations->Modified->caption() ?></span></td>
		<td data-name="Modified"<?php echo $patient_investigations->Modified->cellAttributes() ?>>
<span id="el_patient_investigations_Modified">
<span<?php echo $patient_investigations->Modified->viewAttributes() ?>>
<?php echo $patient_investigations->Modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ModifiedBy"><?php echo $patient_investigations->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $patient_investigations->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_investigations->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Created"><?php echo $patient_investigations->Created->caption() ?></span></td>
		<td data-name="Created"<?php echo $patient_investigations->Created->cellAttributes() ?>>
<span id="el_patient_investigations_Created">
<span<?php echo $patient_investigations->Created->viewAttributes() ?>>
<?php echo $patient_investigations->Created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_CreatedBy"><?php echo $patient_investigations->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $patient_investigations->CreatedBy->cellAttributes() ?>>
<span id="el_patient_investigations_CreatedBy">
<span<?php echo $patient_investigations->CreatedBy->viewAttributes() ?>>
<?php echo $patient_investigations->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->GroupHead->Visible) { // GroupHead ?>
	<tr id="r_GroupHead">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_GroupHead"><?php echo $patient_investigations->GroupHead->caption() ?></span></td>
		<td data-name="GroupHead"<?php echo $patient_investigations->GroupHead->cellAttributes() ?>>
<span id="el_patient_investigations_GroupHead">
<span<?php echo $patient_investigations->GroupHead->viewAttributes() ?>>
<?php echo $patient_investigations->GroupHead->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->Cost->Visible) { // Cost ?>
	<tr id="r_Cost">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Cost"><?php echo $patient_investigations->Cost->caption() ?></span></td>
		<td data-name="Cost"<?php echo $patient_investigations->Cost->cellAttributes() ?>>
<span id="el_patient_investigations_Cost">
<span<?php echo $patient_investigations->Cost->viewAttributes() ?>>
<?php echo $patient_investigations->Cost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PaymentStatus"><?php echo $patient_investigations->PaymentStatus->caption() ?></span></td>
		<td data-name="PaymentStatus"<?php echo $patient_investigations->PaymentStatus->cellAttributes() ?>>
<span id="el_patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations->PaymentStatus->viewAttributes() ?>>
<?php echo $patient_investigations->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->PayMode->Visible) { // PayMode ?>
	<tr id="r_PayMode">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PayMode"><?php echo $patient_investigations->PayMode->caption() ?></span></td>
		<td data-name="PayMode"<?php echo $patient_investigations->PayMode->cellAttributes() ?>>
<span id="el_patient_investigations_PayMode">
<span<?php echo $patient_investigations->PayMode->viewAttributes() ?>>
<?php echo $patient_investigations->PayMode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->VoucherNo->Visible) { // VoucherNo ?>
	<tr id="r_VoucherNo">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_VoucherNo"><?php echo $patient_investigations->VoucherNo->caption() ?></span></td>
		<td data-name="VoucherNo"<?php echo $patient_investigations->VoucherNo->cellAttributes() ?>>
<span id="el_patient_investigations_VoucherNo">
<span<?php echo $patient_investigations->VoucherNo->viewAttributes() ?>>
<?php echo $patient_investigations->VoucherNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations->InvestigationMultiselect->Visible) { // InvestigationMultiselect ?>
	<tr id="r_InvestigationMultiselect">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_InvestigationMultiselect"><?php echo $patient_investigations->InvestigationMultiselect->caption() ?></span></td>
		<td data-name="InvestigationMultiselect"<?php echo $patient_investigations->InvestigationMultiselect->cellAttributes() ?>>
<span id="el_patient_investigations_InvestigationMultiselect">
<span<?php echo $patient_investigations->InvestigationMultiselect->viewAttributes() ?>>
<?php echo $patient_investigations->InvestigationMultiselect->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_investigations_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_investigations->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_investigations_view->terminate();
?>