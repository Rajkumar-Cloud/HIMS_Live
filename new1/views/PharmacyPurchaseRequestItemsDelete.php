<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyPurchaseRequestItemsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchase_request_itemsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpharmacy_purchase_request_itemsdelete = currentForm = new ew.Form("fpharmacy_purchase_request_itemsdelete", "delete");
    loadjs.done("fpharmacy_purchase_request_itemsdelete");
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
<form name="fpharmacy_purchase_request_itemsdelete" id="fpharmacy_purchase_request_itemsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><?= $Page->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th class="<?= $Page->Quantity->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><?= $Page->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <th class="<?= $Page->ApprovedStatus->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_ApprovedStatus" class="pharmacy_purchase_request_items_ApprovedStatus"><?= $Page->ApprovedStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <th class="<?= $Page->PurchaseStatus->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_PurchaseStatus" class="pharmacy_purchase_request_items_PurchaseStatus"><?= $Page->PurchaseStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->prid->Visible) { // prid ?>
        <th class="<?= $Page->prid->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><?= $Page->prid->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <td <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <td <?= $Page->ApprovedStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_ApprovedStatus" class="pharmacy_purchase_request_items_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <td <?= $Page->PurchaseStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_PurchaseStatus" class="pharmacy_purchase_request_items_PurchaseStatus">
<span<?= $Page->PurchaseStatus->viewAttributes() ?>>
<?= $Page->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->prid->Visible) { // prid ?>
        <td <?= $Page->prid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid">
<span<?= $Page->prid->viewAttributes() ?>>
<?= $Page->prid->getViewValue() ?></span>
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
