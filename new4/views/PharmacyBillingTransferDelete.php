<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBillingTransferDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_transferdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_billing_transferdelete = currentForm = new ew.Form("fpharmacy_billing_transferdelete", "delete");
    loadjs.done("fpharmacy_billing_transferdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_billing_transfer) ew.vars.tables.pharmacy_billing_transfer = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_transfer")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_billing_transferdelete" id="fpharmacy_billing_transferdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <th class="<?= $Page->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID"><?= $Page->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
        <th class="<?= $Page->pharmacy->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy"><?= $Page->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->transfer->Visible) { // transfer ?>
        <th class="<?= $Page->transfer->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer"><?= $Page->transfer->caption() ?></span></th>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <th class="<?= $Page->area->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area"><?= $Page->area->caption() ?></span></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th class="<?= $Page->town->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town"><?= $Page->town->caption() ?></span></th>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province"><?= $Page->province->caption() ?></span></th>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code"><?= $Page->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <th class="<?= $Page->phone_no->headerCellClass() ?>"><span id="elh_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no"><?= $Page->phone_no->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_id" class="pharmacy_billing_transfer_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <td <?= $Page->PharID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_PharID" class="pharmacy_billing_transfer_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
        <td <?= $Page->pharmacy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_pharmacy" class="pharmacy_billing_transfer_pharmacy">
<span<?= $Page->pharmacy->viewAttributes() ?>>
<?= $Page->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_createdby" class="pharmacy_billing_transfer_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_createddatetime" class="pharmacy_billing_transfer_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_modifiedby" class="pharmacy_billing_transfer_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_modifieddatetime" class="pharmacy_billing_transfer_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_HospID" class="pharmacy_billing_transfer_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->transfer->Visible) { // transfer ?>
        <td <?= $Page->transfer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_transfer" class="pharmacy_billing_transfer_transfer">
<span<?= $Page->transfer->viewAttributes() ?>>
<?= $Page->transfer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
        <td <?= $Page->area->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_area" class="pharmacy_billing_transfer_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <td <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_town" class="pharmacy_billing_transfer_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <td <?= $Page->province->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_province" class="pharmacy_billing_transfer_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <td <?= $Page->postal_code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_postal_code" class="pharmacy_billing_transfer_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
        <td <?= $Page->phone_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_billing_transfer_phone_no" class="pharmacy_billing_transfer_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
