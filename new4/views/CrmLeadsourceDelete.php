<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadsourceDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadsourcedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fcrm_leadsourcedelete = currentForm = new ew.Form("fcrm_leadsourcedelete", "delete");
    loadjs.done("fcrm_leadsourcedelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.crm_leadsource) ew.vars.tables.crm_leadsource = <?= JsonEncode(GetClientVar("tables", "crm_leadsource")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fcrm_leadsourcedelete" id="fcrm_leadsourcedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadsource">
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
<?php if ($Page->leadsourceid->Visible) { // leadsourceid ?>
        <th class="<?= $Page->leadsourceid->headerCellClass() ?>"><span id="elh_crm_leadsource_leadsourceid" class="crm_leadsource_leadsourceid"><?= $Page->leadsourceid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
        <th class="<?= $Page->leadsource->headerCellClass() ?>"><span id="elh_crm_leadsource_leadsource" class="crm_leadsource_leadsource"><?= $Page->leadsource->caption() ?></span></th>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <th class="<?= $Page->presence->headerCellClass() ?>"><span id="elh_crm_leadsource_presence" class="crm_leadsource_presence"><?= $Page->presence->caption() ?></span></th>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
        <th class="<?= $Page->picklist_valueid->headerCellClass() ?>"><span id="elh_crm_leadsource_picklist_valueid" class="crm_leadsource_picklist_valueid"><?= $Page->picklist_valueid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
        <th class="<?= $Page->sortorderid->headerCellClass() ?>"><span id="elh_crm_leadsource_sortorderid" class="crm_leadsource_sortorderid"><?= $Page->sortorderid->caption() ?></span></th>
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
<?php if ($Page->leadsourceid->Visible) { // leadsourceid ?>
        <td <?= $Page->leadsourceid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadsource_leadsourceid" class="crm_leadsource_leadsourceid">
<span<?= $Page->leadsourceid->viewAttributes() ?>>
<?= $Page->leadsourceid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leadsource->Visible) { // leadsource ?>
        <td <?= $Page->leadsource->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadsource_leadsource" class="crm_leadsource_leadsource">
<span<?= $Page->leadsource->viewAttributes() ?>>
<?= $Page->leadsource->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->presence->Visible) { // presence ?>
        <td <?= $Page->presence->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadsource_presence" class="crm_leadsource_presence">
<span<?= $Page->presence->viewAttributes() ?>>
<?= $Page->presence->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->picklist_valueid->Visible) { // picklist_valueid ?>
        <td <?= $Page->picklist_valueid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadsource_picklist_valueid" class="crm_leadsource_picklist_valueid">
<span<?= $Page->picklist_valueid->viewAttributes() ?>>
<?= $Page->picklist_valueid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sortorderid->Visible) { // sortorderid ?>
        <td <?= $Page->sortorderid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_crm_leadsource_sortorderid" class="crm_leadsource_sortorderid">
<span<?= $Page->sortorderid->viewAttributes() ?>>
<?= $Page->sortorderid->getViewValue() ?></span>
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
