<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestItemsApprovedDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_items_approveddelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_pharmacy_purchase_request_items_approveddelete = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_approveddelete", "delete");
    loadjs.done("fview_pharmacy_purchase_request_items_approveddelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_pharmacy_purchase_request_items_approved) ew.vars.tables.view_pharmacy_purchase_request_items_approved = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_items_approved")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_pharmacy_purchase_request_items_approveddelete" id="fview_pharmacy_purchase_request_items_approveddelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC"><?= $Page->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName"><?= $Page->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th class="<?= $Page->Quantity->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity"><?= $Page->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <th class="<?= $Page->ApprovedStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus"><?= $Page->ApprovedStatus->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <td <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <td <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <td <?= $Page->ApprovedStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
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
