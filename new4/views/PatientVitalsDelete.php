<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientVitalsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_vitalsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_vitalsdelete = currentForm = new ew.Form("fpatient_vitalsdelete", "delete");
    loadjs.done("fpatient_vitalsdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.patient_vitals) ew.vars.tables.patient_vitals = <?= JsonEncode(GetClientVar("tables", "patient_vitals")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpatient_vitalsdelete" id="fpatient_vitalsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_vitals_id" class="patient_vitals_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><span id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
        <th class="<?= $Page->HT->headerCellClass() ?>"><span id="elh_patient_vitals_HT" class="patient_vitals_HT"><?= $Page->HT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
        <th class="<?= $Page->WT->headerCellClass() ?>"><span id="elh_patient_vitals_WT" class="patient_vitals_WT"><?= $Page->WT->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
        <th class="<?= $Page->SurfaceArea->headerCellClass() ?>"><span id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><?= $Page->SurfaceArea->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <th class="<?= $Page->BodyMassIndex->headerCellClass() ?>"><span id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><?= $Page->BodyMassIndex->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <th class="<?= $Page->AnticoagulantifAny->headerCellClass() ?>"><span id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><?= $Page->AnticoagulantifAny->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
        <th class="<?= $Page->FoodAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><?= $Page->FoodAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
        <th class="<?= $Page->GenericAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><?= $Page->GenericAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
        <th class="<?= $Page->GroupAllergies->headerCellClass() ?>"><span id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><?= $Page->GroupAllergies->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
        <th class="<?= $Page->Temp->headerCellClass() ?>"><span id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><?= $Page->Temp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <th class="<?= $Page->Pulse->headerCellClass() ?>"><span id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><?= $Page->Pulse->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <th class="<?= $Page->BP->headerCellClass() ?>"><span id="elh_patient_vitals_BP" class="patient_vitals_BP"><?= $Page->BP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <th class="<?= $Page->PR->headerCellClass() ?>"><span id="elh_patient_vitals_PR" class="patient_vitals_PR"><?= $Page->PR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
        <th class="<?= $Page->CNS->headerCellClass() ?>"><span id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><?= $Page->CNS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
        <th class="<?= $Page->RSA->headerCellClass() ?>"><span id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><?= $Page->RSA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <th class="<?= $Page->CVS->headerCellClass() ?>"><span id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><?= $Page->CVS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <th class="<?= $Page->PA->headerCellClass() ?>"><span id="elh_patient_vitals_PA" class="patient_vitals_PA"><?= $Page->PA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
        <th class="<?= $Page->PS->headerCellClass() ?>"><span id="elh_patient_vitals_PS" class="patient_vitals_PS"><?= $Page->PS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
        <th class="<?= $Page->PV->headerCellClass() ?>"><span id="elh_patient_vitals_PV" class="patient_vitals_PV"><?= $Page->PV->caption() ?></span></th>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
        <th class="<?= $Page->clinicaldetails->headerCellClass() ?>"><span id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><?= $Page->clinicaldetails->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_patient_vitals_status" class="patient_vitals_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_patient_vitals_Age" class="patient_vitals_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_vitals_id" class="patient_vitals_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_mrnno" class="patient_vitals_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PatientName" class="patient_vitals_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PatID" class="patient_vitals_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
        <td <?= $Page->HT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_HT" class="patient_vitals_HT">
<span<?= $Page->HT->viewAttributes() ?>>
<?= $Page->HT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
        <td <?= $Page->WT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_WT" class="patient_vitals_WT">
<span<?= $Page->WT->viewAttributes() ?>>
<?= $Page->WT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
        <td <?= $Page->SurfaceArea->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
<span<?= $Page->SurfaceArea->viewAttributes() ?>>
<?= $Page->SurfaceArea->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <td <?= $Page->BodyMassIndex->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
<span<?= $Page->BodyMassIndex->viewAttributes() ?>>
<?= $Page->BodyMassIndex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <td <?= $Page->AnticoagulantifAny->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
<span<?= $Page->AnticoagulantifAny->viewAttributes() ?>>
<?= $Page->AnticoagulantifAny->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
        <td <?= $Page->FoodAllergies->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
<span<?= $Page->FoodAllergies->viewAttributes() ?>>
<?= $Page->FoodAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
        <td <?= $Page->GenericAllergies->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
<span<?= $Page->GenericAllergies->viewAttributes() ?>>
<?= $Page->GenericAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
        <td <?= $Page->GroupAllergies->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
<span<?= $Page->GroupAllergies->viewAttributes() ?>>
<?= $Page->GroupAllergies->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
        <td <?= $Page->Temp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Temp" class="patient_vitals_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <td <?= $Page->Pulse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Pulse" class="patient_vitals_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <td <?= $Page->BP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_BP" class="patient_vitals_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <td <?= $Page->PR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PR" class="patient_vitals_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
        <td <?= $Page->CNS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_CNS" class="patient_vitals_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
        <td <?= $Page->RSA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_RSA" class="patient_vitals_RSA">
<span<?= $Page->RSA->viewAttributes() ?>>
<?= $Page->RSA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <td <?= $Page->CVS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_CVS" class="patient_vitals_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <td <?= $Page->PA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PA" class="patient_vitals_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
        <td <?= $Page->PS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PS" class="patient_vitals_PS">
<span<?= $Page->PS->viewAttributes() ?>>
<?= $Page->PS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
        <td <?= $Page->PV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PV" class="patient_vitals_PV">
<span<?= $Page->PV->viewAttributes() ?>>
<?= $Page->PV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
        <td <?= $Page->clinicaldetails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
<span<?= $Page->clinicaldetails->viewAttributes() ?>>
<?= $Page->clinicaldetails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_status" class="patient_vitals_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_createdby" class="patient_vitals_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Age" class="patient_vitals_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Gender" class="patient_vitals_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_PatientId" class="patient_vitals_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_Reception" class="patient_vitals_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_vitals_HospID" class="patient_vitals_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
