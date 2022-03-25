<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresMasTimeoftakingDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_mas_timeoftakingdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpres_mas_timeoftakingdelete = currentForm = new ew.Form("fpres_mas_timeoftakingdelete", "delete");
    loadjs.done("fpres_mas_timeoftakingdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pres_mas_timeoftaking) ew.vars.tables.pres_mas_timeoftaking = <?= JsonEncode(GetClientVar("tables", "pres_mas_timeoftaking")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpres_mas_timeoftakingdelete" id="fpres_mas_timeoftakingdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_mas_timeoftaking">
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
<?php if ($Page->ID->Visible) { // ID ?>
        <th class="<?= $Page->ID->headerCellClass() ?>"><span id="elh_pres_mas_timeoftaking_ID" class="pres_mas_timeoftaking_ID"><?= $Page->ID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // Time Of Taking ?>
        <th class="<?= $Page->TimeOfTaking->headerCellClass() ?>"><span id="elh_pres_mas_timeoftaking_TimeOfTaking" class="pres_mas_timeoftaking_TimeOfTaking"><?= $Page->TimeOfTaking->caption() ?></span></th>
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
<?php if ($Page->ID->Visible) { // ID ?>
        <td <?= $Page->ID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_mas_timeoftaking_ID" class="pres_mas_timeoftaking_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // Time Of Taking ?>
        <td <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_mas_timeoftaking_TimeOfTaking" class="pres_mas_timeoftaking_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
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
