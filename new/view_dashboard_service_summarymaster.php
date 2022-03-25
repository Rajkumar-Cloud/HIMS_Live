<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_dashboard_service_summary->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_service_summarymaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_dashboard_service_summary->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<tr id="r_DEPARTMENT">
			<td class="<?php echo $view_dashboard_service_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_summary->DEPARTMENT->caption() ?></td>
			<td <?php echo $view_dashboard_service_summary->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_DEPARTMENT">
<span<?php echo $view_dashboard_service_summary->DEPARTMENT->viewAttributes() ?>><?php echo $view_dashboard_service_summary->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<tr id="r_sum28SubTotal29">
			<td class="<?php echo $view_dashboard_service_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_summary->sum28SubTotal29->caption() ?></td>
			<td <?php echo $view_dashboard_service_summary->sum28SubTotal29->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_sum28SubTotal29">
<span<?php echo $view_dashboard_service_summary->sum28SubTotal29->viewAttributes() ?>><?php echo $view_dashboard_service_summary->sum28SubTotal29->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->createdDate->Visible) { // createdDate ?>
		<tr id="r_createdDate">
			<td class="<?php echo $view_dashboard_service_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_summary->createdDate->caption() ?></td>
			<td <?php echo $view_dashboard_service_summary->createdDate->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_createdDate">
<span<?php echo $view_dashboard_service_summary->createdDate->viewAttributes() ?>><?php echo $view_dashboard_service_summary->createdDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_dashboard_service_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_summary->HospID->caption() ?></td>
			<td <?php echo $view_dashboard_service_summary->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_HospID">
<span<?php echo $view_dashboard_service_summary->HospID->viewAttributes() ?>><?php echo $view_dashboard_service_summary->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_summary->vid->Visible) { // vid ?>
		<tr id="r_vid">
			<td class="<?php echo $view_dashboard_service_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_summary->vid->caption() ?></td>
			<td <?php echo $view_dashboard_service_summary->vid->cellAttributes() ?>>
<span id="el_view_dashboard_service_summary_vid">
<span<?php echo $view_dashboard_service_summary->vid->viewAttributes() ?>><?php echo $view_dashboard_service_summary->vid->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>