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
$_appointment_scheduler_delete = new _appointment_scheduler_delete();

// Run the page
$_appointment_scheduler_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_appointment_scheduler_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var f_appointment_schedulerdelete = currentForm = new ew.Form("f_appointment_schedulerdelete", "delete");

// Form_CustomValidate event
f_appointment_schedulerdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_appointment_schedulerdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_appointment_schedulerdelete.lists["x_patientID"] = <?php echo $_appointment_scheduler_delete->patientID->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_patientID"].options = <?php echo JsonEncode($_appointment_scheduler_delete->patientID->lookupOptions()) ?>;
f_appointment_schedulerdelete.lists["x_DoctorName"] = <?php echo $_appointment_scheduler_delete->DoctorName->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_DoctorName"].options = <?php echo JsonEncode($_appointment_scheduler_delete->DoctorName->lookupOptions()) ?>;
f_appointment_schedulerdelete.lists["x_status[]"] = <?php echo $_appointment_scheduler_delete->status->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_status[]"].options = <?php echo JsonEncode($_appointment_scheduler_delete->status->options(FALSE, TRUE)) ?>;
f_appointment_schedulerdelete.lists["x_appointment_type"] = <?php echo $_appointment_scheduler_delete->appointment_type->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_appointment_type"].options = <?php echo JsonEncode($_appointment_scheduler_delete->appointment_type->options(FALSE, TRUE)) ?>;
f_appointment_schedulerdelete.lists["x_Notified[]"] = <?php echo $_appointment_scheduler_delete->Notified->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_Notified[]"].options = <?php echo JsonEncode($_appointment_scheduler_delete->Notified->options(FALSE, TRUE)) ?>;
f_appointment_schedulerdelete.lists["x_PatientType"] = <?php echo $_appointment_scheduler_delete->PatientType->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_PatientType"].options = <?php echo JsonEncode($_appointment_scheduler_delete->PatientType->options(FALSE, TRUE)) ?>;
f_appointment_schedulerdelete.lists["x_Referal"] = <?php echo $_appointment_scheduler_delete->Referal->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_Referal"].options = <?php echo JsonEncode($_appointment_scheduler_delete->Referal->lookupOptions()) ?>;
f_appointment_schedulerdelete.lists["x_WhereDidYouHear[]"] = <?php echo $_appointment_scheduler_delete->WhereDidYouHear->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($_appointment_scheduler_delete->WhereDidYouHear->lookupOptions()) ?>;
f_appointment_schedulerdelete.lists["x_PatientTypee"] = <?php echo $_appointment_scheduler_delete->PatientTypee->Lookup->toClientList() ?>;
f_appointment_schedulerdelete.lists["x_PatientTypee"].options = <?php echo JsonEncode($_appointment_scheduler_delete->PatientTypee->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $_appointment_scheduler_delete->showPageHeader(); ?>
<?php
$_appointment_scheduler_delete->showMessage();
?>
<form name="f_appointment_schedulerdelete" id="f_appointment_schedulerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_appointment_scheduler_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_appointment_scheduler_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_appointment_scheduler">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($_appointment_scheduler_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
		<th class="<?php echo $_appointment_scheduler->id->headerCellClass() ?>"><span id="elh__appointment_scheduler_id" class="_appointment_scheduler_id"><?php echo $_appointment_scheduler->id->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
		<th class="<?php echo $_appointment_scheduler->start_date->headerCellClass() ?>"><span id="elh__appointment_scheduler_start_date" class="_appointment_scheduler_start_date"><?php echo $_appointment_scheduler->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
		<th class="<?php echo $_appointment_scheduler->end_date->headerCellClass() ?>"><span id="elh__appointment_scheduler_end_date" class="_appointment_scheduler_end_date"><?php echo $_appointment_scheduler->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
		<th class="<?php echo $_appointment_scheduler->patientID->headerCellClass() ?>"><span id="elh__appointment_scheduler_patientID" class="_appointment_scheduler_patientID"><?php echo $_appointment_scheduler->patientID->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
		<th class="<?php echo $_appointment_scheduler->patientName->headerCellClass() ?>"><span id="elh__appointment_scheduler_patientName" class="_appointment_scheduler_patientName"><?php echo $_appointment_scheduler->patientName->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<th class="<?php echo $_appointment_scheduler->DoctorID->headerCellClass() ?>"><span id="elh__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID"><?php echo $_appointment_scheduler->DoctorID->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<th class="<?php echo $_appointment_scheduler->DoctorName->headerCellClass() ?>"><span id="elh__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName"><?php echo $_appointment_scheduler->DoctorName->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<th class="<?php echo $_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><span id="elh__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
		<th class="<?php echo $_appointment_scheduler->status->headerCellClass() ?>"><span id="elh__appointment_scheduler_status" class="_appointment_scheduler_status"><?php echo $_appointment_scheduler->status->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<th class="<?php echo $_appointment_scheduler->DoctorCode->headerCellClass() ?>"><span id="elh__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode"><?php echo $_appointment_scheduler->DoctorCode->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
		<th class="<?php echo $_appointment_scheduler->Department->headerCellClass() ?>"><span id="elh__appointment_scheduler_Department" class="_appointment_scheduler_Department"><?php echo $_appointment_scheduler->Department->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<th class="<?php echo $_appointment_scheduler->scheduler_id->headerCellClass() ?>"><span id="elh__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id"><?php echo $_appointment_scheduler->scheduler_id->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
		<th class="<?php echo $_appointment_scheduler->text->headerCellClass() ?>"><span id="elh__appointment_scheduler_text" class="_appointment_scheduler_text"><?php echo $_appointment_scheduler->text->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<th class="<?php echo $_appointment_scheduler->appointment_status->headerCellClass() ?>"><span id="elh__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status"><?php echo $_appointment_scheduler->appointment_status->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
		<th class="<?php echo $_appointment_scheduler->PId->headerCellClass() ?>"><span id="elh__appointment_scheduler_PId" class="_appointment_scheduler_PId"><?php echo $_appointment_scheduler->PId->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $_appointment_scheduler->MobileNumber->headerCellClass() ?>"><span id="elh__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber"><?php echo $_appointment_scheduler->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<th class="<?php echo $_appointment_scheduler->SchEmail->headerCellClass() ?>"><span id="elh__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail"><?php echo $_appointment_scheduler->SchEmail->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<th class="<?php echo $_appointment_scheduler->appointment_type->headerCellClass() ?>"><span id="elh__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type"><?php echo $_appointment_scheduler->appointment_type->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
		<th class="<?php echo $_appointment_scheduler->Notified->headerCellClass() ?>"><span id="elh__appointment_scheduler_Notified" class="_appointment_scheduler_Notified"><?php echo $_appointment_scheduler->Notified->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<th class="<?php echo $_appointment_scheduler->Purpose->headerCellClass() ?>"><span id="elh__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose"><?php echo $_appointment_scheduler->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
		<th class="<?php echo $_appointment_scheduler->Notes->headerCellClass() ?>"><span id="elh__appointment_scheduler_Notes" class="_appointment_scheduler_Notes"><?php echo $_appointment_scheduler->Notes->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<th class="<?php echo $_appointment_scheduler->PatientType->headerCellClass() ?>"><span id="elh__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType"><?php echo $_appointment_scheduler->PatientType->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
		<th class="<?php echo $_appointment_scheduler->Referal->headerCellClass() ?>"><span id="elh__appointment_scheduler_Referal" class="_appointment_scheduler_Referal"><?php echo $_appointment_scheduler->Referal->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<th class="<?php echo $_appointment_scheduler->paymentType->headerCellClass() ?>"><span id="elh__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType"><?php echo $_appointment_scheduler->paymentType->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<th class="<?php echo $_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><span id="elh__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear"><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
		<th class="<?php echo $_appointment_scheduler->HospID->headerCellClass() ?>"><span id="elh__appointment_scheduler_HospID" class="_appointment_scheduler_HospID"><?php echo $_appointment_scheduler->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<th class="<?php echo $_appointment_scheduler->createdBy->headerCellClass() ?>"><span id="elh__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy"><?php echo $_appointment_scheduler->createdBy->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<th class="<?php echo $_appointment_scheduler->createdDateTime->headerCellClass() ?>"><span id="elh__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime"><?php echo $_appointment_scheduler->createdDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<th class="<?php echo $_appointment_scheduler->PatientTypee->headerCellClass() ?>"><span id="elh__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee"><?php echo $_appointment_scheduler->PatientTypee->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$_appointment_scheduler_delete->RecCnt = 0;
$i = 0;
while (!$_appointment_scheduler_delete->Recordset->EOF) {
	$_appointment_scheduler_delete->RecCnt++;
	$_appointment_scheduler_delete->RowCnt++;

	// Set row properties
	$_appointment_scheduler->resetAttributes();
	$_appointment_scheduler->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$_appointment_scheduler_delete->loadRowValues($_appointment_scheduler_delete->Recordset);

	// Render row
	$_appointment_scheduler_delete->renderRow();
?>
	<tr<?php echo $_appointment_scheduler->rowAttributes() ?>>
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
		<td<?php echo $_appointment_scheduler->id->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_id" class="_appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
		<td<?php echo $_appointment_scheduler->start_date->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_start_date" class="_appointment_scheduler_start_date">
<span<?php echo $_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
		<td<?php echo $_appointment_scheduler->end_date->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_end_date" class="_appointment_scheduler_end_date">
<span<?php echo $_appointment_scheduler->end_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
		<td<?php echo $_appointment_scheduler->patientID->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_patientID" class="_appointment_scheduler_patientID">
<span<?php echo $_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
		<td<?php echo $_appointment_scheduler->patientName->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_patientName" class="_appointment_scheduler_patientName">
<span<?php echo $_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<td<?php echo $_appointment_scheduler->DoctorID->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<td<?php echo $_appointment_scheduler->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName">
<span<?php echo $_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td<?php echo $_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus">
<span<?php echo $_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<?php echo $_appointment_scheduler->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
		<td<?php echo $_appointment_scheduler->status->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_status" class="_appointment_scheduler_status">
<span<?php echo $_appointment_scheduler->status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<td<?php echo $_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode">
<span<?php echo $_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
		<td<?php echo $_appointment_scheduler->Department->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_Department" class="_appointment_scheduler_Department">
<span<?php echo $_appointment_scheduler->Department->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<td<?php echo $_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->scheduler_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
		<td<?php echo $_appointment_scheduler->text->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_text" class="_appointment_scheduler_text">
<span<?php echo $_appointment_scheduler->text->viewAttributes() ?>>
<?php echo $_appointment_scheduler->text->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<td<?php echo $_appointment_scheduler->appointment_status->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status">
<span<?php echo $_appointment_scheduler->appointment_status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
		<td<?php echo $_appointment_scheduler->PId->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_PId" class="_appointment_scheduler_PId">
<span<?php echo $_appointment_scheduler->PId->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber">
<span<?php echo $_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<td<?php echo $_appointment_scheduler->SchEmail->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail">
<span<?php echo $_appointment_scheduler->SchEmail->viewAttributes() ?>>
<?php echo $_appointment_scheduler->SchEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<td<?php echo $_appointment_scheduler->appointment_type->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type">
<span<?php echo $_appointment_scheduler->appointment_type->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
		<td<?php echo $_appointment_scheduler->Notified->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_Notified" class="_appointment_scheduler_Notified">
<span<?php echo $_appointment_scheduler->Notified->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<td<?php echo $_appointment_scheduler->Purpose->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose">
<span<?php echo $_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
		<td<?php echo $_appointment_scheduler->Notes->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_Notes" class="_appointment_scheduler_Notes">
<span<?php echo $_appointment_scheduler->Notes->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<td<?php echo $_appointment_scheduler->PatientType->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType">
<span<?php echo $_appointment_scheduler->PatientType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
		<td<?php echo $_appointment_scheduler->Referal->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_Referal" class="_appointment_scheduler_Referal">
<span<?php echo $_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<td<?php echo $_appointment_scheduler->paymentType->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType">
<span<?php echo $_appointment_scheduler->paymentType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->paymentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td<?php echo $_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear">
<span<?php echo $_appointment_scheduler->WhereDidYouHear->viewAttributes() ?>>
<?php echo $_appointment_scheduler->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
		<td<?php echo $_appointment_scheduler->HospID->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_HospID" class="_appointment_scheduler_HospID">
<span<?php echo $_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<td<?php echo $_appointment_scheduler->createdBy->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy">
<span<?php echo $_appointment_scheduler->createdBy->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<td<?php echo $_appointment_scheduler->createdDateTime->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime">
<span<?php echo $_appointment_scheduler->createdDateTime->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<td<?php echo $_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $_appointment_scheduler_delete->RowCnt ?>__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee">
<span<?php echo $_appointment_scheduler->PatientTypee->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientTypee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$_appointment_scheduler_delete->Recordset->moveNext();
}
$_appointment_scheduler_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $_appointment_scheduler_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$_appointment_scheduler_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$_appointment_scheduler_delete->terminate();
?>