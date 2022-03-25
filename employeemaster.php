<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($employee->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_employeemaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($employee->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->id->caption() ?></td>
			<td<?php echo $employee->id->cellAttributes() ?>>
<span id="el_employee_id">
<span<?php echo $employee->id->viewAttributes() ?>>
<?php echo $employee->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->employee_id->Visible) { // employee_id ?>
		<tr id="r_employee_id">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->employee_id->caption() ?></td>
			<td<?php echo $employee->employee_id->cellAttributes() ?>>
<span id="el_employee_employee_id">
<span<?php echo $employee->employee_id->viewAttributes() ?>>
<?php echo $employee->employee_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->first_name->Visible) { // first_name ?>
		<tr id="r_first_name">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->first_name->caption() ?></td>
			<td<?php echo $employee->first_name->cellAttributes() ?>>
<span id="el_employee_first_name">
<span<?php echo $employee->first_name->viewAttributes() ?>>
<?php echo $employee->first_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->middle_name->Visible) { // middle_name ?>
		<tr id="r_middle_name">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->middle_name->caption() ?></td>
			<td<?php echo $employee->middle_name->cellAttributes() ?>>
<span id="el_employee_middle_name">
<span<?php echo $employee->middle_name->viewAttributes() ?>>
<?php echo $employee->middle_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->last_name->Visible) { // last_name ?>
		<tr id="r_last_name">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->last_name->caption() ?></td>
			<td<?php echo $employee->last_name->cellAttributes() ?>>
<span id="el_employee_last_name">
<span<?php echo $employee->last_name->viewAttributes() ?>>
<?php echo $employee->last_name->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->gender->Visible) { // gender ?>
		<tr id="r_gender">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->gender->caption() ?></td>
			<td<?php echo $employee->gender->cellAttributes() ?>>
<span id="el_employee_gender">
<span<?php echo $employee->gender->viewAttributes() ?>>
<?php echo $employee->gender->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->nationality->Visible) { // nationality ?>
		<tr id="r_nationality">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->nationality->caption() ?></td>
			<td<?php echo $employee->nationality->cellAttributes() ?>>
<span id="el_employee_nationality">
<span<?php echo $employee->nationality->viewAttributes() ?>>
<?php echo $employee->nationality->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->birthday->Visible) { // birthday ?>
		<tr id="r_birthday">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->birthday->caption() ?></td>
			<td<?php echo $employee->birthday->cellAttributes() ?>>
<span id="el_employee_birthday">
<span<?php echo $employee->birthday->viewAttributes() ?>>
<?php echo $employee->birthday->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->marital_status->Visible) { // marital_status ?>
		<tr id="r_marital_status">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->marital_status->caption() ?></td>
			<td<?php echo $employee->marital_status->cellAttributes() ?>>
<span id="el_employee_marital_status">
<span<?php echo $employee->marital_status->viewAttributes() ?>>
<?php echo $employee->marital_status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->ssn_num->Visible) { // ssn_num ?>
		<tr id="r_ssn_num">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->ssn_num->caption() ?></td>
			<td<?php echo $employee->ssn_num->cellAttributes() ?>>
<span id="el_employee_ssn_num">
<span<?php echo $employee->ssn_num->viewAttributes() ?>>
<?php echo $employee->ssn_num->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->nic_num->Visible) { // nic_num ?>
		<tr id="r_nic_num">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->nic_num->caption() ?></td>
			<td<?php echo $employee->nic_num->cellAttributes() ?>>
<span id="el_employee_nic_num">
<span<?php echo $employee->nic_num->viewAttributes() ?>>
<?php echo $employee->nic_num->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->other_id->Visible) { // other_id ?>
		<tr id="r_other_id">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->other_id->caption() ?></td>
			<td<?php echo $employee->other_id->cellAttributes() ?>>
<span id="el_employee_other_id">
<span<?php echo $employee->other_id->viewAttributes() ?>>
<?php echo $employee->other_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->driving_license->Visible) { // driving_license ?>
		<tr id="r_driving_license">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->driving_license->caption() ?></td>
			<td<?php echo $employee->driving_license->cellAttributes() ?>>
<span id="el_employee_driving_license">
<span<?php echo $employee->driving_license->viewAttributes() ?>>
<?php echo $employee->driving_license->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->driving_license_exp_date->Visible) { // driving_license_exp_date ?>
		<tr id="r_driving_license_exp_date">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->driving_license_exp_date->caption() ?></td>
			<td<?php echo $employee->driving_license_exp_date->cellAttributes() ?>>
<span id="el_employee_driving_license_exp_date">
<span<?php echo $employee->driving_license_exp_date->viewAttributes() ?>>
<?php echo $employee->driving_license_exp_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->employment_status->Visible) { // employment_status ?>
		<tr id="r_employment_status">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->employment_status->caption() ?></td>
			<td<?php echo $employee->employment_status->cellAttributes() ?>>
<span id="el_employee_employment_status">
<span<?php echo $employee->employment_status->viewAttributes() ?>>
<?php echo $employee->employment_status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->job_title->Visible) { // job_title ?>
		<tr id="r_job_title">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->job_title->caption() ?></td>
			<td<?php echo $employee->job_title->cellAttributes() ?>>
<span id="el_employee_job_title">
<span<?php echo $employee->job_title->viewAttributes() ?>>
<?php echo $employee->job_title->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->pay_grade->Visible) { // pay_grade ?>
		<tr id="r_pay_grade">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->pay_grade->caption() ?></td>
			<td<?php echo $employee->pay_grade->cellAttributes() ?>>
<span id="el_employee_pay_grade">
<span<?php echo $employee->pay_grade->viewAttributes() ?>>
<?php echo $employee->pay_grade->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->work_station_id->Visible) { // work_station_id ?>
		<tr id="r_work_station_id">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->work_station_id->caption() ?></td>
			<td<?php echo $employee->work_station_id->cellAttributes() ?>>
<span id="el_employee_work_station_id">
<span<?php echo $employee->work_station_id->viewAttributes() ?>>
<?php echo $employee->work_station_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->address1->Visible) { // address1 ?>
		<tr id="r_address1">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->address1->caption() ?></td>
			<td<?php echo $employee->address1->cellAttributes() ?>>
<span id="el_employee_address1">
<span<?php echo $employee->address1->viewAttributes() ?>>
<?php echo $employee->address1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->address2->Visible) { // address2 ?>
		<tr id="r_address2">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->address2->caption() ?></td>
			<td<?php echo $employee->address2->cellAttributes() ?>>
<span id="el_employee_address2">
<span<?php echo $employee->address2->viewAttributes() ?>>
<?php echo $employee->address2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->city->Visible) { // city ?>
		<tr id="r_city">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->city->caption() ?></td>
			<td<?php echo $employee->city->cellAttributes() ?>>
<span id="el_employee_city">
<span<?php echo $employee->city->viewAttributes() ?>>
<?php echo $employee->city->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->country->Visible) { // country ?>
		<tr id="r_country">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->country->caption() ?></td>
			<td<?php echo $employee->country->cellAttributes() ?>>
<span id="el_employee_country">
<span<?php echo $employee->country->viewAttributes() ?>>
<?php echo $employee->country->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->province->Visible) { // province ?>
		<tr id="r_province">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->province->caption() ?></td>
			<td<?php echo $employee->province->cellAttributes() ?>>
<span id="el_employee_province">
<span<?php echo $employee->province->viewAttributes() ?>>
<?php echo $employee->province->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->postal_code->Visible) { // postal_code ?>
		<tr id="r_postal_code">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->postal_code->caption() ?></td>
			<td<?php echo $employee->postal_code->cellAttributes() ?>>
<span id="el_employee_postal_code">
<span<?php echo $employee->postal_code->viewAttributes() ?>>
<?php echo $employee->postal_code->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->home_phone->Visible) { // home_phone ?>
		<tr id="r_home_phone">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->home_phone->caption() ?></td>
			<td<?php echo $employee->home_phone->cellAttributes() ?>>
<span id="el_employee_home_phone">
<span<?php echo $employee->home_phone->viewAttributes() ?>>
<?php echo $employee->home_phone->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->mobile_phone->Visible) { // mobile_phone ?>
		<tr id="r_mobile_phone">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->mobile_phone->caption() ?></td>
			<td<?php echo $employee->mobile_phone->cellAttributes() ?>>
<span id="el_employee_mobile_phone">
<span<?php echo $employee->mobile_phone->viewAttributes() ?>>
<?php echo $employee->mobile_phone->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->work_phone->Visible) { // work_phone ?>
		<tr id="r_work_phone">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->work_phone->caption() ?></td>
			<td<?php echo $employee->work_phone->cellAttributes() ?>>
<span id="el_employee_work_phone">
<span<?php echo $employee->work_phone->viewAttributes() ?>>
<?php echo $employee->work_phone->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->work_email->Visible) { // work_email ?>
		<tr id="r_work_email">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->work_email->caption() ?></td>
			<td<?php echo $employee->work_email->cellAttributes() ?>>
<span id="el_employee_work_email">
<span<?php echo $employee->work_email->viewAttributes() ?>>
<?php echo $employee->work_email->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->private_email->Visible) { // private_email ?>
		<tr id="r_private_email">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->private_email->caption() ?></td>
			<td<?php echo $employee->private_email->cellAttributes() ?>>
<span id="el_employee_private_email">
<span<?php echo $employee->private_email->viewAttributes() ?>>
<?php echo $employee->private_email->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->joined_date->Visible) { // joined_date ?>
		<tr id="r_joined_date">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->joined_date->caption() ?></td>
			<td<?php echo $employee->joined_date->cellAttributes() ?>>
<span id="el_employee_joined_date">
<span<?php echo $employee->joined_date->viewAttributes() ?>>
<?php echo $employee->joined_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->confirmation_date->Visible) { // confirmation_date ?>
		<tr id="r_confirmation_date">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->confirmation_date->caption() ?></td>
			<td<?php echo $employee->confirmation_date->cellAttributes() ?>>
<span id="el_employee_confirmation_date">
<span<?php echo $employee->confirmation_date->viewAttributes() ?>>
<?php echo $employee->confirmation_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->supervisor->Visible) { // supervisor ?>
		<tr id="r_supervisor">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->supervisor->caption() ?></td>
			<td<?php echo $employee->supervisor->cellAttributes() ?>>
<span id="el_employee_supervisor">
<span<?php echo $employee->supervisor->viewAttributes() ?>>
<?php echo $employee->supervisor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->indirect_supervisors->Visible) { // indirect_supervisors ?>
		<tr id="r_indirect_supervisors">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->indirect_supervisors->caption() ?></td>
			<td<?php echo $employee->indirect_supervisors->cellAttributes() ?>>
<span id="el_employee_indirect_supervisors">
<span<?php echo $employee->indirect_supervisors->viewAttributes() ?>>
<?php echo $employee->indirect_supervisors->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->department->Visible) { // department ?>
		<tr id="r_department">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->department->caption() ?></td>
			<td<?php echo $employee->department->cellAttributes() ?>>
<span id="el_employee_department">
<span<?php echo $employee->department->viewAttributes() ?>>
<?php echo $employee->department->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom1->Visible) { // custom1 ?>
		<tr id="r_custom1">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom1->caption() ?></td>
			<td<?php echo $employee->custom1->cellAttributes() ?>>
<span id="el_employee_custom1">
<span<?php echo $employee->custom1->viewAttributes() ?>>
<?php echo $employee->custom1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom2->Visible) { // custom2 ?>
		<tr id="r_custom2">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom2->caption() ?></td>
			<td<?php echo $employee->custom2->cellAttributes() ?>>
<span id="el_employee_custom2">
<span<?php echo $employee->custom2->viewAttributes() ?>>
<?php echo $employee->custom2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom3->Visible) { // custom3 ?>
		<tr id="r_custom3">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom3->caption() ?></td>
			<td<?php echo $employee->custom3->cellAttributes() ?>>
<span id="el_employee_custom3">
<span<?php echo $employee->custom3->viewAttributes() ?>>
<?php echo $employee->custom3->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom4->Visible) { // custom4 ?>
		<tr id="r_custom4">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom4->caption() ?></td>
			<td<?php echo $employee->custom4->cellAttributes() ?>>
<span id="el_employee_custom4">
<span<?php echo $employee->custom4->viewAttributes() ?>>
<?php echo $employee->custom4->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom5->Visible) { // custom5 ?>
		<tr id="r_custom5">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom5->caption() ?></td>
			<td<?php echo $employee->custom5->cellAttributes() ?>>
<span id="el_employee_custom5">
<span<?php echo $employee->custom5->viewAttributes() ?>>
<?php echo $employee->custom5->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom6->Visible) { // custom6 ?>
		<tr id="r_custom6">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom6->caption() ?></td>
			<td<?php echo $employee->custom6->cellAttributes() ?>>
<span id="el_employee_custom6">
<span<?php echo $employee->custom6->viewAttributes() ?>>
<?php echo $employee->custom6->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom7->Visible) { // custom7 ?>
		<tr id="r_custom7">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom7->caption() ?></td>
			<td<?php echo $employee->custom7->cellAttributes() ?>>
<span id="el_employee_custom7">
<span<?php echo $employee->custom7->viewAttributes() ?>>
<?php echo $employee->custom7->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom8->Visible) { // custom8 ?>
		<tr id="r_custom8">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom8->caption() ?></td>
			<td<?php echo $employee->custom8->cellAttributes() ?>>
<span id="el_employee_custom8">
<span<?php echo $employee->custom8->viewAttributes() ?>>
<?php echo $employee->custom8->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom9->Visible) { // custom9 ?>
		<tr id="r_custom9">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom9->caption() ?></td>
			<td<?php echo $employee->custom9->cellAttributes() ?>>
<span id="el_employee_custom9">
<span<?php echo $employee->custom9->viewAttributes() ?>>
<?php echo $employee->custom9->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->custom10->Visible) { // custom10 ?>
		<tr id="r_custom10">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->custom10->caption() ?></td>
			<td<?php echo $employee->custom10->cellAttributes() ?>>
<span id="el_employee_custom10">
<span<?php echo $employee->custom10->viewAttributes() ?>>
<?php echo $employee->custom10->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->termination_date->Visible) { // termination_date ?>
		<tr id="r_termination_date">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->termination_date->caption() ?></td>
			<td<?php echo $employee->termination_date->cellAttributes() ?>>
<span id="el_employee_termination_date">
<span<?php echo $employee->termination_date->viewAttributes() ?>>
<?php echo $employee->termination_date->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->ethnicity->Visible) { // ethnicity ?>
		<tr id="r_ethnicity">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->ethnicity->caption() ?></td>
			<td<?php echo $employee->ethnicity->cellAttributes() ?>>
<span id="el_employee_ethnicity">
<span<?php echo $employee->ethnicity->viewAttributes() ?>>
<?php echo $employee->ethnicity->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->immigration_status->Visible) { // immigration_status ?>
		<tr id="r_immigration_status">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->immigration_status->caption() ?></td>
			<td<?php echo $employee->immigration_status->cellAttributes() ?>>
<span id="el_employee_immigration_status">
<span<?php echo $employee->immigration_status->viewAttributes() ?>>
<?php echo $employee->immigration_status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->approver1->Visible) { // approver1 ?>
		<tr id="r_approver1">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->approver1->caption() ?></td>
			<td<?php echo $employee->approver1->cellAttributes() ?>>
<span id="el_employee_approver1">
<span<?php echo $employee->approver1->viewAttributes() ?>>
<?php echo $employee->approver1->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->approver2->Visible) { // approver2 ?>
		<tr id="r_approver2">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->approver2->caption() ?></td>
			<td<?php echo $employee->approver2->cellAttributes() ?>>
<span id="el_employee_approver2">
<span<?php echo $employee->approver2->viewAttributes() ?>>
<?php echo $employee->approver2->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->approver3->Visible) { // approver3 ?>
		<tr id="r_approver3">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->approver3->caption() ?></td>
			<td<?php echo $employee->approver3->cellAttributes() ?>>
<span id="el_employee_approver3">
<span<?php echo $employee->approver3->viewAttributes() ?>>
<?php echo $employee->approver3->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->status->caption() ?></td>
			<td<?php echo $employee->status->cellAttributes() ?>>
<span id="el_employee_status">
<span<?php echo $employee->status->viewAttributes() ?>>
<?php echo $employee->status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($employee->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $employee->TableLeftColumnClass ?>"><?php echo $employee->HospID->caption() ?></td>
			<td<?php echo $employee->HospID->cellAttributes() ?>>
<span id="el_employee_HospID">
<span<?php echo $employee->HospID->viewAttributes() ?>>
<?php echo $employee->HospID->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>