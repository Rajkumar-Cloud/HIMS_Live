<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTravelRecordsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_travel_recordsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_travel_recordsdelete = currentForm = new ew.Form("femployee_travel_recordsdelete", "delete");
    loadjs.done("femployee_travel_recordsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_travel_records) ew.vars.tables.employee_travel_records = <?= JsonEncode(GetClientVar("tables", "employee_travel_records")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_travel_recordsdelete" id="femployee_travel_recordsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_travel_records">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_travel_records_id" class="employee_travel_records_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th class="<?= $Page->employee->headerCellClass() ?>"><span id="elh_employee_travel_records_employee" class="employee_travel_records_employee"><?= $Page->employee->caption() ?></span></th>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
        <th class="<?= $Page->type->headerCellClass() ?>"><span id="elh_employee_travel_records_type" class="employee_travel_records_type"><?= $Page->type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
        <th class="<?= $Page->purpose->headerCellClass() ?>"><span id="elh_employee_travel_records_purpose" class="employee_travel_records_purpose"><?= $Page->purpose->caption() ?></span></th>
<?php } ?>
<?php if ($Page->travel_from->Visible) { // travel_from ?>
        <th class="<?= $Page->travel_from->headerCellClass() ?>"><span id="elh_employee_travel_records_travel_from" class="employee_travel_records_travel_from"><?= $Page->travel_from->caption() ?></span></th>
<?php } ?>
<?php if ($Page->travel_to->Visible) { // travel_to ?>
        <th class="<?= $Page->travel_to->headerCellClass() ?>"><span id="elh_employee_travel_records_travel_to" class="employee_travel_records_travel_to"><?= $Page->travel_to->caption() ?></span></th>
<?php } ?>
<?php if ($Page->travel_date->Visible) { // travel_date ?>
        <th class="<?= $Page->travel_date->headerCellClass() ?>"><span id="elh_employee_travel_records_travel_date" class="employee_travel_records_travel_date"><?= $Page->travel_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->return_date->Visible) { // return_date ?>
        <th class="<?= $Page->return_date->headerCellClass() ?>"><span id="elh_employee_travel_records_return_date" class="employee_travel_records_return_date"><?= $Page->return_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->funding->Visible) { // funding ?>
        <th class="<?= $Page->funding->headerCellClass() ?>"><span id="elh_employee_travel_records_funding" class="employee_travel_records_funding"><?= $Page->funding->caption() ?></span></th>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <th class="<?= $Page->currency->headerCellClass() ?>"><span id="elh_employee_travel_records_currency" class="employee_travel_records_currency"><?= $Page->currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
        <th class="<?= $Page->attachment1->headerCellClass() ?>"><span id="elh_employee_travel_records_attachment1" class="employee_travel_records_attachment1"><?= $Page->attachment1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
        <th class="<?= $Page->attachment2->headerCellClass() ?>"><span id="elh_employee_travel_records_attachment2" class="employee_travel_records_attachment2"><?= $Page->attachment2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
        <th class="<?= $Page->attachment3->headerCellClass() ?>"><span id="elh_employee_travel_records_attachment3" class="employee_travel_records_attachment3"><?= $Page->attachment3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_employee_travel_records_created" class="employee_travel_records_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_employee_travel_records_updated" class="employee_travel_records_updated"><?= $Page->updated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_employee_travel_records_status" class="employee_travel_records_status"><?= $Page->status->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_travel_records_id" class="employee_travel_records_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <td <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_employee" class="employee_travel_records_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->type->Visible) { // type ?>
        <td <?= $Page->type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_type" class="employee_travel_records_type">
<span<?= $Page->type->viewAttributes() ?>>
<?= $Page->type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->purpose->Visible) { // purpose ?>
        <td <?= $Page->purpose->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_purpose" class="employee_travel_records_purpose">
<span<?= $Page->purpose->viewAttributes() ?>>
<?= $Page->purpose->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->travel_from->Visible) { // travel_from ?>
        <td <?= $Page->travel_from->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_travel_from" class="employee_travel_records_travel_from">
<span<?= $Page->travel_from->viewAttributes() ?>>
<?= $Page->travel_from->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->travel_to->Visible) { // travel_to ?>
        <td <?= $Page->travel_to->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_travel_to" class="employee_travel_records_travel_to">
<span<?= $Page->travel_to->viewAttributes() ?>>
<?= $Page->travel_to->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->travel_date->Visible) { // travel_date ?>
        <td <?= $Page->travel_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_travel_date" class="employee_travel_records_travel_date">
<span<?= $Page->travel_date->viewAttributes() ?>>
<?= $Page->travel_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->return_date->Visible) { // return_date ?>
        <td <?= $Page->return_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_return_date" class="employee_travel_records_return_date">
<span<?= $Page->return_date->viewAttributes() ?>>
<?= $Page->return_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->funding->Visible) { // funding ?>
        <td <?= $Page->funding->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_funding" class="employee_travel_records_funding">
<span<?= $Page->funding->viewAttributes() ?>>
<?= $Page->funding->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->currency->Visible) { // currency ?>
        <td <?= $Page->currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_currency" class="employee_travel_records_currency">
<span<?= $Page->currency->viewAttributes() ?>>
<?= $Page->currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
        <td <?= $Page->attachment1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_attachment1" class="employee_travel_records_attachment1">
<span<?= $Page->attachment1->viewAttributes() ?>>
<?= $Page->attachment1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
        <td <?= $Page->attachment2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_attachment2" class="employee_travel_records_attachment2">
<span<?= $Page->attachment2->viewAttributes() ?>>
<?= $Page->attachment2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
        <td <?= $Page->attachment3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_attachment3" class="employee_travel_records_attachment3">
<span<?= $Page->attachment3->viewAttributes() ?>>
<?= $Page->attachment3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_created" class="employee_travel_records_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_updated" class="employee_travel_records_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_travel_records_status" class="employee_travel_records_status">
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
