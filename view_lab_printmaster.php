<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_lab_print->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_lab_printmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_lab_print->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->id->caption() ?></td>
			<td<?php echo $view_lab_print->id->cellAttributes() ?>>
<span id="el_view_lab_print_id">
<span<?php echo $view_lab_print->id->viewAttributes() ?>>
<?php echo $view_lab_print->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Reception->Visible) { // Reception ?>
		<tr id="r_Reception">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Reception->caption() ?></td>
			<td<?php echo $view_lab_print->Reception->cellAttributes() ?>>
<span id="el_view_lab_print_Reception">
<span<?php echo $view_lab_print->Reception->viewAttributes() ?>>
<?php echo $view_lab_print->Reception->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->PatientId->caption() ?></td>
			<td<?php echo $view_lab_print->PatientId->cellAttributes() ?>>
<span id="el_view_lab_print_PatientId">
<span<?php echo $view_lab_print->PatientId->viewAttributes() ?>>
<?php echo $view_lab_print->PatientId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->mrnno->Visible) { // mrnno ?>
		<tr id="r_mrnno">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->mrnno->caption() ?></td>
			<td<?php echo $view_lab_print->mrnno->cellAttributes() ?>>
<span id="el_view_lab_print_mrnno">
<span<?php echo $view_lab_print->mrnno->viewAttributes() ?>>
<?php echo $view_lab_print->mrnno->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->PatientName->caption() ?></td>
			<td<?php echo $view_lab_print->PatientName->cellAttributes() ?>>
<span id="el_view_lab_print_PatientName">
<span<?php echo $view_lab_print->PatientName->viewAttributes() ?>>
<?php echo $view_lab_print->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Age->Visible) { // Age ?>
		<tr id="r_Age">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Age->caption() ?></td>
			<td<?php echo $view_lab_print->Age->cellAttributes() ?>>
<span id="el_view_lab_print_Age">
<span<?php echo $view_lab_print->Age->viewAttributes() ?>>
<?php echo $view_lab_print->Age->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Gender->Visible) { // Gender ?>
		<tr id="r_Gender">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Gender->caption() ?></td>
			<td<?php echo $view_lab_print->Gender->cellAttributes() ?>>
<span id="el_view_lab_print_Gender">
<span<?php echo $view_lab_print->Gender->viewAttributes() ?>>
<?php echo $view_lab_print->Gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Mobile->Visible) { // Mobile ?>
		<tr id="r_Mobile">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Mobile->caption() ?></td>
			<td<?php echo $view_lab_print->Mobile->cellAttributes() ?>>
<span id="el_view_lab_print_Mobile">
<span<?php echo $view_lab_print->Mobile->viewAttributes() ?>>
<?php echo $view_lab_print->Mobile->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->IP_OP->Visible) { // IP_OP ?>
		<tr id="r_IP_OP">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->IP_OP->caption() ?></td>
			<td<?php echo $view_lab_print->IP_OP->cellAttributes() ?>>
<span id="el_view_lab_print_IP_OP">
<span<?php echo $view_lab_print->IP_OP->viewAttributes() ?>>
<?php echo $view_lab_print->IP_OP->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Doctor->caption() ?></td>
			<td<?php echo $view_lab_print->Doctor->cellAttributes() ?>>
<span id="el_view_lab_print_Doctor">
<span<?php echo $view_lab_print->Doctor->viewAttributes() ?>>
<?php echo $view_lab_print->Doctor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->voucher_type->Visible) { // voucher_type ?>
		<tr id="r_voucher_type">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->voucher_type->caption() ?></td>
			<td<?php echo $view_lab_print->voucher_type->cellAttributes() ?>>
<span id="el_view_lab_print_voucher_type">
<span<?php echo $view_lab_print->voucher_type->viewAttributes() ?>>
<?php echo $view_lab_print->voucher_type->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Details->Visible) { // Details ?>
		<tr id="r_Details">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Details->caption() ?></td>
			<td<?php echo $view_lab_print->Details->cellAttributes() ?>>
<span id="el_view_lab_print_Details">
<span<?php echo $view_lab_print->Details->viewAttributes() ?>>
<?php echo $view_lab_print->Details->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->ModeofPayment->caption() ?></td>
			<td<?php echo $view_lab_print->ModeofPayment->cellAttributes() ?>>
<span id="el_view_lab_print_ModeofPayment">
<span<?php echo $view_lab_print->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_print->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Amount->caption() ?></td>
			<td<?php echo $view_lab_print->Amount->cellAttributes() ?>>
<span id="el_view_lab_print_Amount">
<span<?php echo $view_lab_print->Amount->viewAttributes() ?>>
<?php echo $view_lab_print->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->AnyDues->Visible) { // AnyDues ?>
		<tr id="r_AnyDues">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->AnyDues->caption() ?></td>
			<td<?php echo $view_lab_print->AnyDues->cellAttributes() ?>>
<span id="el_view_lab_print_AnyDues">
<span<?php echo $view_lab_print->AnyDues->viewAttributes() ?>>
<?php echo $view_lab_print->AnyDues->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->createdby->caption() ?></td>
			<td<?php echo $view_lab_print->createdby->cellAttributes() ?>>
<span id="el_view_lab_print_createdby">
<span<?php echo $view_lab_print->createdby->viewAttributes() ?>>
<?php echo $view_lab_print->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->createddatetime->caption() ?></td>
			<td<?php echo $view_lab_print->createddatetime->cellAttributes() ?>>
<span id="el_view_lab_print_createddatetime">
<span<?php echo $view_lab_print->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_print->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->modifiedby->caption() ?></td>
			<td<?php echo $view_lab_print->modifiedby->cellAttributes() ?>>
<span id="el_view_lab_print_modifiedby">
<span<?php echo $view_lab_print->modifiedby->viewAttributes() ?>>
<?php echo $view_lab_print->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->modifieddatetime->caption() ?></td>
			<td<?php echo $view_lab_print->modifieddatetime->cellAttributes() ?>>
<span id="el_view_lab_print_modifieddatetime">
<span<?php echo $view_lab_print->modifieddatetime->viewAttributes() ?>>
<?php echo $view_lab_print->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationAmount->Visible) { // RealizationAmount ?>
		<tr id="r_RealizationAmount">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->RealizationAmount->caption() ?></td>
			<td<?php echo $view_lab_print->RealizationAmount->cellAttributes() ?>>
<span id="el_view_lab_print_RealizationAmount">
<span<?php echo $view_lab_print->RealizationAmount->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationStatus->Visible) { // RealizationStatus ?>
		<tr id="r_RealizationStatus">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->RealizationStatus->caption() ?></td>
			<td<?php echo $view_lab_print->RealizationStatus->cellAttributes() ?>>
<span id="el_view_lab_print_RealizationStatus">
<span<?php echo $view_lab_print->RealizationStatus->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationStatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<tr id="r_RealizationRemarks">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->RealizationRemarks->caption() ?></td>
			<td<?php echo $view_lab_print->RealizationRemarks->cellAttributes() ?>>
<span id="el_view_lab_print_RealizationRemarks">
<span<?php echo $view_lab_print->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<tr id="r_RealizationBatchNo">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->RealizationBatchNo->caption() ?></td>
			<td<?php echo $view_lab_print->RealizationBatchNo->cellAttributes() ?>>
<span id="el_view_lab_print_RealizationBatchNo">
<span<?php echo $view_lab_print->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationDate->Visible) { // RealizationDate ?>
		<tr id="r_RealizationDate">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->RealizationDate->caption() ?></td>
			<td<?php echo $view_lab_print->RealizationDate->cellAttributes() ?>>
<span id="el_view_lab_print_RealizationDate">
<span<?php echo $view_lab_print->RealizationDate->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->HospID->caption() ?></td>
			<td<?php echo $view_lab_print->HospID->cellAttributes() ?>>
<span id="el_view_lab_print_HospID">
<span<?php echo $view_lab_print->HospID->viewAttributes() ?>>
<?php echo $view_lab_print->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->RIDNO->Visible) { // RIDNO ?>
		<tr id="r_RIDNO">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->RIDNO->caption() ?></td>
			<td<?php echo $view_lab_print->RIDNO->cellAttributes() ?>>
<span id="el_view_lab_print_RIDNO">
<span<?php echo $view_lab_print->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_print->RIDNO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->TidNo->Visible) { // TidNo ?>
		<tr id="r_TidNo">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->TidNo->caption() ?></td>
			<td<?php echo $view_lab_print->TidNo->cellAttributes() ?>>
<span id="el_view_lab_print_TidNo">
<span<?php echo $view_lab_print->TidNo->viewAttributes() ?>>
<?php echo $view_lab_print->TidNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->CId->Visible) { // CId ?>
		<tr id="r_CId">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->CId->caption() ?></td>
			<td<?php echo $view_lab_print->CId->cellAttributes() ?>>
<span id="el_view_lab_print_CId">
<span<?php echo $view_lab_print->CId->viewAttributes() ?>>
<?php echo $view_lab_print->CId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->PartnerName->caption() ?></td>
			<td<?php echo $view_lab_print->PartnerName->cellAttributes() ?>>
<span id="el_view_lab_print_PartnerName">
<span<?php echo $view_lab_print->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_print->PartnerName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->PayerType->Visible) { // PayerType ?>
		<tr id="r_PayerType">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->PayerType->caption() ?></td>
			<td<?php echo $view_lab_print->PayerType->cellAttributes() ?>>
<span id="el_view_lab_print_PayerType">
<span<?php echo $view_lab_print->PayerType->viewAttributes() ?>>
<?php echo $view_lab_print->PayerType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Dob->Visible) { // Dob ?>
		<tr id="r_Dob">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Dob->caption() ?></td>
			<td<?php echo $view_lab_print->Dob->cellAttributes() ?>>
<span id="el_view_lab_print_Dob">
<span<?php echo $view_lab_print->Dob->viewAttributes() ?>>
<?php echo $view_lab_print->Dob->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Currency->Visible) { // Currency ?>
		<tr id="r_Currency">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Currency->caption() ?></td>
			<td<?php echo $view_lab_print->Currency->cellAttributes() ?>>
<span id="el_view_lab_print_Currency">
<span<?php echo $view_lab_print->Currency->viewAttributes() ?>>
<?php echo $view_lab_print->Currency->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<tr id="r_DiscountRemarks">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->DiscountRemarks->caption() ?></td>
			<td<?php echo $view_lab_print->DiscountRemarks->cellAttributes() ?>>
<span id="el_view_lab_print_DiscountRemarks">
<span<?php echo $view_lab_print->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_lab_print->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->Remarks->Visible) { // Remarks ?>
		<tr id="r_Remarks">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->Remarks->caption() ?></td>
			<td<?php echo $view_lab_print->Remarks->cellAttributes() ?>>
<span id="el_view_lab_print_Remarks">
<span<?php echo $view_lab_print->Remarks->viewAttributes() ?>>
<?php echo $view_lab_print->Remarks->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->PatId->Visible) { // PatId ?>
		<tr id="r_PatId">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->PatId->caption() ?></td>
			<td<?php echo $view_lab_print->PatId->cellAttributes() ?>>
<span id="el_view_lab_print_PatId">
<span<?php echo $view_lab_print->PatId->viewAttributes() ?>>
<?php echo $view_lab_print->PatId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->DrDepartment->Visible) { // DrDepartment ?>
		<tr id="r_DrDepartment">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->DrDepartment->caption() ?></td>
			<td<?php echo $view_lab_print->DrDepartment->cellAttributes() ?>>
<span id="el_view_lab_print_DrDepartment">
<span<?php echo $view_lab_print->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_print->DrDepartment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->RefferedBy->Visible) { // RefferedBy ?>
		<tr id="r_RefferedBy">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->RefferedBy->caption() ?></td>
			<td<?php echo $view_lab_print->RefferedBy->cellAttributes() ?>>
<span id="el_view_lab_print_RefferedBy">
<span<?php echo $view_lab_print->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_print->RefferedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->BillNumber->caption() ?></td>
			<td<?php echo $view_lab_print->BillNumber->cellAttributes() ?>>
<span id="el_view_lab_print_BillNumber">
<span<?php echo $view_lab_print->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_print->BillNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->CardNumber->Visible) { // CardNumber ?>
		<tr id="r_CardNumber">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->CardNumber->caption() ?></td>
			<td<?php echo $view_lab_print->CardNumber->cellAttributes() ?>>
<span id="el_view_lab_print_CardNumber">
<span<?php echo $view_lab_print->CardNumber->viewAttributes() ?>>
<?php echo $view_lab_print->CardNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->BankName->Visible) { // BankName ?>
		<tr id="r_BankName">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->BankName->caption() ?></td>
			<td<?php echo $view_lab_print->BankName->cellAttributes() ?>>
<span id="el_view_lab_print_BankName">
<span<?php echo $view_lab_print->BankName->viewAttributes() ?>>
<?php echo $view_lab_print->BankName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->DrID->Visible) { // DrID ?>
		<tr id="r_DrID">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->DrID->caption() ?></td>
			<td<?php echo $view_lab_print->DrID->cellAttributes() ?>>
<span id="el_view_lab_print_DrID">
<span<?php echo $view_lab_print->DrID->viewAttributes() ?>>
<?php echo $view_lab_print->DrID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_lab_print->BillStatus->Visible) { // BillStatus ?>
		<tr id="r_BillStatus">
			<td class="<?php echo $view_lab_print->TableLeftColumnClass ?>"><?php echo $view_lab_print->BillStatus->caption() ?></td>
			<td<?php echo $view_lab_print->BillStatus->cellAttributes() ?>>
<span id="el_view_lab_print_BillStatus">
<span<?php echo $view_lab_print->BillStatus->viewAttributes() ?>>
<?php echo $view_lab_print->BillStatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>