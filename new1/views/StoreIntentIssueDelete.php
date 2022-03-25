<?php

namespace PHPMaker2021\project3;

// Page object
$StoreIntentIssueDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_intent_issuedelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fstore_intent_issuedelete = currentForm = new ew.Form("fstore_intent_issuedelete", "delete");
    loadjs.done("fstore_intent_issuedelete");
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
<form name="fstore_intent_issuedelete" id="fstore_intent_issuedelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_store_intent_issue_id" class="store_intent_issue_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_store_intent_issue_Reception" class="store_intent_issue_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_store_intent_issue_PatientId" class="store_intent_issue_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_store_intent_issue_mrnno" class="store_intent_issue_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_store_intent_issue_PatientName" class="store_intent_issue_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_store_intent_issue_Age" class="store_intent_issue_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_store_intent_issue_Gender" class="store_intent_issue_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><span id="elh_store_intent_issue_Mobile" class="store_intent_issue_Mobile"><?= $Page->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <th class="<?= $Page->IP_OP->headerCellClass() ?>"><span id="elh_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP"><?= $Page->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th class="<?= $Page->Doctor->headerCellClass() ?>"><span id="elh_store_intent_issue_Doctor" class="store_intent_issue_Doctor"><?= $Page->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <th class="<?= $Page->voucher_type->headerCellClass() ?>"><span id="elh_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type"><?= $Page->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><span id="elh_store_intent_issue_Details" class="store_intent_issue_Details"><?= $Page->Details->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><span id="elh_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_store_intent_issue_Amount" class="store_intent_issue_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><span id="elh_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues"><?= $Page->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_store_intent_issue_createdby" class="store_intent_issue_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <th class="<?= $Page->RealizationAmount->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <th class="<?= $Page->RealizationStatus->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <th class="<?= $Page->RealizationRemarks->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <th class="<?= $Page->RealizationBatchNo->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <th class="<?= $Page->RealizationDate->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate"><?= $Page->RealizationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_store_intent_issue_HospID" class="store_intent_issue_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_store_intent_issue_TidNo" class="store_intent_issue_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th class="<?= $Page->CId->headerCellClass() ?>"><span id="elh_store_intent_issue_CId" class="store_intent_issue_CId"><?= $Page->CId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
        <th class="<?= $Page->PayerType->headerCellClass() ?>"><span id="elh_store_intent_issue_PayerType" class="store_intent_issue_PayerType"><?= $Page->PayerType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
        <th class="<?= $Page->Dob->headerCellClass() ?>"><span id="elh_store_intent_issue_Dob" class="store_intent_issue_Dob"><?= $Page->Dob->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <th class="<?= $Page->Currency->headerCellClass() ?>"><span id="elh_store_intent_issue_Currency" class="store_intent_issue_Currency"><?= $Page->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
        <th class="<?= $Page->DiscountRemarks->headerCellClass() ?>"><span id="elh_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><span id="elh_store_intent_issue_Remarks" class="store_intent_issue_Remarks"><?= $Page->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <th class="<?= $Page->PatId->headerCellClass() ?>"><span id="elh_store_intent_issue_PatId" class="store_intent_issue_PatId"><?= $Page->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th class="<?= $Page->DrDepartment->headerCellClass() ?>"><span id="elh_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment"><?= $Page->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <th class="<?= $Page->RefferedBy->headerCellClass() ?>"><span id="elh_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy"><?= $Page->RefferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><span id="elh_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber"><?= $Page->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th class="<?= $Page->CardNumber->headerCellClass() ?>"><span id="elh_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber"><?= $Page->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><span id="elh_store_intent_issue_BankName" class="store_intent_issue_BankName"><?= $Page->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th class="<?= $Page->DrID->headerCellClass() ?>"><span id="elh_store_intent_issue_DrID" class="store_intent_issue_DrID"><?= $Page->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <th class="<?= $Page->BillStatus->headerCellClass() ?>"><span id="elh_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus"><?= $Page->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <th class="<?= $Page->ReportHeader->headerCellClass() ?>"><span id="elh_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader"><?= $Page->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <th class="<?= $Page->PharID->headerCellClass() ?>"><span id="elh_store_intent_issue_PharID" class="store_intent_issue_PharID"><?= $Page->PharID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_store_intent_issue_id" class="store_intent_issue_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Reception" class="store_intent_issue_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_PatientId" class="store_intent_issue_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_mrnno" class="store_intent_issue_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_PatientName" class="store_intent_issue_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Age" class="store_intent_issue_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Gender" class="store_intent_issue_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Mobile" class="store_intent_issue_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
        <td <?= $Page->IP_OP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<?= $Page->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Doctor" class="store_intent_issue_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <td <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <td <?= $Page->Details->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Details" class="store_intent_issue_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Amount" class="store_intent_issue_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_createdby" class="store_intent_issue_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <td <?= $Page->RealizationStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <td <?= $Page->RealizationRemarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <td <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <td <?= $Page->RealizationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_HospID" class="store_intent_issue_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_TidNo" class="store_intent_issue_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <td <?= $Page->CId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_CId" class="store_intent_issue_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
        <td <?= $Page->PayerType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_PayerType" class="store_intent_issue_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<?= $Page->PayerType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
        <td <?= $Page->Dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Dob" class="store_intent_issue_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <td <?= $Page->Currency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Currency" class="store_intent_issue_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
        <td <?= $Page->DiscountRemarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks">
<span<?= $Page->DiscountRemarks->viewAttributes() ?>>
<?= $Page->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td <?= $Page->Remarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_Remarks" class="store_intent_issue_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <td <?= $Page->PatId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_PatId" class="store_intent_issue_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <td <?= $Page->RefferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<?= $Page->RefferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <td <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_BankName" class="store_intent_issue_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <td <?= $Page->DrID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_DrID" class="store_intent_issue_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
        <td <?= $Page->BillStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<?= $Page->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
        <td <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<?= $Page->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PharID->Visible) { // PharID ?>
        <td <?= $Page->PharID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_store_intent_issue_PharID" class="store_intent_issue_PharID">
<span<?= $Page->PharID->viewAttributes() ?>>
<?= $Page->PharID->getViewValue() ?></span>
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
