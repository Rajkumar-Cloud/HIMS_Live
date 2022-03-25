<?php

namespace PHPMaker2021\project3;

// Page object
$AppointmentBlockSlotView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fappointment_block_slotview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fappointment_block_slotview = currentForm = new ew.Form("fappointment_block_slotview", "view");
    loadjs.done("fappointment_block_slotview");
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
<form name="fappointment_block_slotview" id="fappointment_block_slotview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_appointment_block_slot_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
    <tr id="r_Drid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_Drid"><?= $Page->Drid->caption() ?></span></td>
        <td data-name="Drid" <?= $Page->Drid->cellAttributes() ?>>
<span id="el_appointment_block_slot_Drid">
<span<?= $Page->Drid->viewAttributes() ?>>
<?= $Page->Drid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <tr id="r_DrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_DrName"><?= $Page->DrName->caption() ?></span></td>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<span id="el_appointment_block_slot_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_Details"><?= $Page->Details->caption() ?></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el_appointment_block_slot_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BlockType->Visible) { // BlockType ?>
    <tr id="r_BlockType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_BlockType"><?= $Page->BlockType->caption() ?></span></td>
        <td data-name="BlockType" <?= $Page->BlockType->cellAttributes() ?>>
<span id="el_appointment_block_slot_BlockType">
<span<?= $Page->BlockType->viewAttributes() ?>>
<?= $Page->BlockType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FromDate->Visible) { // FromDate ?>
    <tr id="r_FromDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_FromDate"><?= $Page->FromDate->caption() ?></span></td>
        <td data-name="FromDate" <?= $Page->FromDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromDate">
<span<?= $Page->FromDate->viewAttributes() ?>>
<?= $Page->FromDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ToDate->Visible) { // ToDate ?>
    <tr id="r_ToDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_ToDate"><?= $Page->ToDate->caption() ?></span></td>
        <td data-name="ToDate" <?= $Page->ToDate->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToDate">
<span<?= $Page->ToDate->viewAttributes() ?>>
<?= $Page->ToDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FromTime->Visible) { // FromTime ?>
    <tr id="r_FromTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_FromTime"><?= $Page->FromTime->caption() ?></span></td>
        <td data-name="FromTime" <?= $Page->FromTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_FromTime">
<span<?= $Page->FromTime->viewAttributes() ?>>
<?= $Page->FromTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ToTime->Visible) { // ToTime ?>
    <tr id="r_ToTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_appointment_block_slot_ToTime"><?= $Page->ToTime->caption() ?></span></td>
        <td data-name="ToTime" <?= $Page->ToTime->cellAttributes() ?>>
<span id="el_appointment_block_slot_ToTime">
<span<?= $Page->ToTime->viewAttributes() ?>>
<?= $Page->ToTime->getViewValue() ?></span>
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
