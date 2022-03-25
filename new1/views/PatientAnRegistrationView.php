<?php

namespace PHPMaker2021\project3;

// Page object
$PatientAnRegistrationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_an_registrationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_an_registrationview = currentForm = new ew.Form("fpatient_an_registrationview", "view");
    loadjs.done("fpatient_an_registrationview");
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
<form name="fpatient_an_registrationview" id="fpatient_an_registrationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_an_registration_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pid->Visible) { // pid ?>
    <tr id="r_pid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_pid"><?= $Page->pid->caption() ?></span></td>
        <td data-name="pid" <?= $Page->pid->cellAttributes() ?>>
<span id="el_patient_an_registration_pid">
<span<?= $Page->pid->viewAttributes() ?>>
<?= $Page->pid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
    <tr id="r_fid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_fid"><?= $Page->fid->caption() ?></span></td>
        <td data-name="fid" <?= $Page->fid->cellAttributes() ?>>
<span id="el_patient_an_registration_fid">
<span<?= $Page->fid->viewAttributes() ?>>
<?= $Page->fid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
    <tr id="r_G">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G"><?= $Page->G->caption() ?></span></td>
        <td data-name="G" <?= $Page->G->cellAttributes() ?>>
<span id="el_patient_an_registration_G">
<span<?= $Page->G->viewAttributes() ?>>
<?= $Page->G->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
    <tr id="r_P">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_P"><?= $Page->P->caption() ?></span></td>
        <td data-name="P" <?= $Page->P->cellAttributes() ?>>
<span id="el_patient_an_registration_P">
<span<?= $Page->P->viewAttributes() ?>>
<?= $Page->P->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
    <tr id="r_L">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_L"><?= $Page->L->caption() ?></span></td>
        <td data-name="L" <?= $Page->L->cellAttributes() ?>>
<span id="el_patient_an_registration_L">
<span<?= $Page->L->viewAttributes() ?>>
<?= $Page->L->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <tr id="r_A">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A"><?= $Page->A->caption() ?></span></td>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<span id="el_patient_an_registration_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
    <tr id="r_E">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_E"><?= $Page->E->caption() ?></span></td>
        <td data-name="E" <?= $Page->E->cellAttributes() ?>>
<span id="el_patient_an_registration_E">
<span<?= $Page->E->viewAttributes() ?>>
<?= $Page->E->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <tr id="r_M">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_M"><?= $Page->M->caption() ?></span></td>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<span id="el_patient_an_registration_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <tr id="r_LMP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_LMP"><?= $Page->LMP->caption() ?></span></td>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el_patient_an_registration_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
    <tr id="r_EDO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EDO"><?= $Page->EDO->caption() ?></span></td>
        <td data-name="EDO" <?= $Page->EDO->cellAttributes() ?>>
<span id="el_patient_an_registration_EDO">
<span<?= $Page->EDO->viewAttributes() ?>>
<?= $Page->EDO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <tr id="r_MenstrualHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></span></td>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <tr id="r_MaritalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_MaritalHistory"><?= $Page->MaritalHistory->caption() ?></span></td>
        <td data-name="MaritalHistory" <?= $Page->MaritalHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_MaritalHistory">
<span<?= $Page->MaritalHistory->viewAttributes() ?>>
<?= $Page->MaritalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <tr id="r_ObstetricHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?></span></td>
        <td data-name="ObstetricHistory" <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_ObstetricHistory">
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
    <tr id="r_PreviousHistoryofGDM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofGDM"><?= $Page->PreviousHistoryofGDM->caption() ?></span></td>
        <td data-name="PreviousHistoryofGDM" <?= $Page->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofGDM">
<span<?= $Page->PreviousHistoryofGDM->viewAttributes() ?>>
<?= $Page->PreviousHistoryofGDM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
    <tr id="r_PreviousHistorofPIH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistorofPIH"><?= $Page->PreviousHistorofPIH->caption() ?></span></td>
        <td data-name="PreviousHistorofPIH" <?= $Page->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistorofPIH">
<span<?= $Page->PreviousHistorofPIH->viewAttributes() ?>>
<?= $Page->PreviousHistorofPIH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
    <tr id="r_PreviousHistoryofIUGR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofIUGR"><?= $Page->PreviousHistoryofIUGR->caption() ?></span></td>
        <td data-name="PreviousHistoryofIUGR" <?= $Page->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofIUGR">
<span<?= $Page->PreviousHistoryofIUGR->viewAttributes() ?>>
<?= $Page->PreviousHistoryofIUGR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
    <tr id="r_PreviousHistoryofOligohydramnios">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofOligohydramnios"><?= $Page->PreviousHistoryofOligohydramnios->caption() ?></span></td>
        <td data-name="PreviousHistoryofOligohydramnios" <?= $Page->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
<span<?= $Page->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?= $Page->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
    <tr id="r_PreviousHistoryofPreterm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PreviousHistoryofPreterm"><?= $Page->PreviousHistoryofPreterm->caption() ?></span></td>
        <td data-name="PreviousHistoryofPreterm" <?= $Page->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofPreterm">
