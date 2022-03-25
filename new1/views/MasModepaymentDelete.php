<?php

namespace PHPMaker2021\project3;

// Page object
$MasModepaymentDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_modepaymentdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmas_modepaymentdelete = currentForm = new ew.Form("fmas_modepaymentdelete", "delete");
    loadjs.done("fmas_modepaymentdelete");
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
<form name="fmas_modepaymentdelete" id="fmas_modepaymentdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_mas_modepayment_id" class="mas_modepayment_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mode->Visible) { // Mode ?>
        <th class="<?= $Page->Mode->headerCellClass() ?>"><span id="elh_mas_modepayment_Mode" class="mas_modepayment_Mode"><?= $Page->Mode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankingDatails->Visible) { // BankingDatails ?>
        <th class="<?= $Page->BankingDatails->headerCellClass() ?>"><span id="elh_mas_modepayment_BankingDatails" class="mas_modepayment_BankingDatails"><?= $Page->BankingDatails->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_mas_modepayment_id" class="mas_modepayment_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mode->Visible) { // Mode ?>
        <td <?= $Page->Mode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_modepayment_Mode" class="mas_modepayment_Mode">
<span<?= $Page->Mode->viewAttributes() ?>>
<?= $Page->Mode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankingDatails->Visible) { // BankingDatails ?>
        <td <?= $Page->BankingDatails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_modepayment_BankingDatails" class="mas_modepayment_BankingDatails">
<span<?= $Page->BankingDatails->viewAttributes() ?>>
<?= $Page->BankingDatails->getViewValue() ?></span>
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
