<?php

namespace PHPMaker2021\project3;

// Page object
$StoreIntentIssueView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fstore_intent_issueview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fstore_intent_issueview = currentForm = new ew.Form("fstore_intent_issueview", "view");
    loadjs.done("fstore_intent_issueview");
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
<form name="fstore_intent_issueview" id="fstore_intent_issueview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_store_intent_issue_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_store_intent_issue_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_store_intent_issue_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_store_intent_issue_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_store_intent_issue_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_store_intent_issue_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <tr id="r_Mobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Mobile"><?= $Page->Mobile->caption() ?></span></td>
        <td data-name="Mobile" <?= $Page->Mobile->cellAttributes() ?>>
<span id="el_store_intent_issue_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <tr id="r_IP_OP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_IP_OP"><?= $Page->IP_OP->caption() ?></span></td>
        <td data-name="IP_OP" <?= $Page->IP_OP->cellAttributes() ?>>
<span id="el_store_intent_issue_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <tr id="r_Doctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Doctor"><?= $Page->Doctor->caption() ?></span></td>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<span id="el_store_intent_issue_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <tr id="r_voucher_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_voucher_type"><?= $Page->voucher_type->caption() ?></span></td>
        <td data-name="voucher_type" <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el_store_intent_issue_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <tr id="r_Details">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Details"><?= $Page->Details->caption() ?></span></td>
        <td data-name="Details" <?= $Page->Details->cellAttributes() ?>>
<span id="el_store_intent_issue_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <tr id="r_ModeofPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></td>
        <td data-name="ModeofPayment" <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el_store_intent_issue_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Amount"><?= $Page->Amount->caption() ?></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<span id="el_store_intent_issue_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <tr id="r_AnyDues">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_AnyDues"><?= $Page->AnyDues->caption() ?></span></td>
        <td data-name="AnyDues" <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el_store_intent_issue_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_store_intent_issue_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_store_intent_issue_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <tr id="r_RealizationAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></span></td>
        <td data-name="RealizationAmount" <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <tr id="r_RealizationStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></span></td>
        <td data-name="RealizationStatus" <?= $Page->RealizationStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <tr id="r_RealizationRemarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></span></td>
        <td data-name="RealizationRemarks" <?= $Page->RealizationRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <tr id="r_RealizationBatchNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></span></td>
        <td data-name="RealizationBatchNo" <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <tr id="r_RealizationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationDate"><?= $Page->RealizationDate->caption() ?></span></td>
        <td data-name="RealizationDate" <?= $Page->RealizationDate->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_store_intent_issue_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_store_intent_issue_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_store_intent_issue_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <tr id="r_CId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_CId"><?= $Page->CId->caption() ?></span></td>
        <td data-name="CId" <?= $Page->CId->cellAttributes() ?>>
<span id="el_store_intent_issue_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PartnerName"><?= $Page->PartnerName->caption() ?></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_store_intent_issue_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <tr id="r_PayerType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PayerType"><?= $Page->PayerType->caption() ?></span></td>
        <td data-name="PayerType" <?= $Page->PayerType->cellAttributes() ?>>
<span id="el_store_intent_issue_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<?= $Page->PayerType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <tr id="r_Dob">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Dob"><?= $Page->Dob->caption() ?></span></td>
        <td data-name="Dob" <?= $Page->Dob->cellAttributes() ?>>
<span id="el_store_intent_issue_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <tr id="r_Currency">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Currency"><?= $Page->Currency->caption() ?></span></td>
        <td data-name="Currency" <?= $Page->Currency->cellAttributes() ?>>
<span id="el_store_intent_issue_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <tr id="r_DiscountRemarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?></span></td>
        <td data-name="DiscountRemarks" <?= $Page->DiscountRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_DiscountRemarks">
<span<?= $Page->DiscountRemarks->viewAttributes() ?>>
<?= $Page->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <tr id="r_Remarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Remarks"><?= $Page->Remarks->caption() ?></span></td>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_store_intent_issue_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <tr id="r_PatId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatId"><?= $Page->PatId->caption() ?></span></td>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <tr id="r_DrDepartment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DrDepartment"><?= $Page->DrDepartment->caption() ?></span></td>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el_store_intent_issue_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <tr id="r_RefferedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RefferedBy"><?= $Page->RefferedBy->caption() ?></span></td>
        <td data-name="RefferedBy" <?= $Page->RefferedBy->cellAttributes() ?>>
<span id="el_store_intent_issue_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<?= $Page->RefferedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <tr id="r_BillNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BillNumber"><?= $Page->BillNumber->caption() ?></span></td>
        <td data-name="BillNumber" <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <tr id="r_CardNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_CardNumber"><?= $Page->CardNumber->caption() ?></span></td>
        <td data-name="CardNumber" <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <tr id="r_BankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BankName"><?= $Page->BankName->caption() ?></span></td>
        <td data-name="BankName" <?= $Page->BankName->cellAttributes() ?>>
<span id="el_store_intent_issue_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <tr id="r_DrID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DrID"><?= $Page->DrID->caption() ?></span></td>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<span id="el_store_intent_issue_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <tr id="r_BillStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BillStatus"><?= $Page->BillStatus->caption() ?></span></td>
        <td data-name="BillStatus" <?= $Page->BillStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <tr id="r_ReportHeader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_ReportHeader"><?= $Page->ReportHeader->caption() ?></span></td>
        <td data-name="ReportHeader" <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el_store_intent_issue_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
    <tr id="r_PharID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PharID"><?= $Page->PharID->caption() ?></span></td>
        <td data-name="PharID" <?= $Page->PharID->cellAttributes() ?>>
<span id="el_store_intent_issue_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
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
