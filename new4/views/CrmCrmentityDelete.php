<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmCrmentityDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_crmentitydelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_crmentitydelete = currentForm = new ew.Form("fcrm_crmentitydelete", "delete");
    loadjs.done("fcrm_crmentitydelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_crmentity) ew.vars.tables.crm_crmentity = <?= JsonEncode(GetClientVar("tables", "crm_crmentity")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_crmentitydelete" id="fcrm_crmentitydelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
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
<?php if ($Page->crmid->Visible) { // crmid ?>
        <th class="<?= $Page->crmid->headerCellClass() ?>"><span id="elh_crm_crmentity_crmid" class="crm_crmentity_crmid"><?= $Page->crmid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->smcreatorid->Visible) { // smcreatorid ?>
        <th class="<?= $Page->smcreatorid->headerCellClass() ?>"><span id="elh_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid"><?= $Page->smcreatorid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->smownerid->Visible) { // smownerid ?>
        <th class="<?= $Page->smownerid->headerCellClass() ?>"><span id="elh_crm_crmentity_smownerid" class="crm_crmentity_smownerid"><?= $Page->smownerid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->shownerid->Visible) { // shownerid ?>
        <th class="<?= $Page->shownerid->headerCellClass() ?>"><span id="elh_crm_crmentity_shownerid" class="crm_crmentity_shownerid"><?= $Page->shownerid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->setype->Visible) { // setype ?>
        <th class="<?= $Page->setype->headerCellClass() ?>"><span id="elh_crm_crmentity_setype" class="crm_crmentity_setype"><?= $Page->setype->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdtime->Visible) { // createdtime ?>
        <th class="<?= $Page->createdtime->headerCellClass() ?>"><span id="elh_crm_crmentity_createdtime" class="crm_crmentity_createdtime"><?= $Page->createdtime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedtime->Visible) { // modifiedtime ?>
        <th class="<?= $Page->modifiedtime->headerCellClass() ?>"><span id="elh_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime"><?= $Page->modifiedtime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->viewedtime->Visible) { // viewedtime ?>
        <th class="<?= $Page->viewedtime->headerCellClass() ?>"><span id="elh_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime"><?= $Page->viewedtime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_crm_crmentity_status" class="crm_crmentity_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->version->Visible) { // version ?>
        <th class="<?= $Page->version->headerCellClass() ?>"><span id="elh_crm_crmentity_version" class="crm_crmentity_version"><?= $Page->version->caption() ?></span></th>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <th class="<?= $Page->presence->headerCellClass() ?>"><span id="elh_crm_crmentity_presence" class="crm_crmentity_presence"><?= $Page->presence->caption() ?></span></th>
<?php } ?>
<?php if ($Page->deleted->Visible) { // deleted ?>
        <th class="<?= $Page->deleted->headerCellClass() ?>"><span id="elh_crm_crmentity_deleted" class="crm_crmentity_deleted"><?= $Page->deleted->caption() ?></span></th>
<?php } ?>
<?php if ($Page->was_read->Visible) { // was_read ?>
        <th class="<?= $Page->was_read->headerCellClass() ?>"><span id="elh_crm_crmentity_was_read" class="crm_crmentity_was_read"><?= $Page->was_read->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_private->Visible) { // private ?>
        <th class="<?= $Page->_private->headerCellClass() ?>"><span id="elh_crm_crmentity__private" class="crm_crmentity__private"><?= $Page->_private->caption() ?></span></th>
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
<?php if ($Page->crmid->Visible) { // crmid ?>
        <td <?= $Page->crmid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_crmid" class="crm_crmentity_crmid">
<span<?= $Page->crmid->viewAttributes() ?>>
<?= $Page->crmid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->smcreatorid->Visible) { // smcreatorid ?>
        <td <?= $Page->smcreatorid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_smcreatorid" class="crm_crmentity_smcreatorid">
<span<?= $Page->smcreatorid->viewAttributes() ?>>
<?= $Page->smcreatorid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->smownerid->Visible) { // smownerid ?>
        <td <?= $Page->smownerid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_smownerid" class="crm_crmentity_smownerid">
<span<?= $Page->smownerid->viewAttributes() ?>>
<?= $Page->smownerid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->shownerid->Visible) { // shownerid ?>
        <td <?= $Page->shownerid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_shownerid" class="crm_crmentity_shownerid">
<span<?= $Page->shownerid->viewAttributes() ?>>
<?= $Page->shownerid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_modifiedby" class="crm_crmentity_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->setype->Visible) { // setype ?>
        <td <?= $Page->setype->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_setype" class="crm_crmentity_setype">
<span<?= $Page->setype->viewAttributes() ?>>
<?= $Page->setype->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdtime->Visible) { // createdtime ?>
        <td <?= $Page->createdtime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_createdtime" class="crm_crmentity_createdtime">
<span<?= $Page->createdtime->viewAttributes() ?>>
<?= $Page->createdtime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedtime->Visible) { // modifiedtime ?>
        <td <?= $Page->modifiedtime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_modifiedtime" class="crm_crmentity_modifiedtime">
<span<?= $Page->modifiedtime->viewAttributes() ?>>
<?= $Page->modifiedtime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->viewedtime->Visible) { // viewedtime ?>
        <td <?= $Page->viewedtime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_viewedtime" class="crm_crmentity_viewedtime">
<span<?= $Page->viewedtime->viewAttributes() ?>>
<?= $Page->viewedtime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_status" class="crm_crmentity_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->version->Visible) { // version ?>
        <td <?= $Page->version->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_version" class="crm_crmentity_version">
<span<?= $Page->version->viewAttributes() ?>>
<?= $Page->version->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <td <?= $Page->presence->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_presence" class="crm_crmentity_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->deleted->Visible) { // deleted ?>
        <td <?= $Page->deleted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_deleted" class="crm_crmentity_deleted">
<span<?= $Page->deleted->viewAttributes() ?>>
<?= $Page->deleted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->was_read->Visible) { // was_read ?>
        <td <?= $Page->was_read->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity_was_read" class="crm_crmentity_was_read">
<span<?= $Page->was_read->viewAttributes() ?>>
<?= $Page->was_read->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_private->Visible) { // private ?>
        <td <?= $Page->_private->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_crmentity__private" class="crm_crmentity__private">
<span<?= $Page->_private->viewAttributes() ?>>
<?= $Page->_private->getViewValue() ?></span>
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
