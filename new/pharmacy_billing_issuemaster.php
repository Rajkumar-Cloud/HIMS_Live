<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($pharmacy_billing_issue->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_pharmacy_billing_issuemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($pharmacy_billing_issue->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->id->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->id->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_id">
<span<?php echo $pharmacy_billing_issue->id->viewAttributes() ?>><?php echo $pharmacy_billing_issue->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->PatientId->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->PatientId->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PatientId">
<span<?php echo $pharmacy_billing_issue->PatientId->viewAttributes() ?>><?php echo $pharmacy_billing_issue->PatientId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->mrnno->Visible) { // mrnno ?>
		<tr id="r_mrnno">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->mrnno->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->mrnno->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_mrnno">
<span<?php echo $pharmacy_billing_issue->mrnno->viewAttributes() ?>><?php echo $pharmacy_billing_issue->mrnno->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->PatientName->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->PatientName->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PatientName">
<span<?php echo $pharmacy_billing_issue->PatientName->viewAttributes() ?>><?php echo $pharmacy_billing_issue->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Mobile->Visible) { // Mobile ?>
		<tr id="r_Mobile">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->Mobile->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->Mobile->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_Mobile">
<span<?php echo $pharmacy_billing_issue->Mobile->viewAttributes() ?>><?php echo $pharmacy_billing_issue->Mobile->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->IP_OP->Visible) { // IP_OP ?>
		<tr id="r_IP_OP">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->IP_OP->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->IP_OP->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_IP_OP">
<span<?php echo $pharmacy_billing_issue->IP_OP->viewAttributes() ?>><?php echo $pharmacy_billing_issue->IP_OP->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->Doctor->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->Doctor->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_Doctor">
<span<?php echo $pharmacy_billing_issue->Doctor->viewAttributes() ?>><?php echo $pharmacy_billing_issue->Doctor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->voucher_type->Visible) { // voucher_type ?>
		<tr id="r_voucher_type">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->voucher_type->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_voucher_type">
<span<?php echo $pharmacy_billing_issue->voucher_type->viewAttributes() ?>><?php echo $pharmacy_billing_issue->voucher_type->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->ModeofPayment->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_ModeofPayment">
<span<?php echo $pharmacy_billing_issue->ModeofPayment->viewAttributes() ?>><?php echo $pharmacy_billing_issue->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->Amount->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->Amount->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_Amount">
<span<?php echo $pharmacy_billing_issue->Amount->viewAttributes() ?>><?php echo $pharmacy_billing_issue->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->AnyDues->Visible) { // AnyDues ?>
		<tr id="r_AnyDues">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->AnyDues->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->AnyDues->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_AnyDues">
<span<?php echo $pharmacy_billing_issue->AnyDues->viewAttributes() ?>><?php echo $pharmacy_billing_issue->AnyDues->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->createdby->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->createdby->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_createdby">
<span<?php echo $pharmacy_billing_issue->createdby->viewAttributes() ?>><?php echo $pharmacy_billing_issue->createdby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->createddatetime->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_createddatetime">
<span<?php echo $pharmacy_billing_issue->createddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_issue->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->modifiedby->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_modifiedby">
<span<?php echo $pharmacy_billing_issue->modifiedby->viewAttributes() ?>><?php echo $pharmacy_billing_issue->modifiedby->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->modifieddatetime->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_modifieddatetime">
<span<?php echo $pharmacy_billing_issue->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_billing_issue->modifieddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationAmount->Visible) { // RealizationAmount ?>
		<tr id="r_RealizationAmount">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->RealizationAmount->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->RealizationAmount->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_RealizationAmount">
<span<?php echo $pharmacy_billing_issue->RealizationAmount->viewAttributes() ?>><?php echo $pharmacy_billing_issue->RealizationAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->CId->Visible) { // CId ?>
		<tr id="r_CId">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->CId->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->CId->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_CId">
<span<?php echo $pharmacy_billing_issue->CId->viewAttributes() ?>><?php echo $pharmacy_billing_issue->CId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->PartnerName->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->PartnerName->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PartnerName">
<span<?php echo $pharmacy_billing_issue->PartnerName->viewAttributes() ?>><?php echo $pharmacy_billing_issue->PartnerName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->BillNumber->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->BillNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_BillNumber">
<span<?php echo $pharmacy_billing_issue->BillNumber->viewAttributes() ?>><?php echo $pharmacy_billing_issue->BillNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->CardNumber->Visible) { // CardNumber ?>
		<tr id="r_CardNumber">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->CardNumber->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_CardNumber">
<span<?php echo $pharmacy_billing_issue->CardNumber->viewAttributes() ?>><?php echo $pharmacy_billing_issue->CardNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillStatus->Visible) { // BillStatus ?>
		<tr id="r_BillStatus">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->BillStatus->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->BillStatus->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_BillStatus">
<span<?php echo $pharmacy_billing_issue->BillStatus->viewAttributes() ?>><?php echo $pharmacy_billing_issue->BillStatus->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->ReportHeader->Visible) { // ReportHeader ?>
		<tr id="r_ReportHeader">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->ReportHeader->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->ReportHeader->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_ReportHeader">
<span<?php echo $pharmacy_billing_issue->ReportHeader->viewAttributes() ?>><?php echo $pharmacy_billing_issue->ReportHeader->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PharID->Visible) { // PharID ?>
		<tr id="r_PharID">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->PharID->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->PharID->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_PharID">
<span<?php echo $pharmacy_billing_issue->PharID->viewAttributes() ?>><?php echo $pharmacy_billing_issue->PharID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->UserName->Visible) { // UserName ?>
		<tr id="r_UserName">
			<td class="<?php echo $pharmacy_billing_issue->TableLeftColumnClass ?>"><?php echo $pharmacy_billing_issue->UserName->caption() ?></td>
			<td <?php echo $pharmacy_billing_issue->UserName->cellAttributes() ?>>
<span id="el_pharmacy_billing_issue_UserName">
<span<?php echo $pharmacy_billing_issue->UserName->viewAttributes() ?>><?php echo $pharmacy_billing_issue->UserName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>