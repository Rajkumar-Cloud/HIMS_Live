<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyMasterProductSimilarDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_master_product_similardelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_master_product_similardelete = currentForm = new ew.Form("fpharmacy_master_product_similardelete", "delete");
    loadjs.done("fpharmacy_master_product_similardelete");
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
<form name="fpharmacy_master_product_similardelete" id="fpharmacy_master_product_similardelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_master_product_similar_PRC" class="pharmacy_master_product_similar_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MAINPRC->Visible) { // MAINPRC ?>
        <th class="<?= $Page->MAINPRC->headerCellClass() ?>"><span id="elh_pharmacy_master_product_similar_MAINPRC" class="pharmacy_master_product_similar_MAINPRC"><?= $Page->MAINPRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRTYPE->Visible) { // PRTYPE ?>
        <th class="<?= $Page->PRTYPE->headerCellClass() ?>"><span id="elh_pharmacy_master_product_similar_PRTYPE" class="pharmacy_master_product_similar_PRTYPE"><?= $Page->PRTYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_master_product_similar_id" class="pharmacy_master_product_similar_id"><?= $Page->id->caption() ?></span></th>
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_product_similar_PRC" class="pharmacy_master_product_similar_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MAINPRC->Visible) { // MAINPRC ?>
        <td <?= $Page->MAINPRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_product_similar_MAINPRC" class="pharmacy_master_product_similar_MAINPRC">
<span<?= $Page->MAINPRC->viewAttributes() ?>>
<?= $Page->MAINPRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRTYPE->Visible) { // PRTYPE ?>
        <td <?= $Page->PRTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_product_similar_PRTYPE" class="pharmacy_master_product_similar_PRTYPE">
<span<?= $Page->PRTYPE->viewAttributes() ?>>
<?= $Page->PRTYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_master_product_similar_id" class="pharmacy_master_product_similar_id">
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
