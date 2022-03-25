<?php

namespace PHPMaker2021\project3;

// Page object
$AppointmentBlockSlotDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fappointment_block_slotdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fappointment_block_slotdelete = currentForm = new ew.Form("fappointment_block_slotdelete", "delete");
    loadjs.done("fappointment_block_slotdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fappointment_block_slotdelete" id="fappointment_block_slotdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="appointment_block_slot">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_appointment_block_slot_id" class="appointment_block_slot_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
        <th class="<?= $Page->Drid->headerCellClass() ?>"><span id="elh_appointment_block_slot_Drid" class="appointment_block_slot_Drid"><?= $Page->Drid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><span id="elh_appointment_block_slot_DrName" class="appointment_block_slot_DrName"><?= $Page->DrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><span id="elh_appointment_block_slot_Details" class="appointment_block_slot_Details"><?= $Page->Details->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BlockType->Visible) { // BlockType ?>
        <th class="<?= $Page->BlockType->headerCellClass() ?>"><span id="elh_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType"><?= $Page->BlockType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FromDate->Visible) { // FromDate ?>
        <th class="<?= $Page->FromDate->headerCellClass() ?>"><span id="elh_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate"><?= $Page->FromDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ToDate->Visible) { // ToDate ?>
        <th class="<?= $Page->ToDate->headerCellClass() ?>"><span id="elh_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate"><?= $Page->ToDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FromTime->Visible) { // FromTime ?>
        <th class="<?= $Page->FromTime->headerCellClass() ?>"><span id="elh_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime"><?= $Page->FromTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ToTime->Visible) { // ToTime ?>
        <th class="<?= $Page->ToTime->headerCellClass() ?>"><span id="elh_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime"><?= $Page->ToTime->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_id" class="appointment_block_slot_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Drid->Visible) { // Drid ?>
        <td <?= $Page->Drid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_Drid" class="appointment_block_slot_Drid">
<span<?= $Page->Drid->viewAttributes() ?>>
<?= $Page->Drid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <td <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_DrName" class="appointment_block_slot_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <td <?= $Page->Details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_Details" class="appointment_block_slot_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BlockType->Visible) { // BlockType ?>
        <td <?= $Page->BlockType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_BlockType" class="appointment_block_slot_BlockType">
<span<?= $Page->BlockType->viewAttributes() ?>>
<?= $Page->BlockType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FromDate->Visible) { // FromDate ?>
        <td <?= $Page->FromDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_FromDate" class="appointment_block_slot_FromDate">
<span<?= $Page->FromDate->viewAttributes() ?>>
<?= $Page->FromDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ToDate->Visible) { // ToDate ?>
        <td <?= $Page->ToDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_ToDate" class="appointment_block_slot_ToDate">
<span<?= $Page->ToDate->viewAttributes() ?>>
<?= $Page->ToDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FromTime->Visible) { // FromTime ?>
        <td <?= $Page->FromTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_FromTime" class="appointment_block_slot_FromTime">
<span<?= $Page->FromTime->viewAttributes() ?>>
<?= $Page->FromTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ToTime->Visible) { // ToTime ?>
        <td <?= $Page->ToTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_appointment_block_slot_ToTime" class="appointment_block_slot_ToTime">
<span<?= $Page->ToTime->viewAttributes() ?>>
<?= $Page->ToTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
