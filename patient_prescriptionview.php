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
<?php include_once "header.php" ?>
<?php if (!$patient_prescription->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_prescriptionview = currentForm = new ew.Form("fpatient_prescriptionview", "view");

// Form_CustomValidate event
fpatient_prescriptionview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_prescriptionview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_prescriptionview.lists["x_Medicine"] = <?php echo $patient_prescription_view->Medicine->Lookup->toClientList() ?>;
fpatient_prescriptionview.lists["x_Medicine"].options = <?php echo JsonEncode($patient_prescription_view->Medicine->lookupOptions()) ?>;
fpatient_prescriptionview.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionview.lists["x_PreRoute"] = <?php echo $patient_prescription_view->PreRoute->Lookup->toClientList() ?>;
fpatient_prescriptionview.lists["x_PreRoute"].options = <?php echo JsonEncode($patient_prescription_view->PreRoute->lookupOptions()) ?>;
fpatient_prescriptionview.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionview.lists["x_TimeOfTaking"] = <?php echo $patient_prescription_view->TimeOfTaking->Lookup->toClientList() ?>;
fpatient_prescriptionview.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($patient_prescription_view->TimeOfTaking->lookupOptions()) ?>;
fpatient_prescriptionview.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_prescriptionview.lists["x_Type"] = <?php echo $patient_prescription_view->Type->Lookup->toClientList() ?>;
fpatient_prescriptionview.lists["x_Type"].options = <?php echo JsonEncode($patient_prescription_view->Type->options(FALSE, TRUE)) ?>;
fpatient_prescriptionview.lists["x_Status"] = <?php echo $patient_prescription_view->Status->Lookup->toClientList() ?>;
fpatient_prescriptionview.lists["x_Status"].options = <?php echo JsonEncode($patient_prescription_view->Status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_prescription->isExport()) { ?>
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
<?php if ($patient_prescription_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_prescription_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="modal" value="<?php echo (int)$patient_prescription_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($patient_prescription->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_id"><?php echo $patient_prescription->id->caption() ?></span></td>
		<td data-name="id"<?php echo $patient_prescription->id->cellAttributes() ?>>
<span id="el_patient_prescription_id">
<span<?php echo $patient_prescription->id->viewAttributes() ?>>
<?php echo $patient_prescription->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Reception"><?php echo $patient_prescription->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $patient_prescription->Reception->cellAttributes() ?>>
<span id="el_patient_prescription_Reception">
<span<?php echo $patient_prescription->Reception->viewAttributes() ?>>
<?php echo $patient_prescription->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PatientId"><?php echo $patient_prescription->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $patient_prescription->PatientId->cellAttributes() ?>>
<span id="el_patient_prescription_PatientId">
<span<?php echo $patient_prescription->PatientId->viewAttributes() ?>>
<?php echo $patient_prescription->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PatientName"><?php echo $patient_prescription->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $patient_prescription->PatientName->cellAttributes() ?>>
<span id="el_patient_prescription_PatientName">
<span<?php echo $patient_prescription->PatientName->viewAttributes() ?>>
<?php echo $patient_prescription->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->Medicine->Visible) { // Medicine ?>
	<tr id="r_Medicine">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Medicine"><?php echo $patient_prescription->Medicine->caption() ?></span></td>
		<td data-name="Medicine"<?php echo $patient_prescription->Medicine->cellAttributes() ?>>
<span id="el_patient_prescription_Medicine">
<span<?php echo $patient_prescription->Medicine->viewAttributes() ?>>
<?php echo $patient_prescription->Medicine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->M->Visible) { // M ?>
	<tr id="r_M">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_M"><?php echo $patient_prescription->M->caption() ?></span></td>
		<td data-name="M"<?php echo $patient_prescription->M->cellAttributes() ?>>
<span id="el_patient_prescription_M">
<span<?php echo $patient_prescription->M->viewAttributes() ?>>
<?php echo $patient_prescription->M->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->A->Visible) { // A ?>
	<tr id="r_A">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_A"><?php echo $patient_prescription->A->caption() ?></span></td>
		<td data-name="A"<?php echo $patient_prescription->A->cellAttributes() ?>>
<span id="el_patient_prescription_A">
<span<?php echo $patient_prescription->A->viewAttributes() ?>>
<?php echo $patient_prescription->A->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->N->Visible) { // N ?>
	<tr id="r_N">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_N"><?php echo $patient_prescription->N->caption() ?></span></td>
		<td data-name="N"<?php echo $patient_prescription->N->cellAttributes() ?>>
<span id="el_patient_prescription_N">
<span<?php echo $patient_prescription->N->viewAttributes() ?>>
<?php echo $patient_prescription->N->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<tr id="r_NoOfDays">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_NoOfDays"><?php echo $patient_prescription->NoOfDays->caption() ?></span></td>
		<td data-name="NoOfDays"<?php echo $patient_prescription->NoOfDays->cellAttributes() ?>>
<span id="el_patient_prescription_NoOfDays">
<span<?php echo $patient_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $patient_prescription->NoOfDays->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->PreRoute->Visible) { // PreRoute ?>
	<tr id="r_PreRoute">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PreRoute"><?php echo $patient_prescription->PreRoute->caption() ?></span></td>
		<td data-name="PreRoute"<?php echo $patient_prescription->PreRoute->cellAttributes() ?>>
<span id="el_patient_prescription_PreRoute">
<span<?php echo $patient_prescription->PreRoute->viewAttributes() ?>>
<?php echo $patient_prescription->PreRoute->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<tr id="r_TimeOfTaking">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_TimeOfTaking"><?php echo $patient_prescription->TimeOfTaking->caption() ?></span></td>
		<td data-name="TimeOfTaking"<?php echo $patient_prescription->TimeOfTaking->cellAttributes() ?>>
<span id="el_patient_prescription_TimeOfTaking">
<span<?php echo $patient_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $patient_prescription->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Type"><?php echo $patient_prescription->Type->caption() ?></span></td>
		<td data-name="Type"<?php echo $patient_prescription->Type->cellAttributes() ?>>
<span id="el_patient_prescription_Type">
<span<?php echo $patient_prescription->Type->viewAttributes() ?>>
<?php echo $patient_prescription->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_mrnno"><?php echo $patient_prescription->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $patient_prescription->mrnno->cellAttributes() ?>>
<span id="el_patient_prescription_mrnno">
<span<?php echo $patient_prescription->mrnno->viewAttributes() ?>>
<?php echo $patient_prescription->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Age"><?php echo $patient_prescription->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $patient_prescription->Age->cellAttributes() ?>>
<span id="el_patient_prescription_Age">
<span<?php echo $patient_prescription->Age->viewAttributes() ?>>
<?php echo $patient_prescription->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Gender"><?php echo $patient_prescription->Gender->caption() ?></span></td>
		<td data-name="Gender"<?php echo $patient_prescription->Gender->cellAttributes() ?>>
<span id="el_patient_prescription_Gender">
<span<?php echo $patient_prescription->Gender->viewAttributes() ?>>
<?php echo $patient_prescription->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_profilePic"><?php echo $patient_prescription->profilePic->caption() ?></span></td>
		<td data-name="profilePic"<?php echo $patient_prescription->profilePic->cellAttributes() ?>>
<span id="el_patient_prescription_profilePic">
<span<?php echo $patient_prescription->profilePic->viewAttributes() ?>>
<?php echo $patient_prescription->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Status"><?php echo $patient_prescription->Status->caption() ?></span></td>
		<td data-name="Status"<?php echo $patient_prescription->Status->cellAttributes() ?>>
<span id="el_patient_prescription_Status">
<span<?php echo $patient_prescription->Status->viewAttributes() ?>>
<?php echo $patient_prescription->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_CreatedBy"><?php echo $patient_prescription->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $patient_prescription->CreatedBy->cellAttributes() ?>>
<span id="el_patient_prescription_CreatedBy">
<span<?php echo $patient_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $patient_prescription->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<tr id="r_CreateDateTime">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_CreateDateTime"><?php echo $patient_prescription->CreateDateTime->caption() ?></span></td>
		<td data-name="CreateDateTime"<?php echo $patient_prescription->CreateDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_CreateDateTime">
<span<?php echo $patient_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->CreateDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedBy"><?php echo $patient_prescription->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $patient_prescription->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedBy">
<span<?php echo $patient_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($patient_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $patient_prescription_view->TableLeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedDateTime"><?php echo $patient_prescription->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $patient_prescription->ModifiedDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedDateTime">
<span<?php echo $patient_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $patient_prescription->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$patient_prescription_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_prescription->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_prescription_view->terminate();
?>