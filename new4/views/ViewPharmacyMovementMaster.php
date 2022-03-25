<?php

namespace PHPMaker2021\HIMS;

// Table
$view_pharmacy_movement = Container("view_pharmacy_movement");
?>
<?php if ($view_pharmacy_movement->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_pharmacy_movementmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($view_pharmacy_movement->prc->Visible) { // prc ?>
        <tr id="r_prc">
            <td class="<?= $view_pharmacy_movement->TableLeftColumnClass ?>"><?= $view_pharmacy_movement->prc->caption() ?></td>
            <td <?= $view_pharmacy_movement->prc->cellAttributes() ?>>
<span id="el_view_pharmacy_movement_prc">
<span<?= $view_pharmacy_movement->prc->viewAttributes() ?>>
<?= $view_pharmacy_movement->prc->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_movement->PrName->Visible) { // PrName ?>
        <tr id="r_PrName">
            <td class="<?= $view_pharmacy_movement->TableLeftColumnClass ?>"><?= $view_pharmacy_movement->PrName->caption() ?></td>
            <td <?= $view_pharmacy_movement->PrName->cellAttributes() ?>>
<span id="el_view_pharmacy_movement_PrName">
<span<?= $view_pharmacy_movement->PrName->viewAttributes() ?>>
<?= $view_pharmacy_movement->PrName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_movement->BatchNo->Visible) { // BatchNo ?>
        <tr id="r_BatchNo">
            <td class="<?= $view_pharmacy_movement->TableLeftColumnClass ?>"><?= $view_pharmacy_movement->BatchNo->caption() ?></td>
            <td <?= $view_pharmacy_movement->BatchNo->cellAttributes() ?>>
<span id="el_view_pharmacy_movement_BatchNo">
<span<?= $view_pharmacy_movement->BatchNo->viewAttributes() ?>>
<?= $view_pharmacy_movement->BatchNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_movement->ExpDate->Visible) { // ExpDate ?>
        <tr id="r_ExpDate">
            <td class="<?= $view_pharmacy_movement->TableLeftColumnClass ?>"><?= $view_pharmacy_movement->ExpDate->caption() ?></td>
            <td <?= $view_pharmacy_movement->ExpDate->cellAttributes() ?>>
<span id="el_view_pharmacy_movement_ExpDate">
<span<?= $view_pharmacy_movement->ExpDate->viewAttributes() ?>>
<?= $view_pharmacy_movement->ExpDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_movement->MFRCODE->Visible) { // MFRCODE ?>
        <tr id="r_MFRCODE">
            <td class="<?= $view_pharmacy_movement->TableLeftColumnClass ?>"><?= $view_pharmacy_movement->MFRCODE->caption() ?></td>
            <td <?= $view_pharmacy_movement->MFRCODE->cellAttributes() ?>>
<span id="el_view_pharmacy_movement_MFRCODE">
<span<?= $view_pharmacy_movement->MFRCODE->viewAttributes() ?>>
<?= $view_pharmacy_movement->MFRCODE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_movement->hsn->Visible) { // hsn ?>
        <tr id="r_hsn">
            <td class="<?= $view_pharmacy_movement->TableLeftColumnClass ?>"><?= $view_pharmacy_movement->hsn->caption() ?></td>
            <td <?= $view_pharmacy_movement->hsn->cellAttributes() ?>>
<span id="el_view_pharmacy_movement_hsn">
<span<?= $view_pharmacy_movement->hsn->viewAttributes() ?>>
<?= $view_pharmacy_movement->hsn->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($view_pharmacy_movement->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_pharmacy_movement->TableLeftColumnClass ?>"><?= $view_pharmacy_movement->HospID->caption() ?></td>
            <td <?= $view_pharmacy_movement->HospID->cellAttributes() ?>>
<span id="el_view_pharmacy_movement_HospID">
<span<?= $view_pharmacy_movement->HospID->viewAttributes() ?>>
<?= $view_pharmacy_movement->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
