<?php

namespace PHPMaker2021\project3;

// Page object
$BillingDiscountDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_discountdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fbilling_discountdelete = currentForm = new ew.Form("fbilling_discountdelete", "delete");
    loadjs.done("fbilling_discountdelete");
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
<form name="fbilling_discountdelete" id="fbilling_discountdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
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
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_billing_discount_id" class="billing_discount_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Particulars->Visible) { // Particulars ?>
        <th class="<?= $Page->Particulars->headerCellClass() ?>"><span id="elh_billing_discount_Particulars" class="billing_discount_Particulars"><?= $Page->Particulars->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th class="<?= $Page->Procedure->headerCellClass() ?>"><span id="elh_billing_discount_Procedure" class="billing_discount_Procedure"><?= $Page->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pharmacy->Visible) { // Pharmacy ?>
        <th class="<?= $Page->Pharmacy->headerCellClass() ?>"><span id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy"><?= $Page->Pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Investication->Visible) { // Investication ?>
        <th class="<?= $Page->Investication->headerCellClass() ?>"><span id="elh_billing_discount_Investication" class="billing_discount_Investication"><?= $Page->Investication->caption() ?></span></th>
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
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_discount_id" class="billing_discount_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Particulars->Visible) { // Particulars ?>
        <td <?= $Page->Particulars->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_discount_Particulars" class="billing_discount_Particulars">
<span<?= $Page->Particulars->viewAttributes() ?>>
<?= $Page->Particulars->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td <?= $Page->Procedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_discount_Procedure" class="billing_discount_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pharmacy->Visible) { // Pharmacy ?>
        <td <?= $Page->Pharmacy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_discount_Pharmacy" class="billing_discount_Pharmacy">
<span<?= $Page->Pharmacy->viewAttributes() ?>>
<?= $Page->Pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Investication->Visible) { // Investication ?>
        <td <?= $Page->Investication->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_discount_Investication" class="billing_discount_Investication">
<span<?= $Page->Investication->viewAttributes() ?>>
<?= $Page->Investication->getViewValue() ?></span>
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
