<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientInvestigationsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_investigationsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_investigationsdelete = currentForm = new ew.Form("fpatient_investigationsdelete", "delete");
    loadjs.done("fpatient_investigationsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.patient_investigations) ew.vars.tables.patient_investigations = <?= JsonEncode(GetClientVar("tables", "patient_investigations")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_investigationsdelete" id="fpatient_investigationsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_investigations_id" class="patient_investigations_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Investigation->Visible) { // Investigation ?>
        <th class="<?= $Page->Investigation->headerCellClass() ?>"><span id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><?= $Page->Investigation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Value->Visible) { // Value ?>
        <th class="<?= $Page->Value->headerCellClass() ?>"><span id="elh_patient_investigations_Value" class="patient_investigations_Value"><?= $Page->Value->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NormalRange->Visible) { // NormalRange ?>
        <th class="<?= $Page->NormalRange->headerCellClass() ?>"><span id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><?= $Page->NormalRange->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_patient_investigations_Age" class="patient_investigations_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
        <th class="<?= $Page->SampleCollected->headerCellClass() ?>"><span id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><?= $Page->SampleCollected->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <th class="<?= $Page->SampleCollectedBy->headerCellClass() ?>"><span id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><?= $Page->SampleCollectedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
        <th class="<?= $Page->ResultedDate->headerCellClass() ?>"><span id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><?= $Page->ResultedDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><span id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><?= $Page->ResultedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
        <th class="<?= $Page->Modified->headerCellClass() ?>"><span id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><?= $Page->Modified->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><span id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <th class="<?= $Page->Created->headerCellClass() ?>"><span id="elh_patient_investigations_Created" class="patient_investigations_Created"><?= $Page->Created->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><span id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GroupHead->Visible) { // GroupHead ?>
        <th class="<?= $Page->GroupHead->headerCellClass() ?>"><span id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><?= $Page->GroupHead->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cost->Visible) { // Cost ?>
        <th class="<?= $Page->Cost->headerCellClass() ?>"><span id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><?= $Page->Cost->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><span id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PayMode->Visible) { // PayMode ?>
        <th class="<?= $Page->PayMode->headerCellClass() ?>"><span id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><?= $Page->PayMode->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
        <th class="<?= $Page->VoucherNo->headerCellClass() ?>"><span id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><?= $Page->VoucherNo->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_investigations_id" class="patient_investigations_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Investigation->Visible) { // Investigation ?>
        <td <?= $Page->Investigation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_Investigation" class="patient_investigations_Investigation">
<span<?= $Page->Investigation->viewAttributes() ?>>
<?= $Page->Investigation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Value->Visible) { // Value ?>
        <td <?= $Page->Value->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_Value" class="patient_investigations_Value">
<span<?= $Page->Value->viewAttributes() ?>>
<?= $Page->Value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NormalRange->Visible) { // NormalRange ?>
        <td <?= $Page->NormalRange->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_NormalRange" class="patient_investigations_NormalRange">
<span<?= $Page->NormalRange->viewAttributes() ?>>
<?= $Page->NormalRange->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_mrnno" class="patient_investigations_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_Age" class="patient_investigations_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_Gender" class="patient_investigations_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
        <td <?= $Page->SampleCollected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected">
<span<?= $Page->SampleCollected->viewAttributes() ?>>
<?= $Page->SampleCollected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <td <?= $Page->SampleCollectedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy">
<span<?= $Page->SampleCollectedBy->viewAttributes() ?>>
<?= $Page->SampleCollectedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
        <td <?= $Page->ResultedDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate">
<span<?= $Page->ResultedDate->viewAttributes() ?>>
<?= $Page->ResultedDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
        <td <?= $Page->Modified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_Modified" class="patient_investigations_Modified">
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <td <?= $Page->Created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_Created" class="patient_investigations_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GroupHead->Visible) { // GroupHead ?>
        <td <?= $Page->GroupHead->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_GroupHead" class="patient_investigations_GroupHead">
<span<?= $Page->GroupHead->viewAttributes() ?>>
<?= $Page->GroupHead->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cost->Visible) { // Cost ?>
        <td <?= $Page->Cost->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_Cost" class="patient_investigations_Cost">
<span<?= $Page->Cost->viewAttributes() ?>>
<?= $Page->Cost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PayMode->Visible) { // PayMode ?>
        <td <?= $Page->PayMode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_PayMode" class="patient_investigations_PayMode">
<span<?= $Page->PayMode->viewAttributes() ?>>
<?= $Page->PayMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
        <td <?= $Page->VoucherNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo">
<span<?= $Page->VoucherNo->viewAttributes() ?>>
<?= $Page->VoucherNo->getViewValue() ?></span>
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
