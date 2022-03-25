<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyMasterMfrMasterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_master_mfr_masterview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_master_mfr_masterview = currentForm = new ew.Form("fpharmacy_master_mfr_masterview", "view");
    loadjs.done("fpharmacy_master_mfr_masterview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pharmacy_master_mfr_master) ew.vars.tables.pharmacy_master_mfr_master = <?= JsonEncode(GetClientVar("tables", "pharmacy_master_mfr_master")) ?>;
</script>
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
<form name="fpharmacy_master_mfr_masterview" id="fpharmacy_master_mfr_masterview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_mfr_master">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->CODE->Visible) { // CODE ?>
    <tr id="r_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_mfr_master_CODE"><?= $Page->CODE->caption() ?></span></td>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_mfr_master_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
    <tr id="r_NAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_mfr_master_NAME"><?= $Page->NAME->caption() ?></span></td>
        <td data-name="NAME" <?= $Page->NAME->cellAttributes() ?>>
<span id="el_pharmacy_master_mfr_master_NAME">
<span<?= $Page->NAME->viewAttributes() ?>>
<?= $Page->NAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_mfr_master_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_master_mfr_master_id">
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
