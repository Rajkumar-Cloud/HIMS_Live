<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAppointmentSchedulerNewDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_appointment_scheduler_newdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_appointment_scheduler_newdelete = currentForm = new ew.Form("fview_appointment_scheduler_newdelete", "delete");
    loadjs.done("fview_appointment_scheduler_newdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_appointment_scheduler_new) ew.vars.tables.view_appointment_scheduler_new = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler_new")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_appointment_scheduler_newdelete" id="fview_appointment_scheduler_newdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
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
<?php if ($Page->patientID->Visible) { // patientID ?>
        <th class="<?= $Page->patientID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID"><?= $Page->patientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <th class="<?= $Page->patientName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName"><?= $Page->patientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <th class="<?= $Page->start_time->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time"><?= $Page->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <th class="<?= $Page->Purpose->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose"><?= $Page->Purpose->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patienttype->Visible) { // patienttype ?>
        <th class="<?= $Page->patienttype->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype"><?= $Page->patienttype->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <th class="<?= $Page->Referal->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal"><?= $Page->Referal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date"><?= $Page->start_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <th class="<?= $Page->DoctorName->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName"><?= $Page->DoctorName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Id->Visible) { // Id ?>
        <th class="<?= $Page->Id->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id"><?= $Page->Id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <th class="<?= $Page->PatientTypee->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee"><?= $Page->PatientTypee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <th class="<?= $Page->Notes->headerCellClass() ?>"><span id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes"><?= $Page->Notes->caption() ?></span></th>
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
<?php if ($Page->patientID->Visible) { // patientID ?>
        <td <?= $Page->patientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <td <?= $Page->patientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <td <?= $Page->start_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <td <?= $Page->Purpose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patienttype->Visible) { // patienttype ?>
        <td <?= $Page->patienttype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype">
<span<?= $Page->patienttype->viewAttributes() ?>>
<?= $Page->patienttype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <td <?= $Page->Referal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <td <?= $Page->start_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <td <?= $Page->DoctorName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Id->Visible) { // Id ?>
        <td <?= $Page->Id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <td <?= $Page->PatientTypee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <td <?= $Page->Notes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
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
