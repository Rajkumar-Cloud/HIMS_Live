<?php

namespace PHPMaker2021\project3;

// Page object
$AppointmentSchedulerView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fappointment_schedulerview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fappointment_schedulerview = currentForm = new ew.Form("fappointment_schedulerview", "view");
    loadjs.done("fappointment_schedulerview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fappointment_schedulerview" id="fappointment_schedulerview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_scheduler">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_appointment_scheduler_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <tr id="r_start_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_start_date"><?= $Page->start_date->caption() ?></span></td>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el_appointment_scheduler_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <tr id="r_end_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_end_date"><?= $Page->end_date->caption() ?></span></td>
        <td data-name="end_date" <?= $Page->end_date->cellAttributes() ?>>
<span id="el_appointment_scheduler_end_date">
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
    <tr id="r_patientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_patientID"><?= $Page->patientID->caption() ?></span></td>
        <td data-name="patientID" <?= $Page->patientID->cellAttributes() ?>>
<span id="el_appointment_scheduler_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <tr id="r_patientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_patientName"><?= $Page->patientName->caption() ?></span></td>
        <td data-name="patientName" <?= $Page->patientName->cellAttributes() ?>>
<span id="el_appointment_scheduler_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoctorID->Visible) { // DoctorID ?>
    <tr id="r_DoctorID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_DoctorID"><?= $Page->DoctorID->caption() ?></span></td>
        <td data-name="DoctorID" <?= $Page->DoctorID->cellAttributes() ?>>
<span id="el_appointment_scheduler_DoctorID">
<span<?= $Page->DoctorID->viewAttributes() ?>>
<?= $Page->DoctorID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <tr id="r_DoctorName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_DoctorName"><?= $Page->DoctorName->caption() ?></span></td>
        <td data-name="DoctorName" <?= $Page->DoctorName->cellAttributes() ?>>
<span id="el_appointment_scheduler_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoctorCode->Visible) { // DoctorCode ?>
    <tr id="r_DoctorCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_DoctorCode"><?= $Page->DoctorCode->caption() ?></span></td>
        <td data-name="DoctorCode" <?= $Page->DoctorCode->cellAttributes() ?>>
<span id="el_appointment_scheduler_DoctorCode">
<span<?= $Page->DoctorCode->viewAttributes() ?>>
<?= $Page->DoctorCode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <tr id="r_Department">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Department"><?= $Page->Department->caption() ?></span></td>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<span id="el_appointment_scheduler_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AppointmentStatus->Visible) { // AppointmentStatus ?>
    <tr id="r_AppointmentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_AppointmentStatus"><?= $Page->AppointmentStatus->caption() ?></span></td>
        <td data-name="AppointmentStatus" <?= $Page->AppointmentStatus->cellAttributes() ?>>
<span id="el_appointment_scheduler_AppointmentStatus">
<span<?= $Page->AppointmentStatus->viewAttributes() ?>>
<?= $Page->AppointmentStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_appointment_scheduler_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <tr id="r_scheduler_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_scheduler_id"><?= $Page->scheduler_id->caption() ?></span></td>
        <td data-name="scheduler_id" <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el_appointment_scheduler_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->text->Visible) { // text ?>
    <tr id="r_text">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_text"><?= $Page->text->caption() ?></span></td>
        <td data-name="text" <?= $Page->text->cellAttributes() ?>>
<span id="el_appointment_scheduler_text">
<span<?= $Page->text->viewAttributes() ?>>
<?= $Page->text->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->appointment_status->Visible) { // appointment_status ?>
    <tr id="r_appointment_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_appointment_status"><?= $Page->appointment_status->caption() ?></span></td>
        <td data-name="appointment_status" <?= $Page->appointment_status->cellAttributes() ?>>
<span id="el_appointment_scheduler_appointment_status">
<span<?= $Page->appointment_status->viewAttributes() ?>>
<?= $Page->appointment_status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <tr id="r_PId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_PId"><?= $Page->PId->caption() ?></span></td>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<span id="el_appointment_scheduler_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_appointment_scheduler_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SchEmail->Visible) { // SchEmail ?>
    <tr id="r_SchEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_SchEmail"><?= $Page->SchEmail->caption() ?></span></td>
        <td data-name="SchEmail" <?= $Page->SchEmail->cellAttributes() ?>>
<span id="el_appointment_scheduler_SchEmail">
<span<?= $Page->SchEmail->viewAttributes() ?>>
<?= $Page->SchEmail->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->appointment_type->Visible) { // appointment_type ?>
    <tr id="r_appointment_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_appointment_type"><?= $Page->appointment_type->caption() ?></span></td>
        <td data-name="appointment_type" <?= $Page->appointment_type->cellAttributes() ?>>
<span id="el_appointment_scheduler_appointment_type">
<span<?= $Page->appointment_type->viewAttributes() ?>>
<?= $Page->appointment_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Notified->Visible) { // Notified ?>
    <tr id="r_Notified">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Notified"><?= $Page->Notified->caption() ?></span></td>
        <td data-name="Notified" <?= $Page->Notified->cellAttributes() ?>>
<span id="el_appointment_scheduler_Notified">
<span<?= $Page->Notified->viewAttributes() ?>>
<?= $Page->Notified->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <tr id="r_Purpose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Purpose"><?= $Page->Purpose->caption() ?></span></td>
        <td data-name="Purpose" <?= $Page->Purpose->cellAttributes() ?>>
<span id="el_appointment_scheduler_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <tr id="r_Notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Notes"><?= $Page->Notes->caption() ?></span></td>
        <td data-name="Notes" <?= $Page->Notes->cellAttributes() ?>>
<span id="el_appointment_scheduler_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientType->Visible) { // PatientType ?>
    <tr id="r_PatientType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_PatientType"><?= $Page->PatientType->caption() ?></span></td>
        <td data-name="PatientType" <?= $Page->PatientType->cellAttributes() ?>>
<span id="el_appointment_scheduler_PatientType">
<span<?= $Page->PatientType->viewAttributes() ?>>
<?= $Page->PatientType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <tr id="r_Referal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_Referal"><?= $Page->Referal->caption() ?></span></td>
        <td data-name="Referal" <?= $Page->Referal->cellAttributes() ?>>
<span id="el_appointment_scheduler_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->paymentType->Visible) { // paymentType ?>
    <tr id="r_paymentType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_paymentType"><?= $Page->paymentType->caption() ?></span></td>
        <td data-name="paymentType" <?= $Page->paymentType->cellAttributes() ?>>
<span id="el_appointment_scheduler_paymentType">
<span<?= $Page->paymentType->viewAttributes() ?>>
<?= $Page->paymentType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <tr id="r_WhereDidYouHear">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_WhereDidYouHear"><?= $Page->WhereDidYouHear->caption() ?></span></td>
        <td data-name="WhereDidYouHear" <?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span id="el_appointment_scheduler_WhereDidYouHear">
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_appointment_scheduler_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdBy->Visible) { // createdBy ?>
    <tr id="r_createdBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_createdBy"><?= $Page->createdBy->caption() ?></span></td>
        <td data-name="createdBy" <?= $Page->createdBy->cellAttributes() ?>>
<span id="el_appointment_scheduler_createdBy">
<span<?= $Page->createdBy->viewAttributes() ?>>
<?= $Page->createdBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
    <tr id="r_createdDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_createdDateTime"><?= $Page->createdDateTime->caption() ?></span></td>
        <td data-name="createdDateTime" <?= $Page->createdDateTime->cellAttributes() ?>>
<span id="el_appointment_scheduler_createdDateTime">
<span<?= $Page->createdDateTime->viewAttributes() ?>>
<?= $Page->createdDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <tr id="r_PatientTypee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_scheduler_PatientTypee"><?= $Page->PatientTypee->caption() ?></span></td>
        <td data-name="PatientTypee" <?= $Page->PatientTypee->cellAttributes() ?>>
<span id="el_appointment_scheduler_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
