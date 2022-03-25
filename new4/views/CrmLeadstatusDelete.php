<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadstatusDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadstatusdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_leadstatusdelete = currentForm = new ew.Form("fcrm_leadstatusdelete", "delete");
    loadjs.done("fcrm_leadstatusdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_leadstatus) ew.vars.tables.crm_leadstatus = <?= JsonEncode(GetClientVar("tables", "crm_leadstatus")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_leadstatusdelete" id="fcrm_leadstatusdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadstatus">
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
<?php if ($Page->leadstatusid->Visible) { // leadstatusid ?>
        <th class="<?= $Page->leadstatusid->headerCellClass() ?>"><span id="elh_crm_leadstatus_leadstatusid" class="crm_leadstatus_leadstatusid"><?= $Page->leadstatusid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
        <th class="<?= $Page->leadstatus->headerCellClass() ?>"><span id="elh_crm_leadstatus_leadstatus" class="crm_leadstatus_leadstatus"><?= $Page->leadstatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <th class="<?= $Page->presence->headerCellClass() ?>"><span id="elh_crm_leadstatus_presence" class="crm_leadstatus_presence"><?= $Page->presence->caption() ?></span></th>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
        <th class="<?= $Page->picklist_valueid->headerCellClass() ?>"><span id="elh_crm_leadstatus_picklist_valueid" class="crm_leadstatus_picklist_valueid"><?= $Page->picklist_valueid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
        <th class="<?= $Page->sortorderid->headerCellClass() ?>"><span id="elh_crm_leadstatus_sortorderid" class="crm_leadstatus_sortorderid"><?= $Page->sortorderid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->color->Visible) { // color ?>
        <th class="<?= $Page->color->headerCellClass() ?>"><span id="elh_crm_leadstatus_color" class="crm_leadstatus_color"><?= $Page->color->caption() ?></span></th>
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
<?php if ($Page->leadstatusid->Visible) { // leadstatusid ?>
        <td <?= $Page->leadstatusid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadstatus_leadstatusid" class="crm_leadstatus_leadstatusid">
<span<?= $Page->leadstatusid->viewAttributes() ?>>
<?= $Page->leadstatusid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leadstatus->Visible) { // leadstatus ?>
        <td <?= $Page->leadstatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadstatus_leadstatus" class="crm_leadstatus_leadstatus">
<span<?= $Page->leadstatus->viewAttributes() ?>>
<?= $Page->leadstatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <td <?= $Page->presence->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadstatus_presence" class="crm_leadstatus_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
        <td <?= $Page->picklist_valueid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadstatus_picklist_valueid" class="crm_leadstatus_picklist_valueid">
<span<?= $Page->picklist_valueid->viewAttributes() ?>>
<?= $Page->picklist_valueid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
        <td <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadstatus_sortorderid" class="crm_leadstatus_sortorderid">
<span<?= $Page->sortorderid->viewAttributes() ?>>
<?= $Page->sortorderid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->color->Visible) { // color ?>
        <td <?= $Page->color->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadstatus_color" class="crm_leadstatus_color">
<span<?= $Page->color->viewAttributes() ?>>
<?= $Page->color->getViewValue() ?></span>
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
