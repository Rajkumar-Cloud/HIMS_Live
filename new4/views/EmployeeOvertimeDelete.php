<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeOvertimeDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_overtimedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_overtimedelete = currentForm = new ew.Form("femployee_overtimedelete", "delete");
    loadjs.done("femployee_overtimedelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_overtime) ew.vars.tables.employee_overtime = <?= JsonEncode(GetClientVar("tables", "employee_overtime")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_overtimedelete" id="femployee_overtimedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_overtime">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_overtime_id" class="employee_overtime_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_overtime_employee" class="employee_overtime_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <th class="<?= $Page->start_time->headerCellClass() ?>"><span id="elh_employee_overtime_start_time" class="employee_overtime_start_time"><?= $Page->start_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
        <th class="<?= $Page->end_time->headerCellClass() ?>"><span id="elh_employee_overtime_end_time" class="employee_overtime_end_time"><?= $Page->end_time->caption() ?></span></th>
<?php } ?>
<?php if ($Page->category->Visible) { // category ?>
        <th class="<?= $Page->category->headerCellClass() ?>"><span id="elh_employee_overtime_category" class="employee_overtime_category"><?= $Page->category->caption() ?></span></th>
<?php } ?>
<?php if ($Page->project->Visible) { // project ?>
        <th class="<?= $Page->project->headerCellClass() ?>"><span id="elh_employee_overtime_project" class="employee_overtime_project"><?= $Page->project->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_employee_overtime_created" class="employee_overtime_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_employee_overtime_updated" class="employee_overtime_updated"><?= $Page->updated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_overtime_status" class="employee_overtime_status"><?= $Page->status->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_overtime_id" class="employee_overtime_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_employee" class="employee_overtime_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <td <?= $Page->start_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_start_time" class="employee_overtime_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
        <td <?= $Page->end_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_end_time" class="employee_overtime_end_time">
<span<?= $Page->end_time->viewAttributes() ?>>
<?= $Page->end_time->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->category->Visible) { // category ?>
        <td <?= $Page->category->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_category" class="employee_overtime_category">
<span<?= $Page->category->viewAttributes() ?>>
<?= $Page->category->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->project->Visible) { // project ?>
        <td <?= $Page->project->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_project" class="employee_overtime_project">
<span<?= $Page->project->viewAttributes() ?>>
<?= $Page->project->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_created" class="employee_overtime_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_updated" class="employee_overtime_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_overtime_status" class="employee_overtime_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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
