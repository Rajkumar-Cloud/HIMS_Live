<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPurchaseorderDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchaseorderdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_purchaseorderdelete = currentForm = new ew.Form("fpharmacy_purchaseorderdelete", "delete");
    loadjs.done("fpharmacy_purchaseorderdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.pharmacy_purchaseorder) ew.vars.tables.pharmacy_purchaseorder = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchaseorder")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_purchaseorderdelete" id="fpharmacy_purchaseorderdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <th class="<?= $Page->QTY->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><?= $Page->QTY->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <th class="<?= $Page->Stock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><?= $Page->Stock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <th class="<?= $Page->LastMonthSale->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><?= $Page->LastMonthSale->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th class="<?= $Page->BillDate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><?= $Page->BillDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <th class="<?= $Page->CurStock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><?= $Page->CurStock->caption() ?></span></th>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
        <th class="<?= $Page->grndate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate"><?= $Page->grndate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <th class="<?= $Page->grndatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime"><?= $Page->grndatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
        <th class="<?= $Page->strid->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid"><?= $Page->strid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
        <th class="<?= $Page->GRNPer->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer"><?= $Page->GRNPer->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <th class="<?= $Page->FreeQtyyy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy"><?= $Page->FreeQtyyy->caption() ?></span></th>
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <td <?= $Page->QTY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <td <?= $Page->Stock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <td <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <td <?= $Page->CurStock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
        <td <?= $Page->grndate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate">
<span<?= $Page->grndate->viewAttributes() ?>>
<?= $Page->grndate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <td <?= $Page->grndatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime">
<span<?= $Page->grndatetime->viewAttributes() ?>>
<?= $Page->grndatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
        <td <?= $Page->strid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid">
<span<?= $Page->strid->viewAttributes() ?>>
<?= $Page->strid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
        <td <?= $Page->GRNPer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer">
<span<?= $Page->GRNPer->viewAttributes() ?>>
<?= $Page->GRNPer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td <?= $Page->FreeQtyyy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy">
<span<?= $Page->FreeQtyyy->viewAttributes() ?>>
<?= $Page->FreeQtyyy->getViewValue() ?></span>
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
