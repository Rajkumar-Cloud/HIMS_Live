<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy = Container("pharmacy");
?>
<?php if ($pharmacy->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacymaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($pharmacy->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy->TableLeftColumnClass ?>"><?= $pharmacy->id->caption() ?></td>
            <td <?= $pharmacy->id->cellAttributes() ?>>
<span id="el_pharmacy_id">
<span<?= $pharmacy->id->viewAttributes() ?>>
<?= $pharmacy->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy->op_id->Visible) { // op_id ?>
        <tr id="r_op_id">
            <td class="<?= $pharmacy->TableLeftColumnClass ?>"><?= $pharmacy->op_id->caption() ?></td>
            <td <?= $pharmacy->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<span<?= $pharmacy->op_id->viewAttributes() ?>>
<?= $pharmacy->op_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy->ip_id->Visible) { // ip_id ?>
        <tr id="r_ip_id">
            <td class="<?= $pharmacy->TableLeftColumnClass ?>"><?= $pharmacy->ip_id->caption() ?></td>
            <td <?= $pharmacy->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
<span<?= $pharmacy->ip_id->viewAttributes() ?>>
<?= $pharmacy->ip_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy->patient_id->Visible) { // patient_id ?>
        <tr id="r_patient_id">
            <td class="<?= $pharmacy->TableLeftColumnClass ?>"><?= $pharmacy->patient_id->caption() ?></td>
            <td <?= $pharmacy->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<span<?= $pharmacy->patient_id->viewAttributes() ?>>
<?= $pharmacy->patient_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy->charged_date->Visible) { // charged_date ?>
        <tr id="r_charged_date">
            <td class="<?= $pharmacy->TableLeftColumnClass ?>"><?= $pharmacy->charged_date->caption() ?></td>
            <td <?= $pharmacy->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<span<?= $pharmacy->charged_date->viewAttributes() ?>>
<?= $pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $pharmacy->TableLeftColumnClass ?>"><?= $pharmacy->status->caption() ?></td>
            <td <?= $pharmacy->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
<span<?= $pharmacy->status->viewAttributes() ?>>
<?= $pharmacy->status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
