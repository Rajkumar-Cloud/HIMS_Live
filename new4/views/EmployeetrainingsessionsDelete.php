<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeetrainingsessionsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployeetrainingsessionsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployeetrainingsessionsdelete = currentForm = new ew.Form("femployeetrainingsessionsdelete", "delete");
    loadjs.done("femployeetrainingsessionsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employeetrainingsessions) ew.vars.tables.employeetrainingsessions = <?= JsonEncode(GetClientVar("tables", "employeetrainingsessions")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployeetrainingsessionsdelete" id="femployeetrainingsessionsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employeetrainingsessions">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employeetrainingsessions_id" class="employeetrainingsessions_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employeetrainingsessions_employee" class="employeetrainingsessions_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->trainingSession->Visible) { // trainingSession ?>
        <th class="<?= $Page->trainingSession->headerCellClass() ?>"><span id="elh_employeetrainingsessions_trainingSession" class="employeetrainingsessions_trainingSession"><?= $Page->trainingSession->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employeetrainingsessions_status" class="employeetrainingsessions_status"><?= $Page->status->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employeetrainingsessions_id" class="employeetrainingsessions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employeetrainingsessions_employee" class="employeetrainingsessions_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->trainingSession->Visible) { // trainingSession ?>
        <td <?= $Page->trainingSession->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employeetrainingsessions_trainingSession" class="employeetrainingsessions_trainingSession">
<span<?= $Page->trainingSession->viewAttributes() ?>>
<?= $Page->trainingSession->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employeetrainingsessions_status" class="employeetrainingsessions_status">
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
