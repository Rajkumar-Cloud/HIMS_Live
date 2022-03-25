<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestItemsPurchasedView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_items_purchasedview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_pharmacy_purchase_request_items_purchasedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchasedview", "view");
    loadjs.done("fview_pharmacy_purchase_request_items_purchasedview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_pharmacy_purchase_request_items_purchased) ew.vars.tables.view_pharmacy_purchase_request_items_purchased = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_items_purchased")) ?>;
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
<form name="fview_pharmacy_purchase_request_items_purchasedview" id="fview_pharmacy_purchase_request_items_purchasedview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <tr id="r_PRC">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PRC"><?= $Page->PRC->caption() ?></span></td>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <tr id="r_PrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PrName"><?= $Page->PrName->caption() ?></span></td>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <tr id="r_Quantity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_Quantity"><?= $Page->Quantity->caption() ?></span></td>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
    <tr id="r_ApprovedStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><?= $Page->ApprovedStatus->caption() ?></span></td>
        <td data-name="ApprovedStatus" <?= $Page->ApprovedStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
    <tr id="r_PurchaseStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><?= $Page->PurchaseStatus->caption() ?></span></td>
        <td data-name="PurchaseStatus" <?= $Page->PurchaseStatus->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?= $Page->PurchaseStatus->viewAttributes() ?>>
<?= $Page->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <tr id="r_BRCODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_BRCODE"><?= $Page->BRCODE->caption() ?></span></td>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->prid->Visible) { // prid ?>
    <tr id="r_prid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_prid"><?= $Page->prid->caption() ?></span></td>
        <td data-name="prid" <?= $Page->prid->cellAttributes() ?>>
<span id="el_view_pharmacy_purchase_request_items_purchased_prid">
<span<?= $Page->prid->viewAttributes() ?>>
<?= $Page->prid->getViewValue() ?></span>
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
