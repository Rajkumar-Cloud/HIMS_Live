<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestPurchasedDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_purchaseddelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_pharmacy_purchase_request_purchaseddelete = currentForm = new ew.Form("fview_pharmacy_purchase_request_purchaseddelete", "delete");
    loadjs.done("fview_pharmacy_purchase_request_purchaseddelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_pharmacy_purchase_request_purchased) ew.vars.tables.view_pharmacy_purchase_request_purchased = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_purchased")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_pharmacy_purchase_request_purchaseddelete" id="fview_pharmacy_purchase_request_purchaseddelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchased_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchased_DT"><?= $Page->DT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmployeeName->Visible) { // EmployeeName ?>
        <th class="<?= $Page->EmployeeName->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchased_EmployeeName"><?= $Page->EmployeeName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th class="<?= $Page->Department->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchased_Department"><?= $Page->Department->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <th class="<?= $Page->ApprovedStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchased_ApprovedStatus"><?= $Page->ApprovedStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <th class="<?= $Page->PurchaseStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchased_PurchaseStatus"><?= $Page->PurchaseStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchased_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchased_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchased_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchased_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchased_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchased_BRCODE"><?= $Page->BRCODE->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchased_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <td <?= $Page->DT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchased_DT">
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmployeeName->Visible) { // EmployeeName ?>
        <td <?= $Page->EmployeeName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchased_EmployeeName">
<span<?= $Page->EmployeeName->viewAttributes() ?>>
<?= $Page->EmployeeName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <td <?= $Page->Department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchased_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <td <?= $Page->ApprovedStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchased_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <td <?= $Page->PurchaseStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchased_PurchaseStatus">
<span<?= $Page->PurchaseStatus->viewAttributes() ?>>
<?= $Page->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchased_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchased_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchased_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchased_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchased_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchased_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
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
