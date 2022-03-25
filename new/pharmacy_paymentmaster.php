<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($pharmacy_payment->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_paymentmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($pharmacy_payment->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->id->caption() ?></td>
			<td <?php echo $pharmacy_payment->id->cellAttributes() ?>>
<span id="el_pharmacy_payment_id">
<span<?php echo $pharmacy_payment->id->viewAttributes() ?>><?php echo $pharmacy_payment->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->PAYNO->Visible) { // PAYNO ?>
		<tr id="r_PAYNO">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->PAYNO->caption() ?></td>
			<td <?php echo $pharmacy_payment->PAYNO->cellAttributes() ?>>
<span id="el_pharmacy_payment_PAYNO">
<span<?php echo $pharmacy_payment->PAYNO->viewAttributes() ?>><?php echo $pharmacy_payment->PAYNO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->DT->Visible) { // DT ?>
		<tr id="r_DT">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->DT->caption() ?></td>
			<td <?php echo $pharmacy_payment->DT->cellAttributes() ?>>
<span id="el_pharmacy_payment_DT">
<span<?php echo $pharmacy_payment->DT->viewAttributes() ?>><?php echo $pharmacy_payment->DT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->YM->Visible) { // YM ?>
		<tr id="r_YM">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->YM->caption() ?></td>
			<td <?php echo $pharmacy_payment->YM->cellAttributes() ?>>
<span id="el_pharmacy_payment_YM">
<span<?php echo $pharmacy_payment->YM->viewAttributes() ?>><?php echo $pharmacy_payment->YM->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->PC->Visible) { // PC ?>
		<tr id="r_PC">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->PC->caption() ?></td>
			<td <?php echo $pharmacy_payment->PC->cellAttributes() ?>>
<span id="el_pharmacy_payment_PC">
<span<?php echo $pharmacy_payment->PC->viewAttributes() ?>><?php echo $pharmacy_payment->PC->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Customercode->Visible) { // Customercode ?>
		<tr id="r_Customercode">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Customercode->caption() ?></td>
			<td <?php echo $pharmacy_payment->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customercode">
<span<?php echo $pharmacy_payment->Customercode->viewAttributes() ?>><?php echo $pharmacy_payment->Customercode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Customername->Visible) { // Customername ?>
		<tr id="r_Customername">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Customername->caption() ?></td>
			<td <?php echo $pharmacy_payment->Customername->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customername">
<span<?php echo $pharmacy_payment->Customername->viewAttributes() ?>><?php echo $pharmacy_payment->Customername->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
		<tr id="r_pharmacy_pocol">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->pharmacy_pocol->caption() ?></td>
			<td <?php echo $pharmacy_payment->pharmacy_pocol->cellAttributes() ?>>
<span id="el_pharmacy_payment_pharmacy_pocol">
<span<?php echo $pharmacy_payment->pharmacy_pocol->viewAttributes() ?>><?php echo $pharmacy_payment->pharmacy_pocol->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->State->Visible) { // State ?>
		<tr id="r_State">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->State->caption() ?></td>
			<td <?php echo $pharmacy_payment->State->cellAttributes() ?>>
<span id="el_pharmacy_payment_State">
<span<?php echo $pharmacy_payment->State->viewAttributes() ?>><?php echo $pharmacy_payment->State->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Pincode->Visible) { // Pincode ?>
		<tr id="r_Pincode">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Pincode->caption() ?></td>
			<td <?php echo $pharmacy_payment->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Pincode">
<span<?php echo $pharmacy_payment->Pincode->viewAttributes() ?>><?php echo $pharmacy_payment->Pincode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Phone->Visible) { // Phone ?>
		<tr id="r_Phone">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Phone->caption() ?></td>
			<td <?php echo $pharmacy_payment->Phone->cellAttributes() ?>>
<span id="el_pharmacy_payment_Phone">
<span<?php echo $pharmacy_payment->Phone->viewAttributes() ?>><?php echo $pharmacy_payment->Phone->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Fax->Visible) { // Fax ?>
		<tr id="r_Fax">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Fax->caption() ?></td>
			<td <?php echo $pharmacy_payment->Fax->cellAttributes() ?>>
<span id="el_pharmacy_payment_Fax">
<span<?php echo $pharmacy_payment->Fax->viewAttributes() ?>><?php echo $pharmacy_payment->Fax->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->EEmail->Visible) { // EEmail ?>
		<tr id="r_EEmail">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->EEmail->caption() ?></td>
			<td <?php echo $pharmacy_payment->EEmail->cellAttributes() ?>>
<span id="el_pharmacy_payment_EEmail">
<span<?php echo $pharmacy_payment->EEmail->viewAttributes() ?>><?php echo $pharmacy_payment->EEmail->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->HospID->caption() ?></td>
			<td <?php echo $pharmacy_payment->HospID->cellAttributes() ?>>
<span id="el_pharmacy_payment_HospID">
<span<?php echo $pharmacy_payment->HospID->viewAttributes() ?>><?php echo $pharmacy_payment->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->createdby->caption() ?></td>
			<td <?php echo $pharmacy_payment->createdby->cellAttributes() ?>>
<span id="el_pharmacy_payment_createdby">
<span<?php echo $pharmacy_payment->createdby->viewAttributes() ?>><?php echo $pharmacy_payment->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->createddatetime->caption() ?></td>
			<td <?php echo $pharmacy_payment->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_createddatetime">
<span<?php echo $pharmacy_payment->createddatetime->viewAttributes() ?>><?php echo $pharmacy_payment->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->modifiedby->caption() ?></td>
			<td <?php echo $pharmacy_payment->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifiedby">
<span<?php echo $pharmacy_payment->modifiedby->viewAttributes() ?>><?php echo $pharmacy_payment->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->modifieddatetime->caption() ?></td>
			<td <?php echo $pharmacy_payment->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifieddatetime">
<span<?php echo $pharmacy_payment->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_payment->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->PharmacyID->Visible) { // PharmacyID ?>
		<tr id="r_PharmacyID">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->PharmacyID->caption() ?></td>
			<td <?php echo $pharmacy_payment->PharmacyID->cellAttributes() ?>>
<span id="el_pharmacy_payment_PharmacyID">
<span<?php echo $pharmacy_payment->PharmacyID->viewAttributes() ?>><?php echo $pharmacy_payment->PharmacyID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->BillTotalValue->Visible) { // BillTotalValue ?>
		<tr id="r_BillTotalValue">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->BillTotalValue->caption() ?></td>
			<td <?php echo $pharmacy_payment->BillTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillTotalValue">
<span<?php echo $pharmacy_payment->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment->BillTotalValue->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<tr id="r_GRNTotalValue">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->GRNTotalValue->caption() ?></td>
			<td <?php echo $pharmacy_payment->GRNTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_GRNTotalValue">
<span<?php echo $pharmacy_payment->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_payment->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->BillDiscount->Visible) { // BillDiscount ?>
		<tr id="r_BillDiscount">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->BillDiscount->caption() ?></td>
			<td <?php echo $pharmacy_payment->BillDiscount->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillDiscount">
<span<?php echo $pharmacy_payment->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_payment->BillDiscount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->TransPort->Visible) { // TransPort ?>
		<tr id="r_TransPort">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->TransPort->caption() ?></td>
			<td <?php echo $pharmacy_payment->TransPort->cellAttributes() ?>>
<span id="el_pharmacy_payment_TransPort">
<span<?php echo $pharmacy_payment->TransPort->viewAttributes() ?>><?php echo $pharmacy_payment->TransPort->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->AnyOther->Visible) { // AnyOther ?>
		<tr id="r_AnyOther">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->AnyOther->caption() ?></td>
			<td <?php echo $pharmacy_payment->AnyOther->cellAttributes() ?>>
<span id="el_pharmacy_payment_AnyOther">
<span<?php echo $pharmacy_payment->AnyOther->viewAttributes() ?>><?php echo $pharmacy_payment->AnyOther->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->voucher_type->Visible) { // voucher_type ?>
		<tr id="r_voucher_type">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->voucher_type->caption() ?></td>
			<td <?php echo $pharmacy_payment->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_payment_voucher_type">
<span<?php echo $pharmacy_payment->voucher_type->viewAttributes() ?>><?php echo $pharmacy_payment->voucher_type->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Details->Visible) { // Details ?>
		<tr id="r_Details">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Details->caption() ?></td>
			<td <?php echo $pharmacy_payment->Details->cellAttributes() ?>>
<span id="el_pharmacy_payment_Details">
<span<?php echo $pharmacy_payment->Details->viewAttributes() ?>><?php echo $pharmacy_payment->Details->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->ModeofPayment->caption() ?></td>
			<td <?php echo $pharmacy_payment->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_payment_ModeofPayment">
<span<?php echo $pharmacy_payment->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_payment->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Amount->caption() ?></td>
			<td <?php echo $pharmacy_payment->Amount->cellAttributes() ?>>
<span id="el_pharmacy_payment_Amount">
<span<?php echo $pharmacy_payment->Amount->viewAttributes() ?>><?php echo $pharmacy_payment->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->BankName->Visible) { // BankName ?>
		<tr id="r_BankName">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->BankName->caption() ?></td>
			<td <?php echo $pharmacy_payment->BankName->cellAttributes() ?>>
<span id="el_pharmacy_payment_BankName">
<span<?php echo $pharmacy_payment->BankName->viewAttributes() ?>><?php echo $pharmacy_payment->BankName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->AccountNumber->Visible) { // AccountNumber ?>
		<tr id="r_AccountNumber">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->AccountNumber->caption() ?></td>
			<td <?php echo $pharmacy_payment->AccountNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_AccountNumber">
<span<?php echo $pharmacy_payment->AccountNumber->viewAttributes() ?>><?php echo $pharmacy_payment->AccountNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->chequeNumber->Visible) { // chequeNumber ?>
		<tr id="r_chequeNumber">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->chequeNumber->caption() ?></td>
			<td <?php echo $pharmacy_payment->chequeNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_chequeNumber">
<span<?php echo $pharmacy_payment->chequeNumber->viewAttributes() ?>><?php echo $pharmacy_payment->chequeNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<tr id="r_SeectPaymentMode">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->SeectPaymentMode->caption() ?></td>
			<td <?php echo $pharmacy_payment->SeectPaymentMode->cellAttributes() ?>>
<span id="el_pharmacy_payment_SeectPaymentMode">
<span<?php echo $pharmacy_payment->SeectPaymentMode->viewAttributes() ?>><?php echo $pharmacy_payment->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->PaidAmount->Visible) { // PaidAmount ?>
		<tr id="r_PaidAmount">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->PaidAmount->caption() ?></td>
			<td <?php echo $pharmacy_payment->PaidAmount->cellAttributes() ?>>
<span id="el_pharmacy_payment_PaidAmount">
<span<?php echo $pharmacy_payment->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_payment->PaidAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->Currency->Visible) { // Currency ?>
		<tr id="r_Currency">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->Currency->caption() ?></td>
			<td <?php echo $pharmacy_payment->Currency->cellAttributes() ?>>
<span id="el_pharmacy_payment_Currency">
<span<?php echo $pharmacy_payment->Currency->viewAttributes() ?>><?php echo $pharmacy_payment->Currency->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_payment->CardNumber->Visible) { // CardNumber ?>
		<tr id="r_CardNumber">
			<td class="<?php echo $pharmacy_payment->TableLeftColumnClass ?>"><?php echo $pharmacy_payment->CardNumber->caption() ?></td>
			<td <?php echo $pharmacy_payment->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_CardNumber">
<span<?php echo $pharmacy_payment->CardNumber->viewAttributes() ?>><?php echo $pharmacy_payment->CardNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>