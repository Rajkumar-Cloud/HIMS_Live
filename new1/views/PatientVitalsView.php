<?php

namespace PHPMaker2021\project3;

// Page object
$PatientVitalsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_vitalsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_vitalsview = currentForm = new ew.Form("fpatient_vitalsview", "view");
    loadjs.done("fpatient_vitalsview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
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
<form name="fpatient_vitalsview" id="fpatient_vitalsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_vitals">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_vitals_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_vitals_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_vitals_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_vitals_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_vitals_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_vitals_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_vitals_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_vitals_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
    <tr id="r_HT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HT"><?= $Page->HT->caption() ?></span></td>
        <td data-name="HT" <?= $Page->HT->cellAttributes() ?>>
<span id="el_patient_vitals_HT">
<span<?= $Page->HT->viewAttributes() ?>>
<?= $Page->HT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
    <tr id="r_WT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_WT"><?= $Page->WT->caption() ?></span></td>
        <td data-name="WT" <?= $Page->WT->cellAttributes() ?>>
<span id="el_patient_vitals_WT">
<span<?= $Page->WT->viewAttributes() ?>>
<?= $Page->WT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
    <tr id="r_SurfaceArea">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_SurfaceArea"><?= $Page->SurfaceArea->caption() ?></span></td>
        <td data-name="SurfaceArea" <?= $Page->SurfaceArea->cellAttributes() ?>>
<span id="el_patient_vitals_SurfaceArea">
<span<?= $Page->SurfaceArea->viewAttributes() ?>>
<?= $Page->SurfaceArea->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
    <tr id="r_BodyMassIndex">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BodyMassIndex"><?= $Page->BodyMassIndex->caption() ?></span></td>
        <td data-name="BodyMassIndex" <?= $Page->BodyMassIndex->cellAttributes() ?>>
<span id="el_patient_vitals_BodyMassIndex">
<span<?= $Page->BodyMassIndex->viewAttributes() ?>>
<?= $Page->BodyMassIndex->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClinicalFindings->Visible) { // ClinicalFindings ?>
    <tr id="r_ClinicalFindings">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalFindings"><?= $Page->ClinicalFindings->caption() ?></span></td>
        <td data-name="ClinicalFindings" <?= $Page->ClinicalFindings->cellAttributes() ?>>
<span id="el_patient_vitals_ClinicalFindings">
<span<?= $Page->ClinicalFindings->viewAttributes() ?>>
<?= $Page->ClinicalFindings->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClinicalDiagnosis->Visible) { // ClinicalDiagnosis ?>
    <tr id="r_ClinicalDiagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_ClinicalDiagnosis"><?= $Page->ClinicalDiagnosis->caption() ?></span></td>
        <td data-name="ClinicalDiagnosis" <?= $Page->ClinicalDiagnosis->cellAttributes() ?>>
<span id="el_patient_vitals_ClinicalDiagnosis">
<span<?= $Page->ClinicalDiagnosis->viewAttributes() ?>>
<?= $Page->ClinicalDiagnosis->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
    <tr id="r_AnticoagulantifAny">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_AnticoagulantifAny"><?= $Page->AnticoagulantifAny->caption() ?></span></td>
        <td data-name="AnticoagulantifAny" <?= $Page->AnticoagulantifAny->cellAttributes() ?>>
<span id="el_patient_vitals_AnticoagulantifAny">
<span<?= $Page->AnticoagulantifAny->viewAttributes() ?>>
<?= $Page->AnticoagulantifAny->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
    <tr id="r_FoodAllergies">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_FoodAllergies"><?= $Page->FoodAllergies->caption() ?></span></td>
        <td data-name="FoodAllergies" <?= $Page->FoodAllergies->cellAttributes() ?>>
<span id="el_patient_vitals_FoodAllergies">
<span<?= $Page->FoodAllergies->viewAttributes() ?>>
<?= $Page->FoodAllergies->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
    <tr id="r_GenericAllergies">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GenericAllergies"><?= $Page->GenericAllergies->caption() ?></span></td>
        <td data-name="GenericAllergies" <?= $Page->GenericAllergies->cellAttributes() ?>>
<span id="el_patient_vitals_GenericAllergies">
<span<?= $Page->GenericAllergies->viewAttributes() ?>>
<?= $Page->GenericAllergies->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
    <tr id="r_GroupAllergies">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_GroupAllergies"><?= $Page->GroupAllergies->caption() ?></span></td>
        <td data-name="GroupAllergies" <?= $Page->GroupAllergies->cellAttributes() ?>>
<span id="el_patient_vitals_GroupAllergies">
<span<?= $Page->GroupAllergies->viewAttributes() ?>>
<?= $Page->GroupAllergies->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <tr id="r_Temp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Temp"><?= $Page->Temp->caption() ?></span></td>
        <td data-name="Temp" <?= $Page->Temp->cellAttributes() ?>>
<span id="el_patient_vitals_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <tr id="r_Pulse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_Pulse"><?= $Page->Pulse->caption() ?></span></td>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<span id="el_patient_vitals_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <tr id="r_BP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_BP"><?= $Page->BP->caption() ?></span></td>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<span id="el_patient_vitals_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <tr id="r_PR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PR"><?= $Page->PR->caption() ?></span></td>
        <td data-name="PR" <?= $Page->PR->cellAttributes() ?>>
<span id="el_patient_vitals_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <tr id="r_CNS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CNS"><?= $Page->CNS->caption() ?></span></td>
        <td data-name="CNS" <?= $Page->CNS->cellAttributes() ?>>
<span id="el_patient_vitals_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
    <tr id="r_RSA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_RSA"><?= $Page->RSA->caption() ?></span></td>
        <td data-name="RSA" <?= $Page->RSA->cellAttributes() ?>>
<span id="el_patient_vitals_RSA">
<span<?= $Page->RSA->viewAttributes() ?>>
<?= $Page->RSA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <tr id="r_CVS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_CVS"><?= $Page->CVS->caption() ?></span></td>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<span id="el_patient_vitals_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <tr id="r_PA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PA"><?= $Page->PA->caption() ?></span></td>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<span id="el_patient_vitals_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
    <tr id="r_PS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PS"><?= $Page->PS->caption() ?></span></td>
        <td data-name="PS" <?= $Page->PS->cellAttributes() ?>>
<span id="el_patient_vitals_PS">
<span<?= $Page->PS->viewAttributes() ?>>
<?= $Page->PS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
    <tr id="r_PV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PV"><?= $Page->PV->caption() ?></span></td>
        <td data-name="PV" <?= $Page->PV->cellAttributes() ?>>
<span id="el_patient_vitals_PV">
<span<?= $Page->PV->viewAttributes() ?>>
<?= $Page->PV->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
    <tr id="r_clinicaldetails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_clinicaldetails"><?= $Page->clinicaldetails->caption() ?></span></td>
        <td data-name="clinicaldetails" <?= $Page->clinicaldetails->cellAttributes() ?>>
<span id="el_patient_vitals_clinicaldetails">
<span<?= $Page->clinicaldetails->viewAttributes() ?>>
<?= $Page->clinicaldetails->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_vitals_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_vitals_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_vitals_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_vitals_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_vitals_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_vitals_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_vitals_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_vitals_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_vitals_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