<span<?= $Page->PreviousHistoryofPreterm->viewAttributes() ?>>
<?= $Page->PreviousHistoryofPreterm->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
    <tr id="r_G1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G1"><?= $Page->G1->caption() ?></span></td>
        <td data-name="G1" <?= $Page->G1->cellAttributes() ?>>
<span id="el_patient_an_registration_G1">
<span<?= $Page->G1->viewAttributes() ?>>
<?= $Page->G1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
    <tr id="r_G2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G2"><?= $Page->G2->caption() ?></span></td>
        <td data-name="G2" <?= $Page->G2->cellAttributes() ?>>
<span id="el_patient_an_registration_G2">
<span<?= $Page->G2->viewAttributes() ?>>
<?= $Page->G2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
    <tr id="r_G3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_G3"><?= $Page->G3->caption() ?></span></td>
        <td data-name="G3" <?= $Page->G3->cellAttributes() ?>>
<span id="el_patient_an_registration_G3">
<span<?= $Page->G3->viewAttributes() ?>>
<?= $Page->G3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
    <tr id="r_DeliveryNDLSCS1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS1"><?= $Page->DeliveryNDLSCS1->caption() ?></span></td>
        <td data-name="DeliveryNDLSCS1" <?= $Page->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el_patient_an_registration_DeliveryNDLSCS1">
<span<?= $Page->DeliveryNDLSCS1->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
    <tr id="r_DeliveryNDLSCS2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS2"><?= $Page->DeliveryNDLSCS2->caption() ?></span></td>
        <td data-name="DeliveryNDLSCS2" <?= $Page->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el_patient_an_registration_DeliveryNDLSCS2">
<span<?= $Page->DeliveryNDLSCS2->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
    <tr id="r_DeliveryNDLSCS3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DeliveryNDLSCS3"><?= $Page->DeliveryNDLSCS3->caption() ?></span></td>
        <td data-name="DeliveryNDLSCS3" <?= $Page->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el_patient_an_registration_DeliveryNDLSCS3">
<span<?= $Page->DeliveryNDLSCS3->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
    <tr id="r_BabySexweight1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight1"><?= $Page->BabySexweight1->caption() ?></span></td>
        <td data-name="BabySexweight1" <?= $Page->BabySexweight1->cellAttributes() ?>>
<span id="el_patient_an_registration_BabySexweight1">
<span<?= $Page->BabySexweight1->viewAttributes() ?>>
<?= $Page->BabySexweight1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
    <tr id="r_BabySexweight2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight2"><?= $Page->BabySexweight2->caption() ?></span></td>
        <td data-name="BabySexweight2" <?= $Page->BabySexweight2->cellAttributes() ?>>
<span id="el_patient_an_registration_BabySexweight2">
<span<?= $Page->BabySexweight2->viewAttributes() ?>>
<?= $Page->BabySexweight2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
    <tr id="r_BabySexweight3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_BabySexweight3"><?= $Page->BabySexweight3->caption() ?></span></td>
        <td data-name="BabySexweight3" <?= $Page->BabySexweight3->cellAttributes() ?>>
<span id="el_patient_an_registration_BabySexweight3">
<span<?= $Page->BabySexweight3->viewAttributes() ?>>
<?= $Page->BabySexweight3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
    <tr id="r_PastMedicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistory"><?= $Page->PastMedicalHistory->caption() ?></span></td>
        <td data-name="PastMedicalHistory" <?= $Page->PastMedicalHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_PastMedicalHistory">
<span<?= $Page->PastMedicalHistory->viewAttributes() ?>>
<?= $Page->PastMedicalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
    <tr id="r_PastSurgicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistory"><?= $Page->PastSurgicalHistory->caption() ?></span></td>
        <td data-name="PastSurgicalHistory" <?= $Page->PastSurgicalHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_PastSurgicalHistory">
<span<?= $Page->PastSurgicalHistory->viewAttributes() ?>>
<?= $Page->PastSurgicalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <tr id="r_FamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span></td>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
    <tr id="r_Viability">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability"><?= $Page->Viability->caption() ?></span></td>
        <td data-name="Viability" <?= $Page->Viability->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability">
<span<?= $Page->Viability->viewAttributes() ?>>
<?= $Page->Viability->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
    <tr id="r_ViabilityDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityDATE"><?= $Page->ViabilityDATE->caption() ?></span></td>
        <td data-name="ViabilityDATE" <?= $Page->ViabilityDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_ViabilityDATE">
<span<?= $Page->ViabilityDATE->viewAttributes() ?>>
<?= $Page->ViabilityDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
    <tr id="r_ViabilityREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ViabilityREPORT"><?= $Page->ViabilityREPORT->caption() ?></span></td>
        <td data-name="ViabilityREPORT" <?= $Page->ViabilityREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_ViabilityREPORT">
<span<?= $Page->ViabilityREPORT->viewAttributes() ?>>
<?= $Page->ViabilityREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
    <tr id="r_Viability2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2"><?= $Page->Viability2->caption() ?></span></td>
        <td data-name="Viability2" <?= $Page->Viability2->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability2">
