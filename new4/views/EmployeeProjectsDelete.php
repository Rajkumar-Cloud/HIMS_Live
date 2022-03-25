<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeProjectsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_projectsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_projectsdelete = currentForm = new ew.Form("femployee_projectsdelete", "delete");
    loadjs.done("femployee_projectsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_projects) ew.vars.tables.employee_projects = <?= JsonEncode(GetClientVar("tables", "employee_projects")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_projectsdelete" id="femployee_projectsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_projects">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_projects_id" class="employee_projects_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_projects_employee" class="employee_projects_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->project->Visible) { // project ?>
        <th class="<?= $Page->project->headerCellClass() ?>"><span id="elh_employee_projects_project" class="employee_projects_project"><?= $Page->project->caption() ?></span></th>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
        <th class="<?= $Page->date_start->headerCellClass() ?>"><span id="elh_employee_projects_date_start" class="employee_projects_date_start"><?= $Page->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
        <th class="<?= $Page->date_end->headerCellClass() ?>"><span id="elh_employee_projects_date_end" class="employee_projects_date_end"><?= $Page->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_projects_status" class="employee_projects_status"><?= $Page->status->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_projects_id" class="employee_projects_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_projects_employee" class="employee_projects_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->project->Visible) { // project ?>
        <td <?= $Page->project->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_projects_project" class="employee_projects_project">
<span<?= $Page->project->viewAttributes() ?>>
<?= $Page->project->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
        <td <?= $Page->date_start->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_projects_date_start" class="employee_projects_date_start">
<span<?= $Page->date_start->viewAttributes() ?>>
<?= $Page->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
        <td <?= $Page->date_end->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_projects_date_end" class="employee_projects_date_end">
<span<?= $Page->date_end->viewAttributes() ?>>
<?= $Page->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_projects_status" class="employee_projects_status">
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
