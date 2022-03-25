<?php

namespace PHPMaker2021\HIMS;

// Table
$billing_voucher = Container("billing_voucher");
?>
<?php if ($billing_voucher->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_billing_vouchermaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($billing_voucher->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->id->caption() ?></td>
            <td <?= $billing_voucher->id->cellAttributes() ?>>
<span id="el_billing_voucher_id">
<span<?= $billing_voucher->id->viewAttributes() ?>>
<?= $billing_voucher->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->PatId->Visible) { // PatId ?>
        <tr id="r_PatId">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->PatId->caption() ?></td>
            <td <?= $billing_voucher->PatId->cellAttributes() ?>>
<span id="el_billing_voucher_PatId">
<span<?= $billing_voucher->PatId->viewAttributes() ?>><?= Barcode()->show($billing_voucher->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->BillNumber->Visible) { // BillNumber ?>
        <tr id="r_BillNumber">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->BillNumber->caption() ?></td>
            <td <?= $billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el_billing_voucher_BillNumber">
<span<?= $billing_voucher->BillNumber->viewAttributes() ?>>
<?= $billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
        <tr id="r_PatientId">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->PatientId->caption() ?></td>
            <td <?= $billing_voucher->PatientId->cellAttributes() ?>>
<span id="el_billing_voucher_PatientId">
<span>
<?= GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->getViewValue()) ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->PatientName->caption() ?></td>
            <td <?= $billing_voucher->PatientName->cellAttributes() ?>>
<span id="el_billing_voucher_PatientName">
<span<?= $billing_voucher->PatientName->viewAttributes() ?>>
<?= $billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
        <tr id="r_Gender">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->Gender->caption() ?></td>
            <td <?= $billing_voucher->Gender->cellAttributes() ?>>
<span id="el_billing_voucher_Gender">
<span<?= $billing_voucher->Gender->viewAttributes() ?>>
<?= $billing_voucher->Gender->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
        <tr id="r_Mobile">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->Mobile->caption() ?></td>
            <td <?= $billing_voucher->Mobile->cellAttributes() ?>>
<span id="el_billing_voucher_Mobile">
<span<?= $billing_voucher->Mobile->viewAttributes() ?>>
<?= $billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->Doctor->caption() ?></td>
            <td <?= $billing_voucher->Doctor->cellAttributes() ?>>
<span id="el_billing_voucher_Doctor">
<span<?= $billing_voucher->Doctor->viewAttributes() ?>>
<?= $billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->ModeofPayment->caption() ?></td>
            <td <?= $billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el_billing_voucher_ModeofPayment">
<span<?= $billing_voucher->ModeofPayment->viewAttributes() ?>>
<?= $billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->Amount->caption() ?></td>
            <td <?= $billing_voucher->Amount->cellAttributes() ?>>
<span id="el_billing_voucher_Amount">
<span<?= $billing_voucher->Amount->viewAttributes() ?>>
<?= $billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
        <tr id="r_AnyDues">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->AnyDues->caption() ?></td>
            <td <?= $billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el_billing_voucher_AnyDues">
<span<?= $billing_voucher->AnyDues->viewAttributes() ?>>
<?= $billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->createdby->caption() ?></td>
            <td <?= $billing_voucher->createdby->cellAttributes() ?>>
<span id="el_billing_voucher_createdby">
<span<?= $billing_voucher->createdby->viewAttributes() ?>>
<?= $billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->createddatetime->caption() ?></td>
            <td <?= $billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el_billing_voucher_createddatetime">
<span<?= $billing_voucher->createddatetime->viewAttributes() ?>>
<?= $billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->modifiedby->caption() ?></td>
            <td <?= $billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el_billing_voucher_modifiedby">
<span<?= $billing_voucher->modifiedby->viewAttributes() ?>>
<?= $billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->modifieddatetime->caption() ?></td>
            <td <?= $billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el_billing_voucher_modifieddatetime">
<span<?= $billing_voucher->modifieddatetime->viewAttributes() ?>>
<?= $billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->HospID->caption() ?></td>
            <td <?= $billing_voucher->HospID->cellAttributes() ?>>
<span id="el_billing_voucher_HospID">
<span<?= $billing_voucher->HospID->viewAttributes() ?>>
<?= $billing_voucher->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
        <tr id="r_RIDNO">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->RIDNO->caption() ?></td>
            <td <?= $billing_voucher->RIDNO->cellAttributes() ?>>
<span id="el_billing_voucher_RIDNO">
<span<?= $billing_voucher->RIDNO->viewAttributes() ?>>
<?= $billing_voucher->RIDNO->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
        <tr id="r_TidNo">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->TidNo->caption() ?></td>
            <td <?= $billing_voucher->TidNo->cellAttributes() ?>>
<span id="el_billing_voucher_TidNo">
<span<?= $billing_voucher->TidNo->viewAttributes() ?>>
<?= $billing_voucher->TidNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CId->Visible) { // CId ?>
        <tr id="r_CId">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CId->caption() ?></td>
            <td <?= $billing_voucher->CId->cellAttributes() ?>>
<span id="el_billing_voucher_CId">
<span<?= $billing_voucher->CId->viewAttributes() ?>>
<?= $billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->PartnerName->Visible) { // PartnerName ?>
        <tr id="r_PartnerName">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->PartnerName->caption() ?></td>
            <td <?= $billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el_billing_voucher_PartnerName">
<span<?= $billing_voucher->PartnerName->viewAttributes() ?>>
<?= $billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->PayerType->Visible) { // PayerType ?>
        <tr id="r_PayerType">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->PayerType->caption() ?></td>
            <td <?= $billing_voucher->PayerType->cellAttributes() ?>>
<span id="el_billing_voucher_PayerType">
<span<?= $billing_voucher->PayerType->viewAttributes() ?>>
<?= $billing_voucher->PayerType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->Dob->Visible) { // Dob ?>
        <tr id="r_Dob">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->Dob->caption() ?></td>
            <td <?= $billing_voucher->Dob->cellAttributes() ?>>
<span id="el_billing_voucher_Dob">
<span<?= $billing_voucher->Dob->viewAttributes() ?>>
<?= $billing_voucher->Dob->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
        <tr id="r_DrDepartment">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->DrDepartment->caption() ?></td>
            <td <?= $billing_voucher->DrDepartment->cellAttributes() ?>>
<span id="el_billing_voucher_DrDepartment">
<span<?= $billing_voucher->DrDepartment->viewAttributes() ?>>
<?= $billing_voucher->DrDepartment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
        <tr id="r_RefferedBy">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->RefferedBy->caption() ?></td>
            <td <?= $billing_voucher->RefferedBy->cellAttributes() ?>>
<span id="el_billing_voucher_RefferedBy">
<span<?= $billing_voucher->RefferedBy->viewAttributes() ?>>
<?= $billing_voucher->RefferedBy->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CardNumber->Visible) { // CardNumber ?>
        <tr id="r_CardNumber">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CardNumber->caption() ?></td>
            <td <?= $billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el_billing_voucher_CardNumber">
<span<?= $billing_voucher->CardNumber->viewAttributes() ?>>
<?= $billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->BankName->Visible) { // BankName ?>
        <tr id="r_BankName">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->BankName->caption() ?></td>
            <td <?= $billing_voucher->BankName->cellAttributes() ?>>
<span id="el_billing_voucher_BankName">
<span<?= $billing_voucher->BankName->viewAttributes() ?>>
<?= $billing_voucher->BankName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->_UserName->Visible) { // UserName ?>
        <tr id="r__UserName">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->_UserName->caption() ?></td>
            <td <?= $billing_voucher->_UserName->cellAttributes() ?>>
<span id="el_billing_voucher__UserName">
<span<?= $billing_voucher->_UserName->viewAttributes() ?>>
<?= $billing_voucher->_UserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
        <tr id="r_AdjustmentAdvance">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->AdjustmentAdvance->caption() ?></td>
            <td <?= $billing_voucher->AdjustmentAdvance->cellAttributes() ?>>
<span id="el_billing_voucher_AdjustmentAdvance">
<span<?= $billing_voucher->AdjustmentAdvance->viewAttributes() ?>>
<?= $billing_voucher->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
        <tr id="r_billing_vouchercol">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->billing_vouchercol->caption() ?></td>
            <td <?= $billing_voucher->billing_vouchercol->cellAttributes() ?>>
<span id="el_billing_voucher_billing_vouchercol">
<span<?= $billing_voucher->billing_vouchercol->viewAttributes() ?>>
<?= $billing_voucher->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->BillType->Visible) { // BillType ?>
        <tr id="r_BillType">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->BillType->caption() ?></td>
            <td <?= $billing_voucher->BillType->cellAttributes() ?>>
<span id="el_billing_voucher_BillType">
<span<?= $billing_voucher->BillType->viewAttributes() ?>>
<?= $billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
        <tr id="r_ProcedureName">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->ProcedureName->caption() ?></td>
            <td <?= $billing_voucher->ProcedureName->cellAttributes() ?>>
<span id="el_billing_voucher_ProcedureName">
<span<?= $billing_voucher->ProcedureName->viewAttributes() ?>>
<?= $billing_voucher->ProcedureName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
        <tr id="r_ProcedureAmount">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->ProcedureAmount->caption() ?></td>
            <td <?= $billing_voucher->ProcedureAmount->cellAttributes() ?>>
<span id="el_billing_voucher_ProcedureAmount">
<span<?= $billing_voucher->ProcedureAmount->viewAttributes() ?>>
<?= $billing_voucher->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
        <tr id="r_IncludePackage">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->IncludePackage->caption() ?></td>
            <td <?= $billing_voucher->IncludePackage->cellAttributes() ?>>
<span id="el_billing_voucher_IncludePackage">
<span<?= $billing_voucher->IncludePackage->viewAttributes() ?>>
<?= $billing_voucher->IncludePackage->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CancelBill->Visible) { // CancelBill ?>
        <tr id="r_CancelBill">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CancelBill->caption() ?></td>
            <td <?= $billing_voucher->CancelBill->cellAttributes() ?>>
<span id="el_billing_voucher_CancelBill">
<span<?= $billing_voucher->CancelBill->viewAttributes() ?>>
<?= $billing_voucher->CancelBill->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CancelReason->Visible) { // CancelReason ?>
        <tr id="r_CancelReason">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CancelReason->caption() ?></td>
            <td <?= $billing_voucher->CancelReason->cellAttributes() ?>>
<span id="el_billing_voucher_CancelReason">
<span<?= $billing_voucher->CancelReason->viewAttributes() ?>>
<?= $billing_voucher->CancelReason->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
        <tr id="r_CancelModeOfPayment">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CancelModeOfPayment->caption() ?></td>
            <td <?= $billing_voucher->CancelModeOfPayment->cellAttributes() ?>>
<span id="el_billing_voucher_CancelModeOfPayment">
<span<?= $billing_voucher->CancelModeOfPayment->viewAttributes() ?>>
<?= $billing_voucher->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
        <tr id="r_CancelAmount">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CancelAmount->caption() ?></td>
            <td <?= $billing_voucher->CancelAmount->cellAttributes() ?>>
<span id="el_billing_voucher_CancelAmount">
<span<?= $billing_voucher->CancelAmount->viewAttributes() ?>>
<?= $billing_voucher->CancelAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
        <tr id="r_CancelBankName">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CancelBankName->caption() ?></td>
            <td <?= $billing_voucher->CancelBankName->cellAttributes() ?>>
<span id="el_billing_voucher_CancelBankName">
<span<?= $billing_voucher->CancelBankName->viewAttributes() ?>>
<?= $billing_voucher->CancelBankName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
        <tr id="r_CancelTransactionNumber">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CancelTransactionNumber->caption() ?></td>
            <td <?= $billing_voucher->CancelTransactionNumber->cellAttributes() ?>>
<span id="el_billing_voucher_CancelTransactionNumber">
<span<?= $billing_voucher->CancelTransactionNumber->viewAttributes() ?>>
<?= $billing_voucher->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->LabTest->Visible) { // LabTest ?>
        <tr id="r_LabTest">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->LabTest->caption() ?></td>
            <td <?= $billing_voucher->LabTest->cellAttributes() ?>>
<span id="el_billing_voucher_LabTest">
<span<?= $billing_voucher->LabTest->viewAttributes() ?>>
<?= $billing_voucher->LabTest->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->sid->Visible) { // sid ?>
        <tr id="r_sid">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->sid->caption() ?></td>
            <td <?= $billing_voucher->sid->cellAttributes() ?>>
<span id="el_billing_voucher_sid">
<span<?= $billing_voucher->sid->viewAttributes() ?>>
<?= $billing_voucher->sid->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->SidNo->Visible) { // SidNo ?>
        <tr id="r_SidNo">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->SidNo->caption() ?></td>
            <td <?= $billing_voucher->SidNo->cellAttributes() ?>>
<span id="el_billing_voucher_SidNo">
<span<?= $billing_voucher->SidNo->viewAttributes() ?>>
<?= $billing_voucher->SidNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
        <tr id="r_createdDatettime">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->createdDatettime->caption() ?></td>
            <td <?= $billing_voucher->createdDatettime->cellAttributes() ?>>
<span id="el_billing_voucher_createdDatettime">
<span<?= $billing_voucher->createdDatettime->viewAttributes() ?>>
<?= $billing_voucher->createdDatettime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
        <tr id="r_LabTestReleased">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->LabTestReleased->caption() ?></td>
            <td <?= $billing_voucher->LabTestReleased->cellAttributes() ?>>
<span id="el_billing_voucher_LabTestReleased">
<span<?= $billing_voucher->LabTestReleased->viewAttributes() ?>>
<?= $billing_voucher->LabTestReleased->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
        <tr id="r_GoogleReviewID">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->GoogleReviewID->caption() ?></td>
            <td <?= $billing_voucher->GoogleReviewID->cellAttributes() ?>>
<span id="el_billing_voucher_GoogleReviewID">
<span<?= $billing_voucher->GoogleReviewID->viewAttributes() ?>>
<?= $billing_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->CardType->Visible) { // CardType ?>
        <tr id="r_CardType">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->CardType->caption() ?></td>
            <td <?= $billing_voucher->CardType->cellAttributes() ?>>
<span id="el_billing_voucher_CardType">
<span<?= $billing_voucher->CardType->viewAttributes() ?>>
<?= $billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
        <tr id="r_PharmacyBill">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->PharmacyBill->caption() ?></td>
            <td <?= $billing_voucher->PharmacyBill->cellAttributes() ?>>
<span id="el_billing_voucher_PharmacyBill">
<span<?= $billing_voucher->PharmacyBill->viewAttributes() ?>>
<?= $billing_voucher->PharmacyBill->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
        <tr id="r_DiscountAmount">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->DiscountAmount->caption() ?></td>
            <td <?= $billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el_billing_voucher_DiscountAmount">
<span<?= $billing_voucher->DiscountAmount->viewAttributes() ?>>
<?= $billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->Cash->Visible) { // Cash ?>
        <tr id="r_Cash">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->Cash->caption() ?></td>
            <td <?= $billing_voucher->Cash->cellAttributes() ?>>
<span id="el_billing_voucher_Cash">
<span<?= $billing_voucher->Cash->viewAttributes() ?>>
<?= $billing_voucher->Cash->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($billing_voucher->Card->Visible) { // Card ?>
        <tr id="r_Card">
            <td class="<?= $billing_voucher->TableLeftColumnClass ?>"><?= $billing_voucher->Card->caption() ?></td>
            <td <?= $billing_voucher->Card->cellAttributes() ?>>
<span id="el_billing_voucher_Card">
<span<?= $billing_voucher->Card->viewAttributes() ?>>
<?= $billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
