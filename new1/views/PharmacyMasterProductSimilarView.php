<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyMasterProductSimilarView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_master_product_similarview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_master_product_similarview = currentForm = new ew.Form("fpharmacy_master_product_similarview", "view");
    loadjs.done("fpharmacy_master_product_similarview");
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
<form name="fpharmacy_master_product_similarview" id="fpharmacy_master_product_similarview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_product_similar">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->PRC->Visible) { // PRC ?>
    <tr id="r_PRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_PRC"><?= $Page->PRC->caption() ?></span></td>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MAINPRC->Visible) { // MAINPRC ?>
    <tr id="r_MAINPRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_MAINPRC"><?= $Page->MAINPRC->caption() ?></span></td>
        <td data-name="MAINPRC" <?= $Page->MAINPRC->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_MAINPRC">
<span<?= $Page->MAINPRC->viewAttributes() ?>>
<?= $Page->MAINPRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRTYPE->Visible) { // PRTYPE ?>
    <tr id="r_PRTYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_PRTYPE"><?= $Page->PRTYPE->caption() ?></span></td>
        <td data-name="PRTYPE" <?= $Page->PRTYPE->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_PRTYPE">
<span<?= $Page->PRTYPE->viewAttributes() ?>>
<?= $Page->PRTYPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_product_similar_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_master_product_similar_id">
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
