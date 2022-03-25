<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($doctors->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_doctorsmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($doctors->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->id->caption() ?></td>
			<td<?php echo $doctors->id->cellAttributes() ?>>
<span id="el_doctors_id">
<span<?php echo $doctors->id->viewAttributes() ?>>
<?php echo $doctors->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->CODE->Visible) { // CODE ?>
		<tr id="r_CODE">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->CODE->caption() ?></td>
			<td<?php echo $doctors->CODE->cellAttributes() ?>>
<span id="el_doctors_CODE">
<span<?php echo $doctors->CODE->viewAttributes() ?>>
<?php echo $doctors->CODE->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->NAME->Visible) { // NAME ?>
		<tr id="r_NAME">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->NAME->caption() ?></td>
			<td<?php echo $doctors->NAME->cellAttributes() ?>>
<span id="el_doctors_NAME">
<span<?php echo $doctors->NAME->viewAttributes() ?>>
<?php echo $doctors->NAME->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->DEPARTMENT->Visible) { // DEPARTMENT ?>
		<tr id="r_DEPARTMENT">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->DEPARTMENT->caption() ?></td>
			<td<?php echo $doctors->DEPARTMENT->cellAttributes() ?>>
<span id="el_doctors_DEPARTMENT">
<span<?php echo $doctors->DEPARTMENT->viewAttributes() ?>>
<?php echo $doctors->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->start_time->Visible) { // start_time ?>
		<tr id="r_start_time">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->start_time->caption() ?></td>
			<td<?php echo $doctors->start_time->cellAttributes() ?>>
<span id="el_doctors_start_time">
<span<?php echo $doctors->start_time->viewAttributes() ?>>
<?php echo $doctors->start_time->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->end_time->Visible) { // end_time ?>
		<tr id="r_end_time">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->end_time->caption() ?></td>
			<td<?php echo $doctors->end_time->cellAttributes() ?>>
<span id="el_doctors_end_time">
<span<?php echo $doctors->end_time->viewAttributes() ?>>
<?php echo $doctors->end_time->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->start_time1->Visible) { // start_time1 ?>
		<tr id="r_start_time1">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->start_time1->caption() ?></td>
			<td<?php echo $doctors->start_time1->cellAttributes() ?>>
<span id="el_doctors_start_time1">
<span<?php echo $doctors->start_time1->viewAttributes() ?>>
<?php echo $doctors->start_time1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->end_time1->Visible) { // end_time1 ?>
		<tr id="r_end_time1">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->end_time1->caption() ?></td>
			<td<?php echo $doctors->end_time1->cellAttributes() ?>>
<span id="el_doctors_end_time1">
<span<?php echo $doctors->end_time1->viewAttributes() ?>>
<?php echo $doctors->end_time1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->start_time2->Visible) { // start_time2 ?>
		<tr id="r_start_time2">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->start_time2->caption() ?></td>
			<td<?php echo $doctors->start_time2->cellAttributes() ?>>
<span id="el_doctors_start_time2">
<span<?php echo $doctors->start_time2->viewAttributes() ?>>
<?php echo $doctors->start_time2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->end_time2->Visible) { // end_time2 ?>
		<tr id="r_end_time2">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->end_time2->caption() ?></td>
			<td<?php echo $doctors->end_time2->cellAttributes() ?>>
<span id="el_doctors_end_time2">
<span<?php echo $doctors->end_time2->viewAttributes() ?>>
<?php echo $doctors->end_time2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->slot_time->Visible) { // slot_time ?>
		<tr id="r_slot_time">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->slot_time->caption() ?></td>
			<td<?php echo $doctors->slot_time->cellAttributes() ?>>
<span id="el_doctors_slot_time">
<span<?php echo $doctors->slot_time->viewAttributes() ?>>
<?php echo $doctors->slot_time->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->Fees->Visible) { // Fees ?>
		<tr id="r_Fees">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->Fees->caption() ?></td>
			<td<?php echo $doctors->Fees->cellAttributes() ?>>
<span id="el_doctors_Fees">
<span<?php echo $doctors->Fees->viewAttributes() ?>>
<?php echo $doctors->Fees->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->slot_days->Visible) { // slot_days ?>
		<tr id="r_slot_days">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->slot_days->caption() ?></td>
			<td<?php echo $doctors->slot_days->cellAttributes() ?>>
<span id="el_doctors_slot_days">
<span<?php echo $doctors->slot_days->viewAttributes() ?>>
<?php echo $doctors->slot_days->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->Status->Visible) { // Status ?>
		<tr id="r_Status">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->Status->caption() ?></td>
			<td<?php echo $doctors->Status->cellAttributes() ?>>
<span id="el_doctors_Status">
<span<?php echo $doctors->Status->viewAttributes() ?>>
<?php echo $doctors->Status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->scheduler_id->Visible) { // scheduler_id ?>
		<tr id="r_scheduler_id">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->scheduler_id->caption() ?></td>
			<td<?php echo $doctors->scheduler_id->cellAttributes() ?>>
<span id="el_doctors_scheduler_id">
<span<?php echo $doctors->scheduler_id->viewAttributes() ?>>
<?php echo $doctors->scheduler_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->HospID->caption() ?></td>
			<td<?php echo $doctors->HospID->cellAttributes() ?>>
<span id="el_doctors_HospID">
<span<?php echo $doctors->HospID->viewAttributes() ?>>
<?php echo $doctors->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($doctors->Designation->Visible) { // Designation ?>
		<tr id="r_Designation">
			<td class="<?php echo $doctors->TableLeftColumnClass ?>"><?php echo $doctors->Designation->caption() ?></td>
			<td<?php echo $doctors->Designation->cellAttributes() ?>>
<span id="el_doctors_Designation">
<span<?php echo $doctors->Designation->viewAttributes() ?>>
<?php echo $doctors->Designation->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>