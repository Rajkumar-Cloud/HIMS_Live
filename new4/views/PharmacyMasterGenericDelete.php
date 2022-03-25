<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyMasterGenericDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_master_genericdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_master_genericdelete = currentForm = new ew.Form("fpharmacy_master_genericdelete", "delete");
    loadjs.done("fpharmacy_master_genericdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_master_generic) ew.vars.tables.pharmacy_master_generic = <?= JsonEncode(GetClientVar("tables", "pharmacy_master_generic")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_master_genericdelete" id="fpharmacy_master_genericdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
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
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th class="<?= $Page->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME"><?= $Page->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE"><?= $Page->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRPCODE->Visible) { // GRPCODE ?>
        <th class="<?= $Page->GRPCODE->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE"><?= $Page->GRPCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_id" class="pharmacy_master_generic_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <td <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRPCODE->Visible) { // GRPCODE ?>
        <td <?= $Page->GRPCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE">
<span<?= $Page->GRPCODE->viewAttributes() ?>>
<?= $Page->GRPCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_generic_id" class="pharmacy_master_generic_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
