<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewOpdFollowUpDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_opd_follow_updelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fview_opd_follow_updelete = currentForm = new ew.Form("fview_opd_follow_updelete", "delete");
    loadjs.done("fview_opd_follow_updelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.view_opd_follow_up) ew.vars.tables.view_opd_follow_up = <?= JsonEncode(GetClientVar("tables", "view_opd_follow_up")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fview_opd_follow_updelete" id="fview_opd_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_view_opd_follow_up_id" class="view_opd_follow_up_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
        <th class="<?= $Page->Telephone->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone"><?= $Page->Telephone->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Age" class="view_opd_follow_up_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <th class="<?= $Page->NextReviewDate->headerCellClass() ?>"><span id="elh_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
        <th class="<?= $Page->ICSIAdvised->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
        <th class="<?= $Page->DeliveryRegistered->headerCellClass() ?>"><span id="elh_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
        <th class="<?= $Page->EDD->headerCellClass() ?>"><span id="elh_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD"><?= $Page->EDD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
        <th class="<?= $Page->SerologyPositive->headerCellClass() ?>"><span id="elh_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
        <th class="<?= $Page->Allergy->headerCellClass() ?>"><span id="elh_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_view_opd_follow_up_status" class="view_opd_follow_up_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th class="<?= $Page->LMP->headerCellClass() ?>"><span id="elh_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP"><?= $Page->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
        <th class="<?= $Page->ProcedureDateTime->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
        <th class="<?= $Page->ICSIDate->headerCellClass() ?>"><span id="elh_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_id" class="view_opd_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_Reception" class="view_opd_follow_up_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_PatientId" class="view_opd_follow_up_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_mrnno" class="view_opd_follow_up_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_PatientName" class="view_opd_follow_up_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
        <td <?= $Page->Telephone->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_Telephone" class="view_opd_follow_up_Telephone">
<span<?= $Page->Telephone->viewAttributes() ?>>
<?= $Page->Telephone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_Age" class="view_opd_follow_up_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_Gender" class="view_opd_follow_up_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <td <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_NextReviewDate" class="view_opd_follow_up_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
        <td <?= $Page->ICSIAdvised->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_ICSIAdvised" class="view_opd_follow_up_ICSIAdvised">
<span<?= $Page->ICSIAdvised->viewAttributes() ?>>
<?= $Page->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
        <td <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_DeliveryRegistered" class="view_opd_follow_up_DeliveryRegistered">
<span<?= $Page->DeliveryRegistered->viewAttributes() ?>>
<?= $Page->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
        <td <?= $Page->EDD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_EDD" class="view_opd_follow_up_EDD">
<span<?= $Page->EDD->viewAttributes() ?>>
<?= $Page->EDD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
        <td <?= $Page->SerologyPositive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_SerologyPositive" class="view_opd_follow_up_SerologyPositive">
<span<?= $Page->SerologyPositive->viewAttributes() ?>>
<?= $Page->SerologyPositive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
        <td <?= $Page->Allergy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_Allergy" class="view_opd_follow_up_Allergy">
<span<?= $Page->Allergy->viewAttributes() ?>>
<?= $Page->Allergy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_status" class="view_opd_follow_up_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_createdby" class="view_opd_follow_up_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_createddatetime" class="view_opd_follow_up_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_modifiedby" class="view_opd_follow_up_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_modifieddatetime" class="view_opd_follow_up_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <td <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_LMP" class="view_opd_follow_up_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
        <td <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_ProcedureDateTime" class="view_opd_follow_up_ProcedureDateTime">
<span<?= $Page->ProcedureDateTime->viewAttributes() ?>>
<?= $Page->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
        <td <?= $Page->ICSIDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_opd_follow_up_ICSIDate" class="view_opd_follow_up_ICSIDate">
<span<?= $Page->ICSIDate->viewAttributes() ?>>
<?= $Page->ICSIDate->getViewValue() ?></span>
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
