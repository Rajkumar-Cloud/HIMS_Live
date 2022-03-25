<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasModepaymentView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_modepaymentview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmas_modepaymentview = currentForm = new ew.Form("fmas_modepaymentview", "view");
    loadjs.done("fmas_modepaymentview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.mas_modepayment) ew.vars.tables.mas_modepayment = <?= JsonEncode(GetClientVar("tables", "mas_modepayment")) ?>;
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
<form name="fmas_modepaymentview" id="fmas_modepaymentview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_modepayment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mode->Visible) { // Mode ?>
    <tr id="r_Mode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_Mode"><?= $Page->Mode->caption() ?></span></td>
        <td data-name="Mode" <?= $Page->Mode->cellAttributes() ?>>
<span id="el_mas_modepayment_Mode">
<span<?= $Page->Mode->viewAttributes() ?>>
<?= $Page->Mode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankingDatails->Visible) { // BankingDatails ?>
    <tr id="r_BankingDatails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_BankingDatails"><?= $Page->BankingDatails->caption() ?></span></td>
        <td data-name="BankingDatails" <?= $Page->BankingDatails->cellAttributes() ?>>
<span id="el_mas_modepayment_BankingDatails">
<span<?= $Page->BankingDatails->viewAttributes() ?>>
<?= $Page->BankingDatails->getViewValue() ?></span>
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
