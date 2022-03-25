<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrLeavetypesView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_leavetypesview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fhr_leavetypesview = currentForm = new ew.Form("fhr_leavetypesview", "view");
    loadjs.done("fhr_leavetypesview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.hr_leavetypes) ew.vars.tables.hr_leavetypes = <?= JsonEncode(GetClientVar("tables", "hr_leavetypes")) ?>;
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
<form name="fhr_leavetypesview" id="fhr_leavetypesview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_hr_leavetypes_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el_hr_leavetypes_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
    <tr id="r_supervisor_leave_assign">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_supervisor_leave_assign"><?= $Page->supervisor_leave_assign->caption() ?></span></td>
        <td data-name="supervisor_leave_assign" <?= $Page->supervisor_leave_assign->cellAttributes() ?>>
<span id="el_hr_leavetypes_supervisor_leave_assign">
<span<?= $Page->supervisor_leave_assign->viewAttributes() ?>>
<?= $Page->supervisor_leave_assign->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->employee_can_apply->Visible) { // employee_can_apply ?>
    <tr id="r_employee_can_apply">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_employee_can_apply"><?= $Page->employee_can_apply->caption() ?></span></td>
        <td data-name="employee_can_apply" <?= $Page->employee_can_apply->cellAttributes() ?>>
<span id="el_hr_leavetypes_employee_can_apply">
<span<?= $Page->employee_can_apply->viewAttributes() ?>>
<?= $Page->employee_can_apply->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->apply_beyond_current->Visible) { // apply_beyond_current ?>
    <tr id="r_apply_beyond_current">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_apply_beyond_current"><?= $Page->apply_beyond_current->caption() ?></span></td>
        <td data-name="apply_beyond_current" <?= $Page->apply_beyond_current->cellAttributes() ?>>
<span id="el_hr_leavetypes_apply_beyond_current">
<span<?= $Page->apply_beyond_current->viewAttributes() ?>>
<?= $Page->apply_beyond_current->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leave_accrue->Visible) { // leave_accrue ?>
    <tr id="r_leave_accrue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_leave_accrue"><?= $Page->leave_accrue->caption() ?></span></td>
        <td data-name="leave_accrue" <?= $Page->leave_accrue->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_accrue">
<span<?= $Page->leave_accrue->viewAttributes() ?>>
<?= $Page->leave_accrue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->carried_forward->Visible) { // carried_forward ?>
    <tr id="r_carried_forward">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_carried_forward"><?= $Page->carried_forward->caption() ?></span></td>
        <td data-name="carried_forward" <?= $Page->carried_forward->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward">
<span<?= $Page->carried_forward->viewAttributes() ?>>
<?= $Page->carried_forward->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->default_per_year->Visible) { // default_per_year ?>
    <tr id="r_default_per_year">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_default_per_year"><?= $Page->default_per_year->caption() ?></span></td>
        <td data-name="default_per_year" <?= $Page->default_per_year->cellAttributes() ?>>
<span id="el_hr_leavetypes_default_per_year">
<span<?= $Page->default_per_year->viewAttributes() ?>>
<?= $Page->default_per_year->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
    <tr id="r_carried_forward_percentage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_carried_forward_percentage"><?= $Page->carried_forward_percentage->caption() ?></span></td>
        <td data-name="carried_forward_percentage" <?= $Page->carried_forward_percentage->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_percentage">
<span<?= $Page->carried_forward_percentage->viewAttributes() ?>>
<?= $Page->carried_forward_percentage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
    <tr id="r_carried_forward_leave_availability">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_carried_forward_leave_availability"><?= $Page->carried_forward_leave_availability->caption() ?></span></td>
        <td data-name="carried_forward_leave_availability" <?= $Page->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el_hr_leavetypes_carried_forward_leave_availability">
<span<?= $Page->carried_forward_leave_availability->viewAttributes() ?>>
<?= $Page->carried_forward_leave_availability->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
    <tr id="r_propotionate_on_joined_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_propotionate_on_joined_date"><?= $Page->propotionate_on_joined_date->caption() ?></span></td>
        <td data-name="propotionate_on_joined_date" <?= $Page->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el_hr_leavetypes_propotionate_on_joined_date">
<span<?= $Page->propotionate_on_joined_date->viewAttributes() ?>>
<?= $Page->propotionate_on_joined_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->send_notification_emails->Visible) { // send_notification_emails ?>
    <tr id="r_send_notification_emails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_send_notification_emails"><?= $Page->send_notification_emails->caption() ?></span></td>
        <td data-name="send_notification_emails" <?= $Page->send_notification_emails->cellAttributes() ?>>
<span id="el_hr_leavetypes_send_notification_emails">
<span<?= $Page->send_notification_emails->viewAttributes() ?>>
<?= $Page->send_notification_emails->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leave_group->Visible) { // leave_group ?>
    <tr id="r_leave_group">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_leave_group"><?= $Page->leave_group->caption() ?></span></td>
        <td data-name="leave_group" <?= $Page->leave_group->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_group">
<span<?= $Page->leave_group->viewAttributes() ?>>
<?= $Page->leave_group->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leave_color->Visible) { // leave_color ?>
    <tr id="r_leave_color">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_leave_color"><?= $Page->leave_color->caption() ?></span></td>
        <td data-name="leave_color" <?= $Page->leave_color->cellAttributes() ?>>
<span id="el_hr_leavetypes_leave_color">
<span<?= $Page->leave_color->viewAttributes() ?>>
<?= $Page->leave_color->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
    <tr id="r_max_carried_forward_amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_max_carried_forward_amount"><?= $Page->max_carried_forward_amount->caption() ?></span></td>
        <td data-name="max_carried_forward_amount" <?= $Page->max_carried_forward_amount->cellAttributes() ?>>
<span id="el_hr_leavetypes_max_carried_forward_amount">
<span<?= $Page->max_carried_forward_amount->viewAttributes() ?>>
<?= $Page->max_carried_forward_amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_hr_leavetypes_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_hr_leavetypes_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
