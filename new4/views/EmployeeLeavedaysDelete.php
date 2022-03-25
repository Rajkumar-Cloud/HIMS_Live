<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLeavedaysDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_leavedaysdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_leavedaysdelete = currentForm = new ew.Form("femployee_leavedaysdelete", "delete");
    loadjs.done("femployee_leavedaysdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_leavedays) ew.vars.tables.employee_leavedays = <?= JsonEncode(GetClientVar("tables", "employee_leavedays")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_leavedaysdelete" id="femployee_leavedaysdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_leavedays">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_leavedays_id" class="employee_leavedays_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee_leave->Visible) { // employee_leave ?>
        <th class="<?= $Page->employee_leave->headerCellClass() ?>"><span id="elh_employee_leavedays_employee_leave" class="employee_leavedays_employee_leave"><?= $Page->employee_leave->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leave_date->Visible) { // leave_date ?>
        <th class="<?= $Page->leave_date->headerCellClass() ?>"><span id="elh_employee_leavedays_leave_date" class="employee_leavedays_leave_date"><?= $Page->leave_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
        <th class="<?= $Page->leave_type->headerCellClass() ?>"><span id="elh_employee_leavedays_leave_type" class="employee_leavedays_leave_type"><?= $Page->leave_type->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_leavedays_id" class="employee_leavedays_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee_leave->Visible) { // employee_leave ?>
        <td <?= $Page->employee_leave->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leavedays_employee_leave" class="employee_leavedays_employee_leave">
<span<?= $Page->employee_leave->viewAttributes() ?>>
<?= $Page->employee_leave->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leave_date->Visible) { // leave_date ?>
        <td <?= $Page->leave_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leavedays_leave_date" class="employee_leavedays_leave_date">
<span<?= $Page->leave_date->viewAttributes() ?>>
<?= $Page->leave_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leave_type->Visible) { // leave_type ?>
        <td <?= $Page->leave_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_leavedays_leave_type" class="employee_leavedays_leave_type">
<span<?= $Page->leave_type->viewAttributes() ?>>
<?= $Page->leave_type->getViewValue() ?></span>
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
