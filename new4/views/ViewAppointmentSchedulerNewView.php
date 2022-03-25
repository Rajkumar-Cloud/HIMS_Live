<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAppointmentSchedulerNewView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_appointment_scheduler_newview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_appointment_scheduler_newview = currentForm = new ew.Form("fview_appointment_scheduler_newview", "view");
    loadjs.done("fview_appointment_scheduler_newview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_appointment_scheduler_new) ew.vars.tables.view_appointment_scheduler_new = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler_new")) ?>;
</script>
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
<form name="fview_appointment_scheduler_newview" id="fview_appointment_scheduler_newview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->patientID->Visible) { // patientID ?>
    <tr id="r_patientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientID"><?= $Page->patientID->caption() ?></span></td>
        <td data-name="patientID" <?= $Page->patientID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <tr id="r_patientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patientName"><?= $Page->patientName->caption() ?></span></td>
        <td data-name="patientName" <?= $Page->patientName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
    <tr id="r_start_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_time"><?= $Page->start_time->caption() ?></span></td>
        <td data-name="start_time" <?= $Page->start_time->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <tr id="r_Purpose">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Purpose"><?= $Page->Purpose->caption() ?></span></td>
        <td data-name="Purpose" <?= $Page->Purpose->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patienttype->Visible) { // patienttype ?>
    <tr id="r_patienttype">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_patienttype"><?= $Page->patienttype->caption() ?></span></td>
        <td data-name="patienttype" <?= $Page->patienttype->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_patienttype">
<span<?= $Page->patienttype->viewAttributes() ?>>
<?= $Page->patienttype->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <tr id="r_Referal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Referal"><?= $Page->Referal->caption() ?></span></td>
        <td data-name="Referal" <?= $Page->Referal->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <tr id="r_start_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_start_date"><?= $Page->start_date->caption() ?></span></td>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <tr id="r_DoctorName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_DoctorName"><?= $Page->DoctorName->caption() ?></span></td>
        <td data-name="DoctorName" <?= $Page->DoctorName->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Id->Visible) { // Id ?>
    <tr id="r_Id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Id"><?= $Page->Id->caption() ?></span></td>
        <td data-name="Id" <?= $Page->Id->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
    <tr id="r_PatientTypee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee"><?= $Page->PatientTypee->caption() ?></span></td>
        <td data-name="PatientTypee" <?= $Page->PatientTypee->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <tr id="r_Notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_appointment_scheduler_new_Notes"><?= $Page->Notes->caption() ?></span></td>
        <td data-name="Notes" <?= $Page->Notes->cellAttributes() ?>>
<span id="el_view_appointment_scheduler_new_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
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
