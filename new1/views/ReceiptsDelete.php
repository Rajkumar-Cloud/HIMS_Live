<?php

namespace PHPMaker2021\project3;

// Page object
$ReceiptsDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var freceiptsdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    freceiptsdelete = currentForm = new ew.Form("freceiptsdelete", "delete");
    loadjs.done("freceiptsdelete");
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
<form name="freceiptsdelete" id="freceiptsdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="receipts">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_receipts_id" class="receipts_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><span id="elh_receipts_Reception" class="receipts_Reception"><?= $Page->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <th class="<?= $Page->Aid->headerCellClass() ?>"><span id="elh_receipts_Aid" class="receipts_Aid"><?= $Page->Aid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <th class="<?= $Page->Vid->headerCellClass() ?>"><span id="elh_receipts_Vid" class="receipts_Vid"><?= $Page->Vid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th class="<?= $Page->patient_id->headerCellClass() ?>"><span id="elh_receipts_patient_id" class="receipts_patient_id"><?= $Page->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><span id="elh_receipts_mrnno" class="receipts_mrnno"><?= $Page->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_receipts_PatientName" class="receipts_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <th class="<?= $Page->amount->headerCellClass() ?>"><span id="elh_receipts_amount" class="receipts_amount"><?= $Page->amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <th class="<?= $Page->Discount->headerCellClass() ?>"><span id="elh_receipts_Discount" class="receipts_Discount"><?= $Page->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <th class="<?= $Page->SubTotal->headerCellClass() ?>"><span id="elh_receipts_SubTotal" class="receipts_SubTotal"><?= $Page->SubTotal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <th class="<?= $Page->patient_type->headerCellClass() ?>"><span id="elh_receipts_patient_type" class="receipts_patient_type"><?= $Page->patient_type->caption() ?></span></th>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <th class="<?= $Page->invoiceId->headerCellClass() ?>"><span id="elh_receipts_invoiceId" class="receipts_invoiceId"><?= $Page->invoiceId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <th class="<?= $Page->invoiceAmount->headerCellClass() ?>"><span id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount"><?= $Page->invoiceAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <th class="<?= $Page->invoiceStatus->headerCellClass() ?>"><span id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus"><?= $Page->invoiceStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <th class="<?= $Page->modeOfPayment->headerCellClass() ?>"><span id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment"><?= $Page->modeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <th class="<?= $Page->charged_date->headerCellClass() ?>"><span id="elh_receipts_charged_date" class="receipts_charged_date"><?= $Page->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_receipts_status" class="receipts_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_receipts_createdby" class="receipts_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_receipts_createddatetime" class="receipts_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_receipts_modifiedby" class="receipts_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ChequeCardNo->Visible) { // ChequeCardNo ?>
        <th class="<?= $Page->ChequeCardNo->headerCellClass() ?>"><span id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo"><?= $Page->ChequeCardNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreditBankName->Visible) { // CreditBankName ?>
        <th class="<?= $Page->CreditBankName->headerCellClass() ?>"><span id="elh_receipts_CreditBankName" class="receipts_CreditBankName"><?= $Page->CreditBankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreditCardHolder->Visible) { // CreditCardHolder ?>
        <th class="<?= $Page->CreditCardHolder->headerCellClass() ?>"><span id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder"><?= $Page->CreditCardHolder->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreditCardType->Visible) { // CreditCardType ?>
        <th class="<?= $Page->CreditCardType->headerCellClass() ?>"><span id="elh_receipts_CreditCardType" class="receipts_CreditCardType"><?= $Page->CreditCardType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreditCardMachine->Visible) { // CreditCardMachine ?>
        <th class="<?= $Page->CreditCardMachine->headerCellClass() ?>"><span id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine"><?= $Page->CreditCardMachine->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
        <th class="<?= $Page->CreditCardBatchNo->headerCellClass() ?>"><span id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo"><?= $Page->CreditCardBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreditCardTax->Visible) { // CreditCardTax ?>
        <th class="<?= $Page->CreditCardTax->headerCellClass() ?>"><span id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax"><?= $Page->CreditCardTax->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
        <th class="<?= $Page->CreditDeductionAmount->headerCellClass() ?>"><span id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount"><?= $Page->CreditDeductionAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <th class="<?= $Page->RealizationAmount->headerCellClass() ?>"><span id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <th class="<?= $Page->RealizationStatus->headerCellClass() ?>"><span id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <th class="<?= $Page->RealizationRemarks->headerCellClass() ?>"><span id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <th class="<?= $Page->RealizationBatchNo->headerCellClass() ?>"><span id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <th class="<?= $Page->RealizationDate->headerCellClass() ?>"><span id="elh_receipts_RealizationDate" class="receipts_RealizationDate"><?= $Page->RealizationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
        <th class="<?= $Page->BankAccHolderMobileNumber->headerCellClass() ?>"><span id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber"><?= $Page->BankAccHolderMobileNumber->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_receipts_id" class="receipts_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <td <?= $Page->Reception->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Reception" class="receipts_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <td <?= $Page->Aid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Aid" class="receipts_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <td <?= $Page->Vid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Vid" class="receipts_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td <?= $Page->patient_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_patient_id" class="receipts_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td <?= $Page->mrnno->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_mrnno" class="receipts_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_PatientName" class="receipts_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <td <?= $Page->amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_amount" class="receipts_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <td <?= $Page->Discount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_Discount" class="receipts_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <td <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_SubTotal" class="receipts_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <td <?= $Page->patient_type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_patient_type" class="receipts_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_invoiceId" class="receipts_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <td <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_invoiceAmount" class="receipts_invoiceAmount">
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <td <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_invoiceStatus" class="receipts_invoiceStatus">
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <td <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_modeOfPayment" class="receipts_modeOfPayment">
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <td <?= $Page->charged_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_charged_date" class="receipts_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_status" class="receipts_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_createdby" class="receipts_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_createddatetime" class="receipts_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_modifiedby" class="receipts_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_modifieddatetime" class="receipts_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ChequeCardNo->Visible) { // ChequeCardNo ?>
        <td <?= $Page->ChequeCardNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_ChequeCardNo" class="receipts_ChequeCardNo">
<span<?= $Page->ChequeCardNo->viewAttributes() ?>>
<?= $Page->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreditBankName->Visible) { // CreditBankName ?>
        <td <?= $Page->CreditBankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditBankName" class="receipts_CreditBankName">
<span<?= $Page->CreditBankName->viewAttributes() ?>>
<?= $Page->CreditBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreditCardHolder->Visible) { // CreditCardHolder ?>
        <td <?= $Page->CreditCardHolder->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardHolder" class="receipts_CreditCardHolder">
<span<?= $Page->CreditCardHolder->viewAttributes() ?>>
<?= $Page->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreditCardType->Visible) { // CreditCardType ?>
        <td <?= $Page->CreditCardType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardType" class="receipts_CreditCardType">
<span<?= $Page->CreditCardType->viewAttributes() ?>>
<?= $Page->CreditCardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreditCardMachine->Visible) { // CreditCardMachine ?>
        <td <?= $Page->CreditCardMachine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardMachine" class="receipts_CreditCardMachine">
<span<?= $Page->CreditCardMachine->viewAttributes() ?>>
<?= $Page->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
        <td <?= $Page->CreditCardBatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo">
<span<?= $Page->CreditCardBatchNo->viewAttributes() ?>>
<?= $Page->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreditCardTax->Visible) { // CreditCardTax ?>
        <td <?= $Page->CreditCardTax->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditCardTax" class="receipts_CreditCardTax">
<span<?= $Page->CreditCardTax->viewAttributes() ?>>
<?= $Page->CreditCardTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
        <td <?= $Page->CreditDeductionAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount">
<span<?= $Page->CreditDeductionAmount->viewAttributes() ?>>
<?= $Page->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
        <td <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationAmount" class="receipts_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
        <td <?= $Page->RealizationStatus->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationStatus" class="receipts_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
        <td <?= $Page->RealizationRemarks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationRemarks" class="receipts_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
        <td <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
        <td <?= $Page->RealizationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_RealizationDate" class="receipts_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
        <td <?= $Page->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber">
<span<?= $Page->BankAccHolderMobileNumber->viewAttributes() ?>>
<?= $Page->BankAccHolderMobileNumber->getViewValue() ?></span>
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
