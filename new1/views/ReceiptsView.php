<?php

namespace PHPMaker2021\project3;

// Page object
$ReceiptsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var freceiptsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    freceiptsview = currentForm = new ew.Form("freceiptsview", "view");
    loadjs.done("freceiptsview");
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
<form name="freceiptsview" id="freceiptsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_receipts_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_receipts_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
    <tr id="r_Aid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_Aid"><?= $Page->Aid->caption() ?></span></td>
        <td data-name="Aid" <?= $Page->Aid->cellAttributes() ?>>
<span id="el_receipts_Aid">
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
    <tr id="r_Vid">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_Vid"><?= $Page->Vid->caption() ?></span></td>
        <td data-name="Vid" <?= $Page->Vid->cellAttributes() ?>>
<span id="el_receipts_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <tr id="r_patient_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_patient_id"><?= $Page->patient_id->caption() ?></span></td>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_receipts_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_receipts_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_receipts_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <tr id="r_amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_amount"><?= $Page->amount->caption() ?></span></td>
        <td data-name="amount" <?= $Page->amount->cellAttributes() ?>>
<span id="el_receipts_amount">
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <tr id="r_Discount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_Discount"><?= $Page->Discount->caption() ?></span></td>
        <td data-name="Discount" <?= $Page->Discount->cellAttributes() ?>>
<span id="el_receipts_Discount">
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <tr id="r_SubTotal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_SubTotal"><?= $Page->SubTotal->caption() ?></span></td>
        <td data-name="SubTotal" <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el_receipts_SubTotal">
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
    <tr id="r_patient_type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_patient_type"><?= $Page->patient_type->caption() ?></span></td>
        <td data-name="patient_type" <?= $Page->patient_type->cellAttributes() ?>>
<span id="el_receipts_patient_type">
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
    <tr id="r_invoiceId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceId"><?= $Page->invoiceId->caption() ?></span></td>
        <td data-name="invoiceId" <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el_receipts_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
    <tr id="r_invoiceAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceAmount"><?= $Page->invoiceAmount->caption() ?></span></td>
        <td data-name="invoiceAmount" <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el_receipts_invoiceAmount">
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
    <tr id="r_invoiceStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceStatus"><?= $Page->invoiceStatus->caption() ?></span></td>
        <td data-name="invoiceStatus" <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el_receipts_invoiceStatus">
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
    <tr id="r_modeOfPayment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_modeOfPayment"><?= $Page->modeOfPayment->caption() ?></span></td>
        <td data-name="modeOfPayment" <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el_receipts_modeOfPayment">
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <tr id="r_charged_date">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_charged_date"><?= $Page->charged_date->caption() ?></span></td>
        <td data-name="charged_date" <?= $Page->charged_date->cellAttributes() ?>>
