<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyBillingTransferView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_transferview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpharmacy_billing_transferview = currentForm = new ew.Form("fpharmacy_billing_transferview", "view");
    loadjs.done("fpharmacy_billing_transferview");
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
<form name="fpharmacy_billing_transferview" id="fpharmacy_billing_transferview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->transfer->Visible) { // transfer ?>
    <tr id="r_transfer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_transfer"><?= $Page->transfer->caption() ?></span></td>
        <td data-name="transfer" <?= $Page->transfer->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_transfer">
<span<?= $Page->transfer->viewAttributes() ?>>
<?= $Page->transfer->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
    <tr id="r_pharmacy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_pharmacy"><?= $Page->pharmacy->caption() ?></span></td>
        <td data-name="pharmacy" <?= $Page->pharmacy->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_pharmacy">
<span<?= $Page->pharmacy->viewAttributes() ?>>
<?= $Page->pharmacy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <tr id="r_street">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_street"><?= $Page->street->caption() ?></span></td>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
    <tr id="r_area">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_area"><?= $Page->area->caption() ?></span></td>
        <td data-name="area" <?= $Page->area->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_area">
<span<?= $Page->area->viewAttributes() ?>>
<?= $Page->area->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <tr id="r_town">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_town"><?= $Page->town->caption() ?></span></td>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <tr id="r_province">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_province"><?= $Page->province->caption() ?></span></td>
        <td data-name="province" <?= $Page->province->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_province">
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <tr id="r_postal_code">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_postal_code"><?= $Page->postal_code->caption() ?></span></td>
        <td data-name="postal_code" <?= $Page->postal_code->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_postal_code">
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
    <tr id="r_phone_no">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_phone_no"><?= $Page->phone_no->caption() ?></span></td>
        <td data-name="phone_no" <?= $Page->phone_no->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_phone_no">
<span<?= $Page->phone_no->viewAttributes() ?>>
<?= $Page->phone_no->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_Details"><?= $Page->Details->caption() ?></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <tr id="r_CId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_CId"><?= $Page->CId->caption() ?></span></td>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <tr id="r_PatId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_PatId"><?= $Page->PatId->caption() ?></span></td>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <tr id="r_DrID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_DrID"><?= $Page->DrID->caption() ?></span></td>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <tr id="r_BillStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_BillStatus"><?= $Page->BillStatus->caption() ?></span></td>
        <td data-name="BillStatus" <?= $Page->BillStatus->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
    <tr id="r_PharID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_transfer_PharID"><?= $Page->PharID->caption() ?></span></td>
        <td data-name="PharID" <?= $Page->PharID->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
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
