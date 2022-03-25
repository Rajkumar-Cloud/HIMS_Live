<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeePermissionsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var femployee_permissionsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    femployee_permissionsdelete = currentForm = new ew.Form("femployee_permissionsdelete", "delete");
    loadjs.done("femployee_permissionsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.employee_permissions) ew.vars.tables.employee_permissions = <?= JsonEncode(GetClientVar("tables", "employee_permissions")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="femployee_permissionsdelete" id="femployee_permissionsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_permissions">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_employee_permissions_id" class="employee_permissions_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->user_level->Visible) { // user_level ?>
        <th class="<?= $Page->user_level->headerCellClass() ?>"><span id="elh_employee_permissions_user_level" class="employee_permissions_user_level"><?= $Page->user_level->caption() ?></span></th>
<?php } ?>
<?php if ($Page->module_id->Visible) { // module_id ?>
        <th class="<?= $Page->module_id->headerCellClass() ?>"><span id="elh_employee_permissions_module_id" class="employee_permissions_module_id"><?= $Page->module_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_permission->Visible) { // permission ?>
        <th class="<?= $Page->_permission->headerCellClass() ?>"><span id="elh_employee_permissions__permission" class="employee_permissions__permission"><?= $Page->_permission->caption() ?></span></th>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
        <th class="<?= $Page->value->headerCellClass() ?>"><span id="elh_employee_permissions_value" class="employee_permissions_value"><?= $Page->value->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_employee_permissions_id" class="employee_permissions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->user_level->Visible) { // user_level ?>
        <td <?= $Page->user_level->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_permissions_user_level" class="employee_permissions_user_level">
<span<?= $Page->user_level->viewAttributes() ?>>
<?= $Page->user_level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->module_id->Visible) { // module_id ?>
        <td <?= $Page->module_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_permissions_module_id" class="employee_permissions_module_id">
<span<?= $Page->module_id->viewAttributes() ?>>
<?= $Page->module_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_permission->Visible) { // permission ?>
        <td <?= $Page->_permission->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_permissions__permission" class="employee_permissions__permission">
<span<?= $Page->_permission->viewAttributes() ?>>
<?= $Page->_permission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
        <td <?= $Page->value->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_permissions_value" class="employee_permissions_value">
<span<?= $Page->value->viewAttributes() ?>>
<?= $Page->value->getViewValue() ?></span>
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
