<?php

namespace PHPMaker2021\project3;

// Page object
$PatientAnRegistrationDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_an_registrationdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_an_registrationdelete = currentForm = new ew.Form("fpatient_an_registrationdelete", "delete");
    loadjs.done("fpatient_an_registrationdelete");
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
<form name="fpatient_an_registrationdelete" id="fpatient_an_registrationdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_an_registration_id" class="patient_an_registration_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pid->Visible) { // pid ?>
        <th class="<?= $Page->pid->headerCellClass() ?>"><span id="elh_patient_an_registration_pid" class="patient_an_registration_pid"><?= $Page->pid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
        <th class="<?= $Page->fid->headerCellClass() ?>"><span id="elh_patient_an_registration_fid" class="patient_an_registration_fid"><?= $Page->fid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
        <th class="<?= $Page->G->headerCellClass() ?>"><span id="elh_patient_an_registration_G" class="patient_an_registration_G"><?= $Page->G->caption() ?></span></th>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
        <th class="<?= $Page->P->headerCellClass() ?>"><span id="elh_patient_an_registration_P" class="patient_an_registration_P"><?= $Page->P->caption() ?></span></th>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
        <th class="<?= $Page->L->headerCellClass() ?>"><span id="elh_patient_an_registration_L" class="patient_an_registration_L"><?= $Page->L->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <th class="<?= $Page->A->headerCellClass() ?>"><span id="elh_patient_an_registration_A" class="patient_an_registration_A"><?= $Page->A->caption() ?></span></th>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
        <th class="<?= $Page->E->headerCellClass() ?>"><span id="elh_patient_an_registration_E" class="patient_an_registration_E"><?= $Page->E->caption() ?></span></th>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <th class="<?= $Page->M->headerCellClass() ?>"><span id="elh_patient_an_registration_M" class="patient_an_registration_M"><?= $Page->M->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th class="<?= $Page->LMP->headerCellClass() ?>"><span id="elh_patient_an_registration_LMP" class="patient_an_registration_LMP"><?= $Page->LMP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
        <th class="<?= $Page->EDO->headerCellClass() ?>"><span id="elh_patient_an_registration_EDO" class="patient_an_registration_EDO"><?= $Page->EDO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <th class="<?= $Page->MenstrualHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
        <th class="<?= $Page->MaritalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory"><?= $Page->MaritalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <th class="<?= $Page->ObstetricHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <th class="<?= $Page->PreviousHistoryofGDM->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM"><?= $Page->PreviousHistoryofGDM->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <th class="<?= $Page->PreviousHistorofPIH->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH"><?= $Page->PreviousHistorofPIH->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <th class="<?= $Page->PreviousHistoryofIUGR->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR"><?= $Page->PreviousHistoryofIUGR->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <th class="<?= $Page->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios"><?= $Page->PreviousHistoryofOligohydramnios->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <th class="<?= $Page->PreviousHistoryofPreterm->headerCellClass() ?>"><span id="elh_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm"><?= $Page->PreviousHistoryofPreterm->caption() ?></span></th>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
        <th class="<?= $Page->G1->headerCellClass() ?>"><span id="elh_patient_an_registration_G1" class="patient_an_registration_G1"><?= $Page->G1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
        <th class="<?= $Page->G2->headerCellClass() ?>"><span id="elh_patient_an_registration_G2" class="patient_an_registration_G2"><?= $Page->G2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
        <th class="<?= $Page->G3->headerCellClass() ?>"><span id="elh_patient_an_registration_G3" class="patient_an_registration_G3"><?= $Page->G3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <th class="<?= $Page->DeliveryNDLSCS1->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1"><?= $Page->DeliveryNDLSCS1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <th class="<?= $Page->DeliveryNDLSCS2->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2"><?= $Page->DeliveryNDLSCS2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <th class="<?= $Page->DeliveryNDLSCS3->headerCellClass() ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3"><?= $Page->DeliveryNDLSCS3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
        <th class="<?= $Page->BabySexweight1->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1"><?= $Page->BabySexweight1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
        <th class="<?= $Page->BabySexweight2->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2"><?= $Page->BabySexweight2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
        <th class="<?= $Page->BabySexweight3->headerCellClass() ?>"><span id="elh_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3"><?= $Page->BabySexweight3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <th class="<?= $Page->PastMedicalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory"><?= $Page->PastMedicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <th class="<?= $Page->PastSurgicalHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory"><?= $Page->PastSurgicalHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <th class="<?= $Page->FamilyHistory->headerCellClass() ?>"><span id="elh_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
        <th class="<?= $Page->Viability->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability" class="patient_an_registration_Viability"><?= $Page->Viability->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <th class="<?= $Page->ViabilityDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE"><?= $Page->ViabilityDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
        <th class="<?= $Page->Viability2->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2" class="patient_an_registration_Viability2"><?= $Page->Viability2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
        <th class="<?= $Page->Viability2DATE->headerCellClass() ?>"><span id="elh_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE"><?= $Page->Viability2DATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
        <th class="<?= $Page->NTscan->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscan" class="patient_an_registration_NTscan"><?= $Page->NTscan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
        <th class="<?= $Page->NTscanDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE"><?= $Page->NTscanDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
        <th class="<?= $Page->EarlyTarget->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget"><?= $Page->EarlyTarget->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <th class="<?= $Page->EarlyTargetDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE"><?= $Page->EarlyTargetDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
        <th class="<?= $Page->Anomaly->headerCellClass() ?>"><span id="elh_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly"><?= $Page->Anomaly->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <th class="<?= $Page->AnomalyDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE"><?= $Page->AnomalyDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
        <th class="<?= $Page->Growth->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth" class="patient_an_registration_Growth"><?= $Page->Growth->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
        <th class="<?= $Page->GrowthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE"><?= $Page->GrowthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
        <th class="<?= $Page->Growth1->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1" class="patient_an_registration_Growth1"><?= $Page->Growth1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
        <th class="<?= $Page->Growth1DATE->headerCellClass() ?>"><span id="elh_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE"><?= $Page->Growth1DATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
        <th class="<?= $Page->ANProfile->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile"><?= $Page->ANProfile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <th class="<?= $Page->ANProfileDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE"><?= $Page->ANProfileDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <th class="<?= $Page->ANProfileINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE"><?= $Page->ANProfileINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
        <th class="<?= $Page->DualMarker->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker"><?= $Page->DualMarker->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <th class="<?= $Page->DualMarkerDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE"><?= $Page->DualMarkerDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <th class="<?= $Page->DualMarkerINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE"><?= $Page->DualMarkerINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
        <th class="<?= $Page->Quadruple->headerCellClass() ?>"><span id="elh_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple"><?= $Page->Quadruple->caption() ?></span></th>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <th class="<?= $Page->QuadrupleDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE"><?= $Page->QuadrupleDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <th class="<?= $Page->QuadrupleINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE"><?= $Page->QuadrupleINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
        <th class="<?= $Page->A5month->headerCellClass() ?>"><span id="elh_patient_an_registration_A5month" class="patient_an_registration_A5month"><?= $Page->A5month->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
        <th class="<?= $Page->A5monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE"><?= $Page->A5monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <th class="<?= $Page->A5monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE"><?= $Page->A5monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
        <th class="<?= $Page->A7month->headerCellClass() ?>"><span id="elh_patient_an_registration_A7month" class="patient_an_registration_A7month"><?= $Page->A7month->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
        <th class="<?= $Page->A7monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE"><?= $Page->A7monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <th class="<?= $Page->A7monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE"><?= $Page->A7monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
        <th class="<?= $Page->A9month->headerCellClass() ?>"><span id="elh_patient_an_registration_A9month" class="patient_an_registration_A9month"><?= $Page->A9month->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
        <th class="<?= $Page->A9monthDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE"><?= $Page->A9monthDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <th class="<?= $Page->A9monthINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE"><?= $Page->A9monthINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
        <th class="<?= $Page->INJ->headerCellClass() ?>"><span id="elh_patient_an_registration_INJ" class="patient_an_registration_INJ"><?= $Page->INJ->caption() ?></span></th>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
        <th class="<?= $Page->INJDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE"><?= $Page->INJDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <th class="<?= $Page->INJINHOUSE->headerCellClass() ?>"><span id="elh_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE"><?= $Page->INJINHOUSE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
        <th class="<?= $Page->Bleeding->headerCellClass() ?>"><span id="elh_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding"><?= $Page->Bleeding->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <th class="<?= $Page->Hypothyroidism->headerCellClass() ?>"><span id="elh_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism"><?= $Page->Hypothyroidism->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
        <th class="<?= $Page->PICMENumber->headerCellClass() ?>"><span id="elh_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber"><?= $Page->PICMENumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
        <th class="<?= $Page->Outcome->headerCellClass() ?>"><span id="elh_patient_an_registration_Outcome" class="patient_an_registration_Outcome"><?= $Page->Outcome->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <th class="<?= $Page->DateofAdmission->headerCellClass() ?>"><span id="elh_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission"><?= $Page->DateofAdmission->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
        <th class="<?= $Page->DateodProcedure->headerCellClass() ?>"><span id="elh_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure"><?= $Page->DateodProcedure->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <th class="<?= $Page->Miscarriage->headerCellClass() ?>"><span id="elh_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage"><?= $Page->Miscarriage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <th class="<?= $Page->ModeOfDelivery->headerCellClass() ?>"><span id="elh_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery"><?= $Page->ModeOfDelivery->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
        <th class="<?= $Page->ND->headerCellClass() ?>"><span id="elh_patient_an_registration_ND" class="patient_an_registration_ND"><?= $Page->ND->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
        <th class="<?= $Page->NDS->headerCellClass() ?>"><span id="elh_patient_an_registration_NDS" class="patient_an_registration_NDS"><?= $Page->NDS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
        <th class="<?= $Page->NDP->headerCellClass() ?>"><span id="elh_patient_an_registration_NDP" class="patient_an_registration_NDP"><?= $Page->NDP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
        <th class="<?= $Page->Vaccum->headerCellClass() ?>"><span id="elh_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum"><?= $Page->Vaccum->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
        <th class="<?= $Page->VaccumS->headerCellClass() ?>"><span id="elh_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS"><?= $Page->VaccumS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
        <th class="<?= $Page->VaccumP->headerCellClass() ?>"><span id="elh_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP"><?= $Page->VaccumP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
        <th class="<?= $Page->Forceps->headerCellClass() ?>"><span id="elh_patient_an_registration_Forceps" class="patient_an_registration_Forceps"><?= $Page->Forceps->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
        <th class="<?= $Page->ForcepsS->headerCellClass() ?>"><span id="elh_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS"><?= $Page->ForcepsS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
        <th class="<?= $Page->ForcepsP->headerCellClass() ?>"><span id="elh_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP"><?= $Page->ForcepsP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
        <th class="<?= $Page->Elective->headerCellClass() ?>"><span id="elh_patient_an_registration_Elective" class="patient_an_registration_Elective"><?= $Page->Elective->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
        <th class="<?= $Page->ElectiveS->headerCellClass() ?>"><span id="elh_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS"><?= $Page->ElectiveS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
        <th class="<?= $Page->ElectiveP->headerCellClass() ?>"><span id="elh_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP"><?= $Page->ElectiveP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
        <th class="<?= $Page->Emergency->headerCellClass() ?>"><span id="elh_patient_an_registration_Emergency" class="patient_an_registration_Emergency"><?= $Page->Emergency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
        <th class="<?= $Page->EmergencyS->headerCellClass() ?>"><span id="elh_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS"><?= $Page->EmergencyS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
        <th class="<?= $Page->EmergencyP->headerCellClass() ?>"><span id="elh_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP"><?= $Page->EmergencyP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
        <th class="<?= $Page->Maturity->headerCellClass() ?>"><span id="elh_patient_an_registration_Maturity" class="patient_an_registration_Maturity"><?= $Page->Maturity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
        <th class="<?= $Page->Baby1->headerCellClass() ?>"><span id="elh_patient_an_registration_Baby1" class="patient_an_registration_Baby1"><?= $Page->Baby1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
        <th class="<?= $Page->Baby2->headerCellClass() ?>"><span id="elh_patient_an_registration_Baby2" class="patient_an_registration_Baby2"><?= $Page->Baby2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
        <th class="<?= $Page->sex1->headerCellClass() ?>"><span id="elh_patient_an_registration_sex1" class="patient_an_registration_sex1"><?= $Page->sex1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
        <th class="<?= $Page->sex2->headerCellClass() ?>"><span id="elh_patient_an_registration_sex2" class="patient_an_registration_sex2"><?= $Page->sex2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
        <th class="<?= $Page->weight1->headerCellClass() ?>"><span id="elh_patient_an_registration_weight1" class="patient_an_registration_weight1"><?= $Page->weight1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
        <th class="<?= $Page->weight2->headerCellClass() ?>"><span id="elh_patient_an_registration_weight2" class="patient_an_registration_weight2"><?= $Page->weight2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
        <th class="<?= $Page->NICU1->headerCellClass() ?>"><span id="elh_patient_an_registration_NICU1" class="patient_an_registration_NICU1"><?= $Page->NICU1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
        <th class="<?= $Page->NICU2->headerCellClass() ?>"><span id="elh_patient_an_registration_NICU2" class="patient_an_registration_NICU2"><?= $Page->NICU2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
        <th class="<?= $Page->Jaundice1->headerCellClass() ?>"><span id="elh_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1"><?= $Page->Jaundice1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
        <th class="<?= $Page->Jaundice2->headerCellClass() ?>"><span id="elh_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2"><?= $Page->Jaundice2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
        <th class="<?= $Page->Others1->headerCellClass() ?>"><span id="elh_patient_an_registration_Others1" class="patient_an_registration_Others1"><?= $Page->Others1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
        <th class="<?= $Page->Others2->headerCellClass() ?>"><span id="elh_patient_an_registration_Others2" class="patient_an_registration_Others2"><?= $Page->Others2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <th class="<?= $Page->SpillOverReasons->headerCellClass() ?>"><span id="elh_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons"><?= $Page->SpillOverReasons->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
        <th class="<?= $Page->ANClosed->headerCellClass() ?>"><span id="elh_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed"><?= $Page->ANClosed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <th class="<?= $Page->ANClosedDATE->headerCellClass() ?>"><span id="elh_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE"><?= $Page->ANClosedDATE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <th class="<?= $Page->PastMedicalHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers"><?= $Page->PastMedicalHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <th class="<?= $Page->PastSurgicalHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers"><?= $Page->PastSurgicalHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <th class="<?= $Page->FamilyHistoryOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers"><?= $Page->FamilyHistoryOthers->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <th class="<?= $Page->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><span id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers"><?= $Page->PresentPregnancyComplicationsOthers->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
        <th class="<?= $Page->ETdate->headerCellClass() ?>"><span id="elh_patient_an_registration_ETdate" class="patient_an_registration_ETdate"><?= $Page->ETdate->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_an_registration_id" class="patient_an_registration_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pid->Visible) { // pid ?>
        <td <?= $Page->pid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_pid" class="patient_an_registration_pid">
<span<?= $Page->pid->viewAttributes() ?>>
<?= $Page->pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
        <td <?= $Page->fid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_fid" class="patient_an_registration_fid">
<span<?= $Page->fid->viewAttributes() ?>>
<?= $Page->fid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
        <td <?= $Page->G->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G" class="patient_an_registration_G">
<span<?= $Page->G->viewAttributes() ?>>
<?= $Page->G->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
        <td <?= $Page->P->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_P" class="patient_an_registration_P">
<span<?= $Page->P->viewAttributes() ?>>
<?= $Page->P->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
        <td <?= $Page->L->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_L" class="patient_an_registration_L">
<span<?= $Page->L->viewAttributes() ?>>
<?= $Page->L->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <td <?= $Page->A->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A" class="patient_an_registration_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
        <td <?= $Page->E->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_E" class="patient_an_registration_E">
<span<?= $Page->E->viewAttributes() ?>>
<?= $Page->E->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <td <?= $Page->M->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_M" class="patient_an_registration_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <td <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_LMP" class="patient_an_registration_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
        <td <?= $Page->EDO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EDO" class="patient_an_registration_EDO">
<span<?= $Page->EDO->viewAttributes() ?>>
<?= $Page->EDO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <td <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_MenstrualHistory" class="patient_an_registration_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
        <td <?= $Page->MaritalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_MaritalHistory" class="patient_an_registration_MaritalHistory">
<span<?= $Page->MaritalHistory->viewAttributes() ?>>
<?= $Page->MaritalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <td <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ObstetricHistory" class="patient_an_registration_ObstetricHistory">
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <td <?= $Page->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofGDM" class="patient_an_registration_PreviousHistoryofGDM">
<span<?= $Page->PreviousHistoryofGDM->viewAttributes() ?>>
<?= $Page->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <td <?= $Page->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistorofPIH" class="patient_an_registration_PreviousHistorofPIH">
<span<?= $Page->PreviousHistorofPIH->viewAttributes() ?>>
<?= $Page->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <td <?= $Page->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofIUGR" class="patient_an_registration_PreviousHistoryofIUGR">
<span<?= $Page->PreviousHistoryofIUGR->viewAttributes() ?>>
<?= $Page->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <td <?= $Page->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofOligohydramnios" class="patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?= $Page->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?= $Page->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <td <?= $Page->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PreviousHistoryofPreterm" class="patient_an_registration_PreviousHistoryofPreterm">
<span<?= $Page->PreviousHistoryofPreterm->viewAttributes() ?>>
<?= $Page->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
        <td <?= $Page->G1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G1" class="patient_an_registration_G1">
<span<?= $Page->G1->viewAttributes() ?>>
<?= $Page->G1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
        <td <?= $Page->G2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G2" class="patient_an_registration_G2">
<span<?= $Page->G2->viewAttributes() ?>>
<?= $Page->G2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
        <td <?= $Page->G3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_G3" class="patient_an_registration_G3">
<span<?= $Page->G3->viewAttributes() ?>>
<?= $Page->G3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <td <?= $Page->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DeliveryNDLSCS1" class="patient_an_registration_DeliveryNDLSCS1">
<span<?= $Page->DeliveryNDLSCS1->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <td <?= $Page->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DeliveryNDLSCS2" class="patient_an_registration_DeliveryNDLSCS2">
<span<?= $Page->DeliveryNDLSCS2->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <td <?= $Page->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DeliveryNDLSCS3" class="patient_an_registration_DeliveryNDLSCS3">
<span<?= $Page->DeliveryNDLSCS3->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
        <td <?= $Page->BabySexweight1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_BabySexweight1" class="patient_an_registration_BabySexweight1">
<span<?= $Page->BabySexweight1->viewAttributes() ?>>
<?= $Page->BabySexweight1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
        <td <?= $Page->BabySexweight2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_BabySexweight2" class="patient_an_registration_BabySexweight2">
<span<?= $Page->BabySexweight2->viewAttributes() ?>>
<?= $Page->BabySexweight2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
        <td <?= $Page->BabySexweight3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_BabySexweight3" class="patient_an_registration_BabySexweight3">
<span<?= $Page->BabySexweight3->viewAttributes() ?>>
<?= $Page->BabySexweight3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <td <?= $Page->PastMedicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastMedicalHistory" class="patient_an_registration_PastMedicalHistory">
<span<?= $Page->PastMedicalHistory->viewAttributes() ?>>
<?= $Page->PastMedicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <td <?= $Page->PastSurgicalHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastSurgicalHistory" class="patient_an_registration_PastSurgicalHistory">
<span<?= $Page->PastSurgicalHistory->viewAttributes() ?>>
<?= $Page->PastSurgicalHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <td <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_FamilyHistory" class="patient_an_registration_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
        <td <?= $Page->Viability->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Viability" class="patient_an_registration_Viability">
<span<?= $Page->Viability->viewAttributes() ?>>
<?= $Page->Viability->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <td <?= $Page->ViabilityDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ViabilityDATE" class="patient_an_registration_ViabilityDATE">
<span<?= $Page->ViabilityDATE->viewAttributes() ?>>
<?= $Page->ViabilityDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
        <td <?= $Page->Viability2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Viability2" class="patient_an_registration_Viability2">
<span<?= $Page->Viability2->viewAttributes() ?>>
<?= $Page->Viability2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
        <td <?= $Page->Viability2DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Viability2DATE" class="patient_an_registration_Viability2DATE">
<span<?= $Page->Viability2DATE->viewAttributes() ?>>
<?= $Page->Viability2DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
        <td <?= $Page->NTscan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NTscan" class="patient_an_registration_NTscan">
<span<?= $Page->NTscan->viewAttributes() ?>>
<?= $Page->NTscan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
        <td <?= $Page->NTscanDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NTscanDATE" class="patient_an_registration_NTscanDATE">
<span<?= $Page->NTscanDATE->viewAttributes() ?>>
<?= $Page->NTscanDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
        <td <?= $Page->EarlyTarget->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EarlyTarget" class="patient_an_registration_EarlyTarget">
<span<?= $Page->EarlyTarget->viewAttributes() ?>>
<?= $Page->EarlyTarget->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <td <?= $Page->EarlyTargetDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EarlyTargetDATE" class="patient_an_registration_EarlyTargetDATE">
<span<?= $Page->EarlyTargetDATE->viewAttributes() ?>>
<?= $Page->EarlyTargetDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
        <td <?= $Page->Anomaly->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Anomaly" class="patient_an_registration_Anomaly">
<span<?= $Page->Anomaly->viewAttributes() ?>>
<?= $Page->Anomaly->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <td <?= $Page->AnomalyDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_AnomalyDATE" class="patient_an_registration_AnomalyDATE">
<span<?= $Page->AnomalyDATE->viewAttributes() ?>>
<?= $Page->AnomalyDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
        <td <?= $Page->Growth->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Growth" class="patient_an_registration_Growth">
<span<?= $Page->Growth->viewAttributes() ?>>
<?= $Page->Growth->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
        <td <?= $Page->GrowthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_GrowthDATE" class="patient_an_registration_GrowthDATE">
<span<?= $Page->GrowthDATE->viewAttributes() ?>>
<?= $Page->GrowthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
        <td <?= $Page->Growth1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Growth1" class="patient_an_registration_Growth1">
<span<?= $Page->Growth1->viewAttributes() ?>>
<?= $Page->Growth1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
        <td <?= $Page->Growth1DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Growth1DATE" class="patient_an_registration_Growth1DATE">
<span<?= $Page->Growth1DATE->viewAttributes() ?>>
<?= $Page->Growth1DATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
        <td <?= $Page->ANProfile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANProfile" class="patient_an_registration_ANProfile">
<span<?= $Page->ANProfile->viewAttributes() ?>>
<?= $Page->ANProfile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <td <?= $Page->ANProfileDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANProfileDATE" class="patient_an_registration_ANProfileDATE">
<span<?= $Page->ANProfileDATE->viewAttributes() ?>>
<?= $Page->ANProfileDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <td <?= $Page->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANProfileINHOUSE" class="patient_an_registration_ANProfileINHOUSE">
<span<?= $Page->ANProfileINHOUSE->viewAttributes() ?>>
<?= $Page->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
        <td <?= $Page->DualMarker->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DualMarker" class="patient_an_registration_DualMarker">
<span<?= $Page->DualMarker->viewAttributes() ?>>
<?= $Page->DualMarker->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <td <?= $Page->DualMarkerDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DualMarkerDATE" class="patient_an_registration_DualMarkerDATE">
<span<?= $Page->DualMarkerDATE->viewAttributes() ?>>
<?= $Page->DualMarkerDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <td <?= $Page->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DualMarkerINHOUSE" class="patient_an_registration_DualMarkerINHOUSE">
<span<?= $Page->DualMarkerINHOUSE->viewAttributes() ?>>
<?= $Page->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
        <td <?= $Page->Quadruple->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Quadruple" class="patient_an_registration_Quadruple">
<span<?= $Page->Quadruple->viewAttributes() ?>>
<?= $Page->Quadruple->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <td <?= $Page->QuadrupleDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_QuadrupleDATE" class="patient_an_registration_QuadrupleDATE">
<span<?= $Page->QuadrupleDATE->viewAttributes() ?>>
<?= $Page->QuadrupleDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <td <?= $Page->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_QuadrupleINHOUSE" class="patient_an_registration_QuadrupleINHOUSE">
<span<?= $Page->QuadrupleINHOUSE->viewAttributes() ?>>
<?= $Page->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
        <td <?= $Page->A5month->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A5month" class="patient_an_registration_A5month">
<span<?= $Page->A5month->viewAttributes() ?>>
<?= $Page->A5month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
        <td <?= $Page->A5monthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A5monthDATE" class="patient_an_registration_A5monthDATE">
<span<?= $Page->A5monthDATE->viewAttributes() ?>>
<?= $Page->A5monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <td <?= $Page->A5monthINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A5monthINHOUSE" class="patient_an_registration_A5monthINHOUSE">
<span<?= $Page->A5monthINHOUSE->viewAttributes() ?>>
<?= $Page->A5monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
        <td <?= $Page->A7month->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A7month" class="patient_an_registration_A7month">
<span<?= $Page->A7month->viewAttributes() ?>>
<?= $Page->A7month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
        <td <?= $Page->A7monthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A7monthDATE" class="patient_an_registration_A7monthDATE">
<span<?= $Page->A7monthDATE->viewAttributes() ?>>
<?= $Page->A7monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <td <?= $Page->A7monthINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A7monthINHOUSE" class="patient_an_registration_A7monthINHOUSE">
<span<?= $Page->A7monthINHOUSE->viewAttributes() ?>>
<?= $Page->A7monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
        <td <?= $Page->A9month->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A9month" class="patient_an_registration_A9month">
<span<?= $Page->A9month->viewAttributes() ?>>
<?= $Page->A9month->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
        <td <?= $Page->A9monthDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A9monthDATE" class="patient_an_registration_A9monthDATE">
<span<?= $Page->A9monthDATE->viewAttributes() ?>>
<?= $Page->A9monthDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <td <?= $Page->A9monthINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_A9monthINHOUSE" class="patient_an_registration_A9monthINHOUSE">
<span<?= $Page->A9monthINHOUSE->viewAttributes() ?>>
<?= $Page->A9monthINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
        <td <?= $Page->INJ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_INJ" class="patient_an_registration_INJ">
<span<?= $Page->INJ->viewAttributes() ?>>
<?= $Page->INJ->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
        <td <?= $Page->INJDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_INJDATE" class="patient_an_registration_INJDATE">
<span<?= $Page->INJDATE->viewAttributes() ?>>
<?= $Page->INJDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <td <?= $Page->INJINHOUSE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_INJINHOUSE" class="patient_an_registration_INJINHOUSE">
<span<?= $Page->INJINHOUSE->viewAttributes() ?>>
<?= $Page->INJINHOUSE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
        <td <?= $Page->Bleeding->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Bleeding" class="patient_an_registration_Bleeding">
<span<?= $Page->Bleeding->viewAttributes() ?>>
<?= $Page->Bleeding->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <td <?= $Page->Hypothyroidism->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Hypothyroidism" class="patient_an_registration_Hypothyroidism">
<span<?= $Page->Hypothyroidism->viewAttributes() ?>>
<?= $Page->Hypothyroidism->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
        <td <?= $Page->PICMENumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PICMENumber" class="patient_an_registration_PICMENumber">
<span<?= $Page->PICMENumber->viewAttributes() ?>>
<?= $Page->PICMENumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
        <td <?= $Page->Outcome->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Outcome" class="patient_an_registration_Outcome">
<span<?= $Page->Outcome->viewAttributes() ?>>
<?= $Page->Outcome->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <td <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DateofAdmission" class="patient_an_registration_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
        <td <?= $Page->DateodProcedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_DateodProcedure" class="patient_an_registration_DateodProcedure">
<span<?= $Page->DateodProcedure->viewAttributes() ?>>
<?= $Page->DateodProcedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <td <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Miscarriage" class="patient_an_registration_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <td <?= $Page->ModeOfDelivery->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ModeOfDelivery" class="patient_an_registration_ModeOfDelivery">
<span<?= $Page->ModeOfDelivery->viewAttributes() ?>>
<?= $Page->ModeOfDelivery->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
        <td <?= $Page->ND->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ND" class="patient_an_registration_ND">
<span<?= $Page->ND->viewAttributes() ?>>
<?= $Page->ND->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
        <td <?= $Page->NDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NDS" class="patient_an_registration_NDS">
<span<?= $Page->NDS->viewAttributes() ?>>
<?= $Page->NDS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
        <td <?= $Page->NDP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NDP" class="patient_an_registration_NDP">
<span<?= $Page->NDP->viewAttributes() ?>>
<?= $Page->NDP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
        <td <?= $Page->Vaccum->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Vaccum" class="patient_an_registration_Vaccum">
<span<?= $Page->Vaccum->viewAttributes() ?>>
<?= $Page->Vaccum->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
        <td <?= $Page->VaccumS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_VaccumS" class="patient_an_registration_VaccumS">
<span<?= $Page->VaccumS->viewAttributes() ?>>
<?= $Page->VaccumS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
        <td <?= $Page->VaccumP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_VaccumP" class="patient_an_registration_VaccumP">
<span<?= $Page->VaccumP->viewAttributes() ?>>
<?= $Page->VaccumP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
        <td <?= $Page->Forceps->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Forceps" class="patient_an_registration_Forceps">
<span<?= $Page->Forceps->viewAttributes() ?>>
<?= $Page->Forceps->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
        <td <?= $Page->ForcepsS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ForcepsS" class="patient_an_registration_ForcepsS">
<span<?= $Page->ForcepsS->viewAttributes() ?>>
<?= $Page->ForcepsS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
        <td <?= $Page->ForcepsP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ForcepsP" class="patient_an_registration_ForcepsP">
<span<?= $Page->ForcepsP->viewAttributes() ?>>
<?= $Page->ForcepsP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
        <td <?= $Page->Elective->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Elective" class="patient_an_registration_Elective">
<span<?= $Page->Elective->viewAttributes() ?>>
<?= $Page->Elective->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
        <td <?= $Page->ElectiveS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ElectiveS" class="patient_an_registration_ElectiveS">
<span<?= $Page->ElectiveS->viewAttributes() ?>>
<?= $Page->ElectiveS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
        <td <?= $Page->ElectiveP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ElectiveP" class="patient_an_registration_ElectiveP">
<span<?= $Page->ElectiveP->viewAttributes() ?>>
<?= $Page->ElectiveP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
        <td <?= $Page->Emergency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Emergency" class="patient_an_registration_Emergency">
<span<?= $Page->Emergency->viewAttributes() ?>>
<?= $Page->Emergency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
        <td <?= $Page->EmergencyS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EmergencyS" class="patient_an_registration_EmergencyS">
<span<?= $Page->EmergencyS->viewAttributes() ?>>
<?= $Page->EmergencyS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
        <td <?= $Page->EmergencyP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_EmergencyP" class="patient_an_registration_EmergencyP">
<span<?= $Page->EmergencyP->viewAttributes() ?>>
<?= $Page->EmergencyP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
        <td <?= $Page->Maturity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Maturity" class="patient_an_registration_Maturity">
<span<?= $Page->Maturity->viewAttributes() ?>>
<?= $Page->Maturity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
        <td <?= $Page->Baby1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Baby1" class="patient_an_registration_Baby1">
<span<?= $Page->Baby1->viewAttributes() ?>>
<?= $Page->Baby1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
        <td <?= $Page->Baby2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Baby2" class="patient_an_registration_Baby2">
<span<?= $Page->Baby2->viewAttributes() ?>>
<?= $Page->Baby2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
        <td <?= $Page->sex1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_sex1" class="patient_an_registration_sex1">
<span<?= $Page->sex1->viewAttributes() ?>>
<?= $Page->sex1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
        <td <?= $Page->sex2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_sex2" class="patient_an_registration_sex2">
<span<?= $Page->sex2->viewAttributes() ?>>
<?= $Page->sex2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
        <td <?= $Page->weight1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_weight1" class="patient_an_registration_weight1">
<span<?= $Page->weight1->viewAttributes() ?>>
<?= $Page->weight1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
        <td <?= $Page->weight2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_weight2" class="patient_an_registration_weight2">
<span<?= $Page->weight2->viewAttributes() ?>>
<?= $Page->weight2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
        <td <?= $Page->NICU1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NICU1" class="patient_an_registration_NICU1">
<span<?= $Page->NICU1->viewAttributes() ?>>
<?= $Page->NICU1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
        <td <?= $Page->NICU2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_NICU2" class="patient_an_registration_NICU2">
<span<?= $Page->NICU2->viewAttributes() ?>>
<?= $Page->NICU2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
        <td <?= $Page->Jaundice1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Jaundice1" class="patient_an_registration_Jaundice1">
<span<?= $Page->Jaundice1->viewAttributes() ?>>
<?= $Page->Jaundice1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
        <td <?= $Page->Jaundice2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Jaundice2" class="patient_an_registration_Jaundice2">
<span<?= $Page->Jaundice2->viewAttributes() ?>>
<?= $Page->Jaundice2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
        <td <?= $Page->Others1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Others1" class="patient_an_registration_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
        <td <?= $Page->Others2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_Others2" class="patient_an_registration_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <td <?= $Page->SpillOverReasons->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_SpillOverReasons" class="patient_an_registration_SpillOverReasons">
<span<?= $Page->SpillOverReasons->viewAttributes() ?>>
<?= $Page->SpillOverReasons->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
        <td <?= $Page->ANClosed->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANClosed" class="patient_an_registration_ANClosed">
<span<?= $Page->ANClosed->viewAttributes() ?>>
<?= $Page->ANClosed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <td <?= $Page->ANClosedDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ANClosedDATE" class="patient_an_registration_ANClosedDATE">
<span<?= $Page->ANClosedDATE->viewAttributes() ?>>
<?= $Page->ANClosedDATE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <td <?= $Page->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastMedicalHistoryOthers" class="patient_an_registration_PastMedicalHistoryOthers">
<span<?= $Page->PastMedicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <td <?= $Page->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PastSurgicalHistoryOthers" class="patient_an_registration_PastSurgicalHistoryOthers">
<span<?= $Page->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <td <?= $Page->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_FamilyHistoryOthers" class="patient_an_registration_FamilyHistoryOthers">
<span<?= $Page->FamilyHistoryOthers->viewAttributes() ?>>
<?= $Page->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <td <?= $Page->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_PresentPregnancyComplicationsOthers" class="patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?= $Page->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?= $Page->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
        <td <?= $Page->ETdate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_an_registration_ETdate" class="patient_an_registration_ETdate">
<span<?= $Page->ETdate->viewAttributes() ?>>
<?= $Page->ETdate->getViewValue() ?></span>
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
