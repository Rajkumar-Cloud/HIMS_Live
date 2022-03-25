<?php

namespace PHPMaker2021\project3;

// Page object
$MasActivityCardDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_activity_carddelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmas_activity_carddelete = currentForm = new ew.Form("fmas_activity_carddelete", "delete");
    loadjs.done("fmas_activity_carddelete");
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
<form name="fmas_activity_carddelete" id="fmas_activity_carddelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_mas_activity_card_id" class="mas_activity_card_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Activity->Visible) { // Activity ?>
        <th class="<?= $Page->Activity->headerCellClass() ?>"><span id="elh_mas_activity_card_Activity" class="mas_activity_card_Activity"><?= $Page->Activity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th class="<?= $Page->Type->headerCellClass() ?>"><span id="elh_mas_activity_card_Type" class="mas_activity_card_Type"><?= $Page->Type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Selected->Visible) { // Selected ?>
        <th class="<?= $Page->Selected->headerCellClass() ?>"><span id="elh_mas_activity_card_Selected" class="mas_activity_card_Selected"><?= $Page->Selected->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Units->Visible) { // Units ?>
        <th class="<?= $Page->Units->headerCellClass() ?>"><span id="elh_mas_activity_card_Units" class="mas_activity_card_Units"><?= $Page->Units->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_mas_activity_card_Amount" class="mas_activity_card_Amount"><?= $Page->Amount->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_mas_activity_card_id" class="mas_activity_card_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Activity->Visible) { // Activity ?>
        <td <?= $Page->Activity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_activity_card_Activity" class="mas_activity_card_Activity">
<span<?= $Page->Activity->viewAttributes() ?>>
<?= $Page->Activity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <td <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_activity_card_Type" class="mas_activity_card_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Selected->Visible) { // Selected ?>
        <td <?= $Page->Selected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_activity_card_Selected" class="mas_activity_card_Selected">
<span<?= $Page->Selected->viewAttributes() ?>>
<?= $Page->Selected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Units->Visible) { // Units ?>
        <td <?= $Page->Units->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_activity_card_Units" class="mas_activity_card_Units">
<span<?= $Page->Units->viewAttributes() ?>>
<?= $Page->Units->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_activity_card_Amount" class="mas_activity_card_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
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
