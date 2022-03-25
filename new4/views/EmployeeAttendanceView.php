<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeAttendanceView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_attendanceview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_attendanceview = currentForm = new ew.Form("femployee_attendanceview", "view");
    loadjs.done("femployee_attendanceview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_attendance) ew.vars.tables.employee_attendance = <?= JsonEncode(GetClientVar("tables", "employee_attendance")) ?>;
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
<form name="femployee_attendanceview" id="femployee_attendanceview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_attendance">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_attendance_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_attendance_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_attendance_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_attendance_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->in_time->Visible) { // in_time ?>
    <tr id="r_in_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_attendance_in_time"><?= $Page->in_time->caption() ?></span></td>
        <td data-name="in_time" <?= $Page->in_time->cellAttributes() ?>>
<span id="el_employee_attendance_in_time">
<span<?= $Page->in_time->viewAttributes() ?>>
<?= $Page->in_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->out_time->Visible) { // out_time ?>
    <tr id="r_out_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_attendance_out_time"><?= $Page->out_time->caption() ?></span></td>
        <td data-name="out_time" <?= $Page->out_time->cellAttributes() ?>>
<span id="el_employee_attendance_out_time">
<span<?= $Page->out_time->viewAttributes() ?>>
<?= $Page->out_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->note->Visible) { // note ?>
    <tr id="r_note">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_attendance_note"><?= $Page->note->caption() ?></span></td>
        <td data-name="note" <?= $Page->note->cellAttributes() ?>>
<span id="el_employee_attendance_note">
<span<?= $Page->note->viewAttributes() ?>>
<?= $Page->note->getViewValue() ?></span>
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
