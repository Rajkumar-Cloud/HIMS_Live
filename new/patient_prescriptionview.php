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
$patient_prescription_view = new patient_prescription_view();

// Run the page
$patient_prescription_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_prescription_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_prescription_view->isExport()) { ?>
<script>
var fpatient_prescriptionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_prescriptionview = currentForm = new ew.Form("fpatient_prescriptionview", "view");
	loadjs.done("fpatient_prescriptionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_prescription_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_prescription_view->ExportOptions->render("body") ?>
<?php $patient_prescription_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_prescription_view->showPageHeader(); ?>
<?php
$patient_prescription_view->showMessage();
?>
<form name="fpatient_prescriptionview" id="fpatient_prescriptionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="modal" value="<?php echo (int)$patient_prescription_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_prescription_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_id"><?php echo $patient_prescription_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $patient_prescription_view->id->cellAttributes() ?>>
<span id="el_patient_prescription_id">
<span<?php echo $patient_prescription_view->id->viewAttributes() ?>><?php echo $patient_prescription_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Reception"><?php echo $patient_prescription_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $patient_prescription_view->Reception->cellAttributes() ?>>
<span id="el_patient_prescription_Reception">
<span<?php echo $patient_prescription_view->Reception->viewAttributes() ?>><?php echo $patient_prescription_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PatientId"><?php echo $patient_prescription_view->PatientId->caption() ?></span></td>
		<td data-name="PatientId" <?php echo $patient_prescription_view->PatientId->cellAttributes() ?>>
<span id="el_patient_prescription_PatientId">
<span<?php echo $patient_prescription_view->PatientId->viewAttributes() ?>><?php echo $patient_prescription_view->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PatientName"><?php echo $patient_prescription_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $patient_prescription_view->PatientName->cellAttributes() ?>>
<span id="el_patient_prescription_PatientName">
<span<?php echo $patient_prescription_view->PatientName->viewAttributes() ?>><?php echo $patient_prescription_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->Medicine->Visible) { // Medicine ?>
	<tr id="r_Medicine">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Medicine"><?php echo $patient_prescription_view->Medicine->caption() ?></span></td>
		<td data-name="Medicine" <?php echo $patient_prescription_view->Medicine->cellAttributes() ?>>
<span id="el_patient_prescription_Medicine">
<span<?php echo $patient_prescription_view->Medicine->viewAttributes() ?>><?php echo $patient_prescription_view->Medicine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->M->Visible) { // M ?>
	<tr id="r_M">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_M"><?php echo $patient_prescription_view->M->caption() ?></span></td>
		<td data-name="M" <?php echo $patient_prescription_view->M->cellAttributes() ?>>
<span id="el_patient_prescription_M">
<span<?php echo $patient_prescription_view->M->viewAttributes() ?>><?php echo $patient_prescription_view->M->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->A->Visible) { // A ?>
	<tr id="r_A">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_A"><?php echo $patient_prescription_view->A->caption() ?></span></td>
		<td data-name="A" <?php echo $patient_prescription_view->A->cellAttributes() ?>>
<span id="el_patient_prescription_A">
<span<?php echo $patient_prescription_view->A->viewAttributes() ?>><?php echo $patient_prescription_view->A->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->N->Visible) { // N ?>
	<tr id="r_N">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_N"><?php echo $patient_prescription_view->N->caption() ?></span></td>
		<td data-name="N" <?php echo $patient_prescription_view->N->cellAttributes() ?>>
<span id="el_patient_prescription_N">
<span<?php echo $patient_prescription_view->N->viewAttributes() ?>><?php echo $patient_prescription_view->N->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->NoOfDays->Visible) { // NoOfDays ?>
	<tr id="r_NoOfDays">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_NoOfDays"><?php echo $patient_prescription_view->NoOfDays->caption() ?></span></td>
		<td data-name="NoOfDays" <?php echo $patient_prescription_view->NoOfDays->cellAttributes() ?>>
<span id="el_patient_prescription_NoOfDays">
<span<?php echo $patient_prescription_view->NoOfDays->viewAttributes() ?>><?php echo $patient_prescription_view->NoOfDays->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->PreRoute->Visible) { // PreRoute ?>
	<tr id="r_PreRoute">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PreRoute"><?php echo $patient_prescription_view->PreRoute->caption() ?></span></td>
		<td data-name="PreRoute" <?php echo $patient_prescription_view->PreRoute->cellAttributes() ?>>
<span id="el_patient_prescription_PreRoute">
<span<?php echo $patient_prescription_view->PreRoute->viewAttributes() ?>><?php echo $patient_prescription_view->PreRoute->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<tr id="r_TimeOfTaking">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_TimeOfTaking"><?php echo $patient_prescription_view->TimeOfTaking->caption() ?></span></td>
		<td data-name="TimeOfTaking" <?php echo $patient_prescription_view->TimeOfTaking->cellAttributes() ?>>
<span id="el_patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription_view->TimeOfTaking->viewAttributes() ?>><?php echo $patient_prescription_view->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Type"><?php echo $patient_prescription_view->Type->caption() ?></span></td>
		<td data-name="Type" <?php echo $patient_prescription_view->Type->cellAttributes() ?>>
<span id="el_patient_prescription_Type">
<span<?php echo $patient_prescription_view->Type->viewAttributes() ?>><?php echo $patient_prescription_view->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_mrnno"><?php echo $patient_prescription_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $patient_prescription_view->mrnno->cellAttributes() ?>>
<span id="el_patient_prescription_mrnno">
<span<?php echo $patient_prescription_view->mrnno->viewAttributes() ?>><?php echo $patient_prescription_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Age"><?php echo $patient_prescription_view->Age->caption() ?></span></td>
		<td data-name="Age" <?php echo $patient_prescription_view->Age->cellAttributes() ?>>
<span id="el_patient_prescription_Age">
<span<?php echo $patient_prescription_view->Age->viewAttributes() ?>><?php echo $patient_prescription_view->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Gender"><?php echo $patient_prescription_view->Gender->caption() ?></span></td>
		<td data-name="Gender" <?php echo $patient_prescription_view->Gender->cellAttributes() ?>>
<span id="el_patient_prescription_Gender">
<span<?php echo $patient_prescription_view->Gender->viewAttributes() ?>><?php echo $patient_prescription_view->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_profilePic"><?php echo $patient_prescription_view->profilePic->caption() ?></span></td>
		<td data-name="profilePic" <?php echo $patient_prescription_view->profilePic->cellAttributes() ?>>
<span id="el_patient_prescription_profilePic">
<span<?php echo $patient_prescription_view->profilePic->viewAttributes() ?>><?php echo $patient_prescription_view->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Status"><?php echo $patient_prescription_view->Status->caption() ?></span></td>
		<td data-name="Status" <?php echo $patient_prescription_view->Status->cellAttributes() ?>>
<span id="el_patient_prescription_Status">
<span<?php echo $patient_prescription_view->Status->viewAttributes() ?>><?php echo $patient_prescription_view->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_CreatedBy"><?php echo $patient_prescription_view->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy" <?php echo $patient_prescription_view->CreatedBy->cellAttributes() ?>>
<span id="el_patient_prescription_CreatedBy">
<span<?php echo $patient_prescription_view->CreatedBy->viewAttributes() ?>><?php echo $patient_prescription_view->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->CreateDateTime->Visible) { // CreateDateTime ?>
	<tr id="r_CreateDateTime">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_CreateDateTime"><?php echo $patient_prescription_view->CreateDateTime->caption() ?></span></td>
		<td data-name="CreateDateTime" <?php echo $patient_prescription_view->CreateDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription_view->CreateDateTime->viewAttributes() ?>><?php echo $patient_prescription_view->CreateDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedBy"><?php echo $patient_prescription_view->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy" <?php echo $patient_prescription_view->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription_view->ModifiedBy->viewAttributes() ?>><?php echo $patient_prescription_view->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedDateTime"><?php echo $patient_prescription_view->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime" <?php echo $patient_prescription_view->ModifiedDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription_view->ModifiedDateTime->viewAttributes() ?>><?php echo $patient_prescription_view->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_prescription_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_prescription_view->isExport()) { ?>
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
$patient_prescription_view->terminate();
?>