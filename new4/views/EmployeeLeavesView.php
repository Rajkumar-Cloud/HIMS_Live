<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLeavesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_leavesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_leavesview = currentForm = new ew.Form("femployee_leavesview", "view");
    loadjs.done("femployee_leavesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_leaves) ew.vars.tables.employee_leaves = <?= JsonEncode(GetClientVar("tables", "employee_leaves")) ?>;
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
<form name="femployee_leavesview" id="femployee_leavesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_leaves">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_leaves_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
    <tr id="r_employee">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_employee"><?= $Page->employee->caption() ?></span></td>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el_employee_leaves_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
    <tr id="r_leave_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_leave_type"><?= $Page->leave_type->caption() ?></span></td>
        <td data-name="leave_type" <?= $Page->leave_type->cellAttributes() ?>>
<span id="el_employee_leaves_leave_type">
<span<?= $Page->leave_type->viewAttributes() ?>>
<?= $Page->leave_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leave_period->Visible) { // leave_period ?>
    <tr id="r_leave_period">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_leave_period"><?= $Page->leave_period->caption() ?></span></td>
        <td data-name="leave_period" <?= $Page->leave_period->cellAttributes() ?>>
<span id="el_employee_leaves_leave_period">
<span<?= $Page->leave_period->viewAttributes() ?>>
<?= $Page->leave_period->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_start->Visible) { // date_start ?>
    <tr id="r_date_start">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_date_start"><?= $Page->date_start->caption() ?></span></td>
        <td data-name="date_start" <?= $Page->date_start->cellAttributes() ?>>
<span id="el_employee_leaves_date_start">
<span<?= $Page->date_start->viewAttributes() ?>>
<?= $Page->date_start->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_end->Visible) { // date_end ?>
    <tr id="r_date_end">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_date_end"><?= $Page->date_end->caption() ?></span></td>
        <td data-name="date_end" <?= $Page->date_end->cellAttributes() ?>>
<span id="el_employee_leaves_date_end">
<span<?= $Page->date_end->viewAttributes() ?>>
<?= $Page->date_end->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->details->Visible) { // details ?>
    <tr id="r_details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_details"><?= $Page->details->caption() ?></span></td>
        <td data-name="details" <?= $Page->details->cellAttributes() ?>>
<span id="el_employee_leaves_details">
<span<?= $Page->details->viewAttributes() ?>>
<?= $Page->details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_employee_leaves_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->attachment->Visible) { // attachment ?>
    <tr id="r_attachment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leaves_attachment"><?= $Page->attachment->caption() ?></span></td>
        <td data-name="attachment" <?= $Page->attachment->cellAttributes() ?>>
<span id="el_employee_leaves_attachment">
<span<?= $Page->attachment->viewAttributes() ?>>
<?= $Page->attachment->getViewValue() ?></span>
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
