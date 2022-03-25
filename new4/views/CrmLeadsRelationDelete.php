<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsRelationDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leads_relationdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_leads_relationdelete = currentForm = new ew.Form("fcrm_leads_relationdelete", "delete");
    loadjs.done("fcrm_leads_relationdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_leads_relation) ew.vars.tables.crm_leads_relation = <?= JsonEncode(GetClientVar("tables", "crm_leads_relation")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_leads_relationdelete" id="fcrm_leads_relationdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leads_relation">
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
<?php if ($Page->leads_relationid->Visible) { // leads_relationid ?>
        <th class="<?= $Page->leads_relationid->headerCellClass() ?>"><span id="elh_crm_leads_relation_leads_relationid" class="crm_leads_relation_leads_relationid"><?= $Page->leads_relationid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
        <th class="<?= $Page->leads_relation->headerCellClass() ?>"><span id="elh_crm_leads_relation_leads_relation" class="crm_leads_relation_leads_relation"><?= $Page->leads_relation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
        <th class="<?= $Page->sortorderid->headerCellClass() ?>"><span id="elh_crm_leads_relation_sortorderid" class="crm_leads_relation_sortorderid"><?= $Page->sortorderid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <th class="<?= $Page->presence->headerCellClass() ?>"><span id="elh_crm_leads_relation_presence" class="crm_leads_relation_presence"><?= $Page->presence->caption() ?></span></th>
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
<?php if ($Page->leads_relationid->Visible) { // leads_relationid ?>
        <td <?= $Page->leads_relationid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leads_relation_leads_relationid" class="crm_leads_relation_leads_relationid">
<span<?= $Page->leads_relationid->viewAttributes() ?>>
<?= $Page->leads_relationid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leads_relation->Visible) { // leads_relation ?>
        <td <?= $Page->leads_relation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leads_relation_leads_relation" class="crm_leads_relation_leads_relation">
<span<?= $Page->leads_relation->viewAttributes() ?>>
<?= $Page->leads_relation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
        <td <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leads_relation_sortorderid" class="crm_leads_relation_sortorderid">
<span<?= $Page->sortorderid->viewAttributes() ?>>
<?= $Page->sortorderid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <td <?= $Page->presence->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leads_relation_presence" class="crm_leads_relation_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
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
