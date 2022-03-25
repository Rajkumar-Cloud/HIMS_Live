<?php

namespace PHPMaker2021\project3;

// Page object
$AppointmentReminderView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fappointment_reminderview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fappointment_reminderview = currentForm = new ew.Form("fappointment_reminderview", "view");
    loadjs.done("fappointment_reminderview");
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
<form name="fappointment_reminderview" id="fappointment_reminderview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_reminder">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_appointment_reminder_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->reminder->Visible) { // reminder ?>
    <tr id="r_reminder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_reminder"><?= $Page->reminder->caption() ?></span></td>
        <td data-name="reminder" <?= $Page->reminder->cellAttributes() ?>>
<span id="el_appointment_reminder_reminder">
<span<?= $Page->reminder->viewAttributes() ?>>
<?= $Page->reminder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
    <tr id="r_Drid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Drid"><?= $Page->Drid->caption() ?></span></td>
        <td data-name="Drid" <?= $Page->Drid->cellAttributes() ?>>
<span id="el_appointment_reminder_Drid">
<span<?= $Page->Drid->viewAttributes() ?>>
<?= $Page->Drid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <tr id="r_DrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_DrName"><?= $Page->DrName->caption() ?></span></td>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<span id="el_appointment_reminder_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <tr id="r_Duration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Duration"><?= $Page->Duration->caption() ?></span></td>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el_appointment_reminder_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <tr id="r_Date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_Date"><?= $Page->Date->caption() ?></span></td>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<span id="el_appointment_reminder_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SMSSend->Visible) { // SMSSend ?>
    <tr id="r_SMSSend">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_SMSSend"><?= $Page->SMSSend->caption() ?></span></td>
        <td data-name="SMSSend" <?= $Page->SMSSend->cellAttributes() ?>>
<span id="el_appointment_reminder_SMSSend">
<span<?= $Page->SMSSend->viewAttributes() ?>>
<?= $Page->SMSSend->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmailSend->Visible) { // EmailSend ?>
    <tr id="r_EmailSend">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_reminder_EmailSend"><?= $Page->EmailSend->caption() ?></span></td>
        <td data-name="EmailSend" <?= $Page->EmailSend->cellAttributes() ?>>
<span id="el_appointment_reminder_EmailSend">
<span<?= $Page->EmailSend->viewAttributes() ?>>
<?= $Page->EmailSend->getViewValue() ?></span>
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
