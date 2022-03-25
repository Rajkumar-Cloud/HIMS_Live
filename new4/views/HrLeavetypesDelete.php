<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrLeavetypesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fhr_leavetypesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fhr_leavetypesdelete = currentForm = new ew.Form("fhr_leavetypesdelete", "delete");
    loadjs.done("fhr_leavetypesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.hr_leavetypes) ew.vars.tables.hr_leavetypes = <?= JsonEncode(GetClientVar("tables", "hr_leavetypes")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fhr_leavetypesdelete" id="fhr_leavetypesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_hr_leavetypes_id" class="hr_leavetypes_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_hr_leavetypes_name" class="hr_leavetypes_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
        <th class="<?= $Page->supervisor_leave_assign->headerCellClass() ?>"><span id="elh_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign"><?= $Page->supervisor_leave_assign->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee_can_apply->Visible) { // employee_can_apply ?>
        <th class="<?= $Page->employee_can_apply->headerCellClass() ?>"><span id="elh_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply"><?= $Page->employee_can_apply->caption() ?></span></th>
<?php } ?>
<?php if ($Page->apply_beyond_current->Visible) { // apply_beyond_current ?>
        <th class="<?= $Page->apply_beyond_current->headerCellClass() ?>"><span id="elh_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current"><?= $Page->apply_beyond_current->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leave_accrue->Visible) { // leave_accrue ?>
        <th class="<?= $Page->leave_accrue->headerCellClass() ?>"><span id="elh_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue"><?= $Page->leave_accrue->caption() ?></span></th>
<?php } ?>
<?php if ($Page->carried_forward->Visible) { // carried_forward ?>
        <th class="<?= $Page->carried_forward->headerCellClass() ?>"><span id="elh_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward"><?= $Page->carried_forward->caption() ?></span></th>
<?php } ?>
<?php if ($Page->default_per_year->Visible) { // default_per_year ?>
        <th class="<?= $Page->default_per_year->headerCellClass() ?>"><span id="elh_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year"><?= $Page->default_per_year->caption() ?></span></th>
<?php } ?>
<?php if ($Page->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
        <th class="<?= $Page->carried_forward_percentage->headerCellClass() ?>"><span id="elh_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage"><?= $Page->carried_forward_percentage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
        <th class="<?= $Page->carried_forward_leave_availability->headerCellClass() ?>"><span id="elh_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability"><?= $Page->carried_forward_leave_availability->caption() ?></span></th>
<?php } ?>
<?php if ($Page->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
        <th class="<?= $Page->propotionate_on_joined_date->headerCellClass() ?>"><span id="elh_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date"><?= $Page->propotionate_on_joined_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->send_notification_emails->Visible) { // send_notification_emails ?>
        <th class="<?= $Page->send_notification_emails->headerCellClass() ?>"><span id="elh_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails"><?= $Page->send_notification_emails->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leave_group->Visible) { // leave_group ?>
        <th class="<?= $Page->leave_group->headerCellClass() ?>"><span id="elh_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group"><?= $Page->leave_group->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leave_color->Visible) { // leave_color ?>
        <th class="<?= $Page->leave_color->headerCellClass() ?>"><span id="elh_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color"><?= $Page->leave_color->caption() ?></span></th>
<?php } ?>
<?php if ($Page->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
        <th class="<?= $Page->max_carried_forward_amount->headerCellClass() ?>"><span id="elh_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount"><?= $Page->max_carried_forward_amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_hr_leavetypes_HospID" class="hr_leavetypes_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_id" class="hr_leavetypes_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_name" class="hr_leavetypes_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
        <td <?= $Page->supervisor_leave_assign->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign">
<span<?= $Page->supervisor_leave_assign->viewAttributes() ?>>
<?= $Page->supervisor_leave_assign->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee_can_apply->Visible) { // employee_can_apply ?>
        <td <?= $Page->employee_can_apply->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply">
<span<?= $Page->employee_can_apply->viewAttributes() ?>>
<?= $Page->employee_can_apply->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->apply_beyond_current->Visible) { // apply_beyond_current ?>
        <td <?= $Page->apply_beyond_current->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current">
<span<?= $Page->apply_beyond_current->viewAttributes() ?>>
<?= $Page->apply_beyond_current->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leave_accrue->Visible) { // leave_accrue ?>
        <td <?= $Page->leave_accrue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue">
<span<?= $Page->leave_accrue->viewAttributes() ?>>
<?= $Page->leave_accrue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->carried_forward->Visible) { // carried_forward ?>
        <td <?= $Page->carried_forward->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward">
<span<?= $Page->carried_forward->viewAttributes() ?>>
<?= $Page->carried_forward->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->default_per_year->Visible) { // default_per_year ?>
        <td <?= $Page->default_per_year->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year">
<span<?= $Page->default_per_year->viewAttributes() ?>>
<?= $Page->default_per_year->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
        <td <?= $Page->carried_forward_percentage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage">
<span<?= $Page->carried_forward_percentage->viewAttributes() ?>>
<?= $Page->carried_forward_percentage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
        <td <?= $Page->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability">
<span<?= $Page->carried_forward_leave_availability->viewAttributes() ?>>
<?= $Page->carried_forward_leave_availability->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
        <td <?= $Page->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date">
<span<?= $Page->propotionate_on_joined_date->viewAttributes() ?>>
<?= $Page->propotionate_on_joined_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->send_notification_emails->Visible) { // send_notification_emails ?>
        <td <?= $Page->send_notification_emails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails">
<span<?= $Page->send_notification_emails->viewAttributes() ?>>
<?= $Page->send_notification_emails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leave_group->Visible) { // leave_group ?>
        <td <?= $Page->leave_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group">
<span<?= $Page->leave_group->viewAttributes() ?>>
<?= $Page->leave_group->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leave_color->Visible) { // leave_color ?>
        <td <?= $Page->leave_color->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color">
<span<?= $Page->leave_color->viewAttributes() ?>>
<?= $Page->leave_color->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
        <td <?= $Page->max_carried_forward_amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount">
<span<?= $Page->max_carried_forward_amount->viewAttributes() ?>>
<?= $Page->max_carried_forward_amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_HospID" class="hr_leavetypes_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