<span<?= $Page->Viability2->viewAttributes() ?>>
<?= $Page->Viability2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
    <tr id="r_Viability2DATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2DATE"><?= $Page->Viability2DATE->caption() ?></span></td>
        <td data-name="Viability2DATE" <?= $Page->Viability2DATE->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability2DATE">
<span<?= $Page->Viability2DATE->viewAttributes() ?>>
<?= $Page->Viability2DATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Viability2REPORT->Visible) { // Viability2REPORT ?>
    <tr id="r_Viability2REPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Viability2REPORT"><?= $Page->Viability2REPORT->caption() ?></span></td>
        <td data-name="Viability2REPORT" <?= $Page->Viability2REPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability2REPORT">
<span<?= $Page->Viability2REPORT->viewAttributes() ?>>
<?= $Page->Viability2REPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
    <tr id="r_NTscan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscan"><?= $Page->NTscan->caption() ?></span></td>
        <td data-name="NTscan" <?= $Page->NTscan->cellAttributes() ?>>
<span id="el_patient_an_registration_NTscan">
<span<?= $Page->NTscan->viewAttributes() ?>>
<?= $Page->NTscan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
    <tr id="r_NTscanDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanDATE"><?= $Page->NTscanDATE->caption() ?></span></td>
        <td data-name="NTscanDATE" <?= $Page->NTscanDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_NTscanDATE">
<span<?= $Page->NTscanDATE->viewAttributes() ?>>
<?= $Page->NTscanDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NTscanREPORT->Visible) { // NTscanREPORT ?>
    <tr id="r_NTscanREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NTscanREPORT"><?= $Page->NTscanREPORT->caption() ?></span></td>
        <td data-name="NTscanREPORT" <?= $Page->NTscanREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_NTscanREPORT">
<span<?= $Page->NTscanREPORT->viewAttributes() ?>>
<?= $Page->NTscanREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
    <tr id="r_EarlyTarget">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTarget"><?= $Page->EarlyTarget->caption() ?></span></td>
        <td data-name="EarlyTarget" <?= $Page->EarlyTarget->cellAttributes() ?>>
<span id="el_patient_an_registration_EarlyTarget">
<span<?= $Page->EarlyTarget->viewAttributes() ?>>
<?= $Page->EarlyTarget->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
    <tr id="r_EarlyTargetDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetDATE"><?= $Page->EarlyTargetDATE->caption() ?></span></td>
        <td data-name="EarlyTargetDATE" <?= $Page->EarlyTargetDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_EarlyTargetDATE">
<span<?= $Page->EarlyTargetDATE->viewAttributes() ?>>
<?= $Page->EarlyTargetDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
    <tr id="r_EarlyTargetREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EarlyTargetREPORT"><?= $Page->EarlyTargetREPORT->caption() ?></span></td>
        <td data-name="EarlyTargetREPORT" <?= $Page->EarlyTargetREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_EarlyTargetREPORT">
<span<?= $Page->EarlyTargetREPORT->viewAttributes() ?>>
<?= $Page->EarlyTargetREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
    <tr id="r_Anomaly">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Anomaly"><?= $Page->Anomaly->caption() ?></span></td>
        <td data-name="Anomaly" <?= $Page->Anomaly->cellAttributes() ?>>
<span id="el_patient_an_registration_Anomaly">
<span<?= $Page->Anomaly->viewAttributes() ?>>
<?= $Page->Anomaly->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
    <tr id="r_AnomalyDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyDATE"><?= $Page->AnomalyDATE->caption() ?></span></td>
        <td data-name="AnomalyDATE" <?= $Page->AnomalyDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_AnomalyDATE">
<span<?= $Page->AnomalyDATE->viewAttributes() ?>>
<?= $Page->AnomalyDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
    <tr id="r_AnomalyREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_AnomalyREPORT"><?= $Page->AnomalyREPORT->caption() ?></span></td>
        <td data-name="AnomalyREPORT" <?= $Page->AnomalyREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_AnomalyREPORT">
<span<?= $Page->AnomalyREPORT->viewAttributes() ?>>
<?= $Page->AnomalyREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
    <tr id="r_Growth">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth"><?= $Page->Growth->caption() ?></span></td>
        <td data-name="Growth" <?= $Page->Growth->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth">
<span<?= $Page->Growth->viewAttributes() ?>>
<?= $Page->Growth->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
    <tr id="r_GrowthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthDATE"><?= $Page->GrowthDATE->caption() ?></span></td>
        <td data-name="GrowthDATE" <?= $Page->GrowthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_GrowthDATE">
<span<?= $Page->GrowthDATE->viewAttributes() ?>>
<?= $Page->GrowthDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GrowthREPORT->Visible) { // GrowthREPORT ?>
    <tr id="r_GrowthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_GrowthREPORT"><?= $Page->GrowthREPORT->caption() ?></span></td>
        <td data-name="GrowthREPORT" <?= $Page->GrowthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_GrowthREPORT">
<span<?= $Page->GrowthREPORT->viewAttributes() ?>>
<?= $Page->GrowthREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
    <tr id="r_Growth1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1"><?= $Page->Growth1->caption() ?></span></td>
        <td data-name="Growth1" <?= $Page->Growth1->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth1">
<span<?= $Page->Growth1->viewAttributes() ?>>
<?= $Page->Growth1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
    <tr id="r_Growth1DATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1DATE"><?= $Page->Growth1DATE->caption() ?></span></td>
        <td data-name="Growth1DATE" <?= $Page->Growth1DATE->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth1DATE">
<span<?= $Page->Growth1DATE->viewAttributes() ?>>
<?= $Page->Growth1DATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Growth1REPORT->Visible) { // Growth1REPORT ?>
    <tr id="r_Growth1REPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Growth1REPORT"><?= $Page->Growth1REPORT->caption() ?></span></td>
        <td data-name="Growth1REPORT" <?= $Page->Growth1REPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth1REPORT">
<span<?= $Page->Growth1REPORT->viewAttributes() ?>>
<?= $Page->Growth1REPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
    <tr id="r_ANProfile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfile"><?= $Page->ANProfile->caption() ?></span></td>
        <td data-name="ANProfile" <?= $Page->ANProfile->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfile">
<span<?= $Page->ANProfile->viewAttributes() ?>>
<?= $Page->ANProfile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
    <tr id="r_ANProfileDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileDATE"><?= $Page->ANProfileDATE->caption() ?></span></td>
        <td data-name="ANProfileDATE" <?= $Page->ANProfileDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfileDATE">
<span<?= $Page->ANProfileDATE->viewAttributes() ?>>
<?= $Page->ANProfileDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
    <tr id="r_ANProfileINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileINHOUSE"><?= $Page->ANProfileINHOUSE->caption() ?></span></td>
        <td data-name="ANProfileINHOUSE" <?= $Page->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfileINHOUSE">
<span<?= $Page->ANProfileINHOUSE->viewAttributes() ?>>
<?= $Page->ANProfileINHOUSE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
    <tr id="r_ANProfileREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANProfileREPORT"><?= $Page->ANProfileREPORT->caption() ?></span></td>
        <td data-name="ANProfileREPORT" <?= $Page->ANProfileREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfileREPORT">
<span<?= $Page->ANProfileREPORT->viewAttributes() ?>>
<?= $Page->ANProfileREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
    <tr id="r_DualMarker">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarker"><?= $Page->DualMarker->caption() ?></span></td>
        <td data-name="DualMarker" <?= $Page->DualMarker->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarker">
<span<?= $Page->DualMarker->viewAttributes() ?>>
<?= $Page->DualMarker->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
    <tr id="r_DualMarkerDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerDATE"><?= $Page->DualMarkerDATE->caption() ?></span></td>
        <td data-name="DualMarkerDATE" <?= $Page->DualMarkerDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarkerDATE">
<span<?= $Page->DualMarkerDATE->viewAttributes() ?>>
<?= $Page->DualMarkerDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
    <tr id="r_DualMarkerINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerINHOUSE"><?= $Page->DualMarkerINHOUSE->caption() ?></span></td>
        <td data-name="DualMarkerINHOUSE" <?= $Page->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarkerINHOUSE">
<span<?= $Page->DualMarkerINHOUSE->viewAttributes() ?>>
<?= $Page->DualMarkerINHOUSE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
    <tr id="r_DualMarkerREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DualMarkerREPORT"><?= $Page->DualMarkerREPORT->caption() ?></span></td>
        <td data-name="DualMarkerREPORT" <?= $Page->DualMarkerREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarkerREPORT">
<span<?= $Page->DualMarkerREPORT->viewAttributes() ?>>
<?= $Page->DualMarkerREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
    <tr id="r_Quadruple">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Quadruple"><?= $Page->Quadruple->caption() ?></span></td>
        <td data-name="Quadruple" <?= $Page->Quadruple->cellAttributes() ?>>
<span id="el_patient_an_registration_Quadruple">
<span<?= $Page->Quadruple->viewAttributes() ?>>
<?= $Page->Quadruple->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
    <tr id="r_QuadrupleDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleDATE"><?= $Page->QuadrupleDATE->caption() ?></span></td>
        <td data-name="QuadrupleDATE" <?= $Page->QuadrupleDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_QuadrupleDATE">
<span<?= $Page->QuadrupleDATE->viewAttributes() ?>>
<?= $Page->QuadrupleDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
    <tr id="r_QuadrupleINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleINHOUSE"><?= $Page->QuadrupleINHOUSE->caption() ?></span></td>
        <td data-name="QuadrupleINHOUSE" <?= $Page->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_QuadrupleINHOUSE">
<span<?= $Page->QuadrupleINHOUSE->viewAttributes() ?>>
<?= $Page->QuadrupleINHOUSE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
    <tr id="r_QuadrupleREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_QuadrupleREPORT"><?= $Page->QuadrupleREPORT->caption() ?></span></td>
        <td data-name="QuadrupleREPORT" <?= $Page->QuadrupleREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_QuadrupleREPORT">
<span<?= $Page->QuadrupleREPORT->viewAttributes() ?>>
<?= $Page->QuadrupleREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
    <tr id="r_A5month">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5month"><?= $Page->A5month->caption() ?></span></td>
        <td data-name="A5month" <?= $Page->A5month->cellAttributes() ?>>
<span id="el_patient_an_registration_A5month">
<span<?= $Page->A5month->viewAttributes() ?>>
<?= $Page->A5month->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
    <tr id="r_A5monthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthDATE"><?= $Page->A5monthDATE->caption() ?></span></td>
        <td data-name="A5monthDATE" <?= $Page->A5monthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_A5monthDATE">
<span<?= $Page->A5monthDATE->viewAttributes() ?>>
<?= $Page->A5monthDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
    <tr id="r_A5monthINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthINHOUSE"><?= $Page->A5monthINHOUSE->caption() ?></span></td>
        <td data-name="A5monthINHOUSE" <?= $Page->A5monthINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_A5monthINHOUSE">
<span<?= $Page->A5monthINHOUSE->viewAttributes() ?>>
<?= $Page->A5monthINHOUSE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A5monthREPORT->Visible) { // A5monthREPORT ?>
    <tr id="r_A5monthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A5monthREPORT"><?= $Page->A5monthREPORT->caption() ?></span></td>
        <td data-name="A5monthREPORT" <?= $Page->A5monthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_A5monthREPORT">
<span<?= $Page->A5monthREPORT->viewAttributes() ?>>
<?= $Page->A5monthREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
    <tr id="r_A7month">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7month"><?= $Page->A7month->caption() ?></span></td>
        <td data-name="A7month" <?= $Page->A7month->cellAttributes() ?>>
<span id="el_patient_an_registration_A7month">
<span<?= $Page->A7month->viewAttributes() ?>>
<?= $Page->A7month->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
    <tr id="r_A7monthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthDATE"><?= $Page->A7monthDATE->caption() ?></span></td>
        <td data-name="A7monthDATE" <?= $Page->A7monthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_A7monthDATE">
<span<?= $Page->A7monthDATE->viewAttributes() ?>>
<?= $Page->A7monthDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
    <tr id="r_A7monthINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthINHOUSE"><?= $Page->A7monthINHOUSE->caption() ?></span></td>
        <td data-name="A7monthINHOUSE" <?= $Page->A7monthINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_A7monthINHOUSE">
<span<?= $Page->A7monthINHOUSE->viewAttributes() ?>>
<?= $Page->A7monthINHOUSE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A7monthREPORT->Visible) { // A7monthREPORT ?>
    <tr id="r_A7monthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A7monthREPORT"><?= $Page->A7monthREPORT->caption() ?></span></td>
        <td data-name="A7monthREPORT" <?= $Page->A7monthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_A7monthREPORT">
<span<?= $Page->A7monthREPORT->viewAttributes() ?>>
<?= $Page->A7monthREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
    <tr id="r_A9month">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9month"><?= $Page->A9month->caption() ?></span></td>
        <td data-name="A9month" <?= $Page->A9month->cellAttributes() ?>>
<span id="el_patient_an_registration_A9month">
<span<?= $Page->A9month->viewAttributes() ?>>
<?= $Page->A9month->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
    <tr id="r_A9monthDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthDATE"><?= $Page->A9monthDATE->caption() ?></span></td>
        <td data-name="A9monthDATE" <?= $Page->A9monthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_A9monthDATE">
<span<?= $Page->A9monthDATE->viewAttributes() ?>>
<?= $Page->A9monthDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
    <tr id="r_A9monthINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthINHOUSE"><?= $Page->A9monthINHOUSE->caption() ?></span></td>
        <td data-name="A9monthINHOUSE" <?= $Page->A9monthINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_A9monthINHOUSE">
<span<?= $Page->A9monthINHOUSE->viewAttributes() ?>>
<?= $Page->A9monthINHOUSE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A9monthREPORT->Visible) { // A9monthREPORT ?>
    <tr id="r_A9monthREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_A9monthREPORT"><?= $Page->A9monthREPORT->caption() ?></span></td>
        <td data-name="A9monthREPORT" <?= $Page->A9monthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_A9monthREPORT">
<span<?= $Page->A9monthREPORT->viewAttributes() ?>>
<?= $Page->A9monthREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
    <tr id="r_INJ">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJ"><?= $Page->INJ->caption() ?></span></td>
        <td data-name="INJ" <?= $Page->INJ->cellAttributes() ?>>
<span id="el_patient_an_registration_INJ">
<span<?= $Page->INJ->viewAttributes() ?>>
<?= $Page->INJ->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
    <tr id="r_INJDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJDATE"><?= $Page->INJDATE->caption() ?></span></td>
        <td data-name="INJDATE" <?= $Page->INJDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_INJDATE">
<span<?= $Page->INJDATE->viewAttributes() ?>>
<?= $Page->INJDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
    <tr id="r_INJINHOUSE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJINHOUSE"><?= $Page->INJINHOUSE->caption() ?></span></td>
        <td data-name="INJINHOUSE" <?= $Page->INJINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_INJINHOUSE">
<span<?= $Page->INJINHOUSE->viewAttributes() ?>>
<?= $Page->INJINHOUSE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->INJREPORT->Visible) { // INJREPORT ?>
    <tr id="r_INJREPORT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_INJREPORT"><?= $Page->INJREPORT->caption() ?></span></td>
        <td data-name="INJREPORT" <?= $Page->INJREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_INJREPORT">
<span<?= $Page->INJREPORT->viewAttributes() ?>>
<?= $Page->INJREPORT->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
    <tr id="r_Bleeding">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Bleeding"><?= $Page->Bleeding->caption() ?></span></td>
        <td data-name="Bleeding" <?= $Page->Bleeding->cellAttributes() ?>>
<span id="el_patient_an_registration_Bleeding">
<span<?= $Page->Bleeding->viewAttributes() ?>>
<?= $Page->Bleeding->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
    <tr id="r_Hypothyroidism">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Hypothyroidism"><?= $Page->Hypothyroidism->caption() ?></span></td>
        <td data-name="Hypothyroidism" <?= $Page->Hypothyroidism->cellAttributes() ?>>
<span id="el_patient_an_registration_Hypothyroidism">
<span<?= $Page->Hypothyroidism->viewAttributes() ?>>
<?= $Page->Hypothyroidism->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
    <tr id="r_PICMENumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PICMENumber"><?= $Page->PICMENumber->caption() ?></span></td>
        <td data-name="PICMENumber" <?= $Page->PICMENumber->cellAttributes() ?>>
<span id="el_patient_an_registration_PICMENumber">
<span<?= $Page->PICMENumber->viewAttributes() ?>>
<?= $Page->PICMENumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
    <tr id="r_Outcome">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Outcome"><?= $Page->Outcome->caption() ?></span></td>
        <td data-name="Outcome" <?= $Page->Outcome->cellAttributes() ?>>
<span id="el_patient_an_registration_Outcome">
<span<?= $Page->Outcome->viewAttributes() ?>>
<?= $Page->Outcome->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <tr id="r_DateofAdmission">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateofAdmission"><?= $Page->DateofAdmission->caption() ?></span></td>
        <td data-name="DateofAdmission" <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el_patient_an_registration_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
    <tr id="r_DateodProcedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_DateodProcedure"><?= $Page->DateodProcedure->caption() ?></span></td>
        <td data-name="DateodProcedure" <?= $Page->DateodProcedure->cellAttributes() ?>>
<span id="el_patient_an_registration_DateodProcedure">
<span<?= $Page->DateodProcedure->viewAttributes() ?>>
<?= $Page->DateodProcedure->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <tr id="r_Miscarriage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Miscarriage"><?= $Page->Miscarriage->caption() ?></span></td>
        <td data-name="Miscarriage" <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el_patient_an_registration_Miscarriage">
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
    <tr id="r_ModeOfDelivery">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ModeOfDelivery"><?= $Page->ModeOfDelivery->caption() ?></span></td>
        <td data-name="ModeOfDelivery" <?= $Page->ModeOfDelivery->cellAttributes() ?>>
<span id="el_patient_an_registration_ModeOfDelivery">
<span<?= $Page->ModeOfDelivery->viewAttributes() ?>>
<?= $Page->ModeOfDelivery->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
    <tr id="r_ND">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ND"><?= $Page->ND->caption() ?></span></td>
        <td data-name="ND" <?= $Page->ND->cellAttributes() ?>>
<span id="el_patient_an_registration_ND">
<span<?= $Page->ND->viewAttributes() ?>>
<?= $Page->ND->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
    <tr id="r_NDS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDS"><?= $Page->NDS->caption() ?></span></td>
        <td data-name="NDS" <?= $Page->NDS->cellAttributes() ?>>
<span id="el_patient_an_registration_NDS">
<span<?= $Page->NDS->viewAttributes() ?>>
<?= $Page->NDS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
    <tr id="r_NDP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NDP"><?= $Page->NDP->caption() ?></span></td>
        <td data-name="NDP" <?= $Page->NDP->cellAttributes() ?>>
<span id="el_patient_an_registration_NDP">
<span<?= $Page->NDP->viewAttributes() ?>>
<?= $Page->NDP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
    <tr id="r_Vaccum">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Vaccum"><?= $Page->Vaccum->caption() ?></span></td>
        <td data-name="Vaccum" <?= $Page->Vaccum->cellAttributes() ?>>
<span id="el_patient_an_registration_Vaccum">
<span<?= $Page->Vaccum->viewAttributes() ?>>
<?= $Page->Vaccum->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
    <tr id="r_VaccumS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumS"><?= $Page->VaccumS->caption() ?></span></td>
        <td data-name="VaccumS" <?= $Page->VaccumS->cellAttributes() ?>>
<span id="el_patient_an_registration_VaccumS">
<span<?= $Page->VaccumS->viewAttributes() ?>>
<?= $Page->VaccumS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
    <tr id="r_VaccumP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_VaccumP"><?= $Page->VaccumP->caption() ?></span></td>
        <td data-name="VaccumP" <?= $Page->VaccumP->cellAttributes() ?>>
<span id="el_patient_an_registration_VaccumP">
<span<?= $Page->VaccumP->viewAttributes() ?>>
<?= $Page->VaccumP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
    <tr id="r_Forceps">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Forceps"><?= $Page->Forceps->caption() ?></span></td>
        <td data-name="Forceps" <?= $Page->Forceps->cellAttributes() ?>>
<span id="el_patient_an_registration_Forceps">
<span<?= $Page->Forceps->viewAttributes() ?>>
<?= $Page->Forceps->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
    <tr id="r_ForcepsS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsS"><?= $Page->ForcepsS->caption() ?></span></td>
        <td data-name="ForcepsS" <?= $Page->ForcepsS->cellAttributes() ?>>
<span id="el_patient_an_registration_ForcepsS">
<span<?= $Page->ForcepsS->viewAttributes() ?>>
<?= $Page->ForcepsS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
    <tr id="r_ForcepsP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ForcepsP"><?= $Page->ForcepsP->caption() ?></span></td>
        <td data-name="ForcepsP" <?= $Page->ForcepsP->cellAttributes() ?>>
<span id="el_patient_an_registration_ForcepsP">
<span<?= $Page->ForcepsP->viewAttributes() ?>>
<?= $Page->ForcepsP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
    <tr id="r_Elective">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Elective"><?= $Page->Elective->caption() ?></span></td>
        <td data-name="Elective" <?= $Page->Elective->cellAttributes() ?>>
<span id="el_patient_an_registration_Elective">
<span<?= $Page->Elective->viewAttributes() ?>>
<?= $Page->Elective->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
    <tr id="r_ElectiveS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveS"><?= $Page->ElectiveS->caption() ?></span></td>
        <td data-name="ElectiveS" <?= $Page->ElectiveS->cellAttributes() ?>>
<span id="el_patient_an_registration_ElectiveS">
<span<?= $Page->ElectiveS->viewAttributes() ?>>
<?= $Page->ElectiveS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
    <tr id="r_ElectiveP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ElectiveP"><?= $Page->ElectiveP->caption() ?></span></td>
        <td data-name="ElectiveP" <?= $Page->ElectiveP->cellAttributes() ?>>
<span id="el_patient_an_registration_ElectiveP">
<span<?= $Page->ElectiveP->viewAttributes() ?>>
<?= $Page->ElectiveP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
    <tr id="r_Emergency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Emergency"><?= $Page->Emergency->caption() ?></span></td>
        <td data-name="Emergency" <?= $Page->Emergency->cellAttributes() ?>>
<span id="el_patient_an_registration_Emergency">
<span<?= $Page->Emergency->viewAttributes() ?>>
<?= $Page->Emergency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
    <tr id="r_EmergencyS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyS"><?= $Page->EmergencyS->caption() ?></span></td>
        <td data-name="EmergencyS" <?= $Page->EmergencyS->cellAttributes() ?>>
<span id="el_patient_an_registration_EmergencyS">
<span<?= $Page->EmergencyS->viewAttributes() ?>>
<?= $Page->EmergencyS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
    <tr id="r_EmergencyP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_EmergencyP"><?= $Page->EmergencyP->caption() ?></span></td>
        <td data-name="EmergencyP" <?= $Page->EmergencyP->cellAttributes() ?>>
<span id="el_patient_an_registration_EmergencyP">
<span<?= $Page->EmergencyP->viewAttributes() ?>>
<?= $Page->EmergencyP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
    <tr id="r_Maturity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Maturity"><?= $Page->Maturity->caption() ?></span></td>
        <td data-name="Maturity" <?= $Page->Maturity->cellAttributes() ?>>
<span id="el_patient_an_registration_Maturity">
<span<?= $Page->Maturity->viewAttributes() ?>>
<?= $Page->Maturity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
    <tr id="r_Baby1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby1"><?= $Page->Baby1->caption() ?></span></td>
        <td data-name="Baby1" <?= $Page->Baby1->cellAttributes() ?>>
<span id="el_patient_an_registration_Baby1">
<span<?= $Page->Baby1->viewAttributes() ?>>
<?= $Page->Baby1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
    <tr id="r_Baby2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Baby2"><?= $Page->Baby2->caption() ?></span></td>
        <td data-name="Baby2" <?= $Page->Baby2->cellAttributes() ?>>
<span id="el_patient_an_registration_Baby2">
<span<?= $Page->Baby2->viewAttributes() ?>>
<?= $Page->Baby2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
    <tr id="r_sex1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex1"><?= $Page->sex1->caption() ?></span></td>
        <td data-name="sex1" <?= $Page->sex1->cellAttributes() ?>>
<span id="el_patient_an_registration_sex1">
<span<?= $Page->sex1->viewAttributes() ?>>
<?= $Page->sex1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
    <tr id="r_sex2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_sex2"><?= $Page->sex2->caption() ?></span></td>
        <td data-name="sex2" <?= $Page->sex2->cellAttributes() ?>>
<span id="el_patient_an_registration_sex2">
<span<?= $Page->sex2->viewAttributes() ?>>
<?= $Page->sex2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
    <tr id="r_weight1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight1"><?= $Page->weight1->caption() ?></span></td>
        <td data-name="weight1" <?= $Page->weight1->cellAttributes() ?>>
<span id="el_patient_an_registration_weight1">
<span<?= $Page->weight1->viewAttributes() ?>>
<?= $Page->weight1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
    <tr id="r_weight2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_weight2"><?= $Page->weight2->caption() ?></span></td>
        <td data-name="weight2" <?= $Page->weight2->cellAttributes() ?>>
<span id="el_patient_an_registration_weight2">
<span<?= $Page->weight2->viewAttributes() ?>>
<?= $Page->weight2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
    <tr id="r_NICU1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU1"><?= $Page->NICU1->caption() ?></span></td>
        <td data-name="NICU1" <?= $Page->NICU1->cellAttributes() ?>>
<span id="el_patient_an_registration_NICU1">
<span<?= $Page->NICU1->viewAttributes() ?>>
<?= $Page->NICU1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
    <tr id="r_NICU2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_NICU2"><?= $Page->NICU2->caption() ?></span></td>
        <td data-name="NICU2" <?= $Page->NICU2->cellAttributes() ?>>
<span id="el_patient_an_registration_NICU2">
<span<?= $Page->NICU2->viewAttributes() ?>>
<?= $Page->NICU2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
    <tr id="r_Jaundice1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice1"><?= $Page->Jaundice1->caption() ?></span></td>
        <td data-name="Jaundice1" <?= $Page->Jaundice1->cellAttributes() ?>>
<span id="el_patient_an_registration_Jaundice1">
<span<?= $Page->Jaundice1->viewAttributes() ?>>
<?= $Page->Jaundice1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
    <tr id="r_Jaundice2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Jaundice2"><?= $Page->Jaundice2->caption() ?></span></td>
        <td data-name="Jaundice2" <?= $Page->Jaundice2->cellAttributes() ?>>
<span id="el_patient_an_registration_Jaundice2">
<span<?= $Page->Jaundice2->viewAttributes() ?>>
<?= $Page->Jaundice2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <tr id="r_Others1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others1"><?= $Page->Others1->caption() ?></span></td>
        <td data-name="Others1" <?= $Page->Others1->cellAttributes() ?>>
<span id="el_patient_an_registration_Others1">
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <tr id="r_Others2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_Others2"><?= $Page->Others2->caption() ?></span></td>
        <td data-name="Others2" <?= $Page->Others2->cellAttributes() ?>>
<span id="el_patient_an_registration_Others2">
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
    <tr id="r_SpillOverReasons">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_SpillOverReasons"><?= $Page->SpillOverReasons->caption() ?></span></td>
        <td data-name="SpillOverReasons" <?= $Page->SpillOverReasons->cellAttributes() ?>>
<span id="el_patient_an_registration_SpillOverReasons">
<span<?= $Page->SpillOverReasons->viewAttributes() ?>>
<?= $Page->SpillOverReasons->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
    <tr id="r_ANClosed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosed"><?= $Page->ANClosed->caption() ?></span></td>
        <td data-name="ANClosed" <?= $Page->ANClosed->cellAttributes() ?>>
<span id="el_patient_an_registration_ANClosed">
<span<?= $Page->ANClosed->viewAttributes() ?>>
<?= $Page->ANClosed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
    <tr id="r_ANClosedDATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ANClosedDATE"><?= $Page->ANClosedDATE->caption() ?></span></td>
        <td data-name="ANClosedDATE" <?= $Page->ANClosedDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_ANClosedDATE">
<span<?= $Page->ANClosedDATE->viewAttributes() ?>>
<?= $Page->ANClosedDATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
    <tr id="r_PastMedicalHistoryOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastMedicalHistoryOthers"><?= $Page->PastMedicalHistoryOthers->caption() ?></span></td>
        <td data-name="PastMedicalHistoryOthers" <?= $Page->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_PastMedicalHistoryOthers">
<span<?= $Page->PastMedicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastMedicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
    <tr id="r_PastSurgicalHistoryOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PastSurgicalHistoryOthers"><?= $Page->PastSurgicalHistoryOthers->caption() ?></span></td>
        <td data-name="PastSurgicalHistoryOthers" <?= $Page->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<span<?= $Page->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastSurgicalHistoryOthers->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
    <tr id="r_FamilyHistoryOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_FamilyHistoryOthers"><?= $Page->FamilyHistoryOthers->caption() ?></span></td>
        <td data-name="FamilyHistoryOthers" <?= $Page->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_FamilyHistoryOthers">
<span<?= $Page->FamilyHistoryOthers->viewAttributes() ?>>
<?= $Page->FamilyHistoryOthers->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
    <tr id="r_PresentPregnancyComplicationsOthers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_PresentPregnancyComplicationsOthers"><?= $Page->PresentPregnancyComplicationsOthers->caption() ?></span></td>
        <td data-name="PresentPregnancyComplicationsOthers" <?= $Page->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<span<?= $Page->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?= $Page->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
    <tr id="r_ETdate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_an_registration_ETdate"><?= $Page->ETdate->caption() ?></span></td>
        <td data-name="ETdate" <?= $Page->ETdate->cellAttributes() ?>>
<span id="el_patient_an_registration_ETdate">
<span<?= $Page->ETdate->viewAttributes() ?>>
<?= $Page->ETdate->getViewValue() ?></span>
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
