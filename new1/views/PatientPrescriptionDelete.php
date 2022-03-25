<?php

namespace PHPMaker2021\project3;

// Page object
$PatientPrescriptionDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_prescriptiondelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_prescriptiondelete = currentForm = new ew.Form("fpatient_prescriptiondelete", "delete");
    loadjs.done("fpatient_prescriptiondelete");
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
<form name="fpatient_prescriptiondelete" id="fpatient_prescriptiondelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_prescription_id" class="patient_prescription_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_patient_prescription_Age" class="patient_prescription_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
        <th class="<?= $Page->Medicine->headerCellClass() ?>"><span id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><?= $Page->Medicine->caption() ?></span></th>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <th class="<?= $Page->M->headerCellClass() ?>"><span id="elh_patient_prescription_M" class="patient_prescription_M"><?= $Page->M->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <th class="<?= $Page->A->headerCellClass() ?>"><span id="elh_patient_prescription_A" class="patient_prescription_A"><?= $Page->A->caption() ?></span></th>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
        <th class="<?= $Page->N->headerCellClass() ?>"><span id="elh_patient_prescription_N" class="patient_prescription_N"><?= $Page->N->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <th class="<?= $Page->NoOfDays->headerCellClass() ?>"><span id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><?= $Page->NoOfDays->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <th class="<?= $Page->PreRoute->headerCellClass() ?>"><span id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><?= $Page->PreRoute->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <th class="<?= $Page->TimeOfTaking->headerCellClass() ?>"><span id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><?= $Page->TimeOfTaking->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th class="<?= $Page->Type->headerCellClass() ?>"><span id="elh_patient_prescription_Type" class="patient_prescription_Type"><?= $Page->Type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><span id="elh_patient_prescription_Status" class="patient_prescription_Status"><?= $Page->Status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><span id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <th class="<?= $Page->CreateDateTime->headerCellClass() ?>"><span id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><?= $Page->CreateDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><span id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><span id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_prescription_id" class="patient_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_Reception" class="patient_prescription_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_PatientId" class="patient_prescription_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_mrnno" class="patient_prescription_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_PatientName" class="patient_prescription_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_Age" class="patient_prescription_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_Gender" class="patient_prescription_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
        <td <?= $Page->Medicine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_Medicine" class="patient_prescription_Medicine">
<span<?= $Page->Medicine->viewAttributes() ?>>
<?= $Page->Medicine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <td <?= $Page->M->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_M" class="patient_prescription_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <td <?= $Page->A->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_A" class="patient_prescription_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
        <td <?= $Page->N->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_N" class="patient_prescription_N">
<span<?= $Page->N->viewAttributes() ?>>
<?= $Page->N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <td <?= $Page->NoOfDays->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays">
<span<?= $Page->NoOfDays->viewAttributes() ?>>
<?= $Page->NoOfDays->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <td <?= $Page->PreRoute->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_PreRoute" class="patient_prescription_PreRoute">
<span<?= $Page->PreRoute->viewAttributes() ?>>
<?= $Page->PreRoute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <td <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_Type" class="patient_prescription_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <td <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_Status" class="patient_prescription_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <td <?= $Page->CreateDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime">
<span<?= $Page->CreateDateTime->viewAttributes() ?>>
<?= $Page->CreateDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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
