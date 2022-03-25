<?php

namespace PHPMaker2021\HIMS;

// Table
$mas_pharmacy = Container("mas_pharmacy");
?>
<?php if ($mas_pharmacy->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_mas_pharmacymaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($mas_pharmacy->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $mas_pharmacy->TableLeftColumnClass ?>"><?= $mas_pharmacy->id->caption() ?></td>
            <td <?= $mas_pharmacy->id->cellAttributes() ?>>
<span id="el_mas_pharmacy_id">
<span<?= $mas_pharmacy->id->viewAttributes() ?>>
<?= $mas_pharmacy->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($mas_pharmacy->name->Visible) { // name ?>
        <tr id="r_name">
            <td class="<?= $mas_pharmacy->TableLeftColumnClass ?>"><?= $mas_pharmacy->name->caption() ?></td>
            <td <?= $mas_pharmacy->name->cellAttributes() ?>>
<span id="el_mas_pharmacy_name">
<span<?= $mas_pharmacy->name->viewAttributes() ?>>
<?= $mas_pharmacy->name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($mas_pharmacy->amount->Visible) { // amount ?>
        <tr id="r_amount">
            <td class="<?= $mas_pharmacy->TableLeftColumnClass ?>"><?= $mas_pharmacy->amount->caption() ?></td>
            <td <?= $mas_pharmacy->amount->cellAttributes() ?>>
<span id="el_mas_pharmacy_amount">
<span<?= $mas_pharmacy->amount->viewAttributes() ?>>
<?= $mas_pharmacy->amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($mas_pharmacy->charged_date->Visible) { // charged_date ?>
        <tr id="r_charged_date">
            <td class="<?= $mas_pharmacy->TableLeftColumnClass ?>"><?= $mas_pharmacy->charged_date->caption() ?></td>
            <td <?= $mas_pharmacy->charged_date->cellAttributes() ?>>
<span id="el_mas_pharmacy_charged_date">
<span<?= $mas_pharmacy->charged_date->viewAttributes() ?>>
<?= $mas_pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($mas_pharmacy->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $mas_pharmacy->TableLeftColumnClass ?>"><?= $mas_pharmacy->status->caption() ?></td>
            <td <?= $mas_pharmacy->status->cellAttributes() ?>>
<span id="el_mas_pharmacy_status">
<span<?= $mas_pharmacy->status->viewAttributes() ?>>
<?= $mas_pharmacy->status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
