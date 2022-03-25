<?php

namespace PHPMaker2021\project3;

// Page object
$PatientOtDeliveryRegisterDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_ot_delivery_registerdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fpatient_ot_delivery_registerdelete = currentForm = new ew.Form("fpatient_ot_delivery_registerdelete", "delete");
    loadjs.done("fpatient_ot_delivery_registerdelete");
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
<form name="fpatient_ot_delivery_registerdelete" id="fpatient_ot_delivery_registerdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <th class="<?= $Page->PId->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><?= $Page->PId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ObstetricsHistryMale->Visible) { // ObstetricsHistryMale ?>
        <th class="<?= $Page->ObstetricsHistryMale->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ObstetricsHistryMale" class="patient_ot_delivery_register_ObstetricsHistryMale"><?= $Page->ObstetricsHistryMale->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <th class="<?= $Page->ObstetricsHistryFeMale->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><?= $Page->ObstetricsHistryFeMale->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
        <th class="<?= $Page->Abortion->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><?= $Page->Abortion->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <th class="<?= $Page->ChildBirthDate->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><?= $Page->ChildBirthDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <th class="<?= $Page->ChildBirthTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><?= $Page->ChildBirthTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
        <th class="<?= $Page->ChildSex->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><?= $Page->ChildSex->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
        <th class="<?= $Page->ChildWt->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><?= $Page->ChildWt->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
        <th class="<?= $Page->ChildDay->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><?= $Page->ChildDay->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
        <th class="<?= $Page->ChildOE->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><?= $Page->ChildOE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <th class="<?= $Page->ChildBlGrp->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><?= $Page->ChildBlGrp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
        <th class="<?= $Page->ApgarScore->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><?= $Page->ApgarScore->caption() ?></span></th>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
        <th class="<?= $Page->birthnotification->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><?= $Page->birthnotification->caption() ?></span></th>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
        <th class="<?= $Page->formno->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><?= $Page->formno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <th class="<?= $Page->ChildBirthDate1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><?= $Page->ChildBirthDate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <th class="<?= $Page->ChildBirthTime1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><?= $Page->ChildBirthTime1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
        <th class="<?= $Page->ChildSex1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><?= $Page->ChildSex1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
        <th class="<?= $Page->ChildWt1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><?= $Page->ChildWt1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
        <th class="<?= $Page->ChildDay1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><?= $Page->ChildDay1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
        <th class="<?= $Page->ChildOE1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><?= $Page->ChildOE1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <th class="<?= $Page->ChildBlGrp1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><?= $Page->ChildBlGrp1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
        <th class="<?= $Page->ApgarScore1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><?= $Page->ApgarScore1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
        <th class="<?= $Page->birthnotification1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><?= $Page->birthnotification1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
        <th class="<?= $Page->formno1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><?= $Page->formno1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
        <th class="<?= $Page->RecievedTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><?= $Page->RecievedTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <th class="<?= $Page->AnaesthesiaStarted->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><?= $Page->AnaesthesiaStarted->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <th class="<?= $Page->AnaesthesiaEnded->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><?= $Page->AnaesthesiaEnded->caption() ?></span></th>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
        <th class="<?= $Page->surgeryStarted->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><?= $Page->surgeryStarted->caption() ?></span></th>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
        <th class="<?= $Page->surgeryEnded->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><?= $Page->surgeryEnded->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
        <th class="<?= $Page->RecoveryTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><?= $Page->RecoveryTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
        <th class="<?= $Page->ShiftedTime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><?= $Page->ShiftedTime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <th class="<?= $Page->Duration->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><?= $Page->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <th class="<?= $Page->Surgeon->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><?= $Page->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <th class="<?= $Page->Anaesthetist->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><?= $Page->Anaesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <th class="<?= $Page->AsstSurgeon1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><?= $Page->AsstSurgeon1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <th class="<?= $Page->AsstSurgeon2->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><?= $Page->AsstSurgeon2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
        <th class="<?= $Page->paediatric->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><?= $Page->paediatric->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <th class="<?= $Page->ScrubNurse1->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><?= $Page->ScrubNurse1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <th class="<?= $Page->ScrubNurse2->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><?= $Page->ScrubNurse2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
        <th class="<?= $Page->FloorNurse->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><?= $Page->FloorNurse->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
        <th class="<?= $Page->Technician->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><?= $Page->Technician->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
        <th class="<?= $Page->HouseKeeping->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><?= $Page->HouseKeeping->caption() ?></span></th>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <th class="<?= $Page->countsCheckedMops->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><?= $Page->countsCheckedMops->caption() ?></span></th>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
        <th class="<?= $Page->gauze->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><?= $Page->gauze->caption() ?></span></th>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
        <th class="<?= $Page->needles->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><?= $Page->needles->caption() ?></span></th>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
        <th class="<?= $Page->bloodloss->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><?= $Page->bloodloss->caption() ?></span></th>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <th class="<?= $Page->bloodtransfusion->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><?= $Page->bloodtransfusion->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
        <th class="<?= $Page->dte->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><?= $Page->dte->caption() ?></span></th>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
        <th class="<?= $Page->motherReligion->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><?= $Page->motherReligion->caption() ?></span></th>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
        <th class="<?= $Page->bloodgroup->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><?= $Page->bloodgroup->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><?= $Page->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><span id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <td <?= $Page->PId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ObstetricsHistryMale->Visible) { // ObstetricsHistryMale ?>
        <td <?= $Page->ObstetricsHistryMale->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryMale" class="patient_ot_delivery_register_ObstetricsHistryMale">
<span<?= $Page->ObstetricsHistryMale->viewAttributes() ?>>
<?= $Page->ObstetricsHistryMale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <td <?= $Page->ObstetricsHistryFeMale->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?= $Page->ObstetricsHistryFeMale->viewAttributes() ?>>
<?= $Page->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
        <td <?= $Page->Abortion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion">
<span<?= $Page->Abortion->viewAttributes() ?>>
<?= $Page->Abortion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <td <?= $Page->ChildBirthDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate">
<span<?= $Page->ChildBirthDate->viewAttributes() ?>>
<?= $Page->ChildBirthDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <td <?= $Page->ChildBirthTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime">
<span<?= $Page->ChildBirthTime->viewAttributes() ?>>
<?= $Page->ChildBirthTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
        <td <?= $Page->ChildSex->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex">
<span<?= $Page->ChildSex->viewAttributes() ?>>
<?= $Page->ChildSex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
        <td <?= $Page->ChildWt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt">
<span<?= $Page->ChildWt->viewAttributes() ?>>
<?= $Page->ChildWt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
        <td <?= $Page->ChildDay->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay">
<span<?= $Page->ChildDay->viewAttributes() ?>>
<?= $Page->ChildDay->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
        <td <?= $Page->ChildOE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE">
<span<?= $Page->ChildOE->viewAttributes() ?>>
<?= $Page->ChildOE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <td <?= $Page->ChildBlGrp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp">
<span<?= $Page->ChildBlGrp->viewAttributes() ?>>
<?= $Page->ChildBlGrp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
        <td <?= $Page->ApgarScore->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore">
<span<?= $Page->ApgarScore->viewAttributes() ?>>
<?= $Page->ApgarScore->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
        <td <?= $Page->birthnotification->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification">
<span<?= $Page->birthnotification->viewAttributes() ?>>
<?= $Page->birthnotification->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
        <td <?= $Page->formno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno">
<span<?= $Page->formno->viewAttributes() ?>>
<?= $Page->formno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <td <?= $Page->ChildBirthDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1">
<span<?= $Page->ChildBirthDate1->viewAttributes() ?>>
<?= $Page->ChildBirthDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <td <?= $Page->ChildBirthTime1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1">
<span<?= $Page->ChildBirthTime1->viewAttributes() ?>>
<?= $Page->ChildBirthTime1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
        <td <?= $Page->ChildSex1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1">
<span<?= $Page->ChildSex1->viewAttributes() ?>>
<?= $Page->ChildSex1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
        <td <?= $Page->ChildWt1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1">
<span<?= $Page->ChildWt1->viewAttributes() ?>>
<?= $Page->ChildWt1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
        <td <?= $Page->ChildDay1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1">
<span<?= $Page->ChildDay1->viewAttributes() ?>>
<?= $Page->ChildDay1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
        <td <?= $Page->ChildOE1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1">
<span<?= $Page->ChildOE1->viewAttributes() ?>>
<?= $Page->ChildOE1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <td <?= $Page->ChildBlGrp1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1">
<span<?= $Page->ChildBlGrp1->viewAttributes() ?>>
<?= $Page->ChildBlGrp1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
        <td <?= $Page->ApgarScore1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1">
<span<?= $Page->ApgarScore1->viewAttributes() ?>>
<?= $Page->ApgarScore1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
        <td <?= $Page->birthnotification1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1">
<span<?= $Page->birthnotification1->viewAttributes() ?>>
<?= $Page->birthnotification1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
        <td <?= $Page->formno1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1">
<span<?= $Page->formno1->viewAttributes() ?>>
<?= $Page->formno1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
        <td <?= $Page->RecievedTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime">
<span<?= $Page->RecievedTime->viewAttributes() ?>>
<?= $Page->RecievedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <td <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted">
<span<?= $Page->AnaesthesiaStarted->viewAttributes() ?>>
<?= $Page->AnaesthesiaStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <td <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded">
<span<?= $Page->AnaesthesiaEnded->viewAttributes() ?>>
<?= $Page->AnaesthesiaEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
        <td <?= $Page->surgeryStarted->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted">
<span<?= $Page->surgeryStarted->viewAttributes() ?>>
<?= $Page->surgeryStarted->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
        <td <?= $Page->surgeryEnded->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded">
<span<?= $Page->surgeryEnded->viewAttributes() ?>>
<?= $Page->surgeryEnded->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
        <td <?= $Page->RecoveryTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime">
<span<?= $Page->RecoveryTime->viewAttributes() ?>>
<?= $Page->RecoveryTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
        <td <?= $Page->ShiftedTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime">
<span<?= $Page->ShiftedTime->viewAttributes() ?>>
<?= $Page->ShiftedTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <td <?= $Page->Duration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration">
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <td <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <td <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <td <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1">
<span<?= $Page->AsstSurgeon1->viewAttributes() ?>>
<?= $Page->AsstSurgeon1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <td <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2">
<span<?= $Page->AsstSurgeon2->viewAttributes() ?>>
<?= $Page->AsstSurgeon2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
        <td <?= $Page->paediatric->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric">
<span<?= $Page->paediatric->viewAttributes() ?>>
<?= $Page->paediatric->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <td <?= $Page->ScrubNurse1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1">
<span<?= $Page->ScrubNurse1->viewAttributes() ?>>
<?= $Page->ScrubNurse1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <td <?= $Page->ScrubNurse2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2">
<span<?= $Page->ScrubNurse2->viewAttributes() ?>>
<?= $Page->ScrubNurse2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
        <td <?= $Page->FloorNurse->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse">
<span<?= $Page->FloorNurse->viewAttributes() ?>>
<?= $Page->FloorNurse->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
        <td <?= $Page->Technician->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician">
<span<?= $Page->Technician->viewAttributes() ?>>
<?= $Page->Technician->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
        <td <?= $Page->HouseKeeping->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping">
<span<?= $Page->HouseKeeping->viewAttributes() ?>>
<?= $Page->HouseKeeping->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <td <?= $Page->countsCheckedMops->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops">
<span<?= $Page->countsCheckedMops->viewAttributes() ?>>
<?= $Page->countsCheckedMops->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
        <td <?= $Page->gauze->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze">
<span<?= $Page->gauze->viewAttributes() ?>>
<?= $Page->gauze->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
        <td <?= $Page->needles->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles">
<span<?= $Page->needles->viewAttributes() ?>>
<?= $Page->needles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
        <td <?= $Page->bloodloss->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss">
<span<?= $Page->bloodloss->viewAttributes() ?>>
<?= $Page->bloodloss->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <td <?= $Page->bloodtransfusion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion">
<span<?= $Page->bloodtransfusion->viewAttributes() ?>>
<?= $Page->bloodtransfusion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
        <td <?= $Page->dte->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte">
<span<?= $Page->dte->viewAttributes() ?>>
<?= $Page->dte->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
        <td <?= $Page->motherReligion->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion">
<span<?= $Page->motherReligion->viewAttributes() ?>>
<?= $Page->motherReligion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
        <td <?= $Page->bloodgroup->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup">
<span<?= $Page->bloodgroup->viewAttributes() ?>>
<?= $Page->bloodgroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <td <?= $Page->PatID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
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
