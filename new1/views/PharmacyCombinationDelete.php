<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyCombinationDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_combinationdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_combinationdelete = currentForm = new ew.Form("fpharmacy_combinationdelete", "delete");
    loadjs.done("fpharmacy_combinationdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_combinationdelete" id="fpharmacy_combinationdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
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
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <th class="<?= $Page->GENCODE->headerCellClass() ?>"><span id="elh_pharmacy_combination_GENCODE" class="pharmacy_combination_GENCODE"><?= $Page->GENCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <th class="<?= $Page->COMBCODE->headerCellClass() ?>"><span id="elh_pharmacy_combination_COMBCODE" class="pharmacy_combination_COMBCODE"><?= $Page->COMBCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <th class="<?= $Page->STRENGTH->headerCellClass() ?>"><span id="elh_pharmacy_combination_STRENGTH" class="pharmacy_combination_STRENGTH"><?= $Page->STRENGTH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <th class="<?= $Page->SLNO->headerCellClass() ?>"><span id="elh_pharmacy_combination_SLNO" class="pharmacy_combination_SLNO"><?= $Page->SLNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_combination_id" class="pharmacy_combination_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <td <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_combination_GENCODE" class="pharmacy_combination_GENCODE">
<span<?= $Page->GENCODE->viewAttributes() ?>>
<?= $Page->GENCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <td <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_combination_COMBCODE" class="pharmacy_combination_COMBCODE">
<span<?= $Page->COMBCODE->viewAttributes() ?>>
<?= $Page->COMBCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <td <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_combination_STRENGTH" class="pharmacy_combination_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <td <?= $Page->SLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_combination_SLNO" class="pharmacy_combination_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_combination_id" class="pharmacy_combination_id">
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
