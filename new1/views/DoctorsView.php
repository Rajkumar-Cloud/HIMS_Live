<?php

namespace PHPMaker2021\project3;

// Page object
$DoctorsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fdoctorsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fdoctorsview = currentForm = new ew.Form("fdoctorsview", "view");
    loadjs.done("fdoctorsview");
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
<form name="fdoctorsview" id="fdoctorsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="doctors">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_doctors_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <tr id="r_CODE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_CODE"><?= $Page->CODE->caption() ?></span></td>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
    <tr id="r_NAME">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_NAME"><?= $Page->NAME->caption() ?></span></td>
        <td data-name="NAME" <?= $Page->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<span<?= $Page->NAME->viewAttributes() ?>>
<?= $Page->NAME->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <tr id="r_DEPARTMENT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_DEPARTMENT"><?= $Page->DEPARTMENT->caption() ?></span></td>
        <td data-name="DEPARTMENT" <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
    <tr id="r_start_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_start_time"><?= $Page->start_time->caption() ?></span></td>
        <td data-name="start_time" <?= $Page->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
    <tr id="r_end_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_end_time"><?= $Page->end_time->caption() ?></span></td>
        <td data-name="end_time" <?= $Page->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<span<?= $Page->end_time->viewAttributes() ?>>
<?= $Page->end_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->slot_time->Visible) { // slot_time ?>
    <tr id="r_slot_time">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_slot_time"><?= $Page->slot_time->caption() ?></span></td>
        <td data-name="slot_time" <?= $Page->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<span<?= $Page->slot_time->viewAttributes() ?>>
<?= $Page->slot_time->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->slot_days->Visible) { // slot_days ?>
    <tr id="r_slot_days">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_slot_days"><?= $Page->slot_days->caption() ?></span></td>
        <td data-name="slot_days" <?= $Page->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<span<?= $Page->slot_days->viewAttributes() ?>>
<?= $Page->slot_days->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
    <tr id="r_scheduler_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_scheduler_id"><?= $Page->scheduler_id->caption() ?></span></td>
        <td data-name="scheduler_id" <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProfilePic->Visible) { // ProfilePic ?>
    <tr id="r_ProfilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_ProfilePic"><?= $Page->ProfilePic->caption() ?></span></td>
        <td data-name="ProfilePic" <?= $Page->ProfilePic->cellAttributes() ?>>
<span id="el_doctors_ProfilePic">
<span<?= $Page->ProfilePic->viewAttributes() ?>>
<?= $Page->ProfilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fees->Visible) { // Fees ?>
    <tr id="r_Fees">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_Fees"><?= $Page->Fees->caption() ?></span></td>
        <td data-name="Fees" <?= $Page->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<span<?= $Page->Fees->viewAttributes() ?>>
<?= $Page->Fees->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_Status"><?= $Page->Status->caption() ?></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_doctors_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_time1->Visible) { // start_time1 ?>
    <tr id="r_start_time1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_start_time1"><?= $Page->start_time1->caption() ?></span></td>
        <td data-name="start_time1" <?= $Page->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<span<?= $Page->start_time1->viewAttributes() ?>>
<?= $Page->start_time1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_time1->Visible) { // end_time1 ?>
    <tr id="r_end_time1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_end_time1"><?= $Page->end_time1->caption() ?></span></td>
        <td data-name="end_time1" <?= $Page->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<span<?= $Page->end_time1->viewAttributes() ?>>
<?= $Page->end_time1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->start_time2->Visible) { // start_time2 ?>
    <tr id="r_start_time2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_start_time2"><?= $Page->start_time2->caption() ?></span></td>
        <td data-name="start_time2" <?= $Page->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<span<?= $Page->start_time2->viewAttributes() ?>>
<?= $Page->start_time2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->end_time2->Visible) { // end_time2 ?>
    <tr id="r_end_time2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_end_time2"><?= $Page->end_time2->caption() ?></span></td>
        <td data-name="end_time2" <?= $Page->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<span<?= $Page->end_time2->viewAttributes() ?>>
<?= $Page->end_time2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Designation->Visible) { // Designation ?>
    <tr id="r_Designation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_doctors_Designation"><?= $Page->Designation->caption() ?></span></td>
        <td data-name="Designation" <?= $Page->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<span<?= $Page->Designation->viewAttributes() ?>>
<?= $Page->Designation->getViewValue() ?></span>
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
