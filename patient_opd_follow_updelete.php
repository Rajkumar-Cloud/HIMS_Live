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
$patient_opd_follow_up_delete = new patient_opd_follow_up_delete();

// Run the page
$patient_opd_follow_up_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_opd_follow_updelete = currentForm = new ew.Form("fpatient_opd_follow_updelete", "delete");

// Form_CustomValidate event
fpatient_opd_follow_updelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_opd_follow_updelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_opd_follow_updelete.lists["x_ICSIAdvised[]"] = <?php echo $patient_opd_follow_up_delete->ICSIAdvised->Lookup->toClientList() ?>;
fpatient_opd_follow_updelete.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($patient_opd_follow_up_delete->ICSIAdvised->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_updelete.lists["x_DeliveryRegistered[]"] = <?php echo $patient_opd_follow_up_delete->DeliveryRegistered->Lookup->toClientList() ?>;
fpatient_opd_follow_updelete.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($patient_opd_follow_up_delete->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_updelete.lists["x_SerologyPositive[]"] = <?php echo $patient_opd_follow_up_delete->SerologyPositive->Lookup->toClientList() ?>;
fpatient_opd_follow_updelete.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($patient_opd_follow_up_delete->SerologyPositive->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_updelete.lists["x_Allergy"] = <?php echo $patient_opd_follow_up_delete->Allergy->Lookup->toClientList() ?>;
fpatient_opd_follow_updelete.lists["x_Allergy"].options = <?php echo JsonEncode($patient_opd_follow_up_delete->Allergy->lookupOptions()) ?>;
fpatient_opd_follow_updelete.autoSuggests["x_Allergy"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fpatient_opd_follow_updelete.lists["x_status"] = <?php echo $patient_opd_follow_up_delete->status->Lookup->toClientList() ?>;
fpatient_opd_follow_updelete.lists["x_status"].options = <?php echo JsonEncode($patient_opd_follow_up_delete->status->lookupOptions()) ?>;
fpatient_opd_follow_updelete.lists["x_reportheader[]"] = <?php echo $patient_opd_follow_up_delete->reportheader->Lookup->toClientList() ?>;
fpatient_opd_follow_updelete.lists["x_reportheader[]"].options = <?php echo JsonEncode($patient_opd_follow_up_delete->reportheader->options(FALSE, TRUE)) ?>;
fpatient_opd_follow_updelete.lists["x_DrName"] = <?php echo $patient_opd_follow_up_delete->DrName->Lookup->toClientList() ?>;
fpatient_opd_follow_updelete.lists["x_DrName"].options = <?php echo JsonEncode($patient_opd_follow_up_delete->DrName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_opd_follow_up_delete->showPageHeader(); ?>
<?php
$patient_opd_follow_up_delete->showMessage();
?>
<form name="fpatient_opd_follow_updelete" id="fpatient_opd_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_opd_follow_up_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_opd_follow_up_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_opd_follow_up_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
		<th class="<?php echo $patient_opd_follow_up->id->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id"><?php echo $patient_opd_follow_up->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_opd_follow_up->PatID->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID"><?php echo $patient_opd_follow_up->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_opd_follow_up->PatientName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName"><?php echo $patient_opd_follow_up->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_opd_follow_up->MobileNumber->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber"><?php echo $patient_opd_follow_up->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_opd_follow_up->Gender->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender"><?php echo $patient_opd_follow_up->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<th class="<?php echo $patient_opd_follow_up->NextReviewDate->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate"><?php echo $patient_opd_follow_up->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<th class="<?php echo $patient_opd_follow_up->ICSIAdvised->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised"><?php echo $patient_opd_follow_up->ICSIAdvised->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<th class="<?php echo $patient_opd_follow_up->DeliveryRegistered->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered"><?php echo $patient_opd_follow_up->DeliveryRegistered->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
		<th class="<?php echo $patient_opd_follow_up->EDD->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD"><?php echo $patient_opd_follow_up->EDD->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<th class="<?php echo $patient_opd_follow_up->SerologyPositive->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive"><?php echo $patient_opd_follow_up->SerologyPositive->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<th class="<?php echo $patient_opd_follow_up->Allergy->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy"><?php echo $patient_opd_follow_up->Allergy->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
		<th class="<?php echo $patient_opd_follow_up->status->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status"><?php echo $patient_opd_follow_up->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_opd_follow_up->createdby->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby"><?php echo $patient_opd_follow_up->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_opd_follow_up->createddatetime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime"><?php echo $patient_opd_follow_up->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_opd_follow_up->modifiedby->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby"><?php echo $patient_opd_follow_up->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_opd_follow_up->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime"><?php echo $patient_opd_follow_up->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
		<th class="<?php echo $patient_opd_follow_up->LMP->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP"><?php echo $patient_opd_follow_up->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<th class="<?php echo $patient_opd_follow_up->ProcedureDateTime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime"><?php echo $patient_opd_follow_up->ProcedureDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<th class="<?php echo $patient_opd_follow_up->ICSIDate->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate"><?php echo $patient_opd_follow_up->ICSIDate->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_opd_follow_up->HospID->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID"><?php echo $patient_opd_follow_up->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
		<th class="<?php echo $patient_opd_follow_up->createdUserName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName"><?php echo $patient_opd_follow_up->createdUserName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
		<th class="<?php echo $patient_opd_follow_up->reportheader->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader"><?php echo $patient_opd_follow_up->reportheader->caption() ?></span></th>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
		<th class="<?php echo $patient_opd_follow_up->DrName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_DrName" class="patient_opd_follow_up_DrName"><?php echo $patient_opd_follow_up->DrName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_opd_follow_up_delete->RecCnt = 0;
$i = 0;
while (!$patient_opd_follow_up_delete->Recordset->EOF) {
	$patient_opd_follow_up_delete->RecCnt++;
	$patient_opd_follow_up_delete->RowCnt++;

	// Set row properties
	$patient_opd_follow_up->resetAttributes();
	$patient_opd_follow_up->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_opd_follow_up_delete->loadRowValues($patient_opd_follow_up_delete->Recordset);

	// Render row
	$patient_opd_follow_up_delete->renderRow();
?>
	<tr<?php echo $patient_opd_follow_up->rowAttributes() ?>>
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
		<td<?php echo $patient_opd_follow_up->id->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up->id->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_opd_follow_up->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID">
<span<?php echo $patient_opd_follow_up->PatID->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_opd_follow_up->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_opd_follow_up->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber">
<span<?php echo $patient_opd_follow_up->MobileNumber->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_opd_follow_up->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<td<?php echo $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
		<td<?php echo $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
		<td<?php echo $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
		<td<?php echo $patient_opd_follow_up->EDD->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->EDD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
		<td<?php echo $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
		<td<?php echo $patient_opd_follow_up->Allergy->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
		<td<?php echo $patient_opd_follow_up->status->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up->status->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_opd_follow_up->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_opd_follow_up->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_opd_follow_up->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
		<td<?php echo $patient_opd_follow_up->LMP->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
		<td<?php echo $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
		<td<?php echo $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_opd_follow_up->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID">
<span<?php echo $patient_opd_follow_up->HospID->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
		<td<?php echo $patient_opd_follow_up->createdUserName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName">
<span<?php echo $patient_opd_follow_up->createdUserName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->createdUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
		<td<?php echo $patient_opd_follow_up->reportheader->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader">
<span<?php echo $patient_opd_follow_up->reportheader->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->reportheader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
		<td<?php echo $patient_opd_follow_up->DrName->cellAttributes() ?>>
<span id="el<?php echo $patient_opd_follow_up_delete->RowCnt ?>_patient_opd_follow_up_DrName" class="patient_opd_follow_up_DrName">
<span<?php echo $patient_opd_follow_up->DrName->viewAttributes() ?>>
<?php echo $patient_opd_follow_up->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_opd_follow_up_delete->Recordset->moveNext();
}
$patient_opd_follow_up_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_opd_follow_up_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_opd_follow_up_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_opd_follow_up_delete->terminate();
?>