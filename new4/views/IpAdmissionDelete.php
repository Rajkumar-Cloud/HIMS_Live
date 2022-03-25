<?php

namespace PHPMaker2021\HIMS;

// Page object
$IpAdmissionDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fip_admissiondelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fip_admissiondelete = currentForm = new ew.Form("fip_admissiondelete", "delete");
    loadjs.done("fip_admissiondelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.ip_admission) ew.vars.tables.ip_admission = <?= JsonEncode(GetClientVar("tables", "ip_admission")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fip_admissiondelete" id="fip_admissiondelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ip_admission_id" class="ip_admission_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <th class="<?= $Page->mrnNo->headerCellClass() ?>"><span id="elh_ip_admission_mrnNo" class="ip_admission_mrnNo"><?= $Page->mrnNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><span id="elh_ip_admission_PatientID" class="ip_admission_PatientID"><?= $Page->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <th class="<?= $Page->patient_name->headerCellClass() ?>"><span id="elh_ip_admission_patient_name" class="ip_admission_patient_name"><?= $Page->patient_name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
        <th class="<?= $Page->mobileno->headerCellClass() ?>"><span id="elh_ip_admission_mobileno" class="ip_admission_mobileno"><?= $Page->mobileno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th class="<?= $Page->gender->headerCellClass() ?>"><span id="elh_ip_admission_gender" class="ip_admission_gender"><?= $Page->gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <th class="<?= $Page->age->headerCellClass() ?>"><span id="elh_ip_admission_age" class="ip_admission_age"><?= $Page->age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <th class="<?= $Page->typeRegsisteration->headerCellClass() ?>"><span id="elh_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <th class="<?= $Page->PaymentCategory->headerCellClass() ?>"><span id="elh_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory"><?= $Page->PaymentCategory->caption() ?></span></th>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
        <th class="<?= $Page->physician_id->headerCellClass() ?>"><span id="elh_ip_admission_physician_id" class="ip_admission_physician_id"><?= $Page->physician_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <th class="<?= $Page->admission_consultant_id->headerCellClass() ?>"><span id="elh_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <th class="<?= $Page->leading_consultant_id->headerCellClass() ?>"><span id="elh_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <th class="<?= $Page->admission_date->headerCellClass() ?>"><span id="elh_ip_admission_admission_date" class="ip_admission_admission_date"><?= $Page->admission_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <th class="<?= $Page->release_date->headerCellClass() ?>"><span id="elh_ip_admission_release_date" class="ip_admission_release_date"><?= $Page->release_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><span id="elh_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_ip_admission_createddatetime" class="ip_admission_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><span id="elh_ip_admission_profilePic" class="ip_admission_profilePic"><?= $Page->profilePic->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_ip_admission_HospID" class="ip_admission_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <th class="<?= $Page->ReferedByDr->headerCellClass() ?>"><span id="elh_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr"><?= $Page->ReferedByDr->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <th class="<?= $Page->ReferClinicname->headerCellClass() ?>"><span id="elh_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname"><?= $Page->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <th class="<?= $Page->ReferCity->headerCellClass() ?>"><span id="elh_ip_admission_ReferCity" class="ip_admission_ReferCity"><?= $Page->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <th class="<?= $Page->ReferMobileNo->headerCellClass() ?>"><span id="elh_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><span id="elh_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <th class="<?= $Page->PurposreReferredfor->headerCellClass() ?>"><span id="elh_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <th class="<?= $Page->BillClosing->headerCellClass() ?>"><span id="elh_ip_admission_BillClosing" class="ip_admission_BillClosing"><?= $Page->BillClosing->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <th class="<?= $Page->BillClosingDate->headerCellClass() ?>"><span id="elh_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate"><?= $Page->BillClosingDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><span id="elh_ip_admission_BillNumber" class="ip_admission_BillNumber"><?= $Page->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
        <th class="<?= $Page->ClosingAmount->headerCellClass() ?>"><span id="elh_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount"><?= $Page->ClosingAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
        <th class="<?= $Page->ClosingType->headerCellClass() ?>"><span id="elh_ip_admission_ClosingType" class="ip_admission_ClosingType"><?= $Page->ClosingType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
        <th class="<?= $Page->BillAmount->headerCellClass() ?>"><span id="elh_ip_admission_BillAmount" class="ip_admission_BillAmount"><?= $Page->BillAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
        <th class="<?= $Page->billclosedBy->headerCellClass() ?>"><span id="elh_ip_admission_billclosedBy" class="ip_admission_billclosedBy"><?= $Page->billclosedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
        <th class="<?= $Page->bllcloseByDate->headerCellClass() ?>"><span id="elh_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <th class="<?= $Page->ReportHeader->headerCellClass() ?>"><span id="elh_ip_admission_ReportHeader" class="ip_admission_ReportHeader"><?= $Page->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <th class="<?= $Page->Procedure->headerCellClass() ?>"><span id="elh_ip_admission_Procedure" class="ip_admission_Procedure"><?= $Page->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><span id="elh_ip_admission_Consultant" class="ip_admission_Consultant"><?= $Page->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <th class="<?= $Page->Anesthetist->headerCellClass() ?>"><span id="elh_ip_admission_Anesthetist" class="ip_admission_Anesthetist"><?= $Page->Anesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
        <th class="<?= $Page->Amound->headerCellClass() ?>"><span id="elh_ip_admission_Amound" class="ip_admission_Amound"><?= $Page->Amound->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
        <th class="<?= $Page->Package->headerCellClass() ?>"><span id="elh_ip_admission_Package" class="ip_admission_Package"><?= $Page->Package->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th class="<?= $Page->patient_id->headerCellClass() ?>"><span id="elh_ip_admission_patient_id" class="ip_admission_patient_id"><?= $Page->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><span id="elh_ip_admission_PartnerID" class="ip_admission_PartnerID"><?= $Page->PartnerID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_ip_admission_PartnerName" class="ip_admission_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <th class="<?= $Page->PartnerMobile->headerCellClass() ?>"><span id="elh_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
        <th class="<?= $Page->Cid->headerCellClass() ?>"><span id="elh_ip_admission_Cid" class="ip_admission_Cid"><?= $Page->Cid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
        <th class="<?= $Page->PartId->headerCellClass() ?>"><span id="elh_ip_admission_PartId" class="ip_admission_PartId"><?= $Page->PartId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
        <th class="<?= $Page->IDProof->headerCellClass() ?>"><span id="elh_ip_admission_IDProof" class="ip_admission_IDProof"><?= $Page->IDProof->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <th class="<?= $Page->AdviceToOtherHospital->headerCellClass() ?>"><span id="elh_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ip_admission_id" class="ip_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <td <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_mrnNo" class="ip_admission_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PatientID" class="ip_admission_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <td <?= $Page->patient_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_patient_name" class="ip_admission_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
        <td <?= $Page->mobileno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_mobileno" class="ip_admission_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<?= $Page->mobileno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <td <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_gender" class="ip_admission_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
        <td <?= $Page->age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_age" class="ip_admission_age">
<span<?= $Page->age->viewAttributes() ?>>
<?= $Page->age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <td <?= $Page->typeRegsisteration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_typeRegsisteration" class="ip_admission_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
        <td <?= $Page->PaymentCategory->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PaymentCategory" class="ip_admission_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<?= $Page->PaymentCategory->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
        <td <?= $Page->physician_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_physician_id" class="ip_admission_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
        <td <?= $Page->admission_consultant_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_admission_consultant_id" class="ip_admission_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<?= $Page->admission_consultant_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
        <td <?= $Page->leading_consultant_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_leading_consultant_id" class="ip_admission_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<?= $Page->leading_consultant_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
        <td <?= $Page->admission_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_admission_date" class="ip_admission_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<?= $Page->admission_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
        <td <?= $Page->release_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_release_date" class="ip_admission_release_date">
<span<?= $Page->release_date->viewAttributes() ?>>
<?= $Page->release_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <td <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PaymentStatus" class="ip_admission_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_createddatetime" class="ip_admission_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td <?= $Page->profilePic->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_profilePic" class="ip_admission_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_HospID" class="ip_admission_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
        <td <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferedByDr" class="ip_admission_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<?= $Page->ReferedByDr->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
        <td <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferClinicname" class="ip_admission_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<?= $Page->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
        <td <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferCity" class="ip_admission_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<?= $Page->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <td <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferMobileNo" class="ip_admission_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<?= $Page->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReferA4TreatingConsultant" class="ip_admission_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <td <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PurposreReferredfor" class="ip_admission_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<?= $Page->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
        <td <?= $Page->BillClosing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillClosing" class="ip_admission_BillClosing">
<span<?= $Page->BillClosing->viewAttributes() ?>>
<?= $Page->BillClosing->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
        <td <?= $Page->BillClosingDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillClosingDate" class="ip_admission_BillClosingDate">
<span<?= $Page->BillClosingDate->viewAttributes() ?>>
<?= $Page->BillClosingDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillNumber" class="ip_admission_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
        <td <?= $Page->ClosingAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ClosingAmount" class="ip_admission_ClosingAmount">
<span<?= $Page->ClosingAmount->viewAttributes() ?>>
<?= $Page->ClosingAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
        <td <?= $Page->ClosingType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ClosingType" class="ip_admission_ClosingType">
<span<?= $Page->ClosingType->viewAttributes() ?>>
<?= $Page->ClosingType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
        <td <?= $Page->BillAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_BillAmount" class="ip_admission_BillAmount">
<span<?= $Page->BillAmount->viewAttributes() ?>>
<?= $Page->BillAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
        <td <?= $Page->billclosedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_billclosedBy" class="ip_admission_billclosedBy">
<span<?= $Page->billclosedBy->viewAttributes() ?>>
<?= $Page->billclosedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
        <td <?= $Page->bllcloseByDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_bllcloseByDate" class="ip_admission_bllcloseByDate">
<span<?= $Page->bllcloseByDate->viewAttributes() ?>>
<?= $Page->bllcloseByDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_ReportHeader" class="ip_admission_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
        <td <?= $Page->Procedure->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Procedure" class="ip_admission_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Consultant" class="ip_admission_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
        <td <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Anesthetist" class="ip_admission_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
        <td <?= $Page->Amound->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Amound" class="ip_admission_Amound">
<span<?= $Page->Amound->viewAttributes() ?>>
<?= $Page->Amound->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
        <td <?= $Page->Package->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Package" class="ip_admission_Package">
<span<?= $Page->Package->viewAttributes() ?>>
<?= $Page->Package->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_patient_id" class="ip_admission_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <td <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartnerID" class="ip_admission_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartnerName" class="ip_admission_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <td <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartnerMobile" class="ip_admission_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
        <td <?= $Page->Cid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_Cid" class="ip_admission_Cid">
<span<?= $Page->Cid->viewAttributes() ?>>
<?= $Page->Cid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
        <td <?= $Page->PartId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_PartId" class="ip_admission_PartId">
<span<?= $Page->PartId->viewAttributes() ?>>
<?= $Page->PartId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
        <td <?= $Page->IDProof->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_IDProof" class="ip_admission_IDProof">
<span<?= $Page->IDProof->viewAttributes() ?>>
<?= $Page->IDProof->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <td <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ip_admission_AdviceToOtherHospital" class="ip_admission_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
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
