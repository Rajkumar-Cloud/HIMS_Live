<?php

namespace PHPMaker2021\project3;

// Page object
$RoomMasterDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var froom_masterdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    froom_masterdelete = currentForm = new ew.Form("froom_masterdelete", "delete");
    loadjs.done("froom_masterdelete");
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
<form name="froom_masterdelete" id="froom_masterdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="room_master">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_room_master_id" class="room_master_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
        <th class="<?= $Page->RoomNo->headerCellClass() ?>"><span id="elh_room_master_RoomNo" class="room_master_RoomNo"><?= $Page->RoomNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
        <th class="<?= $Page->RoomType->headerCellClass() ?>"><span id="elh_room_master_RoomType" class="room_master_RoomType"><?= $Page->RoomType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
        <th class="<?= $Page->SharingRoom->headerCellClass() ?>"><span id="elh_room_master_SharingRoom" class="room_master_SharingRoom"><?= $Page->SharingRoom->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_room_master_Amount" class="room_master_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><span id="elh_room_master_Status" class="room_master_Status"><?= $Page->Status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_room_master_PatientID" class="room_master_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_room_master_PatientName" class="room_master_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
        <th class="<?= $Page->MobileNo->headerCellClass() ?>"><span id="elh_room_master_MobileNo" class="room_master_MobileNo"><?= $Page->MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_room_master_PatID" class="room_master_PatID"><?= $Page->PatID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_room_master_id" class="room_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
        <td <?= $Page->RoomNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_RoomNo" class="room_master_RoomNo">
<span<?= $Page->RoomNo->viewAttributes() ?>>
<?= $Page->RoomNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
        <td <?= $Page->RoomType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_RoomType" class="room_master_RoomType">
<span<?= $Page->RoomType->viewAttributes() ?>>
<?= $Page->RoomType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
        <td <?= $Page->SharingRoom->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_SharingRoom" class="room_master_SharingRoom">
<span<?= $Page->SharingRoom->viewAttributes() ?>>
<?= $Page->SharingRoom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_Amount" class="room_master_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <td <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_Status" class="room_master_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_PatientID" class="room_master_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_PatientName" class="room_master_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
        <td <?= $Page->MobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_MobileNo" class="room_master_MobileNo">
<span<?= $Page->MobileNo->viewAttributes() ?>>
<?= $Page->MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_room_master_PatID" class="room_master_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
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
