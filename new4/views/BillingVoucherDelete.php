<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingVoucherDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_voucherdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fbilling_voucherdelete = currentForm = new ew.Form("fbilling_voucherdelete", "delete");
    loadjs.done("fbilling_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.billing_voucher) ew.vars.tables.billing_voucher = <?= JsonEncode(GetClientVar("tables", "billing_voucher")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fbilling_voucherdelete" id="fbilling_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_billing_voucher_id" class="billing_voucher_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <th class="<?= $Page->PatId->headerCellClass() ?>"><span id="elh_billing_voucher_PatId" class="billing_voucher_PatId"><?= $Page->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><span id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber"><?= $Page->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><span id="elh_billing_voucher_Gender" class="billing_voucher_Gender"><?= $Page->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><span id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile"><?= $Page->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <th class="<?= $Page->Doctor->headerCellClass() ?>"><span id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor"><?= $Page->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><span id="elh_billing_voucher_Amount" class="billing_voucher_Amount"><?= $Page->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><span id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues"><?= $Page->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_billing_voucher_createdby" class="billing_voucher_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_billing_voucher_HospID" class="billing_voucher_HospID"><?= $Page->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><span id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO"><?= $Page->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <th class="<?= $Page->CId->headerCellClass() ?>"><span id="elh_billing_voucher_CId" class="billing_voucher_CId"><?= $Page->CId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><span id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName"><?= $Page->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
        <th class="<?= $Page->PayerType->headerCellClass() ?>"><span id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType"><?= $Page->PayerType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
        <th class="<?= $Page->Dob->headerCellClass() ?>"><span id="elh_billing_voucher_Dob" class="billing_voucher_Dob"><?= $Page->Dob->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <th class="<?= $Page->DrDepartment->headerCellClass() ?>"><span id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment"><?= $Page->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <th class="<?= $Page->RefferedBy->headerCellClass() ?>"><span id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy"><?= $Page->RefferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <th class="<?= $Page->CardNumber->headerCellClass() ?>"><span id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber"><?= $Page->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><span id="elh_billing_voucher_BankName" class="billing_voucher_BankName"><?= $Page->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th class="<?= $Page->_UserName->headerCellClass() ?>"><span id="elh_billing_voucher__UserName" class="billing_voucher__UserName"><?= $Page->_UserName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
        <th class="<?= $Page->AdjustmentAdvance->headerCellClass() ?>"><span id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance"><?= $Page->AdjustmentAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
        <th class="<?= $Page->billing_vouchercol->headerCellClass() ?>"><span id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol"><?= $Page->billing_vouchercol->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th class="<?= $Page->BillType->headerCellClass() ?>"><span id="elh_billing_voucher_BillType" class="billing_voucher_BillType"><?= $Page->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
        <th class="<?= $Page->ProcedureName->headerCellClass() ?>"><span id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName"><?= $Page->ProcedureName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
        <th class="<?= $Page->ProcedureAmount->headerCellClass() ?>"><span id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount"><?= $Page->ProcedureAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
        <th class="<?= $Page->IncludePackage->headerCellClass() ?>"><span id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage"><?= $Page->IncludePackage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <th class="<?= $Page->CancelBill->headerCellClass() ?>"><span id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill"><?= $Page->CancelBill->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelReason->Visible) { // CancelReason ?>
        <th class="<?= $Page->CancelReason->headerCellClass() ?>"><span id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason"><?= $Page->CancelReason->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <th class="<?= $Page->CancelModeOfPayment->headerCellClass() ?>"><span id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment"><?= $Page->CancelModeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <th class="<?= $Page->CancelAmount->headerCellClass() ?>"><span id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount"><?= $Page->CancelAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <th class="<?= $Page->CancelBankName->headerCellClass() ?>"><span id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName"><?= $Page->CancelBankName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <th class="<?= $Page->CancelTransactionNumber->headerCellClass() ?>"><span id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber"><?= $Page->CancelTransactionNumber->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <th class="<?= $Page->LabTest->headerCellClass() ?>"><span id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest"><?= $Page->LabTest->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th class="<?= $Page->sid->headerCellClass() ?>"><span id="elh_billing_voucher_sid" class="billing_voucher_sid"><?= $Page->sid->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <th class="<?= $Page->SidNo->headerCellClass() ?>"><span id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo"><?= $Page->SidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <th class="<?= $Page->createdDatettime->headerCellClass() ?>"><span id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime"><?= $Page->createdDatettime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
        <th class="<?= $Page->LabTestReleased->headerCellClass() ?>"><span id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased"><?= $Page->LabTestReleased->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <th class="<?= $Page->GoogleReviewID->headerCellClass() ?>"><span id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID"><?= $Page->GoogleReviewID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <th class="<?= $Page->CardType->headerCellClass() ?>"><span id="elh_billing_voucher_CardType" class="billing_voucher_CardType"><?= $Page->CardType->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <th class="<?= $Page->PharmacyBill->headerCellClass() ?>"><span id="elh_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill"><?= $Page->PharmacyBill->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <th class="<?= $Page->DiscountAmount->headerCellClass() ?>"><span id="elh_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount"><?= $Page->DiscountAmount->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <th class="<?= $Page->Cash->headerCellClass() ?>"><span id="elh_billing_voucher_Cash" class="billing_voucher_Cash"><?= $Page->Cash->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th class="<?= $Page->Card->headerCellClass() ?>"><span id="elh_billing_voucher_Card" class="billing_voucher_Card"><?= $Page->Card->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_billing_voucher_id" class="billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <td <?= $Page->PatId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PatId" class="billing_voucher_PatId">
<span<?= $Page->PatId->viewAttributes() ?>><?= Barcode()->show($Page->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <td <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_BillNumber" class="billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PatientId" class="billing_voucher_PatientId">
<span>
<?= GetImageViewTag($Page->PatientId, $Page->PatientId->getViewValue()) ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PatientName" class="billing_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <td <?= $Page->Gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Gender" class="billing_voucher_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <td <?= $Page->Mobile->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Mobile" class="billing_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
        <td <?= $Page->Doctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Doctor" class="billing_voucher_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <td <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <td <?= $Page->Amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Amount" class="billing_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <td <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_createdby" class="billing_voucher_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_HospID" class="billing_voucher_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <td <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_TidNo" class="billing_voucher_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <td <?= $Page->CId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CId" class="billing_voucher_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <td <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PartnerName" class="billing_voucher_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
        <td <?= $Page->PayerType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PayerType" class="billing_voucher_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<?= $Page->PayerType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
        <td <?= $Page->Dob->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Dob" class="billing_voucher_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<?= $Page->Dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
        <td <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
        <td <?= $Page->RefferedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<?= $Page->RefferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <td <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CardNumber" class="billing_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <td <?= $Page->BankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_BankName" class="billing_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <td <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher__UserName" class="billing_voucher__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
        <td <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance">
<span<?= $Page->AdjustmentAdvance->viewAttributes() ?>>
<?= $Page->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
        <td <?= $Page->billing_vouchercol->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol">
<span<?= $Page->billing_vouchercol->viewAttributes() ?>>
<?= $Page->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <td <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_BillType" class="billing_voucher_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
        <td <?= $Page->ProcedureName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName">
<span<?= $Page->ProcedureName->viewAttributes() ?>>
<?= $Page->ProcedureName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
        <td <?= $Page->ProcedureAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount">
<span<?= $Page->ProcedureAmount->viewAttributes() ?>>
<?= $Page->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
        <td <?= $Page->IncludePackage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage">
<span<?= $Page->IncludePackage->viewAttributes() ?>>
<?= $Page->IncludePackage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
        <td <?= $Page->CancelBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelBill" class="billing_voucher_CancelBill">
<span<?= $Page->CancelBill->viewAttributes() ?>>
<?= $Page->CancelBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelReason->Visible) { // CancelReason ?>
        <td <?= $Page->CancelReason->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelReason" class="billing_voucher_CancelReason">
<span<?= $Page->CancelReason->viewAttributes() ?>>
<?= $Page->CancelReason->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <td <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment">
<span<?= $Page->CancelModeOfPayment->viewAttributes() ?>>
<?= $Page->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
        <td <?= $Page->CancelAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount">
<span<?= $Page->CancelAmount->viewAttributes() ?>>
<?= $Page->CancelAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
        <td <?= $Page->CancelBankName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName">
<span<?= $Page->CancelBankName->viewAttributes() ?>>
<?= $Page->CancelBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <td <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber">
<span<?= $Page->CancelTransactionNumber->viewAttributes() ?>>
<?= $Page->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
        <td <?= $Page->LabTest->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_LabTest" class="billing_voucher_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<?= $Page->LabTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <td <?= $Page->sid->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_sid" class="billing_voucher_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
        <td <?= $Page->SidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_SidNo" class="billing_voucher_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<?= $Page->SidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdDatettime->Visible) { // createdDatettime ?>
        <td <?= $Page->createdDatettime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime">
<span<?= $Page->createdDatettime->viewAttributes() ?>>
<?= $Page->createdDatettime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
        <td <?= $Page->LabTestReleased->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased">
<span<?= $Page->LabTestReleased->viewAttributes() ?>>
<?= $Page->LabTestReleased->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <td <?= $Page->GoogleReviewID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID">
<span<?= $Page->GoogleReviewID->viewAttributes() ?>>
<?= $Page->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
        <td <?= $Page->CardType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_CardType" class="billing_voucher_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<?= $Page->CardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
        <td <?= $Page->PharmacyBill->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill">
<span<?= $Page->PharmacyBill->viewAttributes() ?>>
<?= $Page->PharmacyBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
        <td <?= $Page->DiscountAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<?= $Page->DiscountAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
        <td <?= $Page->Cash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Cash" class="billing_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<?= $Page->Cash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <td <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_billing_voucher_Card" class="billing_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
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
