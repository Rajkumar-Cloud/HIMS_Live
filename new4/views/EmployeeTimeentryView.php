<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTimeentryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_timeentryview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_timeentryview = currentForm = new ew.Form("femployee_timeentryview", "view");
    loadjs.done("femployee_timeentryview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_timeentry) ew.vars.tables.employee_timeentry = <?= JsonEncode(GetClientVar("tables", "employee_timeentry")) ?>;
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
<form name="femployee_timeentryview" id="femployee_timeentryview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_timeentry">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_timeentry_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->project->Visible) { // project ?>
    <tr id="r_project">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_project"><?= $Page->project->caption() ?></span></td>
        <td data-name="project" <?= $Page->project->cellAttributes() ?>>
<span id="el_employee_timeentry_project">
<span<?= $Page->project->viewAttributes() ?>>
<?= $Page->project->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_timeentry_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->timesheet->Visible) { // timesheet ?>
    <tr id="r_timesheet">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_timesheet"><?= $Page->timesheet->caption() ?></span></td>
        <td data-name="timesheet" <?= $Page->timesheet->cellAttributes() ?>>
<span id="el_employee_timeentry_timesheet">
<span<?= $Page->timesheet->viewAttributes() ?>>
<?= $Page->timesheet->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_timeentry_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
    <tr id="r_created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_created"><?= $Page->created->caption() ?></span></td>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el_employee_timeentry_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
    <tr id="r_date_start">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_date_start"><?= $Page->date_start->caption() ?></span></td>
        <td data-name="date_start" <?= $Page->date_start->cellAttributes() ?>>
<span id="el_employee_timeentry_date_start">
<span<?= $Page->date_start->viewAttributes() ?>>
<?= $Page->date_start->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->time_start->Visible) { // time_start ?>
    <tr id="r_time_start">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_time_start"><?= $Page->time_start->caption() ?></span></td>
        <td data-name="time_start" <?= $Page->time_start->cellAttributes() ?>>
<span id="el_employee_timeentry_time_start">
<span<?= $Page->time_start->viewAttributes() ?>>
<?= $Page->time_start->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
    <tr id="r_date_end">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_date_end"><?= $Page->date_end->caption() ?></span></td>
        <td data-name="date_end" <?= $Page->date_end->cellAttributes() ?>>
<span id="el_employee_timeentry_date_end">
<span<?= $Page->date_end->viewAttributes() ?>>
<?= $Page->date_end->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->time_end->Visible) { // time_end ?>
    <tr id="r_time_end">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_time_end"><?= $Page->time_end->caption() ?></span></td>
        <td data-name="time_end" <?= $Page->time_end->cellAttributes() ?>>
<span id="el_employee_timeentry_time_end">
<span<?= $Page->time_end->viewAttributes() ?>>
<?= $Page->time_end->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_timeentry_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_timeentry_status">
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
