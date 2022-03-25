<?php

namespace PHPMaker2021\project3;

// Page object
$IpAdmissionView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fip_admissionview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fip_admissionview = currentForm = new ew.Form("fip_admissionview", "view");
    loadjs.done("fip_admissionview");
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
<form name="fip_admissionview" id="fip_admissionview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ip_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <tr id="r_mrnNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_mrnNo"><?= $Page->mrnNo->caption() ?></span></td>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el_ip_admission_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_patient_id"><?= $Page->patient_id->caption() ?></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_ip_admission_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <tr id="r_patient_name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_patient_name"><?= $Page->patient_name->caption() ?></span></td>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<span id="el_ip_admission_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_ip_admission_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <tr id="r_gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_gender"><?= $Page->gender->caption() ?></span></td>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el_ip_admission_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <tr id="r_age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_age"><?= $Page->age->caption() ?></span></td>
        <td data-name="age" <?= $Page->age->cellAttributes() ?>>
<span id="el_ip_admission_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <tr id="r_physician_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_physician_id"><?= $Page->physician_id->caption() ?></span></td>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<span id="el_ip_admission_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <tr id="r_typeRegsisteration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?></span></td>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<span id="el_ip_admission_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <tr id="r_PaymentCategory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PaymentCategory"><?= $Page->PaymentCategory->caption() ?></span></td>
        <td data-name="PaymentCategory" <?= $Page->PaymentCategory->cellAttributes() ?>>
<span id="el_ip_admission_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <tr id="r_admission_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?></span></td>
        <td data-name="admission_consultant_id" <?= $Page->admission_consultant_id->cellAttributes() ?>>
<span id="el_ip_admission_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <tr id="r_leading_consultant_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?></span></td>
        <td data-name="leading_consultant_id" <?= $Page->leading_consultant_id->cellAttributes() ?>>
<span id="el_ip_admission_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <tr id="r_cause">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_cause"><?= $Page->cause->caption() ?></span></td>
        <td data-name="cause" <?= $Page->cause->cellAttributes() ?>>
<span id="el_ip_admission_cause">
<span<?= $Page->cause->viewAttributes() ?>>
<?= $Page->cause->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <tr id="r_admission_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_admission_date"><?= $Page->admission_date->caption() ?></span></td>
        <td data-name="admission_date" <?= $Page->admission_date->cellAttributes() ?>>
<span id="el_ip_admission_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <tr id="r_release_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_release_date"><?= $Page->release_date->caption() ?></span></td>
        <td data-name="release_date" <?= $Page->release_date->cellAttributes() ?>>
<span id="el_ip_admission_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <tr id="r_PaymentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span></td>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el_ip_admission_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_ip_admission_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ip_admission_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ip_admission_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ip_admission_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ip_admission_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PatientID"><?= $Page->PatientID->caption() ?></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_ip_admission_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_ip_admission_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <tr id="r_ReferedByDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></span></td>
        <td data-name="ReferedByDr" <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el_ip_admission_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <tr id="r_ReferClinicname">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span></td>
        <td data-name="ReferClinicname" <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el_ip_admission_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <tr id="r_ReferCity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferCity"><?= $Page->ReferCity->caption() ?></span></td>
        <td data-name="ReferCity" <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el_ip_admission_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <tr id="r_ReferMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span></td>
        <td data-name="ReferMobileNo" <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el_ip_admission_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <tr id="r_ReferA4TreatingConsultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></span></td>
        <td data-name="ReferA4TreatingConsultant" <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_ip_admission_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <tr id="r_PurposreReferredfor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></span></td>
        <td data-name="PurposreReferredfor" <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el_ip_admission_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <tr id="r_mobileno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_mobileno"><?= $Page->mobileno->caption() ?></span></td>
        <td data-name="mobileno" <?= $Page->mobileno->cellAttributes() ?>>
<span id="el_ip_admission_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <tr id="r_BillClosing">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillClosing"><?= $Page->BillClosing->caption() ?></span></td>
        <td data-name="BillClosing" <?= $Page->BillClosing->cellAttributes() ?>>
<span id="el_ip_admission_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <tr id="r_BillClosingDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillClosingDate"><?= $Page->BillClosingDate->caption() ?></span></td>
        <td data-name="BillClosingDate" <?= $Page->BillClosingDate->cellAttributes() ?>>
