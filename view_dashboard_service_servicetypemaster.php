<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_dashboard_service_servicetype->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_service_servicetypemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_dashboard_service_servicetype->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<tr id="r_DEPARTMENT">
			<td class="<?php echo $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_servicetype->DEPARTMENT->caption() ?></td>
			<td<?php echo $view_dashboard_service_servicetype->DEPARTMENT->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_DEPARTMENT">
<span<?php echo $view_dashboard_service_servicetype->DEPARTMENT->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
		<tr id="r_SERVICE_TYPE">
			<td class="<?php echo $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->caption() ?></td>
			<td<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_SERVICE_TYPE">
<span<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->SERVICE_TYPE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->sum28SubTotal29->Visible) { // sum(SubTotal) ?>
		<tr id="r_sum28SubTotal29">
			<td class="<?php echo $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_servicetype->sum28SubTotal29->caption() ?></td>
			<td<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_sum28SubTotal29">
<span<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->sum28SubTotal29->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->createdDate->Visible) { // createdDate ?>
		<tr id="r_createdDate">
			<td class="<?php echo $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_servicetype->createdDate->caption() ?></td>
			<td<?php echo $view_dashboard_service_servicetype->createdDate->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_createdDate">
<span<?php echo $view_dashboard_service_servicetype->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->createdDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_service_servicetype->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_dashboard_service_servicetype->TableLeftColumnClass ?>"><?php echo $view_dashboard_service_servicetype->HospID->caption() ?></td>
			<td<?php echo $view_dashboard_service_servicetype->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_service_servicetype_HospID">
<span<?php echo $view_dashboard_service_servicetype->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_service_servicetype->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>