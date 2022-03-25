<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_billing_voucher_print->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_billing_voucher_printmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
		<tr id="r_PatientId">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->PatientId->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->PatientId->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_PatientId">
<span<?php echo $view_billing_voucher_print->PatientId->viewAttributes() ?>><?php echo $view_billing_voucher_print->PatientId->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->PatientName->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->PatientName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_PatientName">
<span<?php echo $view_billing_voucher_print->PatientName->viewAttributes() ?>><?php echo $view_billing_voucher_print->PatientName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
		<tr id="r_Mobile">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->Mobile->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->Mobile->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_Mobile">
<span<?php echo $view_billing_voucher_print->Mobile->viewAttributes() ?>><?php echo $view_billing_voucher_print->Mobile->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->Doctor->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->Doctor->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_Doctor">
<span<?php echo $view_billing_voucher_print->Doctor->viewAttributes() ?>><?php echo $view_billing_voucher_print->Doctor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->ModeofPayment->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->ModeofPayment->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_ModeofPayment">
<span<?php echo $view_billing_voucher_print->ModeofPayment->viewAttributes() ?>><?php echo $view_billing_voucher_print->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
		<tr id="r_Amount">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->Amount->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->Amount->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_Amount">
<span<?php echo $view_billing_voucher_print->Amount->viewAttributes() ?>><?php echo $view_billing_voucher_print->Amount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->createddatetime->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->createddatetime->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_createddatetime">
<span<?php echo $view_billing_voucher_print->createddatetime->viewAttributes() ?>><?php echo $view_billing_voucher_print->createddatetime->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
		<tr id="r_BillNumber">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->BillNumber->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->BillNumber->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_BillNumber">
<span<?php echo $view_billing_voucher_print->BillNumber->viewAttributes() ?>><?php echo $view_billing_voucher_print->BillNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
		<tr id="r_BankName">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->BankName->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->BankName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_BankName">
<span<?php echo $view_billing_voucher_print->BankName->viewAttributes() ?>><?php echo $view_billing_voucher_print->BankName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->UserName->Visible) { // UserName ?>
		<tr id="r_UserName">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->UserName->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->UserName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_UserName">
<span<?php echo $view_billing_voucher_print->UserName->viewAttributes() ?>><?php echo $view_billing_voucher_print->UserName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
		<tr id="r_BillType">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->BillType->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->BillType->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_BillType">
<span<?php echo $view_billing_voucher_print->BillType->viewAttributes() ?>><?php echo $view_billing_voucher_print->BillType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<tr id="r_CancelModeOfPayment">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->CancelModeOfPayment->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->CancelModeOfPayment->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelModeOfPayment">
<span<?php echo $view_billing_voucher_print->CancelModeOfPayment->viewAttributes() ?>><?php echo $view_billing_voucher_print->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
		<tr id="r_CancelAmount">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->CancelAmount->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->CancelAmount->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelAmount">
<span<?php echo $view_billing_voucher_print->CancelAmount->viewAttributes() ?>><?php echo $view_billing_voucher_print->CancelAmount->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
		<tr id="r_CancelBankName">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->CancelBankName->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->CancelBankName->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelBankName">
<span<?php echo $view_billing_voucher_print->CancelBankName->viewAttributes() ?>><?php echo $view_billing_voucher_print->CancelBankName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<tr id="r_CancelTransactionNumber">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->CancelTransactionNumber->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->CancelTransactionNumber->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_CancelTransactionNumber">
<span<?php echo $view_billing_voucher_print->CancelTransactionNumber->viewAttributes() ?>><?php echo $view_billing_voucher_print->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
		<tr id="r_LabTest">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->LabTest->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->LabTest->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_LabTest">
<span<?php echo $view_billing_voucher_print->LabTest->viewAttributes() ?>><?php echo $view_billing_voucher_print->LabTest->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
		<tr id="r_sid">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->sid->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->sid->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_sid">
<span<?php echo $view_billing_voucher_print->sid->viewAttributes() ?>><?php echo $view_billing_voucher_print->sid->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
		<tr id="r_SidNo">
			<td class="<?php echo $view_billing_voucher_print->TableLeftColumnClass ?>"><?php echo $view_billing_voucher_print->SidNo->caption() ?></td>
			<td <?php echo $view_billing_voucher_print->SidNo->cellAttributes() ?>>
<span id="el_view_billing_voucher_print_SidNo">
<span<?php echo $view_billing_voucher_print->SidNo->viewAttributes() ?>><?php echo $view_billing_voucher_print->SidNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>