<span id="el_receipts_charged_date">
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_receipts_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_receipts_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_receipts_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_receipts_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_receipts_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ChequeCardNo->Visible) { // ChequeCardNo ?>
    <tr id="r_ChequeCardNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_ChequeCardNo"><?= $Page->ChequeCardNo->caption() ?></span></td>
        <td data-name="ChequeCardNo" <?= $Page->ChequeCardNo->cellAttributes() ?>>
<span id="el_receipts_ChequeCardNo">
<span<?= $Page->ChequeCardNo->viewAttributes() ?>>
<?= $Page->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreditBankName->Visible) { // CreditBankName ?>
    <tr id="r_CreditBankName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_CreditBankName"><?= $Page->CreditBankName->caption() ?></span></td>
        <td data-name="CreditBankName" <?= $Page->CreditBankName->cellAttributes() ?>>
<span id="el_receipts_CreditBankName">
<span<?= $Page->CreditBankName->viewAttributes() ?>>
<?= $Page->CreditBankName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreditCardHolder->Visible) { // CreditCardHolder ?>
    <tr id="r_CreditCardHolder">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardHolder"><?= $Page->CreditCardHolder->caption() ?></span></td>
        <td data-name="CreditCardHolder" <?= $Page->CreditCardHolder->cellAttributes() ?>>
<span id="el_receipts_CreditCardHolder">
<span<?= $Page->CreditCardHolder->viewAttributes() ?>>
<?= $Page->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreditCardType->Visible) { // CreditCardType ?>
    <tr id="r_CreditCardType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardType"><?= $Page->CreditCardType->caption() ?></span></td>
        <td data-name="CreditCardType" <?= $Page->CreditCardType->cellAttributes() ?>>
<span id="el_receipts_CreditCardType">
<span<?= $Page->CreditCardType->viewAttributes() ?>>
<?= $Page->CreditCardType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreditCardMachine->Visible) { // CreditCardMachine ?>
    <tr id="r_CreditCardMachine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardMachine"><?= $Page->CreditCardMachine->caption() ?></span></td>
        <td data-name="CreditCardMachine" <?= $Page->CreditCardMachine->cellAttributes() ?>>
<span id="el_receipts_CreditCardMachine">
<span<?= $Page->CreditCardMachine->viewAttributes() ?>>
<?= $Page->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
    <tr id="r_CreditCardBatchNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardBatchNo"><?= $Page->CreditCardBatchNo->caption() ?></span></td>
        <td data-name="CreditCardBatchNo" <?= $Page->CreditCardBatchNo->cellAttributes() ?>>
<span id="el_receipts_CreditCardBatchNo">
<span<?= $Page->CreditCardBatchNo->viewAttributes() ?>>
<?= $Page->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreditCardTax->Visible) { // CreditCardTax ?>
    <tr id="r_CreditCardTax">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardTax"><?= $Page->CreditCardTax->caption() ?></span></td>
        <td data-name="CreditCardTax" <?= $Page->CreditCardTax->cellAttributes() ?>>
<span id="el_receipts_CreditCardTax">
<span<?= $Page->CreditCardTax->viewAttributes() ?>>
<?= $Page->CreditCardTax->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
    <tr id="r_CreditDeductionAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_CreditDeductionAmount"><?= $Page->CreditDeductionAmount->caption() ?></span></td>
        <td data-name="CreditDeductionAmount" <?= $Page->CreditDeductionAmount->cellAttributes() ?>>
<span id="el_receipts_CreditDeductionAmount">
<span<?= $Page->CreditDeductionAmount->viewAttributes() ?>>
<?= $Page->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <tr id="r_RealizationAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationAmount"><?= $Page->RealizationAmount->caption() ?></span></td>
        <td data-name="RealizationAmount" <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el_receipts_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<?= $Page->RealizationAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <tr id="r_RealizationStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationStatus"><?= $Page->RealizationStatus->caption() ?></span></td>
        <td data-name="RealizationStatus" <?= $Page->RealizationStatus->cellAttributes() ?>>
<span id="el_receipts_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<?= $Page->RealizationStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <tr id="r_RealizationRemarks">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?></span></td>
        <td data-name="RealizationRemarks" <?= $Page->RealizationRemarks->cellAttributes() ?>>
<span id="el_receipts_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<?= $Page->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <tr id="r_RealizationBatchNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?></span></td>
        <td data-name="RealizationBatchNo" <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<span id="el_receipts_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<?= $Page->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <tr id="r_RealizationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationDate"><?= $Page->RealizationDate->caption() ?></span></td>
        <td data-name="RealizationDate" <?= $Page->RealizationDate->cellAttributes() ?>>
<span id="el_receipts_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<?= $Page->RealizationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
    <tr id="r_BankAccHolderMobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_receipts_BankAccHolderMobileNumber"><?= $Page->BankAccHolderMobileNumber->caption() ?></span></td>
        <td data-name="BankAccHolderMobileNumber" <?= $Page->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el_receipts_BankAccHolderMobileNumber">
<span<?= $Page->BankAccHolderMobileNumber->viewAttributes() ?>>
<?= $Page->BankAccHolderMobileNumber->getViewValue() ?></span>
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
