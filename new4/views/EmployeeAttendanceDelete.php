<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeAttendanceDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_attendancedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_attendancedelete = currentForm = new ew.Form("femployee_attendancedelete", "delete");
    loadjs.done("femployee_attendancedelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_attendance) ew.vars.tables.employee_attendance = <?= JsonEncode(GetClientVar("tables", "employee_attendance")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_attendancedelete" id="femployee_attendancedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_attendance">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_attendance_id" class="employee_attendance_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_attendance_employee" class="employee_attendance_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->in_time->Visible) { // in_time ?>
        <th class="<?= $Page->in_time->headerCellClass() ?>"><span id="elh_employee_attendance_in_time" class="employee_attendance_in_time"><?= $Page->in_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->out_time->Visible) { // out_time ?>
        <th class="<?= $Page->out_time->headerCellClass() ?>"><span id="elh_employee_attendance_out_time" class="employee_attendance_out_time"><?= $Page->out_time->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_attendance_id" class="employee_attendance_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_attendance_employee" class="employee_attendance_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->in_time->Visible) { // in_time ?>
        <td <?= $Page->in_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_attendance_in_time" class="employee_attendance_in_time">
<span<?= $Page->in_time->viewAttributes() ?>>
<?= $Page->in_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->out_time->Visible) { // out_time ?>
        <td <?= $Page->out_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_attendance_out_time" class="employee_attendance_out_time">
<span<?= $Page->out_time->viewAttributes() ?>>
<?= $Page->out_time->getViewValue() ?></span>
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
