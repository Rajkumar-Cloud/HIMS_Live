<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_dashboard_patient_summary->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_dashboard_patient_summarymaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($view_dashboard_patient_summary->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<tr id="r_WhereDidYouHear">
			<td class="<?php echo $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_patient_summary->WhereDidYouHear->caption() ?></td>
			<td<?php echo $view_dashboard_patient_summary->WhereDidYouHear->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_WhereDidYouHear">
<span<?php echo $view_dashboard_patient_summary->WhereDidYouHear->viewAttributes() ?>>
<?php echo $view_dashboard_patient_summary->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_patient_summary->count28WhereDidYouHear29->Visible) { // count(WhereDidYouHear) ?>
		<tr id="r_count28WhereDidYouHear29">
			<td class="<?php echo $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_patient_summary->count28WhereDidYouHear29->caption() ?></td>
			<td<?php echo $view_dashboard_patient_summary->count28WhereDidYouHear29->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_count28WhereDidYouHear29">
<span<?php echo $view_dashboard_patient_summary->count28WhereDidYouHear29->viewAttributes() ?>>
<?php echo $view_dashboard_patient_summary->count28WhereDidYouHear29->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_patient_summary->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_patient_summary->HospID->caption() ?></td>
			<td<?php echo $view_dashboard_patient_summary->HospID->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_HospID">
<span<?php echo $view_dashboard_patient_summary->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_patient_summary->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($view_dashboard_patient_summary->createdDate->Visible) { // createdDate ?>
		<tr id="r_createdDate">
			<td class="<?php echo $view_dashboard_patient_summary->TableLeftColumnClass ?>"><?php echo $view_dashboard_patient_summary->createdDate->caption() ?></td>
			<td<?php echo $view_dashboard_patient_summary->createdDate->cellAttributes() ?>>
<span id="el_view_dashboard_patient_summary_createdDate">
<span<?php echo $view_dashboard_patient_summary->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_patient_summary->createdDate->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>