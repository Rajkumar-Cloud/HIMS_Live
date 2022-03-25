<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientRoomDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_roomdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_roomdelete = currentForm = new ew.Form("fpatient_roomdelete", "delete");
    loadjs.done("fpatient_roomdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.patient_room) ew.vars.tables.patient_room = <?= JsonEncode(GetClientVar("tables", "patient_room")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_roomdelete" id="fpatient_roomdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_room">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_room_id" class="patient_room_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_patient_room_Reception" class="patient_room_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_patient_room_PatientId" class="patient_room_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_patient_room_mrnno" class="patient_room_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_patient_room_PatientName" class="patient_room_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_patient_room_Gender" class="patient_room_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RoomID->Visible) { // RoomID ?>
        <th class="<?= $Page->RoomID->headerCellClass() ?>"><span id="elh_patient_room_RoomID" class="patient_room_RoomID"><?= $Page->RoomID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
        <th class="<?= $Page->RoomNo->headerCellClass() ?>"><span id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><?= $Page->RoomNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
        <th class="<?= $Page->RoomType->headerCellClass() ?>"><span id="elh_patient_room_RoomType" class="patient_room_RoomType"><?= $Page->RoomType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
        <th class="<?= $Page->SharingRoom->headerCellClass() ?>"><span id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><?= $Page->SharingRoom->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_patient_room_Amount" class="patient_room_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Startdatetime->Visible) { // Startdatetime ?>
        <th class="<?= $Page->Startdatetime->headerCellClass() ?>"><span id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><?= $Page->Startdatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Enddatetime->Visible) { // Enddatetime ?>
        <th class="<?= $Page->Enddatetime->headerCellClass() ?>"><span id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><?= $Page->Enddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DaysHours->Visible) { // DaysHours ?>
        <th class="<?= $Page->DaysHours->headerCellClass() ?>"><span id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><?= $Page->DaysHours->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
        <th class="<?= $Page->Days->headerCellClass() ?>"><span id="elh_patient_room_Days" class="patient_room_Days"><?= $Page->Days->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Hours->Visible) { // Hours ?>
        <th class="<?= $Page->Hours->headerCellClass() ?>"><span id="elh_patient_room_Hours" class="patient_room_Hours"><?= $Page->Hours->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <th class="<?= $Page->TotalAmount->headerCellClass() ?>"><span id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><?= $Page->TotalAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_patient_room_PatID" class="patient_room_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><span id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_patient_room_HospID" class="patient_room_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_patient_room_status" class="patient_room_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_patient_room_createdby" class="patient_room_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_room_id" class="patient_room_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_Reception" class="patient_room_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_PatientId" class="patient_room_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_mrnno" class="patient_room_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_PatientName" class="patient_room_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_Gender" class="patient_room_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RoomID->Visible) { // RoomID ?>
        <td <?= $Page->RoomID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_RoomID" class="patient_room_RoomID">
<span<?= $Page->RoomID->viewAttributes() ?>>
<?= $Page->RoomID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
        <td <?= $Page->RoomNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_RoomNo" class="patient_room_RoomNo">
<span<?= $Page->RoomNo->viewAttributes() ?>>
<?= $Page->RoomNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
        <td <?= $Page->RoomType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_RoomType" class="patient_room_RoomType">
<span<?= $Page->RoomType->viewAttributes() ?>>
<?= $Page->RoomType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
        <td <?= $Page->SharingRoom->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_SharingRoom" class="patient_room_SharingRoom">
<span<?= $Page->SharingRoom->viewAttributes() ?>>
<?= $Page->SharingRoom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_Amount" class="patient_room_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Startdatetime->Visible) { // Startdatetime ?>
        <td <?= $Page->Startdatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_Startdatetime" class="patient_room_Startdatetime">
<span<?= $Page->Startdatetime->viewAttributes() ?>>
<?= $Page->Startdatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Enddatetime->Visible) { // Enddatetime ?>
        <td <?= $Page->Enddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_Enddatetime" class="patient_room_Enddatetime">
<span<?= $Page->Enddatetime->viewAttributes() ?>>
<?= $Page->Enddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DaysHours->Visible) { // DaysHours ?>
        <td <?= $Page->DaysHours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_DaysHours" class="patient_room_DaysHours">
<span<?= $Page->DaysHours->viewAttributes() ?>>
<?= $Page->DaysHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
        <td <?= $Page->Days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_Days" class="patient_room_Days">
<span<?= $Page->Days->viewAttributes() ?>>
<?= $Page->Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Hours->Visible) { // Hours ?>
        <td <?= $Page->Hours->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_Hours" class="patient_room_Hours">
<span<?= $Page->Hours->viewAttributes() ?>>
<?= $Page->Hours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
        <td <?= $Page->TotalAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_TotalAmount" class="patient_room_TotalAmount">
<span<?= $Page->TotalAmount->viewAttributes() ?>>
<?= $Page->TotalAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_PatID" class="patient_room_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_MobileNumber" class="patient_room_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_HospID" class="patient_room_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_status" class="patient_room_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_createdby" class="patient_room_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_createddatetime" class="patient_room_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_modifiedby" class="patient_room_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
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
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
