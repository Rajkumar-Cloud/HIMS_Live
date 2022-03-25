<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($store_payment->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_store_paymentmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($store_payment->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->id->caption() ?></td>
			<td<?php echo $store_payment->id->cellAttributes() ?>>
<span id="el_store_payment_id">
<span<?php echo $store_payment->id->viewAttributes() ?>>
<?php echo $store_payment->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->PAYNO->Visible) { // PAYNO ?>
		<tr id="r_PAYNO">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->PAYNO->caption() ?></td>
			<td<?php echo $store_payment->PAYNO->cellAttributes() ?>>
<span id="el_store_payment_PAYNO">
<span<?php echo $store_payment->PAYNO->viewAttributes() ?>>
<?php echo $store_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->DT->Visible) { // DT ?>
		<tr id="r_DT">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->DT->caption() ?></td>
			<td<?php echo $store_payment->DT->cellAttributes() ?>>
<span id="el_store_payment_DT">
<span<?php echo $store_payment->DT->viewAttributes() ?>>
<?php echo $store_payment->DT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->YM->Visible) { // YM ?>
		<tr id="r_YM">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->YM->caption() ?></td>
			<td<?php echo $store_payment->YM->cellAttributes() ?>>
<span id="el_store_payment_YM">
<span<?php echo $store_payment->YM->viewAttributes() ?>>
<?php echo $store_payment->YM->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->PC->Visible) { // PC ?>
		<tr id="r_PC">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->PC->caption() ?></td>
			<td<?php echo $store_payment->PC->cellAttributes() ?>>
<span id="el_store_payment_PC">
<span<?php echo $store_payment->PC->viewAttributes() ?>>
<?php echo $store_payment->PC->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Customercode->Visible) { // Customercode ?>
		<tr id="r_Customercode">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Customercode->caption() ?></td>
			<td<?php echo $store_payment->Customercode->cellAttributes() ?>>
<span id="el_store_payment_Customercode">
<span<?php echo $store_payment->Customercode->viewAttributes() ?>>
<?php echo $store_payment->Customercode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Customername->Visible) { // Customername ?>
		<tr id="r_Customername">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Customername->caption() ?></td>
			<td<?php echo $store_payment->Customername->cellAttributes() ?>>
<span id="el_store_payment_Customername">
<span<?php echo $store_payment->Customername->viewAttributes() ?>>
<?php echo $store_payment->Customername->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<tr id="r_pharmacy_pocol">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->pharmacy_pocol->caption() ?></td>
			<td<?php echo $store_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el_store_payment_pharmacy_pocol">
<span<?php echo $store_payment->pharmacy_pocol->viewAttributes() ?>>
<?php echo $store_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->State->Visible) { // State ?>
		<tr id="r_State">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->State->caption() ?></td>
			<td<?php echo $store_payment->State->cellAttributes() ?>>
<span id="el_store_payment_State">
<span<?php echo $store_payment->State->viewAttributes() ?>>
<?php echo $store_payment->State->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Pincode->Visible) { // Pincode ?>
		<tr id="r_Pincode">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Pincode->caption() ?></td>
			<td<?php echo $store_payment->Pincode->cellAttributes() ?>>
<span id="el_store_payment_Pincode">
<span<?php echo $store_payment->Pincode->viewAttributes() ?>>
<?php echo $store_payment->Pincode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Phone->Visible) { // Phone ?>
		<tr id="r_Phone">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Phone->caption() ?></td>
			<td<?php echo $store_payment->Phone->cellAttributes() ?>>
<span id="el_store_payment_Phone">
<span<?php echo $store_payment->Phone->viewAttributes() ?>>
<?php echo $store_payment->Phone->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Fax->Visible) { // Fax ?>
		<tr id="r_Fax">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Fax->caption() ?></td>
			<td<?php echo $store_payment->Fax->cellAttributes() ?>>
<span id="el_store_payment_Fax">
<span<?php echo $store_payment->Fax->viewAttributes() ?>>
<?php echo $store_payment->Fax->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->EEmail->Visible) { // EEmail ?>
		<tr id="r_EEmail">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->EEmail->caption() ?></td>
			<td<?php echo $store_payment->EEmail->cellAttributes() ?>>
<span id="el_store_payment_EEmail">
<span<?php echo $store_payment->EEmail->viewAttributes() ?>>
<?php echo $store_payment->EEmail->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->HospID->caption() ?></td>
			<td<?php echo $store_payment->HospID->cellAttributes() ?>>
<span id="el_store_payment_HospID">
<span<?php echo $store_payment->HospID->viewAttributes() ?>>
<?php echo $store_payment->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->createdby->caption() ?></td>
			<td<?php echo $store_payment->createdby->cellAttributes() ?>>
<span id="el_store_payment_createdby">
<span<?php echo $store_payment->createdby->viewAttributes() ?>>
<?php echo $store_payment->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->createddatetime->caption() ?></td>
			<td<?php echo $store_payment->createddatetime->cellAttributes() ?>>
<span id="el_store_payment_createddatetime">
<span<?php echo $store_payment->createddatetime->viewAttributes() ?>>
<?php echo $store_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->modifiedby->caption() ?></td>
			<td<?php echo $store_payment->modifiedby->cellAttributes() ?>>
<span id="el_store_payment_modifiedby">
<span<?php echo $store_payment->modifiedby->viewAttributes() ?>>
<?php echo $store_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->modifieddatetime->caption() ?></td>
			<td<?php echo $store_payment->modifieddatetime->cellAttributes() ?>>
<span id="el_store_payment_modifieddatetime">
<span<?php echo $store_payment->modifieddatetime->viewAttributes() ?>>
<?php echo $store_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->PharmacyID->Visible) { // PharmacyID ?>
		<tr id="r_PharmacyID">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->PharmacyID->caption() ?></td>
			<td<?php echo $store_payment->PharmacyID->cellAttributes() ?>>
<span id="el_store_payment_PharmacyID">
<span<?php echo $store_payment->PharmacyID->viewAttributes() ?>>
<?php echo $store_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<tr id="r_BillTotalValue">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->BillTotalValue->caption() ?></td>
			<td<?php echo $store_payment->BillTotalValue->cellAttributes() ?>>
<span id="el_store_payment_BillTotalValue">
<span<?php echo $store_payment->BillTotalValue->viewAttributes() ?>>
<?php echo $store_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<tr id="r_GRNTotalValue">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->GRNTotalValue->caption() ?></td>
			<td<?php echo $store_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el_store_payment_GRNTotalValue">
<span<?php echo $store_payment->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->BillDiscount->Visible) { // BillDiscount ?>
		<tr id="r_BillDiscount">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->BillDiscount->caption() ?></td>
			<td<?php echo $store_payment->BillDiscount->cellAttributes() ?>>
<span id="el_store_payment_BillDiscount">
<span<?php echo $store_payment->BillDiscount->viewAttributes() ?>>
<?php echo $store_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->TransPort->Visible) { // TransPort ?>
		<tr id="r_TransPort">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->TransPort->caption() ?></td>
			<td<?php echo $store_payment->TransPort->cellAttributes() ?>>
<span id="el_store_payment_TransPort">
<span<?php echo $store_payment->TransPort->viewAttributes() ?>>
<?php echo $store_payment->TransPort->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->AnyOther->Visible) { // AnyOther ?>
		<tr id="r_AnyOther">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->AnyOther->caption() ?></td>
			<td<?php echo $store_payment->AnyOther->cellAttributes() ?>>
<span id="el_store_payment_AnyOther">
<span<?php echo $store_payment->AnyOther->viewAttributes() ?>>
<?php echo $store_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->voucher_type->Visible) { // voucher_type ?>
		<tr id="r_voucher_type">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->voucher_type->caption() ?></td>
			<td<?php echo $store_payment->voucher_type->cellAttributes() ?>>
<span id="el_store_payment_voucher_type">
<span<?php echo $store_payment->voucher_type->viewAttributes() ?>>
<?php echo $store_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Details->Visible) { // Details ?>
		<tr id="r_Details">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Details->caption() ?></td>
			<td<?php echo $store_payment->Details->cellAttributes() ?>>
<span id="el_store_payment_Details">
<span<?php echo $store_payment->Details->viewAttributes() ?>>
<?php echo $store_payment->Details->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->ModeofPayment->caption() ?></td>
			<td<?php echo $store_payment->ModeofPayment->cellAttributes() ?>>
<span id="el_store_payment_ModeofPayment">
<span<?php echo $store_payment->ModeofPayment->viewAttributes() ?>>
<?php echo $store_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Amount->caption() ?></td>
			<td<?php echo $store_payment->Amount->cellAttributes() ?>>
<span id="el_store_payment_Amount">
<span<?php echo $store_payment->Amount->viewAttributes() ?>>
<?php echo $store_payment->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->BankName->Visible) { // BankName ?>
		<tr id="r_BankName">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->BankName->caption() ?></td>
			<td<?php echo $store_payment->BankName->cellAttributes() ?>>
<span id="el_store_payment_BankName">
<span<?php echo $store_payment->BankName->viewAttributes() ?>>
<?php echo $store_payment->BankName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->AccountNumber->Visible) { // AccountNumber ?>
		<tr id="r_AccountNumber">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->AccountNumber->caption() ?></td>
			<td<?php echo $store_payment->AccountNumber->cellAttributes() ?>>
<span id="el_store_payment_AccountNumber">
<span<?php echo $store_payment->AccountNumber->viewAttributes() ?>>
<?php echo $store_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->chequeNumber->Visible) { // chequeNumber ?>
		<tr id="r_chequeNumber">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->chequeNumber->caption() ?></td>
			<td<?php echo $store_payment->chequeNumber->cellAttributes() ?>>
<span id="el_store_payment_chequeNumber">
<span<?php echo $store_payment->chequeNumber->viewAttributes() ?>>
<?php echo $store_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<tr id="r_SeectPaymentMode">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->SeectPaymentMode->caption() ?></td>
			<td<?php echo $store_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el_store_payment_SeectPaymentMode">
<span<?php echo $store_payment->SeectPaymentMode->viewAttributes() ?>>
<?php echo $store_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->PaidAmount->Visible) { // PaidAmount ?>
		<tr id="r_PaidAmount">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->PaidAmount->caption() ?></td>
			<td<?php echo $store_payment->PaidAmount->cellAttributes() ?>>
<span id="el_store_payment_PaidAmount">
<span<?php echo $store_payment->PaidAmount->viewAttributes() ?>>
<?php echo $store_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->Currency->Visible) { // Currency ?>
		<tr id="r_Currency">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->Currency->caption() ?></td>
			<td<?php echo $store_payment->Currency->cellAttributes() ?>>
<span id="el_store_payment_Currency">
<span<?php echo $store_payment->Currency->viewAttributes() ?>>
<?php echo $store_payment->Currency->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->CardNumber->Visible) { // CardNumber ?>
		<tr id="r_CardNumber">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->CardNumber->caption() ?></td>
			<td<?php echo $store_payment->CardNumber->cellAttributes() ?>>
<span id="el_store_payment_CardNumber">
<span<?php echo $store_payment->CardNumber->viewAttributes() ?>>
<?php echo $store_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->BranchID->Visible) { // BranchID ?>
		<tr id="r_BranchID">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->BranchID->caption() ?></td>
			<td<?php echo $store_payment->BranchID->cellAttributes() ?>>
<span id="el_store_payment_BranchID">
<span<?php echo $store_payment->BranchID->viewAttributes() ?>>
<?php echo $store_payment->BranchID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($store_payment->StoreID->Visible) { // StoreID ?>
		<tr id="r_StoreID">
			<td class="<?php echo $store_payment->TableLeftColumnClass ?>"><?php echo $store_payment->StoreID->caption() ?></td>
			<td<?php echo $store_payment->StoreID->cellAttributes() ?>>
<span id="el_store_payment_StoreID">
<span<?php echo $store_payment->StoreID->viewAttributes() ?>>
<?php echo $store_payment->StoreID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>