<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeDependentsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_dependentsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_dependentsdelete = currentForm = new ew.Form("femployee_dependentsdelete", "delete");
    loadjs.done("femployee_dependentsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_dependents) ew.vars.tables.employee_dependents = <?= JsonEncode(GetClientVar("tables", "employee_dependents")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_dependentsdelete" id="femployee_dependentsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_dependents">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_dependents_id" class="employee_dependents_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_dependents_employee" class="employee_dependents_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_employee_dependents_name" class="employee_dependents_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
        <th class="<?= $Page->relationship->headerCellClass() ?>"><span id="elh_employee_dependents_relationship" class="employee_dependents_relationship"><?= $Page->relationship->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <th class="<?= $Page->dob->headerCellClass() ?>"><span id="elh_employee_dependents_dob" class="employee_dependents_dob"><?= $Page->dob->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_number->Visible) { // id_number ?>
        <th class="<?= $Page->id_number->headerCellClass() ?>"><span id="elh_employee_dependents_id_number" class="employee_dependents_id_number"><?= $Page->id_number->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_dependents_id" class="employee_dependents_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_dependents_employee" class="employee_dependents_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_dependents_name" class="employee_dependents_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->relationship->Visible) { // relationship ?>
        <td <?= $Page->relationship->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_dependents_relationship" class="employee_dependents_relationship">
<span<?= $Page->relationship->viewAttributes() ?>>
<?= $Page->relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dob->Visible) { // dob ?>
        <td <?= $Page->dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_dependents_dob" class="employee_dependents_dob">
<span<?= $Page->dob->viewAttributes() ?>>
<?= $Page->dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_number->Visible) { // id_number ?>
        <td <?= $Page->id_number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_dependents_id_number" class="employee_dependents_id_number">
<span<?= $Page->id_number->viewAttributes() ?>>
<?= $Page->id_number->getViewValue() ?></span>
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
