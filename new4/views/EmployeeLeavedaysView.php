<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLeavedaysView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_leavedaysview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_leavedaysview = currentForm = new ew.Form("femployee_leavedaysview", "view");
    loadjs.done("femployee_leavedaysview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_leavedays) ew.vars.tables.employee_leavedays = <?= JsonEncode(GetClientVar("tables", "employee_leavedays")) ?>;
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
<form name="femployee_leavedaysview" id="femployee_leavedaysview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_leavedays">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_leavedays_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_leave->Visible) { // employee_leave ?>
    <tr id="r_employee_leave">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_employee_leave"><?= $Page->employee_leave->caption() ?></span></td>
        <td data-name="employee_leave" <?= $Page->employee_leave->cellAttributes() ?>>
<span id="el_employee_leavedays_employee_leave">
<span<?= $Page->employee_leave->viewAttributes() ?>>
<?= $Page->employee_leave->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leave_date->Visible) { // leave_date ?>
    <tr id="r_leave_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_leave_date"><?= $Page->leave_date->caption() ?></span></td>
        <td data-name="leave_date" <?= $Page->leave_date->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_date">
<span<?= $Page->leave_date->viewAttributes() ?>>
<?= $Page->leave_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
    <tr id="r_leave_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_leavedays_leave_type"><?= $Page->leave_type->caption() ?></span></td>
        <td data-name="leave_type" <?= $Page->leave_type->cellAttributes() ?>>
<span id="el_employee_leavedays_leave_type">
<span<?= $Page->leave_type->viewAttributes() ?>>
<?= $Page->leave_type->getViewValue() ?></span>
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
