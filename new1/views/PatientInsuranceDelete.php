<?php

namespace PHPMaker2021\project3;

// Page object
$PatientInsuranceDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_insurancedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_insurancedelete = currentForm = new ew.Form("fpatient_insurancedelete", "delete");
    loadjs.done("fpatient_insurancedelete");
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
<form name="fpatient_insurancedelete" id="fpatient_insurancedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_insurance_id" class="patient_insurance_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_patient_insurance_Reception" class="patient_insurance_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_patient_insurance_PatientId" class="patient_insurance_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_patient_insurance_PatientName" class="patient_insurance_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Company->Visible) { // Company ?>
        <th class="<?= $Page->Company->headerCellClass() ?>"><span id="elh_patient_insurance_Company" class="patient_insurance_Company"><?= $Page->Company->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <th class="<?= $Page->AddressInsuranceCarierName->headerCellClass() ?>"><span id="elh_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName"><?= $Page->AddressInsuranceCarierName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ContactName->Visible) { // ContactName ?>
        <th class="<?= $Page->ContactName->headerCellClass() ?>"><span id="elh_patient_insurance_ContactName" class="patient_insurance_ContactName"><?= $Page->ContactName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
        <th class="<?= $Page->ContactMobile->headerCellClass() ?>"><span id="elh_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile"><?= $Page->ContactMobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PolicyType->Visible) { // PolicyType ?>
        <th class="<?= $Page->PolicyType->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyType" class="patient_insurance_PolicyType"><?= $Page->PolicyType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PolicyName->Visible) { // PolicyName ?>
        <th class="<?= $Page->PolicyName->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyName" class="patient_insurance_PolicyName"><?= $Page->PolicyName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
        <th class="<?= $Page->PolicyNo->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo"><?= $Page->PolicyNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
        <th class="<?= $Page->PolicyAmount->headerCellClass() ?>"><span id="elh_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount"><?= $Page->PolicyAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
        <th class="<?= $Page->RefLetterNo->headerCellClass() ?>"><span id="elh_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo"><?= $Page->RefLetterNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
        <th class="<?= $Page->ReferenceBy->headerCellClass() ?>"><span id="elh_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy"><?= $Page->ReferenceBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
        <th class="<?= $Page->ReferenceDate->headerCellClass() ?>"><span id="elh_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate"><?= $Page->ReferenceDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_patient_insurance_createdby" class="patient_insurance_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_patient_insurance_createddatetime" class="patient_insurance_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_patient_insurance_modifiedby" class="patient_insurance_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_patient_insurance_mrnno" class="patient_insurance_mrnno"><?= $Page->mrnno->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_insurance_id" class="patient_insurance_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_Reception" class="patient_insurance_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PatientId" class="patient_insurance_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PatientName" class="patient_insurance_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Company->Visible) { // Company ?>
        <td <?= $Page->Company->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_Company" class="patient_insurance_Company">
<span<?= $Page->Company->viewAttributes() ?>>
<?= $Page->Company->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <td <?= $Page->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_AddressInsuranceCarierName" class="patient_insurance_AddressInsuranceCarierName">
<span<?= $Page->AddressInsuranceCarierName->viewAttributes() ?>>
<?= $Page->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ContactName->Visible) { // ContactName ?>
        <td <?= $Page->ContactName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ContactName" class="patient_insurance_ContactName">
<span<?= $Page->ContactName->viewAttributes() ?>>
<?= $Page->ContactName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
        <td <?= $Page->ContactMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ContactMobile" class="patient_insurance_ContactMobile">
<span<?= $Page->ContactMobile->viewAttributes() ?>>
<?= $Page->ContactMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PolicyType->Visible) { // PolicyType ?>
        <td <?= $Page->PolicyType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyType" class="patient_insurance_PolicyType">
<span<?= $Page->PolicyType->viewAttributes() ?>>
<?= $Page->PolicyType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PolicyName->Visible) { // PolicyName ?>
        <td <?= $Page->PolicyName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyName" class="patient_insurance_PolicyName">
<span<?= $Page->PolicyName->viewAttributes() ?>>
<?= $Page->PolicyName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
        <td <?= $Page->PolicyNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyNo" class="patient_insurance_PolicyNo">
<span<?= $Page->PolicyNo->viewAttributes() ?>>
<?= $Page->PolicyNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
        <td <?= $Page->PolicyAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_PolicyAmount" class="patient_insurance_PolicyAmount">
<span<?= $Page->PolicyAmount->viewAttributes() ?>>
<?= $Page->PolicyAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
        <td <?= $Page->RefLetterNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_RefLetterNo" class="patient_insurance_RefLetterNo">
<span<?= $Page->RefLetterNo->viewAttributes() ?>>
<?= $Page->RefLetterNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
        <td <?= $Page->ReferenceBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ReferenceBy" class="patient_insurance_ReferenceBy">
<span<?= $Page->ReferenceBy->viewAttributes() ?>>
<?= $Page->ReferenceBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
        <td <?= $Page->ReferenceDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_ReferenceDate" class="patient_insurance_ReferenceDate">
<span<?= $Page->ReferenceDate->viewAttributes() ?>>
<?= $Page->ReferenceDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_createdby" class="patient_insurance_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_createddatetime" class="patient_insurance_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_modifiedby" class="patient_insurance_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_modifieddatetime" class="patient_insurance_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_insurance_mrnno" class="patient_insurance_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
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
