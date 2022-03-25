<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeOvertimeView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_overtimeview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_overtimeview = currentForm = new ew.Form("femployee_overtimeview", "view");
    loadjs.done("femployee_overtimeview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_overtime) ew.vars.tables.employee_overtime = <?= JsonEncode(GetClientVar("tables", "employee_overtime")) ?>;
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
<form name="femployee_overtimeview" id="femployee_overtimeview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_overtime">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_overtime_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_overtime_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
    <tr id="r_start_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_start_time"><?= $Page->start_time->caption() ?></span></td>
        <td data-name="start_time" <?= $Page->start_time->cellAttributes() ?>>
<span id="el_employee_overtime_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
    <tr id="r_end_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_end_time"><?= $Page->end_time->caption() ?></span></td>
        <td data-name="end_time" <?= $Page->end_time->cellAttributes() ?>>
<span id="el_employee_overtime_end_time">
<span<?= $Page->end_time->viewAttributes() ?>>
<?= $Page->end_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->category->Visible) { // category ?>
    <tr id="r_category">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_category"><?= $Page->category->caption() ?></span></td>
        <td data-name="category" <?= $Page->category->cellAttributes() ?>>
<span id="el_employee_overtime_category">
<span<?= $Page->category->viewAttributes() ?>>
<?= $Page->category->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->project->Visible) { // project ?>
    <tr id="r_project">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_project"><?= $Page->project->caption() ?></span></td>
        <td data-name="project" <?= $Page->project->cellAttributes() ?>>
<span id="el_employee_overtime_project">
<span<?= $Page->project->viewAttributes() ?>>
<?= $Page->project->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->notes->Visible) { // notes ?>
    <tr id="r_notes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_notes"><?= $Page->notes->caption() ?></span></td>
        <td data-name="notes" <?= $Page->notes->cellAttributes() ?>>
<span id="el_employee_overtime_notes">
<span<?= $Page->notes->viewAttributes() ?>>
<?= $Page->notes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_overtime_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
    <tr id="r_updated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_updated"><?= $Page->updated->caption() ?></span></td>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el_employee_overtime_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_overtime_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_overtime_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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
