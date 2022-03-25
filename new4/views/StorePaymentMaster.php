<?php

namespace PHPMaker2021\HIMS;

// Table
$store_payment = Container("store_payment");
?>
<?php if ($store_payment->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_store_paymentmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($store_payment->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->id->caption() ?></td>
            <td <?= $store_payment->id->cellAttributes() ?>>
<span id="el_store_payment_id">
<span<?= $store_payment->id->viewAttributes() ?>>
<?= $store_payment->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
        <tr id="r_PAYNO">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->PAYNO->caption() ?></td>
            <td <?= $store_payment->PAYNO->cellAttributes() ?>>
<span id="el_store_payment_PAYNO">
<span<?= $store_payment->PAYNO->viewAttributes() ?>>
<?= $store_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
        <tr id="r_DT">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->DT->caption() ?></td>
            <td <?= $store_payment->DT->cellAttributes() ?>>
<span id="el_store_payment_DT">
<span<?= $store_payment->DT->viewAttributes() ?>>
<?= $store_payment->DT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
        <tr id="r_YM">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->YM->caption() ?></td>
            <td <?= $store_payment->YM->cellAttributes() ?>>
<span id="el_store_payment_YM">
<span<?= $store_payment->YM->viewAttributes() ?>>
<?= $store_payment->YM->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
        <tr id="r_PC">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->PC->caption() ?></td>
            <td <?= $store_payment->PC->cellAttributes() ?>>
<span id="el_store_payment_PC">
<span<?= $store_payment->PC->viewAttributes() ?>>
<?= $store_payment->PC->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
        <tr id="r_Customercode">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Customercode->caption() ?></td>
            <td <?= $store_payment->Customercode->cellAttributes() ?>>
<span id="el_store_payment_Customercode">
<span<?= $store_payment->Customercode->viewAttributes() ?>>
<?= $store_payment->Customercode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
        <tr id="r_Customername">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Customername->caption() ?></td>
            <td <?= $store_payment->Customername->cellAttributes() ?>>
<span id="el_store_payment_Customername">
<span<?= $store_payment->Customername->viewAttributes() ?>>
<?= $store_payment->Customername->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <tr id="r_pharmacy_pocol">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->pharmacy_pocol->caption() ?></td>
            <td <?= $store_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el_store_payment_pharmacy_pocol">
<span<?= $store_payment->pharmacy_pocol->viewAttributes() ?>>
<?= $store_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
        <tr id="r_State">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->State->caption() ?></td>
            <td <?= $store_payment->State->cellAttributes() ?>>
<span id="el_store_payment_State">
<span<?= $store_payment->State->viewAttributes() ?>>
<?= $store_payment->State->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
        <tr id="r_Pincode">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Pincode->caption() ?></td>
            <td <?= $store_payment->Pincode->cellAttributes() ?>>
<span id="el_store_payment_Pincode">
<span<?= $store_payment->Pincode->viewAttributes() ?>>
<?= $store_payment->Pincode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
        <tr id="r_Phone">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Phone->caption() ?></td>
            <td <?= $store_payment->Phone->cellAttributes() ?>>
<span id="el_store_payment_Phone">
<span<?= $store_payment->Phone->viewAttributes() ?>>
<?= $store_payment->Phone->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
        <tr id="r_Fax">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Fax->caption() ?></td>
            <td <?= $store_payment->Fax->cellAttributes() ?>>
<span id="el_store_payment_Fax">
<span<?= $store_payment->Fax->viewAttributes() ?>>
<?= $store_payment->Fax->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
        <tr id="r_EEmail">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->EEmail->caption() ?></td>
            <td <?= $store_payment->EEmail->cellAttributes() ?>>
<span id="el_store_payment_EEmail">
<span<?= $store_payment->EEmail->viewAttributes() ?>>
<?= $store_payment->EEmail->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->HospID->caption() ?></td>
            <td <?= $store_payment->HospID->cellAttributes() ?>>
<span id="el_store_payment_HospID">
<span<?= $store_payment->HospID->viewAttributes() ?>>
<?= $store_payment->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->createdby->caption() ?></td>
            <td <?= $store_payment->createdby->cellAttributes() ?>>
<span id="el_store_payment_createdby">
<span<?= $store_payment->createdby->viewAttributes() ?>>
<?= $store_payment->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->createddatetime->caption() ?></td>
            <td <?= $store_payment->createddatetime->cellAttributes() ?>>
<span id="el_store_payment_createddatetime">
<span<?= $store_payment->createddatetime->viewAttributes() ?>>
<?= $store_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->modifiedby->caption() ?></td>
            <td <?= $store_payment->modifiedby->cellAttributes() ?>>
<span id="el_store_payment_modifiedby">
<span<?= $store_payment->modifiedby->viewAttributes() ?>>
<?= $store_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->modifieddatetime->caption() ?></td>
            <td <?= $store_payment->modifieddatetime->cellAttributes() ?>>
<span id="el_store_payment_modifieddatetime">
<span<?= $store_payment->modifieddatetime->viewAttributes() ?>>
<?= $store_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->PharmacyID->Visible) { // PharmacyID ?>
        <tr id="r_PharmacyID">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->PharmacyID->caption() ?></td>
            <td <?= $store_payment->PharmacyID->cellAttributes() ?>>
<span id="el_store_payment_PharmacyID">
<span<?= $store_payment->PharmacyID->viewAttributes() ?>>
<?= $store_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
        <tr id="r_BillTotalValue">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->BillTotalValue->caption() ?></td>
            <td <?= $store_payment->BillTotalValue->cellAttributes() ?>>
<span id="el_store_payment_BillTotalValue">
<span<?= $store_payment->BillTotalValue->viewAttributes() ?>>
<?= $store_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <tr id="r_GRNTotalValue">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->GRNTotalValue->caption() ?></td>
            <td <?= $store_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el_store_payment_GRNTotalValue">
<span<?= $store_payment->GRNTotalValue->viewAttributes() ?>>
<?= $store_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
        <tr id="r_BillDiscount">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->BillDiscount->caption() ?></td>
            <td <?= $store_payment->BillDiscount->cellAttributes() ?>>
<span id="el_store_payment_BillDiscount">
<span<?= $store_payment->BillDiscount->viewAttributes() ?>>
<?= $store_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
        <tr id="r_TransPort">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->TransPort->caption() ?></td>
            <td <?= $store_payment->TransPort->cellAttributes() ?>>
<span id="el_store_payment_TransPort">
<span<?= $store_payment->TransPort->viewAttributes() ?>>
<?= $store_payment->TransPort->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
        <tr id="r_AnyOther">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->AnyOther->caption() ?></td>
            <td <?= $store_payment->AnyOther->cellAttributes() ?>>
<span id="el_store_payment_AnyOther">
<span<?= $store_payment->AnyOther->viewAttributes() ?>>
<?= $store_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
        <tr id="r_voucher_type">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->voucher_type->caption() ?></td>
            <td <?= $store_payment->voucher_type->cellAttributes() ?>>
<span id="el_store_payment_voucher_type">
<span<?= $store_payment->voucher_type->viewAttributes() ?>>
<?= $store_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
        <tr id="r_Details">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Details->caption() ?></td>
            <td <?= $store_payment->Details->cellAttributes() ?>>
<span id="el_store_payment_Details">
<span<?= $store_payment->Details->viewAttributes() ?>>
<?= $store_payment->Details->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->ModeofPayment->caption() ?></td>
            <td <?= $store_payment->ModeofPayment->cellAttributes() ?>>
<span id="el_store_payment_ModeofPayment">
<span<?= $store_payment->ModeofPayment->viewAttributes() ?>>
<?= $store_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Amount->caption() ?></td>
            <td <?= $store_payment->Amount->cellAttributes() ?>>
<span id="el_store_payment_Amount">
<span<?= $store_payment->Amount->viewAttributes() ?>>
<?= $store_payment->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
        <tr id="r_BankName">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->BankName->caption() ?></td>
            <td <?= $store_payment->BankName->cellAttributes() ?>>
<span id="el_store_payment_BankName">
<span<?= $store_payment->BankName->viewAttributes() ?>>
<?= $store_payment->BankName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
        <tr id="r_AccountNumber">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->AccountNumber->caption() ?></td>
            <td <?= $store_payment->AccountNumber->cellAttributes() ?>>
<span id="el_store_payment_AccountNumber">
<span<?= $store_payment->AccountNumber->viewAttributes() ?>>
<?= $store_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
        <tr id="r_chequeNumber">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->chequeNumber->caption() ?></td>
            <td <?= $store_payment->chequeNumber->cellAttributes() ?>>
<span id="el_store_payment_chequeNumber">
<span<?= $store_payment->chequeNumber->viewAttributes() ?>>
<?= $store_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <tr id="r_SeectPaymentMode">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->SeectPaymentMode->caption() ?></td>
            <td <?= $store_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el_store_payment_SeectPaymentMode">
<span<?= $store_payment->SeectPaymentMode->viewAttributes() ?>>
<?= $store_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
        <tr id="r_PaidAmount">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->PaidAmount->caption() ?></td>
            <td <?= $store_payment->PaidAmount->cellAttributes() ?>>
<span id="el_store_payment_PaidAmount">
<span<?= $store_payment->PaidAmount->viewAttributes() ?>>
<?= $store_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
        <tr id="r_Currency">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->Currency->caption() ?></td>
            <td <?= $store_payment->Currency->cellAttributes() ?>>
<span id="el_store_payment_Currency">
<span<?= $store_payment->Currency->viewAttributes() ?>>
<?= $store_payment->Currency->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
        <tr id="r_CardNumber">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->CardNumber->caption() ?></td>
            <td <?= $store_payment->CardNumber->cellAttributes() ?>>
<span id="el_store_payment_CardNumber">
<span<?= $store_payment->CardNumber->viewAttributes() ?>>
<?= $store_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
        <tr id="r_BranchID">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->BranchID->caption() ?></td>
            <td <?= $store_payment->BranchID->cellAttributes() ?>>
<span id="el_store_payment_BranchID">
<span<?= $store_payment->BranchID->viewAttributes() ?>>
<?= $store_payment->BranchID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
        <tr id="r_StoreID">
            <td class="<?= $store_payment->TableLeftColumnClass ?>"><?= $store_payment->StoreID->caption() ?></td>
            <td <?= $store_payment->StoreID->cellAttributes() ?>>
<span id="el_store_payment_StoreID">
<span<?= $store_payment->StoreID->viewAttributes() ?>>
<?= $store_payment->StoreID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
