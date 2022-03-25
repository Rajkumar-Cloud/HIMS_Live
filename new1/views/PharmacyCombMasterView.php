<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyCombMasterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_comb_masterview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_comb_masterview = currentForm = new ew.Form("fpharmacy_comb_masterview", "view");
    loadjs.done("fpharmacy_comb_masterview");
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
<form name="fpharmacy_comb_masterview" id="fpharmacy_comb_masterview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_comb_master">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->CODE->Visible) { // CODE ?>
    <tr id="r_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_comb_master_CODE"><?= $Page->CODE->caption() ?></span></td>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
    <tr id="r_NAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_comb_master_NAME"><?= $Page->NAME->caption() ?></span></td>
        <td data-name="NAME" <?= $Page->NAME->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_NAME">
<span<?= $Page->NAME->viewAttributes() ?>>
<?= $Page->NAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GRPCODE->Visible) { // GRPCODE ?>
    <tr id="r_GRPCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_comb_master_GRPCODE"><?= $Page->GRPCODE->caption() ?></span></td>
        <td data-name="GRPCODE" <?= $Page->GRPCODE->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_GRPCODE">
<span<?= $Page->GRPCODE->viewAttributes() ?>>
<?= $Page->GRPCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_comb_master_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_id">
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
