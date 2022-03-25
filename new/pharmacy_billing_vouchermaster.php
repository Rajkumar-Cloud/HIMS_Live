<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($pharmacy_billing_voucher->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_billing_vouchermaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->id->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->id->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_id">
<span<?php echo $pharmacy_billing_voucher->id->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->BillNumber->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_BillNumber">
<span<?php echo $pharmacy_billing_voucher->BillNumber->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->PatientId->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->PatientId->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PatientId">
<span<?php echo $pharmacy_billing_voucher->PatientId->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->PatientId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->PatientName->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->PatientName->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PatientName">
<span<?php echo $pharmacy_billing_voucher->PatientName->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
		<tr id="r_Mobile">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->Mobile->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->Mobile->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Mobile">
<span<?php echo $pharmacy_billing_voucher->Mobile->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
		<tr id="r_mrnno">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->mrnno->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_mrnno">
<span<?php echo $pharmacy_billing_voucher->mrnno->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->mrnno->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<tr id="r_IP_OP">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->IP_OP->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->IP_OP->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_IP_OP">
<span<?php echo $pharmacy_billing_voucher->IP_OP->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->IP_OP->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->Doctor->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->Doctor->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Doctor">
<span<?php echo $pharmacy_billing_voucher->Doctor->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->ModeofPayment->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_ModeofPayment">
<span<?php echo $pharmacy_billing_voucher->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->Amount->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->Amount->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_Amount">
<span<?php echo $pharmacy_billing_voucher->Amount->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<tr id="r_AnyDues">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->AnyDues->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_AnyDues">
<span<?php echo $pharmacy_billing_voucher->AnyDues->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->createdby->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->createdby->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_createdby">
<span<?php echo $pharmacy_billing_voucher->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->createddatetime->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_createddatetime">
<span<?php echo $pharmacy_billing_voucher->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->modifiedby->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_modifiedby">
<span<?php echo $pharmacy_billing_voucher->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->modifieddatetime->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_modifieddatetime">
<span<?php echo $pharmacy_billing_voucher->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<tr id="r_RealizationAmount">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->RealizationAmount->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->RealizationAmount->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_RealizationAmount">
<span<?php echo $pharmacy_billing_voucher->RealizationAmount->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->RealizationAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
		<tr id="r_CId">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->CId->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->CId->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_CId">
<span<?php echo $pharmacy_billing_voucher->CId->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->PartnerName->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PartnerName">
<span<?php echo $pharmacy_billing_voucher->PartnerName->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<tr id="r_CardNumber">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->CardNumber->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_CardNumber">
<span<?php echo $pharmacy_billing_voucher->CardNumber->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
		<tr id="r_BillStatus">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->BillStatus->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->BillStatus->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_BillStatus">
<span<?php echo $pharmacy_billing_voucher->BillStatus->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->BillStatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
		<tr id="r_ReportHeader">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->ReportHeader->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->ReportHeader->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_ReportHeader">
<span<?php echo $pharmacy_billing_voucher->ReportHeader->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->ReportHeader->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
		<tr id="r_PharID">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->PharID->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->PharID->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_PharID">
<span<?php echo $pharmacy_billing_voucher->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->PharID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
		<tr id="r_UserName">
			<td class="<?php echo $pharmacy_billing_voucher->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_voucher->UserName->caption() ?></td>
			<td <?php echo $pharmacy_billing_voucher->UserName->cellAttributes() ?>>
<span id="el_pharmacy_billing_voucher_UserName">
<span<?php echo $pharmacy_billing_voucher->UserName->viewAttributes() ?>><?php echo $pharmacy_billing_voucher->UserName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>