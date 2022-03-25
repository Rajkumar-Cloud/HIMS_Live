<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeePermissionsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_permissionsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    femployee_permissionsview = currentForm = new ew.Form("femployee_permissionsview", "view");
    loadjs.done("femployee_permissionsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.employee_permissions) ew.vars.tables.employee_permissions = <?= JsonEncode(GetClientVar("tables", "employee_permissions")) ?>;
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
<form name="femployee_permissionsview" id="femployee_permissionsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_permissions">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_permissions_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_employee_permissions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->user_level->Visible) { // user_level ?>
    <tr id="r_user_level">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_permissions_user_level"><?= $Page->user_level->caption() ?></span></td>
        <td data-name="user_level" <?= $Page->user_level->cellAttributes() ?>>
<span id="el_employee_permissions_user_level">
<span<?= $Page->user_level->viewAttributes() ?>>
<?= $Page->user_level->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->module_id->Visible) { // module_id ?>
    <tr id="r_module_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_permissions_module_id"><?= $Page->module_id->caption() ?></span></td>
        <td data-name="module_id" <?= $Page->module_id->cellAttributes() ?>>
<span id="el_employee_permissions_module_id">
<span<?= $Page->module_id->viewAttributes() ?>>
<?= $Page->module_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_permission->Visible) { // permission ?>
    <tr id="r__permission">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_permissions__permission"><?= $Page->_permission->caption() ?></span></td>
        <td data-name="_permission" <?= $Page->_permission->cellAttributes() ?>>
<span id="el_employee_permissions__permission">
<span<?= $Page->_permission->viewAttributes() ?>>
<?= $Page->_permission->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->meta->Visible) { // meta ?>
    <tr id="r_meta">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_permissions_meta"><?= $Page->meta->caption() ?></span></td>
        <td data-name="meta" <?= $Page->meta->cellAttributes() ?>>
<span id="el_employee_permissions_meta">
<span<?= $Page->meta->viewAttributes() ?>>
<?= $Page->meta->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->value->Visible) { // value ?>
    <tr id="r_value">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_employee_permissions_value"><?= $Page->value->caption() ?></span></td>
        <td data-name="value" <?= $Page->value->cellAttributes() ?>>
<span id="el_employee_permissions_value">
<span<?= $Page->value->viewAttributes() ?>>
<?= $Page->value->getViewValue() ?></span>
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
