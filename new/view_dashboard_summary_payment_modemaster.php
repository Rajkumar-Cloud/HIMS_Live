<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_dashboard_summary_payment_mode->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_summary_payment_modemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_dashboard_summary_payment_mode->createddate->Visible) { // createddate ?>
		<tr id="r_createddate">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->createddate->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->createddate->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_createddate">
<span<?php echo $view_dashboard_summary_payment_mode->createddate->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->createddate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->UserName->Visible) { // UserName ?>
		<tr id="r_UserName">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->UserName->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->UserName->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_UserName">
<span<?php echo $view_dashboard_summary_payment_mode->UserName->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->UserName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CARD->Visible) { // CARD ?>
		<tr id="r_CARD">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->CARD->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->CARD->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CARD">
<span<?php echo $view_dashboard_summary_payment_mode->CARD->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->CARD->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CASH->Visible) { // CASH ?>
		<tr id="r_CASH">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->CASH->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->CASH->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CASH">
<span<?php echo $view_dashboard_summary_payment_mode->CASH->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->CASH->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->NEFT->Visible) { // NEFT ?>
		<tr id="r_NEFT">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->NEFT->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->NEFT->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_NEFT">
<span<?php echo $view_dashboard_summary_payment_mode->NEFT->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->NEFT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->PAYTM->Visible) { // PAYTM ?>
		<tr id="r_PAYTM">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->PAYTM->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->PAYTM->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_PAYTM">
<span<?php echo $view_dashboard_summary_payment_mode->PAYTM->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->PAYTM->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CHEQUE->Visible) { // CHEQUE ?>
		<tr id="r_CHEQUE">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->CHEQUE->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->CHEQUE->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CHEQUE">
<span<?php echo $view_dashboard_summary_payment_mode->CHEQUE->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->CHEQUE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->RTGS->Visible) { // RTGS ?>
		<tr id="r_RTGS">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->RTGS->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->RTGS->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_RTGS">
<span<?php echo $view_dashboard_summary_payment_mode->RTGS->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->RTGS->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->NotSelected->Visible) { // NotSelected ?>
		<tr id="r_NotSelected">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->NotSelected->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->NotSelected->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_NotSelected">
<span<?php echo $view_dashboard_summary_payment_mode->NotSelected->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->NotSelected->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->Total->Visible) { // Total ?>
		<tr id="r_Total">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->Total->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->Total->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_Total">
<span<?php echo $view_dashboard_summary_payment_mode->Total->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->Total->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->REFUND->Visible) { // REFUND ?>
		<tr id="r_REFUND">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->REFUND->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->REFUND->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_REFUND">
<span<?php echo $view_dashboard_summary_payment_mode->REFUND->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->REFUND->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->CANCEL->Visible) { // CANCEL ?>
		<tr id="r_CANCEL">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->CANCEL->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->CANCEL->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_CANCEL">
<span<?php echo $view_dashboard_summary_payment_mode->CANCEL->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->CANCEL->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->HospID->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_HospID">
<span<?php echo $view_dashboard_summary_payment_mode->HospID->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->BillType->Visible) { // BillType ?>
		<tr id="r_BillType">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->BillType->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->BillType->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_BillType">
<span<?php echo $view_dashboard_summary_payment_mode->BillType->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->BillType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_payment_mode->AdjAdvance->Visible) { // AdjAdvance ?>
		<tr id="r_AdjAdvance">
			<td class="<?php echo $view_dashboard_summary_payment_mode->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_payment_mode->AdjAdvance->caption() ?></td>
			<td <?php echo $view_dashboard_summary_payment_mode->AdjAdvance->cellAttributes() ?>>
<span id="el_view_dashboard_summary_payment_mode_AdjAdvance">
<span<?php echo $view_dashboard_summary_payment_mode->AdjAdvance->viewAttributes() ?>><?php echo $view_dashboard_summary_payment_mode->AdjAdvance->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>