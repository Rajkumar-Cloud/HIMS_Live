<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOpdFollowUpDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_opd_follow_updelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_opd_follow_updelete = currentForm = new ew.Form("fpatient_opd_follow_updelete", "delete");
    loadjs.done("fpatient_opd_follow_updelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.patient_opd_follow_up) ew.vars.tables.patient_opd_follow_up = <?= JsonEncode(GetClientVar("tables", "patient_opd_follow_up")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_opd_follow_updelete" id="fpatient_opd_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_id" class="patient_opd_follow_up_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <th class="<?= $Page->NextReviewDate->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
        <th class="<?= $Page->ICSIAdvised->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
        <th class="<?= $Page->DeliveryRegistered->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
        <th class="<?= $Page->EDD->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD"><?= $Page->EDD->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
        <th class="<?= $Page->SerologyPositive->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
        <th class="<?= $Page->Allergy->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_status" class="patient_opd_follow_up_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th class="<?= $Page->LMP->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP"><?= $Page->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
        <th class="<?= $Page->ProcedureDateTime->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
        <th class="<?= $Page->ICSIDate->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <th class="<?= $Page->createdUserName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName"><?= $Page->createdUserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
        <th class="<?= $Page->reportheader->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader"><?= $Page->reportheader->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><span id="elh_patient_opd_follow_up_DrName" class="patient_opd_follow_up_DrName"><?= $Page->DrName->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_id" class="patient_opd_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_PatID" class="patient_opd_follow_up_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_PatientName" class="patient_opd_follow_up_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_MobileNumber" class="patient_opd_follow_up_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_Gender" class="patient_opd_follow_up_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <td <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_NextReviewDate" class="patient_opd_follow_up_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
        <td <?= $Page->ICSIAdvised->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_ICSIAdvised" class="patient_opd_follow_up_ICSIAdvised">
<span<?= $Page->ICSIAdvised->viewAttributes() ?>>
<?= $Page->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
        <td <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_DeliveryRegistered" class="patient_opd_follow_up_DeliveryRegistered">
<span<?= $Page->DeliveryRegistered->viewAttributes() ?>>
<?= $Page->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
        <td <?= $Page->EDD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_EDD" class="patient_opd_follow_up_EDD">
<span<?= $Page->EDD->viewAttributes() ?>>
<?= $Page->EDD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
        <td <?= $Page->SerologyPositive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_SerologyPositive" class="patient_opd_follow_up_SerologyPositive">
<span<?= $Page->SerologyPositive->viewAttributes() ?>>
<?= $Page->SerologyPositive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
        <td <?= $Page->Allergy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_Allergy" class="patient_opd_follow_up_Allergy">
<span<?= $Page->Allergy->viewAttributes() ?>>
<?= $Page->Allergy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_status" class="patient_opd_follow_up_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_createdby" class="patient_opd_follow_up_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_createddatetime" class="patient_opd_follow_up_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_modifiedby" class="patient_opd_follow_up_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_modifieddatetime" class="patient_opd_follow_up_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <td <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_LMP" class="patient_opd_follow_up_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
        <td <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_ProcedureDateTime" class="patient_opd_follow_up_ProcedureDateTime">
<span<?= $Page->ProcedureDateTime->viewAttributes() ?>>
<?= $Page->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
        <td <?= $Page->ICSIDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_ICSIDate" class="patient_opd_follow_up_ICSIDate">
<span<?= $Page->ICSIDate->viewAttributes() ?>>
<?= $Page->ICSIDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_HospID" class="patient_opd_follow_up_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <td <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_createdUserName" class="patient_opd_follow_up_createdUserName">
<span<?= $Page->createdUserName->viewAttributes() ?>>
<?= $Page->createdUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
        <td <?= $Page->reportheader->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_reportheader" class="patient_opd_follow_up_reportheader">
<span<?= $Page->reportheader->viewAttributes() ?>>
<?= $Page->reportheader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <td <?= $Page->DrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_opd_follow_up_DrName" class="patient_opd_follow_up_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
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
