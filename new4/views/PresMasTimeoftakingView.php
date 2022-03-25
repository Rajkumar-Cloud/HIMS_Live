<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresMasTimeoftakingView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_mas_timeoftakingview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpres_mas_timeoftakingview = currentForm = new ew.Form("fpres_mas_timeoftakingview", "view");
    loadjs.done("fpres_mas_timeoftakingview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.pres_mas_timeoftaking) ew.vars.tables.pres_mas_timeoftaking = <?= JsonEncode(GetClientVar("tables", "pres_mas_timeoftaking")) ?>;
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
<form name="fpres_mas_timeoftakingview" id="fpres_mas_timeoftakingview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_mas_timeoftaking">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->ID->Visible) { // ID ?>
    <tr id="r_ID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_mas_timeoftaking_ID"><?= $Page->ID->caption() ?></span></td>
        <td data-name="ID" <?= $Page->ID->cellAttributes() ?>>
<span id="el_pres_mas_timeoftaking_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // Time Of Taking ?>
    <tr id="r_TimeOfTaking">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pres_mas_timeoftaking_TimeOfTaking"><?= $Page->TimeOfTaking->caption() ?></span></td>
        <td data-name="TimeOfTaking" <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el_pres_mas_timeoftaking_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
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
