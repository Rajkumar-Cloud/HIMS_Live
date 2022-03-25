<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_immigrationsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_immigrationsdelete = currentForm = new ew.Form("femployee_immigrationsdelete", "delete");
    loadjs.done("femployee_immigrationsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_immigrations) ew.vars.tables.employee_immigrations = <?= JsonEncode(GetClientVar("tables", "employee_immigrations")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_immigrationsdelete" id="femployee_immigrationsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_immigrations_id" class="employee_immigrations_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_immigrations_employee" class="employee_immigrations_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->document->Visible) { // document ?>
        <th class="<?= $Page->document->headerCellClass() ?>"><span id="elh_employee_immigrations_document" class="employee_immigrations_document"><?= $Page->document->caption() ?></span></th>
<?php } ?>
<?php if ($Page->documentname->Visible) { // documentname ?>
        <th class="<?= $Page->documentname->headerCellClass() ?>"><span id="elh_employee_immigrations_documentname" class="employee_immigrations_documentname"><?= $Page->documentname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->valid_until->Visible) { // valid_until ?>
        <th class="<?= $Page->valid_until->headerCellClass() ?>"><span id="elh_employee_immigrations_valid_until" class="employee_immigrations_valid_until"><?= $Page->valid_until->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_immigrations_status" class="employee_immigrations_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
        <th class="<?= $Page->attachment1->headerCellClass() ?>"><span id="elh_employee_immigrations_attachment1" class="employee_immigrations_attachment1"><?= $Page->attachment1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
        <th class="<?= $Page->attachment2->headerCellClass() ?>"><span id="elh_employee_immigrations_attachment2" class="employee_immigrations_attachment2"><?= $Page->attachment2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
        <th class="<?= $Page->attachment3->headerCellClass() ?>"><span id="elh_employee_immigrations_attachment3" class="employee_immigrations_attachment3"><?= $Page->attachment3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_employee_immigrations_created" class="employee_immigrations_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_employee_immigrations_updated" class="employee_immigrations_updated"><?= $Page->updated->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_immigrations_id" class="employee_immigrations_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_employee" class="employee_immigrations_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->document->Visible) { // document ?>
        <td <?= $Page->document->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_document" class="employee_immigrations_document">
<span<?= $Page->document->viewAttributes() ?>>
<?= $Page->document->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->documentname->Visible) { // documentname ?>
        <td <?= $Page->documentname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_documentname" class="employee_immigrations_documentname">
<span<?= $Page->documentname->viewAttributes() ?>>
<?= $Page->documentname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->valid_until->Visible) { // valid_until ?>
        <td <?= $Page->valid_until->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_valid_until" class="employee_immigrations_valid_until">
<span<?= $Page->valid_until->viewAttributes() ?>>
<?= $Page->valid_until->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_status" class="employee_immigrations_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
        <td <?= $Page->attachment1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_attachment1" class="employee_immigrations_attachment1">
<span<?= $Page->attachment1->viewAttributes() ?>>
<?= $Page->attachment1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
        <td <?= $Page->attachment2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_attachment2" class="employee_immigrations_attachment2">
<span<?= $Page->attachment2->viewAttributes() ?>>
<?= $Page->attachment2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
        <td <?= $Page->attachment3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_attachment3" class="employee_immigrations_attachment3">
<span<?= $Page->attachment3->viewAttributes() ?>>
<?= $Page->attachment3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_created" class="employee_immigrations_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_updated" class="employee_immigrations_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
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
