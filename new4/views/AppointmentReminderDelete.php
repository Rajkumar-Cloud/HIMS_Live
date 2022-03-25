<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentReminderDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fappointment_reminderdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fappointment_reminderdelete = currentForm = new ew.Form("fappointment_reminderdelete", "delete");
    loadjs.done("fappointment_reminderdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.appointment_reminder) ew.vars.tables.appointment_reminder = <?= JsonEncode(GetClientVar("tables", "appointment_reminder")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fappointment_reminderdelete" id="fappointment_reminderdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_appointment_reminder_id" class="appointment_reminder_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
        <th class="<?= $Page->Drid->headerCellClass() ?>"><span id="elh_appointment_reminder_Drid" class="appointment_reminder_Drid"><?= $Page->Drid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><span id="elh_appointment_reminder_DrName" class="appointment_reminder_DrName"><?= $Page->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th class="<?= $Page->Duration->headerCellClass() ?>"><span id="elh_appointment_reminder_Duration" class="appointment_reminder_Duration"><?= $Page->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th class="<?= $Page->Date->headerCellClass() ?>"><span id="elh_appointment_reminder_Date" class="appointment_reminder_Date"><?= $Page->Date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SMSSend->Visible) { // SMSSend ?>
        <th class="<?= $Page->SMSSend->headerCellClass() ?>"><span id="elh_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend"><?= $Page->SMSSend->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmailSend->Visible) { // EmailSend ?>
        <th class="<?= $Page->EmailSend->headerCellClass() ?>"><span id="elh_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend"><?= $Page->EmailSend->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_appointment_reminder_id" class="appointment_reminder_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
        <td <?= $Page->Drid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_reminder_Drid" class="appointment_reminder_Drid">
<span<?= $Page->Drid->viewAttributes() ?>>
<?= $Page->Drid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <td <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_reminder_DrName" class="appointment_reminder_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <td <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_reminder_Duration" class="appointment_reminder_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <td <?= $Page->Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_reminder_Date" class="appointment_reminder_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SMSSend->Visible) { // SMSSend ?>
        <td <?= $Page->SMSSend->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_reminder_SMSSend" class="appointment_reminder_SMSSend">
<span<?= $Page->SMSSend->viewAttributes() ?>>
<?= $Page->SMSSend->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmailSend->Visible) { // EmailSend ?>
        <td <?= $Page->EmailSend->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_reminder_EmailSend" class="appointment_reminder_EmailSend">
<span<?= $Page->EmailSend->viewAttributes() ?>>
<?= $Page->EmailSend->getViewValue() ?></span>
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
