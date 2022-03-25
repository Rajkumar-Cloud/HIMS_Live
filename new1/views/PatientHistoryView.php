<?php

namespace PHPMaker2021\project3;

// Page object
$PatientHistoryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_historyview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_historyview = currentForm = new ew.Form("fpatient_historyview", "view");
    loadjs.done("fpatient_historyview");
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
<form name="fpatient_historyview" id="fpatient_historyview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_history_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_history_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_history_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_history_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_history_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_history_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_history_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_history_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <tr id="r_MaritalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_MaritalHistory"><?= $Page->MaritalHistory->caption() ?></span></td>
        <td data-name="MaritalHistory" <?= $Page->MaritalHistory->cellAttributes() ?>>
<span id="el_patient_history_MaritalHistory">
<span<?= $Page->MaritalHistory->viewAttributes() ?>>
<?= $Page->MaritalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <tr id="r_MenstrualHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></span></td>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_patient_history_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <tr id="r_ObstetricHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?></span></td>
        <td data-name="ObstetricHistory" <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el_patient_history_ObstetricHistory">
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
    <tr id="r_MedicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_MedicalHistory"><?= $Page->MedicalHistory->caption() ?></span></td>
        <td data-name="MedicalHistory" <?= $Page->MedicalHistory->cellAttributes() ?>>
<span id="el_patient_history_MedicalHistory">
<span<?= $Page->MedicalHistory->viewAttributes() ?>>
<?= $Page->MedicalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <tr id="r_SurgicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></span></td>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el_patient_history_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
    <tr id="r_PastHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_PastHistory"><?= $Page->PastHistory->caption() ?></span></td>
        <td data-name="PastHistory" <?= $Page->PastHistory->cellAttributes() ?>>
<span id="el_patient_history_PastHistory">
<span<?= $Page->PastHistory->viewAttributes() ?>>
<?= $Page->PastHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TreatmentHistory->Visible) { // TreatmentHistory ?>
    <tr id="r_TreatmentHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_TreatmentHistory"><?= $Page->TreatmentHistory->caption() ?></span></td>
        <td data-name="TreatmentHistory" <?= $Page->TreatmentHistory->cellAttributes() ?>>
<span id="el_patient_history_TreatmentHistory">
<span<?= $Page->TreatmentHistory->viewAttributes() ?>>
<?= $Page->TreatmentHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <tr id="r_FamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span></td>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_patient_history_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Complaints->Visible) { // Complaints ?>
    <tr id="r_Complaints">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_Complaints"><?= $Page->Complaints->caption() ?></span></td>
        <td data-name="Complaints" <?= $Page->Complaints->cellAttributes() ?>>
<span id="el_patient_history_Complaints">
<span<?= $Page->Complaints->viewAttributes() ?>>
<?= $Page->Complaints->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->illness->Visible) { // illness ?>
    <tr id="r_illness">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_illness"><?= $Page->illness->caption() ?></span></td>
        <td data-name="illness" <?= $Page->illness->cellAttributes() ?>>
<span id="el_patient_history_illness">
<span<?= $Page->illness->viewAttributes() ?>>
<?= $Page->illness->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PersonalHistory->Visible) { // PersonalHistory ?>
    <tr id="r_PersonalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_PersonalHistory"><?= $Page->PersonalHistory->caption() ?></span></td>
        <td data-name="PersonalHistory" <?= $Page->PersonalHistory->cellAttributes() ?>>
<span id="el_patient_history_PersonalHistory">
<span<?= $Page->PersonalHistory->viewAttributes() ?>>
<?= $Page->PersonalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_history_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_history_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_history_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_history_HospID">
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
