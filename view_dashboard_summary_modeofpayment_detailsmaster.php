<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_dashboard_summary_modeofpayment_details->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_summary_modeofpayment_detailsmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_dashboard_summary_modeofpayment_details->UserName->Visible) { // UserName ?>
		<tr id="r_UserName">
			<td class="<?php echo $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_modeofpayment_details->UserName->caption() ?></td>
			<td<?php echo $view_dashboard_summary_modeofpayment_details->UserName->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_UserName">
<span<?php echo $view_dashboard_summary_modeofpayment_details->UserName->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->UserName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->ModeofPayment->Visible) { // ModeofPayment ?>
		<tr id="r_ModeofPayment">
			<td class="<?php echo $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->caption() ?></td>
			<td<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->ModeofPayment->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->sum28Amount29->Visible) { // sum(Amount) ?>
		<tr id="r_sum28Amount29">
			<td class="<?php echo $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->caption() ?></td>
			<td<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_sum28Amount29">
<span<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->sum28Amount29->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->createddate->Visible) { // createddate ?>
		<tr id="r_createddate">
			<td class="<?php echo $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_modeofpayment_details->createddate->caption() ?></td>
			<td<?php echo $view_dashboard_summary_modeofpayment_details->createddate->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_createddate">
<span<?php echo $view_dashboard_summary_modeofpayment_details->createddate->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->createddate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_modeofpayment_details->HospID->caption() ?></td>
			<td<?php echo $view_dashboard_summary_modeofpayment_details->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_HospID">
<span<?php echo $view_dashboard_summary_modeofpayment_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_modeofpayment_details->BillType->Visible) { // BillType ?>
		<tr id="r_BillType">
			<td class="<?php echo $view_dashboard_summary_modeofpayment_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_modeofpayment_details->BillType->caption() ?></td>
			<td<?php echo $view_dashboard_summary_modeofpayment_details->BillType->cellAttributes() ?>>
<span id="el_view_dashboard_summary_modeofpayment_details_BillType">
<span<?php echo $view_dashboard_summary_modeofpayment_details->BillType->viewAttributes() ?>>
<?php echo $view_dashboard_summary_modeofpayment_details->BillType->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>