<span id="el_ip_admission_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <tr id="r_BillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillNumber"><?= $Page->BillNumber->caption() ?></span></td>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el_ip_admission_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <tr id="r_ClosingAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ClosingAmount"><?= $Page->ClosingAmount->caption() ?></span></td>
        <td data-name="ClosingAmount" <?= $Page->ClosingAmount->cellAttributes() ?>>
<span id="el_ip_admission_ClosingAmount">
<span<?= $Page->ClosingAmount->viewAttributes() ?>>
<?= $Page->ClosingAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <tr id="r_ClosingType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ClosingType"><?= $Page->ClosingType->caption() ?></span></td>
        <td data-name="ClosingType" <?= $Page->ClosingType->cellAttributes() ?>>
<span id="el_ip_admission_ClosingType">
<span<?= $Page->ClosingType->viewAttributes() ?>>
<?= $Page->ClosingType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <tr id="r_BillAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_BillAmount"><?= $Page->BillAmount->caption() ?></span></td>
        <td data-name="BillAmount" <?= $Page->BillAmount->cellAttributes() ?>>
<span id="el_ip_admission_BillAmount">
<span<?= $Page->BillAmount->viewAttributes() ?>>
<?= $Page->BillAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <tr id="r_billclosedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_billclosedBy"><?= $Page->billclosedBy->caption() ?></span></td>
        <td data-name="billclosedBy" <?= $Page->billclosedBy->cellAttributes() ?>>
<span id="el_ip_admission_billclosedBy">
<span<?= $Page->billclosedBy->viewAttributes() ?>>
<?= $Page->billclosedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <tr id="r_bllcloseByDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?></span></td>
        <td data-name="bllcloseByDate" <?= $Page->bllcloseByDate->cellAttributes() ?>>
<span id="el_ip_admission_bllcloseByDate">
<span<?= $Page->bllcloseByDate->viewAttributes() ?>>
<?= $Page->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <tr id="r_ReportHeader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_ReportHeader"><?= $Page->ReportHeader->caption() ?></span></td>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el_ip_admission_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <tr id="r_Procedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Procedure"><?= $Page->Procedure->caption() ?></span></td>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_ip_admission_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Consultant"><?= $Page->Consultant->caption() ?></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ip_admission_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <tr id="r_Anesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Anesthetist"><?= $Page->Anesthetist->caption() ?></span></td>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el_ip_admission_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <tr id="r_Amound">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Amound"><?= $Page->Amound->caption() ?></span></td>
        <td data-name="Amound" <?= $Page->Amound->cellAttributes() ?>>
<span id="el_ip_admission_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <tr id="r_Package">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Package"><?= $Page->Package->caption() ?></span></td>
        <td data-name="Package" <?= $Page->Package->cellAttributes() ?>>
<span id="el_ip_admission_Package">
<span<?= $Page->Package->viewAttributes() ?>>
<?= $Page->Package->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <tr id="r_PartnerID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerID"><?= $Page->PartnerID->caption() ?></span></td>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el_ip_admission_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerName"><?= $Page->PartnerName->caption() ?></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_ip_admission_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <tr id="r_PartnerMobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span></td>
        <td data-name="PartnerMobile" <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el_ip_admission_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
    <tr id="r_Cid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Cid"><?= $Page->Cid->caption() ?></span></td>
        <td data-name="Cid" <?= $Page->Cid->cellAttributes() ?>>
<span id="el_ip_admission_Cid">
<span<?= $Page->Cid->viewAttributes() ?>>
<?= $Page->Cid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
    <tr id="r_PartId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_PartId"><?= $Page->PartId->caption() ?></span></td>
        <td data-name="PartId" <?= $Page->PartId->cellAttributes() ?>>
<span id="el_ip_admission_PartId">
<span<?= $Page->PartId->viewAttributes() ?>>
<?= $Page->PartId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
    <tr id="r_IDProof">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_IDProof"><?= $Page->IDProof->caption() ?></span></td>
        <td data-name="IDProof" <?= $Page->IDProof->cellAttributes() ?>>
<span id="el_ip_admission_IDProof">
<span<?= $Page->IDProof->viewAttributes() ?>>
<?= $Page->IDProof->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
    <tr id="r_AdviceToOtherHospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?></span></td>
        <td data-name="AdviceToOtherHospital" <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el_ip_admission_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <tr id="r_Reason">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ip_admission_Reason"><?= $Page->Reason->caption() ?></span></td>
        <td data-name="Reason" <?= $Page->Reason->cellAttributes() ?>>
<span id="el_ip_admission_Reason">
<span<?= $Page->Reason->viewAttributes() ?>>
<?= $Page->Reason->getViewValue() ?></span>
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
