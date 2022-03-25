<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($employee->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_employeemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($employee->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->id->caption() ?></td>
			<td <?php echo $employee->id->cellAttributes() ?>>
<span id="el_employee_id">
<span<?php echo $employee->id->viewAttributes() ?>><?php echo $employee->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->empNo->Visible) { // empNo ?>
		<tr id="r_empNo">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->empNo->caption() ?></td>
			<td <?php echo $employee->empNo->cellAttributes() ?>>
<span id="el_employee_empNo">
<span<?php echo $employee->empNo->viewAttributes() ?>><?php echo $employee->empNo->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->tittle->Visible) { // tittle ?>
		<tr id="r_tittle">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->tittle->caption() ?></td>
			<td <?php echo $employee->tittle->cellAttributes() ?>>
<span id="el_employee_tittle">
<span<?php echo $employee->tittle->viewAttributes() ?>><?php echo $employee->tittle->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
		<tr id="r_first_name">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->first_name->caption() ?></td>
			<td <?php echo $employee->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<span<?php echo $employee->first_name->viewAttributes() ?>><?php echo $employee->first_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
		<tr id="r_middle_name">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->middle_name->caption() ?></td>
			<td <?php echo $employee->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<span<?php echo $employee->middle_name->viewAttributes() ?>><?php echo $employee->middle_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
		<tr id="r_last_name">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->last_name->caption() ?></td>
			<td <?php echo $employee->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<span<?php echo $employee->last_name->viewAttributes() ?>><?php echo $employee->last_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
		<tr id="r_gender">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->gender->caption() ?></td>
			<td <?php echo $employee->gender->cellAttributes() ?>>
<span id="el_employee_gender">
<span<?php echo $employee->gender->viewAttributes() ?>><?php echo $employee->gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->dob->Visible) { // dob ?>
		<tr id="r_dob">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->dob->caption() ?></td>
			<td <?php echo $employee->dob->cellAttributes() ?>>
<span id="el_employee_dob">
<span<?php echo $employee->dob->viewAttributes() ?>><?php echo $employee->dob->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->start_date->Visible) { // start_date ?>
		<tr id="r_start_date">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->start_date->caption() ?></td>
			<td <?php echo $employee->start_date->cellAttributes() ?>>
<span id="el_employee_start_date">
<span<?php echo $employee->start_date->viewAttributes() ?>><?php echo $employee->start_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->end_date->Visible) { // end_date ?>
		<tr id="r_end_date">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->end_date->caption() ?></td>
			<td <?php echo $employee->end_date->cellAttributes() ?>>
<span id="el_employee_end_date">
<span<?php echo $employee->end_date->viewAttributes() ?>><?php echo $employee->end_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->employee_role_id->Visible) { // employee_role_id ?>
		<tr id="r_employee_role_id">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->employee_role_id->caption() ?></td>
			<td <?php echo $employee->employee_role_id->cellAttributes() ?>>
<span id="el_employee_employee_role_id">
<span<?php echo $employee->employee_role_id->viewAttributes() ?>><?php echo $employee->employee_role_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->default_shift_start->Visible) { // default_shift_start ?>
		<tr id="r_default_shift_start">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->default_shift_start->caption() ?></td>
			<td <?php echo $employee->default_shift_start->cellAttributes() ?>>
<span id="el_employee_default_shift_start">
<span<?php echo $employee->default_shift_start->viewAttributes() ?>><?php echo $employee->default_shift_start->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->default_shift_end->Visible) { // default_shift_end ?>
		<tr id="r_default_shift_end">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->default_shift_end->caption() ?></td>
			<td <?php echo $employee->default_shift_end->cellAttributes() ?>>
<span id="el_employee_default_shift_end">
<span<?php echo $employee->default_shift_end->viewAttributes() ?>><?php echo $employee->default_shift_end->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->working_days->Visible) { // working_days ?>
		<tr id="r_working_days">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->working_days->caption() ?></td>
			<td <?php echo $employee->working_days->cellAttributes() ?>>
<span id="el_employee_working_days">
<span<?php echo $employee->working_days->viewAttributes() ?>><?php echo $employee->working_days->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->working_location->Visible) { // working_location ?>
		<tr id="r_working_location">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->working_location->caption() ?></td>
			<td <?php echo $employee->working_location->cellAttributes() ?>>
<span id="el_employee_working_location">
<span<?php echo $employee->working_location->viewAttributes() ?>><?php echo $employee->working_location->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->status->caption() ?></td>
			<td <?php echo $employee->status->cellAttributes() ?>>
<span id="el_employee_status">
<span<?php echo $employee->status->viewAttributes() ?>><?php echo $employee->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->profilePic->Visible) { // profilePic ?>
		<tr id="r_profilePic">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->profilePic->caption() ?></td>
			<td <?php echo $employee->profilePic->cellAttributes() ?>>
<span id="el_employee_profilePic">
<span><?php echo GetFileViewTag($employee->profilePic, $employee->profilePic->getViewValue(), FALSE) ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->HospID->caption() ?></td>
			<td <?php echo $employee->HospID->cellAttributes() ?>>
<span id="el_employee_HospID">
<span<?php echo $employee->HospID->viewAttributes() ?>><?php echo $employee->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>