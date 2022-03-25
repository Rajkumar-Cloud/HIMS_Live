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
$aa_appointment_scheduler_delete = new aa_appointment_scheduler_delete();

// Run the page
$aa_appointment_scheduler_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$aa_appointment_scheduler_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var faa_appointment_schedulerdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	faa_appointment_schedulerdelete = currentForm = new ew.Form("faa_appointment_schedulerdelete", "delete");
	loadjs.done("faa_appointment_schedulerdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $aa_appointment_scheduler_delete->showPageHeader(); ?>
<?php
$aa_appointment_scheduler_delete->showMessage();
?>
<form name="faa_appointment_schedulerdelete" id="faa_appointment_schedulerdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="aa_appointment_scheduler">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($aa_appointment_scheduler_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($aa_appointment_scheduler_delete->id->Visible) { // id ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->id->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_id" class="aa_appointment_scheduler_id"><?php echo $aa_appointment_scheduler_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->start_date->Visible) { // start_date ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->start_date->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_start_date" class="aa_appointment_scheduler_start_date"><?php echo $aa_appointment_scheduler_delete->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->end_date->Visible) { // end_date ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->end_date->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_end_date" class="aa_appointment_scheduler_end_date"><?php echo $aa_appointment_scheduler_delete->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->patientID->Visible) { // patientID ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->patientID->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_patientID" class="aa_appointment_scheduler_patientID"><?php echo $aa_appointment_scheduler_delete->patientID->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->patientName->Visible) { // patientName ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->patientName->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_patientName" class="aa_appointment_scheduler_patientName"><?php echo $aa_appointment_scheduler_delete->patientName->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->DoctorID->Visible) { // DoctorID ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->DoctorID->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_DoctorID" class="aa_appointment_scheduler_DoctorID"><?php echo $aa_appointment_scheduler_delete->DoctorID->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->DoctorName->Visible) { // DoctorName ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->DoctorName->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_DoctorName" class="aa_appointment_scheduler_DoctorName"><?php echo $aa_appointment_scheduler_delete->DoctorName->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->AppointmentStatus->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_AppointmentStatus" class="aa_appointment_scheduler_AppointmentStatus"><?php echo $aa_appointment_scheduler_delete->AppointmentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->status->Visible) { // status ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->status->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_status" class="aa_appointment_scheduler_status"><?php echo $aa_appointment_scheduler_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->DoctorCode->Visible) { // DoctorCode ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->DoctorCode->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_DoctorCode" class="aa_appointment_scheduler_DoctorCode"><?php echo $aa_appointment_scheduler_delete->DoctorCode->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Department->Visible) { // Department ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->Department->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_Department" class="aa_appointment_scheduler_Department"><?php echo $aa_appointment_scheduler_delete->Department->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->scheduler_id->Visible) { // scheduler_id ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->scheduler_id->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_scheduler_id" class="aa_appointment_scheduler_scheduler_id"><?php echo $aa_appointment_scheduler_delete->scheduler_id->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->text->Visible) { // text ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->text->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_text" class="aa_appointment_scheduler_text"><?php echo $aa_appointment_scheduler_delete->text->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->appointment_status->Visible) { // appointment_status ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->appointment_status->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_appointment_status" class="aa_appointment_scheduler_appointment_status"><?php echo $aa_appointment_scheduler_delete->appointment_status->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->PId->Visible) { // PId ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->PId->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_PId" class="aa_appointment_scheduler_PId"><?php echo $aa_appointment_scheduler_delete->PId->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->MobileNumber->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_MobileNumber" class="aa_appointment_scheduler_MobileNumber"><?php echo $aa_appointment_scheduler_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->SchEmail->Visible) { // SchEmail ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->SchEmail->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_SchEmail" class="aa_appointment_scheduler_SchEmail"><?php echo $aa_appointment_scheduler_delete->SchEmail->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->appointment_type->Visible) { // appointment_type ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->appointment_type->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_appointment_type" class="aa_appointment_scheduler_appointment_type"><?php echo $aa_appointment_scheduler_delete->appointment_type->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Notified->Visible) { // Notified ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->Notified->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_Notified" class="aa_appointment_scheduler_Notified"><?php echo $aa_appointment_scheduler_delete->Notified->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Purpose->Visible) { // Purpose ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->Purpose->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_Purpose" class="aa_appointment_scheduler_Purpose"><?php echo $aa_appointment_scheduler_delete->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Notes->Visible) { // Notes ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->Notes->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_Notes" class="aa_appointment_scheduler_Notes"><?php echo $aa_appointment_scheduler_delete->Notes->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->PatientType->Visible) { // PatientType ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->PatientType->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_PatientType" class="aa_appointment_scheduler_PatientType"><?php echo $aa_appointment_scheduler_delete->PatientType->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Referal->Visible) { // Referal ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->Referal->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_Referal" class="aa_appointment_scheduler_Referal"><?php echo $aa_appointment_scheduler_delete->Referal->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->paymentType->Visible) { // paymentType ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->paymentType->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_paymentType" class="aa_appointment_scheduler_paymentType"><?php echo $aa_appointment_scheduler_delete->paymentType->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->WhereDidYouHear->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_WhereDidYouHear" class="aa_appointment_scheduler_WhereDidYouHear"><?php echo $aa_appointment_scheduler_delete->WhereDidYouHear->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->HospID->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_HospID" class="aa_appointment_scheduler_HospID"><?php echo $aa_appointment_scheduler_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->createdBy->Visible) { // createdBy ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->createdBy->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_createdBy" class="aa_appointment_scheduler_createdBy"><?php echo $aa_appointment_scheduler_delete->createdBy->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->createdDateTime->Visible) { // createdDateTime ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->createdDateTime->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_createdDateTime" class="aa_appointment_scheduler_createdDateTime"><?php echo $aa_appointment_scheduler_delete->createdDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->PatientTypee->Visible) { // PatientTypee ?>
		<th class="<?php echo $aa_appointment_scheduler_delete->PatientTypee->headerCellClass() ?>"><span id="elh_aa_appointment_scheduler_PatientTypee" class="aa_appointment_scheduler_PatientTypee"><?php echo $aa_appointment_scheduler_delete->PatientTypee->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$aa_appointment_scheduler_delete->RecordCount = 0;
$i = 0;
while (!$aa_appointment_scheduler_delete->Recordset->EOF) {
	$aa_appointment_scheduler_delete->RecordCount++;
	$aa_appointment_scheduler_delete->RowCount++;

	// Set row properties
	$aa_appointment_scheduler->resetAttributes();
	$aa_appointment_scheduler->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$aa_appointment_scheduler_delete->loadRowValues($aa_appointment_scheduler_delete->Recordset);

	// Render row
	$aa_appointment_scheduler_delete->renderRow();
?>
	<tr <?php echo $aa_appointment_scheduler->rowAttributes() ?>>
<?php if ($aa_appointment_scheduler_delete->id->Visible) { // id ?>
		<td <?php echo $aa_appointment_scheduler_delete->id->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_id" class="aa_appointment_scheduler_id">
<span<?php echo $aa_appointment_scheduler_delete->id->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->start_date->Visible) { // start_date ?>
		<td <?php echo $aa_appointment_scheduler_delete->start_date->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_start_date" class="aa_appointment_scheduler_start_date">
<span<?php echo $aa_appointment_scheduler_delete->start_date->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->end_date->Visible) { // end_date ?>
		<td <?php echo $aa_appointment_scheduler_delete->end_date->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_end_date" class="aa_appointment_scheduler_end_date">
<span<?php echo $aa_appointment_scheduler_delete->end_date->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->patientID->Visible) { // patientID ?>
		<td <?php echo $aa_appointment_scheduler_delete->patientID->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_patientID" class="aa_appointment_scheduler_patientID">
<span<?php echo $aa_appointment_scheduler_delete->patientID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->patientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->patientName->Visible) { // patientName ?>
		<td <?php echo $aa_appointment_scheduler_delete->patientName->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_patientName" class="aa_appointment_scheduler_patientName">
<span<?php echo $aa_appointment_scheduler_delete->patientName->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->patientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->DoctorID->Visible) { // DoctorID ?>
		<td <?php echo $aa_appointment_scheduler_delete->DoctorID->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_DoctorID" class="aa_appointment_scheduler_DoctorID">
<span<?php echo $aa_appointment_scheduler_delete->DoctorID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->DoctorID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->DoctorName->Visible) { // DoctorName ?>
		<td <?php echo $aa_appointment_scheduler_delete->DoctorName->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_DoctorName" class="aa_appointment_scheduler_DoctorName">
<span<?php echo $aa_appointment_scheduler_delete->DoctorName->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->DoctorName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td <?php echo $aa_appointment_scheduler_delete->AppointmentStatus->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_AppointmentStatus" class="aa_appointment_scheduler_AppointmentStatus">
<span<?php echo $aa_appointment_scheduler_delete->AppointmentStatus->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->status->Visible) { // status ?>
		<td <?php echo $aa_appointment_scheduler_delete->status->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_status" class="aa_appointment_scheduler_status">
<span<?php echo $aa_appointment_scheduler_delete->status->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->DoctorCode->Visible) { // DoctorCode ?>
		<td <?php echo $aa_appointment_scheduler_delete->DoctorCode->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_DoctorCode" class="aa_appointment_scheduler_DoctorCode">
<span<?php echo $aa_appointment_scheduler_delete->DoctorCode->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->DoctorCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Department->Visible) { // Department ?>
		<td <?php echo $aa_appointment_scheduler_delete->Department->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_Department" class="aa_appointment_scheduler_Department">
<span<?php echo $aa_appointment_scheduler_delete->Department->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->scheduler_id->Visible) { // scheduler_id ?>
		<td <?php echo $aa_appointment_scheduler_delete->scheduler_id->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_scheduler_id" class="aa_appointment_scheduler_scheduler_id">
<span<?php echo $aa_appointment_scheduler_delete->scheduler_id->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->scheduler_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->text->Visible) { // text ?>
		<td <?php echo $aa_appointment_scheduler_delete->text->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_text" class="aa_appointment_scheduler_text">
<span<?php echo $aa_appointment_scheduler_delete->text->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->text->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->appointment_status->Visible) { // appointment_status ?>
		<td <?php echo $aa_appointment_scheduler_delete->appointment_status->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_appointment_status" class="aa_appointment_scheduler_appointment_status">
<span<?php echo $aa_appointment_scheduler_delete->appointment_status->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->appointment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->PId->Visible) { // PId ?>
		<td <?php echo $aa_appointment_scheduler_delete->PId->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_PId" class="aa_appointment_scheduler_PId">
<span<?php echo $aa_appointment_scheduler_delete->PId->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->PId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $aa_appointment_scheduler_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_MobileNumber" class="aa_appointment_scheduler_MobileNumber">
<span<?php echo $aa_appointment_scheduler_delete->MobileNumber->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->SchEmail->Visible) { // SchEmail ?>
		<td <?php echo $aa_appointment_scheduler_delete->SchEmail->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_SchEmail" class="aa_appointment_scheduler_SchEmail">
<span<?php echo $aa_appointment_scheduler_delete->SchEmail->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->SchEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->appointment_type->Visible) { // appointment_type ?>
		<td <?php echo $aa_appointment_scheduler_delete->appointment_type->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_appointment_type" class="aa_appointment_scheduler_appointment_type">
<span<?php echo $aa_appointment_scheduler_delete->appointment_type->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->appointment_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Notified->Visible) { // Notified ?>
		<td <?php echo $aa_appointment_scheduler_delete->Notified->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_Notified" class="aa_appointment_scheduler_Notified">
<span<?php echo $aa_appointment_scheduler_delete->Notified->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->Notified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Purpose->Visible) { // Purpose ?>
		<td <?php echo $aa_appointment_scheduler_delete->Purpose->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_Purpose" class="aa_appointment_scheduler_Purpose">
<span<?php echo $aa_appointment_scheduler_delete->Purpose->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Notes->Visible) { // Notes ?>
		<td <?php echo $aa_appointment_scheduler_delete->Notes->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_Notes" class="aa_appointment_scheduler_Notes">
<span<?php echo $aa_appointment_scheduler_delete->Notes->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->Notes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->PatientType->Visible) { // PatientType ?>
		<td <?php echo $aa_appointment_scheduler_delete->PatientType->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_PatientType" class="aa_appointment_scheduler_PatientType">
<span<?php echo $aa_appointment_scheduler_delete->PatientType->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->PatientType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->Referal->Visible) { // Referal ?>
		<td <?php echo $aa_appointment_scheduler_delete->Referal->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_Referal" class="aa_appointment_scheduler_Referal">
<span<?php echo $aa_appointment_scheduler_delete->Referal->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->Referal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->paymentType->Visible) { // paymentType ?>
		<td <?php echo $aa_appointment_scheduler_delete->paymentType->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_paymentType" class="aa_appointment_scheduler_paymentType">
<span<?php echo $aa_appointment_scheduler_delete->paymentType->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->paymentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td <?php echo $aa_appointment_scheduler_delete->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_WhereDidYouHear" class="aa_appointment_scheduler_WhereDidYouHear">
<span<?php echo $aa_appointment_scheduler_delete->WhereDidYouHear->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $aa_appointment_scheduler_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_HospID" class="aa_appointment_scheduler_HospID">
<span<?php echo $aa_appointment_scheduler_delete->HospID->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->createdBy->Visible) { // createdBy ?>
		<td <?php echo $aa_appointment_scheduler_delete->createdBy->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_createdBy" class="aa_appointment_scheduler_createdBy">
<span<?php echo $aa_appointment_scheduler_delete->createdBy->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->createdBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->createdDateTime->Visible) { // createdDateTime ?>
		<td <?php echo $aa_appointment_scheduler_delete->createdDateTime->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_createdDateTime" class="aa_appointment_scheduler_createdDateTime">
<span<?php echo $aa_appointment_scheduler_delete->createdDateTime->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->createdDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($aa_appointment_scheduler_delete->PatientTypee->Visible) { // PatientTypee ?>
		<td <?php echo $aa_appointment_scheduler_delete->PatientTypee->cellAttributes() ?>>
<span id="el<?php echo $aa_appointment_scheduler_delete->RowCount ?>_aa_appointment_scheduler_PatientTypee" class="aa_appointment_scheduler_PatientTypee">
<span<?php echo $aa_appointment_scheduler_delete->PatientTypee->viewAttributes() ?>><?php echo $aa_appointment_scheduler_delete->PatientTypee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$aa_appointment_scheduler_delete->Recordset->moveNext();
}
$aa_appointment_scheduler_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $aa_appointment_scheduler_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$aa_appointment_scheduler_delete->showPageFooter();
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
$aa_appointment_scheduler_delete->terminate();
?>