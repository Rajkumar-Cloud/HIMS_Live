<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationdocumentsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_immigrationdocumentsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_immigrationdocumentsdelete = currentForm = new ew.Form("femployee_immigrationdocumentsdelete", "delete");
    loadjs.done("femployee_immigrationdocumentsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_immigrationdocuments) ew.vars.tables.employee_immigrationdocuments = <?= JsonEncode(GetClientVar("tables", "employee_immigrationdocuments")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_immigrationdocumentsdelete" id="femployee_immigrationdocumentsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->required->Visible) { // required ?>
        <th class="<?= $Page->required->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required"><?= $Page->required->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alert_on_missing->Visible) { // alert_on_missing ?>
        <th class="<?= $Page->alert_on_missing->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing"><?= $Page->alert_on_missing->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alert_before_expiry->Visible) { // alert_before_expiry ?>
        <th class="<?= $Page->alert_before_expiry->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry"><?= $Page->alert_before_expiry->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alert_before_day_number->Visible) { // alert_before_day_number ?>
        <th class="<?= $Page->alert_before_day_number->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number"><?= $Page->alert_before_day_number->caption() ?></span></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th class="<?= $Page->created->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created"><?= $Page->created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th class="<?= $Page->updated->headerCellClass() ?>"><span id="elh_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated"><?= $Page->updated->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->required->Visible) { // required ?>
        <td <?= $Page->required->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required">
<span<?= $Page->required->viewAttributes() ?>>
<?= $Page->required->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->alert_on_missing->Visible) { // alert_on_missing ?>
        <td <?= $Page->alert_on_missing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing">
<span<?= $Page->alert_on_missing->viewAttributes() ?>>
<?= $Page->alert_on_missing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->alert_before_expiry->Visible) { // alert_before_expiry ?>
        <td <?= $Page->alert_before_expiry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry">
<span<?= $Page->alert_before_expiry->viewAttributes() ?>>
<?= $Page->alert_before_expiry->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->alert_before_day_number->Visible) { // alert_before_day_number ?>
        <td <?= $Page->alert_before_day_number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number">
<span<?= $Page->alert_before_day_number->viewAttributes() ?>>
<?= $Page->alert_before_day_number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <td <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <td <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated">
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
