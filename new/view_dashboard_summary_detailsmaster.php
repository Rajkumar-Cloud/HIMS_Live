<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_dashboard_summary_details->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_summary_detailsmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_dashboard_summary_details->UserName->Visible) { // UserName ?>
		<tr id="r_UserName">
			<td class="<?php echo $view_dashboard_summary_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_details->UserName->caption() ?></td>
			<td <?php echo $view_dashboard_summary_details->UserName->cellAttributes() ?>>
<span id="el_view_dashboard_summary_details_UserName">
<span<?php echo $view_dashboard_summary_details->UserName->viewAttributes() ?>><?php echo $view_dashboard_summary_details->UserName->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_details->sum28Amount29->Visible) { // sum(Amount) ?>
		<tr id="r_sum28Amount29">
			<td class="<?php echo $view_dashboard_summary_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_details->sum28Amount29->caption() ?></td>
			<td <?php echo $view_dashboard_summary_details->sum28Amount29->cellAttributes() ?>>
<span id="el_view_dashboard_summary_details_sum28Amount29">
<span<?php echo $view_dashboard_summary_details->sum28Amount29->viewAttributes() ?>><?php echo $view_dashboard_summary_details->sum28Amount29->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_details->createddate->Visible) { // createddate ?>
		<tr id="r_createddate">
			<td class="<?php echo $view_dashboard_summary_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_details->createddate->caption() ?></td>
			<td <?php echo $view_dashboard_summary_details->createddate->cellAttributes() ?>>
<span id="el_view_dashboard_summary_details_createddate">
<span<?php echo $view_dashboard_summary_details->createddate->viewAttributes() ?>><?php echo $view_dashboard_summary_details->createddate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_summary_details->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_dashboard_summary_details->TableLeftColumnClass ?>"><?php echo $view_dashboard_summary_details->HospID->caption() ?></td>
			<td <?php echo $view_dashboard_summary_details->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_summary_details_HospID">
<span<?php echo $view_dashboard_summary_details->HospID->viewAttributes() ?>><?php echo $view_dashboard_summary_details->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>