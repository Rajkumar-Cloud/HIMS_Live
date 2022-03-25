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
<?php include_once "header.php"; ?>
<?php if (!$patient_investigations_view->isExport()) { ?>
<script>
var fpatient_investigationsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_investigationsview = currentForm = new ew.Form("fpatient_investigationsview", "view");
	loadjs.done("fpatient_investigationsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_investigations_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="modal" value="<?php echo (int)$patient_investigations_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_investigations_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_id"><?php echo $patient_investigations_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $patient_investigations_view->id->cellAttributes() ?>>
<span id="el_patient_investigations_id">
<span<?php echo $patient_investigations_view->id->viewAttributes() ?>><?php echo $patient_investigations_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Reception"><?php echo $patient_investigations_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $patient_investigations_view->Reception->cellAttributes() ?>>
<span id="el_patient_investigations_Reception">
<span<?php echo $patient_investigations_view->Reception->viewAttributes() ?>><?php echo $patient_investigations_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PatientId"><?php echo $patient_investigations_view->PatientId->caption() ?></span></td>
		<td data-name="PatientId" <?php echo $patient_investigations_view->PatientId->cellAttributes() ?>>
<span id="el_patient_investigations_PatientId">
<span<?php echo $patient_investigations_view->PatientId->viewAttributes() ?>><?php echo $patient_investigations_view->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PatientName"><?php echo $patient_investigations_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $patient_investigations_view->PatientName->cellAttributes() ?>>
<span id="el_patient_investigations_PatientName">
<span<?php echo $patient_investigations_view->PatientName->viewAttributes() ?>><?php echo $patient_investigations_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Investigation->Visible) { // Investigation ?>
	<tr id="r_Investigation">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Investigation"><?php echo $patient_investigations_view->Investigation->caption() ?></span></td>
		<td data-name="Investigation" <?php echo $patient_investigations_view->Investigation->cellAttributes() ?>>
<span id="el_patient_investigations_Investigation">
<span<?php echo $patient_investigations_view->Investigation->viewAttributes() ?>><?php echo $patient_investigations_view->Investigation->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Value->Visible) { // Value ?>
	<tr id="r_Value">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Value"><?php echo $patient_investigations_view->Value->caption() ?></span></td>
		<td data-name="Value" <?php echo $patient_investigations_view->Value->cellAttributes() ?>>
<span id="el_patient_investigations_Value">
<span<?php echo $patient_investigations_view->Value->viewAttributes() ?>><?php echo $patient_investigations_view->Value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->NormalRange->Visible) { // NormalRange ?>
	<tr id="r_NormalRange">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_NormalRange"><?php echo $patient_investigations_view->NormalRange->caption() ?></span></td>
		<td data-name="NormalRange" <?php echo $patient_investigations_view->NormalRange->cellAttributes() ?>>
<span id="el_patient_investigations_NormalRange">
<span<?php echo $patient_investigations_view->NormalRange->viewAttributes() ?>><?php echo $patient_investigations_view->NormalRange->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_mrnno"><?php echo $patient_investigations_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $patient_investigations_view->mrnno->cellAttributes() ?>>
<span id="el_patient_investigations_mrnno">
<span<?php echo $patient_investigations_view->mrnno->viewAttributes() ?>><?php echo $patient_investigations_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Age"><?php echo $patient_investigations_view->Age->caption() ?></span></td>
		<td data-name="Age" <?php echo $patient_investigations_view->Age->cellAttributes() ?>>
<span id="el_patient_investigations_Age">
<span<?php echo $patient_investigations_view->Age->viewAttributes() ?>><?php echo $patient_investigations_view->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Gender"><?php echo $patient_investigations_view->Gender->caption() ?></span></td>
		<td data-name="Gender" <?php echo $patient_investigations_view->Gender->cellAttributes() ?>>
<span id="el_patient_investigations_Gender">
<span<?php echo $patient_investigations_view->Gender->viewAttributes() ?>><?php echo $patient_investigations_view->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_profilePic"><?php echo $patient_investigations_view->profilePic->caption() ?></span></td>
		<td data-name="profilePic" <?php echo $patient_investigations_view->profilePic->cellAttributes() ?>>
<span id="el_patient_investigations_profilePic">
<span<?php echo $patient_investigations_view->profilePic->viewAttributes() ?>><?php echo $patient_investigations_view->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->SampleCollected->Visible) { // SampleCollected ?>
	<tr id="r_SampleCollected">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_SampleCollected"><?php echo $patient_investigations_view->SampleCollected->caption() ?></span></td>
		<td data-name="SampleCollected" <?php echo $patient_investigations_view->SampleCollected->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollected">
<span<?php echo $patient_investigations_view->SampleCollected->viewAttributes() ?>><?php echo $patient_investigations_view->SampleCollected->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
	<tr id="r_SampleCollectedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_SampleCollectedBy"><?php echo $patient_investigations_view->SampleCollectedBy->caption() ?></span></td>
		<td data-name="SampleCollectedBy" <?php echo $patient_investigations_view->SampleCollectedBy->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollectedBy">
<span<?php echo $patient_investigations_view->SampleCollectedBy->viewAttributes() ?>><?php echo $patient_investigations_view->SampleCollectedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->ResultedDate->Visible) { // ResultedDate ?>
	<tr id="r_ResultedDate">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ResultedDate"><?php echo $patient_investigations_view->ResultedDate->caption() ?></span></td>
		<td data-name="ResultedDate" <?php echo $patient_investigations_view->ResultedDate->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedDate">
<span<?php echo $patient_investigations_view->ResultedDate->viewAttributes() ?>><?php echo $patient_investigations_view->ResultedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->ResultedBy->Visible) { // ResultedBy ?>
	<tr id="r_ResultedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ResultedBy"><?php echo $patient_investigations_view->ResultedBy->caption() ?></span></td>
		<td data-name="ResultedBy" <?php echo $patient_investigations_view->ResultedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedBy">
<span<?php echo $patient_investigations_view->ResultedBy->viewAttributes() ?>><?php echo $patient_investigations_view->ResultedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Modified->Visible) { // Modified ?>
	<tr id="r_Modified">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Modified"><?php echo $patient_investigations_view->Modified->caption() ?></span></td>
		<td data-name="Modified" <?php echo $patient_investigations_view->Modified->cellAttributes() ?>>
<span id="el_patient_investigations_Modified">
<span<?php echo $patient_investigations_view->Modified->viewAttributes() ?>><?php echo $patient_investigations_view->Modified->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ModifiedBy"><?php echo $patient_investigations_view->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy" <?php echo $patient_investigations_view->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ModifiedBy">
<span<?php echo $patient_investigations_view->ModifiedBy->viewAttributes() ?>><?php echo $patient_investigations_view->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Created->Visible) { // Created ?>
	<tr id="r_Created">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Created"><?php echo $patient_investigations_view->Created->caption() ?></span></td>
		<td data-name="Created" <?php echo $patient_investigations_view->Created->cellAttributes() ?>>
<span id="el_patient_investigations_Created">
<span<?php echo $patient_investigations_view->Created->viewAttributes() ?>><?php echo $patient_investigations_view->Created->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_CreatedBy"><?php echo $patient_investigations_view->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy" <?php echo $patient_investigations_view->CreatedBy->cellAttributes() ?>>
<span id="el_patient_investigations_CreatedBy">
<span<?php echo $patient_investigations_view->CreatedBy->viewAttributes() ?>><?php echo $patient_investigations_view->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->GroupHead->Visible) { // GroupHead ?>
	<tr id="r_GroupHead">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_GroupHead"><?php echo $patient_investigations_view->GroupHead->caption() ?></span></td>
		<td data-name="GroupHead" <?php echo $patient_investigations_view->GroupHead->cellAttributes() ?>>
<span id="el_patient_investigations_GroupHead">
<span<?php echo $patient_investigations_view->GroupHead->viewAttributes() ?>><?php echo $patient_investigations_view->GroupHead->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->Cost->Visible) { // Cost ?>
	<tr id="r_Cost">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Cost"><?php echo $patient_investigations_view->Cost->caption() ?></span></td>
		<td data-name="Cost" <?php echo $patient_investigations_view->Cost->cellAttributes() ?>>
<span id="el_patient_investigations_Cost">
<span<?php echo $patient_investigations_view->Cost->viewAttributes() ?>><?php echo $patient_investigations_view->Cost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->PaymentStatus->Visible) { // PaymentStatus ?>
	<tr id="r_PaymentStatus">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PaymentStatus"><?php echo $patient_investigations_view->PaymentStatus->caption() ?></span></td>
		<td data-name="PaymentStatus" <?php echo $patient_investigations_view->PaymentStatus->cellAttributes() ?>>
<span id="el_patient_investigations_PaymentStatus">
<span<?php echo $patient_investigations_view->PaymentStatus->viewAttributes() ?>><?php echo $patient_investigations_view->PaymentStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->PayMode->Visible) { // PayMode ?>
	<tr id="r_PayMode">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PayMode"><?php echo $patient_investigations_view->PayMode->caption() ?></span></td>
		<td data-name="PayMode" <?php echo $patient_investigations_view->PayMode->cellAttributes() ?>>
<span id="el_patient_investigations_PayMode">
<span<?php echo $patient_investigations_view->PayMode->viewAttributes() ?>><?php echo $patient_investigations_view->PayMode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->VoucherNo->Visible) { // VoucherNo ?>
	<tr id="r_VoucherNo">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_VoucherNo"><?php echo $patient_investigations_view->VoucherNo->caption() ?></span></td>
		<td data-name="VoucherNo" <?php echo $patient_investigations_view->VoucherNo->cellAttributes() ?>>
<span id="el_patient_investigations_VoucherNo">
<span<?php echo $patient_investigations_view->VoucherNo->viewAttributes() ?>><?php echo $patient_investigations_view->VoucherNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_investigations_view->InvestigationMultiselect->Visible) { // InvestigationMultiselect ?>
	<tr id="r_InvestigationMultiselect">
		<td class="<?php echo $patient_investigations_view->TableLeftColumnClass ?>"><span id="elh_patient_investigations_InvestigationMultiselect"><?php echo $patient_investigations_view->InvestigationMultiselect->caption() ?></span></td>
		<td data-name="InvestigationMultiselect" <?php echo $patient_investigations_view->InvestigationMultiselect->cellAttributes() ?>>
<span id="el_patient_investigations_InvestigationMultiselect">
<span<?php echo $patient_investigations_view->InvestigationMultiselect->viewAttributes() ?>><?php echo $patient_investigations_view->InvestigationMultiselect->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_investigations_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_investigations_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_investigations_view->terminate();
?>