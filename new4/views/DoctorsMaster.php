<?php

namespace PHPMaker2021\HIMS;

// Table
$doctors = Container("doctors");
?>
<?php if ($doctors->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_doctorsmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($doctors->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->id->caption() ?></td>
            <td <?= $doctors->id->cellAttributes() ?>>
<span id="el_doctors_id">
<span<?= $doctors->id->viewAttributes() ?>>
<?= $doctors->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->CODE->Visible) { // CODE ?>
        <tr id="r_CODE">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->CODE->caption() ?></td>
            <td <?= $doctors->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<span<?= $doctors->CODE->viewAttributes() ?>>
<?= $doctors->CODE->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->NAME->Visible) { // NAME ?>
        <tr id="r_NAME">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->NAME->caption() ?></td>
            <td <?= $doctors->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<span<?= $doctors->NAME->viewAttributes() ?>>
<?= $doctors->NAME->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <tr id="r_DEPARTMENT">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->DEPARTMENT->caption() ?></td>
            <td <?= $doctors->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<span<?= $doctors->DEPARTMENT->viewAttributes() ?>>
<?= $doctors->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->start_time->Visible) { // start_time ?>
        <tr id="r_start_time">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->start_time->caption() ?></td>
            <td <?= $doctors->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<span<?= $doctors->start_time->viewAttributes() ?>>
<?= $doctors->start_time->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->end_time->Visible) { // end_time ?>
        <tr id="r_end_time">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->end_time->caption() ?></td>
            <td <?= $doctors->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<span<?= $doctors->end_time->viewAttributes() ?>>
<?= $doctors->end_time->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
        <tr id="r_start_time1">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->start_time1->caption() ?></td>
            <td <?= $doctors->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<span<?= $doctors->start_time1->viewAttributes() ?>>
<?= $doctors->start_time1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
        <tr id="r_end_time1">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->end_time1->caption() ?></td>
            <td <?= $doctors->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<span<?= $doctors->end_time1->viewAttributes() ?>>
<?= $doctors->end_time1->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
        <tr id="r_start_time2">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->start_time2->caption() ?></td>
            <td <?= $doctors->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<span<?= $doctors->start_time2->viewAttributes() ?>>
<?= $doctors->start_time2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
        <tr id="r_end_time2">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->end_time2->caption() ?></td>
            <td <?= $doctors->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<span<?= $doctors->end_time2->viewAttributes() ?>>
<?= $doctors->end_time2->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->slot_time->Visible) { // slot_time ?>
        <tr id="r_slot_time">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->slot_time->caption() ?></td>
            <td <?= $doctors->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<span<?= $doctors->slot_time->viewAttributes() ?>>
<?= $doctors->slot_time->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->Fees->Visible) { // Fees ?>
        <tr id="r_Fees">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->Fees->caption() ?></td>
            <td <?= $doctors->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<span<?= $doctors->Fees->viewAttributes() ?>>
<?= $doctors->Fees->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->slot_days->Visible) { // slot_days ?>
        <tr id="r_slot_days">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->slot_days->caption() ?></td>
            <td <?= $doctors->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<span<?= $doctors->slot_days->viewAttributes() ?>>
<?= $doctors->slot_days->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->Status->Visible) { // Status ?>
        <tr id="r_Status">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->Status->caption() ?></td>
            <td <?= $doctors->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
<span<?= $doctors->Status->viewAttributes() ?>>
<?= $doctors->Status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
        <tr id="r_scheduler_id">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->scheduler_id->caption() ?></td>
            <td <?= $doctors->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<span<?= $doctors->scheduler_id->viewAttributes() ?>>
<?= $doctors->scheduler_id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->HospID->caption() ?></td>
            <td <?= $doctors->HospID->cellAttributes() ?>>
<span id="el_doctors_HospID">
<span<?= $doctors->HospID->viewAttributes() ?>>
<?= $doctors->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($doctors->Designation->Visible) { // Designation ?>
        <tr id="r_Designation">
            <td class="<?= $doctors->TableLeftColumnClass ?>"><?= $doctors->Designation->caption() ?></td>
            <td <?= $doctors->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<span<?= $doctors->Designation->viewAttributes() ?>>
<?= $doctors->Designation->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
