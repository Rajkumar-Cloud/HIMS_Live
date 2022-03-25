<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLanguagesDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_languagesdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_languagesdelete = currentForm = new ew.Form("femployee_languagesdelete", "delete");
    loadjs.done("femployee_languagesdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_languages) ew.vars.tables.employee_languages = <?= JsonEncode(GetClientVar("tables", "employee_languages")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_languagesdelete" id="femployee_languagesdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_languages_id" class="employee_languages_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->language_id->Visible) { // language_id ?>
        <th class="<?= $Page->language_id->headerCellClass() ?>"><span id="elh_employee_languages_language_id" class="employee_languages_language_id"><?= $Page->language_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_languages_employee" class="employee_languages_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->reading->Visible) { // reading ?>
        <th class="<?= $Page->reading->headerCellClass() ?>"><span id="elh_employee_languages_reading" class="employee_languages_reading"><?= $Page->reading->caption() ?></span></th>
<?php } ?>
<?php if ($Page->speaking->Visible) { // speaking ?>
        <th class="<?= $Page->speaking->headerCellClass() ?>"><span id="elh_employee_languages_speaking" class="employee_languages_speaking"><?= $Page->speaking->caption() ?></span></th>
<?php } ?>
<?php if ($Page->writing->Visible) { // writing ?>
        <th class="<?= $Page->writing->headerCellClass() ?>"><span id="elh_employee_languages_writing" class="employee_languages_writing"><?= $Page->writing->caption() ?></span></th>
<?php } ?>
<?php if ($Page->understanding->Visible) { // understanding ?>
        <th class="<?= $Page->understanding->headerCellClass() ?>"><span id="elh_employee_languages_understanding" class="employee_languages_understanding"><?= $Page->understanding->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_languages_id" class="employee_languages_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->language_id->Visible) { // language_id ?>
        <td <?= $Page->language_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_language_id" class="employee_languages_language_id">
<span<?= $Page->language_id->viewAttributes() ?>>
<?= $Page->language_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_employee" class="employee_languages_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->reading->Visible) { // reading ?>
        <td <?= $Page->reading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_reading" class="employee_languages_reading">
<span<?= $Page->reading->viewAttributes() ?>>
<?= $Page->reading->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->speaking->Visible) { // speaking ?>
        <td <?= $Page->speaking->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_speaking" class="employee_languages_speaking">
<span<?= $Page->speaking->viewAttributes() ?>>
<?= $Page->speaking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->writing->Visible) { // writing ?>
        <td <?= $Page->writing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_writing" class="employee_languages_writing">
<span<?= $Page->writing->viewAttributes() ?>>
<?= $Page->writing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->understanding->Visible) { // understanding ?>
        <td <?= $Page->understanding->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_understanding" class="employee_languages_understanding">
<span<?= $Page->understanding->viewAttributes() ?>>
<?= $Page->understanding->getViewValue() ?></span>
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
