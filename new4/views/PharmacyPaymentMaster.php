<?php

namespace PHPMaker2021\HIMS;

// Table
$pharmacy_payment = Container("pharmacy_payment");
?>
<?php if ($pharmacy_payment->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_paymentmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($pharmacy_payment->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->id->caption() ?></td>
            <td <?= $pharmacy_payment->id->cellAttributes() ?>>
<span id="el_pharmacy_payment_id">
<span<?= $pharmacy_payment->id->viewAttributes() ?>>
<?= $pharmacy_payment->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
        <tr id="r_PAYNO">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->PAYNO->caption() ?></td>
            <td <?= $pharmacy_payment->PAYNO->cellAttributes() ?>>
<span id="el_pharmacy_payment_PAYNO">
<span<?= $pharmacy_payment->PAYNO->viewAttributes() ?>>
<?= $pharmacy_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
        <tr id="r_DT">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->DT->caption() ?></td>
            <td <?= $pharmacy_payment->DT->cellAttributes() ?>>
<span id="el_pharmacy_payment_DT">
<span<?= $pharmacy_payment->DT->viewAttributes() ?>>
<?= $pharmacy_payment->DT->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
        <tr id="r_YM">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->YM->caption() ?></td>
            <td <?= $pharmacy_payment->YM->cellAttributes() ?>>
<span id="el_pharmacy_payment_YM">
<span<?= $pharmacy_payment->YM->viewAttributes() ?>>
<?= $pharmacy_payment->YM->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
        <tr id="r_PC">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->PC->caption() ?></td>
            <td <?= $pharmacy_payment->PC->cellAttributes() ?>>
<span id="el_pharmacy_payment_PC">
<span<?= $pharmacy_payment->PC->viewAttributes() ?>>
<?= $pharmacy_payment->PC->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
        <tr id="r_Customercode">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Customercode->caption() ?></td>
            <td <?= $pharmacy_payment->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customercode">
<span<?= $pharmacy_payment->Customercode->viewAttributes() ?>>
<?= $pharmacy_payment->Customercode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
        <tr id="r_Customername">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Customername->caption() ?></td>
            <td <?= $pharmacy_payment->Customername->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customername">
<span<?= $pharmacy_payment->Customername->viewAttributes() ?>>
<?= $pharmacy_payment->Customername->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
        <tr id="r_pharmacy_pocol">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->pharmacy_pocol->caption() ?></td>
            <td <?= $pharmacy_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el_pharmacy_payment_pharmacy_pocol">
<span<?= $pharmacy_payment->pharmacy_pocol->viewAttributes() ?>>
<?= $pharmacy_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->State->Visible) { // State ?>
        <tr id="r_State">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->State->caption() ?></td>
            <td <?= $pharmacy_payment->State->cellAttributes() ?>>
<span id="el_pharmacy_payment_State">
<span<?= $pharmacy_payment->State->viewAttributes() ?>>
<?= $pharmacy_payment->State->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
        <tr id="r_Pincode">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Pincode->caption() ?></td>
            <td <?= $pharmacy_payment->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Pincode">
<span<?= $pharmacy_payment->Pincode->viewAttributes() ?>>
<?= $pharmacy_payment->Pincode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
        <tr id="r_Phone">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Phone->caption() ?></td>
            <td <?= $pharmacy_payment->Phone->cellAttributes() ?>>
<span id="el_pharmacy_payment_Phone">
<span<?= $pharmacy_payment->Phone->viewAttributes() ?>>
<?= $pharmacy_payment->Phone->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
        <tr id="r_Fax">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Fax->caption() ?></td>
            <td <?= $pharmacy_payment->Fax->cellAttributes() ?>>
<span id="el_pharmacy_payment_Fax">
<span<?= $pharmacy_payment->Fax->viewAttributes() ?>>
<?= $pharmacy_payment->Fax->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
        <tr id="r_EEmail">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->EEmail->caption() ?></td>
            <td <?= $pharmacy_payment->EEmail->cellAttributes() ?>>
<span id="el_pharmacy_payment_EEmail">
<span<?= $pharmacy_payment->EEmail->viewAttributes() ?>>
<?= $pharmacy_payment->EEmail->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->HospID->caption() ?></td>
            <td <?= $pharmacy_payment->HospID->cellAttributes() ?>>
<span id="el_pharmacy_payment_HospID">
<span<?= $pharmacy_payment->HospID->viewAttributes() ?>>
<?= $pharmacy_payment->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->createdby->caption() ?></td>
            <td <?= $pharmacy_payment->createdby->cellAttributes() ?>>
<span id="el_pharmacy_payment_createdby">
<span<?= $pharmacy_payment->createdby->viewAttributes() ?>>
<?= $pharmacy_payment->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->createddatetime->caption() ?></td>
            <td <?= $pharmacy_payment->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_createddatetime">
<span<?= $pharmacy_payment->createddatetime->viewAttributes() ?>>
<?= $pharmacy_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->modifiedby->caption() ?></td>
            <td <?= $pharmacy_payment->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifiedby">
<span<?= $pharmacy_payment->modifiedby->viewAttributes() ?>>
<?= $pharmacy_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->modifieddatetime->caption() ?></td>
            <td <?= $pharmacy_payment->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifieddatetime">
<span<?= $pharmacy_payment->modifieddatetime->viewAttributes() ?>>
<?= $pharmacy_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
        <tr id="r_PharmacyID">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->PharmacyID->caption() ?></td>
            <td <?= $pharmacy_payment->PharmacyID->cellAttributes() ?>>
<span id="el_pharmacy_payment_PharmacyID">
<span<?= $pharmacy_payment->PharmacyID->viewAttributes() ?>>
<?= $pharmacy_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
        <tr id="r_BillTotalValue">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->BillTotalValue->caption() ?></td>
            <td <?= $pharmacy_payment->BillTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillTotalValue">
<span<?= $pharmacy_payment->BillTotalValue->viewAttributes() ?>>
<?= $pharmacy_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <tr id="r_GRNTotalValue">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->GRNTotalValue->caption() ?></td>
            <td <?= $pharmacy_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_GRNTotalValue">
<span<?= $pharmacy_payment->GRNTotalValue->viewAttributes() ?>>
<?= $pharmacy_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
        <tr id="r_BillDiscount">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->BillDiscount->caption() ?></td>
            <td <?= $pharmacy_payment->BillDiscount->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillDiscount">
<span<?= $pharmacy_payment->BillDiscount->viewAttributes() ?>>
<?= $pharmacy_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
        <tr id="r_TransPort">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->TransPort->caption() ?></td>
            <td <?= $pharmacy_payment->TransPort->cellAttributes() ?>>
<span id="el_pharmacy_payment_TransPort">
<span<?= $pharmacy_payment->TransPort->viewAttributes() ?>>
<?= $pharmacy_payment->TransPort->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
        <tr id="r_AnyOther">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->AnyOther->caption() ?></td>
            <td <?= $pharmacy_payment->AnyOther->cellAttributes() ?>>
<span id="el_pharmacy_payment_AnyOther">
<span<?= $pharmacy_payment->AnyOther->viewAttributes() ?>>
<?= $pharmacy_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
        <tr id="r_voucher_type">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->voucher_type->caption() ?></td>
            <td <?= $pharmacy_payment->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_payment_voucher_type">
<span<?= $pharmacy_payment->voucher_type->viewAttributes() ?>>
<?= $pharmacy_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
        <tr id="r_Details">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Details->caption() ?></td>
            <td <?= $pharmacy_payment->Details->cellAttributes() ?>>
<span id="el_pharmacy_payment_Details">
<span<?= $pharmacy_payment->Details->viewAttributes() ?>>
<?= $pharmacy_payment->Details->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
        <tr id="r_ModeofPayment">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->ModeofPayment->caption() ?></td>
            <td <?= $pharmacy_payment->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_payment_ModeofPayment">
<span<?= $pharmacy_payment->ModeofPayment->viewAttributes() ?>>
<?= $pharmacy_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
        <tr id="r_Amount">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Amount->caption() ?></td>
            <td <?= $pharmacy_payment->Amount->cellAttributes() ?>>
<span id="el_pharmacy_payment_Amount">
<span<?= $pharmacy_payment->Amount->viewAttributes() ?>>
<?= $pharmacy_payment->Amount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
        <tr id="r_BankName">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->BankName->caption() ?></td>
            <td <?= $pharmacy_payment->BankName->cellAttributes() ?>>
<span id="el_pharmacy_payment_BankName">
<span<?= $pharmacy_payment->BankName->viewAttributes() ?>>
<?= $pharmacy_payment->BankName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
        <tr id="r_AccountNumber">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->AccountNumber->caption() ?></td>
            <td <?= $pharmacy_payment->AccountNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_AccountNumber">
<span<?= $pharmacy_payment->AccountNumber->viewAttributes() ?>>
<?= $pharmacy_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
        <tr id="r_chequeNumber">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->chequeNumber->caption() ?></td>
            <td <?= $pharmacy_payment->chequeNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_chequeNumber">
<span<?= $pharmacy_payment->chequeNumber->viewAttributes() ?>>
<?= $pharmacy_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <tr id="r_SeectPaymentMode">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->SeectPaymentMode->caption() ?></td>
            <td <?= $pharmacy_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el_pharmacy_payment_SeectPaymentMode">
<span<?= $pharmacy_payment->SeectPaymentMode->viewAttributes() ?>>
<?= $pharmacy_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
        <tr id="r_PaidAmount">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->PaidAmount->caption() ?></td>
            <td <?= $pharmacy_payment->PaidAmount->cellAttributes() ?>>
<span id="el_pharmacy_payment_PaidAmount">
<span<?= $pharmacy_payment->PaidAmount->viewAttributes() ?>>
<?= $pharmacy_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
        <tr id="r_Currency">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->Currency->caption() ?></td>
            <td <?= $pharmacy_payment->Currency->cellAttributes() ?>>
<span id="el_pharmacy_payment_Currency">
<span<?= $pharmacy_payment->Currency->viewAttributes() ?>>
<?= $pharmacy_payment->Currency->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
        <tr id="r_CardNumber">
            <td class="<?= $pharmacy_payment->TableLeftColumnClass ?>"><?= $pharmacy_payment->CardNumber->caption() ?></td>
            <td <?= $pharmacy_payment->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_CardNumber">
<span<?= $pharmacy_payment->CardNumber->viewAttributes() ?>>
<?= $pharmacy_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
