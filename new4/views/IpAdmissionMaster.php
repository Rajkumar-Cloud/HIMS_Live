<?php

namespace PHPMaker2021\HIMS;

// Table
$ip_admission = Container("ip_admission");
?>
<?php if ($ip_admission->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ip_admissionmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($ip_admission->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_id"><?= $ip_admission->id->caption() ?></template></td>
            <td <?= $ip_admission->id->cellAttributes() ?>>
<template id="tpx_ip_admission_id"><span id="el_ip_admission_id">
<span<?= $ip_admission->id->viewAttributes() ?>>
<?= $ip_admission->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->mrnNo->Visible) { // mrnNo ?>
        <tr id="r_mrnNo">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_mrnNo"><?= $ip_admission->mrnNo->caption() ?></template></td>
            <td <?= $ip_admission->mrnNo->cellAttributes() ?>>
<template id="tpx_ip_admission_mrnNo"><span id="el_ip_admission_mrnNo">
<span<?= $ip_admission->mrnNo->viewAttributes() ?>>
<?= $ip_admission->mrnNo->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PatientID->Visible) { // PatientID ?>
        <tr id="r_PatientID">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PatientID"><?= $ip_admission->PatientID->caption() ?></template></td>
            <td <?= $ip_admission->PatientID->cellAttributes() ?>>
<template id="tpx_ip_admission_PatientID"><span id="el_ip_admission_PatientID">
<span<?= $ip_admission->PatientID->viewAttributes() ?>>
<?= $ip_admission->PatientID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->patient_name->Visible) { // patient_name ?>
        <tr id="r_patient_name">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_patient_name"><?= $ip_admission->patient_name->caption() ?></template></td>
            <td <?= $ip_admission->patient_name->cellAttributes() ?>>
<template id="tpx_ip_admission_patient_name"><span id="el_ip_admission_patient_name">
<span<?= $ip_admission->patient_name->viewAttributes() ?>>
<?= $ip_admission->patient_name->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->mobileno->Visible) { // mobileno ?>
        <tr id="r_mobileno">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_mobileno"><?= $ip_admission->mobileno->caption() ?></template></td>
            <td <?= $ip_admission->mobileno->cellAttributes() ?>>
<template id="tpx_ip_admission_mobileno"><span id="el_ip_admission_mobileno">
<span<?= $ip_admission->mobileno->viewAttributes() ?>>
<?= $ip_admission->mobileno->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->gender->Visible) { // gender ?>
        <tr id="r_gender">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_gender"><?= $ip_admission->gender->caption() ?></template></td>
            <td <?= $ip_admission->gender->cellAttributes() ?>>
<template id="tpx_ip_admission_gender"><span id="el_ip_admission_gender">
<span<?= $ip_admission->gender->viewAttributes() ?>>
<?= $ip_admission->gender->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->age->Visible) { // age ?>
        <tr id="r_age">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_age"><?= $ip_admission->age->caption() ?></template></td>
            <td <?= $ip_admission->age->cellAttributes() ?>>
<template id="tpx_ip_admission_age"><span id="el_ip_admission_age">
<span<?= $ip_admission->age->viewAttributes() ?>>
<?= $ip_admission->age->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <tr id="r_typeRegsisteration">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_typeRegsisteration"><?= $ip_admission->typeRegsisteration->caption() ?></template></td>
            <td <?= $ip_admission->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_ip_admission_typeRegsisteration"><span id="el_ip_admission_typeRegsisteration">
<span<?= $ip_admission->typeRegsisteration->viewAttributes() ?>>
<?= $ip_admission->typeRegsisteration->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PaymentCategory->Visible) { // PaymentCategory ?>
        <tr id="r_PaymentCategory">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PaymentCategory"><?= $ip_admission->PaymentCategory->caption() ?></template></td>
            <td <?= $ip_admission->PaymentCategory->cellAttributes() ?>>
<template id="tpx_ip_admission_PaymentCategory"><span id="el_ip_admission_PaymentCategory">
<span<?= $ip_admission->PaymentCategory->viewAttributes() ?>>
<?= $ip_admission->PaymentCategory->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->physician_id->Visible) { // physician_id ?>
        <tr id="r_physician_id">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_physician_id"><?= $ip_admission->physician_id->caption() ?></template></td>
            <td <?= $ip_admission->physician_id->cellAttributes() ?>>
<template id="tpx_ip_admission_physician_id"><span id="el_ip_admission_physician_id">
<span<?= $ip_admission->physician_id->viewAttributes() ?>>
<?= $ip_admission->physician_id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <tr id="r_admission_consultant_id">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_admission_consultant_id"><?= $ip_admission->admission_consultant_id->caption() ?></template></td>
            <td <?= $ip_admission->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_ip_admission_admission_consultant_id"><span id="el_ip_admission_admission_consultant_id">
<span<?= $ip_admission->admission_consultant_id->viewAttributes() ?>>
<?= $ip_admission->admission_consultant_id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <tr id="r_leading_consultant_id">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_leading_consultant_id"><?= $ip_admission->leading_consultant_id->caption() ?></template></td>
            <td <?= $ip_admission->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_ip_admission_leading_consultant_id"><span id="el_ip_admission_leading_consultant_id">
<span<?= $ip_admission->leading_consultant_id->viewAttributes() ?>>
<?= $ip_admission->leading_consultant_id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->admission_date->Visible) { // admission_date ?>
        <tr id="r_admission_date">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_admission_date"><?= $ip_admission->admission_date->caption() ?></template></td>
            <td <?= $ip_admission->admission_date->cellAttributes() ?>>
<template id="tpx_ip_admission_admission_date"><span id="el_ip_admission_admission_date">
<span<?= $ip_admission->admission_date->viewAttributes() ?>>
<?= $ip_admission->admission_date->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->release_date->Visible) { // release_date ?>
        <tr id="r_release_date">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_release_date"><?= $ip_admission->release_date->caption() ?></template></td>
            <td <?= $ip_admission->release_date->cellAttributes() ?>>
<template id="tpx_ip_admission_release_date"><span id="el_ip_admission_release_date">
<span<?= $ip_admission->release_date->viewAttributes() ?>>
<?= $ip_admission->release_date->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PaymentStatus->Visible) { // PaymentStatus ?>
        <tr id="r_PaymentStatus">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PaymentStatus"><?= $ip_admission->PaymentStatus->caption() ?></template></td>
            <td <?= $ip_admission->PaymentStatus->cellAttributes() ?>>
<template id="tpx_ip_admission_PaymentStatus"><span id="el_ip_admission_PaymentStatus">
<span<?= $ip_admission->PaymentStatus->viewAttributes() ?>>
<?= $ip_admission->PaymentStatus->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_createddatetime"><?= $ip_admission->createddatetime->caption() ?></template></td>
            <td <?= $ip_admission->createddatetime->cellAttributes() ?>>
<template id="tpx_ip_admission_createddatetime"><span id="el_ip_admission_createddatetime">
<span<?= $ip_admission->createddatetime->viewAttributes() ?>>
<?= $ip_admission->createddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->profilePic->Visible) { // profilePic ?>
        <tr id="r_profilePic">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_profilePic"><?= $ip_admission->profilePic->caption() ?></template></td>
            <td <?= $ip_admission->profilePic->cellAttributes() ?>>
<template id="tpx_ip_admission_profilePic"><span id="el_ip_admission_profilePic">
<span<?= $ip_admission->profilePic->viewAttributes() ?>>
<?= $ip_admission->profilePic->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_HospID"><?= $ip_admission->HospID->caption() ?></template></td>
            <td <?= $ip_admission->HospID->cellAttributes() ?>>
<template id="tpx_ip_admission_HospID"><span id="el_ip_admission_HospID">
<span<?= $ip_admission->HospID->viewAttributes() ?>>
<?= $ip_admission->HospID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ReferedByDr->Visible) { // ReferedByDr ?>
        <tr id="r_ReferedByDr">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ReferedByDr"><?= $ip_admission->ReferedByDr->caption() ?></template></td>
            <td <?= $ip_admission->ReferedByDr->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferedByDr"><span id="el_ip_admission_ReferedByDr">
<span<?= $ip_admission->ReferedByDr->viewAttributes() ?>>
<?= $ip_admission->ReferedByDr->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ReferClinicname->Visible) { // ReferClinicname ?>
        <tr id="r_ReferClinicname">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ReferClinicname"><?= $ip_admission->ReferClinicname->caption() ?></template></td>
            <td <?= $ip_admission->ReferClinicname->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferClinicname"><span id="el_ip_admission_ReferClinicname">
<span<?= $ip_admission->ReferClinicname->viewAttributes() ?>>
<?= $ip_admission->ReferClinicname->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ReferCity->Visible) { // ReferCity ?>
        <tr id="r_ReferCity">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ReferCity"><?= $ip_admission->ReferCity->caption() ?></template></td>
            <td <?= $ip_admission->ReferCity->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferCity"><span id="el_ip_admission_ReferCity">
<span<?= $ip_admission->ReferCity->viewAttributes() ?>>
<?= $ip_admission->ReferCity->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <tr id="r_ReferMobileNo">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ReferMobileNo"><?= $ip_admission->ReferMobileNo->caption() ?></template></td>
            <td <?= $ip_admission->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferMobileNo"><span id="el_ip_admission_ReferMobileNo">
<span<?= $ip_admission->ReferMobileNo->viewAttributes() ?>>
<?= $ip_admission->ReferMobileNo->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <tr id="r_ReferA4TreatingConsultant">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ReferA4TreatingConsultant"><?= $ip_admission->ReferA4TreatingConsultant->caption() ?></template></td>
            <td <?= $ip_admission->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferA4TreatingConsultant"><span id="el_ip_admission_ReferA4TreatingConsultant">
<span<?= $ip_admission->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $ip_admission->ReferA4TreatingConsultant->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <tr id="r_PurposreReferredfor">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PurposreReferredfor"><?= $ip_admission->PurposreReferredfor->caption() ?></template></td>
            <td <?= $ip_admission->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_ip_admission_PurposreReferredfor"><span id="el_ip_admission_PurposreReferredfor">
<span<?= $ip_admission->PurposreReferredfor->viewAttributes() ?>>
<?= $ip_admission->PurposreReferredfor->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->BillClosing->Visible) { // BillClosing ?>
        <tr id="r_BillClosing">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_BillClosing"><?= $ip_admission->BillClosing->caption() ?></template></td>
            <td <?= $ip_admission->BillClosing->cellAttributes() ?>>
<template id="tpx_ip_admission_BillClosing"><span id="el_ip_admission_BillClosing">
<span<?= $ip_admission->BillClosing->viewAttributes() ?>>
<?= $ip_admission->BillClosing->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->BillClosingDate->Visible) { // BillClosingDate ?>
        <tr id="r_BillClosingDate">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_BillClosingDate"><?= $ip_admission->BillClosingDate->caption() ?></template></td>
            <td <?= $ip_admission->BillClosingDate->cellAttributes() ?>>
<template id="tpx_ip_admission_BillClosingDate"><span id="el_ip_admission_BillClosingDate">
<span<?= $ip_admission->BillClosingDate->viewAttributes() ?>>
<?= $ip_admission->BillClosingDate->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_BillNumber"><?= $ip_admission->BillNumber->caption() ?></template></td>
            <td <?= $ip_admission->BillNumber->cellAttributes() ?>>
<template id="tpx_ip_admission_BillNumber"><span id="el_ip_admission_BillNumber">
<span<?= $ip_admission->BillNumber->viewAttributes() ?>>
<?= $ip_admission->BillNumber->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ClosingAmount->Visible) { // ClosingAmount ?>
        <tr id="r_ClosingAmount">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ClosingAmount"><?= $ip_admission->ClosingAmount->caption() ?></template></td>
            <td <?= $ip_admission->ClosingAmount->cellAttributes() ?>>
<template id="tpx_ip_admission_ClosingAmount"><span id="el_ip_admission_ClosingAmount">
<span<?= $ip_admission->ClosingAmount->viewAttributes() ?>>
<?= $ip_admission->ClosingAmount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ClosingType->Visible) { // ClosingType ?>
        <tr id="r_ClosingType">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ClosingType"><?= $ip_admission->ClosingType->caption() ?></template></td>
            <td <?= $ip_admission->ClosingType->cellAttributes() ?>>
<template id="tpx_ip_admission_ClosingType"><span id="el_ip_admission_ClosingType">
<span<?= $ip_admission->ClosingType->viewAttributes() ?>>
<?= $ip_admission->ClosingType->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->BillAmount->Visible) { // BillAmount ?>
        <tr id="r_BillAmount">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_BillAmount"><?= $ip_admission->BillAmount->caption() ?></template></td>
            <td <?= $ip_admission->BillAmount->cellAttributes() ?>>
<template id="tpx_ip_admission_BillAmount"><span id="el_ip_admission_BillAmount">
<span<?= $ip_admission->BillAmount->viewAttributes() ?>>
<?= $ip_admission->BillAmount->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->billclosedBy->Visible) { // billclosedBy ?>
        <tr id="r_billclosedBy">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_billclosedBy"><?= $ip_admission->billclosedBy->caption() ?></template></td>
            <td <?= $ip_admission->billclosedBy->cellAttributes() ?>>
<template id="tpx_ip_admission_billclosedBy"><span id="el_ip_admission_billclosedBy">
<span<?= $ip_admission->billclosedBy->viewAttributes() ?>>
<?= $ip_admission->billclosedBy->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->bllcloseByDate->Visible) { // bllcloseByDate ?>
        <tr id="r_bllcloseByDate">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_bllcloseByDate"><?= $ip_admission->bllcloseByDate->caption() ?></template></td>
            <td <?= $ip_admission->bllcloseByDate->cellAttributes() ?>>
<template id="tpx_ip_admission_bllcloseByDate"><span id="el_ip_admission_bllcloseByDate">
<span<?= $ip_admission->bllcloseByDate->viewAttributes() ?>>
<?= $ip_admission->bllcloseByDate->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->ReportHeader->Visible) { // ReportHeader ?>
        <tr id="r_ReportHeader">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_ReportHeader"><?= $ip_admission->ReportHeader->caption() ?></template></td>
            <td <?= $ip_admission->ReportHeader->cellAttributes() ?>>
<template id="tpx_ip_admission_ReportHeader"><span id="el_ip_admission_ReportHeader">
<span<?= $ip_admission->ReportHeader->viewAttributes() ?>>
<?= $ip_admission->ReportHeader->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->Procedure->Visible) { // Procedure ?>
        <tr id="r_Procedure">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_Procedure"><?= $ip_admission->Procedure->caption() ?></template></td>
            <td <?= $ip_admission->Procedure->cellAttributes() ?>>
<template id="tpx_ip_admission_Procedure"><span id="el_ip_admission_Procedure">
<span<?= $ip_admission->Procedure->viewAttributes() ?>>
<?= $ip_admission->Procedure->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->Consultant->Visible) { // Consultant ?>
        <tr id="r_Consultant">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_Consultant"><?= $ip_admission->Consultant->caption() ?></template></td>
            <td <?= $ip_admission->Consultant->cellAttributes() ?>>
<template id="tpx_ip_admission_Consultant"><span id="el_ip_admission_Consultant">
<span<?= $ip_admission->Consultant->viewAttributes() ?>>
<?= $ip_admission->Consultant->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->Anesthetist->Visible) { // Anesthetist ?>
        <tr id="r_Anesthetist">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_Anesthetist"><?= $ip_admission->Anesthetist->caption() ?></template></td>
            <td <?= $ip_admission->Anesthetist->cellAttributes() ?>>
<template id="tpx_ip_admission_Anesthetist"><span id="el_ip_admission_Anesthetist">
<span<?= $ip_admission->Anesthetist->viewAttributes() ?>>
<?= $ip_admission->Anesthetist->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->Amound->Visible) { // Amound ?>
        <tr id="r_Amound">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_Amound"><?= $ip_admission->Amound->caption() ?></template></td>
            <td <?= $ip_admission->Amound->cellAttributes() ?>>
<template id="tpx_ip_admission_Amound"><span id="el_ip_admission_Amound">
<span<?= $ip_admission->Amound->viewAttributes() ?>>
<?= $ip_admission->Amound->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->Package->Visible) { // Package ?>
        <tr id="r_Package">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_Package"><?= $ip_admission->Package->caption() ?></template></td>
            <td <?= $ip_admission->Package->cellAttributes() ?>>
<template id="tpx_ip_admission_Package"><span id="el_ip_admission_Package">
<span<?= $ip_admission->Package->viewAttributes() ?>>
<?= $ip_admission->Package->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->patient_id->Visible) { // patient_id ?>
        <tr id="r_patient_id">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_patient_id"><?= $ip_admission->patient_id->caption() ?></template></td>
            <td <?= $ip_admission->patient_id->cellAttributes() ?>>
<template id="tpx_ip_admission_patient_id"><span id="el_ip_admission_patient_id">
<span<?= $ip_admission->patient_id->viewAttributes() ?>>
<?= $ip_admission->patient_id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PartnerID->Visible) { // PartnerID ?>
        <tr id="r_PartnerID">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PartnerID"><?= $ip_admission->PartnerID->caption() ?></template></td>
            <td <?= $ip_admission->PartnerID->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerID"><span id="el_ip_admission_PartnerID">
<span<?= $ip_admission->PartnerID->viewAttributes() ?>>
<?= $ip_admission->PartnerID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PartnerName->Visible) { // PartnerName ?>
        <tr id="r_PartnerName">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PartnerName"><?= $ip_admission->PartnerName->caption() ?></template></td>
            <td <?= $ip_admission->PartnerName->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerName"><span id="el_ip_admission_PartnerName">
<span<?= $ip_admission->PartnerName->viewAttributes() ?>>
<?= $ip_admission->PartnerName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PartnerMobile->Visible) { // PartnerMobile ?>
        <tr id="r_PartnerMobile">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PartnerMobile"><?= $ip_admission->PartnerMobile->caption() ?></template></td>
            <td <?= $ip_admission->PartnerMobile->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerMobile"><span id="el_ip_admission_PartnerMobile">
<span<?= $ip_admission->PartnerMobile->viewAttributes() ?>>
<?= $ip_admission->PartnerMobile->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->Cid->Visible) { // Cid ?>
        <tr id="r_Cid">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_Cid"><?= $ip_admission->Cid->caption() ?></template></td>
            <td <?= $ip_admission->Cid->cellAttributes() ?>>
<template id="tpx_ip_admission_Cid"><span id="el_ip_admission_Cid">
<span<?= $ip_admission->Cid->viewAttributes() ?>>
<?= $ip_admission->Cid->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->PartId->Visible) { // PartId ?>
        <tr id="r_PartId">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_PartId"><?= $ip_admission->PartId->caption() ?></template></td>
            <td <?= $ip_admission->PartId->cellAttributes() ?>>
<template id="tpx_ip_admission_PartId"><span id="el_ip_admission_PartId">
<span<?= $ip_admission->PartId->viewAttributes() ?>>
<?= $ip_admission->PartId->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->IDProof->Visible) { // IDProof ?>
        <tr id="r_IDProof">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_IDProof"><?= $ip_admission->IDProof->caption() ?></template></td>
            <td <?= $ip_admission->IDProof->cellAttributes() ?>>
<template id="tpx_ip_admission_IDProof"><span id="el_ip_admission_IDProof">
<span<?= $ip_admission->IDProof->viewAttributes() ?>>
<?= $ip_admission->IDProof->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($ip_admission->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <tr id="r_AdviceToOtherHospital">
            <td class="<?= $ip_admission->TableLeftColumnClass ?>"><template id="tpc_ip_admission_AdviceToOtherHospital"><?= $ip_admission->AdviceToOtherHospital->caption() ?></template></td>
            <td <?= $ip_admission->AdviceToOtherHospital->cellAttributes() ?>>
<template id="tpx_ip_admission_AdviceToOtherHospital"><span id="el_ip_admission_AdviceToOtherHospital">
<span<?= $ip_admission->AdviceToOtherHospital->viewAttributes() ?>>
<?= $ip_admission->AdviceToOtherHospital->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_ip_admissionmaster" class="ew-custom-template"></div>
<template id="tpm_ip_admissionmaster">
<div id="ct_IpAdmissionMaster"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
</style>
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_ip_admission_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_profilePic"></slot></p>
	<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	?>
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_ip_admission_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h4 class="widget-user-desc"><span class="ew-cell">Patient Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2"  src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_mrnNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_mrnNo"></slot></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Gender : <?php echo $results1[0]["gender"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
		  </div>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($ip_admission->Rows) ?> };
    ew.applyTemplate("tpd_ip_admissionmaster", "tpm_ip_admissionmaster", "ip_admissionmaster", "<?= $ip_admission->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>
