<?php

namespace PHPMaker2021\project3;

// Page object
$PatientOtSurgeryRegisterView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_ot_surgery_registerview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_ot_surgery_registerview = currentForm = new ew.Form("fpatient_ot_surgery_registerview", "view");
    loadjs.done("fpatient_ot_surgery_registerview");
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
<form name="fpatient_ot_surgery_registerview" id="fpatient_ot_surgery_registerview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <tr id="r_PId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PId"><?= $Page->PId->caption() ?></span></td>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->diagnosis->Visible) { // diagnosis ?>
    <tr id="r_diagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_diagnosis"><?= $Page->diagnosis->caption() ?></span></td>
        <td data-name="diagnosis" <?= $Page->diagnosis->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_diagnosis">
<span<?= $Page->diagnosis->viewAttributes() ?>>
<?= $Page->diagnosis->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->proposedSurgery->Visible) { // proposedSurgery ?>
    <tr id="r_proposedSurgery">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_proposedSurgery"><?= $Page->proposedSurgery->caption() ?></span></td>
        <td data-name="proposedSurgery" <?= $Page->proposedSurgery->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_proposedSurgery">
<span<?= $Page->proposedSurgery->viewAttributes() ?>>
<?= $Page->proposedSurgery->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->surgeryProcedure->Visible) { // surgeryProcedure ?>
    <tr id="r_surgeryProcedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_surgeryProcedure"><?= $Page->surgeryProcedure->caption() ?></span></td>
        <td data-name="surgeryProcedure" <?= $Page->surgeryProcedure->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_surgeryProcedure">
<span<?= $Page->surgeryProcedure->viewAttributes() ?>>
<?= $Page->surgeryProcedure->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
    <tr id="r_typeOfAnaesthesia">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_typeOfAnaesthesia"><?= $Page->typeOfAnaesthesia->caption() ?></span></td>
        <td data-name="typeOfAnaesthesia" <?= $Page->typeOfAnaesthesia->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_typeOfAnaesthesia">
<span<?= $Page->typeOfAnaesthesia->viewAttributes() ?>>
<?= $Page->typeOfAnaesthesia->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
    <tr id="r_RecievedTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_RecievedTime"><?= $Page->RecievedTime->caption() ?></span></td>
        <td data-name="RecievedTime" <?= $Page->RecievedTime->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_RecievedTime">
<span<?= $Page->RecievedTime->viewAttributes() ?>>
<?= $Page->RecievedTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
    <tr id="r_AnaesthesiaStarted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaStarted"><?= $Page->AnaesthesiaStarted->caption() ?></span></td>
        <td data-name="AnaesthesiaStarted" <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_AnaesthesiaStarted">
<span<?= $Page->AnaesthesiaStarted->viewAttributes() ?>>
<?= $Page->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
    <tr id="r_AnaesthesiaEnded">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AnaesthesiaEnded"><?= $Page->AnaesthesiaEnded->caption() ?></span></td>
        <td data-name="AnaesthesiaEnded" <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_AnaesthesiaEnded">
<span<?= $Page->AnaesthesiaEnded->viewAttributes() ?>>
<?= $Page->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
    <tr id="r_surgeryStarted">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_surgeryStarted"><?= $Page->surgeryStarted->caption() ?></span></td>
        <td data-name="surgeryStarted" <?= $Page->surgeryStarted->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_surgeryStarted">
<span<?= $Page->surgeryStarted->viewAttributes() ?>>
<?= $Page->surgeryStarted->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
    <tr id="r_surgeryEnded">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_surgeryEnded"><?= $Page->surgeryEnded->caption() ?></span></td>
        <td data-name="surgeryEnded" <?= $Page->surgeryEnded->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_surgeryEnded">
<span<?= $Page->surgeryEnded->viewAttributes() ?>>
<?= $Page->surgeryEnded->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
    <tr id="r_RecoveryTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_RecoveryTime"><?= $Page->RecoveryTime->caption() ?></span></td>
        <td data-name="RecoveryTime" <?= $Page->RecoveryTime->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_RecoveryTime">
<span<?= $Page->RecoveryTime->viewAttributes() ?>>
<?= $Page->RecoveryTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
    <tr id="r_ShiftedTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_ShiftedTime"><?= $Page->ShiftedTime->caption() ?></span></td>
        <td data-name="ShiftedTime" <?= $Page->ShiftedTime->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_ShiftedTime">
<span<?= $Page->ShiftedTime->viewAttributes() ?>>
<?= $Page->ShiftedTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <tr id="r_Duration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Duration"><?= $Page->Duration->caption() ?></span></td>
        <td data-name="Duration" <?= $Page->Duration->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <tr id="r_Surgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Surgeon"><?= $Page->Surgeon->caption() ?></span></td>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <tr id="r_Anaesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Anaesthetist"><?= $Page->Anaesthetist->caption() ?></span></td>
        <td data-name="Anaesthetist" <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
    <tr id="r_AsstSurgeon1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon1"><?= $Page->AsstSurgeon1->caption() ?></span></td>
        <td data-name="AsstSurgeon1" <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_AsstSurgeon1">
<span<?= $Page->AsstSurgeon1->viewAttributes() ?>>
<?= $Page->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
    <tr id="r_AsstSurgeon2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_AsstSurgeon2"><?= $Page->AsstSurgeon2->caption() ?></span></td>
        <td data-name="AsstSurgeon2" <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_AsstSurgeon2">
<span<?= $Page->AsstSurgeon2->viewAttributes() ?>>
<?= $Page->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
    <tr id="r_paediatric">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_paediatric"><?= $Page->paediatric->caption() ?></span></td>
        <td data-name="paediatric" <?= $Page->paediatric->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_paediatric">
<span<?= $Page->paediatric->viewAttributes() ?>>
<?= $Page->paediatric->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
    <tr id="r_ScrubNurse1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse1"><?= $Page->ScrubNurse1->caption() ?></span></td>
        <td data-name="ScrubNurse1" <?= $Page->ScrubNurse1->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_ScrubNurse1">
<span<?= $Page->ScrubNurse1->viewAttributes() ?>>
<?= $Page->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
    <tr id="r_ScrubNurse2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_ScrubNurse2"><?= $Page->ScrubNurse2->caption() ?></span></td>
        <td data-name="ScrubNurse2" <?= $Page->ScrubNurse2->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_ScrubNurse2">
<span<?= $Page->ScrubNurse2->viewAttributes() ?>>
<?= $Page->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
    <tr id="r_FloorNurse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_FloorNurse"><?= $Page->FloorNurse->caption() ?></span></td>
        <td data-name="FloorNurse" <?= $Page->FloorNurse->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_FloorNurse">
<span<?= $Page->FloorNurse->viewAttributes() ?>>
<?= $Page->FloorNurse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
    <tr id="r_Technician">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_Technician"><?= $Page->Technician->caption() ?></span></td>
        <td data-name="Technician" <?= $Page->Technician->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_Technician">
<span<?= $Page->Technician->viewAttributes() ?>>
<?= $Page->Technician->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
    <tr id="r_HouseKeeping">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_HouseKeeping"><?= $Page->HouseKeeping->caption() ?></span></td>
        <td data-name="HouseKeeping" <?= $Page->HouseKeeping->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_HouseKeeping">
<span<?= $Page->HouseKeeping->viewAttributes() ?>>
<?= $Page->HouseKeeping->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
    <tr id="r_countsCheckedMops">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_countsCheckedMops"><?= $Page->countsCheckedMops->caption() ?></span></td>
        <td data-name="countsCheckedMops" <?= $Page->countsCheckedMops->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_countsCheckedMops">
<span<?= $Page->countsCheckedMops->viewAttributes() ?>>
<?= $Page->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
    <tr id="r_gauze">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_gauze"><?= $Page->gauze->caption() ?></span></td>
        <td data-name="gauze" <?= $Page->gauze->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_gauze">
<span<?= $Page->gauze->viewAttributes() ?>>
<?= $Page->gauze->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
    <tr id="r_needles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_needles"><?= $Page->needles->caption() ?></span></td>
        <td data-name="needles" <?= $Page->needles->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_needles">
<span<?= $Page->needles->viewAttributes() ?>>
<?= $Page->needles->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
    <tr id="r_bloodloss">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_bloodloss"><?= $Page->bloodloss->caption() ?></span></td>
        <td data-name="bloodloss" <?= $Page->bloodloss->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_bloodloss">
<span<?= $Page->bloodloss->viewAttributes() ?>>
<?= $Page->bloodloss->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
    <tr id="r_bloodtransfusion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_bloodtransfusion"><?= $Page->bloodtransfusion->caption() ?></span></td>
        <td data-name="bloodtransfusion" <?= $Page->bloodtransfusion->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_bloodtransfusion">
<span<?= $Page->bloodtransfusion->viewAttributes() ?>>
<?= $Page->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->implantsUsed->Visible) { // implantsUsed ?>
    <tr id="r_implantsUsed">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_implantsUsed"><?= $Page->implantsUsed->caption() ?></span></td>
        <td data-name="implantsUsed" <?= $Page->implantsUsed->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_implantsUsed">
<span<?= $Page->implantsUsed->viewAttributes() ?>>
<?= $Page->implantsUsed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
    <tr id="r_MaterialsForHPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_MaterialsForHPE"><?= $Page->MaterialsForHPE->caption() ?></span></td>
        <td data-name="MaterialsForHPE" <?= $Page->MaterialsForHPE->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_MaterialsForHPE">
<span<?= $Page->MaterialsForHPE->viewAttributes() ?>>
<?= $Page->MaterialsForHPE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_ot_surgery_register_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_ot_surgery_register_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
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
