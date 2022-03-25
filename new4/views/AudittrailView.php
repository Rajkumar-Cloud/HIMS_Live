<?php

namespace PHPMaker2021\HIMS;

// Page object
$AudittrailView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var faudittrailview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    faudittrailview = currentForm = new ew.Form("faudittrailview", "view");
    loadjs.done("faudittrailview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.audittrail) ew.vars.tables.audittrail = <?= JsonEncode(GetClientVar("tables", "audittrail")) ?>;
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
<form name="faudittrailview" id="faudittrailview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="audittrail">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_audittrail_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->datetime->Visible) { // datetime ?>
    <tr id="r_datetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_datetime"><?= $Page->datetime->caption() ?></span></td>
        <td data-name="datetime" <?= $Page->datetime->cellAttributes() ?>>
<span id="el_audittrail_datetime">
<span<?= $Page->datetime->viewAttributes() ?>>
<?= $Page->datetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->script->Visible) { // script ?>
    <tr id="r_script">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_script"><?= $Page->script->caption() ?></span></td>
        <td data-name="script" <?= $Page->script->cellAttributes() ?>>
<span id="el_audittrail_script">
<span<?= $Page->script->viewAttributes() ?>>
<?= $Page->script->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->user->Visible) { // user ?>
    <tr id="r_user">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_user"><?= $Page->user->caption() ?></span></td>
        <td data-name="user" <?= $Page->user->cellAttributes() ?>>
<span id="el_audittrail_user">
<span<?= $Page->user->viewAttributes() ?>>
<?= $Page->user->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_action->Visible) { // action ?>
    <tr id="r__action">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail__action"><?= $Page->_action->caption() ?></span></td>
        <td data-name="_action" <?= $Page->_action->cellAttributes() ?>>
<span id="el_audittrail__action">
<span<?= $Page->_action->viewAttributes() ?>>
<?= $Page->_action->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_table->Visible) { // table ?>
    <tr id="r__table">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail__table"><?= $Page->_table->caption() ?></span></td>
        <td data-name="_table" <?= $Page->_table->cellAttributes() ?>>
<span id="el_audittrail__table">
<span<?= $Page->_table->viewAttributes() ?>>
<?= $Page->_table->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->field->Visible) { // field ?>
    <tr id="r_field">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_field"><?= $Page->field->caption() ?></span></td>
        <td data-name="field" <?= $Page->field->cellAttributes() ?>>
<span id="el_audittrail_field">
<span<?= $Page->field->viewAttributes() ?>>
<?= $Page->field->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->keyvalue->Visible) { // keyvalue ?>
    <tr id="r_keyvalue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_keyvalue"><?= $Page->keyvalue->caption() ?></span></td>
        <td data-name="keyvalue" <?= $Page->keyvalue->cellAttributes() ?>>
<span id="el_audittrail_keyvalue">
<span<?= $Page->keyvalue->viewAttributes() ?>>
<?= $Page->keyvalue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->oldvalue->Visible) { // oldvalue ?>
    <tr id="r_oldvalue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_oldvalue"><?= $Page->oldvalue->caption() ?></span></td>
        <td data-name="oldvalue" <?= $Page->oldvalue->cellAttributes() ?>>
<span id="el_audittrail_oldvalue">
<span<?= $Page->oldvalue->viewAttributes() ?>>
<?= $Page->oldvalue->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->newvalue->Visible) { // newvalue ?>
    <tr id="r_newvalue">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_audittrail_newvalue"><?= $Page->newvalue->caption() ?></span></td>
        <td data-name="newvalue" <?= $Page->newvalue->cellAttributes() ?>>
<span id="el_audittrail_newvalue">
<span<?= $Page->newvalue->viewAttributes() ?>>
<?= $Page->newvalue->getViewValue() ?></span>
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
