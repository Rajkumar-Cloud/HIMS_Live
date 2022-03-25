<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLeavesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_leavesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_leavesdelete = currentForm = new ew.Form("femployee_leavesdelete", "delete");
    loadjs.done("femployee_leavesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_leaves) ew.vars.tables.employee_leaves = <?= JsonEncode(GetClientVar("tables", "employee_leaves")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_leavesdelete" id="femployee_leavesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_leaves">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_leaves_id" class="employee_leaves_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_leaves_employee" class="employee_leaves_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
        <th class="<?= $Page->leave_type->headerCellClass() ?>"><span id="elh_employee_leaves_leave_type" class="employee_leaves_leave_type"><?= $Page->leave_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leave_period->Visible) { // leave_period ?>
        <th class="<?= $Page->leave_period->headerCellClass() ?>"><span id="elh_employee_leaves_leave_period" class="employee_leaves_leave_period"><?= $Page->leave_period->caption() ?></span></th>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
        <th class="<?= $Page->date_start->headerCellClass() ?>"><span id="elh_employee_leaves_date_start" class="employee_leaves_date_start"><?= $Page->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
        <th class="<?= $Page->date_end->headerCellClass() ?>"><span id="elh_employee_leaves_date_end" class="employee_leaves_date_end"><?= $Page->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_leaves_status" class="employee_leaves_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
        <th class="<?= $Page->attachment->headerCellClass() ?>"><span id="elh_employee_leaves_attachment" class="employee_leaves_attachment"><?= $Page->attachment->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_leaves_id" class="employee_leaves_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leaves_employee" class="employee_leaves_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
        <td <?= $Page->leave_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leaves_leave_type" class="employee_leaves_leave_type">
<span<?= $Page->leave_type->viewAttributes() ?>>
<?= $Page->leave_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leave_period->Visible) { // leave_period ?>
        <td <?= $Page->leave_period->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leaves_leave_period" class="employee_leaves_leave_period">
<span<?= $Page->leave_period->viewAttributes() ?>>
<?= $Page->leave_period->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
        <td <?= $Page->date_start->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leaves_date_start" class="employee_leaves_date_start">
<span<?= $Page->date_start->viewAttributes() ?>>
<?= $Page->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
        <td <?= $Page->date_end->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leaves_date_end" class="employee_leaves_date_end">
<span<?= $Page->date_end->viewAttributes() ?>>
<?= $Page->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leaves_status" class="employee_leaves_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
        <td <?= $Page->attachment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leaves_attachment" class="employee_leaves_attachment">
<span<?= $Page->attachment->viewAttributes() ?>>
<?= $Page->attachment->getViewValue() ?></span>
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
