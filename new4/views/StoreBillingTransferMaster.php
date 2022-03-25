<?php

namespace PHPMaker2021\HIMS;

// Table
$store_billing_transfer = Container("store_billing_transfer");
?>
<?php if ($store_billing_transfer->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_store_billing_transfermaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($store_billing_transfer->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->id->caption() ?></td>
            <td <?= $store_billing_transfer->id->cellAttributes() ?>>
<span id="el_store_billing_transfer_id">
<span<?= $store_billing_transfer->id->viewAttributes() ?>>
<?= $store_billing_transfer->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->transfer->Visible) { // transfer ?>
        <tr id="r_transfer">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->transfer->caption() ?></td>
            <td <?= $store_billing_transfer->transfer->cellAttributes() ?>>
<span id="el_store_billing_transfer_transfer">
<span<?= $store_billing_transfer->transfer->viewAttributes() ?>>
<?= $store_billing_transfer->transfer->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->pharmacy->Visible) { // pharmacy ?>
        <tr id="r_pharmacy">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->pharmacy->caption() ?></td>
            <td <?= $store_billing_transfer->pharmacy->cellAttributes() ?>>
<span id="el_store_billing_transfer_pharmacy">
<span<?= $store_billing_transfer->pharmacy->viewAttributes() ?>>
<?= $store_billing_transfer->pharmacy->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->area->Visible) { // area ?>
        <tr id="r_area">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->area->caption() ?></td>
            <td <?= $store_billing_transfer->area->cellAttributes() ?>>
<span id="el_store_billing_transfer_area">
<span<?= $store_billing_transfer->area->viewAttributes() ?>>
<?= $store_billing_transfer->area->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->town->Visible) { // town ?>
        <tr id="r_town">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->town->caption() ?></td>
            <td <?= $store_billing_transfer->town->cellAttributes() ?>>
<span id="el_store_billing_transfer_town">
<span<?= $store_billing_transfer->town->viewAttributes() ?>>
<?= $store_billing_transfer->town->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->province->Visible) { // province ?>
        <tr id="r_province">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->province->caption() ?></td>
            <td <?= $store_billing_transfer->province->cellAttributes() ?>>
<span id="el_store_billing_transfer_province">
<span<?= $store_billing_transfer->province->viewAttributes() ?>>
<?= $store_billing_transfer->province->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->postal_code->Visible) { // postal_code ?>
        <tr id="r_postal_code">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->postal_code->caption() ?></td>
            <td <?= $store_billing_transfer->postal_code->cellAttributes() ?>>
<span id="el_store_billing_transfer_postal_code">
<span<?= $store_billing_transfer->postal_code->viewAttributes() ?>>
<?= $store_billing_transfer->postal_code->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->phone_no->Visible) { // phone_no ?>
        <tr id="r_phone_no">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->phone_no->caption() ?></td>
            <td <?= $store_billing_transfer->phone_no->cellAttributes() ?>>
<span id="el_store_billing_transfer_phone_no">
<span<?= $store_billing_transfer->phone_no->viewAttributes() ?>>
<?= $store_billing_transfer->phone_no->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->createdby->caption() ?></td>
            <td <?= $store_billing_transfer->createdby->cellAttributes() ?>>
<span id="el_store_billing_transfer_createdby">
<span<?= $store_billing_transfer->createdby->viewAttributes() ?>>
<?= $store_billing_transfer->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->createddatetime->caption() ?></td>
            <td <?= $store_billing_transfer->createddatetime->cellAttributes() ?>>
<span id="el_store_billing_transfer_createddatetime">
<span<?= $store_billing_transfer->createddatetime->viewAttributes() ?>>
<?= $store_billing_transfer->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->modifiedby->caption() ?></td>
            <td <?= $store_billing_transfer->modifiedby->cellAttributes() ?>>
<span id="el_store_billing_transfer_modifiedby">
<span<?= $store_billing_transfer->modifiedby->viewAttributes() ?>>
<?= $store_billing_transfer->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->modifieddatetime->caption() ?></td>
            <td <?= $store_billing_transfer->modifieddatetime->cellAttributes() ?>>
<span id="el_store_billing_transfer_modifieddatetime">
<span<?= $store_billing_transfer->modifieddatetime->viewAttributes() ?>>
<?= $store_billing_transfer->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->HospID->caption() ?></td>
            <td <?= $store_billing_transfer->HospID->cellAttributes() ?>>
<span id="el_store_billing_transfer_HospID">
<span<?= $store_billing_transfer->HospID->viewAttributes() ?>>
<?= $store_billing_transfer->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->StoreID->Visible) { // StoreID ?>
        <tr id="r_StoreID">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->StoreID->caption() ?></td>
            <td <?= $store_billing_transfer->StoreID->cellAttributes() ?>>
<span id="el_store_billing_transfer_StoreID">
<span<?= $store_billing_transfer->StoreID->viewAttributes() ?>>
<?= $store_billing_transfer->StoreID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_billing_transfer->BranchID->Visible) { // BranchID ?>
        <tr id="r_BranchID">
            <td class="<?= $store_billing_transfer->TableLeftColumnClass ?>"><?= $store_billing_transfer->BranchID->caption() ?></td>
            <td <?= $store_billing_transfer->BranchID->cellAttributes() ?>>
<span id="el_store_billing_transfer_BranchID">
<span<?= $store_billing_transfer->BranchID->viewAttributes() ?>>
<?= $store_billing_transfer->BranchID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
