<?php

namespace PHPMaker2021\project3;

// Page object
$BillingDiscountView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fbilling_discountview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fbilling_discountview = currentForm = new ew.Form("fbilling_discountview", "view");
    loadjs.done("fbilling_discountview");
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
<form name="fbilling_discountview" id="fbilling_discountview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_discount_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_billing_discount_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Particulars->Visible) { // Particulars ?>
    <tr id="r_Particulars">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_discount_Particulars"><?= $Page->Particulars->caption() ?></span></td>
        <td data-name="Particulars" <?= $Page->Particulars->cellAttributes() ?>>
<span id="el_billing_discount_Particulars">
<span<?= $Page->Particulars->viewAttributes() ?>>
<?= $Page->Particulars->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <tr id="r_Procedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_discount_Procedure"><?= $Page->Procedure->caption() ?></span></td>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_billing_discount_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pharmacy->Visible) { // Pharmacy ?>
    <tr id="r_Pharmacy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_discount_Pharmacy"><?= $Page->Pharmacy->caption() ?></span></td>
        <td data-name="Pharmacy" <?= $Page->Pharmacy->cellAttributes() ?>>
<span id="el_billing_discount_Pharmacy">
<span<?= $Page->Pharmacy->viewAttributes() ?>>
<?= $Page->Pharmacy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Investication->Visible) { // Investication ?>
    <tr id="r_Investication">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_billing_discount_Investication"><?= $Page->Investication->caption() ?></span></td>
        <td data-name="Investication" <?= $Page->Investication->cellAttributes() ?>>
<span id="el_billing_discount_Investication">
<span<?= $Page->Investication->viewAttributes() ?>>
<?= $Page->Investication->getViewValue() ?></span>
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
