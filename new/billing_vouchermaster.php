<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($billing_voucher->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_billing_vouchermaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($billing_voucher->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->id->caption() ?></td>
			<td <?php echo $billing_voucher->id->cellAttributes() ?>>
<span id="el_billing_voucher_id">
<span<?php echo $billing_voucher->id->viewAttributes() ?>><?php echo $billing_voucher->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->PatId->Visible) { // PatId ?>
		<tr id="r_PatId">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->PatId->caption() ?></td>
			<td <?php echo $billing_voucher->PatId->cellAttributes() ?>>
<script id="orig_billing_voucher_PatId" class="billing_other_voucheredit" type="text/html">
<?php echo $billing_voucher->PatId->getViewValue() ?>
</script>
<span id="el_billing_voucher_PatId">
<span<?php echo $billing_voucher->PatId->viewAttributes() ?>><?php echo Barcode()->show($billing_voucher->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->BillNumber->caption() ?></td>
			<td <?php echo $billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el_billing_voucher_BillNumber">
<span<?php echo $billing_voucher->BillNumber->viewAttributes() ?>><?php echo $billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->PatientId->caption() ?></td>
			<td <?php echo $billing_voucher->PatientId->cellAttributes() ?>>
<span id="el_billing_voucher_PatientId">
<span><?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->getViewValue()) ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->PatientName->caption() ?></td>
			<td <?php echo $billing_voucher->PatientName->cellAttributes() ?>>
<span id="el_billing_voucher_PatientName">
<span<?php echo $billing_voucher->PatientName->viewAttributes() ?>><?php echo $billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
		<tr id="r_Gender">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->Gender->caption() ?></td>
			<td <?php echo $billing_voucher->Gender->cellAttributes() ?>>
<span id="el_billing_voucher_Gender">
<span<?php echo $billing_voucher->Gender->viewAttributes() ?>><?php echo $billing_voucher->Gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
		<tr id="r_Mobile">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->Mobile->caption() ?></td>
			<td <?php echo $billing_voucher->Mobile->cellAttributes() ?>>
<span id="el_billing_voucher_Mobile">
<span<?php echo $billing_voucher->Mobile->viewAttributes() ?>><?php echo $billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->Doctor->caption() ?></td>
			<td <?php echo $billing_voucher->Doctor->cellAttributes() ?>>
<span id="el_billing_voucher_Doctor">
<span<?php echo $billing_voucher->Doctor->viewAttributes() ?>><?php echo $billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->ModeofPayment->caption() ?></td>
			<td <?php echo $billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el_billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher->ModeofPayment->viewAttributes() ?>><?php echo $billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->Amount->caption() ?></td>
			<td <?php echo $billing_voucher->Amount->cellAttributes() ?>>
<span id="el_billing_voucher_Amount">
<span<?php echo $billing_voucher->Amount->viewAttributes() ?>><?php echo $billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<tr id="r_AnyDues">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->AnyDues->caption() ?></td>
			<td <?php echo $billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el_billing_voucher_AnyDues">
<span<?php echo $billing_voucher->AnyDues->viewAttributes() ?>><?php echo $billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->createdby->caption() ?></td>
			<td <?php echo $billing_voucher->createdby->cellAttributes() ?>>
<span id="el_billing_voucher_createdby">
<span<?php echo $billing_voucher->createdby->viewAttributes() ?>><?php echo $billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->createddatetime->caption() ?></td>
			<td <?php echo $billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el_billing_voucher_createddatetime">
<span<?php echo $billing_voucher->createddatetime->viewAttributes() ?>><?php echo $billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->modifiedby->caption() ?></td>
			<td <?php echo $billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el_billing_voucher_modifiedby">
<span<?php echo $billing_voucher->modifiedby->viewAttributes() ?>><?php echo $billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->modifieddatetime->caption() ?></td>
			<td <?php echo $billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el_billing_voucher_modifieddatetime">
<span<?php echo $billing_voucher->modifieddatetime->viewAttributes() ?>><?php echo $billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->HospID->caption() ?></td>
			<td <?php echo $billing_voucher->HospID->cellAttributes() ?>>
<span id="el_billing_voucher_HospID">
<span<?php echo $billing_voucher->HospID->viewAttributes() ?>><?php echo $billing_voucher->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<tr id="r_RIDNO">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->RIDNO->caption() ?></td>
			<td <?php echo $billing_voucher->RIDNO->cellAttributes() ?>>
<span id="el_billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>><?php echo $billing_voucher->RIDNO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
		<tr id="r_TidNo">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->TidNo->caption() ?></td>
			<td <?php echo $billing_voucher->TidNo->cellAttributes() ?>>
<span id="el_billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>><?php echo $billing_voucher->TidNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CId->Visible) { // CId ?>
		<tr id="r_CId">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CId->caption() ?></td>
			<td <?php echo $billing_voucher->CId->cellAttributes() ?>>
<span id="el_billing_voucher_CId">
<span<?php echo $billing_voucher->CId->viewAttributes() ?>><?php echo $billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->PartnerName->caption() ?></td>
			<td <?php echo $billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el_billing_voucher_PartnerName">
<span<?php echo $billing_voucher->PartnerName->viewAttributes() ?>><?php echo $billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->PayerType->Visible) { // PayerType ?>
		<tr id="r_PayerType">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->PayerType->caption() ?></td>
			<td <?php echo $billing_voucher->PayerType->cellAttributes() ?>>
<span id="el_billing_voucher_PayerType">
<span<?php echo $billing_voucher->PayerType->viewAttributes() ?>><?php echo $billing_voucher->PayerType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->Dob->Visible) { // Dob ?>
		<tr id="r_Dob">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->Dob->caption() ?></td>
			<td <?php echo $billing_voucher->Dob->cellAttributes() ?>>
<span id="el_billing_voucher_Dob">
<span<?php echo $billing_voucher->Dob->viewAttributes() ?>><?php echo $billing_voucher->Dob->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
		<tr id="r_DrDepartment">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->DrDepartment->caption() ?></td>
			<td <?php echo $billing_voucher->DrDepartment->cellAttributes() ?>>
<span id="el_billing_voucher_DrDepartment">
<span<?php echo $billing_voucher->DrDepartment->viewAttributes() ?>><?php echo $billing_voucher->DrDepartment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
		<tr id="r_RefferedBy">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->RefferedBy->caption() ?></td>
			<td <?php echo $billing_voucher->RefferedBy->cellAttributes() ?>>
<span id="el_billing_voucher_RefferedBy">
<span<?php echo $billing_voucher->RefferedBy->viewAttributes() ?>><?php echo $billing_voucher->RefferedBy->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<tr id="r_CardNumber">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CardNumber->caption() ?></td>
			<td <?php echo $billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el_billing_voucher_CardNumber">
<span<?php echo $billing_voucher->CardNumber->viewAttributes() ?>><?php echo $billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->BankName->Visible) { // BankName ?>
		<tr id="r_BankName">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->BankName->caption() ?></td>
			<td <?php echo $billing_voucher->BankName->cellAttributes() ?>>
<span id="el_billing_voucher_BankName">
<span<?php echo $billing_voucher->BankName->viewAttributes() ?>><?php echo $billing_voucher->BankName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->UserName->Visible) { // UserName ?>
		<tr id="r_UserName">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->UserName->caption() ?></td>
			<td <?php echo $billing_voucher->UserName->cellAttributes() ?>>
<span id="el_billing_voucher_UserName">
<span<?php echo $billing_voucher->UserName->viewAttributes() ?>><?php echo $billing_voucher->UserName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<tr id="r_AdjustmentAdvance">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->AdjustmentAdvance->caption() ?></td>
			<td <?php echo $billing_voucher->AdjustmentAdvance->cellAttributes() ?>>
<span id="el_billing_voucher_AdjustmentAdvance">
<span<?php echo $billing_voucher->AdjustmentAdvance->viewAttributes() ?>><?php echo $billing_voucher->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<tr id="r_billing_vouchercol">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->billing_vouchercol->caption() ?></td>
			<td <?php echo $billing_voucher->billing_vouchercol->cellAttributes() ?>>
<span id="el_billing_voucher_billing_vouchercol">
<span<?php echo $billing_voucher->billing_vouchercol->viewAttributes() ?>><?php echo $billing_voucher->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->BillType->Visible) { // BillType ?>
		<tr id="r_BillType">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->BillType->caption() ?></td>
			<td <?php echo $billing_voucher->BillType->cellAttributes() ?>>
<span id="el_billing_voucher_BillType">
<span<?php echo $billing_voucher->BillType->viewAttributes() ?>><?php echo $billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
		<tr id="r_ProcedureName">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->ProcedureName->caption() ?></td>
			<td <?php echo $billing_voucher->ProcedureName->cellAttributes() ?>>
<span id="el_billing_voucher_ProcedureName">
<span<?php echo $billing_voucher->ProcedureName->viewAttributes() ?>><?php echo $billing_voucher->ProcedureName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<tr id="r_ProcedureAmount">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->ProcedureAmount->caption() ?></td>
			<td <?php echo $billing_voucher->ProcedureAmount->cellAttributes() ?>>
<span id="el_billing_voucher_ProcedureAmount">
<span<?php echo $billing_voucher->ProcedureAmount->viewAttributes() ?>><?php echo $billing_voucher->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
		<tr id="r_IncludePackage">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->IncludePackage->caption() ?></td>
			<td <?php echo $billing_voucher->IncludePackage->cellAttributes() ?>>
<span id="el_billing_voucher_IncludePackage">
<span<?php echo $billing_voucher->IncludePackage->viewAttributes() ?>><?php echo $billing_voucher->IncludePackage->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<tr id="r_CancelBill">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CancelBill->caption() ?></td>
			<td <?php echo $billing_voucher->CancelBill->cellAttributes() ?>>
<span id="el_billing_voucher_CancelBill">
<span<?php echo $billing_voucher->CancelBill->viewAttributes() ?>><?php echo $billing_voucher->CancelBill->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CancelReason->Visible) { // CancelReason ?>
		<tr id="r_CancelReason">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CancelReason->caption() ?></td>
			<td <?php echo $billing_voucher->CancelReason->cellAttributes() ?>>
<span id="el_billing_voucher_CancelReason">
<span<?php echo $billing_voucher->CancelReason->viewAttributes() ?>><?php echo $billing_voucher->CancelReason->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<tr id="r_CancelModeOfPayment">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CancelModeOfPayment->caption() ?></td>
			<td <?php echo $billing_voucher->CancelModeOfPayment->cellAttributes() ?>>
<span id="el_billing_voucher_CancelModeOfPayment">
<span<?php echo $billing_voucher->CancelModeOfPayment->viewAttributes() ?>><?php echo $billing_voucher->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
		<tr id="r_CancelAmount">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CancelAmount->caption() ?></td>
			<td <?php echo $billing_voucher->CancelAmount->cellAttributes() ?>>
<span id="el_billing_voucher_CancelAmount">
<span<?php echo $billing_voucher->CancelAmount->viewAttributes() ?>><?php echo $billing_voucher->CancelAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
		<tr id="r_CancelBankName">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CancelBankName->caption() ?></td>
			<td <?php echo $billing_voucher->CancelBankName->cellAttributes() ?>>
<span id="el_billing_voucher_CancelBankName">
<span<?php echo $billing_voucher->CancelBankName->viewAttributes() ?>><?php echo $billing_voucher->CancelBankName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<tr id="r_CancelTransactionNumber">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->CancelTransactionNumber->caption() ?></td>
			<td <?php echo $billing_voucher->CancelTransactionNumber->cellAttributes() ?>>
<span id="el_billing_voucher_CancelTransactionNumber">
<span<?php echo $billing_voucher->CancelTransactionNumber->viewAttributes() ?>><?php echo $billing_voucher->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->LabTest->Visible) { // LabTest ?>
		<tr id="r_LabTest">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->LabTest->caption() ?></td>
			<td <?php echo $billing_voucher->LabTest->cellAttributes() ?>>
<span id="el_billing_voucher_LabTest">
<span<?php echo $billing_voucher->LabTest->viewAttributes() ?>><?php echo $billing_voucher->LabTest->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->sid->Visible) { // sid ?>
		<tr id="r_sid">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->sid->caption() ?></td>
			<td <?php echo $billing_voucher->sid->cellAttributes() ?>>
<span id="el_billing_voucher_sid">
<span<?php echo $billing_voucher->sid->viewAttributes() ?>><?php echo $billing_voucher->sid->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->SidNo->Visible) { // SidNo ?>
		<tr id="r_SidNo">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->SidNo->caption() ?></td>
			<td <?php echo $billing_voucher->SidNo->cellAttributes() ?>>
<span id="el_billing_voucher_SidNo">
<span<?php echo $billing_voucher->SidNo->viewAttributes() ?>><?php echo $billing_voucher->SidNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<tr id="r_createdDatettime">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->createdDatettime->caption() ?></td>
			<td <?php echo $billing_voucher->createdDatettime->cellAttributes() ?>>
<span id="el_billing_voucher_createdDatettime">
<span<?php echo $billing_voucher->createdDatettime->viewAttributes() ?>><?php echo $billing_voucher->createdDatettime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
		<tr id="r_LabTestReleased">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->LabTestReleased->caption() ?></td>
			<td <?php echo $billing_voucher->LabTestReleased->cellAttributes() ?>>
<span id="el_billing_voucher_LabTestReleased">
<span<?php echo $billing_voucher->LabTestReleased->viewAttributes() ?>><?php echo $billing_voucher->LabTestReleased->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<tr id="r_GoogleReviewID">
			<td class="<?php echo $billing_voucher->TableLeftColumnClass ?>"><?php echo $billing_voucher->GoogleReviewID->caption() ?></td>
			<td <?php echo $billing_voucher->GoogleReviewID->cellAttributes() ?>>
<span id="el_billing_voucher_GoogleReviewID">
<span<?php echo $billing_voucher->GoogleReviewID->viewAttributes() ?>><?php echo $billing_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>