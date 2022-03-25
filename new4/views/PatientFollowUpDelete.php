<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientFollowUpDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_follow_updelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_follow_updelete = currentForm = new ew.Form("fpatient_follow_updelete", "delete");
    loadjs.done("fpatient_follow_updelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.patient_follow_up) ew.vars.tables.patient_follow_up = <?= JsonEncode(GetClientVar("tables", "patient_follow_up")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_follow_updelete" id="fpatient_follow_updelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_follow_up_id" class="patient_follow_up_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><span id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <th class="<?= $Page->BP->headerCellClass() ?>"><span id="elh_patient_follow_up_BP" class="patient_follow_up_BP"><?= $Page->BP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <th class="<?= $Page->Pulse->headerCellClass() ?>"><span id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse"><?= $Page->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
        <th class="<?= $Page->Resp->headerCellClass() ?>"><span id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp"><?= $Page->Resp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
        <th class="<?= $Page->SPO2->headerCellClass() ?>"><span id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2"><?= $Page->SPO2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <th class="<?= $Page->NextReviewDate->headerCellClass() ?>"><span id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_patient_follow_up_Age" class="patient_follow_up_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId"><?= $Page->PatientId->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_follow_up_id" class="patient_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_PatID" class="patient_follow_up_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_PatientName" class="patient_follow_up_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_mrnno" class="patient_follow_up_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <td <?= $Page->BP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_BP" class="patient_follow_up_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <td <?= $Page->Pulse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_Pulse" class="patient_follow_up_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
        <td <?= $Page->Resp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_Resp" class="patient_follow_up_Resp">
<span<?= $Page->Resp->viewAttributes() ?>>
<?= $Page->Resp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
        <td <?= $Page->SPO2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_SPO2" class="patient_follow_up_SPO2">
<span<?= $Page->SPO2->viewAttributes() ?>>
<?= $Page->SPO2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <td <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_Age" class="patient_follow_up_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_Gender" class="patient_follow_up_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_HospID" class="patient_follow_up_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_Reception" class="patient_follow_up_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_follow_up_PatientId" class="patient_follow_up_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
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
