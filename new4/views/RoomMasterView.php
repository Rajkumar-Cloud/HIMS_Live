<?php

namespace PHPMaker2021\HIMS;

// Page object
$RoomMasterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var froom_masterview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    froom_masterview = currentForm = new ew.Form("froom_masterview", "view");
    loadjs.done("froom_masterview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.room_master) ew.vars.tables.room_master = <?= JsonEncode(GetClientVar("tables", "room_master")) ?>;
</script>
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
<form name="froom_masterview" id="froom_masterview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="room_master">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_room_master_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
    <tr id="r_RoomNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_RoomNo"><?= $Page->RoomNo->caption() ?></span></td>
        <td data-name="RoomNo" <?= $Page->RoomNo->cellAttributes() ?>>
<span id="el_room_master_RoomNo">
<span<?= $Page->RoomNo->viewAttributes() ?>>
<?= $Page->RoomNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
    <tr id="r_RoomType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_RoomType"><?= $Page->RoomType->caption() ?></span></td>
        <td data-name="RoomType" <?= $Page->RoomType->cellAttributes() ?>>
<span id="el_room_master_RoomType">
<span<?= $Page->RoomType->viewAttributes() ?>>
<?= $Page->RoomType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
    <tr id="r_SharingRoom">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_SharingRoom"><?= $Page->SharingRoom->caption() ?></span></td>
        <td data-name="SharingRoom" <?= $Page->SharingRoom->cellAttributes() ?>>
<span id="el_room_master_SharingRoom">
<span<?= $Page->SharingRoom->viewAttributes() ?>>
<?= $Page->SharingRoom->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_room_master_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_Status"><?= $Page->Status->caption() ?></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el_room_master_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_room_master_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_room_master_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
    <tr id="r_MobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_MobileNo"><?= $Page->MobileNo->caption() ?></span></td>
        <td data-name="MobileNo" <?= $Page->MobileNo->cellAttributes() ?>>
<span id="el_room_master_MobileNo">
<span<?= $Page->MobileNo->viewAttributes() ?>>
<?= $Page->MobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_room_master_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_room_master_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
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
