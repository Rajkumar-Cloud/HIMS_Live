<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentSchedulerDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fappointment_schedulerdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fappointment_schedulerdelete = currentForm = new ew.Form("fappointment_schedulerdelete", "delete");
    loadjs.done("fappointment_schedulerdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.appointment_scheduler) ew.vars.tables.appointment_scheduler = <?= JsonEncode(GetClientVar("tables", "appointment_scheduler")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fappointment_schedulerdelete" id="fappointment_schedulerdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_scheduler">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_appointment_scheduler_id" class="appointment_scheduler_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><span id="elh_appointment_scheduler_start_date" class="appointment_scheduler_start_date"><?= $Page->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><span id="elh_appointment_scheduler_end_date" class="appointment_scheduler_end_date"><?= $Page->end_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
        <th class="<?= $Page->patientID->headerCellClass() ?>"><span id="elh_appointment_scheduler_patientID" class="appointment_scheduler_patientID"><?= $Page->patientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <th class="<?= $Page->patientName->headerCellClass() ?>"><span id="elh_appointment_scheduler_patientName" class="appointment_scheduler_patientName"><?= $Page->patientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <th class="<?= $Page->DoctorID->headerCellClass() ?>"><span id="elh_appointment_scheduler_DoctorID" class="appointment_scheduler_DoctorID"><?= $Page->DoctorID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <th class="<?= $Page->DoctorName->headerCellClass() ?>"><span id="elh_appointment_scheduler_DoctorName" class="appointment_scheduler_DoctorName"><?= $Page->DoctorName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <th class="<?= $Page->AppointmentStatus->headerCellClass() ?>"><span id="elh_appointment_scheduler_AppointmentStatus" class="appointment_scheduler_AppointmentStatus"><?= $Page->AppointmentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_appointment_scheduler_status" class="appointment_scheduler_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
        <th class="<?= $Page->DoctorCode->headerCellClass() ?>"><span id="elh_appointment_scheduler_DoctorCode" class="appointment_scheduler_DoctorCode"><?= $Page->DoctorCode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th class="<?= $Page->Department->headerCellClass() ?>"><span id="elh_appointment_scheduler_Department" class="appointment_scheduler_Department"><?= $Page->Department->caption() ?></span></th>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <th class="<?= $Page->scheduler_id->headerCellClass() ?>"><span id="elh_appointment_scheduler_scheduler_id" class="appointment_scheduler_scheduler_id"><?= $Page->scheduler_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
        <th class="<?= $Page->text->headerCellClass() ?>"><span id="elh_appointment_scheduler_text" class="appointment_scheduler_text"><?= $Page->text->caption() ?></span></th>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
        <th class="<?= $Page->appointment_status->headerCellClass() ?>"><span id="elh_appointment_scheduler_appointment_status" class="appointment_scheduler_appointment_status"><?= $Page->appointment_status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <th class="<?= $Page->PId->headerCellClass() ?>"><span id="elh_appointment_scheduler_PId" class="appointment_scheduler_PId"><?= $Page->PId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><span id="elh_appointment_scheduler_MobileNumber" class="appointment_scheduler_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
        <th class="<?= $Page->SchEmail->headerCellClass() ?>"><span id="elh_appointment_scheduler_SchEmail" class="appointment_scheduler_SchEmail"><?= $Page->SchEmail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
        <th class="<?= $Page->appointment_type->headerCellClass() ?>"><span id="elh_appointment_scheduler_appointment_type" class="appointment_scheduler_appointment_type"><?= $Page->appointment_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
        <th class="<?= $Page->Notified->headerCellClass() ?>"><span id="elh_appointment_scheduler_Notified" class="appointment_scheduler_Notified"><?= $Page->Notified->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <th class="<?= $Page->Purpose->headerCellClass() ?>"><span id="elh_appointment_scheduler_Purpose" class="appointment_scheduler_Purpose"><?= $Page->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <th class="<?= $Page->Notes->headerCellClass() ?>"><span id="elh_appointment_scheduler_Notes" class="appointment_scheduler_Notes"><?= $Page->Notes->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
        <th class="<?= $Page->PatientType->headerCellClass() ?>"><span id="elh_appointment_scheduler_PatientType" class="appointment_scheduler_PatientType"><?= $Page->PatientType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <th class="<?= $Page->Referal->headerCellClass() ?>"><span id="elh_appointment_scheduler_Referal" class="appointment_scheduler_Referal"><?= $Page->Referal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
        <th class="<?= $Page->paymentType->headerCellClass() ?>"><span id="elh_appointment_scheduler_paymentType" class="appointment_scheduler_paymentType"><?= $Page->paymentType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><span id="elh_appointment_scheduler_WhereDidYouHear" class="appointment_scheduler_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_appointment_scheduler_HospID" class="appointment_scheduler_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
        <th class="<?= $Page->createdBy->headerCellClass() ?>"><span id="elh_appointment_scheduler_createdBy" class="appointment_scheduler_createdBy"><?= $Page->createdBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <th class="<?= $Page->createdDateTime->headerCellClass() ?>"><span id="elh_appointment_scheduler_createdDateTime" class="appointment_scheduler_createdDateTime"><?= $Page->createdDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <th class="<?= $Page->PatientTypee->headerCellClass() ?>"><span id="elh_appointment_scheduler_PatientTypee" class="appointment_scheduler_PatientTypee"><?= $Page->PatientTypee->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_id" class="appointment_scheduler_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <td <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_start_date" class="appointment_scheduler_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <td <?= $Page->end_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_end_date" class="appointment_scheduler_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
        <td <?= $Page->patientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_patientID" class="appointment_scheduler_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <td <?= $Page->patientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_patientName" class="appointment_scheduler_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
        <td <?= $Page->DoctorID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_DoctorID" class="appointment_scheduler_DoctorID">
<span<?= $Page->DoctorID->viewAttributes() ?>>
<?= $Page->DoctorID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <td <?= $Page->DoctorName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_DoctorName" class="appointment_scheduler_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <td <?= $Page->AppointmentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_AppointmentStatus" class="appointment_scheduler_AppointmentStatus">
<span<?= $Page->AppointmentStatus->viewAttributes() ?>>
<?= $Page->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_status" class="appointment_scheduler_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
        <td <?= $Page->DoctorCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_DoctorCode" class="appointment_scheduler_DoctorCode">
<span<?= $Page->DoctorCode->viewAttributes() ?>>
<?= $Page->DoctorCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <td <?= $Page->Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_Department" class="appointment_scheduler_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <td <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_scheduler_id" class="appointment_scheduler_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
        <td <?= $Page->text->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_text" class="appointment_scheduler_text">
<span<?= $Page->text->viewAttributes() ?>>
<?= $Page->text->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
        <td <?= $Page->appointment_status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_appointment_status" class="appointment_scheduler_appointment_status">
<span<?= $Page->appointment_status->viewAttributes() ?>>
<?= $Page->appointment_status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <td <?= $Page->PId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_PId" class="appointment_scheduler_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_MobileNumber" class="appointment_scheduler_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
        <td <?= $Page->SchEmail->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_SchEmail" class="appointment_scheduler_SchEmail">
<span<?= $Page->SchEmail->viewAttributes() ?>>
<?= $Page->SchEmail->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
        <td <?= $Page->appointment_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_appointment_type" class="appointment_scheduler_appointment_type">
<span<?= $Page->appointment_type->viewAttributes() ?>>
<?= $Page->appointment_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
        <td <?= $Page->Notified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_Notified" class="appointment_scheduler_Notified">
<span<?= $Page->Notified->viewAttributes() ?>>
<?= $Page->Notified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <td <?= $Page->Purpose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_Purpose" class="appointment_scheduler_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <td <?= $Page->Notes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_Notes" class="appointment_scheduler_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
        <td <?= $Page->PatientType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_PatientType" class="appointment_scheduler_PatientType">
<span<?= $Page->PatientType->viewAttributes() ?>>
<?= $Page->PatientType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <td <?= $Page->Referal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_Referal" class="appointment_scheduler_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
        <td <?= $Page->paymentType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_paymentType" class="appointment_scheduler_paymentType">
<span<?= $Page->paymentType->viewAttributes() ?>>
<?= $Page->paymentType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_WhereDidYouHear" class="appointment_scheduler_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_HospID" class="appointment_scheduler_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
        <td <?= $Page->createdBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_createdBy" class="appointment_scheduler_createdBy">
<span<?= $Page->createdBy->viewAttributes() ?>>
<?= $Page->createdBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <td <?= $Page->createdDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_createdDateTime" class="appointment_scheduler_createdDateTime">
<span<?= $Page->createdDateTime->viewAttributes() ?>>
<?= $Page->createdDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <td <?= $Page->PatientTypee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_scheduler_PatientTypee" class="appointment_scheduler_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
