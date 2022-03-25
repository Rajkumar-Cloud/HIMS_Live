<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyCombinationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_combinationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_combinationview = currentForm = new ew.Form("fpharmacy_combinationview", "view");
    loadjs.done("fpharmacy_combinationview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
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
<form name="fpharmacy_combinationview" id="fpharmacy_combinationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
    <tr id="r_GENCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_GENCODE"><?= $Page->GENCODE->caption() ?></span></td>
        <td data-name="GENCODE" <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_GENCODE">
<span<?= $Page->GENCODE->viewAttributes() ?>>
<?= $Page->GENCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
    <tr id="r_COMBCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_COMBCODE"><?= $Page->COMBCODE->caption() ?></span></td>
        <td data-name="COMBCODE" <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_COMBCODE">
<span<?= $Page->COMBCODE->viewAttributes() ?>>
<?= $Page->COMBCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <tr id="r_STRENGTH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_STRENGTH"><?= $Page->STRENGTH->caption() ?></span></td>
        <td data-name="STRENGTH" <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_combination_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
    <tr id="r_SLNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_SLNO"><?= $Page->SLNO->caption() ?></span></td>
        <td data-name="SLNO" <?= $Page->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_combination_SLNO">
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_combination_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_combination_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
