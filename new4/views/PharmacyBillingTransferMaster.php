<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy_billing_transfer = Container("pharmacy_billing_transfer");
?>
<?php if ($pharmacy_billing_transfer->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_billing_transfermaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($pharmacy_billing_transfer->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->id->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->id->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_id">
<span<?= $pharmacy_billing_transfer->id->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->PharID->Visible) { // PharID ?>
        <tr id="r_PharID">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->PharID->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->PharID->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_PharID">
<span<?= $pharmacy_billing_transfer->PharID->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->PharID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->pharmacy->Visible) { // pharmacy ?>
        <tr id="r_pharmacy">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->pharmacy->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->pharmacy->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_pharmacy">
<span<?= $pharmacy_billing_transfer->pharmacy->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->pharmacy->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->createdby->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->createdby->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_createdby">
<span<?= $pharmacy_billing_transfer->createdby->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->createddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_createddatetime">
<span<?= $pharmacy_billing_transfer->createddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->modifiedby->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_modifiedby">
<span<?= $pharmacy_billing_transfer->modifiedby->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->modifieddatetime->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_modifieddatetime">
<span<?= $pharmacy_billing_transfer->modifieddatetime->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->HospID->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->HospID->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_HospID">
<span<?= $pharmacy_billing_transfer->HospID->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->transfer->Visible) { // transfer ?>
        <tr id="r_transfer">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->transfer->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->transfer->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_transfer">
<span<?= $pharmacy_billing_transfer->transfer->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->transfer->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->area->Visible) { // area ?>
        <tr id="r_area">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->area->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->area->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_area">
<span<?= $pharmacy_billing_transfer->area->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->area->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->town->Visible) { // town ?>
        <tr id="r_town">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->town->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->town->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_town">
<span<?= $pharmacy_billing_transfer->town->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->town->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->province->Visible) { // province ?>
        <tr id="r_province">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->province->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->province->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_province">
<span<?= $pharmacy_billing_transfer->province->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->province->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->postal_code->Visible) { // postal_code ?>
        <tr id="r_postal_code">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->postal_code->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->postal_code->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_postal_code">
<span<?= $pharmacy_billing_transfer->postal_code->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->postal_code->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_billing_transfer->phone_no->Visible) { // phone_no ?>
        <tr id="r_phone_no">
            <td class="<?= $pharmacy_billing_transfer->TableLeftColumnClass ?>"><?= $pharmacy_billing_transfer->phone_no->caption() ?></td>
            <td <?= $pharmacy_billing_transfer->phone_no->cellAttributes() ?>>
<span id="el_pharmacy_billing_transfer_phone_no">
<span<?= $pharmacy_billing_transfer->phone_no->viewAttributes() ?>>
<?= $pharmacy_billing_transfer->phone_no->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
